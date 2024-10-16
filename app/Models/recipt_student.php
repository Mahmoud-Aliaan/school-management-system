<?php

namespace App\Models;

use App\Models\student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class recipt_student extends Model
{
    use HasFactory;

    public function student(){ return $this->belongsTo(student::class, 'student_id' , 'id'); }
    
    public function Grade()     { return $this->belongsTo(Grade::class, 'Grade_id' , 'id'); }

    public function classroom() { return $this->belongsTo(Classrom::class, 'Classroom_id' , 'id'); }
       
    public function section()   { return $this->belongsTo(sections::class, 'section_id' , 'id'); }
}
