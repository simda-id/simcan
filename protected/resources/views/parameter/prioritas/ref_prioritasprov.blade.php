<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.parameterlayout')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <?php
                $this->title = 'Program Prioritas Provinsi';
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
          <h2 class="panel-title">Program Prioritas Provinsi</h2>
        </div>

        <div class="panel-body">
          <br>
          <div class='tabs-x tabs-above tab-bordered tabs-krajee'>
            <ul class="nav nav-tabs nav-justified" role="tablist">
              <li class="active"><a href="#prioritas" aria-controls="prioritas" role="tab" data-toggle="tab">Program
                  Prioritas</a>
              </li>
              <li class="disabled"><a href="#bidang_prioritas" aria-controls="bidang_prioritas" role="tab"
                  data-toggle="tab">Urusan
                  Bidang Prioritas</a></li>
            </ul>
            <div class="tab-content">
              <br>
              <div role="tabpanel" class="tab-pane fade in active" id="prioritas">
                <br>
                <form name="frmModalJenis" class="form-horizontal" role="form" autocomplete='off' action="" method=""
                  onsubmit="return false;">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="id_prioritas" id="id_prioritas">
                  <input type="hidden" name="id_progprov" id="id_progprov">
                  <div class="form-group">
                    <label for="tahun_rkpd" class="col-sm-2 control-label text-left" align='left'>Tahun Perencanaan
                      :</label>
                    <div class="col-sm-2">
                      <input class="form-control text-center" type="text" id="tahun_rkpd" name="tahun_rkpd"
                        value="{{Session::get('tahun')}}" disabled style="text-align: center;">
                    </div>
                    <div class="col-sm-8">
                      <button id="btnAddPrioritas" type="button" class="btn btn-labeled btn-sm btn-success"
                        name="btnAddPrioritas"><span class="btn-label"><i
                            class="fa fa-plus fa-fw fa-lg"></i></span>Tambah
                        Program Prioritas</button>
                      <button id="btnSavePrioritas" type="button" class="btn btn-labeled btn-sm btn-success"
                        name="btnSavePrioritas"><span class="btn-label"><i
                            class="fa fa-floppy-o fa-fw fa-lg"></i></span>Simpan</button>
                      <button id="btnCancelPrioritas" type="button" class="btn btn-labeled btn-sm btn-warning"
                        name="btnCancelPrioritas"><span class="btn-label"><i
                            class="fa fa-sign-out fa-fw fa-lg"></i></span>Batal</button>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="id_item_perkada">Prioritas Provinsi :</label>
                    <div class="col-sm-8">
                      <textarea type="text" class="form-control" id="uraian_program_provinsi"
                        name="uraian_program_provinsi" required="required" rows="3"></textarea>
                    </div>
                  </div>
                </form>
                <br>
                <div class="col-md-12">
                  <table id="tblPrioritas" class="table table-striped table-bordered table-responsive compact"
                    width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                        <th style="text-align: center; vertical-align:middle">Uraian Program Prioritas Provinsi</th>
                        <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane fade in" id="bidang_prioritas">
                <br>
                <div class="col-md-12">
                  <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered table-responsive compact">
                        <tbody>
                          <tr>
                            <td width="20%" style="text-align: left; vertical-align:top;">Uraian Program</td>
                            <td style="text-align: left; vertical-align:top;">
                              <textarea type="text" class="form-control backProgPrio" id="uraian_program_urusan"
                                name="uraian_program_urusan" rows="3" readonly></textarea>
                            </td>
                          </tr>
                          <tr>
                            <td width="20%" style="text-align: left; vertical-align:top;"></td>
                            <td style="text-align: left; vertical-align:top;">
                              <div class="add">
                                <button id="btnAddBidang" type="button" class="btn btn-labeled btn-sm btn-success"><span
                                    class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>Tambah
                                  Bidang</button>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </form>
                  <div class="col-md-12">
                    <table id="tblUrusan" class="table table-striped table-bordered table-responsive compact"
                      width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th width="10%" style="text-align: center; vertical-align:middle">No Urut</th>
                          <th width="35%" style="text-align: center; vertical-align:middle">Uraian Urusan </th>
                          <th style="text-align: center; vertical-align:middle">Uraian Bidang Pemerintahan</th>
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
                  <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
              </tr>
            </thead>
            <tbody></tbody>
        </table>
  </script>

  <div id="ModalHapus" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <div class="alert alert-danger deleteContent">
            <span class="uraianx"></span> <strong><span class="uraian"></span></strong> ?
            <span class="hidden id_ssh_hapus"></span>
          </div>
        </div>
        <div class="modal-footer">
          <div class="row">
            <div class="col-sm-2 text-left">
            </div>
            <div class="col-sm-10 text-right">
              <div class="ui-group-buttons">
                <button type="button" class="btn btn-danger btnHapus btn-labeled" data-dismiss="modal">
                  <span class="btn-label"><i class="fa fa-trash-o fa-fw fa-lg"></i></span>Hapus</button>
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

  <div id="ModalUrusan" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" id="id_progprov_urs" name="id_progprov_urs">
            <input type="hidden" id="id_progprov_urusan" name="id_progprov_urusan">
            <div class="form-group">
              <label class="control-label col-sm-3" for="kd_urusan">Urusan Pemerintahan</label>
              <div class="col-sm-8">
                <select type="text" class="form-control select2 kd_urusan" id="kd_urusan" name="kd_urusan"></select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="id_bidang_urusan">Bidang</label>
              <div class="col-sm-8">
                <select type="text" class="form-control select2 id_bidang_urusan" id="id_bidang_urusan"
                  name="id_bidang_urusan"></select>
              </div>
            </div>
            <div class="form-group">
              <label for="cb_lingkup_program" class="col-sm-3 control-label" align='left'>Lingkup Program</label>
              <div class="col-sm-5">
                <select class="form-control select2 cb_lingkup_program" name="cb_lingkup_program"
                  id="cb_lingkup_program">
                  <option value="0">Semua Program Termasuk BTL</option>
                  <option value="1">Semua Program Kecuali BTL</option>
                  <option value="2">Program Rutin ( 1-14 )</option>
                  <option value="3">Program Langsung ( 15 keatas )</option>
                </select>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <div class="row">
            <div class="col-sm-12 text-right">
              <div class="ui-group-buttons">
                <button type="button" class="btn btn-labeled btn-success btnUrusan" data-dismiss="modal"><span
                    class="btn-label"><i class="fa fa-floppy-o fa-lg fa-fw"></i></span> Simpan</button>
                <div class="or"></div>
                <button type="button" class="btn btn-labeled btn-warning" data-dismiss="modal" aria-hidden="true"><span
                    class="btn-label"><i class="fa fa-sign-out fa-lg fa-fw"></i></span> Tutup</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="ModalProses" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"> Proses Sinkronisasi Program Provinsi Tahun {{Session::get('tahun')}}</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="" onsubmit="return false;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group hidden">
              <label for="jns_dokumen" class="col-sm-3 control-label" align='left'>Jenis Dokumen</label>
              <div class="col-sm-5">
                <select class="form-control select2 jns_dokumen" name="jns_dokumen" id="jns_dokumen">
                  <option value="0">RKPD Final</option>
                  <option value="1">PPAS</option>
                  <option value="2">APBD</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <input type="hidden" id="id_prognas_update" name="id_prognas_update">
              <label class="control-label col-sm-3" for="no_dokumen_update">Nomor Dokumen :</label>
              <div class="col-sm-9">
                <select class="form-control no_dokumen_update select2" name="no_dokumen_update" id="no_dokumen_update">
                </select>
              </div>
            </div>
            <hr>
          </form>
        </div>
        <div class="modal-footer">
          <div class="row">
            <div class="col-sm-2 text-left">
            </div>
            <div class="col-sm-10 text-right">
              <div class="ui-group-buttons">
                <button type="button" class="btn btn-success btnProses btn-labeled" data-dismiss="modal">
                  <span class="btn-label"><i class="fa fa-paper-plane-o fa-fw fa-lg"></i></span>Proses</button>
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
</div>

@endsection

@section('scripts')
<script type="text/javascript" language="javascript" class="init"
  src="{{ asset('/protected/resources/views/parameter/prioritas/JsPrioritasProv.js')}}"> </script>
@endsection