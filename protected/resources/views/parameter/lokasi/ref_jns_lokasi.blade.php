<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.parameterlayout')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <?php
                $this->title = 'Lokasi';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = 'admin/parameter';
                $breadcrumb->begin();
                $breadcrumb->add(['label' => $this->title]);
                $breadcrumb->end();
            ?>
    </div>
  </div>
  <div id="pesan"></div>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-info">
        <div class="panel-heading">
          <p>
            <h2 class="panel-title"><i class="fa fa-map-marker fa-fw fa-lg text-success"></i> Referensi Jenis Lokasi Non
              Kewilayahan</h2>
          </p>
        </div>

        <div class="panel-body">
          <br>
          <form name="frmModalJenis" class="form-horizontal" role="form" autocomplete='off' action="" method=""
            onsubmit="return false;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <label class="control-label col-sm-2" for="id_item_perkada">Uraian Jenis :</label>
              <div class="col-sm-6">
                <div class="input-group">
                  <input type="text" class="form-control" id="uraian_jenis" name="uraian_jenis">
                  <div class="input-group-btn">
                    <button class="btn btn-success" id="btnJenis" name="btnJenis"><i
                        class="fa fa-plus fa-fw fa-lg"></i></button>
                  </div>
                </div>
              </div>
            </div>
          </form>
          <div class="">
            <table id='tblJenisLokasi' class="table display compact table-striped table-bordered table-responsive"
              cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                  <th style="text-align: center; vertical-align:middle">Uraian Jenis Lokasi</th>
                  <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
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
</div>

<!--Modal Hapus -->
<div id="HapusModal" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-xs">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <input type="hidden" id="id_modal_hapus" name="id_modal_hapus">
        <div class="alert alert-danger deleteContent">
          <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border" style="color:red;" aria-hidden="true"></i>
          <br>
          <span id="uraian_hapus"></span>
          <br>
          <br>
        </div>
      </div>
      <div class="modal-footer">
        <div class="ui-group-buttons">
          <button id="btnHapusModal" type="button" class="btn btn-sm btn-danger btn-labeled" data-dismiss="modal"><span
              class="btn-label"><i id="footer_action_button" class="glyphicon glyphicon-trash"></i></span>
            Hapus</button>
          <div class="or"></div>
          <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true"><span
              class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span> Tutup</button>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<div id="ModalProgress" class="modal fade modal-static" role="dialog" data-backdrop="static" role="dialog"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <div class="text-center">
          <h3><strong>Sedang proses...</strong></h3>
          <i class="fa fa-spinner fa-pulse fa-5x fa-fw" style="color:grey;"></i>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript" language="javascript" class="init"
  src="{{ asset('/protected/resources/views/parameter/lokasi/js_jns_lokasi.js')}}"></script>
@endsection