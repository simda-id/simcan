  <div id="ModalIndikatorProgram" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg"  >
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" role="form" autocomplete='off' action="" method="post" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" class="form-control" id="id_indikator_sasaran_renstra" name="id_indikator_sasaran_renstra" readonly >
                <input type="hidden" class="form-control" id="id_perkin_sasaran_indikator" name="id_perkin_sasaran_indikator" readonly>
                <input type="hidden" class="form-control" id="id_perkin_indikator" name="id_perkin_indikator" readonly>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="title">Uraian Indikator Sasaran Renstra  :</label>
                    <div class="col-sm-8">
                      <input type="hidden" id="kd_indikator_perkin" name="kd_indikator_perkin">
                      <textarea type="name" class="form-control" id="ur_indikator_sasaran" rows="3" readonly ></textarea>
                    </div>
                </div>             
                <div class="form-group">
                    <label for="satuan_sasaran_indikator" class="col-sm-3 control-label" align='left'>Satuan Indikator :</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                          <input type="text" class="form-control" id="satuan_sasaran_indikator" name="satuan_sasaran_indikator" readonly>                  
                        </div>
                    </div>                  
                </div>
                <label class="col-sm-12" style="text-align: left;">Rincian Target Indikator Kegiatan Renstra :</label>
                <br>
                <table id="tblIndikatorSasaran" class="table table-bordered"  cellspacing="0" width="100%">
                        <thead style="background: #428bca; color: #fff">
                            <tr>
                              <th width="20%" style="text-align: center; vertical-align:middle">Triwulan 1</th>
                              <th width="20%" style="text-align: center; vertical-align:middle">Triwulan 2</th>
                              <th width="20%" style="text-align: center; vertical-align:middle">Triwulan 3</th>
                              <th width="20%" style="text-align: center; vertical-align:middle">Triwulan 4</th>
                            </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <td width="20%" style="text-align: center; vertical-align:middle">
                                <input type="text" class="form-control number" id="target_t1" name="target_t1" style="text-align: right; ">
                              </td>
                              <td width="20%" style="text-align: center; vertical-align:middle">
                                <input type="text" class="form-control number" id="target_t2" name="target_t2" style="text-align: right; " >
                              </td>
                              <td width="20%" style="text-align: center; vertical-align:middle">
                                <input type="text" class="form-control number" id="target_t3" name="target_t3" style="text-align: right; " >
                              </td>
                              <td width="20%" style="text-align: center; vertical-align:middle">
                                <input type="text" class="form-control number" id="target_t4" name="target_t4" style="text-align: right; " >
                              </td>
                          </tr>
                          <tr style="background: #428bca; color: #fff">
                              <td colspan="2" style="text-align: center; vertical-align:middle; font-weight: bold;">Target Tahunan :
                              </td>
                              <td style="text-align: center; vertical-align:middle">
                                 <input type="text" class="form-control number" id="target_tahun" name="target_tahun" style="text-align: right; " readonly >
                              </td>
                          </tr>
                        </tbody>
                  </table>
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
