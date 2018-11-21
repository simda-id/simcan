<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{!! csrf_token() !!}"/>

        <meta name="description" content="Simda@ Client-API dikembangkan oleh Tim Simda BPKP">
        <meta name="author" content="Tim Simda BPKP">
        <link rel="icon" href="{{asset('simda-favicon.ico')}}">

        <title>simd@Perencanaan</title>

        <!-- Styles -->
        <link href="{{ asset('css/font-awesome.min.css') }}" rel='stylesheet' type='text/css'>
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <style>
            html, body {
              height: 100%;
            }

            body {
              margin: 0;
              padding: 0;
              width: 100%;
              color: #fff;
              display: table;
              font-weight: 300;
              font-family: 'Raleway';
              background-image: linear-gradient(to bottom, rgb(96,108,136) 0%,rgb(63,76,107) 100%);
            }

            .container {
              text-align: center;
              display: table-cell;
              vertical-align: middle;
            }

            .content {
              text-align: center;
              display: inline-block;
            }

            .title {
              font-size: 84px;
              font-weight: bold;
              color: #ffad33 ;
              margin-bottom: 40px;
              text-shadow: 10px 7px #B0BEC5;
            }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="content">
        <div class="title"><i class="fa fa-exclamation fa-5x" aria-hidden="true"></i></div>
        <h2>Maaf, Menu yang anda cari tidak ada..!!!!</h2>
        <p><a href="{{ url('/')}}">Kembali ke halaman awal</a></p>
      </div>
    </div>
  </body>
</html>
