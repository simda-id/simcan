$(document).on('click', '.btnTambahPangkat', function() {
        $('.btnSimpanRiwayat').removeClass('editRiwayat');
        $('.btnSimpanRiwayat').addClass('addRiwayat');
        $('.modal-title').text('Data Pangkat Pegawai Pejabat Eselon');
        $('#id_pangkat').val(null);
        $('#id_pegawai_pangkat').val(id_pegawai_temp);
        $('#nama_pegawai_pangkat').val($('#nama_pegawai').val());
        $('#cb_golongan').val(0);
        $('#tmt_pangkat').val();
        $('#tmt_pangkat_x').val();   
        $('.form-horizontal').show();
        $('#ModalRiwayat').modal('show');
});

$('.modal-footer').on('click', '.addRiwayat', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: 'pegawai/addPangkat',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_pegawai': $('#id_pegawai_pangkat').val(),
            'pangkat_pegawai': $('#cb_golongan').val(),
            'tmt_pangkat': $('#tmt_pangkat').val(),   
        },
        success: function(data) {
            tblPangkat.ajax.reload(null,false);
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }
        }
    });
});

$(document).on('click', '.btnDetailPangkat', function() {
var data = tblPangkat.row( $(this).parents('tr') ).data();
    $('.btnSimpanRiwayat').addClass('editRiwayat');
    $('.btnSimpanRiwayat').removeClass('addRiwayat');
    $('.modal-title').text('Data Pangkat Pegawai Pejabat Eselon');
    $('#id_pangkat').val(data.id_pangkat);
    $('#id_pegawai_pangkat').val(data.id_pegawai);
    $('#nama_pegawai_pangkat').val(data.nama_pegawai);
    $('#cb_golongan').val(data.pangkat_pegawai);
    $('#tmt_pangkat').val(data.tmt_pangkat);
    $('#tmt_pangkat_x').val(data.tmt_pangkat);   
    $('.form-horizontal').show();
    $('#ModalRiwayat').modal('show');
});

$('.modal-footer').on('click', '.editRiwayat', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: 'pegawai/editPangkat',
        data: {
            '_token': $('input[name=_token]').val(),                        
            'id_pangkat': $('#id_pangkat').val(),             
            'id_pegawai': $('#id_pegawai_pangkat').val(),
            'pangkat_pegawai': $('#cb_golongan').val(),
            'tmt_pangkat': $('#tmt_pangkat').val(),     
        },
        success: function(data) {
            tblPangkat.ajax.reload(null,false);
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }
        }
    });
});

$(document).on('click', '.btnDelRiwayat', function() {
    var data = tblPangkat.row( $(this).parents('tr') ).data();
      $('.btnAksiDelRiwayat').addClass('delPangkat');
      $('.modal-title').text('Hapus Data Pangkat Pegawai Pejabat Eselon');
      $('.form-horizontal').hide();
      $('#id_pangkat_hapus').val(data.id_pangkat);
      $('.nama_pangkat_hapus').html(data.pangkat_display);
      $('#HapusRiwayat').modal('show');

}); 
    
$('.modal-footer').on('click', '.delPangkat', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });
    
      $.ajax({
        type: 'post',
        url: 'pegawai/delPangkat',
        data: {
          '_token': $('input[name=_token]').val(),
          'id_pangkat': $('#id_pangkat_hapus').val(),
        },
        success: function(data) {
            tblPangkat.ajax.reload(null,false);
            if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
            }
        }
      });
});