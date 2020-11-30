<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" crossorigin="anonymous" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
 
    <title>Vue Laravel</title>
 
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<style>
    body {
            background: #071224;

        }
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

    .tittle::before,
    .tittle::after {
        content: '';
        position: relative;
        box-sizing: border-box;
        width: 100%;
        height: 100%;
        transition: .4s linear;
    }

    .tittle:hover {
        transform: scale(.9);
    }

    .tittle:hover::before {
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
        width: 0;
        caret-color:transparent;
        line-height: 40px;
        transition: width 0.4s linear;
        }
    
        .searchbar:hover > .search_input{
        padding: 0 10px;
        width: 250px;
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
</style>
<body>
    <nav class="navbar navbar-expand-md navbar-light" style="background-color: #071224;">
        <div class="container">
            <a class="navbar-brand text-white tittle" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <div class="d-md-flex justify-content-md-between align-items-center">   
                    <form enctype="multipart/form-data" action="{{ route('search') }}" method="GET">
                        <div class="searchbar mr-auto">
                            <input type="text" class="search_input" name="search" placeholder="Enter games name">
                            <a class="search_icon"><i class="fas fa-search"></i></a>
                        </div>
                    </div>
            </form>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
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
                    <li class="nav-item "> <a class="nav-link text-white editGame " href="{{ url('/gameIndex') }}">{{ __('EditGame ') }}</a></li>
                    <li class="nav-item "> <a class="nav-link text-white gamelist" href="{{ route('gamelist.all') }}">{{ __('Gamelist') }}</a></li>
                    <li class="nav-item "> <a class="nav-link text-white activity" href="{{ route('activity',UserHelp::getID(Auth::user()->id)) }}">{{ __('Activity ') }}</a></li>
                    <li class="nav-item "> <a class="navbar-brand text-white profil" href="{{ route('myprofile') }}" class="text-sm text-gray-700 underline">Profile</a></li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="{{ url('/profile') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    @if(Auth::user())
    @php $profile_id = UserHelp::get_username(Auth::user()->id)
    @endphp
    @else
        @php $profile_id = 'guest'; @endphp
    @endif


    <script>
        window.User = {!! json_encode($profile_id) !!}
    </script>
    <div id="app"></div>
 
    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>