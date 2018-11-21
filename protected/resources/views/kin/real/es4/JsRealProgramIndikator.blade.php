$(document).on('click', '.btnDetailIndikatorSasaran', function() {
realisasi();
var data = tblIndikator.row( $(this).parents('tr') ).data();
    $('.btnSimpanSasaranIndikator').removeClass('addSasaranIndikator');
    $('.btnSimpanSasaranIndikator').addClass('editSasaranIndikator');
	$('.modal-title').text('Data Indikator Kegiatan Perangkat Daerah');
	$('.form-horizontal').show();
    $('#id_indikator_sasaran_renstra').val(data.id_indikator_kegiatan_renstra);
    $('#id_perkin_sasaran_indikator').val(data.id_real_kegiatan);
    $('#id_perkin_indikator').val(data.id_real_indikator);
    $('#kd_indikator_perkin').val(data.id_indikator);
    $('#ur_indikator_sasaran').val(data.nm_indikator);
    $('#satuan_sasaran_indikator').val(data.uraian_satuan);
    $('#target_t1').val(data.target_t1);
    $('#target_t2').val(data.target_t2);
    $('#target_t3').val(data.target_t3);
    $('#target_t4').val(data.target_t4);
    $('#real_indikator_t1').val(data.real_t1);
    $('#real_indikator_t2').val(data.real_t2);
    $('#real_indikator_t3').val(data.real_t3);
    $('#real_indikator_t4').val(data.real_t4);
    $('#real_indikator_t'+triwulan_temp).removeClass('realisasi');
    $('#target_tahun').val(data.target_tahun);
    $('#uraian_deviasi_indikator').val(data.uraian_deviasi);
    $('#uraian_renaksi_indikator').val(data.uraian_renaksi);
    $('#ModalIndikatorProgram').modal('show');
});

$('.modal-footer').on('click', '.editSasaranIndikator', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './es4/editIndikatorSasaran',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_real_indikator': $('#id_perkin_indikator').val(),
            'real_t1': $('#real_indikator_t1').val(),
            'real_t2': $('#real_indikator_t2').val(),
            'real_t3': $('#real_indikator_t3').val(),
            'real_t4': $('#real_indikator_t4').val(), 
            'uraian_deviasi': $('#uraian_deviasi_indikator').val(), 
            'uraian_renaksi': $('#uraian_renaksi_indikator').val(),
            'real_reviu': $('#real_indikator_t'+triwulan_temp).val(),    
        },
        success: function(data) {
            $('#tblIndikator').DataTable().ajax.reload(null,false);
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }

        }
    });
});
