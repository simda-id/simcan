<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app4')
<style>
 .realisasi {
    /* display: none; */
    /* visibility: hidden; */
    opacity: 0.3;
    pointer-events: none;
  }
</style>

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <?php
                $this->title = ' Pengukuran Kinerja Perangkat Daerah';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = '/';
                $breadcrumb->begin();
                $breadcrumb->add(['url' => '/real/es4','label' => 'Pengukuran Kinerja']);
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
        <div class="panel panel-warning">
          <div class="panel-heading">
            <h2 class="panel-title">Pengukuran Kinerja Perangkat Daerah</h2>
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
                <label for="cb_eselon_3" class="col-sm-2 control-label" align='left'>Unit Eselon 3:</label>
                <div class="col-sm-9">
                    <select class="form-control cb_eselon_3" name="cb_eselon_3" id="cb_eselon_3"></select>
                </div>
            </div>
            <div class="form-group">
                <label for="cb_eselon_4" class="col-sm-2 control-label" align='left'>Unit Eselon 4:</label>
                <div class="col-sm-9">
                    <select class="form-control cb_eselon_4" name="cb_eselon_4" id="cb_eselon_4"></select>
                </div>
              </div>             
            <div class="form-group">
              <label class="control-label col-sm-2"></label>
              <div class="col-sm-9">
                  <button type="button" class="btn btn-labeled btn-success btnAddDokumen">
                    <span class="btn-label"><i class="fa fa-plus fa-lg fa-fw"></i></span> Tambah Dokumen Realisasi
                  </button>  
              </div>
            </div>
            </form> 
          <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#dokumen" aria-controls="dokumen" role="tab" data-toggle="tab">Dokumen Realisasi</a></li>
            <li><a href="#sasaran" aria-controls="sasaran" role="tab" data-toggle="tab">Kegiatan</a></li>
            <li><a href="#indikator" aria-controls="indikator" role="tab" data-toggle="tab">Indikator</a></li>
          </ul>

          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="dokumen">
              <br>
              <table id='tblDokPerkin' class="table display table-striped table-bordered table-responsive" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                          <th width="5%" style="text-align: center; vertical-align:middle">Tahun Realisasi</th>
                          <th width="5%" style="text-align: center; vertical-align:middle">Triwulan</th>
                          <th width="15%" style="text-align: center; vertical-align:middle">No Dokumen Realisasi</th>
                          <th style="text-align: center; vertical-align:middle">Pejabat Pembuat Dokumen Realisasi</th>
                          <th width="50px" style="text-align: center; vertical-align:middle">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                  </tbody>
            </table>
            </div>
            <div role="tabpanel" class="tab-pane" id="sasaran">
              <br>
                  <div class="col-sm-9 ">
                      <button type="button" class="btn btn-labeled btn-primary btnProsesSasaran">
                        <span class="btn-label"><i class="fa fa-refresh fa-lg fa-fw"></i></span> Proses Realisasi 
                      </button>  
                  </div>
              <br>
                <table id="tblSasaran" class="table display table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
                      <thead>
                          <tr>
                            <th rowspan="2" width="2%" style="text-align: center; vertical-align:middle"></th>
                            <th rowspan="2" width="3%" style="text-align: center; vertical-align:middle">No Urut</th>                            
                            <th rowspan="2" width="5%" style="text-align: center; vertical-align:middle">Kode Kegiatan</th>
                            <th rowspan="2" style="text-align: center; vertical-align:middle">Uraian Kegiatan</th>
                            <th colspan="5" width="40%" style="text-align: center; vertical-align:middle">Pagu Kegiatan</th>                            
                            <th rowspan="2" width="5%" style="text-align: center; vertical-align:middle">Jumlah Indikator</th>
                            <th rowspan="2" width="5%" style="text-align: center; vertical-align:middle">Aksi</th>
                          </tr>
                          <tr> 
                              <th style="text-align: center; vertical-align:middle">Triwulan I</th>
                              <th style="text-align: center; vertical-align:middle">Triwulan II</th>                            
                              <th style="text-align: center; vertical-align:middle">Triwulan III</th>
                              <th style="text-align: center; vertical-align:middle">Triwulan IV</th>                           
                              <th style="text-align: center; vertical-align:middle">Total</th>
                          </tr>
                      </thead>
                      <tbody>
                      </tbody>
                </table>
              </div>
              <div role="tabpanel" class="tab-pane" id="indikator">
                  <br>
                    <table id="tblIndikator" class="table display table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
                          <thead>
                              <tr>
                                <th rowspan="2" width="2%" style="text-align: center; vertical-align:middle"></th>
                                <th rowspan="2" width="3%" style="text-align: center; vertical-align:middle">No Urut</th>
                                <th rowspan="2" style="text-align: center; vertical-align:middle">Uraian Indikator Kegiatan</th>
                                <th colspan="5" width="40%" style="text-align: center; vertical-align:middle">Target Kegiatan</th> 
                                <th rowspan="2" width="5%" style="text-align: center; vertical-align:middle">Aksi</th>
                              </tr>
                              <tr>
                                  <th style="text-align: center; vertical-align:middle">Triwulan I</th>
                                  <th style="text-align: center; vertical-align:middle">Triwulan II</th>                            
                                  <th style="text-align: center; vertical-align:middle">Triwulan III</th>
                                  <th style="text-align: center; vertical-align:middle">Triwulan IV</th>                           
                                  <th style="text-align: center; vertical-align:middle">Total</th>
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
  <table class="table table-striped display table-bordered table-responsive compact details-table" id="inSasaran-@{{id_real_kegiatan}}">
      <thead>
          <tr>
            <td style="text-align: center; vertical-align:middle"></td>
            <td width="10%" style="text-align: center; vertical-align:middle">Triwulan I</td>
            <td width="10%" style="text-align: center; vertical-align:middle">Triwulan II</td>
            <td width="10%" style="text-align: center; vertical-align:middle">Triwulan III</td>
            <td width="10%" style="text-align: center; vertical-align:middle">Triwulan IV</td>
            <td width="10%" style="text-align: center; vertical-align:middle"></td>
          </tr>        
        </thead>
      <tbody>      
      </tbody>
  </table>
