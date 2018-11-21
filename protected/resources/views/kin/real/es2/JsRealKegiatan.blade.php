$(document).on('click', '.btnDetailSasaran', function() {
var data = tblSasaran.row( $(this).parents('tr') ).data();
    $('.btnSimpanProgram').removeClass('addSasaranProgram');
    $('.btnSimpanProgram').addClass('editSasaranProgram');
	$('.modal-title').text('Data Program Perangkat Daerah');
	$('.form-horizontal').show();
    $('#id_perkin_kegiatan').val(data.id_real_kegiatan);
    $('#id_perkin_dokumen_kegiatan').val(data.id_dokumen_real);
    $('#id_kegiatan_renstra').val(data.id_kegiatan_renstra);
    $('#uraian_kegiatan').val(data.uraian_kegiatan_display);
    $('#id_kegiatan_ref').val(data.id_kegiatan_ref);
    $('#pagu_t1').val(data.pagu_t1);
    $('#pagu_t2').val(data.pagu_t2);
    $('#pagu_t3').val(data.pagu_t3);
    $('#pagu_t4').val(data.pagu_t4);
    $('#real_t1').val(data.real_t1);
    $('#real_t2').val(data.real_t2);
    $('#real_t3').val(data.real_t3);
    $('#real_t4').val(data.real_t4);
    $('#ModalKegiatan').modal('show');
});

$('.modal-footer').on('click', '.editSasaranProgram', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './es4/editKegiatan',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_real_kegiatan': $('#id_perkin_kegiatan').val(),
            'real_t1': $('#real_t1').val(), 
            'real_t2': $('#real_t2').val(), 
            'real_t3': $('#real_t3').val(), 
            'real_t4': $('#real_t4').val(), 
        },
        success: function(data) {
            tblSasaran.ajax.reload(null,false);
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }

        }
    });
});
