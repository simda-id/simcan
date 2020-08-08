<div id="ModalIndikatorKeg" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form name="frmEditIndikatorKeg" class="form-horizontal" role="form" autocomplete='off' action="" method="post"
          onsubmit="return false;">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" id="id_indikator_kegiatan_renja" name="id_indikator_kegiatan_renja">
          <input type="hidden" id="id_renja_indikatorKeg" name="id_renja_indikatorKeg">
          <div class="form-group">
            <label class="control-label col-sm-3" for="title">Uraian Indikator Kegiatan:</label>
            <div class="col-sm-8">
              <textarea type="name" class="form-control" id="ur_indikatorKeg_renja" rows="3" disabled></textarea>
            </div>
            <input type="hidden" id="kd_indikatorKeg_renja" name="kd_indikatorKeg_renja">
            <span class="btn btn-primary btnCariIndiKeg" id="btnCariIndiKeg" name="btnCariIndiKeg"><i
                class="fa fa-search fa-fw fa-lg"></i></span>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="title">Uraian Tolok Ukur Kegiatan:</label>
            <div class="col-sm-8">
              <textarea type="name" class="form-control" id="ur_tolokukur_keg" rows="3" disabled></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="target_indikatorKeg_renstra" class="col-sm-3 control-label" align='left'>Target Capaian Menurut
              Renstra :</label>
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
                      <input type="text" class="form-control number" id="target_indikatorKeg_renstra"
                        name="target_indikatorKeg_renstra" style="text-align: right; vertical-align:middle;" disabled>
                    </td>
                    <td style="text-align: center; vertical-align:middle;">
                      <input type="text" class="form-control number" id="target_indikatorKeg_apbd"
                        name="target_indikatorKeg_apbd" disabled style="text-align: right; vertical-align:middle;">
                    </td>
                    <td style="text-align: center; vertical-align:middle;">
                      <input type="text" class="form-control number" id="target_indikatorKeg_renja"
                        name="target_indikatorKeg_renja" style="text-align: right; vertical-align:middle;"
                        required="required">
                    </td>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="id_satuan_output_keg">Satuan Indikator :</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="id_satuan_output_keg" name="id_satuan_output_keg"
                style="text-align: center; vertical-align:middle;" disabled readonly>
            </div>
          </div>
          <div class="form-group" id="divStatusPenggunaanIndikatorKeg" hidden>
            <label for="status_pelaksanaan_inkeg" class="col-sm-3 control-label" align='left'>Status Penggunaan
              :</label>
            <div class="col-sm-8">
              <label class="radio-inline" data-placement="bottom" data-toggle="popover" data-html="true"
                data-container="body" title="RKPD" data-trigger="hover"
                data-content="Indikator digunakan untuk proses selanjutnya">
                <input type="radio" name="status_pelaksanaan_inkeg" id="status_pelaksanaan_inkeg" value="0">Digunakan
              </label>
              <label class="radio-inline" data-placement="bottom" data-toggle="popover" data-html="true"
                data-container="body" title="RKPD" data-trigger="hover"
                data-content="Indikator yang tersedia tidak digunakan atau dibatalkan penggunaannya">
                <input type="radio" name="status_pelaksanaan_inkeg" id="status_pelaksanaan_inkeg" value="1">Dibatalkan
              </label>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-sm-2 text-left idbtnHapusIndikatorKeg">
            <button type="button" class="btn btn-danger btnHapusIndikatorKeg btn-labeled">
              <span class="btn-label"><i class="fa fa-trash fa-fw fa-lg"></i></span>Hapus</button>
          </div>
          <div class="col-sm-10 text-right">
            <div class="ui-group-buttons">
              <button type="button" class="btn btn-success btnIndikatorKeg btn-labeled" data-dismiss="modal">
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