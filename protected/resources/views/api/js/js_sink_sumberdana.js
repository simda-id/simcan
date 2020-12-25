$( document ).ready( function () {

    $( '[data-toggle="popover"]' ).popover();

    function createPesan ( message, type ) {
        var html = '<div id="pesanx" class="alert alert-' + type + ' alert-dismissable flyover flyover-bottom in">';
        html += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
        html += '<p><strong>' + message + '</strong></p>';
        html += '</div>';
        $( html ).hide().prependTo( '#pesan' ).slideDown();

        setTimeout( function () {
            $( '#pesanx' ).removeClass( 'in' );
        }, 1500 );
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

    var kd_urusan_temp, sd_tbl;

    sd_tbl = $( '#tblSumberDana' ).DataTable( {
        processing: true,
        serverSide: true,
        responsive: true,
        dom: 'bfrtip',
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
        "ajax": { "url": "./getSumberDanaApi" },
        "columns": [
            { data: 'action', 'searchable': false, width: "10%", 'orderable': false, sClass: "dt-center" },
            { data: 'no_urut', sClass: "dt-center", width: "10%", 'orderable': true },
            { data: 'nm_sumber_can' },
            { data: 'Nm_Sumber' }
        ],
    } );

    $( document ).on( 'click', '.btnAddBulkSumberDana', function () {
        $( '#prosesbar' ).show();
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './bulkSumberDana',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
            },

            success: function ( data ) {
                sd_tbl.ajax.reload( null, false );
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

    $( document ).on( 'click', '.btnAddSumber', function () {
        $( '#prosesbar' ).show();
        var data = sd_tbl.row( $( this ).parents( 'tr' ) ).data();
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './addSumberDana',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'kd_sumber': data.no_urut,
                'nm_sumber': data.nm_sumber_can,
            },

            success: function ( data ) {
                sd_tbl.ajax.reload( null, false );
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

    $( document ).on( 'click', '.btnEditSumber', function () {
        $( '#prosesbar' ).show();
        var data = sd_tbl.row( $( this ).parents( 'tr' ) ).data();
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './updateSumberDana',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'kd_sumber': data.no_urut,
                'nm_sumber': data.nm_sumber_can,
            },

            success: function ( data ) {
                sd_tbl.ajax.reload( null, false );
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