<div id="ModalSasaranProgram" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="post" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" class="form-control" id="id_sasaran_program_edit" name="id_sasaran_program_edit" readonly >
              <input type="hidden" class="form-control" id="id_sasaran_renstra_program_edit" name="id_sasaran_renstra_program_edit" readonly>
              <div class="form-group">
                <label for="id_sasaran_renstra_edit" class="col-sm-3 control-label" align='left'>Kd Sasaran Renstra :</label>
                <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control" id="id_sasaran_program_edit" name="id_sasaran_program_edit" readonly>                  
                </div>
                </div>
              </div>
              <div class="form-group">
                  <label for="uraian_sasaran_strategis_prog" class="col-sm-3 control-label" align='left'>Uraian Sasaran Strategis :</label>
                  <div class="col-sm-8">
                    <textarea type="text" class="form-control" rows="3" id="uraian_sasaran_strategis_prog" name="uraian_sasaran_strategis_prog" required="required" readonly></textarea>
                  </div>
              </div>
              <div class="form-group">
                  <label for="ur_sasaran_program_renstra_edit" class="col-sm-3 control-label" align='left'>Uraian Sasaran Program :</label>
                  <div class="col-sm-8">
                    <textarea type="text" class="form-control" rows="3" id="ur_sasaran_program_renstra_edit" name="ur_sasaran_program_renstra_edit" required="required"></textarea>
                  </div>
              </div>
              <div class="form-group">
                  <label for="kd_program_edit" class="col-sm-3 control-label" align='left'>Uraian Program Renstra:</label>
                  <div class="col-sm-2">
                    <div class="input-group">
                      <input type="hidden" class="form-control" id="id_program_renstra_edit" name="id_program_renstra_edit" readonly>
                      <input type="text" class="form-control" id="kd_program_edit" name="kd_program_edit" readonly>                  
                    </div>
                  </div>
                  <div class="col-sm-8">
                      <textarea type="text" class="form-control" rows="3" id="ur_program_renstra_edit" name="ur_program_renstra_edit" required="required" readonly></textarea>
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
                          <button type="button" class="btn btn-success btnSimpanProgram btn-labeled" data-dismiss="modal">
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

    
