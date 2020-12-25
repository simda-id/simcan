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
      "Oktober", "November", "Desember" );
    var tgl = d + " " + m_names[ m ] + " " + y;
    return tgl;
  };

  $( '.page-alert .close' ).click( function ( e ) {
    e.preventDefault();
    $( this ).closest( '.page-alert' ).slideUp();
  } );

  $( ".disabled" ).click( function ( e ) {
    e.preventDefault();
    return false;
  } );

  $( '#prosesbar' ).hide();

  $( '#tahun_rkpd' ).number( true, 0, ',', '' );

  $( '#tanggal_rkpd_x' ).datepicker( {
    altField: "#tanggal_rkpd",
    altFormat: "yy-mm-dd",
    dateFormat: "dd MM yy"
  } );

  $( '#btn' ).click( function () {
    $( "#tanggal_rkpd_x" ).focus()
  } );

  function buatNip ( string ) {
    return string.replace( /(\d{8})(\d{6})(\d{1})(\d{3})/, "$1 $2 $3 $4" )
  };

  function nilaiNip ( string ) {
    return string.replace( /\D/g, '' ).substring( 0, 20 )
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

  vars = "?tahun=" + $( '#tahun_anggaran' ).val();
  $.ajax( {
    type: "GET",
    url: 'getDokumenKeuangan' + vars,
    dataType: "json",
    success: function ( data ) {

      var j = data.length;
      var post, i;

      $( 'select[name="id_dokumen_keu"]' ).empty();
      $( 'select[name="id_dokumen_keu"]' ).append( '<option value="0">---Pilih Dokumen Referensi---</option>' );

      for ( i = 0; i < j; i++ ) {
        post = data[ i ];
        $( 'select[name="id_dokumen_keu"]' ).append( '<option value="' + post.id_dokumen_keu + '">' + post.nomor_display + '</option>' );
      }
    }
  } );

  $.ajax( {
    type: "GET",
    url: 'getUnit',
    dataType: "json",
    success: function ( data ) {

      var j = data.length;
      var post, i;

      $( 'select[name="id_unit"]' ).empty();
      $( 'select[name="id_unit"]' ).append( '<option value="0">---Pilih Organisasi Perangkat Daerah---</option>' );

      for ( i = 0; i < j; i++ ) {
        post = data[ i ];
        $( 'select[name="id_unit"]' ).append( '<option value="' + post.id_unit + '">' + post.nm_unit + '</option>' );
      }
    }
  } );

  var TblKPA
  function loadTblKPA ( id_pa ) {
    vars = "?id_pa=" + id_pa;
    TblKPA = $( '#tblKPA' ).DataTable( {
      processing: true,
      serverSide: true,
      autoWidth: false,
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
      "pageLength": 25,
      "lengthMenu": [ [ 25, 50, -1 ], [ 25, 50, "All" ] ],
      "bDestroy": true,
      dom: 'BfRtip',
      "ajax": { "url": "./getDataKpa" + vars },
      "columns": [
        { data: 'no_urut', sClass: "dt-center" },
        {
          data: "nip_pegawai", sClass: "dt-center", render: function ( toFormat ) {
            return toFormat.toString().replace( /(\d{8})(\d{6})(\d{1})(\d{3})/, "$1 $2 $3 $4" );
          }
        },
        { data: 'nama_pegawai' },
        { data: 'uraian_program' },
        { data: 'action', 'searchable': false, 'orderable': false, sClass: "dt-center" }
      ],
      "order": [ [ 0, 'asc' ] ],
    } );
  };

  var dokumen_tbl
  function loadTblDokumen ( id_dokumen_keu, id_unit ) {
    vars = "?id_dokumen_keu=" + id_dokumen_keu + "&id_unit=" + id_unit;
    dokumen_tbl = $( '#tblDokumen' ).DataTable( {
      processing: true,
      serverSide: true,
      autoWidth: false,
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
      "pageLength": 25,
      "lengthMenu": [ [ 25, 50, -1 ], [ 25, 50, "All" ] ],
      "bDestroy": true,
      dom: 'BfRtip',
      "ajax": { "url": "./getDokRka" + vars },
      "columns": [
        { data: 'no_urut', sClass: "dt-center" },
        { data: 'tgl_dokumen', sClass: "dt-center" },
        { data: 'no_dokumen' },
        { data: 'nama_pegawai' },
        {
          data: "nip_pegawai", sClass: "dt-center", render: function ( toFormat ) {
            return toFormat.toString().replace( /(\d{8})(\d{6})(\d{1})(\d{3})/, "$1 $2 $3 $4" );
          }
        },
        { data: 'action', 'searchable': false, 'orderable': false, sClass: "dt-center" }
      ],
      "order": [ [ 0, 'asc' ] ],
    } );
  };

  var tblPegawai;
  function loadTblPegawai () {
    tblPegawai = $( '#tblCariPegawai' ).DataTable( {
      processing: true,
      serverSide: true,
      autoWidth: false,
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
      dom: 'BfRtip',
      "ajax": { "url": "../admin/parameter/getDataPegawai" },
      "columns": [
        { data: 'no_urut', sClass: "dt-center" },
        { data: 'nip_pegawai', 'searchable': true, 'orderable': true, sClass: "dt-center" },
        { data: 'nama_pegawai', 'searchable': true, 'orderable': true, sClass: "dt-left" },
        { data: 'nama_jabatan', 'searchable': true, 'orderable': true, sClass: "dt-left" },
        { data: 'action', 'searchable': false, 'orderable': false, sClass: "dt-center" },
      ],
    } );
  };

  var id_dokumen_temp, tahun_rkpd_temp, id_pa_temp;
  $( '#tblDokumen tbody' ).on( 'dblclick', 'tr', function () {
    var data = dokumen_tbl.row( this ).data();
    id_pa_temp = data.id_pa;

    loadTblKPA( data.id_pa );
    $( '.nav-tabs a[href="#kpa_unit"]' ).tab( 'show' );

  } );

  $( document ).on( 'click', '#btnLihatKPA', function () {
    var data = dokumen_tbl.row( $( this ).parents( 'tr' ) ).data();
    loadTblKPA( data.id_pa );
    $( '.nav-tabs a[href="#kpa_unit"]' ).tab( 'show' );
  } );

  $( "#id_unit" ).change( function () {
    tahun_temp = $( '#tahun_rkpd' ).val();
    unit_temp = $( '#id_unit' ).val();
    dokumen_temp = $( '#id_dokumen_keu' ).val();
    vars = "?id_unit=" + unit_temp + '&id_dokumen_keu=' + dokumen_temp;
    $.ajax( {
      type: "GET",
      url: 'getProgramKpa' + vars,
      dataType: "json",
      success: function ( data ) {

        var j = data.length;
        var post, i;

        $( 'select[name="id_program_kpa"]' ).empty();
        $( 'select[name="id_program_kpa"]' ).append( '<option value="0">---Pilih Program Referensi---</option>' );

        for ( i = 0; i < j; i++ ) {
          post = data[ i ];
          $( 'select[name="id_program_kpa"]' ).append( '<option value="' + post.id_program_pd + '">' + post.uraian_program_renstra + '</option>' );
        }
      }
    } );

    $( '.nav-tabs a[href="#dokumen"]' ).tab( 'show' );
    loadTblDokumen( dokumen_temp, unit_temp );
  } );

  $( document ).on( 'click', '#btnAddDokumen', function () {
    $( '#btnDokumen' ).removeClass( 'editDokumen' );
    $( '#btnDokumen' ).addClass( 'addDokumen' );
    $( '.modal-title' ).text( 'Dokumen RKA dan Pengguna Anggaran' );
    $( '.form-horizontal' ).show();
    $( '#id_pa' ).val( null );
    $( '#tanggal_rkpd' ).val( new Date().toISOString().slice( 0, 10 ) );
    $( '#tanggal_rkpd_x' ).val( formatTgl( new Date().toISOString().slice( 0, 10 ) ) );
    $( '#nomor_rka' ).val( null );
    $( '#nip_tapd_display' ).val( null );
    $( '#nip_pa' ).val( null );
    $( '#id_pegawai_pa' ).val( null );
    $( '#id_unit_pegawai_pa' ).val( null );
    $( '#id_unit_pa' ).val( $( '#id_unit' ).val() );
    $( '#nama_tapd' ).val( null );
    $( '#jabatan_tapd' ).val( null );

    $( '#btnDelDokumen' ).hide();
    $( '#btnDokumen' ).show();
    $( '#TambahDokumen' ).modal( 'show' );
  } );

  $( '.modal-footer' ).on( 'click', '.addDokumen', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: 'addPa',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_dokumen_keu': $( '#id_dokumen_keu' ).val(),
        'id_pegawai': $( '#id_pegawai_pa' ).val(),
        'id_unit_pegawai': $( '#id_unit_pegawai_pa' ).val(),
        'id_unit': $( '#id_unit' ).val(),
        'no_dokumen': $( '#nomor_rka' ).val(),
        'tgl_dokumen': $( '#tanggal_rkpd' ).val(),
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

  $( document ).on( 'click', '#btnEditTim', function () {

    var data = dokumen_tbl.row( $( this ).parents( 'tr' ) ).data();

    $( '#btnDokumen' ).removeClass( 'addDokumen' );
    $( '#btnDokumen' ).addClass( 'editDokumen' );
    $( '.modal-title' ).text( 'Dokumen RKA dan Pengguna Anggaran' );
    $( '.form-horizontal' ).show();

    $( '#id_pa' ).val( data.id_pa );
    $( '#tanggal_rkpd' ).val( data.tgl_dokumen );
    $( '#tanggal_rkpd_x' ).val( formatTgl( data.tgl_dokumen ) );
    $( '#nomor_rka' ).val( data.no_dokumen );
    $( '#nip_pa' ).val( data.nip_pegawai );
    $( '#id_pegawai_pa' ).val( data.id_pegawai );
    $( '#id_unit_pegawai_pa' ).val( data.id_unit_pegawai );
    $( '#id_unit_pa' ).val( data.id_unit );
    $( '#nama_tapd' ).val( data.nama_pegawai );
    $( '#jabatan_tapd' ).val( data.nama_jabatan );

    if ( data.nip_pegawai == null ) {
      $( '#nip_tapd_display' ).val( null );
    } else {
      $( '#nip_tapd_display' ).val( buatNip( data.nip_pegawai ) );
    };

    $( '#btnDelDokumen' ).hide();
    $( '#btnDokumen' ).show();
    $( '#TambahDokumen' ).modal( 'show' );
  } );

  $( '.modal-footer' ).on( 'click', '.editDokumen', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: 'addPa',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_dokumen_keu': $( '#id_dokumen_keu' ).val(),
        'id_pegawai': $( '#id_pegawai_pa' ).val(),
        'id_unit_pegawai': $( '#id_unit_pegawai_pa' ).val(),
        'id_unit': $( '#id_unit' ).val(),
        'no_dokumen': $( '#nomor_rka' ).val(),
        'tgl_dokumen': $( '#tanggal_rkpd' ).val(),
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

  $( document ).on( 'click', '#btnHapusTim', function () {

    var data = dokumen_tbl.row( $( this ).parents( 'tr' ) ).data();

    $( '#btnDelDokumen1' ).removeClass( 'delDokumen' );
    $( '#btnDelDokumen1' ).addClass( 'delDokumen' );
    $( '.form-horizontal' ).show();

    $( '#id_dokumen_hapus' ).val( data.id_pa );
    $( '.ur_dokumen_del' ).html( data.no_dokumen );

    $( '#HapusDokumen' ).modal( 'show' );
  } );

  $( '.modal-footer' ).on( 'click', '.delDokumen', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: 'hapusPa',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_pa': $( '#id_dokumen_hapus' ).val(),
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

  $( document ).on( 'click', '#btnPegawai', function () {
    $( '#cariPegawai' ).modal( 'show' );
    loadTblPegawai();
  } );

  $( document ).on( 'click', '#btnPegawaiKpa', function () {
    $( '#cariPegawai' ).modal( 'show' );
    loadTblPegawai();
  } );

  $( '#tblCariPegawai tbody' ).on( 'dblclick', 'tr', function () {
    var data = tblPegawai.row( this ).data();

    document.getElementById( "nip_pa" ).value = data.nip_pegawai;
    document.getElementById( "nama_tapd" ).value = data.nama_pegawai;
    document.getElementById( "jabatan_tapd" ).value = data.nama_jabatan;
    document.getElementById( "id_pegawai_pa" ).value = data.id_pegawai;
    document.getElementById( "id_unit_pegawai_pa" ).value = data.id_unit_pegawai;
    document.getElementById( "nama_kpa" ).value = data.nip_pegawai;
    document.getElementById( "jabatan_kpa" ).value = data.nama_pegawai;
    document.getElementById( "jabatan_tapd" ).value = data.nama_jabatan;
    document.getElementById( "id_pegawai_kpa" ).value = data.id_pegawai;
    document.getElementById( "id_unit_pegawai_kpa" ).value = data.id_unit_pegawai;
    if ( data.nip_pegawai == null ) {
      $( '#nip_tapd_display' ).val( null );
    } else {
      $( '#nip_tapd_display' ).val( buatNip( data.nip_pegawai ) );
    };
    if ( data.nip_pegawai == null ) {
      $( '#nip_kpa_display' ).val( null );
    } else {
      $( '#nip_kpa_display' ).val( buatNip( data.nip_pegawai ) );
    };

    $( '#cariPegawai' ).modal( 'hide' );
  } );

  $( document ).on( 'click', '#btnPilihPegawai', function () {
    var data = tblPegawai.row( $( this ).parents( 'tr' ) ).data();

    document.getElementById( "nip_pa" ).value = data.nip_pegawai;
    document.getElementById( "nama_tapd" ).value = data.nama_pegawai;
    document.getElementById( "jabatan_tapd" ).value = data.nama_jabatan;
    document.getElementById( "id_pegawai_pa" ).value = data.id_pegawai;
    document.getElementById( "id_unit_pegawai_pa" ).value = data.id_unit_pegawai;
    document.getElementById( "nama_kpa" ).value = data.nip_pegawai;
    document.getElementById( "jabatan_kpa" ).value = data.nama_pegawai;
    document.getElementById( "jabatan_tapd" ).value = data.nama_jabatan;
    document.getElementById( "id_pegawai_kpa" ).value = data.id_pegawai;
    document.getElementById( "id_unit_pegawai_kpa" ).value = data.id_unit_pegawai;
    if ( data.nip_pegawai == null ) {
      $( '#nip_tapd_display' ).val( null );
    } else {
      $( '#nip_tapd_display' ).val( buatNip( data.nip_pegawai ) );
    };
    if ( data.nip_pegawai == null ) {
      $( '#nip_kpa_display' ).val( null );
    } else {
      $( '#nip_kpa_display' ).val( buatNip( data.nip_pegawai ) );
    };

    $( '#cariPegawai' ).modal( 'hide' );
  } );

  $( document ).on( 'click', '#btnTambahKpa', function () {
    $( '#btnSimpanKpa' ).removeClass( 'editKpa' );
    $( '#btnSimpanKpa' ).addClass( 'addKpa' );
    $( '.modal-title' ).text( 'Data Kuasa Pengguna Anggaran' );
    $( '.form-horizontal' ).show();
    $( '#id_pa_kpa' ).val( id_pa_temp );
    $( '#id_kpa' ).val( null );
    $( '#nip_kpa' ).val( null );
    $( '#nip_kpa_display' ).val( null );
    $( '#id_pegawai_kpa' ).val( null );
    $( '#id_unit_pegawai_kpa' ).val( null );
    $( '#btnPegawaiKpa' ).val( null );
    $( '#nama_kpa' ).val( null );
    $( '#jabatan_kpa' ).val( null );
    $( '#id_program_kpa' ).val( null );

    $( '#btnSimpanKpa' ).show();
    $( '#TambahKpa' ).modal( 'show' );
  } );

  $( '.modal-footer' ).on( 'click', '.addKpa', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: 'addKpa',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_pegawai': $( '#id_pegawai_kpa' ).val(),
        'id_unit_pegawai': $( '#id_unit_pegawai_kpa' ).val(),
        'id_pa': $( '#id_pa_kpa' ).val(),
        'id_program': $( '#id_program_kpa' ).val(),
      },
      success: function ( data ) {
        TblKPA.ajax.reload( null, false );
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }
      }
    } );
  } );

  $( document ).on( 'click', '#btnEditKpa', function () {

    var data = TblKPA.row( $( this ).parents( 'tr' ) ).data();

    $( '#btnSimpanKpa' ).removeClass( 'addKpa' );
    $( '#btnSimpanKpa' ).addClass( 'editKpa' );
    $( '.modal-title' ).text( 'Data Kuasa Pengguna Anggaran' );
    $( '.form-horizontal' ).show();

    $( '#id_pa_kpa' ).val( data.id_pa );
    $( '#id_kpa' ).val( data.id_kpa );
    $( '#nip_kpa' ).val( data.nip_pegawai );
    $( '#id_pegawai_kpa' ).val( data.id_pegawai );
    $( '#id_unit_pegawai_kpa' ).val( data.id_unit_pegawai );
    $( '#nama_kpa' ).val( data.nama_pegawai );
    $( '#jabatan_kpa' ).val( data.nama_jabatan );
    $( '#id_program_kpa' ).val( data.id_program );

    if ( data.nip_pegawai == null ) {
      $( '#nip_kpa_display' ).val( null );
    } else {
      $( '#nip_kpa_display' ).val( buatNip( data.nip_pegawai ) );
    };

    $( '#btnSimpanKpa' ).show();
    $( '#TambahKpa' ).modal( 'show' );
  } );

  $( '.modal-footer' ).on( 'click', '.editKpa', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: 'addKpa',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_pegawai': $( '#id_pegawai_kpa' ).val(),
        'id_unit_pegawai': $( '#id_unit_pegawai_kpa' ).val(),
        'id_pa': $( '#id_pa_kpa' ).val(),
        'id_program': $( '#id_program_kpa' ).val(),
      },
      success: function ( data ) {
        TblKPA.ajax.reload( null, false );
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }
      }
    } );
  } );

  $( document ).on( 'click', '#btnHapusKpa', function () {

    var data = TblKPA.row( $( this ).parents( 'tr' ) ).data();

    $( '#btnDelKpa' ).removeClass( 'delKpa' );
    $( '#btnDelKpa' ).addClass( 'delKpa' );
    $( '.form-horizontal' ).show();

    $( '#id_kpa_hapus' ).val( data.id_kpa );
    $( '.nama_pegawai_kpa_del' ).html( data.nama_pegawai );

    $( '#HapusKpa' ).modal( 'show' );
  } );

  $( '.modal-footer' ).on( 'click', '.delKpa', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: 'hapusKpa',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_kpa': $( '#id_kpa_hapus' ).val(),
      },
      success: function ( data ) {
        TblKPA.ajax.reload( null, false );
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }
      }
    } );
  } );


} );//endfile