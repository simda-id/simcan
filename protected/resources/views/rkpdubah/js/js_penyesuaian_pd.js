$( document ).ready( function () {

    var template = Handlebars.compile( $( "#details-template" ).html() );
    var detInProg = Handlebars.compile( $( "#details-inProg" ).html() );
    var detInKeg = Handlebars.compile( $( "#details-inKeg" ).html() );

    var tahun_temp, unit_temp, sub_unit_temp, ProgRkpd_temp, PelaksanaRkpd_temp, bidang_temp, jns_belanja_temp, akses_temp;
    var id_progref_temp, id_progrenja_temp, id_kegrenja_temp, id_aktivitas_temp, id_pelaksana_temp, id_lokasi_temp;
    var id_asb_temp, sumber_aktivitas_temp, id_program_renstra_temp, id_satuan_1_aktiv_temp, id_satuan_2_aktiv_temp, vol1_temp,
        vol2_temp, nm_sat_asb1, nm_sat_asb2;

    $( '[data-toggle="popover"]' ).popover();
    $( '.number' ).number( true, 2, ',', '.' );
    $( '.nomor' ).number( true, 0, ',', '.' );

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

    $( ".disabled" ).click( function ( e ) {
        e.preventDefault();
        return false;
    } );

    function back2Rkpd () {
        $( '#divTambahProg' ).hide();
        $( '#divTambahKegiatan' ).hide();
        $( '#divTambahAktivitas' ).hide();
        $( '#divTambahPelaksana' ).hide();
        $( '#divTambahLokasi' ).hide();
        $( '#divImportASB' ).hide();
        $( '#divAddSSH' ).hide();
        $( '#divImportASB' ).hide();
        $( '.nav-tabs a[href="#programrkpd"]' ).tab( 'show' );
    };
    $( document ).on( 'click', '.backProgRkpd', function () {
        back2Rkpd();
    } );

    function back2renja () {
        $( '#divTambahProg' ).show();
        $( '#divTambahKegiatan' ).hide();
        $( '#divTambahAktivitas' ).hide();
        $( '#divTambahPelaksana' ).hide();
        $( '#divTambahLokasi' ).hide();
        $( '#divImportASB' ).hide();
        $( '#divAddSSH' ).hide();
        $( '#divImportASB' ).hide();
        $( '.nav-tabs a[href="#program"]' ).tab( 'show' );
    };
    $( document ).on( 'click', '.backRenja', function () {
        back2renja();
    } );

    function back2kegiatan () {
        $( '#divTambahProg' ).hide();
        $( '#divTambahKegiatan' ).show();
        $( '#divTambahAktivitas' ).hide();
        $( '#divTambahPelaksana' ).hide();
        $( '#divTambahLokasi' ).hide();
        $( '#divImportASB' ).hide();
        $( '#divAddSSH' ).hide();
        $( '#divImportASB' ).hide();
        $( '.nav-tabs a[href="#kegiatan"]' ).tab( 'show' );
    };
    $( document ).on( 'click', '.backKegiatan', function () {
        back2kegiatan();
    } );

    function back2pelaksana () {
        $( '#divTambahProg' ).hide();
        $( '#divTambahKegiatan' ).hide();
        $( '#divTambahAktivitas' ).hide();
        $( '#divTambahPelaksana' ).show();
        $( '#divTambahLokasi' ).hide();
        $( '#divImportASB' ).hide();
        $( '#divAddSSH' ).hide();
        $( '#divImportASB' ).hide();
        $( '.nav-tabs a[href="#pelaksana"]' ).tab( 'show' );
    };
    $( document ).on( 'click', '.backPelaksana', function () {
        back2pelaksana();
    } );

    function back2aktivitas () {
        $( '#divTambahProg' ).hide();
        $( '#divTambahKegiatan' ).hide();
        $( '#divTambahAktivitas' ).show();
        $( '#divTambahPelaksana' ).hide();
        $( '#divTambahLokasi' ).hide();
        $( '#divImportASB' ).hide();
        $( '#divAddSSH' ).hide();
        $( '#divImportASB' ).hide();
        $( '.nav-tabs a[href="#aktivitas"]' ).tab( 'show' );
    };
    $( document ).on( 'click', '.backAktivitas', function () {
        back2aktivitas();
    } );

    function back2lokasi () {
        $( '#divTambahAktivitas' ).hide();
        $( '#divTambahPelaksana' ).hide();
        $( '#divTambahLokasi' ).show();
        $( '#divImportASB' ).hide();
        $( '#divAddSSH' ).hide();
        $( '#divImportASB' ).hide();
        $( '.nav-tabs a[href="#lokasi"]' ).tab( 'show' );
    };
    $( document ).on( 'click', '.backLokasi', function () {
        back2lokasi();
    } );

    $.ajax( {
        type: "GET",
        url: './getDokumen',
        dataType: "json",
        success: function ( data ) {
            var j = data.length;
            var post, i;
            $( 'select[name="cb_dokumen"]' ).empty();
            $( 'select[name="cb_dokumen"]' ).append( '<option value="0">---Pilih Dokumen RKPD---</option>' );
            for ( i = 0; i < j; i++ ) {
                post = data[ i ];
                $( 'select[name="cb_dokumen"]' ).append( '<option value="' + post.id_dokumen_rkpd + '">' + post.nomor_display + '</option>' );
            }
        }
    } );

    $( "#cb_dokumen" ).change( function () {
        id_dokumen_temp = $( '#cb_dokumen' ).val();
        $.ajax( {
            type: "GET",
            url: '../admin/parameter/getUnit',
            dataType: "json",

            success: function ( data ) {

                var j = data.length;
                var post, i;

                $( 'select[name="id_unit"]' ).empty();
                $( 'select[name="id_unit"]' ).append( '<option value="-1">---Pilih Unit---</option>' );

                for ( i = 0; i < j; i++ ) {
                    post = data[ i ];
                    $( 'select[name="id_unit"]' ).append( '<option value="' + post.id_unit + '">' + post.nm_unit + '</option>' );
                }
            }
        } );
    } );

    $.ajax( {
        type: "GET",
        url: '../admin/parameter/getSumberDana',
        dataType: "json",
        success: function ( data ) {

            var j = data.length;
            var post, i;

            $( 'select[name="sumber_dana"]' ).empty();
            $( 'select[name="sumber_dana"]' ).append( '<option value="0">---Pilih Sumber Dana---</option>' );

            for ( i = 0; i < j; i++ ) {
                post = data[ i ];
                $( 'select[name="sumber_dana"]' ).append( '<option value="' + post.id_sumber_dana + '">' + post.uraian_sumber_dana + '</option>' );
            }
        }
    } );

    $.ajax( {
        type: "GET",
        url: '../admin/parameter/getZonaSSH',
        dataType: "json",
        success: function ( data ) {

            var j = data.length;
            var post, i;

            //item belanja non ssh
            $( 'select[name="zona_ssh"]' ).empty();
            $( 'select[name="zona_ssh"]' ).append( '<option value="0">---Pilih Zona Wilayah SSH---</option>' );

            //load belanja asb
            $( 'select[name="zona_ssh_load"]' ).empty();
            $( 'select[name="zona_ssh_load"]' ).append( '<option value="0">---Pilih Zona Wilayah SSH---</option>' );

            for ( i = 0; i < j; i++ ) {
                post = data[ i ];
                $( 'select[name="zona_ssh"]' ).append( '<option value="' + post.id_zona + '">' + post.keterangan_zona + '</option>' );
                $( 'select[name="zona_ssh_load"]' ).append( '<option value="' + post.id_zona + '">' + post.keterangan_zona + '</option>' );
            }
        }
    } );

    $.ajax( {
        type: "GET",
        url: '../admin/parameter/getRefSatuan',
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

            $( 'select[name="id_satuan_1_aktivitas"]' ).empty();
            $( 'select[name="id_satuan_1_aktivitas"]' ).append( '<option value="-1">---Pilih Satuan---</option>' );
            $( 'select[name="id_satuan_1_aktivitas"]' ).append( '<option value="0">-- N/A --</option>' );

            $( 'select[name="id_satuan_2_aktivitas"]' ).empty();
            $( 'select[name="id_satuan_2_aktivitas"]' ).append( '<option value="-1">---Pilih Satuan---</option>' );
            $( 'select[name="id_satuan_2_aktivitas"]' ).append( '<option value="0">-- N/A --</option>' );

            $( 'select[name="id_satuan_1_lokasi"]' ).empty();
            $( 'select[name="id_satuan_1_lokasi"]' ).append( '<option value="-1">---Pilih Satuan---</option>' );
            $( 'select[name="id_satuan_1_lokasi"]' ).append( '<option value="0">-- N/A --</option>' );

            $( 'select[name="id_satuan_2_lokasi"]' ).empty();
            $( 'select[name="id_satuan_2_lokasi"]' ).append( '<option value="-1">---Pilih Satuan---</option>' );
            $( 'select[name="id_satuan_2_lokasi"]' ).append( '<option value="0">-- N/A --</option>' );

            $( 'select[name="id_satuan_1_rkpd_belanja"]' ).empty();
            $( 'select[name="id_satuan_1_rkpd_belanja"]' ).append( '<option value="-1">---Pilih Satuan---</option>' );
            $( 'select[name="id_satuan_1_rkpd_belanja"]' ).append( '<option value="0">-- N/A --</option>' );

            $( 'select[name="id_satuan_2_rkpd_belanja"]' ).empty();
            $( 'select[name="id_satuan_2_rkpd_belanja"]' ).append( '<option value="-1">---Pilih Satuan---</option>' );
            $( 'select[name="id_satuan_2_rkpd_belanja"]' ).append( '<option value="0">-- N/A --</option>' );

            $( 'select[name="id_satuan_1_apbd_belanja"]' ).empty();
            $( 'select[name="id_satuan_1_apbd_belanja"]' ).append( '<option value="-1">---Pilih Satuan---</option>' );
            $( 'select[name="id_satuan_1_apbd_belanja"]' ).append( '<option value="0">-- N/A --</option>' );

            $( 'select[name="id_satuan_2_apbd_belanja"]' ).empty();
            $( 'select[name="id_satuan_2_apbd_belanja"]' ).append( '<option value="-1">---Pilih Satuan---</option>' );
            $( 'select[name="id_satuan_2_apbd_belanja"]' ).append( '<option value="0">-- N/A --</option>' );

            for ( i = 0; i < j; i++ ) {
                post = data[ i ];
                $( 'select[name="id_satuan1"]' ).append( '<option value="' + post.id_satuan + '">' + post.uraian_satuan + '</option>' );
                $( 'select[name="id_satuan2"]' ).append( '<option value="' + post.id_satuan + '">' + post.uraian_satuan + '</option>' );
                $( 'select[name="id_satuan_1_aktivitas"]' ).append( '<option value="' + post.id_satuan + '">' + post.uraian_satuan + '</option>' );
                $( 'select[name="id_satuan_2_aktivitas"]' ).append( '<option value="' + post.id_satuan + '">' + post.uraian_satuan + '</option>' );
                $( 'select[name="id_satuan_1_lokasi"]' ).append( '<option value="' + post.id_satuan + '">' + post.uraian_satuan + '</option>' );
                $( 'select[name="id_satuan_2_lokasi"]' ).append( '<option value="' + post.id_satuan + '">' + post.uraian_satuan + '</option>' );
                $( 'select[name="id_satuan_1_rkpd_belanja"]' ).append( '<option value="' + post.id_satuan + '">' + post.uraian_satuan + '</option>' );
                $( 'select[name="id_satuan_2_rkpd_belanja"]' ).append( '<option value="' + post.id_satuan + '">' + post.uraian_satuan + '</option>' );
                $( 'select[name="id_satuan_1_apbd_belanja"]' ).append( '<option value="' + post.id_satuan + '">' + post.uraian_satuan + '</option>' );
                $( 'select[name="id_satuan_2_apbd_belanja"]' ).append( '<option value="' + post.id_satuan + '">' + post.uraian_satuan + '</option>' );
            }
        }
    } );

    var rekening;
    function loadRekeningSsh ( id, tarif ) {
        rekening = $( '#tblRekening' ).DataTable( {
            processing: true,
            serverSide: true,
            dom: 'BfrtIp',
            autoWidth: false,
            "ajax": { "url": "../admin/parameter/getRekeningSsh/" + id + "/" + tarif },
            "columns": [
                { data: 'no_urut' },
                { data: 'kd_rekening' },
                { data: 'nm_rekening' }
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } );
    };

    var cariProgramRen;
    $( document ).on( 'click', '.btnCariProgramRenstra', function () {
        $( '#judulModal' ).text( 'Daftar Program Renstra pada ' + $( '#id_unit option:selected' ).text() );
        $( '#cariProgramRenstra' ).modal( 'show' );
        cariProgramRen = $( '#tblCariProgramRenstra' ).DataTable( {
            processing: true,
            serverSide: true,
            dom: 'bfrtIp',
            autoWidth: false,
            "ajax": { "url": "../ranwalrenja/sesuai/getProgRenstra/" + unit_temp },
            "columns": [
                { data: 'no_urut', sClass: "dt-center" },
                { data: 'uraian_program_renstra' }
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } );
        $( '#tblCariProgramRen' ).DataTable().ajax.reload( null, false );
    } );

    $( '#tblCariProgramRenstra tbody' ).on( 'dblclick', 'tr', function () {
        var data = cariProgramRen.row( this ).data();
        document.getElementById( "id_program_renstra" ).value = data.id_program_renstra;
        document.getElementById( "uraian_program_renstra" ).value = data.uraian_program_renstra;
        $( '#cariProgramRenstra' ).modal( 'hide' );
    } );

    var cariKegiatanRen;
    $( document ).on( 'click', '.btnCariKegiatanRenstra', function () {
        if ( id_program_renstra_temp === null || id_program_renstra_temp === undefined || id_program_renstra_temp === "" ) {
            alert( 'Maaf Tidak ada kegiatan di Renstra SKPD' )
        } else {
            $( '#judulModal' ).text( 'Daftar Kegiatan Renstra pada ' + $( '#id_unit option:selected' ).text() );
            $( '#cariKegiatanRenstra' ).modal( 'show' );
            cariKegiatanRen = $( '#tblCariKegiatanRenstra' ).DataTable( {
                processing: true,
                serverSide: true,
                dom: 'bfrtIp',
                autoWidth: false,
                "ajax": { "url": "../ranwalrenja/sesuai/getKegRenstra/" + unit_temp + "/" + id_program_renstra_temp },
                "columns": [
                    { data: 'no_urut', sClass: "dt-center" },
                    { data: 'uraian_kegiatan_renstra' }
                ],
                "order": [ [ 0, 'asc' ] ],
                "bDestroy": true
            } );
            $( '#tblCariKegiatanRen' ).DataTable().ajax.reload( null, false );
        }
    } );

    $( '#tblCariKegiatanRenstra tbody' ).on( 'dblclick', 'tr', function () {
        var data = cariKegiatanRen.row( this ).data();
        document.getElementById( "id_kegiatan_renstra" ).value = data.id_kegiatan_renstra;
        document.getElementById( "ur_kegiatan_renstra" ).value = data.uraian_kegiatan_renstra;
        $( '#cariKegiatanRenstra' ).modal( 'hide' );
    } );

    var itemSSH;
    $( document ).on( 'click', '#btnparam_cari', function () {
        param = $( '#param_cari' ).val();
        itemSSH = $( '#tblItemSSH' ).DataTable( {
            processing: true,
            serverSide: true,
            dom: 'BfrtIp',
            "autoWidth": false,
            "ajax": { "url": "../renja/blang/getItemSSH/" + zona_temp + "/" + param.toLowerCase() },
            "columns": [
                { data: 'no_urut', sClass: "dt-center", width: "10px" },
                { data: 'uraian_sub_kelompok_ssh' },
                { data: 'uraian_tarif_ssh' },
                { data: 'uraian_satuan', sClass: "dt-center", width: "100px" },
                {
                    data: 'jml_rupiah', sClass: "dt-right",
                    render: $.fn.dataTable.render.number( '.', ',', 2, '' )
                },
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } );
    } );

    $( '#tblRekening tbody' ).on( 'dblclick', 'tr', function () {
        var data = rekening.row( this ).data();
        document.getElementById( "ur_rekening" ).value = data.kd_rekening + '--' + data.nm_rekening;
        document.getElementById( "id_rekening" ).value = data.id_rekening;
        $( '#cariRekening' ).modal( 'hide' );
    } );

    $( '#tblItemSSH tbody' ).on( 'dblclick', 'tr', function () {
        var data = itemSSH.row( this ).data();
        document.getElementById( "id_item_ssh" ).value = data.id_tarif_ssh;
        document.getElementById( "ur_item_ssh" ).value = data.uraian_tarif_ssh;
        document.getElementById( "rekening_ssh" ).value = data.jml_rekening;
        $( '#id_satuan_1_rkpd_belanja' ).val( data.id_satuan ).trigger( 'change' );
        $( '#harga_satuan_rkpd' ).val( data.jml_rupiah );
        $( '#jumlah_belanja_rkpd' ).val( hitungsatuan() );
        $( '#cariItemSSH' ).modal( 'hide' );
    } );

    var zona_tmp;
    $( document ).on( 'click', '.btnCariSSH', function () {
        zona_temp = $( '#zona_ssh' ).val();
        $( '#cariItemSSH' ).modal( 'show' );
    } );

    $( document ).on( 'click', '#btnCariRekening', function () {
        var x, y;
        if ( jns_belanja_temp == 0 ) { x = 0 }
        if ( jns_belanja_temp == 1 ) { x = 2 }
        if ( jns_belanja_temp == 2 ) { x = 3 }
        if ( jns_belanja_temp == 3 ) { x = 4 }
        if ( jns_belanja_temp == 4 ) { x = 4 }
        if ( $( '#rekening_ssh' ).val() == null ||
            $( '#rekening_ssh' ).val() == undefined ||
            $( '#rekening_ssh' ).val() == "" ) {
            y = 0;
        } else {
            y = $( '#id_item_ssh' ).val();
        }
        $( '#cariRekening' ).modal( 'show' );
        loadRekeningSsh( x, y );
    } );

    var cariLokasiDesa, cariLokasiTeknis, cariLokasiLuar;
    $.ajax( {
        type: "GET",
        url: '../admin/parameter/getKecamatan',
        dataType: "json",
        success: function ( data ) {
            var j = data.length;
            var post, i;
            $( 'select[name="kecamatan"]' ).empty();
            $( 'select[name="kecamatan"]' ).append( '<option value="0">---Pilih Kecamatan---</option>' );
            for ( i = 0; i < j; i++ ) {
                post = data[ i ];
                $( 'select[name="kecamatan"]' ).append( '<option value="' + post.id_kecamatan + '">' + post.nama_kecamatan + '</option>' );
            }
        }
    } );

    $( "#kecamatan" ).change( function () {
        cariLokasiDesa = $( '#tblLokasiWilayah' ).DataTable( {
            processing: true,
            serverSide: true,
            dom: 'bfrtIp',
            autoWidth: false,
            "ajax": { "url": "../renja/blang/getLokasiDesa/" + $( '#kecamatan' ).val() },
            "columns": [
                { data: 'no_urut', sClass: "dt-center" },
                { data: 'nama_lokasi' }
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } );
    } );

    $( document ).on( 'click', '#btnCariLokasi', function () {
        cariLokasiDesa = $( '#tblLokasiWilayah' ).DataTable( {
            processing: true,
            serverSide: true,
            dom: 'bfrtIp',
            autoWidth: false,
            "ajax": { "url": "../renja/blang/getLokasiDesa/0" },
            "columns": [
                { data: 'no_urut', sClass: "dt-center" },
                { data: 'nama_lokasi' }
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } );
        cariLokasiLuar = $( '#tblLokasiLuar' ).DataTable( {
            processing: true,
            serverSide: true,
            dom: 'bfrtIp',
            autoWidth: false,
            "ajax": { "url": "../renja/blang/getLokasiLuarDaerah" },
            "columns": [
                { data: 'no_urut', sClass: "dt-center" },
                { data: 'nama_lokasi' }
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } );
        $( '#cariLokasiModal' ).modal( 'show' );
    } );

    $( document ).on( 'click', '#btnCariLokasiTeknis', function () {
        cariLokasiTeknis = $( '#tblLokasiTeknis' ).DataTable( {
            processing: true,
            serverSide: true,
            dom: 'bfrtIp',
            autoWidth: false,
            "ajax": { "url": "../renja/blang/getLokasiTeknis" },
            "columns": [
                { data: 'no_urut', sClass: "dt-center" },
                { data: 'nama_lokasi' }
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } );
        $( '#cariLokasiTeknisModal' ).modal( 'show' );
    } );

    $( '#tblLokasiWilayah' ).on( 'dblclick', 'tr', function () {
        var data = cariLokasiDesa.row( this ).data();
        document.getElementById( "id_lokasi" ).value = data.id_lokasi;
        document.getElementById( "jenis_lokasi" ).value = data.jenis_lokasi;
        document.getElementById( "nm_lokasi" ).value = data.nama_lokasi;
        document.getElementById( "id_lokasi_pelaksana" ).value = data.id_lokasi;
        document.getElementById( "nm_lokasi_pelaksana" ).value = data.nama_lokasi;
        $( '#cariLokasiModal' ).modal( 'hide' );
    } );

    $( '#tblLokasiTeknis' ).on( 'dblclick', 'tr', function () {
        var data = cariLokasiTeknis.row( this ).data();
        document.getElementById( "id_lokasi_teknis" ).value = data.id_lokasi;
        document.getElementById( "nm_lokasi_teknis" ).value = data.nama_lokasi;
        document.getElementById( "id_lokasi_pelaksana" ).value = data.id_lokasi;
        document.getElementById( "nm_lokasi_pelaksana" ).value = data.nama_lokasi;
        $( '#cariLokasiTeknisModal' ).modal( 'hide' );
    } );

    $( '#tblLokasiLuar' ).on( 'dblclick', 'tr', function () {
        var data = cariLokasiLuar.row( this ).data();
        document.getElementById( "id_lokasi" ).value = data.id_lokasi;
        document.getElementById( "jenis_lokasi" ).value = data.jenis_lokasi;
        document.getElementById( "nm_lokasi" ).value = data.nama_lokasi;
        document.getElementById( "id_lokasi_pelaksana" ).value = data.id_lokasi;
        document.getElementById( "nm_lokasi_pelaksana" ).value = data.nama_lokasi;
        $( '#cariLokasiModal' ).modal( 'hide' );
    } );

    var CariSubUnit;
    $( document ).on( 'click', '#btnCariSubUnit', function () {
        $( '#CariSubUnit' ).modal( 'show' );
        CariSubUnit = $( '#tblCariSubUnit' ).DataTable( {
            processing: true,
            serverSide: true,
            dom: 'bfrtIp',
            autoWidth: false,
            "ajax": { "url": "../renja/blang/getSubUnit/" + unit_temp },
            "columns": [
                { data: 'no_urut', sClass: "dt-center" },
                { data: 'nm_sub' }
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } );
    } );

    $( '#tblCariSubUnit' ).on( 'dblclick', 'tr', function () {
        var data = CariSubUnit.row( this ).data();
        $( '#subunit_pelaksana' ).val( data.nm_sub );
        $( '#id_subunit_pelaksana' ).val( data.id_sub_unit );
        $( '#CariSubUnit' ).modal( 'hide' );
    } );

    var cariAktivitasASB;
    $( document ).on( 'click', '.btnCariASB', function () {
        $( '#cariAktivitasASB' ).modal( 'show' );
        cariAktivitasASB = $( '#tblCariAktivitasASB' ).DataTable( {
            processing: true,
            serverSide: true,
            dom: 'bfrtIp',
            autoWidth: false,
            "ajax": { "url": "../admin/parameter/getAktivitasASB/" + tahun_temp },
            "columns": [
                { data: 'no_urut', sClass: "dt-center" },
                { data: 'nm_aktivitas_asb' },
                { data: 'diskripsi_aktivitas' }
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } );
    } );

    $( '#tblCariAktivitasASB' ).on( 'dblclick', 'tr', function () {
        var data = cariAktivitasASB.row( this ).data();
        $( '#id_aktivitas_asb' ).val( data.id_aktivitas_asb );
        $( '#ur_aktivitas_kegiatan' ).val( data.nm_aktivitas_asb );
        $( '#id_satuan_1_aktivitas' ).val( data.id_satuan_1 ).trigger( 'change' );
        $( '#id_satuan_2_aktivitas' ).val( data.id_satuan_2 ).trigger( 'change' );
        $( '#cariAktivitasASB' ).modal( 'hide' );
    } );

    var cariProgramRef;
    $( document ).on( 'click', '.btnCariProgRef', function () {
        $( '#cariProgramRef' ).modal( 'show' );
        cariProgramRef = $( '#tblCariProgramRef' ).DataTable( {
            processing: true,
            serverSide: true,
            dom: 'BfRtIp',
            autoWidth: false,
            "ajax": { "url": "../renja/sesuai/getProgRef/" + bidang_temp },
            "columns": [
                { data: 'no_urut', sClass: "dt-center" },
                { data: 'kd_program', sClass: "dt-center" },
                { data: 'uraian_program' }
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } );
    } );

    $( '#tblCariProgramRef tbody' ).on( 'dblclick', 'tr', function () {
        var data = cariProgramRef.row( this ).data();
        $( '#ur_program_ref' ).val( data.kd_program + " - " + data.uraian_program );
        $( '#id_program_ref' ).val( data.id_program );
        $( '#ur_program_renja' ).val( data.uraian_program );
        $( '#cariProgramRef' ).modal( 'hide' );
    } );

    var cariKegiatanRef;
    $( document ).on( 'click', '.btnCariKegiatanRef', function () {
        $( '#cariKegiatanRef' ).modal( 'show' );
        cariKegiatanRef = $( '#tblCariKegiatanRef' ).DataTable( {
            processing: true,
            serverSide: true,
            dom: 'bfrtIp',
            autoWidth: false,
            "ajax": { "url": "../renja/sesuai/getKegRef/" + id_progref_temp },
            "columns": [
                { data: 'no_urut', sClass: "dt-center" },
                { data: 'kd_kegiatan', sClass: "dt-center" },
                { data: 'nm_kegiatan' }
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } );
    } );

    $( '#tblCariKegiatanRef tbody' ).on( 'dblclick', 'tr', function () {
        var data = cariKegiatanRef.row( this ).data();
        $( '#ur_kegiatan_forum' ).val( data.nm_kegiatan );
        $( '#ur_kegiatan_ref' ).val( data.kd_kegiatan + ' - ' + data.nm_kegiatan );
        $( '#id_kegiatan_ref' ).val( data.id_kegiatan );
        $( '#cariKegiatanRef' ).modal( 'hide' );
    } );

    var prog_rkpd_tbl, tblChildBidang;
    $( '#tblProgramRKPD' ).DataTable( {
        dom: 'BfRtip',
        autoWidth: false,
        bDestroy: true
    } );

    function loadTblProgRkpd ( tahun, unit ) {
        prog_rkpd_tbl = $( '#tblProgramRKPD' ).DataTable( {
            processing: true,
            serverSide: true,
            dom: 'BfRtip',
            "autoWidth": false,
            "ajax": { "url": "./getProgramRkpd/" + tahun + "/" + unit },
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
            "pageLength": 10,
            "lengthMenu": [ [ 10, 25, 50, -1 ], [ 10, 25, 50, "All" ] ],
            "columns": [
                {
                    "className": 'details-control',
                    "orderable": false,
                    "searchable": false,
                    "data": null,
                    "defaultContent": '',
                    "width": "5px"
                },
                { data: 'no_urut', sClass: "dt-center", width: "5px" },
                { data: 'uraian_program_rpjmd' },
                {
                    data: 'jml_program', sClass: "dt-center", width: "15px",
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' )
                },
                {
                    data: 'jml_kegiatan', sClass: "dt-center", width: "15px",
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' )
                },
                {
                    data: 'jml_pagu', sClass: "dt-center", width: "50px",
                    render: $.fn.dataTable.render.number( '.', ',', 2, '' )
                },
                {
                    data: 'jml_aktivitas', sClass: "dt-center", width: "15px",
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' )
                },
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

    function initTableBidang ( tableId, data ) {
        tblChildBidang = $( '#' + tableId ).DataTable( {
            processing: true,
            serverSide: true,
            ajax: data.details_url,
            dom: 'BFRtIP',
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
            "pageLength": 10,
            "lengthMenu": [ [ 10, 25, 50, -1 ], [ 10, 25, 50, "All" ] ],
            columns: [
                { data: 'action', 'searchable': false, 'orderable': false, sClass: "dt-center", width: "50px" },
                { data: 'kode_bid', name: 'kode_bid', sClass: "dt-center", width: '15%' },
                { data: 'nm_bidang', name: 'nm_bidang' }
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } )

        $( '#' + tableId + '  tbody' ).on( 'click', 'tr', function () {
            var data = tblChildBidang.row( this ).data();
            tahun_temp = data.tahun_rkpd;
            unit_temp = data.id_unit;
            PelaksanaRkpd_temp = data.id_pelaksana_rkpd;
            bidang_temp = data.id_bidang;
            ProgRkpd_temp = data.id_rkpd_program;
            akses_temp = data.hak_akses;

            $( '#nm_program_progrenja' ).text( data.uraian_program_rpjmd );
            if ( akses_temp == 0 ) {
                $( '#btnTambahProgRenja' ).hide();
                $( '#divTambahProg' ).hide();
            } else {
                $( '#btnTambahProgRenja' ).show();
                $( '#divTambahProg' ).show();
            }

            $( '.nav-tabs a[href="#program"]' ).tab( 'show' );
            loadTblProgRenja( unit_temp, PelaksanaRkpd_temp );
        } );
    };

    $( '#tblProgramRKPD tbody' ).on( 'click', 'td.details-control', function () {
        var tr = $( this ).closest( 'tr' );
        var row = prog_rkpd_tbl.row( tr );
        var tableId = 'bidang-' + row.data().id_unit + row.data().id_rkpd_program;
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

    $( document ).on( 'click', '.btnViewProgSkpd', function () {
        var data = tblChildBidang.row( $( this ).parents( 'tr' ) ).data();
        tahun_temp = data.tahun_forum;
        unit_temp = data.id_unit;
        PelaksanaRkpd_temp = data.id_pelaksana_rkpd;
        bidang_temp = data.id_bidang;
        ProgRkpd_temp = data.id_rkpd_program;
        akses_temp = data.hak_akses;
        $( '#nm_program_progrenja' ).text( data.uraian_program_rpjmd );
        if ( akses_temp == 0 ) {
            $( '#btnTambahProgRenja' ).hide();
            $( '#divTambahProg' ).hide();
        } else {
            $( '#btnTambahProgRenja' ).show();
            $( '#divTambahProg' ).show();
        }
        $( '.nav-tabs a[href="#program"]' ).tab( 'show' );
        loadTblProgRenja( unit_temp, PelaksanaRkpd_temp );
        back2renja();
    } );

    var prog_renja_tbl;
    $( '#tblProgram' ).DataTable( {
        dom: 'BfRtip',
        autoWidth: false,
        bDestroy: true
    } );

    function loadTblProgRenja ( unit, id_forum ) {
        prog_renja_tbl = $( '#tblProgram' ).DataTable( {
            processing: true,
            serverSide: true,
            dom: 'BfRtip',
            autoWidth: false,
            "ajax": { "url": "./getProgramRenja/" + unit + "/" + id_forum },
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
            "pageLength": 10,
            "lengthMenu": [ [ 10, 25, 50, -1 ], [ 10, 25, 50, "All" ] ],
            "columns": [
                {
                    "className": 'details-control',
                    "orderable": false,
                    "searchable": false,
                    "data": null,
                    "defaultContent": '',
                    "width": "5px"
                },
                { data: 'action', 'searchable': false, 'orderable': false },
                { data: 'urut', sClass: "dt-center", width: "5px" },
                { data: 'uraian_program' },
                {
                    data: 'pagu_rkpd', sClass: "dt-right",
                    render: $.fn.dataTable.render.number( '.', ',', 2, '' )
                },
                { data: 'jml_kegiatan', sClass: "dt-center" },
                { data: 'jml_0k', sClass: "dt-center" },
                {
                    data: 'jml_pagu', sClass: "dt-right",
                    render: $.fn.dataTable.render.number( '.', ',', 2, '' )
                },
                {
                    data: 'icon', 'searchable': false, 'orderable': false, sClass: "dt-center", width: "5px",
                    render: function ( data, type, row, meta ) {
                        return '<i class="' + row.status_icon + '" style="font-size:16px;color:' + row.warna + ';"/>';
                    }
                }
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } );
    };

    var tblInProg;
    function initInProg ( tableId, data ) {
        tblInProg = $( '#' + tableId ).DataTable( {
            processing: true,
            serverSide: true,
            ajax: data.details_url,
            dom: 'BfRtIp',
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
            "pageLength": 10,
            "lengthMenu": [ [ 10, 25, 50, -1 ], [ 10, 25, 50, "All" ] ],
            "columns": [
                { data: 'action', 'searchable': false, 'orderable': false, sClass: "dt-center" },
                { data: 'urut', sClass: "dt-center" },
                { data: 'uraian_indikator' },
                {
                    data: 'target_renstra', sClass: "dt-right",
                    render: $.fn.dataTable.render.number( '.', ',', 2, '' )
                },
                {
                    data: 'target_rkpd', sClass: "dt-right",
                    render: $.fn.dataTable.render.number( '.', ',', 2, '' )
                },
                {
                    data: 'icon', 'searchable': false, 'orderable': false, sClass: "dt-center",
                    render: function ( data, type, row, meta ) {
                        return '<i class="' + row.status_icon + '" style="font-size:16px;color:' + row.warna + ';"/>';
                    }
                }
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } )
    };

    $( '#tblProgram tbody' ).on( 'click', 'td.details-control', function () {
        var tr = $( this ).closest( 'tr' );
        var row = prog_renja_tbl.row( tr );
        var tableId = 'inProg-' + row.data().id_program_pd;
        if ( row.child.isShown() ) {
            row.child.hide();
            tr.removeClass( 'shown' );
        } else {
            row.child( detInProg( row.data() ) ).show();
            initInProg( tableId, row.data() );
            tr.addClass( 'shown' );
            tr.next().find( 'td' ).addClass( 'no-padding bg-gray' );
        }
    } );

    var keg_renja_tbl;
    $( '#tblKegiatanRenja' ).DataTable( {
        dom: 'BfRtip',
        autoWidth: false,
        bDestroy: true
    } );

    function loadTblKegiatanRenja ( id_program ) {
        keg_renja_tbl = $( '#tblKegiatanRenja' ).DataTable( {
            processing: true,
            serverSide: true,
            dom: 'BfRtip',
            autoWidth: false,
            "ajax": { "url": "./getKegiatanRenja/" + id_program },
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
            "pageLength": 10,
            "lengthMenu": [ [ 10, 25, 50, -1 ], [ 10, 25, 50, "All" ] ],
            "columns": [
                {
                    "className": 'details-control',
                    "orderable": false,
                    "searchable": false,
                    "data": null,
                    "defaultContent": '',
                    "width": "5px"
                },
                { data: 'action', 'searchable': false, 'orderable': false },
                { data: 'urut', sClass: "dt-center", width: "5px" },
                { data: 'uraian_kegiatan' },
                {
                    data: 'pagu_apbd', sClass: "dt-right",
                    render: $.fn.dataTable.render.number( '.', ',', 2, '' )
                },
                {
                    data: 'pagu_rkpd', sClass: "dt-right",
                    render: $.fn.dataTable.render.number( '.', ',', 2, '' )
                },
                { data: 'jml_aktivitas', sClass: "dt-center" },
                {
                    data: 'jml_pagu_aktivitas', sClass: "dt-right",
                    render: $.fn.dataTable.render.number( '.', ',', 2, '' )
                },
                {
                    data: 'icon', 'searchable': false, 'orderable': false, sClass: "dt-center", width: "5px",
                    render: function ( data, type, row, meta ) {
                        return '<i class="' + row.status_icon + '" style="font-size:16px;color:' + row.warna + ';"/>';
                    }
                }
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } );
    }

    function initInKeg ( tableId, data ) {
        tblInKeg = $( '#' + tableId ).DataTable( {
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
            "pageLength": 10,
            "lengthMenu": [ [ 10, 25, 50, -1 ], [ 10, 25, 50, "All" ] ],
            "columns": [
                { data: 'action', 'searchable': false, 'orderable': false, sClass: "dt-center" },
                { data: 'urut', sClass: "dt-center" },
                { data: 'nm_indikator' },
                {
                    data: 'target_renstra', sClass: "dt-right",
                    render: $.fn.dataTable.render.number( '.', ',', 2, '' )
                },
                {
                    data: 'target_rkpd', sClass: "dt-right",
                    render: $.fn.dataTable.render.number( '.', ',', 2, '' )
                },
                {
                    data: 'icon', 'searchable': false, 'orderable': false, sClass: "dt-center",
                    render: function ( data, type, row, meta ) {
                        return '<i class="' + row.status_icon + '" style="font-size:16px;color:' + row.warna + ';"/>';
                    }
                }
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } )
    };

    $( '#tblKegiatanRenja tbody' ).on( 'click', 'td.details-control', function () {
        var tr = $( this ).closest( 'tr' );
        var row = keg_renja_tbl.row( tr );
        var tableId = 'inKeg-' + row.data().id_kegiatan_pd;

        if ( row.child.isShown() ) {
            row.child.hide();
            tr.removeClass( 'shown' );
        } else {
            row.child( detInKeg( row.data() ) ).show();
            initInKeg( tableId, row.data() );
            tr.addClass( 'shown' );
            tr.next().find( 'td' ).addClass( 'no-padding bg-gray' );
        }
    } );

    var aktivitas_tbl;
    $( '#tblAktivitas' ).DataTable( {
        dom: 'BfRtip',
        autoWidth: false,
        bDestroy: true
    } );

    function loadTblAktivitas ( id_forum ) {
        aktivitas_tbl = $( '#tblAktivitas' ).DataTable( {
            processing: true,
            serverSide: true,
            dom: 'BfRtip',
            autoWidth: false,
            "ajax": { "url": "./getAktivitas/" + id_forum },
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
            "pageLength": 10,
            "lengthMenu": [ [ 10, 25, 50, -1 ], [ 10, 25, 50, "All" ] ],
            "columns": [
                { data: 'action', 'searchable': false, width: "20px", 'orderable': false },
                { data: 'urut', sClass: "dt-center", width: "5px" },
                {
                    data: 'uraian', 'searchable': false, 'orderable': false, sClass: "dt-left",
                    render: function ( data, type, row, meta ) {
                        return row.uraian_aktivitas + '  <span class="label" style="background-color: ' + row.status_warna + '; color:#fff;">' + row.status_label + '</span>';
                    }
                },
                {
                    data: 'pagu_aktivitas_rkpd', sClass: "dt-right",
                    render: $.fn.dataTable.render.number( '.', ',', 2, '' )
                },
                {
                    data: 'jml_belanja', sClass: "dt-right",
                    render: $.fn.dataTable.render.number( '.', ',', 2, '' )
                },
                {
                    data: 'jml_vol_1', sClass: "dt-right",
                    render: $.fn.dataTable.render.number( '.', ',', 2, '' )
                },
                {
                    data: 'jml_vol_2', sClass: "dt-right",
                    render: $.fn.dataTable.render.number( '.', ',', 2, '' )
                },
                {
                    data: 'icon', 'searchable': false, 'orderable': false, sClass: "dt-center", width: "5px",
                    render: function ( data, type, row, meta ) {
                        return '<i class="' + row.status_icon + '" style="color:' + row.warna + ';"/>';
                    }
                }
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } );
    };

    var pelaksana_tbl;
    $( '#tblPelaksana' ).DataTable( {
        dom: 'BfRtip',
        autoWidth: false,
        bDestroy: true
    } );

    function loadTblPelaksana ( id_aktivitas ) {
        pelaksana_tbl = $( '#tblPelaksana' ).DataTable( {
            processing: true,
            serverSide: true,
            dom: 'BfRtip',
            autoWidth: false,
            "ajax": { "url": "./getPelaksanaAktivitas/" + id_aktivitas },
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
            "pageLength": 10,
            "lengthMenu": [ [ 10, 25, 50, -1 ], [ 10, 25, 50, "All" ] ],
            "columns": [
                { data: 'action', 'searchable': false, 'orderable': false },
                { data: 'urut', sClass: "dt-center" },
                { data: 'nm_sub' },
                { data: 'nama_lokasi' },
                {
                    data: 'jml_pagu_aktivitas', sClass: "dt-right",
                    render: $.fn.dataTable.render.number( '.', ',', 2, '' )
                },
                {
                    data: 'jml_pagu', sClass: "dt-right",
                    render: $.fn.dataTable.render.number( '.', ',', 2, '' )
                },
                {
                    data: 'jml_lokasi', sClass: "dt-right",
                    render: $.fn.dataTable.render.number( '.', ',', 2, '' )
                }
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } );
    }

    var lokasi_tbl;
    $( '#tblLokasi' ).DataTable( {
        dom: 'BfRtip',
        autoWidth: false,
        bDestroy: true
    } );

    function loadTblLokasi ( id_pelaksana ) {
        lokasi_tbl = $( '#tblLokasi' ).DataTable( {
            processing: true,
            serverSide: true,
            dom: 'BfRtip',
            deferRender: true,
            autoWidth: false,
            "ajax": { "url": "./getLokasiAktivitas/" + id_pelaksana },
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
            "pageLength": 10,
            "lengthMenu": [ [ 10, 25, 50, -1 ], [ 10, 25, 50, "All" ] ],
            "columns": [
                { data: 'action', 'searchable': false, 'orderable': false },
                { data: 'no_urut', sClass: "dt-center" },
                { data: 'sumber_display', sClass: "dt-center" },
                { data: 'nama_lokasi' },
                {
                    data: 'volume_1', sClass: "dt-center", 'searchable': false, 'orderable': false,
                    render: $.fn.dataTable.render.number( '.', ',', 2, '' )
                },
                {
                    data: 'volume_2', sClass: "dt-center", 'searchable': false, 'orderable': false,
                    render: $.fn.dataTable.render.number( '.', ',', 2, '' )
                },
                { data: 'usulan_display', sClass: "dt-center" }
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } );
    };

    $( '#tblLokasi tbody' ).on( 'click', 'td.details-control', function () {
        var tr = $( this ).closest( 'tr' );
        var row = lokasi_tbl.row( tr );
        var tableId = 'usulan-' + row.data().id_lokasi_forum + row.data().id_pelaksana_forum;

        if ( row.child.isShown() ) {
            row.child.hide();
            tr.removeClass( 'shown' );
        } else {
            row.child( usulan( row.data() ) ).show();
            initTableUsulan( tableId, row.data() );
            tr.addClass( 'shown' );
            tr.next().find( 'td' ).addClass( 'no-padding bg-gray' );
        }
    } );

    var belanja_renja_tbl;
    $( '#tblBelanja' ).DataTable( {
        dom: 'BfRtip',
        autoWidth: false,
        bDestroy: true
    } );

    function loadTblBelanja ( lokasi ) {
        belanja_renja_tbl = $( '#tblBelanja' ).DataTable( {
            processing: true,
            serverSide: true,
            autoWidth: false,
            dom: 'BfRtip',
            "ajax": { "url": "./getBelanja/" + lokasi },
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
            "pageLength": 10,
            "lengthMenu": [ [ 10, 25, 50, -1 ], [ 10, 25, 50, "All" ] ],
            "columns": [
                { data: 'action', 'searchable': false, 'orderable': false },
                { data: 'no_urut', sClass: "dt-center" },
                { data: 'uraian_tarif_ssh' },
                {
                    data: 'volume_rkpd_1', sClass: "dt-right",
                    render: $.fn.dataTable.render.number( '.', ',', 2, '' )
                },
                {
                    data: 'volume_rkpd_2', sClass: "dt-right",
                    render: $.fn.dataTable.render.number( '.', ',', 2, '' )
                },
                {
                    data: 'koefisien_rkpd', sClass: "dt-right",
                    render: $.fn.dataTable.render.number( '.', ',', 2, '' )
                },
                {
                    data: 'harga_satuan_rkpd', sClass: "dt-right",
                    render: $.fn.dataTable.render.number( '.', ',', 2, '' )
                },
                {
                    data: 'jml_belanja_rkpd', sClass: "dt-right",
                    render: $.fn.dataTable.render.number( '.', ',', 2, '' )
                }
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } );
    };

    $( '#tblProgram tbody' ).on( 'dblclick', 'tr', function () {
        var data = prog_renja_tbl.row( this ).data();
        id_progrenja_temp = data.id_program_pd;
        id_progref_temp = data.id_program_ref;
        id_program_renstra_temp = data.id_program_renstra;
        jns_belanja_temp = data.jenis_belanja;

        $( '#nm_progrkpd_kegrenja' ).text( $( '#nm_program_progrenja' ).text() );
        $( '#nm_progrenja_kegrenja' ).text( data.uraian_program );

        if ( akses_temp == 0 ) {
            $( '#btnTambahKegiatan' ).hide();
            $( '#divTambahKegiatan' ).hide();
        } else {
            if ( data.status_data == 0 ) {
                $( '#btnTambahKegiatan' ).show();
                $( '#divTambahKegiatan' ).show();
            } else {
                $( '#btnTambahKegiatan' ).hide();
                $( '#divTambahKegiatan' ).hide();
            }
        }
        $( '.nav-tabs a[href="#kegiatan"]' ).tab( 'show' );
        loadTblKegiatanRenja( id_progrenja_temp );
        back2kegiatan();
    } );

    $( document ).on( 'click', '.view-kegiatan', function () {
        var data = prog_renja_tbl.row( $( this ).parents( 'tr' ) ).data();
        id_progrenja_temp = data.id_program_pd;
        id_progref_temp = data.id_program_ref;
        id_program_renstra_temp = data.id_program_renstra;
        jns_belanja_temp = data.jenis_belanja;
        $( '#nm_progrkpd_kegrenja' ).text( $( '#nm_program_progrenja' ).text() );
        $( '#nm_progrenja_kegrenja' ).text( data.uraian_program );
        if ( akses_temp == 0 ) {
            $( '#btnTambahKegiatan' ).hide();
            $( '#divTambahKegiatan' ).hide();
        } else {
            if ( data.status_data == 0 ) {
                $( '#btnTambahKegiatan' ).show();
                $( '#divTambahKegiatan' ).show();
            } else {
                $( '#btnTambahKegiatan' ).hide();
                $( '#divTambahKegiatan' ).hide();
            }
        }
        $( '.nav-tabs a[href="#kegiatan"]' ).tab( 'show' );
        loadTblKegiatanRenja( id_progrenja_temp );
        back2kegiatan();
    } );

    $( '#tblKegiatanRenja tbody' ).on( 'dblclick', 'tr', function () {
        var data = keg_renja_tbl.row( this ).data();
        id_kegrenja_temp = data.id_kegiatan_pd;
        $( '#nm_progrkpd_pelaksana' ).text( $( '#nm_program_progrenja' ).text() );
        $( '#nm_progrenja_pelaksana' ).text( $( '#nm_progrenja_kegrenja' ).text() );
        $( '#nm_kegrenja_pelaksana' ).text( data.uraian_kegiatan );

        if ( data.status_data == 0 ) {
            $( '#btnTambahPelaksana' ).show();
            $( '#btnTambahAktivitas' ).show();
            $( '#btnCopyAktivitas' ).show();
        } else {
            $( '#btnTambahPelaksana' ).hide();
            $( '#btnTambahAktivitas' ).hide();
            $( '#btnCopyAktivitas' ).hide();
        }

        $( '.nav-tabs a[href="#pelaksana"]' ).tab( 'show' );
        loadTblPelaksana( id_kegrenja_temp );
        back2pelaksana();
    } );

    $( document ).on( 'click', '#view-aktivitas', function () {

        var data = pelaksana_tbl.row( $( this ).parents( 'tr' ) ).data();

        sub_unit_temp = data.nm_sub;
        id_pelaksana_temp = data.id_pelaksana_pd;

        $( '#nm_progrkpd_aktivitas' ).text( $( '#nm_program_progrenja' ).text() );
        $( '#nm_progrenja_aktivitas' ).text( $( '#nm_progrenja_kegrenja' ).text() );
        $( '#nm_kegrenja_aktivitas' ).text( $( '#nm_kegrenja_aktivitas' ).text() );
        $( '#nm_aktivitas_pelaksana' ).text( data.nm_sub );

        $( '.nav-tabs a[href="#aktivitas"]' ).tab( 'show' );
        if ( data.status_kegiatan == 0 ) {
            $( '#btnTambahAktivitas' ).show();
            $( '#btnCopyAktivitas' ).show();
        } else {
            $( '#btnTambahAktivitas' ).hide();
            $( '#btnCopyAktivitas' ).hide();
        }
        loadTblAktivitas( id_pelaksana_temp );
        back2aktivitas();
    } );

    $( '#tblAktivitas tbody' ).on( 'dblclick', 'tr', function () {
        var data = aktivitas_tbl.row( this ).data();
        id_aktivitas_temp = data.id_aktivitas_pd;
        id_asb_temp = data.id_aktivitas_asb;
        id_satuan_1_aktiv_temp = data.id_satuan_1;
        id_satuan_2_aktiv_temp = data.id_satuan_2;
        sumber_aktivitas_temp = data.sumber_aktivitas;
        nm_sat_asb1 = data.ur_satuan_1;
        nm_sat_asb2 = data.ur_satuan_2;
        vol1_temp = data.volume_aktivitas_1;
        vol2_temp = data.volume_aktivitas_2;

        $( '#nm_progrkpd_belanja' ).text( $( '#nm_program_progrenja' ).text() );
        $( '#nm_progrenja_belanja' ).text( $( '#nm_progrenja_kegrenja' ).text() );
        $( '#nm_kegrenja_belanja' ).text( $( '#nm_kegrenja_aktivitas' ).text() );
        $( '#nm_aktivitas_belanja' ).text( data.uraian_aktivitas );
        $( '#nm_sub_belanja' ).text( $( '#nm_aktivitas_pelaksana' ).text() );

        if ( data.status_data == 0 ) {
            if ( data.sumber_aktivitas == 0 ) {
                $( '#divAddSSH' ).hide();
                $( '#divImportASB' ).show();
            } else {
                $( '#divAddSSH' ).show();
                $( '#divImportASB' ).hide();
            }
        } else {
            $( '#divAddSSH' ).hide();
            $( '#divImportASB' ).hide();
        }

        $( '.nav-tabs a[href="#belanja"]' ).tab( 'show' );
        loadTblBelanja( id_aktivitas_temp );
    } );

    $( document ).on( 'click', '#btnViewPelaksana', function () {
        var data = keg_renja_tbl.row( $( this ).parents( 'tr' ) ).data();
        id_kegrenja_temp = data.id_kegiatan_pd;

        $( '#nm_progrkpd_pelaksana' ).text( $( '#nm_program_progrenja' ).text() );
        $( '#nm_progrenja_pelaksana' ).text( $( '#nm_progrenja_kegrenja' ).text() );
        $( '#nm_kegrenja_pelaksana' ).text( data.uraian_kegiatan );

        if ( data.status_data == 0 ) {
            $( '#btnTambahPelaksana' ).show();
            $( '#btnTambahAktivitas' ).show();
            $( '#btnCopyAktivitas' ).show();
        } else {
            $( '#btnTambahPelaksana' ).hide();
            $( '#btnTambahAktivitas' ).hide();
            $( '#btnCopyAktivitas' ).hide();
        }

        $( '.nav-tabs a[href="#pelaksana"]' ).tab( 'show' );
        loadTblPelaksana( id_kegrenja_temp );
        back2pelaksana();
    } );

    $( '#tblPelaksana tbody' ).on( 'dblclick', 'tr', function () {
        var data = pelaksana_tbl.row( this ).data();
        sub_unit_temp = data.nm_sub;
        id_pelaksana_temp = data.id_pelaksana_pd;
        $( '#nm_progrkpd_aktivitas' ).text( $( '#nm_program_progrenja' ).text() );
        $( '#nm_progrenja_aktivitas' ).text( $( '#nm_progrenja_kegrenja' ).text() );
        $( '#nm_kegrenja_aktivitas' ).text( $( '#nm_kegrenja_pelaksana' ).text() );
        $( '#nm_aktivitas_pelaksana' ).text( data.nm_sub );

        $( '.nav-tabs a[href="#aktivitas"]' ).tab( 'show' );
        if ( data.status_kegiatan == 0 ) {
            $( '#btnTambahAktivitas' ).show();
            $( '#btnCopyAktivitas' ).show();
        } else {
            $( '#btnTambahAktivitas' ).hide();
            $( '#btnCopyAktivitas' ).hide();
        }
        loadTblAktivitas( id_pelaksana_temp );
        back2aktivitas();
    } );

    $( document ).on( 'click', '#btnViewLokasi', function () {
        var data = aktivitas_tbl.row( $( this ).parents( 'tr' ) ).data();
        id_aktivitas_temp = data.id_aktivitas_pd;
        id_asb_temp = data.id_aktivitas_asb;
        id_satuan_1_aktiv_temp = data.id_satuan_1;
        id_satuan_2_aktiv_temp = data.id_satuan_2;
        sumber_aktivitas_temp = data.sumber_aktivitas;
        nm_sat_asb1 = data.ur_satuan_1;
        nm_sat_asb2 = data.ur_satuan_2;
        vol1_temp = data.volume_aktivitas_1;
        vol2_temp = data.volume_aktivitas_2;

        $( '#nm_progrkpd_lokasi' ).text( $( '#nm_program_progrenja' ).text() );
        $( '#nm_progrenja_lokasi' ).text( $( '#nm_progrenja_kegrenja' ).text() );
        $( '#nm_kegrenja_lokasi' ).text( $( '#nm_kegrenja_pelaksana' ).text() );
        $( '#nm_aktivitas_lokasi' ).text( data.uraian_aktivitas );
        $( '#nm_sub_lokasi' ).text( $( '#nm_aktivitas_pelaksana' ).text() );
        $( '#id_satuan_1_lokasi' ).val( id_satuan_1_aktiv_temp ).trigger( 'change' );
        $( '#id_satuan_2_lokasi' ).val( id_satuan_2_aktiv_temp ).trigger( 'change' );

        if ( data.status_data == 0 ) {
            $( '#btnTambahLokasi' ).show();
        } else {
            $( '#btnTambahLokasi' ).hide();
        }

        $( '.nav-tabs a[href="#lokasi"]' ).tab( 'show' );
        loadTblLokasi( id_aktivitas_temp );
        back2lokasi();
    } );

    $( document ).on( 'click', '#btnViewBelanja', function () {
        var data = aktivitas_tbl.row( $( this ).parents( 'tr' ) ).data();

        id_aktivitas_temp = data.id_aktivitas_pd;
        id_asb_temp = data.id_aktivitas_asb;
        id_satuan_1_aktiv_temp = data.id_satuan_1;
        id_satuan_2_aktiv_temp = data.id_satuan_2;
        sumber_aktivitas_temp = data.sumber_aktivitas;
        nm_sat_asb1 = data.ur_satuan_1;
        nm_sat_asb2 = data.ur_satuan_2;
        vol1_temp = data.jml_vol_1;
        vol2_temp = data.jml_vol_2;

        $( '#nm_progrkpd_belanja' ).text( $( '#nm_program_progrenja' ).text() );
        $( '#nm_progrenja_belanja' ).text( $( '#nm_progrenja_kegrenja' ).text() );
        $( '#nm_kegrenja_belanja' ).text( $( '#nm_kegrenja_aktivitas' ).text() );
        $( '#nm_aktivitas_belanja' ).text( data.uraian_aktivitas );
        $( '#nm_sub_belanja' ).text( $( '#nm_aktivitas_pelaksana' ).text() );

        if ( data.status_data == 0 ) {
            if ( data.sumber_aktivitas == 0 ) {
                $( '#divAddSSH' ).hide();
                $( '#divImportASB' ).show();
            } else {
                $( '#divAddSSH' ).show();
                $( '#divImportASB' ).hide();
            }
        } else {
            $( '#divAddSSH' ).hide();
            $( '#divImportASB' ).hide();
        }

        $( '.nav-tabs a[href="#belanja"]' ).tab( 'show' );
        loadTblBelanja( id_aktivitas_temp );
    } );

    $( "#id_unit" ).change( function () {
        tahun_temp = $( '#tahun_rkpd' ).val();
        unit_temp = $( '#id_unit' ).val();
        $( '.nav-tabs a[href="#programrkpd"]' ).tab( 'show' );
        loadTblProgRkpd( tahun_temp, unit_temp );
    } );

    function getStatusPelaksanaanProgRenja () {

        var xCheck = document.querySelectorAll( 'input[name="status_pelaksanaan_progrenja"]:checked' );
        var xyz = [];
        for ( var x = 0, l = xCheck.length; x < l; x++ ) { xyz.push( xCheck[ x ].value ); }
        var xvalues = xyz.join( '' );
        return xvalues;
    }

    $( document ).on( 'click', '.add-ProgRenja', function () {
        $( '.btnProgRenja' ).addClass( 'addProgRenja' );
        $( '.btnProgRenja' ).removeClass( 'editProgRenja' );
        $( '#id_forum_program' ).val( null );
        $( '#id_pelaksana_prog_pd' ).val( PelaksanaRkpd_temp );
        $( '#tahun_forum_progrenja' ).val( tahun_temp );
        $( '#uraian_program_renstra' ).val( null );
        $( '#id_unit_progrenja' ).val( unit_temp );
        $( '#jenis_belanja' ).val( 0 ).trigger( 'change' );
        $( '#ur_program_renja' ).val( null );
        $( '#id_renja_program' ).val( null );
        $( '#ur_program_ref' ).val( null );
        $( '#id_program_ref' ).val( null );
        $( '#pagu_renstra_program' ).val( null );
        $( '#pagu_apbd_program' ).val( null );
        $( '#pagu_renja_program' ).val( null );
        $( '#keterangan_status_progrenja' ).val( null );
        document.frmProgRenja.status_pelaksanaan_progrenja[ 4 ].checked = true;
        $( '#idStatusPelaksanaan' ).hide();
        $( '#btnHapusProgRenja' ).hide();
        $( '.btnCariProgramRenstra' ).show();
        $( '.btnCariProgRef' ).show();
        $( '.modal-title' ).text( "Tambah Program RKPD-SKPD" );
        $( '#ModalProgRenja' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.addProgRenja', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './AddProgRenja',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_pelaksana_rkpd': $( '#id_pelaksana_prog_pd' ).val(),
                'id_unit': $( '#id_unit_progrenja' ).val(),
                'jenis_belanja': $( '#jenis_belanja' ).val(),
                'id_program_renstra': $( '#id_program_renstra' ).val(),
                'id_program_ref': $( '#id_program_ref' ).val(),
                'pagu_rkpd': $( '#pagu_renja_program' ).val(),
                'ket_usulan': $( '#keterangan_status_progrenja' ).val(),
            },
            success: function ( data ) {
                $( '#tblProgram' ).DataTable().ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            }
        } );
    } );

    $( document ).on( 'click', '.edit-ProgRenja', function () {
        var data = prog_renja_tbl.row( $( this ).parents( 'tr' ) ).data();
        $( '.btnProgRenja' ).removeClass( 'addProgRenja' );
        $( '.btnProgRenja' ).addClass( 'editProgRenja' );
        $( '#id_forum_program' ).val( data.id_program_pd );
        $( '#id_pelaksana_prog_pd' ).val( data.id_pelaksana_rkpd );
        $( '#jenis_belanja' ).val( data.jenis_belanja );
        $( '#id_unit_progrenja' ).val( data.id_unit );
        $( '#id_program_renstra' ).val( data.id_program_renstra );
        $( '#uraian_program_renstra' ).val( data.program_renstra );
        $( '#ur_program_renja' ).val( data.uraian_program_renstra );
        $( '#id_renja_program' ).val( data.id_renja_program );
        $( '#ur_program_ref' ).val( data.uraian_program );
        $( '#id_program_ref' ).val( data.id_program_ref );
        $( '#pagu_renstra_program' ).val( data.pagu_tahun_renstra );
        $( '#pagu_apbd_program' ).val( data.pagu_apbd );
        $( '#pagu_renja_program' ).val( data.pagu_rkpd );
        $( '#keterangan_status_progrenja' ).val( data.ket_usulan );
        document.frmProgRenja.status_pelaksanaan_progrenja[ data.status_pelaksanaan ].checked = true;
        $( '#sumber_data_progrenja' ).val( data.sumber_data );
        $( '#status_data_progrenja' ).val( data.status_data );
        $( '.modal-title' ).text( "Edit Program SKPD" );

        if ( data.sumber_data == 0 ) {
            $( '.btnHapusProgRenja' ).hide();
            $( '.btnCariProgramRenstra' ).hide();
            $( '.btnCariProgRef' ).hide();
            $( '.ur_program_renja' ).attr( 'disabled', 'disabled' );
            $( '#idStatusPelaksanaan' ).show();
        } else {
            $( '.btnHapusProgRenja' ).show();
            $( '.btnCariProgramRenstra' ).show();
            $( '.btnCariProgRef' ).show();
            $( '.ur_program_renja' ).removeAttr( "disabled" );
            $( '#idStatusPelaksanaan' ).hide();
        }

        $( '#ModalProgRenja' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.editProgRenja', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './editProgRenja',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_program_pd': $( '#id_forum_program' ).val(),
                'id_unit': $( '#id_unit_progrenja' ).val(),
                'jenis_belanja': $( '#jenis_belanja' ).val(),
                'id_program_renstra': $( '#id_program_renstra' ).val(),
                'id_program_ref': $( '#id_program_ref' ).val(),
                'pagu_rkpd': $( '#pagu_renja_program' ).val(),
                'status_pelaksanaan': getStatusPelaksanaanProgRenja(),
                'ket_usulan': $( '#keterangan_status_progrenja' ).val(),
            },
            success: function ( data ) {
                $( '#tblProgram' ).DataTable().ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            }
        } );
    } );

    $( document ).on( 'click', '.btnHapusProgRenja', function () {
        $( '#id_forum_program_hapus' ).val( $( '#id_forum_program' ).val() );
        $( '#ur_progrenja_hapus' ).text( $( '#ur_program_renja' ).val() );
        $( '#HapusProgRenja' ).modal( 'show' );
    } );

    $( document ).on( 'click', '.btnDelProgRenja', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './hapusProgRenja',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_program_pd': $( '#id_forum_program_hapus' ).val()
            },
            success: function ( data ) {
                $( '#ModalProgRenja' ).modal( 'hide' );
                $( '#tblProgram' ).DataTable().ajax.reload( null, false );;
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            }
        } );
    } );

    function getStatusPelaksanaanKegRenja () {
        var xCheck = document.querySelectorAll( 'input[name="status_pelaksanaan_kegrenja"]:checked' );
        var xyz = [];
        for ( var x = 0, l = xCheck.length; x < l; x++ ) { xyz.push( xCheck[ x ].value ); }
        var xvalues = xyz.join( '' );
        return xvalues;
    };

    $( '.sp_kegrenja' ).change( function () {
        if ( document.frmModalKegiatan.status_pelaksanaan_kegrenja.value == 0 ) {
            document.getElementById( "keterangan_status_kegiatan" ).setAttribute( "disabled", "disabled" );
            $( '.KetPelaksanaan_keg' ).hide();
        } else {
            document.getElementById( "keterangan_status_kegiatan" ).removeAttribute( "disabled" );
            $( '.KetPelaksanaan_keg' ).show();
        }
    } );

    $( document ).on( 'click', '#btnTambahKegiatan', function () {
        $( '.btnKegiatan' ).addClass( 'addKegRenja' );
        $( '.btnKegiatan' ).removeClass( 'editKegRenja' );
        $( '#id_forum_skpd' ).val( null );
        $( '#id_forum_program_kegrej' ).val( id_progrenja_temp );
        $( '#id_unit_kegrej' ).val( unit_temp );
        $( '#id_kegiatan_renstra' ).val( null );
        $( '#id_kegiatan_ref' ).val( null );
        $( '#ur_kegiatan_renstra' ).val( null );
        $( '#ur_kegiatan_ref' ).val( null );
        $( '#pagu_renstra' ).val( 0 );
        $( '#pagu_renja_kegiatan' ).val( 0 );
        $( '#pagu_selanjutnya' ).val( 0 );
        $( '#pagu_renstra_forum' ).val( 0 );
        $( '#pagu_renja_kegiatan_forum' ).val( 0 );
        $( '#pagu_selanjutnya_forum' ).val( 0 );
        $( '#keterangan_status_kegiatan' ).val( null );
        document.frmModalKegiatan.status_pelaksanaan_kegrenja[ 4 ].checked = true;
        $( '#keterangan_status_kegiatan' ).removeAttr( "disabled" );
        $( '#btnCariKegiatanRef' ).show();
        $( '#btnCariKegiatanRenstra' ).show();
        $( '#btnHapusKegRenja' ).hide();
        $( '#idStatuskegrenja' ).hide();
        $( '.modal-title' ).text( "Tambah Kegiatan SKPD" );
        $( '#ModalKegiatan' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.addKegRenja', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './addKegRenja',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_program_pd': $( '#id_forum_program_kegrej' ).val(),
                'id_unit': $( '#id_unit_kegrej' ).val(),
                'id_kegiatan_renstra': $( '#id_kegiatan_renstra' ).val(),
                'id_kegiatan_ref': $( '#id_kegiatan_ref' ).val(),
                'pagu_plus1_rkpd': $( '#pagu_selanjutnya_forum' ).val(),
                'pagu_rkpd': $( '#pagu_renja_kegiatan_forum' ).val(),
                'keterangan_status': $( '#keterangan_status_kegiatan' ).val(),
            },
            success: function ( data ) {
                $( '#tblKegiatanRenja' ).DataTable().ajax.reload( null, false );
                $( '#tblProgram' ).DataTable().ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            }
        } );
    } );

    $( document ).on( 'click', '#edit-kegiatan', function () {
        var data = keg_renja_tbl.row( $( this ).parents( 'tr' ) ).data();
        $( '.btnKegiatan' ).removeClass( 'addKegRenja' );
        $( '.btnKegiatan' ).addClass( 'editKegRenja' );
        $( '#id_forum_skpd' ).val( data.id_kegiatan_pd );
        $( '#id_forum_program_kegrej' ).val( data.id_program_pd );
        $( '#id_unit_kegrej' ).val( data.id_unit );
        $( '#id_kegiatan_renstra' ).val( data.id_kegiatan_renstra );
        $( '#id_kegiatan_ref' ).val( data.id_kegiatan_ref );
        $( '#ur_kegiatan_ref' ).val( data.uraian_kegiatan );
        $( '#keterangan_status_kegiatan' ).val( data.keterangan_status );
        document.frmModalKegiatan.status_pelaksanaan_kegrenja[ data.status_pelaksanaan ].checked = true;
        $( '#ur_kegiatan_renstra' ).val( data.uraian_kegiatan_renstra );
        $( '#pagu_renstra' ).val( data.pagu_tahun_renstra );
        $( '#pagu_renja_kegiatan' ).val( data.pagu_apbd );
        $( '#pagu_selanjutnya' ).val( data.pagu_plus1_apbd );
        $( '#pagu_renstra_forum' ).val( data.pagu_tahun_renstra );
        $( '#pagu_renja_kegiatan_forum' ).val( data.pagu_rkpd );
        $( '#pagu_selanjutnya_forum' ).val( data.pagu_plus1_rkpd );

        if ( data.status_pelaksanaan == 0 ) {
            $( "#keterangan_status_kegiatan" ).attr( "disabled", "disabled" );
            $( '.KetPelaksanaan_keg' ).hide();
        } else {
            $( "#keterangan_status_kegiatan" ).removeAttr( "disabled" );
            $( '.KetPelaksanaan_keg' ).show();
        }

        $( '.sp_kegrenja' ).change( function () {
            if ( document.frmModalKegiatan.status_pelaksanaan_kegrenja.value == 0 ) {
                document.getElementById( "keterangan_status_kegiatan" ).setAttribute( "disabled", "disabled" );
                $( '.KetPelaksanaan_keg' ).hide();
            } else {
                document.getElementById( "keterangan_status_kegiatan" ).removeAttribute( "disabled" );
                $( '.KetPelaksanaan_keg' ).show();
            }
        } );

        if ( data.sumber_data == 0 ) {
            $( '#btnHapusKegRenja' ).hide();
            $( '#btnCariKegiatanRef' ).hide();
            $( '#btnCariKegiatanRenstra' ).hide();
            $( '#idStatuskegrenja' ).show();
        } else {
            $( '#keterangan_status_kegiatan' ).removeAttr( "disabled" );
            $( '#btnCariKegiatanRef' ).show();
            $( '#btnCariKegiatanRenstra' ).show();
            $( '#btnHapusKegRenja' ).show();
            $( '#idStatuskegrenja' ).hide();
        }
        $( '.modal-title' ).text( "Edit Data Kegiatan SKPD" );
        $( '#ModalKegiatan' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.editKegRenja', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './editKegRenja',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_kegiatan_pd': $( '#id_forum_skpd' ).val(),
                'id_program_pd': $( '#id_forum_program_kegrej' ).val(),
                'id_kegiatan_renstra': $( '#id_kegiatan_renstra' ).val(),
                'id_kegiatan_ref': $( '#id_kegiatan_ref' ).val(),
                'pagu_plus1_rkpd': $( '#pagu_selanjutnya_forum' ).val(),
                'pagu_rkpd': $( '#pagu_renja_kegiatan_forum' ).val(),
                'keterangan_status': $( '#keterangan_status_kegiatan' ).val(),
                'status_pelaksanaan': getStatusPelaksanaanKegRenja(),
            },
            success: function ( data ) {
                $( '#tblKegiatanRenja' ).DataTable().ajax.reload( null, false );
                $( '#tblProgram' ).DataTable().ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            }
        } );
    } );

    $( document ).on( 'click', '#btnHapusKegRenja', function () {
        $( '#id_forum_hapus' ).val( $( '#id_forum_skpd' ).val() );
        $( '#ur_kegrenja_hapus' ).text( $( '#ur_kegiatan_ref' ).val() );
        $( '#HapusKegRenja' ).modal( 'show' );
    } );

    $( document ).on( 'click', '#btnDelKegRenja', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './hapusKegRenja',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_kegiatan_pd': $( '#id_forum_hapus' ).val()
            },
            success: function ( data ) {
                $( '#ModalKegiatan' ).modal( 'hide' );
                $( '#tblProgram' ).DataTable().ajax.reload( null, false );
                $( '#tblKegiatanRenja' ).DataTable().ajax.reload( null, false );
                createPesan( data.pesan, "info" );
            }
        } );
    } );

    $( ".sumber_aktivitas" ).change( function () {
        if ( document.frmModalAktivitas.sumber_aktivitas.value == 0 ) {
            document.getElementById( "ur_aktivitas_kegiatan" ).setAttribute( "disabled", "disabled" );
            $( '.btnCariASB' ).show();
            $( '#id_satuan_publik' ).removeAttr( "disabled" );
        } else {
            document.getElementById( "ur_aktivitas_kegiatan" ).removeAttribute( "disabled" );
            $( '.btnCariASB' ).hide();
            $( '#id_satuan_publik' ).attr( "disabled", "disabled" );
        }
    } );

    $( ".jenis_pembahasan" ).change( function () {
        if ( document.frmModalAktivitas.jenis_pembahasan.value == 0 ) {
            $( '#persen_musren_aktivitas' ).val( 0 );
            $( '#pagu_musren_aktivitas' ).val( 0 );
            document.getElementById( "persen_musren_aktivitas" ).setAttribute( "disabled", "disabled" );
            $( '#id_satuan_publik' ).attr( "disabled", "disabled" );
            $( '#id_satuan_publik' ).val( -1 );
        } else {
            $( '#persen_musren_aktivitas' ).val( 0 );
            $( '#pagu_musren_aktivitas' ).val( 0 );
            document.getElementById( "persen_musren_aktivitas" ).removeAttribute( "disabled" );
            $( '#id_satuan_publik' ).removeAttr( "disabled" );
        }
    } );

    $( "#id_satuan_1_aktivitas" ).change( function () {
        $( '#ur_sat_utama1' ).text( $( '#id_satuan_1_aktivitas option:selected' ).text() );
        $( '#ur_sat_utama2' ).text( $( '#id_satuan_2_aktivitas option:selected' ).text() );
    } );

    $( "#id_satuan_2_aktivitas" ).change( function () {
        $( '#ur_sat_utama1' ).text( $( '#id_satuan_1_aktivitas option:selected' ).text() );
        $( '#ur_sat_utama2' ).text( $( '#id_satuan_2_aktivitas option:selected' ).text() );

        if ( $( "#id_satuan_2_aktivitas" ).val() == 0 || $( "#id_satuan_2_aktivitas" ).val() == -1 ) {
            document.frmModalAktivitas.satuan_utama[ 0 ].checked = true;
            $( ':radio[name=satuan_utama]:not(:checked)' ).attr( 'disabled', true );
        } else {
            $( ':radio[name=satuan_utama]:not(:checked)' ).attr( 'disabled', false );
        }


    } );

    function getSumberASB () {

        var xCheck = document.querySelectorAll( 'input[name="sumber_aktivitas"]:checked' );
        var xyz = [];
        for ( var x = 0, l = xCheck.length; x < l; x++ ) { xyz.push( xCheck[ x ].value ); }
        var xvalues = xyz.join( '' );
        return xvalues;
    }

    function getJenisKegiatan () {

        var xCheck = document.querySelectorAll( 'input[name="jenis_aktivitas"]:checked' );
        var xyz = [];
        for ( var x = 0, l = xCheck.length; x < l; x++ ) { xyz.push( xCheck[ x ].value ); }
        var xvalues = xyz.join( '' );
        return xvalues;
    }

    function getJenisPembahasan () {

        var xCheck = document.querySelectorAll( 'input[name="jenis_pembahasan"]:checked' );
        var xyz = [];
        for ( var x = 0, l = xCheck.length; x < l; x++ ) { xyz.push( xCheck[ x ].value ); }
        var xvalues = xyz.join( '' );
        return xvalues;
    }

    function getStatusPelaksanaanAktivitas () {

        var xCheck = document.querySelectorAll( 'input[name="status_pelaksanaan_aktivitas"]:checked' );
        var xyz = [];
        for ( var x = 0, l = xCheck.length; x < l; x++ ) { xyz.push( xCheck[ x ].value ); }
        var xvalues = xyz.join( '' );
        return xvalues;
    }

    function getSatuanUtamaAktivitas () {

        var xCheck = document.querySelectorAll( 'input[name="satuan_utama"]:checked' );
        var xyz = [];
        for ( var x = 0, l = xCheck.length; x < l; x++ ) { xyz.push( xCheck[ x ].value ); }
        var xvalues = xyz.join( '' );
        return xvalues;
    }

    $( document ).on( 'click', '#btnTambahAktivitas', function () {

        $( '#btnAktivitas' ).addClass( 'addAktivitas' );
        $( '#btnAktivitas' ).removeClass( 'editAktivitas' );
        $( '.form-horizontal' ).show();
        $( '.modal-title' ).text( 'Tambah Aktivitas Kegiatan SKPD' );
        $( '#id_forum_aktivitas' ).val( id_pelaksana_temp );
        $( '#id_aktivitas_pd' ).val( null );
        document.frmModalAktivitas.sumber_aktivitas[ 0 ].checked = true;
        $( '#ur_aktivitas_kegiatan' ).val( null );
        $( '#id_aktivitas_asb' ).val( null );
        document.frmModalAktivitas.jenis_aktivitas[ 0 ].checked = true;
        $( '#sumber_dana' ).val( 0 ).trigger( 'change' );
        $( '#pagu_aktivitas_apbd' ).val( 0 );
        $( '#pagu_aktivitas_rkpd' ).val( 0 );
        document.frmModalAktivitas.status_pelaksanaan_aktivitas[ 0 ].checked = true;
        $( '#keterangan_status_aktivitas' ).val( null );
        $( '#volume_1_aktivitas' ).val( 0 );
        $( '#volume_2_aktivitas' ).val( 0 );
        $( '#id_satuan_1_aktivitas' ).val( -1 );
        $( '#id_satuan_2_aktivitas' ).val( -1 );
        $( '#id_satuan_publik' ).attr( "disabled", "disabled" );
        document.frmModalAktivitas.satuan_utama[ 0 ].checked = true;
        $( '#keterangan_status_aktivitas' ).removeAttr( "disabled" );
        $( '#btnCariASB' ).show();
        $( '#btnHapusAktivitas' ).hide();
        $( '#idStatusPelaksanaanAktivitas' ).hide();
        $( ':radio[name=sumber_aktivitas]:not(:checked)' ).attr( 'disabled', false );
        $( ':radio[name=jenis_aktivitas]:not(:checked)' ).attr( 'disabled', false );
        $( ':radio[name=satuan_utama]:not(:checked)' ).attr( 'disabled', false );
        $( '#id_satuan_1_aktivitas' ).removeAttr( "disabled" );
        $( '#id_satuan_2_aktivitas' ).removeAttr( "disabled" );
        $( '#ModalAktivitas' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.addAktivitas', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './addAktivitas',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_pelaksana_pd': $( '#id_forum_aktivitas' ).val(),
                'sumber_aktivitas': getSumberASB(),
                'id_aktivitas_asb': $( '#id_aktivitas_asb' ).val(),
                'uraian_aktivitas_kegiatan': $( '#ur_aktivitas_kegiatan' ).val(),
                'jenis_kegiatan': getJenisKegiatan(),
                'id_sumber_dana': $( '#sumber_dana' ).val(),
                'pagu_aktivitas_rkpd': $( '#pagu_aktivitas_rkpd' ).val(),
                'id_satuan_publik': getSatuanUtamaAktivitas(),
                'volume_aktivitas_1': $( '#volume_1_aktivitas' ).val(),
                'volume_aktivitas_2': $( '#volume_2_aktivitas' ).val(),
                'id_satuan_1': $( '#id_satuan_1_aktivitas' ).val(),
                'id_satuan_2': $( '#id_satuan_2_aktivitas' ).val(),
                'status_pelaksanaan': getStatusPelaksanaanAktivitas(),
                'keterangan_aktivitas': $( '#keterangan_status_aktivitas' ).val(),
            },
            success: function ( data ) {
                $( '#tblAktivitas' ).DataTable().ajax.reload( null, false );
                $( '#tblKegiatanRenja' ).DataTable().ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            }
        } );
    } );

    $( document ).on( 'click', '#btnEditAktivitas', function () {
        var data = aktivitas_tbl.row( $( this ).parents( 'tr' ) ).data();
        $( '#btnAktivitas' ).removeClass( 'addAktivitas' );
        $( '#btnAktivitas' ).addClass( 'editAktivitas' );
        $( '.form-horizontal' ).show();
        $( '#id_forum_aktivitas' ).val( data.id_pelaksana_pd );
        $( '#id_aktivitas_pd' ).val( data.id_aktivitas_pd );
        document.frmModalAktivitas.sumber_aktivitas[ data.sumber_aktivitas ].checked = true;
        $( '#ur_aktivitas_kegiatan' ).val( data.uraian_aktivitas );
        $( '#id_aktivitas_asb' ).val( data.id_aktivitas_asb );
        document.frmModalAktivitas.jenis_aktivitas[ data.jenis_kegiatan ].checked = true;
        $( '#sumber_dana' ).val( data.id_sumber_dana ).trigger( 'change' );
        $( '#volume_1_aktivitas' ).val( data.volume_aktivitas_1 );
        $( '#volume_2_aktivitas' ).val( data.volume_aktivitas_2 );
        $( '#id_satuan_1_aktivitas' ).val( data.id_satuan_1 ).trigger( 'change' );
        $( '#id_satuan_2_aktivitas' ).val( data.id_satuan_2 ).trigger( 'change' );
        $( '#pagu_aktivitas_apbd' ).val( data.pagu_aktivitas_apbd );
        $( '#pagu_aktivitas_rkpd' ).val( data.pagu_aktivitas_rkpd );
        document.frmModalAktivitas.status_pelaksanaan_aktivitas[ data.status_pelaksanaan ].checked = true;
        $( '#keterangan_status_aktivitas' ).val( data.keterangan_aktivitas );

        if ( data.id_satuan_publik != null || data.id_satuan_publik != undefined || data.id_satuan_publik != -1 ) {
            document.frmModalAktivitas.satuan_utama[ data.id_satuan_publik ].checked = true;
        } else {
            document.frmModalAktivitas.satuan_utama[ 0 ].checked = true;
        }

        if ( data.sumber_data == 0 ) {
            $( '#btnCariASB' ).hide();
            $( '#btnHapusAktivitas' ).hide();
            $( '#idStatusPelaksanaanAktivitas' ).show();
            $( ':radio[name=sumber_aktivitas]:not(:checked)' ).attr( 'disabled', true );
            $( ':radio[name=jenis_aktivitas]:not(:checked)' ).attr( 'disabled', true );
            $( ':radio[name=satuan_utama]:not(:checked)' ).attr( 'disabled', true );
            if ( data.jenis_kegiatan == 0 ) {
                $( '#id_satuan_1_aktivitas' ).attr( 'disabled', 'disabled' );
                $( '#id_satuan_2_aktivitas' ).attr( 'disabled', 'disabled' );
            } else {
                $( '#id_satuan_1_aktivitas' ).removeAttr( "disabled" );
                $( '#id_satuan_2_aktivitas' ).removeAttr( "disabled" );
            }
            $( '#ur_aktivitas_kegiatan' ).attr( 'disabled', 'disabled' );
            $( '#keterangan_status_aktivitas' ).removeAttr( "disabled" );
        } else {
            $( '#btnCariASB' ).show();
            $( '#btnHapusAktivitas' ).show();
            $( '#idStatusPelaksanaanAktivitas' ).hide();
            $( ':radio[name=satuan_utama]:not(:checked)' ).attr( 'disabled', false );
            $( ':radio[name=sumber_aktivitas]:not(:checked)' ).attr( 'disabled', false );
            $( ':radio[name=jenis_aktivitas]:not(:checked)' ).attr( 'disabled', false );
            $( '#id_satuan_1_aktivitas' ).removeAttr( "disabled" );
            $( '#id_satuan_2_aktivitas' ).removeAttr( "disabled" );
            $( '#ur_aktivitas_kegiatan' ).attr( 'disabled', 'disabled' );
            $( '#keterangan_status_aktivitas' ).removeAttr( "disabled" );
        }
        if ( data.sumber_aktivitas == 0 ) {
            $( '#id_satuan_publik' ).removeAttr( "disabled" );
            $( '#btnCariASB' ).show();
        } else {
            $( '#id_satuan_publik' ).attr( "disabled", "disabled" );
            $( '#btnCariASB' ).hide();
        }
        $( '.modal-title' ).text( 'Edit Aktivitas Kegiatan SKPD' );
        $( '#ModalAktivitas' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.editAktivitas', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './editAktivitas',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_aktivitas_pd': $( '#id_aktivitas_pd' ).val(),
                'id_pelaksana_pd': $( '#id_forum_aktivitas' ).val(),
                'sumber_aktivitas': getSumberASB(),
                'id_aktivitas_asb': $( '#id_aktivitas_asb' ).val(),
                'uraian_aktivitas_kegiatan': $( '#ur_aktivitas_kegiatan' ).val(),
                'jenis_kegiatan': getJenisKegiatan(),
                'id_sumber_dana': $( '#sumber_dana' ).val(),
                'pagu_aktivitas_rkpd': $( '#pagu_aktivitas_rkpd' ).val(),
                'id_satuan_publik': getSatuanUtamaAktivitas(),
                'volume_aktivitas_1': $( '#volume_1_aktivitas' ).val(),
                'volume_aktivitas_2': $( '#volume_2_aktivitas' ).val(),
                'id_satuan_1': $( '#id_satuan_1_aktivitas' ).val(),
                'id_satuan_2': $( '#id_satuan_2_aktivitas' ).val(),
                'status_pelaksanaan': getStatusPelaksanaanAktivitas(),
                'keterangan_aktivitas': $( '#keterangan_status_aktivitas' ).val(),
            },
            success: function ( data ) {
                $( '#tblAktivitas' ).DataTable().ajax.reload( null, false );
                $( '#tblKegiatanRenja' ).DataTable().ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            }
        } );
    } );

    $( document ).on( 'click', '#btnHapusAktivitas', function () {
        $( '#id_aktivitas_hapus' ).val( $( '#id_aktivitas_pd' ).val() );
        $( '#ur_aktivitas_hapus' ).text( $( '#ur_aktivitas_kegiatan' ).val() );
        $( '#HapusAktivitas' ).modal( 'show' );
    } );

    $( document ).on( 'click', '#btnDelAktivitas', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './hapusAktivitas',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_aktivitas_pd': $( '#id_aktivitas_hapus' ).val()
            },
            success: function ( data ) {
                $( '#ModalAktivitas' ).modal( 'hide' );
                $( '#tblAktivitas' ).DataTable().ajax.reload( null, false );
                $( '#tblKegiatanRenja' ).DataTable().ajax.reload( null, false );
                createPesan( data.pesan, "info" );
            }
        } );
    } );

    function getStatusPelaksanaanPelaksana () {
        var xCheck = document.querySelectorAll( 'input[name="status_pelaksanaan_pelaksana"]:checked' );
        var xyz = [];
        for ( var x = 0, l = xCheck.length; x < l; x++ ) { xyz.push( xCheck[ x ].value ); }
        var xvalues = xyz.join( '' );
        return xvalues;
    };

    $( document ).on( 'click', '#btnTambahPelaksana', function () {
        $( '#btnPelaksana' ).addClass( 'addPelaksana' );
        $( '#btnPelaksana' ).removeClass( 'editPelaksana' );
        $( '.form-horizontal' ).show();
        $( '.modal-title' ).text( 'Tambah Pelaksana Kegiatan SKPD' );
        $( '#id_pelaksana_forum' ).val( null );
        $( '#id_aktivitas_pelaksana' ).val( id_kegrenja_temp );
        $( '#id_subunit_pelaksana' ).val( null );
        $( '#subunit_pelaksana' ).val( null );
        document.frmModalPelaksana.status_pelaksanaan_pelaksana[ 0 ].checked = true;
        $( '#keterangan_status_pelaksana' ).val( null );
        $( '#id_lokasi_pelaksana' ).val( null );
        $( '#nm_lokasi_pelaksana' ).val( null );
        $( '#keterangan_status_pelaksana' ).removeAttr( "disabled" );
        $( '#btnHapusPelaksana' ).hide();
        $( '#idStatusPelaksanaanPelaksana' ).hide();
        $( '#ModalPelaksana' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.addPelaksana', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './addPelaksana',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_kegiatan_pd': $( '#id_aktivitas_pelaksana' ).val(),
                'id_sub_unit': $( '#id_subunit_pelaksana' ).val(),
                'id_lokasi': $( '#id_lokasi_pelaksana' ).val(),
                'ket_pelaksana': $( '#keterangan_status_pelaksana' ).val(),
            },
            success: function ( data ) {
                $( '#tblPelaksana' ).DataTable().ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            }
        } );
    } );

    $( document ).on( 'click', '#btnEditPelaksana', function () {
        var data = pelaksana_tbl.row( $( this ).parents( 'tr' ) ).data();

        $( '#btnPelaksana' ).removeClass( 'addPelaksana' );
        $( '#btnPelaksana' ).addClass( 'editPelaksana' );
        $( '.form-horizontal' ).show();
        $( '.modal-title' ).text( 'Edit Pelaksana Kegiatan SKPD' );

        $( '#id_pelaksana_forum' ).val( data.id_pelaksana_pd );
        $( '#id_aktivitas_pelaksana' ).val( data.id_kegiatan_pd );
        $( '#id_subunit_pelaksana' ).val( data.id_sub_unit );
        $( '#subunit_pelaksana' ).val( data.nm_sub );
        document.frmModalPelaksana.status_pelaksanaan_pelaksana[ data.status_pelaksanaan ].checked = true;
        $( '#keterangan_status_pelaksana' ).val( data.ket_pelaksana );
        $( '#id_lokasi_pelaksana' ).val( data.id_lokasi );
        $( '#nm_lokasi_pelaksana' ).val( data.nama_lokasi );

        if ( data.sumber_data == 0 ) {
            $( '#keterangan_status_pelaksana' ).removeAttr( "disabled" );
            $( '#btnHapusPelaksana' ).hide();
            $( '#idStatusPelaksanaanPelaksana' ).show();
        } else {
            $( '#keterangan_status_pelaksana' ).removeAttr( "disabled" );
            $( '#btnHapusPelaksana' ).show();
            $( '#idStatusPelaksanaanPelaksana' ).hide();
        }
        $( '#ModalPelaksana' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.editPelaksana', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './editPelaksana',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_pelaksana_pd': $( '#id_pelaksana_forum' ).val(),
                'id_kegiatan_pd': $( '#id_aktivitas_pelaksana' ).val(),
                'id_sub_unit': $( '#id_subunit_pelaksana' ).val(),
                'id_lokasi': $( '#id_lokasi_pelaksana' ).val(),
                'ket_pelaksana': $( '#keterangan_status_pelaksana' ).val(),
                'status_pelaksanaan': getStatusPelaksanaanPelaksana(),
            },
            success: function ( data ) {
                $( '#tblPelaksana' ).DataTable().ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            }
        } );
    } );

    $( document ).on( 'click', '#btnHapusPelaksana', function () {
        $( '#id_pelaksana_hapus' ).val( $( '#id_pelaksana_forum' ).val() );
        $( '#ur_pelaksana_hapus' ).text( $( '#subunit_pelaksana' ).val() );
        $( '#HapusPelaksana' ).modal( 'show' );
    } );

    $( document ).on( 'click', '#btnDelPelaksana', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './hapusPelaksana',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_pelaksana_pd': $( '#id_pelaksana_hapus' ).val()
            },
            success: function ( data ) {
                $( '#ModalPelaksana' ).modal( 'hide' );
                $( '#tblPelaksana' ).DataTable().ajax.reload( null, false );
                createPesan( data.pesan, "info" );
            }
        } );
    } );

    function getStatusPelaksanaanLokasi () {
        var xCheck = document.querySelectorAll( 'input[name="status_pelaksanaan_lokasi"]:checked' );
        var xyz = [];
        for ( var x = 0, l = xCheck.length; x < l; x++ ) { xyz.push( xCheck[ x ].value ); }
        var xvalues = xyz.join( '' );
        return xvalues;
    };

    $( document ).on( 'click', '#btnTambahLokasi', function () {
        $( '#btnLokasi' ).addClass( 'addLokasi' );
        $( '#btnLokasi' ).removeClass( 'editLokasi' );
        $( '.form-horizontal' ).show();
        $( '.modal-title' ).text( 'Tambah Lokasi Aktivitas Forum' );
        $( '#id_pelaksana_lokasi' ).val( id_aktivitas_temp );
        $( '#id_lokasi_forum' ).val( null );
        $( '#id_lokasi' ).val( null );
        $( '#id_lokasi_teknis' ).val( null );
        $( '#jenis_lokasi' ).val( null ).trigger( 'change' );
        $( '#uraian_lokasi' ).val( null );
        $( '#sumber_data_lokasi' ).val( 1 ).trigger( 'change' )
        $( '#volume_1_lokasi' ).val( 1 );
        $( '#volume_2_lokasi' ).val( 1 );
        $( '#volume_usulan_1' ).val( 0 );
        $( '#volume_usulan_2' ).val( 0 );
        $( '#id_satuan_1_lokasi' ).val( id_satuan_1_aktiv_temp ).trigger( 'change' );
        $( '#id_satuan_2_lokasi' ).val( id_satuan_2_aktiv_temp ).trigger( 'change' );
        $( '#nm_lokasi' ).val( null );
        $( '#nm_lokasi_teknis' ).val( null );
        document.frmModalLokasi.status_pelaksanaan_lokasi[ 0 ].checked = true;
        $( '#keterangan_status_lokasi' ).val( null );
        $( '#idStatusPelaksanaanLokasi' ).hide();
        $( '#btnHapusLokasi' ).hide();
        $( '#btnLokasi' ).show();
        $( '#ModalLokasi' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.addLokasi', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './addLokasi',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_aktivitas_pd': $( '#id_pelaksana_lokasi' ).val(),
                'jenis_lokasi': $( '#jenis_lokasi' ).val(),
                'id_lokasi': $( '#id_lokasi' ).val(),
                'id_lokasi_teknis': $( '#id_lokasi_teknis' ).val(),
                'volume_1': $( '#volume_1_lokasi' ).val(),
                'volume_2': $( '#volume_2_lokasi' ).val(),
                'id_satuan_1': $( '#id_satuan_1_lokasi' ).val(),
                'id_satuan_2': $( '#id_satuan_2_lokasi' ).val(),
                'uraian_lokasi': $( '#uraian_lokasi' ).val(),
                'ket_lokasi': $( '#keterangan_status_lokasi' ).val(),
                'status_pelaksanaan': getStatusPelaksanaanLokasi(),
            },
            success: function ( data ) {
                $( '#tblLokasi' ).DataTable().ajax.reload( null, false );
                $( '#tblPelaksana' ).DataTable().ajax.reload( null, false );
                $( '#tblAktivitas' ).DataTable().ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            }
        } );
    } );

    $( document ).on( 'click', '#btnEditLokasi', function () {
        var data = lokasi_tbl.row( $( this ).parents( 'tr' ) ).data();
        $( '#btnLokasi' ).addClass( 'editLokasi' );
        $( '#btnLokasi' ).removeClass( 'addLokasi' );
        $( '.form-horizontal' ).show();
        $( '.modal-title' ).text( 'Edit Data Lokasi Aktivitas' );
        $( '#id_pelaksana_lokasi' ).val( data.id_aktivitas_pd );
        $( '#id_lokasi_forum' ).val( data.id_lokasi_pd );
        $( '#tahun_forum_lokasi' ).val( data.tahun_forum );
        $( '#sumber_data_lokasi' ).val( data.sumber_data ).trigger( 'change' )
        $( '#no_urut_lokasi' ).val( data.no_urut );
        $( '#id_lokasi' ).val( data.id_lokasi );
        $( '#jenis_lokasi' ).val( data.jenis_lokasi );
        $( '#uraian_lokasi' ).val( data.uraian_lokasi );
        $( '#nm_lokasi' ).val( data.nama_lokasi );
        $( '#volume_1_lokasi' ).val( data.volume_1 );
        $( '#volume_2_lokasi' ).val( data.volume_2 );
        $( '#volume_usulan_1' ).val( data.volume_usulan_1 );
        $( '#volume_usulan_2' ).val( data.volume_usulan_2 );
        $( '#id_satuan_1_lokasi' ).val( data.id_satuan_1 ).trigger( 'change' );
        $( '#id_satuan_2_lokasi' ).val( data.id_satuan_2 ).trigger( 'change' );
        document.frmModalLokasi.status_pelaksanaan_lokasi[ data.status_pelaksanaan ].checked = true;
        $( '#keterangan_status_lokasi' ).val( data.ket_lokasi );
        if ( data.status_aktivitas == 1 ) {
            $( '#btnHapusLokasi' ).hide();
            $( '#btnLokasi' ).hide();
        } else {
            $( '#btnLokasi' ).show();
            if ( data.sumber_data == 1 ) {
                $( '#btnHapusLokasi' ).show();
                $( '#idStatusPelaksanaanLokasi' ).hide();
            } else {
                $( '#btnHapusLokasi' ).hide();
                $( '#idStatusPelaksanaanLokasi' ).show();
            }
        }
        $( '#ModalLokasi' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.editLokasi', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './editLokasi',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_lokasi_pd': $( '#id_lokasi_forum' ).val(),
                'id_aktivitas_pd': $( '#id_pelaksana_lokasi' ).val(),
                'jenis_lokasi': $( '#jenis_lokasi' ).val(),
                'id_lokasi': $( '#id_lokasi' ).val(),
                'id_lokasi_teknis': $( '#id_lokasi_teknis' ).val(),
                'volume_1': $( '#volume_1_lokasi' ).val(),
                'volume_2': $( '#volume_2_lokasi' ).val(),
                'id_satuan_1': $( '#id_satuan_1_lokasi' ).val(),
                'id_satuan_2': $( '#id_satuan_2_lokasi' ).val(),
                'uraian_lokasi': $( '#uraian_lokasi' ).val(),
                'ket_lokasi': $( '#keterangan_status_lokasi' ).val(),
                'status_pelaksanaan': getStatusPelaksanaanLokasi(),
            },
            success: function ( data ) {
                $( '#tblLokasi' ).DataTable().ajax.reload( null, false );
                $( '#tblPelaksana' ).DataTable().ajax.reload( null, false );
                $( '#tblAktivitas' ).DataTable().ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            }
        } );
    } );

    $( document ).on( 'click', '#btnHapusLokasi', function () {
        $( '#id_lokasi_hapus' ).val( $( '#id_lokasi_forum' ).val() );
        $( '#ur_lokasi_hapus' ).text( $( '#nm_lokasi' ).val() );
        $( '#HapusLokasi' ).modal( 'show' );
    } );

    $( document ).on( 'click', '#btnDelLokasi', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './hapusLokasi',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_lokasi_pd': $( '#id_lokasi_hapus' ).val()
            },
            success: function ( data ) {
                $( '#ModalLokasi' ).modal( 'hide' );
                $( '#tblLokasi' ).DataTable().ajax.reload( null, false );
                $( '#tblPelaksana' ).DataTable().ajax.reload( null, false );
                $( '#tblAktivitas' ).DataTable().ajax.reload( null, false );
                createPesan( data.pesan, "info" );
            }
        } );
    } );

    function hitungsatuan () {
        var x = $( '#volume_1_rkpd_belanja' ).val();
        var y = $( '#volume_2_rkpd_belanja' ).val();
        var k = $( '#koefisien_rkpd' ).val();
        var z = $( '#harga_satuan_rkpd' ).val();
        var nilai_musren = x * y * z * k;
        return nilai_musren;
    };

    $( "#volume_1_rkpd_belanja" ).change( function () {
        $( '#jumlah_belanja_rkpd' ).val( hitungsatuan() );
    } );

    $( "#volume_2_rkpd_belanja" ).change( function () {
        $( '#jumlah_belanja_rkpd' ).val( hitungsatuan() );
    } );

    $( "#harga_satuan_rkpd" ).change( function () {
        $( '#jumlah_belanja_rkpd' ).val( hitungsatuan() );
    } );

    $( "#koefisien_rkpd" ).change( function () {
        $( '#jumlah_belanja_rkpd' ).val( hitungsatuan() );
    } );

    function checkAsalbelanja ( asal ) {
        if ( asal == 1 ) {
            $( '#btnCariSSH' ).removeClass( 'btnCariSSH' );
            $( '#btnCariRekening' ).removeClass( 'btnCariRekening' );
            $( '#btnCariSSH' ).addClass( 'catatan' );
            $( '#btnCariRekening' ).addClass( 'catatan' );
            document.getElementById( "zona_ssh" ).setAttribute( "disabled", "disabled" );
        } else {
            $( '#btnCariSSH' ).addClass( 'btnCariSSH' );
            $( '#btnCariRekening' ).addClass( 'btnCariRekening' );
            $( '#btnCariSSH' ).removeClass( 'catatan' );
            $( '#btnCariRekening' ).removeClass( 'catatan' );
            document.getElementById( "zona_ssh" ).removeAttribute( "disabled" );
        }
    };

    function getStatusPelaksanaanBelanja () {
        var xCheck = document.querySelectorAll( 'input[name="status_pelaksanaan_belanja"]:checked' );
        var xyz = [];
        for ( var x = 0, l = xCheck.length; x < l; x++ ) { xyz.push( xCheck[ x ].value ); }
        var xvalues = xyz.join( '' );
        return xvalues;
    };

    $( document ).on( 'click', '.catatan', function () {
        alert( "Maaf Tidak Berfungsi karena asal belanja dari ASB" )
    } );

    $( document ).on( 'click', '.add-belanja', function () {
        $( '.btnBelanja' ).addClass( 'addBelanja' );
        $( '.btnBelanja' ).removeClass( 'editBelanja' );
        $( '.form-horizontal' ).show();
        $( '.modal-title' ).text( 'Tambah Rincian Belanja RKPD' );
        $( '#id_lokasi_belanja' ).val( id_aktivitas_temp );
        $( '#id_belanja_forum' ).val( null );
        $( '#zona_ssh' ).val( 0 ).trigger( 'change' );
        $( '#id_item_ssh' ).val( null );
        $( '#rekening_ssh' ).val( null );
        $( '#ur_item_ssh' ).val( null );
        $( '#id_rekening' ).val( null );
        $( '#ur_rekening' ).val( null );
        $( '#volume_1_apbd_belanja' ).val( 0 );
        $( '#volume_2_apbd_belanja' ).val( 0 );
        $( '#koefisien_apbd' ).val( 0 );
        $( '#harga_satuan_apbd' ).val( 0 );
        $( '#jumlah_belanja_apbd' ).val( 0 );
        $( '#volume_1_rkpd_belanja' ).val( 1 );
        $( '#volume_2_rkpd_belanja' ).val( 1 );
        $( '#koefisien_rkpd' ).val( 1 );
        $( '#harga_satuan_rkpd' ).val( 1 );
        $( '#jumlah_belanja_rkpd' ).val( 1 );
        $( '#uraian_belanja' ).val( null );
        $( '#id_satuan_2_rkpd_belanja' ).val( 0 ).trigger( 'change' );
        $( '#id_satuan_1_rkpd_belanja' ).val( 0 ).trigger( 'change' );
        $( '#id_satuan_2_apbd_belanja' ).val( 0 ).trigger( 'change' );
        $( '#id_satuan_1_apbd_belanja' ).val( 0 ).trigger( 'change' );
        $( '#sumber_data_belanja' ).val( sumber_aktivitas_temp );
        checkAsalbelanja( 0 );
        $( '#btnHapusBelanja' ).hide();
        $( '#ModalBelanja' ).modal( 'show' );
        $( '#idStatusPelaksanaanBelanja' ).hide();
        document.frmModalBelanja.status_pelaksanaan_belanja[ 0 ].checked = true;
        if ( sumber_aktivitas_temp == 0 ) {
            $( '#volume_1_rkpd_belanja' ).attr( 'disabled', 'disabled' );
            $( '#volume_2_rkpd_belanja' ).attr( 'disabled', 'disabled' );
            $( '#koefisien_rkpd' ).attr( 'disabled', 'disabled' );
        } else {
            $( '#volume_1_rkpd_belanja' ).removeAttr( "disabled" );
            $( '#volume_2_rkpd_belanja' ).removeAttr( "disabled" );
            $( '#koefisien_rkpd' ).removeAttr( "disabled" );
        }
    } );

    $( '.modal-footer' ).on( 'click', '.addBelanja', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './addBelanja',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_aktivitas_pd': id_aktivitas_temp,
                'id_zona_ssh': $( '#zona_ssh' ).val(),
                'sumber_belanja': $( '#sumber_belanja' ).val(),
                'id_item_ssh': $( '#id_item_ssh' ).val(),
                'id_rekening_ssh': $( '#id_rekening' ).val(),
                'uraian_belanja': $( '#uraian_belanja' ).val(),
                'volume_rkpd_1': $( '#volume_1_rkpd_belanja' ).val(),
                'volume_rkpd_2': $( '#volume_2_rkpd_belanja' ).val(),
                'koefisien_rkpd': $( '#koefisien_rkpd' ).val(),
                'harga_satuan_rkpd': $( '#harga_satuan_rkpd' ).val(),
                'jml_belanja_rkpd': $( '#jumlah_belanja_rkpd' ).val(),
                'id_satuan_1': $( '#id_satuan_1_rkpd_belanja' ).val(),
                'id_satuan_2': $( '#id_satuan_2_rkpd_belanja' ).val(),
            },
            success: function ( data ) {
                belanja_renja_tbl.ajax.reload( null, false );
                aktivitas_tbl.ajax.reload( null, false );
                pelaksana_tbl.ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            }
        } );
    } );

    $( document ).on( 'click', '#btnEditBelanja', function () {
        var data = belanja_renja_tbl.row( $( this ).parents( 'tr' ) ).data();
        $( '.btnBelanja' ).addClass( 'editBelanja' );
        $( '.btnBelanja' ).removeClass( 'addBelanja' );
        $( '.form-horizontal' ).show();
        $( '.modal-title' ).text( 'Edit Uraian Belanja Musrenbang RKPD' );
        $( '#id_lokasi_belanja' ).val( data.id_aktivitas_pd );
        $( '#id_belanja_forum' ).val( data.id_belanja_pd );
        $( '#zona_ssh' ).val( data.id_zona_ssh ).trigger( 'change' );
        $( '#id_item_ssh' ).val( data.id_item_ssh );
        $( '#rekening_ssh' ).val( data.nama_rekening );
        $( '#sumber_data_belanja' ).val( data.sumber_belanja );
        $( '#ur_item_ssh' ).val( data.uraian_tarif_ssh );
        $( '#id_rekening' ).val( data.id_rekening_ssh );
        $( '#ur_rekening' ).val( data.kd_rekening + ' - ' + data.nm_rekening );
        $( '#uraian_belanja' ).val( data.uraian_belanja );
        $( '#uraian_aktivitas_asb' ).val( data.nm_aktivitas_asb );
        $( '#volume_1_apbd_belanja' ).val( data.volume_apbd_1 );
        $( '#volume_2_apbd_belanja' ).val( data.volume_apbd_2 );
        $( '#koefisien_apbd' ).val( data.koefisien_apbd );
        $( '#harga_satuan_apbd' ).val( data.harga_satuan_apbd );
        $( '#jumlah_belanja_apbd' ).val( data.jml_belanja_apbd );
        $( '#volume_1_rkpd_belanja' ).val( data.volume_rkpd_1 );
        $( '#volume_2_rkpd_belanja' ).val( data.volume_rkpd_2 );
        $( '#koefisien_rkpd' ).val( data.koefisien_rkpd );
        $( '#harga_satuan_rkpd' ).val( data.harga_satuan_rkpd );
        $( '#jumlah_belanja_rkpd' ).val( data.jml_belanja_rkpd );
        $( '#id_satuan_1_rkpd_belanja' ).val( data.id_satuan_1 ).trigger( 'change' );
        $( '#id_satuan_2_rkpd_belanja' ).val( data.id_satuan_2 ).trigger( 'change' );
        $( '#id_satuan_1_apbd_belanja' ).val( data.id_satuan_1 ).trigger( 'change' );
        $( '#id_satuan_2_apbd_belanja' ).val( data.id_satuan_2 ).trigger( 'change' );
        document.frmModalBelanja.status_pelaksanaan_belanja[ data.status_pelaksanaan ].checked = true;
        checkAsalbelanja( data.sumber_data );
        if ( data.status_aktivitas == 1 ) {
            $( '#btnHapusBelanja' ).hide();
            $( '#btnBelanja' ).hide();
        } else {
            $( '#btnBelanja' ).show();
            $( '#btnHapusBelanja' ).show();
        }
        if ( data.sumber_belanja == 0 ) {
            $( '#volume_1_rkpd_belanja' ).attr( 'disabled', 'disabled' );
            $( '#volume_2_rkpd_belanja' ).attr( 'disabled', 'disabled' );
            $( '#koefisien_rkpd' ).attr( 'disabled', 'disabled' );
        } else {
            $( '#volume_1_rkpd_belanja' ).removeAttr( "disabled" );
            $( '#volume_2_rkpd_belanja' ).removeAttr( "disabled" );
            $( '#koefisien_rkpd' ).removeAttr( "disabled" );
        }
        if ( data.sumber_data != 0 && data.sumber_belanja != 0 ) {
            $( '#harga_satuan_rkpd' ).removeAttr( "disabled" );
            $( '#idStatusPelaksanaanBelanja' ).show();
        } else {
            $( '#harga_satuan_rkpd' ).removeAttr( "disabled" );
            $( '#idStatusPelaksanaanBelanja' ).hide();
        }
        $( '#ModalBelanja' ).modal( 'show' );

    } );

    $( '.modal-footer' ).on( 'click', '.editBelanja', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './editBelanja',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_belanja_pd': $( '#id_belanja_forum' ).val(),
                'id_aktivitas_pd': id_aktivitas_temp,
                'id_zona_ssh': $( '#zona_ssh' ).val(),
                'sumber_belanja': $( '#sumber_belanja' ).val(),
                'id_item_ssh': $( '#id_item_ssh' ).val(),
                'id_rekening_ssh': $( '#id_rekening' ).val(),
                'uraian_belanja': $( '#uraian_belanja' ).val(),
                'volume_rkpd_1': $( '#volume_1_rkpd_belanja' ).val(),
                'volume_rkpd_2': $( '#volume_2_rkpd_belanja' ).val(),
                'koefisien_rkpd': $( '#koefisien_rkpd' ).val(),
                'harga_satuan_rkpd': $( '#harga_satuan_rkpd' ).val(),
                'jml_belanja_rkpd': $( '#jumlah_belanja_rkpd' ).val(),
                'id_satuan_1': $( '#id_satuan_1_rkpd_belanja' ).val(),
                'id_satuan_2': $( '#id_satuan_2_rkpd_belanja' ).val(),
                'status_pelaksanaan': getStatusPelaksanaanBelanja(),
            },
            success: function ( data ) {
                belanja_renja_tbl.ajax.reload( null, false );
                aktivitas_tbl.ajax.reload( null, false );
                pelaksana_tbl.ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            }
        } );
    } );

    $( document ).on( 'click', '.btnHapusBelanja', function () {
        if ( $( '#sumber_data_belanja' ).val() == 1 ) {
            var x = confirm( "Anda yakin akan menghapus item belanja " + $( '#ur_item_ssh' ).val() + " ini ?" );
            if ( x ) {
                $.ajaxSetup( {
                    headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
                } );
                $.ajax( {
                    type: 'post',
                    url: './hapusBelanja',
                    data: {
                        '_token': $( 'input[name=_token]' ).val(),
                        'id_belanja_pd': $( '#id_belanja_forum' ).val()
                    },
                    success: function ( data ) {
                        belanja_renja_tbl.ajax.reload( null, false );
                        aktivitas_tbl.ajax.reload( null, false );
                        pelaksana_tbl.ajax.reload( null, false );
                        $( '#ModalBelanja' ).modal( 'hide' );
                        createPesan( data.pesan, "info" );
                    }
                } );
            }
            else {
                return false;
            }
        } else {
            alert( 'Maaf Item dari ASB tidak dapat dihapus' );
        }
    } );

    var CopyBelanjaTbl;
    $( document ).on( 'click', '#btnCopyBelanja', function () {
        $( '#ModalCopyBelanja' ).modal( 'show' );
        CopyBelanjaTbl = $( '#tblCopyBelanja' ).DataTable( {
            processing: true,
            serverSide: true,
            autoWidth: false,
            dom: 'BfRtip',
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
            "pageLength": 10,
            "lengthMenu": [ [ 10, 25, 50, -1 ], [ 10, 25, 50, "All" ] ],
            "ajax": { "url": "./getLokasiCopy/" + unit_temp },
            "columns": [
                { data: 'action', 'searchable': false, 'orderable': false, sClass: "dt-center" },
                { data: 'urut', sClass: "dt-center" },
                { data: 'uraian_aktivitas_kegiatan' }
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } );
    } );

    $( document ).on( 'click', '#btnProsesCopyBelanja', function () {
        var data = CopyBelanjaTbl.row( $( this ).parents( 'tr' ) ).data();
        $( '#ModalCopyBelanja' ).modal( 'hide' );
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './getBelanjaCopy',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_aktivitas_pd': data.id_aktivitas_pd,
                'id_aktivitas_new': id_aktivitas_temp,

            },
            success: function ( data ) {
                belanja_renja_tbl.ajax.reload( null, false );
                aktivitas_tbl.ajax.reload( null, false );
                pelaksana_tbl.ajax.reload( null, false );
                createPesan( data.pesan, "success" );
            }
        } );
    } );

    $( document ).on( 'click', '#btnUnLoadAsb', function () {

        $.ajax( {
            type: 'post',
            url: './unloadASB',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_aktivitas_asb': id_asb_temp,
                'id_aktivitas_pd': id_aktivitas_temp,
            },
            success: function ( data ) {
                belanja_renja_tbl.ajax.reload( null, false );
                aktivitas_tbl.ajax.reload( null, false );
                pelaksana_tbl.ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            }
        } );
    } );

    $( document ).on( 'click', '#btnTambahBelanjaASB', function () {
        $( '.btnLoadAsb' ).addClass( 'loadBelanja' );
        $( '.btnLoadAsb' ).removeClass( 'unloadBelanja' );
        $( '.form-horizontal' ).show();
        $( '.modal-title' ).text( 'Load Data Belanja dari ASB' );
        $( '#id_aktivitas_asb_load' ).val( id_asb_temp );
        $( '#uraian_aktivitas_asb_load' ).val( $( '#nm_aktivitas_belanja' ).text() );
        $( '#v1_load' ).val( vol1_temp );
        $( '#v2_load' ).val( vol2_temp );
        $( '#satuan1_load_asb' ).text( nm_sat_asb1 );
        $( '#satuan2_load_asb' ).text( nm_sat_asb2 );
        $( '#loadBelanjaASB' ).modal( 'show' );

    } );

    $( document ).on( 'click', '.btnLoadAsb', function () {
        $.ajax( {
            type: 'post',
            url: './getHitungASB',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_aktivitas_pd': id_aktivitas_temp,
                'id_aktivitas_asb': id_asb_temp,
                'volume_1': vol1_temp,
                'id_satuan_1': id_satuan_1_aktiv_temp,
                'volume_2': vol2_temp,
                'id_satuan_2': id_satuan_2_aktiv_temp,
                'id_zona': $( '#zona_ssh_load' ).val(),
            },
            success: function ( data ) {
                belanja_renja_tbl.ajax.reload( null, false );
                aktivitas_tbl.ajax.reload( null, false );
                pelaksana_tbl.ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            }
        } );
    } );

    var cariindikator
    $( document ).on( 'click', '.btnCariIndi', function () {
        $( '#judulModal' ).text( 'Daftar Indikator yang terdapat dalam RPJMD/Renstra' );
        $( '#cariIndikator' ).modal( 'show' );

        cariindikator = $( '#tblCariIndikator' ).DataTable( {
            processing: true,
            serverSide: true,
            dom: 'bfrtIp',
            autoWidth: false,
            "ajax": { "url": "../admin/parameter/getRefIndikator" },
            "columns": [
                { data: 'no_urut' },
                { data: 'nm_indikator' },
                { data: 'jenis_display' },
                { data: 'sifat_display' }
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } );
    } );

    $( document ).on( 'click', '.btnCariIndiKeg', function () {
        $( '#judulModal' ).text( 'Daftar Indikator yang terdapat dalam RPJMD/Renstra' );
        $( '#cariIndikator' ).modal( 'show' );

        cariindikator = $( '#tblCariIndikator' ).DataTable( {
            processing: true,
            serverSide: true,
            dom: 'bfrtIp',
            autoWidth: false,
            "ajax": { "url": "../admin/parameter/getRefIndikator" },
            "columns": [
                { data: 'no_urut' },
                { data: 'nm_indikator' },
                { data: 'jenis_display' },
                { data: 'sifat_display' }
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } );
    } );

    $( '#tblCariIndikator tbody' ).on( 'dblclick', 'tr', function () {
        var data = cariindikator.row( this ).data();
        document.getElementById( "ur_indikator_renja" ).value = data.nm_indikator;
        document.getElementById( "kd_indikator_renja" ).value = data.id_indikator;
        document.getElementById( "id_satuan_output" ).value = data.uraian_satuan;
        document.getElementById( "ur_indikatorKeg_renja" ).value = data.nm_indikator;
        document.getElementById( "kd_indikatorKeg_renja" ).value = data.id_indikator;
        document.getElementById( "id_satuan_output_keg" ).value = data.uraian_satuan;
        $( '#cariIndikator' ).modal( 'hide' );
    } );

    function getStatusPelaksanaanIndikator () {
        var xCheck = document.querySelectorAll( 'input[name="status_pelaksanaan_indikator"]:checked' );
        var xyz = [];
        for ( var x = 0, l = xCheck.length; x < l; x++ ) { xyz.push( xCheck[ x ].value ); }
        var xvalues = xyz.join( '' );
        return xvalues;
    };

    $( document ).on( 'click', '.add-indikator', function () {
        var data = prog_renja_tbl.row( $( this ).parents( 'tr' ) ).data();
        $( '.btnIndikator' ).removeClass( 'editIndikator' );
        $( '.btnIndikator' ).addClass( 'addIndikator' );
        $( '.modal-title' ).text( 'Tambah Target Capaian Program SKPD-RKPD' );
        $( '.form-horizontal' ).show();
        $( '#id_renja_program_1' ).val( data.id_program_pd );
        $( '#kd_indikator_renja' ).val( null );
        $( '#id_indikator_program_renja' ).val( null );
        $( '#ur_indikator_renja' ).val( null );
        $( '#ur_tolokukur_renja' ).val( null );
        $( '#target_indikator_renstra' ).val( 0 );
        $( '#target_indikator_apbd' ).val( 0 );
        $( '#target_indikator_renja' ).val( 0 );
        $( '#id_satuan_output' ).val( null );
        $( '#divStatusPenggunaanIndikator' ).hide();
        document.frmEditIndikator.status_pelaksanaan_indikator[ 0 ].checked = true;
        document.getElementById( "ur_tolokukur_renja" ).removeAttribute( "disabled" );
        $( '.btnCariIndi' ).show();
        $( '.btnHapusIndikator' ).hide();
        $( '.chkIndikator' ).hide();
        $( '#ModalIndikator' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.addIndikator', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './addIndikatorProg',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_program_pd': $( '#id_renja_program_1' ).val(),
                'kd_indikator': $( '#kd_indikator_renja' ).val(),
                'tolok_ukur_indikator': $( '#ur_tolokukur_renja' ).val(),
                'target_rkpd': $( '#target_indikator_renja' ).val(),
            },
            success: function ( data ) {
                prog_renja_tbl.ajax.reload( null, false );
                tblInProg.ajax.reload( null, false );
                prog_rkpd_tbl.ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            }
        } );
    } );

    $( document ).on( 'click', '.edit-indikator', function () {
        var data = tblInProg.row( $( this ).parents( 'tr' ) ).data();
        $( '.btnIndikator' ).removeClass( 'addIndikator' );
        $( '.btnIndikator' ).addClass( 'editIndikator' );
        $( '.modal-title' ).text( 'Edit dan Reviu Target Capaian Program RKPD' );
        $( '.form-horizontal' ).show();
        $( '#id_indikator_program_renja' ).val( data.id_indikator_program_pd );
        $( '#id_renja_program_1' ).val( data.id_program_pd );
        $( '#kd_indikator_renja' ).val( data.kd_indikator );
        $( '#ur_indikator_renja' ).val( data.uraian_indikator );
        $( '#ur_tolokukur_renja' ).val( data.tolok_ukur_indikator );
        $( '#target_indikator_renstra' ).val( data.target_renstra );
        $( '#target_indikator_apbd' ).val( data.target_apbd );
        $( '#target_indikator_renja' ).val( data.target_rkpd );
        $( '#id_satuan_output' ).val( data.satuan );
        document.frmEditIndikator.status_pelaksanaan_indikator[ data.status_pelaksanaan ].checked = true;
        if ( data.sumber_data == 1 ) {
            $( '.btnCariIndi' ).show();
            $( '.btnHapusIndikator' ).show();
            $( '#divStatusPenggunaanIndikator' ).hide();
            document.getElementById( "ur_tolokukur_renja" ).removeAttribute( "disabled" );
        } else {
            $( '.btnCariIndi' ).hide();
            $( '.btnHapusIndikator' ).hide();
            $( '#divStatusPenggunaanIndikator' ).show();
            document.getElementById( "ur_tolokukur_renja" ).setAttribute( "disabled", "disabled" );
        }

        $( '.chkIndikator' ).show();
        if ( data.status_data == 1 ) {
            $( '.checkIndikator' ).prop( 'checked', true );
        } else {
            $( '.checkIndikator' ).prop( 'checked', false );
        }

        $( '#ModalIndikator' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.editIndikator', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );
        $.ajax( {
            type: 'post',
            url: './editIndikatorProg',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_indikator_program_pd': $( '#id_indikator_program_renja' ).val(),
                'id_program_pd': $( '#id_renja_program_1' ).val(),
                'kd_indikator': $( '#kd_indikator_renja' ).val(),
                'tolok_ukur_indikator': $( '#ur_tolokukur_renja' ).val(),
                'target_rkpd': $( '#target_indikator_renja' ).val(),
                'status_pelaksanaan': getStatusPelaksanaanIndikator(),
            },
            success: function ( data ) {
                tblInProg.ajax.reload( null, false );
                prog_renja_tbl.ajax.reload( null, false );
                prog_rkpd_tbl.ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            }
        } );
    } );

    $( document ).on( 'click', '.btnHapusIndikator', function () {
        var x = confirm( "Anda yakin akan menghapus data indikator " + $( '#ur_indikator_renja' ).val() + " ?" );
        if ( x ) {
            $.ajaxSetup( {
                headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
            } );

            $.ajax( {
                type: 'post',
                url: './delIndikatorProg',
                data: {
                    '_token': $( 'input[name=_token]' ).val(),
                    'id_indikator_program_pd': $( '#id_indikator_program_renja' ).val()
                },
                success: function ( data ) {
                    $( '#ModalIndikator' ).modal( 'hide' );
                    tblInProg.ajax.reload( null, false );
                    prog_renja_tbl.ajax.reload( null, false );
                    prog_rkpd_tbl.ajax.reload( null, false );
                    if ( data.status_pesan == 1 ) {
                        createPesan( data.pesan, "success" );
                    } else {
                        createPesan( data.pesan, "danger" );
                    }
                }
            } );
        }
        else {
            return false;
        }
    } );

    $( document ).on( 'click', '.post-InProgRenja', function () {
        var data = tblInProg.row( $( this ).parents( 'tr' ) ).data();
        var status_data;
        if ( data.status_data == 0 ) {
            status_data = 1;
        };
        if ( data.status_data == 1 ) {
            status_data = 0;
        };

        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './postIndikatorProg',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_indikator_program_pd': data.id_indikator_program_pd,
                'status_data': status_data,
            },
            success: function ( data ) {
                tblInProg.ajax.reload( null, false );
                prog_renja_tbl.ajax.reload( null, false );
                prog_rkpd_tbl.ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            }
        } );
    } );

    function getStatusPelaksanaanIndikatorKeg () {
        var xCheck = document.querySelectorAll( 'input[name="status_pelaksanaan_inkeg"]:checked' );
        var xyz = [];
        for ( var x = 0, l = xCheck.length; x < l; x++ ) { xyz.push( xCheck[ x ].value ); }
        var xvalues = xyz.join( '' );
        return xvalues;
    };

    $( document ).on( 'click', '.add-indikatorKeg', function () {
        var data = keg_renja_tbl.row( $( this ).parents( 'tr' ) ).data();

        $( '.btnIndikatorKeg' ).removeClass( 'editIndikatorKeg' );
        $( '.btnIndikatorKeg' ).addClass( 'addIndikatorKeg' );
        $( '.modal-title' ).text( 'Tambah Target Capaian Kegiatan Renja' );
        $( '.form-horizontal' ).show();
        $( '#id_indikator_kegiatan_renja' ).val( data.id_kegiatan_pd );
        $( '#kd_indikatorKeg_renja' ).val( null );
        $( '#id_renja_indikatorKeg' ).val( null );
        $( '#ur_indikatorKeg_renja' ).val( null );
        $( '#ur_tolokukur_keg' ).val( null );
        $( '#target_indikatorKeg_renstra' ).val( 0 );
        $( '#target_indikatorKeg_apbd' ).val( 0 );
        $( '#target_indikatorKeg_renja' ).val( 0 );
        $( '#id_satuan_output_keg' ).val( null );
        document.getElementById( "ur_tolokukur_keg" ).removeAttribute( "disabled" );
        $( '.btnCariIndiKeg' ).show();
        $( '.btnHapusIndikatorKeg' ).hide();
        $( '#ModalIndikatorKeg' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.addIndikatorKeg', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './addIndikatorKeg',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_kegiatan_pd': $( '#id_indikator_kegiatan_renja' ).val(),
                'kd_indikator': $( '#kd_indikatorKeg_renja' ).val(),
                'tolok_ukur_indikator': $( '#ur_tolokukur_keg' ).val(),
                'target_rkpd': $( '#target_indikatorKeg_renja' ).val(),
            },
            success: function ( data ) {
                prog_renja_tbl.ajax.reload( null, false );
                keg_renja_tbl.ajax.reload( null, false );
                tblInKeg.ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            }
        } );
    } );

    $( document ).on( 'click', '.edit-indikator_keg', function () {
        var data = tblInKeg.row( $( this ).parents( 'tr' ) ).data();
        $( '.btnIndikatorKeg' ).removeClass( 'addIndikatorKeg' );
        $( '.btnIndikatorKeg' ).addClass( 'editIndikatorKeg' );
        $( '.modal-title' ).text( 'Edit dan Reviu Target Capaian Kegiatan Renja' );
        $( '.form-horizontal' ).show();
        $( '#id_renja_indikatorKeg' ).val( data.id_indikator_kegiatan_pd );
        $( '#id_indikator_kegiatan_renja' ).val( data.id_kegiatan_pd );
        $( '#kd_indikatorKeg_renja' ).val( data.kd_indikator );
        $( '#ur_indikatorKeg_renja' ).val( data.nm_indikator );
        $( '#ur_tolokukur_keg' ).val( data.tolok_ukur_indikator );
        $( '#target_indikatorKeg_renstra' ).val( data.target_renstra );
        $( '#target_indikatorKeg_apbd' ).val( data.target_apbd );
        $( '#target_indikatorKeg_renja' ).val( data.target_rkpd );
        $( '#id_satuan_output_keg' ).val( data.uraian_satuan );
        if ( data.sumber_data == 1 ) {
            $( '.btnCariIndikeg' ).show();
            $( '.btnHapusIndikatorKeg' ).show();
            $( '#divStatusPenggunaanIndikatorKeg' ).hide();
            document.getElementById( "ur_tolokukur_keg" ).removeAttribute( "disabled" );
        } else {
            $( '.btnCariIndikeg' ).hide();
            $( '.btnHapusIndikatorKeg' ).hide();
            $( '#divStatusPenggunaanIndikatorKeg' ).show();
            document.getElementById( "ur_tolokukur_keg" ).setAttribute( "disabled", "disabled" );
        };
        document.frmEditIndikatorKeg.status_pelaksanaan_inkeg[ data.status_pelaksanaan ].checked = true;
        $( '#ModalIndikatorKeg' ).modal( 'show' );
    } );

    $( '.modal-footer' ).on( 'click', '.editIndikatorKeg', function () {
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './editIndikatorKeg',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_indikator_kegiatan_pd': $( '#id_renja_indikatorKeg' ).val(),
                'id_kegiatan_pd': $( '#id_indikator_kegiatan_renja' ).val(),
                'kd_indikator': $( '#kd_indikatorKeg_renja' ).val(),
                'tolok_ukur_indikator': $( '#ur_tolokukur_keg' ).val(),
                'target_rkpd': $( '#target_indikatorKeg_renja' ).val(),
                'status_pelaksanaan': getStatusPelaksanaanIndikatorKeg(),
            },
            success: function ( data ) {
                prog_renja_tbl.ajax.reload( null, false );
                keg_renja_tbl.ajax.reload( null, false );
                tblInKeg.ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            }
        } );
    } );

    $( document ).on( 'click', '.btnHapusIndikatorKeg', function () {
        var x = confirm( "Anda yakin akan menghapus data indikator " + $( '#ur_indikatorKeg_renja' ).val() + " ?" );
        if ( x ) {
            $.ajaxSetup( {
                headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
            } );

            $.ajax( {
                type: 'post',
                url: './delIndikatorKeg',
                data: {
                    '_token': $( 'input[name=_token]' ).val(),
                    'id_indikator_kegiatan_pd': $( '#id_renja_indikatorKeg' ).val()
                },
                success: function ( data ) {
                    $( '#ModalIndikatorKeg' ).modal( 'hide' );
                    tblInKeg.ajax.reload( null, false );
                    keg_renja_tbl.ajax.reload( null, false );
                    createPesan( data.pesan, "success" );
                }
            } );
        }
        else {
            return false;
        }
    } );

    $( document ).on( 'click', '.post-InKegRenja', function () {
        var data = tblInKeg.row( $( this ).parents( 'tr' ) ).data();
        var status_data;
        if ( data.status_data == 0 ) {
            status_data = 1;
        };
        if ( data.status_data == 1 ) {
            status_data = 0;
        };

        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './postIndikatorKeg',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_indikator_kegiatan_pd': data.id_indikator_kegiatan_pd,
                'status_data': status_data,
            },
            success: function ( data ) {
                tblInKeg.ajax.reload( null, false );
                keg_renja_tbl.ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            }
        } );
    } );

    $( document ).on( 'click', '.post-AktivForum', function () {
        var data = aktivitas_tbl.row( $( this ).parents( 'tr' ) ).data();
        var status_data;
        if ( data.status_data == 0 ) {
            status_data = 1;
        };
        if ( data.status_data == 1 ) {
            status_data = 0;
        };

        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './postAktivitas',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_aktivitas_pd': data.id_aktivitas_pd,
                'status_data': status_data,
            },
            success: function ( data ) {
                aktivitas_tbl.ajax.reload( null, false );
                keg_renja_tbl.ajax.reload( null, false );
                pelaksana_tbl.ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            }
        } );
    } );

    $( document ).on( 'click', '.post-KegForum', function () {
        var data = keg_renja_tbl.row( $( this ).parents( 'tr' ) ).data();
        var status_data;
        if ( data.status_data == 0 ) {
            status_data = 1;
        };
        if ( data.status_data == 1 ) {
            status_data = 0;
        };

        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './postKegRenja',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_kegiatan_pd': data.id_kegiatan_pd,
                'status_data': status_data,
            },
            success: function ( data ) {
                prog_renja_tbl.ajax.reload( null, false );
                keg_renja_tbl.ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            }
        } );
    } );

    $( document ).on( 'click', '.post-ProgRenja', function () {
        var data = prog_renja_tbl.row( $( this ).parents( 'tr' ) ).data();
        var status_data;
        if ( data.status_data == 0 ) {
            status_data = 1;
        };
        if ( data.status_data == 1 ) {
            status_data = 0;
        };

        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );

        $.ajax( {
            type: 'post',
            url: './postProgRenja',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_program_pd': data.id_program_pd,
                'status_data': status_data,
            },
            success: function ( data ) {
                prog_renja_tbl.ajax.reload( null, false );
                if ( data.status_pesan == 1 ) {
                    createPesan( data.pesan, "success" );
                } else {
                    createPesan( data.pesan, "danger" );
                }
            }
        } );
    } );

    $( "#jenis_belanja" ).change( function () {
        jns_belanja_temp = '';
        jns_belanja_temp = $( '#jenis_belanja' ).val();
    } );

    // var CopyBelanjaTbl;
    $( document ).on( 'click', '#btnCopyAktivitas', function () {
        $.ajax( {
            type: "GET",
            url: './getTahunAkt?id_unit=' + unit_temp,
            dataType: "json",
            success: function ( data ) {
                var j = data.length;
                var post, i;
                $( 'select[name="tahun_akt"]' ).empty();
                $( 'select[name="tahun_akt"]' ).append( '<option value="0">---Pilih Tahun RKPD Final---</option>' );
                for ( i = 0; i < j; i++ ) {
                    post = data[ i ];
                    $( 'select[name="tahun_akt"]' ).append( '<option value="' + post.tahun_rkpd + '">' + post.tahun_rkpd + '</option>' );
                }
            }
        } );
        $( '#cariAktivitas' ).modal( 'show' );
    } );

    $( "#tahun_akt" ).change( function () {
        $.ajax( {
            type: "GET",
            url: './getProgramAkt?id_unit=' + unit_temp + '&tahun=' + $( "#tahun_akt" ).val(),
            dataType: "json",
            success: function ( data ) {
                var j = data.length;
                var post, i;
                $( 'select[name="prog_akt"]' ).empty();
                $( 'select[name="prog_akt"]' ).append( '<option value="0">---Pilih Program RKPD Final---</option>' );
                for ( i = 0; i < j; i++ ) {
                    post = data[ i ];
                    $( 'select[name="prog_akt"]' ).append( '<option value="' + post.id_program_ref + '">' + post.program_display + '</option>' );
                }
            }
        } );
    } );

    $( "#prog_akt" ).change( function () {
        $.ajax( {
            type: "GET",
            url: './getKegiatanAkt?id_unit=' + unit_temp + '&tahun=' + $( "#tahun_akt" ).val() + '&id_program=' + $( "#prog_akt" ).val(),
            dataType: "json",
            success: function ( data ) {
                var j = data.length;
                var post, i;
                $( 'select[name="keg_akt"]' ).empty();
                $( 'select[name="keg_akt"]' ).append( '<option value="0">---Pilih Kegiatan RKPD Final---</option>' );
                for ( i = 0; i < j; i++ ) {
                    post = data[ i ];
                    $( 'select[name="keg_akt"]' ).append( '<option value="' + post.id_kegiatan_ref + '">' + post.kegiatan_display + '</option>' );
                }
            }
        } );
    } );
    var cariAktivitasTbl;
    $( "#keg_akt" ).change( function () {
        cariAktivitasTbl = $( '#tblCariAktivitas' ).DataTable( {
            processing: true,
            serverSide: true,
            dom: 'bfrtIp',
            autoWidth: false,
            "ajax": {
                "url": "./getAktivitasAkt?id_unit=" + unit_temp + "&tahun=" + $( "#tahun_akt" ).val() + "&id_kegiatan=" + $( "#keg_akt" ).val()
            },
            "columns": [
                { data: 'action', 'searchable': false, 'orderable': false, sClass: "dt-center", width: "50px" },
                { data: 'no_urut', sClass: "dt-center" },
                { data: 'uraian_aktivitas_kegiatan' }
            ],
            "order": [ [ 0, 'asc' ] ],
            "bDestroy": true
        } );
    } );

    $( document ).on( 'click', '#btnProsesCopyAktivitas', function () {
        var data = cariAktivitasTbl.row( $( this ).parents( 'tr' ) ).data();
        $.ajaxSetup( {
            headers: { 'X-CSRF-Token': $( 'meta[name=_token]' ).attr( 'content' ) }
        } );
        $.ajax( {
            type: 'post',
            url: './copyAktivitas',
            data: {
                '_token': $( 'input[name=_token]' ).val(),
                'id_pelaksana': id_pelaksana_temp,
                'id_aktivitas': data.id_aktivitas_pd,
            },
            success: function ( data ) {
                aktivitas_tbl.ajax.reload( null, false );
                pelaksana_tbl.ajax.reload( null, false );
                createPesan( data.pesan, "success" );
                $( '#cariAktivitas' ).modal( 'hide' );
            }
        } );
    } );

} ); // end file