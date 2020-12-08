<div x-data="{ tab : 'foo'}">
    
    @if (Auth::user())
    @php
    $currentUser = UserHelp::getID(Auth::user()->id);
    $username = UserHelp::get_username(Auth::user()->id);
    @endphp
    @else
    @php
    $currentUser = 'guest';
    $username = 'Guest';
    @endphp
    @endif
    <div class="container">
        <style>
            .main-box.no-header {
                padding-top: 20px;
            }

            .main-box {
                background: #FFFFFF;
                -webkit-box-shadow: 1px 1px 2px 0 #CCCCCC;
                -moz-box-shadow: 1px 1px 2px 0 #CCCCCC;
                -o-box-shadow: 1px 1px 2px 0 #CCCCCC;
                -ms-box-shadow: 1px 1px 2px 0 #CCCCCC;
                box-shadow: 1px 1px 2px 0 #CCCCCC;
                margin-bottom: 16px;
                -webkit-border-radius: 3px;
                -moz-border-radius: 3px;
                border-radius: 3px;
            }

            .table a.table-link.danger {
                color: #e74c3c;
            }

            .label {
                border-radius: 3px;
                font-size: 0.875em;
                font-weight: 600;
            }

            .user-list tbody td .user-subhead {
                font-size: 0.875em;
                font-style: italic;
            }

            .user-list tbody td .user-link {
                display: block;
                font-size: 1em;
                padding-top: 3px;
                margin-left: 60px;
            }

            a {
                color: #3498db;
                outline: none !important;
            }

            .user-list tbody td>img {
                position: relative;
                max-width: 50px;
                float: left;
                margin-right: 15px;
            }

            .table thead tr th {
                text-transform: uppercase;
                font-size: 0.875em;
            }

            .table thead tr th {
                border-style: none;

            }

            .table tbody tr td:first-child {
                font-size: 1.125em;
                font-weight: 300;
            }

            .table tbody tr td {
                font-size: 0.875em;
                vertical-align: middle;
                border-style: none;
                padding: 12px 8px;
            }

            a:hover {
                text-decoration: none;
            }

            .icon-container {
                width: 50px;
                height: 50px;
                float: left;
                margin-right: 15px;
                position: relative;
            }

            .icon-container img {
                height: 100%;
                width: 100%;
                border-radius: 50%;
            }

            .card-body {
                background-color: #111D35;
                color: white;
            }

            .tab-color {
                background-color: #111D35;
            }

            .list-group .list-group-item {
                background-color: #111D35;
                border-left-color: #e7ebee;
                border-right-color: #111D35;
            }

            .rating_star {
                font-size: 48px;
                color: orange;
                display: inline-block;
                overflow: hidden;
            }

            .rating_star::before {
                font-family: FontAwesome;
                font-size: 45px;
                content: "\f005 \f005 \f005 \f005 \f005"
            }
            .inputGroup {
                background-color: #111D35;
	 display: block;
	 margin: 10px 0;
	 position: relative;
}
 .inputGroup label {
	 padding: 12px 30px;
	 width: 100%;
	 display: block;
	 text-align: left;
	 color: #3c454c;
	 cursor: pointer;
	 position: relative;
	 z-index: 2;
	 transition: color 200ms ease-in;
	 overflow: hidden;
}
 .inputGroup label:before {
	 width: 10px;
	 height: 10px;
	 border-radius: 50%;
	 content: '';
	 background-color: #5562eb;
	 position: absolute;
	 left: 50%;
	 top: 50%;
	 transform: translate(-50%, -50%) scale3d(1, 1, 1);
	 transition: all 300ms cubic-bezier(0.4, 0, 0.2, 1);
	 opacity: 0;
	 z-index: -1;
}
 .inputGroup label:after {
	 width: 32px;
	 height: 32px;
	 content: '';
	 border: 2px solid #d1d7dc;
	 background-color: #fff;
	 background-image: url("data:image/svg+xml,%3Csvg width='32' height='32' viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M5.414 11L4 12.414l5.414 5.414L20.828 6.414 19.414 5l-10 10z' fill='%23fff' fill-rule='nonzero'/%3E%3C/svg%3E ");
	 background-repeat: no-repeat;
	 background-position: 2px 3px;
	 border-radius: 50%;
	 z-index: 2;
	 position: absolute;
	 right: 30px;
	 top: 50%;
	 transform: translateY(-50%);
	 cursor: pointer;
	 transition: all 200ms ease-in;
}
 .inputGroup input:checked ~ label {
	 color: #fff;
}
 .inputGroup input:checked ~ label:before {
	 transform: translate(-50%, -50%) scale3d(56, 56, 1);
	 opacity: 1;
}
 .inputGroup input:checked ~ label:after {
	 background-color: #54e0c7;
	 border-color: #54e0c7;
}
 .inputGroup input {
	 width: 32px;
	 height: 32px;
	 order: 1;
	 z-index: 2;
	 position: absolute;
	 right: 30px;
	 top: 50%;
	 transform: translateY(-50%);
	 cursor: pointer;
	 visibility: hidden;
}

        </style>
        <div class="main-body">

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb" style="background-color : #111D35">>
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('gamelist.all') }}">Game</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $game->gameName }}</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->

            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body" style="">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="{{ url('uploads/gamePicture/' . $game->gamePicture) }}" alt="Admin" class=""
                                    width="300">
                                <div class="mt-3">
                                    <h4>{{ $game->gameName }}</h4>
                                    <p class="text-secondary mb-1">
                                        @foreach ($game->genre as $genre)
                                        <a href="{{ route('gameList',['id' =>$genre->title]) }}"
                                            class="btn btn-outline-primary text-light mt-2">{{ $genre->title }}</a>
                                        @endforeach
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-columns mt-3" style="column-count : 1">
                        <div class="card-body servive-block-dark-blue">
                            <div class="row">
                                <div class="col-md-3 text-sm">Rating({{$star_rating}}) </div>
                                <div>
                                    @if($star_rating != null)
                                    <div id="rating1" class="rating_star" style="display:inline-block"></div>
                                    @else
                                    <div id="rating1" class="rating_star" style="display:inline-block;color:grey"></div>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-body" style="">
                            <button class="btn btn-outline-primary btn-sm text-light"> <i
                                    class="fas fa-eye mr-1"></i>{{$game->view_counter}}</button>
                            <a class="btn btn-outline-primary btn-sm text-light ml-1" data-toggle="confirmation"
                                data-title="Are you sure?" data-btn-ok-label="Confirm"
                                data-btn-ok-class="btn-success mr-1" data-btn-ok-icon-class="far fa-check-circle mr-1"
                                data-btn-cancel-label="Cancel" data-btn-cancel-class="btn-danger"
                                data-btn-cancel-icon-class="far fa-times-circle mr-1"
                                href="{{ route('add_wishlist', ['game_id' =>$game->id,'profile_id' => $currentUser]) }}"><i
                                    class="fas fa-heart mr-1"></i>{{count($game->userfav)}}</a>
                                    @if (Auth::user() && in_array($currentUser,$game->userfav))
                                    <a class="btn btn-outline-primary btn-sm ml-1" data-toggle="confirmation"
                                    data-title="Are you sure?" data-btn-ok-label="Confirm"
                                    data-btn-ok-class="btn-success mr-1" data-btn-ok-icon-class="far fa-check-circle mr-1"
                                    data-btn-cancel-label="Cancel" data-btn-cancel-class="btn-danger"
                                    data-btn-cancel-icon-class="far fa-times-circle mr-1"
                                    href="{{ route('game.removeFav', ['game_id' =>$game->id ]) }}">Remove from Favourite</a>
                                    @elseif(Auth::user() && !in_array($currentUser,$game->userfav))
                                    <a class="btn btn-outline-primary btn-sm ml-1" data-toggle="confirmation"
                                    data-title="Are you sure? you can only add 4 games to your favourites list" data-btn-ok-label="Confirm"
                                    data-btn-ok-class="btn-success mr-1" data-btn-ok-icon-class="far fa-check-circle mr-1"
                                    data-btn-cancel-label="Cancel" data-btn-cancel-class="btn-danger"
                                    data-btn-cancel-icon-class="far fa-times-circle mr-1"
                                    href="{{ route('game.addFav', ['game_id' =>$game->id ]) }}">Add to Favourite</a>
                                  
                                    @elseif(!Auth::user())
                                    <a href="{{ route('game.addFav', ['game_id' =>$game->id ]) }}"
                                        class="btn btn-outline-primary btn-sm ml-2">Add Favourite</a>
                                    @endif
                                
                        </div>
                    </div>

                    <div class="card mt-3">

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0 text-light"><i class="fas fa-exclamation-circle mr-2"></i>Rating</h6>
                                <span class="text-secondary">{{ $game->rating }}</span>
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0 text-light"><i class="fas fa-hammer mr-2"></i>Developer</h6>
                                <span class="text-secondary">{{ $game->developer }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0 text-light"><i class="fas fa-globe mr-2"></i>Release Date</h6>
                                <span class="text-secondary">{{ $game->releaseDate }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0 text-light"><i class="fas fa-building mr-2"></i>Publisher</h6>
                                <span class="text-secondary"></span>
                            </li>
                        </ul>
                    </div>

                    <div class="card mt-3">
                        <div class="card-body">
                        <h3> User Collection (<?php $count =  $game->user_collection->count();
                        echo $count?>) </h3>
                        @if($count <= 3)
                        @foreach($game->user_collection->random($count) as $collection)    
                        <h6><a href="/profile/{{$collection->profile_id}}/gameCollection/list/{{$collection->id}}"> {{$collection->collection_name}}'s by {{$collection->profile_id}}</a></h6>
                        @endforeach
                        @endif
                        </div>
                    </div>

                </div>


                <template x-if="tab === 'foo'">
                    <div class="col-md-8" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform scale-90"
                        x-transition:enter-end="opacity-100 transform scale-100">
                        
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <button type="button" class="btn btn-outline-primary btn-sm ml-2" data-toggle="modal"
                                        data-target="#add<?= $game->id ?>">Add Game to your Collection</button>
                                    @auth
                                    <button type="button" class="btn btn-outline-primary btn-sm ml-2" data-toggle="modal"
                                        data-target="#addto_collection<?= $game->id ?>">Add to your Custom Collection</button>
                                    @endauth
                                    <button type="button" class="btn btn-outline-primary btn-sm ml-2" data-container="body"
                                        data-toggle="popover" data-placement="bottom" data-content=""
                                        x-on:click="tab = 'rate'">
                                        Rate This Game
                                    </button>
                                    <button type="button" class="btn btn-outline-primary btn-sm ml-2" data-toggle="modal"
                                        data-target="#review<?= $game->id ?>">Make a Review</button>
                                    
                                    <div class="modal fade text-light" id="add<?= $game->id ?>" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <form enctype="multipart/form-data"
                                            action="{{ route('game.store', ['game_id' =>$game->id ]) }}" method="GET">
                                            @csrf
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content" style=" background-color: #111D35;">
                                                    <div class="modal-header" style="border:none">
                                                        <h5 class="modal-title" id="exampleModalLabel">Add Game to Your Gamelist</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="inputGroup">
                                                            <input id="radio1" name="addRadio" type="radio" value="Want to Play"/>
                                                            <label for="radio1" class="text-light">Want to Play</label>
                                                          </div>
                                                          <div class="inputGroup">
                                                            <input id="radio2" name="addRadio" type="radio" value="Currently Playing"/>
                                                            <label for="radio2" class="text-light">Currently Playing</label>
                                                          </div>
                                                        
                                                          <div class="inputGroup">
                                                            <input id="radio3" name="addRadio" type="radio" value="Beaten" />
                                                            <label for="radio3" class="text-light">Beaten</label>
                                                          </div>
                                                          <div class="inputGroup">
                                                            <input id="radio4" name="addRadio" type="radio" value="Completed" />
                                                            <label for="radio4" class="text-light">Completed</label>
                                                          </div>
                                                          <div class="inputGroup">
                                                            <input id="radio5" name="addRadio" type="radio" value="Dropped" />
                                                            <label for="radio5" class="text-light">Dropped</label>
                                                          </div>
                                                        
                                                    </div>
                                                    <div class="modal-footer" style="border:none">
                                                        <button type="button" class="btn btn-outline-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-outline-primary">Save
                                                            changes</button>
                                        </form>
                                    </div>
                                    
                                </div>

                            </div>
                        </div>
                        @auth
                        <div class="modal fade" id="addto_collection<?= $game->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <form enctype="multipart/form-data"
                                            action="{{ route('addgame_toCollection', ['username' => $username,'game_id' => $game->id ]) }}" method="GET">
                                            @csrf
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content"  style=" background-color: #111D35;">
                                <div class="modal-header" style="border:none">
                                  <h5 class="modal-title" id="exampleModalLabel">Select Collection</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    
                                    @if(UserHelp::getCollection($username)->isNotEmpty())
                                    <h6> Your Collections</h6>
                                @foreach (UserHelp::getCollection($username) as $index => $collection)
                                <div class="inputGroup">
                                    <input id="{!! $index !!}" name="addCollection" type="radio" value="{!! $collection->_id !!}"/>
                                    <label for="{!! $index !!}" class="text-light">{{$collection->collection_name}}</label>
                                  </div>
                                @endforeach
                                @else
                                <h6> You never made a collection before <a class="btn btn-outline-primary btn-sm" href="/profile/{{$username}}/gameCollection/create"> Click here to make one</a> </h6>
                                @endif
                                </div>
                                <div class="modal-footer" style="border:none">
                                  <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                                  <button type= "submit" class="btn btn-outline-primary">Save changes</button>
                                </div>
                              </div>
                            </div>
                        </form>
                          </div>
                        @endauth
                        <div class="modal fade" id="review<?= $game->id ?>" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content" style="background-color : #111D35">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Review</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form enctype="multipart/form-data"
                                        action="{{ route('game.store_review', ['game_id' =>$game->id ]) }}"
                                        method="GET">
                                        @csrf
                                        <div class="modal-body">

                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Username</label>
                                                <input type="text" class="form-control" id="recipient-name"
                                                    value="{{$username}}" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="col-form-label">Review</label>
                                                <textarea class="form-control" id="message-text"
                                                    name="review_content"></textarea>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="reviewRadio"
                                                    id="inlineRadio1" value="dislike" required>
                                                <label class="form-check-label" for="inlineRadio1"><i
                                                        class="far fa-frown-o fa-5x" aria-hidden="true"></i></label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="reviewRadio"
                                                    id="inlineRadio2" value="neutral">
                                                <label class="form-check-label" for="inlineRadio2"><i
                                                        class="far fa-meh-o fa-5x" aria-hidden="true"></i></label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="reviewRadio"
                                                    id="inlineRadio3" value="like">
                                                <label class="form-check-label" for="inlineRadio3"><i
                                                        class="far fa-smile-o fa-5x" aria-hidden="true"></i></label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Submit</button>

                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
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
                        <h6 class="mb-0">Summary</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ $game->summary }}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Platform</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        @foreach($game->platform as $platform)
                        <button class="{{$platform->button_class}} btn-sm" disabled><i
                                class="{{$platform->i_class}}"></i> {{$platform->title}}</button>
                        @endforeach
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Category</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <button class="btn btn-dark btn-sm" disabled><i class="fas fa-user"></i>
                            <span>Single-player</span></button>
                        <button class="btn btn-dark btn-sm" disabled><i class="fas fa-user-friends"></i>
                            <span>Co-Op</span></button>
                        <button class="btn btn-dark btn-sm" disabled><i class="fas fa-users"></i>
                            <span>Multiplayer</span></button>
                    </div>
                </div>
              
              
            </div>
        </div>
        <div class="card mb-3 overflow-auto">
            <div class="card-body">

                <section class="section">
                    <div class="container">
                        <div class="row md-m-25px-b m-45px-b justify-content-center text-center">
                            <div class="col-lg-8">
                                <h3 class="h1 m-15px-b">Latest Users</h3>
                                <p class="m-0px font-2"></p>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($game->gameUser->where('status','!=',null)->sortByDesc('updated_at')->take('3') as $user)
                            <div class="col-sm-6 col-lg-4 m-15px-tb">
                                <div class="media box-shadow-only-hover hover-top p-15px">
                                    <a class="overlay-link" href="#"></a>
                                    <div class="">
                                        <img src="{{ url('uploads/avatars/' . $user->profile->avatar) }}"
                                            class="icon-50  border-radius-50 img-fluid rounded-circle" alt="" />
                                    </div>
                                    <div class="p-20px-l media-body">
                                        <div class="btn btn-primary btn-sm py-0" style="font-size: 0.7em;">
                                            {{$user->status}}</div>

                                        <h6 class="m-5px-tb">{{$user->profile->nama_lengkap}}</h6>

                                    </div>
                                </div>
                            </div>
                            @endforeach


                            <div class="col-12 p-25px-t text-center">
                                <button class="m-btn m-btn-radius m-btn-theme btn btn-primary btn-lg btn-block btn-sm"
                                    href="#" x-on:click="tab = 'bar'; open='true'">Load More</button>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-body">

                <h6> System Requirements </h6>
                <div class="row">
                    <div class="col-sm-6">
                        <p>Mininum</p>
                        <ul class="list-group list-group-flush" style="  background-color: #111D35;">
                            @foreach($game->min_requirement as $spec)
                            <li class="list-group-item">{{array_search($spec,$game->min_requirement)}} : {{$spec}}</li>
                            @endforeach
                        </ul>


                    </div>
                    <div class="col-sm-6">
                        <p> Recommended</p>
                        <ul class="list-group list-group-flush">
                            @foreach($game->rec_requirement as $spec)
                            <li class="list-group-item">{{array_search($spec,$game->rec_requirement)}} : {{$spec}}</li>
                            @endforeach

                        </ul>


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
                            <img alt="Generic placeholder image" src="http://bootdey.com/img/Content/avatar/avatar1.png"
                                class="img-fluid">
                        </div>
                        <div class="col-md-4">
                            <img alt="Generic placeholder image" src="http://bootdey.com/img/Content/avatar/avatar1.png"
                                class="img-fluid">
                        </div>
                        <div class="col-md-4">
                            <img alt="Generic placeholder image" src="http://bootdey.com/img/Content/avatar/avatar1.png"
                                class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row gutters-sm">
            <div class="col-sm-6 mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h6 class="d-flex align-items-center mb-3"><i
                                class="material-icons text-info mr-2">User</i>Statistics (User :
                            {{$dataBar['totalUser']}})</h6>
                        <small>Want to Play</small>
                        <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: {{$dataBar['wtp']}}%"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small>Currently Playing</small>
                        <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: {{$dataBar['cp']}}%"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small>Beaten</small>
                        <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar"
                                style="width: {{$dataBar['beaten']}}%" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small>Completed</small>
                        <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar"
                                style="width: {{$dataBar['completed']}}%" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small>Dropped</small>
                        <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar"
                                style="width: {{$dataBar['dropped']}}%" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h6 class="d-flex align-items-center mb-3"><i
                                class="material-icons text-info mr-2">User</i>Ratings</h6>
                        <small><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> </small>
                        <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar"  style="width: {{$dataRating['five_star']}}%"
                                aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></small>
                        <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: {{$dataRating['four_star']}}%"
                                aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></small>
                        <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar"  style="width: {{$dataRating['three_star']}}%"
                                aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small><i class="fas fa-star"></i><i class="fas fa-star"></i></small>
                        <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar"  style="width: {{$dataRating['two_star']}}%"
                                aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small><i class="fas fa-star"></i></small>
                        <div class="progress mb-3" style="height: 5px">
                            <div class="progress-bar bg-primary" role="progressbar"  style="width: {{$dataRating['one_star']}}%"
                                aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="row">
                        <div class="col-sm-12 col-lg-5" style="background-color :#071224">
                            <div class="card-body" style="height : 100%">
                                <h4 class="card-title">Reviews</h4>
                                <h5 class="card-subtitle">Numbers of Review</h5>
                                <h2 class="font-medium mt-5 mb-4 mb-5">{{$game->review->count()}}</h2>
                                <div class="image-box mt-2 mb-2" style="display:flex">
                                    @foreach($game->review->sortByDesc('created_at')->take('4') as $review)
                                    <a href="#" class="mr-2" title="" data-original-title="Simmons"><img
                                            src="{{ url('uploads/avatars/' . $review->profile->avatar) }}"
                                            class="rounded-circle" width="45" alt="user"></a>
                                    @endforeach


                                </div>
                                <a href="javascript:void(0)"
                                    class="btn btn-lg btn-outline-primary waves-effect waves-light btn-md mt-5"
                                    x-on:click="tab = 'review'">Best Reviews</a>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-7" style="background-color:#071224;">
                            <div class="card-body">
                                <ul class="list-style-none">
                                    <li class="mt-4">
                                        <div class="d-flex align-items-center">
                                            <i class="fa fa-smile-o fa-2x text-muted"></i>
                                            <div class="ml-2">
                                                <h5 class="mb-0">Positive Reviews</h5>
                                                <span
                                                    class="text-muted">{{$game->review->where('rating','like')->count()}}
                                                    Reviews</span>
                                            </div>
                                        </div>

                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar"
                                                style="width: @if($game->review->where('rating','like')->count() != 0){{$game->review->where('rating','like')->count()/$game->review->count() * 100}}% @else 0% @endif"
                                                aria-valuenow="47" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </li>
                                    <li class="mt-5">
                                        <div class="d-flex align-items-center">
                                            <i class="fa fa-frown-o fa-2x text-muted"></i>
                                            <div class="ml-2">
                                                <h5 class="mb-0">Negative Reviews</h5>
                                                <span
                                                    class="text-muted">{{$game->review->where('rating','dislike')->count()}}
                                                    Reviews</span>
                                            </div>
                                        </div>

                                        <div class="progress">
                                            <div class="progress-bar bg-orange" role="progressbar"
                                                style="width: @if($game->review->where('rating','dislike')->count() != 0){{$game->review->where('rating','dislike')->count()/$game->review->count() * 100}}% @else 0% @endif"
                                                aria-valuenow="47" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </li>
                                    <li class="mt-5 mb-5">
                                        <div class="d-flex align-items-center">
                                            <i class="fa fa-meh-o fa-2x text-muted"></i>
                                            <div class="ml-2">
                                                <h5 class="mb-0">Neutral Reviews</h5>
                                                <span
                                                    class="text-muted">{{$game->review->where('rating','neutral')->count()}}
                                                    Reviews</span>
                                            </div>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-info" role="progressbar"
                                                style="width: @if($game->review->where('rating','neutral')->count() != 0){{$game->review->where('rating','neutral')->count()/$game->review->count() * 100}}% @else 0% @endif"
                                                aria-valuenow="47" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </div>
