<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;
    protected $table = "participants";
    protected $fillable = ['training_title'];

    public function products(){
    	return $this->belongsToMany('App\Models\Product');
    }

}
