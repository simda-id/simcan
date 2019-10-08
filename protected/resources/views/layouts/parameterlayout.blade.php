@extends('layouts.baselineLayout')
<?php
use App\CekAkses;
use hoaaah\LaravelMenu\Menu;

?>
@section('layoutBody')
<div id="wrapper">
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; background: #0E203A; border-color: #ccc; box-shadow: 0 0 2px 0 #E8FFFF;">
            <div class="navbar-header">
                <a class="navbar-brand navbar-right" href="{{ url('/home') }}" style="margin-top: -5px; margin-left: 10px; max-height: 40px;">
                 <span class="fa-stack">
                      <i class="fa fa-square-o fa-stack-2x text-info"></i>
                      <i class="fa fa-home fa-stack-1x text-info" style="color:#fff"></i>
                    </span><span style="color:#fff"> simd@<strong>Perencanaan</strong></span>
                    @if ( Session::get('AppType') === 0 )
                        <span class="label" style="background-color: #3a87ad; color:#fff;"> {{Session::get('versiApp')}} - Provinsi </span>
                        @else
                            <span class="label" style="background-color: #f89406; color:#fff;"> {{Session::get('versiApp')}} </span>
                        @endif
                    </a>
            </div>
            <ul class="nav navbar-top-links pull-right">
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
                    <span style="color:#fff">
                        <i class="fa fa-flag fa-fw"></i> Tahun Anggaran: <?= Session::get('tahun') != NULL ? Session::get('tahun') : 'Pilih!' ?></i>
                    </span>
                    <li class="dropdown" style="color:#fff">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="color:#fff">
                            <i class="fa fa-user fa-fw"></i> {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-user" role="menu" style="color:#fff">
                            <li>
                                <a href="{{ url('/home') }}"><i class="fa fa-home fa-fw text-info"></i> Home</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
                            ['label' => 'Parameter', 'icon' => 'fa fa-cogs', 'url' => '/parameter/dash'],
                            ['label' => 'Pengelolaan User', 
                                'visible' => $akses->get(110),
                                'icon' => 'fa fa-users fa-fw',
                                'items' => [
                                    [   'label' => 'Daftar User', 
                                        'url' => '/admin/parameter/user',
                                        'visible' => $akses->get(110)
                                    ],
                                    [   'label' => 'Group User', 
                                        'url' => '/admin/parameter/user/group',
                                        'visible' => $akses->get(110)
                                    ],
                                    [   'label' => 'Peran Group User', 
                                        'url' => '/admin/parameter/user/peran',
                                        'visible' => $akses->get(110)
                                    ],
                                ]
                            ],                        
                            [
                                'label' => 'Parameter',
                                'icon' => 'fa fa-cog fa-fw',
                                'visible' => $akses->getMulti([101, 102, 103, 104, 105, 106, 107, 108, 109, 111]),
                                'items' => [
                                    [   'label' => 'Pemda', 
                                        'icon' => 'fa fa-bank fa-fw', 
                                        'url' => '/pemda',
                                        'visible' => $akses->get(101)
                                    ],
                                    [
                                        'label' => 'Wilayah Pemerintahan', 
                                        'icon' => 'fa fa-map-o fa-fw',
                                        'url' => '/admin/parameter/kecamatan',
                                        'visible' => $akses->get(102)
                                    ],
                                    [   'label' => 'Rekening Anggaran', 
                                        'icon' => 'fa fa-money fa-fw',
                                        'url' => '/admin/parameter/rekening',
                                        'visible' => $akses->get(105)
                                    ],
                                    [   'label' => 'Program Kegiatan', 
                                        'icon' => 'fa fa-briefcase fa-fw',
                                        'url' => '/admin/parameter/program',
                                        'visible' => $akses->get(106)
                                    ],
                                    [   'label' => 'Unit Organisasi', 
                                        'icon' => 'fa fa-building-o fa-fw',
                                        'visible' => $akses->get(103),
                                        'items' => [
                                            ['label' => 'Unit & Sub Unit', 'url' => '/admin/parameter/unit','visible' => $akses->get(103)],
                                            ['label' => 'Struktur Organisasi', 'url' => '/','visible' => $akses->get(103)],
                                        ]
                                    ],
                                    [   'label' => 'Sumber Dana', 
                                        'icon' => 'fa fa-money fa-fw',
                                        'url' => '/admin/parameter/sbrDana',
                                        'visible' => $akses->get(104)
                                    ],
                                    [   'label' => 'Satuan', 
                                        'icon' => 'fa fa-cube fa-fw',
                                        'url' => '/satuan',
                                        'visible' => $akses->get(111)
                                    ],
                                    [   'label' => 'Pegawai', 
                                        'icon' => 'fa fa-users fa-fw',
                                        'url' => '/',
                                        'visible' => $akses->get(112)
                                    ],
                                    [   'label' => 'Lokasi', 
                                        'icon' => 'fa fa-location-arrow fa-fw',
                                        'visible' => $akses->get(107),
                                        'items' => [
                                            ['label' => 'Jenis Lokasi', 'url' => '/admin/parameter/jnsLokasi','visible' => $akses->get(107)],
                                            ['label' => 'Daftar Lokasi', 'url' => '/admin/parameter/lokasi','visible' => $akses->get(107)],
                                        ]
                                    ],
                                    [   'label' => 'Agenda Tahunan', 
                                        'icon' => 'fa fa-calendar fa-fw',
                                        'url' => '/agenda',
                                        'visible' => $akses->get(106)
                                    ],
                                    [   'label' => 'Setting Aplikasi', 
                                        'icon' => 'fa fa-wrench fa-fw',
                                        'url' => '/setting',
                                        'visible' => $akses->get(109)
                                    ],
                                ]
                            ],
                            ['label' => 'Update Database', 'icon' => 'fa fa-database fa-fw', 'url' => '/admin/update','visible' => $akses->get(9)],
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
@endsection