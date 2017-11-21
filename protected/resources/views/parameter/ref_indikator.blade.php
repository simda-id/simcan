<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.parameterlayout')
{{-- <meta name="_token" content="{!! csrf_token() !!}" /> --}}

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?php
                $this->title = ' Parameter Indikator ';
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
            <p><h2 class="panel-title">Referensi Indikator Perencanaan Pembangunan</h2></p>
          </div>

          <div class="panel-body">
            <div class="add">
              <p><a class="add-indikator btn-labeled btn btn-success"><span class="btn-label"><i class="fa fa-plus fa-lg fa-fw"></i></span> Tambah Indikator</a></p>
            </div>
            <br>
            <div class="table-responsive">
            <table id="tblIndikator" class="table display compact table-striped table-bordered table-responsive" width="100%">
                  <thead>
                      <tr>
                          <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                          <th style="text-align: center; vertical-align:middle">Uraian Indikator</th>
                          <th width="10%" style="text-align: center; vertical-align:middle">IKU</th>
                          <th width="10%" style="text-align: center; vertical-align:middle">Tipe</th>
                          <th width="10%" style="text-align: center; vertical-align:middle">Jenis</th>
                          <th width="10%" style="text-align: center; vertical-align:middle">Sifat</th>
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


<!--Modal Tambah -->
<div id="ModalIndikator" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg"  >
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" style="text-align: center;"></h4>
      </div>

      <div class="modal-body">
        <form name="frmModalIndikator" class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id_indikator" id="id_indikator">
            <div class="form-group">
              <label for="nm_indikator" class="col-sm-3" align='left'>Uraian Indikator</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="nm_indikator" name="nm_indikator" required="required" >
              </div>
            </div>
            <div class="form-group">
              <label for="sumber_data" class="col-sm-5" align='left'>Sumber Data Pengukuran Indikator</label>
              <div class="col-sm-offset-3 col-sm-8">
                <textarea type="name" class="form-control" id="sumber_data" rows="4"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="flag_iku" class="col-sm-3" align='left'>Jenis IKU</label>
                  <div class="col-sm-2">
                      <label class="radio-inline">
                      <input class="flag_iku" type="radio" name="flag_iku" id="flag_iku" value="0"> Non IKU</label>
                  </div>
                  <div class="col-sm-2">
                      <label class="radio-inline">
                      <input class="flag_iku" type="radio" name="flag_iku" id="flag_iku" value="1"> IKU Pemda</label>
                  </div>
                  <div class="col-sm-3">
                      <label class="radio-inline">
                      <input class="flag_iku" type="radio" name="flag_iku" id="flag_iku" value="2"> IKU Perangkat Daerah</label>
                  </div>
            </div>
            <div class="form-group">
              <label for="flag_iku" class="col-sm-3" align='left'>Tipe Indikator</label>
                  <div class="col-sm-2">
                      <label class="radio-inline">
                      <input class="flag_iku" type="radio" name="tipe_indikator" id="tipe_indikator" value="0"> Keluaran</label>
                  </div>
                  <div class="col-sm-2">
                      <label class="radio-inline">
                      <input class="flag_iku" type="radio" name="tipe_indikator" id="tipe_indikator" value="1"> Hasil</label>
                  </div>
                  <div class="col-sm-2">
                      <label class="radio-inline">
                      <input class="flag_iku" type="radio" name="tipe_indikator" id="tipe_indikator" value="2"> Dampak</label>
                  </div>
                  <div class="col-sm-2>
                      <label class="radio-inline">
                      <input class="flag_iku" type="radio" name="tipe_indikator" id="tipe_indikator" value="2"> Masukan</label>
                  </div>
            </div>
            <div class="form-group">
              <label for="jenis_indikator" class="col-sm-3" align='left'>Jenis Indikator</label>
                  <div class="col-sm-2">
                      <label class="radio-inline">
                      <input class="jenis_indikator" type="radio" id="jenis_indikator" name="jenis_indikator" value="0"> Negatif</label>
                  </div>
                  <div class="col-sm-3">
                      <label class="radio-inline">
                      <input class="jenis_indikator" type="radio" id="jenis_indikator" name="jenis_indikator" value="1"> Positif</label>
                  </div>
            </div>
            <div class="form-group">
              <label for="sifat_indikator" class="col-sm-3" align='left'>Sifat Indikator</label>
                  <div class="col-sm-2">
                      <label class="radio-inline">
                      <input class="sifat_indikator" type="radio" id="sifat_indikator" name="sifat_indikator" value="0"> Incremental</label>
                  </div>
                  <div class="col-sm-2">
                      <label class="radio-inline">
                      <input class="sifat_indikator" type="radio" id="sifat_indikator" name="sifat_indikator" value="1"> Absolut</label>
                  </div>
                  <div class="col-sm-3">
                      <label class="radio-inline">
                      <input class="sifat_indikator" type="radio" id="sifat_indikator" name="sifat_indikator" value="2"> Komulatif</label>
                  </div>
            </div>    
        </form>
      </div>
        <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusLokasi">                        
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-sm btn-success btnIndikator btn-labeled" data-dismiss="modal">
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

