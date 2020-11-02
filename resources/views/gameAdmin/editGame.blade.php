@extends('layouts.app')

@section('content')



<div class="container row col-md-10">
<img src="{{url('uploads/gamePicture/' . $game->gamePicture)}}" alt="Admin" class="rounded-circle" width="300">
<form enctype="multipart/form-data" action="{{ route('game.Update',$game->id)}}"  class ="col-md-4" method="POST">
                <label for="gameName">Game Name : {{$game->gameName}}</label>
                <input type="text" class="form-control" id="gameName" aria-describedby="emailHelp" name="gameName" value ="{{$game->gameName}}">    
                <label for="rating">Rating : {{$game->rating}}</label>
                <input type="text" class="form-control" id="rating" aria-describedby="emailHelp" name="rating" value ="{{$game->rating}}">    
                <label for="developer">Developer : {{$game->developer}}</label>
                <input type="text" class="form-control" id="developer" aria-describedby="emailHelp" name="developer" value ="{{$game->developer}}">    
                <label for="releaseDate">Release Date : {{$game->releaseDate}}</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name ="releaseDate" value ="{{$game->releaseDate}}">   
                <label for="releaseDate">Genre: 
                @foreach($genre as $genres) 
                  @foreach($genres->genre as $genresTitle)
                    {{($genresTitle->title)}}
                    @endforeach
                @endforeach </label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name ="genre" value ="">     
                <label for="summary">Summary</label>
                <textarea type="text" class="form-control" id="summary" aria-describedby="emailHelp" name ="summary">{{$game->summary}}</textarea>   
                <input type="file" name="gamePicture">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="pull-right btn btn-sm btn-primary">
                
            </form>
</div>
@endsection