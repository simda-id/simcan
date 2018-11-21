<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>
@extends('layouts.parameterlayout')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?php
                $this->title = 'Group';
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
                <h3 class="panel-title">Daftar User</h3>
            </div>
            <div class="panel-body">
                <!-- Button trigger modal -->
                <button id="btnTambahGroup" type="button" class="btn btn-labeled btn-sm btn-success">
                    <span class="btn-label"><i class="fa fa-plus fa-lg fa-fw"></i></span>Tambah Grup User
                </button>     
                <table class="table table-bordered compact table-striped table-responsive compact" id="group-table">
                    <thead>
                        <tr>
                            <th width='5%' style="text-align: center; vertical-align:middle">Nomor Urut</th>
                            <th width='20%' style="text-align: center; vertical-align:middle">Nama</th>
                            <th style="text-align: center; vertical-align:middle">Keterangan</th>
                            <th width='15%' style="text-align: center; vertical-align:middle">Aksi</th>
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
              <i class="fa fa-users fa-fw" style="font-size: 100px;color: #357EBD;"></i>
            </div>
            <div class="col-sm-10">
            <div class="form-group">
              <label for="name_proup" class="col-sm-3" align='left'>Nama Group User</label>
              <div class="col-sm-5">
                <input type="text" class="form-control number" id="name_proup" name="name_proup" required="required" >
              </div>
            </div>            
            <div class="form-group">
              <label for="keterangan" class="col-sm-3" align='left'>Keterangan Group User</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="keterangan" name="keterangan" required="required">
              </div>
            </div>
            <div class="form-group">
                    <label for="peranuser" class="col-md-3 control-label">Peran/Role User</label>
                    <?php $groups = \App\Models\RefGroup::get(); ?>
                    <div class="col-md-6">
                        <select id="role_id" type="role_id" class="form-control" name="role_id" required>
                        </select>
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
                Yakin akan menghapus Group User : <strong><span id="keterangan_hapus"></span></strong> ?
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
                // dom : 'BFRtIp',
                autoWidth : false,
                ajax: '{{ url('/admin/parameter/user/group/') }}',
                columns: [
                    { data: 'no_urut', name: 'no_urut', sClass: "dt-center" },
                    { data: 'name', name: 'name' },
                    { data: 'keterangan', name: 'keterangan' },
                    { data: 'action', name: 'action', orderable: false, searchable: false, sClass: "dt-center" }
                ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
            });

$(document).on('click', '#btnTambahGroup', function() {
  $('.btnGroup').removeClass('edit');
  $('.btnGroup').addClass('add');
  $('.modal-title').text('Tambah Group User');
  $('.form-horizontal').show();
  $('#id_group').val(null);
  $('#name_proup').val(null);
  $('#keterangan').val(null);
  $('#role_id').val(-1);
  
  $('#ModalGroup').modal('show');
});

$('.modal-footer').on('click', '.add', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './group/addGroup',
        data: {
            '_token': $('input[name=_token]').val(),
            // 'id_pemda' : $('#id_pemda').val(),
            'nama_group' : $('#name_proup').val(),
            'keterangan' : $('#keterangan').val(),
            'id_roles' : $('#role_id').val(),
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

$(document).on('click', '#btnEditGroup', function() {
var data = group_tbl.row( $(this).parents('tr') ).data();
  $('.btnGroup').addClass('edit');
  $('.btnGroup').removeClass('add');
  $('.modal-title').text('Edit Group User');
  $('.form-horizontal').show();
  $('#id_group').val(data.id);
  $('#name_proup').val(data.name);
  $('#keterangan').val(data.keterangan);
  $('#role_id').val(data.id_roles);
  
  $('#ModalGroup').modal('show');
});

$('.modal-footer').on('click', '.edit', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './group/editGroup',
        data: {
            '_token': $('input[name=_token]').val(),
            'id' : $('#id_group').val(),
            'name_group' : $('#name_proup').val(),
            'keterangan' : $('#keterangan').val(),
            'id_roles' : $('#role_id').val(),
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

$(document).on('click', '#btnHapusGroup', function() {
var data = group_tbl.row( $(this).parents('tr') ).data();

  $('.actionBtn').addClass('delete');
  $('.modal-title').text('Hapus Group User');
  $('.form-horizontal').hide();
  $('#id_group_hapus').val(data.id);
  $('#keterangan_hapus').html(data.name);
  $('#HapusModal').modal('show');
  
});



$('.modal-footer').on('click', '.delete', function() {
  $.ajaxSetup({
     headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });

  $.ajax({
    type: 'post',
    url: './group/hapusGroup',
    data: {
      '_token': $('input[name=_token]').val(),
      'id': $('#id_group_hapus').val(),
    },
    success: function(data) {
      $('#group-table').DataTable().ajax.reload();
      createPesan(data.pesan,"success");
    }
  });
});

$(document).on('click', '#btnAksesGroup', function() {
  
});


});
</script>
@endsection