@extends('layouts.app')

@section('content')
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>profile with contact information - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
    	body {
    background:#1b253a;

}
.page-inner.no-page-title {
    padding-top: 30px;
}
.page-inner {
    position: relative;
    min-height: calc(100% - 56px);
    padding: 20px 30px 40px 30px;
    background: #f3f4f7;
}
.card.card-white {
    background-color: #fff;
    border: 1px solid transparent;
    border-radius: 4px;
    box-shadow: 0 0.05rem 0.01rem rgba(75, 75, 90, 0.075);
    padding: 25px;
}
.grid-margin {
    margin-bottom: 2rem;
}
.profile-timeline ul li .timeline-item-header {
    width: 100%;
    overflow: hidden;
}
.profile-timeline ul li .timeline-item-header img {
    width: 40px;
    height: 40px;
    float: left;
    margin-right: 10px;
    border-radius: 50%;
}
.profile-timeline ul li .timeline-item-header p {
    margin: 0;
    color: #000;
    font-weight: 500;
}
.profile-timeline ul li .timeline-item-header p span {
    margin: 0;
    color: #8e8e8e;
    font-weight: normal;
}
.profile-timeline ul li .timeline-item-header small {
    margin: 0;
    color: #8e8e8e;
}
.profile-timeline ul li .timeline-item-post {
    padding: 20px 0 0 0;
    position: relative;
}
.profile-timeline ul li .timeline-item-post > img {
    width: 100%;
}
.timeline-options {
    overflow: hidden;
    margin-top: 20px;
    margin-bottom: 20px;
    border-bottom: 1px solid #f1f1f1;
    padding: 10px 0 10px 0;
}
.timeline-options a {
    display: block;
    margin-right: 20px;
    float: left;
    color: #2b2b2b;
    text-decoration: none;
}
.timeline-options a i {
    margin-right: 3px;
}
.timeline-options a:hover {
    color: #5369f8;
}
.timeline-comment {
    overflow: hidden;
    margin-bottom: 10px;
    width: 100%;
    border-bottom: 1px solid #f1f1f1;
    padding-bottom: 5px;
}
.timeline-comment .timeline-comment-header {
    overflow: hidden;
}
.timeline-comment .timeline-comment-header img {
    width: 30px;
    border-radius: 50%;
    float: left;
    margin-right: 10px;
}
.timeline-comment .timeline-comment-header p {
    color: #000;
    float: left;
    margin: 0;
    font-weight: 500;
}
.timeline-comment .timeline-comment-header small {
    font-weight: normal;
    color: #8e8e8e;
}
.timeline-comment p.timeline-comment-text {
    display: block;
    color: #2b2b2b;
    font-size: 14px;
    padding-left: 40px;
}
.post-options {
    overflow: hidden;
    margin-top: 15px;
    margin-left: 15px;
}
.post-options a {
    display: block;
    margin-top: 5px;
    margin-right: 20px;
    float: left;
    color: #2b2b2b;
    text-decoration: none;
    font-size: 16px !important;
}
.post-options a:hover {
    color: #5369f8;
}
.online {
    position: absolute;
    top: 2px;
    right: 2px;
    display: block;
    width: 9px;
    height: 9px;
    border-radius: 50%;
    background: #ccc;
}
.online.on {
    background: #2ec5d3;
}
.online.off {
    background: #ec5e69;
}
#cd-timeline::before {
    border: 0;
    background: #f1f1f1;
}
.cd-timeline-content p,
.cd-timeline-content .cd-read-more,
.cd-timeline-content .cd-date {
    font-size: 14px;
}
.cd-timeline-img.cd-success {
    background: #2ec5d3;
}
.cd-timeline-img.cd-danger {
    background: #ec5e69;
}
.cd-timeline-img.cd-info {
    background: #5893df;
}
.cd-timeline-img.cd-warning {
    background: #f1c205;
}
.cd-timeline-img.cd-primary {
    background: #9f7ce1;
}
.page-inner.full-page {
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
}
.user-profile-card {
    text-align: center;
}
.user-profile-image {
    width: 100px;
    height: 100px;
    margin-bottom: 10px;
}
.team .team-member {
    display: block;
    overflow: hidden;
    margin-bottom: 10px;
    float: left;
    position: relative;
}
.team .team-member .online {
    top: 5px;
    right: 5px;
}
.team .team-member img {
    width: 40px;
    float: left;
    border-radius: 50%;
    margin: 0 5px 0 5px;
}
.label.label-success {
    background: #43d39e;
}
.label {
    font-weight: 400;
    padding: 4px 8px;
    font-size: 11px;
    display: inline-block;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: 0.25em;
}

    </style>
