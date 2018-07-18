<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?php
                $this->title = 'Daftar Usulan Musrenbang RKPD di Desa/Kelurahan';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = '/';
                $breadcrumb->begin();
                $breadcrumb->add(['url' => '/modul2','label' => 'Musrenbang RKPD']);
                $breadcrumb->add(['url' => '/modul2','label' => 'Kecamatan']);
                $breadcrumb->add(['label' => $this->title]);
                $breadcrumb->end();
            ?>          
        </div>
    </div>
    <div id="pesan"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <p><h2 id="judul" class="panel-title"> {{ $this->title }}</h2></p>
                </div>
                <div class="panel-body">
                  <form name="" class="form-horizontal" role="form" autocomplete='off' action="" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="title">Kecamatan / Desa :</label>
                      <div class="col-sm-4">
                          <select type="text" class="form-control" id="id_kecamatan" name="id_kecamatan"></select>
                      </div>
                        <div class="col-sm-4">
                            <select type="text" class="form-control" id="id_desa_cb" name="id_desa_cb"></select>
                        </div>
                    </div>
                    <div class="divAddMusrendes col-sm-offset-2">
                      <button id="btnAddMusrendes" type="button" class="btn btn-labeled btn-success"><span class="btn-label"><i class="fa fa-plus fa-lg fa-fw"></i></span>Tambah Usulan Musrenbang Desa</button>
                      <button id="btnImportMusrendes" type="button" class="btn btn-labeled btn-primary"><span class="btn-label"><i class="fa fa-download fa-lg fa-fw"></i></span>Load Daftar Usulan RW</button>
                    </div>
                  </form>                   
                  {{-- <div class="table-responsive"> --}}
                    <table id="tblMusrendes" class="table table-striped table-bordered table-responsive compact display" width="100%" cellspacing="0">
                      <thead>
                          <tr>
                              <th width="5px" style="text-align: center; vertical-align:middle"></th>
                              <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                              <th width="10%" style="text-align: center; vertical-align:middle">Desa/Kelurahan</th>
                              <th style="text-align: center; vertical-align:middle">Uraian Aktivitas Kegiatan</th>
                              <th width="5%" style="text-align: center; vertical-align:middle">Lokasi</th>
                              <th width="10%" style="text-align: center; vertical-align:middle">Volume</th>
                              <th width="20%" style="text-align: center; vertical-align:middle">Pagu Usulan</th>
                              <th width="5px" style="text-align: center; vertical-align:middle">Status Usulan</th>
                              <th width="20px" style="text-align: center; vertical-align:middle">Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  {{-- </div>  --}}
                </div>
            </div>
        </div>
    </div>
</div>

<script id="details-lokasi" type="text/x-handlebars-template">
        <table class="table table-striped display table-bordered table-responsive compact details-table" id="tbllokasi-@{{id_musrendes}}">
            <thead>
              <tr>
                <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                <th width="10%" style="text-align: center; vertical-align:middle">Sumber Usulan</th>
                <th width="5%" style="text-align: center; vertical-align:middle">RT</th>
                <th width="5%" style="text-align: center; vertical-align:middle">RW</th>
                <th style="text-align: center; vertical-align:middle">Keterangan Lokasi</th>
                <th width="10%" style="text-align: center; vertical-align:middle">Volume Usulan</th>
                <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
              </tr>
            </thead>
            <tbody></tbody>
        </table>
</script>

