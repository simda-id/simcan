$(document).ready(function(){

$.ajax({
    type: "GET",
    url: './getDokumenRpjmd',
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
    url: './jenis_rpjmd',
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

$( ".cb_no_perda" ).change(function() {   
      $.ajax({
        type: "GET",
        url: './getMisiRpjmd',
        dataType: "json",
        success: function(data) {
            var j = data.length;
            var post, i;

            $('select[name="cb_misi_rpjmd"]').empty();
            $('select[name="cb_misi_rpjmd"]').append('<option value="-1">Pilih Misi RPJMD</option>');

            for (i = 0; i < j; i++) {
                post = data[i];
                $('select[name="cb_misi_rpjmd"]').append('<option value="'+ post.id_misi_rpjmd +'">'+ post.uraian_misi_rpjmd +'</option>');

            }
        }
    })
});

$( ".cb_misi_rpjmd" ).change(function() {   
      $.ajax({
        type: "GET",
        url: './getTujuanRpjmd/'+$('#cb_misi_rpjmd').val(),
        dataType: "json",
        success: function(data) {
            var j = data.length;
            var post, i;

            $('select[name="cb_tujuan_rpjmd"]').empty();
            $('select[name="cb_tujuan_rpjmd"]').append('<option value="-1">Pilih Tujuan RPJMD</option>');

            for (i = 0; i < j; i++) {
                post = data[i];
                $('select[name="cb_tujuan_rpjmd"]').append('<option value="'+ post.id_tujuan_rpjmd +'">'+ post.uraian_tujuan_rpjmd +'</option>');

            }
        }
    })
});

$( ".cb_tujuan_rpjmd" ).change(function() {   
      $.ajax({
        type: "GET",
        url: './getSasaranRpjmd/'+$('#cb_tujuan_rpjmd').val(),
        dataType: "json",
        success: function(data) {
            var j = data.length;
            var post, i;

            $('select[name="cb_sasaran_rpjmd"]').empty();
            $('select[name="cb_sasaran_rpjmd"]').append('<option value="-1">Pilih Sasaran RPJMD</option>');

            for (i = 0; i < j; i++) {
                post = data[i];
                $('select[name="cb_sasaran_rpjmd"]').append('<option value="'+ post.id_sasaran_rpjmd +'">'+ post.uraian_sasaran_rpjmd +'</option>');

            }
        }
    })
});

$(document).on('click', '.btnProses', function() {
    if($('#jns_laporan').val()==1){
       window.open('../CetakMatrikRpjmdAll/'+$('#cb_no_perda').val()); 
    };
    if($('#jns_laporan').val()==2){
        window.open('../CetakMatrikRpjmd/'+$('#cb_no_perda').val()); 
    };
    if($('#jns_laporan').val()==3){
        window.open('../SasaranProgram/'+$('#cb_tujuan_rpjmd').val()+'/'+$('#cb_sasaran_rpjmd').val()); 
    };   
});

});