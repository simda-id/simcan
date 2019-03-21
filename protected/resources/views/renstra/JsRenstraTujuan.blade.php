
$(document).on('click', '.btnDetailTujuan', function() {
  var data = tbl_Tujuan.row( $(this).parents('tr') ).data();
      $('.btnAddTujuan').removeClass('addTujuan');
      $('.btnAddTujuan').addClass('editTujuan'); 
      $('.modal-title').text('Detail Data Tujuan Rentra');
      $('#id_tujuan_renstra_edit').val(data.id_tujuan_renstra);
      $('#thn_id_tujuan_edit').val(data.thn_id);
      $('#id_misi_renstra_tujuan_edit').val(data.id_misi_renstra);
      $('#id_misi_tujuan_edit').val(data.kd_misi);
      $('#no_urut_tujuan_edit').val(data.no_urut);
      $('#id_perubahan_tujuan_edit').val(data.id_perubahan);
      $('#ur_tujuan_renstra_edit').val(data.uraian_tujuan_renstra);
      if(data.sumber_data == 0){
          $('.btnHapusTujuan').hide();
      } else {
          $('.btnHapusTujuan').show();
      };

	    $('.form-horizontal').show();
	    $('#ModalTujuan').modal('show');      
});

$(document).on('click', '.btnTambahTujuan', function() {
      $('.btnAddTujuan').addClass('addTujuan');
      $('.btnAddTujuan').removeClass('editTujuan'); 
      $('.modal-title').text('Tambah Tujuan Renstra APBD');  
      $('#id_misi_tujuan_edit').val(null); 
      $('#id_tujuan_renstra_edit').val(null);
      $('#thn_id_tujuan_edit').val(thn_id);
      $('#no_urut_tujuan_edit').val(1);
      $('#id_misi_renstra_tujuan_edit').val(id_misi_renstra);
      $('#id_perubahan_tujuan_edit').val(1);
      $('#ur_tujuan_renstra_edit').val(null);

      $('.form-horizontal').show();
      $('#ModalTujuan').modal('show');  
});

$('.modal-footer').on('click', '.addTujuan', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: 'renstra/addTujuanRenstra',
          data: {
            '_token': $('input[name=_token]').val(),
            'thn_id':$('#thn_id_tujuan_edit').val(),
            'no_urut':$('#no_urut_tujuan_edit').val(),
            'id_misi_renstra':$('#id_misi_renstra_tujuan_edit').val(),
            'id_perubahan':$('#id_perubahan_tujuan_edit').val(),
            'uraian_tujuan_renstra':$('#ur_tujuan_renstra_edit').val(),
          },
          success: function(data) {
              $('#tblTujuan').DataTable().ajax.reload(null,false);
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              } 
          }
      });
  });

$('.modal-footer').on('click', '.editTujuan', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: 'renstra/editTujuanRenstra',
          data: {
            '_token': $('input[name=_token]').val(),
            'no_urut':$('#no_urut_tujuan_edit').val(),
            'id_tujuan_renstra':$('#id_tujuan_renstra_edit').val(),
            'id_perubahan':$('#id_perubahan_tujuan_edit').val(),
            'uraian_tujuan_renstra':$('#ur_tujuan_renstra_edit').val(),
          },
          success: function(data) {
              $('#tblTujuan').DataTable().ajax.reload(null,false);
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              } 
          }
      });
  });

$(document).on('click', '.btnHapusTujuan', function() {
  $('#id_tujuan_renstra_hapus').val($('#id_tujuan_renstra_edit').val());
  $('#ur_tujuan_renstra_hapus').text($('#ur_tujuan_renstra_edit').val());  
  $('#HapusTujuan').modal('show');
});

$(document).on('click', '.btnDelTujuanRenstra', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      type: 'post',
      url: 'renstra/hapusTujuanRenstra',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_tujuan_renstra': $('#id_tujuan_renstra_hapus').val()
      },
      success: function(data) {
        $('#ModalTujuan').modal('hide'); 
        $('#tblTujuan').DataTable().ajax.reload(null,false);
        createPesan(data.pesan,"info");
      }
    });
});