<div id="ModalMusrendes" class="modal fade" role="dialog" data-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="text-align: center;"></h4>
            </div>
            <div class="modal-body">
              <form name="frmModalMusrendes" class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="id_musrendes_rw" name="id_musrendes_rw">
                <input type="hidden" id="tahun_musren" name="tahun_musren">
                <input type="hidden" id="id_desa" name="id_desa">
                <div class="form-group">
                  <label class="control-label col-sm-3" for="id">No Urut :</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control number" name="no_urut_usulan" id="no_urut_usulan">
                  </div>
                  <div class="col-sm-3 chkUsulanRw">
                    <label class="checkbox-inline">
                    <input class="checkUsulanRw" type="checkbox" name="checkUsulanRw" id="checkUsulanRw" value="1"> Telah Direviu</label>
                  </div>
                </div>
                <div class="form-group hidden">
                  <label class="control-label col-sm-3" for="rtrw">RT / RW :</label>
                  <div class="col-sm-2">
                        <input type="text" class="form-control number" id="id_rt" name="id_rt">
                  </div>
                  <div class="col-sm-2">
                        <input type="text" class="form-control number" id="id_rw" name="id_rw">
                  </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="title">Uraian Aktivitas :</label>
                    <div class="col-sm-8">
                      <textarea type="name" class="form-control" id="ur_aktivitas_kegiatan" rows="3" disabled></textarea>
                    </div>
                    <input type="hidden" id="id_aktivitas_asb" name="id_aktivitas_asb">
                    <input type="hidden" id="id_renja" name="id_renja">
                    <input type="hidden" id="id_kegiatan" name="id_kegiatan">
                    <span class="btn btn-sm btn-primary btnCariASB" id="btnCariASB" name="btnCariASB"><i class="fa fa-search fa-fw fa-lg"></i></span>
                </div>
                <div class="form-group hidden">
                    <label class="control-label col-sm-3" for="title">Zona SSH :</label>
                    <div class="col-sm-5">
                        <select type="text" class="form-control" id="id_zona_cb" name="id_zona_cb"></select>
                    </div>
                </div>
                <div class="form-group">
                <div class="col-sm-12">
                    <table class="table table-striped table-bordered table-responsive compact">
                        <thead>
                          <tr>
                            <td width="10%" style="text-align: center; vertical-align:middle;">Usulan</td>
                            <td width="15%" style="text-align: center; vertical-align:middle;">Volume</td>
                            <td width="25%" style="text-align: center; vertical-align:middle;">Satuan</td>
                            <td width="25%" style="text-align: center; vertical-align:middle;">Harga Satuan</td>
                            <td width="25%" style="text-align: center; vertical-align:middle;">Jumlah Total</td>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <td width="10%" style="text-align: center; vertical-align:middle;">
                                <label class="control-label" align='left'>RW :</label>
                              </td>
                              <td width="15%" style="text-align: center; vertical-align:middle;">
                                <input type="text" style="text-align: right;" class="form-control number" id="volume_rw" name="volume_rw" disabled>
                              </td>
                              <td width="25%" style="text-align: left; vertical-align:middle;">
                                <input type="text" style="text-align: center;" class="form-control" id="ur_satuan_rw" name="ur_satuan_rw" disabled>
                                <input type="hidden" class="form-control number" id="id_satuan_rw" name="id_satuan_rw">
                              </td>                          
                              <td width="25%" style="text-align: left; vertical-align:middle;">
                                <input type="text" style="text-align: right;" class="form-control number" id="harga_satuan_rw" name="harga_satuan_rw" disabled>
                              </td>
                              <td width="25%" style="text-align: left; vertical-align:middle;">
                                <input type="text" style="text-align: right;" class="form-control number" id="jumlah_pagu_rw" name="jumlah_pagu_rw" disabled>
                              </td>
                          </tr>
                          <tr>
                              <td width="10%" style="text-align: center; vertical-align:middle;">
                                <label class="control-label" align='left'>Desa :</label>
                              </td>
                              <td width="15%" style="text-align: center; vertical-align:middle;">
                                <input type="text" style="text-align: right;" class="form-control number" id="volume" name="volume">
                              </td>
                              <td width="25%" style="text-align: left; vertical-align:middle;">
                                <input type="text" style="text-align: center;" class="form-control" id="ur_satuan" name="ur_satuan" disabled>
                                <input type="hidden" class="form-control number" id="id_satuan" name="id_satuan">
                              </td>                          
                              <td width="25%" style="text-align: left; vertical-align:middle;">
                                <input type="text" style="text-align: right;" class="form-control number" id="harga_satuan" name="harga_satuan" disabled>
                              </td>
                              <td width="25%" style="text-align: left; vertical-align:middle;">
                                <input type="text" style="text-align: right;" class="form-control number" id="jumlah_pagu" name="jumlah_pagu" disabled>
                              </td>
                          </tr>
                        </tbody>
                    </table>
                </div>                  
                </div>
                <div class="form-group">
                  <label for="uraian_kondisi" class="col-sm-3 control-label" align='left'>Tolok Ukur Usulan :</label>
                  <div class="col-sm-9">
                    <textarea type="text" class="form-control" name="tolok_ukur_usulan" id="tolok_ukur_usulan" rows="5"></textarea>
                  </div>
                </div>
                <div class="form-group rbStatusPelaksanaan"> 
                  <label for="status_pelaksanaan" class="col-sm-3 control-label" align='left'>Status Usulan :</label>                 
                  <div class="col-sm-9">
                    <div class="col-sm-6">
                      <label class="radio">
                        <input type="radio" class="status_pelaksanaan" name="status_pelaksanaan" id="status_pelaksanaan" value="0"> Diterima tanpa Perubahan 
                      </label>
                      <label class="radio">
                        <input type="radio" class="status_pelaksanaan" name="status_pelaksanaan" id="status_pelaksanaan" value="1"> Diterima dengan Perubahan
                      </label>
                    </div>
                    <div class="col-sm-6">
                      <label class="radio">
                        <input type="radio" class="status_pelaksanaan" name="status_pelaksanaan" id="status_pelaksanaan" value="2"> Digabung dengan Usulan Lain
                      </label>
                      <label class="radio">
                        <input type="radio" class="status_pelaksanaan" name="status_pelaksanaan" id="status_pelaksanaan" value="3"> Ditolak
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="uraian_kondisi" class="col-sm-3 control-label" align='left'>Keterangan Usulan :</label>
                  <div class="col-sm-9">
                    <textarea type="text" class="form-control" name="uraian_kondisi" id="uraian_kondisi" rows="5"></textarea>
                  </div>
                </div>                
              </form>
            </div>
              <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left">
                        {{-- <button type="button" id="btnHapusMusrendes" class="btn btn-sm btn-danger btn-labeled">
                            <span class="btn-label"><i class="fa fa-trash fa-fw fa-lg"></i></span>Hapus</button> --}}
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" id="btnMusrendes" class="btn btn-success btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i class="fa fa-floppy-o fa-fw fa-lg"></i></span>Simpan</button>
                        <div class="or"></div>
                        <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="fa fa-sign-out fa-fw fa-lg"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

