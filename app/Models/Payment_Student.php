<?php

namespace App\Models;

use App\Models\student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment_Student extends Model
{
    use HasFactory;
    protected $table = 'payment__students';
    public function student(){
        return $this->belongsTo(student::class, 'student_id' , 'id'); }
}
