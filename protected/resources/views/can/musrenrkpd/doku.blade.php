<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <?php
                $this->title = 'Dokumen Rancangan RKPD';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = 'modul2';
                $breadcrumb->begin();
                $breadcrumb->add(['label' => 'RKPD']);
                $breadcrumb->add(['label' => 'Rancangan RKPD']);
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
            <p><h2 class="panel-title">Dokumen Rancangan RKPD</h2></p>
          </div>

          <div class="panel-body">
                <form class="form-horizontal" role="form" autocomplete='off' action="#" method="" >
                    <div>
                      <a type="button" id="btnAddDokumen" class="btn btn-labeled btn-sm btn-success" data-dismiss="modal"><span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span> Tambah Dokumen</a>
                    </div>
                </form>
                <table id="tblDokumen" class="table table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
                  <thead>
                      <tr>
                        <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                        <th width="10%" style="text-align: center; vertical-align:middle">Tahun RKPD</th>
                        <th width="10%" style="text-align: center; vertical-align:middle">Nomor Dokumen</th>
                        <th style="text-align: center; vertical-align:middle">Uraian Dokumen</th>
                        <th width="10%" style="text-align: center; vertical-align:middle">Status</th>
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

<div id="TambahDokumen" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" >
  <div class="modal-dialog modal-lg"  >
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" autocomplete='off' action="" method="post" onsubmit="return false;">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="id_dokumen_rkpd" id="id_dokumen_rkpd">        
          <div class="form-group">
            <label for="tahun_rkpd" class="col-sm-3 control-label" align='left'>Tahun RKPD :</label>
            <div class="col-sm-2">
              <input type="text" class="form-control" id="tahun_rkpd" name="tahun_rkpd" required="required" disabled style="text-align: center;">
            </div> 
          </div>
          <div class="form-group has-feedback">
            <label for="tanggal_rkpd" class="col-sm-3 control-label" align='left'>Tanggal Dokumen :</label>
            <input type="hidden" name="tanggal_rkpd" id="tanggal_rkpd">
            <div class="col-sm-4">
                <input type="text" class="form-control datepicker" id="tanggal_rkpd_x" name="tanggal_rkpd_x" style="text-align: center;">
                <i class="fa fa-calendar fa-fw fa-lg text-primary form-control-feedback"></i>              
            </div>
          </div>
          <div class="form-group">
            <label for="nomor_rkpd" class="col-sm-3 control-label" align='left'>Nomor Dokumen :</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="nomor_rkpd" name="nomor_rkpd" required="required">
            </div>
          </div>
          <div class="form-group">
            <label for="uraian_perkada" class="col-sm-3 control-label" align='left'>Uraian Dokumen :</label>
            <div class="col-sm-8">
              <textarea type="text" class="form-control" id="uraian_perkada" name="uraian_perkada" required="required" rows="3"></textarea>
            </div>
          </div>                              
          <div class="form-group">
            <label for="id_unit_perencana" class="col-sm-3 control-label" align='left'>Unit Perencana :</label>
            <div class="col-sm-8">
              <input type="hidden" class="form-control" name="id_unit_perencana" id="id_unit_perencana">
              <input type="text" class="form-control" name="id_unit_perencana_display" id="id_unit_perencana_display" disabled>
            </div>
          </div>
          <div class="form-group">
            <label for="nama_tandatangan" class="col-sm-3 control-label" align='left'>Nama Kepala Bappeda :</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="nama_tandatangan" name="nama_tandatangan">
            </div>
          </div>
          <div class="form-group">
            <label for="nip_tandatangan" class="col-sm-3 control-label" align='left'>NIP Kepala Bappeda :</label>
            <div class="col-sm-4">
              <input type="text" class="form-control nip" id="nip_tandatangan_display" name="nip_tandatangan_display" maxlength="18" style="text-align: center;">
              <input type="hidden" class="form-control" id="nip_tandatangan" name="nip_tandatangan">
            </div>
          </div>    
        </form>
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-sm-2 text-left">
            <button type="button" id="btnDelDokumen" class="btn btn-labeled btn-danger"><span class="btn-label"><i class="fa fa-trash-o fa-lg fa-fw"></i></span>Hapus</button>
          </div>
          <div class="col-sm-10 text-right">
            <div class="ui-group-buttons">
              <button id="btnDokumen" type="button" class="btn btn-success btn-labeled" data-dismiss="modal">
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

