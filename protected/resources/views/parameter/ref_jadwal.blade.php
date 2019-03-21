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
                $this->title = ' Agenda Tahunan ';
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
            <p><h2 class="panel-title">Agenda Kegiatan Penyusunan Perencanaan Tahunan
            </h2></p>
          </div>

          <div class="panel-body">
            <div class="add">
              <button class="add-satuan btn-labeled btn btn-sm btn-success"><span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Agenda Tahunan</button>
            </div>
            <br>
            <div class="table-responsive">
            <table id="tblSetting" class="table compact display table-striped table-bordered table-responsive" width="100%">
                  <thead>
                      <tr>
                          <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                          <th style="text-align: center; vertical-align:middle">Tahun Anggaran</th>
                          <th width="20%" style="text-align: center; vertical-align:middle">Aksi</th>
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
<div id="ModalSetting" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg"  >
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
      </div>

      <div class="modal-body">
        <form name="frmModalSetting" class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                    <div class="col-sm-10 pull-left">
                      <div class="form-group">
                        <p class="col-sm-6" align='left'>Rincian Agenda Kerja Tahun Perencanaan 
                        <div class="col-sm-3 pull-left">
                          <input type="text" class="form-control number" id="tahun_rencana" name="tahun_rencana" readonly="true" >
                        </div>
                        </p>
                      </div>  
                    </div>
                    <div class="col-sm-2 text-right">
                        <button type="button" class="btn btn-sm btn-warning btn-labeled btnTutupRinci" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
                    </div>
                </div>
            
            <div class="form-group">
              <div class="col-sm-12">
              <table id="tblRinciAgenda" class="table table-bordered table-responsive display">
                        <thead>
                          <tr>
                            <td rowspan="2" width="5%" style="text-align: center; vertical-align:middle;">Nomor</td>
                            <td rowspan="2" width="25%" style="text-align: center; vertical-align:middle;">Uraian Proses</td>
                            <td colspan="2" width="50%" style="text-align: center; vertical-align:middle;">Rincian Agenda Kerja Tahunan</td>
                            <td rowspan="2" width="15%" style="text-align: center; vertical-align:middle;">Status</td>
                            <td rowspan="2" width="15%" style="text-align: center; vertical-align:middle;">Aksi</td>
                          </tr>
                          <tr>
                            <td width="25%" style="text-align: center; vertical-align:middle;">Mulai</td>
                            <td width="25%" style="text-align: center; vertical-align:middle;">Selesai</td>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <td width="5%" style="text-align: center; vertical-align:middle;"></td>
                              <td width="25%" style="text-align: left; vertical-align:middle;"></td>
                              <td width="25%" style="text-align: left; vertical-align:middle;"></td>
                              <td width="25%" style="text-align: left; vertical-align:middle;"></td>
                              <td width="15%" style="text-align: left; vertical-align:middle;"></td>
                              <td width="15%" style="text-align: left; vertical-align:middle;"></td>
                          </tr>
                        </tbody>
                    </table>
            </div>
          </div>        
        </form>
      </div>
                
      </div>
    </div>
  </div>

