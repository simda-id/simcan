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
  <div id="prosesbar" class="lds-spinner">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h2 class="panel-title">SIMDA Keuangan</h2>
        </div>

        <div class="panel-body">
          <form name="" class="form-horizontal" role="form" autocomplete='off' action="" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <label for="tahun_rkpd" class="col-sm-3 control-label text-left" align='left'>Tahun Anggaran </label>
              <div class="col-sm-2">
                <input class="form-control text-center" type="text" id="tahun_rkpd" name="tahun_rkpd"
                  value="{{Session::get('tahun')}}" disabled>
              </div>
              <a class="btnKirimTAPD btn-labeled btn btn-primary" data-toggle="popover" data-container="body"
                title="Kirim Tim Anggaran" data-trigger="hover"
                data-content="Proses Kirim Tim Anggaran dilakukan 1X untuk 1 APBD, kecuali jikan ada perubahan Tim Anggaran"><span
                  class="btn-label"><i class="fa fa-users fa-lg fa-fw"></i></span> Kirim Tim Anggaran</a>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3 text-left" for="jns_dokumen_apbd">Jenis Dokumen APBD </label>
              <div class="col-sm-5">
                <select class="form-control jns_dokumen_apbd select2" name="jns_dokumen_apbd" id="jns_dokumen_apbd">
                  <option value="-1">--Pilih Jenis Dokumen--</option>
                  <option value="0">APBD</option>
                  <option value="1">Pergeseran APBD</option>
                  <option value="2">Perubahan APBD</option>
                  <option value="3">Pergeseran setelah Perubahan APBD</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3 text-left" for="id_dokumen_keu">Nomor Dokumen APBD </label>
              <div class="col-sm-5">
                <select class="form-control id_dokumen_keu select2" name="id_dokumen_keu" id="id_dokumen_keu"></select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3 text-left" for="id_unit">Unit Perangkat Daerah </label>
              <div class="col-sm-5">
                <select class="form-control id_unit select2" name="id_unit" id="id_unit"></select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3 text-left" for="id_sub_unit">Sub Unit Perangkat Daerah</label>
              <div class="col-sm-5">
                <select class="form-control id_sub_unit select2" name="id_sub_unit" id="id_sub_unit"></select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-3"></div>
              <div class="col-sm-5 text-right">
                <p><a class="btnKirimKeuangan btn-labeled btn btn-success"><span class="btn-label"><i
                        class="fa fa-cloud-upload fa-lg fa-fw"></i></span> Kirim Baru ke SIMDA Keuangan</a></p>
              </div>
            </div>
          </form>
          <br>
          <table id="TblLogKirim" class="table display compact table-striped table-bordered table-responsive"
            width="100%">
            <thead>
              <tr>
                <th width="5%" height="50px" style="text-align: center; vertical-align:middle">No Urut</th>
                <th width="5%" height="50px" style="text-align: center; vertical-align:middle">Aksi</th>
                <th width="12%" height="50px" style="text-align: center; vertical-align:middle">Tanggal Kirim</th>
                <th width="8%" height="50px" style="text-align: center; vertical-align:middle">Kode Unit</th>
                <th width="20%" height="50px" style="text-align: center; vertical-align:middle">Nama Unit</th>
                <th width="15%" height="50px" style="text-align: center; vertical-align:middle">Nama Sub Unit</th>
                <th height="50px" style="text-align: center; vertical-align:middle">Log Kirim</th>
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

<div id="ModalProgress" class="modal fade modal-static" role="dialog" data-backdrop="static" role="dialog"
  aria-hidden="true">
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
<script type="text/javascript" language="javascript" class="init">
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

$('[data-toggle="popover"]').popover();

$( '#prosesbar' ).hide();
$('.number').number(true,0,',', '.');

$('#TblLogKirim').DataTable({
  language: {
  "decimal": ",",
  "thousands": ".",
  "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
  "sProcessing": "Sedang memproses...",
  "sLengthMenu": "Tampilkan _MENU_ entri",
  "sZeroRecords": "Tidak ditemukan data yang sesuai",
  "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
  "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
  "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
  "sInfoPostFix": "",
  "sSearch": "Cari:",
  "sUrl": "",
  "oPaginate": {
    "sFirst": "Pertama",
    "sPrevious": "Sebelumnya",
    "sNext": "Selanjutnya",
    "sLast": "Terakhir"
    }
  },
  "pageLength": 50,
  "lengthMenu": [[10, 50, -1], [10, 50, "All"]],
});

$( ".jns_dokumen_apbd" ).change( function () {
  $.ajax({
    type: "GET",
    url: 'getDokApbd?kd_dok='+$( '#jns_dokumen_apbd' ).val(),
    dataType: "json",
    success: function(data) {

    var j = data.length;
    var post, i;

    $('select[name="id_dokumen_keu"]').empty();
    $('select[name="id_dokumen_keu"]').append('<option value="0">---Pilih Dokumen APBD---</option>');

    for (i = 0; i < j; i++) {
      post = data[i];
      $('select[name="id_dokumen_keu"]').append('<option value="'+ post.id_dokumen_keu +'">'+ post.nomor_keu +'</option>');
    }
    }
  });
} );

