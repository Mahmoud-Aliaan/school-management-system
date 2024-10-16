<?php


namespace App\Repository; 

use App\Models\Grade;
use App\Models\Accounts;
use App\Repository\AccountRepositoryinterface;

class AccountRepository implements AccountRepositoryinterface{
    
    public function index(){
        $Accounts= Accounts::all();
        return view('pages.Accounts.index', compact('Accounts'));
    }

    public function create_Pay(){

        $Grades= Grade::all();
        return view('pages.Accounts.add', compact('Grades'));
        
    }

    public function add_Pay(  $request){
        try{
            $Account = new Accounts();
            $Account->title= ['en' => $request->title_en, 'ar' => $request->title_ar];
            $Account->amount= $request->amount;
            $Account->Grade_id  =$request->Grade_id;
            $Account->Classroom_id  =$request->Classroom_id;
            $Account->description  =$request->description;
            $Account->year  =$request->year;
            $Account->Fee_type=$request->Fee_type;
            $Account->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('Accounts.create');

        }catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
       
    }

    public function edit($id){
        $Account= Accounts::FindOrfail($id);
        $Grades= Grade::all();
        return view('pages.Accounts.edit', compact('Grades' , 'Account'));
    }


    public function update($request){
        try{
           
            $Account= Accounts::FindOrfail($request->id);
            $Account->title= ['en' => $request->title_en, 'ar' => $request->title_ar];
            $Account->amount= $request->amount;
            $Account->Grade_id  =$request->Grade_id;
            $Account->Classroom_id  =$request->Classroom_id;
            $Account->description  =$request->description;
            $Account->year  =$request->year;
            $Account->Fee_type=$request->Fee_type;
            $Account->save();
            toastr()->success(trans('messages.Updat'));
            return redirect()->route('Accounts.index');

        }catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }   
    }

    public function delete($request){
       
     //  Accounts::FindOrfail($request->id)->delete();
     Accounts::destroy($request->id);
      toastr()->error(trans('messages.Delete'));
      return redirect()->route('Accounts.index');

    }
}