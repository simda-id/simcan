
<div id="ModalRiwayat" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" >
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form id="frmModalRiwayat" name="frmModalRiwayat"  class="form-horizontal" autocomplete='off' action="" method="post" onsubmit="return false;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" class="form-control" name="id_pangkat" id="id_pangkat">
            <input type="hidden" class="form-control" name="id_pegawai_pangkat" id="id_pegawai_pangkat">
            <div class="form-group">
              <label for="nama_pegawai_pangkat" class="col-sm-3 control-label" align='left'>Nama Pegawai</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="nama_pegawai_pangkat" name="nama_pegawai_pangkat" readonly>
              </div>
            </div>         
            <div class="form-group">
                <label for="cb_golongan" class="col-sm-3 control-label" align='left'>Golongan</label>
                <div class="col-sm-8">
                    <select class="form-control golongan" name="cb_golongan" id="cb_golongan"></select>
                </div>
            </div>
            <div class="form-group has-feedback">
                <label for="tmt_pangkat" class="col-sm-3 control-label" align='left'>T M T :</label>
                <input type="hidden" name="tmt_pangkat" id="tmt_pangkat">
                <div class="col-sm-4">
                    <input type="text" class="form-control datepicker" id="tmt_pangkat_x" name="tmt_pangkat_x" style="text-align: center;">
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
                <button id="btnSimpanRiwayat" type="button" class="btn btn-success btn-labeled btnSimpanRiwayat" data-dismiss="modal">
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
          <h4>Hapus Data Riwayat Kepangkatan</h4>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id_pangkat_hapus" name="id_pangkat_hapus">
            <div class="alert alert-danger">
              <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border text-danger" aria-hidden="true"></i>
                  Yakin akan menghapus Riwayat Kepangkatan Pengawai : <strong><span class="nama_pangkat_hapus"></span></strong> ini  ?
              <br>
              <br>
              <br>
          </div>
          </div>
          <div class="modal-footer">
            <div class="ui-group-buttons">
            <button type="button" id="btnAksiDelRiwayat" class="btn btn-labeled btn-danger btnAksiDelRiwayat" data-dismiss="modal" ><span class="btn-label"><i class="fa fa-trash-o fa-lg fa-fw"></i></span> Hapus</button>
            <div class="or"></div>
            <button type="button" class="btn btn-labeled btn-warning" data-dismiss="modal" aria-hidden="true"><span class="btn-label"><i class="fa fa-sign-out fa-lg fa-fw"></i></span> Tutup</button>
            </div>
          </div>
      </div>
    </div>
  </div>