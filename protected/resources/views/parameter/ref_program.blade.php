<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.parameterlayout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?php
                $this->title = 'Program-Kegiatan';
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
            <h2 class="panel-title">Referensi Program - Kegiatan Perangkat Daerah</h2>
          </div>

          <div class="panel-body"><br>
            <div class="form-group">
              <button type="button" class="btn btn-primary btn-labeled btnLoad" data-dismiss="modal" aria-hidden="true">
                <span class="btn-label"><i class="fa fa-paper-plane fa-fw fa-lg"></i></span>Sinkronisasi Program-Kegiatan</button>
            </div>
            <div class='tabs-x tabs-above tab-bordered tabs-krajee'>
              <ul class="nav nav-tabs nav-justified" role="tablist">
                <li class="active"><a href="#urusan" aria-controls="urusan" role="tab" data-toggle="tab">Urusan-Bidang</a></li>
                <li><a href="#program" aria-controls="program" role="tab" data-toggle="tab">Program</a></li>
                <li><a href="#kegiatan" aria-controls="kegiatan" role="tab-kv" data-toggle="tab">Kegiatan</a></li>
              </ul>
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="urusan">
                  <div class="col-md-12">
                  <table id="tblUrusan" class="table table-striped table-bordered table-responsive compact" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="5px" style="text-align: center; vertical-align:middle"></th>
                                <th width="10%" style="text-align: center; vertical-align:middle">No Urut</th>
                                <th style="text-align: center; vertical-align:middle">Uraian Urusan Pemerintahan</th>
                            </tr>
                        </thead>
                        <tbody>                                        
                        </tbody>
                    </table>  
                  </div>  
                </div>  
                <div role="tabpanel" class="tab-pane fade in" id="program">
                  <div class="col-md-12">
                  <div class="add">
                      <button id="btnAddProgram" type="button" class="btn btn-labeled btn-sm btn-success"><span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>Tambah Program</button>
                  </div>
                  <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
                      <div class="table-responsive">
                        <table class="table table-striped table-bordered table-responsive compact">
                          <tbody>
                            <tr>
                              <td width="20%" style="text-align: left; vertical-align:top;">Urusan</td>
                              <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd" id="ur_urusan" align='left'></label></td>
                            </tr>
                            <tr>
                              <td width="20%" style="text-align: left; vertical-align:top;">Bidang</td>
                              <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd" id="ur_bidang" align='left'></label></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      </form>
                      <div class="table-responsive">
                  <table id="tblProgram" class="table table-striped table-bordered table-responsive compact" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="10%" style="text-align: center; vertical-align:middle">No Urut</th>
                                <th width="10%" style="text-align: center; vertical-align:middle">Kode Program</th>
                                <th style="text-align: center; vertical-align:middle">Nama Program</th>
                                <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>                                        
                        </tbody>
                    </table>
                    </div>  
                  </div>  
                </div>  
                <div role="tabpanel" class="tab-pane fade in" id="kegiatan">
                  <div class="col-md-12">
                      <div class="add">
                      <button id="btnTambahKegiatan" type="button" class="btn btn-labeled btn-sm btn-success">
                      <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>Tambah Kegiatan</button>
                  </div>
                      <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
                      <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                          <tbody>
                            <tr>
                              <td width="20%" style="text-align: left; vertical-align:top;">Urusan</td>
                              <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd" id="ur_urusan_keg" align='left'></label></td>
                            </tr>
                            <tr>
                              <td width="20%" style="text-align: left; vertical-align:top;">Bidang</td>
                              <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd" id="ur_bidang_keg" align='left'></label></td>
                            </tr>
                            <tr>
                              <td width="20%" style="text-align: left; vertical-align:top;">Program</td>
                              <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd" id="ur_program_keg" align='left'></label></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      </form>
                      <div class="table-responsive">
                      <table id="tblKegiatan" class="table table-striped table-bordered table-responsive compact" width="100%" cellspacing="0">
                            <thead>
                              <tr>
                                <th width="10%" style="text-align: center; vertical-align:middle">No Urut</th>
                                <th width="10%" style="text-align: center; vertical-align:middle">Kode Kegiatan</th>
                                <th style="text-align: center; vertical-align:middle">Nama Kegiatan</th>
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
              </tr>
            </thead>
            <tbody></tbody>
        </table>
</script>


