<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app4')
<style>
  #radioBtn .notActive{
    color: #b5b6b7;
    background-color: #fff;
  }

  #radioBtn_prog .notActive{
    color: #b5b6b7;
    background-color: #fff;
  }

  #radioBtn_keg .notActive{
    color: #b5b6b7;
    background-color: #fff;
  }
</style>

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <?php
                $this->title = ' IKU Perangkat Daerah';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = '/';
                $breadcrumb->begin();
                $breadcrumb->add(['url' => '/iku','label' => 'IKU Perangkat Daerah']);
                $breadcrumb->add(['label' => $this->title]);
                $breadcrumb->end();
            ?>
      </div>
    </div>    
    <div id="pesan"></div>
    <div id="prosesbar" class="lds-spinner">
      <div></div><div></div><div></div><div></div>
      <div></div><div></div><div></div><div></div>
      <div></div><div></div><div></div><div></div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-danger">
          <div class="panel-heading">
            <h2 class="panel-title">Penetapan IKU Perangkat Daerah</h2>
          </div>
          <div class="panel-body"> 
            <form name="" class="form-horizontal" role="form" autocomplete='off' action="" method="post"> 
                <div class="form-group">
                    <label for="cb_unit_renstra" class="col-sm-2 control-label" align='left'>Unit Perangkat Daerah:</label>
                    <div class="col-sm-9">
                        <select class="form-control cb_unit_renstra" name="cb_unit_renstra" id="cb_unit_renstra"></select>
                    </div>
                  </div>              
                  <div class="form-group">
                    <label class="control-label col-sm-2"></label>
                    <div class="col-sm-9">
                        <button type="button" class="btn btn-labeled btn-success btnAddDokumen">
                          <span class="btn-label"><i class="fa fa-plus fa-lg fa-fw"></i></span> Tambah Dokumen Perkin
                        </button>  
                    </div>
                  </div>
            </form> 
          <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#dokumen" aria-controls="dokumen" role="tab" data-toggle="tab">Dokumen Iku</a></li>
            <li><a href="#sasaran" aria-controls="sasaran" role="tab" data-toggle="tab">Sasaran</a></li>
            <li><a href="#program" aria-controls="program" role="tab" data-toggle="tab">Program</a></li>
            <li><a href="#kegiatan" aria-controls="kegiatan" role="tab" data-toggle="tab">Kegiatan</a></li>
          </ul>

          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="dokumen">
              <br>
              <table id='tblDokPerkin' class="table display table-striped table-bordered table-responsive" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                          <th width="15%" style="text-align: center; vertical-align:middle">No Dokumen IKU</th>
                          <th style="text-align: center; vertical-align:middle">Uraian Dokumen IKU</th>
                          <th width="50px" style="text-align: center; vertical-align:middle">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                  </tbody>
            </table>
            </div>
            <div role="tabpanel" class="tab-pane" id="sasaran">
              <br>
                <form name="" class="form-horizontal" role="form" autocomplete='off' action="" method="post">                      
                    <div class="form-group">
                      <div class="col-sm-9">
                          <button type="button" class="btn btn-labeled btn-primary btnProsesSasaran">
                            <span class="btn-label"><i class="fa fa-refresh fa-lg fa-fw"></i></span> Proses Penetapan IKU OPD
                          </button>  
                      </div>
                    </div>
                </form> 
            <br>
                <table id="tblSasaran" class="table display table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
                      <thead>
                          <tr>
                            <th rowspan="2" width="2%" style="text-align: center; vertical-align:middle"></th>
                            <th rowspan="2" width="5%" style="text-align: center; vertical-align:middle">No Urut</th>   
                            <th rowspan="2" style="text-align: center; vertical-align:middle">Uraian Sasaran</th>                            
                            <th colspan="2" width="20%" style="text-align: center; vertical-align:middle">Jumlah Indikator</th>
                          </tr>
                          <tr>
                              <th width="10%" style="text-align: center; vertical-align:middle">IKU</th>
                              <th width="10%" style="text-align: center; vertical-align:middle">NON IKU</th>  
                          </tr>
                      </thead>
                      <tbody>
                      </tbody>
                </table>
              </div>
              <div role="tabpanel" class="tab-pane" id="program">
               <br>
                    <table id="tblProgram" class="table display table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
                          <thead>
                              <tr>
                                <th rowspan="2" width="2%" style="text-align: center; vertical-align:middle"></th>
                                <th rowspan="2" width="5%" style="text-align: center; vertical-align:middle">No Urut</th>   
                                <th rowspan="2" style="text-align: center; vertical-align:middle">Uraian Program</th>                            
                                <th colspan="2" width="20%" style="text-align: center; vertical-align:middle">Jumlah Indikator</th>
                              </tr>
                              <tr>
                                  <th width="10%" style="text-align: center; vertical-align:middle">IKU</th>
                                  <th width="10%" style="text-align: center; vertical-align:middle">NON IKU</th>  
                              </tr>
                          </thead>
                          <tbody>
                          </tbody>
                    </table>
              </div>
              <div role="tabpanel" class="tab-pane" id="kegiatan">
                      <br>
                        <table id="tblKegiatan" class="table display table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
                              <thead>
                                  <tr>
                                    <th rowspan="2" width="2%" style="text-align: center; vertical-align:middle"></th>
                                    <th rowspan="2" width="5%" style="text-align: center; vertical-align:middle">No Urut</th>   
                                    <th rowspan="2" style="text-align: center; vertical-align:middle">Uraian Kegiatan</th>                            
                                    <th colspan="2" width="20%" style="text-align: center; vertical-align:middle">Jumlah Indikator</th>
                                  </tr>
                                  <tr>
                                      <th width="10%" style="text-align: center; vertical-align:middle">IKU</th>
                                      <th width="10%" style="text-align: center; vertical-align:middle">NON IKU</th>  
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

