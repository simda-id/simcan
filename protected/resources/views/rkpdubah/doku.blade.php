<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <?php
                $this->title = 'Dokumen RKPD Perubahan';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = 'modul2';
                $breadcrumb->begin();
                $breadcrumb->add(['label' => 'RKPD']);
                $breadcrumb->add(['label' => 'RKPD']);
                $breadcrumb->add(['label' => $this->title]);
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
            <h2 class="panel-title">Dokumen RKPD Perubahan</h2>
          </p>
        </div>

        <div class="panel-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="#" method="">
            <div>
              <a type="button" id="btnAddDokumen" class="btn btn-labeled btn-sm btn-success" data-dismiss="modal"><span
                  class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span> Tambah Dokumen</a>
            </div>
          </form>

          <div class='tabs-x tabs-above tab-bordered tabs-krajee'>
            <ul class="nav nav-tabs" role="tablist">
              <li class="active"><a href="#dokumen" aria-controls="dokumen" role="tab" data-toggle="tab">Dokumen
                  RKPD</a></li>
              <li class="disabled"><a href="#rekap" aria-controls="rekap" role="tab-kv" data-toggle="tab">Rekapitulasi
                  Data</a></li>
            </ul>

            <div class="tab-content">
              <div role="tabpanel" class="tab-pane fade in active" id="dokumen">
                <br>
                <div>
                  <table id="tblDokumen" class="table table-striped table-bordered table-responsive" cellspacing="0"
                    width="100%">
                    <thead>
                      <tr>
                        <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                        <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                        <th width="10%" style="text-align: center; vertical-align:middle">Tahun RKPD</th>
                        <th width="10%" style="text-align: center; vertical-align:middle">Nomor Dokumen</th>
                        <th style="text-align: center; vertical-align:middle">Uraian Dokumen</th>
                        <th width="10%" style="text-align: center; vertical-align:middle">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane fade in" id="rekap">
                <br>
                <div>
                  <table id="tblProgramRKPD" class="table table-striped table-bordered table-responsive">
                    <thead>
                      <tr>
                        <th width="10px" rowspan="3" style="text-align: center; vertical-align:middle">Aksi</th>
                        <th width="5px" rowspan="3" style="text-align: center; vertical-align:middle">No Urut</th>
                        <th rowspan="3" style="text-align: center; vertical-align:middle">Nama Program RKPD</th>
                        <th colspan="8" style="text-align: center; vertical-align:middle">Rincian Data</th>
                      </tr>
                      <tr>
                        <th colspan="2" style="text-align: center; vertical-align:middle">RKPD</th>
                        <th colspan="2" style="text-align: center; vertical-align:middle">Program SKPD</th>
                        <th colspan="2" style="text-align: center; vertical-align:middle">Kegiatan SKPD</th>
                        <th colspan="2" style="text-align: center; vertical-align:middle">Aktivitas SKPD</th>
                      </tr>
                      <tr>
                        <th width="15px" style="text-align: center; vertical-align:middle">Pagu</th>
                        <th width="50px" style="text-align: center; vertical-align:middle">Pelaksana</th>
                        <th width="15px" style="text-align: center; vertical-align:middle">Jumlah</th>
                        <th width="50px" style="text-align: center; vertical-align:middle">Pagu</th>
                        <th width="15px" style="text-align: center; vertical-align:middle">Jumlah</th>
                        <th width="50px" style="text-align: center; vertical-align:middle">Pagu</th>
                        <th width="15px" style="text-align: center; vertical-align:middle">Jumlah</th>
                        <th width="50px" style="text-align: center; vertical-align:middle">Pagu</th>
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
          <input type="hidden" name="id_dokumen_rkpd" id="id_dokumen_rkpd">
          <input type="hidden" name="tahun_login" id="tahun_login" value="{{Session::get('tahun')}}">
          <div class="form-group">
            <label for="tahun_rkpd" class="col-sm-3 control-label" align='left'>Tahun RKPD :</label>
            <div class="col-sm-2">
              <input type="text" class="form-control" id="tahun_rkpd" name="tahun_rkpd" required="required" disabled
                style="text-align: center;">
            </div>
          </div>
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
            <label for="nomor_rkpd" class="col-sm-3 control-label" align='left'>Nomor Dokumen :</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="nomor_rkpd" name="nomor_rkpd" required="required">
            </div>
          </div>
          <div class="form-group">
            <label for="uraian_perkada" class="col-sm-3 control-label" align='left'>Uraian Dokumen :</label>
            <div class="col-sm-8">
              <textarea type="text" class="form-control" id="uraian_perkada" name="uraian_perkada" required="required"
                rows="3"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="title">Dokumen RKPD Referensi :</label>
            <div class="col-sm-8">
              <select type="text" class="form-control id_dokumen_rkpd_ref select2" id="id_dokumen_rkpd_ref"
                name="id_dokumen_rkpd_ref"></select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="title">Dokumen APBD Referensi :</label>
            <div class="col-sm-8">
              <select type="text" class="form-control id_dokumen_apbd_ref select2" id="id_dokumen_apbd_ref"
                name="id_dokumen_apbd_ref"></select>
            </div>
          </div>
          <div class="form-group">
            <label for="id_unit_perencana" class="col-sm-3 control-label" align='left'>Unit Perencana :</label>
            <div class="col-sm-8">
              <input type="hidden" class="form-control" name="id_unit_perencana" id="id_unit_perencana">
              <input type="text" class="form-control" name="id_unit_perencana_display" id="id_unit_perencana_display"
                disabled>
            </div>
          </div>
          <div class="form-group">
            <label for="nama_tandatangan" class="col-sm-3 control-label" align='left'>Nama Kepala Bappeda :</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="nama_tandatangan" name="nama_tandatangan">
            </div>
          </div>
          <div class="form-group">
            <label for="nip_tandatangan" class="col-sm-3 control-label" align='left'>NIP Kepala Bappeda :</label>
            <div class="col-sm-4">
              <input type="text" class="form-control nip" id="nip_tandatangan_display" name="nip_tandatangan_display"
                maxlength="18" style="text-align: center;">
              <input type="hidden" class="form-control" id="nip_tandatangan" name="nip_tandatangan">
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
        <h4>Hapus Dokumen Rancangan Awal RKPD</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" id="id_dokumen_hapus" name="id_dokumen_hapus">
        <div class="alert alert-danger">
          <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border text-danger" aria-hidden="true"></i>
          Yakin akan menghapus Dokumen Rancangan Awal RKPD dengan nomor dokumen: <strong><span
              class="ur_dokumen_del"></span></strong> ?
          <br>
          <br>
          <strong>Catatan : Penghapusan dokumen ini akan menghapus data Rancangan Awal RKPD yang telah diproses
            !!!!</strong>
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

