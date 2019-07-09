$(document).ready(function() {
  
  
  var detInSasaran = Handlebars.compile($("#details-inSasaran").html());
  var detInProgram = Handlebars.compile($("#details-inProgram").html());
  var detInKegiatan = Handlebars.compile($("#details-inKegiatan").html());

  var id_dokumen_temp;
  var id_renstra_temp;
  var id_sasaran_temp;
  var id_program_temp;
  var id_kegiatan_temp;
  var id_iku_sasaran_temp;
  
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
        url: '../perkin/getUnit',
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

function loadRenstra($id_unit) {
  $.ajax({
    type: "GET",
    url: '../cetak/getDokumenRenstra/'+$id_unit,
    dataType: "json",
    success: function(data) {
        var j = data.length;
        var post, i;

        $('select[name="cb_no_perda"]').empty();
        $('select[name="cb_no_perda"]').append('<option value="-1">Pilih Nomor Dokumen Renstra</option>');

        for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="cb_no_perda"]').append('<option value="'+ post.id_renstra +'">'+ post.nomor_renstra +'</option>');

        }
    }
  });
};

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
          "ajax": {"url": "./opd/getDokumen/"+$id_unit},
          "columns": [
                { data: 'no_urut', sClass: "dt-center"},
                { data: 'no_dokumen', sClass: "dt-center"},
                { data: 'uraian_dokumen'},
                { data: 'action', 'searchable': false, 'orderable':false }
              ]
        });

      }

$( ".cb_unit_renstra" ).change(function() {    
    id_unit_temp = $( ".cb_unit_renstra" ).val();
    id_dokumen_temp = null;
    id_renstra_temp = null;
    loadDokumen(id_unit_temp);
    loadRenstra(id_unit_temp);  
    
  });

