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
            <p class=""><h2 class="panel-title"><span data-toggle="popover" data-container="body" title="Perkada dan Aktivitas ASB" data-trigger="hover" data-content="Struktur ASB; terdiri dari empat level; level keempat dirinci sampai ke pembentuk biaya">Perkada tentang Analisa Standar Belanja</span></h2>
            </p>
          </div>

          <div class="panel-body">
          <div class='tabs-x tabs-above tab-bordered tabs-krajee'>
          <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#perkada" aria-controls="perkada" role="tab" data-toggle="tab">Identitas Perkada</a></li>
            <li><a href="#kelompok" aria-controls="kelompok" role="tab" data-toggle="tab">Kelompok ASB</a></li>
            <li><a href="#subkelompok" aria-controls="subkelompok" role="tab" data-toggle="tab">Sub Kelompok ASB</a></li>
            <li><a href="#subsubkelompok" aria-controls="subsubkelompok" role="tab" data-toggle="tab">Sub Sub Kelompok ASB</a></li>
            <li><a href="#detailaktivitas" aria-controls="aktivitas" role="tab" data-toggle="tab">Aktivitas ASB</a></li>
            <li><a href="#detailkomponen" aria-controls="komponen" role="tab" data-toggle="tab">Komponen Aktivitas</a></li>
            <li><a href="#detailrincian" aria-controls="rincian" role="tab" data-toggle="tab">Rincian Komponen</a></li>
          </ul>

          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="perkada">
              <br>
              <div class="add">
                  <p><a class="add-perkada btn btn-labeled btn-success"><span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Perkada</a></p>
                  {{-- <div class="btn-group">
                      <button type="button" class="btn btn-info dropdown-toggle btn-labeled" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown"><span class="btn-label"><i class="fa fa-print fa-fw fa-lg"></i></span>Cetak ASB <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li>
                                  <a class="dropdown-item cetak-perkada"><i class="fa fa-print fa-fw fa-lg"></i>Cetak List ASB</a>
                                  <a class="dropdown-item cetak-duplikasi"><i class="fa fa-print fa-fw fa-lg"></i>Cetak Duplikasi ASB</a>
                                </li>                     
                            </ul>
                    </div> --}}
              </div>
              <div>
              <table id='tblPerkada' class="table display compact table-striped table-bordered table-responsive" cellspacing="0" width="100%">
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
                <a id="btnTambahKel" class="add-kelompok btn btn-success btn-labeled" role="button"><span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Kelompok Aktivitas ASB </a>
                <a id="btnCopyASB" class="copy-asb btn btn-primary btn-labeled" role="button"><span class="btn-label"><i class="fa fa-exchange fa-fw fa-lg"></i></span>Copy Data ASB</a>
              <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
              <div>
              <br>
                <table class="table table-striped table-bordered table-responsive">
                  <tbody>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">No Perkada</td>
                      <td style="text-align: left; vertical-align:top;"><label id="no_perkada_kel" align='left'></label></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              </form>
              <div id="divAktivitas">
              <div>
              <table id="tblKelompok" class="table compact table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
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
                <p id="btnTambahSubKel"><a class="add-subkelompok btn btn-success btn-labeled"><span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Sub Kelompok Aktivitas ASB</a></p>
            </div>
              <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
              <div>
                <table class="table table-striped table-bordered table-responsive">
                  <tbody>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">No Perkada</td>
                      <td id="" name="" style="text-align: left; vertical-align:top;"><label id="no_perkada_subkel" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nama Kelompok</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_kel_subkel" align='left'></label></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              </form>
              <div id="divAktivitas">
              <div>
              <table id="tblSubKelompok" class="table compact table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
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
                <p id="btnTambahSubSubKel"><a class="add-sskel btn btn-success btn-labeled"><span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Sub Sub Kelompok ASB</a></p>
            </div>
              <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
              <div>
                <table class="table table-striped table-bordered table-responsive">
                  <tbody>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">No Perkada</td>
                      <td id="" name="" style="text-align: left; vertical-align:top;"><label id="no_perkada_sskel" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nama Kelompok</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_kel_sskel" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nama Sub Kelompok</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_subkel_sskel" align='left'></label></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              </form>
              <div id="divAktivitas">
              <div>
              <table id="tblSubSubKelompok" class="table compact table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
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
                <p id="btnTambahAktivitas"><a class="add-aktivitas btn btn-success btn-labeled"><span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Aktivitas ASB</a></p>
            </div>
              <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
              <div>
                <table class="table table-striped table-bordered table-responsive">
                  <tbody>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">No Perkada</td>
                      <td id="" name="" style="text-align: left; vertical-align:top;"><label id="no_perkada_aktiv" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nama Kelompok</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_kel_aktiv" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nama Sub Kelompok</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_subkel_aktiv" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nama Sub Sub Kelompok</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_subsubkel_aktiv" align='left'></label></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              </form>
              <div id="divAktivitas">
              <div>
              <table id="tblAktivitas" class="table compact table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
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
                <a id="btnTambahKomponen" class="add-komponen btn btn-success btn-labeled" role="button"><span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Komponen Aktivitas </a>
                <a id="btnCopyKomponen" class="copy-komponen btn btn-primary btn-labeled" role="button"><span class="btn-label"><i class="fa fa-exchange fa-fw fa-lg"></i></span> Copy Data Komponen</a>
              
              <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
              <div>
              <br>
                <table class="table table-striped table-bordered table-responsive">
                  <tbody>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">No Perkada</td>
                      <td id="" name="" style="text-align: left; vertical-align:top;"><label id="no_perkada_komp" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nama Kelompok</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_kel_komp" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nama Sub Kelompok</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_subkel_komp" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nama Sub Sub Kelompok</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_subsubkel_komp" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nama Aktivitas</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_aktiv_komp" align='left'></label></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              </form>
              <div id="divKomponen">
              <div>
              <table id="tblKomponen" class="table display compact table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
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
              <p id="btnTambahRincian"><a class="add-rincian btn btn-success btn-labeled"><span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Rincian Komponen Aktivitas</a></p>
            </div>
            <form class="form-horizontal col-sm-12" role="form" autocomplete='off' action="" method="" >
              <div >
                <table class="table table-striped table-bordered table-responsive">
                  <tbody>
                    <tr>
                      <td width="25%" style="text-align: left; vertical-align:top;">No Perkada</td>
                      <td id="" name="" style="text-align: left; vertical-align:top;"><label id="no_perkada_rinc" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="25%" style="text-align: left; vertical-align:top;">Nama Kelompok</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_kel_rinc" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="25%" style="text-align: left; vertical-align:top;">Nama Sub Kelompok</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_subkel_rinc" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="25%" style="text-align: left; vertical-align:top;">Nama Sub Sub Kelompok</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_subsubkel_rinc" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="25%" style="text-align: left; vertical-align:top;">Nama Aktivitas</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_aktiv_rinc" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="25%" style="text-align: left; vertical-align:top;">Nama Komponen</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_komp_rinc" align='left'></label></td>
                    </tr>
                  </tbody></table>
              </div>
              </form>
              <div id="divTblRincian">
              {{-- <div class="table-responsive"> --}}
                  <table id="tblRincian" class="table display compact table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
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
    <div class="modal-dialog modal-lg"  >
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> --}}
          <h4 class="modal-title"></h4>
        </div>
      <!-- <form class="form-horizontal" role="form"> -->
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="{{ route('TambahPerkadaASB') }}" method="post" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group">
                <label for="no_perkada" class="col-sm-3 control-label" align='left'>No Perkada :</label>
                <div class="col-sm-6">
                  <div class="input-group">
                    <input type="text" class="form-control" id="no_perkada" name="no_perkada" required="required" >
                    <span class="input-group-addon">
                      <a href="#" data-toggle="popover" data-container="body" title="Nomor Perkada ASB" data-trigger="hover" data-content="Diisi dengan Nomor Perkada, jika masih draft bisa diisi nomor sembarang yang penting unik dengan lainnya"><i class="glyphicon glyphicon-question-sign"></i></a>
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
                      <input type="text" class="form-control datepicker" id="tgl_perkada" name="tgl_perkada" style="text-align: center;">
                      <i class="fa fa-calendar fa-fw fa-lg text-primary form-control-feedback"></i>              
                  </div>
                {{-- </div> --}}
              </div>
              <div class="form-group">
                <label for="thn_perkada" class="col-sm-3 control-label" align='left'>Tahun Berlaku Perkada :</label>
                <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control number" id="thn_perkada" name="thn_perkada" required="required" >
                  <span class="input-group-addon">
                      <a href="#" data-toggle="popover" data-container="body" title="Tahun ASB" data-trigger="hover" data-content="Diisi dengan Tahun Berlakunya Perkada ASB tersebut"><i class="glyphicon glyphicon-question-sign"></i></a>
                    </span>
                </div>
                </div>
              </div>
              <div class="form-group">
                <label for="ur_perkada" class="col-sm-3 control-label" align='left'>Uraian Perkada ASB :</label>
                <div class="col-sm-8">
                  <textarea type="text" class="form-control" rows="5" id="ur_perkada" name="ur_perkada" required="required" ></textarea>
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
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> --}}
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="post" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" id="id_perkada_edit" name="id_perkada_edit">
              <div class="form-group">
                <label class="control-label col-sm-3" for="no_perkada_edit">Nomor Perkada ASB :</label>
                <div class="col-sm-6">
                  <div class="input-group">
                    <input type="text" class="form-control" id="no_perkada_edit" name="no_perkada_edit" required="required" >
                    <span class="input-group-addon">
                      <a href="#" data-toggle="popover" data-container="body" title="Nomor Perkada ASB" data-trigger="hover" data-content="Diisi dengan Nomor Perkada, jika masih draft bisa diisi nomor sembarang yang penting unik dengan lainnya"><i class="glyphicon glyphicon-question-sign"></i></a>
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
                      <input type="text" class="form-control datepicker" id="tgl_perkada_edit" name="tgl_perkada_edit" style="text-align: center;">
                      <i class="fa fa-calendar fa-fw fa-lg text-primary form-control-feedback"></i>              
                  </div>
              </div>
              <div class="form-group">
                <label for="thn_perkada_edit" class="col-sm-3 control-label" align='left'>Tahun Berlaku Perkada :</label>
                <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control" id="thn_perkada_edit" name="thn_perkada_edit" required="required" >
                  <span class="input-group-addon">
                    <a href="#" data-toggle="popover" data-container="body" title="Tahun ASB" data-trigger="hover" data-content="Diisi dengan Tahun Berlakunya Perkada ASB tersebut"><i class="glyphicon glyphicon-question-sign"></i></a>
                  </span>
                </div>
                </div>
              </div>
              <div class="form-group">
                <label for="ur_perkada_edit" class="col-sm-3 control-label" align='left'>Uraian Perkada ASB :</label>
                <div class="col-sm-8">
                  <textarea type="text" class="form-control" rows="5" id="ur_perkada_edit" name="ur_perkada_edit" required="required" ></textarea>
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
                <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border"  style="color:red;" aria-hidden="true"></i>
                Yakin akan menghapus Perkada tentang ASB Nomor : <strong><span class="uraian"></span></strong> ?
                <br>
                <br>
                <strong>Catatan : Penghapusan data ini mempengaruhi terhadap data turunannya yang ada ikut terhapus.....!!!!</strong> 
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
              <i class="fa fa-exclamation-triangle fa-3x fa-border"  style="color:blue;" aria-hidden="true"></i>
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
    <div class="modal-dialog modal-lg"  >
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> --}}
          <h4 class="modal-title"></h4>
        </div>      
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="{{url('/asb/addKelompok')}}" method="post" >
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
                  <textarea type="text" rows="3" class="form-control" id="ur_asb_kel" name="ur_asb_kel" required="required" ></textarea>
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
    <div class="modal-dialog modal-lg"  >
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> --}}
          <h4 class="modal-title"></h4>
        </div>
      
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="{{url('/asb/editKelompok')}}" method="post">
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
                  <textarea type="text" rows="3" class="form-control" id="ur_asb_kel_edit" name="ur_asb_kel_edit" required="required" ></textarea>
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
              <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border"  style="color:red;" aria-hidden="true"></i>
                Yakin akan menghapus Kelompok ini <strong><span class="ur_asb_kel_del"></span></strong> yang terdapat dalam Perkada Nomor : <strong><span class="no_perkada_kel_del"></span></strong> ?
                <br>
                <br>
                <strong>Catatan : Penghapusan data ini mempengaruhi terhadap data turunannya yang ada ikut terhapus.....!!!!</strong> 
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
    <div class="modal-dialog modal-lg"  >
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> --}}
          <h4 class="modal-title"></h4>
        </div>
      
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="{{url('/asb/addSubKelompok')}}" method="post" >
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
                  <textarea type="text" rows="3" class="form-control" id="ur_asb_subkel" name="ur_asb_subkel" required="required" ></textarea>
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
    <div class="modal-dialog modal-lg"  >
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> --}}
          <h4 class="modal-title"></h4>
        </div>
      
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="{{url('/asb/editSubKelompok')}}" method="post" >
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
                  <textarea type="text" rows="3" class="form-control" id="ur_asb_subkel_edit" name="ur_asb_subkel_edit" required="required" ></textarea>
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
              <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border"  style="color:red;" aria-hidden="true"></i>
                Yakin akan menghapus Sub Kelompok <strong><span class="ur_asb_subkel_del"></span></strong> yang termasuk dalam Kelompok <strong><span class="ur_asb_kel_del"></span></strong> dengan Perkada Nomor : <strong><span class="no_perkada_subkel_del"></span></strong> ?
                <br>
                <br>
                <strong>Catatan : Penghapusan data ini mempengaruhi terhadap data turunannya yang ada ikut terhapus.....!!!!</strong> 
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
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> --}}
          <h4 class="modal-title"></h4>
        </div>      
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="{{url('/asb/addSubKelompok')}}" method="post" >
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
                  <textarea type="text" rows="3" class="form-control" id="ur_asb_ssubkel" name="ur_asb_ssubkel" required="required" ></textarea>
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
                Yakin akan menghapus Sub Sub Kelompok <strong><span class="ur_asb_subsubkel_del"></span></strong> yang termasuk dalam Sub Kelompok <strong><span class="ur_asb_subkel_del"></span></strong> dengan Perkada Nomor : <strong><span class="no_perkada_subsubkel_del"></span></strong> ?
                <br>
                <br>
                <strong>Catatan : Penghapusan data ini mempengaruhi terhadap data turunannya yang ada ikut terhapus.....!!!!</strong> 
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
    <div class="modal-dialog modal-lg" >
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> --}}
          <h4 class="modal-title"></h4>
        </div>
      <!-- <form class="form-horizontal" role="form"> -->
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="{{ route('TambahAktivitasASB') }}" method="post" >
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
                  <input type="text" class="form-control" id="nm_aktivitas" name="nm_aktivitas" required="required" >
                </div>
              </div>
              <div class="form-group">
              <div class="col-sm-12">
              <table id="tblDetRincian" class="table table-striped table-bordered"  cellspacing="0" width="100%">
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
                        <span><a href="#" data-toggle="popover" data-html="true" data-container="body" title="Perkada dan Aktivitas ASB" data-trigger="hover" data-content="Cost driver utama, yang mempengaruhi besarnya biaya aktivitas.<br>Misal untuk aktivitas pelatihan, cost driver berupa peserta."><i class="glyphicon glyphicon-question-sign"></i></a></span></td>
                        <td style="text-align: center; vertical-align:middle">Derivatif
                        <span><a href="#" data-toggle="popover" data-html="true" data-container="body" title="Perkada dan Aktivitas ASB" data-trigger="hover" data-content="Cost driver derivatif, satuan yang berubah tergantung banyaknya volume pada cost driver utama.<br>Misal untuk aktivitas pelatihan, cost driver peserta, cost driver derivatif adalah kelas; semakin banyak peserta makin banyak kelas yang diperlukan."><i class="glyphicon glyphicon-question-sign"></i></a></span></td>
                        <td style="text-align: center; vertical-align:middle"> 
                        <span><a href="#" data-toggle="popover" data-html="true" data-container="body" title="Perkada dan Aktivitas ASB" data-trigger="hover" data-content="Range: rentang berubahnya cost driver derivatif.<br>Misal: satu kelas pelatihan hanya bisa menampung 30 peserta, lebih dari 30 peserta harus dibuat kelas baru."><i class="glyphicon glyphicon-question-sign"></i></a></span></td>
                        <td style="text-align: center; vertical-align:middle">
                        <span><a href="#" data-toggle="popover" data-html="true" data-container="body" title="Perkada dan Aktivitas ASB" data-trigger="hover" data-content="Kapasitas: jumlah maksimum volume yang bisa dilayani oleh struktur biaya aktivitas.<br>Misal: panitia 5 orang hanya dapat melayani maksimal 120 peserta, lebih dari 120 peserta diperlukan kepanitiaan baru."><i class="glyphicon glyphicon-question-sign"></i></a></span></td>
                      </tr>
                      <tr>
                        {{-- <td><input class="cekdrive1" type="checkbox" id="cekdrive1" checked disabled></td> --}}
                        <td>1</td>
                        <td><select class="form-control id_satuan1" name="id_satuan1" id="id_satuan1" required="required" ></select>
                        </td>
                        <td><select class="form-control id_satuan1_derivatif" name="id_satuan1_derivatif" id="id_satuan1_derivatif"></select>
                        </td>
                        <td><input type="number" step="any" min="0" class="form-control angka" id="range_max" name="range_max" required="required" ></td>
                        <td><input type="number" step="any" min="0" class="form-control angka" id="kapasitas_max" name="kapasitas_max" required="required" ></td>
                      </tr>
                      <tr>
                        {{-- <td><input class="cekdrive2" type="checkbox" id="cekdrive2"></td> --}}
                        <td>2</td>
                        <td><select class="form-control id_satuan2" name="id_satuan2" id="id_satuan2"></select></td>
                        <td><select class="form-control id_satuan2_derivatif" name="id_satuan2_derivatif" id="id_satuan2_derivatif"></select></td>
                        <td><input type="number" step="any" min="0" class="form-control angka" id="range_max1" name="range_max1"></td>
                        <td><input type="number" step="any" min="0" class="form-control angka" id="kapasitas_max1" name="kapasitas_max1"></td>
                      </tr>
                    </tbody>
              </table>
              </div>
              </div>
              <div class="form-group">
                <label for="ur_diskripsi" class="col-sm-3 control-label" align='left'>Deskripsi Aktivitas :</label>
                <div class="col-sm-9">
                  <textarea type="text" class="form-control" rows="3" id="ur_diskripsi" name="ur_diskripsi" data-toggle="popover" data-html="true" data-container="body" title="Perkada dan Aktivitas ASB" data-trigger="hover" data-content="Diisi definisi operasional dan prasyarat yang diperlukan untuk menjalankan aktivitas."></textarea>
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
                        <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
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
                <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border"  style="color:red;" aria-hidden="true"></i>
                Yakin akan menghapus Aktivitas <strong><span class="ur_aktivitas_del"></span></strong> yang terdapat dalam Perkada Nomor : <strong><span class="no_perkada_aktiv_del"></span></strong> ?
                <br>
                <br>
                <strong>Catatan : Penghapusan data ini mempengaruhi terhadap data turunannya yang ada ikut terhapus.....!!!!</strong> 
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
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> --}}
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="{{ route('TambahKomponenASB') }}" method="post" onsubmit="return false;">
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
                  <input type="text" class="form-control" id="nm_komponen" name="nm_komponen" required="required" >
                </div>
                <span><a data-container="body" data-trigger="hover" data-html="true" data-toggle="popover" title="Perkada dan Aktivitas ASB" data-content="Diisi pengelompokan biaya pembentuk aktivitas yang memiliki sifat biaya serupa.<br>Misal: makan/minum peserta pelatihan"><i class="glyphicon glyphicon-question-sign"></i></a></span>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-4" for="nm_rekening_komp">Rekening Komponen :</label>
                <div class="col-sm-7">
                  <div class="input-group">
                    <input type="hidden" class="form-control" id="id_rekening_komp" name="id_rekening_komp" required="required" >
                    <input type="text" class="form-control" id="nm_rekening_komp" name="nm_rekening_komp" disabled>
                    <div class="input-group-btn">
                      <button class="btn btn-primary" data-toggle="modal" href="#cariRekening"><i class="glyphicon glyphicon-search"></i></button>
                    </div>                    
                  </div>                  
                </div>
                <span><a data-toggle="popover" data-html="true" data-container="body" title="Perkada dan Aktivitas ASB" data-trigger="hover" data-content="Dipilih dari ke parameter rekening; satu rekening untuk satu komponen."><i class="glyphicon glyphicon-question-sign"></i></a></span>
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
              <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border"  style="color:red;" aria-hidden="true"></i>
                Yakin akan menghapus Komponen <strong><span class="ur_komponen_del"></span></strong> yang terdapat dalam Aktivitas : <strong><span class="ur_aktiv_komp_del"></span></strong> ?
                <br>
                <br>
                <strong>Catatan : Penghapusan data ini mempengaruhi terhadap data turunannya yang ada ikut terhapus.....!!!!</strong> 
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
  <div id="ModalRincian" class="modal fade" role="dialog" data-focus-on="input:first" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> --}}
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form name="frmModalRincian" class="form-horizontal" role="form" autocomplete='off' action="{{ route('TambahRincianASB') }}" method="post" onsubmit="return false;">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" id="id_komponen_asb_rinci" name="id_komponen_asb_rinci" align='left'>
              <div class="form-group">
              <div class="col-sm-12">
              <table class="table" width="100%">
                    <tbody>
                      <tr>
                        <td colspan="3" ><label align='left'>Nomor Perkada ASB </label></td>
                        <td colspan="5"><label id="idperkada_rinc"></label></td>
                      </tr>
                      <tr>
                        <td colspan="3" ><label class="control-label" for="id_kel_rinc" align='left'>Kelompok </label></td>
                        <td colspan="5"><label class="control-label" id="idkel_rinc" align='left'></label>
                            <input type="hidden" id="id_kel_rinc" name="id_kel_rinc"></td>
                      </tr>
                      <tr>
                        <td colspan="3" ><label class="control-label" for="id_subkel_rinc" align='left'>Sub Kelompok </label></td>
                        <td colspan="5"><label class="control-label" id="idsubkel_rinc" align='left'></label>
                            <input type="hidden" id="id_subkel_rinc" name="id_subkel_rinc"></td>
                      </tr>
                      <tr>
                        <td colspan="3" ><label class="control-label" for="id_subsubkel_rinc" align='left'>Sub Sub Kelompok </label></td>
                        <td colspan="5"><label class="control-label" id="idsubsubkel_rinc" align='left'></label>
                            <input type="hidden" id="id_subsubkel_rinc" name="id_subsubkel_rinc" align='left'></td>
                      </tr>
                      <tr>
                        <td colspan="3" ><label class="control-label" for="id_aktiv_rinc" align='left'>Aktivitas </label></td>
                        <td colspan="5"><label class="control-label" id="idaktivitas_rinc" align='left'></label>
                            <input type="hidden" id="id_aktiv_rinc" name="id_aktiv_rinc"></td>
                      </tr>
                      <tr>
                        <td colspan="3" ><label class="control-label" for="id_komponen_rinc" align='left'>Komponen </label></td>
                        <td colspan="5"><label class="control-label" id="idkomponen_rinc" align='left'></label>
                            <input type="hidden" id="id_komponen_rinc" name="id_komponen_rinc"></td>
                      </tr>
                      <tr>
                        <td colspan="3" >
                          <label for="ket_rinci" class="control-label" align='left'>Group Rincian </label></td>
                        <td colspan="5">
                                <div class="col-sm-10">
                                  <input type="text" list="searchresults" class="form-control" id="ket_rinci" name="ket_rinci" autocomplete="off">
                                  <datalist id="searchresults" name="searchresults"></datalist>
                                </div>                                
                                <span><a href="#" data-toggle="popover" data-html="true" data-container="body" title="Perkada dan Aktivitas ASB" data-trigger="hover" data-content="Opsional, boleh dikosongkan.<br>untuk mengelompokkan rincian komponen agar lebih rapi dalam pencetakan.<br>misal: kelompok upah, di bawahnya ada rincian upah tukang, mandor, kepala tukang, dsb."><i class="glyphicon glyphicon-question-sign"></i></a></span>

                        </td>                        
                      </tr>
                      <tr>
                        <td colspan="3" ><label class="control-label" for="id_tarif_ssh" align='left'>Item SSH </label></td>
                        <td colspan="5">
                              <div class="col-sm-10">
                              <div class="input-group">
                                <input type="hidden" id="id_tarif_ssh" name="id_tarif_ssh" required="required" >
                                <input type="text" class="form-control" id="ur_tarif_ssh" name="ur_tarif_ssh" disabled>
                                <div class="input-group-btn">
                                  <button class="btn btn-primary" data-toggle="modal" href="#cariItemSSH"><i class="glyphicon glyphicon-search"></i></button>
                                </div>
                              </div>
                              </div>
                              <span><a href="#" data-toggle="popover" data-html="true" data-container="body" title="Perkada dan Aktivitas ASB" data-trigger="hover" data-content="Dikaitkan ke item di SSH. Nilai item di SSH akan digunakan dalam perhitungan nilai ASB."><i class="glyphicon glyphicon-question-sign"></i></a></span>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="3"><label for="jns_biaya" class="control-label" align='left'>Sifat Biaya</label></td>
                        <td colspan="5">
                            <label class="radio-inline">
                              <input type="radio" class="jns_biaya" name="jns_biaya" id="jns_biaya" value="1">Fixed Cost
                            </label>
                            <label class="radio-inline hidden">
                              <input type="radio" class="jns_biaya" name="jns_biaya" id="jns_biaya" value="3">Independent Variable
                            </label>
                            <label class="radio-inline">
                              <input type="radio" class="jns_biaya" name="jns_biaya" id="jns_biaya" value="2">Variable Cost
                              &nbsp;&nbsp;&nbsp;&nbsp
                              <span><a data-container="body" data-trigger="hover" data-html="true" data-toggle="popover" title="Perkada dan Aktivitas ASB" data-content="Fix Cost: tidak dipengaruhi cost driver<br>Independent: dipengaruhi cost driver, menggunakan satuan sesuai cost driver<br>Dependent: dipengaruhi range cost driver, menggunakan satuan derivatif"><i class="glyphicon glyphicon-question-sign"></i></a></span>
                            </label>
                            
                        </td>                        
                      </tr>
                      <tr>
                        <td colspan="3">
                          <label for="hub_driver" class="control-label" align='left'>Hubungan Pemicu Biaya
                          &nbsp;&nbsp;&nbsp;&nbsp
                          <span><a data-container="body" data-trigger="hover" data-html="true" data-toggle="popover" title="Perkada dan Aktivitas ASB" data-content="Keterkaitan dependent/independent variable terhadap cost driver."><i class="glyphicon glyphicon-question-sign"></i></a></span>
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
                        <td colspan="2"><input type="number" step="any" min="0" lang="id-ID" class="form-control angka" id="koefisien1" name="koefisien1" required="required"></td>
                        <td colspan="2"><input type="number" step="any" min="0" lang="id-ID" class="form-control angka" id="koefisien2" name="koefisien2" required="required" ></td>
                        <td colspan="2"><input type="number" step="any" min="0" lang="id-ID" class="form-control angka" id="koefisien3" name="koefisien3" required="required" ></td>
                      </tr>
                      <tr>
                        <td colspan="2">Satuan</td>
                        <td colspan="2"><select class="form-control id_satuan1_rinc" name="id_satuan1_rinc" id="id_satuan1_rinc" required="required"></select></td>
                        <td colspan="2"><select class="form-control id_satuan2_rinc" name="id_satuan2_rinc" id="id_satuan2_rinc" required="required" ></select></td>
                        <td colspan="2"><select class="form-control id_satuan3_rinc" name="id_satuan3_rinc" id="id_satuan3_rinc" required="required" ></select></td>
                      </tr>
                      {{-- <tr class="hidden">
                        <td colspan="2">Derivatif</td>
                        <td colspan="2"><select class="form-control id_satuan1_der" name="id_satuan1_der" id="id_satuan1_der"></select></td>
                        <td colspan="4"></td>
                      </tr> --}}
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
              <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border"  style="color:red;" aria-hidden="true"></i>
                Yakin akan menghapus Rincian <strong><span class="ur_rincian_del"></span></strong> yang terdapat dalam Komponen <strong><span class="ur_komp_rinc_del"></span></strong> ?
                <br>
                <br>
                <strong>Catatan : Penghapusan data ini mempengaruhi terhadap data turunannya yang ada ikut terhapus.....!!!!</strong> 
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
  <div class="modal-dialog modal-lg"  >
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
            <input type="text" list="tempCariItem" class="form-control" id="param_cari" name="param_cari" placeholder="kata_kunci_item_ssh">
            <datalist id="tempCariItem" name="tempCariItem"></datalist>
            <div class="input-group-btn">
              <button class="btn btn-primary" id="btnparam_cari" name="btnparam_cari"><i class="fa fa-search fa-fw fa-lg"></i></button>
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
                  <th width="25%" style="text-align: center; vertical-align:middle">Merk/Spesifikasi/Keterangan Lainnya</th>
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
  <div id="cariKomponen" class="modal fade" role="dialog" tabindex="-1" data-focus-on="input:first" data-backdrop="static">
  <div class="modal-dialog modal-lg"  >
  <div class="modal-content">
  <div class="modal-header">
      <h3>Daftar Komponen ASB</h3>
  </div>
  <div class="modal-body">
  <form name="frmCariKomponen" class="form-horizontal" role="form" autocomplete='off' action="" method="" >
   <div class="form-group">
   <input type="hidden" name="_token" value="{{ csrf_token() }}">
   <div class="col-sm-12">
      <table id='tblCariKomponen' class="table display compact table-striped table-bordered" cellspacing="0" width="100%">
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
          {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
            <h4> Copy Data Kelompok Analisis Standar Belanja</h4>
        </div>
      <div class="modal-body">
          <form name="frmModalCopyASB" class="form-horizontal" role="form" autocomplete='off' action="" method="" >
              <div class="form-group">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="col-sm-12">
                <table id='tblCariKelompok' class="table display compact table-striped table-bordered" cellspacing="0" width="100%">
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
    <div class="modal-dialog modal-lg"  >
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
                  <input type="test" class="form-control number" id="v1_simulasi" name="v1_simulasi" style="text-align: right;">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="id_perkada">Volume Pemicu Biaya 2 :</label>
                <div class="col-sm-2">
                  <input type="test" class="form-control number" id="v2_simulasi" name="v2_simulasi" style="text-align: right;">
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
                        <button type="button" class="btn  btn-success btnSimulasi btn-labeled" data-dismiss="modal" >
                            <span class="btn-label"><i id="fooSimulasi" class="fa fa-print fa-fw fa-lg"></i></span>Cetak Aktivitas ASB</button>
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


<div id="ModalProgress" class="modal fade modal-static" role="dialog" data-backdrop="static" role="dialog" aria-hidden="true">
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
<script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {

  var id_sk_asb;
  var id_kel_asb;
  var id_subkel_asb;
  var id_ssubkel_asb;
  var id_aktiv_asb;
  var id_komp_asb;
  var id_rinci_asb;
  var nm_sk_asb;
  var nm_kel_asb;
  var nm_subkel_asb;
  var nm_ssubkel_asb;
  var nm_aktiv_asb;
  var nm_komp_asb;
  var nm_rinci_asb;
  var flag_perkada;

  var hub_driver1,hub_driver2,hub_driver3,hub_driver4,hub_driver5,hub_driver6,hub_driver7,hub_driver8;
  var n_driver,n_driver,n_driver2,n_driver3,n_driver4,n_driver5,n_driver6,n_driver7;

function createPesan(message, type) {
    var html = '<div id="pesanx" class="alert alert-' + type + ' alert-dismissable flyover flyover-bottom in">';    
    html += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
    html += message;
    html += '</div>';    
    $(html).hide().prependTo('#pesan').slideDown();
    
    setTimeout(function() {
            $('#pesanx').removeClass('in');
         }, 3500);
  };

$('.page-alert .close').click(function(e) {
        e.preventDefault();
        $(this).closest('.page-alert').slideUp();
    });

$('.number').number(true,2,',', '.');
$('#thn_perkada').number(true,0,'', '');

$('#tgl_perkada').datepicker({
  altField: "#tgl_perkada1",
  altFormat: "yy-mm-dd", 
  dateFormat: "dd MM yy"
});

$('#tgl_perkada_edit').datepicker({
  altField: "#tgl_perkada1_edit",
  altFormat: "yy-mm-dd", 
  dateFormat: "dd MM yy"
});

function formatTgl(val_tanggal){
  var formattedDate = new Date(val_tanggal);
  var d = formattedDate.getDate();
  var m = formattedDate.getMonth();
  var y = formattedDate.getFullYear();
  var m_names = new Array("Januari", "Februari", "Maret", 
    "April", "Mei", "Juni", "Juli", "Agustus", "September", 
    "Oktober", "November", "Desember")

  var tgl= d + " " + m_names[m] + " " + y;
  return tgl;
}


  if (flag_perkada == null && flag_perkada === undefined ){
    document.getElementById("btnTambahKel").style.visibility='hidden';
    document.getElementById("btnTambahSubKel").style.visibility='hidden';
    document.getElementById("btnTambahAktivitas").style.visibility='hidden';
    document.getElementById("btnTambahKomponen").style.visibility='hidden';
    document.getElementById("btnCopyKomponen").style.visibility='hidden';
    document.getElementById("btnTambahRincian").style.visibility='hidden';
    document.getElementById("btnCopyASB").style.visibility='hidden';
  }

  var list = document.getElementsByClassName("angka");

  for (var i = 0; i < list.length; i++) {
      var number = list[i];
      number.onkeydown = function(e) {
          if(!((e.keyCode > 95 && e.keyCode < 106)
            || (e.keyCode > 47 && e.keyCode < 58) 
            || e.keyCode == 8 
            || e.keyCode == 188
            || e.keyCode == 9
            || e.keyCode == 190)) {
              return false;
          }
  }
  }

  

  $('[data-toggle="popover"]').popover();


function rekomCari(){
  $.ajax({
      type: "GET",
      url: './getGrouping',
      dataType: "json",
      success: function(data) {

        var j = data.length;
        var post, i;

        $('datalist[name="searchresults"]').empty();
        for (i = 0; i < j; i++) {
          post = data[i];
          $('datalist[name="searchresults"]').append('<option value="'+ post.ket_group +'"/>');
        }
      }
    });
};

$('input:text[datalist][multiple]').each(function() {
    var elem = $(this),
        list = $(document.getElementById(elem.attr('datalist')));
    elem.autocomplete({
        source: list.children().map(function() {
            return $(this).text();
        }).get()
    });
});

$('datalist[name="tempCariItem"]').empty();


  var perkada = $('#tblPerkada').DataTable( {
      processing: true,
      serverSide: true,
      dom: 'bFrtip',
        "ajax": {"url":"./getPerkada"},
        "columns": [
            { data: 'no_urut', sClass: "dt-center"},
            { data: 'nomor_perkada'},
            { data: 'tanggal_perkada',
              render: function (data) {
              var date = new Date(data);
              return date.getDate() + "-" + (date.getMonth()+1) + "-" + date.getFullYear();
            }},
            { data: 'uraian_perkada'},
            { data: 'flag_display'},
            { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
            ]
  } );

  $('#tblPerkada tbody').on( 'dblclick', 'tr', function () {

    var data = perkada.row(this).data();

    id_sk_asb =  data.id_asb_perkada;
    nm_sk_asb =  data.nomor_perkada;
    flag_perkada = data.flag;

    // if($('.nav-tabs a.active')=false){
    if (flag_perkada ==0 ){
        document.getElementById("btnTambahKel").style.visibility='visible';
        document.getElementById("btnCopyASB").style.visibility='visible';
      } else {
        document.getElementById("btnTambahKel").style.visibility='hidden';
        document.getElementById("btnCopyASB").style.visibility='hidden';
      };
    // };
    document.getElementById("no_perkada_kel").innerHTML = data.nomor_perkada;

    
    $('.nav-tabs a[href="#kelompok"]').tab('show');
    $('#tblKelompok').DataTable().ajax.url("./getKelompok/"+id_sk_asb).load();

  } );

  var kelompok = $('#tblKelompok').DataTable( {
      processing: true,
      serverSide: true,
      "autoWidth": false,
      dom: 'BFrtip',
        "ajax": {"url":"./getKelompok/0"},
        "columns": [
            { data: 'no_urut', sClass: "dt-center",width:"10px"},
            { data: 'uraian_kelompok_asb'},
            { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center",width:"50px" }
            ]
  } );

  $('#tblKelompok tbody').on( 'dblclick', 'tr', function () {

    var data = kelompok.row(this).data();

    id_sk_asb =  data.id_asb_perkada;
    nm_sk_asb =  data.nomor_perkada;
    flag_perkada = data.flag;
    id_kel_asb = data.id_asb_kelompok;
    nm_kel_asb = data.uraian_kelompok_asb;
    // if($('.nav-tabs a.active')=false){
      if (flag_perkada ==0 ){
        document.getElementById("btnTambahSubKel").style.visibility='visible';
      } else {
        document.getElementById("btnTambahSubKel").style.visibility='hidden';
      };
    // };
    document.getElementById("no_perkada_subkel").innerHTML =data.nomor_perkada;
    document.getElementById("nm_kel_subkel").innerHTML =data.uraian_kelompok_asb;
    
    $('.nav-tabs a[href="#subkelompok"]').tab('show');
    $('#tblSubKelompok').DataTable().ajax.url("./getSubKelompok/"+id_kel_asb).load();

  } );


  var subkelompok = $('#tblSubKelompok').DataTable( {
      processing: true,
      serverSide: true,
      "autoWidth": false,
      dom: 'BFrtip',
        "ajax": {"url":"./getSubKelompok/0"},
        "columns": [
            { data: 'no_urut', sClass: "dt-center", width:"10px"},
            { data: 'uraian_sub_kelompok_asb'},
            { data: 'action', 'searchable': false, 'orderable':false , sClass: "dt-center",width:"50px"}
            ]
  } );

  $('#tblSubKelompok tbody').on( 'dblclick', 'tr', function () {

    var data = subkelompok.row(this).data();

    id_sk_asb =  data.id_asb_perkada;
    nm_sk_asb =  data.nomor_perkada;
    flag_perkada = data.flag;
    id_kel_asb = data.id_asb_kelompok;
    nm_kel_asb = data.uraian_kelompok_asb;
    id_subkel_asb = data.id_asb_sub_kelompok;
    nm_subkel_asb = data.uraian_sub_kelompok_asb;

    // if($('.nav-tabs a.active')=false){
      if (flag_perkada ==0 ){
        document.getElementById("btnTambahSubSubKel").style.visibility='visible';
      } else {
        document.getElementById("btnTambahSubSubKel").style.visibility='hidden';
      };
    // };
    document.getElementById("no_perkada_sskel").innerHTML =data.nomor_perkada;
    document.getElementById("nm_kel_sskel").innerHTML =data.uraian_kelompok_asb;
    document.getElementById("nm_subkel_sskel").innerHTML =data.uraian_sub_kelompok_asb;

    $('.nav-tabs a[href="#subsubkelompok"]').tab('show');
    $('#tblSubSubKelompok').DataTable().ajax.url("./getSubsubkel/"+id_subkel_asb).load();

  } );

  var ssubkelompok = $('#tblSubSubKelompok').DataTable( {
      processing: true,
      serverSide: true,
      "autoWidth": false,
      dom: 'BFrtip',
        "ajax": {"url":"./getSubsubkel/0"},
        "columns": [
            { data: 'no_urut', sClass: "dt-center",width:"10px"},
            { data: 'uraian_sub_sub_kelompok_asb'},
            { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center",width:"50px" }
            ]
  } );

  $('#tblSubSubKelompok tbody').on( 'dblclick', 'tr', function () {

    var data = ssubkelompok.row(this).data();

    id_sk_asb =  data.id_asb_perkada;
    nm_sk_asb =  data.nomor_perkada;
    flag_perkada = data.flag;
    id_kel_asb = data.id_asb_kelompok;
    nm_kel_asb = data.uraian_kelompok_asb;
    id_subkel_asb = data.id_asb_sub_kelompok;
    nm_subkel_asb = data.uraian_sub_kelompok_asb;
    id_ssubkel_asb = data.id_asb_sub_sub_kelompok;
    nm_ssubkel_asb = data.uraian_sub_sub_kelompok_asb;

    // if($('.nav-tabs a.active')=false){
     if (flag_perkada ==0 ){
        document.getElementById("btnTambahAktivitas").style.visibility='visible';
      } else {
        document.getElementById("btnTambahAktivitas").style.visibility='hidden';
      };
    // };
    document.getElementById("no_perkada_aktiv").innerHTML =data.nomor_perkada;
    document.getElementById("nm_kel_aktiv").innerHTML =data.uraian_kelompok_asb;
    document.getElementById("nm_subkel_aktiv").innerHTML =data.uraian_sub_kelompok_asb;
    document.getElementById("nm_subsubkel_aktiv").innerHTML =data.uraian_sub_sub_kelompok_asb;

    $('.nav-tabs a[href="#detailaktivitas"]').tab('show');
    $('#tblAktivitas').DataTable().ajax.url("./getAktivitas/"+id_ssubkel_asb).load();

  } );

  var aktivitas = $('#tblAktivitas').DataTable( {
        // retrieve: true,
        processing: true,
        serverSide: true,
        dom: 'BFrtip',
        "autoWidth": false,
        "ajax": {"url": "./getAktivitas/0"},
        "columns": [
              { data: 'no_urut', sClass: "dt-center",width:"10px"},
              { data: 'nm_aktivitas_asb'},
              { data: 'driver1', sClass: "dt-center",width:"80px"},
              { data: 'driver2', sClass: "dt-center",width:"80px"},
              // { data: 'kapasitas_max'},
              { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center",width:"50px" }
              ]
  });

  $('#tblAktivitas tbody').on( 'dblclick', 'tr', function () {

    var data = aktivitas.row(this).data();

    id_sk_asb =  data.id_asb_perkada;
    nm_sk_asb =  data.nomor_perkada;
    flag_perkada = data.flag;
    id_kel_asb = data.id_asb_kelompok;
    nm_kel_asb = data.uraian_kelompok_asb;
    id_subkel_asb = data.id_asb_sub_kelompok;
    nm_subkel_asb = data.uraian_sub_kelompok_asb;
    id_aktiv_asb = data.id_aktivitas_asb;
    nm_aktiv_asb = data.nm_aktivitas_asb;
    id_ssubkel_asb = data.id_asb_sub_sub_kelompok;
    nm_ssubkel_asb = data.uraian_sub_sub_kelompok_asb;
    
    // if($('.nav-tabs a.active')=false){
      if (flag_perkada ==0 ){
        document.getElementById("btnTambahKomponen").style.visibility='visible';
        document.getElementById("btnCopyKomponen").style.visibility='visible';
      } else {
        document.getElementById("btnTambahKomponen").style.visibility='hidden';
        document.getElementById("btnCopyKomponen").style.visibility='hidden';
      };
    // };
    document.getElementById("no_perkada_komp").innerHTML =data.nomor_perkada;
    document.getElementById("nm_kel_komp").innerHTML =data.uraian_kelompok_asb;
    document.getElementById("nm_subkel_komp").innerHTML =data.uraian_sub_kelompok_asb;
    document.getElementById("nm_subsubkel_komp").innerHTML =data.uraian_sub_sub_kelompok_asb;
    document.getElementById("nm_aktiv_komp").innerHTML =data.nm_aktivitas_asb;

    $('.nav-tabs a[href="#detailkomponen"]').tab('show');
    $('#tblKomponen').DataTable().ajax.url("./getKomponen/"+id_aktiv_asb).load();

  } );

  var komponen = $('#tblKomponen').DataTable( {
        // retrieve: true,
        processing: false,
        serverSide: false,
        dom: 'BFrtip',
        "autoWidth": false,
        "ajax": {"url": "./getKomponen/0"},
        "columns": [
              { data: 'no_urut', sClass: "dt-center",width:"10px"},
              { data: 'nm_komponen_asb'},
              { data: 'kd_rekening', sClass: "dt-center"},
              { data: 'nm_rekening'},
              { data: 'action', 'searchable': false, 'orderable':false , sClass: "dt-center",width:"50px"}
            ]
  });

  $('#tblKomponen tbody').on( 'dblclick', 'tr', function () {

    var data = komponen.row(this).data();

    // console.log(data);

    id_sk_asb =  data.id_asb_perkada;
    nm_sk_asb =  data.nomor_perkada;
    flag_perkada = data.flag;
    id_kel_asb = data.id_asb_kelompok;
    nm_kel_asb = data.uraian_kelompok_asb;
    id_subkel_asb = data.id_asb_sub_kelompok;
    nm_subkel_asb = data.uraian_sub_kelompok_asb;
    id_aktiv_asb = data.id_aktivitas_asb;
    nm_aktiv_asb = data.nm_aktivitas_asb;
    id_komp_asb = data.id_komponen_asb;
    nm_komp_asb = data.nm_komponen_asb;
    id_ssubkel_asb = data.id_asb_sub_sub_kelompok;
    nm_ssubkel_asb = data.uraian_sub_sub_kelompok_asb;

    hub_driver1=data.driver1;
    hub_driver2=data.driver2;
    hub_driver3=data.driver3;
    hub_driver4=data.driver4;
    hub_driver5=data.driver5;
    hub_driver6=data.driver6;
    hub_driver7=data.driver7;
    hub_driver8=data.driver8;

    n_driver=data.jml_driver;
    n_driver1=data.id_satuan_1;
    n_driver2=data.id_satuan_2;
    n_driver3=data.sat_derivatif_1;
    n_driver4=data.sat_derivatif_2;

    if (flag_perkada ==0 ){
        document.getElementById("btnTambahRincian").style.visibility='visible';
    } else {
        document.getElementById("btnTambahRincian").style.visibility='hidden';
    };

    document.getElementById("no_perkada_rinc").innerHTML =data.nomor_perkada;
    document.getElementById("nm_kel_rinc").innerHTML =data.uraian_kelompok_asb;
    document.getElementById("nm_subkel_rinc").innerHTML =data.uraian_sub_kelompok_asb;
    document.getElementById("nm_subsubkel_rinc").innerHTML =data.uraian_sub_sub_kelompok_asb;
    document.getElementById("nm_aktiv_rinc").innerHTML =data.nm_aktivitas_asb;
    document.getElementById("nm_komp_rinc").innerHTML =data.nm_komponen_asb;

    $('.nav-tabs a[href="#detailrincian"]').tab('show');
    $('#tblRincian').DataTable().ajax.url("./getRincian/"+id_komp_asb).load();

  } );

  var rincian = $('#tblRincian').DataTable( {
        // retrieve: true,
        processing: true,
        serverSide: true,
        dom: 'BFrtip',
        "autoWidth": false,
        "ajax": {"url": "./getRincian/0"},
        "language": {
              "decimal": ",",
              "thousands": "."},
        "columns": [
          { data: 'no_urut', sClass: "dt-center",width:"10px"},
          { data: 'uraian_tarif_ssh'},
          { data: 'biaya_display', sClass: "dt-center"},
          { data: 'koefisien1',
                render: $.fn.dataTable.render.number( '.', ',', 4, '' ), sClass: "dt-center",width:"80px"},
          { data: 'koefisien2',
                render: $.fn.dataTable.render.number( '.', ',', 4, '' ), sClass: "dt-center",width:"80px"},
          { data: 'koefisien3',
                render: $.fn.dataTable.render.number( '.', ',', 4, '' ), sClass: "dt-center",width:"80px"},
          { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center",width:"50px"}
              ],
        "order": [[0, 'asc']],
        "bDestroy": true
  });

  var rekening = $('#tblRekening').DataTable( {
        // retrieve: true,
        processing: true,
        serverSide: true,
        dom: 'BfrtIp',
        "autoWidth": false,
        "ajax": {"url": "./getRekening"},
        "columns": [
              { data: 'no_urut', sClass: "dt-center",width:"10px"},
              { data: 'kd_rekening', sClass: "dt-center",width:"50px"},
              { data: 'nm_rekening'}
            ],
        "order": [[0, 'asc']],
        "bDestroy": true
  });

var itemSSH

$(document).on('click', '#btnparam_cari', function() {

  param=$('#param_cari').val();
  $('datalist[name="tempCariItem"]').append('<option value="'+ $('#param_cari').val() +'"/>');

  itemSSH = $('#tblItemSSH').DataTable( {
        // retrieve: true,
        processing: true,
        serverSide: true,
        dom: 'BFrtIp',
        "autoWidth": false,
        "ajax": {"url": "./getItemSSH/"+ param.toLowerCase()},
        "columns": [
              { data: 'no_urut', sClass: "dt-center",width:"10px"},
              { data: 'uraian_sub_kelompok_ssh'},
              { data: 'uraian_tarif_ssh'},
              { data: 'keterangan_tarif_ssh'},
              { data: 'uraian_satuan', sClass: "dt-center",width:"100px"},
              { data: 'jml_rupiah', sClass: "dt-right",
                render: $.fn.dataTable.render.number( '.', ',', 0, 'Rp ' )}
            ],
        "order": [[0, 'asc']],
        "bDestroy": true
  });

});


  var carikomponen = $('#tblCariKomponen').DataTable( {
        // retrieve: true,
        processing: true,
        serverSide: true,
        dom: 'BfrtIp',
        "autoWidth": false,
        "ajax": {"url": "./getCariKomponen"},
        'columnDefs': [
           {
              'width': "10px",
              'targets': 0,
              'checkboxes': {
                 'selectRow': true
              },
               'searchable': false, 
               'orderable':false
           }
          ],
        'select': {
           'style': 'multi'
          },
        "columns": [
              { data: 'id_komponen_asb', sClass: "dt-center"},
              { data: 'no_urut', sClass: "dt-center",width:"5%"},
              { data: 'nm_komponen_asb',width:"30%"},
              { data: 'nm_rekening',width:"50%"}
            ],
        "order": [[0, 'asc']],
        "bDestroy": true
    });

  var carikelompok = $('#tblCariKelompok').DataTable( {
        // retrieve: true,
        processing: true,
        serverSide: true,
        dom: 'BfrtIp',
        "autoWidth": false,
        "ajax": {"url": "./getCariKelompok"},
        'columnDefs': [
           {
              'width': 10,
              'targets': 0,
              'checkboxes': {
                 'selectRow': true
              }
           },
           {
                "targets": 1,
                "width": 10
            }
          ],
        'select': {
           'style': 'multi'
          },
        "columns": [
              { data: 'id_asb_kelompok', sClass: "dt-center", searchable: false, orderable:false,},
              { data: 'no_urut', sClass: "dt-center"},
              { data: 'uraian_kelompok_asb'}
            ],
        "order": [[0, 'asc']],
        "bDestroy": true
    });
    

  $('#tblRekening tbody').on( 'dblclick', 'tr', function () {

    var data = rekening.row(this).data();

    document.getElementById("nm_rekening_komp").value = data.kd_rekening + '--' + data.nm_rekening;
    document.getElementById("id_rekening_komp").value = data.id_rekening;


    $('#cariRekening').modal('hide');    

  } );

  $('#tblItemSSH tbody').on( 'dblclick', 'tr', function () {

    var data = itemSSH.row(this).data();

    document.getElementById("id_tarif_ssh").value = data.id_tarif_ssh;
    document.getElementById("ur_tarif_ssh").value = data.uraian_tarif_ssh;
    document.getElementById("id_satuan1_rinc").value = data.id_satuan;

    $('#cariItemSSH').modal('hide');    

  } );

  $(function () {
        $('#tgl_perkada').datepicker({
          // changeMonth: true,
          // changeYear: true,
          altField: "#tgl_perkada1",
          altFormat: "yy-mm-dd"
        });
        $( "#tgl_perkada" ).datepicker( "option", "dateFormat", "dd MM yy" );
      });

  $(function () {
      $('#tgl_perkada_edit').datepicker({
        altField: "#tgl_perkada1_edit",
        altFormat: "yy-mm-dd"
        });
      $( "#tgl_perkada_edit" ).datepicker( "option", "dateFormat", "dd MM yy" );
  });

  // $(document).on('click', '.btnCariRekening', function(event) {
  //   $('#tblRekening').DataTable().ajax.url("./getRekening/"+$('#txt_cari_rekening').val()).load();
  //   event.preventDefault();
  // });

  //tambah perkada
  $(document).on('click', '.add-perkada', function() {
    $('#footer_action_button1').addClass('glyphicon-plus');
    $('#footer_action_button1').removeClass('glyphicon-trash');
    $('.actionBtn1').addClass('btn-success');
    $('.actionBtn1').removeClass('btn-danger');
    $('.actionBtn').removeClass('editPerkada');
    $('.actionBtn1').addClass('addPerkada');
    $('.modal-title').text('Tambah Data Peraturan Kepala Daerah tentang ASB');
    $('.form-horizontal').show();
    $('#TambahPerkada').modal('show');
  });

  $('.modal-footer').on('click', '.addPerkada', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });
      $('#ModalProgress').modal('show');
      $.ajax({
          type: "GET",
          url: './getCountStatus/0',
          dataType: "json",
          success: function(data) {
            if (data[0].status_flag == 0 ){
               $.ajax({
                  type: 'post',
                  url: './addPerkada',
                  data: {
                      '_token': $('input[name=_token]').val(),
                      'no_perkada': $('#no_perkada').val(),
                      'tgl_perkada': $('#tgl_perkada1').val(),
                      'thn_perkada': $('#thn_perkada').val(),
                      'ur_perkada': $('#ur_perkada').val(),
                  },
                  success: function(data) {
                      $('#tblPerkada').DataTable().ajax.reload(null,false);
                      createPesan("Proses Tambah Data Berhasil","success");
                      $('#ModalProgress').modal('hide');
                  },
                });
            } else {
              createPesan("Maaf Status Draft Hanya Boleh Ada 1 buah, Silahkan Posting terlebih dahulu, atau diedit","danger");
              $('#ModalProgress').modal('hide');
            }
          }
      });
  });


 

  //Edit Perkada
  $(document).on('click', '.edit-perkada', function() {
    $('#footer_action_button').addClass('glyphicon-check');
    $('#footer_action_button').removeClass('glyphicon-trash');
    $('.actionBtn').addClass('btn-success');
    $('.actionBtn').removeClass('btn-danger');
    $('.actionBtn1').removeClass('addPerkada');
    $('.actionBtn').addClass('editPerkada');
    $('.modal-title').text('Edit Data Peraturan Kepala Daerah tentang ASB');
    $('.form-horizontal').show();
    $('#no_perkada_edit').val($(this).data('no_perkada'));
    $('#tgl_perkada_edit').val(formatTgl($(this).data('tgl_perkada')));
    $('#tgl_perkada1_edit').val($(this).data('tgl_perkada'));
    $('#thn_perkada_edit').val($(this).data('thn_perkada'));
    $('#ur_perkada_edit').val($(this).data('ur_perkada'));
    $('#id_perkada_edit').val($(this).data('id_perkada'));
    $('#EditPerkada').modal('show');
  });

  $('.modal-footer').on('click', '.editPerkada', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });
      $('#ModalProgress').modal('show');
      $.ajax({
          type: 'post',
          url: './editPerkada',
          data: {
              '_token': $('input[name=_token]').val(),
              'no_perkada_edit': $('#no_perkada_edit').val(),
              'tgl_perkada_edit': $('#tgl_perkada1_edit').val(),
              'thn_perkada_edit': $('#thn_perkada_edit').val(),
              'ur_perkada_edit': $('#ur_perkada_edit').val(),
              'id_perkada_edit': $('#id_perkada_edit').val(),
          },
          success: function(data) {
              $('#tblPerkada').DataTable().ajax.reload(null,false);
              createPesan("Proses Tambah Data Berhasil","success");
            $('#ModalProgress').modal('hide');
          }
      });
  });

  //status Perkada
  $(document).on('click', '.edit-status', function() {
    $('#footer_action_button').addClass('glyphicon-check');
    $('#footer_action_button').removeClass('glyphicon-trash');
    $('.actionBtn').addClass('btn-primary');
    $('.actionBtn').removeClass('btn-danger');
    $('.actionBtn').addClass('editStatus');
    $('.modal-title').text('Posting Data Peraturan Kepala Daerah tentang ASB');
    // $('.form-horizontal').hide();
    $('.uraian').html($(this).data('no_perkada'));
    $('.id_perkada').text($(this).data('id_perkada'));
    $('.flag_perkada').text($(this).data('flag_perkada')+1);
    $('#StatusPerkada').modal('show');
  });

  $('.modal-footer').on('click', '.editStatus', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });
      $('#ModalProgress').modal('show');

      $.ajax({
          type: 'post',
          url: './statusPerkada',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_perkada': $('.id_perkada').text(),
              'flag_perkada': $('.flag_perkada').text(),
          },
          success: function(data) {
              $('#tblPerkada').DataTable().ajax.reload(null,false);
              createPesan("Proses Edit Data Berhasil","success");
            $('#ModalProgress').modal('hide');
          }
      });
  });

  //Hapus Perkada
  $(document).on('click', '.delete-perkada', function() {
    $('#footer_action_button').removeClass('glyphicon-check');
    $('#footer_action_button').addClass('glyphicon-trash');
    $('.actionBtn').removeClass('btn-success');
    $('.actionBtn').addClass('btn-danger');
    $('.actionBtn').addClass('delPerkada');
    $('.modal-title').text('Hapus Data Peraturan Kepala Daerah tentang ASB');
    $('.id_perkada_hapus').text($(this).data('id_perkada'));
    // $('.form-horizontal').hide();
    $('.uraian').html($(this).data('no_perkada'));
    $('#HapusPerkada').modal('show');
  });

  $('.modal-footer').on('click', '.delPerkada', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
    $('#ModalProgress').modal('show');
    $.ajax({
      type: 'post',
      url: './hapusPerkada',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_perkada_hapus': $('.id_perkada_hapus').text()
      },
      success: function(data) {
        $('.item' + $('.id_perkada_hapus').text()).remove();
        $('#tblPerkada').DataTable().ajax.reload(null,false);
        createPesan("Proses Hapus Data Berhasil","success");
            $('#ModalProgress').modal('hide');
      }
    });
  });

  //tambah Aktivitas
  $(document).on('click', '.add-aktivitas', function() {
    $('.btnAddAktiv').addClass('btn-success');
    $('.btnAddAktiv').removeClass('btn-danger');
    $('.btnAddAktiv').removeClass('editAktivitas');
    $('.btnAddAktiv').addClass('addAktivitas');
    $('.modal-title').text('Tambah Data Aktivitas ASB');
    $('.form-horizontal').show();
    $('#id_perkada_aktiv'). val(id_sk_asb);
    $('#id_kel_aktiv'). val(id_kel_asb);
    $('#id_subkel_aktiv'). val(id_subkel_asb);
    $('#id_subsubkel_aktiv'). val(id_ssubkel_asb);
    $('#id_satuan1').val(-1);
    $('#id_satuan2').val(-1);
    $('#range_max').val(1);
    $('#range_max1').val(1);
    $('#kapasitas_max').val(1);
    $('#kapasitas_max1').val(1);
    $('#ur_diskripsi').val(null);
    $('#nm_aktivitas').val(null);
    document.getElementById("idperkada_aktiv").innerHTML = nm_sk_asb;
    document.getElementById("idkel_aktiv").innerHTML = nm_kel_asb;
    document.getElementById("idsubkel_aktiv").innerHTML = nm_subkel_asb;
    document.getElementById("idsubsubkel_aktiv").innerHTML = nm_ssubkel_asb;
    $('#ModalAktivitas').modal('show');
    // rekomCari();
  });

  $('.modal-footer').on('click', '.addAktivitas', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });
      $('#ModalProgress').modal('show');
      $.ajax({
          type: 'post',
          url: './addAktivitas',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_asb_sub_sub_kelompok': $('#id_subsubkel_aktiv').val(),
              'nm_aktivitas_asb': $('#nm_aktivitas').val(),
              'range_max1': $('#range_max1').val(),
              'kapasitas_max1':$('#kapasitas_max1').val(),
              'id_satuan1': $('#id_satuan1').val(),
              'id_satuan2': $('#id_satuan2').val(),
              'sat_derivatif1': $('#id_satuan1_derivatif').val(),
              'sat_derivatif2': $('#id_satuan2_derivatif').val(),
              'range_max': $('#range_max').val(),
              'kapasitas_max':$('#kapasitas_max').val(),
              'diskripsi_aktivitas': $('#ur_diskripsi').val(),
          },
          success: function(data) {
              if ((data.errors)){
                $('.error').removeClass('hidden');
              }
              else {
                  $('.error').addClass('hidden');
                  $('#tblAktivitas').DataTable().ajax.reload(null,false);
                  createPesan("Proses Tambah Data Berhasil","success");
            $('#ModalProgress').modal('hide');
              }
          },
      });
  });

  //Edit Aktivitas
  $(document).on('click', '.edit-aktivitas', function() {

     // alert($(this).data('id_sat_derivatif1'));

    $('.btnAddAktiv').addClass('btn-success');
    $('.btnAddAktiv').removeClass('btn-danger');
    $('.btnAddAktiv').removeClass('addAktivitas');
    $('.btnAddAktiv').addClass('editAktivitas');
    $('.modal-title').text('Edit Data Aktivitas ASB');
    $('.form-horizontal').show();
    $('#id_perkada_aktiv'). val(id_sk_asb);
    $('#id_kel_aktiv'). val(id_kel_asb);
    $('#id_subkel_aktiv'). val(id_subkel_asb);
    $('#id_subsubkel_aktiv'). val(id_ssubkel_asb);
    $('#id_satuan1').val($(this).data('id_satuan1'));
    $('#id_satuan2').val($(this).data('id_satuan2'));
    $('#range_max').val($(this).data('range_max'));
    $('#range_max1').val($(this).data('range_max1'));
    $('#kapasitas_max').val($(this).data('kapasitas_max'));
    $('#kapasitas_max1').val($(this).data('kapasitas_max1'));
    $('#ur_diskripsi').val($(this).data('diskripsi_aktivitas'));
    $('#nm_aktivitas').val($(this).data('ur_aktivitas'));
    $('#id_aktivitas_edit').val($(this).data('id_aktivitas_asb'));
    $('#id_satuan1_derivatif').val($(this).data('id_sat_derivatif1'));
    $('#id_satuan2_derivatif').val($(this).data('id_sat_derivatif2'));

    document.getElementById("idperkada_aktiv").innerHTML = nm_sk_asb;
    document.getElementById("idkel_aktiv").innerHTML = nm_kel_asb;
    document.getElementById("idsubkel_aktiv").innerHTML = nm_subkel_asb;
    document.getElementById("idsubsubkel_aktiv").innerHTML = nm_ssubkel_asb;
   
    if ($(this).data('id_satuan2')==0) {
      document.getElementById("range_max1").setAttribute("disabled","disabled");  
      document.getElementById("kapasitas_max1").setAttribute("disabled","disabled");      
    } else {
      document.getElementById("range_max1").removeAttribute("disabled");
      document.getElementById("kapasitas_max1").removeAttribute("disabled");
    }
    
    $('#ModalAktivitas').modal('show');
    // rekomCari();
  });

  $('.modal-footer').on('click', '.editAktivitas', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });
      $('#ModalProgress').modal('show');

      $.ajax({
          type: 'post',
          url: './editAktivitas',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_asb_sub_sub_kelompok': $('#id_subsubkel_aktiv').val(),
              'nm_aktivitas_asb': $('#nm_aktivitas').val(),
              'range_max1': $('#range_max1').val(),
              'kapasitas_max1':$('#kapasitas_max1').val(),
              'id_satuan1': $('#id_satuan1').val(),
              'id_satuan2': $('#id_satuan2').val(),
              'sat_derivatif1': $('#id_satuan1_derivatif').val(),
              'sat_derivatif2': $('#id_satuan2_derivatif').val(),
              'range_max': $('#range_max').val(),
              'kapasitas_max':$('#kapasitas_max').val(),
              'diskripsi_aktivitas': $('#ur_diskripsi').val(),
              'id_aktivitas_asb': $('#id_aktivitas_edit').val(),
          },
          success: function(data) {
              $('#tblAktivitas').DataTable().ajax.reload(null,false);
              createPesan("Proses Edit Data Berhasil","success");
            $('#ModalProgress').modal('hide');
          }
      });
  });

  //Hapus zona Perkada
  $(document).on('click', '.delete-aktivitas', function() {
    $('.btnDelAktiv').removeClass('btn-success');
    $('.btnDelAktiv').addClass('btn-danger');
    $('.btnDelAktiv').addClass('delAktivitas');
    $('.modal-title').text('Hapus Data Aktivitas ASB');
    $('.id_aktivitas_hapus').text($(this).data('id_aktivitas_asb'));
    $('.ur_aktivitas_del').html($(this).data('ur_aktivitas'));
    $('.no_perkada_aktiv_del').html($(this).data('no_perkada'));
    $('#HapusAktivitas').modal('show');
  });

  $('.modal-footer').on('click', '.delAktivitas', function() {
    // alert($('.id_aktivitas_hapus').text());
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
    $('#ModalProgress').modal('show');
    $.ajax({
      type: 'post',
      url: './hapusAktivitas',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_aktivitas_asb': $('.id_aktivitas_hapus').text()
      },
      success: function(data) {

        $('.item' + $('.id_aktivitas_hapus').text()).remove();
        $('#tblAktivitas').DataTable().ajax.reload(null,false);
        createPesan("Proses Hapus Data Berhasil","success");
            $('#ModalProgress').modal('hide');
      }
    });
  });

    //tambah Sub Sub Kelompok
  $(document).on('click', '.add-sskel', function() {
    $('.btnSSubKel').removeClass('editSSKel');
    $('.btnSSubKel').addClass('addSSKel');
    $('.modal-title').text('Tambah Data Sub SUb Kelompok');
    $('.form-horizontal').show();
    $('#id_perkada_ssubkel'). val(id_sk_asb);
    $('#id_kel_ssubkel'). val(id_kel_asb);
    $('#id_subkel_ssubkel'). val(id_subkel_asb);
    document.getElementById("idperkada_ssubkel").innerHTML = nm_sk_asb;
    document.getElementById("idkel_ssubkel").innerHTML = nm_kel_asb;
    document.getElementById("idsubkel_ssubkel").innerHTML = nm_subkel_asb;
    $('#ur_asb_ssubkel'). val(null);
    $('#ModalSubSubKelompok').modal('show');
  });

  $('.modal-footer').on('click', '.addSSKel', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });
      $('#ModalProgress').modal('show');
      $.ajax({
          type: 'post',
          url: './addSubSubKelompok',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_subkel_ssubkel': $('#id_subkel_ssubkel').val(),
              'ur_asb_ssubkel': $('#ur_asb_ssubkel').val(),
          },
          success: function(data) {
              if ((data.errors)){
                $('.error').removeClass('hidden');
              }
              else {
                  $('.error').addClass('hidden');
                  $('#tblSubSubKelompok').DataTable().ajax.reload(null,false);
                  createPesan("Proses Tambah Data Berhasil","success");
            $('#ModalProgress').modal('hide');
              }
          },
      });
  });

    $(document).on('click', '.edit-sskel', function() {
    $('.btnSSubKel').removeClass('addSSKel');
    $('.btnSSubKel').addClass('editSSKel');
    $('.modal-title').text('Ubah Data Sub Sub Kelompok');
    $('.form-horizontal').show();
    $('#id_perkada_ssubkel'). val(id_sk_asb);
    $('#id_kel_ssubkel'). val(id_kel_asb);
    $('#id_subkel_ssubkel'). val(id_subkel_asb);
    document.getElementById("idperkada_ssubkel").innerHTML = nm_sk_asb;
    document.getElementById("idkel_ssubkel").innerHTML = nm_kel_asb;
    document.getElementById("idsubkel_ssubkel").innerHTML = nm_subkel_asb;
    $('#ur_asb_ssubkel'). val($(this).data('uraian_subsubkelompok'));
    $('#id_ssubkel'). val($(this).data('id_subsubkelompok'));
    $('#ModalSubSubKelompok').modal('show');
  });

  $('.modal-footer').on('click', '.editSSKel', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });
      $('#ModalProgress').modal('show');
      $.ajax({
          type: 'post',
          url: './editSubSubKelompok',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_subkel_ssubkel_edit': $('#id_subkel_ssubkel').val(),
              'ur_asb_ssubkel_edit': $('#ur_asb_ssubkel').val(),
              'id_asb_ssubkel_edit': $('#id_ssubkel').val(),
          },
          success: function(data) {
              if ((data.errors)){
                $('.error').removeClass('hidden');
              }
              else {
                  $('.error').addClass('hidden');
                  $('#tblSubSubKelompok').DataTable().ajax.reload(null,false);
                  createPesan("Proses Edit Data Berhasil","success");
            $('#ModalProgress').modal('hide');
              }
          },
      });
  });

      //Hapus Sub Kelompok
  $(document).on('click', '.delete-sskel', function() {
    $('.btnDelSubSubKel').addClass('delsubsubKelompok');
    $('.modal-title').text('Hapus Data Sub Kelompok ASB');
    $('.id_asb_subsubkel_del').text($(this).data('id_subsubkelompok'));
    $('.ur_asb_subsubkel_del').html($(this).data('uraian_subsubkelompok'));
    $('.no_perkada_subsubkel_del').html($(this).data('no_perkada'));
    $('.ur_asb_subkel_del').html($(this).data('uraian_subkelompok'));
    $('#HapusSubSubKelompok').modal('show');
  });

  $('.modal-footer').on('click', '.delsubsubKelompok', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
    $('#ModalProgress').modal('show');

    $.ajax({
      type: 'post',
      url: './hapusSubSubKelompok',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_asb_ssubkel_del': $('.id_asb_subsubkel_del').text()
      },
      success: function(data) {
        $('.item' + $('.id_asb_subsubkel_del').text()).remove();
        $('#tblSubSubKelompok').DataTable().ajax.reload(null,false);
        createPesan("Proses Hapus Data Berhasil","success");
            $('#ModalProgress').modal('hide');
      }
    });
  });

  //Tambah Komponen
  $(document).on('click', '.add-komponen', function() {
    $('.btnAddKomp').addClass('btn-success');
    $('.btnAddKomp').removeClass('btn-danger');
    $('.btnAddKomp').removeClass('editKomponenASB');
    $('.btnAddKomp').addClass('addKomponenASB');
    $('.modal-title').text('Tambah Data Komponen Aktivitas ASB');
    $('.form-horizontal').show();
    $('#id_perkada_komp'). val(id_sk_asb);
    $('#id_kel_komp'). val(id_kel_asb);
    $('#id_subkel_komp'). val(id_subkel_asb);
    $('#id_subsubkel_komp'). val(id_ssubkel_asb);
    $('#id_aktivitas_komp'). val(id_aktiv_asb);
    document.getElementById("idperkada_komp").innerHTML = nm_sk_asb;
    document.getElementById("idkel_komp").innerHTML = nm_kel_asb;
    document.getElementById("idsubkel_komp").innerHTML = nm_subkel_asb;
    document.getElementById("idsubsubkel_komp").innerHTML = nm_ssubkel_asb;
    document.getElementById("idaktivitas_komp").innerHTML = nm_aktiv_asb;
    $('#id_rekening_komp'). val(null);
    $('#nm_rekening_komp'). val(null);
    $('#nm_komponen'). val(null);
    $('#ModalKomponen').modal('show');
  });

  $('.modal-footer').on('click', '.addKomponenASB', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });
      $('#ModalProgress').modal('show');
      $.ajax({
          type: 'post',
          url: './addKomponenASB',
          data: {
              '_token': $('input[name=_token]').val(),
              'nm_komponen': $('#nm_komponen').val(),
              'id_rekening_komp': $('#id_rekening_komp').val(),
              'id_aktivitas_komp': $('#id_aktivitas_komp').val(),
          },

          success: function(data) {
              if ((data.errors)){
                $('.error').removeClass('hidden');
              }
              else {
                  $('.error').addClass('hidden');
                  $('#tblKomponen').DataTable().ajax.reload(null,false);
                  createPesan("Proses Tambah Data Berhasil","success");
            $('#ModalProgress').modal('hide');
              }
          },
      });
  });

  //Edit Komponen
  $(document).on('click', '.edit-komponen', function() {
    $('.btnAddKomp').addClass('btn-success');
    $('.btnAddKomp').removeClass('btn-danger');
    $('.btnAddKomp').removeClass('addKomponenASB');
    $('.btnAddKomp').addClass('editKomponenASB');
    $('.modal-title').text('Tambah Data Komponen Aktivitas ASB');
    $('.form-horizontal').show();
    $('#id_perkada_komp'). val(id_sk_asb);
    $('#id_kel_komp'). val(id_kel_asb);
    $('#id_subkel_komp'). val(id_subkel_asb);
    $('#id_subsubkel_komp'). val(id_ssubkel_asb);
    $('#id_aktivitas_komp'). val(id_aktiv_asb);
    document.getElementById("idperkada_komp").innerHTML = nm_sk_asb;
    document.getElementById("idkel_komp").innerHTML = nm_kel_asb;
    document.getElementById("idsubkel_komp").innerHTML = nm_subkel_asb;
    document.getElementById("idsubsubkel_komp").innerHTML = nm_ssubkel_asb;
    document.getElementById("idaktivitas_komp").innerHTML = nm_aktiv_asb;
    $('#nm_rekening_komp').val($(this).data('kd_rekening')+" - "+$(this).data('nm_rekening'));
    $('#id_rekening_komp').val($(this).data('id_rekening'));
    $('#nm_komponen').val($(this).data('uraian_komponen'));
    $('#id_komponen_asb_edit').val($(this).data('id_komponen'));
    $('#ModalKomponen').modal('show');
  });

  $('.modal-footer').on('click', '.editKomponenASB', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });
      $('#ModalProgress').modal('show');

      $.ajax({
          type: 'post',
          url: './editKomponenASB',
          data: {
              '_token': $('input[name=_token]').val(),
              'nm_komponen': $('#nm_komponen').val(),
              'id_rekening_komp': $('#id_rekening_komp').val(),
              'id_aktivitas_komp': $('#id_aktivitas_komp').val(),
              'id_komponen_asb': $('#id_komponen_asb_edit').val(),
          },
          success: function(data) {
              $('#tblKomponen').DataTable().ajax.reload(null,false);
              createPesan("Proses Edit Data Berhasil","success");
            $('#ModalProgress').modal('hide');
          }
      });
  });

  //Hapus Komponen
  $(document).on('click', '.delete-komponen', function() {
    $('.btnDelKomp').removeClass('btn-success');
    $('.btnDelKomp').addClass('btn-danger');
    $('.btnDelKomp').addClass('delKomponen');
    $('.modal-title').text('Hapus Data Komponen Aktivitas');
    $('.id_komponen_hapus').text($(this).data('id_komponen'));
    $('.ur_komponen_del').html($(this).data('uraian_komponen'));
    $('.ur_aktiv_komp_del').html($(this).data('ur_aktivitas'));
    $('#HapusKomponen').modal('show');
  });

  $('.modal-footer').on('click', '.delKomponen', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
    $('#ModalProgress').modal('show');
    $.ajax({
      type: 'post',
      url: './hapusKomponenASB',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_komponen_hapus': $('.id_komponen_hapus').text()
      },
      success: function(data) {
        $('.item' + $('.id_komponen_hapus').text()).remove();
        $('#tblKomponen').DataTable().ajax.reload(null,false);
        createPesan("Proses Hapus Data Berhasil","success");
        $('#ModalProgress').modal('hide');
      }
    });
  });