<div id="cariReload" class="modal fade" role="dialog" tabindex="-1" data-focus-on="input:first" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Daftar Program RKPD yang belum di-Load ke RKPD Perubahan</h3>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" autocomplete='off' action="" onsubmit="return false;">
          <div class="form-group">
            <div class="col-sm-12">
              <table id='tblReProses' class="table display compact table-striped table-bordered" width="100%">
                <thead>
                  <tr>
                    <th width="10px" style="text-align: center; vertical-align:middle">Pilih</th>
                    <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                    <th style="text-align: center; vertical-align:middle">Nama Program RKPD</th>
                    <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
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
            <button id="btnProsesAll" type="button" class="btn btn-labeled btn-success"><span class="btn-label"><i
                  class="fa fa-download fa-fw fa-lg"></i></span> Proses Load</button>
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
        <h4 style="text-align: center;">Perubahan Status Rancangan Awal RKPD</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" id="id_dokumen_posting" name="id_dokumen_posting">
        <input type="hidden" id="status_dokumen_posting" name="status_dokumen_posting">
        <input type="hidden" id="tahun_dokumen_posting" name="tahun_dokumen_posting">
        <div class="alert alert-success">
          <div>
            <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border text-info" aria-hidden="true"></i>
            <p>Yakin akan melakukan proses <strong><i><span id="ur_status_dokumen_posting"></span></i></strong> pada
              Dokumen RKPD Perubahan Tahun <strong><span id="ur_tahun_posting"></span></strong> ?</p>
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

@endsection

@section('scripts')
<script src="{{ asset('/protected/resources/views/rkpdubah/js/js_dokumen.js')}}"></script>
@endsection