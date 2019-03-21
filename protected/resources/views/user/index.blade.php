<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>
@extends('layouts.parameterlayout')

{{-- <style> --}}
  {{-- /*.btn-glyphicon { padding:8px; background:#ffffff; margin-right:4px; }
  .icon-btn { padding: 1px 15px 3px 2px; border-radius:50px;}*/ --}}
{{-- </style> --}}

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?php
                $this->title = 'User';
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
                <div class='tabs-x tabs-above tab-bordered tabs-krajee'>
                    <ul class="nav nav-tabs nav-justified" role="tablist">
                      <li class="active"><a href="#user" aria-controls="user" role="tab" data-toggle="tab">User</a></li>
                      <li><a href="#unit" aria-controls="unit" role="tab-kv" data-toggle="tab">Akses Unit</a></li>
                      <li><a href="#wilayah" aria-controls="wilayah" role="tab-kv" data-toggle="tab">Akses Wilayah</a></li>
                      <li><a href="#kabupaten" aria-controls="kabupaten" role="tab-kv" data-toggle="tab">Akses Wilayah</a></li>
                    </ul>

                <div class="tab-content">
                    <br>
                    <div role="tabpanel" class="tab-pane fade in active" id="user">
                            <button type="button" id="btnTambahUser" class="btn btn-labeled btn-success">
                                <span class="btn-label"><i class="fa fa-plus fa-lg fa-fw"></i></span>Tambah User
                            </button>  
                            <table class="table display table-bordered table-striped compact table-responsive" id="users-table">
                                <thead>
                                    <tr>
                                        <th width='10px' style="text-align: center; vertical-align:middle">Nomor</th>
                                        <th style="text-align: center; vertical-align:middle">Email</th>
                                        <th style="text-align: center; vertical-align:middle">Nama</th>                                        
                                        <th width='20%' style="text-align: center; vertical-align:middle">Asal OPD</th>
                                        <th width='5%' style="text-align: center; vertical-align:middle">Status</th>
                                        <th width='10%' style="text-align: center; vertical-align:middle">Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                    </div>
                    <div role="tabpanel" class="tab-pane fade in" id="unit">
                        <button type="button" id="btnTambahAUnit" class="btn btn-labeled  btn-success" data-toggle="modal">
                            <span class="btn-label"><i class="fa fa-plus fa-lg fa-fw"></i></span>Tambah Akses Unit
                        </button>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                             <tbody>
                               <tr>
                                 <td width="15%" style="text-align: left; vertical-align:top;">Username</td>
                                 <td style="text-align: left; vertical-align:top;"><label id="username_unit" align='left'></td>
                               </tr>
                             </tbody>
                            </table>
                        </div>
                        <table class="table display table-bordered table-striped compact table-responsive" id="unit-table">
                            <thead>
                                <tr>
                                    <th width='5%' style="text-align: center; vertical-align:middle">Nomor Urut</th>
                                    <th style="text-align: center; vertical-align:middle">Nama Unit</th>
                                    <th width='15%' style="text-align: center; vertical-align:middle">Aksi</th>
                                </tr>
                            </thead>
                        </table>   
                    </div>
                    <div role="tabpanel" class="tab-pane fade in" id="wilayah">
                        <button type="button" id="btnTambahAWilayah" class="btn btn-labeled  btn-success" data-toggle="modal">
                            <span class="btn-label"><i class="fa fa-plus fa-lg fa-fw"></i></span>Tambah Akses Wilayah
                        </button>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                             <tbody>
                               <tr>
                                 <td width="15%" style="text-align: left; vertical-align:top;">Username</td>
                                 <td style="text-align: left; vertical-align:top;"><label id="username_wilayah" align='left'></td>
                               </tr>
                             </tbody>
                            </table>
                        </div>
                            <table class="table display table-bordered table-striped compact table-responsive" id="wilayah-table">
                                <thead>
                                     <tr>
                                         <th width='5%' style="text-align: center; vertical-align:middle">Nomor Urut</th>
                                         <th style="text-align: center; vertical-align:middle">Nama Kabupaten/Kota</th>
                                         <th style="text-align: center; vertical-align:middle">Nama Kecamatan</th>
                                         <th style="text-align: center; vertical-align:middle">Nama Desa/Kelurahan</th>
                                         <th width='15%' style="text-align: center; vertical-align:middle">Aksi</th>
                                     </tr>
                                </thead>
                            </table>   
                    </div>
                    <div role="tabpanel" class="tab-pane fade in" id="kabupaten">
                        <button type="button" id="btnTambahAWilayahKab" class="btn btn-labeled btn-primary" data-toggle="modal">
                            <span class="btn-label"><i class="fa fa-plus fa-lg fa-fw"></i></span>Tambah Akses Wilayah
                        </button>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                             <tbody>
                               <tr>
                                 <td width="15%" style="text-align: left; vertical-align:top;">Username</td>
                                 <td style="text-align: left; vertical-align:top;"><label id="username_kabupaten" align='left'></td>
                               </tr>
                             </tbody>
                            </table>
                        </div>
                            <table class="table display table-bordered table-striped compact table-responsive" id="kabupaten-table">
                                <thead>
                                     <tr>
                                         <th width='5%' style="text-align: center; vertical-align:middle">Nomor Urut</th>
                                         <th witdh='10%' style="text-align: center; vertical-align:middle">Kode Kabupaten/Kota</th>
                                         <th style="text-align: center; vertical-align:middle">Nama Provinsi</th>
                                         <th style="text-align: center; vertical-align:middle">Nama Kabupaten/Kota</th>
                                         <th width='15%' style="text-align: center; vertical-align:middle">Aksi</th>
                                     </tr>
                                </thead>
                            </table>   
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

