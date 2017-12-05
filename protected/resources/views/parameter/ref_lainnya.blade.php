<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.parameterlayout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?php
                $this->title = 'Parameter Lainnya';
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
            <p><h2 class="panel-title">Referensi Jenis Lokasi, Sumber Dana dan lainnya</h2></p>
          </div>

          <div class="panel-body">
            <div class='tabs-x tabs-above tab-bordered tabs-krajee'>
              <ul class="nav nav-tabs nav-justified" role="tablist">
                <li class="active"><a href="#jenislokasi" aria-controls="jenislokasi" role="tab" data-toggle="tab"><i class="fa fa-map-marker fa-fw fa-lg text-success"></i> Jenis Lokasi non Kewilayahan</a></li>
                <li><a href="#sumberdana" aria-controls="sumberdana" role="tab-kv" data-toggle="tab"><i class="fa fa-money fa-fw fa-lg text-primary"></i> Sumber Dana</a></li>
              </ul>
              <div class="tab-content">
                <br>
                <div role="tabpanel" class="tab-pane fade in active" id="jenislokasi">
                  <form name="frmModalJenis" class="form-horizontal" role="form" autocomplete='off' action="" method="" onsubmit="return false;">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="id_item_perkada">Uraian Jenis :</label>
                        <div class="col-sm-6">
                          <div class="input-group">
                            <input type="text" class="form-control" id="uraian_jenis" name="uraian_jenis">
                            <div class="input-group-btn">
                              <button class="btn btn-success" id="btnJenis" name="btnJenis"><i class="fa fa-plus fa-fw fa-lg"></i></button>
                            </div>
                          </div>
                        </div>
                    </div>
                  </form>
                  <div class="table-responsive">
                  <table id='tblJenisLokasi' class="table display compact table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                              <tr>
                                <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                                <th style="text-align: center; vertical-align:middle">Uraian Jenis Lokasi</th>
                                <th width="10%" style="text-align: right; vertical-align:middle">Aksi</th>
                              </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    </div> 
                  </div> 
                <div role="tabpanel" class="tab-pane fade in" id="sumberdana">
                  <form name="frmModalJenis" class="form-horizontal" role="form" autocomplete='off' action="" method="" onsubmit="return false;">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="id_item_perkada">Uraian Sumber Dana :</label>
                        <div class="col-sm-6">
                          <div class="input-group">
                            <input type="text" class="form-control" id="uraian_sumber" name="uraian_sumber">
                            <div class="input-group-btn">
                              <button class="btn btn-success" id="btnSumberDana" name="btnSumberDana"><i class="fa fa-plus fa-fw fa-lg"></i></button>
                            </div>
                          </div>
                        </div>
                    </div>
                  </form>
                  <div class="table-responsive">
                    <table id='tblSumberDana' class="table display compact table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                          <tr>
                            <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                            <th style="text-align: center; vertical-align:middle">Uraian Sumber Dana</th>
                            <th width="10%" style="text-align: right; vertical-align:middle">Aksi</th>
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
          <input type="hidden" id="id_modal_hapus" name="id_modal_hapus">
          <div class="alert alert-danger deleteContent">
              <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border"  style="color:red;" aria-hidden="true"></i>
                <br>
                <span id="uraian_hapus"></span>
                <br>
                <br>
          </div>
        </div>
          <div class="modal-footer">
            <div class="ui-group-buttons">
              <button id="btnHapusModal" type="button" class="btn btn-sm btn-danger btn-labeled" data-dismiss="modal" ><span class="btn-label"><i id="footer_action_button" class="glyphicon glyphicon-trash"></i></span> Hapus</button>
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

var jenis_tbl=$('#tblJenisLokasi').DataTable({
                  processing: true,
                  serverSide: true,
                  // dom : 'BfRtip',                  
                  autoWidth : false,
                  "ajax": {"url": "./others/getDataJenis"},
                  "language": {
                      "decimal": ",",
                      "thousands": "."},
                  "columns": [
                        { data: 'no_urut','searchable': false, 'orderable':false, sClass: "dt-center", width :"5%"},
                        { data: 'nm_jenis', sClass: "dt-left"},
                        { data: 'action', 'searchable': false, width :"10%", 'orderable':false, sClass: "dt-center" }
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        });
//delete function

$(document).on('click', '#btnHapusJenis', function() {

  var data = jenis_tbl.row( $(this).parents('tr') ).data();

  $.ajaxSetup({
     headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });

  $.ajax({
    type: 'post',
    url: './others/hapusJenisLokasi',
    data: {
      '_token': $('input[name=_token]').val(),
      'id_jenis': data.id_jenis,
    },
    success: function(data) {
      jenis_tbl.ajax.reload();
      if(data.status_pesan==1){
        createPesan(data.pesan,"success");
      } else {
        createPesan(data.pesan,"danger"); 
      }
    }
  });  
});

$(document).on('click', '#btnJenis', function() {
  $.ajaxSetup({
     headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });



  if($.trim($('#uraian_jenis').val()).length > 5){
    $.ajax({
      type: 'post',
      url: './others/addJenisLokasi',
      data: {
        '_token': $('input[name=_token]').val(),
        'nm_jenis': $('#uraian_jenis').val(),
      },
      success: function(data) {
        jenis_tbl.ajax.reload();
        if(data.status_pesan==1){
          createPesan(data.pesan,"success");
        } else {
          createPesan(data.pesan,"danger"); 
        }
      }
    });
  } else {
    createPesan("Uraian Jenis Lokasi masih kosong/kurang dari 6 karakater","danger");
  }  
});

var dana_tbl=$('#tblSumberDana').DataTable({
    processing: true,
    serverSide: true,
                  // dom : 'BfRtip',                  
    autoWidth : false,
    "ajax": {"url": "./others/getSumberDana"},
    "language": {
        "decimal": ",",
        "thousands": "."},
    "columns": [
          { data: 'no_urut','searchable': false, 'orderable':false, sClass: "dt-center", width :"5%"},
          { data: 'uraian_sumber_dana', sClass: "dt-left"},
          { data: 'action', 'searchable': false, width :"10%", 'orderable':false, sClass: "dt-center" }
        ],
    "order": [[0, 'asc']],
    "bDestroy": true
});

$(document).on('click', '#btnHapusSumber', function() {

  var data = dana_tbl.row( $(this).parents('tr') ).data();

  $.ajaxSetup({
     headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });

  $.ajax({
    type: 'post',
    url: './others/hapusSumberDana',
    data: {
      '_token': $('input[name=_token]').val(),
      'id_sumber_dana': data.id_sumber_dana,
    },
    success: function(data) {
      dana_tbl.ajax.reload();
      if(data.status_pesan==1){
        createPesan(data.pesan,"success");
      } else {
        createPesan(data.pesan,"danger"); 
      }
    }
  });  
});

$(document).on('click', '#btnSumberDana', function() {
  $.ajaxSetup({
     headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });

  if($.trim($('#uraian_sumber').val()).length > 5 ){
    $.ajax({
    type: 'post',
    url: './others/addSumberDana',
    data: {
      '_token': $('input[name=_token]').val(),
      'uraian_sumber_dana': $('#uraian_sumber').val(),
    },
    success: function(data) {
      dana_tbl.ajax.reload();
      if(data.status_pesan==1){
        createPesan(data.pesan,"success");
      } else {
        createPesan(data.pesan,"danger"); 
      }
    }
    });
  } else {
    createPesan("Uraian Sumber Dana masih kosong/kurang dari 6 karakater","danger");
  };

    
});


});
</script>
@endsection
