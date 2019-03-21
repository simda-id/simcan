<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.parameterlayout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?php
                $this->title = 'Wilayah Pemerintahan';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = 'admin/parameter';
                $breadcrumb->begin();
                $breadcrumb->add(['label' => $this->title]);
                $breadcrumb->end();
            ?>          
        </div>
    </div>
    <div id="pesan"></div>
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-info">
          <div class="panel-heading">
            <h2 class="panel-title">Referensi Wilayah Pemerintahan</h2>
          </div>

          <div class="panel-body">
            <div class='tabs-x tabs-above tab-bordered tabs-krajee'>
              <ul class="nav nav-tabs nav-justified" role="tablist">
                <li class="active"><a href="#kabkota" aria-controls="kabkota" role="tab" data-toggle="tab">Kabupaten/Kota</a></li>
                <li><a href="#kecamatan" aria-controls="kecamatan" role="tab" data-toggle="tab">Kecamatan</a></li>
                <li><a href="#desa" aria-controls="desa" role="tab-kv" data-toggle="tab">Desa</a></li>
              </ul>
              <div class="tab-content">
                <br>
                <div role="tabpanel" class="tab-pane fade in active" id="kabkota">
                  <div class="col-md-12">
                  <table id="tblKabkota" class="table table-striped table-bordered table-responsive compact" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="10%" style="text-align: center; vertical-align:middle">No Urut</th>
                                <th width="10%" style="text-align: center; vertical-align:middle">Kode Kab/Kota</th>
                                <th style="text-align: center; vertical-align:middle">Nama Kabupaten/Kota</th>
                                {{-- <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th> --}}
                            </tr>
                        </thead>
                        <tbody>                                        
                        </tbody>
                    </table> 
                  </div>  
                </div> 
                <div role="tabpanel" class="tab-pane fade in" id="kecamatan">
                  <div class="col-md-12">
                  <div class="add">
                      <button id="btnAddKecamatan" type="button" class="btn btn-labeled btn-sm btn-success"><span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>Tambah Kecamatan</button>
                  </div>
                  <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
                      <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                          <tbody>
                            <tr>
                              <td width="20%" style="text-align: left; vertical-align:top;">Nama Kabupaten/Kota</td>
                              <td style="text-align: left; vertical-align:top;"><label class="backKab" id="nm_kabkota" align='left'></label></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      </form>
                  <table id="tblKecamatan" class="table table-striped table-bordered table-responsive compact" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="10%" style="text-align: center; vertical-align:middle">No Urut</th>
                                <th width="10%" style="text-align: center; vertical-align:middle">Kode Kecamatan</th>
                                <th style="text-align: center; vertical-align:middle">Nama Kecamatan</th>
                                <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>                                        
                        </tbody>
                    </table> 
                  </div>  
                </div>  
                <div role="tabpanel" class="tab-pane fade in" id="desa">
                  <div class="col-md-12">
                      <div class="add">
                      <button id="btnTambahDesa" type="button" class="add-ProgRenja btn btn-labeled btn-sm btn-success">
                      <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>Tambah Desa</button>
                  </div>
                      <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
                      <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                          <tbody>
                            <tr>
                              <td width="20%" style="text-align: left; vertical-align:top;">Nama Kabupaten/Kota</td>
                              <td style="text-align: left; vertical-align:top;"><label class="backKab" id="nm_kabkota_desa" align='left'></label></td>
                            </tr>
                            <tr>
                              <td width="20%" style="text-align: left; vertical-align:top;">Nama Kecamatan</td>
                              <td style="text-align: left; vertical-align:top;"><label class="backKecamatan" id="nm_kecamatan" align='left'></label></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      </form>
                      <table id="tblDesa" class="table table-striped table-bordered table-responsive compact" width="100%" cellspacing="0">
                            <thead>
                              <tr>
                                  <th width='10%' style="text-align: center; vertical-align:middle">No Urut</th>
                                  <th width='10%' style="text-align: center; vertical-align:middle">Kode Desa/Kel</th>
                                  <th width='10%' style="text-align: center; vertical-align:middle">Status Wilayah</th>
                                  <th style="text-align: center; vertical-align:middle">Nama Desa/Kelurahan</th>
                                  <th width='10%' style="text-align: center; vertical-align:middle">Aksi</th>
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
<div id="ModalKecamatan" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg"  >
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form name="frmModalKecamatan" class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id_pemda" id="id_pemda">
            <input type="hidden" name="id_kecamatan" id="id_kecamatan">
            <div class="row">
            <div class="col-sm-2" style="text-align: center;">
              <i class="fa fa-map-marker fa-fw" style="font-size: 100px;color: #357EBD;"></i>
            </div>
            <div class="col-sm-10">
            <div class="form-group">
              <label for="kd_kecamatan" class="col-sm-3" align='left'>Kode Kecamatan</label>
              <div class="col-sm-2">
                <input type="text" class="form-control number" id="kd_kecamatan" name="kd_kecamatan" required="required" >
              </div>
            </div>            
            <div class="form-group">
              <label for="nama_kecamatan" class="col-sm-3" align='left'>Nama Kecamatan</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="nama_kecamatan" name="nama_kecamatan" required="required">
              </div>
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
                        <button type="button" class="btn btn-sm btn-success btnKecamatan btn-labeled" data-dismiss="modal">
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