<div id="ModalUser" class="modal fade" role="dialog" data-backdrop="static" tabindex="-1" data-focus-on="input:first">
  <div class="modal-dialog modal-lg"  >
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body"  style="background-color: #eee;">        
        <form name="frmModalUser" class="form-horizontal" role="form" autocomplete='off' action="{{ Request::url() }}" method="post">
          <div class="row">
          <div class="col-sm-2" style="text-align: center;">
            <i class="fa fa-user-circle-o" style="font-size: 120px;color: #357EBD;"></i>
          </div>
          <div class="col-sm-10">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id_user" id="id_user">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-3 control-label">Nama User</label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" required autofocus data-toggle="popover" data-html="true" data-container="body" title="User dan Group User" data-trigger="hover" data-content="Nama untuk ditampilkan di header setelah login">
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('group_id') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-3 control-label">Group User</label>
                    <?php $groups = \App\Models\RefGroup::get(); ?>
                    <div class="col-md-6">
                        <select id="group_id" type="group_id" class="form-control" name="group_id" required>
                        </select>                            
                        @if ($errors->has('group_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('group_id') }}</strong>
                            </span>
                        @endif
                    </div>
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-3 control-label">Alamat e-Mail</label>
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" data-toggle="popover" data-html="true" data-container="body" title="User dan Group User" data-trigger="hover" data-content="Digunakan untuk login.<br>Tidak dapat diganti." required>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    {{-- <span><a href="#" data-toggle="popover" data-html="true" data-container="body" title="User dan Group User" data-trigger="hover" data-content="Digunakan untuk login.<br>Tidak dapat diganti."><i class="fa fa-question-circle fa-fw fa-lg text-info"></i></a></span> --}}
            </div>

            <div id="divPassword" class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-3 control-label">Password</label>
                    <div class="col-md-4">
                        <input id="password" type="password" class="form-control" name="password" required>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-md-4">
                      <div class="input-group">
                        <input id="password_confirmation" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' has-error' : '' }}" name="password_confirmation" required>
                          <div class="input-group-btn">
                                <button type="button" id="showPass" name="showPass" data-val="1" class="btn btn-md btn-success" data-toggle="popover" data-html="true" data-container="body" title="User dan Group User" data-trigger="hover" data-content="Digunakan untuk menampilkan Password yang diketik"><span id="eye" class="fa fa-eye fa-fw fa-lg"></span></button>
                          </div>
                        </div>
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="title">OPD Asal User</label>
                <div class="col-sm-8">
                    <select type="text" class="form-control opd_asal" id="opd_asal" name="opd_asal"></select>
                </div>
            </div>
            <div class="form-group idStatusUser"> 
                  <label for="status_user" class="col-sm-3 control-label" align='left'>Status User</label>                 
                  <div class="col-sm-6">
                    <label class="radio-inline">
                      <input type="radio" class="status_user" name="status_user" id="status_user" value="0">Non Aktif
                    </label>
                    <label class="radio-inline">
                      <input type="radio" class="status_user" name="status_user" id="status_user" value="1">Aktif
                    </label>
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
                       <button type="button" class="btn btn-success btnUser btn-labeled" >
                        <span class="btn-label"><i class="fa fa-floppy-o fa-lg fa-fw"></i></span>Simpan</button>
                    <div class="or"></div>
                    <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                        <span class="btn-label"><i class="fa fa-sign-out fa-lg fa-fw"></i></span>Tutup</button>
                  </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
{{-- </div> --}}

