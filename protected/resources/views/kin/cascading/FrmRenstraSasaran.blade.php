
<div id="ModalSasaran" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="post" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" class="form-control" id="id_sasaran_edit" name="id_sasaran_edit">
              <input type="hidden" class="form-control" id="thn_id_sasaran_edit" name="thn_id_edit">
              <input type="hidden" class="form-control" id="id_tujuan_sasaran_edit" name="id_tujuan_sasaran_edit">
              <div class="form-group">
                <label class="control-label col-sm-3" for="id_sasaran_edit">ID Tujuan renstra :</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="id_tujuan_sasaran_display" name="id_tujuan_sasaran_display" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="no_urut_edit" class="col-sm-3 control-label" align='left'>Nomor Urut :</label>
                <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control" id="no_urut_sasaran_edit" name="no_urut_sasaran_edit" required="required" >                  
                </div>
                </div>
              </div>
              <div class="form-group">
                <label for="id_perubahan_edit" class="col-sm-3 control-label" align='left'>ID Perubahan :</label>
                <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control" id="id_perubahan_sasaran_edit" name="id_perubahan_sasaran_edit" required="required" >                  
                </div>
                </div>
              </div>
              <div class="form-group">
                  <label class="control-label col-sm-3" for="title">Uraian Indikator Sasaran RPJMD :</label>
                  <div class="col-sm-8">
                    <textarea type="name" class="form-control" id="ur_sasaran_rpjmd_edit" rows="3" disabled></textarea>
                  </div>
                  <input type="hidden" id="id_sasaran_rpjmd_edit" name="id_sasaran_rpjmd_edit">
                  <span class="btn btn-primary btnCariSasaran" id="btnCariSasaran" name="btnCariSasaran"><i class="fa fa-search fa-fw fa-lg"></i></span>
              </div>
              <div class="form-group">
                <label for="ur_sasaran_edit" class="col-sm-3 control-label" align='left'>Uraian sasaran renstra :</label>
                <div class="col-sm-8">
                  <textarea type="text" class="form-control" rows="5" id="ur_sasaran_edit" name="ur_sasaran_edit" required="required" ></textarea>
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
                        <button type="button" class="btn btn-success btnSimpanSasaran btn-labeled" data-dismiss="modal">
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