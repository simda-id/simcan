$(document).on('click', '.btnDetailProgram', function() {
    var data = tbl_Program.row( $(this).parents('tr') ).data();
    $('.btnSimpanProgram').removeClass('addProgram');
    $('.btnSimpanProgram').addClass('editProgram');
	$('.modal-title').text('Data Program Perangkat Daerah');
	$('.form-horizontal').show();
    $('#id_program_renstra_edit').val(data.id_program_renstra);
    $('#thn_id_program_edit').val(data.thn_id);
    $('#id_sasaran_renstra_program_edit').val(data.id_sasaran_renstra);
    $('#id_sasaran_program_edit').val(1);
    $('#no_urut_program_edit').val(data.no_urut);
    $('#id_program_rpjmd_edit').val(data.id_program_rpjmd);
    $('#ur_program_rpjmd_edit').val(data.nm_program_rpjmd);
    $('#id_program_ref_edit').val(data.id_program_ref);
    $('#kd_program_edit').val(data.kd_program);
    $('#ur_program_renstra_edit').val(data.nm_program);
    $('#ur_sasaran_program_renstra_edit').val(data.uraian_sasaran_program);
    $('#pagu1_edit').val(data.pagu_tahun1a);
    $('#pagu2_edit').val(data.pagu_tahun2a);
    $('#pagu3_edit').val(data.pagu_tahun3a);
    $('#pagu4_edit').val(data.pagu_tahun4a);
    $('#pagu5_edit').val(data.pagu_tahun5a);
    $('#pagu6_edit').val(data.pagu_tahun6a);
    $('#ModalProgram').modal('show');
});

$('.modal-footer').on('click', '.editProgram', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './renstra/editProgram',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_program_renstra' : $('#id_program_renstra_edit').val(),
            'thn_id' : $('#thn_id_program_edit').val(),
            'no_urut' : $('#no_urut_program_edit').val(),
            'id_sasaran_renstra' : $('#id_sasaran_renstra_program_edit').val(),
            'id_program_rpjmd' : $('#id_program_rpjmd_edit').val(),
            'id_program_ref' : $('#id_program_ref_edit').val(),
            'id_perubahan' : 0,
            'uraian_program_renstra' : $('#ur_program_renstra_edit').val(),
            'uraian_sasaran_program' : $('#ur_sasaran_program_renstra_edit').val(),
            'pagu_tahun1' : $('#pagu1_edit').val(),
            'pagu_tahun2' : $('#pagu2_edit').val(),
            'pagu_tahun3' : $('#pagu3_edit').val(),
            'pagu_tahun4' : $('#pagu4_edit').val(),
            'pagu_tahun5' : $('#pagu5_edit').val(),
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