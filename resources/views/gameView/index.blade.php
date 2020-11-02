@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Gamelist</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('gameView.create') }}"> Create New Game</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th>Genre</th>  
            <th width="280px">Action</th>
        </tr>
        @foreach($games as $g)
	    <tr>
	        <td>{{ ++$i }}</td>
            <td>{{$g->gameName}}</td>
            <td>{{ $g->summary}}</td>
            <td>
            @foreach($g->genre as $genre)
            <div class="btn btn-info">{{$genre->title}}</div>
            @endforeach
            </td>
	        <td>
                <form action="{{ route('gameView.destroy',$g->_id)}}" method="POST">
                    <a class="btn btn-info" href="{{ route('gameView.show',$g['_id']) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('gameView.edit',$g['_id']) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


@endsection