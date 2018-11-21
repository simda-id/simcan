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
            {{-- <li><a href="#golongan" aria-controls="golongan" role="tab" data-toggle="tab">Golongan SSH</a></li> --}}
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
              <div class="table-responsive">
              <table id="tblDetailZona" class="table table-striped table-bordered"  cellspacing="0" width="100%">
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
                      <td width="15%" style="text-align: left; vertical-align:top;">Nomor Perkada SSH</td>
                      <td style="text-align: left; vertical-align:top;"><label id="no_sk_ssh_tarif" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Uraian Zona SSH</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_zona" align='left'></label></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              </form>
              <div id="divDetailTarif">
                <div class="table-responsive">
            <table id="tblDetailTarif" class="table display table-striped table-bordered"  cellspacing="0" width="100%">
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
<script type="text/javascript">

$(document).ready(function() {

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

  $('[data-toggle="popover"]').popover();

  var number = document.getElementById('rupiah_tarif');

// Listen for input event on numInput.
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

  $('.number').number(true,0,'','.');
  $('#thn_perkada').number(true,0,'', '');
  $('#thn_perkada_edit').number(true,0,'', '');
  $('#rupiah_tarif').number(true,2,',', '.');

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

  var perkada = $('#tblPerkada').DataTable( {
      processing: true,
      serverSide: true,
      deferRender: true,
      responsive: true,
      dom: 'BFrtip',
        "ajax":  {"url": "./getPerkada"},
        "columns": [
            { data: 'nomor_perkada', sClass: "dt-center"},
            { data: 'tanggal_perkada', sClass: "dt-center",
              render: function (data) {
              var date = new Date(data);
              return date.getDate() + "-" + (date.getMonth()+1) + "-" + date.getFullYear();
            }},
            { data: 'uraian_perkada'},
            { data: 'tahun_berlaku', sClass: "dt-center"},
            { data: 'status_perkada', sClass: "dt-center"},
            { data: 'action', 'searchable': false, 'orderable':false , sClass: "dt-center"}
            ],
        "order": [[0, 'asc']],
        "bDestroy": true,
        "autoWidth": false
  } );

  var detailzona = $('#tblDetailZona').DataTable( {
        deferRender: true,
        processing: true,
        serverSide: true,
        responsive: true,
        dom: 'Bfrtip',
        "ajax": {"url": "./getZona/0"},
        "columns": [
              { data: 'no_urut', sClass: "dt-center"},
              { data: 'id_zona', sClass: "dt-center"},
              { data: 'ur_zona'},
              { data: 'jml_item', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 0, '' )},
              { data: 'action', 'searchable': false, 'orderable':false , sClass: "dt-center"}
              ],
        "order": [[0, 'asc']],
        "bDestroy": true,
        "autoWidth": false
  });

var detailtarif_tbl;
function LoadItemSSH(id_zona){
  detailtarif_tbl = $('#tblDetailTarif').DataTable( {
        processing: true,
        serverSide: true,
        deferRender: true,
        responsive: true,
        scrollCollapse: true,
        "pagingType" : "input",
        "ajax": {"url": "./getTarifPerkada/"+id_zona},
        "language": {
              "decimal": ",",
              "thousands": "."},
        "columns": [
              { data: 'no_urut', sClass: "dt-center"},
              { data: 'no_tarif', sClass: "dt-center"},
              { data: 'ur_tarif'},
              { data: 'uraian_satuan', sClass: "dt-center"},
              { data: 'jml_rupiah', sClass: "dt-right",
                render: $.fn.dataTable.render.number( '.', ',', 0, 'Rp ' )},
              { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
        ],
        "order": [[0, 'asc']],
        "bDestroy": true,
        "autoWidth": false
  });}

var itemSSH
function LoadCariItem(param){
  itemSSH = $('#tblItemSSH').DataTable( {
        processing: true,
        serverSide: true,
        // dom: 'BFrtIp',
        "ajax": {"url": "./cariItemSSH/"+param},
        "columns": [
              { data: 'no_urut', sClass: "dt-center"},
              { data: 'uraian_sub_kelompok_ssh'},
              { data: 'uraian_tarif_ssh'},
              { data: 'keterangan_tarif_ssh'},
              { data: 'uraian_satuan', sClass: "dt-center"}
            ],
        "order": [[0, 'asc']],
        "bDestroy": true,
        "autoWidth": false
  });}



$(document).on('click', '#btnparam_cari', function() {
  if($('#param_cari').val()==""){
    param="a"
  } else {
    param=$('#param_cari').val();
  }

  LoadCariItem(param.toLowerCase());

});

  $('#tblItemSSH tbody').on( 'dblclick', 'tr', function () {

    var data = itemSSH.row(this).data();

    document.getElementById("id_item_perkada").value = data.id_tarif_ssh;
    document.getElementById("ur_item_perkada").value = data.uraian_tarif_ssh;

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

  var id_sk_ssh;
  var no_sk_ssh;
  var id_zonassh;
  var nm_zonassh;
  var id_zona;
  var nm_zona;
  var flag_perkada;

  if (flag_perkada == null && flag_perkada === undefined ){
    document.getElementById("divAddZona").style.visibility='hidden';
    document.getElementById("btnAddTarif").style.visibility='hidden';
    document.getElementById("btnCopyTarif").style.visibility='hidden';
  }

  $('#tblPerkada tbody').on('dblclick', 'tr', function () {
      
      var data = perkada.row( this ).data();

      // document.getElementById("nm_golongan_kel").innerHTML = nm_gol_ssh;
      
      id_sk_ssh =  data.id_perkada;
      no_sk_ssh = data.nomor_perkada;
      flag_perkada = data.flag;

      if (flag_perkada ==0 ){
        document.getElementById("divAddZona").style.visibility='visible';
      } else {
        document.getElementById("divAddZona").style.visibility='hidden';
      };

      document.getElementById("no_sk_ssh").innerHTML = no_sk_ssh;

      $('.nav-tabs a[href="#detailzona"]').tab('show');
      $('#tblDetailZona').DataTable().ajax.url("./getZona/"+id_sk_ssh).load();


    } );

  $('#tblDetailZona tbody').on('dblclick', 'tr', function () {
      
      var data = detailzona.row( this ).data();
      
      id_sk_ssh =  data.id_perkada;
      no_sk_ssh = data.no_perkada;
      flag_perkada = data.flag;
      id_zonassh =  data.id_zona_perkada;
      nm_zonassh = data.nama_zona;
      id_zona =  data.id_zona;
      nm_zona = data.ur_zona;

      if (flag_perkada ==0 ){
        document.getElementById("btnCopyTarif").style.visibility='visible';
        document.getElementById("btnAddTarif").style.visibility='visible';
      } else {
        document.getElementById("btnCopyTarif").style.visibility='hidden';
        document.getElementById("btnAddTarif").style.visibility='hidden';
      };

      document.getElementById("no_sk_ssh_tarif").innerHTML = no_sk_ssh;
      document.getElementById("nm_zona").innerHTML = nm_zona;

      $('.nav-tabs a[href="#detailtarif"]').tab('show');
      // $('#tblDetailTarif').DataTable().ajax.url("./getTarifPerkada/"+id_zonassh).load();
      LoadItemSSH(id_zonassh);

    } );

  //tambah perkada
  $(document).on('click', '.add-perkada', function() {
    $('#footer_action_button1').addClass('glyphicon-plus');
    $('#footer_action_button1').removeClass('glyphicon-trash');
    $('.actionBtn1').addClass('btn-success');
    $('.actionBtn1').removeClass('btn-danger');
    $('.actionBtn1').addClass('addPerkada');
    $('.modal-title').text('Tambah Data Peraturan Kepala Daerah tentang SSH');
    $('.form-horizontal').show();
    $('#TambahPerkada').modal('show');
  });

  $('.modal-footer').on('click', '.addPerkada', function() {
        $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });

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
                    if ((data.errors)){
                      $('.error').removeClass('hidden');
                    }
                    else {
                        $('.error').addClass('hidden');
                        $('#tblPerkada').DataTable().ajax.reload(null,false);
                        $('#tblPerkada').DataTable().page('last').draw('page');
                    }
                },
              });
            } else {
              $('#pesan').html('<div class="alert alert-danger col-md-12"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Maaf Status Draft Hanya Boleh Ada 1 buah, Silahkan Posting terlebih dahulu, atau diedit</div>');
              // alert("Maaf Status Draft Hanya Boleh Ada 1 buah, Silahkan Posting terlebih dahulu, atau diedit")
            }
          }
        });      
  });

  //Edit Rekening
  $(document).on('click', '.edit-perkada', function() {
    $('#footer_action_button').addClass('glyphicon-check');
    $('#footer_action_button').removeClass('glyphicon-trash');
    $('.actionBtn').addClass('btn-success');
    $('.actionBtn').removeClass('btn-danger');
    $('.actionBtn').addClass('editPerkada');
    $('.modal-title').text('Edit Data Peraturan Kepala Daerah tentang SSH');
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
              if(data.status_pesan==1){
              $('#pesan').html('<div class="alert alert-success col-md-12"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+data.pesan+'</div>');
              } else {
              $('#pesan').html('<div class="alert alert-danger col-md-12"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+data.pesan+'</div>');  
              } 
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
    $('.modal-title').text('Posting Data Peraturan Kepala Daerah tentang SSH');
    $('.uraian').html($(this).data('no_perkada'));
    $('.id_perkada').text($(this).data('id_perkada'));
    $('.flag_perkada').text($(this).data('flag_perkada')+1);
    $('#StatusPerkada').modal('show');
  });

  $('.modal-footer').on('click', '.editStatus', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

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
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
              } else {
                createPesan(data.pesan,"alert"); 
              } 
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
    $('.modal-title').text('Hapus Data Peraturan Kepala Daerah tentang SSH');
    $('.id_perkada_hapus').text($(this).data('id_perkada'));
    // $('.form-horizontal').hide();
    $('.uraian').html($(this).data('no_perkada'));
    $('#HapusPerkada').modal('show');
  });

  $('.modal-footer').on('click', '.delPerkada', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

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
        $('#pesan').html('<div class="alert alert-danger col-md-12"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+data.pesan+'</div>');
      }
    });
  });

  //tambah zona perkada
  $(document).on('click', '.add-zonaperkada', function() {
    $('#footer_action_button1').addClass('glyphicon-plus');
    $('#footer_action_button1').removeClass('glyphicon-trash');
    $('.actionBtn1').addClass('btn-success');
    $('.actionBtn1').removeClass('btn-danger');
    $('.actionBtn1').addClass('addzona');
    $('.modal-title').text('Tambah Data Zona Pemberlakuan SSH');
    $('.form-horizontal').show();
    $('#id_perkada_zona'). val(id_sk_ssh);
    document.getElementById("idperkada_zona").innerHTML = no_sk_ssh;
    $('#TambahZonaPerkada').modal('show');
  });

  $('.modal-footer').on('click', '.addzona', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: './addZonaPerkada',
          data: {
              '_token': $('input[name=_token]').val(),
              'no_urut': $('#no_urut_zona').val(),
              'id_perkada': $('#id_perkada_zona').val(),
              'id_zona': $('#id_zona_ssh').val(),
          },
          success: function(data) {
                  $('.error').addClass('hidden');
                  $('#tblDetailZona').DataTable().ajax.reload(null,false);
                  $('#tblDetailZona').DataTable().page('last').draw('page');
                  if(data.status_pesan==1){
                    $('#pesan').html('<div class="alert alert-success col-md-12"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+data.pesan+'</div>');
                  } else {
                    $('#pesan').html('<div class="alert alert-danger col-md-12"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+data.pesan+'</div>');  
                  } 
          },
      });
  });

  //Edit Zona Perkada
  $(document).on('click', '.edit-zona', function() {
    $('#footer_action_button').addClass('glyphicon-check');
    $('#footer_action_button').removeClass('glyphicon-trash');
    $('.actionBtn').addClass('btn-success');
    $('.actionBtn').removeClass('btn-danger');
    $('.actionBtn').addClass('editZonaPerkada');
    $('.modal-title').text('Edit Zona Pemberlakuan SSH');
    $('.form-horizontal').show();
    $('#id_perkada_zona_edit').val($(this).data('id_perkada'));
    document.getElementById("idperkada_zona_edit").innerHTML = no_sk_ssh;
    $('#no_urut_zona_edit').val($(this).data('no_urut'));
    $('#id_zona_ssh_edit').val($(this).data('id_zona'));
    $('#id_zona_perkada_edit').val($(this).data('id_zona_perkada'));
    $('#EditZonaPerkada').modal('show');
  });

  $('.modal-footer').on('click', '.editZonaPerkada', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: './editZonaPerkada',
          data: {
              '_token': $('input[name=_token]').val(),
              'no_urut': $('#no_urut_zona_edit').val(),
              'id_perkada': $('#id_perkada_zona_edit').val(),
              'id_zona': $('#id_zona_ssh_edit').val(),
              'id_zona_perkada': $('#id_zona_perkada_edit').val(),
          },
          success: function(data) {
              $('#tblDetailZona').DataTable().ajax.reload(null,false);
              if(data.status_pesan==1){
                $('#pesan').html('<div class="alert alert-success col-md-12"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+data.pesan+'</div>');
              } else {
                $('#pesan').html('<div class="alert alert-danger col-md-12"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+data.pesan+'</div>');  
              } 
          }
      });
  });

  //Hapus zona Perkada
  $(document).on('click', '.delete-zona', function() {
    $('#footer_action_button').removeClass('glyphicon-check');
    $('#footer_action_button').addClass('glyphicon-trash');
    $('.actionBtn').removeClass('btn-success');
    $('.actionBtn').addClass('btn-danger');
    $('.actionBtn').addClass('delZonaPerkada');
    $('.modal-title').text('Hapus Data Peraturan Kepala Daerah tentang SSH');
    $('.id_zona_perkada_hapus').text($(this).data('id_zona_perkada'));
    $('.uraian').html($(this).data('keterangan_zona'));
    $('.uraian1').html($(this).data('no_perkada'));
    $('#HapusZonaPerkada').modal('show');
  });

  $('.modal-footer').on('click', '.delZonaPerkada', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      type: 'post',
      url: './hapusZonaPerkada',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_zona_perkada': $('.id_zona_perkada_hapus').text()
      },
      success: function(data) {
        $('.item' + $('.id_zona_perkada_hapus').text()).remove();
        $('#tblDetailZona').DataTable().ajax.reload(null,false);
        $('#pesan').html('<div class="alert alert-danger col-md-12"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+data.pesan+'</div>');
      }
    });
  });

  $(document).on('click', '.add-tarif', function() {
    // $('#nmbtnTarif').text(" Simpan");
    // $('#nmbtnTarif').addClass('glyphicon-plus');
    // $('#nmbtnTarif').removeClass('glyphicon-check');
    $('.btnTarif').addClass('btn-success');
    $('.btnTarif').removeClass('edittarif');
    $('.btnTarif').addClass('addtarif');
    $('.modal-title').text('Tambah Data Tarif Item SSH');
    $('.form-horizontal').show();
    $('#id_perkada_tarif'). val(id_sk_ssh);
    document.getElementById("idperkada_tarif").innerHTML = no_sk_ssh;
    $('#id_zona_perkada'). val(id_zonassh);
    $('#id_zona_tarif'). val(id_zona);
    document.getElementById("idzona_tarif").innerHTML = nm_zona;
    $('#id_item_perkada'). val(null);
    $('#ur_item_perkada'). val(null);
    $('#no_urut_tarif').val(null);
    $('#rupiah_tarif').val(0);
    $('#ModalTarifPerkada').modal('show');
  });

  $('.modal-footer').on('click', '.addtarif', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: './addTarifPerkada',
          data: {
              '_token': $('input[name=_token]').val(),
              'no_urut': $('#no_urut_tarif').val(),
              'id_tarif_ssh': $('#id_item_perkada').val(),
              'id_zona_perkada': $('#id_zona_perkada').val(),
              'jml_rupiah': $('#rupiah_tarif').val(),
          },

          success: function(data) {
              $('.nav-tabs a[href="#detailtarif"]').tab('show');
                  $('.error').addClass('hidden');
                  $('#tblDetailTarif').DataTable().ajax.reload(null,false);
                  $('#tblDetailTarif').DataTable().page('last').draw('page');
                  if(data.status_pesan==1){
                  $('#pesan').html('<div class="alert alert-success col-md-12"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+data.pesan+'</div>');
                  } else {
                  $('#pesan').html('<div class="alert alert-danger col-md-12"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+data.pesan+'</div>');  
                  }
          },
      });
  });

  //Edit Tarif Perkada
  $(document).on('click', '.edit-tarif', function() {

    var data = detailtarif_tbl.row( $(this).parents('tr') ).data();

    $('.btnTarif').addClass('btn-success');
    $('.btnTarif').removeClass('addtarif');
    $('.btnTarif').addClass('edittarif');
    $('.modal-title').text('Edit Data Tarif Item SSH');
    $('.form-horizontal').show();
    $('#id_tarif_perkada').val(data.id_tarif_perkada);
    $('#id_perkada_tarif').val(data.id_perkada);
    $('#id_zona_perkada').val(data.id_zona_perkada);
    $('#no_urut_tarif').val(data.no_tarif);
    $('#id_zona_tarif').val(data.id_zona);
    $('#id_item_perkada').val(data.id_tarif_ssh);
    $('#rupiah_tarif').val(data.jml_rupiah);
    $('#ur_item_perkada'). val(data.ur_tarif);
    document.getElementById("idperkada_tarif").innerHTML = no_sk_ssh;
    document.getElementById("idzona_tarif").innerHTML = nm_zona;
    $('#ModalTarifPerkada').modal('show');
  });

  $('.modal-footer').on('click', '.edittarif', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: './editTarifPerkada',
          data: {
              '_token': $('input[name=_token]').val(),
              'no_urut': $('#no_urut_tarif').val(),
              'id_tarif_ssh': $('#id_item_perkada').val(),
              'id_zona_perkada': $('#id_zona_perkada').val(),
              'id_tarif_perkada': $('#id_tarif_perkada').val(),
              'jml_rupiah': $('#rupiah_tarif').val(),
          },
          success: function(data) {
              $('#tblDetailTarif').DataTable().ajax.reload(null,false);
              if(data.status_pesan==1){
                $('#pesan').html('<div class="alert alert-success col-md-12"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+data.pesan+'</div>');
              } else {
                $('#pesan').html('<div class="alert alert-danger col-md-12"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+data.pesan+'</div>');  
              } 
          }
      });
  });

  //Hapus Tarif  Perkada
  $(document).on('click', '.delete-tarif', function() {
    $('#footer_action_button').removeClass('glyphicon-check');
    $('#footer_action_button').addClass('glyphicon-trash');
    $('.actionBtn').removeClass('btn-success');
    $('.actionBtn').addClass('btn-danger');
    $('.actionBtn').addClass('delTarifPerkada');
    $('.modal-title').text('Hapus Data Tarif SSH');
    $('.id_tarif_perkada_hapus').text($(this).data('id_tarif_perkada'));
    $('.uraian').html($(this).data('ur_tarif'));
    $('.uraian1').html($(this).data('ur_zona'));
    $('#HapusTarifPerkada').modal('show');
  });

  $('.modal-footer').on('click', '.delTarifPerkada', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      type: 'post',
      url: './hapusTarifPerkada',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_tarif_perkada': $('.id_tarif_perkada_hapus').text()
      },
      success: function(data) {
        $('.item' + $('.id_tarif_perkada_hapus').text()).remove();
        $('#tblDetailTarif').DataTable().ajax.reload(null,false);
        $('#pesan').html('<div class="alert alert-danger col-md-12"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+data.pesan+'</div>');
      }
    });
  });

  $(document).on('click', '.copy-tarif', function() {

    $('#CopyDataTarif').modal('show');

    $.ajax({
          type: "GET",
          url: './getDataPerkada',
          data:"id_perkada="+ id_sk_ssh,
          dataType: "json",
          success: function(data) {

          var j = data.length;
          var post, i;

          $('select[name="pilih_perkada"]').empty();
          $('select[name="pilih_perkada"]').append('<option value="-1">---Pilih Nomor Perkada---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="pilih_perkada"]').append('<option value="'+ post.id_perkada +'">'+ post.nomor_perkada +'</option>');
          }
          }
      });
  });

  $(document).on('click', '.btnTransfer', function() {


      if (document.frmModalCopy.opt_copy.value==0){
          var id_zona_copy_new= id_zonassh;
          $.ajax({
            type: "POST",
            url: './copyTarifRef',
            // data: "name=" + name+ "&password=" + password,
            data:"id_zona_perkada="+ id_zona_copy_new,
            success: function(data) {
              $('#tblDetailTarif').DataTable().ajax.reload();
              $('#pesan').html('<div class="alert alert-info col-md-12"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil Copy Data</div>');
              // alert("Berhasil Copy Data");
            }
      });
    } else {

      if($('#pilih_zona').val()==null || $('#pilih_zona').val()=== undefined){
        // alert("Kode Zona yang terdapat dalam perkada masih kosong");
        $('#pesan').html('<div class="alert alert-danger col-md-12"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Kode Zona yang terdapat dalam perkada masih kosong</div>');
      } else {
        var id_zona_copy_new= id_zonassh;
          var id_perkada_copy = $('#pilih_perkada').val();
          var id_zona_copy = $('#pilih_zona').val();
              $.ajax({
                type: "POST",
                url: './copyTarifPerkada',
                data:"id_zona_perkada_new="+ id_zona_copy_new + "&id_zona_perkada=" + id_zona_copy + "&id_perkada=" + id_perkada_copy,
                success: function(data) {
                  $('#tblDetailTarif').DataTable().ajax.reload();
                  $('#pesan').html('<div class="alert alert-info col-md-12"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil Copy Data</div>');
                }
          });
      }

    }

    

  });

  $( ".pilih_perkada" ).change(function() {
      
      $.ajax({

          type: "GET",
          url: './getDataZona/'+$('#pilih_perkada').val(),
          dataType: "json",

          success: function(data) {

          var j = data.length;
          var post, i;

          $('select[name="pilih_zona"]').empty();
          $('select[name="pilih_zona"]').append('<option value="-1">---Pilih Zona---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="pilih_zona"]').append('<option value="'+ post.id_zona +'">'+ post.keterangan_zona +'</option>');
          }
          }
      });
    });

});
</script>
@endsection
