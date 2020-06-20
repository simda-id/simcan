$( document ).ready( function () {

    var template = Handlebars.compile( $( "#details-bidang" ).html() );

    var id_bidang_temp, id_program_temp, kode_program_temp, id_kegiatan_temp, id_sub_kegiatan_temp;
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
            $( '#ur_urusan_prog' ).text( data.nm_urusan );
            $( '#ur_bidang_prog' ).text( data.nm_bidang );
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
        kode_program_temp = data.kode_program;
        $( '#ur_urusan_keg' ).text( $( '#ur_urusan_prog' ).text() );
        $( '#ur_bidang_keg' ).text( $( '#ur_bidang_prog' ).text() );
        $( '#ur_program_keg' ).text( data.uraian_program );
        $( '.nav-tabs a[href="#kegiatan"]' ).tab( 'show' );
        LoadListKegiatan( id_program_temp );
    } );

    $( '#tblKegiatan tbody' ).on( 'dblclick', 'tr', function () {
        var data = kegiatan_tbl.row( this ).data();
        id_kegiatan_temp = data.id_kegiatan;
        kode_kegiatan_temp = data.kode_kegiatan;
        $( '#ur_urusan_sub' ).text( $( '#ur_urusan_keg' ).text() );
        $( '#ur_bidang_sub' ).text( $( '#ur_bidang_keg' ).text() );
        $( '#ur_program_sub' ).text( $( '#ur_program_keg' ).text() );
        $( '#ur_kegiatan_sub' ).text( ( data.uraian_kegiatan ).toUpperCase() );
        $( '.nav-tabs a[href="#subkegiatan"]' ).tab( 'show' );
        LoadListSubKegiatan( id_kegiatan_temp );
    } );

} ); //end file