<div id="HapusUser" class="modal fade" role="dialog" data-backdrop="static" tabindex="-1" data-focus-on="input:first">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body" style="background-color: #eee;">
          <input type="hidden" id="id_user_hapus" name="id_user_hapus">
          <div class="alert alert-danger deleteContent">
              <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border"  style="color:red;" aria-hidden="true"></i>
                <br>
                Yakin akan menghapus User : <strong><span id="name_user_hapus"></span></strong> ?
                <br>
                <br>
          </div>
        </div>
          <div class="modal-footer" style="background-color: #357EBD;">
            <div class="ui-group-buttons">
              <button type="button" id="btnDelUser" class="btn btn-sm btn-danger btn-labeled" data-dismiss="modal" ><span class="btn-label"><i id="footer_action_button" class="fa fa-trash fa-lg fa-fw"></i></span> Hapus</button>
              <div class="or"></div>
              <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true"><span class="btn-label"><i class="fa fa-sign-out fa-lg fa-fw"></i></span> Tutup</button>
            </div>
          </div>
      </div>
    </div>
  </div>

<div id="ModalUnit" class="modal fade" role="dialog" data-backdrop="static" tabindex="-1" data-focus-on="input:first">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          <h4>Tambah Akses Unit</h4>
        </div>
        <div class="modal-body" style="background-color: #eee;">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >            
            <div class="form-group">
             <div class="col-sm-12">
                <table id='tblUnit' class="table display compact table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                          <tr>
                            <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
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
            <div class="modal-footer" style="background-color: #357EBD;">
                <div class="row">
                    <div class="col-sm-2 text-left">                        
                    </div>
                    <div class="col-sm-10 text-right">
                      <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="fa fa-sign-out fa-lg fa-fw"></i></span>Tutup</button>
                    </div>
                </div>
            </div> 
      </div>
    </div>
</div>

<div id="ModalDesa" class="modal fade" role="dialog" data-backdrop="static" tabindex="-1" data-focus-on="input:first">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          <h4>Tambah Akses Wilayah</h4>
        </div>
        <div class="modal-body" style="background-color: #eee;">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
            <div class="form-group">
                <label class="control-label col-sm-3" for="title">Kecamatan :</label>
                <div class="col-sm-8">
                    <select type="text" class="form-control kecamatan" id="kecamatan" name="kecamatan"></select>
                </div>
            </div>
            <table id='tblDesa' class="table display compact table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                      <tr>
                        <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                        <th width="10%" style="text-align: center; vertical-align:middle">Kode Desa</th>
                        <th style="text-align: center; vertical-align:middle">Nama Desa/Kelurahan</th>
                        <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                      </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
          </form>
        </div>
          <div class="modal-footer" style="background-color: #357EBD;">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusKeg">
                    </div>
                    <div class="col-sm-10 text-right">
                        <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
                    </div>
                </div>
              </div> 
      </div>
    </div>
</div>

