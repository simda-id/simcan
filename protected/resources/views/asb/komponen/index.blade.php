@extends('layouts.app0')

@section('content')
  <div class="container row col-sm-12">
        <ul class="breadcrumb">
          <li><a href="{{ url('/modul0') }}">ASB</a></li>
          <li class="active">Komponen ASB</li>
        </ul>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h2 class="panel-title">Kompenen - Rincian ASB</h2>
          </div>

          <div class="panel-body">

          <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#tabkomponen" aria-controls="perkada" role="tab" data-toggle="tab">Komponen ASB</a></li>
            <li><a href="#tabrincian" aria-controls="detailzona" role="tab" data-toggle="tab">Rincian Komponen ASB</a></li>
            {{-- <li><a href="#detailtarif" aria-controls="detailtarif" role="tab" data-toggle="tab">Detail Tarif Item SSH</a></li> --}}
          </ul>

          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="tabkomponen">
              <br>
              <div class="add">
                  <p><a class="add-komponen btn btn-sm btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah Komponen ASB</a></p>
              </div>
              {{-- <br> --}}
              <table id='tblKomponen' class="table display table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th width="10px" style="text-align: center; vertical-align:middle">Id Komponen</th>
                          <th style="text-align: center; vertical-align:middle">Nama Komponen</th>
                          <th style="text-align: center; vertical-align:middle">Keterangan Komponen</th>
                          <th width="10px" style="text-align: center; vertical-align:middle">Satuan</th>
                          <th width="15px" style="text-align: center; vertical-align:middle">Jenis Komponen</th>
                          <th width="150px" style="text-align: center; vertical-align:middle">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                  </tbody>
            </table>
            </div>

            <div role="tabpanel" class="tab-pane" id="tabrincian">
            <br>
            <div class="add">
                <p><a class="add-rincian btn btn-sm btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah Rincian Komponen</a></p>
            </div>
              <div id=divTabRincian>
              <table id="tblRincian" class="table table-striped table-bordered"  cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="15%" style="text-align: center; vertical-align:middle">Nama Komponen</th>
                            <th width="15%" style="text-align: center; vertical-align:middle">Item SSH</th>
                            <th width="20%" style="text-align: center; vertical-align:middle">Kd Rekening</th>
                            <th width="5%" style="text-align: center; vertical-align:middle">Koefisien</th>
                            <th width="5%" style="text-align: center; vertical-align:middle">Volume</th>
                            <th width="5%" style="text-align: center; vertical-align:middle">Volume 2</th>
                            <th width="10%" style="text-align: center; vertical-align:middle">Satuan</th>
                            <th width="150px" style="text-align: center; vertical-align:middle">Aksi</th>
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

  <!--Modal Komponen -->
  <div id="TambahKomponen" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg"  >
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
      <!-- <form class="form-horizontal" role="form"> -->
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="{{ route('TambahKomponen') }}" method="post" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group">
                <label for="nm_komponen" class="col-sm-3 control-label" align='left'>Nama Komponen :</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="nm_komponen" name="nm_komponen" required="required" >
                </div>
              </div>
              <div class="form-group">
                <label for="satuan_komponen" class="col-sm-3 control-label" align='left'>Satuan Komponen :</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" id="satuan_komponen" name="satuan_komponen" required="required" >
                </div>
              </div>
              <div class="form-group">
                <label for="diskripsi_lingkup" class="col-sm-3 control-label" align='left'>Diskripsi Komponen :</label>
                <div class="col-sm-8">
                  <textarea type="text" class="form-control" rows="5" id="diskripsi_lingkup" name="diskripsi_lingkup" required="required" ></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="jenis_komponen" class="col-sm-3 control-label" align='left'>Jenis Komponen :</label>
                <div class="col-sm-8">
      					 	<select class="form-control" name="jenis_komponen" id="jenis_komponen">
                    <option value="1">Fix Cost</option>
                    <option value="2">Independent Variable Cost</option>
                    <option value="3">Dependent Variable Cost</option>
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

  <!--Modal Edit Perkada -->
  <div id="EditKomponen" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="post" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" id="id_komponen_asb_edit" name="id_komponen_asb_edit">
              <div class="form-group">
                <label for="nm_komponen_edit" class="col-sm-3 control-label" align='left'>Nama Komponen :</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="nm_komponen_edit" name="nm_komponen_edit" required="required" >
                </div>
              </div>
              <div class="form-group">
                <label for="satuan_komponen_edit" class="col-sm-3 control-label" align='left'>Satuan Komponen :</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" id="satuan_komponen_edit" name="satuan_komponen_edit" required="required" >
                </div>
              </div>
              <div class="form-group">
                <label for="diskripsi_lingkup_edit" class="col-sm-3 control-label" align='left'>Diskripsi Komponen :</label>
                <div class="col-sm-8">
                  <textarea type="text" class="form-control" rows="5" id="diskripsi_lingkup_edit" name="diskripsi_lingkup_edit" required="required" ></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="jenis_komponen_edit" class="col-sm-3 control-label" align='left'>Jenis Komponen :</label>
                <div class="col-sm-8">
      					 	<select class="form-control" name="jenis_komponen_edit" id="jenis_komponen_edit">
                    <option value="1">Fix Cost</option>
                    <option value="2">Independent Variable Cost</option>
                    <option value="3">Dependent Variable Cost</option>
      					 	</select>
                </div>
              </div>
              <div class="form-group">
                <div class="modal-footer">
                  <button type="submit" class="btn btn-sm btn-primary actionBtn" data-dismiss="modal"><span id="footer_action_button" class="glyphicon glyphicon-save"></span> Update</button>
                  <button type="button" class="btn btn-sm btn-warning" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-log-out"></i> Tutup</button>
                </div>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!--Modal Hapus Komponen -->
  <div id="HapusKomponen" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
            <div class="deleteContent">
                Yakin akan menghapus Komponen ASB : <strong><span class="uraian"></span></strong> ?
            <span class="hidden id_komponen_asb_hapus"></span>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-danger actionBtn" data-dismiss="modal" ><span id="footer_action_button" class="glyphicon glyphicon-trash"></span> Hapus</button>
            <button type="button" class="btn btn-sm btn-warning" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-log-out"></i> Tutup</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--Modal Tarif Perkada -->
  <div id="TambahRincian" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg"  >
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="{{ route('TambahRincian') }}" method="post" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              {{-- <input type="hidden" id="id_perkada_zona_tarif" name="id_perkada_zona_tarif"> --}}
              {{-- <input type="hidden" id="id_komponen_rinci" name="id_komponen_rinci"> --}}
              <div class="form-group">
                <label class="control-label col-sm-3" for="id_komponen_rinci">Komponen ASB :</label>
                <div class="col-sm-8">
      					 	<select class="form-control" name="id_komponen_rinci" id="id_komponen_rinci" value="{{ old('id_komponen_rinci') }}" disabled="">
      					 		@foreach($refkomponen as $val)
                      <option value={{ $val->id_komponen_asb }}>{{ $val->nm_komponen_asb }}</option>
      					 		@endforeach
      					 	</select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="id_tarif_ssh">Item SSH :</label>
                <div class="col-sm-8">
      					 	<select class="form-control" name="id_tarif_ssh" id="id_tarif_ssh">
      					 		@foreach($sshtarif as $val)
                      <option value={{ $val->id_tarif_ssh }}>{{ $val->uraian_tarif_ssh }}</option>
      					 		@endforeach
      					 	</select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="id_rekening">Rekening Item SSH :</label>
                <div class="col-sm-8">
      					 	<select class="form-control" name="id_rekening" id="id_rekening" required="required" disabled>
                    @foreach($refrekening as $val)
                      <option value={{ $val->id_rekening }}>{{ $val->nama_kd_rek_5 }}</option>
                    @endforeach
      					 	</select>
                </div>
              </div>
              <div class="form-group">
                <label for="volume" class="col-sm-3 control-label" align='left'>Volume :</label>
                <div class="col-sm-2">
                  <input type="number" step="any" min="0" class="form-control" id="volume" name="volume" required="required" >
                </div>
                <label for="volume2" class="col-sm-2 control-label" align='left'>Volume 2 :</label>
                <div class="col-sm-2">
                  <input type="number" step="any" min="0" class="form-control" id="volume2" name="volume2" required="required" >
                </div>
              </div>
              <div class="form-group">
                <label for="koefisien" class="col-sm-3 control-label" align='left'>Koefisien :</label>
                <div class="col-sm-2">
                  <input type="number" step="any" min="0" class="form-control" id="koefisien" name="koefisien" required="required" >
                </div>
                <label for="satuan" class="col-sm-2 control-label" align='left'>Satuan :</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="satuan" name="satuan" required="required" >
                </div>
              </div>
              <div class="form-group">
                <label for="jenis_komponen" class="col-sm-3 control-label" align='left'>Jenis Komponen :</label>
                <div class="col-sm-8">
      					 	<select class="form-control" name="jenis_komponen" id="jenis_komponen">
                    <option value="1">Fix Cost</option>
                    <option value="2">Independent Variable Cost</option>
                    <option value="3">Dependent Variable Cost</option>
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

  <!--Modal Edit Tarif Perkada -->
  <div id="EditKompRinci" class="modal fade" role="dialog">
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
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" id="id_komponen_asb_rinci_edit" name="id_komponen_asb_rinci_edit">
            {{-- <input type="hidden" id="id_zona_perkada_edit" name="id_zona_perkada_edit"> --}}
            <div class="form-group">
              <label class="control-label col-sm-3" for="id_komponen_rinci_edit">Komponen ASB :</label>
              <div class="col-sm-8">
                <select class="form-control" name="id_komponen_rinci_edit" id="id_komponen_rinci_edit" value="{{ old('id_komponen_rinci_edit') }}" disabled="">
                  @foreach($refkomponen as $val)
                    <option value={{ $val->id_komponen_asb }}>{{ $val->nm_komponen_asb }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="id_tarif_ssh_edit">Item SSH :</label>
              <div class="col-sm-8">
                <select class="form-control" name="id_tarif_ssh_edit" id="id_tarif_ssh_edit" value="{{ old('id_tarif_ssh_edit') }}" required="required" >
                  @foreach($sshtarif as $val)
                    <option value={{ $val->id_tarif_ssh }}>{{ $val->uraian_tarif_ssh }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="id_rekening_edit">Rekening Item SSH :</label>
              <div class="col-sm-8">
                <select class="form-control" name="id_rekening_edit" id="id_rekening_edit" required="required" disabled>
                  @foreach($refrekening as $val)
                    <option value={{ $val->id_rekening }}>{{ $val->nama_kd_rek_5 }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="volume_edit" class="col-sm-3 control-label" align='left'>Volume :</label>
              <div class="col-sm-2">
                <input type="number" step="any" min="0" class="form-control" id="volume_edit" name="volume_edit" required="required" >
              </div>
              <label for="volume2_edit" class="col-sm-2 control-label" align='left'>Volume 2 :</label>
              <div class="col-sm-2">
                <input type="number" step="any" min="0" class="form-control" id="volume2_edit" name="volume2_edit" required="required" >
              </div>

            </div>
            <div class="form-group">
              <label for="koefisien_edit" class="col-sm-3 control-label" align='left'>Koefisien :</label>
              <div class="col-sm-2">
                <input type="number" step="any" min="0" class="form-control" id="koefisien_edit" name="koefisien_edit" required="required" >
              </div>
              <label for="satuan_edit" class="col-sm-2 control-label" align='left'>Satuan :</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="satuan_edit" name="satuan_edit" required="required" >
              </div>
            </div>
            {{-- <div class="form-group">

            </div> --}}
              <div class="form-group">
                <div class="modal-footer">
                  <button type="submit" class="btn btn-sm btn-primary actionBtn" data-dismiss="modal"><span id="footer_action_button" class="glyphicon glyphicon-save"></span> Update</button>
                  <button type="button" class="btn btn-sm btn-warning" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-log-out"></i> Tutup</button>
                </div>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!--Modal Hapus Rincian -->
  <div id="HapusRincian" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
            <div class="deleteContent">
                Yakin akan menghapus Rincian Komponen : <strong><span class="uraian"></span></strong> ?
            <span class="hidden id_komponen_rinci_hapus"></span>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-danger actionBtn" data-dismiss="modal" ><span id="footer_action_button" class="glyphicon glyphicon-trash"></span> Hapus</button>
            <button type="button" class="btn btn-sm btn-warning" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-log-out"></i> Tutup</button>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection

@section('scripts')
<script type="text/javascript">

$(document).ready(function() {
  $('#tblKomponen').DataTable( {
      processing: true,
      serverSide: true,
      dom: 'Bfrtip',
        "ajax": "{{url('/asb/komponen/datakomponen')}}",
        "columns": [
            { data: 'id_komponen_asb'},
            { data: 'nm_komponen_asb'},
            { data: 'diskripsi_lingkup_aktivitas'},
            { data: 'satuan_komponen_asb'},
            { data: 'jenis_komponen'},
            { data: 'action', 'searchable': false, 'orderable':false }
            ]
  } );

  $('#tblRincian').DataTable( {
        // retrieve: true,
        processing: true,
        serverSide: true,
        dom: 'Bfrtip',
        "ajax": {"url": "./komponen/datarinci/0"},
        "columns": [
              { data: 'ur_komponen'},
              { data: 'ur_tarif'},
              { data: 'ur_rekening'},
              { data: 'koefisien'},
              { data: 'volume'},
              { data: 'volume2'},
              { data: 'satuan'},
              { data: 'action', 'searchable': false, 'orderable':false }
              ]
  });

  var id_kompasb;
  var id_tarifssh;
  var id_rek;

  $(document).on('click', '.view-rincian', function() {
    id_kompasb =  $(this).data('id_komponen');
    $('.nav-tabs a[href="#tabrincian"]').tab('show');
    $('#tblRincian').DataTable().ajax.url("./komponen/datarinci/"+id_kompasb).load();
  });

  //tambah perkada
  $(document).on('click', '.add-komponen', function() {
    $('#footer_action_button1').addClass('glyphicon-plus');
    $('#footer_action_button1').removeClass('glyphicon-trash');
    $('.actionBtn1').addClass('btn-success');
    $('.actionBtn1').removeClass('btn-danger');
    $('.actionBtn1').addClass('addKomponen');
    $('.modal-title').text('Tambah Data Komponen ASB');
    $('.form-horizontal').show();
    $('#TambahKomponen').modal('show');
  });

  $('.modal-footer').on('click', '.addKomponen', function() {
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

  //Edit Komponen
  $(document).on('click', '.edit-komponen', function() {
    $('#footer_action_button').addClass('glyphicon-check');
    $('#footer_action_button').removeClass('glyphicon-trash');
    $('.actionBtn').addClass('btn-success');
    $('.actionBtn').removeClass('btn-danger');
    $('.actionBtn').addClass('editKomponen');
    $('.modal-title').text('Edit Data Komponen ASB');
    $('.form-horizontal').show();
    $('#id_komponen_asb_edit').val($(this).data('id_komponen'));
    $('#nm_komponen_edit').val($(this).data('nm_komponen'));
    $('#satuan_komponen_edit').val($(this).data('satuan_komponen'));
    $('#diskripsi_lingkup_edit').val($(this).data('diskripsi_komponen'));
    $('#jenis_komponen_edit').val($(this).data('jenis_komponen_asb'));
    $('#EditKomponen').modal('show');
  });

  $('.modal-footer').on('click', '.editKomponen', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: './editKomponen',
          data: {
              '_token': $('input[name=_token]').val(),
              'nm_komponen': $('#nm_komponen_edit').val(),
              'satuan_komponen': $('#satuan_komponen_edit').val(),
              'diskripsi_lingkup': $('#diskripsi_lingkup_edit').val(),
              'jenis_komponen': $('#jenis_komponen_edit').val(),
              'id_komponen_asb': $('#id_komponen_asb_edit').val(),
          },
          success: function(data) {
              $('#tblKomponen').DataTable().ajax.reload();
          }
      });
  });

  //Hapus Perkada
  $(document).on('click', '.delete-komponen', function() {
    $('#footer_action_button').removeClass('glyphicon-check');
    $('#footer_action_button').addClass('glyphicon-trash');
    $('.actionBtn').removeClass('btn-success');
    $('.actionBtn').addClass('btn-danger');
    $('.actionBtn').addClass('delKomponen');
    $('.modal-title').text('Hapus Komponen ASB');
    $('.id_komponen_asb_hapus').text($(this).data('id_komponen'));
    // $('.form-horizontal').hide();
    $('.uraian').html($(this).data('nm_komponen'));
    $('#HapusKomponen').modal('show');
  });

  $('.modal-footer').on('click', '.delKomponen', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      type: 'post',
      url: './hapusKomponen',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_komponen_asb': $('.id_komponen_asb_hapus').text()
      },
      success: function(data) {
        $('.item' + $('.id_komponen_asb_hapus').text()).remove();
        $('#tblKomponen').DataTable().ajax.reload();
      }
    });
  });

  $(document).on('click', '.add-rincian', function() {
    $('#footer_action_button1').addClass('glyphicon-plus');
    $('#footer_action_button1').removeClass('glyphicon-trash');
    $('.actionBtn1').addClass('btn-success');
    $('.actionBtn1').removeClass('btn-danger');
    $('.actionBtn1').addClass('addRincian');
    $('.modal-title').text('Tambah Data Rincian Item Komponen ASB');
    $('.form-horizontal').show();
    $('#id_komponen_rinci'). val(id_kompasb);
    $('#TambahRincian').modal('show');
  });

  $('.modal-footer').on('click', '.addRincian', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: './addRincian',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_komponen_asb': $('#id_komponen_rinci').val(),
              'id_tarif_ssh': $('#id_tarif_ssh').val(),
              'id_rekening': $('#id_rekening').val(),
              'volume': $('#volume').val(),
              'volume2': $('#volume2').val(),
              'koefisien': $('#koefisien').val(),
              'satuan': $('#satuan').val(),
          },

          success: function(data) {
              if ((data.errors)){
                $('.error').removeClass('hidden');
              }
              else {
                  $('.error').addClass('hidden');
                  $('#tblRincian').DataTable().ajax.reload();
              }
          },
      });
  });

  //Edit Tarif Perkada
  $(document).on('click', '.edit-rinci', function() {
    $('#footer_action_button').addClass('glyphicon-check');
    $('#footer_action_button').removeClass('glyphicon-trash');
    $('.actionBtn').addClass('btn-success');
    $('.actionBtn').removeClass('btn-danger');
    $('.actionBtn').addClass('editRinci');
    $('.modal-title').text('Edit Data Rincian Item Komponen ASB');
    $('.form-horizontal').show();
    $('#id_komponen_asb_rinci_edit').val($(this).data('id_komponen_rinci'));
    $('#id_komponen_rinci_edit').val($(this).data('id_komponen'));
    $('#id_tarif_ssh_edit').val($(this).data('id_tarif_ssh'));
    $('#id_rekening_edit').val($(this).data('id_rekening'));
    $('#volume_edit').val($(this).data('volume'));
    $('#volume2_edit').val($(this).data('volume2'));
    $('#koefisien_edit').val($(this).data('koefisien'));
    $('#satuan_edit').val($(this).data('satuan'));
    $("#EditKompRinci").modal('show');
  });

  $('.modal-footer').on('click', '.editRinci', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: './editRincian',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_komponen_asb_rinci': $('#id_komponen_asb_rinci_edit').val(),
              'id_komponen_asb': $('#id_komponen_rinci_edit').val(),
              'id_tarif_ssh': $('#id_tarif_ssh_edit').val(),
              'id_rekening': $('#id_rekening_edit').val(),
              'volume': $('#volume_edit').val(),
              'volume2': $('#volume2_edit').val(),
              'koefisien': $('#koefisien_edit').val(),
              'satuan': $('#satuan_edit').val(),
          },
          success: function(data) {
              $('#tblRincian').DataTable().ajax.reload();
          }
      });
  });

  //Hapus Tarif  Perkada
  $(document).on('click', '.delete-rincian', function() {
    $('#footer_action_button').removeClass('glyphicon-check');
    $('#footer_action_button').addClass('glyphicon-trash');
    $('.actionBtn').removeClass('btn-success');
    $('.actionBtn').addClass('btn-danger');
    $('.actionBtn').addClass('delRincian');
    $('.modal-title').text('Hapus Data Tarif SSH');
    $('.id_komponen_rinci_hapus').text($(this).data('id_komponen_rinci'));
    $('.uraian').html($(this).data('nm_rincian'));
    $('#HapusRincian').modal('show');
  });

  $('.modal-footer').on('click', '.delRincian', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      type: 'post',
      url: './hapusRincian',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_tarif_perkada': $('.id_komponen_rinci_hapus').text()
      },
      success: function(data) {
        $('.item' + $('.id_komponen_rinci_hapus').text()).remove();
        $('#tblRincian').DataTable().ajax.reload();
      }
    });
  });

  $("#id_tarif_ssh_edit").click(function(){
    var id_item = $("#id_tarif_ssh_edit").val();

    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      url : "{{ route('GetRekening') }}",
      cache: false,
      type: "POST",
            data: {
                id_tarif :id_item,
                  },
            success : function(response) {
              var json_obj = $.parseJSON(response);
              $('#id_rekening_edit').find('option').remove().end();
              if (json_obj != "") {
               for (var i in json_obj)
                      {
                         $('#id_rekening_edit').append($('<option>', {
                             value: json_obj[i].id_rekening,
                             text : json_obj[i].kd_rek_1 + '.' +json_obj[i].kd_rek_2 + '.' +json_obj[i].kd_rek_3 + '.' +json_obj[i].kd_rek_4 + '.' +json_obj[i].kd_rek_5 + ' -- ' +json_obj[i].nama_kd_rek_5
                         }));
                      }
              } else {
                  $('#id_rekening_edit').append($('<option>', {
                             value: '0',
                             text : 'Not available'
                         }));
              }
            },
            error : function() {}
    });
  });

  $("#id_tarif_ssh").click(function(){
    var id_item = $("#id_tarif_ssh").val();

    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      url : "{{ route('GetRekening') }}",
      cache: false,
      type: "POST",
            data: {
                id_tarif :id_item,
                  },
            success : function(response) {
              var json_obj = $.parseJSON(response);
              $('#id_rekening').find('option').remove().end();
              if (json_obj != "") {
               for (var i in json_obj)
                      {
                         $('#id_rekening').append($('<option>', {
                            value: json_obj[i].id_rekening,
                            text : json_obj[i].kd_rek_1 + '.' +json_obj[i].kd_rek_2 + '.' +json_obj[i].kd_rek_3 + '.' +json_obj[i].kd_rek_4 + '.' +json_obj[i].kd_rek_5 + ' -- ' +json_obj[i].nama_kd_rek_5
                         }));
                      }
              } else {
                  $('#id_rekening').append($('<option>', {
                             value: '0',
                             text : 'Tidak Tersedia'
                         }));
              }
            },
            error : function() {}
    });
  });

} );
</script>
@endsection
