$(document).ready(function() {  
  
  var detInPangkat = Handlebars.compile($("#details-inPangkat").html());

  var id_pegawai_temp;
  
  function formatTgl(val_tanggal){
      var formattedDate = new Date(val_tanggal);
      var d = formattedDate.getDate();
      var m = formattedDate.getMonth();
      var y = formattedDate.getFullYear();
      var m_names = new Array("Januari", "Februari", "Maret", 
        "April", "Mei", "Juni", "Juli", "Agustus", "September", 
        "Oktober", "November", "Desember")

      var tgl= d + " " + m_names[m] + " " + y;
      return tgl;
  }

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

  $('[data-toggle="popover"]').popover();
  $('.number').number(true,0,',', '.');


  $('.page-alert .close').click(function(e) {
          e.preventDefault();
          $(this).closest('.page-alert').slideUp();
      });

  
function buatNip(string){
  return string.replace(/(\d{8})(\d{6})(\d{1})(\d{3})/,"$1 $2 $3 $4");
}

function nilaiNip(string){
  return string.replace(/\D/g,'').substring(0, 20);
}

var angkaNip = document.getElementsByClassName('nip');
angkaNip.onkeydown = function(e) {
      if(!((e.keyCode > 95 && e.keyCode < 106)
        || (e.keyCode > 47 && e.keyCode < 58) 
        )) {
          return false;
      }
  }

$("input[name='nip_pegawai_display']").on("keyup", function(){
    $("input[name='nip_pegawai']").val(nilaiNip(this.value));
    this.value = buatNip($("input[name='nip_pegawai']").val());
})
      

var tblPegawai
tblPegawai = $('#tblPegawai').DataTable( {
          processing: true,
          serverSide: true,
          dom: 'Bfrtip',
          responsive: true,                
          autoWidth : false,
          order: [[0, 'asc']],
          bDestroy: true,
          language: {
                "decimal": ",",
                "thousands": "."},
          "ajax": {"url": "./pegawai/getPegawai"},
          "columns": [
                { data: 'urut', sClass: "dt-center"},
                { data: 'nip_pegawai', sClass: "dt-center",render: function ( toFormat ) {
                  var NIP;
                  NIP=toFormat.toString();            
                  NIP= NIP.substring(0,8) + ' ' + NIP.substring(8,14) + ' ' + NIP.substring(14,15) + ' ' + NIP.substring(15,18);   
                  return NIP}},
                { data: 'nama_pegawai'},
                { data: 'action', 'searchable': false, 'orderable':false }
              ]
        });

  var tblInPangkat;
    function initInPangkat(tableId, data) {
        tblInPangkat=$('#' + tableId).DataTable({
                processing: true,
                serverSide: true,
                ajax: data.details_url,
                dom : 'BfRtIP',
                autoWidth: false,
                "language": {
                          "decimal": ",",
                          "thousands": "."},
                "columns": [
                            { data: 'urut', sClass: "dt-center"},
                            { data: 'tmt_pangkat', sClass: "dt-center"},
                            { data: 'pangkat_display'},
                            { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
                          ],
                "order": [[0, 'asc']],
                "bDestroy": true
            })
    };
  
    var tblPangkat;
    function LoadPangkat(id_pegawai) {
        tblPangkat=$('#tblRiwayatPangkat').DataTable({
                processing: true,
                serverSide: true,
                ajax: {"url": "./pegawai/getPegawaiPangkat/"+id_pegawai},
                dom : 'BfRtIP',
                autoWidth: false,
                "language": {
                          "decimal": ",",
                          "thousands": "."},
                "columns": [
                            { data: 'urut', sClass: "dt-center"},
                            { data: 'tmt_pangkat', sClass: "dt-center"},
                            { data: 'pangkat_display'},
                            { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
                          ],
                "order": [[0, 'asc']],
                "bDestroy": true
            })
    };

    var tblUnit;
    function LoadUnit(id_pegawai) {
        tblUnit=$('#tblRiwayatUnit').DataTable({
                processing: true,
                serverSide: true,
                ajax: {"url": "./pegawai/getPegawaiUnit/"+id_pegawai},
                dom : 'BfRtIP',
                autoWidth: false,
                "language": {
                          "decimal": ",",
                          "thousands": "."},
                "columns": [
                            // { data: 'urut', sClass: "dt-center"},
                            {
                              'defaultContent' : '',
                              'data'           : 'DT_Row_Index',
                              'name'           : 'DT_Row_Index',
                              'title'          : 'No Urut',
                              'render'         : null,
                              'orderable'      : false,
                              'searchable'     : false,
                              'exportable'     : false,
                              'printable'      : true,
                              'footer'         : '',
                              'sClass'         : 'dt-center',
                            },
                            { data: 'tmt_unit', sClass: "dt-center"},
                            { data: 'nm_unit'},
                            { data: 'nama_jabatan'},
                            { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
                          ],
                "order": [[0, 'asc']],
                "bDestroy": true
            })
    };

  $('#tblPegawai tbody').on('click', 'td.details-control', function () {
      var tr = $(this).closest('tr');
      var row = tblPegawai.row( tr );
      var tableId = 'inPangkat-' + row.data().id_pegawai;

      if (row.child.isShown()) {
          row.child.hide();
          tr.removeClass('shown');
      } else {
          row.child(detInPangkat(row.data())).show();
          initInPangkat(tableId, row.data());
          tr.addClass('shown');
          tr.next().find('td').addClass('no-padding bg-gray');
      }    
  });

  $.ajax({
      type: "GET",
      url: 'pegawai/jenis_pangkat',
      dataType: "json",
      success: function(data) {
          var j = data.length;
          var post, i;

          for (i = 0; i < j; i++) {
              post = data[i];
              $('select[name="cb_golongan"]').append('<option value="'+ post.id +'">'+ post.uraian_pangkat + " ("+ post.uraian_golongan+')</option>');
          }
      }
  });

  $.ajax({
      type: "GET",
      url: 'pegawai/getSotkLevel/1/0',
      dataType: "json",
      success: function(data) {
          var j = data.length;
          var post, i;

          $('select[name="cb_jabatan_riwayat_unit"]').empty();
          for (i = 0; i < j; i++) {
              post = data[i];
              $('select[name="cb_jabatan_riwayat_unit"]').append('<option value="'+ post.id_sotk +'">'+ post.nama_eselon +'</option>');
          }
      }
  });

  $( ".checkLevelJabatan" ).change(function() {  
    $.ajax({
      type: "GET",
      url: 'pegawai/getSotkLevel/'+$('#cb_unit_riwayat').val()+'/'+document.frmModalRiwayatUnit.checkLevelJabatan.value,
      dataType: "json",
      success: function(data) {
          var j = data.length;
          var post, i;

          $('select[name="cb_jabatan_riwayat_unit"]').empty();
          for (i = 0; i < j; i++) {
              post = data[i];
              $('select[name="cb_jabatan_riwayat_unit"]').append('<option value="'+ post.id_sotk +'">'+ post.nama_eselon +'</option>');
          }
      }
    });
  });

  $( ".cb_unit_riwayat" ).change(function() {  
    $.ajax({
      type: "GET",
      url: 'pegawai/getSotkLevel/'+$('#cb_unit_riwayat').val()+'/'+document.frmModalRiwayatUnit.checkLevelJabatan.value,
      dataType: "json",
      success: function(data) {
          var j = data.length;
          var post, i;

          $('select[name="cb_jabatan_riwayat_unit"]').empty();
          for (i = 0; i < j; i++) {
              post = data[i];
              $('select[name="cb_jabatan_riwayat_unit"]').append('<option value="'+ post.id_sotk +'">'+ post.nama_eselon +'</option>');
          }
      }
    });
  });

  // $( ".cb_jabatan_riwayat_unit" ).change(function() {  
  //   alert($('#cb_jabatan_riwayat_unit').val());
  // });

  $.ajax({
        type: "GET",
        url: '../perkin/getUnit',
        dataType: "json",
        success: function(data) {
          var j = data.length;
          var post, i;

          $('select[name="cb_unit_riwayat"]').empty();
          $('select[name="cb_unit_riwayat"]').append('<option value="-1">---Pilih Unit---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="cb_unit_riwayat"]').append('<option value="'+ post.id_unit +'">'+ post.nm_unit +'</option>');
          }
        }
    });

  $('#tmt_pangkat_x').datepicker({
    altField: "#tmt_pangkat",
    altFormat: "yy-mm-dd", 
    dateFormat: "dd MM yy",
  });

  $('#tmt_unit_x').datepicker({
    altField: "#tmt_unit",
    altFormat: "yy-mm-dd", 
    dateFormat: "dd MM yy",
  });

  function getStatus(){
    var xCheck = document.querySelectorAll('input[name="checkStatus"]:checked');
    var xyz = [];
    for(var x = 0, l = xCheck.length; x < l;  x++)
      { xyz.push(xCheck[x].value); }
    var xvalues = xyz.join('');
    return xvalues;
  }

$(document).on('click', '.btnAddPegawai', function() { 
        $('#divRiwayat').hide();   
        $('.btnSimpanPegawai').removeClass('editPegawai');
        $('.btnSimpanPegawai').addClass('addPegawai');
        $('.modal-title').text('Data Pegawai Pejabat Eselon');
        $('#id_pegawai').val(null);
        $('#nip_pegawai_display').val(null);
        document.getElementById("nip_pegawai_display").removeAttribute("disabled");
        $('#nip_pegawai').val(null);
        $('#nama_pegawai').val(null);
        document.frmModalPegawai.checkStatus[0].checked=true;    
        $('.form-horizontal').show();
        $('#ModalPegawai').modal('show');
});

$('.modal-footer').on('click', '.addPegawai', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: 'pegawai/addPegawai',
        data: {
            '_token': $('input[name=_token]').val(),
            'nama_pegawai': $('#nama_pegawai').val(),
            'nip_pegawai': $('#nip_pegawai').val(),
            'status_pegawai': getStatus(),   
        },
        success: function(data) {
            tblPegawai.ajax.reload(null,false);
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }
        }
    });
});

