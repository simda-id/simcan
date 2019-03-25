<div id="EditPelaksana" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form name="frmEditPelaksana" class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" id="id_pelaksana_rkpd" name="id_pelaksana_rkpd">
            <input type="hidden" id="id_urusan_rkpd_pelaksana" name="id_urusan_rkpd_pelaksana">
            <input type="hidden" id="id_rkpd_ranwal_pelaksana" name="id_rkpd_ranwal_pelaksana">
            <div class="form-group">
              <label class="control-label col-sm-3" for="id">No Urut :</label>
              <div class="col-sm-3">
                <input type="text" class="form-control number" id="no_urut_pelaksana" disabled>
              </div>
              <div class="col-sm-3 chkPelaksana hidden">
                    <label class="checkbox-inline">
                    <input class="checkPelaksana" type="checkbox" name="checkPelaksana" id="checkPelaksana" value="1"> Telah Direviu</label>
                </div>
              </div>
              <div class="form-group">
              <label class="control-label col-sm-3" for="title">Unit Pelaksana RKPD:</label>
              <div class="col-sm-8">
                <textarea type="name" class="form-control" id="unit_pelaksana_rkpd" rows="2" disabled></textarea>
              </div>
              <input type="hidden" id="id_unit_rkpd" name="id_unit_rkpd">
              <span class="btn btn-sm btn-primary btnCariUnit" id="btnCariUnit" name="btnCariUnit"><i class="glyphicon glyphicon-search"></i></span>
            </div>
            <div class="form-group" >
              <label for="ophak_akses" class="col-sm-3 control-label" align='left'>Tambah Program/Kegiatan :</label>
              <div class="col-sm-8">
                <label class="radio-inline"  data-placement="bottom" data-toggle="popover" data-html="true" data-container="body" title="Ranwal RKPD" data-trigger="hover" data-content="SKPD tidak dapat menambah program/kegiatan di Renja selain di Renstra untuk Program RPJMD ini">
                  <input type="radio" name="ophak_akses" id="ophak_akses" value="0">Tidak Diperbolehkan
                </label>
                <label class="radio-inline"  data-placement="bottom" data-toggle="popover" data-html="true" data-container="body" title="Ranwal RKPD" data-trigger="hover" data-content="SKPD dapat menambah program/kegiatan di Renja selain di Renstra untuk Program RPJMD ini">
                  <input type="radio" name="ophak_akses" id="ophak_akses" value="1">Diperbolehkan 
                </label>
              </div>
            </div>
            <div class="form-group idStatusPelaksanaUnit" id="idStatus">
                  <label for="status_pelaksanaan_unit" class="col-sm-3 control-label" align='left'>Status Pelaksanaan :</label>
                  <div class="col-sm-8" id="myRadio">
                      <label class="radio-inline">
                        <input type="radio" class="sUnit" name="status_pelaksanaan_unit" id="status_pelaksanaan_unit" value="0">Tepat Waktu
                      </label>
                      <label class="radio-inline hidden">
                        <input type="radio" class="sUnit" name="status_pelaksanaan_unit" id="status_pelaksanaan_unit" value="1">Dimajukan
                      </label>
                      <label class="radio-inline">
                        <input type="radio" class="sUnit" name="status_pelaksanaan_unit" id="status_pelaksanaan_unit" value="2">Ditunda
                      </label>
                      <label class="radio-inline">
                        <input type="radio" class="sUnit" name="status_pelaksanaan_unit" id="status_pelaksanaan_unit" value="3">Dibatalkan
                      </label>
                      <label class="radio-inline hidden">
                        <input type="radio" class="sUnit" name="status_pelaksanaan_unit" id="status_pelaksanaan_unit" value="5">Tanpa Anggaran
                      </label>
                      <label class="radio-inline hidden" id="status_pelaksanaan_unit4">
                        <input type="radio" class="sUnit" name="status_pelaksanaan_unit" id="status_pelaksanaan_unit" value="4">Baru
                      </label>
                  </div>
            </div>
            <div class="form-group KetPelaksanaanUnit">
                  <label for="keterangan_status_unit" class="col-sm-3 control-label" align='left'>Keterangan Pelaksanaan :</label>
                  <div class="col-sm-8">
                    <textarea type="text" class="form-control keterangan_status_unit" name="keterangan_status_unit" id="keterangan_status_unit" rows="3" disabled></textarea>
                  </div>
                </div>
          </form>
        </div>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusPelaksana">
                        {{-- <button class="btn btn-sm btn-danger btnHapusIndikator"><span class="glyphicon glyphicon-trash"></span> Hapus</button> --}}
                    </div>
                    <div class="col-sm-10 text-right">
                        <div class="ui-group-buttons">
                         <button type="button" class="btn btn-labeled btn-success btnAddPelaksana" data-dismiss="modal"><span class="btn-label"><i class="fa fa-floppy-o fa-lg fa-fw"></i></span> Simpan</button>
                        <div class="or"></div>
                        <button type="button" class="btn btn-labeled btn-warning" data-dismiss="modal" aria-hidden="true"><span class="btn-label"><i class="fa fa-sign-out fa-lg fa-fw"></i></span> Tutup</button>
                        </div>
                    </div>
                </div>
              </div>
          </div>
        </div>
      </div>

  <div id="HapusPelaksana" class="modal fade" role="dialog" tabindex="-1" data-focus-on="input:first" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id_pelaksana_rkpd_hapus" name="id_pelaksana_rkpd_hapus">
            <div class="alert alert-danger">
              <i class="fa fa-exclamation-triangle fa-2x fa-pull-left text-danger"  aria-hidden="true"></i>
                Yakin akan menghapus Unit : <strong><span class="ur_unit_del"></span></strong> ini ?
          </div>
        </div>
          <div class="modal-footer">
            <div class="ui-group-buttons">
            <button type="button" class="btn btn-labeled btn-danger btnDelUnit" data-dismiss="modal" ><span class="btn-label"><i class="fa fa-trash fa-lg fa-fw"></i></span> Hapus</button>
            <div class="or"></div>
            <button type="button" class="btn btn-labeled btn-warning" data-dismiss="modal" aria-hidden="true"><span class="btn-label"><i class="fa fa-sign-out fa-lg fa-fw"></i></span> Tutup</button>
            <div class="ui-group-buttons">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>