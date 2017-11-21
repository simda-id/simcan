@extends('layouts.app1')
<meta name="_token" content="{!! csrf_token() !!}" />
{{-- <script src="{{ asset('/js/jquery-3.1.1.min.js')}}"></script>
<script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script> --}}

@section('content')
  <div class="container-fluid col-sm-12 row">

        <ul class="breadcrumb">
          <li><a href="{{ url('/') }}">RPJMD - RENSTRA</a></li>
          <li class="active">RPJMD</li>
        </ul>
        <div class="panel panel-info">
          <div class="panel-heading">
            <h2 class="panel-title">Data Rencana Pembangunan Jangka Menengah Daerah</h2>
          </div>

          <div class="panel-body">

          <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#visi" aria-controls="visi" role="tab" data-toggle="tab">Visi</a></li>
            <li><a href="#misi" aria-controls="misi" role="tab" data-toggle="tab">Misi</a></li>
            <li><a href="#tujuan" aria-controls="tujuan" role="tab" data-toggle="tab">Tujuan</a></li>
            <li><a href="#sasaran" aria-controls="sasaran" role="tab" data-toggle="tab">Sasaran</a></li>
            <li><a href="#program" aria-controls="program" role="tab" data-toggle="tab">Program</a></li>
          </ul>

          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="visi">
              <br>

              <form class="form-horizontal" autocomplete='off' method="post">
              @foreach($dataperdarpjmd as $datas)
                <div class="form-group">
                  <label for="txt_no_perda" class="col-sm-2 control-label text-left">Nomor Perda :</label>
                  <div class="col-sm-7">
                    <p class="form-control-static">{{$datas->no_perda}}</p>
                  </div>
                </div>
                <div class="form-group">
                  <label for="txt_tgl_perda" class="col-sm-2 control-label" align='left'>Tanggal Perda :</label>
                  <div class="col-sm-10">
                    <p class="form-control-static"><?php echo date_format(date_create($datas->tgl_perda),'d F Y');?></p>
                  </div>
                </div>
                <div class="form-group">
                  <label for="txt_periode" class="col-sm-2 control-label" align='left'>Periode RPJMD :</label>
                  <div class="col-sm-10">
                    <p class="form-control-static">{{$datas->tahun_1}} sampai dengan {{$datas->tahun_5}}</p>
                  </div>
                </div>
                <div class="form-group">
                  <label for="txt_periode" class="col-sm-2 control-label" align='left'>Status Dokumen :</label>
                  <div class="col-sm-2">
                    <p class="form-control-static">{{$datas->id_status_dokumen}}</p>
                  </div>
                  <div>
                    <div class="btn-group">
                  <button type="button" class="btn btn-info dropdown-toggle btn-labeled" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown"><span class="btn-label"><i class="fa fa-print fa-fw fa-lg"></i></span>Cetak RPJMD <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li>
                              <a class="dropdown-item btnPrintRPJMDTSK" ><i class="fa fa-print fa-fw fa-lg"></i> Cetak RPJMD </a> 
                            </li>
                            <li>
                              <a class="dropdown-item btnPrintProgPrio" ><i class="fa fa-print fa-fw fa-lg"></i> Cetak Program Prioritas</a>
                            </li>
                            <li>
                              <a class="dropdown-item btnPrintProyeksiPendapatan" ><i class="fa fa-print fa-fw fa-lg"></i> Cetak Proyeksi Pendapatan RKPD</a>
                            </li>
                            <li>
                              <a class="dropdown-item btnPrintKompilasiProgramdanPagu" ><i class="fa fa-print fa-fw fa-lg"></i> Cetak Kompilasi Program dan Pagu RPJMD</a>
                            </li>
                            <li>
                              <a class="dropdown-item btnPrintReviewRanwalRKPD" ><i class="fa fa-print fa-fw fa-lg"></i> Cetak Review Ranwal RKPD</a>
                            </li>
                            <li>
                              <a class="dropdown-item btnPrintRumusanReviewRanwalRKPD" ><i class="fa fa-print fa-fw fa-lg"></i> Cetak Rumusan Review Ranwal RKPD</a>
                            </li>
                            <li>
                              <a class="dropdown-item btnPrintKompilasiProgramdanPaguRenstra" ><i class="fa fa-print fa-fw fa-lg"></i> Cetak Kompilasi Program dan Pagu Renstra</a>
                            </li>
                            <li>
                              <a class="dropdown-item btnPrintPokir" ><i class="fa fa-print fa-fw fa-lg"></i> Cetak Pokok Pikiran</a>
                            </li>                     
                        </ul>
                </div>
                  </div>  
                  
                </div>
              @endforeach
              
              </form>


              <br>
              <div class="table-responsive">
              <table id='tblVisi' class="table table-striped table-bordered compact" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th width="5%" style="text-align: center; vertical-align:middle">No Visi</th>
                          <th style="text-align: center; vertical-align:middle">Uraian Visi</th>
                          <th width="50px" style="text-align: center; vertical-align:middle">Aksi</th>
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
              <table id="tblMisi" class="table table-striped table-bordered compact table-responsive" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th width="5%" style="text-align: center; vertical-align:middle">No Visi</th>
                          <th width="5%" style="text-align: center; vertical-align:middle">No Misi</th>
                          <th style="text-align: center; vertical-align:middle">Uraian Misi</th>
                          <th width="50px" style="text-align: center; vertical-align:middle">Aksi</th>

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
            <table id="tblTujuan" class="table table-striped table-bordered compact table-responsive"  cellspacing="0" width="100%">
                  <thead>
                      <tr>
                        <th width="5%" style="text-align: center; vertical-align:middle">No Visi</th>
                        <th width="5%" style="text-align: center; vertical-align:middle">No Misi</th>
                        <th width="5%" style="text-align: center; vertical-align:middle">No Tujuan</th>
                        <th style="text-align: center; vertical-align:middle">Uraian Tujuan</th>
                        <th width="50px" style="text-align: center; vertical-align:middle">Aksi</th>
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
                <table id="tblSasaran" class="table table-striped table-bordered compact table-responsive"  cellspacing="0" width="100%">
                      <thead>
                          <tr>
                            <th width="5%" style="text-align: center; vertical-align:middle">No Visi</th>
                            <th width="5%" style="text-align: center; vertical-align:middle">No Misi</th>
                            <th width="5%" style="text-align: center; vertical-align:middle">No Tujuan</th>
                            <th width="5%" style="text-align: center; vertical-align:middle">No Sasaran</th>
                            <th style="text-align: center; vertical-align:middle">Uraian Sasaran</th>
                            <th width="50px" style="text-align: center; vertical-align:middle">Aksi</th>
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
                <table id="tblKebijakan" class="table table-striped table-bordered compact table-responsive"  cellspacing="0" width="100%">
                      <thead>
                          <tr>
                            <th width="5%" style="text-align: center; vertical-align:middle">No Visi</th>
                            <th width="5%" style="text-align: center; vertical-align:middle">No Misi</th>
                            <th width="5%" style="text-align: center; vertical-align:middle">No Tujuan</th>
                            <th width="5%" style="text-align: center; vertical-align:middle">No Sasaran</th>
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
              <div class="table-responsive">
                <table id="tblStrategi" class="table table-striped table-bordered compact table-responsive"  cellspacing="0" width="100%">
                      <thead>
                          <tr>
                            <th width="5%" style="text-align: center; vertical-align:middle">No Visi</th>
                            <th width="5%" style="text-align: center; vertical-align:middle">No Misi</th>
                            <th width="5%" style="text-align: center; vertical-align:middle">No Tujuan</th>
                            <th width="5%" style="text-align: center; vertical-align:middle">No Sasaran</th>
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
                <li><a href="#indikatorprogram" aria-controls="misi" role="tab" data-toggle="tab">Indikator</a></li>
                <li><a href="#urusan" aria-controls="tujuan" role="tab" data-toggle="tab">Urusan</a></li>
                <li><a href="#pelaksana" aria-controls="sasaran" role="tab" data-toggle="tab">OPD Pelaksana</a></li>
            </ul>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="program1">
              <br>
              <div class="table-responsive">
                <table id="tblProgram" class="table table-striped table-bordered compact table-responsive"  cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th rowspan="2" width="50px" style="text-align: center; vertical-align:middle">Kode Sasaran</th>
                          <th rowspan="2" width="50px" style="text-align: center; vertical-align:middle">Kode Program</th>
                          <th rowspan="2" style="text-align: center; vertical-align:middle">Uraian Program</th>
                          <th colspan="6" style="text-align: center; vertical-align:middle">Pagu Program per Tahun (juta rupiah)</th>
                          <th rowspan="2" width="50px" style="text-align: center; vertical-align:middle">Aksi</th>
                      </tr>
                      <tr>
                      @foreach($dataperdarpjmd as $datas)
                          <th width="5%" style="text-align: center">{{$datas->tahun_1}}</th>
                          <th width="5%" style="text-align: center">{{$datas->tahun_2}}</th>
                          <th width="5%" style="text-align: center">{{$datas->tahun_3}}</th>
                          <th width="5%" style="text-align: center">{{$datas->tahun_4}}</th>
                          <th width="5%" style="text-align: center">{{$datas->tahun_5}}</th>
                          <th width="5%" style="text-align: center">Jumlah</th>
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
                <table id="tblIndikatorProgram" class="table table-striped table-bordered compact table-responsive"  cellspacing="0" width="100%">
                      <thead>
                          <tr>
                          <th rowspan="2" style="text-align: center; vertical-align:middle">Kode Program</th>
                          <th rowspan="2" style="text-align: center; vertical-align:middle">No Urut</th>
                          <th rowspan="2" style="text-align: center; vertical-align:middle">Uraian Indikator</th>
                          <th colspan="6" style="text-align: center; vertical-align:middle">Target Indikator per Tahun</th>
                      </tr>
                      <tr>
                        @foreach($dataperdarpjmd as $datas)
                            <th width="5%" style="text-align: center">{{$datas->tahun_1}}</th>
                            <th width="5%" style="text-align: center">{{$datas->tahun_2}}</th>
                            <th width="5%" style="text-align: center">{{$datas->tahun_3}}</th>
                            <th width="5%" style="text-align: center">{{$datas->tahun_4}}</th>
                            <th width="5%" style="text-align: center">{{$datas->tahun_5}}</th>
                            {{-- <th width="5%" style="text-align: center">Jumlah</th> --}}
                         @endforeach
                      </tr>
                      </thead>
                      <tbody>
                      </tbody>
                </table>
              </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="urusan">
              <br>
              <div class="table-responsive">
                <table id="tblUrusan" class="table table-striped table-bordered compact table-responsive"  cellspacing="0" width="100%">
                      <thead>
                          <tr>
                              <th width="10%" style="text-align: center; vertical-align:middle">Kode Program</th>
                              <th width="10%" style="text-align: center; vertical-align:middle">Kd Urusan</th>
                              <th style="text-align: center; vertical-align:middle">Uraian Urusan</th>
                              <th style="text-align: center; vertical-align:middle">Uraian Bidang</th>
                              <th width="50px" style="text-align: center; vertical-align:middle">Aksi</th>
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
                <table id="tblPelaksana" class="table table-striped table-bordered compact table-responsive"  cellspacing="0" width="100%">
                      <thead>
                          <tr>
                              <th width="10%" style="text-align: center; vertical-align:middle">Kode Program</th>
                              <th width="10%" style="text-align: center; vertical-align:middle">Kode Unit</th>
                              <th style="text-align: center; vertical-align:middle">Uraian OPD Pelaksana</th>
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

