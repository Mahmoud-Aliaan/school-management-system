<?php

namespace App\Models;


use App\Models\degree;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quizze extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable= ['name'];
   
    protected $fillable = ['name','subject_id' ,'Grade_id' ,'Classroom_id' ,'section_id' , 'teacher_id'];

    public function Grade()     { return $this->belongsTo(Grade::class, 'Grade_id' , 'id'); }

    public function classroom() { return $this->belongsTo(Classrom::class, 'Classroom_id' , 'id'); }
       
    public function section()   { return $this->belongsTo(sections::class, 'section_id' , 'id'); }
    public function teachers(){ return $this->belongsTo(Teacher::class,   'teacher_id'); }
    public function subject(){ return $this->belongsTo(Subject::class,   'subject_id'); }
    public function degree(){ return $this->hasMany(degree::class,'quizze_id','id'); }
}
