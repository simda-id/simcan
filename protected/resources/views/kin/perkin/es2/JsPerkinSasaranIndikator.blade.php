$(document).on('click', '.btnDetailIndikatorSasaran', function() {
var data = tblInSasaran.row( $(this).parents('tr') ).data();
    $('.btnSimpanSasaranIndikator').removeClass('addSasaranIndikator');
    $('.btnSimpanSasaranIndikator').addClass('editSasaranIndikator');
	$('.modal-title').text('Data Indikator Sasaran Perangkat Daerah');
	$('.form-horizontal').show();
    $('#id_indikator_sasaran_renstra').val(data.id_indikator_sasaran_renstra);
    $('#id_perkin_sasaran_indikator').val(data.id_perkin_sasaran);
    $('#id_perkin_indikator').val(data.id_perkin_indikator);
    $('#kd_indikator_perkin').val(data.id_indikator);
    $('#ur_indikator_sasaran').val(data.nm_indikator);
    $('#satuan_sasaran_indikator').val(data.uraian_satuan);
    $('#target_t1').val(data.target_t1);
    $('#target_t2').val(data.target_t2);
    $('#target_t3').val(data.target_t3);
    $('#target_t4').val(data.target_t4);
    $('#target_tahun').val(data.target_tahun);
    $('#ModalIndikatorSasaran').modal('show');
});

$('.modal-footer').on('click', '.editSasaranIndikator', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './perkin/editIndikatorSasaran',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_perkin_indikator': $('#id_perkin_indikator').val(),
            'target_t1': $('#target_t1').val(),
            'target_t2': $('#target_t2').val(),
            'target_t3': $('#target_t3').val(),
            'target_t4': $('#target_t4').val(),   
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
