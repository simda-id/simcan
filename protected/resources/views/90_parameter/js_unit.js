$( document ).ready( function () {

    var template = Handlebars.compile( $( "#details-bidang" ).html() );

    var id_bidang_temp, id_unit_temp, kode_unit_temp;
    var urusan_tbl, bidang_tbl, unit_tbl, subunit_tbl;

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

    document.getElementById( "btnTambahSub" ).style.visibility = 'hidden';
    document.getElementById( "btnTambahUnit" ).style.visibility = 'hidden';

    function back2bidang () {
        $( '.nav-tabs a[href="#urusan"]' ).tab( 'show' );
    }

    $( document ).on( 'click', '.backBidang', function () {
        back2bidang();
    } );

    $( document ).on( 'dblclick', '.backBidang', function () {
        back2bidang();
    } );

    function back2unit () {
        $( '.nav-tabs a[href="#unit"]' ).tab( 'show' );
    }

    $( document ).on( 'click', '.backUnit', function () {
        back2unit();
    } );

    $( document ).on( 'dblclick', '.backUnit', function () {
        back2unit();
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
        "ajax": { "url": "./unit/getListUrusan" },
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
                { data: 'nm_bidang', name: 'nm_bidang' }
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } )

        $( '#' + tableId + '  tbody' ).on( 'click', 'tr', function () {

            var data = bidang_tbl.row( this ).data();

            id_bidang_temp = data.id_bidang;

            $( '#ur_urusan' ).text( data.nm_urusan );
            $( '#ur_bidang' ).text( data.nm_bidang );

            if ( data.kode_urusan == 7 ) {
                document.getElementById( "btnTambahUnit" ).style.visibility = 'visible';
                document.getElementById( "kd_unit" ).removeAttribute( "readonly" );
                document.getElementById( "nm_unit" ).removeAttribute( "readonly" );
            } else {
                document.getElementById( "btnTambahUnit" ).style.visibility = 'hidden';
                document.getElementById( "kd_unit" ).setAttribute( "readonly", "readonly" );
                document.getElementById( "nm_unit" ).setAttribute( "readonly", "readonly" );
            }

            $( '.nav-tabs a[href="#unit"]' ).tab( 'show' );
            loadTblUnit( id_bidang_temp );

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

    function loadTblUnit ( bidang ) {
        unit_tbl = $( '#tblUnit' ).DataTable( {
            processing: true,
            serverSide: true,
            dom: 'BfRtip',
            autoWidth: false,
            "ajax": { "url": "./unit/getListUnit/" + bidang },
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
                { data: 'no_urut', 'searchable': false, 'orderable': false, sClass: "dt-center", width: "5%" },
                { data: 'kode_unit', sClass: "dt-center", width: "15%" },
                { data: 'nm_unit', sClass: "dt-left" },
                {
                    data: 'icon', 'searchable': false, 'orderable': false, sClass: "dt-center", width: "15px",
                    render: function ( data, type, row, meta ) {
                        return '<i class="' + row.status_icon + '" style="font-size:16px;color:' + row.warna + ';"/>';
                    }
                },
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } );
    }

    function LoadListSubUnit ( id_unit ) {
        subunit_tbl = $( '#tblSubUnit' ).DataTable( {
            processing: true,
            serverSide: true,
            dom: 'BfRtip',
            autoWidth: false,
            "ajax": { "url": "./unit/getListSubUnit/" + id_unit },
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
                { data: 'no_urut', 'searchable': false, 'orderable': false, sClass: "dt-center", width: "5%" },
                { data: 'kode_sub_unit', sClass: "dt-center", width: "15%" },
                { data: 'nm_sub', sClass: "dt-left" },
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } );
    }

    $( '#tblUnit tbody' ).on( 'dblclick', 'tr', function () {

        var data = unit_tbl.row( this ).data();

        id_unit_temp = data.id_unit;
        kode_unit_temp = data.kode_unit;

        document.getElementById( "btnTambahSub" ).style.visibility = 'visible';
        $( '#ur_urusan_sub' ).text( $( '#ur_urusan' ).text() );
        $( '#ur_bidang_sub' ).text( $( '#ur_bidang' ).text() );
        $( '#ur_unit' ).text( data.nm_unit );

        $( '.nav-tabs a[href="#subunit"]' ).tab( 'show' );
        LoadListSubUnit( id_unit_temp );

    } );

    $( "#kd_unit" ).change( function () {
        var x = $( '#kode_bidang' ).val() + "." + $( '#kode_bidang2' ).val() + "." + $( '#kode_bidang3' ).val();
        var y = "00" + $( "#kd_unit" ).val();
        $( '#kode_unit' ).val( x + "." + y.slice( ( y.length - 2 ), y.length ) );
    } );

    function getStatusUnit () {
        var xCheck = document.querySelectorAll( 'input[name="rbStatusUnit"]:checked' );
        var xyz = [];
        for ( var x = 0, l = xCheck.length; x < l; x++ ) { xyz.push( xCheck[ x ].value ); }
        var xvalues = xyz.join( '' );
        return xvalues;
    }

    $( document ).on( 'click', '#btnTambahUnit', function () {
        $( '.btnSaveUnit' ).addClass( 'addUnit' );
        $( '.btnSaveUnit' ).removeClass( 'editUnit' );
        $( '#id_bidang' ).val( 0 );
        $( '#id_bidang2' ).val( 0 );
        $( '#id_bidang3' ).val( 0 );
        $( '#id_unit' ).val( 0 );
        document.frmModalUnit.rbStatusUnit[ 1 ].checked = true;
        $( '#kode_bidang' ).val( '7-01' );
        $( '#nm_bidang' ).val( 'KECAMATAN' );
        $( '#kode_bidang2' ).val( '0-00' );
        $( '#nm_bidang2' ).val( 'TIDAK ADA KEWENANGAN' );
        $( '#kode_bidang3' ).val( '0-00' );
        $( '#nm_bidang3' ).val( 'TIDAK ADA KEWENANGAN' );
        $( '#kd_unit' ).val( 0 );
        $( '#kode_unit' ).val( '7-01.0-00.0-00.00' );
        $( '#nm_unit' ).val( null );
        $( '#divStatusUnit' ).hide();

        $( '.form-horizontal' ).show();
        $( '#ModalUnit' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.addUnit', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './unit/addUnit',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'kd_unit': $( '#kd_unit' ).val(),
                'nm_unit': $( '#nm_unit' ).val(),
            },
            success: function ( data ) {
                unit_tbl.ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            },
        } );
    } );

    $( document ).on( 'click', '#btnDetailUnit', function () {
        var data = unit_tbl.row( $( this ).parents( 'tr' ) ).data();
        $.ajax( {
            type: "GET",
            url: 'unit/getListBidangInduk?id_unit=' + data.id_unit,
            dataType: "json",
            success: function ( data ) {
                var j = data.length;
                var post, i;
                $( 'select[name="bidang_induk"]' ).empty();
                $( 'select[name="bidang_induk"]' ).append( '<option value="-1">---Pilih Bidang Induk Unit---</option>' );
                for ( i = 0; i < j; i++ ) {
                    post = data[ i ];
                    $( 'select[name="bidang_induk"]' ).append( '<option value="' + post.id_bidang + '">' + post.nm_bidang + '</option>' );
                }
            }
        } );
        $( '.btnSaveUnit' ).removeClass( 'addUnit' );
        $( '.btnSaveUnit' ).addClass( 'editUnit' );
        $( '#id_bidang' ).val( data.id_bidang );
        $( '#id_bidang2' ).val( data.id_bidang2 );
        $( '#id_bidang3' ).val( data.id_bidang3 );
        $( '#id_unit' ).val( data.id_unit );
        document.frmModalUnit.rbStatusUnit[ data.status_data ].checked = true;
        $( '#kode_bidang' ).val( data.kode_bidang );
        $( '#nm_bidang' ).val( data.nm_bidang );
        $( '#kode_bidang2' ).val( data.kode_bidang2 );
        $( '#nm_bidang2' ).val( data.nm_bidang2 );
        $( '#kode_bidang3' ).val( data.kode_bidang3 );
        $( '#nm_bidang3' ).val( data.nm_bidang3 );
        $( '#kd_unit' ).val( data.kd_unit );
        $( '#kode_unit' ).val( data.kode_unit );
        $( '#nm_unit' ).val( data.nm_unit );
        $( '#kode_bidang_utama' ).val( data.kode_bidang_utama );
        $( '#divStatusUnit' ).show();
        $( '.form-horizontal' ).show();
        $( '#ModalUnit' ).modal( 'show' );
    } );

    $( "#bidang_induk" ).change( function () {
        $( '#kode_bidang_utama' ).val( $( '#bidang_induk option:selected' ).text() );
    } );

    $( '.modal-footer' ).on( 'click', '.editUnit', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './unit/editUnit',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_unit': $( '#id_unit' ).val(),
                'id_bidang_utama': $( '#bidang_induk' ).val(),
                'status_data': getStatusUnit(),
            },
            success: function ( data ) {
                unit_tbl.ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            },
        } );
    } );

    $( document ).on( 'click', '#btnHapusUnit', function () {
        var data = unit_tbl.row( $( this ).parents( 'tr' ) ).data();
        $( '#id_unit_hapus' ).val( data.id_unit );
        $( '#nm_unit_hapus' ).text( data.nm_unit );

        $( '#HapusUnit' ).modal( 'show' );

    } );

    $( document ).on( 'click', '#btnDeleteUnit', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './unit/hapusUnit',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_bidang': $( '#id_bidang' ).val(),
                'id_unit': $( '#id_unit' ).val()
            },
            success: function ( data ) {
                $( '#ModalUnit' ).modal( 'hide' );
                unit_tbl.ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            }
        } );
    } );

    $( "#kd_sub" ).change( function () {
        var x = $( '#kode_unit_sub' ).val();
        var y = "0000" + $( "#kd_sub" ).val();
        $( '#kode_sub_unit' ).val( x + "." + y.slice( ( y.length - 4 ), y.length ) );
    } );

    function getStatusKinerja () {
        var xCheck = document.querySelectorAll( 'input[name="rbStatusKinerja"]:checked' );
        var xyz = [];
        for ( var x = 0, l = xCheck.length; x < l; x++ ) { xyz.push( xCheck[ x ].value ); }
        var xvalues = xyz.join( '' );
        return xvalues;
    }

    function getStatusKeuangan () {
        var xCheck = document.querySelectorAll( 'input[name="rbStatusKeuangan"]:checked' );
        var xyz = [];
        for ( var x = 0, l = xCheck.length; x < l; x++ ) { xyz.push( xCheck[ x ].value ); }
        var xvalues = xyz.join( '' );
        return xvalues;
    }

    function getStatusSubUnit () {
        var xCheck = document.querySelectorAll( 'input[name="rbStatusSubUnit"]:checked' );
        var xyz = [];
        for ( var x = 0, l = xCheck.length; x < l; x++ ) { xyz.push( xCheck[ x ].value ); }
        var xvalues = xyz.join( '' );
        return xvalues;
    }

    $( document ).on( 'click', '#btnTambahSub', function () {
        $( '.btnSubUnit' ).removeClass( 'editSub' );
        $( '.btnSubUnit' ).addClass( 'addSub' );
        $( '.modal-title' ).text( 'Tambah Data Sub Unit Perangkat Daerah' );
        $( '.form-horizontal' ).show();
        $( '#id_sub_unit' ).val( null );
        $( '#id_unit_sub' ).val( id_unit_temp );
        $( '#kd_sub' ).val( 0 );
        $( '#kode_unit_sub' ).val( kode_unit_temp );
        $( '#kode_sub_unit' ).val( kode_unit_temp );
        $( '#nm_sub' ).val( null );
        document.frmModalSubUnit.rbStatusKinerja[ 0 ].checked = true;
        document.frmModalSubUnit.rbStatusKeuangan[ 0 ].checked = true;
        document.frmModalSubUnit.rbStatusSubUnit[ 1 ].checked = true;

        $( '#ModalSubUnit' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.addSub', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './unit/addSubUnit',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_sub_unit': $( '#id_sub_unit' ).val(),
                'id_unit': $( '#id_unit_sub' ).val(),
                'kd_sub': $( '#kd_sub' ).val(),
                'nm_sub': $( '#nm_sub' ).val(),
                'sub_kinerja': getStatusKinerja(),
                'sub_keuangan': getStatusKeuangan(),
                'status_data': getStatusSubUnit(),
            },
            success: function ( data ) {
                subunit_tbl.ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            },
        } );
    } );

    //edit function
    $( document ).on( 'click', '#btnEditSubUnit', function () {
        var data = subunit_tbl.row( $( this ).parents( 'tr' ) ).data();

        $( '.btnSubUnit' ).removeClass( 'addSub' );
        $( '.btnSubUnit' ).addClass( 'editSub' );
        $( '.modal-title' ).text( 'Edit Data Sub Unit Perangkat Daerah' );
        $( '.form-horizontal' ).show();
        $( '#id_sub_unit' ).val( data.id_sub_unit );
        $( '#id_unit_sub' ).val( data.id_unit );
        $( '#kd_sub' ).val( data.kd_sub );
        $( '#kode_unit_sub' ).val( data.kode_unit );
        $( '#kode_sub_unit' ).val( data.kode_sub_unit );
        $( '#nm_sub' ).val( data.nm_sub );
        document.frmModalSubUnit.rbStatusKinerja[ data.sub_kinerja ].checked = true;
        document.frmModalSubUnit.rbStatusKeuangan[ data.sub_keuangan ].checked = true;
        document.frmModalSubUnit.rbStatusSubUnit[ data.status_data ].checked = true;

        $( '#ModalSubUnit' ).modal( 'show' );
    } );


    $( '.modal-footer' ).on( 'click', '.editSub', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './unit/editSubUnit',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_sub_unit': $( '#id_sub_unit' ).val(),
                'id_unit': $( '#id_unit_sub' ).val(),
                'kd_sub': $( '#kd_sub' ).val(),
                'nm_sub': $( '#nm_sub' ).val(),
                'sub_kinerja': getStatusKinerja(),
                'sub_keuangan': getStatusKeuangan(),
                'status_data': getStatusSubUnit(),

            },
            success: function ( data ) {
                subunit_tbl.ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            }
        } );
    } );

    // //delete function
    $( document ).on( 'click', '#btnHapusSubUnit', function () {
        var data = subunit_tbl.row( $( this ).parents( 'tr' ) ).data();
        $( '.btnDelSubUnit' ).addClass( 'delete' );
        $( '.modal-title' ).text( 'Hapus Data Sub Unit Perangkat Daerah' );
        $( '.form-horizontal' ).hide();
        $( '#id_sub_unit_hapus' ).val( data.id_sub_unit );
        $( '#nm_sub_unit_hapus' ).html( data.nm_sub );
        $( '#HapusSubUnit' ).modal( 'show' );

    } );

    $( '.modal-footer' ).on( 'click', '.delete', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './unit/hapusSubUnit',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_sub_unit': $( '#id_sub_unit_hapus' ).val(),
            },
            success: function ( data ) {
                subunit_tbl.ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            }
        } );
    } );

} ); //end file