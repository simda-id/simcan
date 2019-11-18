<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app0')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <?php
                $this->title = 'Hibah dan Bantuan Sosial';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = '/';
                $breadcrumb->begin();
                $breadcrumb->add(['url' => '/modul0','label' => 'SSH dan ASB']);
                $breadcrumb->add(['url' => '/modul0','label' => 'SSH']);
                $breadcrumb->add(['label' => $this->title]);
                $breadcrumb->end();
            ?>
    </div>
  </div>
  <div id="pesan"></div>

  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-success">
        <div class="panel-heading">
          <p>
            <h2 class="panel-title">Data Hibah dan Bantuan Sosial</h2>
          </p>
        </div>

        <div class="panel-body">

          <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#datainduk" aria-controls="datainduk" role="tab" data-toggle="tab">Data
                Induk</a></li>
            <li class="disabled"><a href="#kelompok" aria-controls="kelompok" role="tab" data-toggle="tab">Kelompok</a>
            </li>
            <li class="disabled"><a href="#rincian" aria-controls="rincian" role="tab" data-toggle="tab">Rincian</a>
            </li>
          </ul>

          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="datainduk">
              <br>
              <div class="add">
                <p><a id="btnInduk" type="button" class="addInduk btn btn-labeled btn-success">
                    <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Data Induk</a>
                </p>
              </div>
              <div class="">
                <table id='tblDataInduk' class="table display table-striped compact table-bordered table-responsive"
                  cellspacing="0">
                  <thead>
                    <tr>
                      <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                      <th style="text-align: center; vertical-align:middle">Uraian Golongan</th>
                      <th width="10%" style="text-align: center; vertical-align:middle">Tahun Berlaku</th>
                      <th width="5%" style="text-align: center; vertical-align:middle">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="kelompok">
              <br>
              <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                <div class="">
                  <table class="table table-striped table-bordered table-responsive">
                    <tbody>
                      <tr>
                        <td width="15%" style="text-align: left; vertical-align:top;">Tahun</td>
                        <td style="text-align: left; vertical-align:top;"><label id="tahun_kelompok"
                            align='left'></label></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </form>
              <div class="add">
                <p><a id="btnKelompok" type="button" class="addKelompok btn btn-labeled btn-success">
                    <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Kelompok Bantuan</a>
                </p>
              </div>
              <table id="tblKelompok" class="table display table-striped compact table-bordered table-responsive"
                cellspacing="0">
                <thead>
                  <tr>
                    <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                    <th style="text-align: center; vertical-align:middle">Uraian Kelompok</th>
                    <th width="25%" style="text-align: center; vertical-align:middle">OPD Penanggung jawab</th>
                    <th width="5%" style="text-align: center; vertical-align:middle">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
            <div role="tabpanel" class="tab-pane" id="rincian">
              <br>
              <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered">
                    <tbody>
                      <tr>
                        <td width="15%" style="text-align: left; vertical-align:top;">Tahun</td>
                        <td style="text-align: left; vertical-align:top;"><label id="tahun_rincian"
                            align='left'></label></td>
                      </tr>
                      <tr class="reKelompok">
                        <td width="15%" style="text-align: left; vertical-align:top;">Kelompok</td>
                        <td style="text-align: left; vertical-align:top;"><label id="kelompok_rincian"
                            align='left'></label>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </form>
              <div class="add">
                <p><a id="btnRincian" type="button" class="addRincian btn btn-labeled btn-success">
                    <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Rincian Bantuan</a>
                </p>
              </div>
              <table id='tblRincian' class="table display table-striped compact table-bordered table-responsive"
                cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                    <th style="text-align: center; vertical-align:middle">Uraian Rincian</th>
                    <th width="10%" style="text-align: center; vertical-align:middle">Satuan</th>
                    <th width="15%" style="text-align: center; vertical-align:middle">Jumlah</th>
                    <th width="5%" style="text-align: center; vertical-align:middle">Aksi</th>
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