$(document).on('click', '.btnDetailPegawai', function() {    
    $('#divRiwayat').show();   
var data = tblPegawai.row( $(this).parents('tr') ).data();
    $('.btnSimpanPegawai').addClass('editPegawai');
    $('.btnSimpanPegawai').removeClass('addPegawai');
    $('.modal-title').text('Data Pegawai Pejabat Eselon');
    id_pegawai_temp=data.id_pegawai;
    $('#id_pegawai').val(data.id_pegawai);
    $('#nip_pegawai_display').val(buatNip(data.nip_pegawai));
    document.getElementById("nip_pegawai_display").setAttribute("disabled","disabled")
    $('#nip_pegawai').val(data.nip_pegawai);
    $('#nama_pegawai').val(data.nama_pegawai);
    document.frmModalPegawai.checkStatus[data.status_pegawai].checked=true;  
    LoadPangkat(id_pegawai_temp);  
    LoadUnit(id_pegawai_temp);  
    $('.form-horizontal').show();
    $('#ModalPegawai').modal('show');
});

$('.modal-footer').on('click', '.editPegawai', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: 'pegawai/editPegawai',
        data: {
            '_token': $('input[name=_token]').val(),                        
            'id_pegawai': $('#id_pegawai').val(), 
            'nama_pegawai': $('#nama_pegawai').val(),
            'nip_pegawai': $('#nip_pegawai').val(),
            'status_pegawai': getStatus(),    
        },
        success: function(data) {
            tblPegawai.ajax.reload(null,false);
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }
        }
    });
});

