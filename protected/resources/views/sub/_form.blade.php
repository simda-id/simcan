<form id="form-sub" class="form-horizontal" role="form" method="POST" action="{{ Request::url() }}">
{{ csrf_field() }}
	<div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('kd_sub') ? ' has-error' : '' }}">
            <label for="name" class="col-md-2">Kode Sub</label>
            <div class="col-md-2">
                <input type="text" placeholder="kd_sub" class="form-control" name="kd_sub" value="{{ isset($model['kd_sub']) ? $model['kd_sub'] : '' }}">

                @if ($errors->has('kd_sub'))
                    <span class="help-block">
                        <strong>{{ $errors->first('kd_sub') }}</strong>
                    </span>
                @endif            
            </div>
        </div>     
    </div><!--column-->
</div><!--row-->

<div class="row">
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('nm_sub') ? ' has-error' : '' }}">
            <label for="name" class="col-md-2">Nama Sub Unit</label>

            <div class="col-md-10">
                <input type="text" class="form-control" name="nm_sub" value="{{ isset($model['nm_sub']) ? $model['nm_sub'] : '' }}">

                @if ($errors->has('nm_sub'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nm_sub') }}</strong>
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
        $('form#form-sub').on("submit", function(event) {
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
                        $("#sub").html('<i class="fa fa-spinner fa-spin"></i>');
                        $.get("{{ $referrer }}", function( data ) {
                            $("#sub").html(data);
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