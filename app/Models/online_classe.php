<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class online_classe extends Model
{
    use HasFactory;
    public $fillable= ['Grade_id','Classroom_id','section_id','created_by','meeting_id','topic','start_at','duration','password','start_url','join_url'];
    public function Grade()     { return $this->belongsTo(Grade::class, 'Grade_id' , 'id'); }

    public function classroom() { return $this->belongsTo(Classrom::class, 'Classroom_id' , 'id'); }
       
    public function section()   { return $this->belongsTo(sections::class, 'section_id' , 'id'); }
}
