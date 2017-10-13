<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.parameterlayout')
{{-- <meta name="_token" content="{!! csrf_token() !!}" /> --}}

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
                $this->title = 'Lokasi';
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
            <h2 class="panel-title">Referensi Lokasi Kewilayahan & Non Kewilayahan</h2>
          </div>

          <div class="panel-body">
            <div class="add">
              <a id="btnTambahLokasi" type="button" class="btn btn-labeled btn-sm btn-success">
                  <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>Tambah Lokasi Non Kewilayahan</a>
              <a id="btnImportLokasi" type="button" class="btn btn-labeled btn-sm btn-info">
                  <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>Import Lokasi Kewilayahan</a>
            </div>
            <br>
            <table id="tblLokasi" class="table display compact table-striped table-bordered table-responsive" width="100%">
                  <thead>
                      <tr>
                          <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                          <th style="text-align: center; vertical-align:middle">Uraian Lokasi</th>
                          <th width="15%" style="text-align: center; vertical-align:middle">Jenis Lokasi</th>
                          <th width="40%" style="text-align: center; vertical-align:middle">Keterangan Lokasi</th>
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


<!--Modal Tambah -->
<div id="ModalLokasi" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg"  >
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
      </div>

      <div class="modal-body">
        <form name="frmModalLokasi" class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id_lokasi" id="id_lokasi">
            <input type="hidden" name="id_desa" id="id_desa">
            <div class="form-group">
              <label for="jenis_lokasi" class="col-sm-3" align='left'>Jenis Lokasi</label>
              <div class="col-sm-4">
                <select type="text" class="form-control" id="jenis_lokasi" name="jenis_lokasi" required="required" >
                                  <option value="0">Kewilayahan</option>
                                  <option value="1">Jalan</option>
                                  <option value="2">Saluran Irigasi</option>
                                  <option value="3">Kawasan</option>
                                  <option value="99">Lainnya</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="nama_lokasi" class="col-sm-3" align='left'>Uraian Lokasi</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="nama_lokasi" name="nama_lokasi" required="required" >
              </div>
            </div>            
            <div class="form-group">
              <label for="keterangan_lokasi" class="col-sm-3" align='left'>Keterangan Lokasi</label>
              <div class="col-sm-8">
                <textarea type="name" class="form-control" id="keterangan_lokasi" rows="3"></textarea>
              </div>
            </div>
            
            <div class="form-group">
              <label for="jenis_indikator" class="col-sm-3" align='left'>Atribute Lokasi</label>
              <div class="col-sm-12">
              <table class="table table-striped table-bordered table-responsive">
                        <thead>
                          <tr>
                            <td width="10%" style="text-align: center; vertical-align:middle;">Uraian</td>
                            <td width="30%" style="text-align: center; vertical-align:middle;">Panjang</td>
                            <td width="30%" style="text-align: center; vertical-align:middle;">Lebar</td>
                            <td width="30%" style="text-align: center; vertical-align:middle;">Luas</td>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <td width="10%" style="text-align: center; vertical-align:middle;">Nilai</td>
                              <td width="30%" style="text-align: left; vertical-align:middle;">
                                <input type="text" class="form-control number" id="panjang" name="panjang">
                              </td>
                              <td width="30%" style="text-align: left; vertical-align:middle;">
                                <input type="text" class="form-control number" id="lebar" name="lebar">
                              </td>
                              <td width="30%" style="text-align: left; vertical-align:middle;">
                                <input type="text" class="form-control number" id="luasan_kawasan" name="luasan_kawasan">
                              </td>
                          </tr>
                          <tr>
                              <td width="10%" style="text-align: center; vertical-align:middle;">Satuan</td>
                              <td width="30%" style="text-align: left; vertical-align:middle;">
                                <select type="text" class="form-control" id="satuan_panjang" name="satuan_panjang">
                                </select>
                              </td>
                              <td width="30%" style="text-align: left; vertical-align:middle;">
                                <select type="text" class="form-control" id="satuan_lebar" name="satuan_lebar">
                                </select>
                              </td>
                              <td width="30%" style="text-align: left; vertical-align:middle;">
                                <select type="text" class="form-control" id="satuan_luas" name="satuan_luas">
                                </select>
                              </td>
                          </tr>
                        </tbody>
                    </table>
              </div>
            </div> 
            {{-- <div class="form-group">
              <label for="jenis_indikator" class="col-sm-3" align='left'>Letak Geografis</label>
              <div class="col-sm-12">
              <table class="table table-striped table-bordered table-responsive">
                        <thead>
                          <tr>
                            <td width="10%" style="text-align: center; vertical-align:middle;">Uraian</td>
                            <td width="30%" style="text-align: center; vertical-align:middle;">Awal</td>
                            <td width="30%" style="text-align: center; vertical-align:middle;">Akhir</td>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <td width="10%" style="text-align: center; vertical-align:middle;">Batas Desa</td>
                              <td width="30%" style="text-align: left; vertical-align:middle;">
                                <select type="text" class="form-control" id="id_desa_awal" name="id_desa_awal">
                                </select>
                                <select type="text" class="form-control" id="id_desa_awal" name="id_desa_awal">
                                </select>
                              </td>
                              <td width="30%" style="text-align: left; vertical-align:middle;">
                                <select type="text" class="form-control" id="id_desa_akhir" name="id_desa_akhir">
                                </select>
                                <select type="text" class="form-control" id="id_desa_akhir" name="id_desa_akhir">
                                </select>
                              </td>
                          </tr>
                        </tbody>
                    </table>
              </div>
            </div>  --}}  
        </form>
        <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusLokasi">                        
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-sm btn-success btnLokasi btn-labeled" data-dismiss="modal">
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
          {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
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
        {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> --}}
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

