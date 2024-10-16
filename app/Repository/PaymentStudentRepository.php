<?php

namespace App\Repository;

use App\Models\student;
// use App\Models\Payment_Student;
use App\Models\Payment_Student;
use App\Models\Found_account;
use App\Models\Invoices_student;
use Illuminate\Support\Facades\DB;
use App\Repository\PaymentStudentRepositoryInterface;


class PaymentStudentRepository implements PaymentStudentRepositoryInterface{

    public function index(){
        $Payments= Payment_Student::all();
        return view('pages.Payment.index' ,compact('Payments'));
    }
    public function show($id){
       $student= student::FindOrfail($id) ;
       return view('pages.Payment.add' , compact('student'));
    }

    public function edit($id){
        $Payment= Payment_Student::FindOrfail($id) ;
        return view('pages.Payment.edit' , compact('Payment'));
    }
    public function store($request){
       
        DB::beginTransaction();

        try {
          
           
             // حفظ البيانات في جدول سندات الصرف
            $Payment= new Payment_Student();
            $Payment->date= date('y-m-d');
            $Payment->student_id= $request->student_id;
            $Payment->amount= $request->credit;
            $Payment->description= $request->description;
            $Payment->save();

             // حفظ البيانات في جدول الصندوق
            $Found_account = new Found_account();
            $Found_account->date= date ('y-m-d');
            $Found_account->payment_id =$Payment->id;
           
            $Found_account->Debit= 0.00;
            $Found_account->credit= $request->credit;
            $Found_account->description= $request->description;
            $Found_account->save();

             //حفظ البيانات في جدول حساب الطالب
            $invoices_student= new Invoices_student();
            $invoices_student->date= date('y-m-d');
            $invoices_student->type='Payment';
            $invoices_student->payment_id= $Payment->id;
            $invoices_student->student_id= $request->student_id;
            $invoices_student->Debit= $request->credit;
            $invoices_student->credit= 0.00;
            $invoices_student->description= $request->description;
            $invoices_student->save();            

	        DB::commit();
            toastr()->success(trans('messages.success'));
            return redirect()->route('PaymentStudents.index');
	    }

	 catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }	
    }

    public function update($request){
        DB::beginTransaction();

        try {
         
           
             // حفظ البيانات في جدول سندات الصرف
            $Payment=  Payment_Student::FindOrfail($request->Payment_id);
            $Payment->date= date('y-m-d');
            $Payment->student_id= $request->student_id;
            $Payment->amount= $request->credit;
            $Payment->description= $request->description;
            $Payment->save();

             // حفظ البيانات في جدول الصندوق
            $Found_account =  Found_account::where('payment_id', $request->Payment_id)->first();
            $Found_account->date= date ('y-m-d');
            $Found_account->payment_id =$Payment->id;
           
            $Found_account->Debit= 0.00;
            $Found_account->credit= $request->credit;
            $Found_account->description= $request->description;
            $Found_account->save();

             //حفظ البيانات في جدول حساب الطالب
            $invoices_student=  Invoices_student::where('payment_id', $request->Payment_id)->first();
            $invoices_student->date= date('y-m-d');
            $invoices_student->type='Payment';
            $invoices_student->payment_id= $Payment->id;
            $invoices_student->student_id= $request->student_id;
            $invoices_student->Debit= $request->credit;
            $invoices_student->credit= 0.00;
            $invoices_student->description= $request->description;
            $invoices_student->save();            

	        DB::commit();
            toastr()->success(trans('messages.Updat'));
            return redirect()->route('PaymentStudents.index');
	    }

	 catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }	
    }

   public function destroy($request){

    $Payment=  Payment_Student::destroy($request->id);
    toastr()->success(trans('messages.Delete'));
    return redirect()->route('PaymentStudents.index');
   }
    


}