<?php
use App\CekAkses;
use hoaaah\LaravelMenu\Menu;
?>

@extends('layouts.app6')
<meta name="_token" content="{!! csrf_token() !!}" />


<style>
    h2 {
    font-size: 50px;
    font-weight: 300;
    margin-bottom: 10px;
    line-height: 50px;
    }
    .highlight {
        color: #2ac5ed;
    }
    #content {
        padding: 70px 0;
    }
    #content .features-list {
        padding-top: 35px;
    }
    .features-list .feature-block {
        margin-bottom: 18px;
    }
    .features-list .feature-block .ico {
        font-size: 37px;
        line-height: 70px;
        width:70px;
        height: 70px;
        background: #5accff;
        display: inline-block;
        border-radius: 50%;
        color: #FFFFFF;
        margin-bottom: 10px;
    }

    .features-list .feature-block .ico-primary {
        font-size: 37px;
        line-height: 70px;
        width:70px;
        height: 70px;
        background: #428bca;
        display: inline-block;
        border-radius: 50%;
        color: #FFFFFF;
        margin-bottom: 10px;
    }

    .features-list .feature-block .ico-warning {
        font-size: 37px;
        line-height: 70px;
        width:70px;
        height: 70px;
        background: #f0ad4e;
        display: inline-block;
        border-radius: 50%;
        color: #FFFFFF;
        margin-bottom: 10px;
    }

    .features-list .feature-block .ico-danger {
        font-size: 37px;
        line-height: 70px;
        width:70px;
        height: 70px;
        background: #d9534f;
        display: inline-block;
        border-radius: 50%;
        color: #FFFFFF;
        margin-bottom: 10px;
    }

    .features-list .feature-block .ico-info {
        font-size: 37px;
        line-height: 70px;
        width:70px;
        height: 70px;
        background: #5bc0de;
        display: inline-block;
        border-radius: 50%;
        color: #FFFFFF;
        margin-bottom: 10px;
    }

    .features-list .feature-block .ico-success {
        font-size: 37px;
        line-height: 70px;
        width:70px;
        height: 70px;
        background: #5cb85c;
        display: inline-block;
        border-radius: 50%;
        color: #FFFFFF;
        margin-bottom: 10px;
    }

    .features-list .feature-block.bottom-line .ico {
        width: auto;
        height: auto;
      background: transparent;
      color: #5accff;
      text-align: center;
      font-size: 41px;
      vertical-align: top;
      margin-top: -10px;
    }
    .features-list .feature-block.bottom-line .fa-github {
      font-size: 50px;
    }
    .features-list .feature-block.bottom-line .fa-dashboard {
      font-size: 45px;
      margin-top: -15px;
    }
    .features-list .feature-block.bottom-line .ico {
      float: left;
      margin-right: 15px;
      margin-left: 21px;
    }
    .features-list .feature-block.bottom-line .features-content {
      padding-right: 15px;
      display: table;
    }
    .features-list .feature-block.bottom-line .features-content .name {
      margin-bottom: 5px;
    }
    .features-list .feature-block.bottom-line .features-content .subname {
      font-size: 16px;
      margin-bottom: 12px;
    }
    .features-list .feature-block .name {
        font-size: 16px;
        line-height: 1.25em;
        font-weight: bold;
        margin-bottom: 10px;
    }
    .features-list .feature-block .text {
        font-size: 12px;
        line-height: normal;
        margin-bottom: 15px;
    }
                
</style>

@section('content')
<div class="container-fluid">
<section id="content" class="current">
    <div class="container text-center">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                {{-- <h2>SSH & ASB</h2> --}}
                <h2 style="font-size: 60px;line-height: 60px;margin-bottom: 20px;font-weight: 900;"><span class="highlight">API</span></h2>
                <p style="font-size: 20px;">Application Programming Interface Management</p>
            </div>
        </div>
        <div class="row">
            <?php
                $akses = new CekAkses();
            ?>

            <div class="col-lg-offset-1 col-sm-12 col-md-12 col-lg-10">
                <div class="features-list">
                    <div class="row">
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="feature-block bootdey" style="visibility: visible;">
                                @if($akses->get(101)) 
                                <a href="{{ url('/') }}">
                                    <div class="ico fa fa-bank fa-fw"></div>
                                    <div class="name">Simda Keuangan</div>
                                </a> 
                                @else
                                <a title="Maaf Anda Tidak Memiliki Akses">
                                    <div class="ico fa fa-bank fa-fw"></div>
                                    <div class="name">Simda Keuangan</div>
                                </a>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="feature-block bootdey" style="visibility: visible;">
                                @if($akses->get(102)) 
                                <a href="{{ url('/transfer/transbangda') }}">
                                    <div class="ico-primary fa fa-map-o fa-fw"></div>
                                    <div class="name">
                                        SIPD - Kemendagri
                                    </div>
                                </a> 
                                @else
                                <a title="Maaf Anda Tidak Memiliki Akses">
                                    <div class="ico-primary fa fa-map-o fa-fw"></div>
                                    <div class="name">
                                        SIPD - Kemendagri
                                    </div>
                                </a>
                                @endif
                            </div>
                        </div> 
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="feature-block bootdey" style="visibility: visible;">
                                @if($akses->get(103)) 
                                <a href="{{ url('/') }}">
                                    <div class="ico-warning fa fa-building-o fa-fw"></div>
                                    <div class="name">
                                        Krisna - Bappenas
                                    </div>
                                </a> 
                                @else
                                <a title="Maaf Anda Tidak Memiliki Akses">
                                    <div class="ico-warning fa fa-building-o fa-fw"></div>
                                    <div class="name">
                                        Krisna - Bappenas
                                    </div>
                                </a>
                                @endif
                            </div>
                        </div>                                                
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
</div> 
@endsection

