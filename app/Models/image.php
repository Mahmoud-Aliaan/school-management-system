<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class image extends Model
{
    use HasFactory;

    protected $guarded=[];
    
    public function imageable(): MorphTo
    {
        return $this->morphTo();
    }
}
