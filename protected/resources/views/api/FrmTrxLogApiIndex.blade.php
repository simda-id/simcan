<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app6')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <?php
                $this->title = ' API Management ';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = 'transfer';
                $breadcrumb->begin();
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
          <h2 class="panel-title">SIPD Kemendagri</h2>
        </div>

        <div class="panel-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" onsubmit="return false;">
            <div class="form-group">
              <label for="tahun_rkpd" class="col-sm-2 control-label" align='left' style="">Tahun</label>
              <div class="col-sm-2">
                <input class="form-control text-center" type="text" id="tahun_rkpd" name="tahun_rkpd"
                  value="{{Session::get('tahun')}}" disabled>
              </div>
              <label class="control-label col-sm-2" for="jns_dokumen" style="text-align: right;">Jenis
                Dokumen
                :</label>
              <div class="col-sm-2">
                <select class="form-control jns_dokumen select2" name="jns_dokumen" id="jns_dokumen">
                  <option value="-1">--Pilih Jenis Dokumen--</option>
                  <option value="0">RKPD RANWAL</option>
                  <option value="1">RKPD FINAL</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="title">No Dokumen RKPD</label>
              <div class="col-sm-6">
                <select type="text" class="form-control id_dokumen_rkpd select2" id="id_dokumen_rkpd"
                  name="id_dokumen_rkpd"></select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="title"></label>
              <div class="col-sm-6" style="text-align: right;">
                <a class="add-satuan btn-labeled btn btn-sm btn-success"><span class="btn-label"><i
                      class="fa fa-cloud-upload fa-lg fa-fw"></i></span> Kirim Data ke SIPD</a>
              </div>
            </div>
          </form>
          <br>
          <table id="TblLogKirim" class="table display compact table-striped table-bordered table-responsive"
            width="100%">
            <thead>
              <tr>
                <th width="5%" height="50px" style="text-align: center; vertical-align:middle">No Urut</th>
                <th width="12%" height="50px" style="text-align: center; vertical-align:middle">Tanggal Kirim</th>
                <th width="8%" height="50px" style="text-align: center; vertical-align:middle">Kode Unit</th>
                <th width="30%" height="50px" style="text-align: center; vertical-align:middle">Nama Unit</th>
                <th height="50px" style="text-align: center; vertical-align:middle">Log Kirim</th>
                <th width="10%" height="50px" style="text-align: center; vertical-align:middle">Aksi</th>
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


<!--Modal Tambah -->
<div id="frmKirimApi" class="modal fade" role="dialog" tabindex="-1" data-focus-on="input:first" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Daftar Unit OPD yang siap dikirim </h3>
      </div>
      <div class="modal-body">

        <div class="form-group">
          <div class="col-sm-12">
            <table id='tblProses' class="table display compact table-striped table-bordered" width="100%">
              <thead>
                <tr>
                  <th width="10px" style="text-align: center; vertical-align:middle">Pilih</th>
                  <th width="15%" style="text-align: center; vertical-align:middle">Kode Unit</th>
                  <th style="text-align: center; vertical-align:middle">Nama Unit</th>
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
                  class="fa fa-paper-plane-o fa-fw fa-lg"></i></span> Proses Load</button>
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

@endsection

@section('scripts')
<script type="text/javascript" language="javascript" class="init"
  src="{{ asset('/protected/resources/views/api/js/js_log_sink.js')}}">
</script>
@endsection