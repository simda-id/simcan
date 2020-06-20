<?php
  use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.parameterlayout')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <?php
        $this->title = 'Mapping Unit Perangkat Daerah Pmd-90';
        $breadcrumb = new Breadcrumb();
        $breadcrumb->homeUrl = 'parameter/dash';
        $breadcrumb->begin();
        $breadcrumb->add(['label' => $this->title]);
        $breadcrumb->end();
      ?>
    </div>
  </div>
  <div id="pesan"></div>
  <div id="prosesbar" class="lds-spinner">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-info">
        <div class="panel-heading">
          <p>
            <h2 class="panel-title">Mapping Unit Perangkat Daerah Pmd-90</h2>
          </p>
        </div>
        <div class="panel-body">
          <br>
          <div>
            <button id="btnCetakMapping" type="button" class="btnCetakMapping btn btn-labeled btn-sm btn-primary">
              <span class="btn-label"><i class="fa fa-print fa-fw fa-lg"></i></span>Cetak Hasil
              Mapping</button>
            <button id="btnCetakNonMapping" type="button" class="btnCetakNonMapping btn btn-labeled btn-sm btn-warning">
              <span class="btn-label"><i class="fa fa-print fa-fw fa-lg"></i></span>Cetak Yang Belum
              Mapping</button>
          </div>
          <br>
          <table id="tblUnitMapping" class="table table-striped table-bordered table-responsive compact" width="100%"
            cellspacing="0">
            <thead>
              <tr>
                <th width="5px" style="text-align: center; vertical-align:middle"></th>
                <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                <th width="10%" style="text-align: center; vertical-align:middle">Kode Unit 13</th>
                <th style="text-align: center; vertical-align:middle">Nama Unit Organisasi Perangkat Daerah 13</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<script id="details-subunit" type="text/x-handlebars-template">
  <table class="table table-striped table-bordered table-responsive compact details-table" id="subunit-@{{id_unit}}">
    <thead>
      <tr>
        <th width="10%" style="text-align: center; vertical-align:middle;">Aksi</th>
        <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
        <th width="15%" style="text-align: center; vertical-align:middle;">Kode Sub Unit 13</th>
        <th style="text-align: center; vertical-align:middle;">Nama Sub Unit 13</th>
        <th width="15%" style="text-align: center; vertical-align:middle;">Kode Sub Unit 90</th>
        <th style="text-align: center; vertical-align:middle;">Nama Sub Unit 90</th>
      </tr>
    </thead>
    <tbody></tbody>
  </table>
</script>

