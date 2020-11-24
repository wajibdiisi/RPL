<div>
<div class="page-banner-area" style="background-image: url(
    @if ($genre_jumbotron){{$genre_jumbotron->genre_background}} 
    @else https://www.itl.cat/pngfile/big/7-73802_4k-gaming-wallpapers-1080p-bozhuwallpaper-2017-games.jpg @endif);
    background-size : cover">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-content text-center">
                <h1>
                    @if($genre_jumbotron)
                    {{$genre_jumbotron->full_title}}
                    @else
                        all
                    @endif
                </h1>
                    <ul class="page-breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li>Games</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="games-area section pt-85 pt-lg-65 pt-md-55 pt-sm-55 pt-xs-45 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!--Game Toolbar Start-->
                <div class="game-topbar-wrapper d-md-flex justify-content-md-between align-items-center">

                    <div class="game-search-box">
                        <h3>search games</h3>

                        <input type="text" name="game_search" wire:model="game_search" placeholder="Enter games name">

                    </div>

                    <!--Toolbar Short Area Start-->
                    <div class="toolbar-short-area d-md-flex align-items-center">
                        <div class="toolbar-shorter">
                            <h3>platform</h3>
                            <select class="wide">
                                <option data-display="Select">All Platform</option>
                                <option value="Relevance">Relevance</option>
                                <option value="Name, A to Z">Name, A to Z</option>
                                <option value="Name, Z to A">Name, Z to A</option>
                                <option value="Price, low to high">Price, low to high</option>
                                <option value="Price, high to low">Price, high to low</option>
                            </select>
                        </div>
                        <div class="toolbar-shorter">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if($sort)
                                {{$sort}}
                                @else
                                    Sort
                                @endif
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    
                                    <button class="dropdown-item" wire:click="sortbyName_asc">Name, A to Z</button>
                                    <button class="dropdown-item" wire:click="sortbyName_desc">Name, Z to A</button>
                                    <button class="dropdown-item" wire:click="sortbyReview_desc">Most Reviews</button>
                                    <button class="dropdown-item" wire:click="sortbyReview_asc">Least Reviews</button>
                                </div>
                              </div>
                        </div>
                        <div class="toolbar-shorter">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if($key_genre)
                                {{$key_genre}}
                                @else
                                    Genre
                                @endif
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                @foreach ($genre as $genres)
                                <button class="dropdown-item"wire:click="search_genre('{{$genres->id}}')">{{$genres->title}}</button>
                                @endforeach
                                
                                </div>
                              </div>
                        </div>
                    </div>
                    <!--Toolbar Short Area End-->
                </div>
                <!--Game Toolbar End-->
            </div>
        </div>
        <div class="row">
            

            <!--Single Game Start-->
            @foreach($games as $game)
            <div class="col-lg-4 col-md-6">
                <div class="single-game mb-50">
                    <div class="game-img">
                        <a href="{{ route('game.show',$game->custom_url) }}"><img
                                src="{{ url('uploads/gamePicture/' . $game->gamePicture) }}" alt=""
                                style="height:370px"></a>
                    </div>
                    <div class="game-content">
                        <h4><a href="games-details.html">{{$game->gameName}}</a></h4>
                        <p>
                        @foreach($game->platform as $platform)
                        <button class="{{$platform->button_class}}" disabled><i class="{{$platform->i_class}}"></i> {{$platform->title}}</button>
                        @endforeach
                    </p>
                    </div>
                </div>
            </div>

            @endforeach


            <!--Single Game End-->

        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="blog-pagination text-center mt-3">
                <ul class="pagination justify-content-center">
                   
                    {{$games->links()}}
                  
                  </ul>
            </div>
        </div>
    </div>
</div>
</div>
<!--Games Area End-->

</div>
</div>