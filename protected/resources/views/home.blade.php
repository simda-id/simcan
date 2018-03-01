<?php
use App\CekAkses;
use hoaaah\LaravelMenu\Menu;
?>

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
    <link href="{{ asset('css/font-awesome.min.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet"> 
    <link href="{{ asset('css/sb-admin-2.css')}}" rel="stylesheet">
    <link href="{{ asset('css/carousel.css') }}" rel="stylesheet">

    <style>
        .btn3d {
            position:relative;
            top: -6px;
            border:0;
            transition: all 40ms linear;
            margin-top:10px;
            margin-bottom:10px;
            margin-left:2px;
            margin-right:2px;
            text-align: center;

            /*width: 250px;*/
            height: 60px;
            /*padding: 10px 16px;*/
            /*font-size: 24px;*/
            /*line-height: 1.33;*/
            /*border-radius: 50%;*/
        }
        .btn3d:active:focus,
        .btn3d:focus:hover,
        .btn3d:focus {
            -moz-outline-style:none;
                 outline:medium none;
        }
        .btn3d:active, .btn3d.active {
            top:2px;
        }
        .btn3d.btn-white {
            color: #666666;
            box-shadow:0 0 0 1px #ebebeb inset, 0 0 0 2px rgba(255,255,255,0.10) inset, 0 8px 0 0 #f5f5f5, 0 8px 8px 1px rgba(0,0,0,.2);
            background-color:#fff;
        }
        .btn3d.btn-white:active, .btn3d.btn-white.active {
            color: #666666;
            box-shadow:0 0 0 1px #ebebeb inset, 0 0 0 1px rgba(255,255,255,0.15) inset, 0 1px 3px 1px rgba(0,0,0,.1);
            background-color:#fff;
        }
        .btn3d.btn-default {
            color: #666666;
            box-shadow:0 0 0 1px #ebebeb inset, 0 0 0 2px rgba(255,255,255,0.10) inset, 0 8px 0 0 #BEBEBE, 0 8px 8px 1px rgba(0,0,0,.2);
            background-color:#f9f9f9;
        }
        .btn3d.btn-default:active, .btn3d.btn-default.active {
            color: #666666;
            box-shadow:0 0 0 1px #ebebeb inset, 0 0 0 1px rgba(255,255,255,0.15) inset, 0 1px 3px 1px rgba(0,0,0,.1);
            background-color:#f9f9f9;
        }
        .btn3d.btn-primary {
            box-shadow:0 0 0 1px #417fbd inset, 0 0 0 2px rgba(255,255,255,0.15) inset, 0 8px 0 0 #4D5BBE, 0 8px 8px 1px rgba(0,0,0,0.5);
            background-color:#4274D7;
        }
        .btn3d.btn-primary:active, .btn3d.btn-primary.active {
            box-shadow:0 0 0 1px #417fbd inset, 0 0 0 1px rgba(255,255,255,0.15) inset, 0 1px 3px 1px rgba(0,0,0,0.3);
            background-color:#4274D7;
        }
        .btn3d.btn-success {
            box-shadow:0 0 0 1px #31c300 inset, 0 0 0 2px rgba(255,255,255,0.15) inset, 0 8px 0 0 #5eb924, 0 8px 8px 1px rgba(0,0,0,0.5);
            background-color:#78d739;
        }
        .btn3d.btn-success:active, .btn3d.btn-success.active {
            box-shadow:0 0 0 1px #30cd00 inset, 0 0 0 1px rgba(255,255,255,0.15) inset, 0 1px 3px 1px rgba(0,0,0,0.3);
            background-color: #78d739;
        }
        .btn3d.btn-info {
            box-shadow:0 0 0 1px #00a5c3 inset, 0 0 0 2px rgba(255,255,255,0.15) inset, 0 8px 0 0 #348FD2, 0 8px 8px 1px rgba(0,0,0,0.5);
            background-color:#39B3D7;
        }
        .btn3d.btn-info:active, .btn3d.btn-info.active {
            box-shadow:0 0 0 1px #00a5c3 inset, 0 0 0 1px rgba(255,255,255,0.15) inset, 0 1px 3px 1px rgba(0,0,0,0.3);
            background-color: #39B3D7;
        }
        .btn3d.btn-warning {
            box-shadow:0 0 0 1px #d79a47 inset, 0 0 0 2px rgba(255,255,255,0.15) inset, 0 8px 0 0 #D79A34, 0 8px 8px 1px rgba(0,0,0,0.5);
            background-color:#FEAF20;
        }
        .btn3d.btn-warning:active, .btn3d.btn-warning.active {
            box-shadow:0 0 0 1px #d79a47 inset, 0 0 0 1px rgba(255,255,255,0.15) inset, 0 1px 3px 1px rgba(0,0,0,0.3);
            background-color: #FEAF20;
        }
        .btn3d.btn-danger {
            box-shadow:0 0 0 1px #b93802 inset, 0 0 0 2px rgba(255,255,255,0.15) inset, 0 8px 0 0 #AA0000, 0 8px 8px 1px rgba(0,0,0,0.5);
            background-color:#D73814;
        }
        .btn3d.btn-danger:active, .btn3d.btn-danger.active {
            box-shadow:0 0 0 1px #b93802 inset, 0 0 0 1px rgba(255,255,255,0.15) inset, 0 1px 3px 1px rgba(0,0,0,0.3);
            background-color: #D73814;
        }
        .btn3d.btn-magick {
            color: #fff;
            box-shadow:0 0 0 1px #9a00cd inset, 0 0 0 2px rgba(255,255,255,0.15) inset, 0 8px 0 0 #9823d5, 0 8px 8px 1px rgba(0,0,0,0.5);
            background-color:#bb39d7;
        }
        .btn3d.btn-magick:active, .btn3d.btn-magick.active {
            box-shadow:0 0 0 1px #9a00cd inset, 0 0 0 1px rgba(255,255,255,0.15) inset, 0 1px 3px 1px rgba(0,0,0,0.3);
            background-color: #bb39d7;
        }
    </style>

    <script src="{{ asset('/js/jquery.min.js')}}"></script>
    <script src="{{ asset('/js/jquery-ui.js')}}"></script>
    <script src="{{ asset('/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('/js/holder.js')}}"></script>
