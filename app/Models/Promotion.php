<?php

namespace App\Models;

use App\Models\Grade;
use App\Models\student;
use App\Models\Classrom;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Promotion extends Model
{
    use HasFactory;

   
    protected $guarded =[];

    public function student()     { return $this->belongsTo(student::class, 'student_id' , 'id'); }

    public function Grade()     { return $this->belongsTo(Grade::class, 'from_grade' , 'id'); }

    public function classroom() { return $this->belongsTo(Classrom::class, 'from_Classroom' , 'id'); }
       
    public function section()   { return $this->belongsTo(sections::class, 'from_section' , 'id'); }

    public function Grade_New()     { return $this->belongsTo(Grade::class, 'to_grade' , 'id'); }

    public function classroom_New() { return $this->belongsTo(Classrom::class, 'to_Classroom' , 'id'); }
       
    public function section_New()   { return $this->belongsTo(sections::class, 'to_section' , 'id'); }
}
