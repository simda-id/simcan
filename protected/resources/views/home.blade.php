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
    
    a {text-decoration: none; }
    a:visited { text-decoration:none; } 
    a:active { text-decoration:none; }
    a:link { text-decoration:none; }

    .mb-60 {
        margin-bottom: 60px;
    }
    .services-inner {
        border: 2px solid #0E203A;
        margin-left: 35px;
        transition: .3s;
        height: 150px;
    }
    .our-services-img {
        float: left;
        margin-left: -36px;
        margin-right: 22px;
        margin-top: 28px;    
        border-radius: 50%;
    }

    .our-services-text {
        padding-right: 10px;
    }
    .our-services-text {
        overflow: hidden;
        padding: 28px 0 25px;
    }
    .our-services-text h4 {
        color: #222222;
        font-size: 22px;
        font-weight: 700;
        letter-spacing: 1px;
        margin-bottom: 8px;
        padding-bottom: 10px;
        position: relative;
        text-transform: uppercase;
    }
    .our-services-text h4::before {
        background: #ec6d48 none repeat scroll 0 0;
        bottom: 0;
        content: "";
        height: 1px;
        position: absolute;
        width: 35px;
    }
    .our-services-wrapper:hover .services-inner {
        background: #F4FFBA none repeat scroll 0 0;
        border: 2px solid transparent;
        box-shadow: 0px 5px 10px 0px #F4FFBA;       
        cursor: pointer;
    }
    .our-services-text p {
        margin-bottom: 0;
    }
    p {
        font-size: 14px;
        font-weight: 400;
        line-height: 26px;
        color: #666;
        margin-bottom: 15px;
    }
        
    </style>

    <script src="{{ asset('/js/jquery.min.js')}}"></script>
    <script src="{{ asset('/js/jquery-ui.js')}}"></script>
    <script src="{{ asset('/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('/js/holder.js')}}"></script>
</head>

<body style="background-image: linear-gradient(to bottom, rgb(96,108,136) 0%,rgb(63,76,107) 100%);
    height: 100%; margin: 0; background-repeat: no-repeat; background-attachment: fixed;">

    <nav class="navbar navbar-findcond navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand navbar-right" href="{{ url('/home') }}">
                    <div class="row">
                        <img style="margin-top: -5px; margin-left: 10px; max-height: 40px; max-width: 30px;" src="{{asset('vendor/default.png')}}"> simd@<strong>Integrated</strong> 
                        :: {{Session::get('xPemda')}} 
                        @if ( Session::get('AppType') == 0 )
                                (Aplikasi Provinsi)
                        @endif 
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

    <div class="container-fluid" style="padding: 50px;">
    <div id="pesan"></div>
    
    <div class="container text-center">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h2 style="font-size: 60px;line-height: 60px;margin-bottom: 20px;font-weight: 900;color:#fff;">simd<span style="color:#DF7401;">@</span><strong>Integrated</strong></h2>
                <p style="font-size: 20px; color:#fff;">Dihadirkan sebagai alat bantu untuk menyelaraskan perencanaan jangka menengah, jangka pendek, hingga ke penganggaran.
                    <br> Dengan aplikasi ini dapat dijaga keterkaitan dan dukungan antara penganggaran, perencanaan tahunan hingga ke perencanaan lima tahunan.</p>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
            <div class="our-services-wrapper mb-60">
                <a href="{{ url('/asb/dash') }}" style="text-decoration:none;">
                <div class="services-inner"  style="background:#eee">
                    <div class="our-services-img">
                        <img src="{{'./assets/images/marketing_1.png'}}" width="68px" alt="">
                    </div>
                    <div class="our-services-text">                            
                        <h4>ASB dan SSH</h4>
                        <p><span style="color:#DF7401"><strong> Analisis Standar Belanja</strong></span> dan <span style="color:#DF7401"><strong>Standar Satuan Harga</strong></span> 
                            sebagai jembatan untuk menghubungkan antara proses perencanaan dengan proses penganggaran. </p>
                    </div>
                </div>
                </a>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
            <div class="our-services-wrapper mb-60">
                <a href="{{ url('/rpjmd/dash') }}" style="text-decoration:none;">
                    <div class="services-inner"  style="background:#eee">
                        <div class="our-services-img">
                            <img src="{{'./assets/images/marketing.png'}}" width="68px" alt="">
                        </div>
                        <div class="our-services-text">
                            <h4>RPJMD & Renstra</h4>
                            <p>Perencanaan lima tahunan (<span style="color:#1273EB"><strong>RPJMD</strong></span> dan 
                                <span style="color:#1273EB"><strong>Renstra</strong></span>) sebagai penjabaran <span style="color:#1273EB"><strong>visi-misi Kepala Daerah</strong></span>.</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>    
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
            <div class="our-services-wrapper mb-60">
                <a href="{{ url('/rkpd/dash') }}" style="text-decoration:none;">
                    <div class="services-inner"  style="background:#eee">
                        <div class="our-services-img">
                            <img src="{{'./assets/images/marketing-strategy.png'}}" width="68px" alt="">
                        </div>
                        <div class="our-services-text">
                            <h4>RKPD & Renja</h4>
                            <p>Perencanaan tahunan (<span style="color:#00AF80"><strong>RKPD</strong></span> dan <span style="color:#00AF80"><strong>Renja</strong></span>) sebagai operasionalisasi dari perencanaan jangka menengah. </p>
                        </div>
                    </div>
                </a>
            </div>
        </div>    
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
            <div class="our-services-wrapper mb-60">
                <a href="{{ url('/modul3') }}" style="text-decoration:none;">
                    <div class="services-inner"  style="background:#eee;">
                        <div class="our-services-img">
                            <img src="{{'./assets/images/seo.png'}}" width="68px" alt="">
                        </div>
                        <div class="our-services-text">
                            <h4>Anggaran</h4>
                            <p>Rencana kerja tahunan (<span style="color:#0E203A"><strong>PPAS</strong></span> dan <span style="color:#0E203A"><strong>
                                Pra-RKA</strong></span>) sebagai dasar penyusunan anggaran yang pelaksanaannya akan dikelola melalui <strong>Simda Keuangan</strong>. </p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
            <div class="our-services-wrapper mb-60">
                <a href="{{ url('/kin') }}" style="text-decoration:none;">
                    <div class="services-inner"  style="background:#eee">
                        <div class="our-services-img">
                            <img src="{{'./assets/images/web-analytics.png'}}" width="68px" alt="">
                        </div>
                        <div class="our-services-text">
                            <h4>S A K I P</h4>
                            <p>Instrumen untuk mengukur kewajaran antara beban kerja dan belanja dan sebuah aktifitas atau kegiatan </p>
                        </div>
                    </div>
                </a>
            </div> 
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
                        <i class="fa fa-cog fa-spin fa-fw fa-lg"></i> simd@<strong>Perencanaan</strong> <i class="fa fa-caret-up fa-fw fa-lg"></i>
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
                    <input id="txt_name" type="text" class="form-control" name="txt_name" required autofocus data-toggle="popover" data-html="true" data-container="body" title="User dan Group User" data-trigger="hover" data-content="Nama untuk ditampilkan di header setelah login, dapat dilakukan pergantian nama">
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
                        <input id="email" type="email" class="form-control" name="email" data-toggle="popover" data-html="true" data-container="body" title="User dan Group User" data-trigger="hover" data-content="Digunakan untuk login.<br>Tidak dapat diganti." disabled>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
            </div>
            <div id="divPassword" class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-3 control-label">Password Baru</label>
                    <div class="col-md-4">
                        <input id="password" type="password" class="form-control" name="password" required data-toggle="popover" data-html="true" data-container="body" title="User dan Group User" data-trigger="hover" data-content="Masukkan Password Baru">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-md-4">
                      <div class="input-group">
                        <input id="password_confirmation" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' has-error' : '' }}" name="password_confirmation" required data-toggle="popover" data-html="true" data-container="body" title="User dan Group User" data-trigger="hover" data-content="Masukkan Kembali Password Baru, harus sama dengan sebelumnya sebagai konfirmasi">
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

    

