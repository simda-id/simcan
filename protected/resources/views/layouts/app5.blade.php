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
    
    @yield('css')

    @yield('head')
    <style>        
        h1.padding {
            padding-right: 1cm;
        }
        #radioBtn .notActive{
            color: #b5b6b7;
            background-color: #fff;
        }
    </style>
</head>
<body >
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            {{-- <div class="container"> --}}
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
                      <i class="fa fa-home fa-stack-1x"></i>
                    </span> simd@<strong>Perencanaan</strong> </a>
                    @if ( Session::get('AppType') === 0 )
                        <span class="label" style="background-color: #3a87ad; color:#fff;"> {{Session::get('versiApp')}} - Provinsi </span>
                        @else
                            <span class="label" style="background-color: #f89406; color:#fff;"> {{Session::get('versiApp')}} </span>
                        @endif
                </div>

                    <ul class="nav navbar-top-links pull-right">
                        <span style="color:#fff">
                            <i class="fa fa-flag fa-fw"></i> Tahun Anggaran: <?= Session::get('tahun') != NULL ? Session::get('tahun') : 'Pilih!' ?></i>
                        </span>
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
                                    [   'label' => 'Data Dasar', 
                                        'visible' => $akses->get(20),
                                        'url' => '/kindatadasar',
                                        
                                    ],
                                    [
                                        'label' => 'Pemda',
                                        'visible' => $akses->get(20),
                                        'url' => '/kinpemda'
                                    ],                                    
                                    [
                                        'label' => 'Perangkat Daerah',
                                        'visible' => $akses->get(30),
                                        'url' => '/kinskpd'
                                    ],
                                    [
                                        'label' => 'Laporan',
                                        'visible' => $akses->get(30),
                                        'url' => '/'
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
        <script src="{{ asset('/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('/js/dataTables.checkboxes.min.js') }}"></script>
        <script src="{{ asset('/js/input.js')}}"></script>
        <script src="{{ asset('/js/jquery.number.js')}}"></script>
        <script src="{{ asset('vendor/metisMenu/metisMenu.min.js')}}"></script>
        <script src="{{ asset('/js/sb-admin-2.js')}}"></script>
        <script src="{{ asset('/js/datepicker-id.js')}}"></script>
        <script type="text/javascript">
            function formatTgl(val_tanggal){
                var formattedDate = new Date(val_tanggal);
                var d = formattedDate.getDate();
                var m = formattedDate.getMonth();
                var y = formattedDate.getFullYear();
                var m_names = new Array("Januari", "Februari", "Maret", 
                  "April", "Mei", "Juni", "Juli", "Agustus", "September", 
                  "Oktober", "November", "Desember")
    
                var tgl= d + " " + m_names[m] + " " + y;
                return tgl;
            };

            function hariIni(){
                var today = new Date();
                var dd = today.getDate();
                var mm = today.getMonth()+1; //January is 0!
                var yyyy = today.getFullYear();

                var hariIni = yyyy + '-' + mm + '-' + dd;
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
