<form id="form-indikator" class="form-horizontal" role="form" method="POST" action="{{ Request::url() }}">
{{ csrf_field() }}
	<div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('kd_unit') ? ' has-error' : '' }}">
            <label for="name" class="col-md-2">Kode Unit</label>

            <div class="col-md-2">
                <input type="text" placeholder="kd_unit" class="form-control" name="kd_unit" value="{{ isset($model['kd_unit']) ? $model['kd_unit'] : '' }}">
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
        <div class="form-group{{ $errors->has('nm_unit') ? ' has-error' : '' }}">
            <label for="name" class="col-md-2">Nama Unit</label>

            <div class="col-md-10">
                <input type="text" class="form-control" name="nm_unit" value="{{ isset($model['nm_unit']) ? $model['nm_unit'] : '' }}">

                @if ($errors->has('nm_unit'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nm_unit') }}</strong>
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