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
    
    public function store(Request $request){
        
        $this->validate($request, [
            'name' => 'required'
        ]);
        
        $tag = new Tag; 
        $tag->name = $request->input('name');
        $tag->user_id = auth()->user()->id;
        $tag->save();
        
        return redirect('/tags')->with('success', 'New tag added successfully!');
    }
    
    public function destroy($id){
        $deleteTag = Tag::find($id);
        
        // Check for correct user
        if(auth()->user()->id !== $deleteTag->user_id){
            return redirect('/dashboard')->with('error', 'You have no access to this page!');
        }
        
        $deleteTag->delete();
        return redirect('/tags')->with('warning', 'Tag deleted successfully!');
    }
}