<!--Modal Induk -->
<div id="TambahInduk" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" autocomplete='off' action="" method="post" onsubmit="return false;">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group">
            <label for="uraian_kelompok" class="col-sm-3 control-label" align='left'>Uraian Golongan:</label>
            <div class="col-sm-8">
              <input type="hidden" class="form-control" name="id_gol_ssh_induk" id="id_gol_ssh_induk">
              <input type="text" class="form-control" id="uraian_kelompok" name="uraian_kelompok" required="required"
                value="Hibah dan Bantuan Sosial" readonly>
            </div>
          </div>
          <div class="form-group">
            <label for="thn_hibah" class="col-sm-3 control-label" align='left'>Tahun Berlaku :</label>
            <div class="col-sm-2">
              <div class="input-group">
                <input type="hidden" class="form-control" name="id_kel_ssh_induk" id="id_kel_ssh_induk">
                <input type="text" class="form-control number" maxlength="4" id="thn_hibah" name="thn_hibah"
                  required="required">
              </div>
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
              <button type="button" class="btn btn-success btnSimpanInduk btn-labeled" data-dismiss="modal">
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

<!--Modal Kelompok -->
<div id="TambahKelompok" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" autocomplete='off' action="" method="post" onsubmit="return false;">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" class="form-control" name="id_gol_ssh_skel" id="id_gol_ssh_skel">
          <input type="hidden" class="form-control" name="id_kel_ssh_skel" id="id_kel_ssh_skel">
          <input type="hidden" class="form-control" name="id_skel_ssh_skel" id="id_skel_ssh_skel">
          <div class="form-group">
            <label for="cb_jns_hibah" class="col-sm-3 control-label" align='left'>Jenis Bantuan</label>
            <div class="col-sm-4">
              <select class="form-control select2 cb_jns_hibah" name="cb_jns_hibah" id="cb_jns_hibah">
                <option value="0">Bantuan Uang</option>
                <option value="1">Bantuan Barang</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="uraian_sub_kelompok" class="col-sm-3 control-label" align='left'>Kelompok Bantuan</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="uraian_sub_kelompok" name="uraian_sub_kelompok"
                required="required">
            </div>
          </div>
          <div class="form-group">
            <label for="cb_unit_pj" class="col-sm-3 control-label" align='left'>Unit Penanggung jawab</label>
            <div class="col-sm-8">
              <select class="form-control select2 cb_unit_pj" name="cb_unit_pj" id="cb_unit_pj"></select>
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
              <button type="button" class="btn btn-success btnSimpanKelompok btn-labeled" data-dismiss="modal">
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

<!--Modal Item Tarif Bantuan -->
<div id="ModalItem" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" autocomplete='off' action="" method="post" onsubmit="return false;">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" class="form-control" name="id_gol_ssh_item" id="id_gol_ssh_item">
          <input type="hidden" class="form-control" name="id_kel_ssh_item" id="id_kel_ssh_item">
          <input type="hidden" class="form-control" name="id_skel_ssh_item" id="id_skel_ssh_item">
          <div class="form-group">
            <label for="cb_ref_ssh" class="col-sm-3 control-label" align='left'>Dokumen SSH Referensi</label>
            <div class="col-sm-8">
              <select class="form-control select2 cb_ref_ssh" name="cb_ref_ssh" id="cb_ref_ssh"></select>
              <input type="hidden" id="id_zona_perkada" name="id_zona_perkada">
            </div>
          </div>
          <div class="form-group">
            <label for="no_urut_item" class="col-sm-3 control-label" align='left'>Nomor Urut</label>
            <div class="col-sm-2">
              <input type="text" class="form-control number" id="no_urut_item" name="no_urut_item" required="required">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="id_item_perkada">Item Bantuan</label>
            <div class="col-sm-9">
              <input type="hidden" id="id_tarif_ssh" name="id_tarif_ssh">
              <textarea type="text" class="form-control" rows="3" id="uraian_perda_dok" name="uraian_perda_dok"
                required="required"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="cb_satuan_item" class="col-sm-3 control-label" align='left'>Satuan</label>
            <div class="col-sm-4">
              <select class="form-control select2 cb_satuan_item" name="cb_satuan_item" id="cb_satuan_item"></select>
            </div>
          </div>
          <div class="form-group">
            <label for="rupiah_tarif" class="col-sm-3 control-label" align='left'>Jumlah Bantuan</label>
            <div class="col-sm-4">
              <input type="text" class="form-control number" id="rupiah_tarif" name="rupiah_tarif" required="required"
                style="text-align:right;">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-sm-2 text-left idbtnHapusBelanja">
          </div>
          <div class="col-sm-10 text-right">
            <div class="ui-group-buttons">
              <button type="button" class="btn btn-success btnSimpanItem btn-labeled" data-dismiss="modal">
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

