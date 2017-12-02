<!-- DISPLAY EXISTING ENTRIES -->
@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
    <div class="panel-heading"><h4>Add new workout</h4></div>
    <div class="panel-body">
        {!! Form::open(['action' => 'WorkoutsController@store', 'method' => 'POST']) !!}
            <div class="form-group">
                {{Form::label('title', 'Workout Title')}}
                {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Workout Title'])}}
            </div>
            <div class="form-group">
                {{Form::label('body', 'Workout Body')}}
                {{Form::textArea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Workout Body Text'])}}
            </div>
            <div class="form-group">
                {{Form::label('tags', 'Tags')}}
                {{Form::select('tags[]', $tagsList, null, ['class' => 'form-control select2', 'multiple'])}}
            </div>
            <div class="form-group">
                {{Form::label('date', 'Date workout was done')}}
                {{Form::text('date', '', ['id' => 'datepicker', 'class' => 'form-control', 'placeholder' => 'yyyy-mm-dd'])}}
            </div>
            <div class="btn-toolbar">
                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
            </div>
        {!! Form::close() !!}
    </div>
    </div>
@endsection
 