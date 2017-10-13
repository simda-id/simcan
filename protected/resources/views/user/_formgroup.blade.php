    {{ Form::open(['url' => Request::url(), 'id' => 'pelaksana-form']) }}
        <?php //{!! csrf_field() !!} ?>

        <div class="form-group">
            {{ Form::label('name', 'Nama Grup') }}
            {{ Form::text('name', isset($model->name) ? $model->name : NULL, ['class' => 'form-control col-md-6']) }}
        </div>

        <div class="form-group">
            {{ Form::label('keterangan', 'Keterangan') }}
            {{ Form::text('keterangan', isset($model->keterangan) ? $model->keterangan : NULL, ['class' => 'form-control col-md-6']) }}
        </div>

        {{ Form::submit('Simpan', ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}