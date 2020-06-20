$( document ).ready( function () {

    var template = Handlebars.compile( $( "#details-golongan" ).html() );

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

    function back2Rek2 () {
        $( '.nav-tabs a[href="#tabrek12"]' ).tab( 'show' );
    }

    $( document ).on( 'click', '.backRek2', function () {
        back2Rek2();
    } );

    $( document ).on( 'dblclick', '.backRek2', function () {
        back2Rek2();
    } );

    function back2Rek3 () {
        $( '.nav-tabs a[href="#tabrek3"]' ).tab( 'show' );
    }

    $( document ).on( 'click', '.backRek3', function () {
        back2Rek3();
    } );

    $( document ).on( 'dblclick', '.backRek3', function () {
        back2Rek3();
    } );

    function back2Rek4 () {
        $( '.nav-tabs a[href="#tabrek4"]' ).tab( 'show' );
    }

    $( document ).on( 'click', '.backRek4', function () {
        back2Rek4();
    } );

    $( document ).on( 'dblclick', '.backRek4', function () {
        back2Rek4();
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

    akun_tbl = $( '#tblAkun' ).DataTable( {
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
        "ajax": { "url": "./mapping_rek90/getListRek1" },
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
        golongan_tbl = $( '#' + tableId ).DataTable( {
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
                { data: 'nama_kd_rek_2', name: 'nama_kd_rek_2' }
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } )

        $( '#' + tableId + '  tbody' ).on( 'click', 'tr', function () {
            var data = golongan_tbl.row( this ).data();
            kd_rek1_temp13 = data.kd_rek_1;
            kd_rek2_temp13 = data.kd_rek_2;
            $( '#ur_akun_rek3' ).text( data.kd_rek_1 + ' ' + data.nama_kd_rek_1 );
            $( '#ur_gol_rek3' ).text( data.kode_rek2 + ' ' + data.nama_kd_rek_2 );
            $( '.nav-tabs a[href="#tabrek3"]' ).tab( 'show' );
            loadTblJenis( kd_rek1_temp13, kd_rek2_temp13 );
        } );
    }

    $( '#tblAkun tbody' ).on( 'click', 'td.details-control', function () {
        var tr = $( this ).closest( 'tr' );
        var row = akun_tbl.row( tr );
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

    function loadTblJenis ( kd_rek_1, kd_rek_2 ) {
        jenis_tbl = $( '#tblJenis' ).DataTable( {
            processing: true,
            serverSide: true,
            dom: 'BfRtip',
            autoWidth: false,
            "ajax": { "url": "./mapping_rek90/getListRek3/" + kd_rek_1 + "/" + kd_rek_2 },
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

    $( '#tblJenis tbody' ).on( 'dblclick', 'tr', function () {
        var data = jenis_tbl.row( this ).data();
        kd_rek1_temp13 = data.kd_rek_1;
        kd_rek2_temp13 = data.kd_rek_2;
        kd_rek3_temp13 = data.kd_rek_3;
        $( '#ur_akun_rek4' ).text( data.kd_rek_1 + ' ' + data.nama_kd_rek_1 );
        $( '#ur_gol_rek4' ).text( data.kode_rek2 + ' ' + data.nama_kd_rek_2 );
        $( '#ur_jenis_rek4' ).text( data.kode_rek3 + ' ' + data.nama_kd_rek_3 );
        $( '.nav-tabs a[href="#tabrek4"]' ).tab( 'show' );
        LoadListObyek( kd_rek1_temp13, kd_rek2_temp13, kd_rek3_temp13 );
    } );

    function LoadListObyek ( kd_rek_1, kd_rek_2, kd_rek_3 ) {
        obyek_tbl = $( '#tblObyek' ).DataTable( {
            processing: true,
            serverSide: true,
            dom: 'BfRtip',
            autoWidth: false,
            "ajax": { "url": "./mapping_rek90/getListRek4/" + kd_rek_1 + "/" + kd_rek_2 + "/" + kd_rek_3 },
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

    $( '#tblObyek tbody' ).on( 'dblclick', 'tr', function () {
        var data = obyek_tbl.row( this ).data();
        kd_rek1_temp13 = data.kd_rek_1;
        kd_rek2_temp13 = data.kd_rek_2;
        kd_rek3_temp13 = data.kd_rek_3;
        kd_rek4_temp13 = data.kd_rek_4;
        $( '#ur_akun_rek5' ).text( data.kd_rek_1 + ' ' + data.nama_kd_rek_1 );
        $( '#ur_gol_rek5' ).text( data.kode_rek2 + ' ' + data.nama_kd_rek_2 );
        $( '#ur_jenis_rek5' ).text( data.kode_rek3 + ' ' + data.nama_kd_rek_3 );
        $( '#ur_obyek_rek5' ).text( data.kode_rek4 + ' ' + data.nama_kd_rek_4 );
        $( '.nav-tabs a[href="#tabrek5"]' ).tab( 'show' );
        LoadListRincian( kd_rek1_temp13, kd_rek2_temp13, kd_rek3_temp13, kd_rek4_temp13 );
    } );

    function LoadListRincian ( kd_rek_1, kd_rek_2, kd_rek_3, kd_rek_4 ) {
        rincian_tbl = $( '#tblRincian' ).DataTable( {
            processing: true,
            serverSide: true,
            dom: 'BfRtip',
            autoWidth: false,
            "ajax": { "url": "./mapping_rek90/getListRek5/" + kd_rek_1 + "/" + kd_rek_2 + "/" + kd_rek_3 + "/" + kd_rek_4 },
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
                { data: 'kode_rek5_13', sClass: "dt-center", width: "15%" },
                { data: 'nama_rek5_13', sClass: "dt-left" },
                { data: 'kode_rek6_90', sClass: "dt-center", width: "15%" },
                { data: 'nama_rek6_90', sClass: "dt-left" }
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } );
    }

    $( document ).on( 'click', '#btnTambahMapping', function () {
        var data = rincian_tbl.row( $( this ).parents( 'tr' ) ).data();
        $( '.btnSaveMapping' ).addClass( 'addMapping' );
        $( '.btnSaveMapping' ).removeClass( 'editMapping' );
        $( '#ur_akun_13' ).text( '(' + data.kode_rek1_13 + ') ' + data.nama_rek1_13 );
        $( '#ur_golongan_13' ).text( '(' + data.kode_rek2_13 + ') ' + data.nama_rek2_13 );
        $( '#ur_jenis_13' ).text( '(' + data.kode_rek3_13 + ') ' + data.nama_rek3_13 );
        $( '#ur_obyek_13' ).text( '(' + data.kode_rek4_13 + ') ' + data.nama_rek4_13 );
        $( '#ur_rincian_13' ).text( '(' + data.kode_rek5_13 + ') ' + data.nama_rek5_13 );
        $( '#ur_akun_90' ).text( '' );
        $( '#ur_golongan_90' ).text( '' );
        $( '#ur_jenis_90' ).text( '' );
        $( '#ur_obyek_90' ).text( '' );
        $( '#ur_rincian_90' ).text( '' );
        $( '#ur_subrincian_90' ).text( '' );
        $( '#id_mapping_sub' ).val( null );
        $( '#id_rekening_13' ).val( data.id_rekening );
        $( '#id_rekening_90' ).val( null );
        $( '.form-horizontal' ).show();
        $( '#ModalMappingSub' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.addMapping', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );
        $.ajax( {
            type: 'post',
            url: './mapping_rek90/addRekeningMapping',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_rekening_13': $( '#id_rekening_13' ).val(),
                'id_rekening_90': $( '#id_rekening_90' ).val(),
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
        $( '#ur_akun_13' ).text( '(' + data.kode_rek1_13 + ') ' + data.nama_rek1_13 );
        $( '#ur_golongan_13' ).text( '(' + data.kode_rek2_13 + ') ' + data.nama_rek2_13 );
        $( '#ur_jenis_13' ).text( '(' + data.kode_rek3_13 + ') ' + data.nama_rek3_13 );
        $( '#ur_obyek_13' ).text( '(' + data.kode_rek4_13 + ') ' + data.nama_rek4_13 );
        $( '#ur_rincian_13' ).text( '(' + data.kode_rek5_13 + ') ' + data.nama_rek5_13 );
        $( '#ur_akun_90' ).text( '(' + data.kode_rek1_90 + ') ' + data.nama_rek1_90 );
        $( '#ur_golongan_90' ).text( '(' + data.kode_rek2_90 + ') ' + data.nama_rek2_90 );
        $( '#ur_jenis_90' ).text( '(' + data.kode_rek3_90 + ') ' + data.nama_rek3_90 );
        $( '#ur_obyek_90' ).text( '(' + data.kode_rek4_90 + ') ' + data.nama_rek4_90 );
        $( '#ur_rincian_90' ).text( '(' + data.kode_rek5_90 + ') ' + data.nama_rek5_90 );
        $( '#ur_subrincian_90' ).text( '(' + data.kode_rek6_90 + ') ' + data.nama_rek6_90 );
        $( '#id_mapping_sub' ).val( data.id_mapping_rek );
        $( '#id_rekening_13' ).val( data.id_rekening );
        $( '#id_rekening_90' ).val( data.id_rekening_90 );
        $( '.form-horizontal' ).show();
        $( '#ModalMappingSub' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.editMapping', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );
        $.ajax( {
            type: 'post',
            url: './mapping_rek90/editRekeningMapping',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_mapping_rek': $( '#id_mapping_sub' ).val(),
                'id_rekening_13': $( '#id_rekening_13' ).val(),
                'id_rekening_90': $( '#id_rekening_90' ).val(),
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
        $( '#nm_unit_hapus' ).text( '(' + data.kode_rek6_90 + ') ' + data.nama_rek6_90 );
        $( '#HapusMapping' ).modal( 'show' );
    } );

    $( document ).on( 'click', '#btnDeleteMapping', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );
        $.ajax( {
            type: 'post',
            url: './mapping_rek90/hapusRekeningMapping',
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
        url: 'mapping_rek90/getListRek1_90',
        dataType: "json",
        success: function ( data ) {
            var j = data.length;
            var post, i;
            $( 'select[name="id_akun_90"]' ).empty();
            $( 'select[name="id_akun_90"]' ).append( '<option value="-1">---Pilih Akun Rekening Permendagri 90---</option>' );
            for ( i = 0; i < j; i++ ) {
                post = data[ i ];
                $( 'select[name="id_akun_90"]' ).append( '<option value="' + post.kd_rek_1 + '">' + post.kd_rek_1 + ' ' + post.nama_kd_rek_1 + '</option>' );
            }
        }
    } );

    $( ".id_akun_90" ).change( function () {
        $.ajax( {
            type: "GET",
            url: 'mapping_rek90/getListRek2_90/' + $( "#id_akun_90" ).val(),
            dataType: "json",
            success: function ( data ) {
                var j = data.length;
                var post, i;
                $( 'select[name="id_golongan_90"]' ).empty();
                $( 'select[name="id_golongan_90"]' ).append( '<option value="-1">---Pilih Golongan Rekening Permendagri 90---</option>' );
                for ( i = 0; i < j; i++ ) {
                    post = data[ i ];
                    $( 'select[name="id_golongan_90"]' ).append( '<option value="' + post.id_rek_2 + '">' + post.kode_rek2 + ' ' + post.nama_kd_rek_2 + '</option>' );
                }
            }
        } );
    } );

    $( ".id_golongan_90" ).change( function () {
        $.ajax( {
            type: "GET",
            url: 'mapping_rek90/getListRek3_90/' + $( "#id_golongan_90" ).val(),
            dataType: "json",
            success: function ( data ) {
                var j = data.length;
                var post, i;
                $( 'select[name="id_jenis_90"]' ).empty();
                $( 'select[name="id_jenis_90"]' ).append( '<option value="-1">---Pilih Jenis Rekening Permendagri 90---</option>' );
                for ( i = 0; i < j; i++ ) {
                    post = data[ i ];
                    $( 'select[name="id_jenis_90"]' ).append( '<option value="' + post.id_rek_3 + '">' + post.kode_rek3 + ' ' + post.nama_kd_rek_3 + '</option>' );
                }
            }
        } );
    } );

    $( ".id_jenis_90" ).change( function () {
        $.ajax( {
            type: "GET",
            url: 'mapping_rek90/getListRek4_90/' + $( "#id_jenis_90" ).val(),
            dataType: "json",
            success: function ( data ) {
                var j = data.length;
                var post, i;
                $( 'select[name="id_obyek_90"]' ).empty();
                $( 'select[name="id_obyek_90"]' ).append( '<option value="-1">---Pilih Obyek Rekening Permendagri 90---</option>' );
                for ( i = 0; i < j; i++ ) {
                    post = data[ i ];
                    $( 'select[name="id_obyek_90"]' ).append( '<option value="' + post.id_rek_4 + '">' + post.kode_rek4 + ' ' + post.nama_kd_rek_4 + '</option>' );
                }
            }
        } );
    } );

    $( ".id_obyek_90" ).change( function () {
        $.ajax( {
            type: "GET",
            url: 'mapping_rek90/getListRek5_90/' + $( "#id_obyek_90" ).val(),
            dataType: "json",
            success: function ( data ) {
                var j = data.length;
                var post, i;
                $( 'select[name="id_rincian_90"]' ).empty();
                $( 'select[name="id_rincian_90"]' ).append( '<option value="-1">---Pilih Rincian Rekening Permendagri 90---</option>' );
                for ( i = 0; i < j; i++ ) {
                    post = data[ i ];
                    $( 'select[name="id_rincian_90"]' ).append( '<option value="' + post.id_rek_5 + '">' + post.kode_rek5 + ' ' + post.nama_kd_rek_5 + '</option>' );
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
            "ajax": { "url": "./mapping_rek90/getListRek6_90/" + id_rek5 },
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
                { data: 'kode_rek6', sClass: "dt-center", width: "15%" },
                { data: 'nama_kd_rek_6', sClass: "dt-left" },
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } );
    }

    $( document ).on( 'click', '#btnPilihRekening', function () {
        var data = subrincian_ref.row( $( this ).parents( 'tr' ) ).data();
        $( '#ur_akun_90' ).text( '(' + data.kd_rek_1 + ') ' + data.nama_kd_rek_1 );
        $( '#ur_golongan_90' ).text( '(' + data.kode_rek2 + ') ' + data.nama_kd_rek_2 );
        $( '#ur_jenis_90' ).text( '(' + data.kode_rek3 + ') ' + data.nama_kd_rek_3 );
        $( '#ur_obyek_90' ).text( '(' + data.kode_rek4 + ') ' + data.nama_kd_rek_4 );
        $( '#ur_rincian_90' ).text( '(' + data.kode_rek5 + ') ' + data.nama_kd_rek_5 );
        $( '#ur_subrincian_90' ).text( '(' + data.kode_rek6 + ') ' + data.nama_kd_rek_6 );
        $( '#id_rekening_90' ).val( data.id_rek_6 );
        $( '#cariReferensi90' ).modal( 'hide' );
    } );

    $( '#tblSubRincianRef tbody' ).on( 'dblclick', 'tr', function () {
        var data = subrincian_ref.row( this ).data();
        $( '#ur_akun_90' ).text( '(' + data.kd_rek_1 + ') ' + data.nama_kd_rek_1 );
        $( '#ur_golongan_90' ).text( '(' + data.kode_rek2 + ') ' + data.nama_kd_rek_2 );
        $( '#ur_jenis_90' ).text( '(' + data.kode_rek3 + ') ' + data.nama_kd_rek_3 );
        $( '#ur_obyek_90' ).text( '(' + data.kode_rek4 + ') ' + data.nama_kd_rek_4 );
        $( '#ur_rincian_90' ).text( '(' + data.kode_rek5 + ') ' + data.nama_kd_rek_5 );
        $( '#ur_subrincian_90' ).text( '(' + data.kode_rek6 + ') ' + data.nama_kd_rek_6 );
        $( '#id_rekening_90' ).val( data.id_rek_6 );
        $( '#cariReferensi90' ).modal( 'hide' );
    } );

    $( document ).on( 'click', '#btnCetakMapping', function () {
        vars = "?token=" + $( 'input[name=_token]' ).val();
        window.open( './mapping_rek90/CetakMapping' + vars, '_blank' );
    } );

    $( document ).on( 'click', '#btnCetakNonMapping', function () {
        vars = "?token=" + $( 'input[name=_token]' ).val();
        window.open( './mapping_rek90/CetakNonMapping' + vars, '_blank' );
    } );

} ); //end file