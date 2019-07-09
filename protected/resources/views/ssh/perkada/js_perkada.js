$(document).ready(function() {

  function createPesan(message, type) {
    var html = '<div id="pesanx" class="alert alert-' + type + ' alert-dismissable flyover flyover-bottom in">';    
    html += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
    html += message;
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

  $('[data-toggle="popover"]').popover();

  var number = document.getElementById('rupiah_tarif');

// Listen for input event on numInput.
  number.onkeydown = function(e) {
      if(!((e.keyCode > 95 && e.keyCode < 106)
        || (e.keyCode > 47 && e.keyCode < 58) 
        || e.keyCode == 8 
        || e.keyCode == 188
        || e.keyCode == 9
        || e.keyCode == 190)) {
          return false;
      }
  }

  $('.number').number(true,0,'','.');
  $('#thn_perkada').number(true,0,'', '');
  $('#thn_perkada_edit').number(true,0,'', '');
  $('#rupiah_tarif').number(true,2,',', '.');

  $('#tgl_perkada').datepicker({
    altField: "#tgl_perkada1",
    altFormat: "yy-mm-dd", 
    dateFormat: "dd MM yy"
  });

  $('#tgl_perkada_edit').datepicker({
    altField: "#tgl_perkada1_edit",
    altFormat: "yy-mm-dd", 
    dateFormat: "dd MM yy"
  });

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

  var perkada = $('#tblPerkada').DataTable( {
      processing: true,
      serverSide: true,
      deferRender: true,
      responsive: true,
      dom: 'BFrtip',
        "ajax":  {"url": "./getPerkada"},
        "columns": [
            { data: 'nomor_perkada', sClass: "dt-center"},
            { data: 'tanggal_perkada', sClass: "dt-center",
              render: function (data) {
              var date = new Date(data);
              return date.getDate() + "-" + (date.getMonth()+1) + "-" + date.getFullYear();
            }},
            { data: 'uraian_perkada'},
            { data: 'tahun_berlaku', sClass: "dt-center"},
            { data: 'status_perkada', sClass: "dt-center"},
            { data: 'action', 'searchable': false, 'orderable':false , sClass: "dt-center"}
            ],
        "order": [[0, 'asc']],
        "bDestroy": true,
        "autoWidth": false
  } );

  var detailzona = $('#tblDetailZona').DataTable( {
        deferRender: true,
        processing: true,
        serverSide: true,
        responsive: true,
        dom: 'BFrtip',
        "ajax": {"url": "./getZona/0"},
        "columns": [
              { data: 'no_urut', sClass: "dt-center"},
              { data: 'id_zona', sClass: "dt-center"},
              { data: 'ur_zona'},
              { data: 'jml_item', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 0, '' )},
              { data: 'action', 'searchable': false, 'orderable':false , sClass: "dt-center"}
              ],
        "order": [[0, 'asc']],
        "bDestroy": true,
        "autoWidth": false
  });

var gol_tbl;
function LoadGolongan(id_zona){
  gol_tbl = $('#tblGolongan').DataTable( {
        processing: true,
        serverSide: true,
        deferRender: true,
        responsive: true,
        scrollCollapse: true,
        dom: 'BFrtip',
        "pagingType" : "input",
        "ajax": {"url": "./getGolPerkada/"+id_zona},
        "language": {
              "decimal": ",",
              "thousands": "."},
        "columns": [
              { data: 'no_urut', sClass: "dt-center"},
              { data: 'uraian_golongan_ssh'}
        ],
        "order": [[0, 'asc']],
        "bDestroy": true,
        "autoWidth": false
  });}

var kel_tbl;
function LoadKelompok(id_zona,id_gol){
  kel_tbl = $('#tblKelompok').DataTable( {
        processing: true,
        serverSide: true,
        deferRender: true,
        responsive: true,
        scrollCollapse: true,
        dom: 'BFrtip',
        "pagingType" : "input",
        "ajax": {"url": "./getKelPerkada/"+id_zona+"/"+id_gol},
        "language": {
              "decimal": ",",
              "thousands": "."},
        "columns": [
              { data: 'no_urut', sClass: "dt-center"},
              { data: 'uraian_kelompok_ssh'}
        ],
        "order": [[0, 'asc']],
        "bDestroy": true,
        "autoWidth": false
  });}

var skel_tbl;
function LoadSKelompok(id_zona,id_gol,id_kel){
  skel_tbl = $('#tblSubKelompok').DataTable( {
        processing: true,
        serverSide: true,
        deferRender: true,
        responsive: true,
        scrollCollapse: true,
        dom: 'BFrtip',
        "pagingType" : "input",
        "ajax": {"url": "./getSKelPerkada/"+id_zona+"/"+id_gol+"/"+id_kel},
        "language": {
              "decimal": ",",
              "thousands": "."},
        "columns": [
              { data: 'no_urut', sClass: "dt-center"},
              { data: 'uraian_sub_kelompok_ssh'}
        ],
        "order": [[0, 'asc']],
        "bDestroy": true,
        "autoWidth": false
  });}

var detailtarif_tbl;
function LoadItemSSH(id_zona,id_gol,id_kel,id_skel){
  detailtarif_tbl = $('#tblDetailTarif').DataTable( {
        processing: true,
        serverSide: true,
        deferRender: true,
        responsive: true,
        scrollCollapse: true,
        dom: 'BFrtip',
        "pagingType" : "input",
        "ajax": {"url": "./getTarifPerkada2/"+id_zona+"/"+id_gol+"/"+id_kel+"/"+id_skel},
        "language": {
              "decimal": ",",
              "thousands": "."},
        "columns": [
              { data: 'no_urut', sClass: "dt-center"},
              { data: 'no_tarif', sClass: "dt-center"},
              { data: 'ur_tarif'},
              { data: 'uraian_satuan', sClass: "dt-center"},
              { data: 'jml_rupiah', sClass: "dt-right",
                render: $.fn.dataTable.render.number( '.', ',', 0, 'Rp ' )},
              { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
        ],
        "order": [[0, 'asc']],
        "bDestroy": true,
        "autoWidth": false
  });}

var itemSSH
function LoadCariItem(param){
  itemSSH = $('#tblItemSSH').DataTable( {
        processing: true,
        serverSide: true,
        // dom: 'BFrtIp',
        "ajax": {"url": "./cariItemSSH/"+param},
        "columns": [
              { data: 'no_urut', sClass: "dt-center"},
              { data: 'uraian_sub_kelompok_ssh'},
              { data: 'uraian_tarif_ssh'},
              { data: 'keterangan_tarif_ssh'},
              { data: 'uraian_satuan', sClass: "dt-center"}
            ],
        "order": [[0, 'asc']],
        "bDestroy": true,
        "autoWidth": false
  });}



$(document).on('click', '#btnparam_cari', function() {
  if($('#param_cari').val()==""){
    param="a"
  } else {
    param=$('#param_cari').val();
  }

  LoadCariItem(param.toLowerCase());

});

  $('#tblItemSSH tbody').on( 'dblclick', 'tr', function () {

    var data = itemSSH.row(this).data();

    document.getElementById("id_item_perkada").value = data.id_tarif_ssh;
    document.getElementById("ur_item_perkada").value = data.uraian_tarif_ssh;

    $('#cariItemSSH').modal('hide');    

  } );  

  $(function () {
        $('#tgl_perkada').datepicker({
          // changeMonth: true,
          // changeYear: true,
          altField: "#tgl_perkada1",
          altFormat: "yy-mm-dd"
        });
        $( "#tgl_perkada" ).datepicker( "option", "dateFormat", "dd MM yy" );
      });

  $(function () {
      $('#tgl_perkada_edit').datepicker({
        altField: "#tgl_perkada1_edit",
        altFormat: "yy-mm-dd"
        });
      $( "#tgl_perkada_edit" ).datepicker( "option", "dateFormat", "dd MM yy" );
  });

  var id_sk_ssh,no_sk_ssh,id_zonassh,nm_zonassh,id_zona,nm_zona,flag_perkada,
  id_gol_ssh, nm_gol_ssh, id_kel_ssh, nm_kel_ssh, id_skel_ssh, nm_skel_ssh;

  if (flag_perkada == null && flag_perkada === undefined ){
    document.getElementById("divAddZona").style.visibility='hidden';
    document.getElementById("btnAddTarif").style.visibility='hidden';
    document.getElementById("btnCopyTarif").style.visibility='hidden';
  }

  $('#tblPerkada tbody').on('dblclick', 'tr', function () {
      
      var data = perkada.row( this ).data();

      // document.getElementById("nm_golongan_kel").innerHTML = nm_gol_ssh;
      
      id_sk_ssh =  data.id_perkada;
      no_sk_ssh = data.nomor_perkada;
      flag_perkada = data.flag;

      if (flag_perkada ==0 ){
        document.getElementById("divAddZona").style.visibility='visible';
      } else {
        document.getElementById("divAddZona").style.visibility='hidden';
      };

      document.getElementById("no_sk_ssh").innerHTML = no_sk_ssh;

      $('.nav-tabs a[href="#detailzona"]').tab('show');
      $('#tblDetailZona').DataTable().ajax.url("./getZona/"+id_sk_ssh).load();


    } );

  $('#tblDetailZona tbody').on('dblclick', 'tr', function () {
      
      var data = detailzona.row( this ).data();
      
      id_sk_ssh =  data.id_perkada;
      no_sk_ssh = data.no_perkada;
      flag_perkada = data.flag;
      id_zonassh =  data.id_zona_perkada;
      nm_zonassh = data.nama_zona;
      id_zona =  data.id_zona;
      nm_zona = data.ur_zona;

      // if (flag_perkada ==0 ){
      //   document.getElementById("btnCopyTarif").style.visibility='visible';
      //   document.getElementById("btnAddTarif").style.visibility='visible';
      // } else {
      //   document.getElementById("btnCopyTarif").style.visibility='hidden';
      //   document.getElementById("btnAddTarif").style.visibility='hidden';
      // };

      document.getElementById("no_sk_ssh_gol").innerHTML = no_sk_ssh;
      document.getElementById("nm_zona_gol").innerHTML = nm_zona;

      // $('.nav-tabs a[href="#detailtarif"]').tab('show');
      // $('#tblDetailTarif').DataTable().ajax.url("./getTarifPerkada/"+id_zonassh).load();
      $('.nav-tabs a[href="#golongan"]').tab('show');
      LoadGolongan(id_zonassh);

    });

    $('#tblGolongan tbody').on('dblclick', 'tr', function () {
      
      var data = gol_tbl.row( this ).data();
      
      id_gol_ssh =  data.id_golongan_ssh;
      nm_gol_ssh = data.uraian_golongan_ssh;

      document.getElementById("no_sk_ssh_kel").innerHTML = no_sk_ssh;
      document.getElementById("nm_zona_kel").innerHTML = nm_zona;
      document.getElementById("nm_gol_kel").innerHTML = nm_gol_ssh;
      
      $('.nav-tabs a[href="#kelompok"]').tab('show');
      LoadKelompok(id_zonassh,id_gol_ssh);

    });

    $('#tblKelompok tbody').on('dblclick', 'tr', function () {
      
      var data = kel_tbl.row( this ).data();
      
      id_kel_ssh =  data.id_kelompok_ssh;
      nm_kel_ssh = data.uraian_kelompok_ssh;

      document.getElementById("no_sk_ssh_skel").innerHTML = no_sk_ssh;
      document.getElementById("nm_zona_skel").innerHTML = nm_zona;
      document.getElementById("nm_gol_skel").innerHTML = nm_gol_ssh;
      document.getElementById("nm_kel_skel").innerHTML = nm_kel_ssh;
      
      $('.nav-tabs a[href="#subkelompok"]').tab('show');
      LoadSKelompok(id_zonassh,id_gol_ssh,id_kel_ssh);

    });

    $('#tblSubKelompok tbody').on('dblclick', 'tr', function () {
      
      var data = skel_tbl.row( this ).data();
      
      id_skel_ssh =  data.id_sub_kelompok_ssh;
      nm_skel_ssh = data.uraian_sub_kelompok_ssh;

      if (flag_perkada ==0 ){
        document.getElementById("btnCopyTarif").style.visibility='visible';
        document.getElementById("btnAddTarif").style.visibility='visible';
      } else {
        document.getElementById("btnCopyTarif").style.visibility='hidden';
        document.getElementById("btnAddTarif").style.visibility='hidden';
      };

      document.getElementById("no_sk_ssh_tarif").innerHTML = no_sk_ssh;
      document.getElementById("nm_zona_tarif").innerHTML = nm_zona;
      document.getElementById("nm_gol_tarif").innerHTML = nm_gol_ssh;
      document.getElementById("nm_kel_tarif").innerHTML = nm_kel_ssh;
      document.getElementById("nm_skel_tarif").innerHTML = nm_skel_ssh;

      $('.nav-tabs a[href="#detailtarif"]').tab('show');
      // $('#tblDetailTarif').DataTable().ajax.url("./getTarifPerkada/"+id_zonassh).load();
      LoadItemSSH(id_zonassh,id_gol_ssh,id_kel_ssh,id_skel_ssh);

    });

  //tambah perkada
  $(document).on('click', '.add-perkada', function() {
    $('#footer_action_button1').addClass('glyphicon-plus');
    $('#footer_action_button1').removeClass('glyphicon-trash');
    $('.actionBtn1').addClass('btn-success');
    $('.actionBtn1').removeClass('btn-danger');
    $('.actionBtn1').addClass('addPerkada');
    $('.modal-title').text('Tambah Data Peraturan Kepala Daerah tentang SSH');
    $('.form-horizontal').show();
    $('#TambahPerkada').modal('show');
  });

  $('.modal-footer').on('click', '.addPerkada', function() {
        $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });

        $.ajax({
          type: "GET",
          url: './getCountStatus/0',
          dataType: "json",
          success: function(data) {
            if (data[0].status_flag == 0 ){
              $.ajax({
                type: 'post',
                url: './addPerkada',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'no_perkada': $('#no_perkada').val(),
                    'tgl_perkada': $('#tgl_perkada1').val(),
                    'thn_perkada': $('#thn_perkada').val(),
                    'ur_perkada': $('#ur_perkada').val(),
                },
                success: function(data) {
                    if ((data.errors)){
                      $('.error').removeClass('hidden');
                    }
                    else {
                        $('.error').addClass('hidden');
                        $('#tblPerkada').DataTable().ajax.reload(null,false);
                        $('#tblPerkada').DataTable().page('last').draw('page');
                    }
                },
              });
            } else {
              $('#pesan').html('<div class="alert alert-danger col-md-12"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Maaf Status Draft Hanya Boleh Ada 1 buah, Silahkan Posting terlebih dahulu, atau diedit</div>');
              // alert("Maaf Status Draft Hanya Boleh Ada 1 buah, Silahkan Posting terlebih dahulu, atau diedit")
            }
          }
        });      
  });

  //Edit Rekening
  $(document).on('click', '.edit-perkada', function() {
    $('#footer_action_button').addClass('glyphicon-check');
    $('#footer_action_button').removeClass('glyphicon-trash');
    $('.actionBtn').addClass('btn-success');
    $('.actionBtn').removeClass('btn-danger');
    $('.actionBtn').addClass('editPerkada');
    $('.modal-title').text('Edit Data Peraturan Kepala Daerah tentang SSH');
    $('.form-horizontal').show();
    $('#no_perkada_edit').val($(this).data('no_perkada'));
    $('#tgl_perkada_edit').val(formatTgl($(this).data('tgl_perkada')));
    $('#tgl_perkada1_edit').val($(this).data('tgl_perkada'));
    $('#thn_perkada_edit').val($(this).data('thn_perkada'));
    $('#ur_perkada_edit').val($(this).data('ur_perkada'));
    $('#id_perkada_edit').val($(this).data('id_perkada'));
    $('#EditPerkada').modal('show');
  });

  $('.modal-footer').on('click', '.editPerkada', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: './editPerkada',
          data: {
              '_token': $('input[name=_token]').val(),
              'no_perkada_edit': $('#no_perkada_edit').val(),
              'tgl_perkada_edit': $('#tgl_perkada1_edit').val(),
              'thn_perkada_edit': $('#thn_perkada_edit').val(),
              'ur_perkada_edit': $('#ur_perkada_edit').val(),
              'id_perkada_edit': $('#id_perkada_edit').val(),
          },
          success: function(data) {
              $('#tblPerkada').DataTable().ajax.reload(null,false);
              if(data.status_pesan==1){
              $('#pesan').html('<div class="alert alert-success col-md-12"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+data.pesan+'</div>');
              } else {
              $('#pesan').html('<div class="alert alert-danger col-md-12"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+data.pesan+'</div>');  
              } 
          }
      });
  });

  //status Perkada
  $(document).on('click', '.edit-status', function() {
    $('#footer_action_button').addClass('glyphicon-check');
    $('#footer_action_button').removeClass('glyphicon-trash');
    $('.actionBtn').addClass('btn-primary');
    $('.actionBtn').removeClass('btn-danger');
    $('.actionBtn').addClass('editStatus');
    $('.modal-title').text('Posting Data Peraturan Kepala Daerah tentang SSH');
    $('.uraian').html($(this).data('no_perkada'));
    $('.id_perkada').text($(this).data('id_perkada'));
    $('.flag_perkada').text($(this).data('flag_perkada')+1);
    $('#StatusPerkada').modal('show');
  });

  $('.modal-footer').on('click', '.editStatus', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: './statusPerkada',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_perkada': $('.id_perkada').text(),
              'flag_perkada': $('.flag_perkada').text(),
          },
          success: function(data) {
              $('#tblPerkada').DataTable().ajax.reload(null,false);
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
              } else {
                createPesan(data.pesan,"alert"); 
              } 
          }
      });
  });

  //Hapus Perkada
  $(document).on('click', '.delete-perkada', function() {
    $('#footer_action_button').removeClass('glyphicon-check');
    $('#footer_action_button').addClass('glyphicon-trash');
    $('.actionBtn').removeClass('btn-success');
    $('.actionBtn').addClass('btn-danger');
    $('.actionBtn').addClass('delPerkada');
    $('.modal-title').text('Hapus Data Peraturan Kepala Daerah tentang SSH');
    $('.id_perkada_hapus').text($(this).data('id_perkada'));
    // $('.form-horizontal').hide();
    $('.uraian').html($(this).data('no_perkada'));
    $('#HapusPerkada').modal('show');
  });

  $('.modal-footer').on('click', '.delPerkada', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      type: 'post',
      url: './hapusPerkada',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_perkada_hapus': $('.id_perkada_hapus').text()
      },
      success: function(data) {
        $('.item' + $('.id_perkada_hapus').text()).remove();
        $('#tblPerkada').DataTable().ajax.reload(null,false);
        $('#pesan').html('<div class="alert alert-danger col-md-12"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+data.pesan+'</div>');
      }
    });
  });

  //tambah zona perkada
  $(document).on('click', '.add-zonaperkada', function() {
    $('#footer_action_button1').addClass('glyphicon-plus');
    $('#footer_action_button1').removeClass('glyphicon-trash');
    $('.actionBtn1').addClass('btn-success');
    $('.actionBtn1').removeClass('btn-danger');
    $('.actionBtn1').addClass('addzona');
    $('.modal-title').text('Tambah Data Zona Pemberlakuan SSH');
    $('.form-horizontal').show();
    $('#id_perkada_zona'). val(id_sk_ssh);
    document.getElementById("idperkada_zona").innerHTML = no_sk_ssh;
    $('#TambahZonaPerkada').modal('show');
  });

  $('.modal-footer').on('click', '.addzona', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: './addZonaPerkada',
          data: {
              '_token': $('input[name=_token]').val(),
              'no_urut': $('#no_urut_zona').val(),
              'id_perkada': $('#id_perkada_zona').val(),
              'id_zona': $('#id_zona_ssh').val(),
          },
          success: function(data) {
                  $('.error').addClass('hidden');
                  $('#tblDetailZona').DataTable().ajax.reload(null,false);
                  $('#tblDetailZona').DataTable().page('last').draw('page');
                  if(data.status_pesan==1){
                    $('#pesan').html('<div class="alert alert-success col-md-12"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+data.pesan+'</div>');
                  } else {
                    $('#pesan').html('<div class="alert alert-danger col-md-12"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+data.pesan+'</div>');  
                  } 
          },
      });
  });

  //Edit Zona Perkada
  $(document).on('click', '.edit-zona', function() {
    $('#footer_action_button').addClass('glyphicon-check');
    $('#footer_action_button').removeClass('glyphicon-trash');
    $('.actionBtn').addClass('btn-success');
    $('.actionBtn').removeClass('btn-danger');
    $('.actionBtn').addClass('editZonaPerkada');
    $('.modal-title').text('Edit Zona Pemberlakuan SSH');
    $('.form-horizontal').show();
    $('#id_perkada_zona_edit').val($(this).data('id_perkada'));
    document.getElementById("idperkada_zona_edit").innerHTML = no_sk_ssh;
    $('#no_urut_zona_edit').val($(this).data('no_urut'));
    $('#id_zona_ssh_edit').val($(this).data('id_zona'));
    $('#id_zona_perkada_edit').val($(this).data('id_zona_perkada'));
    $('#EditZonaPerkada').modal('show');
  });

  $('.modal-footer').on('click', '.editZonaPerkada', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: './editZonaPerkada',
          data: {
              '_token': $('input[name=_token]').val(),
              'no_urut': $('#no_urut_zona_edit').val(),
              'id_perkada': $('#id_perkada_zona_edit').val(),
              'id_zona': $('#id_zona_ssh_edit').val(),
              'id_zona_perkada': $('#id_zona_perkada_edit').val(),
          },
          success: function(data) {
              $('#tblDetailZona').DataTable().ajax.reload(null,false);
              if(data.status_pesan==1){
                $('#pesan').html('<div class="alert alert-success col-md-12"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+data.pesan+'</div>');
              } else {
                $('#pesan').html('<div class="alert alert-danger col-md-12"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+data.pesan+'</div>');  
              } 
          }
      });
  });

  //Hapus zona Perkada
  $(document).on('click', '.delete-zona', function() {
    $('#footer_action_button').removeClass('glyphicon-check');
    $('#footer_action_button').addClass('glyphicon-trash');
    $('.actionBtn').removeClass('btn-success');
    $('.actionBtn').addClass('btn-danger');
    $('.actionBtn').addClass('delZonaPerkada');
    $('.modal-title').text('Hapus Data Peraturan Kepala Daerah tentang SSH');
    $('.id_zona_perkada_hapus').text($(this).data('id_zona_perkada'));
    $('.uraian').html($(this).data('keterangan_zona'));
    $('.uraian1').html($(this).data('no_perkada'));
    $('#HapusZonaPerkada').modal('show');
  });

  $('.modal-footer').on('click', '.delZonaPerkada', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      type: 'post',
      url: './hapusZonaPerkada',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_zona_perkada': $('.id_zona_perkada_hapus').text()
      },
      success: function(data) {
        $('.item' + $('.id_zona_perkada_hapus').text()).remove();
        $('#tblDetailZona').DataTable().ajax.reload(null,false);
        $('#pesan').html('<div class="alert alert-danger col-md-12"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+data.pesan+'</div>');
      }
    });
  });

  $(document).on('click', '.btntambah-item', function() {
    var data = detailzona.row($(this).parents('tr') ).data();
    $('.btnTarif').addClass('btn-success');
    $('.btnTarif').removeClass('edittarif');
    $('.btnTarif').addClass('addtarif');
    $('.modal-title').text('Tambah Data Tarif Item SSH a');
    $('.form-horizontal').show();
    $('#id_perkada_tarif'). val(id_sk_ssh);
    document.getElementById("idperkada_tarif").innerHTML = no_sk_ssh;
    $('#id_zona_perkada'). val(data.id_zona_perkada);
    $('#id_zona_tarif'). val(data.id_zona);
    document.getElementById("idzona_tarif").innerHTML = data.ur_zona;
    $('#id_item_perkada'). val(null);
    $('#ur_item_perkada'). val(null);
    $('#no_urut_tarif').val(null);
    $('#rupiah_tarif').val(0);
    $('#ModalTarifPerkada').modal('show');
  });

  $(document).on('click', '.add-tarif', function() {
    // $('#nmbtnTarif').text(" Simpan");
    // $('#nmbtnTarif').addClass('glyphicon-plus');
    // $('#nmbtnTarif').removeClass('glyphicon-check');
    $('.btnTarif').addClass('btn-success');
    $('.btnTarif').removeClass('edittarif');
    $('.btnTarif').addClass('addtarif');
    $('.modal-title').text('Tambah Data Tarif Item SSH');
    $('.form-horizontal').show();
    $('#id_perkada_tarif'). val(id_sk_ssh);
    document.getElementById("idperkada_tarif").innerHTML = no_sk_ssh;
    $('#id_zona_perkada'). val(id_zonassh);
    $('#id_zona_tarif'). val(id_zona);
    document.getElementById("idzona_tarif").innerHTML = nm_zona;
    $('#id_item_perkada'). val(null);
    $('#ur_item_perkada'). val(null);
    $('#no_urut_tarif').val(null);
    $('#rupiah_tarif').val(0);
    $('#ModalTarifPerkada').modal('show');
  });

  $('.modal-footer').on('click', '.addtarif', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: './addTarifPerkada',
          data: {
              '_token': $('input[name=_token]').val(),
              'no_urut': $('#no_urut_tarif').val(),
              'id_tarif_ssh': $('#id_item_perkada').val(),
              'id_zona_perkada': $('#id_zona_perkada').val(),
              'jml_rupiah': $('#rupiah_tarif').val(),
          },

          success: function(data) {
              $('.nav-tabs a[href="#detailtarif"]').tab('show');
                  $('.error').addClass('hidden');
                  $('#tblDetailTarif').DataTable().ajax.reload(null,false);
                  $('#tblDetailTarif').DataTable().page('last').draw('page');
                  if(data.status_pesan==1){
                  $('#pesan').html('<div class="alert alert-success col-md-12"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+data.pesan+'</div>');
                  } else {
                  $('#pesan').html('<div class="alert alert-danger col-md-12"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+data.pesan+'</div>');  
                  }
          },
      });
  });

  //Edit Tarif Perkada
  $(document).on('click', '.edit-tarif', function() {
    var data = detailtarif_tbl.row( $(this).parents('tr') ).data();
    $('.btnTarif').addClass('btn-success');
    $('.btnTarif').removeClass('addtarif');
    $('.btnTarif').addClass('edittarif');
    $('.modal-title').text('Edit Data Tarif Item SSH');
    $('.form-horizontal').show();
    $('#id_tarif_perkada').val(data.id_tarif_perkada);
    $('#id_perkada_tarif').val(data.id_perkada);
    $('#id_zona_perkada').val(data.id_zona_perkada);
    $('#no_urut_tarif').val(data.no_tarif);
    $('#id_zona_tarif').val(data.id_zona);
    $('#id_item_perkada').val(data.id_tarif_ssh);
    $('#rupiah_tarif').val(data.jml_rupiah);
    $('#ur_item_perkada'). val(data.ur_tarif);
    document.getElementById("idperkada_tarif").innerHTML = no_sk_ssh;
    document.getElementById("idzona_tarif").innerHTML = nm_zona;
    $('#ModalTarifPerkada').modal('show');
  });

  $('.modal-footer').on('click', '.edittarif', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: './editTarifPerkada',
          data: {
              '_token': $('input[name=_token]').val(),
              'no_urut': $('#no_urut_tarif').val(),
              'id_tarif_ssh': $('#id_item_perkada').val(),
              'id_zona_perkada': $('#id_zona_perkada').val(),
              'id_tarif_perkada': $('#id_tarif_perkada').val(),
              'jml_rupiah': $('#rupiah_tarif').val(),
          },
          success: function(data) {
              $('#tblDetailTarif').DataTable().ajax.reload(null,false);
              if(data.status_pesan==1){
                $('#pesan').html('<div class="alert alert-success col-md-12"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+data.pesan+'</div>');
              } else {
                $('#pesan').html('<div class="alert alert-danger col-md-12"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+data.pesan+'</div>');  
              } 
          }
      });
  });

  //Hapus Tarif  Perkada
  $(document).on('click', '.delete-tarif', function() {
    $('#footer_action_button').removeClass('glyphicon-check');
    $('#footer_action_button').addClass('glyphicon-trash');
    $('.actionBtn').removeClass('btn-success');
    $('.actionBtn').addClass('btn-danger');
    $('.actionBtn').addClass('delTarifPerkada');
    $('.modal-title').text('Hapus Data Tarif SSH');
    $('.id_tarif_perkada_hapus').text($(this).data('id_tarif_perkada'));
    $('.uraian').html($(this).data('ur_tarif'));
    $('.uraian1').html($(this).data('ur_zona'));
    $('#HapusTarifPerkada').modal('show');
  });

  $('.modal-footer').on('click', '.delTarifPerkada', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      type: 'post',
      url: './hapusTarifPerkada',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_tarif_perkada': $('.id_tarif_perkada_hapus').text()
      },
      success: function(data) {
        $('.item' + $('.id_tarif_perkada_hapus').text()).remove();
        $('#tblDetailTarif').DataTable().ajax.reload(null,false);
        $('#pesan').html('<div class="alert alert-danger col-md-12"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+data.pesan+'</div>');
      }
    });
  });

   var id_zona_copy_new
  $(document).on('click', '.btncopy-item', function() {
    var data = detailzona.row($(this).parents('tr') ).data();
    id_zona_copy_new= data.id_zona_perkada;
    $('#CopyDataTarif').modal('show');
    $.ajax({
          type: "GET",
          url: './getDataPerkada',
          data:"id_perkada="+ id_sk_ssh,
          dataType: "json",
          success: function(data) {

          var j = data.length;
          var post, i;

          $('select[name="pilih_perkada"]').empty();
          $('select[name="pilih_perkada"]').append('<option value="-1">---Pilih Nomor Perkada---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="pilih_perkada"]').append('<option value="'+ post.id_perkada +'">'+ post.nomor_perkada +'</option>');
          }
          }
      });
  });

  $(document).on('click', '.copy-tarif', function() {
    $('#CopyDataTarif').modal('show');
    $.ajax({
          type: "GET",
          url: './getDataPerkada',
          data:"id_perkada="+ id_sk_ssh,
          dataType: "json",
          success: function(data) {

          var j = data.length;
          var post, i;

          $('select[name="pilih_perkada"]').empty();
          $('select[name="pilih_perkada"]').append('<option value="-1">---Pilih Nomor Perkada---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="pilih_perkada"]').append('<option value="'+ post.id_perkada +'">'+ post.nomor_perkada +'</option>');
          }
          }
      });
  });

  $(document).on('click', '.btnTransfer', function() {
      if (document.frmModalCopy.opt_copy.value==0){
          // id_zona_copy_new= id_zonassh;
          $.ajax({
            type: "POST",
            url: './copyTarifRef',
            // data: "name=" + name+ "&password=" + password,
            data:"id_zona_perkada="+ id_zona_copy_new,
            success: function(data) {
              $('#tblDetailTarif').DataTable().ajax.reload();
              $('#pesan').html('<div class="alert alert-info col-md-12"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil Copy Data</div>');
              // alert("Berhasil Copy Data");
            }
      });
    } else {
      if($('#pilih_zona').val()==null || $('#pilih_zona').val()=== undefined){
        // alert("Kode Zona yang terdapat dalam perkada masih kosong");
        $('#pesan').html('<div class="alert alert-danger col-md-12"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Kode Zona yang terdapat dalam perkada masih kosong</div>');
      } else {
        // var id_zona_copy_new= id_zonassh;
          var id_perkada_copy = $('#pilih_perkada').val();
          var id_zona_copy = $('#pilih_zona').val();
              $.ajax({
                type: "POST",
                url: './copyTarifPerkada',
                data:"id_zona_perkada_new="+ id_zona_copy_new + "&id_zona_perkada=" + id_zona_copy + "&id_perkada=" + id_perkada_copy,
                success: function(data) {
                  $('#tblDetailTarif').DataTable().ajax.reload();
                  $('#pesan').html('<div class="alert alert-info col-md-12"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil Copy Data</div>');
                }
          });
      }

    }

    

  });

  $( ".pilih_perkada" ).change(function() {
      
      $.ajax({

          type: "GET",
          url: './getDataZona/'+$('#pilih_perkada').val(),
          dataType: "json",

          success: function(data) {

          var j = data.length;
          var post, i;

          $('select[name="pilih_zona"]').empty();
          $('select[name="pilih_zona"]').append('<option value="-1">---Pilih Zona---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="pilih_zona"]').append('<option value="'+ post.id_zona_perkada +'">'+ post.keterangan_zona +'</option>');
          }
          }
      });
    });

});
