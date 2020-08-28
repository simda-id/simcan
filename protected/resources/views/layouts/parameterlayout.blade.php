@extends('layouts.baselineLayout')
<?php
use App\CekAkses;
use hoaaah\LaravelMenu\Menu;

?>
@section('layoutBody')
<div id="wrapper">
    <nav class="navbar navbar-default navbar-static-top" role="navigation"
        style="margin-bottom: 0; background: #0E203A; border-color: #ccc; box-shadow: 0 0 2px 0 #E8FFFF;">
        <div class="navbar-header">
            <a class="navbar-brand navbar-right" href="{{ url('/home') }}"
                style="margin-top: -5px; margin-left: 10px; max-height: 40px;">
                <span class="fa-stack">
                    <i class="fa fa-square-o fa-stack-2x text-info"></i>
                    <i class="fa fa-home fa-stack-1x text-info" style="color:#fff"></i>
                </span><span style="color:#fff"> simd@<strong>Perencanaan</strong></span>
                @if ( Session::get('AppType') === 0 )
                <span class="label" style="background-color: #3a87ad; color:#fff;"> {{Session::get('versiApp')}} -
                    Provinsi </span>
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
                <i class="fa fa-flag fa-fw"></i> Tahun Anggaran:
                <?= Session::get('tahun') != NULL ? Session::get('tahun') : 'Pilih!' ?></i>
            </span>
            <li class="dropdown" style="color:#fff">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"
                    style="color:#fff">
                    <i class="fa fa-user fa-fw"></i> {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <ul class="dropdown-menu dropdown-user" role="menu" style="color:#fff">
                    <li>
                        <a href="{{ url('/home') }}"><i class="fa fa-home fa-fw text-info"></i> Home</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
                            ['label' => 'Parameter', 'icon' => 'fa fa-cogs fa-fw text-success', 'url' => '/parameter/dash'],
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
                                    [ 'label' => 'Program Prioritas',
                                        'icon' => 'fa fa-building-o fa-fw',
                                        'visible' => $akses->getMulti([113, 114]),
                                        'items' => [
                                            ['label' => 'Prioritas Nasional', 'url' => '/prioritas/nasional','visible' => $akses->get(113)],
                                            ['label' => 'Prioritas Provinsi', 'url' => '/prioritas/provinsi','visible' => $akses->get(114)],
                                        ]
                                    ],
                                    [   'label' => 'Unit Organisasi', 
                                        'icon' => 'fa fa-building-o fa-fw',
                                        'visible' => $akses->get(103),
                                        'items' => [
                                            ['label' => 'Unit & Sub Unit', 'url' => '/admin/parameter/unit','visible' => $akses->get(103)],
                                            ['label' => 'Struktur Organisasi', 'url' => '/sotk','visible' => $akses->get(103)],
                                        ]
                                    ],
                                    [   'label' => 'Pegawai',
                                        'icon' => 'fa fa-users fa-fw',
                                        'url' => '/pegawai',
                                        'visible' => $akses->get(112)
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
                                    [   'label' => 'Lokasi',
                                        'icon' => 'fa fa-map-marker fa-fw',
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
                            [
                            'label' => 'Parameter-90',
                            'icon' => 'fa fa-snowflake-o fa-fw text-danger',
                            'visible' => $akses->getMulti([101, 102, 103, 104, 105, 106, 107, 108, 109, 111]),
                            'items' => [
                                    [ 'label' => 'Import Data Pmd 90',
                                        'icon' => 'fa fa-building-o fa-fw',
                                        'visible' => $akses->get(103),
                                        'url' => '/parameter90/import','visible'
                                    ],
                                    [ 'label' => 'Unit Organisasi',
                                        'icon' => 'fa fa-building-o fa-fw',
                                        'visible' => $akses->get(103),
                                        'items' => [
                                            ['label' => 'Unit & Sub Unit', 'url' => '/parameter90/unit','visible' => $akses->get(103)],
                                            ['label' => 'Mapping Organisasi', 'url' => '/parameter90/mapping_unit','visible' => $akses->get(103)],
                                        ]
                                    ],
                                    [ 'label' => 'Program Kegiatan',
                                        'icon' => 'fa fa-briefcase fa-fw',
                                        'visible' => $akses->get(106),
                                        'items' => [
                                            ['label' => 'Program Kegiatan', 'url' => '/parameter90/program','visible' => $akses->get(106)],
                                            ['label' => 'Mapping Program', 'url' => '/parameter90/mapping_prog','visible' => $akses->get(106)],
                                        ]
                                    ],
                                    [ 'label' => 'Rekening Anggaran',
                                        'icon' => 'fa fa-money fa-fw',
                                        'visible' => $akses->get(105),
                                        'items' => [
                                            ['label' => 'Rekening Anggaran', 'url' => '/parameter90/rekening','visible' => $akses->get(105)],
                                            ['label' => 'Mapping Rekening', 'url' => '/parameter90/mapping_rek90','visible' => $akses->get(105)],
                                        ]
                                    ],
                                    [ 'label' => 'Sumber Dana',
                                        'icon' => 'fa fa-building-o fa-fw',
                                        'visible' => $akses->get(103),
                                        'items' => [
                                            ['label' => 'Sumber Dana', 'url' => '/parameter90/sumdana','visible' => $akses->get(103)],
                                            ['label' => 'Mapping Sumber Dana', 'url' => '/parameter90/mapping_sd90','visible' => $akses->get(103)],
                                        ]
                                    ],
                                    [ 'label' => 'SPM',
                                        'icon' => 'fa fa-building-o fa-fw',
                                        'visible' => $akses->getMulti([105,106]),
                                        'items' => [
                                            ['label' => 'SPM', 'url' => '/parameter90/spm','visible' => $akses->getMulti([105,106])],
                                        ]
                                    ],
                                    [ 'label' => 'Program Prioritas',
                                        'icon' => 'fa fa-building-o fa-fw',
                                        'visible' => $akses->getMulti([113, 114]),
                                        'items' => [
                                            ['label' => 'Prioritas Nasional', 'url' => '/parameter90/pronas','visible' => $akses->get(113)],
                                            // ['label' => 'Prioritas Provinsi', 'url' => '/parameter90/proprov','visible' => $akses->get(114)],
                                        ]
                                    ],
                                ]
                            ],
                            ['label' => 'Update Database', 'icon' => 'fa fa-database fa-fw text-warning', 'url' => '/admin/update','visible' => $akses->get(9)],
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