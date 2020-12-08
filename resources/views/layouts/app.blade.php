<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('logo.ico') }}">
    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" crossorigin="anonymous" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.6/css/star-rating.min.css" media="all" rel="stylesheet" type="text/css" />
    @livewireStyles

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.6/js/star-rating.min.js" type="text/javascript"></script>
    <!-- Styles -->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/phosphor-icons"></script>
   
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-confirmation2/dist/bootstrap-confirmation.min.js"></script>
 

</head>
<style>
    a:hover {
        text-decoration: none
    }

    .status-circle {
        width: 15px;
        height: 15px;
        border-radius: 50%;
        background-color: green;
        border: 2px solid white;
        bottom: 0;
        right: 0;
        position: absolute;
    }

    .status-circle-offline {
        width: 15px;
        height: 15px;
        border-radius: 50%;
        background-color: grey;
        border: 2px solid white;
        bottom: 0;
        right: 0;
        position: absolute;
    }

    .tittle {
        width: 85px;
        height: 45px;
        text-align: center;
        transition: .4s linear;
    }

    .editGame,
    .gamelist,
    .activity,
    .profil {
        text-align: center;
        margin-right: 20px;
        width: 95px;
        height: 45px;
        transition: .4s linear;
    }

    .editGame::before,
    .gamelist::before,
    .activity::before,
    .profil::before {
        content: '';
        position: relative;
        box-sizing: border-box;
        width: 90%;
        height: 90%;
        transition: .4s linear;
    }

    .editGame:hover,
    .gamelist:hover,
    .activity:hover,
    .profil:hover {
        transform: scale(.9);
    }

    .editGame:hover::before,
    .gamelist:hover:before,
    .activity:hover:before,
    .profil:hover::before {
        border-left: 8px solid green;
    }


    .searching {
        background-color: #071227;
        margin-top: 15px;
        height: 50px;
        width: 45%;
        border-radius: 40px;
        position: relative;
    }

    .searching input {
        width: 100%;
        height: 50px;
        border-radius: 40px;
        border: none;
        color: white;
        background-color: #071219;
        padding: 0 30px;
    }

    .searching button {
        background: none;
        border: none;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        position: relative;
        margin-left: 420px;
        bottom: 40px;
        color: white;
    }
    .searchbar{
        margin-bottom: auto;
        margin-top: 20px;
        height: 30px;
        background-color: #353b48;
        border-radius: 30px;
        padding: 5px;
        }
    
        .search_input{
        color: white;
        border: 0;
        outline: 0;
        background: none;
        width: 0;
        caret-color:transparent;
        line-height: 20px;
        transition: width 0.4s linear;
        }
    
        .searchbar:hover > .search_input{
        padding: 0 5px;
        width: 250px;
        caret-color:red;
        transition: width 0.4s linear;
        }
    
        .searchbar:hover > .search_icon{
        background: white;
        color: #e74c3c;
        }
    
        .search_icon{
        height: 20px;
        width: 20px;
        float: right;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        color:white;
        text-decoration:none;
        }
        
</style>

<body>

    <!-- Authentication Links -->
  
    <div>
        <nav class="navbar navbar-expand-md navbar-light" style="background-color: #071224;font-size : 14px">
            <div class="container">
                <a class="navbar-brand text-white tittle" href="{{ url('/') }}" style="width : 110px">
                   <img class="img-fluid" src="https://i.giphy.com/media/rq6379B2woH5btSzJn/giphy.webp" alt="" style="width:300px">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <div class="d-md-flex justify-content-md-between align-items-center" style="">   
                        <form enctype="multipart/form-data" action="{{ route('search') }}" method="GET">
                            <div class="searchbar mr-auto" >
                                <input type="text" class="search_input" name="search" placeholder="Enter Keyword">
                                <a class="search_icon" ><i class="fas fa-search"></i></a>
                            </div>
                        </form>
                    </div>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto" style="margin-top : 30px;font-size : 20px">
                        @guest
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        @if(Auth::user()->role_id == '1')
                        <li class="nav-item "> <a class="nav-link text-white editGame " href="{{ url('/gameIndex') }}">{{ __('EditGame ') }}</a></li>
                        @endif
                        <li class="nav-item "> <a class="nav-link text-white gamelist" href="{{ route('gamelist.all') }}">{{ __('Games') }}</a></li>
                        <li class="nav-item "> <a class="nav-link text-white activity" href="{{ route('activity',UserHelp::get_username(Auth::user()->id)) }}">{{ __('Activity ') }}</a></li>
                        <li class="nav-item mt-1"> <a class="navbar-brand text-white profil" href="{{ route('myprofile') }}">{{ Auth::user()->name }}</a></li>
                        <li class="nav-item mt-1 ml-3">
                            <a class="navbar-brand text-light" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    @stack('javascripts')
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js"></script>
    @livewireScripts
</body>
@toastr_render

</html>