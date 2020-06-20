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
                                </form>
                                <table id="tblRincian"
                                    class="table table-striped table-bordered table-responsive compact" width="100%"
                                    cellspacing="0">
                                    <thead>
                                        <tr>
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
                                </form>
                                <table id="tblSubRincian"
                                    class="table table-striped table-bordered table-responsive compact" width="100%"
                                    cellspacing="0">
                                    <thead>
                                        <tr>
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
    @endsection

    @section('scripts')
    <script type="text/javascript" language="javascript" class="init"
        src="{{ asset('/protected/resources/views/90_parameter/js_rekening.js')}}">
    </script>
    @endsection