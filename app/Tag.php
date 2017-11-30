<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // Fillable fields for tag
    protected $fillable = [
        'name'
    ];
    
    // Get the workouts associated with the given tag
    public function workouts(){
        return $this->belongsToMany('App\Workout');
    }
    
    public function user(){
        return $this->belongsTo('App\User');
    }
}
