@extends('layouts.app1')

@section('content')
  @if (Auth::guest())
  {{-- <li><a href="{{ url('/')}}">Dashboard</a></li> --}}
  @else
  <div class="container-fluid">
    <div class="row">
      <div class="">
        <ul class="breadcrumb">
          <li><a href="{{ url('/') }}">RPJMD - RENSTRA</a></li>
          <li class="active">RENSTRA SKPD</li>
        </ul>
        <div class="panel panel-info">
          <div class="panel-heading">
            <h2 class="panel-title">Data Rencana Strategis SKPD</h2>
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
                <label class="control-label col-sm-3" for="id_unit">Unit Penyusun Renstra :</label>
                <div class="col-sm-8">
                  <select class="form-control cbUnit" name="id_unit" id="id_unit">
                    @foreach($dataunit as $val)
                      <option value={{ $val->id_unit }}>{{ $val->nm_unit }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <br>
              <br>
              <div class="table-responsive">
              <table id='tblVisi' class="table compact table-responsive table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th width="10%" style="text-align: center">No Visi</th>
                          <th style="text-align: center">Uraian Visi</th>
                          <th width="15%" style="text-align: center; vertical-align:middle">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                  </tbody>
            </table>
            </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="misi">
              <br>
              <div class="table-responsive">
              <table id="tblMisi" class="table compact table-responsive table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th width="10%" style="text-align: center; vertical-align:middle">Kode Visi</th>
                          <th width="10%" style="text-align: center; vertical-align:middle">Kode Misi</th>
                          <th style="text-align: center; vertical-align:middle">Uraian Misi</th>
                          <th width="15%" style="text-align: center; vertical-align:middle">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                  </tbody>
            </table>
            </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="tujuan">
            <br>
            <div class="table-responsive">
            <table id="tblTujuan" class="table compact table-responsive table-striped table-bordered"  cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th width="10%" style="text-align: center; vertical-align:middle">Kode Misi</th>
                          <th width="10%" style="text-align: center; vertical-align:middle">No Tujuan</th>
                          <th style="text-align: center; vertical-align:middle">Uraian Tujuan</th>
                          <th width="15%" style="text-align: center; vertical-align:middle">Aksi</th>
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
                <li><a href="#kebijakan" aria-controls="tujuan" role="tab" data-toggle="tab">Kebijakan</a></li>
                <li><a href="#strategi" aria-controls="sasaran" role="tab" data-toggle="tab">Strategi</a></li>
            </ul>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="sasaran1">
              <br>
              <div class="table-responsive">
                <table id="tblSasaran" class="table compact table-responsive table-striped table-bordered"  cellspacing="0" width="100%">
                      <thead>
                          <tr>
                              <th width="10%" style="text-align: center; vertical-align:middle">Kode Tujuan</th>
                              <th width="10%" style="text-align: center; vertical-align:middle">Kode Sasaran</th>
                              <th style="text-align: center; vertical-align:middle">Uraian Sasaran</th>
                              <th width="15%" style="text-align: center; vertical-align:middle">Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                      </tbody>
                </table>
              </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="kebijakan">
              <br>
              <div class="table-responsive">
                <table id="tblKebijakan" class="table compact table-responsive table-striped table-bordered"  cellspacing="0" width="100%">
                      <thead>
                          <tr>
                              <th width="10%" style="text-align: center; vertical-align:middle">Kode Sasaran</th>
                              <th width="10%" style="text-align: center; vertical-align:middle">No Urut</th>
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
              <div class="table-responsive">
                <table id="tblStrategi" class="table compact table-responsive table-striped table-bordered"  cellspacing="0" width="100%">
                      <thead>
                          <tr>
                              <th width="10%" style="text-align: center; vertical-align:middle">Kode Sasaran</th>
                              <th width="10%" style="text-align: center; vertical-align:middle">No Urut</th>
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
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#program1" aria-controls="visi" role="tab" data-toggle="tab">Program</a></li>
                <li><a href="#indikatorprogram" aria-controls="misi" role="tab" data-toggle="tab">Indikator Program</a></li>
            </ul>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="program1">
              <br>
              <div class="table-responsive">
                <table id="tblProgram" class="table compact table-responsive table-striped table-bordered"  cellspacing="0" width="100%">
                  <thead>
                      <tr>
                        <th rowspan="2" width="10%" style="text-align: center; vertical-align:middle">Kode Sasaran</th>
                        <th rowspan="2" width="10%" style="text-align: center; vertical-align:middle">Kode Program</th>
                        <th rowspan="2" style="text-align: center; vertical-align:middle">Uraian Program SKPD</th>
                        <th colspan="5" style="text-align: center; vertical-align:middle">Pagu Program per Tahun (juta rupiah)</th>
                        <th rowspan="2" width="15%" style="text-align: center; vertical-align:middle">Aksi</th>
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
              <div role="tabpanel" class="tab-pane" id="indikatorprogram">
              <br>
              <div class="table-responsive">
                <table id="tblIndikatorProgram" class="table compact table-responsive table-striped table-bordered"  cellspacing="0" width="100%">
                      <thead>
                          <tr>
                          <th rowspan="2" width="10%" style="text-align: center; vertical-align:middle">Kode Program</th>
                          <th rowspan="2" width="10%" style="text-align: center; vertical-align:middle">No Urut</th>
                          <th rowspan="2" style="text-align: center; vertical-align:middle">Uraian Indikator</th>
                          <th colspan="5" style="text-align: center; vertical-align:middle">Target Indikator per Tahun</th>
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
            </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="kegiatan">
            <br>
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#kegiatan1" aria-controls="kegiatan" role="tab" data-toggle="tab">Kegiatan</a></li>
                <li><a href="#indikatorkegiatan" aria-controls="kegiatan" role="tab" data-toggle="tab">Indikator Kegiatan</a></li>
                <li><a href="#pelaksana" aria-controls="kegiatan" role="tab" data-toggle="tab">Sub Unit Pelaksana</a></li>
            </ul>
           <div class="tab-content">
              <br>
              <div role="tabpanel" class="tab-pane active" id="kegiatan1">
              <div class="table-responsive">
              <table id="tblKegiatan" class="table compact table-responsive table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th rowspan="2" width="10%" style="text-align: center; vertical-align:middle">Kode Program</th>
                      <th rowspan="2" width="10%" style="text-align: center; vertical-align:middle">Kode Kegiatan</th>
                      <th rowspan="2" style="text-align: center; vertical-align:middle">Uraian Kegiatan SKPD</th>
                      <th colspan="5" style="text-align: center; vertical-align:middle">Pagu Kegiatan per Tahun (juta rupiah)</th>
                      <th rowspan="2" width="15%" style="text-align: center; vertical-align:middle">Aksi</th>
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
              <div role="tabpanel" class="tab-pane" id="indikatorkegiatan">
              <br>
              <div class="table-responsive">
                <table id="tblIndikatorkegiatan" class="table compact table-responsive table-striped table-bordered"  cellspacing="0" width="100%">
                      <thead>
                      <tr>
                          <th rowspan="2" width="10%" style="text-align: center; vertical-align:middle">Kode Kegiatan</th>
                          <th rowspan="2" width="10%" style="text-align: center; vertical-align:middle">No Urut</th>
                          <th rowspan="2" style="text-align: center; vertical-align:middle">Uraian Indikator</th>
                          <th colspan="6" style="text-align: center; vertical-align:middle">Target Indikator per Tahun</th>
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
                <div class="table-responsive">
                  <table id="tblPelaksana" class="table compact table-responsive table-striped table-bordered"  cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="10%" style="text-align: center; vertical-align:middle">Kode Kegiatan</th>
                                <th width="10%" style="text-align: center; vertical-align:middle">Kode Unit</th>
                                <th style="text-align: center; vertical-align:middle">Uraian Sub Unit Pelaksana</th>
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
@endsection



@section('scripts')
<script type="text/javascript" language="javascript" class="init">
$(document).ready(function() {
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

  var tbl_Visi = $('#tblVisi').DataTable( {
          processing: true,
          serverSide: true,
          autoWidth : false,
          dom : 'BfRtIp',
          "ajax": "{{url('/renstra/visi/0')}}",
          "columns": [
                { data: 'no_urut', sClass: "dt-center"},
                { data: 'uraian_visi_renstra'},
                { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
              ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        } );

  var tbl_Misi = $('#tblMisi').DataTable( {
          processing: true,
          serverSide: true,
          autoWidth : false,
          dom : 'BfRtIp',
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

  var tbl_Tujuan = $('#tblTujuan').DataTable( {
          processing: true,
          serverSide: true,
          autoWidth : false,
          dom : 'BfRtIp',
          "ajax": {"url": "./renstra/tujuan/0"},
          "columns": [
                { data: 'kd_misi', sClass: "dt-center"},
                { data: 'no_urut', sClass: "dt-center"},
                { data: 'uraian_tujuan_renstra'},
                { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
              ],
                  "order": [[1, 'asc']],
                  "bDestroy": true
          } );

  var tbl_Sasaran = $('#tblSasaran').DataTable( {
          processing: true,
          serverSide: true,
          autoWidth : false,
          dom : 'BfRtIp',
          "ajax": {"url": "./renstra/sasaran/0"},
          "columns": [
                { data: 'kd_tujuan', sClass: "dt-center"},
                { data: 'no_urut', sClass: "dt-center"},
                { data: 'uraian_sasaran_renstra'},
                { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
              ],
                  "order": [[1, 'asc']],
                  "bDestroy": true
            } );

  var tbl_Kebijakan = $('#tblKebijakan').DataTable( {
          processing: true,
          serverSide: true,
          autoWidth : false,
          dom : 'BfRtIp',
          "ajax": {"url": "./renstra/kebijakan/0"},
          "columns": [
                { data: 'kd_sasaran', sClass: "dt-center"},
                { data: 'no_urut', sClass: "dt-center"},
                { data: 'uraian_kebijakan_renstra'}
              ],
                  "order": [[1, 'asc']],
                  "bDestroy": true
            } );

  var tbl_Strategi = $('#tblStrategi').DataTable( {
          processing: true,
          serverSide: true,
          autoWidth : false,
          dom : 'BfRtIp',
          "ajax": {"url": "./renstra/strategi/0"},
          "columns": [
                { data: 'kd_sasaran', sClass: "dt-center"},
                { data: 'no_urut', sClass: "dt-center"},
                { data: 'uraian_strategi_renstra'}
              ],
                  "order": [[1, 'asc']],
                  "bDestroy": true
          } );

  var tbl_Program = $('#tblProgram').DataTable( {
          processing: true,
          serverSide: true,
          autoWidth : false,
          dom : 'BfRtIp',
          "ajax": {"url": "./renstra/program/0"},
          "language": {
                "decimal": ",",
                "thousands": "."},
          "columns": [
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
                  "order": [[1, 'asc']],
                  "bDestroy": true
          } );

  var tbl_IndikatorProgram = $('#tblIndikatorProgram').DataTable( {
          processing: true,
          serverSide: true,
          autoWidth : false,
          dom : 'BfRtIp',
          "ajax": {"url": "./renstra/programindikator/0"},
          "language": {
                "decimal": ",",
                "thousands": "."},
          "columns": [
                { data: 'kd_program', sClass: "dt-center"},
                { data: 'no_urut', sClass: "dt-center"},
                { data: 'uraian_indikator_program_renstra'},
                { data: 'angka_tahun1',
                      render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
                { data: 'angka_tahun2',
                      render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
                { data: 'angka_tahun3',
                      render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
                { data: 'angka_tahun4',
                      render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
                { data: 'angka_tahun5',
                      render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"}
              ],
          "columnDefs": [ {
              "visible": false
              } ],
                  "order": [[1, 'asc']],
                  "bDestroy": true
          } );

  var tbl_Kegiatan = $('#tblKegiatan').DataTable( {
          processing: true,
          serverSide: true,
          autoWidth : false,
          dom : 'BfRtIp',
          "ajax": {"url": "./renstra/kegiatan/0"},
          "language": {
              "decimal": ",",
              "thousands": "."},
          "columns": [
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
                  "order": [[1, 'asc']],
                  "bDestroy": true
            } );

  var tbl_Indikatorkegiatan = $('#tblIndikatorkegiatan').DataTable( {
          processing: true,
          serverSide: true,
          autoWidth : false,
          dom : 'BfRtIp',
          "ajax": {"url": "./renstra/kegiatanindikator/0"},
          "language": {
              "decimal": ",",
              "thousands": "."},
          "columns": [
              { data: 'kd_kegiatan', sClass: "dt-center"},
              { data: 'no_urut', sClass: "dt-center"},
              { data: 'uraian_indikator_kegiatan_renstra'},
              { data: 'angka_tahun1',
                    render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
              { data: 'angka_tahun2',
                    render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
              { data: 'angka_tahun3',
                    render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
              { data: 'angka_tahun4',
                    render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
              { data: 'angka_tahun5',
                    render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"}
              ],
          "columnDefs": [ {
                "visible": false
              } ],
                  "order": [[1, 'asc']],
                  "bDestroy": true
          } );

  var tbl_Pelaksana = $('#tblPelaksana').DataTable( {
          processing: true,
          serverSide: true,
          autoWidth : false,
          dom : 'BfRtIp',
          "ajax": {"url": "./renstra/kegiatanpelaksana/0"},
          "columns": [
              { data: 'kd_kegiatan', sClass: "dt-center"},
              { data: 'kd_sub', sClass: "dt-center"},
              { data: 'nm_sub'}
            ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
          } );

  $( ".cbUnit" ).change(function() {
      // alert( $('#id_unit').val() );
      id_unit_renstra =  $('#id_unit').val();
      $('#tblVisi').DataTable().ajax.url("./renstra/visi/"+id_unit_renstra).load();
      $('#tblMisi').DataTable().ajax.url("./renstra/misi/0").load();
    });

  $(document).on('click', '.view-renstramisi', function() {
      id_visi_renstra =  $(this).data('id_visi');
      $('.nav-tabs a[href="#misi"]').tab('show');
      $('#tblMisi').DataTable().ajax.url("./renstra/misi/"+id_visi_renstra).load();
      $('#tblTujuan').DataTable().ajax.url("./renstra/tujuan/0").load();
    });

$('#tblVisi tbody').on( 'dblclick', 'tr', function () {

    var data = tbl_Visi.row(this).data();

    id_visi_renstra =  data.id_visi_renstra;

    $('.nav-tabs a[href="#misi"]').tab('show');
      $('#tblMisi').DataTable().ajax.url("./renstra/misi/"+id_visi_renstra).load();
      $('#tblTujuan').DataTable().ajax.url("./renstra/tujuan/0").load();

});

  $(document).on('click', '.view-renstratujuan', function() {
      id_misi_renstra =  $(this).data('id_misi');
      $('.nav-tabs a[href="#tujuan"]').tab('show');
      $('#tblTujuan').DataTable().ajax.url("./renstra/tujuan/"+id_misi_renstra).load();
      $('#tblSasaran').DataTable().ajax.url("./renstra/sasaran/0").load();
    });

$('#tblMisi tbody').on( 'dblclick', 'tr', function () {

    var data = tbl_Misi.row(this).data();

    id_misi_renstra =  data.id_misi_renstra;

    $('.nav-tabs a[href="#tujuan"]').tab('show');
      $('#tblTujuan').DataTable().ajax.url("./renstra/tujuan/"+id_misi_renstra).load();
      $('#tblSasaran').DataTable().ajax.url("./renstra/sasaran/0").load();

});

  $(document).on('click', '.view-renstrasasaran', function() {
      id_tujuan_renstra =  $(this).data('id_tujuan');
      $('.nav-tabs a[href="#sasaran"]').tab('show');
      $('.nav-tabs a[href="#sasaran1"]').tab('show');
      $('#tblSasaran').DataTable().ajax.url("./renstra/sasaran/"+id_tujuan_renstra).load();
      $('#tblKebijakan').DataTable().ajax.url("./renstra/kebijakan/0").load();
      $('#tblStrategi').DataTable().ajax.url("./renstra/strategi/0").load();
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

  $(document).on('click', '.view-renstraprogram', function() {
      id_sasaran_renstra =  $(this).data('id_sasaran');
      $('.nav-tabs a[href="#program"]').tab('show');
      $('.nav-tabs a[href="#program1"]').tab('show');
      $('#tblProgram').DataTable().ajax.url("./renstra/program/"+id_sasaran_renstra).load();
      $('#tblIndikatorProgram').DataTable().ajax.url("./renstra/programindikator/0").load();
      $('#tblKegiatan').DataTable().ajax.url("./renstra/kegiatan/0").load();
    });

$('#tblSasaran tbody').on( 'dblclick', 'tr', function () {

    var data = tbl_Sasaran.row(this).data();

    id_sasaran_renstra =  data.id_sasaran_renstra;

    $('.nav-tabs a[href="#program"]').tab('show');
      $('.nav-tabs a[href="#program1"]').tab('show');
      $('#tblProgram').DataTable().ajax.url("./renstra/program/"+id_sasaran_renstra).load();
      $('#tblIndikatorProgram').DataTable().ajax.url("./renstra/programindikator/0").load();
      $('#tblKegiatan').DataTable().ajax.url("./renstra/kegiatan/0").load();

});

  $(document).on('click', '.view-renstraindikator', function() {
      id_program_renstra =  $(this).data('id_program');
      $('.nav-tabs a[href="#indikatorprogram"]').tab('show');
      $('#tblIndikatorProgram').DataTable().ajax.url("./renstra/programindikator/"+id_program_renstra).load();
    });

  $(document).on('click', '.view-renstrakegiatan', function() {
        id_program_renstra =  $(this).data('id_program');
        $('.nav-tabs a[href="#kegiatan"]').tab('show');
        $('.nav-tabs a[href="#kegiatan1"]').tab('show');
        $('#tblKegiatan').DataTable().ajax.url("./renstra/kegiatan/"+id_program_renstra).load();
        $('#tblIndikatorKegiatan').DataTable().ajax.url("./renstra/kegiatanindikator/0").load();
        $('#tblPelaksana').DataTable().ajax.url("./renstra/kegiatanpelaksana/0").load();
      });

$('#tblProgram tbody').on( 'dblclick', 'tr', function () {

    var data = tbl_Program.row(this).data();

    id_program_renstra =  data.id_program_renstra;

    $('.nav-tabs a[href="#kegiatan"]').tab('show');
        $('.nav-tabs a[href="#kegiatan1"]').tab('show');
        $('#tblKegiatan').DataTable().ajax.url("./renstra/kegiatan/"+id_program_renstra).load();
        $('#tblIndikatorKegiatan').DataTable().ajax.url("./renstra/kegiatanindikator/0").load();
        $('#tblPelaksana').DataTable().ajax.url("./renstra/kegiatanpelaksana/0").load();

});

  $(document).on('click', '.view-kegiatanindikator', function() {
        id_kegiatan_renstra =  $(this).data('id_kegiatan');
        $('.nav-tabs a[href="#indikatorkegiatan"]').tab('show');
        $('#tblIndikatorkegiatan').DataTable().ajax.url("./renstra/kegiatanindikator/"+id_kegiatan_renstra).load();
      });

  $(document).on('click', '.view-kegiatanpelaksana', function() {
        id_kegiatan_renstra =  $(this).data('id_kegiatan');
        $('.nav-tabs a[href="#pelaksana"]').tab('show');
        $('#tblPelaksana').DataTable().ajax.url("./renstra/kegiatanpelaksana/"+id_kegiatan_renstra).load();
    });

} );
</script>
@endsection
