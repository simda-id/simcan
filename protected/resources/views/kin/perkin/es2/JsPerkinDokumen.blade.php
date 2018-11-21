
  $(document).on('click', '.btnAddDokumen', function() {
    $('#btnDokumen').removeClass('editDokumen');
    $('#btnDokumen').addClass('addDokumen');
    $('.modal-title').text('Tambah Dokumen Perjanjian Kinerja Level 1');
    $('.form-horizontal').show();
    $('#btnDokumen').show();
    $('#id_perkin_dok').val(null);
    $('#tahun_dok').val(null);
    $('#no_perkin_dok').val(null);
    $('#tgl_perkin_dok').val(hariIni());
    $('#tgl_perkin_dok_x').val(formatTgl(hariIni()));
    $('#tgl_perkin_tmt').val(hariIni());
    $('#tgl_perkin_tmt_x').val(formatTgl(hariIni()));
    $('#cb_eselon_2').val(-1);
    $('#cb_pegawai').val(-1);
    $('#id_pegawai_dok').val(null);
    $('#nama_penandatangan_dok').val(null);
    $('#nip_penandatangan_dok').val(null);
    $('#pangkat_penandatangan_dok').val(null);
    $('#ur_penandatangan_dok').val(null);
    $('#ModalDokumen').modal('show');
});

$('.modal-footer').on('click', '.addDokumen', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './perkin/addDokumen',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_sotk_es2': $('#cb_eselon_2').val(),
            'tahun': $('#tahun_dok').val(),
            'no_dokumen': $('#no_perkin_dok').val(),
            'tgl_dokumen': $('#tgl_perkin_dok').val(),
            'tanggal_mulai': $('#tgl_perkin_tmt').val(),
            'id_pegawai': $('#id_pegawai_dok').val(),
            'nama_penandatangan': $('#nama_penandatangan_dok').val(),
            'jabatan_penandatangan': $('#cb_eselon_2 option:selected').text(),
            'pangkat_penandatangan': $('#pangkat_penandatangan_dok').val(),
            'uraian_pangkat_penandatangan': $('#ur_penandatangan_dok').val(),
            'nip_penandatangan': $('#nip_penandatangan_dok').val(),   
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
    $('.modal-title').text('Tambah Dokumen Perjanjian Kinerja Level 1');
    $('.form-horizontal').show();
    $('#btnDokumen').show();
    $('#id_perkin_dok').val(data.id_dokumen_perkin);
    $('#tahun_dok').val(data.tahun);
    $('#no_perkin_dok').val(data.no_dokumen);
    $('#tgl_perkin_dok').val(data.tgl_dokumen);
    $('#tgl_perkin_dok_x').val(formatTgl(data.tgl_dokumen));
    $('#tgl_perkin_tmt').val(data.tanggal_mulai);
    $('#tgl_perkin_tmt_x').val(formatTgl(data.tanggal_mulai));
    $('#cb_eselon_2').val(data.id_sotk_es2);
    $('#id_pegawai_dok').val(data.id_pegawai);
    $('#nama_penandatangan_dok').val(data.nama_penandatangan);
    $('#nip_penandatangan_dok').val(buatNip(data.nip_penandatangan));
    $('#pangkat_penandatangan_dok').val(data.pangkat_penandatangan);
    $('#ur_penandatangan_dok').val(data.uraian_pangkat_penandatangan);
    $('#ModalDokumen').modal('show');
});

$('.modal-footer').on('click', '.editDokumen', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './perkin/editDokumen',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_dokumen_perkin': $('#id_perkin_dok').val(),
            'id_sotk_es2': $('#cb_eselon_2').val(),
            'tahun': $('#tahun_dok').val(),
            'no_dokumen': $('#no_perkin_dok').val(),
            'tgl_dokumen': $('#tgl_perkin_dok').val(),
            'tanggal_mulai': $('#tgl_perkin_tmt').val(),
            'id_pegawai': $('#id_pegawai_dok').val(),
            'nama_penandatangan': $('#nama_penandatangan_dok').val(),
            'jabatan_penandatangan': $('#cb_eselon_2 option:selected').text(),
            'pangkat_penandatangan': $('#pangkat_penandatangan_dok').val(),
            'uraian_pangkat_penandatangan': $('#ur_penandatangan_dok').val(),
            'nip_penandatangan': $('#nip_penandatangan_dok').val(),     
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
      $('.modal-title').text('Hapus Dokumen Perjanjian Kinerja Level 1');
      $('#id_dokumen_hapus').val(data.id_dokumen_perkin);
      $('.ur_dokumen_del').html(data.nama_penandatangan);
      $('#HapusDokumen').modal('show');

}); 
    
$('.modal-footer').on('click', '.delDokumen', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });
    
      $.ajax({
        type: 'post',
        url: './perkin/delDokumen',
        data: {
          '_token': $('input[name=_token]').val(),
          'id_dokumen_perkin': $('#id_dokumen_hapus').val(),
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