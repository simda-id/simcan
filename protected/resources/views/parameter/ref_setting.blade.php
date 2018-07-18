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
                $this->title = ' Setting Aplikasi ';
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
            <p><h2 class="panel-title">Referensi Setting Aplikasi Tahunan
            <a data-toggle="popover" data-html="true" data-container="body" title="Setting Aplikasi" data-trigger="hover" data-content="Dilakukan untuk melakukan setting aplikasi terkait dengan tahun perencanaan dan limit usulan."><i class="glyphicon glyphicon-question-sign"></i></a></h2></p>
          </div>

          <div class="panel-body">
            <div class="add">
              <button class="add-satuan btn-labeled btn btn-sm btn-success"><span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Tahun Setting</button>
            </div>
            <br>
            <div class="table-responsive">
            <table id="tblSetting" class="table compact display table-striped table-bordered table-responsive" width="100%">
                  <thead>
                      <tr>
                          <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                          <th style="text-align: center; vertical-align:middle">Tahun Anggaran</th>
                          <th width="5%" style="text-align: center; vertical-align:middle">Status</th>
                          <th width="20px" style="text-align: center; vertical-align:middle">Aksi</th>
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
            <div class="form-group">
              <label for="ur_satuan" class="col-sm-3" align='left'>Tahun Perencanaan :</label>
              <div class="col-sm-2">
                <input type="text" class="form-control number" id="tahun_rencana" name="tahun_rencana" required="required" style="text-align: center;" >
              </div>
            </div>
            <div class="form-group">
              <label for="scope_pemakaian" class="col-sm-6" align='left'>Setting Pembatasan Pengajuan Usulan pada :</label>
              <div class="col-sm-12">
              <table class="table table-striped table-bordered table-responsive">
                        <thead>
                          <tr>
                            <td rowspan="2" width="10%" style="text-align: center; vertical-align:middle;">Proses Musrenbang</td>
                            <td colspan="3" width="90%" style="text-align: center; vertical-align:middle;">Pembatasan Akses</td>
                          </tr>
                          <tr>
                            <td width="30%" style="text-align: center; vertical-align:middle;">Jenis</td>
                            <td width="30%" style="text-align: center; vertical-align:middle;">Usulan</td>
                            <td width="30%" style="text-align: center; vertical-align:middle;">Pagu</td>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <td width="10%" style="text-align: center; vertical-align:middle;">RW</td>
                              <td width="30%" style="text-align: left; vertical-align:middle;">
                                <select type="text" class="form-control" id="jenis_rw" name="jenis_rw">
                                  <option value="0">Tidak Ada</option>
                                  <option value="1">Usulan</option>
                                  <option value="2">Pagu</option>
                                </select>
                              </td>
                              <td width="30%" style="text-align: left; vertical-align:middle;">
                                <div class="input-group">
                                  <input type="text" class="form-control number" id="jml_rw" name="jml_rw">
                                  <span class="input-group-addon" text-align="center"><strong>usulan</strong></span>
                                </div>
                              </td>
                              <td width="30%" style="text-align: left; vertical-align:middle;">
                                <div class="input-group">
                                  <span class="input-group-addon" text-align="center"><strong>Rp</strong></span>
                                  <input type="text" class="form-control number" id="pagu_rw" name="pagu_rw">
                                </div>
                              </td>
                          </tr>
                          <tr>
                              <td width="10%" style="text-align: center; vertical-align:middle;">Desa/Kelurahan</td>
                              <td width="30%" style="text-align: left; vertical-align:middle;">
                                <select type="text" class="form-control" id="jenis_desa" name="jenis_desa">
                                  <option value="0">Tidak Ada</option>
                                  <option value="1">Usulan</option>
                                  <option value="2">Pagu</option>
                                </select>
                              </td>
                              <td width="30%" style="text-align: left; vertical-align:middle;">
                                <div class="input-group">
                                  <input type="text" class="form-control number" id="jml_desa" name="jml_desa">
                                  <span class="input-group-addon" text-align="center"><strong>usulan</strong></span>
                                </div>
                              </td>
                              <td width="30%" style="text-align: left; vertical-align:middle;">
                                <div class="input-group">
                                  <span class="input-group-addon" text-align="center"><strong>Rp</strong></span>
                                  <input type="text" class="form-control number" id="pagu_desa" name="pagu_desa">
                                </div>
                              </td>
                          </tr>
                          <tr>
                              <td width="10%" style="text-align: center; vertical-align:middle;">Kecamatan</td>
                              <td width="30%" style="text-align: left; vertical-align:middle;">
                                <select type="text" class="form-control" id="jenis_kecamatan" name="jenis_kecamatan">
                                  <option value="0">Tidak Ada</option>
                                  <option value="1">Usulan</option>
                                  <option value="2">Pagu</option>
                                </select>
                              </td>
                              <td width="30%" style="text-align: left; vertical-align:middle;">
                                <div class="input-group">
                                  <input type="text" class="form-control number" id="jml_kecamatan" name="jml_kecamatan">
                                  <span class="input-group-addon" text-align="center"><strong>usulan</strong></span>
                                </div>
                              </td>
                              <td width="30%" style="text-align: left; vertical-align:middle;">
                                <div class="input-group">
                                  <span class="input-group-addon" text-align="center"><strong>Rp</strong></span>
                                  <input type="text" class="form-control number" id="pagu_kecamatan" name="pagu_kecamatan">
                                </div>
                              </td>
                          </tr>
                        </tbody>
                    </table>
            </div>
          </div>

          <div class="form-group">
              <label for="deviasi_pagu" class="col-sm-3" align='left'>Deviasi Control Pagu (%) :</label>
              <div class="col-sm-2">
                <input type="text" class="form-control number" id="deviasi_pagu" name="deviasi_pagu" required="required" style="text-align: right;">
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
                        <button type="button" class="btn btn-sm btn-success btnSatuan btn-labeled" data-dismiss="modal">
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


  <div id="StatusSetting" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <input type="hidden" id="tahun_rencana_posting" name="tahun_rencana_posting">
            <div class="alert alert-info">
              <i class="fa fa-exclamation-triangle fa-pull-left fa-3x fa-border"  style="color:blue;" aria-hidden="true"></i>
                Yakin akan meng-<strong>Aktif</strong>-kan setting ini untuk tahun : <strong><span id="id_tahun_posting"></span></strong> ?
                <br>
                <br>
                <div class="col-sm-5">
                  <select type="text" class="form-control" id="status_setting" name="status_setting">
                                  <option value="1">Aktif</option>
                                  <option value="2">Tidak Aktif</option>
                  </select>
                </div>
                <br>
                <br>                  
            </div>
          </div>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusKeg">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" id="btnPosting" class="btn btn-sm btn-success btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i class="glyphicon glyphicon-check"></i></span>Posting</button>
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

