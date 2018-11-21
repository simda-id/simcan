
  $(document).on('click', '.btnAddDokumen', function() {
    $('#btnDokumen').removeClass('editDokumen');
    $('#btnDokumen').addClass('addDokumen');
    $('.modal-title').text('Tambah Dokumen Indikator Kinerja Utama Pemerintah Daerah');
    $('.form-horizontal').show();
    $('#btnDokumen').show();
    $('#id_iku_dok').val(null);
    $('#no_iku_dok').val(null);
    $('#tgl_iku_dok').val(hariIni());
    $('#tgl_iku_dok_x').val(formatTgl(hariIni()));
    $('#cb_no_perda').val(-1);
    $('#uraian_iku_dok').val(null);
    $('#ModalDokumen').modal('show');
});

$('.modal-footer').on('click', '.addDokumen', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './iku/addDokumen',
        data: {
            '_token': $('input[name=_token]').val(),
            'no_dokumen': $('#no_iku_dok').val(),
            'tgl_dokumen': $('#tgl_iku_dok').val(),
            'uraian_dokumen': $('#uraian_iku_dok').val(),
            'id_rpjmd': $('#cb_no_perda').val(),  
        },
        success: function(data) {
            tblDokPerkin.ajax.reload(null,false);
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }

        }
    });
});

$(document).on('click', '.btnEditDokumen', function() {
var data = tblDokPerkin.row( $(this).parents('tr') ).data();
    $('#btnDokumen').addClass('editDokumen');
    $('#btnDokumen').removeClass('addDokumen');
    $('.modal-title').text('Detail Dokumen Indikator Kinerja Utama Pemerintah Daerah');
    $('.form-horizontal').show();
    $('#btnDokumen').show();
    $('#id_iku_dok').val(data.id_dokumen);
    $('#no_iku_dok').val(data.no_dokumen);
    $('#tgl_iku_dok').val(data.tgl_dokumen);
    $('#tgl_iku_dok_x').val(formatTgl(data.tgl_dokumen));
    $('#cb_no_perda').val(data.id_rpjmd);
    $('#uraian_iku_dok').val(data.uraian_dokumen);
    $('#ModalDokumen').modal('show');
});

$('.modal-footer').on('click', '.editDokumen', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './iku/editDokumen',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_dokumen': $('#id_iku_dok').val(),
            'no_dokumen': $('#no_iku_dok').val(),
            'tgl_dokumen': $('#tgl_iku_dok').val(),
            'uraian_dokumen': $('#uraian_iku_dok').val(),
            'id_rpjmd': $('#cb_no_perda').val(),       
        },
        success: function(data) {
            tblDokPerkin.ajax.reload(null,false);
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }

        }
    });
});

$(document).on('click', '.btnHapusDokumen', function() {
    var data = tblDokPerkin.row( $(this).parents('tr') ).data();
      $('.btnDelAksiDokumen').addClass('delDokumen');
      $('.modal-title').text('Hapus Dokumen Indikator Kinerja Utama Pemerintah Daerah');
      $('#id_dokumen_hapus').val(data.id_dokumen);
      $('.ur_dokumen_del').html(data.uraian_dokumen);
      $('#HapusDokumen').modal('show');

}); 
    
$('.modal-footer').on('click', '.delDokumen', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });
    
      $.ajax({
        type: 'post',
        url: './iku/delDokumen',
        data: {
          '_token': $('input[name=_token]').val(),
          'id_dokumen': $('#id_dokumen_hapus').val(),
        },
        success: function(data) {
            tblDokPerkin.ajax.reload(null,false);
            if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
            }
        }
      });
    


});