<script id="details-inSasaran" type="text/x-handlebars-template">
  <table class="table table-striped display table-bordered table-responsive compact details-table" id="inSasaran-@{{id_sasaran_renstra}}">
      <thead>
        <tr>
          <th width="3%" style="text-align: center; vertical-align:middle">No Urut</th>
          <th style="text-align: center; vertical-align:middle">Uraian Indikator</th>
          <th width="5%" style="text-align: center; vertical-align:middle">Target</th>
          <th width="5%" style="text-align: center; vertical-align:middle">Satuan</th>
          <th width="10%" style="text-align: center; vertical-align:middle">Status IKU</th>
          <th width="5%" style="text-align: center; vertical-align:middle">Aksi</th>
        </tr>
      </thead>
      <tbody>        
      </tbody>
  </table>
</script>

<script id="details-inProgram" type="text/x-handlebars-template">
  <table class="table table-striped display table-bordered table-responsive compact details-table" id="inProgram-@{{id_program_renstra}}">
      <thead>
        <tr>
          <th width="3%" style="text-align: center; vertical-align:middle">No Urut</th>
          <th style="text-align: center; vertical-align:middle">Uraian Indikator</th>
          <th width="5%" style="text-align: center; vertical-align:middle">Target</th>
          <th width="5%" style="text-align: center; vertical-align:middle">Satuan</th>
          <th width="10%" style="text-align: center; vertical-align:middle">Status IKU</th>
          <th width="5%" style="text-align: center; vertical-align:middle">Aksi</th>
        </tr>
      </thead>
      <tbody>        
      </tbody>
  </table>
</script>

<script id="details-inKegiatan" type="text/x-handlebars-template">
  <table class="table table-striped display table-bordered table-responsive compact details-table" id="inKegiatan-@{{id_kegiatan_renstra}}">
      <thead>
        <tr>
          <th width="3%" style="text-align: center; vertical-align:middle">No Urut</th>
          <th style="text-align: center; vertical-align:middle">Uraian Indikator</th>
          <th width="5%" style="text-align: center; vertical-align:middle">Target</th>
          <th width="5%" style="text-align: center; vertical-align:middle">Satuan</th>
          <th width="10%" style="text-align: center; vertical-align:middle">Status IKU</th>
          <th width="5%" style="text-align: center; vertical-align:middle">Aksi</th>
        </tr>
      </thead>
      <tbody>        
      </tbody>
  </table>
</script>

@include('kin.iku.iku_unit.FrmIkuDokumen')
@include('kin.iku.iku_unit.FrmIkuSasaranIndikator')
@include('kin.iku.iku_unit.FrmIkuProgramIndikator')
@include('kin.iku.iku_unit.FrmIkuKegiatanIndikator')

@endsection

