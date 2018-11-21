<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>
@extends('layouts.parameterlayout')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?php
                $this->title = 'Role Users';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->begin();
                $breadcrumb->add(['label' => 'Parameter']);
                $breadcrumb->add(['label' => 'User dan Group', 'url' => '/admin/parameter/user']);
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
                <h3 class="panel-title">Daftar Peran/Role Users</h3>
            </div>
            <div class="panel-body">
                <!-- Button trigger modal -->
                <button id="btnTambahGroup" type="button" class="btn btn-labeled btn-sm btn-success">
                    <span class="btn-label"><i class="fa fa-plus fa-lg fa-fw"></i></span>Tambah Peran/Role Users
                </button>     
                <table class="table table-bordered compact table-striped table-responsive compact" id="group-table">
                    <thead>
                        <tr>
                            <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">Nomor Urut</th>
                            <th rowspan="2" style="text-align: center; vertical-align:middle">Uraian Peran</th>
                            <th colspan="6" style="text-align: center; vertical-align:middle">Hak Akses</th>
                            <th rowspan="2" width='10%' style="text-align: center; vertical-align:middle">Aksi</th>
                        </tr>
                        <tr>
                            <th width='5%' style="text-align: center; vertical-align:middle">Tambah</th>
                            <th width='5%' style="text-align: center; vertical-align:middle">Edit</th>
                            <th width='5%' style="text-align: center; vertical-align:middle">Hapus</th>
                            <th width='5%' style="text-align: center; vertical-align:middle">Lihat</th>
                            <th width='5%' style="text-align: center; vertical-align:middle">Reviu</th>
                            <th width='5%' style="text-align: center; vertical-align:middle">Posting</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

<div id="ModalGroup" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg"  >
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body" style="background-color: #eee;">
        <form name="frmModalGroup" class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id_group" id="id_group">
            <div class="row">
            <div class="col-sm-2" style="text-align: center;">
              <i class="fa fa-universal-access fa-fw" style="font-size: 100px;color: #357EBD;"></i>
            </div>
            <div class="col-sm-10">
            <div class="form-group">
              <label for="name_proup" class="col-sm-3" align='left'>Nama Peran/Role User</label>
              <div class="col-sm-5">
                <input type="text" class="form-control number" id="name_proup" name="name_proup" required="required" >
              </div>
            </div>            
            <div class="form-group">
              <label for="keterangan" class="col-sm-3" align='left'>Hak Akses User</label>
              <div class="col-sm-8">
                <table class="table table-bordered compact table-striped table-responsive">
                    <thead style="background: #c6ea96;">
                        <tr>
                            <th colspan="6" style="text-align: center; vertical-align:middle">Hak Akses</th>
                        </tr>
                        <tr>
                            <th width='5%' style="text-align: center; vertical-align:middle">Tambah</th>
                            <th width='5%' style="text-align: center; vertical-align:middle">Edit</th>
                            <th width='5%' style="text-align: center; vertical-align:middle">Hapus</th>
                            <th width='5%' style="text-align: center; vertical-align:middle">Lihat</th>
                            <th width='5%' style="text-align: center; vertical-align:middle">Reviu</th>
                            <th width='5%' style="text-align: center; vertical-align:middle">Posting</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td width='5%' style="text-align: center; vertical-align:middle">
                              <input class="checkTambah" type="checkbox" name="checkTambah" value="1">
                            </td>
                            <td width='5%' style="text-align: center; vertical-align:middle">
                              <input class="checkEdit" type="checkbox" name="checkEdit" value="1">
                            </td>
                            <td width='5%' style="text-align: center; vertical-align:middle">                            
                              <input class="checkHapus" type="checkbox" name="checkHapus" value="1">
                            </td>
                            <td width='5%' style="text-align: center; vertical-align:middle">
                              <input class="checkLihat" type="checkbox" name="checkLihat" value="1">
                            </td>
                            <td width='5%' style="text-align: center; vertical-align:middle">
                              <input class="checkReviu" type="checkbox" name="checkReviu" value="1">
                            </td>
                            <td width='5%' style="text-align: center; vertical-align:middle">
                              <input class="checkPosting" type="checkbox" name="checkPosting" value="1">
                            </td>
                        </tr>
                    </tbody>
                </table>
              </div>
            </div>
            <div class="form-group">
                    <label for="peranuser" class="col-md-3 control-label">Status Peran/Role User</label>
                    <div class="col-md-6">
                        <div class="col-sm-6">
                      <label class="radio-inline">
                      <input class="flag_aktif" type="radio" name="flag_aktif" id="flag_aktif" value="0"> Tidak Aktif</label>
                    </div>
                    <div class="col-sm-6">
                        <label class="radio-inline">
                        <input class="flag_aktif" type="radio" name="flag_aktif" id="flag_aktif" value="1"> Aktif</label>
                    </div>
                    </div>
            </div>
            </div>
            </div> 
        </form>
      </div>
      <div class="modal-footer" style="background-color: #357EBD;">
                <div class="row">
                    <div class="col-sm-2 text-left">                        
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-sm btn-success btnGroup btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i class="fa fa-floppy-o fa-lg fa-fw"></i></span>Simpan</button>
                        <div class="or"></div>
                        <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="fa fa-sign-out fa-lg fa-fw"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
      </div>
    </div>
  </div>
