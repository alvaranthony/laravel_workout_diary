<!-- DISPLAY CURRENT WORKOUT -->
@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><h4>{{$workout->workout_title}}</h4></div>
        <div class="panel-body">
            @unless($workout->tags->isEmpty())
                @foreach($workout->tags as $tag)
                    {{$tag->name}}
                @endforeach
            @endunless
            <div>
                <p>{!!$workout->workout_body!!}</p>
            </div>
            <hr>
            <div class="panel-footer">
                <p><b>Date workout was done: {{$workout->workout_date}}</b></p>
                <p><small><b>Date added: {{$workout->created_at}}</b></small></p>
            </div>
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
            
            <div class="btn-toolbar">
                <a href="/dashboard" class="btn btn-primary">Return</a>
                <a href="/workouts/{{$workout->id}}/edit" class="btn btn-success pull-right">Edit</a>
                {!!Form::open(['action' => ['WorkoutsController@destroy', $workout->id], 'method' => 'POST', 'class' => 'pull-right', 'onsubmit' => 'return confirmDelete()'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                {!!Form::close()!!}
            </div>
        </div>
    </div>
@endsection
 