$('#tblDokPerkin tbody').on( 'dblclick', 'tr', function () {
  var data = tblDokPerkin.row(this).data();
    id_dokumen_temp =  data.id_dokumen;
    id_renstra_temp = data.id_renstra;

    $('.nav-tabs a[href="#sasaran"]').tab('show');
    loadSasaran(data.id_dokumen);  

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
          "ajax": {"url": "./opd/getSasaran/"+$id_dokumen},
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
                { data: 'uraian_sasaran_renstra'},
                { data: 'jml_indikator_iku', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
                { data: 'jml_indikator_non', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
              ],          
          "order": [[1, 'ASC']],
    });
  }

  var tblInSasaran;
    function initInSasaran(tableId, data) {
        tblInSasaran=$('#' + tableId).DataTable({
                processing: true,
                serverSide: true,
                ajax: data.details_url,
                dom : 'BfRtIp',
                autoWidth: false,
                "language": {
                          "decimal": ",",
                          "thousands": "."},
                "columns": [
                            { data: 'urut', sClass: "dt-center"},
                            { data: 'nm_indikator'},
                            { data: 'angka_akhir_periode', 
                                  render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
                            { data: 'uraian_satuan', sClass: "dt-center"},
                            { data: 'uraian','searchable': false, 'orderable':false, sClass: "dt-center",
                              render: function(data, type, row,meta) {
                              return row.flag_display + '  <i class="'+row.status_icon+'" style="font-size:16px;color:'+row.warna+';"/>';
                            }},
                            // { data: 'nama_unit', sClass: "dt-center"},
                            { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
                          ],
                "order": [[0, 'asc']],
                "bDestroy": true
            })
    }

  $('#tblSasaran tbody').on('click', 'td.details-control', function () {
      var tr = $(this).closest('tr');
      var row = tblSasaran.row( tr );
      var tableId = 'inSasaran-' + row.data().id_sasaran_renstra;

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
    id_sasaran_temp = data.id_sasaran_renstra;

    $('.nav-tabs a[href="#program"]').tab('show');
    loadProgram(id_sasaran_temp);

    $.ajax({
        type: "GET",
        url: 'opd/getEselon3/'+id_unit_temp,
        dataType: "json",
        success: function(data) {
          var j = data.length;
          var post, i;

          $('select[name="unit_esl3"]').empty();
          $('select[name="unit_esl3"]').append('<option value="-1">---Pilih Jabatan Eselon---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="unit_esl3"]').append('<option value="'+ post.id_sotk_es3 +'">'+ post.nama_eselon +'</option>');
          }
        }
    });  

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
          "ajax": {"url": "./opd/getProgram/"+$id_dokumen},
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
                { data: 'uraian_program_renstra'},
                { data: 'jml_indikator_iku', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
                { data: 'jml_indikator_non', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
              ]
    });
  }

  var tblInProgram;
    function initInProgram(tableId, data) {
        tblInProgram=$('#' + tableId).DataTable({
                processing: true,
                serverSide: true,
                ajax: data.details_url,
                dom : 'BfRtIp',
                autoWidth: false,
                "language": {
                          "decimal": ",",
                          "thousands": "."},
                "columns": [
                            { data: 'urut', sClass: "dt-center"},
                            { data: 'nm_indikator'},
                            { data: 'angka_akhir_periode', 
                                  render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
                            { data: 'uraian_satuan', sClass: "dt-center"},
                            { data: 'uraian','searchable': false, 'orderable':false, sClass: "dt-center",
                              render: function(data, type, row,meta) {
                              return row.flag_display + '  <i class="'+row.status_icon+'" style="font-size:16px;color:'+row.warna+';"/>';
                            }},
                            { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
                          ],
                "order": [[0, 'asc']],
                "bDestroy": true
            })
    }

  $('#tblProgram tbody').on('click', 'td.details-control', function () {
      var tr = $(this).closest('tr');
      var row = tblProgram.row( tr );
      var tableId = 'inProgram-' + row.data().id_program_renstra;

      if (row.child.isShown()) {
          row.child.hide();
          tr.removeClass('shown');
      } else {
          row.child(detInProgram(row.data())).show();
          initInProgram(tableId, row.data());
          tr.addClass('shown');
          tr.next().find('td').addClass('no-padding bg-gray');
      }    
  });

  $('#tblProgram tbody').on( 'dblclick', 'tr', function () {
    var data = tblProgram.row(this).data();
    id_program_temp = data.id_program_renstra;

    $('.nav-tabs a[href="#kegiatan"]').tab('show');
    loadKegiatan(id_program_temp); 

    $.ajax({
        type: "GET",
        url: 'opd/getEselon4/'+id_unit_temp,
        dataType: "json",
        success: function(data) {
          var j = data.length;
          var post, i;

          $('select[name="unit_esl4"]').empty();
          $('select[name="unit_esl4"]').append('<option value="-1">---Pilih Jabatan Eselon---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="unit_esl4"]').append('<option value="'+ post.id_sotk_es4 +'">'+ post.nama_eselon +'</option>');
          }
        }
    }); 

  });

  var tblKegiatan
  function loadKegiatan($id_dokumen) {
  tblKegiatan = $('#tblKegiatan').DataTable( {
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
          "ajax": {"url": "./opd/getKegiatan/"+$id_dokumen},
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
                { data: 'uraian_kegiatan_renstra'},
                { data: 'jml_indikator_iku', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
                { data: 'jml_indikator_non', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
              ]
    });
  }

  var tblInKegiatan;
    function initInKegiatan(tableId, data) {
        tblInKegiatan=$('#' + tableId).DataTable({
                processing: true,
                serverSide: true,
                ajax: data.details_url,
                dom : 'BfRtIp',
                autoWidth: false,
                "language": {
                          "decimal": ",",
                          "thousands": "."},
                "columns": [
                            { data: 'urut', sClass: "dt-center"},
                            { data: 'nm_indikator'},
                            { data: 'angka_akhir_periode', 
                                  render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
                            { data: 'uraian_satuan', sClass: "dt-center"},
                            { data: 'uraian','searchable': false, 'orderable':false, sClass: "dt-center",
                              render: function(data, type, row,meta) {
                              return row.flag_display + '  <i class="'+row.status_icon+'" style="font-size:16px;color:'+row.warna+';"/>';
                            }},
                            { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
                          ],
                "order": [[0, 'asc']],
                "bDestroy": true
            })
    }

  $('#tblKegiatan tbody').on('click', 'td.details-control', function () {
      var tr = $(this).closest('tr');
      var row = tblKegiatan.row( tr );
      var tableId = 'inKegiatan-' + row.data().id_kegiatan_renstra;

      if (row.child.isShown()) {
          row.child.hide();
          tr.removeClass('shown');
      } else {
          row.child(detInKegiatan(row.data())).show();
          initInKegiatan(tableId, row.data());
          tr.addClass('shown');
          tr.next().find('td').addClass('no-padding bg-gray');
      }    
  });
  
  $('#tgl_iku_dok_x').datepicker({
    altField: "#tgl_iku_dok",
    altFormat: "yy-mm-dd", 
    dateFormat: "dd MM yy",
  });

  $('#btn').click(function() {
    $("#tgl_iku_dok_x").focus();
  });


  $(document).on('click', '.btnProsesSasaran', function() {
    if(id_dokumen_temp == null || id_renstra_temp == null ){
      createPesan('Silahkan Klik Double di Dokumen terlebih dahulu',"danger"); 
    } else { 
        $('#prosesbar').show();
        $.ajaxSetup({
           headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });   
        $.ajax({
            type: 'post',
            url: './opd/transIndikatorSasaran',
            data: {
                '_token': $('input[name=_token]').val(),
                'id_dokumen': id_dokumen_temp,
                'id_renstra': id_renstra_temp,
                'id_unit': id_unit_temp,
            },
            success: function(data) {
                tblSasaran.ajax.reload(null,false);
                $('#prosesbar').hide();
                if(data.status_pesan==1){
                    createPesan(data.pesan,"success");
                    } else {
                    createPesan(data.pesan,"danger"); 
                };
            }
        });
      }
  });

  $('#radioBtn a').on('click', function(){
    var sel = $(this).data('title');
    var tog = $(this).data('toggle');
    $('#'+tog).prop('value', sel);
    
    $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
    $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
  });

  $('#radioBtn_prog a').on('click', function(){
    var sel = $(this).data('title');
    var tog = $(this).data('toggle');
    $('#'+tog).prop('value', sel);
    
    $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
    $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
  });

  $('#radioBtn_keg a').on('click', function(){
    var sel = $(this).data('title');
    var tog = $(this).data('toggle');
    $('#'+tog).prop('value', sel);
    
    $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
    $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
  });

  
  $(document).on('click', '.btnAddDokumen', function() {
    $('#btnDokumen').removeClass('editDokumen');
    $('#btnDokumen').addClass('addDokumen');
    $('.modal-title').text('Tambah Dokumen Indikator Kinerja Utama Perangkat Daerah');
    $('.form-horizontal').show();
    $('#btnDokumen').show();
    $('#id_iku_dok').val(null);
    $('#id_unit_dok').val(id_unit_temp);
    $('#no_iku_dok').val(null);
    $('#tgl_iku_dok').val(hariIni());
    $('#tgl_iku_dok_x').val(formatTgl(hariIni()));
    $('#cb_no_perda').val(-1);
    $('#uraian_iku_dok').val(null);
    $('#ModalDokumen').modal('show');
});

$('.modal-footer').on('click', '.addDokumen', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './opd/addDokumen',
        data: {
            '_token': $('input[name=_token]').val(),
            'no_dokumen': $('#no_iku_dok').val(),
            'tgl_dokumen': $('#tgl_iku_dok').val(),
            'uraian_dokumen': $('#uraian_iku_dok').val(),
            'id_renstra': $('#cb_no_perda').val(),
            'id_unit': $('#id_unit_dok').val(),  
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
    $('.modal-title').text('Detail Dokumen Indikator Kinerja Utama Perangkat Daerah');
    $('.form-horizontal').show();
    $('#btnDokumen').show();
    $('#id_iku_dok').val(data.id_dokumen);
    $('#id_unit_dok').val(data.id_unit);
    $('#no_iku_dok').val(data.no_dokumen);
    $('#tgl_iku_dok').val(data.tgl_dokumen);
    $('#tgl_iku_dok_x').val(formatTgl(data.tgl_dokumen));
    $('#cb_no_perda').val(data.id_renstra);
    $('#uraian_iku_dok').val(data.uraian_dokumen);
    $('#ModalDokumen').modal('show');
});

$('.modal-footer').on('click', '.editDokumen', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './opd/editDokumen',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_dokumen': $('#id_iku_dok').val(),
            'no_dokumen': $('#no_iku_dok').val(),
            'tgl_dokumen': $('#tgl_iku_dok').val(),
            'uraian_dokumen': $('#uraian_iku_dok').val(),
            'id_renstra': $('#cb_no_perda').val(),
            'id_unit': $('#id_unit_dok').val(),         
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
      $('.modal-title').text('Hapus Dokumen Indikator Kinerja Utama Perangkat Daerah');
      $('#id_dokumen_hapus').val(data.id_dokumen);
      $('.ur_dokumen_del').html(data.uraian_dokumen);
      $('#HapusDokumen').modal('show');

}); 
    
$('.modal-footer').on('click', '.delDokumen', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });
    
      $.ajax({
        type: 'post',
        url: './opd/delDokumen',
        data: {
          '_token': $('input[name=_token]').val(),
          'id_dokumen': $('#id_dokumen_hapus').val(),
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
  $('.modal-title').text('Data Indikator Kinerja Sasaran Perangkat Daerah');
  $('.form-horizontal').show();
    $('#id_iku_pemda_rinci').val(data.id_iku_opd_sasaran);
    $('#id_dokumen_rinci').val(data.id_dokumen);
    $('#id_indikator_sasaran_rpjmd_rinci').val(data.id_indikator_sasaran_renstra);
    $('#nm_indikator_rinci').val(data.nm_indikator);
    $('#target_sasaran_rinci').val(data.angka_akhir_periode);
    $('#satuan_sasaran_rinci').val(data.uraian_satuan);
    $('#type_indikator_rinci').val(data.sifat_indikator_display);
    $('#metode_ukur_rinci').val(data.metode_penghitungan,);
    $('#sumber_data_ukur_rinci').val(data.sumber_data_indikator);
    $('#jenis_indikator_rinci').val(data.kualitas_indikator_display);
    $('#sifat_indikator_rinci').val(data.jenis_indikator_display);
    $('#tipe_indikator_rinci').val(data.type_indikator_display);
    $('#flag_iku_rinci').val(data.flag_iku);
    if(data.flag_iku == 0){
        $('#flag_iku_rinci_1').removeClass('active').addClass('notActive');
        $('#flag_iku_rinci_0').addClass('active').removeClass('notActive');
    } else {
        $('#flag_iku_rinci_0').removeClass('active').addClass('notActive');
        $('#flag_iku_rinci_1').addClass('active').removeClass('notActive');
    }
    // {{-- $('#unit_penanggungjawab').val(data.unit_penanggung_jawab); --}}
    $('#ModalIndikatorSasaran').modal('show');
});

$('.modal-footer').on('click', '.editSasaranIndikator', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './opd/editIndikatorSasaran',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_iku_opd_sasaran': $('#id_iku_pemda_rinci').val(),
            'flag_iku': $('#flag_iku_rinci').val(),
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

$(document).on('click', '.btnDetailIndikatorProgram', function() {
var data = tblInProgram.row( $(this).parents('tr') ).data();
    $('.btnSimpanProgramIndikator').removeClass('addProgramIndikator');
    $('.btnSimpanProgramIndikator').addClass('editProgramIndikator');
  $('.modal-title').text('Data Indikator Kinerja Program Perangkat Daerah');
  $('.form-horizontal').show();
    $('#id_iku_opd_program_rinci').val(data.id_iku_opd_program);
    $('#id_iku_sasaran_rinci').val(data.id_iku_opd_sasaran);
    $('#id_indikator_program_renstra_rinci').val(data.id_indikator_program_renstra);
    $('#nm_indikator_program_rinci').val(data.nm_indikator);
    $('#target_program_rinci').val(data.angka_akhir_periode);
    $('#satuan_program_rinci').val(data.uraian_satuan);
    $('#type_indikator_program_rinci').val(data.sifat_indikator_display);
    $('#metode_ukur_program_rinci').val(data.metode_penghitungan,);
    $('#sumber_data_ukur_program_rinci').val(data.sumber_data_indikator);
    $('#jenis_indikator_program_rinci').val(data.kualitas_indikator_display);
    $('#sifat_indikator_program_rinci').val(data.jenis_indikator_display);
    $('#tipe_indikator_program_rinci').val(data.type_indikator_display);
    $('#flag_iku_rinci_program').val(data.flag_iku);
    if(data.flag_iku == 0){
        $('#flag_iku_rinci_program_1').removeClass('active').addClass('notActive');
        $('#flag_iku_rinci_program_0').addClass('active').removeClass('notActive');
    } else {
        $('#flag_iku_rinci_program_0').removeClass('active').addClass('notActive');
        $('#flag_iku_rinci_program_1').addClass('active').removeClass('notActive');
    }
    $('#unit_esl3').val(data.id_esl3);
    $('#ModalIndikatorProgram').modal('show');
});

$('.modal-footer').on('click', '.editProgramIndikator', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './opd/editIndikatorProgram',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_iku_opd_program': $('#id_iku_opd_program_rinci').val(),
            'flag_iku': $('#flag_iku_rinci_program').val(),
            'id_esl3': $('#unit_esl3').val(),
        },
        success: function(data) {
            $('#tblProgram').DataTable().ajax.reload(null,false);
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }

        }
    });
});

