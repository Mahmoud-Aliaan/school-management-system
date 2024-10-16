<?php

namespace App\Http\Controllers\students\dashbord;



use App\Models\Quizze;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class examController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Quizzes= Quizze::where('Grade_id', auth()->user()->Grade_id)
        ->where('Classroom_id', auth()->user()->Classroom_id)
        ->where('section_id', auth()->user()->section_id)
        ->orderBy('id', 'DESC')
        ->get();
         //return $ques;
        
        return view('pages.students.dashbord.exam.index', compact('Quizzes'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show( $quizze_id)
    {
       $student_id= Auth::user()->id;
       
      return view('pages.students.dashbord.exam.show',compact('student_id','quizze_id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
