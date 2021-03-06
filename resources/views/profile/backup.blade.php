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
            background: #1b253a;

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

        body {
            margin-top: 20px;
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
    </style>
</head>

<body>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <div class="container-fluid">
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

        <div class="page-inner no-page-title" style="background: #1b253a;">
            <!-- start page main wrapper -->
            <div id="main-wrapper">
                <div class="row">
                    <div class="col-lg-5 col-xl-3">
                        <div class="card card-white grid-margin">
                            <div class="card-heading clearfix">
                                <h4 class="card-title">{{ $userView->nama_lengkap }}'s Profile</h4>
                            </div>
                            <div class="card-body user-profile-card mb-3">
                                <img src="{{ url('uploads/avatars/' . $userView->avatar) }}"
                                    class="user-profile-image rounded-circle" alt="" />
                                <h4 class="text-center h6 mt-2">
                                    <?= $userView->username ?></h4>
                                <p class="text-center small">UI/UX Designer</p>
                                @if ($userView->user_id == $currentUser)
                                <button class="btn btn-primary" type="button" data-toggle="modal"
                                    data-target="#exampleModalCenter">
                                    <i class="fa fa-fw fa-camera"></i>
                                    <span>Change Photo</span>
                                </button>
                                <button type="button"
                                    class="bg-transparent border border-gray-500 hover:border-indigo-500 text-gray-500 hover:text-indigo-500 font-bold py-2 px-4 rounded-full"
                                    @click="showModal = true">Open modal</button>

                                <a class="btn btn-primary"
                                    href="{{ route('friends.pending', ['id' => session()->get('username')]) }}">Friend
                                    Request</a>
                                <div class="modal fade" id="changeprofile" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <form enctype="multipart/form-data"
                                        action="{{ route('profile.update', $user->id) }}" method="POST">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="recipient-name"
                                                            class="col-form-label">Username</label>
                                                        <input type="text" class="form-control" name="username">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="message-text"
                                                            class="col-form-label">Message:</label>
                                                        <textarea class="form-control" id="message-text"></textarea>
                                                    </div>


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="pull-right btn btn-sm btn-primary">
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                </form>
                                <form enctype="multipart/form-data" action="{{ route('profile.update', $user->id) }}"
                                    method="POST">
                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="file" name="avatar">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="pull-right btn btn-sm btn-primary">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                @else
                                @foreach ($userView->profilemanager->friend_ids as $check)
                                @if ($check['id'] != session()->get('profile_id') && !$friendCheck)
                                <a class="btn btn-primary"
                                    href="{{ route('friends.add', ['id' => session()->get('username'), 'username' => $userView->username]) }}">Add
                                    friend</a><?php break; ?>
                                @elseif($check['id'] == session()->get('profile_id') && $friendCheck && $check['status']
                                =='Need Action')
                                <a class="btn btn-primary"
                                    href="{{ route('friends.add', ['id' => session()->get('username'), 'username' => $userView->username]) }}">Waiting
                                    Approval</a>
                                @elseif($check['id'] == session()->get('profile_id') && $friendCheck && $check['status']
                                =='approved')
                                <a class="btn btn-primary"
                                    href="{{ route('friends.add', ['id' => session()->get('username'), 'username' => $userView->username]) }}">Already
                                    in friendlist</a>
                                @elseif(!Auth::user())
                                <a class="btn btn-primary" href="{{ route('login') }}">Add friend</a><?php break; ?>
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
                                <img src="https://i0.wp.com/carijawaban.id/wp-content/uploads/2020/07/Mythical_Glory.png?resize=169%2C169&ssl=1"
                                    class="user-profile-image rounded-circle" alt="" width="300" />
                                <img src="https://eloboost24.eu/images/valorant/6.png" />
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
                                <p class="mb-0">Lorem ipsum dolor sitelt amet, consectetur adipis icing elit, sed do
                                    eiusmod tempor incididunt utitily labore et dolore magna aliqua metavta.</p>
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

                    <div class="col-lg-8 col-xl-6">
                        <div class = "row">
                        @foreach($userView->showGame as $games)
                    
                        <div class="col-sm-6 col-lg-3 mb-2-6">
                            <div class="card-wrapper mb-4">
                                <div class="card-img"><img src="{{ url('uploads/gamePicture/' . $games->gameData->gamePicture) }}"
                                        alt="..."></div>
                                <div class="card-body">
                                    <div>
                                        <a href="{{ route('gameView.show',$games->gameData->id) }}"><i
                                                class="bg-white p-3 rounded-circle ti-shopping-cart font-weight-600"></i></a>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="text-center">
                            <h4 class="h5 mb-2"><a href="#" class="text-secondary">{{$games->gameData->gameName}}</a></h4>
                            </div>
                        </div>
                        @endforeach
                    </div>
                        @livewire('profile',['postedProfile_id' => $userView->id, 'posted_by' => $user->id])

                        <div class="profile-timeline">
                            <ul class="list-unstyled">
                                @livewire('post-list',['profile_id' => $userView->id,'user_id' => $user->id])

                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12 col-xl-3">
                        <div class="card card-white grid-margin">
                            <div class="card-heading clearfix">
                                <h4 class="card-title">Friendlist({{ $friendList->count() }})</h4>
                            </div>
                            <div class="card-body">
                                <div class="team">
                                    @foreach ($friendList as $fl)
                                    <div class="team-member">
                                        <div class="online on"></div>
                                        <a href="{{ route('profile.show', ['id' => $fl->username]) }}">
                                            <img class="img-responsive"
                                                src="{{ url('uploads/avatars/' . $fl->avatar) }}" alt="" /></a>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            <div class="card card-white grid-margin">
                                <div class="card-heading clearfix">
                                    <h4 class="card-title">Some Info</h4>
                                </div>
                                <div class="card-body">
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                        doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore
                                        veritatis architecto.</p>
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