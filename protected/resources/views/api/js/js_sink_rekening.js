$( document ).ready( function () {
    var kd_rek1_temp, kd_rek2_temp, kd_rek3_temp, kd_rek4_temp;
    var akun_tbl, golongan_tbl, jenis_tbl, obyek_tbl, rincian_tbl;

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

    akun_tbl = $( '#tblAkun' ).DataTable( {
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
        "ajax": { "url": "./getRek1Api" },
        "columns": [
            { data: 'Kd_Rek_1', sClass: "dt-center" },
            { data: 'Nm_Rek_1_Can' },
            { data: 'Nm_Rek_1' },
            { data: 'action', 'searchable': false, width: "10%", 'orderable': false, sClass: "dt-center" }
        ],
    } );

    function loadTblGolongan ( kd_rek_1 ) {
        golongan_tbl = $( '#tblGolongan' ).DataTable( {
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
            "ajax": { "url": "./getRek2Api?kd_rek_1=" + kd_rek_1 },
            "columns": [
                { data: 'Kd_Rek_1', sClass: "dt-center" },
                { data: 'Kd_Rek_2', sClass: "dt-center" },
                { data: 'Nm_Rek_2_Can', sClass: "dt-left" },
                { data: 'Nm_Rek_2', sClass: "dt-left" },
                { data: 'action', 'searchable': false, width: "10%", 'orderable': false, sClass: "dt-center" }
            ],
        } );
    };

    function loadTblJenis ( kd_rek_1, kd_rek_2 ) {
        jenis_tbl = $( '#tblJenis' ).DataTable( {
            processing: true,
            serverSide: true,
            responsive: true,
            dom: 'bFrtip',
            autoWidth: false,
            order: [ [ 0, 'asc' ], [ 1, 'asc' ], [ 2, 'asc' ] ],
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
            "ajax": { "url": "./getRek3Api?kd_rek_1=" + kd_rek_1 + "&kd_rek_2=" + kd_rek_2 },
            "columns": [
                { data: 'Kd_Rek_1', sClass: "dt-center" },
                { data: 'Kd_Rek_2', sClass: "dt-center" },
                { data: 'Kd_Rek_3', sClass: "dt-center" },
                { data: 'Nm_Rek_3_Can', sClass: "dt-left" },
                { data: 'Nm_Rek_3', sClass: "dt-left" },
                { data: 'action', 'searchable': false, width: "10%", 'orderable': false, sClass: "dt-center" }
            ],
        } );
    };

    function loadTblObyek ( kd_rek_1, kd_rek_2, kd_rek_3 ) {
        obyek_tbl = $( '#tblObyek' ).DataTable( {
            processing: true,
            serverSide: true,
            responsive: true,
            dom: 'bFrtip',
            autoWidth: false,
            order: [ [ 0, 'asc' ], [ 1, 'asc' ], [ 2, 'asc' ], [ 3, 'asc' ] ],
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
            "ajax": { "url": "./getRek4Api?kd_rek_1=" + kd_rek_1 + "&kd_rek_2=" + kd_rek_2 + "&kd_rek_3=" + kd_rek_3 },
            "columns": [
                { data: 'Kd_Rek_1', sClass: "dt-center" },
                { data: 'Kd_Rek_2', sClass: "dt-center" },
                { data: 'Kd_Rek_3', sClass: "dt-center" },
                { data: 'Kd_Rek_4', sClass: "dt-center" },
                { data: 'Nm_Rek_4_Can', sClass: "dt-left" },
                { data: 'Nm_Rek_4', sClass: "dt-left" },
                { data: 'action', 'searchable': false, width: "10%", 'orderable': false, sClass: "dt-center" }
            ],
        } );
    };

    function loadTblRincian ( kd_rek_1, kd_rek_2, kd_rek_3, kd_rek_4 ) {
        rincian_tbl = $( '#tblRincian' ).DataTable( {
            processing: true,
            serverSide: true,
            responsive: true,
            dom: 'bFrtip',
            autoWidth: false,
            order: [ [ 0, 'asc' ], [ 1, 'asc' ], [ 2, 'asc' ], [ 3, 'asc' ], [ 4, 'asc' ] ],
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
            "ajax": { "url": "./getRek5Api?kd_rek_1=" + kd_rek_1 + "&kd_rek_2=" + kd_rek_2 + "&kd_rek_3=" + kd_rek_3 + "&kd_rek_4=" + kd_rek_4 },
            "columns": [
                { data: 'Kd_Rek_1', sClass: "dt-center" },
                { data: 'Kd_Rek_2', sClass: "dt-center" },
                { data: 'Kd_Rek_3', sClass: "dt-center" },
                { data: 'Kd_Rek_4', sClass: "dt-center" },
                { data: 'Kd_Rek_5', sClass: "dt-center" },
                { data: 'Nm_Rek_5_Can', sClass: "dt-left" },
                { data: 'Nm_Rek_5', sClass: "dt-left" },
                { data: 'action', 'searchable': false, width: "10%", 'orderable': false, sClass: "dt-center" }
            ],
        } );
    };

    $( '#tblAkun tbody' ).on( 'dblclick', 'tr', function () {
        var data = akun_tbl.row( this ).data();
        kd_rek1_temp = data.Kd_Rek_1;
        $( '.nav-tabs a[href="#golongan"]' ).tab( 'show' );
        loadTblGolongan( kd_rek1_temp );
    } );

    $( '#tblGolongan tbody' ).on( 'dblclick', 'tr', function () {
        var data = golongan_tbl.row( this ).data();
        kd_rek1_temp = data.Kd_Rek_1;
        kd_rek2_temp = data.Kd_Rek_2;
        $( '.nav-tabs a[href="#jenis"]' ).tab( 'show' );
        loadTblJenis( kd_rek1_temp, kd_rek2_temp );
    } );

    $( '#tblJenis tbody' ).on( 'dblclick', 'tr', function () {
        var data = jenis_tbl.row( this ).data();
        kd_rek1_temp = data.Kd_Rek_1;
        kd_rek2_temp = data.Kd_Rek_2;
        kd_rek3_temp = data.Kd_Rek_3;
        $( '.nav-tabs a[href="#obyek"]' ).tab( 'show' );
        loadTblObyek( kd_rek1_temp, kd_rek2_temp, kd_rek3_temp );
    } );

    $( '#tblObyek tbody' ).on( 'dblclick', 'tr', function () {
        var data = obyek_tbl.row( this ).data();
        kd_rek1_temp = data.Kd_Rek_1;
        kd_rek2_temp = data.Kd_Rek_2;
        kd_rek3_temp = data.Kd_Rek_3;
        kd_rek4_temp = data.Kd_Rek_4;
        $( '.nav-tabs a[href="#rincian"]' ).tab( 'show' );
        loadTblRincian( kd_rek1_temp, kd_rek2_temp, kd_rek3_temp, kd_rek4_temp );
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

    } );

    $( document ).on( 'click', '.btnAddRek4', function () {
        $( '#prosesbar' ).show();
        var data = obyek_tbl.row( $( this ).parents( 'tr' ) ).data();
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './addRek4',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'kd_rek_1': data.Kd_Rek_1,
                'kd_rek_2': data.Kd_Rek_2,
                'kd_rek_3': data.Kd_Rek_3,
                'kd_rek_4': data.Kd_Rek_4,
                'nm_rek_4': data.Nm_Rek_4_Can,
            },

            success: function ( data ) {
                obyek_tbl.ajax.reload( null, false );
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

    $( document ).on( 'click', '.btnEditRek4', function () {
        $( '#prosesbar' ).show();
        var data = obyek_tbl.row( $( this ).parents( 'tr' ) ).data();
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './updateRek4',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'kd_rek_1': data.Kd_Rek_1,
                'kd_rek_2': data.Kd_Rek_2,
                'kd_rek_3': data.Kd_Rek_3,
                'kd_rek_4': data.Kd_Rek_4,
                'nm_rek_4': data.Nm_Rek_4_Can,
            },

            success: function ( data ) {
                obyek_tbl.ajax.reload( null, false );
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

    $( document ).on( 'click', '.btnAddBulkRekening', function () {
        $( '#prosesbar' ).show();
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './prosesRek5',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
            },

            success: function ( data ) {
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

    $( document ).on( 'click', '.btnAddRek5', function () {
        $( '#prosesbar' ).show();
        var data = rincian_tbl.row( $( this ).parents( 'tr' ) ).data();
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './addRek5',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'kd_rek_1': data.Kd_Rek_1,
                'kd_rek_2': data.Kd_Rek_2,
                'kd_rek_3': data.Kd_Rek_3,
                'kd_rek_4': data.Kd_Rek_4,
                'kd_rek_5': data.Kd_Rek_5,
                'nm_rek_5': data.Nm_Rek_5_Can,
                'peraturan': data.Peraturan_Can,
            },

            success: function ( data ) {
                rincian_tbl.ajax.reload( null, false );
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

    $( document ).on( 'click', '.btnEditRek5', function () {
        $( '#prosesbar' ).show();
        var data = rincian_tbl.row( $( this ).parents( 'tr' ) ).data();
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './updateRek5',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'kd_rek_1': data.Kd_Rek_1,
                'kd_rek_2': data.Kd_Rek_2,
                'kd_rek_3': data.Kd_Rek_3,
                'kd_rek_4': data.Kd_Rek_4,
                'kd_rek_5': data.Kd_Rek_5,
                'nm_rek_5': data.Nm_Rek_5_Can,
                'peraturan': data.Peraturan_Can,
            },

            success: function ( data ) {
                rincian_tbl.ajax.reload( null, false );
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

    $( document ).on( 'click', '.btnBulkRek4', function () {
        $( '#prosesbar' ).show();
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './bulkRek4',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
            },

            success: function ( data ) {
                obyek_tbl.ajax.reload( null, false );
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

    $( document ).on( 'click', '.btnBulkRek5', function () {
        $( '#prosesbar' ).show();
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './bulkRek5',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
            },

            success: function ( data ) {
                rincian_tbl.ajax.reload( null, false );
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