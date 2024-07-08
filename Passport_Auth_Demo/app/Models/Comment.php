<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function post(){
        $this->belongTo(Post::class);
    }
    public function user(){
        $this->belongTo(User::class);
    }
}
