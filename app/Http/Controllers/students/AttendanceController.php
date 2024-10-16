<?php

namespace App\Http\Controllers\students;
use App\Http\Controllers;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\AttendanceStudentRepositoryInterface;

class AttendanceController extends Controller
{
   protected $attendance;

   public function __construct(AttendanceStudentRepositoryInterface $attendance ) {
    $this->attendance = $attendance;
   }
    public function index()
    {
        return $this->attendance->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->attendance->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
       return $this->attendance->show($id);
    }

    
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
