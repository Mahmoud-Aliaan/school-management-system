<?php

namespace App\Models;

use App\Models\Grade;
use App\Models\image;
use App\Models\Gender;
use App\Models\student;
use App\Models\Classrom;
use App\Models\sections;
use App\Models\My_parint;
use App\Models\Invoices_student;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class student extends Authenticatable
{
    use HasTranslations;
    use HasFactory;
    use SoftDeletes;

    protected $table = 'students';
    protected $guarded =[];
    public $translatable= ['name'];
    public $timestamps = true;

     // علاقة بين الطالب والانواع لجلب جنس المعلم
     public function gender()    { return $this->belongsTo(Gender::class, 'gender_id' , 'id'); }

     public function Nationalitie()    { return $this->belongsTo(Nationalitie::class, 'nationalitie_id' , 'id'); }

     public function Grade()     { return $this->belongsTo(Grade::class, 'Grade_id' , 'id'); }

     public function classroom() { return $this->belongsTo(Classrom::class, 'Classroom_id' , 'id'); }
        
     public function section()   { return $this->belongsTo(sections::class, 'section_id' , 'id'); }

     public function My_parint()   { return $this->belongsTo(My_parint::class, 'parent_id' , 'id'); }
    
    public function Nationality() { return $this->belongsTo(Gender::class, 'gender_id' , 'id'); }

    public function images():MorphMany{ return $this->morphMany(image::class, 'imageable');}

    public function Invoices_student()     { return $this->hasmany(Invoices_student::class, 'student_id' , 'id'); }

     // علاقة بين جدول الطلاب وجدول الحضور والغياب
     public function attendance()
     {
         return $this->hasMany('App\Models\Attendance', 'student_id');
     }
}