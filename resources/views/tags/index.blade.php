@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading"><h4 style="text-align:center;">ADD NEW TAG</h4></div>
            <div class="panel-body">
                {!! Form::open(['action' => 'TagsController@store', 'method' => 'POST']) !!}
                    <div class="form-group">
                        {{Form::label('name', 'Tag name')}}
                        {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name of the tag'])}}
                    </div>
                    <div class="btn-toolbar">
                        {{Form::submit('Add', ['class' => 'btn btn-primary'])}}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading"><h4 style="text-align:center;">TAGS BOARD</h4></div>
            <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if (count($tags) > 0)
                    @foreach($tags as $tag)
                        <a href="/dashboard/{{$tag->id}}"><div class="tag-box_indv"><font color="white"><b>{{$tag->name}}</b></font></a>
                            {!!Form::open(['action' => ['TagsController@destroy', $tag->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('x', ['class' => 'tag-delete'])}}
                            {!!Form::close()!!}
                        </div>
                    @endforeach
                @else
                    <p>No tags added!</p>
                @endif
            </div>
        </div>
    </div>

@endsection
