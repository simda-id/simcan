
$(document).on('click', '.btnDetailVisi', function() {
  var data = tbl_Visi.row( $(this).parents('tr') ).data();
      $('.modal-title').text('Detail Data Visi Rentra');
      $('#id_visi_renstra_edit').val(data.id_visi_renstra);
      $('#id_renstra_edit').val();
      $('#thn_id_edit').val(data.thn_id);
      $('#thn_periode_visi').val(data.thn_periode);
      $('#no_urut_edit').val(data.no_urut);
      $('#id_perubahan_edit').val(data.id_perubahan);
      $('#ur_visi_renstra_edit').val(data.uraian_visi_renstra);
	    $('.form-horizontal').show();
	    $('#ModalVisi').modal('show');
      
});