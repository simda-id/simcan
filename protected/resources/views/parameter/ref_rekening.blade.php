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
      <div></div><div></div><div></div><div></div>
      <div></div><div></div><div></div><div></div>
      <div></div><div></div><div></div><div></div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-info">
          <div class="panel-heading">
            <h2 class="panel-title">Referensi Kode Rekening</h2>
          </div>

          <div class="panel-body"><br>
            <div class="form-group">
              <button type="button" class="btn btn-primary btn-labeled btnLoad" data-dismiss="modal" aria-hidden="true">
                <span class="btn-label"><i class="fa fa-paper-plane fa-fw fa-lg"></i></span>Sinkronisasi Rekening Keuangan</button>
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
                  <div class="table-responsive">
                  <table id="tblAkun" class="table table-striped table-bordered table-responsive compact" width="100%" cellspacing="0">
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
                </div>  
                <div role="tabpanel" class="tab-pane fade in" id="golongan">
                  <br>
                  <div class="col-md-12">
                  <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
                      <div class="table-responsive">
                        <table class="table table-striped table-bordered table-responsive compact">
                          <tbody>
                            <tr>
                              <td width="20%" style="text-align: left; vertical-align:top;">Akun</td>
                              <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd" id="ur_akun" align='left'></label></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      </form>
                      <div class="table-responsive">
                      <table id="tblGolongan" class="table table-striped table-bordered table-responsive compact" width="100%" cellspacing="0">
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
                </div>  
                <div role="tabpanel" class="tab-pane fade in" id="jenis">
                  <br>
                  <div class="col-md-12">
                      <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
                      <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                          <tbody>
                            <tr>
                              <td width="20%" style="text-align: left; vertical-align:top;">Akun</td>
                              <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd" id="ur_akun_jenis" align='left'></label></td>
                            </tr>
                            <tr>
                              <td width="20%" style="text-align: left; vertical-align:top;">Golongan</td>
                              <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd" id="ur_golongan" align='left'></label></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      </form>
                      <div class="table-responsive">
                      <table id="tblJenis" class="table table-striped table-bordered table-responsive compact" width="100%" cellspacing="0">
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
              </div>
              <div role="tabpanel" class="tab-pane fade in" id="obyek">
                  <br>
                  <div class="col-md-12">
                      <div class="add">
                      <button id="btnTambahObyek" type="button" class="btn btn-labeled btn-sm btn-success">
                      <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>Tambah Obyek</button>
                  </div>
                      <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
                      <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                          <tbody>
                            <tr>
                              <td width="20%" style="text-align: left; vertical-align:top;">Akun</td>
                              <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd" id="ur_akun_obyek" align='left'></label></td>
                            </tr>
                            <tr>
                              <td width="20%" style="text-align: left; vertical-align:top;">Golongan</td>
                              <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd" id="ur_golongan_obyek" align='left'></label></td>
                            </tr>
                            <tr>
                              <td width="20%" style="text-align: left; vertical-align:top;">Jenis</td>
                              <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd" id="ur_jenis" align='left'></label></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      </form>
                    <div class="table-responsive">
                      <table id="tblObyek" class="table table-striped table-bordered table-responsive compact" width="100%" cellspacing="0">
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
                  </div> 
              <div role="tabpanel" class="tab-pane fade in" id="rincian">
                  <br>
                  <div class="col-md-12">
                      <div class="add">
                      <button id="btnTambahRincian" type="button" class="btn btn-labeled btn-sm btn-success">
                      <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>Tambah Rincian</button>
                  </div>
                      <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
                      <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                          <tbody>
                            <tr>
                              <td width="20%" style="text-align: left; vertical-align:top;">Akun</td>
                              <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd" id="ur_akun_rincian" align='left'></label></td>
                            </tr>
                            <tr>
                              <td width="20%" style="text-align: left; vertical-align:top;">Golongan</td>
                              <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd" id="ur_golongan_rincian" align='left'></label></td>
                            </tr>
                            <tr>
                              <td width="20%" style="text-align: left; vertical-align:top;">Jenis</td>
                              <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd" id="ur_jenis_rincian" align='left'></label></td>
                            </tr>
                            <tr>
                              <td width="20%" style="text-align: left; vertical-align:top;">Obyek</td>
                              <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd" id="ur_obyek" align='left'></label></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      </form>
                      <div class="table-responsive">
                      <table id="tblRincian" class="table table-striped table-bordered table-responsive compact" width="100%" cellspacing="0">
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
</div>

