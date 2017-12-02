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
            <div class="panel-heading"><h4>Add new tag</h4></div>
            <div class="panel-body">
                {!! Form::open(['action' => 'TagsController@store', 'method' => 'POST']) !!}
                    <div class="form-group">
                        {{Form::label('name', 'Tag name')}}
                        {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name of the tag'])}}
                    </div>
                    <div class="btn-toolbar">
                        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading"><h4>Tags board</h4></div>
            <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if (count($tags) > 0)
                    <table class="table table-hover table-dark">
                        <thead>
                            <th><h3>My tags</h3></th>
                        </thead>
                        @foreach($tags as $tag)
                            <tbody>
                                <th>{{$tag->name}}</th>
                                <th>
                                    {!!Form::open(['action' => ['TagsController@destroy', $tag->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                    {!!Form::close()!!}
                                </th>
                            </tbody>
                        @endforeach
                    </table>
                @else
                    <p>No tags added!</p>
                @endif
            </div>
        </div>
    </div>

@endsection
