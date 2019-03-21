
 <div id="ModalCopyBelanja" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"> Copy Data Belanja dari Aktivitas Lain</h4>
        </div>
      <div class="modal-body">
          <form name="frmModalCopyBelanja" class="form-horizontal" role="form" autocomplete='off' action="" method="" >
              <div class="form-group">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="col-sm-12">
                <table id='tblCopyBelanja' class="table display compact table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                          <tr>
                            <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                            <th style="text-align: center; vertical-align:middle">Nama Aktivitas</th>
                            {{-- <th style="text-align: center; vertical-align:middle">Uraian Lokasi Pelaksanaan</th> --}}
                            <th width="15%" style="text-align: center; vertical-align:middle">Aksi</th>
                          </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
              </div>
              </div>
            </form>          
      </div>
      <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left"></div>
                    <div class="col-sm-10 text-right">
                        <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
                    </div>
                </div>
              </div>
      </div>
    </div>
  </div>