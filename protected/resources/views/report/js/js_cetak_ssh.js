$( document ).ready( function () {

    $.ajax( {
        type: "GET",
        url: './cetakssh/getPerkadaSsh',
        dataType: "json",
        success: function ( data ) {
            var j = data.length;
            var post, i;

            $( 'select[name="cb_no_perda"]' ).empty();
            $( 'select[name="cb_no_perda"]' ).append( '<option value="-1">Pilih Nomor Perkada SSH</option>' );

            for ( i = 0; i < j; i++ ) {
                post = data[ i ];
                $( 'select[name="cb_no_perda"]' ).append( '<option value="' + post.id_perkada + '">' + post.nomor_perkada + ' (Berlaku:' + post.tahun_berlaku + ')</option>' );

            }
        }
    } );

    $( ".cb_no_perda" ).change( function () {
        $.ajax( {
            type: "GET",
            url: './cetakssh/getZonaPerkada/' + $( '#cb_no_perda' ).val(),
            dataType: "json",
            success: function ( data ) {
                var j = data.length;
                var post, i;

                $( 'select[name="cb_zona"]' ).empty();
                $( 'select[name="cb_zona"]' ).append( '<option value="-1">---Semua Zona---</option>' );

                for ( i = 0; i < j; i++ ) {
                    post = data[ i ];
                    $( 'select[name="cb_zona"]' ).append( '<option value="' + post.id_zona + '">' + post.keterangan_zona + '</option>' );
                }
            }
        } );
    } );


    $.ajax( {
        type: "GET",
        url: './cetakssh/jenis_report_ssh',
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
        url: './cetakssh/getGolonganSsh',
        dataType: "json",
        success: function ( data ) {
            var j = data.length;
            var post, i;

            $( 'select[name="cb_golongan"]' ).empty();
            $( 'select[name="cb_golongan"]' ).append( '<option value="-1">---Semua Golongan SSH---</option>' );

            for ( i = 0; i < j; i++ ) {
                post = data[ i ];
                $( 'select[name="cb_golongan"]' ).append( '<option value="' + post.id_golongan_ssh + '">' + post.uraian_golongan_ssh + '</option>' );
            }
        }
    } );

    $( ".cb_golongan" ).change( function () {
        $.ajax( {
            type: "GET",
            url: './cetakssh/getKelompokSsh/' + $( '#cb_golongan' ).val(),
            dataType: "json",
            success: function ( data ) {
                var j = data.length;
                var post, i;

                $( 'select[name="cb_kelompok"]' ).empty();
                $( 'select[name="cb_kelompok"]' ).append( '<option value="-1">---Semua Kelompok SSH---</option>' );

                for ( i = 0; i < j; i++ ) {
                    post = data[ i ];
                    $( 'select[name="cb_kelompok"]' ).append( '<option value="' + post.id_kelompok_ssh + '">' + post.uraian_kelompok_ssh + '</option>' );
                }
            }
        } );
    } );

    $( ".cb_kelompok" ).change( function () {
        $.ajax( {
            type: "GET",
            url: './cetakssh/getSubKelompokSsh/' + $( '#cb_kelompok' ).val(),
            dataType: "json",
            success: function ( data ) {
                var j = data.length;
                var post, i;

                $( 'select[name="cb_subkelompok"]' ).empty();
                $( 'select[name="cb_subkelompok"]' ).append( '<option value="-1">---Semua Sub Kelompok SSH---</option>' );

                for ( i = 0; i < j; i++ ) {
                    post = data[ i ];
                    $( 'select[name="cb_subkelompok"]' ).append( '<option value="' + post.id_sub_kelompok_ssh + '">' + post.uraian_sub_kelompok_ssh + '</option>' );
                }
            }
        } );
    } );

    $( document ).on( 'click', '.btnProses', function () {
        // if ( $( '#jns_laporan' ).val() == 1 ) {
        //     window.open( './printGolonganSsh' );
        // };
        // if ( $( '#jns_laporan' ).val() == 2 ) {
        //     window.open( './printKelompokSsh' );
        // };
        // if ( $( '#jns_laporan' ).val() == 3 ) {
        //     window.open( './printSubKelompokSsh' );
        // };
        // if ( $( '#jns_laporan' ).val() == 4 ) {
        //     window.open( './printItemSshX' );
        // };

        if ( $( '#jns_laporan' ).val() == 1 ) {
            vars = "?token=" + $( 'input[name=_token]' ).val();
            vars += "&id_golongan=" + $( '#cb_golongan' ).val();
            vars += "&id_kelompok=" + $( '#cb_kelompok' ).val();
            vars += "&id_subkelompok=" + $( '#cb_subkelompok' ).val();
            vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
            window.open( './printStrukturSsh' + vars, '_blank' );
        };

        if ( $( '#jns_laporan' ).val() == 2 ) {
            vars = "?token=" + $( 'input[name=_token]' ).val();
            vars += "&id_dokumen=" + $( '#cb_no_perda' ).val();
            vars += "&id_zona=" + $( '#cb_zona' ).val();
            vars += "&id_golongan=" + $( '#cb_golongan' ).val();
            vars += "&id_kelompok=" + $( '#cb_kelompok' ).val();
            vars += "&id_subkelompok=" + $( '#cb_subkelompok' ).val();
            vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
            window.open( './printPerkadaSsh' + vars, '_blank' );
        };
    } );


} );