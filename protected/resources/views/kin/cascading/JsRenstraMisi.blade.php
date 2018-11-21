
$(document).on('click', '.btnDetailMisi', function() {
  var data = tbl_Misi.row( $(this).parents('tr') ).data();
      $('.modal-title').text('Detail Data Misi Rentra');
      $('#id_misi_renstra_edit').val(data.id_misi_renstra);
      $('#thn_id_misi_edit').val(data.thn_id);
      $('#id_visi_renstra_misi_edit').val(data.id_visi_renstra);
      $('#no_urut_misi_edit').val(data.no_urut);
      $('#id_perubahan_misi_edit').val(data.id_perubahan);
      $('#ur_misi_renstra_edit').val(data.uraian_misi_renstra);
	    $('.form-horizontal').show();
	    $('#ModalMisi').modal('show');
      
});