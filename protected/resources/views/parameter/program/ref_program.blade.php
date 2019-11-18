<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.parameterlayout')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <?php
                $this->title = 'Program-Kegiatan';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = 'admin/parameter';
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
          <h2 class="panel-title">Referensi Program - Kegiatan Perangkat Daerah</h2>
        </div>

        <div class="panel-body"><br>
          <div class="form-group hidden">
            <button type="button" class="btn btn-primary btn-labeled btnLoad" data-dismiss="modal" aria-hidden="true">
              <span class="btn-label"><i class="fa fa-paper-plane fa-fw fa-lg"></i></span>Sinkronisasi
              Program-Kegiatan</button>
          </div>
          <div class='tabs-x tabs-above tab-bordered tabs-krajee'>
            <ul class="nav nav-tabs nav-justified" role="tablist">
              <li class="active"><a href="#urusan" aria-controls="urusan" role="tab" data-toggle="tab">Urusan-Bidang</a>
              </li>
              <li><a href="#program" aria-controls="program" role="tab" data-toggle="tab">Program</a></li>
              <li><a href="#kegiatan" aria-controls="kegiatan" role="tab-kv" data-toggle="tab">Kegiatan</a></li>
            </ul>
            <div class="tab-content">
              <br>
              <div role="tabpanel" class="tab-pane fade in active" id="urusan">
                <div class="col-md-12">
                  <table id="tblUrusan" class="table table-striped table-bordered table-responsive compact" width="100%"
                    cellspacing="0">
                    <thead>
                      <tr>
                        <th width="5px" style="text-align: center; vertical-align:middle"></th>
                        <th width="10%" style="text-align: center; vertical-align:middle">No Urut</th>
                        <th style="text-align: center; vertical-align:middle">Uraian Urusan Pemerintahan</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane fade in" id="program">
                <div class="col-md-12">
                  <div class="add">
                    <button id="btnAddProgram" type="button" class="btn btn-labeled btn-sm btn-success"><span
                        class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>Tambah Program</button>
                  </div>
                  <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered table-responsive compact">
                        <tbody>
                          <tr>
                            <td width="20%" style="text-align: left; vertical-align:top;">Urusan</td>
                            <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd" id="ur_urusan"
                                align='left'></label></td>
                          </tr>
                          <tr>
                            <td width="20%" style="text-align: left; vertical-align:top;">Bidang</td>
                            <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd" id="ur_bidang"
                                align='left'></label></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </form>
                  <div class="table-responsive">
                    <table id="tblProgram" class="table table-striped table-bordered table-responsive compact"
                      width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th width="10%" style="text-align: center; vertical-align:middle">No Urut</th>
                          <th width="10%" style="text-align: center; vertical-align:middle">Kode Program</th>
                          <th style="text-align: center; vertical-align:middle">Nama Program</th>
                          <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane fade in" id="kegiatan">
                <div class="col-md-12">
                  <div class="add">
                    <button id="btnTambahKegiatan" type="button" class="btn btn-labeled btn-sm btn-success">
                      <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>Tambah Kegiatan</button>
                  </div>
                  <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered">
                        <tbody>
                          <tr>
                            <td width="20%" style="text-align: left; vertical-align:top;">Urusan</td>
                            <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd"
                                id="ur_urusan_keg" align='left'></label></td>
                          </tr>
                          <tr>
                            <td width="20%" style="text-align: left; vertical-align:top;">Bidang</td>
                            <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd"
                                id="ur_bidang_keg" align='left'></label></td>
                          </tr>
                          <tr>
                            <td width="20%" style="text-align: left; vertical-align:top;">Program</td>
                            <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd"
                                id="ur_program_keg" align='left'></label></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </form>
                  <div class="table-responsive">
                    <table id="tblKegiatan" class="table table-striped table-bordered table-responsive compact"
                      width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th width="10%" style="text-align: center; vertical-align:middle">No Urut</th>
                          <th width="10%" style="text-align: center; vertical-align:middle">Kode Kegiatan</th>
                          <th style="text-align: center; vertical-align:middle">Nama Kegiatan</th>
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
  </div>

  <script id="details-bidang" type="text/x-handlebars-template">
    <table class="table table-striped table-bordered table-responsive compact details-table" id="bidang-@{{kd_urusan}}">
            <thead>
              <tr>
                  <th width="10%" style="text-align: center; vertical-align:middle;">Kd Bidang</th>
                  <th style="text-align: center; vertical-align:middle;">Nama Bidang</th>
              </tr>
            </thead>
            <tbody></tbody>
        </table>
  </script>


  <!--Modal Tambah -->
  <div id="ModalProgram" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form name="frmModalProgram" class="form-horizontal" role="form" autocomplete='off' action="" method="post"
            onsubmit="return false;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id_bidang" id="id_bidang">
            <input type="hidden" name="id_program" id="id_program">
            <div class="form-group">
              <label for="kd_program" class="col-sm-3" align='left'>Kode Program</label>
              <div class="col-sm-2">
                <input type="text" class="form-control number" id="kd_program" name="kd_program" maxlength="4"=""
                  required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="nm_program" class="col-sm-3" align='left'>Nama Program</label>
              <div class="col-sm-8">
                <textarea type="name" class="form-control" id="nm_program" name="nm_program" rows="3"
                  required="required"></textarea>
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
                <button type="button" class="btn btn-sm btn-success btnProgram btn-labeled" data-dismiss="modal">
                  <span class="btn-label"><i id="nmbtnSatuan"
                      class="glyphicon glyphicon-save"></i></span>Simpan</button>
                <div class="or"></div>
                <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal"
                  aria-hidden="true">
                  <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--Modal Hapus -->
  <div id="HapusProgram" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <input type="hidden" id="id_program_hapus" name="id_program_hapus">
          <div class="alert alert-danger deleteContent">
            <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border" style="color:red;"
              aria-hidden="true"></i>
            <br>
            Yakin akan menghapus Kegiatan : <strong><span id="nm_program_hapus"></span></strong> ?
            <br>
            <br>
          </div>
          <div class="modal-footer">
            <div class="ui-group-buttons">
              <button type="button" class="btn btn-sm btn-danger btn-labeled btnDelProgram" data-dismiss="modal"><span
                  class="btn-label"><i id="footer_action_button" class="glyphicon glyphicon-trash"></i></span>
                Hapus</button>
              <div class="or"></div>
              <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal"
                aria-hidden="true"><span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>
                Tutup</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="ModalKegiatan" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form name="frmModalKegiatan" class="form-horizontal" role="form" autocomplete='off' action="" method="post"
            onsubmit="return false;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id_program_keg" id="id_program_keg">
            <input type="hidden" name="id_kegiatan" id="id_kegiatan">
            <div class="form-group">
              <label for="kd_kegiatan" class="col-sm-3" align='left'>Kode Kegiatan</label>
              <div class="col-sm-2">
                <input type="text" class="form-control number" id="kd_kegiatan" name="kd_kegiatan" maxlength="4"=""
                  required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="nm_kegiatan" class="col-sm-3" align='left'>Nama Kegiatan</label>
              <div class="col-sm-8">
                <textarea type="name" class="form-control" id="nm_kegiatan" name="nm_kegiatan" rows="3"
                  required="required"></textarea>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <div class="col-sm-2 text-left">
          </div>
          <div class="col-sm-10 text-right">
            <div class="ui-group-buttons">
              <button type="button" class="btn btn-sm btn-success btnKegiatan btn-labeled" data-dismiss="modal">
                <span class="btn-label"><i id="nmbtnSatuan" class="glyphicon glyphicon-save"></i></span>Simpan</button>
              <div class="or"></div>
              <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--Modal Hapus -->
  <div id="HapusKegiatan" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <input type="hidden" id="id_kegiatan_hapus" name="id_kegiatan_hapus">
          <div class="alert alert-danger deleteContent">
            <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border" style="color:red;"
              aria-hidden="true"></i>
            <br>
            Yakin akan menghapus Kegiatan : <strong><span id="nm_kegiatan_hapus"></span></strong> ?
            <br>
            <br>
          </div>
          <div class="modal-footer">
            <div class="ui-group-buttons">
              <button type="button" class="btn btn-sm btn-danger btn-labeled btnDelKegiatan" data-dismiss="modal"><span
                  class="btn-label"><i id="footer_action_button" class="glyphicon glyphicon-trash"></i></span>
                Hapus</button>
              <div class="or"></div>
              <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal"
                aria-hidden="true"><span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>
                Tutup</button>
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
    src="{{ asset('/protected/resources/views/parameter/program/JsRefProgram.js')}}"> </script>
  @endsection