<!--Modal Tambah -->
<div id="ModalRek4" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg"  >
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form name="frmModalRek4" class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="rek4_id_akun" id="rek4_id_akun">
            <input type="hidden" name="rek4_id_golongan" id="rek4_id_golongan">
            <input type="hidden" name="rek4_id_jenis" id="rek4_id_jenis">
            <div class="form-group">
              <label for="rek4_kd_obyek" class="col-sm-3" align='left'>Kode Obyek</label>
              <div class="col-sm-2">
                <input type="text" class="form-control number" id="rek4_kd_obyek" name="rek4_kd_obyek" maxlength="4" ="" required="required" >
              </div>
            </div>            
            <div class="form-group">
              <label for="rek4_nm_obyek" class="col-sm-3" align='left'>Nama Obyek</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="rek4_nm_obyek" name="rek4_nm_obyek" required="required">
              </div>
            </div> 
        </form>
        <div class="modal-footer">
                <div class="row">
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
              <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border"  style="color:red;" aria-hidden="true"></i>
                <br>
                Yakin akan menghapus Obyek Rekening : <strong><span id="nm_rek4_hapus"></span></strong> ?
                <br>
                <br>
          </div>
          <div class="modal-footer">
            <div class="ui-group-buttons">
              <button type="button" class="btn btn-sm btn-danger btn-labeled btnDelRek4" data-dismiss="modal" ><span class="btn-label"><i id="footer_action_button" class="glyphicon glyphicon-trash"></i></span> Hapus</button>
              <div class="or"></div>
              <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true"><span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span> Tutup</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<div id="ModalRek5" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg"  >
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form name="frmModalRek5" class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="rek5_id_rekening" id="rek5_id_rekening">
            <input type="hidden" name="rek5_id_akun" id="rek5_id_akun">
            <input type="hidden" name="rek5_id_golongan" id="rek5_id_golongan">
            <input type="hidden" name="rek5_id_jenis" id="rek5_id_jenis">
            <input type="hidden" name="rek5_id_obyek" id="rek5_id_obyek">
            <div class="form-group">
              <label for="rek5_kd_rincian" class="col-sm-3" align='left'>Kode Rincian Obyek</label>
              <div class="col-sm-2">
                <input type="text" class="form-control number" id="rek5_kd_rincian" name="rek5_kd_rincian" maxlength="4" ="" required="required" >
              </div>
            </div>            
            <div class="form-group">
              <label for="rek5_nm_rincian" class="col-sm-3" align='left'>Nama Rincian Obyek</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="rek5_nm_rincian" name="rek5_nm_rincian" required="required">
              </div>
            </div> 
        </form>
        <div class="modal-footer">
                <div class="row">
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
              <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border"  style="color:red;" aria-hidden="true"></i>
                <br>
                Yakin akan menghapus Rincian Obyek : <strong><span id="nm_rek5_hapus"></span></strong> ?
                <br>
                <br>
          </div>
          <div class="modal-footer">
            <div class="ui-group-buttons">
              <button type="button" class="btn btn-sm btn-danger btn-labeled btnDelRek5" data-dismiss="modal" ><span class="btn-label"><i id="footer_action_button" class="glyphicon glyphicon-trash"></i></span> Hapus</button>
              <div class="or"></div>
              <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true"><span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span> Tutup</button>
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
          <h3><strong>Sedang proses...</strong></h3>
          <i class="fa fa-spinner fa-pulse fa-5x fa-fw" style="color:grey;"></i>
        </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('scripts')
<script  type="text/javascript" language="javascript" class="init">

