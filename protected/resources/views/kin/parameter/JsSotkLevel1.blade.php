function getEselon1(){
    var xCheck = document.querySelectorAll('input[name="checkEselon1"]:checked');
    var xyz = [];
    for(var x = 0, l = xCheck.length; x < l;  x++)
      { xyz.push(xCheck[x].value); }
    var xvalues = xyz.join('');
    return xvalues;
  }

$(document).on('click', '.btnAddLevel1', function() {
    if(id_unit_temp == null){
        createPesan("Maaf Unit Organisasi belum dipilih...!","danger"); 
    } else {
        $('.btnSimpanLevel1').removeClass('editLevel1');
        $('.btnSimpanLevel1').addClass('addLevel1');
        $('.modal-title').text('Data Eselon Level 1');
        $('#id_sotk_es3_text').val(null);
        $('#id_unit_text').val(id_unit_temp);
        $('#unit_level1_text').val($('#ur_unit_level_1').text());
        $('#nama_eselon2_text').val(null);
        document.frmModalLevel1.checkEselon1[3].checked=true;    
        $('.form-horizontal').show();
        $('#ModalSotkLevel1').modal('show');
    };
});

$('.modal-footer').on('click', '.addLevel1', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: 'sotk/addLevel1',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_unit': $('#id_unit_text').val(),
            'nama_eselon': $('#nama_eselon2_text').val(),
            'tingkat_eselon': getEselon1(),   
        },
        success: function(data) {
            level1_tbl.ajax.reload(null,false);
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }
        }
    });
});

$(document).on('click', '.btnEditLevel1', function() {
var data = level1_tbl.row( $(this).parents('tr') ).data();
    $('.btnSimpanLevel1').addClass('editLevel1');
    $('.btnSimpanLevel1').removeClass('addLevel1');
    $('.modal-title').text('Data Eselon Level 1');
    $('#id_sotk_es2_text').val(data.id_sotk_es2);
    $('#id_unit_text').val(data.id_unit);
    $('#unit_level1_text').val($('#ur_unit_level_1').text());
    $('#nama_eselon2_text').val(data.nama_eselon);
    document.frmModalLevel1.checkEselon1[data.tingkat_eselon].checked=true;    
    $('.form-horizontal').show();
    $('#ModalSotkLevel1').modal('show');
});

$('.modal-footer').on('click', '.editLevel1', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: 'sotk/editLevel1',
        data: {
            '_token': $('input[name=_token]').val(),                        
            'id_sotk_es2': $('#id_sotk_es2_text').val(), 
            'id_unit': $('#id_unit_text').val(),
            'nama_eselon': $('#nama_eselon2_text').val(),
            'tingkat_eselon': getEselon1(),      
        },
        success: function(data) {
            level1_tbl.ajax.reload(null,false);
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }
        }
    });
});

$(document).on('click', '.btnHapusLevel1', function() {
    var data = level1_tbl.row( $(this).parents('tr') ).data();
      $('.btnDelLevel1').addClass('delLevel1');
      $('.modal-title').text('Hapus Data Level 1');
      $('.form-horizontal').hide();
      $('#id_sotk_es2_hapus').val(data.id_sotk_es2);
      $('#nama_eselon2_hapus').html(data.nama_eselon);
      $('#HapusLevel1Modal').modal('show');

}); 
    
$('.modal-footer').on('click', '.delLevel1', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });
    
      $.ajax({
        type: 'post',
        url: 'sotk/delLevel1',
        data: {
          '_token': $('input[name=_token]').val(),
          'id_sotk_es2': $('#id_sotk_es2_hapus').val(),
        },
        success: function(data) {
            level1_tbl.ajax.reload(null,false);
            if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
            }
        }
      });
});