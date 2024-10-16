<?php

namespace App\Http\Controllers\Teacher\dashbord;

use App\Models\Grade;
use App\Models\degree;
use App\Models\Quizze;
use App\Models\Subject;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuezziesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return "fhgkfha";
        // $Grades= Grade::all();
        $Quezzies= Quizze::where('teacher_id', auth()->user()->id)->get();
        return view('pages.Teacher.dashbord.students.Quezzies.index',compact('Quezzies'));
        
       // 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $data['Grades']= Grade::all();
       $data['Subjects']= Subject::where('teacher_id', auth()->user()->id)->get();
       //return  $data['Subjects'];
       return view('pages.Teacher.dashbord.students.Quezzies.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            // $Quezzies= new Quizze();
            $Quizze= Quizze::create([
                'name'=>['ar'=>$request->Name ,'en'=>$request->Name_en],
                'subject_id'=>$request->subject_id,
                'Grade_id'=>$request->Grade_id,
                'Classroom_id'=>$request->Classroom_id,
                'section_id'=>$request->section_id,
                'teacher_id'=> auth()->user()->id,
            ]);
      

           
                 toastr()->success(trans('messages.success'));
                return redirect()->route('Quezzies.index');
            }
        
             catch (\Exception $e) {
                   
                    return redirect()->back()->withErrors(['error' => $e->getMessage()]);
                }
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        //return $id;
       $Questions= Question::where('quizze_id',$id)->get();
       //return $Questions;
       $Quizzes= Quizze::findOrfail($id);
       return view('pages.Teacher.dashbord.students.Quezzies.show',compact('Quizzes','Questions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Quizzes= Quizze::findOrfail($id);
        $data['Grades']= Grade::all();
        $data['Subjects']= Subject::where('teacher_id', auth()->user()->id)->get();
        return view('pages.Teacher.dashbord.students.Quezzies.edit', $data,compact('Quizzes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {

            $Quizze= Quizze::FindOrfail($request->id);
            $Quizze->name=['ar'=>$request->Name ,'en'=>$request->Name_en];
            $Quizze->subject_id= $request->subject_id;
            $Quizze->Grade_id= $request->Grade_id;
            $Quizze->Classroom_id= $request->Classroom_id;
            $Quizze->section_id= $request->section_id;
            $Quizze->teacher_id= auth()->user()->id;
            $Quizze->save();
                    toastr()->success(trans('messages.Updat'));
                    return redirect()->route('Quezzies.index');
            }
        
             catch (\Exception $e) {
                 
                    return redirect()->back()->withErrors(['error' => $e->getMessage()]);
                }	
    }

    public function Quezzies_student($quezz_id){
         $degrees = degree::where('quizze_id', $quezz_id)->get();
        return view('pages.Teacher.dashbord.students.Quezzies.quezz_student', compact('degrees'));
    }
    
    public function Quezzie_repeat($id){
       $degree= degree::where('id', $id)->delete();
       toastr()->error(trans('messages.Delete'));
       return redirect()->back();
    }
    
    public function destroy(Request $request)
    {
        //return $request;
        Quizze::destroy($request->id);
        toastr()->error(trans('messages.Delete'));
                    return redirect()->route('Quezzies.index');
    }
}
