$(document).ready(function() {

  $('[data-toggle="popover"]').popover();
  
  function createPesan(message, type) {
    var html = '<div id="pesanx" class="alert alert-' + type + ' alert-dismissable flyover flyover-bottom in">';    
    html += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';   
    html += '<p><strong>'+message+'</strong></p>';
    html += '</div>';    
    $(html).hide().prependTo('#pesan').slideDown();

    setTimeout(function() {
        $('#pesanx').removeClass('in');
         }, 3500);
  };


  $('.page-alert .close').click(function(e) {
        e.preventDefault();
        $(this).closest('.page-alert').slideUp();
    });

var id_unit_temp, level1_temp, level2_temp, level3_temp;
var unit_tbl, level1_tbl, level2_tbl, level3_tbl;

unit_tbl = $('#tblUnitSotk').DataTable({
                  processing: true,
                  serverSide: true,
                  dom : 'bfrtIp',
                  "pageLength": 50,
                  "autoWidth": false,
                  "ajax": {"url": "sotk/getUnitSotk"},
                  "columns": [                        
                        { data: 'urut', sClass: "dt-center",width:"5%"},
                        { data: 'kd_unit_display', sClass: "dt-center",width:"10%"},
                        { data: 'nm_unit'},
                        { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
    });
  
  $('#tblUnitSotk tbody').on( 'dblclick', 'tr', function () {
    var data = unit_tbl.row(this).data();
    id_unit_temp =  data.id_unit;

    $('.nav-tabs a[href="#tabLevel1"]').tab('show');
    $('#ur_unit_level_1').text(data.nm_unit+ '  (' + data.kd_unit_display + ')');
    LoadLevel1(id_unit_temp);
    // alert(id_unit_temp);
  });

  function LoadLevel1(id_unit){
  level1_tbl=$('#tblLevel1').DataTable({
                    processing: true,
                    serverSide: true,
                    dom : 'BfRtip',                  
                    autoWidth : false,
                    "ajax": {"url": "sotk/getSotkLevel1/"+id_unit},
                    "language": {
                        "decimal": ",",
                        "thousands": "."},
                    "columns": [
                          { data: 'urut','searchable': false, 'orderable':false, sClass: "dt-center", width :"5%"},
                          { data: 'eselon_display','searchable': false, sClass: "dt-center", width :"10%"},
                          { data: 'nama_eselon'},
                          { data: 'action', 'searchable': false, width :"10%", 'orderable':false, sClass: "dt-center" }
                        ],
                    "order": [[0, 'asc']],
                    "bDestroy": true
          });
  }

  function LoadLevel2(id_unit){
  level2_tbl=$('#tblLevel2').DataTable({
                    processing: true,
                    serverSide: true,
                    dom : 'BfRtip',                  
                    autoWidth : false,
                    "ajax": {"url": "sotk/getSotkLevel2/"+id_unit},
                    "language": {
                        "decimal": ",",
                        "thousands": "."},
                    "columns": [
                          { data: 'urut','searchable': false, 'orderable':false, sClass: "dt-center", width :"5%"},
                          { data: 'eselon_display','searchable': false, sClass: "dt-center", width :"10%"},
                          { data: 'nama_eselon3'},
                          { data: 'action', 'searchable': false, width :"10%", 'orderable':false, sClass: "dt-center" }
                        ],
                    "order": [[0, 'asc']],
                    "bDestroy": true
          });
  }

  function LoadLevel3(id_unit){
  level3_tbl=$('#tblLevel3').DataTable({
                    processing: true,
                    serverSide: true,
                    dom : 'BfRtip',                  
                    autoWidth : false,
                    "ajax": {"url": "sotk/getSotkLevel3/"+id_unit},
                    "language": {
                        "decimal": ",",
                        "thousands": "."},
                    "columns": [
                          { data: 'urut','searchable': false, 'orderable':false, sClass: "dt-center", width :"5%"},
                          { data: 'eselon_display','searchable': false, sClass: "dt-center", width :"10%"},
                          { data: 'nama_eselon4'},
                          { data: 'action', 'searchable': false, width :"10%", 'orderable':false, sClass: "dt-center" }
                        ],
                    "order": [[0, 'asc']],
                    "bDestroy": true
          });
  };

  $('#tblLevel1 tbody').on( 'dblclick', 'tr', function () {
    var data = level1_tbl.row(this).data();
    level1_temp =  data.id_sotk_es2;

    $('.nav-tabs a[href="#tabLevel2"]').tab('show');
    $('#ur_unit_level_2').text($('#ur_unit_level_1').text());
    $('#ur_eselon_level1_2').text(data.nama_eselon);
    LoadLevel2(level1_temp);
  });

  $('#tblLevel2 tbody').on( 'dblclick', 'tr', function () {
    var data = level2_tbl.row(this).data();
    level2_temp =  data.id_sotk_es3;

    $('.nav-tabs a[href="#tabLevel3"]').tab('show');
    $('#ur_unit_level_3').text($('#ur_unit_level_2').text());
    $('#ur_eselon_level1_3').text($('#ur_eselon_level1_2').text());
    $('#ur_eselon_level2_3').text(data.nama_eselon3);  
    LoadLevel3(level2_temp);
  });

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
  

});