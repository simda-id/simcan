function getEselon3(){
    var xCheck = document.querySelectorAll('input[name="checkEselon3"]:checked');
    var xyz = [];
    for(var x = 0, l = xCheck.length; x < l;  x++)
      { xyz.push(xCheck[x].value); }
    var xvalues = xyz.join('');
    return xvalues;
  }

$(document).on('click', '.btnAddLevel3', function() {
    if(id_unit_temp == null || level1_temp == null || level2_temp == null){
        createPesan("Maaf Unit/Atasan Langsung belum dipilih...!","danger"); 
    } else {
        $('.btnSimpanLevel3').removeClass('editLevel3');
        $('.btnSimpanLevel3').addClass('addLevel3');
        $('.modal-title').text('Data Eselon Level 3');
        $('#id_sotk_es4_text').val(null);
        $('#id_sotk_es3_text').val(level2_temp);
        $('#ur_atlas_level_3').val($('#ur_eselon_level2_3').text());
        $('#ur_at_atlas_level_3').val($('#ur_eselon_level1_3').text());
        $('#nama_eselon4_text').val(null);
        document.frmModalLevel3.checkEselon3[3].checked=true;    
        $('.form-horizontal').show();
        $('#ModalSotkLevel3').modal('show');
    };
});

$('.modal-footer').on('click', '.addLevel3', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: 'sotk/addLevel3',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_sotk_es3': $('#id_sotk_es3_text').val(),
            'nama_eselon': $('#nama_eselon4_text').val(),
            'tingkat_eselon': getEselon3(),   
        },
        success: function(data) {
            level3_tbl.ajax.reload(null,false);
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }
        }
    });
});

$(document).on('click', '.btnEditLevel3', function() {
var data = level3_tbl.row( $(this).parents('tr') ).data();
    $('.btnSimpanLevel3').addClass('editLevel3');
    $('.btnSimpanLevel3').removeClass('addLevel3');
    $('.modal-title').text('Data Eselon Level 3');
    $('#id_sotk_es4_text').val(data.id_sotk_es4);
    $('#id_sotk_es3_text').val(data.id_sotk_es3);
    $('#ur_atlas_level_3').val(data.nama_eselon3);
    $('#ur_at_atlas_level_3').val(data.nama_eselon2);
    $('#nama_eselon4_text').val(data.nama_eselon4);
    document.frmModalLevel3.checkEselon3[data.tingkat_eselon].checked=true;    
    $('.form-horizontal').show();
    $('#ModalSotkLevel3').modal('show');
});

$('.modal-footer').on('click', '.editLevel3', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: 'sotk/editLevel3',
        data: {
            '_token': $('input[name=_token]').val(),                        
            'id_sotk_es3': $('#id_sotk_es3_text').val(), 
            'id_sotk_es4': $('#id_sotk_es4_text').val(),
            'nama_eselon': $('#nama_eselon4_text').val(),
            'tingkat_eselon': getEselon3(),      
        },
        success: function(data) {
            level3_tbl.ajax.reload(null,false);
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }
        }
    });
});

$(document).on('click', '.btnHapusLevel3', function() {
    var data = level3_tbl.row( $(this).parents('tr') ).data();
      $('.btnDelLevel3').addClass('delLevel3');
      $('.modal-title').text('Hapus Data Level 2');
      $('.form-horizontal').hide();
      $('#id_sotk_es4_hapus').val(data.id_sotk_es4);
      $('#nama_eselon4_hapus').html(data.nama_eselon4);
      $('#HapusLevel3Modal').modal('show');

}); 
    
$('.modal-footer').on('click', '.delLevel3', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });
    
      $.ajax({
        type: 'post',
        url: 'sotk/delLevel3',
        data: {
          '_token': $('input[name=_token]').val(),
          'id_sotk_es4': $('#id_sotk_es4_hapus').val(),
        },
        success: function(data) {
            level3_tbl.ajax.reload(null,false);
            if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
            }
        }
      });
});