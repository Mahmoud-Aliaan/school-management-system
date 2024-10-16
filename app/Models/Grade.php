<?php

namespace App\Models;

//use App\Models\sections;
use App\Models\sections;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grade extends Model 
{
    use HasTranslations , HasFactory;

    public $translatable= ['name'];
   
    protected $fillable = ['name','notes'];
    protected $table = 'grades';
    public $timestamps = true;

    // public function sections()
    // {
    //     return $this->hasMany(sections::class, 'Grade_id' , 'id');
    // }

    public function sections()
    {
        return $this->hasMany('App\Models\sections', 'Grade_id' , 'id');
    }
}

