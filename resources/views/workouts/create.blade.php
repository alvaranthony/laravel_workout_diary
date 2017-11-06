<!-- DISPLAY EXISTING ENTRIES -->
@extends('layouts.app')

@section('content')
    <h1>Add a new workout!</h1>
    {!! Form::open(['action' => 'WorkoutsController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('title', 'Workout Title')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Workout Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Workout Body')}}
            {{Form::textArea('body', '', ['class' => 'form-control', 'placeholder' => 'Workout Body Text'])}}
        </div>
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
 