<div id="ModalIndikator" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form name="frmEditIndikator" class="form-horizontal" role="form" autocomplete='off' action="" method="post"
          onsubmit="return false;">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" id="id_indikator_rkpd" name="id_indikator_rkpd">
          <input type="hidden" id="id_rkpd_ranwal_indikator" name="id_rkpd_ranwal_indikator">
          <div class="form-group" hidden>
            <label class="control-label col-sm-3" for="id">No Urut :</label>
            <div class="col-sm-3">
              <input type="text" class="form-control number" id="no_urut_indikator" disabled>
            </div>
            <div class="col-sm-3 chkIndikator hidden">
              <label class="checkbox-inline">
                <input class="checkIndikator" type="checkbox" name="checkIndikator" id="checkIndikator" value="1"> Telah
                Direviu</label>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="title">Uraian Indikator Program RKPD:</label>
            <div class="col-sm-8">
              <textarea type="name" class="form-control" id="ur_indikator_rkpd" rows="3" disabled></textarea>
            </div>
            <input type="hidden" id="kd_indikator_rkpd" name="kd_indikator_rkpd">
            <span class="btn btn-sm btn-primary btnCariIndi" id="btnCariIndi" name="btnCariIndi"><i
                class="glyphicon glyphicon-search"></i></span>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="title">Uraian Tolok Ukur Program RKPD:</label>
            <div class="col-sm-8">
              <textarea type="name" class="form-control" id="ur_tolokukur_rkpd" rows="3" disabled></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="target_indikator_rpjmd" class="col-sm-3 control-label" align='left'>Target Capaian:</label>
            <div class="col-sm-8">
              <table class="table table-bordered table-responsive">
                <thead style="background-color: #428bca; color: #fff">
                  <tr>
                    <td style="text-align: center; vertical-align:middle;">RPJMD</td>
                    <td style="text-align: center; vertical-align:middle;">APBD</td>
                    <td style="text-align: center; vertical-align:middle;">RKPD</td>
                  </tr>
                </thead>
                <tbody style="background-color: #fff">
                  <tr>
                    <td style="text-align: center; vertical-align:middle;">
                      <input type="text" class="form-control number" id="target_indikator_rpjmd"
                        name="target_indikator_rpjmd" disabled style="text-align: right; vertical-align:middle;">
                    </td>
                    <td style="text-align: center; vertical-align:middle;">
                      <input type="text" class="form-control number" id="target_indikator_apbd"
                        name="target_indikator_apbd" disabled style="text-align: right; vertical-align:middle;">
                    </td>
                    <td style="text-align: center; vertical-align:middle;">
                      <input type="text" class="form-control number" id="target_indikator_rkpd"
                        name="target_indikator_rkpd" required="required"
                        style="text-align: right; vertical-align:middle;">
                    </td>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="id_satuan_output">Satuan Indikator :</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="id_satuan_output" name="id_satuan_output"
                style="text-align: center; vertical-align:middle;" disabled readonly>
            </div>
          </div>
          <div class="form-group" id="divStatusPenggunaanIndikator" hidden>
            <label for="status_pelaksanaan_indikator" class="col-sm-3 control-label" align='left'>Status Penggunaan
              :</label>
            <div class="col-sm-8">
              <label class="radio-inline" data-placement="bottom" data-toggle="popover" data-html="true"
                data-container="body" title="RKPD" data-trigger="hover"
                data-content="Indikator digunakan untuk proses selanjutnya">
                <input type="radio" name="status_pelaksanaan_indikator" id="status_pelaksanaan_indikator"
                  value="0">Digunakan
              </label>
              <label class="radio-inline" data-placement="bottom" data-toggle="popover" data-html="true"
                data-container="body" title="RKPD" data-trigger="hover"
                data-content="Indikator yang tersedia tidak digunakan atau dibatalkan penggunaannya">
                <input type="radio" name="status_pelaksanaan_indikator" id="status_pelaksanaan_indikator"
                  value="1">Dibatalkan
              </label>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-sm-2 text-left idbtnHapusIndikator">
            <button class="btn btn-sm btn-danger btnHapusIndikator"><span class="glyphicon glyphicon-trash"></span>
              Hapus</button>
          </div>
          <div class="col-sm-9 text-right">
            <div class="ui-group-buttons">
              <button type="button" class="btn btn-labeled btn-success btnIndikator" data-dismiss="modal"><span
                  class="btn-label"><i class="fa fa-floppy-o fa-lg fa-fw"></i></span> Simpan</button>
              <div class="or"></div>
              <button type="button" class="btn btn-labeled btn-warning" data-dismiss="modal" aria-hidden="true"><span
                  class="btn-label"><i class="fa fa-sign-out fa-lg fa-fw"></i></span> Tutup</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="HapusIndikator" class="modal fade" role="dialog" tabindex="-1" data-focus-on="input:first"
  data-backdrop="static">
  <div class="modal-dialog modal-xs">
    <div class="modal-content">
      <div class="modal-header">
        {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <input type="hidden" id="id_indikator_hapus" name="id_indikator_hapus">
        <div class="alert alert-danger">
          <i class="fa fa-exclamation-triangle fa-2x fa-pull-left text-danger" aria-hidden="true"></i>
          Yakin akan menghapus Indikator : <strong><span class="ur_indikator_rkpd_del"></span></strong> yang merupakan
          penambahan program baru ?
          {{-- <br>
                <br>
                <strong>Catatan : Penghapusan data ini mempengaruhi terhadap data turunannya yang ada ikut terhapus.....!!!!</strong> --}}
        </div>
      </div>
      <div class="modal-footer">
        <div class="ui-group-buttons">
          <button type="button" class="btn btn-labeled btn-danger btnDelIndikator" data-dismiss="modal"><span
              class="btn-labeled"><i class="fa fa-trash fa-lg fa-fw"></i></span> Hapus</button>
          <div class="or"></div>
          <button type="button" class="btn btn-labeled btn-warning" data-dismiss="modal" aria-hidden="true"><span
              class="btn-labeled"><i class="fa fa-sign-out fa-lg fa-fw"></i></span> Tutup</button>
        </div>
      </div>
    </div>
  </div>
</div>