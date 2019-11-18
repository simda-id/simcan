<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app0')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <?php
                $this->title = ' Perkada tentang Analisa Standar Belanja ';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = '/';
                $breadcrumb->begin();
                $breadcrumb->add(['url' => '/modul0','label' => 'SSH dan ASB']);
                $breadcrumb->add(['url' => '/modul0','label' => 'ASB']);
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
          <p class="">
            <h2 class="panel-title"><span data-toggle="popover" data-container="body" title="Perkada dan Aktivitas ASB"
                data-trigger="hover"
                data-content="Struktur ASB; terdiri dari empat level; level keempat dirinci sampai ke pembentuk biaya">Perkada
                tentang Analisa Standar Belanja</span></h2>
          </p>
        </div>

        <div class="panel-body">
          <div class='tabs-x tabs-above tab-bordered tabs-krajee'>
            <ul class="nav nav-tabs" role="tablist">
              <li class="active"><a href="#perkada" aria-controls="perkada" role="tab" data-toggle="tab">Identitas
                  Perkada</a></li>
              <li><a href="#kelompok" aria-controls="kelompok" role="tab" data-toggle="tab">Kelompok ASB</a></li>
              <li><a href="#subkelompok" aria-controls="subkelompok" role="tab" data-toggle="tab">Sub Kelompok ASB</a>
              </li>
              <li><a href="#subsubkelompok" aria-controls="subsubkelompok" role="tab" data-toggle="tab">Sub Sub Kelompok
                  ASB</a></li>
              <li><a href="#detailaktivitas" aria-controls="aktivitas" role="tab" data-toggle="tab">Aktivitas ASB</a>
              </li>
              <li><a href="#detailkomponen" aria-controls="komponen" role="tab" data-toggle="tab">Komponen Aktivitas</a>
              </li>
              <li><a href="#detailrincian" aria-controls="rincian" role="tab" data-toggle="tab">Rincian Komponen</a>
              </li>
            </ul>

            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="perkada">
                <br>
                <div class="add">
                  <p><a class="add-perkada btn btn-labeled btn-success"><span class="btn-label"><i
                          class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Perkada</a></p>
                </div>
                <div>
                  <table id='tblPerkada' class="table display compact table-striped table-bordered table-responsive"
                    cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                        <th width="15%" style="text-align: center; vertical-align:middle">No Perkada</th>
                        <th width="10%" style="text-align: center; vertical-align:middle">Tgl Perkada</th>
                        <th style="text-align: center; vertical-align:middle">Uraian Perkada</th>
                        <th width="10%" style="text-align: center; vertical-align:middle">Status</th>
                        <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="kelompok">
                <br>
                <a id="btnTambahKel" class="add-kelompok btn btn-success btn-labeled" role="button"><span
                    class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Kelompok Aktivitas ASB </a>
                <a id="btnCopyASB" class="copy-asb btn btn-primary btn-labeled" role="button"><span class="btn-label"><i
                      class="fa fa-exchange fa-fw fa-lg"></i></span>Copy Data ASB</a>
                <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                  <div>
                    <br>
                    <table class="table table-striped table-bordered table-responsive">
                      <tbody>
                        <tr>
                          <td width="15%" style="text-align: left; vertical-align:top;">No Perkada</td>
                          <td style="text-align: left; vertical-align:top;"><label id="no_perkada_kel"
                              align='left'></label></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </form>
                <div id="divAktivitas">
                  <div>
                    <table id="tblKelompok" class="table compact table-striped table-bordered table-responsive"
                      cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th width="10%" style="text-align: center; vertical-align:middle">No Urut</th>
                          <th style="text-align: center; vertical-align:middle">Uraian Kelompok Aktivitas</th>
                          <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="subkelompok">
                <br>
                <div class="add">
                  <p id="btnTambahSubKel"><a class="add-subkelompok btn btn-success btn-labeled"><span
                        class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Sub Kelompok Aktivitas
                      ASB</a></p>
                </div>
                <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                  <div>
                    <table class="table table-striped table-bordered table-responsive">
                      <tbody>
                        <tr>
                          <td width="15%" style="text-align: left; vertical-align:top;">No Perkada</td>
                          <td id="" name="" style="text-align: left; vertical-align:top;"><label id="no_perkada_subkel"
                              align='left'></label></td>
                        </tr>
                        <tr>
                          <td width="15%" style="text-align: left; vertical-align:top;">Nama Kelompok</td>
                          <td style="text-align: left; vertical-align:top;"><label id="nm_kel_subkel"
                              align='left'></label></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </form>
                <div id="divAktivitas">
                  <div>
                    <table id="tblSubKelompok" class="table compact table-striped table-bordered table-responsive"
                      cellspacing="0" width="100%">
                      <thead>
                        <tr>
                        <tr>
                          <th width="10%" style="text-align: center; vertical-align:middle">No Urut</th>
                          <th style="text-align: center; vertical-align:middle">Uraian Sub Kelompok Aktivitas</th>
                          <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                        </tr>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="subsubkelompok">
                <br>
                <div class="add">
                  <p id="btnTambahSubSubKel"><a class="add-sskel btn btn-success btn-labeled"><span class="btn-label"><i
                          class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Sub Sub Kelompok ASB</a></p>
                </div>
                <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                  <div>
                    <table class="table table-striped table-bordered table-responsive">
                      <tbody>
                        <tr>
                          <td width="15%" style="text-align: left; vertical-align:top;">No Perkada</td>
                          <td id="" name="" style="text-align: left; vertical-align:top;"><label id="no_perkada_sskel"
                              align='left'></label></td>
                        </tr>
                        <tr>
                          <td width="15%" style="text-align: left; vertical-align:top;">Nama Kelompok</td>
                          <td style="text-align: left; vertical-align:top;"><label id="nm_kel_sskel"
                              align='left'></label></td>
                        </tr>
                        <tr>
                          <td width="15%" style="text-align: left; vertical-align:top;">Nama Sub Kelompok</td>
                          <td style="text-align: left; vertical-align:top;"><label id="nm_subkel_sskel"
                              align='left'></label></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </form>
                <div id="divAktivitas">
                  <div>
                    <table id="tblSubSubKelompok" class="table compact table-striped table-bordered table-responsive"
                      cellspacing="0" width="100%">
                      <thead>
                        <tr>
                        <tr>
                          <th width="10%" style="text-align: center; vertical-align:middle">No Urut</th>
                          <th style="text-align: center; vertical-align:middle">Uraian Sub Sub Kelompok</th>
                          <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                        </tr>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="detailaktivitas">
                <br>
                <div class="add">
                  <p id="btnTambahAktivitas"><a class="add-aktivitas btn btn-success btn-labeled"><span
                        class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Aktivitas ASB</a></p>
                </div>
                <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                  <div>
                    <table class="table table-striped table-bordered table-responsive">
                      <tbody>
                        <tr>
                          <td width="15%" style="text-align: left; vertical-align:top;">No Perkada</td>
                          <td id="" name="" style="text-align: left; vertical-align:top;"><label id="no_perkada_aktiv"
                              align='left'></label></td>
                        </tr>
                        <tr>
                          <td width="15%" style="text-align: left; vertical-align:top;">Nama Kelompok</td>
                          <td style="text-align: left; vertical-align:top;"><label id="nm_kel_aktiv"
                              align='left'></label></td>
                        </tr>
                        <tr>
                          <td width="15%" style="text-align: left; vertical-align:top;">Nama Sub Kelompok</td>
                          <td style="text-align: left; vertical-align:top;"><label id="nm_subkel_aktiv"
                              align='left'></label></td>
                        </tr>
                        <tr>
                          <td width="15%" style="text-align: left; vertical-align:top;">Nama Sub Sub Kelompok</td>
                          <td style="text-align: left; vertical-align:top;"><label id="nm_subsubkel_aktiv"
                              align='left'></label></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </form>
                <div id="divAktivitas">
                  <div>
                    <table id="tblAktivitas" class="table compact table-striped table-bordered table-responsive"
                      cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th width="10%" style="text-align: center; vertical-align:middle">No Urut</th>
                          <th style="text-align: center; vertical-align:middle">Uraian Aktivitas</th>
                          <th width="10%" style="text-align: center; vertical-align:middle">Pemicu Biaya 1</th>
                          <th width="10%" style="text-align: center; vertical-align:middle">Pemicu Biaya 2</th>
                          <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="detailkomponen">
                <br>
                <a id="btnTambahKomponen" class="add-komponen btn btn-success btn-labeled" role="button"><span
                    class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Komponen Aktivitas </a>
                <a id="btnCopyKomponen" class="copy-komponen btn btn-primary btn-labeled" role="button"><span
                    class="btn-label"><i class="fa fa-exchange fa-fw fa-lg"></i></span> Copy Data Komponen</a>

                <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                  <div>
                    <br>
                    <table class="table table-striped table-bordered table-responsive">
                      <tbody>
                        <tr>
                          <td width="15%" style="text-align: left; vertical-align:top;">No Perkada</td>
                          <td id="" name="" style="text-align: left; vertical-align:top;"><label id="no_perkada_komp"
                              align='left'></label></td>
                        </tr>
                        <tr>
                          <td width="15%" style="text-align: left; vertical-align:top;">Nama Kelompok</td>
                          <td style="text-align: left; vertical-align:top;"><label id="nm_kel_komp"
                              align='left'></label></td>
                        </tr>
                        <tr>
                          <td width="15%" style="text-align: left; vertical-align:top;">Nama Sub Kelompok</td>
                          <td style="text-align: left; vertical-align:top;"><label id="nm_subkel_komp"
                              align='left'></label></td>
                        </tr>
                        <tr>
                          <td width="15%" style="text-align: left; vertical-align:top;">Nama Sub Sub Kelompok</td>
                          <td style="text-align: left; vertical-align:top;"><label id="nm_subsubkel_komp"
                              align='left'></label></td>
                        </tr>
                        <tr>
                          <td width="15%" style="text-align: left; vertical-align:top;">Nama Aktivitas</td>
                          <td style="text-align: left; vertical-align:top;"><label id="nm_aktiv_komp"
                              align='left'></label></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </form>
                <div id="divKomponen">
                  <div>
                    <table id="tblKomponen" class="table display compact table-striped table-bordered table-responsive"
                      cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                          <th style="text-align: center; vertical-align:middle">Nama Komponen</th>
                          <th width="10%" style="text-align: center; vertical-align:middle">Kode Rekening</th>
                          <th width="25%" style="text-align: center; vertical-align:middle">Nama Rekening</th>
                          <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div role="tabpanel" class="tab-pane" id="detailrincian">
                <br>
                <div class="add">
                  <p id="btnTambahRincian"><a class="add-rincian btn btn-success btn-labeled"><span class="btn-label"><i
                          class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Rincian Komponen Aktivitas</a></p>
                </div>
                <form class="form-horizontal col-sm-12" role="form" autocomplete='off' action="" method="">
                  <div>
                    <table class="table table-striped table-bordered table-responsive">
                      <tbody>
                        <tr>
                          <td width="25%" style="text-align: left; vertical-align:top;">No Perkada</td>
                          <td id="" name="" style="text-align: left; vertical-align:top;"><label id="no_perkada_rinc"
                              align='left'></label></td>
                        </tr>
                        <tr>
                          <td width="25%" style="text-align: left; vertical-align:top;">Nama Kelompok</td>
                          <td style="text-align: left; vertical-align:top;"><label id="nm_kel_rinc"
                              align='left'></label></td>
                        </tr>
                        <tr>
                          <td width="25%" style="text-align: left; vertical-align:top;">Nama Sub Kelompok</td>
                          <td style="text-align: left; vertical-align:top;"><label id="nm_subkel_rinc"
                              align='left'></label></td>
                        </tr>
                        <tr>
                          <td width="25%" style="text-align: left; vertical-align:top;">Nama Sub Sub Kelompok</td>
                          <td style="text-align: left; vertical-align:top;"><label id="nm_subsubkel_rinc"
                              align='left'></label></td>
                        </tr>
                        <tr>
                          <td width="25%" style="text-align: left; vertical-align:top;">Nama Aktivitas</td>
                          <td style="text-align: left; vertical-align:top;"><label id="nm_aktiv_rinc"
                              align='left'></label></td>
                        </tr>
                        <tr>
                          <td width="25%" style="text-align: left; vertical-align:top;">Nama Komponen</td>
                          <td style="text-align: left; vertical-align:top;"><label id="nm_komp_rinc"
                              align='left'></label></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </form>
                <div id="divTblRincian">
                  {{-- <div class="table-responsive"> --}}
                  <table id="tblRincian" class="table display compact table-striped table-bordered table-responsive"
                    cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                        <th style="text-align: center; vertical-align:middle">Nama Rincian</th>
                        <th width="10%" style="text-align: center; vertical-align:middle">Jenis Biaya</th>
                        <th width="5%" style="text-align: center; vertical-align:middle">Koef 1</th>
                        <th width="5%" style="text-align: center; vertical-align:middle">Koef 2</th>
                        <th width="5%" style="text-align: center; vertical-align:middle">Koef 3</th>
                        <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                      </tr>
                    </thead>
                    <tbody></tbody>
                  </table>
                  {{-- </div> --}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--Modal Perkada -->
<div id="TambahPerkada" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> --}}
        <h4 class="modal-title"></h4>
      </div>
      <!-- <form class="form-horizontal" role="form"> -->
      <div class="modal-body">
        <form class="form-horizontal" role="form" autocomplete='off' action="{{ route('TambahPerkadaASB') }}"
          method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group">
            <label for="no_perkada" class="col-sm-3 control-label" align='left'>No Perkada :</label>
            <div class="col-sm-6">
              <div class="input-group">
                <input type="text" class="form-control" id="no_perkada" name="no_perkada" required="required">
                <span class="input-group-addon">
                  <a href="#" data-toggle="popover" data-container="body" title="Nomor Perkada ASB" data-trigger="hover"
                    data-content="Diisi dengan Nomor Perkada, jika masih draft bisa diisi nomor sembarang yang penting unik dengan lainnya"><i
                      class="glyphicon glyphicon-question-sign"></i></a>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label for="tgl_perkada" class="col-sm-3 control-label" align='left'>Tanggal Perkada :</label>
            {{-- <div class="col-sm-3"> --}}
            {{-- <input type="text" class="form-control" id="tgl_perkada" name="tgl_perkada" required="required" >
                  <input type="text" class="form-control hide" id="tgl_perkada1"> --}}
            <input type="hidden" name="tgl_perkada1" id="tgl_perkada1">
            <div class="col-sm-4">
              <input type="text" class="form-control datepicker" id="tgl_perkada" name="tgl_perkada"
                style="text-align: center;">
              <i class="fa fa-calendar fa-fw fa-lg text-primary form-control-feedback"></i>
            </div>
            {{-- </div> --}}
          </div>
          <div class="form-group">
            <label for="thn_perkada" class="col-sm-3 control-label" align='left'>Tahun Berlaku Perkada :</label>
            <div class="col-sm-2">
              <div class="input-group">
                <input type="text" class="form-control number" id="thn_perkada" name="thn_perkada" required="required">
                <span class="input-group-addon">
                  <a href="#" data-toggle="popover" data-container="body" title="Tahun ASB" data-trigger="hover"
                    data-content="Diisi dengan Tahun Berlakunya Perkada ASB tersebut"><i
                      class="glyphicon glyphicon-question-sign"></i></a>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="ur_perkada" class="col-sm-3 control-label" align='left'>Uraian Perkada ASB :</label>
            <div class="col-sm-8">
              <textarea type="text" class="form-control" rows="5" id="ur_perkada" name="ur_perkada"
                required="required"></textarea>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-sm-2 text-left idbtnHapusKeg">
          </div>
          <div class="col-sm-10 text-right">
            <div class="ui-group-buttons">
              <button type="button" class="btn btn-sm btn-success actionBtn1 btn-labeled" data-dismiss="modal">
                <span class="btn-label"><i class="glyphicon glyphicon-save"></i></span>Simpan</button>
              <div class="or"></div>
              <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--Modal Edit Perkada -->