<div id="ModalKabupaten" class="modal fade" role="dialog" data-backdrop="static" tabindex="-1" data-focus-on="input:first">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          <h4>Tambah Akses Wilayah</h4>
        </div>
        <div class="modal-body" style="background-color: #eee;">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
            {{-- <div class="form-group">
                <label class="control-label col-sm-3" for="title">Kecamatan :</label>
                <div class="col-sm-8">
                    <select type="text" class="form-control kecamatan" id="kecamatan" name="kecamatan"></select>
                </div>
            </div> --}}
            <table id='tblKabupaten' class="table display compact table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                      <tr>
                        <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                        <th width="10%" style="text-align: center; vertical-align:middle">Kode Kabupaten/Kota</th>
                        <th style="text-align: center; vertical-align:middle">Nama Kabupaten/Kota</th>
                        <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                      </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
          </form>
        </div>
          <div class="modal-footer" style="background-color: #357EBD;">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusKeg">
                    </div>
                    <div class="col-sm-10 text-right">
                        <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
                    </div>
                </div>
              </div> 
      </div>
    </div>
</div>

<div id="ModalNotifikasi" class="modal fade" role="dialog" data-backdrop="static" tabindex="-1" data-focus-on="input:first">
    <div class="modal-dialog modal-xs"  >
      <div class="modal-content">
        <div class="modal-body" style="background-color: #5bc0de;">
          <div id="bodyNotif" class="alert">
              <i class="fa fa-exclamation-triangle fa-3x fa-pull-left" aria-hidden="true"></i>
                <br>
                <strong><span id="uraian_notifikasi"></span></strong>
                <br>
          </div>
          <hr class="message-inner-separator">
          <div class="row">
                    <div class="col-sm-2 text-left">
                    </div>
                    <div class="col-sm-10 text-right">
                        <button type="button" class="btn btn-primary icon-btn" data-dismiss="modal" aria-hidden="true">
                            <i class="glyphicon glyphicon-log-out" style="color: #fff"></i> Tutup</button>
                    </div>
                </div>
        </div>
      </div>
    </div>
</div>

@endsection
 
