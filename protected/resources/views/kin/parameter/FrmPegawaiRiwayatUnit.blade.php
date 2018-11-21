
<div id="ModalRiwayatUnit" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" >
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form id="frmModalRiwayatUnit" name="frmModalRiwayatUnit"  class="form-horizontal" autocomplete='off' action="" method="post" onsubmit="return false;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" class="form-control" name="id_unit_pegawai" id="id_unit_pegawai">
            <input type="hidden" class="form-control" name="id_pegawai_riwayat_unit" id="id_pegawai_riwayat_unit">
            <div class="form-group">
              <label for="nama_pegawai_riwayat_unit" class="col-sm-3 control-label" align='left'>Nama Pegawai</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="nama_pegawai_riwayat_unit" name="nama_pegawai_riwayat_unit" readonly>
              </div>
            </div>             
            <div class="form-group">
                <label for="cb_unit_riwayat" class="col-sm-3 control-label" align='left'>Unit</label>
                <div class="col-sm-8">
                    <select class="form-control cb_unit_riwayat" name="cb_unit_riwayat" id="cb_unit_riwayat"></select>
                </div>
            </div>            
            <div class="form-group">
                <label for="checkLevelJabatan" class="col-sm-3 control-label" align='left'>Tingkat Jabatan Eselon</label>
                <div class="col-sm-9">
                    <div class="col-sm-4">
                        <label class="radio-inline">
                        <input class="checkLevelJabatan" type="radio" name="checkLevelJabatan" id="checkLevelJabatan" value="0"> Kepala Dinas/Badan/Sederajat</label>
                    </div>
                    <div class="col-sm-4">
                        <label class="radio-inline">
                        <input class="checkLevelJabatan" type="radio" name="checkLevelJabatan" id="checkLevelJabatan" value="1"> Kepala Bidang/Bagian/Sederajat</label>
                    </div>
                    <div class="col-sm-4">
                        <label class="radio-inline">
                        <input class="checkLevelJabatan" type="radio" name="checkLevelJabatan" id="checkLevelJabatan" value="2"> Kepala Seksi/SubBagian/Sederajat</label>
                    </div>
                </div>
            </div>            
            <div class="form-group ">
                <label for="cb_jabatan_riwayat_unit" class="col-sm-3 control-label" align='left'>Nama Jabatannya</label>
                <div class="col-sm-8">
                    <select class="form-control cb_jabatan_riwayat_unit" name="cb_jabatan_riwayat_unit" id="cb_jabatan_riwayat_unit"></select>
                </div>
            </div>
            <div class="form-group hidden">
                <label for="cb_jabatan_riwayat_unit" class="col-sm-3 control-label" align='left'></label>
                <div class="col-sm-8">
                    <textarea type="text" class="form-control" rows="3" id="nama_eselon3_text" name="nama_eselon3_text" required="required" readonly></textarea>
                </div>
            </div>
            <div class="form-group has-feedback">
                <label for="tmt_unit" class="col-sm-3 control-label" align='left'>T M T :</label>
                <input type="hidden" name="tmt_unit" id="tmt_unit">
                <div class="col-sm-4">
                    <input type="text" class="form-control datepicker" id="tmt_unit_x" name="tmt_unit_x" style="text-align: center;">
                    <i class="fa fa-calendar fa-fw fa-lg text-primary form-control-feedback"></i>              
                </div>
            </div>   
          </form>
        </div>
        <div class="modal-footer">
          <div class="row">
            <div class="col-sm-2 text-left">
              {{-- <button type="button" id="btnDelRiwayat" class="btn btn-labeled btn-danger btnDelRiwayat"><span class="btn-label"><i class="fa fa-trash-o fa-lg fa-fw"></i></span>Hapus</button> --}}
            </div>
            <div class="col-sm-10 text-right">
              <div class="ui-group-buttons">
                <button id="btnSimpanRiwayatUnit" type="button" class="btn btn-success btn-labeled btnSimpanRiwayatUnit" data-dismiss="modal">
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
  
  <div id="HapusRiwayat" class="modal fade" role="dialog" tabindex="-1" data-focus-on="input:first" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
          <h4>Hapus Data Riwayat Unit dan Jabatan</h4>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id_unit_pegawai_hapus" name="id_unit_pegawai_hapus">
            <div class="alert alert-danger">
              <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border text-danger" aria-hidden="true"></i>
                  Yakin akan menghapus Riwayat Kepangkatan Pengawai : <strong><span class="nama_unit_pegawai_hapus"></span></strong> ini  ?
              <br>
              <br>
              <br>
          </div>
          </div>
          <div class="modal-footer">
            <div class="ui-group-buttons">
            <button type="button" id="btnAksiDelRiwayatUnit" class="btn btn-labeled btn-danger btnAksiDelRiwayatUnit" data-dismiss="modal" ><span class="btn-label"><i class="fa fa-trash-o fa-lg fa-fw"></i></span> Hapus</button>
            <div class="or"></div>
            <button type="button" class="btn btn-labeled btn-warning" data-dismiss="modal" aria-hidden="true"><span class="btn-label"><i class="fa fa-sign-out fa-lg fa-fw"></i></span> Tutup</button>
            </div>
          </div>
      </div>
    </div>
  </div>