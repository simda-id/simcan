<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app6')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?php
                $this->title = ' API Management ';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = 'transfer';
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
            <h2 class="panel-title">SIPD Kemendagri</h2>
          </div>

          <div class="panel-body">
            <div class="add">
              <p><a class="add-satuan btn-labeled btn btn-sm btn-success"><span class="btn-label"><i class="fa fa-cloud-upload fa-lg fa-fw"></i></span> Kirim Data ke SIPD</a></p>
            </div>
            <br>
            <table id="TblLogKirim" class="table display compact table-striped table-bordered table-responsive" width="100%">
                  <thead>
                      <tr>
                          <th width="5%" height="50px" style="text-align: center; vertical-align:middle">No Urut</th>
                          <th width="12%" height="50px" style="text-align: center; vertical-align:middle">Tanggal Kirim</th>
                          <th width="8%" height="50px" style="text-align: center; vertical-align:middle">Kode Unit</th>
                          <th width="30%" height="50px" style="text-align: center; vertical-align:middle">Nama Unit</th>
                          <th height="50px" style="text-align: center; vertical-align:middle">Log Kirim</th>
                          <th width="10%" height="50px" style="text-align: center; vertical-align:middle">Aksi</th>
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


<!--Modal Tambah -->
<div id="frmKirimApi" class="modal fade" role="dialog" tabindex="-1" data-focus-on="input:first" data-backdrop="static">
  <div class="modal-dialog modal-lg"  >
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" >Daftar Unit OPD yang siap dikirim </h3>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" role="form" autocomplete='off' action="" onsubmit="return false;">
        <div class="form-group">
          <label class="control-label col-sm-3" for="title">No Dokumen RKPD :</label>
          <div class="col-sm-8">
              <select type="text" class="form-control id_dokumen_rkpd" id="id_dokumen_rkpd" name="id_dokumen_rkpd"></select>
          </div>
        </div>
        <div class="form-group">
        <div class="col-sm-12">
          <table id='tblProses' class="table display compact table-striped table-bordered" width="100%">
              <thead>
                    <tr>
                      <th width="10px" style="text-align: center; vertical-align:middle">Pilih</th>
                      <th width="15%" style="text-align: center; vertical-align:middle">Kode Unit</th>
                      <th style="text-align: center; vertical-align:middle">Nama Unit</th>
                      <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
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
            <div class="col-sm-2 text-left">
                <button id="btnProsesAll" type="button" class="btn btn-labeled btn-success"><span class="btn-label"><i class="fa fa-paper-plane-o fa-fw fa-lg"></i></span> Proses Load</button>
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

function createPesan(message, type) {
    var html = '<div id="pesanx" class="alert alert-' + type + ' alert-dismissable flyover flyover-bottom in">';    
    html += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';   
    html += '<p><strong>'+message+'</strong></p>';
    html += '</div>';    
    $(html).hide().prependTo('#pesan').slideDown();

    setTimeout(function() {
        $('#pesanx').removeClass('in');
         }, 1500);
  };

$('.page-alert .close').click(function(e) {
  e.preventDefault();
  $(this).closest('.page-alert').slideUp();
});

$('.number').number(true,0,',', '.');
$('[data-toggle="popover"]').popover();

$.ajax({
  type: "GET",
  url: 'getDokRkpd',
  dataType: "json",
  success: function(data) {

  var j = data.length;
  var post, i;

  $('select[name="id_dokumen_rkpd"]').empty();
  $('select[name="id_dokumen_rkpd"]').append('<option value="0">---Pilih Dokumen RKPD---</option>');

  for (i = 0; i < j; i++) {
    post = data[i];
    $('select[name="id_dokumen_rkpd"]').append('<option value="'+ post.id_dokumen_rkpd +'">'+ post.nomor_display +'</option>');
  }
  }
});

var TblUnitKirim;
function loadTblUnitKirim(id_dokumen_keu){ 
vars = "?id_dokumen=" + id_dokumen_keu;   
TblUnitKirim=$('#tblProses').DataTable({
  processing: true,
  serverSide: true,
  autoWidth : false,
  language: {
        "decimal": ",",
        "thousands": ".",
        "sEmptyTable":   "Tidak ada data yang tersedia pada tabel ini",
        "sProcessing":   "Sedang memproses...",
        "sLengthMenu":   "Tampilkan _MENU_ entri",
        "sZeroRecords":  "Tidak ditemukan data yang sesuai",
        "sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
        "sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
        "sInfoPostFix":  "",
        "sSearch":       "Cari:",
        "sUrl":          "",
        "oPaginate": {
            "sFirst":    "Pertama",
            "sPrevious": "Sebelumnya",
            "sNext":     "Selanjutnya",
            "sLast":     "Terakhir"
        }
  },
  "pageLength": 50,
  "lengthMenu": [[10, 50, -1], [10, 50, "All"]],
  "bDestroy": true,
  "ajax": {"url": "./getUnitRkpd"+ vars},
  'columnDefs': [
    { 'width': 10,
      'targets': 0,
      'checkboxes': {'selectRow': true } },
    { "targets": 1, "width": 10 }
  ],
  'select': { 'style': 'multi' },
  "columns": [
    { data: 'id_unit', sClass: "dt-center", searchable: false, orderable:false,},
    { data: 'kode_unit', sClass: "dt-center", width:"5px"},
    { data: 'nama_unit'},                        
    { data: 'action', 'searchable': false, width :"10%", 'orderable':false, sClass: "dt-center"}
  ],
  "order": [[0, 'asc']],
  });
}  

