$( document ).ready( function () {

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

    $( '.page-alert .close' ).click( function ( e ) {
        e.preventDefault();
        $( this ).closest( '.page-alert' ).slideUp();
    } );

    $( '#prosesbar' ).hide();
    $( '.number' ).number( true, 0, ',', '.' );
    $( '[data-toggle="popover"]' ).popover();

    $( '#TblLogKirim' ).DataTable( {
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
        "pageLength": 50,
        "lengthMenu": [ [ 10, 50, -1 ], [ 10, 50, "All" ] ],
    } );

    var TblLogKirims;
    function loadTblLogKirim ( id_dokumen_keu ) {
        vars = "?id_dokumen=" + id_dokumen_keu;
        vars += "&jns_dok=" + + $( "#jns_dokumen" ).val();
        TblLogKirims = $( '#TblLogKirim' ).DataTable( {
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
            "pageLength": 50,
            "lengthMenu": [ [ 10, 50, -1 ], [ 10, 50, "All" ] ],
            "ajax": { "url": "./getdata" + vars },
            "columns": [
                { data: 'no_urut', sClass: "dt-center", searchable: false, orderable: false, },
                { data: 'tgl_kirim', sClass: "dt-center" },
                { data: 'kodeskpd', sClass: "dt-center" },
                { data: 'uraiskpd', sClass: "dt-left" },
                {
                    data: 'log_kirim', 'searchable': true, 'orderable': true, sClass: "dt-left",
                    render: function ( data, type, row, meta ) {
                        return row.log_kirim + '   <span class="label" style="background-color: ' + row.status_warna + '; color:#fff;">' + row.status_label + '</span>  ';
                    }
                },
                { data: 'action', 'searchable': false, width: "10%", 'orderable': false, sClass: "dt-center" }
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } );
    };

    var TblUnitKirim;
    function loadTblUnitKirim ( id_dokumen_keu ) {
        vars = "?id_dokumen=" + id_dokumen_keu;
        vars += "&jns_dok=" + $( "#jns_dokumen" ).val();
        TblUnitKirim = $( '#tblProses' ).DataTable( {
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
            "pageLength": 50,
            "lengthMenu": [ [ 10, 50, -1 ], [ 10, 50, "All" ] ],
            "bDestroy": true,
            "ajax": { "url": "./getUnitRkpd" + vars },
            'columnDefs': [
                {
                    'width': 10,
                    'targets': 0,
                    'checkboxes': { 'selectRow': true }
                },
                { "targets": 1, "width": 10 }
            ],
            'select': { 'style': 'multi' },
            "columns": [
                { data: 'id_unit', sClass: "dt-center", searchable: false, orderable: false, },
                { data: 'kode_unit', sClass: "dt-center", width: "5px" },
                { data: 'nama_unit' },
                { data: 'action', 'searchable': false, width: "10%", 'orderable': false, sClass: "dt-center" }
            ],
            "order": [ [ 0, 'asc' ] ],
        } );
    };

    $( "#jns_dokumen" ).change( function () {
        $.ajax( {
            type: "GET",
            url: 'getDokRkpd?jns_dok=' + $( "#jns_dokumen" ).val(),
            dataType: "json",
            success: function ( data ) {

                var j = data.length;
                var post, i;

                $( 'select[name="id_dokumen_rkpd"]' ).empty();
                $( 'select[name="id_dokumen_rkpd"]' ).append( '<option value="0">---Pilih Dokumen RKPD---</option>' );

                for ( i = 0; i < j; i++ ) {
                    post = data[ i ];
                    $( 'select[name="id_dokumen_rkpd"]' ).append( '<option value="' + post.id_dokumen_rkpd + '">' + post.nomor_display + '</option>' );
                }
            }
        } );
    } );

    $( ".id_dokumen_rkpd" ).change( function () {
        loadTblLogKirim( $( '#id_dokumen_rkpd' ).val() );
        loadTblUnitKirim( $( '#id_dokumen_rkpd' ).val() );
    } );


    $( document ).on( 'click', '.add-satuan', function () {
        $( '.form-horizontal' ).show();
        loadTblUnitKirim( $( '#id_dokumen_rkpd' ).val() );
        $( '#tblProses' ).DataTable().ajax.reload( null, false );
        $( '#frmKirimApi' ).modal( 'show' );
    } );

    $( document ).on( 'click', '#btnProsesKirim', function () {
        var data = TblUnitKirim.row( $( this ).parents( 'tr' ) ).data();
        var id_unit = data.id_unit;

        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $( '#prosesbar' ).show();
        $( '#frmKirimApi' ).modal( 'hide' );

        $.ajax( {
            type: 'POST',
            url: './postJSONBangda',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_unit': id_unit,
            },
            success: function ( data ) {
                $( '#TblLogKirim' ).DataTable().ajax.reload( null, false );
                createPesan( data.pesan, "success" );
                $( '#prosesbar' ).hide();
            },
            error: function ( data ) {
                $( '#TblLogKirim' ).DataTable().ajax.reload( null, false );
                createPesan( data.pesan, "danger" );
                $( '#prosesbar' ).hide();
            }
        } );
    } );

    $( document ).on( 'click', '#btnProsesKirimRanwal', function () {
        var data = TblUnitKirim.row( $( this ).parents( 'tr' ) ).data();
        var id_unit = data.id_unit;

        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $( '#prosesbar' ).show();
        $( '#frmKirimApi' ).modal( 'hide' );

        $.ajax( {
            type: 'POST',
            url: './postJSONBangdaRanwal',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_unit': id_unit,
            },
            success: function ( data ) {
                $( '#TblLogKirim' ).DataTable().ajax.reload( null, false );
                createPesan( data.pesan, "success" );
                $( '#prosesbar' ).hide();
            },
            error: function ( data ) {
                $( '#TblLogKirim' ).DataTable().ajax.reload( null, false );
                createPesan( data.pesan, "danger" );
                $( '#prosesbar' ).hide();
            }
        } );
    } );

    $( document ).on( 'click', '#btnProsesKirimRancangan', function () {
        var data = TblUnitKirim.row( $( this ).parents( 'tr' ) ).data();
        var id_unit = data.id_unit;

        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $( '#prosesbar' ).show();
        $( '#frmKirimApi' ).modal( 'hide' );

        $.ajax( {
            type: 'POST',
            url: './postJSONBangdaRancangan',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_unit': id_unit,
            },
            success: function ( data ) {
                $( '#TblLogKirim' ).DataTable().ajax.reload( null, false );
                createPesan( data.pesan, "success" );
                $( '#prosesbar' ).hide();
            },
            error: function ( data ) {
                $( '#TblLogKirim' ).DataTable().ajax.reload( null, false );
                createPesan( data.pesan, "danger" );
                $( '#prosesbar' ).hide();
            }
        } );
    } );

    $( document ).on( 'click', '#btnProsesKirimRpjmd', function () {
        var data = TblUnitKirim.row( $( this ).parents( 'tr' ) ).data();
        var id_unit = data.id_unit;

        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $( '#prosesbar' ).show();
        $( '#frmKirimApi' ).modal( 'hide' );

        $.ajax( {
            type: 'POST',
            url: './postJSONBangdaRpjmd',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_unit': id_unit,
            },
            success: function ( data ) {
                $( '#TblLogKirim' ).DataTable().ajax.reload( null, false );
                createPesan( data.pesan, "success" );
                $( '#prosesbar' ).hide();
            },
            error: function ( data ) {
                $( '#TblLogKirim' ).DataTable().ajax.reload( null, false );
                createPesan( data.pesan, "danger" );
                $( '#prosesbar' ).hide();
            }
        } );
    } );

    $( document ).on( 'click', '#btnProsesKirimRenstra', function () {
        var data = TblUnitKirim.row( $( this ).parents( 'tr' ) ).data();
        var id_unit = data.id_unit;

        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $( '#prosesbar' ).show();
        $( '#frmKirimApi' ).modal( 'hide' );

        $.ajax( {
            type: 'POST',
            url: './postJSONBangdaRenstra',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_unit': id_unit,
            },
            success: function ( data ) {
                $( '#TblLogKirim' ).DataTable().ajax.reload( null, false );
                createPesan( data.pesan, "success" );
                $( '#prosesbar' ).hide();
            },
            error: function ( data ) {
                $( '#TblLogKirim' ).DataTable().ajax.reload( null, false );
                createPesan( data.pesan, "danger" );
                $( '#prosesbar' ).hide();
            }
        } );
    } );

    $( document ).on( 'click', '#btnProsesAll', function ( e ) {
        var rows_selected = TblUnitKirim.column( 0 ).checkboxes.selected();
        var counts_data = TblUnitKirim.rows( { selected: true } ).count();
        if ( $( "#jns_dokumen" ).val() == 0 ) {
            var url_temp = './postJSONBangdaRanwal';
        };
        if ( $( "#jns_dokumen" ).val() == 1 ) {
            var url_temp = './postJSONBangda';
        };
        if ( $( "#jns_dokumen" ).val() == 2 ) {
            var url_temp = './postJSONBangdaRancangan';
        };
        if ( $( "#jns_dokumen" ).val() == 3 ) {
            var url_temp = './postJSONBangdaRpjmd';
        };
        if ( $( "#jns_dokumen" ).val() == 4 ) {
            var url_temp = './postJSONBangdaRenstra';
        };

        if ( rows_selected.count() == 0 ) {
            createPesan( "Data belum ada yang dipilih", "danger" );
            return;
        };

        $( '#prosesbar' ).show();
        $( '#frmKirimApi' ).modal( 'hide' );

        $.each( rows_selected, function ( index, rowId ) {
            var id_unit = rowId;
            $.ajaxSetup( {
                headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
            } );
            $.ajax( {
                type: 'POST',
                url: url_temp,
                data: {
                    '_token': $( 'input[name=_token]' ).val(),
                    'id_unit': id_unit,
                },
                success: function ( data ) {
                    $( '#TblLogKirim' ).DataTable().ajax.reload( null, false );
                    if ( index == ( counts_data - 1 ) ) {
                        $( '#prosesbar' ).hide();
                        createPesan( data.pesan, "success" );
                    }
                },
                error: function ( data ) {
                    $( '#TblLogKirim' ).DataTable().ajax.reload( null, false );
                    $( '#prosesbar' ).hide();
                    createPesan( data.pesan, "danger" );
                }
            } );
        } );
        e.preventDefault();
    } );

    $( document ).on( 'click', '#btnDeleteLog', function () {
        var data = TblLogKirims.row( $( this ).parents( 'tr' ) ).data();

        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './hapusLogBangda',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_log': data.id_log,
            },
            success: function ( data ) {
                $( '#TblLogKirim' ).DataTable().ajax.reload( null, false );;
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            }
        } );
    } );

} ); //end file