</head>
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<div class="container">
    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button> 
      <strong>{{ $message }}</strong>
    </div>
  @endif
@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
    </div>
@endif
<div class="page-inner no-page-title">
    <!-- start page main wrapper -->
    <div id="main-wrapper">
        <div class="row">
            <div class="col-lg-5 col-xl-3">
                <div class="card card-white grid-margin">
                    <div class="card-heading clearfix">
                        <h4 class="card-title">{{ $userView->nama_lengkap}}'s Profile</h4>
                    </div>
                    <div class="card-body user-profile-card mb-3">
                        <img src="{{url('uploads/avatars/' . $userView->avatar)}}" class="user-profile-image rounded-circle" alt="" />
                        <h4 class="text-center h6 mt-2">
                        <?=$userView->username?></h4>
                        <p class="text-center small">UI/UX Designer</p>
                        @if($userView->user_id == $currentUser)
                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModalCenter">
                        <i class="fa fa-fw fa-camera"></i>
                        <span>Change Photo</span>
                      </button>
                      <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#changeprofile">
                        <i class="fa fa-fw fa-camera"></i>
                        <span>Change Profile</span>
                      </button>
                      <a class="btn btn-primary" href="{{ route('friends.pending',['id'=> session()->get('username')]) }}">Friend Request</a>
                      <div class="modal fade" id="changeprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <form enctype="multipart/form-data" action="{{ route('profile.update',$user->id) }}" method="POST">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                            <div class="modal-body">
                                            <div class="form-group">
            <label for="recipient-name" class="col-form-label">Username</label>
            <input type="text" class="form-control" name="username">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>


                                            </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="pull-right btn btn-sm btn-primary">
      </div>
    </div>
  </div>