@section('scripts')
<script>
$(document).ready(function(){

var dataApp = "{{Session::get('AppType')}}";

if (dataApp == 0) {
  $('[href="#wilayah"]').closest('li').hide();
} else {
  $('[href="#kabupaten"]').closest('li').hide();
};

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

$('[data-toggle="popover"]').popover();   

$('.display').DataTable({
    dom : 'BfrtIp',
    autoWidth : false,
    "bDestroy": true
});

var id_user_temp;

$.ajax({
  type: "GET",
  url: 'user/cekUserAdmin',
  dataType: "json",
  success: function(data) {
    console.log(data);
    if(data.status_pesan==1){
      $('#bodyNotif').removeClass('alert-info');
      $('#bodyNotif').addClass('alert-warning');
      $('.form-horizontal').hide();
      $('#uraian_notifikasi').html(data.pesan);
      $('#ModalNotifikasi').modal('show');      
    } else {
      $('#bodyNotif').removeClass('alert-warning');
      $('#bodyNotif').addClass('alert-info');
      $('.form-horizontal').hide();
      $('#uraian_notifikasi').html(data.pesan);
      $('#ModalNotifikasi').modal('show');  
    }
  }
});

$.ajax({
  type: "GET",
  url: 'user/getGroup',
  dataType: "json",
  success: function(data) {
     var j = data.length;
    var post, i;
    $('select[name="group_id"]').empty();
    $('select[name="group_id"]').append('<option value="-1">---Pilih Group User---</option>');
    for (i = 0; i < j; i++) {
      post = data[i];
      $('select[name="group_id"]').append('<option value="'+ post.id +'">'+ post.name +'</option>');
    }
  }
});

$.ajax({
  type: "GET",
  url: 'user/getUnitIndex',
  dataType: "json",
  success: function(data) {
     var j = data.length;
    var post, i;
    $('select[name="opd_asal"]').empty();
    $('select[name="opd_asal"]').append('<option value="-1">---Pilih OPD Asal User---</option>');
    for (i = 0; i < j; i++) {
      post = data[i];
      $('select[name="opd_asal"]').append('<option value="'+ post.id_unit +'">'+ post.nm_unit +'</option>');
    }
  }
});  

$("#showPass").click(function() 
         {
            if ($(this).data('val') == "1") 
            {
               $("#password").prop('type','text');
               $("#password_confirmation").prop('type','text');
               $("#eye").attr("class","fa fa-eye-slash fa-fw fa-lg");
               $(this).data('val','0');
            }
            else
            {
               $("#password").prop('type', 'password');
               $("#password_confirmation").prop('type', 'password');
               $("#eye").attr("class","fa fa-eye fa-fw fa-lg");
               $(this).data('val','1');
            }
         });


var user_tbl = $('#users-table').DataTable({
    processing: true,
    serverSide: true,
    // dom : 'bfrtIp',
    autoWidth : false,
    ajax: '{{ url('/admin/parameter/user/') }}',
    columns: [
        { data: 'no_urut', name: 'id', sClass: "dt-center" },        
        { data: 'email', name: 'email' },
        { data: 'name', name: 'name' },
        { data: 'nm_unit', name: 'nm_unit', sClass: "dt-left" },
        { data: 'status_display', name: 'status_display', sClass: "dt-center" },
        { data: 'action', name: 'action', orderable: false, searchable: false , sClass: "dt-center"}      
    ],
      "order": [[0, 'asc']],
      "bDestroy": true
});

var akses_unit
function LoadAksesUnit(id_user){
akses_unit = $('#unit-table').DataTable({
    processing: true,
    serverSide: true,
    autoWidth : false,
    dom: 'bfrtIp',
    "ajax": {"url": "./user/getListUnit/"+id_user},
    columns: [
        { data: 'no_urut', name: 'no_urut', sClass: "dt-center" },
        { data: 'nm_unit', name: 'nm_unit' },
        { data: 'action', name: 'action', orderable: false, searchable: false , sClass: "dt-center"}
    ],
      "order": [[0, 'asc']],
      "bDestroy": true
});}

var akses_wilayah
function LoadAksesWilayah(id_user){
akses_wilayah = $('#wilayah-table').DataTable({
    processing: true,
    serverSide: true,
    autoWidth : false,
    dom: 'bfrtIp',
    "ajax": {"url": "./user/getListDesa/"+id_user},
    columns: [
        { data: 'no_urut', name: 'no_urut', sClass: "dt-center" },
        { data: 'nama_kab_kota', name: 'nama_kab_kota' },
        { data: 'nama_kecamatan', name: 'nama_kecamatan' },
        { data: 'nama_desa', name: 'nama_desa' },
        { data: 'action', name: 'action', orderable: false, searchable: false , sClass: "dt-center"}
    ],
      "order": [[0, 'asc']],
      "bDestroy": true
});}

var akses_wilayah_kab
function LoadAksesWilayahKab(id_user){
akses_wilayah_kab = $('#kabupaten-table').DataTable({
    processing: true,
    serverSide: true,
    autoWidth : false,
    dom: 'bfrtIp',
    "ajax": {"url": "./user/getListKab/"+id_user},
    columns: [
        { data: 'no_urut', name: 'no_urut', sClass: "dt-center" },
        { data: 'kd_kab', name: 'kd_kab' },
        { data: 'nm_prov', name: 'nm_prov' },
        { data: 'nama_kab_kota', name: 'nama_kab_kota' },
        { data: 'action', name: 'action', orderable: false, searchable: false , sClass: "dt-center"}
    ],
      "order": [[0, 'asc']],
      "bDestroy": true
});}

$.ajax({
    type: "GET",
    url: 'user/getKecamatan',
    dataType: "json",

    success: function(data) {

          var j = data.length;
          var post, i;

          $('select[name="kecamatan"]').empty();
          $('select[name="kecamatan"]').append('<option value="0">---Pilih Kecamatan---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="kecamatan"]').append('<option value="'+ post.id_kecamatan +'">'+ post.nama_kecamatan +'</option>');
          }
          }
  });

var desa_tbl;
$( "#kecamatan" ).change(function() {
    desa_tbl = $('#tblDesa').DataTable( {
        processing: true,
        serverSide: true,
        autoWidth : false,
        dom: 'bfrtIp',
        "ajax": {"url": "./user/getDesa/"+$('#kecamatan').val()},
        "columns": [
                { data: 'no_urut', sClass: "dt-center"},
                { data: 'kd_desa', sClass: "dt-center"},
                { data: 'nama_desa', name: 'nama_desa' },
                { data: 'action', name: 'action', orderable: false, searchable: false , sClass: "dt-center"}
            ],
        "order": [[0, 'asc']],
        "bDestroy": true
    }); 

});

$(document).on('click', '#btnViewUnit', function() {
  var data = user_tbl.row( $(this).parents('tr') ).data();

  $('#username_unit').text(data.name);
  $('#username_wilayah').text(data.name);
  $('#username_kabupaten').text(data.name);
  id_user_temp= data.id;

  $('.nav-tabs a[href="#unit"]').tab('show');
  LoadAksesUnit(id_user_temp);  
});

$(document).on('click', '#btnViewWilayah', function() {
  var data = user_tbl.row( $(this).parents('tr') ).data();

  $('#username_unit').text(data.name);
  $('#username_wilayah').text(data.name);
  $('#username_kabupaten').text(data.name);
  id_user_temp= data.id;

  $('.nav-tabs a[href="#wilayah"]').tab('show');
  LoadAksesWilayah(id_user_temp); 
});

$(document).on('click', '#btnViewWilayahKab', function() {
  var data = user_tbl.row( $(this).parents('tr') ).data();

  $('#username_unit').text(data.name);
  $('#username_wilayah').text(data.name);
  $('#username_kabupaten').text(data.name);
  id_user_temp= data.id;

  $('.nav-tabs a[href="#kabupaten"]').tab('show');
  LoadAksesWilayahKab(id_user_temp); 
});

  function getStatusUser(){

    var xCheck = document.querySelectorAll('input[name="status_user"]:checked');
    var xyz = [];
    for(var x = 0, l = xCheck.length; x < l;  x++)
      { xyz.push(xCheck[x].value); }
    var xvalues = xyz.join('');
    return xvalues;
  }

function validasiDataAwal() {
  if ( $.trim( $('#group_id').val()) == -1 || $.trim( $('#group_id').val()) == 0) {
    $('#ModalUser').modal('show');
    document.getElementById("group_id").focus();
    createPesan("Group User Belum Dipilih..!!","danger"); 
    return false;
  };
  if ( $.trim( $('#password').val()) != $.trim( $('#password_confirmation').val())) {
    createPesan("Password ke-2 tidak sama dengan yang pertama ... !!","danger");
    $('#ModalUser').modal('show'); 
    document.getElementById("password").focus();
    return false;
  };
  if ( $('#password').val().length < 6 ) {
    createPesan("Password Kurang dari 6 karakter..!!","danger");
    $('#ModalUser').modal('show'); 
    document.getElementById("password").focus();
    return false;
  };
};

function validasiDataEdit() {
  if ( $.trim( $('#group_id').val()) == -1 || $.trim( $('#group_id').val()) == 0) {
    $('#ModalUser').modal('show');
    document.getElementById("group_id").focus();
    createPesan("Group User Belum Dipilih..!!","danger"); 
    return false;
  };
};

$(document).on('click', '#btnTambahUser', function() {
    $('.btnUser').removeClass('edit');
    $('.btnUser').addClass('add');
    $('.btnUser').removeClass('gantiPass');
    $('.modal-title').text('Tambah User');
    $('.form-horizontal').show();
    $('#divPassword').show();    
    $('#name').removeAttr("disabled");
    $('#group_id').removeAttr("disabled");
    $('#email').removeAttr("disabled");
    $('#opd_asal').removeAttr("disabled");
    $('#name').val(null);
    $('#id_user').val(null);
    $('#group_id').val(-1);
    $('#opd_asal').val(-1);
    $('#email').val(null);
    $('#password').val(null);
    $('#password_confirmation').val(null);
    document.frmModalUser.status_user[1].checked=true;
  
    $('#ModalUser').modal('show');
});

$('.modal-footer').on('click', '.add', function() {
  if(validasiDataAwal() != false){
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: 'user/addUser',
        data: {
            '_token': $('input[name=_token]').val(),
            'nama' : $('#name').val(),
            'group_id' : $('#group_id').val(),
            'email' : $('#email').val(),
            'id_unit' : $('#opd_asal').val(),
            'status_user' : getStatusUser(),
            'password' : $('#password').val(),
            'password_confirmation' : $('#password_confirmation').val(),
        },
        success: function(data) {
              $('#users-table').DataTable().ajax.reload();
              $('#ModalUser').modal('hide'); 
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
        },
        error: function(data) {
              $('#users-table').DataTable().ajax.reload();
              $('#ModalUser').modal('hide'); 
              createPesan("Ada Isian yang kurang tepat..","danger"); 
        },
    });
  }
});

