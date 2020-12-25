<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app6')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?php
                $this->title = 'Sinkronisasi Sumberdana';
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
                    <h2 class="panel-title">Sinkronisasi Sumberdana Simda Keuangan</h2>
                </div>

                <div class="panel-body"><br>
                    <div class="col-md-12"><br>
                        <button class="btnAddBulkSumberDana btn-labeled btn btn-sm btn-success"><span class="btn-label">
                                <i class="fa fa-plus fa-fw fa-lg"></i></span>Update Batch Sumberdana Simda
                            Keuangan</button>
                        <br>
                        <table id="tblSumberDana" class="table table-striped table-bordered table-responsive compact"
                            width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width='10%' style="text-align: center; vertical-align:middle">Aksi</th>
                                    <th width="10%" style="text-align: center; vertical-align:middle">No Urut</th>
                                    <th style="text-align: center; vertical-align:middle">Uraian Sumberdana Simda
                                        Integrated</th>
                                    <th style="text-align: center; vertical-align:middle">Uraian Sumberdana Simda
                                        Keuangan</th>
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
    src="{{ asset('/protected/resources/views/api/js/js_sink_sumberdana.js')}}"></script>
@endsection