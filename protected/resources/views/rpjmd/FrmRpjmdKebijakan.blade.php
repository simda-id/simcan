<div id="Editkebijakan" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="post" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" class="form-control" id="id_kebijakan_rpjmd_edit" name="id_kebijakan_rpjmd_edit" readonly >
              <input type="hidden" class="form-control" id="id_sasaran_rpjmd_kebijakan_edit" name="id_sasaran_rpjmd_kebijakan_edit" readonly >
              <div class="form-group">
                <label class="control-label col-sm-3" for="id_kebijakan_rpjmd_edit">No Sasaran RPJMD :</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="id_sasaran_kebijakan_edit" name="id_sasaran_kebijakan_edit" readonly style="text-align:center;">
                </div>
              </div>
              <div class="form-group">
                <label for="no_urut_edit" class="col-sm-3 control-label" align='left'>Nomor Urut :</label>
                <div class="col-sm-2">
                  <input type="text" class="form-control number" id="no_urut_kebijakan_edit" name="no_urut_kebijakan_edit" required="required" style="text-align:center;">
                </div>
              </div>
              <div class="form-group">
                <label for="id_perubahan_edit" class="col-sm-3 control-label" align='left'>ID Perubahan :</label>
                <div class="col-sm-2">
                  <input type="text" class="form-control number" id="id_perubahan_kebijakan_edit" name="id_perubahan_edit" required="required" style="text-align:center;">
                </div>
              </div>
              <div class="form-group">
                <label for="ur_kebijakan_rpjmd_edit" class="col-sm-3 control-label" align='left'>Uraian Kebijakan RPJMD :</label>
                <div class="col-sm-8">
                  <textarea type="text" class="form-control" rows="5" id="ur_kebijakan_rpjmd_edit" name="ur_kebijakan_rpjmd_edit" required="required" ></textarea>
                </div>
              </div>
          </form>
        </div>
        <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left">
                      <button type="button" id="btnDelKebijakan" class="btn btn-labeled btn-danger btnDelKebijakan"><span class="btn-label"><i class="fa fa-trash-o fa-lg fa-fw"></i></span>Hapus</button>
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-success actionBtn_kebijakan btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i class="glyphicon glyphicon-save"></i></span>Simpan</button>
                        <div class="or hidden"></div>
                        <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
      </div>
    </div>
  </div>