$( document ).ready( function () {
    var akun_tbl, golongan_tbl, jenis_tbl, obyek_tbl, rincian_tbl;
    var subrincian_ref;

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

    rincian_tbl = $( '#tblSumberDana' ).DataTable( {
        processing: true,
        serverSide: true,
        dom: 'BfRtip',
        autoWidth: false,
        "ajax": { "url": "./mapping_sd90/getListRek1" },
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
            { data: 'no_urut', sClass: "dt-center", width: "10%" },
            { data: 'uraian_sumber_dana', sClass: "dt-left" },
            { data: 'kode_sd_6', sClass: "dt-center", width: "15%" },
            { data: 'uraian_sd_6', sClass: "dt-left" }
        ],
        "order": [ [ 0, 'asc' ] ],
        "bDestroy": true
    } );

    $( document ).on( 'click', '#btnTambahMapping', function () {
        var data = rincian_tbl.row( $( this ).parents( 'tr' ) ).data();
        $( '.btnSaveMapping' ).addClass( 'addMapping' );
        $( '.btnSaveMapping' ).removeClass( 'editMapping' );
        $( '#ur_sumberdana_13' ).text( data.uraian_sumber_dana );
        $( '#ur_sumberdana_90' ).text( '' );
        $( '#ur_kelompok_90' ).text( '' );
        $( '#ur_jenis_90' ).text( '' );
        $( '#ur_obyek_90' ).text( '' );
        $( '#ur_rincian_90' ).text( '' );
        $( '#ur_subrincian_90' ).text( '' );
        $( '#id_mapping_rek' ).val( null );
        $( '#id_sumberdana' ).val( data.id_sumber_dana );
        $( '#id_sd_6' ).val( null );
        $( '.form-horizontal' ).show();
        $( '#ModalMappingSub' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.addMapping', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );
        $.ajax( {
            type: 'post',
            url: './mapping_sd90/addRekeningMapping',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_sumberdana': $( '#id_sumberdana' ).val(),
                'id_sd_6': $( '#id_sd_6' ).val(),
            },
            success: function ( data ) {
                rincian_tbl.ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            },
        } );
    } );

    $( document ).on( 'click', '#btnDetailMapping', function () {
        var data = rincian_tbl.row( $( this ).parents( 'tr' ) ).data();
        $( '.btnSaveMapping' ).removeClass( 'addMapping' );
        $( '.btnSaveMapping' ).addClass( 'editMapping' );
        $( '#ur_sumberdana_13' ).text( data.uraian_sumber_dana );
        $( '#ur_sumberdana_90' ).text( '(' + data.kd_sd_1 + ') ' + data.uraian_sd_1 );
        $( '#ur_kelompok_90' ).text( '(' + data.kode_sd_2 + ') ' + data.uraian_sd_2 );
        $( '#ur_jenis_90' ).text( '(' + data.kode_sd_3 + ') ' + data.uraian_sd_3 );
        $( '#ur_obyek_90' ).text( '(' + data.kode_sd_4 + ') ' + data.uraian_sd_4 );
        $( '#ur_rincian_90' ).text( '(' + data.kode_sd_5 + ') ' + data.uraian_sd_5 );
        $( '#ur_subrincian_90' ).text( '(' + data.kode_sd_6 + ') ' + data.uraian_sd_6 );
        $( '#id_mapping_rek' ).val( data.id_mapping_rek );
        $( '#id_sumberdana' ).val( data.id_sumber_dana );
        $( '#id_sd_6' ).val( data.id_sd_6 );
        $( '.form-horizontal' ).show();
        $( '#ModalMappingSub' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.editMapping', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );
        $.ajax( {
            type: 'post',
            url: './mapping_sd90/editRekeningMapping',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_mapping_rek': $( '#id_mapping_rek' ).val(),
                'id_sumberdana': $( '#id_sumberdana' ).val(),
                'id_sd_6': $( '#id_sd_6' ).val(),
            },
            success: function ( data ) {
                rincian_tbl.ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            },
        } );
    } );

    $( document ).on( 'click', '#btnHapusMapping', function () {
        var data = rincian_tbl.row( $( this ).parents( 'tr' ) ).data();
        $( '#id_unit_hapus' ).val( data.id_mapping_rek );
        $( '#nm_unit_hapus' ).text( '(' + data.kode_sd_6 + ') ' + data.uraian_sd_6 );
        $( '#HapusMapping' ).modal( 'show' );
    } );

    $( document ).on( 'click', '#btnDeleteMapping', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );
        $.ajax( {
            type: 'post',
            url: './mapping_sd90/hapusRekeningMapping',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_mapping_rek': $( '#id_unit_hapus' ).val(),
            },
            success: function ( data ) {
                rincian_tbl.ajax.reload( null, false );
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
        $( '.nav-tabs a[href="#urusanRef"]' ).tab( 'show' );
        $( '#cariReferensi90' ).modal( 'show' );
    } );

    $.ajax( {
        type: "GET",
        url: 'mapping_sd90/getListRek1_90',
        dataType: "json",
        success: function ( data ) {
            var j = data.length;
            var post, i;
            $( 'select[name="id_akun_90"]' ).empty();
            $( 'select[name="id_akun_90"]' ).append( '<option value="-1">---Pilih Akun Sumberdana Permendagri 90---</option>' );
            for ( i = 0; i < j; i++ ) {
                post = data[ i ];
                $( 'select[name="id_akun_90"]' ).append( '<option value="' + post.id_sd_1 + '">' + post.kd_sd_1 + ' ' + post.uraian_sd_1 + '</option>' );
            }
        }
    } );

    $( ".id_akun_90" ).change( function () {
        $.ajax( {
            type: "GET",
            url: 'mapping_sd90/getListRek2_90/' + $( "#id_akun_90" ).val(),
            dataType: "json",
            success: function ( data ) {
                var j = data.length;
                var post, i;
                $( 'select[name="id_golongan_90"]' ).empty();
                $( 'select[name="id_golongan_90"]' ).append( '<option value="-1">---Pilih Golongan Sumberdana Permendagri 90---</option>' );
                for ( i = 0; i < j; i++ ) {
                    post = data[ i ];
                    $( 'select[name="id_golongan_90"]' ).append( '<option value="' + post.id_sd_2 + '">' + post.kode_sd_2 + ' ' + post.uraian_sd_2 + '</option>' );
                }
            }
        } );
    } );

    $( ".id_golongan_90" ).change( function () {
        $.ajax( {
            type: "GET",
            url: 'mapping_sd90/getListRek3_90/' + $( "#id_golongan_90" ).val(),
            dataType: "json",
            success: function ( data ) {
                var j = data.length;
                var post, i;
                $( 'select[name="id_jenis_90"]' ).empty();
                $( 'select[name="id_jenis_90"]' ).append( '<option value="-1">---Pilih Jenis Sumberdana Permendagri 90---</option>' );
                for ( i = 0; i < j; i++ ) {
                    post = data[ i ];
                    $( 'select[name="id_jenis_90"]' ).append( '<option value="' + post.id_sd_3 + '">' + post.kode_sd_3 + ' ' + post.uraian_sd_3 + '</option>' );
                }
            }
        } );
    } );

    $( ".id_jenis_90" ).change( function () {
        $.ajax( {
            type: "GET",
            url: 'mapping_sd90/getListRek4_90/' + $( "#id_jenis_90" ).val(),
            dataType: "json",
            success: function ( data ) {
                var j = data.length;
                var post, i;
                $( 'select[name="id_obyek_90"]' ).empty();
                $( 'select[name="id_obyek_90"]' ).append( '<option value="-1">---Pilih Obyek Sumberdana Permendagri 90---</option>' );
                for ( i = 0; i < j; i++ ) {
                    post = data[ i ];
                    $( 'select[name="id_obyek_90"]' ).append( '<option value="' + post.id_sd_4 + '">' + post.kode_sd_4 + ' ' + post.uraian_sd_4 + '</option>' );
                }
            }
        } );
    } );

    $( ".id_obyek_90" ).change( function () {
        $.ajax( {
            type: "GET",
            url: 'mapping_sd90/getListRek5_90/' + $( "#id_obyek_90" ).val(),
            dataType: "json",
            success: function ( data ) {
                var j = data.length;
                var post, i;
                $( 'select[name="id_rincian_90"]' ).empty();
                $( 'select[name="id_rincian_90"]' ).append( '<option value="-1">---Pilih Rincian Sumberdana Permendagri 90---</option>' );
                for ( i = 0; i < j; i++ ) {
                    post = data[ i ];
                    $( 'select[name="id_rincian_90"]' ).append( '<option value="' + post.id_sd_5 + '">' + post.kode_sd_5 + ' ' + post.uraian_sd_5 + '</option>' );
                }
            }
        } );
    } );

    $( ".id_rincian_90" ).change( function () {
        LoadListSubRincian( $( '#id_rincian_90' ).val() );
    } );

    function LoadListSubRincian ( id_rek5 ) {
        subrincian_ref = $( '#tblSubRincianRef' ).DataTable( {
            processing: true,
            serverSide: true,
            dom: 'BfRtip',
            autoWidth: false,
            "ajax": { "url": "./mapping_sd90/getListRek6_90/" + id_rek5 },
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
                { data: 'kode_sd_6', sClass: "dt-center", width: "15%" },
                { data: 'uraian_sd_6', sClass: "dt-left" },
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } );
    }

    $( document ).on( 'click', '#btnPilihRekening', function () {
        var data = subrincian_ref.row( $( this ).parents( 'tr' ) ).data();
        $( '#ur_sumberdana_90' ).text( '(' + data.kd_sd_1 + ') ' + data.uraian_sd_1 );
        $( '#ur_kelompok_90' ).text( '(' + data.kode_sd_2 + ') ' + data.uraian_sd_2 );
        $( '#ur_jenis_90' ).text( '(' + data.kode_sd_3 + ') ' + data.uraian_sd_3 );
        $( '#ur_obyek_90' ).text( '(' + data.kode_sd_4 + ') ' + data.uraian_sd_4 );
        $( '#ur_rincian_90' ).text( '(' + data.kode_sd_5 + ') ' + data.uraian_sd_5 );
        $( '#ur_subrincian_90' ).text( '(' + data.kode_sd_6 + ') ' + data.uraian_sd_6 );
        $( '#id_sd_6' ).val( data.id_sd_6 );
        $( '#cariReferensi90' ).modal( 'hide' );
    } );

    $( '#tblSubRincianRef tbody' ).on( 'dblclick', 'tr', function () {
        var data = subrincian_ref.row( this ).data();
        $( '#ur_sumberdana_90' ).text( '(' + data.kd_sd_1 + ') ' + data.uraian_sd_1 );
        $( '#ur_kelompok_90' ).text( '(' + data.kode_sd_2 + ') ' + data.uraian_sd_2 );
        $( '#ur_jenis_90' ).text( '(' + data.kode_sd_3 + ') ' + data.uraian_sd_3 );
        $( '#ur_obyek_90' ).text( '(' + data.kode_sd_4 + ') ' + data.uraian_sd_4 );
        $( '#ur_rincian_90' ).text( '(' + data.kode_sd_5 + ') ' + data.uraian_sd_5 );
        $( '#ur_subrincian_90' ).text( '(' + data.kode_sd_6 + ') ' + data.uraian_sd_6 );
        $( '#id_sd_6' ).val( data.id_sd_6 );
        $( '#cariReferensi90' ).modal( 'hide' );
    } );

    $( document ).on( 'click', '#btnCetakMapping', function () {
        vars = "?token=" + $( 'input[name=_token]' ).val();
        window.open( './mapping_sd90/CetakMapping' + vars, '_blank' );
    } );

} ); //end file