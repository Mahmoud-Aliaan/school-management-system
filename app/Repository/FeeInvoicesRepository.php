<?php 

namespace App\Repository;

use App\Models\Grade;
use App\Models\student;
use App\Models\Accounts;

use App\Models\Fees_Invoices;
use App\Models\Invoices_student;
use Illuminate\Support\Facades\DB;
use App\Repository\FeeInvoicesRepository;
use App\Repository\FeeInvoicesRepositoryInterface;

class FeeInvoicesRepository implements FeeInvoicesRepositoryInterface{

    public function index(){
        $Fees_Invoices= Fees_Invoices::all();
        $Grades= Grade::all();
        return view('pages.Fees_Invoices.index', compact('Fees_Invoices', 'Grades'));
    }

public function show($id){

   $student = student::FindOrfail($id);
   $Accounts= Accounts::where('Classroom_id', $student->Classroom_id)->get();
   return view('pages.Fees_Invoices.add', compact('student', 'Accounts'));
}

public function edit($id){
   $Fees_Invoices = Fees_Invoices::FindOrfail($id);
   $Accounts= Accounts::where('Classroom_id', $Fees_Invoices->Classroom_id)->get();
   return view('pages.Fees_Invoices.edit', compact('Fees_Invoices', 'Accounts'));
}

public function store($request){

    $lest_FeesInvoices= $request->lest_FeesInvoices; 

    DB::beginTransaction();

    try{

        
        foreach($lest_FeesInvoices as $Fees_Invoice){    
            //add data in DB table=> Fees_Invoices     فواتير الرسوم الدراسية   
            $Fees = new Fees_Invoices();
            $Fees->invoice_date = date('Y-m-d');
            $Fees->student_id= $Fees_Invoice['student_id'];
            $Fees->account_id= $Fees_Invoice['Account'];
            $Fees->amount= $Fees_Invoice['amount'];
            $Fees->description= $Fees_Invoice['description'];

            $Fees->Grade_id= $request->Grade_id;
            $Fees->Classroom_id= $request->Classroom_id;
            $Fees->save();

             //add data in DB table=> invoices_students   حسابات الطلاب 
            $invoices_student= new Invoices_student();
          
            $invoices_student->date = date('Y-m-d');
            $invoices_student->type = 'invoice';
            $invoices_student->fees_invoice_id = $Fees->id;    
            $invoices_student->student_id= $Fees_Invoice['student_id'];
            $invoices_student->Debit=$Fees_Invoice['amount'];
            $invoices_student->credit= 0.00;
            $invoices_student->description= $Fees_Invoice['description'];

          
            $invoices_student->save();
        }

        DB::commit();
        toastr()->success(trans('messages.success'));
        return redirect()->route('Fees_invoices.index');

    }catch (\Exception $e) {
        DB::rollback();
        
         return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
 
}


public function update($request){

    DB::beginTransaction();

    try{

        
       
            //add data in DB table=> Fees_Invoices     فواتير الرسوم الدراسية   
            $Fees =  Fees_Invoices::FindOrfail( $request->id);
            $Fees->account_id= $request->Account_id;                    
            $Fees->amount= $request->amount;
            $Fees->description= $request->description;           
            $Fees->save();

             //add data in DB table=> invoices_students   حسابات الطلاب 
            $invoices_student=  Invoices_student::where('fees_invoice_id', $request->id)->first();                         
            $invoices_student->Debit=$request->amount;           
            $invoices_student->description= $request->description;         
            $invoices_student->save();
        

        DB::commit();
        toastr()->success(trans('messages.Updat'));
        return redirect()->route('Fees_invoices.index');

    }catch (\Exception $e) {
        DB::rollback();
        
         return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }

}

public function destroy($request){
    Fees_Invoices::destroy($request->id);
    toastr()->error(trans('messages.Delete'));
    return redirect()->route('Fees_invoices.index');

}

}