$('#deviasi_pagu').number(true,2,',', '.');
// $('#jml_rw').number(true,0,',', '.');
// $('#pagu_rw').number(true,2,',', '.');
// $('#jml_desa').number(true,0,',', '.');
// $('#pagu_desa').number(true,2,',', '.');
// $('#jml_kecamatan').number(true,0,',', '.');
// $('#pagu_kecamatan').number(true,2,',', '.');

$('.display').DataTable({
      dom : 'BfRtip',
      autoWidth : false,
      bDestroy: true
  });


var setting_tbl=$('#tblSetting').DataTable({
                  processing: true,
                  serverSide: true,
                  responsive: true,
                  dom : 'BfRtip',                  
                  autoWidth : false,
                  "ajax": {"url": "./setting/getListSetting"},
                  "language": {
                      "decimal": ",",
                      "thousands": "."},
                  "columns": [
                        { data: 'no_urut','searchable': false, 'orderable':false, sClass: "dt-center", width :"5%"},
                        { data: 'tahun_rencana', sClass: "dt-left"},
                        { data: 'icon','searchable': false, 'orderable':false, sClass: "dt-center", width :"5%",
                            render: function(data, type, row,meta) {
                            return '<i class="'+row.status_icon+'" fa-3x fa-fw text-primary"/>';
                          }},
                        { data: 'action', 'searchable': false, width :"20%", 'orderable':false, sClass: "dt-center" }
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        });

$(document).on('click', '.add-satuan', function() {
  $('.btnSatuan').addClass('btn-success');
  $('.btnSatuan').removeClass('btn-danger');
  $('.btnSatuan').removeClass('edit');
  $('.btnSatuan').addClass('add');
  $('.modal-title').text('Tambah Setting Tahun Perencanaan');
  $('.form-horizontal').show();
  $('#tahun_rencana').val({{Session::get('tahun')}});
  $('#jenis_rw').val(0);
  $('#jml_rw').val(0);
  $('#pagu_rw').val(0);
  $('#jenis_desa').val(0);
  $('#jml_desa').val(0);
  $('#pagu_desa').val(0);
  $('#jenis_kecamatan').val(0);
  $('#jml_kecamatan').val(0);
  $('#pagu_kecamatan').val(0);
  $('#deviasi_pagu').val(5);
  $('#ModalSetting').modal('show');
});

$('.modal-footer').on('click', '.add', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './setting/addSetting',
        data: {
            '_token': $('input[name=_token]').val(),
            'tahun_rencana' : $('#tahun_rencana').val(),
            'jenis_rw' : $('#jenis_rw').val(),
            'jml_rw' : $('#jml_rw').val(),
            'pagu_rw' : $('#pagu_rw').val(),
            'jenis_desa' : $('#jenis_desa').val(),
            'jml_desa' : $('#jml_desa').val(),
            'pagu_desa' : $('#pagu_desa').val(),
            'jenis_kecamatan' : $('#jenis_kecamatan').val(),
            'jml_kecamatan' : $('#jml_kecamatan').val(),
            'pagu_kecamatan' : $('#pagu_kecamatan').val(),
            'deviasi_pagu' : $('#deviasi_pagu').val(),
        },
        success: function(data) {
              $('#tblSetting').DataTable().ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
        },
  });
});