<div id="ModalDesa" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg"  >
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form name="frmModalDesa" class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id_desa" id="id_desa">
            <input type="hidden" name="id_kecamatan_desa" id="id_kecamatan_desa">
            <div class="row">
            <div class="col-sm-2" style="text-align: center;">
              <i class="fa fa-thumb-tack fa-fw" style="font-size: 100px;color: #357EBD;"></i>
            </div>
            <div class="col-sm-10">
            <div class="form-group">
              <label for="kd_desa" class="col-sm-3">Kode Desa</label>
              <div class="col-sm-2">
                <input type="text" class="form-control number" id="kd_desa" name="kd_desa" required="required" >
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="status_desa">Status Wilayah</label>
                <div class="col-sm-3">
                  <select type="text" class="form-control" id="status_desa" name="status_desa">
                    <option value="1">Kelurahan</option>
                    <option value="2">Desa</option>
                  </select>
                </div>
            </div>            
            <div class="form-group">
              <label for="nama_desa" class="col-sm-3">Nama Desa</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="nama_desa" name="nama_desa" required="required">
              </div>
            </div> 
            <div class="form-group">
              <label class="control-label col-sm-3" for="id_zona">Zona Wilayah</label>
                <div class="col-sm-3">
                  <select type="text" class="form-control" id="id_zona" name="id_zona">
                  </select>
                </div>
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
                        <button type="button" class="btn btn-sm btn-success btnDesa btn-labeled" data-dismiss="modal">
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
<div id="HapusModal" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <input type="hidden" id="id_lokasi_hapus" name="id_indikator_hapus">
          <div class="alert alert-danger deleteContent">
              <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border"  style="color:red;" aria-hidden="true"></i>
                <br>
                Yakin akan menghapus Referensi Indikator Tahun : <strong><span id="nm_lokasi_hapus"></span></strong> ?
                <br>
                <br>
          </div>
        </div>
          <div class="modal-footer">
            <div class="ui-group-buttons">
              <button type="button" class="btn btn-sm btn-danger btn-labeled actionBtn" data-dismiss="modal" ><span class="btn-label"><i id="footer_action_button" class="glyphicon glyphicon-trash"></i></span> Hapus</button>
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

$('.number').number(true,0,',', '.');

$('.display').DataTable({
      dom : 'BfRtip',
      autoWidth : false,
      bDestroy: true
  });

var desa_tbl, id_kecamatan_temp, id_kab_temp;

$.ajax({
          type: "GET",
          url: './getZonaSSH',
          dataType: "json",
          success: function(data) {

          var j = data.length;
          var post, i;

          $('select[name="id_zona"]').empty();
          $('select[name="id_zona"]').append('<option value="-1">---Pilih Zona Wilayah---</option>');

          for (i = 0; i < j; i++) {
              post = data[i];
              $('select[name="id_zona"]').append('<option value="'+ post.id_zona +'">'+ post.keterangan_zona +'</option>');
            }
              
          }
      });

