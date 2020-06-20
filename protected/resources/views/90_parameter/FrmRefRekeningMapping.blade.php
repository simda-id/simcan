<?php
  use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.parameterlayout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?php
        $this->title = 'Mapping Rekening 13 ke Rekening Pmd-90';
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
                        <h2 class="panel-title">Mapping Rekening 13 ke Rekening Pmd-90</h2>
                    </p>
                </div>
                <div class="panel-body">
                    <br>
                    <div>
                        <button id="btnCetakMapping" type="button"
                            class="btnCetakMapping btn btn-labeled btn-sm btn-primary">
                            <span class="btn-label"><i class="fa fa-print fa-fw fa-lg"></i></span>Cetak Hasil
                            Mapping</button>
                        <button id="btnCetakNonMapping" type="button"
                            class="btnCetakNonMapping btn btn-labeled btn-sm btn-warning">
                            <span class="btn-label"><i class="fa fa-print fa-fw fa-lg"></i></span>Cetak Yang Belum
                            Mapping</button>
                    </div>
                    <br>
                    <div class='tabs-x tabs-above tab-bordered tabs-krajee'>
                        <ul class="nav nav-tabs nav-justified" role="tablist">
                            <li class="active"><a href="#tabrek12" aria-controls="tabrek12" role="tab"
                                    data-toggle="tab">Akun -
                                    Golongan 13</a>
                            </li>
                            <li class="disabled"><a href="#tabrek3" aria-controls="tabrek3" role="tab-kv"
                                    data-toggle="tab">Jenis 13</a>
                            </li>
                            <li class="disabled"><a href="#tabrek4" aria-controls="tabrek4" role="tab-kv"
                                    data-toggle="tab">Obyek 13</a>
                            </li>
                            <li class="disabled"><a href="#tabrek5" aria-controls="tabrek5" role="tab-kv"
                                    data-toggle="tab">Rincian Obyek 13</a></li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="tabrek12">
                                <br>
                                <div class="col-md-12">
                                    <table id="tblAkun"
                                        class="table table-striped table-bordered table-responsive compact" width="100%"
                                        cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th width="5px" style="text-align: center; vertical-align:middle"></th>
                                                <th width="10%" style="text-align: center; vertical-align:middle">Kode
                                                    Akun</th>
                                                <th style="text-align: center; vertical-align:middle">Nama Akun Rekening
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade in" id="tabrek3">
                                <br>
                                <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-responsive compact">
                                            <tbody>
                                                <tr class="backRek2">
                                                    <td width="20%" style="text-align: left; vertical-align:top;">Akun
                                                    </td>
                                                    <td style="text-align: left; vertical-align:top;"><label
                                                            id="ur_akun_rek3" align='left'></label>
                                                    </td>
                                                </tr>
                                                <tr class="backRek2">
                                                    <td width="20%" style="text-align: left; vertical-align:top;">
                                                        Golongan
                                                    </td>
                                                    <td style="text-align: left; vertical-align:top;"><label
                                                            id="ur_gol_rek3" align='left'></label>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                                <table id="tblJenis" class="table table-striped table-bordered table-responsive compact"
                                    width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width='15%' style="text-align: center; vertical-align:middle">Kode
                                                Jenis</th>
                                            <th style="text-align: center; vertical-align:middle">Nama Jenis Rekening
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <div role="tabpanel" class="tab-pane fade in" id="tabrek4">
                                <br>
                                <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-responsive compact">
                                            <tbody>
                                                <tr class="backRek2">
                                                    <td width="20%" style="text-align: left; vertical-align:top;">Akun
                                                    </td>
                                                    <td style="text-align: left; vertical-align:top;"><label
                                                            id="ur_akun_rek4" align='left'></label></td>
                                                </tr>
                                                <tr class="backRek2">
                                                    <td width="20%" style="text-align: left; vertical-align:top;">
                                                        Golongan
                                                    </td>
                                                    <td style="text-align: left; vertical-align:top;"><label
                                                            id="ur_gol_rek4" align='left'></label></td>
                                                </tr>
                                                <tr class="backRek3">
                                                    <td width="20%" style="text-align: left; vertical-align:top;">
                                                        Jenis</td>
                                                    <td style="text-align: left; vertical-align:top;"><label
                                                            id="ur_jenis_rek4" align='left'></label>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                                <table id="tblObyek" class="table table-striped table-bordered table-responsive compact"
                                    width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width='15%' style="text-align: center; vertical-align:middle">Kode
                                                Obyek</th>
                                            <th style="text-align: center; vertical-align:middle">Nama Obyek Rekening
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <div role="tabpanel" class="tab-pane fade in" id="tabrek5">
                                <br>
                                <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-responsive compact">
                                            <tbody>
                                                <tr class="backRek2">
                                                    <td width="20%" style="text-align: left; vertical-align:top;">Akun
                                                    </td>
                                                    <td style="text-align: left; vertical-align:top;"><label
                                                            id="ur_akun_rek5" align='left'></label></td>
                                                </tr>
                                                <tr class="backRek2">
                                                    <td width="20%" style="text-align: left; vertical-align:top;">
                                                        Golongan
                                                    </td>
                                                    <td style="text-align: left; vertical-align:top;"><label
                                                            id="ur_gol_rek5" align='left'></label></td>
                                                </tr>
                                                <tr class="backRek3">
                                                    <td width="20%" style="text-align: left; vertical-align:top;">
                                                        Jenis</td>
                                                    <td style="text-align: left; vertical-align:top;"><label
                                                            id="ur_jenis_rek5" align='left'></label>
                                                    </td>
                                                </tr>
                                                <tr class="backRek4">
                                                    <td width="20%" style="text-align: left; vertical-align:top;">
                                                        Obyek</td>
                                                    <td style="text-align: left; vertical-align:top;"><label
                                                            id="ur_obyek_rek5" align='left'></label>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                                <table id="tblRincian"
                                    class="table table-striped table-bordered table-responsive compact" width="100%"
                                    cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="10%" style="text-align: center; vertical-align:middle;">Aksi</th>
                                            <th width='15%' style="text-align: center; vertical-align:middle">Kode
                                                Rincian Obyek 13</th>
                                            <th style="text-align: center; vertical-align:middle">Nama Rincian Obyek
                                                Rekening 13
                                            </th>
                                            <th width='15%' style="text-align: center; vertical-align:middle">Kode
                                                Rincian Obyek 90</th>
                                            <th style="text-align: center; vertical-align:middle">Nama Rincian Obyek
                                                Rekening 90
                                            </th>
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
    </div>
