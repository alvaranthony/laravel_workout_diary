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
            <div class="panel-heading">Dashboard</div>

            <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <a href="workouts/create" class="btn btn-primary">+ Add workout</a>
                @if ($count > 0)
                    <h3>Total days of workouts done: {{$count}}</h3>
                @endif
                
                <h3>My workouts</h3>
                @if (count($workouts) > 0)
                    <table class="table table-bordered table-hover table-dark">
                        <thead>
                            <th>Workout Title</th>
                            <th>Workout Date</th>
                            <th></th>
                        </thead>
                        @foreach($workouts as $workout)
                            <tbody>
                                <th><a href="/workouts/{{$workout->id}}">{{$workout->workout_title}}</a></th>
                                <th>{{$workout->workout_date}}</th>
                                <th>
                                    <a href="/workouts/{{$workout->id}}/edit" class="btn btn-success">Edit</a>
                                    {!!Form::open(['action' => ['WorkoutsController@destroy', $workout->id], 'method' => 'POST', 'class' => 'pull-right', 'onsubmit' => 'return confirmDelete()'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                    {!!Form::close()!!}
                                </th>
                            </tbody>
                        @endforeach
                    </table>
                @else
                    <p>No workout entries found!</p>
                @endif
            </div>
        </div>
    </div>

@endsection
