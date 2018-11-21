
  <div id="loadBelanjaASB" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="" onsubmit="return false;">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" class="form-control number" id="status_musren_belanja" name="status_musren_belanja" style="text-align: right;" disabled>
              <div class="form-group">
                    <label class="control-label col-sm-3" for="title">Aktivitas ASB :</label>
                    <input type="hidden" class="form-control" id="id_aktivitas_asb_load" name="id_aktivitas_asb_load" disabled="">
                    <div class="col-sm-8">
                      <textarea type="name" class="form-control" id="uraian_aktivitas_asb_load" name="uraian_aktivitas_asb_load" rows="3" disabled=""></textarea>
                    </div>
                </div>
              <div class="form-group hidden"> 
                  <label for="sumber_aktivitas" class="col-sm-3 control-label" align='left'>Jenis Biaya :</label>
                  <div class="col-sm-6">
                    <div>
                      <label>
                        <input type="radio" class="jns_biaya_asb" name="jns_biaya_asb" id="jns_biaya_asb" value="0"> Biaya Tetap (Fix) 
                      </label>
                    </div>
                    <div>
                      <label>
                        <input type="radio" class="jns_biaya_asb" name="jns_biaya_asb" id="jns_biaya_asb" value="1"> Tanpa Biaya Tetap (Non Fix)
                      </label>
                    </div>
                    <div>
                      <label>
                        <input type="radio" class="jns_biaya_asb" name="jns_biaya_asb" id="jns_biaya_asb" value="2"> Semua Biaya
                      </label>
                    </div>
                    <div>
                      <label>
                        <input type="radio" class="jns_biaya_asb" name="jns_biaya_asb" id="jns_biaya_asb" value="3"> Semua Biaya (Biaya Tetap Terdistibusi)
                      </label>
                    </div>
                  </div>
                </div>
              <div class="form-group hidden">
                    <label class="control-label col-sm-3" for="">Zona Wilayah SSH :</label>
                    <div class="col-sm-8">
                        <select type="text" class="form-control zona_ssh_load" id="zona_ssh_load" name="zona_ssh_load"></select>
                    </div>
                </div> 
              <div class="form-group">
                <label class="control-label col-sm-3" for="id_perkada">Volume Pemicu Biaya 1 :</label>
                <div class="col-sm-4">
                  <div class="input-group">
                      <input type="text" class="form-control number" id="v1_load" name="v1_load" style="text-align: right;" disabled>
                      <span class="input-group-addon" id="satuan1_load_asb"></span>
                  </div>
                </div>
                </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="id_perkada">Volume Pemicu Biaya 2 :</label>
                <div class="col-sm-4">
                  <div class="input-group">
                      <input type="text" class="form-control number" id="v2_load" name="v2_load" style="text-align: right;" disabled>
                      <span class="input-group-addon" id="satuan2_load_asb"></span>
                  </div>
                </div>
              </div>
        </form>
      </div>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusBelanja">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-success btnLoadAsb btn-labeled" data-dismiss="modal" >
                            <span class="btn-label"><i id="fooLoadAsb" class="fa fa-calculator fa-fw fa-lg"></i></span>Proses Load Belanja</button>
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



