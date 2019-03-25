$(document).ready(function() {

  var detInSasaran = Handlebars.compile($("#details-inSasaran").html());
  var detInProgram = Handlebars.compile($("#details-inProgram").html());
  var detInKegiatan = Handlebars.compile($("#details-inKegiatan").html());

  var id_sasaran_renstra, id_indikator_sasaran_strategis;
  var id_program_renstra, id_indikator_program_renstra;
  var id_kegiatan_renstra, id_indikator_kegiatan_renstra;
  var id_pelaksana_kegiatan_renstra;
  var id_hasil_program_temp, id_indikator_hasil_program_temp;
  var id_hasil_kegiatan_temp, id_indikator_hasil_kegiatan_temp;

  var tbl_Sasaran, tblInSasaran;
  var tbl_SasaranProgram;
  var tbl_SasaranKegiatan;
  var tbl_Program, tblInProgram;
  var tbl_Kegiatan, tblInKegiatan;
  var cariItemRenstra, cariItemIndikator;

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

  $('[data-toggle="popover"]').popover();
  $('.number').number(true,4,',', '.');

  $('.page-alert .close').click(function(e) {
    e.preventDefault();
    $(this).closest('.page-alert').slideUp();
  });

  $('.display').DataTable({
    responsive: true,
    dom : 'bfrtip',                  
    autoWidth : false,
    bDestroy: true,
  }); 

  $.ajax({
      type: "GET",
      url: './admin/parameter/getUnitUser',
      dataType: "json",

      success: function(data) {

            var j = data.length;
            var post, i;

            $('select[name="id_unit"]').empty();
            $('select[name="id_unit"]').append('<option value="-1">---Pilih Unit---</option>');

            for (i = 0; i < j; i++) {
              post = data[i];
              $('select[name="id_unit"]').append('<option value="'+ post.id_unit +'">'+ post.nm_unit +'</option>');
            }
            }
  });

  function loadTblSasaran($data) {
    tbl_Sasaran = $('#tblSasaran').DataTable( {
            processing: true,
            serverSide: true,
            responsive: true,
            dom : 'bfrtip',                  
            autoWidth : false,
            order: [[0, 'asc']],
            bDestroy: true,
            language: {
                  "decimal": ",",
                  "thousands": "."},
            "ajax": {"url": "cascading/getSasaranRenstra/"+$data},
            "columns": [
                  {
                    "className":      'details-control',
                    "orderable":      false,
                    "searchable":      false,
                    "data":           null,
                    "defaultContent": '',
                    "width" : "5px"
                  },
                  { data: 'no_urut', sClass: "dt-center"},
                  { data: 'kd_sasaran', sClass: "dt-center"},
                  { data: 'uraian_sasaran_renstra'},
                  { data: 'jml_sasaran',
                      render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
                  { data: 'jml_mapping',
                      render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
                ],
                    "bDestroy": true
      });
    };

    function initInSasaran(tableId, data) {
        tblInSasaran=$('#' + tableId).DataTable({
                processing: true,
                serverSide: true,
                ajax: data.details_url,
                dom : 'bfrtip',
                autoWidth: false,
                "language": {
                          "decimal": ",",
                          "thousands": "."},
                "columns": [
                            { data: 'urut', sClass: "dt-center"},
                            { data: 'nm_indikator'}
                          ],
                "order": [[0, 'asc']],
                "bDestroy": true
            })
    };

    function loadTblSasaranProgram($data) {
    tbl_SasaranProgram = $('#tblSasaranProgram').DataTable( {
            processing: true,
            serverSide: true,
            responsive: true,
            dom : 'bfrtip',                  
            autoWidth : false,
            order: [[0, 'asc']],
            bDestroy: true,
            language: {
                  "decimal": ",",
                  "thousands": "."},
            "ajax": {"url": "cascading/getSasaranProgram/"+$data},
            "columns": [
                  {
                    "className":      'details-control',
                    "orderable":      false,
                    "searchable":      false,
                    "data":           null,
                    "defaultContent": '',
                    "width" : "5px"
                  },
                  { data: 'no_urut', sClass: "dt-center"},
                  { data: 'kd_program_ref', sClass: "dt-center"},
                  { data: 'kd_program', sClass: "dt-center"},
                  { data: 'uraian_program_renstra'},
                  { data: 'uraian_hasil_program'},
                  { data: 'jml_indikator',
                      render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},                  
                  { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
                ],
                    "bDestroy": true
      });
    };

    function initInProgram(tableId, data) {
        tblInProgram=$('#' + tableId).DataTable({
                processing: true,
                serverSide: true,
                ajax: data.details_url,
                dom : 'bfrtip',
                autoWidth: false,
                "language": {
                          "decimal": ",",
                          "thousands": "."},
                "columns": [
                            { data: 'urut', sClass: "dt-center"},
                            { data: 'nm_indikator'},
                            { data: 'action'}
                          ],
                "order": [[0, 'asc']],
                "bDestroy": true
            })
    };

    function loadTblSasaranKegiatan($data) {
    tbl_SasaranKegiatan = $('#tblSasaranKegiatan').DataTable( {
            processing: true,
            serverSide: true,
            responsive: true,
            dom : 'bfrtip',                  
            autoWidth : false,
            order: [[0, 'asc']],
            bDestroy: true,
            language: {
                  "decimal": ",",
                  "thousands": "."},
            "ajax": {"url": "cascading/getSasaranKegiatan/"+$data},
            "columns": [
                  {
                    "className":      'details-control',
                    "orderable":      false,
                    "searchable":      false,
                    "data":           null,
                    "defaultContent": '',
                    "width" : "5px"
                  },
                  { data: 'no_urut', sClass: "dt-center"},
                  { data: 'kd_kegiatan_ref', sClass: "dt-center"},
                  { data: 'kd_kegiatan', sClass: "dt-center"},
                  { data: 'uraian_kegiatan_renstra'},
                  { data: 'uraian_hasil_kegiatan'},
                  { data: 'jml_indikator',
                      render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},                  
                  { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
                ],
                    "bDestroy": true
      });
    };

    function initInKegiatan(tableId, data) {
        tblInKegiatan=$('#' + tableId).DataTable({
                processing: true,
                serverSide: true,
                ajax: data.details_url,
                dom : 'bfrtip',
                autoWidth: false,
                "language": {
                          "decimal": ",",
                          "thousands": "."},
                "columns": [
                            { data: 'urut', sClass: "dt-center"},
                            { data: 'nm_indikator'},
                            { data: 'action'}
                          ],
                "order": [[0, 'asc']],
                "bDestroy": true
            })
    };

  $('#tblSasaran tbody').on('click', 'td.details-control', function () {
      var tr = $(this).closest('tr');
      var row = tbl_Sasaran.row( tr );
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

$('#tblSasaranProgram tbody').on('click', 'td.details-control', function () {
      var tr = $(this).closest('tr');
      var row = tbl_SasaranProgram.row( tr );
      var tableId = 'inProgram-' + row.data().id_hasil_program;

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

$('#tblSasaranKegiatan tbody').on('click', 'td.details-control', function () {
      var tr = $(this).closest('tr');
      var row = tbl_SasaranKegiatan.row( tr );
      var tableId = 'inKegiatan-' + row.data().id_hasil_kegiatan;

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

$( ".cbUnit" ).change(function() {
      id_unit_renstra =  $('.cbUnit').val();
      loadTblSasaran(id_unit_renstra);
});

$('#tblSasaran tbody').on( 'dblclick', 'tr', function () {
    var data = tbl_Sasaran.row(this).data();
    id_sasaran_renstra =  data.id_sasaran_renstra;
    $('.nav-tabs a[href="#program"]').tab('show');
    $('#ur_sasaran_strategis_prog').val(data.uraian_sasaran_renstra);
    $('#ur_sasaran_strategis_keg').val(data.uraian_sasaran_renstra);
    loadTblSasaranProgram(id_sasaran_renstra);
});

$('#tblSasaranProgram tbody').on( 'dblclick', 'tr', function () {
    var data = tbl_SasaranProgram.row(this).data();
    id_hasil_program_temp =  data.id_hasil_program;    
    id_program_renstra =  data.id_renstra_program;
    $('.nav-tabs a[href="#kegiatan"]').tab('show');
    $('#ur_sasaran_program_keg').val(data.uraian_hasil_program)
    loadTblSasaranKegiatan(id_hasil_program_temp);
});

$(document).on('click', '.btnCariProgramRenstra', function() {    
    $('#judulModal').text('Daftar Program Renstra OPD ybs');    
    $('#CariItemRenstra').modal('show');

    cariItemRenstra = $('#tblCariItemRenstra').DataTable( {
        processing: true,
        serverSide: true,
        dom: 'bfrtIp',
        autoWidth : false,
        "ajax": {"url": "./cascading/getProgramRenstra/"+id_sasaran_renstra},
        "columns": [
              { data: 'no_urut'},
              { data: 'kd_program'},
              { data: 'kd_program_ref'},
              { data: 'uraian_program_renstra'},
            ],
        "order": [[0, 'asc']],
        "bDestroy": true
    });
});

$(document).on('click', '.btnCariKegiatanRenstra', function() {    
    $('#judulModal').text('Daftar Kegiatan Renstra OPD ybs');    
    $('#CariItemRenstra').modal('show');

    cariItemRenstra = $('#tblCariItemRenstra').DataTable( {
        processing: true,
        serverSide: true,
        dom: 'bfrtIp',
        autoWidth : false,
        "ajax": {"url": "./cascading/getKegiatanRenstra/"+id_program_renstra},
        "columns": [
              { data: 'no_urut'},
              { data: 'kd_kegiatan'},
              { data: 'kd_kegiatan_ref'},
              { data: 'uraian_kegiatan_renstra'},
            ],
        "order": [[0, 'asc']],
        "bDestroy": true
    });
});

$('#tblCariItemRenstra tbody').on( 'dblclick', 'tr', function () {
    var data = cariItemRenstra.row(this).data();
    if (data.flag==0){
        document.getElementById("kd_program_edit").value = data.kd_program;
        document.getElementById("id_program_renstra_edit").value = data.id_program_renstra;
        document.getElementById("ur_program_renstra_edit").value = data.uraian_program_renstra;
    } else {
        document.getElementById("kd_kegiatan_edit").value = data.kd_kegiatan;
        document.getElementById("id_kegiatan_renstra_edit").value = data.id_kegiatan_renstra;
        document.getElementById("ur_kegiatan_renstra_edit").value = data.uraian_kegiatan_renstra;
    }
    $('#CariItemRenstra').modal('hide');    
  });

$(document).on('click', '.btnTambahHSP', function() {
    $('.btnSimpanProgram').addClass('addHasilProgram');
    $('.btnSimpanProgram').removeClass('editHasilProgram');
    $('.modal-title').text('Data Sasaran Program Perangkat Daerah');
    $('.form-horizontal').show();
    $('#id_hasil_program_edit').val(null);
    $('#id_unit_program_edit').val(id_unit_renstra);
    $('#id_sasaran_renstra_program_edit').val(id_sasaran_renstra);
    $('#ur_sasaran_program_renstra_edit').val(null);
    $('#id_program_renstra_edit').val(null);
    $('#kd_program_edit').val(null);
    $('#ur_program_renstra_edit').val(null);
    $('#ModalSasaranProgram').modal('show');
});

$('.modal-footer').on('click', '.addHasilProgram', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './cascading/addHasilProgram',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_unit' : $('#id_unit_program_edit').val(),
            'id_renstra_sasaran' : $('#id_sasaran_renstra_program_edit').val(),
            'id_renstra_program' : $('#id_program_renstra_edit').val(),
            'uraian_hasil_program' : $('#ur_sasaran_program_renstra_edit').val(),
        },
        success: function(data) {
            $('#tblSasaran').DataTable().ajax.reload(null,false);
            $('#tblSasaranProgram').DataTable().ajax.reload(null,false);
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }
        }
    });
});

$(document).on('click', '.btnEditHSP', function() {
    var data = tbl_SasaranProgram.row($(this).parents('tr') ).data();
    $('.btnSimpanProgram').removeClass('addHasilProgram');
    $('.btnSimpanProgram').addClass('editHasilProgram');
    $('.modal-title').text('Data Sasaran Program Perangkat Daerah');
    $('.form-horizontal').show();
    $('#id_hasil_program_edit').val(data.id_hasil_program);
    $('#id_unit_program_edit').val(data.id_unit);
    $('#id_sasaran_renstra_program_edit').val(data.id_renstra_sasaran);
    $('#ur_sasaran_program_renstra_edit').val(data.uraian_hasil_program);
    $('#id_program_renstra_edit').val(data.id_renstra_program);
    $('#kd_program_edit').val(data.kd_program);
    $('#ur_program_renstra_edit').val(data.uraian_program_renstra);
    $('#ModalSasaranProgram').modal('show');
});

$('.modal-footer').on('click', '.editHasilProgram', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './cascading/editHasilProgram',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_hasil_program' : $('#id_hasil_program_edit').val(),
            'id_unit' : $('#id_unit_program_edit').val(),
            'id_renstra_sasaran' : $('#id_sasaran_renstra_program_edit').val(),
            'id_renstra_program' : $('#id_program_renstra_edit').val(),
            'uraian_hasil_program' : $('#ur_sasaran_program_renstra_edit').val(),
        },
        success: function(data) {
            $('#tblSasaran').DataTable().ajax.reload(null,false);
            $('#tblSasaranProgram').DataTable().ajax.reload(null,false);
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }
        }
    });
});

$(document).on('click', '.btnHapusHSP', function() {
  var data = tbl_SasaranProgram.row($(this).parents('tr') ).data();
  $('#id_hasil_program_hapus').val(data.id_hasil_program);
  $('#ur_hasil_program_hapus').text(data.uraian_hasil_program);  
  $('#HapusProgram').modal('show');
});

$(document).on('click', '.btnDelProgramRenstra', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      type: 'post',
      url: './cascading/delHasilProgram',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_hasil_program': $('#id_hasil_program_hapus').val()
      },
      success: function(data) {
        $('#tblSasaran').DataTable().ajax.reload(null,false);
        $('#tblSasaranProgram').DataTable().ajax.reload(null,false);
        createPesan(data.pesan,"info");
      }
    });
});

