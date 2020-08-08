<div id="ModalIndikatorSubKeg" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" id="id_indikator_subkegiatan" name="id_indikator_subkegiatan">
          <input type="hidden" id="id_subkeg_indikatorKeg" name="id_subkeg_indikatorKeg">
          <div class="form-group hidden">
            <label class="control-label col-sm-3" for="id">No Urut :</label>
            <div class="col-sm-3">
              <input type="text" class="form-control number nomor" id="no_urut_indikatorSubKeg" disabled>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="title">Uraian Indikator Sub Kegiatan:</label>
            <div class="col-sm-8">
              <textarea type="name" class="form-control" id="ur_indikatorSubKeg" rows="3" disabled></textarea>
            </div>
            <input type="hidden" id="kd_indikatorSubKeg" name="kd_indikatorSubKeg">
            <span class="btn btn-primary btnCariIndiSubKeg" id="btnCariIndiSubKeg" name="btnCariIndiSubKeg"><i
                class="fa fa-search fa-fw fa-lg"></i></span>
          </div>
          <div class="form-group hidden">
            <label class="control-label col-sm-3" for="title">Uraian Tolok Ukur:</label>
            <div class="col-sm-8">
              <textarea type="name" class="form-control" id="ur_tolokukur_Subkeg" rows="3" disabled></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="target_indikatorSubKeg_rkpd" class="col-sm-3 control-label" align='left'>Target Capaian RKPD
              :</label>
            <div class="col-sm-2">
              <input type="text" class="form-control number" id="target_indikatorSubKeg_rkpd"
                name="target_indikatorSubKeg_rkpd" disabled>
            </div>
            <label for="target_indikatorSubKeg_anggaran" class="col-sm-3 control-label" align='left'>Target Capaian PPAS
              :</label>
            <div class="col-sm-3">
              <input type="text" class="form-control number" id="target_indikatorSubKeg_anggaran"
                name="target_indikatorSubKeg_anggaran" required="required">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="id_satuan_output_subkeg">Satuan Indikator :</label>
            <div class="col-sm-8">
              <select type="text" class="form-control id_satuan_output_subkeg select2" id="id_satuan_output_subkeg"
                name="id_satuan_output_subkeg" disabled></select>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-sm-2 text-left idbtnHapusIndikatorSubKeg">
            <button type="button" class="btn btn-danger btnHapusIndikatorSubKeg btn-labeled">
              <span class="btn-label"><i class="fa fa-trash fa-fw fa-lg"></i></span>Hapus</button>
          </div>
          <div class="col-sm-10 text-right">
            <div class="ui-group-buttons">
              <button type="button" class="btn btn-success btnIndikatorSubKeg btn-labeled" data-dismiss="modal">
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