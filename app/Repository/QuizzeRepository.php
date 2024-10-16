<?php 

namespace App\Repository;

use App\Models\Grade;
use App\Models\Quizze;
use App\Models\Subject;
use App\Models\Teacher;


class QuizzeRepository implements QuizzeRepositoryInterface{
    public function index(){
        $Quizzes= Quizze::get();
        return view('pages.Quizzes.index' ,compact('Quizzes'));
    }

    public function create(){
        $data['Grades']= Grade::all();
        $data['Teachers']= Teacher::all();
        $data['Subjects']= Subject::all();
        return view('pages.Quizzes.add',  $data);
    }

    public function edit($id){
       $Quizzes= Quizze::FindOrfail($id);
        $data['Grades']= Grade::all();
        $data['Teachers']= Teacher::all();
        $data['Subjects']= Subject::all();
        return view('pages.Quizzes.edit',  $data ,compact('Quizzes'));
    }

    public function store($request){
        try {

                $Quizze= Quizze::create([
                    'name'=>['ar'=>$request->Name ,'en'=>$request->Name_en],
                    'subject_id'=>$request->subject_id,
                    'Grade_id'=>$request->Grade_id,
                    'Classroom_id'=>$request->Classroom_id,
                    'section_id'=>$request->section_id,
                    'teacher_id'=>$request->teacher_id,
                ]);
          
                    toastr()->success(trans('messages.success'));
                    return redirect()->route('Quizzes.create');
            }
        
             catch (\Exception $e) {
                 
                    return redirect()->back()->withErrors(['error' => $e->getMessage()]);
                }	
    }

    public function update($request){
        try {

            $Quizze= Quizze::FindOrfail($request->id);
            $Quizze->name=['ar'=>$request->Name ,'en'=>$request->Name_en];
            $Quizze->subject_id= $request->subject_id;
            $Quizze->Grade_id= $request->Grade_id;
            $Quizze->Classroom_id= $request->Classroom_id;
            $Quizze->section_id= $request->section_id;
            $Quizze->teacher_id= $request->teacher_id;
          
                    toastr()->success(trans('messages.Updat'));
                    return redirect()->route('Quizzes.index');
            }
        
             catch (\Exception $e) {
                 
                    return redirect()->back()->withErrors(['error' => $e->getMessage()]);
                }	
    }

    public function destroy($request){
        Quizze::destroy($request->id);
        toastr()->success(trans('messages.Delete'));
        return redirect()->route('Quizzes.index');
    }
}