<div id="EditPerkada" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> --}}
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" autocomplete='off' action="" method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" id="id_perkada_edit" name="id_perkada_edit">
          <div class="form-group">
            <label class="control-label col-sm-3" for="no_perkada_edit">Nomor Perkada ASB :</label>
            <div class="col-sm-6">
              <div class="input-group">
                <input type="text" class="form-control" id="no_perkada_edit" name="no_perkada_edit" required="required">
                <span class="input-group-addon">
                  <a href="#" data-toggle="popover" data-container="body" title="Nomor Perkada ASB" data-trigger="hover"
                    data-content="Diisi dengan Nomor Perkada, jika masih draft bisa diisi nomor sembarang yang penting unik dengan lainnya"><i
                      class="glyphicon glyphicon-question-sign"></i></a>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label for="tgl_perkada_edit" class="col-sm-3 control-label" align='left'>Tanggal Perkada :</label>
            {{-- <div class="col-sm-3">
                  <input type="text" class="form-control" id="tgl_perkada_edit" name="tgl_perkada_edit" required="required" ><input type="text" class="form-control hide" id="tgl_perkada1_edit">
                </div> --}}
            <input type="hidden" name="tgl_perkada1_edit" id="tgl_perkada1_edit">
            <div class="col-sm-4">
              <input type="text" class="form-control datepicker" id="tgl_perkada_edit" name="tgl_perkada_edit"
                style="text-align: center;">
              <i class="fa fa-calendar fa-fw fa-lg text-primary form-control-feedback"></i>
            </div>
          </div>
          <div class="form-group">
            <label for="thn_perkada_edit" class="col-sm-3 control-label" align='left'>Tahun Berlaku Perkada :</label>
            <div class="col-sm-2">
              <div class="input-group">
                <input type="text" class="form-control" id="thn_perkada_edit" name="thn_perkada_edit"
                  required="required">
                <span class="input-group-addon">
                  <a href="#" data-toggle="popover" data-container="body" title="Tahun ASB" data-trigger="hover"
                    data-content="Diisi dengan Tahun Berlakunya Perkada ASB tersebut"><i
                      class="glyphicon glyphicon-question-sign"></i></a>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="ur_perkada_edit" class="col-sm-3 control-label" align='left'>Uraian Perkada ASB :</label>
            <div class="col-sm-8">
              <textarea type="text" class="form-control" rows="5" id="ur_perkada_edit" name="ur_perkada_edit"
                required="required"></textarea>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-sm-2 text-left idbtnHapusKeg">
          </div>
          <div class="col-sm-10 text-right">
            <div class="ui-group-buttons">
              <button type="button" class="btn btn-sm btn-success actionBtn btn-labeled" data-dismiss="modal">
                <span class="btn-label"><i class="glyphicon glyphicon-save"></i></span>Simpan</button>
              <div class="or"></div>
              <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--Modal Perkada Hapus -->
