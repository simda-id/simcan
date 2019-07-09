$(document).ready(function() {
    
  var detInSasaran = Handlebars.compile($("#details-inSasaran").html());
  var detInIndikator = Handlebars.compile($("#details-inIndikator").html());

  var id_unit_temp;
  var id_tahun_temp;
  var id_eselon2_temp;
  var id_eselon3_temp;  
  var id_eselon4_temp;
  var id_real_kegiatan_temp;
  var triwulan_temp;
  var id_pegawai_temp;
  var nama_penandatangan_temp;
  var nip_penandatangan_temp;
  var pangkat_penandatangan_temp;
  var ur_penandatangan_temp;
  
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

function realisasi(){  
  $('#real_t1').addClass('realisasi');
  $('#real_t2').addClass('realisasi');
  $('#real_t3').addClass('realisasi');
  $('#real_t4').addClass('realisasi');
  $('#real_indikator_t1').addClass('realisasi');
  $('#real_indikator_t2').addClass('realisasi');
  $('#real_indikator_t3').addClass('realisasi');
  $('#real_indikator_t4').addClass('realisasi');
};

$.ajax({
        type: "GET",
        url: 'es4/getUnit',
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
        url: 'es4/getPegawai',
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
          "ajax": {"url": "./es4/getDokumen/"+$id_unit},
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
    id_eselon3_temp = data.id_sotk_es3;
    id_eselon4_temp = data.id_sotk_es4;
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
          "ajax": {"url": "./es4/getSasaran/"+$id_dokumen},
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
                { data: 'kd_kegiatan', sClass: "dt-center"},
                { data: 'nm_kegiatan'},
                { data: 'pagu_t1', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
                { data: 'pagu_t2', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
                { data: 'pagu_t3', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
                { data: 'pagu_t4', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
                { data: 'pagu_tahun', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
                { data: 'jml_indikator', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},                
                { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
              ]
    });
  }

  var tblInSasaran;
    function initInSasaran(tableId, data) {
        tblInSasaran=$('#' + tableId).DataTable({
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
      var tableId = 'inSasaran-' + row.data().id_real_kegiatan;

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
    id_real_kegiatan_temp =  data.id_real_kegiatan;
    $('.nav-tabs a[href="#indikator"]').tab('show');
    loadIndikator(id_real_kegiatan_temp);   
        
  });


var tblIndikator
function loadIndikator($id_dokumen) {
  tblIndikator = $('#tblIndikator').DataTable( {
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
          "ajax": {"url": "./es4/getIndikatorSasaran/"+$id_dokumen},
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
                { data: 'nm_indikator'},
                { data: 'target_t1', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
                { data: 'target_t2', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
                { data: 'target_t3', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
                { data: 'target_t4', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
                { data: 'target_tahun', 
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

  $('#tblIndikator tbody').on('click', 'td.details-control', function () {
      var tr = $(this).closest('tr');
      var row = tblIndikator.row( tr );
      var tableId = 'inIndikator-' + row.data().id_real_indikator;

      if (row.child.isShown()) {
          row.child.hide();
          tr.removeClass('shown');
      } else {
          row.child(detInIndikator(row.data())).show();
          initInIndikator(tableId, row.data());
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
            url: 'es4/getPejabat/'+$('#cb_pegawai').val(),
            dataType: "json",
            success: function(data) {
            //   var j = data.length;
            //   var post, i;
            //   for (i = 0; i < j; i++) {
            //     post = data[i];
            //     $('#nama_penandatangan_dok').val(post.nama_pegawai);
            //     $('#nip_penandatangan_dok').val(buatNip(post.nip_pegawai));
            //     $('#pangkat_penandatangan_dok').val(post.pangkat_pegawai);
            //     $('#ur_penandatangan_dok').val(post.pangkat_display);
            //   }
            }
        });     
  });

  $( ".cb_unit_renstra" ).change(function() {    
    id_unit_temp = $( ".cb_unit_renstra" ).val();    
    $.ajax({
        type: "GET",
        url: 'es4/getEselon3/'+id_unit_temp,
        dataType: "json",
        success: function(data) {
          var j = data.length;
          var post, i;

          $('select[name="cb_eselon_3"]').empty();
          $('select[name="cb_eselon_3"]').append('<option value="-1">---Pilih Jabatan Bidang/Bagian---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="cb_eselon_3"]').append('<option value="'+ post.id_sotk_es3 +'">'+ post.nama_eselon +'</option>');
          }
        }
    });
  });

  $( ".cb_eselon_3" ).change(function() {    
    id_eselon3_temp = $( ".cb_eselon_3" ).val();
    $.ajax({
        type: "GET",
        url: 'es4/getEselon4/'+id_eselon3_temp,
        dataType: "json",
        success: function(data) {
          var j = data.length;
          var post, i;

          $('select[name="cb_eselon_4"]').empty();
          $('select[name="cb_eselon_4"]').append('<option value="-1">---Pilih Jabatan Eselon---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="cb_eselon_4"]').append('<option value="'+ post.id_sotk_es4 +'">'+ post.nama_eselon +'</option>');
          }
        }
    });
    
  });

  $( ".cb_eselon_4" ).change(function() {    
    id_eselon4_temp = $( ".cb_eselon_4" ).val();
    loadDokumen(id_eselon4_temp);
    getDokumen(0);   
    $.ajax({
        type: "GET",
        url: 'es4/getEselon4/'+id_eselon3_temp,
        dataType: "json",
        success: function(data) {
          var j = data.length;
          var post, i;

          $('select[name="cb_eselon_4a"]').empty();
          $('select[name="cb_eselon_4a"]').append('<option value="-1">---Pilih Jabatan Eselon---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="cb_eselon_4a"]').append('<option value="'+ post.id_sotk_es4 +'">'+ post.nama_eselon +'</option>');
          }
        }
    });

    $.ajax({
        type: "GET",
        url: 'es4/getPejabat/'+$( ".cb_eselon_4" ).val(),
        dataType: "json",
        success: function(data) {
          var j = data.length;
              var post, i;
              for (i = 0; i < j; i++) {
                post = data[i];                
                id_pegawai_temp= post.id_pegawai;
                nama_penandatangan_temp= post.nama_pegawai;
                nip_penandatangan_temp= post.nip_pegawai;
                pangkat_penandatangan_temp= post.pangkat_pegawai;
                ur_penandatangan_temp= post.pangkat_display;
              }
        }
    });

  });

  function getDokumen($tahun){
    $.ajax({
        type: "GET",
        url: 'es4/getDokumenEs2/'+id_eselon4_temp+'/'+$tahun,
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
  };

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
        url: './es4/transSasaranRenstra',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_sotk_es4': id_eselon4_temp,
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

$(document).on('click', '.btnAddDokumen', function() {    
    $('#btnDokumen').removeClass('editDokumen');
    $('#btnDokumen').addClass('addDokumen');
    $('.modal-title').text('Tambah Dokumen Pengukuran Kinerja Level 3');
    $('.form-horizontal').show();
    $('#btnDokumen').show();
    $('#id_real_dok').val(null);
    $('#tahun_dok').val(null);
    $('#cb_triwulan_dok').val(null);
    $('#cb_no_perkin_dok').val(null);
    $('#no_realisasi_dok').val(null);
    $('#tgl_perkin_dok').val(hariIni());
    $('#tgl_perkin_dok_x').val(formatTgl(hariIni()));
    $('#cb_eselon_4a').val(id_eselon4_temp);
    $('#cb_pegawai').val(-1);
    $('#id_jabatan_dok').val($( ".cb_eselon_4" ).val());
    $('#jabatan_penandatangan_dok').val($('#cb_eselon_4 option:selected').text());
    $('#id_pegawai_dok').val(id_pegawai_temp);
    $('#nama_penandatangan_dok').val(nama_penandatangan_temp);
    $('#nip_penandatangan_dok').val(nip_penandatangan_temp);
    $('#pangkat_penandatangan_dok').val(pangkat_penandatangan_temp);
    $('#ur_penandatangan_dok').val(ur_penandatangan_temp);
    // $.ajax({
    //     type: "GET",
    //     url: '../real/es4/getJabatan/'+$( ".cb_eselon_4" ).val(),
    //     dataType: "json",
    //     success: function(data) {
    //       var j = data.length;
    //           var post, i;
    //           for (i = 0; i < j; i++) {
    //             post = data[i];                
    //             $('#id_pegawai_dok').val(post.id_pegawai);
    //             $('#nama_penandatangan_dok').val(post.nama_pegawai);
    //             $('#nip_penandatangan_dok').val(buatNip(post.nip_pegawai));
    //             $('#pangkat_penandatangan_dok').val(post.pangkat_pegawai);
    //             $('#ur_penandatangan_dok').val(post.pangkat_display);
    //           }
    //     }
    // });
    $('#ModalDokumen').modal('show');
});

$('.modal-footer').on('click', '.addDokumen', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
    
    $('#prosesbar').show();
    $.ajax({
        type: 'post',
        url: './es4/addDokumen',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_sotk_es4': id_eselon4_temp,
            'tahun': $('#tahun_dok').val(),
            'triwulan': $('#cb_triwulan_dok').val(),            
            'id_dokumen_perkin': $('#cb_no_perkin_dok').val(),
            'no_dokumen': $('#no_realisasi_dok').val(),
            'tgl_dokumen': $('#tgl_perkin_dok').val(),
            'tanggal_mulai': $('#tgl_perkin_tmt').val(),
            'id_pegawai': $('#id_pegawai_dok').val(),
            'nama_penandatangan': $('#nama_penandatangan_dok').val(),
            'jabatan_penandatangan': $('#jabatan_penandatangan_dok').val(),
            'pangkat_penandatangan': $('#pangkat_penandatangan_dok').val(),
            'uraian_pangkat_penandatangan': $('#ur_penandatangan_dok').val(),
            'nip_penandatangan': $('#nip_penandatangan_dok').val(),   
        },
        success: function(data) {
            tblDokPerkin.ajax.reload(null,false);
            $('#prosesbar').hide();
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
    $('.modal-title').text('Detail Dokumen Pengukuran Kinerja Level 2');
    $('.form-horizontal').show();
    $('#btnDokumen').show();
    $('#id_real_dok').val(data.id_dokumen_real);
    $('#tahun_dok').val(data.tahun);
    $('#cb_triwulan_dok').val(data.triwulan);
    $('#cb_no_perkin_dok').val(null);
    $('#cb_no_perkin_dok').val(data.id_dokumen_perkin);
    $('#no_realisasi_dok').val(data.no_dokumen);
    $('#tgl_perkin_dok').val(data.tgl_dokumen);
    $('#tgl_perkin_dok_x').val(formatTgl(data.tgl_dokumen));
    $('#cb_eselon_4a').val(data.id_sotk_es4);
    $('#cb_pegawai').val(data.id_pegawai);
    $('#id_pegawai_dok').val(data.id_pegawai);
    $('#id_jabatan_dok').val(data.id_sotk_es4);
    $('#jabatan_penandatangan_dok').val(data.jabatan_penandatangan);
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

    $('#prosesbar').show();
    $.ajax({
        type: 'post',
        url: './es4/editDokumen',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_dokumen_real': $('#id_real_dok').val(),
            'id_sotk_es4': id_eselon4_temp,
            'tahun': $('#tahun_dok').val(),
            'triwulan': $('#cb_triwulan_dok').val(),            
            'id_dokumen_perkin': $('#cb_no_perkin_dok').val(),
            'no_dokumen': $('#no_realisasi_dok').val(),
            'tgl_dokumen': $('#tgl_perkin_dok').val(),
            'tanggal_mulai': $('#tgl_perkin_tmt').val(),
            'id_pegawai': $('#id_pegawai_dok').val(),
            'nama_penandatangan': $('#nama_penandatangan_dok').val(),
            'jabatan_penandatangan': $('#jabatan_penandatangan_dok').val(),
            'pangkat_penandatangan': $('#pangkat_penandatangan_dok').val(),
            'uraian_pangkat_penandatangan': $('#ur_penandatangan_dok').val(),
            'nip_penandatangan': $('#nip_penandatangan_dok').val(),     
        },
        success: function(data) {
            tblDokPerkin.ajax.reload(null,false);
            $('#prosesbar').hide();
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
      $('#prosesbar').show();
      $.ajax({
        type: 'post',
        url: './es4/delDokumen',
        data: {
          '_token': $('input[name=_token]').val(),
          'id_dokumen_real': $('#id_dokumen_hapus').val(),
        },
        success: function(data) {
            tblDokPerkin.ajax.reload(null,false);
            $('#prosesbar').hide();
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
    if(data.status_dokumen==0){      
      $('.btnSimpanSasaranIndikator').show();
    } else {
      $('.btnSimpanSasaranIndikator').hide();
    }
  $('.modal-title').text('Data Indikator Kegiatan Perangkat Daerah');
  $('.form-horizontal').show();
    $('#id_indikator_sasaran_renstra').val(data.id_indikator_kegiatan_renstra);
    $('#id_perkin_sasaran_indikator').val(data.id_real_kegiatan);
    $('#id_perkin_indikator').val(data.id_real_indikator);
    $('#kd_indikator_perkin').val(data.id_indikator);
    $('#ur_indikator_sasaran').val(data.nm_indikator);
    $('#satuan_sasaran_indikator').val(data.uraian_satuan);
    $('#target_t1').val(data.target_t1);
    $('#target_t2').val(data.target_t2);
    $('#target_t3').val(data.target_t3);
    $('#target_t4').val(data.target_t4);
    $('#real_indikator_t1').val(data.real_t1);
    $('#real_indikator_t2').val(data.real_t2);
    $('#real_indikator_t3').val(data.real_t3);
    $('#real_indikator_t4').val(data.real_t4);      
    $('#real_fisik_t4').val(data.real_fisik);
    $('#real_indikator_t'+triwulan_temp).removeClass('realisasi'); 
    if(triwulan_temp==4){
      $('#real_fisik_t4').removeClass('realisasi'); 
    } else {
      $('#real_fisik_t4').addClass('realisasi'); 
    };
    $('#target_tahun').val(data.target_tahun);
    $('#uraian_deviasi_indikator').val(data.uraian_deviasi);
    $('#uraian_renaksi_indikator').val(data.uraian_renaksi);
    $('#ModalIndikatorProgram').modal('show');
});

$('.modal-footer').on('click', '.editSasaranIndikator', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './es4/editIndikatorSasaran',
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
            'real_reviu': $('#real_indikator_t'+triwulan_temp).val(),    
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

$(document).on('click', '.btnDetailSasaran', function() {
realisasi();
var data = tblSasaran.row( $(this).parents('tr') ).data();
    $('.btnSimpanProgram').removeClass('addSasaranProgram');
    $('.btnSimpanProgram').addClass('editSasaranProgram');
    if(data.status_dokumen==0){      
      $('.btnSimpanProgram').show();
    } else {
      $('.btnSimpanProgram').hide();
    }
  $('.modal-title').text('Data Program Perangkat Daerah');
  $('.form-horizontal').show();
    $('#id_perkin_kegiatan').val(data.id_real_kegiatan);
    $('#id_perkin_dokumen_kegiatan').val(data.id_dokumen_real);
    $('#id_kegiatan_renstra').val(data.id_kegiatan_renstra);
    $('#uraian_kegiatan').val(data.uraian_kegiatan_display);
    $('#id_kegiatan_ref').val(data.id_kegiatan_ref);
    $('#pagu_t1').val(data.pagu_t1);
    $('#pagu_t2').val(data.pagu_t2);
    $('#pagu_t3').val(data.pagu_t3);
    $('#pagu_t4').val(data.pagu_t4);
    $('#real_t1').val(data.real_t1);
    $('#real_t2').val(data.real_t2);
    $('#real_t3').val(data.real_t3);
    $('#real_t4').val(data.real_t4);   
    $('#real_t'+triwulan_temp).removeClass('realisasi'); 
    $('#uraian_deviasi_anggaran').val(data.uraian_deviasi);
    $('#uraian_renaksi_anggaran').val(data.uraian_renaksi);
    $('#ModalKegiatan').modal('show');
});

$('.modal-footer').on('click', '.editSasaranProgram', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './es4/editKegiatan',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_real_kegiatan': $('#id_perkin_kegiatan').val(),
            'real_t1': $('#real_t1').val(), 
            'real_t2': $('#real_t2').val(), 
            'real_t3': $('#real_t3').val(), 
            'real_t4': $('#real_t4').val(), 
            'uraian_deviasi': $('#uraian_deviasi_anggaran').val(), 
            'uraian_renaksi': $('#uraian_renaksi_anggaran').val(), 
        },
        success: function(data) {
            tblSasaran.ajax.reload(null,false);
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }

        }
    });
});

}); //end file