</script>

<script id="details-inIndikator" type="text/x-handlebars-template">
  <table class="table table-striped display table-bordered table-responsive compact details-table" id="inIndikator-@{{id_real_indikator}}">
      <thead>
          <tr>
            <td style="text-align: center; vertical-align:middle"></td>
            <td width="10%" style="text-align: center; vertical-align:middle">Triwulan I</td>
            <td width="10%" style="text-align: center; vertical-align:middle">Triwulan II</td>
            <td width="10%" style="text-align: center; vertical-align:middle">Triwulan III</td>
            <td width="10%" style="text-align: center; vertical-align:middle">Triwulan IV</td>
            <td width="10%" style="text-align: center; vertical-align:middle"></td>
          </tr>        
        </thead>
      <tbody>      
      </tbody>
  </table>
</script>

@include('kin.real.es4.FrmRealDokumen')
@include('kin.real.es4.FrmRealProgramIndikator')
@include('kin.real.es4.FrmRealKegiatan')
@endsection

@section('scripts')
<script type="text/javascript" language="javascript" class="init">
$(document).ready(function() {
  
  
  var detInSasaran = Handlebars.compile($("#details-inSasaran").html());
  var detInIndikator = Handlebars.compile($("#details-inIndikator").html());

  var id_unit_temp;
  var id_tahun_temp;
  var id_eselon2_temp;
  var id_eselon3_temp;  
  var id_eselon4_temp;
  var id_real_kegiatan_temp;
  var triwulan_temp;
  
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

function realisasi(){  
  $('#real_t1').addClass('realisasi');
  $('#real_t2').addClass('realisasi');
  $('#real_t3').addClass('realisasi');
  $('#real_t4').addClass('realisasi');
  $('#real_indikator_t1').addClass('realisasi');
  $('#real_indikator_t2').addClass('realisasi');
  $('#real_indikator_t3').addClass('realisasi');
  $('#real_indikator_t4').addClass('realisasi');
};

$.ajax({
        type: "GET",
        url: 'es4/getUnit',
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

    $.ajax({
        type: "GET",
        url: 'es4/getPegawai',
        dataType: "json",
        success: function(data) {
          var j = data.length;
          var post, i;

          $('select[name="cb_pegawai"]').empty();
          $('select[name="cb_pegawai"]').append('<option value="-1">---Pilih Nama Pegawai---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="cb_pegawai"]').append('<option value="'+ post.id_pegawai +'">'+ post.nama_pegawai +'</option>');
          }
        }
    });

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
          "ajax": {"url": "./es4/getDokumen/"+$id_unit},
          "columns": [
                { data: 'no_urut', sClass: "dt-center"},
                { data: 'tahun', sClass: "dt-center"},
                { data: 'triwulan', sClass: "dt-center"},
                { data: 'no_dokumen', sClass: "dt-center"},
                { data: 'jabatan_penandatangan'},
                { data: 'action', 'searchable': false, 'orderable':false }
              ]
        });

      }

