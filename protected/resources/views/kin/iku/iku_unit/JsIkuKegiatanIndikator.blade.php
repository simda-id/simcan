$(document).on('click', '.btnDetailIndikatorKegiatan', function() {
var data = tblInKegiatan.row( $(this).parents('tr') ).data();
    $('.btnSimpanKegiatanIndikator').removeClass('addKegiatanIndikator');
    $('.btnSimpanKegiatanIndikator').addClass('editKegiatanIndikator');
	$('.modal-title').text('Data Indikator Kinerja Kegiatan Perangkat Daerah');
	$('.form-horizontal').show();
    $('#id_iku_opd_kegiatan_rinci').val(data.id_iku_opd_kegiatan);
    $('#id_iku_program_rinci').val(data.id_iku_opd_program);
    $('#id_indikator_kegiatan_renstra_rinci').val(data.id_indikator_kegiatan_renstra);
    $('#nm_indikator_kegiatan_rinci').val(data.nm_indikator);
    $('#target_kegiatan_rinci').val(data.angka_akhir_periode);
    $('#satuan_kegiatan_rinci').val(data.uraian_satuan);
    $('#type_indikator_kegiatan_rinci').val(data.sifat_indikator_display);
    $('#metode_ukur_kegiatan_rinci').val(data.metode_penghitungan,);
    $('#sumber_data_ukur_kegiatan_rinci').val(data.sumber_data_indikator);
    $('#jenis_indikator_kegiatan_rinci').val(data.kualitas_indikator_display);
    $('#sifat_indikator_kegiatan_rinci').val(data.jenis_indikator_display);
    $('#tipe_indikator_kegiatan_rinci').val(data.type_indikator_display);
    $('#flag_iku_rinci_kegiatan').val(data.flag_iku);
    if(data.flag_iku == 0){
        $('#flag_iku_rinci_kegiatan_1').removeClass('active').addClass('notActive');
        $('#flag_iku_rinci_kegiatan_0').addClass('active').removeClass('notActive');
    } else {
        $('#flag_iku_rinci_kegiatan_0').removeClass('active').addClass('notActive');
        $('#flag_iku_rinci_kegiatan_1').addClass('active').removeClass('notActive');
    };
    $('#unit_esl4').val(data.id_esl4);
    $('#ModalIndikatorKegiatan').modal('show');
});

$('.modal-footer').on('click', '.editKegiatanIndikator', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './opd/editIndikatorKegiatan',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_iku_opd_kegiatan': $('#id_iku_opd_kegiatan_rinci').val(),
            'flag_iku': $('#flag_iku_rinci_kegiatan').val(),
            'id_esl4': $('#unit_esl4').val(),
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