var kabkota_tbl=$('#tblKabkota').DataTable({
                  processing: true,
                  serverSide: true,
                  dom : 'BfRtip',                  
                  autoWidth : false,
                  "ajax": {"url": "./kecamatan/getListKabKota"},
                  "language": {
                      "decimal": ",",
                      "thousands": "."},
                  "columns": [
                        { data: 'no_urut','searchable': false, 'orderable':false, sClass: "dt-center", width :"10%"},
                        { data: 'kd_kab', sClass: "dt-center", width :"10%"},
                        { data: 'nama_kab_kota', sClass: "dt-left"}
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        });


var kecamatan_tbl;
function LoadListKecamatan(id_kab){
kecamatan_tbl=$('#tblKecamatan').DataTable({
                  processing: true,
                  serverSide: true,
                  dom : 'BfRtip',                  
                  autoWidth : false,
                  "ajax": {"url": "./kecamatan/getListKecamatan/"+id_kab},
                  "language": {
                      "decimal": ",",
                      "thousands": "."},
                  "columns": [
                        { data: 'no_urut','searchable': false, 'orderable':false, sClass: "dt-center", width :"10%"},
                        { data: 'kd_kecamatan', sClass: "dt-center", width :"10%"},
                        { data: 'nama_kecamatan', sClass: "dt-left"},
                        { data: 'action', 'searchable': false, width :"10%", 'orderable':false, sClass: "dt-center" }
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        });
}

function LoadListDesa(id_kecamatan){
desa_tbl=$('#tblDesa').DataTable({
                  processing: true,
                  serverSide: true,
                  dom : 'BfRtip',                  
                  autoWidth : false,
                  "ajax": {"url": "./kecamatan/getListDesa/"+id_kecamatan},
                  "language": {
                      "decimal": ",",
                      "thousands": "."},
                  "columns": [
                        { data: 'no_urut','searchable': false, 'orderable':false, sClass: "dt-center", width :"10%"},
                        { data: 'kd_desa', sClass: "dt-center", width :"10%"},
                        { data: 'status_display', sClass: "dt-center", width :"10%"},
                        { data: 'nama_desa', sClass: "dt-left"},
                        { data: 'action', 'searchable': false, width :"10%", 'orderable':false, sClass: "dt-center" }
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        });
}

$('#tblKabkota tbody').on( 'dblclick', 'tr', function () {

  var data = kabkota_tbl.row(this).data();

  $('#nm_kabkota').text(data.nama_kab_kota);
  id_kab_temp= data.id_kab;

  $('.nav-tabs a[href="#kecamatan"]').tab('show');
  LoadListKecamatan(data.id_kab);  

  });

$('#tblKecamatan tbody').on( 'dblclick', 'tr', function () {

  var data = kecamatan_tbl.row(this).data();

  $('#nm_kabkota_desa').text($('#nm_kabkota').text());
  $('#nm_kecamatan').text(data.nama_kecamatan);
  id_kecamatan_temp= data.id_kecamatan;

  $('.nav-tabs a[href="#desa"]').tab('show');
  LoadListDesa(data.id_kecamatan);  

  });

$(document).on('click', '#btnTambahDesa', function() {
  $('.btnDesa').removeClass('editDesa');
  $('.btnDesa').addClass('addDesa');
  $('.modal-title').text('Tambah Data Desa');
  $('.form-horizontal').show();
  $('#id_desa').val(null);
  $('#id_kecamatan_desa').val(id_kecamatan_temp);
  $('#kd_desa').val(0);
  $('#status_desa').val(1);
  $('#nama_desa').val(null);
  $('#id_zona').val(1);
  
  $('#ModalDesa').modal('show');
});

$('.modal-footer').on('click', '.addDesa', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    var str = $('#nama_desa').val();
    str = str.replace(/'/g, '\'');

    $.ajax({
        type: 'post',
        url: './kecamatan/addDesa',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_kecamatan' : $('#id_kecamatan_desa').val(),
            'kd_desa' : $('#kd_desa').val(),
            'status_desa' : $('#status_desa').val(),
            'nama_desa' : str,
            'id_zona' : $('#id_zona').val(),
        },
        success: function(data) {
              $('#tblDesa').DataTable().ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
        },
  });
});



//edit function
$(document).on('click', '#btnEditDesa', function() {

var data = desa_tbl.row( $(this).parents('tr') ).data();

  //HtmlEntities
  var strNamaDesa = $('<textarea />').html(data.nama_desa).text();

  $('.btnDesa').removeClass('addDesa');
  $('.btnDesa').addClass('editDesa');
  $('.modal-title').text('Edit Data Desa');
  $('.form-horizontal').show();
  $('#id_desa').val(data.id_desa);
  $('#id_kecamatan_desa').val(data.id_kecamatan);
  $('#kd_desa').val(data.kd_desa);
  $('#status_desa').val(data.status_desa);
  $('#nama_desa').val(strNamaDesa);
  $('#id_zona').val(data.id_zona);
  
  $('#ModalDesa').modal('show');
});


$('.modal-footer').on('click', '.editDesa', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    //apostrophe
    var str = $('#nama_desa').val();
    str = str.replace(/'/g, '\'');

    $.ajax({
        type: 'post',
        url: './kecamatan/editDesa',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_kecamatan' : $('#id_kecamatan_desa').val(),
            'kd_desa' : $('#kd_desa').val(),
            'id_desa' : $('#id_desa').val(),
            'status_desa' : $('#status_desa').val(),
            'nama_desa' : str,
            'id_zona' : $('#id_zona').val(),
        },
        success: function(data) {
            $('#tblDesa').DataTable().ajax.reload();
            if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
        }
    });
});

