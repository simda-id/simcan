$(document).ready(function() {
  
  
  var detInSasaran = Handlebars.compile($("#details-inSasaran").html());
  var detInProgram = Handlebars.compile($("#details-inProgram").html());

  var id_unit_temp;
  var id_tahun_temp;
  var id_eselon2_temp;
  var id_perkin_sasaran_temp;
  
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

  function hariIni(){
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();

    var hariIni = yyyy + '-' + mm + '-' + dd;
    return hariIni;
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

  $('#prosesbar').hide();
  $('[data-toggle="popover"]').popover();
  $('.number').number(true,0,',', '.');
  $('#tahun_dok').number(true,0,',', '');

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

$.ajax({
        type: "GET",
        url: 'perkin/getUnit',
        dataType: "json",
        success: function(data) {
          var j = data.length;
          var post, i;

          $('select[name="cb_unit_renstra"]').empty();
          $('select[name="cb_unit_renstra"]').append('<option value="-1">---Pilih Unit---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="cb_unit_renstra"]').append('<option value="'+ post.id_unit +'">'+ post.nm_unit +'</option>');
          }
        }
    });

    $.ajax({
        type: "GET",
        url: 'perkin/getPegawai/0',
        dataType: "json",
        success: function(data) {
          var j = data.length;
          var post, i;

          $('select[name="cb_pegawai"]').empty();
          $('select[name="cb_pegawai"]').append('<option value="-1">---Pilih Nama Pegawai---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="cb_pegawai"]').append('<option value="'+ post.id_pegawai +'">'+ post.nama_pegawai +'</option>');
          }
        }
    });

var tblDokPerkin
function loadDokumen($id_unit) {
tblDokPerkin = $('#tblDokPerkin').DataTable( {
          processing: true,
          serverSide: true,
          dom: 'BFrtip',
          responsive: true,                
          autoWidth : false,
          order: [[0, 'asc']],
          bDestroy: true,
          language: {
                "decimal": ",",
                "thousands": "."},
          "ajax": {"url": "./perkin/getDokumen/"+$id_unit},
          "columns": [
                { data: 'no_urut', sClass: "dt-center"},
                { data: 'tahun', sClass: "dt-center"},
                { data: 'no_dokumen', sClass: "dt-center"},
                { data: 'jabatan_penandatangan'},
                { data: 'action', 'searchable': false, 'orderable':false }
              ]
        });

      }

$('#tblDokPerkin tbody').on( 'dblclick', 'tr', function () {
  var data = tblDokPerkin.row(this).data();
    id_tahun_temp =  data.tahun;
    id_eselon2_temp = data.id_sotk_es2;

    $('.nav-tabs a[href="#sasaran"]').tab('show');
    loadSasaran(data.id_dokumen_perkin);  

    $.ajax({
    type: "GET",
    url: './cetak/getDokumenRenstra/'+id_unit_temp,
    dataType: "json",
    success: function(data) {
        var j = data.length;
        var post, i;

        $('select[name="cb_dok_renstra"]').empty();
        $('select[name="cb_dok_renstra"]').append('<option value="-1">Pilih Nomor Dokumen Renstra</option>');

        for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="cb_dok_renstra"]').append('<option value="'+ post.id_renstra +'">'+ post.nomor_renstra +'</option>');

        }
    }
    }); 
});

