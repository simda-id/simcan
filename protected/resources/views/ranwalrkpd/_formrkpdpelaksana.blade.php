<form id="form-rkpd-pelaksana" class="form-horizontal" role="form" method="POST" action="{{ Request::url() }}">
{{ csrf_field() }}

<div class="row">
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('no_urut') ? ' has-error' : '' }}">
            <label for="name" class="col-md-2">No Urut</label>

            <div class="col-md-10">
                <input id="no_urut" type="text" class="form-control" name="no_urut" value="{{ isset($model['no_urut']) ? $model['no_urut'] : '' }}">

                @if ($errors->has('no_urut'))
                    <span class="help-block">
                        <strong>{{ $errors->first('no_urut') }}</strong>
                    </span>
                @endif
            </div>
        </div>    
    </div><!--column-->
</div><!--row-->

<div class="row">
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('id_unit') ? ' has-error' : '' }}">
            <label for="name" class="col-md-2">Unit Pelaksana</label>

            <div class="col-md-10">
                <!--<input id="uraian_program_rpjmd" type="text" class="form-control" name="uraian_program_rpjmd" value="{{ isset($model['uraian_program_rpjmd']) ? $model['uraian_program_rpjmd'] : '' }}">-->
                {{ Form::select('id_unit', $unitDropdown, null, ['class' => 'col-md-6 form-control', 'placeholder' => 'Pilih Unit...']) }}

                @if ($errors->has('id_unit'))
                    <span class="help-block">
                        <strong>{{ $errors->first('id_unit') }}</strong>
                    </span>
                @endif
            </div>
        </div>     
    </div><!--column-->
</div><!--row-->

<div class="row">
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('pagu_tahun') ? ' has-error' : '' }}">
            <label for="name" class="col-md-4">Pagu</label>

            <div class="col-md-8">
                <input id="pagu_tahun" type="text" class="form-control" name="pagu_tahun" value="{{ isset($model['pagu_tahun']) ? $model['pagu_tahun'] : '' }}">

                @if ($errors->has('pagu_tahun'))
                    <span class="help-block">
                        <strong>{{ $errors->first('pagu_tahun') }}</strong>
                    </span>
                @endif
            </div>
        </div>    
    </div><!--column-->
</div><!--row-->

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
            Simpan
        </button>
    </div>
</div>

</form>

<script>
    $(function() {
        $('form#form-rkpd-pelaksana').on("submit", function(event) {
            event.preventDefault();

            $.ajax({
                url: "{{ Request::url() }}",
                type: 'post',
                data: $(this).serialize(),
                beforeSend: function(){
                        // create before send here
                    },
                    complete: function(){
                        // create complete send here
                    },
                success: function() {
                    console.log('submit');
                    $("#myModal").modal('hide');
                    $('#pelaksana').html('<i class=\"fa fa-spinner fa-spin\"></i>');
                    $.get("{{ $referrer }}").done(function(data){
                        $('#pelaksana').html(data);
                    });
                }
            });
        });
    });
</script>