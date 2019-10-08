<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app0')

@section('content')
  <div class="container-fluid">
        <div class="row">
        <div class="col-md-12">
            <?php
                $this->title = 'Struktur SSH';
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
            <p><h2 class="panel-title"><span href="#" data-toggle="popover" data-container="body" title="Struktur SSH" data-trigger="hover" data-content="Terdiri dari empat level. Level keempat dikaitkan ke rekening belanja; tiap item SSH bisa lebih dari satu rekening belanja.">Standar Satuan Harga</span></h2></p>
          </div>

          <div class="panel-body">
          
          <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#golongan" aria-controls="golongan" role="tab" data-toggle="tab">Golongan</a></li>
            <li><a href="#kelompok" aria-controls="kelompok" role="tab" data-toggle="tab">Kelompok</a></li>
            <li><a href="#subkelompok" aria-controls="subkelompok" role="tab" data-toggle="tab">Sub Kelompok</a></li>
            <li><a href="#tarif" aria-controls="tarif" role="tab" data-toggle="tab">Item SSH</a></li>
            <li><a href="#rekening" aria-controls="rekening" role="tab" data-toggle="tab">Rekening Belanja</a></li>
          </ul>

          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="golongan">
              <br>
              <div class="add">
                <p>
                  {{-- <a id="btnPrintGol" class="print-golongan btn btn-primary btn-labeled"><span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>Cetak Golongan</a> --}}
                <span><a id="btnAddGol" class="add-golongan btn btn-success btn-labeled"><span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>Tambah Golongan</a></span>
                </p>
              </div>
              <div class="">
              <table id='tblGolongan' class="table display table-striped compact table-bordered table-responsive" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                          <th style="text-align: center; vertical-align:middle">Uraian Golongan</th>
                          <th width="150px" style="text-align: center; vertical-align:middle">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                  </tbody>
            </table>
          </div>
            </div>

            <div role="tabpanel" class="tab-pane" id="kelompok">
              <br>
              <div class="add">
                <p >
                  {{-- <a id="btnPrintKelSSh" class="print-kelompokssh btn btn-primary btn-labeled"><span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>Cetak Kelompok</a> --}}
                <span><a id="btnAddKel" class="add-kelompok btn btn-sm btn-success btn-labeled"><span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>Tambah Kelompok</a></span>
                </p>
              </div>
              <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
              <div class="">
                <table class="table display table-striped compact table-bordered table-responsive">
                  <tbody>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nama Golongan</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_golongan_kel" align='left'></label></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              </form>
              <div id="divKelompok">
                {{-- <div class="table-responsive"> --}}
              <table id="tblKelompok" class="table display table-striped compact table-bordered table-responsive" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th width="5%" style="text-align: center; vertical-align:middle">No Golongan</th>
                          <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                          <th style="text-align: center; vertical-align:middle">Uraian Kelompok</th>
                          <th width="150px" style="text-align: center; vertical-align:middle">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                  </tbody>
            </table>
          {{-- </div> --}}
            </div>
            </div>

            <div role="tabpanel" class="tab-pane" id="subkelompok">
            <br>
            <div class="add">
              <p>
                {{-- <a id="btnPrintSubKelSSh" class="print-subkelssh btn btn-primary btn-labeled"><span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>Cetak Sub Kelompok</a> --}}
              <span><a id="btnAddSubKel" class="add-subkelompok btn btn-sm btn-success btn-labeled">
                <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>Tambah Sub Kelompok</a></span>
              </p>
            </div>
            <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
              <div class="">
                <table class="table display table-striped compact table-bordered table-responsive">
                  <tbody>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nama Golongan</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_golongan_skel" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nama Kelompok</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_kelompok_skel" align='left'></label></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              </form>
              <div id="divSubKelompok">
                <div class="">
              <table id="tblSubKelompok" class="table display compact table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th width="5%" style="text-align: center; vertical-align:middle">No Kelompok</th>
                          {{-- <th width="5%" style="text-align: center; vertical-align:middle">Id Sub Kelompok</th> --}}
                          <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                          <th style="text-align: center; vertical-align:middle">Uraian Sub Kelompok</th>
                          <th width="180px" style="text-align: center; vertical-align:middle">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                  </tbody>
              </table>
            </div>
              </div>
            </div>

            <div role="tabpanel" class="tab-pane" id="tarif">
            <br>
            <div class="add">
              <p >
                {{-- <a id="btnPrintItemSSh" class="btnPrintItemSSh btn btn-primary btn-labeled"><span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>Cetak Item SSH</a> --}}
              <span><a id="btnAddItem" class="add-item btn btn-success btn-labeled">
                <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>Tambah Item</a></span>
              </p>
            </div>
            <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
              <div class="">
                <table class="table display table-striped compact table-bordered table-responsive">
                  <tbody>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nama Golongan</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_golongan_tarif" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nama Kelompok</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_kelompok_tarif" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nama Sub Kelompok</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_subkelompok_tarif" align='left'></label></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              </form>
              <div id="divTarif">
                <div class="">
                <table id="tblTarif" class="table display compact table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
                      <thead>
                          <tr>
                              <th width="10%" style="text-align: center; vertical-align:middle">No Sub Kelompok</th>
                              {{-- <th width="10%" style="text-align: center; vertical-align:middle">Id Item SSH</th> --}}
                              <th width="10%" style="text-align: center; vertical-align:middle">No Urut</th>
                              <th style="text-align: center; vertical-align:middle">Uraian Item SSH</th>
                              <th width="180px" style="text-align: center; vertical-align:middle">Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                      </tbody>
                </table>
              </div>
              </div>
              </div>

              <div role="tabpanel" class="tab-pane" id="rekening">
                <br>
                <div class="add">
                  <p id="btnAddRek"><a class="add-rekening btn btn-success btn-labeled"><span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span></i> Tambah Rekening</a></p>
                </div>
                <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
                <div class="">
                  <table class="table display table-striped compact table-bordered table-responsive">
                    <tbody>
                      <tr>
                        <td width="15%" style="text-align: left; vertical-align:top;">Nama Golongan</td>
                        <td style="text-align: left; vertical-align:top;"><label id="nm_golongan_rek" align='left'></label></td>
                      </tr>
                      <tr>
                        <td width="15%" style="text-align: left; vertical-align:top;">Nama Kelompok</td>
                        <td style="text-align: left; vertical-align:top;"><label id="nm_kelompok_rek" align='left'></label></td>
                      </tr>
                      <tr>
                        <td width="15%" style="text-align: left; vertical-align:top;">Nama Sub Kelompok</td>
                        <td style="text-align: left; vertical-align:top;"><label id="nm_subkelompok_rek" align='left'></label></td>
                      </tr>
                      <tr>
                        <td width="15%" style="text-align: left; vertical-align:top;">Nama Item SSH</td>
                        <td style="text-align: left; vertical-align:top;"><label id="nm_itemssh_rek" align='left'></label></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                </form>
                <div id="divRekening">
                <div class="">
                <table id="tblRekening" class="table display compact table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
                      <thead>
                          <tr>
                              <th width="10%" style="text-align: center; vertical-align:middle">Id Item SSH</th>
                              <th width="10%" style="text-align: center; vertical-align:middle">Kode Rekening</th>
                              <th style="text-align: center; vertical-align:middle">Uraian Rekening</th>
                              <th width="180px" style="text-align: center; vertical-align:middle">Aksi</th>
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