var tblSasaran
function loadSasaran($id_dokumen) {
  tblSasaran = $('#tblSasaran').DataTable( {
          processing: true,
          serverSide: true,
          dom: 'BFrtip',
          responsive: true,                
          autoWidth : false,
          order: [[0, 'asc']],
          bDestroy: true,
          language: {
                "decimal": ",",
                "thousands": "."},
          "ajax": {"url": "./perkin/getSasaran/"+$id_dokumen},
          "columns": [
                {
                  "className":      'details-control',
                  "orderable":      false,
                  "searchable":      false,
                  "data":           null,
                  "defaultContent": '',
                  "width" : "5px"
                },
                { data: 'urut', sClass: "dt-center"},
                { data: 'kd_sasaran_renstra', sClass: "dt-center"},
                { data: 'uraian_sasaran_renstra'},
                { data: 'jml_indikator', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
              ],            
          "order": [[1, 'ASC']],
          "bDestroy": true
    });
  }

  var tblInSasaran;
    function initInSasaran(tableId, data) {
        tblInSasaran=$('#' + tableId).DataTable({
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
                            { data: 'nm_indikator'},
                            { data: 'target_t1', 
                                  render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
                            { data: 'target_t2', 
                                  render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
                            { data: 'target_t3', 
                                  render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
                            { data: 'target_t4', 
                                  render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
                            { data: 'target_tahun', 
                                  render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
                            { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
                          ],
                "order": [[0, 'asc']],
                "bDestroy": true
            })
    }

  $('#tblSasaran tbody').on('click', 'td.details-control', function () {
      var tr = $(this).closest('tr');
      var row = tblSasaran.row( tr );
      var tableId = 'inSasaran-' + row.data().id_perkin_sasaran;

      if (row.child.isShown()) {
          row.child.hide();
          tr.removeClass('shown');
      } else {
          row.child(detInSasaran(row.data())).show();
          initInSasaran(tableId, row.data());
          tr.addClass('shown');
          tr.next().find('td').addClass('no-padding bg-gray');
      }    
  });

$('#tblSasaran tbody').on( 'dblclick', 'tr', function () {

    var data = tblSasaran.row(this).data();
    id_perkin_sasaran_temp =  data.id_perkin_sasaran;   
    
    $('.nav-tabs a[href="#program"]').tab('show');
    loadProgram(id_perkin_sasaran_temp);
    $.ajax({
        type: "GET",
        url: 'perkin/getEselon3/'+id_eselon2_temp,
        dataType: "json",
        success: function(data) {
          var j = data.length;
          var post, i;

          $('select[name="cb_eselon_3"]').empty();
          $('select[name="cb_eselon_3"]').append('<option value="-1">---Pilih Jabatan Eselon---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="cb_eselon_3"]').append('<option value="'+ post.id_sotk_es3 +'">'+ post.nama_eselon +'</option>');
          }
        }
    });
    
  });

  var tblProgram;
  function loadProgram($id_perkin_sasaran) {
  tblProgram = $('#tblProgram').DataTable( {
          processing: true,
          serverSide: true,
          dom: 'BFrtip',
          responsive: true,                
          autoWidth : false,
          order: [[0, 'asc']],
          bDestroy: true,
          language: {
                "decimal": ",",
                "thousands": "."},
          "ajax": {"url": "./perkin/getProgram/"+$id_perkin_sasaran},
          "language": {
                "decimal": ",",
                "thousands": "."},
          "columns": [
                { data: 'kd_program', sClass: "dt-center"},
                { data: 'uraian_program'},
                { data: 'pagu_tahun',
                  render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
                { data: 'nama_eselon'},
                { data: 'action', 'searchable': false, 'orderable':false }
            ],
            "columnDefs": [ {
                  "visible": false
              } ]
          });
  }
  $.datepicker.setDefaults( $.datepicker.regional[ "id" ] );
  
  $('#tgl_perkin_dok_x').datepicker({
    altField: "#tgl_perkin_dok",
    altFormat: "yy-mm-dd", 
    dateFormat: "dd MM yy",
  });

  $('#btn').click(function() {
    $("#tgl_perkin_dok_x").focus();
  });

  $('#tgl_perkin_tmt_x').datepicker({
    altField: "#tgl_perkin_tmt",
    altFormat: "yy-mm-dd", 
    dateFormat: "dd MM yy",
  });

  $('#btn').click(function() {
    $("#tgl_perkin_tmt_x").focus();
  });

$( ".cb_pegawai" ).change(function() {
      $.ajax({
            type: "GET",
            url: 'perkin/getPejabat/'+$('#cb_pegawai').val(),
            dataType: "json",
            success: function(data) {
              var j = data.length;
              var post, i;
              for (i = 0; i < j; i++) {
                post = data[i];
                $('#nama_penandatangan_dok').val(post.nama_pegawai);
                $('#nip_penandatangan_dok').val(buatNip(post.nip_pegawai));
                $('#pangkat_penandatangan_dok').val(post.pangkat_pegawai);
                $('#ur_penandatangan_dok').val(post.pangkat_display);
              }
            }
        });     
  });

  $( ".cb_eselon_2" ).change(function() {
    $.ajax({
        type: "GET",
        url: 'perkin/getPegawai/'+$( ".cb_eselon_2" ).val(),
        dataType: "json",
        success: function(data) {
          var j = data.length;
              var post, i;
              for (i = 0; i < j; i++) {
                post = data[i];                
                $('#id_pegawai_dok').val(post.id_pegawai);
                $('#nama_penandatangan_dok').val(post.nama_pegawai);
                $('#nip_penandatangan_dok').val(buatNip(post.nip_pegawai));
                $('#pangkat_penandatangan_dok').val(post.pangkat_pegawai);
                $('#ur_penandatangan_dok').val(post.pangkat_display);
              }
        }
    });    
  });

  $( ".cb_unit_renstra" ).change(function() {
    
    id_unit_temp = $( ".cb_unit_renstra" ).val();
    loadDokumen(id_unit_temp);  
    
    $.ajax({
        type: "GET",
        url: 'perkin/getJabatan/'+id_unit_temp,
        dataType: "json",
        success: function(data) {
          var j = data.length;
          var post, i;

          $('select[name="cb_eselon_2"]').empty();
          $('select[name="cb_eselon_2"]').append('<option value="-1">---Pilih Jabatan Eselon---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="cb_eselon_2"]').append('<option value="'+ post.id_sotk_es2 +'">'+ post.nama_eselon +'</option>');
          }
        }
    });

  });

  $(document).on('click', '.btnProsesSasaran', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
    
    $('#prosesbar').show();
    $.ajax({
        type: 'post',
        url: './perkin/transSasaranRenstra',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_unit': id_unit_temp,
            'tahun': id_tahun_temp,
        },
        success: function(data) {
            tblSasaran.ajax.reload(null,false);
            $('#prosesbar').hide();
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }

        }
    });
  });

  
  $(document).on('click', '.btnAddDokumen', function() {
    $('#btnDokumen').removeClass('editDokumen');
    $('#btnDokumen').addClass('addDokumen');
    $('.modal-title').text('Tambah Dokumen Perjanjian Kinerja Level 1');
    $('.form-horizontal').show();
    $('#btnDokumen').show();
    $('#id_perkin_dok').val(null);
    $('#tahun_dok').val(null);
    $('#no_perkin_dok').val(null);
    $('#tgl_perkin_dok').val(hariIni());
    $('#tgl_perkin_dok_x').val(formatTgl(hariIni()));
    $('#tgl_perkin_tmt').val(hariIni());
    $('#tgl_perkin_tmt_x').val(formatTgl(hariIni()));
    $('#cb_eselon_2').val(-1);
    $('#cb_pegawai').val(-1);
    $('#id_pegawai_dok').val(null);
    $('#nama_penandatangan_dok').val(null);
    $('#nip_penandatangan_dok').val(null);
    $('#pangkat_penandatangan_dok').val(null);
    $('#ur_penandatangan_dok').val(null);
    $('#ModalDokumen').modal('show');
});

$('.modal-footer').on('click', '.addDokumen', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './perkin/addDokumen',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_sotk_es2': $('#cb_eselon_2').val(),
            'tahun': $('#tahun_dok').val(),
            'no_dokumen': $('#no_perkin_dok').val(),
            'tgl_dokumen': $('#tgl_perkin_dok').val(),
            'tanggal_mulai': $('#tgl_perkin_tmt').val(),
            'id_pegawai': $('#id_pegawai_dok').val(),
            'nama_penandatangan': $('#nama_penandatangan_dok').val(),
            'jabatan_penandatangan': $('#cb_eselon_2 option:selected').text(),
            'pangkat_penandatangan': $('#pangkat_penandatangan_dok').val(),
            'uraian_pangkat_penandatangan': $('#ur_penandatangan_dok').val(),
            'nip_penandatangan': $('#nip_penandatangan_dok').val(),   
        },
        success: function(data) {
            tblDokPerkin.ajax.reload(null,false);
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }

        }
    });
});

