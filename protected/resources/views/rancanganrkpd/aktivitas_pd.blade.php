<div id="ModalAktivitas" class="modal fade" role="dialog" data-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
              <form name="frmModalAktivitas" class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="id_forum_aktivitas" name="id_forum_aktivitas">
                <input type="hidden" id="id_aktivitas" name="id_aktivitas">
                <input type="hidden" id="tahun_forum_aktivitas" name="tahun_forum_aktivitas">
                <input type="hidden" id="id_renja_aktivitas" name="id_renja_aktivitas">
                <div class="form-group">
                  <label class="control-label col-sm-3" for="id">No Urut :</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control nomor" name="no_urut_aktivitas" id="no_urut_aktivitas">
                  </div>
                  <div class="col-sm-3 chkAktivitas hidden">
                    <label class="checkbox-inline">
                    <input class="checkAktivitas" type="checkbox" name="checkAktivitas" id="checkAktivitas" value="1"> Telah Direviu</label>
                  </div>
                </div>
                <div class="form-group rbSumberAktivitas"> 
                  <label for="sumber_aktivitas" class="col-sm-3 control-label" align='left'>Asal Aktivitas :</label>                 
                  <div class="col-sm-6">
                    <label>
                      <input type="radio" class="sumber_aktivitas" name="sumber_aktivitas" id="sumber_aktivitas" value="0"> Analisis Standar Belanja (ASB) 
                    </label>
                    <label>
                      <input type="radio" class="sumber_aktivitas" name="sumber_aktivitas" id="sumber_aktivitas" value="1"> Non Analisis Standar Belanja (ASB)
                    </label>
                  </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="title">Uraian Aktivitas :</label>
                    <div class="col-sm-8">
                      <textarea type="name" class="form-control" id="ur_aktivitas_kegiatan" rows="3" disabled></textarea>
                    </div>
                    <input type="hidden" id="id_aktivitas_asb" name="id_aktivitas_asb">
                    <span class="btn btn-sm btn-primary btnCariASB" id="btnCariASB" name="btnCariASB"><i class="fa fa-search fa-fw fa-lg"></i></span>
                </div>
                <div class="form-group rbJenisAktivitas"> 
                  <label for="jenis_aktivitas" class="col-sm-3 control-label" align='left'>Jenis Aktivitas :</label>                 
                  <div class="col-sm-6">
                    <label class="radio-inline">
                      <input type="radio" class="jenis_aktivitas" name="jenis_aktivitas" id="jenis_aktivitas" value="0"> Baru 
                    </label>
                    <label class="radio-inline">
                      <input type="radio" class="jenis_aktivitas" name="jenis_aktivitas" id="jenis_aktivitas" value="1"> Lanjutan
                    </label>
                  </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="title">Sumber Dana :</label>
                    <div class="col-sm-4">
                        <select type="text" class="form-control sumber_dana" id="sumber_dana" name="sumber_dana"></select>
                    </div>
                </div>
                <div class="form-group">
                  <label for="pagu_aktivitas_renja" class="col-sm-3 control-label" align='left'>Pagu Forum :</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control number" id="pagu_aktivitas_renja" name="pagu_aktivitas_renja" disabled>
                  </div>
                  <label for="pagu_aktivitas" class="col-sm-2 control-label" align='left'>Pagu Rancangan :</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control number" id="pagu_aktivitas" name="pagu_aktivitas">
                  </div>
                </div>
                <div class="form-group">
                  <label for="id_satuan_1_aktivitas" class="col-sm-3 control-label" align='left'>Satuan Vol 1 :</label>
                  <div class="col-sm-3">
                    <select type="text" class="form-control" id="id_satuan_1_aktivitas" name="id_satuan_1_aktivitas"></select> 
                  </div>
                  <label for="id_satuan_2_aktivitas" class="col-sm-2 control-label" align='left'>Satuan Vol 2 :</label>
                  <div class="col-sm-3">
                    <select type="text" class="form-control" id="id_satuan_2_aktivitas" name="id_satuan_2_aktivitas"></select> 
                  </div>
                </div>
                <div class="form-group" id="divSatuanUtama"> 
                  <label for="satuan_utama" class="col-sm-3 control-label" align='left'>Satuan Vol Utama :</label>                 
                  <div class="col-sm-8">
                    <label class="radio-inline">
                      <input type="radio" class="satuan_utama" name="satuan_utama" id="satuan_utama" value="0">
                      <span class="control-label" id="ur_sat_utama1" align='left'>-</span> 
                    </label>
                    <label class="radio-inline">
                      <input type="radio" class="satuan_utama" name="satuan_utama" id="satuan_utama" value="1">
                      <span class="control-label" id="ur_sat_utama2" align='left'>-</span> 
                    </label>
                  </div>
                </div>
                <div class="form-group hidden" id="divJenisPembahasan"> 
                  <label for="jenis_pembahasan" class="col-sm-3 control-label" align='left'>Jenis Pembahasan :</label>                 
                  <div class="col-sm-6">
                    <label class="radio-inline">
                      <input type="radio" class="jenis_pembahasan" name="jenis_pembahasan" id="jenis_pembahasan" value="0"> Non Musrenbang 
                    </label>
                    <label class="radio-inline">
                      <input type="radio" class="jenis_pembahasan" name="jenis_pembahasan" id="jenis_pembahasan" value="1"> Musrenbang
                    </label>
                  </div>
                </div>
                <div class="form-group" id="divPaguMusrenbang">
                  <label for="pagu_musren_aktivitas" class="col-sm-3 control-label" align='left'>Pagu Musrenbang :</label>
                  <div class="col-sm-2">
                  <div class="input-group">
                    <input type="text" class="form-control number" id="persen_musren_aktivitas" name="persen_musren_aktivitas">
                    <span class="input-group-addon" text-align="center"><strong>%</strong></span>
                  </div>
                  </div>
                  <div class="col-sm-3">
                    <input type="text" class="form-control number" id="pagu_musren_aktivitas" name="pagu_musren_aktivitas" disabled >
                  </div>
                </div>  
                <div class="form-group" id="idStatusPelaksanaanAktivitas">
                  <label for="status_pelaksanaan_aktivitas" class="col-sm-3 control-label" align='left'>Status Pelaksanaan :</label>
                  <div class="col-sm-8" id="myRadio">
                      <label class="radio-inline">
                        <input type="radio" class="sp_aktivitas" name="status_pelaksanaan_aktivitas" id="status_pelaksanaan_aktivitas" value="0">Dilaksanakan
                      </label>
                      <label class="radio-inline">
                        <input type="radio" class="sp_aktivitas" name="status_pelaksanaan_aktivitas" id="status_pelaksanaan_aktivitas" value="1">Tidak Dilaksanakan
                      </label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="keterangan_status_aktivitas" class="col-sm-3 control-label" align='left'>Keterangan Pelaksanaan :</label>
                  <div class="col-sm-8">
                    <textarea type="text" class="form-control" name="keterangan_status_aktivitas" id="keterangan_status_aktivitas" rows="3"></textarea>
                  </div>
                </div>
              </form>
            </div>
              <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idHapusAktivitas">
                        <button type="button" id="btnHapusAktivitas" class="btn btn-sm btn-danger btn-labeled">
                            <span class="btn-label"><i class="fa fa-trash fa-fw fa-lg"></i></span>Hapus</button>
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" id="btnAktivitas" class="btn btn-sm btn-success btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i class="fa fa-floppy-o fa-fw fa-lg"></i></span>Simpan</button>
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

<div id="HapusAktivitas" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
            <h4>Hapus Data Aktivitas Kegiatan SKPD</h4>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id_aktivitas_hapus" name="id_aktivitas_hapus">
            <div class="alert alert-danger deleteContent">
              <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border"  style="color:red;" aria-hidden="true"></i>
                Yakin akan menghapus Aktivitas : <strong><span id="ur_aktivitas_hapus"></span></strong> ?
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
                        <button type="button" id="btnDelAktivitas" class="btn btn-sm btn-danger btn-labeled" data-dismiss="modal">
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