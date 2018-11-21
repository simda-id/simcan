<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.parameterlayout')
{{-- <meta name="_token" content="{!! csrf_token() !!}" /> --}}

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?php
                $this->title = ' Parameter Satuan ';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = 'admin/parameter';
                $breadcrumb->begin();
                $breadcrumb->add(['label' => $this->title]);
                $breadcrumb->end();
            ?>          
        </div>
    </div>
    <div id="pesan"></div>
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-info">
          <div class="panel-heading">
            <h2 class="panel-title">Referensi Daftar Satuan</h2>
          </div>

          <div class="panel-body">
            <div class="add">
              <p><a class="add-satuan btn-labeled btn btn-sm btn-success"><span class="btn-label"><i class="fa fa-plus fa-lg fa-fw"></i></span> Tambah Satuan</a></p>
            </div>
            <br>
            <table id="tblsatuan" class="table display compact table-striped table-bordered table-responsive" width="100%">
                  <thead>
                      <tr>
                          <th width="5%" style="text-align: center; vertical-align:middle">Id Satuan</th>
                          <th style="text-align: center; vertical-align:middle">Uraian Satuan</th>
                          <th width="30%" style="text-align: center; vertical-align:middle">Singkatan Satuan</th>
                          <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
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
<div id="ModalSatuan" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg"  >
    <div class="modal-content">
      <div class="modal-header">
        {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> --}}
        <h4 class="modal-title"></h4>
      </div>

      <div class="modal-body">
        <form class="form-horizontal" role="form" autocomplete='off' action="{{ route('TambahSatuan') }}" method="post" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id_satuan" id="id_satuan">
            <div class="form-group">
              <label for="ur_satuan" class="col-sm-3" align='left'>Uraian Satuan :</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="ur_satuan" name="ur_satuan" required="required" >
              </div>
            </div>
            <div class="form-group">
              <label for="sing_satuan" class="col-sm-3" align='left'>Singkatan Satuan :</label>
              <div class="col-sm-8">
                <input type="text" class="form-control"  id="sing_satuan" name="sing_satuan">
              </div>
            </div>
            <div class="form-group">
              <label for="scope_pemakaian" class="col-sm-6" align='left'>Cakupan Penggunaan Satuan pada :</label>
              <div class="col-sm-offset-1 col-sm-12">
              <div class="row">
                <div class="col-sm-3">
                    <label class="checkbox-inline">
                    <input class="checkScope" type="checkbox" name="checkScope" value="0"> RPJMD</label>
                </div>
                <div class="col-sm-3">
                    <label class="checkbox-inline">
                    <input class="checkScope" type="checkbox" name="checkScope" value="1"> RENSTRA</label>
                </div>
                <div class="col-sm-2">
                    <label class="checkbox-inline">
                    <input class="checkScope" type="checkbox" name="checkScope" value="2"> RKPD</label>
                </div>
                <div class="col-sm-2">
                    <label class="checkbox-inline">
                    <input class="checkScope" type="checkbox" name="checkScope" value="3"> RENJA</label>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                    <label class="checkbox-inline">
                    <input class="checkScope" type="checkbox" name="checkScope" value="4"> Standar Satuan Harga</label>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-3">
                    <label class="checkbox-inline">
                    <input class="checkScope" type="checkbox" name="checkScope" value="5"> Pemicu Biaya ASB</label>
                </div>
                <div class="col-sm-3">
                    <label class="checkbox-inline">
                    <input class="checkScope" type="checkbox" name="checkScope" value="6"> Turunan Pemicu Biaya ASB</label>
                </div>
                <div class="col-sm-3">
                    <label class="checkbox-inline">
                    <input class="checkScope" type="checkbox" name="checkScope" value="7"> Rincian ASB</label>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-3">
                    <label class="checkbox-inline">
                    <input class="checkScope" type="checkbox" name="checkScope" value="8"> Program</label>
                </div>
                <div class="col-sm-3">
                    <label class="checkbox-inline">
                    <input class="checkScope" type="checkbox" name="checkScope" value="9"> Kegiatan</label>
                </div>
              </div> 
            </div>
          </div>
        
        </form>
      </div>
        <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusLokasi">
                        
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-sm btn-success btnSatuan btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i id="nmbtnSatuan" class="glyphicon glyphicon-save"></i></span>Simpan</button>
                        <div class="or"></div>
                        <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
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
          {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <div class="alert alert-danger deleteContent">
                Yakin akan menghapus <strong><span class="title"></span></strong> ?
          <span class="hidden id_satuan_hapus"></span>
          </div>
        </div>
          <div class="modal-footer">
            <div class="ui-group-buttons">
              <button type="button" class="btn btn-sm btn-danger btn-labeled actionBtn" data-dismiss="modal" ><span class="btn-label"><i id="footer_action_button" class="glyphicon glyphicon-trash"></i></span> Hapus</button>
              <div class="or"></div>
              <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true"><span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span> Tutup</button>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('scripts')
<script  type="text/javascript" language="javascript" class="init">

$(document).ready(function() {

$('[data-toggle="popover"]').popover();

function createPesan(message, type) {
    var html = '<div class="alert alert-' + type + ' alert-dismissable page-alert col-md-12">';    
    html += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
    html += message;
    html += '</div>';    
    $(html).hide().prependTo('#pesan').slideDown();
};

$('.page-alert .close').click(function(e) {
        e.preventDefault();
        $(this).closest('.page-alert').slideUp();
    });

$('.number').number(true,0,',', '.');

$('.display').DataTable({
      dom : 'BfRtip',
      autoWidth : false,
      bDestroy: true
  });

var satuan_tbl = $('#tblsatuan').DataTable( {
        processing: true,
        serverSide: true,
        // dom: 'Bfrtip',
        autoWidth : false,
        // "pagingType": "full_numbers",
        "pagingType": "input",
        "ajax": "{{url('./satuan/getdata')}}",
        "columns": [
              { data: 'id_satuan','searchable': false, 'orderable':false, sClass: "dt-center", width :"5%"},
              { data: 'uraian_satuan', sClass: "dt-left"},
              { data: 'singkatan_satuan', sClass: "dt-center", width :"30%"},
              { data: 'action', 'searchable': false, width :"10%", 'orderable':false, sClass: "dt-center"}
            ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
      } );

$(document).on('click', '.add-satuan', function() {
  $('.btnSatuan').addClass('btn-success');
  $('.btnSatuan').removeClass('btn-danger');
  $('.btnSatuan').removeClass('edit');
  $('.btnSatuan').addClass('add');
  $('.modal-title').text('Tambah Data Satuan');
  $('.form-horizontal').show();
  $('#id_satuan').val(null);
  $('#ur_satuan').val(null);
  $('#sing_satuan').val(null);
  $('.checkScope').prop('checked',false);
  $('#ModalSatuan').modal('show');
});

$('.modal-footer').on('click', '.add', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './satuan/tambah',
        data: {
            '_token': $('input[name=_token]').val(),
            'ur_satuan': $('#ur_satuan').val(),
            'sing_satuan': $('#sing_satuan').val(),
            'scope_pemakaian': ambilNilaiScope(),
        },
        success: function(data) {
              $('#tblsatuan').DataTable().ajax.reload(null,false);
              $('#tblsatuan').DataTable().page('last').draw('page');
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
        },
  });
});

//edit function
$(document).on('click', '.edit-modal', function() {
  $('.btnSatuan').addClass('btn-success');
  $('.btnSatuan').removeClass('btn-danger');
  $('.btnSatuan').removeClass('add');
  $('.btnSatuan').addClass('edit');
  $('.modal-title').text('Edit Data Satuan');
  $('.form-horizontal').show();
  $('#id_satuan').val($(this).data('id_satuan'));
  $('#ur_satuan').val($(this).data('uraian_satuan'));
  $('#sing_satuan').val($(this).data('singkatan_satuan'));

  $('.checkScope').prop('checked',false);
  var xyz = $(this).data('scope_pemakaian')+" ";
  for(var x = 0, l = xyz.length; x < l;  x++)
      { var y = xyz.substring(x,x+1);
        $(':checkbox[value="'+y+'"]').prop('checked', 'checked');}

  $('#ModalSatuan').modal('show');
});


$('.modal-footer').on('click', '.edit', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './satuan/edit',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_satuan': $('#id_satuan').val(),
            'ur_satuan': $('#ur_satuan').val(),
            'sing_satuan': $('#sing_satuan').val(),
            'scope_pemakaian': ambilNilaiScope(),
        },
        success: function(data) {
              $('#tblsatuan').DataTable().ajax.reload(null,false);
            if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
        }
    });
});

