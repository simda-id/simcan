  <div id="ModalProgram" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg"  >
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" role="form" autocomplete='off' action="" method="post" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" class="form-control" id="id_perkin_program" name="id_perkin_program" readonly >
                <input type="hidden" class="form-control" id="id_perkin_sasaran_program" name="id_perkin_sasaran_program" readonly>
                <input type="hidden" class="form-control" id="id_program_renstra" name="id_program_renstra" readonly>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="title">Uraian Program :</label>
                    <div class="col-sm-8">
                      <textarea type="name" class="form-control" id="uraian_program" rows="3" disabled></textarea>
                    </div>
                    <input type="hidden" id="id_program_ref" name="id_program_ref">
                </div>             
                <div class="form-group">
                    <label for="cb_eselon_3" class="col-sm-3 control-label" align='left'>Pelaksana Program </label>
                    <div class="col-sm-8">
                        <select class="form-control cb_eselon_2" name="cb_eselon_3" id="cb_eselon_3"></select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="cb_eselon_3" class="col-sm-3 control-label" align='left'>Pagu Tahunan Program </label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control number" id="pagu_tahun" name="pagu_tahun" style="text-align: right;" readonly>
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