</div>
</div>
</template>

<template x-if="tab === 'bar'">
    <div class="col-md-8" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-90"
        x-transition:enter-end="opacity-100 transform scale-100">
        <div class="card-body">
            <div class="">
                <div class="table-responsive">
                    <table class="table user-list text-light">
                        <thead>
                            <tr>
                                <th><span>User</span></th>
                                <th><span>Updated</span></th>
                                <th class="text-center"><span>Status</span></th>
                                <th><span class="text-light">Progression</span></th>
                                <th><button type="button" class="close" aria-label="Close" x-on:click="tab = 'foo'">
                                        <span aria-hidden="true">&times;</span>
                                    </button></th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($game->gameUser->sortByDesc('updated_at') as $users)
                            <tr>
                                <td>
                                    <div>
                                        <div class="icon-container">
                                            <img class="rounded-circle"
                                                src="{{ url('uploads/avatars/' . $users->profile->avatar) }}" alt="">

                                            @if(Cache::has('user-is-online-'. $users->profile->id))
                                            <div class='status-circle'>
                                            </div>
                                        </div>
                                        <a href="{{ route('profile.show', ['id' => $users->profile->username]) }}"
                                            class="user-link">{{$users->profile->nama_lengkap}}</a>
                                        <span class="user-subhead">Online</span>
                                    </div>
                                    @else
                                    <div class='status-circle-offline'>
                                    </div>
                </div>
                <a href="{{ route('profile.show', ['id' => $users->profile->username]) }}"
                    class="user-link">{{$users->profile->nama_lengkap}}</a>
                <span class="user-subhead">Offline</span>
            </div>
            @endif
            </td>
            <td>{{$users->updated_at->diffForHumans()}}</td>
            <td class="text-center">
                <span class="label label-default">{{$users->status}}</span>
            </td>
            <td>
                <a href="#">marlon@brando.com</a>
            </td>
            <td style="width: 20%;">
                <a href="#" class="table-link text-warning">
                    <span class="fa-stack">
                        <i class="fa fa-square fa-stack-2x"></i>
                        <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                    </span>
                </a>
                <a href="#" class="table-link text-info">
                    <span class="fa-stack">
                        <i class="fa fa-square fa-stack-2x"></i>
                        <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                    </span>
                </a>
                <a href="#" class="table-link danger">
                    <span class="fa-stack">
                        <i class="fa fa-square fa-stack-2x"></i>
                        <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                    </span>
                </a>
            </td>
            </tr>
            @endforeach
            </tbody>
            </table>
        </div>
    </div>
    </div>
    </div>