$(document).on('click', '#btnAddKecamatan', function() {
  $('.btnKecamatan').removeClass('edit');
  $('.btnKecamatan').addClass('add');
  $('.modal-title').text('Tambah Kecamatan');
  $('.form-horizontal').show();
  $('#id_pemda').val(1);
  $('#id_kecamatan').val(null);
  $('#kd_kecamatan').val(null);
  $('#nama_kecamatan').val(null);
  
  $('#ModalKecamatan').modal('show');
});

$('.modal-footer').on('click', '.add', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    var str = $('#nama_kecamatan').val();
    str = str.replace(/'/g, '\'');

    $.ajax({
        type: 'post',
        url: './kecamatan/addKecamatan',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_pemda' : $('#id_pemda').val(),
            'kd_kecamatan' : $('#kd_kecamatan').val(),
            'nama_kecamatan' : str,
        },
        success: function(data) {
              $('#tblKecamatan').DataTable().ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
        },
  });
});



//edit function
$(document).on('click', '#btnEditKecamatan', function() {

var data = kecamatan_tbl.row( $(this).parents('tr') ).data();

var str = $('<textarea />').html(data.nama_kecamatan).text();

  $('.btnKecamatan').removeClass('add');
  $('.btnKecamatan').addClass('edit');
  $('.modal-title').text('Edit Data Kecamatan');
  $('.form-horizontal').show();
  $('#id_pemda').val(data.id_pemda);
  $('#id_kecamatan').val(data.id_kecamatan);
  $('#kd_kecamatan').val(data.kd_kecamatan);
  $('#nama_kecamatan').val(str);
  
  $('#ModalKecamatan').modal('show');
});


$('.modal-footer').on('click', '.edit', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    var str = $('#nama_kecamatan').val();
    str = str.replace(/'/g, '\'');

    $.ajax({
        type: 'post',
        url: './kecamatan/editKecamatan',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_pemda' : $('#id_pemda').val(),
            'id_kecamatan' : $('#id_kecamatan').val(),
            'kd_kecamatan' : $('#kd_kecamatan').val(),
            'nama_kecamatan' : str,

        },
        success: function(data) {
            $('#tblKecamatan').DataTable().ajax.reload();
            if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
        }
    });
});

//delete function
$(document).on('click', '#btnHapusLokasi', function() {

var data = lokasi_tbl.row( $(this).parents('tr') ).data();

if(data.jenis_lokasi==0){
  createPesan("Maaf Lokasi Kewilayahan Hasil Impor tidak dapat dihapus","danger"); 
} else {
  $('.actionBtn').addClass('delete');
  $('.modal-title').text('Hapus Referensi lokasi');
  $('.form-horizontal').hide();
  $('#id_lokasi_hapus').val(data.id_lokasi);
  $('#nm_lokasi_hapus').html(data.nama_lokasi);
  $('#HapusModal').modal('show');
}
  
});



$('.modal-footer').on('click', '.delete', function() {
  $.ajaxSetup({
     headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });

  $.ajax({
    type: 'post',
    url: './kecamatan/hapusLokasi',
    data: {
      '_token': $('input[name=_token]').val(),
      'id_lokasi': $('#id_lokasi_hapus').val(),
    },
    success: function(data) {
      $('.item' + $('.id_lokasi_hapus').text()).remove();
      $('#tblLokasi').DataTable().ajax.reload();
      createPesan(data.pesan,"success");
    }
  });
});

});
</script>
@endsection