<div id="HapusDokumen" class="modal fade" role="dialog" tabindex="-1" data-focus-on="input:first" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
            <h4>Hapus Dokumen Rancangan Awal RKPD</h4>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id_dokumen_hapus" name="id_dokumen_hapus">
            <div class="alert alert-danger">
              <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border text-danger" aria-hidden="true"></i>
                Yakin akan menghapus Dokumen Rancangan Awal RKPD dengan nomor dokumen: <strong><span class="ur_dokumen_del"></span></strong>  ?
                <br>
                <br>
                <strong>Catatan : Penghapusan dokumen ini akan menghapus data Rancangan Awal RKPD yang telah diproses !!!!</strong>
          </div>
        </div>
          <div class="modal-footer">
            <div class="ui-group-buttons">
            <button type="button" id="btnDelDokumen1" class="btn btn-labeled btn-danger" data-dismiss="modal" ><span class="btn-label"><i class="fa fa-trash-o fa-lg fa-fw"></i></span> Hapus</button>
            <div class="or"></div>
            <button type="button" class="btn btn-labeled btn-warning" data-dismiss="modal" aria-hidden="true"><span class="btn-label"><i class="fa fa-sign-out fa-lg fa-fw"></i></span> Tutup</button>
            </div>
          </div>
        </div>
      </div>
    </div>

<div id="StatusProgram" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
            <h4 style="text-align: center;">Perubahan Status Rancangan Awal RKPD</h4>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id_dokumen_posting" name="id_dokumen_posting">
            <input type="hidden" id="status_dokumen_posting" name="status_dokumen_posting">
            <input type="hidden" id="tahun_dokumen_posting" name="tahun_dokumen_posting">
            <div class="alert alert-success">
                <div>
                  <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border text-info"  aria-hidden="true"></i>
                  <p>Yakin akan melakukan proses <strong><i><span id="ur_status_dokumen_posting"></span></i></strong> pada Dokumen Rancangan Awal RKPD Tahun <strong><span id="ur_tahun_posting"></span></strong> ?</p>
                </div>
                <hr>
                <div>
                  <strong>Catatan : Proses ini mempengaruhi data selanjutnya.....!!!!</strong>
                </div> 
          </div>
        </div>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" id="btnPostProgram" class="btn btn-success btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i class="fa fa-check-square-o fa-fw fa-lg"></i></span>Proses</button>
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
<script type="text/javascript" language="javascript" class="init">
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

$('.page-alert .close').click(function(e) {
  e.preventDefault();
  $(this).closest('.page-alert').slideUp();
});

$('#tahun_rkpd').number(true,0,',','');

$('#tanggal_rkpd_x').datepicker({
  altField: "#tanggal_rkpd",
  altFormat: "yy-mm-dd", 
  dateFormat: "dd MM yy"
});

$('#btn').click(function() {
    $("#tanggal_rkpd_x").focus();
  });

function buatNip(string){
  return string.replace(/(\d{8})(\d{6})(\d{1})(\d{3})/,"$1 $2 $3 $4");
}

function nilaiNip(string){
  return string.replace(/\D/g,'').substring(0, 20);
}

var angkaNip = document.getElementsByClassName('nip');

angkaNip.onkeydown = function(e) {
  if(!((e.keyCode > 95 && e.keyCode < 106)
    || (e.keyCode > 47 && e.keyCode < 58) 
    )) { return false; }
}