$(document).on('click', '.btnCariIndiProg', function() {    
    $('#judulModal').text('Daftar Indikator Program Renstra OPD ybs');    
    $('#CariItemIndikator').modal('show');

    cariItemIndikator = $('#tblCariItemIndikator').DataTable( {
        processing: true,
        serverSide: true,
        dom: 'bfrtIp',
        autoWidth : false,
        "ajax": {"url": "./cascading/getProgramIndikatorRenstra/"+id_program_renstra},
        "columns": [
              { data: 'no_urut'},
              { data: 'nm_indikator'},
              { data: 'nama_satuan'},
            ],
        "order": [[0, 'asc']],
        "bDestroy": true
    });
});

$(document).on('click', '.btnCariIndiKeg', function() {    
    $('#judulModal').text('Daftar Indikator Kegiatan Renstra OPD ybs');    
    $('#CariItemIndikator').modal('show');

    cariItemIndikator = $('#tblCariItemIndikator').DataTable( {
        processing: true,
        serverSide: true,
        dom: 'bfrtIp',
        autoWidth : false,
        "ajax": {"url": "./cascading/getKegiatanIndikatorRenstra/"+id_kegiatan_renstra},
        "columns": [
              { data: 'no_urut'},
              { data: 'nm_indikator'},
              { data: 'nama_satuan'},
            ],
        "order": [[0, 'asc']],
        "bDestroy": true
    });
});

