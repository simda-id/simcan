<form id="form-rkpd-kebijakan" class="form-horizontal" role="form" method="POST" action="{{ Request::url() }}">
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
    <div class="col-md-6">
        <button type="submit" class="btn btn-primary">
            Simpan
        </button>
    </div>
</div>

</form>

<script>
    $(function() {
        $('form#form-rkpd-kebijakan').on("submit", function(event) {
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
                    $('#pelaksana').html('<i class=\"fa fa-spinner fa-spin\"></i>');
                    $.get("{{ $referrer }}").done(function(data){
                        $('#pelaksana').html(data);
                    });
                }
            });
        });
    });
</script>