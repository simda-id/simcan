<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.parameterlayout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?php
        $this->title = 'Kode Rekening Pmd-90';
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
                    <h2 class="panel-title">Referensi Kode Rekening Permendagri 90</h2>
                </div>
                <div class="panel-body"><br>
                    <div class='tabs-x tabs-above tab-bordered tabs-krajee'>
                        <ul class="nav nav-tabs nav-justified" role="tablist">
                            <li class="active"><a href="#tabrek12" aria-controls="tabrek12" role="tab"
                                    data-toggle="tab">Akun - Golongan</a>
                            </li>
                            <li class="disabled"><a href="#tabrek3" aria-controls="tabrek3" role="tab-kv"
                                    data-toggle="tab">Jenis</a></li>
                            <li class="disabled"><a href="#tabrek4" aria-controls="tabrek4" role="tab-kv"
                                    data-toggle="tab">Obyek</a></li>
                            <li class="disabled"><a href="#tabrek5" aria-controls="tabrek5" role="tab-kv"
                                    data-toggle="tab">Rincian Obyek</a></li>
                            <li class="disabled"><a href="#tabrek6" aria-controls="tabrek6" role="tab-kv"
                                    data-toggle="tab">Sub Rincian Obyek</a></li>
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
                                                <tr class="backBidang">
                                                    <td width="20%" style="text-align: left; vertical-align:top;">Akun
                                                    </td>
                                                    <td style="text-align: left; vertical-align:top;"><label
                                                            id="ur_akun_rek3" align='left'></label>
                                                    </td>
                                                </tr>
                                                <tr class="backBidang">
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
                                                <tr class="backBidang">
                                                    <td width="20%" style="text-align: left; vertical-align:top;">Akun
                                                    </td>
                                                    <td style="text-align: left; vertical-align:top;"><label
                                                            id="ur_akun_rek4" align='left'></label></td>
                                                </tr>
                                                <tr class="backBidang">
                                                    <td width="20%" style="text-align: left; vertical-align:top;">
                                                        Golongan
                                                    </td>
                                                    <td style="text-align: left; vertical-align:top;"><label
                                                            id="ur_gol_rek4" align='left'></label></td>
                                                </tr>
                                                <tr class="backProgram">
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
                                                <tr class="backBidang">
                                                    <td width="20%" style="text-align: left; vertical-align:top;">Akun
                                                    </td>
                                                    <td style="text-align: left; vertical-align:top;"><label
                                                            id="ur_akun_rek5" align='left'></label></td>
                                                </tr>
                                                <tr class="backBidang">
                                                    <td width="20%" style="text-align: left; vertical-align:top;">
                                                        Golongan
                                                    </td>
                                                    <td style="text-align: left; vertical-align:top;"><label
                                                            id="ur_gol_rek5" align='left'></label></td>
                                                </tr>
                                                <tr class="backProgram">
                                                    <td width="20%" style="text-align: left; vertical-align:top;">
                                                        Jenis</td>
                                                    <td style="text-align: left; vertical-align:top;"><label
                                                            id="ur_jenis_rek5" align='left'></label>
                                                    </td>
                                                </tr>
                                                <tr class="backKegiatan">
                                                    <td width="20%" style="text-align: left; vertical-align:top;">
                                                        Obyek</td>
                                                    <td style="text-align: left; vertical-align:top;"><label
                                                            id="ur_obyek_rek5" align='left'></label>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="DivAddRek5 hidden">
                                        <button id="btnRek5" type="button"
                                            class="btnRek5 btn btn-labeled btn-sm btn-primary">
                                            <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah
                                            Rekening 5 SIPD</button>
                                        <label id="ur_bidang_prog" align='left'>*)
                                            Silahkan tambahkan program yang sesuai dengan data Rekening yang
                                            terdapat
                                            di SIPD baik kode maupun nomenklatur</label>
                                    </div>
                                </form>
                                <table id="tblRincian"
                                    class="table table-striped table-bordered table-responsive compact" width="100%"
                                    cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width='5%' style="text-align: center; vertical-align:middle">Aksi</th>
                                            <th width='15%' style="text-align: center; vertical-align:middle">Kode
                                                Rincian Obyek</th>
                                            <th style="text-align: center; vertical-align:middle">Nama Rincian Obyek
                                                Rekening
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <div role="tabpanel" class="tab-pane fade in" id="tabrek6">
                                <br>
                                <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-responsive compact">
                                            <tbody>
                                                <tr class="backBidang">
                                                    <td width="20%" style="text-align: left; vertical-align:top;">Akun
                                                    </td>
                                                    <td style="text-align: left; vertical-align:top;"><label
                                                            id="ur_akun_rek6" align='left'></label>
                                                    </td>
                                                </tr>
                                                <tr class="backBidang">
                                                    <td width="20%" style="text-align: left; vertical-align:top;">
                                                        Golongan
                                                    </td>
                                                    <td style="text-align: left; vertical-align:top;"><label
                                                            id="ur_gol_rek6" align='left'></label>
                                                    </td>
                                                </tr>
                                                <tr class="backProgram">
                                                    <td width="20%" style="text-align: left; vertical-align:top;">
                                                        Jenis</td>
                                                    <td style="text-align: left; vertical-align:top;"><label
                                                            id="ur_jenis_rek6" align='left'></label>
                                                    </td>
                                                </tr>
                                                <tr class="backKegiatan">
                                                    <td width="20%" style="text-align: left; vertical-align:top;">
                                                        Obyek</td>
                                                    <td style="text-align: left; vertical-align:top;"><label
                                                            id="ur_obyek_rek6" align='left'></label>
                                                    </td>
                                                </tr>
                                                <tr class="backRek5">
                                                    <td width="20%" style="text-align: left; vertical-align:top;">
                                                        Rincian Obyek</td>
                                                    <td style="text-align: left; vertical-align:top;"><label
                                                            id="ur_rincian_rek6" align='left'></label>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="DivAddRek6 hidden">
                                        <button id="btnRek6" type="button"
                                            class="btnRek6 btn btn-labeled btn-sm btn-primary">
                                            <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah
                                            Rekening 6 SIPD</button>
                                        <label id="ur_bidang_prog" align='left'>*)
                                            Silahkan tambahkan program yang sesuai dengan data Rekening yang
                                            terdapat
                                            di SIPD baik kode maupun nomenklatur</label>
                                    </div>
                                </form>
                                <table id="tblSubRincian"
                                    class="table table-striped table-bordered table-responsive compact" width="100%"
                                    cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width='5%' style="text-align: center; vertical-align:middle">Aksi</th>
                                            <th width='15%' style="text-align: center; vertical-align:middle">Kode Sub
                                                Rincian</th>
                                            <th style="text-align: center; vertical-align:middle">Nama Sub Rincian Obyek
                                                Rekening
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

    <div id="frmModalRek5" class="modal fade" role="dialog" data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Data Nomenklatur Rekening Level 5 (Rincian Obyek)</h4>
                </div>
                <div class="modal-body">
                    <form name="frmModalRek5" class="form-horizontal" role="form" autocomplete='off' action=""
                        method="post" onsubmit="return false;">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="nm_akun5" class="col-sm-3" align='left'>Kode 1 (Akun)</label>
                            <div class="col-sm-8">
                                <label id="nm_akun5" name="nm_akun5" align='left'></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nm_kelompok5" class="col-sm-3" align='left'>Kode 2 (Kelompok)</label>
                            <div class="col-sm-8">
                                <label id="nm_kelompok5" name="nm_kelompok5" align='left'></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nm_jenis5" class="col-sm-3" align='left'>Kode 3 (Jenis)</label>
                            <div class="col-sm-8">
                                <label id="nm_jenis5" name="nm_jenis5" align='left'></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nm_obyek5" class="col-sm-3" align='left'>Kode 4 (Obyek)</label>
                            <div class="col-sm-8">
                                <input type="hidden" name="id_obyek5" id="id_obyek5">
                                <label id="nm_obyek5" name="nm_obyek5" align='left'></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kd_rincian5" class="col-sm-3" align='left'>Kode 5 (Rincian Obyek)</label>
                            <div class="col-sm-2" align="center">
                                <input type="hidden" name="id_rincian5" id="id_rincian5">
                                <input type="text" class="form-control" id="kd_rincian5" name="kd_rincian5"
                                    maxlength="3"="" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="uraian_rincian5" class="col-sm-3" align='left'>Uraian Rincian Obyek</label>
                            <div class="col-sm-8">
                                <textarea type="name" class="form-control" id="uraian_rincian5" name="uraian_rincian5"
                                    rows="3" required="required"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="dasar_hkm5" class="col-sm-3 control-label" align='left'>Dasar
                                Hukum</label>
                            <div class="col-sm-8">
                                <select class="form-control select2 dasar_hkm5" name="dasar_hkm5"
                                    id="dasar_hkm5"></select>
                            </div>
                        </div>
                        <div class="form-group" id="divStatusRek5">
                            <label for="rbStatusRek5" class="col-sm-3 control-label" align='left'>Status Rincian
                                Obyek</label>
                            <div class="col-sm-2">
                                <label>
                                    <input type="radio" class="rbStatusRek5" name="rbStatusRek5" id="rbStatusRek5"
                                        value="0"> Aktif
                                </label>
                            </div>
                            <div class="col-sm-5">
                                <label>
                                    <input type="radio" class="rbStatusRek5" name="rbStatusRek5" id="rbStatusRek5"
                                        value="1"> Non Aktif (Tidak Digunakan)
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="col-sm-2 text-left">
                    </div>
                    <div class="col-sm-10 text-right">
                        <div class="ui-group-buttons">
                            <button id="btnSaveRek5" type="button" class="btn btn-success btn-labeled"
                                data-dismiss="modal">
                                <span class="btn-label"><i class="fa fa-floppy-o fa-fw fa-lg"></i></span>Simpan</button>
                            <div class="or"></div>
                            <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal"
                                aria-hidden="true">
                                <span class="btn-label"><i class="fa fa-sign-out fa-fw fa-lg"></i></span>Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="frmModalRek6" class="modal fade" role="dialog" data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Data Nomenklatur Rekening Level 6 (Sub Rincian Obyek)</h4>
                </div>
                <div class="modal-body">
                    <form name="frmModalRek6" class="form-horizontal" role="form" autocomplete='off' action=""
                        method="post" onsubmit="return false;">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="nm_akun6" class="col-sm-3" align='left'>Kode 1 (Akun)</label>
                            <div class="col-sm-8">
                                <label id="nm_akun6" name="nm_akun6" align='left'></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nm_kelompok6" class="col-sm-3" align='left'>Kode 2 (Golongan)</label>
                            <div class="col-sm-8">
                                <label id="nm_kelompok6" name="nm_kelompok6" align='left'></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nm_jenis6" class="col-sm-3" align='left'>Kode 3 (Jenis)</label>
                            <div class="col-sm-8">
                                <label id="nm_jenis6" name="nm_jenis6" align='left'></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nm_obyek6" class="col-sm-3" align='left'>Kode 4 (Obyek)</label>
                            <div class="col-sm-8">
                                <label id="nm_obyek6" name="nm_obyek6" align='left'></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kd_rincian6" class="col-sm-3" align='left'>Kode 5 (Rincian Obyek)</label>
                            <div class="col-sm-8">
                                <input type="hidden" name="id_rincian6" id="id_rincian6">
                                <label id="nm_rincian6" name="nm_rincian6" align='left'></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kd_subrinc6" class="col-sm-3" align='left'>Kode 6 (Sub Rincian)</label>
                            <div class="col-sm-2" align="center">
                                <input type="hidden" name="id_subrinc6" id="id_subrinc6">
                                <input type="text" class="form-control" id="kd_subrinc6" name="kd_subrinc6"
                                    maxlength="3"="" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="uraian_subrinc6" class="col-sm-3" align='left'>Uraian Sub Rincian</label>
                            <div class="col-sm-8">
                                <textarea type="name" class="form-control" id="uraian_subrinc6" name="uraian_subrinc6"
                                    rows="3" required="required"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="dasar_hkm6" class="col-sm-3 control-label" align='left'>Dasar
                                Hukum</label>
                            <div class="col-sm-8">
                                <select class="form-control select2 dasar_hkm6" name="dasar_hkm6"
                                    id="dasar_hkm5"></select>
                            </div>
                        </div>
                        <div class="form-group" id="divStatusRek6">
                            <label for="rbStatusRek6" class="col-sm-3 control-label" align='left'>Status Sub
                                Rincian</label>
                            <div class="col-sm-2">
                                <label>
                                    <input type="radio" class="rbStatusRek6" name="rbStatusRek6" id="rbStatusRek6"
                                        value="0"> Aktif
                                </label>
                            </div>
                            <div class="col-sm-5">
                                <label>
                                    <input type="radio" class="rbStatusRek6" name="rbStatusRek6" id="rbStatusRek6"
                                        value="1"> Non Aktif (Tidak Digunakan)
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="col-sm-2 text-left">
                    </div>
                    <div class="col-sm-10 text-right">
                        <div class="ui-group-buttons">
                            <button id="btnSaveRek6" type="button" class="btn btn-success btn-labeled"
                                data-dismiss="modal">
                                <span class="btn-label"><i class="fa fa-floppy-o fa-fw fa-lg"></i></span>Simpan</button>
                            <div class="or"></div>
                            <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal"
                                aria-hidden="true">
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
        src="{{ asset('/protected/resources/views/90_parameter/js_rekening.js')}}">
    </script>
    @endsection