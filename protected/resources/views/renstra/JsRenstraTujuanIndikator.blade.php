$(document).on('click', '.btnAddTujuanIndikator', function() {
    var data = tbl_Tujuan.row( $(this).parents('tr') ).data();
    $('.btnSimpanTujuanIndikator').removeClass('editTujuanIndikator');
    $('.btnSimpanTujuanIndikator').addClass('addTujuanIndikator');
	$('.modal-title').text('Data Indikator Tujuan Daerah');
	$('.form-horizontal').show();
    $('#id_indikator_tujuan_renstra_edit').val(null);
    $('#thn_id_indikator_tujuan_edit').val(data.thn_id);
    $('#id_tujuan_renstra_indikator_edit').val(data.id_tujuan_renstra);
    $('#no_urut_indikator_tujuan_edit').val(1);
    $('#id_perubahan_indikator_tujuan_edit').val(0);
    $('#ur_indikator_tujuan_renstra').val(null);
    $('#kd_indikator_tujuan_renstra').val(null);
    $('#inditujuan1_edit').val(0);
    $('#inditujuan2_edit').val(0);
    $('#inditujuan3_edit').val(0);
    $('#inditujuan4_edit').val(0);
    $('#inditujuan5_edit').val(0);
    $('#inditujuan_awal_edit').val(0);
    $('#inditujuan_akhir_edit').val(0);
    $('#satuan_tujuan_indikator_edit').val(null);
    $('#ModalIndikatorTujuan').modal('show');
});

$('.modal-footer').on('click', '.addTujuanIndikator', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './renstra/addIndikatorTujuan',
        data: {
            '_token': $('input[name=_token]').val(),
            'thn_id': $('#thn_id_indikator_tujuan_edit').val(),
            'no_urut': $('#no_urut_indikator_tujuan_edit').val(),
            'id_tujuan_renstra': $('#id_tujuan_renstra_indikator_edit').val(),
            'id_perubahan': $('#id_perubahan_indikator_tujuan_edit').val(),
            'kd_indikator': $('#kd_indikator_tujuan_renstra').val(),
            'uraian_indikator_sasaran_renstra': $('#ur_indikator_tujuan_renstra').val(),
            'tolok_ukur_indikator': $('#ur_indikator_tujuan_renstra').val(),
            'angka_awal_periode': $('#inditujuan_awal_edit').val(),
            'angka_tahun1': $('#inditujuan1_edit').val(),
            'angka_tahun2': $('#inditujuan2_edit').val(),
            'angka_tahun3': $('#inditujuan3_edit').val(),
            'angka_tahun4': $('#inditujuan4_edit').val(),
            'angka_tahun5': $('#inditujuan5_edit').val(),
            'angka_akhir_periode': $('#inditujuan_akhir_edit').val(),    
        },
        success: function(data) {
            $('#tblTujuan').DataTable().ajax.reload(null,false);
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }

        },
        error: function(data){
            
        }

    });
});

$(document).on('click', '.edit-indikator', function() {
var data = tblInTujuan.row( $(this).parents('tr') ).data();
    $('.btnSimpanTujuanIndikator').removeClass('addTujuanIndikator');
    $('.btnSimpanTujuanIndikator').addClass('editTujuanIndikator');
	$('.modal-title').text('Data Indikator Tujuan Daerah');
	$('.form-horizontal').show();
    $('#id_indikator_tujuan_renstra_edit').val(data.id_indikator_tujuan_renstra);
    $('#thn_id_indikator_tujuan_edit').val(data.thn_id);
    $('#id_tujuan_renstra_indikator_edit').val(data.id_tujuan_renstra);
    $('#no_urut_indikator_tujuan_edit').val(data.no_urut);
    $('#id_perubahan_indikator_tujuan_edit').val(data.id_perubahan);
    $('#ur_indikator_tujuan_renstra').val(data.nm_indikator);
    $('#kd_indikator_tujuan_renstra').val(data.kd_indikator);
    $('#inditujuan1_edit').val(data.angka_tahun1);
    $('#inditujuan2_edit').val(data.angka_tahun2);
    $('#inditujuan3_edit').val(data.angka_tahun3);
    $('#inditujuan4_edit').val(data.angka_tahun4);
    $('#inditujuan5_edit').val(data.angka_tahun5);
    $('#inditujuan_awal_edit').val(data.angka_awal_periode);
    $('#inditujuan_akhir_edit').val(data.angka_akhir_periode);
    $('#satuan_tujuan_indikator_edit').val(data.uraian_satuan);
    $('#ModalIndikatorTujuan').modal('show');
});

$('.modal-footer').on('click', '.editTujuanIndikator', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './renstra/editIndikatorTujuan',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_indikator_tujuan_renstra': $('#id_indikator_tujuan_renstra_edit').val(),
            'thn_id': $('#thn_id_indikator_tujuan_edit').val(),
            'no_urut': $('#no_urut_indikator_tujuan_edit').val(),
            'id_tujuan_renstra': $('#id_tujuan_renstra_indikator_edit').val(),
            'id_perubahan': $('#id_perubahan_indikator_tujuan_edit').val(),
            'kd_indikator': $('#kd_indikator_tujuan_renstra').val(),
            'uraian_indikator_sasaran_renstra': $('#ur_indikator_tujuan_renstra').val(),
            'tolok_ukur_indikator': $('#ur_indikator_tujuan_renstra').val(),
            'angka_awal_periode': $('#inditujuan_awal_edit').val(),
            'angka_tahun1': $('#inditujuan1_edit').val(),
            'angka_tahun2': $('#inditujuan2_edit').val(),
            'angka_tahun3': $('#inditujuan3_edit').val(),
            'angka_tahun4': $('#inditujuan4_edit').val(),
            'angka_tahun5': $('#inditujuan5_edit').val(),
            'angka_akhir_periode': $('#inditujuan_akhir_edit').val(),    
        },
        success: function(data) {
            $('#tblTujuan').DataTable().ajax.reload(null,false);
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }

        }
    });
});

$(document).on('click', '.btnHapusIndikator', function() {
    var data = tblInTujuan.row( $(this).parents('tr') ).data();
      $('.actionBtn').addClass('delete');
      $('.modal-title').text('Hapus Referensi Indikator');
      $('.form-horizontal').hide();
      $('#id_tujuan_indikator_hapus').val(data.id_indikator_tujuan_renstra);
      $('#nm_tujuan_indikator_hapus').html(data.nm_indikator);
      $('#HapusTujuanIndikator').modal('show');

});
    
$('.modal-footer').on('click', '.delete', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });
    
      $.ajax({
        type: 'post',
        url: './renstra/delIndikatorTujuan',
        data: {
          '_token': $('input[name=_token]').val(),
          'id_indikator_tujuan_renstra': $('#id_tujuan_indikator_hapus').val(),
        },
        success: function(data) {
            $('#tblTujuan').DataTable().ajax.reload(null,false);
            if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
            }
        }
      });
});
