<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Workout;
use DateTime;

class WorkoutsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //HETKEL AJUTISELT NAVBARIL, HILJEM AINULT KUVAMINE DASHBOARDIL SISSE LOGITUNA
        $workouts = Workout::orderBy('created_at', 'desc')->get();
        return view('workouts.index')->with('workouts', $workouts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('workouts.create');
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
        $date_from = $request->input('date');
        $dateformat = DateTime::createFromFormat('m/d/Y', $date_from);
        $date = $dateformat->format('Y-m-d');
         //Create new workout post
        $workout = new Workout;
        $workout->workout_title = $request->input('title');
        $workout->workout_body = $request->input('body');
        $workout->workout_date = $date;
        $workout->save();
        
        return redirect('/workouts')->with('success', 'New workout added successfully!');
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
        return view('workouts.edit')->with('workout', $workout);
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
            'body' => 'required'
        ]);
        
        //Update current workout
        $workout = Workout::find($id);
        $workout->workout_title = $request->input('title');
        $workout->workout_body = $request->input('body');
        $workout->save();
        
        return redirect('/workouts')->with('success', 'Workout updated successfully!');   
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
        $deleteEntry->delete();
        return redirect ('/workouts')->with('info', 'Workout deleted successfully!');
    }
}
