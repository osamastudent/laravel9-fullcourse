<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable=['category_id','name','price','image', 'mime_type', 'file_size','status'];
    use HasFactory;

    public function Category(){
    return $this->belongsTo('App\Models\category','category_id','id');
    }
}

