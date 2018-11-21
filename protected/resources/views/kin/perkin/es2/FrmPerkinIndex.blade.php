<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app4')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <?php
                $this->title = ' Penetapan Kinerja Perangkat Daerah';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = '/';
                $breadcrumb->begin();
                $breadcrumb->add(['url' => '/perkin','label' => 'Perencanaan Kinerja']);
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
            <h2 class="panel-title">Perencanaan Kinerja Perangkat Daerah</h2>
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
            <li class="active"><a href="#dokumen" aria-controls="dokumen" role="tab" data-toggle="tab">Dokumen Perkin</a></li>
            <li><a href="#sasaran" aria-controls="sasaran" role="tab" data-toggle="tab">Sasaran</a></li>
            <li><a href="#program" aria-controls="program" role="tab" data-toggle="tab">Program</a></li>
          </ul>

          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="dokumen">
              <br>
              <table id='tblDokPerkin' class="table display table-striped table-bordered table-responsive" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                          <th width="5%" style="text-align: center; vertical-align:middle">Tahun Perkin</th>
                          <th width="15%" style="text-align: center; vertical-align:middle">No Dokumen Perkin</th>
                          <th style="text-align: center; vertical-align:middle">Pejabat Pembuat Dokumen Perkin</th>
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
                      <label for="cb_dok_renstra" class="col-sm-2 control-label" align='left'>Nomor Dokumen Renstra:</label>
                      <div class="col-sm-9">
                          <select class="form-control cb_unit_renstra" name="cb_dok_renstra" id="cb_dok_renstra"></select>
                      </div>
                    </div>              
                    <div class="form-group">
                      <label class="control-label col-sm-2"></label>
                      <div class="col-sm-9">
                          <button type="button" class="btn btn-labeled btn-primary btnProsesSasaran">
                            <span class="btn-label"><i class="fa fa-refresh fa-lg fa-fw"></i></span> Proses Perkin 
                          </button>  
                      </div>
                    </div>
                </form> 
            <br>
                <table id="tblSasaran" class="table display table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
                      <thead>
                          <tr>
                            <th width="2%" style="text-align: center; vertical-align:middle"></th>
                            <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>                            
                            <th width="10%" style="text-align: center; vertical-align:middle">Kd Sasaran</th>
                            <th style="text-align: center; vertical-align:middle">Uraian Sasaran</th>                            
                            <th width="10%" style="text-align: center; vertical-align:middle">Jumlah Indikator</th>
                          </tr>
                      </thead>
                      <tbody>
                      </tbody>
                </table>
              </div> 

            <div role="tabpanel" class="tab-pane" id="program">
            <br>
              <br>
                <table id="tblProgram" class="table display table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th width="10%" style="text-align: center; vertical-align:middle">Kode Program</th>
                          <th style="text-align: center; vertical-align:middle">Uraian Program</th>
                          <th width="15%" style="text-align: center; vertical-align:middle">Pagu Program</th>
                          <th width="20%" style="text-align: center; vertical-align:middle">Pelaksana Program</th>
                          <th width="50px" style="text-align: center; vertical-align:middle">Aksi</th>
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
  <table class="table table-striped display table-bordered table-responsive compact details-table" id="inSasaran-@{{id_perkin_sasaran}}">
      <thead>
        <tr>
          <th rowspan="2" width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
          <th rowspan="2" style="text-align: center; vertical-align:middle">Uraian Indikator</th>
          <th colspan="5" width="50%" style="text-align: center; vertical-align:middle">Target</th>
          <th rowspan="2" width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
        </tr>
        <tr>
            <th width="10%" style="text-align: center; vertical-align:middle">Triwulan I</th>
            <th width="10%" style="text-align: center; vertical-align:middle">Triwulan II</th>
            <th width="10%" style="text-align: center; vertical-align:middle">Triwulan III</th>
            <th width="10%" style="text-align: center; vertical-align:middle">Triwulan IV</th>
            <th width="10%" style="text-align: center; vertical-align:middle">Total</th>
          </tr>
      </thead>
      <tbody>        
      </tbody>
  </table>
</script>

<script id="details-inProgram" type="text/x-handlebars-template">
  <table class="table table-striped display table-bordered table-responsive compact details-table" id="inProgram-@{{id_program_rpjmd}}">
      <thead>
        <tr>
          <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
          <th style="text-align: center; vertical-align:middle">Uraian Indikator</th>
          <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
        </tr>
      </thead>
      <tbody>        
      </tbody>
  </table>
</script>

@include('kin.perkin.es2.FrmPerkinDokumen')
@include('kin.perkin.es2.FrmPerkinSasaranIndikator')
@include('kin.perkin.es2.FrmPerkinProgram')

@endsection

@section('scripts')
<script type="text/javascript" language="javascript" class="init">
$(document).ready(function() {
  
  
  var detInSasaran = Handlebars.compile($("#details-inSasaran").html());
  var detInProgram = Handlebars.compile($("#details-inProgram").html());

  var id_unit_temp;
  var id_tahun_temp;
  var id_eselon2_temp;
  var id_perkin_sasaran_temp;
  
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
        url: 'perkin/getUnit',
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
        url: 'perkin/getPegawai/0',
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
          "ajax": {"url": "./perkin/getDokumen/"+$id_unit},
          "columns": [
                { data: 'no_urut', sClass: "dt-center"},
                { data: 'tahun', sClass: "dt-center"},
                { data: 'no_dokumen', sClass: "dt-center"},
                { data: 'jabatan_penandatangan'},
                { data: 'action', 'searchable': false, 'orderable':false }
              ]
        });

      }

