$( document ).ready( function () {

    $( '[data-toggle="popover"]' ).popover();

    function createPesan ( message, type ) {
        var html = '<div class="alert alert-' + type + ' alert-dismissable page-alert col-md-12">';
        html += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
        html += message;
        html += '</div>';
        $( html ).hide().prependTo( '#pesan' ).slideDown();
    };

    $( '#prosesbar' ).hide();

    $( '.page-alert .close' ).click( function ( e ) {
        e.preventDefault();
        $( this ).closest( '.page-alert' ).slideUp();
    } );

    $( ".disabled" ).click( function ( e ) {
        e.preventDefault();
        return false;
    } );

    $( '.number' ).number( true, 0, '', '' );

    $( '.display' ).DataTable( {
        dom: 'BfRtip',
        autoWidth: false,
        bDestroy: true
    } );

    var kd_urusan_temp, kd_fungsi_temp, kd_bidang_temp;
    var urusan_tbl, fungsi_tbl, bidang_tbl;

    fungsi_tbl = $( '#tblFungsi' ).DataTable( {
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
        "ajax": { "url": "./getFungsiApi" },
        "columns": [
            { data: 'Kd_Fungsi', sClass: "dt-center", width: "10%" },
            { data: 'Nm_Fungsi_Can' },
            { data: 'Nm_Fungsi' },
            { data: 'action', 'searchable': false, width: "10%", 'orderable': false, sClass: "dt-center" }
        ],
    } );

    urusan_tbl = $( '#tblUrusan' ).DataTable( {
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
        "ajax": { "url": "./getUrusanApi" },
        "columns": [
            { data: 'Kd_Urusan', sClass: "dt-center", width: "10%" },
            { data: 'Nm_Urusan_Can' },
            { data: 'Nm_Urusan' },
            { data: 'action', 'searchable': false, width: "10%", 'orderable': false, sClass: "dt-center" }
        ],
    } );

    function loadTblBidang ( urusan ) {
        bidang_tbl = $( '#tblBidang' ).DataTable( {
            processing: true,
            serverSide: true,
            responsive: true,
            dom: 'bFrtip',
            autoWidth: false,
            order: [ [ 0, 'asc' ], [ 1, 'asc' ] ],
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
            "ajax": { "url": "./getBidangApi?kd_urusan=" + urusan },
            "columns": [
                { data: 'Kd_Urusan', sClass: "dt-center" },
                { data: 'Kd_Bidang', sClass: "dt-center" },
                { data: 'Nm_Bidang_Can', sClass: "dt-left" },
                { data: 'Nm_Bidang', sClass: "dt-left" },
                { data: 'action', 'searchable': false, width: "10%", 'orderable': false, sClass: "dt-center" }
            ],
        } );
    };

    $( '#tblUrusan tbody' ).on( 'dblclick', 'tr', function () {
        var data = urusan_tbl.row( this ).data();
        $( '.nav-tabs a[href="#bidang"]' ).tab( 'show' );
        kd_urusan_temp = data.Kd_Urusan;
        loadTblBidang( kd_urusan_temp );
    } );

    $( document ).on( 'click', '.btnAddBulkFungsi', function () {
        $( '#prosesbar' ).show();
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './bulkFungsi',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
            },

            success: function ( data ) {
                fungsi_tbl.ajax.reload( null, false );
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

    $( document ).on( 'click', '.btnAddFungsi', function () {
        $( '#prosesbar' ).show();
        var data = fungsi_tbl.row( $( this ).parents( 'tr' ) ).data();
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './addFungsi',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'kd_fungsi': data.Kd_Fungsi,
                'nm_fungsi': data.Nm_Fungsi_Can,
            },

            success: function ( data ) {
                fungsi_tbl.ajax.reload( null, false );
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

    $( document ).on( 'click', '.btnEditFungsi', function () {
        $( '#prosesbar' ).show();
        var data = fungsi_tbl.row( $( this ).parents( 'tr' ) ).data();
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './updateFungsi',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'kd_fungsi': data.Kd_Fungsi,
                'nm_fungsi': data.Nm_Fungsi_Can,
            },

            success: function ( data ) {
                fungsi_tbl.ajax.reload( null, false );
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

    $( document ).on( 'click', '.btnAddBulkUrusan', function () {
        $( '#prosesbar' ).show();
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './bulkUrusan',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
            },

            success: function ( data ) {
                urusan_tbl.ajax.reload( null, false );
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

    $( document ).on( 'click', '.btnAddUrusan', function () {
        $( '#prosesbar' ).show();
        var data = urusan_tbl.row( $( this ).parents( 'tr' ) ).data();
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './addUrusan',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'kd_urusan': data.Kd_Urusan,
                'nm_urusan': data.Nm_Urusan_Can,
            },

            success: function ( data ) {
                urusan_tbl.ajax.reload( null, false );
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

    $( document ).on( 'click', '.btnEditUrusan', function () {
        $( '#prosesbar' ).show();
        var data = urusan_tbl.row( $( this ).parents( 'tr' ) ).data();
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './updateUrusan',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'kd_urusan': data.Kd_Urusan,
                'nm_urusan': data.Nm_Urusan_Can,
            },

            success: function ( data ) {
                urusan_tbl.ajax.reload( null, false );
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

    $( document ).on( 'click', '.btnAddBulkBidang', function () {
        $( '#prosesbar' ).show();
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './bulkBidang',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'kd_urusan': kd_urusan_temp,
            },

            success: function ( data ) {
                bidang_tbl.ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    $( '#prosesbar' ).hide();
                    createPesan( data.pesan, "success" );
                } else {
                    $( '#prosesbar' ).hide();
                    createPesan( data.pesan, "danger" );
                }
            }
        } );
    } ); $( document ).on( 'click', '.btnAddBidang', function () {
        $( '#prosesbar' ).show();
        var data = bidang_tbl.row( $( this ).parents( 'tr' ) ).data();
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './addBidang',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'kd_urusan': data.Kd_Urusan,
                'kd_bidang': data.Kd_Bidang,
                'nm_bidang': data.Nm_Bidang_Can,
                'kd_fungsi': data.Kd_Fungsi,
            },

            success: function ( data ) {
                bidang_tbl.ajax.reload( null, false );
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

    $( document ).on( 'click', '.btnEditBidang', function () {
        $( '#prosesbar' ).show();
        var data = bidang_tbl.row( $( this ).parents( 'tr' ) ).data();
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './updateBidang',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'kd_urusan': data.Kd_Urusan,
                'kd_bidang': data.Kd_Bidang,
                'nm_bidang': data.Nm_Bidang_Can,
                'kd_fungsi': data.Kd_Fungsi,
            },

            success: function ( data ) {
                bidang_tbl.ajax.reload( null, false );
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

} ); // end script