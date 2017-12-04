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

    <!-- Styles -->

    {{-- <link rel="stylesheet" href="https://use.fontawesome.com/1417cae13b.css"> --}}
    <link href="{{ asset('css/font-awesome.min.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet"> 
    <link href="{{ asset('css/sb-admin-2.css')}}" rel="stylesheet">
    <link href="{{ asset('css/carousel.css') }}" rel="stylesheet">

    <script src="{{ asset('/js/jquery.min.js')}}"></script>
    <script src="{{ asset('/js/jquery-ui.js')}}"></script>
    <script src="{{ asset('/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('/js/holder.js')}}"></script>

    {{-- <style>
        h1.padding {
        padding-right: 1cm;
        }
    </style> --}}

</head>

<body>
    <nav class="navbar navbar-findcond navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">          
                    <!-- Branding Image -->
                    <a class="navbar-brand navbar-right" href="{{ url('/home') }}">
                        <div class="row">
                            <img style="max-width:50px; margin-top: -7px;" src="{{asset('vendor/default.png')}}"> simd@<strong>Perencanaan</strong> <span class="badge"> ver 1.0 </span>
                        </div>
                    </a>
                </div>
                    <ul class="nav navbar-nav navbar-right">                        
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
                                    <i class="fa fa-user fa-fw"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu dropdown-user" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fa fa-key fa-fw text-info"> Ganti Password</i>
                                        </a>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out fa-fw text-info"> Logout</i>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>

                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
    </nav>

    <div class="container">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <br>
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                {{-- <img src="http://placehold.it/1200x500/0b0b61/ffffff&text=simd@Perencanaan {{Session::get('tahun')}} "> --}}
                <img data-src="holder.js/1200x400?bg=0B0B61&fg=FFFFFF&text=simd@Perencanaan">
                <div class="carousel-caption">
                    <br>
                    <p>
                        Dihadirkan sebagai alat bantu untuk menyelaraskan perencanaan jangka menengah, jangka pendek, hingga ke penganggaran.<br> Dengan aplikasi ini dapat dijaga keterkaitan dan dukungan antara penganggaran, perencanaan tahunan hingga ke perencanaan lima tahunan.</p>
                </div>
            </div>
            <div class="item">
                <img data-src="holder.js/1200x400?bg=df7401&fg=FFFFFF&text=ASB dan SSH">
                <div class="carousel-caption">
                    <br>
                    <p>
                        <strong>Analisa Standar Belanja</strong> dan <strong>Standar Satuan Harga</strong> sebagai jembatan untuk menghubungkan antara proses perencanaan dengan proses penganggaran.</p>
                    <p>
                        <a class="btn btn-primary" href="{{ url('/modul0') }}" role="button"><strong>ASB dan SSH</strong> &raquo;</a></p>
                </div>
            </div>
            <!-- End Item -->
            <div class="item">
                <img data-src="holder.js/1200x400?bg=2980b9&fg=FFFFFF&text=Perencanaan Jangka Menengah">
                <div class="carousel-caption">
                    <br>
                    <p>
                        Merupakan perencanaan lima tahunan (<strong>RPJMD</strong> dan <strong>Renstra</strong>) sebagai penjabaran <strong>visi-misi Kepala Daerah</strong>.</p>
                    <p>
                        <a class="btn btn-warning" href="{{ url('/rpjmd/dash') }}" role="button"><strong>RPJMD dan Renstra</strong> &raquo;</a></p>
                </div>
            </div>
            <!-- End Item -->
            <div class="item">
                <img data-src="holder.js/1200x400?bg=8e44ad&fg=FFFFFF&text=Perencanaan Jangka Pendek">
                <div class="carousel-caption">
                    <br>
                    <p>
                        Merupakan perencanaan tahunan (<strong>RKPD</strong> dan <strong>Renja</strong>) sebagai operasionalisasi dari perencanaan jangka menengah.</p>
                    <p>
                        <a class="btn btn-success" href="{{ url('/rkpd/dash') }}" role="button"><strong>RKPD dan Renja</strong> &raquo;</a></p>
                </div>
            </div>
            <!-- End Item -->
            <div class="item">
                <img data-src="holder.js/1200x400?bg=16a085&fg=FFFFFF&text=Penganggaran">
                <div class="carousel-caption">
                    <br>
                    <p>
                        
                        Detail dari rencana kerja tahunan (<strong>PPAS</strong> dan <strong>Pra-RKA</strong>) sebagai dasar penyusunan anggaran yang pelaksanaannya akan dikelola melalui <strong>Simda Keuangan</strong>.</p>
                    <p>
                        <a class="btn btn-danger" href="{{ url('/modul3') }}" role="button"><strong>Penganggaran</strong> &raquo;</a></p>
                </div>
            </div>
            <!-- End Item -->
        </div>
        <!-- End Carousel Inner -->
        <ul class="nav nav-pills nav-justified">
            <li data-target="#myCarousel" data-slide-to="0" class="active"><a href="#">simd@<strong>Perencanaan</strong><small></small></a></li>
            <li data-target="#myCarousel" data-slide-to="1"><a class="btn" role="button" href="{{ url('/modul0') }}">ASB dan SSH<small></small></a></li>
            <li data-target="#myCarousel" data-slide-to="2"><a class="btn" role="button" href="{{ url('/modul1') }}">RPJMD dan Renstra<small></small></a></li>
            <li data-target="#myCarousel" data-slide-to="3"><a class="btn" role="button" href="{{ url('/modul2') }}">RKPD dan Renja<small></small></a></li>
            <li data-target="#myCarousel" data-slide-to="4"><a class="btn" role="button" href="{{ url('/modul3') }}">PPAS<small></small></a></li>
        </ul>
    <!-- End Carousel -->
      <hr>
  </div>
      <footer>
          <?php 
              $akses = new \App\CekAkses(); 
              if($akses->get(1)):
          ?>
          &copy; <strong>Badan Pengawasan Keuangan dan Pembangunan - 2017</strong>
          <div class="btn-group">
               @if($akses->get(110)) <a href="{{ url('/admin/parameter/user') }}" class="btn btn-sm btn-default"><i class="fa fa-user fa-fw"></i> User Management</a> @endif
              @if($akses->getMulti([101, 102, 103, 104, 105, 106, 107, 108, 109])) <a href="{{ url('/admin/parameter') }}" class="btn btn-sm btn-default"><i class="fa fa-wrench fa-fw"></i> Parameter</a> @endif
              @if($akses->get(9)) <a href="{{ url('/admin/update') }}" class="btn btn-sm btn-default"><i class="fa fa-refresh fa-fw"></i> Cek Update</a> @endif
          </div>
          <?php else:?>
              <p>&copy; <strong>Badan Pengawasan Keuangan dan Pembangunan - 2017</strong></p>
          <?php endif;?>
      </footer>
    </div> <!-- /container -->

<div id="ModalUser" class="modal fade" role="dialog" data-backdrop="static" tabindex="-1" data-focus-on="input:first">
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



<script>

$(document).ready( function() {
    $('#myCarousel').carousel({
        interval:   4000
    });
    
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
          // alert({{Session::get('tahun')}});
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

</script>

  </body>

</html>
