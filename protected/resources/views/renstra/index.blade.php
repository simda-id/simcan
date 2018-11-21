<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app1')

@section('content')
  @if (Auth::guest())
  {{-- <li><a href="{{ url('/')}}">Dashboard</a></li> --}}
  @else
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <?php
                $this->title = ' Rencana Strategis Perangkat Daerah ';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = '/';
                $breadcrumb->begin();
                $breadcrumb->add(['url' => '/rpjmd','label' => 'RPJMD dan Renstra']);
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
            <h2 class="panel-title">Data Rencana Strategis Perangkat Daerah</h2>
          </div>  
          <div class="panel-body">
          <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#visi" aria-controls="visi" role="tab" data-toggle="tab">Visi</a></li>
            <li><a href="#misi" aria-controls="misi" role="tab" data-toggle="tab">Misi</a></li>
            <li><a href="#tujuan" aria-controls="tujuan" role="tab" data-toggle="tab">Tujuan</a></li>
            <li><a href="#sasaran" aria-controls="sasaran" role="tab" data-toggle="tab">Sasaran</a></li>
            <li><a href="#program" aria-controls="program" role="tab" data-toggle="tab">Program</a></li>
            <li><a href="#kegiatan" aria-controls="kegiatan" role="tab" data-toggle="tab">Kegiatan</a></li>
          </ul>

          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="visi">
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
                <button type="button" class="btn btn-primary btn-labeled btnPrintKompilasiProgramdanPaguRenstra hidden" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="fa fa-print fa-fw fa-lg"></i></span>Cetak Kompilasi Program dan Pagu Renstra</button>
              </div>
              <br>
              <br>
              <div class="">
              <table id='tblVisi' class="table compact table-responsive table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th width="10%" style="text-align: center">No Visi</th>
                          <th style="text-align: center">Uraian Visi</th>
                          <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                  </tbody>
            </table>
            </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="misi">
              <br>
              <div class="">
              <table id="tblMisi" class="table compact table-responsive table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th width="5%" style="text-align: center; vertical-align:middle">Kode Visi</th>
                          <th width="5%" style="text-align: center; vertical-align:middle">Kode Misi</th>
                          <th style="text-align: center; vertical-align:middle">Uraian Misi</th>
                          <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                  </tbody>
            </table>
            </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="tujuan">
            <br>
            <div class="">
            <table id="tblTujuan" class="table compact table-responsive table-striped table-bordered"  cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th width="3%" style="text-align: center; vertical-align:middle"></th>
                          <th width="5%" style="text-align: center; vertical-align:middle">Kode Misi</th>
                          <th width="5%" style="text-align: center; vertical-align:middle">No Tujuan</th>
                          <th style="text-align: center; vertical-align:middle">Uraian Tujuan</th>
                          <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                  </tbody>
            </table>
            </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="sasaran">
            <br>
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#sasaran1" aria-controls="visi" role="tab" data-toggle="tab">Sasaran</a></li>
                <li><a href="#strategi" aria-controls="sasaran" role="tab" data-toggle="tab">Strategi</a></li>
                <li><a href="#kebijakan" aria-controls="tujuan" role="tab" data-toggle="tab">Kebijakan</a></li>
            </ul>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="sasaran1">
              <br>
              <div class="">
                <table id="tblSasaran" class="table compact table-responsive table-striped table-bordered"  cellspacing="0" width="100%">
                      <thead>
                          <tr>
                              <th width="3%" style="text-align: center; vertical-align:middle"></th>
                              <th width="5%" style="text-align: center; vertical-align:middle">Kode Tujuan</th>
                              <th width="5%" style="text-align: center; vertical-align:middle">Kode Sasaran</th>
                              <th style="text-align: center; vertical-align:middle">Uraian Sasaran</th>
                              <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                      </tbody>
                </table>
              </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="kebijakan">
              <br>
              <div class="">
                <table id="tblKebijakan" class="table compact table-responsive table-striped table-bordered"  cellspacing="0" width="100%">
                      <thead>
                          <tr>
                              <th width="5%" style="text-align: center; vertical-align:middle">Kode Sasaran</th>
                              <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                              <th style="text-align: center; vertical-align:middle">Uraian Kebijakan</th>
                          </tr>
                      </thead>
                      <tbody>
                      </tbody>
                </table>
              </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="strategi">
              <br>
              <div class="">
                <table id="tblStrategi" class="table compact table-responsive table-striped table-bordered"  cellspacing="0" width="100%">
                      <thead>
                          <tr>
                              <th width="5%" style="text-align: center; vertical-align:middle">Kode Sasaran</th>
                              <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                              <th style="text-align: center; vertical-align:middle">Uraian Strategi</th>
                          </tr>
                      </thead>
                      <tbody>
                      </tbody>
                </table>
              </div>
              </div>
            </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="program">
            <br>
            <div class="">
                    <table id="tblProgram" class="table compact table-responsive table-striped table-bordered"  cellspacing="0" width="100%">
                      <thead>
                          <tr>
                            <th rowspan="2" width="3%" style="text-align: center; vertical-align:middle"></th>
                            <th rowspan="2" width="5%" style="text-align: center; vertical-align:middle">Kode Sasaran</th>
                            <th rowspan="2" width="5%" style="text-align: center; vertical-align:middle">Kode Program</th>
                            <th rowspan="2" style="text-align: center; vertical-align:middle">Uraian Program SKPD</th>
                            <th colspan="5" style="text-align: center; vertical-align:middle">Pagu Program per Tahun (juta rupiah)</th>
                            <th rowspan="2" width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                          </tr>
                          <tr>
                          @foreach($dataperda as $datas)
                              <th width="5%" style="text-align: center">{{$datas->tahun_1}}</th>
                              <th width="5%" style="text-align: center">{{$datas->tahun_2}}</th>
                              <th width="5%" style="text-align: center">{{$datas->tahun_3}}</th>
                              <th width="5%" style="text-align: center">{{$datas->tahun_4}}</th>
                              <th width="5%" style="text-align: center">{{$datas->tahun_5}}</th>
                          @endforeach
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="kegiatan">
            <br>
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#kegiatan1" aria-controls="kegiatan" role="tab" data-toggle="tab">Kegiatan</a></li>
                <li><a href="#pelaksana" aria-controls="kegiatan" role="tab" data-toggle="tab">Sub Unit Pelaksana</a></li>
            </ul>
           <div class="tab-content">
              <br>
              <div role="tabpanel" class="tab-pane active" id="kegiatan1">
              <div class="">
              <table id="tblKegiatan" class="table compact table-responsive table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th rowspan="2" width="3%" style="text-align: center; vertical-align:middle"></th>
                      <th rowspan="2" width="5%" style="text-align: center; vertical-align:middle">Kode Program</th>
                      <th rowspan="2" width="5%" style="text-align: center; vertical-align:middle">Kode Kegiatan</th>
                      <th rowspan="2" style="text-align: center; vertical-align:middle">Uraian Kegiatan SKPD</th>
                      <th colspan="5" style="text-align: center; vertical-align:middle">Pagu Kegiatan per Tahun (juta rupiah)</th>
                      <th rowspan="2" width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                    </tr>
                    <tr>
                      @foreach($dataperda as $datas)
                          <th width="5%" style="text-align: center">{{$datas->tahun_1}}</th>
                          <th width="5%" style="text-align: center">{{$datas->tahun_2}}</th>
                          <th width="5%" style="text-align: center">{{$datas->tahun_3}}</th>
                          <th width="5%" style="text-align: center">{{$datas->tahun_4}}</th>
                          <th width="5%" style="text-align: center">{{$datas->tahun_5}}</th>
                      @endforeach
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
              </table>
              </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="pelaksana">
                <br>
                <div class="">
                  <table id="tblPelaksana" class="table compact table-responsive table-striped table-bordered"  cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="5%" style="text-align: center; vertical-align:middle">Kode Kegiatan</th>
                                <th width="5%" style="text-align: center; vertical-align:middle">Kode Unit</th>
                                <th style="text-align: center; vertical-align:middle">Uraian Sub Unit Pelaksana</th>
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

