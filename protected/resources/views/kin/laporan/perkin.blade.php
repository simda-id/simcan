<?php
use App\CekAkses;
use hoaaah\LaravelMenu\Menu;
?>

@extends('layouts.app4')
<meta name="_token" content="{!! csrf_token() !!}" />

@section('content')
<div class="container-fluid">   
        <div id="pesan"></div>
        <div id="prosesbar" class="lds-spinner">
          <div></div><div></div><div></div><div></div>
          <div></div><div></div><div></div><div></div>
          <div></div><div></div><div></div><div></div>
        </div>
        <div class="container text-center">
        <div class="row">
            <h4 style="font-size: 32px;line-height: 60px;margin-bottom: 10px;font-weight: 900;color:#fff;"><span class="highlight">Pelaporan Kinerja SAKIP</span></h4>
            <hr style="border-top: 3px double #fff">
        </div>
        </div>
        <div class="col-sm-6" style="border-right : 3px double #fff;">
        <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="cb_tahun" class="col-sm-3 control-label" align='left' style="color:#fff;">Tahun</label>
                    <div class="col-sm-8">
                        <select class="form-control cb_tahun" name="cb_tahun" id="cb_tahun"></select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="cb_triwulan" class="col-sm-3 control-label" align='left' style="color:#fff;">Triwulan</label>
                    <div class="col-sm-8">
                        <select class="form-control cb_triwulan" name="cb_triwulan" id="cb_triwulan">
                            <option value=0>Semua Triwulan</option>
                            <option value=1>Triwulan 1</option>
                            <option value=2>Triwulan 2</option>
                            <option value=3>Triwulan 3</option>
                            <option value=4>Triwulan 4</option>
                        </select>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="cb_no_perda" class="col-sm-3 control-label" align='left' style="color:#fff;">Nomor Perda RPJMD</label>
                    <div class="col-sm-8">
                        <select class="form-control cb_no_perda" name="cb_no_perda" id="cb_no_perda"></select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="cb_iku_pemda" class="col-sm-3 control-label" align='left' style="color:#fff;">Nomor Dokumen IKU Pemda</label>
                    <div class="col-sm-8">
                        <select class="form-control cb_iku_pemda" name="cb_iku_pemda" id="cb_iku_pemda"></select>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="urusan_pokin" class="col-sm-3 control-label" align='left' style="color:#fff;">Urusan</label>
                    <div class="col-sm-8">
                        <select class="form-control urusan_pokin" name="urusan_pokin" id="urusan_pokin"></select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="bidang_pokin" style="color:#fff;">Bidang</label>
                    <div class="col-sm-8">
                        <select class="form-control bidang_pokin" name="bidang_pokin" id="bidang_pokin"></select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="cb_unit_renstra" class="col-sm-3 control-label" align='left' style="color:#fff;">Unit Renstra</label>
                    <div class="col-sm-8">
                        <select class="form-control cb_unit_renstra" name="cb_unit_renstra" id="cb_unit_renstra"></select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="cb_level_1" class="col-sm-3 control-label" align='left' style="color:#fff;">Jabatan Eselon Level 1</label>
                    <div class="col-sm-8">
                        <select class="form-control cb_level_1" name="cb_level_1" id="cb_level_1"></select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="cb_level_2" class="col-sm-3 control-label" align='left' style="color:#fff;">Jabatan Eselon Level 2</label>
                    <div class="col-sm-8">
                        <select class="form-control cb_level_2" name="cb_level_2" id="cb_level_2"></select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="cb_level_3" class="col-sm-3 control-label" align='left' style="color:#fff;">Jabatan Eselon Level 3</label>
                    <div class="col-sm-8">
                        <select class="form-control cb_level_3" name="cb_level_3" id="cb_level_3"></select>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="cb_no_renstra" class="col-sm-3 control-label" align='left' style="color:#fff;">Nomor Dokumen Renstra</label>
                    <div class="col-sm-8">
                        <select class="form-control cb_no_renstra" name="cb_no_renstra" id="cb_no_renstra"></select>
                    </div>
                </div>
                <div class="form-group">
                  <label for="cb_iku_opd" class="col-sm-3 control-label" align='left' style="color:#fff;">Nomor Dokumen IKU OPD</label>
                  <div class="col-sm-8">
                      <select class="form-control cb_iku_opd" name="cb_iku_opd" id="cb_iku_opd"></select>
                  </div>
                </div>
                <hr>
                                        
        </form>
        </div>
        <div class="col-sm-6" >
            <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
                <div class="form-group">
                    <label class="control-label col-sm-3" for="nama_kota_lap" style="color:#fff;">Kota Laporan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nama_kota_lap" name="nama_kota_lap">
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <label for="tgl_laporan" class="col-sm-3 control-label" style="color:#fff;">Tanggal Laporan </label>
                    <input type="hidden" name="tgl_laporan" id="tgl_laporan">
                    <div class="col-sm-5">
                        <input type="text" class="form-control datepicker" id="tgl_laporan_x" name="tgl_laporan_x" style="text-align: center;">
                        <i class="fa fa-calendar fa-fw fa-lg text-primary form-control-feedback"></i>              
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="jns_laporan" style="color:#fff;">Jenis Laporan</label>
                    <div class="col-sm-8">
                        <select class="form-control jns_laporan" name="jns_laporan" id="jns_laporan" size="25"></select>
                    </div>
                </div>
                <div class="form-group hidden">
                        <label class="control-label col-sm-3" for="jns_laporan" style="color:#fff;">Catatan Jenis Laporan</label>
                    <div class="col-sm-8">
                        <textarea type="name" class="form-control" id="catatan_jenis_laporan" rows="3" readonly ></textarea>
                    </div>
                </div> 
                <div class="form-group">
                    <label class="control-label col-sm-3"></label>
                    <div class="col-sm-8 text-left">
                        <button type="button" class="btn btn-lg btn-labeled btn-success btnProses"><span class="btn-label"><i class="fa fa-print fa-lg fa-fw"></i></span> Proses</button>  
                    </div>
                </div>
            </form>    
        </div>
