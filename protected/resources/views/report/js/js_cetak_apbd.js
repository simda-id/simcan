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

    // var hariIni = yyyy + '-' + mm + '-' + dd;
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
    url: './jenis_apbd',
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

  $( ".tahun_prarka" ).change( function () {
    $.ajax( {
      type: "GET",
      url: './getDokAPBD/' + $( '#tahun_prarka' ).val(),
      dataType: "json",
      success: function ( data ) {
        var j = data.length;
        var post, i;

        $( 'select[name="no_dokumen"]' ).empty();
        $( 'select[name="no_dokumen"]' ).append( '<option value="-1">---Pilih  Dokumen APBD---</option>' );

        for ( i = 0; i < j; i++ ) {
          post = data[ i ];
          $( 'select[name="no_dokumen"]' ).append( '<option value="' + post.id_dokumen_keu + '">' + post.nomor_keu + " (" + post.uraian_perkada + ")" + '</option>' );
        }
      }
    } );
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
      url: 'getProgramAPBD/' + $( '#unit_prarka' ).val() + '/' + $( '#tahun_prarka' ).val(),
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
      url: 'getKegiatanAPBD/' + $( '#prog_prarka' ).val(),
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
      window.open( '../PrintKompilasiKegiatandanPaguF/' + $( '#unit_prarka' ).val() + '/' + $( '#tahun_prarka' ).val() );
    };
    if ( $( '#jns_laporan' ).val() == 2 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&id_dokumen=" + $( '#no_dokumen' ).val();
      window.open( '../PrintRingkasAPBDAP' + vars, '_blank' );
    };
    if ( $( '#jns_laporan' ).val() == 3 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&id_dokumen=" + $( '#no_dokumen' ).val();
      window.open( '../PrintAPBDAP' + vars, '_blank' );
    };
    if ( $( '#jns_laporan' ).val() == 4 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&sub_unit=" + $( '#sub_prarka2' ).val();
      vars += "&id_dokumen=" + $( '#no_dokumen' ).val();
      window.open( '../PrintPraRKA2AP' + vars, '_blank' );
    };
    if ( $( '#jns_laporan' ).val() == 6 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&id_dokumen=" + $( '#no_dokumen' ).val();
      vars += "&id_unit=" + $( '#unit_prarka' ).val();
      vars += "&id_sub=" + $( '#sub_prarka2' ).val();
      vars += "&kota=" + $( '#nama_kota_lap' ).val();
      vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
      vars += "&uraian_dok=" + $( '#jns_dokumen' ).val();
      vars += "&uraian_header=" + $( '#jns_dokumen option:selected' ).text();
      vars += "&ttd=" + check_data;
      vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
      if ( $( '#unit_prarka' ).val() > 0 ) {
        window.open( '../RAPBDLamp1unit' + vars, '_blank' );
      } else {
        window.open( '../RAPBDLamp1' + vars, '_blank' );
      }
    };
    if ( $( '#jns_laporan' ).val() == 5 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&id_dokumen=" + $( '#no_dokumen' ).val();
      vars += "&kota=" + $( '#nama_kota_lap' ).val();
      vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
      vars += "&uraian_dok=" + $( '#jns_dokumen' ).val();
      vars += "&uraian_header=" + $( '#jns_dokumen option:selected' ).text();
      vars += "&ttd=" + check_data;
      vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
      window.open( '../RAPBDLamp2' + vars, '_blank' );
    };
    if ( $( '#jns_laporan' ).val() == 7 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&id_dokumen=" + $( '#no_dokumen' ).val();
      vars += "&kota=" + $( '#nama_kota_lap' ).val();
      vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
      vars += "&uraian_dok=" + $( '#jns_dokumen' ).val();
      vars += "&uraian_header=" + $( '#jns_dokumen option:selected' ).text();
      vars += "&ttd=" + check_data;
      vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
      window.open( '../RAPBDLamp2A' + vars, '_blank' );
    };
    if ( $( '#jns_laporan' ).val() == 8 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&id_dokumen=" + $( '#no_dokumen' ).val();
      vars += "&kota=" + $( '#nama_kota_lap' ).val();
      vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
      vars += "&uraian_dok=" + $( '#jns_dokumen' ).val();
      vars += "&uraian_header=" + $( '#jns_dokumen option:selected' ).text();
      vars += "&ttd=" + check_data;
      vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
      window.open( '../RAPBDLamp2B' + vars, '_blank' );
    };
    if ( $( '#jns_laporan' ).val() == 9 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&id_dokumen=" + $( '#no_dokumen' ).val();
      vars += "&id_unit=" + $( '#unit_prarka' ).val();
      vars += "&id_sub=" + $( '#sub_prarka2' ).val();
      vars += "&kota=" + $( '#nama_kota_lap' ).val();
      vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
      vars += "&uraian_dok=" + $( '#jns_dokumen' ).val();
      vars += "&uraian_header=" + $( '#jns_dokumen option:selected' ).text();
      vars += "&ttd=" + check_data;
      vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
      if ( $( '#sub_prarka2' ).val() > 0 ) {
        window.open( '../RAPBDLamp3sub' + vars, '_blank' );
      } else {
        window.open( '../RAPBDLamp3' + vars, '_blank' );
      }
    };

    if ( $( '#jns_laporan' ).val() == 10 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&id_dokumen=" + $( '#no_dokumen' ).val();
      vars += "&id_unit=" + $( '#unit_prarka' ).val();
      vars += "&id_sub=" + $( '#sub_prarka2' ).val();
      vars += "&kota=" + $( '#nama_kota_lap' ).val();
      vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
      vars += "&uraian_dok=" + $( '#jns_dokumen' ).val();
      vars += "&uraian_header=" + $( '#jns_dokumen option:selected' ).text();
      vars += "&ttd=" + check_data;
      vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
      if ( $( '#unit_prarka' ).val() > 0 ) {
        if ( $( '#sub_prarka2' ).val() > 0 ) {
          window.open( '../RAPBDLamp4sub' + vars, '_blank' );
        } else {
          window.open( '../RAPBDLamp4' + vars, '_blank' );
        }
      } else {
        window.open( '../RAPBDLamp4All' + vars, '_blank' );
      }
    };
    if ( $( '#jns_laporan' ).val() == 11 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&id_dokumen=" + $( '#no_dokumen' ).val();
      vars += "&kota=" + $( '#nama_kota_lap' ).val();
      vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
      vars += "&uraian_dok=" + $( '#jns_dokumen' ).val();
      vars += "&uraian_header=" + $( '#jns_dokumen option:selected' ).text();
      vars += "&ttd=" + check_data;
      vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
      window.open( '../RAPBDLamp5' + vars, '_blank' );
    };

    if ( $( '#jns_laporan' ).val() == 12 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&id_dokumen=" + $( '#no_dokumen' ).val();
      vars += "&id_unit=" + $( '#unit_prarka' ).val();
      vars += "&kota=" + $( '#nama_kota_lap' ).val();
      vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
      vars += "&uraian_dok=" + $( '#jns_dokumen' ).val();
      vars += "&uraian_header=" + $( '#jns_dokumen option:selected' ).text();
      vars += "&ttd=" + check_data;
      vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
      window.open( '../LampJabar1' + vars, '_blank' );
    };
    if ( $( '#jns_laporan' ).val() == '12a' ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&id_dokumen=" + $( '#no_dokumen' ).val();
      vars += "&id_unit=" + $( '#unit_prarka' ).val();
      vars += "&kota=" + $( '#nama_kota_lap' ).val();
      vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
      vars += "&uraian_dok=" + $( '#jns_dokumen' ).val();
      vars += "&uraian_header=" + $( '#jns_dokumen option:selected' ).text();
      vars += "&ttd=" + check_data;
      vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
      if ( $( '#unit_prarka' ).val() > 0 ) {
        window.open( '../LampJabar1a' + vars, '_blank' );
      } else {
        window.open( '../LampJabar1aAll' + vars, '_blank' );
      }
    };
    if ( $( '#jns_laporan' ).val() == 13 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&id_dokumen=" + $( '#no_dokumen' ).val();
      vars += "&id_unit=" + $( '#unit_prarka' ).val();
      vars += "&id_sub=" + $( '#sub_prarka2' ).val();
      vars += "&kota=" + $( '#nama_kota_lap' ).val();
      vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
      vars += "&uraian_dok=" + $( '#jns_dokumen' ).val();
      vars += "&uraian_header=" + $( '#jns_dokumen option:selected' ).text();
      vars += "&ttd=" + check_data;
      vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
      window.open( '../LampJabar2' + vars, '_blank' );
    };
    if ( $( '#jns_laporan' ).val() == 14 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&id_dokumen=" + $( '#no_dokumen' ).val();
      vars += "&id_sub=" + $( '#sub_prarka2' ).val();
      vars += "&id_unit=" + $( '#unit_prarka' ).val();
      vars += "&kota=" + $( '#nama_kota_lap' ).val();
      vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
      vars += "&uraian_dok=" + $( '#jns_dokumen' ).val();
      vars += "&uraian_header=" + $( '#jns_dokumen option:selected' ).text();
      vars += "&ttd=" + check_data;
      vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
      window.open( '../LampJabar2a' + vars, '_blank' );
    };

    if ( $( '#jns_laporan' ).val() == 16 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&id_dokumen=" + $( '#no_dokumen' ).val();
      vars += "&id_unit=" + $( '#unit_prarka' ).val();
      vars += "&id_sub=" + $( '#sub_prarka2' ).val();
      vars += "&kota=" + $( '#nama_kota_lap' ).val();
      vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
      vars += "&uraian_dok=" + $( '#jns_dokumen' ).val();
      vars += "&uraian_header=" + $( '#jns_dokumen option:selected' ).text();
      vars += "&ttd=" + check_data;
      vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
      window.open( '../LampSumberDana' + vars, '_blank' );
    };

    if ( $( '#jns_laporan' ).val() == 17 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&id_dokumen=" + $( '#no_dokumen' ).val();
      vars += "&id_unit=" + $( '#unit_prarka' ).val();
      vars += "&id_sub=" + $( '#sub_prarka2' ).val();
      vars += "&kota=" + $( '#nama_kota_lap' ).val();
      vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
      vars += "&uraian_dok=" + $( '#jns_dokumen' ).val();
      vars += "&uraian_header=" + $( '#jns_dokumen option:selected' ).text();
      vars += "&ttd=" + check_data;
      vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
      window.open( '../RekapSumberDana' + vars, '_blank' );
    };

    if ( $( '#jns_laporan' ).val() == 20 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&id_dokumen=" + $( '#no_dokumen' ).val();
      vars += "&id_unit=" + $( '#unit_prarka' ).val();
      vars += "&id_sub=" + $( '#sub_prarka2' ).val();
      vars += "&kota=" + $( '#nama_kota_lap' ).val();
      vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
      vars += "&uraian_dok=" + $( '#jns_dokumen' ).val();
      vars += "&uraian_header=" + $( '#jns_dokumen option:selected' ).text();
      vars += "&ttd=" + check_data;
      vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
      window.open( '../LampRKAPPKDHeader' + vars, '_blank' );
    };

    if ( $( '#jns_laporan' ).val() == 21 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&id_dokumen=" + $( '#no_dokumen' ).val();
      vars += "&id_unit=" + $( '#unit_prarka' ).val();
      vars += "&id_sub=" + $( '#sub_prarka2' ).val();
      vars += "&kota=" + $( '#nama_kota_lap' ).val();
      vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
      vars += "&uraian_dok=" + $( '#jns_dokumen' ).val();
      vars += "&uraian_header=" + $( '#jns_dokumen option:selected' ).text();
      vars += "&ttd=" + check_data;
      vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
      window.open( '../LampRKAPPKDRekap' + vars, '_blank' );
    };

    if ( $( '#jns_laporan' ).val() == 22 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&id_dokumen=" + $( '#no_dokumen' ).val();
      vars += "&id_unit=" + $( '#unit_prarka' ).val();
      vars += "&id_sub=" + $( '#sub_prarka2' ).val();
      vars += "&kota=" + $( '#nama_kota_lap' ).val();
      vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
      vars += "&uraian_dok=" + $( '#jns_dokumen' ).val();
      vars += "&uraian_header=" + $( '#jns_dokumen option:selected' ).text();
      vars += "&ttd=" + check_data;
      vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
      window.open( '../LampRKAPPKD10' + vars, '_blank' );
    };

    if ( $( '#jns_laporan' ).val() == 23 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&id_dokumen=" + $( '#no_dokumen' ).val();
      vars += "&id_unit=" + $( '#unit_prarka' ).val();
      vars += "&id_sub=" + $( '#sub_prarka2' ).val();
      vars += "&kota=" + $( '#nama_kota_lap' ).val();
      vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
      vars += "&uraian_dok=" + $( '#jns_dokumen' ).val();
      vars += "&uraian_header=" + $( '#jns_dokumen option:selected' ).text();
      vars += "&ttd=" + check_data;
      vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
      window.open( '../LampRKAPPKD21' + vars, '_blank' );
    };

    if ( $( '#jns_laporan' ).val() == 24 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&id_dokumen=" + $( '#no_dokumen' ).val();
      vars += "&id_unit=" + $( '#unit_prarka' ).val();
      vars += "&id_sub=" + $( '#sub_prarka2' ).val();
      vars += "&kota=" + $( '#nama_kota_lap' ).val();
      vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
      vars += "&uraian_dok=" + $( '#jns_dokumen' ).val();
      vars += "&uraian_header=" + $( '#jns_dokumen option:selected' ).text();
      vars += "&ttd=" + check_data;
      vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
      window.open( '../LampRKAPPKD31' + vars, '_blank' );
    };

    if ( $( '#jns_laporan' ).val() == 25 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&id_dokumen=" + $( '#no_dokumen' ).val();
      vars += "&id_unit=" + $( '#unit_prarka' ).val();
      vars += "&id_sub=" + $( '#sub_prarka2' ).val();
      vars += "&kota=" + $( '#nama_kota_lap' ).val();
      vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
      vars += "&uraian_dok=" + $( '#jns_dokumen' ).val();
      vars += "&uraian_header=" + $( '#jns_dokumen option:selected' ).text();
      vars += "&ttd=" + check_data;
      vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
      window.open( '../LampRKAPPKD32' + vars, '_blank' );
    };

    if ( $( '#jns_laporan' ).val() == 30 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&id_dokumen=" + $( '#no_dokumen' ).val();
      vars += "&id_unit=" + $( '#unit_prarka' ).val();
      vars += "&id_sub=" + $( '#sub_prarka2' ).val();
      vars += "&kota=" + $( '#nama_kota_lap' ).val();
      vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
      vars += "&uraian_dok=" + $( '#jns_dokumen' ).val();
      vars += "&uraian_header=" + $( '#jns_dokumen option:selected' ).text();
      vars += "&ttd=" + check_data;
      vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
      window.open( '../LampRKAHeader' + vars, '_blank' );
    };

    if ( $( '#jns_laporan' ).val() == 31 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&id_dokumen=" + $( '#no_dokumen' ).val();
      vars += "&id_unit=" + $( '#unit_prarka' ).val();
      vars += "&id_sub=" + $( '#sub_prarka2' ).val();
      vars += "&kota=" + $( '#nama_kota_lap' ).val();
      vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
      vars += "&uraian_dok=" + $( '#jns_dokumen' ).val();
      vars += "&uraian_header=" + $( '#jns_dokumen option:selected' ).text();
      vars += "&ttd=" + check_data;
      vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
      window.open( '../LampRKA1' + vars, '_blank' );
    };

    if ( $( '#jns_laporan' ).val() == 32 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&id_dokumen=" + $( '#no_dokumen' ).val();
      vars += "&id_unit=" + $( '#unit_prarka' ).val();
      vars += "&id_sub=" + $( '#sub_prarka2' ).val();
      vars += "&kota=" + $( '#nama_kota_lap' ).val();
      vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
      vars += "&uraian_dok=" + $( '#jns_dokumen' ).val();
      vars += "&uraian_header=" + $( '#jns_dokumen option:selected' ).text();
      vars += "&ttd=" + check_data;
      vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
      window.open( '../LampRKA10' + vars, '_blank' );
    };

    if ( $( '#jns_laporan' ).val() == 33 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&id_dokumen=" + $( '#no_dokumen' ).val();
      vars += "&id_unit=" + $( '#unit_prarka' ).val();
      vars += "&id_sub=" + $( '#sub_prarka2' ).val();
      vars += "&kota=" + $( '#nama_kota_lap' ).val();
      vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
      vars += "&uraian_dok=" + $( '#jns_dokumen' ).val();
      vars += "&uraian_header=" + $( '#jns_dokumen option:selected' ).text();
      vars += "&ttd=" + check_data;
      vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
      window.open( '../LampRKA21' + vars, '_blank' );
    };

    if ( $( '#jns_laporan' ).val() == 34 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&id_dokumen=" + $( '#no_dokumen' ).val();
      vars += "&id_unit=" + $( '#unit_prarka' ).val();
      vars += "&id_sub=" + $( '#sub_prarka2' ).val();
      vars += "&kota=" + $( '#nama_kota_lap' ).val();
      vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
      vars += "&uraian_dok=" + $( '#jns_dokumen' ).val();
      vars += "&uraian_header=" + $( '#jns_dokumen option:selected' ).text();
      vars += "&ttd=" + check_data;
      vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
      window.open( '../LampRKA22' + vars, '_blank' );
    };
    if ( $( '#jns_laporan' ).val() == 15 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&id_dokumen=" + $( '#no_dokumen' ).val();
      vars += "&id_unit=" + $( '#unit_prarka' ).val();
      vars += "&id_sub=" + $( '#sub_prarka2' ).val();
      vars += "&id_program=" + $( '#prog_prarka' ).val();
      vars += "&id_kegiatan=" + $( '#keg_prarka' ).val();
      vars += "&kota=" + $( '#nama_kota_lap' ).val();
      vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
      vars += "&uraian_dok=" + $( '#jns_dokumen' ).val();
      vars += "&uraian_header=" + $( '#jns_dokumen option:selected' ).text();
      vars += "&ttd=" + check_data;
      vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
      if ( $( '#sub_prarka2' ).val() > 0 ) {
        window.open( '../LampRKA221' + vars, '_blank' );
      } else {
        window.open( '../LampRKA221Unit' + vars, '_blank' );
      }
    };

    if ( $( '#jns_laporan' ).val() == 35 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&id_dokumen=" + $( '#no_dokumen' ).val();
      vars += "&id_unit=" + $( '#unit_prarka' ).val();
      vars += "&id_sub=" + $( '#sub_prarka2' ).val();
      vars += "&kota=" + $( '#nama_kota_lap' ).val();
      vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
      vars += "&uraian_dok=" + $( '#jns_dokumen' ).val();
      vars += "&uraian_header=" + $( '#jns_dokumen option:selected' ).text();
      vars += "&ttd=" + check_data;
      vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
      window.open( '../LampRKA31' + vars, '_blank' );
    };

    if ( $( '#jns_laporan' ).val() == 36 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&id_dokumen=" + $( '#no_dokumen' ).val();
      vars += "&id_unit=" + $( '#unit_prarka' ).val();
      vars += "&id_sub=" + $( '#sub_prarka2' ).val();
      vars += "&kota=" + $( '#nama_kota_lap' ).val();
      vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
      vars += "&uraian_dok=" + $( '#jns_dokumen' ).val();
      vars += "&uraian_header=" + $( '#jns_dokumen option:selected' ).text();
      vars += "&ttd=" + check_data;
      vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
      window.open( '../LampRKA32' + vars, '_blank' );
    };

    if ( $( '#jns_laporan' ).val() == 40 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&id_dokumen=" + $( '#no_dokumen' ).val();
      vars += "&id_unit=" + $( '#unit_prarka' ).val();
      vars += "&id_sub=" + $( '#sub_prarka2' ).val();
      vars += "&kota=" + $( '#nama_kota_lap' ).val();
      vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
      vars += "&uraian_dok=" + $( '#jns_dokumen' ).val();
      vars += "&uraian_header=" + $( '#jns_dokumen option:selected' ).text();
      vars += "&ttd=" + check_data;
      vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
      window.open( '../RekapPerUnit' + vars, '_blank' );
    };

    if ( $( '#jns_laporan' ).val() == 41 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&id_dokumen=" + $( '#no_dokumen' ).val();
      vars += "&id_unit=" + $( '#unit_prarka' ).val();
      vars += "&id_sub=" + $( '#sub_prarka2' ).val();
      vars += "&kota=" + $( '#nama_kota_lap' ).val();
      vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
      vars += "&uraian_dok=" + $( '#jns_dokumen' ).val();
      vars += "&uraian_header=" + $( '#jns_dokumen option:selected' ).text();
      vars += "&ttd=" + check_data;
      vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
      window.open( '../RekapPerPK' + vars, '_blank' );
    };

    if ( $( '#jns_laporan' ).val() == 42 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&id_dokumen=" + $( '#no_dokumen' ).val();
      vars += "&id_unit=" + $( '#unit_prarka' ).val();
      vars += "&id_sub=" + $( '#sub_prarka2' ).val();
      vars += "&kota=" + $( '#nama_kota_lap' ).val();
      vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
      vars += "&uraian_dok=" + $( '#jns_dokumen' ).val();
      vars += "&uraian_header=" + $( '#jns_dokumen option:selected' ).text();
      vars += "&ttd=" + check_data;
      vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
      window.open( '../CompareRincianBelanja' + vars, '_blank' );
    };

    if ( $( '#jns_laporan' ).val() == 43 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&id_dokumen=" + $( '#no_dokumen' ).val();
      vars += "&id_unit=" + $( '#unit_prarka' ).val();
      vars += "&id_sub=" + $( '#sub_prarka2' ).val();
      vars += "&kota=" + $( '#nama_kota_lap' ).val();
      vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
      vars += "&uraian_dok=" + $( '#jns_dokumen' ).val();
      vars += "&uraian_header=" + $( '#jns_dokumen option:selected' ).text();
      vars += "&ttd=" + check_data;
      vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
      window.open( '../SinkProv' + vars, '_blank' );
    };

    if ( $( '#jns_laporan' ).val() == 44 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&id_dokumen=" + $( '#no_dokumen' ).val();
      vars += "&id_unit=" + $( '#unit_prarka' ).val();
      vars += "&id_sub=" + $( '#sub_prarka2' ).val();
      vars += "&kota=" + $( '#nama_kota_lap' ).val();
      vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
      vars += "&uraian_dok=" + $( '#jns_dokumen' ).val();
      vars += "&uraian_header=" + $( '#jns_dokumen option:selected' ).text();
      vars += "&ttd=" + check_data;
      vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
      window.open( '../SinkProvRinc' + vars, '_blank' );
    };

    if ( $( '#jns_laporan' ).val() == 50 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&id_dokumen=" + $( '#no_dokumen' ).val();
      vars += "&id_program=" + $( '#prog_prarka' ).val();
      window.open( '../PrintMatrikSasProgRenjaFinal' + vars, '_blank' );
      // window.open('../PrintMatrikSasProgRenjaFinal/'+$('#prog_prarka').val()+'/'+$('#tahun_prarka').val()); 
    };

  } );


} );