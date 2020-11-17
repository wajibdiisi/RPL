@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
<div class="container bootstrap snippets bootdey">
<style>
    .list-content{
 min-height:300px;
}
.list-content .list-group .title{
  background:#5bc0de;
  border:2px solid #DDDDDD;
  font-weight:bold;
  color:#FFFFFF;
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
    color:#5bc0de;    
}
    </style>
  <div class="header">
    <h3 class="text-muted prj-name">
        <span class="fa fa-users fa-2x principal-title"></span>
        Search
    </h3>
  </div>

  
  @if(sizeof($result) > 0 )
  <div class="jumbotron list-content">
    <ul class="list-group">
      <li href="#" class="list-group-item title">
        Your friend zone
      </li>
      @foreach($result as $query)
      <li href="#" class="list-group-item text-left">
        <img class="img-thumbnail" src="https://bootdey.com/img/Content/User_for_snippets.png">
        <label class="name">
            <a href ="{{ route('profile.show',['id'=>$query->username]) }}">{{$query->nama_lengkap}}</a><br>
        </label>
        <label class="float-right">

            <a  class="btn btn-success btn-xs glyphicon glyphicon-ok"  title="View">Accept</a>
            <a  class="btn btn-danger  btn-xs glyphicon glyphicon-trash" href="#" title="Delete">Decline</a>
            <a  class="btn btn-info  btn-xs glyphicon glyphicon glyphicon-comment" href="#" title="Send message"></a>
        </label>
        <div class="break"></div>
      </li>
      @endforeach
      <li href="#" class="list-group-item text-left">
        <a class="btn btn-block btn-primary">
            <i class="glyphicon glyphicon-refresh"></i>
            Load more...
        </a>
      </li>
    </ul>
  </div>
  @endif
  @if(sizeof($resultGame)> 0)
  <div class="jumbotron list-content">
    <ul class="list-group">
      <li href="#" class="list-group-item title">
        Game found
      </li>
      @foreach($resultGame as $query)
      <div href="#" class="list-group-item col-md-12">
      <div class="row">
      <div class="col-md-6">  
        <img class="img-fluid" src="{{ url('uploads/gamePicture/' . $query->gamePicture) }}" style="width:150px;height:150px">
        <label class="name">
            <a href ="{{ route('gameView.show',$query->id) }}">{{$query->gameName}}</a>
        </label>
      </div>
        <div class ="col-md-3 offset-md-3 align-middle text-right">
          <label class="mt-5 pt-3">
            @foreach($query->genre as $genre)
            <a  class="btn btn-success btn-xs glyphicon glyphicon-ok"  title="View"><?=$genre->title?></a>
            @endforeach
          </label>
          </div>
        <div class="break"></div>
      </div></div>
      @endforeach
      <li href="#" class="list-group-item text-left">
        <a class="btn btn-block btn-primary">
            <i class="glyphicon glyphicon-refresh"></i>
            Load more...
        </a>
      </li>
    </ul>
  </div>
  @endif
  </div>
</div>   
@endsection