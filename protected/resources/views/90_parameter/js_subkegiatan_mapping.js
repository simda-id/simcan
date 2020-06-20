$( document ).ready( function () {

    var template = Handlebars.compile( $( "#details-bidang" ).html() );
    var templateRef = Handlebars.compile( $( "#details-bidang90" ).html() );

    var urusan_tbl, bidang_tbl, program_tbl, kegiatan_tbl;
    var urusan_ref, bidang_ref, program_ref, kegiatan_ref, subkegiatan_ref;

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

    $( '[data-toggle="popover"]' ).popover();
    $( '#prosesbar' ).hide();
    $( '.number' ).number( true, 0, '', '' );

    $( '.page-alert .close' ).click( function ( e ) {
        e.preventDefault();
        $( this ).closest( '.page-alert' ).slideUp();
    } );

    $( ".disabled" ).click( function ( e ) {
        e.preventDefault();
        return false;
    } );

    function back2bidang () {
        $( '.nav-tabs a[href="#urusan"]' ).tab( 'show' );
    }

    $( document ).on( 'click', '.backBidang', function () {
        back2bidang();
    } );

    $( document ).on( 'dblclick', '.backBidang', function () {
        back2bidang();
    } );

    function back2program () {
        $( '.nav-tabs a[href="#program"]' ).tab( 'show' );
    }

    $( document ).on( 'click', '.backProgram', function () {
        back2program();
    } );

    $( document ).on( 'dblclick', '.backProgram', function () {
        back2program();
    } );

    $( '.display' ).DataTable( {
        dom: 'BfRtip',
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
    } );

    urusan_tbl = $( '#tblUrusan' ).DataTable( {
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
        dom: 'BFRtIP',
        "ajax": { "url": "./mapping_prog/getListUrusan" },
        "columns": [
            {
                "className": 'details-control',
                "orderable": false,
                "searchable": false,
                "data": null,
                "defaultContent": '',
                "width": "5px"
            },
            { data: 'kd_urusan', sClass: "dt-center", width: "10%" },
            { data: 'nm_urusan' },
        ],
        "order": [ [ 0, 'asc' ] ],
    } );

    function initTableBidang ( tableId, data ) {
        bidang_tbl = $( '#' + tableId ).DataTable( {
            processing: true,
            serverSide: true,
            ajax: data.details_url,
            dom: 'BFRtIp',
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
            columns: [
                { data: 'kode_bidang', name: 'kode_bidang', sClass: "dt-center", width: '10%' },
                { data: 'nm_bidang', name: 'nm_bidang' }
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } )

        $( '#' + tableId + '  tbody' ).on( 'click', 'tr', function () {
            var data = bidang_tbl.row( this ).data();
            id_bidang_temp = data.id_bidang;
            $( '#ur_urusan_prog' ).text( data.nm_urusan );
            $( '#ur_bidang_prog' ).text( data.nm_bidang );
            $( '.nav-tabs a[href="#program"]' ).tab( 'show' );
            loadTblProgram( id_bidang_temp );
        } );
    }

    function loadTblProgram ( bidang ) {
        program_tbl = $( '#tblProgram' ).DataTable( {
            processing: true,
            serverSide: true,
            dom: 'BfRtip',
            autoWidth: false,
            "ajax": { "url": "./mapping_prog/getListProgram/" + bidang },
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
            "columns": [
                { data: 'kode_program', sClass: "dt-center", width: "15%" },
                { data: 'uraian_program', sClass: "dt-left" },
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } );
    }

    function LoadListKegiatan ( id_program ) {
        kegiatan_tbl = $( '#tblKegiatan' ).DataTable( {
            processing: true,
            serverSide: true,
            dom: 'BfRtip',
            autoWidth: false,
            "ajax": { "url": "./mapping_prog/getListKegiatan/" + id_program },
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
            "columns": [
                { data: 'action', 'searchable': false, width: "10%", 'orderable': false, sClass: "dt-center" },
                { data: 'kode_kegiatan_13', sClass: "dt-center", width: "15%" },
                { data: 'ur_kegiatan_13', sClass: "dt-left" },
                { data: 'kode_sub_kegiatan_90', sClass: "dt-center", width: "15%" },
                { data: 'uraian_sub_kegiatan_90', sClass: "dt-left" }
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
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

    $( '#tblProgram tbody' ).on( 'dblclick', 'tr', function () {
        var data = program_tbl.row( this ).data();
        id_program_temp = data.id_program;
        kode_program_temp = data.kode_program;
        $( '#ur_urusan_keg' ).text( $( '#ur_urusan_prog' ).text() );
        $( '#ur_bidang_keg' ).text( $( '#ur_bidang_prog' ).text() );
        $( '#ur_program_keg' ).text( data.uraian_program );
        $( '.nav-tabs a[href="#kegiatan"]' ).tab( 'show' );
        LoadListKegiatan( id_program_temp );
    } );

    urusan_ref = $( '#tblUrusanRef' ).DataTable( {
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
        dom: 'BFRtIP',
        "ajax": { "url": "./mapping_prog/getListUrusan90" },
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

    function initTableBidangRef ( tableId, data ) {
        bidang_ref = $( '#' + tableId ).DataTable( {
            processing: true,
            serverSide: true,
            ajax: data.details_url,
            dom: 'BFRtIp',
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
            columns: [
                { data: 'kode_bidang', name: 'kode_bidang', sClass: "dt-center", width: '10%' },
                { data: 'nm_bidang', name: 'nm_bidang' }
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } )

        $( '#' + tableId + '  tbody' ).on( 'click', 'tr', function () {
            var data = bidang_ref.row( this ).data();
            id_bidang_temp_90 = data.id_bidang;
            $( '#ur_urusan_prog' ).text( data.nm_urusan );
            $( '#ur_bidang_prog' ).text( data.nm_bidang );
            $( '.nav-tabs a[href="#programRef"]' ).tab( 'show' );
            loadTblProgramRef( id_bidang_temp_90 );
        } );

    }

    $( '#tblUrusanRef tbody' ).on( 'click', 'td.details-control', function () {
        var tr = $( this ).closest( 'tr' );
        var row = urusan_ref.row( tr );
        var tableId = 'bidang90-' + row.data().kd_urusan;
        if ( row.child.isShown() ) {
            row.child.hide();
            tr.removeClass( 'shown' );
        } else {
            row.child( templateRef( row.data() ) ).show();
            initTableBidangRef( tableId, row.data() );
            tr.addClass( 'shown' );
            tr.next().find( 'td' ).addClass( 'no-padding bg-gray' );
        }
    } );

    function loadTblProgramRef ( bidang ) {
        program_ref = $( '#tblProgramRef' ).DataTable( {
            processing: true,
            serverSide: true,
            dom: 'BfRtip',
            autoWidth: false,
            "ajax": { "url": "./mapping_prog/getListProgram90/" + bidang },
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
            "columns": [
                { data: 'kode_program', sClass: "dt-center", width: "15%" },
                { data: 'uraian_program', sClass: "dt-left" }
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } );
    }

    function LoadListKegiatanRef ( id_program ) {
        kegiatan_ref = $( '#tblKegiatanRef' ).DataTable( {
            processing: true,
            serverSide: true,
            dom: 'BfRtip',
            autoWidth: false,
            "ajax": { "url": "./mapping_prog/getListKegiatan90/" + id_program },
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
            "columns": [
                { data: 'kode_kegiatan', sClass: "dt-center", width: "15%" },
                { data: 'uraian_kegiatan', sClass: "dt-left" }
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } );
    }

    function LoadListSubKegiatanRef ( id_kegiatan ) {
        subkegiatan_ref = $( '#tblSubKegiatanRef' ).DataTable( {
            processing: true,
            serverSide: true,
            dom: 'BfRtip',
            autoWidth: false,
            "ajax": { "url": "./mapping_prog/getListSubKegiatan90/" + id_kegiatan },
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
            "columns": [
                { data: 'action', 'searchable': false, width: "10%", 'orderable': false, sClass: "dt-center" },
                { data: 'kode_sub_kegiatan', sClass: "dt-center", width: "15%" },
                { data: 'uraian_sub_kegiatan', sClass: "dt-left" },
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } );
    }

    $( '#tblProgramRef tbody' ).on( 'dblclick', 'tr', function () {
        var data = program_ref.row( this ).data();
        $( '.nav-tabs a[href="#kegiatanRef"]' ).tab( 'show' );
        LoadListKegiatanRef( data.id_program );
    } );

    $( '#tblKegiatanRef tbody' ).on( 'dblclick', 'tr', function () {
        var data = kegiatan_ref.row( this ).data();
        $( '.nav-tabs a[href="#subkegiatanRef"]' ).tab( 'show' );
        LoadListSubKegiatanRef( data.id_kegiatan );
    } );

    $( document ).on( 'click', '#btnTambahMapping', function () {
        var data = kegiatan_tbl.row( $( this ).parents( 'tr' ) ).data();
        $( '.btnSaveMapping' ).addClass( 'addMapping' );
        $( '.btnSaveMapping' ).removeClass( 'editMapping' );
        $( '#ur_urusan_13' ).text( '(' + data.kd_urusan_13 + ') ' + data.ur_urusan_13 );
        $( '#ur_bidang_13' ).text( '(' + data.kode_bidang_13 + ') ' + data.ur_bidang_13 );
        $( '#ur_program_13' ).text( '(' + data.kode_program_13 + ') ' + data.ur_program_13 );
        $( '#ur_kegiatan_13' ).text( '(' + data.kode_kegiatan_13 + ') ' + data.ur_kegiatan_13 );
        $( '#ur_urusan_90' ).text( '' );
        $( '#ur_bidang_90' ).text( '' );
        $( '#ur_program_90' ).text( '' );
        $( '#ur_kegiatan_90' ).text( '' );
        $( '#ur_subkegiatan_90' ).text( '' );
        $( '#id_mapping_sub' ).val( null );
        $( '#id_kegiatan_13' ).val( data.id_kegiatan );
        $( '#id_sub_kegiatan_90' ).val( null );
        $( '.form-horizontal' ).show();
        $( '#ModalMappingSub' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.addMapping', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );
        $.ajax( {
            type: 'post',
            url: './mapping_prog/addSubKegiatanMapping',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_kegiatan_13': $( '#id_kegiatan_13' ).val(),
                'id_sub_kegiatan_90': $( '#id_sub_kegiatan_90' ).val(),
            },
            success: function ( data ) {
                kegiatan_tbl.ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            },
        } );
    } );

    $( document ).on( 'click', '#btnDetailMapping', function () {
        var data = kegiatan_tbl.row( $( this ).parents( 'tr' ) ).data();
        $( '.btnSaveMapping' ).removeClass( 'addMapping' );
        $( '.btnSaveMapping' ).addClass( 'editMapping' );
        $( '#ur_urusan_13' ).text( '(' + data.kd_urusan_13 + ') ' + data.ur_urusan_13 );
        $( '#ur_bidang_13' ).text( '(' + data.kode_bidang_13 + ') ' + data.ur_bidang_13 );
        $( '#ur_program_13' ).text( '(' + data.kode_program_13 + ') ' + data.ur_program_13 );
        $( '#ur_kegiatan_13' ).text( '(' + data.kode_kegiatan_13 + ') ' + data.ur_kegiatan_13 );
        $( '#ur_urusan_90' ).text( '(' + data.kode_urusan_90 + ') ' + data.ur_urusan_90 );
        $( '#ur_bidang_90' ).text( '(' + data.kode_bidang_90 + ') ' + data.ur_bidang_90 );
        $( '#ur_program_90' ).text( '(' + data.kode_program_90 + ') ' + data.ur_program_90 );
        $( '#ur_kegiatan_90' ).text( '(' + data.kode_kegiatan_90 + ') ' + data.ur_kegiatan_90 );
        $( '#ur_subkegiatan_90' ).text( '(' + data.kode_sub_kegiatan_90 + ') ' + data.uraian_sub_kegiatan_90 );
        $( '#id_mapping_sub' ).val( data.id_mapping_sub );
        $( '#id_kegiatan_13' ).val( data.id_kegiatan );
        $( '#id_sub_kegiatan_90' ).val( data.id_sub_kegiatan_90 );
        $( '.form-horizontal' ).show();
        $( '#ModalMappingSub' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.editMapping', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );
        $.ajax( {
            type: 'post',
            url: './mapping_prog/editSubKegiatanMapping',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_mapping_sub': $( '#id_mapping_sub' ).val(),
                'id_kegiatan_13': $( '#id_kegiatan_13' ).val(),
                'id_sub_kegiatan_90': $( '#id_sub_kegiatan_90' ).val(),
            },
            success: function ( data ) {
                kegiatan_tbl.ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            },
        } );
    } );

    $( document ).on( 'click', '#btnHapusMapping', function () {
        var data = kegiatan_tbl.row( $( this ).parents( 'tr' ) ).data();
        $( '#id_unit_hapus' ).val( data.id_mapping_sub );
        $( '#nm_unit_hapus' ).text( '(' + data.kode_sub_kegiatan_90 + ') ' + data.uraian_sub_kegiatan_90 );
        $( '#HapusMapping' ).modal( 'show' );
    } );

    $( document ).on( 'click', '#btnDeleteMapping', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );
        $.ajax( {
            type: 'post',
            url: './mapping_prog/hapusSubKegiatanMapping',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_mapping_sub': $( '#id_unit_hapus' ).val(),
            },
            success: function ( data ) {
                kegiatan_tbl.ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            }
        } );
    } );

    $( document ).on( 'click', '#btnCariRef90', function () {
        $( '.form-horizontal' ).show();
        $( '.nav-tabs a[href="#urusanRef"]' ).tab( 'show' );
        $( '#cariReferensi90' ).modal( 'show' );
    } );

    $( document ).on( 'click', '#btnPilihSubKeg', function () {
        var data = subkegiatan_ref.row( $( this ).parents( 'tr' ) ).data();
        $( '#ur_urusan_90' ).text( '(' + data.kode_urusan + ') ' + data.nm_urusan );
        $( '#ur_bidang_90' ).text( '(' + data.kode_bidang + ') ' + data.nm_bidang );
        $( '#ur_program_90' ).text( '(' + data.kode_program + ') ' + data.uraian_program );
        $( '#ur_kegiatan_90' ).text( '(' + data.kode_kegiatan + ') ' + data.uraian_kegiatan );
        $( '#ur_subkegiatan_90' ).text( '(' + data.kode_sub_kegiatan + ') ' + data.uraian_sub_kegiatan );
        $( '#id_sub_kegiatan_90' ).val( data.id_sub_kegiatan );
        $( '#cariReferensi90' ).modal( 'hide' );
    } );

    $( '#tblSubKegiatanRef tbody' ).on( 'dblclick', 'tr', function () {
        var data = subkegiatan_ref.row( this ).data();
        $( '#ur_urusan_90' ).text( '(' + data.kode_urusan + ') ' + data.nm_urusan );
        $( '#ur_bidang_90' ).text( '(' + data.kode_bidang + ') ' + data.nm_bidang );
        $( '#ur_program_90' ).text( '(' + data.kode_program + ') ' + data.uraian_program );
        $( '#ur_kegiatan_90' ).text( '(' + data.kode_kegiatan + ') ' + data.uraian_kegiatan );
        $( '#ur_subkegiatan_90' ).text( '(' + data.kode_sub_kegiatan + ') ' + data.uraian_sub_kegiatan );
        $( '#id_sub_kegiatan_90' ).val( data.id_sub_kegiatan );
        $( '#cariReferensi90' ).modal( 'hide' );
    } );

    $( document ).on( 'click', '#btnCetakMapping', function () {
        vars = "?token=" + $( 'input[name=_token]' ).val();
        window.open( './mapping_prog/CetakMapping' + vars, '_blank' );
    } );

    $( document ).on( 'click', '#btnCetakNonMapping', function () {
        vars = "?token=" + $( 'input[name=_token]' ).val();
        window.open( './mapping_prog/CetakNonMapping' + vars, '_blank' );
    } );

} ); //end file