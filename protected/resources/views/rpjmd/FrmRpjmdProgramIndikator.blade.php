  <div id="ModalIndikatorProgram" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg"  >
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" role="form" autocomplete='off' action="" method="post" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" class="form-control" id="id_indikator_program_rpjmd_edit" name="id_indikator_program_rpjmd_edit" readonly >
                <input type="hidden" class="form-control" id="thn_id_indikator_program_edit" name="thn_id_indikator_program_edit" readonly>
                <input type="hidden" class="form-control" id="id_program_rpjmd_indikator_edit" name="id_program_rpjmd_indikator_edit" readonly>
                <div class="form-group">
                  <label for="no_urut_edit" class="col-sm-3 control-label" align='left'>Nomor Urut :</label>
                  <div class="col-sm-2">
                    <div class="input-group">
                        <input type="text" class="form-control number" id="no_urut_indikator_program_edit" name="no_urut_indikator_program_edit" required="required" >                  
                    </div>
                  </div>
                  <label for="id_perubahan_edit" class="col-sm-3 control-label" align='left'>ID Perubahan :</label>
                  <div class="col-sm-2">
                    <div class="input-group">
                        <input type="text" class="form-control number" id="id_perubahan_indikator_program_edit" name="id_perubahan_indikator_program_edit" required="required" >                  
                    </div>
                  </div>
                </div> 
                <div class="form-group">
                    <label class="control-label col-sm-3" for="title">Uraian Indikator Program RPJMD :</label>
                    <div class="col-sm-8">
                      <textarea type="name" class="form-control" id="ur_indikator_program_rpjmd" rows="3" disabled></textarea>
                    </div>
                    <input type="hidden" id="kd_indikator_program_rpjmd" name="kd_indikator_program_rpjmd">
                    <span class="btn btn-primary btnCariIndi" id="btnCariIndi" name="btnCariIndi"><i class="fa fa-search fa-fw fa-lg"></i></span>
                </div>             
                <div class="form-group">
                    <label for="satuan_program_indikator_edit" class="col-sm-3 control-label" align='left'>Satuan Indikator :</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                          <input type="text" class="form-control" id="satuan_program_indikator_edit" name="satuan_program_indikator_edit" readonly>                  
                        </div>
                    </div>
                  
                </div>
                <label class="col-sm-12" style="text-align: left;">Rincian Target Indikator Program RPJMD :</label>
                <br>
                <table id="tblIndikatorSasaranEdit" class="table table-bordered"  cellspacing="0" width="100%">
                        <thead style="background: #428bca; color: #fff">
                            <tr>
                              <th width="20%" style="text-align: center; vertical-align:middle">Target Tahun 1</th>
                              <th width="20%" style="text-align: center; vertical-align:middle">Target Tahun 2</th>
                              <th width="20%" style="text-align: center; vertical-align:middle">Target Tahun 3</th>
                              <th width="20%" style="text-align: center; vertical-align:middle">Target Tahun 4</th>
                              <th width="20%" style="text-align: center; vertical-align:middle">Target Tahun 5</th>
                            </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <td width="20%" style="text-align: center; vertical-align:middle">
                                <input type="text" class="form-control number" id="indiprogram1_edit" name="indiprogram1_edit" style="text-align: right; ">
                              </td>
                              <td width="20%" style="text-align: center; vertical-align:middle">
                                <input type="text" class="form-control number" id="indiprogram2_edit" name="indiprogram2_edit" style="text-align: right; " >
                              </td>
                              <td width="20%" style="text-align: center; vertical-align:middle">
                                <input type="text" class="form-control number" id="indiprogram3_edit" name="indiprogram3_edit" style="text-align: right; " >
                              </td>
                              <td width="20%" style="text-align: center; vertical-align:middle">
                                <input type="text" class="form-control number" id="indiprogram4_edit" name="indiprogram4_edit" style="text-align: right; " >
                              </td>
                              <td width="20%" style="text-align: center; vertical-align:middle">
                                <input type="text" class="form-control number" id="indiprogram5_edit" name="indiprogram5_edit" style="text-align: right; " >
                              </td>
                          </tr>
                          <tr style="background: #428bca; color: #fff">
                              <td style="text-align: center; vertical-align:middle; font-weight: bold;">Kondisi Awal :</td>
                              <td style="text-align: center; vertical-align:middle">
                                <input type="text" class="form-control number" id="indiprogram_awal_edit" name="indiprogram_awal_edit" style="text-align: right; " >
                              </td>
                              <td colspan="2" style="text-align: center; vertical-align:middle; font-weight: bold;">Kondisi Akhir :
                              </td>
                              <td style="text-align: center; vertical-align:middle">
                                 <input type="text" class="form-control number" id="indiprogram_akhir_edit" name="indiprogram_akhir_edit" style="text-align: right; " >
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

    <div id="HapusProgramIndikatorModal" class="modal fade" role="dialog" data-backdrop="static">
            <div class="modal-dialog modal-xs">
              <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                  <input type="hidden" id="id_program_indikator_hapus" name="id_program_indikator_hapus">
                  <div class="alert alert-danger deleteContent">
                      <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border"  style="color:red;" aria-hidden="true"></i>
                        <br>
                        Yakin akan menghapus Indikator Program RPJMD : <strong><span id="nm_program_indikator_hapus"></span></strong> ?
                        <br>
                        <br>
                  </div>
                </div>
                  <div class="modal-footer">
                    <div class="ui-group-buttons">
                      <button type="button" class="btn btn-sm btn-danger btn-labeled btnDelProgramIndikator" data-dismiss="modal" ><span class="btn-label"><i id="footer_action_button" class="glyphicon glyphicon-trash"></i></span> Hapus</button>
                      <div class="or"></div>
                      <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true"><span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span> Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
