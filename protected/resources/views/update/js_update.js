
$(document).ready(function() {

function createPesan(message, type) {
    var html = '<div id="pesanx" class="alert alert-' + type + ' alert-dismissable flyover flyover-bottom in">';    
    html += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';   
    html += '<p><strong>'+message+'</strong></p>';
    html += '</div>';    
    $(html).hide().prependTo('#pesan').slideDown();

    setTimeout(function() {
        $('#pesanx').removeClass('in');
         }, 3500);
  };

  $('#prosesbar').hide();
  $('[data-toggle="popover"]').popover();
  $('.number').number(true,0,',', '.');


  $('.page-alert .close').click(function(e) {
          e.preventDefault();
          $(this).closest('.page-alert').slideUp();
    });

var tbl_CekDB;
  $(document).on('click', '.btnCekProses', function() {    
    $('#prosesbar').show();
      $.ajax({
          type: "GET",
          url: 'update/getJmlTable',
          dataType: "json",
          success: function(data) {
              var j = data.length;
              var post, i;
              for (i = 0; i < j; i++) {
                  post = data[i];
                  $('#jml_table1').val(post.jml_table1);
                  $('#jml_table0').val(post.jml_table0);
                  $('#jml_kolom1').val(post.jml_kolom1);
                  $('#jml_kolom0').val(post.jml_kolom0);
                  $('#jml_trigger1').val(post.jml_trigger1);
                  $('#jml_trigger0').val(post.jml_trigger0);
                  $('#jml_prosedur1').val(post.jml_prosedur1);
                  $('#jml_prosedur0').val(post.jml_prosedur0);
                  $('#column_modif').val(post.column_modif);
              }
    
            $('#prosesbar').hide();
          }
      }); 
  });

  $(document).on('click', '.btnProsesKe1', function() {    
    $('#prosesbar').show();
      $.ajax({
          type: "GET",
          url: 'update/BuatTable',
          dataType: "json",
          success: function(data) {
            if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
            }  
            $('#prosesbar').hide();
          },
          error: function(data) {     
            createPesan("AJAX Table Error....!!!","danger");
            $('#prosesbar').hide();
          }
      }); 
  });

  $(document).on('click', '.btnProsesKe2', function() {    
    $('#prosesbar').show();
      $.ajax({
          type: "GET",
          url: 'update/BuatKolom',
          dataType: "json",
          success: function(data) {  
            if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
            }
            $('#prosesbar').hide();
          },
          error: function(data) {     
            createPesan("AJAX Field Error....!!!","danger");
            $('#prosesbar').hide();
          }
      }); 
  });

  $(document).on('click', '.btnProsesKe3', function() {    
    $('#prosesbar').show();
      $.ajax({
          type: "GET",
          url: 'update/BuatTrigger',
          dataType: "json",
          success: function(data) { 
            $.ajax({
                type: "GET",
                url: 'update/BuatFungsi',
                dataType: "json",
                success: function(data) {  
                    $.ajax({
                        type: "GET",
                        url: 'update/UpdateAtribut',
                        dataType: "json",
                        success: function(data) { 
                            $.ajax({
                                type: "GET",
                                url: 'update/TambahAtributUnik',
                                dataType: "json",
                                success: function(data) { 
                                    $.ajax({
                                        type: "GET",
                                        url: 'update/UpdateAtributUnik',
                                        dataType: "json",
                                        success: function(data) { 
                                            if(data.status_pesan==1){
                                                createPesan(data.pesan,"success");
                                                } else {
                                                createPesan(data.pesan,"danger"); 
                                            }
                                            $('#prosesbar').hide();
                                        },
                                        error: function(data) {
                                            createPesan("AJAX Update Atribute Key Unik Error....!!!","danger"); 
                                            $('#prosesbar').hide();
                                        }
                                    })
                                },
                                error: function(data) {
                                    createPesan("AJAX Tambah Atribute Key Unik Error....!!!","danger"); 
                                    $('#prosesbar').hide();
                                }
                            })
                        },
                        error: function(data) {
                            createPesan("AJAX Atribute Error....!!!","danger"); 
                            $('#prosesbar').hide();
                        }
                    })
                },
                error: function(data) {     
                    createPesan("AJAX Fungsi/Prosedur Error....!!!","danger");
                    $('#prosesbar').hide();
                }
            }) 
          },
          error: function(data) {  
            createPesan("AJAX Trigger Error....!!!","danger");
            $('#prosesbar').hide();
          }
      }); 
  });

  $(document).on('click', '.btnProsesKe4', function() {    
    $('#prosesbar').show();
      $.ajax({
          type: "GET",
          url: 'update/BuatForeignKey',
          dataType: "json",
          success: function(data) {  
            if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
            }
            $('#prosesbar').hide();
          },
          error: function(data) {     
            createPesan("AJAX Foreign Key Error....!!!","danger");
            $('#prosesbar').hide();
          }
      }); 
  });

//   $(document).on('click', '.btnProsesKe5', function() {
//         vars = "?token="     + $('input[name=_token]').val();
//         vars += "&KodeMinta=1"     ;
//         $('#prosesbar').show();
//       $.ajax({
//           type: "GET",
//           url: 'update/TestApiSimda' + vars,
//           dataType: "json",
//           success: function(data) {     
//             $('#prosesbar').hide(); 
//             console.log(data);
//           }
//       }); 
//   });

  $(document).on('click', '.btnProsesKe5', function() {
    $('#prosesbar').show();
      $.ajax({
          type: "GET",
          url: 'update/UpdateEnter',
          dataType: "json",
          success: function(data) {
            if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
            } 
            $('#prosesbar').hide();
          },
          error: function(data) { 
            // createPesan("AJAX Finalisasi Error....!!!","danger");  
            createPesan(data.pesan,"danger");   
            $('#prosesbar').hide();
          }
    }); 

  });

  $(document).on('click', '.btnNormalisasi', function() {    
    $('#prosesbar').show();
      $.ajax({
          type: "GET",
          url: 'update/UpdateAtribut',
          dataType: "json",
          success: function(data) {  
            if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
            }  
            $('#prosesbar').hide();
          }
      }); 

  });

});