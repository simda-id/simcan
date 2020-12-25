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

        @yield('css')

        @yield('head')
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
                style="margin-bottom: 0; background: #0E203A; border-color: #ccc; color:#fff;">
                <div class="navbar-header">
                    <a class="navbar-brand navbar-right" href="{{ url('/home') }}"
                        style="margin-top: -5px; margin-left: 10px; max-height: 40px;">
                        <span class="fa-stack">
                            <i class="fa fa-square-o fa-stack-2x text-info"></i>
                            <i class="fa fa-home fa-stack-1x" style="color:#fff"></i>
                        </span>
                        <span style="color:#fff"> simd@<strong>Integrated</strong> :: {{Session::get('xPemda')}}</span>
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
                                    [   'label' => 'Simda Keuangan', 
                                        'visible' => $akses->get(890),
                                        'items' => [
                                            [   'label' => 'Sinkronisasi Parameter', 
                                                'visible' => $akses->get(890),
                                                'items' => [
                                                    ['label' => 'Sinkronisasi Urusan-Bidang 13', 'url' => '/transfer/sinkUrusan'],
                                                    ['label' => 'Sinkronisasi Program-Kegiatan 13', 'url' => '/transfer/sinkProgram'],
                                                    ['label' => 'Sinkronisasi Rekening Anggaran 13', 'url' => '/transfer/sinkRekening'],
                                                    ['label' => 'Sinkronisasi Unit OPD 13', 'url' => '/transfer/sinkOpd'],
                                                    ['label' => 'Sinkronisasi Sumber Dana', 'url' => '/transfer/sinkSumberDana'],
                                                    ['label' => 'Sinkronisasi Mapping Keuangan 90', 'url' => '/transfer/sinkMappingKeu'],
                                                ]
                                            ],
                                            ['label' => 'Sinkronisasi APBD-13', 'url' => '/transfer/transsimda', 'visible' => $akses->get(890)],
                                            ['label' => 'Sinkronisasi APBD-90', 'url' => '/transfer/transsimda90', 'visible' => $akses->get(890)],
                                        ]
                                        
                                    ],
                                    [ 'label' => 'SIPD Kemendagri',
                                        'visible' => $akses->get(891),
                                        'items' => [
                                            // ['label' => 'RKPD Ranwal', 'url' => '/transfer/transranwal', 'visible' => $akses->get(891)],
                                            ['label' => 'RKPD', 'url' => '/transfer/transbangda', 'visible' => $akses->get(891)],
                                        ]
                                    
                                    ],                                  
                                    [
                                        'label' => 'KRISNA Bappenas',
                                        'visible' => $akses->get(892),
                                        'url' => '/'
                                    ],                                   
                                    [
                                        'label' => 'Setting API',
                                        'visible' => $akses->get(893),
                                        'url' => '/transfer/settingApi'
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
        <script src="{{ asset('/js/select2.js')}}"></script>
        <script src="{{ asset('/js/Chart.bundle.js') }}"></script>
        <script type="text/javascript">
            $('[data-toggle="popover"]').popover();
              $('.select2').select2({ width: '100%' });
              $('.number').number(true,0,',', '.');
        
                    function createPesan(message, type) {
                      var html = '<div id="pesanx" class="alert alert-' + type + ' alert-dismissable flyover flyover-bottom in">';    
                      html += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';   
                      html += '<p><strong>'+message+'</strong></p>';
                      html += '</div>';    
                      $(html).hide().prependTo('#pesan').slideDown();
        
                      setTimeout(function() {
                        $('#pesanx').removeClass('in');
                      }, 1500);
                    };
        
                    $('.page-alert .close').click(function(e) {
                        e.preventDefault();
                        $(this).closest('.page-alert').slideUp();
                    });
        
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
        
                    var angkaNip = document.getElementsByClassName( 'nip' );
                    
                    angkaNip.onkeydown = function ( e ) {
                    if ( !( ( e.keyCode > 95 && e.keyCode < 106 ) || ( e.keyCode> 47 && e.keyCode < 58 ) ) ) { return false; } };
        
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