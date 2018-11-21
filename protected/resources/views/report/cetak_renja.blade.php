<?php
use App\CekAkses;
use hoaaah\LaravelMenu\Menu;
?>

@extends('layouts.app')
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
    #content .features-list {
        padding-top: 35px;
    }
    .features-list .feature-block {
        margin-bottom: 18px;
    }
    .features-list .feature-block .ico {
        font-size: 37px;
        line-height: 70px;
        width:70px;
        height: 70px;
        background: #5accff;
        display: inline-block;
        border-radius: 50%;
        color: #FFFFFF;
        margin-bottom: 10px;
    }

    .features-list .feature-block .ico-primary {
        font-size: 37px;
        line-height: 70px;
        width:70px;
        height: 70px;
        background: #428bca;
        display: inline-block;
        border-radius: 50%;
        color: #FFFFFF;
        margin-bottom: 10px;
    }

    .features-list .feature-block .ico-warning {
        font-size: 37px;
        line-height: 70px;
        width:70px;
        height: 70px;
        background: #f0ad4e;
        display: inline-block;
        border-radius: 50%;
        color: #FFFFFF;
        margin-bottom: 10px;
    }

    .features-list .feature-block .ico-danger {
        font-size: 37px;
        line-height: 70px;
        width:70px;
        height: 70px;
        background: #d9534f;
        display: inline-block;
        border-radius: 50%;
        color: #FFFFFF;
        margin-bottom: 10px;
    }

    .features-list .feature-block .ico-info {
        font-size: 37px;
        line-height: 70px;
        width:70px;
        height: 70px;
        background: #5bc0de;
        display: inline-block;
        border-radius: 50%;
        color: #FFFFFF;
        margin-bottom: 10px;
    }

    .features-list .feature-block .ico-success {
        font-size: 37px;
        line-height: 70px;
        width:70px;
        height: 70px;
        background: #5cb85c;
        display: inline-block;
        border-radius: 50%;
        color: #FFFFFF;
        margin-bottom: 10px;
    }

    .features-list .feature-block.bottom-line .ico {
        width: auto;
        height: auto;
      background: transparent;
      color: #5accff;
      text-align: center;
      font-size: 41px;
      vertical-align: top;
      margin-top: -10px;
    }
    .features-list .feature-block.bottom-line .fa-github {
      font-size: 50px;
    }
    .features-list .feature-block.bottom-line .fa-dashboard {
      font-size: 45px;
      margin-top: -15px;
    }
    .features-list .feature-block.bottom-line .ico {
      float: left;
      margin-right: 15px;
      margin-left: 21px;
    }
    .features-list .feature-block.bottom-line .features-content {
      padding-right: 15px;
      display: table;
    }
    .features-list .feature-block.bottom-line .features-content .name {
      margin-bottom: 5px;
    }
    .features-list .feature-block.bottom-line .features-content .subname {
      font-size: 16px;
      margin-bottom: 12px;
    }
    .features-list .feature-block .name {
        font-size: 16px;
        line-height: 1.25em;
        font-weight: bold;
        margin-bottom: 10px;
    }
    .features-list .feature-block .text {
        font-size: 12px;
        line-height: normal;
        margin-bottom: 15px;
    }
                
</style>

@section('content')
<div class="container-fluid">
<section id="content" class="current">
    <div class="container text-center">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h2 style="font-size: 40px;line-height: 60px;margin-bottom: 10px;font-weight: 900;"><span class="highlight">Laporan Rencana Kerja Tahunan</span></h2>
                <br>
            </div>
        </div>
        <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group">
                <label for="tahun_prarka" class="col-sm-3 control-label" align='left'>Tahun :</label>
                <div class="col-sm-8">
                    <select class="form-control tahun_prarka" name="tahun_prarka" id="tahun_prarka"></select>
                </div>
              </div>
              <div class="form-group">
                <label for="urusan_prarka" class="col-sm-3 control-label" align='left'>Urusan :</label>
                <div class="col-sm-8">
                    <select class="form-control urusan_prarka" name="urusan_prarka" id="urusan_prarka"></select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="bidang_prarka">Bidang :</label>
                <div class="col-sm-8">
                    <select class="form-control bidang_prarka" name="bidang_prarka" id="bidang_prarka"></select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="unit_prarka">Unit :</label>
                <div class="col-sm-8">
                    <select class="form-control unit_prarka" name="unit_prarka" id="unit_prarka"></select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="sub_prarka2">Sub Unit :</label>
                <div class="col-sm-8">
                    <select class="form-control sub_prarka2" name="sub_prarka2" id="sub_prarka2"></select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="prog_prarka">Program :</label>
                <div class="col-sm-8">
                    <select class="form-control prog_prarka" name="prog_prarka" id="prog_prarka"></select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="keg_prarka">Kegiatan :</label>
                <div class="col-sm-8">
                    <select class="form-control keg_prarka" name="keg_prarka" id="keg_prarka"></select>
                </div>
              </div> 
              <div class="form-group">
                <label class="control-label col-sm-3" for="jns_laporan">Jenis Laporan :</label>
                <div class="col-sm-8">
                    <select class="form-control jns_laporan" name="jns_laporan" id="jns_laporan"></select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="jns_laporan"></label>
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
    url: '../admin/parameter/getUrusan',
    dataType: "json",
    success: function(data) {
        var j = data.length;
        var post, i;

        $('select[name="urusan_prarka"]').empty();
        $('select[name="urusan_prarka"]').append('<option value="-1">---Pilih Urusan---</option>');

        for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="urusan_prarka"]').append('<option value="'+ post.kd_urusan +'">'+ post.nm_urusan +'</option>');

        }
    }
});