@section('scripts')
<script type="text/javascript" language="javascript" class="init">
$(document).ready(function() {
  
  
  var detInSasaran = Handlebars.compile($("#details-inSasaran").html());
  var detInProgram = Handlebars.compile($("#details-inProgram").html());
  var detInKegiatan = Handlebars.compile($("#details-inKegiatan").html());

  var id_dokumen_temp;
  var id_renstra_temp;
  var id_sasaran_temp;
  var id_program_temp;
  var id_kegiatan_temp;
  var id_iku_sasaran_temp;
  
  function formatTgl(val_tanggal){
      var formattedDate = new Date(val_tanggal);
      var d = formattedDate.getDate();
      var m = formattedDate.getMonth();
      var y = formattedDate.getFullYear();
      var m_names = new Array("Januari", "Februari", "Maret", 
        "April", "Mei", "Juni", "Juli", "Agustus", "September", 
        "Oktober", "November", "Desember")

      var tgl= d + " " + m_names[m] + " " + y;
      return tgl;
  }

  function hariIni(){
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();

    var hariIni = yyyy + '-' + mm + '-' + dd;
    return hariIni;
  }

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
  $('#prosesbar').hide();
  $('[data-toggle="popover"]').popover();
  $('.number').number(true,0,',', '.');
  $('#tahun_dok').number(true,0,',', '');

  $('.page-alert .close').click(function(e) {
          e.preventDefault();
          $(this).closest('.page-alert').slideUp();
  });
      
    
function buatNip(string){
  return string.replace(/(\d{8})(\d{6})(\d{1})(\d{3})/,"$1 $2 $3 $4");
}

function nilaiNip(string){
  return string.replace(/\D/g,'').substring(0, 20);
}

$.ajax({
        type: "GET",
        url: '../perkin/getUnit',
        dataType: "json",
        success: function(data) {
          var j = data.length;
          var post, i;

          $('select[name="cb_unit_renstra"]').empty();
          $('select[name="cb_unit_renstra"]').append('<option value="-1">---Pilih Unit---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="cb_unit_renstra"]').append('<option value="'+ post.id_unit +'">'+ post.nm_unit +'</option>');
          }
        }
    });

function loadRenstra($id_unit) {
  $.ajax({
    type: "GET",
    url: '../cetak/getDokumenRenstra/'+$id_unit,
    dataType: "json",
    success: function(data) {
        var j = data.length;
        var post, i;

        $('select[name="cb_no_perda"]').empty();
        $('select[name="cb_no_perda"]').append('<option value="-1">Pilih Nomor Dokumen Renstra</option>');

        for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="cb_no_perda"]').append('<option value="'+ post.id_renstra +'">'+ post.nomor_renstra +'</option>');

        }
    }
  });
};

var tblDokPerkin
function loadDokumen($id_unit) {
tblDokPerkin = $('#tblDokPerkin').DataTable( {
          processing: true,
          serverSide: true,
          dom: 'BFrtip',
          responsive: true,                
          autoWidth : false,
          order: [[0, 'asc']],
          bDestroy: true,
          language: {
                "decimal": ",",
                "thousands": "."},
          "ajax": {"url": "./opd/getDokumen/"+$id_unit},
          "columns": [
                { data: 'no_urut', sClass: "dt-center"},
                { data: 'no_dokumen', sClass: "dt-center"},
                { data: 'uraian_dokumen'},
                { data: 'action', 'searchable': false, 'orderable':false }
              ]
        });

      }

$( ".cb_unit_renstra" ).change(function() {    
    id_unit_temp = $( ".cb_unit_renstra" ).val();
    loadDokumen(id_unit_temp);
    loadRenstra(id_unit_temp);  
    
  });

$('#tblDokPerkin tbody').on( 'dblclick', 'tr', function () {
  var data = tblDokPerkin.row(this).data();
    id_dokumen_temp =  data.id_dokumen;
    id_renstra_temp = data.id_renstra;

    $('.nav-tabs a[href="#sasaran"]').tab('show');
    loadSasaran(data.id_dokumen);  

});