$('#tblCariItemIndikator tbody').on( 'dblclick', 'tr', function () {
    var data = cariItemIndikator.row(this).data();
    if(data.flag==0){
        document.getElementById("ur_indikator_program_renstra").value = data.nm_indikator;
        document.getElementById("kd_indikator_program_renstra").value = data.id_indikator_program_renstra;
        document.getElementById("satuan_program_indikator_edit").value = data.nama_satuan;
      } else {
        document.getElementById("ur_indikator_kegiatan_renstra").value = data.nm_indikator;
        document.getElementById("kd_indikator_kegiatan_renstra").value = data.id_indikator_kegiatan_renstra;
        document.getElementById("satuan_kegiatan_indikator_edit").value = data.nama_satuan;
      }
    $('#CariItemIndikator').modal('hide');    
  });

$(document).on('click', '.btnTambahIndikatorHSP', function() {
    var data = tbl_SasaranProgram.row($(this).parents('tr') ).data();
    id_program_renstra = data.id_renstra_program
    $('.btnSimpanProgramIndikator').addClass('addHasilIndikatorProgram');
    $('.btnSimpanProgramIndikator').removeClass('editHasilIndikatorProgram');
    $('.modal-title').text('Data Indikator Sasaran Program Perangkat Daerah');
    $('.form-horizontal').show();
    $('#id_indikator_hasil_program_edit').val(null);
    $('#id_hasil_program_indikator').val(data.id_hasil_program);
    $('#ur_indikator_program_renstra').val(null);
    $('#kd_indikator_program_renstra').val(null);
    $('#satuan_program_indikator_edit').val(null);
    $('#ModalIndikatorProgram').modal('show');
});

