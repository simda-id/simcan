$( document ).ready( function () {

    var template = Handlebars.compile( $( "#details-golongan" ).html() );

    var rek1_tbl, rek2_tbl, rek3_tbl, rek4_tbl, rek5_tbl, rek6_tbl;
    var rek1_temp, rek2_temp, rek3_temp, rek4_temp, rek5_temp, rek6_temp;

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

    function back2Rek2 () {
        $( '.nav-tabs a[href="#tabrek12"]' ).tab( 'show' );
    }

    $( document ).on( 'click', '.backBidang', function () {
        back2Rek2();
    } );

    $( document ).on( 'dblclick', '.backBidang', function () {
        back2Rek2();
    } );

    function back2Rek3 () {
        $( '.nav-tabs a[href="#tabrek3"]' ).tab( 'show' );
    }

    $( document ).on( 'click', '.backProgram', function () {
        back2Rek3();
    } );

    $( document ).on( 'dblclick', '.backProgram', function () {
        back2Rek3();
    } );

    function back2Rek4 () {
        $( '.nav-tabs a[href="#tabrek4"]' ).tab( 'show' );
    }

    $( document ).on( 'click', '.backKegiatan', function () {
        back2Rek4();
    } );

    $( document ).on( 'dblclick', '.backKegiatan', function () {
        back2Rek4();
    } );

    function back2Rek5 () {
        $( '.nav-tabs a[href="#tabrek5"]' ).tab( 'show' );
    }

    $( document ).on( 'click', '.backRek5', function () {
        back2Rek5();
    } );

    $( document ).on( 'dblclick', '.backRek5', function () {
        back2Rek5();
    } );

    $.ajax( {
        type: "GET",
        url: '../parameter90/getPmdUbah',
        dataType: "json",
        success: function ( data ) {
            var j = data.length;
            var post, i;

            $( 'select[name="dasar_hkm6"]' ).empty();
            $( 'select[name="dasar_hkm6"]' ).append( '<option value="-1">---Pilih Dasar Hukum Penambahan/Perubahan---</option>' );

            for ( i = 0; i < j; i++ ) {
                post = data[ i ];
                $( 'select[name="dasar_hkm6"]' ).append( '<option value="' + post.id + '">' + post.uraian + '</option>' );
            }
        }
    } );

    rek1_tbl = $( '#tblAkun' ).DataTable( {
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
        "ajax": { "url": "./rekening/getListRek1" },
        "columns": [
            {
                "className": 'details-control',
                "orderable": false,
                "searchable": false,
                "data": null,
                "defaultContent": '',
                "width": "5px"
            },
            { data: 'kd_rek_1', sClass: "dt-center", width: "10%" },
            { data: 'nama_kd_rek_1' },
        ],
        "order": [ [ 0, 'asc' ] ],
    } );

    function initTableBidang ( tableId, data ) {
        rek2_tbl = $( '#' + tableId ).DataTable( {
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
                { data: 'kode_rek2', name: 'kode_rek2', sClass: "dt-center", width: '10%' },
                { data: 'nama_kd_rek_2', name: 'nama_kd_rek_2' },
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } )

        $( '#' + tableId + '  tbody' ).on( 'click', 'tr', function () {
            var data = rek2_tbl.row( this ).data();
            rek2_temp = data.id_rek_2;
            $( '#ur_akun_rek3' ).text( data.kd_rek_1 + ' ' + data.nama_kd_rek_1 );
            $( '#ur_gol_rek3' ).text( data.kode_rek2 + ' ' + data.nama_kd_rek_2 );
            $( '.nav-tabs a[href="#tabrek3"]' ).tab( 'show' );
            loadTblJenis( rek2_temp );
        } );

    }

    $( '#tblAkun tbody' ).on( 'click', 'td.details-control', function () {
        var tr = $( this ).closest( 'tr' );
        var row = rek1_tbl.row( tr );
        var tableId = 'golongan-' + row.data().kd_rek_1;
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

    function loadTblJenis ( bidang ) {
        rek3_tbl = $( '#tblJenis' ).DataTable( {
            processing: true,
            serverSide: true,
            dom: 'BfRtip',
            autoWidth: false,
            "ajax": { "url": "./rekening/getListRek3/" + bidang },
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
                { data: 'kode_rek3', sClass: "dt-center", width: "15%" },
                { data: 'nama_kd_rek_3', sClass: "dt-left" },
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } );
    }

    function LoadListRek4 ( id_program ) {
        rek4_tbl = $( '#tblObyek' ).DataTable( {
            processing: true,
            serverSide: true,
            dom: 'BfRtip',
            autoWidth: false,
            "ajax": { "url": "./rekening/getListRek4/" + id_program },
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
                { data: 'kode_rek4', sClass: "dt-center", width: "15%" },
                { data: 'nama_kd_rek_4', sClass: "dt-left" },
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } );
    }

    function LoadListRek5 ( id_kegiatan ) {
        rek5_tbl = $( '#tblRincian' ).DataTable( {
            processing: true,
            serverSide: true,
            dom: 'BfRtip',
            autoWidth: false,
            "ajax": { "url": "./rekening/getListRek5/" + id_kegiatan },
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
                { data: 'kode_rek5', sClass: "dt-center", width: "15%" },
                { data: 'nama_kd_rek_5', sClass: "dt-left" },
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } );
    }

    function LoadListRek6 ( id_kegiatan ) {
        rek6_tbl = $( '#tblSubRincian' ).DataTable( {
            processing: true,
            serverSide: true,
            dom: 'BfRtip',
            autoWidth: false,
            "ajax": { "url": "./rekening/getListRek6/" + id_kegiatan },
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
                { data: 'kode_rek6', sClass: "dt-center", width: "15%" },
                { data: 'nama_kd_rek_6', sClass: "dt-left" },
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } );
    }

    $( '#tblJenis tbody' ).on( 'dblclick', 'tr', function () {
        var data = rek3_tbl.row( this ).data();
        rek3_temp = data.id_rek_3;
        $( '#ur_akun_rek4' ).text( data.kd_rek_1 + ' ' + data.nama_kd_rek_1 );
        $( '#ur_gol_rek4' ).text( data.kode_rek2 + ' ' + data.nama_kd_rek_2 );
        $( '#ur_jenis_rek4' ).text( data.kode_rek3 + ' ' + data.nama_kd_rek_3 );
        $( '.nav-tabs a[href="#tabrek4"]' ).tab( 'show' );
        LoadListRek4( rek3_temp );
    } );

    $( '#tblObyek tbody' ).on( 'dblclick', 'tr', function () {
        var data = rek4_tbl.row( this ).data();
        rek4_temp = data.id_rek_4;
        $( '#ur_akun_rek5' ).text( data.kd_rek_1 + ' ' + data.nama_kd_rek_1 );
        $( '#ur_gol_rek5' ).text( data.kode_rek2 + ' ' + data.nama_kd_rek_2 );
        $( '#ur_jenis_rek5' ).text( data.kode_rek3 + ' ' + data.nama_kd_rek_3 );
        $( '#ur_obyek_rek5' ).text( data.kode_rek4 + ' ' + data.nama_kd_rek_4 );
        $( '.nav-tabs a[href="#tabrek5"]' ).tab( 'show' );
        LoadListRek5( rek4_temp );
    } );

    $( '#tblRincian tbody' ).on( 'dblclick', 'tr', function () {
        var data = rek5_tbl.row( this ).data();
        rek5_temp = data.id_rek_5;
        $( '#ur_akun_rek6' ).text( data.kd_rek_1 + ' ' + data.nama_kd_rek_1 );
        $( '#ur_gol_rek6' ).text( data.kode_rek2 + ' ' + data.nama_kd_rek_2 );
        $( '#ur_jenis_rek6' ).text( data.kode_rek3 + ' ' + data.nama_kd_rek_3 );
        $( '#ur_obyek_rek6' ).text( data.kode_rek4 + ' ' + data.nama_kd_rek_4 );
        $( '#ur_rincian_rek6' ).text( data.kode_rek5 + ' ' + data.nama_kd_rek_5 );
        $( '.nav-tabs a[href="#tabrek6"]' ).tab( 'show' );
        LoadListRek6( rek5_temp );
    } );

    function getStatusRek6 () {
        var xCheck = document.querySelectorAll( 'input[name="rbStatusRek6"]:checked' );
        var xyz = [];
        for ( var x = 0, l = xCheck.length; x < l; x++ ) { xyz.push( xCheck[ x ].value ); }
        var xvalues = xyz.join( '' );
        return xvalues;
    }

    $( document ).on( 'click', '#btnRek6', function () {
        $( '#btnSaveRek6' ).addClass( 'addRek6' );
        $( '#btnSaveRek6' ).removeClass( 'editRek6' );
        $( '#nm_akun6' ).text( $( '#ur_akun_rek6' ).text() );
        $( '#nm_kelompok6' ).text( $( '#ur_gol_rek6' ).text() );
        $( '#nm_jenis6' ).text( $( '#ur_jenis_rek6' ).text() );
        $( '#nm_obyek6' ).text( $( '#ur_obyek_rek6' ).text() );
        $( '#id_rincian6' ).val( rek5_temp );
        $( '#nm_rincian6' ).text( $( '#ur_rincian_rek6' ).text() );
        $( '#id_subrinc6' ).val( null );
        $( '#kd_subrinc6' ).val( 1 );
        $( '#uraian_subrinc6' ).val( null );
        $( '#dasar_hkm6' ).val( 50 ).trigger( 'change' );
        document.frmModalRek6.rbStatusRek6[ 0 ].checked = true;
        $( '.form-horizontal' ).show();
        $( '#frmModalRek6' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.addRek6', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );
        $.ajax( {
            type: 'post',
            url: './rekening/addRek6',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_rek_5': rek5_temp,
                'kd_rek_6': $( '#kd_subrinc6' ).val(),
                'nama_kd_rek_6': $( '#uraian_subrinc6' ).val(),
                'id_hkm': $( '#dasar_hkm6' ).val(),
            },
            success: function ( data ) {
                rek6_tbl.ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            },
        } );
    } );

} ); //end file