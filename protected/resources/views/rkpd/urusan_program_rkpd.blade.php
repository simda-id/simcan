<div id="ModalUrusan" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" id="id_rkpd_ranwal_urusan" name="id_rkpd_ranwal_urusan">
            <div class="form-group">
              <label class="control-label col-sm-3" for="kd_urusan">Urusan Pemerintahan :</label>
              <div class="col-sm-8">
                <select type="text" class="form-control kd_urusan" id="kd_urusan" name="kd_urusan"></select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="kd_bidang">Bidang :</label>
              <div class="col-sm-8">
                <select type="text" class="form-control kd_bidang" id="kd_bidang" name="kd_bidang"></select>
              </div>
            </div>
          </form>
        </div>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-12 text-right">
                      <div class="ui-group-buttons">
                         <button type="button" class="btn btn-labeled btn-success btnUrusan" data-dismiss="modal"><span class="btn-label"><i class="fa fa-floppy-o fa-lg fa-fw"></i></span> Simpan</button>
                         <div class="or"></div>
                        <button type="button" class="btn btn-labeled btn-warning" data-dismiss="modal" aria-hidden="true"><span class="btn-label"><i class="fa fa-sign-out fa-lg fa-fw"></i></span> Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
          </div>
        </div>
      </div>

  <div id="HapusUrusan" class="modal fade" role="dialog" tabindex="-1" data-focus-on="input:first" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id_urusan_rkpd_hapus" name="id_urusan_rkpd_hapus">
            <div class="alert alert-danger">
              <i class="fa fa-exclamation-triangle fa-2x fa-pull-left text-danger"  aria-hidden="true"></i>
                Yakin akan menghapus Bidang : <strong><span class="ur_bidang_del"></span></strong> dalam urusan <strong><span class="ur_urusan_del"></span></strong> ?
          </div>
        </div>
          <div class="modal-footer">
            <div class="ui-group-buttons">
              <button type="button" class="btn btn-labeled btn-danger btnDelUrusan" data-dismiss="modal" ><span class="btn-label"><i class="fa fa-trash fa-lg fa-fw"></i></span> Hapus</button>
              <div class="or"></div>
              <button type="button" class="btn btn-labeled btn-warning" data-dismiss="modal" aria-hidden="true"><span class="btn-label"><i class="fa fa-sign-out fa-lg fa-fw"></i></span> Tutup</button>
            </div>
          </div>
        </div>
      </div>
    </div>