$('#tblDokPerkin tbody').on( 'dblclick', 'tr', function () {
  var data = tblDokPerkin.row(this).data();
    id_tahun_temp =  data.tahun;
    id_eselon3_temp = data.id_sotk_es3;
    id_eselon4_temp = data.id_sotk_es4;
    triwulan_temp = data.triwulan;

    $('.nav-tabs a[href="#sasaran"]').tab('show');
    loadSasaran(data.id_dokumen_real); 
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
          "ajax": {"url": "./es4/getSasaran/"+$id_dokumen},
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
                { data: 'kd_kegiatan', sClass: "dt-center"},
                { data: 'nm_kegiatan'},
                { data: 'pagu_t1', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
                { data: 'pagu_t2', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
                { data: 'pagu_t3', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
                { data: 'pagu_t4', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
                { data: 'pagu_tahun', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
                { data: 'jml_indikator', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},                
                { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
              ]
    });
  }

  var tblInSasaran;
    function initInSasaran(tableId, data) {
        tblInSasaran=$('#' + tableId).DataTable({
                processing: true,
                serverSide: true,
                ajax: data.details_url,
                dom : 'BFRTIP',
                autoWidth: false,
                "language": {
                          "decimal": ",",
                          "thousands": "."},
                "columns": [
                            { data: 'uraian', "width" : "50%",'searchable': false, 'orderable':false},
                            { data: 'real_t1', 
                                  render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right", "width" : "10%",'searchable': false, 'orderable':false},
                            { data: 'real_t2', 
                                  render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right", "width" : "10%",'searchable': false, 'orderable':false},
                            { data: 'real_t3', 
                                  render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right", "width" : "10%",'searchable': false, 'orderable':false},
                            { data: 'real_t4', 
                                  render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right", "width" : "10%",'searchable': false, 'orderable':false},
                            { data: 'kosong',"width" : "10%",'searchable': false, 'orderable':false, sClass: "dt-center"},                           
                            
                          ],
                "order": [[0, 'asc']],
                "bDestroy": true
            })
    }

  $('#tblSasaran tbody').on('click', 'td.details-control', function () {
      var tr = $(this).closest('tr');
      var row = tblSasaran.row( tr );
      var tableId = 'inSasaran-' + row.data().id_real_kegiatan;

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
    id_real_kegiatan_temp =  data.id_real_kegiatan;
    $('.nav-tabs a[href="#indikator"]').tab('show');
    loadIndikator(id_real_kegiatan_temp);   
        
  });


var tblIndikator
function loadIndikator($id_dokumen) {
  tblIndikator = $('#tblIndikator').DataTable( {
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
          "ajax": {"url": "./es4/getIndikatorSasaran/"+$id_dokumen},
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
                { data: 'nm_indikator'},
                { data: 'target_t1', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
                { data: 'target_t2', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
                { data: 'target_t3', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
                { data: 'target_t4', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
                { data: 'target_tahun', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},                
                { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
              ]
    });
  }

   var tblInIndikator;
    function initInIndikator(tableId, data) {
        tblInIndikator=$('#' + tableId).DataTable({
                processing: true,
                serverSide: true,
                ajax: data.details_url,
                dom : 'BFRTIP',
                autoWidth: false,
                "language": {
                          "decimal": ",",
                          "thousands": "."},
                "columns": [
                            { data: 'uraian', "width" : "50%",'searchable': false, 'orderable':false},
                            { data: 'real_t1', 
                                  render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right", "width" : "10%",'searchable': false, 'orderable':false},
                            { data: 'real_t2', 
                                  render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right", "width" : "10%",'searchable': false, 'orderable':false},
                            { data: 'real_t3', 
                                  render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right", "width" : "10%",'searchable': false, 'orderable':false},
                            { data: 'real_t4', 
                                  render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right", "width" : "10%",'searchable': false, 'orderable':false},
                            { data: 'kosong',"width" : "10%",'searchable': false, 'orderable':false, sClass: "dt-center"},                           
                            
                          ],
                "order": [[0, 'asc']],
                "bDestroy": true
            })
    }

  $('#tblIndikator tbody').on('click', 'td.details-control', function () {
      var tr = $(this).closest('tr');
      var row = tblIndikator.row( tr );
      var tableId = 'inIndikator-' + row.data().id_real_indikator;

      if (row.child.isShown()) {
          row.child.hide();
          tr.removeClass('shown');
      } else {
          row.child(detInIndikator(row.data())).show();
          initInIndikator(tableId, row.data());
          tr.addClass('shown');
          tr.next().find('td').addClass('no-padding bg-gray');
      }    
  });

  $('#tgl_perkin_dok_x').datepicker({
    altField: "#tgl_perkin_dok",
    altFormat: "yy-mm-dd", 
    dateFormat: "dd MM yy",
  });

  $('#btn').click(function() {
    $("#tgl_perkin_dok_x").focus();
  });

$( ".cb_pegawai" ).change(function() {
      $.ajax({
            type: "GET",
            url: 'es4/getPejabat/'+$('#cb_pegawai').val(),
            dataType: "json",
            success: function(data) {
              var j = data.length;
              var post, i;
              for (i = 0; i < j; i++) {
                post = data[i];
                $('#nama_penandatangan_dok').val(post.nama_pegawai);
                $('#nip_penandatangan_dok').val(buatNip(post.nip_pegawai));
                $('#pangkat_penandatangan_dok').val(post.pangkat_pegawai);
                $('#ur_penandatangan_dok').val(post.pangkat_display);
              }
            }
        });     
  });

  $( ".cb_unit_renstra" ).change(function() {    
    id_unit_temp = $( ".cb_unit_renstra" ).val();    
    $.ajax({
        type: "GET",
        url: 'es4/getEselon3/'+id_unit_temp,
        dataType: "json",
        success: function(data) {
          var j = data.length;
          var post, i;

          $('select[name="cb_eselon_3"]').empty();
          $('select[name="cb_eselon_3"]').append('<option value="-1">---Pilih Jabatan Bidang/Bagian---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="cb_eselon_3"]').append('<option value="'+ post.id_sotk_es3 +'">'+ post.nama_eselon +'</option>');
          }
        }
    });
  });

  $( ".cb_eselon_3" ).change(function() {    
    id_eselon3_temp = $( ".cb_eselon_3" ).val();
    $.ajax({
        type: "GET",
        url: 'es4/getEselon4/'+id_eselon3_temp,
        dataType: "json",
        success: function(data) {
          var j = data.length;
          var post, i;

          $('select[name="cb_eselon_4"]').empty();
          $('select[name="cb_eselon_4"]').append('<option value="-1">---Pilih Jabatan Eselon---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="cb_eselon_4"]').append('<option value="'+ post.id_sotk_es4 +'">'+ post.nama_eselon +'</option>');
          }
        }
    });
    
  });

  $( ".cb_eselon_4" ).change(function() {    
    id_eselon4_temp = $( ".cb_eselon_4" ).val();
    loadDokumen(id_eselon4_temp);
    getDokumen(0);   
    $.ajax({
        type: "GET",
        url: 'es4/getEselon4/'+id_eselon3_temp,
        dataType: "json",
        success: function(data) {
          var j = data.length;
          var post, i;

          $('select[name="cb_eselon_4a"]').empty();
          $('select[name="cb_eselon_4a"]').append('<option value="-1">---Pilih Jabatan Eselon---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="cb_eselon_4a"]').append('<option value="'+ post.id_sotk_es4 +'">'+ post.nama_eselon +'</option>');
          }
        }
    });
  });

  function getDokumen($tahun){
    $.ajax({
        type: "GET",
        url: 'es4/getDokumenEs2/'+id_eselon4_temp+'/'+$tahun,
        dataType: "json",
        success: function(data) {
          var j = data.length;
          var post, i;

          $('select[name="cb_no_perkin_dok"]').empty();
          $('select[name="cb_no_perkin_dok"]').append('<option value="-1">---Pilih Dokumen Perkin---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="cb_no_perkin_dok"]').append('<option value="'+ post.id_dokumen_perkin +'">'+ post.no_dokumen +'</option>');
          }
        }
    });
  };

  $( "#tahun_dok" ).change(function() {
      getDokumen($( "#tahun_dok" ).val());   
  });

  $(document).on('click', '.btnProsesSasaran', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
    
    $('#prosesbar').show();
    $.ajax({
        type: 'post',
        url: './es4/transSasaranRenstra',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_sotk_es4': id_eselon4_temp,
            'tahun': id_tahun_temp,
            'triwulan': triwulan_temp,
        },
        success: function(data) {
            tblSasaran.ajax.reload(null,false);
            $('#prosesbar').hide();
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }

        }
    });
  });

@include('kin.real.es4.JsRealDokumen')
@include('kin.real.es4.JsRealProgramIndikator')
@include('kin.real.es4.JsRealKegiatan')
});
</script>
@endsection
