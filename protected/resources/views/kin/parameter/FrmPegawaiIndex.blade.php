<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app4')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <?php
                $this->title = ' Pejabat Eselon';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = '/';
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
        <div class="panel panel-warning">
          <div class="panel-heading">
            <h2 class="panel-title">Daftar Pegawai Pejabat Eselon Perangkat Daerah</h2>
          </div>
          <div class="panel-body"> 
            <form name="" class="form-horizontal" role="form" autocomplete='off' action="" method="post">                    
            <div class="form-group">
              <div class="col-sm-9">
                  <button type="button" class="btn btn-labeled btn-success btnAddPegawai">
                    <span class="btn-label"><i class="fa fa-plus fa-lg fa-fw"></i></span> Tambah Pegawai
                  </button>  
              </div>
            </div>
            </form> 

          <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#pegawai" aria-controls="pegawai" role="tab" data-toggle="tab">Daftar Pegawai</a></li>
          </ul>

          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="pegawai">
              <br>
              <table id='tblPegawai' class="table display table-striped table-bordered table-responsive" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          {{-- <th width="2%" style="text-align: center; vertical-align:middle"></th> --}}
                          <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                          <th width="15%" style="text-align: center; vertical-align:middle">NIP</th>
                          <th style="text-align: center; vertical-align:middle">Nama Pegawai</th>
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

<script id="details-inPangkat" type="text/x-handlebars-template">
  <table class="table table-striped display table-bordered table-responsive compact details-table" id="inPangkat-@{{id_pegawai}}">
      <thead>
        <tr>
          <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
          <th width="15%" style="text-align: center; vertical-align:middle">T M T</th>
          <th style="text-align: center; vertical-align:middle">Uraian Pangkat/Golongan</th>
          <th width="50px" style="text-align: center; vertical-align:middle">Aksi</th>
        </tr>
      </thead>
      <tbody>        
      </tbody>
  </table>
</script>

@include('kin.parameter.FrmPegawaiData')
@include('kin.parameter.FrmPegawaiRiwayatPangkat')
@include('kin.parameter.FrmPegawaiRiwayatUnit')


@endsection

