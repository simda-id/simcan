<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.parameterlayout')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <?php
                $this->title = 'Kode Rekening';
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
                  <table id="tblAkun" class="table table-striped table-bordered table-responsive compact" width="100%"
                    cellspacing="0">
                    <thead>
                      <tr>
                        <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                        <th width="5%" style="text-align: center; vertical-align:middle">Kd Akun</th>
                        <th style="text-align: center; vertical-align:middle">Uraian Akun</th>
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
                  <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                    <table class="table table-striped table-bordered table-responsive compact">
                      <tbody>
                        <tr>
                          <td width="20%" style="text-align: left; vertical-align:top;">Akun</td>
                          <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd" id="ur_akun"
                              align='left'></label></td>
                        </tr>
                      </tbody>
                    </table>
                  </form>
                  <table id="tblGolongan" class="table table-striped table-bordered table-responsive compact"
                    width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                        <th width="5%" style="text-align: center; vertical-align:middle">Kd Akun</th>
                        <th width="5%" style="text-align: center; vertical-align:middle">Kd Golongan</th>
                        <th style="text-align: center; vertical-align:middle">Uraian Golongan</th>
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
                  <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                    <table class="table table-striped table-bordered table-responsive">
                      <tbody>
                        <tr>
                          <td width="20%" style="text-align: left; vertical-align:top;">Akun</td>
                          <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd"
                              id="ur_akun_jenis" align='left'></label></td>
                        </tr>
                        <tr>
                          <td width="20%" style="text-align: left; vertical-align:top;">Golongan</td>
                          <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd" id="ur_golongan"
                              align='left'></label></td>
                        </tr>
                      </tbody>
                    </table>
                  </form>
                  <table id="tblJenis" class="table table-striped table-bordered table-responsive compact" width="100%"
                    cellspacing="0">
                    <thead>
                      <tr>
                        <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                        <th width="5%" style="text-align: center; vertical-align:middle">Kd Akun</th>
                        <th width="5%" style="text-align: center; vertical-align:middle">Kd Golongan</th>
                        <th width="5%" style="text-align: center; vertical-align:middle">Kd Jenis</th>
                        <th style="text-align: center; vertical-align:middle">Uraian Jenis</th>
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
                  <div class="add">
                    <button id="btnTambahObyek" type="button" class="btn btn-labeled btn-sm btn-success">
                      <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>Tambah Obyek</button>
                  </div>
                  <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                    <table class="table table-striped table-bordered table-responsive">
                      <tbody>
                        <tr>
                          <td width="20%" style="text-align: left; vertical-align:top;">Akun</td>
                          <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd"
                              id="ur_akun_obyek" align='left'></label></td>
                        </tr>
                        <tr>
                          <td width="20%" style="text-align: left; vertical-align:top;">Golongan</td>
                          <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd"
                              id="ur_golongan_obyek" align='left'></label></td>
                        </tr>
                        <tr>
                          <td width="20%" style="text-align: left; vertical-align:top;">Jenis</td>
                          <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd" id="ur_jenis"
                              align='left'></label></td>
                        </tr>
                      </tbody>
                    </table>
                  </form>
                  <table id="tblObyek" class="table table-striped table-bordered table-responsive compact" width="100%"
                    cellspacing="0">
                    <thead>
                      <tr>
                        <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                        <th width="5%" style="text-align: center; vertical-align:middle">Kd Akun</th>
                        <th width="5%" style="text-align: center; vertical-align:middle">Kd Golongan</th>
                        <th width="5%" style="text-align: center; vertical-align:middle">Kd Jenis</th>
                        <th width="5%" style="text-align: center; vertical-align:middle">Kd Obyek</th>
                        <th style="text-align: center; vertical-align:middle">Uraian Obyek</th>
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
                  <div class="add">
                    <button id="btnTambahRincian" type="button" class="btn btn-labeled btn-sm btn-success">
                      <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>Tambah Rincian</button>
                  </div>
                  <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                    <table class="table table-striped table-bordered table-responsive">
                      <tbody>
                        <tr>
                          <td width="20%" style="text-align: left; vertical-align:top;">Akun</td>
                          <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd"
                              id="ur_akun_rincian" align='left'></label></td>
                        </tr>
                        <tr>
                          <td width="20%" style="text-align: left; vertical-align:top;">Golongan</td>
                          <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd"
                              id="ur_golongan_rincian" align='left'></label></td>
                        </tr>
                        <tr>
                          <td width="20%" style="text-align: left; vertical-align:top;">Jenis</td>
                          <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd"
                              id="ur_jenis_rincian" align='left'></label></td>
                        </tr>
                        <tr>
                          <td width="20%" style="text-align: left; vertical-align:top;">Obyek</td>
                          <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd" id="ur_obyek"
                              align='left'></label></td>
                        </tr>
                      </tbody>
                    </table>
                  </form>
                  <table id="tblRincian" class="table table-striped table-bordered table-responsive compact"
                    width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                        <th width="5%" style="text-align: center; vertical-align:middle">Kd Akun</th>
                        <th width="5%" style="text-align: center; vertical-align:middle">Kd Golongan</th>
                        <th width="5%" style="text-align: center; vertical-align:middle">Kd Jenis</th>
                        <th width="5%" style="text-align: center; vertical-align:middle">Kd Obyek</th>
                        <th width="5%" style="text-align: center; vertical-align:middle">Kd Rincian</th>
                        <th style="text-align: center; vertical-align:middle">Uraian Rincian Obyek</th>
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

  <!--Modal Tambah -->
  <div id="ModalRek4" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form name="frmModalRek4" class="form-horizontal" role="form" autocomplete='off' action="" method="post"
            onsubmit="return false;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="rek4_id_akun" id="rek4_id_akun">
            <input type="hidden" name="rek4_id_golongan" id="rek4_id_golongan">
            <input type="hidden" name="rek4_id_jenis" id="rek4_id_jenis">
            <div class="form-group">
              <label for="rek4_kd_obyek" class="col-sm-3" align='left'>Kode Obyek</label>
              <div class="col-sm-2">
                <input type="text" class="form-control number" id="rek4_kd_obyek" name="rek4_kd_obyek" maxlength="4"=""
                  required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="rek4_nm_obyek" class="col-sm-3" align='left'>Nama Obyek</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="rek4_nm_obyek" name="rek4_nm_obyek" required="required">
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <div class="col-sm-2 text-left">
          </div>
          <div class="col-sm-10 text-right">
            <div class="ui-group-buttons">
              <button type="button" class="btn btn-sm btn-success btnRek4 btn-labeled" data-dismiss="modal">
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
  <div id="HapusRek4" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <input type="hidden" id="rek4_id_obyek_hapus" name="rek4_id_obyek_hapus">
          <input type="hidden" name="rek4_id_akun_hapus" id="rek4_id_akun_hapus">
          <input type="hidden" name="rek4_id_golongan_hapus" id="rek4_id_golongan_hapus">
          <input type="hidden" name="rek4_id_jenis_hapus" id="rek4_id_jenis_hapus">
          <div class="alert alert-danger deleteContent">
            <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border" style="color:red;"
              aria-hidden="true"></i>
            <br>
            Yakin akan menghapus Obyek Rekening : <strong><span id="nm_rek4_hapus"></span></strong> ?
            <br>
            <br>
          </div>
          <div class="modal-footer">
            <div class="ui-group-buttons">
              <button type="button" class="btn btn-sm btn-danger btn-labeled btnDelRek4" data-dismiss="modal"><span
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

  <div id="ModalRek5" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form name="frmModalRek5" class="form-horizontal" role="form" autocomplete='off' action="" method="post"
            onsubmit="return false;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="rek5_id_rekening" id="rek5_id_rekening">
            <input type="hidden" name="rek5_id_akun" id="rek5_id_akun">
            <input type="hidden" name="rek5_id_golongan" id="rek5_id_golongan">
            <input type="hidden" name="rek5_id_jenis" id="rek5_id_jenis">
            <input type="hidden" name="rek5_id_obyek" id="rek5_id_obyek">
            <div class="form-group">
              <label for="rek5_kd_rincian" class="col-sm-3" align='left'>Kode Rincian Obyek</label>
              <div class="col-sm-2">
                <input type="text" class="form-control number" id="rek5_kd_rincian" name="rek5_kd_rincian"
                  maxlength="4"="" required="required">
              </div>
            </div>
            <div class="form-group">
              <label for="rek5_nm_rincian" class="col-sm-3" align='left'>Nama Rincian Obyek</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="rek5_nm_rincian" name="rek5_nm_rincian" required="required">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="perundangan">Dasar Hukum Perundangan</label>
              <div class="col-sm-8">
                <textarea type="name" class="form-control" id="perundangan" rows="3"></textarea>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <div class="col-sm-2 text-left">
          </div>
          <div class="col-sm-10 text-right">
            <div class="ui-group-buttons">
              <button type="button" class="btn btn-sm btn-success btnRek5 btn-labeled" data-dismiss="modal">
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
  <div id="HapusRek5" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <input type="hidden" id="rek5_id_rekening_hapus" name="rek5_id_rekening_hapus">
          <div class="alert alert-danger deleteContent">
            <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border" style="color:red;"
              aria-hidden="true"></i>
            <br>
            Yakin akan menghapus Rincian Obyek : <strong><span id="nm_rek5_hapus"></span></strong> ?
            <br>
            <br>
          </div>
          <div class="modal-footer">
            <div class="ui-group-buttons">
              <button type="button" class="btn btn-sm btn-danger btn-labeled btnDelRek5" data-dismiss="modal"><span
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
    src="{{ asset('/protected/resources/views/parameter/rekening/JsRefRekening.js')}}"> </script>
  @endsection