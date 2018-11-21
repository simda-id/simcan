$(document).on('click', '.btnAddKegiatanIndikator', function() {
    var data = tbl_Kegiatan.row( $(this).parents('tr') ).data();
    $('.btnSimpanKegiatanIndikator').removeClass('editKegiatanIndikator');
    $('.btnSimpanKegiatanIndikator').addClass('addKegiatanIndikator');
	$('.modal-title').text('Data Indikator Sasaran Daerah');
	$('.form-horizontal').show();
    $('#id_indikator_kegiatan_renstra_edit').val(null);
    $('#thn_id_indikator_kegiatan_edit').val(data.thn_id);
    $('#id_kegiatan_renstra_indikator_edit').val(data.id_kegiatan_renstra);
    $('#no_urut_indikator_kegiatan_edit').val(1);
    $('#id_perubahan_indikator_kegiatan_edit').val(0);
    $('#ur_indikator_kegiatan_renstra').val(null);
    $('#kd_indikator_kegiatan_renstra').val(null);
    $('#indikegiatan1_edit').val(0);
    $('#indikegiatan2_edit').val(0);
    $('#indikegiatan3_edit').val(0);
    $('#indikegiatan4_edit').val(0);
    $('#indikegiatan5_edit').val(0);
    $('#indikegiatan_awal_edit').val(0);
    $('#indikegiatan_akhir_edit').val(0);
    $('#satuan_kegiatan_indikator_edit').val(null);
    $('#ModalIndikatorKegiatan').modal('show');
});

$('.modal-footer').on('click', '.addKegiatanIndikator', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './renstra/addIndikatorKegiatan',
        data: {
            '_token': $('input[name=_token]').val(),
            'thn_id': $('#thn_id_indikator_kegiatan_edit').val(),
            'no_urut': $('#no_urut_indikator_kegiatan_edit').val(),
            'id_kegiatan_renstra': $('#id_kegiatan_renstra_indikator_edit').val(),
            'id_perubahan': $('#id_perubahan_indikator_kegiatan_edit').val(),
            'kd_indikator': $('#kd_indikator_kegiatan_renstra').val(),
            'uraian_indikator_kegiatan_renstra': $('#ur_indikator_kegiatan_renstra').val(),
            'tolok_ukur_indikator': $('#ur_indikator_kegiatan_renstra').val(),
            'angka_awal_periode': $('#indikegiatan_awal_edit').val(),
            'angka_tahun1': $('#indikegiatan1_edit').val(),
            'angka_tahun2': $('#indikegiatan2_edit').val(),
            'angka_tahun3': $('#indikegiatan3_edit').val(),
            'angka_tahun4': $('#indikegiatan4_edit').val(),
            'angka_tahun5': $('#indikegiatan5_edit').val(),
            'angka_akhir_periode': $('#indikegiatan_akhir_edit').val(),    
        },
        success: function(data) {
            $('#tblKegiatan').DataTable().ajax.reload(null,false);
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }

        }
    });
});

$(document).on('click', '.btnEditIndikatorKegiatan', function() {
var data = tblInKegiatan.row( $(this).parents('tr') ).data();
    $('.btnSimpanKegiatanIndikator').removeClass('addKegiatanIndikator');
    $('.btnSimpanKegiatanIndikator').addClass('editKegiatanIndikator');
	$('.modal-title').text('Data Indikator Sasaran Daerah');
	$('.form-horizontal').show();
    $('#id_indikator_kegiatan_renstra_edit').val(data.id_indikator_kegiatan_renstra);
    $('#thn_id_indikator_kegiatan_edit').val(data.thn_id);
    $('#id_kegiatan_renstra_indikator_edit').val(data.id_kegiatan_renstra);
    $('#no_urut_indikator_kegiatan_edit').val(data.no_urut);
    $('#id_perubahan_indikator_kegiatan_edit').val(data.id_perubahan);
    $('#ur_indikator_kegiatan_renstra').val(data.nm_indikator);
    $('#kd_indikator_kegiatan_renstra').val(data.kd_indikator);
    $('#indikegiatan1_edit').val(data.angka_tahun1);
    $('#indikegiatan2_edit').val(data.angka_tahun2);
    $('#indikegiatan3_edit').val(data.angka_tahun3);
    $('#indikegiatan4_edit').val(data.angka_tahun4);
    $('#indikegiatan5_edit').val(data.angka_tahun5);
    $('#indikegiatan_awal_edit').val(data.angka_awal_periode);
    $('#indikegiatan_akhir_edit').val(data.angka_akhir_periode);
    $('#satuan_kegiatan_indikator_edit').val(data.uraian_satuan);
    $('#ModalIndikatorKegiatan').modal('show');
});

$('.modal-footer').on('click', '.editKegiatanIndikator', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './renstra/editIndikatorKegiatan',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_indikator_kegiatan_renstra': $('#id_indikator_kegiatan_renstra_edit').val(),
            'thn_id': $('#thn_id_indikator_kegiatan_edit').val(),
            'thn_id': $('#thn_id_indikator_kegiatan_edit').val(),
            'no_urut': $('#no_urut_indikator_kegiatan_edit').val(),
            'id_kegiatan_renstra': $('#id_kegiatan_renstra_indikator_edit').val(),
            'id_perubahan': $('#id_perubahan_indikator_kegiatan_edit').val(),
            'kd_indikator': $('#kd_indikator_kegiatan_renstra').val(),
            'uraian_indikator_kegiatan_renstra': $('#ur_indikator_kegiatan_renstra').val(),
            'tolok_ukur_indikator': $('#ur_indikator_kegiatan_renstra').val(),
            'angka_awal_periode': $('#indikegiatan_awal_edit').val(),
            'angka_tahun1': $('#indikegiatan1_edit').val(),
            'angka_tahun2': $('#indikegiatan2_edit').val(),
            'angka_tahun3': $('#indikegiatan3_edit').val(),
            'angka_tahun4': $('#indikegiatan4_edit').val(),
            'angka_tahun5': $('#indikegiatan5_edit').val(),
            'angka_akhir_periode': $('#indikegiatan_akhir_edit').val(),    
        },
        success: function(data) {
            $('#tblKegiatan').DataTable().ajax.reload(null,false);
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }

        }
    });
});

$(document).on('click', '.btnHapusIndikatorKegiatan', function() {
    var data = tblInKegiatan.row( $(this).parents('tr') ).data();
      $('.btnDelKegiatanIndikator').addClass('delKegiatanIndikator');
      $('.modal-title').text('Hapus Referensi Indikator');
      $('.form-horizontal').hide();
      $('#id_kegiatan_indikator_hapus').val(data.id_indikator_kegiatan_renstra);
      $('#nm_kegiatan_indikator_hapus').html(data.nm_indikator);
      $('#HapusKegiatanIndikatorModal').modal('show');

});
    
    
    
$('.modal-footer').on('click', '.delKegiatanIndikator', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });
    
      $.ajax({
        type: 'post',
        url: './renstra/delIndikatorKegiatan',
        data: {
          '_token': $('input[name=_token]').val(),
          'id_indikator_kegiatan_renstra': $('#id_kegiatan_indikator_hapus').val(),
        },
        success: function(data) {
            $('#tblKegiatan').DataTable().ajax.reload(null,false);
            if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
            }
        }
      });
});