$(document).on('click', '.btnDelPegawai', function() {
    var data = tblPegawai.row( $(this).parents('tr') ).data();
      $('.btnAksiDelPegawai').addClass('delPegawai');
      $('.modal-title').text('Hapus Data Pegawai Pejabat Eselon');
      $('.form-horizontal').hide();
      $('#id_pegawai_hapus').val(data.id_pegawai);
      $('.nama_pegawai_hapus').html(data.nama_pegawai);
      $('#HapusPegawai').modal('show');

}); 
    
$('.modal-footer').on('click', '.delPegawai', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });
    
      $.ajax({
        type: 'post',
        url: 'pegawai/delPegawai',
        data: {
          '_token': $('input[name=_token]').val(),
          'id_pegawai': $('#id_pegawai_hapus').val(),
        },
        success: function(data) {
            tblPegawai.ajax.reload(null,false);
            if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
            }
        }
      });
});

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
    $('#tmt_pangkat_x').val(formatTgl(data.tmt_pangkat));
    $('#tmt_pangkat').val(data.tmt_pangkat);   
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
    $.ajax({
        type: "GET",
        url: 'pegawai/getSotkLevel/'+data.id_unit+'/'+data.tingkat_eselon,
        dataType: "json",
        success: function(data) {
            var j = data.length;
            var post, i;

            $('select[name="cb_jabatan_riwayat_unit"]').empty();
            for (i = 0; i < j; i++) {
                post = data[i];
                $('select[name="cb_jabatan_riwayat_unit"]').append('<option value="'+ post.id_sotk +'">'+ post.nama_eselon +'</option>');
            }
        }
    });

    $('.btnSimpanRiwayatUnit').addClass('editRiwayatUnit');
    $('.btnSimpanRiwayatUnit').removeClass('addRiwayat');
    $('.modal-title').text('Data Riwayat Unit dan Jabatan Pegawai');
    $('#id_unit_pegawai').val(data.id_unit_pegawai);
    $('#id_pegawai_riwayat_unit').val(data.id_pegawai);
    $('#nama_pegawai_riwayat_unit').val(data.nama_pegawai);
    $('#cb_unit_riwayat').val(data.id_unit);
    document.frmModalRiwayatUnit.checkLevelJabatan[data.tingkat_eselon].checked=true;    
    document.getElementById('cb_jabatan_riwayat_unit').value=data.id_sotk;
    // $('#cb_jabatan_riwayat_unit').val(data.id_sotk);
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



});