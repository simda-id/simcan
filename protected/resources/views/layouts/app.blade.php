@extends('layouts.baselineLayout')
<?php
use App\CekAkses;
use hoaaah\LaravelMenu\Menu;

?>
@section('layoutBody')
<div id="wrapper">
    <nav class="navbar navbar-default navbar-static-top" role="navigation"
        style="margin-bottom: 0; background: #0E203A; border-color: #ccc; color:#fff;">
        <div class="navbar-header">
            <a class="navbar-brand navbar-right" href="{{ url('/home') }}"
                style="margin-top: -5px; margin-left: 10px; max-height: 40px;">
                <span class="fa-stack">
                    <i class="fa fa-square-o fa-stack-2x text-info"></i>
                    <i class="fa fa-home fa-stack-1x" style="color:#fff"></i>
                </span>
                <span style="color:#fff"> simd@<strong>Perencanaan</strong> :: {{Session::get('xPemda')}}</span>
                @if ( Session::get('AppType') === 0 )
                <span class="label" style="background-color: #3a87ad; color:#fff;"> {{Session::get('versiApp')}} -
                    Provinsi </span>
                @else
                <span class="label" style="background-color: #f89406; color:#fff;"> {{Session::get('versiApp')}} </span>
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
            <li class="dropdown" style="color:#fff">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"
                    style="color:#fff">
                    <i class="fa fa-user fa-fw"></i> {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu dropdown-user" role="menu">
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

        @if (Session::get('AppType') === 0)
        <div class="navbar-default sidebar" role="navigation">
            <?php
                            $akses = new CekAkses();
                            $menu = new Menu();
                            $menu->render([
                                'options' => [
                                    'ulId' => 'side-menu'
                                ],
                                // 'label' => 'RKPD dan Renja',
                                'items' => [
                                    [   'label' => 'Modul RKPD dan Renja',
                                        'visible' => $akses->get(4) || $akses->get(5) || $akses->get(6),
                                        'icon'=>'fa fa-tasks fa-fw fa-lg', 
                                        'url' => '/rkpd/dash'],
                                    [
                                        'label' => 'RKPD', 
                                        'visible' => $akses->getMulti([401,402,403,404,405,406,407,408]),
                                        'items' => [
                                            [
                                                'label' => 'Rancangan Awal RKPD',
                                                'visible' => $akses->getMulti([401,402]),
                                                'items' => [
                                                    ['label' => 'Load Data Tahunan RPJMD', 'url' => '/ranwalrkpd/loadData', 'visible' => $akses->get(401)],
                                                    ['label' => 'Rancangan Awal RKPD', 'url' => '/ranwalrkpd', 'visible' => $akses->get(402)],
                                                    ['label' => 'Dokumen Ranwal RKPD', 'url' => '/ranwalrkpd/Dokumen','visible' => $akses->get(401)],
                                                ]
                                            ],
                                            [
                                                'label' => 'Rancangan RKPD',
                                                'visible' => $akses->getMulti([403,404]),
                                                'items' => [
                                                    ['label' => 'Load Data Forum PD', 'url' => '/rancanganrkpd/loadData', 'visible' => $akses->get(403)],
                                                    ['label' => 'Rancangan RKPD', 'url' => '/rancanganrkpd', 'visible' => $akses->get(403)],
                                                    ['label' => 'Penyesuaian PD', 'url' => '/rancanganrkpd/sesuai', 'visible' => $akses->get(404)],
                                                    ['label' => 'Dokumen Rancangan RKPD', 'url' => '/rancanganrkpd/dokumen', 'visible' => $akses->get(403)],
                                                ]
                                            ],
                                            [
                                                'label' => 'Rancangan Akhir RKPD',
                                                'visible' => $akses->getMulti([404,405,406]),
                                                'items' => [
                                                    ['label' => 'Load Musrenbang RKPD', 'url' => '/ranhirrkpd/loadData', 'visible' => $akses->get(405)],
                                                    ['label' => 'Rancangan Akhir RKPD', 'url' => '/ranhirrkpd', 'visible' => $akses->get(406)],
                                                    ['label' => 'Penyesuaian PD', 'url' => '/ranhirrkpd/sesuai', 'visible' => $akses->get(404)],
                                                    ['label' => 'Dokumen Ranhir RKPD', 'url' => '/ranhirrkpd/dokumen', 'visible' => $akses->get(406)],
                                                ]
                                            ],
                                            [
                                                'label' => 'RKPD Final',
                                                'visible' => $akses->getMulti([404,407,408]),
                                                'items' => [
                                                    ['label' => 'Load Ranhir RKPD', 'url' => '/rkpd/loadData', 'visible' => $akses->get(407)],
                                                    ['label' => 'RKPD Final', 'url' => '/rkpd', 'visible' => $akses->get(408)],
                                                    ['label' => 'Penyesuaian PD', 'url' => '/rkpd/sesuai', 'visible' => $akses->get(404)],
                                                    ['label' => 'Dokumen RKPD Final', 'url' => '/rkpd/dokumen', 'visible' => $akses->get(408)],                                                    
                                                ]
                                            ],
                                           /* [
                                                'label' => 'Prioritas Pembangunan',
                                                'visible' => $akses->get(408) || $akses->get(502),
                                                'items' => [
                                                    ['label' => 'Prioritas Nasional', 'url' => '/rkpd/prionas', 'visible' => $akses->get(408)],
                                                    ['label' => 'Prioritas Daerah', 'url' => '/rkpd/prioda', 'visible' => $akses->get(408)],
                                                    ['label' => 'Penyesuaian PD', 'url' => '/rkpd/priopd', 'visible' => $akses->get(502)],
                                                ]
                                            ],*/
                                        ]
                                    ],                                    
                                    [
                                        'label' => 'Renja Perangkat Daerah',
                                        'visible' => $akses->getMulti([501,502,505]),
                                        'items' => [
                                            [
                                                'label' => 'Rancangan Awal Renja',
                                                'visible' => $akses->get(501),
                                                'items' => [
                                                    ['label' => 'Load Data Rancangan Awal RKPD', 'url' => '/ranwalrenja/loadData', 'visible' => $akses->get(501)],
                                                    ['label' => 'Rancangan Awal Renja', 'url' => '/ranwalrenja/sesuai', 'visible' => $akses->get(501)],
                                                    ['label' => 'Dokumen Ranwal Renja', 'url' => '/ranwalrenja/dokumen', 'visible' => $akses->get(501)],
                                                ]
                                            ],
                                            [
                                                'label' => 'Rancangan Renja',
                                                'visible' =>$akses->get(502),
                                                'items' => [
                                                    ['label' => 'Load Data Rancangan Awal Renja', 'url' => '/renja/loadData', 'visible' => $akses->get(502)],
                                                    ['label' => 'Rancangan Renja', 'url' => '/renja', 'visible' => $akses->get(502)],
                                                    ['label' => 'Dokumen Rancangan Renja', 'url' => '/renja/dokumen', 'visible' => $akses->get(502)],
                                                ]
                                            ],
                                            [
                                                'label' => 'Renja Final',
                                                'visible' => $akses->get(505),
                                                'items' => [
                                                    ['label' => 'Dokumen Renja Final', 'url' => '/renjafinal', 'visible' => $akses->get(505)],
                                                ]
                                            ],
                                            
                                        ]
                                    ],
                                    ['label' => 'Pokok Pikiran DPRD',
                                        'visible' => $akses->getMulti([503,409,504]), 
                                        'items' => [
                                            ['label' => 'Pokok Pikiran DPRD', 'url' => '/pokir', 'visible' => $akses->get(503)],
                                            ['label' => 'Verifikasi Pokir', 'url' => '/pokir/verpokir', 'visible' => $akses->get(409)],
                                            ['label' => 'Tindak Lanjut Unit', 'url' => '/pokir/tlpokir', 'visible' => $akses->get(504)],
                                        ]
                                    ],
                                    [ 'label' => 'Forum Perangkat Daerah', 
                                        'visible' => $akses->getMulti([606,607,610]),
                                       'items' => [
                                            ['label' => 'Load Rancangan Renja', 'url' => '/forumskpd/loadData', 'visible' => $akses->get(606)],
                                            ['label' => 'Forum Perangkat Daerah', 'url' => '/forumskpd', 'visible' => $akses->get(607)],
                                            ['label' => 'Dokumen Forum', 'url' => '/forumskpd/dokumen', 'visible' => $akses->get(610)],
                                        ]
                                    ],                                    
                                    [
                                        'label' => 'Musrenbang RKPD', 
                                        'visible' => $akses->getMulti([608,609,611,699]),
                                        'items' => [
                                            [
                                                'label' => 'Pra-Musrenbang',
                                                'visible' => $akses->get(699),
                                                'items' => [
                                                    ['label' => 'Usulan Kabupaten/Kota', 'url' => '/pramusren', 'visible' => $akses->get(699)],
                                                ]
                                            ],
                                            [
                                                'label' => 'Provinsi',
                                                'visible' => $akses->getMulti([608,609,611]),
                                                'items' => [
                                                    ['label' => 'Load Rancangan RKPD', 'url' => '/musrenrkpd/loadData', 'visible' => $akses->get(608)],
                                                    ['label' => 'Musrenbang RKPD', 'url' => '/musrenrkpd', 'visible' => $akses->get(609)],
                                                    ['label' => 'Penyesuaian PD', 'url' => '/musrenrkpd/sesuai', 'visible' => $akses->get(611)],
                                                    ['label' => 'Dokumen Musrenbang RKPD', 'url' => '/musrenrkpd/dokumen', 'visible' => $akses->get(609)],
                                                ]
                                            ],
                                        ]
                                    ],
                                    [
                                        'label' => 'Laporan RKPD & Renja',
                                        'visible' => $akses->getMulti([440,441,442,642,443,540,541,542,641,640,643]),
                                        'items' => [
                                            [
                                                'label' => 'RKPD', 
                                                'visible' => $akses->getMulti([440,441,442,642,443]),
                                                'items' => [
                                                    ['label' => 'RKPD Ranwal', 'url' => '/cetak/rkpdranwal', 'visible' => $akses->get(440)],
                                                    ['label' => 'RKPD Rancangan', 'url' => '/cetak/rkpdrancangan', 'visible' => $akses->get(441)],
                                                    ['label' => 'RKPD Akhir', 'url' => '/cetak/rkpdranhir', 'visible' => $akses->get(442)],
                                                    ['label' => 'Musrenbang RKPD', 'url' => '/cetak/rkpdmusren', 'visible' => $akses->get(642)],
                                                    ['label' => 'RKPD', 'url' => '/cetak/rkpdfinal', 'visible' => $akses->get(443)],
                                                ]
                                            ],
                                            [   
                                                'label' => 'Renja', 
                                                'visible' => $akses->getMulti([540,541,542]),
                                                'items' => [
                                                    ['label' => 'Renja Ranwal', 'url' => '/cetak/ranwalrenja', 'visible' => $akses->get(540)],
                                                    ['label' => 'Renja Rancangan', 'url' => '/cetak/renja', 'visible' => $akses->get(541)],
                                                    ['label' => 'Renja', 'url' => '/cetak/renjafinal', 'visible' => $akses->get(542)],
                                                ]
                                            ],
                                            ['label' => 'Musrenbang', 'url' => '/cetak/musren', 'visible' => $akses->get(641)],                                            
                                            ['label' => 'Forum OPD', 'url' => '/cetak/forum', 'visible' => $akses->get(640)],                                            
                                            ['label' => 'Pokir Dewan', 'url' => '/cetak/pokir', 'visible' => $akses->get(643)],
                                        ]
                                    ],
                                ]
                            ]);
                        ?>
        </div>
        @endif
        @if (Session::get('AppType') == 5)
        <div id="id_1" class="navbar-default sidebar" role="navigation">
            <?php
                            $akses = new CekAkses();
                            $menu = new Menu();
                            $menu->render([
                                'options' => [
                                    'ulId' => 'side-menu'
                                ],
                                // 'label' => 'RKPD dan Renja',
                                'items' => [
                                    [   'label' => 'Modul RKPD dan Renja',
                                        'visible' => $akses->get(4) || $akses->get(5) || $akses->get(6),
                                        'icon'=>'fa fa-tasks fa-fw fa-lg', 
                                        'url' => '/rkpd/dash'
                                    ],
                                    [
                                        'label' => 'RKPD', 
                                        'visible' => $akses->getMulti([401,402,403,404,405,406,407,408]),
                                        'items' => [
                                            [
                                                'label' => 'Rancangan Awal RKPD',
                                                'visible' => $akses->getMulti([401,402]),
                                                'items' => [
                                                    ['label' => 'Load Data Tahunan RPJMD', 'url' => '/ranwalrkpd/loadData', 'visible' => $akses->get(401)],
                                                    ['label' => 'Rancangan Awal RKPD', 'url' => '/ranwalrkpd', 'visible' => $akses->get(402)],
                                                    ['label' => 'Dokumen Ranwal RKPD', 'url' => '/ranwalrkpd/Dokumen','visible' => $akses->get(401)],
                                                ]
                                            ],
                                            [
                                                'label' => 'Rancangan RKPD',
                                                'visible' => $akses->getMulti([403,404]),
                                                'items' => [
                                                    ['label' => 'Load Data Forum PD', 'url' => '/rancanganrkpd/loadData', 'visible' => $akses->get(403)],
                                                    ['label' => 'Rancangan RKPD', 'url' => '/rancanganrkpd', 'visible' => $akses->get(403)],
                                                    ['label' => 'Penyesuaian PD', 'url' => '/rancanganrkpd/sesuai', 'visible' => $akses->get(404)],
                                                    ['label' => 'Dokumen Rancangan RKPD', 'url' => '/rancanganrkpd/dokumen', 'visible' => $akses->get(403)],
                                                ]
                                            ],
                                            [
                                                'label' => 'Rancangan Akhir RKPD',
                                                'visible' => $akses->getMulti([404,405,406]),
                                                'items' => [
                                                    ['label' => 'Load Musrenbang RKPD', 'url' => '/ranhirrkpd/loadData', 'visible' => $akses->get(405)],
                                                    ['label' => 'Rancangan Akhir RKPD', 'url' => '/ranhirrkpd', 'visible' => $akses->get(406)],
                                                    ['label' => 'Penyesuaian PD', 'url' => '/ranhirrkpd/sesuai', 'visible' => $akses->get(404)],
                                                    ['label' => 'Dokumen Ranhir RKPD', 'url' => '/ranhirrkpd/dokumen', 'visible' => $akses->get(406)],
                                                ]
                                            ],
                                            [
                                                'label' => 'RKPD Final',
                                                'visible' => $akses->getMulti([404,407,408]),
                                                'items' => [
                                                    ['label' => 'Load Ranhir RKPD', 'url' => '/rkpd/loadData', 'visible' => $akses->get(407)],
                                                    ['label' => 'RKPD Final', 'url' => '/rkpd', 'visible' => $akses->get(408)],
                                                    ['label' => 'Penyesuaian PD', 'url' => '/rkpd/sesuai', 'visible' => $akses->get(404)],
                                                    ['label' => 'Dokumen RKPD Final', 'url' => '/rkpd/dokumen', 'visible' => $akses->get(408)],                                                    
                                                ]
                                            ],
                                           /* [
                                                'label' => 'Prioritas Pembangunan',
                                                'visible' => $akses->get(408) || $akses->get(502),
                                                'items' => [
                                                    ['label' => 'Prioritas Nasional', 'url' => '/rkpd/prionas', 'visible' => $akses->get(408)],
                                                    ['label' => 'Prioritas Daerah', 'url' => '/rkpd/prioda', 'visible' => $akses->get(408)],
                                                    ['label' => 'Penyesuaian PD', 'url' => '/rkpd/priopd', 'visible' => $akses->get(502)],
                                                ]
                                            ],*/
                                        ]
                                    ],                                    
                                    [
                                        'label' => 'Renja Perangkat Daerah',
                                        'visible' => $akses->getMulti([501,502,505]),
                                        'items' => [
                                            [
                                                'label' => 'Rancangan Awal Renja',
                                                'visible' => $akses->get(501),
                                                'items' => [
                                                    ['label' => 'Load Data Rancangan Awal RKPD', 'url' => '/ranwalrenja/loadData', 'visible' => $akses->get(501)],
                                                    ['label' => 'Rancangan Awal Renja', 'url' => '/ranwalrenja/sesuai', 'visible' => $akses->get(501)],
                                                    ['label' => 'Dokumen Ranwal Renja', 'url' => '/ranwalrenja/dokumen', 'visible' => $akses->get(501)],
                                                ]
                                            ],
                                            [
                                                'label' => 'Rancangan Renja',
                                                'visible' =>$akses->get(502),
                                                'items' => [
                                                    ['label' => 'Load Data Rancangan Awal Renja', 'url' => '/renja/loadData', 'visible' => $akses->get(502)],
                                                    ['label' => 'Rancangan Renja', 'url' => '/renja', 'visible' => $akses->get(502)],
                                                    ['label' => 'Dokumen Rancangan Renja', 'url' => '/renja/dokumen', 'visible' => $akses->get(502)],
                                                ]
                                            ],
                                            [
                                                'label' => 'Renja Final',
                                                'visible' => $akses->get(505),
                                                'items' => [
                                                    ['label' => 'Dokumen Renja Final', 'url' => '/renjafinal', 'visible' => $akses->get(505)],
                                                ]
                                            ],
                                            
                                        ]
                                    ],
                                    ['label' => 'Pokok Pikiran DPRD',
                                        'visible' => $akses->getMulti([503,409,504]), 
                                        'items' => [
                                            ['label' => 'Pokok Pikiran DPRD', 'url' => '/pokir', 'visible' => $akses->get(503)],
                                            ['label' => 'Verifikasi Pokir', 'url' => '/pokir/verpokir', 'visible' => $akses->get(409)],
                                            ['label' => 'Tindak Lanjut Unit', 'url' => '/pokir/tlpokir', 'visible' => $akses->get(504)],
                                        ]
                                    ],
                                    [ 'label' => 'Forum Perangkat Daerah', 
                                        'visible' => $akses->getMulti([606,607,610]),
                                       'items' => [
                                            ['label' => 'Load Rancangan Renja', 'url' => '/forumskpd/loadData', 'visible' => $akses->get(606)],
                                            ['label' => 'Forum Perangkat Daerah', 'url' => '/forumskpd', 'visible' => $akses->get(607)],
                                            ['label' => 'Dokumen Forum', 'url' => '/forumskpd/dokumen', 'visible' => $akses->get(610)],
                                        ]
                                    ],
                                    [
                                        'label' => 'Musrenbang RKPD', 
                                        'visible' => $akses->getMulti([601,603,604,605,608,609,611]),
                                        'items' => [
                                            [
                                                'label' => 'Kecamatan',
                                                'visible' => $akses->getMulti([601,603,604,605]),
                                                'items' => [
                                                    ['label' => 'Usulan RW', 'url' => '/musrenrw', 'visible' =>  $akses->get(601)],
                                                    ['label' => 'Usulan Desa', 'url' => '/musrendes', 'visible' => $akses->get(603)],
                                                    ['label' => 'Load Usulan Desa', 'url' => '/musrencam/loadData', 'visible' => $akses->get(604)],
                                                    ['label' => 'Musrenbang', 'url' => '/musrencam', 'visible' => $akses->get(605)],
                                                ]
                                            ],                                            
                                            [
                                                'label' => 'Kota/Kabupaten',
                                                'visible' => $akses->getMulti([608,609,611]),
                                                'items' => [
                                                    ['label' => 'Load Rancangan RKPD', 'url' => '/musrenrkpd/loadData', 'visible' => $akses->get(608)],
                                                    ['label' => 'Musrenbang RKPD', 'url' => '/musrenrkpd', 'visible' => $akses->get(609)],
                                                    ['label' => 'Penyesuaian PD', 'url' => '/musrenrkpd/sesuai', 'visible' => $akses->get(611)],
                                                    ['label' => 'Dokumen Musrenbang RKPD', 'url' => '/musrenrkpd/dokumen', 'visible' => $akses->get(609)],
                                                ]
                                            ],
                                        ]
                                    ],
                                    [
                                        'label' => 'Laporan RKPD & Renja',
                                        'visible' => $akses->getMulti([440,441,442,642,443,540,541,542,641,640,643]),
                                        'items' => [
                                            [
                                                'label' => 'RKPD', 
                                                'visible' => $akses->getMulti([440,441,442,642,443]),
                                                'items' => [
                                                    ['label' => 'RKPD Ranwal', 'url' => '/cetak/rkpdranwal', 'visible' => $akses->get(440)],
                                                    ['label' => 'RKPD dan Musrenbang RKPD', 'url' => '/cetak/rkpdrancangan', 'visible' => $akses->get(441)],
                                                    // ['label' => 'RKPD Akhir', 'url' => '/cetak/rkpdranhir', 'visible' => $akses->get(442)],
                                                    // ['label' => 'Musrenbang RKPD', 'url' => '/cetak/rkpdmusren', 'visible' => $akses->get(642)],
                                                    // ['label' => 'RKPD', 'url' => '/cetak/rkpdfinal', 'visible' => $akses->get(443)],
                                                ]
                                            ],
                                            [   
                                                'label' => 'Renja', 
                                                'visible' => $akses->getMulti([540,541,542]),
                                                'items' => [
                                                    ['label' => 'Renja Ranwal', 'url' => '/cetak/ranwalrenja', 'visible' => $akses->get(540)],
                                                    ['label' => 'Renja Rancangan', 'url' => '/cetak/renja', 'visible' => $akses->get(541)],
                                                    ['label' => 'Renja', 'url' => '/cetak/renjafinal', 'visible' => $akses->get(542)],
                                                ]
                                            ],
                                            ['label' => 'Musrenbang', 'url' => '/cetak/musren', 'visible' => $akses->get(641)],                                            
                                            ['label' => 'Forum OPD', 'url' => '/cetak/forum', 'visible' => $akses->get(640)],                                            
                                            ['label' => 'Pokir Dewan', 'url' => '/cetak/pokir', 'visible' => $akses->get(643)],
                                        ]
                                    ],
                                ]
                            ]);
                        ?>
        </div>
        @endif
    </nav>

    <div id="page-wrapper" style="background-image: linear-gradient(to bottom, rgb(96,108,136) 0%,rgb(63,76,107) 100%);
            background-repeat: no-repeat; background-attachment: fixed;">
        <br>
        @yield('content')
    </div>

</div>
@endsection