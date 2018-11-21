<?php
use App\CekAkses;
use hoaaah\LaravelMenu\Menu;
?>

@extends('layouts.app4')
<meta name="_token" content="{!! csrf_token() !!}" />

@section('content')
<div class="container-fluid">
<section id="content" class="current">
    <div class="container text-center">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h4 style="font-size: 32px;line-height: 60px;margin-bottom: 10px;font-weight: 900;"><span class="highlight">Pohon Kinerja Dokumen Perencanaan</span></h4>
                <br>
            </div>
        </div>
        <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group">
                <label for="cb_no_perda" class="col-sm-3 control-label" align='left'>Nomor Perda RPJMD:</label>
                <div class="col-sm-8">
                    <select class="form-control cb_no_perda" name="cb_no_perda" id="cb_no_perda"></select>
                </div>
              </div>
              <hr>
              <div class="form-group">
                    <label for="urusan_pokin" class="col-sm-3 control-label" align='left'>Urusan :</label>
                    <div class="col-sm-8">
                        <select class="form-control urusan_pokin" name="urusan_pokin" id="urusan_pokin"></select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="bidang_pokin">Bidang :</label>
                    <div class="col-sm-8">
                        <select class="form-control bidang_pokin" name="bidang_pokin" id="bidang_pokin"></select>
                    </div>
                </div>
              <div class="form-group">
                    <label for="cb_unit_renstra" class="col-sm-3 control-label" align='left'>Unit Renstra:</label>
                    <div class="col-sm-8">
                        <select class="form-control cb_unit_renstra" name="cb_unit_renstra" id="cb_unit_renstra"></select>
                    </div>
                </div>
              <div class="form-group">
                    <label for="cb_no_renstra" class="col-sm-3 control-label" align='left'>Nomor Dokumen Renstra:</label>
                    <div class="col-sm-8">
                        <select class="form-control cb_no_renstra" name="cb_no_renstra" id="cb_no_renstra"></select>
                    </div>
                </div>
                <hr>
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
    url: './cetak/getDokumenRpjmd',
    dataType: "json",
    success: function(data) {
        var j = data.length;
        var post, i;

        $('select[name="cb_no_perda"]').empty();
        $('select[name="cb_no_perda"]').append('<option value="-1">Pilih Nomor Perda RPJMD</option>');

        for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="cb_no_perda"]').append('<option value="'+ post.id_rpjmd +'">'+ post.no_perda +'</option>');

        }
    }
});

$.ajax({
    type: "GET",
    url: 'pokin/jenis_pokin',
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
    url: './admin/parameter/getUrusan',
    dataType: "json",
    success: function(data) {
        var j = data.length;
        var post, i;

        $('select[name="urusan_pokin"]').empty();
        $('select[name="urusan_pokin"]').append('<option value="-1">---Pilih Urusan---</option>');

        for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="urusan_pokin"]').append('<option value="'+ post.kd_urusan +'">'+ post.nm_urusan +'</option>');

        }
    }
});

$( ".urusan_pokin" ).change(function() {
    $.ajax({
        type: "GET",
        url: './admin/parameter/getBidang/'+$('#urusan_pokin').val(),
        dataType: "json",
        success: function(data) {
          var j = data.length;
          var post, i;

          $('select[name="bidang_pokin"]').empty();
          $('select[name="bidang_pokin"]').append('<option value="-1">---Pilih  Bidang---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="bidang_pokin"]').append('<option value="'+ post.id_bidang +'">'+ post.nm_bidang +'</option>');
          }
        }
    });
});

$( ".bidang_pokin" ).change(function() {  
    $.ajax({
        type: "GET",
        url: './admin/parameter/getUnit2/'+$('#bidang_pokin').val(),
        dataType: "json",
        success: function(data) {
          var j = data.length;
          var post, i;

          $('select[name="cb_unit_renstra"]').empty();
          $('select[name="cb_unit_renstra"]').append('<option value="-1">---Pilih Unit---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="cb_unit_renstra"]').append('<option value="'+ post.id_unit +'">'+ post.nm_unit +'</option>');
          }
        }
    });
});

$( ".cb_unit_renstra" ).change(function() { 
    $.ajax({
    type: "GET",
    url: './cetak/getDokumenRenstra/'+$('#cb_unit_renstra').val(),
    dataType: "json",
    success: function(data) {
        var j = data.length;
        var post, i;

        $('select[name="cb_no_renstra"]').empty();
        $('select[name="cb_no_renstra"]').append('<option value="-1">Pilih Nomor Dokumen Renstra</option>');

        for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="cb_no_renstra"]').append('<option value="'+ post.id_renstra +'">'+ post.nomor_renstra +'</option>');

        }
    }
    });
});

$(document).on('click', '.btnProses', function() {
    if($('#jns_laporan').val()==1){
        window.location.replace("pokin/getRpjmdChart/"+$('#cb_no_perda').val()); 
    };
    if($('#jns_laporan').val()==2){
        window.location.replace("pokin/getRenstraChart/"+$('#cb_no_renstra').val()+"/"+$('#cb_unit_renstra').val()); 
    }; 
});


});
</script>
@endsection