//Copy Komponen
  $(document).on('click', '.copy-komponen', function() {
    $('.form-horizontal').show();

    $('#tblCariKomponen').DataTable().ajax.reload(null,false);
    $('#cariKomponen').modal('show');
  });


  //tambah kelompok
  $(document).on('click', '.add-kelompok', function() {
    $('.btnAddKel').removeClass('editKelompok');
    $('.btnAddKel').addClass('addKelompok');
    $('.modal-title').text('Tambah Kelompok Aktivitas');
    $('.form-horizontal').show();
    $('#id_perkada_kel'). val(id_sk_asb);
    document.getElementById("idperkada_kel").innerHTML = nm_sk_asb;
    $('#ur_asb_kel'). val(null);
    $('#TambahKelompok').modal('show');
  });

  $('.modal-footer').on('click', '.addKelompok', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });
      $('#ModalProgress').modal('show');
      $.ajax({
          type: 'post',
          url: './addKelompok',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_perkada_kel': $('#id_perkada_kel').val(),
              'ur_asb_kel': $('#ur_asb_kel').val(),
          },
          success: function(data) {
              if ((data.errors)){
                $('.error').removeClass('hidden');
              }
              else {
                  $('.error').addClass('hidden');
                  $('#tblKelompok').DataTable().ajax.reload(null,false);
                  createPesan("Proses Tambah Data Berhasil","success");
                  $('#ModalProgress').modal('hide');
              }
          },
      });
  });

  //Edit Kelompok
  $(document).on('click', '.edit-asbkelompok', function() {
    $('.btnEditKel').removeClass('addKelompok');
    $('.btnEditKel').addClass('editKelompok');
    $('.modal-title').text('Edit Data Kelompok ASB');
    $('.form-horizontal').show();
    $('#id_perkada_kel_edit'). val(id_sk_asb);
    document.getElementById("idperkada_kel_edit").innerHTML = nm_sk_asb;
    $('#id_asb_kel_edit').val($(this).data('id_kelompok'));
    $('#ur_asb_kel_edit').val($(this).data('uraian_kelompok'));
    $('#EditKelompok').modal('show');
  });

  $('.modal-footer').on('click', '.editKelompok', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });
      $('#ModalProgress').modal('show');

      $.ajax({
          type: 'post',
          url: './editKelompok',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_asb_kel_edit': $('#id_asb_kel_edit').val(),
              'id_perkada_kel_edit': $('#id_perkada_kel_edit').val(),
              'ur_asb_kel_edit': $('#ur_asb_kel_edit').val(),
          },
          success: function(data) {
              $('#tblKelompok').DataTable().ajax.reload(null,false);
              createPesan("Proses Edit Data Berhasil","success");
            $('#ModalProgress').modal('hide');
          }
      });
  });

    //Hapus zona Perkada
  $(document).on('click', '.hapus-asbkelompok', function() {
    $('.btnDelKel').removeClass('btn-success');
    $('.btnDelKel').addClass('btn-danger');
    $('.btnDelKel').addClass('delKelompok');
    $('.modal-title').text('Hapus Data Kelompok ASB');
    $('.id_asb_kel_del').text($(this).data('id_kelompok'));
    $('.ur_asb_kel_del').html($(this).data('uraian_kelompok'));
    $('.no_perkada_kel_del').html($(this).data('no_perkada'));
    $('#HapusKelompok').modal('show');
  });

  $('.modal-footer').on('click', '.delKelompok', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
    $('#ModalProgress').modal('show');
    $.ajax({
      type: 'post',
      url: './hapusKelompok',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_asb_kel_del': $('.id_asb_kel_del').text()
      },
      success: function(data) {
        $('.item' + $('.id_asb_kel_del').text()).remove();
        $('#tblKelompok').DataTable().ajax.reload(null,false);
        createPesan("Proses Hapus Data Berhasil","success");
            $('#ModalProgress').modal('hide');
      }
    });
  });

  //tambah Sub kelompok
  $(document).on('click', '.add-subkelompok', function() {
    $('.btnAddSubKel').addClass('btn-success');
    $('.btnAddSubKel').removeClass('btn-danger');
    $('.btnEditSubKel').removeClass('editsubKelompok');
    $('.btnAddSubKel').addClass('addSubKelompok');
    $('.modal-title').text('Tambah Sub Kelompok Aktivitas');
    $('.form-horizontal').show();
    $('#id_perkada_subkel'). val(id_sk_asb);    
    $('#id_kel_subkel'). val(id_kel_asb);
    document.getElementById("idperkada_subkel").innerHTML = nm_sk_asb;
    document.getElementById("idkel_subkel").innerHTML = nm_kel_asb;
    $('#ur_asb_subkel'). val(null);
    $('#TambahSubKelompok').modal('show');
  });

  $('.modal-footer').on('click', '.addSubKelompok', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });
      $('#ModalProgress').modal('show');
      $.ajax({
          type: 'post',
          url: './addSubKelompok',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_kel_subkel': $('#id_kel_subkel').val(),
              'ur_asb_subkel': $('#ur_asb_subkel').val(),
          },
          success: function(data) {
              if ((data.errors)){
                $('.error').removeClass('hidden');
              }
              else {
                  $('.error').addClass('hidden');
                  $('#tblSubKelompok').DataTable().ajax.reload(null,false);
                  createPesan("Proses Tambah Data Berhasil","success");
                  $('#ModalProgress').modal('hide');
              }
          },
      });
  });

  //Edit Sub Kelompok
  $(document).on('click', '.edit-subkelompok', function() {
    $('.btnEditSubKel').addClass('btn-success');
    $('.btnEditSubKel').removeClass('btn-danger');
    $('.btnAddSubKel').removeClass('addSubKelompok');
    $('.btnEditSubKel').addClass('editsubKelompok');
    $('.modal-title').text('Edit Data Sub Kelompok ASB');
    $('.form-horizontal').show();
    $('#id_perkada_subkel_edit'). val(id_sk_asb);    
    $('#id_kel_subkel_edit'). val(id_kel_asb);
    document.getElementById("idperkada_subkel_edit").innerHTML = nm_sk_asb;
    document.getElementById("idkel_subkel_edit").innerHTML = nm_kel_asb;
    $('#id_asb_subkel_edit').val($(this).data('id_subkelompok'));
    $('#ur_asb_subkel_edit').val($(this).data('uraian_subkelompok'));
    $('#EditSubKelompok').modal('show');
  });

  $('.modal-footer').on('click', '.editsubKelompok', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });
      $('#ModalProgress').modal('show');
      $.ajax({
          type: 'post',
          url: './editSubKelompok',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_kel_subkel_edit': $('#id_kel_subkel_edit').val(),
              'id_asb_subkel_edit': $('#id_asb_subkel_edit').val(),
              'ur_asb_subkel_edit': $('#ur_asb_subkel_edit').val(),
          },
          success: function(data) {
              $('#tblSubKelompok').DataTable().ajax.reload(null,false);
              createPesan("Proses Edit Data Berhasil","success");
              $('#ModalProgress').modal('hide');
          }
      });
  });

    //Hapus Sub Kelompok
  $(document).on('click', '.hapus-subkelompok', function() {
    $('.btnDelSubKel').removeClass('btn-success');
    $('.btnDelSubKel').addClass('btn-danger');
    $('.btnDelSubKel').addClass('delsubKelompok');
    $('.modal-title').text('Hapus Data Sub Kelompok ASB');
    $('.id_asb_subkel_del').text($(this).data('id_subkelompok'));
    $('.ur_asb_subkel_del').html($(this).data('uraian_subkelompok'));
    $('.no_perkada_subkel_del').html($(this).data('no_perkada'));
    $('.ur_asb_kel_del').html($(this).data('uraian_kelompok'));
    $('#HapusSubKelompok').modal('show');
  });

  $('.modal-footer').on('click', '.delsubKelompok', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
    $('#ModalProgress').modal('show');
    $.ajax({
      type: 'post',
      url: './hapusSubKelompok',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_asb_subkel_del': $('.id_asb_subkel_del').text()
      },
      success: function(data) {
        $('.item' + $('.id_asb_subkel_del').text()).remove();
        $('#tblSubKelompok').DataTable().ajax.reload(null,false);
        createPesan("Proses Hapus Data Berhasil","success");
        $('#ModalProgress').modal('hide');
      }
    });
  });

