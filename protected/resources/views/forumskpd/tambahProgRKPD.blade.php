
        <div class="modal-header">
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
        {{-- </div> --}}

<form name="frmEditProgram" class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="id_rkpd_ranwal_program" name="id_rkpd_ranwal_program">
                <div class="form-group">
                  <label class="control-label col-sm-3" for="id">No Urut :</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control number" name="no_urut_program" id="no_urut_program">
                  </div>
                  </div>
                  <div class="form-group urProgramRPJMD">
                    <label class="control-label col-sm-3" for="title">Uraian Program RPJMD:</label>
                    <div class="col-sm-8">
                      <textarea type="name" class="form-control" id="ur_program_rpjmd" rows="3" disabled></textarea>
                    </div>
                    <input type="hidden" id="thn_id_rpjmd" name="thn_id_rpjmd">
                    <input type="hidden" id="id_visi_rpjmd" name="id_visi_rpjmd">
                    <input type="hidden" id="id_misi_rpjmd" name="id_misi_rpjmd">
                    <input type="hidden" id="id_tujuan_rpjmd" name="id_tujuan_rpjmd">
                    <input type="hidden" id="id_sasaran_rpjmd" name="id_sasaran_rpjmd">
                    <input type="hidden" id="id_program_rpjmd" name="id_program_rpjmd">
                    <span class="btn btn-sm btn-primary btnCariProgram" id="btnCariProgram" name="btnCariProgram"><i class="glyphicon glyphicon-search"></i></span>
                  </div>
                  <div class="form-group">
                  <label class="control-label col-sm-3" for="title">Uraian Program RKPD:</label>
                  <div class="col-sm-8">
                    <textarea type="name" class="form-control ur_prog" name="ur_program_rkpd" id="ur_program_rkpd" rows="3" disabled></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="pagu_rpjmd_program" class="col-sm-3 control-label" align='left'>Pagu RPJMD :</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control number" id="pagu_rpjmd_program" name="pagu_rpjmd_program" disabled >
                  </div>
                  <label for="pagu_rkpd_program" class="col-sm-2 control-label" align='left'>Pagu RKPD :</label>
                  <div class="col-sm-3">
                    <div class="input-group">
                      <input type="text" class="form-control number" id="pagu_rkpd_program" name="pagu_rkpd_program" required="required" >
                      <span class="input-group-addon">
                        <a href="#" data-toggle="popover" data-container="body" title="Pagu RKPD" data-trigger="hover" data-content="Diisi dengan jumlah pagu yang akan dianggarkan pada tahun berjalan, jumlahnya bisa lebih besar maupun lebih kecil dari pagu di RPJMD"><i class="glyphicon glyphicon-question-sign"></i></a>
                      </span>
                    </div>                    
                  </div>
                </div>
                <div class="form-group KetPelaksanaan">
                  <label for="keterangan_status_program" class="col-sm-3 control-label" align='left'>Keterangan Pelaksanaan :</label>
                  <div class="col-sm-8">
                    <textarea type="text" class="form-control keterangan_status_program" name="keterangan_status_program" id="keterangan_status_program" rows="3" disabled></textarea>
                  </div>
                </div>
                <div class="form-group idStatusUsulan"> 
                  <label for="status_data_program" class="col-sm-3 control-label" align='left'>Status Usulan :</label>                 
                  <div class="col-sm-6">
                    <label class="radio-inline">
                      <input type="radio" class="usulan" name="status_usulan_program" id="status_usulan_program" value="0">Draft
                    </label>
                    <label class="radio-inline">
                      <input type="radio" class="usulan" name="status_usulan_program" id="status_usulan_program" value="1">Final
                    </label>
                  </div>
                </div>
              </form>
        </div>
<div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapus">
                        <button class="btn btn-sm btn-danger btnHapus"><span id="footer_action_button" class="glyphicon glyphicon-trash"></span> Hapus</button>
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                         <button type="submit" class="btn btn-sm btn-labeled btn-primary btnProgram" data-dismiss="modal"><span class="btn-label"><i id="footer_action_button" class="glyphicon glyphicon-save"></i></span> Simpan</button>
                         <div class="or"></div>
                        <button type="button" class="btn btn-sm btn-labeled btn-warning" data-dismiss="modal" aria-hidden="true"><span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span> Tutup</button>
                      </div>
                    </div>
                </div>
              </div>

<script>
$(document).ready(function(){
$('[data-toggle="popover"]').popover();


});
</script>