<!--Modal Golongan -->
<div id="TambahGolongan" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg"  >
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> --}}
        <h4 class="modal-title"></h4>
      </div>
    <!-- <form class="form-horizontal" role="form"> -->
      <div class="modal-body">
        <form class="form-horizontal" role="form" autocomplete='off' action="{{ route('TambahGolongan') }}" method="post" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <label for="no_urut_gol" class="col-sm-3 control-label" align='left'>No Urut :</label>
              <div class="col-sm-3">
                  <input type="text" class="form-control" id="no_urut_gol" name="no_urut_gol" required="required" data-toggle="popover" data-container="body" title="Struktur SSH" data-trigger="hover" data-content="Diisi sesuai urutan nomor di pencetakan daftar SSH">
              </div>
            </div>
            <div class="form-group">
              <label for="ur_golongan" class="col-sm-3 control-label" align='left'>Uraian Golongan SSH :</label>
              <div class="col-sm-8">
                <textarea type="text" class="form-control" rows="5" id="ur_golongan" name="ur_golongan" required="required" ></textarea>
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
                        <button type="button" class="btn btn-success btnAddGol btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i id="fooAddGol" class="fa fa-floppy-o fa-fw fa-lg"></i></span>Simpan</button>
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

<div id="EditGolongan" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="post" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <label class="control-label col-sm-3" for="id_gol_edit">Id Golongan :</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" id="id_gol_edit" disabled>
              </div>
            </div>
            <div class="form-group">
              <label for="no_urut_gol_edit" class="col-sm-3 control-label" align='left'>No Urut :</label>
              <div class="col-sm-3">
                {{-- <div class="input-group"> --}}
                <input type="text" class="form-control" id="no_urut_gol_edit" name="no_urut_gol_edit" required="required" data-toggle="popover" data-container="body" title="Struktur SSH" data-trigger="hover" data-content="Diisi sesuai urutan nomor di pencetakan daftar SSH">
                {{-- <span class="input-group-addon">
                      <a href="#" data-toggle="popover" data-container="body" title="Struktur SSH" data-trigger="hover" data-content="Diisi sesuai urutan nomor di pencetakan daftar SSH"><i class="glyphicon glyphicon-question-sign"></i></a>
                    </span>
                </div> --}}
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="ur_gol_edit">Uraian Golongan SSH:</label>
              <div class="col-sm-8">
                <textarea type="name" class="form-control" id="ur_gol_edit" rows="5"></textarea>
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
                        <button type="button" class="btn btn-success btnEditGol btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i id="fooEditGol" class="fa fa-floppy-o fa-fw fa-lg"></i></span>Update</button>
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

