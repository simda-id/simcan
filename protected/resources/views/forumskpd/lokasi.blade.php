
<div id="ModalLokasi" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form name="frmModalLokasi" class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" id="id_pelaksana_lokasi" name="id_pelaksana_lokasi">
            <input type="hidden" id="id_lokasi_forum" name="id_lokasi_forum">
            <input type="hidden" id="tahun_forum_lokasi" name="tahun_forum_lokasi">
            <div class="form-group">
              <label class="control-label col-sm-3" for="id">No Urut :</label>
              <div class="col-sm-3">
                <input type="text" class="form-control nomor" id="no_urut_lokasi">
              </div>
              <div class="col-sm-3 chkLokasi">
                    <label class="checkbox-inline">
                    <input class="checkLokasi" type="checkbox" name="checkLokasi" id="checkLokasi" value="1"> Telah Direviu</label>
              </div>
            </div>
            <div class="form-group">
                    <label class="control-label col-sm-3" for="sumber_data_lokasi">Sumber Usulan :</label>
                    <div class="col-sm-5">
                        <select type="text" class="form-control" id="sumber_data_lokasi" name="sumber_data_lokasi" disabled>
                          <option value="0">Renja SKPD</option>
                          <option value="1">Musrenbang Desa</option>
                          <option value="2">Musrenbang Kecamatan</option>
                          <option value="3">Pokir Dewan</option>
                          <option value="4">Forum Perangkat Daerah</option>
                        </select>
                    {{-- </div> --}}
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="title">Lokasi Aktivitas :</label>
                <div class="col-sm-8">
                  <div class="input-group">
                    <input type="hidden" id="id_lokasi" name="id_lokasi">
                    <input type="hidden" id="jenis_lokasi" name="jenis_lokasi">
                    <input type="name" class="form-control" id="nm_lokasi" rows="2" disabled>
                    <div class="input-group-btn">
                      <btn class="btn btn-primary btnCariLokasi" id="btnCariLokasi" name="btnCariLokasi"><i class="fa fa-search fa-fw fa-lg"></i></btn>
                    </div>
                  </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="title">Lokasi Teknis Aktivitas :</label>
                <div class="col-sm-8">
                  <div class="input-group">
                    <input type="hidden" id="id_lokasi_teknis" name="id_lokasi_teknis">
                    <input type="name" class="form-control" id="nm_lokasi_teknis" rows="2" disabled>
                    <div class="input-group-btn">
                      <btn class="btn btn-primary btnCariLokasiTeknis" id="btnCariLokasiTeknis" name="btnCariLokasiTeknis"><i class="fa fa-search fa-fw fa-lg"></i></btn>
                    </div>
                  </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="title">Keterangan Lokasi :</label>
                <div class="col-sm-8">
                      <textarea type="name" class="form-control" id="uraian_lokasi" rows="3"></textarea>
                </div>
            </div>
            <div class="col-sm-12">
                    <table class="table table-bordered table-condensed">
                        <thead style="background-color: #428bca; color: #fff">
                          <tr>
                            <td rowspan="2" width="5%" style="text-align: center; vertical-align:middle;">Nomor</td>
                            <td colspan="2"  width="65%" style="text-align: center; vertical-align:middle;">Volume</td>
                            <td rowspan="2" width="30%" style="text-align: center; vertical-align:middle;">Satuan</td>
                          </tr>
                          <tr>
                            <td width="30%" style="text-align: center; vertical-align:middle;">Sebelumnya</td>
                            <td width="30%" style="text-align: center; vertical-align:middle;">Forum</td>
                          </tr>
                        </thead>
                        <tbody style="background-color: #fff">
                          <tr>
                              <td width="5%" style="text-align: center; vertical-align:top;">
                                <label class="control-label" style="text-align: center; vertical-align:top;">1</label>
                              </td>
                              <td width="30%" style="text-align: center; vertical-align:top;">
                                <input type="text" class="form-control number" id="volume_usulan_1" name="volume_usulan_1" style="text-align: right; vertical-align:top;" disabled>
                              </td>                          
                              <td width="30%" style="text-align: center; vertical-align:top;">
                                <input type="text" class="form-control number" id="volume_1" name="volume_1" style="text-align: right; vertical-align:top;"> 
                              </td>
                              <td width="30%" style="text-align: center; vertical-align:top;">
                                <label class="radio">
                                  <select type="text" class="form-control" id="id_satuan_1" name="id_satuan_1" disabled></select>
                                </label>   
                              </td>
                          </tr>
                          <tr>
                              <td width="5%" style="text-align: center; vertical-align:top;">
                                <label class="control-label" style="text-align: center; vertical-align:top;">2</label>
                              </td>
                              <td width="30%" style="text-align: center; vertical-align:top;">
                                <input type="text" class="form-control number" id="volume_usulan_2" name="volume_usulan_2" style="text-align: right; vertical-align:top;" disabled>
                              </td>                          
                              <td width="30%" style="text-align: center; vertical-align:top;">
                                <input type="text" class="form-control number" id="volume_2" name="volume_2" style="text-align: right; vertical-align:top;"> 
                              </td>
                              <td width="30%" style="text-align: center; vertical-align:top;" disabled>
                                <label class="radio">
                                  <select type="text" class="form-control" id="id_satuan_2" name="id_satuan_2" disabled></select>
                                </label>   
                              </td>
                          </tr>
                        </tbody>
                    </table>
                </div>
              <div class="form-group" id="idStatusPelaksanaanLokasi">
                  <label for="status_pelaksanaan_lokasi" class="col-sm-3 control-label" align='left'>Status Pelaksanaan :</label>
                  <div class="col-sm-8" id="myRadio">
                      <label class="radio-inline">
                        <input type="radio" class="sp_lokasi" name="status_pelaksanaan_lokasi" id="status_pelaksanaan_lokasi" value="0">Tanpa Perubahan
                      </label>
                      <label class="radio-inline">
                        <input type="radio" class="sp_lokasi" name="status_pelaksanaan_lokasi" id="status_pelaksanaan_lokasi" value="1">Dengan Perubahan
                      </label>
                      <label class="radio-inline">
                        <input type="radio" class="sp_lokasi" name="status_pelaksanaan_lokasi" id="status_pelaksanaan_lokasi" value="2">Digabungkan
                      </label>
                  </div>
                  <div class="col-sm-8 col-sm-offset-3" id="myRadio">                      
                      <label class="radio-inline">
                        <input type="radio" class="sp_lokasi" name="status_pelaksanaan_lokasi" id="status_pelaksanaan_lokasi" value="3">Tidak dilaksanakan
                      </label>
                      <label class="radio-inline">
                        <input type="radio" class="sp_lokasi" name="status_pelaksanaan_lokasi" id="status_pelaksanaan_lokasi" value="4">Diluarkewenangan
                      </label>
                      {{-- <label class="radio-inline">
                        <input type="radio" class="sp_lokasi" name="status_pelaksanaan_lokasi" id="status_pelaksanaan_lokasi" value="5">Non APBD
                      </label> --}}
                  </div>
                </div>
                <div class="form-group">
                  <label for="keterangan_status_lokasi" class="col-sm-3 control-label" align='left'>Keterangan Pelaksanaan :</label>
                  <div class="col-sm-8">
                    <textarea type="text" class="form-control" name="keterangan_status_lokasi" id="keterangan_status_lokasi" rows="3"></textarea>
                  </div>
                </div>
          </form>
        </div>
              <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusLokasi">
                        <button id="btnHapusLokasi" type="button" class="btn btn-sm btn-danger btn-labeled">
                            <span class="btn-label"><i class="fa fa-trash fa-fw fa-lg"></i></span>Hapus</button>
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button id="btnLokasi" type="button" class="btn btn-sm btn-success btn-labeled" data-dismiss="modal">
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