</div>

<div id="HapusModal" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body" style="background-color: #eee;">
          <input type="hidden" id="id_group_hapus" name="id_group_hapus">
          <div class="alert alert-danger deleteContent">
              <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border"  style="color:red;" aria-hidden="true"></i>
                <br>
                Yakin akan menghapus Peran/Role User : <strong><span id="keterangan_hapus"></span></strong> ?
                <br>
                <br>
          </div>
        </div>
          <div class="modal-footer" style="background-color: #357EBD;">
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
<script>
$(document).ready(function(){ 
$('[data-toggle="popover"]').popover();

var xTambah,xEdit,xHapus,xLihat,xReviu,xPosting,xAktif;

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

$.ajax({
  type: "GET",
  url: 'group/peranGroup',
  dataType: "json",
  success: function(data) {
     var j = data.length;
    var post, i;
    $('select[name="role_id"]').empty();
    $('select[name="role_id"]').append('<option value="-1">---Pilih Peran/Role User---</option>');
    for (i = 0; i < j; i++) {
      post = data[i];
      $('select[name="role_id"]').append('<option value="'+ post.id +'">'+ post.uraian_peran +'</option>');
    }
  }
});

var group_tbl=$('#group-table').DataTable({
                processing: true,
                serverSide: true,
                dom : 'BfRtIp',
                autoWidth : false,
                ajax: '{{ url('/admin/parameter/user/peran/') }}',
                columns: [
                    { data: 'no_urut', name: 'no_urut', sClass: "dt-center" },
                    { data: 'uraian_peran', name: 'uraian_peran' },
                    { data: 'icon','searchable': false, 'orderable':false,sClass: "dt-center",
                            render: function(data, type, row,meta) {
                            return '<i class="'+row.status_tambah+'" style="font-size:16px;color:'+row.warna_tambah+';"/>';
                          }},
                    { data: 'icon','searchable': false, 'orderable':false,sClass: "dt-center",
                            render: function(data, type, row,meta) {
                            return '<i class="'+row.status_edit+'" style="font-size:16px;color:'+row.warna_edit+';"/>';
                          }},
                    { data: 'icon','searchable': false, 'orderable':false,sClass: "dt-center",
                            render: function(data, type, row,meta) {
                            return '<i class="'+row.status_hapus+'" style="font-size:16px;color:'+row.warna_hapus+';"/>';
                          }},
                    { data: 'icon','searchable': false, 'orderable':false,sClass: "dt-center",
                            render: function(data, type, row,meta) {
                            return '<i class="'+row.status_lihat+'" style="font-size:16px;color:'+row.warna_lihat+';"/>';
                          }},
                    { data: 'icon','searchable': false, 'orderable':false,sClass: "dt-center",
                            render: function(data, type, row,meta) {
                            return '<i class="'+row.status_reviu+'" style="font-size:16px;color:'+row.warna_reviu+';"/>';
                          }},
                    { data: 'icon','searchable': false, 'orderable':false,sClass: "dt-center",
                            render: function(data, type, row,meta) {
                            return '<i class="'+row.status_posting+'" style="font-size:16px;color:'+row.warna_posting+';"/>';
                          }},
                    { data: 'action', name: 'action', orderable: false, searchable: false, sClass: "dt-center" }
                ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
            });

$(document).on('click', '#btnTambahGroup', function() {
  $('.btnGroup').removeClass('edit');
  $('.btnGroup').addClass('add');
  $('.modal-title').text('Tambah Peran/Role User');
  $('.form-horizontal').show();
  $('#id_group').val(null);
  $('#name_proup').val(null);
  $('.checkTambah').prop('checked',false);
  $('.checkEdit').prop('checked',false);
  $('.checkHapus').prop('checked',false);
  $('.checkLihat').prop('checked',false);
  $('.checkReviu').prop('checked',false);
  $('.checkPosting').prop('checked',false);
  document.frmModalGroup.flag_aktif[0].checked=true;
  
  $('#ModalGroup').modal('show');
});


$('.modal-footer').on('click', '.add', function() {
    if($('.checkTambah:checked').val()==1){xTambah=1}else{xTambah=0};
    if($('.checkEdit:checked').val()==1){xEdit=1}else{xEdit=0};
    if($('.checkHapus:checked').val()==1){xHapus=1}else{xHapus=0};
    if($('.checkLihat:checked').val()==1){xLihat=1}else{xLihat=0};
    if($('.checkReviu:checked').val()==1){xReviu=1}else{xReviu=0};
    if($('.checkPosting:checked').val()==1){xPosting=1}else{xPosting=0};
    if(document.frmModalGroup.flag_aktif[1].checked){xAktif=1}else{xAktif=0};

    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './peran/addPeran',
        data: {
            '_token': $('input[name=_token]').val(),
            'uraian_peran' : $('#name_proup').val(),
            'tambah' : xTambah,
            'edit' : xEdit,
            'hapus' : xHapus,
            'lihat' : xLihat,
            'reviu' : xReviu,
            'posting' : xPosting,
            'status_role' : xAktif,
        },
        success: function(data) {
              $('#group-table').DataTable().ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
        },
  });
});

$(document).on('click', '.btneditPeran', function() {
var data = group_tbl.row( $(this).parents('tr') ).data();
  $('.btnGroup').addClass('edit');
  $('.btnGroup').removeClass('add');
  $('.modal-title').text('Edit Peran/Role User');
  $('.form-horizontal').show();
  $('#id_group').val(data.id);
  $('#name_proup').val(data.uraian_peran);
  
  if(data.tambah==0){$('.checkTambah').prop('checked',false)}else{$('.checkTambah').prop('checked',true)}; 
  if(data.edit==0){$('.checkEdit').prop('checked',false)}else{$('.checkEdit').prop('checked',true)}; 
  if(data.hapus==0){$('.checkHapus').prop('checked',false)}else{$('.checkHapus').prop('checked',true)};
  if(data.lihat==0){$('.checkLihat').prop('checked',false)}else{$('.checkLihat').prop('checked',true)};
  if(data.reviu==0){$('.checkReviu').prop('checked',false)}else{$('.checkReviu').prop('checked',true)};
  if(data.posting==0){$('.checkPosting').prop('checked',false)}else{$('.checkPosting').prop('checked',true)};
  document.frmModalGroup.flag_aktif[data.status_role].checked=true;

  $('#ModalGroup').modal('show');
});

$('.modal-footer').on('click', '.edit', function() {
    if($('.checkTambah:checked').val()==1){xTambah=1}else{xTambah=0};
    if($('.checkEdit:checked').val()==1){xEdit=1}else{xEdit=0};
    if($('.checkHapus:checked').val()==1){xHapus=1}else{xHapus=0};
    if($('.checkLihat:checked').val()==1){xLihat=1}else{xLihat=0};
    if($('.checkReviu:checked').val()==1){xReviu=1}else{xReviu=0};
    if($('.checkPosting:checked').val()==1){xPosting=1}else{xPosting=0};
    if(document.frmModalGroup.flag_aktif[1].checked){xAktif=1}else{xAktif=0};

    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './peran/editPeran',
        data: {
            '_token': $('input[name=_token]').val(),
            'id' : $('#id_group').val(),
            'uraian_peran' : $('#name_proup').val(),
            'tambah' : xTambah,
            'edit' : xEdit,
            'hapus' : xHapus,
            'lihat' : xLihat,
            'reviu' : xReviu,
            'posting' : xPosting,
            'status_role' : xAktif,
        },
        success: function(data) {
              $('#group-table').DataTable().ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
        },
  });
});

$(document).on('click', '.btnhapusPeran', function() {
var data = group_tbl.row( $(this).parents('tr') ).data();

  $('.actionBtn').addClass('delete');
  $('.modal-title').text('Hapus Peran/Role User');
  $('.form-horizontal').hide();
  $('#id_group_hapus').val(data.id);
  $('#keterangan_hapus').html(data.uraian_peran);
  $('#HapusModal').modal('show');
  
});



$('.modal-footer').on('click', '.delete', function() {
  $.ajaxSetup({
     headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });

  $.ajax({
    type: 'post',
    url: './peran/hapusPeran',
    data: {
      '_token': $('input[name=_token]').val(),
      'id': $('#id_group_hapus').val(),
    },
    success: function(data) {
      $('#group-table').DataTable().ajax.reload();
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