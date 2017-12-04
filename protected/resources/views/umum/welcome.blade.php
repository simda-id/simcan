<?php
// use App\CekAkses;
// use hoaaah\LaravelMenu\Menu;
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
    <link href="{{ asset('css/font-awesome.min.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet"> 
    {{-- <link href="{{ asset('css/sb-admin-2.css')}}" rel="stylesheet"> --}}

    <style>
    nav.navbar-well { background: #269abc; border-color: #ccc; box-shadow: 0 0 2px 0 #ccc; }
    nav.navbar-well a { color: #fff; }
    nav.navbar-well ul.navbar-nav a { color: #fff; border-style: solid; border-width: 0 0 2px 0; border-color: #fff; }
    nav.navbar-well ul.navbar-nav a:hover,
    nav.navbar-well ul.navbar-nav a:visited,
    nav.navbar-well ul.navbar-nav a:focus,
    nav.navbar-well ul.navbar-nav a:active { background: #fff;}
    nav.navbar-well ul.navbar-nav a:hover { border-color: #fff; color: #269abc }
    nav.navbar-well li.divider { background: #ccc; }
    nav.navbar-well button.navbar-toggle { background: #fff; border-radius: 2px; }
    nav.navbar-well button.navbar-toggle:hover { background: #999; color: #269abc}
    nav.navbar-well button.navbar-toggle > span.icon-bar { background: #fff; }
    nav.navbar-well ul.dropdown-menu { border: 0; background: #fff; border-radius: 4px; margin: 4px 0; box-shadow: 0 0 4px 0 #ccc; }
    nav.navbar-well ul.dropdown-menu > li > a { color: #444; }
    nav.navbar-well ul.dropdown-menu > li > a:hover { background: #fff; color: #269abc; }
    nav.navbar-well span.badge { background: #fff; font-weight: normal; font-size: 11px; margin: 0 4px; color: #269abc }

      .box {
          border-radius: 3px;
          /*box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);*/
          padding: 10px 25px;
          text-align: right;
          display: block;
          margin-top: 60px;
      }
      .box-icon {
          /*background-color: #57a544;*/
          border: 2px solid #57a544;
          border-radius: 50%;
          display: table;
          height: 150px;
          margin: 0 auto;
          width: 150px;
          margin-top: -61px;
      }
      .box-icon span {
          color: #fff;
          display: table-cell;
          text-align: center;
          vertical-align: middle;
      }
      .info h4 {
          font-size: 26px;
          letter-spacing: 2px;
          text-transform: uppercase;
      }
      .info > p {
          color: #717171;
          font-size: 16px;
          padding-top: 10px;
          text-align: center;
      }
      .info > a {
          background-color: #03a9f4;
          border-radius: 2px;
          box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
          color: #fff;
          transition: all 0.5s ease 0s;
      }
      .info > a:hover {
          background-color: #0288d1;
          box-shadow: 0 2px 3px 0 rgba(0, 0, 0, 0.16), 0 2px 5px 0 rgba(0, 0, 0, 0.12);
          color: #fff;
          transition: all 0.5s ease 0s;
      }
    </style>

    <script src="{{ asset('/js/jquery.min.js')}}"></script>
    <script src="{{ asset('/js/jquery-ui.js')}}"></script>
    <script src="{{ asset('/js/bootstrap.min.js')}}"></script>

    

</head>

<body>
    <nav class="navbar navbar-well navbar-static-top" role="navigation" style="margin-bottom: 0">
      <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand navbar-right" href="{{ url('/') }}">
          <div class="row">
            <img style="max-width:50px; margin-top: -7px;" src="{{asset('vendor/default.png')}}"> simd@<strong>Perencanaan</strong> <span class="badge"> ver 1.0 </span>
          </div>
        
        </a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        @if (Auth::guest())
          <li class="active"><a href="{{ route('login') }}" role="button" >Login <span class="sr-only">(current)</span></a></li>
        @else
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
    </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
            <div class="col-sm-12 col-sm-12 col-sm-12 col-sm-12">
                <div class="box">
                    <div id="iPemda">
                        <img id="profile-img" class="box-icon" src="{{ asset('vendor/default.png') }}" />
                        {{-- {{$iPemda}} --}}
                    </div>
                    <div class="info">
                      @foreach($trxVisi as $dataVisi)
                        <h4 class="text-center">PEMERINTAH {{$rPemda}}</h4>
                        <h4 class="text-center">Periode : {{$dataVisi->tahun_1}} s/d {{$dataVisi->tahun_5}}</h4>                        
                        <p class="text-center">{{$dataVisi->uraian_visi_rpjmd}}</p>
                      @endforeach
                    </div>
                </div>
            </div>
      </div>
    <br>

    <table id="tblRincianRpjmd" class="table table-inverse table-bordered table-responsive">
      <thead class="alert-info">
          <tr>
              <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
              <th width="20%" style="text-align: center; vertical-align:middle">Misi</th>
              <th width="20%" style="text-align: center; vertical-align:middle">Tujuan</th>
              <th width="25%" style="text-align: center; vertical-align:middle">Sasaran</th>
              <th width="30%" style="text-align: center; vertical-align:middle">Program</th>
          </tr>
      </thead>
      <tbody>
        @foreach($trxRpjmd as $data)
          <tr>
              <td width="5%" style="text-align: center">{{$data->no_misi}}</td>
              <td width="20%" style="text-align: left">{{$data->uraian_misi_rpjmd}}</td>
              <td width="20%" style="text-align: left">{{$data->uraian_tujuan_rpjmd}}</td>
              <td width="25%" style="text-align: left">{{$data->uraian_sasaran_rpjmd}}</td>
              <td width="30%" style="text-align: left">{{$data->uraian_program_rpjmd}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>

    </div>
    <hr>
      <footer style="text-align: center;">
        <p>&copy; <strong>Badan Pengawasan Keuangan dan Pembangunan - 2017</strong></p>
      </footer>
</body>


<script src="{{ asset('/js/jquery.rowspanizer.js')}}"></script>
<script>
$(document).ready( function() {
  $("#tblRincianRpjmd").rowspanizer({vertical_align: 'top'});
});
</script>



</html>
