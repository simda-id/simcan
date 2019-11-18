$( document ).ready( function () {

    var id_sk_asb;
    var id_kel_asb;
    var id_subkel_asb;
    var id_ssubkel_asb;
    var id_aktiv_asb;
    var id_komp_asb;
    var id_rinci_asb;
    var nm_sk_asb;
    var nm_kel_asb;
    var nm_subkel_asb;
    var nm_ssubkel_asb;
    var nm_aktiv_asb;
    var nm_komp_asb;
    var nm_rinci_asb;
    var flag_perkada;

    var hub_driver1, hub_driver2, hub_driver3, hub_driver4, hub_driver5, hub_driver6, hub_driver7, hub_driver8;
    var n_driver, n_driver, n_driver2, n_driver3, n_driver4, n_driver5, n_driver6, n_driver7;

    function createPesan ( message, type ) {
        var html = '<div id="pesanx" class="alert alert-' + type + ' alert-dismissable flyover flyover-bottom in">';
        html += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
        html += message;
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

    $( '.number' ).number( true, 2, ',', '.' );
    $( '#thn_perkada' ).number( true, 0, '', '' );

    $( '#tgl_perkada' ).datepicker( {
        altField: "#tgl_perkada1",
        altFormat: "yy-mm-dd",
        dateFormat: "dd MM yy"
    } );

    $( '#tgl_perkada_edit' ).datepicker( {
        altField: "#tgl_perkada1_edit",
        altFormat: "yy-mm-dd",
        dateFormat: "dd MM yy"
    } );

    function formatTgl ( val_tanggal ) {
        var formattedDate = new Date( val_tanggal );
        var d = formattedDate.getDate();
        var m = formattedDate.getMonth();
        var y = formattedDate.getFullYear();
        var m_names = new Array( "Januari", "Februari", "Maret",
            "April", "Mei", "Juni", "Juli", "Agustus", "September",
            "Oktober", "November", "Desember" )

        var tgl = d + " " + m_names[ m ] + " " + y;
        return tgl;
    }


    if ( flag_perkada == null && flag_perkada === undefined ) {
        document.getElementById( "btnTambahKel" ).style.visibility = 'hidden';
        document.getElementById( "btnTambahSubKel" ).style.visibility = 'hidden';
        document.getElementById( "btnTambahAktivitas" ).style.visibility = 'hidden';
        document.getElementById( "btnTambahKomponen" ).style.visibility = 'hidden';
        document.getElementById( "btnCopyKomponen" ).style.visibility = 'hidden';
        document.getElementById( "btnTambahRincian" ).style.visibility = 'hidden';
        document.getElementById( "btnCopyASB" ).style.visibility = 'hidden';
    }

    var list = document.getElementsByClassName( "angka" );

    for ( var i = 0; i < list.length; i++ ) {
        var number = list[ i ];
        number.onkeydown = function ( e ) {
            if ( !( ( e.keyCode > 95 && e.keyCode < 106 )
                || ( e.keyCode > 47 && e.keyCode < 58 )
                || e.keyCode == 8
                || e.keyCode == 188
                || e.keyCode == 9
                || e.keyCode == 190 ) ) {
                return false;
            }
        }
    }

    $( '[data-toggle="popover"]' ).popover();
    function rekomCari () {
        $.ajax( {
            type: "GET",
            url: './getGrouping',
            dataType: "json",
            success: function ( data ) {

                var j = data.length;
                var post, i;

                $( 'datalist[name="searchresults"]' ).empty();
                for ( i = 0; i < j; i++ ) {
                    post = data[ i ];
                    $( 'datalist[name="searchresults"]' ).append( '<option value="' + post.ket_group + '"/>' );
                }
            }
        } );
    };

    $( 'input:text[datalist][multiple]' ).each( function () {
        var elem = $( this ),
            list = $( document.getElementById( elem.attr( 'datalist' ) ) );
        elem.autocomplete( {
            source: list.children().map( function () {
                return $( this ).text();
            } ).get()
        } );
    } );

    $( 'datalist[name="tempCariItem"]' ).empty();

    var perkada = $( '#tblPerkada' ).DataTable( {
        processing: true,
        serverSide: true,
        dom: 'bfrtip',
        responsive: true,
        autoWidth: false,
        order: [ [ 0, 'asc' ] ],
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
        ajax: { "url": "./getPerkada" },
        columns: [
            { data: 'no_urut', sClass: "dt-center" },
            { data: 'nomor_perkada' },
            {
                data: 'tanggal_perkada',
                render: function ( data ) {
                    var date = new Date( data );
                    return date.getDate() + "-" + ( date.getMonth() + 1 ) + "-" + date.getFullYear();
                }
            },
            { data: 'uraian_perkada' },
            { data: 'flag_display' },
            { data: 'action', 'searchable': false, 'orderable': false, sClass: "dt-center" }
        ]
    } );

    $( '#tblPerkada tbody' ).on( 'dblclick', 'tr', function () {

        var data = perkada.row( this ).data();

        id_sk_asb = data.id_asb_perkada;
        nm_sk_asb = data.nomor_perkada;
        flag_perkada = data.flag;

        // if($('.nav-tabs a.active')=false){
        if ( flag_perkada == 0 ) {
            document.getElementById( "btnTambahKel" ).style.visibility = 'visible';
            document.getElementById( "btnCopyASB" ).style.visibility = 'visible';
        } else {
            document.getElementById( "btnTambahKel" ).style.visibility = 'hidden';
            document.getElementById( "btnCopyASB" ).style.visibility = 'hidden';
        };
        // };
        document.getElementById( "no_perkada_kel" ).innerHTML = data.nomor_perkada;


        $( '.nav-tabs a[href="#kelompok"]' ).tab( 'show' );
        $( '#tblKelompok' ).DataTable().ajax.url( "./getKelompok/" + id_sk_asb ).load();

    } );

    var kelompok = $( '#tblKelompok' ).DataTable( {
        processing: true,
        serverSide: true,
        dom: 'bfrtip',
        responsive: true,
        autoWidth: false,
        order: [ [ 0, 'asc' ] ],
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
        ajax: { "url": "./getKelompok/0" },
        columns: [
            { data: 'no_urut', sClass: "dt-center", width: "10px" },
            { data: 'uraian_kelompok_asb' },
            { data: 'action', 'searchable': false, 'orderable': false, sClass: "dt-center", width: "50px" }
        ]
    } );

    $( '#tblKelompok tbody' ).on( 'dblclick', 'tr', function () {

        var data = kelompok.row( this ).data();

        id_sk_asb = data.id_asb_perkada;
        nm_sk_asb = data.nomor_perkada;
        flag_perkada = data.flag;
        id_kel_asb = data.id_asb_kelompok;
        nm_kel_asb = data.uraian_kelompok_asb;
        // if($('.nav-tabs a.active')=false){
        if ( flag_perkada == 0 ) {
            document.getElementById( "btnTambahSubKel" ).style.visibility = 'visible';
        } else {
            document.getElementById( "btnTambahSubKel" ).style.visibility = 'hidden';
        };
        // };
        document.getElementById( "no_perkada_subkel" ).innerHTML = data.nomor_perkada;
        document.getElementById( "nm_kel_subkel" ).innerHTML = data.uraian_kelompok_asb;

        $( '.nav-tabs a[href="#subkelompok"]' ).tab( 'show' );
        $( '#tblSubKelompok' ).DataTable().ajax.url( "./getSubKelompok/" + id_kel_asb ).load();

    } );


    var subkelompok = $( '#tblSubKelompok' ).DataTable( {
        processing: true,
        serverSide: true,
        dom: 'bfrtip',
        responsive: true,
        autoWidth: false,
        order: [ [ 0, 'asc' ] ],
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
        ajax: { "url": "./getSubKelompok/0" },
        columns: [
            { data: 'no_urut', sClass: "dt-center", width: "10px" },
            { data: 'uraian_sub_kelompok_asb' },
            { data: 'action', 'searchable': false, 'orderable': false, sClass: "dt-center", width: "50px" }
        ]
    } );

    $( '#tblSubKelompok tbody' ).on( 'dblclick', 'tr', function () {

        var data = subkelompok.row( this ).data();

        id_sk_asb = data.id_asb_perkada;
        nm_sk_asb = data.nomor_perkada;
        flag_perkada = data.flag;
        id_kel_asb = data.id_asb_kelompok;
        nm_kel_asb = data.uraian_kelompok_asb;
        id_subkel_asb = data.id_asb_sub_kelompok;
        nm_subkel_asb = data.uraian_sub_kelompok_asb;

        // if($('.nav-tabs a.active')=false){
        if ( flag_perkada == 0 ) {
            document.getElementById( "btnTambahSubSubKel" ).style.visibility = 'visible';
        } else {
            document.getElementById( "btnTambahSubSubKel" ).style.visibility = 'hidden';
        };
        // };
        document.getElementById( "no_perkada_sskel" ).innerHTML = data.nomor_perkada;
        document.getElementById( "nm_kel_sskel" ).innerHTML = data.uraian_kelompok_asb;
        document.getElementById( "nm_subkel_sskel" ).innerHTML = data.uraian_sub_kelompok_asb;

        $( '.nav-tabs a[href="#subsubkelompok"]' ).tab( 'show' );
        $( '#tblSubSubKelompok' ).DataTable().ajax.url( "./getSubsubkel/" + id_subkel_asb ).load();

    } );

    var ssubkelompok = $( '#tblSubSubKelompok' ).DataTable( {
        processing: true,
        serverSide: true,
        dom: 'bfrtip',
        responsive: true,
        autoWidth: false,
        order: [ [ 0, 'asc' ] ],
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
        ajax: { "url": "./getSubsubkel/0" },
        columns: [
            { data: 'no_urut', sClass: "dt-center", width: "10px" },
            { data: 'uraian_sub_sub_kelompok_asb' },
            { data: 'action', 'searchable': false, 'orderable': false, sClass: "dt-center", width: "50px" }
        ]
    } );

    $( '#tblSubSubKelompok tbody' ).on( 'dblclick', 'tr', function () {

        var data = ssubkelompok.row( this ).data();

        id_sk_asb = data.id_asb_perkada;
        nm_sk_asb = data.nomor_perkada;
        flag_perkada = data.flag;
        id_kel_asb = data.id_asb_kelompok;
        nm_kel_asb = data.uraian_kelompok_asb;
        id_subkel_asb = data.id_asb_sub_kelompok;
        nm_subkel_asb = data.uraian_sub_kelompok_asb;
        id_ssubkel_asb = data.id_asb_sub_sub_kelompok;
        nm_ssubkel_asb = data.uraian_sub_sub_kelompok_asb;

        // if($('.nav-tabs a.active')=false){
        if ( flag_perkada == 0 ) {
            document.getElementById( "btnTambahAktivitas" ).style.visibility = 'visible';
        } else {
            document.getElementById( "btnTambahAktivitas" ).style.visibility = 'hidden';
        };
        // };
        document.getElementById( "no_perkada_aktiv" ).innerHTML = data.nomor_perkada;
        document.getElementById( "nm_kel_aktiv" ).innerHTML = data.uraian_kelompok_asb;
        document.getElementById( "nm_subkel_aktiv" ).innerHTML = data.uraian_sub_kelompok_asb;
        document.getElementById( "nm_subsubkel_aktiv" ).innerHTML = data.uraian_sub_sub_kelompok_asb;

        $( '.nav-tabs a[href="#detailaktivitas"]' ).tab( 'show' );
        $( '#tblAktivitas' ).DataTable().ajax.url( "./getAktivitas/" + id_ssubkel_asb ).load();

    } );

    var aktivitas = $( '#tblAktivitas' ).DataTable( {
        processing: true,
        serverSide: true,
        dom: 'bfrtip',
        responsive: true,
        autoWidth: false,
        order: [ [ 0, 'asc' ] ],
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
        ajax: { "url": "./getAktivitas/0" },
        columns: [
            { data: 'no_urut', sClass: "dt-center", width: "10px" },
            { data: 'nm_aktivitas_asb' },
            { data: 'driver1', sClass: "dt-center", width: "80px" },
            { data: 'driver2', sClass: "dt-center", width: "80px" },
            // { data: 'kapasitas_max'},
            { data: 'action', 'searchable': false, 'orderable': false, sClass: "dt-center", width: "50px" }
        ]
    } );

    $( '#tblAktivitas tbody' ).on( 'dblclick', 'tr', function () {

        var data = aktivitas.row( this ).data();

        id_sk_asb = data.id_asb_perkada;
        nm_sk_asb = data.nomor_perkada;
        flag_perkada = data.flag;
        id_kel_asb = data.id_asb_kelompok;
        nm_kel_asb = data.uraian_kelompok_asb;
        id_subkel_asb = data.id_asb_sub_kelompok;
        nm_subkel_asb = data.uraian_sub_kelompok_asb;
        id_aktiv_asb = data.id_aktivitas_asb;
        nm_aktiv_asb = data.nm_aktivitas_asb;
        id_ssubkel_asb = data.id_asb_sub_sub_kelompok;
        nm_ssubkel_asb = data.uraian_sub_sub_kelompok_asb;

        // if($('.nav-tabs a.active')=false){
        if ( flag_perkada == 0 ) {
            document.getElementById( "btnTambahKomponen" ).style.visibility = 'visible';
            document.getElementById( "btnCopyKomponen" ).style.visibility = 'visible';
        } else {
            document.getElementById( "btnTambahKomponen" ).style.visibility = 'hidden';
            document.getElementById( "btnCopyKomponen" ).style.visibility = 'hidden';
        };
        // };
        document.getElementById( "no_perkada_komp" ).innerHTML = data.nomor_perkada;
        document.getElementById( "nm_kel_komp" ).innerHTML = data.uraian_kelompok_asb;
        document.getElementById( "nm_subkel_komp" ).innerHTML = data.uraian_sub_kelompok_asb;
        document.getElementById( "nm_subsubkel_komp" ).innerHTML = data.uraian_sub_sub_kelompok_asb;
        document.getElementById( "nm_aktiv_komp" ).innerHTML = data.nm_aktivitas_asb;

        $( '.nav-tabs a[href="#detailkomponen"]' ).tab( 'show' );
        $( '#tblKomponen' ).DataTable().ajax.url( "./getKomponen/" + id_aktiv_asb ).load();

    } );

    var komponen = $( '#tblKomponen' ).DataTable( {
        processing: true,
        serverSide: true,
        dom: 'bfrtip',
        responsive: true,
        autoWidth: false,
        order: [ [ 0, 'asc' ] ],
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
        ajax: { "url": "./getKomponen/0" },
        columns: [
            { data: 'no_urut', sClass: "dt-center", width: "10px" },
            { data: 'nm_komponen_asb' },
            { data: 'kd_rekening', sClass: "dt-center" },
            { data: 'nm_rekening' },
            { data: 'action', 'searchable': false, 'orderable': false, sClass: "dt-center", width: "50px" }
        ]
    } );

    $( '#tblKomponen tbody' ).on( 'dblclick', 'tr', function () {

        var data = komponen.row( this ).data();

        id_sk_asb = data.id_asb_perkada;
        nm_sk_asb = data.nomor_perkada;
        flag_perkada = data.flag;
        id_kel_asb = data.id_asb_kelompok;
        nm_kel_asb = data.uraian_kelompok_asb;
        id_subkel_asb = data.id_asb_sub_kelompok;
        nm_subkel_asb = data.uraian_sub_kelompok_asb;
        id_aktiv_asb = data.id_aktivitas_asb;
        nm_aktiv_asb = data.nm_aktivitas_asb;
        id_komp_asb = data.id_komponen_asb;
        nm_komp_asb = data.nm_komponen_asb;
        id_ssubkel_asb = data.id_asb_sub_sub_kelompok;
        nm_ssubkel_asb = data.uraian_sub_sub_kelompok_asb;

        hub_driver1 = data.driver1;
        hub_driver2 = data.driver2;
        hub_driver3 = data.driver3;
        hub_driver4 = data.driver4;
        hub_driver5 = data.driver5;
        hub_driver6 = data.driver6;
        hub_driver7 = data.driver7;
        hub_driver8 = data.driver8;

        n_driver = data.jml_driver;
        n_driver1 = data.id_satuan_1;
        n_driver2 = data.id_satuan_2;
        n_driver3 = data.sat_derivatif_1;
        n_driver4 = data.sat_derivatif_2;

        if ( flag_perkada == 0 ) {
            document.getElementById( "btnTambahRincian" ).style.visibility = 'visible';
        } else {
            document.getElementById( "btnTambahRincian" ).style.visibility = 'hidden';
        };

        document.getElementById( "no_perkada_rinc" ).innerHTML = data.nomor_perkada;
        document.getElementById( "nm_kel_rinc" ).innerHTML = data.uraian_kelompok_asb;
        document.getElementById( "nm_subkel_rinc" ).innerHTML = data.uraian_sub_kelompok_asb;
        document.getElementById( "nm_subsubkel_rinc" ).innerHTML = data.uraian_sub_sub_kelompok_asb;
        document.getElementById( "nm_aktiv_rinc" ).innerHTML = data.nm_aktivitas_asb;
        document.getElementById( "nm_komp_rinc" ).innerHTML = data.nm_komponen_asb;

        $( '.nav-tabs a[href="#detailrincian"]' ).tab( 'show' );
        $( '#tblRincian' ).DataTable().ajax.url( "./getRincian/" + id_komp_asb ).load();

    } );

    var rincian = $( '#tblRincian' ).DataTable( {
        processing: true,
        serverSide: true,
        dom: 'bfrtip',
        responsive: true,
        autoWidth: false,
        order: [ [ 0, 'asc' ] ],
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
        ajax: { "url": "./getRincian/0" },
        columns: [
            { data: 'no_urut', sClass: "dt-center", width: "10px" },
            { data: 'uraian_tarif_ssh' },
            { data: 'biaya_display', sClass: "dt-center" },
            {
                data: 'koefisien1',
                render: $.fn.dataTable.render.number( '.', ',', 4, '' ), sClass: "dt-center", width: "80px"
            },
            {
                data: 'koefisien2',
                render: $.fn.dataTable.render.number( '.', ',', 4, '' ), sClass: "dt-center", width: "80px"
            },
            {
                data: 'koefisien3',
                render: $.fn.dataTable.render.number( '.', ',', 4, '' ), sClass: "dt-center", width: "80px"
            },
            { data: 'action', 'searchable': false, 'orderable': false, sClass: "dt-center", width: "50px" }
        ],
    } );

    var rekening = $( '#tblRekening' ).DataTable( {
        processing: true,
        serverSide: true,
        dom: 'bfrtip',
        responsive: true,
        autoWidth: false,
        order: [ [ 0, 'asc' ] ],
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
        ajax: { "url": "./getRekening" },
        columns: [
            { data: 'no_urut', sClass: "dt-center", width: "10px" },
            { data: 'kd_rekening', sClass: "dt-center", width: "50px" },
            { data: 'nm_rekening' }
        ],
    } );

    var itemSSH

    $( document ).on( 'click', '#btnparam_cari', function () {
        param = $( '#param_cari' ).val();
        $( 'datalist[name="tempCariItem"]' ).append( '<option value="' + $( '#param_cari' ).val() + '"/>' );

        itemSSH = $( '#tblItemSSH' ).DataTable( {
            processing: true,
            serverSide: true,
            dom: 'bfrtip',
            responsive: true,
            autoWidth: false,
            order: [ [ 0, 'asc' ] ],
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
            ajax: { "url": "./getItemSSH/" + param.toLowerCase() },
            columns: [
                { data: 'no_urut', sClass: "dt-center", width: "10px" },
                { data: 'uraian_sub_kelompok_ssh' },
                { data: 'uraian_tarif_ssh' },
                { data: 'keterangan_tarif_ssh' },
                { data: 'uraian_satuan', sClass: "dt-center", width: "100px" },
                {
                    data: 'jml_rupiah', sClass: "dt-right",
                    render: $.fn.dataTable.render.number( '.', ',', 0, 'Rp ' )
                }
            ],
        } );

    } );


    var carikomponen = $( '#tblCariKomponen' ).DataTable( {
        processing: true,
        serverSide: true,
        dom: 'bfrtip',
        responsive: true,
        autoWidth: false,
        order: [ [ 0, 'asc' ] ],
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
        ajax: { "url": "./getCariKomponen" },
        columnDefs: [
            {
                'width': "10px",
                'targets': 0,
                'checkboxes': {
                    'selectRow': true
                },
                'searchable': false,
                'orderable': false
            }
        ],
        select: {
            'style': 'multi'
        },
        columns: [
            { data: 'id_komponen_asb', sClass: "dt-center" },
            { data: 'no_urut', sClass: "dt-center", width: "5%" },
            { data: 'nm_komponen_asb', width: "30%" },
            { data: 'nm_rekening', width: "50%" }
        ],
    } );

    var carikelompok = $( '#tblCariKelompok' ).DataTable( {
        processing: true,
        serverSide: true,
        dom: 'bfrtip',
        responsive: true,
        autoWidth: false,
        order: [ [ 0, 'asc' ] ],
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
        ajax: { "url": "./getCariKelompok" },
        columnDefs: [
            {
                'width': 10,
                'targets': 0,
                'checkboxes': {
                    'selectRow': true
                }
            },
            {
                "targets": 1,
                "width": 10
            }
        ],
        select: {
            'style': 'multi'
        },
        columns: [
            { data: 'id_asb_kelompok', sClass: "dt-center", searchable: false, orderable: false, },
            { data: 'no_urut', sClass: "dt-center" },
            { data: 'uraian_kelompok_asb' }
        ],
    } );


    $( '#tblRekening tbody' ).on( 'dblclick', 'tr', function () {
        var data = rekening.row( this ).data();
        document.getElementById( "nm_rekening_komp" ).value = data.kd_rekening + '--' + data.nm_rekening;
        document.getElementById( "id_rekening_komp" ).value = data.id_rekening;
        $( '#cariRekening' ).modal( 'hide' );
    } );

    $( '#tblItemSSH tbody' ).on( 'dblclick', 'tr', function () {

        var data = itemSSH.row( this ).data();
        document.getElementById( "id_tarif_ssh" ).value = data.id_tarif_ssh;
        document.getElementById( "ur_tarif_ssh" ).value = data.uraian_tarif_ssh;
        document.getElementById( "id_satuan1_rinc" ).value = data.id_satuan;
        $( '#cariItemSSH' ).modal( 'hide' );

    } );

    $( function () {
        $( '#tgl_perkada' ).datepicker( {
            // changeMonth: true,
            // changeYear: true,
            altField: "#tgl_perkada1",
            altFormat: "yy-mm-dd"
        } );
        $( "#tgl_perkada" ).datepicker( "option", "dateFormat", "dd MM yy" );
    } );

    $( function () {
        $( '#tgl_perkada_edit' ).datepicker( {
            altField: "#tgl_perkada1_edit",
            altFormat: "yy-mm-dd"
        } );
        $( "#tgl_perkada_edit" ).datepicker( "option", "dateFormat", "dd MM yy" );
    } );

    //tambah perkada
    $( document ).on( 'click', '.add-perkada', function () {
        $( '#footer_action_button1' ).addClass( 'glyphicon-plus' );
        $( '#footer_action_button1' ).removeClass( 'glyphicon-trash' );
        $( '.actionBtn1' ).addClass( 'btn-success' );
        $( '.actionBtn1' ).removeClass( 'btn-danger' );
        $( '.actionBtn' ).removeClass( 'editPerkada' );
        $( '.actionBtn1' ).addClass( 'addPerkada' );
        $( '.modal-title' ).text( 'Tambah Data Peraturan Kepala Daerah tentang ASB' );
        $( '.form-horizontal' ).show();
        $( '#TambahPerkada' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.addPerkada', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );
        $( '#ModalProgress' ).modal( 'show' );
        $.ajax( {
            type: "GET",
            url: './getCountStatus/0',
            dataType: "json",
            success: function ( data ) {
                if ( data[ 0 ].status_flag == 0 ) {
                    $.ajax( {
                        type: 'post',
                        url: './addPerkada',
                        data: {
                            '_token': $( 'input[name=_token]' ).val(),
                            'no_perkada': $( '#no_perkada' ).val(),
                            'tgl_perkada': $( '#tgl_perkada1' ).val(),
                            'thn_perkada': $( '#thn_perkada' ).val(),
                            'ur_perkada': $( '#ur_perkada' ).val(),
                        },
                        success: function ( data ) {
                            $( '#tblPerkada' ).DataTable().ajax.reload( null, false );
                            createPesan( "Proses Tambah Data Berhasil", "success" );
                            $( '#ModalProgress' ).modal( 'hide' );
                        },
                    } );
                } else {
                    createPesan( "Maaf Status Draft Hanya Boleh Ada 1 buah, Silahkan Posting terlebih dahulu, atau diedit", "danger" );
                    $( '#ModalProgress' ).modal( 'hide' );
                }
            }
        } );
    } );

    //Edit Perkada
    $( document ).on( 'click', '.edit-perkada', function () {
        $( '#footer_action_button' ).addClass( 'glyphicon-check' );
        $( '#footer_action_button' ).removeClass( 'glyphicon-trash' );
        $( '.actionBtn' ).addClass( 'btn-success' );
        $( '.actionBtn' ).removeClass( 'btn-danger' );
        $( '.actionBtn1' ).removeClass( 'addPerkada' );
        $( '.actionBtn' ).addClass( 'editPerkada' );
        $( '.modal-title' ).text( 'Edit Data Peraturan Kepala Daerah tentang ASB' );
        $( '.form-horizontal' ).show();
        $( '#no_perkada_edit' ).val( $( this ).data( 'no_perkada' ) );
        $( '#tgl_perkada_edit' ).val( formatTgl( $( this ).data( 'tgl_perkada' ) ) );
        $( '#tgl_perkada1_edit' ).val( $( this ).data( 'tgl_perkada' ) );
        $( '#thn_perkada_edit' ).val( $( this ).data( 'thn_perkada' ) );
        $( '#ur_perkada_edit' ).val( $( this ).data( 'ur_perkada' ) );
        $( '#id_perkada_edit' ).val( $( this ).data( 'id_perkada' ) );
        $( '#EditPerkada' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.editPerkada', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );
        $( '#ModalProgress' ).modal( 'show' );
        $.ajax( {
            type: 'post',
            url: './editPerkada',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'no_perkada_edit': $( '#no_perkada_edit' ).val(),
                'tgl_perkada_edit': $( '#tgl_perkada1_edit' ).val(),
                'thn_perkada_edit': $( '#thn_perkada_edit' ).val(),
                'ur_perkada_edit': $( '#ur_perkada_edit' ).val(),
                'id_perkada_edit': $( '#id_perkada_edit' ).val(),
            },
            success: function ( data ) {
                $( '#tblPerkada' ).DataTable().ajax.reload( null, false );
                createPesan( "Proses Tambah Data Berhasil", "success" );
                $( '#ModalProgress' ).modal( 'hide' );
            }
        } );
    } );

    //status Perkada
    $( document ).on( 'click', '.edit-status', function () {
        $( '#footer_action_button' ).addClass( 'glyphicon-check' );
        $( '#footer_action_button' ).removeClass( 'glyphicon-trash' );
        $( '.actionBtn' ).addClass( 'btn-primary' );
        $( '.actionBtn' ).removeClass( 'btn-danger' );
        $( '.actionBtn' ).addClass( 'editStatus' );
        $( '.modal-title' ).text( 'Posting Data Peraturan Kepala Daerah tentang ASB' );
        $( '.uraian' ).html( $( this ).data( 'no_perkada' ) );
        $( '.id_perkada' ).text( $( this ).data( 'id_perkada' ) );
        $( '.flag_perkada' ).text( $( this ).data( 'flag_perkada' ) + 1 );
        $( '#StatusPerkada' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.editStatus', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );
        $( '#ModalProgress' ).modal( 'show' );

        $.ajax( {
            type: 'post',
            url: './statusPerkada',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_perkada': $( '.id_perkada' ).text(),
                'flag_perkada': $( '.flag_perkada' ).text(),
            },
            success: function ( data ) {
                $( '#tblPerkada' ).DataTable().ajax.reload( null, false );
                createPesan( "Proses Edit Data Berhasil", "success" );
                $( '#ModalProgress' ).modal( 'hide' );
            }
        } );
    } );

    //Hapus Perkada
    $( document ).on( 'click', '.delete-perkada', function () {
        $( '#footer_action_button' ).removeClass( 'glyphicon-check' );
        $( '#footer_action_button' ).addClass( 'glyphicon-trash' );
        $( '.actionBtn' ).removeClass( 'btn-success' );
        $( '.actionBtn' ).addClass( 'btn-danger' );
        $( '.actionBtn' ).addClass( 'delPerkada' );
        $( '.modal-title' ).text( 'Hapus Data Peraturan Kepala Daerah tentang ASB' );
        $( '.id_perkada_hapus' ).text( $( this ).data( 'id_perkada' ) );
        $( '.uraian' ).html( $( this ).data( 'no_perkada' ) );
        $( '#HapusPerkada' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.delPerkada', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );
        $( '#ModalProgress' ).modal( 'show' );
        $.ajax( {
            type: 'post',
            url: './hapusPerkada',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_perkada_hapus': $( '.id_perkada_hapus' ).text()
            },
            success: function ( data ) {
                $( '.item' + $( '.id_perkada_hapus' ).text() ).remove();
                $( '#tblPerkada' ).DataTable().ajax.reload( null, false );
                createPesan( "Proses Hapus Data Berhasil", "success" );
                $( '#ModalProgress' ).modal( 'hide' );
            }
        } );
    } );

    //tambah Aktivitas
    $( document ).on( 'click', '.add-aktivitas', function () {
        $( '.btnAddAktiv' ).addClass( 'btn-success' );
        $( '.btnAddAktiv' ).removeClass( 'btn-danger' );
        $( '.btnAddAktiv' ).removeClass( 'editAktivitas' );
        $( '.btnAddAktiv' ).addClass( 'addAktivitas' );
        $( '.modal-title' ).text( 'Tambah Data Aktivitas ASB' );
        $( '.form-horizontal' ).show();
        $( '#id_perkada_aktiv' ).val( id_sk_asb );
        $( '#id_kel_aktiv' ).val( id_kel_asb );
        $( '#id_subkel_aktiv' ).val( id_subkel_asb );
        $( '#id_subsubkel_aktiv' ).val( id_ssubkel_asb );
        $( '#id_satuan1' ).val( -1 );
        $( '#id_satuan2' ).val( -1 );
        $( '#range_max' ).val( 1 );
        $( '#range_max1' ).val( 1 );
        $( '#kapasitas_max' ).val( 1 );
        $( '#kapasitas_max1' ).val( 1 );
        $( '#ur_diskripsi' ).val( null );
        $( '#nm_aktivitas' ).val( null );
        document.getElementById( "idperkada_aktiv" ).innerHTML = nm_sk_asb;
        document.getElementById( "idkel_aktiv" ).innerHTML = nm_kel_asb;
        document.getElementById( "idsubkel_aktiv" ).innerHTML = nm_subkel_asb;
        document.getElementById( "idsubsubkel_aktiv" ).innerHTML = nm_ssubkel_asb;
        $( '#ModalAktivitas' ).modal( 'show' );
        // rekomCari();
    } );

    $( '.modal-footer' ).on( 'click', '.addAktivitas', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );
        $( '#ModalProgress' ).modal( 'show' );
        $.ajax( {
            type: 'post',
            url: './addAktivitas',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_asb_sub_sub_kelompok': $( '#id_subsubkel_aktiv' ).val(),
                'nm_aktivitas_asb': $( '#nm_aktivitas' ).val(),
                'range_max1': $( '#range_max1' ).val(),
                'kapasitas_max1': $( '#kapasitas_max1' ).val(),
                'id_satuan1': $( '#id_satuan1' ).val(),
                'id_satuan2': $( '#id_satuan2' ).val(),
                'sat_derivatif1': $( '#id_satuan1_derivatif' ).val(),
                'sat_derivatif2': $( '#id_satuan2_derivatif' ).val(),
                'range_max': $( '#range_max' ).val(),
                'kapasitas_max': $( '#kapasitas_max' ).val(),
                'diskripsi_aktivitas': $( '#ur_diskripsi' ).val(),
            },
            success: function ( data ) {
                if ( ( data.errors ) ) {
                    $( '.error' ).removeClass( 'hidden' );
                }
                else {
                    $( '.error' ).addClass( 'hidden' );
                    $( '#tblAktivitas' ).DataTable().ajax.reload( null, false );
                    createPesan( "Proses Tambah Data Berhasil", "success" );
                    $( '#ModalProgress' ).modal( 'hide' );
                }
            },
        } );
    } );

    //Edit Aktivitas
    $( document ).on( 'click', '.edit-aktivitas', function () {
        $( '.btnAddAktiv' ).addClass( 'btn-success' );
        $( '.btnAddAktiv' ).removeClass( 'btn-danger' );
        $( '.btnAddAktiv' ).removeClass( 'addAktivitas' );
        $( '.btnAddAktiv' ).addClass( 'editAktivitas' );
        $( '.modal-title' ).text( 'Edit Data Aktivitas ASB' );
        $( '.form-horizontal' ).show();
        $( '#id_perkada_aktiv' ).val( id_sk_asb );
        $( '#id_kel_aktiv' ).val( id_kel_asb );
        $( '#id_subkel_aktiv' ).val( id_subkel_asb );
        $( '#id_subsubkel_aktiv' ).val( id_ssubkel_asb );
        $( '#id_satuan1' ).val( $( this ).data( 'id_satuan1' ) );
        $( '#id_satuan2' ).val( $( this ).data( 'id_satuan2' ) );
        $( '#range_max' ).val( $( this ).data( 'range_max' ) );
        $( '#range_max1' ).val( $( this ).data( 'range_max1' ) );
        $( '#kapasitas_max' ).val( $( this ).data( 'kapasitas_max' ) );
        $( '#kapasitas_max1' ).val( $( this ).data( 'kapasitas_max1' ) );
        $( '#ur_diskripsi' ).val( $( this ).data( 'diskripsi_aktivitas' ) );
        $( '#nm_aktivitas' ).val( $( this ).data( 'ur_aktivitas' ) );
        $( '#id_aktivitas_edit' ).val( $( this ).data( 'id_aktivitas_asb' ) );
        $( '#id_satuan1_derivatif' ).val( $( this ).data( 'id_sat_derivatif1' ) );
        $( '#id_satuan2_derivatif' ).val( $( this ).data( 'id_sat_derivatif2' ) );

        document.getElementById( "idperkada_aktiv" ).innerHTML = nm_sk_asb;
        document.getElementById( "idkel_aktiv" ).innerHTML = nm_kel_asb;
        document.getElementById( "idsubkel_aktiv" ).innerHTML = nm_subkel_asb;
        document.getElementById( "idsubsubkel_aktiv" ).innerHTML = nm_ssubkel_asb;

        if ( $( this ).data( 'id_satuan2' ) == 0 ) {
            document.getElementById( "range_max1" ).setAttribute( "disabled", "disabled" );
            document.getElementById( "kapasitas_max1" ).setAttribute( "disabled", "disabled" );
        } else {
            document.getElementById( "range_max1" ).removeAttribute( "disabled" );
            document.getElementById( "kapasitas_max1" ).removeAttribute( "disabled" );
        }

        $( '#ModalAktivitas' ).modal( 'show' );
        // rekomCari();
    } );

    $( '.modal-footer' ).on( 'click', '.editAktivitas', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );
        $( '#ModalProgress' ).modal( 'show' );

        $.ajax( {
            type: 'post',
            url: './editAktivitas',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_asb_sub_sub_kelompok': $( '#id_subsubkel_aktiv' ).val(),
                'nm_aktivitas_asb': $( '#nm_aktivitas' ).val(),
                'range_max1': $( '#range_max1' ).val(),
                'kapasitas_max1': $( '#kapasitas_max1' ).val(),
                'id_satuan1': $( '#id_satuan1' ).val(),
                'id_satuan2': $( '#id_satuan2' ).val(),
                'sat_derivatif1': $( '#id_satuan1_derivatif' ).val(),
                'sat_derivatif2': $( '#id_satuan2_derivatif' ).val(),
                'range_max': $( '#range_max' ).val(),
                'kapasitas_max': $( '#kapasitas_max' ).val(),
                'diskripsi_aktivitas': $( '#ur_diskripsi' ).val(),
                'id_aktivitas_asb': $( '#id_aktivitas_edit' ).val(),
            },
            success: function ( data ) {
                $( '#tblAktivitas' ).DataTable().ajax.reload( null, false );
                createPesan( "Proses Edit Data Berhasil", "success" );
                $( '#ModalProgress' ).modal( 'hide' );
            }
        } );
    } );

    //Hapus zona Perkada
    $( document ).on( 'click', '.delete-aktivitas', function () {
        $( '.btnDelAktiv' ).removeClass( 'btn-success' );
        $( '.btnDelAktiv' ).addClass( 'btn-danger' );
        $( '.btnDelAktiv' ).addClass( 'delAktivitas' );
        $( '.modal-title' ).text( 'Hapus Data Aktivitas ASB' );
        $( '.id_aktivitas_hapus' ).text( $( this ).data( 'id_aktivitas_asb' ) );
        $( '.ur_aktivitas_del' ).html( $( this ).data( 'ur_aktivitas' ) );
        $( '.no_perkada_aktiv_del' ).html( $( this ).data( 'no_perkada' ) );
        $( '#HapusAktivitas' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.delAktivitas', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );
        $( '#ModalProgress' ).modal( 'show' );
        $.ajax( {
            type: 'post',
            url: './hapusAktivitas',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_aktivitas_asb': $( '.id_aktivitas_hapus' ).text()
            },
            success: function ( data ) {

                $( '.item' + $( '.id_aktivitas_hapus' ).text() ).remove();
                $( '#tblAktivitas' ).DataTable().ajax.reload( null, false );
                createPesan( "Proses Hapus Data Berhasil", "success" );
                $( '#ModalProgress' ).modal( 'hide' );
            }
        } );
    } );

    //tambah Sub Sub Kelompok
    $( document ).on( 'click', '.add-sskel', function () {
        $( '.btnSSubKel' ).removeClass( 'editSSKel' );
        $( '.btnSSubKel' ).addClass( 'addSSKel' );
        $( '.modal-title' ).text( 'Tambah Data Sub SUb Kelompok' );
        $( '.form-horizontal' ).show();
        $( '#id_perkada_ssubkel' ).val( id_sk_asb );
        $( '#id_kel_ssubkel' ).val( id_kel_asb );
        $( '#id_subkel_ssubkel' ).val( id_subkel_asb );
        document.getElementById( "idperkada_ssubkel" ).innerHTML = nm_sk_asb;
        document.getElementById( "idkel_ssubkel" ).innerHTML = nm_kel_asb;
        document.getElementById( "idsubkel_ssubkel" ).innerHTML = nm_subkel_asb;
        $( '#ur_asb_ssubkel' ).val( null );
        $( '#ModalSubSubKelompok' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.addSSKel', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );
        $( '#ModalProgress' ).modal( 'show' );
        $.ajax( {
            type: 'post',
            url: './addSubSubKelompok',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_subkel_ssubkel': $( '#id_subkel_ssubkel' ).val(),
                'ur_asb_ssubkel': $( '#ur_asb_ssubkel' ).val(),
            },
            success: function ( data ) {
                if ( ( data.errors ) ) {
                    $( '.error' ).removeClass( 'hidden' );
                }
                else {
                    $( '.error' ).addClass( 'hidden' );
                    $( '#tblSubSubKelompok' ).DataTable().ajax.reload( null, false );
                    createPesan( "Proses Tambah Data Berhasil", "success" );
                    $( '#ModalProgress' ).modal( 'hide' );
                }
            },
        } );
    } );

    $( document ).on( 'click', '.edit-sskel', function () {
        $( '.btnSSubKel' ).removeClass( 'addSSKel' );
        $( '.btnSSubKel' ).addClass( 'editSSKel' );
        $( '.modal-title' ).text( 'Ubah Data Sub Sub Kelompok' );
        $( '.form-horizontal' ).show();
        $( '#id_perkada_ssubkel' ).val( id_sk_asb );
        $( '#id_kel_ssubkel' ).val( id_kel_asb );
        $( '#id_subkel_ssubkel' ).val( id_subkel_asb );
        document.getElementById( "idperkada_ssubkel" ).innerHTML = nm_sk_asb;
        document.getElementById( "idkel_ssubkel" ).innerHTML = nm_kel_asb;
        document.getElementById( "idsubkel_ssubkel" ).innerHTML = nm_subkel_asb;
        $( '#ur_asb_ssubkel' ).val( $( this ).data( 'uraian_subsubkelompok' ) );
        $( '#id_ssubkel' ).val( $( this ).data( 'id_subsubkelompok' ) );
        $( '#ModalSubSubKelompok' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.editSSKel', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );
        $( '#ModalProgress' ).modal( 'show' );
        $.ajax( {
            type: 'post',
            url: './editSubSubKelompok',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_subkel_ssubkel_edit': $( '#id_subkel_ssubkel' ).val(),
                'ur_asb_ssubkel_edit': $( '#ur_asb_ssubkel' ).val(),
                'id_asb_ssubkel_edit': $( '#id_ssubkel' ).val(),
            },
            success: function ( data ) {
                if ( ( data.errors ) ) {
                    $( '.error' ).removeClass( 'hidden' );
                }
                else {
                    $( '.error' ).addClass( 'hidden' );
                    $( '#tblSubSubKelompok' ).DataTable().ajax.reload( null, false );
                    createPesan( "Proses Edit Data Berhasil", "success" );
                    $( '#ModalProgress' ).modal( 'hide' );
                }
            },
        } );
    } );

    //Hapus Sub Kelompok
    $( document ).on( 'click', '.delete-sskel', function () {
        $( '.btnDelSubSubKel' ).addClass( 'delsubsubKelompok' );
        $( '.modal-title' ).text( 'Hapus Data Sub Kelompok ASB' );
        $( '.id_asb_subsubkel_del' ).text( $( this ).data( 'id_subsubkelompok' ) );
        $( '.ur_asb_subsubkel_del' ).html( $( this ).data( 'uraian_subsubkelompok' ) );
        $( '.no_perkada_subsubkel_del' ).html( $( this ).data( 'no_perkada' ) );
        $( '.ur_asb_subkel_del' ).html( $( this ).data( 'uraian_subkelompok' ) );
        $( '#HapusSubSubKelompok' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.delsubsubKelompok', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );
        $( '#ModalProgress' ).modal( 'show' );

        $.ajax( {
            type: 'post',
            url: './hapusSubSubKelompok',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_asb_ssubkel_del': $( '.id_asb_subsubkel_del' ).text()
            },
            success: function ( data ) {
                $( '.item' + $( '.id_asb_subsubkel_del' ).text() ).remove();
                $( '#tblSubSubKelompok' ).DataTable().ajax.reload( null, false );
                createPesan( "Proses Hapus Data Berhasil", "success" );
                $( '#ModalProgress' ).modal( 'hide' );
            }
        } );
    } );

    //Tambah Komponen
    $( document ).on( 'click', '.add-komponen', function () {
        $( '.btnAddKomp' ).addClass( 'btn-success' );
        $( '.btnAddKomp' ).removeClass( 'btn-danger' );
        $( '.btnAddKomp' ).removeClass( 'editKomponenASB' );
        $( '.btnAddKomp' ).addClass( 'addKomponenASB' );
        $( '.modal-title' ).text( 'Tambah Data Komponen Aktivitas ASB' );
        $( '.form-horizontal' ).show();
        $( '#id_perkada_komp' ).val( id_sk_asb );
        $( '#id_kel_komp' ).val( id_kel_asb );
        $( '#id_subkel_komp' ).val( id_subkel_asb );
        $( '#id_subsubkel_komp' ).val( id_ssubkel_asb );
        $( '#id_aktivitas_komp' ).val( id_aktiv_asb );
        document.getElementById( "idperkada_komp" ).innerHTML = nm_sk_asb;
        document.getElementById( "idkel_komp" ).innerHTML = nm_kel_asb;
        document.getElementById( "idsubkel_komp" ).innerHTML = nm_subkel_asb;
        document.getElementById( "idsubsubkel_komp" ).innerHTML = nm_ssubkel_asb;
        document.getElementById( "idaktivitas_komp" ).innerHTML = nm_aktiv_asb;
        $( '#id_rekening_komp' ).val( null );
        $( '#nm_rekening_komp' ).val( null );
        $( '#nm_komponen' ).val( null );
        $( '#ModalKomponen' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.addKomponenASB', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );
        $( '#ModalProgress' ).modal( 'show' );
        $.ajax( {
            type: 'post',
            url: './addKomponenASB',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'nm_komponen': $( '#nm_komponen' ).val(),
                'id_rekening_komp': $( '#id_rekening_komp' ).val(),
                'id_aktivitas_komp': $( '#id_aktivitas_komp' ).val(),
            },

            success: function ( data ) {
                if ( ( data.errors ) ) {
                    $( '.error' ).removeClass( 'hidden' );
                }
                else {
                    $( '.error' ).addClass( 'hidden' );
                    $( '#tblKomponen' ).DataTable().ajax.reload( null, false );
                    createPesan( "Proses Tambah Data Berhasil", "success" );
                    $( '#ModalProgress' ).modal( 'hide' );
                }
            },
        } );
    } );

    //Edit Komponen
    $( document ).on( 'click', '.edit-komponen', function () {
        $( '.btnAddKomp' ).addClass( 'btn-success' );
        $( '.btnAddKomp' ).removeClass( 'btn-danger' );
        $( '.btnAddKomp' ).removeClass( 'addKomponenASB' );
        $( '.btnAddKomp' ).addClass( 'editKomponenASB' );
        $( '.modal-title' ).text( 'Tambah Data Komponen Aktivitas ASB' );
        $( '.form-horizontal' ).show();
        $( '#id_perkada_komp' ).val( id_sk_asb );
        $( '#id_kel_komp' ).val( id_kel_asb );
        $( '#id_subkel_komp' ).val( id_subkel_asb );
        $( '#id_subsubkel_komp' ).val( id_ssubkel_asb );
        $( '#id_aktivitas_komp' ).val( id_aktiv_asb );
        document.getElementById( "idperkada_komp" ).innerHTML = nm_sk_asb;
        document.getElementById( "idkel_komp" ).innerHTML = nm_kel_asb;
        document.getElementById( "idsubkel_komp" ).innerHTML = nm_subkel_asb;
        document.getElementById( "idsubsubkel_komp" ).innerHTML = nm_ssubkel_asb;
        document.getElementById( "idaktivitas_komp" ).innerHTML = nm_aktiv_asb;
        $( '#nm_rekening_komp' ).val( $( this ).data( 'kd_rekening' ) + " - " + $( this ).data( 'nm_rekening' ) );
        $( '#id_rekening_komp' ).val( $( this ).data( 'id_rekening' ) );
        $( '#nm_komponen' ).val( $( this ).data( 'uraian_komponen' ) );
        $( '#id_komponen_asb_edit' ).val( $( this ).data( 'id_komponen' ) );
        $( '#ModalKomponen' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.editKomponenASB', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );
        $( '#ModalProgress' ).modal( 'show' );

        $.ajax( {
            type: 'post',
            url: './editKomponenASB',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'nm_komponen': $( '#nm_komponen' ).val(),
                'id_rekening_komp': $( '#id_rekening_komp' ).val(),
                'id_aktivitas_komp': $( '#id_aktivitas_komp' ).val(),
                'id_komponen_asb': $( '#id_komponen_asb_edit' ).val(),
            },
            success: function ( data ) {
                $( '#tblKomponen' ).DataTable().ajax.reload( null, false );
                createPesan( "Proses Edit Data Berhasil", "success" );
                $( '#ModalProgress' ).modal( 'hide' );
            }
        } );
    } );

    //Hapus Komponen
    $( document ).on( 'click', '.delete-komponen', function () {
        $( '.btnDelKomp' ).removeClass( 'btn-success' );
        $( '.btnDelKomp' ).addClass( 'btn-danger' );
        $( '.btnDelKomp' ).addClass( 'delKomponen' );
        $( '.modal-title' ).text( 'Hapus Data Komponen Aktivitas' );
        $( '.id_komponen_hapus' ).text( $( this ).data( 'id_komponen' ) );
        $( '.ur_komponen_del' ).html( $( this ).data( 'uraian_komponen' ) );
        $( '.ur_aktiv_komp_del' ).html( $( this ).data( 'ur_aktivitas' ) );
        $( '#HapusKomponen' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.delKomponen', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );
        $( '#ModalProgress' ).modal( 'show' );
        $.ajax( {
            type: 'post',
            url: './hapusKomponenASB',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_komponen_hapus': $( '.id_komponen_hapus' ).text()
            },
            success: function ( data ) {
                $( '.item' + $( '.id_komponen_hapus' ).text() ).remove();
                $( '#tblKomponen' ).DataTable().ajax.reload( null, false );
                createPesan( "Proses Hapus Data Berhasil", "success" );
                $( '#ModalProgress' ).modal( 'hide' );
            }
        } );
    } );

    //Copy Komponen
    $( document ).on( 'click', '.copy-komponen', function () {
        $( '.form-horizontal' ).show();

        $( '#tblCariKomponen' ).DataTable().ajax.reload( null, false );
        $( '#cariKomponen' ).modal( 'show' );
    } );


    //tambah kelompok
    $( document ).on( 'click', '.add-kelompok', function () {
        $( '.btnAddKel' ).removeClass( 'editKelompok' );
        $( '.btnAddKel' ).addClass( 'addKelompok' );
        $( '.modal-title' ).text( 'Tambah Kelompok Aktivitas' );
        $( '.form-horizontal' ).show();
        $( '#id_perkada_kel' ).val( id_sk_asb );
        document.getElementById( "idperkada_kel" ).innerHTML = nm_sk_asb;
        $( '#ur_asb_kel' ).val( null );
        $( '#TambahKelompok' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.addKelompok', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );
        $( '#ModalProgress' ).modal( 'show' );
        $.ajax( {
            type: 'post',
            url: './addKelompok',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_perkada_kel': $( '#id_perkada_kel' ).val(),
                'ur_asb_kel': $( '#ur_asb_kel' ).val(),
            },
            success: function ( data ) {
                if ( ( data.errors ) ) {
                    $( '.error' ).removeClass( 'hidden' );
                }
                else {
                    $( '.error' ).addClass( 'hidden' );
                    $( '#tblKelompok' ).DataTable().ajax.reload( null, false );
                    createPesan( "Proses Tambah Data Berhasil", "success" );
                    $( '#ModalProgress' ).modal( 'hide' );
                }
            },
        } );
    } );

    //Edit Kelompok
    $( document ).on( 'click', '.edit-asbkelompok', function () {
        $( '.btnEditKel' ).removeClass( 'addKelompok' );
        $( '.btnEditKel' ).addClass( 'editKelompok' );
        $( '.modal-title' ).text( 'Edit Data Kelompok ASB' );
        $( '.form-horizontal' ).show();
        $( '#id_perkada_kel_edit' ).val( id_sk_asb );
        document.getElementById( "idperkada_kel_edit" ).innerHTML = nm_sk_asb;
        $( '#id_asb_kel_edit' ).val( $( this ).data( 'id_kelompok' ) );
        $( '#ur_asb_kel_edit' ).val( $( this ).data( 'uraian_kelompok' ) );
        $( '#EditKelompok' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.editKelompok', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );
        $( '#ModalProgress' ).modal( 'show' );

        $.ajax( {
            type: 'post',
            url: './editKelompok',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_asb_kel_edit': $( '#id_asb_kel_edit' ).val(),
                'id_perkada_kel_edit': $( '#id_perkada_kel_edit' ).val(),
                'ur_asb_kel_edit': $( '#ur_asb_kel_edit' ).val(),
            },
            success: function ( data ) {
                $( '#tblKelompok' ).DataTable().ajax.reload( null, false );
                createPesan( "Proses Edit Data Berhasil", "success" );
                $( '#ModalProgress' ).modal( 'hide' );
            }
        } );
    } );

    //Hapus zona Perkada
    $( document ).on( 'click', '.hapus-asbkelompok', function () {
        $( '.btnDelKel' ).removeClass( 'btn-success' );
        $( '.btnDelKel' ).addClass( 'btn-danger' );
        $( '.btnDelKel' ).addClass( 'delKelompok' );
        $( '.modal-title' ).text( 'Hapus Data Kelompok ASB' );
        $( '.id_asb_kel_del' ).text( $( this ).data( 'id_kelompok' ) );
        $( '.ur_asb_kel_del' ).html( $( this ).data( 'uraian_kelompok' ) );
        $( '.no_perkada_kel_del' ).html( $( this ).data( 'no_perkada' ) );
        $( '#HapusKelompok' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.delKelompok', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );
        $( '#ModalProgress' ).modal( 'show' );
        $.ajax( {
            type: 'post',
            url: './hapusKelompok',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_asb_kel_del': $( '.id_asb_kel_del' ).text()
            },
            success: function ( data ) {
                $( '.item' + $( '.id_asb_kel_del' ).text() ).remove();
                $( '#tblKelompok' ).DataTable().ajax.reload( null, false );
                createPesan( "Proses Hapus Data Berhasil", "success" );
                $( '#ModalProgress' ).modal( 'hide' );
            }
        } );
    } );

    //tambah Sub kelompok
    $( document ).on( 'click', '.add-subkelompok', function () {
        $( '.btnAddSubKel' ).addClass( 'btn-success' );
        $( '.btnAddSubKel' ).removeClass( 'btn-danger' );
        $( '.btnEditSubKel' ).removeClass( 'editsubKelompok' );
        $( '.btnAddSubKel' ).addClass( 'addSubKelompok' );
        $( '.modal-title' ).text( 'Tambah Sub Kelompok Aktivitas' );
        $( '.form-horizontal' ).show();
        $( '#id_perkada_subkel' ).val( id_sk_asb );
        $( '#id_kel_subkel' ).val( id_kel_asb );
        document.getElementById( "idperkada_subkel" ).innerHTML = nm_sk_asb;
        document.getElementById( "idkel_subkel" ).innerHTML = nm_kel_asb;
        $( '#ur_asb_subkel' ).val( null );
        $( '#TambahSubKelompok' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.addSubKelompok', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );
        $( '#ModalProgress' ).modal( 'show' );
        $.ajax( {
            type: 'post',
            url: './addSubKelompok',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_kel_subkel': $( '#id_kel_subkel' ).val(),
                'ur_asb_subkel': $( '#ur_asb_subkel' ).val(),
            },
            success: function ( data ) {
                if ( ( data.errors ) ) {
                    $( '.error' ).removeClass( 'hidden' );
                }
                else {
                    $( '.error' ).addClass( 'hidden' );
                    $( '#tblSubKelompok' ).DataTable().ajax.reload( null, false );
                    createPesan( "Proses Tambah Data Berhasil", "success" );
                    $( '#ModalProgress' ).modal( 'hide' );
                }
            },
        } );
    } );

    //Edit Sub Kelompok
    $( document ).on( 'click', '.edit-subkelompok', function () {
        $( '.btnEditSubKel' ).addClass( 'btn-success' );
        $( '.btnEditSubKel' ).removeClass( 'btn-danger' );
        $( '.btnAddSubKel' ).removeClass( 'addSubKelompok' );
        $( '.btnEditSubKel' ).addClass( 'editsubKelompok' );
        $( '.modal-title' ).text( 'Edit Data Sub Kelompok ASB' );
        $( '.form-horizontal' ).show();
        $( '#id_perkada_subkel_edit' ).val( id_sk_asb );
        $( '#id_kel_subkel_edit' ).val( id_kel_asb );
        document.getElementById( "idperkada_subkel_edit" ).innerHTML = nm_sk_asb;
        document.getElementById( "idkel_subkel_edit" ).innerHTML = nm_kel_asb;
        $( '#id_asb_subkel_edit' ).val( $( this ).data( 'id_subkelompok' ) );
        $( '#ur_asb_subkel_edit' ).val( $( this ).data( 'uraian_subkelompok' ) );
        $( '#EditSubKelompok' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.editsubKelompok', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );
        $( '#ModalProgress' ).modal( 'show' );
        $.ajax( {
            type: 'post',
            url: './editSubKelompok',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_kel_subkel_edit': $( '#id_kel_subkel_edit' ).val(),
                'id_asb_subkel_edit': $( '#id_asb_subkel_edit' ).val(),
                'ur_asb_subkel_edit': $( '#ur_asb_subkel_edit' ).val(),
            },
            success: function ( data ) {
                $( '#tblSubKelompok' ).DataTable().ajax.reload( null, false );
                createPesan( "Proses Edit Data Berhasil", "success" );
                $( '#ModalProgress' ).modal( 'hide' );
            }
        } );
    } );

    //Hapus Sub Kelompok
    $( document ).on( 'click', '.hapus-subkelompok', function () {
        $( '.btnDelSubKel' ).removeClass( 'btn-success' );
        $( '.btnDelSubKel' ).addClass( 'btn-danger' );
        $( '.btnDelSubKel' ).addClass( 'delsubKelompok' );
        $( '.modal-title' ).text( 'Hapus Data Sub Kelompok ASB' );
        $( '.id_asb_subkel_del' ).text( $( this ).data( 'id_subkelompok' ) );
        $( '.ur_asb_subkel_del' ).html( $( this ).data( 'uraian_subkelompok' ) );
        $( '.no_perkada_subkel_del' ).html( $( this ).data( 'no_perkada' ) );
        $( '.ur_asb_kel_del' ).html( $( this ).data( 'uraian_kelompok' ) );
        $( '#HapusSubKelompok' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.delsubKelompok', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );
        $( '#ModalProgress' ).modal( 'show' );
        $.ajax( {
            type: 'post',
            url: './hapusSubKelompok',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_asb_subkel_del': $( '.id_asb_subkel_del' ).text()
            },
            success: function ( data ) {
                $( '.item' + $( '.id_asb_subkel_del' ).text() ).remove();
                $( '#tblSubKelompok' ).DataTable().ajax.reload( null, false );
                createPesan( "Proses Hapus Data Berhasil", "success" );
                $( '#ModalProgress' ).modal( 'hide' );
            }
        } );
    } );

    //Tambah 
    $( document ).on( 'click', '.add-rincian', function () {
        $( '.btnAddRinci' ).addClass( 'btn-success' );
        $( '.btnAddRinci' ).removeClass( 'btn-danger' );
        $( '.btnAddRinci' ).removeClass( 'editRinci' );
        $( '.btnAddRinci' ).addClass( 'addRincianASB' );
        $( '.modal-title' ).text( 'Tambah Data Rincian Item Komponen ASB' );
        $( '.form-horizontal' ).show();

        $( '#id_komponen_rinc' ).val( id_komp_asb );
        document.getElementById( "idperkada_rinc" ).innerHTML = nm_sk_asb;
        document.getElementById( "idkel_rinc" ).innerHTML = nm_kel_asb;
        document.getElementById( "idsubkel_rinc" ).innerHTML = nm_subkel_asb;
        document.getElementById( "idsubsubkel_rinc" ).innerHTML = nm_ssubkel_asb;
        document.getElementById( "idaktivitas_rinc" ).innerHTML = nm_aktiv_asb;
        document.getElementById( "idkomponen_rinc" ).innerHTML = nm_komp_asb;

        isi_hub_driver();

        document.frmModalRincian.jns_biaya[ 0 ].checked = false;
        document.frmModalRincian.jns_biaya[ 1 ].checked = false;
        document.frmModalRincian.jns_biaya[ 2 ].checked = false;

        if ( document.frmModalRincian.jns_biaya[ 1 ].checked ) {
            unlock_hub_driver();
        } else {
            lock_hub_driver();
            clear_hub_driver();
        }

        document.getElementById( "koefisien1" ).setAttribute( "disabled", "disabled" );
        document.getElementById( "id_satuan1_rinc" ).setAttribute( "disabled", "disabled" );
        // document.getElementById("id_satuan1_der").setAttribute("disabled","disabled");
        document.getElementById( "koefisien2" ).setAttribute( "disabled", "disabled" );
        document.getElementById( "id_satuan2_rinc" ).setAttribute( "disabled", "disabled" );
        document.getElementById( "koefisien3" ).setAttribute( "disabled", "disabled" );
        document.getElementById( "id_satuan3_rinc" ).setAttribute( "disabled", "disabled" );

        $( '#koefisien1' ).val( 1 );
        $( '#koefisien2' ).val( 1 );
        $( '#koefisien3' ).val( 1 );

        $( '#ket_rinci' ).val( null );
        $( '#id_tarif_ssh' ).val( null );
        $( '#ur_tarif_ssh' ).val( null );


        $( '#id_satuan1_rinc' ).val( 0 );
        $( '#id_satuan2_rinc' ).val( 0 );
        $( '#id_satuan3_rinc' ).val( 0 );

        rekomCari();
        $( '.hub_driver' ).removeAttr( 'checked' );
        $( '#ModalRincian' ).modal( 'show' );

    } );

    $( '.modal-footer' ).on( 'click', '.addRincianASB', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $( '#ModalProgress' ).modal( 'show' );
        $.ajax( {
            type: 'post',
            url: './addRincianASB',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_komponen_asb': $( '#id_komponen_rinc' ).val(),
                'id_tarif_ssh': $( '#id_tarif_ssh' ).val(),
                'koefisien1': $( '#koefisien1' ).val(),
                'koefisien2': $( '#koefisien2' ).val(),
                'koefisien3': $( '#koefisien3' ).val(),
                'id_satuan1': $( '#id_satuan1_rinc' ).val(),
                'id_satuan2': $( '#id_satuan2_rinc' ).val(),
                'id_satuan3': $( '#id_satuan3_rinc' ).val(),
                // 'sat_derivatif1': $('#id_satuan1_der').val(),
                'jenis_biaya': getJnsBiaya(),
                'hub_driver': getHubDriver(),
                'ket_group': $( '#ket_rinci' ).val(),
            },

            success: function ( data ) {
                createPesan( "Proses Tambah Data Berhasil", "success" );
                $( '#ModalProgress' ).modal( 'hide' );
                $( 'datalist[name="searchresults"]' ).append( '<option value="' + $( '#ket_rinci' ).val() + '"/>' );
                $( '#tblRincian' ).DataTable().ajax.reload( null, false );
            },
        } );
    } );

    //Edit Rincian
    $( document ).on( 'click', '.edit-rinci', function () {

        $( '.btnAddRinci' ).addClass( 'btn-success' );
        $( '.btnAddRinci' ).removeClass( 'btn-danger' );
        $( '.btnAddRinci' ).removeClass( 'addRincianASB' );
        $( '.btnAddRinci' ).addClass( 'editRinci' );
        $( '.modal-title' ).text( 'Edit Data Rincian Item Komponen ASB' );
        $( '.form-horizontal' ).show();
        $( '#id_komponen_asb_rinci' ).val( $( this ).data( 'id_komponen_rinci' ) );
        $( '#id_komponen_rinc' ).val( $( this ).data( 'id_komponen' ) );

        document.getElementById( "idperkada_rinc" ).innerHTML = nm_sk_asb;
        document.getElementById( "idkel_rinc" ).innerHTML = nm_kel_asb;
        document.getElementById( "idsubkel_rinc" ).innerHTML = nm_subkel_asb;
        document.getElementById( "idsubsubkel_rinc" ).innerHTML = nm_ssubkel_asb;
        document.getElementById( "idaktivitas_rinc" ).innerHTML = nm_aktiv_asb;
        document.getElementById( "idkomponen_rinc" ).innerHTML = nm_komp_asb;

        isi_hub_driver();

        $( '#koefisien1' ).val( $( this ).data( 'koefisien1' ) );
        $( '#koefisien2' ).val( $( this ).data( 'koefisien2' ) );
        $( '#koefisien3' ).val( $( this ).data( 'koefisien3' ) );
        $( '#id_tarif_ssh' ).val( $( this ).data( 'id_tarif_ssh' ) );
        $( '#ur_tarif_ssh' ).val( $( this ).data( 'ur_tarif_ssh' ) );
        $( '#id_satuan1_rinc' ).val( $( this ).data( 'id_satuan1' ) );
        // $('#id_satuan1_der').val($(this).data('sat_derivatif1'));
        $( '#id_satuan2_rinc' ).val( $( this ).data( 'id_satuan2' ) );
        $( '#id_satuan3_rinc' ).val( $( this ).data( 'id_satuan3' ) );
        $( '#ket_rinci' ).val( $( this ).data( 'ket_group' ) );

        if ( $( this ).data( 'hub_driver' ) != "" ) {
            document.frmModalRincian.hub_driver[ $( this ).data( 'hub_driver' ) - 1 ].checked = true;
        }

        if ( $( this ).data( 'jenis_biaya' ) == 1 ) {
            lock_hub_driver();
            clear_hub_driver();
            document.getElementById( "koefisien1" ).removeAttribute( "disabled" );
            document.getElementById( "id_satuan1_rinc" ).removeAttribute( "disabled" );
            // document.getElementById("id_satuan1_der").setAttribute("disabled","disabled");
            document.getElementById( "koefisien2" ).removeAttribute( "disabled" );
            document.getElementById( "id_satuan2_rinc" ).removeAttribute( "disabled" );
            document.getElementById( "koefisien3" ).removeAttribute( "disabled" );
            document.getElementById( "id_satuan3_rinc" ).removeAttribute( "disabled" );
            document.frmModalRincian.jns_biaya[ 0 ].checked = true;
            $( '.hub_driver' ).removeAttr( 'checked' );
        }

        if ( $( this ).data( 'jenis_biaya' ) != 1 ) {
            unlock_hub_driver();
            document.getElementById( "koefisien1" ).setAttribute( "disabled", "disabled" );
            document.getElementById( "id_satuan1_rinc" ).setAttribute( "disabled", "disabled" );
            // document.getElementById("id_satuan1_der").removeAttribute("disabled");
            document.getElementById( "koefisien2" ).removeAttribute( "disabled" );
            document.getElementById( "id_satuan2_rinc" ).removeAttribute( "disabled" );
            document.getElementById( "koefisien3" ).removeAttribute( "disabled" );
            document.getElementById( "id_satuan3_rinc" ).removeAttribute( "disabled" );
            document.frmModalRincian.jns_biaya[ 2 ].checked = true;
        }

        rekomCari();

        $( "#ModalRincian" ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.editRinci', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $( '#ModalProgress' ).modal( 'show' );
        $.ajax( {
            type: 'post',
            url: './editRincianASB',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_komponen_asb_rinci': $( '#id_komponen_asb_rinci' ).val(),
                'id_komponen_asb': $( '#id_komponen_rinc' ).val(),
                'id_tarif_ssh': $( '#id_tarif_ssh' ).val(),
                'koefisien1': $( '#koefisien1' ).val(),
                'koefisien2': $( '#koefisien2' ).val(),
                'koefisien3': $( '#koefisien3' ).val(),
                'id_satuan1': $( '#id_satuan1_rinc' ).val(),
                'id_satuan2': $( '#id_satuan2_rinc' ).val(),
                'id_satuan3': $( '#id_satuan3_rinc' ).val(),
                // 'sat_derivatif1': $('#id_satuan1_der').val(),
                'jenis_biaya': getJnsBiaya(),
                'hub_driver': getHubDriver(),
                'ket_group': $( '#ket_rinci' ).val(),
            },
            success: function ( data ) {
                createPesan( "Proses Edit Data Berhasil", "success" );
                $( '#ModalProgress' ).modal( 'hide' );
                $( 'datalist[name="searchresults"]' ).append( '<option value="' + $( '#ket_rinci' ).val() + '"/>' );
                $( '#tblRincian' ).DataTable().ajax.reload( null, false );
            }
        } );
    } );

    //Hapus Rincian
    $( document ).on( 'click', '.delete-rincian', function () {
        $( '.btnDelRinc' ).removeClass( 'btn-success' );
        $( '.btnDelRinc' ).addClass( 'btn-danger' );
        $( '.btnDelRinc' ).addClass( 'delRincian' );
        $( '.modal-title' ).text( 'Hapus Data Tarif SSH' );
        $( '.id_komponen_rinci_hapus' ).text( $( this ).data( 'id_komponen_rinci' ) );
        $( '.ur_rincian_del' ).html( $( this ).data( 'ur_tarif_ssh' ) );
        $( '.ur_komp_rinc_del' ).html( $( this ).data( 'uraian_komponen' ) );
        $( '#HapusRincian' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.delRincian', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $( '#ModalProgress' ).modal( 'show' );

        $.ajax( {
            type: 'post',
            url: './hapusRincianASB',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_komponen_asb_rinci': $( '.id_komponen_rinci_hapus' ).text()
            },
            success: function ( data ) {
                $( '.item' + $( '.id_komponen_rinci_hapus' ).text() ).remove();
                createPesan( "Proses Hapus Berhasil", "success" );
                $( '#ModalProgress' ).modal( 'hide' );
                $( '#tblRincian' ).DataTable().ajax.reload( null, false );
            }
        } );
    } );

    $( '.id_satuan2' ).change( function () {
        if ( $( '#id_satuan2' ).val() == 0 ) {
            $( ".id_satuan2_derivatif" ).attr( "disabled", true );
            document.getElementById( "range_max1" ).setAttribute( "disabled", "disabled" );
            $( '#range_max1' ).val( 1 );
            document.getElementById( "kapasitas_max1" ).setAttribute( "disabled", "disabled" );
            $( '#kapasitas_max1' ).val( 1 );
        } else {
            $( ".id_satuan2_derivatif" ).removeAttr( "disabled" );
            document.getElementById( "range_max1" ).removeAttribute( "disabled" );
            document.getElementById( "kapasitas_max1" ).removeAttribute( "disabled" );
        }
    } );

    function lock_hub_driver () {
        document.frmModalRincian.hub_driver[ 0 ].disabled = true;
        document.frmModalRincian.hub_driver[ 1 ].disabled = true;
        document.frmModalRincian.hub_driver[ 2 ].disabled = true;
        document.frmModalRincian.hub_driver[ 3 ].disabled = true;
        document.frmModalRincian.hub_driver[ 4 ].disabled = true;
        document.frmModalRincian.hub_driver[ 5 ].disabled = true;
        document.frmModalRincian.hub_driver[ 6 ].disabled = true;
        document.frmModalRincian.hub_driver[ 7 ].disabled = true;
    }

    function unlock_hub_driver () {
        document.frmModalRincian.hub_driver[ 0 ].disabled = false;
        if ( hub_driver2 != 'N/A' ) {
            document.frmModalRincian.hub_driver[ 1 ].disabled = false;
        }
        if ( hub_driver3 != 'N/A' ) {
            document.frmModalRincian.hub_driver[ 2 ].disabled = false;
        }
        if ( hub_driver4 != 'N/A' ) {
            document.frmModalRincian.hub_driver[ 3 ].disabled = false;
        }
        if ( hub_driver5 != 'N/A' ) {
            document.frmModalRincian.hub_driver[ 4 ].disabled = false;
        }
        if ( hub_driver6 != 'N/A' ) {
            document.frmModalRincian.hub_driver[ 5 ].disabled = false;
        }
        if ( hub_driver7 != 'N/A' ) {
            document.frmModalRincian.hub_driver[ 6 ].disabled = false;
        }
        if ( hub_driver8 != 'N/A' ) {
            document.frmModalRincian.hub_driver[ 7 ].disabled = false;
        }
    }

    function clear_hub_driver () {
        document.frmModalRincian.hub_driver[ 0 ].checked = false;
        document.frmModalRincian.hub_driver[ 1 ].checked = false;
        document.frmModalRincian.hub_driver[ 2 ].checked = false;
        document.frmModalRincian.hub_driver[ 3 ].checked = false;
        document.frmModalRincian.hub_driver[ 4 ].checked = false;
        document.frmModalRincian.hub_driver[ 5 ].checked = false;
        document.frmModalRincian.hub_driver[ 6 ].checked = false;
        document.frmModalRincian.hub_driver[ 7 ].checked = false;
    }

    function isi_hub_driver () {
        document.getElementById( "shub_driver1" ).innerHTML = hub_driver1;
        document.getElementById( "shub_driver2" ).innerHTML = hub_driver2;
        document.getElementById( "shub_driver3" ).innerHTML = hub_driver3;
        document.getElementById( "shub_driver4" ).innerHTML = hub_driver4;
        document.getElementById( "shub_driver5" ).innerHTML = hub_driver5;
        document.getElementById( "shub_driver6" ).innerHTML = hub_driver6;
        document.getElementById( "shub_driver7" ).innerHTML = hub_driver7;
        document.getElementById( "shub_driver8" ).innerHTML = hub_driver8;
    }

    function eFixed () {
        lock_hub_driver();
        $( '#id_satuan1_rinc' ).val( n_driver1 );
        $( '#id_satuan2_rinc' ).val( n_driver2 );
        document.getElementById( "koefisien1" ).removeAttribute( "disabled" );
        document.getElementById( "id_satuan1_rinc" ).removeAttribute( "disabled" );
        document.getElementById( "koefisien2" ).removeAttribute( "disabled" );
        document.getElementById( "id_satuan2_rinc" ).removeAttribute( "disabled" );
        document.getElementById( "koefisien3" ).removeAttribute( "disabled" );
        document.getElementById( "id_satuan3_rinc" ).removeAttribute( "disabled" );
        $( '.hub_driver' ).removeAttr( 'checked' );
    }

    function eIndependent1 () {
        unlock_hub_driver();
        $( '#id_satuan1_rinc' ).val( n_driver1 );
        $( '#id_satuan2_rinc' ).val( n_driver2 );
        document.getElementById( "koefisien1" ).setAttribute( "disabled", "disabled" );
        document.getElementById( "id_satuan1_rinc" ).setAttribute( "disabled", "disabled" );
        document.getElementById( "koefisien2" ).removeAttribute( "disabled" );
        document.getElementById( "id_satuan2_rinc" ).removeAttribute( "disabled" );
        document.getElementById( "koefisien3" ).removeAttribute( "disabled" );
        document.getElementById( "id_satuan3_rinc" ).removeAttribute( "disabled" );
    }

    function eIndependent2 () {
        unlock_hub_driver();
        $( '#id_satuan1_rinc' ).val( n_driver2 );
        $( '#id_satuan2_rinc' ).val( n_driver1 );
        document.getElementById( "koefisien1" ).setAttribute( "disabled", "disabled" );
        document.getElementById( "id_satuan1_rinc" ).setAttribute( "disabled", "disabled" );
        document.getElementById( "koefisien2" ).removeAttribute( "disabled" );
        document.getElementById( "id_satuan2_rinc" ).removeAttribute( "disabled" );
        document.getElementById( "koefisien3" ).removeAttribute( "disabled" );
        document.getElementById( "id_satuan3_rinc" ).removeAttribute( "disabled" );
    }

    function eIndependent3 () {
        unlock_hub_driver();
        $( '#id_satuan1_rinc' ).val( n_driver1 );
        $( '#id_satuan2_rinc' ).val( n_driver2 );
        document.getElementById( "koefisien1" ).setAttribute( "disabled", "disabled" );
        document.getElementById( "id_satuan1_rinc" ).setAttribute( "disabled", "disabled" );
        document.getElementById( "koefisien2" ).setAttribute( "disabled", "disabled" );
        document.getElementById( "id_satuan2_rinc" ).setAttribute( "disabled", "disabled" );
        document.getElementById( "koefisien3" ).removeAttribute( "disabled" );
        document.getElementById( "id_satuan3_rinc" ).removeAttribute( "disabled" );
    }

    function eMixed1 () {
        unlock_hub_driver();
        $( '#id_satuan1_rinc' ).val( n_driver3 );
        $( '#id_satuan2_rinc' ).val( n_driver2 );
        document.getElementById( "koefisien1" ).setAttribute( "disabled", "disabled" );
        document.getElementById( "id_satuan1_rinc" ).setAttribute( "disabled", "disabled" );
        document.getElementById( "koefisien2" ).removeAttribute( "disabled" );
        document.getElementById( "id_satuan2_rinc" ).removeAttribute( "disabled" );
        document.getElementById( "koefisien3" ).removeAttribute( "disabled" );
        document.getElementById( "id_satuan3_rinc" ).removeAttribute( "disabled" );
    }

    function eMixed2 () {
        unlock_hub_driver();
        $( '#id_satuan1_rinc' ).val( n_driver4 );
        $( '#id_satuan2_rinc' ).val( n_driver1 );
        document.getElementById( "koefisien1" ).setAttribute( "disabled", "disabled" );
        document.getElementById( "id_satuan1_rinc" ).setAttribute( "disabled", "disabled" );
        document.getElementById( "koefisien2" ).removeAttribute( "disabled" );
        document.getElementById( "id_satuan2_rinc" ).removeAttribute( "disabled" );
        document.getElementById( "koefisien3" ).removeAttribute( "disabled" );
        document.getElementById( "id_satuan3_rinc" ).removeAttribute( "disabled" );
    }

    function eMixed3 () {
        unlock_hub_driver();
        $( '#id_satuan1_rinc' ).val( n_driver3 );
        $( '#id_satuan2_rinc' ).val( n_driver4 );
        document.getElementById( "koefisien1" ).setAttribute( "disabled", "disabled" );
        document.getElementById( "id_satuan1_rinc" ).setAttribute( "disabled", "disabled" );
        document.getElementById( "koefisien2" ).setAttribute( "disabled", "disabled" );
        document.getElementById( "id_satuan2_rinc" ).setAttribute( "disabled", "disabled" );
        document.getElementById( "koefisien3" ).removeAttribute( "disabled" );
        document.getElementById( "id_satuan3_rinc" ).removeAttribute( "disabled" );
    }

    function eMixed4 () {
        unlock_hub_driver();
        $( '#id_satuan1_rinc' ).val( n_driver3 );
        $( '#id_satuan2_rinc' ).val( n_driver2 );
        document.getElementById( "koefisien1" ).setAttribute( "disabled", "disabled" );
        document.getElementById( "id_satuan1_rinc" ).setAttribute( "disabled", "disabled" );
        document.getElementById( "koefisien2" ).setAttribute( "disabled", "disabled" );
        document.getElementById( "id_satuan2_rinc" ).setAttribute( "disabled", "disabled" );
        document.getElementById( "koefisien3" ).removeAttribute( "disabled" );
        document.getElementById( "id_satuan3_rinc" ).removeAttribute( "disabled" );
    }

    function eMixed5 () {
        unlock_hub_driver();
        $( '#id_satuan1_rinc' ).val( n_driver4 );
        $( '#id_satuan2_rinc' ).val( n_driver1 );
        document.getElementById( "koefisien1" ).setAttribute( "disabled", "disabled" );
        document.getElementById( "id_satuan1_rinc" ).setAttribute( "disabled", "disabled" );
        document.getElementById( "koefisien2" ).setAttribute( "disabled", "disabled" );
        document.getElementById( "id_satuan2_rinc" ).setAttribute( "disabled", "disabled" );
        document.getElementById( "koefisien3" ).removeAttribute( "disabled" );
        document.getElementById( "id_satuan3_rinc" ).removeAttribute( "disabled" );
    }

    $( '.jns_biaya' ).change( function () {
        if ( document.frmModalRincian.jns_biaya.value == 1 ) {
            lock_hub_driver();
            clear_hub_driver();
            $( '#id_satuan3_rinc' ).val( 0 );
            eFixed();
        }

        if ( document.frmModalRincian.jns_biaya.value != 1 ) {
            $( '#koefisien1' ).val( 1 );
            $( '#koefisien2' ).val( 1 );
            $( '#id_satuan3_rinc' ).val( 0 );
            unlock_hub_driver();

            if ( document.frmModalRincian.hub_driver.value == 1 ) {
                eIndependent1();
            }
            if ( document.frmModalRincian.hub_driver.value == 2 ) {
                eIndependent2();
            }
            if ( document.frmModalRincian.hub_driver.value == 3 ) {
                eIndependent3();
            }
            if ( document.frmModalRincian.hub_driver.value == 4 ) {
                eMixed1();
            }
            if ( document.frmModalRincian.hub_driver.value == 5 ) {
                eMixed2();
            }
            if ( document.frmModalRincian.hub_driver.value == 6 ) {
                eMixed3();
            }
            if ( document.frmModalRincian.hub_driver.value == 7 ) {
                eMixed4();
            }
            if ( document.frmModalRincian.hub_driver.value == 8 ) {
                eMixed5();
            }
        }
    } );


    $( '.hub_driver' ).change( function () {
        if ( document.frmModalRincian.jns_biaya.value != 1 ) {
            $( '#koefisien1' ).val( 1 );
            $( '#koefisien2' ).val( 1 );
            $( '#id_satuan3_rinc' ).val( 0 );
            unlock_hub_driver();

            if ( document.frmModalRincian.hub_driver.value == 1 ) {
                eIndependent1();
            }
            if ( document.frmModalRincian.hub_driver.value == 2 ) {
                eIndependent2();
            }
            if ( document.frmModalRincian.hub_driver.value == 3 ) {
                eIndependent3();
            }
            if ( document.frmModalRincian.hub_driver.value == 4 ) {
                eMixed1();
            }
            if ( document.frmModalRincian.hub_driver.value == 5 ) {
                eMixed2();
            }
            if ( document.frmModalRincian.hub_driver.value == 6 ) {
                eMixed3();
            }
            if ( document.frmModalRincian.hub_driver.value == 7 ) {
                eMixed4();
            }
            if ( document.frmModalRincian.hub_driver.value == 8 ) {
                eMixed5();
            }
        }
    } );


    $( function () {
        $.ajax( {
            type: "GET",
            url: './getRefSatuan',
            dataType: "json",
            success: function ( data ) {

                var j = data.length;
                var post, i;

                $( 'select[name="id_satuan1"]' ).empty();
                $( 'select[name="id_satuan1"]' ).append( '<option value="-1">---Pilih Satuan---</option>' );
                $( 'select[name="id_satuan1"]' ).append( '<option value="0">-- N/A --</option>' );

                $( 'select[name="id_satuan2"]' ).empty();
                $( 'select[name="id_satuan2"]' ).append( '<option value="-1">---Pilih Satuan---</option>' );
                $( 'select[name="id_satuan2"]' ).append( '<option value="0">-- N/A --</option>' );

                $( 'select[name="id_satuan1_rinc"]' ).empty();
                $( 'select[name="id_satuan1_rinc"]' ).append( '<option value="-1">---Pilih Satuan---</option>' );
                $( 'select[name="id_satuan1_rinc"]' ).append( '<option value="0">-- N/A --</option>' );

                $( 'select[name="id_satuan2_rinc"]' ).empty();
                $( 'select[name="id_satuan2_rinc"]' ).append( '<option value="-1">---Pilih Satuan---</option>' );
                $( 'select[name="id_satuan2_rinc"]' ).append( '<option value="0">-- N/A --</option>' );

                $( 'select[name="id_satuan3_rinc"]' ).empty();
                $( 'select[name="id_satuan3_rinc"]' ).append( '<option value="-1">---Pilih Satuan---</option>' );
                $( 'select[name="id_satuan3_rinc"]' ).append( '<option value="0">-- N/A --</option>' );

                for ( i = 0; i < j; i++ ) {
                    post = data[ i ];
                    $( 'select[name="id_satuan1"]' ).append( '<option value="' + post.id_satuan + '">' + post.uraian_satuan + '</option>' );
                    $( 'select[name="id_satuan2"]' ).append( '<option value="' + post.id_satuan + '">' + post.uraian_satuan + '</option>' );
                    $( 'select[name="id_satuan1_rinc"]' ).append( '<option value="' + post.id_satuan + '">' + post.uraian_satuan + '</option>' );
                    $( 'select[name="id_satuan2_rinc"]' ).append( '<option value="' + post.id_satuan + '">' + post.uraian_satuan + '</option>' );
                    $( 'select[name="id_satuan3_rinc"]' ).append( '<option value="' + post.id_satuan + '">' + post.uraian_satuan + '</option>' );
                }

            }
        } );
    } );

    $( function () {
        $.ajax( {
            type: "GET",
            url: './getRefSatuan',
            dataType: "json",
            success: function ( data ) {

                var j = data.length;
                var post, i;

                $( 'select[name="id_satuan1_derivatif"]' ).empty();
                $( 'select[name="id_satuan1_derivatif"]' ).append( '<option value="-1">--Pilih Satuan Derivarif--</option>' );
                $( 'select[name="id_satuan1_derivatif"]' ).append( '<option value="0">-- N/A --</option>' );

                $( 'select[name="id_satuan2_derivatif"]' ).empty();
                $( 'select[name="id_satuan2_derivatif"]' ).append( '<option value="-1">--Pilih Satuan Derivarif--</option>' );
                $( 'select[name="id_satuan2_derivatif"]' ).append( '<option value="0">-- N/A --</option>' );

                for ( i = 0; i < j; i++ ) {
                    post = data[ i ];
                    $( 'select[name="id_satuan1_derivatif"]' ).append( '<option value="' + post.id_satuan + '">' + post.uraian_satuan + '</option>' );
                    $( 'select[name="id_satuan2_derivatif"]' ).append( '<option value="' + post.id_satuan + '">' + post.uraian_satuan + '</option>' );
                }

            }
        } );
    } );

    $( document ).on( 'click', '.cetak-aktivitas', function () {
        $( '.modal-title' ).text( 'Pencetakan Aktivitas ASB' );
        $( '.form-horizontal' ).show();
        $( '#id_aktivitas_simulasi' ).val( $( this ).data( 'id_aktivitas_asb' ) );
        $( '#aktivitas_simulasi' ).val( $( this ).data( 'ur_aktivitas' ) );
        $( '#v1_simulasi' ).val( 1 );
        $( '#v2_simulasi' ).val( 1 );
        $( '#SimulasiHitung' ).modal( 'show' );
    } );

    $( document ).on( 'click', '.btnSimulasi', function () {

        window.open( '../printHitungSimulasiASB2/' + $( '#id_aktivitas_simulasi' ).val() + '/' + $( '#v1_simulasi' ).val() + '/' + $( '#v2_simulasi' ).val() );

    } );


    function getJnsBiaya () {

        var xCheck = document.querySelectorAll( 'input[name="jns_biaya"]:checked' );
        var xyz = [];
        for ( var x = 0, l = xCheck.length; x < l; x++ ) { xyz.push( xCheck[ x ].value ); }
        var xvalues = xyz.join( '' );
        return xvalues;
    }

    function getHubDriver () {

        var xCheck = document.querySelectorAll( 'input[name="hub_driver"]:checked' );
        var xyz = [];
        for ( var x = 0, l = xCheck.length; x < l; x++ ) { xyz.push( xCheck[ x ].value ); }
        var xvalues = xyz.join( '' );
        return xvalues;
    }

    function getCekKomponen () {

        var xCheck = document.querySelectorAll( 'input[name="pilih_id"]:checked' );
        var xyz = [];
        for ( var x = 0, l = xCheck.length; x < l; x++ ) { xyz.push( xCheck[ x ].value ); }
        var xvalues = xyz.join( '' );
        return xvalues;
    }


    $( document ).on( 'click', '.copy-asb', function () {
        $( '.form-horizontal' ).show();
        $( '#tblCariKelompok' ).DataTable().ajax.reload( null, false );
        $( "#CopyDataASB" ).modal( 'show' );

    } );

    $( document ).on( 'click', '.btnProsesCopyKelompok', function ( e ) {
        var rows_selected = carikelompok.column( 0 ).checkboxes.selected();
        var rows_data = carikelompok.rows( { selected: true } ).data();

        $( '#ModalProgress' ).modal( 'show' );
        $.each( rows_selected, function ( index, rowId ) {
            var temp_id_x = 0;
            var id_kel = rowId;

            $.ajaxSetup( {
                headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
            } );

            $.ajax( {
                type: 'post',
                url: './CopyKelompok',
                data: {
                    '_token': $( 'input[name=_token]' ).val(),
                    'id_asb_perkada': id_sk_asb,
                    'id_asb_kelompok': id_kel,
                },
                success: function ( data ) {
                    if ( data.status_pesan == 1 ) {
                        createPesan( data.pesan, "success" );
                    } else {
                        createPesan( data.pesan, "danger" );
                    }
                    $( '#ModalProgress' ).modal( 'hide' );
                    $( '#tblKelompok' ).DataTable().ajax.reload( null, false );
                },
                error: function ( data ) {
                    createPesan( "Proses Copy Data Gagal ", "danger" );
                    $( '#ModalProgress' ).modal( 'hide' );
                    $( '#tblKelompok' ).DataTable().ajax.reload( null, false );
                },
            } );
        } );
        e.preventDefault();
    } );

    $( document ).on( 'click', '.btnProsesCopyKomp', function ( e ) {
        var rows_selected = carikomponen.column( 0 ).checkboxes.selected();
        var rows_data = carikomponen.rows( { selected: true } ).data();

        $( '#ModalProgress' ).modal( 'show' );
        $.each( rows_selected, function ( index, rowId ) {
            $.ajaxSetup( {
                headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
            } );

            $.ajax( {
                type: 'post',
                url: './CopyKomponen',
                data: {
                    '_token': $( 'input[name=_token]' ).val(),
                    'id_aktivitas_asb': id_aktiv_asb,
                    'id_komponen_asb': rowId,
                },
                success: function ( data ) {
                    if ( data.status_pesan == 1 ) {
                        createPesan( data.pesan, "success" );
                    } else {
                        createPesan( data.pesan, "danger" );
                    }
                    $( '#ModalProgress' ).modal( 'hide' );
                    $( '#tblKomponen' ).DataTable().ajax.reload( null, false );
                },
                error: function ( data ) {
                    createPesan( "Proses Copy Data Gagal ", "danger" );
                    $( '#ModalProgress' ).modal( 'hide' );
                    $( '#tblKomponen' ).DataTable().ajax.reload( null, false );
                },
            } );
        } );
        e.preventDefault();
    } );


    $( document ).on( 'click', '.cetak-perkada', function () {
        window.open( '../printListASB/' + $( this ).data( 'id_perkada' ) );
    } );

    $( document ).on( 'click', '.cetak-duplikasi', function () {
        window.open( '../printDuplikasiASB/' + $( this ).data( 'id_perkada' ) );
    } );

    $( document ).on( 'click', '.cetak-validitas', function () {
        window.open( '../printValiditasASB/' + $( this ).data( 'id_perkada' ) );
    } );


} );