$(document).ready(function() {

$('[data-toggle="popover"]').popover();

function createPesan(message, type) {
    var html = '<div class="alert alert-' + type + ' alert-dismissable page-alert col-md-12">';    
    html += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
    html += message;
    html += '</div>';    
    $(html).hide().prependTo('#pesan').slideDown();
};

$('.page-alert .close').click(function(e) {
        e.preventDefault();
        $(this).closest('.page-alert').slideUp();
    });

$('#prosesbar').hide();

$('.number').number(true,0,'', '');

$('.display').DataTable({
      dom : 'BfRtip',
      autoWidth : false,
      bDestroy: true
  });

var akun_temp, golongan_temp, jenis_temp, obyek_temp;
var akun_tbl, golongan_tbl, jenis_tbl, obyek_tbl, rincian_tbl;

akun_tbl = $('#tblAkun').DataTable({
                  processing: true,
                  serverSide: true,
                  dom : 'BFRtIP',
                  "autoWidth": false,
                  "ajax": {"url": "./rekening/getListAkun"},
                  "columns": [
                        { data: 'no_urut', sClass: "dt-center",width:"5%"},
                        { data: 'kd_rek_1', sClass: "dt-center",width:"5%"},
                        { data: 'nama_kd_rek_1'},
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
    });

$('#tblAkun tbody').on( 'dblclick', 'tr', function () {

  var data = akun_tbl.row(this).data();

  $('#ur_akun').text(data.nama_kd_rek_1);
  akun_temp= data.kd_rek_1;

  $('.nav-tabs a[href="#golongan"]').tab('show');
  LoadListGolongan(akun_temp);  

  } );

function LoadListGolongan(id_akun){
  golongan_tbl = $('#tblGolongan').DataTable({
                  processing: true,
                  serverSide: true,
                  dom : 'BFRtIP',
                  "autoWidth": false,
                  "ajax": {"url": "./rekening/getListGolongan/"+id_akun},
                  "columns": [
                        { data: 'no_urut', sClass: "dt-center",width:"5%"},
                        { data: 'kd_rek_1', sClass: "dt-center",width:"5%"},
                        { data: 'kd_rek_2', sClass: "dt-center",width:"5%"},
                        { data: 'nama_kd_rek_2'},
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
    });
}

$('#tblGolongan tbody').on( 'dblclick', 'tr', function () {

  var data = golongan_tbl.row(this).data();

  $('#ur_akun_jenis').text(data.nama_kd_rek_1);
  $('#ur_golongan').text(data.nama_kd_rek_2);
  akun_temp= data.kd_rek_1;
  golongan_temp= data.kd_rek_2;

  $('.nav-tabs a[href="#jenis"]').tab('show');
  LoadListJenis(akun_temp,golongan_temp);  

  } );

function LoadListJenis(id_akun,id_golongan){
jenis_tbl=$('#tblJenis').DataTable({
                  processing: true,
                  serverSide: true,
                  dom : 'BfRtip',                  
                  autoWidth : false,
                  "ajax": {"url": "./rekening/getListJenis/"+id_akun+"/"+id_golongan},
                  "language": {
                      "decimal": ",",
                      "thousands": "."},
                  "columns": [
                        { data: 'no_urut', sClass: "dt-center",width:"5%"},
                        { data: 'kd_rek_1', sClass: "dt-center",width:"5%"},
                        { data: 'kd_rek_2', sClass: "dt-center",width:"5%"},
                        { data: 'kd_rek_3', sClass: "dt-center",width:"5%"},
                        { data: 'nama_kd_rek_3'},
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        });
}

$('#tblJenis tbody').on( 'dblclick', 'tr', function () {

  var data = jenis_tbl.row(this).data();

  $('#ur_akun_obyek').text(data.nama_kd_rek_1);
  $('#ur_golongan_obyek').text(data.nama_kd_rek_2);
  $('#ur_jenis').text(data.nama_kd_rek_3);
  akun_temp= data.kd_rek_1;
  golongan_temp= data.kd_rek_2;
  jenis_temp= data.kd_rek_3;

  $('.nav-tabs a[href="#obyek"]').tab('show');
  LoadListObyek(akun_temp,golongan_temp,jenis_temp);  

  } );

function LoadListObyek(id_akun,id_golongan,id_jenis){
obyek_tbl=$('#tblObyek').DataTable({
                  processing: true,
                  serverSide: true,
                  dom : 'BfRtip',                  
                  autoWidth : false,
                  "ajax": {"url": "./rekening/getListObyek/"+id_akun+"/"+id_golongan+"/"+id_jenis},
                  "language": {
                      "decimal": ",",
                      "thousands": "."},
                  "columns": [
                        { data: 'no_urut', sClass: "dt-center",width:"5%"},
                        { data: 'kd_rek_1', sClass: "dt-center",width:"5%"},
                        { data: 'kd_rek_2', sClass: "dt-center",width:"5%"},
                        { data: 'kd_rek_3', sClass: "dt-center",width:"5%"},
                        { data: 'kd_rek_4', sClass: "dt-center",width:"5%"},
                        { data: 'nama_kd_rek_4'},
                        { data: 'action', 'searchable': false, width :"10%", 'orderable':false, sClass: "dt-center" }
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        });
}

$('#tblObyek tbody').on( 'dblclick', 'tr', function () {

  var data = obyek_tbl.row(this).data();

  $('#ur_akun_rincian').text(data.nama_kd_rek_1);
  $('#ur_golongan_rincian').text(data.nama_kd_rek_2);
  $('#ur_jenis_rincian').text(data.nama_kd_rek_3);
  $('#ur_obyek').text(data.nama_kd_rek_4);
  akun_temp= data.kd_rek_1;
  golongan_temp= data.kd_rek_2;
  jenis_temp= data.kd_rek_3;
  obyek_temp= data.kd_rek_4;

  $('.nav-tabs a[href="#rincian"]').tab('show');
  LoadListRincian(akun_temp,golongan_temp,jenis_temp,obyek_temp);  

  } );

function LoadListRincian(id_akun,id_golongan,id_jenis,id_obyek){
rincian_tbl=$('#tblRincian').DataTable({
                  processing: true,
                  serverSide: true,
                  dom : 'BfRtip',                  
                  autoWidth : false,
                  "ajax": {"url": "./rekening/getListRincian/"+id_akun+"/"+id_golongan+"/"+id_jenis+"/"+id_obyek},
                  "language": {
                      "decimal": ",",
                      "thousands": "."},
                  "columns": [
                        { data: 'no_urut', sClass: "dt-center",width:"5%"},
                        { data: 'kd_rek_1', sClass: "dt-center",width:"5%"},
                        { data: 'kd_rek_2', sClass: "dt-center",width:"5%"},
                        { data: 'kd_rek_3', sClass: "dt-center",width:"5%"},
                        { data: 'kd_rek_4', sClass: "dt-center",width:"5%"},
                        { data: 'kd_rek_5', sClass: "dt-center",width:"5%"},
                        { data: 'nama_kd_rek_5'},
                        { data: 'action', 'searchable': false, width :"10%", 'orderable':false, sClass: "dt-center" }
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        });
}

$(document).on('click', '#btnTambahObyek', function() {
  $('.btnRek4').removeClass('editRek4');
  $('.btnRek4').addClass('addRek4');
  $('.modal-title').text('Tambah Referensi Obyek Rekening ');
  $('.form-horizontal').show();
  $('#rek4_id_akun').val(akun_temp);
  $('#rek4_id_golongan').val(golongan_temp);
  $('#rek4_id_jenis').val(jenis_temp);
  $('#rek4_kd_obyek').val(0);
  $('#rek4_nm_obyek').val(null);
  
  $('#ModalRek4').modal('show');
});

$('.modal-footer').on('click', '.addRek4', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

//     alert($('#rek4_id_akun').val() +'/'+
// $('#rek4_id_golongan').val()+'/'+
// $('#rek4_id_jenis').val()+'/'+
// $('#rek4_kd_obyek').val()+'/'+
// $('#rek4_nm_obyek').val())

    $.ajax({
        type: 'post',
        url: './rekening/addRek4',
        data: {
            '_token': $('input[name=_token]').val(),
            'kd_rek_1' : $('#rek4_id_akun').val(),
            'kd_rek_2' : $('#rek4_id_golongan').val(),
            'kd_rek_3' : $('#rek4_id_jenis').val(),
            'kd_rek_4' : $('#rek4_kd_obyek').val(),
            'nama_kd_rek_4' : $('#rek4_nm_obyek').val(),
        },
        success: function(data) {
              $('#tblObyek').DataTable().ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
        },
  });
});



//edit function
var kd_rek_4a
$(document).on('click', '#btnEditObyek', function() {

var data = obyek_tbl.row( $(this).parents('tr') ).data();

  $('.btnRek4').removeClass('addRek4');
  $('.btnRek4').addClass('editRek4');
  $('.modal-title').text('Edit Referensi Obyek Rekening');
  $('.form-horizontal').show();
  $('#rek4_id_akun').val(data.kd_rek_1);
  $('#rek4_id_golongan').val(data.kd_rek_2);
  $('#rek4_id_jenis').val(data.kd_rek_3);
  $('#rek4_kd_obyek').val(data.kd_rek_4);
  kd_rek_4a = data.kd_rek_4;
  $('#rek4_nm_obyek').val(data.nama_kd_rek_4);
  
  $('#ModalRek4').modal('show');
});


$('.modal-footer').on('click', '.editRek4', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './rekening/editRek4',
        data: {
            '_token': $('input[name=_token]').val(),
            'kd_rek_1' : $('#rek4_id_akun').val(),
            'kd_rek_2' : $('#rek4_id_golongan').val(),
            'kd_rek_3' : $('#rek4_id_jenis').val(),
            'kd_rek_4' : $('#rek4_kd_obyek').val(),
            'kd_rek_4a' : kd_rek_4a,
            'nama_kd_rek_4' : $('#rek4_nm_obyek').val(),
        },
        success: function(data) {
            $('#tblObyek').DataTable().ajax.reload();
            if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
        }
    });
});

//delete function
$(document).on('click', '#btnHapusObyek', function() {

var data = obyek_tbl.row( $(this).parents('tr') ).data();

  $('.btnDelRek4').addClass('delRek4');
  $('.modal-title').text('Hapus Referensi Obyek Rekening');
  $('.form-horizontal').hide();
  
  $('#rek4_id_akun_hapus').val(data.kd_rek_1);
  $('#rek4_id_golongan_hapus').val(data.kd_rek_2);
  $('#rek4_id_jenis_hapus').val(data.kd_rek_3);
  $('#rek4_id_obyek_hapus').val(data.kd_rek_4);
  $('#nm_rek4_hapus').html(data.nama_kd_rek_4);

  $('#HapusRek4').modal('show');
  
});



$('.modal-footer').on('click', '.delRek4', function() {
  $.ajaxSetup({
     headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });

  $.ajax({
    type: 'post',
    url: './rekening/hapusRek4',
    data: {
      '_token': $('input[name=_token]').val(),
      'kd_rek_1' : $('#rek4_id_akun_hapus').val(),
      'kd_rek_2' : $('#rek4_id_golongan_hapus').val(),
      'kd_rek_3' : $('#rek4_id_jenis_hapus').val(),
      'kd_rek_4' : $('#rek4_id_obyek_hapus').val(),
    },
    success: function(data) {
      $('#tblObyek').DataTable().ajax.reload();
      if(data.status_pesan==1){
        createPesan(data.pesan,"success");
        } else {
        createPesan(data.pesan,"danger"); 
        }
    }
  });
});

$(document).on('click', '#btnTambahRincian', function() {
  $('.btnRek5').removeClass('editRek5');
  $('.btnRek5').addClass('addRek5');
  $('.modal-title').text('Tambah Data Referensi Rincian Obyek Rekening');
  $('.form-horizontal').show();
  $('#rek5_id_rekening').val(null);
  $('#rek5_id_akun').val(akun_temp);
  $('#rek5_id_golongan').val(golongan_temp);
  $('#rek5_id_jenis').val(jenis_temp);
  $('#rek5_id_obyek').val(obyek_temp);
  $('#rek5_kd_rincian').val(0);
  $('#rek5_nm_rincian').val(null);
  
  $('#ModalRek5').modal('show');
});

$('.modal-footer').on('click', '.addRek5', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './rekening/addRek5',
        data: {
            '_token': $('input[name=_token]').val(),
            'kd_rek_1' : $('#rek5_id_akun').val(),
            'kd_rek_2' : $('#rek5_id_golongan').val(),
            'kd_rek_3' : $('#rek5_id_jenis').val(),
            'kd_rek_4' : $('#rek5_id_obyek').val(),
            'kd_rek_5' : $('#rek5_kd_rincian').val(),
            'nama_kd_rek_5' : $('#rek5_nm_rincian').val(),
        },
        success: function(data) {
              $('#tblRincian').DataTable().ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
        },
  });
});

