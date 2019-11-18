@extends('layouts.baselineLayout')
<?php
use App\CekAkses;
use hoaaah\LaravelMenu\Menu;

?>
@section('layoutBody')
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
                </span><span style="color:#fff"> simd@<strong>Integrated</strong> :: {{Session::get('xPemda')}}</span>
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
                                'options' => [
                                    'ulId' => 'side-menu'
                                ],
                                'items' => [
                                    [   'label' => 'Modul SSH dan ASB',
                                        'icon'=>'fa fa-database fa-fw fa-lg' , 
                                        'url' => '/asb/dash'],
                                    [
                                        'label' => 'Standard Satuan Harga',
                                        'icon' => 'fa fa-book fa-fw', 
                                        'visible' => $akses->getMulti([801,802,803,804]),
                                        'items' => [
                                            ['label' => 'Zona SSH','url' => '/zonassh', 'visible' => $akses->get(801)],
                                            ['label' => 'Struktur SSH', 'url' => '/ssh', 'visible' => $akses->get(802)],
                                            ['label' => 'Perkada SSH', 'url' => '/sshperkada/perkada','visible' => $akses->get(803)],
                                            ['label' => 'Hibah & Bantuan Sosial','url' => '/bansos','visible' => $akses->get(808)],
                                            ['label' => 'Pencetakan SSH','url' => '/printSsh','visible' => $akses->get(804)],
                                        ]
                                    ],                                    
                                    [
                                        'label' => 'Analisis Standar Belanja',
                                        'icon' => 'fa fa-bookmark fa-fw', 
                                        'visible' => $akses->getMulti([805,806]),
                                        'items' => [
                                            ['label' => 'Perkada & Struktur ASB','url' => '/asb/aktivitas','visible' => $akses->get(805)],
                                            ['label' => 'Perhitungan ASB','url' => '/asb/hitungasb','visible' => $akses->get(806)],
                                        ]
                                    ],
                                    /*[
                                        'label' => 'Pencetakan SSH & ASB',
                                        'icon' => 'fa fa-bookmark fa-fw', 
                                        'visible' => $akses->get(806)||$akses->get(808),
                                        'items' => [
                                            ['label' => 'Standard Satuan Harga','url' => '/printSsh','visible' => $akses->get(805)],
                                            ['label' => 'Analisis Standar Belanja','url' => '/printSsh','visible' => $akses->get(806)],
                                        ]
                                    ],*/
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