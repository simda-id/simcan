
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
              <div class="form-group divTujuanRenstra">
                  <label class="control-label col-sm-3" for="title">Tujuan Renstra :</label>
                  <div class="col-sm-8">
                    <textarea type="name" class="form-control" id="id_tujuan_sasaran_display" name="id_tujuan_sasaran_display" rows="3" disabled></textarea>
                  </div>
                  <input type="hidden" class="form-control" id="id_tujuan_sasaran_edit" name="id_tujuan_sasaran_edit">
                  <span class="btn btn-primary btnCariTujuan" id="btnCariTujuan" name="btnCariTujuan"><i class="fa fa-search fa-fw fa-lg"></i></span>
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
                      <button class="btn btn-sm btn-danger btn-labeled btnHapusSasaran">
                        <span class="btn-label"><i class="fa fa-trash fa-fw fa-lg"></i></span>Hapus</button>
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-success btnSimpanSasaran btn-labeled" data-dismiss="modal">
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

<div id="HapusSasaran" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
            <h4>Hapus Data Sasaran Renstra OPD</h4>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id_sasaran_renstra_hapus" name="id_sasaran_renstra_hapus">
            <div class="alert alert-danger deleteContent">
              <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border"  style="color:red;" aria-hidden="true"></i>
                Yakin akan menghapus Sasaran Renstra : <strong><span id="ur_sasaran_renstra_hapus"></span></strong> ?
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
                        <button type="button" class="btn btn-sm btn-danger btnDelSasaranRenstra btn-labeled" data-dismiss="modal">
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