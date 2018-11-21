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

    <link rel="stylesheet" href="https://use.fontawesome.com/1417cae13b.css">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    body {
      padding-top: 50px;
      padding-bottom: 20px;
      background-color: #eee;
    }
</head>

<body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" style="color:white">simd@<strong>Perencanaan</strong> ver <strong>Beta</strong></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-top-links navbar-right">
                  <!-- Authentication Links -->
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
                      <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                              {{ Auth::user()->name }} <span class="caret"></span>
                          </a>

                          <ul class="dropdown-menu dropdown-user" role="menu">
                              <li>
                                  <a href="{{ route('logout') }}"
                                      onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                      Logout
                                  </a>

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      {{ csrf_field() }}
                                  </form>
                              </li>
                          </ul>
                      </li>
                  @endif
          </ul>
        </div>

      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        {{-- <img src="{{ asset('img/bg_simcan_web.jpg') }}"> --}}
        <h1>simd@<strong>Perencanaan</strong></h1>
        <br>
        <p>Dihadirkan sebagai alat bantu untuk menyelaraskan perencanaan jangka menengah, jangka pendek, hingga ke penganggaran.<br> Dengan aplikasi ini dapat dijaga keterkaitan dan dukungan antara penganggaran, perencanaan tahunan hingga ke perencanaan lima tahunan. </p>
        {{-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p> --}}
      </div>
    </div>
    @if (Auth::guest())
    {{-- <li><a href="{{ url('/')}}">Dashboard</a></li> --}}
    @else
    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-3">
          <h2>Analisis Standar Belanja dan Standar Satuan Harga</h2>
          <p><strong>ASB</strong> dan <strong>SSH</strong> sebagai jembatan untuk menghubungkan antara proses perencanaan dengan proses penganggaran.</p>
          <p><a class="btn btn-primary" href="{{ url('/modul0') }}" role="button"><strong>ASB dan SSH</strong> &raquo;</a></p>
        </div>
        <div class="col-md-3">
          <h2>Perencanaan Jangka Menengah</h2>
          <p>Merupakan perencanaan lima tahunan (<strong>RPJMD</strong> dan <strong>Renstra</strong>) sebagai penjabaran <strong>visi-misi Kepala Daerah</strong>.</p>
          <p><a class="btn btn-warning" href="{{ url('/modul1') }}" role="button"><strong>RPJMD dan Renstra</strong> &raquo;</a></p>
       </div>
        <div class="col-md-3">
          <h2>Perencanaan Jangka Pendek</h2>
          <p>Merupakan perencanaan tahunan (<strong>RKPD</strong> dan <strong>Renja</strong>) sebagai operasionalisasi dari perencanaan jangka menengah.</p>
          <p><a class="btn btn-success" href="{{ url('/modul2') }}" role="button"><strong>RKPD dan Renja</strong> &raquo;</a></p>
        </div>
        <div class="col-md-3">
          <h2>Penganggaran</h2>
          <p>Detail dari rencana kerja tahunan (<strong>PPAS</strong> dan <strong>Pra-RKA</strong
            >) sebagai dasar penyusunan anggaran yang pelaksanaannya akan dikelola melalui <strong>Simda Keuangan</strong>.</p>
          <p><a class="btn btn-danger" href="{{ url('/modul3') }}" role="button"><strong>PPAS dan Pra-RKA</strong> &raquo;</a></p>
        </div>
      </div>
      @endif

      <br>

      <hr>

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

  </body>
</html>
