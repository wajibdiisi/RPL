@extends('layouts.app')

@section('content')
<style>
    body {
        padding: 0;
        background-image: url(https://pbs.twimg.com/media/EaaDtQGWsAAbaJO.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        height: 100%;
        position: relative;
        color: white;
    }

    .bekgron {
        background-color: rgba(48, 89, 177, 0.1) !important;

    }

    .col-lg-4 {
        opacity: 0.9;
        border-radius: 15px;
        padding-top: 20px;
        padding-bottom: 20px;
    }

    .btn {
        
    }

    .hexagon {
        clip-path: polygon(50% 0, 100% 25%, 100% 75%, 50% 100%, 0 75%, 0 25%);
        background-size: cover;
        margin: 10px auto;
        height: 95x;
        width: 95px;
    }

    .form-control {
        color: #ffffff;
    }
    .content input::-webkit-input-placeholder {
  color: white;
}
    
</style>
<div class="container">
    <div class="row">
        <div class="col-lg-1">
            <div class="hexagon">
                <img src="{{ asset('uploads/web_asset/logo.gif') }}" alt="" style="width:95px;height:95px">
            </div>
            <div class="mb-5"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 content">
            <h1 class="h2 mb-0">Welcome back!</h1>
            <div class="mb-5"></div>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <input id="email" type="email" placeholder="Email address" class="form-control rounded-pill bekgron @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group mb-5">
                    <div>
                        <input id="password" type="password" placeholder="Password" class="form-control rounded-pill bekgron @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
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

        <div class="col-lg-8">
            <div class="mb-5">
                <div class="mb-5 mt-5">
                    <div class="mb-5 mt-5">
                        <div class="account-block rounded-right">
                            <div class="account-testimonial">
                                <h5 class="text-white-80 text-center">This beautiful theme yours!</h5>
                                <h5 class="lead text-white-80 text-center">"Best investment i made for a long time. Can only recommend it for other users."</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection