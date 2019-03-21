<div id="cariProgramRef" class="modal fade" role="dialog" tabindex="-1" data-focus-on="input:first" data-backdrop="static" >
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
            <div class="form-group">
              <label class="control-label col-sm-2" for="kd_bidang_cari">Bidang :</label>
              <div class="col-sm-8">
                <select type="text" class="form-control kd_bidang_cari" id="kd_bidang_cari" name="kd_bidang_cari"></select>
              </div>
            </div>
           <div class="form-group">
             <div class="col-sm-12">
                <table id='tblCariProgramRef' class="table display table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                          <tr>
                            <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                            <th width="10%" style="text-align: center; vertical-align:middle">Kode Program</th>
                            <th style="text-align: center; vertical-align:middle">Uraian Program</th>
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
                    <div class="col-sm-2 text-left">
                    </div>
                    <div class="col-sm-10 text-right">
                        <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="fa fa-sign-out fa-fw fa-lg"></i></span>Tutup</button>
                    </div>
                </div>
              </div> 
        </div>
      </div>
    </div>