<div id="HapusMusrendes" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
            <h4 style="text-align: center;">Hapus Data Usulan Musrenbang Desa/Kelurahan</h4>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id_musrenrw_hapus" name="id_musrenrw_hapus">
            <div class="alert alert-danger deleteContent">
              <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border"  style="color:red;" aria-hidden="true"></i>
                Yakin akan menghapus Data Usulan ini : <strong><span id="ur_musrenrw_hapus"></span></strong> ?
                <br>
                <br>
                <strong>Catatan : Penghapusan data ini mempengaruhi data selanjutnya akan ikut terhapus.....!!!!</strong> 
          </div>
        </div>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" id="btnDelMusrendes" class="btn btn-sm btn-danger btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>Hapus</button>
                        <div class="or"></div>
                        <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
        </div>
      </div>
    </div>

<div id="ModalLokasiMusrendes" class="modal fade" role="dialog" data-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="text-align: center;"></h4>
            </div>
            <div class="modal-body">
              <form name="frmModalLokasiMusrendes" class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="id_musrendes_lokasi" name="id_musrendes_lokasi">
                <input type="hidden" id="id_musrendes_lok" name="id_musrendes_lok">
                <input type="hidden" id="tahun_musren_lokasi" name="tahun_musren_lokasi">
                <input type="hidden" id="id_desa_lokasi" name="id_desa_lokasi">
                <input type="hidden" id="id_lokasi" name="id_lokasi">
                <input type="hidden" id="id_lokasi_musrendes" name="id_lokasi_musrendes">
                <div class="form-group">
                  <label class="control-label col-sm-3" for="id">No Urut :</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control number" style="text-align: center;" name="no_urut_lokasi" id="no_urut_lokasi">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3" for="rtrw">RT / RW :</label>
                  <div class="col-sm-2">
                        <input type="text" class="form-control number" maxlength="3" style="text-align: center;" id="id_rt_lokasi" name="id_rt_lokasi">
                  </div>
                  <div class="col-sm-2">
                        <input type="text" class="form-control number" maxlength="3" style="text-align: center;" id="id_rw_lokasi" name="id_rw_lokasi">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3" for="rtrw">Volume RW :</label>
                  <div class="col-sm-2">
                        <input type="text" class="form-control number" style="text-align: right;" id="volume_rw_lokasi" name="volume_rw_lokasi" disabled>
                  </div>
                  <label class="control-label col-sm-2" for="rtrw">Volume Desa :</label>
                  <div class="col-sm-2" data-toggle="popover" data-html="true" data-container="body" title="Musrenbang Desa" data-trigger="hover" data-content="Volume diisi dengan volume yang disetujui<br>Untuk usulan yang ditolak diisi dengan 0">
                        <input type="text" class="form-control number" style="text-align: right;" id="volume_desa_lokasi" name="volume_desa_lokasi">
                  </div>
                </div>
                <div class="form-group">
                  <label for="uraian_kondisi" class="col-sm-3 control-label" align='left'>Keterangan Usulan Lokasi :</label>
                  <div class="col-sm-9">
                    <textarea type="text" class="form-control" name="uraian_lokasi" id="uraian_lokasi" rows="5"></textarea>
                  </div>
                </div>
              </form>
            </div>
              <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" id="btnLokasiMusrendes" class="btn btn-success btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i class="fa fa-floppy-o fa-fw fa-lg"></i></span>Simpan</button>
                        <div class="or"></div>
                        <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="fa fa-sign-out fa-fw fa-lg"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

<div id="HapusLokasiMusrendes" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
            <h4 style="text-align: center;">Hapus Data Usulan Musrenbang Desa/Kelurahan</h4>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id_musren_lokasi_hapus" name="id_musren_lokasi_hapus">
            <div class="alert alert-danger deleteContent">
              <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border"  style="color:red;" aria-hidden="true"></i>
                Yakin akan menghapus Data Lokasi Usulan untuk RT : <strong><span id="rt_hapus"></span></strong> /RW : <strong><span id="rw_hapus"></span></strong> ?
                <br>
                <br>
                <strong>Catatan : Penghapusan data ini mempengaruhi data selanjutnya akan ikut terhapus.....!!!!</strong> 
          </div>
        </div>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" id="btnDelLokasiMusrendes" class="btn btn-sm btn-danger btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>Hapus</button>
                        <div class="or"></div>
                        <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
        </div>
      </div>
    </div>

