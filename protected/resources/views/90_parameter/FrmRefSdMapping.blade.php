<?php
  use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.parameterlayout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?php
        $this->title = 'Mapping Sumberdana Eksisting ke Sumberdana Pmd-90';
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
                        <h2 class="panel-title">Mapping Sumberdana Eksisting ke Sumberdana Pmd-90</h2>
                    </p>
                </div>
                <div class="panel-body">
                    <br>
                    <div>
                        <button id="btnCetakMapping" type="button"
                            class="btnCetakMapping btn btn-labeled btn-sm btn-primary">
                            <span class="btn-label"><i class="fa fa-print fa-fw fa-lg"></i></span>Cetak Hasil
                            Mapping Sumberdana</button>
                    </div>
                    <br>
                    <table id="tblSumberDana" class="table table-striped table-bordered table-responsive compact"
                        width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="20%" style="text-align: center; vertical-align:middle;">Aksi</th>
                                <th width='20%' style="text-align: center; vertical-align:middle">No Urut</th>
                                <th style="text-align: center; vertical-align:middle">Uraian Sumberdana
                                </th>
                                <th width='15%' style="text-align: center; vertical-align:middle">Kode
                                    Sumberdana 90</th>
                                <th style="text-align: center; vertical-align:middle">Uraian Sumberdana Pmd 90
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

<!--Modal Tambah Mapping Unit-->
<div id="ModalMappingSub" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="">Data Mapping Sumberdana Permendagri 90</h4>
            </div>
            <div class="modal-body">
                <form name="frmModalUnit" class="form-horizontal" role="form" autocomplete='off' action="" method="post"
                    onsubmit="return false;">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id_mapping_rek" id="id_mapping_rek">
                    <input type="hidden" name="id_sumberdana" id="id_sumberdana">
                    <input type="hidden" name="id_sd_6" id="id_sd_6">
                    <table id="tblMapping" class="table table-striped table-bordered table-responsive compact"
                        width="100%" cellspacing="0" cellpadding="0">
                        <tr>
                            <td width="20%" style="text-align: left; vertical-align:middle; font-weight: bold;">
                                Tahun Mapping</td>
                            <td style="text-align: center; vertical-align:middle; font-weight: bold;">
                                <label id="tahun_mapping" align='left'>{{Session::get('tahun')}}</label>
                            </td>
                        </tr>
                        <tr>
                            <td width="20%" style="text-align: left; vertical-align:middle; font-weight: bold;">
                                Sumberdana Eksisting
                            </td>
                            <td style="text-align: left; vertical-align:middle"><label id="ur_sumberdana_13"
                                    align='left'></label></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center; vertical-align:middle; font-weight: bold;">
                                <label id="tahun_mapping" align='left'>Sumberdana Permendagri 90</label>
                            </td>
                        </tr>
                        <tr>
                            <td width="20%" style="text-align: left; vertical-align:middle; font-weight: bold;">
                                Sumberdana
                            </td>
                            <td style="text-align: left; vertical-align:middle"><label id="ur_sumberdana_90"
                                    align='left'></label></td>
                        </tr>
                        <tr>
                            <td width="20%" style="text-align: left; vertical-align:middle; font-weight: bold;">
                                Kelompok
                            </td>
                            <td style="text-align: left; vertical-align:middle"><label id="ur_kelompok_90"
                                    align='left'></label></td>
                        </tr>
                        <tr>
                            <td width="20%" style="text-align: left; vertical-align:middle; font-weight: bold;">
                                Jenis
                            </td>
                            <td style="text-align: left; vertical-align:middle"><label id="ur_jenis_90"
                                    align='left'></label></td>
                        </tr>
                        <tr>
                            <td width="20%" style="text-align: left; vertical-align:middle; font-weight: bold;">
                                Obyek
                            </td>
                            <td style="text-align: left; vertical-align:middle"><label id="ur_obyek_90"
                                    align='left'></label></td>
                        </tr>
                        <tr>
                            <td width="20%" style="text-align: left; vertical-align:middle; font-weight: bold;">
                                Rincian Obyek
                            </td>
                            <td style="text-align: left; vertical-align:middle"><label id="ur_rincian_90"
                                    align='left'></label></td>
                        </tr>
                        <tr>
                            <td width="20%" style="text-align: left; vertical-align:middle; font-weight: bold;">Sub
                                Rincian
                            </td>
                            <td style="text-align: left; vertical-align:middle">
                                <label id="ur_subrincian_90" align='left'></label>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left">
                        <button id="btnCariRef90" type="button" class="btnCariRef90 btn btn-labeled btn-sm btn-default">
                            <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Cari
                            Sumberdana 90</button>
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
                    Yakin akan menghapus Mapping terhadap Sumberdana : <strong><span id="nm_unit_hapus"></span></strong>
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
                <h4 class="modal-title">Kode Sumberdana Permendagri 90</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form" autocomplete='off' action="" method="post"
                    onsubmit="return false;">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="id_akun_90" class="col-sm-3" align='left'>Sumberdana</label>
                        <div class="col-sm-9">
                            <select class="form-control id_akun_90 select2" name="id_akun_90" id="id_akun_90"></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="id_golongan_90" class="col-sm-3" align='left'>Kelompok</label>
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
                                <th width='20%' style="text-align: center; vertical-align:middle">Aksi</th>
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

@endsection

@section('scripts')
<script type="text/javascript" language="javascript" class="init"
    src="{{ asset('/protected/resources/views/90_parameter/js_sd_mapping.js')}}">
</script>
@endsection