<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app6')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?php
                $this->title = 'Sinkronisasi Urusan - Bidang';
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
                    <h2 class="panel-title">Sinkronisasi Referensi Urusan Pemerintahan</h2>
                </div>

                <div class="panel-body"><br>
                    <div class='tabs-x tabs-above tab-bordered tabs-krajee'>
                        <ul class="nav nav-tabs nav-justified" role="tablist">
                            <li class="active"><a href="#fungsi" aria-controls="fungsi" role="tab"
                                    data-toggle="tab">Fungsi</a>
                            </li>
                            <li><a href="#urusan" aria-controls="urusan" role="tab" data-toggle="tab">Urusan</a>
                            </li>
                            <li class="disabled"><a href="#bidang" aria-controls="bidang" role="tab-kv"
                                    data-toggle="tab">Bidang</a></li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="fungsi">
                                <div class="col-md-12"><br>
                                    <button class="btnAddBulkFungsi btn-labeled btn btn-sm btn-success"><span
                                            class="btn-label">
                                            <i class="fa fa-plus fa-fw fa-lg"></i></span>Update Batch
                                        Fungsi Simda Keuangan</button>
                                    <br>
                                    <table id="tblFungsi"
                                        class="table table-striped table-bordered table-responsive compact" width="100%"
                                        cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th width="10%" style="text-align: center; vertical-align:middle">
                                                    Kode Fungsi</th>
                                                <th style="text-align: center; vertical-align:middle">Uraian Fungsi
                                                    Pemerintahan Simda Integrated</th>
                                                <th style="text-align: center; vertical-align:middle">Uraian Fungsi
                                                    Pemerintahan Simda Keuangan</th>
                                                <th width='10%' style="text-align: center; vertical-align:middle">
                                                    Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade in" id="urusan">
                                <div class="col-md-12"><br>
                                    <button class="btnAddBulkUrusan btn-labeled btn btn-sm btn-success"><span
                                            class="btn-label">
                                            <i class="fa fa-plus fa-fw fa-lg"></i></span>Update Batch
                                        Urusan Simda Keuangan</button>
                                    <br>
                                    <table id="tblUrusan"
                                        class="table table-striped table-bordered table-responsive compact" width="100%"
                                        cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th width="10%" style="text-align: center; vertical-align:middle">
                                                    Kode Urusan</th>
                                                <th style="text-align: center; vertical-align:middle">Uraian Urusan
                                                    Pemerintahan Simda Integrated</th>
                                                <th style="text-align: center; vertical-align:middle">Uraian Urusan
                                                    Pemerintahan Simda Keuangan</th>
                                                <th width='10%' style="text-align: center; vertical-align:middle">
                                                    Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade in" id="bidang">
                                <div class="col-md-12"><br>
                                    <button class="btnAddBulkBidang btn-labeled btn btn-sm btn-success"><span
                                            class="btn-label">
                                            <i class="fa fa-plus fa-fw fa-lg"></i></span>Update Batch
                                        Bidang Simda Keuangan</button>
                                    <br>
                                    <table id="tblBidang"
                                        class="table table-striped table-bordered table-responsive compact" width="100%"
                                        cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th width='5%' style="text-align: center; vertical-align:middle">Kode
                                                    Urusan</th>
                                                <th width='5%' style="text-align: center; vertical-align:middle">Kode
                                                    Bidang</th>
                                                <th style="text-align: center; vertical-align:middle">Uraian Bidang
                                                    Simda Integrated</th>
                                                <th style="text-align: center; vertical-align:middle">Uraian Bidang
                                                    Simda Keuangan</th>
                                                <th width='10%' style="text-align: center; vertical-align:middle">Aksi
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
    src="{{ asset('/protected/resources/views/api/js/js_sink_urusan.js')}}"></script>
@endsection