//edit function
$(document).on('click', '#btnEditRincian', function() {

var data = rincian_tbl.row( $(this).parents('tr') ).data();

  $('.btnRek5').removeClass('addKRek5');
  $('.btnRek5').addClass('editRek5');
  $('.modal-title').text('Edit Data Referensi Rincian Obyek Rekening');
  $('.form-horizontal').show();
  $('#rek5_id_rekening').val(data.id_rekening);
  $('#rek5_id_akun').val(data.kd_rek_1);
  $('#rek5_id_golongan').val(data.kd_rek_2);
  $('#rek5_id_jenis').val(data.kd_rek_3);
  $('#rek5_id_obyek').val(data.kd_rek_4);
  $('#rek5_kd_rincian').val(data.kd_rek_5);
  $('#rek5_nm_rincian').val(data.nama_kd_rek_5);
  
  $('#ModalRek5').modal('show');
});


$('.modal-footer').on('click', '.editRek5', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './rekening/editRek5',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_rekening' : $('#rek5_id_rekening').val(),
            'kd_rek_1' : $('#rek5_id_akun').val(),
            'kd_rek_2' : $('#rek5_id_golongan').val(),
            'kd_rek_3' : $('#rek5_id_jenis').val(),
            'kd_rek_4' : $('#rek5_id_obyek').val(),
            'kd_rek_5' : $('#rek5_kd_rincian').val(),
            'nama_kd_rek_5' : $('#rek5_nm_rincian').val(),
        },
        success: function(data) {
            $('#tblRincian').DataTable().ajax.reload();
            if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
        }
    });
});

