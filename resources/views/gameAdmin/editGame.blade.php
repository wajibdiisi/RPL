@extends('layouts.app')

@section('content')
<head>
    <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet" />
    <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>

</head>



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
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name   ="releaseDate" value ="{{$game->releaseDate}}">   
                <label for="genre">Genre: 
                @foreach($game->genre as $genre)
                {{$genre->title}}
                @endforeach
                </label>
                <div id="checkbox" class="custom-controls-stacked px-2">
                @foreach($genreList as $list)
                <div class=>
                                <input type="checkbox" class="" name="genre[]" value ="{{$list->title}}" v-model="genres" v-model="picked">
                                <label for="notifications-blog">{{$list->title}}</label>
                              </div>
                @endforeach  
                            <span id="" >Genre:<b-button variant ="primary" class="mr-1" v-for="genre in genres">@{{genre}}</b-button></span>  
              </div>

                <label for="summary">Summary</label>
                <textarea type="text" class="form-control" id="summary" aria-describedby="emailHelp" name ="summary">{{$game->summary}}</textarea>   
                <input type="file" name="gamePicture">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="pull-right btn btn-sm btn-primary">
                
            </form>
</div>
@endsection