<div id="cariAktivitasASB" class="modal fade" role="dialog" data-backdrop="static" tabindex="-1" data-focus-on="input:first">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          <h4 style="text-align: center;">Daftar Aktivitas Kegiatan yang di-Musrenbang-kan</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
            <div class="form-group">
              <label class="control-label col-sm-3" for="">Zona Wilayah SSH :</label>
              <div class="col-sm-8">
                <select type="text" class="form-control zona_ssh_load" id="zona_ssh_load" name="zona_ssh_load"></select>
              </div>
            </div> 
           <div class="form-group">
             <div class="col-sm-12">
                <table id='tblCariAktivitasASB' class="table display compact table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                          <tr>
                            <th width="5%" style="text-align: center; vertical-align:middle;">No Urut</th>
                            <th style="text-align: center; vertical-align:middle;">Uraian Kegiatan Renja</th>
                            <th style="text-align: center; vertical-align:middle;">Uraian Aktivitas ASB</th>
                            <th width="10%" style="text-align: center; vertical-align:middle;">Pagu</th>
                            <th width="25%" style="text-align: center; vertical-align:middle;">OPD Penanggung Jawab</th>
                            <th width="5%" style="text-align: center; vertical-align:middle;">Aksi</th>
                          </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
              </div>
            </div>
          </form>
        </div>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left">
                    </div>
                    <div class="col-sm-10 text-right">
                        <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="fa fa-sign-out fa-fw fa-lg"></i></span>Tutup</button>
                    </div>
                </div>
        </div>
      </div>
    </div>
</div>

<div id="StatusProgram" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
            <h4 style="text-align: center;">Perubahan Status Usulan</h4>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id_musrendes_posting" name="id_musrendes_posting">
            <input type="hidden" id="status_usulan_posting" name="status_usulan_posting">
            <div class="alert alert-success">
                <div>
                  <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border text-info"  aria-hidden="true"></i>
                  <p>Yakin akan melakukan proses <strong><i><span id="ur_status_ranwal_posting"></span></i></strong> pada usulan ini ?</p>
                </div>
                <hr>
                <div>
                  <strong>Catatan : Proses ini mempengaruhi data selanjutnya.....!!!!</strong>
                </div> 
          </div>
        </div>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" id="btnPostProgram" class="btn btn-success btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i class="fa fa-check-square-o fa-fw fa-lg"></i></span>Proses</button>
                        <div class="or"></div>
                        <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="fa fa-sign-out fa-fw fa-lg"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
        </div>
      </div>
    </div>

<div id="ModalProgress" class="modal fade modal-static" role="dialog" data-backdrop="static" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body text-center">
          <h3><strong>Sedang proses...</strong></h3>
          <i class="fa fa-spinner fa-pulse fa-5x fa-fw text-info"></i>
        </div>
      </div>
    </div>
  </div>


@endsection