//delete function
$(document).on('click', '.delete-modal', function() {
  $('#footer_action_button').removeClass('glyphicon-check');
  $('#footer_action_button').addClass('glyphicon-trash');
  $('.actionBtn').removeClass('btn-success');
  $('.actionBtn').addClass('btn-danger');
  $('.actionBtn').addClass('delete');
  $('.modal-title').text('Hapus Data Satuan');
  $('.id_satuan_hapus').text($(this).data('id_satuan'));
  $('.form-horizontal').hide();
  $('.title').html($(this).data('uraian_satuan'));
  $('#HapusModal').modal('show');
});



$('.modal-footer').on('click', '.delete', function() {
  $.ajaxSetup({
     headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });

  $.ajax({
    type: 'post',
    url: './satuan/hapus',
    data: {
      '_token': $('input[name=_token]').val(),
      'id_satuan': $('.id_satuan_hapus').text()
    },
    success: function(data) {
      $('.item' + $('.id_satuan_hapus').text()).remove();
      $('#tblsatuan').DataTable().ajax.reload(null,false);
      createPesan(data.pesan,"success");
    }
  });
});

function ambilNilaiScope() {
    var xCheck = document.querySelectorAll('input[name="checkScope"]:checked');
    var xyz = [];
    for(var x = 0, l = xCheck.length; x < l;  x++)
      { xyz.push(xCheck[x].value); }
    var xvalues = xyz.join('');
    // var xvalues = JSON.stringify(aIds.join(''));
    return xvalues;

}

$( ".checkScope" ).change(function() {
    // console.log(str2);
    // alert(ambilNilaiScope());
});

});
</script>
@endsection
