

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

$('.number').number(true,0,',', '.');

$('.display').DataTable({
      dom : 'BfRtip',
      autoWidth : false,
      bDestroy: true
  });

var indikator_tbl=$('#tblIndikator').DataTable({
                  processing: true,
                  serverSide: true,
                  // dom : 'BfRtip',                  
                  autoWidth : false,
                  "ajax": {"url": "./indikator/getListIndikator"},
                  "language": {
                      "decimal": ",",
                      "thousands": "."},
                  "columns": [
                        { data: 'no_urut','searchable': false, 'orderable':false, sClass: "dt-center", width :"5%"},
                        { data: 'nm_indikator', sClass: "dt-left"},
                        { data: 'kualitas_display', sClass: "dt-center", width :"10%"},
                        { data: 'type_display', sClass: "dt-center", width :"10%"},
                        { data: 'sifat_display', sClass: "dt-center", width :"10%"},
                        { data: 'teknik_display', sClass: "dt-center", width :"10%"},
                        { data: 'action', 'searchable': false, width :"10%", 'orderable':false, sClass: "dt-center" }
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        });

$.ajax({
          type: "GET",
          url: '../parameter/getRefSatuan',
          dataType: "json",
          success: function(data) {

          var j = data.length;
          var post, i;

          $('select[name="id_satuan_output"]').empty();
          $('select[name="id_satuan_output"]').append('<option value="">--Pilih Satuan Indikator--</option>');
          for (i = 0; i < j; i++) {
              post = data[i];
              $('select[name="id_satuan_output"]').append('<option value="'+ post.id_satuan +'">'+ post.uraian_satuan +'</option>');
            }
              
          }
});

$.ajax({
          type: "GET",
          url: '../parameter/getBidang2',
          dataType: "json",
          success: function(data) {

          var j = data.length;
          var post, i;

          $('select[name="id_bidang"]').empty();
          $('select[name="id_bidang"]').append('<option value="0">--Pilih Bidang Pembangunan--</option>');
          for (i = 0; i < j; i++) {
              post = data[i];
              $('select[name="id_bidang"]').append('<option value="'+ post.id_bidang +'">'+ post.uraian_bidang +'</option>');
            }
              
          }
});

$.ajax({
          type: "GET",
          url: '../parameter/getAspek',
          dataType: "json",
          success: function(data) {

          var j = data.length;
          var post, i;

          $('select[name="id_aspek"]').empty();
          $('select[name="id_aspek"]').append('<option value="0">--Pilih Aspek Pembangunan--</option>');
          for (i = 0; i < j; i++) {
              post = data[i];
              $('select[name="id_aspek"]').append('<option value="'+ post.id_aspek +'">'+ post.uraian_aspek_pembangunan +'</option>');
            }
              
          }
});

function getflag_iku(){

    var xCheck = document.querySelectorAll('input[name="jns_indikator"]:checked');
    var xyz = [];
    for(var x = 0, l = xCheck.length; x < l;  x++)
      { xyz.push(xCheck[x].value); }
    var xvalues = xyz.join('');
    return xvalues;
  }

function getjenis_indikator(){

    var xCheck = document.querySelectorAll('input[name="jenis_indikator"]:checked');
    var xyz = [];
    for(var x = 0, l = xCheck.length; x < l;  x++)
      { xyz.push(xCheck[x].value); }
    var xvalues = xyz.join('');
    return xvalues;
  }

function getsifat_indikator(){

    var xCheck = document.querySelectorAll('input[name="sifat_indikator"]:checked');
    var xyz = [];
    for(var x = 0, l = xCheck.length; x < l;  x++)
      { xyz.push(xCheck[x].value); }
    var xvalues = xyz.join('');
    return xvalues;
  }

function gettipe_indikator(){

    var xCheck = document.querySelectorAll('input[name="tipe_indikator"]:checked');
    var xyz = [];
    for(var x = 0, l = xCheck.length; x < l;  x++)
      { xyz.push(xCheck[x].value); }
    var xvalues = xyz.join('');
    return xvalues;
  }

$(document).on('click', '.add-indikator', function() {
  $('.btnIndikator').removeClass('edit');
  $('.btnIndikator').addClass('add');
  $('.modal-title').text('Tambah Referensi Indikator');
  $('.form-horizontal').show();
  $('#id_indikator').val(null);
  $('#nm_indikator').val(null);
  $('#sumber_data').val(null);
  $('#id_satuan_output').val(null);
  $('#id_bidang').val(0);
  $('#id_aspek').val(0);
  document.frmModalIndikator.jns_indikator[0].checked=true;
  document.frmModalIndikator.tipe_indikator[0].checked=true;
  document.frmModalIndikator.jenis_indikator[1].checked=true;
  document.frmModalIndikator.sifat_indikator[1].checked=true;
  $('#ModalIndikator').modal('show');
});

$('.modal-footer').on('click', '.add', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './indikator/addIndikator',
        data: {
            '_token': $('input[name=_token]').val(),
            'jenis_indikator' : getjenis_indikator(),
            'sifat_indikator' : getsifat_indikator(),
            'type_indikator' : gettipe_indikator(),
            'nm_indikator' : $('#nm_indikator').val(),
            'kualitas_indikator' : getflag_iku(),
            'sumber_data_indikator' : $('#sumber_data').val(),
            'id_satuan_output' : $('#id_satuan_output').val(),
            'id_bidang' : $('#id_bidang').val(),
            'id_aspek' : $('#id_aspek').val(),
        },
        success: function(data) {
              $('#tblIndikator').DataTable().ajax.reload(null,false);
              $('#tblIndikator').DataTable().page('last').draw('page');
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
        },
  });
});

