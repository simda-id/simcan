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
    <div class="container text-center">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h2 style="font-size: 40px;line-height: 60px;margin-bottom: 10px;font-weight: 900;"><span class="highlight">Pencetakan Standar Satuan Harga</span></h2>
                <br>
            </div>
        </div>
        <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="cb_no_perda" class="col-sm-3 control-label" align='left'>Nomor Perkada SSH :</label>
                <div class="col-sm-8">
                    <select class="form-control cb_no_perda" name="cb_no_perda" id="cb_no_perda"></select>
                </div>
            </div>
            <div class="form-group">
                <label for="cb_zona" class="col-sm-3 control-label" align='left'>Zona SSH :</label>
                <div class="col-sm-8">
                    <select class="form-control cb_zona" name="cb_zona" id="cb_zona"></select>
                </div>
            </div>
            <hr>
            <div class="form-group hidden">
                <label for="cb_golongan" class="col-sm-3 control-label" align='left'>Golongan SSH :</label>
                <div class="col-sm-8">
                    <select class="form-control cb_golongan" name="cb_golongan" id="cb_golongan"></select>
                </div>
            </div>
            <div class="form-group hidden">
                <label for="cb_kelompok" class="col-sm-3 control-label" align='left'>Kelompok SSH :</label>
                <div class="col-sm-8">
                    <select class="form-control cb_kelompok" name="cb_kelompok" id="cb_kelompok"></select>
                </div>
            </div>
            <div class="form-group hidden">
                <label for="cb_subkelompok" class="col-sm-3 control-label" align='left'>Sub Kelompok SSH :</label>
                <div class="col-sm-8">
                    <select class="form-control cb_subkelompok" name="cb_subkelompok" id="cb_subkelompok"></select>
                </div>
            </div>
            {{-- <hr> --}}
            <div class="form-group">
                <label class="control-label col-sm-3" for="jns_laporan">Jenis Laporan :</label>
                <div class="col-sm-8">
                    <select class="form-control jns_laporan" name="jns_laporan" id="jns_laporan"></select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3"></label>
                <div class="col-sm-8 text-left">
                    <button type="button" class="btn btn-labeled btn-success btnProses"><span class="btn-label"><i class="fa fa-print fa-lg fa-fw"></i></span> Proses</button>  
                </div>
            </div>                            
        </form>

    </div>
</section>
</div> 
@endsection

@section('scripts')
<script>
$(document).ready(function(){

$.ajax({
    type: "GET",
    url: './cetakssh/getPerkadaSsh',
    dataType: "json",
    success: function(data) {
        var j = data.length;
        var post, i;

        $('select[name="cb_no_perda"]').empty();
        $('select[name="cb_no_perda"]').append('<option value="-1">Pilih Nomor Perkada SSH</option>');

        for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="cb_no_perda"]').append('<option value="'+ post.id_perkada +'">'+ post.nomor_perkada +' (Berlaku:'+post.tahun_berlaku+')</option>');

        }
    }
});

$( ".cb_no_perda" ).change(function() {
    $.ajax({
        type: "GET",
        url: './cetakssh/getZonaPerkada/'+$('#cb_no_perda').val(),
        dataType: "json",
        success: function(data) {
          var j = data.length;
          var post, i;

          $('select[name="cb_zona"]').empty();
          $('select[name="cb_zona"]').append('<option value="-1">---Semua Zona---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="cb_zona"]').append('<option value="'+ post.id_zona +'">'+ post.keterangan_zona +'</option>');
          }
        }
    });
});


$.ajax({
    type: "GET",
    url: './cetakssh/jenis_report_ssh',
    dataType: "json",
    success: function(data) {
        var j = data.length;
        var post, i;

        for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="jns_laporan"]').append('<option value="'+ post.id +'">'+ post.uraian_laporan +'</option>');
        }
    }
});

$.ajax({
    type: "GET",
    url: './cetakssh/getGolonganSsh',
    dataType: "json",
    success: function(data) {
        var j = data.length;
        var post, i;

        $('select[name="cb_golongan"]').empty();
        $('select[name="cb_golongan"]').append('<option value="-1">---Semua Golongan SSH---</option>');

        for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="cb_golongan"]').append('<option value="'+ post.id_golongan_ssh +'">'+ post.uraian_golongan_ssh +'</option>');
        }
    }
});

$( ".cb_golongan" ).change(function() {
    $.ajax({
        type: "GET",
        url: './cetakssh/getKelompokSsh/'+$('#cb_golongan').val(),
        dataType: "json",
        success: function(data) {
          var j = data.length;
          var post, i;

          $('select[name="cb_kelompok"]').empty();
          $('select[name="cb_kelompok"]').append('<option value="-1">---Semua Kelompok SSH---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="cb_kelompok"]').append('<option value="'+ post.id_kelompok_ssh +'">'+ post.uraian_kelompok_ssh +'</option>');
          }
        }
    });
});

$( ".cb_kelompok" ).change(function() {
    $.ajax({
        type: "GET",
        url: './cetakssh/getSubKelompokSsh/'+$('#cb_kelompok').val(),
        dataType: "json",
        success: function(data) {
          var j = data.length;
          var post, i;

          $('select[name="cb_subkelompok"]').empty();
          $('select[name="cb_subkelompok"]').append('<option value="-1">---Semua Sub Kelompok SSH---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="cb_subkelompok"]').append('<option value="'+ post.id_sub_kelompok_ssh +'">'+ post.uraian_sub_kelompok_ssh +'</option>');
          }
        }
    });
});

$(document).on('click', '.btnProses', function() {
    if($('#jns_laporan').val()==1){
        window.open('./printGolonganSsh'); 
    };
    if($('#jns_laporan').val()==2){
        window.open('./printKelompokSsh'); 
    };
    if($('#jns_laporan').val()==3){
        window.open('./printSubKelompokSsh'); 
    };
    if($('#jns_laporan').val()==4){
        window.open('./printTarifSsh'); 
    };
    if($('#jns_laporan').val()==5){
        window.open('./printPerkadaSsh/'+$('#cb_no_perda').val()+'/'+$('#cb_zona').val()); 
    };   
});


});
</script>
@endsection

