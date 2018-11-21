$(document).on('click', '.btnDetailIndikatorProgram', function() {
var data = tblInProgram.row( $(this).parents('tr') ).data();
    $('.btnSimpanProgramIndikator').removeClass('addProgramIndikator');
    $('.btnSimpanProgramIndikator').addClass('editProgramIndikator');
	$('.modal-title').text('Data Indikator Kinerja Program Perangkat Daerah');
	$('.form-horizontal').show();
    $('#id_iku_opd_program_rinci').val(data.id_iku_opd_program);
    $('#id_iku_sasaran_rinci').val(data.id_iku_opd_sasaran);
    $('#id_indikator_program_renstra_rinci').val(data.id_indikator_program_renstra);
    $('#nm_indikator_program_rinci').val(data.nm_indikator);
    $('#target_program_rinci').val(data.angka_akhir_periode);
    $('#satuan_program_rinci').val(data.uraian_satuan);
    $('#type_indikator_program_rinci').val(data.sifat_indikator_display);
    $('#metode_ukur_program_rinci').val(data.metode_penghitungan,);
    $('#sumber_data_ukur_program_rinci').val(data.sumber_data_indikator);
    $('#jenis_indikator_program_rinci').val(data.kualitas_indikator_display);
    $('#sifat_indikator_program_rinci').val(data.jenis_indikator_display);
    $('#tipe_indikator_program_rinci').val(data.type_indikator_display);
    $('#flag_iku_rinci_program').val(data.flag_iku);
    if(data.flag_iku == 0){
        $('#flag_iku_rinci_program_1').removeClass('active').addClass('notActive');
        $('#flag_iku_rinci_program_0').addClass('active').removeClass('notActive');
    } else {
        $('#flag_iku_rinci_program_0').removeClass('active').addClass('notActive');
        $('#flag_iku_rinci_program_1').addClass('active').removeClass('notActive');
    }
    $('#unit_esl3').val(data.id_esl3);
    $('#ModalIndikatorProgram').modal('show');
});

$('.modal-footer').on('click', '.editProgramIndikator', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './opd/editIndikatorProgram',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_iku_opd_program': $('#id_iku_opd_program_rinci').val(),
            'flag_iku': $('#flag_iku_rinci_program').val(),
            'id_esl3': $('#unit_esl3').val(),
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
