<div id="ModalBelanja" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form name="frmModalBelanja" class="form-horizontal" role="form" autocomplete='off' action="" method="post"
          onsubmit="return false;">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" id="id_lokasi_belanja" name="id_lokasi_belanja">
          <input type="hidden" id="id_belanja_forum" name="id_belanja_forum">
          <input type="hidden" id="tahun_forum_belanja" name="tahun_forum_belanja">
          <input type="hidden" id="sumber_data_belanja" name="sumber_data_belanja">
          <div class="form-group">
            <label class="control-label col-sm-3" for="">Zona Wilayah SSH :</label>
            <div class="col-sm-4">
              <select type="text" class="form-control select2 zona_ssh" id="zona_ssh" name="zona_ssh"></select>
            </div>
          </div>
          <div class="form-group">
            <label for="id_item_ssh" class="col-sm-3 control-label" align='left'>Item SSH:</label>
            <div class="col-sm-8">
              <input type="hidden" class="form-control" id="id_item_ssh" name="id_item_ssh">
              <input type="hidden" class="form-control" id="rekening_ssh" name="rekening_ssh">
              <div class="input-group">
                <input type="text" class="form-control" id="ur_item_ssh" name="ur_item_ssh" disabled>
                <div class="input-group-btn">
                  <button class="btn btn-primary btnCariSSH" id="btnCariSSH" name="btnCariSSH" data-toggle="modal"
                    href="#"><i class="fa fa-search fa-fw fa-lg"></i></button>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="id_rekening" class="col-sm-3 control-label" align='left'>Kode Rekening :</label>
            <div class="col-sm-8">
              <input type="hidden" class="form-control" id="id_rekening" name="id_rekening" disabled>
              <div class="input-group">
                <input type="text" class="form-control" id="ur_rekening" name="ur_rekening" disabled>
                <div class="input-group-btn">
                  <button class="btn btn-primary btnCariRekening" id="btnCariRekening" name="btnCariRekening"
                    data-toggle="modal" href="#"><i class="fa fa-search fa-fw fa-lg"></i></button>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <table class="table table-bordered table-responsive">
                <thead style="background-color: #428bca; color: #fff">
                  <tr>
                    <td style="text-align: center; vertical-align:middle;">Sumber</td>
                    <td width="10px" style="text-align: center; vertical-align:middle;">N</otd>
                    <td width="20%" style="text-align: center; vertical-align:middle;">Volume</td>
                    <td width="15%" style="text-align: center; vertical-align:middle;">Satuan</td>
                    <td width="10%" style="text-align: center; vertical-align:middle;">Koefisien</td>
                    <td width="20%" style="text-align: center; vertical-align:middle;">Harga Satuan</td>
                    <td width="25%" style="text-align: center; vertical-align:middle;">Jumlah Total</td>
                  </tr>
                </thead>
                <tbody style="background-color: #fff">
                  <tr>
                    <td rowspan="2" style="text-align: center; vertical-align:middle;">APBD</td>
                    <td width="10px" style="text-align: center; vertical-align:middle;">1</td>
                    <td width="20%" style="text-align: left; vertical-align:middle;">
                      <input type="text" class="form-control number" id="volume_1_apbd_belanja"
                        name="volume_1_apbd_belanja" style="text-align: right; vertical-align:middle;" disabled>
                    </td>
                    <td width="15%" style="text-align: left; vertical-align:middle;">
                      <select type="text" class="form-control select2" id="id_satuan_1_apbd_belanja"
                        name="id_satuan_1_apbd_belanja" disabled></select>
                    </td>
                    <td rowspan="2" width="10%" style="text-align: left; vertical-align:middle;">
                      <input type="text" class="form-control number" id="koefisien_apbd" name="koefisien_apbd"
                        style="text-align: right; vertical-align:middle;" disabled>
                    </td>
                    <td rowspan="2" width="20%" style="text-align: left; vertical-align:middle;"><input type="text"
                        class="form-control number" id="harga_satuan_apbd" name="harga_satuan_apbd"
                        style="text-align: right; vertical-align:middle;" disabled></td>
                    <td rowspan="2" width="25%" style="text-align: left; vertical-align:middle;"><input type="text"
                        class="form-control number" id="jumlah_belanja_apbd" name="jumlah_belanja_apbd"
                        style="text-align: right; vertical-align:middle;" disabled></td>
                  </tr>
                  <tr>
                    <td width="10px" style="text-align: center; vertical-align:middle;">2</td>
                    <td width="20%" style="text-align: left; vertical-align:middle;">
                      <input type="text" class="form-control number" id="volume_2_apbd_belanja"
                        name="volume_2_apbd_belanja" style="text-align: right; vertical-align:middle;" disabled>
                    </td>
                    <td width="15%" style="text-align: left; vertical-align:middle;">
                      <select type="text" class="form-control select2" id="id_satuan_2_apbd_belanja"
                        name="id_satuan_2_apbd_belanja" disabled></select>
                    </td>
                  </tr>
                  <tr>
                    <td rowspan="2" style="text-align: center; vertical-align:middle;">RKPD</td>
                    <td width="10px" style="text-align: center; vertical-align:middle;">1</td>
                    <td width="20%" style="text-align: left; vertical-align:middle;">
                      <input type="text" class="form-control number" id="volume_1_rkpd_belanja"
                        name="volume_1_rkpd_belanja" style="text-align: right; vertical-align:middle;" disabled>
                    </td>
                    <td width="15%" style="text-align: left; vertical-align:middle;">
                      <select type="text" class="form-control select2" id="id_satuan_1_rkpd_belanja"
                        name="id_satuan_1_rkpd_belanja"></select>
                    </td>
                    <td rowspan="2" width="10%" style="text-align: left; vertical-align:middle;">
                      <input type="text" class="form-control number" id="koefisien_rkpd" name="koefisien_rkpd"
                        style="text-align: right; vertical-align:middle;" disabled>
                    </td>
                    <td rowspan="2" width="20%" style="text-align: left; vertical-align:middle;"><input type="text"
                        class="form-control number" id="harga_satuan_rkpd" name="harga_satuan_rkpd"
                        style="text-align: right; vertical-align:middle;" disabled></td>
                    <td rowspan="2" width="25%" style="text-align: left; vertical-align:middle;"><input type="text"
                        class="form-control number" id="jumlah_belanja_rkpd" name="jumlah_belanja_rkpd"
                        style="text-align: right; vertical-align:middle;" disabled></td>
                  </tr>
                  <tr>
                    <td width="10px" style="text-align: center; vertical-align:middle;">2</td>
                    <td width="20%" style="text-align: left; vertical-align:middle;">
                      <input type="text" class="form-control number" id="volume_2_rkpd_belanja"
                        name="volume_2_rkpd_belanja" style="text-align: right; vertical-align:middle;" disabled>
                    </td>
                    <td width="15%" style="text-align: left; vertical-align:middle;">
                      <select type="text" class="form-control select2" id="id_satuan_2_rkpd_belanja"
                        name="id_satuan_2_rkpd_belanja"></select>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="form-group" id="idStatusPelaksanaanBelanja">
            <label for="status_pelaksanaan_belanja" class="col-sm-3 control-label" align='left'>Status Pelaksanaan
              :</label>
            <div class="col-sm-8" id="myRadio">
              <label class="radio-inline">
                <input type="radio" class="status_pelaksanaan_belanja" name="status_pelaksanaan_belanja"
                  id="status_pelaksanaan_belanja" value="0">Dilaksanakan
              </label>
              <label class="radio-inline">
                <input type="radio" class="status_pelaksanaan_belanja" name="status_pelaksanaan_belanja"
                  id="status_pelaksanaan_belanja" value="1">Dibatalkan
              </label>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="title">Penjelasan Belanja Lainnya :</label>
            <div class="col-sm-8">
              <textarea type="name" class="form-control" id="uraian_belanja" name="uraian_belanja" rows="3"></textarea>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-sm-2 text-left idbtnHapusBelanja">
            <button type="button" id="btnHapusBelanja" class="btn btn-sm btn-danger btnHapusBelanja btn-labeled">
              <span class="btn-label"><i class="fa fa-trash fa-fw fa-lg"></i></span>Hapus</button>
          </div>
          <div class="col-sm-10 text-right">
            <div class="ui-group-buttons">
              <button type="button" id="btnBelanja" class="btn btn-sm btn-success btnBelanja btn-labeled"
                data-dismiss="modal">
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