<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <?php
                $this->title = 'Load Data Musrenbang Kecamatan';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = '/';
                $breadcrumb->begin();
                $breadcrumb->add(['url' => '/modul2','label' => 'Musrenbang RKPD']);
                $breadcrumb->add(['url' => '/modul2','label' => 'Kecamatan']);
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
            <p><h2 class="panel-title">Load Data Musrenbang Kecamatan</h2></p>
          </div>

          <div class="panel-body">
            <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group">
                    <label for="tahun_rkpd" class="col-sm-3 control-label" align='left'>Tahun Musrenbang :</label>
                    <div class="col-sm-1">
                      <input class="form-control text-center" type="text" id="tahun_rkpd" name="tahun_rkpd" value="{{Session::get('tahun')}}" disabled>
                    </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3 text-left" for="id_kecamatan">Nama Kecamatan :</label>
                          <div class="col-sm-5">
                              <select class="form-control" name="id_kecamatan" id="id_kecamatan"></select>
                          </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-sm-3 text-left" for="id_desa">Nama Desa/Kelurahan :</label>
                          <div class="col-sm-5">
                              <select class="form-control" name="id_desa" id="id_desa"></select>
                          </div>
                  </div>
                  <div class="col-sm-offset-3">
                    <a type="button" id="btnProses" class="btn btn-labeled btn-primary" data-dismiss="modal"><span class="btn-label"><i class="fa fa-download fa-lg fa-fw"></i></span> Load Data Musrenbang Desa</a>
                    {{-- <a type="button" id="btnReProses" class="btn btn-labeled btn-success" data-dismiss="modal"><span class="btn-label"><i class="fa fa-refresh fa-lg fa-fw"></i></span> ReLoad Data Musrenbang Desa</a> --}}
                  </div>
            </form>
            <div class='tabs-x tabs-above tab-bordered tabs-krajee'> 
                    {{-- <div class="table-responsive"> --}}
                    <table id="tblMusrendes" class="table table-striped table-bordered table-responsive compact display" width="100%" cellspacing="0">
                      <thead>
                          <tr>
                              <th width="5px" style="text-align: center; vertical-align:middle"></th>
                              <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                              <th width="10%" style="text-align: center; vertical-align:middle">Kecamatan</th>
                              <th style="text-align: center; vertical-align:middle">Uraian Aktivitas Kegiatan</th>
                              <th width="5%" style="text-align: center; vertical-align:middle">Lokasi</th>
                              <th width="10%" style="text-align: center; vertical-align:middle">Volume</th>
                              <th width="20%" style="text-align: center; vertical-align:middle">Pagu Usulan</th>
                              <th width="5px" style="text-align: center; vertical-align:middle">Status Usulan</th>
                              <th width="20px" style="text-align: center; vertical-align:middle">Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div> 
                    {{-- </div> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

<script id="details-lokasi" type="text/x-handlebars-template">
        <table class="table table-striped display table-bordered table-responsive compact details-table" id="tbllokasi-@{{id_musrencam}}">
            <thead>
              <tr>
                <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                <th width="10%" style="text-align: center; vertical-align:middle">Sumber Usulan</th>
                <th width="5%" style="text-align: center; vertical-align:middle">Desa</th>
                <th width="5%" style="text-align: center; vertical-align:middle">RT/RW</th>
                <th style="text-align: center; vertical-align:middle">Keterangan Lokasi</th>
                <th width="10%" style="text-align: center; vertical-align:middle">Volume Usulan</th>
                {{-- <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th> --}}
              </tr>
            </thead>
            <tbody></tbody>
        </table>
</script>

<div id="ModalUnloadData" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
            <h4 style="text-align: center;">Proses Unload Data</h4>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id_musrencam_unload" name="id_musrencam_unload">
            <div class="alert alert-warning">
                <div>
                  <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border text-warning"  aria-hidden="true"></i>
                  <p>Yakin akan melakukan <strong>un-Load Data</strong> usulan ini ?</p>
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
                        <button type="button" id="btnProsesUnload" class="btn btn-success btn-labeled" data-dismiss="modal">
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

    <div id="StatusProgram" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
            <h4 style="text-align: center;">Perubahan Status Usulan</h4>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id_musrendes_posting" name="id_musrendes_posting">
            <input type="hidden" id="status_usulan_posting" name="status_usulan_posting">
            <div class="alert alert-success">
                <div>
                  <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border text-info"  aria-hidden="true"></i>
                  <p>Yakin akan melakukan proses <strong><i><span id="ur_status_ranwal_posting"></span></i></strong> pada usulan ini ?</p>
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

var detLokasi = Handlebars.compile($("#details-lokasi").html());

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

$('.page-alert .close').click(function(e) {
        e.preventDefault();
        $(this).closest('.page-alert').slideUp();
    });

$('[data-toggle="popover"]').popover();

$('.number').number(true,0,',', '.');

$('.display').DataTable({
      dom : 'BfRtip',
      autoWidth : false,
      bDestroy: true
  });

$("#id_kecamatan").change(function() {     
  loadDesa($("#id_kecamatan").val());
  LoadUsulKecamatan($("#id_kecamatan").val());
});

$.ajax({
    type: "GET",
    url: '../admin/parameter/getKecamatan',
    dataType: "json",

    success: function(data) {

      var j = data.length;
      var post, i;

      $('select[name="id_kecamatan"]').empty();
      $('select[name="id_kecamatan"]').append('<option value="0">---Pilih Kecamatan---</option>');

      for (i = 0; i < j; i++) {
        post = data[i];
        $('select[name="id_kecamatan"]').append('<option value="'+ post.id_kecamatan +'">'+ post.nama_kecamatan +'</option>');
      }
    }
  }); 

function loadDesa($id_kecamatan){
  $.ajax({
    type: "GET",
    url: '../admin/parameter/getDesa/'+$id_kecamatan,
    dataType: "json",

    success: function(data) {

      var j = data.length;
      var post, i;

      $('select[name="id_desa"]').empty();
      $('select[name="id_desa"]').append('<option value="0">---Pilih Desa/Kelurahan---</option>');

      for (i = 0; i < j; i++) {
        post = data[i];
        $('select[name="id_desa"]').append('<option value="'+ post.id_desa +'">'+ post.nama_desa +'</option>');
      }
    }
  }); 
}

loadDesa($("#id_kecamatan").val());

var usulan_tbl
function LoadUsulKecamatan($id_kecamatan){
    usulan_tbl=$('#tblMusrendes').DataTable({
                  processing: true,
                  serverSide: true,
                  dom : 'BfRtip',                  
                  autoWidth : false,
                  "ajax": {"url": "./getLoadData/"+$id_kecamatan},
                  "language": {
                      "decimal": ",",
                      "thousands": "."},
                  "columns": [
                        {
                            "className":      'details-control',
                            "orderable":      false,
                            "searchable":      false,
                            "data":           null,
                            "defaultContent": '',
                            "width" : "5px"
                        },
                        { data: 'no_urut', sClass: "dt-center", width :"5px"},
                        { data: 'nama_kecamatan', sClass: "dt-left", width :"10%"},
                        { data: 'uraian_aktivitas_kegiatan', sClass: "dt-left"},
                        { data: 'jml_lokasi', sClass: "dt-center",width :"10%",
                            render: $.fn.dataTable.render.number( '.', ',', 0, '' )},
                        { data: 'volume', sClass: "dt-center",width :"10%",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'jml_pagu', sClass: "dt-right",width :"20%",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'icon','searchable': false, 'orderable':false, sClass: "dt-center", width :"5px",
                            render: function(data, type, row,meta) {
                            return '<i class="'+row.status_icon+'" style="color:'+row.warna+';"/>';
                          }},
                        { data: 'action', 'searchable': false, width :"20px", 'orderable':false }
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        });
}

var tblLokasi;
function initLokasi(tableId, data) {
    tblLokasi=$('#' + tableId).DataTable({
            processing: true,
            serverSide: true,
            ajax: data.details_url,
            dom : 'BFRtIP',
            autoWidth: false,
            "language": {
                      "decimal": ",",
                      "thousands": "."},
            "columns": [
                        { data: 'urut', sClass: "dt-center"},
                        { data: 'sumber_display'},
                        { data: 'nama_desa'},
                        { data: 'rtrw', sClass: "dt-center"},                        
                        { data: 'uraian_kondisi'},
                        { data: 'volume', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        // { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
                      ],
            "order": [[0, 'asc']],
            "bDestroy": true
        })

}

var id_musrendes_temp;
$('#tblMusrendes tbody').on('click', 'td.details-control', function () {

        var tr = $(this).closest('tr');
        var row = usulan_tbl.row( tr );
        var tableId = 'tbllokasi-' + row.data().id_musrencam;
        // id_musrendes_temp = row.data().id_musrendes;

        if (row.child.isShown()) {
            row.child.hide();
            tr.removeClass('shown');
        } else {
            row.child(detLokasi(row.data())).show();
            initLokasi(tableId, row.data());
            tr.addClass('shown');
            tr.next().find('td').addClass('no-padding bg-gray');
        }    
  });

$(document).on('click', '#btnProses', function() {
  $.ajaxSetup({
    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });

  $('#ModalProgress').modal('show');

  $.ajax({
        type: 'POST',
        url: '../musrencam/importData',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_kecamatan' :$('#id_kecamatan').val(),
            'id_desa' :$('#id_desa').val(),
        },
        success: function(data) {
          // createPesan("Data Berhasil di Load","success");
          usulan_tbl.ajax.reload();
          $('#ModalProgress').modal('hide');
          if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              } 
        },
        error: function(data){
          createPesan("Data Gagal di Load","danger");
          usulan_tbl.ajax.reload();
          $('#ModalProgress').modal('hide');
        }
  });
});

$(document).on('click', '#btnUnLoadMusren', function() {

  var data = usulan_tbl.row( $(this).parents('tr') ).data();

  $('#id_musrencam_unload').val(data.id_musrencam);

  $('#ModalUnloadData').modal('show');

});

$(document).on('click', '#btnProsesUnload', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      type: 'post',
      url: '../musrencam/unLoadData',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_musrencam': $('#id_musrencam_unload').val()
      },
      success: function(data) {
        usulan_tbl.ajax.reload();
        if(data.status_pesan==1){
        createPesan(data.pesan,"success");
        } else {
        createPesan(data.pesan,"danger"); 
        }
        $('#ModalUnloadData').modal('hide');  
      }
    });
});


});
</script>
@endsection
