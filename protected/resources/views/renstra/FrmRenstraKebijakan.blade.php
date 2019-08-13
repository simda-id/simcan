
<div id="ModalKebijakan" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="post" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" class="form-control" id="id_kebijakan_renstra_edit" name="id_kebijakan_renstra_edit" readonly >
              <input type="hidden" class="form-control" id="thn_id_kebijakan_edit" name="thn_id_edit" readonly >
              <input type="hidden" class="form-control" id="id_sasaran_renstra_kebijakan_edit" name="id_sasaran_renstra_kebijakan_edit" readonly >
              <div class="form-group hidden">
                <label class="control-label col-sm-3" for="id_kebijakan_renstra_edit">ID Sasaran renstra :</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control number no_urut" id="id_sasaran_kebijakan_edit" name="id_sasaran_kebijakan_edit" readonly >
                </div>
              </div>
              <div class="form-group">
                <label for="no_urut_edit" class="col-sm-3 control-label" align='left'>Nomor Urut :</label>
                <div class="col-sm-2">
                  <input type="text" class="form-control number id_revisi" id="no_urut_kebijakan_edit" name="no_urut_kebijakan_edit" required="required" > 
                </div>
                <label for="id_perubahan_edit" class="col-sm-3 control-label" align='left'>ID Perubahan :</label>
                <div class="col-sm-2">
                  <input type="text" class="form-control" id="id_perubahan_kebijakan_edit" name="id_perubahan_kebijakan_edit" required="required" > 
                </div>
              </div>
              <div class="form-group">
                <label for="ur_kebijakan_renstra_edit" class="col-sm-3 control-label" align='left'>Uraian Kebijakan Renstra :</label>
                <div class="col-sm-9">
                  <textarea type="text" class="form-control" rows="5" id="ur_kebijakan_renstra_edit" name="ur_kebijakan_renstra_edit" required="required" ></textarea>
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
                        <button type="button" class="btn btn-success btnSimpanKebijakan btn-labeled" data-dismiss="modal">
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

<div id="HapusKebijakan" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
            <h4>Hapus Data Kebijakan Renstra OPD</h4>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id_kebijakan_renstra_hapus" name="id_kebijakan_renstra_hapus">
            <div class="alert alert-danger deleteContent">
              <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border"  style="color:red;" aria-hidden="true"></i>
                Yakin akan menghapus Kebijakan Renstra : <strong><span id="ur_kebijakan_renstra_hapus"></span></strong> ?
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
                        <button type="button" class="btn btn-sm btn-danger btnDelKebijakanRenstra btn-labeled" data-dismiss="modal">
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