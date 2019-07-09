<div id="ModalDokumen" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" >
        <div class="modal-dialog modal-lg"  >
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" autocomplete='off' action="" method="post" onsubmit="return false;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" class="form-control" name="id_rpjmd_dok" id="id_rpjmd_dok">    
                <input type="hidden" class="form-control" name="id_pemda_dok" id="id_pemda_dok">          
                <div class="form-group">
                  <label for="cb_jns_dokumen" class="col-sm-3 control-label" align='left'>Jenis Dokumen RPJMD</label>
                  <div class="col-sm-5">
                      <select class="form-control cb_jns_dokumen" name="cb_jns_dokumen" id="cb_jns_dokumen"></select>
                  </div>
                  <label for="id_revisi_dok" class="col-sm-2 control-label" style="text-align: right;">Revisi ke-</label>
                  <div class="col-sm-2">
                      <input type="text" class="form-control" id="id_revisi_dok" name="id_revisi_dok" required="required">
                  </div>
                </div> 
                <div class="form-group">
                  <label for="cb_ref_dokumen" class="col-sm-3 control-label" align='left'>Dokumen Referensi</label>
                  <div class="col-sm-8">
                      <select class="form-control cb_ref_dokumen" name="cb_ref_dokumen" id="cb_ref_dokumen"></select>
                  </div>
                </div> 
                <div class="form-group">
                  <label for="thn_1_dok" class="col-sm-3 control-label" align='left'>Periode RPJMD </label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control number" id="thn_1_dok" name="thn_1_dok" required="required">
                  </div>
                  <label for="thn_5_dok" class="col-sm-1 control-label" style="text-align: center;"> s.d </label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control number" id="thn_5_dok" name="thn_5_dok" required="required">
                  </div>
                </div>               
                <div class="form-group">
                    <label for="no_perda_dok" class="col-sm-3 control-label" align='left'>Nomor Dokumen </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="no_perda_dok" name="no_perda_dok" required="required">
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <label for="tgl_perda_dok" class="col-sm-3 control-label" align='left'>Tanggal Dokumen </label>
                    <input type="hidden" name="tgl_perda_dok" id="tgl_perda_dok" required="required" >
                    <div class="col-sm-4">
                        <input type="text" class="form-control datepicker" id="tgl_perda_dok_x" name="tgl_perda_dok_x" style="text-align: center;">
                        <i class="fa fa-calendar fa-fw fa-lg text-primary form-control-feedback"></i>              
                    </div>
                </div>
                <div class="form-group">
                        <label for="uraian_perda_dok" class="col-sm-3 control-label" align='left'>Uraian Dokumen </label>
                        <div class="col-sm-8">
                          <textarea type="text" class="form-control" rows="3" id="uraian_perda_dok" name="uraian_perda_dok" required="required" ></textarea>
                        </div>
                      </div>        
              </form>
            </div>
            <div class="modal-footer">
              <div class="row">
                <div class="col-sm-2 text-left">
                    <button type="button" id="btnDelDokumen" class="btn btn-labeled btn-danger btnDelDokumen"><span class="btn-label"><i class="fa fa-trash-o fa-lg fa-fw"></i></span>Hapus</button>
                </div>
                <div class="col-sm-10 text-right">
                  <div class="ui-group-buttons">
                    <button id="btnDokumen" type="button"id="btnDokumen"  class="btn btn-success btn-labeled btnDokumen" data-dismiss="modal">
                    <span class="btn-label"><i class="fa fa-floppy-o fa-fw fa-lg"></i></span>Simpan</button>
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
      
      <div id="HapusDokumen" class="modal fade" role="dialog" tabindex="-1" data-focus-on="input:first" data-backdrop="static">
        <div class="modal-dialog modal-xs">
          <div class="modal-content">
            <div class="modal-header">
              <h4>Hapus Dokumen Rancangan RPJMD</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id_dokumen_hapus" name="id_dokumen_hapus">
                <div class="alert alert-danger">
                  <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border text-danger" aria-hidden="true"></i>
                      Yakin akan menghapus Dokumen Perjanjian Kinerja yang dibuat oleh : <strong><span class="ur_dokumen_del"></span></strong>  ?
                  <br>
                  <br>
                  <br>
              </div>
              </div>
              <div class="modal-footer">
                <div class="ui-group-buttons">
                <button type="button" id="btnDelAksiDokumen" class="btn btn-labeled btn-danger btnDelAksiDokumen" data-dismiss="modal" ><span class="btn-label"><i class="fa fa-trash-o fa-lg fa-fw"></i></span> Hapus</button>
                <div class="or"></div>
                <button type="button" class="btn btn-labeled btn-warning" data-dismiss="modal" aria-hidden="true"><span class="btn-label"><i class="fa fa-sign-out fa-lg fa-fw"></i></span> Tutup</button>
                </div>
              </div>
          </div>
        </div>
      </div>