//Tambah 
  $(document).on('click', '.add-rincian', function() {
    $('.btnAddRinci').addClass('btn-success');
    $('.btnAddRinci').removeClass('btn-danger');
    $('.btnAddRinci').removeClass('editRinci');
    $('.btnAddRinci').addClass('addRincianASB');
    $('.modal-title').text('Tambah Data Rincian Item Komponen ASB');
    $('.form-horizontal').show();

    $('#id_komponen_rinc'). val(id_komp_asb);
    document.getElementById("idperkada_rinc").innerHTML = nm_sk_asb;
    document.getElementById("idkel_rinc").innerHTML = nm_kel_asb;
    document.getElementById("idsubkel_rinc").innerHTML = nm_subkel_asb;
    document.getElementById("idsubsubkel_rinc").innerHTML = nm_ssubkel_asb;
    document.getElementById("idaktivitas_rinc").innerHTML = nm_aktiv_asb;
    document.getElementById("idkomponen_rinc").innerHTML = nm_komp_asb;

    isi_hub_driver();

    document.frmModalRincian.jns_biaya[0].checked=false;
    document.frmModalRincian.jns_biaya[1].checked=false;
    document.frmModalRincian.jns_biaya[2].checked=false;

    if (document.frmModalRincian.jns_biaya[1].checked) {
      unlock_hub_driver();
    } else {
      lock_hub_driver();
      clear_hub_driver();
    }
    
    document.getElementById("koefisien1").setAttribute("disabled","disabled");
    document.getElementById("id_satuan1_rinc").setAttribute("disabled","disabled");
    // document.getElementById("id_satuan1_der").setAttribute("disabled","disabled");
    document.getElementById("koefisien2").setAttribute("disabled","disabled");
    document.getElementById("id_satuan2_rinc").setAttribute("disabled","disabled");
    document.getElementById("koefisien3").setAttribute("disabled","disabled");
    document.getElementById("id_satuan3_rinc").setAttribute("disabled","disabled");

    $('#koefisien1'). val(1);
    $('#koefisien2'). val(1);
    $('#koefisien3'). val(1);

    $('#ket_rinci').val(null);
    $('#id_tarif_ssh').val(null);
    $('#ur_tarif_ssh').val(null);


    $('#id_satuan1_rinc'). val(0);
    $('#id_satuan2_rinc'). val(0);
    $('#id_satuan3_rinc'). val(0);

    rekomCari();
    $('.hub_driver').removeAttr('checked');
    $('#ModalRincian').modal('show');

  });

  $('.modal-footer').on('click', '.addRincianASB', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $('#ModalProgress').modal('show');
      $.ajax({
          type: 'post',
          url: './addRincianASB',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_komponen_asb': $('#id_komponen_rinc').val(),
              'id_tarif_ssh': $('#id_tarif_ssh').val(),
              'koefisien1': $('#koefisien1').val(),
              'koefisien2': $('#koefisien2').val(),
              'koefisien3': $('#koefisien3').val(),
              'id_satuan1': $('#id_satuan1_rinc').val(),
              'id_satuan2': $('#id_satuan2_rinc').val(),
              'id_satuan3': $('#id_satuan3_rinc').val(),
              // 'sat_derivatif1': $('#id_satuan1_der').val(),
              'jenis_biaya': getJnsBiaya(),
              'hub_driver': getHubDriver(),
              'ket_group' : $('#ket_rinci').val(),
          },

          success: function(data) {
                  createPesan("Proses Tambah Data Berhasil","success");
                  $('#ModalProgress').modal('hide');
                  $('datalist[name="searchresults"]').append('<option value="'+ $('#ket_rinci').val() +'"/>');
                  $('#tblRincian').DataTable().ajax.reload(null,false);
          },
      });
  });

  //Edit Rincian
  $(document).on('click', '.edit-rinci', function() {

    $('.btnAddRinci').addClass('btn-success');
    $('.btnAddRinci').removeClass('btn-danger');
    $('.btnAddRinci').removeClass('addRincianASB');
    $('.btnAddRinci').addClass('editRinci');
    $('.modal-title').text('Edit Data Rincian Item Komponen ASB');
    $('.form-horizontal').show();
    $('#id_komponen_asb_rinci').val($(this).data('id_komponen_rinci'));
    $('#id_komponen_rinc').val($(this).data('id_komponen'));

    document.getElementById("idperkada_rinc").innerHTML = nm_sk_asb;
    document.getElementById("idkel_rinc").innerHTML = nm_kel_asb;
    document.getElementById("idsubkel_rinc").innerHTML = nm_subkel_asb;
    document.getElementById("idsubsubkel_rinc").innerHTML = nm_ssubkel_asb;
    document.getElementById("idaktivitas_rinc").innerHTML = nm_aktiv_asb;
    document.getElementById("idkomponen_rinc").innerHTML = nm_komp_asb;

    isi_hub_driver();

    $('#koefisien1'). val($(this).data('koefisien1'));
    $('#koefisien2'). val($(this).data('koefisien2'));
    $('#koefisien3'). val($(this).data('koefisien3'));
    $('#id_tarif_ssh').val($(this).data('id_tarif_ssh'));
    $('#ur_tarif_ssh').val($(this).data('ur_tarif_ssh'));
    $('#id_satuan1_rinc').val($(this).data('id_satuan1'));
    // $('#id_satuan1_der').val($(this).data('sat_derivatif1'));
    $('#id_satuan2_rinc').val($(this).data('id_satuan2'));
    $('#id_satuan3_rinc').val($(this).data('id_satuan3'));
    $('#ket_rinci').val($(this).data('ket_group'));    

    if ($(this).data('hub_driver') != ""){      
      document.frmModalRincian.hub_driver[$(this).data('hub_driver')-1].checked=true;
    }

    if($(this).data('jenis_biaya')==1){
      lock_hub_driver();
      clear_hub_driver();
      document.getElementById("koefisien1").removeAttribute("disabled");
      document.getElementById("id_satuan1_rinc").removeAttribute("disabled");
      // document.getElementById("id_satuan1_der").setAttribute("disabled","disabled");
      document.getElementById("koefisien2").removeAttribute("disabled");
      document.getElementById("id_satuan2_rinc").removeAttribute("disabled");
      document.getElementById("koefisien3").removeAttribute("disabled");
      document.getElementById("id_satuan3_rinc").removeAttribute("disabled");
      document.frmModalRincian.jns_biaya[0].checked=true;
      $('.hub_driver').removeAttr('checked');
    }

    if($(this).data('jenis_biaya')!=1){
      unlock_hub_driver();
      document.getElementById("koefisien1").setAttribute("disabled","disabled");
      document.getElementById("id_satuan1_rinc").setAttribute("disabled","disabled");
      // document.getElementById("id_satuan1_der").removeAttribute("disabled");
      document.getElementById("koefisien2").removeAttribute("disabled");
      document.getElementById("id_satuan2_rinc").removeAttribute("disabled");
      document.getElementById("koefisien3").removeAttribute("disabled");
      document.getElementById("id_satuan3_rinc").removeAttribute("disabled");
      document.frmModalRincian.jns_biaya[2].checked=true;
    }

    rekomCari();

    $("#ModalRincian").modal('show');
  });

  $('.modal-footer').on('click', '.editRinci', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $('#ModalProgress').modal('show');
      $.ajax({
          type: 'post',
          url: './editRincianASB',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_komponen_asb_rinci': $('#id_komponen_asb_rinci').val(),
              'id_komponen_asb': $('#id_komponen_rinc').val(),
              'id_tarif_ssh': $('#id_tarif_ssh').val(),
              'koefisien1': $('#koefisien1').val(),
              'koefisien2': $('#koefisien2').val(),
              'koefisien3': $('#koefisien3').val(),
              'id_satuan1': $('#id_satuan1_rinc').val(),
              'id_satuan2': $('#id_satuan2_rinc').val(),
              'id_satuan3': $('#id_satuan3_rinc').val(),
              // 'sat_derivatif1': $('#id_satuan1_der').val(),
              'jenis_biaya': getJnsBiaya(),
              'hub_driver': getHubDriver(),
              'ket_group' : $('#ket_rinci').val(),
          },
          success: function(data) {
            createPesan("Proses Edit Data Berhasil","success");
            $('#ModalProgress').modal('hide');
            $('datalist[name="searchresults"]').append('<option value="'+ $('#ket_rinci').val() +'"/>');
              $('#tblRincian').DataTable().ajax.reload(null,false);
          }
      });
  });

  //Hapus Rincian
  $(document).on('click', '.delete-rincian', function() {
    $('.btnDelRinc').removeClass('btn-success');
    $('.btnDelRinc').addClass('btn-danger');
    $('.btnDelRinc').addClass('delRincian');
    $('.modal-title').text('Hapus Data Tarif SSH');
    $('.id_komponen_rinci_hapus').text($(this).data('id_komponen_rinci'));
    $('.ur_rincian_del').html($(this).data('ur_tarif_ssh'));
    $('.ur_komp_rinc_del').html($(this).data('uraian_komponen'));
    $('#HapusRincian').modal('show');
  });

  $('.modal-footer').on('click', '.delRincian', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $('#ModalProgress').modal('show');

    $.ajax({
      type: 'post',
      url: './hapusRincianASB',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_komponen_asb_rinci': $('.id_komponen_rinci_hapus').text()
      },
      success: function(data) {
        $('.item' + $('.id_komponen_rinci_hapus').text()).remove();
        createPesan("Proses Hapus Berhasil","success");
        $('#ModalProgress').modal('hide');
        $('#tblRincian').DataTable().ajax.reload(null,false);
      }
    });
  });

  $('.id_satuan2').change(function() {
    if($('#id_satuan2').val()==0){
      $(".id_satuan2_derivatif").attr("disabled", true);
      document.getElementById("range_max1").setAttribute("disabled","disabled");
      $('#range_max1').val(1);
      document.getElementById("kapasitas_max1").setAttribute("disabled","disabled");
      $('#kapasitas_max1').val(1);
    } else {
      $(".id_satuan2_derivatif").removeAttr("disabled");
      document.getElementById("range_max1").removeAttribute("disabled");
      document.getElementById("kapasitas_max1").removeAttribute("disabled");
    }
  });

