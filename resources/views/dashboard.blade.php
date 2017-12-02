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
            <div class="panel-heading"><h4>Dashboard</h4></div>

            <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="btn-toolbar">
                    <a href="workouts/create" class="btn btn-primary">+ Add workout</a>
                </div>
                @if ($count > 0)
                    <h3>Total days of workouts finished: {{$count}}</h3>
                @endif
            
                @if (count($workouts) > 0)
                    <table class="table table-hover table-dark">
                        <thead>
                            <th>Workout Title</th>
                            <th>Tags</th>
                            <th>Workout Date</th>
                        </thead>
                        @foreach($workouts as $workout)
                            <tbody>
                                <th>
                                <a href="/workouts/{{$workout->id}}">{{$workout->workout_title}}</a><br>
                                </th>
                                <th>
                                    @unless($workout->tags->isEmpty())
                                        @foreach($workout->tags as $tag)
                                            {{$tag->name}}
                                        @endforeach
                                    @endunless
                                </th>
                                <!--<th>
                                    <a href="/workouts/{{$workout->id}}/edit" class="btn btn-success">Edit</a>
                                    {!!Form::open(['action' => ['WorkoutsController@destroy', $workout->id], 'method' => 'POST', 'class' => 'pull-right', 'onsubmit' => 'return confirmDelete()'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                    {!!Form::close()!!}
                                </th>-->
                                <th>{{$workout->workout_date}}</th>
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
