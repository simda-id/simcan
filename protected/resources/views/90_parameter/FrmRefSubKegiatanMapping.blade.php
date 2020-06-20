<?php
  use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.parameterlayout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?php
        $this->title = 'Mapping Sub Kegiatan Pmd-90';
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
                        <h2 class="panel-title">Mapping Sub Kegiatan Pmd-90</h2>
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
                            <li class="active"><a href="#urusan" aria-controls="urusan" role="tab"
                                    data-toggle="tab">Urusan-Bidang 13</a>
                            </li>
                            <li class="disabled"><a href="#program" aria-controls="program" role="tab-kv"
                                    data-toggle="tab">Program 13</a></li>
                            <li class="disabled"><a href="#kegiatan" aria-controls="kegiatan" role="tab-kv"
                                    data-toggle="tab">Kegiatan 13</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="urusan">
                                <br>
                                <div class="col-md-12">
                                    <table id="tblUrusan"
                                        class="table table-striped table-bordered table-responsive compact" width="100%"
                                        cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th width="5px" style="text-align: center; vertical-align:middle"></th>
                                                <th width="10%" style="text-align: center; vertical-align:middle">Kode
                                                    Urusan</th>
                                                <th style="text-align: center; vertical-align:middle">Urusan / Bidang
                                                    Pemerintahan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade in" id="program">
                                <br>
                                <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-responsive compact">
                                            <tbody>
                                                <tr class="backBidang">
                                                    <td width="20%" style="text-align: left; vertical-align:top;">Urusan
                                                    </td>
                                                    <td style="text-align: left; vertical-align:top;"><label
                                                            id="ur_urusan_prog" align='left'></label>
                                                    </td>
                                                </tr>
                                                <tr class="backBidang">
                                                    <td width="20%" style="text-align: left; vertical-align:top;">Bidang
                                                    </td>
                                                    <td style="text-align: left; vertical-align:top;"><label
                                                            id="ur_bidang_prog" align='left'></label>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                                <table id="tblProgram"
                                    class="table table-striped table-bordered table-responsive compact" width="100%"
                                    cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width='10%' style="text-align: center; vertical-align:middle">Kode
                                                Program</th>
                                            <th style="text-align: center; vertical-align:middle">Uraian Program</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <div role="tabpanel" class="tab-pane fade in" id="kegiatan">
                                <br>
                                <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-responsive compact">
                                            <tbody>
                                                <tr class="backBidang">
                                                    <td width="20%" style="text-align: left; vertical-align:top;">Urusan
                                                    </td>
                                                    <td style="text-align: left; vertical-align:top;"><label
                                                            id="ur_urusan_keg" align='left'></label></td>
                                                </tr>
                                                <tr class="backBidang">
                                                    <td width="20%" style="text-align: left; vertical-align:top;">Bidang
                                                    </td>
                                                    <td style="text-align: left; vertical-align:top;"><label
                                                            id="ur_bidang_keg" align='left'></label></td>
                                                </tr>
                                                <tr class="backProgram">
                                                    <td width="20%" style="text-align: left; vertical-align:top;">
                                                        Program</td>
                                                    <td style="text-align: left; vertical-align:top;"><label
                                                            id="ur_program_keg" align='left'></label>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                                <table id="tblKegiatan"
                                    class="table table-striped table-bordered table-responsive compact" width="100%"
                                    cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="10%" style="text-align: center; vertical-align:middle;">Aksi</th>
                                            <th width='10%' style="text-align: center; vertical-align:middle">Kode
                                                Kegiatan 13</th>
                                            <th style="text-align: center; vertical-align:middle">Uraian Kegiatan 13
                                            </th>
                                            <th width='15%' style="text-align: center; vertical-align:middle">Kode
                                                Sub Kegiatan 90</th>
                                            <th style="text-align: center; vertical-align:middle">Uraian Sub Kegiatan 90
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

