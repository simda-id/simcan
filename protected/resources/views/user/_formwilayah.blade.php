    {{ Form::open(['url' => Request::url(), 'id' => 'pelaksana-form']) }}
        <?php //{!! csrf_field() !!} ?>

        <div class="form-group">
            {{-- {{ Form::label('id_sub_unit', 'Sub Unit') }} --}}
            {{ Form::select('kd_kecamatan', $kecamatanDropdown, null, ['class' => 'form-control col-md-6', 'placeholder' => 'Pilih Kecamatan...']) }}
            {{ Form::select('kd_desa', [], null, ['class' => 'form-control col-md-6', 'placeholder' => 'Pilih Desa...']) }}
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
            @foreach($userDesa as $data)
            <tr>
                <td> {{ $i }} </td>
                <td> {{ $data['kd_kecamatan'].'.'.$data['kd_desa'] }} </td>
                <td> {{ $data['kd_desa'] != NULL ? 'Desa '.$data->getDesa->nama_desa : 'Kecamatan '.$data->getKecamatan->nama_kecamatan }} </td>
                <td>
                    {!! Form::open(['method' => 'POST', 'url' => '/admin/parameter/user/'.$data->user_id.'.'.$data->kd_kecamatan.'.'.$data->kd_desa.'/deletewilayah', 'onsubmit' => 'return confirm(\'Anda Yakin?\');']) !!}
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


<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="kd_kecamatan"]').on('change', function() {
            var kd_kecamatan = $(this).val();
            if(kd_kecamatan) {
                $.ajax({
                    url: '{{ url('/') }}/admin/parameter/user/wilayah/ajaxdesa/'+kd_kecamatan,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {                   
                        $('select[name="kd_desa"]').empty();
                        $('select[name="kd_desa"]').append('<option selected="selected" value="">Pilih Desa...</option>');
                        $.each(data, function(key, value) {
                            $('select[name="kd_desa"]').append('<option value="'+ key +'">'+ value +'</option>');
                            console.log('append');
                        });
                    }
                });
            }else{
                $('select[name="kd_desa"]').empty();
            }
        });
    });
</script>