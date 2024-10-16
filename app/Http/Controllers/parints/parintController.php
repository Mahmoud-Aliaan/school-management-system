<?php

namespace App\Http\Controllers\parints;

use App\Models\degree;
use App\Models\student;
use App\Models\Attendance;
use App\Models\Fees_Invoices;
use App\Models\recipt_student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class parintController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $students= student::where('parent_id', auth()->user()->id)->get();
       
       return view('pages.pairents.children.index' , compact('students')) ; 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function sons_results($id)
    {
       
       $student  = student::FindOrfail($id);
       $degrees  = degree::where('student_id', $id)->get();

       if($student->parent_id !== auth()->user()->id){
        toastr()->erorr((' لم نتعرف على حالة البحث'));
        return redirect()->back();
       }

      
       if($degrees->isEmpty()){
        toastr()->erorr((' لا يوجد نتائج لهذا الطالب '));
        return redirect()->back();
       } 

       return view('pages.pairents.children.result' , compact('degrees')) ; 

      
    }

    /**
     * Store a newly created resource in storage.
     */
    public function attendence()
    {
        $students= student::where('parent_id', auth()->user()->id)->get();
        return view('pages.pairents.children.attendence' , compact('students')) ; 

    }

    /**
     * Display the specified resource.
     */
    public function serch_attendence(Request $request)
    {
        // return $request;
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
      return view('pages.pairents.children.attendence', compact('Studdents','students'));
   
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function student_invoices()
    {
        $student_ids= student::where('parent_id', auth()->user()->id)->pluck('id');
       $Fees_Invoices = Fees_Invoices::whereIn('student_id' ,$student_ids)->get();
        return view('pages.pairents.fees_invoices.index' , compact('Fees_Invoices')) ; 
    }

    /**
     * Update the specified resource in storage.
     */
    public function fess_invoices($id)
    {
        $recipt_students= recipt_student::where('student_id', $id)->get();

       return view('pages.pairents.fees_invoices.detels' , compact('recipt_students')) ; 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