</template>
<template x-if="tab === 'review'">
    <div class="col-md-8" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-90"
        x-transition:enter-end="opacity-100 transform scale-100">


        <div class="card">
            <div class="row">
                <div class="col-sm-12 col-lg-5" style="background-color :#071224">

                    <div class="card-body" style="height : 100%">
                        <h4 class="card-title">Reviews</h4>
                        <h5 class="card-subtitle">Numbers of Review</h5>
                        <h2 class="font-medium mt-5 mb-4 mb-5">{{$game->review->count()}}</h2>
                        <div class="image-box mt-2 mb-2" style="display:flex">
                            @foreach($game->review->sortByDesc('created_at')->take('4') as $review)
                            <a href="#" class="mr-2" title="" data-original-title="Simmons"><img
                                    src="{{ url('uploads/avatars/' . $review->profile->avatar) }}"
                                    class="rounded-circle" width="45" alt="user"></a>
                            @endforeach


                        </div>
                        <a href="{{ route('all_review', ['game_id' => $game->custom_url]) }}"
                            class="btn btn-lg btn-outline-primary waves-effect waves-light btn-md mt-5">All Reviews</a>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-7" style="background-color:#071224;">
                    <button type="button" class="close mr-2" aria-label="Close" x-on:click="tab = 'foo'">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="card-body">
                        <ul class="list-style-none">
                            <li class="mt-4">
                                <div class="d-flex align-items-center">
                                    <i class="fa fa-smile-o fa-2x text-muted"></i>
                                    <div class="ml-2">
                                        <h5 class="mb-0">Positive Reviews</h5>
                                        <span class="text-muted">{{$game->review->where('rating','like')->count()}}
                                            Reviews</span>
                                    </div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-primary" role="progressbar"
                                        style="width: @if($game->review->where('rating','like')->count() != 0){{$game->review->where('rating','like')->count()/$game->review->count() * 100}}% @else 0% @endif"
                                        aria-valuenow="47" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </li>
                            <li class="mt-5">
                                <div class="d-flex align-items-center">
                                    <i class="fa fa-frown-o fa-2x text-muted"></i>
                                    <div class="ml-2">
                                        <h5 class="mb-0">Negative Reviews</h5>
                                        <span class="text-muted">{{$game->review->where('rating','dislike')->count()}}
                                            Reviews</span>
                                    </div>
                                </div>

                                <div class="progress">
                                    <div class="progress-bar bg-orange" role="progressbar"
                                        style="width: @if($game->review->where('rating','dislike')->count() != 0){{$game->review->where('rating','dislike')->count()/$game->review->count() * 100}}% @else 0% @endif"
                                        aria-valuenow="47" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </li>
                            <li class="mt-5 mb-5">
                                <div class="d-flex align-items-center">
                                    <i class="fa fa-meh-o fa-2x text-muted"></i>
                                    <div class="ml-2">
                                        <h5 class="mb-0">Neutral Reviews</h5>
                                        <span class="text-muted">{{$game->review->where('rating','neutral')->count()}}
                                            Reviews</span>
                                    </div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar"
                                        style="width: @if($game->review->where('rating','neutral')->count() != 0){{$game->review->where('rating','neutral')->count()/$game->review->count() * 100}}% @else 0% @endif"
                                        aria-valuenow="47" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="mt-3">
            <div class="card card-body rounded shadow-sm p-4 mb-4 restaurant-detailed-ratings-and-reviews">

                <h5 class="mb-1">Most Useful Reviews</h5>

                @foreach($game->review->sortByDesc('thumbsup')->take('4') as $review)
                <?php 
                    $user_review = UserHelp::getProfile($review->profile_id);?>
                <div class="reviews-members pt-2 pb-4">
                    <div class="media">
                        <a href="#"><img alt="Generic placeholder image"
                                src="{{ url('uploads/avatars/' . $user_review->avatar) }}" width="100"
                                class="mr-3 rounded-pill"></a>
                        <div class="media-body">
                            <div class="reviews-members-header">
                                <span class="star-rating float-right">
                                    <a href="#"><i class="icofont-ui-rating active"></i></a>
                                    <a href="#"><i class="icofont-ui-rating active"></i></a>
                                    <a href="#"><i class="icofont-ui-rating active"></i></a>
                                    <a href="#"><i class="icofont-ui-rating active"></i></a>
                                    <a href="#"><i class="icofont-ui-rating"></i></a>
                                </span>
                                <h6 class="mb-1"><a class="text-light"
                                        href="{{ route('profile.show', ['id' => $user_review->username]) }}">{{$user_review->nama_lengkap}}</a>
                                    @if($review->rating == "like")
                                    <span><button type="button" class="btn btn-outline-success btn-sm" disabled><i
                                                class="far fa-smile-o " aria-hidden="true"></i> Recommending this
                                            Game</button></span></h6>
                                @elseif($review->rating == "neutral")
                                <span><button type="button" class="btn btn-outline-warning btn-sm" disabled><i
                                            class="far fa-meh-o " aria-hidden="true"></i> Feels Neutral about this
                                        Game</button></span></h6>
                                @elseif($review->rating =="dislike")
                                <span><button type="button" class="btn btn-outline-danger btn-sm" disabled><i
                                            class="far fa-frown-o " aria-hidden="true"></i> Not Recommending this
                                        Game</button></span></h6>
                                @endif
                                <p class="text-gray">{{$review->created_at->diffForHumans()}}</p>
                            </div>
                            <div class="reviews-members-body">
                                <p>{{$review->review_content}}</p>
                            </div>
                            
                            @if($review->thumbsup)
                            {{count($review->thumbsup)}} Users found this review useful
                            @endif
                        </div>
                    </div>
                </div>
                <hr>
                @endforeach
            </div>
        </div>
    </div>
