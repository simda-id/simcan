<div id="ModalDokumen" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" >
        <div class="modal-dialog modal-lg"  >
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" autocomplete='off' action="" method="post" onsubmit="return false;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" class="form-control" name="id_real_dok" id="id_real_dok"> 
                <div class="form-group">
                    <label for="tahun_dok" class="col-sm-3 control-label" align='left'>Tahun Dokumen </label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control number" style="text-align: center;" id="tahun_dok" name="tahun_dok" required="required" maxlength="4">
                    </div>
                    <label for="cb_triwulan_dok" class="col-sm-2 control-label" align='left' style="text-align: center;">Triwulan </label>
                    <div class="col-sm-2">
                        <select class="form-control" style="text-align: center;" id="cb_triwulan_dok" name="cb_triwulan_dok" required="required">
                            <option value="1">I</option>
                            <option value="2">II</option>
                            <option value="3">III</option>
                            <option value="4">IV</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="cb_no_perkin_dok" class="col-sm-3 control-label" align='left'>Nomor Dokumen Perkin</label>
                    <div class="col-sm-8">
                        <select class="form-control cb_no_perkin_dok" id="cb_no_perkin_dok" name="cb_no_perkin_dok" required="required"></select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="no_realisasi_dok" class="col-sm-3 control-label" align='left'>Nomor Dokumen Realisasi</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="no_realisasi_dok" name="no_realisasi_dok" required="required">
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <label for="tgl_perkin_dok" class="col-sm-3 control-label" align='left'>Tanggal Dokumen </label>
                    <input type="hidden" name="tgl_perkin_dok" id="tgl_perkin_dok">
                    <div class="col-sm-4">
                        <input type="text" class="form-control datepicker" id="tgl_perkin_dok_x" name="tgl_perkin_dok_x" style="text-align: center;">
                        <i class="fa fa-calendar fa-fw fa-lg text-primary form-control-feedback"></i>              
                    </div>
                </div>
                <div class="form-group">
                        <label for="cb_eselon_4a" class="col-sm-3 control-label" align='left'>Uraian Jabatan Eselon </label>
                        <div class="col-sm-8">
                            <select class="form-control cb_eselon_4a hidden" name="cb_eselon_4a" id="cb_eselon_4a" disabled></select>
                            <input type="hidden" class="form-control" id="id_jabatan_dok" name="id_jabatan_dok" disabled>
                            <input type="text" class="form-control" id="jabatan_penandatangan_dok" name="jabatan_penandatangan_dok" disabled>
                        </div>
                      </div>        
                <div class="form-group">
                  <label for="cb_pegawai" class="col-sm-3 control-label" align='left'>Nama Pejabat Pembuat </label>
                  <div class="col-sm-8">
                        <select class="form-control cb_pegawai hidden" name="cb_pegawai" id="cb_pegawai"></select>
                        <input type="hidden" class="form-control " id="id_pegawai_dok" name="id_pegawai_dok" disabled>
                        <input type="text" class="form-control" id="nama_penandatangan_dok" name="nama_penandatangan_dok" disabled>
                  </div>
                </div>
                <div class="form-group">
                    <label for="nip_penandatangan_dok" class="col-sm-3 control-label" align='left'>NIP </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nip_penandatangan_dok" name="nip_penandatangan_dok" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ur_penandatangan_dok" class="col-sm-3 control-label" align='left'>Pangkat / Golongan </label>
                    <div class="col-sm-8">
                        <input type="hidden" class="form-control" id="pangkat_penandatangan_dok" name="pangkat_penandatangan_dok" disabled>
                        <input type="text" class="form-control" id="ur_penandatangan_dok" name="ur_penandatangan_dok" disabled>
                    </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <div class="row">
                <div class="col-sm-2 text-left">
                  {{-- <button type="button" id="btnDelDokumen" class="btn btn-labeled btn-danger"><span class="btn-label"><i class="fa fa-trash-o fa-lg fa-fw"></i></span>Hapus</button> --}}
                </div>
                <div class="col-sm-10 text-right">
                  <div class="ui-group-buttons">
                    <button id="btnDokumen" type="button" class="btn btn-success btn-labeled btnDokumen" data-dismiss="modal">
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