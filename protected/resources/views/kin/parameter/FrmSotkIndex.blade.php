<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app4')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?php
                $this->title = 'Struktur Organisasi';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = '/home';
                $breadcrumb->begin();
                $breadcrumb->add(['url' => '/kinparam','label' => 'Parameter']);
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
            <h2 class="panel-title">Referensi Struktur Organisasi berdasarkan Eselon</h2>
          </div>

          <div class="panel-body">
            <div class='tabs-x tabs-above tab-bordered tabs-krajee'>
              <ul class="nav nav-tabs nav-justified" role="tablist">
                <li class="active"><a href="#tabUnit" aria-controls="urusan" role="tab" data-toggle="tab">Unit Organisasi</a></li>
                <li><a href="#tabLevel1" aria-controls="unit" role="tab-kv" data-toggle="tab">Jabatan Unit</a></li>
                <li><a href="#tabLevel2" aria-controls="subunit" role="tab-kv" data-toggle="tab">Sub Jabatan Unit</a></li>
                <li><a href="#tabLevel3" aria-controls="dataunit" role="tab-kv" data-toggle="tab">Sub Sub Jabatan Unit</a></li>
              </ul>
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="tabUnit">
                  <div class="col-md-12">
                  <br>
                  <table id="tblUnitSotk" class="table table-striped table-bordered table-responsive compact" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                                <th width="10%" style="text-align: center; vertical-align:middle">Kode Unit</th>
                                <th style="text-align: center; vertical-align:middle">Nama Unit Organisasi</th>
                                <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>                                        
                        </tbody>
                    </table> 
                  </div>  
                </div>  
                <div role="tabpanel" class="tab-pane fade in" id="tabLevel1">
                  <br>
                  <div class="col-md-12">
                      <div class="add">
                      <button id="btnAddLevel1" type="button" class="btnAddLevel1 btn btn-labeled btn-sm btn-success">
                      <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>Tambah Unit Level 1</button>
                  </div>
                      <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
                      <div class="table-responsive">
                        <table class="table table-striped table-bordered table-responsive compact">
                          <tbody>
                            <tr>
                              <td width="10%" style="text-align: left; vertical-align:top;">Unit</td>
                              <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd" id="ur_unit_level_1" align='left'></label></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      </form> 
                      <table id="tblLevel1" class="table table-striped table-bordered table-responsive compact" width="100%" cellspacing="0">
                            <thead>
                              <tr>
                                  <th width='5%' style="text-align: center; vertical-align:middle">No Urut</th>
                                  <th width='15%' style="text-align: center; vertical-align:middle">Tingkat Eselon</th>
                                  <th style="text-align: center; vertical-align:middle">Nama Jabatan Eselon</th>
                                  <th width='10%' style="text-align: center; vertical-align:middle">Aksi</th>
                              </tr>
                          </thead>
                          <tbody>                                        
                          </tbody>
                      </table>
                  </div> 
              </div>
              <div role="tabpanel" class="tab-pane fade in" id="tabLevel2">
                <br>
                  <div class="col-md-12">
                      <div class="add">
                      <button id="btnAddLevel2" type="button" class="btnAddLevel2 btn btn-labeled btn-sm btn-success">
                      <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>Tambah Unit Level 2</button>
                  </div>
                      <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
                        <table class="table table-striped table-bordered table-responsive compact">
                          <tbody>
                            <tr>
                              <td width="10%" style="text-align: left; vertical-align:top;">Unit</td>
                              <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd" id="ur_unit_level_2" align='left'></label></td>
                            </tr>
                            <tr>
                              <td width="10%" style="text-align: left; vertical-align:top;">Atasan Langsung</td>
                              <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd" id="ur_eselon_level1_2" align='left'></label></td>
                            </tr>
                          </tbody>
                        </table>
                      </form>
                      <table id="tblLevel2" class="table table-striped table-bordered table-responsive compact" width="100%" cellspacing="0">
                            <thead>
                              <tr>
                                  <th width='5%' style="text-align: center; vertical-align:middle">No Urut</th>
                                  <th width='15%' style="text-align: center; vertical-align:middle">Tingkat Eselon</th>
                                  <th style="text-align: center; vertical-align:middle">Nama Jabatan Eselon</th>
                                  <th width='10%' style="text-align: center; vertical-align:middle">Aksi</th>
                              </tr>
                          </thead>
                          <tbody>                                        
                          </tbody>
                      </table>
                  </div> 
              </div>
              <div role="tabpanel" class="tab-pane fade in" id="tabLevel3">
                <br>
                  <div class="col-md-12">
                      <div class="add">
                      <button id="btnAddLevel3" type="button" class="btnAddLevel3 btn btn-labeled btn-sm btn-success">
                      <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>Tambah Unit Level 3</button>
                  </div>
                      <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
                        <table class="table table-striped table-bordered table-responsive compact">
                          <tbody>
                              <tr>
                                <td width="15%" style="text-align: left; vertical-align:top;">Unit</td>
                                <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd" id="ur_unit_level_3" align='left'></label></td>
                              </tr>
                              <tr>
                                <td width="15%" style="text-align: left; vertical-align:top;">Atasan Atasan Langsung</td>
                                <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd" id="ur_eselon_level1_3" align='left'></label></td>
                              </tr>
                              <tr>
                                <td width="15%" style="text-align: left; vertical-align:top;">Atasan Langsung</td>
                                <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd" id="ur_eselon_level2_3" align='left'></label></td>
                              </tr>
                          </tbody>
                        </table>
                      </form>
                      <table id="tblLevel3" class="table table-striped table-bordered table-responsive compact" width="100%" cellspacing="0">
                            <thead>
                              <tr>
                                  <th width='5%' style="text-align: center; vertical-align:middle">No Urut</th>
                                  <th width='15%' style="text-align: center; vertical-align:middle">Tingkat Eselon</th>
                                  <th style="text-align: center; vertical-align:middle">Nama Jabatan Eselon</th>
                                  <th width='10%' style="text-align: center; vertical-align:middle">Aksi</th>
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