<script id="details-inTujuan" type="text/x-handlebars-template">
    <table class="table table-striped display table-bordered table-responsive compact details-table" id="inTujuan-@{{id_tujuan_renstra}}">
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

@include('renstra.FrmRenstraVisi')
@include('renstra.FrmRenstraMisi')
@include('renstra.FrmRenstraTujuan')
@include('renstra.FrmRenstraTujuanIndikator')
@include('renstra.FrmRenstraSasaran')
@include('renstra.FrmRenstraSasaranIndikator')
@include('bebas.FrmCariSasaranIndikatorRpjmd')
@include('renstra.FrmRenstraStrategi')
@include('renstra.FrmRenstraKebijakan')
@include('renstra.FrmRenstraProgram')
@include('renstra.FrmRenstraProgramIndikator')
@include('bebas.FrmCariSasaranIndikatorRenstra')
@include('renstra.FrmRenstraKegiatan')
@include('renstra.FrmRenstraKegiatanIndikator')
@include('renstra.FrmRenstraKegiatanPelaksana')
@include('bebas.FrmCariIndikator')
@include('bebas.FrmCariSasaranRPJMD')
@include('bebas.FrmModalProgress')

@endsection



@section('scripts')
<script type="text/javascript" language="javascript" class="init">
$(document).ready(function() {

  var detInTujuan = Handlebars.compile($("#details-inTujuan").html());
  var detInSasaran = Handlebars.compile($("#details-inSasaran").html());
  var detInProgram = Handlebars.compile($("#details-inProgram").html());
  var detInKegiatan = Handlebars.compile($("#details-inKegiatan").html());

  var id_unit_renstra;
  var id_visi_renstra;
  var id_misi_renstra;
  var id_tujuan_renstra;
  var id_sasaran_renstra;
  var id_kebijakan_renstra;
  var id_strategi_renstra;
  var id_program_renstra;
  var id_indikator_program_renstra;
  var id_kegiatan_renstra;
  var id_indikator_kegiatan_renstra;
  var id_pelaksana_kegiatan_renstra;

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
  $('.number').number(true,4,',', '.');


  $('.page-alert .close').click(function(e) {
          e.preventDefault();
          $(this).closest('.page-alert').slideUp();
      });

  var tbl_Visi;
  tbl_Visi = $('#tblVisi').DataTable( {
          processing: true,
          serverSide: true,
          responsive: true,
          dom : 'BFRTIP',                  
          autoWidth : false,
          order: [[0, 'asc']],
          bDestroy: true,
          language: {
                "decimal": ",",
                "thousands": "."},
          "ajax": "{{url('/renstra/visi/0')}}",
          "columns": [
                { data: 'no_urut', sClass: "dt-center"},
                { data: 'uraian_visi_renstra'},
                { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
              ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        } );
  
  var tbl_Misi;
  tbl_Misi = $('#tblMisi').DataTable( {
          processing: true,
          serverSide: true,
          responsive: true,
          dom : 'BFRTIP',                  
          autoWidth : false,
          order: [[0, 'asc']],
          bDestroy: true,
          language: {
                "decimal": ",",
                "thousands": "."},
          "ajax": {"url": "./renstra/misi/0"},
          "columns": [
                { data: 'id_visi_renstra', sClass: "dt-center"},
                { data: 'no_urut', sClass: "dt-center"},
                { data: 'uraian_misi_renstra'},
                { data: 'action', 'searchable': false, 'orderable':false , sClass: "dt-center"}
              ],
                  "order": [[1, 'asc']],
                  "bDestroy": true
        } );

  var tbl_Tujuan;
  tbl_Tujuan = $('#tblTujuan').DataTable( {
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
          "ajax": {"url": "./renstra/tujuan/0"},
          "columns": [
                {
                  "className":      'details-control',
                  "orderable":      false,
                  "searchable":      false,
                  "data":           null,
                  "defaultContent": '',
                  "width" : "5px"
                },
                { data: 'kd_misi', sClass: "dt-center"},
                { data: 'no_urut', sClass: "dt-center"},
                { data: 'uraian_tujuan_renstra'},
                { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
              ],
                  "order": [[2, 'asc']],
                  "bDestroy": true
          } );

  
  var tblInTujuan;
    function initInTujuan(tableId, data) {
        tblInTujuan=$('#' + tableId).DataTable({
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

  $('#tblTujuan tbody').on('click', 'td.details-control', function () {
      var tr = $(this).closest('tr');
      var row = tbl_Tujuan.row( tr );
      var tableId = 'inTujuan-' + row.data().id_tujuan_renstra;

      if (row.child.isShown()) {
          row.child.hide();
          tr.removeClass('shown');
      } else {
          row.child(detInTujuan(row.data())).show();
          initInTujuan(tableId, row.data());
          tr.addClass('shown');
          tr.next().find('td').addClass('no-padding bg-gray');
      }    
  });


  var tbl_Sasaran;
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
          "ajax": {"url": "./renstra/sasaran/0"},
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
                { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
              ],
                  "order": [[2, 'asc']],
                  "bDestroy": true
            } );


  var tblInSasaran;
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
  @include('renstra.JsRenstraSasaran');
  @include('renstra.JsRenstraSasaranIndikator');

  var tbl_Kebijakan;
  tbl_Kebijakan = $('#tblKebijakan').DataTable( {
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
          "ajax": {"url": "./renstra/kebijakan/0"},
          "columns": [
                { data: 'kd_sasaran', sClass: "dt-center"},
                { data: 'no_urut', sClass: "dt-center"},
                { data: 'uraian_kebijakan_renstra'}
              ],
                  "order": [[1, 'asc']],
                  "bDestroy": true
            } );

  var tbl_Strategi;
  tbl_Strategi = $('#tblStrategi').DataTable( {
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
          "ajax": {"url": "./renstra/strategi/0"},
          "columns": [
                { data: 'kd_sasaran', sClass: "dt-center"},
                { data: 'no_urut', sClass: "dt-center"},
                { data: 'uraian_strategi_renstra'}
              ],
                  "order": [[1, 'asc']],
                  "bDestroy": true
          } );

  var tbl_Program;
  tbl_Program = $('#tblProgram').DataTable( {
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
          "ajax": {"url": "./renstra/program/0"},
          "language": {
                "decimal": ",",
                "thousands": "."},
          "columns": [
                {
                  "className":      'details-control',
                  "orderable":      false,
                  "searchable":      false,
                  "data":           null,
                  "defaultContent": '',
                  "width" : "5px"
                },
                { data: 'kd_sasaran', sClass: "dt-center"},
                { data: 'no_urut', sClass: "dt-center"},
                { data: 'nm_program'},
                { data: 'pagu_tahun1',
                      render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
                { data: 'pagu_tahun2',
                      render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
                { data: 'pagu_tahun3',
                      render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
                { data: 'pagu_tahun4',
                      render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
                { data: 'pagu_tahun5',
                      render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
                { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
              ],
            "columnDefs": [ {
                  "visible": false
                  } ],
                  "order": [[2, 'asc']],
                  "bDestroy": true
          } );


  var tblInProgram;
    function initInProgram(tableId, data) {
        tblInProgram=$('#' + tableId).DataTable({
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

  $('#tblProgram tbody').on('click', 'td.details-control', function () {
      var tr = $(this).closest('tr');
      var row = tbl_Program.row( tr );
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

@include('renstra.JsRenstraProgramIndikator');
@include('renstra.JsRenstraProgram');

//   $(document).on('click', '.btnDetailProgram', function() {
//       var data = tbl_Program.row( $(this).parents('tr') ).data();
// 	    $('.actionBtn_program').addClass('editprogram');
// 	    $('.modal-title').text('Detail Data program SKPD');
// 	    $('.form-horizontal').show();
//         $('#id_program_renstra_edit').val(data.id_program_renstra);
//         $('#thn_id_program_edit').val(data.id_program_renstra);
// 	    $('#no_urut_program_edit').val(data.thn_id);
// 	    $('#pagu1_edit').val(data.pagu_tahun1a);
// 	    $('#pagu2_edit').val(data.pagu_tahun2a);
// 	    $('#pagu3_edit').val(data.pagu_tahun3a);
// 	    $('#pagu4_edit').val(data.pagu_tahun4a);
//         $('#pagu5_edit').val(data.pagu_tahun5a);
//         $('#pagu6_edit').val(data.pagu_tahun6a);
// 	    $('#ur_program_renstra_edit').val(data.nm_program);
//         $('#id_sasaran_program_edit').val(data.kd_sasaran);
//         $('#kd_program_edit').val(data.kd_program);
//         $('#ur_program_rpjmd_edit').val(data.nm_program_rpjmd); 
//         $('#id_program_rpjmd_edit').val(data.id_program_rpjmd); 
//         $('#id_program_ref_edit').val(data.id_program_ref);        
// 	    $('#ModalProgram').modal('show');
// 	});

// $('.modal-footer').on('click', '.editprogram', function() {
// $.ajaxSetup({
//    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
// });

//     $.ajax({
//         type: 'post',
//         url: './renstra/editprogram',
//         data: {
//             '_token': $('input[name=_token]').val(),
//             'id_program_renstra_edit': $('#id_program_renstra_edit').val(),
//             'no_urut_program_edit': $('#no_urut_program_edit').val(),
//             'id_sasaran_renstra_program_edit': $('#id_sasaran_program_edit').val(),
//             'pagu1_edit': $('#pagu1_edit').val(),
//             'pagu2_edit': $('#pagu2_edit').val(),
//             'pagu3_edit': $('#pagu3_edit').val(),
//             'pagu4_edit': $('#pagu4_edit').val(),
//             'pagu5_edit': $('#pagu5_edit').val(),
//             'ur_program_renstra_edit': $('#ur_program_renstra_edit').val(),
//         },
//         success: function(data) {
//             $('#tblProgram').DataTable().ajax.reload(null,false);
//                 if(data.status_pesan==1){
//                     createPesan(data.pesan,"success");
//                     } else {
//                     createPesan(data.pesan,"danger"); 
//                 }
//         }
//     });
// });

  var tbl_Kegiatan;
  tbl_Kegiatan = $('#tblKegiatan').DataTable( {
          processing: true,
          serverSide: true,
          responsive: true,
          dom : 'BFRTIP',                  
          autoWidth : false,
          order: [[0, 'asc']],
          bDestroy: true,
          language: {
                "decimal": ",",
                "thousands": "."},
          "ajax": {"url": "./renstra/kegiatan/0"},
          "columns": [
                {
                  "className":      'details-control',
                  "orderable":      false,
                  "searchable":      false,
                  "data":           null,
                  "defaultContent": '',
                  "width" : "5px"
                },
              { data: 'kd_program', sClass: "dt-center"},
              { data: 'no_urut', sClass: "dt-center"},
              { data: 'ur_kegiatan'},
              { data: 'pagu_tahun1',
                    render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
              { data: 'pagu_tahun2',
                    render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
              { data: 'pagu_tahun3',
                    render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
              { data: 'pagu_tahun4',
                    render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
              { data: 'pagu_tahun5',
                    render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
              { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
              ],
            "columnDefs": [ {
                "visible": false
              } ],
                  "order": [[2, 'asc']],
                  "bDestroy": true
            } );


  var tblInKegiatan;
    function initInKegiatan(tableId, data) {
        tblInKegiatan=$('#' + tableId).DataTable({
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

  $('#tblKegiatan tbody').on('click', 'td.details-control', function () {
      var tr = $(this).closest('tr');
      var row = tbl_Kegiatan.row( tr );
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

@include('renstra.JsRenstraKegiatanIndikator');

//   $(document).on('click', '.btnDetailKegiatan', function() {

//       var data = tbl_Kegiatan.row( $(this).parents('tr') ).data();

// 	    $('.actionBtn_kegiatan').addClass('editkegiatan');
// 	    $('.modal-title').text('Detail Data Kegiatan SKPD');
// 	    $('.form-horizontal').show();        
//         $('#id_kegiatan_renstra_edit').val(data.id_kegiatan_renstra);
//         $('#thn_id_kegiatan_edit').val(data.thn_id);
// 	    $('#no_urut_kegiatan_edit').val(data.no_urut);
// 	    $('#pagu1_edit_kegiatan').val(data.pagu_tahun1a);
// 	    $('#pagu2_edit_kegiatan').val(data.pagu_tahun2a);
// 	    $('#pagu3_edit_kegiatan').val(data.pagu_tahun3a);
// 	    $('#pagu4_edit_kegiatan').val(data.pagu_tahun4a);
//         $('#pagu5_edit_kegiatan').val(data.pagu_tahun5a);
//         $('#pagu6_edit_kegiatan').val(data.pagu_tahun6a);
// 	    $('#ur_kegiatan_renstra_edit').val(data.nm_kegiatan);
//         $('#kd_program_kegiatan_edit').val(data.kd_program);
//         $('#id_program_renstra_kegiatan_edit').val(data.id_program_renstra);
//         $('#kd_kegiatan_edit').val(data.kd_kegiatan); 
//         $('#id_kegiatan_ref_edit').val(data.id_kegiatan_ref);
//         $('#ModalKegiatan').modal('show');
// 	  });

// $('.modal-footer').on('click', '.editkegiatan', function() {
// $.ajaxSetup({
//    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
// });

// $.ajax({
//     type: 'post',
//     url: './renstra/editkegiatan',
//     data: {
//         '_token': $('input[name=_token]').val(),
//         'id_kegiatan_renstra_edit': $('#id_kegiatan_renstra_edit').val(),
//         'pagu1_edit': $('#pagu1_edit_kegiatan').val(),
//         'pagu2_edit': $('#pagu2_edit_kegiatan').val(),
//         'pagu3_edit': $('#pagu3_edit_kegiatan').val(),
//         'pagu4_edit': $('#pagu4_edit_kegiatan').val(),
//         'pagu5_edit': $('#pagu5_edit_kegiatan').val(),
//         'ur_kegiatan_renstra_edit': $('#ur_kegiatan_renstra_edit').val(),
//     },
//     success: function(data) {
//         $('#tblKegiatan').DataTable().ajax.reload(null,false);
//               if(data.status_pesan==1){
//                 createPesan(data.pesan,"success");
//                 } else {
//                 createPesan(data.pesan,"danger"); 
//               }
//     }
// });
// });

  var tbl_Pelaksana;
  tbl_Pelaksana = $('#tblPelaksana').DataTable( {
          processing: true,
          serverSide: true,
          responsive: true,
          dom : 'BFRTIP',                  
          autoWidth : false,
          order: [[0, 'asc']],
          bDestroy: true,
          language: {
                "decimal": ",",
                "thousands": "."},
          "ajax": {"url": "./renstra/kegiatanpelaksana/0"},
          "columns": [
              { data: 'kd_kegiatan', sClass: "dt-center"},
              { data: 'kd_sub', sClass: "dt-center"},
              { data: 'nm_sub'},
              { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
            ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
          } );
  $(document).on('click', '.edit-pelaksana-kegiatan', function() {

      var data = tbl_Pelaksana.row( $(this).parents('tr') ).data();

	    $('.actionBtn_pelaksana_kegiatan').addClass('editpelaksanakegiatan');
	    $('.modal-title').text('Edit Data Pelaksana Kegiatan SKPD');
	    $('.form-horizontal').show();
	    $('#id_pelaksana').val($(this).data('id_kegiatan_renstra_pelaksana'));
	    $('select[name="pelaksana"]').empty();
	    $('select[name="pelaksana"]').append('<option value="'+data.id_sub_unit+'">'+data.nm_sub+'</option>');
	    
         
         $.ajax({
             type: "GET",
             url: './renstra/getsubunit/'+data.id_sub_unit,
             dataType: "json",
             success: function(data) {

             var j = data.length;
             var post, i;
            
             for (i = 0; i < j; i++) {
               post = data[i];
               $('select[name="pelaksana"]').append('<option value="'+ post.id_sub_unit +'">'+ post.nm_sub +'</option>');
             }
             }
         });
         $('#ModalKegiatanPelaksana').modal('show');
	  });

$( ".cbUnit" ).change(function() {
      id_unit_renstra =  $('#id_unit').val();
      $('#tblVisi').DataTable().ajax.url("./renstra/visi/"+id_unit_renstra).load();
      $('#tblMisi').DataTable().ajax.url("./renstra/misi/0").load();
});

var cariindikator
$(document).on('click', '.btnCariIndi', function() {    
    $('#judulModal').text('Daftar Indikator yang terdapat dalam RPJMD/Renstra');    
    $('#cariIndikator').modal('show');

    cariindikator = $('#tblCariIndikator').DataTable( {
        processing: true,
        serverSide: true,
        dom: 'bfrtIp',
        autoWidth : false,
        "ajax": {"url": "./admin/parameter/getRefIndikator"},
        "columns": [
              { data: 'no_urut'},
              { data: 'nm_indikator'},
              { data: 'uraian_satuan'},
              { data: 'type_display'},
              { data: 'kualitas_display'},
              { data: 'jenis_display'},
              { data: 'sifat_display'}
            ],
        "order": [[0, 'asc']],
        "bDestroy": true
    });
});

$('#tblCariIndikator tbody').on( 'dblclick', 'tr', function () {
    var data = cariindikator.row(this).data();

    document.getElementById("ur_indikator_tujuan_renstra").value = data.nm_indikator;
    document.getElementById("kd_indikator_tujuan_renstra").value = data.id_indikator;
    document.getElementById("satuan_tujuan_indikator_edit").value = data.uraian_satuan;


    document.getElementById("ur_indikator_sasaran_renstra").value = data.nm_indikator;
    document.getElementById("kd_indikator_sasaran_renstra").value = data.id_indikator;
    document.getElementById("satuan_sasaran_indikator_edit").value = data.uraian_satuan;

    document.getElementById("ur_indikator_program_renstra").value = data.nm_indikator;
    document.getElementById("kd_indikator_program_renstra").value = data.id_indikator;
    document.getElementById("satuan_program_indikator_edit").value = data.uraian_satuan;

    document.getElementById("ur_indikator_kegiatan_renstra").value = data.nm_indikator;
    document.getElementById("kd_indikator_kegiatan_renstra").value = data.id_indikator;
    document.getElementById("satuan_kegiatan_indikator_edit").value = data.uraian_satuan;

    $('#cariIndikator').modal('hide');    

  });


var cariindikatorrpjmd
$(document).on('click', '.btnCariIndiSasaranRpjmd', function() {    
    $('#judulModal').text('Daftar Indikator yang terdapat dalam RPJMD/Renstra');    
    $('#ModalCariSasaranIndikatorRpjmd').modal('show');

    cariindikatorrpjmd = $('#tblCariSasaranIndikatorRpjmd').DataTable( {
        processing: true,
        serverSide: true,
        dom: 'bfrtIp',
        autoWidth : false,
        bDestroy: true,
        language: {
              "decimal": ",",
              "thousands": "."},
        "ajax": {"url": "./renstra/getIndikatorSasaranRpjmd/"+$('#id_indikator_sasaran_rpjmd_x').val()},
        "columns": [
              { data: 'no_urut'},
              { data: 'uraian_sasaran_rpjmd'},
              { data: 'nm_indikator'},
              { data: 'angka_tahun1',
                    render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
              { data: 'angka_tahun2',
                    render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
              { data: 'angka_tahun3',
                    render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
              { data: 'angka_tahun4',
                    render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
              { data: 'angka_tahun5',
                    render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
              { data: 'angka_akhir_periode',
                    render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
              { data: 'uraian_satuan'}
            ],
        "order": [[0, 'asc']],
        "bDestroy": true
    });
});

$('#tblCariSasaranIndikatorRpjmd tbody').on( 'dblclick', 'tr', function () {
    var data = cariindikatorrpjmd.row(this).data();

    document.getElementById("ur_indikator_sasaran_rpjmd").value = data.nm_indikator;
    document.getElementById("id_indikator_sasaran_rpjmd_x").value = data.id_sasaran_renstra;
    document.getElementById("id_indikator_sasaran_rpjmd").value = data.id_indikator_sasaran_renstra;

    $('#ModalCariSasaranIndikatorRpjmd').modal('hide');    

  });

@include('renstra.JsRenstraVisi');

$('#tblVisi tbody').on( 'dblclick', 'tr', function () {
  var data = tbl_Visi.row(this).data();
  id_visi_renstra =  data.id_visi_renstra;

  $('.nav-tabs a[href="#misi"]').tab('show');
  $('#tblMisi').DataTable().ajax.url("./renstra/misi/"+id_visi_renstra).load();
  $('#tblTujuan').DataTable().ajax.url("./renstra/tujuan/0").load();
});

@include('renstra.JsRenstraMisi');

$('#tblMisi tbody').on( 'dblclick', 'tr', function () {

    var data = tbl_Misi.row(this).data();
    id_misi_renstra =  data.id_misi_renstra;

    $('.nav-tabs a[href="#tujuan"]').tab('show');
      $('#tblTujuan').DataTable().ajax.url("./renstra/tujuan/"+id_misi_renstra).load();
      $('#tblSasaran').DataTable().ajax.url("./renstra/sasaran/0").load();

});

$('#tblTujuan tbody').on( 'dblclick', 'tr', function () {

    var data = tbl_Tujuan.row(this).data();
    id_tujuan_renstra =  data.id_tujuan_renstra;

    $('.nav-tabs a[href="#sasaran"]').tab('show');
      $('.nav-tabs a[href="#sasaran1"]').tab('show');
      $('#tblSasaran').DataTable().ajax.url("./renstra/sasaran/"+id_tujuan_renstra).load();
      $('#tblKebijakan').DataTable().ajax.url("./renstra/kebijakan/0").load();
      $('#tblStrategi').DataTable().ajax.url("./renstra/strategi/0").load();

});

@include('renstra.JsRenstraTujuan');
@include('renstra.JsRenstraTujuanIndikator');


@include('renstra.JsRenstraKegiatan');

$('#tblSasaran tbody').on( 'dblclick', 'tr', function () {

    var data = tbl_Sasaran.row(this).data();
    id_sasaran_renstra =  data.id_sasaran_renstra;

    $('.nav-tabs a[href="#program"]').tab('show');
      $('.nav-tabs a[href="#program1"]').tab('show');
      $('#tblProgram').DataTable().ajax.url("./renstra/program/"+id_sasaran_renstra).load();
      $('#tblKegiatan').DataTable().ajax.url("./renstra/kegiatan/0").load();

});

$('#tblProgram tbody').on( 'dblclick', 'tr', function () {
    var data = tbl_Program.row(this).data();
    id_program_renstra =  data.id_program_renstra;

    $('.nav-tabs a[href="#kegiatan"]').tab('show');
        $('.nav-tabs a[href="#kegiatan1"]').tab('show');
        $('#tblKegiatan').DataTable().ajax.url("./renstra/kegiatan/"+id_program_renstra).load();
        $('#tblPelaksana').DataTable().ajax.url("./renstra/kegiatanpelaksana/0").load();

});

$('#tblKegiatan tbody').on( 'dblclick', 'tr', function () {
    var data = tbl_Kegiatan.row(this).data();
    id_kegiatan_renstra =  data.id_kegiatan_renstra;

    $('.nav-tabs a[href="#pelaksana"]').tab('show');
    $('#tblPelaksana').DataTable().ajax.url("./renstra/kegiatanpelaksana/"+id_kegiatan_renstra).load();

});

$(document).on('click', '.view-renstrakebijakan', function() {
    id_sasaran_renstra =  $(this).data('id_sasaran');
    $('.nav-tabs a[href="#kebijakan"]').tab('show');
    $('#tblKebijakan').DataTable().ajax.url("./renstra/kebijakan/"+id_sasaran_renstra).load();
  });

$(document).on('click', '.view-renstrastrategi', function() {
    id_sasaran_renstra =  $(this).data('id_sasaran');
    $('.nav-tabs a[href="#strategi"]').tab('show');
    $('#tblStrategi').DataTable().ajax.url("./renstra/strategi/"+id_sasaran_renstra).load();
  });

$(document).on('click', '.view-kegiatanpelaksana', function() {
        id_kegiatan_renstra =  $(this).data('id_kegiatan');
        $('.nav-tabs a[href="#pelaksana"]').tab('show');
        $('#tblPelaksana').DataTable().ajax.url("./renstra/kegiatanpelaksana/"+id_kegiatan_renstra).load();
    });

  $(document).on('click', '.btnPrintKompilasiProgramdanPaguRenstra', function() {
    window.open('./PrintProgPaguRenstra');
  });

} );
</script>
@endsection
