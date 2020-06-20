$( document ).ready( function () {

  $( '#tgl_laporan_x' ).val( formatTgl( hariIni() ) );

  $( '#tgl_laporan_x' ).datepicker( {
    altField: "#tgl_laporan",
    altFormat: "yy-mm-dd",
    dateFormat: "dd MM yy",
  } );

  $.ajax( {
    type: "GET",
    url: '../admin/parameter/getUrusan',
    dataType: "json",
    success: function ( data ) {
      var j = data.length;
      var post, i;

      $( 'select[name="urusan_prarka"]' ).empty();
      $( 'select[name="urusan_prarka"]' ).append( '<option value="-1">---Pilih Urusan---</option>' );

      for ( i = 0; i < j; i++ ) {
        post = data[ i ];
        $( 'select[name="urusan_prarka"]' ).append( '<option value="' + post.kd_urusan + '">' + post.nm_urusan + '</option>' );

      }
    }
  } );

  $.ajax( {
    type: "GET",
    url: './jenis_rkpd_rancangan',
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

  $( ".urusan_prarka" ).change( function () {
    $.ajax( {
      type: "GET",
      url: '../admin/parameter/getBidang/' + $( '#urusan_prarka' ).val(),
      dataType: "json",
      success: function ( data ) {
        var j = data.length;
        var post, i;

        $( 'select[name="bidang_prarka"]' ).empty();
        $( 'select[name="bidang_prarka"]' ).append( '<option value="-1">---Pilih  Bidang---</option>' );

        for ( i = 0; i < j; i++ ) {
          post = data[ i ];
          $( 'select[name="bidang_prarka"]' ).append( '<option value="' + post.id_bidang + '">' + post.nm_bidang + '</option>' );
        }
      }
    } );
  } );

  $( ".bidang_prarka" ).change( function () {
    $.ajax( {
      type: "GET",
      url: '../admin/parameter/getUnit2/' + $( '#bidang_prarka' ).val(),
      dataType: "json",
      success: function ( data ) {
        var j = data.length;
        var post, i;

        $( 'select[name="unit_prarka"]' ).empty();
        $( 'select[name="unit_prarka"]' ).append( '<option value="-1">---Pilih Unit---</option>' );

        for ( i = 0; i < j; i++ ) {
          post = data[ i ];
          $( 'select[name="unit_prarka"]' ).append( '<option value="' + post.id_unit + '">' + post.nm_unit + '</option>' );
        }
      }
    } );
  } );

  $( ".unit_prarka" ).change( function () {
    $.ajax( {
      type: "GET",
      url: 'getProgramRkpd/' + $( '#unit_prarka' ).val() + '/' + $( '#tahun_prarka' ).val() + '/' + $( '#jns_dokumen' ).val(),
      dataType: "json",
      success: function ( data ) {
        var j = data.length;
        var post, i;

        $( 'select[name="prog_prarka"]' ).empty();
        $( 'select[name="prog_prarka"]' ).append( '<option value="-1">---Pilih Program---</option>' );

        for ( i = 0; i < j; i++ ) {
          post = data[ i ];
          $( 'select[name="prog_prarka"]' ).append( '<option value="' + post.id_program_pd + '">' + post.uraian_program_renstra + '</option>' );
        }
      }
    } );
    $.ajax( {
      type: "GET",
      url: '../admin/parameter/getSub2/' + $( '#unit_prarka' ).val(),
      dataType: "json",

      success: function ( data ) {
        var j = data.length;
        var post, i;

        $( 'select[name="sub_prarka2"]' ).empty();
        $( 'select[name="sub_prarka2"]' ).append( '<option value="-1">---Pilih Sub Unit---</option>' );

        for ( i = 0; i < j; i++ ) {
          post = data[ i ];
          $( 'select[name="sub_prarka2"]' ).append( '<option value="' + post.id_sub_unit + '">' + post.nm_sub + '</option>' );
        }
      }
    } );
  } );

  $( ".prog_prarka" ).change( function () {
    $.ajax( {
      type: "GET",
      url: 'getKegiatanRkpd/' + $( '#prog_prarka' ).val() + '/' + $( '#jns_dokumen' ).val(),
      dataType: "json",
      success: function ( data ) {
        var j = data.length;
        var post, i;

        $( 'select[name="keg_prarka"]' ).empty();
        $( 'select[name="keg_prarka"]' ).append( '<option value="-1">---Pilih Kegiatan---</option>' );

        for ( i = 0; i < j; i++ ) {
          post = data[ i ];
          $( 'select[name="keg_prarka"]' ).append( '<option value="' + post.id_kegiatan_pd + '">' + post.uraian_kegiatan_forum + '</option>' );
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
      vars += "&tabel=" + $( '#jns_dokumen' ).val();
      vars += "&jabatan=" + $( '#jabatan' ).val();
      vars += "&nama_pejabat=" + $( '#nama_pejabat' ).val();
      vars += "&nip_pejabat=" + $( '#nip_pejabat' ).val();
      vars += "&kota=" + $( '#nama_kota_lap' ).val();
      vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
      vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
      vars += "&ttd=" + check_data;
      vars += "&uraian_header=" + $( '#jns_dokumen option:selected' ).text();
      window.open( '../RancanganTC33' + vars, '_blank' );
    };

    if ( $( '#jns_laporan' ).val() == 31 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&unit=" + $( '#unit_prarka' ).val();
      vars += "&tabel=" + $( '#jns_dokumen' ).val();
      vars += "&jabatan=" + $( '#jabatan' ).val();
      vars += "&nama_pejabat=" + $( '#nama_pejabat' ).val();
      vars += "&nip_pejabat=" + $( '#nip_pejabat' ).val();
      vars += "&kota=" + $( '#nama_kota_lap' ).val();
      vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
      vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
      vars += "&ttd=" + check_data;
      vars += "&uraian_header=" + $( '#jns_dokumen option:selected' ).text();
      window.open( '../RkpdForm1' + vars, '_blank' );
    };

    if ( $( '#jns_laporan' ).val() == 32 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&unit=" + $( '#unit_prarka' ).val();
      vars += "&tabel=" + $( '#jns_dokumen' ).val();
      vars += "&jabatan=" + $( '#jabatan' ).val();
      vars += "&nama_pejabat=" + $( '#nama_pejabat' ).val();
      vars += "&nip_pejabat=" + $( '#nip_pejabat' ).val();
      vars += "&kota=" + $( '#nama_kota_lap' ).val();
      vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
      vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
      vars += "&ttd=" + check_data;
      vars += "&uraian_header=" + $( '#jns_dokumen option:selected' ).text();
      window.open( '../RkpdForm2' + vars, '_blank' );
    };

    if ( $( '#jns_laporan' ).val() == 33 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&unit=" + $( '#unit_prarka' ).val();
      vars += "&tabel=" + $( '#jns_dokumen' ).val();
      vars += "&jabatan=" + $( '#jabatan' ).val();
      vars += "&nama_pejabat=" + $( '#nama_pejabat' ).val();
      vars += "&nip_pejabat=" + $( '#nip_pejabat' ).val();
      vars += "&kota=" + $( '#nama_kota_lap' ).val();
      vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
      vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
      vars += "&ttd=" + check_data;
      vars += "&uraian_header=" + $( '#jns_dokumen option:selected' ).text();
      window.open( '../RkpdForm3' + vars, '_blank' );
    };

    if ( $( '#jns_laporan' ).val() == 34 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&unit=" + $( '#unit_prarka' ).val();
      vars += "&tabel=" + $( '#jns_dokumen' ).val();
      vars += "&jabatan=" + $( '#jabatan' ).val();
      vars += "&nama_pejabat=" + $( '#nama_pejabat' ).val();
      vars += "&nip_pejabat=" + $( '#nip_pejabat' ).val();
      vars += "&kota=" + $( '#nama_kota_lap' ).val();
      vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
      vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
      vars += "&ttd=" + check_data;
      vars += "&uraian_header=" + $( '#jns_dokumen option:selected' ).text();
      window.open( '../RkpdForm4' + vars, '_blank' );
    };

    if ( $( '#jns_laporan' ).val() == 35 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&unit=" + $( '#unit_prarka' ).val();
      vars += "&tabel=" + $( '#jns_dokumen' ).val();
      vars += "&jabatan=" + $( '#jabatan' ).val();
      vars += "&nama_pejabat=" + $( '#nama_pejabat' ).val();
      vars += "&nip_pejabat=" + $( '#nip_pejabat' ).val();
      vars += "&kota=" + $( '#nama_kota_lap' ).val();
      vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
      vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
      vars += "&ttd=" + check_data;
      vars += "&uraian_header=" + $( '#jns_dokumen option:selected' ).text();
      window.open( '../RkpdForm5' + vars, '_blank' );
    };

    if ( $( '#jns_laporan' ).val() == 36 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&unit=" + $( '#unit_prarka' ).val();
      vars += "&tabel=" + $( '#jns_dokumen' ).val();
      vars += "&jabatan=" + $( '#jabatan' ).val();
      vars += "&nama_pejabat=" + $( '#nama_pejabat' ).val();
      vars += "&nip_pejabat=" + $( '#nip_pejabat' ).val();
      vars += "&kota=" + $( '#nama_kota_lap' ).val();
      vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
      vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
      vars += "&ttd=" + check_data;
      vars += "&uraian_header=" + $( '#jns_dokumen option:selected' ).text();
      window.open( '../RkpdForm6' + vars, '_blank' );
    };

    if ( $( '#jns_laporan' ).val() == 37 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&unit=" + $( '#unit_prarka' ).val();
      vars += "&tabel=" + $( '#jns_dokumen' ).val();
      vars += "&jabatan=" + $( '#jabatan' ).val();
      vars += "&nama_pejabat=" + $( '#nama_pejabat' ).val();
      vars += "&nip_pejabat=" + $( '#nip_pejabat' ).val();
      vars += "&kota=" + $( '#nama_kota_lap' ).val();
      vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
      vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
      vars += "&ttd=" + check_data;
      vars += "&uraian_header=" + $( '#jns_dokumen option:selected' ).text();
      window.open( '../RkpdForm7' + vars, '_blank' );
    };

    if ( $( '#jns_laporan' ).val() == 50 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&id_unit=" + $( '#unit_prarka' ).val();
      vars += "&id_sub=" + $( '#sub_prarka2' ).val();
      vars += "&tabel=" + $( '#jns_dokumen' ).val();
      vars += "&uraian_header=" + $( '#jns_dokumen option:selected' ).text();
      vars += "&id_program=" + $( '#prog_prarka' ).val();
      vars += "&id_kegiatan=" + $( '#keg_prarka' ).val();
      window.open( '../Rancangan221' + vars, '_blank' );
    };

    if ( $( '#jns_laporan' ).val() == 51 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&unit=" + $( '#unit_prarka' ).val();
      vars += "&tabel=" + $( '#jns_dokumen' ).val();
      vars += "&uraian_header=" + $( '#jns_dokumen option:selected' ).text();
      window.open( '../RkpdRekapSD' + vars, '_blank' );
    };

    if ( $( '#jns_laporan' ).val() == 52 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&id_unit=" + $( '#unit_prarka' ).val();
      vars += "&tabel=" + $( '#jns_dokumen' ).val();
      vars += "&uraian_header=" + $( '#jns_dokumen option:selected' ).text();
      window.open( '../RkpdRincianSD' + vars, '_blank' );
    };

    if ( $( '#jns_laporan' ).val() == 60 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&unit=" + $( '#unit_prarka' ).val();
      vars += "&tabel=" + $( '#jns_dokumen' ).val();
      vars += "&uraian_header=" + $( '#jns_dokumen option:selected' ).text();
      window.open( '../RancanganRkpd1' + vars, '_blank' );
    };

    if ( $( '#jns_laporan' ).val() == 61 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&unit=" + $( '#unit_prarka' ).val();
      vars += "&tabel=" + $( '#jns_dokumen' ).val();
      vars += "&uraian_header=" + $( '#jns_dokumen option:selected' ).text();
      window.open( '../RancanganRkpd1a' + vars, '_blank' );
    };

    if ( $( '#jns_laporan' ).val() == 62 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&unit=" + $( '#unit_prarka' ).val();
      vars += "&tabel=" + $( '#jns_dokumen' ).val();
      vars += "&uraian_header=" + $( '#jns_dokumen option:selected' ).text();
      window.open( '../RkpdRekapPagu' + vars, '_blank' );
    };

    if ( $( '#jns_laporan' ).val() == 63 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&unit=" + $( '#unit_prarka' ).val();
      vars += "&tabel=" + $( '#jns_dokumen' ).val();
      vars += "&uraian_header=" + $( '#jns_dokumen option:selected' ).text();
      window.open( '../RkpdRekapPK' + vars, '_blank' );
    };

    //     if($('#jns_laporan').val()==9){
    //        window.open('../PrintKompilasiKegiatanRanwalRenja/'+ $('#unit_prarka').val()+'/'+$('#tahun_prarka').val()); 
    //     };
    //     if($('#jns_laporan').val()==11){
    //        window.open('../CekRanwalRenja/'+$('#tahun_prarka').val()); 
    //     };    
  } );


} );