</head>

<body>
    <nav class="navbar navbar-findcond navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-brand navbar-right" href="{{ url('/home') }}">
                    <div class="row">
                        <img style="max-width:50px; margin-top: -7px;" src="{{asset('vendor/default.png')}}"> simd@<strong>Perencanaan</strong> 
                        :: {{Session::get('xPemda')}}
                    </div>
                </a>
            </div>
            <ul class="nav navbar-top-links pull-right">
                <?php 
                    $akses = new \App\CekAkses();
                ?>                       
                @if (Auth::guest())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            User <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-user" role="menu">
                            <li>
                                <a href="{{ route('register') }}">Register</a>
                            </li>
                            <li>
                                <a href="{{ route('login') }}">Login</a>
                            </li>
                        </ul>
                    </li>
                @else                            
                    <li class="navbar-form">
                        <div class="form-group">
                            <label for="id_tahun" style="color: #fff">Tahun Anggaran :</label>
                        </div>
                        <div class="form-group">
                            <select class="form-control id_tahun" name="id_tahun" id="id_tahun"></select>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <i class="fa fa-user fa-fw"></i> {{ Auth::user()->name }} <span class="fa fa-caret-down fa-fw fa-lg"></span>
                        </a>
                            <ul class="dropdown-menu dropdown-user" role="menu">
                                <li>
                                    <a id="btn_ganti" onclick="event.preventDefault();"><i class="fa fa-key fa-fw text-info"></i> Ganti Password</a>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out fa-fw text-info"></i> Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>                                        
                                </li>
                            </ul>
                    </li>
                @endif
            </ul>
    </nav>

    <div class="container-fluid" style="padding: 50px">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <br>
        <div class="carousel-inner">
            <div class="item active">
                <img data-src="holder.js/100px600?auto&bg=0B0B61&fg=FFFFFF&text=simd@Perencanaan">
                <div class="carousel-caption">
                    <br>
                    <p>
                        Dihadirkan sebagai alat bantu untuk menyelaraskan perencanaan jangka menengah, jangka pendek, hingga ke penganggaran.<br> Dengan aplikasi ini dapat dijaga keterkaitan dan dukungan antara penganggaran, perencanaan tahunan hingga ke perencanaan lima tahunan.</p>
                </div>
            </div>
            <div class="item">
                <img data-src="holder.js/100px600?auto&bg=df7401&fg=FFFFFF&text=ASB dan SSH">
                <div class="carousel-caption">
                    <br>
                    <p>
                        <strong>Analisa Standar Belanja</strong> dan <strong>Standar Satuan Harga</strong> sebagai jembatan untuk menghubungkan antara proses perencanaan dengan proses penganggaran.</p>
                    <p>
                        <a class="btn3d btn btn-primary btn-lg" href="{{ url('/asb/dash') }}" role="button"><strong>ASB dan SSH</strong> &raquo;</a></p>
                </div>
            </div>
            <div class="item">
                <img data-src="holder.js/100px600?auto&bg=2980b9&fg=FFFFFF&text=Perencanaan Jangka Menengah">
                <div class="carousel-caption">
                    <br>
                    <p>
                        Merupakan perencanaan lima tahunan (<strong>RPJMD</strong> dan <strong>Renstra</strong>) sebagai penjabaran <strong>visi-misi Kepala Daerah</strong>.</p>
                    <p>
                        <a class="btn3d btn btn-warning btn-lg" href="{{ url('/rpjmd/dash') }}" role="button"><strong>RPJMD dan Renstra</strong> &raquo;</a></p>
                </div>
            </div>
            <div class="item">
                <img data-src="holder.js/100px600?auto&bg=8e44ad&fg=FFFFFF&text=Perencanaan Jangka Pendek">
                <div class="carousel-caption">
                    <br>
                    <p>
                        Merupakan perencanaan tahunan (<strong>RKPD</strong> dan <strong>Renja</strong>) sebagai operasionalisasi dari perencanaan jangka menengah.</p>
                    <p>
                        <a class="btn3d btn btn-success btn-lg" href="{{ url('/rkpd/dash') }}" role="button"><strong>RKPD dan Renja</strong> &raquo;</a></p>
                </div>
            </div>
            <div class="item">
                <img data-src="holder.js/100px600?auto&bg=16a085&fg=FFFFFF&text=Penganggaran">
                <div class="carousel-caption">
                    <br>
                    <p>
                        
                        Detail dari rencana kerja tahunan (<strong>PPAS</strong> dan <strong>Pra-RKA</strong>) sebagai dasar penyusunan anggaran yang pelaksanaannya akan dikelola melalui <strong>Simda Keuangan</strong>.</p>
                    <p>
                        <a class="btn3d btn btn-danger btn-lg" href="{{ url('/modul3') }}" role="button"><strong>Penganggaran</strong> &raquo;</a></p>
                </div>
            </div>
        </div>
        <ul class="nav nav-pills nav-justified">
            <li data-target="#myCarousel" data-slide-to="0" class="active"><a href="#"><i class="fa fa-star-o fa-fw"></i> simd@<strong>Perencanaan</strong></a></li>
            <li data-target="#myCarousel" data-slide-to="1"><a class="btn" role="button" href="{{ url('/modul0') }}">ASB dan SSH</a></li>
            <li data-target="#myCarousel" data-slide-to="2"><a class="btn" role="button" href="{{ url('/rpjmd/dash') }}">RPJMD dan Renstra</a></li>
            <li data-target="#myCarousel" data-slide-to="3"><a class="btn" role="button" href="{{ url('/rkpd/dash') }}">RKPD dan Renja</a></li>
            <li data-target="#myCarousel" data-slide-to="4"><a class="btn" role="button" href="{{ url('/modul3') }}">PPAS</a></li>
        </ul>
    </div>

    </div>
    <div class="navbar navbar-default navbar-fixed-bottom">
        <div class="container-fluid">
          <p class="navbar-text pull-left">
            <b><a href="http://www.bpkp.go.id" title="Badan Pengawasan Keuangan dan Pembangunan">Badan Pengawasan Keuangan dan Pembangunan</a></b>
                  | <b>Tim Satgas Simda</b> | Copyright &copy; 2018
          </p>
                <li class="navbar-btn btn pull-right dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <i class="fa fa-cog fa-spin fa-fw fa-lg"></i> simd@<strong>Perencanaan</strong> <span class="fa fa-caret-up fa-fw fa-lg"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu" >
                        <li><a href="{{ url('/') }}"><i class="fa fa-cubes fa-fw text-info"></i> Dashboard</a></li>
                        <li class="divider"></li>
                        <li>@if($akses->get(110)) <a href="{{ url('/admin/parameter/user') }}"><i class="fa fa-user fa-fw text-info"></i> User Management</a> @endif</li>
                        <li>@if($akses->getMulti([101, 102, 103, 104, 105, 106, 107, 108, 109])) <a href="{{ url('/parameter/dash') }}"><i class="fa fa-cogs fa-fw text-info"></i> Parameter</a> @endif</li>
                        <li>@if($akses->get(9)) <a href="{{ url('/admin/update') }}"><i class="fa fa-refresh fa-fw text-info"></i> Cek Update</a> @endif</li>
                    </ul>
                </li>
        </div>
        
        
    </div>

