<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
        <?php
                $this->title = 'Load dan Proses Data Musrenbang RKPD';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = 'modul2';
                $breadcrumb->begin();
                $breadcrumb->add(['label' => 'RKPD']);
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
                    <h2 class="panel-title">{{ $this->title }}</h2>
                </div>
            <div class="panel-body">
                <form name="" class="form-horizontal" role="form" autocomplete='off' action="" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="tahun_rkpd" class="col-sm-3 control-label text-left" align='left'>Tahun Perencanaan :</label>
                        <div class="col-sm-1">                            
                            <input class="form-control text-center" type="text" id="tahun_rkpd" name="tahun_rkpd" value="{{Session::get('tahun')}}" disabled>
                        </div>
                        <button id="btnProses" type="button" class="btnProses btn btn-labeled btn-sm btn-primary">
                                      <span class="btn-label"><i class="glyphicon glyphicon-download-alt"></i></span>Proses Load Data dari Rancangan RKPD</button>
                </div>
                <div class="form-group hidden">
                    <label class="control-label col-sm-3 text-left" for="id_unit">Unit Penyusun Renja :</label>
                        <div class="col-sm-7">
                            <select class="form-control id_Unit" name="id_unit" id="id_unit"></select>
                        </div>
                </div>
                <div class="form-group hidden">
                    <label class="control-label col-sm-3 text-left" for="id_rkpd_ranwal">Program Ranwal RKPD :</label>
                        <div class="col-sm-7">
                            <select class="form-control id_rkpd_ranwal" name="id_rkpd_ranwal" id="id_rkpd_ranwal"></select>
                        </div>
                </div>
                </form>
                <div class='tabs-x tabs-above tab-bordered tabs-krajee'>                    
                    <div id="judul" class="alert alert-info col-md-12" ><b>Daftar Program RKPD</b></div>
                                <table id="tblProgramRKPD" class="table table-striped table-bordered table-responsive">
                                    <thead>
                                        <tr>
                                            <th width="5px" rowspan="3" style="text-align: center; vertical-align:middle"></th>
                                            <th width="5px" rowspan="3" style="text-align: center; vertical-align:middle">No Urut</th>
                                            <th rowspan="3" style="text-align: center; vertical-align:middle">Nama Program RKPD</th>
                                            <th colspan="8" style="text-align: center; vertical-align:middle">Rincian Data</th>
                                            <th width="5px" rowspan="3" style="text-align: center; vertical-align:middle">Aksi</th>
                                        </tr>
                                        <tr>
                                            <th colspan="2" style="text-align: center; vertical-align:middle">RKPD</th>
                                            <th colspan="2" style="text-align: center; vertical-align:middle">Program SKPD</th>  
                                            <th colspan="2" style="text-align: center; vertical-align:middle">Kegiatan SKPD</th>
                                            <th colspan="2" style="text-align: center; vertical-align:middle">Aktivitas SKPD</th>
                                        </tr>
                                        <tr>
                                            <th width="15px" style="text-align: center; vertical-align:middle">Pagu</th>
                                            <th width="50px" style="text-align: center; vertical-align:middle">Pelaksana</th>                                            
                                            <th width="15px" style="text-align: center; vertical-align:middle">Jumlah</th>
                                            <th width="50px" style="text-align: center; vertical-align:middle">Pagu</th>
                                            <th width="15px" style="text-align: center; vertical-align:middle">Jumlah</th>
                                            <th width="50px" style="text-align: center; vertical-align:middle">Pagu</th>
                                            <th width="15px" style="text-align: center; vertical-align:middle">Jumlah</th>
                                            <th width="50px" style="text-align: center; vertical-align:middle">Pagu</th>
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

