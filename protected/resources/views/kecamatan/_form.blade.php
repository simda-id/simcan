<form id="form-indikator" class="form-horizontal" role="form" method="POST" action="{{ Request::url() }}">
{{ csrf_field() }}
	<div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('koordinat_1') ? ' has-error' : '' }}">
            <label for="name" class="col-md-2">Kode Kecamatan</label>

            <div class="col-md-2">
                <input type="text" placeholder="kd_kecamatan" class="form-control" name="kd_kecamatan" value="{{ isset($model['kd_kecamatan']) ? $model['kd_kecamatan'] : '' }}">

                @if ($errors->has('kd_kecamatan'))
                    <span class="help-block">
                        <strong>{{ $errors->first('kd_kecamatan') }}</strong>
                    </span>
                @endif            
            </div>
        </div>     
    </div><!--column-->
</div><!--row-->

<div class="row">
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('nama_kecamatan') ? ' has-error' : '' }}">
            <label for="name" class="col-md-2">Nama Kecamatan</label>

            <div class="col-md-10">
                <input type="text" class="form-control" name="nama_kecamatan" value="{{ isset($model['nama_kecamatan']) ? $model['nama_kecamatan'] : '' }}">

                @if ($errors->has('nama_kecamatan'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nama_kecamatan') }}</strong>
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