<div id="HapusPerkada" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-xs">
    <div class="modal-content">
      <div class="modal-header">
        {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger deleteContent">
          <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border" style="color:red;" aria-hidden="true"></i>
          Yakin akan menghapus Perkada tentang ASB Nomor : <strong><span class="uraian"></span></strong> ?
          <br>
          <br>
          <strong>Catatan : Penghapusan data ini mempengaruhi terhadap data turunannya yang ada ikut
            terhapus.....!!!!</strong>
          <span class="hidden id_perkada_hapus"></span>
        </div>
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-sm-2 text-left idbtnHapusKeg">
          </div>
          <div class="col-sm-10 text-right">
            <div class="ui-group-buttons">
              <button type="button" class="btn btn-sm btn-danger actionBtn btn-labeled" data-dismiss="modal">
                <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>Hapus</button>
              <div class="or"></div>
              <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
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
        {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <div class="alert alert alert-info deleteContent">
          <i class="fa fa-exclamation-triangle fa-3x fa-border" style="color:blue;" aria-hidden="true"></i>
          Yakin akan mem-Posting Perkada tentang ASB Nomor : <strong><span class="uraian"></span></strong> ?
          <span class="hidden id_perkada"></span>
          <span class="hidden flag_perkada"></span>
        </div>
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-sm-2 text-left idbtnHapusKeg">
          </div>
          <div class="col-sm-10 text-right">
            <div class="ui-group-buttons">
              <button type="button" class="btn btn-sm btn-success actionBtn btn-labeled" data-dismiss="modal">
                <span class="btn-label"><i class="glyphicon glyphicon-check"></i></span>Posting</button>
              <div class="or"></div>
              <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--Modal Tambah Kelompok -->
<div id="TambahKelompok" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> --}}
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" autocomplete='off' action="{{url('/asb/addKelompok')}}" method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" id="id_perkada_kel" name="id_perkada_kel" align='left'>
          <div class="form-group">
            <label class="control-label col-sm-3" for="id_perkada_kel">Nomor Perkada ASB :</label>
            <div class="col-sm-6">
              <label class="control-label" id="idperkada_kel" align='left'></label>
            </div>
          </div>
          <div class="form-group">
            <label for="ur_asb_kel" class="col-sm-3 control-label" align='left'>Nama Kelompok :</label>
            <div class="col-sm-8">
              <textarea type="text" rows="3" class="form-control" id="ur_asb_kel" name="ur_asb_kel"
                required="required"></textarea>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-sm-2 text-left idbtnHapusKeg">
          </div>
          <div class="col-sm-10 text-right">
            <div class="ui-group-buttons">
              <button type="button" class="btn btn-sm btn-success btnAddKel btn-labeled" data-dismiss="modal">
                <span class="btn-label"><i class="glyphicon glyphicon-save"></i></span>Simpan</button>
              <div class="or"></div>
              <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--Modal Edit Kelompok -->
<div id="EditKelompok" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> --}}
        <h4 class="modal-title"></h4>
      </div>

      <div class="modal-body">
        <form class="form-horizontal" role="form" autocomplete='off' action="{{url('/asb/editKelompok')}}"
          method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" id="id_asb_kel_edit" name="id_asb_kel_edit">
          <div class="form-group">
            <label class="control-label col-sm-3" for="id_perkada_kel_edit">Nomor Perkada ASB :</label>
            <div class="col-sm-6">
              <label class="control-label" id="idperkada_kel_edit" align='left'></label>
              <input type="hidden" id="id_perkada_kel_edit" name="id_perkada_kel_edit" align='left'>
            </div>
          </div>
          <div class="form-group">
            <label for="ur_asb_kel_edit" class="col-sm-3 control-label" align='left'>Nama Kelompok :</label>
            <div class="col-sm-8">
              <textarea type="text" rows="3" class="form-control" id="ur_asb_kel_edit" name="ur_asb_kel_edit"
                required="required"></textarea>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-sm-2 text-left idbtnHapusKeg">
          </div>
          <div class="col-sm-10 text-right">
            <div class="ui-group-buttons">
              <button type="button" class="btn btn-sm btn-success btnEditKel btn-labeled" data-dismiss="modal">
                <span class="btn-label"><i class="glyphicon glyphicon-save"></i></span>Simpan</button>
              <div class="or"></div>
              <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--Modal Aktivitas-->