<!--Modal Hapus -->
<div id="HapusGolongan" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-xs">
    <div class="modal-content">
      <div class="modal-header">
        {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
          <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
          <div class="alert alert-danger deleteContent">
              Yakin akan menghapus <strong><span class="title"></span></strong> ?
          <span class="hidden id_gol_hapus"></span>
        </div>
      </div>
        <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusBelanja">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-danger btnDelGol btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i id="fooDelGol" class="fa fa-trash fa-fw fa-lg"></i></span>Hapus</button>
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
  <div class="modal-dialog modal-lg"  >
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
      </div>
    <!-- <form class="form-horizontal" role="form"> -->
      <div class="modal-body">
        <form class="form-horizontal" role="form" autocomplete='off' action="{{ route('TambahKelompok') }}" method="post" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
  					  <label for="id_gol_kel" class="col-sm-3 control-label" align='left'>Golongan SSH :</label>
              <div class="col-sm-8">
    					 	<label class="control-label" id="idgol_kel" align='left'></label>
                <input type="hidden" id="id_gol_kel" name="id_gol_kel" align='left'>
              </div>
  					</div>
            <div class="form-group">
              <label for="no_urut_kel" class="col-sm-3 control-label" align='left'>No Urut :</label>
              <div class="col-sm-3">
                {{-- <div class="input-group"> --}}
                <input type="text" class="form-control" id="no_urut_kel" name="no_urut_kel" required="required" data-toggle="popover" data-container="body" title="Struktur SSH" data-trigger="hover" data-content="Diisi sesuai urutan nomor di pencetakan daftar SSH">
                {{-- <span class="input-group-addon">
                    <a href="#" data-toggle="popover" data-container="body" title="Struktur SSH" data-trigger="hover" data-content="Diisi sesuai urutan nomor di pencetakan daftar SSH"><i class="glyphicon glyphicon-question-sign"></i></a>
                </span>
                </div> --}}
              </div>
            </div>
            <div class="form-group">
              <label for="ur_kel_ssh" class="col-sm-3 control-label" align='left'>Uraian Kelompok SSH :</label>
              <div class="col-sm-8">
                <textarea type="text" class="form-control" rows="5" id="ur_kel_ssh" name="ur_kel_ssh" required="required" ></textarea>
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
                        <button type="button" class="btn btn-success btnAKel btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i id="fooAddKel" class="fa fa-floppy-o fa-fw fa-lg"></i></span>Simpan</button>
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

<div id="EditKelompok" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="post" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <label class="control-label col-sm-3" for="id_gol_kel_edit">Golongan SSH:</label>
              <div class="col-sm-8">
    					 	<label class="control-label" id="idgol_kel_edit" align='left'></label>
                <input type="hidden" id="id_gol_kel_edit" name="id_gol_kel_edit" align='left'>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="id_kel_edit">Kelompok SSH:</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" id="id_kel_edit" disabled>
              </div>
            </div>
            <div class="form-group">
              <label for="no_urut_kel_edit" class="col-sm-3 control-label" align='left'>No Urut :</label>
              <div class="col-sm-3">
                {{-- <div class="input-group"> --}}
                <input type="text" class="form-control" id="no_urut_kel_edit" name="no_urut_kel_edit" required="required" data-toggle="popover" data-container="body" title="Struktur SSH" data-trigger="hover" data-content="Diisi sesuai urutan nomor di pencetakan daftar SSH">
                {{-- <span class="input-group-addon">
                  <a href="#" data-toggle="popover" data-container="body" title="Struktur SSH" data-trigger="hover" data-content="Diisi sesuai urutan nomor di pencetakan daftar SSH"><i class="glyphicon glyphicon-question-sign"></i></a>
                </span>
                </div> --}}
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="ur_kel_edit">Uraian Kelompok SSH:</label>
              <div class="col-sm-8">
                <textarea type="name" class="form-control" id="ur_kel_edit" rows="5"></textarea>
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
                        <button type="button" class="btn btn-success btnEkel btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i id="fooEditKel" class="fa fa-floppy-o fa-fw fa-lg"></i></span>Update</button>
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

<!--Modal Hapus -->
<div id="HapusKelompok" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-xs">
    <div class="modal-content">
      <div class="modal-header">
        {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
          <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
          <div class="alert alert-danger deleteContent">
              Yakin akan menghapus <strong><span class="uraian"></span></strong> ?
          <span class="hidden id_kel_hapus"></span>
        </div>
      </div>
        <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusBelanja">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-success btnHapusKel btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i id="fooHapusKel" class="fa fa-trash fa-fw fa-lg"></i></span>Simpan</button>
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

<!--Modal Sub Kelompok -->
<div id="TambahSubKelompok" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg"  >
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> --}}
        <h4 class="modal-title"></h4>
      </div>
    <!-- <form class="form-horizontal" role="form"> -->
      <div class="modal-body">
        <form class="form-horizontal" role="form" autocomplete='off' action="{{ route('TambahSubKelompok') }}" method="post" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
  					  <label for="id_gol_subkel" class="col-sm-3 control-label" align='left'>Golongan SSH :</label>
              <div class="col-sm-8">
    					 	<label class="control-label" id="idgol_subkel" align='left'></label>
                <input type="hidden" id="id_gol_subkel" name="id_gol_subkel" align='left'>
              </div>
  					</div>
            <div class="form-group">
  					  <label for="id_kel_sub" class="col-sm-3 control-label" align='left'>Kelompok SSH :</label>
              <div class="col-sm-8">
    					 	<label class="control-label" id="idkel_sub" align='left'></label>
                <input type="hidden" id="id_kel_sub" name="id_kel_sub" align='left'>
              </div>
  					</div>
            <div class="form-group">
              <label for="no_urut_sub" class="col-sm-3 control-label" align='left'>No Urut :</label>
              <div class="col-sm-3">
                {{-- <div class="input-group"> --}}
                <input type="text" class="form-control" id="no_urut_sub" name="no_urut_sub" required="required" data-toggle="popover" data-container="body" title="Struktur SSH" data-trigger="hover" data-content="Diisi sesuai urutan nomor di pencetakan daftar SSH">
                {{-- <span class="input-group-addon">
                    <a href="#" data-toggle="popover" data-container="body" title="Struktur SSH" data-trigger="hover" data-content="Diisi sesuai urutan nomor di pencetakan daftar SSH"><i class="glyphicon glyphicon-question-sign"></i></a>
                </span>
                </div> --}}
              </div>
            </div>
            <div class="form-group">
              <label for="ur_subkel_ssh" class="col-sm-3 control-label" align='left'>Uraian Sub Kelompok SSH :</label>
              <div class="col-sm-8">
                <textarea type="text" class="form-control" rows="5" id="ur_subkel_ssh" name="ur_subkel_ssh" required="required" ></textarea>
              </div>
            </div>
        </form>
      </div>
        <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusBelanja" data-backdrop="static">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-success btnAddSKel btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i id="fooAddSKel" class="fa fa-floppy-o fa-fw fa-lg"></i></span>Simpan</button>
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

