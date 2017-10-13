<form id="form-kegiatan" class="form-horizontal" role="form" method="POST" action="{{ Request::url() }}">
{{ csrf_field() }}
	<div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('kd_kegiatan') ? ' has-error' : '' }}">
            <label for="name" class="col-md-2">Kode Kegiatan</label>
            <div class="col-md-2">
                <input type="text" placeholder="kd_kegiatan" class="form-control" name="kd_kegiatan" value="{{ isset($model['kd_kegiatan']) ? $model['kd_kegiatan'] : '' }}">

                @if ($errors->has('kd_kegiatan'))
                    <span class="help-block">
                        <strong>{{ $errors->first('kd_kegiatan') }}</strong>
                    </span>
                @endif            
            </div>
        </div>     
    </div><!--column-->
</div><!--row-->

<div class="row">
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('nm_kegiatan') ? ' has-error' : '' }}">
            <label for="name" class="col-md-2">Nama Kegiatan</label>

            <div class="col-md-10">
                <input type="text" class="form-control" name="nm_kegiatan" value="{{ isset($model['nm_kegiatan']) ? $model['nm_kegiatan'] : '' }}">

                @if ($errors->has('nm_kegiatan'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nm_kegiatan') }}</strong>
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
        $('form#form-kegiatan').on("submit", function(event) {
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
                        $("#kegiatan").html('<i class="fa fa-spinner fa-spin"></i>');
                        $.get("{{ $referrer }}", function( data ) {
                            $("#kegiatan").html(data);
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