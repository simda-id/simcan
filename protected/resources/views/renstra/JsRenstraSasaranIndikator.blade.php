$(document).on('click', '.btnAddSasaranIndikator', function() {
    var data = tbl_Sasaran.row( $(this).parents('tr') ).data();
    $('.btnSimpanSasaranIndikator').removeClass('editSasaranIndikator');
    $('.btnSimpanSasaranIndikator').addClass('addSasaranIndikator');
	$('.modal-title').text('Data Indikator Sasaran Daerah');
	$('.form-horizontal').show();
    $('#id_indikator_sasaran_renstra_edit').val(null);
    $('#thn_id_indikator_sasaran_edit').val(data.thn_id);
    $('#id_indikator_sasaran_rpjmd_x').val(data.id_sasaran_rpjmd);
    $('#ur_indikator_sasaran_rpjmd').val(null);
    $('#id_indikator_sasaran_rpjmd').val(null);
    $('#id_sasaran_renstra_indikator_edit').val(data.id_sasaran_renstra);
    $('#no_urut_indikator_sasaran_edit').val(1);
    $('#id_perubahan_indikator_sasaran_edit').val(0);
    $('#ur_indikator_sasaran_renstra').val(null);
    $('#kd_indikator_sasaran_renstra').val(null);
    $('#indisasaran1_edit').val(0);
    $('#indisasaran2_edit').val(0);
    $('#indisasaran3_edit').val(0);
    $('#indisasaran4_edit').val(0);
    $('#indisasaran5_edit').val(0);
    $('#indisasaran_awal_edit').val(0);
    $('#indisasaran_akhir_edit').val(0);
    $('#satuan_sasaran_indikator_edit').val(null);
    $('#ModalIndikatorSasaran').modal('show');
});

$('.modal-footer').on('click', '.addSasaranIndikator', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './renstra/addIndikatorSasaran',
        data: {
            '_token': $('input[name=_token]').val(),
            'thn_id': $('#thn_id_indikator_sasaran_edit').val(),
            'no_urut': $('#no_urut_indikator_sasaran_edit').val(),
            'id_sasaran_renstra': $('#id_sasaran_renstra_indikator_edit').val(),
            'id_perubahan': $('#id_perubahan_indikator_sasaran_edit').val(),
            'kd_indikator': $('#kd_indikator_sasaran_renstra').val(),
            'uraian_indikator_sasaran_renstra': $('#ur_indikator_sasaran_renstra').val(),
            'tolok_ukur_indikator': $('#ur_indikator_sasaran_renstra').val(),
            'angka_awal_periode': $('#indisasaran_awal_edit').val(),
            'angka_tahun1': $('#indisasaran1_edit').val(),
            'angka_tahun2': $('#indisasaran2_edit').val(),
            'angka_tahun3': $('#indisasaran3_edit').val(),
            'angka_tahun4': $('#indisasaran4_edit').val(),
            'angka_tahun5': $('#indisasaran5_edit').val(),
            'angka_akhir_periode': $('#indisasaran_akhir_edit').val(),    
        },
        success: function(data) {
            $('#tblSasaran').DataTable().ajax.reload(null,false);
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }

        }
    });
});

$(document).on('click', '.btnEditIndikatorSasaran', function() {
var data = tblInSasaran.row( $(this).parents('tr') ).data();
    $('.btnSimpanSasaranIndikator').removeClass('addSasaranIndikator');
    $('.btnSimpanSasaranIndikator').addClass('editSasaranIndikator');
	$('.modal-title').text('Data Indikator Sasaran Daerah');
	$('.form-horizontal').show();
    $('#id_indikator_sasaran_renstra_edit').val(data.id_indikator_sasaran_renstra);
    $('#thn_id_indikator_sasaran_edit').val(data.thn_id);
    $('#id_sasaran_renstra_indikator_edit').val(data.id_sasaran_renstra);
    $('#no_urut_indikator_sasaran_edit').val(data.no_urut);
    $('#id_perubahan_indikator_sasaran_edit').val(data.id_perubahan);
    $('#id_indikator_sasaran_rpjmd_x').val(data.id_sasaran_rpjmd);
    $('#ur_indikator_sasaran_rpjmd').val(null);
    $('#id_indikator_sasaran_rpjmd').val(null);
    $('#ur_indikator_sasaran_renstra').val(data.nm_indikator);
    $('#kd_indikator_sasaran_renstra').val(data.kd_indikator);
    $('#indisasaran1_edit').val(data.angka_tahun1);
    $('#indisasaran2_edit').val(data.angka_tahun2);
    $('#indisasaran3_edit').val(data.angka_tahun3);
    $('#indisasaran4_edit').val(data.angka_tahun4);
    $('#indisasaran5_edit').val(data.angka_tahun5);
    $('#indisasaran_awal_edit').val(data.angka_awal_periode);
    $('#indisasaran_akhir_edit').val(data.angka_akhir_periode);
    $('#satuan_sasaran_indikator_edit').val(data.uraian_satuan);
    $('#ModalIndikatorSasaran').modal('show');
});

$('.modal-footer').on('click', '.editSasaranIndikator', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './renstra/editIndikatorSasaran',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_indikator_sasaran_renstra': $('#id_indikator_sasaran_renstra_edit').val(),
            'thn_id': $('#thn_id_indikator_sasaran_edit').val(),
            'thn_id': $('#thn_id_indikator_sasaran_edit').val(),
            'no_urut': $('#no_urut_indikator_sasaran_edit').val(),
            'id_sasaran_renstra': $('#id_sasaran_renstra_indikator_edit').val(),
            'id_perubahan': $('#id_perubahan_indikator_sasaran_edit').val(),
            'kd_indikator': $('#kd_indikator_sasaran_renstra').val(),
            'uraian_indikator_sasaran_renstra': $('#ur_indikator_sasaran_renstra').val(),
            'tolok_ukur_indikator': $('#ur_indikator_sasaran_renstra').val(),
            'angka_awal_periode': $('#indisasaran_awal_edit').val(),
            'angka_tahun1': $('#indisasaran1_edit').val(),
            'angka_tahun2': $('#indisasaran2_edit').val(),
            'angka_tahun3': $('#indisasaran3_edit').val(),
            'angka_tahun4': $('#indisasaran4_edit').val(),
            'angka_tahun5': $('#indisasaran5_edit').val(),
            'angka_akhir_periode': $('#indisasaran_akhir_edit').val(),    
        },
        success: function(data) {
            $('#tblSasaran').DataTable().ajax.reload(null,false);
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }

        }
    });
});

$(document).on('click', '.btnHapusIndikatorSasaran', function() {
    var data = tblInSasaran.row( $(this).parents('tr') ).data();
      $('.btnDelSasaranIndikator').addClass('delSasaranIndikator');
      $('.modal-title').text('Hapus Referensi Indikator');
      $('.form-horizontal').hide();
      $('#id_sasaran_indikator_hapus').val(data.id_indikator_sasaran_renstra);
      $('#nm_sasaran_indikator_hapus').html(data.nm_indikator);
      $('#HapusSasaranIndikatorModal').modal('show');

});
    
    
    
$('.modal-footer').on('click', '.delSasaranIndikator', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });
    
      $.ajax({
        type: 'post',
        url: './renstra/delIndikatorSasaran',
        data: {
          '_token': $('input[name=_token]').val(),
          'id_indikator_sasaran_renstra': $('#id_sasaran_indikator_hapus').val(),
        },
        success: function(data) {
            $('#tblSasaran').DataTable().ajax.reload(null,false);
            if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
            }
        }
      });
});
