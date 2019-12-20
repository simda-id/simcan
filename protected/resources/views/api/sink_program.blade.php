<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app6')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <?php
                $this->title = 'Sinkronisasi Program Kegiatan';
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
          <h2 class="panel-title">Sinkronisasi Referensi Program & Kegiatan Perangkat Daerah</h2>
        </div>

        <div class="panel-body"><br>
          <div class='tabs-x tabs-above tab-bordered tabs-krajee'>
            <ul class="nav nav-tabs nav-justified" role="tablist">
              <li class="active"><a href="#urusan" aria-controls="urusan" role="tab" data-toggle="tab">Urusan-Bidang</a>
              </li>
              <li class="disabled"><a href="#unit" aria-controls="unit" role="tab-kv" data-toggle="tab">Program</a></li>
              <li class="disabled"><a href="#subunit" aria-controls="subunit" role="tab-kv"
                  data-toggle="tab">Kegiatan</a></li>
            </ul>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane fade in active" id="urusan">
                <div class="col-md-12">
                  <div class="">
                    <table id="tblUrusan" class="table table-striped table-bordered table-responsive compact"
                      width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th width="5px" style="text-align: center; vertical-align:middle"></th>
                          <th width="10%" style="text-align: center; vertical-align:middle">Kode Urusan</th>
                          <th style="text-align: center; vertical-align:middle">Uraian Urusan Pemerintahan</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane fade in" id="unit">
                <br>
                <div class="col-md-12">
                  <div class="add">
                    <button id="btnAddBulkProgram" type="button"
                      class="btnAddBulkProgram btn btn-labeled btn-sm btn-success">
                      <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>Update Program Perangkat
                      Daerah Simda Keuangan</button>
                  </div>
                  <div class="">
                    <table id="tblUnit" class="table table-striped table-bordered table-responsive compact" width="100%"
                      cellspacing="0">
                      <thead>
                        <tr>
                          <th colspan="3" width='18%' style="text-align: center; vertical-align:middle">Kode Program
                          </th>
                          <th rowspan="2" style="text-align: center; vertical-align:middle">Uraian Program Simda
                            Integrated
                          </th>
                          <th rowspan="2" style="text-align: center; vertical-align:middle">Uraian Program Simda
                            Keuangan
                          </th>
                          <th rowspan="2" width='10%' style="text-align: center; vertical-align:middle">Aksi</th>
                        </tr>
                        <tr>
                          <th style="text-align: center; vertical-align:middle">Urusan</th>
                          <th style="text-align: center; vertical-align:middle">Bidang</th>
                          <th style="text-align: center; vertical-align:middle">Program</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane fade in" id="subunit">
                <br>
                <div class="col-md-12">
                  <div class="add">
                    <button id="btnAddBulkKegiatan" type="button"
                      class="btnAddBulkKegiatan btn btn-labeled btn-sm btn-success">
                      <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>Update Kegiatan Perangkat
                      Daerah Simda Keuangan</button>
                  </div>
                  <div class="">
                    <table id="tblSubUnit" class="table table-striped table-bordered table-responsive compact"
                      width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th colspan="4" width='20%' style="text-align: center; vertical-align:middle">Kode Kegiatan
                          </th>
                          <th rowspan="2" style="text-align: center; vertical-align:middle">Uraian Kegiatan Simda
                            Integrated</th>
                          <th rowspan="2" style="text-align: center; vertical-align:middle">Uraian Kegiatan Simda
                            Keuangan</th>
                          <th rowspan="2" width='10%' style="text-align: center; vertical-align:middle">Aksi</th>
                        </tr>
                        <tr>
                          <th style="text-align: center; vertical-align:middle">Urusan</th>
                          <th style="text-align: center; vertical-align:middle">Bidang</th>
                          <th style="text-align: center; vertical-align:middle">Program</th>
                          <th style="text-align: center; vertical-align:middle">Kegiatan</th>
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

  <script id="details-bidang" type="text/x-handlebars-template">
    <table class="table table-striped table-bordered table-responsive compact details-table" id="bidang-@{{kd_urusan}}">
      <thead>
        <tr>
          <th width="10%" style="text-align: center; vertical-align:middle;">Kode Bidang</th>
          <th style="text-align: center; vertical-align:middle;">Nama Bidang</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
  </script>

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
    src="{{ asset('/protected/resources/views/api/js/js_sink_program.js')}}">
  </script>
  @endsection