<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app6')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <?php
                $this->title = 'Sinkronisasi Rekening';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = '';
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
          <h2 class="panel-title">Referensi Kode Rekening</h2>
        </div>

        <div class="panel-body"><br>
          <div class="form-group hidden">
            <button type="button" class="btn btn-primary btn-labeled btnLoad" data-dismiss="modal" aria-hidden="true">
              <span class="btn-label"><i class="fa fa-paper-plane fa-fw fa-lg"></i></span>Sinkronisasi Rekening
              Keuangan</button>
          </div>
          <div class='tabs-x tabs-above tab-bordered tabs-krajee'>
            <ul class="nav nav-tabs nav-justified" role="tablist">
              <li class="active"><a href="#akun" aria-controls="akun" role="tab" data-toggle="tab">Akun</a></li>
              <li><a href="#golongan" aria-controls="golongan" role="tab" data-toggle="tab">Golongan</a></li>
              <li><a href="#jenis" aria-controls="jenis" role="tab-kv" data-toggle="tab">Jenis</a></li>
              <li><a href="#obyek" aria-controls="obyek" role="tab-kv" data-toggle="tab">Obyek</a></li>
              <li><a href="#rincian" aria-controls="rincian" role="tab-kv" data-toggle="tab">Rincian Obyek</a></li>
            </ul>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane fade in active" id="akun">
                <br>
                <div class="col-md-12">
                  <button class="btnAddBulkRekening btn-labeled btn btn-sm btn-success"><span class="btn-label">
                      <i class="fa fa-plus fa-fw fa-lg"></i></span>Proses Persiapan Sikronisasi Rekening</button>
                  <br>
                  <table id="tblAkun" class="table table-striped table-bordered table-responsive compact" width="100%"
                    cellspacing="0">
                    <thead>
                      <tr>
                        <th width="5%" style="text-align: center; vertical-align:middle">Kd Akun</th>
                        <th style="text-align: center; vertical-align:middle">Uraian Simda Integrated</th>
                        <th style="text-align: center; vertical-align:middle">Uraian Simda Keuangan</th>
                        <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane fade in" id="golongan">
                <br>
                <div class="col-md-12">
                  <table id="tblGolongan" class="table table-striped table-bordered table-responsive compact"
                    width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th width="5%" style="text-align: center; vertical-align:middle">Kd Akun</th>
                        <th width="5%" style="text-align: center; vertical-align:middle">Kd Golongan</th>
                        <th style="text-align: center; vertical-align:middle">Uraian Simda Integrated</th>
                        <th style="text-align: center; vertical-align:middle">Uraian Simda Keuangan</th>
                        <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane fade in" id="jenis">
                <br>
                <div class="col-md-12">
                  <table id="tblJenis" class="table table-striped table-bordered table-responsive compact" width="100%"
                    cellspacing="0">
                    <thead>
                      <tr>
                        <th width="5%" style="text-align: center; vertical-align:middle">Kd Akun</th>
                        <th width="5%" style="text-align: center; vertical-align:middle">Kd Golongan</th>
                        <th width="5%" style="text-align: center; vertical-align:middle">Kd Jenis</th>
                        <th style="text-align: center; vertical-align:middle">Uraian Simda Integrated</th>
                        <th style="text-align: center; vertical-align:middle">Uraian Simda Keuangan</th>
                        <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane fade in" id="obyek">
                <br>
                <div class="col-md-12">
                  <table id="tblObyek" class="table table-striped table-bordered table-responsive compact" width="100%"
                    cellspacing="0">
                    <thead>
                      <tr>
                        <th width="5%" style="text-align: center; vertical-align:middle">Kd Akun</th>
                        <th width="5%" style="text-align: center; vertical-align:middle">Kd Golongan</th>
                        <th width="5%" style="text-align: center; vertical-align:middle">Kd Jenis</th>
                        <th width="5%" style="text-align: center; vertical-align:middle">Kd Obyek</th>
                        <th style="text-align: center; vertical-align:middle">Uraian Simda Integrated</th>
                        <th style="text-align: center; vertical-align:middle">Uraian Simda Keuangan</th>
                        <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane fade in" id="rincian">
                <br>
                <div class="col-md-12">
                  <table id="tblRincian" class="table table-striped table-bordered table-responsive compact"
                    width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th width="5%" style="text-align: center; vertical-align:middle">Kd Akun</th>
                        <th width="5%" style="text-align: center; vertical-align:middle">Kd Golongan</th>
                        <th width="5%" style="text-align: center; vertical-align:middle">Kd Jenis</th>
                        <th width="5%" style="text-align: center; vertical-align:middle">Kd Obyek</th>
                        <th width="5%" style="text-align: center; vertical-align:middle">Kd Rincian</th>
                        <th style="text-align: center; vertical-align:middle">Uraian Simda Integrated</th>
                        <th style="text-align: center; vertical-align:middle">Uraian Simda Keuangan</th>
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
    src="{{ asset('/protected/resources/views/api/js/js_sink_rekening.js')}}">
  </script>
  @endsection