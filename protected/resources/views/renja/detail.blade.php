@extends('layouts.app')

@section('content')	
<div class="col-md-12">	
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Renja Kegiatan:<b> {!! $renja->uraian_kegiatan_renstra !!} </b> </h3>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-hover">
                <tr>
                    <td>Program</td>
                    <td>{!! $renja['id_program_renstra'].' '.$renja['uraian_program_renstra'] !!}</td>
                </tr>
                <tr>
                    <td>Kegiatan</td>
                    <td>{!! $renja['id_program_renstra'].'.'.$renja['id_kegiatan_renstra'].' '.$renja['uraian_kegiatan_renstra'] !!}</td>
                </tr>
                <tr>
                    <td>Pagu</td>
                    <td>{!! number_format($renja['pagu_tahun_kegiatan'], 0, ',', '.') !!}</td>
                </tr>
                <tr>
                    <td>Pagu Musrenbang</td>
                    <td>{!! number_format($renja['pagu_musren'], 0, ',', '.') !!}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div class="col-md-12 col-sm-12">
    <div>

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#pelaksana" aria-controls="pelaksana" role="tab" data-toggle="tab">Pelaksana</a></li>
            {{-- <li role="presentation"><a href="#lokasi" aria-controls="lokasi" role="tab" data-toggle="tab">Lokasi</a></li> --}}
            <li role="presentation"><a href="#indikator" aria-controls="indikator" role="tab" data-toggle="tab">Indikator</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="pelaksana">
                <div class="col-md-12">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal">
                    <i class="glyphicon glyphicon-plus"></i> Tambah Pelaksana
                    </button>
                </div>
                <div class="col-md-12">
                    <table class="table table-bordered table-striped table-responsive" id="pelaksana-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Sub Unit</th>
                                <th>Uraian Aktivitas</th>
                                <th>Target Output</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            {{-- <div role="tabpanel" class="tab-pane" id="lokasi">dasdadssa</div> --}}
            <div role="tabpanel" class="tab-pane" id="indikator">
                <div class="col-md-12">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal2">
                    <i class="glyphicon glyphicon-plus"></i> Tambah Indikator
                    </button>
                </div>
                    <table class="table table-bordered table-striped table-responsive" id="indikator-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Indikator</th>
                                <th>Uraian Indikator</th>
                                <th>Tolok Ukur</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
 
@section('scripts')
<script>
$(function() {
    $('#pelaksana-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ url('/admin/rancanganrenja/'.$renja->id_renja.'/detail') }}',
        columns: [
            { data: 'id_pelaksana_renja', name: 'id_pelaksana_renja' },
            { data: 'subunit', name: 'subunit' },
            { data: 'uraian_aktivitas_kegiatan', name: 'uraian_aktivitas_kegiatan' },
            { data: 'target_output_aktivitas', name: 'target_output_aktivitas' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
});

$(function() {
    $('#indikator-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ url('/admin/rancanganrenja/'.$renja->id_renja.'/dataindikator') }}',
        columns: [
            { data: 'id_indikator_program_renja', name: 'id_indikator_program_renja' },
            { data: 'kd_indikator', name: 'kd_indikator' },
            { data: 'uraian_indikator_program_renja', name: 'uraian_indikator_program_renja' },
            { data: 'tolok_ukur_indikator', name: 'tolok_ukur_indikator' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
});

    $('#myTabs a').click(function (e) {
    e.preventDefault()
    $(this).tab('show')
    })
</script>
@endsection

<!-- Modal Pelaksana -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Pelaksana</h4>
      </div>
      <div class="modal-body">
		    {{ Form::open(['url' => Request::url(), 'id' => 'pelaksana-form']) }}
                <?php //{!! csrf_field() !!} ?>

                {{ Form::hidden('form', 1) }}

		        <div class="form-group">
		            {{ Form::label('no_urut', 'No Urut') }}
		            {{ Form::text('no_urut', NULL, ['class' => 'form-control']) }}
		        </div>

		        <div class="form-group">
		            {{ Form::label('sub_unit', 'Sub Unit Pelaksana') }}                    
                    {{ Form::select('id_sub_unit', $dropdownsubunit, null, ['placeholder' => 'Pilih Sub Unit Pelaksana...', 'class' => 'form-control']) }}
                </div>                

                <div class="form-group">
		            {{ Form::label('uraian', 'Uraian Aktivitas') }}
                    {{ Form::select('uraian_aktivitas_kegiatan', $ddaktivitas, null, ['placeholder' => 'Pilih aktivitas...', 'class' => 'form-control']) }}
		        </div>

		        <div class="form-group">
		            {{ Form::label('tolak_ukur', 'Tolak Ukur Aktivitas') }}
		            {{ Form::text('tolak_ukur_aktivitas', NULL, ['class' => 'form-control col-md-6']) }}
		        </div>

                <div class="form-group">
		            {{ Form::label('target output', 'Target Output') }}
		            {{ Form::text('target_output_aktivitas', NULL, ['class' => 'form-control col-md-6']) }}
		        </div>

		        {{-- <div class="form-group">
		            {{ Form::label('lat', 'Latitude') }}
		            {{ Form::input('date', 'lat', NULL, ['class' => 'form-control']) }}
		        </div>         --}}

		        <div class="form-group">
		            {{ Form::label('pagu', 'Pagu') }}
		            {{ Form::text('pagu_aktivitas', NULL, ['class' => 'form-control']) }}
		        </div>

		        {{ Form::submit('Simpan', ['class' => 'btn btn-primary']) }}

		    {{ Form::close() }}
      </div>
    </div>
  </div>
</div>

<!-- Modal Indikator -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Indikator</h4>
      </div>
      <div class="modal-body">
		    {{ Form::open(['url' => Request::url(), 'id' => 'pelaksana-form']) }}
                <?php //{!! csrf_field() !!} ?>

                {{ Form::hidden('form', 2) }}

		        <div class="form-group">
		            {{ Form::label('no_urut', 'No Urut') }}
		            {{ Form::text('no_urut', NULL, ['class' => 'form-control']) }}
		        </div>

                <div class="form-group">
		            {{ Form::label('uraian', 'Uraian Indikator') }}
		            {{ Form::text('uraian_indikator_program_renja', NULL, ['class' => 'form-control col-md-12']) }}
		        </div>

		        <div class="form-group">
		            {{ Form::label('tolok_ukur', 'Tolok Ukur Indikator') }}
		            {{ Form::text('tolok_ukur_indikator', NULL, ['class' => 'form-control col-md-6']) }}
		        </div>

                <div class="form-group">
		            {{ Form::label('angka_tahun', 'Angka Tahun') }}
		            {{ Form::text('angka_tahun', NULL, ['class' => 'form-control col-md-6']) }}
		        </div>

		        {{ Form::submit('Simpan', ['class' => 'btn btn-primary']) }}

		    {{ Form::close() }}
      </div>
    </div>
  </div>
</div>