@include('kin.parameter.FrmSotkLevel1')
@include('kin.parameter.FrmSotkLevel2')
@include('kin.parameter.FrmSotkLevel3')

@endsection

@section('scripts')
<script  type="text/javascript" language="javascript" class="init">
$(document).ready(function() {

  $('[data-toggle="popover"]').popover();

  // function createPesan(message, type) {
  //     var html = '<div class="alert alert-' + type + ' alert-dismissable page-alert col-md-12">';    
  //     html += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
  //     html += message;
  //     html += '</div>';    
  //     $(html).hide().prependTo('#pesan').slideDown();
  // };

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

var id_unit_temp, level1_temp, level2_temp, level3_temp;
var unit_tbl, level1_tbl, level2_tbl, level3_tbl;

unit_tbl = $('#tblUnitSotk').DataTable({
                  processing: true,
                  serverSide: true,
                  dom : 'bfrtIp',
                  "pageLength": 50,
                  "autoWidth": false,
                  "ajax": {"url": "sotk/getUnitSotk"},
                  "columns": [                        
                        { data: 'urut', sClass: "dt-center",width:"5%"},
                        { data: 'kd_unit_display', sClass: "dt-center",width:"10%"},
                        { data: 'nm_unit'},
                        { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
    });
  
  $('#tblUnitSotk tbody').on( 'dblclick', 'tr', function () {
    var data = unit_tbl.row(this).data();
    id_unit_temp =  data.id_unit;

    $('.nav-tabs a[href="#tabLevel1"]').tab('show');
    $('#ur_unit_level_1').text(data.nm_unit+ '  (' + data.kd_unit_display + ')');
    LoadLevel1(id_unit_temp);
    // alert(id_unit_temp);
  });

  function LoadLevel1(id_unit){
  level1_tbl=$('#tblLevel1').DataTable({
                    processing: true,
                    serverSide: true,
                    dom : 'BfRtip',                  
                    autoWidth : false,
                    "ajax": {"url": "sotk/getSotkLevel1/"+id_unit},
                    "language": {
                        "decimal": ",",
                        "thousands": "."},
                    "columns": [
                          { data: 'urut','searchable': false, 'orderable':false, sClass: "dt-center", width :"5%"},
                          { data: 'eselon_display','searchable': false, sClass: "dt-center", width :"10%"},
                          { data: 'nama_eselon'},
                          { data: 'action', 'searchable': false, width :"10%", 'orderable':false, sClass: "dt-center" }
                        ],
                    "order": [[0, 'asc']],
                    "bDestroy": true
          });
  }

  function LoadLevel2(id_unit){
  level2_tbl=$('#tblLevel2').DataTable({
                    processing: true,
                    serverSide: true,
                    dom : 'BfRtip',                  
                    autoWidth : false,
                    "ajax": {"url": "sotk/getSotkLevel2/"+id_unit},
                    "language": {
                        "decimal": ",",
                        "thousands": "."},
                    "columns": [
                          { data: 'urut','searchable': false, 'orderable':false, sClass: "dt-center", width :"5%"},
                          { data: 'eselon_display','searchable': false, sClass: "dt-center", width :"10%"},
                          { data: 'nama_eselon3'},
                          { data: 'action', 'searchable': false, width :"10%", 'orderable':false, sClass: "dt-center" }
                        ],
                    "order": [[0, 'asc']],
                    "bDestroy": true
          });
  }

  function LoadLevel3(id_unit){
  level3_tbl=$('#tblLevel3').DataTable({
                    processing: true,
                    serverSide: true,
                    dom : 'BfRtip',                  
                    autoWidth : false,
                    "ajax": {"url": "sotk/getSotkLevel3/"+id_unit},
                    "language": {
                        "decimal": ",",
                        "thousands": "."},
                    "columns": [
                          { data: 'urut','searchable': false, 'orderable':false, sClass: "dt-center", width :"5%"},
                          { data: 'eselon_display','searchable': false, sClass: "dt-center", width :"10%"},
                          { data: 'nama_eselon4'},
                          { data: 'action', 'searchable': false, width :"10%", 'orderable':false, sClass: "dt-center" }
                        ],
                    "order": [[0, 'asc']],
                    "bDestroy": true
          });
  };

  $('#tblLevel1 tbody').on( 'dblclick', 'tr', function () {
    var data = level1_tbl.row(this).data();
    level1_temp =  data.id_sotk_es2;

    $('.nav-tabs a[href="#tabLevel2"]').tab('show');
    $('#ur_unit_level_2').text($('#ur_unit_level_1').text());
    $('#ur_eselon_level1_2').text(data.nama_eselon);
    LoadLevel2(level1_temp);
  });

  $('#tblLevel2 tbody').on( 'dblclick', 'tr', function () {
    var data = level2_tbl.row(this).data();
    level2_temp =  data.id_sotk_es3;

    $('.nav-tabs a[href="#tabLevel3"]').tab('show');
    $('#ur_unit_level_3').text($('#ur_unit_level_2').text());
    $('#ur_eselon_level1_3').text($('#ur_eselon_level1_2').text());
    $('#ur_eselon_level2_3').text(data.nama_eselon3);  
    LoadLevel3(level2_temp);
  });

  @include('kin.parameter.JsSotkLevel1');
  @include('kin.parameter.JsSotkLevel2');
  @include('kin.parameter.JsSotkLevel3');
  

});
</script>
@endsection
