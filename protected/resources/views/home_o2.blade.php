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
    .xCss {
      width: 15%;
      height: 70px;
      cursor: pointer;
      margin: 0 auto;
      font: normal 16px/50px "Domine Font Family", Helvetica, sans-serif;
      color: rgb(255, 255, 255);
      text-align: center;
      -o-text-overflow: clip;
      text-overflow: clip;
    }

    .btn span{
        position: relative;
        /*margin-top: 15px;
        left: -15px;*/
        /*float: left;*/
    }

    .bd-green{
        border: 1px solid #f4ffba;
        color:#0E203A;
        background:#f4ffba;
    }
    .btn.bd-green:hover,
    .btn.bd-green:focus{
        color:#E8FFFF;
        /*border-radius: 15px;*/
        /* background:#f4ffba;  */
    }
    .bd-blue{
        border: 1px solid #86D3FF;
        color:#0E203A;
        background:#86D3FF;
    }
    .btn.bd-blue:hover,
    .btn.bd-blue:focus{
        color:#E8FFFF;
        /*border-radius: 15px;*/
    }
    .bd-orange{
        border: 1px solid #df7401;
        color:#0E203A;
        background:#df7401;
    }
    .btn.bd-orange:hover,
    .btn.bd-orange:focus{
        color:#E8FFFF;
        /*border-radius: 15px;*/
    }

    .bd-red{
        border: 1px solid #cb2027;
        color:#0E203A;
        background:#cb2027;
    }
    .btn.bd-red:hover,
    .btn.bd-red:focus{
        color:#E8FFFF;
        /*border-radius: 15px;*/
    }

    .bd-purple{
        border: 1px solid #96FF86;
        color:#0E203A;        
        background:#96FF86;
    }
    .btn.bd-purple:hover,
    .btn.bd-purple:focus{
        color:#E8FFFF;
        /*border-radius: 15px;*/
    }

    .icons {
      font-size: 4.5rem;
    }

    .icons:hover {
        font-size: 7rem;
        color:#8e44ad;        
        cursor: pointer;
    }

    @media only screen and (max-width: 767px) {
    .btn{
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
                        <img style="margin-top: -5px; margin-left: 10px; max-height: 40px; max-width: 30px;" src="{{asset('vendor/default.png')}}"> simd@<strong>Perencanaan</strong> 
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
    
    <div class="row">
        <div class="row" style="align-items: center; display: flex; justify-content: center; margin-top: 25px">
            <a class="btn xCss bd-orange" role="button" href="{{ url('/asb/dash') }}"><span class="fa fa-braille "></span> ASB dan SSH</a>
            <a class="btn xCss bd-blue" role="button" href="{{ url('/rpjmd/dash') }}"><span class="fa fa-newspaper-o "></span> RPJMD & Renstra</a>
            <a class="btn xCss bd-purple" role="button" href="{{ url('/rkpd/dash') }}"><span class="fa fa-calendar-check-o "></span> RKPD & Renja</a>
            <a class="btn xCss bd-green" role="button" href="{{ url('/modul3') }}"><span class="fa fa-money "></span> PPAS</a>
            <a class="btn xCss bd-red" role="button" href="{{ url('/kin') }}"><span class="fa fa-folder-open-o "></span> S A K I P</a> 
        </div>
    </div>
    <hr>
    <div class="row" style="color:#fff;">
          <div class="jumbotron col-md-12" style="background-color: transparent;">
            <h1 id="the-centos-project" style="color:#fff;">simd<span style="color:#CB2027; text-shadow: 2px 2px red;">@</span><strong>Perencanaan</strong></h1>
            <br>
            <p>Dihadirkan sebagai alat bantu untuk menyelaraskan perencanaan jangka menengah, jangka pendek, hingga ke penganggaran.<br> Dengan aplikasi ini dapat dijaga keterkaitan dan dukungan antara penganggaran, perencanaan tahunan hingga ke perencanaan lima tahunan.</p>
            </p>
            <p><span class="fa fa-braille" style="color:#FEFF49"></span><span style="color:#DF7401"><strong> Analisis Standar Belanja</strong></span> dan <span style="color:#DF7401"><strong>Standar Satuan Harga</strong></span> sebagai jembatan untuk menghubungkan antara proses perencanaan dengan proses penganggaran.</p>
            <p><span class="fa fa-newspaper-o " style="color:#86D3FF"></span> Perencanaan lima tahunan (<span style="color:#86D3FF"><strong>RPJMD</strong></span> dan <span style="color:#86D3FF"><strong>Renstra</strong></span>) sebagai penjabaran <span style="color:#86D3FF"><strong>visi-misi Kepala Daerah</strong></span>.</p>
            <p><span class="fa fa-calendar-check-o " style="color:#96FF86"></span> Perencanaan tahunan (<span style="color:#96FF86"><strong>RKPD</strong></span> dan <span style="color:#96FF86"><strong>Renja</strong></span>) sebagai operasionalisasi dari perencanaan jangka menengah.</p>
            <p><span class="fa fa-money " style="color:#F4FFBA"></span> Rencana kerja tahunan (<span style="color:#F4FFBA"><strong>PPAS</strong></span> dan <span style="color:#F4FFBA"><strong>Pra-RKA</strong></span>) sebagai dasar penyusunan anggaran yang pelaksanaannya akan dikelola melalui <strong>Simda Keuangan</strong>.</p>
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
    sessionStorage.setItem("tahun",$('#id_tahun').val());
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
