<div id="ModalBelanja" class="modal fade" role="dialog" data-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
              <form name="frmModalBelanja" class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="id_lokasi_belanja" name="id_lokasi_belanja">
                <input type="hidden" id="id_belanja_forum" name="id_belanja_forum">
                <input type="hidden" id="tahun_forum_belanja" name="tahun_forum_belanja">
                <input type="hidden" id="sumber_data_belanja" name="sumber_data_belanja">
                <div class="form-group">
                  <label class="control-label col-sm-3" for="id">No Urut :</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control nomor" name="no_urut_belanja" id="no_urut_belanja">
                  </div>
                  <div class="col-sm-3 chkBelanja">
                    <label class="checkbox-inline">
                    <input class="checkBelanja" type="checkbox" name="checkBelanja" id="checkBelanja" value="1"> Telah Direviu</label>
                  </div>
                </div>
                <div class="form-group hidden">
                    <label class="control-label col-sm-3" for="title">Aktivitas ASB :</label>
                    <input type="hidden" class="form-control" id="id_aktivitas_asb_belanja" name="id_aktivitas_asb_belanja" disabled="">
                    <input type="hidden" class="form-control" id="sumber_belanja" name="sumber_belanja" disabled="">
                    <div class="col-sm-8">
                      <textarea type="name" class="form-control" id="uraian_aktivitas_asb" name="uraian_aktivitas_asb" rows="3" disabled=""></textarea>
                    </div>
                </div> 
                <div class="form-group">
                    <label class="control-label col-sm-3" for="">Zona Wilayah SSH :</label>
                    <div class="col-sm-8">
                        <select type="text" class="form-control zona_ssh" id="zona_ssh" name="zona_ssh"></select>
                    </div>
                </div>               
                <div class="form-group">
                  <label for="id_item_ssh" class="col-sm-3 control-label" align='left'>Item SSH:</label>                  
                  <div class="col-sm-8">
                    <input type="hidden" class="form-control" id="id_item_ssh" name="id_item_ssh">
                    <input type="hidden" class="form-control" id="rekening_ssh" name="rekening_ssh" >
                    <div class="input-group">
                    <input type="text" class="form-control" id="ur_item_ssh" name="ur_item_ssh" disabled>
                     <div class="input-group-btn">
                      <button class="btn btn-primary btnCariSSH" id="btnCariSSH" name="btnCariSSH" data-toggle="modal" href="#"><i class="fa fa-search fa-fw fa-lg"></i></button>
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
                      <button class="btn btn-primary btnCariRekening" id="btnCariRekening" name="btnCariRekening" data-toggle="modal" href="#"><i class="fa fa-search fa-fw fa-lg"></i></button>
                    </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                <div class="col-sm-12">
                    <table class="table table-bordered table-responsive">
                        <thead style="background-color: #428bca; color: #fff">
                          <tr>
                            <td width="5%" style="text-align: center; vertical-align:middle;">Sumber</td>
                            <td width="25%" style="text-align: center; vertical-align:middle;">Volume 1</td>
                            <td width="25%" style="text-align: center; vertical-align:middle;">Volume 2</td>
                            <td width="20%" style="text-align: center; vertical-align:middle;">Harga Satuan</td>
                            <td width="25%" style="text-align: center; vertical-align:middle;">Jumlah Total</td>
                          </tr>
                        </thead>
                        <tbody style="background-color: #fff">
                          <tr>
                              <td rowspan="2" width="5%" style="text-align: center; vertical-align:middle;">Rancangan</td>
                              <td width="25%" style="text-align: left; vertical-align:middle;">
                                <input type="text" class="form-control number" id="volume1" name="volume1" disabled>
                              </td>
                          
                              <td width="25%" style="text-align: left; vertical-align:middle;">
                                <input type="text" class="form-control number" id="volume2" name="volume2" disabled>
                              </td>                          
                              <td rowspan="2" width="20%" style="text-align: left; vertical-align:middle;"><input type="text" class="form-control number" id="harga_satuan" name="harga_satuan" disabled></td>
                              <td rowspan="2" width="25%" style="text-align: left; vertical-align:middle;"><input type="text" class="form-control number" id="jumlah_belanja" name="jumlah_belanja" disabled></td>
                          </tr>
                          <tr>
                              <td width="25%" style="text-align: left; vertical-align:middle;">
                                <select type="text" class="form-control" id="id_satuan1" name="id_satuan1" disabled></select>
                              </td>
                          
                              <td width="25%" style="text-align: left; vertical-align:middle;">
                                <select type="text" class="form-control" id="id_satuan2" name="id_satuan2" disabled></select>
                              </td>
                          </tr>
                          <tr>
                              <td rowspan="2" width="5%" style="text-align: center; vertical-align:middle;">Musrenbang</td>
                              <td width="25%" style="text-align: left; vertical-align:top;">
                                <input type="text" class="form-control number" id="volume1_forum" name="volume1_forum">
                              </td>                          
                              <td width="25%" style="text-align: left; vertical-align:middle;">
                                <input type="text" class="form-control number" id="volume2_forum" name="volume2_forum">
                              </td>                          
                              <td rowspan="2" width="20%" style="text-align: left; vertical-align:middle;"><input type="text" class="form-control number" id="harga_satuan_forum" name="harga_satuan_forum" disabled></td>
                              <td rowspan="2" width="25%" style="text-align: left; vertical-align:middle;"><input type="text" class="form-control number" id="jumlah_belanja_forum" name="jumlah_belanja_forum" disabled></td>
                          </tr>
                          <tr>
                              <td width="25%" style="text-align: left; vertical-align:middle;">
                                <select type="text" class="form-control" id="id_satuan1_forum" name="id_satuan1_forum"></select>
                              </td>
                          
                              <td width="25%" style="text-align: left; vertical-align:middle;">
                                <select type="text" class="form-control" id="id_satuan2_forum" name="id_satuan2_forum"></select>
                              </td>
                          </tr>
                        </tbody>
                    </table>
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
                        <button type="button" id="btnBelanja" class="btn btn-sm btn-success btnBelanja btn-labeled" data-dismiss="modal">
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