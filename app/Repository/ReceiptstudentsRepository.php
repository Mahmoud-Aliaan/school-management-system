<?php 

namespace App\Repository;

use App\Models\student;
use App\Models\Found_account;
use App\Models\recipt_student;
use App\Models\Invoices_student;
use Illuminate\Support\Facades\DB;
use App\Repository\ReceiptstudentsRepositoryInterface;

class ReceiptstudentsRepository implements ReceiptstudentsRepositoryInterface{

    public function index(){
      $receipt_students= recipt_student::all();
      return view('pages.receipt.index', compact('receipt_students'));
    }

    public function show($id){
       $student= student::FindOrfail($id);
       return view('pages.receipt.add', compact('student'));
    }

    public function edit($id){

        $receipt_student= recipt_student::FindOrfail($id);
        return view('pages.receipt.edit', compact('receipt_student'));
    }


    public function store($request){       	 
        DB::beginTransaction();
        try {
                // حفظ البيانات في جدول سندات القبض
                $recipt_students = new recipt_student();
                $recipt_students->date= date('y-m-d');
                $recipt_students->student_id= $request->student_id;
                $recipt_students->Debit= $request->Debit;
                $recipt_students->description= $request->description;
                $recipt_students->save();

                // حفظ البيانات في جدول الصندوق
                $Found_accounts= new Found_account();
                $Found_accounts->date= date('y-m-d');
                $Found_accounts->receipt_id= $recipt_students->id;
                $Found_accounts->Debit=$request->Debit;
                $Found_accounts->credit=  0.00;
                $Found_accounts->description= $request->description;
                $Found_accounts->save();

                // حفظ البيانات في جدول حساب الطالب
                $student_accounts= new Invoices_student();
                $student_accounts->date= date('y-m-d');
                $student_accounts->type= 'receipt';
                $student_accounts->receipt_id=$recipt_students->id;
                $student_accounts->student_id= $request->student_id;
                $student_accounts->Debit= 0.00;
                $student_accounts->credit= $request->Debit;
                $student_accounts->description= $request->description;
                $student_accounts->save();

            DB::commit();
            toastr()->success(trans('messages.Updat'));
            return redirect()->route('receipt_students.index');
       }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request){              
	 DB::beginTransaction();
     try {

         // تعديل البيانات في جدول سندات القبض

         $recipt_students =  recipt_student::FindOrfail($request->receipt_student_id);
         $recipt_students->date= date('y-m-d');
         $recipt_students->student_id= $request->student_id;
         $recipt_students->Debit= $request->Debit;
         $recipt_students->description= $request->description;
         $recipt_students->save();

           // تعديل البيانات في جدول الصندوق

           $Found_accounts=  Found_account::where('receipt_id',$request->receipt_student_id)->first();
           $Found_accounts->date= date('y-m-d');
           $Found_accounts->receipt_id= $recipt_students->id;
           $Found_accounts->Debit=$request->Debit;
           $Found_accounts->credit=  0.00;
           $Found_accounts->description= $request->description;
           $Found_accounts->save();


         DB::commit();
         toastr()->success(trans('messages.Updat'));
         return redirect()->route('receipt_students.index');
    }

  catch (\Exception $e) {
         DB::rollback();
         return redirect()->back()->withErrors(['error' => $e->getMessage()]);
     }
    }


    public function  destroy( $request){
        
        recipt_student::destroy($request->id);
        toastr()->error(trans('messages.Delete'));
         return redirect()->route('receipt_students.index');
    }
}