$('#tblSetting tbody').on( 'dblclick', 'tr', function () {

  var data = setting_tbl.row(this).data();

  $('.btnSatuan').addClass('btn-success');
  $('.btnSatuan').removeClass('btn-danger');
  $('.btnSatuan').removeClass('add');
  $('.btnSatuan').addClass('edit');
  $('.modal-title').text('Edit Setting Tahun Perencanaan');
  $('.form-horizontal').show();
  $('#tahun_rencana').val(data.tahun_rencana);
  $('#jenis_rw').val(data.jenis_rw);
  $('#jml_rw').val(data.jml_rw);
  $('#pagu_rw').val(data.pagu_rw);
  $('#jenis_desa').val(data.jenis_desa);
  $('#jml_desa').val(data.jml_desa);
  $('#pagu_desa').val(data.pagu_desa);
  $('#jenis_kecamatan').val(data.jenis_kecamatan);
  $('#jml_kecamatan').val(data.jml_kecamatan);
  $('#pagu_kecamatan').val(data.pagu_kecamatan);
  $('#deviasi_pagu').val(data.deviasi_pagu);
  $('#ModalSetting').modal('show');  

  } );

//edit function
$(document).on('click', '#btnEditSetting', function() {

var data = setting_tbl.row( $(this).parents('tr') ).data();

  $('.btnSatuan').addClass('btn-success');
  $('.btnSatuan').removeClass('btn-danger');
  $('.btnSatuan').removeClass('add');
  $('.btnSatuan').addClass('edit');
  $('.modal-title').text('Edit Setting Tahun Perencanaan');
  $('.form-horizontal').show();
  $('#tahun_rencana').val(data.tahun_rencana);
  $('#jenis_rw').val(data.jenis_rw);
  $('#jml_rw').val(data.jml_rw);
  $('#pagu_rw').val(data.pagu_rw);
  $('#jenis_desa').val(data.jenis_desa);
  $('#jml_desa').val(data.jml_desa);
  $('#pagu_desa').val(data.pagu_desa);
  $('#jenis_kecamatan').val(data.jenis_kecamatan);
  $('#jml_kecamatan').val(data.jml_kecamatan);
  $('#pagu_kecamatan').val(data.pagu_kecamatan);
  $('#deviasi_pagu').val(data.deviasi_pagu);
  $('#ModalSetting').modal('show');
});


