<form id="form-indikator" class="form-horizontal" role="form" method="POST" action="{{ Request::url() }}">
{{ csrf_field() }}
	<div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('kd_program') ? ' has-error' : '' }}">
            <label for="name" class="col-md-2">Kode Program</label>

            <div class="col-md-2">
                <input type="text" placeholder="kd_program" class="form-control" name="kd_program" value="{{ isset($model['kd_program']) ? $model['kd_program'] : '' }}">
            </div>
            <label for="name" class="col-md-2">Bidang</label>
            <div class="col-md-6">
                {{ Form::select('id_bidang', $dropDownBidang, isset($model['id_bidang']) ? $model->id_bidang : null, ['class' => 'col-md-6 form-control', 'placeholder' => 'Pilih Bidang...']) }}
            </div>
        </div>             
    </div><!--column-->
</div><!--row-->

<div class="row">
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('uraian_program') ? ' has-error' : '' }}">
            <label for="name" class="col-md-2">Uraian Program</label>

            <div class="col-md-10">
                <input type="text" class="form-control" name="uraian_program" value="{{ isset($model['uraian_program']) ? $model['uraian_program'] : '' }}">

                @if ($errors->has('uraian_program'))
                    <span class="help-block">
                        <strong>{{ $errors->first('uraian_program') }}</strong>
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