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
                  <select class="form-control cbUnit" name="id_unit" id="id_unit"></select>
                </div>
                <button type="button" class="btn btn-primary btn-labeled btnPrintKompilasiProgramdanPaguRenstra hidden" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="fa fa-print fa-fw fa-lg"></i></span>Cetak Kompilasi Program dan Pagu Renstra</button>
              </div>
              <br>
              <div class="">
              <table id='tblVisi' class="table compact table-responsive table-striped table-bordered display" cellspacing="0" width="100%">
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
              <table id="tblMisi" class="table compact table-responsive table-striped table-bordered display" cellspacing="0" width="100%">
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
            <button type="button" class="btn btn-primary btn-labeled btnTambahTujuan" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Tujuan Renstra</button>
            <div class="">
            <table id="tblTujuan" class="table compact table-responsive table-striped table-bordered display"  cellspacing="0" width="100%">
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
              <button type="button" class="btn btn-primary btn-labeled btnTambahSasaran" data-dismiss="modal" aria-hidden="true">
                              <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Sasaran Renstra</button>
              <div class="">
                <table id="tblSasaran" class="table compact table-responsive table-striped table-bordered display"  cellspacing="0" width="100%">
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
              <button type="button" class="btn btn-primary btn-labeled btnTambahKebijakan" data-dismiss="modal" aria-hidden="true">
                              <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Kebijakan Renstra</button>
              <div class="">
                <table id="tblKebijakan" class="table compact table-responsive table-striped table-bordered display"  cellspacing="0" width="100%">
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
              <button type="button" class="btn btn-primary btn-labeled btnTambahStrategi" data-dismiss="modal" aria-hidden="true">
                              <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Strategi Renstra</button>
              <div class="">
                <table id="tblStrategi" class="table compact table-responsive table-striped table-bordered display"  cellspacing="0" width="100%">
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
            <button type="button" class="btn btn-primary btn-labeled btnTambahProgram" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Program Renstra</button>
            <div class="">
                    <table id="tblProgram" class="table compact table-responsive table-striped table-bordered display"  cellspacing="0" width="100%">
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
              <div role="tabpanel" class="tab-pane active" id="kegiatan1">
                <br>                
                <button type="button" class="btn btn-primary btn-labeled btnTambahKegiatan" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Kegiatan Renstra</button>
              <div class="">
              <table id="tblKegiatan" class="table compact table-responsive table-striped table-bordered display" cellspacing="0" width="100%">
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
                      <button type="button" class="btn btn-primary btn-labeled btnTambahPelaksana" data-dismiss="modal" aria-hidden="true">
                          <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Pelaksana Renstra</button>
                <div class="">
                  <table id="tblPelaksana" class="table compact table-responsive table-striped table-bordered display"  cellspacing="0" width="100%">
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
    <table class="table table-striped table-bordered table-responsive compact details-table" id="inTujuan-@{{id_tujuan_renstra}}">
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
    <table class="table table-striped table-bordered table-responsive compact details-table" id="inSasaran-@{{id_sasaran_renstra}}">
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
    <table class="table table-striped table-bordered table-responsive compact details-table" id="inProgram-@{{id_program_renstra}}">
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
    <table class="table table-striped table-bordered table-responsive compact details-table" id="inKegiatan-@{{id_kegiatan_renstra}}">
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
@include('renstra.FrmRenstraStrategi')
@include('renstra.FrmRenstraKebijakan')
@include('renstra.FrmRenstraProgram')
@include('renstra.FrmRenstraProgramIndikator')
@include('renstra.FrmRenstraKegiatan')
@include('renstra.FrmRenstraKegiatanIndikator')
@include('renstra.FrmRenstraKegiatanPelaksana')
@include('bebas.FrmCariIndikator')
@include('bebas.FrmCariSasaranRPJMD')
@include('bebas.FrmCariItemRenstra')
@include('bebas.FrmCariSasaranIndikatorRpjmd')
@include('bebas.FrmCariSasaranIndikatorRenstra')
@include('bebas.FrmCariItemRenstra')
@include('bebas.FrmCariProgramRef')
@include('bebas.FrmCariKegiatanRef')
@include('bebas.FrmModalProgress')

