<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;
    
    function essaymany(){
        return $this->belongsToMany('App\Models\essay');
        
            }
   
}
