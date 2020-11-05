<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.parameterlayout')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <?php
        $this->title = 'Program - Kegiatan - Sub Kegiatan Pmd-90';
        $breadcrumb = new Breadcrumb();
        $breadcrumb->homeUrl = 'parameter/dash';
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
          <h2 class="panel-title">Referensi Program, Kegiatan & Sub Kegiatan Permendagri 90</h2>
        </div>
        <div class="panel-body"><br>
          <div class='tabs-x tabs-above tab-bordered tabs-krajee'>
            <ul class="nav nav-tabs nav-justified" role="tablist">
              <li class="active"><a href="#urusan" aria-controls="urusan" role="tab" data-toggle="tab">Urusan-Bidang</a>
              </li>
              <li class="disabled"><a href="#program" aria-controls="program" role="tab-kv"
                  data-toggle="tab">Program</a></li>
              <li class="disabled"><a href="#kegiatan" aria-controls="kegiatan" role="tab-kv"
                  data-toggle="tab">Kegiatan</a></li>
              <li class="disabled"><a href="#subkegiatan" aria-controls="subkegiatan" role="tab-kv"
                  data-toggle="tab">Sub Kegiatan</a></li>
            </ul>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane fade in active" id="urusan">
                <br>
                <div class="col-md-12">
                  <table id="tblUrusan" class="table table-striped table-bordered table-responsive compact" width="100%"
                    cellspacing="0">
                    <thead>
                      <tr>
                        <th width="5px" style="text-align: center; vertical-align:middle"></th>
                        <th width="10%" style="text-align: center; vertical-align:middle">No Urut</th>
                        <th style="text-align: center; vertical-align:middle">Urusan / Bidang Pemerintahan</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane fade in" id="program">
                <br>
                <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered table-responsive compact">
                      <tbody>
                        <tr class="backBidang">
                          <td width="20%" style="text-align: left; vertical-align:top;">Urusan</td>
                          <td style="text-align: left; vertical-align:top;"><label id="ur_urusan_prog"
                              align='left'></label>
                          </td>
                        </tr>
                        <tr class="backBidang">
                          <td width="20%" style="text-align: left; vertical-align:top;">Bidang</td>
                          <td style="text-align: left; vertical-align:top;"><label id="ur_bidang_prog"
                              align='left'></label>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="2" style="text-align: left; vertical-align:top;">
                            <div class="addProgram hidden">
                              <button id="btnTambahProgram" type="button"
                                class="btnTambahProgram btn btn-labeled btn-sm btn-primary">
                                <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah
                                Program SIPD</button>
                              <label id="ur_bidang_prog" align='left'>*)
                                Silahkan tambahkan program yang sesuai dengan data Program yang terdapat di SIPD baik
                                kode maupun nomenklatur</label>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </form>
                <table id="tblProgram" class="table table-striped table-bordered table-responsive compact" width="100%"
                  cellspacing="0">
                  <thead>
                    <tr>
                      <th width='5%' style="text-align: center; vertical-align:middle">Aksi</th>
                      <th width='5%' style="text-align: center; vertical-align:middle">No Urut</th>
                      <th width='15%' style="text-align: center; vertical-align:middle">Kode Program</th>
                      <th style="text-align: center; vertical-align:middle">Uraian Program</th>
                      <th width="10%" style="text-align: center; vertical-align:middle">Kegiatan</th>
                      <th width="10%" style="text-align: center; vertical-align:middle">Sub Kegiatan</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
              <div role="tabpanel" class="tab-pane fade in" id="kegiatan">
                <br>
                <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered table-responsive compact">
                      <tbody>
                        <tr class="backBidang">
                          <td width="20%" style="text-align: left; vertical-align:top;">Urusan</td>
                          <td style="text-align: left; vertical-align:top;"><label id="ur_urusan_keg"
                              align='left'></label></td>
                        </tr>
                        <tr class="backBidang">
                          <td width="20%" style="text-align: left; vertical-align:top;">Bidang</td>
                          <td style="text-align: left; vertical-align:top;"><label id="ur_bidang_keg"
                              align='left'></label></td>
                        </tr>
                        <tr class="backProgram">
                          <td width="20%" style="text-align: left; vertical-align:top;">Program</td>
                          <td style="text-align: left; vertical-align:top;"><label id="ur_program_keg"
                              align='left'></label>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="2" style="text-align: left; vertical-align:top;">
                            <div class="addKegiatan hidden">
                              <button id="btnTambahKegiatan" type="button"
                                class="btnTambahKegiatan btn btn-labeled btn-sm btn-primary">
                                <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah
                                Kegiatan SIPD</button>
                              <label id="ur_bidang_prog" align='left'>*)
                                Silahkan tambahkan kegiatan yang sesuai dengan data Kegiatan yang terdapat di SIPD baik
                                kode maupun nomenklatur</label>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </form>
                <table id="tblKegiatan" class="table table-striped table-bordered table-responsive compact" width="100%"
                  cellspacing="0">
                  <thead>
                    <tr>
                      <th width='5%' style="text-align: center; vertical-align:middle">Aksi</th>
                      <th width='5%' style="text-align: center; vertical-align:middle">No Urut</th>
                      <th width='15%' style="text-align: center; vertical-align:middle">Kode Kegiatan</th>
                      <th style="text-align: center; vertical-align:middle">Uraian Kegiatan</th>
                      <th width="10%" style="text-align: center; vertical-align:middle">Sub Kegiatan</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
              <div role="tabpanel" class="tab-pane fade in" id="subkegiatan">
                <br>
                <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered table-responsive compact">
                      <tbody>
                        <tr class="backBidang">
                          <td width="20%" style="text-align: left; vertical-align:top;">Urusan</td>
                          <td style="text-align: left; vertical-align:top;"><label id="ur_urusan_sub"
                              align='left'></label></td>
                        </tr>
                        <tr class="backBidang">
                          <td width="20%" style="text-align: left; vertical-align:top;">Bidang</td>
                          <td style="text-align: left; vertical-align:top;"><label id="ur_bidang_sub"
                              align='left'></label></td>
                        </tr>
                        <tr class="backProgram">
                          <td width="20%" style="text-align: left; vertical-align:top;">Program</td>
                          <td style="text-align: left; vertical-align:top;"><label id="ur_program_sub"
                              align='left'></label>
                          </td>
                        </tr>
                        <tr class="backKegiatan">
                          <td width="20%" style="text-align: left; vertical-align:top;">Kegiatan</td>
                          <td style="text-align: left; vertical-align:top;"><label id="ur_kegiatan_sub"
                              align='left'></label>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="2" style="text-align: left; vertical-align:top;">
                            <div class="addSubKegiatan hidden">
                              <button id="btnTambahSubKegiatan" type="button"
                                class="btnTambahSubKegiatan btn btn-labeled btn-sm btn-primary">
                                <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah
                                Sub Kegiatan SIPD</button>
                              <label id="ur_bidang_prog" align='left'>*)
                                Silahkan tambahkan sub kegiatan yang sesuai dengan data Sub Kegiatan yang terdapat di
                                SIPD baik kode maupun nomenklatur</label>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </form>
                <table id="tblSubKegiatan" class="table table-striped table-bordered table-responsive compact"
                  width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width='5%' style="text-align: center; vertical-align:middle">Aksi</th>
                      <th width='5%' style="text-align: center; vertical-align:middle">No Urut</th>
                      <th width='15%' style="text-align: center; vertical-align:middle">Kode Sub Kegiatan</th>
                      <th style="text-align: center; vertical-align:middle">Uraian Sub Kegiatan</th>
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

  <script id="details-bidang" type="text/x-handlebars-template">
    <table class="table table-striped table-bordered table-responsive compact details-table" id="bidang-@{{kd_urusan}}">
    <thead>
      <tr>
          <th width="10%" style="text-align: center; vertical-align:middle;">Kode Bidang</th>
          <th style="text-align: center; vertical-align:middle;">Nama Bidang</th>
          <th width="10%" style="text-align: center; vertical-align:middle">Program</th>
          <th width="10%" style="text-align: center; vertical-align:middle">Kegiatan</th>
          <th width="10%" style="text-align: center; vertical-align:middle">Sub Kegiatan</th>
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
          <h4 class="modal-title">Data Nomenklatur Program Permendagri 90</h4>
        </div>
        <div class="modal-body">
          <form name="frmModalProgram" class="form-horizontal" role="form" autocomplete='off' action="" method="post"
            onsubmit="return false;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <label for="nm_bidang_prog" class="col-sm-3" align='left'>Kode Bidang</label>
              <div class="col-sm-8">
                <input type="hidden" name="id_bidang" id="id_bidang">
                <label id="nm_bidang_prog" name="nm_bidang_prog" align='left'></label>
              </div>
            </div>
            <div class="form-group">
              <label for="kd_program" class="col-sm-3" align='left'>Kode Program</label>
              <div class="col-sm-2">
                <input type="hidden" name="id_program" id="id_program">
                <input type="text" class="form-control number" id="kd_program" name="kd_program" maxlength="2"=""
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
            <div class="form-group">
              <label for="dasar_hkm_program" class="col-sm-3 control-label" align='left'>Dasar Hukum</label>
              <div class="col-sm-8">
                <select class="form-control select2 dasar_hkm_program" name="dasar_hkm_program"
                  id="dasar_hkm_program"></select>
              </div>
            </div>
            <div class="form-group" id="divStatusProgram">
              <label for="rbStatusProgram" class="col-sm-3 control-label" align='left'>Status Program</label>
              <div class="col-sm-2">
                <label>
                  <input type="radio" class="rbStatusProgram" name="rbStatusProgram" id="rbStatusProgram" value="0">
                  Aktif
                </label>
              </div>
              <div class="col-sm-5">
                <label>
                  <input type="radio" class="rbStatusProgram" name="rbStatusProgram" id="rbStatusProgram" value="1"> Non
                  Aktif (Tidak Digunakan)
                </label>
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
                <button id="btnSaveProgram" type="button" class="btn btn-success btn-labeled" data-dismiss="modal">
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

  <div id="ModalKegiatan" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Data Nomenklatur Kegiatan Permendagri 90</h4>
        </div>
        <div class="modal-body">
          <form name="frmModalKegiatan" class="form-horizontal" role="form" autocomplete='off' action="" method="post"
            onsubmit="return false;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <label for="nm_bidang_kegiatan" class="col-sm-3" align='left'>Kode Bidang</label>
              <div class="col-sm-8">
                <label id="nm_bidang_kegiatan" name="nm_bidang_kegiatan" align='left'></label>
              </div>
            </div>
            <div class="form-group">
              <label for="nm_program_keg" class="col-sm-3" align='left'>Kode Program</label>
              <div class="col-sm-8">
                <input type="hidden" name="id_program_keg" id="id_program_keg">
                <label id="nm_program_keg" name="nm_program_keg" align='left'></label>
              </div>
            </div>
            <div class="form-group">
              <label for="kd_kegiatan" class="col-sm-3" align='left'>Kode Kegiatan</label>
              <div class="col-sm-1" align="center">
                <input type="hidden" name="id_kegiatan" id="id_kegiatan">
                <label id="jns_pemda_keg" name="jns_pemda_keg" align='left'></label>
              </div>
              <div class="col-sm-2" align="center">
                <input type="text" class="form-control" id="kd_kegiatan" name="kd_kegiatan" maxlength="3"=""
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
            <div class="form-group">
              <label for="dasar_hkm_kegiatan" class="col-sm-3 control-label" align='left'>Dasar Hukum</label>
              <div class="col-sm-8">
                <select class="form-control select2 dasar_hkm_kegiatan" name="dasar_hkm_kegiatan"
                  id="dasar_hkm_kegiatan"></select>
              </div>
            </div>
            <div class="form-group" id="divStatusKegiatan">
              <label for="rbStatusKegiatan" class="col-sm-3 control-label" align='left'>Status Kegiatan</label>
              <div class="col-sm-2">
                <label>
                  <input type="radio" class="rbStatusKegiatan" name="rbStatusKegiatan" id="rbStatusKegiatan" value="0">
                  Aktif
                </label>
              </div>
              <div class="col-sm-5">
                <label>
                  <input type="radio" class="rbStatusKegiatan" name="rbStatusKegiatan" id="rbStatusKegiatan" value="1">
                  Non
                  Aktif (Tidak Digunakan)
                </label>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <div class="col-sm-2 text-left">
          </div>
          <div class="col-sm-10 text-right">
            <div class="ui-group-buttons">
              <button id="btnSaveKegiatan" type="button" class="btn btn-success btn-labeled" data-dismiss="modal">
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

  <div id="ModalSubKegiatan" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Data Nomenklatur Sub Kegiatan Permendagri 90</h4>
        </div>
        <div class="modal-body">
          <form name="frmModalSubKegiatan" class="form-horizontal" role="form" autocomplete='off' action=""
            method="post" onsubmit="return false;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <label for="nm_bidang_subkegiatan" class="col-sm-3" align='left'>Kode Bidang</label>
              <div class="col-sm-8">
                <label id="nm_bidang_subkegiatan" name="nm_bidang_subkegiatan" align='left'></label>
              </div>
            </div>
            <div class="form-group">
              <label for="nm_program_subkeg" class="col-sm-3" align='left'>Kode Program</label>
              <div class="col-sm-8">
                <label id="nm_program_subkeg" name="nm_program_subkeg" align='left'></label>
              </div>
            </div>
            <div class="form-group">
              <label for="nm_kegiatan_subkeg" class="col-sm-3" align='left'>Kode Kegiatan</label>
              <div class="col-sm-8">
                <input type="hidden" name="id_kegiatan_subkeg" id="id_kegiatan_subkeg">
                <label id="nm_kegiatan_subkeg" name="nm_kegiatan_subkeg" align='left'></label>
              </div>
            </div>
            <div class="form-group">
              <label for="kd_subkegiatan" class="col-sm-3" align='left'>Kode Kegiatan</label>
              <div class="col-sm-2" align="center">
                <input type="hidden" name="id_sub_kegiatan" id="id_sub_kegiatan">
                <input type="text" class="form-control" id="kd_subkegiatan" name="kd_subkegiatan" maxlength="3"=""
                  required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="nm_sub_kegiatan" class="col-sm-3" align='left'>Nama Sub Kegiatan</label>
              <div class="col-sm-8">
                <textarea type="name" class="form-control" id="nm_sub_kegiatan" name="nm_sub_kegiatan" rows="3"
                  required="required"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="dasar_hkm_subkegiatan" class="col-sm-3 control-label" align='left'>Dasar Hukum</label>
              <div class="col-sm-8">
                <select class="form-control select2 dasar_hkm_subkegiatan" name="dasar_hkm_subkegiatan"
                  id="dasar_hkm_subkegiatan"></select>
              </div>
            </div>
            <div class="form-group" id="divStatusSubKegiatan">
              <label for="rbStatusSubKegiatan" class="col-sm-3 control-label" align='left'>Status Sub Kegiatan</label>
              <div class="col-sm-2">
                <label>
                  <input type="radio" class="rbStatusSubKegiatan" name="rbStatusSubKegiatan" id="rbStatusSubKegiatan"
                    value="0"> Aktif
                </label>
              </div>
              <div class="col-sm-5">
                <label>
                  <input type="radio" class="rbStatusSubKegiatan" name="rbStatusSubKegiatan" id="rbStatusSubKegiatan"
                    value="1"> Non Aktif (Tidak Digunakan)
                </label>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <div class="col-sm-2 text-left">
          </div>
          <div class="col-sm-10 text-right">
            <div class="ui-group-buttons">
              <button id="btnSaveSubKegiatan" type="button" class="btn btn-success btn-labeled" data-dismiss="modal">
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
  @endsection

  @section('scripts')
  <script type="text/javascript" language="javascript" class="init"
    src="{{ asset('/protected/resources/views/90_parameter/js_program_kegiatan.js')}}">
  </script>
  @endsection