$( ".id_dokumen_keu" ).change( function () {
  $.ajax( {
    type: "GET",
    url: 'getUnitApbd?id_dokumen=' + $( '#id_dokumen_keu' ).val(),
    dataType: "json",
    success: function ( data ) {
      var j = data.length;
      var post, i;

      $( 'select[name="id_unit"]' ).empty();
      $( 'select[name="id_unit"]' ).append( '<option value="0">---Pilih Unit Perangkat Daerah---</option>' );

      for ( i = 0; i < j; i++ ) { 
        post=data[ i ]; 
        $( 'select[name="id_unit"]' ).append( '<option value="' + post.id_unit + '">' + post.nama_unit + '</option>' ); 
      } 
    } 
  } );

  LoadLogKirim($( '#jns_dokumen_apbd' ).val());
  
} );

$( ".id_unit" ).change( function () {
  $.ajax( {
    type: "GET",
    url: 'getSubUnitApbd?id_dokumen=' + $( '#id_dokumen_keu' ).val() + "&id_unit="+ $( '#id_unit' ).val(),
    dataType: "json",
    success: function ( data ) {
      var j = data.length;
      var post, i;

      $( 'select[name="id_sub_unit"]' ).empty();
      $( 'select[name="id_sub_unit"]' ).append( '<option value="0">---Pilih Sub Unit Perangkat Daerah---</option>' );

      for ( i = 0; i < j; i++ ) {
        post=data[ i ]; 
        $( 'select[name="id_sub_unit"]' ).append( '<option value="' + post.id_sub_unit+ '">' + post.nama_sub_unit + '</option>' ); 
      } 
    } 
  } ); 
} );

var TblLogKirims; 
function LoadLogKirim (kd_dokumen) {
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
      "ajax": {"url": "./getdataKeu?kd_dok="+kd_dokumen},
      "columns": [
            { data: 'no_urut', sClass: "dt-center", searchable: false, orderable:false,},
            { data: 'action', 'searchable': false, width :"10%", 'orderable':false, sClass: "dt-center"},
            { data: 'tgl_kirim', sClass: "dt-center"},
            { data: 'kodeskpd', sClass: "dt-center"},
            { data: 'nama_unit', sClass: "dt-left"},
            { data: 'nama_sub', sClass: "dt-left"},
            { data: 'log_kirim','searchable': true, 'orderable':true, sClass: "dt-left",
              render: function(data, type, row,meta) {
              return row.log_kirim + '   <span class="label" style="background-color: '+row.status_warna+'; color:#fff;">'+row.status_label+' '+ row.jenis_dokumen +'</span>  ';
            }}, 
          ],
      "order": [[0, 'asc']],
      "bDestroy": true
    })
  };

  $(document).on('click', '.btnLanjutKirim', function() { 
    $( '#prosesbar' ).show();
    var data = TblLogKirims.row( $( this ).parents( 'tr' ) ).data();
    $.ajaxSetup({
      headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
    
    $.ajax({
      type: 'post',
      url: './postKirimKeu',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_sub': data.id_sub_unit,
        'id_dokumen_keu': data.id_dok_keu,
        'step_kirim' : data.step_kirim,
        'kd_dok' : data.kd_dokumen,
      },
      success: function(data) {
        $('#TblLogKirim').DataTable().ajax.reload(null,false);
        $( '#prosesbar' ).hide();
        if(data.status_pesan==1){
          createPesan(data.pesan,"success");
        } else {
          createPesan(data.pesan,"danger");
        }
      }
    });
  });

  $(document).on('click', '.btnUlangKirim', function() {
    $( '#prosesbar' ).show();
    var data = TblLogKirims.row( $( this ).parents( 'tr' ) ).data();
    $.ajaxSetup({
      headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
    
    $.ajax({
      type: 'post',
      url: './postKirimUlang',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_sub': data.id_sub_unit,
        'id_dokumen_keu': data.id_dok_keu,
        'kd_dok' : data.kd_dokumen,
      },
      success: function(data) {
        $('#TblLogKirim').DataTable().ajax.reload(null,false);
        $( '#prosesbar' ).hide();
        if(data.status_pesan==1){
          createPesan(data.pesan,"success");
        } else {
          createPesan(data.pesan,"danger");
        }
      }
    });
  });

  $(document).on('click', '.btnKirimKeuangan', function() {
    $( '#prosesbar' ).show();
    $.ajaxSetup({
      headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
    
    $.ajax({
    type: 'post',
    url: './postKirimKeu',
    data: {
      '_token': $('input[name=_token]').val(),
      'id_sub': $( '#id_sub_unit' ).val(),
      'id_dokumen_keu': $( '#id_dokumen_keu' ).val(),
      'step_kirim' : 0,
      'kd_dok' : $( '#jns_dokumen_apbd' ).val(),
    },
    success: function(data) {
      $('#TblLogKirim').DataTable().ajax.reload(null,false);
      $( '#prosesbar' ).hide();
      if(data.status_pesan==1){
        createPesan(data.pesan,"success");
      } else {
        createPesan(data.pesan,"danger");
      }
    }
    });
  });

  $(document).on('click', '.btnKirimTAPD', function() {
    $( '#prosesbar' ).show();
    $.ajaxSetup({
      headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
    
    $.ajax({
      type: 'post',
      url: './sinkTAPD',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_dokumen_keu': $( '#id_dokumen_keu' ).val(),
      },
      success: function(data) {
        $( '#prosesbar' ).hide();
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