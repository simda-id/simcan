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
    <link href="{{ asset('css/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/metisMenu/metisMenu.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.css')}}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.bootstrap.css') }}" rel="stylesheet">
    
    @yield('head')
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
                    <?php
                            $akses = new CekAkses();
                            $menu = new Menu();
                            $menu->render([
                                'options' => [
                                    'ulId' => 'side-menu'
                                ],
                                'items' => [
                                    // ['label' => 'Dashboard', 'icon' => 'fa fa-home', 'url' => '/modul0'],
                                    [
                                        'label' => 'Standard Satuan Harga', 
                                        'visible' => $akses->get(801)||$akses->get(802)||$akses->get(803)||$akses->get(807),
                                        'items' => [
                                            ['label' => 'Zona SSH','url' => '/zonassh', 'visible' => $akses->get(801)],
                                            ['label' => 'Struktur SSH', 'url' => '/ssh', 'visible' => $akses->get(802)],
                                            ['label' => 'Perkada SSH', 'url' => '/sshperkada/perkada','visible' => $akses->get(803)],
                                            // ['label' => 'Pencetakan SSH','visible' => $akses->get(807)],
                                        ]
                                    ],                                    
                                    [
                                        'label' => 'Analisa Standar Belanja', 
                                        'visible' => $akses->get(804)||$akses->get(805)||$akses->get(806)||$akses->get(808),
                                        'items' => [
                                            // ['label' => 'Komponen ASB','url' => '/asb/komponen','visible' => $akses->get(804)],
                                            ['label' => 'Perkada & Struktur ASB','url' => '/asb/aktivitas','visible' => $akses->get(805)],
                                            ['label' => 'Perhitungan ASB','url' => '/asb/hitungasb','visible' => $akses->get(806)],
                                            // ['label' => 'Pencetakan ASB','visible' => $akses->get(808)],
                                        ]
                                    ],                                     
                                    // [
                                    //     'label' => 'Parameter',
                                    //     'items' => [
                                    //         ['label' => 'Pemda', 'url' => '/','visible' => $akses->get(101)],
                                    //         ['label' => 'Kecamatan-Desa', 'url' => '/','visible' => $akses->get(102)],
                                    //         ['label' => 'Unit Organisasi', 'url' => '/','visible' => $akses->get(103)],
                                    //         ['label' => 'Urusan Bidang', 'url' => '/','visible' => $akses->get(104)],
                                    //         ['label' => 'Rekening Anggaran', 'url' => '/','visible' => $akses->get(105)],
                                    //         ['label' => 'Program Kegiatan SKPD', 'url' => '/','visible' => $akses->get(106)],
                                    //         ['label' => 'Lokasi Non-Wilayah', 'url' => '/','visible' => $akses->get(107)],
                                    //         ['label' => 'Satuan Indikator', 'url' => '/','visible' => $akses->get(108)],
                                    //         ['label' => 'Setting Aplikasi', 'url' => '/','visible' => $akses->get(109)],
                                    //         ['label' => 'User dan Group', 'url' => '/admin/parameter/user','visible' => $akses->get(110)],
                                    //     ]
                                    // ],
                                ]
                            ]);
                        ?>
                        
                        </div>
        </nav>

        <div id="page-wrapper">
            <br>
            @yield('content')
        </div>

    </div>

        <script type="text/javascript" src="{{ asset('/js/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('/js/jquery-ui.js')}}"></script>
        <script type="text/javascript" src="{{ asset('/js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/js/dataTables.bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/js/dataTables.checkboxes.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('vendor/metisMenu/metisMenu.min.js')}}"></script>        
        <script type="text/javascript" src="{{ asset('/js/jquery.number.js')}}"></script>
        <script type="text/javascript" src="{{ asset('/js/sb-admin-2.js')}}"></script>


        @yield('scripts')

</body>
</html>
