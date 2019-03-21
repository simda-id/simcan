<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?php
                $this->title = 'Forum Perangkat Daerah';
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
                    <p><h2 id="judul" class="panel-title"> {{ $this->title }}</h2></p>
                </div>
            <div class="panel-body">
                <form name="" class="form-horizontal" role="form" autocomplete='off' action="" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="tahun_rkpd" class="col-sm-3 control-label text-left" align='left'>Tahun Perencanaan :</label>
                        <div class="col-sm-2">                            
                            <input class="form-control text-center" type="text" id="tahun_rkpd" name="tahun_rkpd" value="{{Session::get('tahun')}}" disabled>
                        </div>
                </div>
                </form>
                <div class='tabs-x tabs-above tab-bordered tabs-krajee'>
                    <ul class="nav nav-tabs nav-justified" role="tablist">
                      <li class="active"><a href="#programrkpd" aria-controls="programrkpd" role="tab" data-toggle="tab">Program RKPD</a></li>
                      <li class="disabled"><a href="#pelaksana" aria-controls="pelaksana" role="tab-kv" data-toggle="tab">Unit Pelaksana</a></li>
                      <li class="disabled"><a href="#program" aria-controls="program" role="tab-kv" data-toggle="tab">Program PD</a></li>
                    </ul>
                    
                    <div class="tab-content">
                    <br>
                    <div role="tabpanel" class="tab-pane fade in active" id="programrkpd">
                                <div class="col-md-12">
                                  <div class="add hidden">
                                    <button id="btnPostingProgRKPD" type="button" class="post-ProgRKPD btn btn-labeled btn-primary"><span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Posting Program RKPD</button>
                                  </div>
                                    <table id="tblProgramRKPD" class="table table-striped table-bordered table-responsive compact" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="5px" rowspan="3" style="text-align: center; vertical-align:middle"></th>
                                            <th width="5px" rowspan="3" style="text-align: center; vertical-align:middle">No Urut</th>
                                            <th rowspan="3" style="text-align: center; vertical-align:middle">Nama Program RKPD</th>
                                            <th colspan="8" style="text-align: center; vertical-align:middle">Rincian Data</th>
                                            <th width="15px" rowspan="3" style="text-align: center; vertical-align:middle">Status</th>
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
                            <div role="tabpanel" class="tab-pane fade in" id="pelaksana">
                              <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
                              <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                  <tbody>
                                      <tr>
                                        <td width="20%" style="text-align: left; vertical-align:top;">Program Ranwal RKPD</td>
                                        <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd" id="nm_progrkpd_pelaksana" align='left'></label></td>
                                      </tr>
                                  </tbody>
                                </table>
                              </div>
                              </form>
                                    <table id="tblPelaksana" class="table table-striped table-bordered table-responsive compact" width="100%">
                                        <thead>
                                            <tr>
                                                <th width="5px" rowspan="3" style="text-align: center; vertical-align:middle">No Urut</th>
                                                <th rowspan="3" style="text-align: center; vertical-align:middle">Bidang Pemerintahan</th>
                                                <th rowspan="3" style="text-align: center; vertical-align:middle">Unit Pelaksana</th>
                                                <th colspan="6" style="text-align: center; vertical-align:middle">Rincian Data</th>
                                            </tr>
                                            <tr>
                                                <th colspan="2" style="text-align: center; vertical-align:middle">Program SKPD</th>  
                                                <th colspan="2" style="text-align: center; vertical-align:middle">Kegiatan SKPD</th>
                                                <th colspan="2" style="text-align: center; vertical-align:middle">Aktivitas SKPD</th>
                                            </tr>
                                            <tr>                                            
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
                            <div role="tabpanel" class="tab-pane fade in" id="program">
                                <div class="col-md-12">
                                    <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
                                    <div class="table-responsive">
                                      <table class="table table-striped table-bordered">
                                        <tbody>
                                          <tr>
                                            <td width="20%" style="text-align: left; vertical-align:top;">Program Ranwal RKPD</td>
                                            <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd" id="nm_program_progrenja" align='left'></label></td>
                                          </tr>
                                          <tr>
                                            <td width="20%" style="text-align: left; vertical-align:top;">Unit Pelaksana</td>
                                            <td style="text-align: left; vertical-align:top;"><label class="back2pelaksana" id="nm_unit_pelaksana" align='left'></label></td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </div>
                                    </form>
                                    <table id="tblProgram" class="table table-striped table-bordered table-responsive compact" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th width="5px" rowspan="3" style="text-align: center; vertical-align:middle">No Urut</th>
                                                <th rowspan="3" style="text-align: center; vertical-align:middle">Uraian Program Perangkat Daerah</th>
                                                <th colspan="5" style="text-align: center; vertical-align:middle">Rincian Data</th>
                                            </tr>
                                            <tr>
                                                <th rowspan="2" style="text-align: center; vertical-align:middle">Pagu Program</th>  
                                                <th colspan="2" style="text-align: center; vertical-align:middle">Kegiatan SKPD</th>
                                                <th colspan="2" style="text-align: center; vertical-align:middle">Aktivitas SKPD</th>
                                            </tr>
                                            <tr> 
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
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>