$(document).on('click', '#btnGantiPass', function() {

var data = user_tbl.row( $(this).parents('tr') ).data();

    $('.btnUser').removeClass('edit');
    $('.btnUser').removeClass('add');
    $('.btnUser').addClass('gantiPass');
    $('.modal-title').text('Ganti Password User');
    $('.form-horizontal').show();
    $('#id_user').val(data.id);
    $('#name').val(data.name);
    $('#group_id').val(data.group_id);
    $('#opd_asal').val(data.id_unit);
    $('#email').val(data.email);
    document.frmModalUser.status_user[data.status_user].checked=true;
    $('#password').val(null);
    $('#password_confirmation').val(null);
    $('#divPassword').show();
    $('#name').attr("disabled","disabled");
    $('#group_id').attr("disabled","disabled");
    $('#email').attr("disabled","disabled");
    $('#opd_asal').attr("disabled","disabled");
  
    $('#ModalUser').modal('show');
});

$('.modal-footer').on('click', '.gantiPass', function() {
  if(validasiDataAwal() != false){
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: 'user/gantiPass',
        data: {
            '_token': $('input[name=_token]').val(),
            'password' : $('#password').val(),
            'password_confirmation' : $('#password_confirmation').val(),
            'id' : $('#id_user').val(),
        },
        success: function(data) {
              $('#users-table').DataTable().ajax.reload();              
              $('#ModalUser').modal('hide'); 
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
        },
    });
  }
});

