<div id="ModalSubKegiatan" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form name="frmModalSubKegiatan" class="form-horizontal" role="form" autocomplete='off' action="" method="post"
          onsubmit="return false;">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" id="id_subkegiatan_pd" name="id_subkegiatan_pd">
          <input type="hidden" id="id_kegiatan_pd_subkeg" name="id_kegiatan_pd_subkeg">
          <input type="hidden" id="tahun_anggaran_subkeg" name="tahun_anggaran_subkeg">
          <input type="hidden" id="id_unit_subkeg" name="id_unit_subkeg">
          <div class="form-group hidden">
            <label class="control-label col-sm-3" for="id">No Urut :</label>
            <div class="col-sm-2">
              <input type="text" class="form-control nomor" name="no_urut_subkeg" id="no_urut_subkeg" disabled>
            </div>
          </div>
          <div class="form-group lblSubKegiatan hidden">
            <label class="control-label col-sm-3" for="title">Uraian Sub Kegiatan Renstra:</label>
            <div class="col-sm-8">
              <textarea type="name" class="form-control" id="ur_kegiatan_renstra" rows="3" disabled></textarea>
            </div>
            <input type="hidden" id="id_kegiatan_renstra_subkeg" name="id_kegiatan_renstra_subkeg">
            <input type="hidden" id="id_subkegiatan_renstra_subkeg" name="id_subkegiatan_renstra_subkeg">
            <span class="btn btn-sm btn-primary btnCariSubKegiatanRenstra" id="btnCariSubKegiatanRenstra"
              name="btnCariSubKegiatanRenstra"><i class="fa fa-search fa-fw fa-lg"></i></span>
          </div>
          <div class="form-group urSubKegiatanRef">
            <label class="control-label col-sm-3" for="title">Uraian Sub Kegiatan Referensi:</label>
            <div class="col-sm-8">
              <textarea type="name" class="form-control" id="ur_subkegiatan_ref" rows="3" disabled></textarea>
            </div>
            <input type="hidden" id="id_subkegiatan_ref" name="id_subkegiatan_ref">
            <span class="btn btn-sm btn-primary btnCariSubKegiatanRef" id="btnCariSubKegiatanRef"
              name="btnCariKegiatanRef"><i class="fa fa-search fa-fw fa-lg"></i></span>
          </div>
          <div class="form-group" id="idStatusSubKeg">
            <label for="status_pelaksanaan_subkeg" class="col-sm-3 control-label" align='left'>Status Pelaksanaan
              :</label>
            <div class="col-sm-8" id="myRadio">
              <label class="radio-inline">
                <input type="radio" class="sp_subkeg" name="status_pelaksanaan_subkeg" id="status_pelaksanaan_subkeg"
                  value="0">Tepat Waktu
              </label>
              <label class="radio-inline hidden">
                <input type="radio" class="sp_subkeg" name="status_pelaksanaan_subkeg" id="status_pelaksanaan_subkeg"
                  value="1">Dimajukan
              </label>
              <label class="radio-inline">
                <input type="radio" class="sp_subkeg" name="status_pelaksanaan_subkeg" id="status_pelaksanaan_subkeg"
                  value="2">Ditunda
              </label>
              <label class="radio-inline">
                <input type="radio" class="sp_subkeg" name="status_pelaksanaan_subkeg" id="status_pelaksanaan_subkeg"
                  value="3">Dibatalkan
              </label>
              <label class="radio-inline hidden" id="sp_subkeg4">
                <input type="radio" class="sp_subkeg" name="status_pelaksanaan_subkeg" id="status_pelaksanaan_subkeg"
                  value="4">Baru
              </label>
            </div>
          </div>
          <div class="form-group KetPelaksanaan_subkeg">
            <label for="keterangan_status_subkeg" class="col-sm-3 control-label" align='left'>Keterangan Pelaksanaan
              :</label>
            <div class="col-sm-8">
              <textarea type="text" class="form-control keterangan_status_subkeg" name="keterangan_status_subkeg"
                id="keterangan_status_subkeg" rows="3" disabled></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="keterangan_status_subkeg" class="col-sm-3 control-label" align='left'>Waktu Pelaksanaan
              :</label>
            <div class="col-sm-3">
              <select class="form-control select2 waktu_mulai" name="waktu_mulai" id="waktu_mulai">
                <option value="-1">--Pilih Bulan Mulai--</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
              </select>
            </div>
            <label for="" class="col-sm-1 control-label" align='center'>s.d</label>
            <div class="col-sm-3">
              <select class="form-control select2 waktu_selesai" name="waktu_selesai" id="waktu_selesai">
                <option value="-1">--Pilih Bulan Selesai--</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-11">
              <table class="table table-striped table-bordered table-responsive">
                <thead>
                  <tr>
                    <td width="25%" style="text-align: center; vertical-align:middle;">
                      <label for="pagu_renstra" class="control-label" align='left'
                        style="text-align: center; vertical-align:middle;">Pagu RKPD</label>
                    </td>
                    <td width="25%" style="text-align: center; vertical-align:middle;">
                      <label for="pagu_renja_kegiatan" class="control-label" align='left'
                        style="text-align: center; vertical-align:middle;">Pagu PPAS</label>
                    </td>
                    <td width="25%" style="text-align: center; vertical-align:middle;">
                      <label for="pagu_selanjutnya" class="control-label" align='left'
                        style="text-align: center; vertical-align:middle;">Pagu Tahun selanjutnya</label>
                    </td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td style="text-align: center; vertical-align:middle;"><input type="text"
                        class="form-control number" id="pagu_rkpd_subkeg" name="pagu_rkpd_subkeg"
                        style="text-align: right; vertical-align:middle" disabled></td>

                    <td style="text-align: center; vertical-align:middle;"><input type="text"
                        class="form-control number" id="pagu_anggaran_subkeg" name="pagu_anggaran_subkeg"
                        style="text-align: right; vertical-align:middle"></td>

                    <td style="text-align: center; vertical-align:middle;"><input type="text"
                        class="form-control number" id="pagu_plus_subkeg" name="pagu_plus_subkeg"
                        style="text-align: right; vertical-align:middle"></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="form-group lblKelompokSasaranSubkeg">
            <label class="control-label col-sm-3" for="title">Uraian Kelompok Sasaran:</label>
            <div class="col-sm-8">
              <textarea type="name" class="form-control" id="ur_kelompok_sasaran_subkeg" rows="3"></textarea>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-sm-2 text-left idbtnHapusSubKeg">
            <button id="btnHapusSubKegRenja" class="btn btn-sm btn-danger btn-labeled"><span class="btn-label"><i
                  class="fa fa-trash fa-fw fa-lg"></i></span>Hapus</button>
          </div>
          <div class="col-sm-10 text-right">
            <div class="ui-group-buttons">
              <button type="button" id="btnSubKegiatan" class="btn btn-sm btn-success btnSubKegiatan btn-labeled"
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

<div id="HapusSubKegRenja" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-xs">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Hapus Data Sub Kegiatan SKPD</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" id="id_subkeg_hapus" name="id_subkeg_hapus">
        <div class="alert alert-danger deleteContent">
          <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border" style="color:red;" aria-hidden="true"></i>
          Yakin akan menghapus Kegiatan : <strong><span id="ur_subkeg_hapus"></span></strong> ?
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
              <button type="button" id="btnDelSubKegRenja" class="btn btn-sm btn-danger btn-labeled"
                data-dismiss="modal">
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