<!--Modal Perkada Hapus Yakin akan menghapus Perkada SSH Nomor : -->
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

<!--Modal Status Perkada -->
<div id="StatusPerkada" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-xs">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-info deleteContent" role="alert">
          Yakin memposting Data Perkada SSH Nomor : <strong><span class="uraian"></span></strong> ?
          Proses posting ini akan merubah status Perkada terpilih menjadi Aktif,
          dan mengubah status Perkada aktif sebelumnya menjadi Non-Aktif
          <span class="hidden id_perkada"></span>
          <span class="hidden flag_perkada"></span>
        </div>
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-sm-2 text-left idbtnHapusBelanja">
          </div>
          <div class="col-sm-10 text-right">
            <div class="ui-group-buttons">
              <button type="button" class="btn btn-success actionBtn btn-labeled" data-dismiss="modal">
                <span class="btn-label"><i id="footer_action_button"
                    class="glyphicon glyphicon-check"></i></span>Posting</button>
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

<!--Modal Tarif Perkada Hapus -->
<div id="HapusTarifPerkada" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-xs">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger deleteContent">
          Yakin akan menghapus Item Tarif : <strong><span class="uraian"></span></strong> dalam Zona : <strong><span
              class="uraian1"></span></strong> ?
          <span class="hidden id_tarif_perkada_hapus"></span>
        </div>
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-sm-2 text-left idbtnHapusBelanja">
          </div>
          <div class="col-sm-10 text-right">
            <div class="ui-group-buttons">
              <button type="button" class="btn btn-danger actionBtn btn-labeled" data-dismiss="modal">
                <span class="btn-label"><i id="footer_action_button"
                    class="glyphicon glyphicon-trash"></i></span>Update</button>
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

<div id="ModalUpdateItem" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"> UPDATE ITEM HIBAH-BANSOS YANG TELAH DIGUNAKAN DI TRANSAKSI </h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" autocomplete='off' action="" method="" onsubmit="return false;">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group">
            <label class="control-label col-sm-3" for="no_dokumen_update">Nomor Dokumen :</label>
            <div class="col-sm-9">
              <select class="form-control no_dokumen_update select2" name="no_dokumen_update" id="no_dokumen_update">
              </select>
            </div>
          </div>
          <hr>
          <h4 style="color: #b94743">Catatan :</h4>
          <label>1. <span style="color: #b94743; font-style: italic;">Update</span> Item Bantuan hanya dapat dilakukan
            saat
            <span style="color: #b94743">tahap penganggaran</span> </label><br>
          <label>2. Dokumen Penganggaran yang dapat di-<span style="color: #b94743; font-style: italic;">update</span>
            yang statusnya <span style="color: #b94743">belum terposting</span> </label><br>
          <label>3. Item SSH yang di-<span style="color: #b94743; font-style: italic;">update</span>-kan untuk aktivitas
            <span style="color: #b94743">NON ASB</span> </label><br>
          <label>4. Jangan Lupa <span style="color: #b94743">Backup Database</span> sebelum <span
              style="color: #b94743; font-style: italic;">update</span>...</label><br>
        </form>
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-sm-2 text-left">
          </div>
          <div class="col-sm-10 text-right">
            <div class="ui-group-buttons">
              <button type="button" class="btn btn-success btnUpdateItem btn-labeled" data-dismiss="modal">
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
  src="{{ asset('/protected/resources/views/ssh/bansos/js_bansos.js')}}"></script>
@endsection