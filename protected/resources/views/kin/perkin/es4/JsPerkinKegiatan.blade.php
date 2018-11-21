$(document).on('click', '.btnDetailSasaran', function() {
var data = tblSasaran.row( $(this).parents('tr') ).data();
    $('.btnSimpanProgram').removeClass('addSasaranProgram');
    $('.btnSimpanProgram').addClass('editSasaranProgram');
	$('.modal-title').text('Data Program Perangkat Daerah');
	$('.form-horizontal').show();
    $('#id_perkin_kegiatan').val(data.id_perkin_kegiatan);
    $('#id_perkin_dokumen_kegiatan').val(data.id_dokumen_perkin);
    $('#id_kegiatan_renstra').val(data.id_kegiatan_renstra);
    $('#uraian_kegiatan').val(data.uraian_kegiatan_display);
    $('#id_kegiatan_ref').val(data.id_kegiatan_ref);
    $('#pagu_t1').val(data.pagu_t1);
    $('#pagu_t2').val(data.pagu_t2);
    $('#pagu_t3').val(data.pagu_t3);
    $('#pagu_t4').val(data.pagu_t4);
    $('#pagu_tahun').val(data.pagu_tahun);
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
            'id_perkin_kegiatan': $('#id_perkin_kegiatan').val(),
            'pagu_t1': $('#pagu_t1').val(), 
            'pagu_t2': $('#pagu_t2').val(), 
            'pagu_t3': $('#pagu_t3').val(), 
            'pagu_t4': $('#pagu_t4').val(), 
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
