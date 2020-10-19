<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;
    protected $table = "trainers";
    protected $fillable = ['full_name','occupation','photo'];

    public function products(){
    	return $this->belongsToMany('App\Models\Product');
    }
}
}
