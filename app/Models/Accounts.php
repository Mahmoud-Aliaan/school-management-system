<?php

namespace App\Models;

use App\Models\Grade;
use App\Models\Classrom;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Accounts extends Model
{
    use HasTranslations;
    use HasFactory;

    public $translatable = ['title'];
    protected $fillable=['title','amount','Grade_id','Classroom_id','year','description'];

    public function Grade()     { return $this->belongsTo(Grade::class, 'Grade_id' , 'id'); }

    public function classroom() { return $this->belongsTo(Classrom::class, 'Classroom_id' , 'id'); }
}
