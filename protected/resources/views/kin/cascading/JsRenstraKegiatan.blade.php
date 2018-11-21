$(document).on('click', '.btnDetailKegiatan', function() {
    var data = tbl_Kegiatan.row( $(this).parents('tr') ).data();
    $('.btnSimpanKegiatan').removeClass('addKegiatan');
    $('.btnSimpanKegiatan').addClass('editKegiatan');
	$('.modal-title').text('Data Kegiatan Renstra Perangkat Daerah');
	$('.form-horizontal').show();
    $('#id_kegiatan_renstra_edit').val(data.id_kegiatan_renstra);
    $('#thn_id_kegiatan_edit').val(data.thn_id);
    $('#id_program_renstra_kegiatan_edit').val(data.id_program_renstra);
    $('#kd_program_kegiatan_edit').val(data.kd_program);
    $('#no_urut_kegiatan_edit').val(data.no_urut);
    $('#id_kegiatan_ref_edit').val(data.id_kegiatan_ref);
    $('#kd_kegiatan_edit').val(data.kd_kegiatan);
    $('#ur_kegiatan_renstra_edit').val(data.ur_kegiatan);
    $('#ur_sasaran_kegiatan_renstra_edit').val(data.uraian_sasaran_kegiatan);
    $('#pagu1_edit_kegiatan').val(data.pagu_tahun1a);
    $('#pagu2_edit_kegiatan').val(data.pagu_tahun2a);
    $('#pagu3_edit_kegiatan').val(data.pagu_tahun3a);
    $('#pagu4_edit_kegiatan').val(data.pagu_tahun4a);
    $('#pagu5_edit_kegiatan').val(data.pagu_tahun5a);
    $('#pagu6_edit_kegiatan').val(data.pagu_tahun6a);
    $('#ModalKegiatan').modal('show');
});

$('.modal-footer').on('click', '.editKegiatan', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './renstra/editKegiatan',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_kegiatan_renstra' : $('#id_kegiatan_renstra_edit').val(),
            'thn_id' : $('#thn_id_kegiatan_edit').val(),
            'no_urut' : $('#no_urut_kegiatan_edit').val(),
            'id_program_renstra' : $('#id_program_renstra_kegiatan_edit').val(),
            'id_kegiatan_ref' : $('#id_kegiatan_ref_edit').val(),
            'id_perubahan' : 1,
            'uraian_kegiatan_renstra' : $('#ur_kegiatan_renstra_edit').val(),
            'uraian_sasaran_kegiatan' : $('#ur_sasaran_kegiatan_renstra_edit').val(),
            'pagu_tahun1' : $('#pagu1_edit_kegiatan').val(),
            'pagu_tahun2' : $('#pagu2_edit_kegiatan').val(),
            'pagu_tahun3' : $('#pagu3_edit_kegiatan').val(),
            'pagu_tahun4' : $('#pagu4_edit_kegiatan').val(),
            'pagu_tahun5' : $('#pagu5_edit_kegiatan').val(),
            'total_pagu'  : $('#pagu6_edit_kegiatan').val(),
            'sumber_data' : 0,    
        },
        success: function(data) {
            $('#tblProgram').DataTable().ajax.reload(null,false);
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }

        }
    });
});

$(document).on('click', '.btnHapusIndikatorProgram', function() {
    var data = tblInProgram.row( $(this).parents('tr') ).data();
      $('.btnDelProgramIndikator').addClass('delProgramIndikator');
      $('.modal-title').text('Hapus Referensi Indikator');
      $('.form-horizontal').hide();
      $('#id_program_indikator_hapus').val(data.id_indikator_program_renstra);
      $('#nm_program_indikator_hapus').html(data.nm_indikator);
      $('#HapusProgramIndikatorModal').modal('show');

});
    
    
    
$('.modal-footer').on('click', '.delProgramIndikator', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });
    
      $.ajax({
        type: 'post',
        url: './renstra/delIndikatorProgram',
        data: {
          '_token': $('input[name=_token]').val(),
          'id_indikator_program_renstra': $('#id_program_indikator_hapus').val(),
        },
        success: function(data) {
            $('#tblProgram').DataTable().ajax.reload(null,false);
            if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
            }
        }
      });
});