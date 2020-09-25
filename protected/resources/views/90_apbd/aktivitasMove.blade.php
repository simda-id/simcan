<div id="AktivitasMoveModal" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Daftar Pelaksana Sub Kegiatan</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="id_aktivitasMove" name="id_aktivitasMove">
                <form name="frmModalAktivitasMove" class="form-horizontal" role="form" autocomplete='off' action=""
                    method="post" onsubmit="return false;">
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="title">Program :</label>
                        <div class="col-sm-8">
                            <select class="form-control select2" id="progMove" name="progMove"></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="title">Kegiatan :</label>
                        <div class="col-sm-8">
                            <select class="form-control select2" id="kegMove" name="kegMove"></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="title">Sub Kegiatan :</label>
                        <div class="col-sm-8">
                            <select class="form-control select2" id="subkegMove" name="subkegMove"></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="title">Pelaksana :</label>
                        <div class="col-sm-8">
                            <select class="form-control select2" id="pelaksanaMove" name="pelaksanaMove"></select>
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
                            <button type="button" id="btnProsesMove"
                                class="btn btn-sm btn-success btnProsesMove btn-labeled" data-dismiss="modal">
                                <span class="btn-label"><i class="fa fa-floppy-o fa-fw fa-lg"></i></span>Proses
                                Pindah</button>
                            <div class="or"></div>
                            <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal"
                                aria-hidden="true">
                                <span class="btn-label"><i class="fa fa-sign-out fa-fw fa-lg"></i></span>Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>