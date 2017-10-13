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
    
    {{-- <script src="https://use.fontawesome.com/1417cae13b.js"></script> --}}

    {{-- <link rel="stylesheet" href="https://use.fontawesome.com/1417cae13b.css"> --}}
    <link href="{{ asset('css/font-awesome.min.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/metisMenu/metisMenu.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.css')}}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.fontAwesome.css') }}" rel="stylesheet">
    
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
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>                    
                    <!-- Branding Image -->
                    <a class="navbar-brand navbar-right" href="{{ url('/home') }}">simd@<strong>Perencanaan</strong> ver <strong>1.0</strong></a>
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

                   <div class="navbar-default sidebar" role="navigation">
                        <?php
                            $akses = new CekAkses();
                            $menu = new Menu();
                            $menu->render([
                                'options' => [
                                    'ulId' => 'side-menu'
                                ],
                                'items' => [
                                    ['label' => 'Dashboard', 'icon' => 'fa fa-home', 'url' => '/modul2'],
                                    [
                                        'label' => 'RKPD', 
                                        'visible' => $akses->get(4),
                                        'items' => [
                                            [
                                                'label' => 'Rancangan Awal RKPD',
                                                'visible' => $akses->get(401) || $akses->get(402),
                                                'items' => [
                                                    ['label' => 'Load Data Tahunan RPJMD', 'url' => '/ranwalrkpd/loadData', 'visible' => $akses->get(401)],
                                                    ['label' => 'Rancangan Awal RKPD', 'url' => '/ranwalrkpd', 'visible' => $akses->get(402)],
                                                ]
                                            ],
                                            [
                                                'label' => 'Rancangan RKPD',
                                                'visible' => $akses->get(403) || $akses->get(404),
                                                'items' => [
                                                    ['label' => 'Load Forum SKPD', 'url' => '/rancanganrkpd/loadData', 'visible' => $akses->get(403)],
                                                    ['label' => 'Rancangan RKPD', 'url' => '/rancanganrkpd', 'visible' => $akses->get(404)],
                                                ]
                                            ],
                                            [
                                                'label' => 'Rancangan Akhir RKPD',
                                                'visible' => $akses->get(405) || $akses->get(406),
                                                'items' => [
                                                    ['label' => 'Load Musrenbang RKPD', 'url' => '/ranhirrkpd/loadData', 'visible' => $akses->get(405)],
                                                    ['label' => 'Rancangan Akhir RKPD', 'url' => '/ranhirrkpd', 'visible' => $akses->get(406)],
                                                ]
                                            ],
                                            [
                                                'label' => 'RKPD Final',
                                                'visible' => $akses->get(408) || $akses->get(407),
                                                'items' => [
                                                    ['label' => 'Load Ranhir RKPD', 'url' => '/rkpd/loadData', 'visible' => $akses->get(407)],
                                                    ['label' => 'RKPD Final', 'url' => '/rkpd', 'visible' => $akses->get(408)],
                                                ]
                                            ],
                                        ]
                                    ],                                    
                                    [
                                        'label' => 'Renja Perangkat Daerah',
                                        'visible' => $akses->get(5),
                                        'items' => [
                                            ['label' => 'Load Data Rancangan Awal Renja', 'url' => '/renja/loadData', 'visible' => $akses->get(501)],
                                            [
                                                'label' => 'Rancangan Awal Renja',
                                                'visible' => $akses->get(5),
                                                'items' => [
                                                    ['label' => 'Penyesuaian Program Renja', 'url' => '/renja/sesuai', 'visible' => $akses->get(502)],
                                                    ['label' => 'Rancangan Awal Renja', 'url' => '/renja', 'visible' => $akses->get(502)],
                                                ]
                                            ],
                                            ['label' => 'Renja Final', 'url' => '/renjafinal', 'visible' => $akses->get(504)],
                                        ]
                                    ],
                                    ['label' => 'Pokok Pikiran DPRD', 'url' => '/pokir', 'visible' => $akses->get(503)],
                                    [ 'label' => 'Forum Perangkat Daerah', 'visible' => $akses->get(606) || $akses->get(607),
                                       'items' => [
                                            ['label' => 'Load Rancangan Awal', 'url' => '/forumskpd/loadData', 'visible' => $akses->get(606)],
                                            ['label' => 'Forum Perangkat Daerah', 'url' => '/forumskpd', 'visible' => $akses->get(607)],
                                        ]
                                    ],
                                    [
                                        'label' => 'Musrenbang RKPD', 
                                        'visible' => $akses->get(6),
                                        'items' => [
                                            [
                                                'label' => 'Kecamatan',
                                                'visible' => $akses->get(601) || $akses->get(602) || $akses->get(604) || $akses->get(605),
                                                'items' => [
                                                    ['label' => 'Usulan RW', 'url' => '/musrenrw', 'visible' =>  $akses->get(601)],
                                                    ['label' => 'Usulan Desa', 'url' => '/musrendes', 'visible' => $akses->get(603)],
                                                    // ['label' => 'Posting Usulan Desa', 'url' => '/musrendes/loadData', 'visible' => $akses->get(602)],
                                                    ['label' => 'Load Usulan Desa', 'url' => '/musrencam/loadData', 'visible' => $akses->get(604)],
                                                    ['label' => 'Musrenbang', 'url' => '/musrencam', 'visible' => $akses->get(605)],
                                                    ['label' => 'Posting Musrenbang', 'url' => '/musrencam/loadData', 'visible' => $akses->get(604)],
                                                ]
                                            ],
                                            [
                                                'label' => 'Kota/Kabupaten',
                                                'visible' => $akses->get(608) || $akses->get(609),
                                                'items' => [
                                                    ['label' => 'Load Rancangan RKPD', 'url' => '/musrenrkpd/loadData', 'visible' => $akses->get(608)],
                                                    ['label' => 'Musrenbang RKPD', 'url' => '/musrenrkpd', 'visible' => $akses->get(609)],
                                                ]
                                            ],
                                        ]
                                    ],
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

        
        <script src="{{ asset('/js/jquery.min.js')}}"></script>
        <script src="{{ asset('/js/jquery-ui.js')}}"></script>
        <script src="{{ asset('/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('/js/handlebars.js')}}"></script>
        <script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('/js/dataTables.bootstrap.min.js') }}"></script>
        <script src="{{ asset('/js/jquery.number.js')}}"></script>
        <script src="{{ asset('vendor/metisMenu/metisMenu.min.js')}}"></script>
        <script src="{{ asset('/js/sb-admin-2.js')}}"></script>


        @yield('scripts')

</body>
</html>
