<div class="games-area section pt-85 pt-lg-65 pt-md-55 pt-sm-55 pt-xs-45">
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
            <div class="blog-pagination text-center">
                <ul class="page-pagination">
                    <li><a href="#"><i class="icofont-long-arrow-left"></i></a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">6</a></li>
                    <li><a href="#"><i class="icofont-long-arrow-right"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
<!--Games Area End-->

</div>