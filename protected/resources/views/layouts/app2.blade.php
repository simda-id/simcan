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
        <meta name="_token" content="{!! csrf_token() !!}" />

        <meta name="description" content="Sistem Perencanaan yang dikembangkan oleh Tim Simda BPKP">
        <meta name="author" content="Tim Simda BPKP">
        <link rel="icon" href="{{asset('simda-favicon.ico')}}">

        <title>simd@Perencanaan</title>

        <link href="{{ asset('css/font-awesome.min.css') }}" rel='stylesheet' type='text/css'>
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/select2.css') }}" rel="stylesheet">
        <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/metisMenu/metisMenu.min.css')}}" rel="stylesheet">
        <link href="{{ asset('css/sb-admin-2.css')}}" rel="stylesheet">
        <link href="{{ asset('css/dataTables.bootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('css/dataTables.fontAwesome.css') }}" rel="stylesheet">
        <style>
            h1.padding {
                padding-right: 1cm;
            }

            #radioBtn .notActive {
                color: #b5b6b7;
                background-color: #fff;
            }
        </style>
    </head>

    <body>
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-static-top" role="navigation"
                style="margin-bottom: 0; background: #0E203A; border-color: #ccc; box-shadow: 0 0 2px 0 #E8FFFF;">
                {{-- <div class="container"> --}}
                <div class="navbar-header">
                    <a class="navbar-brand navbar-right" href="{{ url('/home') }}"
                        style="margin-top: -5px; margin-left: 10px; max-height: 40px;">
                        <span class="fa-stack">
                            <i class="fa fa-square-o fa-stack-2x text-info"></i>
                            <i class="fa fa-home fa-stack-1x" style="color:#fff"></i>
                        </span>
                        <span style="color:#fff"> simd@<strong>Anggaran</strong> :: {{Session::get('xPemda')}}</span>
                        @if ( Session::get('AppType') === 0 )
                        <span class="label" style="background-color: #3a87ad; color:#fff;"> {{Session::get('versiApp')}}
                            - Provinsi </span>
                        @else
                        <span class="label" style="background-color: #f89406; color:#fff;"> {{Session::get('versiApp')}}
                        </span>
                        @endif
                    </a>
                </div>

                <ul class="nav navbar-top-links pull-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                    <li class="dropdown" style="color:#fff">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"
                            style="color:#fff">
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
                        <i class="fa fa-flag fa-fw"></i> Tahun Anggaran:
                        <?= Session::get('tahun') != NULL ? Session::get('tahun') : 'Pilih!' ?></i>
                    </span>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"
                            style="color:#fff">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu dropdown-user" role="menu">
                            <li>
                                <a href="{{ url('/home') }}"><i class="fa fa-home fa-fw text-info"></i> Home</a>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out fa-fw text-info"></i> Logout</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
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
                                        'visible' => $akses->getMulti([701,702,703]),
                                        'items' => [
                                            [
                                                'label' => 'Dokumen PPAS',
                                                'visible' => $akses->get(701),
                                                'url' => '/ppas',
                                            ],
                                            [
                                                'label' => 'Penyusunan PPAS',
                                                'visible' => $akses->getMulti([702,703]),
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
                                                ]
                                            ]
                                        ]
                                    ],
                                    [   'label' => 'PPAS Perubahan', 
                                        'visible' => $akses->getMulti([701,702,703]),
                                        'items' => [
                                            [
                                                'label' => 'Dokumen PPAS Perubahan',
                                                'visible' => $akses->get(701),
                                                'url' => '/ppasubah',
                                            ],
                                            [
                                                'label' => 'Penyusunan PPAS Perubahan',
                                                'visible' => $akses->getMulti([702,703]),
                                                'items' => [
                                                    [
                                                        'label' => 'Program RKPD',
                                                        'visible' => $akses->get(702),
                                                        'url' => '/ppasubah/progpemda',
                                                    ],
                                                    [
                                                        'label' => 'Program RENJA',
                                                        'visible' => $akses->get(703),
                                                        'url' => '/ppasubah/progopd',
                                                    ],
                                                ]
                                            ]
                                        ]
                                    ],
                                    [ 'label' => 'PPAS-90',
                                        'visible' => $akses->getMulti([701,702,703]),
                                        'items' => [
                                                [
                                                'label' => 'Dokumen PPAS',
                                                'visible' => $akses->get(701),
                                                'url' => '/90ppas',
                                                ],
                                            [
                                            'label' => 'Penyusunan PPAS',
                                            'visible' => $akses->getMulti([702,703]),
                                            'items' => [
                                                    [
                                                    'label' => 'Program RKPD',
                                                    'visible' => $akses->get(702),
                                                    'url' => '/90ppas/progpemda',
                                                    ],
                                                    [
                                                    'label' => 'Program RENJA',
                                                    'visible' => $akses->get(703),
                                                    'url' => '/90ppas/progopd',
                                                    ],
                                                ]
                                            ]
                                        ]
                                    ],
                                    [   'label' => 'APBD', 
                                        'visible' => $akses->getMulti([710,711,712]),
                                        'items' => [
                                            [
                                                'label' => 'Dokumen APBD',
                                                'visible' => $akses->getMulti([710,712]),
                                                'items' => [
                                                    [
                                                        'label' => 'Dokumen APBD',
                                                        'visible' => $akses->get(710),
                                                        'url' => '/Apbd',
                                                    ],
                                                    [
                                                        'label' => 'Dokumen RKA SKPD',
                                                        'visible' => $akses->get(712),
                                                        'url' => '/Apbd/dokopd',
                                                    ],
                                                ]
                                            ],
                                            [
                                                'label' => 'Penyusunan APBD',
                                                'visible' => $akses->getMulti([711,712]),
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
                                                ]
                                            ]
                                        ]
                                    ],
                                    [   'label' => 'APBD Pergeseran', 
                                        'visible' => $akses->getMulti([730,731,732]),
                                        'items' => [
                                            [
                                                'label' => 'Dok APBD Pergeseran',
                                                'visible' => $akses->getMulti([730,732]),
                                                'items' => [
                                                    [
                                                        'label' => 'Dokumen APBD',
                                                        'visible' => $akses->get(730),
                                                        'url' => '/GeserApbd',
                                                    ],
                                                    [
                                                        'label' => 'Dokumen RKA SKPD',
                                                        'visible' => $akses->get(732),
                                                        'url' => '/GeserApbd/dokopd',
                                                    ],
                                                ]
                                            ],
                                            [
                                                'label' => 'Penyusunan APBD Pergeseran',
                                                'visible' => $akses->getMulti([731,732]),
                                                'items' => [
                                                    [
                                                        'label' => 'Program RKPD',
                                                        'visible' => $akses->get(731),
                                                        'url' => '/GeserApbd/progpemda',
                                                    ],
                                                    [
                                                        'label' => 'Program RENJA',
                                                        'visible' => $akses->get(732),
                                                        'url' => '/GeserApbd/progopd',
                                                    ],
                                                ]
                                            ]
                                        ]
                                    ],
                                    [   'label' => 'APBD Perubahan', 
                                        'visible' => $akses->getMulti([730,731,732]),
                                        'items' => [
                                            [
                                                'label' => 'Dokumen APBD-P',
                                                'visible' => $akses->getMulti([730,732]),
                                                'items' => [
                                                    [
                                                        'label' => 'Dokumen APBD-P',
                                                        'visible' => $akses->get(730),
                                                        'url' => '/UbahApbd',
                                                    ],
                                                    [
                                                    'label' => 'Dokumen RKA SKPD',
                                                    'visible' => $akses->get(732),
                                                    'url' => '/UbahApbd/dokopd',
                                                    ],
                                                ]
                                            ],
                                            [
                                                'label' => 'Penyusunan APBD-P',
                                                'visible' => $akses->getMulti([731,732]),
                                                'items' => [
                                                    [
                                                        'label' => 'Program RKPD',
                                                        'visible' => $akses->get(731),
                                                        'url' => '/UbahApbd/progpemda',
                                                    ],
                                                    [
                                                        'label' => 'Program RENJA',
                                                        'visible' => $akses->get(732),
                                                        'url' => '/UbahApbd/progopd',
                                                    ],
                                                ]
                                            ]
                                        ]
                                    ],
                                    [ 'label' => 'Pergeseran APBD-P',
                                        'visible' => $akses->getMulti([730,731,732]),
                                        'items' => [
                                            [
                                            'label' => 'Dokumen APBD-P',
                                            'visible' => $akses->getMulti([730,732]),
                                            'items' => [
                                                    [
                                                        'label' => 'Dokumen Pergeseran APBD-P',
                                                        'visible' => $akses->get(730),
                                                        'url' => '/UbahGeser',
                                                    ],
                                                    [
                                                        'label' => 'Dokumen RKA SKPD',
                                                        'visible' => $akses->get(732),
                                                        'url' => '/UbahGeser/dokopd',
                                                    ],
                                                ]
                                            ],
                                            [
                                                'label' => 'Penyusunan Pergeseran APBD-P',
                                                'visible' => $akses->getMulti([731,732]),
                                                'items' => [
                                                    [
                                                        'label' => 'Program RKPD',
                                                        'visible' => $akses->get(731),
                                                        'url' => '/UbahGeser/progpemda',
                                                    ],
                                                    [
                                                        'label' => 'Program RENJA',
                                                        'visible' => $akses->get(732),
                                                        'url' => '/UbahGeser/progopd',
                                                    ],
                                                ]
                                            ]
                                        ]
                                    ],
                                    [ 'label' => 'APBD-90',
                                    'visible' => $akses->getMulti([710,711,712]),
                                    'items' => [
                                            [
                                                'label' => 'Dokumen APBD',
                                                'visible' => $akses->getMulti([710,712]),
                                                'items' => [
                                                    [
                                                    'label' => 'Dokumen APBD',
                                                    'visible' => $akses->get(710),
                                                    'url' => '/90Apbd',
                                                    ],
                                                    [
                                                    'label' => 'Dokumen RKA SKPD',
                                                    'visible' => $akses->get(712),
                                                    'url' => '/90Apbd/dokopd',
                                                    ],
                                                ]
                                            ],
                                            [ 'label' => 'Penyusunan APBD',
                                            'visible' => $akses->getMulti([711,712]),
                                            'items' => [
                                                    [
                                                    'label' => 'Program RKPD',
                                                    'visible' => $akses->get(711),
                                                    'url' => '/90Apbd/progpemda',
                                                    ],
                                                    [
                                                    'label' => 'Program RENJA',
                                                    'visible' => $akses->get(712),
                                                    'url' => '/90Apbd/progopd',
                                                    ],
                                                ]
                                            ]
                                        ]
                                    ],
                                    /*[   'label' => 'APBD Pergeseran stlh Perubahan', 
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
                                                    [
                                                        'label' => 'Pagu Anggaran',
                                                        'visible' => $akses->get(713),
                                                        'url' => '#',
                                                    ] 
                                                ]
                                            ]
                                        ]
                                    ],*/
                                    [
                                        'label' => 'Laporan PPAS & APBD',
                                        'visible' => $akses->getMulti([740,741,742,743,744]),
                                        'items' => [
                                            [
                                                'label' => 'PPAS', 
                                                'visible' => $akses->getMulti([740,741]),
                                                'items' => [
                                                    ['label' => 'PPAS', 'url' => '/cetak/ppas', 'visible' => $akses->get(740)],
                                                    ['label' => 'PPAS Perubahan', 'url' => '/cetak/ppasubah', 'visible' => $akses->get(741)],
                                                    ['label' => 'PPAS-90', 'url' => '/cetak90/ppas', 'visible' => $akses->get(740)],
                                                ]
                                            ],
                                            [   
                                                'label' => 'APBD', 
                                                'visible' => $akses->getMulti([742,743,744]),
                                                'items' => [
                                                   // ['label' => 'RAPBD', 'url' => '/cetak/rapbd', 'visible' => $akses->get(71)],
                                                    ['label' => 'APBD', 'url' => '/cetak/apbd', 'visible' => $akses->get(742)],
                                                    ['label' => 'APBD Pergeseran', 'url' => '/cetak/geser', 'visible' => $akses->get(743)],
                                                    ['label' => 'APBD-90', 'url' => '/cetak90/apbd', 'visible' => $akses->get(742)],
                                                    // ['label' => 'APBD Perubahan', 'url' => '#', 'visible' => $akses->get(744)],
                                                ]
                                            ],
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
        <script src="{{ asset('/js/input.js')}}"></script>
        <script src="{{ asset('/js/jquery.number.js')}}"></script>
        <script src="{{ asset('vendor/metisMenu/metisMenu.min.js')}}"></script>
        <script src="{{ asset('/js/sb-admin-2.js')}}"></script>
        <script src="{{ asset('/js/datepicker-id.js')}}"></script>
        <script src="{{ asset('/js/select2.js')}}"></script>
        <script type="text/javascript">
            $('.select2').select2({ width: '100%' });

            function formatTgl(val_tanggal){
                var formattedDate = new Date(val_tanggal);
                var d = formattedDate.getDate();
                var m = formattedDate.getMonth();
                var y = formattedDate.getFullYear();
                var m_names = new Array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");    
                var tgl= d + " " + m_names[m] + " " + y;
                return tgl;
            };

            function hariIni(){
                var today = new Date();
                var dd = today.getDate();
                var mm = today.getMonth()+1; //January is 0!
                var yyyy = today.getFullYear();
                // var hariIni = yyyy + '-' + mm + '-' + dd;
                var hariIni = new Date().toISOString().slice( 0, 10 );
                return hariIni;
            };

            function buatNip(string){
                return string.replace(/(\d{8})(\d{6})(\d{1})(\d{3})/,"$1 $2 $3 $4");
            }

            function nilaiNip(string){
                return string.replace(/\D/g,'').substring(0, 20);
            }

            $('#radioBtn a').on('click', function(){
                var sel = $(this).data('title');
                var tog = $(this).data('toggle');
                $('#'+tog).prop('value', sel);
                
                $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
                $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
            });
        </script>

        @yield('scripts')


    </body>

</html>