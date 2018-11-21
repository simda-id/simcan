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
    <style>
        body, html {
            height: 100%;
            background-repeat: no-repeat;
            /*background-image: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));*/
            background-image: linear-gradient(to bottom, rgb(96,108,136) 0%,rgb(63,76,107) 100%);
        }

        .btn {
            font-weight: 700;
            height: 36px;
            -moz-user-select: none;
            -webkit-user-select: none;
            user-select: none;
            cursor: default;
        }

        .card {
            padding: 20px 25px 30px;
            margin: 0 auto 25px;
            margin-top: 50px;
            -moz-border-radius: 2px;
            -webkit-border-radius: 2px;
            border-radius: 2px;
        }

        .profile-img-card {
            width: 96px;
            height: 120px;
            margin: 0 auto 10px;
            display: block;
        }


        }

        .form-signin input[type=email],
        .form-signin input[type=password],
        .form-signin input[type=text],
        .form-signin button {
            width: 100%;
            display: block;
            margin-bottom: 10px;
            z-index: 1;
            position: relative;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        .form-signin .form-control:focus {
            border-color: rgb(104, 145, 162);
            outline: 0;
            -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
            box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
        }

        .btn.btn-signin {
            background-color: #0264d6;
            padding: 0px;
            font-weight: 700;
            font-size: 14px;
            height: 36px;
            -moz-border-radius: 3px;
            -webkit-border-radius: 3px;
            border-radius: 3px;
            border: none;
            -o-transition: all 0.218s;
            -moz-transition: all 0.218s;
            -webkit-transition: all 0.218s;
            transition: all 0.218s;
        }

        .btn.btn-signin:hover,
        .btn.btn-signin:active,
        .btn.btn-signin:focus {
            background-color: #44506B; 
            border: 2px solid transparent;            
            box-shadow:0px 5px 10px 0px #F7F7F7;
        }

        .isian:hover,
        .isian:active,
        .isian:focus {
            background-color: #44506B; 
            color: #fff;
            border: 2px solid transparent;            
            box-shadow:0px 5px 10px 0px #F7F7F7;
        }
    </style>

</head>

<body>
    <div id="login-overlay" class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header"> 
                <div class="col-xs-3">               
                <img class="profile-img-card" src="{{ asset('vendor/default.png') }}"  />
                </div>
                <div class="col-xs-9">
                <h1 class="text-center" style="color: #fff; margin-top:30px; font-weight:900; vertical-align:middle;">
                    simd<span style="color:#DF7401; text-shadow: 2px 2px #44506B; ">@</span><strong> Integrated</strong>
                </h1>
                <span style="color: #fff; display: block; margin-bottom: 10px; font-size: 20px; text-align: center;">
                    by <strong>bpkp@2018</strong> </span>
                </div>
            </div>
            <div class="modal-body" style="background: linear-gradient(to bottom, #FFB88C, #DE6262);">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="card">
                            <form class="form-signin" method="POST" action="{{ route('login') }}">                                
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="input-group">
                                    <span class="input-group-addon" style="background-color:#0264d6; color:#fff;"><i class="fa fa-user-o fa-fw"></i></span>
                                    <input type="email" id="email" class="form-control isian" name="email" value="{{ old('email') }}" placeholder="username" required autofocus>
                                </div>
                                
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="input-group">
                                    <span class="input-group-addon" style="background-color:#0264d6; color:#fff;"><i class="fa fa-key fa-fw"></i></span>
                                    <input type="password" id="password" class="form-control isian" placeholder="Password" name="password" required>
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
                    <div class="col-xs-6">
                        <div class="card">
                        <ul class="list-unstyled" style="line-height: 2">
                            <li><span class="fa fa-check text-success" style="font-size:20px"></span><span style="font-size:20px"> e-Planning</span></li>
                            <li><span class="fa fa-check text-success" style="font-size:20px"></span><span style="font-size:20px"> e-Musrenbang</span></li>
                            <li><span class="fa fa-check text-success" style="font-size:20px"></span><span style="font-size:20px"> e-Pokir</span></li>
                            <li><span class="fa fa-check text-success" style="font-size:20px"></span><span style="font-size:20px"> e-Budgeting</span></li>
                            <li><span class="fa fa-check text-success" style="font-size:20px"></span><span style="font-size:20px"> e-SAKIP</span></li>
                        </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  
    </div>

</body>

</html>

