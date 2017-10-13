@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ul class="breadcrumb">
          <li><a href="{{ url('/') }}">RENJA</a></li>
          <li class="active">RANCANGAN RENJA</li>
        </ul>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h2 class="panel-title">Daftar Data Usulan Rancangan Renja</h2>
          </div>

          <div class="panel-body">
            <br>
            <div class="form-group">
              <label class="control-label col-sm-3" for="id_perkada">Unit Penyusun Renstra :</label>
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
            <ul class="nav nav-tabs" role="tablist">
              <li class="active"><a href="#program" aria-controls="visi" role="tab" data-toggle="tab">Program Renja</a></li>
              <li><a href="#indikatorprogram" aria-controls="misi" role="tab" data-toggle="tab">Indikator Program Renja</a></li>
              <li><a href="#kegiatan" aria-controls="tujuan" role="tab" data-toggle="tab">Kegiatan Renja</a></li>
            </ul>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="program">
                <br>
                <table id="tblProgram" class="table display table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                                {{-- <th width="15%" style="text-align: center; vertical-align:middle">Kelompok Program</th> --}}
                                <th style="text-align: center; vertical-align:middle">Uraian Program Renja</th>
                                <th width="15%" style="text-align: center; vertical-align:middle">Pagu Renstra</th>
                                <th width="15%" style="text-align: center; vertical-align:middle">Pagu Renja</th>
                                <th width="10%" style="text-align: center; vertical-align:middle">Status Usulan</th>
                                <th width="150px" style="text-align: center; vertical-align:middle">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                </table>
              </div>
              <div role="tabpanel" class="tab-pane" id="indikatorprogram">
                <br>
                <table id="tblIndikatorProgram" class="table display table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="10%" style="text-align: center; vertical-align:middle">No Urut</th>
                                <th style="text-align: center; vertical-align:middle">Uraian Indikator Program</th>
                                <th style="text-align: center; vertical-align:middle">Tolok Ukur Indikator Program</th>
                                <th width="15%" style="text-align: center; vertical-align:middle">Target Renstra</th>
                                <th width="15%" style="text-align: center; vertical-align:middle">Target Renja</th>
                                <th width="10%" style="text-align: center; vertical-align:middle">Status Usulan</th>
                                <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                </table>
              </div>
              <div role="tabpanel" class="tab-pane" id="kegiatan">
                <br>
                <ul class="nav nav-tabs" role="tablist">
                  <li class="active"><a href="#kegiatan1" aria-controls="visi" role="tab" data-toggle="tab">Kegiatan Renja</a></li>
                  <li><a href="#indikatorkegiatan" aria-controls="misi" role="tab" data-toggle="tab">Indikator Kegiatan Renja</a></li>
                  <li><a href="#aktivitasrenja" aria-controls="tujuan" role="tab" data-toggle="tab">Aktivitas Musrenbang</a></li>
                  <li><a href="#aktivitasrenja" aria-controls="tujuan" role="tab" data-toggle="tab">Aktivitas Renja</a></li>
                  {{-- <li><a href="#pelaksanarenja" aria-controls="tujuan" role="tab" data-toggle="tab">Pelaksana Kegiatan</a></li>
                  <li><a href="#lokasirenja" aria-controls="tujuan" role="tab" data-toggle="tab">Lokasi Kegiatan</a></li>
                  <li><a href="#rincianbelanja" aria-controls="tujuan" role="tab" data-toggle="tab">Rincian Belanja Kegiatan</a></li> --}}

                </ul>
                <div class="tab-content">
                   <br>
                   <div role="tabpanel" class="tab-pane active" id="kegiatan1">
                   <table id="tblKegiatan" class="table display table-striped table-bordered" cellspacing="0" width="100%">
                       <thead>
                         <tr>
                           <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                           <th style="text-align: center; vertical-align:middle">Uraian Kegiatan Renja</th>
                           <th width="15%" style="text-align: right; vertical-align:middle">Pagu Renstra</th>
                           <th width="15%" style="text-align: right; vertical-align:middle">Pagu Renja</th>
                           <th width="10%" style="text-align: center; vertical-align:middle">Status Usulan</th>
                           <th width="150px" style="text-align: center; vertical-align:middle">Aksi</th>
                         </tr>
                       </thead>
                       <tbody>
                       </tbody>
                   </table>
                   </div>

                   <div role="tabpanel" class="tab-pane" id="indikatorkegiatan">
                   <br>
                     <table id="tblIndikatorkegiatan" class="table display table-striped table-bordered"  cellspacing="0" width="100%">
                           <thead>
                           <tr>
                             <th width="10%" style="text-align: center; vertical-align:middle">No Urut</th>
                             <th style="text-align: center; vertical-align:middle">Uraian Indikator Kegiatan</th>
                             <th style="text-align: center; vertical-align:middle">Tolok Ukur Indikator Kegiatan</th>
                             <th width="15%" style="text-align: center; vertical-align:middle">Target Renstra</th>
                             <th width="15%" style="text-align: center; vertical-align:middle">Target Renja</th>
                             <th width="10%" style="text-align: center; vertical-align:middle">Status Usulan</th>
                             <th width="50px" style="text-align: center; vertical-align:middle">Aksi</th>
                           </tr>
                           </thead>
                           <tbody>
                           </tbody>
                       </table>
                     </div>

                   <div role="tabpanel" class="tab-pane" id="aktivitasrenja">
                     {{-- <br> --}}
                     <div class="add">
                         <p><a class="add-aktivitas btn btn-sm btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah Aktivitas Renja</a></p>
                     </div>
                     <ul class="nav nav-tabs" role="tablist">
                          <li><a href="#pelaksanarenja" aria-controls="tujuan" role="tab" data-toggle="tab">Pelaksana Kegiatan</a></li>
                          <li><a href="#lokasirenja" aria-controls="tujuan" role="tab" data-toggle="tab">Lokasi Kegiatan</a></li>
                          <li><a href="#rincianbelanja" aria-controls="tujuan" role="tab" data-toggle="tab">Rincian Belanja Kegiatan</a></li>

                        </ul>
                       <table id="tblAktivitasRenja" class="table display table-striped table-bordered"  cellspacing="0" width="100%">
                             <thead>
                                 <tr>
                                     <th width="10%" style="text-align: center; vertical-align:middle">No Urut</th>
                                     <th style="text-align: center; vertical-align:middle">Uraian Aktitas</th>
                                     <th width="15%" style="text-align: center; vertical-align:middle">Target Ouput</th>
                                     <th width="15%" style="text-align: center; vertical-align:middle">Pagu Usulan</th>
                                     <th width="15%" style="text-align: center; vertical-align:middle">Pagu Musrenbang</th>
                                     <th width="10%" style="text-align: center; vertical-align:middle">Pembahasan</th>
                                     <th width="10%" style="text-align: center; vertical-align:middle">Status Usulan</th>
                                     <th width="150px" style="text-align: center; vertical-align:middle">Aksi</th>
                                 </tr>
                             </thead>
                             <tbody>
                             </tbody>
                       </table>
                     </div>

                   <div role="tabpanel" class="tab-pane" id="pelaksanarenja">
                     <div class="add">
                         <p><a class="add-pelaksana btn btn-sm btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah Pelaksana Renja</a></p>
                     </div>
                       <table id="tblPelaksanaRenja" class="table display table-striped table-bordered"  cellspacing="0" width="100%">
                             <thead>
                                 <tr>
                                     <th width="10%" style="text-align: center; vertical-align:middle">No Urut</th>
                                     <th style="text-align: center; vertical-align:middle">Nama Sub Unit</th>
                                     <th width="10%" style="text-align: center; vertical-align:middle">Status Usulan</th>
                                     <th width="150px" style="text-align: center; vertical-align:middle">Aksi</th>
                                 </tr>
                             </thead>
                             <tbody>
                             </tbody>
                       </table>
                     </div>

                   <div role="tabpanel" class="tab-pane" id="rincianbelanja">
                     <div class="add">
                         <p><a class="add-belanja btn btn-sm btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah Rincian Belanja</a></p>
                     </div>
                       <table id="tblBelanjaRenja" class="table display table-striped table-bordered"  cellspacing="0" width="100%">
                             <thead>
                                 <tr>
                                     <th width="10%" style="text-align: center; vertical-align:middle">No Urut</th>
                                     <th width="10%" style="text-align: center; vertical-align:middle">No Urut</th>
                                     <th style="text-align: center; vertical-align:middle">Uraian Item Belanja</th>
                                     <th width="10%" style="text-align: center; vertical-align:middle">Harga Satuan</th>
                                     <th width="15%" style="text-align: center; vertical-align:middle">Volume</th>
                                     <th width="15%" style="text-align: center; vertical-align:middle">Jumlah</th>
                                     <th width="10%" style="text-align: center; vertical-align:middle">Status Usulan</th>
                                     <th width="50px" style="text-align: center; vertical-align:middle">Aksi</th>
                                 </tr>
                             </thead>
                             <tbody>
                             </tbody>
                       </table>
                     </div>

                   <div role="tabpanel" class="tab-pane" id="lokasirenja">
                     <div class="add">
                         <p><a class="add-lokasi btn btn-sm btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah Lokasi Kegiatan</a></p>
                     </div>
                       <table id="tblLokasiRenja" class="table display table-striped table-bordered"  cellspacing="0" width="100%">
                             <thead>
                                 <tr>
                                     <th width="10%" style="text-align: center; vertical-align:middle">No Urut</th>
                                     <th style="text-align: center; vertical-align:middle">Nama Lokasi</th>
                                     <th width="15%" style="text-align: center; vertical-align:middle">Volume Output</th>
                                     <th width="15%" style="text-align: center; vertical-align:middle">Jumlah Pagu</th>
                                     <th width="10%" style="text-align: center; vertical-align:middle">Status Data</th>
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
    </div>
  </div>

