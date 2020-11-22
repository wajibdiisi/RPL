@extends('layouts.app')

@section('content')
<head>
</head>



<div class="container row col-md-12">
<img src="{{url('uploads/gamePicture/' . $game->gamePicture)}}" alt="Admin" class="rounded-circle" width="300">
<div class="col-md-4">
<form enctype="multipart/form-data" action="{{ route('game.Update',$game->id)}}"   method="POST">
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
                <br>
                
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                  @foreach($platforms as $platform)
                <label class="{{$platform->button_class}} active mr-2">
                    <input type="checkbox" name="platform[]" id="{{$platform->title}}" value="{{$platform->title}}" autocomplete="off"> {{$platform->title}}
                  </label>
                  @endforeach
                </div>    
            </div>
            
              <div class="col-md-2">
              <h3> Minimum Requirement </h3>
              @foreach($game->min_requirement as $minreq)
              <?php $label = (array_search($minreq,$game->min_requirement))?>
            <label for="min_{{$label}}">{{$label}}</label>
            <input type="text" class="form-control" id="min_{{$label}}" aria-describedby="emailHelp" name="min_{{$label}}" value ="{{$minreq}}">    
            @endforeach     
          </div>
          <div class="col-md-2">
            <h3> Recommended </h3>
            @foreach($game->min_requirement as $minreq)
            <?php $label = (array_search($minreq,$game->min_requirement))?>
          <label for="min_{{$label}}">{{$label}}</label>
          <input type="text" class="form-control" id="min_{{$label}}" aria-describedby="emailHelp" name="min_{{$label}}" value ="{{$minreq}}">    
          @endforeach     
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="mt-2 pull-right btn btn-sm btn-primary">
        </div>
          </form>
          
</div>
@endsection