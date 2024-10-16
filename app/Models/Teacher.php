<?php

namespace App\Models;


use App\Models\sections;
//use Illuminate\Database\Eloquent\Model;

use Spatie\Translatable\HasTranslations;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    use HasTranslations;
    public $translatable = ['Name'];
    protected $guarded=[];

     // علاقة بين المعلمين والتخصصات لجلب اسم التخصص
     public function specializations()
     {
         return $this->belongsTo('App\Models\Specialization', 'Specialization_id');
     }
 
     // علاقة بين المعلمين والانواع لجلب جنس المعلم
     public function genders()
     {
         return $this->belongsTo('App\Models\Gender', 'Gender_id');
     }

     // غلاقه المعلمين مع الاقسام
     public function sections()
    {
        return $this->belongsToMany(sections::class, 'teacher_sections', 'teacher_id' , 'section_id'  );
    }
 
}
