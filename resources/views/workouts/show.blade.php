<!-- DISPLAY CURRENT WORKOUT -->
@extends('layouts.app')

@section('content')
    <a href="/dashboard" class="btn btn-primary">Return</a>
    <h1>{{$workout->workout_title}}</h1>
    @unless($workout->tags->isEmpty())
        @foreach($workout->tags as $tag)
            {{$tag->name}}
        @endforeach
    @endunless
    <div>
        <p>{!!$workout->workout_body!!}</p>
    </div>
    <hr>
    <p><small><b>Date added:</b> {{$workout->created_at}}</small></p>
    <p><small><b>Date workout was done:</b> {{$workout->workout_date}}</small></p>
    <hr>
    
    <script>
        function confirmDelete()
        {
        var x = confirm("Are you sure you want to delete this workout?");
        if (x)
            return true;
        else
            return false;
        }
    </script>
    
    <a href="/workouts/{{$workout->id}}/edit" class="btn btn-success">Edit</a>
    {!!Form::open(['action' => ['WorkoutsController@destroy', $workout->id], 'method' => 'POST', 'class' => 'pull-right', 'onsubmit' => 'return confirmDelete()'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
@endsection
 