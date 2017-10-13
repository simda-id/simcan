<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{!! csrf_token() !!}"/>

    <meta name="description" content="Sistem Perencanaan yang dikembangkan oleh Tim Simda BPKP">
    <meta name="author" content="Tim Simda BPKP">
    <link rel="icon" href="{{asset('simda-favicon.ico')}}">

    <title>simd@Perencanaan</title>

    <!-- Styles -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/signin.css') }}" rel="stylesheet">
</head>

<body>

    <div class="container">
        <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">simd@<strong>Perencanaan</strong></h1>
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="{{ asset('vendor/default.png') }}" />
            <p id="profile-name" class="profile-name-card" text-align="center"></p>
            <form class="form-signin" method="POST" action="{{ route('login') }}">
                <span id="reauth-email" class="reauth-email"> by <strong>simd@BPKP</strong> </span>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="input-group">
                    <span class="input-group-addon primary"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="username" required autofocus>
                </div>
                
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <div class="input-group">
                    <span class="input-group-addon primary"><i class="glyphicon glyphicon-lock"></i></span>
                    <input type="password" id="password" class="form-control" placeholder="Password" name="password" required>
                </div>
                
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit"> Masuk </button>
                
            </form>
        </div>
        </div>
        </div>
    </div>
</body>

</html>

