<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\traits\authLogintrait;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use authLogintrait;
    

    //use AuthenticatesUsers;

    
   // protected $redirectTo = RouteServiceProvider::HOME;

   
//    public function __construct()
//    {
//        $this->middleware('guest')->except('logout');
//    }
    public function loginform($type){
        return view('auth.login', compact('type'));
    }

   public function login(Request $request){
    // return $request;
   if(Auth::guard($this->chektype($request))->attempt(['email'=>$request->email, 'password'=>$request->password])){
    return $this->redirectto($request);
   } else{
    return redirect()->back()->with('message', 'يوجد خطا في كلمة المرور او اسم المستخدم');
}  
  
 }

public function logout(Request $request,$type)
{
    // return $type;
    Auth::guard($type)->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
}

}