<!--Modal Tambah -->
<div id="ModalProgram" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg"  >
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form name="frmModalProgram" class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id_bidang" id="id_bidang">
            <input type="hidden" name="id_program" id="id_program">
            <div class="form-group">
              <label for="kd_program" class="col-sm-3" align='left'>Kode Program</label>
              <div class="col-sm-2">
                <input type="text" class="form-control number" id="kd_program" name="kd_program" maxlength="4" ="" required="required" >
              </div>
            </div>            
            <div class="form-group">
              <label for="nm_program" class="col-sm-3" align='left'>Nama Program</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="nm_program" name="nm_program" required="required">
              </div>
            </div> 
        </form>
        <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left">                        
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-sm btn-success btnProgram btn-labeled" data-dismiss="modal">
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
<div id="HapusProgram" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <input type="hidden" id="id_program_hapus" name="id_program_hapus">
          <div class="alert alert-danger deleteContent">
              <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border"  style="color:red;" aria-hidden="true"></i>
                <br>
                Yakin akan menghapus Kegiatan : <strong><span id="nm_program_hapus"></span></strong> ?
                <br>
                <br>
          </div>
          <div class="modal-footer">
            <div class="ui-group-buttons">
              <button type="button" class="btn btn-sm btn-danger btn-labeled btnDelProgram" data-dismiss="modal" ><span class="btn-label"><i id="footer_action_button" class="glyphicon glyphicon-trash"></i></span> Hapus</button>
              <div class="or"></div>
              <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true"><span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span> Tutup</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<div id="ModalKegiatan" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg"  >
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form name="frmModalKegiatan" class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id_program_keg" id="id_program_keg">
            <input type="hidden" name="id_kegiatan" id="id_kegiatan">
            <div class="form-group">
              <label for="kd_kegiatan" class="col-sm-3" align='left'>Kode Kegiatan</label>
              <div class="col-sm-2">
                <input type="text" class="form-control number" id="kd_kegiatan" name="kd_kegiatan" maxlength="4" ="" required="required" >
              </div>
            </div>            
            <div class="form-group">
              <label for="nm_kegiatan" class="col-sm-3" align='left'>Nama Kegiatan</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="nm_kegiatan" name="nm_kegiatan" required="required">
              </div>
            </div>
        </form>
        <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left">                        
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-sm btn-success btnKegiatan btn-labeled" data-dismiss="modal">
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
<div id="HapusKegiatan" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <input type="hidden" id="id_kegiatan_hapus" name="id_kegiatan_hapus">
          <div class="alert alert-danger deleteContent">
              <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border"  style="color:red;" aria-hidden="true"></i>
                <br>
                Yakin akan menghapus Kegiatan : <strong><span id="nm_kegiatan_hapus"></span></strong> ?
                <br>
                <br>
          </div>
          <div class="modal-footer">
            <div class="ui-group-buttons">
              <button type="button" class="btn btn-sm btn-danger btn-labeled btnDelKegiatan" data-dismiss="modal" ><span class="btn-label"><i id="footer_action_button" class="glyphicon glyphicon-trash"></i></span> Hapus</button>
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

var template = Handlebars.compile($("#details-bidang").html());

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

var id_bidang_temp, id_program_temp;
var urusan_tbl, bidang_tbl, program_tbl, kegiatan_tbl;