function createPesan(message, type) {
    var html = '<div id="pesanx" class="alert alert-' + type + ' alert-dismissable flyover flyover-bottom in">';    
    html += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';   
    html += '<p><strong>'+message+'</strong></p>';
    html += '</div>';    
    $(html).hide().prependTo('#pesan').slideDown();

    setTimeout(function() {
        $('#pesanx').removeClass('in');
         }, 3500);
  };

$('.page-alert .close').click(function(e) {
        e.preventDefault();
        $(this).closest('.page-alert').slideUp();
    });

$('[data-toggle="popover"]').popover();  

$('#myCarousel').carousel({
    interval:   3500
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
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './putTahunSetting',
        data: {
              '_token': $('input[name=_token]').val(),
              'tahun_rencana' : $('#id_tahun').val(),
          },
        success: function(data) {
            // location.reload(true);
        }
      });
});

$("#btn_ganti").click(function() { 
    $.ajax({
          type: "GET",
          url: 'getUser',
          dataType: "json",
          success: function(data) {
            $('.btnUser').removeClass('edit');
            $('.btnUser').removeClass('add');
            $('.btnUser').addClass('gantiPass');
            $('#txt_name').val(data[0].name);
            $('#email').val(data[0].email);
            $('#password').val(null);
            $('#password_confirmation').val(null);
            $('.form-horizontal').show();
            $('#ModalUser').modal('show');   
          }
      });      
});

$("#showPass").click(function() 
         {
            if ($(this).data('val') == "1") 
            {
               $("#password").prop('type','text');
               $("#password_confirmation").prop('type','text');
               $("#eye").attr("class","fa fa-eye-slash fa-fw fa-lg");
               $(this).data('val','0');
            }
            else
            {
               $("#password").prop('type', 'password');
               $("#password_confirmation").prop('type', 'password');
               $("#eye").attr("class","fa fa-eye fa-fw fa-lg");
               $(this).data('val','1');
            }
         });

$('.modal-footer').on('click', '.gantiPass', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: 'gantiPass',
        data: {
            '_token': $('input[name=_token]').val(),
            'password' : $('#password').val(),
            'password_confirmation' : $('#password_confirmation').val(),
            'nama' : $('#txt_name').val(),
        },
        success: function(data) {
              if(data.status_pesan==1){
                alert(data.pesan);
              } else {
                alert(data.pesan); 
              }
        },
  });
});

</script>
</html>
