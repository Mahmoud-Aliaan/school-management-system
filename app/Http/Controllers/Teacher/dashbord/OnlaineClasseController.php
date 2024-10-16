<?php

namespace App\Http\Controllers\Teacher\dashbord;

use App\Models\Grade;
use App\Models\online_classe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OnlaineClasseController extends Controller
{
   // resources\views\pages\Teacher\dashbord\OnlaineClasse\index.blade.php
    // use MeetingZoomTrait;
    public function index(){
        $online_classes= online_classe::where('created_by', auth()->user()->email)->get();
        return view('pages.Teacher.dashbord.OnlaineClasse.index' ,compact('online_classes'));
    }
    public function create(){
        $Grades= Grade::all();
        return view('pages.Teacher.dashbord.OnlaineClasse.create' ,compact('Grades'));
    }

    public function inderectcreate(){
        
        $Grades= Grade::all();
        return view('pages.Teacher.dashbord.OnlaineClasse.indirect' ,compact('Grades'));
   }

   public function inderectstore(Request $request){
       
    try {

        online_classe::create([
            'Grade_id'=>$request->Grade_id,
            'Classroom_id'=>$request->Classroom_id,
            'section_id'=>$request->section_id,
            'created_by'=>auth()->user()->email,
            'meeting_id'=>$request->meeting_id,
            'topic'=>$request->topic,
            'start_at'=>$request->start_time,
            'duration' => $request->duration,
            'password' => $request->password,
            'start_url' => $request->start_url,
            'join_url' => $request->join_url,
                
                ]) ;
        
                toastr()->success(trans('messages.success'));
                return redirect()->route('online_classe.index');
        }
    
         catch (\Exception $e) {
              
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }	
}

public function destroy( request $request){

online_classe::destroy($request->id);
toastr()->success(trans('messages.Delete'));
return redirect()->route('online_classe.index');
}


}
