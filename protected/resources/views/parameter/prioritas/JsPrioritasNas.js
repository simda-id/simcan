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

    $( ".disabled" ).click( function ( e ) {
        e.preventDefault();
        return false;
    } );

    $( '#prosesbar' ).hide();
    $( '#btnAddPrioritas' ).show();
    $( '#btnSavePrioritas' ).hide();
    $( '#btnCancelPrioritas' ).hide();

    $( '.number' ).number( true, 0, '', '' );

    $( '.display' ).DataTable( {
        dom: 'BfRtip',
        autoWidth: false,
        bDestroy: true
    } );

    var prioritas_tbl;
    var urusan_tbl;

    $.ajax( {
        type: "GET",
        url: '../admin/parameter/getUrusan',
        dataType: "json",

        success: function ( data ) {

            var j = data.length;
            var post, i;

            $( 'select[name="kd_urusan"]' ).empty();
            $( 'select[name="kd_urusan"]' ).append( '<option value="-1">---Pilih Urusan Pemerintahan---</option>' );

            for ( i = 0; i < j; i++ ) {
                post = data[ i ];
                $( 'select[name="kd_urusan"]' ).append( '<option value="' + post.kd_urusan + '">' + post.nm_urusan + '</option>' );
            }
        }
    } );

    $( ".kd_urusan" ).change( function () {
        $.ajax( {
            type: "GET",
            url: '../admin/parameter/getBidang/' + $( '.kd_urusan' ).val(),
            dataType: "json",

            success: function ( data ) {
                var j = data.length;
                var post, i;

                $( 'select[name="id_bidang_urusan"]' ).empty();
                $( 'select[name="id_bidang_urusan"]' ).append( '<option value="-1">---Pilih Kode Bidang---</option>' );

                for ( i = 0; i < j; i++ ) {
                    post = data[ i ];
                    $( 'select[name="id_bidang_urusan"]' ).append( '<option value="' + post.id_bidang + '">' + post.nm_bidang + '</option>' );
                }
            }
        } );
    } );

    prioritas_tbl = $( '#tblPrioritas' ).DataTable( {
        processing: true,
        serverSide: true,
        responsive: true,
        dom: 'bfrtip',
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
        "ajax": { "url": "./getProgramNas" },
        "columns": [
            { data: 'no_urut', sClass: "dt-center", width: "10%" },
            { data: 'uraian_program_nasional', sClass: "dt-left" },
            { data: 'action', 'searchable': false, width: "10%", 'orderable': false, sClass: "dt-center" }
        ],
        "order": [ [ 0, 'asc' ] ],
    } );

    $( '#tblPrioritas tbody' ).on( 'dblclick', 'tr', function () {

        var data = prioritas_tbl.row( this ).data();

        $( '#uraian_program_urusan' ).text( data.uraian_program_nasional );
        $( '#id_progprov_urs' ).val( data.id_prognas );

        $( '.nav-tabs a[href="#bidang_prioritas"]' ).tab( 'show' );
        LoadListUrusan( data.id_prognas );

    } );

    function LoadListUrusan ( id_bidang ) {
        urusan_tbl = $( '#tblUrusan' ).DataTable( {
            processing: true,
            serverSide: true,
            responsive: true,
            dom: 'bfrtip',
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
            "ajax": { "url": "./getUrusanNas?id_prognas=" + id_bidang },
            "columns": [
                { data: 'no_urut', 'searchable': false, 'orderable': false, sClass: "dt-center", width: "10%" },
                { data: 'nm_urusan', sClass: "dt-left" },
                { data: 'nm_bidang', sClass: "dt-left" },
                { data: 'action', 'searchable': false, width: "10%", 'orderable': false, sClass: "dt-center" }
            ],
            "order": [ [ 0, 'asc' ] ],
        } );
    }

    $( document ).on( 'click', '#btnAddPrioritas', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        if ( $.trim( $( '#uraian_program_provinsi' ).val() ).length > 11 ) {
            $.ajax( {
                type: 'post',
                url: './addProgramNas',
                data: {
                    '_token': $( 'input[name=_token]' ).val(),
                    'uraian_program_nasional': $( '#uraian_program_provinsi' ).val(),
                },
                success: function ( data ) {
                    prioritas_tbl.ajax.reload( null, false );
                    prioritas_tbl.page( 'last' ).draw( 'page' );
                    $( '#uraian_program_provinsi' ).val( null );
                    $( '#id_prioritas' ).val( null );
                    $( '#id_progprov' ).val( null );
                    $( '#btnAddPrioritas' ).show();
                    $( '#btnSavePrioritas' ).hide();
                    $( '#btnCancelPrioritas' ).hide();
                    if ( data.status_pesan == 1 ) {
                        createPesan( data.pesan, "success" );
                    } else {
                        createPesan( data.pesan, "danger" );
                    }
                }
            } );
        } else {
            createPesan( "Uraian Prioritas Nasional masih kosong/kurang dari 10 karakater", "danger" );
        };
    } );

    $( document ).on( 'click', '#btnEditProgram', function () {
        var data = prioritas_tbl.row( $( this ).parents( 'tr' ) ).data();
        $( '#uraian_program_provinsi' ).val( data.uraian_program_nasional );
        $( '#id_prioritas' ).val( data.id_prioritas );
        $( '#id_progprov' ).val( data.id_prognas );
        $( '#btnAddPrioritas' ).hide();
        $( '#btnSavePrioritas' ).show();
        $( '#btnCancelPrioritas' ).show();
    } );

    $( document ).on( 'click', '#btnSavePrioritas', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        if ( $.trim( $( '#uraian_program_provinsi' ).val() ).length > 11 ) {
            $.ajax( {
                type: 'post',
                url: './editProgramNas',
                data: {
                    '_token': $( 'input[name=_token]' ).val(),
                    'id_prognas': $( '#id_progprov' ).val(),
                    'uraian_program_nasional': $( '#uraian_program_provinsi' ).val(),
                },
                success: function ( data ) {
                    prioritas_tbl.ajax.reload( null, false );
                    prioritas_tbl.page( 'last' ).draw( 'page' );
                    $( '#uraian_program_provinsi' ).val( null );
                    $( '#id_prioritas' ).val( null );
                    $( '#id_progprov' ).val( null );
                    $( '#btnAddPrioritas' ).show();
                    $( '#btnSavePrioritas' ).hide();
                    $( '#btnCancelPrioritas' ).hide();
                    if ( data.status_pesan == 1 ) {
                        createPesan( data.pesan, "success" );
                    } else {
                        createPesan( data.pesan, "danger" );
                    }
                }
            } );
        } else {
            createPesan( "Uraian Prioritas Nasional masih kosong/kurang dari 10 karakater", "danger" );
        };
    } );

    $( document ).on( 'click', '#btnCancelPrioritas', function () {
        $( '#uraian_program_provinsi' ).val( null );
        $( '#id_prioritas' ).val( null );
        $( '#id_progprov' ).val( null );
        $( '#btnAddPrioritas' ).show();
        $( '#btnSavePrioritas' ).hide();
        $( '#btnCancelPrioritas' ).hide();
    } );

    $( document ).on( 'click', '#btnHapusProgram', function () {
        var data = prioritas_tbl.row( $( this ).parents( 'tr' ) ).data();
        $( '.btnHapus' ).addClass( 'delProgram' );
        $( '.btnHapus' ).removeClass( 'delBidang' );
        $( '.modal-title' ).text( 'Hapus Data Program Prioritas Nasional' );
        $( '.id_ssh_hapus' ).text( data.id_prognas );
        $( '.uraianx' ).html( 'Yakin akan menghapus Program Prioritas : ' );
        $( '.uraian' ).html( data.uraian_program_nasional );
        $( '#ModalHapus' ).modal( 'show' );
    } )

    $( '.modal-footer' ).on( 'click', '.delProgram', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './hapusProgramNas',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_prognas': $( '.id_ssh_hapus' ).text()
            },
            success: function ( data ) {
                prioritas_tbl.ajax.reload( null, false );
                prioritas_tbl.page( 'last' ).draw( 'page' );
                $( '#uraian_program_provinsi' ).val( null );
                $( '#id_prioritas' ).val( null );
                $( '#id_progprov' ).val( null );
                $( '#btnAddPrioritas' ).show();
                $( '#btnSavePrioritas' ).hide();
                $( '#btnCancelPrioritas' ).hide();
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            }
        } );
    } );

    $( document ).on( 'click', '#btnAddBidang', function () {
        $( '.btnUrusan' ).addClass( 'addUrusan' );
        $( '.btnUrusan' ).removeClass( 'editUrusan' );
        $( '.modal-title' ).text( 'Urusan dan Bidang Pemerintahan' );
        $( '.form-horizontal' ).show();
        $( '#id_progprov_urusan' ).val( null );
        $( '#kd_urusan' ).val( -1 ).trigger( 'change' );
        $( '#id_bidang_urusan' ).val( -1 ).trigger( 'change' );
        $( '#cb_lingkup_program' ).val( 0 ).trigger( 'change' );
        $( '#ur_jenis_rekening' ).val( null );
        $( '#ref_rek_1' ).val( 0 );
        $( '#ref_rek_2' ).val( 0 );
        $( '#ref_rek_3' ).val( 0 );
        $( '#ModalUrusan' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.addUrusan', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './addUrusanNas',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_prognas': $( '#id_progprov_urs' ).val(),
                'id_bidang': $( '#id_bidang_urusan' ).val(),
                'ref_rek_1': $( '#ref_rek_1' ).val(),
                'ref_rek_2': $( '#ref_rek_2' ).val(),
                'ref_rek_3': $( '#ref_rek_3' ).val(),
                'lingkup_program': $( '#cb_lingkup_program' ).val(),
            },
            success: function ( data ) {
                urusan_tbl.ajax.reload( null, false );
                urusan_tbl.page( 'last' ).draw( 'page' );
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            }
        } );
    } );

    $( document ).on( 'click', '#btnEditBidang', function () {
        var data = urusan_tbl.row( $( this ).parents( 'tr' ) ).data();
        $.ajax( {
            type: "GET",
            url: '../admin/parameter/getBidang/' + data.kd_urusan,
            dataType: "json",

            success: function ( data ) {
                var j = data.length;
                var post, i;

                $( 'select[name="id_bidang_urusan"]' ).empty();
                $( 'select[name="id_bidang_urusan"]' ).append( '<option value="-1">---Pilih Kode Bidang---</option>' );

                for ( i = 0; i < j; i++ ) {
                    post = data[ i ];
                    $( 'select[name="id_bidang_urusan"]' ).append( '<option value="' + post.id_bidang + '">' + post.nm_bidang + '</option>' );
                }
            }
        } );

        $( '.btnUrusan' ).removeClass( 'addUrusan' );
        $( '.btnUrusan' ).addClass( 'editUrusan' );
        $( '.modal-title' ).text( 'Urusan dan Bidang Pemerintahan' );
        $( '.form-horizontal' ).show();
        $( '#id_progprov_urusan' ).val( data.id_prognas_urusan );
        $( '#kd_urusan' ).val( data.kd_urusan ).trigger( 'change' );
        $( '#id_bidang_urusan' ).val( data.id_bidang ).trigger( 'change' );
        $( '#cb_lingkup_program' ).val( data.lingkup_program ).trigger( 'change' )
        $( '#ur_jenis_rekening' ).val( data.nama_kd_rek_3 );
        $( '#ref_rek_1' ).val( data.ref_rek_1 );
        $( '#ref_rek_2' ).val( data.ref_rek_2 );
        $( '#ref_rek_3' ).val( data.ref_rek_3 );
        $( '#ModalUrusan' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.editUrusan', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './editUrusanNas',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_prognas_urusan': $( '#id_progprov_urusan' ).val(),
                'id_bidang': $( '#id_bidang_urusan' ).val(),
                'ref_rek_1': $( '#ref_rek_1' ).val(),
                'ref_rek_2': $( '#ref_rek_2' ).val(),
                'ref_rek_3': $( '#ref_rek_3' ).val(),
                'lingkup_program': $( '#cb_lingkup_program' ).val(),
            },
            success: function ( data ) {
                urusan_tbl.ajax.reload( null, false );
                urusan_tbl.page( 'last' ).draw( 'page' );
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            }
        } );
    } );

    $( document ).on( 'click', '#btnHapusBidang', function () {
        var data = urusan_tbl.row( $( this ).parents( 'tr' ) ).data();
        $( '.btnHapus' ).removeClass( 'delProgram' );
        $( '.btnHapus' ).addClass( 'delBidang' );
        $( '.modal-title' ).text( 'Hapus Data Urusan Program Prioritas Nasional' );
        $( '.id_ssh_hapus' ).text( data.id_prognas_urusan );
        $( '.uraianx' ).html( 'Yakin akan menghapus Urusan Program Prioritas : ' );
        $( '.uraian' ).html( data.nm_bidang );
        $( '#ModalHapus' ).modal( 'show' );
    } )

    $( '.modal-footer' ).on( 'click', '.delBidang', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './hapusUrusanNas',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_prognas_urusan': $( '.id_ssh_hapus' ).text()
            },
            success: function ( data ) {
                urusan_tbl.ajax.reload( null, false );
                urusan_tbl.page( 'last' ).draw( 'page' );
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            }
        } );
    } );

    $( document ).on( 'click', '#btnProsesUpdate', function () {
        var data = prioritas_tbl.row( $( this ).parents( 'tr' ) ).data();
        $.ajax( {
            type: "GET",
            url: '../sshperkada/getDokumenTransaksi',
            dataType: "json",
            success: function ( data ) {
                var j = data.length;
                var post, i;
                $( 'select[name="no_dokumen_update"]' ).empty();
                $( 'select[name="no_dokumen_update"]' ).append( '<option value="-1">---Pilih Nomor Dokumen Transaksi---</option>' );
                for ( i = 0; i < j; i++ ) {
                    post = data[ i ];
                    $( 'select[name="no_dokumen_update"]' ).append( '<option value="' + post.id_dokumen_keu + '">' + post.uraian_display + '</option>' );
                }
            }
        } );

        $( '.form-horizontal' ).show();
        $( '#id_prognas_update' ).val( data.id_prognas );
        $( '#ModalProses' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.btnProses', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './prosesUpdateNas',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_prognas': $( '#id_prognas_update' ).val(),
                'id_dokumen_keu': $( '#no_dokumen_update' ).val(),
            },
            success: function ( data ) {
                $( '#ModalProses' ).modal( 'hide' );
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "alert" );
                }
            }
        } );
    } );

    var tblRekening;
    function loadRek3 () {
        tblRekening = $( '#tblRek3' ).DataTable( {
            processing: true,
            serverSide: true,
            dom: 'BfrtIp',
            autoWidth: false,
            "ajax": { "url": "./getJenisRekening" },
            "columns": [
                { data: 'no_urut', sClass: "dt-center" },
                { data: 'kode_rekening', sClass: "dt-center" },
                { data: 'nama_kd_rek_3' },
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } );
    };

    $( document ).on( 'click', '#btnCariRek3', function () {
        $( '#cariRekening3' ).modal( 'show' );
        loadRek3();
    } );

    $( '#tblRek3 tbody' ).on( 'dblclick', 'tr', function () {
        var data = tblRekening.row( this ).data();
        document.getElementById( "ur_jenis_rekening" ).value = data.nama_kd_rek_3;
        document.getElementById( "ref_rek_1" ).value = data.kd_rek_1;
        document.getElementById( "ref_rek_2" ).value = data.kd_rek_2;
        document.getElementById( "ref_rek_3" ).value = data.kd_rek_3;
        $( '#cariRekening3' ).modal( 'hide' );
    } );

    $( ".cb_lingkup_program" ).change( function () {
        if ( $( '#cb_lingkup_program' ).val() == 3 ) {
            $( '#divRekening' ).show();
            $( '#divUrusan' ).hide();
            $( '#divBidang' ).hide();
            $( '#kd_urusan' ).val( 0 ).trigger( 'change' );
            $( '#id_bidang_urusan' ).val( 0 ).trigger( 'change' );
        } else {
            $( '#divRekening' ).hide();
            $( '#divUrusan' ).show();
            $( '#divBidang' ).show();
        }

    } );

} );