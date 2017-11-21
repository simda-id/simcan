<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>
@extends('layouts.app')
@section('content')

<div class="ta-rkas-kegiatan-index">      
    <div class="row">
        <div class="col-md-12">
            <?php 
            // var_dump(Auth::user()->getUserSubUnit()->get());
                $this->title = 'Rancangan Awal Renja';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = 'modul2';
                $breadcrumb->begin();
                $breadcrumb->add(['label' => 'Renja']);
                $breadcrumb->add(['label' => $this->title]);
                $breadcrumb->end();
            ?>          
        </div>
    </div>

    {{-- $dataRekap as $data; --}}
    @foreach($dataRekap as $data)

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <div class="col-lg-4 col-md-6">
                            <a href="{{ url('/renja/dapat') }}">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i style="font-size:5em;" class="glyphicon glyphicon-download-alt"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">{{number_format($data->pagu_1,0,",",".")}} jt</div>
                                            <div>Pendapatan</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                        Rencana Pendapatan diisi dengan estimasi pendapatan tahun anggaran berjalan.
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <div class="col-lg-4 col-md-6">
                            <a href="{{ url('/renja/blang') }}">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-road fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">{{number_format($data->pagu_0,0,",",".")}} jt</div>
                                            <div>Belanja Langsung</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                        Rencana Belanja Langsung diisi dengan estimasi belanja langsung tahun anggaran berjalan.
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <div class="col-lg-4 col-md-6">
                            <a href="{{ url('/renja/btl') }}">
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-comments fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">{{number_format($data->pagu_2,0,",",".")}} jt</div>
                                            <div>Belanja Tidak Langsung</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                        Rencana Belanja Tidak Langsung diisi dengan estimasi belanja tidak langsung tahun anggaran berjalan.
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>
    @endforeach
</div>
@endsection
