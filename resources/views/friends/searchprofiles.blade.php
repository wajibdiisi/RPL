@extends('layouts.app')
@section('title')
Search : {{$key}}
@endsection
@section('content')
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
<div class="container bootstrap snippets bootdey">
  <link href="http://getbootstrap.com/examples/jumbotron-narrow/jumbotron-narrow.css" rel="stylesheet">
<style>
    .list-content{
      background-color: #111D35;
 min-height:300px;
}
body {
            background: #071224;

        }

.list-content .list-group .title{
  background-color: #111D35;
  
  font-weight:bold;
  color:#FFFFFF;
}
.list-group-item {
  background : #131f39
}
.list-group-item img {
    height:80px; 
    width:80px;
}

.jumbotron .btn {
    padding: 5px 5px !important;
    font-size: 12px !important;
}
.prj-name {
    color:#5bc0de;    
}
.break{
    width:100%;
    margin:20px;
}
.name {
    color:white;    
}
    </style>
 

 @if(sizeof($result) == 0 && sizeof($resultGame) == 0)
 <div class="jumbotron list-content">
  <ul class="list-group">
    <li href="#" class="list-group-item title">
      Search Result (0)
    </li>
    <li href="#" class="list-group-item text-left">
      <h6 class="display-4 text-light">You Found Nothing</h6>
      <div class="break"></div>
    </li>
    </ul>
</div>


 @endif

  
  @if(sizeof($result) > 0 )
  <div class="header">
    <h3 class="text-muted prj-name">
        <span class="fa fa-users principal-title"></span>
        Search
    </h3>
  </div>
  <div class="jumbotron list-content">
    <ul class="list-group">
      <li href="#" class="list-group-item title">
        User Search ({{$result->count()}})
      </li>
      @foreach($result as $query)
      <li href="#" class="list-group-item text-left">
        <div class="col-md-6 row">
        <img src="{{ url('uploads/avatars/' . $query->avatar) }}" class="img-fluid rounded-circle"
                                        alt="" />
        <label class="ml-3 name h2">
            <a  class="text-light" href ="{{ route('profile.show',['id'=>$query->username]) }}">{{$query->nama_lengkap}}</a><br>
        <button class="btn btn-outline-primary btn-sm" disabled>{{count($query->gameCollection)}} Games on list</button>
        <button class="btn btn-outline-success btn-sm" disabled>{{count($query->profilemanager->acceptedFriend())}} Friends</button>
        </label>
      </div>
        <div class="break"></div>
      </li>
      @endforeach
    </ul>
  </div>
  @endif
  @if(sizeof($resultGame)> 0)
  <div class="header">
    <h3 class="text-muted prj-name">
        <span class="fas fa-gamepad principal-title"></span>
        Search
    </h3>
  </div>
  <div class="jumbotron list-content">
    <ul class="list-group">
      <li href="#" class="list-group-item title">
        Game search ({{$resultGame->count()}})
      </li>
      @foreach($resultGame as $query)
      <div href="#" class="list-group-item col-md-12">
      <div class="row">
      <div class="ml-3 col-md-6 row">  
        <img class="img-fluid" src="{{ url('uploads/gamePicture/' . $query->gamePicture) }}" style="width : 200px;height : 200px">
        <label class="ml-3 name h2">
            <a class="text-light" href ="{{ route('gameView.show',$query->id) }}">{{$query->gameName}}</a><br>
            @foreach($query->genre as $genre)
            <a  class="btn btn-outline-primary btn-sm glyphicon glyphicon-ok text-light"  title="View"><?=$genre->title?></a>
            @endforeach
        </label>
      </div>
        
        <div class="break"></div>
      </div></div>
      @endforeach
      
    </ul>
  </div>
  @endif
  </div>
</div>   
@endsection