urusan_tbl = $('#tblUrusan').DataTable({
                  processing: true,
                  serverSide: true,
                  dom : 'BFRtIP',
                  "autoWidth": false,
                  "ajax": {"url": "./program/getListUrusan"},
                  "columns": [
                        {
                            "className":      'details-control',
                            "orderable":      false,
                            "searchable":      false,
                            "data":           null,
                            "defaultContent": '',
                            "width" : "5px"
                        },
                        { data: 'no_urut', sClass: "dt-center",width:"10%"},
                        { data: 'nm_urusan'},
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
    });

function initTableBidang(tableId, data) {
    bidang_tbl=$('#' + tableId).DataTable({
            processing: true,
            serverSide: true,
            ajax: data.details_url,
            dom : 'BFRtIP',
            paging : false,
            autoWidth: false,
            columns: [
                { data: 'kd_bidang', name: 'kd_bidang', sClass: "dt-center", width:'10%' },
                { data: 'nm_bidang', name: 'nm_bidang' }
            ],
            "order": [[0, 'asc']],
            "bDestroy": true
        })

    $('#' + tableId+'  tbody').on( 'click', 'tr', function () {

        var data = bidang_tbl.row(this).data();

        id_bidang_temp = data.id_bidang;

        $('#ur_urusan').text(data.nm_urusan);
        $('#ur_bidang').text(data.nm_bidang);

        $('.nav-tabs a[href="#program"]').tab('show');
        LoadListProgram(id_bidang_temp);

    });

}

$('#tblUrusan tbody').on('click', 'td.details-control', function () {

        var tr = $(this).closest('tr');
        var row = urusan_tbl.row( tr );
        var tableId = 'bidang-' + row.data().kd_urusan;

        if (row.child.isShown()) {
            row.child.hide();
            tr.removeClass('shown');
        } else {
            row.child(template(row.data())).show();
            initTableBidang(tableId, row.data());
            tr.addClass('shown');
            tr.next().find('td').addClass('no-padding bg-gray');
        }    
  }); 

function LoadListProgram(id_bidang){
program_tbl=$('#tblProgram').DataTable({
                  processing: true,
                  serverSide: true,
                  dom : 'BfRtip',                  
                  autoWidth : false,
                  "ajax": {"url": "./program/getListProgram/"+id_bidang},
                  "language": {
                      "decimal": ",",
                      "thousands": "."},
                  "columns": [
                        { data: 'no_urut','searchable': false, 'orderable':false, sClass: "dt-center", width :"10%"},
                        { data: 'kd_program', sClass: "dt-center", width :"10%"},
                        { data: 'uraian_program', sClass: "dt-left"},
                        { data: 'action', 'searchable': false, width :"10%", 'orderable':false, sClass: "dt-center" }
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        });
}

function LoadListKegiatan(id_program){
kegiatan_tbl=$('#tblKegiatan').DataTable({
                  processing: true,
                  serverSide: true,
                  dom : 'BfRtip',                  
                  autoWidth : false,
                  "ajax": {"url": "./program/getListKegiatan/"+id_program},
                  "language": {
                      "decimal": ",",
                      "thousands": "."},
                  "columns": [
                        { data: 'no_urut','searchable': false, 'orderable':false, sClass: "dt-center", width :"10%"},
                        { data: 'kd_kegiatan', sClass: "dt-center", width :"10%"},
                        { data: 'nm_kegiatan', sClass: "dt-left"},
                        { data: 'action', 'searchable': false, width :"10%", 'orderable':false, sClass: "dt-center" }
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        });
}

$('#tblProgram tbody').on( 'dblclick', 'tr', function () {

  var data = program_tbl.row(this).data();

  $('#ur_urusan_keg').text(data.nm_urusan);
  $('#ur_bidang_keg').text(data.nm_bidang);
  $('#ur_program_keg').text(data.uraian_program);
  id_program_temp= data.id_program;

  $('.nav-tabs a[href="#kegiatan"]').tab('show');
  LoadListKegiatan(id_program_temp);  

  } );

$(document).on('click', '#btnAddProgram', function() {
  $('.btnProgram').removeClass('editProgram');
  $('.btnProgram').addClass('addProgram');
  $('.modal-title').text('Tambah Data Program');
  $('.form-horizontal').show();
  $('#id_bidang').val(id_bidang_temp);
  $('#id_program').val(null);
  $('#kd_program').val(0);
  $('#nm_program').val(null);
  
  $('#ModalProgram').modal('show');
});

$('.modal-footer').on('click', '.addProgram', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './program/addProgram',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_bidang' : $('#id_bidang').val(),
            'kd_program' : $('#kd_program').val(),
            'nm_program' : $('#nm_program').val(),
        },
        success: function(data) {
              $('#tblProgram').DataTable().ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
        },
  });
});



//edit function
$(document).on('click', '#btnEditProgram', function() {

var data = program_tbl.row( $(this).parents('tr') ).data();

  $('.btnProgram').removeClass('addProgram');
  $('.btnProgram').addClass('editProgram');
  $('.modal-title').text('Edit Data Program');
  $('.form-horizontal').show();
  $('#id_bidang').val(data.id_bidang);
  $('#id_program').val(data.id_program);
  $('#kd_program').val(data.kd_program);
  $('#nm_program').val(data.uraian_program);
  
  $('#ModalProgram').modal('show');
});


$('.modal-footer').on('click', '.editProgram', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './program/editProgram',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_bidang' : $('#id_bidang').val(),
            'id_program' : $('#id_program').val(),
            'kd_program' : $('#kd_program').val(),
            'nm_program' : $('#nm_program').val(),
        },
        success: function(data) {
            $('#tblProgram').DataTable().ajax.reload();
            if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
        }
    });
});