$('.number').number(true,2,',', '.');

$('.display').DataTable({
      dom : 'BfRtip',
      autoWidth : false,
      bDestroy: true
  });

$.ajax({
          type: "GET",
          url: '../../asb/getRefSatuan',
          dataType: "json",
          success: function(data) {

          var j = data.length;
          var post, i;

          $('select[name="satuan_panjang"]').empty();
          $('select[name="satuan_panjang"]').append('<option value="-1">---Pilih Satuan---</option>');

          $('select[name="satuan_lebar"]').empty();
          $('select[name="satuan_lebar"]').append('<option value="-1">---Pilih Satuan---</option>');

          $('select[name="satuan_luas"]').empty();
          $('select[name="satuan_luas"]').append('<option value="-1">---Pilih Satuan---</option>');

          for (i = 0; i < j; i++) {
              post = data[i];
              $('select[name="satuan_panjang"]').append('<option value="'+ post.id_satuan +'">'+ post.uraian_satuan +'</option>');
              $('select[name="satuan_lebar"]').append('<option value="'+ post.id_satuan +'">'+ post.uraian_satuan +'</option>');
              $('select[name="satuan_luas"]').append('<option value="'+ post.id_satuan_publik +'">'+ post.uraian_satuan +'</option>');
            }
              
          }
      });

var lokasi_tbl=$('#tblLokasi').DataTable({
                  processing: true,
                  serverSide: true,
                  dom : 'BfRtip',                  
                  autoWidth : false,
                  "ajax": {"url": "./lokasi/getListLokasi"},
                  "language": {
                      "decimal": ",",
                      "thousands": "."},
                  "columns": [
                        { data: 'no_urut','searchable': false, 'orderable':false, sClass: "dt-center", width :"5%"},
                        { data: 'nama_lokasi', sClass: "dt-left"},
                        { data: 'lokasi_display', sClass: "dt-center", width :"15%"},
                        { data: 'keterangan_lokasi', sClass: "dt-center", width :"40%"},
                        { data: 'action', 'searchable': false, width :"10%", 'orderable':false, sClass: "dt-center" }
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        });

$(document).on('click', '#btnImportLokasi', function() {
$.ajaxSetup({
    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});

$('#ModalProgress').modal('show');
$.ajax({
        type: 'POST',
        url: './lokasi/insertWilayah',
        data: {
            '_token': $('input[name=_token]').val(),
        },
        success: function(data) {
          createPesan(data.pesan,"success");
          $('#tblLokasi').DataTable().ajax.reload();
          $('#ModalProgress').modal('hide');
        },
        error: function(data){
          createPesan(data.pesan,"danger");
          $('#tblLokasi').DataTable().ajax.reload();
          $('#ModalProgress').modal('hide');
        }
        });  
});

$(document).on('click', '#btnTambahLokasi', function() {
  $('.btnLokasi').removeClass('edit');
  $('.btnLokasi').addClass('add');
  $('.modal-title').text('Tambah Referensi Lokasi');
  $('.form-horizontal').show();
  $('#id_lokasi').val(null);
  $('#id_desa').val(null);
  $('#jenis_lokasi').val(99);
  $('#nama_lokasi').val(null);
  $('#keterangan_lokasi').val(null);
  $('#panjang').val(0);
  $('#lebar').val(0);
  $('#luasan_kawasan').val(0);
  $('#satuan_panjang').val(-1);
  $('#satuan_lebar').val(-1);
  $('#satuan_luas').val(-1);

  $('#jenis_lokasi').removeAttr("disabled");
  $('#nama_lokasi').removeAttr("disabled");
  
  $('#ModalLokasi').modal('show');
});

$('.modal-footer').on('click', '.add', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './lokasi/addLokasi',
        data: {
            '_token': $('input[name=_token]').val(),
            'jenis_lokasi' : $('#jenis_lokasi').val(),
            'nama_lokasi' : $('#nama_lokasi').val(),
            'id_desa' : $('#id_desa').val(),
            'luasan_kawasan' : $('#luasan_kawasan').val(),
            'satuan_luas' : $('#satuan_luas').val(),
            'panjang' : $('#panjang').val(),
            'satuan_panjang' : $('#satuan_panjang').val(),
            'lebar' : $('#lebar').val(),
            'satuan_lebar' : $('#satuan_lebar').val(),
            'keterangan_lokasi' : $('#keterangan_lokasi').val(),
        },
        success: function(data) {
              $('#tblLokasi').DataTable().ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
        },
  });
});