$(document).on('click', '.btnDetailIndikatorKegiatan', function() {
var data = tblInKegiatan.row( $(this).parents('tr') ).data();
    $('.btnSimpanKegiatanIndikator').removeClass('addKegiatanIndikator');
    $('.btnSimpanKegiatanIndikator').addClass('editKegiatanIndikator');
  $('.modal-title').text('Data Indikator Kinerja Kegiatan Perangkat Daerah');
  $('.form-horizontal').show();
    $('#id_iku_opd_kegiatan_rinci').val(data.id_iku_opd_kegiatan);
    $('#id_iku_program_rinci').val(data.id_iku_opd_program);
    $('#id_indikator_kegiatan_renstra_rinci').val(data.id_indikator_kegiatan_renstra);
    $('#nm_indikator_kegiatan_rinci').val(data.nm_indikator);
    $('#target_kegiatan_rinci').val(data.angka_akhir_periode);
    $('#satuan_kegiatan_rinci').val(data.uraian_satuan);
    $('#type_indikator_kegiatan_rinci').val(data.sifat_indikator_display);
    $('#metode_ukur_kegiatan_rinci').val(data.metode_penghitungan,);
    $('#sumber_data_ukur_kegiatan_rinci').val(data.sumber_data_indikator);
    $('#jenis_indikator_kegiatan_rinci').val(data.kualitas_indikator_display);
    $('#sifat_indikator_kegiatan_rinci').val(data.jenis_indikator_display);
    $('#tipe_indikator_kegiatan_rinci').val(data.type_indikator_display);
    $('#flag_iku_rinci_kegiatan').val(data.flag_iku);
    if(data.flag_iku == 0){
        $('#flag_iku_rinci_kegiatan_1').removeClass('active').addClass('notActive');
        $('#flag_iku_rinci_kegiatan_0').addClass('active').removeClass('notActive');
    } else {
        $('#flag_iku_rinci_kegiatan_0').removeClass('active').addClass('notActive');
        $('#flag_iku_rinci_kegiatan_1').addClass('active').removeClass('notActive');
    };
    $('#unit_esl4').val(data.id_esl4);
    $('#ModalIndikatorKegiatan').modal('show');
});

$('.modal-footer').on('click', '.editKegiatanIndikator', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './opd/editIndikatorKegiatan',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_iku_opd_kegiatan': $('#id_iku_opd_kegiatan_rinci').val(),
            'flag_iku': $('#flag_iku_rinci_kegiatan').val(),
            'id_esl4': $('#unit_esl4').val(),
        },
        success: function(data) {
            $('#tblKegiatan').DataTable().ajax.reload(null,false);
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }

        }
    });
});


}); //end file