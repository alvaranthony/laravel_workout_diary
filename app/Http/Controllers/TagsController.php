<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Tag;

class TagsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    // returns a view which displays all the existing tags for the current user
    // the view will also inlcude adding form and a delete button for the tags
    public function index(){
        // display all the existing tags for the user
        // include a form to add/delete a tag
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('tags.index')->with('tags', $user->tags);
    }
    
    public function store(){
        
    }
    
    public function delete(){
        
    }
}
