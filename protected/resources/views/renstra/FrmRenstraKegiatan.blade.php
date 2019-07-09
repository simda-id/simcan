<div id="ModalKegiatan" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xl"  >
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="post" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" class="form-control" id="id_kegiatan_renstra_edit" name="id_kegiatan_renstra_edit" readonly >
              <input type="hidden" class="form-control" id="thn_id_kegiatan_edit" name="thn_id_kegiatan_edit" readonly>
                <div class="form-group divProgramRenstra">
                  <label class="control-label col-sm-3" for="kd_program_kegiatan_edit">Program Renstra :</label>
                  <div class="col-sm-8">
                    <textarea type="name" class="form-control" id="kd_program_kegiatan_edit" name="kd_program_kegiatan_edit" rows="3" disabled></textarea>
                  </div>
                  <input type="hidden" class="form-control" id="id_program_renstra_kegiatan_edit" name="id_program_renstra_kegiatan_edit" readonly>
              </div>
                <div class="form-group">
                  <label for="no_urut_edit" class="col-sm-3 control-label" align='left'>Nomor Urut :</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" id="no_urut_kegiatan_edit" name="no_urut_kegiatan_edit" required="required">   
                  </div>
                  <label for="id_perubahan_kegiatan_edit" class="col-sm-2 control-label" style="text-align: right;">ID Perubahan :</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" id="id_perubahan_kegiatan_edit" name="id_perubahan_kegiatan_edit" required="required" >  
                  </div>
                </div>
                <div class="form-group">
                    <label for="kd_program_edit" class="col-sm-3 control-label" align='left'>Kd Kegiatan :</label>
                    <div class="col-sm-2">
                    <div class="input-group">
                      <input type="hidden" class="form-control" id="id_kegiatan_ref_edit" name="id_kegiatan_ref_edit" readonly>
                      <input type="text" class="form-control" id="kd_kegiatan_edit" name="kd_kegiatan_edit" readonly>                  
                    </div>
                    </div>
                    <span class="btn btn-primary btnCariKegiatanRef" id="btnCariKegiatanRef" name="btnCariKegiatanRef"><i class="fa fa-search fa-fw fa-lg"></i></span>
                </div>
              <div class="form-group">
                <label for="ur_kegiatan_renstra_edit" class="col-sm-3 control-label" align='left'>Uraian Kegiatan Renstra :</label>
                <div class="col-sm-8">
                  <textarea type="text" class="form-control" rows="5" id="ur_kegiatan_renstra_edit" name="ur_kegiatan_renstra_edit" required="required" disabled></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="ur_sasaran_kegiatan_renstra_edit" class="col-sm-3 control-label" align='left'>Keterangan Kegiatan Renstra :</label>
                <div class="col-sm-8">
                  <textarea type="text" class="form-control" rows="5" id="ur_sasaran_kegiatan_renstra_edit" name="ur_sasaran_kegiatan_renstra_edit" required="required" ></textarea>
                </div>
              </div>
              <label class="col-sm-12 control-label" style="text-align: left;">Rincian Pagu Kegiatan Renstra :</label>
              <table id="tblPaguKegiatan" class="table display table-striped table-bordered"  cellspacing="0" width="100%">
                      <thead>
                          <tr>
                            <th width="20%" style="text-align: center; vertical-align:middle">Pagu Tahun 1</th>
                            <th width="20%" style="text-align: center; vertical-align:middle">Pagu Tahun 2</th>
                            <th width="20%" style="text-align: center; vertical-align:middle">Pagu Tahun 3</th>
                            <th width="20%" style="text-align: center; vertical-align:middle">Pagu Tahun 4</th>
                            <th width="20%" style="text-align: center; vertical-align:middle">Pagu Tahun 5</th>
                          </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td width="20%" style="text-align: center; vertical-align:middle">
                              <input type="text" class="form-control number" id="pagu1_edit_kegiatan" name="pagu1_edit_kegiatan" style="text-align: right; ">
                            </td>
                            <td width="20%" style="text-align: center; vertical-align:middle">
                              <input type="text" class="form-control number" id="pagu2_edit_kegiatan" name="pagu2_edit_kegiatan" style="text-align: right; " >
                            </td>
                            <td width="20%" style="text-align: center; vertical-align:middle">
                              <input type="text" class="form-control number" id="pagu3_edit_kegiatan" name="pagu3_edit_kegiatan" style="text-align: right; " >
                            </td>
                            <td width="20%" style="text-align: center; vertical-align:middle">
                              <input type="text" class="form-control number" id="pagu4_edit_kegiatan" name="pagu4_edit_kegiatan" style="text-align: right; " >
                            </td>
                            <td width="20%" style="text-align: center; vertical-align:middle">
                              <input type="text" class="form-control number" id="pagu5_edit_kegiatan" name="pagu5_edit_kegiatan" style="text-align: right; " >
                            </td>
                          </tr>
                          <tr>
                              <td colspan="3" style="text-align: center; vertical-align:middle">TOTAL PAGU</td>
                              <td colspan="2" style="text-align: center; vertical-align:middle">
                                <input type="text" class="form-control number" id="pagu6_edit_kegiatan" name="pagu6_edit_kegiatan" style="text-align: right; " readonly >
                              </td>
                            </tr>
                      </tbody>
                </table>
          </form>
        </div>
        <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left">
                      <button class="btn btn-sm btn-danger btn-labeled btnHapusKegiatan">
                        <span class="btn-label"><i class="fa fa-trash fa-fw fa-lg"></i></span>Hapus</button>
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-success btnSimpanKegiatan btn-labeled" data-dismiss="modal">
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


<div id="HapusKegiatan" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
            <h4>Hapus Data Kegiatan Renstra OPD</h4>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id_kegiatan_renstra_hapus" name="id_kegiatan_renstra_hapus">
            <div class="alert alert-danger deleteContent">
              <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border"  style="color:red;" aria-hidden="true"></i>
                Yakin akan menghapus Kegiatan Renstra : <strong><span id="ur_kegiatan_renstra_hapus"></span></strong> ?
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
                        <button type="button" class="btn btn-sm btn-danger btnDelKegiatanRenstra btn-labeled" data-dismiss="modal">
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