<!--Modal Tambah Aktivitas -->
  <div id="TambahAktivitasRenja" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg"  >
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
      <!-- <form class="form-horizontal" role="form"> -->
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="post" >
            {{-- {{ route('TambahAktivitasRenja') }} --}}
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group">
                <label for="sumber_data" class="col-sm-3 control-label" align='left'>Sumber Aktivitas :</label>
                <div class="col-sm-3">
      					 	<select class="form-control cbSumberData" name="sumber_data" id="sumber_data">
                    <option value="0">Aktivitas ASB</option>
                    <option value="1">Aktivitas Bukan ASB</option>
      					 	</select>
                </div>
              </div>
              <div class="form-group">
                <label for="id_aktivitas_asb_renja" class="col-sm-3 control-label" align='left'>Nama Aktivitas ASB :</label>
                <div class="col-sm-9">
                  <select class="form-control" name="id_aktivitas_asb_renja" id="id_aktivitas_asb_renja">
                    {{-- @foreach($refaktivitasasb as $val)
                      <option value={{ $val->id_aktivitas_asb }}>{{ $val->nm_aktivitas_asb }}</option>
      					 		@endforeach --}}
      					 	</select>
                </div>
              </div>
              <div class="form-group">
                <label for="ur_aktivitas_renja" class="col-sm-3 control-label" align='left'>Uraian Aktivitas Kegiatan :</label>
                <div class="col-sm-9">
                  <textarea placeholder="Uraian atau diskripsi aktivitas kegiatan dalam renja" type="text" class="form-control" rows="5" id="ur_aktivitas_renja" name="ur_aktivitas_renja" required="required" ></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="pagu_rkpd_program" class="col-sm-3 control-label" align='left'>Target Ouput Aktivitas :</label>
                <div class="col-sm-3">
                  <input placeholder="Isi dengan Target Output" type="number" step="any" min="0" class="form-control" id="pagu_rkpd_program" name="pagu_rkpd_program" required="required" >
                </div>
                <label for="pagu_rkpd_program" class="col-sm-3 control-label" align='left'>Pagu Aktivitas :</label>
                <div class="col-sm-3">
                  <input placeholder="Isi dengan Anggaran" type="number" step="any" min="0" class="form-control" id="pagu_rkpd_program" name="pagu_rkpd_program" required="required" >
                </div>
              </div>
              <div class="form-group">
                <label for="status_bahas" class="col-sm-3 control-label" align='left'>Status Pembahasan :</label>
                <div class="col-sm-3">
      					 	<select class="form-control" name="status_bahas" id="status_bahas">
                    <option value="0">Renja SKPD</option>
                    <option value="1">Musrenbang</option>
      					 	</select>
                </div>
                <label for="pagu_rkpd_program" class="col-sm-3 control-label" align='left'>Pagu yang dimusrenkan :</label>
                <div class="col-sm-3">
                  <input placeholder="% Pagu Musrenbang" type="number" step="any" min="0" class="form-control" id="pagu_rkpd_program" name="pagu_rkpd_program" required="required" >
                </div>
              </div>
              <div class="form-group">
                <label for="status_data" class="col-sm-3 control-label" align='left'>Status Data :</label>
                <div class="col-sm-3">
      					 	<select class="form-control" name="status_data" id="status_data">
                    <option value="0">Draft</option>
                    <option value="1">Posting</option>
      					 	</select>
                </div>
              </div>
              <div class="form-group">
                <div class="modal-footer">
                  <button type="submit" class="btn btn-sm btn-success actionBtn1" data-dismiss="modal"><span id="footer_action_button1" class="glyphicon glyphicon-save"></span> Simpan</button>
                  <button type="button" class="btn btn-sm btn-warning" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-log-out"></i> Tutup</button>
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
  var id_unit_renja;
  var tahun_renja;
  var id_program_renja;
  var id_kegiatan_renja;

  tahun_renja = 2017;

  var table = $('#tblProgram').DataTable( {
          processing: true,
          serverSide: true,
          "ajax": {"url": "./program/0/0"},
          "language": {
                "decimal": ",",
                "thousands": "."},
          "columns": [
                { data: 'no_urut'},
                // { data: 'kelompok_program'},
                { data: 'uraian_program_renstra'},
                { data: 'pagu_tahun_renstra',
                      render: $.fn.dataTable.render.number( '.', ',', 0, '' )},
                { data: 'pagu_tahun_ranwal',
                      render: $.fn.dataTable.render.number( '.', ',', 0, '' )},
                { data: 'status_display'},
                { data: 'action', 'searchable': false, 'orderable':false }
              ]
          } );

  var table = $('#tblIndikatorProgram').DataTable( {
          processing: true,
          serverSide: true,
          "ajax": {"url": "./programindikator/0/0/0"},
          "language": {
                "decimal": ",",
                "thousands": "."},
          "columns": [
                { data: 'no_urut'},
                { data: 'uraian_program_renstra'},
                { data: 'uraian_indikator_program_renja'},
                { data: 'target_renstra',
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' )},
                { data: 'target_renja',
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' )},
                { data: 'status_display'},
                { data: 'action', 'searchable': false, 'orderable':false }
                ]
          } );
  var table = $('#tblKegiatan').DataTable( {
          processing: true,
          serverSide: true,
          "ajax": {"url": "./kegiatanrenja/0/0/0"},
          "language": {
                "decimal": ",",
                "thousands": "."},
          "columns": [
                { data: 'no_urut'},
                { data: 'uraian_kegiatan_renstra'},
                { data: 'pagu_tahun_ranwal',
                      render: $.fn.dataTable.render.number( '.', ',', 0, '' )},
                { data: 'pagu_tahun_kegiatan',
                      render: $.fn.dataTable.render.number( '.', ',', 0, '' )},
                { data: 'status_display'},
                { data: 'action', 'searchable': false, 'orderable':false }
                ]
          } );
  var table = $('#tblIndikatorkegiatan').DataTable( {
          processing: true,
          serverSide: true,
          "ajax": {"url": "./kegiatanindikatorenja/0/0/0"},
          "language": {
                "decimal": ",",
                "thousands": "."},
          "columns": [
                { data: 'no_urut'},
                { data: 'uraian_indikator_kegiatan_renja'},
                { data: 'tolok_ukur_indikator'},
                { data: 'angka_renstra',
                      render: $.fn.dataTable.render.number( '.', ',', 0, '' )},
                { data: 'angka_tahun',
                      render: $.fn.dataTable.render.number( '.', ',', 0, '' )},
                { data: 'status_display'},
                { data: 'action', 'searchable': false, 'orderable':false }
                ]
          } );
  var table = $('#tblAktivitasRenja').DataTable( {
          processing: true,
          serverSide: true,
          "ajax": {"url": "./aktivitasrenja/0/0/0"},
          "language": {
                "decimal": ",",
                "thousands": "."},
          "columns": [
                { data: 'no_urut'},
                { data: 'uraian_aktivitas_kegiatan'},
                { data: 'target_output_aktivitas',
                      render: $.fn.dataTable.render.number( '.', ',', 0, '' )},
                { data: 'pagu_aktivitas',
                      render: $.fn.dataTable.render.number( '.', ',', 0, '' )},
                { data: 'pagu_musren',
                      render: $.fn.dataTable.render.number( '.', ',', 0, '' )},
                { data: 'status_bahas'},
                { data: 'status_display'},
                { data: 'action', 'searchable': false, 'orderable':false }
                ]
          } );


  $("#tblProgram tbody tr").each(function() {
        $(this).find('td:eq(2)').addClass('numcol');
        $(this).find('td:eq(3)').addClass('numcol');
      });

  $('#tblProgram td.numcol').css('text-align', 'right');

  $( ".cbUnit" ).change(function() {
      id_unit_renja =  $('#id_unit').val();
      $('#tblProgram').DataTable().ajax.url("./program/"+tahun_renja+"/"+id_unit_renja).load();
      $('#tblIndikatorProgram').DataTable().ajax.url("./programindikator/0/0/0").load();
      $('#tblKegiatan').DataTable().ajax.url("./kegiatanrenja/0/0/0").load();
    });

  $( ".cbSumberData" ).change(function() {
      if ($('#sumber_data').val()==1) {
        $('#id_aktivitas_asb_renja').prop('disabled', true);
      } else {
        $('#id_aktivitas_asb_renja').prop('disabled', false);
      }
    });

  $(document).on('click', '.view-renjaindikator', function() {
      id_program_renja =  $(this).data('id_renja_program');
      $('.nav-tabs a[href="#indikatorprogram"]').tab('show');
      $('#tblIndikatorProgram').DataTable().ajax.url("./programindikator/"+tahun_renja+"/"+id_unit_renja+"/"+id_program_renja).load();
    });

  $(document).on('click', '.view-renjakegiatan', function() {
      id_program_renja =  $(this).data('id_renja_program');
      $('.nav-tabs a[href="#kegiatan"]').tab('show');
      $('.nav-tabs a[href="#kegiatan1"]').tab('show');
      $('#tblKegiatan').DataTable().ajax.url("./kegiatanrenja/"+tahun_renja+"/"+id_unit_renja+"/"+id_program_renja).load();
      $('#tblKegiatanIndikator').DataTable().ajax.url("./kegiatanindikatorenja/0/0/0").load();
      $('#tblAktivitasKegiatan').DataTable().ajax.url("./aktivitasrenja/0/0/0").load();
    });

  $(document).on('click', '.view-kegiatanindikator', function() {
      id_renja =  $(this).data('id_renja');
      $('.nav-tabs a[href="#indikatorkegiatan"]').tab('show');
      $('#tblIndikatorkegiatan').DataTable().ajax.url("./kegiatanindikatorenja/"+tahun_renja+"/"+id_unit_renja+"/"+id_renja).load();
    });

  $(document).on('click', '.view-renjaaktivitas', function() {
      id_renja =  $(this).data('id_renja');
      $('.nav-tabs a[href="#aktivitasrenja"]').tab('show');
      $('#tblAktivitasRenja').DataTable().ajax.url("./aktivitasrenja/"+tahun_renja+"/"+id_unit_renja+"/"+id_renja).load();
    });

    $(document).on('click', '.add-aktivitas', function() {
      $('#footer_action_button1').addClass('glyphicon-plus');
      $('#footer_action_button1').removeClass('glyphicon-trash');
      $('.actionBtn1').addClass('btn-success');
      $('.actionBtn1').removeClass('btn-danger');
      $('.actionBtn1').addClass('addAktivitasRenja');
      $('.modal-title').text('Tambah Aktivitas pada Kegiatan Renja');
      $('.form-horizontal').show();
      $('#TambahAktivitasRenja').modal('show');
    });

    $('.modal-footer').on('click', '.addAktivitasRenja', function() {
        $.ajaxSetup({
           headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });

        $.ajax({
            type: 'post',
            url: './addKomponen',
            data: {
                '_token': $('input[name=_token]').val(),
                'nm_komponen': $('#nm_komponen').val(),
                'satuan_komponen': $('#satuan_komponen').val(),
                'diskripsi_lingkup': $('#diskripsi_lingkup').val(),
                'jenis_komponen': $('#jenis_komponen').val(),
            },
            success: function(data) {
                if ((data.errors)){
                  $('.error').removeClass('hidden');
                }
                else {
                    $('.error').addClass('hidden');
                    $('#tblKomponen').DataTable().ajax.reload();
                }
            },
        });
    });


});
</script>
@endsection
