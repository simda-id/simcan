@extends('layouts.app0')
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
        font-size: 32px;
        line-height: 1.25em;
        font-weight: bold;
        margin-bottom: 10px;
    }
    .features-list .feature-block .text {
        font-size: 16px;
        line-height: normal;
        margin-bottom: 15px;
    }
</style>

@section('content')
<div class="container bootstrap snippet">
<section id="content" class="current">
    <div class="container text-center">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                {{-- <h2>SSH & ASB</h2> --}}
                <h2 style="font-size: 60px;line-height: 60px;margin-bottom: 20px;font-weight: 900;"><span class="highlight">SSH </span>& <span class="highlight">ASB</span></h2>
                <p style="font-size: 20px;"><strong>Standar Satuan Harga</strong> dan  <strong>Analisis Standar Belanja</strong>
                  <br>sebagai jembatan untuk menghubungkan antara proses perencanaan dengan proses penganggaran.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-offset-1 col-sm-12 col-md-12 col-lg-10">
                <div class="features-list">
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="feature-block bootdey" style="visibility: visible;">
                                <div class="ico fa fa-gg fa-fw"></div>
                                <div class="name">
                                    Standar Satuan Harga
                                </div>
                                <div class="text">Satuan biaya berupa harga satuan, tarif yang ditetapkan untuk digunakan dalam penyusunan rencana kerja </div>
                                {{-- <div class="more">
                                    <a href="../ssh" class="btn btn-default btn-sm" style="font-size: 14px;">Detail...</a>
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="feature-block bootdey" style="visibility: visible;">
                                <div class="ico fa fa-ils fa-fw"></div>
                                <div class="name">
                                    Analisis Standar Belanja
                                </div>
                                <div class="text">Instrumen untuk mengukur kewajaran antara beban kerja dan belanja dan sebuah aktifitas atau kegiatan </div>
                                {{-- <div class="more">
                                    <a href="../asb/aktivitas" class="btn btn-default btn-sm" style="font-size: 14px;">Detail...</a>
                                </div> --}}
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

