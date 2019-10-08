@extends('layouts.baselineLayout')
<?php
use App\CekAkses;
use hoaaah\LaravelMenu\Menu;

?>
@section('layoutBody')
<div id="wrapper">
    <nav class="navbar navbar-default navbar-static-top" role="navigation"
        style="margin-bottom: 0; background: #0E203A; border-color: #ccc; color:#fff;">
        {{-- <div class="container"> --}}
        <div class="navbar-header" style="color: #fff;">
            <!-- Branding Image -->
            <a class="navbar-brand navbar-right" href="{{ url('/home') }}"
                style="margin-top: -5px; margin-left: 10px; max-height: 40px;">
                <span class="fa-stack">
                    <i class="fa fa-square-o fa-stack-2x text-info"></i>
                    <i class="fa fa-home fa-stack-1x" style="color:#fff"></i>
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
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu dropdown-user" role="menu">
                    <li>
                        <a href="{{ url('/home') }}"><i class="fa fa-home fa-fw text-info"></i> Home</a>
                        <a href="{{ route('logout') }}"
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
                                'options' => [ 'ulId' => 'side-menu'],
                                'items' => [
                                    ['label' => 'Modul RPJMD dan Renstra', 'icon'=>'fa fa-newspaper-o fa-fw fa-lg','url' => '/rpjmd/dash'],
                                    [
                                        'label' => 'Pra RPJMD',
                                        'visible' => $akses->getMulti([290,291,292]),
                                        'items' => [ 
                                            ['label' => 'Analisa Capaian IKK', 'icon' => 'fa fa-blind fa-fw','url' => '/amh','visible' => $akses->get(290)],                       
                                            ['label' => 'Identifikasi Masalah', 'icon' => 'fa fa-desktop fa-fw', 'url' => '/pdrb','visible' => $akses->get(291)],
                                            ['label' => 'Identifikasi Prioritas', 'icon' => 'fa fa-newspaper-o fa-fw','url' => '/prarpjmd/prioritas','visible' => $akses->get(292)],
                                        ],        
                                    ],
                                    [
                                        'label' => 'RPJMD',
                                        'visible' => $akses->get(201),
                                        'items' => [
                                           // ['label' => 'RPJMD Teknokratik', 'url' => '/rpjmd/rancangan', 'visible' => $akses->get(20)],
                                          //  ['label' => 'RPJMD Rancangan Awal', 'url' => '/rpjmd/rancangan', 'visible' => $akses->get(20)],
                                          //  ['label' => 'RPJMD Rancangan', 'url' => '/rpjmd/rancangan', 'visible' => $akses->get(20)],
                                          //  ['label' => 'RPJMD Musrenbang', 'url' => '/rpjmd/rancangan', 'visible' => $akses->get(20)],
                                          //  ['label' => 'RPJMD Rancangan Akhir', 'url' => '/rpjmd/rancangan', 'visible' => $akses->get(20)],
                                            ['label' => 'RPJMD', 'url' => '/rpjmd', 'visible' => $akses->get(201)],
                                        ]
                                    ],                                    
                                    [
                                        'label' => 'Renstra Perangkat Daerah',
                                        'visible' => $akses->get(301),
                                        'items' => [
                                           // ['label' => 'Renstra Rancangan Awal', 'url' => '/renstra', 'visible' => $akses->get(30)],
                                          //  ['label' => 'Renstra Rancangan', 'url' => '/renstra', 'visible' => $akses->get(30)],
                                           // ['label' => 'Renstra Rancangan Akhir', 'url' => '/renstra', 'visible' => $akses->get(30)],
                                            ['label' => 'Renstra', 'url' => '/renstra', 'visible' => $akses->get(301)],
                                        ]
                                    ],
                                    [
                                        'label' => 'Indikator Kinerja',
                                        'visible' => $akses->get(108),
                                        'items' => [
                                            ['label' => 'Indikator Kinerja', 'url' => '/admin/parameter/indikator','visible' => $akses->get(108)],
                                        ]
                                    ],
                                    [
                                        'label' => 'Pencetakan RPJMD & Renstra',
                                        'visible' => $akses->getMulti([202,302]),
                                        'items' => [
                                            ['label' => 'Cetak RPJMD', 'url' => '/cetak/rpjmd', 'visible' => $akses->get(202)],
                                            ['label' => 'Cetak Renstra', 'url' => '/cetak/renstra', 'visible' => $akses->get(302)],
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
@endsection