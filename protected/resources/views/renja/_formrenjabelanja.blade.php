<form id="form-renja-belanja" class="form-horizontal" role="form" method="POST" action="{{ Request::url() }}">
{{ csrf_field() }}

<div class="row">
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('no_urut') ? ' has-error' : '' }}">
            <label for="name" class="col-md-2">No Urut</label>

            <div class="col-md-6">
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
        <div class="form-group{{ $errors->has('id_sub_unit') ? ' has-error' : '' }}">
            <label for="name" class="col-md-2">Rekening SSH</label>

            <div class="col-md-6">
                 {{ Form::select('id_rekening_ssh', $sshRekeningDropdown == NULL ? [] : $sshRekeningDropdown, null, ['class' => 'col-md-6 form-control', 'placeholder' => 'Pilih Rekening...']) }}

                @if ($errors->has('id_rekening_ssh'))
                    <span class="help-block">
                        <strong>{{ $errors->first('id_rekening_ssh') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('id_sub_unit') ? ' has-error' : '' }}">
            <label for="name" class="col-md-2">Satuan</label>

            <div class="col-md-2">
                {{ Form::select('id_satuan', $satuanDropdown == NULL ? [] : $satuanDropdown, null, ['class' => 'col-md-6 form-control', 'placeholder' => 'Pilih Satuan...']) }}

                @if ($errors->has('id_satuan'))
                    <span class="help-block">
                        <strong>{{ $errors->first('id_satuan') }}</strong>
                    </span>
                @endif
            </div>
        </div>     
    </div><!--column-->
</div><!--row-->

<div class="row">
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('pagu_aktivitas') ? ' has-error' : '' }}">
            <label for="name" class="col-md-4">Volume</label>

            <div class="col-md-8">
                <input type="text" id="volume_belanja" class="form-control" name="volume_belanja" value="{{ isset($model['volume_belanja']) ? $model['volume_belanja'] : '' }}">

                @if ($errors->has('volume_belanja'))
                    <span class="help-block">
                        <strong>{{ $errors->first('volume_belanja') }}</strong>
                    </span>
                @endif
            </div>
        </div>    
    </div><!--column-->
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('pagu_aktivitas') ? ' has-error' : '' }}">
            <label for="name" class="col-md-4">Koefisien</label>

            <div class="col-md-8">
                <input type="text" class="form-control" name="koefisien" value="{{ isset($model['koefisien']) ? $model['koefisien'] : '' }}">

                @if ($errors->has('koefisien'))
                    <span class="help-block">
                        <strong>{{ $errors->first('koefisien') }}</strong>
                    </span>
                @endif
            </div>
        </div>  
    </div><!--column-->    
</div><!--row-->

<div class="row">
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('pagu_aktivitas') ? ' has-error' : '' }}">
            <label for="name" class="col-md-4">Harga Satuan</label>

            <div class="col-md-8">
                <input type="text" id="harga_satuan" class="form-control" name="harga_satuan" value="{{ isset($model['harga_satuan']) ? $model['harga_satuan'] : '' }}">

                @if ($errors->has('harga_satuan'))
                    <span class="help-block">
                        <strong>{{ $errors->first('harga_satuan') }}</strong>
                    </span>
                @endif
            </div>
        </div>    
    </div><!--column-->
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('pagu_aktivitas') ? ' has-error' : '' }}">
            <label for="name" class="col-md-4">Total</label>

            <div class="col-md-8">
                <input type="text" id="jml_belanja" class="form-control" name="jml_belanja" disabled value="{{ isset($model['jml_belanja']) ? $model['jml_belanja'] : '' }}">

                @if ($errors->has('jml_belanja'))
                    <span class="help-block">
                        <strong>{{ $errors->first('jml_belanja') }}</strong>
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
    $("#volume_belanja, #harga_satuan").keyup(function(){
        var volume = $("#volume_belanja").val(), hargaSatuan = $("#harga_satuan").val();
        volume = volume - 0;
        hargaSatuan = hargaSatuan - 0;
        total = volume * hargaSatuan;
        console.log(total);
        $("#jml_belanja").val(total);
    })

    $(function() {
        $('form#form-renja-pelaksana').on("submit", function(event) {
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
                    $('#belanja').html('<i class=\"fa fa-spinner fa-spin\"></i>');
                    $.get("{{ $referrer }}").done(function(data){
                        $('#belanja').html(data);
                    });
                }
            });
        });
    });
</script>