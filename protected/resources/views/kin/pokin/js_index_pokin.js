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
    if($('#jns_laporan').val()==3){
        window.location.replace("pokin/getLintasChart/"+$('#cb_no_perda').val());
    };      
    if($('#jns_laporan').val()==4){
        window.location.replace("pokin/getRenstraSasaranChart/"+$('#cb_no_renstra').val()+"/"+$('#cb_unit_renstra').val()); 
    }; 
});


});