<?php

namespace App\Http\Controllers\Teacher\dashbord;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class ProfailController extends Controller
{
    public function index(){
        $information= Teacher::findOrfail(auth()->user()->id);
        //return $data;
        return view('pages.Teacher.dashbord.Profail.profail' , compact('information'));
    }

    public function update(Request $request , $id){
       // return $request; 
       try{

            $data= Teacher::findOrfail($id);
            if(empty($request->password)){
                $data->Name= ['en'=>$request->Name_en , 'ar'=>$request->Name_ar];
                $data->save();
            }else{
                $data->Name= ['en'=>$request->Name_en , 'ar'=>$request->Name_ar];
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