</div> 
@endsection

@section('scripts')
<script>
$(document).ready(function(){

function formatTgl(val_tanggal){
    var formattedDate = new Date(val_tanggal);
    var d = formattedDate.getDate();
    var m = formattedDate.getMonth();
    var y = formattedDate.getFullYear();
    var m_names = new Array("Januari", "Februari", "Maret", 
        "April", "Mei", "Juni", "Juli", "Agustus", "September", 
        "Oktober", "November", "Desember")

    var tgl= d + " " + m_names[m] + " " + y;
    return tgl;
}

function hariIni(){
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();

    var hariIni = yyyy + '-' + mm + '-' + dd;
    return hariIni;
}

function createPesan(message, type) {
    var html = '<div id="pesanx" class="alert alert-' + type + ' alert-dismissable flyover flyover-centered in">';    
    html += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';   
    html += '<p><strong>'+message+'</strong></p>';
    html += '</div>';    
    $(html).hide().prependTo('#pesan').slideDown();
};

var msg = '{{Session::get('alert')}}';
var exist = '{{Session::has('alert')}}';
if(exist){createPesan(msg,"danger")};

$('#prosesbar').hide();
$('#tgl_laporan_x').val(formatTgl(hariIni()));

$('#tgl_laporan_x').datepicker({
    altField: "#tgl_laporan",
    altFormat: "yy-mm-dd", 
    dateFormat: "dd MM yy",
});

$.ajax({
    type: "GET",
    url: './cetak/getDokumenRpjmd',
    dataType: "json",
    success: function(data) {
        var j = data.length;
        var post, i;

        $('select[name="cb_no_perda"]').empty();
        $('select[name="cb_no_perda"]').append('<option value="-1">---Pilih Nomor Perda RPJMD---</option>');

        for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="cb_no_perda"]').append('<option value="'+ post.id_rpjmd +'">'+ post.no_perda +'</option>');

        }
    }
});

$.ajax({
    type: "GET",
    url: 'lapor/jenis_pokin',
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

$.ajax({
    type: "GET",
    url: 'lapor/getDokIkuPemda',
    dataType: "json",
    success: function(data) {
        var j = data.length;
        var post, i;

        $('select[name="cb_iku_pemda"]').empty();
        $('select[name="cb_iku_pemda"]').append('<option value="-1">---Pilih Nomor Dokumen IKU Pemda---</option>');

        for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="cb_iku_pemda"]').append('<option value="'+ post.id_rpjmd +'">'+ post.no_dokumen +'</option>');

        }
    }
});

