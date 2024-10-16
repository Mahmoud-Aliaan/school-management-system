<?php

namespace App\Models;

use App\Models\Quizze;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable= ['title'];
   
    protected $fillable = ['title','answers' ,'right_answer' ,'score' ,'quizze_id' ];

    public function Quizze()     { return $this->belongsTo(Quizze::class, 'quizze_id' , 'id'); }
}
