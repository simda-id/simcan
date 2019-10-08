$( document ).ready( function () {

  var id_dokumen_temp, tahun_rkpd_temp;
  var tahun_session = $( '#tahun_rkpd_main' ).val();

  var template = Handlebars.compile( $( "#details-template" ).html() );
  var detInProg = Handlebars.compile( $( "#details-inProg" ).html() );
  var detInKeg = Handlebars.compile( $( "#details-inKeg" ).html() );

  function createPesan ( message, type ) {
    var html = '<div id="pesanx" class="alert alert-' + type + ' alert-dismissable flyover flyover-bottom in">';
    html += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
    html += message;
    html += '</div>';
    $( html ).hide().prependTo( '#pesan' ).slideDown();

    setTimeout( function () {
      $( '#pesanx' ).removeClass( 'in' );
    }, 3500 );
  };

  function formatTgl ( val_tanggal ) {
    var formattedDate = new Date( val_tanggal );
    var d = formattedDate.getDate();
    var m = formattedDate.getMonth();
    var y = formattedDate.getFullYear();
    var m_names = new Array( "Januari", "Februari", "Maret",
      "April", "Mei", "Juni", "Juli", "Agustus", "September",
      "Oktober", "November", "Desember" )

    var tgl = d + " " + m_names[ m ] + " " + y;
    return tgl;
  };

  $( '.page-alert .close' ).click( function ( e ) {
    e.preventDefault();
    $( this ).closest( '.page-alert' ).slideUp();
  } );

  $( '[data-toggle="popover"]' ).popover();

  $( ".disabled" ).click( function ( e ) {
    e.preventDefault();
    return false;
  } );


  $( '#tahun_rkpd' ).number( true, 0, ',', '' );

  $( '#tanggal_rkpd_x' ).datepicker( {
    altField: "#tanggal_rkpd",
    altFormat: "yy-mm-dd",
    dateFormat: "dd MM yy"
  } );

  $( '#btn' ).click( function () {
    $( "#tanggal_rkpd_x" ).focus();
  } );

  function buatNip ( string ) {
    return string.replace( /(\d{8})(\d{6})(\d{1})(\d{3})/, "$1 $2 $3 $4" );
  };

  function nilaiNip ( string ) {
    return string.replace( /\D/g, '' ).substring( 0, 20 );
  };

  var angkaNip = document.getElementsByClassName( 'nip' );

  angkaNip.onkeydown = function ( e ) {
    if ( !( ( e.keyCode > 95 && e.keyCode < 106 )
      || ( e.keyCode > 47 && e.keyCode < 58 )
    ) ) { return false; }
  };

  $( "input[name='nip_tandatangan_display']" ).on( "keyup", function () {
    $( "input[name='nip_tandatangan']" ).val( nilaiNip( this.value ) );
    this.value = buatNip( $( "input[name='nip_tandatangan']" ).val() );
  } );

  function back2Rkpd () {
    $( '.nav-tabs a[href="#program"]' ).tab( 'show' );
  };

  function back2Renja () {
    $( '.nav-tabs a[href="#programrenja"]' ).tab( 'show' );
  };

  function back2Kegiatan () {
    $( '.nav-tabs a[href="#kegiatanrenja"]' ).tab( 'show' );
  };

  function back2Pelaksana () {
    $( '.nav-tabs a[href="#pelaksanarenja"]' ).tab( 'show' );
  };

  function back2Aktivitas () {
    $( '.nav-tabs a[href="#aktivitasrenja"]' ).tab( 'show' );
  };

  $( document ).on( 'click', '.backProgRkpd', function () {
    back2Rkpd();
  } );

  $( document ).on( 'click', '.backRenja', function () {
    back2Renja();
  } );

  $( document ).on( 'click', '.backKegiatan', function () {
    back2Kegiatan();
  } );

  $( document ).on( 'click', '.backPelaksana', function () {
    back2Pelaksana();
  } );

  $( document ).on( 'click', '.backAktivitas', function () {
    back2Aktivitas();
  } );

  $.ajax( {

    type: "GET",
    url: 'renjafinal/getUnit',
    dataType: "json",

    success: function ( data ) {

      var j = data.length;
      var post, i;

      $( 'select[name="id_unit"]' ).empty();
      $( 'select[name="id_unit"]' ).append( '<option value="-1">---Pilih Unit---</option>' );

      for ( i = 0; i < j; i++ ) {
        post = data[ i ];
        $( 'select[name="id_unit"]' ).append( '<option value="' + post.id_unit + '">' + post.nm_unit + '</option>' );
      }
    }
  } );

  $.ajax( {

    type: "GET",
    url: 'renjafinal/getJnsDokumen?jns=17',
    dataType: "json",

    success: function ( data ) {

      var j = data.length;
      var post, i;

      // $('select[name="cb_jns_dokumen"]').empty();
      // $('select[name="cb_jns_dokumen"]').append('<option value="-1">---Pilih Unit---</option>');

      for ( i = 0; i < j; i++ ) {
        post = data[ i ];
        $( 'select[name="cb_jns_dokumen"]' ).append( '<option value="' + post.jenis_dokumen + '">' + post.nm_langkah + '</option>' );
      }
    }
  } );

  $.ajax( {

    type: "GET",
    url: 'renjafinal/getDokumenRef',
    dataType: "json",

    success: function ( data ) {

      var j = data.length;
      var post, i;

      $( 'select[name="cb_ref_rkpd"]' ).empty();
      $( 'select[name="cb_ref_rkpd"]' ).append( '<option value="-1">---Pilih Dokumen RKPD Final---</option>' );

      for ( i = 0; i < j; i++ ) {
        post = data[ i ];
        $( 'select[name="cb_ref_rkpd"]' ).append( '<option value="' + post.id_dokumen_rkpd + '">' + post.nomor_rkpd + '</option>' );
      }
    }
  } );

  var dokumen_tbl;
  dokumen_tbl = $( '#tblDokumen' ).DataTable( {
    "autoWidth": false,
    "bDestroy": true
  } );

  function LoadDokumen ( id_unit ) {
    dokumen_tbl = $( '#tblDokumen' ).DataTable( {
      processing: true,
      serverSide: true,
      responsive: true,
      dom: 'bfrtip',
      autoWidth: false,
      order: [ [ 0, 'asc' ] ],
      bDestroy: true,
      language: {
        "decimal": ",",
        "thousands": ".",
        "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
        "sProcessing": "Sedang memproses...",
        "sLengthMenu": "Tampilkan _MENU_ entri",
        "sZeroRecords": "Tidak ditemukan data yang sesuai",
        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
        "sInfoPostFix": "",
        "sSearch": "Cari:",
        "sUrl": "",
        "oPaginate": {
          "sFirst": "Pertama",
          "sPrevious": "Sebelumnya",
          "sNext": "Selanjutnya",
          "sLast": "Terakhir"
        }
      },
      "ajax": { "url": "renjafinal/getDataDokumen/" + id_unit },
      "columns": [
        { data: 'no_urut', sClass: "dt-center" },
        { data: 'tahun_ranwal', sClass: "dt-center" },
        { data: 'nomor_ranwal' },
        {
          data: 'uraian_perkada', 'searchable': false, 'orderable': false, sClass: "dt-left",
          render: function ( data, type, row, meta ) {
            return row.uraian_perkada + '  <span class="badge" style="background-color: ' + row.warna + '; color:#fff;">' + row.status_label + '</span>';
          }
        },
        // { data: 'uraian_perkada'},
        // { data: 'icon','searchable': false, 'orderable':false, sClass: "dt-center",width:"15px",
        //   render: function(data, type, row,meta) {
        //   return '<i class="'+row.status_icon+'" style="font-size:16px;color:'+row.warna+';"/>';
        // }},
        { data: 'action', 'searchable': false, 'orderable': false, sClass: "dt-center" }
      ],
    } );
  };

  var LoadDataTbl
  function LoadTabelData ( $unit, $rkpd ) {
    LoadDataTbl = $( '#tblLoadData' ).DataTable( {
      processing: true,
      serverSide: true,
      responsive: true,
      dom: '<"top"l>bfrtip',
      autoWidth: false,
      order: [ [ 0, 'asc' ] ],
      bDestroy: true,
      language: {
        "decimal": ",",
        "thousands": ".",
        "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
        "sProcessing": "Sedang memproses...",
        "sLengthMenu": "Tampilkan _MENU_ entri",
        "sZeroRecords": "Tidak ditemukan data yang sesuai",
        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
        "sInfoPostFix": "",
        "sSearch": "Cari:",
        "sUrl": "",
        "oPaginate": {
          "sFirst": "Pertama",
          "sPrevious": "Sebelumnya",
          "sNext": "Selanjutnya",
          "sLast": "Terakhir"
        }
      },
      "ajax": { "url": 'renjafinal/getLoadData?id_unit=' + $unit + '&rkpd=' + $rkpd },
      "columns": [
        { data: 'no_urut', sClass: "dt-center" },
        { data: 'uraian_program_rpjmd' },
        { data: 'uraian_program' },
        { data: 'action', 'searchable': false, 'orderable': false, sClass: "dt-center" }
      ],
    } );
  };

  var UnLoadDataTbl
  function UnLoadTabelData ( $unit, $rkpd ) {
    UnLoadDataTbl = $( '#tblUnLoadData' ).DataTable( {
      processing: true,
      serverSide: true,
      responsive: true,
      dom: '<"top"l>bfrtip',
      autoWidth: false,
      order: [ [ 0, 'asc' ] ],
      bDestroy: true,
      language: {
        "decimal": ",",
        "thousands": ".",
        "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
        "sProcessing": "Sedang memproses...",
        "sLengthMenu": "Tampilkan _MENU_ entri",
        "sZeroRecords": "Tidak ditemukan data yang sesuai",
        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
        "sInfoPostFix": "",
        "sSearch": "Cari:",
        "sUrl": "",
        "oPaginate": {
          "sFirst": "Pertama",
          "sPrevious": "Sebelumnya",
          "sNext": "Selanjutnya",
          "sLast": "Terakhir"
        }
      },
      "ajax": { "url": 'renjafinal/getUnLoadData?id_unit=' + $unit + '&rkpd=' + $rkpd },
      "columns": [
        { data: 'no_urut', sClass: "dt-center" },
        { data: 'uraian_program_rpjmd' },
        { data: 'uraian_program' },
        { data: 'action', 'searchable': false, 'orderable': false, sClass: "dt-center" }
      ],
    } );
  };
  var LoadRekapRkpd
  function LoadTabelRekapRkpd ( $unit, $rkpd ) {
    LoadRekapRkpd = $( '#tblProgramRKPD' ).DataTable( {
      processing: true,
      serverSide: true,
      responsive: true,
      dom: 'bfrtip',
      autoWidth: false,
      order: [ [ 1, 'asc' ] ],
      bDestroy: true,
      language: {
        "decimal": ",",
        "thousands": ".",
        "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
        "sProcessing": "Sedang memproses...",
        "sLengthMenu": "Tampilkan _MENU_ entri",
        "sZeroRecords": "Tidak ditemukan data yang sesuai",
        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
        "sInfoPostFix": "",
        "sSearch": "Cari:",
        "sUrl": "",
        "oPaginate": {
          "sFirst": "Pertama",
          "sPrevious": "Sebelumnya",
          "sNext": "Selanjutnya",
          "sLast": "Terakhir"
        }
      },
      "ajax": { "url": 'renjafinal/getRekapProgramRkpd?id_unit=' + $unit + '&id_dokumen=' + $rkpd },
      "columnDefs": [ { "visible": false } ],
      "columns": [
        {
          "className": 'details-control',
          "orderable": false,
          "searchable": false,
          "data": null,
          "defaultContent": '',
          "width": "5px"
        },
        { data: 'no_urut', sClass: "dt-center" },
        { data: 'uraian_program_rpjmd' },
        {
          data: 'jml_program',
          render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"
        },
        {
          data: 'jml_kegiatan',
          render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"
        },
        {
          data: 'jml_pagu',
          render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"
        },
        // { data: 'action', 'searchable': false, 'orderable':false,sClass: "dt-center" }
      ],
    } );
  };

  function initTableBidang ( tableId, data ) {
    tblChildBidang = $( '#' + tableId ).DataTable( {
      processing: true,
      serverSide: true,
      responsive: true,
      dom: 'bfrtip',
      autoWidth: false,
      order: [ [ 0, 'asc' ] ],
      bDestroy: true,
      language: {
        "decimal": ",",
        "thousands": ".",
        "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
        "sProcessing": "Sedang memproses...",
        "sLengthMenu": "Tampilkan _MENU_ entri",
        "sZeroRecords": "Tidak ditemukan data yang sesuai",
        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
        "sInfoPostFix": "",
        "sSearch": "Cari:",
        "sUrl": "",
        "oPaginate": {
          "sFirst": "Pertama",
          "sPrevious": "Sebelumnya",
          "sNext": "Selanjutnya",
          "sLast": "Terakhir"
        }
      },
      ajax: data.details_url,
      columns: [
        { data: 'kd_bidang', name: 'kd_bidang', sClass: "dt-center", width: '15%' },
        { data: 'nm_bidang', name: 'nm_bidang' },
        { data: 'action', 'searchable': false, 'orderable': false, sClass: "dt-center", width: "50px" }
      ],
    } );


    $( '#' + tableId + '  tbody' ).on( 'click', 'tr', function () {

      var data = tblChildBidang.row( this ).data();
      var x = data.id_unit;
      var y = data.id_pelaksana_rkpd;


      $( '.nav-tabs a[href="#programrenja"]' ).tab( 'show' );
      $( '#nm_program_rkpd_progrenja' ).text( data.uraian_program_rpjmd );
      loadTblProgRenja( x, y );

    } );
  };

  var prog_renja_tbl;

  function loadTblProgRenja ( unit, id_forum ) {
    prog_renja_tbl = $( '#tblProgramRenja' ).DataTable( {
      processing: true,
      serverSide: true,
      responsive: true,
      dom: 'bfrtip',
      autoWidth: false,
      order: [ [ 0, 'asc' ] ],
      bDestroy: true,
      language: {
        "decimal": ",",
        "thousands": ".",
        "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
        "sProcessing": "Sedang memproses...",
        "sLengthMenu": "Tampilkan _MENU_ entri",
        "sZeroRecords": "Tidak ditemukan data yang sesuai",
        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
        "sInfoPostFix": "",
        "sSearch": "Cari:",
        "sUrl": "",
        "oPaginate": {
          "sFirst": "Pertama",
          "sPrevious": "Sebelumnya",
          "sNext": "Selanjutnya",
          "sLast": "Terakhir"
        }
      },
      "ajax": { "url": "renjafinal/getProgramRenja/" + unit + "/" + id_forum },
      "columns": [
        {
          "className": 'details-control',
          "orderable": false,
          "searchable": false,
          "data": null,
          "defaultContent": '',
          "width": "5px"
        },
        { data: 'urut', sClass: "dt-center", width: "5px" },
        { data: 'uraian_program_renstra' },
        {
          data: 'pagu_forum', sClass: "dt-right",
          render: $.fn.dataTable.render.number( '.', ',', 2, '' )
        },
        { data: 'jml_kegiatan', sClass: "dt-center" },
        // { data: 'jml_0k', sClass: "dt-center"},
        {
          data: 'jml_pagu', sClass: "dt-right",
          render: $.fn.dataTable.render.number( '.', ',', 2, '' )
        },
        // { data: 'icon','searchable': false, 'orderable':false, sClass: "dt-center",width:"5px",
        //     render: function(data, type, row,meta) {
        //     return '<i class="'+row.status_icon+'" style="font-size:16px;color:'+row.warna+';"/>';
        //   }},
        { data: 'action', 'searchable': false, 'orderable': false }
      ],
    } );
  };

  var tblInProg;
  function initInProg ( tableId, data ) {
    tblInProg = $( '#' + tableId ).DataTable( {
      processing: true,
      serverSide: true,
      responsive: true,
      dom: 'bfrtip',
      autoWidth: false,
      order: [ [ 0, 'asc' ] ],
      bDestroy: true,
      language: {
        "decimal": ",",
        "thousands": ".",
        "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
        "sProcessing": "Sedang memproses...",
        "sLengthMenu": "Tampilkan _MENU_ entri",
        "sZeroRecords": "Tidak ditemukan data yang sesuai",
        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
        "sInfoPostFix": "",
        "sSearch": "Cari:",
        "sUrl": "",
        "oPaginate": {
          "sFirst": "Pertama",
          "sPrevious": "Sebelumnya",
          "sNext": "Selanjutnya",
          "sLast": "Terakhir"
        }
      },
      ajax: data.details_url,
      "language": {
        "decimal": ",",
        "thousands": "."
      },
      "columns": [
        { data: 'urut', sClass: "dt-center" },
        { data: 'uraian_indikator_program' },
        {
          data: 'target_renstra', sClass: "dt-right",
          render: $.fn.dataTable.render.number( '.', ',', 2, '' )
        },
        {
          data: 'target_renja', sClass: "dt-right",
          render: $.fn.dataTable.render.number( '.', ',', 2, '' )
        },
        // { data: 'icon','searchable': false, 'orderable':false, sClass: "dt-center",
        //     render: function(data, type, row,meta) {
        //     return '<i class="'+row.status_icon+'" style="font-size:16px;color:'+row.warna+';"/>';
        //   }},
      ],
    } )

  };

  var keg_renja_tbl;
  $( '#tblKegiatanRenja' ).DataTable( {
    dom: 'BfRtip',
    autoWidth: false,
    bDestroy: true
  } );
  function loadTblKegiatanRenja ( id_program ) {
    keg_renja_tbl = $( '#tblKegiatanRenja' ).DataTable( {
      processing: true,
      serverSide: true,
      responsive: true,
      dom: 'bfrtip',
      autoWidth: false,
      order: [ [ 0, 'asc' ] ],
      bDestroy: true,
      language: {
        "decimal": ",",
        "thousands": ".",
        "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
        "sProcessing": "Sedang memproses...",
        "sLengthMenu": "Tampilkan _MENU_ entri",
        "sZeroRecords": "Tidak ditemukan data yang sesuai",
        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
        "sInfoPostFix": "",
        "sSearch": "Cari:",
        "sUrl": "",
        "oPaginate": {
          "sFirst": "Pertama",
          "sPrevious": "Sebelumnya",
          "sNext": "Selanjutnya",
          "sLast": "Terakhir"
        }
      },
      "ajax": { "url": "renjafinal/getKegiatanRenja/" + id_program },
      "columns": [
        {
          "className": 'details-control',
          "orderable": false,
          "searchable": false,
          "data": null,
          "defaultContent": '',
          "width": "5px"
        },
        { data: 'urut', sClass: "dt-center", width: "5px" },
        { data: 'uraian_kegiatan_forum' },
        {
          data: 'pagu_tahun_kegiatan', sClass: "dt-right",
          render: $.fn.dataTable.render.number( '.', ',', 2, '' )
        },
        {
          data: 'pagu_forum', sClass: "dt-right",
          render: $.fn.dataTable.render.number( '.', ',', 2, '' )
        },
        { data: 'jml_aktivitas', sClass: "dt-center" },
        {
          data: 'jml_pagu_aktivitas', sClass: "dt-right",
          render: $.fn.dataTable.render.number( '.', ',', 2, '' )
        },
        { data: 'action', 'searchable': false, 'orderable': false }
      ],
    } );
  };

  function initInKeg ( tableId, data ) {
    tblInKeg = $( '#' + tableId ).DataTable( {
      processing: true,
      serverSide: true,
      responsive: true,
      dom: 'bfrtip',
      autoWidth: false,
      order: [ [ 0, 'asc' ] ],
      bDestroy: true,
      language: {
        "decimal": ",",
        "thousands": ".",
        "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
        "sProcessing": "Sedang memproses...",
        "sLengthMenu": "Tampilkan _MENU_ entri",
        "sZeroRecords": "Tidak ditemukan data yang sesuai",
        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
        "sInfoPostFix": "",
        "sSearch": "Cari:",
        "sUrl": "",
        "oPaginate": {
          "sFirst": "Pertama",
          "sPrevious": "Sebelumnya",
          "sNext": "Selanjutnya",
          "sLast": "Terakhir"
        }
      },
      ajax: data.details_url,
      "language": {
        "decimal": ",",
        "thousands": "."
      },
      "columns": [
        { data: 'urut', sClass: "dt-center" },
        { data: 'uraian_indikator_kegiatan' },
        {
          data: 'target_renstra', sClass: "dt-right",
          render: $.fn.dataTable.render.number( '.', ',', 2, '' )
        },
        {
          data: 'target_renja', sClass: "dt-right",
          render: $.fn.dataTable.render.number( '.', ',', 2, '' )
        },
      ],
    } )
  };

  var aktivitas_tbl;
  $( '#tblAktivitas' ).DataTable( {
    dom: 'BfRtip',
    autoWidth: false,
    bDestroy: true
  } );

  function loadTblAktivitas ( id_forum ) {
    aktivitas_tbl = $( '#tblAktivitasRenja' ).DataTable( {
      processing: true,
      serverSide: true,
      responsive: true,
      dom: 'bfrtip',
      autoWidth: false,
      order: [ [ 0, 'asc' ] ],
      bDestroy: true,
      language: {
        "decimal": ",",
        "thousands": ".",
        "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
        "sProcessing": "Sedang memproses...",
        "sLengthMenu": "Tampilkan _MENU_ entri",
        "sZeroRecords": "Tidak ditemukan data yang sesuai",
        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
        "sInfoPostFix": "",
        "sSearch": "Cari:",
        "sUrl": "",
        "oPaginate": {
          "sFirst": "Pertama",
          "sPrevious": "Sebelumnya",
          "sNext": "Selanjutnya",
          "sLast": "Terakhir"
        }
      },
      "ajax": { "url": "renjafinal/getAktivitas/" + id_forum },
      "columns": [
        { data: 'urut', sClass: "dt-center", width: "5px" },
        {
          data: 'uraian', 'searchable': false, 'orderable': false, sClass: "dt-left",
          render: function ( data, type, row, meta ) {
            // return row.uraian_aktivitas_kegiatan + '  <i class="'+row.img+' fa-lg text-primary"/>';
            return row.uraian_aktivitas_kegiatan + '  <span class="label" style="background-color: ' + row.status_warna + '; color:#fff;">' + row.status_label + '</span>';
          }
        },
        {
          data: 'pagu_aktivitas_forum', sClass: "dt-right",
          render: $.fn.dataTable.render.number( '.', ',', 2, '' )
        },
        {
          data: 'jml_belanja', sClass: "dt-right",
          render: $.fn.dataTable.render.number( '.', ',', 2, '' )
        },
        {
          data: 'jml_vol_1', sClass: "dt-right",
          render: $.fn.dataTable.render.number( '.', ',', 2, '' )
        },
        {
          data: 'jml_vol_2', sClass: "dt-right",
          render: $.fn.dataTable.render.number( '.', ',', 2, '' )
        },
        // { data: 'icon','searchable': false, 'orderable':false, sClass: "dt-center", width :"5px",
        //     render: function(data, type, row,meta) {
        //     return '<i class="'+row.status_icon+'" style="color:'+row.warna+';"/>';
        //   }},
        { data: 'action', 'searchable': false, width: "20px", 'orderable': false }
      ],
    } );
  };

  var pelaksana_tbl;
  $( '#tblPelaksana' ).DataTable( {
    dom: 'BfRtip',
    autoWidth: false,
    bDestroy: true
  } );

  function loadTblPelaksana ( id_aktivitas ) {
    pelaksana_tbl = $( '#tblPelaksanaRenja' ).DataTable( {
      processing: true,
      serverSide: true,
      responsive: true,
      dom: 'bfrtip',
      autoWidth: false,
      order: [ [ 0, 'asc' ] ],
      bDestroy: true,
      language: {
        "decimal": ",",
        "thousands": ".",
        "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
        "sProcessing": "Sedang memproses...",
        "sLengthMenu": "Tampilkan _MENU_ entri",
        "sZeroRecords": "Tidak ditemukan data yang sesuai",
        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
        "sInfoPostFix": "",
        "sSearch": "Cari:",
        "sUrl": "",
        "oPaginate": {
          "sFirst": "Pertama",
          "sPrevious": "Sebelumnya",
          "sNext": "Selanjutnya",
          "sLast": "Terakhir"
        }
      },
      "ajax": { "url": "renjafinal/getPelaksanaAktivitas/" + id_aktivitas },
      "columns": [
        { data: 'urut', sClass: "dt-center" },
        { data: 'nm_sub' },
        // { data: 'nama_lokasi'},
        {
          data: 'jml_pagu_aktivitas', sClass: "dt-right",
          render: $.fn.dataTable.render.number( '.', ',', 2, '' )
        },
        {
          data: 'jml_pagu', sClass: "dt-right",
          render: $.fn.dataTable.render.number( '.', ',', 2, '' )
        },
        // { data: 'jml_lokasi', sClass: "dt-right",
        // render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
        { data: 'action', 'searchable': false, 'orderable': false }
      ],
    } );
  };

  var lokasi_tbl;
  $( '#tblLokasi' ).DataTable( {
    dom: 'BfRtip',
    autoWidth: false,
    bDestroy: true
  } );

  function loadTblLokasi ( id_pelaksana ) {
    lokasi_tbl = $( '#tblLokasi' ).DataTable( {
      processing: true,
      serverSide: true,
      responsive: true,
      dom: 'bfrtip',
      autoWidth: false,
      order: [ [ 0, 'asc' ] ],
      bDestroy: true,
      language: {
        "decimal": ",",
        "thousands": ".",
        "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
        "sProcessing": "Sedang memproses...",
        "sLengthMenu": "Tampilkan _MENU_ entri",
        "sZeroRecords": "Tidak ditemukan data yang sesuai",
        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
        "sInfoPostFix": "",
        "sSearch": "Cari:",
        "sUrl": "",
        "oPaginate": {
          "sFirst": "Pertama",
          "sPrevious": "Sebelumnya",
          "sNext": "Selanjutnya",
          "sLast": "Terakhir"
        }
      },
      "ajax": { "url": "renjafinal/getLokasiAktivitas/" + id_pelaksana },
      "columns": [
        { data: 'no_urut', sClass: "dt-center" },
        // { data: 'sumber_display', sClass: "dt-center"},
        { data: 'nama_lokasi' },
        {
          data: 'volume_1', sClass: "dt-center", 'searchable': false, 'orderable': false,
          render: $.fn.dataTable.render.number( '.', ',', 2, '' )
        },
        {
          data: 'volume_2', sClass: "dt-center", 'searchable': false, 'orderable': false,
          render: $.fn.dataTable.render.number( '.', ',', 2, '' )
        },
        // { data: 'usulan_display', sClass: "dt-center"},
      ],
    } );
  };

  var belanja_renja_tbl;
  $( '#tblBelanja' ).DataTable( {
    dom: 'BfRtip',
    autoWidth: false,
    bDestroy: true
  } );

  function loadTblBelanja ( lokasi ) {
    belanja_renja_tbl = $( '#tblBelanja' ).DataTable( {
      processing: true,
      serverSide: true,
      responsive: true,
      dom: '<"top"l>bfrtip',
      autoWidth: false,
      order: [ [ 0, 'asc' ] ],
      bDestroy: true,
      language: {
        "decimal": ",",
        "thousands": ".",
        "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
        "sProcessing": "Sedang memproses...",
        "sLengthMenu": "Tampilkan _MENU_ entri",
        "sZeroRecords": "Tidak ditemukan data yang sesuai",
        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
        "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
        "sInfoPostFix": "",
        "sSearch": "Cari:",
        "sUrl": "",
        "oPaginate": {
          "sFirst": "Pertama",
          "sPrevious": "Sebelumnya",
          "sNext": "Selanjutnya",
          "sLast": "Terakhir"
        }
      },
      "ajax": { "url": "renjafinal/getBelanja/" + lokasi },
      "columns": [
        { data: 'no_urut', sClass: "dt-center" },
        { data: 'uraian_tarif_ssh' },
        {
          data: 'volume_1_forum', sClass: "dt-right",
          render: $.fn.dataTable.render.number( '.', ',', 2, '' )
        },
        {
          data: 'volume_2_forum', sClass: "dt-right",
          render: $.fn.dataTable.render.number( '.', ',', 2, '' )
        },
        {
          data: 'harga_satuan_forum', sClass: "dt-right",
          render: $.fn.dataTable.render.number( '.', ',', 2, '' )
        },
        {
          data: 'jml_belanja_forum', sClass: "dt-right",
          render: $.fn.dataTable.render.number( '.', ',', 2, '' )
        },
      ],
    } );
  };

  $( '#tblProgramRKPD tbody' ).on( 'click', 'td.details-control', function () {
    var tr = $( this ).closest( 'tr' );
    var row = LoadRekapRkpd.row( tr );
    var tableId = 'bidang-' + row.data().id_dokumen + row.data().id_unit + row.data().id_rkpd_rancangan;

    if ( row.child.isShown() ) {
      row.child.hide();
      tr.removeClass( 'shown' );
    } else {
      row.child( template( row.data() ) ).show();
      initTableBidang( tableId, row.data() );
      tr.addClass( 'shown' );
      tr.next().find( 'td' ).addClass( 'no-padding bg-gray' );
    }
  } );

  $( '#tblProgramRenja tbody' ).on( 'click', 'td.details-control', function () {

    var tr = $( this ).closest( 'tr' );
    var row = prog_renja_tbl.row( tr );
    var tableId = 'inProg-' + row.data().id_program_pd;

    if ( row.child.isShown() ) {
      row.child.hide();
      tr.removeClass( 'shown' );
    } else {
      row.child( detInProg( row.data() ) ).show();
      initInProg( tableId, row.data() );
      tr.addClass( 'shown' );
      tr.next().find( 'td' ).addClass( 'no-padding bg-gray' );
    }
  } );

  $( '#tblKegiatanRenja tbody' ).on( 'click', 'td.details-control', function () {

    var tr = $( this ).closest( 'tr' );
    var row = keg_renja_tbl.row( tr );
    var tableId = 'inKeg-' + row.data().id_kegiatan_pd;

    if ( row.child.isShown() ) {
      row.child.hide();
      tr.removeClass( 'shown' );
    } else {
      row.child( detInKeg( row.data() ) ).show();
      initInKeg( tableId, row.data() );
      tr.addClass( 'shown' );
      tr.next().find( 'td' ).addClass( 'no-padding bg-gray' );
    }
  } );

  $( document ).on( 'click', '.btnViewKegSkpd', function () {

    var data = prog_renja_tbl.row( $( this ).parents( 'tr' ) ).data();
    var x = data.id_program_pd;

    $( '.nav-tabs a[href="#kegiatanrenja"]' ).tab( 'show' );
    $( '#nm_program_rkpd_kegrenja' ).text( $( '#nm_program_rkpd_progrenja' ).text() );
    $( '#nm_program_renja_kegrenja' ).text( data.uraian_program_renstra );
    loadTblKegiatanRenja( x );
  } );

  $( '#tblProgramRenja tbody' ).on( 'dblclick', 'tr', function () {

    var data = prog_renja_tbl.row( this ).data();
    var x = data.id_program_pd;

    $( '.nav-tabs a[href="#kegiatanrenja"]' ).tab( 'show' );
    $( '#nm_program_rkpd_kegrenja' ).text( $( '#nm_program_rkpd_progrenja' ).text() );
    $( '#nm_program_renja_kegrenja' ).text( data.uraian_program_renstra );
    loadTblKegiatanRenja( x );
  } );

  $( '#tblKegiatanRenja tbody' ).on( 'dblclick', 'tr', function () {

    var data = keg_renja_tbl.row( this ).data();
    var x = data.id_kegiatan_pd;

    $( '.nav-tabs a[href="#pelaksanarenja"]' ).tab( 'show' );
    $( '#nm_program_rkpd_pelaksana' ).text( $( '#nm_program_rkpd_kegrenja' ).text() );
    $( '#nm_program_pelaksana' ).text( $( '#nm_program_renja_kegrenja' ).text() );
    $( '#nm_kegiatan_pelaksana' ).text( data.uraian_kegiatan_forum );
    loadTblPelaksana( x );
  } );

  $( document ).on( 'click', '.btnViewPelaksanaSkpd', function () {

    var data = keg_renja_tbl.row( $( this ).parents( 'tr' ) ).data();
    var x = data.id_kegiatan_pd;

    $( '.nav-tabs a[href="#pelaksanarenja"]' ).tab( 'show' );
    $( '#nm_program_rkpd_pelaksana' ).text( $( '#nm_program_rkpd_kegrenja' ).text() );
    $( '#nm_program_pelaksana' ).text( $( '#nm_program_renja_kegrenja' ).text() );
    $( '#nm_kegiatan_pelaksana' ).text( data.uraian_kegiatan_forum );
    loadTblPelaksana( x );
  } );

  $( '#tblPelaksanaRenja tbody' ).on( 'dblclick', 'tr', function () {

    var data = pelaksana_tbl.row( this ).data();
    var x = data.id_pelaksana_pd;

    $( '.nav-tabs a[href="#aktivitasrenja"]' ).tab( 'show' );
    $( '#nm_program_rkpd_aktivitas' ).text( $( '#nm_program_rkpd_pelaksana' ).text() );
    $( '#nm_program_aktivitas' ).text( $( '#nm_program_pelaksana' ).text() );
    $( '#nm_kegiatan_aktivitas' ).text( $( '#nm_kegiatan_pelaksana' ).text() );
    $( '#nm_sub_pelaksana' ).text( data.nm_sub );
    loadTblAktivitas( x );
  } );

  $( document ).on( 'click', '.btnViewAktivitasSkpd', function () {

    var data = pelaksana_tbl.row( $( this ).parents( 'tr' ) ).data();
    var x = data.id_pelaksana_pd;

    $( '.nav-tabs a[href="#aktivitasrenja"]' ).tab( 'show' );
    $( '#nm_program_rkpd_aktivitas' ).text( $( '#nm_program_rkpd_pelaksana' ).text() );
    $( '#nm_program_aktivitas' ).text( $( '#nm_program_pelaksana' ).text() );
    $( '#nm_kegiatan_aktivitas' ).text( $( '#nm_kegiatan_pelaksana' ).text() );
    $( '#nm_sub_pelaksana' ).text( data.nm_sub );
    loadTblAktivitas( x );
  } );

  $( '#tblAktivitasRenja tbody' ).on( 'dblclick', 'tr', function () {

    var data = aktivitas_tbl.row( this ).data();
    var x = data.id_aktivitas_pd;

    $( '.nav-tabs a[href="#belanja"]' ).tab( 'show' );
    $( '#nm_program_rkpd_belanja' ).text( $( '#nm_program_rkpd_aktivitas' ).text() );
    $( '#nm_program_belanja' ).text( $( '#nm_program_aktivitas' ).text() );
    $( '#nm_kegiatan_belanja' ).text( $( '#nm_kegiatan_aktivitas' ).text() );
    $( '#nm_sub_belanja' ).text( $( '#nm_sub_pelaksana' ).text() );
    $( '#nm_aktivitas_belanja' ).text( data.uraian_aktivitas_kegiatan );
    loadTblBelanja( x );
  } );

  $( document ).on( 'click', '#btnViewLokasi', function () {

    var data = aktivitas_tbl.row( $( this ).parents( 'tr' ) ).data();
    var x = data.id_aktivitas_pd;

    $( '.nav-tabs a[href="#lokasi"]' ).tab( 'show' );
    $( '#nm_program_rkpd_lokasi' ).text( $( '#nm_program_rkpd_aktivitas' ).text() );
    $( '#nm_program_lokasi' ).text( $( '#nm_program_aktivitas' ).text() );
    $( '#nm_kegiatan_lokasi' ).text( $( '#nm_kegiatan_aktivitas' ).text() );
    $( '#nm_sub_lokasi' ).text( $( '#nm_sub_pelaksana' ).text() );
    $( '#nm_aktivitas_lokasi' ).text( data.uraian_aktivitas_kegiatan );
    loadTblLokasi( x );
  } );

  $( document ).on( 'click', '#btnViewBelanja', function () {

    var data = aktivitas_tbl.row( $( this ).parents( 'tr' ) ).data();
    var x = data.id_aktivitas_pd;

    $( '.nav-tabs a[href="#belanja"]' ).tab( 'show' );
    $( '#nm_program_rkpd_belanja' ).text( $( '#nm_program_rkpd_aktivitas' ).text() );
    $( '#nm_program_belanja' ).text( $( '#nm_program_aktivitas' ).text() );
    $( '#nm_kegiatan_belanja' ).text( $( '#nm_kegiatan_aktivitas' ).text() );
    $( '#nm_sub_belanja' ).text( $( '#nm_sub_pelaksana' ).text() );
    $( '#nm_aktivitas_belanja' ).text( data.uraian_aktivitas_kegiatan );
    loadTblBelanja( x );
  } );


  $( "#id_unit" ).change( function () {
    LoadDokumen( $( '#id_unit' ).val() );
  } );


  $( document ).on( 'click', '#btnAddDokumen', function () {

    if ( $( '#id_unit' ).val() == -1 ) {
      createPesan( "Unit Penyusun Rancangan Awal Renja Belum dipilih..!!!", "danger" );
    } else {
      $( '#btnDokumen' ).removeClass( 'editDokumen' );
      $( '#btnDokumen' ).addClass( 'addDokumen' );
      $( '.modal-title' ).text( 'Data Dokumen Penyusunan Renja Final' );
      $( '.form-horizontal' ).show();

      $( '#id_dokumen_rkpd' ).val( null );
      $( '#tahun_rkpd' ).val( tahun_session );
      $( '#cb_jns_dokumen' ).val( 17 );
      $( '#cb_ref_rkpd' ).val( -1 );
      $( '#id_revisi_dok' ).val( 0 );
      $( '#tanggal_rkpd' ).val( null );
      $( '#tanggal_rkpd_x' ).val( null );
      $( '#nomor_rkpd' ).val( null );
      $( '#uraian_perkada' ).val();
      $( '#id_unit_perencana' ).val( $( '#id_unit' ).val() );
      $( '#id_unit_perencana_display' ).val( $( '#id_unit option:selected' ).text() );
      $( '#nama_tandatangan' ).val( null );
      $( '#nip_tandatangan_display' ).val( null );
      $( '#nip_tandatangan' ).val( null );

      $( '#btnDelDokumen' ).hide();
      $( '#btnDokumen' ).show();
      $( '#TambahDokumen' ).modal( 'show' );
    }

  } );

  $( '.modal-footer' ).on( 'click', '.addDokumen', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: 'renjafinal/addDokumen',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'tahun_rkpd': $( '#tahun_rkpd' ).val(),
        'tanggal_rkpd': $( '#tanggal_rkpd' ).val(),
        'nomor_rkpd': $( '#nomor_rkpd' ).val(),
        'uraian_perkada': $( '#uraian_perkada' ).val(),
        'id_unit_perencana': $( '#id_unit_perencana' ).val(),
        'nama_tandatangan': $( '#nama_tandatangan' ).val(),
        'nip_tandatangan': $( '#nip_tandatangan' ).val(),
        'id_dokumen_ref': $( '#cb_ref_rkpd' ).val(),
        'id_perubahan': $( '#id_revisi_dok' ).val(),
      },
      success: function ( data ) {
        dokumen_tbl.ajax.reload( null, false );
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }
      }
    } );
  } );

  $( document ).on( 'click', '#btnEditDokumen', function () {

    var data = dokumen_tbl.row( $( this ).parents( 'tr' ) ).data();

    $( '#btnDokumen' ).removeClass( 'addDokumen' );
    $( '#btnDokumen' ).addClass( 'editDokumen' );
    $( '.modal-title' ).text( 'Data Dokumen Penyusunan Renja Final' );
    $( '.form-horizontal' ).show();

    $( '#id_dokumen_rkpd' ).val( data.id_dokumen_ranwal );
    $( '#tahun_rkpd' ).val( data.tahun_ranwal );
    $( '#tanggal_rkpd' ).val( data.tanggal_ranwal );
    $( '#tanggal_rkpd_x' ).val( formatTgl( data.tanggal_ranwal ) );
    $( '#nomor_rkpd' ).val( data.nomor_ranwal );
    $( '#cb_ref_rkpd' ).val( data.id_dokumen_ref );
    $( '#id_revisi_dok' ).val( data.id_perubahan );
    $( '#uraian_perkada' ).val( data.uraian_perkada );
    $( '#id_unit_perencana' ).val( data.id_unit_renja );
    $( '#id_unit_perencana_display' ).val( data.nm_unit );
    $( '#nama_tandatangan' ).val( data.nama_tandatangan );
    $( '#nip_tandatangan' ).val( data.nip_tandatangan );

    if ( data.nip_tandatangan == null ) {
      $( '#nip_tandatangan_display' ).val( null );
    } else {
      $( '#nip_tandatangan_display' ).val( buatNip( data.nip_tandatangan ) );
    };

    if ( data.flag == 1 ) {
      $( '#btnDelDokumen' ).hide();
      $( '#btnDokumen' ).hide();
    } else {
      $( '#btnDelDokumen' ).show();
      $( '#btnDokumen' ).show();
    };

    $( '#TambahDokumen' ).modal( 'show' );
  } );

  $( '.modal-footer' ).on( 'click', '.editDokumen', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: 'renjafinal/editDokumen',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_dokumen_rkpd': $( '#id_dokumen_rkpd' ).val(),
        'tahun_rkpd': $( '#tahun_rkpd' ).val(),
        'tanggal_rkpd': $( '#tanggal_rkpd' ).val(),
        'nomor_rkpd': $( '#nomor_rkpd' ).val(),
        'uraian_perkada': $( '#uraian_perkada' ).val(),
        'id_unit_perencana': $( '#id_unit_perencana' ).val(),
        'nama_tandatangan': $( '#nama_tandatangan' ).val(),
        'nip_tandatangan': $( '#nip_tandatangan' ).val(),
        'id_dokumen_ref': $( '#cb_ref_rkpd' ).val(),
        'id_perubahan': $( '#id_revisi_dok' ).val(),
      },
      success: function ( data ) {
        dokumen_tbl.ajax.reload( null, false );
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }
      }
    } );
  } );

  $( document ).on( 'click', '#btnDelDokumen', function () {

    $( '#btnDelDokumen1' ).removeClass( 'delDokumen' );
    $( '#btnDelDokumen1' ).addClass( 'delDokumen' );
    $( '.form-horizontal' ).show();

    $( '#id_dokumen_hapus' ).val( $( '#id_dokumen_rkpd' ).val() );
    $( '.ur_dokumen_del' ).html( $( '#nomor_rkpd' ).val() );

    $( '#HapusDokumen' ).modal( 'show' );
  } );

  $( '.modal-footer' ).on( 'click', '.delDokumen', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: 'renjafinal/hapusDokumen',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_dokumen_rkpd': $( '#id_dokumen_hapus' ).val(),
      },
      success: function ( data ) {
        dokumen_tbl.ajax.reload( null, false );
        $( '#TambahDokumen' ).modal( 'hide' );
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }
      }
    } );
  } );

  $( document ).on( 'click', '#btnLoadData', function () {
    var data = dokumen_tbl.row( $( this ).parents( 'tr' ) ).data();
    var x = data.id_unit_renja;
    var y = data.id_dokumen_ref;
    id_dokumen_temp = data.id_dokumen_ranwal;

    LoadTabelData( x, y );
    UnLoadTabelData( x, y );
    $( '#modalLoadData' ).modal( 'show' );
  } );

  $( document ).on( 'click', '.btnLoad', function () {
    var data = LoadDataTbl.row( $( this ).parents( 'tr' ) ).data();

    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $( '#ModalProgress' ).modal( 'show' );

    $.ajax( {
      type: 'POST',
      url: 'renjafinal/loadData',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_dokumen_renja': id_dokumen_temp,
        'id_program_pd': data.id_program_pd,
      },
      success: function ( data ) {
        createPesan( data.pesan, "success" );
        LoadDataTbl.ajax.reload( null, false );
        UnLoadDataTbl.ajax.reload( null, false );
        $( '#ModalProgress' ).modal( 'hide' );
      },
      error: function ( data ) {
        createPesan( data.pesan, "danger" );
        LoadDataTbl.ajax.reload( null, false );
        UnLoadDataTbl.ajax.reload( null, false );
        $( '#ModalProgress' ).modal( 'hide' );
      }
    } );
  } );

  $( document ).on( 'click', '.btnUnload', function () {
    var data = UnLoadDataTbl.row( $( this ).parents( 'tr' ) ).data();

    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $( '#ModalProgress' ).modal( 'show' );

    $.ajax( {
      type: 'POST',
      url: 'renjafinal/unLoadData',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_program_pd': data.id_program_pd,
      },
      success: function ( data ) {
        createPesan( data.pesan, "success" );
        LoadDataTbl.ajax.reload( null, false );
        UnLoadDataTbl.ajax.reload( null, false );
        $( '#ModalProgress' ).modal( 'hide' );
      },
      error: function ( data ) {
        createPesan( data.pesan, "danger" );
        LoadDataTbl.ajax.reload( null, false );
        UnLoadDataTbl.ajax.reload( null, false );
        $( '#ModalProgress' ).modal( 'hide' );
      }
    } );
  } );

  $( '.modal-footer' ).on( 'click', '#btnPostProgram', function () {
    var status_post, status_temp, status_awal;
    if ( $( '#status_dokumen_posting' ).val() == 0 ) {
      status_post = 1;
      status_temp = 2;
      status_awal = 1;
    } else {
      status_post = 0;
      status_temp = 1;
      status_awal = 2;
    };

    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $( '#StatusProgram' ).modal( 'hide' );
    $( '#ModalProgress' ).modal( 'show' );

    $.ajax( {
      type: 'post',
      url: 'renjafinal/postDokumen',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'tahun_rkpd': $( '#tahun_dokumen_posting' ).val(),
        'id_dokumen_rkpd': $( '#id_dokumen_posting' ).val(),
        'id_unit': $( '#unit_posting' ).val(),
        'flag': status_post,
        'status': status_temp,
        'status_awal': status_awal,
      },
      success: function ( data ) {
        dokumen_tbl.ajax.reload( null, false );
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }
        $( '#ModalProgress' ).modal( 'hide' );
      },
      error: function ( data ) {
        dokumen_tbl.ajax.reload( null, false );
        $( '#ModalProgress' ).modal( 'hide' );
        createPesan( "Data Gagal Diposting (0vdrPD)", "danger" );
      }
    } );
  } );


  $( '#tblDokumen tbody' ).on( 'dblclick', 'tr', function () {
    var data = dokumen_tbl.row( this ).data();
    var x = data.id_unit_renja;
    var y = data.id_dokumen_ranwal;

    $( '.nav-tabs a[href="#program"]' ).tab( 'show' );
    LoadTabelRekapRkpd( x, y );

  } );

} ); //end file