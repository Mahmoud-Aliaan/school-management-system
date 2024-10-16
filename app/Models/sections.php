<?php

namespace App\Models;

use App\Models\Grade;
use App\Models\Teacher;
use App\Models\Classrom;
use App\Models\sections;
use Illuminate\Database\Eloquent\Model;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class sections extends Model
{
    use HasTranslations;
    use HasFactory;
    protected $table = 'sections';
    protected $fillable = ['section_name','Grade_id','Class_id'];
    public $translatable= ['section_name'];
    public $timestamps = true;
    

     // علاقة بين الاقسام والصفوف لجلب اسم الصف في جدول الاقسام

     public function My_classs()
     {
         return $this->belongsTo(Classrom::class , 'Class_id');
     }
    //  غلاقه الاقسام مع المغلمين
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'teacher_sections' , 'section_id' , 'teacher_id');
    }

    public function Grade(){ return $this->belongsTo(Grade::class, 'Grade_id');}
}
