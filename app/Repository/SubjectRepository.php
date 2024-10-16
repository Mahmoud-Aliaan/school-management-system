<?php

namespace App\Repository;

use App\Models\Grade;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Classrom;
use App\Repository\SubjectRepositoryInterface;

class SubjectRepository implements SubjectRepositoryInterface{

    public function index(){
        $Subjects = Subject::all();
        return view('pages.Subjects.index', compact('Subjects'));
    }

    public function create(){
        $Grades= Grade::all();
        $Classrooms= Classrom::all();
        $Teachers= Teacher::all();
        return view('pages.Subjects.add', compact('Grades', 'Classrooms' ,'Teachers')); 
    }

    public function edit($id){
        $Supject= Subject::FindOrfail($id);
        $Grades= Grade::all();
        $Classrooms= Classrom::all();
        $Teachers= Teacher::all();
        return view('pages.Subjects.edit', compact('Supject','Grades', 'Classrooms' ,'Teachers')); 
    }
    public function  store($request){   
        try {

                $Supject= new Subject();
                $Supject->name= ['ar'=>$request->Name, 'en'=>$request->Name_en];
                $Supject->teacher_id= $request->teacher_id;
                $Supject->grade_id = $request->Grade_id;
                $Supject->classroom_id =$request->Class_id;
                $Supject->save();

                // Subject::create([
                //     'name'=> ['ar'=>$request->Name, 'en'=>$request->Name_en],
                //     'teacher_id'=> $request->teacher_id,
                //     'grade_id' => $request->Grade_id,
                //     'classroom_id' =>$request->Class_id,
                // ]);

	
            toastr()->success (trans('messages.success'));
            return redirect()->route('Subjects.create');
	}

	 catch (\Exception $e) {
           
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request){
        try {

            $Supject=  Subject::FindOrfail($request->id);
            $Supject->name= ['ar'=>$request->Name, 'en'=>$request->Name_en];
            $Supject->teacher_id= $request->teacher_id;
            $Supject->grade_id = $request->Grade_id;
            $Supject->classroom_id =$request->Class_id;
            $Supject->save();


        toastr()->success (trans('messages.Updat'));
        return redirect()->route('Subjects.index');
}

 catch (\Exception $e) {
       
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
    }
    
    public function destroy($request){
        Subject::destroy($request->id);
        toastr()->success (trans('messages.Delete'));
        return redirect()->route('Subjects.index');
    }
}