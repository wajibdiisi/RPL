<div class="" x-data = "{ tab : 'foo', open : false}">
    <template x-if = "tab === 'review'">
        <div class="mt-3" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-90"
        x-transition:enter-end="opacity-100 transform scale-100">
            <div class="bg-white rounded shadow-sm p-4 mb-4 restaurant-detailed-ratings-and-reviews">
                <button type="button" class="close" aria-label="Close" x-on:click="tab = 'foo'">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="mb-1">Reviews ({{count($reviews)}})</h5>
    
                @foreach($reviews as $review)
                <?php 
                    $user_review = UserHelp::getProfile($review->profile_id);
                    
                    $game_review = UserHelp::getGame($review->game_id)?>
                <div class="reviews-members pt-2 pb-4">
                    <div class="media">
                        <a href="#"><img alt="Generic placeholder image"
                                src="{{ url('uploads/gamePicture/' . $game_review->gamePicture) }}" width="100"
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
                                <h6 class="mb-1"><a class="text-black"
                                        href="{{ route('game.show', ['id' => $game_review->id]) }}">{{$game_review->gameName}}</a>
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
                                <div class="col-md-1">
                                    <a class="total-like btn btn-outline-primary"
                                        href="{{ route('like.review',['id' =>$review->id,'user_id' =>$currentUser_id]) }}"><i
                                            class="icofont-thumbs-up"></i> <i class="fas fa-thumbs-up"></i></a>
                                </div>
                                <div class="col-md-1">
                                    <a class="total-like btn btn-outline-primary" href="#"><i
                                            class="icofont-thumbs-down"></i>
                                        <i class="fas fa-thumbs-down"></i></a>
                                    </div>
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
    </template>
   <template x-if ="tab === 'foo'">
    <div x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform scale-90"
    x-transition:enter-end="opacity-100 transform scale-100">
    <div class="jumbotron text-center jumbtronSize" style="background: #131f39">
        <div class="containDetails">
            <ul class="details">
                <li><a class="text-decoration-none"
                        href="{{ route('profile.detail', ['id' => $userView->username]) }}">{{$userView->gameCollection->count()}}
                        <span>Games on Collection</span></a></li>
                <li>{{$userView->showFavourite->count()}}<span>Wishlist</span></li>
                <li><button class="text-decoration-none" x-on:click ="tab = 'review'">{{count($reviews)}} <span>Review</span></button></li>
            </ul>
        </div>
        <div class="container py-5">
            <div class="row mb-4">
            </div>
            <div class="row text-center">
                
                @foreach ($userView->showFavourite as $games)

                <div class="col-xl-3 col-sm-6 mr-3">
                    
                        <a class="tooltip-test" title="{{$games->gameName}}"
                            href="{{ route('game.show',$games->custom_url) }}">
                            <img src="{{ url('uploads/gamePicture/' . $games->gamePicture) }}" alt=""
                                class="img-fluid rounded-square img-thumbnail shadow-sm" /></a></div>
              
                @endforeach
            </div>
        </div>
    </div>
    <div x-show="open === false">
        <button class="btn btn-outline-primary" x-on:click ="open = true">Create new post</button>
    </div>
    
                    <div class="card card-white grid-margin card-body" x-show.transition ="open">
                        <form wire:submit.prevent="store">
                            <div class="post">
                                <input type="hidden" wire:model="postedProfile_id" value="{{$postedProfile_id}}">
            <input type="hidden" wire:model="posted_by" value="{{$posted_by}}">
                            <textarea class="form-control" wire:model ="content" placeholder="Post" rows="4" name="content"></textarea>
                            <div class="post-options">
                                <a href="#"><i class="fa fa-camera"></i></a>
                                <a href="#"><i class="fas fa-video"></i></a>
                                <a href="#"><i class="fa fa-music"></i></a>
                                <button class="btn btn-outline-primary float-right" x-on:click ="open = false">Post</button>
                            </form>
                            </div>
                        </div>
                    </div>
                    <div class="profile-timeline">
                        <ul class="list-unstyled">
                            @livewire('post-list',['profile_id' => $userView->id,'currentUser_id' => $currentUser_id])
    
                        </ul>
                    
                </div>
            </div>
                </template>        
                </div>