<div id="ModalUser" class="modal" role="dialog" data-backdrop="static" tabindex="-1" data-focus-on="input:first">
  <div class="modal-dialog modal-lg"  >
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ganti Password</h4>
      </div>
        <div class="modal-body"  style="background-color: #eee;">        
        <form name="frmModalUser" class="form-horizontal" role="form" autocomplete='off' action="{{ Request::url() }}" method="post">
          <div class="row">
          <div class="col-sm-2" style="text-align: center;">
            <i class="fa fa-user-circle-o" style="font-size: 120px;color: #357EBD;"></i>
          </div>
          <div class="col-sm-10">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id_user" id="id_user">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-3 control-label">Nama User</label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" required autofocus data-toggle="popover" data-html="true" data-container="body" title="User dan Group User" data-trigger="hover" data-content="Nama untuk ditampilkan di header setelah login">
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-3 control-label">Alamat e-Mail</label>
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" disabled>
                    </div>
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="peran_user" class="col-md-3 control-label">Peran User</label>
                    <div class="col-md-6">
                        <input id="peran_user" type="text" class="form-control" name="peran_user" disabled>
                    </div>
            </div>
            <div id="divPassword" class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-3 control-label">Password</label>
                    <div class="col-md-4">
                        <input id="password" type="password" class="form-control" name="password" required>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-md-4">
                      <div class="input-group">
                        <input id="password_confirmation" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' has-error' : '' }}" name="password_confirmation" required>
                          <div class="input-group-btn">
                                <button type="button" id="showPass" name="showPass" data-val="1" class="btn btn-md btn-success" data-toggle="popover" data-html="true" data-container="body" title="User dan Group User" data-trigger="hover" data-content="Digunakan untuk menampilkan Password yang diketik"><span id="eye" class="fa fa-eye fa-fw fa-lg"></span></button>
                          </div>
                        </div>
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
            </div>
           </div>
           </div>
        </form>
        </div>
        <div class="modal-footer" style="background-color: #357EBD;">
            <div class="row">
                <div class="col-sm-2 text-left">                        
                </div>
                <div class="col-sm-10 text-right">
                  <div class="ui-group-buttons">
                       <button type="submit" class="btn btn-success btnUser btn-labeled" data-dismiss="modal">
                        <span class="btn-label"><i class="fa fa-floppy-o fa-lg fa-fw"></i></span>Simpan</button>
                    <div class="or"></div>
                    <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                        <span class="btn-label"><i class="fa fa-sign-out fa-lg fa-fw"></i></span>Tutup</button>
                  </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</body>