<!--Modal Tambah Mapping Unit-->
<div id="ModalMappingSub" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="">Data Mapping Perangkat Daerah Permendagri 90</h4>
      </div>
      <div class="modal-body">
        <form name="frmModalUnit" class="form-horizontal" role="form" autocomplete='off' action="" method="post"
          onsubmit="return false;">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="id_mapping_sub" id="id_mapping_sub">
          <input type="hidden" name="id_sub_unit_13" id="id_sub_unit_13">
          <input type="hidden" name="id_sub_unit_90" id="id_sub_unit_90">
          <table id="tblMapping" class="table table-striped table-bordered table-responsive compact" width="100%"
            cellspacing="0" cellpadding="0">
            <thead>
              <tr>
                <td width="10%" style="text-align: center; vertical-align:middle; font-weight: bold;">
                </td>
                <td width="45%" style="text-align: center; vertical-align:middle; font-weight: bold;">
                  Permendagri 13</td>
                <td width="45%" style="text-align: center; vertical-align:middle; font-weight: bold;">
                  Permendagri 90</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td width="10%" style="text-align: left; vertical-align:middle; font-weight: bold;">
                  Tahun Mapping</td>
                <td style="text-align: center; vertical-align:middle; font-weight: bold;">
                  <label id="tahun_mapping" align='left'>{{Session::get('tahun')}}</label>
                </td>
                <td style="text-align: center; vertical-align:middle; font-weight: bold;">
                </td>
              </tr>
              <tr>
                <td width="10%" style="text-align: left; vertical-align:middle; font-weight: bold;">
                  Unit OPD
                </td>
                <td width="45%" style="text-align: left; vertical-align:middle"><label id="ur_unit_13"
                    align='left'></label>
                </td>
                <td width="45%" style="text-align: left; vertical-align:middle"><label id="ur_unit_90"
                    align='left'></label>
                </td>
              </tr>
              <tr>
                <td width="10%" style="text-align: left; vertical-align:middle; font-weight: bold;">
                  Sub Unit OPD
                </td>
                <td width="45%" style="text-align: left; vertical-align:middle"><label id="ur_sub_unit_13"
                    align='left'></label>
                </td>
                <td width="45%" style="text-align: left; vertical-align:middle"><label id="ur_sub_unit_90"
                    align='left'></label>
                </td>
              </tr>
              <tr>
                <td width="10%" style="text-align: left; vertical-align:top; font-weight: bold;">Keterangan</td>
                <td colspan="2" style="text-align: left; vertical-align:middle"><textarea type="text"
                    class="form-control" name="keterangan_mapping" id="keterangan_mapping" rows="3"></textarea></td>
              </tr>
            </tbody>
          </table>
        </form>
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-sm-2 text-left">
            <button id="btnCariRef90" type="button" class="btnCariRef90 btn btn-labeled btn-sm btn-default">
              <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span> Cari Sub
              Unit 90</button>
          </div>
          <div class="col-sm-10 text-right">
            <div class="ui-group-buttons">
              <button type="button" id="btnSaveMapping" class="btn btn-sm btn-success btnSaveMapping btn-labeled"
                data-dismiss="modal">
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

<!--Modal Hapus -->
<div id="HapusMapping" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-xs">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <input type="hidden" id="id_unit_hapus" name="id_unit_hapus">
        <div class="alert alert-danger deleteContent">
          <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border" style="color:red;" aria-hidden="true"></i>
          <br>
          Yakin akan menghapus Mapping Unit OPD : <strong><span id="nm_unit_hapus"></span></strong>
          ini ?
          <br>
          <br>
        </div>
      </div>
      <div class="modal-footer">
        <div class="ui-group-buttons">
          <button type="button" class="btn btn-sm btn-danger btn-labeled btnDeleteMapping" id="btnDeleteMapping"
            data-dismiss="modal"><span class="btn-label"><i id="footer_action_button"
                class="fa fa-trash fa-fw fa-lg"></i></span>
            Hapus</button>
          <div class="or"></div>
          <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true"><span
              class="btn-label"><i class="fa fa-sign-out fa-fw fa-lg"></i></span>
            Tutup</button>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="CariSubUnit90" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="">Data Mapping Perangkat Daerah Permendagri 90</h4>
      </div>
      <div class="modal-body">
        <form name="frmModalUnit" class="form-horizontal" role="form" autocomplete='off' action="" method="post"
          onsubmit="return false;">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group">
            <label for="kd_unit" class="col-sm-3" align='left'>Unit OPD</label>
            <div class="col-sm-9">
              <select class="form-control id_unit_90 select2" name="id_unit_90" id="id_unit_90"></select>
            </div>
          </div>
          <table id="tblSubUnit" class="table table-striped table-bordered table-responsive compact" width="100%"
            cellspacing="0">
            <thead>
              <tr>
                <th width='10%' style="text-align: center; vertical-align:middle">Aksi</th>
                <th width='15%' style="text-align: center; vertical-align:middle">Kode Sub Unit</th>
                <th style="text-align: center; vertical-align:middle">Uraian Sub Unit</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </form>
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-sm-2 text-left">
          </div>
          <div class="col-sm-10 text-right">
            <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
              <span class="btn-label"><i class="fa fa-sign-out fa-fw fa-lg"></i></span>Tutup</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript" language="javascript" class="init"
  src="{{ asset('/protected/resources/views/90_parameter/js_sub_mapping.js')}}">
</script>
@endsection