</div>        
</form>       
            <form enctype="multipart/form-data" action="{{ route('profile.update',$user->id) }}" method="POST">
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <input type="file" name="avatar">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="pull-right btn btn-sm btn-primary">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
            </div>
            </form>
                      @else 
                        @foreach($userView->profilemanager->friend_ids as $check)
                        @if($check['id'] != session()->get('profile_id') && !$friendCheck)          
                        <a class="btn btn-primary" href="{{ route('friends.add',['id'=>session()->get('username'),'username'=>$userView->username]) }}">Add friend</a><?php break?>
                        @elseif($check['id'] ==  session()->get('profile_id') && $friendCheck && $check['status'] =='Need Action')
                        <a class="btn btn-primary" href="{{ route('friends.add',['id'=>session()->get('username'),'username'=>$userView->username]) }}">Waiting Approval</a>
                        @elseif($check['id'] ==  session()->get('profile_id') && $friendCheck && $check['status'] =='approved')
                        <a class="btn btn-primary" href="{{ route('friends.add',['id'=>session()->get('username'),'username'=>$userView->username]) }}">Already in friendlist</a>
                        @elseif(!Auth::user())
                        <a class="btn btn-primary" href="{{ route('login')}}">Add friend</a><?php break?>
                        @endif
                        @endforeach
                    @endif                         
                      
                        
       
                        <button class="btn btn-theme btn-sm">Follow</button>
                        <button class="btn btn-theme btn-sm">Message</button>
                    </div>
                    <hr />
                    <div class="card-heading clearfix mt-3">
                        <h4 class="card-title">Highest Achievement</h4>
                    </div>
                    <div class="card-body mb-3">
                    <img src="https://i0.wp.com/carijawaban.id/wp-content/uploads/2020/07/Mythical_Glory.png?resize=169%2C169&ssl=1" class="user-profile-image rounded-circle" alt="" width="300" />
                    <img src="https://eloboost24.eu/images/valorant/6.png"/>  
                        <a href="#" class="label label-success mb-2">HTML</a>
                        <a href="#" class="label label-success mb-2">CSS</a>
                        <a href="#" class="label label-success mb-2">Sass</a>
                        <a href="#" class="label label-success mb-2">Bootstrap</a>
                        <a href="#" class="label label-success mb-2">Javascript</a>
                        <a href="#" class="label label-success mb-2">Photoshop</a>
                        <a href="#" class="label label-success">UI</a>
                        <a href="#" class="label label-success">UX</a>
                    </div>
                    <hr />
                    <div class="card-heading clearfix mt-3">
                        <h4 class="card-title">About</h4>
                    </div>
                    <div class="card-body mb-3">
                        <p class="mb-0">Lorem ipsum dolor sitelt amet, consectetur adipis icing elit, sed do eiusmod tempor incididunt utitily labore et dolore magna aliqua metavta.</p>
                    </div>
                    <hr />
                    <div class="card-heading clearfix mt-3">
                        <h4 class="card-title">Contact Information</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0 text-muted">
                                <tbody>
                                    <tr>
                                        <th scope="row">Email:</th>
                                        <td>addyour@emailhere</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Phone:</th>
                                        <td>(+44) 123 456 789</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Address:</th>
                                        <td>74 Guild Street 542B, Great North Town MT.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-xl-6">
                <div class="card card-white grid-margin">
                    <div class="card-body">
                        <form enctype="multipart/form-data" action="{{ route('post.store',['id' => $user->id]) }}" method="POST">
                            @csrf

                            <div class="post">
                            <textarea class="form-control" placeholder="Post" rows="4" name="content"></textarea>
                            <div class="post-options">
                                <a href="#"><i class="fa fa-camera"></i></a>
                                <a href="#"><i class="fas fa-video"></i></a>
                                <a href="#"><i class="fa fa-music"></i></a>
                                <button class="btn btn-outline-primary float-right">Post</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="profile-timeline">
                    <ul class="list-unstyled">
                        @foreach($userView->userpost as $post)
                        <li class="timeline-item">
                            <div class="card card-white grid-margin">
                                <div class="card-body">
                                    <div class="timeline-item-header">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="" />
                                        <p>{{$userView->nama_lengkap}} <span>posted a status</span></p>
                                        <small>{{($post->getCreatedTime()->diffForHumans())}}
                                        @if($post->getCreatedTime() != $post->getUpdatedTime())
                                            (Last Updated : {{$post->getUpdatedTime()->diffForHumans()}} )@endif
                                        </small>
                                    </div>
                                    <div class="timeline-item-post">
                                    <p>{{$post->post_content}}</p>
                                        <div class="timeline-options">
                                            @foreach($post->like as $likeCheck)
                                            <a href="{{ route('post.addLike',['post_id' => $post->id ,'id' => $user->id]) }}"><i class="fa fa-thumbs-up"></i>Like({{count((array)$post->like)}})</a>
                                            @endforeach
                                            <a href="#"><i class="fa fa-comment"></i> Comment (4)</a>
                                            <a href="#"><i class="fa fa-share"></i> Share (6)</a>
                                        </div>
                                        <div class="timeline-comment">
                                            <div class="timeline-comment-header">
                                                
                                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="" />
                                                <p>Jamara Karle <small>1 hour ago</small></p>
                                            </div>
                                            <p class="timeline-comment-text">Xullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                        </div>
                                        <div class="timeline-comment">
                                            <div class="timeline-comment-header">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="" />
                                                <p>Lois Anderson <small>3 hours ago</small></p>
                                            </div>
                                            <p class="timeline-comment-text">Coluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia.</p>
                                        </div>
                                        <textarea class="form-control" placeholder="Replay"></textarea>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-12 col-xl-3">
                <div class="card card-white grid-margin">
                    <div class="card-heading clearfix">
                        <h4 class="card-title">Friendlist({{$friendList->count()}})</h4>
                    </div>
                    <div class="card-body">
                        <div class="team">
                            @foreach($friendList as $fl)
                            <div class="team-member">
                                <div class="online on"></div>
                                <a href="{{ route('profile.show',['id'=>$fl->username]) }}">
                                <img class="img-responsive" src="{{url('uploads/avatars/' . $fl->avatar)}}" alt="" /></a>
                            @endforeach
                           
                        </div>
                    </div>
                </div>
                <div class="card card-white grid-margin">
                    <div class="card-heading clearfix">
                        <h4 class="card-title">Some Info</h4>
                    </div>
                    <div class="card-body">
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis architecto.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row -->
    </div>
    <!-- end page main wrapper -->
    <div class="page-footer">
        <p>Copyright © 2020 Evince All rights reserved.</p>
    </div>
</div>
</div>
</body>

</html>

@endsection