</template>
<template x-if="tab === 'rate'">

    <div class="col-md-8 card-body rounded shadow-sm p-4 mb-4 clearfix graph-star-rating" style="height:30%"
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90"
        x-transition:enter-end="opacity-100 transform scale-100">
        <button type="button" class="close" aria-label="Close" x-on:click="tab = 'foo'">
            <span aria-hidden="true">&times;</span>
        </button>
        <div class="row">
            <div class="col-md-3">
                <div class="rating-block btn btn-outline-primary">
                    <h4>Average Rating</h4>
                <h2 class="bold padding-bottom-7">{{$star_rating}}<small>/ 5</small></h2>
                <h6 class="">{{$dataRating['total_user']}} Users</h6>
                </div>
            </div>
            <div class="col-md-9">
                <div class="">
                    <div class="graph-star-rating-body">
                        <div class="rating-list">
                            <div class="rating-list-left">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                            <div class="rating-list-center">
                                <div class="progress">
                                    <div style="width: {{$dataRating['five_star']}}%" aria-valuemax="5" aria-valuemin="0" aria-valuenow="5"
                                        role="progressbar" class="progress-bar bg-primary">
                                        <span class="sr-only">80% Complete (danger)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="rating-list-right">{{$dataRating['five_star']}}%</div>
                        </div>
                        <div class="rating-list">
                            <div class="rating-list-left">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                            <div class="rating-list-center">
                                <div class="progress">
                                    <div style="width: {{$dataRating['four_star']}}%" aria-valuemax="5" aria-valuemin="0" aria-valuenow="5"
                                        role="progressbar" class="progress-bar bg-primary">
                                        <span class="sr-only">80% Complete (danger)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="rating-list-right text-light">23%</div>
                        </div>
                        <div class="rating-list">
                            <div class="rating-list-left text-light">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                            <div class="rating-list-center">
                                <div class="progress">
                                    <div style="width: {{$dataRating['three_star']}}%" aria-valuemax="5" aria-valuemin="0" aria-valuenow="5"
                                        role="progressbar" class="progress-bar bg-primary">
                                        <span class="sr-only">80% Complete (danger)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="rating-list-right text-light">11%</div>
                        </div>
                        <div class="rating-list">
                            <div class="rating-list-left text-light">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                            <div class="rating-list-center">
                                <div class="progress">
                                    <div style="width: {{$dataRating['two_star']}}%" aria-valuemax="5" aria-valuemin="0" aria-valuenow="5"
                                        role="progressbar" class="progress-bar bg-primary">
                                        <span class="sr-only">80% Complete (danger)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="rating-list-right text-light">02%</div>
                        </div>
                        <div class="rating-list">
                            <div class="rating-list-left text-light">
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="rating-list-center">
                                <div class="progress">
                                    <div style="width: {{$dataRating['one_star']}}%" aria-valuemax="5" aria-valuemin="0" aria-valuenow="5"
                                        role="progressbar" class="progress-bar bg-primary">
                                        <span class="sr-only">80% Complete (danger)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="rating-list-right text-light">02%</div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-4">
                            <h6 class="mb-0">Rate This Game</h6>
                        </div>
                        <div class="col-md-7 offset-md-1 text-secondary">
                            <form enctype="multipart/form-data"
                                action="{{ route('store_rating', ['game_id' =>$game->id ]) }}" method="GET">
                                @csrf
                                <fieldset class='rating'>
                                    <input type='radio' id="star5" wire:model="rating" name="rating" value='5'
                                        required /><label for='star5' title='Rocks!'>5 stars</label>
                                    <input type='radio' id="star4" wire:model="rating" name="rating" value='4' /><label
                                        for='star4' title='Pretty good'>4 stars</label>
                                    <input type='radio' id="star3" wire:model="rating" name="rating" value='3' /><label
                                        for='star3' title='Meh'>3 stars</label>
                                    <input type='radio' id="star2" wire:model="rating" name="rating" value='2' /><label
                                        for='star2' title='Kinda bad'>2 stars</label>
                                    <input type='radio' id="star1" wire:model="rating" name="rating" value='1' /><label
                                        for='star1' title='Sucks big time'>1 star</label>
                                </fieldset>
                                <button type="submit" class="btn btn-outline-primary btn-sm float-right">Submit</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
</template>

</div>

</div>