<div id="EditSubKelompok" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="post" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <label class="control-label col-sm-3" for="id_gol_sub_edit">Golongan SSH :</label>
              <div class="col-sm-8">
    					 	<label class="control-label" id="idgol_sub_edit" align='left'></label>
                <input type="hidden" id="id_gol_sub_edit" name="id_gol_sub_edit" align='left'>
              </div>
            </div>
            <div class="form-group">
  					  <label for="id_kel_sub_edit" class="col-sm-3 control-label" align='left'>Kelompok SSH :</label>
              <div class="col-sm-8">
    					 	<label class="control-label" id="idkel_sub_edit" align='left'></label>
                <input type="hidden" id="id_kel_sub_edit" name="id_kel_sub_edit" align='left'>
              </div>
  					</div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="id_subkel_edit">Id Sub Kelompok :</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" id="id_subkel_edit" disabled>
              </div>
            </div>
            <div class="form-group">
              <label for="no_urut_sub_edit" class="col-sm-3 control-label" align='left'>No Urut :</label>
              <div class="col-sm-3">
                {{-- <div class="input-group"> --}}
                <input type="text" class="form-control" id="no_urut_sub_edit" name="no_urut_sub_edit" required="required" data-toggle="popover" data-container="body" title="Struktur SSH" data-trigger="hover" data-content="Diisi sesuai urutan nomor di pencetakan daftar SSH">
                {{-- <span class="input-group-addon"> --}}
                  {{-- <a href="#" data-toggle="popover" data-container="body" title="Struktur SSH" data-trigger="hover" data-content="Diisi sesuai urutan nomor di pencetakan daftar SSH"><i class="glyphicon glyphicon-question-sign"></i></a> --}}
                {{-- </span> --}}
                {{-- </div> --}}
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="ur_subkel_edit">Uraian Sub Kelompok SSH:</label>
              <div class="col-sm-8">
                <textarea type="name" class="form-control" id="ur_subkel_edit" rows="5"></textarea>
              </div>
            </div>
            <div class="form-group">
          </div>
          </form>
        </div>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusBelanja">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-success btnEditSKel btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i id="fooEditSKel" class="fa fa-floppy-o fa-fw fa-lg"></i></span>Update</button>
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

