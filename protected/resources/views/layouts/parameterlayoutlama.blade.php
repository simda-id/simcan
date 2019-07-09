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
                    <a class="navbar-brand navbar-right" href="{{ url('/home') }}">simd@<strong>Perencanaan</strong> ver <strong>1.0 </strong><i><sub>{{Session::get('versiApp')}}</sub></i></strong></a>
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
                                        ['label' => 'Kecamatan-Desa', 'url' => '/','visible' => $akses->get(102)],
                                        ['label' => 'Unit Organisasi', 'url' => '/','visible' => $akses->get(103)],
                                        ['label' => 'Urusan Bidang', 'url' => '/','visible' => $akses->get(104)],
                                        ['label' => 'Rekening Anggaran', 'url' => '/','visible' => $akses->get(105)],
                                        ['label' => 'Program Kegiatan SKPD', 'url' => '/','visible' => $akses->get(106)],
                                        ['label' => 'Lokasi Non-Wilayah', 'url' => '/','visible' => $akses->get(107)],
                                        ['label' => 'Indikator', 'url' => '/','visible' => $akses->get(108)],
                                        ['label' => 'Satuan', 'url' => '/satuan','visible' => $akses->get(111)],
                                        ['label' => 'Setting Aplikasi', 'url' => '/','visible' => $akses->get(109)],
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
        <script src="{{ asset('/js/datepicker-id.js')}}"></script>

        @yield('scripts')

</body>
</html>