@section('scripts')
<script>
$(document).ready(function() {

var detLokasi = Handlebars.compile($("#details-lokasi").html());

function createPesan(message, type) {
    var html = '<div id="pesanx" class="alert alert-' + type + ' alert-dismissable flyover flyover-bottom in">';    
    html += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
    html += message;
    html += '</div>';    
    $(html).hide().prependTo('#pesan').slideDown();
    

    setTimeout(function() {
            $('#pesanx').removeClass('in');
         }, 3500);

  };

$('.page-alert .close').click(function(e) {
        e.preventDefault();
        $(this).closest('.page-alert').slideUp();
    });

$('[data-toggle="popover"]').popover();

// $('.number').number(true,0,',', '.');

$('#no_urut_usulan').number(true,0,',', '.');
$('#volume_rw').number(true,2,',','.');
$('#harga_satuan_rw').number(true,2,',','.');
$('#jumlah_pagu_rw').number(true,2,',','.');
$('#volume').number(true,2,',','.');
$('#harga_satuan').number(true,2,',','.');
$('#jumlah_pagu').number(true,2,',','.');
$('#volume_rw_lokasi').number(true,2,',','.');
$('#volume_desa_lokasi').number(true,2,',','.');


$('.display').DataTable({
      dom : 'BfRtip',
      autoWidth : false,
      bDestroy: true
  });

function validasiDataAwal() {
  if ( $.trim( $('#id_kecamatan').val()) == 0) {
    createPesan("Nama Kecamatan Belum Dipilih..!!","danger"); 
    return false;
  };
  if ( $.trim( $('#id_desa_cb').val()) == 0) {
    createPesan("Nama Desa Belum Dipilih..!!","danger"); 
    return false;
  };
}

$("#id_kecamatan").change(function() {     
  loadDesa($("#id_kecamatan").val());
});

$.ajax({
    type: "GET",
    url: './admin/parameter/getKecamatan',
    dataType: "json",

    success: function(data) {

      var j = data.length;
      var post, i;

      $('select[name="id_kecamatan"]').empty();
      $('select[name="id_kecamatan"]').append('<option value="0">---Pilih Kecamatan---</option>');

      for (i = 0; i < j; i++) {
        post = data[i];
        $('select[name="id_kecamatan"]').append('<option value="'+ post.id_kecamatan +'">'+ post.nama_kecamatan +'</option>');
      }
    }
  }); 


function loadDesa($id_kecamatan){
  $.ajax({
    type: "GET",
    url: './admin/parameter/getDesa/'+$id_kecamatan,
    dataType: "json",

    success: function(data) {

      var j = data.length;
      var post, i;

      $('select[name="id_desa_cb"]').empty();
      $('select[name="id_desa_cb"]').append('<option value="0">---Pilih Desa/Kelurahan---</option>');

      for (i = 0; i < j; i++) {
        post = data[i];
        $('select[name="id_desa_cb"]').append('<option value="'+ post.id_desa +'">'+ post.nama_desa +'</option>');
      }
    }
  }); 
}

loadDesa($("#id_kecamatan").val());

$( "#id_desa_cb" ).change(function() {
  LoadUsulanDesa($('#id_desa_cb').val());
});

var usulan_tbl
function LoadUsulanDesa($id_desa){
    usulan_tbl=$('#tblMusrendes').DataTable({
                  processing: true,
                  serverSide: true,
                  dom : 'BfRtip',                  
                  autoWidth : false,
                  "ajax": {"url": "musrendes/getData/"+$id_desa},
                  "language": {
                      "decimal": ",",
                      "thousands": "."},
                  "columns": [
                        {
                            "className":      'details-control',
                            "orderable":      false,
                            "searchable":      false,
                            "data":           null,
                            "defaultContent": '',
                            "width" : "5px"
                        },
                        { data: 'no_urut', sClass: "dt-center", width :"5px"},
                        { data: 'nama_desa', sClass: "dt-left", width :"10%"},
                        { data: 'uraian_aktivitas_kegiatan', sClass: "dt-left"},
                        { data: 'jml_lokasi', sClass: "dt-center",width :"10%",
                            render: $.fn.dataTable.render.number( '.', ',', 0, '' )},
                        { data: 'volume', sClass: "dt-center",width :"10%",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'jml_pagu', sClass: "dt-right",width :"20%",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'icon','searchable': false, 'orderable':false, sClass: "dt-center", width :"5px",
                            render: function(data, type, row,meta) {
                            return '<i class="'+row.status_icon+'" style="color:'+row.warna+';"/>';
                          }},
                        { data: 'action', 'searchable': false, width :"20px", 'orderable':false }
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        });
}

var tblLokasi;
function initLokasi(tableId, data) {
    tblLokasi=$('#' + tableId).DataTable({
            processing: true,
            serverSide: true,
            ajax: data.details_url,
            dom : 'BFRtIP',
            autoWidth: false,
            "language": {
                      "decimal": ",",
                      "thousands": "."},
            "columns": [
                        { data: 'urut', sClass: "dt-center"},
                        { data: 'sumber_display'},
                        { data: 'rt', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 0, '' )},
                        { data: 'rw', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 0, '' )},                        
                        { data: 'uraian_kondisi'},
                        { data: 'volume_desa', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
                      ],
            "order": [[0, 'asc']],
            "bDestroy": true
        })

}

var id_musrendes_temp;
$('#tblMusrendes tbody').on('click', 'td.details-control', function () {

        var tr = $(this).closest('tr');
        var row = usulan_tbl.row( tr );
        var tableId = 'tbllokasi-' + row.data().id_musrendes;
        id_musrendes_temp = row.data().id_musrendes;

        if (row.child.isShown()) {
            row.child.hide();
            tr.removeClass('shown');
        } else {
            row.child(detLokasi(row.data())).show();
            initLokasi(tableId, row.data());
            tr.addClass('shown');
            tr.next().find('td').addClass('no-padding bg-gray');
        }    
  });

var asb_tbl
$(document).on('click', '#btnCariASB', function() {
  asb_tbl = $('#tblCariAktivitasASB').DataTable( {
        processing: true,
        serverSide: true,                 
        autoWidth : false,
        dom: 'bfrtIp',
        "ajax": {"url": "./musrenrw/getDataASB"},
        "columns": [
              { data: 'no_urut', sClass: "dt-center"},              
              { data: 'uraian_kegiatan_renstra'},
              { data: 'nm_aktivitas_asb'},
              { data: 'pagu_rata2', sClass: "dt-right",
                render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
              { data: 'nm_unit'},
              { data: 'action', 'searchable': false, width :"20px", 'orderable':false, sClass: "dt-center" }

            ],
        "order": [[0, 'asc']],
        "bDestroy": true
    });

  $('#cariAktivitasASB').modal('show'); 
});

$('#tblCariAktivitasASB').on( 'dblclick', 'tr', function () {
    var data = asb_tbl.row(this).data();   

    document.getElementById("ur_satuan").value = data.nm_satuan_musren;
    document.getElementById("id_satuan").value = data.id_satuan_musren;
    document.getElementById("ur_aktivitas_kegiatan").value = data.nm_aktivitas_asb;
    document.getElementById("id_aktivitas_asb").value = data.id_aktivitas_asb;
    document.getElementById("id_renja").value = data.id_renja;
    document.getElementById("id_kegiatan").value = data.id_aktivitas_renja;
    $('#harga_satuan').val(data.pagu_rata2);
    $('#jumlah_pagu').val(hitungpagu());

    $('#cariAktivitasASB').modal('hide');    

  });

$(document).on('click', '#btnPilihASB', function() {

    var data = asb_tbl.row( $(this).parents('tr') ).data();

    document.getElementById("ur_satuan").value = data.nm_satuan_musren;
    document.getElementById("id_satuan").value = data.id_satuan_musren;
    document.getElementById("ur_aktivitas_kegiatan").value = data.nm_aktivitas_asb;
    document.getElementById("id_aktivitas_asb").value = data.id_aktivitas_asb;
    document.getElementById("id_renja").value = data.id_renja;
    document.getElementById("id_kegiatan").value = data.id_aktivitas_renja;
    $('#harga_satuan').val(data.pagu_rata2);
    $('#jumlah_pagu').val(hitungpagu());

    $('#cariAktivitasASB').modal('hide');    

  });

function hitungpagu(){
  var x = $('#volume').val();
  var y = $('#harga_satuan').val();
  
  var nilai_pagu = x*y;
  return nilai_pagu;
}

function getStatusPelaksanaan(){
    var xCheck = document.querySelectorAll('input[name="status_pelaksanaan"]:checked');
    var xyz = [];
    for(var x = 0, l = xCheck.length; x < l;  x++)
      { xyz.push(xCheck[x].value); }
    var xvalues = xyz.join('');
    return xvalues;
  }

$( "#volume" ).change(function() {
  $('#jumlah_pagu').val(hitungpagu());
});

$( "#harga_satuan" ).change(function() {
  $('#jumlah_pagu').val(hitungpagu()); 
});

$('#btnAddMusrendes').click(function(){
  $('#btnMusrendes').addClass('addMusrendes');
  $('#btnMusrendes').removeClass('editMusrendes');      
  $('.form-horizontal').show();
  $('.modal-title').text('Tambah Daftar Usulan Musrenbang Desa/Kelurahan');

  $('#id_musrendes_rw').val(null);
  $('#tahun_musren').val({{Session::get('tahun')}});
  $('#id_desa').val($('#id_desa_cb').val());
  $('#no_urut_usulan').val(1);
  $('#id_aktivitas_asb').val(null);
  $('#ur_aktivitas_kegiatan').val(null);
  $('#id_renja').val(null);
  $('#id_kegiatan').val(null);
  $('#volume_rw').val(0);
  $('#id_satuan_rw').val(null);
  $('#ur_satuan_rw').val('N/A');
  $('#harga_satuan_rw').val(0);
  $('#jumlah_pagu_rw').val(hitungpagu());
  $('#volume').val(0);
  $('#id_satuan').val(null);
  $('#ur_satuan').val('Belum Ada');
  $('#harga_satuan').val(1);
  $('#jumlah_pagu').val(hitungpagu());
  $('#uraian_kondisi').val(null);
  $('#tolok_ukur_usulan').val(null);

  document.frmModalMusrendes.status_pelaksanaan[0].checked=true;

  // $('#btnHapusMusrendes').hide();
  $('#btnMusrendes').show();
  $('#btnCariASB').show();

  $('.checkUsulanRw').prop('checked',false);

  $('#ModalMusrendes').modal('show');

});

$('.modal-footer').on('click', '.addMusrendes', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: 'musrendes/addMusrenDesa',
          data: {
              '_token': $('input[name=_token]').val(),
              'tahun_renja' : $('#tahun_musren').val(),
              'no_urut' : $('#no_urut_usulan').val(),
              // 'id_musrendes' : $('#id_musrendes_rw').val(),
              'id_renja' : $('#id_renja').val(),
              'id_desa' : $('#id_desa').val(),
              'id_kegiatan' : $('#id_kegiatan').val(),
              'id_asb_aktivitas' : $('#id_aktivitas_asb').val(),
              'uraian_aktivitas_kegiatan' : $('#ur_aktivitas_kegiatan').val(),
              'uraian_kondisi' : $('#uraian_kondisi').val(),
              'tolak_ukur_aktivitas' : $('#tolok_ukur_usulan').val(),
              'target_output_aktivitas' : $('#volume').val(),
              'id_satuan' : $('#id_satuan').val(),
              'volume' : $('#volume').val(),
              'harga_satuan' : $('#harga_satuan').val(),
              'jml_pagu' : $('#jumlah_pagu').val(),
              'pagu_aktivitas' : $('#jumlah_pagu').val(),
              'status_pelaksanaan' : getStatusPelaksanaan(), 
          },
          success: function(data) {
              usulan_tbl.ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              } 
          }
      });
  });