$(document).on('click', '#btnEditUser', function() {
var data = user_tbl.row( $(this).parents('tr') ).data();

    $('.btnUser').addClass('edit');
    $('.btnUser').removeClass('add');
    $('.btnUser').removeClass('gantiPass');
    $('.modal-title').text('Edit User');
    $('.form-horizontal').show();
    $('#id_user').val(data.id);
    $('#name').val(data.name);
    $('#group_id').val(data.group_id);
    $('#opd_asal').val(data.id_unit);
    $('#email').val(data.email);
    document.frmModalUser.status_user[data.status_user].checked=true;
    $('#name').removeAttr("disabled");
    $('#group_id').removeAttr("disabled");
    $('#opd_asal').removeAttr("disabled");
    $('#email').removeAttr("disabled");
    $('#divPassword').hide();
  
    $('#ModalUser').modal('show');
});

$('.modal-footer').on('click', '.edit', function() {

  if(validasiDataEdit() != false){
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: 'user/editUser',
        data: {
            '_token': $('input[name=_token]').val(),
            'nama' : $('#name').val(),
            'group_id' : $('#group_id').val(),
            'status_user' : getStatusUser(),
            'email' : $('#email').val(),
            'id_unit' : $('#opd_asal').val(),
            'id' : $('#id_user').val(),
        },
        success: function(data) {
              $('#users-table').DataTable().ajax.reload();
              $('#ModalUser').modal('hide'); 
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
        },
    });
  }
});

$(document).on('click', '#btnHapusUser', function() {
var data = user_tbl.row( $(this).parents('tr') ).data();

  $('#btnDelUser').addClass('delete');
  $('.modal-title').text('Hapus User');
  $('.form-horizontal').hide();
  $('#id_user_hapus').val(data.id);
  $('#name_user_hapus').html(data.name);
  $('#HapusUser').modal('show');
  
});

$('.modal-footer').on('click', '.delete', function() {
  $.ajaxSetup({
     headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });

  $.ajax({
    type: 'post',
    url: 'user/hapusUser',
    data: {
      '_token': $('input[name=_token]').val(),
      'id': $('#id_user_hapus').val(),
    },
    success: function(data) {
      $('#users-table').DataTable().ajax.reload();
      createPesan(data.pesan,"success");
    }
  });
});

$(document).on('click', '#btnTambahAUnit', function() {
    $('.modal-title').text('Tambah Akses Unit');
    $('.form-horizontal').show();
    LoadUnit();  
    $('#ModalUnit').modal('show');
});

