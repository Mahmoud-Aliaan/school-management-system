<?php

namespace App\Http\Controllers\students\dashbord;

use App\Models\student;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class profailController extends Controller
{
    public function index(){
        $information= student::findOrfail(auth()->user()->id);
       // return $information;
        return view('pages.students.dashbord.profile.profile' , compact('information'));
    }

    public function update(Request $request , $id){
        try{

            $data= student::findOrfail($id);
            if(empty($request->password)){
                $data->name= ['en'=>$request->name_en , 'ar'=>$request->name_ar];
                $data->save();
            }else{
                $data->name= ['en'=>$request->name_en , 'ar'=>$request->name_ar];
                $data->password=  Hash::make($request->password);
                $data->save();
            }

                toastr()->success(trans('messages.Updat'));
                return redirect()->back();
            }

            catch (\Exception $e) {
                   DB::rollback();
                   return redirect()->back()->withErrors(['error' => $e->getMessage()]);
               }
    }
}