{{-- Tambah Modal Rincian --}}
<div id="ModalRincian" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg"  >
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
      </div>

      <div class="modal-body">
        <form name="frmModalRincian" class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" id="id_langkah_rinc" name="id_langkah_rinc">
            <input type="hidden" id="tahun_rinc" name="tahun_rinc">
            <input type="hidden" id="jenis_proses_rinc" name="jenis_proses_rinc">
            <input type="hidden" id="id_proses_rinc" name="id_proses_rinc">
            <div class="form-group">
              <div class="col-sm-12">
              <table id="tblRinciAgendaX" class="table table-bordered table-responsive">
                        <thead>
                          <tr>
                            <td rowspan="2" width="25%" style="text-align: center; vertical-align:middle;">Uraian Proses</td>
                            <td colspan="2" width="50%" style="text-align: center; vertical-align:middle;">Rincian Agenda Kerja Tahunan</td>
                            <td rowspan="2" width="25%" style="text-align: center; vertical-align:middle;">Status</td>
                          </tr>
                          <tr>
                            <td width="25%" style="text-align: center; vertical-align:middle;">Mulai</td>
                            <td width="25%" style="text-align: center; vertical-align:middle;">Selesai</td>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <td width="25%" style="text-align: left; vertical-align:middle;">
                                <span id="ur_jadwal_rinci"></span>
                              </td>
                              <td width="25%" style="text-align: left; vertical-align:middle;">
                                <div class="has-feedback">
                                      <input type="hidden" name="txt_mulai_ranwal_rkpd1" id="txt_mulai_ranwal_rkpd1">
                                      <input type="text" class="form-control date-picker" id="txt_mulai_ranwal_rkpd" name="txt_mulai_ranwal_rkpd" required="required" >
                                      <span> <i class="fa fa-calendar fa-fw fa-lg form-control-feedback"></i> </span> 
                                  </div>                                
                              </td>
                              <td width="25%" style="text-align: left; vertical-align:middle;">
                                <div class="has-feedback">
                                      <input type="hidden" name="txt_akhir_ranwal_rkpd1" id="txt_akhir_ranwal_rkpd1">
                                      <input type="text" class="form-control date-picker" id="txt_akhir_ranwal_rkpd" name="txt_akhir_ranwal_rkpd" required="required" >
                                      <span> <i class="fa fa-calendar fa-fw fa-lg form-control-feedback"></i> </span> 
                                  </div>                                
                              </td>
                              <td width="25%" style="text-align: left; vertical-align:middle;">
                                <div class="">
                                  <select type="text" class="form-control" id="txt_status_rinci" name="txt_status_rinci">
                                      <option value="0">Belum Dilaksanakan</option>
                                      <option value="1">Proses Pelaksanaan</option>
                                      <option value="2">Telah Dilaksanakan</option>
                                      <option value="3">Waktu Kedaluwarsa</option>
                                      <option value="4">Batal Dilaksanakan</option>
                                  </select>
                                </div>                                
                              </td>
                          </tr>
                        </tbody>
                    </table>
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
                        <button type="button" class="btn btn-sm btn-success btnSimpanRinci btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i id="btnSimpanRinci" class="glyphicon glyphicon-save"></i></span>Simpan</button>
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
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <input type="hidden" id="tahun_rencana_hapus" name="tahun_rencana_hapus">
          <div class="alert alert-danger deleteContent">
              <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border"  style="color:red;" aria-hidden="true"></i>
                <br>
                Yakin akan menghapus Setting Tahun : <strong><span id="ur_tahun_hapus"></span></strong> ?
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

@endsection

@section('scripts')
<script  type="text/javascript" language="javascript" class="init">