<div id="cariReload" class="modal fade" role="dialog" tabindex="-1" data-focus-on="input:first" data-backdrop="static">
  <div class="modal-dialog modal-lg"  >
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" >Daftar Program RKPD yang belum di-Load ke Musrenbang RKPD</h3>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" role="form" autocomplete='off' action="" onsubmit="return false;">
        <div class="form-group">
        <div class="col-sm-12">
          <table id='tblReProses' class="table display compact table-striped table-bordered" width="100%">
              <thead>
                    <tr>
                      <th width="10px" style="text-align: center; vertical-align:middle">Pilih</th>
                      <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                      <th style="text-align: center; vertical-align:middle">Nama Program RKPD</th>
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
      <div class="modal-footer">
        <div class="row">
            <div class="col-sm-2 text-left">
                <button id="btnProsesAll" type="button" class="btn btn-labeled btn-success"><span class="btn-label"><i class="fa fa-download fa-fw fa-lg"></i></span> Proses Load</button>
            </div>
            <div class="col-sm-10 text-right">
                <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                <span class="btn-label"><i class="fa fa-sign-out fa-fw fa-lg"></i></span>Tutup</button>
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
        {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> --}}
        <div class="text-center">
          <h3><strong>Sedang proses...</strong></h3>
          <i class="fa fa-spinner fa-pulse fa-5x fa-fw" style="color:grey;"></i>
        </div>
        </div>
      </div>
    </div>
  </div>

  <!--Modal Status Perkada -->
  <div id="StatusProgram" class="modal fade" role="dialog" data-backdrop="static" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Posting</h4>
        </div>
        <div class="modal-body">
            <div class="alert alert-success deleteContent">
                <i class="fa fa-exclamation-triangle fa-3x" aria-hidden="true" style="color: red"></i>
                Yakin akan mem-Posting Program : <strong><span class="uraian_posting"></span></strong> ?                
                <br>
                <br>
                <strong>Proses Posting Tidak dapat diulangi, Cek lagi sebelum memposting ! </strong> 
            <span class="hidden id_forum_posting"></span>
          </div>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusKeg">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-sm btn-success actionBtn btn-labeled" data-dismiss="modal">
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
  </div>

@endsection

@section('scripts')
<script>


