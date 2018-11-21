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
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css' ) }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css' ) }}">
    <style type="text/css">
       
    </style>

</head>
<body>
	
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title">
                    <span class="login100-form-title-1">
                        
                        <div class="col-xs-3">               
                            <img class="profile-img-card" src="{{ asset('vendor/default.png') }}" style="width:40%;" />
                        </div>
                        <div class="col-xs-9">
                            <h1 class="text-center" style="color: #fff; margin-top:10px; font-size:40px; font-weight:900; vertical-align:middle;">
                                simd<span style="color:#DF7401; text-shadow: 2px 2px #44506B; ">@</span><strong> Integrated</strong>
                            </h1>
                        </div>
                    </span>                                    
                </div>

                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                                
                    <div class="wrap-input100 validate-input m-b-26{{ $errors->has('password') ? ' has-error' : '' }}">
                        <span class="label-input100">Username</span>
                        <input class="input100" type="text" id="email" name="email" placeholder="Enter username" required="">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-18">
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" id="password" name="password" placeholder="Enter password" required="">
                        <span class="focus-input100"></span>
                    </div>
                    
                    <div class="container-login100-form-btn">
                            <button class="login100-form-btn">
                                    Login
                            </button>
                    </div>
                    
                   <div class="col-xs-3"> 
                       <br><br>
                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        by <img class="profile-img-card" src="{{ asset('vendor/bpkp_logo.png') }}" style="width:15%;" /> @2018
                    </div>
                    
                </form>
                
            </div>
        </div>
    </div>

</body>
</html>