$('.modal-footer').on('click', '.edit', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './setting/editSetting',
        data: {
            '_token': $('input[name=_token]').val(),
            'tahun_rencana' : $('#tahun_rencana').val(),
            'jenis_rw' : $('#jenis_rw').val(),
            'jml_rw' : $('#jml_rw').val(),
            'pagu_rw' : $('#pagu_rw').val(),
            'jenis_desa' : $('#jenis_desa').val(),
            'jml_desa' : $('#jml_desa').val(),
            'pagu_desa' : $('#pagu_desa').val(),
            'jenis_kecamatan' : $('#jenis_kecamatan').val(),
            'jml_kecamatan' : $('#jml_kecamatan').val(),
            'pagu_kecamatan' : $('#pagu_kecamatan').val(),
            'deviasi_pagu' : $('#deviasi_pagu').val(),
        },
        success: function(data) {
            $('#tblSetting').DataTable().ajax.reload();
            if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
        }
    });
});

//delete function
$(document).on('click', '#btnHapusSetting', function() {
  var data = setting_tbl.row( $(this).parents('tr') ).data();

  $('.actionBtn').removeClass('btn-success');
  $('.actionBtn').addClass('btn-danger');
  $('.actionBtn').addClass('delete');
  $('.modal-title').text('Hapus Setting Tahun Perencanaan');
  $('#tahun_rencana_hapus').val(data.tahun_rencana);
  $('.form-horizontal').hide();
  $('#ur_tahun_hapus').text(data.tahun_rencana);
  $('#HapusModal').modal('show');
});


$('.modal-footer').on('click', '.delete', function() {
  $.ajaxSetup({
     headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });

  $.ajax({
    type: 'post',
    url: './setting/hapusSetting',
    data: {
      '_token': $('input[name=_token]').val(),
      'tahun_rencana': $('#tahun_rencana_hapus').val()
    },
    success: function(data) {
      $('.item' + $('#tahun_rencana_hapus').val()).remove();
      $('#tblSetting').DataTable().ajax.reload();
      createPesan(data.pesan,"success");
    }
  });
});

$(document).on('click', '#btnAktivSetting', function() {
  var data = setting_tbl.row( $(this).parents('tr') ).data();

  $('#btnPosting').addClass('setPos');
  $('.modal-title').text('Aktivasi Setting Tahun Perencanaan');
  $('.form-horizontal').hide();
  $('#tahun_rencana_posting').val(data.tahun_rencana);
  $('#id_tahun_posting').text(data.tahun_rencana);
  $('#StatusSetting').modal('show');
});


$('.modal-footer').on('click', '.setPos', function() {
  $.ajaxSetup({
     headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });

  $.ajax({
    type: 'post',
    url: './setting/postSetting',
    data: {
      '_token': $('input[name=_token]').val(),
      'tahun_rencana': $('#tahun_rencana_posting').val(),
      'status_setting' : $('#status_setting').val(),
    },
    success: function(data) {
      $('.item' + $('#tahun_rencana_posting').val()).remove();
      $('#tblSetting').DataTable().ajax.reload();
      createPesan(data.pesan,"success");
    }
  });
});

});
</script>
@endsection
