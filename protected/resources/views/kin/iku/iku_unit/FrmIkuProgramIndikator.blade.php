  <div id="ModalIndikatorProgram" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg"  >
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" role="form" autocomplete='off' action="" method="post" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" class="form-control" id="id_iku_opd_program_rinci" name="id_iku_opd_program_rinci" readonly >
                <input type="hidden" class="form-control" id="id_iku_sasaran_rinci" name="id_iku_sasaran_rinci" readonly>
                <input type="hidden" class="form-control" id="id_indikator_program_renstra_rinci" name="id_indikator_program_renstra_rinci" readonly>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="title">Uraian Indikator Program Renstra  :</label>
                    <div class="col-sm-8">
                      <input type="hidden" id="id_indikator_program_rinci" name="id_indikator_program_rinci">
                      <textarea type="name" class="form-control" id="nm_indikator_program_rinci" rows="3" readonly ></textarea>
                    </div>
                </div>             
                <div class="form-group">
                    <label for="satuan_program_rinci" class="col-sm-3 control-label" align='left'>Target Indikator :</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="target_program_rinci" name="target_program_rinci" readonly>                  
                    </div>
                    <div class="col-sm-3"> 
                        <input type="text" class="form-control" id="satuan_program_rinci" name="satuan_program_rinci" readonly>                  
                    </div>                  
                </div>                             
                <div class="form-group">
                  <label for="type_indikator_program_rinci" class="col-sm-3 control-label" align='left'>Metode Pengukuran :</label>
                  <div class="col-sm-3">
                      <input type="text" class="form-control" id="type_indikator_program_rinci" name="type_indikator_program_rinci" readonly>                  
                    </div>                  
                  </div>
                <div class="form-group">
                  <label for="type_indikator_program_rinci" class="col-sm-3 control-label" align='left'></label>
                  <div class="col-sm-8">
                      <textarea type="name" class="form-control" id="metode_ukur_program_rinci" rows="3" readonly ></textarea>                  
                  </div>                  
                </div>
                <div class="form-group">
                  <label for="sumber_data_ukur_program_rinci" class="col-sm-3 control-label" align='left'>Sumber Data Pengukuran :</label>
                  <div class="col-sm-8">
                      <textarea type="name" class="form-control" id="sumber_data_ukur_program_rinci" rows="3" readonly ></textarea>                 
                  </div>                  
                </div>
                <div class="form-group">
                  <label for="jenis_indikator_program_rinci" class="col-sm-3 control-label" align='left'>Jenis Indikator :</label>
                  <div class="col-sm-3">
                      <input type="text" class="form-control" id="jenis_indikator_program_rinci" name="jenis_indikator_program_rinci" readonly>                  
                  </div>                  
                  <label for="sifat_indikator_program_rinci" class="col-sm-2 control-label" align='left'>Sifat Indikator :</label>
                  <div class="col-sm-3">
                      <input type="text" class="form-control" id="sifat_indikator_program_rinci" name="sifat_indikator_program_rinci" readonly>                  
                  </div>                  
                </div>                
                <div class="form-group">
                  <label for="tipe_indikator_program_rinci" class="col-sm-3 control-label" align='left'>Tipe Indikator :</label>
                  <div class="col-sm-3">
                      <input type="text" class="form-control" id="tipe_indikator_program_rinci" name="tipe_indikator_program_rinci" readonly>                  
                  </div>
                  <label for="flag_iku_rinci_program" class="col-sm-2 control-label" align='left'>Flag IKU :</label>
                  <div class="col-sm-3">
                      <div id="radioBtn_prog" class="btn-group">
                          <a class="btn btn-primary btn-sm active" id="flag_iku_rinci_program_1" data-toggle="flag_iku_rinci_program" data-title="1">IKU</a>
                          <a class="btn btn-primary btn-sm notActive" id="flag_iku_rinci_program_0" data-toggle="flag_iku_rinci_program" data-title="0">Non IKU</a>
                        </div>
                      <input type="hidden" class="form-control" id="flag_iku_rinci_program" name="flag_iku_rinci_program">                  
                  </div>                  
                </div>                
                <div class="form-group">
                  <label for="unit_esl3" class="col-sm-3 control-label" align='left'>Eselon Penanggungjawab :</label>
                  <div class="col-sm-8">
                      <select class="form-control unit_esl3" id="unit_esl3" name="unit_esl3" ></select>                  
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
                          <button type="button" class="btn btn-success btnSimpanProgramIndikator btn-labeled" data-dismiss="modal">
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
