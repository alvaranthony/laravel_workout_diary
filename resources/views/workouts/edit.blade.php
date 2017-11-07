<!-- EDIT/UPDATE SPECIFIC WORKOUT ENTRY -->
@extends('layouts.app')

@section('content')
    <h1>Edit workout</h1>
    {!! Form::open(['action' => ['WorkoutsController@update', $workout->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('title', 'Workout Title')}}
            {{Form::text('title', $workout->workout_title, ['class' => 'form-control', 'placeholder' => 'Workout Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Workout Body')}}
            {{Form::textArea('body', $workout->workout_body, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Workout Body Text'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
 