$("input[name='nip_tandatangan_display']").on("keyup", function(){
    $("input[name='nip_tandatangan']").val(nilaiNip(this.value));
    this.value = buatNip($("input[name='nip_tandatangan']").val());
})

var dokumen_tbl = $('#tblDokumen').DataTable({
        processing: true,
        serverSide: true,
        "autoWidth": false,
        "ajax": {"url": "./getDataDokumen"},
        "language": {
                "decimal": ",",
                "thousands": "."},
        "columns": [
              { data: 'no_urut', sClass: "dt-center"},
              { data: 'tahun_rkpd', sClass: "dt-center"},
              { data: 'nomor_rkpd'},
              { data: 'uraian_perkada'},
              { data: 'icon','searchable': false, 'orderable':false, sClass: "dt-center",width:"15px",
                render: function(data, type, row,meta) {
                return '<i class="'+row.status_icon+'" style="font-size:16px;color:'+row.warna+';"/>';
              }},
              { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
            ],
            "order": [[0, 'asc']],
            "bDestroy": true
      });

var id_dokumen_temp, tahun_rkpd_temp;
$('#tblDokumen tbody').on( 'dblclick', 'tr', function () {
    var data = dokumen_tbl.row(this).data();
    id_dokumen_temp=data.id_dokumen_rkpd;
    tahun_rkpd_temp=data.tahun_rkpd;

    if (data.flag == 1){
      document.getElementById("btnProses").style.visibility='hidden';
    } else {
      document.getElementById("btnProses").style.visibility='visible';
    }

    document.getElementById("tahun_rkpd_display").innerHTML = data.tahun_rkpd;
    document.getElementById("no_dokumen_display").innerHTML = data.nomor_rkpd;

    $('.nav-tabs a[href="#loaddata"]').tab('show');
    // LoadRekapLoad(id_dokumen_temp);

  });

$(document).on('click', '#btnRekapRkpd', function() {
  
  var data = dokumen_tbl.row( $(this).parents('tr') ).data();

  id_dokumen_temp=data.id_dokumen_rkpd;
  tahun_rkpd_temp=data.tahun_rkpd;

    if (data.flag == 1){
      document.getElementById("btnProses").style.visibility='hidden';
    } else {
      document.getElementById("btnProses").style.visibility='visible';
    }

    document.getElementById("tahun_rkpd_display").innerHTML = data.tahun_rkpd;
    document.getElementById("no_dokumen_display").innerHTML = data.nomor_rkpd;

    $('.nav-tabs a[href="#loaddata"]').tab('show');
    // LoadRekapLoad(id_dokumen_temp);
});

$(document).on('click', '.btnProses', function() {

$.ajaxSetup({
    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});

$('#ModalProgress').modal('show');

$.ajax({
        type: 'POST',
        url: './prosesTransferData',
        data: {
            '_token': $('input[name=_token]').val(),
            'tahun_rkpd' : $('#tahun_rkpd').val(),
        },
        success: function(data) {
          createPesan("Data Berhasil di Load","success");
          $('#tblProgramRKPD').DataTable().ajax.url("./getDataRekap/"+$('#tahun_rkpd').val());
          $('#tblProgramRKPD').DataTable().ajax.reload();
          $('#ModalProgress').modal('hide');
        },
        error: function(data){
          createPesan("Data Gagal di Load","danger");
          $('#tblProgramRKPD').DataTable().ajax.reload();
          $('#ModalProgress').modal('hide');
        }
});
});

$(document).on('click', '.btnUnload', function() {
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $('#ModalProgress').modal('show');

    $.ajax({
        type: 'POST',
        url: './unLoadProgramRkpd',
        data: {
            '_token': $('input[name=_token]').val(),
            'tahun' : $(this).data('tahun_rkpd'),
            'id_ranwal' : $(this).data('id_rkpd_ranwal'),
        },
        success: function(data) {
            createPesan(data.pesan,"success");
            $('#tblProgramRKPD').DataTable().ajax.reload();
            $('#ModalProgress').modal('hide');
        },
        error: function(data){
            createPesan(data.pesan,"danger");
            $('#tblProgramRKPD').DataTable().ajax.reload();
            $('#ModalProgress').modal('hide');
        }
    });
});

$(document).on('click', '#btnAddDokumen', function() {
  $.ajax({
    type: "GET",
    url: './getDataPerencana',
    dataType: "json",
    success: function(data) {
      $('#btnDokumen').removeClass('editDokumen');
      $('#btnDokumen').addClass('addDokumen');
      $('.modal-title').text('Tambah Dokumen Penyusunan Rancangan RKPD');
      $('.form-horizontal').show();

      $('#id_dokumen_rkpd').val(null);
      $('#tahun_rkpd').val({{Session::get('tahun')}});
      $('#tanggal_rkpd').val(null);
      $('#tanggal_rkpd_x').val(null);
      $('#nomor_rkpd').val(null);
      $('#uraian_perkada').val(null);
      $('#id_unit_perencana').val(data[0].unit_perencanaan);
      $('#id_unit_perencana_display').val(data[0].nm_unit);
      $('#nama_tandatangan').val(data[0].nama_kepala_bappeda);
      
      if(data[0].nip_kepala_bappeda==null){
        $('#nip_tandatangan_display').val(null);
      } else {
        $('#nip_tandatangan_display').val(buatNip(data[0].nip_kepala_bappeda));
      };
      
      $('#nip_tandatangan').val(data[0].nip_kepala_bappeda);

      $('#btnDelDokumen').hide();
      $('#btnDokumen').show();
      $('#TambahDokumen').modal('show');
    }
  });
});

$('.modal-footer').on('click', '.addDokumen', function() {
  $.ajaxSetup({
      headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });

    $.ajax({
      type: 'post',
      url: './addDokumen',
      data: {
        '_token': $('input[name=_token]').val(),
        'tahun_rkpd': $('#tahun_rkpd').val(),
        'tanggal_rkpd': $('#tanggal_rkpd').val(),
        'nomor_rkpd': $('#nomor_rkpd').val(),
        'uraian_perkada': $('#uraian_perkada').val(),
        'id_unit_perencana': $('#id_unit_perencana').val(),
        'nama_tandatangan': $('#nama_tandatangan').val(),
        'nip_tandatangan': $('#nip_tandatangan').val(),
      },
      success: function(data) {
        dokumen_tbl.ajax.reload();
        if(data.status_pesan==1){
          createPesan(data.pesan,"success");
        } else {
          createPesan(data.pesan,"danger"); 
        }
      }
    });
});

$(document).on('click', '#btnEditDokumen', function() {

  var data = dokumen_tbl.row( $(this).parents('tr') ).data();

      $('#btnDokumen').removeClass('addDokumen');
      $('#btnDokumen').addClass('editDokumen');
      $('.modal-title').text('Ubah Dokumen Penyusunan Rancangan Awal RKPD');
      $('.form-horizontal').show();

      $('#id_dokumen_rkpd').val(data.id_dokumen_rkpd);
      $('#tahun_rkpd').val(data.tahun_rkpd);
      $('#tanggal_rkpd').val(data.tanggal_rkpd);
      $('#tanggal_rkpd_x').val(formatTgl(data.tanggal_rkpd));
      $('#nomor_rkpd').val(data.nomor_rkpd);
      $('#uraian_perkada').val(data.uraian_perkada);
      $('#id_unit_perencana').val(data.id_unit_perencana);
      $('#id_unit_perencana_display').val(data.nm_unit);
      $('#nama_tandatangan').val(data.nama_tandatangan);      
      $('#nip_tandatangan').val(data.nip_tandatangan);
      
      if(data.nip_tandatangan==null){
        $('#nip_tandatangan_display').val(null);
      } else {
        $('#nip_tandatangan_display').val(buatNip(data.nip_tandatangan));
      };

      if(data.flag==1){
        $('#btnDelDokumen').hide();
        $('#btnDokumen').hide();
      } else {
        $('#btnDelDokumen').show();
        $('#btnDokumen').show();
      };

      $('#TambahDokumen').modal('show');
});

$('.modal-footer').on('click', '.editDokumen', function() {
  $.ajaxSetup({
      headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });

    $.ajax({
      type: 'post',
      url: './editDokumen',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_dokumen_rkpd': $('#id_dokumen_rkpd').val(),
        'tahun_rkpd': $('#tahun_rkpd').val(),
        'tanggal_rkpd': $('#tanggal_rkpd').val(),
        'nomor_rkpd': $('#nomor_rkpd').val(),
        'uraian_perkada': $('#uraian_perkada').val(),
        'id_unit_perencana': $('#id_unit_perencana').val(),
        'nama_tandatangan': $('#nama_tandatangan').val(),
        'nip_tandatangan': $('#nip_tandatangan').val(),
      },
      success: function(data) {
        dokumen_tbl.ajax.reload();
        if(data.status_pesan==1){
          createPesan(data.pesan,"success");
        } else {
          createPesan(data.pesan,"danger"); 
        }
      }
    });
});

