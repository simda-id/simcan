<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app0')
@section('content')
  <div class="container-fluid">
        <div class="row">
        <div class="col-md-12">
            <?php
                $this->title = 'Zona SSH';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = '/';
                $breadcrumb->begin();
                $breadcrumb->add(['url' => '/modul0','label' => 'SSH dan ASB']);
                $breadcrumb->add(['url' => '/modul0','label' => 'SSH']);
                $breadcrumb->add(['label' => $this->title]);
                $breadcrumb->end();
            ?>          
        </div>
        </div>
        <div id="pesan"></div>
        <div id="proses" class="loader"></div>
        <div class="row">
            <div class="col-md-12">

        <div class="panel panel-success">
          <div class="panel-heading">
            <p class=""><h2 class="panel-title"><span href="#" data-toggle="popover" data-container="body" title="Zona SSH" data-trigger="hover" data-content="Untuk mengakomodir perbedaan harga antar lokasi. Misal: harga semen di kota dengan pegunungan berbeda">Zona Pemberlakuan SSH  
            </span></h2>
            </p>
          </div>

          <div class="panel-body">
            <div class="add">
              <p><a type="button" class="add-modal btn btn-labeled btn-success">
              <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah</a></p>
            </div>
            <br>
            <table id="tblzona" class="table display table-striped table-compact table-bordered table-responsive" >
                  <thead>
                      <tr>
                          <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                          <th witdh="25%" style="text-align: center; vertical-align:middle">Nama Zona SSH</th>
                          <th style="text-align: center; vertical-align:middle">Deskripsi Zona SSH</th>
                          <th width="80px" style="text-align: center; vertical-align:middle">Aksi</th>
                      </tr>
                  </thead>
                  <tbody></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>


<!--Modal Tambah -->
<div id="ModalZona" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg"  >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" autocomplete='off' action="{{ route('TambahZona') }}" method="post" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" id="id_zona" name="id_zona">
            <div class="form-group">
              <label for="keterangan_zona" class="col-sm-3 control-label" align='left'>Nama Zona SSH :</label>
              <div class="col-sm-8">
                <textarea type="text" class="form-control" rows="2" id="ket_zona" name="ket_zona" required="required" data-toggle="popover" data-container="body" title="Zona SSH" data-trigger="hover" data-content="Diisi dengan nama akan dibaca di sepanjang aplikasi"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="diskripsi_zona" class="col-sm-3 control-label" align='left'>Deskripsi Zona SSH :</label>
              <div class="col-sm-8">
                <textarea type="text" class="form-control" rows="5" id="diskripsi_zona" name="diskripsi_zona" required="required" data-toggle="popover" data-container="body" title="Zona SSH" data-trigger="hover" data-content="Diisi dengan penjelasan cakupan zona yang dimaksud: lokasi, jarak, dsb"></textarea>
              </div>
            </div>
        </form>
      </div>
        <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusBelanja">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-success btnAddZona btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i id="nmAddZona" class="fa fa-floppy-o fa-fw fa-lg"></i></span>Simpan</button>
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

  <!--Modal Hapus -->
<div id="HapusModal" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
            <div class=" alert alert-danger deleteContent">
                Yakin akan menghapus <strong><span class="title"></span></strong> ?
            <span class="hidden id_zona"></span>
          </div>
        </div>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusBelanja">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-danger actionBtn btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i id="footer_action_button" class="fa fa-trash fa-fw fa-lg"></i></span>Hapus</button>
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


@endsection

@section('scripts')
<script type="text/javascript" language="javascript" class="init" src="{{ asset('/protected/resources/views/ssh/zona/js_zona_ssh.js')}}">
</script>
@endsection