$('#tblDokPerkin tbody').on( 'dblclick', 'tr', function () {
  var data = tblDokPerkin.row(this).data();
    id_tahun_temp =  data.tahun;
    id_eselon2_temp = data.id_sotk_es2;

    $('.nav-tabs a[href="#sasaran"]').tab('show');
    loadSasaran(data.id_dokumen_perkin);  

    $.ajax({
    type: "GET",
    url: './cetak/getDokumenRenstra/'+id_unit_temp,
    dataType: "json",
    success: function(data) {
        var j = data.length;
        var post, i;

        $('select[name="cb_dok_renstra"]').empty();
        $('select[name="cb_dok_renstra"]').append('<option value="-1">Pilih Nomor Dokumen Renstra</option>');

        for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="cb_dok_renstra"]').append('<option value="'+ post.id_renstra +'">'+ post.nomor_renstra +'</option>');

        }
    }
    }); 
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
          "ajax": {"url": "./perkin/getSasaran/"+$id_dokumen},
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
                { data: 'kd_sasaran_renstra', sClass: "dt-center"},
                { data: 'uraian_sasaran_renstra'},
                { data: 'jml_indikator', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
              ],            
          "order": [[1, 'ASC']],
          "bDestroy": true
    });
  }

  var tblInSasaran;
    function initInSasaran(tableId, data) {
        tblInSasaran=$('#' + tableId).DataTable({
                processing: true,
                serverSide: true,
                ajax: data.details_url,
                dom : 'BfRtIP',
                autoWidth: false,
                "language": {
                          "decimal": ",",
                          "thousands": "."},
                "columns": [
                            { data: 'urut', sClass: "dt-center"},
                            { data: 'nm_indikator'},
                            { data: 'target_t1', 
                                  render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
                            { data: 'target_t2', 
                                  render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
                            { data: 'target_t3', 
                                  render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
                            { data: 'target_t4', 
                                  render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
                            { data: 'target_tahun', 
                                  render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
                            { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
                          ],
                "order": [[0, 'asc']],
                "bDestroy": true
            })
    }

  $('#tblSasaran tbody').on('click', 'td.details-control', function () {
      var tr = $(this).closest('tr');
      var row = tblSasaran.row( tr );
      var tableId = 'inSasaran-' + row.data().id_perkin_sasaran;

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
    id_perkin_sasaran_temp =  data.id_perkin_sasaran;   
    
    $('.nav-tabs a[href="#program"]').tab('show');
    loadProgram(id_perkin_sasaran_temp);
    $.ajax({
        type: "GET",
        url: 'perkin/getEselon3/'+id_eselon2_temp,
        dataType: "json",
        success: function(data) {
          var j = data.length;
          var post, i;

          $('select[name="cb_eselon_3"]').empty();
          $('select[name="cb_eselon_3"]').append('<option value="-1">---Pilih Jabatan Eselon---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="cb_eselon_3"]').append('<option value="'+ post.id_sotk_es3 +'">'+ post.nama_eselon +'</option>');
          }
        }
    });
    
  });

  var tblProgram;
  function loadProgram($id_perkin_sasaran) {
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
          "ajax": {"url": "./perkin/getProgram/"+$id_perkin_sasaran},
          "language": {
                "decimal": ",",
                "thousands": "."},
          "columns": [
                { data: 'kd_program', sClass: "dt-center"},
                { data: 'uraian_program'},
                { data: 'pagu_tahun',
                  render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
                { data: 'nama_eselon'},
                { data: 'action', 'searchable': false, 'orderable':false }
            ],
            "columnDefs": [ {
                  "visible": false
              } ]
          });
  }
  
  $('#tgl_perkin_dok_x').datepicker({
    altField: "#tgl_perkin_dok",
    altFormat: "yy-mm-dd", 
    dateFormat: "dd MM yy",
  });

  $('#btn').click(function() {
    $("#tgl_perkin_dok_x").focus();
  });

  $('#tgl_perkin_tmt_x').datepicker({
    altField: "#tgl_perkin_tmt",
    altFormat: "yy-mm-dd", 
    dateFormat: "dd MM yy",
  });

  $('#btn').click(function() {
    $("#tgl_perkin_tmt_x").focus();
  });

$( ".cb_pegawai" ).change(function() {
      $.ajax({
            type: "GET",
            url: 'perkin/getPejabat/'+$('#cb_pegawai').val(),
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

  $( ".cb_eselon_2" ).change(function() {
    $.ajax({
        type: "GET",
        url: 'perkin/getPegawai/'+$( ".cb_eselon_2" ).val(),
        dataType: "json",
        success: function(data) {
          var j = data.length;
              var post, i;
              for (i = 0; i < j; i++) {
                post = data[i];                
                $('#id_pegawai_dok').val(post.id_pegawai);
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
    loadDokumen(id_unit_temp);  
    
    $.ajax({
        type: "GET",
        url: 'perkin/getJabatan/'+id_unit_temp,
        dataType: "json",
        success: function(data) {
          var j = data.length;
          var post, i;

          $('select[name="cb_eselon_2"]').empty();
          $('select[name="cb_eselon_2"]').append('<option value="-1">---Pilih Jabatan Eselon---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="cb_eselon_2"]').append('<option value="'+ post.id_sotk_es2 +'">'+ post.nama_eselon +'</option>');
          }
        }
    });

  });

  $(document).on('click', '.btnProsesSasaran', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
    
    $('#prosesbar').show();
    $.ajax({
        type: 'post',
        url: './perkin/transSasaranRenstra',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_unit': id_unit_temp,
            'tahun': id_tahun_temp,
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

  @include('kin.perkin.es2.JsPerkinDokumen')
  @include('kin.perkin.es2.JsPerkinSasaranIndikator')  
  @include('kin.perkin.es2.JsPerkinProgram')

});
</script>
@endsection
