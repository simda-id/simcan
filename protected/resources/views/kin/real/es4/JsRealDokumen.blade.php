
  $(document).on('click', '.btnAddDokumen', function() {    
    $('#btnDokumen').removeClass('editDokumen');
    $('#btnDokumen').addClass('addDokumen');
    $('.modal-title').text('Tambah Dokumen Pengukuran Kinerja Level 3');
    $('.form-horizontal').show();
    $('#btnDokumen').show();
    $('#id_real_dok').val(null);
    $('#tahun_dok').val(null);
    $('#cb_triwulan_dok').val(null);
    $('#cb_no_perkin_dok').val(null);
    $('#no_realisasi_dok').val(null);
    $('#tgl_perkin_dok').val(hariIni());
    $('#tgl_perkin_dok_x').val(formatTgl(hariIni()));
    $('#cb_eselon_4a').val(id_eselon4_temp);
    $('#cb_pegawai').val(-1);
    $('#id_jabatan_dok').val($( ".cb_eselon_4" ).val());
    $('#jabatan_penandatangan_dok').val($('#cb_eselon_4 option:selected').text());
    $.ajax({
        type: "GET",
        url: '../perkin/getPegawai/'+$( ".cb_eselon_4" ).val(),
        dataType: "json",
        success: function(data) {
          var j = data.length;
              var post, i;
              for (i = 0; i < j; i++) {
                post = data[i];                
                $('#id_pegawai_dok').val(post.id_pegawai);
                $('#nama_penandatangan_dok').val(post.nama_pegawai);
                $('#nip_penandatangan_dok').val(buatNip(post.nip_pegawai));
                $('#pangkat_penandatangan_dok').val(post.pangkat_pegawai);
                $('#ur_penandatangan_dok').val(post.pangkat_display);
              }
        }
    });
    $('#ModalDokumen').modal('show');
});

$('.modal-footer').on('click', '.addDokumen', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
    
    $('#prosesbar').show();
    $.ajax({
        type: 'post',
        url: './es4/addDokumen',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_sotk_es4': id_eselon4_temp,
            'tahun': $('#tahun_dok').val(),
            'triwulan': $('#cb_triwulan_dok').val(),            
            'id_dokumen_perkin': $('#cb_no_perkin_dok').val(),
            'no_dokumen': $('#no_realisasi_dok').val(),
            'tgl_dokumen': $('#tgl_perkin_dok').val(),
            'tanggal_mulai': $('#tgl_perkin_tmt').val(),
            'id_pegawai': $('#id_pegawai_dok').val(),
            'nama_penandatangan': $('#nama_penandatangan_dok').val(),
            'jabatan_penandatangan': $('#jabatan_penandatangan_dok').val(),
            'pangkat_penandatangan': $('#pangkat_penandatangan_dok').val(),
            'uraian_pangkat_penandatangan': $('#ur_penandatangan_dok').val(),
            'nip_penandatangan': $('#nip_penandatangan_dok').val(),   
        },
        success: function(data) {
            tblDokPerkin.ajax.reload(null,false);
            $('#prosesbar').hide();
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
    $('.modal-title').text('Detail Dokumen Pengukuran Kinerja Level 2');
    $('.form-horizontal').show();
    $('#btnDokumen').show();
    $('#id_real_dok').val(data.id_dokumen_real);
    $('#tahun_dok').val(data.tahun);
    $('#cb_triwulan_dok').val(data.triwulan);
    $('#cb_no_perkin_dok').val(null);
    $('#cb_no_perkin_dok').val(data.id_dokumen_perkin);
    $('#no_realisasi_dok').val(data.no_dokumen);
    $('#tgl_perkin_dok').val(data.tgl_dokumen);
    $('#tgl_perkin_dok_x').val(formatTgl(data.tgl_dokumen));
    $('#cb_eselon_4a').val(data.id_sotk_es4);
    $('#cb_pegawai').val(data.id_pegawai);
    $('#id_pegawai_dok').val(data.id_pegawai);
    $('#id_jabatan_dok').val(data.id_sotk_es4);
    $('#jabatan_penandatangan_dok').val(data.jabatan_penandatangan);
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

    $('#prosesbar').show();
    $.ajax({
        type: 'post',
        url: './es4/editDokumen',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_dokumen_real': $('#id_real_dok').val(),
            'id_sotk_es4': id_eselon4_temp,
            'tahun': $('#tahun_dok').val(),
            'triwulan': $('#cb_triwulan_dok').val(),            
            'id_dokumen_perkin': $('#cb_no_perkin_dok').val(),
            'no_dokumen': $('#no_realisasi_dok').val(),
            'tgl_dokumen': $('#tgl_perkin_dok').val(),
            'tanggal_mulai': $('#tgl_perkin_tmt').val(),
            'id_pegawai': $('#id_pegawai_dok').val(),
            'nama_penandatangan': $('#nama_penandatangan_dok').val(),
            'jabatan_penandatangan': $('#jabatan_penandatangan_dok').val(),
            'pangkat_penandatangan': $('#pangkat_penandatangan_dok').val(),
            'uraian_pangkat_penandatangan': $('#ur_penandatangan_dok').val(),
            'nip_penandatangan': $('#nip_penandatangan_dok').val(),     
        },
        success: function(data) {
            tblDokPerkin.ajax.reload(null,false);
            $('#prosesbar').hide();
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
      $('.modal-title').text('Hapus Dokumen Pengukuran Kinerja Level 3');
      $('#id_dokumen_hapus').val(data.id_dokumen_real);
      $('.ur_dokumen_del').html(data.nama_penandatangan);
      $('#HapusDokumen').modal('show');

}); 
    
$('.modal-footer').on('click', '.delDokumen', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });
      $('#prosesbar').show();
      $.ajax({
        type: 'post',
        url: './es4/delDokumen',
        data: {
          '_token': $('input[name=_token]').val(),
          'id_dokumen_real': $('#id_dokumen_hapus').val(),
        },
        success: function(data) {
            tblDokPerkin.ajax.reload(null,false);
            $('#prosesbar').hide();
            if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
            }
        }
      });
    


});