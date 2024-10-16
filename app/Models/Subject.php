<?php

namespace App\Models;


use App\Models\Grade;
use App\Models\Teacher;
use App\Models\Classrom;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Subject extends Model
{
    use HasTranslations;
    // protected $guarded =[];
    public $translatable= ['name'];
    protected $fillable = ['name','grade_id','classroom_id','teacher_id'];

    
     //  غلاقه الاقسام مع المغلمين
     public function teachers(){ return $this->belongsTo(Teacher::class, 'teacher_id', 'id'); }

     public function Grade() { return $this->belongsTo(Grade::class, 'Grade_id' , 'id'); }

    public function classroom() { return $this->belongsTo(Classrom::class, 'Classroom_id' , 'id'); }
}
