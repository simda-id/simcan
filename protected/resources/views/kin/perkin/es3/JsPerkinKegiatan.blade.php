$(document).on('click', '.btnDetailProgram', function() {
var data = tblProgram.row( $(this).parents('tr') ).data();
    $('.btnSimpanProgram').removeClass('addSasaranProgram');
    $('.btnSimpanProgram').addClass('editSasaranProgram');
	$('.modal-title').text('Data Program Perangkat Daerah');
	$('.form-horizontal').show();
    $('#id_perkin_kegiatan').val(data.id_perkin_kegiatan);
    $('#id_perkin_program_kegiatan').val(data.id_perkin_program);
    $('#id_kegiatan_renstra').val(data.id_kegiatan_renstra);
    $('#uraian_kegiatan').val(data.uraian_kegiatan_display);
    $('#id_kegiatan_ref').val(data.id_kegiatan_ref);
    $('#cb_eselon_4').val(data.id_sotk_es4);
    $('#pagu_tahun').val(data.pagu_tahun);
    $('#ModalKegiatan').modal('show');
});

$('.modal-footer').on('click', '.editSasaranProgram', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './es3/editProgram',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_perkin_kegiatan': $('#id_perkin_kegiatan').val(),
            'id_sotk_es4': $('#cb_eselon_4').val(), 
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