<!--Modal Hapus -->
<div id="HapusSubKelompok" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-xs">
    <div class="modal-content">
      <div class="modal-header">
        {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
          <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
          <div class="alert alert-danger deleteContent">
              Yakin akan menghapus <strong><span class="uraian"></span></strong> ?
          <span class="hidden id_subkel_hapus"></span>
        </div>
      </div>
        <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusBelanja">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-danger btnHapusSKel btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i id="fooHapusSKel" class="fa fa-trash fa-fw fa-lg"></i></span>Simpan</button>
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

<!--Modal Tarif Item -->
<div id="TambahItem" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg"  >
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> --}}
        <h4 class="modal-title"></h4>
      </div>
    <!-- <form class="form-horizontal" role="form"> -->
      <div class="modal-body">
        <form class="form-horizontal" role="form" autocomplete='off' action="{{ route('TambahItem') }}" method="post" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
  					  <label for="id_gol_item" class="col-sm-3 control-label" align='left'>Golongan SSH :</label>
              <div class="col-sm-8">
    					 	<label class="control-label" id="idgol_item" align='left'></label>
                <input type="hidden" id="id_gol_item" name="id_gol_item" align='left'>
              </div>
  					</div>
            <div class="form-group">
  					  <label for="id_kel_item" class="col-sm-3 control-label" align='left'>Kelompok SSH :</label>
              <div class="col-sm-8">
    					 	<label class="control-label" id="idkel_item" align='left'></label>
                <input type="hidden" id="id_kel_item" name="id_kel_item" align='left'>
              </div>
  					</div>
            <div class="form-group">
  					  <label for="id_sub_item" class="col-sm-3 control-label" align='left'>Sub Kelompok SSH :</label>
              <div class="col-sm-8">
    					 	<label class="control-label" id="idsub_item" align='left'></label>
                <input type="hidden" id="id_sub_item" name="id_sub_item" align='left'>
              </div>
  					</div>
            <div class="form-group">
              <label for="no_urut_item" class="col-sm-3 control-label" align='left'>No Urut :</label>
              <div class="col-sm-3">
                {{-- <div class="input-group"> --}}
                <input type="text" class="form-control" id="no_urut_item" name="no_urut_item" required="required" data-toggle="popover" data-container="body" title="Struktur SSH" data-trigger="hover" data-content="Diisi sesuai urutan nomor di pencetakan daftar SSH">
                {{-- <span class="input-group-addon">
                  <a href="#" data-toggle="popover" data-container="body" title="Struktur SSH" data-trigger="hover" data-content="Diisi sesuai urutan nomor di pencetakan daftar SSH"><i class="glyphicon glyphicon-question-sign"></i></a>
                </span>
                </div> --}}
              </div>
            </div>
            <div class="form-group">
              <label for="ur_item_ssh" class="col-sm-3 control-label" align='left'>Item SSH :</label>
              <div class="col-sm-8">
                <textarea type="text" class="form-control" rows="5" id="ur_item_ssh" name="ur_item_ssh" required="required" ></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="ket_item_ssh" class="col-sm-3 control-label" align='left'>Keterangan/Merek/Spesifikasi Lainnya :</label>
              <div class="col-sm-8">
                <textarea type="text" class="form-control" rows="5" id="ket_item_ssh" name="ket_item_ssh" required="required" ></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="id_satuan_ssh">Satuan :</label>
              <div class="col-sm-8">
                <select class="form-control select2" name="id_satuan_ssh" id="id_satuan_ssh"></select>
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
                        <button type="button" class="btn btn-success btnAItem btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i id="fooAItem" class="fa fa-floppy-o fa-fw fa-lg"></i></span>Simpan</button>
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