$.ajax({
    type: "GET",
    url: 'lapor/getTahun',
    dataType: "json",
    success: function(data) {
        var j = data.length;
        var post, i;

        $('select[name="cb_tahun"]').empty();
        $('select[name="cb_tahun"]').append('<option value="-1">---Pilih Tahun Kinerja---</option>');

        for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="cb_tahun"]').append('<option value="'+ post.tahun +'">'+ post.tahun +'</option>');

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

    $.ajax({
    type: "GET",
    url: 'lapor/getDokIkuOPD/'+$('#cb_unit_renstra').val(),
    dataType: "json",
    success: function(data) {
        var j = data.length;
        var post, i;

        $('select[name="cb_iku_opd"]').empty();
        $('select[name="cb_iku_opd"]').append('<option value="-1">Pilih Nomor Dokumen IKU OPD</option>');

        for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="cb_iku_opd"]').append('<option value="'+ post.id_dokumen +'">'+ post.no_dokumen +'</option>');

        }
    }
    });

    $.ajax({
    type: "GET",
    url: 'lapor/getSotkLevel1/'+$('#cb_unit_renstra').val(),
    dataType: "json",
    success: function(data) {
        var j = data.length;
        var post, i;

        $('select[name="cb_level_1"]').empty();
        $('select[name="cb_level_1"]').append('<option value="-1">---Pilih Jabatan Eselon Level 1---</option>');

        for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="cb_level_1"]').append('<option value="'+ post.id_sotk_es2 +'">'+ post.nama_eselon +'</option>');

        }
    }
    });

});

$( ".cb_level_1" ).change(function() {  
    $.ajax({
        type: "GET",
        url: 'lapor/getSotkLevel2/'+$('#cb_level_1').val(),
        dataType: "json",
        success: function(data) {
          var j = data.length;
          var post, i;

          $('select[name="cb_level_2"]').empty();
          $('select[name="cb_level_2"]').append('<option value="-1">---Pilih Jabatan Eselon Level 2---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="cb_level_2"]').append('<option value="'+ post.id_sotk_es3 +'">'+ post.nama_eselon3 +'</option>');
          }
        }
    });
});

$( ".cb_level_2" ).change(function() {  
    $.ajax({
        type: "GET",
        url: 'lapor/getSotkLevel3/'+$('#cb_level_2').val(),
        dataType: "json",
        success: function(data) {
          var j = data.length;
          var post, i;

          $('select[name="cb_level_3"]').empty();
          $('select[name="cb_level_3"]').append('<option value="-1">---Pilih Jabatan Eselon Level 3---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="cb_level_3"]').append('<option value="'+ post.id_sotk_es4 +'">'+ post.nama_eselon4 +'</option>');
          }
        }
    });
});

$( ".jns_laporan" ).change(function() {  
    $('#catatan_jenis_laporan').val($('.jns_laporan').val());
});