$('#tblLokasi tbody').on( 'dblclick', 'tr', function () {

  var data = lokasi_tbl.row(this).data();

  $('.btnLokasi').removeClass('edit');
  $('.btnLokasi').addClass('add');
  $('.modal-title').text('Edit Referensi Lokasi');
  $('.form-horizontal').show();
  $('#id_lokasi').val(data.id_lokasi);
  $('#id_desa').val(data.id_desa);
  $('#jenis_lokasi').val(data.jenis_lokasi);
  $('#nama_lokasi').val(data.nama_lokasi);
  $('#keterangan_lokasi').val(data.keterangan_lokasi);
  $('#panjang').val(data.panjang);
  $('#lebar').val(data.lebar);
  $('#luasan_kawasan').val(data.luasan_kawasan);
  $('#satuan_panjang').val(data.satuan_panjang);
  $('#satuan_lebar').val(data.satuan_lebar);
  $('#satuan_luas').val(data.satuan_luas);

  if(data.jenis_lokasi==0) {
    $('#jenis_lokasi').attr('disabled', 'disabled');
    $('#nama_lokasi').attr('disabled', 'disabled');
  }  else {
    $('#jenis_lokasi').removeAttr("disabled");
    $('#nama_lokasi').removeAttr("disabled");
  }

  $('#ModalLokasi').modal('show');  

  } );

//edit function
$(document).on('click', '#btnEditLokasi', function() {

var data = lokasi_tbl.row( $(this).parents('tr') ).data();

  $('.btnLokasi').removeClass('add');
  $('.btnLokasi').addClass('edit');
  $('.modal-title').text('Edit Referensi Lokasi');
  $('.form-horizontal').show();
  $('#id_lokasi').val(data.id_lokasi);
  $('#id_desa').val(data.id_desa);
  $('#jenis_lokasi').val(data.jenis_lokasi);
  $('#nama_lokasi').val(data.nama_lokasi);
  $('#keterangan_lokasi').val(data.keterangan_lokasi);
  $('#panjang').val(data.panjang);
  $('#lebar').val(data.lebar);
  $('#luasan_kawasan').val(data.luasan_kawasan);
  $('#satuan_panjang').val(data.satuan_panjang);
  $('#satuan_lebar').val(data.satuan_lebar);
  $('#satuan_luas').val(data.satuan_luas);

  if(data.jenis_lokasi==0) {
    $('#jenis_lokasi').attr('disabled', 'disabled');
    $('#nama_lokasi').attr('disabled', 'disabled');
  }  else {
    $('#jenis_lokasi').removeAttr("disabled");
    $('#nama_lokasi').removeAttr("disabled");
  }

  $('#ModalLokasi').modal('show');
});


$('.modal-footer').on('click', '.edit', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './lokasi/editLokasi',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_lokasi' : $('#id_lokasi').val(),
            'jenis_lokasi' : $('#jenis_lokasi').val(),
            'nama_lokasi' : $('#nama_lokasi').val(),
            'id_desa' : $('#id_desa').val(),
            'luasan_kawasan' : $('#luasan_kawasan').val(),
            'satuan_luas' : $('#satuan_luas').val(),
            'panjang' : $('#panjang').val(),
            'satuan_panjang' : $('#satuan_panjang').val(),
            'lebar' : $('#lebar').val(),
            'satuan_lebar' : $('#satuan_lebar').val(),
            'keterangan_lokasi' : $('#keterangan_lokasi').val(),

        },
        success: function(data) {
            $('#tblLokasi').DataTable().ajax.reload();
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
    url: './lokasi/hapusLokasi',
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
