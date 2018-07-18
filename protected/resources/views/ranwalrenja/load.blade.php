<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?php
                $this->title = 'Load Data Rancangan Awal Renja';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = '/';
                $breadcrumb->begin();
                $breadcrumb->add(['url' => '/modul2','label' => 'Renja Perangkat Daerah']);
                $breadcrumb->add(['url' => '/renja', 'label' => 'Rancangan Awal Renja']);
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
                    <p><h2 class="panel-title">{{ $this->title }}</h2></p>
                </div>
            <div class="panel-body">
                <form name="" class="form-horizontal" role="form" autocomplete='off' action="" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="tahun_rkpd" class="col-sm-2 control-label text-left" align='left'>Tahun Perencanaan :</label>
                    <div class="col-sm-2">                            
                        <input class="form-control text-center" type="text" id="tahun_rkpd" name="tahun_rkpd" value="{{Session::get('tahun')}}" disabled>
                    </div>                        
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2 text-left" for="id_unit">Unit Penyusun Renja :</label>
                        <div class="col-sm-7">
                            <select class="form-control id_Unit" name="id_unit" id="id_unit"></select>
                        </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2 text-left" for="id_unit"></label>
                    <div class="col-sm-7">
                        <a id="btnProses" type="button" class="btn btn-primary btn-labeled"><span class="btn-label"><i class="fa fa-download fa-fw fa-lg"></i></span> Load Data dari Ranwal RKPD</a>
                    </div>
                </div>
                </form>
                <div class='tabs-x tabs-above tab-bordered tabs-krajee'>
                    <ul class="nav nav-tabs" role="tablist">
                      <li class="active"><a href="#program" aria-controls="program" role="tab" data-toggle="tab">Program RKPD</a></li>
                      <li><a href="#rekap" aria-controls="programrenja" role="tab-kv" data-toggle="tab">Rekapitulasi Program Renja</a></li>
                    </ul>
                    <br>
                    <div id="judul" class="alert alert-info col-md-12" ><b>Daftar Program RKPD</b></div>

                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="program">
                            {{-- <div class="table-responsive"> --}}
                                <table id="tblProgramRKPD" class="table display compact table-striped table-bordered table-responsive" width="90%">
                                    <thead>
                                        <tr>
                                            <th rowspan="3" width='50px' style="text-align: center; vertical-align:middle">No Urut</th>
                                            <th rowspan="3" style="text-align: center; vertical-align:middle">Nama Program</th>
                                            <th colspan="7" width='40%' style="text-align: center; vertical-align:middle">Rincian Data</th>
                                            <th rowspan="3" width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                                        </tr>
                                        <tr>
                                            <th rowspan="2" width='50px' style="text-align: center; vertical-align:middle">Jumlah</th>   
                                            <th colspan="2" width='100px' style="text-align: center; vertical-align:middle">Sumber Data</th>
                                            <th colspan="4" width='200px' style="text-align: center; vertical-align:middle">Status Pelaksanaan</th>
                                        </tr>
                                        <tr>                                            
                                            <th width='50px' style="text-align: center; vertical-align:middle">RPJMD</th>
                                            <th width='50px' style="text-align: center; vertical-align:middle">Tambahan</th>
                                            <th width='50px' style="text-align: center; vertical-align:middle">Tepat Waktu</th>
                                            <th width='50px' style="text-align: center; vertical-align:middle">Dimajukan</th>
                                            <th width='50px' style="text-align: center; vertical-align:middle">Ditunda</th>
                                            <th width='50px' style="text-align: center; vertical-align:middle">Dibatalkan</th>
                                        </tr>
                                    </thead>
                                    <tbody>                                        
                                    </tbody>
                                </table> 
                            {{-- </div>   --}}
                            </div>
                            <div role="tabpanel" class="tab-pane fade in" id="rekap">
                            {{-- <div class="table-responsive"> --}}
                                    <table id="tblRekap" class="table dispaly table-striped compact table-bordered table-responsive" width="90%">
                                        <thead>
                                            <tr>
                                                <th width='50px' style="text-align: center; vertical-align:middle">No Urut</th>
                                                <th style="text-align: center; vertical-align:middle">Nama Program Renja</th>
                                                <th width='5%' style="text-align: center; vertical-align:middle">Jumlah Indikator</th>
                                                <th width='5%' style="text-align: center; vertical-align:middle">Jumlah Kegiatan</th>
                                                <th width='15%' style="text-align: center; vertical-align:middle">Jumlah Pagu</th>
                                            </tr>
                                        </thead>
                                        <tbody>                                        
                                        </tbody>
                                    </table>   
                                {{-- </div> --}}
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            </div>
        </div>
    </div>

