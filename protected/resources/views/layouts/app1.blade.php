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
    <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/metisMenu/metisMenu.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.css')}}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.fontAwesome.css') }}" rel="stylesheet">
    
    @yield('css')

    <style>
        h1.padding {
        padding-right: 1cm;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; background: #0E203A; border-color: #ccc; color:#fff;">
            {{-- <div class="container"> --}}
                <div class="navbar-header" style="color: #fff;">
                    <!-- Branding Image -->
                    <a class="navbar-brand navbar-right" href="{{ url('/home') }}" style="margin-top: -5px; margin-left: 10px; max-height: 40px;">
                    <span class="fa-stack">
                      <i class="fa fa-square-o fa-stack-2x text-info"></i>
                      <i class="fa fa-home fa-stack-1x" style="color:#fff"></i>
                    </span><span style="color:#fff"> simd@<strong>Perencanaan</strong> ver <strong>1.0 </strong></span>
                    </a>
                </div>

                    <ul class="nav navbar-top-links pull-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li class="dropdown" style="color:#fff">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="color:#fff">
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
                        <span style="color:#fff">
                            <i class="fa fa-flag fa-fw"></i> Tahun Anggaran: <?= Session::get('tahun') != NULL ? Session::get('tahun') : 'Pilih!' ?></i>
                        </span>
                            <li class="dropdown" style="color:#fff">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="color:#fff">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu dropdown-user" role="menu">
                                    <li>
                                        <a href="{{ url('/home') }}"><i class="fa fa-home fa-fw text-info"></i> Home</a>
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

                   <div class="navbar-default sidebar" role="navigation">
                     <?php
                            $akses = new CekAkses();
                            $menu = new Menu();
                            $menu->render([
                                'options' => [
                                    'ulId' => 'side-menu'
                                ],
                                'items' => [
                                    ['label' => 'Modul RPJMD dan Renstra', 'icon'=>'fa fa-newspaper-o fa-fw fa-lg','url' => '/rpjmd/dash'],
                                    [
                                        'label' => 'Pra RPJMD',
                                        'visible' => $akses->get(20),
                                        'items' => [ 
                                            ['label' => 'Analisa Capaian IKK', 'icon' => 'fa fa-blind fa-fw','url' => '/amh','visible' => $akses->get(101)],                       
                                            ['label' => 'Identifikasi Masalah', 'icon' => 'fa fa-desktop fa-fw', 'url' => '/pdrb','visible' => $akses->get(101)],
                                            ['label' => 'Identifikasi Prioritas', 'icon' => 'fa fa-newspaper-o fa-fw','url' => '/prarpjmd/prioritas','visible' => $akses->get(101)],
                                        ],  
                                        // 'items' => [                        
                                        //     ['label' => 'PDRB Harga Konstan', 'icon' => 'fa fa-desktop fa-fw', 'url' => '/pdrb','visible' => $akses->get(101)],
                                        //     ['label' => 'PDRB Harga Berlaku', 'icon' => 'fa fa-newspaper-o fa-fw','url' => '/pdrbhb','visible' => $akses->get(101)],
                                        //     ['label' => 'Angka Melek Huruf', 'icon' => 'fa fa-blind fa-fw','url' => '/amh','visible' => $akses->get(101)],
                                        //     ['label' => 'Rata Lama Sekolah', 'icon' => 'fa fa-hourglass-o fa-fw','url' => '/ratalamasekolah','visible' => $akses->get(101)],
                                        //     ['label' => 'Angka Partisipasi Sekolah', 'icon' => 'fa fa-snowflake-o fa-fw','url' => '/aps','visible' => $akses->get(101)],
                                        //     ['label' => 'Rasio Guru dan Murid', 'icon' => 'fa fa-users fa-fw','url' => '/gurumurid','visible' => $akses->get(101)],
                                        //     ['label' => 'Ketersediaan Sekolah', 'icon' => 'fa fa-building-o fa-fw','url' => '/kts','visible' => $akses->get(101)],
                                        //     ['label' => 'Kesenian, Budaya & Olahraga', 'icon' => 'fa fa-bank fa-fw','url' => '/senior','visible' => $akses->get(101)],
                                        //     ['label' => 'Investor PMDN/PMA', 'icon' => 'fa fa-suitcase fa-fw','url' => '/investor','visible' => $akses->get(101)],
                                        //     ['label' => 'Investasi PMDN/PMA', 'icon' => 'fa fa-money fa-fw','url' => '/investasi','visible' => $akses->get(101)], 
                                        // ]         
                                    ],
                                    [
                                        'label' => 'RPJMD',
                                        'visible' => $akses->get(20),
                                        'items' => [
                                            ['label' => 'RPJMD Teknokratik', 'url' => '/rpjmd/rancangan', 'visible' => $akses->get(20)],
                                            ['label' => 'RPJMD Rancangan Awal', 'url' => '/rpjmd/rancangan', 'visible' => $akses->get(20)],
                                            ['label' => 'RPJMD Rancangan', 'url' => '/rpjmd/rancangan', 'visible' => $akses->get(20)],
                                            ['label' => 'RPJMD Musrenbang', 'url' => '/rpjmd/rancangan', 'visible' => $akses->get(20)],
                                            ['label' => 'RPJMD Rancangan Akhir', 'url' => '/rpjmd/rancangan', 'visible' => $akses->get(20)],
                                            ['label' => 'RPJMD Final', 'url' => '/rpjmd', 'visible' => $akses->get(20)],
                                        ]
                                    ],                                    
                                    [
                                        'label' => 'Renstra Perangkat Daerah',
                                        'visible' => $akses->get(30),
                                        'items' => [
                                            ['label' => 'Renstra Rancangan Awal', 'url' => '/renstra', 'visible' => $akses->get(30)],
                                            ['label' => 'Renstra Rancangan', 'url' => '/renstra', 'visible' => $akses->get(30)],
                                            ['label' => 'Renstra Rancangan Akhir', 'url' => '/renstra', 'visible' => $akses->get(30)],
                                            ['label' => 'Renstra Final', 'url' => '/renstra', 'visible' => $akses->get(30)],
                                        ]
                                    ],
                                    [
                                        'label' => 'Indikator Kinerja',
                                        'visible' => $akses->get(20),
                                        'items' => [
                                            ['label' => 'Usulan Indikator', 'url' => '/admin/parameter/indikator','visible' => $akses->get(108)],
                                            ['label' => 'Indikator Kinerja', 'url' => '/admin/parameter/indikator','visible' => $akses->get(108)],
                                            [ 'label' => 'Verifikasi Indikator', 'visible' => $akses->get(20), 
                                            'items' => [
                                                    [
                                                        'label' => 'Tim SAKIP',
                                                        'visible' => $akses->get(20),
                                                        'url' => '',
                                                    ],
                                                    [
                                                        'label' => 'Internal Control',
                                                        'visible' => $akses->get(20),
                                                        'url' => '',
                                                    ],
                                                ]
                                            ],
                                        ]
                                    ],
                                    [
                                        'label' => 'Pencetakan RPJMD & Renstra',
                                        'visible' => $akses->get(30) || $akses->get(20),
                                        'items' => [
                                            ['label' => 'Cetak RPJMD', 'url' => '/cetak/rpjmd', 'visible' => $akses->get(20)],
                                            ['label' => 'Cetak Renstra', 'url' => '/cetak/renstra', 'visible' => $akses->get(30)],
                                        ]
                                    ],
                                ]
                            ]);
                        ?>   

                    </div>
        </nav>

        <div id="page-wrapper" style="background-image: linear-gradient(to bottom, rgb(96,108,136) 0%,rgb(63,76,107) 100%);
        background-repeat: no-repeat; background-attachment: fixed;">
            <br>
            @yield('content')
        </div>

    </div>

        <script src="{{ asset('/js/jquery.min.js')}}"></script>
        <script src="{{ asset('/js/jquery-ui.js')}}"></script>
        <script src="{{ asset('/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('/js/handlebars.js')}}"></script>
        <script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('/js/dataTables.bootstrap.min.js') }}"></script>
        <script src="{{ asset('/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('/js/dataTables.checkboxes.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/js/input.js')}}"></script>
        <script src="{{ asset('/js/jquery.number.js')}}"></script>
        <script src="{{ asset('vendor/metisMenu/metisMenu.min.js')}}"></script>
        <script src="{{ asset('/js/sb-admin-2.js')}}"></script>


        @yield('scripts')

</body>
</html>
