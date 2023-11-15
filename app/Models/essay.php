<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class essay extends Model
{
    use HasFactory;

    function studentmany(){
        return $this->belongsToMany('App\Models\student');
        
            }
}
