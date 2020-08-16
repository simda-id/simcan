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

    var hariIni = yyyy + '-' + mm + '-' + dd;
    return hariIni;
  }

  $( '#tgl_laporan_x' ).val( formatTgl( hariIni() ) );

  $( '#tgl_laporan_x' ).datepicker( {
    altField: "#tgl_laporan",
    altFormat: "yy-mm-dd",
    dateFormat: "dd MM yy",
  } );

  $.ajax( {
    type: "GET",
    url: '../parameter90/getUrusanList',
    dataType: "json",
    success: function ( data ) {
      var j = data.length;
      var post, i;

      $( 'select[name="urusan_prarka"]' ).empty();
      $( 'select[name="urusan_prarka"]' ).append( '<option value="-1">---Pilih Urusan---</option>' );

      for ( i = 0; i < j; i++ ) {
        post = data[ i ];
        $( 'select[name="urusan_prarka"]' ).append( '<option value="' + post.kd_urusan + '">' + post.urusan_display + '</option>' );

      }
    }
  } );

  $.ajax( {
    type: "GET",
    url: './jns_ppas',
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
    url: '../parameter90/getUnitUser',
    dataType: "json",
    success: function ( data ) {
      var j = data.length;
      var post, i;

      $( 'select[name="unit_prarka"]' ).empty();
      $( 'select[name="unit_prarka"]' ).append( '<option value="-1">---Pilih Unit Permendagri 90---</option>' );

      for ( i = 0; i < j; i++ ) {
        post = data[ i ];
        $( 'select[name="unit_prarka"]' ).append( '<option value="' + post.id_unit_90 + '">' + post.nm_unit + '</option>' );
      }
    }
  } );

  $( ".tahun_prarka" ).change( function () {
    $.ajax( {
      type: "GET",
      url: './getDokKeuangan?tahun=' + $( '#tahun_prarka' ).val(),
      dataType: "json",
      success: function ( data ) {
        var j = data.length;
        var post, i;

        $( 'select[name="no_dokumen"]' ).empty();
        $( 'select[name="no_dokumen"]' ).append( '<option value="-1">---Pilih  Dokumen PPAS---</option>' );

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
      url: '../parameter90/getBidangList/' + $( '#urusan_prarka' ).val(),
      dataType: "json",
      success: function ( data ) {
        var j = data.length;
        var post, i;

        $( 'select[name="bidang_prarka"]' ).empty();
        $( 'select[name="bidang_prarka"]' ).append( '<option value="-1">---Pilih Bidang Permendagri 90---</option>' );

        for ( i = 0; i < j; i++ ) {
          post = data[ i ];
          $( 'select[name="bidang_prarka"]' ).append( '<option value="' + post.id_bidang + '">' + post.bidang_display + '</option>' );
        }
      }
    } );
  } );

  $( "#bidang_prarka" ).change( function () {
    $.ajax( {
      type: "GET",
      url: '../parameter90/getProgramList?id_bidang=' + $( '#bidang_prarka' ).val(),
      dataType: "json",
      success: function ( data ) {
        var j = data.length;
        var post, i;
        $( 'select[name="prog_prarka"]' ).empty();
        $( 'select[name="prog_prarka"]' ).append( '<option value="-1">---Pilih Program Permendagri 90---</option>' );
        for ( i = 0; i < j; i++ ) {
          post = data[ i ];
          $( 'select[name="prog_prarka"]' ).append( '<option value="' + post.id_program + '">' + post.uraian_display + '</option>' );
        }
      }
    } );
  } );

  $( ".unit_prarka" ).change( function () {
    $.ajax( {
      type: "GET",
      url: '../parameter90/getSubUnitUser?id_unit=' + $( '#unit_prarka' ).val(),
      dataType: "json",
      success: function ( data ) {
        var j = data.length;
        var post, i;
        $( 'select[name="sub_prarka2"]' ).empty();
        $( 'select[name="sub_prarka2"]' ).append( '<option value="-1">---Pilih Sub Unit Permendagri 90---</option>' );
        for ( i = 0; i < j; i++ ) {
          post = data[ i ];
          $( 'select[name="sub_prarka2"]' ).append( '<option value="' + post.id_sub_unit_90 + '">' + post.nm_sub + '</option>' );
        }
      }
    } );
  } );

  $( ".prog_prarka" ).change( function () {
    $.ajax( {
      type: "GET",
      url: '../parameter90/getKegiatanList?id_program=' + $( '#prog_prarka' ).val(),
      dataType: "json",
      success: function ( data ) {
        var j = data.length;
        var post, i;
        $( 'select[name="keg_prarka"]' ).empty();
        $( 'select[name="keg_prarka"]' ).append( '<option value="-1">---Pilih Kegiatan Permendagri 90---</option>' );
        for ( i = 0; i < j; i++ ) {
          post = data[ i ];
          $( 'select[name="keg_prarka"]' ).append( '<option value="' + post.id_kegiatan + '">' + post.uraian_display + '</option>' );
        }
      }
    } );
  } );

  $( ".keg_prarka" ).change( function () {
    $.ajax( {
      type: "GET",
      url: '../parameter90/getSubKegiatanList?id_kegiatan=' + $( '#keg_prarka' ).val(),
      dataType: "json",
      success: function ( data ) {
        var j = data.length;
        var post, i;
        $( 'select[name="subkeg_prarka"]' ).empty();
        $( 'select[name="subkeg_prarka"]' ).append( '<option value="-1">---Pilih Sub Kegiatan Permendagri 90---</option>' );
        for ( i = 0; i < j; i++ ) {
          post = data[ i ];
          $( 'select[name="subkeg_prarka"]' ).append( '<option value="' + post.id_sub_kegiatan + '">' + post.uraian_display + '</option>' );
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
      vars += "&id_dokumen=" + $( '#no_dokumen' ).val();
      vars += "&id_unit=" + $( '#unit_prarka' ).val();
      vars += "&id_sub=" + $( '#sub_prarka2' ).val();
      vars += "&id_program=" + $( '#prog_prarka' ).val();
      vars += "&id_kegiatan=" + $( '#keg_prarka' ).val();
      vars += "&id_subkegiatan=" + $( '#subkeg_prarka' ).val();
      vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
      vars += "&kota=" + $( '#nama_kota_lap' ).val();
      vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
      vars += "&uraian_dok=PPAS";
      vars += "&uraian_header=PPAS"
      window.open( './90PPAS21' + vars, '_blank' );
    };

    if ( $( '#jns_laporan' ).val() == 2 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&id_dokumen=" + $( '#no_dokumen' ).val();
      vars += "&id_unit=" + $( '#unit_prarka' ).val();
      vars += "&id_sub=" + $( '#sub_prarka2' ).val();
      vars += "&id_program=" + $( '#prog_prarka' ).val();
      vars += "&id_kegiatan=" + $( '#keg_prarka' ).val();
      vars += "&id_subkegiatan=" + $( '#subkeg_prarka' ).val();
      vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
      vars += "&kota=" + $( '#nama_kota_lap' ).val();
      vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
      vars += "&uraian_dok=PPAS";
      vars += "&uraian_header=PPAS"
      window.open( './90PPAS41' + vars, '_blank' );
    };

    if ( $( '#jns_laporan' ).val() == 3 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&id_dokumen=" + $( '#no_dokumen' ).val();
      vars += "&id_unit=" + $( '#unit_prarka' ).val();
      vars += "&id_sub=" + $( '#sub_prarka2' ).val();
      vars += "&id_program=" + $( '#prog_prarka' ).val();
      vars += "&id_kegiatan=" + $( '#keg_prarka' ).val();
      vars += "&id_subkegiatan=" + $( '#subkeg_prarka' ).val();
      vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
      vars += "&kota=" + $( '#nama_kota_lap' ).val();
      vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
      vars += "&uraian_dok=PPAS";
      vars += "&uraian_header=PPAS"
      window.open( './90PPAS42' + vars, '_blank' );
    };

    if ( $( '#jns_laporan' ).val() == 4 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&id_dokumen=" + $( '#no_dokumen' ).val();
      vars += "&id_unit=" + $( '#unit_prarka' ).val();
      vars += "&id_sub=" + $( '#sub_prarka2' ).val();
      vars += "&id_program=" + $( '#prog_prarka' ).val();
      vars += "&id_kegiatan=" + $( '#keg_prarka' ).val();
      vars += "&id_subkegiatan=" + $( '#subkeg_prarka' ).val();
      vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
      vars += "&kota=" + $( '#nama_kota_lap' ).val();
      vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
      vars += "&uraian_dok=PPAS";
      vars += "&uraian_header=PPAS"
      window.open( './90PPAS51' + vars, '_blank' );
    };

    if ( $( '#jns_laporan' ).val() == 18 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&id_dokumen=" + $( '#no_dokumen' ).val();
      vars += "&id_unit=" + $( '#unit_prarka' ).val();
      vars += "&id_sub=" + $( '#sub_prarka2' ).val();
      vars += "&id_program=" + $( '#prog_prarka' ).val();
      vars += "&id_kegiatan=" + $( '#keg_prarka' ).val();
      vars += "&id_subkegiatan=" + $( '#subkeg_prarka' ).val();
      vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
      vars += "&kota=" + $( '#nama_kota_lap' ).val();
      vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
      vars += "&uraian_dok=PPAS";
      vars += "&uraian_header=PPAS";
      window.open( './90Rka1' + vars, '_blank' );
    };

    if ( $( '#jns_laporan' ).val() == 19 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&id_dokumen=" + $( '#no_dokumen' ).val();
      vars += "&id_unit=" + $( '#unit_prarka' ).val();
      vars += "&id_sub=" + $( '#sub_prarka2' ).val();
      vars += "&id_program=" + $( '#prog_prarka' ).val();
      vars += "&id_kegiatan=" + $( '#keg_prarka' ).val();
      vars += "&id_subkegiatan=" + $( '#subkeg_prarka' ).val();
      vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
      vars += "&kota=" + $( '#nama_kota_lap' ).val();
      vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
      vars += "&uraian_dok=PPAS";
      vars += "&uraian_header=PPAS";
      window.open( './90Rka10' + vars, '_blank' );
    };

    if ( $( '#jns_laporan' ).val() == 20 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&id_dokumen=" + $( '#no_dokumen' ).val();
      vars += "&id_unit=" + $( '#unit_prarka' ).val();
      vars += "&id_sub=" + $( '#sub_prarka2' ).val();
      vars += "&id_program=" + $( '#prog_prarka' ).val();
      vars += "&id_kegiatan=" + $( '#keg_prarka' ).val();
      vars += "&id_subkegiatan=" + $( '#subkeg_prarka' ).val();
      vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
      vars += "&kota=" + $( '#nama_kota_lap' ).val();
      vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
      vars += "&uraian_dok=PPAS";
      vars += "&uraian_header=PPAS";
      window.open( './90Rka22' + vars, '_blank' );
    };

    if ( $( '#jns_laporan' ).val() == 21 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&id_dokumen=" + $( '#no_dokumen' ).val();
      vars += "&id_unit=" + $( '#unit_prarka' ).val();
      vars += "&id_sub=" + $( '#sub_prarka2' ).val();
      vars += "&id_program=" + $( '#prog_prarka' ).val();
      vars += "&id_kegiatan=" + $( '#keg_prarka' ).val();
      vars += "&id_subkegiatan=" + $( '#subkeg_prarka' ).val();
      vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
      vars += "&kota=" + $( '#nama_kota_lap' ).val();
      vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
      vars += "&uraian_dok=PPAS";
      vars += "&uraian_header=PPAS";
      window.open( './90Rka221' + vars, '_blank' );
    };

    if ( $( '#jns_laporan' ).val() == 22 ) {
      vars = "?token=" + $( 'input[name=_token]' ).val();
      vars += "&tahun=" + $( '#tahun_prarka' ).val();
      vars += "&id_dokumen=" + $( '#no_dokumen' ).val();
      vars += "&id_unit=" + $( '#unit_prarka' ).val();
      vars += "&id_sub=" + $( '#sub_prarka2' ).val();
      vars += "&id_program=" + $( '#prog_prarka' ).val();
      vars += "&id_kegiatan=" + $( '#keg_prarka' ).val();
      vars += "&id_subkegiatan=" + $( '#subkeg_prarka' ).val();
      vars += "&hal_mulai=" + $( '#hal_mulai' ).val();
      vars += "&kota=" + $( '#nama_kota_lap' ).val();
      vars += "&tanggal=" + $( '#tgl_laporan_x' ).val();
      vars += "&uraian_dok=PPAS";
      vars += "&uraian_header=PPAS";
      window.open( './90Rka30' + vars, '_blank' );
    };

  } );


} );//End File


