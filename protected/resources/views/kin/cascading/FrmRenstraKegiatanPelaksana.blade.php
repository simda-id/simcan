
<div id="ModalKegiatanPelaksana" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg"  >
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form name="frmModalPelaksana" class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id_pelaksana" id="id_pelaksana">

            <div class="row">
            <div class="col-sm-2" style="text-align: center;">
              <i class="fa fa-map-marker fa-fw" style="font-size: 100px;color: #357EBD;"></i>
            </div>
            <div class="col-sm-10">
            <div class="form-group">
                <label for="pelaksana" class="col-sm-2 control-label" align='left'>Sub Unit Pelaksana :</label>
                <div class="col-sm-10">
                  <select class="form-control tahun" name="pelaksana" id="pelaksana">
                  
                  </select>
<!--                   <input type="text" class="form-control number" id="text_tahun" name="text_tahun" required="required" align='right' > -->
                </div>
              </div>
              
            
            </div>
            </div> 
        </form>
      </div>
        <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left">                        
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        {{-- <button type="button" class="btn btn-sm btn-success btnPelaksana btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i id="nmbtnPelaksana" class="glyphicon glyphicon-save"></i></span>Simpan</button>
                        <div class="or"></div> --}}
                        <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
      </div>
    </div>
  </div>
</div>