<div id="EditItem" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="post" name="frmEditItem">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <label class="control-label col-sm-3" for="id_gol_item_edit">Golongan SSH :</label>
              <div class="col-sm-8">
    					 	<label class="control-label" id="idgol_item_edit" align='left'></label>
                <input type="hidden" id="id_gol_item_edit" name="id_gol_item_edit" align='left'>
              </div>
            </div>
            <div class="form-group">
  					  <label for="id_kel_item_edit" class="col-sm-3 control-label" align='left'>Kelompok SSH :</label>
              <div class="col-sm-8">
    					 	<label class="control-label" id="idkel_item_edit" align='left'></label>
                <input type="hidden" id="id_kel_item_edit" name="id_kel_item_edit" align='left'>
              </div>
  					</div>
            <div class="form-group">
  					  <label for="id_sub_item_edit" class="col-sm-3 control-label" align='left'>Sub Kelompok SSH :</label>
              <div class="col-sm-8">
    					 	<label class="control-label" id="idsub_item_edit" align='left'></label>
                <input type="hidden" id="id_sub_item_edit" name="id_sub_item_edit" align='left'>
              </div>
  					</div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="id_item_edit">Id Item SSH :</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" id="id_item_edit" disabled>
              </div>
            </div>
            <div class="form-group">
              <label for="no_urut_item_edit" class="col-sm-3 control-label" align='left'>No Urut :</label>
              <div class="col-sm-3">
                {{-- <div class="input-group"> --}}
                <input type="text" class="form-control" id="no_urut_item_edit" name="no_urut_item_edit" required="required" data-toggle="popover" data-container="body" title="Struktur SSH" data-trigger="hover" data-content="Diisi sesuai urutan nomor di pencetakan daftar SSH">
                {{-- <span class="input-group-addon">
                  <a href="#" data-toggle="popover" data-container="body" title="Struktur SSH" data-trigger="hover" data-content="Diisi sesuai urutan nomor di pencetakan daftar SSH"><i class="glyphicon glyphicon-question-sign"></i></a>
                </span>
                </div> --}}
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="ur_item_edit">Uraian Item SSH:</label>
              <div class="col-sm-8">
                <textarea type="name" class="form-control" id="ur_item_edit" rows="5"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="ket_item_ssh_edit" class="col-sm-3 control-label" align='left'>Keterangan/Merek/Spesifikasi Lainnya :</label>
              <div class="col-sm-8">
                <textarea type="text" class="form-control" rows="5" id="ket_item_ssh_edit" name="ket_item_ssh_edit" required="required" ></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="id_satuan_edit">Satuan :</label>
              <div class="col-sm-8">
                <select class="form-control select2" name="id_satuan_edit" id="id_satuan_edit"></select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="status_item_edit">Status Data Item :</label>
              <div class="col-sm-8">
                <label class="radio-inline">
                  <input type="radio" class="status_item_edit" name="status_item_edit" id="status_item_edit" value="0"> Aktif 
                </label>
                <label class="radio-inline">
                  <input type="radio" class="status_item_edit" name="status_item_edit" id="status_item_edit" value="1"> Tidak Aktif
                </label>
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
                        <button type="button" class="btn btn-success btnEditItem btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i id="fooEditItem" class="fa fa-floppy-o fa-fw fa-lg"></i></span>Update</button>
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