$(document).on('click', '.btnEditDokumen', function() {
var data = tblDokPerkin.row( $(this).parents('tr') ).data();
    $('#btnDokumen').addClass('editDokumen');
    $('#btnDokumen').removeClass('addDokumen');
    $('.modal-title').text('Tambah Dokumen Perjanjian Kinerja Level 1');
    $('.form-horizontal').show();
    $('#btnDokumen').show();
    $('#id_perkin_dok').val(data.id_dokumen_perkin);
    $('#tahun_dok').val(data.tahun);
    $('#no_perkin_dok').val(data.no_dokumen);
    $('#tgl_perkin_dok').val(data.tgl_dokumen);
    $('#tgl_perkin_dok_x').val(formatTgl(data.tgl_dokumen));
    $('#tgl_perkin_tmt').val(data.tanggal_mulai);
    $('#tgl_perkin_tmt_x').val(formatTgl(data.tanggal_mulai));
    $('#cb_eselon_2').val(data.id_sotk_es2);
    $('#id_pegawai_dok').val(data.id_pegawai);
    $('#nama_penandatangan_dok').val(data.nama_penandatangan);
    $('#nip_penandatangan_dok').val(buatNip(data.nip_penandatangan));
    $('#pangkat_penandatangan_dok').val(data.pangkat_penandatangan);
    $('#ur_penandatangan_dok').val(data.uraian_pangkat_penandatangan);
    $('#ModalDokumen').modal('show');
});