$(document).ready(function(){


var ProgRkpd_temp,id_ProgRkpd_temp, id_progrenja_temp,ur_progrenja_temp;

$('[data-toggle="popover"]').popover();

$('.number').number(true,2,',', '.');

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

$(".disabled").click(function (e) {
        e.preventDefault();
        return false;
});


function back2Rkpd(){
  $('.nav-tabs a[href="#programrkpd"]').tab('show');
}

$(document).on('click', '.backProgRkpd', function() {
  back2Rkpd();
});

function back2renja(){
  $('.nav-tabs a[href="#program"]').tab('show');
}

$(document).on('click', '.backRenja', function() {
  back2renja();
});

function back2pelaksana(){
  $('.nav-tabs a[href="#pelaksana"]').tab('show');
}

$(document).on('click', '.backPelaksana', function() {
  back2pelaksana();
});

var prog_rkpd_tbl;
$('#tblProgramRKPD').DataTable({
  dom : 'BfRtip',
  autoWidth : false,
  bDestroy: true
});

function loadTblProgRkpd(){
  prog_rkpd_tbl = $('#tblProgramRKPD').DataTable({
                  processing: true,
                  serverSide: true,
                  dom : 'BfRtip',
                  "autoWidth": false,
                  "ajax": {
                      "url": "./verifikasi/getProgramRkpdForum/"+{{Session::get('tahun')}}
                    },
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
                        { data: 'id_rkpd_ranwal', sClass: "dt-center",width:"3px"},
                        { data: 'no_urut', sClass: "dt-center",width:"5px"},
                        { data: 'uraian_program_rpjmd'},
                        { data: 'jml_pagu_ranwal', sClass: "dt-center",width:"50px",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'jml_unit', sClass: "dt-center",width:"15px",
                            render: $.fn.dataTable.render.number( '.', ',', 0, '' )},
                        { data: 'jml_prog_opd', sClass: "dt-center",width:"15px",
                            render: $.fn.dataTable.render.number( '.', ',', 0, '' )},
                        { data: 'jml_pagu_program', sClass: "dt-center",width:"50px",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'jml_keg_opd', sClass: "dt-center",width:"15px",
                            render: $.fn.dataTable.render.number( '.', ',', 0, '' )},
                        { data: 'jml_pagu_kegiatan', sClass: "dt-center",width:"50px",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'jml_aktivitas_opd', sClass: "dt-center",width:"15px",
                            render: $.fn.dataTable.render.number( '.', ',', 0, '' )},
                        { data: 'jml_pagu_aktivitas', sClass: "dt-center",width:"50px",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'icon','searchable': false, 'orderable':false, sClass: "dt-center",width:"15px",
                            render: function(data, type, row,meta) {
                            return '<i class="'+row.status_icon+'" style="font-size:16px;color:'+row.warna+';"/>';
                          }},
                        { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center",width:"50px" }
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
    });
}

loadTblProgRkpd();

$(document).on('click', '.btnViewProgSkpd', function() {

  var data = prog_rkpd_tbl.row( $(this).parents('tr') ).data();

  ProgRkpd_temp = data.uraian_program_rpjmd;
  id_ProgRkpd_temp = data.id_rkpd_ranwal;
  $('#nm_progrkpd_pelaksana').text(data.uraian_program_rpjmd);

  $('.nav-tabs a[href="#pelaksana"]').tab('show');
    
  loadTblPelaksana(id_ProgRkpd_temp);
  back2pelaksana();
});

$('#tblProgramRKPD tbody').on( 'dblclick', 'tr', function () {

    var data = prog_rkpd_tbl.row(this).data();

    ProgRkpd_temp = data.uraian_program_rpjmd;
    id_ProgRkpd_temp = data.id_rkpd_ranwal;
    $('#nm_progrkpd_pelaksana').text(data.uraian_program_rpjmd);

    $('.nav-tabs a[href="#pelaksana"]').tab('show');
    
    loadTblPelaksana(id_ProgRkpd_temp);
    back2pelaksana();

});

var pelaksana_tbl;
$('#tblPelaksana').DataTable({
  dom : 'BfRtip',
  autoWidth : false,
  bDestroy: true
});

function loadTblPelaksana(id_forum){
    pelaksana_tbl=$('#tblPelaksana').DataTable({
                  processing: true,
                  serverSide: true,
                  dom : 'BfRtip',
                  autoWidth : false,
                  "ajax": {"url": "./verifikasi/getUnitForumPD/"+id_forum},
                  "language": {
                      "decimal": ",",
                      "thousands": "."},
                  "columns": [
                        { data: 'no_urut', sClass: "dt-center"},
                        { data: 'nm_bidang'},
                        { data: 'nm_unit'},
                        { data: 'jml_prog_opd', sClass: "dt-center",width:"15px",
                            render: $.fn.dataTable.render.number( '.', ',', 0, '' )},
                        { data: 'jml_pagu_program', sClass: "dt-center",width:"50px",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'jml_keg_opd', sClass: "dt-center",width:"15px",
                            render: $.fn.dataTable.render.number( '.', ',', 0, '' )},
                        { data: 'jml_pagu_kegiatan', sClass: "dt-center",width:"50px",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'jml_aktivitas_opd', sClass: "dt-center",width:"15px",
                            render: $.fn.dataTable.render.number( '.', ',', 0, '' )},
                        { data: 'jml_pagu_aktivitas', sClass: "dt-center",width:"50px",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        });
}



$('#tblPelaksana tbody').on( 'dblclick', 'tr', function () {

  var data = pelaksana_tbl.row(this).data();

    id_progrenja_temp = data.id_forum_rkpdprog;

    $('#nm_program_progrenja').text($('#nm_progrkpd_pelaksana').text());
    $('#nm_unit_pelaksana').text(data.nm_bidang);

    $('.nav-tabs a[href="#program"]').tab('show');

    loadTblProgRenja(id_progrenja_temp);
    back2renja();

});

var prog_renja_tbl;
$('#tblProgram').DataTable({
  dom : 'BfRtip',
  autoWidth : false,
  bDestroy: true
});

function loadTblProgRenja(id_forum){
   prog_renja_tbl=$('#tblProgram').DataTable({
                  processing: true,
                  serverSide: true,
                  dom : 'BfRtip',
                  autoWidth : false,
                  "ajax": {"url": "./verifikasi/getProgForumPD/"+id_forum},
                  "language": {
                      "decimal": ",",
                      "thousands": "."},
                  "columns": [
                        { data: 'no_urut', sClass: "dt-center", width:"5px"},
                        { data: 'uraian_program_renstra'},
                        { data: 'jml_pagu_program', sClass: "dt-center",width:"50px",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'jml_keg_opd', sClass: "dt-center",width:"15px",
                            render: $.fn.dataTable.render.number( '.', ',', 0, '' )},
                        { data: 'jml_pagu_kegiatan', sClass: "dt-center",width:"50px",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'jml_aktivitas_opd', sClass: "dt-center",width:"15px",
                            render: $.fn.dataTable.render.number( '.', ',', 0, '' )},
                        { data: 'jml_pagu_aktivitas', sClass: "dt-center",width:"50px",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        });
}

$(document).on('click', '.post-ProgRKPD', function() {
  var data = prog_rkpd_tbl.row( $(this).parents('tr') ).data();
  var status_data;
  if(data.status_data == 0){
    status_data = 1;
  }; 
  if(data.status_data == 1){
    status_data = 0;
  };

    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      type: 'post',
      url: './verifikasi/postBappeda',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_rkpd_ranwal': data.id_rkpd_ranwal,
        'status_data':status_data,
      },
      success: function(data) {
        prog_rkpd_tbl.ajax.reload();
        if(data.status_pesan==1){
          createPesan(data.pesan,"success");
        } else {
          createPesan(data.pesan,"danger"); 
        }
      }
    });
});


});
</script>
@endsection