$('.modal-footer').on('click', '.addHasilIndikatorProgram', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './cascading/addIndikatorProgram',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_renstra_program_indikator' : $('#kd_indikator_program_renstra').val(),
            'id_hasil_program' : $('#id_hasil_program_indikator').val(),
        },
        success: function(data) {
            tblInProgram.ajax.reload(null,false);
            $('#tblSasaranProgram').DataTable().ajax.reload(null,false);
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }
        }
    });
});

$(document).on('click', '.btnHapusIndikatorSasaran', function() {
  var data = tblInProgram.row($(this).parents('tr') ).data();
  $('#id_program_indikator_hapus').val(data.id_indikator_program_pd);
  $('#nm_program_indikator_hapus').text(data.nm_indikator);  
  $('#HapusProgramIndikatorModal').modal('show');
});

$(document).on('click', '.btnDelProgramIndikator', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      type: 'post',
      url: './cascading/delIndikatorProgram',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_indikator_program_pd': $('#id_program_indikator_hapus').val()
      },
      success: function(data) {
        tblInProgram.ajax.reload(null,false);
        $('#tblSasaranProgram').DataTable().ajax.reload(null,false);
        createPesan(data.pesan,"info");
      }
    });
});

$(document).on('click', '.btnTambahHSK', function() {
    $('.btnSimpanKegiatan').addClass('addHasilKegiatan');
    $('.btnSimpanKegiatan').removeClass('editHasilKegiatan');
    $('.modal-title').text('Data Sasaran Kegiatan Perangkat Daerah');
    $('.form-horizontal').show();
    $('#id_hasil_kegiatan_edit').val(null);
    $('#id_unit_kegiatan_edit').val(id_unit_renstra);
    $('#id_hasil_program_kegiatan_edit').val(id_hasil_program_temp);
    $('#ur_sasaran_kegiatan_renstra_edit').val(null);
    $('#kd_kegiatan_edit').val(null);
    $('#id_kegiatan_renstra_edit').val(null);
    $('#ur_kegiatan_renstra_edit').val(null);
    $('#ModalSasaranKegiatan').modal('show');
});

