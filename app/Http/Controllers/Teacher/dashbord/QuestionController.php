<?php

namespace App\Http\Controllers\Teacher\dashbord;

use App\Models\Quizze;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
       // return $request;
        try {

            Question::create([ 
                'title'=>['ar'=>$request->title , 'en'=>$request->title_en],
                'answers'=>$request->answers,
                'right_answer'=>$request->right_answer,
                'score'=>$request->score,
                'quizze_id'=>$request->quizz_id,                
            ]);
           
                    toastr()->success(trans('messages.success'));
                    return redirect()->back();
            }        
             catch (\Exception $e) {
                  
                    return redirect()->back()->withErrors(['error' => $e->getMessage()]);
                }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $quizz_id= $id;
        return view('pages.Teacher.dashbord.students.Qusitions.create',compact('quizz_id'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      //  return $id;
      $Quizzes= Quizze::all();
      $Question= Question::findOrfail($id);
      return view('pages.Teacher.dashbord.students.Qusitions.edit',compact('Question' ,'Quizzes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
       // return $request;
        try {
        $Question= Question::findOrfail($request->id);
        $Question->title= ['ar'=>$request->title, 'en'=>$request->title_en];
        $Question->answers=$request->answers;
        $Question->right_answer=$request->right_answer;
        $Question->score= $request->score_id;
        $Question->quizze_id=$request->Quizze_id;
        $Question->save();

        
        toastr()->success(trans('messages.Updat'));
        return redirect()->route('Questions.show'); 
}        
 catch (\Exception $e) {
      
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $Question = Question::destroy($id);
       toastr()->success(trans('messages.Delete'));
        return redirect()->back(); 
    }
}
