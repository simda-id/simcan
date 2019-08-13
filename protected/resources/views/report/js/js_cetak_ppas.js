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
    url: './jenis_ppas',
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

$( ".tahun_prarka" ).change(function() {
    $.ajax({
        type: "GET",
        url: './getDokPPAS/'+$('#tahun_prarka').val(),
        dataType: "json",
        success: function(data) {
          var j = data.length;
          var post, i;

          $('select[name="no_dokumen"]').empty();
          $('select[name="no_dokumen"]').append('<option value="-1">---Pilih  Dokumen PPAS---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="no_dokumen"]').append('<option value="'+ post.id_dokumen_keu +'">'+ post.nomor_keu +" ("+post.uraian_perkada+")"+'</option>');
          }
        }
    });
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



$(document).on('click', '.btnProses', function() {
   
    if($('#jns_laporan').val()==1){
      vars = "?token="     + $('input[name=_token]').val();
        vars += "&tahun="     + $('#tahun_prarka').val();
        vars += "&unit="     + $('#unit_prarka').val();
        window.open('../PPASFormat1'+ vars, '_blank'); 
    };
    if($('#jns_laporan').val()==2){
      vars = "?token="     + $('input[name=_token]').val();
        vars += "&tahun="     + $('#tahun_prarka').val();
       
        window.open('../PPASFormatUrusan'+ vars, '_blank'); 
    };
    if($('#jns_laporan').val()==3){
      vars = "?token="     + $('input[name=_token]').val();
        vars += "&tahun="     + $('#tahun_prarka').val();
      
       window.open('../PPASBTL'+ vars, '_blank'); 
    };
    if($('#jns_laporan').val()==4){
      vars = "?token="     + $('input[name=_token]').val();
        vars += "&tahun="     + $('#tahun_prarka').val();
     
       window.open('../PPASPembiayaan'+ vars, '_blank'); 
    };
    if($('#jns_laporan').val()==5){
      vars = "?token="     + $('input[name=_token]').val();
        vars += "&tahun="     + $('#tahun_prarka').val();
     
       window.open('../PPASDapat'+ vars, '_blank'); 
    };
    if($('#jns_laporan').val()==6){
      vars = "?token="     + $('input[name=_token]').val();
        vars += "&tahun="     + $('#tahun_prarka').val();
     
       window.open('../PPASSumberDana'+ vars, '_blank'); 
    };
    
         
});//End File


