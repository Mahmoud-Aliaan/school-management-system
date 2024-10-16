<?php 

namespace App\Http\Controllers\traits ;


use app\Providers\RouteServiceProvider;
trait authLogintrait{

    public function chektype($request){
        if($request->type == 'student'){
            $gurdName= 'student';
        }elseif($request->type == 'parint' ){
            $gurdName= 'parint';
        }elseif($request->type == 'teacher'){
            $gurdName = 'teacher';
        }else{$gurdName = 'web';}
    
        return $gurdName;
       }
       
       public function redirectto($request){

        if($request->type == 'student'){
            return redirect()->intended(RouteServiceProvider::STUDENT);
        }elseif($request->type == 'parint'){
            return redirect()->intended(RouteServiceProvider::PARINT);
        }elseif($request->type == 'teacher'){
            return redirect()->intended(RouteServiceProvider::TEACHER);
        }
       else{
        return redirect()->intended(RouteServiceProvider::HOME);

       }
    }
}