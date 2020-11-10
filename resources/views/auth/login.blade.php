@extends('layouts.app')

@section('content')
<style>
    body{
               
               padding: 0;
               background-image: url(https://images.wallpapersden.com/image/download/ori-and-the-will-of-the-wisps-2019-game_a2lmaW6UmZqaraWkpJRobWllrWdma2U.jpg);
               background-repeat: no-repeat;
               background-size: cover;
               height: 100%;
               position: relative;
               color : white;
           }
           .bekgron {
               background-color : rgba(48, 89, 177, 0.4)!important;
           }
           
           
           .text-theme {
               color: #071224 !important;
           }
           
           .btn-theme {
               background-color: #071224;
               border-color: #429944;
               color: #071224;
           }
           .btn{
            border-color:429944 ;
            background-color:071224 ;
           }
           .hexagon {
               clip-path: polygon(50% 0, 100% 25%, 100% 75%, 50% 100%, 0 75%, 0 25%);
               background-size: cover;
               margin: 10px auto;
               height: 95x;
               width: 95px;      
   }
</style>
<div class="container">
    <div class="row">
        <div class="col-xl-10">
            <div class="mb-5"></div>  
            
            <div class="col-lg-6 ">
                <div class="p7">
                <div class="col-md-4">
                    <div class="hexagon">
                     <img src="{{ asset('uploads/web_asset/logo.gif') }}" alt="" style="width:95px;height:95px">
                    </div>
                </div>
                <div class="mb-5"></div> 
                <h2 class="h2 mb-0">Welcome back!</h2><div class="mt-2 mb-5"></div>
                <div class="">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                                
                            <div>
                                <input id="email" type="email" placeholder ="Email Address" class="form-control rounded-pill bekgron @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2"></div>  
                        <div class="form-group">
                            <div>
                                <input id="password" type="password" placeholder ="Password" class="form-control rounded-pill bekgron @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="form-check col-form-label">
                                    <input class="form-check-input " type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            
                            </div>
                        </div>

                        
                                <button type="submit" class="btn btn-outline-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-outline-primary float-right" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                    </form>
                
          
        </div>
    </div>
</div>
@endsection
