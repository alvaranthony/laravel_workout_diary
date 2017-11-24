<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    // Table name 
    protected $table = 'workouts';
    
    public function user(){
        return $this->belongsTo('App\User');
    }
}
