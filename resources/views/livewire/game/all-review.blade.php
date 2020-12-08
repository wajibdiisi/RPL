<div>  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <div class="container">
        <div class="col-md-12">
            <div class="offer-dedicated-body-left">
                <nav aria-label="breadcrumb" class="main-breadcrumb">
                    <ol class="breadcrumb"  style="background-color : #111D35">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('gamelist.all') }}">Game</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $game->gameName}}</li>
                    </ol>
                </nav>
                    <div class="tab-pane fade active show" id="pills-reviews" role="tabpanel"
                        aria-labelledby="pills-reviews-tab">
                    
                        <div class="card mb-4" style="background-color : #111D35">
                            <div class="row">
                                <div class="col-sm-12 col-lg-5">
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
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-7" >
                                    <button type="button" class="close mr-2" aria-label="Close" wire:click ="back('{{$game->custom_url}}')">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <div class="card-body">
                                        <ul class="list-style-none">
                                            <li class="mt-4">
                                                <div class="d-flex align-items-center">
                                                    <i class="fa fa-smile-o fa-2x text-muted"></i>
                                                    <div class="ml-2">
                                                        <h5 class="mb-0">Positive Reviews</h5>
                                                        <span class="text-muted">{{$game->review->where('rating','like')->count()}} Reviews</span>
                                                    </div>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: @if($game->review->where('rating','like')->count() != 0){{$game->review->where('rating','like')->count()/$game->review->count() * 100}}% @else 0% @endif"
                                                        aria-valuenow="47" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </li>
                                            <li class="mt-5">
                                                <div class="d-flex align-items-center">
                                                    <i class="fa fa-frown-o fa-2x text-muted"></i>
                                                    <div class="ml-2">
                                                        <h5 class="mb-0">Negative Reviews</h5>
                                                        <span class="text-muted">{{$game->review->where('rating','dislike')->count()}} Reviews</span>
                                                    </div>
                                                </div>
                                               
                                                <div class="progress">
                                                    <div class="progress-bar bg-orange" role="progressbar" style="width: @if($game->review->where('rating','dislike')->count() != 0){{$game->review->where('rating','dislike')->count()/$game->review->count() * 100}}% @else 0% @endif"
                                                        aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </li>
                                            <li class="mt-5 mb-5">
                                                <div class="d-flex align-items-center">
                                                    <i class="fa fa-meh-o fa-2x text-muted"></i>
                                                    <div class="ml-2">
                                                        <h5 class="mb-0">Neutral Reviews</h5>
                                                        <span class="text-muted">{{$game->review->where('rating','neutral')->count()}} Reviews</span>
                                                    </div>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-info" role="progressbar" style="width: @if($game->review->where('rating','neutral')->count() != 0){{$game->review->where('rating','neutral')->count()/$game->review->count() * 100}}% @else 0% @endif"
                                                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                       
                        <div class="mt-3" >
                            <div class="card card-body rounded shadow-sm p-4 mb-4 restaurant-detailed-ratings-and-reviews" style="background-color : #111D35">
                                
                                <h5 class="mb-3">Reviews ({{count($game->review)}})
                                    <div class="dropdown float-right">
                                        <button class="btn btn-outline-primary dropdown-toggle" type="button"  wire:model="key_sort" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        @if($key_sort)
                                        {{$key_sort}}
                                        @else
                                        Sort
                                        @endif
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                          <button class="dropdown-item" wire:click="sortbyDate_desc">Newest First</button>
                                          <button class="dropdown-item" wire:click="sortbyDate_asc">Oldest First</button>
                                          <button class="dropdown-item" wire:click="sortbyLike_desc">Most Liked</button>
                                          <button class="dropdown-item" wire:click="sortbyLike_asc">Least Liked</button>
                                        </div>
                                      </div></h5>
                                @foreach($reviews as $review)
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
                                            <div class="reviews-members-footer row">
                                                <div class="mr-1 ml-3">
                                                    <a class="total-like btn btn-outline-primary"
                                                wire:click ="addLike('{{$review->id}}','{{$currentUser}}')"><i
                                                            class="icofont-thumbs-up"></i> <i class="fas fa-thumbs-up"></i></a>
                                                </div>
                                                <div class="">
                                                    <a class="total-like btn btn-outline-primary" wire:click ="removeLike('{{$review->id}}','{{$currentUser}}')"><i
                                                            class="icofont-thumbs-down"></i>
                                                        <i class="fas fa-thumbs-down"></i></a>
                                                    </div>
                                                </div>
                                                @if($review->thumbsup  != null )
                                                    {{count($review->thumbsup)}} Users found this review is useful,
                                                @endif
                                                @if($review->thumbsdown != null)
                                                    {{count($review->thumbsdown)}} Users found this review is not useful
                                                @endif
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                @endforeach
                                {{$reviews->links()}}
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