$('#tblIndikator tbody').on( 'dblclick', 'tr', function () {

  var data = indikator_tbl.row(this).data();

  $('.btnIndikator').removeClass('add');
  $('.btnIndikator').addClass('edit');
  $('.modal-title').text('Edit Referensi Indikator');
  $('.form-horizontal').show();
  $('#id_indikator').val(data.id_indikator);
  $('#nm_indikator').val(data.nm_indikator);
  $('#sumber_data').val(data.sumber_data_indikator);  
  $('#id_satuan_output').val(data.id_satuan_output);
  $('#id_bidang').val(data.id_bidang);
  $('#id_aspek').val(data.id_aspek);
  document.frmModalIndikator.jns_indikator[data.kualitas_indikator].checked=true;
  document.frmModalIndikator.jenis_indikator[data.jenis_indikator].checked=true;
  document.frmModalIndikator.sifat_indikator[data.sifat_indikator].checked=true;
  document.frmModalIndikator.tipe_indikator[data.type_indikator].checked=true;

  $('#ModalIndikator').modal('show');  

  } );

//edit function
$(document).on('click', '#btnEditIndikator', function() {

var data = indikator_tbl.row( $(this).parents('tr') ).data();

  $('.btnIndikator').removeClass('add');
  $('.btnIndikator').addClass('edit');
  $('.modal-title').text('Edit Referensi Indikator');
  $('.form-horizontal').show();
  $('#id_indikator').val(data.id_indikator);
  $('#nm_indikator').val(data.nm_indikator);
  $('#sumber_data').val(data.sumber_data_indikator);  
  $('#id_satuan_output').val(data.id_satuan_output);
  $('#id_bidang').val(data.id_bidang);
  $('#id_aspek').val(data.id_aspek);
  document.frmModalIndikator.jns_indikator[data.kualitas_indikator].checked=true;
  document.frmModalIndikator.jenis_indikator[data.jenis_indikator].checked=true;
  document.frmModalIndikator.sifat_indikator[data.sifat_indikator].checked=true;
  document.frmModalIndikator.tipe_indikator[data.type_indikator].checked=true;
  $('#ModalIndikator').modal('show');

});


$('.modal-footer').on('click', '.edit', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './indikator/editIndikator',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_indikator' : $('#id_indikator').val(),
            'jenis_indikator' : getjenis_indikator(),
            'sifat_indikator' : getsifat_indikator(),
            'type_indikator' : gettipe_indikator(),
            'nm_indikator' : $('#nm_indikator').val(),
            'kualitas_indikator' : getflag_iku(),
            'sumber_data_indikator' : $('#sumber_data').val(),
            'id_satuan_output' : $('#id_satuan_output').val(),
            'id_bidang' : $('#id_bidang').val(),
            'id_aspek' : $('#id_aspek').val(),            
            // 'metode_hitung' : {{metode_hitung}},
        },
        success: function(data) {
            $('#tblIndikator').DataTable().ajax.reload(null,false);
            if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
        }
    });
});

//delete function
$(document).on('click', '#btnHapusIndikator', function() {

var data = indikator_tbl.row( $(this).parents('tr') ).data();

if(data.asal_indikator!=9){
  createPesan("Maaf Indikator Hasil Impor dari Aplikasi 5 Tahunan tidak dapat dihapus","danger"); 
} else {
  $('.actionBtn').addClass('delete');
  $('.modal-title').text('Hapus Referensi Indikator');
  $('.form-horizontal').hide();
  $('#id_indikator_hapus').val(data.id_indikator);
  $('#nm_indikator_hapus').html(data.nm_indikator);
  $('#HapusModal').modal('show');
}
  
});



$('.modal-footer').on('click', '.delete', function() {
  $.ajaxSetup({
     headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });

  $.ajax({
    type: 'post',
    url: './indikator/hapusIndikator',
    data: {
      '_token': $('input[name=_token]').val(),
      'id_indikator': $('#id_indikator_hapus').val(),
    },
    success: function(data) {
      $('.item' + $('.id_indikator_hapus').text()).remove();
      $('#tblIndikator').DataTable().ajax.reload(null,false);
      createPesan(data.pesan,"success");
    }
  });
});

});