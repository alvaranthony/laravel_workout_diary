<!-- DISPLAY EXISTING ENTRIES -->
@extends('layouts.app')

@section('content')
    <h1>Workouts!</h1>
    @if(count($workouts) > 0)
        @foreach($workouts as $workout)
            <div class="well">
                <h3><a href="/workouts/{{$workout->id}}">{{$workout->workout_title}}</a></h3>
                <hr>
                <p><b>Date added:</b> {{$workout->created_at}}</p>
                <p><b>Date workout was done:</b></p>
            </div>
        @endforeach
    @else
        <h3>No workout entries found!</h3>
    @endif
@endsection
 