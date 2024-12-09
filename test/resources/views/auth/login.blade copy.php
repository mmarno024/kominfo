@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/login.css') }}">

    <div class="container">
        <div class="row justify-content-center">
            <video autoplay muted loop id="video-background">
                <source src="{{ asset('assets/background.mp4') }}" type="video/mp4">
                Your browser does not support HTML5 video.
            </video>
            <div class="login-box">
                <h3><strong>Silakan Login</strong></h3>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-sm-1 d-flex align-items-center">
                                <i class="fas fa-envelope" style="font-size: 24px;color: grey"></i>
                            </div>
                            <div class="col-sm-11 d-flex align-items-center">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Masukkan email"
                                    required>
                            </div>
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-sm-1 d-flex align-items-center">
                                <i class="fas fa-lock" style="font-size: 24px;color: grey"></i>
                            </div>
                            <div class="col-sm-11 d-flex align-items-center">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    autocomplete="current-password" placeholder="Masukkan password" required>
                            </div>
                        </div>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mx-auto d-block" style="width: 100px;">Login</button>
                </form>
            </div>
        </div>
    </div>
@endsection
