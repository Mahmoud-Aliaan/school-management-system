<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parentattachment extends Model
{
    use HasFactory;
    protected $fillable=['file_name','parent_id'];
   // protected  $table= "parentattachments";
}
