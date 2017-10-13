<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app0')
{{-- <meta name="_token" content="{!! csrf_token() !!}" /> --}}

@section('content')
  <div class="container row col-sm-12">
        <div class="row">
        <div class="col-md-12">
            <?php
                $this->title = 'Zona SSH';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = 'modul0';
                $breadcrumb->begin();
                $breadcrumb->add(['label' => 'SSH']);
                $breadcrumb->add(['label' => $this->title]);
                $breadcrumb->end();
            ?>          
        </div>
        </div>
        <div id="pesan"></div>
        <div class="row">
            <div class="col-md-12">

        <div class="panel panel-default">
          <div class="panel-heading">
            <p class=""><h2 class="panel-title">Zona Pemberlakuan SSH  
              <sup><a href="#" data-toggle="popover" data-container="body" title="Zona SSH" data-trigger="hover" data-content="Untuk mengakomodir perbedaan harga antar lokasi. Misal: harga semen di kota dengan pegunungan berbeda"><i class="glyphicon glyphicon-question-sign"></i></a></sup></h2>
            </p>
          </div>

          <div class="panel-body">
            <div class="add">
              <p><a type="button" class="add-modal btn btn-labeled btn-success">
                        <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>Tambah</a></p>
            </div>
            <br>

            <table id="tblzona" class="table display table-striped table-bordered table-responsive" width="100%">
                  <thead>
                      <tr>
                          <th width="10%" style="text-align: center; vertical-align:middle">No Urut</th>
                          <th witdh="25%" style="text-align: center; vertical-align:middle">Nama Zona SSH</th>
                          <th style="text-align: center; vertical-align:middle">Deskripsi Zona SSH</th>
                          <th width="80px" style="text-align: center; vertical-align:middle">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>

                  </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>


<!--Modal Tambah -->

<div id="ModalZona" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg"  >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" autocomplete='off' action="{{ route('TambahZona') }}" method="post" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" id="id_zona" name="id_zona">
            <div class="form-group">
              <label for="keterangan_zona" class="col-sm-3 control-label" align='left'>Nama Zona SSH :</label>
              <div class="col-sm-8">
                <div class="input-group">
                <textarea type="text" class="form-control" rows="2" id="ket_zona" name="ket_zona" required="required" ></textarea>
                <span class="input-group-addon">
                    <a href="#" data-toggle="popover" data-container="body" title="Zona SSH" data-trigger="hover" data-content="Diisi dengan nama akan dibaca di sepanjang aplikasi"><i class="glyphicon glyphicon-question-sign"></i></a>
                </span>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="diskripsi_zona" class="col-sm-3 control-label" align='left'>Deskripsi Zona SSH :</label>
              <div class="col-sm-8">
                <div class="input-group">
                <textarea type="text" class="form-control" rows="5" id="diskripsi_zona" name="diskripsi_zona" required="required" ></textarea>
                <span class="input-group-addon">
                    <a href="#" data-toggle="popover" data-container="body" title="Zona SSH" data-trigger="hover" data-content="Diisi dengan penjelasan cakupan zona yang dimaksud: lokasi, jarak, dsb"><i class="glyphicon glyphicon-question-sign"></i></a>
                </span>
                </div>
              </div>
            </div>
        </form>
        <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusBelanja">
                        {{-- <button type="button" class="btn btn-sm btn-danger btnHapusBelanja btn-labeled">
                            <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>Hapus</button> --}}
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-success btnAddZona btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i id="nmAddZona" class="glyphicon glyphicon-save"></i></span>Simpan</button>
                        <div class="or"></div>
                        <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
      </div>
    </div>
  </div>
</div>

  <!--Modal Hapus -->
<div id="HapusModal" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
            <div class=" alert alert-danger deleteContent">
                Yakin akan menghapus <strong><span class="title"></span></strong> ?
            <span class="hidden id_zona"></span>
          </div>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusBelanja">
                        {{-- <button type="button" class="btn btn-sm btn-danger btnHapusBelanja btn-labeled">
                            <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>Hapus</button> --}}
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-danger actionBtn btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i id="footer_action_button" class="glyphicon glyphicon-save"></i></span>Hapus</button>
                        <div class="or"></div>
                        <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
        </div>
      </div>
    </div>
  </div>


@endsection

