
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
        }, 3500 );
    };

    $( '.page-alert .close' ).click( function ( e ) {
        e.preventDefault();
        $( this ).closest( '.page-alert' ).slideUp();
    } );

    $( '.number' ).number( true, 4, ',', '.' );

    $( '.display' ).DataTable( {
        dom: 'BfRtip',
        autoWidth: false,
        bDestroy: true
    } );

    $.ajax( {
        type: "GET",
        url: './getRefSatuan',
        dataType: "json",
        success: function ( data ) {

            var j = data.length;
            var post, i;

            $( 'select[name="satuan_panjang"]' ).empty();
            $( 'select[name="satuan_panjang"]' ).append( '<option value="-1">---Pilih Satuan---</option>' );

            $( 'select[name="satuan_lebar"]' ).empty();
            $( 'select[name="satuan_lebar"]' ).append( '<option value="-1">---Pilih Satuan---</option>' );

            $( 'select[name="satuan_luas"]' ).empty();
            $( 'select[name="satuan_luas"]' ).append( '<option value="-1">---Pilih Satuan---</option>' );

            for ( i = 0; i < j; i++ ) {
                post = data[ i ];
                $( 'select[name="satuan_panjang"]' ).append( '<option value="' + post.id_satuan + '">' + post.uraian_satuan + '</option>' );
                $( 'select[name="satuan_lebar"]' ).append( '<option value="' + post.id_satuan + '">' + post.uraian_satuan + '</option>' );
                $( 'select[name="satuan_luas"]' ).append( '<option value="' + post.id_satuan_publik + '">' + post.uraian_satuan + '</option>' );
            }

        }
    } );

    var lokasi_tbl = $( '#tblLokasi' ).DataTable( {
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
        "ajax": { "url": "./lokasi/getListLokasi" },
        "columns": [
            { data: 'no_urut', 'searchable': false, 'orderable': false, sClass: "dt-center", width: "5%" },
            { data: 'nama_lokasi', sClass: "dt-left" },
            { data: 'lokasi_display', sClass: "dt-center", width: "15%" },
            { data: 'keterangan_lokasi', sClass: "dt-center", width: "40%" },
            { data: 'action', 'searchable': false, width: "10%", 'orderable': false, sClass: "dt-center" }
        ],
        "order": [ [ 0, 'asc' ] ],
    } );

    $( document ).on( 'click', '#btnImportLokasi', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $( '#ModalProgress' ).modal( 'show' );
        $.ajax( {
            type: 'POST',
            url: './lokasi/insertWilayah',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
            },
            success: function ( data ) {
                createPesan( data.pesan, "success" );
                $( '#tblLokasi' ).DataTable().ajax.reload();
                $( '#ModalProgress' ).modal( 'hide' );
            },
            error: function ( data ) {
                createPesan( data.pesan, "danger" );
                $( '#tblLokasi' ).DataTable().ajax.reload();
                $( '#ModalProgress' ).modal( 'hide' );
            }
        } );
    } );

    $( document ).on( 'click', '#btnTambahLokasi', function () {
        $( '.btnLokasi' ).removeClass( 'edit' );
        $( '.btnLokasi' ).addClass( 'add' );
        $( '.modal-title' ).text( 'Tambah Referensi Lokasi' );
        $( '.form-horizontal' ).show();

        $.ajax( {
            type: "GET",
            url: './lokasi/getJenisLokasi',
            dataType: "json",

            success: function ( data ) {
                var j = data.length;
                var post, i;

                $( 'select[name="jenis_lokasi"]' ).empty();

                for ( i = 0; i < j; i++ ) {
                    post = data[ i ];
                    $( 'select[name="jenis_lokasi"]' ).append( '<option value="' + post.id_jenis + '">' + post.nm_jenis + '</option>' );
                }
            }
        } );

        $( '#id_lokasi' ).val( null );
        $( '#id_desa' ).val( null );
        $( '#jenis_lokasi' ).val( 99 );
        $( '#nama_lokasi' ).val( null );
        $( '#keterangan_lokasi' ).val( null );
        $( '#panjang' ).val( 0 );
        $( '#lebar' ).val( 0 );
        $( '#luasan_kawasan' ).val( 0 );
        $( '#satuan_panjang' ).val( -1 );
        $( '#satuan_lebar' ).val( -1 );
        $( '#satuan_luas' ).val( -1 );

        $( '#jenis_lokasi' ).removeAttr( "disabled" );
        $( '#nama_lokasi' ).removeAttr( "disabled" );
        document.getElementById( "divAtribut" ).style.visibility = 'visible';

        $( '#ModalLokasi' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.add', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './lokasi/addLokasi',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'jenis_lokasi': $( '#jenis_lokasi' ).val(),
                'nama_lokasi': $( '#nama_lokasi' ).val(),
                'id_desa': $( '#id_desa' ).val(),
                'luasan_kawasan': $( '#luasan_kawasan' ).val(),
                'satuan_luas': $( '#satuan_luas' ).val(),
                'panjang': $( '#panjang' ).val(),
                'satuan_panjang': $( '#satuan_panjang' ).val(),
                'lebar': $( '#lebar' ).val(),
                'satuan_lebar': $( '#satuan_lebar' ).val(),
                'keterangan_lokasi': $( '#keterangan_lokasi' ).val(),
            },
            success: function ( data ) {
                $( '#tblLokasi' ).DataTable().ajax.reload();
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            },
        } );
    } );

    $( '#tblLokasi tbody' ).on( 'dblclick', 'tr', function () {

        var data = lokasi_tbl.row( this ).data();

        $( '.btnLokasi' ).removeClass( 'edit' );
        $( '.btnLokasi' ).addClass( 'add' );
        $( '.modal-title' ).text( 'Edit Referensi Lokasi' );
        $( '.form-horizontal' ).show();
        $( '#id_lokasi' ).val( data.id_lokasi );
        $( '#id_desa' ).val( data.id_desa );
        $( '#jenis_lokasi' ).val( data.jenis_lokasi );
        $( '#nama_lokasi' ).val( data.nama_lokasi );
        $( '#keterangan_lokasi' ).val( data.keterangan_lokasi );
        $( '#panjang' ).val( data.panjang );
        $( '#lebar' ).val( data.lebar );
        $( '#luasan_kawasan' ).val( data.luasan_kawasan );
        $( '#satuan_panjang' ).val( data.satuan_panjang );
        $( '#satuan_lebar' ).val( data.satuan_lebar );
        $( '#satuan_luas' ).val( data.satuan_luas );

        if ( data.jenis_lokasi == 0 ) {
            $( '#jenis_lokasi' ).attr( 'disabled', 'disabled' );
            $( '#nama_lokasi' ).attr( 'disabled', 'disabled' );
            document.getElementById( "divAtribut" ).style.visibility = 'hidden';
        } else {
            $( '#jenis_lokasi' ).removeAttr( "disabled" );
            $( '#nama_lokasi' ).removeAttr( "disabled" );
            document.getElementById( "divAtribut" ).style.visibility = 'visible';
        }

        $( '#ModalLokasi' ).modal( 'show' );

    } );

    //edit function
    $( document ).on( 'click', '#btnEditLokasi', function () {

        var data = lokasi_tbl.row( $( this ).parents( 'tr' ) ).data();

        $( '.btnLokasi' ).removeClass( 'add' );
        $( '.btnLokasi' ).addClass( 'edit' );
        $( '.modal-title' ).text( 'Edit Referensi Lokasi' );
        $( '.form-horizontal' ).show();
        $( '#id_lokasi' ).val( data.id_lokasi );
        $( '#id_desa' ).val( data.id_desa );
        $( '#jenis_lokasi' ).val( data.jenis_lokasi );
        $( '#nama_lokasi' ).val( data.nama_lokasi );
        $( '#keterangan_lokasi' ).val( data.keterangan_lokasi );
        $( '#panjang' ).val( data.panjang );
        $( '#lebar' ).val( data.lebar );
        $( '#luasan_kawasan' ).val( data.luasan_kawasan );
        $( '#satuan_panjang' ).val( data.satuan_panjang );
        $( '#satuan_lebar' ).val( data.satuan_lebar );
        $( '#satuan_luas' ).val( data.satuan_luas );

        if ( data.jenis_lokasi == 0 ) {
            $( '#jenis_lokasi' ).attr( 'disabled', 'disabled' );
            $( '#nama_lokasi' ).attr( 'disabled', 'disabled' );
            document.getElementById( "divAtribut" ).style.visibility = 'hidden';
        } else {
            $( '#jenis_lokasi' ).removeAttr( "disabled" );
            $( '#nama_lokasi' ).removeAttr( "disabled" );
            document.getElementById( "divAtribut" ).style.visibility = 'visible';
        }

        $( '#ModalLokasi' ).modal( 'show' );
    } );


    $( '.modal-footer' ).on( 'click', '.edit', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './lokasi/editLokasi',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_lokasi': $( '#id_lokasi' ).val(),
                'jenis_lokasi': $( '#jenis_lokasi' ).val(),
                'nama_lokasi': $( '#nama_lokasi' ).val(),
                'id_desa': $( '#id_desa' ).val(),
                'luasan_kawasan': $( '#luasan_kawasan' ).val(),
                'satuan_luas': $( '#satuan_luas' ).val(),
                'panjang': $( '#panjang' ).val(),
                'satuan_panjang': $( '#satuan_panjang' ).val(),
                'lebar': $( '#lebar' ).val(),
                'satuan_lebar': $( '#satuan_lebar' ).val(),
                'keterangan_lokasi': $( '#keterangan_lokasi' ).val(),

            },
            success: function ( data ) {
                $( '#tblLokasi' ).DataTable().ajax.reload();
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            }
        } );
    } );

    var jenis_tbl = $( '#tblJenisLokasi' ).DataTable( {
        processing: true,
        serverSide: true,
        // dom : 'BfRtip',                  
        autoWidth: false,
        "ajax": { "url": "./lokasi/getDataJenis" },
        "language": {
            "decimal": ",",
            "thousands": "."
        },
        "columns": [
            { data: 'no_urut', 'searchable': false, 'orderable': false, sClass: "dt-center", width: "5%" },
            { data: 'nm_jenis', sClass: "dt-left" },
            { data: 'action', 'searchable': false, width: "10%", 'orderable': false, sClass: "dt-center" }
        ],
        "order": [ [ 0, 'asc' ] ],
        "bDestroy": true
    } );
    //delete function
    $( document ).on( 'click', '#btnHapusLokasi', function () {

        var data = lokasi_tbl.row( $( this ).parents( 'tr' ) ).data();

        if ( data.id_lokasi == 1 || data.id_lokasi == 2 ) {
            createPesan( "Maaf Lokasi Standar Aplikasi tidak dapat dihapus", "danger" );
        } else {
            if ( data.jenis_lokasi == 0 ) {
                createPesan( "Maaf Lokasi Kewilayahan hasil import tidak dapat dihapus", "danger" );
            } else {
                $( '.actionBtn' ).addClass( 'delete' );
                $( '.modal-title' ).text( 'Hapus Referensi lokasi' );
                $( '.form-horizontal' ).hide();
                $( '#id_lokasi_hapus' ).val( data.id_lokasi );
                $( '#nm_lokasi_hapus' ).html( data.nama_lokasi );
                $( '#HapusModal' ).modal( 'show' );
            }
        }

    } );

    $( '.modal-footer' ).on( 'click', '.delete', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './lokasi/hapusLokasi',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_lokasi': $( '#id_lokasi_hapus' ).val(),
            },
            success: function ( data ) {
                $( '.item' + $( '.id_lokasi_hapus' ).text() ).remove();
                $( '#tblLokasi' ).DataTable().ajax.reload();
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            }
        } );
    } );

    $( document ).on( 'click', '#btnAddJenis', function () {
        $( '.form-horizontal' ).show();

        jenis_tbl.ajax.reload();
        $( '#ModalJenis' ).modal( 'show' );
    } );

    $( document ).on( 'click', '#btnHapusJenis', function () {

        var data = jenis_tbl.row( $( this ).parents( 'tr' ) ).data();

        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './lokasi/hapusJenisLokasi',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_jenis': data.id_jenis,
            },
            success: function ( data ) {
                jenis_tbl.ajax.reload();
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                };
            }
        } );
    } );

    $( document ).on( 'click', '#btnJenis', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './lokasi/addJenisLokasi',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'nm_jenis': $( '#uraian_jenis' ).val(),
            },
            success: function ( data ) {
                jenis_tbl.ajax.reload();
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                };
            }
        } );
    } );

} );