$(document).on('click', '#btnDelDokumen', function() {
  
  $('#btnDelDokumen1').removeClass('delDokumen');
  $('#btnDelDokumen1').addClass('delDokumen');
  $('.form-horizontal').show();

  $('#id_dokumen_hapus').val($('#id_dokumen_rkpd').val());
  $('.ur_dokumen_del').html($('#nomor_rkpd').val());

  $('#HapusDokumen').modal('show');
});

$('.modal-footer').on('click', '.delDokumen', function() {
  $.ajaxSetup({
      headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });

    $.ajax({
      type: 'post',
      url: './hapusDokumen',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_dokumen_rkpd': $('#id_dokumen_hapus').val(),
      },
      success: function(data) {
        dokumen_tbl.ajax.reload();
        $('#TambahDokumen').modal('hide');
        if(data.status_pesan==1){
          createPesan(data.pesan,"success");
        } else {
          createPesan(data.pesan,"danger"); 
        }
      }
    });
});

$(document).on('click', '#btnPostingRkpd', function() {

  var data = dokumen_tbl.row( $(this).parents('tr') ).data();
      $('.form-horizontal').show();

      $('#id_dokumen_posting').val(data.id_dokumen_rkpd);
      $('#status_dokumen_posting').val(data.flag);
      $('#tahun_dokumen_posting').val(data.tahun_rkpd);      
      $('#ur_tahun_posting').html(data.tahun_rkpd);

      if(data.flag==0){
        $('#ur_status_dokumen_posting').html("Posting");
      } else {
        $('#ur_status_dokumen_posting').html("Un-Posting");
      };

      $('#StatusProgram').modal('show');
});

$('.modal-footer').on('click', '#btnPostProgram', function() {
      var status_post, status_temp, status_awal;
      if($('#status_dokumen_posting').val()==0){
          status_post = 1;
          status_temp = 2;
          status_awal = 1;
      } else {
          status_post = 0;
          status_temp = 1;
          status_awal = 2;
      };

      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });
      
      $('#StatusProgram').modal('hide');
      $('#ModalProgress').modal('show');

      $.ajax({
          type: 'post',
          url: './postDokumen',
          data: {
              '_token': $('input[name=_token]').val(),
              'tahun_rkpd': $('#tahun_dokumen_posting').val(),
              'id_dokumen_rkpd': $('#id_dokumen_posting').val(),
              'flag': status_post,
              'status': status_temp,
              'status_awal': status_awal,
          },
          success: function(data) {
              dokumen_tbl.ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
              $('#ModalProgress').modal('hide');
          },
          error: function(data){
          dokumen_tbl.ajax.reload();
          $('#ModalProgress').modal('hide');
          createPesan("Data Gagal Diposting (0vdrPD)","danger");
        }
      });
    });

});
</script>
@endsection