<div id="HapusData" class="modal fade" role="dialog" tabindex="-1" data-focus-on="input:first" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Unload Data Ranwal RKPD</h4>
        </div>
        <div class="modal-body">            
            <div class="alert alert-danger" role="alert">
                <input type="hidden" id="id_rkpd_ranwal_unload" name="id_rkpd_ranwal_unload">
                <input type="hidden" id="id_unit_unload" name="id_unit_unload">
                <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border"  style="color:red;" aria-hidden="true"></i>
                Yakin akan melakukan <strong><i>Unload</i></strong> terhadap program Ranwal Renja : <strong><span class="ur_id_rkpd_ranwal"></span></strong> ?
                <br>
                <br>
                <strong>Catatan : Unload data akan menghapus data ini beserta seluruh data yang terkait, termasuk data-data pada proses selanjutnya..!!!!</strong>
          </div>          
        </div>
          <div class="modal-footer">
            <div class="row">
                    <div class="col-sm-2 text-left">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button id="btnDelData" type="button" class="btn btn-danger btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i class="fa fa-trash fa-fw fa-lg"></i></span>Lanjutkan Proses</button>
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

<div id="cariReload" class="modal fade" role="dialog" tabindex="-1" data-focus-on="input:first" data-backdrop="static">
  <div class="modal-dialog modal-lg"  >
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" >Daftar Program RKPD yang belum di Load dalam Ranwal Renja</h3>
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
            <div class="text-center">
              <h3><strong>Sedang proses...</strong></h3>
              <i class="fa fa-spinner fa-pulse fa-5x fa-fw text-info"></i>
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
    html += message;
    html += '</div>';    
    $(html).hide().prependTo('#pesan').slideDown();
    
    setTimeout(function() {
            $('#pesanx').removeClass('in');
         }, 3500);
  };

$('.display').DataTable({
      dom : 'BfRtip',
      autoWidth : false,
      bDestroy: true
  });

$('.page-alert .close').click(function(e) {
        e.preventDefault();
        $(this).closest('.page-alert').slideUp();
    });