$('.modal-footer').on('click', '.addHasilKegiatan', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './cascading/addHasilKegiatan',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_unit' : $('#id_unit_kegiatan_edit').val(),
            'id_hasil_program' : $('#id_hasil_program_kegiatan_edit').val(),
            'id_renstra_kegiatan' : $('#id_kegiatan_renstra_edit').val(),
            'uraian_hasil_kegiatan' : $('#ur_sasaran_kegiatan_renstra_edit').val(),
        },
        success: function(data) {
            $('#tblSasaranKegiatan').DataTable().ajax.reload(null,false);
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }
        }
    });
});

$(document).on('click', '.btnEditHSK', function() {
    var data = tbl_SasaranKegiatan.row($(this).parents('tr') ).data();
    $('.btnSimpanKegiatan').removeClass('addHasilKegiatan');
    $('.btnSimpanKegiatan').addClass('editHasilKegiatan');
    $('.modal-title').text('Data Sasaran Kegiatan Perangkat Daerah');
    $('.form-horizontal').show();
    $('#id_hasil_kegiatan_edit').val(data.id_hasil_kegiatan);
    $('#id_unit_kegiatan_edit').val(data.id_unit);
    $('#id_hasil_program_kegiatan_edit').val(data.id_hasil_program);
    $('#ur_sasaran_kegiatan_renstra_edit').val(data.uraian_hasil_kegiatan);
    $('#kd_kegiatan_edit').val(data.kd_kegiatan);
    $('#id_kegiatan_renstra_edit').val(data.id_renstra_kegiatan);
    $('#ur_kegiatan_renstra_edit').val(data.uraian_kegiatan_renstra);
    $('#ModalSasaranKegiatan').modal('show');
});

