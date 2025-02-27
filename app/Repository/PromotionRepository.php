<?php
namespace App\Repository;

use App\Models\Grade;
use App\Models\student;
use App\Models\Promotion;
use Illuminate\Support\Facades\DB;
use App\Repository\PromotionRepositoryInterface;



class PromotionRepository implements PromotionRepositoryInterface{

    public function index(){

        $Grades= Grade::all();
        return view('pages.students.Promotions.students_Promotion',compact('Grades'));
    }

    public function Promotion_students( $request){
        DB::beginTransaction();

        try{

            $students= student::where('Grade_id', $request->Grade_id)->where('Classroom_id', $request->Classroom_id)->where('section_id',$request->section_id)->where('academic_year',$request->academic_year)->get();
         
            if($students->count() < 1){
                return redirect()->back()->with('error_promotions', __('لاتوجد بيانات في جدول الطلاب'));
            }

        foreach($students as $student){

          $ids= explode(',', $student->id);
          student::whereIn('id',$ids)->update([
            "Grade_id" =>$request->Grade_id_new,
            "Classroom_id"=>$request->Classroom_id_new,
            "section_id"=>$request->section_id_new,
            "academic_year" =>$request->academic_year,
            
          ]);

          Promotion::updateOrCreate([

            'student_id'=>$student->id,
            'from_grade'=>$request->Grade_id,
            'from_Classroom'=>$request->Classroom_id,
            'from_section'=>$request->section_id,
            'to_grade'=>$request->Grade_id_new,
            'to_Classroom'=>$request->Classroom_id_new,
            'to_section'=>$request->section_id_new,
            "academic_year" =>$request->academic_year,
            "academic_year_new" =>$request->academic_year_new,
         
          ]);

      
        }

        DB::commit();
        toastr()->success(trans('messages.success'));
        return redirect()->back();

       
    }catch (\Exception $e) {
        DB::rollback();
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
}

public function show_student_Pormation(){

  $Promotions= Promotion::all();
  return view('pages.students.Promotions.mangment',compact('Promotions'));
}

public function destroy_all_promation($request){
  DB::beginTransaction();
  try{

    if($request->destroy_all_Promotion == 100){

    
      $Promotions= Promotion::all();

      foreach($Promotions as $Promotion){

        $ids= explode(',', $Promotion->student_id);
        student::whereIn('id',$ids)->update([
          "Grade_id" =>$Promotion->from_grade,
          "Classroom_id"=>$Promotion->from_Classroom,
          "section_id"=>$Promotion->from_section,
          "academic_year" =>$Promotion->academic_year,
          
       ]);

        Promotion::truncate(); // Delete All Promotion table

     }
      DB::commit();
      toastr()->error(trans('messages.Delete'));
      return redirect()->back();

    }else{
     $Promotion = Promotion::FindOrfail($request->id);
     student::where('id',$Promotion->student_id)->update([
      "Grade_id" =>$Promotion->from_grade,
      "Classroom_id"=>$Promotion->from_Classroom,
      "section_id"=>$Promotion->from_section,
      "academic_year" =>$Promotion->academic_year,
      
   ]);

   Promotion::destroy($request->id);
      DB::commit();
      toastr()->error(trans('messages.Delete'));
      return redirect()->back();

    }

  }catch (\Exception $e) {
        DB::rollback();
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
}

        
}