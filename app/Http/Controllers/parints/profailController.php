<?php

namespace App\Http\Controllers\parints;

use App\Models\parint;
use App\Models\My_parint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class profailController extends Controller
{
    public function profail_parint(){
        $information= My_parint::findOrfail(auth()->user()->id);
       // return $information;
      
        return view('pages.pairents.profile.profile' , compact('information'));
    }

    public function update(Request $request , $id){
        
        try{

            $data= My_parint::findOrfail($id);
            if(empty($request->password)){
                $data->Name_Father= ['en'=>$request->name_en , 'ar'=>$request->name_ar];
                $data->save();
            }else{
                $data->Name_Father= ['en'=>$request->name_en , 'ar'=>$request->name_ar];
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
