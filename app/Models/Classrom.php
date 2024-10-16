<?php

namespace App\Models;

// use App\Classrom;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Classrom extends Model 
{
    use HasTranslations;
    
    protected $fillable = ['Class_name','Grade_id'];
    public $translatable= ['Class_name'];
    protected $table = 'classrooms';
    public $timestamps = true;

    public function Borger()
    {
        return $this->belongsTo(Grade::class, 'Grade_id', 'id');
    }

}