//delete function
$(document).on('click', '#btnHapusProgram', function() {

var data = program_tbl.row( $(this).parents('tr') ).data();

  $('.btnDelProgram').addClass('delProgram');
  $('.modal-title').text('Hapus Data Referensi Program');
  $('.form-horizontal').hide();
  $('#id_program_hapus').val(data.id_program);
  $('#nm_program_hapus').html(data.uraian_program);
  $('#HapusProgram').modal('show');
  
});



$('.modal-footer').on('click', '.delProgram', function() {
  $.ajaxSetup({
     headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });

  $.ajax({
    type: 'post',
    url: './program/hapusProgram',
    data: {
      '_token': $('input[name=_token]').val(),
      'id_program': $('#id_program_hapus').val(),
    },
    success: function(data) {
      $('.item' + $('.id_program_hapus').text()).remove();
      $('#tblProgram').DataTable().ajax.reload();
      createPesan(data.pesan,"success");
    }
  });
});

$(document).on('click', '#btnTambahKegiatan', function() {
  $('.btnKegiatan').removeClass('editKegiatan');
  $('.btnKegiatan').addClass('addKegiatan');
  $('.modal-title').text('Tambah Data Kegiatan');
  $('.form-horizontal').show();
  $('#id_program_keg').val(id_program_temp);
  $('#id_kegiatan').val(null);
  $('#kd_kegiatan').val(0);
  $('#nm_kegiatan').val(null);
  
  $('#ModalKegiatan').modal('show');
});

$('.modal-footer').on('click', '.addKegiatan', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './program/addKegiatan',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_program' : $('#id_program_keg').val(),
            'kd_kegiatan' : $('#kd_kegiatan').val(),
            'nm_kegiatan' : $('#nm_kegiatan').val(),
        },
        success: function(data) {
              $('#tblKegiatan').DataTable().ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
        },
  });
});

//edit function
$(document).on('click', '#btnEditKegiatan', function() {

var data = kegiatan_tbl.row( $(this).parents('tr') ).data();

  $('.btnKegiatan').removeClass('addKegiatan');
  $('.btnKegiatan').addClass('editKegiatan');
  $('.modal-title').text('Edit Data Kegiatan');
  $('.form-horizontal').show();
  $('#id_program_keg').val(data.id_program);
  $('#id_kegiatan').val(data.id_kegiatan);
  $('#kd_kegiatan').val(data.kd_kegiatan);
  $('#nm_kegiatan').val(data.nm_kegiatan);
  
  $('#ModalKegiatan').modal('show');
});


$('.modal-footer').on('click', '.editKegiatan', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './program/editKegiatan',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_kegiatan' : $('#id_kegiatan').val(),
            'id_program' : $('#id_program_keg').val(),
            'kd_kegiatan' : $('#kd_kegiatan').val(),
            'nm_kegiatan' : $('#nm_kegiatan').val(),

        },
        success: function(data) {
            $('#tblKegiatan').DataTable().ajax.reload();
            if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
        }
    });
});

//delete function
$(document).on('click', '#btnHapusKegiatan', function() {

var data = kegiatan_tbl.row( $(this).parents('tr') ).data();

  $('.btnDelKegiatan').addClass('delKegiatan');
  $('.modal-title').text('Hapus Data Referensi Kegiatan');
  $('.form-horizontal').hide();
  $('#id_kegiatan_hapus').val(data.id_kegiatan);
  $('#nm_kegiatan_hapus').html(data.nm_kegiatan);
  $('#HapusKegiatan').modal('show');
  
});



$('.modal-footer').on('click', '.delKegiatan', function() {
  $.ajaxSetup({
     headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });

  $.ajax({
    type: 'post',
    url: './program/hapusKegiatan',
    data: {
      '_token': $('input[name=_token]').val(),
      'id_kegiatan': $('#id_kegiatan_hapus').val(),
    },
    success: function(data) {
      $('.item' + $('.id_kegiatan_hapus').text()).remove();
      $('#tblKegiatan').DataTable().ajax.reload();
      createPesan(data.pesan,"success");
    }
  });
});

$(document).on('click', '.btnLoad', function() {   
    $('#prosesbar').show();
    $.ajax({
      type: 'get',
      url: '../../transfer/prosestrfApiprogram',

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
