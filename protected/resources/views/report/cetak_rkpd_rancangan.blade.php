<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app')
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
    width: 70px;
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
    width: 70px;
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
    width: 70px;
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
    width: 70px;
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
    width: 70px;
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
    width: 70px;
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
    <div class="container">
      <div class="row text-center">
        <div class="col-sm-12 col-md-12 col-lg-12">
          <h2 style="font-size: 40px;line-height: 60px;margin-bottom: 10px;font-weight: 900;"><span
              class="highlight">Laporan RKPD Tahunan</span></h2>
          <br>
        </div>
      </div>
      <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
          <label for="tahun_prarka" class="col-sm-3 control-label" align='left' style="color:#fff;">Tahun :</label>
          <div class="col-sm-2">
            <select class="form-control select2 tahun_prarka" name="tahun_prarka" id="tahun_prarka"></select>
          </div>
        </div>
        <div class="form-group">
          <label for="jns_dokumen" class="col-sm-3 control-label" align='left' style="color:#fff;">Jenis Dokumen
            :</label>
          <div class="col-sm-5">
            <select class="form-control select2 jns_dokumen" name="jns_dokumen" id="jns_dokumen">
              <option value="-1">--Pilih Jenis Dokumen--</option>
              <option value="trx_rkpd_rancangan">RANCANGAN RKPD</option>
              <option value="trx_musrenkab">MUSRENBANG RKPD</option>
              <option value="trx_rkpd_ranhir">RANCANGAN AKHIR RKPD</option>
              <option value="trx_rkpd_final">RKPD FINAL</option>
              <option value="70">RKPD PERUBAHAN</option>
            </select>
          </div>
        </div>
        <div class="form-group hidden">
          <label for="no_dokumen" class="col-sm-3 control-label" align='left' style="color:#fff;">Nomor Dokumen
            :</label>
          <div class="col-sm-8">
            <select class="form-control no_dokumen select2" name="no_dokumen" id="no_dokumen">
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="urusan_prarka" class="col-sm-3 control-label" align='left' style="color:#fff;">Urusan :</label>
          <div class="col-sm-8">
            <select class="form-control select2 urusan_prarka" name="urusan_prarka" id="urusan_prarka"></select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="bidang_prarka" style="color:#fff;">Bidang :</label>
          <div class="col-sm-8">
            <select class="form-control select2 bidang_prarka" name="bidang_prarka" id="bidang_prarka"></select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="unit_prarka" style="color:#fff;">Unit :</label>
          <div class="col-sm-8">
            <select class="form-control select2 unit_prarka" name="unit_prarka" id="unit_prarka"></select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="sub_prarka2" style="color:#fff;">Sub Unit :</label>
          <div class="col-sm-8">
            <select class="form-control select2 sub_prarka2" name="sub_prarka2" id="sub_prarka2"></select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="prog_prarka" style="color:#fff;">Program :</label>
          <div class="col-sm-8">
            <select class="form-control select2 prog_prarka" name="prog_prarka" id="prog_prarka"></select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="keg_prarka" style="color:#fff;">Kegiatan :</label>
          <div class="col-sm-8">
            <select class="form-control select2 keg_prarka" name="keg_prarka" id="keg_prarka"></select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="nama_kota_lap" style="color:#fff;">Kota Laporan</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" id="nama_kota_lap" name="nama_kota_lap" value="Jakarta">
          </div>
        </div>
        <div class="form-group has-feedback">
          <label for="tgl_laporan" class="col-sm-3 control-label" style="color:#fff;">Tanggal Laporan </label>
          <input type="hidden" name="tgl_laporan" id="tgl_laporan">
          <div class="col-sm-3">
            <input type="text" class="form-control datepicker" id="tgl_laporan_x" name="tgl_laporan_x"
              style="text-align: center;">
            <i class="fa fa-calendar fa-fw fa-lg text-primary form-control-feedback"></i>
          </div>
          <div class="col-sm-2 chkTandatangan">
            <label class="checkbox-inline">
              <input class="checkTandatangan" type="checkbox" name="checkTandatangan" id="checkTandatangan" value="1"
                checked><span style="color:#fff;"> Pakai Tanda Tangan</span>
            </label>
          </div>
          <label class="control-label col-sm-2 hidden" for="hal_mulai" style="color:#fff; text-align: right;">Halaman
            Mulai</label>
          <div class="col-sm-1">
            <input type="text" class="form-control number hidden" id="hal_mulai" name="hal_mulai" value="1"
              style="text-align: center;">
          </div>
        </div>
        <div class="form-group">
          <label for="jabatan" class="col-sm-3 control-label" style="color:#fff;">Jabatan </label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="jabatan" name="jabatan" style="text-align: left;">
          </div>
        </div>
        <div class="form-group">
          <label for="nama_pejabat" class="col-sm-3 control-label" style="color:#fff;">Nama </label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="nama_pejabat" name="nama_pejabat" style="text-align: left;">
          </div>
        </div>
        <div class="form-group">
          <label for="nip_pejabat" class="col-sm-3 control-label" style="color:#fff;">NIP </label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="nip_pejabat" name="nip_pejabat" style="text-align: left;">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="jns_laporan" style="color:#fff;">Jenis Laporan :</label>
          <div class="col-sm-8">
            <select class="form-control select2 jns_laporan" name="jns_laporan" id="jns_laporan"></select>
          </div>
        </div>
        <div class="form-group">
          <label for="status_data" class="col-sm-3 control-label" align='left' style="color:#fff;">Status Data
            :</label>
          <div class="col-sm-5">
            <select class="form-control select2 status_data" name="status_data" id="status_data">
              <option value="-1">--Semua Status Data--</option>
              <option value="0">Belum Diposting</option>
              <option value="1">Sudah Diposting</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="jns_laporan" style="color:#fff;"></label>
          <div class="col-sm-8 text-left">
            <button type="button" class="btn btn-labeled btn-success btnProses"><span class="btn-label"><i
                  class="fa fa-print fa-lg fa-fw"></i></span> Proses</button>
          </div>
        </div>
      </form>

    </div>
  </section>
</div>
@endsection
@section('scripts')
<script src="{{ asset('/protected/resources/views/report/js/js_cetak_rkpd_rancangan.js')}}"></script>
@endsection