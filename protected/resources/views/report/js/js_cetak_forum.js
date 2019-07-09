
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
    url: './jenis_forum',
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
        url: 'getProgramForum/'+$('#unit_prarka').val()+'/'+$('#tahun_prarka').val(),
        dataType: "json",
        success: function(data) {
          var j = data.length;
          var post, i;

          $('select[name="prog_prarka"]').empty();
          $('select[name="prog_prarka"]').append('<option value="-1">---Pilih Program---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="prog_prarka"]').append('<option value="'+ post.id_forum_program +'">'+ post.uraian_program_renstra +'</option>');
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
        url: 'getKegiatanForum/'+$('#prog_prarka').val(),
        dataType: "json",
        success: function(data) {
          var j = data.length;
          var post, i;

          $('select[name="keg_prarka"]').empty();
          $('select[name="keg_prarka"]').append('<option value="-1">---Pilih Kegiatan---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="keg_prarka"]').append('<option value="'+ post.id_forum_skpd +'">'+ post.uraian_kegiatan_forum +'</option>');
          }
        }
    });
});


$(document).on('click', '.btnProses', function() {
    if($('#jns_laporan').val()==1){
       window.open('../PrintKompilasiKegiatandanPaguF/'+ $('#unit_prarka').val()+'/'+ $('#tahun_prarka').val()); 
    };
    if($('#jns_laporan').val()==2){
       window.open('../PrintRingkasAPBDF/'+$('#tahun_prarka').val()); 
    };
    if($('#jns_laporan').val()==3){
       window.open('../PrintAPBDF/'+$('#tahun_prarka').val()); 
    };
    if($('#jns_laporan').val()==4){
       window.open('../PrintPraRKA2F/'+$('#sub_prarka2').val()+'/'+$('#tahun_prarka').val()); 
    };
    if($('#jns_laporan').val()==5){
       window.open('../PrintPraRKAF/'+$('#keg_prarka').val()+'/'+$('#sub_prarka2').val()); 
    };
    // if($('#jns_laporan').val()==9){
    // 	window.open('../PrintPrakiraanMajuF/'+ $('#sub_prarka2').val()+'/'+$('#tahun_prarka').val()); 
 
    //  };
  
     if($('#jns_laporan').val()==11){
       window.open('../PrintMatrikForm2/'+$('#tahun_prarka').val()); 

       };
     if($('#jns_laporan').val()==12){
       window.open('../PrintMatrikForm3/'+$('#tahun_prarka').val()); 

       };
     if($('#jns_laporan').val()==13){
       window.open('../PrintMusrenRancangan/'+$('#tahun_prarka').val()); 

       };
       
      if($('#jns_laporan').val()==9){
         vars = "?token="     + $('input[name=_token]').val();
        vars += "&tahun="     + $('#tahun_prarka').val();
        vars += "&unit="   + $('#unit_prarka').val();

        window.open('../PrintPrakiraanMajuHtml' + vars, '_blank');
   
       };
    
//     if($('#jns_laporan').val()==9){
//        window.open('../PrintKompilasiKegiatanRanwalRenja/'+ $('#unit_prarka').val()+'/'+$('#tahun_prarka').val()); 
//     };
//     if($('#jns_laporan').val()==11){
//        window.open('../CekRanwalRenja/'+$('#tahun_prarka').val()); 
//     };    
});


});