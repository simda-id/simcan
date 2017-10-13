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
    <link href="{{ asset('css/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/metisMenu/metisMenu.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.css')}}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.bootstrap.css') }}" rel="stylesheet">
    <style>
        h1.padding {
        padding-right: 1cm;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            {{-- <div class="container"> --}}
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button> 
                                    <!-- Branding Image -->
                    <a class="navbar-brand navbar-right" href="{{ url('/home') }}">simd@<strong>Perencanaan</strong> ver <strong>1.0 </strong></a>
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

                   <div class="navbar-default sidebar" role="navigation">
                        <div class="sidebar-nav navbar-collapse">
                            <ul class="nav" id="side-menu">
                                @if (Auth::guest())
                                {{-- <li><a href="{{ url('/')}}">Dashboard</a></li> --}}
                                @else
                                <li><a href="{{ url('/ppas/loadData')}}"> Load Data RKPD</a></li>
                                <li><a href="{{ url('/ppas')}}"> Penyusunan PPAS</a></li>
                                {{-- <li>
                                    <a href="#">Parameter </a>
                                    <ul class="nav nav-second-level">
                                        <li><a href="{{ url('/') }}">Pemda</a></li>
                                        <li><a href="{{ url('/admin/parameter/user') }}">User dan Group</a></li>
                                        <li><a href="{{ url('/') }}">Kecamatan-Desa</a></li>
                                        <li><a href="{{ url('/') }}">Unit Organisasi</a></li>
                                        <li><a href="{{ url('/') }}">Urasan Bidang Pemerintahan</a></li>
                                        <li><a href="{{ url('/') }}">Rekening Anggaran</a></li>
                                        <li><a href="{{ url('/') }}">Program Kegiatan SKPD</a></li>
                                        <li><a href="{{ url('/') }}">Lokasi Non Kewilayahan</a></li>
                                        <li><a href="{{ url('/') }}">Satuan Indikator</a></li>
                                        <li><a href="{{ url('/') }}">Setting Aplikasi</a></li>
                                    </ul>
                                </li> --}}
                                @endif
                            </ul>
                        </div>
                    </div>
        </nav>

        {{-- <h1 style="text-align:right; color:white; font-family:verdana" class="padding"><strong>KOTA SIMULASI </strong></h1>
        <h1 style="text-align:right; color:white; font-family:verdana" class="padding"><strong>TAHUN 2017 </strong></h1> --}}

        <div id="page-wrapper">
            <br>
            @yield('content')
        </div>

    </div>

        <script src="{{ asset('/js/jquery.min.js')}}"></script>
        <script src="{{ asset('/js/jquery-ui.js')}}"></script>
        <script src="{{ asset('/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('/js/dataTables.bootstrap.min.js') }}"></script>
        <script src="{{ asset('/js/jquery.number.js')}}"></script>
        <script src="{{ asset('vendor/metisMenu/metisMenu.min.js')}}"></script>
        <script src="{{ asset('/js/sb-admin-2.js')}}"></script>


        @yield('scripts')

</body>
</html>
