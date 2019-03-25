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
    <style>
        h1.padding {
        padding-right: 1cm;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; background: #0E203A; border-color: #ccc; box-shadow: 0 0 2px 0 #E8FFFF;">
            {{-- <div class="container"> --}}
                <div class="navbar-header">
                    <a class="navbar-brand navbar-right" href="{{ url('/home') }}" style="margin-top: -5px; margin-left: 10px; max-height: 40px;">
                    <span class="fa-stack">
                      <i class="fa fa-square-o fa-stack-2x text-info"></i>
                      <i class="fa fa-home fa-stack-1x" style="color:#fff"></i>
                    </span>
                    <span style="color:#fff"> simd@<strong>Anggaran</strong> ver <strong>1.0 </strong></span>
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
                            <li class="dropdown">
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
                                    ['label' => 'Modul Anggaran', 'icon'=>'fa fa-list-alt fa-fw fa-lg' ,'url' => '#'],
                                    [   'label' => 'PPAS', 
                                        'visible' => $akses->get(70),
                                        'items' => [
                                            [
                                                'label' => 'Dokumen PPAS',
                                                'visible' => $akses->get(701),
                                                'url' => '/ppas',
                                            ],
                                            [
                                                'label' => 'Penyusunan PPAS',
                                                'visible' => $akses->get(70),
                                                'items' => [
                                                    [
                                                        'label' => 'Program RKPD',
                                                        'visible' => $akses->get(702),
                                                        'url' => '/ppas/progpemda',
                                                    ],
                                                    [
                                                        'label' => 'Program RENJA',
                                                        'visible' => $akses->get(703),
                                                        'url' => '/ppas/progopd',
                                                    ],
                                                  /*  [
                                                        'label' => 'Pagu Anggaran',
                                                        'visible' => $akses->get(704),
                                                        'url' => '/ppas/sesuai',
                                                    ] */
                                                ]
                                            ]
                                        ]
                                    ],
                                    [   'label' => 'PPAS Perubahan', 
                                        'visible' => $akses->get(70),
                                        'items' => [
                                            [
                                                'label' => 'Dokumen PPAS Perubahan',
                                                'visible' => $akses->get(701),
                                                'url' => '/ppas',
                                            ],
                                            [
                                                'label' => 'Penyusunan PPAS Perubahan',
                                                'visible' => $akses->get(70),
                                                'items' => [
                                                    [
                                                        'label' => 'Program RKPD',
                                                        'visible' => $akses->get(702),
                                                        'url' => '#',
                                                    ],
                                                    [
                                                        'label' => 'Program RENJA',
                                                        'visible' => $akses->get(703),
                                                        'url' => '#',
                                                    ],
                                                /*    [
                                                        'label' => 'Pagu Anggaran',
                                                        'visible' => $akses->get(704),
                                                        'url' => '#',
                                                    ] */
                                                ]
                                            ]
                                        ]
                                    ],
                                    [   'label' => 'APBD', 
                                        'visible' => $akses->get(71),
                                        'items' => [
                                            [
                                                'label' => 'Dokumen APBD',
                                                'visible' => $akses->get(710),
                                                'url' => '/Apbd',
                                            ],
                                            [
                                                'label' => 'Penyusunan APBD',
                                                'visible' => $akses->get(71),
                                                'items' => [
                                                    [
                                                        'label' => 'Program RKPD',
                                                        'visible' => $akses->get(711),
                                                        'url' => '/Apbd/progpemda',
                                                    ],
                                                    [
                                                        'label' => 'Program RENJA',
                                                        'visible' => $akses->get(712),
                                                        'url' => '/Apbd/progopd',
                                                    ],
                                               /*     [
                                                        'label' => 'Pagu Anggaran',
                                                        'visible' => $akses->get(713),
                                                        'url' => '/Apbd/sesuai',
                                                    ] */
                                                ]
                                            ]
                                        ]
                                    ],
                                    [   'label' => 'APBD Pergeseran', 
                                        'visible' => $akses->get(71),
                                        'items' => [
                                            [
                                                'label' => 'Dokumen APBD Pergeseran',
                                                'visible' => $akses->get(710),
                                                'url' => '/GeserApbd',
                                            ],
                                            [
                                                'label' => 'Penyusunan APBD Pergeseran',
                                                'visible' => $akses->get(71),
                                                'items' => [
                                                    [
                                                        'label' => 'Program RKPD',
                                                        'visible' => $akses->get(711),
                                                        'url' => '/GeserApbd/progpemda',
                                                    ],
                                                    [
                                                        'label' => 'Program RENJA',
                                                        'visible' => $akses->get(712),
                                                        'url' => '/GeserApbd/progopd',
                                                    ],
                                                    [
                                                        'label' => 'Pagu Anggaran',
                                                        'visible' => $akses->get(713),
                                                        'url' => '/GeserApbd/sesuai',
                                                    ] 
                                                ]
                                            ]
                                        ]
                                    ],
                                    [   'label' => 'APBD Perubahan', 
                                        'visible' => $akses->get(71),
                                        'items' => [
                                            [
                                                'label' => 'Dokumen APBD Perubahan',
                                                'visible' => $akses->get(710),
                                                'url' => '#',
                                            ],
                                            [
                                                'label' => 'Penyusunan APBD Perubahan',
                                                'visible' => $akses->get(71),
                                                'items' => [
                                                    [
                                                        'label' => 'Program RKPD',
                                                        'visible' => $akses->get(711),
                                                        'url' => '#',
                                                    ],
                                                    [
                                                        'label' => 'Program RENJA',
                                                        'visible' => $akses->get(712),
                                                        'url' => '#',
                                                    ],
                                                  /*  [
                                                        'label' => 'Pagu Anggaran',
                                                        'visible' => $akses->get(713),
                                                        'url' => '#',
                                                    ] */
                                                ]
                                            ]
                                        ]
                                    ],
                                    [   'label' => 'APBD Pergeseran stlh Perubahan', 
                                        'visible' => $akses->get(71),
                                        'items' => [
                                            [
                                                'label' => 'Dokumen APBD Pergeseran',
                                                'visible' => $akses->get(710),
                                                'url' => '#',
                                            ],
                                            [
                                                'label' => 'Penyusunan APBD Pergeseran',
                                                'visible' => $akses->get(71),
                                                'items' => [
                                                    [
                                                        'label' => 'Program RKPD',
                                                        'visible' => $akses->get(711),
                                                        'url' => '#',
                                                    ],
                                                    [
                                                        'label' => 'Program RENJA',
                                                        'visible' => $akses->get(712),
                                                        'url' => '#',
                                                    ],
                                                    /*  [
                                                        'label' => 'Pagu Anggaran',
                                                        'visible' => $akses->get(713),
                                                        'url' => '#',
                                                    ] */
                                                ]
                                            ]
                                        ]
                                    ],
                                //     [   'label' => 'Sinkronisasi Parameter Simda Keuangan', 
                                //         'url' => '/ppas', 
                                //         'visible' => $akses->get(702)],
                                    [
                                        'label' => 'Laporan PPAS & APBD',
                                        'visible' => $akses->get(70),
                                        'items' => [
                                            [
                                                'label' => 'PPAS', 
                                                'visible' => $akses->get(70),
                                                'items' => [
                                                    ['label' => 'PPAS', 'url' => '#', 'visible' => $akses->get(70)],
                                                    ['label' => 'PPAS Perubahan', 'url' => '#', 'visible' => $akses->get(70)],
                                                ]
                                            ],
                                            [   
                                                'label' => 'APBD', 
                                                'visible' => $akses->get(71),
                                                'items' => [
                                                    ['label' => 'APBD', 'url' => '/cetak/apbd', 'visible' => $akses->get(71)],
                                                    ['label' => 'APBD Pergeseran', 'url' => '#', 'visible' => $akses->get(71)],
                                                    ['label' => 'APBD Perubahan', 'url' => '#', 'visible' => $akses->get(71)],
                                                ]
                                            ],
                                        ]
                                    ],
                                ]
                            ]);
                        ?>
                    </div>
        </nav>

        {{-- <h1 style="text-align:right; color:white; font-family:verdana" class="padding"><strong>KOTA SIMULASI </strong></h1>
        <h1 style="text-align:right; color:white; font-family:verdana" class="padding"><strong>TAHUN 2017 </strong></h1> --}}

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
        <script src="{{ asset('/js/input.js')}}"></script>
        <script src="{{ asset('/js/jquery.number.js')}}"></script>
        <script src="{{ asset('vendor/metisMenu/metisMenu.min.js')}}"></script>
        <script src="{{ asset('/js/sb-admin-2.js')}}"></script>


        @yield('scripts')

</body>
</html>