@section('scripts')
<script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {

  $('[data-toggle="popover"]').popover();

  var tzona = $('#tblzona').DataTable( {
        processing: true,
        serverSide: true,
        "ajax": "{{url('/zonassh/getdata')}}",
        "columns": [
              { data: 'no_urut'},
              { data: 'keterangan_zona'},
              { data: 'diskripsi_zona'},
              { data: 'action', 'searchable': false, 'orderable':false }
            ]
      } );

  $('#tblzona tbody').on('dblclick', 'tr', function () {
      
    var data = tzona.row( this ).data();

    // $('#nmAddZona').text("Update");
    // $('#nmAddZona').addClass('glyphicon-save');
    // $('.btnAddZona').addClass('btn-success'); 
    $('.btnAddZona').removeClass('addZona');
    $('.btnAddZona').addClass('editZona');
    $('.modal-title').text('Edit Data Zona SSH');
    $('.form-horizontal').show();
    $('#id_zona').val(data.id_zona);
    $('#ket_zona').val(data.keterangan_zona);
    $('#diskripsi_zona').val(data.diskripsi_zona);
    $('#ModalZona').modal('show');
                  

    } );  

$(document).on('click', '.add-modal', function() {
  // $('#nmAddZona').text("Simpan");
  // $('#nmAddZona').addClass('glyphicon-save');
  // $('.btnAddZona').addClass('btn-success');
  $('.btnAddZona').removeClass('editZona');
  $('.btnAddZona').addClass('addZona');
  $('.modal-title').text('Tambah Data Zona SSH');
  $('.form-horizontal').show();
  $('#id_zona').val(null);
  $('#ket_zona').val(null);
  $('#diskripsi_zona').val(null);
  $('#ModalZona').modal('show');
});

//edit function
$(document).on('click', '.edit-modal', function() {
  // $('#nmAddZona').text(" Update");
  // $('#nmAddZona').addClass('glyphicon-save');
  // $('.btnAddZona').addClass('btn-success'); 
  $('.btnAddZona').removeClass('addZona');
  $('.btnAddZona').addClass('editZona');
  $('.modal-title').text('Edit Data Zona SSH');
  $('.form-horizontal').show();
  $('#id_zona').val($(this).data('id_zona'));
  $('#ket_zona').val($(this).data('keterangan_zona'));
  $('#diskripsi_zona').val($(this).data('diskripsi_zona'));
  $('#ModalZona').modal('show');
});

//delete function
$(document).on('click', '.delete-modal', function() {
  // $('#footer_action_button').removeClass('glyphicon-check');
  // $('#footer_action_button').addClass('glyphicon-trash');
  // $('.actionBtn').removeClass('btn-success');
  // $('.actionBtn').addClass('btn-danger');
  $('.actionBtn').addClass('deleteZona');
  $('.modal-title').text('Hapus Data');
  $('.id_zona').text($(this).data('id_zona'));
  // $('.deleteContent').show();
  $('.form-horizontal').hide();
  $('.title').html($(this).data('keterangan_zona'));
  $('#HapusModal').modal('show');
});

$('.modal-footer').on('click', '.addZona', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './zonassh/tambah',
        data: {
            '_token': $('input[name=_token]').val(),
            'ket_zona': $('#ket_zona').val(),
            'diskripsi_zona': $('#diskripsi_zona').val()
        },
        success: function(data) {
                $('#tblzona').DataTable().ajax.reload();
                if(data.status_pesan==1){
              $('#pesan').html('<div class="alert alert-success col-md-12"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+data.pesan+'</div>');
              } else {
              $('#pesan').html('<div class="alert alert-danger col-md-12"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+data.pesan+'</div>');  
              } 
        },
    });

    $('#tblzona').DataTable().ajax.reload();
});

$('.modal-footer').on('click', '.editZona', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './zonassh/update',
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $("#id_zona").val(),
            'ket_zona': $('#ket_zona').val(),
            'diskripsi_zona': $('#diskripsi_zona').val()
        },
        success: function(data) {
            $('#tblzona').DataTable().ajax.reload();
            if(data.status_pesan==1){
              $('#pesan').html('<div class="alert alert-success col-md-12"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+data.pesan+'</div>');
              } else {
              $('#pesan').html('<div class="alert alert-danger col-md-12"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+data.pesan+'</div>');  
              } 
        }
    });


});

$('.modal-footer').on('click', '.deleteZona', function() {
  $.ajaxSetup({
     headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });

  $.ajax({
    type: 'post',
    url: './zonassh/delete',
    data: {
      '_token': $('input[name=_token]').val(),
      'id_zona': $('.id_zona').text()
    },
    success: function(data) {
      $('.item' + $('.id_zona').text()).remove();
      $('#tblzona').DataTable().ajax.reload();
      $('#pesan').html('<div class="alert alert-danger col-md-12"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+data.pesan+'</div>');
    }
  });

  });
});
</script>
@endsection
