@extends('layouts.app')
@section('title')
Activities
@endsection
@section('content')
<style>
body {
            background: #071224;

        }

.activities {
    max-height: 1208px;
    position: relative;
    padding-bottom: 50px;
}
.decor-default {
    background-color: #111D35;
}
 div[class*='col-'] > .col-inside-lg {
    padding: 20px;
}

.activities .unit {
    padding: 20px 0 20px 50px;
    min-height: 80px;
    position: relative;
    overflow: hidden;
}
.activities .unit .avatar {
    display: block;
    width: 40px;
    height: 40px;
    position: absolute;
    top: 20px;
    left: 0;
}
.activities .unit .avatar img {
    display: block;
    border-radius: 50%;
    max-width: 100%;
}

.activities .unit .field {
    overflow: hidden;
    font-size: 14px;
    line-height: 20px;
}

.activities .unit .field a {
    font-weight: bold;
    color: #333333;
}

.activities .unit .field.btn-group-xs {
    padding: 20px 0 0;
}
.activities .unit .field {
    overflow: hidden;
    font-size: 14px;
    line-height: 20px;
}
.f-l {
    float: left;
}

.unit .avatar img{
    width:50px  !important;
    height:50px !important;
}
.pagination {justify-content: center;}
.pagination > li > a,
.pagination > li > span {
    background-color: rgba(0,0,0,0) !important;
    border : none !important;
}

.pagination > .active > a,
.pagination > .active > a:focus,
.pagination > .active > a:hover,
.pagination > .active > span,
.pagination > .active > span:focus,
.pagination > .active > span:hover {
    background-color: rgba(0,0,0,0) !important;
  
}

</style>

<div class="container bootstrap snippets text-light" style="background-color: #111D35;">
    <div class="col-md-12 col-right">
        <div class="col-inside-lg decor-default activities" id="activities" style="overflow-y: hidden; outline: none;" tabindex="5003" >
            <h6>Activites</h6>
            @foreach($merged as $data)
            @if($data->status)
            <div class="unit">
                <?php $gameData = UserHelp::getGame($data->game_id); $userData = UserHelp::getProfile($data->profile_id)?>
                <a class="avatar" href="#"><img src="{{ url('uploads/avatars/' . $userData->avatar) }}" class="img-fluid" alt="profile"></a>
                <div class="field title">
                    <a class="text-primary" href="{{ route('profile.show',$userData->username)}}">{{$userData->nama_lengkap}}</a> started playing <a class="text-primary" href="{{ route('gameView.show',$gameData->id) }}">{{$gameData->gameName}}</a>
                </div>
                <div class="field date">
                @if($data->updated_at != $data->created_at)
                <span class="f-l">{{$data->created_at->diffForHumans()}} <small> (Updated {{$data->updated_at->diffForHumans()}})</small></span> 
                @else    
                <span class="f-l">{{$data->created_at->diffForHumans()}}</span>
                @endif
                </div>
            </div>
            @elseif($data->review_content)
            <div class="unit">
                <?php $gameData = UserHelp::getGame($data->game_id); $userData = UserHelp::getProfile($data->profile_id)?>
                <a class="avatar" href="#"><img src="{{ url('uploads/avatars/' . $userData->avatar) }}" class="img-fluid" alt="profile"></a>
                <div class="field title">
                  
                    <a class="text-primary" href="{{ route('profile.show',$userData->username)}}">{{$userData->nama_lengkap}}</a> Posted a review on <a class="text-primary" href="{{ route('gameView.show',$gameData->id) }}">{{$gameData->gameName}}</a>
                </div>
                <div class="field date">
                    <span class="f-l">{{$data->created_at->diffForHumans()}}</span>
                   
                </div>

            </div>
            @endif
            @endforeach
            {{$merged->links()}}
            
        </div>
    </div>
    </div>
@endsection