$('.modal-footer').on('click', '.editDokumen', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './perkin/editDokumen',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_dokumen_perkin': $('#id_perkin_dok').val(),
            'id_sotk_es2': $('#cb_eselon_2').val(),
            'tahun': $('#tahun_dok').val(),
            'no_dokumen': $('#no_perkin_dok').val(),
            'tgl_dokumen': $('#tgl_perkin_dok').val(),
            'tanggal_mulai': $('#tgl_perkin_tmt').val(),
            'id_pegawai': $('#id_pegawai_dok').val(),
            'nama_penandatangan': $('#nama_penandatangan_dok').val(),
            'jabatan_penandatangan': $('#cb_eselon_2 option:selected').text(),
            'pangkat_penandatangan': $('#pangkat_penandatangan_dok').val(),
            'uraian_pangkat_penandatangan': $('#ur_penandatangan_dok').val(),
            'nip_penandatangan': $('#nip_penandatangan_dok').val(),     
        },
        success: function(data) {
            tblDokPerkin.ajax.reload(null,false);
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }

        }
    });
});

$(document).on('click', '.btnHapusDokumen', function() {
    var data = tblDokPerkin.row( $(this).parents('tr') ).data();
      $('.btnDelAksiDokumen').addClass('delDokumen');
      $('.modal-title').text('Hapus Dokumen Perjanjian Kinerja Level 1');
      $('#id_dokumen_hapus').val(data.id_dokumen_perkin);
      $('.ur_dokumen_del').html(data.nama_penandatangan);
      $('#HapusDokumen').modal('show');

}); 
    
$('.modal-footer').on('click', '.delDokumen', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });
    
      $.ajax({
        type: 'post',
        url: './perkin/delDokumen',
        data: {
          '_token': $('input[name=_token]').val(),
          'id_dokumen_perkin': $('#id_dokumen_hapus').val(),
        },
        success: function(data) {
            tblDokPerkin.ajax.reload(null,false);
            if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
            }
        }
      });
});

$(document).on('click', '.btnDetailIndikatorSasaran', function() {
var data = tblInSasaran.row( $(this).parents('tr') ).data();
    $('.btnSimpanSasaranIndikator').removeClass('addSasaranIndikator');
    $('.btnSimpanSasaranIndikator').addClass('editSasaranIndikator');
  $('.modal-title').text('Data Indikator Sasaran Perangkat Daerah');
  $('.form-horizontal').show();
    $('#id_indikator_sasaran_renstra').val(data.id_indikator_sasaran_renstra);
    $('#id_perkin_sasaran_indikator').val(data.id_perkin_sasaran);
    $('#id_perkin_indikator').val(data.id_perkin_indikator);
    $('#kd_indikator_perkin').val(data.id_indikator);
    $('#ur_indikator_sasaran').val(data.nm_indikator);
    $('#satuan_sasaran_indikator').val(data.uraian_satuan);
    $('#target_t1').val(data.target_t1);
    $('#target_t2').val(data.target_t2);
    $('#target_t3').val(data.target_t3);
    $('#target_t4').val(data.target_t4);
    $('#target_tahun').val(data.target_tahun);
    $('#ModalIndikatorSasaran').modal('show');
});

$('.modal-footer').on('click', '.editSasaranIndikator', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './perkin/editIndikatorSasaran',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_perkin_indikator': $('#id_perkin_indikator').val(),
            'target_t1': $('#target_t1').val(),
            'target_t2': $('#target_t2').val(),
            'target_t3': $('#target_t3').val(),
            'target_t4': $('#target_t4').val(),   
        },
        success: function(data) {
            $('#tblSasaran').DataTable().ajax.reload(null,false);
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }

        }
    });
});

$(document).on('click', '.btnDetailProgram', function() {
var data = tblProgram.row( $(this).parents('tr') ).data();
    $('.btnSimpanProgram').removeClass('addSasaranProgram');
    $('.btnSimpanProgram').addClass('editSasaranProgram');
  $('.modal-title').text('Data Program Perangkat Daerah');
  $('.form-horizontal').show();
    $('#id_perkin_program').val(data.id_perkin_program);
    $('#id_perkin_sasaran_program').val(data.id_perkin_sasaran);
    $('#id_program_renstra').val(data.id_program_renstra);
    $('#uraian_program').val(data.uraian_program_display);
    $('#id_program_ref').val(data.id_program_ref);
    $('#cb_eselon_3').val(data.id_sotk_es3);
    $('#pagu_tahun').val(data.pagu_tahun);
    $('#ModalProgram').modal('show');
});

$('.modal-footer').on('click', '.editSasaranProgram', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './perkin/editProgram',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_perkin_program': $('#id_perkin_program').val(),
            'id_sotk_es3': $('#cb_eselon_3').val(), 
        },
        success: function(data) {
            tblProgram.ajax.reload(null,false);
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }

        }
    });
});

$(document).on('click', '.btnBagiRata', function() {
    $('#target_t1').val(25);
    $('#target_t2').val(25);
    $('#target_t3').val(25);
    $('#target_t4').val(25);
});

}); //end file