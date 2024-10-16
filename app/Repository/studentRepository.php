<?php

namespace App\Repository;

use App\Models\Grade;
use App\Models\image;
use App\Models\Gender;

use App\Models\student;
use App\Models\Classrom;
use App\Models\sections;
use App\Models\My_parint;
use App\Models\Type_Blood;
use App\Models\Nationalitie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\studentsRequest;
use Illuminate\Support\Facades\Storage; 


class studentRepository implements studentRepositoryInterface{

public function students_table(){

  $students= student::all();
  return view('pages.students.table_student' , compact('students'));
}


  public function getdata()
  {
  
    $data['parents']= My_parint::all();
    $data['Genders']= Gender::all();
    $data['nationals']= Nationalitie::all();
    $data['bloods']= Type_Blood::all();
    $data['my_classes']= Grade::all();
    return view('pages.students.add_student',$data);

  }

  public function Get_classrooms($id){

   $clss_name= Classrom::where('Grade_id',$id)->pluck("Class_name", "id");
    return $clss_name;
  }
  
  public function Get_Sections($id){
    $section_name= sections::where('Class_id',$id)->pluck("section_name", "id");
    return $section_name;
  }

  public function creat_student( $request){

    // بتقولة ان الجدولين ليهم علاقة ببعض

    DB::beginTransaction(); 
   
      try {
        $students = new student();
        $students->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
        $students->email = $request->email;
        $students->password = Hash::make($request->password);
        $students->gender_id = $request->gender_id;
        $students->nationalitie_id = $request->nationalitie_id;
        $students->blood_id = $request->blood_id;
        $students->Date_Birth = $request->Date_Birth;
        $students->Grade_id = $request->Grade_id;
        $students->Classroom_id = $request->Classroom_id;
        $students->section_id = $request->section_id;
        $students->parent_id = $request->parent_id;
        $students->academic_year = $request->academic_year;
        $students->save();

           // insert img
           if($request->hasfile('photos'))
           {
               foreach($request->file('photos') as $file)
               {
                   $name = $file->getClientOriginalName();
                   $file->storeAs('attachments/students/'. $students->name , $file->getClientOriginalName(),'upload_attachments');

                   // insert in image_table
                   $images= new image();
                   $images->file_Name=$name;
                   $images->imageable_id= $students->id;
                   $images->imageable_type = 'App\Models\student';
                   $images->save();
               }
           }
           DB::commit(); // insert data لو الجدولين مفهمش اى غلط اعمل

        toastr()->success(trans('messages.Success'));
        return redirect()->route('Students.create');
    }

    catch (\Exception $e){
      
      DB::rollback(); // لو الجدولين فيهم غلط ولكن كنت انشات اى حاجه ف جدول منهم روح امسحها "
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }

  }

  public function edit_student($id){  

    $student = student::findOrFail($id);
    
    $data['parents']= My_parint::all();
    $data['Genders']= Gender::all();
    $data['nationals']= Nationalitie::all();
    $data['bloods']= Type_Blood::all();
    $data['Grades']= Grade::all();
    return view('pages.students.edit_student', $data, compact('student'));
    // edit_student.blade
  }


    public function update_student($request){
      try {
        $students =  student::findOrFail($request->id);
        $students->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
        $students->email = $request->email;
        $students->password = Hash::make($request->password);
        $students->gender_id = $request->gender_id;
        $students->nationalitie_id = $request->nationalitie_id;
        $students->blood_id = $request->blood_id;
        $students->Date_Birth = $request->Date_Birth;
        $students->Grade_id = $request->Grade_id;
        $students->Classroom_id = $request->Classroom_id;
        $students->section_id = $request->section_id;
        $students->parent_id = $request->parent_id;
        $students->academic_year = $request->academic_year;
        $students->save();
        toastr()->success(trans('messages.Updat'));
        return redirect()->route('Students.index');
    }

    catch (\Exception $e){
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }

  }

  public function Delete_student($request){
    student::destroy($request->id);
    // student::findOrFail($request->id)->delete();
    toastr()->success(trans('messages.Delete'));
    return redirect()->route('Students.index'); }


    // show_student
      public function show_student($id){
      $student = student::findOrFail($id);
       return view('pages.students.show', compact('student')); }

  // Upload_attachment
    public function Upload_attachment($request){

      foreach($request->file('photos') as $file){
        $name = $file->getClientOriginalName();
               $file->storeAs('attachments/students/'. $request->student_name , $file->getClientOriginalName(),'upload_attachments');

                // insert in image_table
                $images = new image();
                $images->file_Name= $name;
                $images->imageable_id= $request->student_id;
                $images->imageable_type= 'App\Models\student';
                $images->save();
      }

      toastr()->success(trans('messages.Success'));
      return redirect()->back();

    }
    
   // Download_attachment
    public function Download_attachment( $studentname , $filename){

      return response()->download(public_path('attachments/students/'.$studentname . '/'. $filename));
      
    }

    public function Delete_attachment($request){
      
     // delete img in server
      Storage::disk('upload_attachments')->delete('attachments/students/'.$request->student_name.'/'.$request->file_Name);

      // Delete in db
      $attachment_DB = image::where('id' , $request->Attachment_id)->where('file_Name',$request->file_Name)->delete();
      toastr()->success(trans('messages.Delete'));
      return redirect()->back();
      
    }
}