var tblSasaran
function loadSasaran($id_dokumen) {
  tblSasaran = $('#tblSasaran').DataTable( {
          processing: true,
          serverSide: true,
          dom: 'BFrtip',
          responsive: true,                
          autoWidth : false,
          order: [[0, 'asc']],
          bDestroy: true,
          language: {
                "decimal": ",",
                "thousands": "."},
          "ajax": {"url": "./opd/getSasaran/"+$id_dokumen},
          "columns": [
                {
                  "className":      'details-control',
                  "orderable":      false,
                  "searchable":      false,
                  "data":           null,
                  "defaultContent": '',
                  "width" : "5px"
                },
                { data: 'urut', sClass: "dt-center"},
                { data: 'uraian_sasaran_renstra'},
                { data: 'jml_indikator_iku', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
                { data: 'jml_indikator_non', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
              ],          
          "order": [[1, 'ASC']],
    });
  }

  var tblInSasaran;
    function initInSasaran(tableId, data) {
        tblInSasaran=$('#' + tableId).DataTable({
                processing: true,
                serverSide: true,
                ajax: data.details_url,
                dom : 'BfRtIp',
                autoWidth: false,
                "language": {
                          "decimal": ",",
                          "thousands": "."},
                "columns": [
                            { data: 'urut', sClass: "dt-center"},
                            { data: 'nm_indikator'},
                            { data: 'angka_akhir_periode', 
                                  render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
                            { data: 'uraian_satuan', sClass: "dt-center"},
                            { data: 'uraian','searchable': false, 'orderable':false, sClass: "dt-center",
                              render: function(data, type, row,meta) {
                              return row.flag_display + '  <i class="'+row.status_icon+'" style="font-size:16px;color:'+row.warna+';"/>';
                            }},
                            // { data: 'nama_unit', sClass: "dt-center"},
                            { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
                          ],
                "order": [[0, 'asc']],
                "bDestroy": true
            })
    }

  $('#tblSasaran tbody').on('click', 'td.details-control', function () {
      var tr = $(this).closest('tr');
      var row = tblSasaran.row( tr );
      var tableId = 'inSasaran-' + row.data().id_sasaran_renstra;

      if (row.child.isShown()) {
          row.child.hide();
          tr.removeClass('shown');
      } else {
          row.child(detInSasaran(row.data())).show();
          initInSasaran(tableId, row.data());
          tr.addClass('shown');
          tr.next().find('td').addClass('no-padding bg-gray');
      }    
  });

  $('#tblSasaran tbody').on( 'dblclick', 'tr', function () {
  var data = tblSasaran.row(this).data();
    id_sasaran_temp = data.id_sasaran_renstra;

    $('.nav-tabs a[href="#program"]').tab('show');
    loadProgram(id_sasaran_temp);

    $.ajax({
        type: "GET",
        url: 'opd/getEselon3/'+id_unit_temp,
        dataType: "json",
        success: function(data) {
          var j = data.length;
          var post, i;

          $('select[name="unit_esl3"]').empty();
          $('select[name="unit_esl3"]').append('<option value="-1">---Pilih Jabatan Eselon---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="unit_esl3"]').append('<option value="'+ post.id_sotk_es3 +'">'+ post.nama_eselon +'</option>');
          }
        }
    });  

  });

  var tblProgram
  function loadProgram($id_dokumen) {
  tblProgram = $('#tblProgram').DataTable( {
          processing: true,
          serverSide: true,
          dom: 'BFrtip',
          responsive: true,                
          autoWidth : false,
          order: [[0, 'asc']],
          bDestroy: true,
          language: {
                "decimal": ",",
                "thousands": "."},
          "ajax": {"url": "./opd/getProgram/"+$id_dokumen},
          "columns": [
                {
                  "className":      'details-control',
                  "orderable":      false,
                  "searchable":      false,
                  "data":           null,
                  "defaultContent": '',
                  "width" : "5px"
                },
                { data: 'urut', sClass: "dt-center"},
                { data: 'uraian_program_renstra'},
                { data: 'jml_indikator_iku', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
                { data: 'jml_indikator_non', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
              ]
    });
  }

  var tblInProgram;
    function initInProgram(tableId, data) {
        tblInProgram=$('#' + tableId).DataTable({
                processing: true,
                serverSide: true,
                ajax: data.details_url,
                dom : 'BfRtIp',
                autoWidth: false,
                "language": {
                          "decimal": ",",
                          "thousands": "."},
                "columns": [
                            { data: 'urut', sClass: "dt-center"},
                            { data: 'nm_indikator'},
                            { data: 'angka_akhir_periode', 
                                  render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
                            { data: 'uraian_satuan', sClass: "dt-center"},
                            { data: 'uraian','searchable': false, 'orderable':false, sClass: "dt-center",
                              render: function(data, type, row,meta) {
                              return row.flag_display + '  <i class="'+row.status_icon+'" style="font-size:16px;color:'+row.warna+';"/>';
                            }},
                            { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
                          ],
                "order": [[0, 'asc']],
                "bDestroy": true
            })
    }

  $('#tblProgram tbody').on('click', 'td.details-control', function () {
      var tr = $(this).closest('tr');
      var row = tblProgram.row( tr );
      var tableId = 'inProgram-' + row.data().id_program_renstra;

      if (row.child.isShown()) {
          row.child.hide();
          tr.removeClass('shown');
      } else {
          row.child(detInProgram(row.data())).show();
          initInProgram(tableId, row.data());
          tr.addClass('shown');
          tr.next().find('td').addClass('no-padding bg-gray');
      }    
  });

  $('#tblProgram tbody').on( 'dblclick', 'tr', function () {
    var data = tblProgram.row(this).data();
    id_program_temp = data.id_program_renstra;

    $('.nav-tabs a[href="#kegiatan"]').tab('show');
    loadKegiatan(id_program_temp); 

    $.ajax({
        type: "GET",
        url: 'opd/getEselon4/'+id_unit_temp,
        dataType: "json",
        success: function(data) {
          var j = data.length;
          var post, i;

          $('select[name="unit_esl4"]').empty();
          $('select[name="unit_esl4"]').append('<option value="-1">---Pilih Jabatan Eselon---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="unit_esl4"]').append('<option value="'+ post.id_sotk_es4 +'">'+ post.nama_eselon +'</option>');
          }
        }
    }); 

  });

  var tblKegiatan
  function loadKegiatan($id_dokumen) {
  tblKegiatan = $('#tblKegiatan').DataTable( {
          processing: true,
          serverSide: true,
          dom: 'BFrtip',
          responsive: true,                
          autoWidth : false,
          order: [[0, 'asc']],
          bDestroy: true,
          language: {
                "decimal": ",",
                "thousands": "."},
          "ajax": {"url": "./opd/getKegiatan/"+$id_dokumen},
          "columns": [
                {
                  "className":      'details-control',
                  "orderable":      false,
                  "searchable":      false,
                  "data":           null,
                  "defaultContent": '',
                  "width" : "5px"
                },
                { data: 'urut', sClass: "dt-center"},
                { data: 'uraian_kegiatan_renstra'},
                { data: 'jml_indikator_iku', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
                { data: 'jml_indikator_non', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
              ]
    });
  }

  var tblInKegiatan;
    function initInKegiatan(tableId, data) {
        tblInKegiatan=$('#' + tableId).DataTable({
                processing: true,
                serverSide: true,
                ajax: data.details_url,
                dom : 'BfRtIp',
                autoWidth: false,
                "language": {
                          "decimal": ",",
                          "thousands": "."},
                "columns": [
                            { data: 'urut', sClass: "dt-center"},
                            { data: 'nm_indikator'},
                            { data: 'angka_akhir_periode', 
                                  render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
                            { data: 'uraian_satuan', sClass: "dt-center"},
                            { data: 'uraian','searchable': false, 'orderable':false, sClass: "dt-center",
                              render: function(data, type, row,meta) {
                              return row.flag_display + '  <i class="'+row.status_icon+'" style="font-size:16px;color:'+row.warna+';"/>';
                            }},
                            { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
                          ],
                "order": [[0, 'asc']],
                "bDestroy": true
            })
    }

  $('#tblKegiatan tbody').on('click', 'td.details-control', function () {
      var tr = $(this).closest('tr');
      var row = tblKegiatan.row( tr );
      var tableId = 'inKegiatan-' + row.data().id_kegiatan_renstra;

      if (row.child.isShown()) {
          row.child.hide();
          tr.removeClass('shown');
      } else {
          row.child(detInKegiatan(row.data())).show();
          initInKegiatan(tableId, row.data());
          tr.addClass('shown');
          tr.next().find('td').addClass('no-padding bg-gray');
      }    
  });
  
  $('#tgl_iku_dok_x').datepicker({
    altField: "#tgl_iku_dok",
    altFormat: "yy-mm-dd", 
    dateFormat: "dd MM yy",
  });

  $('#btn').click(function() {
    $("#tgl_iku_dok_x").focus();
  });


  $(document).on('click', '.btnProsesSasaran', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
    
    $('#prosesbar').show();
    $.ajax({
        type: 'post',
        url: './opd/transIndikatorSasaran',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_dokumen': id_dokumen_temp,
            'id_renstra': id_renstra_temp,
            'id_unit': id_unit_temp,
        },
        success: function(data) {
            tblSasaran.ajax.reload(null,false);
            $('#prosesbar').hide();
            if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
            };
        }
    });
  });

  $('#radioBtn a').on('click', function(){
    var sel = $(this).data('title');
    var tog = $(this).data('toggle');
    $('#'+tog).prop('value', sel);
    
    $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
    $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
  });

  $('#radioBtn_prog a').on('click', function(){
    var sel = $(this).data('title');
    var tog = $(this).data('toggle');
    $('#'+tog).prop('value', sel);
    
    $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
    $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
  });

  $('#radioBtn_keg a').on('click', function(){
    var sel = $(this).data('title');
    var tog = $(this).data('toggle');
    $('#'+tog).prop('value', sel);
    
    $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
    $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
  });

  

  @include('kin.iku.iku_unit.JsIkuDokumen')
  @include('kin.iku.iku_unit.JsIkuSasaranIndikator')
  @include('kin.iku.iku_unit.JsIkuProgramIndikator')
  @include('kin.iku.iku_unit.JsIkuKegiatanIndikator')

});
</script>
@endsection
