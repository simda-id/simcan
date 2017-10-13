<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
                $this->title = 'Load dan Proses Data Forum SKPD';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = 'modul2';
                $breadcrumb->begin();
                $breadcrumb->add(['label' => 'Musrenbang']);
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
                                      <span class="btn-label"><i class="glyphicon glyphicon-download-alt"></i></span>Proses Load Data dari Rancangan Renja SKPD</button>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3 text-left" for="id_unit">Unit Penyusun Renja :</label>
                        <div class="col-sm-7">
                            <select class="form-control id_Unit" name="id_unit" id="id_unit"></select>
                        </div>
                </div>
                <div class="form-group">
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
                                            <th width="5px" rowspan="3" style="text-align: center; vertical-align:middle">No Urut</th>
                                            <th rowspan="3" style="text-align: center; vertical-align:middle">Nama Program</th>
                                            <th colspan="5" style="text-align: center; vertical-align:middle">Rincian Data</th>
                                            <th width="5px" rowspan="3" style="text-align: center; vertical-align:middle">Status</th>
                                            <th width="50px" rowspan="3" style="text-align: center; vertical-align:middle">Aksi</th>
                                        </tr>
                                        <tr>
                                            <th width="5px" rowspan="2" style="text-align: center; vertical-align:middle">Program SKPD</th>  
                                            <th colspan="3" style="text-align: center; vertical-align:middle">Kegiatan SKPD</th>
                                            <th width="5px" rowspan="2" style="text-align: center; vertical-align:middle">Aktivitas SKPD</th>
                                        </tr>
                                        <tr>                                            
                                            <th width="5px" style="text-align: center; vertical-align:middle">Jumlah</th>
                                            <th width="20px" style="text-align: center; vertical-align:middle">Pagu Total</th>
                                            <th width="20px" style="text-align: center; vertical-align:middle">Pagu Musrenbang</th>
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

    
var programrkpd = $('#tblProgramRKPD').DataTable({
                  processing: true,
                  serverSide: true,
                  dom : 'BFRtIp',
                  "autoWidth": false,
                  "ajax": {"url": "./loadData/getProgramRkpd/0/0"},
                  "columns": [
                        { data: 'no_urut', sClass: "dt-center",width:"5px"},
                        { data: 'uraian_program_rpjmd'},
                        { data: 'jml_program', sClass: "dt-center",width:"5px",
                            render: $.fn.dataTable.render.number( '.', ',', 0, '' )},
                        { data: 'jml_kegiatan', sClass: "dt-center",width:"5px",
                            render: $.fn.dataTable.render.number( '.', ',', 0, '' )},
                        { data: 'jml_pagu', sClass: "dt-center",width:"20px",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'jml_musren', sClass: "dt-center",width:"20px",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'jml_aktivitas', sClass: "dt-center",width:"5px",
                            render: $.fn.dataTable.render.number( '.', ',', 0, '' )},
                        { data: 'icon','searchable': false, 'orderable':false, sClass: "dt-center",width:"5px",
                            render: function(data, type, row,meta) {
                            return '<i class="'+row.status_icon+'" style="font-size:16px;color:'+row.warna+';"/>';
                          }},
                        { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center",width:"50px" }
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
    });

$( "#id_unit" ).change(function() {
  $('#tblProgramRKPD').DataTable().ajax.url("./loadData/getProgramRkpd/"+$('#tahun_rkpd').val()+"/"+$('#id_unit').val()).load();
  $('#judul').html('<b>Daftar Program RKPD yang akan dilaksanakan oleh '+$('#id_unit option:selected').text()+'</b>'); 
  $.ajax({

    type: "GET",
    url: './getSelectProgram/'+$('#id_unit').val()+'/'+$('#tahun_rkpd').val(),
    dataType: "json",
    success: function(data) {

          var j = data.length;
          var post, i;

          $('select[name="id_rkpd_ranwal"]').empty();
          $('select[name="id_rkpd_ranwal"]').append('<option value="0">---Pilih Semua Program---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="id_rkpd_ranwal"]').append('<option value="'+ post.id_rkpd_ranwal +'">'+ post.uraian_program_renstra +'</option>');
          }
          }
    }); 
});

$(document).on('click', '.btnProses', function() {
$.ajaxSetup({
    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});

$('#ModalProgress').modal('show');
$.ajax({
        type: 'POST',
        url: './loadData/insertProgramRkpd',
        data: {
            '_token': $('input[name=_token]').val(),
            'tahun_renja' : $('#tahun_rkpd').val(),
            'id_unit' : $('#id_unit').val(),
            'id_rkpd_ranwal' : $('#id_rkpd_ranwal').val(),
        },
        success: function(data) {
            $.ajax({
              type: 'POST',
              url: './loadData/insertProgramRenja',
              data: {
                '_token': $('input[name=_token]').val(),
                'tahun_renja' : $('#tahun_rkpd').val(),
                'id_unit' : $('#id_unit').val(),
                'id_rkpd_ranwal' : $('#id_rkpd_ranwal').val(),
              },
              success: function(data) {
                    $.ajax({
                    type: 'POST',
                    url: './loadData/insertKegiatanRenja',
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'tahun_renja' : $('#tahun_rkpd').val(),
                        'id_unit' : $('#id_unit').val(),
                        'id_rkpd_ranwal' : $('#id_rkpd_ranwal').val(),
                    },
                    success: function(data) {
                        $.ajax({
                          type: 'POST',
                          url: './loadData/insertAktivitasRenja',
                          data: {
                            '_token': $('input[name=_token]').val(),
                            'tahun_renja' : $('#tahun_rkpd').val(),
                            'id_unit' : $('#id_unit').val(),
                            'id_rkpd_ranwal' : $('#id_rkpd_ranwal').val(),
                          },
                          success: function(data) {
                                $.ajax({
                                    type: 'POST',
                                    url: './loadData/insertPelaksanaRenja',
                                    data: {
                                        '_token': $('input[name=_token]').val(),
                                        'tahun_renja' : $('#tahun_rkpd').val(),
                                        'id_unit' : $('#id_unit').val(),
                                        'id_rkpd_ranwal' : $('#id_rkpd_ranwal').val(),
                                    },
                                    success: function(data) {
                                        $.ajax({
                                            type: 'POST',
                                            url: './loadData/insertLokasiRenja',
                                            data: {
                                                '_token': $('input[name=_token]').val(),
                                                'tahun_renja' : $('#tahun_rkpd').val(),
                                                'id_unit' : $('#id_unit').val(),
                                                'id_rkpd_ranwal' : $('#id_rkpd_ranwal').val(),
                                            },
                                            success: function(data) {
                                                $.ajax({
                                                    type: 'POST',
                                                    url: './loadData/insertUsulanRenja',
                                                    data: {
                                                        '_token': $('input[name=_token]').val(),
                                                        'tahun_renja' : $('#tahun_rkpd').val(),
                                                        'id_unit' : $('#id_unit').val(),
                                                        'id_rkpd_ranwal' : $('#id_rkpd_ranwal').val(),
                                                    },
                                                    success: function(data) {                                                      
                                                      $.ajax({
                                                        type: 'POST',
                                                        url: './loadData/insertBelanjaRenja',
                                                        data: {
                                                          '_token': $('input[name=_token]').val(),
                                                          'tahun_renja' : $('#tahun_rkpd').val(),
                                                          'id_unit' : $('#id_unit').val(),
                                                          'id_rkpd_ranwal' : $('#id_rkpd_ranwal').val(),
                                                        },
                                                        success: function(data) {
                                                          createPesan(data.pesan,"success");
                                                          $('#tblProgramRKPD').DataTable().ajax.reload();
                                                          $('#ModalProgress').modal('hide');
                                                        },
                                                        error: function(data){
                                                          createPesan(data.pesan,"danger");
                                                          $('#tblProgramRKPD').DataTable().ajax.reload();
                                                          $('#ModalProgress').modal('hide');
                                                        }
                                                      });
                                                    },
                                                });
                                            },
                                        });
                                    },
                                });
                            },                    
                        });
                    },
                });
            },
        });
    },
});

});

$(document).on('click', '#btnUnloadRenja', function() {

  var data = programrkpd.row( $(this).parents('tr') ).data();

    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $('#ModalProgress').modal('show');

    $.ajax({
        type: 'POST',
        url: './loadData/unLoadProgramRkpd',
        data: {
            '_token': $('input[name=_token]').val(),
            'tahun' : data.tahun_forum,
            'unit' : data.id_unit,
            'id_forum' : data.id_forum_rkpdprog,
        },
        success: function(data) {
            createPesan(data.pesan,"success");
            $('#tblProgramRKPD').DataTable().ajax.reload();
            $('#ModalProgress').modal('hide');
        },
        error: function(data){
            createPesan(data.pesan,"danger");
            $('#tblProgramRKPD').DataTable().ajax.reload();
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