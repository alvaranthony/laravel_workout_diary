<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Workout;
use App\Tag;
use DateTime;
use Auth;

class WorkoutsController extends Controller
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
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    public function index()
    {
        //HETKEL AJUTISELT NAVBARIL, HILJEM AINULT KUVAMINE DASHBOARDIL SISSE LOGITUNA
        //HETKELAHENDUS: REDIRECT DASHBOARDILE, kui minna /workouts
        //TODO: eemaldada antud route 
        
        /*
        $workouts = Workout::orderBy('created_at', 'desc')->get();
        return view('workouts.index')->with('workouts', $workouts);
        */
        
        return redirect('dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::pluck('name', 'id');
        return view('workouts.create')->with('tagsList', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'date' => 'required'
        ]);
        
        //Convert the date from datepicker into suitable format for SQL table
        //if dateformat not changed in datepicker function already (see app.blade)
        /*
        $date_from = $request->input('date');
        $dateformat = DateTime::createFromFormat('m/d/Y', $date_from);
        $date = $dateformat->format('Y-m-d');
        */
         //Create new workout post
        $workout = new Workout;
        $workout->workout_title = $request->input('title');
        $workout->workout_body = $request->input('body');
        $workout->workout_date = $request->input('date');
        $workout->user_id = auth()->user()->id;
        $workout->save();
        //Attach selected tags with the new workout
        $workout->tags()->attach($request->input('tags'));
        
        return redirect('/dashboard')->with('success', 'New workout added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $workout = Workout::find($id);
        
        // Check for correct user
        if(auth()->user()->id !== $workout->user_id){
            return redirect('/dashboard')->with('error', 'You have no access to this page!');
        }
        return view('workouts.show')->with('workout', $workout);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $workout = Workout::find($id);
        $tags = Tag::pluck('name', 'id');
        $tags_related = $workout->tags()->allRelatedIds();
        
        // Check for correct user
        if(auth()->user()->id !== $workout->user_id){
            return redirect('/dashboard')->with('error', 'You have no access to this page!');
        }
        
        return view('workouts.edit')->with('workout', $workout)->with('tagsList', $tags)->with('tags_related', $tags_related);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'date' => 'required'
        ]);
        
        //Convert the date from datepicker into suitable format for SQL table
        //if dateformat not changed in datepicker function already (see app.blade)
        /*
        $date_from = $request->input('date');
        $dateformat = DateTime::createFromFormat('m/d/Y', $date_from);
        $date = $dateformat->format('Y-m-d');
        */
        //Update current workout
        $workout = Workout::find($id);
        $workout->workout_title = $request->input('title');
        $workout->workout_body = $request->input('body');
        $workout->workout_date = $request->input('date');
        $workout->save();
        $workout->tags()->sync($request->input('tags'));
        
        return redirect('/dashboard')->with('success', 'Workout updated successfully!');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteEntry = Workout::find($id);
        
        // Check for correct user
        if(auth()->user()->id !== $deleteEntry->user_id){
            return redirect('/dashboard')->with('error', 'You have no access to this page!');
        }
        
        $deleteEntry->delete();
        return redirect('/dashboard')->with('warning', 'Workout deleted successfully!');
    }
}
