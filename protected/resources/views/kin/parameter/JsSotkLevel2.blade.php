function getEselon2(){
    var xCheck = document.querySelectorAll('input[name="checkEselon2"]:checked');
    var xyz = [];
    for(var x = 0, l = xCheck.length; x < l;  x++)
      { xyz.push(xCheck[x].value); }
    var xvalues = xyz.join('');
    return xvalues;
  }

$(document).on('click', '.btnAddLevel2', function() {
    if(id_unit_temp == null || level1_temp == null){
        createPesan("Maaf Unit/Atasan Langsung belum dipilih...!","danger"); 
    } else {
        $('.btnSimpanLevel2').removeClass('editLevel2');
        $('.btnSimpanLevel2').addClass('addLevel2');
        $('.modal-title').text('Data Eselon Level 2');
        $('#id_sotk_es3_text').val(null);
        $('#id_sotk_es2_text').val(level1_temp);
        $('#ur_atlas_level_2').val($('#ur_eselon_level1_2').text());
        $('#nama_eselon3_text').val(null);
        document.frmModalLevel2.checkEselon2[3].checked=true;    
        $('.form-horizontal').show();
        $('#ModalSotkLevel2').modal('show');
    };
});

$('.modal-footer').on('click', '.addLevel2', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: 'sotk/addLevel2',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_sotk_es2': $('#id_sotk_es2_text').val(),
            'nama_eselon': $('#nama_eselon3_text').val(),
            'tingkat_eselon': getEselon2(),   
        },
        success: function(data) {
            level2_tbl.ajax.reload(null,false);
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }
        }
    });
});

$(document).on('click', '.btnEditLevel2', function() {
var data = level2_tbl.row( $(this).parents('tr') ).data();
    $('.btnSimpanLevel2').addClass('editLevel2');
    $('.btnSimpanLevel2').removeClass('addLevel2');
    $('.modal-title').text('Data Eselon Level 2');
    $('#id_sotk_es2_text').val(data.id_sotk_es2);
    $('#id_sotk_es3_text').val(data.id_sotk_es3);
    $('#ur_atlas_level_2').val(data.nama_eselon2);
    $('#nama_eselon3_text').val(data.nama_eselon3);
    document.frmModalLevel2.checkEselon2[data.tingkat_eselon].checked=true;    
    $('.form-horizontal').show();
    $('#ModalSotkLevel2').modal('show');
});

$('.modal-footer').on('click', '.editLevel2', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: 'sotk/editLevel2',
        data: {
            '_token': $('input[name=_token]').val(),                        
            'id_sotk_es3': $('#id_sotk_es3_text').val(), 
            'id_sotk_es2': $('#id_sotk_es2_text').val(),
            'nama_eselon': $('#nama_eselon3_text').val(),
            'tingkat_eselon': getEselon2(),      
        },
        success: function(data) {
            level2_tbl.ajax.reload(null,false);
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }
        }
    });
});

$(document).on('click', '.btnHapusLevel2', function() {
    var data = level2_tbl.row( $(this).parents('tr') ).data();
      $('.btnDelLevel2').addClass('delLevel2');
      $('.modal-title').text('Hapus Data Level 2');
      $('.form-horizontal').hide();
      $('#id_sotk_es3_hapus').val(data.id_sotk_es3);
      $('#nama_eselon3_hapus').html(data.nama_eselon3);
      $('#HapusLevel2Modal').modal('show');

}); 
    
$('.modal-footer').on('click', '.delLevel2', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });
    
      $.ajax({
        type: 'post',
        url: 'sotk/delLevel2',
        data: {
          '_token': $('input[name=_token]').val(),
          'id_sotk_es3': $('#id_sotk_es3_hapus').val(),
        },
        success: function(data) {
            level2_tbl.ajax.reload(null,false);
            if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
            }
        }
      });
});