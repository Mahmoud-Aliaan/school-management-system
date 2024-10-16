<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fees_Invoices extends Model
{
    use HasFactory;

    public function student()     { return $this->belongsTo(student::class, 'student_id' , 'id'); }

    public function Accounts()     { return $this->belongsTo(Accounts::class, 'account_id' , 'id'); }

    public function Grade()     { return $this->belongsTo(Grade::class, 'Grade_id' , 'id'); }

    public function classroom() { return $this->belongsTo(Classrom::class, 'Classroom_id' , 'id'); }
       
}
