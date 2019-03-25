<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app1')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <?php
                $this->title = 'Identifikasi Prioritas';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = '/';
                $breadcrumb->begin();
                $breadcrumb->add(['url' => '/rpjmd','label' => 'Pra RPJMD']);
                $breadcrumb->add(['label' => $this->title]);
                $breadcrumb->end();
            ?>
      </div>
    </div>    
    <div id="pesan"></div>
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-warning">
          <div class="panel-heading">
            <h2 class="panel-title">Perumusan Prioritas Rencana Pembangunan Jangka Menengah Daerah</h2>
          </div>

          <div class="panel-body">
              <br>
              <div class="add">
                <a class="btn btn-sm btn-labeled btn-success addDokRpjmd" data-toggle="modal"><span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span> Tambah Prioritas Pembangunan</a>
              </div>
              <table id='tblPermasalahan' class="table display table-striped table-bordered table-responsive" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                          <th style="text-align: center; vertical-align:middle">Uraian Permasalahan</th>
                          <th style="text-align: center; vertical-align:middle">Faktor Keberhasilan</th>
                          <th style="text-align: center; vertical-align:middle">Tingkat Permasalahan</th>
                          <th width="10%" style="text-align: center; vertical-align:middle">Skor Prioritas</th>
                          <th width="10%" style="text-align: center; vertical-align:middle">Ranking Prioritas</th>
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

<div id="TambahPrioritas" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" >
  <div class="modal-dialog modal-lg"  >
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" autocomplete='off' action="" method="post" onsubmit="return false;">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" class="form-control" name="id_pemda" id="id_pemda"> 
          <input type="hidden" class="form-control" name="id_masalah" id="id_masalah"> 
          <div class="form-group">
            <label for="no_urut" class="col-sm-3 control-label" align='left'>Nomor Urut </label>
            <div class="col-sm-2">
              <input type="text" class="form-control number" id="no_urut" name="no_urut" style="text-align: center;" required="required">
            </div>
          </div>           
          <div class="form-group">
            <label for="uraian_masalah" class="col-sm-3 control-label" align='left'>Uraian Isu Strategis Pembangunan</label>
            <div class="col-sm-8">
              <textarea type="text" class="form-control" id="uraian_masalah" name="uraian_masalah" required="required" rows="3"></textarea>
            </div>
          </div>           
          <div class="form-group">
            <label for="faktor_keberhasilan" class="col-sm-3 control-label" align='left'>Faktor Penentu Keberhasilan</label>
            <div class="col-sm-8">
              <textarea type="text" class="form-control" id="faktor_keberhasilan" name="faktor_keberhasilan" required="required" rows="3"></textarea>
            </div>
          </div>
          <div class="form-group">
              <label class="control-label col-sm-3" for="jns_dok_rpjmd">Tingkat Permasalahan</label>
              <div class="col-sm-5">
                  <select type="text" class="form-control" id="jns_dok_rpjmd" name="jns_dok_rpjmd">
                          <option value="1">Internasional</option>
                          <option value="2">Nasional</option>
                          <option value="3">Provinsi</option>
                          <option value="4">Kabupaten/Kota</option>
                  </select>
              </div>
          </div> 
          <div class="form-group">
            <label for="skor_prioritas" class="col-sm-3 control-label" align='left'>Skor Prioritas </label>
            <div class="col-sm-2">
              <input type="text" class="form-control number" id="skor_prioritas" name="skor_prioritas" style="text-align: center;" required="required">
            </div>
            <label for="urutan_prioritas" class="col-sm-3 control-label" align='left'>Ranking </label>
            <div class="col-sm-2">
              <input type="text" class="form-control number" id="urutan_prioritas" name="urutan_prioritas" style="text-align: center;" required="required">
            </div>
          </div>   
        </form>
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-sm-2 text-left">
            <button type="button" id="btnDelPrioritas" class="btn btn-labeled btn-danger"><span class="btn-label"><i class="fa fa-trash-o fa-lg fa-fw"></i></span>Hapus</button>
          </div>
          <div class="col-sm-10 text-right">
            <div class="ui-group-buttons">
              <button id="btnPrioritas" type="button" class="btn btn-success btn-labeled btnPrioritas" data-dismiss="modal">
              <span class="btn-label"><i class="fa fa-floppy-o fa-fw fa-lg"></i></span>Simpan</button>
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

