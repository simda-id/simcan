<div id="ModalSasaranProgram" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="post" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" class="form-control" id="id_hasil_program_edit" name="id_hasil_program_edit" readonly >
              <input type="hidden" class="form-control" id="id_unit_program_edit" name="id_unit_program_edit" readonly >
              <input type="hidden" class="form-control" id="id_sasaran_renstra_program_edit" name="id_sasaran_renstra_program_edit" readonly>
              <div class="form-group">
                  <label for="ur_sasaran_program_renstra_edit" class="col-sm-3 control-label" align='left'>Uraian Sasaran Program :</label>
                  <div class="col-sm-9">
                    <textarea type="text" class="form-control" rows="3" id="ur_sasaran_program_renstra_edit" name="ur_sasaran_program_renstra_edit" required="required"></textarea>
                  </div>
              </div>
              <div class="form-group">
                  <label for="kd_program_edit" class="col-sm-3 control-label" align='left'>Uraian Program Renstra:</label>
                  <div class="col-sm-2">
                      <input type="text" class="form-control" id="kd_program_edit" name="kd_program_edit" style="text-align: center;" readonly> 
                  </div>     
                  <input type="hidden" class="form-control" id="id_program_renstra_edit" name="id_program_renstra_edit" readonly>
                  <span class="btn btn-primary btnCariProgramRenstra" id="btnCariProgramRenstra" name="btnCariProgramRenstra"><i class="fa fa-search fa-fw fa-lg"></i></span>
                </div>
                <div class="form-group">
                  <label for="" class="col-sm-3 control-label" align='left'></label>
                  <div class="col-sm-9">
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

<div id="HapusProgram" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
            <h4>Hapus Data Sasaran Program Renstra OPD</h4>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id_hasil_program_hapus" name="id_hasil_program_hapus">
            <div class="alert alert-danger deleteContent">
              <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border"  style="color:red;" aria-hidden="true"></i>
                Yakin akan menghapus Sasaran Program Renstra : <strong><span id="ur_hasil_program_hapus"></span></strong> ?
                <br>
                <br>
                <strong>Catatan : Penghapusan data ini mempengaruhi data selanjutnya akan ikut terhapus.....!!!!</strong> 
          </div>
        </div>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-sm btn-danger btnDelProgramRenstra btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i class="fa fa-trash fa-fw fa-lg"></i></span>Hapus</button>
                        <div class="or"></div>
                        <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="fa fa-sign-out fa-fw fa-lg"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
        </div>
      </div>
    </div>