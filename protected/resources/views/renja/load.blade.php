<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
                $this->title = 'Load dan Proses Data Renja';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = 'modul2';
                $breadcrumb->begin();
                $breadcrumb->add(['label' => 'Renja']);
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
                    <label for="tahun_rkpd" class="col-sm-2 control-label text-left" align='left'>Tahun Perencanaan :</label>
                        <div class="col-sm-2">                            
                            <input class="form-control text-center" type="text" id="tahun_rkpd" name="tahun_rkpd" value="{{Session::get('tahun')}}" disabled>
                        </div>
                        <button id="btnProses" type="button" class="btnProses btn btn-labeled btn-sm btn-primary">
                                      <span class="btn-label"><i class="glyphicon glyphicon-download-alt"></i></span>Proses Load Data dari Rancangan Awal RKPD</button>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2 text-left" for="id_unit">Unit Penyusun Renja :</label>
                        <div class="col-sm-5">
                            <select class="form-control id_Unit" name="id_unit" id="id_unit"></select>
                        </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2 text-left" for="id_rkpd_ranwal">Program Ranwal :</label>
                        <div class="col-sm-7">
                            <select class="form-control id_rkpd_ranwal" name="id_rkpd_ranwal" id="id_rkpd_ranwal"></select>
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
                                <table id="tblProgramRKPD" class="table table-striped table-bordered table-responsive">
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
                            </div>
                            <div role="tabpanel" class="tab-pane fade in" id="rekap">
                                    <table id="tblRekap" class="table table-striped table-bordered table-responsive">
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
                                </div>
                        </div>
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

    
var programrkpd = $('#tblProgramRKPD').DataTable({
                  processing: true,
                  serverSide: true,
                  dom : 'BFRtIp',
                  "ajax": {"url": "./getProgramRkpd/0/0"},
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

$( "#id_unit" ).change(function() {
  $('#tblProgramRKPD').DataTable().ajax.url("./getProgramRkpd/"+$('#tahun_rkpd').val()+"/"+$('#id_unit').val()).load();
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
            $('select[name="id_rkpd_ranwal"]').append('<option value="'+ post.id_rkpd_ranwal +'">'+ post.uraian_program_rpjmd +'</option>');
          }
          }
    }); 
});

// $("#id_rkpd_ranwal").change(function(){
//     $('#tblProgramRKPD').DataTable().ajax.url("./getProgramRkpd/"+$('#tahun_rkpd').val()+"/"+$('#id_unit').val()).load();
// });

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

$(document).on('click', '.btnProses', function() {

    var tahun =$('#tahun_rkpd').val();
    var unit =$('#id_unit').val();
    var ranwal =$('#id_rkpd_ranwal').val();

    $('#ModalProgress').modal('show');

    $.ajaxSetup({
          headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: "post",
        url: './transProgramRKPD',
        data: {
                '_token': $('input[name=_token]').val(),
                'tahun_renja' : tahun ,
                'id_unit' : unit,
                'id_rkpd_ranwal' : ranwal,
            },
        success: function(data) {
        $.ajax({
        type: "post",
        url: './transProgramRenja',
        data: {
                '_token': $('input[name=_token]').val(),
                'tahun_renja' : tahun ,
                'id_unit' : unit,
                'id_rkpd_ranwal' : ranwal,
            },
        success: function(data) {

                $.ajax({
                    type: "post",
                    url: './transProgramIndikatorRenja',
                    data: {
                            '_token': $('input[name=_token]').val(),
                            'tahun_renja' : tahun ,
                            'id_unit' : unit,
                            'id_rkpd_ranwal' : ranwal,
                        },
                    });
                $.ajax({
                    type: 'post',
                    url: './transKegiatanRenja',
                    data: {
                            '_token': $('input[name=_token]').val(),
                            'tahun_renja' : tahun ,
                            'id_unit' : unit,
                            'id_rkpd_ranwal' : ranwal,
                        },
                    success: function(data) {
                            $.ajax({
                            type: "post",
                            url: './transKegiatanIndikatorRenja',
                            data: {
                                    '_token': $('input[name=_token]').val(),
                                    'tahun_renja' : tahun ,
                                    'id_unit' : unit,
                                    'id_rkpd_ranwal' : ranwal,
                                },
                            success: function(data) { 
                                if(data.status_pesan==1){
                                    createPesan(data.pesan,"success");
                                    $('#tblProgramRKPD').DataTable().ajax.url("./getProgramRkpd/"+$('#tahun_rkpd').val()+"/"+$('#id_unit').val()).load();
                                    $('#ModalProgress').modal('hide');
                                    } else {
                                    createPesan(data.pesan,"danger");
                                    $('#ModalProgress').modal('hide');
                                    }
                                }
                            });
                        }
                    })
                }
            });
        }
    });
});

$(document).on('click', '.unloadRenja', function() {

$('#ModalProgress').modal('show');

$.ajaxSetup({
    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});

$.ajax({
      type: 'post',
      url: './unloadRenja',
      data: {
        '_token': $('input[name=_token]').val(),
        'tahun_renja' : $(this).data('tahun_renja') ,
        'id_unit' : $(this).data('id_unit'),
        'id_rkpd_ranwal' : $(this).data('id_rkpd_ranwal')
      },
      success: function(data) {
        if(data.status_pesan==1){
            createPesan(data.pesan,"success")
            $('#tblProgramRKPD').DataTable().ajax.reload();
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