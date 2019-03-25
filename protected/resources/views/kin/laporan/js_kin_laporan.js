
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


});// end file