$( ".id_dokumen_rkpd" ).change(function() {
  loadTblUnitKirim($('#id_dokumen_rkpd').val());
});

var TblLogKirims; 
TblLogKirims=$('#TblLogKirim').DataTable({
    processing: true,
    serverSide: true,
    autoWidth : false,
    language: {
      "decimal": ",",
      "thousands": ".",
      "sEmptyTable":   "Tidak ada data yang tersedia pada tabel ini",
      "sProcessing":   "Sedang memproses...",
      "sLengthMenu":   "Tampilkan _MENU_ entri",
      "sZeroRecords":  "Tidak ditemukan data yang sesuai",
      "sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
      "sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
      "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
      "sInfoPostFix":  "",
      "sSearch":       "Cari:",
      "sUrl":          "",
      "oPaginate": {
          "sFirst":    "Pertama",
          "sPrevious": "Sebelumnya",
          "sNext":     "Selanjutnya",
          "sLast":     "Terakhir"
      }
    },
    "pageLength": 50,
    "lengthMenu": [[10, 50, -1], [10, 50, "All"]],
    "ajax": {"url": "./getdata"},
    "columns": [
          { data: 'no_urut', sClass: "dt-center", searchable: false, orderable:false,},
          { data: 'tgl_kirim', sClass: "dt-center"},
          { data: 'kodeskpd', sClass: "dt-center"},
          { data: 'uraiskpd', sClass: "dt-left"},
          { data: 'log_kirim','searchable': true, 'orderable':true, sClass: "dt-left",
            render: function(data, type, row,meta) {
            return row.log_kirim + '   <span class="label" style="background-color: '+row.status_warna+'; color:#fff;">'+row.status_label+'</span>  ';
          }},                      
          { data: 'action', 'searchable': false, width :"10%", 'orderable':false, sClass: "dt-center"}
        ],
    "order": [[0, 'asc']],
    "bDestroy": true
  });

$(document).on('click', '.add-satuan', function() {
  $('.form-horizontal').show();
  loadTblUnitKirim($('#id_dokumen_rkpd').val());
  $('#tblProses').DataTable().ajax.reload(null,false);
  $('#frmKirimApi').modal('show');
});

$(document).on('click', '#btnProsesKirim', function() {
  var data = TblUnitKirim.row( $(this).parents('tr') ).data();
  var id_unit=data.id_unit;

    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $('#ModalProgress').modal('show');
    $('#frmKirimApi').modal('hide'); 

    $.ajax({
        type: 'POST',
        url: './postJSONBangda',
        data: {
          '_token': $('input[name=_token]').val(),
          'id_unit' : id_unit,
      },
      success: function(data) {
        $('#TblLogKirim').DataTable().ajax.reload(null,false);
        createPesan(data.pesan,"success");
        $('#ModalProgress').modal('hide');
      },
      error: function(data){
        $('#TblLogKirim').DataTable().ajax.reload(null,false);
        createPesan(data.pesan,"danger");
        $('#ModalProgress').modal('hide');
      }
    });
});

$(document).on('click', '#btnProsesAll', function() {
  var rows_selected = TblUnitKirim.column(0).checkboxes.selected();
  var counts_selected = rows_selected.count(); 
  var rows_data = TblUnitKirim.rows({ selected: true }).data(); 
  var counts_data = TblUnitKirim.rows({ selected: true }).count();  
  
  if (rows_selected.count() == 0) {
    createPesan("Data belum ada yang dipilih","danger");
    return;
  }; 

  $('#ModalProgress').modal('show');
  $('#frmKirimApi').modal('hide');  

  $.each(rows_selected, function(index, rowId){
    var id_unit=rowId;
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });         
    $.ajax({
        type: 'POST',
        url: './postJSONBangda',
        data: {
          '_token': $('input[name=_token]').val(),
          'id_unit' : id_unit,
      },
      success: function(data) {
        $('#TblLogKirim').DataTable().ajax.reload(null,false);
        if(index == (counts_data - 1) ){
          $('#ModalProgress').modal('hide');
          createPesan(data.pesan,"success");
        }
      },
      error: function(data){
        $('#TblLogKirim').DataTable().ajax.reload(null,false);
        $('#ModalProgress').modal('hide');
        createPesan(data.pesan,"danger");
      }
    });
  });
  e.preventDefault();
});

$(document).on('click', '#btnDeleteLog', function() {
  var data = TblLogKirims.row( $(this).parents('tr') ).data();

    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      type: 'post',
      url: './hapusLogBangda',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_log': data.id_log,
      },
      success: function(data) {
        $('#TblLogKirim').DataTable().ajax.reload(null,false);;
        if(data.status_pesan==1){
          createPesan(data.pesan,"success");
        } else {
          createPesan(data.pesan,"danger"); 
        } 
      }
    });
});

}); //end file
</script>
@endsection
