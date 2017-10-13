<form id="form-kelurahan" class="form-horizontal" role="form" method="POST" action="{{ Request::url() }}">
{{ csrf_field() }}
	<div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('kd_desa') ? ' has-error' : '' }}">
            <label for="name" class="col-md-2">Kode Desa</label>
            <div class="col-md-2">
                <input type="text" placeholder="kd_desa" class="form-control" name="kd_desa" value="{{ isset($model['kd_desa']) ? $model['kd_desa'] : '' }}">

                @if ($errors->has('kd_desa'))
                    <span class="help-block">
                        <strong>{{ $errors->first('kd_desa') }}</strong>
                    </span>
                @endif            
            </div>

            <label for="name" class="col-md-2">Status</label>
            <div class="col-md-2">
                {{ Form::select('status_desa', [
                    0 => 'Desa',
                    1 => 'Kelurahan',
                 ], 
                 isset($model['status_desa']) ? $model->status_desa : null, ['class' => 'col-md-6 form-control', 'placeholder' => 'Pilih Status...']) }}

                @if ($errors->has('status_desa'))
                    <span class="help-block">
                        <strong>{{ $errors->first('status_desa') }}</strong>
                    </span>
                @endif            
            </div>
            <label for="name" class="col-md-2">Zona SSH</label>
            <div class="col-md-2">
                {{ Form::select('id_zona', \App\RefSshZona::pluck('keterangan_zona', 'id_zona'), 
                 isset($model['id_zona']) ? $model->id_zona : null, ['class' => 'col-md-6 form-control', 'placeholder' => 'Pilih Zona...']) }}

                @if ($errors->has('id_zona'))
                    <span class="help-block">
                        <strong>{{ $errors->first('status_desa') }}</strong>
                    </span>
                @endif            
            </div>
        </div>     
    </div><!--column-->
</div><!--row-->

<div class="row">
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('nama_desa') ? ' has-error' : '' }}">
            <label for="name" class="col-md-2">Nama Desa</label>

            <div class="col-md-10">
                <input type="text" class="form-control" name="nama_desa" value="{{ isset($model['nama_desa']) ? $model['nama_desa'] : '' }}">

                @if ($errors->has('nama_desa'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nama_desa') }}</strong>
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

    $(function() {
        $('form#form-kelurahan').on("submit", function(event) {
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
                        $("#kelurahan").html('<i class="fa fa-spinner fa-spin"></i>');
                        $.get("{{ $referrer }}", function( data ) {
                            $("#kelurahan").html(data);
                        });                    
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