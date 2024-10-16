<?php

namespace App\Models;

use App\Models\Grade;
use App\Models\Classrom;
use App\Models\sections;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable=[
        'student_id',
        'grade_id',
        'classroom_id',
        'section_id',
        'teacher_id',
        'attendence_date',
        'attendence_status',
    ];

    public function Grade()     { return $this->belongsTo(Grade::class, 'grade_id' , 'id'); }
    public function classroom() { return $this->belongsTo(Classrom::class, 'classroom_id' , 'id'); }
    public function section()   { return $this->belongsTo(sections::class, 'section_id' , 'id'); }
    public function student(){return $this->belongsTo('App\Models\student', 'student_id');}
}