function lock_hub_driver(){
  document.frmModalRincian.hub_driver[0].disabled=true;
  document.frmModalRincian.hub_driver[1].disabled=true;
  document.frmModalRincian.hub_driver[2].disabled=true;
  document.frmModalRincian.hub_driver[3].disabled=true;
  document.frmModalRincian.hub_driver[4].disabled=true;
  document.frmModalRincian.hub_driver[5].disabled=true;
  document.frmModalRincian.hub_driver[6].disabled=true;
  document.frmModalRincian.hub_driver[7].disabled=true;
}

function unlock_hub_driver(){
  document.frmModalRincian.hub_driver[0].disabled=false;
  if (hub_driver2 != 'N/A') {
    document.frmModalRincian.hub_driver[1].disabled=false;
  }
  if (hub_driver3 != 'N/A') {
    document.frmModalRincian.hub_driver[2].disabled=false;
  }
  if (hub_driver4 != 'N/A') {
    document.frmModalRincian.hub_driver[3].disabled=false;
  }
  if (hub_driver5 != 'N/A') {
    document.frmModalRincian.hub_driver[4].disabled=false;
  }
  if (hub_driver6 != 'N/A') {
    document.frmModalRincian.hub_driver[5].disabled=false;
  }
  if (hub_driver7 != 'N/A') {
    document.frmModalRincian.hub_driver[6].disabled=false;
  }
  if (hub_driver8 != 'N/A') {
    document.frmModalRincian.hub_driver[7].disabled=false;
  }
}