@endsection



@section('scripts')
<script>
$(document).ready(function() {

  var detInTujuan = Handlebars.compile($("#details-inTujuan").html());
  var detInSasaran = Handlebars.compile($("#details-inSasaran").html());
  var detInProgram = Handlebars.compile($("#details-inProgram").html());
  var detInKegiatan = Handlebars.compile($("#details-inKegiatan").html());

  var id_unit_renstra, id_visi_renstra, id_misi_renstra, id_tujuan_renstra, id_sasaran_renstra, id_kebijakan_renstra, id_strategi_renstra, id_program_renstra;
  var id_indikator_program_renstra, id_kegiatan_renstra, id_indikator_kegiatan_renstra, id_pelaksana_kegiatan_renstra,thn_id,id_sasaran_rpjmd;

  function formatTgl(val_tanggal){
      var formattedDate = new Date(val_tanggal);
      var d = formattedDate.getDate();
      var m = formattedDate.getMonth();
      var y = formattedDate.getFullYear();
      var m_names = new Array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember")
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
  $('#tblVisi').DataTable({dom : 'BfRtip',});
  $('#tblMisi').DataTable({dom : 'BfRtip'});
  $('#tblTujuan').DataTable({dom : 'BfRtip'});
  $('#tblSasaran').DataTable({dom : 'BfRtip'});
  $('#tblKebijakan').DataTable({dom : 'BfRtip'});
  $('#tblStrategi').DataTable({dom : 'BfRtip'});
  $('#tblProgram').DataTable({dom : 'BfRtip'});
  $('#tblKegiatan').DataTable({dom : 'BfRtip'});
  $('#tblPelaksana').DataTable({dom : 'BfRtip'});

  $('.page-alert .close').click(function(e) {
          e.preventDefault();
          $(this).closest('.page-alert').slideUp();
  });

  $.ajax({
      type: "GET",
      url: './admin/parameter/getUnitUser',
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

  var tbl_Visi;
  function loadTblVisi(id_unit){
    tbl_Visi=$('#tblVisi').DataTable({
                  processing: true,
                  serverSide: true,
                  dom : 'BfRtip',
                  autoWidth : false,
                  "ajax": {"url": "./renstra/visi/"+id_unit},
                  "language": {
                      "decimal": ",",
                      "thousands": "."},
                  "columns": [
                    { data: 'no_urut', sClass: "dt-center"},
                    { data: 'uraian_visi_renstra'},
                    { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
                  ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        });
  };

  var tbl_Misi;
  function loadTblMisi(id_unit){
  tbl_Misi = $('#tblMisi').DataTable( {
          processing: true,
          serverSide: true,
          dom : 'BfRtip',
          autoWidth : false,
          order: [[0, 'asc']],
          bDestroy: true,
          language: {
                "decimal": ",",
                "thousands": "."},
           "ajax": {"url": "./renstra/misi/"+id_unit},
          "columns": [
                { data: 'id_visi_renstra', sClass: "dt-center"},
                { data: 'no_urut', sClass: "dt-center"},
                { data: 'uraian_misi_renstra'},
                { data: 'action', 'searchable': false, 'orderable':false , sClass: "dt-center"}
              ],
        });
  };

  var tbl_Tujuan;
  function loadTblTujuan(id_unit){
  tbl_Tujuan = $('#tblTujuan').DataTable( {
          processing: true,
          serverSide: true,
          dom : 'BfRtip',
          autoWidth : false,
          order: [[2, 'asc']],
          bDestroy: true,
          language: {
                "decimal": ",",
                "thousands": "."},
           "ajax": {"url": "./renstra/tujuan/"+id_unit},
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
          });
  };
  
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
  function loadTblSasaran(id_unit){
  tbl_Sasaran = $('#tblSasaran').DataTable( {
          processing: true,
          serverSide: true,
          dom : 'BfRtip',
          autoWidth : false,
          order: [[2, 'asc']],
          bDestroy: true,
          language: {
                "decimal": ",",
                "thousands": "."},
           "ajax": {"url": "./renstra/sasaran/"+id_unit},
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
            });
  };

  var tblInSasaran;
    function initInSasaran(tableId, data) {
        tblInSasaran=$('#' + tableId).DataTable({
                processing: true,
                serverSide: true,
                ajax: data.details_url,
                dom : 'bfrtip',
                autoWidth: false,
                "order": [[0, 'asc']],
                "bDestroy": true,
                "language": {
                          "decimal": ",",
                          "thousands": "."},
                "columns": [
                            { data: 'urut', sClass: "dt-center"},
                            { data: 'nm_indikator'},
                            { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
                          ],
            })
    };

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

  var tbl_Kebijakan;
  function loadTblKebijakan(id_unit){
  tbl_Kebijakan = $('#tblKebijakan').DataTable( {
          processing: true,
          serverSide: true,
          dom : 'BfRtip',
          autoWidth : false,
          order: [[0, 'asc']],
          bDestroy: true,
          language: {
                "decimal": ",",
                "thousands": "."},
           "ajax": {"url": "./renstra/kebijakan/"+id_unit},
          "columns": [
                { data: 'kd_sasaran', sClass: "dt-center"},
                { data: 'no_urut', sClass: "dt-center"},
                { data: 'uraian_kebijakan_renstra'}
              ],
            });
  };

  var tbl_Strategi;
  function loadTblStrategi(id_unit){
  tbl_Strategi = $('#tblStrategi').DataTable( {
          processing: true,
          serverSide: true,
          dom : 'BfRtip',
          autoWidth : false,
          order: [[0, 'asc']],
          bDestroy: true,
          language: {
                "decimal": ",",
                "thousands": "."},
          "ajax": {"url": "./renstra/strategi/"+id_unit},
          "columns": [
                { data: 'kd_sasaran', sClass: "dt-center"},
                { data: 'no_urut', sClass: "dt-center"},
                { data: 'uraian_strategi_renstra'}
              ],
          });
  };

  var tbl_Program;
  function loadTblProgram(id_unit){
  tbl_Program = $('#tblProgram').DataTable( {
          processing: true,
          serverSide: true,
          dom : 'BfRtip',
          autoWidth : false,
          order: [[0, 'asc']],
          bDestroy: true,
          language: {
                "decimal": ",",
                "thousands": "."},
          "ajax": {"url": "./renstra/program/"+id_unit},
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
          });
  };

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
    };

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

  var tbl_Kegiatan;
  function loadTblKegiatan(id_unit){
  tbl_Kegiatan = $('#tblKegiatan').DataTable( {
          processing: true,
          serverSide: true,
          dom : 'BfRtip',
          autoWidth : false,
          order: [[0, 'asc']],
          bDestroy: true,
          language: {
                "decimal": ",",
                "thousands": "."},
          "ajax": {"url": "./renstra/kegiatan/"+id_unit},
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
            });
  };

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
    };

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

  var tbl_Pelaksana;
  function loadTblPelaksana(id_unit){
  tbl_Pelaksana = $('#tblPelaksana').DataTable( {
          processing: true,
          serverSide: true,
          dom : 'BfRtip',
          autoWidth : false,
          order: [[0, 'asc']],
          bDestroy: true,
          language: {
                "decimal": ",",
                "thousands": "."},
          "ajax": {"url": "./renstra/kegiatanpelaksana/"+id_unit},
          "columns": [
              { data: 'kd_kegiatan', sClass: "dt-center"},
              { data: 'kd_sub', sClass: "dt-center"},
              { data: 'nm_sub'},
              { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
            ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
          });
  };

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
      loadTblVisi(id_unit_renstra);
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

$('#tblVisi tbody').on( 'dblclick', 'tr', function () {
  var data = tbl_Visi.row(this).data();
  id_visi_renstra =  data.id_visi_renstra;
  thn_id = data.thn_id;
  $('.nav-tabs a[href="#misi"]').tab('show');
  loadTblMisi(id_visi_renstra);
});

$('#tblMisi tbody').on( 'dblclick', 'tr', function () {
    var data = tbl_Misi.row(this).data();
    id_misi_renstra =  data.id_misi_renstra;
    thn_id = data.thn_id;
    $('.nav-tabs a[href="#tujuan"]').tab('show');
      loadTblTujuan(id_misi_renstra);
});

$('#tblTujuan tbody').on( 'dblclick', 'tr', function () {
    var data = tbl_Tujuan.row(this).data();
    id_tujuan_renstra =  data.id_tujuan_renstra;
    $('.nav-tabs a[href="#sasaran"]').tab('show');
    $('.nav-tabs a[href="#sasaran1"]').tab('show');
    loadTblSasaran(id_tujuan_renstra);
});

$('#tblSasaran tbody').on( 'dblclick', 'tr', function () {
    var data = tbl_Sasaran.row(this).data();
    id_sasaran_renstra =  data.id_sasaran_renstra;
    id_sasaran_rpjmd = data.id_sasaran_rpjmd;
    $('.nav-tabs a[href="#program"]').tab('show');
    $('.nav-tabs a[href="#program1"]').tab('show');
    loadTblProgram(id_sasaran_renstra);
});

$('#tblProgram tbody').on( 'dblclick', 'tr', function () {
    var data = tbl_Program.row(this).data();
    id_program_renstra =  data.id_program_renstra;    
    id_program_ref =  data.id_program_ref;
    $('.nav-tabs a[href="#kegiatan"]').tab('show');
    $('.nav-tabs a[href="#kegiatan1"]').tab('show');
    loadTblKegiatan(id_program_renstra);
});

$('#tblKegiatan tbody').on( 'dblclick', 'tr', function () {
    var data = tbl_Kegiatan.row(this).data();
    id_kegiatan_renstra =  data.id_kegiatan_renstra;
    $('.nav-tabs a[href="#pelaksana"]').tab('show');
    loadTblPelaksana(id_kegiatan_renstra);
});

$(document).on('click', '.view-renstrakebijakan', function() {
    id_sasaran_renstra =  $(this).data('id_sasaran');
    $('.nav-tabs a[href="#kebijakan"]').tab('show');
    loadTblKebijakan(id_sasaran_renstra);
  });

$(document).on('click', '.view-renstrastrategi', function() {
    id_sasaran_renstra =  $(this).data('id_sasaran');
    $('.nav-tabs a[href="#strategi"]').tab('show');
    loadTblStrategi(id_sasaran_renstra);
  });

$(document).on('click', '.view-kegiatanpelaksana', function() {
        id_kegiatan_renstra =  $(this).data('id_kegiatan');
        $('.nav-tabs a[href="#pelaksana"]').tab('show');
        loadTblPelaksana(id_kegiatan_renstra);
});

@include('renstra.JsRenstraVisi');
@include('renstra.JsRenstraMisi');
@include('renstra.JsRenstraTujuan');
@include('renstra.JsRenstraTujuanIndikator');
@include('renstra.JsRenstraSasaran');
@include('renstra.JsRenstraSasaranIndikator');
@include('renstra.JsRenstraProgram');
@include('renstra.JsRenstraProgramIndikator');
@include('renstra.JsRenstraKegiatan');
@include('renstra.JsRenstraKegiatanIndikator');


} );
</script>
@endsection
