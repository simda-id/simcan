

  <div id="ModalIndikator" class="modal fade" role="dialog" data-backdrop="static">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" id="id_indikator_program_renja" name="id_indikator_program_renja">
              <input type="hidden" id="id_renja_program_1" name="id_renja_program_1">
              <div class="form-group">
                <label class="control-label col-sm-3" for="id">No Urut :</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control number" id="no_urut_indikator" disabled>
                </div>
                <div class="col-sm-3 chkIndikator hidden">
                    <label class="checkbox-inline">
                    <input class="checkIndikator" type="checkbox" name="checkIndikator" id="checkIndikator" value="1"> Telah Direviu</label>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="title">Uraian Indikator Program Renja:</label>
                <div class="col-sm-8">
                  <textarea type="name" class="form-control" id="ur_indikator_renja" rows="3" disabled></textarea>
                </div>
                <input type="hidden" id="kd_indikator_renja" name="kd_indikator_renja">
                <span class="btn btn-primary btnCariIndi" id="btnCariIndi" name="btnCariIndi"><i class="fa fa-search fa-fw fa-lg"></i></span>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="title">Uraian Tolok Ukur Program Renja:</label>
                <div class="col-sm-8">
                  <textarea type="name" class="form-control" id="ur_tolokukur_renja" rows="3" disabled></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="target_indikator_renstra" class="col-sm-3 control-label" align='left'>Target Capaian Menurut Renstra :</label>
                <div class="col-sm-2">
                  <input type="text" class="form-control number" id="target_indikator_renstra" name="target_indikator_renstra" disabled >
                </div>
                <label for="target_indikator_renja" class="col-sm-3 control-label" align='left'>Target Capaian Menurut Renja :</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control number" id="target_indikator_renja" name="target_indikator_renja" required="required" >
                </div>
              </div>
              <div class="form-group">
              <label class="control-label col-sm-3" for="id_satuan_output">Satuan Indikator :</label>
                <div class="col-sm-8">
                  <select type="text" class="form-control id_satuan_output" id="id_satuan_output" name="id_satuan_output"></select>
                </div>
              </div>
            </form>
          </div>
              <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusIndikator">
                        <button type="button" class="btn btn-danger btnHapusIndikator btn-labeled">
                            <span class="btn-label"><i class="fa fa-trash fa-fw fa-lg"></i></span>Hapus</button>
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-success btnIndikator btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i class="fa fa-floppy-o fa-fw fa-lg"></i></span>Simpan</button>
                        <div class="or"></div>
                        <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="fa fa-sign-out fa-fw fa-lg"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
          </div>
        </div>
      </div>