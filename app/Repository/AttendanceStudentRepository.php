<?php

namespace App\Repository; 

use App\Models\Grade;
use App\Models\student;
use App\Models\Teacher;

use App\Models\Attendance;
use Illuminate\Support\Facades\DB;
use App\Repository\AttendanceStudentRepositoryInterface;

class AttendanceStudentRepository implements AttendanceStudentRepositoryInterface {

    public function index(){
        $Grades = Grade::with([ 'sections'])->get();         
       $Teachers = Teacher::all();   
       $list_Grades= Grade::all();
       return view(' pages.Attendances.index' , compact('Grades' ,'list_Grades' ,'Teachers'));
    }

    public function show($id){
 
        $students = student::with(['attendance'])->where('section_id', $id)->get();    
        return view(' pages.Attendances.studntstable' , compact('students' ));
    }

    public function store($request){
        
       
        DB::beginTransaction();

        try {

            // if(!isset($requiste->attendences)){
            //     toastr()->info(trans('messages.Enter_data'));
            //     return redirect()->back();
            //  }
            
           foreach($request->attendences as $student_id=> $attendence){

           
            if($attendence == 'presence'){
                $attendence_status	= true;
            }else if($attendence == 'absent'){
                $attendence_status	= false ;
            }

            Attendance::create([

                'student_id'=>$student_id,
                'grade_id'=> $request->grade_id,
                'classroom_id'=> $request->classroom_id,
                'section_id'=> $request->section_id,
                'teacher_id'=> 1,               
                'attendence_date'=> date('Y-m-d'),
                'attendence_status'=> $attendence_status,
            ]);

           }

             DB::commit();
            toastr()->success(trans('messages.success'));
            return redirect()->back();
        }

        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }	
    }
}