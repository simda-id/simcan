<div id="EditSasaranModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="post" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" class="form-control" id="id_sasaran_rpjmd_edit" name="id_sasaran_rpjmd_edit">
              <input type="hidden" class="form-control" id="thn_id_sasaran_edit" name="thn_id_edit">
              <input type="hidden" class="form-control" id="id_tujuan_rpjmd_sasaran_edit" name="id_tujuan_rpjmd_sasaran_edit">
              <div class="form-group">
                <label class="control-label col-sm-3" for="no_tujuan_sasaran_edit">No Tujuan RPJMD :</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control number" id="no_tujuan_sasaran_edit" name="no_tujuan_sasaran_edit" readonly  style="text-align:center;">
                </div>
              </div>
              <div class="form-group">
                <label for="no_urut_edit" class="col-sm-3 control-label" align='left'>Nomor Urut :</label>
                <div class="col-sm-2">
                  <input type="text" class="form-control number" id="no_urut_sasaran_edit" name="no_urut_sasaran_edit" required="required" style="text-align:center;">
                </div>
                <label for="id_perubahan_edit" class="col-sm-3 control-label" align='left'>ID Perubahan :</label>
                <div class="col-sm-2">
                  <input type="text" class="form-control number" id="id_perubahan_sasaran_edit" name="id_perubahan_edit" required="required" style="text-align:center;">
                </div>
              </div>
              <div class="form-group">
                <label for="ur_sasaran_rpjmd_edit" class="col-sm-3 control-label" align='left'>Uraian Sasaran RPJMD :</label>
                <div class="col-sm-8">
                  <textarea type="text" class="form-control" rows="5" id="ur_sasaran_rpjmd_edit" name="ur_sasaran_rpjmd_edit" required="required" ></textarea>
                </div>
              </div>
          </form>
        </div>
        <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left">
                      <button type="button" id="btnDelSasaran" class="btn btn-labeled btn-danger btnDelSasaran"><span class="btn-label"><i class="fa fa-trash-o fa-lg fa-fw"></i></span>Hapus</button>
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-success actionBtn_sasaran btn-labeled" data-dismiss="modal">
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