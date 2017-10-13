<form id="form-rkpd" class="form-horizontal" role="form" method="POST" action="{{ Request::url() }}">
{{ csrf_field() }}

<div class="row">
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('no_urut') ? ' has-error' : '' }}">
            <label for="name" class="col-md-4">No Urut</label>

            <div class="col-md-8">
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
        <div class="form-group{{ $errors->has('uraian_kebijakan') ? ' has-error' : '' }}">
            <label for="name" class="col-md-2">Uraian Kebijakan</label>

            <div class="col-md-10">
                <textarea rows="3" id="uraian_kebijakan" class="form-control" name="uraian_kebijakan">{{ isset($model['uraian_kebijakan']) ? $model['uraian_kebijakan'] : '' }}</textarea>
                @if ($errors->has('uraian_kebijakan'))
                    <span class="help-block">
                        <strong>{{ $errors->first('uraian_kebijakan') }}</strong>
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
    $('form#form-rkpd').on('beforeSubmit',function(e)
    {
        var form = $(this);
        $.post(
            form.attr("action"), //serialize Yii2 form 
            form.serialize()
        )
            .done(function(result){
                if(result == 1)
                {
                    $("#myModal").modal('hide'); //hide modal after submit
                    //$(\$form).trigger("reset"); //reset form to reuse it to input
                    // $.pjax.reload({container:'#ta-baver-pjax'});
                    $('#ranwal-table').DataTable().ajax.reload();
                }else
                {
                    $("#message").html(result);
                }
            }).fail(function(){
                console.log("server error");
            });
        e.preventDefault();
        return false;

        // another method
        // $.ajaxSetup({
        // headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        // });

        // $.ajax({
        //     type: 'post',
        //     url: '{{ Request::url() }}',
        //     data: {
        //         \$form.attr("action"), \$form.serialize()
        //     },
        //     success: function(data) {
        //         if ((data.errors)){
        //         $('.error').removeClass('hidden');
        //             $('.error').text(data.errors.name1);
        //         }
        //         else {
        //             $('.error').addClass('hidden');
        //             $('#ranwal-table').DataTable().ajax.reload();
        //         }
        //     },
        // });

        // $('#ranwal-table').DataTable().ajax.reload();        
    });    
</script>