//delete function
$(document).on('click', '#btnHapusRincian', function() {

var data = rincian_tbl.row( $(this).parents('tr') ).data();

  $('.btnDelRek5').addClass('delRek5');
  $('.modal-title').text('Hapus Data Referensi Rincian Obyek Rekening');
  $('.form-horizontal').hide();
  $('#rek5_id_rekening_hapus').val(data.id_rekening);
  $('#nm_rek5_hapus').html(data.nama_kd_rek_5);
  $('#HapusRek5').modal('show');
  
});

$('.modal-footer').on('click', '.delRek5', function() {
  $.ajaxSetup({
     headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });

  $.ajax({
    type: 'post',
    url: './rekening/hapusRek5',
    data: {
      '_token': $('input[name=_token]').val(),
      'id_rekening': $('#rek5_id_rekening_hapus').val(),
    },
    success: function(data) {
      $('.item' + $('.rek5_id_rekening_hapus').text()).remove();
      $('#tblRincian').DataTable().ajax.reload();
      createPesan(data.pesan,"success");
    }
  });
});

$(document).on('click', '.btnLoad', function() {   
    $('#prosesbar').show();
    $.ajax({
      type: 'get',
      url: '../../transfer/prosetrfrefrek5',

      dataType: 'json',
      success: function(data) {
        createPesan(data.pesan,"success");   
        $('#prosesbar').hide();
      },
      error: function (data) {
        createPesan(data.pesan,"success");   
        $('#prosesbar').hide();
      }
    });  
});

});
</script>
@endsection