function clear_hub_driver(){
  document.frmModalRincian.hub_driver[0].checked=false;
  document.frmModalRincian.hub_driver[1].checked=false;
  document.frmModalRincian.hub_driver[2].checked=false;
  document.frmModalRincian.hub_driver[3].checked=false;
  document.frmModalRincian.hub_driver[4].checked=false;
  document.frmModalRincian.hub_driver[5].checked=false;
  document.frmModalRincian.hub_driver[6].checked=false;
  document.frmModalRincian.hub_driver[7].checked=false;
}

function isi_hub_driver(){  
    document.getElementById("shub_driver1").innerHTML = hub_driver1;    
    document.getElementById("shub_driver2").innerHTML = hub_driver2;
    document.getElementById("shub_driver3").innerHTML = hub_driver3;
    document.getElementById("shub_driver4").innerHTML = hub_driver4;    
    document.getElementById("shub_driver5").innerHTML = hub_driver5;
    document.getElementById("shub_driver6").innerHTML = hub_driver6;    
    document.getElementById("shub_driver7").innerHTML = hub_driver7;
    document.getElementById("shub_driver8").innerHTML = hub_driver8;
}

function eFixed(){
    lock_hub_driver();
    $('#id_satuan1_rinc').val(n_driver1);
    $('#id_satuan2_rinc').val(n_driver2);
    document.getElementById("koefisien1").removeAttribute("disabled");
    document.getElementById("id_satuan1_rinc").removeAttribute("disabled");
    document.getElementById("koefisien2").removeAttribute("disabled");
    document.getElementById("id_satuan2_rinc").removeAttribute("disabled");
    document.getElementById("koefisien3").removeAttribute("disabled");
    document.getElementById("id_satuan3_rinc").removeAttribute("disabled");
    $('.hub_driver').removeAttr('checked');
}