<div id="HapusPrioritas" class="modal fade" role="dialog" tabindex="-1" data-focus-on="input:first" data-backdrop="static">
  <div class="modal-dialog modal-xs">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Hapus Isu Strategis Pembangunan</h4>
      </div>
      <div class="modal-body">
          <input type="hidden" id="id_masalah_hapus" name="id_masalah_hapus">
          <div class="alert alert-danger">
            <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border text-danger" aria-hidden="true"></i>
                Yakin akan menghapus Isu Strategif :
                <br><strong>"<span class="ur_dokumen_del"></span>"</strong>  ?
        </div>
        </div>
        <div class="modal-footer">
          <div class="ui-group-buttons">
          <button type="button" id="btnDelPrioritas1" class="btn btn-labeled btn-danger" data-dismiss="modal" ><span class="btn-label"><i class="fa fa-trash-o fa-lg fa-fw"></i></span> Hapus</button>
          <div class="or"></div>
          <button type="button" class="btn btn-labeled btn-warning" data-dismiss="modal" aria-hidden="true"><span class="btn-label"><i class="fa fa-sign-out fa-lg fa-fw"></i></span> Tutup</button>
          </div>
        </div>
    </div>
  </div>
</div>

<div id="ModalProgress" class="modal fade modal-static" role="dialog" data-backdrop="static" tabindex="-1" data-focus-on="input:first">
    <div class="modal-dialog"  >
      <div class="modal-content" style="background-color: #5bc0de;">
        <div class="modal-body" style="background-color: #5bc0de;">
          <div style="text-align: center;">
          <h4><strong>Sedang proses...</strong></h4>
            <i class="fa fa-spinner fa-pulse fa-5x fa-fw text-info"></i>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript" language="javascript" class="init">
