@extends('layouts.app')

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

@section('content')

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading"><h4 style="text-align:center;">DASHBOARD</h4></div>

            <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="btn-toolbar">
                    <a href="workouts/create" class="btn btn-primary">+ Add workout</a>
                </div>
                <br>
                @if ($count > 0)
                    <h3 style="display:inline;">Total days of workouts finished:</h3><h3 style="display:inline; background:#0084b4; color:white; 
                    border:2px solid #0084b4; border-radius:50%; padding:3px; margin-left: 20px;">{{$count}}</h3>
                @endif
            
                @if (count($workouts) > 0)
                    <table class="table table-hover table-dark" style="margin-top: 20px;">
                        <thead>
                            <th>Workout Title</th>
                            <th>Tags</th>
                            <th>Workout Date</th>
                            <th></th>
                        </thead>
                        @foreach($workouts as $workout)
                            <tbody>
                                <th>
                                <a href="/workouts/{{$workout->id}}"><font color="black">{{$workout->workout_title}}</font></a><br>
                                </th>
                                <th>
                                    @unless($workout->tags->isEmpty())
                                        @foreach($workout->tags as $tag)
                                            <a href="/dashboard/{{$tag->id}}"><div class="tag-box"><font color="white">{{$tag->name}}</font></div></a>
                                        @endforeach
                                    @endunless
                                </th>
                                <th>{{$workout->workout_date}}</th>
                                <th>
                                    {!!Form::open(['action' => ['WorkoutsController@destroy', $workout->id], 'method' => 'POST', 'class' => 'pull-right', 'onsubmit' => 'return confirmDelete()'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('x', ['class' => 'workout-delete_min'])}}
                                    {!!Form::close()!!}
                                </th>
                                
                            </tbody>
                        @endforeach
                    </table>
                @else
                    <h3 style="color:red;">No workout entries found!</3>
                @endif
            </div>
        </div>
    </div>

@endsection
