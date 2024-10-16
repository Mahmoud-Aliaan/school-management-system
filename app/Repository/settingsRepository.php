<?php

namespace App\Repository;

use App\Models\setting;
use App\Repository\settingsRepositoryInterface;
use app\Http\Controllers\Traits\UploadAtchhmentTrait;

class settingsRepository implements settingsRepositoryInterface{

   
    use UploadAtchhmentTrait;
    public function index(){
        $collectons= setting::all();
        
       $setting ['setting']= $collectons->flatMap(function ($collectons){
         return[ $collectons->key => $collectons->value] ;
 
         // this flatmap return colections = assotefarray= key&value = phone => 010100;
       });
 
      // return $setting;
        return view('pages.settings.index', $setting);
     }

     public function update($request){
        $info= $request->except('_token', '_method' , 'logo');
       
        // foreach($info as $key=>$value){
        //     setting::where('key', $key )->update(['value'=>$value]) ;
        // }

        $key= array_keys($info);
        $value= array_values($info);
        for($i=0; $i<count($info); $i++){
            setting::where('key', $key[$i])->update(['value'=>$value[$i]]);       
        }

        if($request->hasFile('logo')){
            $file= $request->file('logo')->getClientOriginalName();
            return $name;
             setting::where('key','logo')->update(['value'=>$file]);
             $this->Uploadfile($request, 'logo' , 'logo');
        }
        toastr()->success(trans('messages.Success'));
      return redirect()->route('settings.index');

    }
}
    