function eIndependent1(){
    unlock_hub_driver();
    $('#id_satuan1_rinc').val(n_driver1);
    $('#id_satuan2_rinc').val(n_driver2);
    document.getElementById("koefisien1").setAttribute("disabled","disabled");
    document.getElementById("id_satuan1_rinc").setAttribute("disabled","disabled");
    document.getElementById("koefisien2").removeAttribute("disabled");
    document.getElementById("id_satuan2_rinc").removeAttribute("disabled");
    document.getElementById("koefisien3").removeAttribute("disabled");
    document.getElementById("id_satuan3_rinc").removeAttribute("disabled");
}

function eIndependent2(){
    unlock_hub_driver();
    $('#id_satuan1_rinc').val(n_driver2);
    $('#id_satuan2_rinc').val(n_driver1);
    document.getElementById("koefisien1").setAttribute("disabled","disabled");
    document.getElementById("id_satuan1_rinc").setAttribute("disabled","disabled");
    document.getElementById("koefisien2").removeAttribute("disabled");
    document.getElementById("id_satuan2_rinc").removeAttribute("disabled");
    document.getElementById("koefisien3").removeAttribute("disabled");
    document.getElementById("id_satuan3_rinc").removeAttribute("disabled");
}

function eIndependent3(){
    unlock_hub_driver();
    $('#id_satuan1_rinc').val(n_driver1);
    $('#id_satuan2_rinc').val(n_driver2);
    document.getElementById("koefisien1").setAttribute("disabled","disabled");
    document.getElementById("id_satuan1_rinc").setAttribute("disabled","disabled");
    document.getElementById("koefisien2").setAttribute("disabled","disabled");
    document.getElementById("id_satuan2_rinc").setAttribute("disabled","disabled");
    document.getElementById("koefisien3").removeAttribute("disabled");
    document.getElementById("id_satuan3_rinc").removeAttribute("disabled");
}