@section('scripts')
<script type="text/javascript" language="javascript" class="init">
$(document).ready(function() {  
  
  var detInPangkat = Handlebars.compile($("#details-inPangkat").html());

  var id_pegawai_temp;
  
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

var angkaNip = document.getElementsByClassName('nip');
angkaNip.onkeydown = function(e) {
      if(!((e.keyCode > 95 && e.keyCode < 106)
        || (e.keyCode > 47 && e.keyCode < 58) 
        )) {
          return false;
      }
  }

$("input[name='nip_pegawai_display']").on("keyup", function(){
    $("input[name='nip_pegawai']").val(nilaiNip(this.value));
    this.value = buatNip($("input[name='nip_pegawai']").val());
})
      

var tblPegawai
tblPegawai = $('#tblPegawai').DataTable( {
          processing: true,
          serverSide: true,
          dom: 'Bfrtip',
          responsive: true,                
          autoWidth : false,
          order: [[0, 'asc']],
          bDestroy: true,
          language: {
                "decimal": ",",
                "thousands": "."},
          "ajax": {"url": "./pegawai/getPegawai"},
          "columns": [
                // {
                //   "className":      'details-control',
                //   "orderable":      false,
                //   "searchable":      false,
                //   "data":           null,
                //   "defaultContent": '',
                //   "width" : "5px"
                // },
                { data: 'urut', sClass: "dt-center"},
                { data: 'nip_pegawai', sClass: "dt-center",render: function ( toFormat ) {
                  var NIP;
                  NIP=toFormat.toString();            
                  NIP= NIP.substring(0,8) + ' ' + NIP.substring(8,14) + ' ' + NIP.substring(14,15) + ' ' + NIP.substring(15,18);   
                  return NIP}},
                { data: 'nama_pegawai'},
                { data: 'action', 'searchable': false, 'orderable':false }
              ]
        });

  var tblInPangkat;
    function initInPangkat(tableId, data) {
        tblInPangkat=$('#' + tableId).DataTable({
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
                            { data: 'tmt_pangkat', sClass: "dt-center"},
                            { data: 'pangkat_display'},
                            { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
                          ],
                "order": [[0, 'asc']],
                "bDestroy": true
            })
    };
  
    var tblPangkat;
    function LoadPangkat(id_pegawai) {
        tblPangkat=$('#tblRiwayatPangkat').DataTable({
                processing: true,
                serverSide: true,
                ajax: {"url": "./pegawai/getPegawaiPangkat/"+id_pegawai},
                dom : 'BfRtIP',
                autoWidth: false,
                "language": {
                          "decimal": ",",
                          "thousands": "."},
                "columns": [
                            { data: 'urut', sClass: "dt-center"},
                            { data: 'tmt_pangkat', sClass: "dt-center"},
                            { data: 'pangkat_display'},
                            { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
                          ],
                "order": [[0, 'asc']],
                "bDestroy": true
            })
    };

    var tblUnit;
    function LoadUnit(id_pegawai) {
        tblUnit=$('#tblRiwayatUnit').DataTable({
                processing: true,
                serverSide: true,
                ajax: {"url": "./pegawai/getPegawaiUnit/"+id_pegawai},
                dom : 'BfRtIP',
                autoWidth: false,
                "language": {
                          "decimal": ",",
                          "thousands": "."},
                "columns": [
                            // { data: 'urut', sClass: "dt-center"},
                            {
                              'defaultContent' : '',
                              'data'           : 'DT_Row_Index',
                              'name'           : 'DT_Row_Index',
                              'title'          : 'No Urut',
                              'render'         : null,
                              'orderable'      : false,
                              'searchable'     : false,
                              'exportable'     : false,
                              'printable'      : true,
                              'footer'         : '',
                              'sClass'         : 'dt-center',
                            },
                            { data: 'tmt_unit', sClass: "dt-center"},
                            { data: 'nm_unit'},
                            { data: 'nama_jabatan'},
                            { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
                          ],
                "order": [[0, 'asc']],
                "bDestroy": true
            })
    };

  $('#tblPegawai tbody').on('click', 'td.details-control', function () {
      var tr = $(this).closest('tr');
      var row = tblPegawai.row( tr );
      var tableId = 'inPangkat-' + row.data().id_pegawai;

      if (row.child.isShown()) {
          row.child.hide();
          tr.removeClass('shown');
      } else {
          row.child(detInPangkat(row.data())).show();
          initInPangkat(tableId, row.data());
          tr.addClass('shown');
          tr.next().find('td').addClass('no-padding bg-gray');
      }    
  });

  $.ajax({
      type: "GET",
      url: 'pegawai/jenis_pangkat',
      dataType: "json",
      success: function(data) {
          var j = data.length;
          var post, i;

          for (i = 0; i < j; i++) {
              post = data[i];
              $('select[name="cb_golongan"]').append('<option value="'+ post.id +'">'+ post.uraian_pangkat + " ("+ post.uraian_golongan+')</option>');
          }
      }
  });

  $.ajax({
      type: "GET",
      url: 'pegawai/getSotkLevel/1/0',
      dataType: "json",
      success: function(data) {
          var j = data.length;
          var post, i;

          $('select[name="cb_jabatan_riwayat_unit"]').empty();
          for (i = 0; i < j; i++) {
              post = data[i];
              $('select[name="cb_jabatan_riwayat_unit"]').append('<option value="'+ post.id_sotk +'">'+ post.nama_eselon +'</option>');
          }
      }
  });

  $( ".checkLevelJabatan" ).change(function() {  
    $.ajax({
      type: "GET",
      url: 'pegawai/getSotkLevel/'+$('#cb_unit_riwayat').val()+'/'+document.frmModalRiwayatUnit.checkLevelJabatan.value,
      dataType: "json",
      success: function(data) {
          var j = data.length;
          var post, i;

          $('select[name="cb_jabatan_riwayat_unit"]').empty();
          for (i = 0; i < j; i++) {
              post = data[i];
              $('select[name="cb_jabatan_riwayat_unit"]').append('<option value="'+ post.id_sotk +'">'+ post.nama_eselon +'</option>');
          }
      }
    });
  });

  $( ".cb_unit_riwayat" ).change(function() {  
    $.ajax({
      type: "GET",
      url: 'pegawai/getSotkLevel/'+$('#cb_unit_riwayat').val()+'/'+document.frmModalRiwayatUnit.checkLevelJabatan.value,
      dataType: "json",
      success: function(data) {
          var j = data.length;
          var post, i;

          $('select[name="cb_jabatan_riwayat_unit"]').empty();
          for (i = 0; i < j; i++) {
              post = data[i];
              $('select[name="cb_jabatan_riwayat_unit"]').append('<option value="'+ post.id_sotk +'">'+ post.nama_eselon +'</option>');
          }
      }
    });
  });

  $.ajax({
        type: "GET",
        url: '../perkin/getUnit',
        dataType: "json",
        success: function(data) {
          var j = data.length;
          var post, i;

          $('select[name="cb_unit_riwayat"]').empty();
          $('select[name="cb_unit_riwayat"]').append('<option value="-1">---Pilih Unit---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="cb_unit_riwayat"]').append('<option value="'+ post.id_unit +'">'+ post.nm_unit +'</option>');
          }
        }
    });

  $('#tmt_pangkat_x').datepicker({
    altField: "#tmt_pangkat",
    altFormat: "yy-mm-dd", 
    dateFormat: "dd MM yy",
  });

  $('#tmt_unit_x').datepicker({
    altField: "#tmt_unit",
    altFormat: "yy-mm-dd", 
    dateFormat: "dd MM yy",
  });

  @include('kin.parameter.JsPegawaiData')
  @include('kin.parameter.JsPegawaiRiwayatPangkat')
  @include('kin.parameter.JsPegawaiRiwayatUnit')

});
</script>
@endsection
