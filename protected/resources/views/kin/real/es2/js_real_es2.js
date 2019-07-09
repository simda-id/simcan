$(document).ready(function() {

  var detInSasaran = Handlebars.compile($("#details-inSasaran").html());

  var id_unit_temp, id_tahun_temp;
  var id_eselon2_temp, id_eselon3_temp, id_eselon4_temp;
  var id_real_kegiatan_temp, triwulan_temp;
  var data_real_temp, status_data_temp;
  
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
  };

function realisasi(){
  $('#real_indikator_t1').addClass('realisasi');
  $('#real_indikator_t2').addClass('realisasi');
  $('#real_indikator_t3').addClass('realisasi');
  $('#real_indikator_t4').addClass('realisasi');
};

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
        url: 'real/getUnit',
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
        url: 'real/getPegawai',
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
          "ajax": {"url": "./real/getDokumen/"+$id_unit},
          "columns": [
                { data: 'no_urut', sClass: "dt-center"},
                { data: 'tahun', sClass: "dt-center"},
                { data: 'triwulan', sClass: "dt-center"},
                { data: 'no_dokumen', sClass: "dt-center"},
                { data: 'jabatan_penandatangan'},
                { data: 'icon','searchable': false, 'orderable':false, sClass: "dt-center",
                            render: function(data, type, row,meta) {
                            return '<i class="'+row.status_icon+'" style="font-size:16px;color:'+row.warna+';"/>';
                          }},
                { data: 'action', 'searchable': false, 'orderable':false }
              ]
        });

      }

$('#tblDokPerkin tbody').on( 'dblclick', 'tr', function () {
  var data = tblDokPerkin.row(this).data();
    id_tahun_temp =  data.tahun;
    id_eselon2_temp = data.id_sotk_es2;
    triwulan_temp = data.triwulan;

    $('.nav-tabs a[href="#sasaran"]').tab('show');
    loadSasaran(data.id_dokumen_real); 
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
          "ajax": {"url": "./real/getSasaran/"+$id_dokumen},
          "columns": [
                {
                  "className":      'details-control',
                  "orderable":      false,
                  "searchable":      false,
                  "data":           null,
                  "defaultContent": '',
                  "width" : "5px",
                  "id": 'child_0',
                },
                { data: 'urut', sClass: "dt-center"},
                { data: 'uraian_sasaran_renstra'},
                { data: 'jml_indikator', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"}, 
              ]
    });
  };

$('#tblSasaran tbody').on( 'dblclick', 'tr', function () {
        
  });