function eMixed1(){
    unlock_hub_driver();
    $('#id_satuan1_rinc').val(n_driver3);
    $('#id_satuan2_rinc').val(n_driver2);
    document.getElementById("koefisien1").setAttribute("disabled","disabled");
    document.getElementById("id_satuan1_rinc").setAttribute("disabled","disabled");
    document.getElementById("koefisien2").removeAttribute("disabled");
    document.getElementById("id_satuan2_rinc").removeAttribute("disabled");
    document.getElementById("koefisien3").removeAttribute("disabled");
    document.getElementById("id_satuan3_rinc").removeAttribute("disabled");
}

function eMixed2(){
    unlock_hub_driver();
    $('#id_satuan1_rinc').val(n_driver4);
    $('#id_satuan2_rinc').val(n_driver1);
    document.getElementById("koefisien1").setAttribute("disabled","disabled");
    document.getElementById("id_satuan1_rinc").setAttribute("disabled","disabled");
    document.getElementById("koefisien2").removeAttribute("disabled");
    document.getElementById("id_satuan2_rinc").removeAttribute("disabled");
    document.getElementById("koefisien3").removeAttribute("disabled");
    document.getElementById("id_satuan3_rinc").removeAttribute("disabled");
}

function eMixed3(){
    unlock_hub_driver();
    $('#id_satuan1_rinc').val(n_driver3);
    $('#id_satuan2_rinc').val(n_driver4);
    document.getElementById("koefisien1").setAttribute("disabled","disabled");
    document.getElementById("id_satuan1_rinc").setAttribute("disabled","disabled");
    document.getElementById("koefisien2").setAttribute("disabled","disabled");
    document.getElementById("id_satuan2_rinc").setAttribute("disabled","disabled");
    document.getElementById("koefisien3").removeAttribute("disabled");
    document.getElementById("id_satuan3_rinc").removeAttribute("disabled");
}

function eMixed4(){
    unlock_hub_driver();
    $('#id_satuan1_rinc').val(n_driver3);
    $('#id_satuan2_rinc').val(n_driver2);
    document.getElementById("koefisien1").setAttribute("disabled","disabled");
    document.getElementById("id_satuan1_rinc").setAttribute("disabled","disabled");
    document.getElementById("koefisien2").setAttribute("disabled","disabled");
    document.getElementById("id_satuan2_rinc").setAttribute("disabled","disabled");
    document.getElementById("koefisien3").removeAttribute("disabled");
    document.getElementById("id_satuan3_rinc").removeAttribute("disabled");
}

function eMixed5(){
    unlock_hub_driver();
    $('#id_satuan1_rinc').val(n_driver4);
    $('#id_satuan2_rinc').val(n_driver1);
    document.getElementById("koefisien1").setAttribute("disabled","disabled");
    document.getElementById("id_satuan1_rinc").setAttribute("disabled","disabled");
    document.getElementById("koefisien2").setAttribute("disabled","disabled");
    document.getElementById("id_satuan2_rinc").setAttribute("disabled","disabled");
    document.getElementById("koefisien3").removeAttribute("disabled");
    document.getElementById("id_satuan3_rinc").removeAttribute("disabled");
}

