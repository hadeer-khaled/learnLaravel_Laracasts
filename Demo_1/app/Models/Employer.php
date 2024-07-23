<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Job ; 
use App\Models\User ;

class Employer extends Model
{
    use HasFactory;

    protected $fillable = ["name" ,];
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function user() : BelongTo{
        return $this->belongsTo(User::class);
    }
}