{{-- Modal Dokumen RPJMD --}}
<div id="DokumenModal" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg"  >

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title">Detail Data Dokumen RPJMD</h3>
      </div>

    <!-- <form class="form-horizontal" role="form"> -->
      <div class="modal-body">
        <form class="form-horizontal" autocomplete='off'
          method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}" />

            <input type="hidden" name="id_rpjmd" id="id_rpjmd" />
            <input type="hidden" name="thn_id" id="thn_id" />


          <div class="form-group">
            <label for="txt_no_perda" class="col-sm-3 control-label" align='left'>Nomor perda :</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="txt_perda" name="no_perda" required="required">
            </div>
          </div>

          <div class="form-group">
            <label for="txt_tgl_perda" class="col-sm-3 control-label" align='left'>Tanggal Perda :</label>
            <div class="col-sm-3">
              <div class="input-group date" data-provide="datepicker">
                  <input type="text" class="form-control" data-date-format="mm/dd/yyyy">
                  <div class="input-group-addon">
                      <span class="glyphicon glyphicon-th"></span>
                  </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="txt_thn_awal" class="col-sm-3 control-label" align='left'>Periode RPJMD :</label>
            <div class="col-sm-2">
              <input type="text" class="form-control" id="txt_thn_awal" name="no_thn_awal" required="required">
            </div>
            <label for="txt_thn_akhir" class="col-sm-2 control-label" align='center'>sampai dengan </label>
            <div class="col-sm-2">
              <input type="text" class="form-control" id="txt_thn_akhir" name="no_thn_akhir" required="required">
            </div>
          </div>

          <div class="form-group">
            <label for="txt_kd_revisi" class="col-sm-3 control-label" align='left'>Kode Revisi :</label>
            <div class="col-sm-2">
              <input type="text" class="form-control" id="txt_kd_revisi" name="kd_revisi" required="required">
            </div>
          </div>

          <div class="form-group">
            <label for="txt_status" class="col-sm-3 control-label" align='left'>Status :</label>
            <div class="col-sm-3">
              <select class="form-control" id="id_status" name="status">
                        <option value="0">Draft</option>
                        <option value="1">Aktif</option>
                        <option value="2">Tidak Aktif</option>
            </select>
            </div>
          </div>


        <div class="form-group">
          <div class="modal-footer">
            <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Save</button>
            <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-log-out"></i> Close</button>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" language="javascript" class="init">
