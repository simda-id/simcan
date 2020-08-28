<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.parameterlayout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?php
            $this->title = 'Program Prioritas Nasional';
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
                    <h2 class="panel-title">Program Prioritas Pembangunan Nasional</h2>
                </div>
                <div class="panel-body"><br>
                    <div class='tabs-x tabs-above tab-bordered tabs-krajee'>
                        <ul class="nav nav-tabs nav-justified" role="tablist">
                            <li class="active"><a href="#bidang" aria-controls="bidang" role="tab"
                                    data-toggle="tab">Program Nasional</a>
                            </li>
                            <li class="disabled"><a href="#mapping" aria-controls="mapping" role="tab-kv"
                                    data-toggle="tab">Mapping</a></li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="bidang">
                                <div class="col-md-12">
                                    <br>
                                    <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-responsive compact">
                                                <tbody>
                                                    <tr>
                                                        <td width="15%"
                                                            style="text-align: left; vertical-align:middle; font-weight: bold;">
                                                            Tahun Program</td>
                                                        <td
                                                            style="text-align: left; vertical-align:middle; font-weight: bold;">
                                                            <label id="tahun_program"
                                                                align='left'>{{Session::get('tahun')}}</label>
                                                        </td>
                                                    </tr>
                                            </table>
                                        </div>
                                    </form>
                                    <div class="addProgram">
                                        <button id="btnTambahProgram" type="button"
                                            class="btnTambahProgram btn btn-labeled btn-sm btn-primary">
                                            <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah
                                            Program Prioritas</button>
                                    </div>
                                    <table id="tblBidang"
                                        class="table table-striped table-bordered table-responsive compact" width="100%"
                                        cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th width='10%' style="text-align: center; vertical-align:middle">Aksi
                                                </th>
                                                <th style="text-align: center; vertical-align:middle">Uraian Program
                                                    Prioritas Nasional</th>
                                                <th width='8%' style="text-align: center; vertical-align:middle">Status
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade in" id="mapping">
                                <br>
                                <div class="col-md-12">
                                    <div class="addMapping">
                                        <button id="btnTambahMapping" type="button"
                                            class="btnTambahMapping btn btn-labeled btn-sm btn-primary">
                                            <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah
                                            Mapping</button>
                                    </div>
                                    <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-responsive compact">
                                                <tbody>
                                                    <tr class="backBidang">
                                                        <td width="15%"
                                                            style="text-align: left; vertical-align:top; font-weight: bold;">
                                                            Program Nasional</td>
                                                        <td
                                                            style="text-align: left; vertical-align:top; font-weight: bold;">
                                                            <label id="ur_pronas_mapping" align='left'></label></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="15%"
                                                            style="text-align: left; vertical-align:middle; font-weight: bold;">
                                                            Tahun Mapping</td>
                                                        <td
                                                            style="text-align: left; vertical-align:middle; font-weight: bold;">
                                                            <label id="tahun_mapping"
                                                                align='left'>{{Session::get('tahun')}}</label>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </form>
                                    <table id="tblMapping"
                                        class="table table-striped table-bordered table-responsive compact" width="100%"
                                        cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th width='10%' style="text-align: center; vertical-align:middle">Aksi
                                                </th>
                                                <th width='10%' style="text-align: center; vertical-align:middle">Kode
                                                    Program</th>
                                                <th width='20%' style="text-align: center; vertical-align:middle">Uraian
                                                    Program
                                                </th>
                                                <th width='10%' style="text-align: center; vertical-align:middle">Kode
                                                    Kegiatan</th>
                                                <th width='20%' style="text-align: center; vertical-align:middle">Uraian
                                                    Kegiatan
                                                </th>
                                                <th width='10%' style="text-align: center; vertical-align:middle">Kode
                                                    Sub Kegiatan</th>
                                                <th width='20%' style="text-align: center; vertical-align:middle">Uraian
                                                    Sub Kegiatan
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

    <!--Modal Tambah Unit-->
    <div id="ModalProgram" class="modal fade" role="dialog" data-backdrop="static">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="">Data Program Prioritas Nasional Tahun {{Session::get('tahun')}}</h4>
                </div>
                <div class="modal-body">
                    <form name="frmModalProgram" class="form-horizontal" role="form" autocomplete='off' action=""
                        method="post" onsubmit="return false;">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id_prognas" id="id_prognas">
                        <input type="hidden" name="status_data_program" id="status_data_program">
                        <div class="form-group">
                            <label for="uraian_program" class="col-sm-3" align='left'>Uraian Program Nasional</label>
                            <div class="col-sm-7">
                                <textarea type="text" class="form-control" name="uraian_program" id="uraian_program"
                                    rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group" id="divStatusProgram">
                            <label for="rbStatusProgram" class="col-sm-3 control-label" align='left'>Status
                                Program</label>
                            <div class="col-sm-1">
                                <label>
                                    <input type="radio" class="rbStatusProgram" name="rbStatusProgram"
                                        id="rbStatusProgram" value="0"> Aktif
                                </label>
                            </div>
                            <div class="col-sm-3">
                                <label>
                                    <input type="radio" class="rbStatusProgram" name="rbStatusProgram"
                                        id="rbStatusProgram" value="1"> Tidak Aktif
                                </label>
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
                                <button type="button" id="btnSaveProgram"
                                    class="btn btn-sm btn-success btnSaveProgram btn-labeled" data-dismiss="modal">
                                    <span class="btn-label"><i
                                            class="fa fa-floppy-o fa-fw fa-lg"></i></span>Simpan</button>
                                <div class="or"></div>
                                <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal"
                                    aria-hidden="true">
                                    <span class="btn-label"><i
                                            class="fa fa-sign-out fa-fw fa-lg"></i></span>Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Modal Hapus -->
    <div id="HapusProgram" class="modal fade" role="dialog" data-backdrop="static">
        <div class="modal-dialog modal-xs">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id_prognas_hapus" name="id_prognas_hapus">
                    <div class="alert alert-danger deleteContent">
                        <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border" style="color:red;"
                            aria-hidden="true"></i>
                        <br>
                        Yakin akan menghapus Data Program <strong><span id="uraian_program_hapus"></span></strong> ?
                        <br>
                        <br>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="ui-group-buttons">
                        <button type="button" id="btnDelProgram" class="btn btn-sm btn-danger btn-labeled btnDelProgram"
                            data-dismiss="modal"><span class="btn-label"><i id="footer_action_button"
                                    class="fa fa-trash-o fa-fw fa-lg"></i></span> Hapus</button>
                        <div class="or"></div>
                        <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal"
                            aria-hidden="true"><span class="btn-label"><i class="fa fa-sign-out fa-fw fa-lg"></i></span>
                            Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Modal Tambah -->
    <div id="ModalMapping" class="modal fade" role="dialog" data-backdrop="static">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Data Mapping SPM</h4>
                </div>
                <div class="modal-body">
                    <form name="frmModalMapping" class="form-horizontal" role="form" autocomplete='off' action=""
                        method="post" onsubmit="return false;">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id_mapping" id="id_mapping">
                        <input type="hidden" name="id_prognas_mapping" id="id_prognas_mapping">
                        <div class="form-group">
                            <label for="uraian_program_mapping" class="col-sm-3" align='left'>Uraian Program
                                Nasional</label>
                            <div class="col-sm-7">
                                <textarea type="text" class="form-control" name="uraian_program_mapping"
                                    id="uraian_program_mapping" rows="3" readonly></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="urusan_mapping" class="col-sm-3 control-label" align='left'>Urusan</label>
                            <div class="col-sm-8">
                                <select class="form-control select2 urusan_mapping" name="urusan_mapping"
                                    id="urusan_mapping"></select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="bidang_mapping">Bidang</label>
                            <div class="col-sm-8">
                                <select class="form-control select2 bidang_mapping" name="bidang_mapping"
                                    id="bidang_mapping"></select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="prog_mapping">Program</label>
                            <div class="col-sm-8">
                                <select class="form-control select2 prog_mapping" name="prog_mapping"
                                    id="prog_mapping"></select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="keg_mapping">Kegiatan</label>
                            <div class="col-sm-8">
                                <select class="form-control select2 keg_mapping" name="keg_mapping"
                                    id="keg_mapping"></select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="subkeg_mapping">Sub Kegiatan</label>
                            <div class="col-sm-8">
                                <select class="form-control select2 subkeg_mapping" name="subkeg_mapping"
                                    id="subkeg_mapping"></select>
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
                                <button id="btnSaveMapping" type="button"
                                    class="btn btn-sm btn-success btnSaveMapping btn-labeled" data-dismiss="modal">
                                    <span class="btn-label"><i class="fa fa-floppy-o fa-fw fa-lg"></i></span>
                                    Simpan</button>
                                <div class="or"></div>
                                <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal"
                                    aria-hidden="true">
                                    <span class="btn-label"><i class="fa fa-sign-out fa-fw fa-lg"></i></span>
                                    Tutup</button>
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
                    <input type="hidden" id="id_spm_jenis_hapus" name="id_spm_jenis_hapus">
                    <div class="alert alert-danger deleteContent">
                        <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border" style="color:red;"
                            aria-hidden="true"></i>
                        <br>
                        Yakin akan menghapus Data Mapping Kegiatan <strong><span
                                id="uraian_jenis_hapus"></span></strong> terhadap SPM ini ?
                        <br>
                        <br>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="ui-group-buttons">
                        <button type="button" id="btnDelMapping" class="btn btn-sm btn-danger btn-labeled btnDelMapping"
                            data-dismiss="modal"><span class="btn-label"><i id="footer_action_button"
                                    class="fa fa-trash-o fa-fw fa-lg"></i></span> Hapus</button>
                        <div class="or"></div>
                        <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal"
                            aria-hidden="true"><span class="btn-label"><i class="fa fa-sign-out fa-fw fa-lg"></i></span>
                            Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection

    @section('scripts')
    <script type="text/javascript" language="javascript" class="init"
        src="{{ asset('/protected/resources/views/90_parameter/js_prognas.js')}}">
    </script>
    @endsection