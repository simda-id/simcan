<form id="form-indikator" class="form-horizontal" role="form" method="POST" action="{{ Request::url() }}">
{{ csrf_field() }}
	<div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div>
<div class="row">
<div class="col-md-6">
        <div class="form-group{{ $errors->has('nama_lokasi') ? ' has-error' : '' }}">
            <label for="name" class="col-md-4">Nama Lokasi</label>

            <div class="col-md-8">
                <input type="text" class="form-control" name="nama_lokasi" value="{{ isset($model['nama_lokasi']) ? $model['nama_lokasi'] : '' }}">

                @if ($errors->has('nama_lokasi'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nama_lokasi') }}</strong>
                    </span>
                @endif
            </div>
        </div>    
    </div><!--column-->
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('keterangan_lokasi') ? ' has-error' : '' }}">
            <label for="name" class="col-md-4">Keterangan Lokasi</label>

            <div class="col-md-8">
                <input type="text" class="form-control" name="keterangan_lokasi" value="{{ isset($model['keterangan_lokasi']) ? $model['keterangan_lokasi'] : '' }}">

                @if ($errors->has('keterangan_lokasi'))
                    <span class="help-block">
                        <strong>{{ $errors->first('keterangan_lokasi') }}</strong>
                    </span>
                @endif
            </div>
        </div>    
    </div><!--column-->
</div><!--row-->

<div class="row">
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('jenis_lokasi') ? ' has-error' : '' }}">
            <label for="name" class="col-md-2">Jenis</label>

            <div class="col-md-4">
                 {{ Form::select('jenis_lokasi', [
                    0 => 'Kewilayahan',
                    1 => 'Ruas Jalan',
                    2 => 'Saluran Irigasi',
                    3 => 'Kawasan',
                    99 => 'Luar Daerah',
                 ], 
                 isset($model['jenis_lokasi']) ? $model->jenis_lokasi : null, ['class' => 'col-md-6 form-control', 'placeholder' => 'Pilih Jenis...']) }}

                @if ($errors->has('jenis_lokasi'))
                    <span class="help-block">
                        <strong>{{ $errors->first('jenis_lokasi') }}</strong>
                    </span>
                @endif
            </div>

            <label for="name" class="col-md-2">Desa</label>
            <div class="col-md-4">
                {{ Form::select('id_desa', $dropDownDesa, isset($model['id_desa']) ? $model->id_desa : null, ['class' => 'col-md-6 form-control', 'placeholder' => 'Pilih Desa...']) }}

                @if ($errors->has('id_desa'))
                    <span class="help-block">
                        <strong>{{ $errors->first('id_desa') }}</strong>
                    </span>
                @endif
            </div>
        </div>     
    </div><!--column-->
</div><!--row-->

<div class="row">
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('id_desa_awal') ? ' has-error' : '' }}">
            <label for="name" class="col-md-2">Desa Awal</label>

            <div class="col-md-4">
                 {{ Form::select('id_desa_awal', $dropDownDesa, isset($model['id_desa_awal']) ? $model->id_desa_awal : null, ['class' => 'col-md-6 form-control', 'placeholder' => 'Pilih Desa Awal...']) }}

                @if ($errors->has('id_desa_awal'))
                    <span class="help-block">
                        <strong>{{ $errors->first('id_desa_awal') }}</strong>
                    </span>
                @endif
            </div>

            <label for="name" class="col-md-2">Desa Akhir</label>

            <div class="col-md-4">
                {{ Form::select('id_desa_akhir', $dropDownDesa, isset($model['id_desa_akhir']) ? $model->id_desa_akhir : null, ['class' => 'col-md-6 form-control', 'placeholder' => 'Pilih Desa Akhir...']) }}

                @if ($errors->has('id_desa_akhir'))
                    <span class="help-block">
                        <strong>{{ $errors->first('id_desa_akhir') }}</strong>
                    </span>
                @endif
            </div>
        </div>     
    </div><!--column-->
</div><!--row-->

<div class="row">
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('koordinat_1') ? ' has-error' : '' }}">
            <label for="name" class="col-md-2">Koordinat</label>

            <div class="col-md-2">
                <input type="text" placeholder="koordinat_1" class="form-control" name="koordinat_1" value="{{ isset($model['koordinat_1']) ? $model['koordinat_1'] : '' }}">

                @if ($errors->has('koordinat_1'))
                    <span class="help-block">
                        <strong>{{ $errors->first('koordinat_1') }}</strong>
                    </span>
                @endif            
            </div>
            <div class="col-md-2">
                <input type="text" placeholder="koordinat_2" class="form-control" name="koordinat_2" value="{{ isset($model['koordinat_2']) ? $model['koordinat_2'] : '' }}">

                @if ($errors->has('koordinat_2'))
                    <span class="help-block">
                        <strong>{{ $errors->first('koordinat_2') }}</strong>
                    </span>
                @endif            
            </div>
            <div class="col-md-2">
                <input type="text" placeholder="koordinat_3" class="form-control" name="koordinat_3" value="{{ isset($model['koordinat_3']) ? $model['koordinat_3'] : '' }}">

                @if ($errors->has('koordinat_3'))
                    <span class="help-block">
                        <strong>{{ $errors->first('koordinat_3') }}</strong>
                    </span>
                @endif            
            </div>
            <div class="col-md-2">
                <input type="text" placeholder="koordinat_4" class="form-control" name="koordinat_4" value="{{ isset($model['koordinat_4']) ? $model['koordinat_4'] : '' }}">

                @if ($errors->has('koordinat_4'))
                    <span class="help-block">
                        <strong>{{ $errors->first('koordinat_4') }}</strong>
                    </span>
                @endif            
            </div>
        </div>     
    </div><!--column-->
</div><!--row-->

<div class="row">
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('panjang') ? ' has-error' : '' }}">
            <label for="name" class="col-md-2">Dimensi</label>

            <div class="col-md-2">
                <input type="text" placeholder="panjang" class="form-control" name="panjang" value="{{ isset($model['panjang']) ? $model['panjang'] : '' }}">         
            </div>
            <div class="col-md-2">
                <input type="text" placeholder="satuan_panjang" class="form-control" name="satuan_panjang" value="{{ isset($model['satuan_panjang']) ? $model['satuan_panjang'] : '' }}">        
            </div>
            <div class="col-md-2">
                <input type="text" placeholder="lebar" class="form-control" name="lebar" value="{{ isset($model['lebar']) ? $model['lebar'] : '' }}">         
            </div>
            <div class="col-md-2">
                <input type="text" placeholder="satuan_lebar" class="form-control" name="satuan_lebar" value="{{ isset($model['satuan_lebar']) ? $model['satuan_lebar'] : '' }}">         
            </div>
            
        </div>     
    </div><!--column-->
</div><!--row-->

<div class="row">
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('luasan_kawasan') ? ' has-error' : '' }}">
            <label for="name" class="col-md-2">Luas</label>

            <div class="col-md-4">
                <input type="text" placeholder="luasan_kawasan" class="form-control" name="luasan_kawasan" value="{{ isset($model['luasan_kawasan']) ? $model['luasan_kawasan'] : '' }}">         
            </div>
            <div class="col-md-4">
                <input type="text" placeholder="satuan_luas" class="form-control" name="satuan_luas" value="{{ isset($model['satuan_luas']) ? $model['satuan_luas'] : '' }}">        
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