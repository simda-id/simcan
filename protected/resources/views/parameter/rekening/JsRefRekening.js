$( document ).ready( function () {

    $( '[data-toggle="popover"]' ).popover();

    function createPesan ( message, type ) {
        var html = '<div class="alert alert-' + type + ' alert-dismissable page-alert col-md-12">';
        html += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
        html += message;
        html += '</div>';
        $( html ).hide().prependTo( '#pesan' ).slideDown();
    };

    $( '.page-alert .close' ).click( function ( e ) {
        e.preventDefault();
        $( this ).closest( '.page-alert' ).slideUp();
    } );

    $( '#prosesbar' ).hide();

    $( '.number' ).number( true, 0, '', '' );

    $( '.display' ).DataTable( {
        dom: 'BfRtip',
        autoWidth: false,
        bDestroy: true
    } );

    var akun_temp, golongan_temp, jenis_temp, obyek_temp;
    var akun_tbl, golongan_tbl, jenis_tbl, obyek_tbl, rincian_tbl;

    akun_tbl = $( '#tblAkun' ).DataTable( {
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
        "ajax": { "url": "./rekening/getListAkun" },
        "columns": [
            { data: 'no_urut', sClass: "dt-center", width: "5%" },
            { data: 'kd_rek_1', sClass: "dt-center", width: "5%" },
            { data: 'nama_kd_rek_1' },
        ],
        "order": [ [ 0, 'asc' ] ],
    } );

    $( '#tblAkun tbody' ).on( 'dblclick', 'tr', function () {

        var data = akun_tbl.row( this ).data();

        $( '#ur_akun' ).text( data.nama_kd_rek_1 );
        akun_temp = data.kd_rek_1;

        $( '.nav-tabs a[href="#golongan"]' ).tab( 'show' );
        LoadListGolongan( akun_temp );

    } );

    function LoadListGolongan ( id_akun ) {
        golongan_tbl = $( '#tblGolongan' ).DataTable( {
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
            "ajax": { "url": "./rekening/getListGolongan/" + id_akun },
            "columns": [
                { data: 'no_urut', sClass: "dt-center", width: "5%" },
                { data: 'kd_rek_1', sClass: "dt-center", width: "5%" },
                { data: 'kd_rek_2', sClass: "dt-center", width: "5%" },
                { data: 'nama_kd_rek_2' },
            ],
            "order": [ [ 0, 'asc' ] ],
        } );
    }

    $( '#tblGolongan tbody' ).on( 'dblclick', 'tr', function () {

        var data = golongan_tbl.row( this ).data();

        $( '#ur_akun_jenis' ).text( data.nama_kd_rek_1 );
        $( '#ur_golongan' ).text( data.nama_kd_rek_2 );
        akun_temp = data.kd_rek_1;
        golongan_temp = data.kd_rek_2;

        $( '.nav-tabs a[href="#jenis"]' ).tab( 'show' );
        LoadListJenis( akun_temp, golongan_temp );

    } );

    function LoadListJenis ( id_akun, id_golongan ) {
        jenis_tbl = $( '#tblJenis' ).DataTable( {
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
            "ajax": { "url": "./rekening/getListJenis/" + id_akun + "/" + id_golongan },
            "columns": [
                { data: 'no_urut', sClass: "dt-center", width: "5%" },
                { data: 'kd_rek_1', sClass: "dt-center", width: "5%" },
                { data: 'kd_rek_2', sClass: "dt-center", width: "5%" },
                { data: 'kd_rek_3', sClass: "dt-center", width: "5%" },
                { data: 'nama_kd_rek_3' },
            ],
            "order": [ [ 0, 'asc' ] ],
        } );
    }

    $( '#tblJenis tbody' ).on( 'dblclick', 'tr', function () {

        var data = jenis_tbl.row( this ).data();

        $( '#ur_akun_obyek' ).text( data.nama_kd_rek_1 );
        $( '#ur_golongan_obyek' ).text( data.nama_kd_rek_2 );
        $( '#ur_jenis' ).text( data.nama_kd_rek_3 );
        akun_temp = data.kd_rek_1;
        golongan_temp = data.kd_rek_2;
        jenis_temp = data.kd_rek_3;

        $( '.nav-tabs a[href="#obyek"]' ).tab( 'show' );
        LoadListObyek( akun_temp, golongan_temp, jenis_temp );

    } );

    function LoadListObyek ( id_akun, id_golongan, id_jenis ) {
        obyek_tbl = $( '#tblObyek' ).DataTable( {
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
            "ajax": { "url": "./rekening/getListObyek/" + id_akun + "/" + id_golongan + "/" + id_jenis },
            "columns": [
                { data: 'no_urut', sClass: "dt-center", width: "5%" },
                { data: 'kd_rek_1', sClass: "dt-center", width: "5%" },
                { data: 'kd_rek_2', sClass: "dt-center", width: "5%" },
                { data: 'kd_rek_3', sClass: "dt-center", width: "5%" },
                { data: 'kd_rek_4', sClass: "dt-center", width: "5%" },
                { data: 'nama_kd_rek_4' },
                { data: 'action', 'searchable': false, width: "10%", 'orderable': false, sClass: "dt-center" }
            ],
            "order": [ [ 0, 'asc' ] ],
        } );
    }

    $( '#tblObyek tbody' ).on( 'dblclick', 'tr', function () {

        var data = obyek_tbl.row( this ).data();

        $( '#ur_akun_rincian' ).text( data.nama_kd_rek_1 );
        $( '#ur_golongan_rincian' ).text( data.nama_kd_rek_2 );
        $( '#ur_jenis_rincian' ).text( data.nama_kd_rek_3 );
        $( '#ur_obyek' ).text( data.nama_kd_rek_4 );
        akun_temp = data.kd_rek_1;
        golongan_temp = data.kd_rek_2;
        jenis_temp = data.kd_rek_3;
        obyek_temp = data.kd_rek_4;

        $( '.nav-tabs a[href="#rincian"]' ).tab( 'show' );
        LoadListRincian( akun_temp, golongan_temp, jenis_temp, obyek_temp );

    } );

    function LoadListRincian ( id_akun, id_golongan, id_jenis, id_obyek ) {
        rincian_tbl = $( '#tblRincian' ).DataTable( {
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
            "ajax": { "url": "./rekening/getListRincian/" + id_akun + "/" + id_golongan + "/" + id_jenis + "/" + id_obyek },
            "columns": [
                { data: 'no_urut', sClass: "dt-center", width: "5%" },
                { data: 'kd_rek_1', sClass: "dt-center", width: "5%" },
                { data: 'kd_rek_2', sClass: "dt-center", width: "5%" },
                { data: 'kd_rek_3', sClass: "dt-center", width: "5%" },
                { data: 'kd_rek_4', sClass: "dt-center", width: "5%" },
                { data: 'kd_rek_5', sClass: "dt-center", width: "5%" },
                { data: 'nama_kd_rek_5' },
                { data: 'action', 'searchable': false, width: "10%", 'orderable': false, sClass: "dt-center" }
            ],
            "order": [ [ 0, 'asc' ] ],
        } );
    }

    $( document ).on( 'click', '#btnTambahObyek', function () {
        $( '.btnRek4' ).removeClass( 'editRek4' );
        $( '.btnRek4' ).addClass( 'addRek4' );
        $( '.modal-title' ).text( 'Tambah Referensi Obyek Rekening ' );
        $( '.form-horizontal' ).show();
        $( '#rek4_id_akun' ).val( akun_temp );
        $( '#rek4_id_golongan' ).val( golongan_temp );
        $( '#rek4_id_jenis' ).val( jenis_temp );
        $( '#rek4_kd_obyek' ).val( 0 );
        $( '#rek4_nm_obyek' ).val( null );

        $( '#ModalRek4' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.addRek4', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './rekening/addRek4',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'kd_rek_1': $( '#rek4_id_akun' ).val(),
                'kd_rek_2': $( '#rek4_id_golongan' ).val(),
                'kd_rek_3': $( '#rek4_id_jenis' ).val(),
                'kd_rek_4': $( '#rek4_kd_obyek' ).val(),
                'nama_kd_rek_4': $( '#rek4_nm_obyek' ).val(),
            },
            success: function ( data ) {
                $( '#tblObyek' ).DataTable().ajax.reload();
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            },
        } );
    } );

    var kd_rek_4a
    $( document ).on( 'click', '#btnEditObyek', function () {

        var data = obyek_tbl.row( $( this ).parents( 'tr' ) ).data();

        $( '.btnRek4' ).removeClass( 'addRek4' );
        $( '.btnRek4' ).addClass( 'editRek4' );
        $( '.modal-title' ).text( 'Edit Referensi Obyek Rekening' );
        $( '.form-horizontal' ).show();
        $( '#rek4_id_akun' ).val( data.kd_rek_1 );
        $( '#rek4_id_golongan' ).val( data.kd_rek_2 );
        $( '#rek4_id_jenis' ).val( data.kd_rek_3 );
        $( '#rek4_kd_obyek' ).val( data.kd_rek_4 );
        kd_rek_4a = data.kd_rek_4;
        $( '#rek4_nm_obyek' ).val( data.nama_kd_rek_4 );

        $( '#ModalRek4' ).modal( 'show' );
    } );


    $( '.modal-footer' ).on( 'click', '.editRek4', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './rekening/editRek4',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'kd_rek_1': $( '#rek4_id_akun' ).val(),
                'kd_rek_2': $( '#rek4_id_golongan' ).val(),
                'kd_rek_3': $( '#rek4_id_jenis' ).val(),
                'kd_rek_4': $( '#rek4_kd_obyek' ).val(),
                'kd_rek_4a': kd_rek_4a,
                'nama_kd_rek_4': $( '#rek4_nm_obyek' ).val(),
            },
            success: function ( data ) {
                $( '#tblObyek' ).DataTable().ajax.reload();
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            }
        } );
    } );

    //delete function
    $( document ).on( 'click', '#btnHapusObyek', function () {

        var data = obyek_tbl.row( $( this ).parents( 'tr' ) ).data();

        $( '.btnDelRek4' ).addClass( 'delRek4' );
        $( '.modal-title' ).text( 'Hapus Referensi Obyek Rekening' );
        $( '.form-horizontal' ).hide();

        $( '#rek4_id_akun_hapus' ).val( data.kd_rek_1 );
        $( '#rek4_id_golongan_hapus' ).val( data.kd_rek_2 );
        $( '#rek4_id_jenis_hapus' ).val( data.kd_rek_3 );
        $( '#rek4_id_obyek_hapus' ).val( data.kd_rek_4 );
        $( '#nm_rek4_hapus' ).html( data.nama_kd_rek_4 );

        $( '#HapusRek4' ).modal( 'show' );

    } );



    $( '.modal-footer' ).on( 'click', '.delRek4', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './rekening/hapusRek4',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'kd_rek_1': $( '#rek4_id_akun_hapus' ).val(),
                'kd_rek_2': $( '#rek4_id_golongan_hapus' ).val(),
                'kd_rek_3': $( '#rek4_id_jenis_hapus' ).val(),
                'kd_rek_4': $( '#rek4_id_obyek_hapus' ).val(),
            },
            success: function ( data ) {
                $( '#tblObyek' ).DataTable().ajax.reload();
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            }
        } );
    } );

    $( document ).on( 'click', '#btnTambahRincian', function () {
        $( '.btnRek5' ).removeClass( 'editRek5' );
        $( '.btnRek5' ).addClass( 'addRek5' );
        $( '.modal-title' ).text( 'Tambah Data Referensi Rincian Obyek Rekening' );
        $( '.form-horizontal' ).show();
        $( '#rek5_id_rekening' ).val( null );
        $( '#rek5_id_akun' ).val( akun_temp );
        $( '#rek5_id_golongan' ).val( golongan_temp );
        $( '#rek5_id_jenis' ).val( jenis_temp );
        $( '#rek5_id_obyek' ).val( obyek_temp );
        $( '#rek5_kd_rincian' ).val( 0 );
        $( '#rek5_nm_rincian' ).val( null );
        $( '#perundangan' ).val();
        $( '#ModalRek5' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.addRek5', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './rekening/addRek5',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'kd_rek_1': $( '#rek5_id_akun' ).val(),
                'kd_rek_2': $( '#rek5_id_golongan' ).val(),
                'kd_rek_3': $( '#rek5_id_jenis' ).val(),
                'kd_rek_4': $( '#rek5_id_obyek' ).val(),
                'kd_rek_5': $( '#rek5_kd_rincian' ).val(),
                'nama_kd_rek_5': $( '#rek5_nm_rincian' ).val(),
                'peraturan': $( '#peraturan' ).val()
            },
            success: function ( data ) {
                $( '#tblRincian' ).DataTable().ajax.reload();
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            },
        } );
    } );

    //edit function
    $( document ).on( 'click', '#btnEditRincian', function () {

        var data = rincian_tbl.row( $( this ).parents( 'tr' ) ).data();

        $( '.btnRek5' ).removeClass( 'addKRek5' );
        $( '.btnRek5' ).addClass( 'editRek5' );
        $( '.modal-title' ).text( 'Edit Data Referensi Rincian Obyek Rekening' );
        $( '.form-horizontal' ).show();
        $( '#rek5_id_rekening' ).val( data.id_rekening );
        $( '#rek5_id_akun' ).val( data.kd_rek_1 );
        $( '#rek5_id_golongan' ).val( data.kd_rek_2 );
        $( '#rek5_id_jenis' ).val( data.kd_rek_3 );
        $( '#rek5_id_obyek' ).val( data.kd_rek_4 );
        $( '#rek5_kd_rincian' ).val( data.kd_rek_5 );
        $( '#rek5_nm_rincian' ).val( data.nama_kd_rek_5 );
        $( '#perundangan' ).val( data.peraturan );

        $( '#ModalRek5' ).modal( 'show' );
    } );


    $( '.modal-footer' ).on( 'click', '.editRek5', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './rekening/editRek5',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_rekening': $( '#rek5_id_rekening' ).val(),
                'kd_rek_1': $( '#rek5_id_akun' ).val(),
                'kd_rek_2': $( '#rek5_id_golongan' ).val(),
                'kd_rek_3': $( '#rek5_id_jenis' ).val(),
                'kd_rek_4': $( '#rek5_id_obyek' ).val(),
                'kd_rek_5': $( '#rek5_kd_rincian' ).val(),
                'nama_kd_rek_5': $( '#rek5_nm_rincian' ).val(),
                'peraturan': $( '#perundangan' ).val()
            },
            success: function ( data ) {
                $( '#tblRincian' ).DataTable().ajax.reload();
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            }
        } );
    } );

    //delete function
    $( document ).on( 'click', '#btnHapusRincian', function () {

        var data = rincian_tbl.row( $( this ).parents( 'tr' ) ).data();

        $( '.btnDelRek5' ).addClass( 'delRek5' );
        $( '.modal-title' ).text( 'Hapus Data Referensi Rincian Obyek Rekening' );
        $( '.form-horizontal' ).hide();
        $( '#rek5_id_rekening_hapus' ).val( data.id_rekening );
        $( '#nm_rek5_hapus' ).html( data.nama_kd_rek_5 );
        $( '#HapusRek5' ).modal( 'show' );

    } );

    $( '.modal-footer' ).on( 'click', '.delRek5', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './rekening/hapusRek5',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_rekening': $( '#rek5_id_rekening_hapus' ).val(),
            },
            success: function ( data ) {
                $( '.item' + $( '.rek5_id_rekening_hapus' ).text() ).remove();
                $( '#tblRincian' ).DataTable().ajax.reload();
                createPesan( data.pesan, "success" );
            }
        } );
    } );

    $( document ).on( 'click', '.btnLoad', function () {
        $( '#prosesbar' ).show();
        $.ajax( {
            type: 'get',
            url: '../../transfer/prosetrfrefrek5',

            dataType: 'json',
            success: function ( data ) {
                createPesan( data.pesan, "success" );
                $( '#prosesbar' ).hide();
            },
            error: function ( data ) {
                createPesan( data.pesan, "success" );
                $( '#prosesbar' ).hide();
            }
        } );
    } );

} );