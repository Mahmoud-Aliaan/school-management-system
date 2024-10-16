<?php 

namespace App\Http\Controllers\traits;

use MacsiDigital\Zoom\Facades\Zoom;
use App\Http\Controllers\Traits\MeetingZoomTrait;

trait MeetingZoomTrait{

public function createmeeting($request){
  
  $user = Zoom::user()->first();
    
      $meetingData= [
        'topic' => $request->topic,
        'duration' => $request->duration,
        'password' => $request->password,
        'start_time' => $request->start_time,
        //'timezone' => config('zoom.timezone')
       'timezone' => 'Africa/Cairo'
      ] ; 
      //return $meetingData;

    $meeting = Zoom::meeting()->make([$meetingData]);
    
    $meeting->settings()->make([
        
            'join_before_host' => false,
            'host_video' => false,
            'participant_video' => false,
            'mute_upon_entry' => true,
            'waiting_room' => true,
            'approval_type' => config('zoom.approval_type'),
            'audio' => config('zoom.audio'),
            'auto_recording' => config('zoom.auto_recording')
      ]);

     //return $meeting;
  // dd ($meeting);
     return $user->meetings()->save($meeting);
}


}

