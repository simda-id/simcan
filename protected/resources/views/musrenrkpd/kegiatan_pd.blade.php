<div id="ModalKegiatan" class="modal fade" role="dialog" data-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
              <form name="frmModalKegiatan" class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="id_forum_skpd" name="id_forum_skpd">
                <input type="hidden" id="id_forum_program_kegrej" name="id_forum_program_kegrej">
                <input type="hidden" id="tahun_forum_kegrej" name="tahun_forum_kegrej">
                <input type="hidden" id="id_unit_kegrej" name="id_unit_kegrej">
                <input type="hidden" id="id_renja" name="id_renja">
                <input type="hidden" id="id_rkpd_renstra" name="id_rkpd_renstra">
                <input type="hidden" id="id_program_renstra" name="id_program_renstra">
                <div class="form-group">
                  <label class="control-label col-sm-3" for="id">No Urut :</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control nomor" name="no_urut_kegiatan" id="no_urut_kegiatan" disabled>
                  </div>
                  <div class="col-sm-3 chkKegiatan hidden">
                    <label class="checkbox-inline">
                    <input class="checkKegiatan" type="checkbox" name="checkKegiatan" id="checkKegiatan" value="1"> Telah Direviu</label>
                  </div>
                  </div>
                  <div class="form-group lblKegiatanRenja">
                    <label class="control-label col-sm-3" for="title">Uraian Kegiatan Renstra:</label>
                    <div class="col-sm-8">
                      <textarea type="name" class="form-control" id="ur_kegiatan_renstra" rows="3" disabled></textarea>
                    </div>
                    <input type="hidden" id="id_visi_renstra_keg" name="id_visi_renstra_keg">
                    <input type="hidden" id="id_misi_renstra_keg" name="id_misi_renstra_keg">
                    <input type="hidden" id="id_tujuan_renstra_keg" name="id_tujuan_renstra_keg">
                    <input type="hidden" id="id_sasaran_renstra_keg" name="id_sasaran_renstra_keg">
                    <input type="hidden" id="id_program_renstra_keg" name="id_program_renstra_keg">
                    <input type="hidden" id="id_kegiatan_renstra" name="id_kegiatan_renstra">
                    <span class="btn btn-sm btn-primary btnCariKegiatanRenstra" id="btnCariKegiatanRenstra" name="btnCariKegiatanRenstra"><i class="fa fa-search fa-fw fa-lg"></i></span>
                  </div>
                  <div class="form-group urKegiatanRef">
                    <label class="control-label col-sm-3" for="title">Uraian Kegiatan Referensi:</label>
                    <div class="col-sm-8">
                      <textarea type="name" class="form-control" id="ur_kegiatan_ref" rows="3" disabled></textarea>
                    </div>
                    <input type="hidden" id="id_kegiatan_ref" name="id_kegiatan_ref">
                    <span class="btn btn-sm btn-primary btnCariKegiatanRef" id="btnCariKegiatanRef" name="btnCariKegiatanRef"><i class="fa fa-search fa-fw fa-lg"></i></span>
                  </div>
                  <div class="form-group lblKegiatanRenja">
                    <label class="control-label col-sm-3" for="title">Uraian Kegiatan Rancangan:</label>
                    <div class="col-sm-8">
                      <textarea type="name" class="form-control" id="ur_kegiatan_forum" rows="3"></textarea>
                    </div>
                  </div>
                  <div class="form-group" id="idStatuskegrenja">
                  <label for="status_pelaksanaan_kegrenja" class="col-sm-3 control-label" align='left'>Status Pelaksanaan :</label>
                  <div class="col-sm-8" id="myRadio">
                      <label class="radio-inline">
                        <input type="radio" class="sp_kegrenja" name="status_pelaksanaan_kegrenja" id="status_pelaksanaan_kegrenja" value="0">Tepat Waktu
                      </label>
                      <label class="radio-inline hidden">
                        <input type="radio" class="sp_kegrenja" name="status_pelaksanaan_kegrenja" id="status_pelaksanaan_kegrenja" value="1">Dimajukan
                      </label>
                      <label class="radio-inline">
                        <input type="radio" class="sp_kegrenja" name="status_pelaksanaan_kegrenja" id="status_pelaksanaan_kegrenja" value="2">Ditunda
                      </label>
                      <label class="radio-inline">
                        <input type="radio" class="sp_kegrenja" name="status_pelaksanaan_kegrenja" id="status_pelaksanaan_kegrenja" value="3">Dibatalkan
                      </label>
                      <label class="radio-inline hidden" id="sp_kegrenja4">
                        <input type="radio" class="sp_kegrenja" name="status_pelaksanaan_kegrenja" id="status_pelaksanaan_kegrenja" value="4">Baru
                      </label>
                  </div>
                </div>
                <div class="form-group KetPelaksanaan_keg">
                  <label for="keterangan_status_kegiatan" class="col-sm-3 control-label" align='left'>Keterangan Pelaksanaan :</label>
                  <div class="col-sm-8">
                    <textarea type="text" class="form-control keterangan_status_kegiatan" name="keterangan_status_kegiatan" id="keterangan_status_kegiatan" rows="3" disabled></textarea>
                  </div>
                </div>
                <div class="form-group">
                <div class="col-sm-11">
                    <table class="table table-striped table-bordered table-responsive">
                        <thead>
                          <tr>
                            <td width="25%" style="text-align: center; vertical-align:middle;">
                              <label for="pagu_renstra" class="control-label" align='left' style="text-align: center; vertical-align:middle;">Uraian</label>
                            </td>
                            <td width="25%" style="text-align: center; vertical-align:middle;">
                              <label for="pagu_renstra" class="control-label" align='left' style="text-align: center; vertical-align:middle;">Pagu Renstra</label>
                            </td>
                            <td width="25%" style="text-align: center; vertical-align:middle;">
                              <label for="pagu_renja_kegiatan" class="control-label" align='left' style="text-align: center; vertical-align:middle;">Pagu Tahun ini</label>
                            </td>
                            <td width="25%" style="text-align: center; vertical-align:middle;">
                              <label for="pagu_selanjutnya" class="control-label" align='left' style="text-align: center; vertical-align:middle;">Pagu Tahun selanjutnya</label>
                            </td>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <td style="text-align: center; vertical-align:middle;">
                                <label for="pagu_renstra" class="control-label" align='left' style="text-align: center; vertical-align:middle;">Forum</label>
                              </td>
                              <td style="text-align: center; vertical-align:middle;"><input type="text" class="form-control number" id="pagu_renstra" name="pagu_renstra" style="text-align: right; vertical-align:middle" disabled ></td>
                          
                              <td style="text-align: center; vertical-align:middle;"><input type="text" class="form-control number" id="pagu_renja_kegiatan" name="pagu_renja_kegiatan" style="text-align: right; vertical-align:middle" disabled></td>
                          
                              <td style="text-align: center; vertical-align:middle;"><input type="text" class="form-control number" id="pagu_selanjutnya" name="pagu_selanjutnya" style="text-align: right; vertical-align:middle" disabled></td>
                          </tr>
                          <tr>
                              <td style="text-align: center; vertical-align:middle;">
                                <label for="pagu_renstra" class="control-label" align='left' style="text-align: center; vertical-align:middle;">Rancangan</label>
                              </td>
                              <td style="text-align: center; vertical-align:middle;"><input type="text" class="form-control number" id="pagu_renstra_forum" name="pagu_renstra_forum" style="text-align: right; vertical-align:middle" disabled></td>
                          
                              <td style="text-align: center; vertical-align:middle;"><input type="text" class="form-control number" id="pagu_renja_kegiatan_forum" name="pagu_renja_kegiatan_forum" style="text-align: right; vertical-align:middle"></td>
                          
                              <td style="text-align: center; vertical-align:middle;"><input type="text" class="form-control number" id="pagu_selanjutnya_forum" name="pagu_selanjutnya_forum" style="text-align: right; vertical-align:middle"></td>
                          </tr>
                        </tbody>
                    </table>
                </div>
                </div>
                <div class="form-group hidden">
                  <label for="pagu_tahun_kegiatan" class="col-sm-3 control-label" align='left'>Pagu Renja :</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control number" id="pagu_tahun_kegiatan" name="pagu_tahun_kegiatan" disabled >
                  </div>
                  <label for="pagu_forum" class="col-sm-2 control-label" align='left'>Pagu Rancangan :</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control number" id="pagu_forum" name="pagu_forum" >
                  </div>
                </div>
                <div class="form-group hidden">
                  <label for="pagu_musren" class="col-sm-3 control-label" align='left'>Pagu Musrenbang :</label>
                  <div class="col-sm-2">
                    <div class="input-group">
                      <input type="text" class="form-control number" id="persen_musren" name="persen_musren">
                      <span class="input-group-addon" text-align="center"><strong>%</strong></span>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <input type="text" class="form-control number" id="pagu_musren" name="pagu_musren" disabled >
                  </div>
                </div>
              </form>
            </div>
              <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusKeg">
                      <button id="btnHapusKegRenja" class="btn btn-sm btn-danger btn-labeled"><span class="btn-label"><i class="fa fa-trash fa-fw fa-lg"></i></span>Hapus</button>
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-sm btn-success btnKegiatan btn-labeled" data-dismiss="modal">
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

<div id="HapusKegRenja" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
            <h4>Hapus Data Kegiatan SKPD</h4>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id_forum_hapus" name="id_forum_hapus">
            <div class="alert alert-danger deleteContent">
              <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border"  style="color:red;" aria-hidden="true"></i>
                Yakin akan menghapus Kegiatan : <strong><span id="ur_kegrenja_hapus"></span></strong> ?
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
                        <button type="button" id="btnDelKegRenja" class="btn btn-sm btn-danger btn-labeled" data-dismiss="modal">
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