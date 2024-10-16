<?php

namespace App\Http\Controllers\Teacher\dashbord;

use App\Models\student;
use App\Models\sections;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class studentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $ids= DB::table('teacher_sections')->where('teacher_id', auth()->user()->id)->pluck('section_id');
      $students= student::whereIn('section_id', $ids)->get();
      return view('pages.Teacher.dashbord.students.show_student', compact('students'));
    }


    public function get_section(){

       
        $ids= DB::table('teacher_sections')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        $sections= sections::WhereIn('id', $ids)->get();
        return view('pages.Teacher.dashbord..sections.show-section', compact('sections'));
   }
   

    public function attendence(request $request)
    {
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

            Attendance::updateorcreate(['student_id'=> $student_id],[

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

    
    public function reborts(){
        $ids= DB::table('teacher_sections')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        $students= student::whereIn('section_id', $ids)->get();
        return view('pages.Teacher.dashbord.students.reborts', compact('students'));
        

    }

    public function serch_reborts(Request $request)
    {
        $request->validate([
            'from' =>'required|date|date_format:Y-m-d',
            'to' =>'required|date|date_format:Y-m-d|after_or_equal:from',
        ],[
            'from.required'=>trans('messages.required'),
            'to.required'=>trans('messages.required'),
            'to.after_or_equal'=>trans('messages.after_or_equal'),
            'to.date_format'=>trans('messages.date_format'),
        ]);
        
      if($request->student_id == 0){
           $Studdents= Attendance::whereBetween('attendence_date',[$request->from, $request->to])->get();         
   
      }else{
           $Studdents= Attendance::whereBetween('attendence_date',[$request->from, $request->to])->where('student_id', $request->student_id)->get();
       
      }

      $ids= DB::table('teacher_sections')->where('teacher_id', auth()->user()->id)->pluck('section_id');
      $students= student::whereIn('section_id', $ids)->get();
      return view('pages.Teacher.dashbord.students.reborts', compact('Studdents','students'));
   
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