<div id="HapusKelompok" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-xs">
    <div class="modal-content">
      <div class="modal-header">
        {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger deleteContent">
          <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border" style="color:red;" aria-hidden="true"></i>
          Yakin akan menghapus Kelompok ini <strong><span class="ur_asb_kel_del"></span></strong> yang terdapat dalam
          Perkada Nomor : <strong><span class="no_perkada_kel_del"></span></strong> ?
          <br>
          <br>
          <strong>Catatan : Penghapusan data ini mempengaruhi terhadap data turunannya yang ada ikut
            terhapus.....!!!!</strong>
          <span class="hidden id_asb_kel_del"></span>
        </div>
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-sm-2 text-left idbtnHapusKeg">
          </div>
          <div class="col-sm-10 text-right">
            <div class="ui-group-buttons">
              <button type="button" class="btn btn-sm btn-danger btnDelKel btn-labeled" data-dismiss="modal">
                <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>Hapus</button>
              <div class="or"></div>
              <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--Modal Tambah Kelompok -->
<div id="TambahSubKelompok" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> --}}
        <h4 class="modal-title"></h4>
      </div>

      <div class="modal-body">
        <form class="form-horizontal" role="form" autocomplete='off' action="{{url('/asb/addSubKelompok')}}"
          method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group">
            <label class="control-label col-sm-3" for="id_perkada_subkel">Nomor Perkada ASB :</label>
            <div class="col-sm-6">
              <label class="control-label" id="idperkada_subkel" align='left'></label>
              <input type="hidden" id="id_perkada_subkel" name="id_perkada_subkel" align='left'>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="id_kel_subkel">Nama Kelompok :</label>
            <div class="col-sm-8">
              <label class="control-label" id="idkel_subkel" align='left'></label>
              <input type="hidden" id="id_kel_subkel" name="id_kel_subkel" align='left'>
            </div>
          </div>
          <div class="form-group">
            <label for="ur_asb_subkel" class="col-sm-3 control-label" align='left'>Nama Sub Kelompok :</label>
            <div class="col-sm-8">
              <textarea type="text" rows="3" class="form-control" id="ur_asb_subkel" name="ur_asb_subkel"
                required="required"></textarea>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-sm-2 text-left idbtnHapusKeg">
          </div>
          <div class="col-sm-10 text-right">
            <div class="ui-group-buttons">
              <button type="button" class="btn btn-sm btn-success btnAddSubKel btn-labeled" data-dismiss="modal">
                <span class="btn-label"><i class="glyphicon glyphicon-save"></i></span>Simpan</button>
              <div class="or"></div>
              <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--Modal Edit Kelompok -->
<div id="EditSubKelompok" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> --}}
        <h4 class="modal-title"></h4>
      </div>

      <div class="modal-body">
        <form class="form-horizontal" role="form" autocomplete='off' action="{{url('/asb/editSubKelompok')}}"
          method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" id="id_asb_subkel_edit" name="id_asb_subkel_edit">
          <div class="form-group">
            <label class="control-label col-sm-3" for="id_perkada_subkel_edit">Nomor Perkada ASB :</label>
            <div class="col-sm-6">
              <label class="control-label" id="idperkada_subkel_edit" align='left'></label>
              <input type="hidden" id="id_perkada_subkel_edit" name="id_perkada_subkel_edit" align='left'>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="id_kel_subkel_edit">Nama Kelompok :</label>
            <div class="col-sm-8">
              <label class="control-label" id="idkel_subkel_edit" align='left'></label>
              <input type="hidden" id="id_kel_subkel_edit" name="id_kel_subkel_edit" align='left'>
            </div>
          </div>
          <div class="form-group">
            <label for="ur_asb_subkel_edit" class="col-sm-3 control-label" align='left'>Nama Sub Kelompok :</label>
            <div class="col-sm-8">
              <textarea type="text" rows="3" class="form-control" id="ur_asb_subkel_edit" name="ur_asb_subkel_edit"
                required="required"></textarea>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-sm-2 text-left idbtnHapusKeg" data-backdrop="static">
          </div>
          <div class="col-sm-10 text-right">
            <div class="ui-group-buttons">
              <button type="button" class="btn btn-sm btn-success btnEditSubKel btn-labeled" data-dismiss="modal">
                <span class="btn-label"><i class="glyphicon glyphicon-save"></i></span>Simpan</button>
              <div class="or"></div>
              <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--Modal Hapus SubKelompok-->
<div id="HapusSubKelompok" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-xs">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger deleteContent">
          <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border" style="color:red;" aria-hidden="true"></i>
          Yakin akan menghapus Sub Kelompok <strong><span class="ur_asb_subkel_del"></span></strong> yang termasuk dalam
          Kelompok <strong><span class="ur_asb_kel_del"></span></strong> dengan Perkada Nomor : <strong><span
              class="no_perkada_subkel_del"></span></strong> ?
          <br>
          <br>
          <strong>Catatan : Penghapusan data ini mempengaruhi terhadap data turunannya yang ada ikut
            terhapus.....!!!!</strong>
          <span class="hidden id_asb_subkel_del"></span>
        </div>
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-sm-2 text-left idbtnHapusKeg">
          </div>
          <div class="col-sm-10 text-right">
            <div class="ui-group-buttons">
              <button type="button" class="btn btn-sm btn-danger btnDelSubKel btn-labeled" data-dismiss="modal">
                <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>Hapus</button>
              <div class="or"></div>
              <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- Modal Tambah Sub Sub kelompok --}}
<div id="ModalSubSubKelompok" class="modal fade" role="dialog" data-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> --}}
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" autocomplete='off' action="{{url('/asb/addSubKelompok')}}"
          method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" id="id_ssubkel" name="id_ssubkel">
          <div class="form-group">
            <label class="control-label col-sm-3" for="id_perkada_ssubkel">Nomor Perkada ASB :</label>
            <div class="col-sm-6">
              <label class="control-label" id="idperkada_ssubkel" align='left'></label>
              <input type="hidden" id="id_perkada_ssubkel" name="id_perkada_ssubkel" align='left'>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="id_kel_ssubkel">Nama Kelompok :</label>
            <div class="col-sm-8">
              <label class="control-label" id="idkel_ssubkel" align='left'></label>
              <input type="hidden" id="id_kel_ssubkel" name="id_kel_ssubkel" align='left'>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="id_subkel_ssubkel">Nama Sub Kelompok :</label>
            <div class="col-sm-8">
              <label class="control-label" id="idsubkel_ssubkel" align='left'></label>
              <input type="hidden" id="id_subkel_ssubkel" name="id_subkel_ssubkel" align='left'>
            </div>
          </div>
          <div class="form-group">
            <label for="ur_asb_ssubkel" class="col-sm-3 control-label" align='left'>Nama Sub Sub Kelompok :</label>
            <div class="col-sm-8">
              <textarea type="text" rows="3" class="form-control" id="ur_asb_ssubkel" name="ur_asb_ssubkel"
                required="required"></textarea>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-sm-2 text-left idbtnHapusKeg">
          </div>
          <div class="col-sm-10 text-right">
            <div class="ui-group-buttons">
              <button type="button" class="btn btn-sm btn-success btnSSubKel btn-labeled" data-dismiss="modal">
                <span class="btn-label"><i class="glyphicon glyphicon-save"></i></span>Simpan</button>
              <div class="or"></div>
              <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--Modal Hapus SubKelompok-->