$.ajax({
    type: "GET",
    url: './jenis_renja',
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
    url: '../admin/parameter/getTahun',
    dataType: "json",
    success: function(data) {
        var j = data.length;
        var post, i;

        $('select[name="tahun_prarka"]').empty();
        $('select[name="tahun_prarka"]').append('<option value="-1">---Pilih Tahun---</option>');

        for (i = 0; i < j; i++) {
          post = data[i];
          $('select[name="tahun_prarka"]').append('<option value="'+ post.tahun +'">'+ post.tahun +'</option>');
        }
    }
});

$( ".urusan_prarka" ).change(function() {
    $.ajax({
        type: "GET",
        url: '../admin/parameter/getBidang/'+$('#urusan_prarka').val(),
        dataType: "json",
        success: function(data) {
          var j = data.length;
          var post, i;

          $('select[name="bidang_prarka"]').empty();
          $('select[name="bidang_prarka"]').append('<option value="-1">---Pilih  Bidang---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="bidang_prarka"]').append('<option value="'+ post.id_bidang +'">'+ post.nm_bidang +'</option>');
          }
        }
    });
});

$( ".bidang_prarka" ).change(function() {  
    $.ajax({
        type: "GET",
        url: '../admin/parameter/getUnit2/'+$('#bidang_prarka').val(),
        dataType: "json",
        success: function(data) {
          var j = data.length;
          var post, i;

          $('select[name="unit_prarka"]').empty();
          $('select[name="unit_prarka"]').append('<option value="-1">---Pilih Unit---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="unit_prarka"]').append('<option value="'+ post.id_unit +'">'+ post.nm_unit +'</option>');
          }
        }
    });
});

$( ".unit_prarka" ).change(function() { 
    $.ajax({
        type: "GET",
        url: 'getProgramRancanganRenja/'+$('#unit_prarka').val()+'/'+$('#tahun_prarka').val(),
        dataType: "json",
        success: function(data) {
          var j = data.length;
          var post, i;

          $('select[name="prog_prarka"]').empty();
          $('select[name="prog_prarka"]').append('<option value="-1">---Pilih Program---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="prog_prarka"]').append('<option value="'+ post.id_renja_program +'">'+ post.uraian_program_renstra +'</option>');
          }
        }
    });
    $.ajax({
        type: "GET",
        url: '../admin/parameter/getSub2/'+$('#unit_prarka').val(),
        dataType: "json",

        success: function(data) {
          var j = data.length;
          var post, i;

          $('select[name="sub_prarka2"]').empty();
          $('select[name="sub_prarka2"]').append('<option value="-1">---Pilih Sub Unit---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="sub_prarka2"]').append('<option value="'+ post.id_sub_unit +'">'+ post.nm_sub +'</option>');
          }
        }
    });

});

$( ".prog_prarka" ).change(function() {  
    $.ajax({
        type: "GET",
        url: 'getKegiatanRancanganRenja/'+$('#prog_prarka').val(),
        dataType: "json",
        success: function(data) {
          var j = data.length;
          var post, i;

          $('select[name="keg_prarka"]').empty();
          $('select[name="keg_prarka"]').append('<option value="-1">---Pilih Kegiatan---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="keg_prarka"]').append('<option value="'+ post.id_renja +'">'+ post.uraian_kegiatan_renstra +'</option>');
          }
        }
    });
});


$(document).on('click', '.btnProses', function() {
    if($('#jns_laporan').val()==1){
       window.open('../PrintKompilasiKegiatandanPaguRenja/'+ $('#unit_prarka').val()+'/'+ $('#tahun_prarka').val()); 
    };
    if($('#jns_laporan').val()==2){
       window.open('../PrintRingkasAPBD/'+$('#tahun_prarka').val()); 
    };
    if($('#jns_laporan').val()==3){
       window.open('../PrintAPBD/'+$('#tahun_prarka').val()); 
    };
    if($('#jns_laporan').val()==4){
       window.open('../PrintPraRKA2/'+$('#sub_prarka2').val()+'/'+$('#tahun_prarka').val()); 
    };
    if($('#jns_laporan').val()==5){
       window.open('../PrintPraRKA/'+$('#keg_prarka').val()+'/'+$('#sub_prarka2').val()); 
    };
    if($('#jns_laporan').val()==6){
       window.open('../PrintKompilasiAktivitasRenja/'+$('#keg_prarka').val()); 
    };
    if($('#jns_laporan').val()==7){
       window.open('../PrintRingkasanRenjaUrusan/'+$('#tahun_prarka').val()); 
    };
    if($('#jns_laporan').val()==8){
       window.open('../PrintRingkasanRenjaUrusan1/'+$('#tahun_prarka').val()); 
    };
    if($('#jns_laporan').val()==10){
       window.open('../PrintKompilasiProgramRanwalRenja/'+ $('#unit_prarka').val()+'/'+$('#tahun_prarka').val()); 
    };
    if($('#jns_laporan').val()==9){
       window.open('../PrintKompilasiKegiatanRanwalRenja/'+ $('#unit_prarka').val()+'/'+$('#tahun_prarka').val()); 
    };
    if($('#jns_laporan').val()==11){
       window.open('../CekRanwalRenja/'+$('#tahun_prarka').val()); 
    };    
});


});
</script>
@endsection

