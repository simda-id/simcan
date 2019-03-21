
$(document).on('click', '.btnDetailTujuan', function() {
  var data = tbl_Tujuan.row( $(this).parents('tr') ).data();
      $('.modal-title').text('Detail Data Tujuan Rentra');
      $('#id_tujuan_renstra_edit').val(data.id_tujuan_renstra);
      $('#thn_id_tujuan_edit').val(data.thn_id);
      $('#id_misi_renstra_tujuan_edit').val(data.id_misi_renstra);
      $('#id_misi_tujuan_edit').val(data.kd_misi);
      $('#no_urut_tujuan_edit').val(data.no_urut);
      $('#id_perubahan_tujuan_edit').val(data.id_perubahan);
      $('#ur_tujuan_renstra_edit').val(data.uraian_tujuan_renstra);
	    $('.form-horizontal').show();
	    $('#ModalTujuan').modal('show');
      
});