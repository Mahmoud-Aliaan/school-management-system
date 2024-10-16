<?php

namespace App\Models;

use App\Models\Quizze;
use App\Models\student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class degree extends Model
{
    use HasFactory;

    public function student()
    {
        return $this->belongsTo(student::class, 'student_id');
    }
    public function quizze()
    {
        return $this->belongsTo(Quizze::class, 'quizze_id');
    }
}