$(document).ready(function(){

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

$.ajax({

    type: "GET",
    url: '../renja/getUnitRenja',
    dataType: "json",

    success: function(data) {

          var j = data.length;
          var post, i;

          $('select[name="id_unit"]').empty();
          $('select[name="id_unit"]').append('<option value="-1">---Pilih Unit---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="id_unit"]').append('<option value="'+ post.id_unit +'">'+ post.nm_unit +'</option>');
          }
          }
});
var programrkpd;
function loadProgram() {
    programrkpd = $('#tblProgramRKPD').DataTable({
                  processing: true,
                  serverSide: true,
                  dom : 'BFRtIp',
                  "autoWidth": false,
                  "ajax": {"url": "./getDataRekap"},
                  "language": {
                          "decimal": ",",
                          "thousands": "."},
                  'columnDefs': [
                     { 'width': 10,
                        'targets': 0,
                        'checkboxes': {'selectRow': true } },
                     { "targets": 1, "width": 10 }
                    ],
                  'select': { 'style': 'multi' },
                  "columns": [
                        { data: 'id_musrenkab', sClass: "dt-center",width:"3px"},
                        { data: 'no_urut', sClass: "dt-center",width:"5px"},
                        { data: 'uraian_program_rpjmd'},
                        { data: 'pagu_ranwal', sClass: "dt-center",width:"20px",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'jml_unit', sClass: "dt-center",width:"5px",
                            render: $.fn.dataTable.render.number( '.', ',', 0, '' )},                            
                        { data: 'jml_prog_renja', sClass: "dt-center",width:"5px",
                            render: $.fn.dataTable.render.number( '.', ',', 0, '' )},
                        { data: 'pagu_prog_renja', sClass: "dt-center",width:"20px",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'jml_kegiatan', sClass: "dt-center",width:"5px",
                            render: $.fn.dataTable.render.number( '.', ',', 0, '' )},
                        { data: 'pagu_kegiatan', sClass: "dt-center",width:"20px",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'jml_aktivitas', sClass: "dt-center",width:"5px",
                            render: $.fn.dataTable.render.number( '.', ',', 0, '' )},
                        { data: 'pagu_aktivitas', sClass: "dt-center",width:"5px",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center",width:"50px" }
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
    });
};

loadProgram();

var ReProses_Tbl;
function loadReProses($tahun){
  ReProses_Tbl = $('#tblReProses').DataTable({
        processing: true,
        serverSide: true,
        "autoWidth": false,
        "ajax": {"url": "./getSelectProgram/"+$tahun},
        "language": {
                "decimal": ",",
                "thousands": "."},
        'columnDefs': [
           { 'width': 10,
              'targets': 0,
              'checkboxes': {'selectRow': true } },
           { "targets": 1, "width": 10 }
          ],
        'select': { 'style': 'multi' },
        "columns": [
              { data: 'id_rkpd_rancangan', sClass: "dt-center", searchable: false, orderable:false,},
              { data: 'urut',sClass: "dt-center"},
              { data: 'uraian_program_rpjmd'},
              { data: 'action', 'searchable': false, 'orderable':false,sClass: "dt-center" }
            ],
            "order": [[0, 'asc']],
            "bDestroy": true
      });
};

$(document).on('click', '.btnProses', function() {
    loadReProses($('#tahun_rkpd').val());
    $('#cariReload').modal('show');
});

$(document).on('click', '#btnReLoad', function() {
  var data = ReProses_Tbl.row( $(this).parents('tr') ).data();
  var tahun=$('#tahun_rkpd').val();
  var id_rkpd=data.id_rkpd_rancangan;

    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $('#ModalProgress').modal('show');
    $('#cariReload').modal('hide'); 

    $.ajax({
        type: 'POST',
        url: './importData',
        data: {
          '_token': $('input[name=_token]').val(),
          'id_rkpd_ranwal' : id_rkpd,
      },
      success: function(data) {
        createPesan(data.pesan,"success");
        $('#tblProgramRKPD').DataTable().ajax.reload(null,false);
        $('#ModalProgress').modal('hide');
      },
      error: function(data){
        createPesan(data.pesan,"danger");
        $('#tblProgramRKPD').DataTable().ajax.reload(null,false);
        $('#ModalProgress').modal('hide');
      }
    });
});

$(document).on('click', '#btnProsesAll', function() {
  var rows_selected = ReProses_Tbl.column(0).checkboxes.selected();
  var counts_selected = rows_selected.count(); 
  var rows_data = ReProses_Tbl.rows({ selected: true }).data(); 
  var counts_data = ReProses_Tbl.rows({ selected: true }).count();  
  
  if (rows_selected.count() == 0) {
    createPesan("Data belum ada yang dipilih","danger");
    return;
  }; 

  $('#ModalProgress').modal('show');
  $('#cariReload').modal('hide');  

  $.each(rows_selected, function(index, rowId){
    var id_rkpd=rowId;
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });         
    $.ajax({
        type: 'POST',
        url: './importData',
        data: {
          '_token': $('input[name=_token]').val(),
          'id_rkpd_ranwal' : id_rkpd,
      },
      success: function(data) {
        createPesan(data.pesan,"success");
        $('#tblProgramRKPD').DataTable().ajax.reload(null,false);
        $('#ModalProgress').modal('hide');
      },
      error: function(data){
        createPesan(data.pesan,"danger");
        $('#tblProgramRKPD').DataTable().ajax.reload(null,false);
        $('#ModalProgress').modal('hide');
      }
    });
  });
  e.preventDefault();
});

$(document).on('click', '#btnUnload', function() {

  var data = programrkpd.row( $(this).parents('tr') ).data();

    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $('#ModalProgress').modal('show');

    $.ajax({
        type: 'POST',
        url: './unLoadData',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_musrenkab' : data.id_musrenkab
        },
        success: function(data) {
            createPesan(data.pesan,"success");
            $('#tblProgramRKPD').DataTable().ajax.reload(null,false);
            $('#ModalProgress').modal('hide');
        },
        error: function(err){
            createPesan(err,"danger");
            $('#tblProgramRKPD').DataTable().ajax.reload(null,false);
            $('#ModalProgress').modal('hide');
        }
    });

});

$(document).on('click', '.btnPosting', function() {

    $('.uraian_posting').html($(this).data('uraian_program'));
    $('.id_forum_posting').text($(this).data('id_forum_rkpdprog'));

    $('#StatusProgram').modal('show');

});
    
});
</script>
@endsection