$( document ).ready( function () {

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
  }

  $( '.page-alert .close' ).click( function ( e ) {
    e.preventDefault();
    $( this ).closest( '.page-alert' ).slideUp();
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
  }

  function nilaiNip ( string ) {
    return string.replace( /\D/g, '' ).substring( 0, 20 );
  }

  var angkaNip = document.getElementsByClassName( 'nip' );

  angkaNip.onkeydown = function ( e ) {
    if ( !( ( e.keyCode > 95 && e.keyCode < 106 )
      || ( e.keyCode > 47 && e.keyCode < 58 )
    ) ) { return false; }
  }

  $( "input[name='nip_tandatangan_display']" ).on( "keyup", function () {
    $( "input[name='nip_tandatangan']" ).val( nilaiNip( this.value ) );
    this.value = buatNip( $( "input[name='nip_tandatangan']" ).val() );
  } )

  var thn_session = $( '#tahun_rkpd' ).val();
  vars = "?tahun=" + thn_session;
  $.ajax( {
    type: "GET",
    url: '90ppas/getDataDokReferensi' + vars,
    dataType: "json",
    success: function ( data ) {

      var j = data.length;
      var post, i;

      $( 'select[name="id_dokumen_ref"]' ).empty();
      $( 'select[name="id_dokumen_ref"]' ).append( '<option value="0">---Pilih Dokumen Referensi---</option>' );

      for ( i = 0; i < j; i++ ) {
        post = data[ i ];
        $( 'select[name="id_dokumen_ref"]' ).append( '<option value="' + post.id_dokumen_rkpd + '">' + post.nomor_display + '</option>' );
      }
    }
  } );

  var dokumen_tbl = $( '#tblDokumen' ).DataTable( {
    processing: true,
    serverSide: true,
    "autoWidth": false,
    "ajax": { "url": "./90ppas/getDataDokumen" },
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
    "pageLength": 10,
    "lengthMenu": [ [ 10, 25, 50, -1 ], [ 10, 25, 50, "All" ] ],
    "columns": [
      { data: 'no_urut', sClass: "dt-center" },
      { data: 'tahun_anggaran', sClass: "dt-center" },
      { data: 'nomor_keu' },
      { data: 'uraian_perkada' },
      {
        data: 'icon', 'searchable': false, 'orderable': false, sClass: "dt-center", width: "15px",
        render: function ( data, type, row, meta ) {
          return '<i class="' + row.status_icon + '" style="font-size:16px;color:' + row.warna + ';"/>';
        }
      },
      { data: 'action', 'searchable': false, 'orderable': false, sClass: "dt-center" }
    ],
    "order": [ [ 0, 'asc' ] ],
    "bDestroy": true
  } );

  var TblRekapPPAS;
  TblRekapPPAS = $( '#tblRekapPPAS' ).DataTable();
  function loadTblRekapPPAS ( id_dokumen_keu ) {
    vars = "?id_dokumen_keu=" + id_dokumen_keu;
    TblRekapPPAS = $( '#tblRekapPPAS' ).DataTable( {
      processing: true,
      serverSide: true,
      dom: 'BfRtip',
      autoWidth: false,
      "ajax": { "url": "./90ppas/getDataRekap" + vars },
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
      "pageLength": 10,
      "lengthMenu": [ [ 10, 25, 50, -1 ], [ 10, 25, 50, "All" ] ],
      "bDestroy": true,
      "columns": [
        { data: 'action', 'searchable': false, 'orderable': false, sClass: "dt-center" },
        { data: 'uraian_program_rpjmd' },
        {
          data: 'pagu_keuangan', sClass: "dt-center",
          render: $.fn.dataTable.render.number( '.', ',', 2, '' )
        },
        {
          data: 'jml_unit', sClass: "dt-center",
          render: $.fn.dataTable.render.number( '.', ',', 0, '' )
        },
        {
          data: 'jml_prog_pd', sClass: "dt-center",
          render: $.fn.dataTable.render.number( '.', ',', 0, '' )
        },
        {
          data: 'pagu_prog_pd', sClass: "dt-center",
          render: $.fn.dataTable.render.number( '.', ',', 2, '' )
        },
        {
          data: 'jml_kegiatan', sClass: "dt-center",
          render: $.fn.dataTable.render.number( '.', ',', 0, '' )
        },
        {
          data: 'pagu_kegiatan', sClass: "dt-center",
          render: $.fn.dataTable.render.number( '.', ',', 2, '' )
        },
        {
          data: 'jml_subkegiatan', sClass: "dt-center",
          render: $.fn.dataTable.render.number( '.', ',', 0, '' )
        },
        {
          data: 'pagu_subkegiatan', sClass: "dt-center",
          render: $.fn.dataTable.render.number( '.', ',', 2, '' )
        },
        {
          data: 'jml_aktivitas', sClass: "dt-center",
          render: $.fn.dataTable.render.number( '.', ',', 0, '' )
        },
        {
          data: 'pagu_aktivitas', sClass: "dt-center",
          render: $.fn.dataTable.render.number( '.', ',', 2, '' )
        }
      ],
      "order": [ [ 0, 'asc' ] ]
    } );
  };

  $( document ).on( 'click', '#btnUnload', function () {
    var data = TblRekapPPAS.row( $( this ).parents( 'tr' ) ).data();
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );
    $( '#prosesbar' ).show();
    $.ajax( {
      type: 'POST',
      url: './90ppas/unLoadData',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_anggaran_pemda': data.id_anggaran_pemda
      },
      success: function ( data ) {
        createPesan( data.pesan, "success" );
        TblRekapPPAS.ajax.reload( null, false );
        $( '#prosesbar' ).hide();
      },
      error: function ( err ) {
        createPesan( err, "danger" );
        TblRekapPPAS.ajax.reload( null, false );
        $( '#prosesbar' ).hide();
      }
    } );
  } );

  var ReProses_Tbl;
  function loadReProses () {
    ReProses_Tbl = $( '#tblReProses' ).DataTable( {
      processing: true,
      serverSide: true,
      "autoWidth": false,
      "ajax": { "url": "./90ppas/getSelectProgram" },
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
      "pageLength": 10,
      "lengthMenu": [ [ 10, 25, 50, -1 ], [ 10, 25, 50, "All" ] ],
      "bDestroy": true,
      'columnDefs': [
        {
          'width': 10,
          'targets': 0,
          'checkboxes': { 'selectRow': true }
        },
        { "targets": 1, "width": 10 }
      ],
      'select': { 'style': 'multi' },
      "columns": [
        { data: 'id_rkpd_rancangan', sClass: "dt-center", searchable: false, orderable: false, },
        { data: 'urut', sClass: "dt-center" },
        { data: 'uraian_program_rpjmd' },
        { data: 'action', 'searchable': false, 'orderable': false, sClass: "dt-center" },
      ],
      "order": [ [ 0, 'asc' ] ]
    } );
  };

  var id_dokumen_temp, tahun_rkpd_temp;
  $( '#tblDokumen tbody' ).on( 'dblclick', 'tr', function () {
    var data = dokumen_tbl.row( this ).data();
    id_dokumen_temp = data.id_dokumen_keu;
    tahun_rkpd_temp = data.tahun_anggaran;
    loadTblRekapPPAS( data.id_dokumen_keu );
    $( '.nav-tabs a[href="#rekap"]' ).tab( 'show' );

  } );

  $( document ).on( 'click', '#btnLihatRekap', function () {
    var data = dokumen_tbl.row( $( this ).parents( 'tr' ) ).data();
    loadTblRekapPPAS( data.id_dokumen_keu );
    $( '.nav-tabs a[href="#rekap"]' ).tab( 'show' );
  } );

  $( document ).on( 'click', '#btnAddDokumen', function () {
    $.ajax( {
      type: "GET",
      url: './90ppas/getDataPerencana',
      dataType: "json",
      success: function ( data ) {
        $( '#btnDokumen' ).removeClass( 'editDokumen' );
        $( '#btnDokumen' ).addClass( 'addDokumen' );
        $( '.modal-title' ).text( 'Tambah Dokumen Proritas dan Plafond Anggaran Sementara (PPAS)' );
        $( '.form-horizontal' ).show();
        $( '#id_dokumen_rkpd' ).val( null );
        // $('#tahun_rkpd').val('<%= Session["tahun"] %>');
        $( '#id_dokumen_ref' ).val( 0 );
        $( '#tanggal_rkpd' ).val( null );
        $( '#tanggal_rkpd_x' ).val( null );
        $( '#nomor_rkpd' ).val( null );
        $( '#uraian_perkada' ).val( null );
        $( '#id_unit_perencana' ).val( data[ 0 ].unit_keuangan );
        $( '#id_unit_perencana_display' ).val( data[ 0 ].nm_unit );
        $( '#nama_tandatangan' ).val( data[ 0 ].nama_kepala_bpkad );

        if ( data[ 0 ].nip_kepala_bpkad == null ) {
          $( '#nip_tandatangan_display' ).val( null );
        } else {
          $( '#nip_tandatangan_display' ).val( buatNip( data[ 0 ].nip_kepala_bpkad ) );
        };

        $( '#nip_tandatangan' ).val( data[ 0 ].nip_kepala_bpkad );

        $( '#btnDelDokumen' ).hide();
        $( '#btnDokumen' ).show();
        $( '#TambahDokumen' ).modal( 'show' );
      }
    } );
  } );

  $( '.modal-footer' ).on( 'click', '.addDokumen', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: '90ppas/addDokumen',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_dokumen_ref': $( '#id_dokumen_ref' ).val(),
        'nomor_keu': $( '#nomor_rkpd' ).val(),
        'tanggal_keu': $( '#tanggal_rkpd' ).val(),
        'uraian_perkada': $( '#uraian_perkada' ).val(),
        'id_unit_ppkd': $( '#id_unit_perencana' ).val(),
        'nama_tandatangan': $( '#nama_tandatangan' ).val(),
        'nip_tandatangan': $( '#nip_tandatangan' ).val(),
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
    $( '.modal-title' ).text( 'Ubah Dokumen Proritas dan Plafond Anggaran Sementara (PPAS)' );
    $( '.form-horizontal' ).show();

    $( '#id_dokumen_rkpd' ).val( data.id_dokumen_keu );
    $( '#tahun_rkpd' ).val( data.tahun_anggaran );
    $( '#tanggal_rkpd' ).val( data.tanggal_keu );
    $( '#tanggal_rkpd_x' ).val( formatTgl( data.tanggal_keu ) );
    $( '#nomor_rkpd' ).val( data.nomor_keu );
    $( '#uraian_perkada' ).val( data.uraian_perkada );
    $( '#id_unit_perencana' ).val( data.id_unit_ppkd );
    $( '#id_unit_perencana_display' ).val( data.nm_unit );
    $( '#nama_tandatangan' ).val( data.nama_tandatangan );
    $( '#nip_tandatangan' ).val( data.nip_tandatangan );
    $( '#id_dokumen_ref' ).val( data.id_dokumen_ref ).trigger( 'change' );

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
      url: '90ppas/editDokumen',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_dokumen_keu': $( '#id_dokumen_rkpd' ).val(),
        'id_dokumen_ref': $( '#id_dokumen_ref' ).val(),
        'nomor_keu': $( '#nomor_rkpd' ).val(),
        'tanggal_keu': $( '#tanggal_rkpd' ).val(),
        'uraian_perkada': $( '#uraian_perkada' ).val(),
        'id_unit_ppkd': $( '#id_unit_perencana' ).val(),
        'nama_tandatangan': $( '#nama_tandatangan' ).val(),
        'nip_tandatangan': $( '#nip_tandatangan' ).val(),

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
      url: '90ppas/hapusDokumen',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_dokumen_keu': $( '#id_dokumen_hapus' ).val(),
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

  $( document ).on( 'click', '#btnPostingRkpd', function () {

    var data = dokumen_tbl.row( $( this ).parents( 'tr' ) ).data();
    $( '.form-horizontal' ).show();

    $( '#id_dokumen_posting' ).val( data.id_dokumen_keu );
    $( '#id_dokumen_referensi' ).val( data.id_dokumen_ref );
    $( '#status_dokumen_posting' ).val( data.flag );
    $( '#tahun_dokumen_posting' ).val( data.tahun_anggaran );
    $( '#ur_tahun_posting' ).html( data.tahun_anggaran );

    if ( data.flag == 0 ) {
      $( '#ur_status_dokumen_posting' ).html( "Posting" );
    } else {
      $( '#ur_status_dokumen_posting' ).html( "Un-Posting" );
    };

    $( '#StatusProgram' ).modal( 'show' );
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
      url: '90ppas/postDokumen',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'tahun_anggaran': $( '#tahun_dokumen_posting' ).val(),
        'id_dokumen_keu': $( '#id_dokumen_posting' ).val(),
        'id_dokumen_ref': $( '#id_dokumen_referensi' ).val(),
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

  $( document ).on( 'click', '#btnProsesLoad', function () {
    var data = dokumen_tbl.row( $( this ).parents( 'tr' ) ).data();
    dokumen_temp = data.id_dokumen_keu;
    loadTblRekapPPAS( data.id_dokumen_keu );
    loadReProses();
    $( '#cariReload' ).modal( 'show' );
  } );

  $( document ).on( 'click', '#btnAddLoad', function () {
    dokumen_temp = id_dokumen_temp;
    loadReProses();
    $( '#cariReload' ).modal( 'show' );
  } );

  $( document ).on( 'click', '#btnReLoad', function () {
    var data = ReProses_Tbl.row( $( this ).parents( 'tr' ) ).data();
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );
    $( '#prosesbar' ).show();
    $.ajax( {
      type: 'POST',
      url: './90ppas/importData',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'kd_dokumen_keu': "0",
        'jns_dokumen_keu': "0",
        'id_perubahan': "0",
        'id_dokumen_rkpd': dokumen_temp,
        'id_program_rkpd': data.id_rkpd_rancangan,
      },
      success: function ( data ) {
        createPesan( data.pesan, "success" );
        ReProses_Tbl.ajax.reload( null, false );
        TblRekapPPAS.ajax.reload( null, false );
        $( '#prosesbar' ).hide();
      },
      error: function ( data ) {
        createPesan( data.pesan, "danger" );
        ReProses_Tbl.ajax.reload( null, false );
        TblRekapPPAS.ajax.reload( null, false );
        $( '#prosesbar' ).hide();
      }
    } );
  } );

  $( document ).on( 'click', '#btnProsesAll', function () {
    var rows_selected = ReProses_Tbl.column( 0 ).checkboxes.selected();
    if ( rows_selected.count() == 0 ) {
      createPesan( "Data belum ada yang dipilih", "danger" );
      return;
    };
    $( '#prosesbar' ).show();
    $.each( rows_selected, function ( index, rowId ) {
      var id_rkpd = rowId;
      $.ajaxSetup( {
        headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
      } );
      $.ajax( {
        type: 'POST',
        url: './importData',
        data: {
          '_token': $( 'input[name=_token]' ).val(),
          'kd_dokumen_keu': "0",
          'jns_dokumen_keu': "0",
          'id_perubahan': "0",
          'id_dokumen_rkpd': dokumen_temp,
          'id_program_rkpd': data.id_program_rkpd,
        },
        success: function ( data ) {
          createPesan( data.pesan, "success" );
          $( '#prosesbar' ).hide();
          $( '#cariReload' ).modal( 'hide' );
        },
        error: function ( data ) {
          createPesan( data.pesan, "danger" );
          $( '#prosesbar' ).hide();
        }
      } );
    } );
    e.preventDefault();
  } );

  $( document ).on( 'click', '#btnUnload', function () {
    var data = programrkpd.row( $( this ).parents( 'tr' ) ).data();
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );
    $( '#prosesbar' ).show();
    $.ajax( {
      type: 'POST',
      url: './unLoadData',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_rkpd_program': data.id_rkpd_program
      },
      success: function ( data ) {
        createPesan( data.pesan, "success" );
        programrkpd.ajax.reload( null, false );
        $( '#prosesbar' ).hide();
      },
      error: function ( err ) {
        createPesan( err, "danger" );
        programrkpd.ajax.reload( null, false );
        $( '#prosesbar' ).hide();
      }
    } );
  } );

} );