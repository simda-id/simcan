$( document ).ready( function () {

    var template = Handlebars.compile( $( "#details-bidang" ).html() );

    var jns_pemda_temp, id_bidang_temp, kode_bidang_temp, id_program_temp, kode_program_temp, id_kegiatan_temp, kode_kegiatan_temp, id_sub_kegiatan_temp;
    var urusan_tbl, bidang_tbl, program_tbl, kegiatan_tbl, subkegiatan_tbl;

    $( '[data-toggle="popover"]' ).popover();

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

    $.ajax( {
        type: "GET",
        url: '../parameter90/getPmdUbah',
        dataType: "json",
        success: function ( data ) {
            var j = data.length;
            var post, i;

            $( 'select[name="dasar_hkm_program"]' ).empty();
            $( 'select[name="dasar_hkm_program"]' ).append( '<option value="-1">---Pilih Dasar Hukum Penambahan/Perubahan---</option>' );
            $( 'select[name="dasar_hkm_kegiatan"]' ).empty();
            $( 'select[name="dasar_hkm_kegiatan"]' ).append( '<option value="-1">---Pilih Dasar Hukum Penambahan/Perubahan---</option>' );
            $( 'select[name="dasar_hkm_subkegiatan"]' ).empty();
            $( 'select[name="dasar_hkm_subkegiatan"]' ).append( '<option value="-1">---Pilih Dasar Hukum Penambahan/Perubahan---</option>' );

            for ( i = 0; i < j; i++ ) {
                post = data[ i ];
                $( 'select[name="dasar_hkm_program"]' ).append( '<option value="' + post.id + '">' + post.uraian + '</option>' );
                $( 'select[name="dasar_hkm_kegiatan"]' ).append( '<option value="' + post.id + '">' + post.uraian + '</option>' );
                $( 'select[name="dasar_hkm_subkegiatan"]' ).append( '<option value="' + post.id + '">' + post.uraian + '</option>' );
            }
        }
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

    function back2kegiatan () {
        $( '.nav-tabs a[href="#kegiatan"]' ).tab( 'show' );
    }

    $( document ).on( 'click', '.backKegiatan', function () {
        back2kegiatan();
    } );

    $( document ).on( 'dblclick', '.backKegiatan', function () {
        back2kegiatan();
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
                { data: 'nm_bidang', name: 'nm_bidang' },
                {
                    data: 'jml_program', sClass: "dt-right",
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' )
                },
                {
                    data: 'jml_kegiatan', sClass: "dt-right",
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' )
                },
                {
                    data: 'jml_sub_kegiatan', sClass: "dt-right",
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' )
                }
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } )

        $( '#' + tableId + '  tbody' ).on( 'click', 'tr', function () {
            var data = bidang_tbl.row( this ).data();
            id_bidang_temp = data.id_bidang;
            kode_bidang_temp = data.bidang_display;
            jns_pemda_temp = data.jns_pemda;
            $( '#ur_urusan_prog' ).text( data.nm_urusan );
            $( '#ur_bidang_prog' ).text( data.bidang_display );
            $( '.nav-tabs a[href="#program"]' ).tab( 'show' );
            loadTblProgram( id_bidang_temp );
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

    function loadTblProgram ( bidang ) {
        program_tbl = $( '#tblProgram' ).DataTable( {
            processing: true,
            serverSide: true,
            dom: 'BfRtip',
            autoWidth: false,
            "ajax": { "url": "./program/getListProgram/" + bidang },
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
                { data: 'action', 'searchable': false, width: "5%", 'orderable': false, sClass: "dt-center" },
                { data: 'no_urut', 'searchable': false, 'orderable': false, sClass: "dt-center", width: "5%" },
                { data: 'kode_program', sClass: "dt-center", width: "15%" },
                { data: 'uraian_program', sClass: "dt-left" },
                {
                    data: 'jml_kegiatan', sClass: "dt-right",
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' )
                },
                {
                    data: 'jml_sub_kegiatan', sClass: "dt-right",
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' )
                }
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
            "ajax": { "url": "./program/getListKegiatan/" + id_program },
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
                { data: 'action', 'searchable': false, width: "5%", 'orderable': false, sClass: "dt-center" },
                { data: 'no_urut', 'searchable': false, 'orderable': false, sClass: "dt-center", width: "5%" },
                { data: 'kode_kegiatan', sClass: "dt-center", width: "15%" },
                { data: 'uraian_kegiatan', sClass: "dt-left" },
                {
                    data: 'jml_sub_kegiatan', sClass: "dt-right",
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' )
                }
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } );
    }

    function LoadListSubKegiatan ( id_kegiatan ) {
        subkegiatan_tbl = $( '#tblSubKegiatan' ).DataTable( {
            processing: true,
            serverSide: true,
            dom: 'BfRtip',
            autoWidth: false,
            "ajax": { "url": "./program/getListSubKegiatan/" + id_kegiatan },
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
                { data: 'action', 'searchable': false, width: "5%", 'orderable': false, sClass: "dt-center" },
                { data: 'no_urut', 'searchable': false, 'orderable': false, sClass: "dt-center", width: "5%" },
                { data: 'kode_sub_kegiatan', sClass: "dt-center", width: "15%" },
                { data: 'uraian_sub_kegiatan', sClass: "dt-left" },
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } );
    }

    $( '#tblProgram tbody' ).on( 'dblclick', 'tr', function () {
        var data = program_tbl.row( this ).data();
        id_program_temp = data.id_program;
        kode_program_temp = data.kode_program_display;
        $( '#ur_urusan_keg' ).text( $( '#ur_urusan_prog' ).text() );
        $( '#ur_bidang_keg' ).text( $( '#ur_bidang_prog' ).text() );
        $( '#ur_program_keg' ).text( data.kode_program_display );
        $( '.nav-tabs a[href="#kegiatan"]' ).tab( 'show' );
        LoadListKegiatan( id_program_temp );
    } );

    $( '#tblKegiatan tbody' ).on( 'dblclick', 'tr', function () {
        var data = kegiatan_tbl.row( this ).data();
        id_kegiatan_temp = data.id_kegiatan;
        kode_kegiatan_temp = data.kode_kegiatan_display;
        $( '#ur_urusan_sub' ).text( $( '#ur_urusan_keg' ).text() );
        $( '#ur_bidang_sub' ).text( $( '#ur_bidang_keg' ).text() );
        $( '#ur_program_sub' ).text( $( '#ur_program_keg' ).text() );
        $( '#ur_kegiatan_sub' ).text( ( data.kode_kegiatan_display ).toUpperCase() );
        $( '.nav-tabs a[href="#subkegiatan"]' ).tab( 'show' );
        LoadListSubKegiatan( id_kegiatan_temp );
    } );

    function getStatusProgram () {
        var xCheck = document.querySelectorAll( 'input[name="rbStatusProgram"]:checked' );
        var xyz = [];
        for ( var x = 0, l = xCheck.length; x < l; x++ ) { xyz.push( xCheck[ x ].value ); }
        var xvalues = xyz.join( '' );
        return xvalues;
    }

    $( document ).on( 'click', '#btnTambahProgram', function () {
        $( '#btnSaveProgram' ).addClass( 'addProgram' );
        $( '#btnSaveProgram' ).removeClass( 'editProgram' );
        $( '#id_bidang' ).val( id_bidang_temp );
        $( '#id_program' ).val( null );
        $( '#kd_program' ).val( 0 );
        $( '#nm_program' ).val( null );
        $( '#nm_bidang_prog' ).text( kode_bidang_temp );
        $( '#dasar_hkm_program' ).val( 50 ).trigger( 'change' );
        document.frmModalProgram.rbStatusProgram[ 0 ].checked = true;
        $( '.form-horizontal' ).show();
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
                'id_bidang': id_bidang_temp,
                'kd_program': $( '#kd_program' ).val(),
                'nm_program': $( '#nm_program' ).val(),
                'id_hkm': $( '#dasar_hkm_program' ).val(),
            },
            success: function ( data ) {
                program_tbl.ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            },
        } );
    } );

    $( document ).on( 'click', '#btnEditProgram', function () {
        var data = program_tbl.row( $( this ).parents( 'tr' ) ).data();
        $( '#btnSaveProgram' ).removeClass( 'addProgram' );
        $( '#btnSaveProgram' ).addClass( 'editProgram' );
        $( '#id_bidang' ).val( data.id_bidang );
        $( '#id_program' ).val( data.id_program );
        $( '#kd_program' ).val( data.kd_program );
        $( '#nm_program' ).val( data.uraian_program );
        $( '#dasar_hkm_program' ).val( data.id_hkm ).trigger( 'change' );
        $( '#nm_bidang_prog' ).text( data.kode_bidang + " " + data.nm_bidang );
        document.frmModalProgram.rbStatusProgram[ data.status_data ].checked = true;
        $( '.form-horizontal' ).show();
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
                'id_program': $( '#id_program' ).val(),
                'id_bidang': id_bidang_temp,
                'kd_program': $( '#kd_program' ).val(),
                'nm_program': $( '#nm_program' ).val(),
                'id_hkm': $( '#dasar_hkm_program' ).val(),
                'status_data': getStatusProgram(),
            },
            success: function ( data ) {
                program_tbl.ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            },
        } );
    } );

    function getStatusKegiatan () {
        var xCheck = document.querySelectorAll( 'input[name="rbStatusKegiatan"]:checked' );
        var xyz = [];
        for ( var x = 0, l = xCheck.length; x < l; x++ ) { xyz.push( xCheck[ x ].value ); }
        var xvalues = xyz.join( '' );
        return xvalues;
    }

    $( document ).on( 'click', '#btnTambahKegiatan', function () {
        $( '#btnSaveKegiatan' ).addClass( 'addKegiatan' );
        $( '#btnSaveKegiatan' ).removeClass( 'editKegiatan' );
        $( '#id_program_keg' ).val( id_program_temp );
        $( '#nm_bidang_kegiatan' ).text( kode_bidang_temp );
        $( '#nm_program_keg' ).text( kode_program_temp );
        $( '#jns_pemda_keg' ).text( jns_pemda_temp );
        $( '#id_kegiatan' ).val( null );
        $( '#kd_kegiatan' ).val( 0 );
        $( '#nm_kegiatan' ).val( null );
        $( '#dasar_hkm_kegiatan' ).val( 50 ).trigger( 'change' );
        document.frmModalKegiatan.rbStatusKegiatan[ 0 ].checked = true;
        $( '.form-horizontal' ).show();
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
                'id_program': id_program_temp,
                'kd_kegiatan': $( '#kd_kegiatan' ).val(),
                'nm_kegiatan': $( '#nm_kegiatan' ).val(),
                'id_hkm': $( '#dasar_hkm_kegiatan' ).val(),
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

    $( document ).on( 'click', '#btnEditKegiatan', function () {
        var data = kegiatan_tbl.row( $( this ).parents( 'tr' ) ).data();
        $( '#btnSaveKegiatan' ).removeClass( 'addKegiatan' );
        $( '#btnSaveKegiatan' ).addClass( 'editKegiatan' );
        $( '#id_program_keg' ).val( id_program_temp );
        $( '#nm_bidang_kegiatan' ).text( kode_bidang_temp );
        $( '#nm_program_keg' ).text( kode_program_temp );
        $( '#jns_pemda_keg' ).text( jns_pemda_temp );
        $( '#id_kegiatan' ).val( data.id_kegiatan );
        $( '#kd_kegiatan' ).val( data.kd_kegiatan_x );
        $( '#nm_kegiatan' ).val( data.uraian_kegiatan );
        $( '#dasar_hkm_kegiatan' ).val( data.id_hkm ).trigger( 'change' );
        document.frmModalKegiatan.rbStatusKegiatan[ data.status_data ].checked = true;
        $( '.form-horizontal' ).show();
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
                'id_program': id_program_temp,
                'kd_kegiatan': $( '#kd_kegiatan' ).val(),
                'nm_kegiatan': $( '#nm_kegiatan' ).val(),
                'id_hkm': $( '#dasar_hkm_kegiatan' ).val(),
                'status_data': getStatusKegiatan(),
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

    function getStatusSubKegiatan () {
        var xCheck = document.querySelectorAll( 'input[name="rbStatusSubKegiatan"]:checked' );
        var xyz = [];
        for ( var x = 0, l = xCheck.length; x < l; x++ ) { xyz.push( xCheck[ x ].value ); }
        var xvalues = xyz.join( '' );
        return xvalues;
    }

    $( document ).on( 'click', '#btnTambahSubKegiatan', function () {
        $( '#btnSaveSubKegiatan' ).addClass( 'addSubKegiatan' );
        $( '#btnSaveSubKegiatan' ).removeClass( 'editSubKegiatan' );
        $( '#id_kegiatan_subkeg' ).val( id_kegiatan_temp );
        $( '#nm_bidang_subkegiatan' ).text( kode_bidang_temp );
        $( '#nm_program_subkeg' ).text( kode_program_temp );
        $( '#nm_kegiatan_subkeg' ).text( kode_kegiatan_temp );
        $( '#id_sub_kegiatan' ).val( null );
        $( '#kd_subkegiatan' ).val( 0 );
        $( '#nm_sub_kegiatan' ).val( null );
        $( '#dasar_hkm_subkegiatan' ).val( 50 ).trigger( 'change' );
        document.frmModalSubKegiatan.rbStatusSubKegiatan[ 0 ].checked = true;
        $( '.form-horizontal' ).show();
        $( '#ModalSubKegiatan' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.addSubKegiatan', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );
        $.ajax( {
            type: 'post',
            url: './program/addSubKegiatan',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_kegiatan': id_kegiatan_temp,
                'kd_sub_kegiatan': $( '#kd_subkegiatan' ).val(),
                'uraian_sub_kegiatan': $( '#nm_sub_kegiatan' ).val(),
                'id_hkm': $( '#dasar_hkm_subkegiatan' ).val(),
            },
            success: function ( data ) {
                subkegiatan_tbl.ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            },
        } );
    } );

    $( document ).on( 'click', '#btnEditSubKegiatan', function () {
        var data = subkegiatan_tbl.row( $( this ).parents( 'tr' ) ).data();
        $( '#btnSaveSubKegiatan' ).removeClass( 'addSubKegiatan' );
        $( '#btnSaveSubKegiatan' ).addClass( 'editSubKegiatan' );
        $( '#id_kegiatan_subkeg' ).val( id_kegiatan_temp );
        $( '#nm_bidang_subkegiatan' ).text( kode_bidang_temp );
        $( '#nm_program_subkeg' ).text( kode_program_temp );
        $( '#nm_kegiatan_subkeg' ).text( kode_kegiatan_temp );
        $( '#id_sub_kegiatan' ).val( data.id_sub_kegiatan );
        $( '#kd_subkegiatan' ).val( data.kd_sub_kegiatan );
        $( '#nm_sub_kegiatan' ).val( data.uraian_sub_kegiatan );
        $( '#dasar_hkm_subkegiatan' ).val( data.id_hkm ).trigger( 'change' );
        document.frmModalSubKegiatan.rbStatusSubKegiatan[ data.status_data ].checked = true;
        $( '.form-horizontal' ).show();
        $( '#ModalSubKegiatan' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.editSubKegiatan', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );
        $.ajax( {
            type: 'post',
            url: './program/editSubKegiatan',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_sub_kegiatan': $( '#id_sub_kegiatan' ).val(),
                'id_kegiatan': id_kegiatan_temp,
                'kd_sub_kegiatan': $( '#kd_subkegiatan' ).val(),
                'uraian_sub_kegiatan': $( '#nm_sub_kegiatan' ).val(),
                'id_hkm': $( '#dasar_hkm_subkegiatan' ).val(),
                'status_data': getStatusSubKegiatan(),
            },
            success: function ( data ) {
                subkegiatan_tbl.ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            },
        } );
    } );
} ); //end file