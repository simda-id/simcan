<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app0')

@section('content')
  <div class="container-fluid">        
      <div class="row">
        <div class="col-md-12">
            <?php
                $this->title = 'Perkada SSH';
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
            <p><h2 class="panel-title">Perkada Standar Satuan Harga</h2></p>
          </div>

          <div class="panel-body">

          <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#perkada" aria-controls="perkada" role="tab" data-toggle="tab">Perkada</a></li>
            <li><a href="#detailzona" aria-controls="detailzona" role="tab" data-toggle="tab">Zona Pemberlakukan SSH</a></li>
            <li><a href="#golongan" aria-controls="golongan" role="tab" data-toggle="tab">Golongan SSH</a></li>
            <li><a href="#kelompok" aria-controls="kelompok" role="tab" data-toggle="tab">Kelompok SSH</a></li>
            <li><a href="#subkelompok" aria-controls="subkelompok" role="tab" data-toggle="tab">Sub Kelompok SSH</a></li>
            <li><a href="#detailtarif" aria-controls="detailtarif" role="tab" data-toggle="tab">Detail Tarif Item SSH</a></li>
          </ul>

          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="perkada">
              <br>
              <div class="add">
                  <p><a id="btnPerkada" type="button" class="add-perkada btn btn-labeled btn-success">
                        <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Perkada</a>
                  </p>
              </div>
              <div class="table-responsive">
              <table id='tblPerkada' class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th width="30px" style="text-align: center; vertical-align:middle">No Perkada</th>
                          <th width="50px" style="text-align: center; vertical-align:middle">Tgl Perkada</th>
                          <th style="text-align: center; vertical-align:middle">Uraian Perkada</th>
                          <th width="50px" style="text-align: center; vertical-align:middle">Tahun Berlaku</th>
                          <th width="50px" style="text-align: center; vertical-align:middle">Status</th>
                          <th width="80px" style="text-align: center; vertical-align:middle">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                  </tbody>
              </table>
              </div>
            </div>

            <div role="tabpanel" class="tab-pane" id="detailzona">
            <br>
            <div id="divAddZona">
                <a id="btnAddZona" type="button" class="add-zonaperkada btn btn-labeled btn-success">
                        <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span> Tambah Zona SSH</a>
            </div>
            <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
              <div class="">
                <table class="table table-striped table-bordered table-responsive">
                  <tbody>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nomor Perkada SSH</td>
                      <td style="text-align: left; vertical-align:top;"><label id="no_sk_ssh" align='left'></label></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              </form>
              <div id=divDetailZona>
              <table id="tblDetailZona" class="table table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="30px" style="text-align: center; vertical-align:middle">No Urut</th>
                            <th width="30px" style="text-align: center; vertical-align:middle">No Zona</th>
                            <th style="text-align: center; vertical-align:middle">Uraian Zona</th>
                            <th width="15%" style="text-align: center; vertical-align:middle">Jumlah Item SSH</th>
                            <th width="80px" style="text-align: center; vertical-align:middle">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
              </table>
            </div>
            </div>

            <div role="tabpanel" class="tab-pane" id="golongan">
              <br>
              <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
                <div class="table-responsive">
                  <table class="table table-striped table-bordered">
                    <tbody>
                      <tr>
                        <td width="15%" style="text-align: left; vertical-align:top;">Nomor Perkada SSH</td>
                        <td style="text-align: left; vertical-align:top;"><label id="no_sk_ssh_gol" align='left'></label></td>
                      </tr>
                      <tr>
                        <td width="15%" style="text-align: left; vertical-align:top;">Uraian Zona SSH</td>
                        <td style="text-align: left; vertical-align:top;"><label id="nm_zona_gol" align='left'></label></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </form>
              <table id='tblGolongan' class="table display table-striped compact table-bordered table-responsive" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                          <th style="text-align: center; vertical-align:middle">Uraian Golongan</th>
                      </tr>
                  </thead>
                  <tbody>
                  </tbody>
              </table>
            </div>

            <div role="tabpanel" class="tab-pane" id="kelompok">
              <br>
              <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
                <div class="table-responsive">
                  <table class="table table-striped table-bordered">
                    <tbody>
                      <tr>
                        <td width="15%" style="text-align: left; vertical-align:top;">Nomor Perkada SSH</td>
                        <td style="text-align: left; vertical-align:top;"><label id="no_sk_ssh_kel" align='left'></label></td>
                      </tr>
                      <tr>
                        <td width="15%" style="text-align: left; vertical-align:top;">Uraian Zona SSH</td>
                        <td style="text-align: left; vertical-align:top;"><label id="nm_zona_kel" align='left'></label></td>
                      </tr>
                      <tr>
                        <td width="15%" style="text-align: left; vertical-align:top;">Uraian Golongan SSH</td>
                        <td style="text-align: left; vertical-align:top;"><label id="nm_gol_kel" align='left'></label></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </form>
              <div id="divKelompok">
              <table id="tblKelompok" class="table display table-striped compact table-bordered table-responsive" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                          <th style="text-align: center; vertical-align:middle">Uraian Kelompok</th>
                      </tr>
                  </thead>
                  <tbody>
                  </tbody>
              </table>
              </div>
            </div>

            <div role="tabpanel" class="tab-pane" id="subkelompok">
              <br>
              <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
                <div class="table-responsive">
                  <table class="table table-striped table-bordered">
                    <tbody>
                      <tr>
                        <td width="15%" style="text-align: left; vertical-align:top;">Nomor Perkada SSH</td>
                        <td style="text-align: left; vertical-align:top;"><label id="no_sk_ssh_skel" align='left'></label></td>
                      </tr>
                      <tr>
                        <td width="15%" style="text-align: left; vertical-align:top;">Uraian Zona SSH</td>
                        <td style="text-align: left; vertical-align:top;"><label id="nm_zona_skel" align='left'></label></td>
                      </tr>
                      <tr>
                        <td width="15%" style="text-align: left; vertical-align:top;">Uraian Golongan SSH</td>
                        <td style="text-align: left; vertical-align:top;"><label id="nm_gol_skel" align='left'></label></td>
                      </tr>
                      <tr>
                        <td width="15%" style="text-align: left; vertical-align:top;">Uraian Kelompok SSH</td>
                        <td style="text-align: left; vertical-align:top;"><label id="nm_kel_skel" align='left'></label></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </form>
              <div id="divSubKelompok">
              <table id="tblSubKelompok" class="table display compact table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                          <th style="text-align: center; vertical-align:middle">Uraian Sub Kelompok</th>
                      </tr>
                  </thead>
                  <tbody>
                  </tbody>
              </table>
              </div>
            </div>

            <div role="tabpanel" class="tab-pane" id="detailtarif">
            <br>
            <div class="add">
              <p><span id="btnAddTarif">
              <a class="add-tarif btn btn-success btn-labeled" data-toggle="popover" data-html="true" data-container="body" title="Perkada SSH" data-trigger="hover" data-content="Menambahkan satu per satu tarif per item SSH yang ada di struktur SSH.<br>Berguna untuk penyusunan tarif item pertama kali, atau jika ada penambahan struktur SSH dari Perkada sebelumnya">
              <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span> Tambah Tarif Item</a></span>
              <span id="btnCopyTarif"><a class="copy-tarif btn btn-primary btn-labeled" data-toggle="popover" data-html="true" data-container="body" title="Perkada SSH" data-trigger="hover" data-content="Menduplikasi keseluruhan tarif item SSH dari Perkada sebelumnya, atau dari struktur SSH yang tersedia.<br>Hati-hati ! Data tarif item SSH yang sudah terinput untuk Perkada ini akan ditambahkan dibawahnya."><span class="btn-label"><i class="fa fa-download fa-fw fa-lg"></i></span> Isi Data Item SSH</a></span>
              </p>
            </div>
            <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
              <div class="table-responsive">
                <table class="table table-striped table-bordered">
                  <tbody>
                    <tr>
                      <td width="20%" style="text-align: left; vertical-align:top;">Nomor Perkada SSH</td>
                      <td style="text-align: left; vertical-align:top;"><label id="no_sk_ssh_tarif" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="20%" style="text-align: left; vertical-align:top;">Uraian Zona SSH</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_zona_tarif" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="20%" style="text-align: left; vertical-align:top;">Uraian Golongan SSH</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_gol_tarif" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="20%" style="text-align: left; vertical-align:top;">Uraian Kelompok SSH</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_kel_tarif" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="20%" style="text-align: left; vertical-align:top;">Uraian Sub Kelompok SSH</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_skel_tarif" align='left'></label></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              </form>
              <div id="divDetailTarif">
                <table id="tblDetailTarif" class="table display table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th width="30px" style="text-align: center; vertical-align:middle">No Urut</th>
                          <th width="5%" style="text-align: center; vertical-align:middle">No Item</th>
                          <th style="text-align: center; vertical-align:middle">Uraian Item</th>
                          <th width="10%" style="text-align: center; vertical-align:middle">Satuan Item</th>
                          <th width="15%" style="text-align: center; vertical-align:middle">Nilai Satuan</th>
                          <th width="50px" style="text-align: center; vertical-align:middle">Aksi</th>
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

  <!--Modal Perkada -->
  <div id="TambahPerkada" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg"  >
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
      <!-- <form class="form-horizontal" role="form"> -->
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="{{ route('TambahPerkada') }}" method="post" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group">
                <label for="no_perkada" class="col-sm-3 control-label" align='left'>No Perkada :</label>
                <div class="col-sm-6">
                  <div class="input-group">
                    <input type="text" class="form-control" id="no_perkada" name="no_perkada" required="required" >
                    <span class="input-group-addon">
                      <a href="#" data-toggle="popover" data-container="body" title="Perkada SSH" data-trigger="hover" data-content="Diisi nomor Perkada SSH. Jika masih draft, diisi nomor dummy"><i class="glyphicon glyphicon-question-sign"></i></a>
                    </span>
                  </div>
                </div>
              </div>
              <div class="form-group has-feedback">
                <label for="tgl_perkada" class="col-sm-3 control-label" align='left'>Tanggal Perkada :</label>
                {{-- <div class="col-sm-3">
                  <input type="text" class="form-control" id="tgl_perkada" name="tgl_perkada" required="required" ><input type="text" class="form-control hide" id="tgl_perkada1">
                </div> --}}
                <input type="hidden" name="tgl_perkada1" id="tgl_perkada1">
                  <div class="col-sm-4">
                      <input type="text" class="form-control datepicker" id="tgl_perkada" name="tgl_perkada" style="text-align: center;">
                      <i class="fa fa-calendar fa-fw fa-lg text-primary form-control-feedback"></i>              
                  </div>
                <a href="#" data-toggle="popover" data-container="body" title="Perkada SSH" data-trigger="hover" data-content="Diisi tanggal Perkada SSH. Jika masih draft, diisi tanggal penyusunan draft"><i class="glyphicon glyphicon-question-sign"></i></a>
              </div>
              <div class="form-group">
                <label for="thn_perkada" class="col-sm-3 control-label" align='left'>Tahun Berlaku Perkada :</label>
                <div class="col-sm-2">
                  <div class="input-group">
                    <input type="text" class="form-control number" maxlength="4" id="thn_perkada" name="thn_perkada" required="required" >
                    <span class="input-group-addon">
                      <a href="#" data-toggle="popover" data-container="body" title="Perkada SSH" data-trigger="hover" data-content="Diisi tahun berlakunya SSH"><i class="glyphicon glyphicon-question-sign"></i></a>
                    </span>
                </div>
                </div>
                
              </div>
              <div class="form-group">
                <label for="ur_perkada" class="col-sm-3 control-label" align='left'>Uraian Perkada SSH :</label>
                <div class="col-sm-8">
                  <textarea type="text" class="form-control" rows="5" id="ur_perkada" name="ur_perkada" required="required" ></textarea>
                </div>
                <a href="#" data-toggle="popover" data-container="body" title="Perkada SSH" data-trigger="hover" data-content="Diisi nomenklatur Perkada SSH. Jika masih draft, diisi usulan nomenklatur Perkada SSH"><i class="glyphicon glyphicon-question-sign"></i></a>
              </div>
              
          </form>
        </div>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusBelanja">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-success actionBtn1 btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i id="footer_action_button1" class="glyphicon glyphicon-save"></i></span>Simpan</button>
                        <div class="or"></div>
                        <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
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
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="post" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" id="id_perkada_edit" name="id_perkada_edit">
              <div class="form-group">
                <label for="no_perkada_edit" class="col-sm-3 control-label" align='left'>No Perkada :</label>
                <div class="col-sm-6">
                  <div class="input-group">
                    <input type="text" class="form-control" id="no_perkada_edit" name="no_perkada_edit" required="required" >
                    <span class="input-group-addon">
                      <a href="#" data-toggle="popover" data-container="body" title="Perkada SSH" data-trigger="hover" data-content="Diisi nomor Perkada SSH. Jika masih draft, diisi nomor dummy"><i class="glyphicon glyphicon-question-sign"></i></a>
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
                <a href="#" data-toggle="popover" data-container="body" title="Perkada SSH" data-trigger="hover" data-content="Diisi tanggal Perkada SSH. Jika masih draft, diisi tanggal penyusunan draft"><i class="glyphicon glyphicon-question-sign"></i></a>
              </div>
              <div class="form-group">                
                <label for="thn_perkada_edit" class="col-sm-3 control-label" align='left'>Tahun Berlaku Perkada :</label>
                <div class="col-sm-2">
                    <div class="input-group">
                      <input type="text" class="form-control number" maxlength="4" id="thn_perkada_edit" name="thn_perkada_edit" required="required" >
                      <span class="input-group-addon">
                      <a href="#" data-toggle="popover" data-container="body" title="Perkada SSH" data-trigger="hover" data-content="Diisi tahun berlakunya SSH"><i class="glyphicon glyphicon-question-sign"></i></a>
                    </span>
                </div>
                </div>
                
              </div>
              <div class="form-group">
                <label for="ur_perkada_edit" class="col-sm-3 control-label" align='left'>Uraian Perkada SSH :</label>
                <div class="col-sm-8">
                    <textarea type="text" class="form-control" rows="5" id="ur_perkada_edit" name="ur_perkada_edit" required="required" ></textarea>
                </div>
                <a href="#" data-toggle="popover" data-container="body" title="Perkada SSH" data-trigger="hover" data-content="Diisi nomenklatur Perkada SSH. Jika masih draft, diisi usulan nomenklatur Perkada SSH"><i class="glyphicon glyphicon-question-sign"></i></a>
              </div>
          </form>
        </div>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusBelanja">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-success actionBtn btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i id="footer_action_button" class="glyphicon glyphicon-save"></i></span>Update</button>
                        <div class="or"></div>
                        <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
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
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
            <div class="alert alert-danger deleteContent">
                Yakin akan menghapus Perkada SSH Nomor : <strong><span class="uraian"></span></strong> ?
            <span class="hidden id_perkada_hapus"></span>
          </div>
        </div>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusBelanja">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-danger actionBtn btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i id="footer_action_button" class="glyphicon glyphicon-trash"></i></span>Hapus</button>
                        <div class="or"></div>
                        <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
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
                            <span class="btn-label"><i id="footer_action_button" class="glyphicon glyphicon-check"></i></span>Posting</button>
                        <div class="or"></div>
                        <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
        </div>
      </div>
    </div>

  <!--Modal Zona Perkada -->
  <div id="TambahZonaPerkada" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg"  >
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
      <!-- <form class="form-horizontal" role="form"> -->
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="{{ route('TambahZonaPerkada') }}" method="post" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              {{-- <input type="hidden" id="id_perkada_zona" name="id_perkada_zona"> --}}
              <div class="form-group">
                <label class="control-label col-sm-3" for="id_perkada_zona">Nomor Perkada SSH :</label>
                <div class="col-sm-8">
                  <label class="control-label" id="idperkada_zona" align='left'></label>
                  <input type="hidden" id="id_perkada_zona" name="id_perkada_zona" align='left'>
                </div>
              </div>
              <div class="form-group">
                <label for="no_urut_zona" class="col-sm-3 control-label" align='left'>Nomor Urut :</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control number" id="no_urut_zona" name="no_urut_zona" required="required" >
                </div>
                <a href="#" data-toggle="popover" data-container="body" title="Perkada SSH" data-trigger="hover" data-content="Diisi sesuai urutan nomor di pencetakan daftar SSH"><i class="glyphicon glyphicon-question-sign"></i></a>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="id_zona_ssh">Uraian Zona Pemberlakuan SSH :</label>
                <div class="col-sm-8">
      					 	<select class="form-control" name="id_zona_ssh" id="id_zona_ssh">
      					 		@foreach($refzona as $val)
                      <option value={{ $val->id_zona }}>{{ $val->keterangan_zona }}</option>
      					 		@endforeach
      					 	</select>
                </div>
                <a href="#" data-toggle="popover" data-container="body" title="Perkada SSH" data-trigger="hover" data-content="Pilih zona yang dimaksud dalam Perkada SSH"><i class="glyphicon glyphicon-question-sign"></i></a>
              </div>
          </form>
        </div>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusBelanja">
                        {{-- <button type="button" class="btn btn-sm btn-danger btnHapusBelanja btn-labeled">
                            <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>Hapus</button> --}}
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-success actionBtn1 btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i id="footer_action_button1" class="glyphicon glyphicon-save"></i></span>Simpan</button>
                        <div class="or"></div>
                        <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
        </div>
      </div>
    </div>

  <!--Modal Edit Zona Perkada -->
  <div id="EditZonaPerkada" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg"  >
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
      <!-- <form class="form-horizontal" role="form"> -->
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="post" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" id="id_zona_perkada_edit" name="id_zona_perkada_edit">
              <div class="form-group">
                <label class="control-label col-sm-3" for="id_perkada_zona_edit">Nomor Perkada SSH :</label>
                <div class="col-sm-8">
      					 	<label class="control-label" id="idperkada_zona_edit" align='left'></label>
                  <input type="hidden" id="id_perkada_zona_edit" name="id_perkada_zona_edit" align='left'>
                </div>
              </div>
              <div class="form-group">
                <label for="no_urut_zona_edit" class="col-sm-3 control-label" align='left'>Nomor Urut :</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control number" id="no_urut_zona_edit" name="no_urut_zona_edit" required="required" >
                </div>
                <a href="#" data-toggle="popover" data-container="body" title="Perkada SSH" data-trigger="hover" data-content="Diisi sesuai urutan nomor di pencetakan daftar SSH"><i class="glyphicon glyphicon-question-sign"></i></a>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="id_zona_ssh_edit">Uraian Zona Pemberlakuan SSH :</label>
                <div class="col-sm-8">
      					 	<select class="form-control" name="id_zona_ssh_edit" id="id_zona_ssh_edit">
      					 		@foreach($refzona as $val)
                      <option value={{ $val->id_zona }}>{{ $val->keterangan_zona }}</option>
      					 		@endforeach
      					 	</select>
                </div>
                <a href="#" data-toggle="popover" data-container="body" title="Perkada SSH" data-trigger="hover" data-content="Pilih zona yang dimaksud dalam Perkada SSH"><i class="glyphicon glyphicon-question-sign"></i></a>
              </div>
          </form>
        </div>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusBelanja">
                        {{-- <button type="button" class="btn btn-sm btn-danger btnHapusBelanja btn-labeled">
                            <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>Hapus</button> --}}
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-success actionBtn btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i id="footer_action_button" class="glyphicon glyphicon-save"></i></span>Update</button>
                        <div class="or"></div>
                        <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
        </div>
      </div>
    </div>

  <!--Modal Zona Perkada Hapus -->
  <div id="HapusZonaPerkada" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
            <div class=" alert alert-danger deleteContent">
                Yakin akan menghapus Zona ini <strong><span class="uraian"></span></strong> dalam Perkada SSH Nomor : <strong><span class="uraian1"></span></strong> ?
            <span class="hidden id_zona_perkada_hapus"></span>
          </div>
        </div>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusBelanja">
                        {{-- <button type="button" class="btn btn-sm btn-danger btnHapusBelanja btn-labeled">
                            <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>Hapus</button> --}}
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-success actionBtn btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i id="footer_action_button" class="glyphicon glyphicon-save"></i></span>Update</button>
                        <div class="or"></div>
                        <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
        </div>
      </div>
    </div>

  <!--Modal Tarif Perkada -->
  <div id="ModalTarifPerkada" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg"  >
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
      <!-- <form class="form-horizontal" role="form"> -->
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="{{ route('TambahTarifPerkada') }}" method="post" onsubmit="return false;">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" id="id_tarif_perkada" name="id_tarif_perkada">
              <input type="hidden" id="id_zona_perkada" name="id_zona_perkada">
              <div class="form-group">
                <label class="control-label col-sm-3" for="id_perkada_tarif">Nomor Perkada SSH :</label>
                <div class="col-sm-8">
      					 	<label class="control-label" id="idperkada_tarif" align='left'></label>
                  <input type="hidden" id="id_perkada_tarif" name="id_perkada_tarif" align='left'>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="id_zona_tarif">Zona Pemberlakuan SSH :</label>
                <div class="col-sm-8">
      					 	<label class="control-label" id="idzona_tarif" align='left'></label>
                  <input type="hidden" id="id_zona_tarif" name="id_zona_tarif" align='left'>
                </div>
              </div>
              <div class="form-group">
                <label for="no_urut_tarif" class="col-sm-3 control-label" align='left'>Nomor Item :</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control number" id="no_urut_tarif" name="no_urut_tarif" required="required" >
                </div>
                <a href="#" data-toggle="popover" data-container="body" title="Perkada SSH" data-html="true" data-trigger="hover" data-content="Diisi sesuai urutan nomor di pencetakan daftar SSH"><i class="glyphicon glyphicon-question-sign"></i></a>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="id_item_perkada">Item SSH :</label>
                <div class="col-sm-8">
      					 	<div class="input-group">
                    <input type="hidden" class="form-control" id="id_item_perkada" name="id_item_perkada" required="required" >
                    <input type="text" class="form-control" id="ur_item_perkada" name="ur_item_perkada" disabled>
                    <div class="input-group-btn">
                      <button class="btn btn-primary" data-toggle="modal" href="#cariItemSSH"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                  </div>
                </div>
                <a href="#" data-toggle="popover" data-container="body" title="Perkada SSH" data-html="true" data-trigger="hover" data-content="Pilih dari struktur SSH yang tersedia.<br>Jika diperlukan penambahan item SSH, tambahkan terlebih dahulu di menu Struktur SSH."><i class="glyphicon glyphicon-question-sign"></i></a>
                </div>
              <div class="form-group">
                <label for="rupiah_tarif" class="col-sm-3 control-label" align='left'>Jumlah Harga Satuan :</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control number" id="rupiah_tarif" name="rupiah_tarif" required="required" >
                </div>
              </div>
          </form>
        </div>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusBelanja">
                        {{-- <button type="button" class="btn btn-sm btn-danger btnHapusBelanja btn-labeled">
                            <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>Hapus</button> --}}
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-success btnTarif btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i id="nmbtnTarif" class="glyphicon glyphicon-save"></i></span>Simpan</button>
                        <div class="or"></div>
                        <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
        </div>
      </div>
    </div>

  <!--Modal CopyDataTarif -->
  <div id="CopyDataTarif" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"> Copy Data Item SSH</h4>
        </div>

      <div class="modal-body">
          <form name="frmModalCopy" class="form-horizontal" role="form" autocomplete='off' action="{{url('/asb/prosesASB')}}" method="" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group">
                <div class="col-sm-12">
                  <label class="control-label" for="id_zona_ssh_edit">Pilihan sumber data item yang akan di-copy:</label>
                  <div class="radio">
                  <label class="control-label">
                    <input type="radio" class="opt_copy" name="opt_copy" id="opt_copy" value="0" checked> Copy Data Item SSH dari Item di Referensi 
                    <a href="#" data-toggle="popover" data-container="body" title="Perkada SSH" data-html="true" data-trigger="hover" data-content="Copy data dari struktur SSH yang tersedia. Tarif item SSH akan bernilai nol rupiah."><i class="glyphicon glyphicon-question-sign"></i></a>
                  </label>
                  </div>
                  <div class="radio">
                  <label class="control-label">
                    <input type="radio" class="opt_copy" name="opt_copy" id="opt_copy" value="1"> Copy Data Item SSH dari Perkada yang ada 
                    <a href="#" data-toggle="popover" data-container="body" title="Perkada SSH" data-html="true" data-trigger="hover" data-content="Copy data dari Perkada yang sudah ada. Tarif item SSH akan sesuai tarif di Perkada tersebut."><i class="glyphicon glyphicon-question-sign"></i></a>
                  </label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-4" for="pilih_perkada">Nomor Perkada SSH :</label> 
                <div class="col-sm-7">                                  
                  <select class="form-control pilih_perkada" name="pilih_perkada" id="pilih_perkada">
                  </select>
                </div>
                  <a href="#" data-toggle="popover" data-container="body" title="Perkada SSH" data-html="true" data-trigger="hover" data-content="Jika copy dari Perkada yang sudah ada, pilih nomor Perkada yang akan di-copy datanya."><i class="glyphicon glyphicon-question-sign"></i></a>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-4" for="pilih_zona">Zona dalam Perkada :</label>  
                <div class="col-sm-7">                                 
                  <select class="form-control pilih_zona" name="pilih_zona" id="pilih_zona">
                  </select>
                </div>
                  <a href="#" data-toggle="popover" data-container="body" title="Perkada SSH" data-html="true" data-trigger="hover" data-content="Pilih zona yang akan di-copy struktur/tarif SSH-nya."><i class="glyphicon glyphicon-question-sign"></i></a>
              </div>            
            </form>
          </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusBelanja">
                        {{-- <button type="button" class="btn btn-sm btn-danger btnHapusBelanja btn-labeled">
                            <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>Hapus</button> --}}
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-success btnTransfer btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i id="nmTransfer" class="glyphicon glyphicon-import"></i></span>Update</button>
                        <div class="or"></div>
                        <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
                      </div>
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
                Yakin akan menghapus Item Tarif : <strong><span class="uraian"></span></strong> dalam Zona : <strong><span class="uraian1"></span></strong> ?
            <span class="hidden id_tarif_perkada_hapus"></span>
          </div>
        </div>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusBelanja">
                        {{-- <button type="button" class="btn btn-sm btn-danger btnHapusBelanja btn-labeled">
                            <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>Hapus</button> --}}
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-danger actionBtn btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i id="footer_action_button" class="glyphicon glyphicon-trash"></i></span>Update</button>
                        <div class="or"></div>
                        <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
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
  <form class="form-horizontal" role="form" autocomplete='off' action="" method="" onsubmit="return false;">
  <div class="form-group">
      <label class="control-label col-sm-2" for="id_item_perkada">Item SSH :</label>
        <div class="col-sm-7">
          <div class="input-group">
            <input type="text" class="form-control" id="param_cari" name="param_cari">
            <div class="input-group-btn">
              <button class="btn btn-primary" id="btnparam_cari" name="btnparam_cari"><i class="fa fa-search fa-fw fa-lg"></i></button>
            </div>
          </div>
        </div>
    </div>
   <div class="form-group">
   <div class="col-sm-12">
      <table id='tblItemSSH' class="table display table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
                <tr>
                  <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                  <th width="20%" style="text-align: center; vertical-align:middle">Sub Sub Kelompok</th>
                  <th width="30%" style="text-align: center; vertical-align:middle">Item SSH</th>
                  <th width="35%" style="text-align: center; vertical-align:middle">Merk/Spesifikasi/Keterangan Lainnya</th>
                  <th width="15%" style="text-align: center; vertical-align:middle">Satuan Item</th>
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
                        <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
                    </div>
                </div>
              </div>  
  </div>
  </div>
  </div>


@endsection

@section('scripts')
<script type="text/javascript" language="javascript" class="init" src="{{ asset('/protected/resources/views/ssh/perkada/js_perkada.js')}}"></script>
@endsection
