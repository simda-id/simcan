function getLevelJabatan(){
    var xCheck = document.querySelectorAll('input[name="checkLevelJabatan"]:checked');
    var xyz = [];
    for(var x = 0, l = xCheck.length; x < l;  x++)
      { xyz.push(xCheck[x].value); }
    var xvalues = xyz.join('');
    return xvalues;
  };

$(document).on('click', '.btnTambahUnit', function() {
        $('.btnSimpanRiwayatUnit').removeClass('editRiwayatUnit');
        $('.btnSimpanRiwayatUnit').addClass('addRiwayatUnit');
        $('.modal-title').text('Data Riwayat Unit dan Jabatan Pegawai');
        $('#id_unit_pegawai').val(null);
        $('#id_pegawai_riwayat_unit').val($('#id_pegawai').val());
        $('#nama_pegawai_riwayat_unit').val($('#nama_pegawai').val());
        $('#cb_unit_riwayat').val(0);
        document.frmModalRiwayatUnit.checkLevelJabatan[0].checked=true;
        $('#cb_jabatan_riwayat_unit').val(0);
        $('#nama_eselon3_text').val(0);
        $('#tmt_unit').val();
        $('#tmt_unit_x').val();   
        $('.form-horizontal').show();
        $('#ModalRiwayatUnit').modal('show');
});

$('.modal-footer').on('click', '.addRiwayatUnit', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: 'pegawai/addUnitJabatan',
        data: {
            '_token': $('input[name=_token]').val(),  
            'id_pegawai': $('#id_pegawai_riwayat_unit').val(),
            'id_unit': $('#cb_unit_riwayat').val(),
            'tingkat_eselon': getLevelJabatan(),
            'id_jabatan_eselon': $('#cb_jabatan_riwayat_unit').val(),
            'nama_jabatan': $('#cb_jabatan_riwayat_unit option:selected').text(),
            'tmt_unit': $('#tmt_unit').val(), 
        },
        success: function(data) {
            tblUnit.ajax.reload(null,false);
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }
        }
    });
});

$(document).on('click', '.btnDetailUnit', function() {
var data = tblUnit.row( $(this).parents('tr') ).data();
    $('.btnSimpanRiwayatUnit').addClass('editRiwayatUnit');
    $('.btnSimpanRiwayatUnit').removeClass('addRiwayat');
    $('.modal-title').text('Data Riwayat Unit dan Jabatan Pegawai');
    $('#id_unit_pegawai').val(data.id_unit_pegawai);
    $('#id_pegawai_riwayat_unit').val(data.id_pegawai);
    $('#nama_pegawai_riwayat_unit').val(data.nama_pegawai);
    $('#cb_unit_riwayat').val(data.id_unit);
    document.frmModalRiwayatUnit.checkLevelJabatan[data.tingkat_eselon].checked=true;
    $('#cb_jabatan_riwayat_unit').val(data.id_jabatan_eselon);
    $('#nama_eselon3_text').val(data.nama_jabatan);
    $('#tmt_unit').val(data.tmt_unit);
    $('#tmt_unit_x').val(formatTgl(data.tmt_unit));     
    $('.form-horizontal').show();
    $('#ModalRiwayatUnit').modal('show');
});

$('.modal-footer').on('click', '.editRiwayatUnit', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: 'pegawai/editUnitJabatan',
        data: {
            '_token': $('input[name=_token]').val(),                        
            'id_unit_pegawai': $('#id_unit_pegawai').val(),   
            'id_pegawai': $('#id_pegawai_riwayat_unit').val(),
            'id_unit': $('#cb_unit_riwayat').val(),
            'tingkat_eselon': getLevelJabatan(),
            'id_jabatan_eselon': $('#cb_jabatan_riwayat_unit').val(),
            'nama_jabatan': $('#cb_jabatan_riwayat_unit option:selected').text(),
            'tmt_unit': $('#tmt_unit').val(),     
        },
        success: function(data) {
            tblUnit.ajax.reload(null,false);
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }
        }
    });
});

$(document).on('click', '.btnDelRiwayatUnit', function() {
    var data = tblUnit.row( $(this).parents('tr') ).data();
      $('.btnAksiDelRiwayatUnit').addClass('delRiwayatUnit');
      $('.modal-title').text('Hapus Data Unit dan Jabatan Pegawai');
      $('.form-horizontal').hide();
      $('#id_unit_pegawai_hapus').val(data.id_unit_pegawai);
      $('.nama_unit_pegawai_hapus').html(data.nama_pegawai);
      $('#HapusRiwayat').modal('show');

}); 
    
$('.modal-footer').on('click', '.delRiwayatUnit', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });
    
      $.ajax({
        type: 'post',
        url: 'pegawai/delUnitJabatan',
        data: {
          '_token': $('input[name=_token]').val(),
          'id_unit_pegawai': $('#id_unit_pegawai_hapus').val(),
        },
        success: function(data) {
            tblUnit.ajax.reload(null,false);
            if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
            }
        }
      });
});