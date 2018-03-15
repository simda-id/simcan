<?php
use \hoaaah\LaravelHtmlHelpers\Html;
?>
@extends('layouts.parameterlayout')

@section('content')
<div class="container-fluid col-sm-12 col-md-12 col-lg-12">	
    <!-- /.panel -->   
    <div id="pesan" class="panel">
    @if (Session::has('pesan')) 
        <div class="alert alert-info"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times-circle-o fa-fw fa-lg text-danger"></i></button>
            <h4>{{Session::get('pesan')}}</h4>
        </div>
    @endif
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <i class="fa fa-clock-o fa-fw"></i> Update Database :
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
                <form action="{{ url('admin/update/updateDB') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <label for="txt_periode" class="col-sm-2" align='left'>File Update Database :</label>
                        <label class="btn btn-default col-sm-8">
                        <input required="" type="file" name="updatedb" id="inputupdate" class="validate inputupdate" accept=".simcan" placeholder="Pilih File Update *.simcan" >
                            {{-- style="position: absolute; top: -9999999; filter: alpha(opacity=0); opacity: 0; width:0; 
                            height:0; outline: none; cursor: inherit" --}}
                        </label>
                        <label  id='label_file'></label>
                    </div>

                    <br>
                <div class="row">
                    <div class="col-sm-2 text-left"></div>
                    <div class="col-sm-10 text-left">
                        <button type="submit" class="btn btn-warning btn-labeled btnProses" id='proses'>
                                <span class="btn-label"><i class="fa fa-cogs fa-fw fa-lg"></i></span>Proses Update DB</button>
                    </div>
                </div>
                </form>
                <hr>
                <div class="panel panel-danger">
                    <div class="panel-heading">
                      <h3 class="panel-title">Catatan Update :</h3>
                  </div>
                    <div class="panel-body">
                        <label>1. Update ini dilakukan untuk update database dengan catatan database yang digunakan adalah database sesuai update terakhir, jika belum lakukan update di luar system ini</label><br>
                        <label>2. Update ini hanya dilakukan sekali saja..</label><br>
                        <label>3. Jangan Lupa Backup Database sebelum update...</label><br>
                  </div>                
                </div>                
        </div>
    </div>
</div>
@endsection
 
@section('scripts')
<script type="text/javascript" language="javascript" class="init">
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

  $('[data-toggle="popover"]').popover();
  $('.number').number(true,0,',', '.');


  $('.page-alert .close').click(function(e) {
          e.preventDefault();
          $(this).closest('.page-alert').slideUp();
      });

// $.ajax({
//           type: "GET",
//           url: 'update/getApp',
//           dataType: "json",
//           success: function(data) {

//           console.log(data)  
              
//           }
//       });

$(document).on('click', '#proses', function() {

    // var fileName = document.getElementById("inputupdate").files;

    // $.ajax({
    //           type: "POST",
    //           url: 'update/updateDB',
    //           data: {
    //             '_token': $('input[name=_token]').val(),
    //             'nama_file' :fileName[0].name,
    //             },
    //           success: function(data) {
    //             console.log(data);
    //             if(data.status_pesan==1){
    //             createPesan(data.pesan,"success");
    //             } else {
    //             createPesan(data.pesan,"danger"); 
    //           }
    //           }
    //       });
});

$(".inputupdate").change(function () {
        // var fileName = document.getElementById("inputupdate").files;
        // $('.label_file').text(fileName[0].name);
        // alert('test');
});


 $("body").on("click",".btnProses",function(e){
    complete: function(response) 
    {
        if($.isEmptyObject(response.responseJSON.error)){
            // if(data.status_pesan==1){
            //     createPesan(data.pesan,"success");
            //     } else {
            //     createPesan(data.pesan,"danger"); 
            //   }
            @if (session('pesan'))
                createPesan({{Session::get('pesan')}});
            @endif
        }else{
            printErrorMsg(response.responseJSON.error);
        }
    }
  });

  var options = { 
    complete: function(response) 
    {
        if($.isEmptyObject(response.responseJSON.error)){
            // if(data.status_pesan==1){
            //     createPesan(data.pesan,"success");
            //     } else {
            //     createPesan(data.pesan,"danger"); 
            //   }
            @if (session('pesan'))
                createPesan({{Session::get('pesan')}});
            @endif
        }else{
            printErrorMsg(response.responseJSON.error);
        }
    }
  };

  function printErrorMsg (msg) {
    $(".print-error-msg").find("ul").html('');
    $(".print-error-msg").css('display','block');
    $.each( msg, function( key, value ) {
        $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
    });
  }




});
</script>
@endsection