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
    url: './jenis_APBD_geser',
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

  $( ".id_perubahan" ).change( function () {
    $.ajax( {
      type: "GET",
      url: './getDokGeserAPBD?id_perubahan=' + $( '#id_perubahan' ).val() + '&jns_dok=' + $( '#jns_dokumen' ).val(),
      dataType: "json",
      success: function ( data ) {
        var j = data.length;
        var post, i;

        $( 'select[name="no_dokumen"]' ).empty();
        $( 'select[name="no_dokumen"]' ).append( '<option value="-1">---Pilih Dokumen Pergeseran APBD---</option>' );

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
      url: 'getProgramGeserAPBD?id_unit=' + $( '#unit_prarka' ).val() + '&tahun=' + $( '#tahun_prarka' ).val() + '&id_perubahan=' + $( '#id_perubahan' ).val() + '&id_dokumen=' + $( '#no_dokumen' ).val(),
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
      url: 'getKegiatanGeserAPBD?program=' + $( '#prog_prarka' ).val(),
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

    switch ( $( '#jns_laporan' ).val() ) {
      case "6":
        window.open( '../Lamp1Geser' + vars, '_blank' );
        break;
      case "12":
        window.open( '../LampJabar1Geser' + vars, '_blank' );
        break;
      case "13":
        window.open( '../LampJabar2Geser' + vars, '_blank' );
        break;
      case "14":
        window.open( '../LampJabar2aGeser' + vars, '_blank' );
        break;
      case "16":
        window.open( '../LampSumberDana' + vars, '_blank' );
        break;
      case "17":
        window.open( '../RekapSumberDana' + vars, '_blank' );
        break;
      case "18":
        window.open( '../LampSumberDana1' + vars, '_blank' );
        break;
      case "20":
        window.open( '../LampRKAPPKDHeader' + vars, '_blank' );
        break;
      case "21":
        window.open( '../LampRKAPPKDRekapUbah' + vars, '_blank' );
        break;
      case "22":
        window.open( '../LampRKAPPKD1Ubah' + vars, '_blank' );
        break;
      case "23":
        window.open( '../LampRKAPPKD21Ubah' + vars, '_blank' );
        break;
      case "24":
        window.open( '../LampRKAPPKD31Ubah' + vars, '_blank' );
        break;
      case "25":
        window.open( '../LampRKAPPKD32Ubah' + vars, '_blank' );
        break;
      case "30":
        window.open( '../LampRKAHeader' + vars, '_blank' );
        break;
      case "31":
        window.open( '../LampRKARekapUbah' + vars, '_blank' );
        break;
      case "32":
        window.open( '../LampRKA1Ubah' + vars, '_blank' );
        break;
      case "33":
        window.open( '../LampRKA21Ubah' + vars, '_blank' );
        break;
      case "34":
        window.open( '../LampRKA22Ubah' + vars, '_blank' );
        break;
      case "15":
        window.open( '../LampRKA221Geser' + vars, '_blank' );
        break;
      case "35":
        window.open( '../LampRKA31Ubah' + vars, '_blank' );
        break;
      case "36":
        window.open( '../LampRKA32Ubah' + vars, '_blank' );
        break;
      case "40":
        window.open( '../RekapPerUnit' + vars, '_blank' );
        break;
      case "41":
        window.open( '../RekapPerPK' + vars, '_blank' );
        break;
      case "42":
        window.open( '../CompareRincianBelanja' + vars, '_blank' );
        break;
      case "43":
        window.open( '../SinkNas' + vars, '_blank' );
        break;
      case "44":
        window.open( '../SinkNasRinc' + vars, '_blank' );
        break;
      case "45":
        window.open( '../SinkProv' + vars, '_blank' );
        break;
      case "46":
        window.open( '../SinkProvRinc' + vars, '_blank' );
        break;
      case "47":
        window.open( '../SandingProgram' + vars, '_blank' );
        break;
      case "50":
        window.open( '../LKRKA221Geser' + vars, '_blank' );
        break;
      case "51":
        window.open( '../Lamp2Ubah' + vars, '_blank' );
        break;
      case "52":
        window.open( '../Lamp2AUbah' + vars, '_blank' );
        break;
      case "53":
        window.open( '../Lamp2BUbah' + vars, '_blank' );
        break;
      case "54":
        window.open( '../Lamp3Ubah' + vars, '_blank' );
        break;
      case "57":
        window.open( '../Lamp4AllUbah' + vars, '_blank' );
        break;
      case "58":
        window.open( '../Lamp4Ubah' + vars, '_blank' );
        break;
      case "59":
        window.open( '../Lamp4SubUbah' + vars, '_blank' );
        break;
      case "60":
        window.open( '../Lamp5Ubah' + vars, '_blank' );
        break;
      case "12a":
        if ( $( '#unit_prarka' ).val() > 0 ) {
          window.open( '../LampJabar1aGeser' + vars, '_blank' );
        } else {
          window.open( '../LampJabar1aGeserAll' + vars, '_blank' );
        }
        break;
    }
  } ); // end function

} ); // end file