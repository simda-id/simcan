<div id="ModalPelaksana" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form name="frmModalPelaksana" class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" id="id_pelaksana_forum" name="id_pelaksana_forum">
            <input type="hidden" id="id_forum_pelaksana" name="id_forum_pelaksana">
            <input type="hidden" id="id_aktivitas_pelaksana" name="id_aktivitas_pelaksana">
            <input type="hidden" id="tahun_forum_pelaksana" name="tahun_forum_pelaksana">
            <div class="form-group">
              <label class="control-label col-sm-3" for="id">No Urut :</label>
              <div class="col-sm-3">
                <input type="text" class="form-control nomor" id="no_urut_pelaksana">
              </div>
              <div class="col-sm-3 chkPelaksana hidden">
                    <label class="checkbox-inline">
                    <input class="checkPelaksana" type="checkbox" name="checkPelaksana" id="checkPelaksana" value="1"> Telah Direviu</label>
              </div>
            </div>
            <div class="form-group" >
              <label class="control-label col-sm-3" for="title">Sub Unit Pelaksana :</label>
              <div class="col-sm-8">
              <div class="input-group">
                <input type="hidden" id="id_subunit_pelaksana" name="id_subunit_pelaksana">
                <input type="name" class="form-control" id="subunit_pelaksana" rows="2" disabled>
                <div class="input-group-btn">
                    <btn class="btn btn-primary" id="btnCariSubUnit" name="btnCariSubUnit"><i class="fa fa-search"></i></btn>
                </div>
              </div>
              </div>
            </div>
            <div class="form-group" id="idStatusPelaksanaanPelaksana">
                  <label for="status_pelaksanaan_pelaksana" class="col-sm-3 control-label" align='left'>Status Pelaksanaan :</label>
                  <div class="col-sm-8" id="myRadio">
                      <label class="radio-inline">
                        <input type="radio" class="sp_pelaksana" name="status_pelaksanaan_pelaksana" id="status_pelaksanaan_pelaksana" value="0">Dilaksanakan
                      </label>
                      <label class="radio-inline">
                        <input type="radio" class="sp_pelaksana" name="status_pelaksanaan_pelaksana" id="status_pelaksanaan_pelaksana" value="1">Tidak Dilaksanakan
                      </label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="keterangan_status_pelaksana" class="col-sm-3 control-label" align='left'>Keterangan Pelaksanaan :</label>
                  <div class="col-sm-8">
                    <textarea type="text" class="form-control" name="keterangan_status_pelaksana" id="keterangan_status_pelaksana" rows="3"></textarea>
                  </div>
                </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="title">Lokasi Penyelenggaraan :</label>
                <div class="col-sm-8">
                  <div class="input-group">
                    <input type="hidden" id="id_lokasi_pelaksana" name="id_lokasi_pelaksana">
                    <input type="name" class="form-control" id="nm_lokasi_pelaksana" rows="2" disabled>
                    <div class="input-group-btn">
                      <btn class="btn btn-primary" id="btnCariLokasi" name="btnCariLokasi"><i class="fa fa-search"></i></btn>
                    </div>
                  </div>
                </div>
            </div>
          </form>
        </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idHapusPelaksana">
                        <button id="btnHapusPelaksana" type="button" class="btn btn-sm btn-danger btn-labeled">
                            <span class="btn-label"><i class="fa fa-trash fa-fw fa-lg"></i></span>Hapus</button>
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button id="btnPelaksana" type="button" class="btn btn-sm btn-success btn-labeled" data-dismiss="modal">
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
    </div>

<div id="HapusPelaksana" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
            <h4>Hapus Data Pelaksana Aktivitas Kegiatan SKPD</h4>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id_pelaksana_hapus" name="id_pelaksana_hapus">
            <div class="alert alert-danger deleteContent">
              <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border"  style="color:red;" aria-hidden="true"></i>
                Yakin akan menghapus Sub Unit : <strong><span id="ur_pelaksana_hapus"></span></strong> sebagai pelaksana aktivitas ?
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
                        <button type="button" id="btnDelPelaksana" class="btn btn-sm btn-danger btn-labeled" data-dismiss="modal">
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