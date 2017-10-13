

<div id="EditModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg"  >

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Edit Zona Pemberlakuan SSH</h4>
      </div>

      
   <!-- <form class="form-horizontal" role="form"> -->
      <div id="EditData" class="modal-body">

        <form class="form-horizontal" role="form" autocomplete='off' action="" method="post" >
          @foreach($showzona as $zonas)
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group">
                    <label for="id_zona" class="col-sm-3 control-label" align='left'>ID Zona :</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" id="id_zona" name="id_zona" required="required" value="{{$zonas->id_zona}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="keterangan_zona" class="col-sm-3 control-label" align='left'>Keterangan Zona SSH :</label>
                    <div class="col-sm-8">
                      <textarea type="text" class="form-control" rows="5" id="keterangan_zona" name="keterangan_zona" required="required" >{{$zonas->keterangan_zona}}</textarea>
                    </div>
                  </div>
              <div class="form-group">
                <div class="modal-footer">
                  <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Save</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-log-out"></i> Close</button>
                </div>
              </div>
            @endforeach
      </form>

      </div>
      
    </div>

  </div>
</div>

