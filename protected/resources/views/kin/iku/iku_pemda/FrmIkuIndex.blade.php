<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app4')
<style>
  #radioBtn .notActive{
    color: #b5b6b7;
    background-color: #fff;
  }
</style>

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <?php
                $this->title = ' IKU Pemerintah Daerah';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = '/';
                $breadcrumb->begin();
                $breadcrumb->add(['url' => '/iku','label' => 'IKU Pemerintah Daerah']);
                $breadcrumb->add(['label' => $this->title]);
                $breadcrumb->end();
            ?>
      </div>
    </div>    
    <div id="pesan"></div>
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-warning">
          <div class="panel-heading">
            <h2 class="panel-title">Penetapan IKU Pemerintah Daerah</h2>
          </div>
          <div class="panel-body"> 
            <form name="" class="form-horizontal" role="form" autocomplete='off' action="" method="post"> 
            <div class="form-group">
              <div class="col-sm-9">
                  <button type="button" class="btn btn-labeled btn-success btnAddDokumen">
                    <span class="btn-label"><i class="fa fa-plus fa-lg fa-fw"></i></span> Tambah Dokumen IKU
                  </button>  
              </div>
            </div>
            </form> 
          <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#dokumen" aria-controls="dokumen" role="tab" data-toggle="tab">Dokumen Iku</a></li>
            <li><a href="#sasaran" aria-controls="sasaran" role="tab" data-toggle="tab">Sasaran</a></li>
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
                            <span class="btn-label"><i class="fa fa-refresh fa-lg fa-fw"></i></span> Proses Penetapan IKU 
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
            </div>
            </div>
          </div>
          </div>
      </div>
</div>

<script id="details-inSasaran" type="text/x-handlebars-template">
  <table class="table table-striped display table-bordered table-responsive compact details-table" id="inSasaran-@{{id_sasaran_rpjmd}}">
      <thead>
        <tr>
          <th width="3%" style="text-align: center; vertical-align:middle">No Urut</th>
          <th style="text-align: center; vertical-align:middle">Uraian Indikator</th>
          <th width="5%" style="text-align: center; vertical-align:middle">Target</th>
          <th width="5%" style="text-align: center; vertical-align:middle">Satuan</th>
          <th width="10%" style="text-align: center; vertical-align:middle">Status IKU</th>
          <th width="20%" style="text-align: center; vertical-align:middle">Unit Penanggungjawab</th>
          <th width="5%" style="text-align: center; vertical-align:middle">Aksi</th>
        </tr>
      </thead>
      <tbody>        
      </tbody>
  </table>
</script>

@include('kin.iku.iku_pemda.FrmIkuDokumen')
@include('kin.iku.iku_pemda.FrmIkuSasaranIndikator')

@endsection

@section('scripts')
<script type="text/javascript" language="javascript" class="init">
$(document).ready(function() {
  
  
  var detInSasaran = Handlebars.compile($("#details-inSasaran").html());

  var id_dokumen_temp;
  var id_rpjmd_temp;
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

function loadgetUnit($id_rpjmd){
  vars = "?id="     + $id_rpjmd;
  $.ajax({
          type: "GET",
          url: './iku/getUnit'+ vars,
          dataType: "json",
          success: function(data) {
            var j = data.length;
            var post, i;

            $('select[name="unit_penanggungjawab"]').empty();
            $('select[name="unit_penanggungjawab"]').append('<option value="0">---Unit Belum Dipilih---</option>');

            for (i = 0; i < j; i++) {
              post = data[i];
              $('select[name="unit_penanggungjawab"]').append('<option value="'+ post.id_unit +'">'+ post.nm_unit +'</option>');
            }
          }
      });
}

$.ajax({
    type: "GET",
    url: './cetak/getDokumenRpjmd',
    dataType: "json",
    success: function(data) {
        var j = data.length;
        var post, i;

        $('select[name="cb_no_perda"]').empty();
        $('select[name="cb_no_perda"]').append('<option value="-1">Pilih Nomor Perda RPJMD</option>');

        for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="cb_no_perda"]').append('<option value="'+ post.id_rpjmd +'">'+ post.no_perda +'</option>');

        }
    }
});

var tblDokPerkin
function loadDokumen() {
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
          "ajax": {"url": "./iku/getDokumen"},
          "columns": [
                { data: 'no_urut', sClass: "dt-center"},
                { data: 'no_dokumen', sClass: "dt-center"},
                { data: 'uraian_dokumen'},
                { data: 'action', 'searchable': false, 'orderable':false }
              ]
        });

      }

loadDokumen();

$('#tblDokPerkin tbody').on( 'dblclick', 'tr', function () {
  var data = tblDokPerkin.row(this).data();
    id_dokumen_temp =  data.id_dokumen;
    id_rpjmd_temp = data.id_rpjmd;

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
          "ajax": {"url": "./iku/getSasaran/"+$id_dokumen},
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
                { data: 'uraian_sasaran_rpjmd'},
                { data: 'jml_indikator_iku', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
                { data: 'jml_indikator_non', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
              ]
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
                              return  ' <span style="font-size:16px;color:'+row.warna+';">'+row.flag_display +'</span>';
                            }},
                            { data: 'nama_unit', sClass: "dt-center"},
                            { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
                          ],
                "order": [[0, 'asc']],
                "bDestroy": true
            })
    }

  $('#tblSasaran tbody').on('click', 'td.details-control', function () {
      var tr = $(this).closest('tr');
      var row = tblSasaran.row( tr );      
      loadgetUnit(row.data().id_sasaran_rpjmd);
      var tableId = 'inSasaran-' + row.data().id_sasaran_rpjmd;

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

    $.ajax({
        type: 'post',
        url: './iku/transIndikatorSasaran',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_dokumen': id_dokumen_temp,
            'id_rpjmd': id_rpjmd_temp,
        },
        success: function(data) {
            // tblSasaran.ajax.reload(null,false);
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }

        }
    });
  });

  @include('kin.iku.iku_pemda.JsIkuDokumen')
  @include('kin.iku.iku_pemda.JsIkuSasaranIndikator')

  $('#radioBtn a').on('click', function(){
    var sel = $(this).data('title');
    var tog = $(this).data('toggle');
    $('#'+tog).prop('value', sel);
    
    $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
    $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
  });

});
</script>
@endsection
