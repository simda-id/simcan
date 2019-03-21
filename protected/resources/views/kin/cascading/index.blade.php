<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app4')

@section('content')
  @if (Auth::guest())
  @else
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <?php
                $this->title = ' Cascading Hasil Program - Kegiatan Perangkat Daerah ';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = '/';
                $breadcrumb->begin();
                $breadcrumb->add(['url' => '/cascading','label' => $this->title]);
                $breadcrumb->end();
            ?>
      </div>
    </div>   
    <div id="pesan"></div>
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-info">
          <div class="panel-heading">
            <h2 class="panel-title">{{$this->title}}</h2>
          </div>  
          <div class="panel-body">
          <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#sasaran" aria-controls="sasaran" role="tab" data-toggle="tab">Sasaran Strategis</a></li>
            <li><a href="#program" aria-controls="program" role="tab" data-toggle="tab">Sasaran Program</a></li>
            <li><a href="#kegiatan" aria-controls="kegiatan" role="tab" data-toggle="tab">Sasaran Kegiatan</a></li>
          </ul>

          <div class="tab-content">  
            <div role="tabpanel" class="tab-pane active" id="sasaran">
              <br>
              <div class="form-group">
                <label class="control-label col-sm-2" for="id_unit">Unit Penyusun Renstra :</label>
                <div class="col-sm-6">
                  <select class="form-control cbUnit" name="id_unit" id="id_unit">
                    @foreach($dataunit as $val)
                      <option value={{ $val->id_unit }}>{{ $val->nm_unit }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div>
                <table id="tblSasaran" class="table compact table-responsive table-striped table-bordered display"  cellspacing="0" width="100%">
                      <thead>
                          <tr>
                              <th width="3%" style="text-align: center; vertical-align:middle"></th>
                              <th width="5%" style="text-align: center; vertical-align:middle">Kode Tujuan</th>
                              <th width="5%" style="text-align: center; vertical-align:middle">Kode Sasaran</th>
                              <th style="text-align: center; vertical-align:middle">Uraian Sasaran</th>
                          </tr>
                      </thead>
                      <tbody></tbody>
                </table>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="program">
            <br>
            <form class="form-horizontal" role="form">
            <div class="form-group">
              <label for="ur_sasaran_strategis_prog" class="col-sm-2 control-label" align='left'>Uraian Sasaran Strategis </label>
              <div class="col-sm-10">
                <textarea type="text" class="form-control" rows="3" id="ur_sasaran_strategis_prog" name="ur_sasaran_strategis_prog"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label" align='left'></label>
              <div class="col-sm-10">
                <button type="button" class="btn btn-labeled btn-success btnTambahHSP">
                  <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span> Tambah Sasaran Program</button>
              </div>
            </div>
            </form>
            <div>
                  <table id="tblSasaranProgram" class="table compact table-responsive table-striped table-bordered display"  cellspacing="0" width="100%">
                      <thead>
                          <tr>
                            <th width="3%" style="text-align: center; vertical-align:middle"></th>
                            <th width="5%" style="text-align: center; vertical-align:middle">Kode Sasaran</th>
                            <th width="5%" style="text-align: center; vertical-align:middle">Kode Program</th>
                            <th style="text-align: center; vertical-align:middle">Uraian Program Renstra</th>
                            <th style="text-align: center; vertical-align:middle">Uraian Sasaran Program</th>
                            <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                          </tr>
                      </thead>
                      <tbody></tbody>
                  </table>
            </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="kegiatan">
            <br>
            <form class="form-horizontal" role="form">
                <div class="form-group">
                  <label for="ur_sasaran_strategis_keg" class="col-sm-2 control-label" align='left'>Uraian Sasaran Strategis </label>
                  <div class="col-sm-10">
                    <textarea type="text" class="form-control" rows="3" id="ur_sasaran_strategis_keg" name="ur_sasaran_strategis_keg"></textarea>
                  </div>
                </div>
                <div class="form-group">
                    <label for="ur_sasaran_program_keg" class="col-sm-2 control-label" align='left'>Uraian Sasaran Program </label>
                    <div class="col-sm-10">
                      <textarea type="text" class="form-control" rows="3" id="ur_sasaran_program_keg" name="ur_sasaran_program_keg"></textarea>
                    </div>
                  </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" align='left'></label>
                  <div class="col-sm-10">
                      <button type="button" class="btn btn-labeled btn-success btnTambahHSP">
                          <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span> Tambah Sasaran Kegiatan</button>
                  </div>
                </div>
              </form>
              <div>
                <table id="tblKegiatan" class="table compact table-responsive table-striped table-bordered display" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th width="3%" style="text-align: center; vertical-align:middle"></th>
                        <th width="5%" style="text-align: center; vertical-align:middle">Kode Program</th>
                        <th width="5%" style="text-align: center; vertical-align:middle">Kode Kegiatan</th>
                        <th style="text-align: center; vertical-align:middle">Uraian Sasaran Kegiatan</th>
                        <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
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
@endif

<script id="details-inSasaran" type="text/x-handlebars-template">
    <table class="table table-striped display table-bordered table-responsive compact details-table" id="inSasaran-@{{id_sasaran_renstra}}">
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
  
  <script id="details-inProgram" type="text/x-handlebars-template">
    <table class="table table-striped display table-bordered table-responsive compact details-table" id="inProgram-@{{id_program_renstra}}">
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

  <script id="details-inKegiatan" type="text/x-handlebars-template">
    <table class="table table-striped display table-bordered table-responsive compact details-table" id="inKegiatan-@{{id_kegiatan_renstra}}">
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

  @include('kin.cascading.FrmRenstraSasaran')
  @include('kin.cascading.FrmRenstraSasaranIndikator')
  @include('kin.cascading.FrmRenstraProgram')

@endsection



@section('scripts')
<script type="text/javascript" language="javascript" class="init">
$(document).ready(function() {

  var detInSasaran = Handlebars.compile($("#details-inSasaran").html());
  var detInProgram = Handlebars.compile($("#details-inProgram").html());
  var detInKegiatan = Handlebars.compile($("#details-inKegiatan").html());

  var id_sasaran_renstra, id_indikator_sasaran_strategis;
  var id_program_renstra, id_indikator_program_renstra;
  var id_kegiatan_renstra, id_indikator_kegiatan_renstra;
  var id_pelaksana_kegiatan_renstra;

  var tbl_Sasaran, tblInSasaran;
  var tbl_Program, tblInProgram;
  var tbl_Kegiatan, tblInKegiatan;

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
  };

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
  $('.number').number(true,4,',', '.');

  $('.page-alert .close').click(function(e) {
    e.preventDefault();
    $(this).closest('.page-alert').slideUp();
  });

  $('.display').DataTable({
    responsive: true,
    dom : 'bfrtip',                  
    autoWidth : false,
    bDestroy: true,
  }); 

  function loadTblSasaran($data) {
    tbl_Sasaran = $('#tblSasaran').DataTable( {
            processing: true,
            serverSide: true,
            responsive: true,
            dom : 'bfrtip',                  
            autoWidth : false,
            order: [[0, 'asc']],
            bDestroy: true,
            language: {
                  "decimal": ",",
                  "thousands": "."},
            "ajax": {"url": "cascading/getSasaranRenstra/"+$data},
            "columns": [
                  {
                    "className":      'details-control',
                    "orderable":      false,
                    "searchable":      false,
                    "data":           null,
                    "defaultContent": '',
                    "width" : "5px"
                  },
                  { data: 'kd_tujuan', sClass: "dt-center"},
                  { data: 'no_urut', sClass: "dt-center"},
                  { data: 'uraian_sasaran_renstra'},
                ],
                    "bDestroy": true
      });
    };

    function initInSasaran(tableId, data) {
        tblInSasaran=$('#' + tableId).DataTable({
                processing: true,
                serverSide: true,
                ajax: data.details_url,
                dom : 'bfrtip',
                autoWidth: false,
                "language": {
                          "decimal": ",",
                          "thousands": "."},
                "columns": [
                            { data: 'urut', sClass: "dt-center"},
                            { data: 'nm_indikator'},
                            { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
                          ],
                "order": [[0, 'asc']],
                "bDestroy": true
            })
    }

  $('#tblSasaran tbody').on('click', 'td.details-control', function () {
      var tr = $(this).closest('tr');
      var row = tbl_Sasaran.row( tr );
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

$( ".cbUnit" ).change(function() {
      id_unit_renstra =  $('.cbUnit').val();
      loadTblSasaran(id_unit_renstra);
});

$('#tblSasaran tbody').on( 'dblclick', 'tr', function () {
    var data = tbl_Sasaran.row(this).data();
    id_sasaran_renstra =  data.id_sasaran_renstra;
    $('.nav-tabs a[href="#program"]').tab('show');
    $('#ur_sasaran_strategis_prog').val(data.uraian_sasaran_renstra);
    $('#ur_sasaran_strategis_keg').val(data.uraian_sasaran_renstra);
      // $('#tblProgram').DataTable().ajax.url("./cascading/program/"+id_sasaran_renstra).load();
      // $('#tblKegiatan').DataTable().ajax.url("./cascading/kegiatan/0").load();

});

@include('kin.cascading.JsRenstraSasaranIndikator');


});
</script>
@endsection
