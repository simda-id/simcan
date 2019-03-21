<div id="ModalStrategi" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="post" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" class="form-control" id="id_strategi_renstra_edit" name="id_strategi_renstra_edit" readonly >
              <input type="hidden" class="form-control" id="thn_id_strategi_edit" name="thn_id_edit" readonly >
              <input type="hidden" class="form-control" id="id_sasaran_renstra_strategi_edit" name="id_sasaran_renstra_edit" readonly >
              <div class="form-group">
                <label class="control-label col-sm-3" for="id_strategi_renstra_edit">ID strategi renstra :</label>
                <div class="col-sm-6">
                  <div class="input-group">
                    <input type="text" class="form-control" id="id_sasaran_strategi_edit" name="id_sasaran_strategi_edit" readonly >
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="no_urut_edit" class="col-sm-3 control-label" align='left'>Nomor Urut :</label>
                <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control" id="no_urut_strategi_edit" name="no_urut_strategi_edit" required="required" >                  
                </div>
                </div>
              </div>
              <div class="form-group">
                <label for="id_perubahan_edit" class="col-sm-3 control-label" align='left'>ID Perubahan :</label>
                <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control" id="id_perubahan_strategi_edit" name="id_perubahan_edit" required="required" >                  
                </div>
                </div>
              </div>
              <div class="form-group">
                <label for="ur_strategi_renstra_edit" class="col-sm-3 control-label" align='left'>Uraian strategi renstra :</label>
                <div class="col-sm-8">
                  <textarea type="text" class="form-control" rows="5" id="ur_strategi_renstra_edit" name="ur_strategi_renstra_edit" required="required" ></textarea>
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
                        {{-- <button type="button" class="btn btn-success actionBtn_strategi btn-labeled" data-dismiss="modal">
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