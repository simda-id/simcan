<?php
use App\CekAkses;
use hoaaah\LaravelMenu\Menu;
?>

@extends('layouts.app2')
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
                <h2 style="font-size: 40px;line-height: 60px;margin-bottom: 10px;font-weight: 900;"><span class="highlight">Laporan APBD Tahunan</span></h2>
                <br>
            </div>
        </div>
        <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group">
                <label for="tahun_prarka" class="col-sm-3 control-label" align='left'>Tahun :</label>
                <div class="col-sm-8">
                    <select class="form-control tahun_prarka" name="tahun_prarka" id="tahun_prarka"></select>
                </div>
              </div>
              <div class="form-group">
                <label for="no_dokumen" class="col-sm-3 control-label" align='left'>Nomor Dokumen :</label>
                <div class="col-sm-8">
                    <select class="form-control no_dokumen" name="no_dokumen" id="no_dokumen"></select>
                </div>
              </div>
              <div class="form-group">
                <label for="urusan_prarka" class="col-sm-3 control-label" align='left'>Urusan :</label>
                <div class="col-sm-8">
                    <select class="form-control urusan_prarka" name="urusan_prarka" id="urusan_prarka"></select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="bidang_prarka">Bidang :</label>
                <div class="col-sm-8">
                    <select class="form-control bidang_prarka" name="bidang_prarka" id="bidang_prarka"></select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="unit_prarka">Unit :</label>
                <div class="col-sm-8">
                    <select class="form-control unit_prarka" name="unit_prarka" id="unit_prarka"></select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="sub_prarka2">Sub Unit :</label>
                <div class="col-sm-8">
                    <select class="form-control sub_prarka2" name="sub_prarka2" id="sub_prarka2"></select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="prog_prarka">Program :</label>
                <div class="col-sm-8">
                    <select class="form-control prog_prarka" name="prog_prarka" id="prog_prarka"></select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="keg_prarka">Kegiatan :</label>
                <div class="col-sm-8">
                    <select class="form-control keg_prarka" name="keg_prarka" id="keg_prarka"></select>
                </div>
              </div> 
              <div class="form-group">
                <label class="control-label col-sm-3" for="jns_laporan">Jenis Laporan :</label>
                <div class="col-sm-8">
                    <select class="form-control jns_laporan" name="jns_laporan" id="jns_laporan"></select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="jns_laporan"></label>
                <div class="col-sm-8 text-left">
                    <button type="button" class="btn btn-labeled btn-success btnProses"><span class="btn-label"><i class="fa fa-print fa-lg fa-fw"></i></span> Proses</button>  
                </div>
              </div>                            
        </form>

    </div>
</section>
</div> 

@endsection
@section('scripts')
  <script src="{{ asset('/protected/resources/views/report/js/js_cetak_apbd.js')}}"></script>
@endsection

