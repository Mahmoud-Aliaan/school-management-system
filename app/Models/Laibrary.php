<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Laibrary extends Model
{
    use HasFactory;
    
    protected $table = 'laibraries';
    
    
    protected $fillable =['title','file_name'];
      
    public function Grade()     { return $this->belongsTo(Grade::class, 'Grade_id' , 'id'); }

    public function classroom() { return $this->belongsTo(Classrom::class, 'Classroom_id' , 'id'); }
       
    public function section()   { return $this->belongsTo(sections::class, 'section_id' , 'id'); }

}
