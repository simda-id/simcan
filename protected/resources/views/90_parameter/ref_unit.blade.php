<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.parameterlayout')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <?php
                $this->title = 'Unit Perangkat Daerah Pmd-90';
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
          <h2 class="panel-title">Referensi Unit & Sub Unit Perangkat Daerah Permendagri 90</h2>
        </div>

        <div class="panel-body"><br>
          <div class='tabs-x tabs-above tab-bordered tabs-krajee'>
            <ul class="nav nav-tabs nav-justified" role="tablist">
              <li class="active"><a href="#urusan" aria-controls="urusan" role="tab" data-toggle="tab">Urusan-Bidang</a>
              </li>
              <li class="disabled"><a href="#unit" aria-controls="unit" role="tab-kv" data-toggle="tab">Unit</a></li>
              <li class="disabled"><a href="#subunit" aria-controls="subunit" role="tab-kv" data-toggle="tab">Sub
                  Unit</a></li>
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
              <div role="tabpanel" class="tab-pane fade in" id="unit">
                <br>
                <div class="addUnit">
                  <button id="btnTambahUnit" type="button" class="btnTambahUnit btn btn-labeled btn-sm btn-primary">
                    <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Unit Perangkat Daerah
                    Kewilayahan</button>
                </div>
                <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered table-responsive compact">
                      <tbody>
                        <tr class="backBidang">
                          <td width="20%" style="text-align: left; vertical-align:top;">Urusan</td>
                          <td style="text-align: left; vertical-align:top;"><label id="ur_urusan" align='left'></label>
                          </td>
                        </tr>
                        <tr class="backBidang">
                          <td width="20%" style="text-align: left; vertical-align:top;">Bidang</td>
                          <td style="text-align: left; vertical-align:top;"><label id="ur_bidang" align='left'></label>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </form>
                <table id="tblUnit" class="table table-striped table-bordered table-responsive compact" width="100%"
                  cellspacing="0">
                  <thead>
                    <tr>
                      <th width='10%' style="text-align: center; vertical-align:middle">Aksi</th>
                      <th width='5%' style="text-align: center; vertical-align:middle">No Urut</th>
                      <th width='15%' style="text-align: center; vertical-align:middle">Kode Unit</th>
                      <th style="text-align: center; vertical-align:middle">Uraian Unit</th>
                      <th width='5%' style="text-align: center; vertical-align:middle">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
              <div role="tabpanel" class="tab-pane fade in" id="subunit">
                <br>
                <div class="col-md-12">
                  <div class="addSub">
                    <button id="btnTambahSub" type="button" class="btnTambahSub btn btn-labeled btn-sm btn-primary">
                      <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Sub Unit Perangkat
                      Daerah</button>
                  </div>
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
                          <tr class="backUnit">
                            <td width="20%" style="text-align: left; vertical-align:top;">Unit</td>
                            <td style="text-align: left; vertical-align:top;"><label id="ur_unit" align='left'></label>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </form>
                  <table id="tblSubUnit" class="table table-striped table-bordered table-responsive compact"
                    width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th width='10%' style="text-align: center; vertical-align:middle">Aksi</th>
                        <th width='5%' style="text-align: center; vertical-align:middle">No Urut</th>
                        <th width='15%' style="text-align: center; vertical-align:middle">Kode Unit</th>
                        <th style="text-align: center; vertical-align:middle">Uraian Sub Unit</th>
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

  <!--Modal Tambah Unit-->
  <div id="ModalUnit" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="">Data Detail Perangkat Daerah Permendagri 90</h4>
        </div>
        <div class="modal-body">
          <form name="frmModalUnit" class="form-horizontal" role="form" autocomplete='off' action="" method="post"
            onsubmit="return false;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id_bidang" id="id_bidang">
            <input type="hidden" name="id_bidang2" id="id_bidang2">
            <input type="hidden" name="id_bidang3" id="id_bidang3">
            <input type="hidden" name="id_unit" id="id_unit">
            <input type="hidden" name="status_data_unit" id="status_data_unit">
            <div class="form-group">
              <label for="kode_bidang" class="col-sm-3" align='left'>Bidang Kewenangan 1</label>
              <div class="col-sm-1">
                <input type="text" class="form-control" id="kode_bidang" name="kode_bidang" readonly
                  style="text-align:center;">
              </div>
              <div class="col-sm-7">
                <input type="text" class="form-control" id="nm_bidang" name="nm_bidang" readonly>
              </div>
            </div>
            <div class="form-group">
              <label for="kode_bidang2" class="col-sm-3" align='left'>Bidang Kewenangan 2</label>
              <div class="col-sm-1">
                <input type="text" class="form-control" id="kode_bidang2" name="kode_bidang2" readonly
                  style="text-align:center;">
              </div>
              <div class="col-sm-7">
                <input type="text" class="form-control" id="nm_bidang2" name="nm_bidang2" readonly>
              </div>
            </div>
            <div class="form-group">
              <label for="kode_bidang3" class="col-sm-3" align='left'>Bidang Kewenangan 3</label>
              <div class="col-sm-1">
                <input type="text" class="form-control" id="kode_bidang3" name="kode_bidang3" readonly
                  style="text-align:center;">
              </div>
              <div class="col-sm-7">
                <input type="text" class="form-control" id="nm_bidang3" name="nm_bidang3" readonly>
              </div>
            </div>
            <div class="form-group">
              <label for="kd_unit" class="col-sm-3" align='left'>Kode Unit</label>
              <div class="col-sm-1">
                <input type="text" class="form-control number" id="kd_unit" name="kd_unit" style="text-align:center;">
              </div>
              <div class="col-sm-3">
                <input type="text" class="form-control" id="kode_unit" name="kode_unit" readonly>
              </div>
            </div>
            <div class="form-group">
              <label for="nm_unit" class="col-sm-3" align='left'>Nama Unit</label>
              <div class="col-sm-8">
                <textarea type="text" class="form-control" name="nm_unit" id="nm_unit" rows="3"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="rbStatusUnit" class="col-sm-3 control-label" align='left'>Status Unit :</label>
              <div class="col-sm-8">
                <label>
                  <input type="radio" class="rbStatusUnit" name="rbStatusUnit" id="rbStatusUnit" value="1"> Aktif
                </label>
                <label>
                  <input type="radio" class="rbStatusUnit" name="rbStatusUnit" id="rbStatusUnit" value="0"> Tidak Aktif
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
                <button type="button" class="btn btn-sm btn-success btnUnit btn-labeled" data-dismiss="modal">
                  <span class="btn-label"><i class="glyphicon glyphicon-save"></i></span>Simpan</button>
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

  <!--Modal Tambah -->
  <div id="ModalSubUnit" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form name="frmModalSubUnit" class="form-horizontal" role="form" autocomplete='off' action="" method="post"
            onsubmit="return false;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id_sub_unit" id="id_sub_unit">
            <input type="hidden" name="id_unit_sub" id="id_unit_sub">
            <div class="form-group">
              <label for="kd_sub" class="col-sm-3" align='left'>Kode Sub Unit</label>
              <div class="col-sm-2">
                <input type="text" class="form-control number" id="kd_sub" name="kd_sub" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="nm_sub" class="col-sm-3" align='left'>Nama Sub Unit</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="nm_sub" name="nm_sub" required="required">
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
                <button type="button" class="btn btn-sm btn-success btnSubUnit btn-labeled" data-dismiss="modal">
                  <span class="btn-label"><i class="glyphicon glyphicon-save"></i></span>Simpan</button>
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
  <div id="HapusSubUnit" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <input type="hidden" id="id_sub_unit_hapus" name="id_sub_unit_hapus">
          <div class="alert alert-danger deleteContent">
            <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border" style="color:red;"
              aria-hidden="true"></i>
            <br>
            Yakin akan menghapus Sub Unit Perangkat Daerah : <strong><span id="nm_sub_unit_hapus"></span></strong> ini ?
            <br>
            <br>
          </div>
        </div>
        <div class="modal-footer">
          <div class="ui-group-buttons">
            <button type="button" class="btn btn-sm btn-danger btn-labeled btnDelSubUnit" data-dismiss="modal"><span
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
    src="{{ asset('/protected/resources/views/90_parameter/js_unit.js')}}">
  </script>
  @endsection