<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Portfolio Website</title>
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
    }</style>
</head>
<body>
    <div class="scroll-up-btn">
        <i class="fas fa-angle-up"></i>
    </div>
    <nav class="navbar">
        <div class="max-width">
            <div class="logo"><img src="https://media1.giphy.com/media/40zweBDO3S8h41thbb/giphy.gif" alt="" style="width:95px;height:95px"></div>
                <form enctype="multipart/form-data" action="{{ route('search') }}" method="GET">
                    <div class="searchbar mr-auto">
                        <input type="text" class="search_input" name="search" placeholder="Enter games name">
                        <a class="search_icon"><i class="fas fa-search"></i></a>
                    </div>
         </form>
            <ul class="menu">
                <li><a href="#home" class="menu-btn">Home</a></li>
                <li><a href="#teams" class="menu-btn">Games</a></li>
                <li><a href="" class="menu-btn">Forum</a></li>
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
            <h2 class="title">Tranding games</h2>
            <div class="carousel owl-carousel">
                <div class="card">
                    <div class="box">
                        <img src="https://cdn.mobilesyrup.com/wp-content/uploads/2020/11/marvels-spiderman-miles-morales-header-scaled.jpg" alt="">
                        <div class="text">Spidermen Miles Morales</div>
                        <p>#1</p>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <img src="https://www.theindianwire.com/wp-content/uploads/2020/08/league-of-legends.jpg" alt="">
                        <div class="text">League Of Legend</div>
                        <p>#2</p>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <img src="https://uploadstatic-sea.mihoyo.com/contentweb/20190801/2019080115201040824.jpg" alt="">
                        <div class="text">GenShin Impact</div>
                        <p>#3</p>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <img src="https://coverfiles.alphacoders.com/107/107297.jpg" alt="">
                        <div class="text">CyberPunk</div>
                        <p>#4</p>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <img src="https://i.pinimg.com/originals/38/28/b1/3828b1fd61610e2a492da97ac9e0e02b.jpg" alt="">
                        <div class="text">Assassin's Creed Valhalla</div>
                        <p>#5</p>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <img src="https://i.ytimg.com/vi/mUwI6e-em3o/maxresdefault.jpg" alt="">
                        <div class="text">SackBoy</div>
                        <p>#6</p>
                    </div>
                </div>
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