$.ajax({

    type: "GET",
    url: './getUnitRenja',
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

var ReProses_Tbl
function loadReProses($id_unit,$tahun){
  ReProses_Tbl = $('#tblReProses').DataTable({
        processing: true,
        serverSide: true,
        "autoWidth": false,
        "ajax" : {"url": './getSelectProgram/'+$id_unit+'/'+$tahun},
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
              { data: 'id_rkpd_ranwal', sClass: "dt-center", searchable: false, orderable:false,},
              { data: 'no_urut',sClass: "dt-center"},
              { data: 'uraian_program_rpjmd'},
              { data: 'action', 'searchable': false, 'orderable':false,sClass: "dt-center" }
            ],
            "order": [[0, 'asc']],
            "bDestroy": true
      });
}

var programrkpd;
function loadProgramRKPD(tahun,unit){
    programrkpd = $('#tblProgramRKPD').DataTable({
                  processing: true,
                  serverSide: true,
                  dom : 'BFRtip',                  
                  autoWidth : false,
                  "ajax": {"url": "./getProgramRkpd/"+tahun+"/"+unit},
                  "columns": [
                        { data: 'urut', sClass: "dt-center"},
                        { data: 'uraian_program_rpjmd'},
                        { data: 'jml_data', sClass: "dt-center"},
                        { data: 'jml_lama', sClass: "dt-center"},
                        { data: 'jml_baru', sClass: "dt-center"},
                        { data: 'jml_tepat', sClass: "dt-center"},
                        { data: 'jml_maju', sClass: "dt-center"},
                        { data: 'jml_tunda', sClass: "dt-center"},
                        { data: 'jml_batal', sClass: "dt-center"},
                        { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
    });
}

$( "#id_unit" ).change(function() {
    loadProgramRKPD($('#tahun_rkpd').val(),$('#id_unit').val());
});

$('#tblProgramRKPD tbody').on( 'dblclick', 'tr', function () {
    var data = programrkpd.row(this).data();
     $('.nav-tabs a[href="#rekap"]').tab('show');
    loadTblRekap($('#tahun_rkpd').val(),$('#id_unit').val(),data.id_rkpd_ranwal);
});

$(document).on('click', '.view-rekap', function() {
    $('.nav-tabs a[href="#rekap"]').tab('show');
    loadTblRekap($('#tahun_rkpd').val(),$('#id_unit').val(),$(this).data('id_rkpd_ranwal'));;
});

function loadTblRekap(tahun,unit,ranwal){
    $('#tblRekap').DataTable({
                  processing: true,
                  serverSide: true,
                  dom : 'BFRtIp',                  
                  autoWidth : false,
                  "ajax": {"url": "./getRekapProgram/"+tahun+"/"+unit+"/"+ranwal},
                  "language": {
                  "decimal": ",",
                  "thousands": "."},
                  "columns": [
                        { data: 'urut', sClass: "dt-center"},
                        { data: 'uraian_program_renstra'},
                        { data: 'jml_indikator', sClass: "dt-center"},
                        { data: 'jml_kegiatan', sClass: "dt-center"},
                        { data: 'jml_pagu', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        });
}

$(document).on('click', '#btnProses', function() {
    loadReProses($('#id_unit').val(),$('#tahun_rkpd').val());
    $('#cariReload').modal('show');
});

$(document).on('click', '#btnReLoad', function() {
  var data = ReProses_Tbl.row( $(this).parents('tr') ).data();
  var tahun =$('#tahun_rkpd').val();
  var unit =$('#id_unit').val();
  var ranwal=data.id_rkpd_ranwal;

  $.ajaxSetup({
      headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });

  $('#ModalProgress').modal('show');
  $('#cariReload').modal('hide');         
  $.ajax({
            type: 'POST',
            url: './transProgramRKPD',
            data: {
                '_token': $('input[name=_token]').val(),
                'tahun_renja' : tahun ,
                'id_unit' : unit,
                'id_rkpd_ranwal' : ranwal,
            },
            success: function(data) {
                createPesan(data.pesan,"success");
                $('#tblProgramRKPD').DataTable().ajax.url("./getProgramRkpd/"+$('#tahun_rkpd').val()+"/"+$('#id_unit').val()).load();
                $('#ModalProgress').modal('hide'); 
            },
            error: function(data){
                createPesan(data.pesan,"danger");
                $('#tblProgramRKPD').DataTable().ajax.reload();
                $('#ModalProgress').modal('hide');
            }
    });
});

$(document).on('click', '#btnProsesAll', function() {
    var rows_selected = ReProses_Tbl.column(0).checkboxes.selected();
    var counts_selected = rows_selected.count(); 
    var rows_data = ReProses_Tbl.rows({ selected: true }).data(); 
    var counts_data = ReProses_Tbl.rows({ selected: true }).count();  
    var tahun =$('#tahun_rkpd').val();
    var unit =$('#id_unit').val();
  if (rows_selected.count() == 0) {
    createPesan("Data belum ada yang dipilih","danger");
    return;
  }; 

  $('#ModalProgress').modal('show');
  $('#cariReload').modal('hide');  

  $.each(rows_selected, function(index, rowId){    
    var ranwal =rowId;
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });         
    $.ajax({
            type: 'POST',
            url: './transProgramRKPD',
            data: {
                '_token': $('input[name=_token]').val(),
                'tahun_renja' : tahun ,
                'id_unit' : unit,
                'id_rkpd_ranwal' : ranwal,
            },
            success: function(data) {
                createPesan(data.pesan,"success");
                $('#tblProgramRKPD').DataTable().ajax.url("./getProgramRkpd/"+$('#tahun_rkpd').val()+"/"+$('#id_unit').val()).load();
                $('#ModalProgress').modal('hide'); 
            },
            error: function(data){
                createPesan(data.pesan,"danger");
                $('#tblProgramRKPD').DataTable().ajax.reload();
                $('#ModalProgress').modal('hide');
            }
    });
  });
  e.preventDefault();
});

$(document).on('click', '.unloadRenja', function() {

var data = programrkpd.row( $(this).parents('tr') ).data();

  $('#id_rkpd_ranwal_unload').val(data.id_rkpd_ranwal);
  $('#id_unit_unload').val(data.id_unit);
  $('.ur_id_rkpd_ranwal').text(data.uraian_program_rpjmd);

  $('#HapusData').modal('show');

});

$(document).on('click', '#btnDelData', function() {

$('#ModalProgress').modal('show');

$.ajaxSetup({
    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});

$.ajax({
      type: 'post',
      url: './unloadRenja',
      data: {
        '_token': $('input[name=_token]').val(),
        'tahun_renja' : $('#tahun_rkpd').val(),
        'id_unit' : $('#id_unit_unload').val(),
        'id_rkpd_ranwal' : $('#id_rkpd_ranwal_unload').val(),
      },
      success: function(data) {
        if(data.status_pesan==1){
            createPesan(data.pesan,"success")
            $('#tblProgramRKPD').DataTable().ajax.reload();
            // LoadSelectProgram($('#id_unit').val(),$('#tahun_rkpd').val());
            $('#ModalProgress').modal('hide');
        } else {
            createPesan(data.pesan,"danger")
            $('#ModalProgress').modal('hide');
        }
      }
    });
});
    
});
</script>
@endsection