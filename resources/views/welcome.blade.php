<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Mygamelist</title>
    <link rel="shortcut icon" href="{{ asset('logo.ico') }}">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="{{ asset('js/home.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
<style>.searchbar{
    margin-bottom: auto;
    margin-top: auto;
    height: 60px;
    background-color: #353b48;
    border-radius: 30px;
    padding: 10px;
    }

    .search_input{
    color: white;
    border: 0;
    outline: 0;
    background: none;
    width: 200px;
    caret-color:transparent;
    line-height: 40px;
    transition: width 0.4s linear;
    }

    .searchbar:hover > .search_input{
    padding: 0 10px;
    
    caret-color:red;
    transition: width 0.4s linear;
    }

    .searchbar:hover > .search_icon{
    background: white;
    color: #e74c3c;
    }

    .search_icon{
    height: 40px;
    width: 40px;
    float: right;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    color:white;
    text-decoration:none;
    }
    a { color: white; } 
    .services,
        .teams {
            color: #fff;
            background: #071224;
        }

        footer {
            background: #071224;
            color: #fff;
        }

        .navbar.sticky {
            background: #071224;
        }

        .services .serv-content .card {
            background: #131f39;
        }

        .services .serv-content .card i {
            color: blue;
        }

        .scroll-up-btn {
            border: 2px solid blue;
        }

        .home .home-content a {
            border: 2px solid blue;
        }

        .teams .carousel .card img {
            border: 2px solid blue;
        }

        .teams .carousel .card:hover {
            background: #131f39;
        }

        .teams .carousel .card:hover img {
            border-color: blue;
        }

        .services .serv-content .card:hover {
            background: #131f39;
        }

        .owl-dot {
            border: 2px solid blue !important;
        }

        footer span a {
            color: blue;
        }
    </style>
</head>
<body>
    <div class="scroll-up-btn">
        <i class="fas fa-angle-up"></i>
    </div>
    <nav class="navbar">
        <div class="max-width">
            <img src="https://i.giphy.com/media/rq6379B2woH5btSzJn/giphy.webp" alt="" style="width: 170px;">
                
            <ul class="menu">
                <li><a href="#home" class="menu-btn">Home</a></li>
                <li><a href="{{ route('gamelist.all') }}" class="menu-btn">Games</a></li>   
                <li><a href="#services" class="menu-btn">Bantuan</a></li>
                <li><a href="" class="menu-btn">About</a></li>
                
                     @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                    @else
                    <li class="nav-item dropdown">
                        <a class="navbar-brand" href="{{ route('profile.show',UserHelp::get_username(Auth::user()->id)) }}" class="text-sm text-gray-700 underline">Profile</a>
                    </li>
                    @endguest             
            </ul>
            <div class="menu-btn">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </nav>  

    <!-- home section start -->
    <section class="home" id="home">
        <div class="max-width">
            <div class="home-content">
                <div class="text-1">Not sure what</div>
                <div class="text-2"> to play next?</div>
                <div class="text-3">Don't worry, we've got you covered.</div>
                <div class="text-4">Discover new games, keep track of the ones </div>
                <div class="text-5">you want to play, and connect with friends. </div>
                <a href="{{ route('register') }}">Register</a>
            </div>
        </div>
    </section>

    <!-- services section start -->
    <section class="services" id="services">
        <div class="max-width">
            <h2 class="title">Join Us</h2>
            <div class="serv-content">
                <div class="card">
                    <div class="box">
                        <i class="fas fa-plus-circle"></i>
                        <div class="text">Game Colection</div>
                        <p>Add games you want to play and keep track of which games you've beaten.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <i class="fas fa-list"></i>
                        <div class="text">Custom Lists</div>
                        <p>Want to keep track of your top 10 games or your favorite games for two? Create a list!.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <i class="fas fa-user"></i>
                        <div class="text">Add Friends </div>
                        <p>Find and follow your friends to see what games they're playing.</p>
                    </div>
                </div>
               </div>
            </div>
        </div>
    </section>

    <!-- teams section start -->
    <section class="teams" id="teams">
        <div class="max-width">
            <h2 class="title">Trending games</h2>
            <div class="carousel owl-carousel">
                <?php $i = 0 ?>
                @foreach($games as $game)
                <?php $i++ ?>
                <div class="card">
                    <a href="{{ route('game.show',$game->custom_url) }}">
                    <div class="box">
                        <img src="{{ url('uploads/gamePicture/' . $game->gamePicture) }}">
                    <div class="text">{{$game->gameName}}</div>
                    <p>#{{$i}}    <i
                        class="fas fa-eye mr-1"></i> {{$game->view_counter}}</p>
                    </div>
                </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- footer section start -->
    <footer>
        <span>Created By <a href="">MyGamelist</a> | <span class="far fa-copyright"></span> 2020 All rights reserved.</span>
    </footer>

    <script src="script.js"></script>
</body>
</html>