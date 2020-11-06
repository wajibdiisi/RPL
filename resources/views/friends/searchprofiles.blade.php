@extends('layouts.app')

@section('content')
<link href="http://getbootstrap.com/examples/jumbotron-narrow/jumbotron-narrow.css" rel="stylesheet">
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
        Friend zone
    </h3>
  </div>


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
        <label class="pull-right">

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
  </div>
</div>   
@endsection