<div id="HapusSubSubKelompok" class="modal fade" role="dialog" data-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-xs">
    <div class="modal-content">
      <div class="modal-header">
        {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger deleteContent">
          Yakin akan menghapus Sub Sub Kelompok <strong><span class="ur_asb_subsubkel_del"></span></strong> yang
          termasuk dalam Sub Kelompok <strong><span class="ur_asb_subkel_del"></span></strong> dengan Perkada Nomor :
          <strong><span class="no_perkada_subsubkel_del"></span></strong> ?
          <br>
          <br>
          <strong>Catatan : Penghapusan data ini mempengaruhi terhadap data turunannya yang ada ikut
            terhapus.....!!!!</strong>
          <span class="hidden id_asb_subsubkel_del"></span>
        </div>
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-sm-2 text-left idbtnHapusKeg">
          </div>
          <div class="col-sm-10 text-right">
            <div class="ui-group-buttons">
              <button type="button" class="btn btn-sm btn-danger btnDelSubSubKel btn-labeled" data-dismiss="modal">
                <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>Hapus</button>
              <div class="or"></div>
              <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--Modal Aktivitas -->
<div id="ModalAktivitas" class="modal fade" role="dialog" aria-hidden="true" data-backdrop="static">
  <dic class="col-sm-11">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> --}}
          <h4 class="modal-title"></h4>
        </div>
        <!-- <form class="form-horizontal" role="form"> -->
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="{{ route('TambahAktivitasASB') }}"
            method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" id="id_aktivitas_edit" name="id_aktivitas_edit">
            <div class="form-group">
              <label class="control-label col-sm-3" for="id_perkada_aktiv">Nomor Perkada ASB :</label>
              <div class="col-sm-9">
                <label class="control-label" id="idperkada_aktiv" align='left'></label>
                <input type="hidden" id="id_perkada_aktiv" name="id_perkada_aktiv" align='left'>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="id_kel_aktiv">Nama Kelompok :</label>
              <div class="col-sm-9">
                <label class="control-label" id="idkel_aktiv" align='left'></label>
                <input type="hidden" id="id_kel_aktiv" name="id_kel_aktiv" align='left'>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="id_subkel_aktiv">Nama Sub Kelompok :</label>
              <div class="col-sm-9">
                <label class="control-label" id="idsubkel_aktiv" align='left'></label>
                <input type="hidden" id="id_subkel_aktiv" name="id_subkel_aktiv" align='left'>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="id_subsubkel_aktiv">Nama Sub Sub Kelompok :</label>
              <div class="col-sm-9">
                <label class="control-label" id="idsubsubkel_aktiv" align='left'></label>
                <input type="hidden" id="id_subsubkel_aktiv" name="id_subsubkel_aktiv" align='left'>
              </div>
            </div>
            <div class="form-group">
              <label for="nm_aktivitas" class="col-sm-3 control-label" align='left'>Nama Aktivitas :</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="nm_aktivitas" name="nm_aktivitas" required="required">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <table id="tblDetRincian" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th width="3%" style="text-align: center; vertical-align:middle">No</th>
                      <th colspan="2" style="text-align: center; vertical-align:middle">Pemicu Biaya</th>
                      <th width="20%" style="text-align: center; vertical-align:middle">Range</th>
                      <th width="20%" style="text-align: center; vertical-align:middle">Kapasitas</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      {{-- <td><input class="cekdrive2" type="checkbox" id="cekdrive2"></td> --}}
                      <td style="text-align: center; vertical-align:middle"></td>
                      <td style="text-align: center; vertical-align:middle">Utama
                        <span><a href="#" data-toggle="popover" data-html="true" data-container="body"
                            title="Perkada dan Aktivitas ASB" data-trigger="hover"
                            data-content="Cost driver utama, yang mempengaruhi besarnya biaya aktivitas.<br>Misal untuk aktivitas pelatihan, cost driver berupa peserta."><i
                              class="glyphicon glyphicon-question-sign"></i></a></span></td>
                      <td style="text-align: center; vertical-align:middle">Derivatif
                        <span><a href="#" data-toggle="popover" data-html="true" data-container="body"
                            title="Perkada dan Aktivitas ASB" data-trigger="hover"
                            data-content="Cost driver derivatif, satuan yang berubah tergantung banyaknya volume pada cost driver utama.<br>Misal untuk aktivitas pelatihan, cost driver peserta, cost driver derivatif adalah kelas; semakin banyak peserta makin banyak kelas yang diperlukan."><i
                              class="glyphicon glyphicon-question-sign"></i></a></span></td>
                      <td style="text-align: center; vertical-align:middle">
                        <span><a href="#" data-toggle="popover" data-html="true" data-container="body"
                            title="Perkada dan Aktivitas ASB" data-trigger="hover"
                            data-content="Range: rentang berubahnya cost driver derivatif.<br>Misal: satu kelas pelatihan hanya bisa menampung 30 peserta, lebih dari 30 peserta harus dibuat kelas baru."><i
                              class="glyphicon glyphicon-question-sign"></i></a></span></td>
                      <td style="text-align: center; vertical-align:middle">
                        <span><a href="#" data-toggle="popover" data-html="true" data-container="body"
                            title="Perkada dan Aktivitas ASB" data-trigger="hover"
                            data-content="Kapasitas: jumlah maksimum volume yang bisa dilayani oleh struktur biaya aktivitas.<br>Misal: panitia 5 orang hanya dapat melayani maksimal 120 peserta, lebih dari 120 peserta diperlukan kepanitiaan baru."><i
                              class="glyphicon glyphicon-question-sign"></i></a></span></td>
                    </tr>
                    <tr>
                      {{-- <td><input class="cekdrive1" type="checkbox" id="cekdrive1" checked disabled></td> --}}
                      <td>1</td>
                      <td><select class="form-control id_satuan1" name="id_satuan1" id="id_satuan1"
                          required="required"></select>
                      </td>
                      <td><select class="form-control id_satuan1_derivatif" name="id_satuan1_derivatif"
                          id="id_satuan1_derivatif"></select>
                      </td>
                      <td><input type="number" step="any" min="0" class="form-control angka" id="range_max"
                          name="range_max" required="required"></td>
                      <td><input type="number" step="any" min="0" class="form-control angka" id="kapasitas_max"
                          name="kapasitas_max" required="required"></td>
                    </tr>
                    <tr>
                      {{-- <td><input class="cekdrive2" type="checkbox" id="cekdrive2"></td> --}}
                      <td>2</td>
                      <td><select class="form-control id_satuan2" name="id_satuan2" id="id_satuan2"></select></td>
                      <td><select class="form-control id_satuan2_derivatif" name="id_satuan2_derivatif"
                          id="id_satuan2_derivatif"></select></td>
                      <td><input type="number" step="any" min="0" class="form-control angka" id="range_max1"
                          name="range_max1"></td>
                      <td><input type="number" step="any" min="0" class="form-control angka" id="kapasitas_max1"
                          name="kapasitas_max1"></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="form-group">
              <label for="ur_diskripsi" class="col-sm-3 control-label" align='left'>Deskripsi Aktivitas :</label>
              <div class="col-sm-9">
                <textarea type="text" class="form-control" rows="3" id="ur_diskripsi" name="ur_diskripsi"
                  data-toggle="popover" data-html="true" data-container="body" title="Perkada dan Aktivitas ASB"
                  data-trigger="hover"
                  data-content="Diisi definisi operasional dan prasyarat yang diperlukan untuk menjalankan aktivitas."></textarea>
              </div>
              {{-- <span><a href="#" data-toggle="popover" data-html="true" data-container="body" title="Perkada dan Aktivitas ASB" data-trigger="hover" data-content="Diisi definisi operasional dan prasyarat yang diperlukan untuk menjalankan aktivitas."><i class="glyphicon glyphicon-question-sign"></i></a></span> --}}
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <div class="row">
            <div class="col-sm-2 text-left idbtnHapusKeg">
            </div>
            <div class="col-sm-10 text-right">
              <div class="ui-group-buttons">
                <button type="button" class="btn btn-sm btn-success btnAddAktiv btn-labeled" data-dismiss="modal">
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
</div>

