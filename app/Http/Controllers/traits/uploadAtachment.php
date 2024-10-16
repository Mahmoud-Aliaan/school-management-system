<?php

namespace App\Http\Controllers\trait;

use Illuminate\Support\Facades\Storage;


trait uploadAtachment{
    public function Uploadfile( $request , $name , $folder){

        $file= $request->file($name)->getClientOriginalName();
   
       $request->file($name)->storeAs('attachments/'.$folder.'/',$file,'upload_attachments');
   
    }
    
    public function deletefaile( $name , $Failename){

        $faile= Storage::disk('upload_attachments')->exists('attachments/'.$Failename.'/'.$name);

    if($faile){
        Storage::disk('upload_attachments')->delete('attachments/'.$Failename.'/'.$name);
    }

    
}
}