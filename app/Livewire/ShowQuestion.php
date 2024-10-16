<?php

namespace App\Livewire;

use App\Models\degree;
use Livewire\Component;
use App\Models\Question;

class ShowQuestion extends Component
{
    public $quizze_id , $student_id , $data , $counter=0 ,$question_counter=0;

    public function render()
    {
      
        $this->data= Question::where('quizze_id',$this->quizze_id)->get();
        // dd($this->data);
        $this->question_counter= $this->data->count();
        
        return view('livewire.show-question' , ['data' , 'count']);
    }

 public function nextQuestion($question_id , $score,$right_answer,$answer ){
     $degree= degree::where('student_id',$this->student_id)->where('quizze_id',$this->quizze_id)->first();
     if($degree==null){
        $degree_new=new Degree();
        $degree_new->question_id=$question_id;
        $degree_new->student_id=$this->Student_id;
        $degree_new->quizze_id=$this->quize_id;
        $degree_new->abuse='0';

        if(!strcmp(trim($answer),trim($right_answer)))
            $degree_new->score+=$score;
        else
        $degree_new->score+=0;
        $degree_new->date=date('Y-m-d');
        $degree_new->save();
        
        }
        
        else{
            if( $degree->question_id >=$this->data[$this->counter]->id){
                $degree->score=0;
                $degree->abuse='1';
                $degree->save();
                toastr()->error('لقد حدث تلاعب في الاتحان');
                return redirect()->route('Student_Exams.index');
            }
            $degree->question_id=$question_id;
            if(!strcmp(trim($answer),trim($right_answer)))
                $degree->score+=$score;
            else
            $degree->score+=0;
            $degree->abuse=0;
            $degree->save();
           }
          
        

        





       if($this->counter<$this->question_counter-1){
        $this->counter++;
               }else{
                toastr()->success('تم انهاء الامتحان');
        return redirect()->route('Student_Exams.index');
               }
}
}