$(document).ready(function() {
  var id_visi_rpjmd,id_misi_rpjmd,id_tujuan_rpjmd,id_sasaran_rpjmd,id_kebijakan_rpjmd,id_strategi_rpjmd;
  var id_program_rpjmd,id_indikator_program,id_urusan_program,id_pelaksana_program;

  var tbl_Visi = $('#tblVisi').DataTable( {
          processing: true,
          serverSide: true,
          autoWidth : false,
          dom : 'BfRtIp',
          "ajax": "{{url('/rpjmd/visi')}}",
          "columns": [
                { data: 'id_visi_rpjmd', sClass: "dt-center"},
                { data: 'uraian_visi_rpjmd'},
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
          "ajax": {"url": "./rpjmd/misi/0"},
          "columns": [
                { data: 'id_visi_rpjmd', sClass: "dt-center"},
                { data: 'no_urut', sClass: "dt-center"},
                { data: 'uraian_misi_rpjmd'},
                { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
              ],
                  "order": [[1, 'asc']],
                  "bDestroy": true
        } );

  var tbl_Tujuan = $('#tblTujuan').DataTable( {
          processing: true,
          serverSide: true,
          autoWidth : false,
          dom : 'BfRtIp',
          "ajax": {"url": "./rpjmd/tujuan/0"},
          "columns": [
                { data: 'id_visi_rpjmd', sClass: "dt-center"},
                { data: 'id_misi', sClass: "dt-center"},
                { data: 'no_urut', sClass: "dt-center"},
                { data: 'uraian_tujuan_rpjmd'},
                { data: 'action', 'searchable': false, 'orderable':false , sClass: "dt-center"}
              ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        } );

  var tbl_Sasaran = $('#tblSasaran').DataTable( {
          processing: true,
          serverSide: true,
          autoWidth : false,
          dom : 'BfRtIp',
          "ajax": {"url": "./rpjmd/sasaran/0"},
          "columns": [
                { data: 'id_visi_rpjmd', sClass: "dt-center"},
                { data: 'id_misi', sClass: "dt-center"},
                { data: 'id_tujuan', sClass: "dt-center"},
                { data: 'no_urut', sClass: "dt-center"},
                { data: 'uraian_sasaran_rpjmd'},
                { data: 'action', 'searchable': false, 'orderable':false , sClass: "dt-center"}
              ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        } );

  var tbl_Kebijakan = $('#tblKebijakan').DataTable( {
          processing: true,
          serverSide: true,
          autoWidth : false,
          dom : 'BfRtIp',
          "ajax": {"url": "./rpjmd/kebijakan/0"},
          "columns": [
                { data: 'id_visi_rpjmd', sClass: "dt-center"},
                { data: 'id_misi', sClass: "dt-center"},
                { data: 'id_tujuan', sClass: "dt-center"},
                { data: 'id_sasaran', sClass: "dt-center"},
                { data: 'no_urut', sClass: "dt-center"},
                { data: 'uraian_kebijakan_rpjmd'}
            ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        } );

  var tbl_Strategi = $('#tblStrategi').DataTable( {
          processing: true,
          serverSide: true,
          autoWidth : false,
          dom : 'BfRtIp',
          "ajax": {"url": "./rpjmd/strategi/0"},
          "columns": [
                { data: 'id_visi_rpjmd', sClass: "dt-center"},
                { data: 'id_misi', sClass: "dt-center"},
                { data: 'id_tujuan', sClass: "dt-center"},
                { data: 'id_sasaran', sClass: "dt-center"},
                { data: 'no_urut', sClass: "dt-center"},
                { data: 'uraian_strategi_rpjmd'}
            ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        } );

  var tbl_Program = $('#tblProgram').DataTable( {
          processing: true,
          serverSide: true,
          autoWidth : false,
          dom : 'BfRtIp',
          "ajax": {"url": "./rpjmd/program/0"},
          "language": {
                "decimal": ",",
                "thousands": "."},
          "columns": [
                { data: 'kd_sasaran', sClass: "dt-center"},
                { data: 'no_urut', sClass: "dt-center"},
                { data: 'uraian_program_rpjmd'},
                { data: 'pagu_tahun1',
                  render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
                { data: 'pagu_tahun2',
                  render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
                { data: 'pagu_tahun3',
                  render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
                { data: 'pagu_tahun4',
                  render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
                { data: 'pagu_tahun5',
                  render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
                { data: 'total_pagu',
                  render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
                { data: 'action', 'searchable': false, 'orderable':false , sClass: "dt-center"}
            ],
            "columnDefs": [ {
                  "visible": false
              } ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
          } );
  var tbl_IndikatorProgram = $('#tblIndikatorProgram').DataTable( {
        processing: true,
        serverSide: true,
          autoWidth : false,
          dom : 'BfRtIp',
        "ajax": {"url": "./rpjmd/programindikator/0"},
        "language": {
              "decimal": ",",
              "thousands": "."},
        "columns": [
              { data: 'kd_program', sClass: "dt-center"},
              { data: 'no_urut', sClass: "dt-center"},
              { data: 'uraian_indikator_program_rpjmd'},
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
                  "order": [[0, 'asc']],
                  "bDestroy": true
        } );

  var tbl_Urusan = $('#tblUrusan').DataTable( {
        processing: true,
        serverSide: true,
          autoWidth : false,
          dom : 'BfRtIp',
        "ajax": {"url": "./rpjmd/programurusan/0"},
        "columns": [
                { data: 'kd_program', sClass: "dt-center"},
                { data: 'kode_bid', sClass: "dt-center"},
                { data: 'nm_urusan'},
                { data: 'nm_bidang'},
                { data: 'action', 'searchable': false, 'orderable':false , sClass: "dt-center"}
              ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        } );

  var tbl_Pelaksana = $('#tblPelaksana').DataTable( {
        processing: true,
        serverSide: true,
          autoWidth : false,
          dom : 'BfRtIp',
        "ajax": {"url": "./rpjmd/programpelaksana/0"},
        "columns": [
                { data: 'kd_program', sClass: "dt-center"},
                { data: 'kd_unit', sClass: "dt-center"},
                { data: 'nm_unit'}
              ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        } );

$('#tblVisi tbody').on( 'dblclick', 'tr', function () {

    var data = tbl_Visi.row(this).data();

    id_visi_rpjmd =  data.id_visi_rpjmd;

    $('.nav-tabs a[href="#misi"]').tab('show');
    $('#tblMisi').DataTable().ajax.url("./rpjmd/misi/"+id_visi_rpjmd).load();
    $('#tblTujuan').DataTable().ajax.url("./rpjmd/tujuan/0").load();

});

  $(document).on('click', '.view-rpjmdmisi', function() {
      id_visi_rpjmd =  $(this).data('id_visi');
      $('.nav-tabs a[href="#misi"]').tab('show');
      $('#tblMisi').DataTable().ajax.url("./rpjmd/misi/"+id_visi_rpjmd).load();
      $('#tblTujuan').DataTable().ajax.url("./rpjmd/tujuan/0").load();
    });

$('#tblMisi tbody').on( 'dblclick', 'tr', function () {

    var data = tbl_Misi.row(this).data();

    id_misi_rpjmd =  data.id_misi_rpjmd;

    $('.nav-tabs a[href="#tujuan"]').tab('show');
      $('#tblTujuan').DataTable().ajax.url("./rpjmd/tujuan/"+id_misi_rpjmd).load();
      $('#tblSasaran').DataTable().ajax.url("./rpjmd/sasaran/0").load();

});

  $(document).on('click', '.view-rpjmdtujuan', function() {
      id_misi_rpjmd =  $(this).data('id_misi');
      $('.nav-tabs a[href="#tujuan"]').tab('show');
      $('#tblTujuan').DataTable().ajax.url("./rpjmd/tujuan/"+id_misi_rpjmd).load();
      $('#tblSasaran').DataTable().ajax.url("./rpjmd/sasaran/0").load();
    });

$('#tblTujuan tbody').on( 'dblclick', 'tr', function () {

    var data = tbl_Tujuan.row(this).data();

    id_tujuan_rpjmd =  data.id_tujuan_rpjmd;

    $('.nav-tabs a[href="#sasaran"]').tab('show');
      $('.nav-tabs a[href="#sasaran1"]').tab('show');
      $('#tblSasaran').DataTable().ajax.url("./rpjmd/sasaran/"+id_tujuan_rpjmd).load();
      $('#tblKebijakan').DataTable().ajax.url("./rpjmd/kebijakan/0").load();
      $('#tblStrategi').DataTable().ajax.url("./rpjmd/strategi/0").load();

});

  $(document).on('click', '.view-rpjmdsasaran', function() {
      id_tujuan_rpjmd =  $(this).data('id_tujuan');
      $('.nav-tabs a[href="#sasaran"]').tab('show');
      $('.nav-tabs a[href="#sasaran1"]').tab('show');
      $('#tblSasaran').DataTable().ajax.url("./rpjmd/sasaran/"+id_tujuan_rpjmd).load();
      $('#tblKebijakan').DataTable().ajax.url("./rpjmd/kebijakan/0").load();
      $('#tblStrategi').DataTable().ajax.url("./rpjmd/strategi/0").load();
    });

  $(document).on('click', '.view-rpjmdkebijakan', function() {
      id_sasaran_rpjmd =  $(this).data('id_sasaran');
      $('.nav-tabs a[href="#kebijakan"]').tab('show');
      $('#tblKebijakan').DataTable().ajax.url("./rpjmd/kebijakan/"+id_sasaran_rpjmd).load();
    });

  $(document).on('click', '.view-rpjmdstrategi', function() {
      id_sasaran_rpjmd =  $(this).data('id_sasaran');
      $('.nav-tabs a[href="#strategi"]').tab('show');
      $('#tblStrategi').DataTable().ajax.url("./rpjmd/strategi/"+id_sasaran_rpjmd).load();
    });

$('#tblSasaran tbody').on( 'dblclick', 'tr', function () {

    var data = tbl_Sasaran.row(this).data();

    id_sasaran_rpjmd =  data.id_sasaran_rpjmd;

    $('.nav-tabs a[href="#program"]').tab('show');
      $('.nav-tabs a[href="#program1"]').tab('show');
      $('#tblProgram').DataTable().ajax.url("./rpjmd/program/"+id_sasaran_rpjmd).load();
      $('#tblIndikatorProgram').DataTable().ajax.url("./rpjmd/programindikator/0").load();
      $('#tblUrusan').DataTable().ajax.url("./rpjmd/programurusan/0").load();
      $('#tblPelaksana').DataTable().ajax.url("./rpjmd/programpelaksana/0").load();

});

  $(document).on('click', '.view-rpjmdprogram', function() {
      id_sasaran_rpjmd =  $(this).data('id_sasaran');
      $('.nav-tabs a[href="#program"]').tab('show');
      $('.nav-tabs a[href="#program1"]').tab('show');
      $('#tblProgram').DataTable().ajax.url("./rpjmd/program/"+id_sasaran_rpjmd).load();
      $('#tblIndikatorProgram').DataTable().ajax.url("./rpjmd/programindikator/0").load();
      $('#tblUrusan').DataTable().ajax.url("./rpjmd/programurusan/0").load();
      $('#tblPelaksana').DataTable().ajax.url("./rpjmd/programpelaksana/0").load();
    });
  $(document).on('click', '.view-rpjmdindikator', function() {
      id_program_rpjmd =  $(this).data('id_program');
      $('.nav-tabs a[href="#indikatorprogram"]').tab('show');
      $('#tblIndikatorProgram').DataTable().ajax.url("./rpjmd/programindikator/"+id_program_rpjmd).load();
    });
  $(document).on('click', '.view-rpjmdurusan', function() {
      id_program_rpjmd =  $(this).data('id_program');
      $('.nav-tabs a[href="#urusan"]').tab('show');
      $('#tblUrusan').DataTable().ajax.url("./rpjmd/programurusan/"+id_program_rpjmd).load();
      $('#tblPelaksana').DataTable().ajax.url("./rpjmd/programpelaksana/0").load();
    });

$('#tblUrusan tbody').on( 'dblclick', 'tr', function () {

    var data = tbl_Urusan.row(this).data();

    id_urusan_program =  data.id_urbid_rpjmd;

    $('.nav-tabs a[href="#pelaksana"]').tab('show');
      $('#tblPelaksana').DataTable().ajax.url("./rpjmd/programpelaksana/"+id_urusan_program).load();

});

$(document).on('click', '.view-rpjmdpelaksana', function() {
      id_urusan_program =  $(this).data('id_urusan');
      $('.nav-tabs a[href="#pelaksana"]').tab('show');
      $('#tblPelaksana').DataTable().ajax.url("./rpjmd/programpelaksana/"+id_urusan_program).load();
    });

$(document).on('click', '.btnPrintRPJMDTSK', function() {  
 location.replace('./printRPJMDTSK');  
});

$(document).on('click', '.printProgPrio', function() {    
  location.replace('./printProgPrio');    
});

$(document).on('click', '.btnPrintProyeksiPendapatan', function() {      
  location.replace('./PrintProyeksiPendapatan');      
});

$(document).on('click', '.btnPrintKompilasiProgramdanPagu', function() {
  location.replace('./PrintKompilasiProgramdanPagu');
});

$(document).on('click', '.btnPrintReviewRanwalRKPD', function() {
  location.replace('./PrintReviewRanwalRKPD');
});

$(document).on('click', '.btnPrintRumusanReviewRanwalRKPD', function() {
  location.replace('./PrintRumusanReviewRanwal');
});

$(document).on('click', '.btnPrintKompilasiProgramdanPaguRenstra', function() {
  location.replace('./PrintProgPaguRenstra');
});

$(document).on('click', '.btnPrintPokir', function() {
  location.replace('./printPokir');
});


});
</script>
@endsection
