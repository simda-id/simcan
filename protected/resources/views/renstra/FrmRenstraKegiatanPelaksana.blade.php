
<div id="ModalKegiatanPelaksana" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg"  >
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form name="frmModalPelaksana" class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id_pelaksana" id="id_pelaksana">
            <input type="hidden" name="id_kegiatan_pelaksana" id="id_kegiatan_pelaksana">
            <input type="hidden" name="id_subunit_pelaksana" id="id_subunit_pelaksana">
            {{-- <div class="row">
            <div class="col-sm-2" style="text-align: center;">
              <i class="fa fa-map-marker fa-fw" style="font-size: 100px;color: #357EBD;"></i>
            </div>
            <div class="col-sm-10"> --}}
            <div class="form-group">
                <label for="no_urut_edit" class="col-sm-3 control-label" align='left'>Nomor Urut :</label>
                <div class="col-sm-2">
                  <div class="input-group">
                      <input type="text" class="form-control number no_urut" id="no_urut_pelaksana_kegiatan" name="no_urut_pelaksana_kegiatan" required="required" >                  
                  </div>
                </div>
                <label for="id_perubahan_edit" class="col-sm-3 control-label" align='left'>ID Perubahan :</label>
                <div class="col-sm-2">
                  <div class="input-group">
                      <input type="text" class="form-control number id_revisi" id="id_perubahan_pelaksana_kegiatan" name="id_perubahan_pelaksana_kegiatan" required="required" >                  
                  </div>
                </div>
            </div> 
            <div class="form-group div_entry_sub" = id="div_entry_sub">
                <label for="cbpelaksana" class="col-sm-3 control-label" align='left'>Sub Unit Pelaksana :</label>
                <div class="col-sm-9">
                  <select class="form-control cbpelaksana" name="cbpelaksana" id="cbpelaksana"></select>
                </div>
            </div>
            <div class="form-group div_display" id="div_display">
                <label for="pelaksanaDisplay" class="col-sm-3 control-label" align='left'>Sub Unit Pelaksana :</label>
                <div class="col-sm-9">
                  <input class="form-control pelaksanaDisplay" name="pelaksanaDisplay" id="pelaksanaDisplay">
                </div>
            </div>
            {{-- </div> --}}
            </div> 
        </form>
      </div>
        <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left">                        
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-sm btn-success btnPelaksana btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i id="nmbtnPelaksana" class="glyphicon glyphicon-save"></i></span>Simpan</button>
                        <div class="or"></div>
                        <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
      </div>
    </div>
  </div>
</div>

<div id="HapusKegiatanPelaksanaModal" class="modal fade" role="dialog" data-backdrop="static">
          <div class="modal-dialog modal-xs">
            <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title"></h4>
              </div>
              <div class="modal-body">
                <input type="hidden" id="id_kegiatan_pelaksana_hapus" name="id_kegiatan_pelaksana_hapus">
                <div class="alert alert-danger deleteContent">
                    <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border"  style="color:red;" aria-hidden="true"></i>
                      <br>
                      Yakin akan menghapus Pelaksana Kegiatan Renstra : <strong><span id="nm_unit_pelaksana_hapus"></span></strong> ?
                      <br>
                      <br>
                </div>
              </div>
                <div class="modal-footer">
                  <div class="ui-group-buttons">
                    <button type="button" class="btn btn-sm btn-danger btn-labeled btnDelKegiatanPelaksana" data-dismiss="modal" ><span class="btn-label"><i id="footer_action_button" class="glyphicon glyphicon-trash"></i></span> Hapus</button>
                    <div class="or"></div>
                    <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true"><span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span> Tutup</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>