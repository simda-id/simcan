$(document).on('click', '.btnDetailProgram', function() {
var data = tblProgram.row( $(this).parents('tr') ).data();
    $('.btnSimpanProgram').removeClass('addSasaranProgram');
    $('.btnSimpanProgram').addClass('editSasaranProgram');
	$('.modal-title').text('Data Program Perangkat Daerah');
	$('.form-horizontal').show();
    $('#id_perkin_program').val(data.id_perkin_program);
    $('#id_perkin_sasaran_program').val(data.id_perkin_sasaran);
    $('#id_program_renstra').val(data.id_program_renstra);
    $('#uraian_program').val(data.uraian_program_display);
    $('#id_program_ref').val(data.id_program_ref);
    $('#cb_eselon_3').val(data.id_sotk_es3);
    $('#pagu_tahun').val(data.pagu_tahun);
    $('#ModalProgram').modal('show');
});

$('.modal-footer').on('click', '.editSasaranProgram', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './perkin/editProgram',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_perkin_program': $('#id_perkin_program').val(),
            'id_sotk_es3': $('#cb_eselon_3').val(), 
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
