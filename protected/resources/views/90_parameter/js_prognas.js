$( document ).ready( function () {
    var id_prognas_temp, tblPronas, tblMappingSpm;
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
        $( '.nav-tabs a[href="#bidang"]' ).tab( 'show' );
    };

    $( document ).on( 'click', '.backBidang', function () {
        back2bidang();
    } );

    $( document ).on( 'dblclick', '.backBidang', function () {
        back2bidang();
    } );

    function back2unit () {
        $( '.nav-tabs a[href="#mapping"]' ).tab( 'show' );
    };

    $( document ).on( 'click', '.backUnit', function () {
        back2unit();
    } );

    $( document ).on( 'dblclick', '.backUnit', function () {
        back2unit();
    } );

    tblPronas = $( '#tblBidang' ).DataTable( {
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
        "ajax": { "url": "./pronas/getListPronas" },
        "columns": [
            { data: 'action', 'searchable': false, width: "10%", 'orderable': false, sClass: "dt-center" },
            { data: 'uraian_program_nasional' },
            {
                data: 'icon', 'searchable': false, 'orderable': false, sClass: "dt-center", width: "8%",
                render: function ( data, type, row, meta ) {
                    return '<i class="' + row.status_icon + '" style="font-size:16px;color:' + row.warna + ';"/>';
                }
            },
        ],
        "order": [ [ 0, 'asc' ] ],
    } );

    function loadTblMapping ( jenis ) {
        tblMappingSpm = $( '#tblMapping' ).DataTable( {
            processing: true,
            serverSide: true,
            dom: 'BfRtip',
            autoWidth: false,
            "ajax": { "url": "./pronas/getListMapping?id_pronas=" + jenis },
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
                { data: 'kode_program', sClass: "dt-center", width: "10%" },
                { data: 'uraian_program', sClass: "dt-left" },
                { data: 'kode_kegiatan', sClass: "dt-center", width: "10%" },
                { data: 'uraian_kegiatan', sClass: "dt-left" },
                { data: 'kode_sub_kegiatan', sClass: "dt-center", width: "10%" },
                { data: 'uraian_sub_kegiatan', sClass: "dt-left" },
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } );
    };

    $( '#tblBidang tbody' ).on( 'dblclick', 'tr', function () {
        var data = tblPronas.row( this ).data();
        id_prognas_temp = data.id_prognas;
        $( '#ur_pronas_mapping' ).text( data.uraian_program_nasional );
        $( '.nav-tabs a[href="#mapping"]' ).tab( 'show' );
        loadTblMapping( id_prognas_temp );
    } );

    $.ajax( {
        type: "GET",
        url: '../parameter90/getUrusanList',
        dataType: "json",
        success: function ( data ) {
            var j = data.length;
            var post, i;

            $( 'select[name="urusan_mapping"]' ).empty();
            $( 'select[name="urusan_mapping"]' ).append( '<option value="-1">---Pilih Urusan Permendagri 90---</option>' );

            for ( i = 0; i < j; i++ ) {
                post = data[ i ];
                $( 'select[name="urusan_mapping"]' ).append( '<option value="' + post.kd_urusan + '">' + post.urusan_display + '</option>' );

            }
        }
    } );

    $( ".urusan_mapping" ).change( function () {
        $.ajax( {
            type: "GET",
            url: '../parameter90/getBidangList/' + $( '#urusan_mapping' ).val(),
            dataType: "json",
            success: function ( data ) {
                var j = data.length;
                var post, i;

                $( 'select[name="bidang_mapping"]' ).empty();
                $( 'select[name="bidang_mapping"]' ).append( '<option value="-1">---Pilih Bidang Permendagri 90---</option>' );

                for ( i = 0; i < j; i++ ) {
                    post = data[ i ];
                    $( 'select[name="bidang_mapping"]' ).append( '<option value="' + post.id_bidang + '">' + post.bidang_display + '</option>' );
                }
            }
        } );
    } );

    $( "#bidang_mapping" ).change( function () {
        $.ajax( {
            type: "GET",
            url: '../parameter90/getProgramList?id_bidang=' + $( '#bidang_mapping' ).val(),
            dataType: "json",
            success: function ( data ) {
                var j = data.length;
                var post, i;
                $( 'select[name="prog_mapping"]' ).empty();
                $( 'select[name="prog_mapping"]' ).append( '<option value="-1">---Pilih Program Permendagri 90---</option>' );
                for ( i = 0; i < j; i++ ) {
                    post = data[ i ];
                    $( 'select[name="prog_mapping"]' ).append( '<option value="' + post.id_program + '">' + post.uraian_display + '</option>' );
                }
            }
        } );
    } );

    $( ".prog_mapping" ).change( function () {
        $.ajax( {
            type: "GET",
            url: '../parameter90/getKegiatanList?id_program=' + $( '#prog_mapping' ).val(),
            dataType: "json",
            success: function ( data ) {
                var j = data.length;
                var post, i;
                $( 'select[name="keg_mapping"]' ).empty();
                $( 'select[name="keg_mapping"]' ).append( '<option value="-1">---Pilih Kegiatan Permendagri 90---</option>' );
                for ( i = 0; i < j; i++ ) {
                    post = data[ i ];
                    $( 'select[name="keg_mapping"]' ).append( '<option value="' + post.id_kegiatan + '">' + post.uraian_display + '</option>' );
                }
            }
        } );
    } );

    $( ".keg_mapping" ).change( function () {
        $.ajax( {
            type: "GET",
            url: '../parameter90/getSubKegiatanList?id_kegiatan=' + $( '#keg_mapping' ).val(),
            dataType: "json",
            success: function ( data ) {
                var j = data.length;
                var post, i;
                $( 'select[name="subkeg_mapping"]' ).empty();
                $( 'select[name="subkeg_mapping"]' ).append( '<option value="-1">---Pilih Sub Kegiatan Permendagri 90---</option>' );
                $( 'select[name="subkeg_mapping"]' ).append( '<option value="0">Semua Sub Kegiatan</option>' );
                for ( i = 0; i < j; i++ ) {
                    post = data[ i ];
                    $( 'select[name="subkeg_mapping"]' ).append( '<option value="' + post.id_sub_kegiatan + '">' + post.uraian_display + '</option>' );
                }
            }
        } );
    } );

    $( document ).on( 'click', '#btnTambahProgram', function () {
        $( '.btnSaveProgram' ).addClass( 'addProgram' );
        $( '.btnSaveProgram' ).removeClass( 'editProgram' );
        $( '#id_prognas' ).val( null );
        $( '#status_data_program' ).val( 0 );
        $( '#uraian_program' ).val( null );
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
            url: './pronas/addPronas',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'uraian_program': $( '#uraian_program' ).val(),
            },
            success: function ( data ) {
                tblPronas.ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            },
        } );
    } );

    function getStatusProgram () {
        var xCheck = document.querySelectorAll( 'input[name="rbStatusProgram"]:checked' );
        var xyz = [];
        for ( var x = 0, l = xCheck.length; x < l; x++ ) { xyz.push( xCheck[ x ].value ); }
        var xvalues = xyz.join( '' );
        return xvalues;
    }

    $( document ).on( 'click', '#btnDetailPronas', function () {
        var data = tblPronas.row( $( this ).parents( 'tr' ) ).data();
        $( '.btnSaveProgram' ).removeClass( 'addProgram' );
        $( '.btnSaveProgram' ).addClass( 'editProgram' );
        $( '#id_prognas' ).val( data.id_prognas );
        $( '#status_data_program' ).val( data.status_data );
        $( '#uraian_program' ).val( data.uraian_program_nasional );
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
            url: './pronas/editPronas',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'uraian_program': $( '#uraian_program' ).val(),
                'id_prognas': $( '#id_prognas' ).val(),
                'status_data': getStatusProgram(),
            },
            success: function ( data ) {
                tblPronas.ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            },
        } );
    } );

    $( document ).on( 'click', '#btnHapusPronas', function () {
        var data = tblPronas.row( $( this ).parents( 'tr' ) ).data();
        $( '#id_prognas_hapus' ).val( data.id_prognas );
        $( '#uraian_program_hapus' ).text( data.uraian_program_nasional );
        $( '#HapusProgram' ).modal( 'show' );
    } );

    $( document ).on( 'click', '#btnDelProgram', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );
        $.ajax( {
            type: 'post',
            url: './pronas/hapusPronas',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_prognas': $( '#id_prognas_hapus' ).val(),
            },
            success: function ( data ) {
                $( '#HapusMapping' ).modal( 'hide' );
                tblPronas.ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            }
        } );
    } );

    $( document ).on( 'click', '#btnTambahMapping', function () {
        $( '.btnSaveMapping' ).addClass( 'addMapping' );
        $( '.btnSaveMapping' ).removeClass( 'editMapping' );
        $( '#id_mapping' ).val( null );
        $( '#id_jenis_mapping' ).val( id_prognas_temp );
        $( '#uraian_program_mapping' ).val( $( '#ur_pronas_mapping' ).text() );
        $( '#urusan_mapping' ).val( -1 ).trigger( 'change' );
        $( '#bidang_mapping' ).val( -1 ).trigger( 'change' );
        $( '#prog_mapping' ).val( -1 ).trigger( 'change' );
        $( '#keg_mapping' ).val( -1 ).trigger( 'change' );
        $( '#subkeg_mapping' ).val( -1 ).trigger( 'change' );
        $( '.form-horizontal' ).show();
        $( '#ModalMapping' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.addMapping', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );
        $.ajax( {
            type: 'post',
            url: './pronas/addMapping',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_prognas': id_prognas_temp,
                'id_program': $( '#prog_mapping' ).val(),
                'id_kegiatan': $( '#keg_mapping' ).val(),
                'id_sub_kegiatan': $( '#subkeg_mapping' ).val(),
            },
            success: function ( data ) {
                tblMappingSpm.ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            },
        } );
    } );

    $( document ).on( 'click', '#btnDetailMapping', function () {
        var data = tblMappingSpm.row( $( this ).parents( 'tr' ) ).data();
        $( '.btnSaveMapping' ).removeClass( 'addMapping' );
        $( '.btnSaveMapping' ).addClass( 'editMapping' );
        $( '#id_mapping' ).val( data.id_pronas_mapping );
        $( '#id_prognas_mapping' ).val( id_prognas_temp );
        $( '#uraian_program_mapping' ).val( $( '#ur_pronas_mapping' ).text() );
        $( '#urusan_mapping' ).val( data.kd_urusan ).trigger( 'change' );
        $( '#bidang_mapping' ).val( data.bidang ).trigger( 'change' );
        $( '#prog_mapping' ).val( data.id_program ).trigger( 'change' );
        $( '#keg_mapping' ).val( data.id_kegiatan ).trigger( 'change' );
        $( '#subkeg_mapping' ).val( data.id_sub_kegiatan ).trigger( 'change' );
        $( '.form-horizontal' ).show();
        $( '#ModalMapping' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.editMapping', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );
        $.ajax( {
            type: 'post',
            url: './pronas/editMapping',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_pronas_mapping': $( '#id_mapping' ).val(),
                'id_program': $( '#prog_mapping' ).val(),
                'id_kegiatan': $( '#keg_mapping' ).val(),
                'id_sub_kegiatan': $( '#subkeg_mapping' ).val(),
            },
            success: function ( data ) {
                tblMappingSpm.ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            },
        } );
    } );

    $( document ).on( 'click', '#btnHapusMapping', function () {
        var data = tblMappingSpm.row( $( this ).parents( 'tr' ) ).data();
        $( '#id_spm_jenis_hapus' ).val( data.id_pronas_mapping );
        $( '#uraian_jenis_hapus' ).text( data.uraian_kegiatan );
        $( '#HapusMapping' ).modal( 'show' );
    } );

    $( document ).on( 'click', '#btnDelMapping', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );
        $.ajax( {
            type: 'post',
            url: './pronas/hapusMapping',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_pronas_mapping': $( '#id_spm_jenis_hapus' ).val(),
            },
            success: function ( data ) {
                $( '#HapusMapping' ).modal( 'hide' );
                tblMappingSpm.ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            }
        } );
    } );

} ); //end file