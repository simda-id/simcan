<form id="form-indikator" class="form-horizontal" role="form" method="POST" action="{{ Request::url() }}">
{{ csrf_field() }}
	<div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('nm_indikator') ? ' has-error' : '' }}">
            <label for="name" class="col-md-2">Nama Indikator</label>

            <div class="col-md-10">
                <input type="text" class="form-control" name="nm_indikator" value="{{ isset($model['nm_indikator']) ? $model['nm_indikator'] : '' }}">

                @if ($errors->has('nm_indikator'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nm_indikator') }}</strong>
                    </span>
                @endif
            </div>
        </div>    
    </div><!--column-->
</div><!--row-->

<div class="row">
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('jenis_indikator') ? ' has-error' : '' }}">
            <label for="name" class="col-md-2">Jenis</label>

            <div class="col-md-4">
                 {{ Form::select('jenis_indikator', [
                    0 => 'Absolut',
                    1 => 'Inkremental'
                 ], 
                 isset($model['jenis_indikator']) ? $model->jenis_indikator : null, ['class' => 'col-md-6 form-control', 'placeholder' => 'Pilih Jenis...']) }}

                @if ($errors->has('jenis_indikator'))
                    <span class="help-block">
                        <strong>{{ $errors->first('jenis_indikator') }}</strong>
                    </span>
                @endif
            </div>

            <label for="name" class="col-md-2">Sifat</label>

            <div class="col-md-4">
                {{ Form::select('sifat_indikator', [
                    0 => 'Negatif',
                    1 => 'Positif',
                ], isset($model['sifat_indikator']) ? $model->sifat_indikator : null, ['class' => 'col-md-6 form-control', 'placeholder' => 'Pilih Sifat...']) }}

                @if ($errors->has('sifat_indikator'))
                    <span class="help-block">
                        <strong>{{ $errors->first('sifat_indikator') }}</strong>
                    </span>
                @endif
            </div>
        </div>     
    </div><!--column-->
</div><!--row-->

<div class="row">
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('flag_iku') ? ' has-error' : '' }}">
            <label for="name" class="col-md-2">IKU</label>

            <div class="col-md-4">
                 {{ Form::select('flag_iku', [
                    0 => 'Non-IKU',
                    1 => 'IKU Pemda',
                    2 => 'IKU SKPD',
                 ], isset($model['flag_iku']) ? $model->flag_iku : null, ['class' => 'col-md-6 form-control', 'placeholder' => 'IKU...']) }}

                @if ($errors->has('flag_iku'))
                    <span class="help-block">
                        <strong>{{ $errors->first('flag_iku') }}</strong>
                    </span>
                @endif
            </div>

            <label for="name" class="col-md-2">Asal Indikator</label>

            <div class="col-md-4">
                {{ Form::select('asal_indikator', [
                    0 => 'RPJMD',
                    1 => 'Renstra',
                    2 => 'RKPD',
                    3 => 'Renja',
                ], isset($model['asal_indikator']) ? $model->asal_indikator : null, ['class' => 'col-md-6 form-control', 'placeholder' => 'Asal Indikator...']) }}

                @if ($errors->has('asal_indikator'))
                    <span class="help-block">
                        <strong>{{ $errors->first('asal_indikator') }}</strong>
                    </span>
                @endif
            </div>
        </div>     
    </div><!--column-->
</div><!--row-->

<div class="row">
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('sumber_data_indikator') ? ' has-error' : '' }}">
            <label for="name" class="col-md-2">Sumber Data</label>

            <div class="col-md-10">
                <input type="text" class="form-control" name="sumber_data_indikator" value="{{ isset($model['sumber_data_indikator']) ? $model['sumber_data_indikator'] : '' }}">

                @if ($errors->has('sumber_data_indikator'))
                    <span class="help-block">
                        <strong>{{ $errors->first('sumber_data_indikator') }}</strong>
                    </span>
                @endif
            </div>
        </div>    
    </div><!--column-->   
</div><!--row-->

<div class="form-group">
    <div class="col-md-6">
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
        $('form#form-indikator').on("submit", function(event) {
            event.preventDefault();

	        $.ajax({
	            url: "{{ Request::url() }}",
	            type:'POST',
	            data: $(this).serialize(),
	            success: function(data) {
	                if($.isEmptyObject(data.error)){
	                	// printErrorMsg(data.success);
                        $("#myModal").modal('hide');
                        // $('#ranwal-table').DataTable().ajax.reload();
                        location.reload();                     
	                }else{
	                	printErrorMsg(data.error);
	                }
	            }
	        });

	    }); 

	    function printErrorMsg (msg) {
			$(".print-error-msg").find("ul").html('');
			$(".print-error-msg").css('display','block');
			$.each( msg, function( key, value ) {
				$(".print-error-msg").find("ul").append('<li>'+value+'</li>');
			});
		}
    });   
</script>