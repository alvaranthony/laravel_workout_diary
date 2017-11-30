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
            <div class="panel-heading">Tags board</div>

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
                            </tbody>
                        @endforeach
                    </table>
                @else
                    <p>No tags found!</p>
                @endif
            </div>
        </div>
    </div>

@endsection