$(document).ready(function(){
  var id_pemda;
  
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

  $('[data-toggle="popover"]').popover();
  $('#periode_awal').number(true,0,'','');
  $('#periode_akhir').number(true,0,'','');
  // $('.number').number(true,0,',', '.');

  $('#tanggal_rpjmd_x').datepicker({
    altField: "#tanggal_rpjmd",
    altFormat: "yy-mm-dd", 
    dateFormat: "dd MM yy",
  });

  $('#btn').click(function() {
    $("#tanggal_rpjmd_x").focus();
  });

  $('.page-alert .close').click(function(e) {
    e.preventDefault();
    $(this).closest('.page-alert').slideUp();
  });

var DokRpjmdTbl;
function getDokRpjmd(){
  DokRpjmdTbl = $('#tblDokumen').DataTable( {
          processing: true,
          serverSide: true,
          responsive: true,
          dom : 'BFRTIP',                  
          autoWidth : false,
          order: [[0, 'asc']],
          bDestroy: true,
          language: {
                "decimal": ",",
                "thousands": "."},
          ajax: {"url": "./rancangan/getDokumen"},
          columns: [
                { data: 'no_urut','searchable': false, 'orderable':false, sClass: "dt-center"},
                { data: 'no_perda','searchable': false, 'orderable':false},
                { data: 'tgl_perda','searchable': false, 'orderable':false, sClass: "dt-center",render: 
                function (data) {
                          var date = new Date(data);
                          return formatTgl(date);}},
                { data: 'display_periode','searchable': false, 'orderable':false, sClass: "dt-center"},
                { data: 'display_revisi','searchable': false, 'orderable':false, sClass: "dt-center"},
                { data: 'display_status','searchable': false, 'orderable':false, sClass: "dt-center"},
                { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
              ]
        } );
};

getDokRpjmd();

$(document).on('click', '.addDokRpjmd', function() {
      $('#btnDokumen').removeClass('editDokumen');
      $('#btnDokumen').addClass('addDokumen');
      $('.modal-title').text('Tambah Dokumen Rancangan RPJMD');
      $('.form-horizontal').show();
      $('#btnDelDokumen').hide();
      $('#btnDokumen').show();
      $('#TambahDokumen').modal('show');
});

 $('#periode_awal').change(function() {
    var x = Number($('#periode_awal').val());
    $('#periode_akhir').val(x+5);
  });

$('.modal-footer').on('click', '.addDokumen', function() {
  $.ajaxSetup({
      headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });

    $.ajax({
      type: 'post',
      url: './rancangan/addDokRpjmd',
      data: {
        '_token': $('input[name=_token]').val(),
        'periode_awal': $('#periode_awal').val(),
        'periode_akhir': $('#periode_akhir').val(),
        'no_perda': $('#nomor_rpjmd').val(),
        'keterangan_dokumen': $('#uraian_perkada').val(),
        'tgl_perda': $('#tanggal_rpjmd').val(),
        'id_revisi': $('#jns_dok_rpjmd').val(),
      },
      success: function(data) {
        DokRpjmdTbl.ajax.reload();
        if(data.status_pesan==1){
          createPesan(data.pesan,"success");
        } else {
          createPesan(data.pesan,"danger");
        }
      }
    });
});

$(document).on('click', '.view-dokumen', function() {
  var data = DokRpjmdTbl.row( $(this).parents('tr') ).data();

      $('#btnDokumen').addClass('editDokumen');
      $('#btnDokumen').removeClass('addDokumen');
      $('.modal-title').text('Rincian Dokumen Rancangan RPJMD');
      $('.form-horizontal').show();
      $('#btnDelDokumen').hide();
      $('#btnDokumen').show();
      $('#id_rpjmd_dok').val(data.id_rpjmd);
      $('#periode_awal').val(data.periode_awal);
      $('#periode_akhir').val(data.periode_akhir);
      $('#nomor_rpjmd').val(data.no_perda);
      $('#uraian_perkada').val(data.keterangan_dokumen);
      $('#tanggal_rpjmd').val(data.tgl_perda);
      $('#tanggal_rpjmd_x').val(formatTgl(data.tgl_perda));
      $('#jns_dok_rpjmd').val(data.id_revisi);
      $('#TambahDokumen').modal('show');
});

 $('#periode_awal').change(function() {
    var x = Number($('#periode_awal').val());
    $('#periode_akhir').val(x+5);
  });

$('.modal-footer').on('click', '.editDokumen', function() {
  $.ajaxSetup({
      headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });

    $.ajax({
      type: 'post',
      url: './rancangan/editDokRpjmd',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_rpjmd': $('#id_rpjmd_dok').val(),
        'periode_awal': $('#periode_awal').val(),
        'periode_akhir': $('#periode_akhir').val(),
        'no_perda': $('#nomor_rpjmd').val(),
        'keterangan_dokumen': $('#uraian_perkada').val(),
        'tgl_perda': $('#tanggal_rpjmd').val(),
        'id_revisi': $('#jns_dok_rpjmd').val(),
      },
      success: function(data) {
        DokRpjmdTbl.ajax.reload();
        if(data.status_pesan==1){
          createPesan(data.pesan,"success");
        } else {
          createPesan(data.pesan,"danger");
        }
      }
    });
});

$(document).on('click', '.hapus-dokumen', function() {
    var data = DokRpjmdTbl.row( $(this).parents('tr') ).data();

	  $('#btnDelDokumen1').removeClass('delDokumen');
    $('#btnDelDokumen1').addClass('delDokumen');
    $('.form-horizontal').show();
    $('#id_dokumen_hapus').val(data.id_rpjmd);
    $('.ur_dokumen_del').html(data.no_perda);
    $('#HapusDokumen').modal('show');
	});

$('.modal-footer').on('click', '.delDokumen', function() {
  $.ajaxSetup({
      headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });

    $.ajax({
      type: 'post',
      url: './rancangan/delDokRpjmd',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_rpjmd': $('#id_dokumen_hapus').val(),
      },
      success: function(data) {
        DokRpjmdTbl.ajax.reload();
        if(data.status_pesan==1){
          createPesan(data.pesan,"success");
        } else {
          createPesan(data.pesan,"danger"); 
        }
      }
    });
});

});
</script>
@endsection
