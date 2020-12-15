@extends('layouts.app')
@section('title')
{{$userView->username}}'s Profile
@endsection

@section('content')
<html lang="en">

<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>profile with contact information - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">



    <style type="text/css">
        body {
            background: #071224;

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
            background-color: #111D35;
            color: #ffffff;
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

        .profile-timeline ul li .timeline-item-post>img {
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
        }

        .post-options .backup {
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
            background-color: grey;
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
            margin-left: auto;
            margin-right: auto;
            display: block;
            position: relative;
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

        [x-cloak] {
            display: none;
        }

        .duration-300 {
            transition-duration: 300ms;
        }

        .ease-in {
            transition-timing-function: cubic-bezier(0.4, 0, 1, 1);
        }

        .ease-out {
            transition-timing-function: cubic-bezier(0, 0, 0.2, 1);
        }

        .scale-90 {
            transform: scale(.9);
        }

        .scale-100 {
            transform: scale(1);
        }

        .product-rating {
            line-height: 22px;
        }

        .product-rating i {
            color: #fc0;
            display: inline-block;
            margin-right: 2px;
            font-size: 14px;
        }

        @media screen and (max-width: 1199px) {
            .product-rating {
                margin-bottom: 5px;
                font-size: 15px;
            }
        }

        @media screen and (max-width: 767px) {
            .product-rating i {
                font-size: 13px;
            }
        }

        .text-secondary {
            color: #004975 !important;
        }

        .card-wrapper {
            position: relative;
            overflow: hidden;
        }

        .card-wrapper .card-img {
            text-align: center;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease-out;
        }

        .card-wrapper .card-img img {
            transition: all 0.3s ease-in-out;
            border-radius: 0.25rem;
            border-radius: 0.25rem;
        }

        .card-wrapper .card-body {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            visibility: hidden;
            padding: 30px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 0.25rem;
            transform: translateX(-100%);
            transition: 0.8s;
            z-index: 11;
        }

        .card-wrapper:before {
            content: "";
            width: 100%;
            position: absolute;
            height: 100%;
            top: 0;
            right: 100%;
            z-index: 9;
            transition: 0.8s;
            background: rgba(0, 186, 238, 0.82);
            border-radius: 0.25rem;
        }

        .card-wrapper:hover:before {
            right: 0;
        }

        .card-wrapper h3,
        .card-wrapper p {
            color: #fff;
        }

        .card-wrapper .read-more {
            color: #fff;
        }

        .card-wrapper .read-more:after {
            color: #fff;
        }

        .card-wrapper:hover .card-body {
            visibility: visible;
            transform: translateX(0px);
        }

        .card-wrapper:hover .backgound-color {
            right: 0;
        }

        .ti-shopping-cart:before {
            content: "\e60d";
        }

        .mb-2-6,
        .my-2-6 {
            margin-bottom: 2.6rem;
        }

        .text-primary {
            color: #00baee !important;
        }

        .img-thumbnail {
            padding: 0.25rem;
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
            max-width: 100%;
            height: auto;
        }

        .containDetails {
            float: left;
            text-align: center;
        }

        .details li {
            display: inline-block;
            margin: 0px;
            padding: 0px;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            padding-left: 48px;
        }


        .details {
            padding: 0px;
        }

        .details li span {
            font-size: 15px;
            text-transform: uppercase;
        }

        .details li span:before {
            content: "\a";
        }

        .jumbotron img {
            width: 150px;
            max-width: 150px;
            max-height: 80%;
        }

        @media screen and (min-width: 1000px) {
            .jumbotron {
                height: 350px;
                overflow: hidden;
            }
        }

        .notification {
            position: relative;
        }

        .notification .badge {
            position: absolute;
            top: -10px;
            right: -10px;
            padding: 5px 10px;
            border-radius: 50%;
            background: red;
            color: white;
        }

        .text-link {
            color: #007BFF
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
        <div class="page-inner no-page-title" style="background: #071224;">
            <!-- start page main wrapper -->
            <div id="main-wrapper">
                <div class="row">
                    <div class="col-lg-5 col-xl-4">
                        <div class="card card-white grid-margin">
                            <div class="card-heading clearfix">

                                <h4 class="card-title">{{ $userView->username }}'s Profile @if ($userView->id ==
                                    $currentUser_id)<button class="float-right btn btn-outline-primary btn-sm"
                                        type="button" data-toggle="modal" data-target="#changeprofile"><i
                                            class="far fa-edit"></i></button>@endif</h4>
                            </div>


                            <div class="card-body user-profile-card mb-3 text-center">
                                <div class="user-profile-image">
                                    <img src="{{ url('uploads/avatars/' . $userView->avatar) }}" class="rounded-circle"
                                        alt="" />
                                    <?php $last_seen = Carbon\Carbon::parse($userView->last_seen->toDateTime()->format('Y-m-d H:i:s'))->diffForHumans()?>
                                    @if(Cache::has('user-is-online-'. $userView->id)) 
                                    <div class='status-circle'>
                                    </div>
                                </div>
                                <h4 class="text-center h6 mt-2">
                                    <?= $userView->nama_lengkap ?></h4>
                                <p class="text-center small">Currently Online</p>
                                @else
                                <div class='status-circle-offline'>
                                </div>
                            </div>
                            <h4 class="text-center h6 mt-2">
                                <?= $userView->nama_lengkap ?></h4>
                            <p class="text-center small">Last Online {{$last_seen}}</p>
                            @endif

                            @if ($userView->id == $currentUser_id)
                            <button class="btn btn-outline-primary" type="button" data-toggle="modal"
                                data-target="#changePhoto">
                                <i class="fa fa-fw fa-camera"></i>
                            </button>
                            <button class="btn btn-outline-primary" type="button" data-toggle="modal"
                                data-target="#changePassword">
                                <i class="fas fa-key"></i>
                            </button>

                            @if($needAction == true)
                            <a class="btn btn-outline-primary notification "
                                href="{{ route('friends.pending', ['id' => $userView->user_id]) }}"> <i
                                    class="fas fa-user-plus"></i> <span class="badge"><i
                                        class="fas fa-exclamation"></i></span></a>
                            @else
                            <a class="btn btn-outline-primary "
                                href="{{ route('friends.pending', ['id' => $userView->user_id]) }}"> <i
                                    class="fas fa-user-plus"></i> <span class="badge"></span></a>
                            @endif
                            <div class="modal fade" id="changePassword" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <form enctype="multipart/form-data"
                                    action="{{ route('changepassword', $currentUser_id) }}" method="POST">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content text-light " style="background-color : #111D35">
                                            <div class="modal-header" style="border:none">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Change Password
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="current_password"
                                                        class="col-form-label float-left">Current Password</label>
                                                    <input type="password" class="form-control" name="current_password"
                                                        style="background-color : #111D35 ;border-color :#071224;">
                                                </div>
                                                <div class="form-group">
                                                    <label for="new_password" class="col-form-label float-left ">New
                                                        Password</label>
                                                    <input type="password" class="form-control" name="new_password"
                                                        style="background-color : #111D35; border-color :#071224;">
                                                </div>
                                                <div class="form-group">
                                                    <label for="new_confirm_password" class="col-form-label float-left ">Re-enter New Password</label>
                                                    <input type="password" class="form-control" name="new_confirm_password"
                                                        style="background-color : #111D35; border-color :#071224;">
                                                </div>


                                            </div>
                                            <div class="modal-footer" style="border:none">
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="pull-right btn btn-outline-primary">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="modal fade" id="changeprofile" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <form enctype="multipart/form-data"
                                    action="{{ route('profile.update', $currentUser_id) }}" method="POST">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content text-light " style="background-color : #111D35">
                                            <div class="modal-header" style="border:none">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Change Account Info
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="recipient-name"
                                                        class="col-form-label float-left">Username</label>
                                                    <input type="text" class="form-control" name="username"
                                                        style="background-color : #111D35 ;border-color :#071224;">
                                                </div>
                                                <div class="form-group">
                                                    <label for="nama_lengkap" class="col-form-label float-left ">Nama
                                                        Lengkap</label>
                                                    <input type="text" class="form-control" name="nama_lengkap"
                                                        style="background-color : #111D35; border-color :#071224;">
                                                </div>


                                            </div>
                                            <div class="modal-footer" style="border:none">
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="pull-right btn btn-outline-primary">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal fade" id="changeAbout" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <form enctype="multipart/form-data"
                                    action="{{ route('profile.updateAbout', $currentUser_id) }}" method="POST">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content text-light " style="background-color : #111D35">
                                            <div class="modal-header" style="border:none">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Change Account Info
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label float-left">About
                                                        You</label>
                                                    <textarea class="form-control text-light" name="about"
                                                        style="background-color : #111D35 ;border-color :#071224;"
                                                        row="3">{{$userView->about}}</textarea>
                                                </div>



                                            </div>
                                            <div class="modal-footer" style="border:none">
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="pull-right btn btn-outline-primary">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <form enctype="multipart/form-data" action="{{ route('profile.update', $currentUser_id) }}"
                                method="POST">
                                <div class="modal fade" id="changePhoto" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content text-light " style="background-color : #111D35">
                                            <div class="modal-header" style="border:none">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Change Photo</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="file" name="avatar">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                            </div>
                                            <div class="modal-footer" style="border:none">
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-outline-primary">Save
                                                    changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            @else

                            @foreach ($userView->profilemanager->friend_ids as $check)
                            @if($currentUser_id != "guest")
                            @if ($check['id'] != $currentUser_id && !$friendCheck)
                            <a class="btn btn-outline-primary"
                                href="{{ route('friends.add', ['id' => UserHelp::get_username($currentUser_id), 'username' => $userView->username,'action' => 'add']) }}"><i
                                    class="fas fa-user-plus"></i></a><?php break; ?>
                            @elseif($check['id'] == session()->get('profile_id') && $friendCheck && $check['status']
                            =='Need Action')
                            <a class="btn btn-outline-primary"
                                href="{{ route('friends.add', ['id' => UserHelp::get_username($currentUser_id), 'username' => $userView->username,'action' => 'add']) }}"><i
                                    class="far fa-hourglass"></i></a>
                            @elseif($check['id'] == session()->get('profile_id') && $friendCheck && $check['status']
                            =='approved')
                            <a class="btn btn-outline-primary" href=""><i class="fas fa-user-friends"></i></a>
                            <a class="btn btn-outline-danger" data-toggle="confirmation" data-title="Are you sure?"
                                data-btn-ok-label="Confirm" data-btn-ok-class="btn-success mr-1"
                                data-btn-ok-icon-class="far fa-check-circle mr-1" data-btn-cancel-label="Cancel"
                                data-btn-cancel-class="btn-danger" data-btn-cancel-icon-class="far fa-times-circle mr-1"
                                href="{{ route('friends.add', ['id' => UserHelp::get_username($currentUser_id), 'username' => $userView->username,'action' => 'remove']) }}"><i
                                    class="fas fa-user-times"></i></a>
                            <p class="text-center mt-2">Friends since
                                {{Carbon\Carbon::parse($check['time'])->format('Y-m-d')}} </p>
                            @endif
                            @elseif(!Auth::user())
                            <a class="btn btn-outline-primary" href="{{ route('login') }}"><i
                                    class="fas fa-user-plus"></i></a><?php break; ?>
                            @endif
                            @endforeach

                            @endif
                            @if(UserHelp::isAdmin($userView->user_id) == '1')
                            <p><button class="mt-3 btn btn-outline-danger"><i class="fas fa-user-shield"></i> Admin</button></p>
                            @else
                            <p><button class="mt-3 btn btn-outline-success"><i class="far fa-user"></i> Member</button></p>
                            @endif
                        </div>
                        <hr />
                        <div class="card-heading clearfix mt-3">
                            <h4 class="card-title">Badges</h4>
                        </div>
                        <div class="card-body mb-3 row">
                            <?php $count_game = $userView->gameCollection->where('status','!=',null)->count();
                                  $count_review = $userView->review->count();
                                  $count_friend = $friendList->count();
                                  $count_completed = $userView->gameCollection->where('status','Completed')->count();
                            ?>
                            @if($count_game == 0)
                            <button class="mr-2 mb-2 btn btn-outline-secondary btn-sm"><i class="fas fa-chess-pawn"></i> Rookie Gamer</button>
                            @elseif($count_game >= 1 && $count_game <= 4)
                            <button class="mr-2 mb-2 btn btn-outline-success btn-sm"><i class="fas fa-chess-knight"></i> Gamer</button>
                            @elseif($count_game >= 5 && $count_game <= 9)
                            <button class="mr-2 mb-2 btn btn-outline-primary btn-sm"><i class="fas fa-chess-bishop"></i> Gamer Maniac</button>
                            @elseif($count_game >= 10 && $count_game <= 17)
                            <button class="mr-2 mb-2 btn btn-outline-danger btn-sm"><i class="fas fa-chess-queen"></i> Gamer Deity</button>
                            @elseif($count_game >= 18 )
                            <button class="mr-2 mb-2 btn btn-outline-warning btn-sm"><i class="fas fa-chess-king"></i> God of Gamer</button>
                            @endif
                            @if($count_review > 0 && $count_review < 5)
                            <button class="mb-2 btn btn-outline-success btn-sm"><i class="fas fa-chess-knight"></i> Rookie Reviewer</button>
                            @elseif($count_review > 5 && $count_review < 10)
                            <button class="mb-2 btn btn-outline-primary btn-sm"><i class="fas fa-chess-bishop"></i> Experienced Reviewer</button>
                            @elseif($count_review > 10 && $count_review < 18)             
                            <button class="mb-2 btn btn-outline-danger btn-sm"><i class="fas fa-chess-queen"></i> Consultant of Game </button>
                            @elseif($count_review > 18 )
                            <button class="mb-2 btn btn-outline-warning btn-sm"><i class="fas fa-chess-king"></i> Walking Encyclopedia </button>
                            @endif
                            @if($count_friend == 0)
                            <button class="mr-2 btn btn-outline-secondary btn-sm"><i class="fas fa-chess-pawn"></i> Lonely</button>
                            @elseif($count_friend > 0 && $count_friend < 5)
                            <button class="mr-2 btn btn-outline-success btn-sm"><i class="fas fa-chess-knight"></i> Socialist</button>
                            @elseif($count_friend > 5 && $count_friend < 10)
                            <button class="mr-2 btn btn-outline-primary btn-sm"><i class="fas fa-chess-bishop"></i> Friendly Gamer</button>
                            @elseif($count_friend > 10 && $count_friend < 18)
                            <button class="mr-2 btn btn-outline-danger btn-sm"><i class="fas fa-chess-queen"></i> Neighborhood Gamer</button>
                            @elseif($count_friend > 18)
                            <button class="mr-2 btn btn-outline-warning btn-sm"><i class="fas fa-chess-king"></i> Friends with the World</button>
                            @endif
                            @if($count_completed > 0 && $count_completed < 5)
                            <button class="btn btn-outline-success btn-sm"><i class="fas fa-chess-knight"></i>Git Gud</button>
                            @elseif($count_completed > 5 && $count_completed < 10)
                            <button class="btn btn-outline-primary btn-sm"><i class="fas fa-chess-bioshop"></i >Gamer Amongs Man</button>
                            @elseif($count_completed > 10 && $count_completed < 18)
                            <button class="btn btn-outline-danger btn-sm"><i class="fas fa-chess-queen"></i> The legend Has Born</button>
                            @elseif($count_completed > 18 )
                            <button class="btn btn-outline-warning btn-sm"><i class="fas fa-chess-king"></i> The Game It Self</button>
                            @endif
                        </div>
                        <hr />
                        <div class="card-heading clearfix mt-3">
                            <h4 class="card-title">About @if ($userView->id == $currentUser_id)<button
                                    class="float-right btn btn-outline-primary btn-sm" type="button" data-toggle="modal"
                                    data-target="#changeAbout"><i class="far fa-edit"></i></button>@endif</h4>
                        </div>
                        <div class="card-body mb-3">
                            <p class="mb-0">{{$userView->about}}</p>
                        </div>
                        <hr />
                        <div class="card-heading clearfix mt-3">
                            <h4 class="card-title">Contact Information @if ($userView->id == $currentUser_id)<button
                                    class="float-right btn btn-outline-primary btn-sm" type="button" data-toggle="modal"
                                    data-target="#changeContact"><i class="far fa-edit"></i></button>@endif</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-borderless mb-0 text-muted">
                                    <tbody>
                                        @if($userView->contact_list)
                                        @foreach($userView->contact_list as $contact_list)
                                        @if($contact_list['contact_name'] != 'N/A')
                                        <tr>
                                        <th scope="row">
                                        {{$contact_list['contact_type']}} : 
                                        <td>{{$contact_list['contact_name']}}</td>
                                    </tr>
                                    @endif
                                </th>
                                    @endforeach 
                                 
                                    @else
                                    <tr>
                                        <th scope="row">
                                        N/A : 
                                        <td>N/A</td>
                                    </tr>
                                </th>
                                @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal fade" id="changeContact" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <form enctype="multipart/form-data"
                                    action="{{ route('profile.addContact', $userView->username) }}" method="POST">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content text-light " style="background-color : #111D35">
                                            <div class="modal-header" style="border:none">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Add Contact Information
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="recipient-name"
                                                        class="col-form-label float-left">Contact Type</label>
                                                        
                                                        <select name="contact_type" class="custom-select float-left text-light" style="background-color: #111D35;border-color :  #111D35;left : 0;bottom : 20">
                                                            <option selected>Select Contact</option>
                                                            @foreach(UserHelp::get_contact() as $contact)                                                   
                                                        <option value="{{$contact->contact_name}}">{{$contact->contact_name}}</option>
                                                            @endforeach
                                                            </select>  
                                                </div>
                                                <div class="form-group">
                                                    <label for="nama_lengkap" class="col-form-label float-left ">Contact Name</label>
                                                    <input type="text" class="form-control" name="contact_name"
                                                        style="background-color : #111D35; border-color :#071224;">
                                                </div>


                                            </div>
                                            <div class="modal-footer" style="border:none">
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="pull-right btn btn-outline-primary">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                    <div class="card card-white grid-margin mt-3">
                        <h3> Friendlist ({{ $friendList->count() }})</h3>
                        <div class="card-body">
                            <div class="team">
                                @foreach ($friendList as $fl)
                                <div class="team-member">
                                    @if(Cache::has('user-is-online-'. $fl->profile_id)) 
                                    <div class="online on"></div>
                                    @else
                                    <div class="online off"></div>
                                    @endif
                                    <a href="{{ route('profile.show', ['id' => $fl->username]) }}">
                                        <img class="img-fluid" src="{{ url('uploads/avatars/' . $fl->avatar) }}"
                                            alt="" /></a>
                                </div>
                                @endforeach
                            </div>

                        </div>

                    </div>
                </div>

                <div class="col-lg-8 col-xl-8">

                    @livewire('profile',['postedProfile_id' => $userView->id, 'posted_by' =>
                    $currentUser_id,'currentUser_id' => $currentUser_id,'userView' => $userView])
                </div>

                <!-- Row -->
            </div>
            <!-- end page main wrapper -->

        </div>
    </div>
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
    <script>
        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]',
            // other options
        });
    </script>
</body>

</html>

@endsection
