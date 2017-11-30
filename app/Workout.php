<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    // Table name 
    protected $table = 'workouts';
    
    // Workout is specific for a user
    public function user(){
        return $this->belongsTo('App\User');
    }
    
    // Get the tags associated with the given workout
    public function tags(){
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }
    
    // Get a list of tag id's specific for the current workout
    // Returns an array of id's
    public function getTagListAttribute(){
        return $this->tags->pluck('id');
    }
}
