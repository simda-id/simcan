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
                            ['label' => 'Update', 'icon' => 'fa fa-home', 'url' => '/admin/update'], 
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