<!--Modal Aktivitas-->
<div id="HapusAktivitas" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-xs">
    <div class="modal-content">
      <div class="modal-header">
        {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger deleteContent">
          <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border" style="color:red;" aria-hidden="true"></i>
          Yakin akan menghapus Aktivitas <strong><span class="ur_aktivitas_del"></span></strong> yang terdapat dalam
          Perkada Nomor : <strong><span class="no_perkada_aktiv_del"></span></strong> ?
          <br>
          <br>
          <strong>Catatan : Penghapusan data ini mempengaruhi terhadap data turunannya yang ada ikut
            terhapus.....!!!!</strong>
          <span class="hidden id_aktivitas_hapus"></span>
        </div>
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-sm-2 text-left idbtnHapusKeg">
          </div>
          <div class="col-sm-10 text-right">
            <div class="ui-group-buttons">
              <button type="button" class="btn btn-sm btn-danger btnDelAktiv btn-labeled" data-dismiss="modal">
                <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>Hapus</button>
              <div class="or"></div>
              <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- Tambah ASB Komponen --}}
<div id="ModalKomponen" class="modal fade" aria-hidden="true" data-focus-on="input:first" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> --}}
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" autocomplete='off' action="{{ route('TambahKomponenASB') }}"
          method="post" onsubmit="return false;">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" id="id_komponen_asb_edit" name="id_komponen_asb_edit">
          <div class="form-group">
            <label class="control-label col-sm-4" for="id_perkada_komp">Nomor Perkada ASB :</label>
            <div class="col-sm-8">
              <label class="control-label" id="idperkada_komp" align='left'></label>
              <input type="hidden" id="id_perkada_komp" name="id_perkada_komp">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="id_kel_komp">Nama Kelompok :</label>
            <div class="col-sm-8">
              <label class="control-label" id="idkel_komp" align='left'></label>
              <input type="hidden" id="id_kel_komp" name="id_kel_komp">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="id_subkel_komp">Nama Sub Kelompok :</label>
            <div class="col-sm-8">
              <label class="control-label" id="idsubkel_komp" align='left'></label>
              <input type="hidden" id="id_subkel_komp" name="id_subkel_komp">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="id_subsubkel_komp">Nama Sub Sub Kelompok :</label>
            <div class="col-sm-8">
              <label class="control-label" id="idsubsubkel_komp" align='left'></label>
              <input type="hidden" id="id_subsubkel_komp" name="id_subsubkel_komp" align='left'>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="id_aktivitas_komp">Nama Aktivitas :</label>
            <div class="col-sm-8">
              <label class="control-label" id="idaktivitas_komp" align='left'></label>
              <input type="hidden" id="id_aktivitas_komp" name="id_aktivitas_komp">
            </div>
          </div>
          <div class="form-group">
            <label for="nm_komponen" class="col-sm-4 control-label" align='left'>Nama Komponen :</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="nm_komponen" name="nm_komponen" required="required">
            </div>
            <span><a data-container="body" data-trigger="hover" data-html="true" data-toggle="popover"
                title="Perkada dan Aktivitas ASB"
                data-content="Diisi pengelompokan biaya pembentuk aktivitas yang memiliki sifat biaya serupa.<br>Misal: makan/minum peserta pelatihan"><i
                  class="glyphicon glyphicon-question-sign"></i></a></span>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="nm_rekening_komp">Rekening Komponen :</label>
            <div class="col-sm-7">
              <div class="input-group">
                <input type="hidden" class="form-control" id="id_rekening_komp" name="id_rekening_komp"
                  required="required">
                <input type="text" class="form-control" id="nm_rekening_komp" name="nm_rekening_komp" disabled>
                <div class="input-group-btn">
                  <button class="btn btn-primary" data-toggle="modal" href="#cariRekening"><i
                      class="glyphicon glyphicon-search"></i></button>
                </div>
              </div>
            </div>
            <span><a data-toggle="popover" data-html="true" data-container="body" title="Perkada dan Aktivitas ASB"
                data-trigger="hover"
                data-content="Dipilih dari ke parameter rekening; satu rekening untuk satu komponen."><i
                  class="glyphicon glyphicon-question-sign"></i></a></span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-sm-2 text-left idbtnHapusKeg">
          </div>
          <div class="col-sm-10 text-right">
            <div class="ui-group-buttons">
              <button type="button" class="btn btn-sm btn-success btnAddKomp btn-labeled" data-dismiss="modal">
                <span class="btn-label"><i class="glyphicon glyphicon-save"></i></span>Simpan</button>
              <div class="or"></div>
              <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- Modal Cari Kode Rekening --}}