$(document).on('click', '#btnTambahAWilayah', function() {
    $('.modal-title').text('Tambah Akses Wilayah');
    $('.form-horizontal').show();
    $('#ModalDesa').modal('show');
});

var kab_tbl;
$(document).on('click', '#btnTambahAWilayahKab', function() {

    kab_tbl = $('#tblKabupaten').DataTable( {
        processing: true,
        serverSide: true,
        autoWidth : false,
        dom: 'bfrtIp',
        "ajax": {"url": "./user/getKab"},
        "columns": [
                { data: 'no_urut', sClass: "dt-center"},
                { data: 'kd_kab', sClass: "dt-center"},
                { data: 'nama_kab_kota', name: 'nama_kab_kota' },
                { data: 'action', name: 'action', orderable: false, searchable: false , sClass: "dt-center"}
            ],
        "order": [[0, 'asc']],
        "bDestroy": true
    }); 

    $('.modal-title').text('Tambah Akses Wilayah Kabupaten/Kota');
    $('.form-horizontal').show();
    $('#ModalKabupaten').modal('show');
});

var unit_tbl;
function LoadUnit(){
    unit_tbl = $('#tblUnit').DataTable({
        processing: true,
        serverSide: true,
        autoWidth : false,
        dom: 'bfrtIp',
        "ajax": {"url": "./user/getUnit"},
        "columns": [
              { data: 'no_urut', sClass: "dt-center"},
              { data: 'nm_unit'},
              { data: 'action', name: 'action', orderable: false, searchable: false , sClass: "dt-center"}
            ],
        "order": [[0, 'asc']],
        "bDestroy": true
    });  
};

$(document).on('click', '#btnPilihUnit', function() {
    var data = unit_tbl.row( $(this).parents('tr') ).data();
    $.ajaxSetup({
     headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
        type: 'post',
        url: 'user/addUnit',
        data: {
            '_token': $('input[name=_token]').val(),
            'user_id' : id_user_temp,
            'kd_unit' : data.id_unit,
        },
        success: function(data) {
          $('#unit-table').DataTable().ajax.reload();
          if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
        }
      });
    $('#ModalUnit').modal('hide'); 
  });

$(document).on('click', '#btnHapusUnit', function() {
var data = akses_unit.row( $(this).parents('tr') ).data();
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: 'user/hapusUnit',
        data: {
          '_token': $('input[name=_token]').val(),
          'id_user_unit': data.id_user_unit,
        },
        success: function(data) {
          $('#unit-table').DataTable().ajax.reload();
          createPesan(data.pesan,"success");
        }
    });  
});

$(document).on('click', '#btnPilihDesa', function() {
    var data = desa_tbl.row( $(this).parents('tr') ).data();
    $.ajaxSetup({
     headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
        type: 'post',
        url: 'user/addWilayah',
        data: {
            '_token': $('input[name=_token]').val(),
            'user_id' : id_user_temp,
            'kd_kecamatan' : data.id_kecamatan,
            'kd_desa' : data.id_desa,
        },
        success: function(data) {
          $('#wilayah-table').DataTable().ajax.reload();
          if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
        }
      });
    $('#ModalDesa').modal('hide'); 
  });

$(document).on('click', '#btnPilihKab', function() {
    var data = kab_tbl.row( $(this).parents('tr') ).data();
    $.ajaxSetup({
     headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
        type: 'post',
        url: 'user/addWilayah',
        data: {
            '_token': $('input[name=_token]').val(),
            'user_id' : id_user_temp,
            'kd_kecamatan' : data.id_prov,
            'kd_desa' : data.id_kab,
        },
        success: function(data) {
          $('#wilayah-table').DataTable().ajax.reload();
          if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
        }
      });
    $('#ModalKabupaten').modal('hide'); 
  });

$(document).on('click', '#btnHapusDesa', function() {
var data = akses_wilayah.row( $(this).parents('tr') ).data();
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: 'user/hapusWilayah',
        data: {
          '_token': $('input[name=_token]').val(),
          'id_user_wil': data.id_user_wil,
        },
        success: function(data) {
          $('#wilayah-table').DataTable().ajax.reload();
          createPesan(data.pesan,"success");
        }
    });  
});

});
</script>
@endsection