<script>
$(document).ready( function() {
    $('#myCarousel').carousel({
        interval:   3500
    });
    // $('#myCarousel').carousel({
    //     pause: true,        // init without autoplay (optional)
    //     interval: false,    // do not autoplay after sliding (optional)
    //     wrap:false          // do not loop
    // });
    
    var clickEvent = false;
    $('#myCarousel').on('click', '.nav a', function() {
            clickEvent = true;
            $('.nav li').removeClass('active');
            $(this).parent().addClass('active');        
    });
    
    $('#myCarousel').on('slid.bs.carousel', function(e) {
        if(!clickEvent) {
            var count = $('.nav').children().length -1;
            var current = $('.nav li.active');
            current.removeClass('active').next().addClass('active');
            var id = parseInt(current.data('slide-to'));
            if(count == id) {
                $('.nav li').first().addClass('active');    
            }
        }
        clickEvent = false;
    });

$.ajax({
          type: "GET",
          url: './getTahunSetting',
          dataType: "json",
          success: function(data) {

          var j = data.length;
          var post, i;
          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="id_tahun"]').append('<option value="'+ post.tahun_rencana +'">'+ post.tahun_rencana +'</option>');
          }
          }
      });
});

$( "#id_tahun" ).change(function() {
    sessionStorage.setItem("tahun",$('#id_tahun').val());
});

$("#btn_ganti").click(function() {    
    $('#ModalUser').modal('show');         
});

</script>
</html>
