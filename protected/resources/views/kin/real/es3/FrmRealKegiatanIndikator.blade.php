  <div id="ModalIndikatorRealEs4" class="modal fade" role="dialog">
      <div class="modal-dialog modal-xl"  >
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" role="form" autocomplete='off' action="" method="post" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" class="form-control" id="id_indikator_realEs4_renstra" name="id_indikator_realEs4_renstra" readonly >
                <input type="hidden" class="form-control" id="id_perkin_realEs4_indikator" name="id_perkin_realEs4_indikator" readonly>
                <input type="hidden" class="form-control" id="id_perkin_realEs4" name="id_perkin_realEs4" readonly>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="title">Uraian Indikator Kegiatan Renstra  :</label>
                    <div class="col-sm-9">
                      <input type="hidden" id="kd_indikator_realEs4" name="kd_indikator_realEs4">
                      <textarea type="name" class="form-control" id="ur_indikator_realEs4" rows="2" readonly ></textarea>
                    </div>
                </div>             
                <div class="form-group">
                    <label for="satuan_realEs4_indikator" class="col-sm-3 control-label" align='left'>Reviu Realisasi Indikator :</label>
                    <div class="col-sm-2">
                            <div class="input-group">
                              <input type="text" class="form-control number" id="reviu_realEs4" name="reviu_realEs4" style="text-align: right;">                  
                            </div>
                        </div> 
                    <div class="col-sm-3">
                        <div class="input-group">
                          <input type="text" class="form-control" id="satuan_realEs4_indikator" name="satuan_realEs4_indikator" readonly>                  
                        </div>
                    </div>
                    <label for="flag_iku_rinci_kegiatan" class="col-sm-1 control-label" align='left'>Reviu :</label>
                    <div class="col-sm-3">
                        <div id="radioBtn_reviu" class="btn-group">
                            <a class="btn btn-primary btn-sm active" id="flag_reviu_realEs4_1" data-toggle="flag_reviu_realEs4" data-title="1">Reviu</a>
                            <a class="btn btn-primary btn-sm notActive" id="flag_reviu_realEs4_0" data-toggle="flag_reviu_realEs4" data-title="0">Belum Reviu</a>
                            </div>
                        <input type="hidden" class="form-control" id="flag_reviu_realEs4" name="flag_reviu_realEs4">                  
                    </div>
                                     
                </div> 
                <div class="form-group">
                <label class="control-label col-sm-12" style="text-align: left;">Rincian Target Indikator Kegiatan Renstra :</label>
                <br>
                <div class="col-sm-12">
                <table id="tblIndikatorRealEs4" class="table table-bordered"  cellspacing="0" width="100%">
                        <thead style="background: #428bca; color: #fff">
                            <tr>
                              <th width="20%" style="text-align: center; vertical-align:middle">Total</th>
                              <th width="20%" style="text-align: center; vertical-align:middle">Triwulan 1</th>
                              <th width="20%" style="text-align: center; vertical-align:middle">Triwulan 2</th>
                              <th width="20%" style="text-align: center; vertical-align:middle">Triwulan 3</th>
                              <th width="20%" style="text-align: center; vertical-align:middle">Triwulan 4</th>
                            </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td style="text-align: center; vertical-align:middle">
                              Rencana Target Indikator
                            </td>
                              <td width="20%" style="text-align: center; vertical-align:middle">
                                <input type="text" class="form-control number" id="target_t1_realEs4" name="target_t1_realEs4" style="text-align: right; " readonly>
                              </td>
                              <td width="20%" style="text-align: center; vertical-align:middle">
                                <input type="text" class="form-control number" id="target_t2_realEs4" name="target_t2_realEs4" style="text-align: right; "  readonly>
                              </td>
                              <td width="20%" style="text-align: center; vertical-align:middle">
                                <input type="text" class="form-control number" id="target_t3_realEs4" name="target_t3_realEs4" style="text-align: right; "  readonly>
                              </td>
                              <td width="20%" style="text-align: center; vertical-align:middle">
                                <input type="text" class="form-control number" id="target_t4_realEs4" name="target_t4_realEs4" style="text-align: right; " readonly >
                              </td>
                          </tr>
                          <tr style="background: #428bca; color: #fff">
                              <td style="text-align: center; vertical-align:middle">
                                  Realisasi Target Indikator
                              </td>
                            <td width="20%" style="text-align: center; vertical-align:middle">
                                <input type="text" class="form-control number" id="real_indikator_t1_realEs4" name="real_indikator_t1_realEs4" style="text-align: right; " readonly>
                              </td>
                              <td width="20%" style="text-align: center; vertical-align:middle">
                                <input type="text" class="form-control number" id="real_indikator_t2_realEs4" name="real_indikator_t2_realEs4" style="text-align: right; " readonly>
                              </td>
                              <td width="20%" style="text-align: center; vertical-align:middle">
                                <input type="text" class="form-control number" id="real_indikator_t3_realEs4" name="real_indikator_t3_realEs4" style="text-align: right; " readonly>
                              </td>
                              <td width="20%" style="text-align: center; vertical-align:middle">
                                <input type="text" class="form-control number" id="real_indikator_t4_realEs4" name="real_indikator_t4_realEs4" style="text-align: right; " readonly>
                              </td>
                          </tr>
                        </tbody>
                  </table>
                  </div>
                  </div>
                  <div class="form-group">
                      <label for="uraian_deviasi_realEs4" class="col-sm-3 control-label" align='left'>Penyebab Deviasi :</label>
                      <div class="col-sm-9">
                              <textarea type="name" class="form-control" id="uraian_deviasi_realEs4" rows="2" readonly></textarea>  
                      </div>                  
                  </div>
                  <div class="form-group">
                        <label for="reviu_deviasi_realEs4" class="col-sm-3 control-label" align='left'>Reviu Deviasi :</label>
                        <div class="col-sm-9">
                                <textarea type="name" class="form-control" id="reviu_deviasi_realEs4" rows="2"></textarea>  
                        </div>                  
                    </div>
                  <div class="form-group">
                      <label for="uraian_renaksi_realEs4" class="col-sm-3 control-label" align='left'>Rencana Aksi Deviasi :</label>
                      <div class="col-sm-9">
                              <textarea type="name" class="form-control" id="uraian_renaksi_realEs4" rows="2" readonly></textarea>
                      </div>                  
                  </div>
                  <div class="form-group">
                        <label for="reviu_renaksi_realEs4" class="col-sm-3 control-label" align='left'>Reviu Rencana Aksi :</label>
                        <div class="col-sm-9">
                                <textarea type="name" class="form-control" id="reviu_renaksi_realEs4" rows="2"></textarea>
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
                          <button type="button" class="btn btn-success btnSimpanRealEs4Indikator btn-labeled" data-dismiss="modal">
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