<script id="details-bidang" type="text/x-handlebars-template">
    <table class="table table-striped table-bordered table-responsive compact details-table" id="bidang-@{{kd_urusan}}">
    <thead>
        <tr>
            <th width="10%" style="text-align: center; vertical-align:middle;">Kode Bidang</th>
            <th style="text-align: center; vertical-align:middle;">Nama Bidang</th>
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
                <h4 class="">Data Mapping Program-Kegiatan-Sub Kegiatan Permendagri 90</h4>
            </div>
            <div class="modal-body">
                <form name="frmModalUnit" class="form-horizontal" role="form" autocomplete='off' action="" method="post"
                    onsubmit="return false;">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id_mapping_sub" id="id_mapping_sub">
                    <input type="hidden" name="id_kegiatan_13" id="id_kegiatan_13">
                    <input type="hidden" name="id_sub_kegiatan_90" id="id_sub_kegiatan_90">
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
                                    Urusan
                                </td>
                                <td width="45%" style="text-align: left; vertical-align:middle"><label id="ur_urusan_13"
                                        align='left'></label></td>
                                <td width="45%" style="text-align: left; vertical-align:middle"><label id="ur_urusan_90"
                                        align='left'></label></td>
                            </tr>
                            <tr>
                                <td width="10%" style="text-align: left; vertical-align:middle; font-weight: bold;">
                                    Bidang
                                </td>
                                <td width="45%" style="text-align: left; vertical-align:middle"><label id="ur_bidang_13"
                                        align='left'></label></td>
                                <td width="45%" style="text-align: left; vertical-align:middle"><label id="ur_bidang_90"
                                        align='left'></label></td>
                            </tr>
                            <tr>
                                <td width="10%" style="text-align: left; vertical-align:middle; font-weight: bold;">
                                    Program
                                </td>
                                <td width="45%" style="text-align: left; vertical-align:middle"><label
                                        id="ur_program_13" align='left'></label></td>
                                <td width="45%" style="text-align: left; vertical-align:middle"><label
                                        id="ur_program_90" align='left'></label></td>
                            </tr>
                            <tr>
                                <td width="10%" style="text-align: left; vertical-align:middle; font-weight: bold;">
                                    Kegiatan
                                </td>
                                <td width="45%" style="text-align: left; vertical-align:middle"><label
                                        id="ur_kegiatan_13" align='left'></label></td>
                                <td width="45%" style="text-align: left; vertical-align:middle"><label
                                        id="ur_kegiatan_90" align='left'></label></td>
                            </tr>
                            <tr>
                                <td width="10%" style="text-align: left; vertical-align:middle; font-weight: bold;">Sub
                                    Kegiatan
                                </td>
                                <td width="45%" style="text-align: left; vertical-align:middle"></td>
                                <td width="45%" style="text-align: left; vertical-align:middle"><label
                                        id="ur_subkegiatan_90" align='left'></label>
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
                            <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Cari Sub
                            Kegiatan 90</button>
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

<div id="cariReferensi90" class="modal fade" role="dialog" tabindex="-1" data-focus-on="input:first"
    data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Program - Kegiatan - Sub Kegiatan 90</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                    <div class='tabs-x tabs-above tab-bordered tabs-krajee'>
                        <ul class="nav nav-tabs nav-justified" role="tablist">
                            <li class="active"><a href="#urusanRef" aria-controls="urusanRef" role="tab"
                                    data-toggle="tab">Urusan-Bidang</a>
                            </li>
                            <li class="disabled"><a href="#programRef" aria-controls="programRef" role="tab-kv"
                                    data-toggle="tab">Program</a></li>
                            <li class="disabled"><a href="#kegiatanRef" aria-controls="kegiatanRef" role="tab-kv"
                                    data-toggle="tab">Kegiatan</a>
                            </li>
                            <li class="disabled"><a href="#subkegiatanRef" aria-controls="subkegiatanRef" role="tab-kv"
                                    data-toggle="tab">Sub
                                    Kegiatan</a></li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="urusanRef">
                                <br>
                                <div class="col-md-12">
                                    <table id="tblUrusanRef"
                                        class="table table-striped table-bordered table-responsive compact" width="100%"
                                        cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th width="5px" style="text-align: center; vertical-align:middle"></th>
                                                <th width="10%" style="text-align: center; vertical-align:middle">Kode
                                                    Urusan</th>
                                                <th style="text-align: center; vertical-align:middle">Urusan / Bidang
                                                    Pemerintahan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade in" id="programRef">
                                <br>
                                <table id="tblProgramRef"
                                    class="table table-striped table-bordered table-responsive compact" width="100%"
                                    cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width='15%' style="text-align: center; vertical-align:middle">Kode
                                                Program</th>
                                            <th style="text-align: center; vertical-align:middle">Uraian Program</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <div role="tabpanel" class="tab-pane fade in" id="kegiatanRef">
                                <br>
                                <table id="tblKegiatanRef"
                                    class="table table-striped table-bordered table-responsive compact" width="100%"
                                    cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width='15%' style="text-align: center; vertical-align:middle">Kode
                                                Kegiatan</th>
                                            <th style="text-align: center; vertical-align:middle">Uraian Kegiatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <div role="tabpanel" class="tab-pane fade in" id="subkegiatanRef">
                                <br>
                                <table id="tblSubKegiatanRef"
                                    class="table table-striped table-bordered table-responsive compact" width="100%"
                                    cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width='10%' style="text-align: center; vertical-align:middle">Aksi</th>
                                            <th width='15%' style="text-align: center; vertical-align:middle">Kode Sub
                                                Kegiatan</th>
                                            <th style="text-align: center; vertical-align:middle">Uraian Sub Kegiatan
                                            </th>
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

<script id="details-bidang90" type="text/x-handlebars-template">
    <table class="table table-striped table-bordered table-responsive compact details-table" id="bidang90-@{{kd_urusan}}">
    <thead>
        <tr>
            <th width="10%" style="text-align: center; vertical-align:middle;">Kode Bidang</th>
            <th style="text-align: center; vertical-align:middle;">Nama Bidang</th>
        </tr>
    </thead>
    <tbody></tbody>
    </table>
</script>

@endsection

@section('scripts')
<script type="text/javascript" language="javascript" class="init"
    src="{{ asset('/protected/resources/views/90_parameter/js_subkegiatan_mapping.js')}}">
</script>
@endsection