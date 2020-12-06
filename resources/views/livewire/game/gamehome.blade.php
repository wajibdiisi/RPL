<div>
    <style></style>
<div class="page-banner-area" style="background-image: url(
    @if ($genre_jumbotron){{$genre_jumbotron->genre_background}} 
    @else https://www.itl.cat/pngfile/big/7-73802_4k-gaming-wallpapers-1080p-bozhuwallpaper-2017-games.jpg @endif);
    background-size : cover">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-content text-center">
                    @if($genre_jumbotron)
                <h1>
                    {{$genre_jumbotron->full_title}}
                </h1>    
            <p class="mt-5 text-light h4">{{$genre_jumbotron->description}}</p>  
                    @else
                    <h1>
                        Games
                    </h1>
                    <p class="mt-5 text-light h4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                        Ut enim ad minim veniam, quisLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                        Ut enim ad minim veniam, quisLorem ipsum dolor sit amet, consectetur 
                        adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis</p>  
                    @endif
              
              
                    <ul class="page-breadcrumb">
                        
                        <li class="breadcumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ route('gamelist.all') }}"> Games </a></li>
                        @if($genre_jumbotron)
                        <li>{{$genre_jumbotron->title}} </li>
                        @endif 
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="games-area section pt-85 pt-lg-65 pt-md-55 pt-sm-55 pt-xs-45 mt-5">
    <div class="container card card-white grid-margin">
        <div class="row">
            <div class="col-12">
              
                <!--Game Toolbar Start-->
                <div class="game-topbar-wrapper d-md-flex justify-content-md-between align-items-center">
                 <div class="searchbar">
                        <input type="text" class="search_input" name="game_search" wire:model="game_search" placeholder="Enter games name">
                        <a class="search_icon"><i class="fas fa-search"></i></a>
                    </div>

                    <!--Toolbar Short Area Start-->
                    <div class="toolbar-short-area d-md-flex align-items-center">
                        <div class="toolbar-shorter">
                            <div class="dropdown">
                                @if($platforms_id)
                                <button class="{{$platforms_id->button_class}} dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="{{$platforms_id->i_class}}"></i>
                                    {{$platforms_id->title}}
                                </button>
                                @else
                                <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   Platform
                                </button>
                                @endif
                            
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <button class="dropdown-item" wire:click="search_platform('all')">Show All</button>
                                @foreach ($platforms as $platform)
                                <button class="dropdown-item" wire:click="search_platform('{{$platform->id}}')">{{$platform->title}}</button>
                                @endforeach
                                
                                </div>
                              </div>
                        </div>
                        <div class="toolbar-shorter">
                            <div class="dropdown">
                                @if($sort)
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{$sort}}
                                @else
                                <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           
                                    Sort
                                @endif
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    
                                    <button class="dropdown-item" wire:click="sortbyName_asc">Name, A to Z</button>
                                    <button class="dropdown-item" wire:click="sortbyName_desc">Name, Z to A</button>
                                    <button class="dropdown-item" wire:click="sortbyReview_desc">Most Reviews</button>
                                    <button class="dropdown-item" wire:click="sortbyReview_asc">Least Reviews</button>
                                    <button class="dropdown-item" wire:click="sortbyView_desc">Most Views</button>
                                    <button class="dropdown-item" wire:click="sortbyView_asc">Least Views</button>
                                </div>
                              </div>
                        </div>
                        <div class="toolbar-shorter">
                            <div class="dropdown">
                               @if($key_genre)
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{$key_genre}}
                                @else
                                <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Genre
                                @endif
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <button class="dropdown-item" wire:click="reset_genre">Show All</button>
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
                                <button class="btn btn-outline-primary btn-sm text-primary" style="position:absolute; top : 0; left : 14px; font-weight : bold"> <i class="fas fa-eye mr-1"></i>@if($game->view_counter>0){{$game->view_counter}} @else 0 @endif</button>
                    </div>
                    <div class="game-content">
                        <h4><a href="{{ route('game.show',$game->custom_url) }}">{{$game->gameName}}</a></h4>
                        <p>
                        @foreach($game->platform as $platform)
                        <button class="{{$platform->button_class}} btn-sm" disabled><i class="{{$platform->i_class}}"></i> {{$platform->title}}</button>
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