$(document).on('click', '.btnProses', function(e) {
    if($('#jns_laporan').val()==1){
        window.open('./lapor/CetakMatrikRpjmd/'+$('#cb_no_perda').val()); 
    };
    if($('#jns_laporan').val()==2){
        window.open('./lapor/CetakRenstra/'+$('#cb_unit_renstra').val()+'/'+ $('#cb_no_renstra').val()); 
    };
    if($('#jns_laporan').val()==3){        
       window.open('./lapor/CetakRKT/'+$('#cb_unit_renstra').val()); 
    };
    if($('#jns_laporan').val()==4){
        vars = "?token="     + $('input[name=_token]').val();
        vars += "&tahun="     + $('#cb_tahun').val();
        vars += "&kota="   + $('#nama_kota_lap').val();
        vars += "&tanggal="   + $('#tgl_laporan_x').val();        
        window.open('./lapor/CetakPerkinPemdaBA'+ vars, '_blank'); 
    };
    
    if($('#jns_laporan').val()==17){ 
        vars = "?token="     + $('input[name=_token]').val();
        vars += "&tahun="     + $('#cb_tahun').val();
        vars += "&kota="   + $('#nama_kota_lap').val();
        vars += "&tanggal="   + $('#tgl_laporan_x').val();
        window.open('./lapor/CetakPerkinPemdaLamp' + vars, '_blank');
    };

    if($('#jns_laporan').val()==10){  
        vars = "?token="     + $('input[name=_token]').val();
        vars += "&tahun="     + $('#cb_tahun').val();
        vars += "&unit="     + $('#cb_unit_renstra').val();
        vars += "&kota="   + $('#nama_kota_lap').val();
        vars += "&tanggal="   + $('#tgl_laporan_x').val();        
        window.open('./lapor/CetakPerkinOPDBA'+ vars, '_blank');
    }; 
    if($('#jns_laporan').val()==18){
        vars = "?token="     + $('input[name=_token]').val();
        vars += "&tahun="     + $('#cb_tahun').val();
        vars += "&unit="     + $('#cb_unit_renstra').val();
        vars += "&kota="   + $('#nama_kota_lap').val();
        vars += "&tanggal="   + $('#tgl_laporan_x').val();        
        window.open('./lapor/CetakPerkinOPDLamp'+ vars, '_blank'); 
    }; 
    if($('#jns_laporan').val()==11){
        vars = "?token="     + $('input[name=_token]').val();
        vars += "&tahun="     + $('#cb_tahun').val();
        vars += "&unit="     + $('#cb_level_2').val();
        vars += "&kota="   + $('#nama_kota_lap').val();
        vars += "&tanggal="   + $('#tgl_laporan_x').val();        
        window.open('./lapor/CetakPerkinEs3BA'+ vars, '_blank'); 
    }; 
    if($('#jns_laporan').val()==19){
        vars = "?token="     + $('input[name=_token]').val();
        vars += "&tahun="     + $('#cb_tahun').val();
        vars += "&unit="     + $('#cb_level_2').val();
        vars += "&kota="   + $('#nama_kota_lap').val();
        vars += "&tanggal="   + $('#tgl_laporan_x').val();        
        window.open('./lapor/CetakPerkinEs3Lamp'+ vars, '_blank');  
    };
    if($('#jns_laporan').val()==12){ 
        vars = "?token="     + $('input[name=_token]').val();
        vars += "&tahun="     + $('#cb_tahun').val();
        vars += "&unit="     + $('#cb_level_3').val();
        vars += "&kota="   + $('#nama_kota_lap').val();
        vars += "&tanggal="   + $('#tgl_laporan_x').val();        
        window.open('./lapor/CetakPerkinEs4BA'+ vars, '_blank'); 
    };
    if($('#jns_laporan').val()==20){  
        vars = "?token="     + $('input[name=_token]').val();
        vars += "&tahun="     + $('#cb_tahun').val();
        vars += "&unit="     + $('#cb_level_3').val();
        vars += "&kota="   + $('#nama_kota_lap').val();
        vars += "&tanggal="   + $('#tgl_laporan_x').val();        
        window.open('./lapor/CetakPerkinEs4Lamp'+ vars, '_blank');
    };
    if($('#jns_laporan').val()==5){        
    //    window.open('./lapor/CetakUrkin/'+$('#cb_unit_renstra').val()); 
    };    
    if($('#jns_laporan').val()==14){  
        vars = "?token="     + $('input[name=_token]').val();
        vars += "&tahun="     + $('#cb_tahun').val();
        vars += "&triwulan="     + $('#cb_triwulan').val();
        vars += "&unit="     + $('#cb_level_1').val();
        vars += "&kota="   + $('#nama_kota_lap').val();
        vars += "&tanggal="   + $('#tgl_laporan_x').val();        
        window.open('./lapor/CetakUkurTriwEs2Lamp'+ vars, '_blank');
    };      
    if($('#jns_laporan').val()==15){  
        vars = "?token="     + $('input[name=_token]').val();
        vars += "&tahun="     + $('#cb_tahun').val();
        vars += "&triwulan="     + $('#cb_triwulan').val();
        vars += "&unit="     + $('#cb_level_2').val();
        vars += "&kota="   + $('#nama_kota_lap').val();
        vars += "&tanggal="   + $('#tgl_laporan_x').val();        
        window.open('./lapor/CetakUkurTriwEs3Lamp'+ vars, '_blank');
    };    
    if($('#jns_laporan').val()==16){  
        vars = "?token="     + $('input[name=_token]').val();
        vars += "&tahun="     + $('#cb_tahun').val();
        vars += "&triwulan="     + $('#cb_triwulan').val();
        vars += "&unit="     + $('#cb_level_3').val();
        vars += "&kota="   + $('#nama_kota_lap').val();
        vars += "&tanggal="   + $('#tgl_laporan_x').val();        
        window.open('./lapor/CetakUkurTriwEs4Lamp'+ vars, '_blank');
    }; 
    if($('#jns_laporan').val()==6){        
       window.open('./lapor/CetakIkuPemda/'+$('#cb_iku_pemda').val());  
    };
    if($('#jns_laporan').val()==7){        
       window.open('./lapor/CetakIkuOPD/'+$('#cb_iku_opd').val());  
    };
    if($('#jns_laporan').val()==8){        
       window.open('./lapor/CetakIkuProgOPD/'+$('#cb_iku_opd').val()+'/'+$('#cb_level_2').val());  
    };
    if($('#jns_laporan').val()==9){        
       window.open('./lapor/CetakIkuKegOPD/'+$('#cb_iku_opd').val()+'/'+$('#cb_level_3').val());  
    };     
    if($('#jns_laporan').val()==13){  
        vars = "?token="     + $('input[name=_token]').val();
        vars += "&tahun="     + $('#cb_tahun').val();
        vars += "&id_unit="     + $('#cb_unit_renstra').val();
        vars += "&kota="   + $('#nama_kota_lap').val();
        vars += "&tanggal="   + $('#tgl_laporan_x').val();        
        window.open('./lapor/CetakRenaksi'+ vars, '_blank');
    }; 

    
});


});
</script>
@endsection

