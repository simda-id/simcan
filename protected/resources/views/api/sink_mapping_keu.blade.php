<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app6')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?php
                $this->title = 'Sinkronisasi Mapping Keuangan 90';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = '';
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
                    <h2 class="panel-title">Sinkronisasi Mapping Referensi di Simda Keuangan</h2>
                </div>

                <div class="panel-body"><br>
                    <div class='tabs-x tabs-above tab-bordered tabs-krajee'>
                        <ul class="nav nav-tabs nav-justified" role="tablist">
                            <li class="active"><a href="#mbidang" aria-controls="mbidang" role="tab"
                                    data-toggle="tab">Bidang</a>
                            </li>
                            <li><a href="#mkegiatan" aria-controls="mkegiatan" role="tab" data-toggle="tab">Kegiatan</a>
                            </li>
                            <li><a href="#mrekening" aria-controls="mrekening" role="tab-kv"
                                    data-toggle="tab">Rekening</a></li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="mbidang">
                                <div class="col-md-12"><br>
                                    <button class="btnAddBulkMappingBidang btn-labeled btn btn-sm btn-success"><span
                                            class="btn-label">
                                            <i class="fa fa-plus fa-fw fa-lg"></i></span>Impor Mapping Bidang</button>
                                    <br>
                                    <table id="tblBidang"
                                        class="table table-striped table-bordered table-responsive compact" width="100%"
                                        cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th width="15%" style="text-align: center; vertical-align:middle">Kode
                                                    Bidang 90</th>
                                                <th style="text-align: center; vertical-align:middle">Uraian Bidang 90
                                                </th>
                                                <th width="15%" style="text-align: center; vertical-align:middle">Kode
                                                    Bidang Keu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade in" id="mkegiatan">
                                <div class="col-md-12"><br>
                                    <button class="btnAddBulkMappingKegiatan btn-labeled btn btn-sm btn-success"><span
                                            class="btn-label">
                                            <i class="fa fa-plus fa-fw fa-lg"></i></span>Import Mapping
                                        Kegiatan</button>
                                    <br>
                                    <table id="tblKegiatan"
                                        class="table table-striped table-bordered table-responsive compact" width="100%"
                                        cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th width="15%" style="text-align: center; vertical-align:middle">
                                                    Kode Sub Kegiatan</th>
                                                <th style="text-align: center; vertical-align:middle">Uraian Sub
                                                    Kegiatan</th>
                                                <th width="10%" style="text-align: center; vertical-align:middle">
                                                    Kode Kegiatan Keu</th>
                                                <th style="text-align: center; vertical-align:middle">Uraian Keuangan
                                                    Simda Keuangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade in" id="mrekening">
                                <div class="col-md-12"><br>
                                    <button class="btnAddBulkMappingRekening btn-labeled btn btn-sm btn-success"><span
                                            class="btn-label">
                                            <i class="fa fa-plus fa-fw fa-lg"></i></span>Import Mapping
                                        Rekening</button>
                                    <br>
                                    <table id="tblRekening"
                                        class="table table-striped table-bordered table-responsive compact" width="100%"
                                        cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th width='15%' style="text-align: center; vertical-align:middle">
                                                    Rekening 90</th>
                                                <th style="text-align: center; vertical-align:middle">Uraian Rekening
                                                    Simda Integrated</th>
                                                <th width='15%' style="text-align: center; vertical-align:middle">
                                                    Rekening Simkeu
                                                </th>
                                                <th style="text-align: center; vertical-align:middle">Uraian Rekening
                                                    Simda Keuangan</th>
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
    src="{{ asset('/protected/resources/views/api/js/js_sink_mapping.js')}}"></script>
@endsection