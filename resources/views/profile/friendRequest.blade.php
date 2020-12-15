@extends('layouts.app')
@section('title')
Friend Request

@endsection


@section('content')
    <link href="http://getbootstrap.com/examples/jumbotron-narrow/jumbotron-narrow.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
    <div class="container bootstrap snippets bootdey">
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
        <div class="header">
            <h3 class="text-muted prj-name">
                <span class="fa fa-users fa-2x principal-title"></span>
                Friend zone
            </h3>
        </div>


        <div class="jumbotron list-content">
            <ul class="list-group">
                <li href="#" class="list-group-item title">
                    Remaining Request ({{$friendReq->count()}})
                </li>
                @foreach ($friendReq as $fr)
                    <li href="#" class="list-group-item text-left">
                        <div class="col-md-6 row">
                        <img src="{{ url('uploads/avatars/' . $fr->avatar) }}" class="img-fluid rounded-circle"
                        alt=""/>
                        <label class="ml-3 name h4">
                             <a href="{{ route('profile.show', ['id' => $fr->username]) }}">{{ $fr->username }} </a>
                            <br>
                            @foreach ($reqArray as $request)
                               <small class="text-muted" style="font-size : 13px"> {{ \Carbon\Carbon::parse($request['timeAdded'])->diffForHumans() }} </small>
                                <?php break; ?>
                            @endforeach
                            <br>
                            <a class="btn btn-outline-success btn-sn glyphicon glyphicon-ok"
                                href="{{ route('friends.accept', ['id' => $user->user_id , 'username' => $fr->username,'action' => 'approve']) }}"
                                title="View">Accept</a>
                            <a class="btn btn-outline-danger  btn-sn glyphicon glyphicon-trash" href="{{ route('friends.accept', ['id' => $user->user_id , 'username' => $fr->username,'action' => 'decline']) }}" title="Delete">Decline</a>
                        </label>
                        
                    </div>
                        <label class="pull-right">
                            
                        </label>
                        <div class="break"></div>
                    </li>
                @endforeach
               
            </ul>
        </div>
    </div>
    </div>
@endsection
