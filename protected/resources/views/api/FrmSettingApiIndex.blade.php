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
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-info">
        <div class="panel-heading">
          <p>
            <h2 class="panel-title">Setting API Management</h2>
          </p>
        </div>

        <div class="panel-body">

          <form name="frmModalJenis" class="form-horizontal" role="form" autocomplete='off' action="" method=""
            onsubmit="return false;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <label class="control-label col-sm-1" for="jenis_api">Jenis API </label>
              <div class="col-sm-3">
                <select class="form-control select2" name="jenis_api" id="jenis_api">
                  <option value="1">API Simda Keuangan</option>
                  <option value="2">API SIPD Kemendagri</option>
                  <option value="3">API KRISNA Bappenas</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-1" for="alamat_api">Alamat API </label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="alamat_api" name="alamat_api">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-1" for="uraian_key">API Key </label>
              <div class="col-sm-6">
                <div class="input-group">
                  <input type="text" class="form-control" id="uraian_key" name="uraian_key">
                  <div class="input-group-btn">
                    {{-- <button class="btn btn-success" id="btnAddSetting" name="btnAddSetting"><i class="fa fa-plus fa-fw fa-lg"></i></button> --}}
                    <button id="btnAddSetting" type="button" class="btnAddSetting btn btn-labeled btn-success"><span
                        class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span> Tambah API</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
          <table id='tblSettingApi' class="table display compact table-striped table-bordered table-responsive"
            cellspacing="0" width="100%">
            <thead>
              <tr>
                <th width="8%" style="text-align: center; vertical-align:middle">No Urut</th>
                <th width="15%" style="text-align: center; vertical-align:middle">Jenis API</th>
                <th width="30%" style="text-align: center; vertical-align:middle">API Key / Barrier Key</th>
                <th style="text-align: center; vertical-align:middle">URL API </th>
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

@endsection

@section('scripts')
<script type="text/javascript" language="javascript" class="init">
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

$('.number').number(true,4,',', '.');

$('.display').DataTable({
      dom : 'BfRtip',
      autoWidth : false,
      bDestroy: true
  });

var TblSettingApis=$('#tblSettingApi').DataTable({
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
  "bDestroy": true,
  "ajax": {"url": "./getdatasetting"},
  "columns": [
        { data: 'no_urut','searchable': false, 'orderable':true, sClass: "dt-center"},
        { data: 'jenis_api', sClass: "dt-center"},
        { data: 'key_barrier', sClass: "dt-left"},
        { data: 'url_api', sClass: "dt-left"},
        { data: 'action', 'searchable': false, width :"10%", 'orderable':false, sClass: "dt-center" }
      ],
  "order": [[0, 'asc']],
});

$(document).on('click', '#btnDelete', function() {
  var data = TblSettingApis.row( $(this).parents('tr') ).data();
  $.ajaxSetup({
     headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });

  $.ajax({
    type: 'post',
    url: './hapussetting',
    data: {
      '_token': $('input[name=_token]').val(),
      'id_setting': data.id_setting,
    },
    success: function(data) {
      TblSettingApis.ajax.reload();
      if(data.status_pesan==1){
        createPesan(data.pesan,"success");
      } else {
        createPesan(data.pesan,"danger"); 
      }
    }
  });  
});

$(document).on('click', '#btnAddSetting', function() {
  $.ajaxSetup({
     headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });

  if($.trim($('#uraian_key').val()).length > 0){
    $.ajax({
      type: 'post',
      url: './tambahsetting',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_app' : $('#jenis_api').val(),
        'url_api' : $('#alamat_api').val(),
        'key_barrier' : $('#uraian_key').val(),
      },
      success: function(data) {
        TblSettingApis.ajax.reload();
        if(data.status_pesan==1){
          createPesan(data.pesan,"success");
        } else {
          createPesan(data.pesan,"danger"); 
        }
      }
    });
  } else {
    createPesan("API Key / Barrier Key masih kosong","danger");
  }  
});


});
</script>
@endsection