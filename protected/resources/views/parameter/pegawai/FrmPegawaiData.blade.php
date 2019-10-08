
<div id="ModalPegawai" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" >
    <div class="modal-dialog modal-xl"  >
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form id="frmModalPegawai" name="frmModalPegawai"  class="form-horizontal" autocomplete='off' action="" method="post" onsubmit="return false;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" class="form-control" name="id_pegawai" id="id_pegawai">
            <div class="form-group">
                <label for="nip_pegawai" class="col-sm-3 control-label" align='left'>NIP</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control nip" id="nip_pegawai_display" name="nip_pegawai_display" maxlength="18">
                  <input type="hidden" class="form-control" id="nip_pegawai" name="nip_pegawai">
                </div>
            </div> 
            <div class="form-group">
              <label for="nama_pegawai" class="col-sm-3 control-label" align='left'>Nama Pegawai</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" required="required">
              </div>
            </div>
            <div class="form-group">
                <label for="checkStatus" class="col-sm-3" align='left'>Status Pegawai</label>
                <div class="col-sm-2">
                  <label class="radio-inline">
                  <input class="flag_iku" type="radio" name="checkStatus" id="checkStatus" value="0"> Aktif</label>
                </div>
                <div class="col-sm-2">
                  <label class="radio-inline">
                  <input class="flag_iku" type="radio" name="checkStatus" id="checkStatus" value="1"> Tidak Aktif</label>
                </div>
            </div>
            
            <div id="divRiwayat">
            <ul class="nav nav-tabs" role="tablist">
              <li class="active"><a href="#pangkat" aria-controls="pangkat" role="tab" data-toggle="tab">Riwayat Pangkat</a></li>
              <li><a href="#unit" aria-controls="unit" role="tab" data-toggle="tab">Riwayat Unit</a></li>
            </ul>
  
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="pangkat"> 
                  <br>
                  <form name="" class="form-horizontal" role="form" autocomplete='off' action="" method="post">                    
                      <div class="form-group">
                        <div class="col-sm-9">
                            <button type="button" class="btn btn-labeled btn-success btnTambahPangkat">
                              <span class="btn-label"><i class="fa fa-plus fa-lg fa-fw"></i></span> Tambah Pangkat
                            </button>  
                        </div>
                      </div>
                  </form>
                <table id='tblRiwayatPangkat' class="table display table-striped compact table-bordered table-responsive" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                      <th width="15%" style="text-align: center; vertical-align:middle">T M T</th>
                      <th style="text-align: center; vertical-align:middle">Uraian Pangkat/Golongan</th>
                      <th width="50px" style="text-align: center; vertical-align:middle">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>        
                  </tbody>
              </table>
              </div>
              <div role="tabpanel" class="tab-pane" id="unit">
                  <br>
                  <form name="" class="form-horizontal" role="form" autocomplete='off' action="" method="post">                    
                      <div class="form-group">
                        <div class="col-sm-9">
                            <button type="button" class="btn btn-labeled btn-success btnTambahUnit">
                              <span class="btn-label"><i class="fa fa-plus fa-lg fa-fw"></i></span> Tambah Unit Jabatan
                            </button>  
                        </div>
                      </div>
                  </form>
                <table id='tblRiwayatUnit' class="table display compact table-striped table-bordered table-responsive" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                      <th width="15%" style="text-align: center; vertical-align:middle">T M T</th>
                      <th width="30%" style="text-align: center; vertical-align:middle">Unit</th>
                      <th style="text-align: center; vertical-align:middle">Jabatan</th>
                      <th width="50px" style="text-align: center; vertical-align:middle">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>        
                  </tbody>
              </table>
              </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <div class="row">
            <div class="col-sm-2 text-left">
              {{-- <button type="button" id="btnDelPegawai" class="btn btn-labeled btn-danger btnDelPegawai"><span class="btn-label"><i class="fa fa-trash-o fa-lg fa-fw"></i></span>Hapus</button> --}}
            </div>
            <div class="col-sm-10 text-right">
              <div class="ui-group-buttons">
                <button id="btnSimpanPegawai" type="button" class="btn btn-success btn-labeled btnSimpanPegawai" data-dismiss="modal">
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
  
  <div id="HapusPegawai" class="modal fade" role="dialog" tabindex="-1" data-focus-on="input:first" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
          <h4>Hapus Data Pegawai Pejabat Eselon</h4>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id_pegawai_hapus" name="id_pegawai_hapus">
            <div class="alert alert-danger">
              <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border text-danger" aria-hidden="true"></i>
                  Yakin akan menghapus Nama Pengawai : <strong><span class="nama_pegawai_hapus"></span></strong> ini  ?
              <br>
              <br>
              <br>
          </div>
          </div>
          <div class="modal-footer">
            <div class="ui-group-buttons">
            <button type="button" id="btnAksiDelPegawai" class="btn btn-labeled btn-danger btnAksiDelPegawai" data-dismiss="modal" ><span class="btn-label"><i class="fa fa-trash-o fa-lg fa-fw"></i></span> Hapus</button>
            <div class="or"></div>
            <button type="button" class="btn btn-labeled btn-warning" data-dismiss="modal" aria-hidden="true"><span class="btn-label"><i class="fa fa-sign-out fa-lg fa-fw"></i></span> Tutup</button>
            </div>
          </div>
      </div>
    </div>
  </div>