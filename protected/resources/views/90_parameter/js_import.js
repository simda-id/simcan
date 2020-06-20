
$( document ).ready( function () {

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

  $( '#prosesbar' ).hide();
  $( '[data-toggle="popover"]' ).popover();
  $( '.number' ).number( true, 0, ',', '.' );


  $( '.page-alert .close' ).click( function ( e ) {
    e.preventDefault();
    $( this ).closest( '.page-alert' ).slideUp();
  } );

  $.ajax( {
    type: "GET",
    url: './import/rekapRef',
    dataType: "json",
    success: function ( data ) {
      var j = data.length;
      var post, i;
      for ( i = 0; i < j; i++ ) {
        post = data[ i ];
        $( '#jml_urusan' ).val( post.jml_urusan );
        $( '#jml_bidang' ).val( post.jml_bidang );
        $( '#jml_program' ).val( post.jml_program );
        $( '#jml_kegiatan' ).val( post.jml_kegiatan );
        $( '#jml_sub_kegiatan' ).val( post.jml_sub_kegiatan );
        $( '#jml_unit' ).val( post.jml_unit );
        $( '#jml_sub_unit' ).val( post.jml_sub_unit );
        $( '#jml_fungsi' ).val( post.jml_fungsi );
        $( '#jml_rek_1' ).val( post.jml_rek_1 );
        $( '#jml_rek_2' ).val( post.jml_rek_2 );
        $( '#jml_rek_3' ).val( post.jml_rek_3 );
        $( '#jml_rek_4' ).val( post.jml_rek_4 );
        $( '#jml_rek_5' ).val( post.jml_rek_5 );
        $( '#jml_rek_6' ).val( post.jml_rek_6 );
      }

      $( '#prosesbar' ).hide();
    }
  } );

  $( document ).on( 'click', '.btnProsesKe1', function () {
    // $('#prosesbar').show();
    //   $.ajax({
    //       type: "GET",
    //       url: 'update/BuatTable',
    //       dataType: "json",
    //       success: function(data) {
    //         if(data.status_pesan==1){
    //             createPesan(data.pesan,"success");
    //             } else {
    //             createPesan(data.pesan,"danger"); 
    //         }  
    //         $('#prosesbar').hide();
    //       },
    //       error: function(data) {     
    //         createPesan("AJAX Table Error....!!!","danger");
    //         $('#prosesbar').hide();
    //       }
    //   }); 
  } );



} );