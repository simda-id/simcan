$( document ).ready( function () {

    var template = Handlebars.compile( $( "#details-subunit" ).html() );
    var urusan_tbl, bidang_tbl, subunit_tbl;

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
        url: 'mapping_unit/getListUnit90/0',
        dataType: "json",
        success: function ( data ) {
            var j = data.length;
            var post, i;
            $( 'select[name="id_unit_90"]' ).empty();
            $( 'select[name="id_unit_90"]' ).append( '<option value="-1">---Pilih OPD Permendagri 90---</option>' );
            for ( i = 0; i < j; i++ ) {
                post = data[ i ];
                $( 'select[name="id_unit_90"]' ).append( '<option value="' + post.id_unit + '">' + post.unit_display + '</option>' );
            }
        }
    } );

    $( ".id_unit_90" ).change( function () {
        LoadListSubUnit( $( '.id_unit_90' ).val() );
    } );

    urusan_tbl = $( '#tblUnitMapping' ).DataTable( {
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
        "ajax": { "url": "./mapping_unit/getDataUnitMapping" },
        "columns": [
            {
                "className": 'details-control',
                "orderable": false,
                "searchable": false,
                "data": null,
                "defaultContent": '',
                "width": "5px"
            },
            { data: 'no_urut', sClass: "dt-center", width: "5%" },
            { data: 'kode_unit', sClass: "dt-center", width: "10%" },
            { data: 'nm_unit' },
        ],
        "order": [ [ 0, 'asc' ] ],
    } );

    function initTableSubUnit ( tableId, data ) {
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
                { data: 'action', 'searchable': false, width: "10%", 'orderable': false, sClass: "dt-center" },
                { data: 'no_urut', sClass: "dt-center", width: "5%" },
                { data: 'kode_sub_unit_13', name: 'kode_sub', sClass: "dt-center", width: '15%' },
                { data: 'ur_sub_unit_13', name: 'nm_sub' },
                { data: 'kode_sub_unit_90', name: 'kode_sub_13', sClass: "dt-center", width: '15%' },
                { data: 'ur_sub_unit_90', name: 'nm_sub_13' }
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } )
    }

    $( '#tblUnitMapping tbody' ).on( 'click', 'td.details-control', function () {
        var tr = $( this ).closest( 'tr' );
        var row = urusan_tbl.row( tr );
        var tableId = 'subunit-' + row.data().id_unit;
        if ( row.child.isShown() ) {
            row.child.hide();
            tr.removeClass( 'shown' );
        } else {
            row.child( template( row.data() ) ).show();
            initTableSubUnit( tableId, row.data() );
            tr.addClass( 'shown' );
            tr.next().find( 'td' ).addClass( 'no-padding bg-gray' );
        }
    } );

    function LoadListSubUnit ( id_unit ) {
        subunit_tbl = $( '#tblSubUnit' ).DataTable( {
            processing: true,
            serverSide: true,
            dom: 'BfRtip',
            autoWidth: false,
            "ajax": { "url": "./mapping_unit/getListSubUnit90/" + id_unit },
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
                { data: 'kode_sub_unit', sClass: "dt-center", width: "15%" },
                { data: 'nm_sub', sClass: "dt-left" },
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } );
    }

    $( document ).on( 'click', '#btnTambahMapping', function () {
        var data = bidang_tbl.row( $( this ).parents( 'tr' ) ).data();
        $( '.btnSaveMapping' ).addClass( 'addMapping' );
        $( '.btnSaveMapping' ).removeClass( 'editMapping' );
        $( '#ur_unit_13' ).text( '(' + data.kode_unit_13 + ') ' + data.ur_unit_13 );
        $( '#ur_unit_90' ).text( '' );
        $( '#ur_sub_unit_13' ).text( '(' + data.kode_sub_unit_13 + ') ' + data.ur_sub_unit_13 );
        $( '#ur_sub_unit_90' ).text( '' );
        $( '#id_mapping_sub' ).val( null );
        $( '#id_sub_unit_13' ).val( data.id_sub_unit );
        $( '#id_sub_unit_90' ).val( null );
        $( '#keterangan_mapping' ).val( null );
        $( '.form-horizontal' ).show();
        $( '#ModalMappingSub' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.addMapping', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );
        $.ajax( {
            type: 'post',
            url: './mapping_unit/addSubUnitMapping',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_sub_unit_13': $( '#id_sub_unit_13' ).val(),
                'id_sub_unit_90': $( '#id_sub_unit_90' ).val(),
                'keterangan_mapping': $( '#keterangan_mapping' ).val(),
            },
            success: function ( data ) {
                urusan_tbl.ajax.reload( null, false );
                bidang_tbl.ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            },
        } );
    } );

    $( document ).on( 'click', '#btnDetailMapping', function () {
        var data = bidang_tbl.row( $( this ).parents( 'tr' ) ).data();
        $( '.form-horizontal' ).show();
        $( '.btnSaveMapping' ).removeClass( 'addMapping' );
        $( '.btnSaveMapping' ).addClass( 'editMapping' );
        $( '#ur_unit_13' ).text( '(' + data.kode_unit_13 + ') ' + data.ur_unit_13 );
        $( '#ur_unit_90' ).text( '(' + data.kode_unit_90 + ') ' + data.ur_unit_90 );
        $( '#ur_sub_unit_13' ).text( '(' + data.kode_sub_unit_13 + ') ' + data.ur_sub_unit_13 );
        $( '#ur_sub_unit_90' ).text( '(' + data.kode_sub_unit_90 + ') ' + data.ur_sub_unit_90 );
        $( '#id_mapping_sub' ).val( data.id_mapping_sub );
        $( '#id_sub_unit_13' ).val( data.id_sub_unit_13 );
        $( '#id_sub_unit_90' ).val( data.id_sub_unit_90 );
        $( '#keterangan_mapping' ).val( data.keterangan_mapping );
        $( '#ModalMappingSub' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.editMapping', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );
        $.ajax( {
            type: 'post',
            url: './mapping_unit/editSubUnitMapping',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_mapping_sub': $( '#id_mapping_sub' ).val(),
                'id_sub_unit_13': $( '#id_sub_unit_13' ).val(),
                'id_sub_unit_90': $( '#id_sub_unit_90' ).val(),
                'keterangan_mapping': $( '#keterangan_mapping' ).val(),
            },
            success: function ( data ) {
                bidang_tbl.ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            },
        } );
    } );

    $( document ).on( 'click', '#btnHapusMapping', function () {
        var data = bidang_tbl.row( $( this ).parents( 'tr' ) ).data();
        $( '#id_unit_hapus' ).val( data.id_mapping_sub );
        $( '#nm_unit_hapus' ).text( data.kode_sub_unit_90 + ' (' + data.ur_sub_unit_90 + ')' );
        $( '#HapusMapping' ).modal( 'show' );
    } );

    $( document ).on( 'click', '#btnDeleteMapping', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );
        $.ajax( {
            type: 'post',
            url: './mapping_unit/hapusSubUnitMapping',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_mapping_sub': $( '#id_unit_hapus' ).val(),
            },
            success: function ( data ) {
                urusan_tbl.ajax.reload( null, false );
                bidang_tbl.ajax.reload( null, false );
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
        $( '#CariSubUnit90' ).modal( 'show' );
    } );

    $( document ).on( 'click', '#btnPilihSubUnit', function () {
        var data = subunit_tbl.row( $( this ).parents( 'tr' ) ).data();
        $( '#ur_unit_90' ).text( data.unit_display );
        $( '#ur_sub_unit_90' ).text( data.sub_unit_display );
        $( '#id_sub_unit_90' ).val( data.id_sub_unit );
        $( '#CariSubUnit90' ).modal( 'hide' );
    } );

    $( document ).on( 'click', '#btnCetakMapping', function () {
        vars = "?token=" + $( 'input[name=_token]' ).val();
        window.open( './mapping_unit/CetakMapping' + vars, '_blank' );
    } );

    $( document ).on( 'click', '#btnCetakNonMapping', function () {
        vars = "?token=" + $( 'input[name=_token]' ).val();
        window.open( './mapping_unit/CetakNonMapping' + vars, '_blank' );
    } );

} ); //end file