</div>

<script id="details-golongan" type="text/x-handlebars-template">
    <table class="table table-striped table-bordered table-responsive compact details-table" id="golongan-@{{kd_rek_1}}">
<thead>
    <tr>
        <th width="10%" style="text-align: center; vertical-align:middle;">Kode Golongan</th>
        <th style="text-align: center; vertical-align:middle;">Nama Golongan Rekening</th>
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
                <h4 class="">Data Mapping Rekening 13 - 90</h4>
            </div>
            <div class="modal-body">
                <form name="frmModalUnit" class="form-horizontal" role="form" autocomplete='off' action="" method="post"
                    onsubmit="return false;">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id_mapping_sub" id="id_mapping_sub">
                    <input type="hidden" name="id_rekening_13" id="id_rekening_13">
                    <input type="hidden" name="id_rekening_90" id="id_rekening_90">
                    <table id="tblMapping" class="table table-striped table-bordered table-responsive compact"
                        width="100%" cellspacing="0" cellpadding="0">
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
                                    Akun
                                </td>
                                <td width="45%" style="text-align: left; vertical-align:middle"><label id="ur_akun_13"
                                        align='left'></label></td>
                                <td width="45%" style="text-align: left; vertical-align:middle"><label id="ur_akun_90"
                                        align='left'></label></td>
                            </tr>
                            <tr>
                                <td width="10%" style="text-align: left; vertical-align:middle; font-weight: bold;">
                                    Golongan
                                </td>
                                <td width="45%" style="text-align: left; vertical-align:middle"><label
                                        id="ur_golongan_13" align='left'></label></td>
                                <td width="45%" style="text-align: left; vertical-align:middle"><label
                                        id="ur_golongan_90" align='left'></label></td>
                            </tr>
                            <tr>
                                <td width="10%" style="text-align: left; vertical-align:middle; font-weight: bold;">
                                    Jenis
                                </td>
                                <td width="45%" style="text-align: left; vertical-align:middle"><label id="ur_jenis_13"
                                        align='left'></label></td>
                                <td width="45%" style="text-align: left; vertical-align:middle"><label id="ur_jenis_90"
                                        align='left'></label></td>
                            </tr>
                            <tr>
                                <td width="10%" style="text-align: left; vertical-align:middle; font-weight: bold;">
                                    Obyek
                                </td>
                                <td width="45%" style="text-align: left; vertical-align:middle"><label id="ur_obyek_13"
                                        align='left'></label></td>
                                <td width="45%" style="text-align: left; vertical-align:middle"><label id="ur_obyek_90"
                                        align='left'></label></td>
                            </tr>
                            <tr>
                                <td width="10%" style="text-align: left; vertical-align:middle; font-weight: bold;">
                                    Rincian Obyek
                                </td>
                                <td width="45%" style="text-align: left; vertical-align:middle"><label
                                        id="ur_rincian_13" align='left'></label></td>
                                <td width="45%" style="text-align: left; vertical-align:middle"><label
                                        id="ur_rincian_90" align='left'></label></td>
                            </tr>
                            <tr>
                                <td width="10%" style="text-align: left; vertical-align:middle; font-weight: bold;">Sub
                                    Rincian
                                </td>
                                <td width="45%" style="text-align: left; vertical-align:middle"></td>
                                <td width="45%" style="text-align: left; vertical-align:middle"><label
                                        id="ur_subrincian_90" align='left'></label>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left">
                        <button id="btnCariRef90" type="button" class="btnCariRef90 btn btn-labeled btn-sm btn-default">
                            <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Cari
                            Rekening 90</button>
                    </div>
                    <div class="col-sm-10 text-right">
                        <div class="ui-group-buttons">
                            <button type="button" id="btnSaveMapping"
                                class="btn btn-sm btn-success btnSaveMapping btn-labeled" data-dismiss="modal">
                                <span class="btn-label"><i class="fa fa-floppy-o fa-fw fa-lg"></i></span>Simpan</button>
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
                    <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border" style="color:red;"
                        aria-hidden="true"></i>
                    <br>
                    Yakin akan menghapus Mapping terhadap Sub Kegiatan : <strong><span
                            id="nm_unit_hapus"></span></strong>
                    ini ?
                    <br>
                    <br>
                </div>
            </div>
            <div class="modal-footer">
                <div class="ui-group-buttons">
                    <button type="button" class="btn btn-sm btn-danger btn-labeled btnDeleteMapping"
                        id="btnDeleteMapping" data-dismiss="modal"><span class="btn-label"><i id="footer_action_button"
                                class="fa fa-trash fa-fw fa-lg"></i></span>
                        Hapus</button>
                    <div class="or"></div>
                    <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal"
                        aria-hidden="true"><span class="btn-label"><i class="fa fa-sign-out fa-fw fa-lg"></i></span>
                        Tutup</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="cariReferensi90" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Kode Rekening Permendagri 90</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form" autocomplete='off' action="" method="post"
                    onsubmit="return false;">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="id_akun_90" class="col-sm-3" align='left'>Akun</label>
                        <div class="col-sm-9">
                            <select class="form-control id_akun_90 select2" name="id_akun_90" id="id_akun_90"></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="id_golongan_90" class="col-sm-3" align='left'>Golongan</label>
                        <div class="col-sm-9">
                            <select class="form-control id_golongan_90 select2" name="id_golongan_90"
                                id="id_golongan_90"></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="id_jenis_90" class="col-sm-3" align='left'>Jenis</label>
                        <div class="col-sm-9">
                            <select class="form-control id_jenis_90 select2" name="id_jenis_90"
                                id="id_jenis_90"></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="id_obyek_90" class="col-sm-3" align='left'>Obyek</label>
                        <div class="col-sm-9">
                            <select class="form-control id_obyek_90 select2" name="id_obyek_90"
                                id="id_obyek_90"></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="id_rincian_90" class="col-sm-3" align='left'>Rincian</label>
                        <div class="col-sm-9">
                            <select class="form-control id_rincian_90 select2" name="id_rincian_90"
                                id="id_rincian_90"></select>
                        </div>
                    </div>
                    <br>
                    <table id="tblSubRincianRef" class="table table-striped table-bordered table-responsive compact"
                        width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width='10%' style="text-align: center; vertical-align:middle">Aksi</th>
                                <th width='15%' style="text-align: center; vertical-align:middle">Kode Sub
                                    Rincian</th>
                                <th style="text-align: center; vertical-align:middle">Uraian Sub Rincian
                                </th>
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
                        <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal"
                            aria-hidden="true">
                            <span class="btn-label"><i class="fa fa-sign-out fa-fw fa-lg"></i></span>Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script id="details-golongan" type="text/x-handlebars-template">
    <table class="table table-striped table-bordered table-responsive compact details-table" id="golongan-@{{kd_rek_1}}">
        <thead>
            <tr>
                <th width="10%" style="text-align: center; vertical-align:middle;">Kode Golongan</th>
                <th style="text-align: center; vertical-align:middle;">Nama Golongan Rekening</th>
            </tr>
        </thead>
        <tbody></tbody>
        </table>
    </script>

@endsection

@section('scripts')
<script type="text/javascript" language="javascript" class="init"
    src="{{ asset('/protected/resources/views/90_parameter/js_rekening_mapping.js')}}">
</script>
@endsection