$(document).on('click', '#btnEditUsulanDesa', function() {

var data = usulan_tbl.row( $(this).parents('tr') ).data();

  $('#btnMusrendes').removeClass('addMusrendes');
  $('#btnMusrendes').addClass('editMusrendes');      
  $('.form-horizontal').show();
  $('.modal-title').text('Edit Daftar Usulan Musrenbang Desa/Kelurahan');

  $('#id_musrendes_rw').val(data.id_musrendes);
  $('#tahun_musren').val(data.tahun_renja);
  $('#id_desa').val(data.id_desa);
  $('#no_urut_usulan').val(data.no_urut);
  $('#ur_aktivitas_kegiatan').val(data.uraian_asb);
  $('#id_aktivitas_asb').val(data.id_asb_aktivitas);
  $('#id_renja').val(data.id_renja);
  $('#id_kegiatan').val(data.id_kegiatan);
  $('#volume_rw').val(data.volume_rw);
  $('#ur_satuan_rw').val(data.uraian_satuan_rw);
  $('#id_satuan_rw').val(data.id_satuan_rw);
  $('#harga_satuan_rw').val(data.harga_satuan_rw);
  $('#jumlah_pagu_rw').val(data.jml_pagu_rw);
  $('#volume').val(data.volume);
  $('#ur_satuan').val(data.uraian_satuan);
  $('#id_satuan').val(data.id_satuan);
  $('#harga_satuan').val(data.harga_satuan);
  $('#jumlah_pagu').val(data.jml_pagu);
  $('#uraian_kondisi').val(data.uraian_kondisi);
  $('#tolok_ukur_usulan').val(data.tolak_ukur_aktivitas);

  document.frmModalMusrendes.status_pelaksanaan[data.status_pelaksanaan].checked=true;

  if(data.sumber_usulan==2){ 
    $('#btnCariASB').show();
    // $('#btnHapusMusrendes').show();
  } else {
    $('#btnCariASB').hide();
    // $('#btnHapusMusrendes').hide();
  }

  if(data.status_usulan==1){
    $('#btnMusrendes').hide();    
  } else {
    $('#btnMusrendes').show();    
  }

  $('#ModalMusrendes').modal('show');

});

