<div id="ModalSotkLevel2" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form name="frmModalLevel2" class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" class="form-control" id="id_sotk_es2_text" name="id_sotk_es2_text" readonly >
              <input type="hidden" class="form-control" id="id_sotk_es3_text" name="id_sotk_es3_text" required="required" >
              <div class="form-group">
                <label for="ur_atlas_level_2" class="col-sm-3 control-label" align='left'>Atasan Langsung</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="ur_atlas_level_2" name="ur_atlas_level_2" readonly >
                </div>
              </div>
              <div class="form-group">
                <label for="nama_eselon3_text" class="col-sm-3 control-label" align='left'>Nama Jabatan</label>
                <div class="col-sm-8">
                  <textarea type="text" class="form-control" rows="3" id="nama_eselon3_text" name="nama_eselon3_text" required="required" ></textarea>
                </div>
              </div>
              <div class="form-group">
                    <label for="checkEselon2" class="col-sm-3" align='left'>Tingkat Eselon</label>
                    <div class="col-sm-2">
                        <label class="radio-inline">
                        <input class="flag_iku" type="radio" name="checkEselon2" id="checkEselon2" value="0"> Eselon I</label>
                    </div>
                    <div class="col-sm-2">
                        <label class="radio-inline">
                        <input class="flag_iku" type="radio" name="checkEselon2" id="checkEselon2" value="1"> Eselon II</label>
                    </div>
                    <div class="col-sm-2">
                        <label class="radio-inline">
                        <input class="flag_iku" type="radio" name="checkEselon2" id="checkEselon2" value="2"> Eselon III</label>
                    </div>
                    <div class="col-sm-2">
                        <label class="radio-inline">
                        <input class="flag_iku" type="radio" name="checkEselon2" id="checkEselon2" value="3"> Eselon IV</label>
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
                        <button type="button" class="btn btn-success btnSimpanLevel2 btn-labeled" data-dismiss="modal" >
                            <span class="btn-label"><i class="glyphicon glyphicon-save"></i></span>Simpan</button>
                        <div class="or"></div>
                        <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
      </div>
    </div>
  </div>

  <div id="HapusLevel2Modal" class="modal fade" role="dialog" data-backdrop="static">
        <div class="modal-dialog modal-xs">
          <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
              <input type="hidden" id="id_sotk_es3_hapus" name="id_sotk_es3_hapus">
              <div class="alert alert-danger deleteContent">
                  <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border"  style="color:red;" aria-hidden="true"></i>
                    <br>
                    Yakin akan menghapus Jabatan Eselon : <strong><span id="nama_eselon3_hapus"></span></strong> ?
                    <br>
                    <br>
              </div>
            </div>
              <div class="modal-footer">
                <div class="ui-group-buttons">
                  <button type="button" class="btn btn-sm btn-danger btn-labeled btnDelLevel2" data-dismiss="modal" ><span class="btn-label"><i id="footer_action_button" class="glyphicon glyphicon-trash"></i></span> Hapus</button>
                  <div class="or"></div>
                  <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true"><span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span> Tutup</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>