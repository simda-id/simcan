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
    url: './jenis_musrenbang',
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
    $.ajax({
        type: "GET",
        url: '../admin/parameter/getKecamatan',
        dataType: "json",
        success: function(data) {
          var j = data.length;
          var post, i;

          $('select[name="cb_kecamatan"]').empty();
          $('select[name="cb_kecamatan"]').append('<option value="-1">---Pilih Kecamatan---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="cb_kecamatan"]').append('<option value="'+ post.id_kecamatan +'">'+ post.nama_kecamatan +'</option>');
          }
        }
    });


$( ".cb_kecamatan" ).change(function() { 
    $.ajax({
        type: "GET",
        url: '../admin/parameter/getDesa/'+$('#cb_kecamatan').val(),
        dataType: "json",

        success: function(data) {
          var j = data.length;
          var post, i;

          $('select[name="cb_desa"]').empty();
          $('select[name="cb_desa"]').append('<option value="-1">---Pilih Desa---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="cb_desa"]').append('<option value="'+ post.id_desa +'">'+ post.nama_desa +'</option>');
          }
        }
    });

});


$(document).on('click', '.btnProses', function() {
    if($('#jns_laporan').val()==1){
        vars = "?token="     + $('input[name=_token]').val();
        vars += "&tahun="     + $('#tahun_prarka').val();
        vars += "&desa="   + $('#cb_desa').val();
        vars += "&kecamatan="   + $('#cb_kecamatan').val();
        vars += "&status_data="   + $('#cb_status').val();
        window.open('../PrintUsulanRW' + vars, '_blank');
    };
    if($('#jns_laporan').val()==3){
       // window.open('../UsulanPerUnit/'+$('#unit_prarka').val()+'/'+$('#tahun_prarka').val()); 
       vars = "?token="     + $('input[name=_token]').val();
      vars += "&tahun="     + $('#tahun_prarka').val();
      vars += "&kecamatan="   + $('#cb_kecamatan').val();
      vars += "&status_data="   + $('#cb_status').val();
      window.open('../PrintUsulanKecamatan'+ vars, '_blank'); 
       
    };
    if($('#jns_laporan').val()==2){
      vars = "?token="     + $('input[name=_token]').val();
      vars += "&tahun="     + $('#tahun_prarka').val();
      vars += "&desa="   + $('#cb_desa').val();
      vars += "&kecamatan="   + $('#cb_kecamatan').val();
      vars += "&status_data="   + $('#cb_status').val();
      window.open('../PrintUsulanDesa'+ vars, '_blank'); 
    };  
});


});