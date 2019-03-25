<?php
use App\CekAkses;
use hoaaah\LaravelMenu\Menu;
?>

@extends('layouts.app4')
<meta name="_token" content="{!! csrf_token() !!}" />

@section('content')
<div class="container-fluid">   
        <div id="pesan"></div>
        <div id="prosesbar" class="lds-spinner">
          <div></div><div></div><div></div><div></div>
          <div></div><div></div><div></div><div></div>
          <div></div><div></div><div></div><div></div>
        </div>
        <div class="container text-center">
        <div class="row">
            <h4 style="font-size: 32px;line-height: 60px;margin-bottom: 10px;font-weight: 900;color:#fff;"><span class="highlight">Pelaporan Kinerja SAKIP</span></h4>
            <hr style="border-top: 3px double #fff">
        </div>
        </div>
        <div class="col-sm-6" style="border-right : 3px double #fff;">
        <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="cb_tahun" class="col-sm-3 control-label" align='left' style="color:#fff;">Tahun</label>
                    <div class="col-sm-8">
                        <select class="form-control cb_tahun" name="cb_tahun" id="cb_tahun"></select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="cb_triwulan" class="col-sm-3 control-label" align='left' style="color:#fff;">Triwulan</label>
                    <div class="col-sm-8">
                        <select class="form-control cb_triwulan" name="cb_triwulan" id="cb_triwulan">
                            <option value=0>Semua Triwulan</option>
                            <option value=1>Triwulan 1</option>
                            <option value=2>Triwulan 2</option>
                            <option value=3>Triwulan 3</option>
                            <option value=4>Triwulan 4</option>
                        </select>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="cb_no_perda" class="col-sm-3 control-label" align='left' style="color:#fff;">Nomor Perda RPJMD</label>
                    <div class="col-sm-8">
                        <select class="form-control cb_no_perda" name="cb_no_perda" id="cb_no_perda"></select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="cb_iku_pemda" class="col-sm-3 control-label" align='left' style="color:#fff;">Nomor Dokumen IKU Pemda</label>
                    <div class="col-sm-8">
                        <select class="form-control cb_iku_pemda" name="cb_iku_pemda" id="cb_iku_pemda"></select>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="urusan_pokin" class="col-sm-3 control-label" align='left' style="color:#fff;">Urusan</label>
                    <div class="col-sm-8">
                        <select class="form-control urusan_pokin" name="urusan_pokin" id="urusan_pokin"></select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="bidang_pokin" style="color:#fff;">Bidang</label>
                    <div class="col-sm-8">
                        <select class="form-control bidang_pokin" name="bidang_pokin" id="bidang_pokin"></select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="cb_unit_renstra" class="col-sm-3 control-label" align='left' style="color:#fff;">Unit Renstra</label>
                    <div class="col-sm-8">
                        <select class="form-control cb_unit_renstra" name="cb_unit_renstra" id="cb_unit_renstra"></select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="cb_level_1" class="col-sm-3 control-label" align='left' style="color:#fff;">Jabatan Eselon Level 1</label>
                    <div class="col-sm-8">
                        <select class="form-control cb_level_1" name="cb_level_1" id="cb_level_1"></select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="cb_level_2" class="col-sm-3 control-label" align='left' style="color:#fff;">Jabatan Eselon Level 2</label>
                    <div class="col-sm-8">
                        <select class="form-control cb_level_2" name="cb_level_2" id="cb_level_2"></select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="cb_level_3" class="col-sm-3 control-label" align='left' style="color:#fff;">Jabatan Eselon Level 3</label>
                    <div class="col-sm-8">
                        <select class="form-control cb_level_3" name="cb_level_3" id="cb_level_3"></select>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="cb_no_renstra" class="col-sm-3 control-label" align='left' style="color:#fff;">Nomor Dokumen Renstra</label>
                    <div class="col-sm-8">
                        <select class="form-control cb_no_renstra" name="cb_no_renstra" id="cb_no_renstra"></select>
                    </div>
                </div>
                <div class="form-group">
                  <label for="cb_iku_opd" class="col-sm-3 control-label" align='left' style="color:#fff;">Nomor Dokumen IKU OPD</label>
                  <div class="col-sm-8">
                      <select class="form-control cb_iku_opd" name="cb_iku_opd" id="cb_iku_opd"></select>
                  </div>
                </div>
                <hr>
                                        
        </form>
        </div>
        <div class="col-sm-6" >
            <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
                <div class="form-group">
                    <label class="control-label col-sm-3" for="nama_kota_lap" style="color:#fff;">Kota Laporan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nama_kota_lap" name="nama_kota_lap">
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <label for="tgl_laporan" class="col-sm-3 control-label" style="color:#fff;">Tanggal Laporan </label>
                    <input type="hidden" name="tgl_laporan" id="tgl_laporan">
                    <div class="col-sm-5">
                        <input type="text" class="form-control datepicker" id="tgl_laporan_x" name="tgl_laporan_x" style="text-align: center;">
                        <i class="fa fa-calendar fa-fw fa-lg text-primary form-control-feedback"></i>              
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="jns_laporan" style="color:#fff;">Jenis Laporan</label>
                    <div class="col-sm-8">
                        <select class="form-control jns_laporan" name="jns_laporan" id="jns_laporan" size="25"></select>
                    </div>
                </div>
                <div class="form-group hidden">
                        <label class="control-label col-sm-3" for="jns_laporan" style="color:#fff;">Catatan Jenis Laporan</label>
                    <div class="col-sm-8">
                        <textarea type="name" class="form-control" id="catatan_jenis_laporan" rows="3" readonly ></textarea>
                    </div>
                </div> 
                <div class="form-group">
                    <label class="control-label col-sm-3"></label>
                    <div class="col-sm-8 text-left">
                        <button type="button" class="btn btn-lg btn-labeled btn-success btnProses"><span class="btn-label"><i class="fa fa-print fa-lg fa-fw"></i></span> Proses</button>  
                    </div>
                </div>
            </form>    
        </div>
</div> 
@endsection

@section('scripts')
    <script type="text/javascript" language="javascript" class="init" src="{{ asset('/protected/resources/views/kin/laporan/js_kin_laporan.js')}}"></script> 
    <script >
    $(document).ready(function(){

    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';

    if(exist){createPesan(msg,"danger")};

    });// end file
</script>
@endsection

