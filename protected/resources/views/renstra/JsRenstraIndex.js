$( document ).ready( function () {

  var detInTujuan = Handlebars.compile( $( "#details-inTujuan" ).html() );
  var detInSasaran = Handlebars.compile( $( "#details-inSasaran" ).html() );
  var detInProgram = Handlebars.compile( $( "#details-inProgram" ).html() );
  var detInKegiatan = Handlebars.compile( $( "#details-inKegiatan" ).html() );

  var id_unit_renstra, id_visi_renstra, id_misi_renstra, id_tujuan_renstra, id_sasaran_renstra, id_kebijakan_renstra, id_strategi_renstra, id_program_renstra;
  var id_indikator_program_renstra, id_kegiatan_renstra, id_indikator_kegiatan_renstra, id_pelaksana_kegiatan_renstra, thn_id, id_sasaran_rpjmd;
  var id_dokumen_renstra, id_dokumen_ref, id_dokumen_rpjmd, sumber_belanja;

  function formatTgl ( val_tanggal ) {
    var formattedDate = new Date( val_tanggal );
    var d = formattedDate.getDate();
    var m = formattedDate.getMonth();
    var y = formattedDate.getFullYear();
    var m_names = new Array( "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember" )
    var tgl = d + " " + m_names[ m ] + " " + y;
    return tgl;
  };

  function hariIni () {
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();

    var hariIni = yyyy + '-' + mm + '-' + dd;
    return hariIni;
  };

  function buatNip ( string ) {
    return string.replace( /(\d{8})(\d{6})(\d{1})(\d{3})/, "$1 $2 $3 $4" );
  };

  function nilaiNip ( string ) {
    return string.replace( /\D/g, '' ).substring( 0, 20 );
  };

  $( '.page-alert .close' ).click( function ( e ) {
    e.preventDefault();
    $( this ).closest( '.page-alert' ).slideUp();
  } );

  $( ".disabled" ).click( function ( e ) {
    e.preventDefault();
    return false;
  } );

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

  function createPesan ( message, type ) {
    var html = '<div id="pesanx" class="alert alert-' + type + ' alert-dismissable flyover flyover-bottom in">';
    html += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
    html += '<p><strong>' + message + '</strong></p>';
    html += '</div>';
    $( html ).hide().prependTo( '#pesan' ).slideDown();

    setTimeout( function () {
      $( '#pesanx' ).removeClass( 'in' );
    }, 3500 );
  };

  function backDokumen () {
    $( '.nav-tabs a[href="#dokumen"]' ).tab( 'show' );
  };

  function backTujuan () {
    $( '.nav-tabs a[href="#tujuan"]' ).tab( 'show' );
  };

  function backSasaran () {
    $( '.nav-tabs a[href="#sasaran"]' ).tab( 'show' );
  };

  function backSasaran1 () {
    $( '.nav-tabs a[href="#sasaran1"]' ).tab( 'show' );
  };

  function backProgram () {
    $( '.nav-tabs a[href="#program1"]' ).tab( 'show' );
  };

  function backKegiatan () {
    $( '.nav-tabs a[href="#kegiatan"]' ).tab( 'show' );
  };

  function backProgramBtl () {
    $( '.nav-tabs a[href="#progbtl"]' ).tab( 'show' );
  };

  function backKegiatanBtl () {
    $( '.nav-tabs a[href="#kegiatanbtl"]' ).tab( 'show' );
  };

  function backProgramPdt () {
    $( '.nav-tabs a[href="#progpdt"]' ).tab( 'show' );
  };

  function backKegiatanPdt () {
    $( '.nav-tabs a[href="#kegiatanpdt"]' ).tab( 'show' );
  };

  $( document ).on( 'click', '.backDokumen', function () {
    backDokumen();
  } );

  $( document ).on( 'click', '.backTujuan', function () {
    backTujuan();
  } );

  $( document ).on( 'click', '.backSasaran', function () {
    backSasaran();
  } );

  $( document ).on( 'click', '.backSasaran1', function () {
    backSasaran1();
  } );

  $( document ).on( 'click', '.backProgram', function () {
    backProgram();
  } );

  $( document ).on( 'click', '.backKegiatan', function () {
    backKegiatan();
  } );

  $( document ).on( 'click', '.backProgramBtl', function () {
    backProgramBtl();
  } );

  $( document ).on( 'click', '.backKegiatanBtl', function () {
    backKegiatanBtl();
  } );

  $( document ).on( 'click', '.backProgramPdt', function () {
    backProgramPdt();
  } );

  $( document ).on( 'click', '.backKegiatanPdt', function () {
    backKegiatanPdt();
  } );

  $( '[data-toggle="popover"]' ).popover();
  $( '#thn_1_dok' ).number( true, 0, ',', '' );
  $( '#thn_5_dok' ).number( true, 0, ',', '' );
  $( '#id_revisi_dok' ).number( true, 0, ',', '' );
  $( '.no_urut' ).number( true, 0, ',', '' );
  $( '.id_revisi' ).number( true, 0, ',', '' );
  $( '#pagu1_edit' ).number( true, 2, ',', '.' );
  $( '#pagu2_edit' ).number( true, 2, ',', '.' );
  $( '#pagu3_edit' ).number( true, 2, ',', '.' );
  $( '#pagu4_edit' ).number( true, 2, ',', '.' );
  $( '#pagu5_edit' ).number( true, 2, ',', '.' );
  $( '#pagu6_edit' ).number( true, 2, ',', '.' );
  $( '#pagu1_cekkeg' ).number( true, 2, ',', '.' );
  $( '#pagu2_cekkeg' ).number( true, 2, ',', '.' );
  $( '#pagu3_cekkeg' ).number( true, 2, ',', '.' );
  $( '#pagu4_cekkeg' ).number( true, 2, ',', '.' );
  $( '#pagu5_cekkeg' ).number( true, 2, ',', '.' );
  $( '#pagu6_cekkeg' ).number( true, 2, ',', '.' );
  $( '#pagu1_edit_kegiatan' ).number( true, 2, ',', '.' );
  $( '#pagu2_edit_kegiatan' ).number( true, 2, ',', '.' );
  $( '#pagu3_edit_kegiatan' ).number( true, 2, ',', '.' );
  $( '#pagu4_edit_kegiatan' ).number( true, 2, ',', '.' );
  $( '#pagu5_edit_kegiatan' ).number( true, 2, ',', '.' );
  $( '#pagu6_edit_kegiatan' ).number( true, 2, ',', '.' );

  $( '#tblDokumen' ).DataTable( { dom: 'BfRtip', } );
  $( '#tblVisi' ).DataTable( { dom: 'BfRtip', } );
  $( '#tblMisi' ).DataTable( { dom: 'BfRtip' } );
  $( '#tblTujuan' ).DataTable( { dom: 'BfRtip' } );
  $( '#tblSasaran' ).DataTable( { dom: 'BfRtip' } );
  $( '#tblKebijakan' ).DataTable( { dom: 'BfRtip' } );
  $( '#tblStrategi' ).DataTable( { dom: 'BfRtip' } );
  $( '#tblProgram' ).DataTable( { dom: 'BfRtip' } );
  $( '#tblKegiatan' ).DataTable( { dom: 'BfRtip' } );
  $( '#tblPelaksana' ).DataTable( { dom: 'BfRtip' } );
  $( '#tblProgramBtl' ).DataTable( { dom: 'BfRtip' } );
  $( '#tblKegiatanBtl' ).DataTable( { dom: 'BfRtip' } );
  $( '#tblPelaksanaBtl' ).DataTable( { dom: 'BfRtip' } );
  $( '#tblProgramPdt' ).DataTable( { dom: 'BfRtip' } );
  $( '#tblKegiatanPdt' ).DataTable( { dom: 'BfRtip' } );
  $( '#tblPelaksanaPdt' ).DataTable( { dom: 'BfRtip' } );

  $.ajax( {
    type: "GET",
    url: './admin/parameter/getUnitUser',
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

  var tbl_Dokumen;
  function loadTblDokumen ( id_unit ) {
    tbl_Dokumen = $( '#tblDokumen' ).DataTable( {
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
      "ajax": { "url": "./renstra/getDokumenRenstra/" + id_unit },
      columns: [
        { data: 'no_urut', 'searchable': false, 'orderable': false, sClass: "dt-center" },
        { data: 'nm_dokumen', 'searchable': false, 'orderable': false },
        { data: 'id_revisi', 'searchable': false, 'orderable': false, sClass: "dt-center" },
        { data: 'nomor_renstra', 'searchable': false, 'orderable': false },
        {
          data: 'tgl_perda_view', 'searchable': false, 'orderable': false, sClass: "dt-center",
        },
        {
          data: 'icon', 'searchable': false, 'orderable': false, sClass: "dt-center", width: "15px",
          render: function ( data, type, row, meta ) {
            return '<i class="' + row.status_icon + '" style="font-size:16px;color:' + row.warna + ';"/>';
          }
        },
        { data: 'action', 'searchable': false, 'orderable': false }
      ]
    } );
  };

  var tbl_Visi;
  function loadTblVisi ( id_unit ) {
    tbl_Visi = $( '#tblVisi' ).DataTable( {
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
      "ajax": { "url": "./renstra/visi/" + id_unit },
      "columns": [
        { data: 'no_urut', sClass: "dt-center" },
        { data: 'uraian_visi_renstra' },
        { data: 'action', 'searchable': false, 'orderable': false, sClass: "dt-center" }
      ],
    } );
  };

  var tbl_Misi;
  function loadTblMisi ( id_unit ) {
    tbl_Misi = $( '#tblMisi' ).DataTable( {
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
      "ajax": { "url": "./renstra/misi/" + id_unit },
      "columns": [
        { data: 'id_visi_renstra', sClass: "dt-center" },
        { data: 'no_urut', sClass: "dt-center" },
        { data: 'uraian_misi_renstra' },
        { data: 'action', 'searchable': false, 'orderable': false, sClass: "dt-center" }
      ],
    } );
  };

  var tbl_Tujuan;
  function loadTblTujuan ( id_unit ) {
    tbl_Tujuan = $( '#tblTujuan' ).DataTable( {
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
      "ajax": { "url": "./renstra/tujuan/" + id_unit },
      "columns": [
        {
          "className": 'details-control',
          "orderable": false,
          "searchable": false,
          "data": null,
          "defaultContent": '',
          "width": "5px"
        },
        // { data: 'kd_misi', sClass: "dt-center"},
        { data: 'no_urut', sClass: "dt-center" },
        { data: 'uraian_tujuan_renstra' },
        { data: 'action', 'searchable': false, 'orderable': false, sClass: "dt-center" }
      ],
    } );
  };

  var tblInTujuan;
  function initInTujuan ( tableId, data ) {
    tblInTujuan = $( '#' + tableId ).DataTable( {
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
      "columns": [
        { data: 'urut', sClass: "dt-center" },
        { data: 'nm_indikator' },
        { data: 'action', 'searchable': false, 'orderable': false, sClass: "dt-center" }
      ],
      "order": [ [ 0, 'asc' ] ],
      "bDestroy": true
    } )

  };

  $( '#tblTujuan tbody' ).on( 'click', 'td.details-control', function () {
    var tr = $( this ).closest( 'tr' );
    var row = tbl_Tujuan.row( tr );
    var tableId = 'inTujuan-' + row.data().id_tujuan_renstra;

    if ( row.child.isShown() ) {
      row.child.hide();
      tr.removeClass( 'shown' );
    } else {
      row.child( detInTujuan( row.data() ) ).show();
      initInTujuan( tableId, row.data() );
      tr.addClass( 'shown' );
      tr.next().find( 'td' ).addClass( 'no-padding bg-gray' );
    }
  } );

  var tbl_Sasaran;
  function loadTblSasaran ( id_unit ) {
    tbl_Sasaran = $( '#tblSasaran' ).DataTable( {
      processing: true,
      serverSide: true,
      responsive: true,
      dom: 'bfrtip',
      autoWidth: false,
      order: [ [ 2, 'asc' ] ],
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
      "ajax": { "url": "./renstra/sasaran/" + id_unit },
      "columns": [
        {
          "className": 'details-control',
          "orderable": false,
          "searchable": false,
          "data": null,
          "defaultContent": '',
          "width": "5px"
        },
        { data: 'kd_tujuan', sClass: "dt-center" },
        { data: 'no_urut', sClass: "dt-center" },
        // { data: 'uraian_sasaran_renstra'},
        {
          data: 'uraian', 'searchable': false, 'orderable': false, sClass: "dt-left",
          render: function ( data, type, row, meta ) {
            return row.uraian_sasaran_renstra +
              '  <span class="label" style="background-color: ' + row.status_warna + '; color:#fff;">' + row.status_label + '</span>'
          }
        },
        { data: 'action', 'searchable': false, 'orderable': false, sClass: "dt-center" }
      ],
    } );
  };

  var tblInSasaran;
  function initInSasaran ( tableId, data ) {
    tblInSasaran = $( '#' + tableId ).DataTable( {
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
      "columns": [
        { data: 'urut', sClass: "dt-center" },
        { data: 'nm_indikator' },
        { data: 'action', 'searchable': false, 'orderable': false, sClass: "dt-center" }
      ],
    } )
  };

  $( '#tblSasaran tbody' ).on( 'click', 'td.details-control', function () {
    var tr = $( this ).closest( 'tr' );
    var row = tbl_Sasaran.row( tr );
    var tableId = 'inSasaran-' + row.data().id_sasaran_renstra;

    if ( row.child.isShown() ) {
      row.child.hide();
      tr.removeClass( 'shown' );
    } else {
      row.child( detInSasaran( row.data() ) ).show();
      initInSasaran( tableId, row.data() );
      tr.addClass( 'shown' );
      tr.next().find( 'td' ).addClass( 'no-padding bg-gray' );
    }
  } );

  var tbl_Kebijakan;
  function loadTblKebijakan ( id_unit ) {
    tbl_Kebijakan = $( '#tblKebijakan' ).DataTable( {
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
      "ajax": { "url": "./renstra/kebijakan/" + id_unit },
      "columns": [
        { data: 'kd_sasaran', sClass: "dt-center" },
        { data: 'no_urut', sClass: "dt-center" },
        { data: 'uraian_kebijakan_renstra' },
        { data: 'action', 'searchable': false, 'orderable': false, sClass: "dt-center" }
      ],
    } );
  };

  var tbl_Strategi;
  function loadTblStrategi ( id_unit ) {
    tbl_Strategi = $( '#tblStrategi' ).DataTable( {
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
      "ajax": { "url": "./renstra/strategi/" + id_unit },
      "columns": [
        { data: 'kd_sasaran', sClass: "dt-center" },
        { data: 'no_urut', sClass: "dt-center" },
        { data: 'uraian_strategi_renstra' },
        { data: 'action', 'searchable': false, 'orderable': false, sClass: "dt-center" }
      ],
    } );
  };

  var tbl_Program;
  function loadTblProgram ( id_unit ) {
    tbl_Program = $( '#tblProgram' ).DataTable( {
      processing: true,
      serverSide: true,
      responsive: true,
      dom: 'bfrtip',
      autoWidth: false,
      order: [ [ 2, 'asc' ] ],
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
      "ajax": { "url": "./renstra/program/" + id_unit },
      "columns": [
        {
          "className": 'details-control',
          "orderable": false,
          "searchable": false,
          "data": null,
          "defaultContent": '',
          "width": "5px"
        },
        { data: 'kd_sasaran', sClass: "dt-center" },
        { data: 'no_urut', sClass: "dt-center" },
        // { data: 'nm_program'},
        {
          data: 'uraian', 'searchable': false, 'orderable': false, sClass: "dt-left",
          render: function ( data, type, row, meta ) {
            return row.nm_program +
              '  <span class="label" style="background-color: ' + row.status_warna + '; color:#fff;">' + row.status_label + '</span>'
          }
        },
        {
          data: 'pagu_tahun1',
          render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"
        },
        {
          data: 'pagu_tahun2',
          render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"
        },
        {
          data: 'pagu_tahun3',
          render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"
        },
        {
          data: 'pagu_tahun4',
          render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"
        },
        {
          data: 'pagu_tahun5',
          render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"
        },
        {
          data: 'pagu_tahun6',
          render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"
        },
        { data: 'action', 'searchable': false, 'orderable': false, sClass: "dt-center" }
      ],
      "columnDefs": [ {
        "visible": false
      } ],
    } );
  };

  var tblInProgram;
  function initInProgram ( tableId, data ) {
    tblInProgram = $( '#' + tableId ).DataTable( {
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
      "columns": [
        { data: 'urut', sClass: "dt-center" },
        { data: 'nm_indikator' },
        { data: 'action', 'searchable': false, 'orderable': false, sClass: "dt-center" }
      ],
    } )
  };

  $( '#tblProgram tbody' ).on( 'click', 'td.details-control', function () {
    var tr = $( this ).closest( 'tr' );
    var row = tbl_Program.row( tr );
    var tableId = 'inProgram-' + row.data().id_program_renstra;

    if ( row.child.isShown() ) {
      row.child.hide();
      tr.removeClass( 'shown' );
    } else {
      row.child( detInProgram( row.data() ) ).show();
      initInProgram( tableId, row.data() );
      tr.addClass( 'shown' );
      tr.next().find( 'td' ).addClass( 'no-padding bg-gray' );
    }
  } );

  var tbl_Kegiatan;
  function loadTblKegiatan ( id_unit ) {
    tbl_Kegiatan = $( '#tblKegiatan' ).DataTable( {
      processing: true,
      serverSide: true,
      responsive: true,
      dom: 'bfrtip',
      autoWidth: false,
      order: [ [ 2, 'asc' ] ],
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
      "ajax": { "url": "./renstra/kegiatan/" + id_unit },
      "columns": [
        {
          "className": 'details-control',
          "orderable": false,
          "searchable": false,
          "data": null,
          "defaultContent": '',
          "width": "5px"
        },
        { data: 'kd_program', sClass: "dt-center" },
        { data: 'no_urut', sClass: "dt-center" },
        { data: 'ur_kegiatan' },
        {
          data: 'pagu_tahun1',
          render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"
        },
        {
          data: 'pagu_tahun2',
          render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"
        },
        {
          data: 'pagu_tahun3',
          render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"
        },
        {
          data: 'pagu_tahun4',
          render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"
        },
        {
          data: 'pagu_tahun5',
          render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"
        },
        {
          data: 'pagu_tahun6',
          render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"
        },
        { data: 'action', 'searchable': false, 'orderable': false, sClass: "dt-center" }
      ],
      "columnDefs": [ { "visible": false } ],
    } );
  };

  var tblInKegiatan;
  function initInKegiatan ( tableId, data ) {
    tblInKegiatan = $( '#' + tableId ).DataTable( {
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
      "columns": [
        { data: 'urut', sClass: "dt-center" },
        { data: 'nm_indikator' },
        { data: 'action', 'searchable': false, 'orderable': false, sClass: "dt-center" }
      ],
    } )
  };

  $( '#tblKegiatan tbody' ).on( 'click', 'td.details-control', function () {
    var tr = $( this ).closest( 'tr' );
    var row = tbl_Kegiatan.row( tr );
    var tableId = 'inKegiatan-' + row.data().id_kegiatan_renstra;

    if ( row.child.isShown() ) {
      row.child.hide();
      tr.removeClass( 'shown' );
    } else {
      row.child( detInKegiatan( row.data() ) ).show();
      initInKegiatan( tableId, row.data() );
      tr.addClass( 'shown' );
      tr.next().find( 'td' ).addClass( 'no-padding bg-gray' );
    }
  } );

  var tbl_Pelaksana;
  function loadTblPelaksana ( id_unit ) {
    tbl_Pelaksana = $( '#tblPelaksana' ).DataTable( {
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
      "ajax": { "url": "./renstra/kegiatanpelaksana/" + id_unit },
      "columns": [
        { data: 'kd_kegiatan', sClass: "dt-center" },
        { data: 'kd_sub', sClass: "dt-center" },
        { data: 'nm_sub' },
        { data: 'action', 'searchable': false, 'orderable': false, sClass: "dt-center" }
      ],
    } );
  };

  var tbl_ProgramBtl;
  function loadTblProgramBtl ( id_unit ) {
    tbl_ProgramBtl = $( '#tblProgramBtl' ).DataTable( {
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
      "ajax": { "url": "./renstra/getProgramBtl/" + id_unit },
      "columns": [
        { data: 'no_urut', sClass: "dt-center" },
        { data: 'kd_program', sClass: "dt-center" },
        // { data: 'uraian_program_renstra'},
        {
          data: 'uraian', 'searchable': false, 'orderable': false, sClass: "dt-left",
          render: function ( data, type, row, meta ) {
            return row.uraian_program_renstra +
              '  <span class="label" style="background-color: ' + row.status_warna + '; color:#fff;">' + row.status_label + '</span>'
          }
        },
        {
          data: 'pagu_tahun1',
          render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"
        },
        {
          data: 'pagu_tahun2',
          render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"
        },
        {
          data: 'pagu_tahun3',
          render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"
        },
        {
          data: 'pagu_tahun4',
          render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"
        },
        {
          data: 'pagu_tahun5',
          render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"
        },
        {
          data: 'pagu_tahun6',
          render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"
        },
        { data: 'action', 'searchable': false, 'orderable': false, sClass: "dt-center" }
      ],
      "columnDefs": [ {
        "visible": false
      } ],
    } );
  };

  var tbl_KegiatanBtl;
  function loadTblKegiatanBtl ( id_unit ) {
    tbl_KegiatanBtl = $( '#tblKegiatanBtl' ).DataTable( {
      processing: true,
      serverSide: true,
      responsive: true,
      dom: 'bfrtip',
      autoWidth: false,
      order: [ [ 2, 'asc' ] ],
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
      "ajax": { "url": "./renstra/kegiatanBtl/" + id_unit },
      "columns": [
        { data: 'kd_program', sClass: "dt-center" },
        { data: 'no_urut', sClass: "dt-center" },
        { data: 'ur_kegiatan' },
        {
          data: 'pagu_tahun1',
          render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"
        },
        {
          data: 'pagu_tahun2',
          render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"
        },
        {
          data: 'pagu_tahun3',
          render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"
        },
        {
          data: 'pagu_tahun4',
          render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"
        },
        {
          data: 'pagu_tahun5',
          render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"
        },
        {
          data: 'pagu_tahun6',
          render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"
        },
        { data: 'action', 'searchable': false, 'orderable': false, sClass: "dt-center" }
      ],
      "columnDefs": [ {
        "visible": false
      } ],
    } );
  };

  var tbl_PelaksanaBtl;
  function loadTblPelaksanaBtl ( id_unit ) {
    tbl_PelaksanaBtl = $( '#tblPelaksanaBtl' ).DataTable( {
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
      "ajax": { "url": "./renstra/kegiatanpelaksanaBtl/" + id_unit },
      "columns": [
        { data: 'kd_kegiatan', sClass: "dt-center" },
        { data: 'kd_sub', sClass: "dt-center" },
        { data: 'nm_sub' },
        { data: 'action', 'searchable': false, 'orderable': false, sClass: "dt-center" }
      ],
    } );
  };

  var tbl_ProgramPdt;
  function loadTblProgramPdt ( id_unit ) {
    tbl_ProgramPdt = $( '#tblProgramPdt' ).DataTable( {
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
      "ajax": { "url": "./renstra/getProgramPdt/" + id_unit },
      "columns": [
        { data: 'no_urut', sClass: "dt-center" },
        { data: 'kd_program', sClass: "dt-center" },
        {
          data: 'uraian', 'searchable': false, 'orderable': false, sClass: "dt-left",
          render: function ( data, type, row, meta ) {
            return row.uraian_program_renstra +
              '  <span class="label" style="background-color: ' + row.status_warna + '; color:#fff;">' + row.status_label + '</span>'
          }
        },
        {
          data: 'pagu_tahun1',
          render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"
        },
        {
          data: 'pagu_tahun2',
          render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"
        },
        {
          data: 'pagu_tahun3',
          render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"
        },
        {
          data: 'pagu_tahun4',
          render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"
        },
        {
          data: 'pagu_tahun5',
          render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"
        },
        {
          data: 'pagu_tahun6',
          render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"
        },
        { data: 'action', 'searchable': false, 'orderable': false, sClass: "dt-center" }
      ],
      "columnDefs": [ {
        "visible": false
      } ],
    } );
  };

  var tbl_KegiatanPdt;
  function loadTblKegiatanPdt ( id_unit ) {
    tbl_KegiatanPdt = $( '#tblKegiatanPdt' ).DataTable( {
      processing: true,
      serverSide: true,
      responsive: true,
      dom: 'bfrtip',
      autoWidth: false,
      order: [ [ 2, 'asc' ] ],
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
      "ajax": { "url": "./renstra/kegiatanPdt/" + id_unit },
      "columns": [
        { data: 'kd_program', sClass: "dt-center" },
        { data: 'no_urut', sClass: "dt-center" },
        { data: 'ur_kegiatan' },
        {
          data: 'pagu_tahun1',
          render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"
        },
        {
          data: 'pagu_tahun2',
          render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"
        },
        {
          data: 'pagu_tahun3',
          render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"
        },
        {
          data: 'pagu_tahun4',
          render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"
        },
        {
          data: 'pagu_tahun5',
          render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"
        },
        {
          data: 'pagu_tahun6',
          render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"
        },
        { data: 'action', 'searchable': false, 'orderable': false, sClass: "dt-center" }
      ],
      "columnDefs": [ {
        "visible": false
      } ],
    } );
  };

  var tbl_PelaksanaPdt;
  function loadTblPelaksanaPdt ( id_unit ) {
    tbl_PelaksanaPdt = $( '#tblPelaksanaPdt' ).DataTable( {
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
      "ajax": { "url": "./renstra/kegiatanpelaksanaPdt/" + id_unit },
      "columns": [
        { data: 'kd_kegiatan', sClass: "dt-center" },
        { data: 'kd_sub', sClass: "dt-center" },
        { data: 'nm_sub' },
        { data: 'action', 'searchable': false, 'orderable': false, sClass: "dt-center" }
      ],
    } );
  };

  var cariindikator
  $( document ).on( 'click', '.btnCariIndi', function () {
    $( '#judulModal' ).text( 'Daftar Indikator yang terdapat dalam RPJMD/Renstra' );
    $( '#cariIndikator' ).modal( 'show' );

    cariindikator = $( '#tblCariIndikator' ).DataTable( {
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
      "ajax": { "url": "./admin/parameter/getRefIndikator" },
      "columns": [
        { data: 'no_urut' },
        { data: 'nm_indikator' },
        { data: 'uraian_satuan' },
        { data: 'type_display' },
        { data: 'kualitas_display' },
        { data: 'jenis_display' },
        { data: 'sifat_display' }
      ],
    } );
  } );

  $( '#tblCariIndikator tbody' ).on( 'dblclick', 'tr', function () {
    var data = cariindikator.row( this ).data();

    document.getElementById( "ur_indikator_tujuan_renstra" ).value = data.nm_indikator;
    document.getElementById( "kd_indikator_tujuan_renstra" ).value = data.id_indikator;
    document.getElementById( "satuan_tujuan_indikator_edit" ).value = data.uraian_satuan;

    document.getElementById( "ur_indikator_sasaran_renstra" ).value = data.nm_indikator;
    document.getElementById( "kd_indikator_sasaran_renstra" ).value = data.id_indikator;
    document.getElementById( "satuan_sasaran_indikator_edit" ).value = data.uraian_satuan;

    document.getElementById( "ur_indikator_program_renstra" ).value = data.nm_indikator;
    document.getElementById( "kd_indikator_program_renstra" ).value = data.id_indikator;
    document.getElementById( "satuan_program_indikator_edit" ).value = data.uraian_satuan;

    document.getElementById( "ur_indikator_kegiatan_renstra" ).value = data.nm_indikator;
    document.getElementById( "kd_indikator_kegiatan_renstra" ).value = data.id_indikator;
    document.getElementById( "satuan_kegiatan_indikator_edit" ).value = data.uraian_satuan;

    $( '#cariIndikator' ).modal( 'hide' );
  } );


  var cariindikatorrpjmd
  $( document ).on( 'click', '.btnCariIndiSasaranRpjmd', function () {
    $( '#judulModal' ).text( 'Daftar Indikator yang terdapat dalam RPJMD/Renstra' );
    $( '#ModalCariSasaranIndikatorRpjmd' ).modal( 'show' );

    cariindikatorrpjmd = $( '#tblCariSasaranIndikatorRpjmd' ).DataTable( {
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
      "ajax": { "url": "./renstra/getIndikatorSasaranRpjmd/" + $( '#id_indikator_sasaran_rpjmd_x' ).val() },
      "columns": [
        { data: 'no_urut' },
        { data: 'uraian_sasaran_rpjmd' },
        { data: 'nm_indikator' },
        {
          data: 'angka_tahun1',
          render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"
        },
        {
          data: 'angka_tahun2',
          render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"
        },
        {
          data: 'angka_tahun3',
          render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"
        },
        {
          data: 'angka_tahun4',
          render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"
        },
        {
          data: 'angka_tahun5',
          render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"
        },
        {
          data: 'angka_akhir_periode',
          render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"
        },
        { data: 'uraian_satuan' }
      ],
    } );
  } );

  $.ajax( {
    type: "GET",
    url: './renstra/getJnsDokumen',
    dataType: "json",

    success: function ( data ) {
      var j = data.length;
      var post, i;

      $( 'select[name="cb_jns_dokumen"]' ).empty();
      $( 'select[name="cb_jns_dokumen"]' ).append( '<option value="-1">---Pilih Jenis Dokumen Renstra---</option>' );

      for ( i = 0; i < j; i++ ) {
        post = data[ i ];
        $( 'select[name="cb_jns_dokumen"]' ).append( '<option value="' + post.id_dokumen + '">' + post.nm_dokumen + '</option>' );
      }
    }
  } );

  $.ajax( {
    type: "GET",
    url: './renstra/getDokumenRpjmd',
    dataType: "json",
    success: function ( data ) {
      var j = data.length;
      var post, i;
      $( 'select[name="cb_ref_rpjmd"]' ).empty();
      $( 'select[name="cb_ref_rpjmd"]' ).append( '<option value="-1">---Pilih Dokumen RPJMD Referensi---</option>' );
      $( 'select[name="cb_ref_rpjmd"]' ).append( '<option value="0">---Tidak ada Dokumen Referensi---</option>' );
      for ( i = 0; i < j; i++ ) {
        post = data[ i ];
        $( 'select[name="cb_ref_rpjmd"]' ).append( '<option value="' + post.id_rpjmd + '">' + post.no_perda + '</option>' );
      }
    }
  } );


  $( '#tblCariSasaranIndikatorRpjmd tbody' ).on( 'dblclick', 'tr', function () {
    var data = cariindikatorrpjmd.row( this ).data();
    document.getElementById( "ur_indikator_sasaran_rpjmd" ).value = data.nm_indikator;
    document.getElementById( "id_indikator_sasaran_rpjmd_x" ).value = data.id_sasaran_renstra;
    document.getElementById( "id_indikator_sasaran_rpjmd" ).value = data.id_indikator_sasaran_renstra;
    $( '#ModalCariSasaranIndikatorRpjmd' ).modal( 'hide' );
  } );

  $( '#tblDokumen tbody' ).on( 'dblclick', 'tr', function () {
    var data = tbl_Dokumen.row( this ).data();
    id_renstra = data.id_renstra;
    id_misi_renstra = data.id_renstra;
    thn_id = data.thn_id;
    $( '#no_dokumen_tujuan' ).text( data.nomor_renstra );
    $( '.nav-tabs a[href="#tujuan"]' ).tab( 'show' );
    loadTblTujuan( id_misi_renstra );
  } );

  $( '#tblVisi tbody' ).on( 'dblclick', 'tr', function () {
    var data = tbl_Visi.row( this ).data();
    id_visi_renstra = data.id_visi_renstra;
    thn_id = data.thn_id;
    $( '.nav-tabs a[href="#misi"]' ).tab( 'show' );
    loadTblMisi( id_visi_renstra );
  } );

  $( '#tblMisi tbody' ).on( 'dblclick', 'tr', function () {
    var data = tbl_Misi.row( this ).data();
    id_misi_renstra = data.id_misi_renstra;
    thn_id = data.thn_id;
    $( '.nav-tabs a[href="#tujuan"]' ).tab( 'show' );
    loadTblTujuan( id_misi_renstra );
  } );

  $( '#tblTujuan tbody' ).on( 'dblclick', 'tr', function () {
    var data = tbl_Tujuan.row( this ).data();
    id_tujuan_renstra = data.id_tujuan_renstra;
    $( '#no_dokumen_sasaran' ).text( $( '#no_dokumen_tujuan' ).text() );
    $( '#uraian_tujuan_sasaran' ).text( data.uraian_tujuan_renstra );
    $( '.nav-tabs a[href="#sasaran"]' ).tab( 'show' );
    $( '.nav-tabs a[href="#sasaran1"]' ).tab( 'show' );
    loadTblSasaran( id_tujuan_renstra );
  } );

  $( '#tblSasaran tbody' ).on( 'dblclick', 'tr', function () {
    var data = tbl_Sasaran.row( this ).data();
    id_sasaran_renstra = data.id_sasaran_renstra;
    id_sasaran_rpjmd = data.id_sasaran_rpjmd;
    $( '#no_dokumen_program' ).text( $( '#no_dokumen_sasaran' ).text() );
    $( '#uraian_tujuan_program' ).text( $( '#uraian_tujuan_sasaran' ).text() );
    $( '#uraian_sasaran_program' ).text( data.uraian_sasaran_renstra );
    $( '.nav-tabs a[href="#program"]' ).tab( 'show' );
    $( '.nav-tabs a[href="#program1"]' ).tab( 'show' );
    loadTblProgram( id_sasaran_renstra );
  } );

  $( '#tblProgram tbody' ).on( 'dblclick', 'tr', function () {
    var data = tbl_Program.row( this ).data();
    id_program_renstra = data.id_program_renstra;
    id_program_ref = data.id_program_ref;
    sumber_belanja = 0;
    $( '#uraian_program_kegiatan' ).text( data.nm_program );
    $( '.nav-tabs a[href="#kegiatan"]' ).tab( 'show' );
    loadTblKegiatan( id_program_renstra );
  } );

  $( '#tblProgramBtl tbody' ).on( 'dblclick', 'tr', function () {
    var data = tbl_ProgramBtl.row( this ).data();
    id_program_renstra = data.id_program_renstra;
    id_program_ref = data.id_program_ref;
    sumber_belanja = 1;
    $( '#uraian_program_kegiatan_btl' ).text( data.nm_program );
    $( '.nav-tabs a[href="#kegiatanbtl"]' ).tab( 'show' );
    loadTblKegiatanBtl( id_program_renstra );
  } );

  $( '#tblProgramPdt tbody' ).on( 'dblclick', 'tr', function () {
    var data = tbl_ProgramPdt.row( this ).data();
    id_program_renstra = data.id_program_renstra;
    id_program_ref = data.id_program_ref;
    sumber_belanja = 2;
    $( '#uraian_program_kegiatan_pdt' ).text( data.nm_program );
    $( '.nav-tabs a[href="#kegiatanpdt"]' ).tab( 'show' );
    loadTblKegiatanPdt( id_program_renstra );
  } );

  $( '#tblKegiatan tbody' ).on( 'dblclick', 'tr', function () {
    var data = tbl_Kegiatan.row( this ).data();
    id_kegiatan_renstra = data.id_kegiatan_renstra;
    sumber_belanja = 0;
    $( '#uraian_program_pelaksana' ).text( $( '#uraian_program_kegiatan' ).text() );
    $( '#uraian_kegiatan_pelaksana' ).text( data.nm_kegiatan );
    $( '.nav-tabs a[href="#pelaksana"]' ).tab( 'show' );
    loadTblPelaksana( id_kegiatan_renstra );
  } );

  $( '#tblKegiatanBtl tbody' ).on( 'dblclick', 'tr', function () {
    var data = tbl_KegiatanBtl.row( this ).data();
    id_kegiatan_renstra = data.id_kegiatan_renstra;
    sumber_belanja = 1;
    $( '#uraian_program_pelaksana_btl' ).text( $( '#uraian_program_kegiatan_btl' ).text() );
    $( '#uraian_kegiatan_pelaksana_btl' ).text( data.nm_kegiatan );
    $( '.nav-tabs a[href="#pelaksanabtl"]' ).tab( 'show' );
    loadTblPelaksanaBtl( id_kegiatan_renstra );
  } );

  $( '#tblKegiatanPdt tbody' ).on( 'dblclick', 'tr', function () {
    var data = tbl_KegiatanPdt.row( this ).data();
    id_kegiatan_renstra = data.id_kegiatan_renstra;
    sumber_belanja = 2;
    $( '#uraian_program_pelaksana_pdt' ).text( $( '#uraian_program_kegiatan_pdt' ).text() );
    $( '#uraian_kegiatan_pelaksana_pdt' ).text( data.nm_kegiatan );
    $( '.nav-tabs a[href="#pelaksanapdt"]' ).tab( 'show' );
    loadTblPelaksanaPdt( id_kegiatan_renstra );
  } );

  $( document ).on( 'click', '.view-renstrakebijakan', function () {
    var data = tbl_Sasaran.row( $( this ).parents( 'tr' ) ).data();
    id_sasaran_renstra = data.id_sasaran_renstra;
    sumber_belanja = 0;
    $( '#uraian_sasaran_kebijakan' ).text( data.uraian_sasaran_renstra );
    $( '.nav-tabs a[href="#kebijakan"]' ).tab( 'show' );
    loadTblKebijakan( id_sasaran_renstra );
  } );

  $( document ).on( 'click', '.view-renstrastrategi', function () {
    var data = tbl_Sasaran.row( $( this ).parents( 'tr' ) ).data();
    id_sasaran_renstra = data.id_sasaran_renstra;
    sumber_belanja = 0;
    $( '#uraian_sasaran_strategi' ).text( data.uraian_sasaran_renstra );
    $( '.nav-tabs a[href="#strategi"]' ).tab( 'show' );
    loadTblStrategi( id_sasaran_renstra );
  } );

  $( document ).on( 'click', '.view-kegiatanpelaksana', function () {
    var data = tbl_Kegiatan.row( $( this ).parents( 'tr' ) ).data();
    id_kegiatan_renstra = data.id_kegiatan_renstra;
    sumber_belanja = 0;
    $( '#uraian_program_pelaksana' ).text( $( '#uraian_program_kegiatan' ).text() );
    $( '#uraian_kegiatan_pelaksana' ).text( data.nm_kegiatan );
    $( '.nav-tabs a[href="#pelaksana"]' ).tab( 'show' );
    loadTblPelaksana( id_kegiatan_renstra );
  } );

  $( document ).on( 'click', '.btnViewTujuan', function () {
    var data = tbl_Dokumen.row( $( this ).parents( 'tr' ) ).data();
    id_renstra = data.id_renstra;
    thn_id = data.thn_id;
    sumber_belanja = 0;
    $( '#no_dokumen_tujuan' ).text( data.nomor_renstra );
    $( '.nav-tabs a[href="#tujuan"]' ).tab( 'show' );
    loadTblTujuan( id_renstra );
  } );

  $( document ).on( 'click', '.btnViewBtl', function () {
    var data = tbl_Dokumen.row( $( this ).parents( 'tr' ) ).data();
    id_renstra = data.id_renstra;
    thn_id = data.thn_id;
    $.ajax( {
      type: "GET",
      url: './renstra/getSasaranJson/99/' + data.id_rpjmd,
      dataType: "json",
      success: function ( data ) {
        id_sasaran_rpjmd = data[ 0 ].id_sasaran_rpjmd;
      }
    } );
    sumber_belanja = 1;
    $( '#no_dokumen_btl' ).text( data.nomor_renstra );
    $( '.nav-tabs a[href="#btl"]' ).tab( 'show' );
    $( '.nav-tabs a[href="#progbtl"]' ).tab( 'show' );
    loadTblProgramBtl( id_renstra );
  } );

  $( document ).on( 'click', '.btnViewPdt', function () {
    var data = tbl_Dokumen.row( $( this ).parents( 'tr' ) ).data();
    id_renstra = data.id_renstra;
    thn_id = data.thn_id;
    $.ajax( {
      type: "GET",
      url: './renstra/getSasaranJson/98/' + data.id_rpjmd,
      dataType: "json",
      success: function ( data ) {
        id_sasaran_rpjmd = data[ 0 ].id_sasaran_rpjmd;
      }
    } );
    sumber_belanja = 2;
    $( '#no_dokumen_pdt' ).text( data.nomor_renstra );
    $( '.nav-tabs a[href="#pendapatan"]' ).tab( 'show' );
    $( '.nav-tabs a[href="#progpdt"]' ).tab( 'show' );
    loadTblProgramPdt( id_renstra );
  } );

  $( document ).on( 'click', '.btnViewDok', function () {
    var data = tbl_Dokumen.row( $( this ).parents( 'tr' ) ).data();
    $( '.btnDokumen' ).addClass( 'editDokumen' );
    $( '.btnDokumen' ).removeClass( 'addDokumen' );
    $( '.modal-title' ).text( 'Data Dokumen Perencanaan Perangkat Daerah' );
    $( '.form-horizontal' ).show();
    $( '#id_renstra_dok' ).val( data.id_renstra );
    $( '#cb_ref_rpjmd' ).val( data.id_rpjmd );
    $( '#cb_jns_dokumen' ).val( data.jns_dokumen );
    $( '#cb_ref_dokumen' ).val( data.id_renstra_ref );
    $( '#id_revisi_dok' ).val( data.id_revisi );
    $( '#thn_1_dok' ).val( data.tahun_1 );
    $( '#thn_5_dok' ).val( data.tahun_5 );
    $( '#no_perda_dok' ).val( data.nomor_renstra );
    $( '#tgl_perda_dok' ).val( data.tanggal_renstra );
    $( '#tgl_perda_dok_x' ).val( formatTgl( data.tanggal_renstra ) );
    $( '#uraian_perda_dok' ).val( data.uraian_renstra );
    $( '#jabatan_pimpinan' ).val( data.jabatan_pimpinan );
    $( '#nama_tandatangan' ).val( data.nm_pimpinan );
    $( '#nip_tandatangan' ).val( data.nip_pimpinan );
    if ( data.nip_pimpinan == null ) {
      $( '#nip_tandatangan_display' ).val( null );
    } else {
      $( '#nip_tandatangan_display' ).val( buatNip( data.nip_pimpinan ) );
    };
    if ( data.sumber_data == 0 ) {
      $( '#btnDelDokumen' ).hide();
    } else {
      $( '#btnDelDokumen' ).show();
    };

    $( '#ModalDokumen' ).modal( 'show' );
  } );

  $( document ).on( 'click', '.btnAddDokumen', function () {
    $( '.btnDokumen' ).addClass( 'addDokumen' );
    $( '.btnDokumen' ).removeClass( 'editDokumen' );
    $( '.modal-title' ).text( 'Data Dokumen Perencanaan Perangkat Daerah' );
    $( '.form-horizontal' ).show();
    $( '#id_renstra_dok' ).val( null );
    $( '#cb_ref_rpjmd' ).val( -1 );
    $( '#cb_jns_dokumen' ).val( -1 );
    $( '#cb_ref_dokumen' ).val( -1 );
    $( '#id_revisi_dok' ).val( 0 );
    $( '#thn_1_dok' ).val( null );
    $( '#thn_5_dok' ).val( null );
    $( '#no_perda_dok' ).val( null );
    $( '#tgl_perda_dok' ).val( hariIni() );
    $( '#tgl_perda_dok_x' ).val( formatTgl( hariIni() ) );
    $( '#uraian_perda_dok' ).val( null );
    $( '#jabatan_pimpinan' ).val( 'Kepala' );
    $( '#nama_tandatangan' ).val( null );
    $( '#nip_tandatangan_display' ).val( null );
    $( '#nip_tandatangan' ).val( null );
    $( '#btnDelDokumen' ).hide();
    $( '#ModalDokumen' ).modal( 'show' );
  } );

  $( '.modal-footer' ).on( 'click', '.addDokumen', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: './renstra/addDokumen',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_rpjmd': $( '#cb_ref_rpjmd' ).val(),
        'id_renstra_ref': $( '#cb_ref_dokumen' ).val(),
        'id_unit': id_unit_renstra,
        'nomor_renstra': $( '#no_perda_dok' ).val(),
        'tanggal_renstra': $( '#tgl_perda_dok' ).val(),
        'uraian_renstra': $( '#uraian_perda_dok' ).val(),
        'nm_pimpinan': $( '#nama_tandatangan' ).val(),
        'nip_pimpinan': $( '#nip_tandatangan' ).val(),
        'jns_dokumen': $( '#cb_jns_dokumen' ).val(),
        'id_revisi': $( '#id_revisi_dok' ).val(),
      },
      success: function ( data ) {
        tbl_Dokumen.ajax.reload( null, false );
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }
      }
    } );
  } );

  $( '.modal-footer' ).on( 'click', '.editDokumen', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: './renstra/editDokumen',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_renstra': $( '#id_renstra_dok' ).val(),
        'id_rpjmd': $( '#cb_ref_rpjmd' ).val(),
        'id_renstra_ref': $( '#cb_ref_dokumen' ).val(),
        'id_unit': id_unit_renstra,
        'nomor_renstra': $( '#no_perda_dok' ).val(),
        'tanggal_renstra': $( '#tgl_perda_dok' ).val(),
        'uraian_renstra': $( '#uraian_perda_dok' ).val(),
        'nm_pimpinan': $( '#nama_tandatangan' ).val(),
        'nip_pimpinan': $( '#nip_tandatangan' ).val(),
        'jns_dokumen': $( '#cb_jns_dokumen' ).val(),
        'id_revisi': $( '#id_revisi_dok' ).val(),
      },
      success: function ( data ) {
        tbl_Dokumen.ajax.reload( null, false );
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }
      }
    } );
  } );

  $( '.modal-footer' ).on( 'click', '.btnDelDokumen', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: './renstra/deleteDokumen',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_renstra': $( '#id_renstra_dok' ).val(),
      },
      success: function ( data ) {
        tbl_Dokumen.ajax.reload( null, false );
        $( '#ModalDokumen' ).modal( 'hide' );
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }
      }
    } );
  } );

  $( document ).on( 'click', '.btnPostingDok', function () {
    var data = tbl_Dokumen.row( $( this ).parents( 'tr' ) ).data();
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: './renstra/PostingDok',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_renstra': data.id_renstra,
        'status_data': data.id_status_dokumen,
      },
      success: function ( data ) {
        tbl_Dokumen.ajax.reload( null, false );
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }
      }
    } );
  } );


  $( '#ModalDokumen' ).on( 'hidden.bs.modal', function () {
    $.ajax( {
      type: "GET",
      url: './renstra/getDokumenRef?jns=0&unit=' + $( '#id_unit' ).val(),
      dataType: "json",
      success: function ( data ) {
        var j = data.length;
        var post, i;
        $( 'select[name="cb_ref_dokumen"]' ).empty();
        $( 'select[name="cb_ref_dokumen"]' ).append( '<option value="-1">---Pilih Dokumen Renstra Referensi---</option>' );
        $( 'select[name="cb_ref_dokumen"]' ).append( '<option value="0">---Tidak ada Dokumen Referensi---</option>' );
        for ( i = 0; i < j; i++ ) {
          post = data[ i ];
          $( 'select[name="cb_ref_dokumen"]' ).append( '<option value="' + post.id_renstra + '">' + post.nomor_renstra + '</option>' );
        }
      }
    } );
  } );

  $( ".cbUnit" ).change( function () {
    id_unit_renstra = $( '#id_unit' ).val();
    $.ajax( {
      type: "GET",
      url: './renstra/getDokumenRef?jns=0&unit=' + $( '#id_unit' ).val(),
      dataType: "json",
      success: function ( data ) {
        var j = data.length;
        var post, i;
        $( 'select[name="cb_ref_dokumen"]' ).empty();
        $( 'select[name="cb_ref_dokumen"]' ).append( '<option value="-1">---Pilih Dokumen Renstra Referensi---</option>' );
        $( 'select[name="cb_ref_dokumen"]' ).append( '<option value="0">---Tidak ada Dokumen Referensi---</option>' );
        for ( i = 0; i < j; i++ ) {
          post = data[ i ];
          $( 'select[name="cb_ref_dokumen"]' ).append( '<option value="' + post.id_renstra + '">' + post.nomor_renstra + '</option>' );
        }
      }
    } );
    loadTblDokumen( id_unit_renstra );
  } );

  $( ".cb_jns_dokumen" ).change( function () {
    var jns, xyz;
    xyz = parseInt( $( "#cb_jns_dokumen" ).val(), 10 );
    switch ( xyz ) {
      case 24:
        jns = 0;
        break;
      case 7:
        jns = 24;
        break;
      case 27:
        jns = 7;
        break;
      case 26:
        jns = 27;
        break;
      case 25:
        jns = 26;
        break;
      case 8:
        jns = 25;
        break;
      case 9:
        jns = 8;
        break;
      case 23:
        jns = 9;
        break;
      case 10:
        jns = 23;
    }

    $.ajax( {
      type: "GET",
      url: './renstra/getDokumenRef?jns=' + jns + '&unit=' + $( '#id_unit' ).val(),
      dataType: "json",
      success: function ( data ) {
        var j = data.length;
        var post, i;
        $( 'select[name="cb_ref_dokumen"]' ).empty();
        $( 'select[name="cb_ref_dokumen"]' ).append( '<option value="-1">---Pilih Dokumen Renstra Referensi---</option>' );
        $( 'select[name="cb_ref_dokumen"]' ).append( '<option value="0">---Tidak ada Dokumen Referensi---</option>' );
        for ( i = 0; i < j; i++ ) {
          post = data[ i ];
          $( 'select[name="cb_ref_dokumen"]' ).append( '<option value="' + post.id_renstra + '">' + post.nomor_renstra + '</option>' );
        }
      }
    } );
  } );


  $( document ).on( 'click', '.btnDetailVisi', function () {
    var data = tbl_Visi.row( $( this ).parents( 'tr' ) ).data();
    $( '.modal-title' ).text( 'Detail Data Visi Rentra' );
    $( '#id_visi_renstra_edit' ).val( data.id_visi_renstra );
    $( '#id_renstra_edit' ).val();
    $( '#thn_id_edit' ).val( data.thn_id );
    $( '#thn_periode_visi' ).val( data.thn_periode );
    $( '#no_urut_edit' ).val( data.no_urut );
    $( '#id_perubahan_edit' ).val( data.id_perubahan );
    $( '#ur_visi_renstra_edit' ).val( data.uraian_visi_renstra );
    $( '.form-horizontal' ).show();
    $( '#ModalVisi' ).modal( 'show' );

  } );

  $( document ).on( 'click', '.btnDetailMisi', function () {
    var data = tbl_Misi.row( $( this ).parents( 'tr' ) ).data();
    $( '.modal-title' ).text( 'Detail Data Misi Rentra' );
    $( '#id_misi_renstra_edit' ).val( data.id_misi_renstra );
    $( '#thn_id_misi_edit' ).val( data.thn_id );
    $( '#id_visi_renstra_misi_edit' ).val( data.id_visi_renstra );
    $( '#no_urut_misi_edit' ).val( data.no_urut );
    $( '#id_perubahan_misi_edit' ).val( data.id_perubahan );
    $( '#ur_misi_renstra_edit' ).val( data.uraian_misi_renstra );
    $( '.form-horizontal' ).show();
    $( '#ModalMisi' ).modal( 'show' );

  } );

  $( document ).on( 'click', '.btnDetailTujuan', function () {
    var data = tbl_Tujuan.row( $( this ).parents( 'tr' ) ).data();
    $( '.btnAddTujuan' ).removeClass( 'addTujuan' );
    $( '.btnAddTujuan' ).addClass( 'editTujuan' );
    $( '.modal-title' ).text( 'Detail Data Tujuan Rentra' );
    $( '#id_tujuan_renstra_edit' ).val( data.id_tujuan_renstra );
    $( '#thn_id_tujuan_edit' ).val( data.thn_id );
    $( '#id_misi_renstra_tujuan_edit' ).val( data.id_misi_renstra );
    $( '#id_misi_tujuan_edit' ).val( data.kd_misi );
    $( '#no_urut_tujuan_edit' ).val( data.no_urut );
    $( '#id_perubahan_tujuan_edit' ).val( data.id_perubahan );
    $( '#ur_tujuan_renstra_edit' ).val( data.uraian_tujuan_renstra );
    if ( data.sumber_data == 0 ) {
      $( '.btnHapusTujuan' ).hide();
    } else {
      $( '.btnHapusTujuan' ).show();
    };

    $( '.form-horizontal' ).show();
    $( '#ModalTujuan' ).modal( 'show' );
  } );

  $( document ).on( 'click', '.btnTambahTujuan', function () {
    $( '.btnAddTujuan' ).addClass( 'addTujuan' );
    $( '.btnAddTujuan' ).removeClass( 'editTujuan' );
    $( '.modal-title' ).text( 'Tambah Tujuan Renstra APBD' );
    $( '#id_misi_tujuan_edit' ).val( null );
    $( '#id_tujuan_renstra_edit' ).val( null );
    $( '#thn_id_tujuan_edit' ).val( thn_id );
    $( '#no_urut_tujuan_edit' ).val( 1 );
    $( '#id_misi_renstra_tujuan_edit' ).val( id_misi_renstra );
    $( '#id_perubahan_tujuan_edit' ).val( 1 );
    $( '#ur_tujuan_renstra_edit' ).val( null );

    $( '.form-horizontal' ).show();
    $( '#ModalTujuan' ).modal( 'show' );
  } );

  $( '.modal-footer' ).on( 'click', '.addTujuan', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: 'renstra/addTujuanRenstra',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'no_urut': $( '#no_urut_tujuan_edit' ).val(),
        'id_renstra': id_renstra,
        'id_perubahan': $( '#id_perubahan_tujuan_edit' ).val(),
        'uraian_tujuan_renstra': $( '#ur_tujuan_renstra_edit' ).val(),
      },
      success: function ( data ) {
        $( '#tblTujuan' ).DataTable().ajax.reload( null, false );
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }
      }
    } );
  } );

  $( '.modal-footer' ).on( 'click', '.editTujuan', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: 'renstra/editTujuanRenstra',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'no_urut': $( '#no_urut_tujuan_edit' ).val(),
        'id_tujuan_renstra': $( '#id_tujuan_renstra_edit' ).val(),
        'id_perubahan': $( '#id_perubahan_tujuan_edit' ).val(),
        'uraian_tujuan_renstra': $( '#ur_tujuan_renstra_edit' ).val(),
      },
      success: function ( data ) {
        $( '#tblTujuan' ).DataTable().ajax.reload( null, false );
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }
      }
    } );
  } );

  $( document ).on( 'click', '.btnHapusTujuan', function () {
    $( '#id_tujuan_renstra_hapus' ).val( $( '#id_tujuan_renstra_edit' ).val() );
    $( '#ur_tujuan_renstra_hapus' ).text( $( '#ur_tujuan_renstra_edit' ).val() );
    $( '#HapusTujuan' ).modal( 'show' );
  } );

  $( document ).on( 'click', '.btnDelTujuanRenstra', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: 'renstra/hapusTujuanRenstra',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_tujuan_renstra': $( '#id_tujuan_renstra_hapus' ).val()
      },
      success: function ( data ) {
        $( '#ModalTujuan' ).modal( 'hide' );
        $( '#tblTujuan' ).DataTable().ajax.reload( null, false );
        createPesan( data.pesan, "info" );
      }
    } );
  } );

  $( document ).on( 'click', '.btnAddTujuanIndikator', function () {
    var data = tbl_Tujuan.row( $( this ).parents( 'tr' ) ).data();
    $( '.btnSimpanTujuanIndikator' ).removeClass( 'editTujuanIndikator' );
    $( '.btnSimpanTujuanIndikator' ).addClass( 'addTujuanIndikator' );
    $( '.modal-title' ).text( 'Data Indikator Tujuan Daerah' );
    $( '.form-horizontal' ).show();
    $( '#id_indikator_tujuan_renstra_edit' ).val( null );
    $( '#thn_id_indikator_tujuan_edit' ).val( data.thn_id );
    $( '#id_tujuan_renstra_indikator_edit' ).val( data.id_tujuan_renstra );
    $( '#no_urut_indikator_tujuan_edit' ).val( 1 );
    $( '#id_perubahan_indikator_tujuan_edit' ).val( 0 );
    $( '#ur_indikator_tujuan_renstra' ).val( null );
    $( '#kd_indikator_tujuan_renstra' ).val( null );
    $( '#inditujuan1_edit' ).val( 0 );
    $( '#inditujuan2_edit' ).val( 0 );
    $( '#inditujuan3_edit' ).val( 0 );
    $( '#inditujuan4_edit' ).val( 0 );
    $( '#inditujuan5_edit' ).val( 0 );
    $( '#inditujuan_awal_edit' ).val( 0 );
    $( '#inditujuan_akhir_edit' ).val( 0 );
    $( '#satuan_tujuan_indikator_edit' ).val( null );
    $( '#ModalIndikatorTujuan' ).modal( 'show' );
  } );

  $( '.modal-footer' ).on( 'click', '.addTujuanIndikator', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: './renstra/addIndikatorTujuan',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'thn_id': $( '#thn_id_indikator_tujuan_edit' ).val(),
        'no_urut': $( '#no_urut_indikator_tujuan_edit' ).val(),
        'id_tujuan_renstra': $( '#id_tujuan_renstra_indikator_edit' ).val(),
        'id_perubahan': $( '#id_perubahan_indikator_tujuan_edit' ).val(),
        'kd_indikator': $( '#kd_indikator_tujuan_renstra' ).val(),
        'uraian_indikator_sasaran_renstra': $( '#ur_indikator_tujuan_renstra' ).val(),
        'tolok_ukur_indikator': $( '#ur_indikator_tujuan_renstra' ).val(),
        'angka_awal_periode': $( '#inditujuan_awal_edit' ).val(),
        'angka_tahun1': $( '#inditujuan1_edit' ).val(),
        'angka_tahun2': $( '#inditujuan2_edit' ).val(),
        'angka_tahun3': $( '#inditujuan3_edit' ).val(),
        'angka_tahun4': $( '#inditujuan4_edit' ).val(),
        'angka_tahun5': $( '#inditujuan5_edit' ).val(),
        'angka_akhir_periode': $( '#inditujuan_akhir_edit' ).val(),
      },
      success: function ( data ) {
        $( '#tblTujuan' ).DataTable().ajax.reload( null, false );
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }

      },
      error: function ( data ) {

      }

    } );
  } );

  $( document ).on( 'click', '.edit-indikator', function () {
    var data = tblInTujuan.row( $( this ).parents( 'tr' ) ).data();
    $( '.btnSimpanTujuanIndikator' ).removeClass( 'addTujuanIndikator' );
    $( '.btnSimpanTujuanIndikator' ).addClass( 'editTujuanIndikator' );
    $( '.modal-title' ).text( 'Data Indikator Tujuan Daerah' );
    $( '.form-horizontal' ).show();
    $( '#id_indikator_tujuan_renstra_edit' ).val( data.id_indikator_tujuan_renstra );
    $( '#thn_id_indikator_tujuan_edit' ).val( data.thn_id );
    $( '#id_tujuan_renstra_indikator_edit' ).val( data.id_tujuan_renstra );
    $( '#no_urut_indikator_tujuan_edit' ).val( data.no_urut );
    $( '#id_perubahan_indikator_tujuan_edit' ).val( data.id_perubahan );
    $( '#ur_indikator_tujuan_renstra' ).val( data.nm_indikator );
    $( '#kd_indikator_tujuan_renstra' ).val( data.kd_indikator );
    $( '#inditujuan1_edit' ).val( data.angka_tahun1 );
    $( '#inditujuan2_edit' ).val( data.angka_tahun2 );
    $( '#inditujuan3_edit' ).val( data.angka_tahun3 );
    $( '#inditujuan4_edit' ).val( data.angka_tahun4 );
    $( '#inditujuan5_edit' ).val( data.angka_tahun5 );
    $( '#inditujuan_awal_edit' ).val( data.angka_awal_periode );
    $( '#inditujuan_akhir_edit' ).val( data.angka_akhir_periode );
    $( '#satuan_tujuan_indikator_edit' ).val( data.uraian_satuan );
    $( '#ModalIndikatorTujuan' ).modal( 'show' );
  } );

  $( '.modal-footer' ).on( 'click', '.editTujuanIndikator', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: './renstra/editIndikatorTujuan',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_indikator_tujuan_renstra': $( '#id_indikator_tujuan_renstra_edit' ).val(),
        'thn_id': $( '#thn_id_indikator_tujuan_edit' ).val(),
        'no_urut': $( '#no_urut_indikator_tujuan_edit' ).val(),
        'id_tujuan_renstra': $( '#id_tujuan_renstra_indikator_edit' ).val(),
        'id_perubahan': $( '#id_perubahan_indikator_tujuan_edit' ).val(),
        'kd_indikator': $( '#kd_indikator_tujuan_renstra' ).val(),
        'uraian_indikator_sasaran_renstra': $( '#ur_indikator_tujuan_renstra' ).val(),
        'tolok_ukur_indikator': $( '#ur_indikator_tujuan_renstra' ).val(),
        'angka_awal_periode': $( '#inditujuan_awal_edit' ).val(),
        'angka_tahun1': $( '#inditujuan1_edit' ).val(),
        'angka_tahun2': $( '#inditujuan2_edit' ).val(),
        'angka_tahun3': $( '#inditujuan3_edit' ).val(),
        'angka_tahun4': $( '#inditujuan4_edit' ).val(),
        'angka_tahun5': $( '#inditujuan5_edit' ).val(),
        'angka_akhir_periode': $( '#inditujuan_akhir_edit' ).val(),
      },
      success: function ( data ) {
        $( '#tblTujuan' ).DataTable().ajax.reload( null, false );
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }

      }
    } );
  } );

  $( document ).on( 'click', '.btnHapusIndikator', function () {
    var data = tblInTujuan.row( $( this ).parents( 'tr' ) ).data();
    $( '.actionBtn' ).addClass( 'delete' );
    $( '.modal-title' ).text( 'Hapus Referensi Indikator' );
    $( '.form-horizontal' ).hide();
    $( '#id_tujuan_indikator_hapus' ).val( data.id_indikator_tujuan_renstra );
    $( '#nm_tujuan_indikator_hapus' ).html( data.nm_indikator );
    $( '#HapusTujuanIndikator' ).modal( 'show' );

  } );

  $( '.modal-footer' ).on( 'click', '.delete', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: './renstra/delIndikatorTujuan',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_indikator_tujuan_renstra': $( '#id_tujuan_indikator_hapus' ).val(),
      },
      success: function ( data ) {
        $( '#tblTujuan' ).DataTable().ajax.reload( null, false );
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }
      }
    } );
  } );

  $( document ).on( 'click', '.btnTambahSasaran', function () {
    $( '.btnSimpanSasaran' ).removeClass( 'editSasaran' );
    $( '.btnSimpanSasaran' ).addClass( 'addSasaran' );
    $( '.modal-title' ).text( 'Data Sasaran Perangkat Daerah' );
    $( '.form-horizontal' ).show();
    $( '#id_sasaran_edit' ).val( null );
    $( '#thn_id_sasaran_edit' ).val( thn_id );
    $( '#id_tujuan_sasaran_edit' ).val( id_tujuan_renstra );
    $( '#no_urut_sasaran_edit' ).val( 1 );
    $( '#id_perubahan_sasaran_edit' ).val( 1 );
    $( '#ur_sasaran_rpjmd_edit' ).val( null );
    $( '#id_sasaran_rpjmd_edit' ).val( null );
    $( '#ur_sasaran_edit' ).val( null );
    $( '.divTujuanRenstra' ).hide();
    $( '#ModalSasaran' ).modal( 'show' );
  } );

  $( '.modal-footer' ).on( 'click', '.addSasaran', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: './renstra/addSasaran',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'thn_id': $( '#thn_id_sasaran_edit' ).val(),
        'no_urut': $( '#no_urut_sasaran_edit' ).val(),
        'id_tujuan_renstra': $( '#id_tujuan_sasaran_edit' ).val(),
        'id_perubahan': $( '#id_perubahan_sasaran_edit' ).val(),
        'uraian_sasaran_renstra': $( '#ur_sasaran_edit' ).val(),
        'id_sasaran_rpjmd': $( '#id_sasaran_rpjmd_edit' ).val(),
      },
      success: function ( data ) {
        $( '#tblSasaran' ).DataTable().ajax.reload( null, false );
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }

      }
    } );
  } );

  $( document ).on( 'click', '.btnDetailSasaran', function () {
    var data = tbl_Sasaran.row( $( this ).parents( 'tr' ) ).data();
    $( '.btnSimpanSasaran' ).removeClass( 'addSasaran' );
    $( '.btnSimpanSasaran' ).addClass( 'editSasaran' );
    $( '.modal-title' ).text( 'Data Sasaran Perangkat Daerah' );
    $( '.form-horizontal' ).show();
    $( '#id_sasaran_edit' ).val( data.id_sasaran_renstra );
    $( '#thn_id_sasaran_edit' ).val( data.thn_id );
    $( '#id_tujuan_sasaran_edit' ).val( data.id_tujuan_renstra );
    $( '#id_tujuan_sasaran_display' ).val( data.uraian_tujuan_renstra );
    $( '#no_urut_sasaran_edit' ).val( data.no_urut );
    $( '#id_perubahan_sasaran_edit' ).val( data.id_perubahan );
    $( '#ur_sasaran_rpjmd_edit' ).val( data.uraian_sasaran_rpjmd );
    $( '#id_sasaran_rpjmd_edit' ).val( data.id_sasaran_rpjmd );
    $( '#ur_sasaran_edit' ).val( data.uraian_sasaran_renstra );
    $( '.divTujuanRenstra' ).show();
    if ( data.sumber_data == 0 ) {
      $( '.btnHapusTujuan' ).hide();
    } else {
      $( '.btnHapusTujuan' ).show();
    };
    $( '#ModalSasaran' ).modal( 'show' );
  } );

  $( '.modal-footer' ).on( 'click', '.editSasaran', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: './renstra/editSasaran',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_sasaran_renstra': $( '#id_sasaran_edit' ).val(),
        'thn_id': $( '#thn_id_sasaran_edit' ).val(),
        'no_urut': $( '#no_urut_sasaran_edit' ).val(),
        'id_tujuan_renstra': $( '#id_tujuan_sasaran_edit' ).val(),
        'id_perubahan': $( '#id_perubahan_sasaran_edit' ).val(),
        'uraian_sasaran_renstra': $( '#ur_sasaran_edit' ).val(),
        'id_sasaran_rpjmd': $( '#id_sasaran_rpjmd_edit' ).val(),
      },
      success: function ( data ) {
        $( '#tblSasaran' ).DataTable().ajax.reload( null, false );
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }

      }
    } );
  } );

  $( document ).on( 'click', '.btnHapusSasaran', function () {
    $( '#id_sasaran_renstra_hapus' ).val( $( '#id_sasaran_edit' ).val() );
    $( '#ur_sasaran_renstra_hapus' ).text( $( '#ur_sasaran_edit' ).val() );
    $( '#HapusSasaran' ).modal( 'show' );
  } );

  $( document ).on( 'click', '.btnDelSasaranRenstra', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: './renstra/delSasaran',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_sasaran_renstra': $( '#id_sasaran_renstra_hapus' ).val()
      },
      success: function ( data ) {
        $( '#ModalSasaran' ).modal( 'hide' );
        $( '#tblSasaran' ).DataTable().ajax.reload( null, false );
        createPesan( data.pesan, "info" );
      }
    } );
  } );

  var carisasaranrpjmd
  $( document ).on( 'click', '.btnCariSasaran', function () {
    $( '#judulModal' ).text( 'Daftar Sasaran yang terdapat dalam RPJMD' );
    $( '#ModalSasaranRPJMD' ).modal( 'show' );

    carisasaranrpjmd = $( '#tblCariSasaran' ).DataTable( {
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
      "ajax": { "url": "./renstra/getSasaranRPJMD/" + id_unit_renstra },
      "columns": [
        { data: 'urut' },
        { data: 'kd_sasaran' },
        { data: 'uraian_sasaran_rpjmd' },
      ],
    } );
  } );

  $( '#tblCariSasaran tbody' ).on( 'dblclick', 'tr', function () {
    var data = carisasaranrpjmd.row( this ).data();

    if ( data.level_rpjmd == 3 ) {
      document.getElementById( "ur_sasaran_rpjmd_edit" ).value = data.uraian_sasaran_rpjmd;
      document.getElementById( "id_sasaran_rpjmd_edit" ).value = data.id_sasaran_rpjmd;
    }
    if ( data.level_rpjmd == 4 ) {
      document.getElementById( "ur_program_rpjmd_edit" ).value = data.uraian_program_rpjmd;
      document.getElementById( "id_program_rpjmd_edit" ).value = data.id_program_rpjmd;
      document.getElementById( "id_sasaran_rpjmd_ori_edit" ).value = data.id_sasaran_rpjmd;
    }
    $( '#ModalSasaranRPJMD' ).modal( 'hide' );
  } );

  var caritujuanrenstra
  $( document ).on( 'click', '.btnCariTujuan', function () {
    $( '#judulModal' ).text( 'Daftar Tujuan yang terdapat dalam Renstra OPD ybs' );
    $( '#CariItemRenstra' ).modal( 'show' );

    caritujuanrenstra = $( '#tblCariItemRenstra' ).DataTable( {
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
      "ajax": { "url": "./renstra/getCariTujuanRenstra/" + id_unit_renstra },
      "columns": [
        { data: 'urut' },
        { data: 'kd_misi' },
        { data: 'uraian_tujuan_renstra' },
      ],
    } );
  } );

  $( '#tblCariItemRenstra tbody' ).on( 'dblclick', 'tr', function () {
    var data = caritujuanrenstra.row( this ).data();

    if ( data.level_item == 3 ) {
      document.getElementById( "id_tujuan_sasaran_edit" ).value = data.id_tujuan_renstra;
      document.getElementById( "id_tujuan_sasaran_display" ).value = data.uraian_tujuan_renstra;
    }

    if ( data.level_item == 4 ) {
      document.getElementById( "id_sasaran_renstra_program_edit" ).value = data.id_sasaran_renstra;
      document.getElementById( "id_sasaran_program_edit" ).value = data.uraian_sasaran_renstra;
      document.getElementById( "id_sasaran_rpjmd_program_edit" ).value = data.id_sasaran_rpjmd;
    }

    $( '#CariItemRenstra' ).modal( 'hide' );
  } );

  $( document ).on( 'click', '.btnAddSasaranIndikator', function () {
    var data = tbl_Sasaran.row( $( this ).parents( 'tr' ) ).data();
    $( '.btnSimpanSasaranIndikator' ).removeClass( 'editSasaranIndikator' );
    $( '.btnSimpanSasaranIndikator' ).addClass( 'addSasaranIndikator' );
    $( '.modal-title' ).text( 'Data Indikator Sasaran Daerah' );
    $( '.form-horizontal' ).show();
    $( '#id_indikator_sasaran_renstra_edit' ).val( null );
    $( '#thn_id_indikator_sasaran_edit' ).val( data.thn_id );
    $( '#id_indikator_sasaran_rpjmd_x' ).val( data.id_sasaran_rpjmd );
    $( '#ur_indikator_sasaran_rpjmd' ).val( null );
    $( '#id_indikator_sasaran_rpjmd' ).val( null );
    $( '#id_sasaran_renstra_indikator_edit' ).val( data.id_sasaran_renstra );
    $( '#no_urut_indikator_sasaran_edit' ).val( 1 );
    $( '#id_perubahan_indikator_sasaran_edit' ).val( 0 );
    $( '#ur_indikator_sasaran_renstra' ).val( null );
    $( '#kd_indikator_sasaran_renstra' ).val( null );
    $( '#indisasaran1_edit' ).val( 0 );
    $( '#indisasaran2_edit' ).val( 0 );
    $( '#indisasaran3_edit' ).val( 0 );
    $( '#indisasaran4_edit' ).val( 0 );
    $( '#indisasaran5_edit' ).val( 0 );
    $( '#indisasaran_awal_edit' ).val( 0 );
    $( '#indisasaran_akhir_edit' ).val( 0 );
    $( '#satuan_sasaran_indikator_edit' ).val( null );
    $( '#ModalIndikatorSasaran' ).modal( 'show' );
  } );

  $( '.modal-footer' ).on( 'click', '.addSasaranIndikator', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: './renstra/addIndikatorSasaran',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'thn_id': $( '#thn_id_indikator_sasaran_edit' ).val(),
        'no_urut': $( '#no_urut_indikator_sasaran_edit' ).val(),
        'id_sasaran_renstra': $( '#id_sasaran_renstra_indikator_edit' ).val(),
        'id_perubahan': $( '#id_perubahan_indikator_sasaran_edit' ).val(),
        'kd_indikator': $( '#kd_indikator_sasaran_renstra' ).val(),
        'uraian_indikator_sasaran_renstra': $( '#ur_indikator_sasaran_renstra' ).val(),
        'tolok_ukur_indikator': $( '#ur_indikator_sasaran_renstra' ).val(),
        'angka_awal_periode': $( '#indisasaran_awal_edit' ).val(),
        'angka_tahun1': $( '#indisasaran1_edit' ).val(),
        'angka_tahun2': $( '#indisasaran2_edit' ).val(),
        'angka_tahun3': $( '#indisasaran3_edit' ).val(),
        'angka_tahun4': $( '#indisasaran4_edit' ).val(),
        'angka_tahun5': $( '#indisasaran5_edit' ).val(),
        'angka_akhir_periode': $( '#indisasaran_akhir_edit' ).val(),
      },
      success: function ( data ) {
        $( '#tblSasaran' ).DataTable().ajax.reload( null, false );
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }

      }
    } );
  } );

  $( document ).on( 'click', '.btnEditIndikatorSasaran', function () {
    var data = tblInSasaran.row( $( this ).parents( 'tr' ) ).data();
    $( '.btnSimpanSasaranIndikator' ).removeClass( 'addSasaranIndikator' );
    $( '.btnSimpanSasaranIndikator' ).addClass( 'editSasaranIndikator' );
    $( '.modal-title' ).text( 'Data Indikator Sasaran Daerah' );
    $( '.form-horizontal' ).show();
    $( '#id_indikator_sasaran_renstra_edit' ).val( data.id_indikator_sasaran_renstra );
    $( '#thn_id_indikator_sasaran_edit' ).val( data.thn_id );
    $( '#id_sasaran_renstra_indikator_edit' ).val( data.id_sasaran_renstra );
    $( '#no_urut_indikator_sasaran_edit' ).val( data.no_urut );
    $( '#id_perubahan_indikator_sasaran_edit' ).val( data.id_perubahan );
    $( '#id_indikator_sasaran_rpjmd_x' ).val( data.id_sasaran_rpjmd );
    $( '#ur_indikator_sasaran_rpjmd' ).val( null );
    $( '#id_indikator_sasaran_rpjmd' ).val( null );
    $( '#ur_indikator_sasaran_renstra' ).val( data.nm_indikator );
    $( '#kd_indikator_sasaran_renstra' ).val( data.kd_indikator );
    $( '#indisasaran1_edit' ).val( data.angka_tahun1 );
    $( '#indisasaran2_edit' ).val( data.angka_tahun2 );
    $( '#indisasaran3_edit' ).val( data.angka_tahun3 );
    $( '#indisasaran4_edit' ).val( data.angka_tahun4 );
    $( '#indisasaran5_edit' ).val( data.angka_tahun5 );
    $( '#indisasaran_awal_edit' ).val( data.angka_awal_periode );
    $( '#indisasaran_akhir_edit' ).val( data.angka_akhir_periode );
    $( '#satuan_sasaran_indikator_edit' ).val( data.uraian_satuan );
    $( '#ModalIndikatorSasaran' ).modal( 'show' );
  } );

  $( '.modal-footer' ).on( 'click', '.editSasaranIndikator', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: './renstra/editIndikatorSasaran',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_indikator_sasaran_renstra': $( '#id_indikator_sasaran_renstra_edit' ).val(),
        'thn_id': $( '#thn_id_indikator_sasaran_edit' ).val(),
        'thn_id': $( '#thn_id_indikator_sasaran_edit' ).val(),
        'no_urut': $( '#no_urut_indikator_sasaran_edit' ).val(),
        'id_sasaran_renstra': $( '#id_sasaran_renstra_indikator_edit' ).val(),
        'id_perubahan': $( '#id_perubahan_indikator_sasaran_edit' ).val(),
        'kd_indikator': $( '#kd_indikator_sasaran_renstra' ).val(),
        'uraian_indikator_sasaran_renstra': $( '#ur_indikator_sasaran_renstra' ).val(),
        'tolok_ukur_indikator': $( '#ur_indikator_sasaran_renstra' ).val(),
        'angka_awal_periode': $( '#indisasaran_awal_edit' ).val(),
        'angka_tahun1': $( '#indisasaran1_edit' ).val(),
        'angka_tahun2': $( '#indisasaran2_edit' ).val(),
        'angka_tahun3': $( '#indisasaran3_edit' ).val(),
        'angka_tahun4': $( '#indisasaran4_edit' ).val(),
        'angka_tahun5': $( '#indisasaran5_edit' ).val(),
        'angka_akhir_periode': $( '#indisasaran_akhir_edit' ).val(),
      },
      success: function ( data ) {
        $( '#tblSasaran' ).DataTable().ajax.reload( null, false );
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }

      }
    } );
  } );

  $( document ).on( 'click', '.btnHapusIndikatorSasaran', function () {
    var data = tblInSasaran.row( $( this ).parents( 'tr' ) ).data();
    $( '.btnDelSasaranIndikator' ).addClass( 'delSasaranIndikator' );
    $( '.modal-title' ).text( 'Hapus Referensi Indikator' );
    $( '.form-horizontal' ).hide();
    $( '#id_sasaran_indikator_hapus' ).val( data.id_indikator_sasaran_renstra );
    $( '#nm_sasaran_indikator_hapus' ).html( data.nm_indikator );
    $( '#HapusSasaranIndikatorModal' ).modal( 'show' );

  } );



  $( '.modal-footer' ).on( 'click', '.delSasaranIndikator', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: './renstra/delIndikatorSasaran',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_indikator_sasaran_renstra': $( '#id_sasaran_indikator_hapus' ).val(),
      },
      success: function ( data ) {
        $( '#tblSasaran' ).DataTable().ajax.reload( null, false );
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }
      }
    } );
  } );

  $( document ).on( 'click', '.btnTambahProgram', function () {
    $( '.btnSimpanProgram' ).removeClass( 'editProgram' );
    $( '.btnSimpanProgram' ).addClass( 'addProgram' );
    $( '.btnSimpanProgram' ).removeClass( 'editProgramBtl' );
    $( '.btnSimpanProgram' ).removeClass( 'addProgramBtl' );
    $( '.btnSimpanProgram' ).removeClass( 'editProgramPdt' );
    $( '.btnSimpanProgram' ).removeClass( 'addProgramPdt' );
    $( '.modal-title' ).text( 'Data Program Perangkat Daerah' );
    $( '.form-horizontal' ).show();
    $( '#id_program_renstra_edit' ).val( null );
    $( '#thn_id_program_edit' ).val( thn_id );
    $( '#id_sasaran_renstra_program_edit' ).val( id_sasaran_renstra );
    $( '#id_sasaran_rpjmd_program_edit' ).val( id_sasaran_rpjmd );
    $( '#id_sasaran_rpjmd_ori_edit' ).val( id_sasaran_rpjmd );
    $( '#id_sasaran_program_edit' ).val( null );
    $( '#no_urut_program_edit' ).val( 1 );
    $( '#id_perubahan_program_edit' ).val( 0 );
    $( '#id_program_rpjmd_edit' ).val( null );
    $( '#ur_program_rpjmd_edit' ).val( null );
    $( '#id_program_ref_edit' ).val( null );
    $( '#kd_program_edit' ).val( null );
    $( '#ur_program_renstra_edit' ).val( null );
    $( '#ur_sasaran_program_renstra_edit' ).val( null );
    $( '#pagu1_edit' ).val( 0 );
    $( '#pagu2_edit' ).val( 0 );
    $( '#pagu3_edit' ).val( 0 );
    $( '#pagu4_edit' ).val( 0 );
    $( '#pagu5_edit' ).val( 0 );
    $( '#pagu6_edit' ).val( 0 );
    $( '#pagu1_cekkeg' ).val( 0 );
    $( '#pagu2_cekkeg' ).val( 0 );
    $( '#pagu3_cekkeg' ).val( 0 );
    $( '#pagu4_cekkeg' ).val( 0 );
    $( '#pagu5_cekkeg' ).val( 0 );
    $( '#pagu6_cekkeg' ).val( 0 );
    $( '.btnHapusProgram' ).hide();
    $( '#ModalProgram' ).modal( 'show' );
  } );

  $( document ).on( 'click', '.btnTambahProgramBtl', function () {
    $( '.btnSimpanProgram' ).removeClass( 'editProgram' );
    $( '.btnSimpanProgram' ).removeClass( 'addProgram' );
    $( '.btnSimpanProgram' ).removeClass( 'editProgramBtl' );
    $( '.btnSimpanProgram' ).addClass( 'addProgramBtl' );
    $( '.btnSimpanProgram' ).removeClass( 'editProgramPdt' );
    $( '.btnSimpanProgram' ).removeClass( 'addProgramPdt' );
    $( '.modal-title' ).text( 'Data Belanja Non Program Perangkat Daerah' );
    $( '.form-horizontal' ).show();
    $( '#id_program_renstra_edit' ).val( null );
    $( '#thn_id_program_edit' ).val( thn_id );
    $( '#id_sasaran_renstra_program_edit' ).val( id_sasaran_renstra );
    $( '#id_sasaran_rpjmd_program_edit' ).val( id_sasaran_rpjmd );
    $( '#id_sasaran_rpjmd_ori_edit' ).val( id_sasaran_rpjmd );
    $( '#id_sasaran_program_edit' ).val( null );
    $( '#no_urut_program_edit' ).val( 1 );
    $( '#id_perubahan_program_edit' ).val( 0 );
    $( '#id_program_rpjmd_edit' ).val( null );
    $( '#ur_program_rpjmd_edit' ).val( null );
    $( '#id_program_ref_edit' ).val( null );
    $( '#kd_program_edit' ).val( null );
    $( '#ur_program_renstra_edit' ).val( null );
    $( '#ur_sasaran_program_renstra_edit' ).val( null );
    $( '#pagu1_edit' ).val( 0 );
    $( '#pagu2_edit' ).val( 0 );
    $( '#pagu3_edit' ).val( 0 );
    $( '#pagu4_edit' ).val( 0 );
    $( '#pagu5_edit' ).val( 0 );
    $( '#pagu6_edit' ).val( 0 );
    $( '#pagu1_cekkeg' ).val( 0 );
    $( '#pagu2_cekkeg' ).val( 0 );
    $( '#pagu3_cekkeg' ).val( 0 );
    $( '#pagu4_cekkeg' ).val( 0 );
    $( '#pagu5_cekkeg' ).val( 0 );
    $( '#pagu6_cekkeg' ).val( 0 );
    $( '.btnHapusProgram' ).hide();
    $( '#ModalProgram' ).modal( 'show' );
  } );

  $( document ).on( 'click', '.btnTambahProgramPdt', function () {
    $( '.btnSimpanProgram' ).removeClass( 'editProgram' );
    $( '.btnSimpanProgram' ).removeClass( 'addProgram' );
    $( '.btnSimpanProgram' ).removeClass( 'editProgramBtl' );
    $( '.btnSimpanProgram' ).removeClass( 'addProgramBtl' );
    $( '.btnSimpanProgram' ).removeClass( 'editProgramPdt' );
    $( '.btnSimpanProgram' ).addClass( 'addProgramPdt' );
    $( '.modal-title' ).text( 'Data Pendanaan Renstra Perangkat Daerah' );
    $( '.form-horizontal' ).show();
    $( '#id_program_renstra_edit' ).val( null );
    $( '#thn_id_program_edit' ).val( thn_id );
    $( '#id_sasaran_renstra_program_edit' ).val( id_sasaran_renstra );
    $( '#id_sasaran_rpjmd_program_edit' ).val( id_sasaran_rpjmd );
    $( '#id_sasaran_rpjmd_ori_edit' ).val( id_sasaran_rpjmd );
    $( '#id_sasaran_program_edit' ).val( null );
    $( '#no_urut_program_edit' ).val( 1 );
    $( '#id_perubahan_program_edit' ).val( 0 );
    $( '#id_program_rpjmd_edit' ).val( null );
    $( '#ur_program_rpjmd_edit' ).val( null );
    $( '#id_program_ref_edit' ).val( null );
    $( '#kd_program_edit' ).val( null );
    $( '#ur_program_renstra_edit' ).val( null );
    $( '#ur_sasaran_program_renstra_edit' ).val( null );
    $( '#pagu1_edit' ).val( 0 );
    $( '#pagu2_edit' ).val( 0 );
    $( '#pagu3_edit' ).val( 0 );
    $( '#pagu4_edit' ).val( 0 );
    $( '#pagu5_edit' ).val( 0 );
    $( '#pagu6_edit' ).val( 0 );
    $( '#pagu1_cekkeg' ).val( 0 );
    $( '#pagu2_cekkeg' ).val( 0 );
    $( '#pagu3_cekkeg' ).val( 0 );
    $( '#pagu4_cekkeg' ).val( 0 );
    $( '#pagu5_cekkeg' ).val( 0 );
    $( '#pagu6_cekkeg' ).val( 0 );
    $( '.btnHapusProgram' ).hide();
    $( '#ModalProgram' ).modal( 'show' );
  } );
  $( '.modal-footer' ).on( 'click', '.addProgram', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: './renstra/addProgram',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'thn_id': $( '#thn_id_program_edit' ).val(),
        'no_urut': $( '#no_urut_program_edit' ).val(),
        'id_sasaran_renstra': $( '#id_sasaran_renstra_program_edit' ).val(),
        'id_program_rpjmd': $( '#id_program_rpjmd_edit' ).val(),
        'id_program_ref': $( '#id_program_ref_edit' ).val(),
        'id_perubahan': $( '#id_perubahan_program_edit' ).val(),
        'uraian_program_renstra': $( '#ur_program_renstra_edit' ).val(),
        'uraian_sasaran_program': $( '#ur_sasaran_program_renstra_edit' ).val(),
        'pagu_tahun1': $( '#pagu1_edit' ).val(),
        'pagu_tahun2': $( '#pagu2_edit' ).val(),
        'pagu_tahun3': $( '#pagu3_edit' ).val(),
        'pagu_tahun4': $( '#pagu4_edit' ).val(),
        'pagu_tahun5': $( '#pagu5_edit' ).val(),
        'sumber_data': 0,
      },
      success: function ( data ) {
        $( '#tblProgram' ).DataTable().ajax.reload( null, false );
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }

      }
    } );
  } );

  $( '.modal-footer' ).on( 'click', '.addProgramBtl', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: './renstra/addProgramBtl',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_renstra': id_renstra,
        'no_urut': $( '#no_urut_program_edit' ).val(),
        'id_sasaran_renstra': $( '#id_sasaran_renstra_program_edit' ).val(),
        'id_program_rpjmd': $( '#id_program_rpjmd_edit' ).val(),
        'id_program_ref': $( '#id_program_ref_edit' ).val(),
        'id_perubahan': $( '#id_perubahan_program_edit' ).val(),
        'uraian_program_renstra': $( '#ur_program_renstra_edit' ).val(),
        'uraian_sasaran_program': $( '#ur_sasaran_program_renstra_edit' ).val(),
        'pagu_tahun1': $( '#pagu1_edit' ).val(),
        'pagu_tahun2': $( '#pagu2_edit' ).val(),
        'pagu_tahun3': $( '#pagu3_edit' ).val(),
        'pagu_tahun4': $( '#pagu4_edit' ).val(),
        'pagu_tahun5': $( '#pagu5_edit' ).val(),
        'sumber_data': 0,
      },
      success: function ( data ) {
        $( '#tblProgramBtl' ).DataTable().ajax.reload( null, false );
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }

      }
    } );
  } );

  $( '.modal-footer' ).on( 'click', '.addProgramPdt', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: './renstra/addProgramPdt',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_renstra': id_renstra,
        'no_urut': $( '#no_urut_program_edit' ).val(),
        'id_sasaran_renstra': $( '#id_sasaran_renstra_program_edit' ).val(),
        'id_program_rpjmd': $( '#id_program_rpjmd_edit' ).val(),
        'id_program_ref': $( '#id_program_ref_edit' ).val(),
        'id_perubahan': $( '#id_perubahan_program_edit' ).val(),
        'uraian_program_renstra': $( '#ur_program_renstra_edit' ).val(),
        'uraian_sasaran_program': $( '#ur_sasaran_program_renstra_edit' ).val(),
        'pagu_tahun1': $( '#pagu1_edit' ).val(),
        'pagu_tahun2': $( '#pagu2_edit' ).val(),
        'pagu_tahun3': $( '#pagu3_edit' ).val(),
        'pagu_tahun4': $( '#pagu4_edit' ).val(),
        'pagu_tahun5': $( '#pagu5_edit' ).val(),
        'sumber_data': 0,
      },
      success: function ( data ) {
        $( '#tblProgramPdt' ).DataTable().ajax.reload( null, false );
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }

      }
    } );
  } );

  $( document ).on( 'click', '.btnDetailProgram', function () {
    var data = tbl_Program.row( $( this ).parents( 'tr' ) ).data();
    sumber_belanja = 0;
    $( '.btnSimpanProgram' ).removeClass( 'addProgram' );
    $( '.btnSimpanProgram' ).addClass( 'editProgram' );
    $( '.btnSimpanProgram' ).removeClass( 'editProgramBtl' );
    $( '.btnSimpanProgram' ).removeClass( 'addProgramBtl' );
    $( '.btnSimpanProgram' ).removeClass( 'editProgramPdt' );
    $( '.btnSimpanProgram' ).removeClass( 'addProgramPdt' );
    $( '.modal-title' ).text( 'Data Program Perangkat Daerah' );
    $( '.form-horizontal' ).show();
    $( '#id_program_renstra_edit' ).val( data.id_program_renstra );
    $( '#thn_id_program_edit' ).val( data.thn_id );
    $( '#id_sasaran_renstra_program_edit' ).val( data.id_sasaran_renstra );
    $( '#id_sasaran_rpjmd_program_edit' ).val( data.id_sasaran_rpjmd );
    $( '#id_sasaran_rpjmd_ori_edit' ).val( data.id_sasaran_rpjmd );
    $( '#id_sasaran_program_edit' ).val( data.uraian_sasaran_renstra );
    $( '#no_urut_program_edit' ).val( data.no_urut );
    $( '#id_perubahan_program_edit' ).val( data.id_perubahan );
    $( '#id_program_rpjmd_edit' ).val( data.id_program_rpjmd );
    $( '#ur_program_rpjmd_edit' ).val( data.nm_program_rpjmd );
    $( '#id_program_ref_edit' ).val( data.id_program_ref );
    $( '#kd_program_edit' ).val( data.kd_program );
    $( '#ur_program_renstra_edit' ).val( data.nm_program );
    $( '#ur_sasaran_program_renstra_edit' ).val( data.uraian_sasaran_program );
    $( '#pagu1_edit' ).val( data.pagu_tahun1a );
    $( '#pagu2_edit' ).val( data.pagu_tahun2a );
    $( '#pagu3_edit' ).val( data.pagu_tahun3a );
    $( '#pagu4_edit' ).val( data.pagu_tahun4a );
    $( '#pagu5_edit' ).val( data.pagu_tahun5a );
    $( '#pagu6_edit' ).val( data.pagu_tahun6a );
    $( '#pagu1_cekkeg' ).val( data.pagu_tahun1_keg );
    $( '#pagu2_cekkeg' ).val( data.pagu_tahun2_keg );
    $( '#pagu3_cekkeg' ).val( data.pagu_tahun3_keg );
    $( '#pagu4_cekkeg' ).val( data.pagu_tahun4_keg );
    $( '#pagu5_cekkeg' ).val( data.pagu_tahun5_keg );
    $( '#pagu6_cekkeg' ).val( data.pagu_tahun6_keg );
    $( '.btnHapusProgram' ).show();
    $( '#ModalProgram' ).modal( 'show' );
  } );

  $( document ).on( 'click', '.btnDetailProgramBtl', function () {
    var data = tbl_ProgramBtl.row( $( this ).parents( 'tr' ) ).data();
    sumber_belanja = 1;
    $( '.btnSimpanProgram' ).removeClass( 'addProgram' );
    $( '.btnSimpanProgram' ).removeClass( 'editProgram' );
    $( '.btnSimpanProgram' ).addClass( 'editProgramBtl' );
    $( '.btnSimpanProgram' ).removeClass( 'addProgramBtl' );
    $( '.btnSimpanProgram' ).removeClass( 'editProgramPdt' );
    $( '.btnSimpanProgram' ).removeClass( 'addProgramPdt' );
    $( '.modal-title' ).text( 'Data Belanja Non Program Perangkat Daerah' );
    $( '.form-horizontal' ).show();
    $( '#id_program_renstra_edit' ).val( data.id_program_renstra );
    $( '#thn_id_program_edit' ).val( data.thn_id );
    $( '#id_sasaran_renstra_program_edit' ).val( data.id_sasaran_renstra );
    $( '#id_sasaran_rpjmd_program_edit' ).val( data.id_sasaran_rpjmd );
    $( '#id_sasaran_rpjmd_ori_edit' ).val( data.id_sasaran_rpjmd );
    $( '#id_sasaran_program_edit' ).val( data.uraian_sasaran_renstra );
    $( '#no_urut_program_edit' ).val( data.no_urut );
    $( '#id_perubahan_program_edit' ).val( data.id_perubahan );
    $( '#id_program_rpjmd_edit' ).val( data.id_program_rpjmd );
    $( '#ur_program_rpjmd_edit' ).val( data.nm_program_rpjmd );
    $( '#id_program_ref_edit' ).val( data.id_program_ref );
    $( '#kd_program_edit' ).val( data.kd_program );
    $( '#ur_program_renstra_edit' ).val( data.nm_program );
    $( '#ur_sasaran_program_renstra_edit' ).val( data.uraian_sasaran_program );
    $( '#pagu1_edit' ).val( data.pagu_tahun1a );
    $( '#pagu2_edit' ).val( data.pagu_tahun2a );
    $( '#pagu3_edit' ).val( data.pagu_tahun3a );
    $( '#pagu4_edit' ).val( data.pagu_tahun4a );
    $( '#pagu5_edit' ).val( data.pagu_tahun5a );
    $( '#pagu6_edit' ).val( data.pagu_tahun6a );
    $( '#pagu1_cekkeg' ).val( data.pagu_tahun1_keg );
    $( '#pagu2_cekkeg' ).val( data.pagu_tahun2_keg );
    $( '#pagu3_cekkeg' ).val( data.pagu_tahun3_keg );
    $( '#pagu4_cekkeg' ).val( data.pagu_tahun4_keg );
    $( '#pagu5_cekkeg' ).val( data.pagu_tahun5_keg );
    $( '#pagu6_cekkeg' ).val( data.pagu_tahun6_keg );
    $( '.btnHapusProgram' ).show();
    $( '#ModalProgram' ).modal( 'show' );
  } );

  $( document ).on( 'click', '.btnDetailProgramPdt', function () {
    var data = tbl_ProgramPdt.row( $( this ).parents( 'tr' ) ).data();
    sumber_belanja = 2;
    $( '.btnSimpanProgram' ).removeClass( 'addProgram' );
    $( '.btnSimpanProgram' ).removeClass( 'editProgram' );
    $( '.btnSimpanProgram' ).addClass( 'editProgramBtl' );
    $( '.btnSimpanProgram' ).removeClass( 'addProgramBtl' );
    $( '.btnSimpanProgram' ).removeClass( 'editProgramPdt' );
    $( '.btnSimpanProgram' ).removeClass( 'addProgramPdt' );
    $( '.modal-title' ).text( 'Data Belanja Non Program Perangkat Daerah' );
    $( '.form-horizontal' ).show();
    $( '#id_program_renstra_edit' ).val( data.id_program_renstra );
    $( '#thn_id_program_edit' ).val( data.thn_id );
    $( '#id_sasaran_renstra_program_edit' ).val( data.id_sasaran_renstra );
    $( '#id_sasaran_rpjmd_program_edit' ).val( data.id_sasaran_rpjmd );
    $( '#id_sasaran_rpjmd_ori_edit' ).val( data.id_sasaran_rpjmd );
    $( '#id_sasaran_program_edit' ).val( data.uraian_sasaran_renstra );
    $( '#no_urut_program_edit' ).val( data.no_urut );
    $( '#id_perubahan_program_edit' ).val( data.id_perubahan );
    $( '#id_program_rpjmd_edit' ).val( data.id_program_rpjmd );
    $( '#ur_program_rpjmd_edit' ).val( data.nm_program_rpjmd );
    $( '#id_program_ref_edit' ).val( data.id_program_ref );
    $( '#kd_program_edit' ).val( data.kd_program );
    $( '#ur_program_renstra_edit' ).val( data.nm_program );
    $( '#ur_sasaran_program_renstra_edit' ).val( data.uraian_sasaran_program );
    $( '#pagu1_edit' ).val( data.pagu_tahun1a );
    $( '#pagu2_edit' ).val( data.pagu_tahun2a );
    $( '#pagu3_edit' ).val( data.pagu_tahun3a );
    $( '#pagu4_edit' ).val( data.pagu_tahun4a );
    $( '#pagu5_edit' ).val( data.pagu_tahun5a );
    $( '#pagu6_edit' ).val( data.pagu_tahun6a );
    $( '#pagu1_cekkeg' ).val( data.pagu_tahun1_keg );
    $( '#pagu2_cekkeg' ).val( data.pagu_tahun2_keg );
    $( '#pagu3_cekkeg' ).val( data.pagu_tahun3_keg );
    $( '#pagu4_cekkeg' ).val( data.pagu_tahun4_keg );
    $( '#pagu5_cekkeg' ).val( data.pagu_tahun5_keg );
    $( '#pagu6_cekkeg' ).val( data.pagu_tahun6_keg );
    $( '.btnHapusProgram' ).show();
    $( '#ModalProgram' ).modal( 'show' );
  } );

  $( '.modal-footer' ).on( 'click', '.editProgram', function () {
    if ( $( '#id_sasaran_rpjmd_ori_edit' ).val() != $( '#id_sasaran_rpjmd_program_edit' ).val() ) {
      alert( "Sasaran RPJMD tidak sama dengan Sasaran RPJMD yang dipilih di Program RPJMD" )
    } else {
      $.ajaxSetup( {
        headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
      } );

      $.ajax( {
        type: 'post',
        url: './renstra/editProgram',
        data: {
          '_token': $( 'input[name=_token]' ).val(),
          'id_program_renstra': $( '#id_program_renstra_edit' ).val(),
          'thn_id': $( '#thn_id_program_edit' ).val(),
          'no_urut': $( '#no_urut_program_edit' ).val(),
          'id_sasaran_renstra': $( '#id_sasaran_renstra_program_edit' ).val(),
          'id_program_rpjmd': $( '#id_program_rpjmd_edit' ).val(),
          'id_program_ref': $( '#id_program_ref_edit' ).val(),
          'id_perubahan': $( '#id_perubahan_program_edit' ).val(),
          'uraian_program_renstra': $( '#ur_program_renstra_edit' ).val(),
          'uraian_sasaran_program': $( '#ur_sasaran_program_renstra_edit' ).val(),
          'pagu_tahun1': $( '#pagu1_edit' ).val(),
          'pagu_tahun2': $( '#pagu2_edit' ).val(),
          'pagu_tahun3': $( '#pagu3_edit' ).val(),
          'pagu_tahun4': $( '#pagu4_edit' ).val(),
          'pagu_tahun5': $( '#pagu5_edit' ).val(),
          'sumber_data': 0,
        },
        success: function ( data ) {
          if ( sumber_belanja == 0 ) {
            $( '#tblProgram' ).DataTable().ajax.reload( null, false );
          }
          if ( sumber_belanja == 1 ) {
            $( '#tblProgramBtl' ).DataTable().ajax.reload( null, false );
          }
          if ( sumber_belanja == 2 ) {
            $( '#tblPendapatan' ).DataTable().ajax.reload( null, false );
          }
          if ( data.status_pesan == 1 ) {
            createPesan( data.pesan, "success" );
          } else {
            createPesan( data.pesan, "danger" );
          }

        }
      } );
    }
  } );

  $( '.modal-footer' ).on( 'click', '.editProgramBtl', function () {
    if ( $( '#id_sasaran_rpjmd_ori_edit' ).val() != $( '#id_sasaran_rpjmd_program_edit' ).val() ) {
      alert( "Sasaran RPJMD tidak sama dengan Sasaran RPJMD yang dipilih di Program RPJMD" )
    } else {
      $.ajaxSetup( {
        headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
      } );

      $.ajax( {
        type: 'post',
        url: './renstra/editProgram',
        data: {
          '_token': $( 'input[name=_token]' ).val(),
          'id_program_renstra': $( '#id_program_renstra_edit' ).val(),
          'thn_id': $( '#thn_id_program_edit' ).val(),
          'no_urut': $( '#no_urut_program_edit' ).val(),
          'id_sasaran_renstra': $( '#id_sasaran_renstra_program_edit' ).val(),
          'id_program_rpjmd': $( '#id_program_rpjmd_edit' ).val(),
          'id_program_ref': $( '#id_program_ref_edit' ).val(),
          'id_perubahan': $( '#id_perubahan_program_edit' ).val(),
          'uraian_program_renstra': $( '#ur_program_renstra_edit' ).val(),
          'uraian_sasaran_program': $( '#ur_sasaran_program_renstra_edit' ).val(),
          'pagu_tahun1': $( '#pagu1_edit' ).val(),
          'pagu_tahun2': $( '#pagu2_edit' ).val(),
          'pagu_tahun3': $( '#pagu3_edit' ).val(),
          'pagu_tahun4': $( '#pagu4_edit' ).val(),
          'pagu_tahun5': $( '#pagu5_edit' ).val(),
          'sumber_data': 0,
        },
        success: function ( data ) {
          if ( sumber_belanja == 0 ) {
            $( '#tblProgram' ).DataTable().ajax.reload( null, false );
          }
          if ( sumber_belanja == 1 ) {
            $( '#tblProgramBtl' ).DataTable().ajax.reload( null, false );
          }
          if ( sumber_belanja == 2 ) {
            $( '#tblPendapatan' ).DataTable().ajax.reload( null, false );
          }
          if ( data.status_pesan == 1 ) {
            createPesan( data.pesan, "success" );
          } else {
            createPesan( data.pesan, "danger" );
          }
        }
      } );
    }
  } );

  $( document ).on( 'click', '.btnHapusProgram', function () {
    $( '#id_program_renstra_hapus' ).val( $( '#id_program_renstra_edit' ).val() );
    $( '#ur_program_renstra_hapus' ).text( $( '#ur_program_renstra_edit' ).val() );
    $( '#HapusProgram' ).modal( 'show' );
  } );

  $( document ).on( 'click', '.btnDelProgramRenstra', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: './renstra/delProgram',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_program_renstra': $( '#id_program_renstra_hapus' ).val()
      },
      success: function ( data ) {
        $( '#ModalProgram' ).modal( 'hide' );
        if ( sumber_belanja == 0 ) {
          $( '#tblProgram' ).DataTable().ajax.reload( null, false );
        }
        if ( sumber_belanja == 1 ) {
          $( '#tblProgramBtl' ).DataTable().ajax.reload( null, false );
        }
        if ( sumber_belanja == 2 ) {
          $( '#tblPendapatan' ).DataTable().ajax.reload( null, false );
        }
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }
      }
    } );
  } );

  $( document ).on( 'click', '.btnCariProgramRPJMD', function () {
    $( '#judulModal' ).text( 'Daftar Program yang terdapat dalam RPJMD' );
    $( '#ModalSasaranRPJMD' ).modal( 'show' );

    carisasaranrpjmd = $( '#tblCariSasaran' ).DataTable( {
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
      "ajax": { "url": "./renstra/getProgramRPJMD/" + $( '#id_sasaran_rpjmd_program_edit' ).val() },
      "columns": [
        { data: 'urut' },
        { data: 'kd_program' },
        { data: 'uraian_program_rpjmd' },
      ],
    } );
  } );

  $( document ).on( 'click', '.btnCariSasaranRenstra', function () {
    $( '#judulModal' ).text( 'Daftar Tujuan yang terdapat dalam Renstra OPD ybs' );
    $( '#CariItemRenstra' ).modal( 'show' );

    caritujuanrenstra = $( '#tblCariItemRenstra' ).DataTable( {
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
      "ajax": { "url": "./renstra/getCariSasaranRenstra/" + id_unit_renstra },
      "columns": [
        { data: 'urut' },
        { data: 'kd_sasaran' },
        { data: 'uraian_sasaran_renstra' },
      ],
    } );
  } );

  $( document ).on( 'click', '.btnCariProgramRef', function () {
    $( '#judulModal' ).text( 'Daftar Program yang terdapat dalam Referensi Program' );
    $( '#cariProgramRef' ).modal( 'show' );
    $( '#tblCariProgramRef' ).DataTable().ajax.url( "./renstra/getProgramRef/0" ).load();

    $.ajax( {
      type: "GET",
      url: './renstra/getBidangRef/' + id_unit_renstra + '/' + $( '#id_program_rpjmd_edit' ).val(),
      dataType: "json",

      success: function ( data ) {

        var j = data.length;
        var post, i;

        $( 'select[name="kd_bidang_cari"]' ).empty();
        $( 'select[name="kd_bidang_cari"]' ).append( '<option value="0">---Pilih Kode Bidang---</option>' );

        for ( i = 0; i < j; i++ ) {
          post = data[ i ];
          $( 'select[name="kd_bidang_cari"]' ).append( '<option value="' + post.id_bidang + '">' + post.nm_bidang_display + '</option>' );
        }
      }
    } );
  } );

  var cariProgramRef;
  $( ".kd_bidang_cari" ).change( function () {
    cariProgramRef = $( '#tblCariProgramRef' ).DataTable( {
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
      "ajax": { "url": "./renstra/getProgramRef/" + $( '#kd_bidang_cari' ).val() },
      "columns": [
        { data: 'no_urut', sClass: "dt-center" },
        { data: 'kd_program_display', sClass: "dt-center" },
        { data: 'uraian_program' }
      ],
    } );
  } );

  $( '#tblCariProgramRef tbody' ).on( 'dblclick', 'tr', function () {
    var data = cariProgramRef.row( this ).data();
    document.getElementById( "id_program_ref_edit" ).value = data.id_program;
    document.getElementById( "kd_program_edit" ).value = data.kd_program_display;
    document.getElementById( "ur_program_renstra_edit" ).value = data.uraian_program;
    $( '#cariProgramRef' ).modal( 'hide' );
  } );

  function hitungPaguProgram () {

    var p = $( '#pagu1_edit' ).val();
    var q = $( '#pagu2_edit' ).val();
    var r = $( '#pagu3_edit' ).val();
    var s = $( '#pagu4_edit' ).val();
    var t = $( '#pagu5_edit' ).val();

    var paguProgram = parseInt( p ) + parseInt( q ) + parseInt( r ) + parseInt( s ) + parseInt( t );
    return paguProgram;

  }
  $( "#pagu1_edit" ).change( function () {
    $( '#pagu6_edit' ).val( hitungPaguProgram() );
  } );
  $( "#pagu2_edit" ).change( function () {
    $( '#pagu6_edit' ).val( hitungPaguProgram() );
  } );
  $( "#pagu3_edit" ).change( function () {
    $( '#pagu6_edit' ).val( hitungPaguProgram() );
  } );
  $( "#pagu4_edit" ).change( function () {
    $( '#pagu6_edit' ).val( hitungPaguProgram() );
  } );
  $( "#pagu5_edit" ).change( function () {
    $( '#pagu6_edit' ).val( hitungPaguProgram() );
  } );

  $( document ).on( 'click', '.btnAddProgramIndikator', function () {
    var data = tbl_Program.row( $( this ).parents( 'tr' ) ).data();
    $( '.btnSimpanProgramIndikator' ).removeClass( 'editProgramIndikator' );
    $( '.btnSimpanProgramIndikator' ).addClass( 'addProgramIndikator' );
    $( '.modal-title' ).text( 'Data Indikator Program Perangkat Daerah' );
    $( '.form-horizontal' ).show();
    $( '#id_indikator_program_renstra_edit' ).val( null );
    $( '#thn_id_indikator_program_edit' ).val( data.thn_id );
    $( '#id_program_renstra_indikator_edit' ).val( data.id_program_renstra );
    $( '#no_urut_indikator_program_edit' ).val( 1 );
    $( '#id_perubahan_indikator_program_edit' ).val( 0 );
    $( '#ur_indikator_program_renstra' ).val( null );
    $( '#kd_indikator_program_renstra' ).val( null );
    $( '#indiprogram1_edit' ).val( 0 );
    $( '#indiprogram2_edit' ).val( 0 );
    $( '#indiprogram3_edit' ).val( 0 );
    $( '#indiprogram4_edit' ).val( 0 );
    $( '#indiprogram5_edit' ).val( 0 );
    $( '#indiprogram_awal_edit' ).val( 0 );
    $( '#indiprogram_akhir_edit' ).val( 0 );
    $( '#satuan_program_indikator_edit' ).val( null );
    $( '#ModalIndikatorProgram' ).modal( 'show' );
  } );

  $( '.modal-footer' ).on( 'click', '.addProgramIndikator', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: './renstra/addIndikatorProgram',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'thn_id': $( '#thn_id_indikator_program_edit' ).val(),
        'no_urut': $( '#no_urut_indikator_program_edit' ).val(),
        'id_program_renstra': $( '#id_program_renstra_indikator_edit' ).val(),
        'id_perubahan': $( '#id_perubahan_indikator_program_edit' ).val(),
        'kd_indikator': $( '#kd_indikator_program_renstra' ).val(),
        'uraian_indikator_program_renstra': $( '#ur_indikator_program_renstra' ).val(),
        'tolok_ukur_indikator': $( '#ur_indikator_program_renstra' ).val(),
        'angka_awal_periode': $( '#indiprogram_awal_edit' ).val(),
        'angka_tahun1': $( '#indiprogram1_edit' ).val(),
        'angka_tahun2': $( '#indiprogram2_edit' ).val(),
        'angka_tahun3': $( '#indiprogram3_edit' ).val(),
        'angka_tahun4': $( '#indiprogram4_edit' ).val(),
        'angka_tahun5': $( '#indiprogram5_edit' ).val(),
        'angka_akhir_periode': $( '#indiprogram_akhir_edit' ).val(),
      },
      success: function ( data ) {
        $( '#tblProgram' ).DataTable().ajax.reload( null, false );
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }

      }
    } );
  } );

  $( document ).on( 'click', '.btnEditIndikatorProgram', function () {
    var data = tblInProgram.row( $( this ).parents( 'tr' ) ).data();
    $( '.btnSimpanProgramIndikator' ).removeClass( 'addProgramIndikator' );
    $( '.btnSimpanProgramIndikator' ).addClass( 'editProgramIndikator' );
    $( '.modal-title' ).text( 'Data Indikator Program Perangkat Daerah' );
    $( '.form-horizontal' ).show();
    $( '#id_indikator_program_renstra_edit' ).val( data.id_indikator_program_renstra );
    $( '#thn_id_indikator_program_edit' ).val( data.thn_id );
    $( '#id_program_renstra_indikator_edit' ).val( data.id_program_renstra );
    $( '#no_urut_indikator_program_edit' ).val( data.no_urut );
    $( '#id_perubahan_indikator_program_edit' ).val( data.id_perubahan );
    $( '#ur_indikator_program_renstra' ).val( data.nm_indikator );
    $( '#kd_indikator_program_renstra' ).val( data.kd_indikator );
    $( '#indiprogram1_edit' ).val( data.angka_tahun1 );
    $( '#indiprogram2_edit' ).val( data.angka_tahun2 );
    $( '#indiprogram3_edit' ).val( data.angka_tahun3 );
    $( '#indiprogram4_edit' ).val( data.angka_tahun4 );
    $( '#indiprogram5_edit' ).val( data.angka_tahun5 );
    $( '#indiprogram_awal_edit' ).val( data.angka_awal_periode );
    $( '#indiprogram_akhir_edit' ).val( data.angka_akhir_periode );
    $( '#satuan_program_indikator_edit' ).val( data.uraian_satuan );
    $( '#ModalIndikatorProgram' ).modal( 'show' );
  } );

  $( '.modal-footer' ).on( 'click', '.editProgramIndikator', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: './renstra/editIndikatorProgram',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_indikator_program_renstra': $( '#id_indikator_program_renstra_edit' ).val(),
        'thn_id': $( '#thn_id_indikator_program_edit' ).val(),
        'thn_id': $( '#thn_id_indikator_program_edit' ).val(),
        'no_urut': $( '#no_urut_indikator_program_edit' ).val(),
        'id_program_renstra': $( '#id_program_renstra_indikator_edit' ).val(),
        'id_perubahan': $( '#id_perubahan_indikator_program_edit' ).val(),
        'kd_indikator': $( '#kd_indikator_program_renstra' ).val(),
        'uraian_indikator_program_renstra': $( '#ur_indikator_program_renstra' ).val(),
        'tolok_ukur_indikator': $( '#ur_indikator_program_renstra' ).val(),
        'angka_awal_periode': $( '#indiprogram_awal_edit' ).val(),
        'angka_tahun1': $( '#indiprogram1_edit' ).val(),
        'angka_tahun2': $( '#indiprogram2_edit' ).val(),
        'angka_tahun3': $( '#indiprogram3_edit' ).val(),
        'angka_tahun4': $( '#indiprogram4_edit' ).val(),
        'angka_tahun5': $( '#indiprogram5_edit' ).val(),
        'angka_akhir_periode': $( '#indiprogram_akhir_edit' ).val(),
      },
      success: function ( data ) {
        $( '#tblProgram' ).DataTable().ajax.reload( null, false );
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }

      }
    } );
  } );

  $( document ).on( 'click', '.btnHapusIndikatorProgram', function () {
    var data = tblInProgram.row( $( this ).parents( 'tr' ) ).data();
    $( '.btnDelProgramIndikator' ).addClass( 'delProgramIndikator' );
    $( '.modal-title' ).text( 'Hapus Referensi Indikator' );
    $( '.form-horizontal' ).hide();
    $( '#id_program_indikator_hapus' ).val( data.id_indikator_program_renstra );
    $( '#nm_program_indikator_hapus' ).html( data.nm_indikator );
    $( '#HapusProgramIndikatorModal' ).modal( 'show' );

  } );



  $( '.modal-footer' ).on( 'click', '.delProgramIndikator', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: './renstra/delIndikatorProgram',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_indikator_program_renstra': $( '#id_program_indikator_hapus' ).val(),
      },
      success: function ( data ) {
        $( '#tblProgram' ).DataTable().ajax.reload( null, false );
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }
      }
    } );
  } );

  $( document ).on( 'click', '.btnTambahKegiatan', function () {
    $( '.btnSimpanKegiatan' ).addClass( 'addKegiatan' );
    $( '.btnSimpanKegiatan' ).removeClass( 'editKegiatan' );
    $( '.modal-title' ).text( 'Data Kegiatan Renstra Perangkat Daerah' );
    $( '.form-horizontal' ).show();
    $( '#id_kegiatan_renstra_edit' ).val( null );
    $( '#thn_id_kegiatan_edit' ).val( thn_id );
    $( '#id_program_renstra_kegiatan_edit' ).val( id_program_renstra );
    $( '#kd_program_kegiatan_edit' ).val( null );
    $( '#no_urut_kegiatan_edit' ).val( 1 );
    $( '#id_perubahan_kegiatan_edit' ).val( 1 );
    $( '#id_kegiatan_ref_edit' ).val( null );
    $( '#kd_kegiatan_edit' ).val( null );
    $( '#ur_kegiatan_renstra_edit' ).val( null );
    $( '#ur_sasaran_kegiatan_renstra_edit' ).val( null );
    $( '#pagu1_edit_kegiatan' ).val( 0 );
    $( '#pagu2_edit_kegiatan' ).val( 0 );
    $( '#pagu3_edit_kegiatan' ).val( 0 );
    $( '#pagu4_edit_kegiatan' ).val( 0 );
    $( '#pagu5_edit_kegiatan' ).val( 0 );
    $( '#pagu6_edit_kegiatan' ).val( 0 );
    $( '.divProgramRenstra' ).hide();
    sumber_belanja = 0;
    $( '#ModalKegiatan' ).modal( 'show' );
  } );

  $( document ).on( 'click', '.btnTambahKegiatanBtl', function () {
    $( '.btnSimpanKegiatan' ).addClass( 'addKegiatan' );
    $( '.btnSimpanKegiatan' ).removeClass( 'editKegiatan' );
    $( '.modal-title' ).text( 'Data Kegiatan Non Program Renstra Perangkat Daerah' );
    $( '.form-horizontal' ).show();
    $( '#id_kegiatan_renstra_edit' ).val( null );
    $( '#thn_id_kegiatan_edit' ).val( thn_id );
    $( '#id_program_renstra_kegiatan_edit' ).val( id_program_renstra );
    $( '#kd_program_kegiatan_edit' ).val( null );
    $( '#no_urut_kegiatan_edit' ).val( 1 );
    $( '#id_perubahan_kegiatan_edit' ).val( 1 );
    $( '#id_kegiatan_ref_edit' ).val( null );
    $( '#kd_kegiatan_edit' ).val( null );
    $( '#ur_kegiatan_renstra_edit' ).val( null );
    $( '#ur_sasaran_kegiatan_renstra_edit' ).val( null );
    $( '#pagu1_edit_kegiatan' ).val( 0 );
    $( '#pagu2_edit_kegiatan' ).val( 0 );
    $( '#pagu3_edit_kegiatan' ).val( 0 );
    $( '#pagu4_edit_kegiatan' ).val( 0 );
    $( '#pagu5_edit_kegiatan' ).val( 0 );
    $( '#pagu6_edit_kegiatan' ).val( 0 );
    $( '.divProgramRenstra' ).hide();
    sumber_belanja = 1;
    $( '#ModalKegiatan' ).modal( 'show' );
  } );

  $( document ).on( 'click', '.btnTambahKegiatanPdt', function () {
    $( '.btnSimpanKegiatan' ).addClass( 'addKegiatan' );
    $( '.btnSimpanKegiatan' ).removeClass( 'editKegiatan' );
    $( '.modal-title' ).text( 'Data Kegiatan Pendanaan Renstra Perangkat Daerah' );
    $( '.form-horizontal' ).show();
    $( '#id_kegiatan_renstra_edit' ).val( null );
    $( '#thn_id_kegiatan_edit' ).val( thn_id );
    $( '#id_program_renstra_kegiatan_edit' ).val( id_program_renstra );
    $( '#kd_program_kegiatan_edit' ).val( null );
    $( '#no_urut_kegiatan_edit' ).val( 1 );
    $( '#id_perubahan_kegiatan_edit' ).val( 1 );
    $( '#id_kegiatan_ref_edit' ).val( null );
    $( '#kd_kegiatan_edit' ).val( null );
    $( '#ur_kegiatan_renstra_edit' ).val( null );
    $( '#ur_sasaran_kegiatan_renstra_edit' ).val( null );
    $( '#pagu1_edit_kegiatan' ).val( 0 );
    $( '#pagu2_edit_kegiatan' ).val( 0 );
    $( '#pagu3_edit_kegiatan' ).val( 0 );
    $( '#pagu4_edit_kegiatan' ).val( 0 );
    $( '#pagu5_edit_kegiatan' ).val( 0 );
    $( '#pagu6_edit_kegiatan' ).val( 0 );
    $( '.divProgramRenstra' ).hide();
    sumber_belanja = 2;
    $( '#ModalKegiatan' ).modal( 'show' );
  } );

  $( '.modal-footer' ).on( 'click', '.addKegiatan', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: './renstra/addKegiatan',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'thn_id': $( '#thn_id_kegiatan_edit' ).val(),
        'no_urut': $( '#no_urut_kegiatan_edit' ).val(),
        'id_program_renstra': $( '#id_program_renstra_kegiatan_edit' ).val(),
        'id_kegiatan_ref': $( '#id_kegiatan_ref_edit' ).val(),
        'id_perubahan': $( '#id_perubahan_kegiatan_edit' ).val(),
        'uraian_kegiatan_renstra': $( '#ur_kegiatan_renstra_edit' ).val(),
        'uraian_sasaran_kegiatan': $( '#ur_sasaran_kegiatan_renstra_edit' ).val(),
        'pagu_tahun1': $( '#pagu1_edit_kegiatan' ).val(),
        'pagu_tahun2': $( '#pagu2_edit_kegiatan' ).val(),
        'pagu_tahun3': $( '#pagu3_edit_kegiatan' ).val(),
        'pagu_tahun4': $( '#pagu4_edit_kegiatan' ).val(),
        'pagu_tahun5': $( '#pagu5_edit_kegiatan' ).val(),
        'total_pagu': $( '#pagu6_edit_kegiatan' ).val(),
      },
      success: function ( data ) {
        if ( sumber_belanja == 0 ) {
          $( '#tblKegiatan' ).DataTable().ajax.reload( null, false );
        }
        if ( sumber_belanja == 1 ) {
          $( '#tblKegiatanBtl' ).DataTable().ajax.reload( null, false );
        }
        if ( sumber_belanja == 2 ) {
          $( '#tblKegiatanPdt' ).DataTable().ajax.reload( null, false );
        }
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }

      }
    } );
  } );

  $( document ).on( 'click', '.btnDetailKegiatan', function () {

    var data = tbl_Kegiatan.row( $( this ).parents( 'tr' ) ).data();

    $( '.btnSimpanKegiatan' ).removeClass( 'addKegiatan' );
    $( '.btnSimpanKegiatan' ).addClass( 'editKegiatan' );
    $( '.modal-title' ).text( 'Data Kegiatan Renstra Perangkat Daerah' );
    $( '.form-horizontal' ).show();
    $( '#id_kegiatan_renstra_edit' ).val( data.id_kegiatan_renstra );
    $( '#thn_id_kegiatan_edit' ).val( data.thn_id );
    $( '#id_program_renstra_kegiatan_edit' ).val( data.id_program_renstra );
    $( '#kd_program_kegiatan_edit' ).val( data.nm_program );
    $( '#no_urut_kegiatan_edit' ).val( data.no_urut );
    $( '#id_perubahan_kegiatan_edit' ).val( data.id_perubahan );
    $( '#id_kegiatan_ref_edit' ).val( data.id_kegiatan_ref );
    $( '#kd_kegiatan_edit' ).val( data.kd_kegiatan );
    $( '#ur_kegiatan_renstra_edit' ).val( data.ur_kegiatan );
    $( '#ur_sasaran_kegiatan_renstra_edit' ).val( data.uraian_sasaran_kegiatan );
    $( '#pagu1_edit_kegiatan' ).val( data.pagu_tahun1a );
    $( '#pagu2_edit_kegiatan' ).val( data.pagu_tahun2a );
    $( '#pagu3_edit_kegiatan' ).val( data.pagu_tahun3a );
    $( '#pagu4_edit_kegiatan' ).val( data.pagu_tahun4a );
    $( '#pagu5_edit_kegiatan' ).val( data.pagu_tahun5a );
    $( '#pagu6_edit_kegiatan' ).val( data.pagu_tahun6a );
    $( '.divProgramRenstra' ).show();
    sumber_belanja = 0;
    $( '#ModalKegiatan' ).modal( 'show' );
  } );

  $( document ).on( 'click', '.btnDetailKegiatanBtl', function () {

    var data = tbl_KegiatanBtl.row( $( this ).parents( 'tr' ) ).data();

    $( '.btnSimpanKegiatan' ).removeClass( 'addKegiatan' );
    $( '.btnSimpanKegiatan' ).addClass( 'editKegiatan' );
    $( '.modal-title' ).text( 'Data Kegiatan Non Program Renstra Perangkat Daerah' );
    $( '.form-horizontal' ).show();
    $( '#id_kegiatan_renstra_edit' ).val( data.id_kegiatan_renstra );
    $( '#thn_id_kegiatan_edit' ).val( data.thn_id );
    $( '#id_program_renstra_kegiatan_edit' ).val( data.id_program_renstra );
    $( '#kd_program_kegiatan_edit' ).val( data.nm_program );
    $( '#no_urut_kegiatan_edit' ).val( data.no_urut );
    $( '#id_perubahan_kegiatan_edit' ).val( data.id_perubahan );
    $( '#id_kegiatan_ref_edit' ).val( data.id_kegiatan_ref );
    $( '#kd_kegiatan_edit' ).val( data.kd_kegiatan );
    $( '#ur_kegiatan_renstra_edit' ).val( data.ur_kegiatan );
    $( '#ur_sasaran_kegiatan_renstra_edit' ).val( data.uraian_sasaran_kegiatan );
    $( '#pagu1_edit_kegiatan' ).val( data.pagu_tahun1a );
    $( '#pagu2_edit_kegiatan' ).val( data.pagu_tahun2a );
    $( '#pagu3_edit_kegiatan' ).val( data.pagu_tahun3a );
    $( '#pagu4_edit_kegiatan' ).val( data.pagu_tahun4a );
    $( '#pagu5_edit_kegiatan' ).val( data.pagu_tahun5a );
    $( '#pagu6_edit_kegiatan' ).val( data.pagu_tahun6a );
    $( '.divProgramRenstra' ).show();
    sumber_belanja = 1;
    $( '#ModalKegiatan' ).modal( 'show' );
  } );

  $( document ).on( 'click', '.btnDetailKegiatanPdt', function () {

    var data = tbl_KegiatanPdt.row( $( this ).parents( 'tr' ) ).data();

    $( '.btnSimpanKegiatan' ).removeClass( 'addKegiatan' );
    $( '.btnSimpanKegiatan' ).addClass( 'editKegiatan' );
    $( '.modal-title' ).text( 'Data Kegiatan Pendanaan Renstra Perangkat Daerah' );
    $( '.form-horizontal' ).show();
    $( '#id_kegiatan_renstra_edit' ).val( data.id_kegiatan_renstra );
    $( '#thn_id_kegiatan_edit' ).val( data.thn_id );
    $( '#id_program_renstra_kegiatan_edit' ).val( data.id_program_renstra );
    $( '#kd_program_kegiatan_edit' ).val( data.nm_program );
    $( '#no_urut_kegiatan_edit' ).val( data.no_urut );
    $( '#id_perubahan_kegiatan_edit' ).val( data.id_perubahan );
    $( '#id_kegiatan_ref_edit' ).val( data.id_kegiatan_ref );
    $( '#kd_kegiatan_edit' ).val( data.kd_kegiatan );
    $( '#ur_kegiatan_renstra_edit' ).val( data.ur_kegiatan );
    $( '#ur_sasaran_kegiatan_renstra_edit' ).val( data.uraian_sasaran_kegiatan );
    $( '#pagu1_edit_kegiatan' ).val( data.pagu_tahun1a );
    $( '#pagu2_edit_kegiatan' ).val( data.pagu_tahun2a );
    $( '#pagu3_edit_kegiatan' ).val( data.pagu_tahun3a );
    $( '#pagu4_edit_kegiatan' ).val( data.pagu_tahun4a );
    $( '#pagu5_edit_kegiatan' ).val( data.pagu_tahun5a );
    $( '#pagu6_edit_kegiatan' ).val( data.pagu_tahun6a );
    $( '.divProgramRenstra' ).show();
    sumber_belanja = 2;
    $( '#ModalKegiatan' ).modal( 'show' );
  } );

  $( '.modal-footer' ).on( 'click', '.editKegiatan', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: './renstra/editKegiatan',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_kegiatan_renstra': $( '#id_kegiatan_renstra_edit' ).val(),
        'thn_id': $( '#thn_id_kegiatan_edit' ).val(),
        'no_urut': $( '#no_urut_kegiatan_edit' ).val(),
        'id_program_renstra': $( '#id_program_renstra_kegiatan_edit' ).val(),
        'id_kegiatan_ref': $( '#id_kegiatan_ref_edit' ).val(),
        'id_perubahan': $( '#id_perubahan_kegiatan_edit' ).val(),
        'uraian_kegiatan_renstra': $( '#ur_kegiatan_renstra_edit' ).val(),
        'uraian_sasaran_kegiatan': $( '#ur_sasaran_kegiatan_renstra_edit' ).val(),
        'pagu_tahun1': $( '#pagu1_edit_kegiatan' ).val(),
        'pagu_tahun2': $( '#pagu2_edit_kegiatan' ).val(),
        'pagu_tahun3': $( '#pagu3_edit_kegiatan' ).val(),
        'pagu_tahun4': $( '#pagu4_edit_kegiatan' ).val(),
        'pagu_tahun5': $( '#pagu5_edit_kegiatan' ).val(),
        'total_pagu': $( '#pagu6_edit_kegiatan' ).val(),
      },
      success: function ( data ) {
        if ( sumber_belanja == 0 ) {
          $( '#tblKegiatan' ).DataTable().ajax.reload( null, false );
        }
        if ( sumber_belanja == 1 ) {
          $( '#tblKegiatanBtl' ).DataTable().ajax.reload( null, false );
        }
        if ( sumber_belanja == 2 ) {
          $( '#tblKegiatanPdt' ).DataTable().ajax.reload( null, false );
        }
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }

      }
    } );
  } );

  $( document ).on( 'click', '.btnHapusKegiatan', function () {
    $( '#id_kegiatan_renstra_hapus' ).val( $( '#id_kegiatan_renstra_edit' ).val() );
    $( '#ur_kegiatan_renstra_hapus' ).text( $( '#ur_kegiatan_renstra_edit' ).val() );
    $( '#HapusKegiatan' ).modal( 'show' );
  } );

  $( document ).on( 'click', '.btnDelKegiatanRenstra', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: './renstra/delKegiatan',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_kegiatan_renstra': $( '#id_kegiatan_renstra_hapus' ).val()
      },
      success: function ( data ) {
        $( '#ModalKegiatan' ).modal( 'hide' );
        if ( sumber_belanja == 0 ) {
          $( '#tblKegiatan' ).DataTable().ajax.reload( null, false );
        }
        if ( sumber_belanja == 1 ) {
          $( '#tblKegiatanBtl' ).DataTable().ajax.reload( null, false );
        }
        if ( sumber_belanja == 2 ) {
          $( '#tblKegiatanPdt' ).DataTable().ajax.reload( null, false );
        }
        createPesan( data.pesan, "info" );
      }
    } );
  } );

  var cariKegiatanRef
  $( document ).on( 'click', '.btnCariKegiatanRef', function () {
    $( '#cariKegiatanRef' ).modal( 'show' );

    cariKegiatanRef = $( '#tblCariKegiatanRef' ).DataTable( {
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
      "ajax": { "url": "./renstra/getKegiatanRef/" + id_program_ref },
      "columns": [
        { data: 'no_urut', sClass: "dt-center" },
        { data: 'kd_kegiatan', sClass: "dt-center" },
        { data: 'nm_kegiatan' }
      ],
      "order": [ [ 0, 'asc' ] ],
      "bDestroy": true
    } );
  } );

  $( '#tblCariKegiatanRef tbody' ).on( 'dblclick', 'tr', function () {
    var data = cariKegiatanRef.row( this ).data();

    document.getElementById( "kd_kegiatan_edit" ).value = data.kd_kegiatan;
    document.getElementById( "ur_kegiatan_renstra_edit" ).value = data.nm_kegiatan;
    document.getElementById( "id_kegiatan_ref_edit" ).value = data.id_kegiatan;
    $( '#cariKegiatanRef' ).modal( 'hide' );
  } );

  function hitungPaguKegiatan () {
    var p = $( '#pagu1_edit_kegiatan' ).val();
    var q = $( '#pagu2_edit_kegiatan' ).val();
    var r = $( '#pagu3_edit_kegiatan' ).val();
    var s = $( '#pagu4_edit_kegiatan' ).val();
    var t = $( '#pagu5_edit_kegiatan' ).val();

    var paguKegiatan = parseInt( p ) + parseInt( q ) + parseInt( r ) + parseInt( s ) + parseInt( t );
    return paguKegiatan;
  }

  $( "#pagu1_edit_kegiatan" ).change( function () {
    $( '#pagu6_edit_kegiatan' ).val( hitungPaguKegiatan() );
  } );
  $( "#pagu2_edit_kegiatan" ).change( function () {
    $( '#pagu6_edit_kegiatan' ).val( hitungPaguKegiatan() );
  } );
  $( "#pagu3_edit_kegiatan" ).change( function () {
    $( '#pagu6_edit_kegiatan' ).val( hitungPaguKegiatan() );
  } );
  $( "#pagu4_edit_kegiatan" ).change( function () {
    $( '#pagu6_edit_kegiatan' ).val( hitungPaguKegiatan() );
  } );
  $( "#pagu5_edit_kegiatan" ).change( function () {
    $( '#pagu6_edit_kegiatan' ).val( hitungPaguKegiatan() );
  } );

  $( document ).on( 'click', '.btnAddKegiatanIndikator', function () {
    var data = tbl_Kegiatan.row( $( this ).parents( 'tr' ) ).data();
    $( '.btnSimpanKegiatanIndikator' ).removeClass( 'editKegiatanIndikator' );
    $( '.btnSimpanKegiatanIndikator' ).addClass( 'addKegiatanIndikator' );
    $( '.modal-title' ).text( 'Data Indikator Sasaran Daerah' );
    $( '.form-horizontal' ).show();
    $( '#id_indikator_kegiatan_renstra_edit' ).val( null );
    $( '#thn_id_indikator_kegiatan_edit' ).val( data.thn_id );
    $( '#id_kegiatan_renstra_indikator_edit' ).val( data.id_kegiatan_renstra );
    $( '#no_urut_indikator_kegiatan_edit' ).val( 1 );
    $( '#id_perubahan_indikator_kegiatan_edit' ).val( 0 );
    $( '#ur_indikator_kegiatan_renstra' ).val( null );
    $( '#kd_indikator_kegiatan_renstra' ).val( null );
    $( '#indikegiatan1_edit' ).val( 0 );
    $( '#indikegiatan2_edit' ).val( 0 );
    $( '#indikegiatan3_edit' ).val( 0 );
    $( '#indikegiatan4_edit' ).val( 0 );
    $( '#indikegiatan5_edit' ).val( 0 );
    $( '#indikegiatan_awal_edit' ).val( 0 );
    $( '#indikegiatan_akhir_edit' ).val( 0 );
    $( '#satuan_kegiatan_indikator_edit' ).val( null );
    $( '#ModalIndikatorKegiatan' ).modal( 'show' );
  } );

  $( '.modal-footer' ).on( 'click', '.addKegiatanIndikator', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: './renstra/addIndikatorKegiatan',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'thn_id': $( '#thn_id_indikator_kegiatan_edit' ).val(),
        'no_urut': $( '#no_urut_indikator_kegiatan_edit' ).val(),
        'id_kegiatan_renstra': $( '#id_kegiatan_renstra_indikator_edit' ).val(),
        'id_perubahan': $( '#id_perubahan_indikator_kegiatan_edit' ).val(),
        'kd_indikator': $( '#kd_indikator_kegiatan_renstra' ).val(),
        'uraian_indikator_kegiatan_renstra': $( '#ur_indikator_kegiatan_renstra' ).val(),
        'tolok_ukur_indikator': $( '#ur_indikator_kegiatan_renstra' ).val(),
        'angka_awal_periode': $( '#indikegiatan_awal_edit' ).val(),
        'angka_tahun1': $( '#indikegiatan1_edit' ).val(),
        'angka_tahun2': $( '#indikegiatan2_edit' ).val(),
        'angka_tahun3': $( '#indikegiatan3_edit' ).val(),
        'angka_tahun4': $( '#indikegiatan4_edit' ).val(),
        'angka_tahun5': $( '#indikegiatan5_edit' ).val(),
        'angka_akhir_periode': $( '#indikegiatan_akhir_edit' ).val(),
      },
      success: function ( data ) {
        $( '#tblKegiatan' ).DataTable().ajax.reload( null, false );
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }
      }
    } );
  } );

  $( document ).on( 'click', '.btnEditIndikatorKegiatan', function () {
    var data = tblInKegiatan.row( $( this ).parents( 'tr' ) ).data();
    $( '.btnSimpanKegiatanIndikator' ).removeClass( 'addKegiatanIndikator' );
    $( '.btnSimpanKegiatanIndikator' ).addClass( 'editKegiatanIndikator' );
    $( '.modal-title' ).text( 'Data Indikator Sasaran Daerah' );
    $( '.form-horizontal' ).show();
    $( '#id_indikator_kegiatan_renstra_edit' ).val( data.id_indikator_kegiatan_renstra );
    $( '#thn_id_indikator_kegiatan_edit' ).val( data.thn_id );
    $( '#id_kegiatan_renstra_indikator_edit' ).val( data.id_kegiatan_renstra );
    $( '#no_urut_indikator_kegiatan_edit' ).val( data.no_urut );
    $( '#id_perubahan_indikator_kegiatan_edit' ).val( data.id_perubahan );
    $( '#ur_indikator_kegiatan_renstra' ).val( data.nm_indikator );
    $( '#kd_indikator_kegiatan_renstra' ).val( data.kd_indikator );
    $( '#indikegiatan1_edit' ).val( data.angka_tahun1 );
    $( '#indikegiatan2_edit' ).val( data.angka_tahun2 );
    $( '#indikegiatan3_edit' ).val( data.angka_tahun3 );
    $( '#indikegiatan4_edit' ).val( data.angka_tahun4 );
    $( '#indikegiatan5_edit' ).val( data.angka_tahun5 );
    $( '#indikegiatan_awal_edit' ).val( data.angka_awal_periode );
    $( '#indikegiatan_akhir_edit' ).val( data.angka_akhir_periode );
    $( '#satuan_kegiatan_indikator_edit' ).val( data.uraian_satuan );
    $( '#ModalIndikatorKegiatan' ).modal( 'show' );
  } );

  $( '.modal-footer' ).on( 'click', '.editKegiatanIndikator', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: './renstra/editIndikatorKegiatan',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_indikator_kegiatan_renstra': $( '#id_indikator_kegiatan_renstra_edit' ).val(),
        'thn_id': $( '#thn_id_indikator_kegiatan_edit' ).val(),
        'thn_id': $( '#thn_id_indikator_kegiatan_edit' ).val(),
        'no_urut': $( '#no_urut_indikator_kegiatan_edit' ).val(),
        'id_kegiatan_renstra': $( '#id_kegiatan_renstra_indikator_edit' ).val(),
        'id_perubahan': $( '#id_perubahan_indikator_kegiatan_edit' ).val(),
        'kd_indikator': $( '#kd_indikator_kegiatan_renstra' ).val(),
        'uraian_indikator_kegiatan_renstra': $( '#ur_indikator_kegiatan_renstra' ).val(),
        'tolok_ukur_indikator': $( '#ur_indikator_kegiatan_renstra' ).val(),
        'angka_awal_periode': $( '#indikegiatan_awal_edit' ).val(),
        'angka_tahun1': $( '#indikegiatan1_edit' ).val(),
        'angka_tahun2': $( '#indikegiatan2_edit' ).val(),
        'angka_tahun3': $( '#indikegiatan3_edit' ).val(),
        'angka_tahun4': $( '#indikegiatan4_edit' ).val(),
        'angka_tahun5': $( '#indikegiatan5_edit' ).val(),
        'angka_akhir_periode': $( '#indikegiatan_akhir_edit' ).val(),
      },
      success: function ( data ) {
        $( '#tblKegiatan' ).DataTable().ajax.reload( null, false );
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }

      }
    } );
  } );

  $( document ).on( 'click', '.btnHapusIndikatorKegiatan', function () {
    var data = tblInKegiatan.row( $( this ).parents( 'tr' ) ).data();
    $( '.btnDelKegiatanIndikator' ).addClass( 'delKegiatanIndikator' );
    $( '.modal-title' ).text( 'Hapus Referensi Indikator' );
    $( '.form-horizontal' ).hide();
    $( '#id_kegiatan_indikator_hapus' ).val( data.id_indikator_kegiatan_renstra );
    $( '#nm_kegiatan_indikator_hapus' ).html( data.nm_indikator );
    $( '#HapusKegiatanIndikatorModal' ).modal( 'show' );

  } );

  $( '.modal-footer' ).on( 'click', '.delKegiatanIndikator', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: './renstra/delIndikatorKegiatan',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_indikator_kegiatan_renstra': $( '#id_kegiatan_indikator_hapus' ).val(),
      },
      success: function ( data ) {
        $( '#tblKegiatan' ).DataTable().ajax.reload( null, false );
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }
      }
    } );
  } );
  $( document ).on( 'click', '.btnTambahPelaksana', function () {
    $.ajax( {
      type: "GET",
      url: './renstra/getsubunit/' + id_unit_renstra,
      dataType: "json",
      success: function ( data ) {
        var j = data.length;
        $( 'select[name="cbpelaksana"]' ).empty();
        $( 'select[name="cbpelaksana"]' ).append( '<option value="-1">---Pilih Sub Unit Pelaksana---</option>' );
        var post, i;
        for ( i = 0; i < j; i++ ) {
          post = data[ i ];
          $( 'select[name="cbpelaksana"]' ).append( '<option value="' + post.id_sub_unit + '">' + post.nm_sub + '</option>' );
        }
      }
    } );
    $( '.btnPelaksana' ).removeClass( 'editpelaksanakegiatan' );
    $( '.btnPelaksana' ).addClass( 'addpelaksanakegiatan' );
    $( '.modal-title' ).text( 'Tambah Pelaksana Kegiatan Perangkat Daerah' );
    $( '.form-horizontal' ).show();
    $( '#id_pelaksana' ).val( null );
    $( '#id_subunit_pelaksana' ).val( null );
    $( '#no_urut_pelaksana_kegiatan' ).val( 1 );
    $( '#id_perubahan_pelaksana_kegiatan' ).val( 0 );
    $( '#id_kegiatan_pelaksana' ).val( id_kegiatan_renstra );
    $( '#pelaksanaDisplay' ).val( null );
    $( '#div_display' ).hide();
    $( '#div_entry_sub' ).show();
    sumber_belanja = 0;
    $( '#ModalKegiatanPelaksana' ).modal( 'show' );
  } );

  $( document ).on( 'click', '.btnTambahPelaksanaBtl', function () {
    $.ajax( {
      type: "GET",
      url: './renstra/getsubunit/' + id_unit_renstra,
      dataType: "json",
      success: function ( data ) {
        var j = data.length;
        $( 'select[name="cbpelaksana"]' ).empty();
        $( 'select[name="cbpelaksana"]' ).append( '<option value="-1">---Pilih Sub Unit Pelaksana---</option>' );
        var post, i;
        for ( i = 0; i < j; i++ ) {
          post = data[ i ];
          $( 'select[name="cbpelaksana"]' ).append( '<option value="' + post.id_sub_unit + '">' + post.nm_sub + '</option>' );
        }
      }
    } );
    $( '.btnPelaksana' ).removeClass( 'editpelaksanakegiatan' );
    $( '.btnPelaksana' ).addClass( 'addpelaksanakegiatan' );
    $( '.modal-title' ).text( 'Data Pelaksana Belanja Non Program Perangkat Daerah' );
    $( '.form-horizontal' ).show();
    $( '#id_pelaksana' ).val( null );
    $( '#id_subunit_pelaksana' ).val( null );
    $( '#no_urut_pelaksana_kegiatan' ).val( 1 );
    $( '#id_perubahan_pelaksana_kegiatan' ).val( 0 );
    $( '#id_kegiatan_pelaksana' ).val( id_kegiatan_renstra );
    $( '#pelaksanaDisplay' ).val( null );
    $( '#div_display' ).hide();
    $( '#div_entry_sub' ).show();
    sumber_belanja = 1;
    $( '#ModalKegiatanPelaksana' ).modal( 'show' );
  } );

  $( document ).on( 'click', '.btnTambahPelaksanaPdt', function () {
    $.ajax( {
      type: "GET",
      url: './renstra/getsubunit/' + id_unit_renstra,
      dataType: "json",
      success: function ( data ) {
        var j = data.length;
        $( 'select[name="cbpelaksana"]' ).empty();
        $( 'select[name="cbpelaksana"]' ).append( '<option value="-1">---Pilih Sub Unit Pelaksana---</option>' );
        var post, i;
        for ( i = 0; i < j; i++ ) {
          post = data[ i ];
          $( 'select[name="cbpelaksana"]' ).append( '<option value="' + post.id_sub_unit + '">' + post.nm_sub + '</option>' );
        }
      }
    } );
    $( '.btnPelaksana' ).removeClass( 'editpelaksanakegiatan' );
    $( '.btnPelaksana' ).addClass( 'addpelaksanakegiatan' );
    $( '.modal-title' ).text( 'Data Pelaksana Pendanaan Perangkat Daerah' );
    $( '.form-horizontal' ).show();
    $( '#id_pelaksana' ).val( null );
    $( '#id_subunit_pelaksana' ).val( null );
    $( '#no_urut_pelaksana_kegiatan' ).val( 1 );
    $( '#id_perubahan_pelaksana_kegiatan' ).val( 0 );
    $( '#id_kegiatan_pelaksana' ).val( id_kegiatan_renstra );
    $( '#pelaksanaDisplay' ).val( null );
    $( '#div_display' ).hide();
    $( '#div_entry_sub' ).show();
    sumber_belanja = 2;
    $( '#ModalKegiatanPelaksana' ).modal( 'show' );
  } );

  $( '.modal-footer' ).on( 'click', '.addpelaksanakegiatan', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: './renstra/addPelaksana',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'no_urut': $( '#no_urut_pelaksana_kegiatan' ).val(),
        'id_kegiatan_renstra': $( '#id_kegiatan_pelaksana' ).val(),
        'id_sub_unit': $( '#cbpelaksana' ).val(),
        'id_perubahan': $( '#id_perubahan_pelaksana_kegiatan' ).val(),
      },
      success: function ( data ) {
        if ( sumber_belanja == 0 ) {
          $( '#tblPelaksana' ).DataTable().ajax.reload( null, false );
        }
        if ( sumber_belanja == 1 ) {
          $( '#tblPelaksanaBtl' ).DataTable().ajax.reload( null, false );
        }
        if ( sumber_belanja == 2 ) {
          $( '#tblPelaksanaPdt' ).DataTable().ajax.reload( null, false );
        }
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }
      }
    } );
  } );

  $( document ).on( 'click', '.btnEditPelaksana', function () {
    var data = tbl_Pelaksana.row( $( this ).parents( 'tr' ) ).data();
    $( '.btnPelaksana' ).addClass( 'editpelaksanakegiatan' );
    $( '.btnPelaksana' ).removeClass( 'addpelaksanakegiatan' );
    $( '.modal-title' ).text( 'Edit Pelaksana Kegiatan Perangkat Daerah' );
    $( '.form-horizontal' ).show();
    $( '#id_pelaksana' ).val( data.id_kegiatan_renstra_pelaksana );
    $( '#id_kegiatan_pelaksana' ).val( id_kegiatan_renstra );
    $( '#id_subunit_pelaksana' ).val( data.id_sub_unit );
    $( '#no_urut_pelaksana_kegiatan' ).val( data.no_urut );
    $( '#id_perubahan_pelaksana_kegiatan' ).val( data.id_perubahan );
    $.ajax( {
      type: "GET",
      url: './renstra/getsubunit/' + id_unit_renstra,
      dataType: "json",
      success: function ( data ) {
        var j = data.length;
        $( 'select[name="cbpelaksana"]' ).empty();
        $( 'select[name="cbpelaksana"]' ).append( '<option value="-1">---Pilih Sub Unit Pelaksana---</option>' );
        var post, i;
        for ( i = 0; i < j; i++ ) {
          post = data[ i ];
          $( 'select[name="cbpelaksana"]' ).append( '<option value="' + post.id_sub_unit + '">' + post.nm_sub + '</option>' );
        }
      }
    } );
    $( '#pelaksanaDisplay' ).val( data.nm_sub );
    $( '#div_display' ).show();
    $( '#div_entry_sub' ).hide();
    sumber_belanja = 0;
    $( '#ModalKegiatanPelaksana' ).modal( 'show' );
  } );

  $( document ).on( 'click', '.btnEditPelaksanaBtl', function () {
    var data = tbl_PelaksanaBtl.row( $( this ).parents( 'tr' ) ).data();
    $( '.btnPelaksana' ).addClass( 'editpelaksanakegiatan' );
    $( '.btnPelaksana' ).removeClass( 'addpelaksanakegiatan' );
    $( '.modal-title' ).text( 'Edit Pelaksana Belanja Non Program Perangkat Daerah' );
    $( '.form-horizontal' ).show();
    $( '#id_pelaksana' ).val( data.id_kegiatan_renstra_pelaksana );
    $( '#id_kegiatan_pelaksana' ).val( id_kegiatan_renstra );
    $( '#id_subunit_pelaksana' ).val( data.id_sub_unit );
    $( '#no_urut_pelaksana_kegiatan' ).val( data.no_urut );
    $( '#id_perubahan_pelaksana_kegiatan' ).val( data.id_perubahan );
    $.ajax( {
      type: "GET",
      url: './renstra/getsubunit/' + id_unit_renstra,
      dataType: "json",
      success: function ( data ) {
        var j = data.length;
        $( 'select[name="cbpelaksana"]' ).empty();
        $( 'select[name="cbpelaksana"]' ).append( '<option value="-1">---Pilih Sub Unit Pelaksana---</option>' );
        var post, i;
        for ( i = 0; i < j; i++ ) {
          post = data[ i ];
          $( 'select[name="cbpelaksana"]' ).append( '<option value="' + post.id_sub_unit + '">' + post.nm_sub + '</option>' );
        }
      }
    } );
    $( '#pelaksanaDisplay' ).val( data.nm_sub );
    $( '#div_display' ).show();
    $( '#div_entry_sub' ).hide();
    sumber_belanja = 1;
    $( '#ModalKegiatanPelaksana' ).modal( 'show' );
  } );

  $( document ).on( 'click', '.btnEditPelaksanaPdt', function () {
    var data = tbl_PelaksanaPdt.row( $( this ).parents( 'tr' ) ).data();
    $( '.btnPelaksana' ).addClass( 'editpelaksanakegiatan' );
    $( '.btnPelaksana' ).removeClass( 'addpelaksanakegiatan' );
    $( '.modal-title' ).text( 'Edit Pelaksana Belanja Non Program Perangkat Daerah' );
    $( '.form-horizontal' ).show();
    $( '#id_pelaksana' ).val( data.id_kegiatan_renstra_pelaksana );
    $( '#id_kegiatan_pelaksana' ).val( id_kegiatan_renstra );
    $( '#id_subunit_pelaksana' ).val( data.id_sub_unit );
    $( '#no_urut_pelaksana_kegiatan' ).val( data.no_urut );
    $( '#id_perubahan_pelaksana_kegiatan' ).val( data.id_perubahan );
    $.ajax( {
      type: "GET",
      url: './renstra/getsubunit/' + id_unit_renstra,
      dataType: "json",
      success: function ( data ) {
        var j = data.length;
        $( 'select[name="cbpelaksana"]' ).empty();
        $( 'select[name="cbpelaksana"]' ).append( '<option value="-1">---Pilih Sub Unit Pelaksana---</option>' );
        var post, i;
        for ( i = 0; i < j; i++ ) {
          post = data[ i ];
          $( 'select[name="cbpelaksana"]' ).append( '<option value="' + post.id_sub_unit + '">' + post.nm_sub + '</option>' );
        }
      }
    } );
    $( '#pelaksanaDisplay' ).val( data.nm_sub );
    $( '#div_display' ).show();
    $( '#div_entry_sub' ).hide();
    sumber_belanja = 2;
    $( '#ModalKegiatanPelaksana' ).modal( 'show' );
  } );

  $( '.modal-footer' ).on( 'click', '.editpelaksanakegiatan', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: './renstra/editPelaksana',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'no_urut': $( '#no_urut_pelaksana_kegiatan' ).val(),
        'id_kegiatan_renstra': $( '#id_kegiatan_pelaksana' ).val(),
        'id_sub_unit': $( '#cbpelaksana' ).val(),
        'id_perubahan': $( '#id_perubahan_pelaksana_kegiatan' ).val(),
        'id_kegiatan_renstra_pelaksana': $( '#id_pelaksana' ).val(),
      },
      success: function ( data ) {
        if ( sumber_belanja == 0 ) {
          $( '#tblPelaksana' ).DataTable().ajax.reload( null, false );
        }
        if ( sumber_belanja == 1 ) {
          $( '#tblPelaksanaBtl' ).DataTable().ajax.reload( null, false );
        }
        if ( sumber_belanja == 2 ) {
          $( '#tblPelaksanaPdt' ).DataTable().ajax.reload( null, false );
        }
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }
      }
    } );
  } );


  $( document ).on( 'click', '.btnHapusPelaksana', function () {
    var data = tbl_Pelaksana.row( $( this ).parents( 'tr' ) ).data();
    $( '.btnDelKegiatanPelaksana' ).addClass( 'delKegiatanIndikator' );
    $( '.modal-title' ).text( 'Hapus Pelaksana Kegiatan Renstra' );
    $( '.form-horizontal' ).hide();
    $( '#id_kegiatan_pelaksana_hapus' ).val( data.id_kegiatan_renstra_pelaksana );
    $( '#nm_unit_pelaksana_hapus' ).html( data.nm_sub );
    sumber_belanja = 0;
    $( '#HapusKegiatanPelaksanaModal' ).modal( 'show' );
  } );

  $( document ).on( 'click', '.btnHapusPelaksanaBtl', function () {
    var data = tbl_PelaksanaBtl.row( $( this ).parents( 'tr' ) ).data();
    $( '.btnDelKegiatanPelaksana' ).addClass( 'delKegiatanIndikator' );
    $( '.modal-title' ).text( 'Hapus Pelaksana Non Program Renstra' );
    $( '.form-horizontal' ).hide();
    $( '#id_kegiatan_pelaksana_hapus' ).val( data.id_kegiatan_renstra_pelaksana );
    $( '#nm_unit_pelaksana_hapus' ).html( data.nm_sub );
    sumber_belanja = 1;
    $( '#HapusKegiatanPelaksanaModal' ).modal( 'show' );
  } );

  $( document ).on( 'click', '.btnHapusPelaksanaPdt', function () {
    var data = tbl_PelaksanaPdt.row( $( this ).parents( 'tr' ) ).data();
    $( '.btnDelKegiatanPelaksana' ).addClass( 'delKegiatanIndikator' );
    $( '.modal-title' ).text( 'Hapus Pelaksana Pendanaan Renstra' );
    $( '.form-horizontal' ).hide();
    $( '#id_kegiatan_pelaksana_hapus' ).val( data.id_kegiatan_renstra_pelaksana );
    $( '#nm_unit_pelaksana_hapus' ).html( data.nm_sub );
    sumber_belanja = 2;
    $( '#HapusKegiatanPelaksanaModal' ).modal( 'show' );
  } );

  $( '.modal-footer' ).on( 'click', '.delKegiatanIndikator', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: './renstra/delPelaksana',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_kegiatan_renstra_pelaksana': $( '#id_kegiatan_pelaksana_hapus' ).val(),
      },
      success: function ( data ) {
        if ( sumber_belanja == 0 ) {
          $( '#tblPelaksana' ).DataTable().ajax.reload( null, false );
        }
        if ( sumber_belanja == 1 ) {
          $( '#tblPelaksanaBtl' ).DataTable().ajax.reload( null, false );
        }
        if ( sumber_belanja == 2 ) {
          $( '#tblPelaksanaPdt' ).DataTable().ajax.reload( null, false );
        }
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }
      }
    } );
  } );

  $( document ).on( 'click', '.btnTambahKebijakan', function () {
    $( '.btnSimpanKebijakan' ).removeClass( 'editKebijakan' );
    $( '.btnSimpanKebijakan' ).addClass( 'addKebijakan' );
    $( '.modal-title' ).text( 'Data Kebijakan Perangkat Daerah' );
    $( '.form-horizontal' ).show();
    $( '#id_kebijakan_renstra_edit' ).val( null );
    $( '#thn_id_kebijakan_edit' ).val( thn_id );
    $( '#id_sasaran_renstra_kebijakan_edit' ).val( id_sasaran_renstra );
    $( '#no_urut_kebijakan_edit' ).val( 1 );
    $( '#id_perubahan_kebijakan_edit' ).val( 0 );
    $( '#ur_kebijakan_renstra_edit' ).val( null );
    $( '#ModalKebijakan' ).modal( 'show' );
  } );

  $( '.modal-footer' ).on( 'click', '.addKebijakan', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: './renstra/addKebijakan',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'no_urut': $( '#no_urut_kebijakan_edit' ).val(),
        'id_sasaran_renstra': $( '#id_sasaran_renstra_kebijakan_edit' ).val(),
        'uraian_kebijakan_renstra': $( '#ur_kebijakan_renstra_edit' ).val(),
        'id_perubahan': $( '#id_perubahan_kebijakan_edit' ).val(),
      },
      success: function ( data ) {
        $( '#tblKebijakan' ).DataTable().ajax.reload( null, false );
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }
      }
    } );
  } );

  $( document ).on( 'click', '.btnEditKebijakan', function () {
    var data = tbl_Kebijakan.row( $( this ).parents( 'tr' ) ).data();
    $( '.btnSimpanKebijakan' ).addClass( 'editKebijakan' );
    $( '.btnSimpanKebijakan' ).removeClass( 'addKebijakan' );
    $( '.modal-title' ).text( 'Data Kebijakan Perangkat Daerah' );
    $( '.form-horizontal' ).show();
    $( '#id_kebijakan_renstra_edit' ).val( data.id_kebijakan_renstra );
    $( '#thn_id_kebijakan_edit' ).val( data.thn_id );
    $( '#id_sasaran_renstra_kebijakan_edit' ).val( data.id_sasaran_renstra );
    $( '#no_urut_kebijakan_edit' ).val( data.no_urut );
    $( '#id_perubahan_kebijakan_edit' ).val( data.id_perubahan );
    $( '#ur_kebijakan_renstra_edit' ).val( data.uraian_kebijakan_renstra );
    $( '#ModalKebijakan' ).modal( 'show' );
  } );

  $( '.modal-footer' ).on( 'click', '.editKebijakan', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: './renstra/editKebijakan',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'no_urut': $( '#no_urut_kebijakan_edit' ).val(),
        'id_sasaran_renstra': $( '#id_sasaran_renstra_kebijakan_edit' ).val(),
        'uraian_kebijakan_renstra': $( '#ur_kebijakan_renstra_edit' ).val(),
        'id_perubahan': $( '#id_perubahan_kebijakan_edit' ).val(),
        'id_kebijakan_renstra': $( '#id_kebijakan_renstra_edit' ).val(),
      },
      success: function ( data ) {
        $( '#tblKebijakan' ).DataTable().ajax.reload( null, false );
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }
      }
    } );
  } );

  $( document ).on( 'click', '.btnHapusKebijakan', function () {
    var data = tbl_Kebijakan.row( $( this ).parents( 'tr' ) ).data();
    $( '.btnDelKebijakanRenstra' ).addClass( 'deleteKebijakan' );
    $( '.modal-title' ).text( 'Data Kebijakan Perangkat Daerah' );
    $( '.form-horizontal' ).show();
    $( '#id_kebijakan_renstra_hapus' ).val( data.id_kebijakan_renstra );
    $( '#ur_kebijakan_renstra_hapus' ).html( data.uraian_kebijakan_renstra );
    $( '#HapusKebijakan' ).modal( 'show' );
  } );

  $( '.modal-footer' ).on( 'click', '.deleteKebijakan', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: './renstra/delKebijakan',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_kebijakan_renstra': $( '#id_kebijakan_renstra_hapus' ).val(),
      },
      success: function ( data ) {
        $( '#tblKebijakan' ).DataTable().ajax.reload( null, false );
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }
      }
    } );
  } );

  $( document ).on( 'click', '.btnTambahStrategi', function () {
    $( '.btnSimpanStrategi' ).removeClass( 'editStrategi' );
    $( '.btnSimpanStrategi' ).addClass( 'addStrategi' );
    $( '.modal-title' ).text( 'Data Strategi Perangkat Daerah' );
    $( '.form-horizontal' ).show();
    $( '#id_strategi_renstra_edit' ).val( null );
    $( '#thn_id_strategi_edit' ).val( thn_id );
    $( '#id_sasaran_renstra_strategi_edit' ).val( id_sasaran_renstra );
    $( '#no_urut_strategi_edit' ).val( 1 );
    $( '#id_perubahan_strategi_edit' ).val( 0 );
    $( '#ur_strategi_renstra_edit' ).val( null );
    $( '#ModalStrategi' ).modal( 'show' );
  } );

  $( '.modal-footer' ).on( 'click', '.addStrategi', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: './renstra/addStrategi',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'no_urut': $( '#no_urut_strategi_edit' ).val(),
        'id_sasaran_renstra': $( '#id_sasaran_renstra_strategi_edit' ).val(),
        'uraian_strategi_renstra': $( '#ur_strategi_renstra_edit' ).val(),
        'id_perubahan': $( '#id_perubahan_strategi_edit' ).val(),
      },
      success: function ( data ) {
        $( '#tblStrategi' ).DataTable().ajax.reload( null, false );
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }
      }
    } );
  } );

  $( document ).on( 'click', '.btnEditStrategi', function () {
    var data = tbl_Strategi.row( $( this ).parents( 'tr' ) ).data();
    $( '.btnSimpanStrategi' ).addClass( 'editStrategi' );
    $( '.btnSimpanStrategi' ).removeClass( 'addStrategi' );
    $( '.modal-title' ).text( 'Data Strategi Perangkat Daerah' );
    $( '.form-horizontal' ).show();
    $( '#id_strategi_renstra_edit' ).val( data.id_strategi_renstra );
    $( '#thn_id_strategi_edit' ).val( data.thn_id );
    $( '#id_sasaran_renstra_strategi_edit' ).val( data.id_sasaran_renstra );
    $( '#no_urut_strategi_edit' ).val( data.no_urut );
    $( '#id_perubahan_strategi_edit' ).val( data.id_perubahan );
    $( '#ur_strategi_renstra_edit' ).val( data.uraian_strategi_renstra );
    $( '#ModalStrategi' ).modal( 'show' );
  } );

  $( '.modal-footer' ).on( 'click', '.editStrategi', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: './renstra/editStrategi',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'no_urut': $( '#no_urut_strategi_edit' ).val(),
        'id_sasaran_renstra': $( '#id_sasaran_renstra_strategi_edit' ).val(),
        'uraian_strategi_renstra': $( '#ur_strategi_renstra_edit' ).val(),
        'id_perubahan': $( '#id_perubahan_strategi_edit' ).val(),
        'id_strategi_renstra': $( '#id_strategi_renstra_edit' ).val(),
      },
      success: function ( data ) {
        $( '#tblStrategi' ).DataTable().ajax.reload( null, false );
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }
      }
    } );
  } );

  $( document ).on( 'click', '.btnHapusStrategi', function () {
    var data = tbl_Strategi.row( $( this ).parents( 'tr' ) ).data();
    $( '.btnDelStrategiRenstra' ).addClass( 'deleteStrategi' );
    $( '.modal-title' ).text( 'Data Strategi Perangkat Daerah' );
    $( '.form-horizontal' ).show();
    $( '#id_strategi_renstra_hapus' ).val( data.id_strategi_renstra );
    $( '#ur_strategi_renstra_hapus' ).html( data.uraian_strategi_renstra );
    $( '#HapusStrategi' ).modal( 'show' );
  } );

  $( '.modal-footer' ).on( 'click', '.deleteStrategi', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: './renstra/delStrategi',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_strategi_renstra': $( '#id_strategi_renstra_hapus' ).val(),
      },
      success: function ( data ) {
        $( '#tblStrategi' ).DataTable().ajax.reload( null, false );
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }
      }
    } );
  } );


} ); //END FILE