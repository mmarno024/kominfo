<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>
    <link href="{{ url('theme') }}/css/style.css" rel="stylesheet">
</head>

<body class="h-100">

    <div class="login-form-bg h-100" style="background-color: #252129;">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="index.html">
                                    <h4>Credential Page</h4>
                                </a>

                                <form class="mt-5 mb-5 login-input" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" autocomplete="email" autofocus
                                            placeholder="Email">

                                        @error('email')
                                            <span class="text-danger">{{ $message }} </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            autocomplete="current-password" placeholder="Password">

                                        @error('password')
                                            <span class="text-danger">{{ $message }} </span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn login-form__btn submit w-100">Sign In</button>
                                </form>
                                <p class="mt-5 login-form__footer">Dont have account? <a href="page-register.html"
                                        class="text-primary">Sign Up</a> now</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ url('theme') }}/plugins/common/common.min.js"></script>
    <script src="{{ url('theme') }}/js/custom.min.js"></script>
    <script src="{{ url('theme') }}/js/settings.js"></script>
    <script src="{{ url('theme') }}/js/gleek.js"></script>
    <script src="{{ url('theme') }}/js/styleSwitcher.js"></script>
</body>

</html>