$(document).ready(function() {

$('[data-toggle="popover"]').popover();

function formatTgl(val_tanggal){
      var formattedDate = new Date(val_tanggal);
      var d = formattedDate.getDate();
      var m = formattedDate.getMonth();
      var y = formattedDate.getFullYear();
      var m_names = new Array("Januari", "Februari", "Maret", 
        "April", "Mei", "Juni", "Juli", "Agustus", "September", 
        "Oktober", "November", "Desember")

      var tgl= d + " " + m_names[m] + " " + y

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

$('.page-alert .close').click(function(e) {
        e.preventDefault();
        $(this).closest('.page-alert').slideUp();
    });

$('.number').number(true,0,',', '.');

$('.display').DataTable({
      dom : 'BfRtip',
      autoWidth : false,
      responsive: true,
      bDestroy: true
  });

$('#txt_mulai_ranwal_rkpd').datepicker({
          altField: "#txt_mulai_ranwal_rkpd1",
          altFormat: "yy-mm-dd", 
          dateFormat: "dd MM yy"
      });

$('#txt_akhir_ranwal_rkpd').datepicker({
          altField: "#txt_akhir_ranwal_rkpd1",
          altFormat: "yy-mm-dd", 
          dateFormat: "dd MM yy"
      });


var setting_tbl=$('#tblSetting').DataTable({
                  processing: true,
                  serverSide: true,
                  responsive: true,
                  dom : 'BFRTIP',                  
                  autoWidth : false,
                  "ajax": {"url": "./agenda/rekapagenda"},
                  "language": {
                      "decimal": ",",
                      "thousands": "."},
                  "columns": [
                        { data: 'no_urut','searchable': false, 'orderable':false, sClass: "dt-center", width :"5%"},
                        { data: 'tahun', sClass: "dt-left"},
                        { data: 'action', 'searchable': false, width :"20%", 'orderable':false, sClass: "dt-center" }
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        });

var rincian_tbl;
function LoadRinciAgenda(tahun){
rincian_tbl = $('#tblRinciAgenda').DataTable({
                  processing: true,
                  serverSide: true,
                  responsive: true,
                  dom : 'BFRTIP',
                  paging : false,                  
                  autoWidth : false,
                  "ajax": {"url": "./agenda/rinciagenda/"+tahun},
                  "language": {
                      "decimal": ",",
                      "thousands": "."},
                  "columns": [
                        { data: 'no_urut','searchable': false, 'orderable':false, sClass: "dt-center", width :"5%"},
                        { data: 'nm_langkah', sClass: "dt-left"},
                        { data: 'tgl_mulai',  sClass: "dt-center",
                          render: function (data) {
                          var date = new Date(data);
                          return formatTgl(date);
                        }},
                        { data: 'tgl_akhir', sClass: "dt-center",
                          render: function (data) {
                          var date = new Date(data);
                          return formatTgl(date);
                        }},
                        { data: 'status_display', 'searchable': false, width :"15%", 'orderable':false, sClass: "dt-center"},
                        { data: 'action', 'searchable': false, width :"10%", 'orderable':false, sClass: "dt-center" }
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        });
}

$(document).on('click', '.add-satuan', function() {
  LoadRinciAgenda({{Session::get('tahun')}});

  $('.modal-title').text('Rincian Agenda Kerja Tahun');
  $('.form-horizontal').show();
  $('#tahun_rencana').val({{Session::get('tahun')}});
  $('#ModalSetting').modal('show');  
});

$(document).on('click', '.btnEditJadwal', function() {
  var data = rincian_tbl.row( $(this).parents('tr') ).data();

  $('.form-horizontal').show();
  $('#ur_jadwal_rinci').text(data.nm_langkah);
  $('#txt_mulai_ranwal_rkpd1').val(data.tgl_mulai);
  $('#txt_mulai_ranwal_rkpd').val(formatTgl(data.tgl_mulai));
  $('#txt_akhir_ranwal_rkpd1').val(data.tgl_akhir);
  $('#txt_akhir_ranwal_rkpd').val(formatTgl(data.tgl_akhir));
  $('#txt_status_rinci').val(data.status_proses);
  $('#id_langkah_rinc').val(data.id_langkah);
  $('#jenis_proses_rinc').val(data.jenis_proses);
  $('#id_proses_rinc').val(data.id_proses);
  $('#tahun_rinc').val($('#tahun_rencana').val());
  $('#ModalRincian').modal('show');
});

$(document).on('click', '.btnEditTahun', function() {
  var datax = setting_tbl.row( $(this).parents('tr') ).data();

  $('.btnSatuan').removeClass('add');
  $('.btnSatuan').addClass('edit');
  $('.modal-title').text('Rincian Agenda Kerja Tahun');
  $('.form-horizontal').show();
  $('#tahun_rencana').val(datax.tahun);

  LoadRinciAgenda(datax.tahun);

  $('#ModalSetting').modal('show');
});

$('.modal-footer').on('click', '.btnSimpanRinci', function() {


    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './agenda/addJadwal',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_proses' : $('#id_proses_rinc').val(),
            'tahun' : $('#tahun_rinc').val(),
            'id_langkah' : $('#id_langkah_rinc').val(),
            'jenis_proses' : $('#jenis_proses_rinc').val(),
            'uraian_proses' : $('#ur_jadwal_rinci').val(),
            'tgl_mulai' : $('#txt_mulai_ranwal_rkpd1').val(),
            'tgl_akhir' : $('#txt_akhir_ranwal_rkpd1').val(),
            'status_proses' : $('#txt_status_rinci').val(),
        },
        success: function(data) {
              $('#tblRinciAgenda').DataTable().ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
        },
    });

  // alert("test");

});


$('#tblSetting tbody').on( 'dblclick', 'tr', function () {

  var data = setting_tbl.row(this).data();

  LoadRinciAgenda(data.tahun);

  $('.modal-title').text('Rincian Agenda Kerja Tahun');
  $('.form-horizontal').show();
  $('#tahun_rencana').val(data.tahun);
  $('#ModalSetting').modal('show'); 

} );


//delete function
$(document).on('click', '.btnHapusTahun', function() {
  var data = setting_tbl.row( $(this).parents('tr') ).data();

  $('.actionBtn').removeClass('btn-success');
  $('.actionBtn').addClass('btn-danger');
  $('.actionBtn').addClass('delete');
  $('.modal-title').text('Hapus Jadwal Tahun Perencanaan');
  $('#tahun_rencana_hapus').val(data.tahun);
  $('.form-horizontal').hide();
  $('#ur_tahun_hapus').text(data.tahun);
  $('#HapusModal').modal('show');
});


$('.modal-footer').on('click', '.delete', function() {
  $.ajaxSetup({
     headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });

  $.ajax({
    type: 'post',
    url: './agenda/hapusJadwal',
    data: {
      '_token': $('input[name=_token]').val(),
      'tahun': $('#tahun_rencana_hapus').val()
    },
    success: function(data) {
      $('.item' + $('#tahun_rencana_hapus').val()).remove();
      $('#tblSetting').DataTable().ajax.reload();
      createPesan(data.pesan,"success");
    }
  });
});

});
</script>
@endsection
