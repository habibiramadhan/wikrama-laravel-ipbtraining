<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $fillable = ['name','email'];

    public function participants(){
    	return $this->belongsToMany('App\Models\Participant');
    }

    public function trainer(){
    	return $this->belongsToMany('App\Models\Trainer');
    }
}
