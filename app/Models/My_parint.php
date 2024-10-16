<?php

namespace App\Models;


use App\Models\Nationalitie;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class My_parint extends Authenticatable
{
    use HasFactory;
    use HasTranslations;
   
    public $translatable = ['Name_Father','Job_Father','Name_Mother','Job_Mother'];
    protected $table = 'my_parints';
    protected $guarded=[];
    public function national(){
        return $this->belongsTo(Nationalitie::class,'National_id_father','id');
    }
    
}
