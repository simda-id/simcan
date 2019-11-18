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

  $( "input[name='nip_tapd_display']" ).on( "keyup", function () {
    $( "input[name='nip_tapd']" ).val( nilaiNip( this.value ) );
    this.value = buatNip( $( "input[name='nip_tapd']" ).val() );
  } );

  vars = "?tahun=" + $( '#tahun_anggaran' ).val();
  $.ajax( {
    type: "GET",
    url: 'Apbd/getDataDokReferensi' + vars,
    dataType: "json",
    success: function ( data ) {

      var j = data.length;
      var post, i;

      $( 'select[name="id_dokumen_ref"]' ).empty();
      $( 'select[name="id_dokumen_ref"]' ).append( '<option value="0">---Pilih Dokumen Referensi---</option>' );

      for ( i = 0; i < j; i++ ) {
        post = data[ i ];
        $( 'select[name="id_dokumen_ref"]' ).append( '<option value="' + post.id_dokumen_keu + '">' + post.nomor_display + '</option>' );
      }
    }
  } );

  $.ajax( {
    type: "GET",
    url: 'Apbd/getSubUnitPPKD',
    dataType: "json",
    success: function ( data ) {

      var j = data.length;
      var post, i;

      $( 'select[name="id_sub_unit_ppkd"]' ).empty();
      $( 'select[name="id_sub_unit_ppkd"]' ).append( '<option value="0">---Pilih Sub Unit PPKD---</option>' );

      for ( i = 0; i < j; i++ ) {
        post = data[ i ];
        $( 'select[name="id_sub_unit_ppkd"]' ).append( '<option value="' + post.id_sub_unit + '">' + post.nama_display + '</option>' );
      }
    }
  } );

  $.ajax( {
    type: "GET",
    url: './admin/parameter/getUnit',
    dataType: "json",
    success: function ( data ) {

      var j = data.length;
      var post, i;

      $( 'select[name="id_unit_ref"]' ).empty();
      $( 'select[name="id_unit_ref"]' ).append( '<option value="0">---Pilih Organisasi Perangkat Daerah---</option>' );

      for ( i = 0; i < j; i++ ) {
        post = data[ i ];
        $( 'select[name="id_unit_ref"]' ).append( '<option value="' + post.id_unit + '">' + post.nama_display + '</option>' );
      }
    }
  } );

  var dokumen_tbl = $( '#tblDokumen' ).DataTable( {
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
    "ajax": { "url": "./Apbd/getDataDokumen" },
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
  } );

  var TblRekapPPAS;
  function loadTblRekapPPAS ( id_dokumen_keu ) {
    vars = "?id_dokumen_keu=" + id_dokumen_keu;
    TblRekapPPAS = $( '#tblRekapPPAS' ).DataTable( {
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
      "ajax": { "url": "./Apbd/getDataRekap" + vars },
      "columns": [
        { data: 'kd_unit', sClass: "dt-center", width: "5px" },
        { data: 'nm_unit' },
        {
          data: 'jml_program', sClass: "dt-right",
          render: $.fn.dataTable.render.number( '.', ',', 2, '' )
        },
        {
          data: 'jml_kegiatan', sClass: "dt-right",
          render: $.fn.dataTable.render.number( '.', ',', 2, '' )
        },
        {
          data: 'jml_pelaksana', sClass: "dt-right",
          render: $.fn.dataTable.render.number( '.', ',', 2, '' )
        },
        {
          data: 'jml_aktivitas', sClass: "dt-right",
          render: $.fn.dataTable.render.number( '.', ',', 2, '' )
        },
        {
          data: 'jml_pendapatan', sClass: "dt-right",
          render: $.fn.dataTable.render.number( '.', ',', 2, '' )
        },
        {
          data: 'jml_belanja', sClass: "dt-right",
          render: $.fn.dataTable.render.number( '.', ',', 2, '' )
        },
        {
          data: 'jml_pembiayaan', sClass: "dt-right",
          render: $.fn.dataTable.render.number( '.', ',', 2, '' )
        }
      ],
      "order": [ [ 0, 'asc' ] ],
    } );
  };

  var TblTAPD;
  function loadTblTAPD ( id_dokumen_keu ) {
    vars = "?id_dokumen_keu=" + id_dokumen_keu;
    TblTAPD = $( '#tblTAPD' ).DataTable( {
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
      "ajax": { "url": "./Apbd/getDataTapd" + vars },
      "columns": [
        { data: 'no_urut', sClass: "dt-center" },
        {
          data: "nip_pegawai", sClass: "dt-center", render: function ( toFormat ) {
            return toFormat.toString().replace( /(\d{8})(\d{6})(\d{1})(\d{3})/, "$1 $2 $3 $4" );
          }
        },
        { data: 'nama_pegawai', 'searchable': true, 'orderable': true, sClass: "dt-left" },
        { data: 'nama_jabatan', 'searchable': true, 'orderable': true, sClass: "dt-left" },
        { data: 'peran_tim', 'searchable': true, 'orderable': true, sClass: "dt-left" },
        { data: 'action', 'searchable': false, 'orderable': false, sClass: "dt-center" }
      ],
      "order": [ [ 0, 'asc' ] ],
    } );
  };

  var TblTAPDUnit;
  function loadTblTAPDUnit ( id_tapd ) {
    vars = "?id_tapd=" + id_tapd;
    TblTAPDUnit = $( '#tblUnitTAPD' ).DataTable( {
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
      "ajax": { "url": "./Apbd/getDataTapdUnit" + vars },
      "columns": [
        { data: 'no_urut', sClass: "dt-center" },
        { data: 'kode_unit', 'searchable': true, 'orderable': true, sClass: "dt-center" },
        { data: 'nm_unit', 'searchable': true, 'orderable': true, sClass: "dt-left" },
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
      "ajax": { "url": "./admin/parameter/getDataPegawai" },
      "columns": [
        { data: 'no_urut', sClass: "dt-center" },
        { data: 'nip_pegawai', 'searchable': true, 'orderable': true, sClass: "dt-center" },
        { data: 'nama_pegawai', 'searchable': true, 'orderable': true, sClass: "dt-left" },
        { data: 'nama_jabatan', 'searchable': true, 'orderable': true, sClass: "dt-left" },
        { data: 'action', 'searchable': false, 'orderable': false, sClass: "dt-center" },
      ],
    } );
  };

  var id_dokumen_temp, tahun_rkpd_temp, id_tapd_temp;
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

  $( document ).on( 'click', '#btnTAPD', function () {
    var data = dokumen_tbl.row( $( this ).parents( 'tr' ) ).data();
    loadTblTAPD( data.id_dokumen_keu );
    id_dokumen_temp = data.id_dokumen_keu;
    $( '.nav-tabs a[href="#tapd"]' ).tab( 'show' );
  } );
  $( document ).on( 'click', '#btnBackTapd', function () {
    loadTblTAPD( id_dokumen_temp );
    $( '.nav-tabs a[href="#tapd"]' ).tab( 'show' );
  } );

  $( '#tblTAPD tbody' ).on( 'dblclick', 'tr', function () {
    var data = TblTAPD.row( this ).data();
    id_tapd_temp = data.id_tapd;

    loadTblTAPDUnit( data.id_tapd );
    $( '.nav-tabs a[href="#tapd_unit"]' ).tab( 'show' );

  } );

  $( document ).on( 'click', '#btnAddDokumen', function () {
    $.ajax( {
      type: "GET",
      url: './Apbd/getDataPerencana',
      dataType: "json",
      success: function ( data ) {
        $( '#btnDokumen' ).removeClass( 'editDokumen' );
        $( '#btnDokumen' ).addClass( 'addDokumen' );
        $( '.modal-title' ).text( 'Tambah Dokumen Penyusunan APBD' );
        $( '.form-horizontal' ).show();

        $( '#id_dokumen_rkpd' ).val( null );
        $( '#tahun_rkpd' ).val( $( '#tahun_anggaran' ).val() );
        $( '#id_dokumen_ref' ).val( 0 ).trigger( 'change' );
        $( '#tanggal_rkpd' ).val( null );
        $( '#tanggal_rkpd_x' ).val( null );
        $( '#nomor_rkpd' ).val( null );
        $( '#uraian_perkada' ).val( null );
        $( '#id_sub_unit_ppkd' ).val( 0 ).trigger( 'change' );
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
      url: 'Apbd/addDokumen',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_dokumen_ref': $( '#id_dokumen_ref' ).val(),
        'nomor_keu': $( '#nomor_rkpd' ).val(),
        'tanggal_keu': $( '#tanggal_rkpd' ).val(),
        'uraian_perkada': $( '#uraian_perkada' ).val(),
        'id_unit_ppkd': $( '#id_unit_perencana' ).val(),
        'id_sub_unit_ppkd': $( '#id_sub_unit_ppkd' ).val(),
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
    $( '.modal-title' ).text( 'Ubah Dokumen Penyusunan APBD' );
    $( '.form-horizontal' ).show();

    $( '#id_dokumen_rkpd' ).val( data.id_dokumen_keu );
    $( '#tahun_rkpd' ).val( data.tahun_anggaran );
    $( '#tanggal_rkpd' ).val( data.tanggal_keu );
    $( '#tanggal_rkpd_x' ).val( formatTgl( data.tanggal_keu ) );
    $( '#nomor_rkpd' ).val( data.nomor_keu );
    $( '#id_dokumen_ref' ).val( data.id_dokumen_ref ).trigger( 'change' );
    $( '#uraian_perkada' ).val( data.uraian_perkada );
    $( '#id_sub_unit_ppkd' ).val( data.id_sub_unit_ppkd ).trigger( 'change' );
    $( '#id_unit_perencana' ).val( data.id_unit_ppkd );
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
      url: 'Apbd/editDokumen',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_dokumen_keu': $( '#id_dokumen_rkpd' ).val(),
        'id_dokumen_ref': $( '#id_dokumen_ref' ).val(),
        'tanggal_keu': $( '#tanggal_rkpd' ).val(),
        'nomor_keu': $( '#nomor_rkpd' ).val(),
        'uraian_perkada': $( '#uraian_perkada' ).val(),
        'id_sub_unit_ppkd': $( '#id_sub_unit_ppkd' ).val(),
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
      url: 'Apbd/hapusDokumen',
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
      url: 'Apbd/postDokumen',
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
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }
        dokumen_tbl.ajax.reload( null, false );
        $( '#ModalProgress' ).modal( 'hide' );
        // createPesan("Data Gagal Diposting (0vdrPD)","danger");
      }
    } );
  } );

  $( document ).on( 'click', '#btnProsesLoad', function () {
    var data = dokumen_tbl.row( $( this ).parents( 'tr' ) ).data();
    $.ajax( {
      type: 'POST',
      url: 'Apbd/importData',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'kd_dokumen_keu': data.kd_dokumen_keu,
        'jns_dokumen_keu': data.jns_dokumen_keu,
        'id_perubahan': data.id_perubahan,
        'id_dokumen_rkpd': data.id_dokumen_keu,
      },
      success: function ( data ) {
        createPesan( data.pesan, "success" );
        dokumen_tbl.ajax.reload( null, false );
        $( '#ModalProgress' ).modal( 'hide' );
      },
      error: function ( data ) {
        createPesan( data.pesan, "danger" );
        dokumen_tbl.ajax.reload( null, false );
        $( '#ModalProgress' ).modal( 'hide' );
      }
    } );
  } );

  $( document ).on( 'click', '#btnKirimAPBD', function () {
    $( '#prosesbar' ).show();
    $.ajax( {
      type: 'get',
      url: './transfer/proseshapusdataumum',

      dataType: 'json',
      success: function ( data ) {
        $.ajax( {
          type: 'get',
          url: './transfer/prosetrfrenstra',

          dataType: 'json',
          success: function ( data ) {
            $.ajax( {
              type: 'get',
              url: './transfer/prosetrfbelanja',

              dataType: 'json',
              success: function ( data ) {
                createPesan( data.pesan, "success" );
                $( '#prosesbar' ).hide();
              },
              error: function ( data ) {
                createPesan( data.pesan, "success" );
                $( '#prosesbar' ).hide();
              }
            } );
          },
          error: function ( data ) {
            createPesan( data.pesan, "success" );
            $( '#prosesbar' ).hide();
          }
        } );
      },
      error: function ( data ) {
        createPesan( data.pesan, "success" );
        $( '#prosesbar' ).hide();
      }
    } );
  } );

  $( document ).on( 'click', '#btnPegawai', function () {
    $( '#cariPegawai' ).modal( 'show' );
    loadTblPegawai();
  } );

  $( '#tblCariPegawai tbody' ).on( 'dblclick', 'tr', function () {
    var data = tblPegawai.row( this ).data();

    document.getElementById( "nip_tapd" ).value = data.nip_pegawai;
    document.getElementById( "nama_tapd" ).value = data.nama_pegawai;
    document.getElementById( "jabatan_tapd" ).value = data.nama_jabatan;
    document.getElementById( "id_pegawai_tapd" ).value = data.id_pegawai;
    document.getElementById( "id_unit_pegawai_tapd" ).value = data.id_unit_pegawai;
    if ( data.nip_pegawai == null ) {
      $( '#nip_tapd_display' ).val( null );
    } else {
      $( '#nip_tapd_display' ).val( buatNip( data.nip_pegawai ) );
    };

    $( '#cariPegawai' ).modal( 'hide' );
  } );

  $( document ).on( 'click', '#btnPilihPegawai', function () {
    var data = tblPegawai.row( $( this ).parents( 'tr' ) ).data();

    document.getElementById( "nip_tapd" ).value = data.nip_pegawai;
    document.getElementById( "nama_tapd" ).value = data.nama_pegawai;
    document.getElementById( "jabatan_tapd" ).value = data.nama_jabatan;
    document.getElementById( "id_pegawai_tapd" ).value = data.id_pegawai;
    document.getElementById( "id_unit_pegawai_tapd" ).value = data.id_unit_pegawai;
    if ( data.nip_pegawai == null ) {
      $( '#nip_tapd_display' ).val( null );
    } else {
      $( '#nip_tapd_display' ).val( buatNip( data.nip_pegawai ) );
    };

    $( '#cariPegawai' ).modal( 'hide' );
  } );

  $( document ).on( 'click', '#btnTambahTim', function () {
    $( '#btnSimpanTapd' ).removeClass( 'editTimTapd' );
    $( '#btnSimpanTapd' ).addClass( 'addTimTapd' );
    $( '.modal-title' ).text( 'Tambah Tim Anggaran Pemerintah Daerah' );
    $( '.form-horizontal' ).show();
    $( '#id_dokumen_keu_tapd' ).val( id_dokumen_temp );
    $( '#id_tapd' ).val( null );
    $( '#nip_tapd_display' ).val( null );
    $( '#nip_tapd' ).val( null );
    $( '#id_pegawai_tapd' ).val( null );
    $( '#id_unit_pegawai_tapd' ).val( null );
    $( '#nama_tapd' ).val( null );
    $( '#jabatan_tapd' ).val( null );
    $( '#peran_tapd' ).val( null );
    $( '#flag_tim_rinci' ).val( 0 );
    if ( $( '#flag_tim_rinci' ).val() == 0 ) {
      $( '#flag_tim_rinci_1' ).removeClass( 'active' ).addClass( 'notActive' );
      $( '#flag_tim_rinci_0' ).addClass( 'active' ).removeClass( 'notActive' );
    } else {
      $( '#flag_tim_rinci_0' ).removeClass( 'active' ).addClass( 'notActive' );
      $( '#flag_tim_rinci_1' ).addClass( 'active' ).removeClass( 'notActive' );
    }
    $( '#btnSimpanTapd' ).show();
    $( '#TambahTapd' ).modal( 'show' );
  } );

  $( '.modal-footer' ).on( 'click', '.addTimTapd', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: 'Apbd/addTapd',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_dokumen_keu': $( '#id_dokumen_keu_tapd' ).val(),
        'id_pegawai': $( '#id_pegawai_tapd' ).val(),
        'id_unit_pegawai': $( '#id_unit_pegawai_tapd' ).val(),
        'peran_tim': $( '#peran_tapd' ).val(),
        'status_tim': $( '#flag_tim_rinci' ).val(),
      },
      success: function ( data ) {
        TblTAPD.ajax.reload( null, false );
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }
      }
    } );
  } );

  $( document ).on( 'click', '#btnEditTim', function () {
    var data = TblTAPD.row( $( this ).parents( 'tr' ) ).data();
    $( '#btnSimpanTapd' ).addClass( 'editTimTapd' );
    $( '#btnSimpanTapd' ).removeClass( 'addTimTapd' );
    $( '.modal-title' ).text( 'Data Tim Anggaran Pemerintah Daerah' );
    $( '.form-horizontal' ).show();
    $( '#id_dokumen_keu_tapd' ).val( data.id_dokumen_keu );
    $( '#id_tapd' ).val( data.id_tapd );
    $( '#nip_tapd_display' ).val( buatNip( data.nip_pegawai ) );
    $( '#nip_tapd' ).val( data.nip_pegawai );
    $( '#id_pegawai_tapd' ).val( data.id_pegawai );
    $( '#id_unit_pegawai_tapd' ).val( data.id_unit_pegawai );
    $( '#nama_tapd' ).val( data.nama_pegawai );
    $( '#jabatan_tapd' ).val( data.nama_jabatan );
    $( '#peran_tapd' ).val( data.peran_tim );
    $( '#flag_tim_rinci' ).val( data.status_tim );
    if ( data.status_tim == 0 ) {
      $( '#flag_tim_rinci_1' ).removeClass( 'active' ).addClass( 'notActive' );
      $( '#flag_tim_rinci_0' ).addClass( 'active' ).removeClass( 'notActive' );
    } else {
      $( '#flag_tim_rinci_0' ).removeClass( 'active' ).addClass( 'notActive' );
      $( '#flag_tim_rinci_1' ).addClass( 'active' ).removeClass( 'notActive' );
    }
    $( '#btnSimpanTapd' ).show();
    $( '#TambahTapd' ).modal( 'show' );
  } );

  $( '.modal-footer' ).on( 'click', '.editTimTapd', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: 'Apbd/editTapd',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_tapd': $( '#id_tapd' ).val(),
        'id_dokumen_keu': $( '#id_dokumen_keu_tapd' ).val(),
        'id_pegawai': $( '#id_pegawai_tapd' ).val(),
        'id_unit_pegawai': $( '#id_unit_pegawai_tapd' ).val(),
        'peran_tim': $( '#peran_tapd' ).val(),
        'status_tim': $( '#flag_tim_rinci' ).val(),
      },
      success: function ( data ) {
        TblTAPD.ajax.reload( null, false );
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }
      }
    } );
  } );

  $( document ).on( 'click', '#btnHapusTim', function () {
    var data = TblTAPD.row( $( this ).parents( 'tr' ) ).data();
    $( '#btnDelTimTapd' ).removeClass( 'delTapd' );
    $( '#btnDelTimTapd' ).addClass( 'delTapd' );
    $( '.form-horizontal' ).show();

    $( '#id_tapd_hapus' ).val( data.id_tapd );
    $( '.nama_pegawai_del' ).html( data.nama_pegawai );

    $( '#HapusTapd' ).modal( 'show' );
  } );

  $( '.modal-footer' ).on( 'click', '.delTapd', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: 'Apbd/hapusTapd',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_tapd': $( '#id_tapd_hapus' ).val(),
      },
      success: function ( data ) {
        TblTAPD.ajax.reload( null, false );
        $( '#HapusTapd' ).modal( 'hide' );
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }
      }
    } );
  } );

  $( document ).on( 'click', '#btnTambahUnit', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: 'Apbd/addTapdUnit',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_tapd': id_tapd_temp,
        'id_unit': $( '#id_unit_ref' ).val(),
      },
      success: function ( data ) {
        TblTAPDUnit.ajax.reload( null, false );
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }
      }
    } );
  } );

  $( document ).on( 'click', '#btnHapusUnitTim', function () {
    var data = TblTAPDUnit.row( $( this ).parents( 'tr' ) ).data();
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: 'Apbd/hapusTapdUnit',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_unit_tapd': data.id_unit_tapd,
      },
      success: function ( data ) {
        TblTAPDUnit.ajax.reload( null, false );
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }
      }
    } );
  } );

} );//endfile