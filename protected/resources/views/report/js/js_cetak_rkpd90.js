$( document ).ready( function () {
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

    function hariIni () {
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();
        var hariIni = new Date().toISOString().slice( 0, 10 );
        return hariIni;
    }

    $( '.number' ).number( true, 0, ',', '.' );

    $( '#tgl_laporan_x' ).val( formatTgl( hariIni() ) );

    $( '#tgl_laporan_x' ).datepicker( {
        altField: "#tgl_laporan",
        altFormat: "yy-mm-dd",
        dateFormat: "dd MM yy",
    } );

    $.ajax( {
        type: "GET",
        url: './getListRkpd',
        dataType: "json",
        success: function ( data ) {
            var j = data.length;
            var post, i;

            for ( i = 0; i < j; i++ ) {
                post = data[ i ];
                $( 'select[name="jns_laporan"]' ).append( '<option value="' + post.id + '">' + post.uraian_laporan + '</option>' );
            }
        }
    } );

    $.ajax( {
        type: "GET",
        url: '../admin/parameter/getTahun',
        dataType: "json",
        success: function ( data ) {
            var j = data.length;
            var post, i;

            $( 'select[name="tahun_prarka"]' ).empty();
            $( 'select[name="tahun_prarka"]' ).append( '<option value="-1">---Pilih Tahun---</option>' );

            for ( i = 0; i < j; i++ ) {
                post = data[ i ];
                $( 'select[name="tahun_prarka"]' ).append( '<option value="' + post.tahun + '">' + post.tahun + '</option>' );
            }
        }
    } );

    $.ajax( {
        type: "GET",
        url: './getListUnit',
        dataType: "json",
        success: function ( data ) {
            var j = data.length;
            var post, i;

            $( 'select[name="unit_prarka"]' ).empty();
            $( 'select[name="unit_prarka"]' ).append( '<option value="-1">---Pilih Unit 90---</option>' );

            for ( i = 0; i < j; i++ ) {
                post = data[ i ];
                $( 'select[name="unit_prarka"]' ).append( '<option value="' + post.id_unit + '">' + post.unit_display + '</option>' );
            }
        }
    } );

    $( ".unit_prarka" ).change( function () {
        $.ajax( {
            type: "GET",
            url: './getListSubUnit?id_unit=' + $( '#unit_prarka' ).val(),
            dataType: "json",
            success: function ( data ) {
                var j = data.length;
                var post, i;

                $( 'select[name="sub_prarka2"]' ).empty();
                $( 'select[name="sub_prarka2"]' ).append( '<option value="-1">---Pilih Sub Unit 90---</option>' );

                for ( i = 0; i < j; i++ ) {
                    post = data[ i ];
                    $( 'select[name="sub_prarka2"]' ).append( '<option value="' + post.id_sub_unit + '">' + post.sub_unit_display + '</option>' );
                }
            }
        } );
    } );

    $( document ).on( 'click', '.btnProses', function () {
        if ( document.getElementById( "checkTandatangan" ).checked ) {
            check_data = 1
        } else {
            check_data = 0
        }

        if ( $( '#jns_laporan' ).val() == 1 ) {
            vars = "?token=" + $( 'input[name=_token]' ).val();
            vars += "&tahun=" + $( '#tahun_prarka' ).val();
            vars += "&unit=" + $( '#unit_prarka' ).val();
            vars += "&jabatan=" + $( '#jabatan' ).val();
            vars += "&nama_pejabat=" + $( '#nama_pejabat' ).val();
            vars += "&nip_pejabat=" + $( '#nip_pejabat' ).val();
            vars += "&kota=" + $( '#nama_kota_lap' ).val();
            vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
            vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
            vars += "&ttd=" + check_data;
            window.open( './RkpdTC33ver90' + vars, '_blank' );
        };

        if ( $( '#jns_laporan' ).val() == 2 ) {
            vars = "?token=" + $( 'input[name=_token]' ).val();
            vars += "&tahun=" + $( '#tahun_prarka' ).val();
            vars += "&unit=" + $( '#unit_prarka' ).val();
            vars += "&jabatan=" + $( '#jabatan' ).val();
            vars += "&nama_pejabat=" + $( '#nama_pejabat' ).val();
            vars += "&nip_pejabat=" + $( '#nip_pejabat' ).val();
            vars += "&kota=" + $( '#nama_kota_lap' ).val();
            vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
            vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
            vars += "&ttd=" + check_data;
            window.open( './RkpdHasilPemetaan90' + vars, '_blank' );
        };

        if ( $( '#jns_laporan' ).val() == 50 ) {
            vars = "?token=" + $( 'input[name=_token]' ).val();
            vars += "&tahun=" + $( '#tahun_prarka' ).val();
            vars += "&unit=" + $( '#unit_prarka' ).val();
            vars += "&jabatan=" + $( '#jabatan' ).val();
            vars += "&nama_pejabat=" + $( '#nama_pejabat' ).val();
            vars += "&nip_pejabat=" + $( '#nip_pejabat' ).val();
            vars += "&kota=" + $( '#nama_kota_lap' ).val();
            vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
            vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
            vars += "&ttd=" + check_data;
            window.open( './RingkasanRek90' + vars, '_blank' );
        };

        if ( $( '#jns_laporan' ).val() == 51 ) {
            vars = "?token=" + $( 'input[name=_token]' ).val();
            vars += "&tahun=" + $( '#tahun_prarka' ).val();
            vars += "&unit=" + $( '#unit_prarka' ).val();
            vars += "&jabatan=" + $( '#jabatan' ).val();
            vars += "&nama_pejabat=" + $( '#nama_pejabat' ).val();
            vars += "&nip_pejabat=" + $( '#nip_pejabat' ).val();
            vars += "&kota=" + $( '#nama_kota_lap' ).val();
            vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
            vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
            vars += "&ttd=" + check_data;
            window.open( './RkpdHasilPemetaanRek90' + vars, '_blank' );
        };

    } );


} );