$('.modal-footer').on('click', '.editMusrendes', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: 'musrendes/editMusrenDesa',
          data: {
              '_token': $('input[name=_token]').val(),
              'tahun_renja' : $('#tahun_musren').val(),
              'no_urut' : $('#no_urut_usulan').val(),
              'id_musrendes' : $('#id_musrendes_rw').val(),
              'id_renja' : $('#id_renja').val(),
              'id_desa' : $('#id_desa').val(),
              'id_kegiatan' : $('#id_kegiatan').val(),
              'id_asb_aktivitas' : $('#id_aktivitas_asb').val(),
              'uraian_aktivitas_kegiatan' : $('#ur_aktivitas_kegiatan').val(),
              'uraian_kondisi' : $('#uraian_kondisi').val(),
              'tolak_ukur_aktivitas' : $('#tolok_ukur_usulan').val(),
              'target_output_aktivitas' : $('#volume').val(),
              'id_satuan' : $('#id_satuan').val(),
              'volume' : $('#volume').val(),
              'harga_satuan' : $('#harga_satuan').val(),
              'jml_pagu' : $('#jumlah_pagu').val(),
              'pagu_aktivitas' : $('#jumlah_pagu').val(),
              'status_pelaksanaan' : getStatusPelaksanaan(), 
          },
          success: function(data) {
              usulan_tbl.ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              } 
          }
      });
  });

$(document).on('click', '#btnUnloadData', function() {

  var data = usulan_tbl.row( $(this).parents('tr') ).data();

  $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      type: 'post',
      url: 'musrendes/unLoadData',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_musrendes': data.id_musrendes
      },
      success: function(data) {
        usulan_tbl.ajax.reload();
        if(data.status_pesan==1){
        createPesan(data.pesan,"success");
        } else {
        createPesan(data.pesan,"danger"); 
        } 
      }
    });
});

$(document).on('click', '#btnHapusMusrendes', function() {

  var data = usulan_tbl.row( $(this).parents('tr') ).data();

  $('#id_musrenrw_hapus').val(data.id_musrendes);
  $('#ur_musrenrw_hapus').text(data.uraian_asb);  

  $('#HapusMusrendes').modal('show');

});

$(document).on('click', '#btnDelMusrendes', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      type: 'post',
      url: 'musrendes/hapusMusrenDesa',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_musrendes': $('#id_musrenrw_hapus').val()
      },
      success: function(data) {
        usulan_tbl.ajax.reload();
        if(data.status_pesan==1){
        createPesan(data.pesan,"success");
        } else {
        createPesan(data.pesan,"danger"); 
        }
        $('#ModalMusrendes').modal('hide');  
      }
    });
});

$(document).on('click','#btnAddLokasiUsulan', function() {

  var data = usulan_tbl.row( $(this).parents('tr') ).data();

  $('#btnLokasiMusrendes').addClass('addLokasi');
  $('#btnLokasiMusrendes').removeClass('editLokasi');      
  $('.form-horizontal').show();
  $('.modal-title').text('Tambah Lokasi Usulan Musrenbang Desa/Kelurahan');

  $('#id_musrendes_lokasi').val(data.id_musrendes);
  $('#tahun_musren_lokasi').val(data.tahun_renja);
  $('#no_urut_lokasi').val(1);
  $('#id_rt_lokasi').val(1);
  $('#id_rw_lokasi').val(1);
  $('#id_desa_lokasi').val(data.id_desa);
  $('#id_lokasi').val(data.id_desa);
  $('#id_lokasi_musrendes').val(null);
  $('#uraian_lokasi').val(null);
  $('#volume_rw_lokasi').val(0);
  $('#volume_desa_lokasi').val(0);

  $('#btnLokasiMusrendes').show();

  $('#ModalLokasiMusrendes').modal('show');

});

$('.modal-footer').on('click', '.addLokasi', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: 'musrendes/addMusrenDesaLokasi',
          data: {
              '_token': $('input[name=_token]').val(),
              'tahun_musren' : $('#tahun_musren_lokasi').val(),
              'no_urut' : $('#no_urut_lokasi').val(),
              'id_musrendes' : $('#id_musrendes_lokasi').val(),
              // 'id_lokasi_musrendes' : $('#id_lokasi_musrendes').val(),
              'id_lokasi' : $('#id_desa_lokasi').val(),
              'id_desa' : $('#id_desa_lokasi').val(),
              'rt' : $('#id_rt_lokasi').val(),
              'rw' : $('#id_rw_lokasi').val(),
              'uraian_kondisi' : $('#uraian_lokasi').val(),
              // 'sumber_data' : $('#sumber_data').val(),
              'volume_rw' : $('#volume_rw_lokasi').val(),
              'volume_desa' : $('#volume_desa_lokasi').val(), 
          },
          success: function(data) {
              usulan_tbl.ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              } 
          }
      });
  });

