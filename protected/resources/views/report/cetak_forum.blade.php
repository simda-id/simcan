<?php
use App\CekAkses;
use hoaaah\LaravelMenu\Menu;
?>

@extends('layouts.app')
<meta name="_token" content="{!! csrf_token() !!}" />

@section('content')
<div class="container-fluid">
  <div id="pesan"></div>
  <div id="prosesbar" class="lds-spinner">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div>
  <section id="content" class="current">
    <div class="container">
      <div class="row text-center">
        <div class="col-sm-12 col-md-12 col-lg-12">
          <h2 style="font-size: 40px;line-height: 60px;margin-bottom: 10px;font-weight: 900; color:#fff;"><span
              class="highlight">Laporan Forum OPD Tahunan</span></h2>
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
          <label for="urusan_prarka" class="col-sm-3 control-label" align='left' style="color:#fff;">Urusan :</label>
          <div class="col-sm-4">
            <select class="form-control select2 urusan_prarka" name="urusan_prarka" id="urusan_prarka"></select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="bidang_prarka" style="color:#fff;">Bidang :</label>
          <div class="col-sm-6">
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
          <label class="control-label col-sm-3" for="status_data" style="color:#fff;">Status Data :</label>
          <div class="col-sm-3">
            <select class="form-control select2 status_data" name="status_data" id="status_data">
              <option value="-1">Semua Data</option>
              <option value="0">Belum Posting</option>
              <option value="1">Posting</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="jns_laporan" style="color:#fff;">Jenis Laporan :</label>
          <div class="col-sm-6">
            <select class="form-control select2 jns_laporan" name="jns_laporan" id="jns_laporan"></select>
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
<script src="{{ asset('/protected/resources/views/report/js/js_cetak_forum.js')}}"></script>
@endsection