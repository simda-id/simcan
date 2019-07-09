{{-- Modal Pelaksana --}}
<div id="ModalPelaksana" class="modal fade" role="dialog" tabindex="-1" data-focus-on="input:first" data-backdrop="static">
<div class="modal-dialog modal-lg"  >
<div class="modal-content">
<div class="modal-header">
  <h3 class="modal-title" >Daftar Unit Pelaksana yang akan ditambahkan</h3>
</div>
<div class="modal-body">
<form class="form-horizontal" role="form" autocomplete='off' action="" onsubmit="return false;">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" id="id_urbid_pelaksana" name="id_urbid_pelaksana">
  <input type="hidden" id="thn_pelaksana" name="thn_pelaksana">
  <input type="hidden" id="no_pelaksana" name="no_pelaksana">
  <input type="hidden" id="id_pelaksana_rpjmd" name="id_pelaksana_rpjmd">
  <div class="form-group">
  <div class="col-sm-12">
    <table id='tblUnitPelaksana' class="table display compact table-striped table-bordered" width="100%">
        <thead>
              <tr>
                <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                <th width="85%" style="text-align: center; vertical-align:middle">Nama Unit</th>
                <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
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

{{-- Modal Hapus Pelaksana --}}
<div id="HapusUnitPelaksana" class="modal fade" role="dialog" tabindex="-1" data-focus-on="input:first" data-backdrop="static">
  <div class="modal-dialog modal-xs">
  <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title"></h4>
    </div>
    <div class="modal-body">
        <input type="hidden" id="id_pelaksana_hapus" name="id_pelaksana_hapus">
        <input type="hidden" id="no_urut_hapus" name="no_urut_hapus">
        <div class="alert alert-danger">
          <i class="fa fa-exclamation-triangle fa-2x fa-pull-left text-danger"  aria-hidden="true"></i>
            Yakin akan menghapus Unit Pelaksana : <strong><span id="ur_pelaksana_hapus"></span></strong> ?
      </div>
    </div>
      <div class="modal-footer">
        <div class="ui-group-buttons">
          <button type="button" class="btn btn-labeled btn-danger btnDelPelaksana" data-dismiss="modal" ><span class="btn-label"><i class="fa fa-trash fa-lg fa-fw"></i></span> Hapus</button>
            <div class="or"></div>
          <button type="button" class="btn btn-labeled btn-warning" data-dismiss="modal" aria-hidden="true"><span class="btn-label"><i class="fa fa-sign-out fa-lg fa-fw"></i></span> Tutup</button>
        </div>
      </div>
  </div>
  </div>
</div>