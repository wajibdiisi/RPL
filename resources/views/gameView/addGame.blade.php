@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Book</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('gameView.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('gameView.store') }}" method="POST">
    	@csrf


         <div class="row container-fluid">
		    <div class="col-xs-12 col-sm-12 col-md-5 offset-md-2">
		        <div class="form-group">
		            <strong>Game Name</strong>
		            <input type="text" name="gameName" class="form-control" placeholder="Name">
		        </div>
		    </div>
        <div class="col-xs-12 col-sm-12 col-md-5 offset-md-2">
		        <div class="form-group">
		            <strong>Rating</strong>
		            <input type="text" name="rating" class="form-control" placeholder="Name">
		        </div>
		    </div>
        <div class="col-xs-12 col-sm-12 col-md-5 offset-md-2">
		        <div class="form-group">
		            <strong>Developer</strong>
		            <input type="text" name="developer" class="form-control" placeholder="Name">
		        </div>
		    </div>
        <div class="col-xs-12 col-sm-12 col-md-5 offset-md-2">
		        <div class="form-group">
		            <strong>Release Date</strong>
		            <input type="text" name="releaseDate" class="form-control" placeholder="Name">
		        </div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-5 offset-md-2">
		        <div class="form-group">
		            <strong>custom_url</strong>
		            <input type="text" name="custom_url" class="form-control" placeholder="Enter Custom Url">
		        </div>
		    </div>
        
		    <div class="col-xs-12 col-md-5 offset-md-2">
		        <div class="form-group">
		            <strong>Summary</strong>
		            <textarea class="form-control" style="height:150px" name="summary" placeholder="Detail"></textarea>
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>


@endsection