<!--Modal Hapus -->
<div id="HapusItem" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-xs">
    <div class="modal-content">
      <div class="modal-header">
        {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
          <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
          <div class="alert alert-danger deleteContent">
              Yakin akan menghapus <strong><span class="uraian"></span></strong> ?
          <span class="hidden id_item_hapus"></span>
        </div>
      </div>
        <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusBelanja">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-danger btnHapusItem btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i id="fooHapusItem" class="fa fa-trash fa-fw fa-lg"></i></span>Simpan</button>
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

<!--Modal Rekening Item -->
<div id="TambahRekening" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg"  >
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> --}}
        <h4 class="modal-title"></h4>
      </div>
    <!-- <form class="form-horizontal" role="form"> -->
      <div class="modal-body">
        <form class="form-horizontal" role="form" autocomplete='off' action="{{ route('TambahRekening') }}" method="post" onsubmit="return false;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
  					  <label for="id_gol_rek" class="col-sm-3 control-label" align='left'>Golongan SSH :</label>
              <div class="col-sm-8">
    					 	<label class="control-label" id="idgol_rek" align='left'></label>
                <input type="hidden" id="id_gol_rek" name="id_gol_rek" align='left'>
              </div>
  					</div>
            <div class="form-group">
  					  <label for="id_kel_rek" class="col-sm-3 control-label" align='left'>Kelompok SSH :</label>
              <div class="col-sm-8">
    					 	<label class="control-label" id="idkel_rek" align='left'></label>
                <input type="hidden" id="id_kel_rek" name="id_kel_rek" align='left'>
              </div>
  					</div>
            <div class="form-group">
  					  <label for="id_sub_rek" class="col-sm-3 control-label" align='left'>Sub Kelompok SSH :</label>
              <div class="col-sm-8">
    					 	<label class="control-label" id="idsub_rek" align='left'></label>
                <input type="hidden" id="id_sub_rek" name="id_sub_rek" align='left'>
              </div>
  					</div>
            <div class="form-group">
  					  <label for="id_item_rek" class="col-sm-3 control-label" align='left'>Item SSH :</label>
              <div class="col-sm-8">
    					 	<label class="control-label" id="iditem_rek" align='left'></label>
                <input type="hidden" id="id_item_rek" name="id_item_rek" align='left'>
              </div>
  					</div>
            <div class="form-group">
  					  <label for="id_rek" class="col-sm-3 control-label" align='left'>Rekening belanja Item SSH :</label>
              {{-- <p> --}}
              <div class="col-sm-8">
                  <div class="input-group">
                    <input type="hidden" class="form-control" id="id_rek" name="id_rek" required="required" >
                    <input type="text" class="form-control" id="nm_rekening" name="nm_rekening" disabled>
                    <div class="input-group-btn">
                      <button class="btn btn-primary" data-toggle="modal" href="#cariRekening"  data-toggle="popover" data-container="body" title="Struktur SSH" data-trigger="hover" data-content="Dikaitkan ke parameter rekening; dapat dikaitkan ke lebih dari satu rekening"><i class="fa fa-search fa-fw fa-lg"></i></button>
                    </div>
                  </div>
              </div>
                {{-- <sup><a href="#" data-toggle="popover" data-container="body" title="Struktur SSH" data-trigger="hover" data-content="Dikaitkan ke parameter rekening; dapat dikaitkan ke lebih dari satu rekening"><i class="glyphicon glyphicon-question-sign"></i></a></sup>
              </p> --}}
  					</div>
        </form>
      </div>
        <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusBelanja">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-success btnARek btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i id="fooARek" class="fa fa-floppy-o fa-fw fa-lg"></i></span>Simpan</button>
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

