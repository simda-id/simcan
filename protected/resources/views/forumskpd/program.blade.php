
<div id="ModalProgRenja" class="modal fade" role="dialog" data-backdrop="static" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form name="frmProgRenja" class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="id_forum_program" name="id_forum_program">
                <input type="hidden" id="id_forum_rkpdprog_progrenja" name="id_forum_rkpdprog_progrenja">
                <input type="hidden" id="tahun_forum_progrenja" name="tahun_forum_progrenja">
                <input type="hidden" id="id_unit_progrenja" name="id_unit_progrenja">
                <input type="hidden" id="sumber_data_progrenja" name="sumber_data_progrenja">
                <input type="hidden" id="status_data_progrenja" name="status_data_progrenja">
                <div class="form-group">
                  <label class="control-label col-sm-3" for="id">No Urut :</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control nomor" name="no_urut_progrenja" id="no_urut_progrenja">
                  </div>
                  </div>
                <div class="form-group">
                  <label class="control-label col-sm-3" for="id">Jenis Belanja :</label>
                  <div class="col-sm-5">
                    <select class="form-control" name="jenis_belanja" id="jenis_belanja">
                      <option value="0">Belanja Langsung</option>
                      <option value="1">Pendapatan</option>
                      <option value="2">Belanja Tidak Langsung</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3" for="title">Uraian Program RKPD:</label>
                  <div class="col-sm-8">
                    <textarea type="name" class="form-control" name="uraian_program_renstra" id="uraian_program_renstra" rows="3" disabled></textarea>
                  </div>
                  <input type="hidden" id="id_renja_program" name="id_renja_program">
                  <input type="hidden" id="id_program_renstra" name="id_program_renstra">
                  {{-- <span class="btn btn-sm btn-primary btnCariProgramRenstra" id="btnCariProgramRenstra" name="btnCariProgramRenstra"><i class="fa fa-search fa-fw fa-lg"></i></span> --}}
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3" for="title">Uraian Program Referensi:</label>
                  <div class="col-sm-8">
                    <textarea type="name" class="form-control ur_program_ref" name="ur_program_ref" id="ur_program_ref" rows="3" disabled></textarea>
                  </div>
                  <input type="hidden" id="id_program_ref" name="id_program_ref">
                  <span class="btn btn-sm btn-primary btnCariProgRef" id="btnCariProgRef" name="btnCariProgRef"><i class="fa fa-search fa-fw fa-lg"></i></span>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3" for="title">Uraian Program Forum:</label>
                  <div class="col-sm-8">
                    <textarea type="name" class="form-control ur_program_renja" name="ur_program_renja" id="ur_program_renja" rows="3" disabled></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="pagu_rkpd_program" class="col-sm-3 control-label" align='left'>Pagu Renja :</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control number" id="pagu_renja_program" name="pagu_renja_program" disabled >
                  </div>
                  <label for="pagu_forum_program" class="col-sm-2 control-label" align='left'>Pagu Forum :</label>
                  <div class="col-sm-3">
                      <input type="text" class="form-control number" id="pagu_forum_progrenja" name="pagu_forum_progrenja" required="required" >                    
                  </div>
                </div>
                <div class="form-group idStatusPelaksanaan" id="idStatusProgRenja">
                  <label for="status_pelaksanaan_progrenja" class="col-sm-3 control-label" align='left'>Status Pelaksanaan :</label>
                  <div class="col-sm-8" id="myRadio">
                      <label class="radio-inline">
                        <input type="radio" class="sp_progrenja" name="status_pelaksanaan_progrenja" id="status_pelaksanaan_progrenja" value="0">Dilaksanakan
                      </label>
                      <label class="radio-inline hidden">
                        <input type="radio" class="sp_progrenja " name="status_pelaksanaan_progrenja" id="status_pelaksanaan_progrenja" value="1">Dimajukan
                      </label>
                      <label class="radio-inline">
                        <input type="radio" class="sp_progrenja" name="status_pelaksanaan_progrenja" id="status_pelaksanaan_progrenja" value="2">Ditunda
                      </label>
                      <label class="radio-inline">
                        <input type="radio" class="sp_progrenja" name="status_pelaksanaan_progrenja" id="status_pelaksanaan_progrenja" value="3">Dibatalkan
                      </label>
                      <label class="radio-inline hidden" id="sp_progrenja4">
                        <input type="radio" class="sp_progrenja" name="status_pelaksanaan_progrenja" id="status_pelaksanaan_progrenja" value="4">Baru
                      </label>
                      <label class="radio-inline">
                        <input type="radio" class="sp_progrenja" name="status_pelaksanaan_progrenja" id="status_pelaksanaan_progrenja" value="5">Non APBD
                      </label>
                  </div>
                  <div class="col-sm-3 hidden">
                      <div id="radioBtn" class="btn-group">
                          <a class="btn btn-primary btn-sm Active" id="radioBtn_1" data-toggle="radioBtn_3" data-title="1">Disetujui</a>
                          <a class="btn btn-primary btn-sm notActive" id="radioBtn_0" data-toggle="radioBtn_3" data-title="0">Dipending</a>
                        </div>
                      <input type="hidden" class="form-control" id="radioBtn_3" name="radioBtn_3">                  
                  </div>
                </div>
                <div class="form-group KetPelaksanaanProgRenja">
                  <label for="keterangan_status_program" class="col-sm-3 control-label" align='left'>Keterangan Pelaksanaan :</label>
                  <div class="col-sm-8">
                    <textarea type="text" class="form-control keterangan_status_progrenja" name="keterangan_status_progrenja" id="keterangan_status_progrenja" rows="3"></textarea>
                  </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapus">
                        <button class="btn btn-sm btn-danger btn-labeled btnHapusProgRenja"><span class="btn-label"><i class="fa fa-trash fa-fw fa-lg"></i></span>Hapus</button>
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                         <button type="button" class="btn btn-sm btn-labeled btn-success btnProgRenja" data-dismiss="modal"><span class="btn-label"><i class="fa fa-floppy-o fa-fw fa-lg"></i></span> Simpan</button>
                         <div class="or"></div>
                        <button type="button" class="btn btn-sm btn-labeled btn-warning" data-dismiss="modal" aria-hidden="true"><span class="btn-label"><i class="fa fa-sign-out fa-fw fa-lg"></i></span> Tutup</button>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>