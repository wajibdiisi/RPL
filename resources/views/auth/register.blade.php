@extends('layouts.app')
@section('title')
Register
@endsection
@section('content')
<style>
    body {
        padding: 0;
        background-image: url(https://pbs.twimg.com/media/Ek8Pm-kVcAM-nKN?format=jpg&name=large);
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
        border-color: #429944;
        background-color: #071224;
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
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-1">
            <div class="mb-5"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 content">

            <h1 class="h1 mb-0">Get Started</h1>
            <h6 class="text-white-100"> By continuing, you agree to our <a href="user.html" class="text-primary"> User Agreement</a>
                and <a href="user.html" class="text-primary">Privacy Policy</a></h6>

            <div class="mt-3"></div>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group ">
                    <input id="name" type="text" placeholder="Nama" class="form-control rounded-pill bekgron @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group ">
                    <input id="username" type="text" placeholder="Username" class="form-control rounded-pill bekgron @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group ">
                    <input id="email" type="email" placeholder="Email Address" class="form-control rounded-pill bekgron @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group ">
                    <input id="password" type="password" placeholder="Password" class="form-control rounded-pill bekgron @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group mb-5">
                    <input id="password-confirm" type="password" placeholder="Password Confirm" class="form-control rounded-pill bekgron" name="password_confirmation" required autocomplete="new-password">
                </div>
                <div class="mt-2"></div>
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
            </form>

        </div>

        <div class="col-lg-8">
            <div class="mb-5">
                <div class="mb-5 mt-5">
                    <div class="mb-5 mt-5">
                        <div class="account-block rounded-right">
                            <div class="account-testimonial">
                                <div class="mb-5 text-black-50">.</div>
                                <div class="mb-5 text-black-50">.</div>
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