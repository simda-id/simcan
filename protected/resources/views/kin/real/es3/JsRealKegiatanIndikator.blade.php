$(document).on('click', '.btnDetailIndikatorKegiatan', function() {
var data = tblProgram.row( $(this).parents('tr') ).data();
    $('.btnSimpanRealEs4Indikator').removeClass('addRealEs4Indikator');
    $('.btnSimpanRealEs4Indikator').addClass('editRealEs4Indikator');
	$('.modal-title').text('Data Indikator Kegiatan Perangkat Daerah');
	$('.form-horizontal').show();
    $('#id_indikator_realEs4_renstra').val(data.id_indikator_kegiatan_renstra);
    $('#id_perkin_realEs4_indikator').val(data.id_real_kegiatan);
    $('#id_perkin_realEs4').val(data.id_real_indikator);
    $('#kd_indikator_realEs4').val(data.id_indikator);
    $('#ur_indikator_realEs4').val(data.nm_indikator);
    $('#satuan_realEs4_indikator').val(data.uraian_satuan);
    $('#target_t1_realEs4').val(data.target_t1);
    $('#target_t2_realEs4').val(data.target_t2);
    $('#target_t3_realEs4').val(data.target_t3);
    $('#target_t4_realEs4').val(data.target_t4);
    $('#real_indikator_t1_realEs4').val(data.real_t1);
    $('#real_indikator_t2_realEs4').val(data.real_t2);
    $('#real_indikator_t3_realEs4').val(data.real_t3);
    $('#real_indikator_t4_realEs4').val(data.real_t4);
    $('#uraian_deviasi_realEs4').val(data.uraian_deviasi);
    $('#uraian_renaksi_realEs4').val(data.uraian_renaksi);
    $('#reviu_realEs4').val(data.reviu_real);
    $('#reviu_deviasi_realEs4').val(data.reviu_deviasi);
    $('#reviu_renaksi_realEs4').val(data.reviu_renaksi);
    $('#flag_reviu_realEs4').val(data.status_data);
    if(data.status_data == 0){
        $('#flag_reviu_realEs4_1').removeClass('active').addClass('notActive');
        $('#flag_reviu_realEs4_0').addClass('active').removeClass('notActive');
    } else {
        $('#flag_reviu_realEs4_0').removeClass('active').addClass('notActive');
        $('#flag_reviu_realEs4_1').addClass('active').removeClass('notActive');
    }
    $('#ModalIndikatorRealEs4').modal('show');
});

$('.modal-footer').on('click', '.editRealEs4Indikator', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './es3/reviuRealisasi',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_real_indikator': $('#id_perkin_realEs4').val(),
            'real_reviu': $('#reviu_realEs4').val(), 
            'reviu_deviasi': $('#reviu_deviasi_realEs4').val(), 
            'reviu_renaksi': $('#reviu_renaksi_realEs4').val(), 
            'status_data': $('#flag_reviu_realEs4').val(), 
        },
        success: function(data) {
            tblProgram.ajax.reload(null,false);
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }

        }
    });
});