<div id="EditRekening" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <label class="control-label col-sm-3" for="id_gol_rek_edit">Golongan SSH :</label>
              <div class="col-sm-8">
    					 	<label class="control-label" id="idgol_rek_edit" align='left'></label>
                <input type="hidden" id="id_gol_rek_edit" name="id_gol_rek_edit" align='left'>
              </div>
            </div>
            <div class="form-group">
  					  <label for="id_kel_rek_edit" class="col-sm-3 control-label" align='left'>Kelompok SSH :</label>
              <div class="col-sm-8">
    					 	<label class="control-label" id="idkel_rek_edit" align='left'></label>
                <input type="hidden" id="id_kel_rek_edit" name="id_kel_rek_edit" align='left'>
              </div>
  					</div>
            <div class="form-group">
  					  <label for="id_sub_rek_edit" class="col-sm-3 control-label" align='left'>Sub Kelompok SSH :</label>
              <div class="col-sm-8">
    					 	<label class="control-label" id="idsub_rek_edit" align='left'></label>
                <input type="hidden" id="id_sub_rek_edit" name="id_sub_rek_edit" align='left'>
              </div>
  					</div>
            <div class="form-group">
  					  <label for="id_item_rek_edit" class="col-sm-3 control-label" align='left'>Item SSH :</label>
              <div class="col-sm-8">
    					 	<label class="control-label" id="iditem_rek_edit" align='left'></label>
                <input type="hidden" id="id_item_rek_edit" name="id_item_rek_edit" align='left'>
              </div>
  					</div>
            <div class="form-group">
              <label for="id_rek_edit" class="col-sm-3 control-label" align='left'>Id Rekening SSH :</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" id="id_rek_edit" name="id_rek_edit" disabled >
              </div>
            </div>
            <div class="form-group">
  					  <label for="id_rekening_edit" class="col-sm-3 control-label" align='left'>Rekening belanja Item SSH :</label>
              {{-- <p> --}}
              <div class="col-sm-8">
    					 	 {{-- <div class="input-group"> --}}
                    <input type="hidden" class="form-control" id="id_rekening_edit" name="id_rekening_edit" required="required" >
                    <input type="text" class="form-control" id="nm_rekening_edit" name="nm_rekening_edit" disabled>
                    {{-- <div class="input-group-btn"> --}}
                      <button class="btn btn-primary" data-toggle="modal" href="#cariRekening" data-toggle="popover" data-container="body" title="Struktur SSH" data-trigger="hover" data-content="Dikaitkan ke parameter rekening; dapat dikaitkan ke lebih dari satu rekening"><i class="fa fa-search fa-fw fa-lg"></i></button>
                    {{-- </div> --}}
                  {{-- </div> --}}
              </div>
              {{-- <sup><a href="#" data-toggle="popover" data-container="body" title="Struktur SSH" data-trigger="hover" data-content="Dikaitkan ke parameter rekening; dapat dikaitkan ke lebih dari satu rekening"><i class="glyphicon glyphicon-question-sign"></i></a></sup>
              </p> --}}
  					</div>
          </form>
        </div>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusBelanja">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-sm btn-success btnEditRek btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i id="fooEditRek" class="fa fa-floppy-o fa-fw fa-lg"></i></span>Update</button>
                        <div class="or"></div>
                        <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="fa fa-sign-out fa-fw fa-lg"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
        </div>
      </div>
    </div>

<!--Modal Hapus -->
<div id="HapusRekening" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-xs">
    <div class="modal-content">
      <div class="modal-header">
        {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
          <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
          <div class="alert alert-danger deleteContent">
              Yakin akan menghapus <strong><span class="uraian"></span></strong> ?
          <span class="hidden id_rek_hapus"></span>
        </div>
      </div>
        <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusBelanja">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-danger btnHapusRek btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i id="fooHapusRek" class="fa fa-trash fa-fw fa-lg"></i></span>Hapus</button>
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

  {{-- Modal Cari Kode Rekening --}}
  <div id="cariRekening" class="modal fade" tabindex="-1" data-focus-on="input:first" data-backdrop="static">
  <div class="modal-dialog modal-lg"  >
    <div class="modal-content">
    <div class="modal-header">
        {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> --}}
        <h4>Daftar Rekening</h4>
    </div>
    <div class="modal-body">
      <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
        <div class="form-group">
          <div class="col-sm-12">
            <table id='tblCariRekening' class="table display table-striped table-bordered" cellspacing="0" width="100%">
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
                    <div class="col-sm-2 text-left idbtnHapusBelanja">
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


@endsection


@section('scripts')
  <script type="text/javascript" language="javascript" class="init" src="{{ asset('/protected/resources/views/ssh/js_index_ssh.js')}}"></script>
@endsection
