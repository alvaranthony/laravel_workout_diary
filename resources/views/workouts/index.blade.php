<!-- DISPLAY EXISTING ENTRIES -->
@extends('layouts.app')

@section('content')
    <h1>Workouts!</h1>
    @if(count($workouts) > 0)
        @foreach($workouts as $workout)
            <div class="well">
                <h3>{{$workout->workout_title}}</h3>
                <hr>
                <p>Added on {{$workout->created_at}}</p>
            </div>
        @endforeach
    @else
        <h3>No workout entries found!</h3>
    @endif
@endsection
 