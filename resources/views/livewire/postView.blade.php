<div class="" x-data = "{ tab : 'foo', open : false}">
    <template x-if = "tab === 'review'">
        <div class="mt-3" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-90"
        x-transition:enter-end="opacity-100 transform scale-100">
            <div class="text-white rounded shadow-sm p-4 mb-4 restaurant-detailed-ratings-and-reviews" style="background-color: #111D35">
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
                                <h6 class="mb-1"><a class="text-decoration-none text-link"
                                        href="{{ route('game.show', ['id' => $game_review->custom_url]) }}">{{$game_review->gameName}}</a>
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
    </template>
   <template x-if ="tab === 'foo'">
    <div x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform scale-90"
    x-transition:enter-end="opacity-100 transform scale-100">
    <div class="jumbotron text-center jumbtronSize" style="background: #131f39">
        <div class="containDetails">
            <ul class="details">
                <li><a class="text-decoration-none"
                        href="{{ route('profile.detail', ['id' => $userView->username]) }}">{{$userView->gameCollection->where('status','!=',null)->count()}}
                        <span>Games on Collection</span></a></li>
                <li><a class="text-decoration-none"
                    href="{{ route('show_collection', ['id' => $userView->username,'any' => 'all']) }}">{{$userView->collection->count()}}<span>Custom Collection</span></a></li>
                <li><a class="text-decoration-none" href="#" x-on:click ="tab = 'review'">{{count($reviews)}} <span>Review</span></a></li>
            </ul>
        </div>
        <div class="container py-5">
            <div class="row mb-4">
            </div>
            <div class="row text-center">
                
                @foreach ($userView->showFavourite as $games)

                <div class="col-xl-3 col-sm-6">
                    
                        <a class="tooltip-test" title="{{$games->gameName}}"
                            href="{{ route('game.show',$games->custom_url) }}">
                            <img src="{{ url('uploads/gamePicture/' . $games->gamePicture) }}" alt=""
                                class="img-fluid rounded-square shadow-sm" /></a></div>
              
                @endforeach
            </div>
        </div>
    </div>
    <div x-show="open === false">
        <div class="card card-white grid-margin">
        <button class="btn btn-outline-primary" x-on:click ="open = true">Create new post</button>
    </div>
</div>
    <div class="card card-white grid-margin card-body" x-show ="open"  x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-90"
        x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-90">
       
        <form wire:submit.prevent="store">
            
                            <div class="post">
                                <input type="hidden" wire:model="postedProfile_id" value="{{$postedProfile_id}}">
            <input type="hidden" wire:model="posted_by" value="{{$posted_by}}">
                            <textarea class="form-control text-light" style="background-color: #111D35;border-color :  #111D35" wire:model ="content" placeholder="Post" rows="4" name="content"></textarea>
                            <div class="post-options">
                               <div class="col-md-8 col-sm-12">
                                <select wire:model ="game_post" class="custom-select position-absolute float-left text-light" style="background-color: #111D35;border-color :  #111D35;left : 0;bottom : 20">
                                    <?php $data  = UserHelp::getallGames(); ?>
                                    <option selected>Select game to be mentioned (optional)</option>
                                    @foreach($data as $game)
                                    
                                <option value="{{$game->_id}}">{{$game->gameName}}</option>
                                    @endforeach
                                    </select>   
                            </div>
                                <button class="btn btn-outline-primary float-right" x-on:click ="open = false"><i class="fas fa-clipboard mr-1"></i>Post</button>
                                <a class="text-danger btn btn-outline-danger float-right mr-2" x-on:click ="open = false"><i class="far fa-times-circle mr-1"></i>Close</a>
                            </form>
                            </div>
                        </div>
                    </div>
                    <div class="profile-timeline" >
                        <ul class="">
                            @livewire('post-list',['profile_id' => $userView->id,'currentUser_id' => $currentUser_id])
                            
                        </ul>
                    
                </div>
            </div>
                </template>   
                @if (session()->has('message'))

                <script>
                
                    toastr.success('  {{ session('message') }}');
                
                </script>
                
                @endif
                </div>