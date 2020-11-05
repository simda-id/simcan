<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app2')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <?php
                $this->title = 'Dokumen Rencana Kerja dan Anggaran (RKA)';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = 'modul3';
                $breadcrumb->begin();
                $breadcrumb->add(['label' => 'Anggaran']);
                $breadcrumb->add(['label' => 'APBD']);
                // $breadcrumb->add(['label' => $this->title]);
                $breadcrumb->end();
            ?>
    </div>
  </div>
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
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-info">
        <div class="panel-heading">
          <p>
            <h2 class="panel-title">Dokumen Rencana Kerja dan Anggaran (RKA)</h2>
          </p>
        </div>

        <div class="panel-body">
          <form name="" class="form-horizontal" role="form" autocomplete='off' action="" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <label for="tahun_rkpd" class="col-sm-3 control-label text-left" align='left'>Tahun Anggaran :</label>
              <div class="col-sm-2">
                <input class="form-control text-center" type="text" id="tahun_rkpd" name="tahun_rkpd"
                  value="{{Session::get('tahun')}}" disabled>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3 text-left" for="id_dokumen_keu">Nomor Dokumen Keuangan :</label>
              <div class="col-sm-5">
                <select class="form-control id_dokumen_keu select2" name="id_dokumen_keu" id="id_dokumen_keu"></select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3 text-left" for="id_unit">Unit Penyusun RKA :</label>
              <div class="col-sm-5">
                <select class="form-control id_Unit select2" name="id_unit" id="id_unit"></select>
              </div>
            </div>
          </form>
          <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#dokumen" aria-controls="dokumen" role="tab" data-toggle="tab">Dokumen RKA
                SKPD</a></li>
            <li class="disabled"><a href="#kpa_unit" aria-controls="kpa_unit" role="tab-kv" data-toggle="tab">Daftar
                Pejabat KPA</a></li>
          </ul>
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="dokumen">
              <br>
              <form class="form-horizontal" role="form" autocomplete='off' action="#" method="">
                <div>
                  <input type="hidden" name="tahun_anggaran" id="tahun_anggaran" value="{{Session::get('tahun')}}">
                  <a type="button" id="btnAddDokumen" class="btn btn-labeled btn-sm btn-success"
                    data-dismiss="modal"><span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span> Tambah
                    Dokumen</a>
                </div>
              </form>
              <table id="tblDokumen" class="table table-striped table-bordered table-responsive" cellspacing="0"
                width="100%">
                <thead>
                  <tr>
                    <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                    <th width="10%" style="text-align: center; vertical-align:middle">Tanggal Dokumen</th>
                    <th width="15%" style="text-align: center; vertical-align:middle">Nomor Dokumen</th>
                    <th style="text-align: center; vertical-align:middle">Nama Pengguna Anggaran</th>
                    <th width="15%" style="text-align: center; vertical-align:middle">NIP Pengguna Anggaran</th>
                    <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
            <div role="tabpanel" class="tab-pane fade in" id="kpa_unit">
              <br>
              <button type="button" class="btn btn-success btn-labeled btnTambahKpa" id='btnTambahKpa'
                data-dismiss="modal" aria-hidden="true">
                <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah KPA</button>
              <table id="tblKPA" class="table table-striped table-bordered table-responsive" cellspacing="0"
                width="100%">
                <thead>
                  <tr>
                    <th width="5%" style="text-align: center; vertical-align:middle">No</th>
                    <th width="15%" style="text-align: center; vertical-align:middle">NIP</th>
                    <th width="25%" style="text-align: center; vertical-align:middle">Nama Pejabat</th>
                    <th style="text-align: center; vertical-align:middle">Uraian Program Renja</th>
                    <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="TambahDokumen" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
    data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" autocomplete='off' action="" method="post" onsubmit="return false;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id_pa" id="id_pa">
            <input type="hidden" name="id_unit_pa" id="id_unit_pa">
            <div class="form-group has-feedback">
              <label for="tanggal_rkpd" class="col-sm-3 control-label" align='left'>Tanggal Dokumen :</label>
              <input type="hidden" name="tanggal_rkpd" id="tanggal_rkpd">
              <div class="col-sm-4">
                <input type="text" class="form-control datepicker" id="tanggal_rkpd_x" name="tanggal_rkpd_x"
                  style="text-align: center;">
                <i class="fa fa-calendar fa-fw fa-lg text-primary form-control-feedback"></i>
              </div>
            </div>
            <div class="form-group">
              <label for="nomor_rka" class="col-sm-3 control-label" align='left'>Nomor Dokumen :</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="nomor_rka" name="nomor_rka" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="nip_pa" class="col-sm-3 control-label" align='left'>NIP :</label>
              <div class="col-sm-3">
                <input type="text" class="form-control nip" id="nip_tapd_display" name="nip_tapd_display" maxlength="18"
                  style="text-align: center;" disabled>
              </div>
              <input type="hidden" class="form-control" id="nip_pa" name="nip_pa">
              <input type="hidden" class="form-control" id="id_pegawai_pa" name="id_pegawai_pa">
              <input type="hidden" class="form-control" id="id_unit_pegawai_pa" name="id_unit_pegawai_pa">
              <button id="btnPegawai" type="button" class="btn btn-primary"><i
                  class="fa fa-search fa-fw fa-lg"></i></button>
            </div>
            <div class="form-group">
              <label for="nama_tapd" class="col-sm-3 control-label" align='left'>Nama Pengguna Anggaran :</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="nama_tapd" name="nama_tapd" required="required" disabled>
              </div>
            </div>
            <div class="form-group">
              <label for="jabatan_tapd" class="col-sm-3 control-label" align='left'>Jabatan :</label>
              <div class="col-sm-6">
                <textarea type="text" class="form-control" id="jabatan_tapd" name="jabatan_tapd" required="required"
                  rows="2" disabled></textarea>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <div class="row">
            <div class="col-sm-2 text-left">
              <button type="button" id="btnDelDokumen" class="btn btn-labeled btn-danger"><span class="btn-label"><i
                    class="fa fa-trash-o fa-lg fa-fw"></i></span>Hapus</button>
            </div>
            <div class="col-sm-10 text-right">
              <div class="ui-group-buttons">
                <button id="btnDokumen" type="button" class="btn btn-success btn-labeled" data-dismiss="modal">
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

  <div id="HapusDokumen" class="modal fade" role="dialog" tabindex="-1" data-focus-on="input:first"
    data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
          <h4>Hapus Dokumen Rencana Kerja dan Anggaran (RKA)</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" id="id_dokumen_hapus" name="id_dokumen_hapus">
          <div class="alert alert-danger">
            <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border text-danger" aria-hidden="true"></i>
            Yakin akan menghapus Dokumen Rencana Kerja dan Anggaran (RKA) dengan nomor dokumen: <strong><span
                class="ur_dokumen_del"></span></strong> ?
            <br>
            <br>
            <strong>Catatan : Penghapusan dokumen ini akan menghapus data Rencana Kerja dan Anggaran (RKA) yang telah
              diproses !!!!</strong>
          </div>
        </div>
        <div class="modal-footer">
          <div class="ui-group-buttons">
            <button type="button" id="btnDelDokumen1" class="btn btn-labeled btn-danger" data-dismiss="modal"><span
                class="btn-label"><i class="fa fa-trash-o fa-lg fa-fw"></i></span> Hapus</button>
            <div class="or"></div>
            <button type="button" class="btn btn-labeled btn-warning" data-dismiss="modal" aria-hidden="true"><span
                class="btn-label"><i class="fa fa-sign-out fa-lg fa-fw"></i></span> Tutup</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="TambahKpa" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
    data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" autocomplete='off' action="" method="post" onsubmit="return false;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id_pa_kpa" id="id_pa_kpa">
            <input type="hidden" name="id_kpa" id="id_kpa">
            <div class="form-group">
              <label for="nip_kpa" class="col-sm-3 control-label" align='left'>NIP :</label>
              <div class="col-sm-4">
                <input type="text" class="form-control nip" id="nip_kpa_display" name="nip_kpa_display" maxlength="18"
                  style="text-align: center;" disabled>
              </div>
              <input type="hidden" class="form-control" id="nip_kpa" name="nip_kpa">
              <input type="hidden" class="form-control" id="id_pegawai_kpa" name="id_pegawai_kpa">
              <input type="hidden" class="form-control" id="id_unit_pegawai_kpa" name="id_unit_pegawai_kpa">
              <span class="btn btn-sm btn-primary btnPegawaiKpa" id="btnPegawaiKpa" name="btnPegawaiKpa"><i
                  class="fa fa-search fa-fw fa-lg"></i></span>
            </div>
            <div class="form-group">
              <label for="nama_kpa" class="col-sm-3 control-label" align='left'>Nama Kuasa PA :</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="nama_kpa" name="nama_kpa" required="required" disabled>
              </div>
            </div>
            <div class="form-group">
              <label for="jabatan_kpa" class="col-sm-3 control-label" align='left'>Jabatan :</label>
              <div class="col-sm-9">
                <textarea type="text" class="form-control" id="jabatan_kpa" name="jabatan_kpa" required="required"
                  rows="3" disabled></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="peran_tapd" class="col-sm-3 control-label" align='left'>Program Renja :</label>
              <div class="col-sm-9">
                <select class="form-control id_program_kpa select2" name="id_program_kpa" id="id_program_kpa"></select>
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
                <button id="btnSimpanKpa" type="button" class="btn btn-success btn-labeled" data-dismiss="modal">
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

  <div id="HapusKpa" class="modal fade" role="dialog" tabindex="-1" data-focus-on="input:first" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
          <h4>Hapus Kuasa Pengguna Anggaran (KPA)</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" id="id_kpa_hapus" name="id_kpa_hapus">
          <div class="alert alert-danger">
            <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border text-danger" aria-hidden="true"></i>
            Yakin akan menghapus KPA atas nama : <strong><span class="nama_pegawai_kpa_del"></span></strong> ?
            <br>
          </div>
        </div>
        <div class="modal-footer">
          <div class="ui-group-buttons">
            <button type="button" id="btnDelKpa" class="btn btn-labeled btn-danger" data-dismiss="modal"><span
                class="btn-label"><i class="fa fa-trash-o fa-lg fa-fw"></i></span> Hapus</button>
            <div class="or"></div>
            <button type="button" class="btn btn-labeled btn-warning" data-dismiss="modal" aria-hidden="true"><span
                class="btn-label"><i class="fa fa-sign-out fa-lg fa-fw"></i></span> Tutup</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="ModalProgress" class="modal fade modal-static" role="dialog" data-backdrop="static" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <div class="text-center">
            <h3><strong>Sedang proses...</strong></h3>
            <i class="fa fa-spinner fa-pulse fa-5x fa-fw" style="color:grey;"></i>
          </div>
        </div>
      </div>
    </div>
  </div>



  @include('bebas.FrmCariPegawai')

  @endsection

  @section('scripts')
  <script type="text/javascript" language="javascript" class="init"
    src="{{ asset('/protected/resources/views/90_apbd/js/js_doku_opd.js')}}"></script>
  @endsection