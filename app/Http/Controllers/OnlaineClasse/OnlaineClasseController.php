<?php

namespace App\Http\Controllers\OnlaineClasse;

use auth;
use App\Models\Grade;
use Illuminate\Http\Request;
use App\Models\online_classe;
use App\Http\Controllers\Controller;
use App\Http\Controllers\traits\MeetingZoomTrait;
use App\Http\Controllers\OnlaineClasse\OnlaineClasseController;



class OnlaineClasseController extends Controller
{
    use MeetingZoomTrait;
    public function index(){
        $online_classes= online_classe::where('created_by', auth()->user()->email);
        return view('pages.OnlaineClasse.index' ,compact('online_classes'));
    }

    public function create(){
        $Grades= Grade::all();
        return view('pages.OnlaineClasse.create' ,compact('Grades'));
    }

    
    public function store(Request $request){         
       
    //  return   $meeting = $this->createMeeting($request);          

    //     online_classe::create([
    //         'Grade_id'=>$request->Grade_id,
    //         'Classroom_id'=>$request->Classroom_id,
    //         'section_id'=>$request->section_id,
    //         'user_id'=>auth()->user()->id,
    //         'meeting_id'=>$meeting->id,
    //         'topic'=>$request->topic,
    //         'start_at'=>$request->start_time,
    //         'duration' => $meeting->duration,
    //         'password' => $meeting->password,
    //         'start_url' => $meeting->start_url,
    //         'join_url' => $meeting->join_url,
                
    //             ]) ;

            
    //                 toastr()->success(trans('messages.success'));
    //                 return redirect()->route('online_classe.index');

    return $not= "not work to day";
    }

    // coneted inderec Zoom

    public function inderectcreate(){
        
        $Grades= Grade::all();
        return view('pages.OnlaineClasse.indirect' ,compact('Grades'));
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
