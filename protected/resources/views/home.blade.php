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

    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                   {{--  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>   --}}                  
                    <!-- Branding Image -->
                    <a class="navbar-brand navbar-right" href="{{ url('/home') }}">simd@<strong>Perencanaan</strong> ver <strong>1.0</a>
                </div>
                    <ul class="nav navbar-top-links navbar-right">

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-flag fa-fw"></i> Tahun Anggaran: <?= Session::get('tahun') != NULL ? Session::get('tahun') : 'Pilih!' ?> <i class="fa fa-caret-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-messages">
                                <?php 
                                    $rpjmdDokumen = \App\models\RefSetting::where('status_setting','=','1')->get();
                                    $tahun = [];
                                    foreach($rpjmdDokumen as $data){
                                        $tahun[$data->tahun_rencana] = $data->tahun_rencana;
                                    }
                                    foreach($tahun as $tahun):
                                ?>
                                    <li>
                                        <a href="{{ url('/ta/'.$tahun) }}">
                                            <span class="text-muted small">{{ $tahun }}</span>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                <?php endforeach;?>
                            </ul>
                        </li>
                        <!-- /.dropdown -->

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
                                    <i class="fa fa-user fa-fw"></i> {{ Auth::user()->name }} <span class="caret"></span>
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
                        <a class="btn btn-warning" href="{{ url('/modul1') }}" role="button"><strong>RPJMD dan Renstra</strong> &raquo;</a></p>
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
                        <a class="btn btn-success" href="{{ url('/modul2') }}" role="button"><strong>RKPD dan Renja</strong> &raquo;</a></p>
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
            <li data-target="#myCarousel" data-slide-to="1"><a href="#">ASB dan SSH<small></small></a></li>
            <li data-target="#myCarousel" data-slide-to="2"><a href="#">RPJMD dan Renstra<small></small></a></li>
            <li data-target="#myCarousel" data-slide-to="3"><a href="#">RKPD dan Renja<small></small></a></li>
            <li data-target="#myCarousel" data-slide-to="4"><a href="#">PPAS<small></small></a></li>
        </ul>
        {{-- <br>
        <div class="row">
        <div class="col-md-3 text-center ">
          <i class="fa fa-exclamation-triangle faa-flash animated-hover" ></i>
        </div>
        <div class="col-md-3 text-center">
          <i class="fa fa-exclamation-triangle fa-3x fa-fw mbr-iconfont"  style="color:red;" aria-hidden="true"></i>
       </div>
        <div class="col-md-3 text-center">
          <i class="fa fa-exclamation-triangle fa-3x fa-fw mbr-iconfont"  style="color:red;" aria-hidden="true"></i>
        </div>
        <div class="col-md-3 text-center">
          <i class="fa fa-exclamation-triangle fa-3x fa-fw mbr-iconfont"  style="color:red;" aria-hidden="true"></i>  
        </div>
    </div> --}}
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
    }).on('slid.bs.carousel', function(e) {
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
});
</script>

  </body>

</html>
