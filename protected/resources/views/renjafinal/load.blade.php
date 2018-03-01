<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?php
                $this->title = 'Load Data Renja Final Perangkat Daerah';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = '/';
                $breadcrumb->begin();
                $breadcrumb->add(['url' => '/modul2','label' => 'Renja Perangkat Daerah']);
                $breadcrumb->add(['url' => '/renja', 'label' => 'Renja Final']);
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
                    <p><h2 class="panel-title">Load Data Renja Final dari RKPD</h2></p>
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
                    <label class="control-label col-sm-2 text-left" for="id_rkpd_ranwal">Program Ranwal Renja:</label>
                        <div class="col-sm-7">
                            <select class="form-control id_rkpd_ranwal" name="id_rkpd_ranwal" id="id_rkpd_ranwal"></select>
                        </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2 text-left" for="id_unit"></label>
                    <div class="col-sm-7">
                        <a id="btnProses" type="button" class="btn btn-primary btn-labeled"><span class="btn-label"><i class="fa fa-download fa-fw fa-lg"></i></span> Load Data dari RKPD Final</a>
                    </div>
                </div>
                </form>                
                {{-- <div class="table-responsive"> --}}
                    <table id="tblRekap" class="table table-striped compact table-bordered table-responsive" width="100%">
                        <thead>
                            <tr>
                                <th width='5%' style="text-align: center; vertical-align:middle">No Urut</th>
                                <th style="text-align: center; vertical-align:middle">Nama Program Renja</th>
                                <th width='5%' style="text-align: center; vertical-align:middle">Jumlah Indikator</th>
                                <th width='5%' style="text-align: center; vertical-align:middle">Jumlah Kegiatan</th>
                                <th width='5%' style="text-align: center; vertical-align:middle">Jumlah Pelaksana</th>
                                <th width='5%' style="text-align: center; vertical-align:middle">Jumlah Aktivitas</th>
                                <th width='10%' style="text-align: center; vertical-align:middle">Jumlah Pagu</th>
                                <th width='10%' style="text-align: center; vertical-align:middle">Aksi</th>
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

<div id="HapusData" class="modal fade" role="dialog" tabindex="-1" data-focus-on="input:first" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Unload Data Renja Perangkat Daerah</h4>
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

function loadSelectProgram(){
  $.ajax({
    type: "GET",
    url: '../renja/getSelectProgram/'+$('#id_unit').val()+'/'+$('#tahun_rkpd').val(),
    dataType: "json",
    success: function(data) {

          var j = data.length;
          var post, i;

          $('select[name="id_rkpd_ranwal"]').empty();
          $('select[name="id_rkpd_ranwal"]').append('<option value="0">---Pilih Semua Program---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="id_rkpd_ranwal"]').append('<option value="'+ post.id_renja_program +'">'+ post.uraian_program_renstra +'</option>');
          }
          }
    });   
}

$( "#id_unit" ).change(function() {
  loadTblRekap($('#tahun_rkpd').val(),$('#id_unit').val());
  loadSelectProgram();
  $('#judul').html('<b>Daftar Program RKPD yang akan dilaksanakan oleh '+$('#id_unit option:selected').text()+'</b>'); 
  
});

var tblProgramRekap
function loadTblRekap(tahun,unit){
    tblProgramRekap = $('#tblRekap').DataTable({
                  processing: true,
                  serverSide: true,
                  dom : 'BFRtIp',
                  "ajax": {"url": "../renja/getRekapProgram/"+tahun+"/"+unit},
                  "language": {
                  "decimal": ",",
                  "thousands": "."},
                  "columns": [
                        { data: 'urut', sClass: "dt-center"},
                        { data: 'uraian_program_renstra'},
                        { data: 'jml_indikator', sClass: "dt-center"},
                        { data: 'jml_kegiatan', sClass: "dt-center"},
                        { data: 'jml_pelaksana', sClass: "dt-center"},
                        { data: 'jml_aktivitas', sClass: "dt-center"},
                        { data: 'jml_pagu', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        });
}

$(document).on('click', '#btnProses', function() {

    var tahun =$('#tahun_rkpd').val();
    var unit =$('#id_unit').val();
    var ranwal =$('#id_rkpd_ranwal').val();

    $('#ModalProgress').modal('show');

    $.ajaxSetup({
          headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: "post",
        url: '../renja/transProgramRenja',
        data: {
                '_token': $('input[name=_token]').val(),
                'tahun_renja' : tahun ,
                'id_unit' : unit,
                'id_rkpd_ranwal' : ranwal,
            },
        success: function(data) {
            tblProgramRekap.ajax.reload();
            $('#ModalProgress').modal('hide'); 
            if(data.status_pesan==1){
                createPesan(data.pesan,"success");                    
            } else {
                createPesan(data.pesan,"danger");
            }
        },
        error: function(data) {
            $('#ModalProgress').modal('hide');
            createPesan('Proses Import Data Gagal',"danger");
        }
    });
});

$(document).on('click', '.btnUnload', function() {

var data = tblProgramRekap.row( $(this).parents('tr') ).data();

  $('#id_rkpd_ranwal_unload').val(data.id_renja_program);
  $('#id_unit_unload').val(data.id_unit);
  $('.ur_id_rkpd_ranwal').text(data.uraian_program_renstra);

  $('#HapusData').modal('show');

});

$(document).on('click', '#btnDelData', function() {

$('#ModalProgress').modal('show');

$.ajaxSetup({
    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});

$.ajax({
      type: 'post',
      url: '../renja/unloadRenja',
      data: {
        '_token': $('input[name=_token]').val(),
        'tahun_renja' : $('#tahun_rkpd').val(),
        'id_unit' : $('#id_unit_unload').val(),
        'id_rkpd_ranwal' : $('#id_rkpd_ranwal_unload').val(),
      },
      success: function(data) {
        if(data.status_pesan==1){
            createPesan(data.pesan,"success");
            tblProgramRekap.ajax.reload();
            loadSelectProgram();
            $('#ModalProgress').modal('hide');
        } else {
            createPesan(data.pesan,"danger");
            loadSelectProgram();
            $('#ModalProgress').modal('hide');
        }

      }
    });
});
    
});
</script>
@endsection