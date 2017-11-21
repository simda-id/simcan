@extends('layouts.baselineLayout')
<?php
use App\CekAkses;
use hoaaah\LaravelMenu\Menu;

?>
@section('layoutBody')
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
                <a class="navbar-brand navbar-right" href="{{ url('/home') }}">
                 <span class="fa-stack">
                      <i class="fa fa-square-o fa-stack-2x text-info"></i>
                      <i class="fa fa-home fa-stack-1x text-info"></i>
                    </span> simd@<strong>Perencanaan</strong> ver <strong>1.0 </strong><i><sub>{{Session::get('versiApp')}}</sub></i></strong></a>
            </div>
            <ul class="nav navbar-top-links navbar-right">
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
                                            <i class="fa fa-sign-out fa-fw text-info"> Logout</i>
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
                            // ['label' => 'Dashboard', 'icon' => 'fa fa-home', 'url' => '/admin/parameter'],
                            ['label' => 'Pengelolaan User', 
                                'visible' => $akses->get(110),
                                'items' => [
                                    ['label' => 'Daftar User', 'url' => '/admin/parameter/user','visible' => $akses->get(110)],
                                    ['label' => 'Group User', 'url' => '/admin/parameter/user/group','visible' => $akses->get(110)],
                                ]
                            ],                        
                            [
                                'label' => 'Parameter',
                                'visible' => $akses->getMulti([101, 102, 103, 104, 105, 106, 107, 108, 109, 111]),
                                'items' => [
                                    ['label' => 'Pemda', 'url' => '/pemda','visible' => $akses->get(101)],
                                    ['label' => 'Kecamatan-Desa', 'url' => '/admin/parameter/kecamatan','visible' => $akses->get(102)],
                                    ['label' => 'Unit Organisasi', 'url' => '/admin/parameter/unit','visible' => $akses->get(103)],
                                    // ['label' => 'Urusan Bidang', 'url' => '/','visible' => $akses->get(104)],
                                    ['label' => 'Rekening Anggaran', 'url' => '/admin/parameter/rekening','visible' => $akses->get(105)],
                                    ['label' => 'Program Kegiatan', 'url' => '/admin/parameter/program','visible' => $akses->get(106)],
                                    // ['label' => 'Prioritas & Program Nasional', 'url' => '/admin/parameter/prognas','visible' => $akses->get(106)],
                                    // ['label' => 'Prioritas & Program Provinsi', 'url' => '/admin/parameter/progprov','visible' => $akses->get(106)],
                                    ['label' => 'Lokasi', 'url' => '/admin/parameter/lokasi','visible' => $akses->get(107)],
                                    ['label' => 'Indikator', 'url' => '/admin/parameter/indikator','visible' => $akses->get(108)],
                                    ['label' => 'Satuan', 'url' => '/satuan','visible' => $akses->get(111)],
                                    ['label' => 'Setting Aplikasi', 'url' => '/setting','visible' => $akses->get(109)],
                                    ['label' => 'Parameter Lainnya', 'url' => '/admin/parameter/others','visible' => $akses->get(109)],
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
@endsection