@extends('layouts.app')
@section('content')
<style>
body{
    
    background:#eee;
}

.activities {
    max-height: 1208px;
    position: relative;
    padding-bottom: 50px;
}
.decor-default {
    background-color: #ffffff !important;
}
 div[class*='col-'] > .col-inside-lg {
    padding: 20px;
}

.activities .unit {
    border-bottom: 1px solid #d8d8d8;
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
</style>

<div class="container bootstrap snippets bootdeys">
    <div class="col-md-12 col-right">
        <div class="col-inside-lg decor-default activities" id="activities" style="overflow-y: hidden; outline: none;" tabindex="5003">
            <h6>Activites</h6>
            @foreach($merged as $data)
            @if($data->status)
            <div class="unit">
                <a class="avatar" href="#"><img src="https://bootdey.com/img/Content/avatar/avatar6.png" class="img-fluid" alt="profile"></a>
                <div class="field title">
                    <?php $gameData = UserHelp::getGame($data->game_id); $userData = UserHelp::getProfile($data->profile_id)?>
                    <a href="{{ route('profile.show',$userData->username)}}">{{$userData->nama_lengkap}}</a> started playing <a href="{{ route('gameView.show',$gameData->id) }}">{{$gameData->gameName}}</a>
                </div>
                <div class="field date">
                <span class="f-l">{{$data->updated_at->diffForHumans()}}</span>
                    
                </div>
                <div class="field btn-group-xs f-l">
                    <button type="button" class="btn btn-lg-xs btn-xs-like">Like</button>
                    <button type="button" class="btn btn-lg-xs btn-xs-love">Love</button>
                </div>
            </div>
            @elseif($data->review_content)
            <div class="unit">
                <a class="avatar" href="#"><img src="https://bootdey.com/img/Content/avatar/avatar6.png" class="img-fluid" alt="profile"></a>
                <div class="field title">
                    <?php $gameData = UserHelp::getGame($data->game_id); $userData = UserHelp::getProfile($data->profile_id)?>
                    <a href="{{ route('profile.show',$userData->username)}}">{{$userData->nama_lengkap}}</a> Posted a review on <a href="{{ route('gameView.show',$gameData->id) }}">{{$gameData->gameName}}</a>
                </div>
                <div class="field date">
                    <span class="f-l">{{$data->created_at->diffForHumans()}}</span>
                   
                </div>
                <div class="field btn-group-xs f-l">
                    <button type="button" class="btn btn-lg-xs btn-xs-like">Like</button>
                    <button type="button" class="btn btn-lg-xs btn-xs-love">Love</button>
                </div>
            </div>
            @endif
            @endforeach
            <div class="unit">
                <a class="avatar" href="#"><img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-responsive" alt="profile"></a>
                <div class="field title">
                    <a href="#">Katya Angintiew</a> posted a new blog
                </div>
                <div class="field date">
                    <span class="f-l">Today 5:60 pm - 12.06.2016</span>
                    <span class="f-r">15 min ago</span>
                </div>
            </div>
            <div class="unit">
                <a class="avatar" href="#"><img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="img-responsive" alt="profile"></a>
                <div class="field title">
                    <a href="#">Alexander Herthic</a> posted message on <a href="#">Monica Smith site</a>.
                </div>
                <div class="field date">
                    <span class="f-l">Today 2:10 pm - 12.06.2015</span>
                    <span class="f-r">2h ago</span>
                </div>
                <div class="field">
                    <p class="color-default decor-success">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s. Over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                </div>
                <div class="field btn-group-xs f-r">
                    <button type="button" class="btn btn-lg-xs btn-xs-like">Like</button>
                    <button type="button" class="btn btn-lg-xs btn-xs-love">Love</button>
                    <button type="button" class="btn btn-lg-xs btn-xs-msg">Message</button>
                </div>
            </div>
            <div class="unit">
                <div class="field title">
                    <a href="#">Katya Angintiew</a> add 1 photo on <a href="#">Monica Smith site</a>.
                </div>
                <div class="field date">
                    <span class="f-l">Today 5:60 pm - 12.06.2016</span>
                    <span class="f-r">15 min ago</span>
                </div>
                <div class="field photo">
                    <img src="https://via.placeholder.com/266x200/" alt="profile">
                    <img src="https://via.placeholder.com/266x200/" alt="profile">
                    <img src="https://via.placeholder.com/266x200/" alt="profile">
                </div>
            </div>
            <div class="unit">
                <a class="avatar" href="#"><img src="https://bootdey.com/img/Content/avatar/avatar4.png" class="img-responsive" alt="profile"></a>
                <div class="field title">
                    <a href="#">Alexander Herthic</a> posted message on <a href="#">Monica Smith site</a>.
                </div>
                <div class="field date">
                    <span class="f-l">Today 2:10 pm - 12.06.2015</span>
                    <span class="f-r color-success">2h ago</span>
                </div>
                <div class="field btn-group-xs f-l">
                    <button type="button" class="btn btn-lg-xs btn-xs-like">Like</button>
                    <button type="button" class="btn btn-lg-xs btn-xs-love">Love</button>
                </div>
            </div>
            <div class="unit">
                <a class="avatar" href="#"><img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-responsive" alt="profile"></a>
                <div class="field title">
                    <a href="#">Alexander Herthic</a> posted message on <a href="#">Monica Smith site</a>.
                </div>
                <div class="field date">
                    <span class="f-l">Today 2:10 pm - 12.06.2015</span>
                    <span class="f-r">2h ago</span>
                </div>
                <div class="field">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s. Over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                </div>
                <div class="field btn-group-xs f-r">
                    <button type="button" class="btn btn-lg-xs btn-xs-love">Love</button>
                </div>
            </div>
            <div class="unit">
                <a class="avatar" href="#"><img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="img-responsive" alt="profile"></a>
                <div class="field title">
                    <a href="#">Katya Angintiew</a> posted a new blog
                </div>
                <div class="field date">
                    <span class="f-l">Today 5:60 pm - 12.06.2016</span>
                    <span class="f-r">15 min ago</span>
                </div>
            </div>
            <div class="unit">
                <a class="avatar" href="#"><img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-responsive" alt="profile"></a>
                <div class="field title">
                    <a href="#">Katya Angintiew</a> posted a new blog
                </div>
                <div class="field date">
                    <span class="f-l">Today 5:60 pm - 12.06.2016</span>
                    <span class="f-r">15 min ago</span>
                </div>
            </div>
            <div class="unit">
                <a class="avatar" href="#"><img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="img-responsive" alt="profile"></a>
                <div class="field title">
                    <a href="#">Alexander Herthic</a> started following <a href="#">Katya Angintiew</a>
                </div>
                <div class="field date">
                    <span class="f-l">Today 6:15 pm - 22.03 2015</span>
                    <span class="f-r color-success">5 min ago</span>
                </div>
                <div class="field btn-group-xs f-l">
                    <button type="button" class="btn btn-lg-xs btn-xs-like">Like</button>
                    <button type="button" class="btn btn-lg-xs btn-xs-love">Love</button>
                </div>
            </div>
            <div class="unit">
                <a class="avatar" href="#"><img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="img-responsive" alt="profile"></a>
                <div class="field title">
                    <a href="#">Katya Angintiew</a> posted a new blog
                </div>
                <div class="field date">
                    <span class="f-l">Today 5:60 pm - 12.06.2016</span>
                    <span class="f-r">15 min ago</span>
                </div>
            </div>
            <div class="unit">
                <a class="avatar" href="#"><img src="https://bootdey.com/img/Content/avatar/avatar4.png" class="img-responsive" alt="profile"></a>
                <div class="field title">
                    <a href="#">Alexander Herthic</a> posted message on <a href="#">Monica Smith site</a>.
                </div>
                <div class="field date">
                    <span class="f-l">Today 2:10 pm - 12.06.2015</span>
                    <span class="f-r">2h ago</span>
                </div>
                <div class="field">
                    <p class="color-default decor-success">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s. Over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                </div>
                <div class="field btn-group-xs f-r">
                    <button type="button" class="btn btn-lg-xs btn-xs-like">Like</button>
                    <button type="button" class="btn btn-lg-xs btn-xs-love">Love</button>
                    <button type="button" class="btn btn-lg-xs btn-xs-msg">Message</button>
                </div>
            </div>
            <div class="unit">
                <div class="field title">
                    <a href="#">Katya Angintiew</a> add 1 photo on <a href="#">Monica Smith site</a>.
                </div>
                <div class="field date">
                    <span class="f-l">Today 5:60 pm - 12.06.2016</span>
                    <span class="f-r">15 min ago</span>
                </div>
                <div class="field photo">
                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-responsive" alt="profile">
                </div>
            </div>
            <div class="unit">
                <a class="avatar" href="#"><img src="https://bootdey.com/img/Content/avatar/avatar4.png" class="img-responsive" alt="profile"></a>
                <div class="field title">
                    <a href="#">Alexander Herthic</a> posted message on <a href="#">Monica Smith site</a>.
                </div>
                <div class="field date">
                    <span class="f-l">Today 2:10 pm - 12.06.2015</span>
                    <span class="f-r color-success">2h ago</span>
                </div>
                <div class="field btn-group-xs f-l">
                    <button type="button" class="btn btn-lg-xs btn-xs-like">Like</button>
                    <button type="button" class="btn btn-lg-xs btn-xs-love">Love</button>
                </div>
            </div>
            <div class="unit">
                <a class="avatar" href="#"><img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-responsive" alt="profile"></a>
                <div class="field title">
                    <a href="#">Alexander Herthic</a> posted message on <a href="#">Monica Smith site</a>.
                </div>
                <div class="field date">
                    <span class="f-l">Today 2:10 pm - 12.06.2015</span>
                    <span class="f-r">2h ago</span>
                </div>
                <div class="field">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s. Over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                </div>
                <div class="field btn-group-xs f-r">
                    <button type="button" class="btn btn-lg-xs btn-xs-love">Love</button>
                </div>
            </div>
            <div class="unit">
                <a class="avatar" href="#"><img src="https://bootdey.com/img/Content/avatar/avatar4.png" class="img-responsive" alt="profile"></a>
                <div class="field title">
                    <a href="#">Katya Angintiew</a> posted a new blog
                </div>
                <div class="field date">
                    <span class="f-l">Today 5:60 pm - 12.06.2016</span>
                    <span class="f-r">15 min ago</span>
                </div>
            </div>
            <div class="unit">
                <a class="avatar" href="#"><img src="https://bootdey.com/img/Content/avatar/avatar5.png" class="img-responsive" alt="profile"></a>
                <div class="field title">
                    <a href="#">Katya Angintiew</a> posted a new blog
                </div>
                <div class="field date">
                    <span class="f-l">Today 5:60 pm - 12.06.2016</span>
                    <span class="f-r">15 min ago</span>
                </div>
            </div>
        </div>
    </div>
    </div>
    
@endsection