$('.jns_biaya').change(function() {
  if(document.frmModalRincian.jns_biaya.value==1){
    lock_hub_driver();
    clear_hub_driver();
    $('#id_satuan3_rinc').val(0);    
    eFixed();

  }

  if(document.frmModalRincian.jns_biaya.value!=1){
    $('#koefisien1').val(1);
    $('#koefisien2').val(1);
    $('#id_satuan3_rinc').val(0);
    unlock_hub_driver();

    if(document.frmModalRincian.hub_driver.value==1){
      eIndependent1();
    }
    if(document.frmModalRincian.hub_driver.value==2){
      eIndependent2();
    }
    if(document.frmModalRincian.hub_driver.value==3){
      eIndependent3();
    }
    if(document.frmModalRincian.hub_driver.value==4){
      eMixed1();
    }
    if(document.frmModalRincian.hub_driver.value==5){
      eMixed2();
    }
    if(document.frmModalRincian.hub_driver.value==6){
      eMixed3();
    }
    if(document.frmModalRincian.hub_driver.value==7){
      eMixed4();
    }
    if(document.frmModalRincian.hub_driver.value==8){
      eMixed5();
    }         
  }
});


$('.hub_driver').change(function() {
    if(document.frmModalRincian.jns_biaya.value!=1){
        $('#koefisien1').val(1);
        $('#koefisien2').val(1);
        $('#id_satuan3_rinc').val(0);
        unlock_hub_driver();

        if(document.frmModalRincian.hub_driver.value==1){
          eIndependent1();
        }
        if(document.frmModalRincian.hub_driver.value==2){
          eIndependent2();
        }
        if(document.frmModalRincian.hub_driver.value==3){
          eIndependent3();
        }
        if(document.frmModalRincian.hub_driver.value==4){
          eMixed1();
        }
        if(document.frmModalRincian.hub_driver.value==5){
          eMixed2();
        }
        if(document.frmModalRincian.hub_driver.value==6){
          eMixed3();
        }
        if(document.frmModalRincian.hub_driver.value==7){
          eMixed4();
        }
        if(document.frmModalRincian.hub_driver.value==8){
          eMixed5();
        }       
      }
  });


  $(function(){
        $.ajax({
          type: "GET",
          url: './getRefSatuan',
          dataType: "json",
          success: function(data) {

          var j = data.length;
          var post, i;

          $('select[name="id_satuan1"]').empty();
          $('select[name="id_satuan1"]').append('<option value="-1">---Pilih Satuan---</option>');
          $('select[name="id_satuan1"]').append('<option value="0">-- N/A --</option>');

          $('select[name="id_satuan2"]').empty();
          $('select[name="id_satuan2"]').append('<option value="-1">---Pilih Satuan---</option>');
          $('select[name="id_satuan2"]').append('<option value="0">-- N/A --</option>');

          $('select[name="id_satuan1_rinc"]').empty();
          $('select[name="id_satuan1_rinc"]').append('<option value="-1">---Pilih Satuan---</option>');
          $('select[name="id_satuan1_rinc"]').append('<option value="0">-- N/A --</option>');

          $('select[name="id_satuan2_rinc"]').empty();
          $('select[name="id_satuan2_rinc"]').append('<option value="-1">---Pilih Satuan---</option>');
          $('select[name="id_satuan2_rinc"]').append('<option value="0">-- N/A --</option>');

          $('select[name="id_satuan3_rinc"]').empty();
          $('select[name="id_satuan3_rinc"]').append('<option value="-1">---Pilih Satuan---</option>');
          $('select[name="id_satuan3_rinc"]').append('<option value="0">-- N/A --</option>');

          for (i = 0; i < j; i++) {
              post = data[i];
              $('select[name="id_satuan1"]').append('<option value="'+ post.id_satuan +'">'+ post.uraian_satuan +'</option>');
              $('select[name="id_satuan2"]').append('<option value="'+ post.id_satuan +'">'+ post.uraian_satuan +'</option>');
              $('select[name="id_satuan1_rinc"]').append('<option value="'+ post.id_satuan +'">'+ post.uraian_satuan +'</option>');
              $('select[name="id_satuan2_rinc"]').append('<option value="'+ post.id_satuan +'">'+ post.uraian_satuan +'</option>');
              $('select[name="id_satuan3_rinc"]').append('<option value="'+ post.id_satuan +'">'+ post.uraian_satuan +'</option>');
            }
              
          }
      });
    });

  $(function(){
        $.ajax({
          type: "GET",
          url: './getRefSatuan',
          dataType: "json",
          success: function(data) {

          // console.log(data)  

          var j = data.length;
          var post, i;

          $('select[name="id_satuan1_derivatif"]').empty();
          $('select[name="id_satuan1_derivatif"]').append('<option value="-1">--Pilih Satuan Derivarif--</option>');
          $('select[name="id_satuan1_derivatif"]').append('<option value="0">-- N/A --</option>');

          $('select[name="id_satuan2_derivatif"]').empty();
          $('select[name="id_satuan2_derivatif"]').append('<option value="-1">--Pilih Satuan Derivarif--</option>');
          $('select[name="id_satuan2_derivatif"]').append('<option value="0">-- N/A --</option>');

          for (i = 0; i < j; i++) {
              post = data[i];
              $('select[name="id_satuan1_derivatif"]').append('<option value="'+ post.id_satuan +'">'+ post.uraian_satuan +'</option>');
              $('select[name="id_satuan2_derivatif"]').append('<option value="'+ post.id_satuan +'">'+ post.uraian_satuan +'</option>');
            }
              
          }
      });
  });

  $(document).on('click', '.cetak-aktivitas', function() {
    $('.modal-title').text('Pencetakan Aktivitas ASB');
    $('.form-horizontal').show();
    $('#id_aktivitas_simulasi').val($(this).data('id_aktivitas_asb'));
    $('#aktivitas_simulasi').val($(this).data('ur_aktivitas'));    
    $('#v1_simulasi').val(1);
    $('#v2_simulasi').val(1);
    $('#SimulasiHitung').modal('show');    
  });

  $(document).on('click', '.btnSimulasi', function() {

    window.open('../printHitungSimulasiASB2/'+$('#id_aktivitas_simulasi').val()+'/'+$('#v1_simulasi').val()+'/'+$('#v2_simulasi').val());
    
  });
  

  function getJnsBiaya(){

    var xCheck = document.querySelectorAll('input[name="jns_biaya"]:checked');
    var xyz = [];
    for(var x = 0, l = xCheck.length; x < l;  x++)
      { xyz.push(xCheck[x].value); }
    var xvalues = xyz.join('');
    return xvalues;
  }

  function getHubDriver(){

    var xCheck = document.querySelectorAll('input[name="hub_driver"]:checked');
    var xyz = [];
    for(var x = 0, l = xCheck.length; x < l;  x++)
      { xyz.push(xCheck[x].value); }
    var xvalues = xyz.join('');
    return xvalues;
  }

  function getCekKomponen(){

    var xCheck = document.querySelectorAll('input[name="pilih_id"]:checked');
    var xyz = [];
    for(var x = 0, l = xCheck.length; x < l;  x++)
      { xyz.push(xCheck[x].value); }
    var xvalues = xyz.join('');
    return xvalues;
  }


$(document).on('click', '.copy-asb', function() {
  $('.form-horizontal').show();
  $('#tblCariKelompok').DataTable().ajax.reload(null,false);
  $("#CopyDataASB").modal('show');
    
  });

$(document).on('click', '.btnProsesCopyKelompok', function(e) {
    var rows_selected = carikelompok.column(0).checkboxes.selected(); 
    var rows_data = carikelompok.rows({ selected: true }).data();

    $('#ModalProgress').modal('show');
    $.each(rows_selected, function(index, rowId){
      var temp_id_x = 0;
      var id_kel = rowId;

      $.ajaxSetup({
          headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });

      $.ajax({
          type: "GET",
          url: './getTempKelompok/'+id_kel,
          dataType: "json",
          success: function(data) {
            var a = data.length;
            var postK, b;

            for (b = 0; b < a; b++) {
              postK = data[b];
              if(postK.temp_id==0){
                var temp_id_x = id_kel*id_kel;
              } else {
                var temp_id_x = postK.temp_id*id_kel;
              }          

              $.ajax({
                    type: 'post',
                    url: './CopyKelompok',
                    data: {
                      '_token': $('input[name=_token]').val(),
                      'temp_id': temp_id_x,
                      'id_asb_perkada': id_sk_asb,
                      'id_asb_kelompok': id_kel,
                    },
                  });
                    $.ajax({
                        type: "GET",
                        url: './getTempSubKelompok/'+id_kel,
                        dataType: "json",
                        success: function(data) {
                        var a = data.length;
                        var postSK, b;

                        for (b = 0; b < a; b++) {
                            postSK = data[b];
                            $.ajax({
                              type: 'post',
                              url: './CopySubKelompok',
                              data: {
                                '_token': $('input[name=_token]').val(),
                                'temp_id_n': temp_id_x*postSK.id_asb_sub_kelompok,
                                'temp_id_o': temp_id_x,
                                'id_asb_sub_kelompok': postSK.id_asb_sub_kelompok,
                                'id_asb_kelompok': id_kel,
                              },
                            });
                            $.ajax({
                                  type: "GET",
                                  url: './getTempSubSubKelompok/'+id_kel+'/'+postSK.id_asb_sub_kelompok,
                                  dataType: "json",
                                  success: function(data) {
                                  var c = data.length;
                                  var postSSK, d;

                                  for (d = 0; d < c; d++) {
                                      postSSK = data[d];
                                      $.ajax({
                                        type: 'post',
                                        url: './CopySubSubKelompok',
                                        data: {
                                            '_token': $('input[name=_token]').val(),
                                            'temp_id_n': temp_id_x*postSSK.id_asb_sub_sub_kelompok,
                                            'temp_id_o': temp_id_x*postSSK.id_asb_sub_kelompok,
                                            'id_asb_sub_sub_kelompok': postSSK.id_asb_sub_sub_kelompok,
                                            'id_asb_sub_kelompok': postSSK.id_asb_sub_kelompok,
                                        },
                                      });
                                      $.ajax({
                                        type: "GET",
                                        url: './getTempAktivitas/'+id_kel+'/'+postSSK.id_asb_sub_sub_kelompok,
                                        dataType: "json",
                                        success: function(data) {
                                        var f = data.length;
                                        var postAk, e;

                                        for (e = 0; e < f; e++) {
                                            postAk = data[e];
                                            $.ajax({
                                              type: 'post',
                                              url: './CopyAktivitas',
                                              data: {
                                                  '_token': $('input[name=_token]').val(),
                                                  'temp_id_n': temp_id_x*postAk.id_aktivitas_asb,
                                                  'temp_id_o': temp_id_x*postAk.id_asb_sub_sub_kelompok,
                                                  'id_aktivitas_asb': postAk.id_aktivitas_asb,
                                                  'id_asb_sub_sub_kelompok': postAk.id_asb_sub_sub_kelompok,
                                              },
                                            });
                                            $.ajax({
                                              type: "GET",
                                              url: './getTempKomponen/'+id_kel+'/'+postAk.id_aktivitas_asb,
                                              dataType: "json",
                                              success: function(data) {
                                              var h = data.length;
                                              var postKo, g;

                                              for (g = 0; g < h; g++) {
                                                  postKo = data[g];
                                                  $.ajax({
                                                    type: 'post',
                                                    url: './CopyKomponen2',
                                                    data: {
                                                        '_token': $('input[name=_token]').val(),
                                                        'temp_id_n': temp_id_x*postKo.id_komponen_asb,
                                                        'temp_id_o': temp_id_x*postKo.id_aktivitas_asb,
                                                        'id_komponen_asb': postKo.id_komponen_asb,
                                                        'id_aktivitas_asb': postKo.id_aktivitas_asb,
                                                    },
                                                  });
                                                  $.ajax({
                                                    type: "GET",
                                                    url: './getTempRincian/'+id_kel+'/'+postKo.id_komponen_asb,
                                                    dataType: "json",
                                                    success: function(data) {
                                                    var j = data.length;
                                                    var postRi, i;

                                                    for (i = 0; i < j; i++) {
                                                        postRi = data[i];
                                                        $.ajax({
                                                          type: 'post',
                                                          url: './CopyRincian',
                                                          data: {
                                                            '_token': $('input[name=_token]').val(),
                                                            'temp_id_o': temp_id_x*postRi.id_komponen_asb,
                                                            'id_komponen_asb': postRi.id_komponen_asb,
                                                            'id_komponen_asb_rinci': postRi.id_komponen_asb_rinci,
                                                            },
                                                          });
                                                      }
                                                    }
                                                  });
                                                }
                                              }
                                            });
                                          }
                                        }
                                      });
                                    }
                                  }
                            });
                        }
                      }
                    });
              }
            createPesan("Proses Copy Data Berhasil","success");
            $('#ModalProgress').modal('hide');
            $('#tblKelompok').DataTable().ajax.reload(null,false); 
          }
        });         
      });
    e.preventDefault(); 
  });

$(document).on('click', '.btnProsesCopyKomp', function(e) {
    var rows_selected = carikomponen.column(0).checkboxes.selected(); 
    var rows_data = carikomponen.rows({ selected: true }).data();

    $('#ModalProgress').modal('show');

    $.each(rows_selected, function(index, rowId){
           $.ajaxSetup({
           headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
            });

            $.ajax({
                type: 'post',
                url: './CopyKomponen',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'temp_id':rows_data[index].temp_komponen*rowId*id_aktiv_asb,
                    'id_aktivitas_asb': id_aktiv_asb,
                    'id_komponen_asb': rowId,
                },
                success: function(data) {
                    createPesan("Proses Copy Data Berhasil","success");
                    $('#ModalProgress').modal('hide');
                    $('#tblKomponen').DataTable().ajax.reload(null,false);
                },
                error: function(data) {
                    createPesan("Proses Copy Data Gagal ","danger");
                    $('#ModalProgress').modal('hide');
                    $('#tblKomponen').DataTable().ajax.reload(null,false);
                },
            });
      });
    e.preventDefault();
  });


  $(document).on('click', '.cetak-perkada', function() {
   window.open('../printListASB/'+$(this).data('id_perkada'));
  });

$(document).on('click', '.cetak-duplikasi', function() {
   window.open('../printDuplikasiASB/'+$(this).data('id_perkada'));
  });

$(document).on('click', '.cetak-validitas', function() {
   window.open('../printValiditasASB/'+$(this).data('id_perkada'));
  });


});
</script>
@endsection