var tblIndikator
function loadIndikator(tableId, data) {
  tblIndikator = $('#' + tableId).DataTable( {
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
          ajax: data.details_url,
          "columns": [
                
                { data: 'urut', sClass: "dt-center"},
                { data: 'nm_indikator'},
                { data: 'target_t1', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
                { data: 'real_t1', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
                { data: 'target_t2', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
                { data: 'real_t2', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
                { data: 'target_t3', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
                { data: 'real_t3', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
                { data: 'target_t4', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
                { data: 'real_t4', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},             
                { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
              ]
    });
  }

   var tblInIndikator;
    function initInIndikator(tableId, data) {
        tblInIndikator=$('#' + tableId).DataTable({
                processing: true,
                serverSide: true,
                ajax: data.details_url,
                dom : 'BFRTIP',
                autoWidth: false,
                "language": {
                          "decimal": ",",
                          "thousands": "."},
                "columns": [
                            { data: 'uraian', "width" : "50%",'searchable': false, 'orderable':false},
                            { data: 'real_t1', 
                                  render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right", "width" : "10%",'searchable': false, 'orderable':false},
                            { data: 'real_t2', 
                                  render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right", "width" : "10%",'searchable': false, 'orderable':false},
                            { data: 'real_t3', 
                                  render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right", "width" : "10%",'searchable': false, 'orderable':false},
                            { data: 'real_t4', 
                                  render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right", "width" : "10%",'searchable': false, 'orderable':false},
                            { data: 'kosong',"width" : "10%",'searchable': false, 'orderable':false, sClass: "dt-center"},                           
                            
                          ],
                "order": [[0, 'asc']],
                "bDestroy": true
            })
    }

  $('#tblSasaran tbody').on('click', 'td.details-control', function () {
      var tr = $(this).closest('tr');
      var row = tblSasaran.row( tr );
      var tableId = 'inSasaran-' + row.data().id_real_sasaran;

      if (row.child.isShown()) {
          row.child.hide();
          tr.removeClass('shown');
      } else {
          row.child(detInSasaran(row.data())).show();
          loadIndikator(tableId, row.data());
          tr.addClass('shown');
          tr.next().find('td').addClass('no-padding bg-gray');
      }    
  });

  $('#tgl_perkin_dok_x').datepicker({
    altField: "#tgl_perkin_dok",
    altFormat: "yy-mm-dd", 
    dateFormat: "dd MM yy",
  });

  $('#btn').click(function() {
    $("#tgl_perkin_dok_x").focus();
  });

$( ".cb_pegawai" ).change(function() {
  
      $.ajax({
            type: "GET",
            url: 'real/getPejabat/'+$('#cb_pegawai').val(),
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

  $( ".cb_unit_renstra" ).change(function() {    
    id_unit_temp = $( ".cb_unit_renstra" ).val();  
    loadDokumen(id_unit_temp);
    getDokumen(2000); 

    $.ajax({
        type: "GET",
        url: 'real/getJabatan/'+id_unit_temp,
        dataType: "json",
        success: function(data) {
          var j = data.length;
          var post, i;

          $('select[name="cb_eselon_4a"]').empty();
          $('select[name="cb_eselon_4a"]').append('<option value="-1">---Pilih Jabatan Bidang/Bagian---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="cb_eselon_4a"]').append('<option value="'+ post.id_sotk_es2 +'">'+ post.nama_eselon +'</option>');
          }
        }
    });
  });

  function getDokumen($tahun){
    $.ajax({
        type: "GET",
        url: 'real/getDokumenEs2/'+id_unit_temp+'/'+$tahun,
        dataType: "json",
        success: function(data) {
          var j = data.length;
          var post, i;

          $('select[name="cb_no_perkin_dok"]').empty();
          $('select[name="cb_no_perkin_dok"]').append('<option value="-1">---Pilih Dokumen Perkin---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="cb_no_perkin_dok"]').append('<option value="'+ post.id_dokumen_perkin +'">'+ post.no_dokumen +'</option>');
          }
        }
    });
  }
  
  $( ".cb_eselon_4a" ).change(function() {
    $.ajax({
        type: "GET",
        url: './perkin/getPegawai/'+$( ".cb_eselon_4a" ).val(),
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

  $( "#tahun_dok" ).change(function() {
      getDokumen($( "#tahun_dok" ).val());   
  });

  $(document).on('click', '.btnProsesSasaran', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
    
    $('#prosesbar').show();
    $.ajax({
        type: 'post',
        url: './real/transSasaranRenstra',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_sotk_es3': id_eselon2_temp,
            'tahun': id_tahun_temp,
            'triwulan': triwulan_temp,
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

var tbldokCapaian
function loadCapaian($id_unit,$tahun,$triwulan) {
  tbldokCapaian = $('#tblCapaian').DataTable( {
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
          "ajax": {"url": "./real/getDokRealEs3/"+$id_unit+'/'+$tahun+'/'+$triwulan},
          "columns": [
                { data: 'no_urut', sClass: "dt-center"},
                { data: 'tahun', sClass: "dt-center"},
                { data: 'triwulan', sClass: "dt-center"},
                { data: 'no_dokumen', sClass: "dt-center"},
                { data: 'nama_eselon', sClass: "dt-left"},
                { data: 'icon','searchable': false, 'orderable':false, sClass: "dt-center",
                            render: function(data, type, row,meta) {
                            return '<i class="'+row.status_icon+'" style="font-size:16px;color:'+row.warna+';"/>';
                          }},
                { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" } 
              ]
    });
  };

$(document).on('click', '.btnLihatRealEs3', function() {
  var data = tblDokPerkin.row( $(this).parents('tr') ).data();
    id_tahun_temp =  data.tahun;
    id_unit_temp = data.id_unit;
    triwulan_temp = data.triwulan;

    $('.nav-tabs a[href="#dokCapaian"]').tab('show');
    loadCapaian(data.id_unit,data.tahun,data.triwulan);   
    
});

var tblProgram
function loadProgram($id_dokumen) {
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
          "ajax": {"url": "./real/getIndikatorProgramEs3/"+$id_dokumen},
          "columns": [
                { data: 'urut', sClass: "dt-center"},
                { data: 'nm_indikator'},
                { data: 'target_t1', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
                { data: 'real_t1', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
                { data: 'target_t2', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
                { data: 'real_t2', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
                { data: 'target_t3', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
                { data: 'real_t3', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
                { data: 'target_t4', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
                { data: 'real_t4', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},             
                { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
              ]
    });
};

$('#tblCapaian tbody').on( 'dblclick', 'tr', function () {
  var data = tbldokCapaian.row(this).data();
    $('.nav-tabs a[href="#program"]').tab('show');
    loadProgram(data.id_dokumen_real); 
});

$('#radioBtn_reviu a').on('click', function(){
    var sel = $(this).data('title');
    var tog = $(this).data('toggle');
    $('#'+tog).prop('value', sel);
    
    $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
    $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
  });

  $(document).on('click', '.btnAddDokumen', function() {    
    $('#btnDokumen').removeClass('editDokumen');
    $('#btnDokumen').addClass('addDokumen');
    $('.modal-title').text('Tambah Dokumen Pengukuran Kinerja Level 1');
    $('.form-horizontal').show();
    $('#btnDokumen').show();
    $('#id_real_dok').val(null);
    $('#tahun_dok').val(null);
    $('#cb_triwulan_dok').val(null);
    $('#cb_no_perkin_dok').val(null);
    $('#no_realisasi_dok').val(null);
    $('#tgl_perkin_dok').val(hariIni());
    $('#tgl_perkin_dok_x').val(formatTgl(hariIni()));
    $('#cb_eselon_4a').val(-1);
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
        url: './real/addDokumen',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_sotk_es2': $('#cb_eselon_4a').val(),
            'tahun': $('#tahun_dok').val(),
            'triwulan': $('#cb_triwulan_dok').val(),            
            'id_dokumen_perkin': $('#cb_no_perkin_dok').val(),
            'no_dokumen': $('#no_realisasi_dok').val(),
            'tgl_dokumen': $('#tgl_perkin_dok').val(),
            'tanggal_mulai': $('#tgl_perkin_tmt').val(),
            'id_pegawai': $('#id_pegawai_dok').val(),
            'nama_penandatangan': $('#nama_penandatangan_dok').val(),
            'jabatan_penandatangan': $('#cb_eselon_4a option:selected').text(),
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
    $('.modal-title').text('Detail Dokumen Pengukuran Kinerja Level 1');
    $('.form-horizontal').show();
    $('#btnDokumen').show();
    $('#id_real_dok').val(data.id_dokumen_real);
    $('#tahun_dok').val(data.tahun);
    $('#cb_triwulan_dok').val(data.triwulan);
    $('#cb_no_perkin_dok').val(data.id_dokumen_perkin);
    $('#no_realisasi_dok').val(data.no_dokumen);
    $('#tgl_perkin_dok').val(data.tgl_dokumen);
    $('#tgl_perkin_dok_x').val(formatTgl(data.tgl_dokumen));
    $('#cb_eselon_4a').val(data.id_sotk_es2);
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
        url: './real/editDokumen',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_dokumen_real': $('#id_real_dok').val(),
            'id_sotk_es2': $('#cb_eselon_4a').val(),
            'tahun': $('#tahun_dok').val(),
            'triwulan': $('#cb_triwulan_dok').val(),            
            'id_dokumen_perkin': $('#cb_no_perkin_dok').val(),
            'no_dokumen': $('#no_realisasi_dok').val(),
            'tgl_dokumen': $('#tgl_perkin_dok').val(),
            'tanggal_mulai': $('#tgl_perkin_tmt').val(),
            'id_pegawai': $('#id_pegawai_dok').val(),
            'nama_penandatangan': $('#nama_penandatangan_dok').val(),
            'jabatan_penandatangan': $('#cb_eselon_4a option:selected').text(),
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
      $('.modal-title').text('Hapus Dokumen Pengukuran Kinerja Level 3');
      $('#id_dokumen_hapus').val(data.id_dokumen_real);
      $('.ur_dokumen_del').html(data.nama_penandatangan);
      $('#HapusDokumen').modal('show');

}); 
    
$('.modal-footer').on('click', '.delDokumen', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });
    
      $.ajax({
        type: 'post',
        url: './real/delDokumen',
        data: {
          '_token': $('input[name=_token]').val(),
          'id_dokumen_real': $('#id_dokumen_hapus').val(),
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
realisasi();
var data = tblIndikator.row( $(this).parents('tr') ).data();
    $('.btnSimpanSasaranIndikator').removeClass('addSasaranIndikator');
    $('.btnSimpanSasaranIndikator').addClass('editSasaranIndikator');
  $('.modal-title').text('Data Indikator Kegiatan Perangkat Daerah');
  $('.form-horizontal').show();
    $('#id_indikator_sasaran_renstra').val(data.id_indikator_sasaran_renstra);
    $('#id_perkin_sasaran_indikator').val(data.id_real_sasaran);
    $('#id_perkin_indikator').val(data.id_real_indikator);
    $('#kd_indikator_perkin').val(data.id_indikator);
    $('#ur_indikator_sasaran').val(data.nm_indikator);
    $('#satuan_sasaran_indikator').val(data.uraian_satuan);
    $('#target_t1').val(data.target_t1);
    $('#target_t2').val(data.target_t2);
    $('#target_t3').val(data.target_t3);
    $('#target_t4').val(data.target_t4);
    $('#real_indikator_t1').val(data.real_t1)
    $('#real_indikator_t2').val(data.real_t2)
    $('#real_indikator_t3').val(data.real_t3)
    $('#real_indikator_t4').val(data.real_t4)
    $('#real_fisik_t4').val(data.real_fisik);
    $('#real_indikator_t'+triwulan_temp).removeClass('realisasi');
    if(triwulan_temp==4){
      $('#real_fisik_t4').removeClass('realisasi'); 
    } else {
      $('#real_fisik_t4').addClass('realisasi'); 
    };
    $('#uraian_deviasi_indikator').val(data.uraian_deviasi);
    $('#uraian_renaksi_indikator').val(data.uraian_renaksi);
    $('#target_tahun').val(data.target_tahun);
    $('#ModalIndikatorProgram').modal('show');
});

$('.modal-footer').on('click', '.editSasaranIndikator', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './real/editIndikatorSasaran',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_real_indikator': $('#id_perkin_indikator').val(),
            'real_t1': $('#real_indikator_t1').val(),
            'real_t2': $('#real_indikator_t2').val(),
            'real_t3': $('#real_indikator_t3').val(),
            'real_t4': $('#real_indikator_t4').val(),   
            'real_fisik': $('#real_fisik_t4').val(), 
            'uraian_deviasi': $('#uraian_deviasi_indikator').val(), 
            'uraian_renaksi': $('#uraian_renaksi_indikator').val(),  
        },
        success: function(data) {
            tblIndikator.ajax.reload(null,false);
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }

        }
    });
});

$(document).on('click', '.btnDetailIndikatorKegiatan', function() {
var data = tblProgram.row( $(this).parents('tr') ).data();
    $('.btnSimpanRealEs4Indikator').removeClass('addRealEs4Indikator');
    $('.btnSimpanRealEs4Indikator').addClass('editRealEs4Indikator');
  $('.modal-title').text('Data Indikator Program Perangkat Daerah');
  $('.form-horizontal').show();
    $('#id_indikator_realEs4_renstra').val(data.id_indikator_program_renstra);
    $('#id_perkin_realEs4_indikator').val(data.id_real_program);
    $('#id_perkin_realEs4').val(data.id_real_indikator);
    $('#kd_indikator_realEs4').val(data.id_indikator);
    $('#ur_indikator_realEs4').val(data.nm_indikator);
    $('#satuan_realEs4_indikator').val(data.uraian_satuan);
    $('#target_t1_realEs4').val(data.target_t1);
    $('#target_t2_realEs4').val(data.target_t2);
    $('#target_t3_realEs4').val(data.target_t3);
    $('#target_t4_realEs4').val(data.target_t4);
    $('#real_indikator_t1_realEs4').val(data.real_t1);
    $('#real_indikator_t2_realEs4').val(data.real_t2);
    $('#real_indikator_t3_realEs4').val(data.real_t3);
    $('#real_indikator_t4_realEs4').val(data.real_t4);
    $('#uraian_deviasi_realEs4').val(data.uraian_deviasi);
    $('#uraian_renaksi_realEs4').val(data.uraian_renaksi);
    $('#reviu_realEs4').val(data.reviu_real);
    $('#reviu_deviasi_realEs4').val(data.reviu_deviasi);
    $('#reviu_renaksi_realEs4').val(data.reviu_renaksi);
    $('#flag_reviu_realEs4').val(data.status_data);
    if(data.status_data == 0){
        $('#flag_reviu_realEs4_1').removeClass('active').addClass('notActive');
        $('#flag_reviu_realEs4_0').addClass('active').removeClass('notActive');
    } else {
        $('#flag_reviu_realEs4_0').removeClass('active').addClass('notActive');
        $('#flag_reviu_realEs4_1').addClass('active').removeClass('notActive');
    }
    $('#ModalIndikatorRealEs4').modal('show');
});

$('.modal-footer').on('click', '.editRealEs4Indikator', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './real/reviuRealisasi',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_real_indikator': $('#id_perkin_realEs4').val(),
            'real_reviu': $('#reviu_realEs4').val(), 
            'reviu_deviasi': $('#reviu_deviasi_realEs4').val(), 
            'reviu_renaksi': $('#reviu_renaksi_realEs4').val(), 
            'status_data': $('#flag_reviu_realEs4').val(), 
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

$(document).on('click', '.btnPostingDokumenEs3', function() {
  // var data = tbldokCapaian.row(this).data(); //klik double
  var data = tbldokCapaian.row( $(this).parents('tr') ).data(); //klik button
    data_real_temp= data.id_dokumen_real;
    if(data.status_data == 0) {
        status_data_temp = 1;
      } else {
        status_data_temp = 0;
      }

    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './real/postingReviu',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_dokumen_real': data_real_temp,
            'status_data': status_data_temp, 
        },
        success: function(data) {
            tbldokCapaian.ajax.reload(null,false);
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }

        }
    });
});


}); //end file