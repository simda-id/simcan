$( document ).ready( function () {

    var template = Handlebars.compile( $( "#details-bidang" ).html() );
    var id_bidang_temp, id_unit_temp, id_sub_unit_temp;
    var kd_bidang_temp, kd_urusan_temp, kd_unit_temp, kd_sub_temp;
    var urusan_tbl, bidang_tbl, unit_tbl, subunit_tbl;

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

    $( ".disabled" ).click( function ( e ) {
        e.preventDefault();
        return false;
    } );

    $( '#prosesbar' ).hide();
    $( '.number' ).number( true, 0, '', '' );
    $( '.display' ).DataTable( {
        dom: 'BfRtip',
        autoWidth: false,
        bDestroy: true
    } );

    urusan_tbl = $( '#tblUrusan' ).DataTable( {
        processing: true,
        serverSide: true,
        responsive: true,
        dom: 'bFrtip',
        autoWidth: false,
        order: [ [ 1, 'asc' ] ],
        bDestroy: true,
        pageLength: 50,
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
        "ajax": { "url": "../admin/parameter/unit/getListUrusan" },
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
            { data: 'nm_urusan' },
        ],
    } );

    function initTableBidang ( tableId, data ) {
        bidang_tbl = $( '#' + tableId ).DataTable( {
            processing: true,
            serverSide: true,
            responsive: true,
            dom: 'bFrtip',
            autoWidth: false,
            order: [ [ 0, 'asc' ] ],
            bDestroy: true,
            pageLength: 50,
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
                { data: 'kd_bidang', name: 'kd_bidang', sClass: "dt-center" },
                { data: 'nm_bidang', name: 'nm_bidang' }
            ],
        } )

        $( '#' + tableId + '  tbody' ).on( 'click', 'tr', function () {
            var data = bidang_tbl.row( this ).data();
            id_bidang_temp = data.id_bidang;
            kd_bidang_temp = data.kd_bidang;
            kd_urusan_temp = data.kd_urusan;
            $( '.nav-tabs a[href="#unit"]' ).tab( 'show' );
            loadTblUnit( id_bidang_temp, kd_bidang_temp, kd_urusan_temp );

        } );

    };

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

    function loadTblUnit ( id_bidang, kd_bidang, kd_urusan ) {
        unit_tbl = $( '#tblUnit' ).DataTable( {
            processing: true,
            serverSide: true,
            responsive: true,
            dom: 'bFrtip',
            autoWidth: false,
            order: [ [ 0, 'asc' ], [ 1, 'asc' ], [ 2, 'asc' ], ],
            bDestroy: true,
            pageLength: 50,
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
            "ajax": { "url": "./getProgramApi?id_bidang=" + id_bidang + "&kd_bidang=" + kd_bidang + "&kd_urusan=" + kd_urusan },
            "columns": [
                { data: 'Kd_Urusan', sClass: "dt-center" },
                { data: 'Kd_Bidang', sClass: "dt-center" },
                { data: 'Kd_Prog', sClass: "dt-center" },
                { data: 'Ket_Program_Can', sClass: "dt-left" },
                { data: 'Ket_Program', sClass: "dt-left" },
                { data: 'action', 'searchable': false, width: "10%", 'orderable': false, sClass: "dt-center" }
            ],
        } );
    };

    function LoadListSubUnit ( id_unit, kd_bidang, kd_urusan, kd_program ) {
        subunit_tbl = $( '#tblSubUnit' ).DataTable( {
            processing: true,
            serverSide: true,
            responsive: true,
            dom: 'bFrtip',
            autoWidth: false,
            order: [ [ 0, 'asc' ], [ 1, 'asc' ], [ 2, 'asc' ], [ 3, 'asc' ], ],
            bDestroy: true,
            pageLength: 50,
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
            "ajax": { "url": "./getKegiatanApi?id_program=" + id_unit + "&kd_bidang=" + kd_bidang + "&kd_urusan=" + kd_urusan + "&kd_program=" + kd_program },
            "columns": [
                { data: 'Kd_Urusan', sClass: "dt-center" },
                { data: 'Kd_Bidang', sClass: "dt-center" },
                { data: 'Kd_Prog', sClass: "dt-center" },
                { data: 'Kd_Keg', sClass: "dt-center" },
                { data: 'Ket_Kegiatan_Can', sClass: "dt-left" },
                { data: 'Ket_Kegiatan', sClass: "dt-left" },
                { data: 'action', 'searchable': false, width: "10%", 'orderable': false, sClass: "dt-center" }
            ],
        } );
    };

    $( '#tblUnit tbody' ).on( 'dblclick', 'tr', function () {
        var data = unit_tbl.row( this ).data();
        id_unit_temp = data.id_program;
        kd_unit_temp = data.Kd_Prog;
        $( '.nav-tabs a[href="#subunit"]' ).tab( 'show' );
        LoadListSubUnit( id_unit_temp, kd_bidang_temp, kd_urusan_temp, kd_unit_temp );
    } );

    $( document ).on( 'click', '.btnAddBulkProgram', function () {
        $( '#prosesbar' ).show();
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './bulkProgram',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_bidang': id_bidang_temp,
            },

            success: function ( data ) {
                unit_tbl.ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    $( '#prosesbar' ).hide();
                    createPesan( data.pesan, "success" );
                } else {
                    $( '#prosesbar' ).hide();
                    createPesan( data.pesan, "danger" );
                }
            }
        } );

    } ); $( document ).on( 'click', '.btnAddProgram', function () {
        $( '#prosesbar' ).show();
        var data = unit_tbl.row( $( this ).parents( 'tr' ) ).data();
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './addProgram',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'kd_urusan': data.Kd_Urusan,
                'kd_bidang': data.Kd_Bidang,
                'kd_program': data.Kd_Prog,
                'uraian_program': data.Ket_Program_Can,
            },

            success: function ( data ) {
                unit_tbl.ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    $( '#prosesbar' ).hide();
                    createPesan( data.pesan, "success" );
                } else {
                    $( '#prosesbar' ).hide();
                    createPesan( data.pesan, "danger" );
                }
            }
        } );
    } );

    $( document ).on( 'click', '.btnEditProgram', function () {
        $( '#prosesbar' ).show();
        var data = unit_tbl.row( $( this ).parents( 'tr' ) ).data();
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './updateProgram',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'kd_urusan': data.Kd_Urusan,
                'kd_bidang': data.Kd_Bidang,
                'kd_program': data.Kd_Prog,
                'kd_urusan_new': data.Kd_Urusan,
                'kd_bidang_new': data.Kd_Bidang,
                'kd_program_new': data.Kd_Prog,
                'uraian_program': data.Ket_Program_Can,
            },

            success: function ( data ) {
                unit_tbl.ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    $( '#prosesbar' ).hide();
                    createPesan( data.pesan, "success" );
                } else {
                    $( '#prosesbar' ).hide();
                    createPesan( data.pesan, "danger" );
                }
            }
        } );
    } );

    $( document ).on( 'click', '.btnAddBulkKegiatan', function () {
        $( '#prosesbar' ).show();
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './bulkKegiatan',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_program': id_unit_temp,
            },

            success: function ( data ) {
                subunit_tbl.ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    $( '#prosesbar' ).hide();
                    createPesan( data.pesan, "success" );
                } else {
                    $( '#prosesbar' ).hide();
                    createPesan( data.pesan, "danger" );
                }
            }
        } );

    } ); $( document ).on( 'click', '.btnAddKegiatan', function () {
        $( '#prosesbar' ).show();
        var data = subunit_tbl.row( $( this ).parents( 'tr' ) ).data();
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './addKegiatan',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'kd_urusan': data.Kd_Urusan,
                'kd_bidang': data.Kd_Bidang,
                'kd_prog': data.Kd_Prog,
                'kd_keg': data.Kd_Keg,
                'ket_kegiatan': data.Ket_Kegiatan_Can,
            },

            success: function ( data ) {
                subunit_tbl.ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    $( '#prosesbar' ).hide();
                    createPesan( data.pesan, "success" );
                } else {
                    $( '#prosesbar' ).hide();
                    createPesan( data.pesan, "danger" );
                }
            }
        } );
    } );

    $( document ).on( 'click', '.btnEditKegiatan', function () {
        $( '#prosesbar' ).show();
        var data = subunit_tbl.row( $( this ).parents( 'tr' ) ).data();
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './updateKegiatan',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'kd_urusan': data.Kd_Urusan,
                'kd_bidang': data.Kd_Bidang,
                'kd_prog': data.Kd_Prog,
                'kd_keg': data.Kd_Keg,
                'kd_urusan_new': data.Kd_Urusan,
                'kd_bidang_new': data.Kd_Bidang,
                'kd_prog_new': data.Kd_Prog,
                'kd_keg_new': data.Kd_Keg,
                'ket_kegiatan': data.Ket_Kegiatan_Can,
            },

            success: function ( data ) {
                subunit_tbl.ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    $( '#prosesbar' ).hide();
                    createPesan( data.pesan, "success" );
                } else {
                    $( '#prosesbar' ).hide();
                    createPesan( data.pesan, "danger" );
                }
            }
        } );
    } );

} ); // end js file