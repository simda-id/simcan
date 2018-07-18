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
                    </span> simd@<strong>Perencanaan</strong> ver <strong>1.0 </strong></a>
            </div>
            <ul class="nav navbar-top-links pull-right">
                        <li>
                            <a>
                                <i class="fa fa-flag fa-fw"></i> Tahun Anggaran: <?= Session::get('tahun') != NULL ? Session::get('tahun') : 'Pilih!' ?></i>
                            </a>
                        </li>

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
                            ['label' => 'Data Pendukung', 'icon'=>'fa fa-database fa-fw fa-lg', 'url' => '#'],                            
                            ['label' => 'PDRB Harga Konstan', 'icon' => 'fa fa-desktop fa-fw', 'url' => '/pdrb','visible' => $akses->get(101)],
                            ['label' => 'PDRB Harga Berlaku', 'icon' => 'fa fa-newspaper-o fa-fw','url' => '/pdrbhb','visible' => $akses->get(101)],
                            ['label' => 'Angka Melek Huruf', 'icon' => 'fa fa-blind fa-fw','url' => '/amh','visible' => $akses->get(101)],
                            ['label' => 'Rata Lama Sekolah', 'icon' => 'fa fa-hourglass-o fa-fw','url' => '/ratalamasekolah','visible' => $akses->get(101)],
                            ['label' => 'Angka Partisipasi Sekolah', 'icon' => 'fa fa-snowflake-o fa-fw','url' => '/aps','visible' => $akses->get(101)],
                            ['label' => 'Rasio Guru dan Murid', 'icon' => 'fa fa-users fa-fw','url' => '/gurumurid','visible' => $akses->get(101)],
                            ['label' => 'Ketersediaan Sekolah', 'icon' => 'fa fa-building-o fa-fw','url' => '/kts','visible' => $akses->get(101)],
                            ['label' => 'Kesenian, Budaya & Olahraga', 'icon' => 'fa fa-bank fa-fw','url' => '/senior','visible' => $akses->get(101)],
                            ['label' => 'Investor PMDN/PMA', 'icon' => 'fa fa-suitcase fa-fw','url' => '/investor','visible' => $akses->get(101)],
                            ['label' => 'Investasi PMDN/PMA', 'icon' => 'fa fa-money fa-fw','url' => '/investasi','visible' => $akses->get(101)],                                
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