<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ["title" , "content"];

     //if disable $fillable and enable the below guareded -> this mean no need to guard any property
     // protected $guareded = [] ;
}
