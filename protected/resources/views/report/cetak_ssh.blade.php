<?php
use App\CekAkses;
use hoaaah\LaravelMenu\Menu;
?>

@extends('layouts.app0')
<meta name="_token" content="{!! csrf_token() !!}" />


<style>
    h2 {
        font-size: 50px;
        font-weight: 300;
        margin-bottom: 10px;
        line-height: 50px;
    }

    .highlight {
        color: #2ac5ed;
    }

    #content {
        padding: 70px 0;
    }
</style>

@section('content')
<div class="container-fluid">
    <section id="content" class="current">
        <div class="container ">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 text-center">
                    <h2 style="font-size: 40px;line-height: 60px;margin-bottom: 10px;font-weight: 900;"><span
                            class="highlight">Pencetakan Standar Satuan Harga</span></h2>
                    <br>
                </div>
            </div>
            <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="cb_no_perda" style="color:#fff;" class="col-sm-3 control-label" align='left'>Nomor
                        Perkada SSH :</label>
                    <div class="col-sm-8">
                        <select class="form-control select2 cb_no_perda" name="cb_no_perda" id="cb_no_perda"></select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="cb_zona" style="color:#fff;" class="col-sm-3 control-label" align='left'>Zona SSH
                        :</label>
                    <div class="col-sm-8">
                        <select class="form-control select2 cb_zona" name="cb_zona" id="cb_zona"></select>
                    </div>
                </div>
                <hr>
                <div class="form-group ">
                    <label for="cb_golongan" style="color:#fff;" class="col-sm-3 control-label" align='left'>Golongan
                        SSH :</label>
                    <div class="col-sm-8">
                        <select class="form-control select2 cb_golongan" name="cb_golongan" id="cb_golongan"></select>
                    </div>
                </div>
                <div class="form-group ">
                    <label for="cb_kelompok" style="color:#fff;" class="col-sm-3 control-label" align='left'>Kelompok
                        SSH :</label>
                    <div class="col-sm-8">
                        <select class="form-control select2 cb_kelompok" name="cb_kelompok" id="cb_kelompok"></select>
                    </div>
                </div>
                <div class="form-group ">
                    <label for="cb_subkelompok" style="color:#fff;" class="col-sm-3 control-label" align='left'>Sub
                        Kelompok SSH :</label>
                    <div class="col-sm-8">
                        <select class="form-control select2 cb_subkelompok" name="cb_subkelompok"
                            id="cb_subkelompok"></select>
                    </div>
                </div>
                <div class="form-group ">
                    <label class="control-label col-sm-3" for="hal_mulai" style="color:#fff; text-align: left;">Halaman
                        Mulai</label>
                    <div class="col-sm-1">
                        <input type="text" class="form-control number" id="hal_mulai" name="hal_mulai" value="1"
                            style="text-align: center;">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="jns_laporan" style="color:#fff;">Jenis Laporan :</label>
                    <div class="col-sm-8">
                        <select class="form-control select2 jns_laporan" name="jns_laporan" id="jns_laporan"></select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3"></label>
                    <div class="col-sm-8 text-left">
                        <button type="button" class="btn btn-labeled btn-success btnProses"><span class="btn-label"><i
                                    class="fa fa-print fa-lg fa-fw"></i></span> Proses</button>
                    </div>
                </div>
            </form>

        </div>
    </section>
</div>
@endsection

@section('scripts')
<script src="{{ asset('/protected/resources/views/report/js/js_cetak_ssh.js')}}"></script>
@endsection