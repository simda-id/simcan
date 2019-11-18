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

  $( '.page-alert .close' ).click( function ( e ) {
    e.preventDefault();
    $( this ).closest( '.page-alert' ).slideUp();
  } );

  $( ".disabled" ).click( function ( e ) {
    e.preventDefault();
    return false;
  } );

  $( '[data-toggle="popover"]' ).popover();

  var number = document.getElementById( 'rupiah_tarif' );

  // Listen for input event on numInput.
  number.onkeydown = function ( e ) {
    if ( !( ( e.keyCode > 95 && e.keyCode < 106 )
      || ( e.keyCode > 47 && e.keyCode < 58 )
      || e.keyCode == 8
      || e.keyCode == 188
      || e.keyCode == 9
      || e.keyCode == 190 ) ) {
      return false;
    }
  };

  $( '.number' ).number( true, 0, '', '.' );
  $( '#thn_hibah' ).number( true, 0, '', '' );
  $( '#rupiah_tarif' ).number( true, 2, ',', '.' );

  var id_gol_ssh, nm_gol_ssh, id_kel_ssh, nm_kel_ssh, id_skel_ssh, nm_skel_ssh;

  $.ajax( {
    type: "GET",
    url: './admin/parameter/getUnitUser',
    dataType: "json",

    success: function ( data ) {

      var j = data.length;
      var post, i;

      $( 'select[name="cb_unit_pj"]' ).empty();
      $( 'select[name="cb_unit_pj"]' ).append( '<option value="-1">---Pilih Unit---</option>' );

      for ( i = 0; i < j; i++ ) {
        post = data[ i ];
        $( 'select[name="cb_unit_pj"]' ).append( '<option value="' + post.id_unit + '">' + post.nm_unit + '</option>' );
      }
    }
  } );

  $.ajax( {
    type: "GET",
    url: './admin/parameter/getRefSatuan',
    dataType: "json",
    success: function ( data ) {

      var j = data.length;
      var post, i;

      $( 'select[name="cb_satuan_item"]' ).empty();
      $( 'select[name="cb_satuan_item"]' ).append( '<option value="-1">---Pilih Satuan Item---</option>' );
      $( 'select[name="cb_satuan_item"]' ).append( '<option value="0">-- N/A --</option>' );

      for ( i = 0; i < j; i++ ) {
        post = data[ i ];
        $( 'select[name="cb_satuan_item"]' ).append( '<option value="' + post.id_satuan + '">' + post.uraian_satuan + '</option>' );
      }

    }
  } );

  var dataInduk = $( '#tblDataInduk' ).DataTable( {
    processing: true,
    serverSide: true,
    responsive: true,
    dom: 'bfrtip',
    autoWidth: false,
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
    "ajax": { "url": "./bansos/getGolongan" },
    "columns": [
      { data: 'nomor_urut', sClass: "dt-center" },
      { data: 'uraian_golongan_ssh' },
      { data: 'uraian_kelompok_ssh', sClass: "dt-center" },
      { data: 'action', 'searchable': false, 'orderable': false, sClass: "dt-center" }
    ],
    "order": [ [ 0, 'asc' ] ],
  } );

  var dataSubKel
  function loadSubKelompok ( id_kelompok ) {
    dataSubKel = $( '#tblKelompok' ).DataTable( {
      deferRender: true,
      processing: true,
      serverSide: true,
      responsive: true,
      dom: 'bfrtip',
      autoWidth: false,
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
      ajax: { "url": "./bansos/getSubKelompok/" + id_kelompok },
      columns: [
        { data: 'nomor_urut', sClass: "dt-center" },
        { data: 'uraian_sub_kelompok_ssh' },
        { data: 'nm_unit' },
        { data: 'action', 'searchable': false, 'orderable': false, sClass: "dt-center" }
      ],
      order: [ [ 0, 'asc' ] ],
    } );
  };

  var dataItem;
  function LoadItemSSH ( id_skel ) {
    dataItem = $( '#tblRincian' ).DataTable( {
      deferRender: true,
      processing: true,
      serverSide: true,
      responsive: true,
      dom: 'bfrtip',
      autoWidth: false,
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
      ajax: { "url": "./bansos/getItemBantuan/" + id_skel },
      columns: [
        { data: 'no_urut', sClass: "dt-center" },
        { data: 'ur_tarif' },
        { data: 'uraian_satuan', sClass: "dt-center" },
        {
          data: 'jml_rupiah', sClass: "dt-right",
          render: $.fn.dataTable.render.number( '.', ',', 0, 'Rp ' )
        },
        { data: 'action', 'searchable': false, 'orderable': false, sClass: "dt-center" }
      ],
      order: [ [ 0, 'asc' ] ],
    } );
  };


  $( '#tblDataInduk tbody' ).on( 'dblclick', 'tr', function () {

    var data = dataInduk.row( this ).data();

    id_gol_ssh = data.id_golongan_ssh;
    id_kel_ssh = data.id_kelompok_ssh;
    nm_gol_ssh = data.uraian_golongan_ssh
    nm_kel_ssh = data.uraian_kelompok_ssh

    document.getElementById( "tahun_kelompok" ).innerHTML = data.uraian_kelompok_ssh;

    $.ajax( {
      type: "GET",
      url: './bansos/getPerkadaRef/' + data.uraian_kelompok_ssh,
      dataType: "json",

      success: function ( data ) {

        var j = data.length;
        var post, i;

        $( 'select[name="cb_ref_ssh"]' ).empty();
        $( 'select[name="cb_ref_ssh"]' ).append( '<option value="-1">---Pilih Perkada SSH Aktif---</option>' );

        for ( i = 0; i < j; i++ ) {
          post = data[ i ];
          $( 'select[name="cb_ref_ssh"]' ).append( '<option value="' + post.id_perkada + '">' + post.uraian_perkada + '</option>' );
        }
      }
    } );

    $( '.nav-tabs a[href="#kelompok"]' ).tab( 'show' );
    loadSubKelompok( data.id_kelompok_ssh );
  } );

  $( '#tblKelompok tbody' ).on( 'dblclick', 'tr', function () {

    var data = dataSubKel.row( this ).data();

    id_skel_ssh = data.id_sub_kelompok_ssh;
    nm_skel_ssh = data.uraian_sub_kelompok_ssh;

    document.getElementById( "tahun_rincian" ).innerHTML = nm_kel_ssh;
    document.getElementById( "kelompok_rincian" ).innerHTML = data.uraian_sub_kelompok_ssh;

    $( '.nav-tabs a[href="#rincian"]' ).tab( 'show' );
    LoadItemSSH( data.id_sub_kelompok_ssh );
  } );

  $( document ).on( 'dblclick', '.reKelompok', function () {
    $( '.nav-tabs a[href="#kelompok"]' ).tab( 'show' );
  } );



  //tambah induk
  $( document ).on( 'click', '.addInduk', function () {
    $( '.btnSimpanInduk' ).addClass( 'add-Induk' );
    $( '.btnSimpanInduk' ).removeClass( 'edit-Induk' );
    $( '.modal-title' ).text( 'Tambah Data Induk Hibah dan Bantuan Sosial' );
    $( '#thn_hibah' ).val( null );
    $( '.form-horizontal' ).show();
    $( '#TambahInduk' ).modal( 'show' );
  } );


  $( '.modal-footer' ).on( 'click', '.add-Induk', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: './bansos/addGolonganKel',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'tahun': $( '#thn_hibah' ).val(),
      },
      success: function ( data ) {
        dataInduk.ajax.reload( null, false );
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }
      }
    } );
  } );

  //Hapus Kelompok
  $( document ).on( 'click', '.deleteGolongan', function () {
    var data = dataInduk.row( $( this ).parents( 'tr' ) ).data();
    $( '.btnHapus' ).removeClass( 'delItem' );
    $( '.btnHapus' ).removeClass( 'delSubKelompok' );
    $( '.btnHapus' ).addClass( 'delKelompok' );
    $( '.modal-title' ).text( 'Hapus Data Tahun Hibah dan Bantuan Sosial' );
    $( '.id_ssh_hapus' ).text( data.id_kelompok_ssh );
    $( '.uraianx' ).html( 'Yakin akan menghapus Hibah dan Bantuan Sosial Tahun : ' );
    $( '.uraian' ).html( data.uraian_kelompok_ssh );
    $( '#ModalHapus' ).modal( 'show' );
  } );

  $( '.modal-footer' ).on( 'click', '.delKelompok', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: './bansos/deleteKelompok',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_kelompok_ssh': $( '.id_ssh_hapus' ).text()
      },
      success: function ( data ) {
        dataInduk.ajax.reload( null, false );
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }
      }
    } );
  } );

  //tambah kelompok
  $( document ).on( 'click', '.addKelompok', function () {
    $( '.btnSimpanKelompok' ).addClass( 'add-Kelompok' );
    $( '.btnSimpanKelompok' ).removeClass( 'edit-Kelompok' );
    $( '.modal-title' ).text( 'Data Kelompok Hibah dan Bantuan Sosial' );
    $( '#id_gol_ssh_skel' ).val( id_gol_ssh );
    $( '#id_kel_ssh_skel' ).val( id_kel_ssh );
    $( '#id_skel_ssh_skel' ).val( null );
    $( '#uraian_sub_kelompok' ).val( null );
    $( '#cb_unit_pj' ).val( -1 ).trigger( 'change' );
    $( '#cb_jns_hibah' ).val( 0 ).trigger( 'change' );
    $( '.form-horizontal' ).show();
    $( '#TambahKelompok' ).modal( 'show' );
  } );

  $( '.modal-footer' ).on( 'click', '.add-Kelompok', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: './bansos/addSubKelompok',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_kelompok_ssh': $( '#id_kel_ssh_skel' ).val(),
        'jns_hibah': $( '#cb_jns_hibah' ).val(),
        'uraian_sub_kelompok_ssh': $( '#uraian_sub_kelompok' ).val(),
        'id_unit_pj': $( '#cb_unit_pj' ).val(),
      },
      success: function ( data ) {
        dataSubKel.ajax.reload( null, false );
        dataSubKel.page( 'last' ).draw( 'page' );
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }
      },
    } );
  } );

  //Edit Zona Perkada
  $( document ).on( 'click', '.editSKelompok', function () {
    var data = dataSubKel.row( $( this ).parents( 'tr' ) ).data();
    $( '.btnSimpanKelompok' ).removeClass( 'add-Kelompok' );
    $( '.btnSimpanKelompok' ).addClass( 'edit-Kelompok' );
    $( '.modal-title' ).text( 'Data Kelompok Hibah dan Bantuan Sosial' );
    $( '#id_gol_ssh_skel' ).val( id_gol_ssh );
    $( '#id_kel_ssh_skel' ).val( data.id_kelompok_ssh );
    $( '#id_skel_ssh_skel' ).val( data.id_sub_kelompok_ssh );
    $( '#uraian_sub_kelompok' ).val( data.uraian_sub_kelompok_ssh );
    $( '#cb_jns_hibah' ).val( data.jns_hibah ).trigger( 'change' );
    $( '#cb_unit_pj' ).val( data.id_unit_pj ).trigger( 'change' );
    $( '.form-horizontal' ).show();
    $( '#TambahKelompok' ).modal( 'show' );
  } );

  $( '.modal-footer' ).on( 'click', '.edit-Kelompok', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: './bansos/editSubKelompok',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_kelompok_ssh': $( '#id_kel_ssh_skel' ).val(),
        'id_sub_kelompok_ssh': $( '#id_skel_ssh_skel' ).val(),
        'jns_hibah': $( '#cb_jns_hibah' ).val(),
        'uraian_sub_kelompok_ssh': $( '#uraian_sub_kelompok' ).val(),
        'id_unit_pj': $( '#cb_unit_pj' ).val(),
      },
      success: function ( data ) {
        dataSubKel.ajax.reload( null, false );
        dataSubKel.page( 'last' ).draw( 'page' );
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }
      },
    } );
  } );

  //Hapus Sub Kelompok
  $( document ).on( 'click', '.deleteSKelompok', function () {
    var data = dataSubKel.row( $( this ).parents( 'tr' ) ).data();
    $( '.btnHapus' ).removeClass( 'delItem' );
    $( '.btnHapus' ).removeClass( 'delKelompok' );
    $( '.btnHapus' ).addClass( 'delSubKelompok' );
    $( '.modal-title' ).text( 'Hapus Data Kelompok Hibah dan Bantuan Sosial' );
    $( '.id_ssh_hapus' ).text( data.id_sub_kelompok_ssh );
    $( '.uraianx' ).html( 'Yakin akan menghapus Kelompok Hibah dan Bantuan Sosial : ' );
    $( '.uraian' ).html( data.uraian_sub_kelompok_ssh );
    $( '#ModalHapus' ).modal( 'show' );
  } );

  $( '.modal-footer' ).on( 'click', '.delSubKelompok', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: './bansos/deleteSubKelompok',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_sub_kelompok_ssh': $( '.id_ssh_hapus' ).text()
      },
      success: function ( data ) {
        dataSubKel.ajax.reload( null, false );
        dataSubKel.page( 'last' ).draw( 'page' );
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }
      }
    } );
  } );

  //tambah detail item bantuan
  $( document ).on( 'click', '.addRincian', function () {
    $( '.btnSimpanItem' ).addClass( 'add-Rincian' );
    $( '.btnSimpanItem' ).removeClass( 'edit-Rincian' );
    $( '.modal-title' ).text( 'Data Rincian Hibah dan Bantuan Sosial' );
    $( '#id_gol_ssh_item' ).val( id_gol_ssh );
    $( '#id_kel_ssh_item' ).val( id_kel_ssh );
    $( '#id_skel_ssh_item' ).val( id_skel_ssh );
    $( '#id_tarif_ssh' ).val( null );
    $( '#cb_ref_ssh' ).val( -1 ).trigger( 'change' );
    $( '#no_urut_item' ).val( 1 );
    $( '#uraian_perda_dok' ).val( null );
    $( '#cb_satuan_item' ).val( -1 ).trigger( 'change' );
    $( '#rupiah_tarif' ).val( 0 );
    $( '.form-horizontal' ).show();
    $( '#ModalItem' ).modal( 'show' );
  } );

  $( '.modal-footer' ).on( 'click', '.add-Rincian', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: './bansos/addTarifPerkada',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_perkada': $( '#cb_ref_ssh' ).val(),
        'id_sub_kelompok_ssh': $( '#id_skel_ssh_item' ).val(),
        'uraian_tarif_ssh': $( '#uraian_perda_dok' ).val(),
        'id_satuan': $( '#cb_satuan_item' ).val(),
        'jml_rupiah': $( '#rupiah_tarif' ).val(),
      },
      success: function ( data ) {
        dataItem.ajax.reload( null, false );
        dataItem.page( 'last' ).draw( 'page' );
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }
      },
    } );
  } );

  //ubah detail item bantuan
  $( document ).on( 'click', '.editItem', function () {
    var data = dataItem.row( $( this ).parents( 'tr' ) ).data();
    $( '.btnSimpanItem' ).removeClass( 'add-Rincian' );
    $( '.btnSimpanItem' ).addClass( 'edit-Rincian' );
    $( '.modal-title' ).text( 'Data Rincian Hibah dan Bantuan Sosial' );
    $( '#id_gol_ssh_item' ).val( data.id_tarif_perkada );
    $( '#id_tarif_ssh' ).val( data.id_tarif_ssh );
    $( '#id_skel_ssh_item' ).val( id_skel_ssh );
    $( '#cb_ref_ssh' ).val( data.id_perkada ).trigger( 'change' );
    $( '#no_urut_item' ).val( data.no_tarif );
    $( '#uraian_perda_dok' ).val( data.ur_tarif );
    $( '#cb_satuan_item' ).val( data.id_satuan ).trigger( 'change' );
    $( '#rupiah_tarif' ).val( data.jml_rupiah );
    $( '.form-horizontal' ).show();
    $( '#ModalItem' ).modal( 'show' );
  } );

  $( '.modal-footer' ).on( 'click', '.edit-Rincian', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: './bansos/editTarifPerkada',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_tarif_ssh': $( '#id_tarif_ssh' ).val(),
        'id_tarif_perkada': $( '#id_gol_ssh_item' ).val(),
        'uraian_tarif_ssh': $( '#uraian_perda_dok' ).val(),
        'id_satuan': $( '#cb_satuan_item' ).val(),
        'jml_rupiah': $( '#rupiah_tarif' ).val(),

      },
      success: function ( data ) {
        dataItem.ajax.reload( null, false );
        dataItem.page( 'last' ).draw( 'page' );
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }
      },
    } );
  } );

  //Hapus Tarif  Perkada
  //Hapus Sub Kelompok
  $( document ).on( 'click', '.deleteItem', function () {
    var data = dataItem.row( $( this ).parents( 'tr' ) ).data();
    $( '.btnHapus' ).addClass( 'delItem' );
    $( '.btnHapus' ).removeClass( 'delKelompok' );
    $( '.btnHapus' ).removeClass( 'delSubKelompok' );
    $( '.modal-title' ).text( 'Hapus Data Rincian Hibah dan Bantuan Sosial' );
    $( '.id_ssh_hapus' ).text( data.id_tarif_ssh );
    $( '.uraianx' ).html( 'Yakin akan menghapus Rincian Hibah dan Bantuan Sosial : ' );
    $( '.uraian' ).html( data.ur_tarif );
    $( '#ModalHapus' ).modal( 'show' );
  } );

  $( '.modal-footer' ).on( 'click', '.delItem', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: './bansos/deleteTarifPerkada',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_tarif_ssh': $( '.id_ssh_hapus' ).text()
      },
      success: function ( data ) {
        dataItem.ajax.reload( null, false );
        dataItem.page( 'last' ).draw( 'page' );
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "danger" );
        }
      }
    } );
  } );

  $( document ).on( 'click', '.btnUpdateItemSSH', function () {
    var data = dataItem.row( $( this ).parents( 'tr' ) ).data();
    $.ajax( {
      type: "GET",
      url: './sshperkada/getDokumenTransaksi',
      dataType: "json",
      success: function ( data ) {
        var j = data.length;
        var post, i;
        $( 'select[name="no_dokumen_update"]' ).empty();
        $( 'select[name="no_dokumen_update"]' ).append( '<option value="-1">---Pilih Nomor Dokumen Transaksi---</option>' );
        for ( i = 0; i < j; i++ ) {
          post = data[ i ];
          $( 'select[name="no_dokumen_update"]' ).append( '<option value="' + post.id_dokumen_keu + '">' + post.uraian_display + '</option>' );
        }
      }
    } );

    $( '.form-horizontal' ).show();
    // $( '#nomor_perkada_update' ).val( data.nomor_perkada );
    $( '#id_perkada_update' ).val( data.id_perkada );
    $( '#ModalUpdateItem' ).modal( 'show' );
  } );

  $( '.modal-footer' ).on( 'click', '.btnUpdateItem', function () {
    $.ajaxSetup( {
      headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
    } );

    $.ajax( {
      type: 'post',
      url: './bansos/UpdateItemSSH',
      data: {
        '_token': $( 'input[name=_token]' ).val(),
        'id_dokumen_ssh': $( '#id_perkada_update' ).val(),
        'id_dokumen_keu': $( '#no_dokumen_trans' ).val(),
      },
      success: function ( data ) {
        $( '#ModalUpdateItem' ).modal( 'hide' );
        if ( data.status_pesan == 1 ) {
          createPesan( data.pesan, "success" );
        } else {
          createPesan( data.pesan, "alert" );
        }
      }
    } );
  } );


} ); //end file