$(document).on('click','#btnEditLokasiMusren', function() {

  var data = tblLokasi.row( $(this).parents('tr') ).data();

  $('#btnLokasiMusrendes').removeClass('addLokasi');
  $('#btnLokasiMusrendes').addClass('editLokasi');      
  $('.form-horizontal').show();
  $('.modal-title').text('Ubah Lokasi Usulan Musrenbang Desa/Kelurahan');

  $('#id_musrendes_lokasi').val(data.id_musrendes);
  $('#tahun_musren_lokasi').val(data.tahun_musren);
  $('#no_urut_lokasi').val(data.no_urut);
  $('#id_rt_lokasi').val(data.rt);
  $('#id_rw_lokasi').val(data.rw);
  $('#id_desa_lokasi').val(data.id_desa);
  $('#id_lokasi').val(data.id_desa);
  $('#id_lokasi_musrendes').val(data.id_lokasi_musrendes);
  $('#uraian_lokasi').val(data.uraian_kondisi);
  $('#volume_rw_lokasi').val(data.volume_rw);
  $('#volume_desa_lokasi').val(data.volume_desa);
  
    if(data.status_usulan==1){
      $('#btnLokasiMusrendes').hide();    
    } else {
      $('#btnLokasiMusrendes').show();    
    }

  $('#ModalLokasiMusrendes').modal('show');

});

$('.modal-footer').on('click', '.editLokasi', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: 'musrendes/editMusrenDesaLokasi',
          data: {
              '_token': $('input[name=_token]').val(),
              'tahun_musren' : $('#tahun_musren_lokasi').val(),
              'no_urut' : $('#no_urut_lokasi').val(),
              'id_musrendes' : $('#id_musrendes_lokasi').val(),
              'id_lokasi_musrendes' : $('#id_lokasi_musrendes').val(),
              'id_lokasi' : $('#id_desa_lokasi').val(),
              'id_desa' : $('#id_desa_lokasi').val(),
              'rt' : $('#id_rt_lokasi').val(),
              'rw' : $('#id_rw_lokasi').val(),
              'uraian_kondisi' : $('#uraian_lokasi').val(),
              'volume_rw' : $('#volume_rw_lokasi').val(),
              'volume_desa' : $('#volume_desa_lokasi').val(), 
          },
          success: function(data) {
              tblLokasi.ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              } 
          }
      });
  });

$(document).on('click', '#btnHapusLokasiMusren', function() {

  var data = tblLokasi.row( $(this).parents('tr') ).data();

  $('#id_musren_lokasi_hapus').val(data.id_lokasi_musrendes);
  $('#rt_hapus').text(data.rt); 
  $('#rw_hapus').text(data.rw);  

  $('#HapusLokasiMusrendes').modal('show');

});


$(document).on('click', '#btnDelLokasiMusrendes', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      type: 'post',
      url: 'musrendes/hapusMusrenDesaLokasi',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_lokasi_musrendes': $('#id_musren_lokasi_hapus').val()
      },
      success: function(data) {
        tblLokasi.ajax.reload();
        if(data.status_pesan==1){
        createPesan(data.pesan,"success");
        } else {
        createPesan(data.pesan,"danger"); 
        }
        $('#ModalMusrendes').modal('hide');  
      }
    });
});

$(document).on('click', '#btnImportMusrendes', function() {

  $.ajaxSetup({
    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });

  if(validasiDataAwal() != false){  
    $('#ModalProgress').modal('show');
    $.ajax({
          type: 'POST',
          url: 'musrendes/ImportDataRW',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_desa' :$('#id_desa_cb').val(),
          },
          success: function(data) {
            // createPesan("Data Berhasil di Load","success");
            usulan_tbl.ajax.reload();
            $('#ModalProgress').modal('hide');
            if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
                } 
          },
          error: function(data){
            createPesan("Data Gagal di Load (err:3)","danger");
            usulan_tbl.ajax.reload();
            $('#ModalProgress').modal('hide');
          }
    });
  }
});

$(document).on('click', '#btnPostUsulanDesa', function() {

  var data = usulan_tbl.row( $(this).parents('tr') ).data();

    $('#id_musrendes_posting').val(data.id_musrendes);
    $('#status_usulan_posting').val(data.status_usulan);

    if(data.status_usulan==0){
        document.getElementById("ur_status_ranwal_posting").innerHTML = "Posting";
    } else {
        document.getElementById("ur_status_ranwal_posting").innerHTML = "Un-Posting";
    }

    $('#StatusProgram').modal('show');
});

$('.modal-footer').on('click', '#btnPostProgram', function() {
      var status_post;
      if($('#status_usulan_posting').val()==0){
          status_post = 1
      } else {
          status_post = 0
      };

      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: 'musrendes/postMusrenDesa',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_musrendes': $('#id_musrendes_posting').val(),
              'status_usulan': status_post,
          },
          success: function(data) {
              usulan_tbl.ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              } 
              $('#StatusProgram').modal('hide');
          }
      });
    });




});
</script>
@endsection
