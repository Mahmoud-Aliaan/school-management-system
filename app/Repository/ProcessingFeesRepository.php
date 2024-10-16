<?php

namespace App\Repository;

use App\Models\student;
use App\Models\Processing_Fees;
use App\Models\Invoices_student;
use Illuminate\Support\Facades\DB;
use App\Repository\ProcessingFeesRepository;
use App\Repository\ProcessingFeesRepositoryInterface;

class ProcessingFeesRepository implements ProcessingFeesRepositoryInterface{

    public function index(){
        $processing=  Processing_Fees::all();
        return view('pages.processing.index' ,compact('processing'));
    }

    public function show($id){
        $student = student::FindOrfail($id);

        return view('pages.processing.add' ,compact('student'));
    }

    public function edit($id){
        $processing= Processing_Fees::FindOrfail($id);
        return view('pages.processing.edit' ,compact('processing'));
    }
    public function store($request){

       
	 DB::beginTransaction();

     try {
            // حفظ البيانات فى جدول المعالجه الرسوم
            $processing= new Processing_Fees();
            $processing->date= date('y-m-d');
            $processing->student_id= $request->student_id;
            $processing->amount= $request->credit;
            $processing->description= $request->description;
            $processing->save();

            //  حفظ البيانات فى جدول حساب الطالب
            $invoices_student= new Invoices_student();
            $invoices_student->date= date('y-m-d');
            $invoices_student->type= 'Processing_Fees';
            $invoices_student->processing_id= $processing->id;
            $invoices_student->student_id= $request->student_id;
            $invoices_student->Debit= 0.00;
            $invoices_student->credit=$request->credit;
            $invoices_student->description= $request->description;
            $invoices_student->save();

        DB::commit();
        toastr()->success(trans('messages.success'));
        return redirect()->route('ProcessingFees.index');
        }

        catch (\Exception $e) {
         DB::rollback();
         return redirect()->back()->withErrors(['error' => $e->getMessage()]);
     } 

    }

    public function update($request){
           
	 DB::beginTransaction();

     try {
            // حفظ البيانات فى جدول المعالجه الرسوم

            $processing=  Processing_Fees::FindOrfail($request->id);
            $processing->date= date('y-m-d');
            $processing->student_id= $request->student_id;
            $processing->amount= $request->credit;
            $processing->description= $request->description;
            $processing->save();

            //  حفظ البيانات فى جدول حساب الطالب
            $invoices_student=  Invoices_student::where('processing_id', $request->id)->first();
            $invoices_student->date= date('y-m-d');
            $invoices_student->type= 'Processing_Fees';
            $invoices_student->processing_id= $processing->id;
            $invoices_student->student_id= $request->student_id;
            $invoices_student->Debit= 0.00;
            $invoices_student->credit=$request->credit;
            $invoices_student->description= $request->description;
            $invoices_student->save();

        DB::commit();
        toastr()->success(trans('messages.Updat'));
        return redirect()->route('ProcessingFees.index');
        }

        catch (\Exception $e) {
         DB::rollback();
         return redirect()->back()->withErrors(['error' => $e->getMessage()]);
     } 

    }

    public function destroy($request){
    
        try {
            Processing_Fees::destroy($request->id);
            toastr()->error(trans('messages.Delete'));
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    


}