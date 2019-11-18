$( document ).ready( function () {

    var template = Handlebars.compile( $( "#details-bidang" ).html() );

    $( '[data-toggle="popover"]' ).popover();

    function createPesan ( message, type ) {
        var html = '<div class="alert alert-' + type + ' alert-dismissable page-alert col-md-12">';
        html += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
        html += message;
        html += '</div>';
        $( html ).hide().prependTo( '#pesan' ).slideDown();
    };

    $( '.page-alert .close' ).click( function ( e ) {
        e.preventDefault();
        $( this ).closest( '.page-alert' ).slideUp();
    } );

    $( '#prosesbar' ).hide();

    $( '.number' ).number( true, 0, '', '' );

    $( '.display' ).DataTable( {
        dom: 'BfRtip',
        autoWidth: false,
        bDestroy: true
    } );

    var id_bidang_temp, id_program_temp;
    var urusan_tbl, bidang_tbl, program_tbl, kegiatan_tbl;

    urusan_tbl = $( '#tblUrusan' ).DataTable( {
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
        "ajax": { "url": "./program/getListUrusan" },
        "columns": [
            {
                "className": 'details-control',
                "orderable": false,
                "searchable": false,
                "data": null,
                "defaultContent": '',
                "width": "5px"
            },
            { data: 'no_urut', sClass: "dt-center", width: "10%" },
            { data: 'nm_urusan' },
        ],
        "order": [ [ 0, 'asc' ] ],
    } );

    function initTableBidang ( tableId, data ) {
        bidang_tbl = $( '#' + tableId ).DataTable( {
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
            ajax: data.details_url,
            paging: false,
            columns: [
                { data: 'kd_bidang', name: 'kd_bidang', sClass: "dt-center", width: '10%' },
                { data: 'nm_bidang', name: 'nm_bidang' }
            ],
            "order": [ [ 0, 'asc' ] ],
        } )

        $( '#' + tableId + '  tbody' ).on( 'click', 'tr', function () {

            var data = bidang_tbl.row( this ).data();

            id_bidang_temp = data.id_bidang;

            $( '#ur_urusan' ).text( data.nm_urusan );
            $( '#ur_bidang' ).text( data.nm_bidang );

            $( '.nav-tabs a[href="#program"]' ).tab( 'show' );
            LoadListProgram( id_bidang_temp );

        } );

    }

    $( '#tblUrusan tbody' ).on( 'click', 'td.details-control', function () {

        var tr = $( this ).closest( 'tr' );
        var row = urusan_tbl.row( tr );
        var tableId = 'bidang-' + row.data().kd_urusan;

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

    function LoadListProgram ( id_bidang ) {
        program_tbl = $( '#tblProgram' ).DataTable( {
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
            "ajax": { "url": "./program/getListProgram/" + id_bidang },
            "columns": [
                { data: 'no_urut', 'searchable': false, 'orderable': false, sClass: "dt-center", width: "10%" },
                { data: 'kd_program', sClass: "dt-center", width: "10%" },
                { data: 'uraian_program', sClass: "dt-left" },
                { data: 'action', 'searchable': false, width: "10%", 'orderable': false, sClass: "dt-center" }
            ],
            "order": [ [ 0, 'asc' ] ],
        } );
    }

    function LoadListKegiatan ( id_program ) {
        kegiatan_tbl = $( '#tblKegiatan' ).DataTable( {
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
            "ajax": { "url": "./program/getListKegiatan/" + id_program },
            "columns": [
                { data: 'no_urut', 'searchable': false, 'orderable': false, sClass: "dt-center", width: "10%" },
                { data: 'kd_kegiatan', sClass: "dt-center", width: "10%" },
                { data: 'nm_kegiatan', sClass: "dt-left" },
                { data: 'action', 'searchable': false, width: "10%", 'orderable': false, sClass: "dt-center" }
            ],
            "order": [ [ 0, 'asc' ] ],
        } );
    }

    $( '#tblProgram tbody' ).on( 'dblclick', 'tr', function () {

        var data = program_tbl.row( this ).data();

        $( '#ur_urusan_keg' ).text( data.nm_urusan );
        $( '#ur_bidang_keg' ).text( data.nm_bidang );
        $( '#ur_program_keg' ).text( data.uraian_program );
        id_program_temp = data.id_program;

        $( '.nav-tabs a[href="#kegiatan"]' ).tab( 'show' );
        LoadListKegiatan( id_program_temp );

    } );

    $( document ).on( 'click', '#btnAddProgram', function () {
        $( '.btnProgram' ).removeClass( 'editProgram' );
        $( '.btnProgram' ).addClass( 'addProgram' );
        $( '.modal-title' ).text( 'Tambah Data Program' );
        $( '.form-horizontal' ).show();
        $( '#id_bidang' ).val( id_bidang_temp );
        $( '#id_program' ).val( null );
        $( '#kd_program' ).val( 0 );
        $( '#nm_program' ).val( null );

        $( '#ModalProgram' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.addProgram', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './program/addProgram',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_bidang': $( '#id_bidang' ).val(),
                'kd_program': $( '#kd_program' ).val(),
                'nm_program': $( '#nm_program' ).val(),
            },
            success: function ( data ) {
                $( '#tblProgram' ).DataTable().ajax.reload();
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            },
        } );
    } );



    //edit function
    $( document ).on( 'click', '#btnEditProgram', function () {

        var data = program_tbl.row( $( this ).parents( 'tr' ) ).data();

        $( '.btnProgram' ).removeClass( 'addProgram' );
        $( '.btnProgram' ).addClass( 'editProgram' );
        $( '.modal-title' ).text( 'Edit Data Program' );
        $( '.form-horizontal' ).show();
        $( '#id_bidang' ).val( data.id_bidang );
        $( '#id_program' ).val( data.id_program );
        $( '#kd_program' ).val( data.kd_program );
        $( '#nm_program' ).val( data.uraian_program );

        $( '#ModalProgram' ).modal( 'show' );
    } );


    $( '.modal-footer' ).on( 'click', '.editProgram', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './program/editProgram',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_bidang': $( '#id_bidang' ).val(),
                'id_program': $( '#id_program' ).val(),
                'kd_program': $( '#kd_program' ).val(),
                'nm_program': $( '#nm_program' ).val(),
            },
            success: function ( data ) {
                $( '#tblProgram' ).DataTable().ajax.reload();
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            }
        } );
    } );

    //delete function
    $( document ).on( 'click', '#btnHapusProgram', function () {

        var data = program_tbl.row( $( this ).parents( 'tr' ) ).data();

        $( '.btnDelProgram' ).addClass( 'delProgram' );
        $( '.modal-title' ).text( 'Hapus Data Referensi Program' );
        $( '.form-horizontal' ).hide();
        $( '#id_program_hapus' ).val( data.id_program );
        $( '#nm_program_hapus' ).html( data.uraian_program );
        $( '#HapusProgram' ).modal( 'show' );

    } );



    $( '.modal-footer' ).on( 'click', '.delProgram', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './program/hapusProgram',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_program': $( '#id_program_hapus' ).val(),
            },
            success: function ( data ) {
                $( '.item' + $( '.id_program_hapus' ).text() ).remove();
                $( '#tblProgram' ).DataTable().ajax.reload();
                createPesan( data.pesan, "success" );
            }
        } );
    } );

    $( document ).on( 'click', '#btnTambahKegiatan', function () {
        $( '.btnKegiatan' ).removeClass( 'editKegiatan' );
        $( '.btnKegiatan' ).addClass( 'addKegiatan' );
        $( '.modal-title' ).text( 'Tambah Data Kegiatan' );
        $( '.form-horizontal' ).show();
        $( '#id_program_keg' ).val( id_program_temp );
        $( '#id_kegiatan' ).val( null );
        $( '#kd_kegiatan' ).val( 0 );
        $( '#nm_kegiatan' ).val( null );

        $( '#ModalKegiatan' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.addKegiatan', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './program/addKegiatan',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_program': $( '#id_program_keg' ).val(),
                'kd_kegiatan': $( '#kd_kegiatan' ).val(),
                'nm_kegiatan': $( '#nm_kegiatan' ).val(),
            },
            success: function ( data ) {
                $( '#tblKegiatan' ).DataTable().ajax.reload();
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            },
        } );
    } );

    //edit function
    $( document ).on( 'click', '#btnEditKegiatan', function () {

        var data = kegiatan_tbl.row( $( this ).parents( 'tr' ) ).data();

        $( '.btnKegiatan' ).removeClass( 'addKegiatan' );
        $( '.btnKegiatan' ).addClass( 'editKegiatan' );
        $( '.modal-title' ).text( 'Edit Data Kegiatan' );
        $( '.form-horizontal' ).show();
        $( '#id_program_keg' ).val( data.id_program );
        $( '#id_kegiatan' ).val( data.id_kegiatan );
        $( '#kd_kegiatan' ).val( data.kd_kegiatan );
        $( '#nm_kegiatan' ).val( data.nm_kegiatan );

        $( '#ModalKegiatan' ).modal( 'show' );
    } );


    $( '.modal-footer' ).on( 'click', '.editKegiatan', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './program/editKegiatan',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_kegiatan': $( '#id_kegiatan' ).val(),
                'id_program': $( '#id_program_keg' ).val(),
                'kd_kegiatan': $( '#kd_kegiatan' ).val(),
                'nm_kegiatan': $( '#nm_kegiatan' ).val(),

            },
            success: function ( data ) {
                $( '#tblKegiatan' ).DataTable().ajax.reload();
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            }
        } );
    } );

    //delete function
    $( document ).on( 'click', '#btnHapusKegiatan', function () {

        var data = kegiatan_tbl.row( $( this ).parents( 'tr' ) ).data();

        $( '.btnDelKegiatan' ).addClass( 'delKegiatan' );
        $( '.modal-title' ).text( 'Hapus Data Referensi Kegiatan' );
        $( '.form-horizontal' ).hide();
        $( '#id_kegiatan_hapus' ).val( data.id_kegiatan );
        $( '#nm_kegiatan_hapus' ).html( data.nm_kegiatan );
        $( '#HapusKegiatan' ).modal( 'show' );

    } );



    $( '.modal-footer' ).on( 'click', '.delKegiatan', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './program/hapusKegiatan',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_kegiatan': $( '#id_kegiatan_hapus' ).val(),
            },
            success: function ( data ) {
                $( '.item' + $( '.id_kegiatan_hapus' ).text() ).remove();
                $( '#tblKegiatan' ).DataTable().ajax.reload();
                createPesan( data.pesan, "success" );
            }
        } );
    } );

    $( document ).on( 'click', '.btnLoad', function () {
        $( '#prosesbar' ).show();
        $.ajax( {
            type: 'get',
            url: '../../transfer/prosestrfApiprogram',

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
    } );

} );