<div id="cariRekening" class="modal fade" data-focus-on="input:first" data-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> --}}
        <h4>Daftar Rekening</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
          <div class="form-group">
            <div class="col-sm-12">
              <table id='tblRekening' class="table display table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                    <th width="15%" style="text-align: center; vertical-align:middle">Kode Rekening</th>
                    <th style="text-align: center; vertical-align:middle">Uraian Rekening</th>
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
          <div class="col-sm-2 text-left idbtnHapusKeg">
          </div>
          <div class="col-sm-10 text-right">
            {{-- <div class="ui-group-buttons"> --}}
            {{-- <button type="hidden" class="btn btn-sm btn-success actionBtn1 btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i class="glyphicon glyphicon-save"></i></span>Simpan</button> --}}
            {{-- <div class="or"></div> --}}
            <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
              <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
            {{-- </div> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!--Modal Komponen Hapus -->
<div id="HapusKomponen" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-xs">
    <div class="modal-content">
      <div class="modal-header">
        {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger deleteContent">
          <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border" style="color:red;" aria-hidden="true"></i>
          Yakin akan menghapus Komponen <strong><span class="ur_komponen_del"></span></strong> yang terdapat dalam
          Aktivitas : <strong><span class="ur_aktiv_komp_del"></span></strong> ?
          <br>
          <br>
          <strong>Catatan : Penghapusan data ini mempengaruhi terhadap data turunannya yang ada ikut
            terhapus.....!!!!</strong>
          <span class="hidden id_komponen_hapus"></span>
        </div>
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-sm-2 text-left idbtnHapusKeg">
          </div>
          <div class="col-sm-10 text-right">
            <div class="ui-group-buttons">
              <button type="button" class="btn btn-sm btn-danger btnDelKomp btn-labeled" data-dismiss="modal">
                <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>Hapus</button>
              <div class="or"></div>
              <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--Modal Tambah Rincian -->
<div id="ModalRincian" class="modal fade" role="dialog" data-focus-on="input:first" data-backdrop="static"
  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form name="frmModalRincian" class="form-horizontal" role="form" autocomplete='off'
          action="{{ route('TambahRincianASB') }}" method="post" onsubmit="return false;">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" id="id_komponen_asb_rinci" name="id_komponen_asb_rinci" align='left'>
          <div class="form-group">
            <div class="col-sm-12">
              <table class="table" width="100%">
                <tbody>
                  <tr>
                    <td colspan="3"><label align='left'>Nomor Perkada ASB </label></td>
                    <td colspan="5"><label id="idperkada_rinc"></label></td>
                  </tr>
                  <tr>
                    <td colspan="3"><label class="control-label" for="id_kel_rinc" align='left'>Kelompok </label></td>
                    <td colspan="5"><label class="control-label" id="idkel_rinc" align='left'></label>
                      <input type="hidden" id="id_kel_rinc" name="id_kel_rinc"></td>
                  </tr>
                  <tr>
                    <td colspan="3"><label class="control-label" for="id_subkel_rinc" align='left'>Sub Kelompok </label>
                    </td>
                    <td colspan="5"><label class="control-label" id="idsubkel_rinc" align='left'></label>
                      <input type="hidden" id="id_subkel_rinc" name="id_subkel_rinc"></td>
                  </tr>
                  <tr>
                    <td colspan="3"><label class="control-label" for="id_subsubkel_rinc" align='left'>Sub Sub Kelompok
                      </label></td>
                    <td colspan="5"><label class="control-label" id="idsubsubkel_rinc" align='left'></label>
                      <input type="hidden" id="id_subsubkel_rinc" name="id_subsubkel_rinc" align='left'></td>
                  </tr>
                  <tr>
                    <td colspan="3"><label class="control-label" for="id_aktiv_rinc" align='left'>Aktivitas </label>
                    </td>
                    <td colspan="5"><label class="control-label" id="idaktivitas_rinc" align='left'></label>
                      <input type="hidden" id="id_aktiv_rinc" name="id_aktiv_rinc"></td>
                  </tr>
                  <tr>
                    <td colspan="3"><label class="control-label" for="id_komponen_rinc" align='left'>Komponen </label>
                    </td>
                    <td colspan="5"><label class="control-label" id="idkomponen_rinc" align='left'></label>
                      <input type="hidden" id="id_komponen_rinc" name="id_komponen_rinc"></td>
                  </tr>
                  <tr>
                    <td colspan="3">
                      <label for="ket_rinci" class="control-label" align='left'>Group Rincian </label></td>
                    <td colspan="5">
                      <div class="col-sm-10">
                        <input type="text" list="searchresults" class="form-control" id="ket_rinci" name="ket_rinci"
                          autocomplete="off">
                        <datalist id="searchresults" name="searchresults"></datalist>
                      </div>
                      <span><a href="#" data-toggle="popover" data-html="true" data-container="body"
                          title="Perkada dan Aktivitas ASB" data-trigger="hover"
                          data-content="Opsional, boleh dikosongkan.<br>untuk mengelompokkan rincian komponen agar lebih rapi dalam pencetakan.<br>misal: kelompok upah, di bawahnya ada rincian upah tukang, mandor, kepala tukang, dsb."><i
                            class="glyphicon glyphicon-question-sign"></i></a></span>

                    </td>
                  </tr>
                  <tr>
                    <td colspan="3"><label class="control-label" for="id_tarif_ssh" align='left'>Item SSH </label></td>
                    <td colspan="5">
                      <div class="col-sm-10">
                        <div class="input-group">
                          <input type="hidden" id="id_tarif_ssh" name="id_tarif_ssh" required="required">
                          <input type="text" class="form-control" id="ur_tarif_ssh" name="ur_tarif_ssh" disabled>
                          <div class="input-group-btn">
                            <button class="btn btn-primary" data-toggle="modal" href="#cariItemSSH"><i
                                class="glyphicon glyphicon-search"></i></button>
                          </div>
                        </div>
                      </div>
                      <span><a href="#" data-toggle="popover" data-html="true" data-container="body"
                          title="Perkada dan Aktivitas ASB" data-trigger="hover"
                          data-content="Dikaitkan ke item di SSH. Nilai item di SSH akan digunakan dalam perhitungan nilai ASB."><i
                            class="glyphicon glyphicon-question-sign"></i></a></span>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="3"><label for="jns_biaya" class="control-label" align='left'>Sifat Biaya</label></td>
                    <td colspan="5">
                      <label class="radio-inline">
                        <input type="radio" class="jns_biaya" name="jns_biaya" id="jns_biaya" value="1">Fixed Cost
                      </label>
                      <label class="radio-inline hidden">
                        <input type="radio" class="jns_biaya" name="jns_biaya" id="jns_biaya" value="3">Independent
                        Variable
                      </label>
                      <label class="radio-inline">
                        <input type="radio" class="jns_biaya" name="jns_biaya" id="jns_biaya" value="2">Variable Cost
                        &nbsp;&nbsp;&nbsp;&nbsp
                        <span><a data-container="body" data-trigger="hover" data-html="true" data-toggle="popover"
                            title="Perkada dan Aktivitas ASB"
                            data-content="Fix Cost: tidak dipengaruhi cost driver<br>Independent: dipengaruhi cost driver, menggunakan satuan sesuai cost driver<br>Dependent: dipengaruhi range cost driver, menggunakan satuan derivatif"><i
                              class="glyphicon glyphicon-question-sign"></i></a></span>
                      </label>

                    </td>
                  </tr>
                  <tr>
                    <td colspan="3">
                      <label for="hub_driver" class="control-label" align='left'>Hubungan Pemicu Biaya
                        &nbsp;&nbsp;&nbsp;&nbsp
                        <span><a data-container="body" data-trigger="hover" data-html="true" data-toggle="popover"
                            title="Perkada dan Aktivitas ASB"
                            data-content="Keterkaitan dependent/independent variable terhadap cost driver."><i
                              class="glyphicon glyphicon-question-sign"></i></a></span>
                      </label>
                    </td>
                    <td colspan="5" id="hub_driver_x">
                      <div class="radio-inline">
                        <label class="radio">
                          <input type="radio" class="hub_driver" name="hub_driver" id="hub_driver" value="1">
                          <span class="control-label" id="shub_driver1" align='left'></span>
                        </label>
                        <label class="radio">
                          <input type="radio" class="hub_driver" name="hub_driver" id="hub_driver" value="2">
                          <span class="control-label" id="shub_driver2" align='left'></span>
                        </label>
                        <label class="radio">
                          <input type="radio" class="hub_driver" name="hub_driver" id="hub_driver" value="3">
                          <span class="control-label" id="shub_driver3" align='left'></span>
                        </label>
                      </div>
                      <div class="radio-inline">
                        <label class="radio">
                          <input type="radio" class="hub_driver" name="hub_driver" id="hub_driver" value="4">
                          <span class="control-label" id="shub_driver4" align='left'></span>
                        </label>
                        <label class="radio">
                          <input type="radio" class="hub_driver" name="hub_driver" id="hub_driver" value="5">
                          <span class="control-label" id="shub_driver5" align='left'></span>
                        </label>
                        <label class="radio">
                          <input type="radio" class="hub_driver" name="hub_driver" id="hub_driver" value="6">
                          <span class="control-label" id="shub_driver6" align='left'></span>
                        </label>
                      </div>
                      <div class="radio-inline">
                        <label class="radio">
                          <input type="radio" class="hub_driver" name="hub_driver" id="hub_driver" value="7">
                          <span class="control-label" id="shub_driver7" align='left'></span>
                        </label>
                        <label class="radio">
                          <input type="radio" class="hub_driver" name="hub_driver" id="hub_driver" value="8">
                          <span class="control-label" id="shub_driver8" align='left'></span>
                        </label>
                        <label class="radio">
                          &nbsp;&nbsp;&nbsp;&nbsp
                        </label>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th colspan="2" style="text-align: center; vertical-align:middle">Uraian</th>
                    <th colspan="2" style="text-align: center; vertical-align:middle">Koefisien 1</th>
                    <th colspan="2" style="text-align: center; vertical-align:middle">Koefisien 2</th>
                    <th colspan="2" style="text-align: center; vertical-align:middle">Koefisien 3</th>
                  </tr>
                  <tr>
                    <td colspan="2">Volume</td>
                    <td colspan="2"><input type="number" step="any" min="0" lang="id-ID" class="form-control angka"
                        id="koefisien1" name="koefisien1" required="required"></td>
                    <td colspan="2"><input type="number" step="any" min="0" lang="id-ID" class="form-control angka"
                        id="koefisien2" name="koefisien2" required="required"></td>
                    <td colspan="2"><input type="number" step="any" min="0" lang="id-ID" class="form-control angka"
                        id="koefisien3" name="koefisien3" required="required"></td>
                  </tr>
                  <tr>
                    <td colspan="2">Satuan</td>
                    <td colspan="2"><select class="form-control id_satuan1_rinc" name="id_satuan1_rinc"
                        id="id_satuan1_rinc" required="required"></select></td>
                    <td colspan="2"><select class="form-control id_satuan2_rinc" name="id_satuan2_rinc"
                        id="id_satuan2_rinc" required="required"></select></td>
                    <td colspan="2"><select class="form-control id_satuan3_rinc" name="id_satuan3_rinc"
                        id="id_satuan3_rinc" required="required"></select></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-sm-2 text-left idbtnHapusKeg">
          </div>
          <div class="col-sm-10 text-right">
            <div class="ui-group-buttons">
              <button type="button" class="btn btn-sm btn-success btnAddRinci btn-labeled" data-dismiss="modal">
                <span class="btn-label"><i class="glyphicon glyphicon-save"></i></span>Simpan</button>
              <div class="or"></div>
              <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--Modal Hapus Rincian -->
<div id="HapusRincian" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-xs">
    <div class="modal-content">
      <div class="modal-header">
        {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger deleteContent">
          <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border" style="color:red;" aria-hidden="true"></i>
          Yakin akan menghapus Rincian <strong><span class="ur_rincian_del"></span></strong> yang terdapat dalam
          Komponen <strong><span class="ur_komp_rinc_del"></span></strong> ?
          <br>
          <br>
          <strong>Catatan : Penghapusan data ini mempengaruhi terhadap data turunannya yang ada ikut
            terhapus.....!!!!</strong>
          <span class="hidden id_komponen_rinci_hapus"></span>
        </div>
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-sm-2 text-left idbtnHapusKeg">
          </div>
          <div class="col-sm-10 text-right">
            <div class="ui-group-buttons">
              <button type="button" class="btn btn-sm btn-danger btnDelRinc btn-labeled" data-dismiss="modal">
                <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>Hapus</button>
              <div class="or"></div>
              <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- Cari Item Tarif SSH --}}
<div id="cariItemSSH" class="modal fade" role="dialog" tabindex="-1" data-focus-on="input:first" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h3>Daftar Item yang terdapat di SSH</h3>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" autocomplete='off' action="" onsubmit="return false;">
          <div class="form-group">
            <label class="control-label col-sm-2" for="id_item_perkada">Item SSH :</label>
            <div class="col-sm-8">
              <div class="input-group">
                <input type="text" list="tempCariItem" class="form-control" id="param_cari" name="param_cari"
                  placeholder="kata_kunci_item_ssh">
                <datalist id="tempCariItem" name="tempCariItem"></datalist>
                <div class="input-group-btn">
                  <button class="btn btn-primary" id="btnparam_cari" name="btnparam_cari"><i
                      class="fa fa-search fa-fw fa-lg"></i></button>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <table id='tblItemSSH' class="table display compact table-striped table-bordered" width="100%">
                <thead>
                  <tr>
                    <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                    <th width="15%" style="text-align: center; vertical-align:middle">Sub Sub Kelompok</th>
                    <th width="30%" style="text-align: center; vertical-align:middle">Item SSH</th>
                    <th width="25%" style="text-align: center; vertical-align:middle">Merk/Spesifikasi/Keterangan
                      Lainnya</th>
                    <th width="15%" style="text-align: center; vertical-align:middle">Satuan Item</th>
                    <th width="10%" style="text-align: center; vertical-align:middle">Harga Satuan</th>
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
          <div class="col-sm-2 text-left idbtnHapusKeg">
          </div>
          <div class="col-sm-10 text-right">
            <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
              <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- Cari Item Tarif SSH --}}
<div id="cariKomponen" class="modal fade" role="dialog" tabindex="-1" data-focus-on="input:first"
  data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h3>Daftar Komponen ASB</h3>
      </div>
      <div class="modal-body">
        <form name="frmCariKomponen" class="form-horizontal" role="form" autocomplete='off' action="" method="">
          <div class="form-group">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="col-sm-12">
              <table id='tblCariKomponen' class="table display compact table-striped table-bordered" cellspacing="0"
                width="100%">
                <thead>
                  <tr>
                    <th width="10px"></th>
                    <th width="10px" style="text-align: center; vertical-align:middle">No Urut</th>
                    <th style="text-align: center; vertical-align:middle">Uraian Komponen ASB</th>
                    <th width="15%" style="text-align: center; vertical-align:middle">Kode Rekening</th>
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
          <div class="col-sm-2 text-left idbtnHapusKeg">
          </div>
          <div class="col-sm-10 text-right">
            <div class="ui-group-buttons">
              <button type="button" class="btn btn-sm btn-info btnProsesCopyKomp btn-labeled" data-dismiss="modal">
                <span class="btn-label"><i class="fa fa-exchange fa-fw fa-lg"></i></span>Proses</button>
              <div class="or"></div>
              <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--Modal CopyDataASB -->
<div id="CopyDataASB" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4> Copy Data Kelompok Analisis Standar Belanja</h4>
      </div>
      <div class="modal-body">
        <form name="frmModalCopyASB" class="form-horizontal" role="form" autocomplete='off' action="" method="">
          <div class="form-group">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="col-sm-12">
              <table id='tblCariKelompok' class="table display compact table-striped table-bordered" cellspacing="0"
                width="100%">
                <thead>
                  <tr>
                    <th width="10px">Pilih</th>
                    <th width="10px" style="text-align: center; vertical-align:middle">No Urut</th>
                    <th style="text-align: center; vertical-align:middle">Uraian Kelompok ASB</th>
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
          <div class="col-sm-2 text-left idbtnHapusKeg">
          </div>
          <div class="col-sm-10 text-right">
            <div class="ui-group-buttons">
              <button type="button" class="btn btn-sm btn-info btnProsesCopyKelompok btn-labeled" data-dismiss="modal">
                <span class="btn-label"><i class="fa fa-exchange fa-fw fa-lg"></i></span>Proses</button>
              <div class="or"></div>
              <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="SimulasiHitung" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> --}}
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" autocomplete='off' action="" method="" onsubmit="return false;">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="id_aktivitas_simulasi" id="id_aktivitas_simulasi" readonly>
          <div class="form-group">
            <label for="aktivitas_simulasi" class="col-sm-3 control-label" align='left'>Aktivitas ASB :</label>
            <div class="col-sm-8">
              <input class="form-control aktivitas_simulasi" name="aktivitas_simulasi" id="aktivitas_simulasi" readonly>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="id_perkada">Volume Pemicu Biaya 1 :</label>
            <div class="col-sm-2">
              <input type="test" class="form-control number" id="v1_simulasi" name="v1_simulasi"
                style="text-align: right;">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="id_perkada">Volume Pemicu Biaya 2 :</label>
            <div class="col-sm-2">
              <input type="test" class="form-control number" id="v2_simulasi" name="v2_simulasi"
                style="text-align: right;">
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
              <button type="button" class="btn  btn-success btnSimulasi btn-labeled" data-dismiss="modal">
                <span class="btn-label"><i id="fooSimulasi" class="fa fa-print fa-fw fa-lg"></i></span>Cetak Aktivitas
                ASB</button>
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


<div id="ModalProgress" class="modal fade modal-static" role="dialog" data-backdrop="static" role="dialog"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <div class="text-center">
          <h4><strong>Sedang proses...</strong></h4>
          <i class="fa fa-spinner fa-pulse fa-5x fa-fw text-primary"></i>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript" language="javascript" class="init"
  src="{{ asset('/protected/resources/views/asb/perkada/JsRefAsb.js')}}"> </script>
@endsection