<?php
use App\CekAkses;
use hoaaah\LaravelMenu\Menu;
?>

@extends('layouts.parameterlayout')
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
                <h2 style="font-size: 60px;line-height: 60px;margin-bottom: 20px;font-weight: 900;"><span class="highlight">Parameter</span></h2>
                <p style="font-size: 20px;">Referensi, Parameter dan Setting</p>
            </div>
        </div>
        <div class="row">
            <?php
                $akses = new CekAkses();
            ?>

            <div class="col-lg-offset-1 col-sm-12 col-md-12 col-lg-10">
                <div class="features-list">
                    <div class="row">
                        <div class="col-sm-3 col-md-3 col-lg-3">
                            <div class="feature-block bootdey" style="visibility: visible;">
                                @if($akses->get(101)) 
                                <a href="{{ url('/pemda') }}">
                                    <div class="ico fa fa-bank fa-fw"></div>
                                    <div class="name">Pemerintah Daerah</div>
                                </a> 
                                @else
                                <a title="Maaf Anda Tidak Memiliki Akses">
                                    <div class="ico fa fa-bank fa-fw"></div>
                                    <div class="name">Pemerintah Daerah</div>
                                </a>
                                @endif
                                {{-- <div class="text">Satuan biaya berupa harga satuan, tarif yang ditetapkan untuk digunakan dalam penyusunan rencana kerja </div> --}}
                            </div>
                        </div>
                        <div class="col-sm-3 col-md-3 col-lg-3">
                            <div class="feature-block bootdey" style="visibility: visible;">
                                @if($akses->get(102)) 
                                <a href="{{ url('/admin/parameter/kecamatan') }}">
                                    <div class="ico-primary fa fa-map-o fa-fw"></div>
                                    <div class="name">
                                        Wilayah Pemerintahan
                                    </div>
                                </a> 
                                @else
                                <a title="Maaf Anda Tidak Memiliki Akses">
                                    <div class="ico-primary fa fa-map-o fa-fw"></div>
                                    <div class="name">
                                        Wilayah Pemerintahan
                                    </div>
                                </a>
                                @endif
                                {{-- <div class="text">Instrumen untuk mengukur kewajaran antara beban kerja dan belanja dan sebuah aktifitas atau kegiatan </div> --}}
                            </div>
                        </div> 
                        <div class="col-sm-3 col-md-3 col-lg-3">
                            <div class="feature-block bootdey" style="visibility: visible;">
                                @if($akses->get(103)) 
                                <a href="{{ url('/admin/parameter/unit') }}">
                                    <div class="ico-warning fa fa-building-o fa-fw"></div>
                                    <div class="name">
                                        Unit Organisasi
                                    </div>
                                </a> 
                                @else
                                <a title="Maaf Anda Tidak Memiliki Akses">
                                    <div class="ico-warning fa fa-building-o fa-fw"></div>
                                    <div class="name">
                                        Unit Organisasi
                                    </div>
                                </a>
                                @endif
                                {{-- <div class="text">Instrumen untuk mengukur kewajaran antara beban kerja dan belanja dan sebuah aktifitas atau kegiatan </div> --}}
                            </div>
                        </div> 
                        <div class="col-sm-3 col-md-3 col-lg-3">
                            <div class="feature-block bootdey" style="visibility: visible;">
                                @if($akses->get(107)) 
                                <a href="{{ url('/admin/parameter/lokasi') }}">
                                    <div class="ico-info fa fa-location-arrow fa-fw"></div>
                                    <div class="name">
                                        Lokasi
                                    </div>
                                </a> 
                                @else
                                <a title="Maaf Anda Tidak Memiliki Akses">
                                    <div class="ico-info fa fa-location-arrow fa-fw"></div>
                                    <div class="name">
                                        Lokasi
                                    </div>
                                </a>
                                @endif
                                {{-- <div class="text">Instrumen untuk mengukur kewajaran antara beban kerja dan belanja dan sebuah aktifitas atau kegiatan </div> --}}
                            </div>
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-sm-3 col-md-3 col-lg-3">
                            <div class="feature-block bootdey" style="visibility: visible;">
                                @if($akses->get(106)) 
                                <a href="{{ url('/admin/parameter/program') }}">
                                    <div class="ico-danger fa fa-briefcase fa-fw"></div>
                                    <div class="name">
                                        Program - Kegiatan
                                    </div>
                                </a> 
                                @else
                                <a title="Maaf Anda Tidak Memiliki Akses">
                                    <div class="ico-danger fa fa-briefcase fa-fw"></div>
                                    <div class="name">
                                        Program - Kegiatan
                                    </div>
                                </a>
                                @endif
                                {{-- <div class="text">Satuan biaya berupa harga satuan, tarif yang ditetapkan untuk digunakan dalam penyusunan rencana kerja </div> --}}
                            </div>
                        </div>
                        <div class="col-sm-3 col-md-3 col-lg-3">
                            <div class="feature-block bootdey" style="visibility: visible;">
                                @if($akses->get(105)) 
                                <a href="{{ url('/admin/parameter/rekening') }}">
                                    <div class="ico fa fa-money fa-fw"></div>
                                    <div class="name">
                                        Rekening Anggaran
                                    </div>
                                </a> 
                                @else
                                <a title="Maaf Anda Tidak Memiliki Akses">
                                    <div class="ico fa fa-money fa-fw"></div>
                                    <div class="name">
                                        Rekening Anggaran
                                    </div>
                                </a>
                                @endif
                                {{-- <div class="text">Instrumen untuk mengukur kewajaran antara beban kerja dan belanja dan sebuah aktifitas atau kegiatan </div> --}}
                            </div>
                        </div> 
                        <div class="col-sm-3 col-md-3 col-lg-3">
                            <div class="feature-block bootdey" style="visibility: visible;">
                                @if($akses->get(108)) 
                                <a href="{{ url('/admin/parameter/indikator') }}">
                                    <div class="ico-success fa fa-tachometer fa-fw"></div>
                                    <div class="name">
                                        Indikator
                                    </div>
                                </a> 
                                @else
                                <a title="Maaf Anda Tidak Memiliki Akses">
                                    <div class="ico-success fa fa-tachometer fa-fw"></div>
                                    <div class="name">
                                        Indikator
                                    </div>
                                </a>
                                @endif
                                {{-- <div class="text">Instrumen untuk mengukur kewajaran antara beban kerja dan belanja dan sebuah aktifitas atau kegiatan </div> --}}
                            </div>
                        </div> 
                        <div class="col-sm-3 col-md-3 col-lg-3">
                            <div class="feature-block bootdey" style="visibility: visible;">
                                @if($akses->get(111)) 
                                <a href="{{ url('/satuan') }}">
                                    <div class="ico-primary fa fa-cube fa-fw"></div>
                                    <div class="name">
                                        Satuan
                                    </div>
                                </a> 
                                @else
                                <a title="Maaf Anda Tidak Memiliki Akses">
                                    <div class="ico-primary fa fa-cube fa-fw"></div>
                                    <div class="name">
                                        Satuan
                                    </div>
                                </a>
                                @endif
                                {{-- <div class="text">Instrumen untuk mengukur kewajaran antara beban kerja dan belanja dan sebuah aktifitas atau kegiatan </div> --}}
                            </div>
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-3 col-lg-3">
                            <div class="feature-block bootdey" style="visibility: visible;">
                                @if($akses->get(101)) 
                                <a href="{{ url('/agenda') }}">
                                    <div class="ico-success fa fa-calendar fa-fw"></div>
                                    <div class="name">
                                        Agenda Tahunan
                                    </div>
                                </a> 
                                @else
                                <a title="Maaf Anda Tidak Memiliki Akses">
                                    <div class="ico-success fa fa-calendar fa-fw"></div>
                                    <div class="name">
                                        Agenda Tahunan
                                    </div>
                                </a>
                                @endif
                                {{-- <div class="text">Satuan biaya berupa harga satuan, tarif yang ditetapkan untuk digunakan dalam penyusunan rencana kerja </div> --}}
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3 col-lg-3">
                            <div class="feature-block bootdey" style="visibility: visible;">
                                @if($akses->get(110)) 
                                <a href="{{ url('/admin/parameter/user') }}">
                                    <div class="ico-primary fa fa-user fa-fw"></div>
                                    <div class="name">
                                        User Management
                                    </div>
                                </a>
                                @else
                                <a title="Maaf Anda Tidak Memiliki Akses">
                                    <div class="ico-primary fa fa-user fa-fw"></div>
                                    <div class="name">
                                        User Management
                                    </div>
                                </a>
                                @endif
                                {{-- <div class="text">Satuan biaya berupa harga satuan, tarif yang ditetapkan untuk digunakan dalam penyusunan rencana kerja </div> --}}
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3 col-lg-3">
                            <div class="feature-block bootdey" style="visibility: visible;">
                                @if($akses->get(101)) 
                                <a href="{{ url('/setting') }}">
                                    <div class="ico-warning fa fa-wrench fa-fw"></div>
                                    <div class="name">
                                        Setting Aplikasi
                                    </div>
                                </a> 
                                @else
                                <a title="Maaf Anda Tidak Memiliki Akses">
                                    <div class="ico-warning fa fa-wrench fa-fw"></div>
                                    <div class="name">
                                        Setting Aplikasi
                                    </div>
                                </a>
                                @endif
                                {{-- <div class="text">Satuan biaya berupa harga satuan, tarif yang ditetapkan untuk digunakan dalam penyusunan rencana kerja </div> --}}
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3 col-lg-3">
                            <div class="feature-block bootdey" style="visibility: visible;">
                                @if($akses->get(109)) 
                                <a href="{{ url('/admin/parameter/others') }}">
                                    <div class="ico-danger fa fa-life-ring fa-fw"></div>
                                    <div class="name">
                                        Parameter Lainnya
                                    </div>
                                </a> 
                                @else
                                <a title="Maaf Anda Tidak Memiliki Akses">
                                    <div class="ico-danger fa fa-life-ring fa-fw"></div>
                                    <div class="name">
                                        Parameter Lainnya
                                    </div>
                                </a>
                                @endif
                                {{-- <div class="text">Instrumen untuk mengukur kewajaran antara beban kerja dan belanja dan sebuah aktifitas atau kegiatan </div> --}}
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