<!--Modal Hapus -->
<div id="HapusModal" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <input type="hidden" id="id_indikator_hapus" name="id_indikator_hapus">
          <div class="alert alert-danger deleteContent">
              <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border"  style="color:red;" aria-hidden="true"></i>
                <br>
                Yakin akan menghapus Referensi Indikator Tahun : <strong><span id="nm_indikator_hapus"></span></strong> ?
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
@endsection

@section('scripts')
<script  type="text/javascript" language="javascript" class="init">

$(document).ready(function() {

$('[data-toggle="popover"]').popover();

function createPesan(message, type) {
  var html = '<div id="pesanx" class="alert alert-' + type + ' alert-dismissable flyover flyover-bottom in">';    
  html += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';   
  html += '<p><strong>'+message+'</strong></p>';
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

$('.number').number(true,0,',', '.');

$('.display').DataTable({
      dom : 'BfRtip',
      autoWidth : false,
      bDestroy: true
  });

var indikator_tbl=$('#tblIndikator').DataTable({
                  processing: true,
                  serverSide: true,
                  // dom : 'BfRtip',                  
                  autoWidth : false,
                  "ajax": {"url": "./indikator/getListIndikator"},
                  "language": {
                      "decimal": ",",
                      "thousands": "."},
                  "columns": [
                        { data: 'no_urut','searchable': false, 'orderable':false, sClass: "dt-center", width :"5%"},
                        { data: 'nm_indikator', sClass: "dt-left"},
                        { data: 'flag_display', sClass: "dt-center", width :"10%"},
                        { data: 'type_display', sClass: "dt-center", width :"10%"},
                        { data: 'jenis_display', sClass: "dt-center", width :"10%"},
                        { data: 'sifat_display', sClass: "dt-center", width :"10%"},
                        { data: 'action', 'searchable': false, width :"10%", 'orderable':false, sClass: "dt-center" }
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        });

function getflag_iku(){

    var xCheck = document.querySelectorAll('input[name="flag_iku"]:checked');
    var xyz = [];
    for(var x = 0, l = xCheck.length; x < l;  x++)
      { xyz.push(xCheck[x].value); }
    var xvalues = xyz.join('');
    return xvalues;
  }

function getjenis_indikator(){

    var xCheck = document.querySelectorAll('input[name="jenis_indikator"]:checked');
    var xyz = [];
    for(var x = 0, l = xCheck.length; x < l;  x++)
      { xyz.push(xCheck[x].value); }
    var xvalues = xyz.join('');
    return xvalues;
  }

function getsifat_indikator(){

    var xCheck = document.querySelectorAll('input[name="sifat_indikator"]:checked');
    var xyz = [];
    for(var x = 0, l = xCheck.length; x < l;  x++)
      { xyz.push(xCheck[x].value); }
    var xvalues = xyz.join('');
    return xvalues;
  }

function gettipe_indikator(){

    var xCheck = document.querySelectorAll('input[name="tipe_indikator"]:checked');
    var xyz = [];
    for(var x = 0, l = xCheck.length; x < l;  x++)
      { xyz.push(xCheck[x].value); }
    var xvalues = xyz.join('');
    return xvalues;
  }

$(document).on('click', '.add-indikator', function() {
  $('.btnIndikator').removeClass('edit');
  $('.btnIndikator').addClass('add');
  $('.modal-title').text('Tambah Referensi Indikator');
  $('.form-horizontal').show();
  $('#id_indikator').val(null);
  $('#nm_indikator').val(null);
  $('#sumber_data').val(null);
  document.frmModalIndikator.flag_iku[0].checked=true;
  document.frmModalIndikator.tipe_indikator[0].checked=true;
  document.frmModalIndikator.jenis_indikator[1].checked=true;
  document.frmModalIndikator.sifat_indikator[1].checked=true;
  $('#ModalIndikator').modal('show');
});

$('.modal-footer').on('click', '.add', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './indikator/addIndikator',
        data: {
            '_token': $('input[name=_token]').val(),
            'jenis_indikator' : getjenis_indikator(),
            'sifat_indikator' : getsifat_indikator(),
            'type_indikator' : gettipe_indikator(),
            'nm_indikator' : $('#nm_indikator').val(),
            'flag_iku' : getflag_iku(),
            'sumber_data_indikator' : $('#sumber_data').val(),
        },
        success: function(data) {
              $('#tblIndikator').DataTable().ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
        },
  });
});

$('#tblIndikator tbody').on( 'dblclick', 'tr', function () {

  var data = indikator_tbl.row(this).data();

  $('.btnIndikator').removeClass('add');
  $('.btnIndikator').addClass('edit');
  $('.modal-title').text('Edit Referensi Indikator');
  $('.form-horizontal').show();
  $('#id_indikator').val(data.id_indikator);
  $('#nm_indikator').val(data.nm_indikator);
  $('#sumber_data').val(data.sumber_data_indikator);
  document.frmModalIndikator.flag_iku[data.flag_iku].checked=true;
  document.frmModalIndikator.jenis_indikator[data.jenis_indikator].checked=true;
  document.frmModalIndikator.sifat_indikator[data.sifat_indikator].checked=true;
  document.frmModalIndikator.tipe_indikator[data.type_indikator].checked=true;

  $('#ModalIndikator').modal('show');  

  } );

//edit function
$(document).on('click', '#btnEditIndikator', function() {

var data = indikator_tbl.row( $(this).parents('tr') ).data();

  $('.btnIndikator').removeClass('add');
  $('.btnIndikator').addClass('edit');
  $('.modal-title').text('Edit Referensi Indikator');
  $('.form-horizontal').show();
  $('#id_indikator').val(data.id_indikator);
  $('#nm_indikator').val(data.nm_indikator);
  $('#sumber_data').val(data.sumber_data_indikator);
  document.frmModalIndikator.flag_iku[data.flag_iku].checked=true;
  document.frmModalIndikator.jenis_indikator[data.jenis_indikator].checked=true;
  document.frmModalIndikator.sifat_indikator[data.sifat_indikator].checked=true;
  document.frmModalIndikator.tipe_indikator[data.type_indikator].checked=true;


  $('#ModalIndikator').modal('show');
});


$('.modal-footer').on('click', '.edit', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './indikator/editIndikator',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_indikator' : $('#id_indikator').val(),
            'jenis_indikator' : getjenis_indikator(),
            'sifat_indikator' : getsifat_indikator(),
            'type_indikator' : gettipe_indikator(),
            'nm_indikator' : $('#nm_indikator').val(),
            'flag_iku' : getflag_iku(),
            'sumber_data_indikator' : $('#sumber_data').val(),
        },
        success: function(data) {
            $('#tblIndikator').DataTable().ajax.reload();
            if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
        }
    });
});

//delete function
$(document).on('click', '#btnHapusIndikator', function() {

var data = indikator_tbl.row( $(this).parents('tr') ).data();

if(data.asal_indikator!=9){
  createPesan("Maaf Indikator Hasil Impor dari Aplikasi 5 Tahunan tidak dapat dihapus","danger"); 
} else {
  $('.actionBtn').addClass('delete');
  $('.modal-title').text('Hapus Referensi Indikator');
  $('.form-horizontal').hide();
  $('#id_indikator_hapus').val(data.id_indikator);
  $('#nm_indikator_hapus').html(data.nm_indikator);
  $('#HapusModal').modal('show');
}
  
});



$('.modal-footer').on('click', '.delete', function() {
  $.ajaxSetup({
     headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });

  $.ajax({
    type: 'post',
    url: './indikator/hapusIndikator',
    data: {
      '_token': $('input[name=_token]').val(),
      'id_indikator': $('#id_indikator_hapus').val(),
    },
    success: function(data) {
      $('.item' + $('.id_indikator_hapus').text()).remove();
      $('#tblIndikator').DataTable().ajax.reload();
      createPesan(data.pesan,"success");
    }
  });
});

});
</script>
@endsection
