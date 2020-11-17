@extends('layouts.app')
@section('content')


<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>profile with data and skills - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <style type="text/css">
        body {
            color: #1a202c;
            text-align: left;
            background-color: #e2e8f0;
        }

        .main-body {
            padding: 15px;
        }

        .card {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1rem;
        }

        .gutters-sm {
            margin-right: -8px;
            margin-left: -8px;
        }

        .gutters-sm>.col,
        .gutters-sm>[class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }

        .mb-3,
        .my-3 {
            margin-bottom: 1rem !important;
        }

        .bg-gray-300 {
            background-color: #e2e8f0;
        }

        .h-100 {
            height: 100% !important;
        }

        .shadow-none {
            box-shadow: none !important;
        }
        .servive-block-dark-blue {
  background: #4765a0;
}

    </style>
</head>

<body>
    @if (Auth::user())
        @php
        $currentUser = UserHelp::getID(Auth::user()->id);
        $username = UserHelp::get_username(Auth::user()->id);
        @endphp
    @else
        @php
         $currentUser = '';   
         $username = 'Guest';
        @endphp
    @endif
    <div class="container">

        <div class="main-body">

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/gameIndex') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/gameIndex') }}">Game</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $game->gameName }}</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->
            
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="{{ url('uploads/gamePicture/' . $game->gamePicture) }}" alt="Admin"
                                    class="rounded-circle" width="300">
                                <div class="mt-3">
                                    <h4>{{ $game->gameName }}</h4>
                                    <p class="text-secondary mb-1">
                                        @foreach ($game->genre as $genre)
                                        <div class="btn btn-info">{{ $genre->title }}</div>
                                        @endforeach
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-globe mr-2 icon-inline">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="2" y1="12" x2="22" y2="12"></line>
                                        <path
                                            d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                                        </path>
                                    </svg>Rating</h6>
                                <span class="text-secondary">{{ $game->rating }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-github mr-2 icon-inline">
                                        <path
                                            d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
                                        </path>
                                    </svg>Genre</h6>
                                <span class="text-secondary">

                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-twitter mr-2 icon-inline text-info">
                                        <path
                                            d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                                        </path>
                                    </svg>Developer</h6>
                                <span class="text-secondary">{{ $game->developer }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-instagram mr-2 icon-inline text-danger">
                                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                    </svg>Release Date</h6>
                                <span class="text-secondary">{{ $game->releaseDate }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-facebook mr-2 icon-inline text-primary">
                                        <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                                        </path>
                                    </svg>Facebook</h6>
                                <span class="text-secondary">bootdey</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3"><div class="card-body servive-block-dark-blue"><div class="row">
                        <div class="col-md-3">Rating</div>
                        asdasd</div></div></div>
                        <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <button type="button" class="btn btn-primary ml-2" data-toggle="modal"
                                data-target="#add<?= $game->id ?>">Add game</button>
                                
                                <button type="button" class="btn btn-primary ml-2" data-toggle="modal"
                                data-target="#rate<?= $game->id ?>">Rate this game</button>
                                <button type="button" class="btn btn-primary ml-2" data-toggle="modal"
                                data-target="#review<?= $game->id ?>">Review this game</button>
                                @if (Auth::user() && in_array($currentUser,$game->userfav))
                                <a href="{{ route('game.removeFav', ['game_id' =>$game->id ]) }}" class="btn btn-primary ml-2">Remove Favourite</a>
                                @elseif(Auth::user() && !in_array($currentUser,$game->userfav))
                                <a href="{{ route('game.addFav', ['game_id' =>$game->id ]) }}" class="btn btn-primary ml-2">Add Favourite</a>
                                @elseif(!Auth::user())
                                <a href="{{ route('game.addFav', ['game_id' =>$game->id ]) }}" class="btn btn-primary ml-2">Add Favourite</a>
                                @endif
                    <div class="modal fade" id="add<?= $game->id ?>" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <form enctype="multipart/form-data"
                            action="{{ route('game.store', ['game_id' =>$game->id ]) }}" method="GET">
                            @csrf
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input"
                                                id="add1" name="addRadio"
                                                value="Want to Play">
                                            <label class="custom-control-label"
                                                for="add1">Want to Play</label>
                                        </div>


                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input"
                                                id="add2" name="addRadio"
                                                value="Currently Playing">
                                            <label class="custom-control-label"
                                                for="add2">Currently Playing</label>
                                        </div>


                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input"
                                                id="add3" name="addRadio" value="Beaten">
                                            <label class="custom-control-label" for="add3"
                                                >Beaten</label>
                                        </div>

                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input"
                                                id="add4" name="addRadio" value="Completed">
                                            <label class="custom-control-label" for="add4"
                                                >Completed</label>
                                        </div>

                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input"
                                                id="add5" name="addRadio" value="Dropped">
                                            <label class="custom-control-label" for="add5"
                                                >Dropped</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <div class="modal fade" id="review<?= $game->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form enctype="multipart/form-data"
                  action="{{ route('game.storeRating', ['game_id' =>$game->id ]) }}" method="GET">
                  
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Username</label>
                    <input type="text" class="form-control" id="recipient-name" value="{{$username}}" disabled>
                    </div>
                    <div class="form-group">
                      <label for="message-text" class="col-form-label">Review</label>
                      <textarea class="form-control" id="message-text" name="review_content"></textarea>
                    </div>
                    <p>Rating
                    <input id="rateReview" class="multi-range" name="rating" type="range" min="1" max="5" /></p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="reviewRadio" id="inlineRadio1" value="dislike">
                        <label class="form-check-label" for="inlineRadio1"><i class="fa fa-frown-o fa-5x" aria-hidden="true"></i></label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="reviewRadio" id="inlineRadio2" value="neutral">
                        <label class="form-check-label" for="inlineRadio2"><i class="fa fa-meh-o fa-5x" aria-hidden="true"></i></label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="reviewRadio" id="inlineRadio3" value="like">
                        <label class="form-check-label" for="inlineRadio3"><i class="fa fa-smile-o fa-5x" aria-hidden="true"></i></label>
                      </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                           
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
              </div>
            </div>
          </div>

                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">

                        <div class="col-sm-9 text-secondary">

                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">

                    <div class="col-sm-3">
                        <h6 class="mb-0">Summary</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $game->summary }}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        fip@jukmuh.al
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        (239) 816-9029
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Mobile</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        (320) 380-4539
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        Bay Area, San Francisco, CA
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Screenshot</h6>
                    </div>
                    <div class="mt-2 col-md-12 row">
                        <div class="col-md-4">
                        <img alt="Generic placeholder image" src="http://bootdey.com/img/Content/avatar/avatar1.png"  class="img-fluid">
                        </div>
                        <div class="col-md-4">
                        <img alt="Generic placeholder image" src="http://bootdey.com/img/Content/avatar/avatar1.png"  class="img-fluid">
                        </div>
                        <div class="col-md-4">
                            <img alt="Generic placeholder image" src="http://bootdey.com/img/Content/avatar/avatar1.png"  class="img-fluid">
                            </div>
                    </div>
                </div></div></div>
        <div class="row gutters-sm">
            <div class="col-sm-6 mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h6 class="d-flex align-items-center mb-3"><i
                        class="material-icons text-info mr-2">User</i>Statistics (User : {{$dataBar['totalUser']}})</h6>
                        <small>Want to Play</small>
                        <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar"  style="width: {{$dataBar['wtp']}}%"
                               aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small>Currently Playing</small>
                        <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar"  style="width: {{$dataBar['cp']}}%"
                               aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small>Beaten</small>
                        <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar"  style="width: {{$dataBar['beaten']}}%"
                                 aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small>Completed</small>
                        <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: {{$dataBar['completed']}}%"
                               aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small>Dropped</small>
                        <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: {{$dataBar['dropped']}}%"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-6 mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h6 class="d-flex align-items-center mb-3"><i
                                class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                        <small>Web Design</small>
                        <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 80%"
                                aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small>Website Markup</small>
                        <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 72%"
                                aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small>One Page</small>
                        <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 89%"
                                aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small>Mobile Template</small>
                        <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 55%"
                                aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small>Backend API</small>
                        <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 66%"
                                aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded shadow-sm p-4 mb-4 restaurant-detailed-ratings-and-reviews">
            <a href="#" class="btn btn-outline-primary btn-sm float-right">Top Rated</a>
            <h5 class="mb-1">All Ratings and Reviews</h5>
            
            @foreach($game->review as $review)
            <div class="reviews-members pt-2 pb-4">
                <div class="media">
                    <a href="#"><img alt="Generic placeholder image" src="http://bootdey.com/img/Content/avatar/avatar1.png" width="100" class="mr-3 rounded-pill"></a>
                    <div class="media-body">
                        <div class="reviews-members-header">
                            <span class="star-rating float-right">
                                  <a href="#"><i class="icofont-ui-rating active"></i></a>
                                  <a href="#"><i class="icofont-ui-rating active"></i></a>
                                  <a href="#"><i class="icofont-ui-rating active"></i></a>
                                  <a href="#"><i class="icofont-ui-rating active"></i></a>
                                  <a href="#"><i class="icofont-ui-rating"></i></a>
                                  </span>
                                <h6 class="mb-1"><a class="text-black" href="#">{{UserHelp::get_fullname($review->profile_id)}}</a></h6>
                                <p class="text-gray">{{$review->created_at->diffForHumans()}}</p>
                        </div>
                        <div class="reviews-members-body">
                        <p>{{$review->review_content}}</p>
                        </div>
                        <div class="reviews-members-footer">
                            <a class="total-like" href="#"><i class="icofont-thumbs-up"></i> 856M</a> <a class="total-like" href="#"><i class="icofont-thumbs-down"></i> 158K</a>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            @endforeach    
        </div>

                    
    </div>
    </div>
    </div>
    </div>
    <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript">
       
var slider = document.getElementById("rateReview");
var output = document.getElementById("demo");
output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;
}
      
    </script>
</body>


@endsection