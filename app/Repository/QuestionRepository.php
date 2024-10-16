<?php
namespace App\Repository;

use App\Models\Quizze;
use App\Models\Subject;
use App\Models\Question;
use App\Repository\QuestionRepositoryInterface;

class QuestionRepository implements QuestionRepositoryInterface{

    public function index(){
        $Questions= Question::all();
        return view('pages.Questions.index' ,compact('Questions'));
    }

    public function create(){
        $Quizzes= Quizze::all();
        return view('pages.Questions.add' , compact('Quizzes'));
    }

    public function store($request){
       
        try {

            Question::create([
                'title'=>['ar'=>$request->Name , 'en'=>$request->Name_en],
                'answers'=>$request->answers,
                'right_answer'=>$request->right_answer,
                'score'=>$request->score_id,
                'quizze_id'=>$request->Quizze_id,                
            ]);
           
                    toastr()->success(trans('messages.success'));
                    return redirect()->route('Questions.create');
            }        
             catch (\Exception $e) {
                  
                    return redirect()->back()->withErrors(['error' => $e->getMessage()]);
                }	
    }

    public function edit($id){
        $Question = Question::FindOrfail($id);
        $Quizzes= Quizze::all();
        return view('pages.Questions.edit' ,compact('Question','Quizzes'));
    }

    public function update($request){
        try {


            $Question =Question::FindOrfail($request->id);
            $Question->title= ['ar'=>$request->Name , 'en'=>$request->Name_en];
            $Question->answers= $request->answers;
            $Question->right_answer=$request->right_answer;
            $Question->score= $request->score_id;
            $Question->quizze_id= $request->Quizze_id;
            $Question->save();

            
           
                    toastr()->success(trans('messages.Updat'));
                    return redirect()->route('Questions.index');
            }        
             catch (\Exception $e) {
                  
                    return redirect()->back()->withErrors(['error' => $e->getMessage()]);
                }	
    }
}