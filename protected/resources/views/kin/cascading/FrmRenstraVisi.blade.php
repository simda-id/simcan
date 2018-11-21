{{-- EditVisi --}}
<div id="ModalVisi" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> --}}
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="post" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" class="form-control" id="id_visi_renstra_edit" name="id_visi_renstra_edit">
              <input type="hidden" class="form-control" id="id_renstra_edit" name="id_renstra_edit" required="required" >
              <input type="hidden" class="form-control" id="thn_id_edit" name="thn_id_edit" required="required" readonly>
              <div class="form-group">
                <label for="thn_id_edit" class="col-sm-3 control-label" align='left'>Periode renstra :</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="thn_periode_visi" name="thn_periode_visi" required="required" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="no_urut_edit" class="col-sm-3 control-label" align='left'>Nomor Urut :</label>
                <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control" id="no_urut_edit" name="no_urut_edit" required="required">                  
                </div>
                </div>
              </div>
              <div class="form-group">
                <label for="id_perubahan_edit" class="col-sm-3 control-label" align='left'>ID Perubahan :</label>
                <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control" id="id_perubahan_edit" name="id_perubahan_edit" required="required">                  
                </div>
                </div>
              </div>
              <div class="form-group">
                <label for="ur_visi_renstra_edit" class="col-sm-3 control-label" align='left'>Uraian Visi renstra :</label>
                <div class="col-sm-8">
                  <textarea type="text" class="form-control" rows="5" id="ur_visi_renstra_edit" name="ur_visi_renstra_edit" required="required" ></textarea>
                </div>
              </div>
          </form>
        </div>
        <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        {{-- <button type="button" class="btn btn-success actionBtn_visi btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i class="glyphicon glyphicon-save"></i></span>Simpan</button>
                        <div class="or"></div> --}}
                        <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
      </div>
    </div>
</div>