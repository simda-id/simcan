    {{ Form::open(['url' => Request::url(), 'id' => 'pelaksana-form']) }}
        <?php //{!! csrf_field() !!} ?>

        <div class="form-group">
            {{-- {{ Form::label('id_sub_unit', 'Sub Unit') }} --}}
            {{ Form::select('id_sub_unit', $subUnitDropdown, null, ['class' => 'col-md-6 form-control', 'placeholder' => 'Pilih Sub Unit...']) }}
        </div>
        <div class="row"></div>
        
        {{ Form::submit('Simpan', ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}

    <table class="table table-bordered table-striped table-responsive" id="unit-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Kode</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach($userSub as $data)
            <tr>
                <td> {{ $i }} </td>
                <td> {{ $data->kd_unit.'.'.$data->kd_sub }} </td>
                <td> {{ $data->getSubUnit->nm_sub }} </td>
                <td>
                    {!! Form::open(['method' => 'POST', 'url' => '/admin/parameter/user/'.$data->user_id.'.'.$data->kd_unit.'.'.$data->kd_sub.'/deleteunit', 'onsubmit' => 'return confirm(\'Anda Yakin?\');']) !!}
                        <button class="btn btn-xs btn-default" id="submit" type="submit">
                            <i class="glyphicon glyphicon-remove bg-white"></i> Hapus
                        </button>
                    {!! Form::close() !!}                
                </td>
                
            </tr>
            <?php $i++; ?>
            @endforeach
        </tbody>
    </table>