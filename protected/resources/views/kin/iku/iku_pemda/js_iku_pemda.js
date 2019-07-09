$(document).ready(function() {
  
  
  var detInSasaran = Handlebars.compile($("#details-inSasaran").html());

  var id_dokumen_temp;
  var id_rpjmd_temp;
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

function loadgetUnit($id_rpjmd){
  vars = "?id="     + $id_rpjmd;
  $.ajax({
          type: "GET",
          url: './iku/getUnit'+ vars,
          dataType: "json",
          success: function(data) {
            var j = data.length;
            var post, i;

            $('select[name="unit_penanggungjawab"]').empty();
            $('select[name="unit_penanggungjawab"]').append('<option value="0">---Unit Belum Dipilih---</option>');

            for (i = 0; i < j; i++) {
              post = data[i];
              $('select[name="unit_penanggungjawab"]').append('<option value="'+ post.id_unit +'">'+ post.nm_unit +'</option>');
            }
          }
      });
}

$.ajax({
    type: "GET",
    url: './cetak/getDokumenRpjmd',
    dataType: "json",
    success: function(data) {
        var j = data.length;
        var post, i;

        $('select[name="cb_no_perda"]').empty();
        $('select[name="cb_no_perda"]').append('<option value="-1">Pilih Nomor Perda RPJMD</option>');

        for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="cb_no_perda"]').append('<option value="'+ post.id_rpjmd +'">'+ post.no_perda +'</option>');

        }
    }
});

var tblDokPerkin
function loadDokumen() {
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
          "ajax": {"url": "./iku/getDokumen"},
          "columns": [
                { data: 'no_urut', sClass: "dt-center"},
                { data: 'no_dokumen', sClass: "dt-center"},
                { data: 'uraian_dokumen'},
                { data: 'action', 'searchable': false, 'orderable':false }
              ]
        });

      }

loadDokumen();

$('#tblDokPerkin tbody').on( 'dblclick', 'tr', function () {
  var data = tblDokPerkin.row(this).data();
    id_dokumen_temp =  data.id_dokumen;
    id_rpjmd_temp = data.id_rpjmd;

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
                "thousands": ".",              
                "emptyTable":     "Data Kosong",
                "info":           "Jumlah _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty":      "Jumlah 0 to 0 of 0 baris",
                "loadingRecords": "Loading...",
                "processing":     "Processing...",
                "search":         "Search:",
                "zeroRecords":    "Tidak Ada Data yang ditampilkan",
                "paginate": {
                    "first":      "Pertama",
                    "last":       "Terakhir",
                    "next":       "Selanjutnya",
                    "previous":   "Sebelumnya"}
                  },
          "ajax": {"url": "./iku/getSasaran/"+$id_dokumen},
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
                { data: 'uraian_sasaran_rpjmd'},
                { data: 'jml_indikator_iku', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
                { data: 'jml_indikator_non', 
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
              ]
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
                              return  ' <span style="font-size:16px;color:'+row.warna+';">'+row.flag_display +'</span>';
                            }},
                            { data: 'nama_unit', sClass: "dt-center"},
                            { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
                          ],
                "order": [[0, 'asc']],
                "bDestroy": true
            })
    }

  $('#tblSasaran tbody').on('click', 'td.details-control', function () {
      var tr = $(this).closest('tr');
      var row = tblSasaran.row( tr );      
      loadgetUnit(row.data().id_sasaran_rpjmd);
      var tableId = 'inSasaran-' + row.data().id_sasaran_rpjmd;

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
  
  $('#tgl_iku_dok_x').datepicker({
    altField: "#tgl_iku_dok",
    altFormat: "yy-mm-dd", 
    dateFormat: "dd MM yy",
  });

  $('#btn').click(function() {
    $("#tgl_iku_dok_x").focus();
  });


  $(document).on('click', '.btnProsesSasaran', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './iku/transIndikatorSasaran',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_dokumen': id_dokumen_temp,
            'id_rpjmd': id_rpjmd_temp,
        },
        success: function(data) {
            // tblSasaran.ajax.reload(null,false);
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
    $('.modal-title').text('Tambah Dokumen Indikator Kinerja Utama Pemerintah Daerah');
    $('.form-horizontal').show();
    $('#btnDokumen').show();
    $('#id_iku_dok').val(null);
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
        url: './iku/addDokumen',
        data: {
            '_token': $('input[name=_token]').val(),
            'no_dokumen': $('#no_iku_dok').val(),
            'tgl_dokumen': $('#tgl_iku_dok').val(),
            'uraian_dokumen': $('#uraian_iku_dok').val(),
            'id_rpjmd': $('#cb_no_perda').val(),  
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
    $('.modal-title').text('Detail Dokumen Indikator Kinerja Utama Pemerintah Daerah');
    $('.form-horizontal').show();
    $('#btnDokumen').show();
    $('#id_iku_dok').val(data.id_dokumen);
    $('#no_iku_dok').val(data.no_dokumen);
    $('#tgl_iku_dok').val(data.tgl_dokumen);
    $('#tgl_iku_dok_x').val(formatTgl(data.tgl_dokumen));
    $('#cb_no_perda').val(data.id_rpjmd);
    $('#uraian_iku_dok').val(data.uraian_dokumen);
    $('#ModalDokumen').modal('show');
});

$('.modal-footer').on('click', '.editDokumen', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './iku/editDokumen',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_dokumen': $('#id_iku_dok').val(),
            'no_dokumen': $('#no_iku_dok').val(),
            'tgl_dokumen': $('#tgl_iku_dok').val(),
            'uraian_dokumen': $('#uraian_iku_dok').val(),
            'id_rpjmd': $('#cb_no_perda').val(),       
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
      $('.modal-title').text('Hapus Dokumen Indikator Kinerja Utama Pemerintah Daerah');
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
        url: './iku/delDokumen',
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
    if(data.unit_penanggung_jawab < 1 || data.unit_penanggung_jawab == null){
        loadgetUnit(data.id_sasaran_rpjmd);
    };    
    $('.btnSimpanSasaranIndikator').removeClass('addSasaranIndikator');
    $('.btnSimpanSasaranIndikator').addClass('editSasaranIndikator');
  $('.modal-title').text('Data Indikator Sasaran Perangkat Daerah');
  $('.form-horizontal').show();
    $('#id_iku_pemda_rinci').val(data.id_iku_pemda);
    $('#id_dokumen_rinci').val(data.id_dokumen);
    $('#id_indikator_sasaran_rpjmd_rinci').val(data.id_indikator_sasaran_rpjmd);
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
    $('#unit_penanggungjawab').val(data.unit_penanggung_jawab);
    $('#ModalIndikatorSasaran').modal('show');
});

$('.modal-footer').on('click', '.editSasaranIndikator', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './iku/editIndikatorSasaran',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_iku_pemda': $('#id_iku_pemda_rinci').val(),
            'flag_iku': $('#flag_iku_rinci').val(),
            'unit_penanggung_jawab': $('#unit_penanggungjawab').val(),
        },
        success: function(data) {
            tblInSasaran.ajax.reload(null,false);
            tblSasaran.ajax.reload(null,false);
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }

        }
    });
});


  $('#radioBtn a').on('click', function(){
    var sel = $(this).data('title');
    var tog = $(this).data('toggle');
    $('#'+tog).prop('value', sel);
    
    $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
    $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
  });
 
}); //end file