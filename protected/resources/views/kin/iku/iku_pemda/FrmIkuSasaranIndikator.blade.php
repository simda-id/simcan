  <div id="ModalIndikatorSasaran" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog modal-lg"  >
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" role="form" autocomplete='off' action="" method="post" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" class="form-control" id="id_iku_pemda_rinci" name="id_iku_pemda_rinci" readonly >
                <input type="hidden" class="form-control" id="id_dokumen_rinci" name="id_dokumen_rinci" readonly>
                <input type="hidden" class="form-control" id="id_indikator_sasaran_rpjmd_rinci" name="id_indikator_sasaran_rpjmd_rinci" readonly>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="title">Uraian Indikator Sasaran RPJMD  :</label>
                    <div class="col-sm-8">
                      <input type="hidden" id="id_indikator_rinci" name="id_indikator_rinci">
                      <textarea type="name" class="form-control" id="nm_indikator_rinci" rows="3" readonly ></textarea>
                    </div>
                </div>             
                <div class="form-group">
                    <label for="satuan_sasaran_rinci" class="col-sm-3 control-label" align='left'>Target Indikator :</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="target_sasaran_rinci" name="target_sasaran_rinci" readonly>                  
                    </div>
                    <div class="col-sm-3"> 
                        <input type="text" class="form-control" id="satuan_sasaran_rinci" name="satuan_sasaran_rinci" readonly>                  
                    </div>                  
                </div>                             
                <div class="form-group">
                  <label for="type_indikator_rinci" class="col-sm-3 control-label" align='left'>Metode Pengukuran :</label>
                  <div class="col-sm-3">
                      <input type="text" class="form-control" id="type_indikator_rinci" name="type_indikator_rinci" readonly>                  
                    </div>                  
                  </div>
                <div class="form-group">
                  <label for="type_indikator_rinci" class="col-sm-3 control-label" align='left'></label>
                  <div class="col-sm-8">
                      <textarea type="name" class="form-control" id="metode_ukur_rinci" rows="3" readonly ></textarea>                  
                  </div>                  
                </div>
                <div class="form-group">
                  <label for="sumber_data_ukur_rinci" class="col-sm-3 control-label" align='left'>Sumber Data Pengukuran :</label>
                  <div class="col-sm-8">
                      <textarea type="name" class="form-control" id="sumber_data_ukur_rinci" rows="3" readonly ></textarea>                 
                  </div>                  
                </div>
                <div class="form-group">
                  <label for="jenis_indikator_rinci" class="col-sm-3 control-label" align='left'>Jenis Indikator :</label>
                  <div class="col-sm-3">
                      <input type="text" class="form-control" id="jenis_indikator_rinci" name="jenis_indikator_rinci" readonly>                  
                  </div>                  
                  <label for="sifat_indikator_rinci" class="col-sm-2 control-label" align='left'>Sifat Indikator :</label>
                  <div class="col-sm-3">
                      <input type="text" class="form-control" id="sifat_indikator_rinci" name="sifat_indikator_rinci" readonly>                  
                  </div>                  
                </div>                
                <div class="form-group">
                  <label for="tipe_indikator_rinci" class="col-sm-3 control-label" align='left'>Tipe Indikator :</label>
                  <div class="col-sm-3">
                      <input type="text" class="form-control" id="tipe_indikator_rinci" name="tipe_indikator_rinci" readonly>                  
                  </div>
                  <label for="flag_iku_rinci" class="col-sm-2 control-label" align='left'>Flag IKU :</label>
                  <div class="col-sm-3">
                      <div id="radioBtn" class="btn-group">
                          <a class="btn btn-primary btn-sm active" id="flag_iku_rinci_1" data-toggle="flag_iku_rinci" data-title="1">IKU</a>
                          <a class="btn btn-primary btn-sm notActive" id="flag_iku_rinci_0" data-toggle="flag_iku_rinci" data-title="0">Non IKU</a>
                        </div>
                      <input type="hidden" class="form-control" id="flag_iku_rinci" name="flag_iku_rinci">                  
                  </div>                  
                </div>                
                <div class="form-group">
                  <label for="unit_penanggungjawab" class="col-sm-3 control-label" align='left'>Unit Penanggungjawab :</label>
                  <div class="col-sm-8">
                      <select class="form-control unit_penanggungjawab" id="unit_penanggungjawab" name="unit_penanggungjawab" ></select>                  
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
                          <button type="button" class="btn btn-success btnSimpanSasaranIndikator btn-labeled" data-dismiss="modal">
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