$('.modal-footer').on('click', '.editHasilKegiatan', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './cascading/editHasilKegiatan',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_hasil_kegiatan' : $('#id_hasil_kegiatan_edit').val(),
            'id_unit' : $('#id_unit_kegiatan_edit').val(),
            'id_hasil_program' : $('#id_hasil_program_kegiatan_edit').val(),
            'id_renstra_kegiatan' : $('#id_kegiatan_renstra_edit').val(),
            'uraian_hasil_kegiatan' : $('#ur_sasaran_kegiatan_renstra_edit').val(),
        },
        success: function(data) {
            $('#tblSasaranKegiatan').DataTable().ajax.reload(null,false);
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }
        }
    });
});

$(document).on('click', '.btnHapusHSK', function() {
  var data = tbl_SasaranKegiatan.row($(this).parents('tr') ).data();
  $('#id_hasil_kegiatan_hapus').val(data.id_hasil_kegiatan);
  $('#ur_hasil_kegiatan_hapus').text(data.uraian_hasil_kegiatan);  
  $('#HapusKegiatan').modal('show');
});

$(document).on('click', '.btnDelProgramRenstra', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      type: 'post',
      url: './cascading/delHasilKegiatan',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_hasil_kegiatan': $('#id_hasil_kegiatan_hapus').val()
      },
      success: function(data) {
        $('#tblSasaranKegiatan').DataTable().ajax.reload(null,false);
        createPesan(data.pesan,"info");
      }
    });
});

$(document).on('click', '.btnTambahIndikatorHSK', function() {
    var data = tbl_SasaranKegiatan.row($(this).parents('tr') ).data();
    id_kegiatan_renstra = data.id_renstra_kegiatan
    $('.btnSimpanKegiatanIndikator').addClass('addHasilIndikatorKegiatan');
    $('.btnSimpanKegiatanIndikator').removeClass('editHasilIndikatorKegiatan');
    $('.modal-title').text('Data Indikator Sasaran Kegiatan Perangkat Daerah');
    $('.form-horizontal').show();
    $('#id_indikator_hasil_kegiatan_edit').val(null);
    $('#id_hasil_kegiatan_indikator').val(data.id_hasil_kegiatan);
    $('#ur_indikator_kegiatan_renstra').val(null);
    $('#kd_indikator_kegiatan_renstra').val(null);
    $('#satuan_kegiatan_indikator_edit').val(null);
    $('#ModalIndikatorKegiatan').modal('show');
});

$('.modal-footer').on('click', '.addHasilIndikatorKegiatan', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './cascading/addIndikatorKegiatan',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_renstra_kegiatan_indikator' : $('#kd_indikator_kegiatan_renstra').val(),
            'id_hasil_kegiatan' : $('#id_hasil_kegiatan_indikator').val(),
        },
        success: function(data) {
            tblInKegiatan.ajax.reload(null,false);
            $('#tblSasaranKegiatan').DataTable().ajax.reload(null,false);
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }
        }
    });
});

$(document).on('click', '.btnHapusIndikatorHSK', function() {
  var data = tblInKegiatan.row($(this).parents('tr') ).data();
  $('#id_kegiatan_indikator_hapus').val(data.id_indikator_kegiatan_pd);
  $('#nm_kegiatan_indikator_hapus').text(data.nm_indikator);  
  $('#HapusKegiatanIndikatorModal').modal('show');
});

$(document).on('click', '.btnDelKegiatanIndikator', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      type: 'post',
      url: './cascading/delIndikatorKegiatan',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_indikator_kegiatan_pd': $('#id_kegiatan_indikator_hapus').val()
      },
      success: function(data) {
        tblInKegiatan.ajax.reload(null,false);
        $('#tblSasaranKegiatan').DataTable().ajax.reload(null,false);
        createPesan(data.pesan,"info");
      }
    });
});

});  //end file