<?php

namespace App\Repository;

use App\Models\Grade;
use App\Models\student;
use App\Repository\GraduateRepositoryInterface;


class GraduateRepository implements GraduateRepositoryInterface{

    public function index(){

        $students = student::onlyTrashed()->get();
        return view('pages.students.Graduates.Graduates_table', compact('students'));
    }
    public function create(){

        $Grades = Grade::all();
        return view('pages.students.Graduates.create' ,compact('Grades'));

    }


    public function softdelete($request){
        $students= student::where('Grade_id', $request->Grade_id)->where('Classroom_id',$request->Classroom_id)->where('section_id',$request->section_id)->get();
      foreach($students as $student){
        $ids= explode(',', $student->id);
        student::wherein('id', $ids)->delete();
       
      }
      toastr()->success(trans('messages.success'));
      return redirect()->back();

    }

    public function return_studen($request){
        student::onlyTrashed()->where('id', $request->id)->first()->restore();
        toastr()->success(trans('messages.success'));
        return redirect()->back();
    }

    public function destroy($request){

        $student= student::onlyTrashed()->where('id', $request->id)->first()->forceDelete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->back();
  
    }
    
}