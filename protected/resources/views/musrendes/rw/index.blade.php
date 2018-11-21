<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?php
                $this->title = 'Daftar Usulan RW';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = '/';
                $breadcrumb->begin();
                $breadcrumb->add(['url' => '/modul2','label' => 'Musrenbang RKPD']);
                $breadcrumb->add(['url' => '/modul2','label' => 'Kecamatan']);
                $breadcrumb->add(['label' => $this->title]);
                $breadcrumb->end();
            ?>          
        </div>
    </div>
    <div id="pesan" class="notify"></div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <p><h2 id="judul" class="panel-title"> {{ $this->title }}</h2></p>
                </div>
                <div class="panel-body">
                  <div class="col-md-12">
                    <form name="" class="form-horizontal" role="form" autocomplete='off' action="" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="title">Kecamatan / Desa :</label>
                      <div class="col-sm-3">
                          <select type="text" class="form-control" id="id_kecamatan" name="id_kecamatan"></select>
                      </div>
                        <div class="col-sm-3">
                            <select type="text" class="form-control" id="id_desa_cb" name="id_desa_cb"></select>
                        </div>
                    </div>
                    <div class="divAddUsulan col-sm-offset-2">
                      <button id="btnAddUsulanRw" type="button" class="btn btn-labeled btn-success"><span class="btn-label"><i class="fa fa-plus fa-lg fa-fw"></i></span>Tambah Usulan RW</button>
                    </div>
                  </form>
                    {{-- <div class="table-responsive"> --}}
                    <table id="tblUsulanRW" class="table table-striped table-bordered table-responsive compact display" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="5px" style="text-align: center; vertical-align:middle">No Urut</th>
                                    <th width="10%" style="text-align: center; vertical-align:middle">Desa/Kelurahan</th>
                                    <th style="text-align: center; vertical-align:middle">Uraian Aktivitas Kegiatan</th>
                                    <th width="10%" style="text-align: center; vertical-align:middle">Volume</th>
                                    <th width="20%" style="text-align: center; vertical-align:middle">Pagu Usulan</th>
                                    <th width="5px" style="text-align: center; vertical-align:middle">Status Usulan</th>
                                    <th width="20px" style="text-align: center; vertical-align:middle">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                    </table>
                    {{-- </div>   --}}
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="ModalUsulanRW" class="modal fade" role="dialog" data-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="text-align: center;"></h4>
            </div>
            <div class="modal-body">
              <form name="frmModalUsulanRW" class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="id_musrendes_rw" name="id_musrendes_rw">
                <input type="hidden" id="tahun_musren" name="tahun_musren">
                <input type="hidden" id="id_desa" name="id_desa">
                <div class="form-group">
                  <label class="control-label col-sm-3" for="id">No Urut :</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control number" name="no_urut_usulan" id="no_urut_usulan">
                  </div>
                  <div class="col-sm-3 chkUsulanRw hidden">
                    <label class="checkbox-inline">
                    <input class="checkUsulanRw" type="checkbox" name="checkUsulanRw" id="checkUsulanRw" value="1"> Telah Direviu</label>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3" for="rtrw">RT / RW :</label>
                  <div class="col-sm-2">
                        <input type="text" class="form-control number" id="id_rt" name="id_rt">
                  </div>
                  <div class="col-sm-2">
                        <input type="text" class="form-control number" id="id_rw" name="id_rw">
                  </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="title">Uraian Aktivitas :</label>
                    <div class="col-sm-8">
                      <textarea type="name" class="form-control" id="ur_aktivitas_kegiatan" rows="3" disabled></textarea>
                    </div>
                    <input type="hidden" id="id_aktivitas_asb" name="id_aktivitas_asb">
                    <input type="hidden" id="id_renja" name="id_renja">
                    <input type="hidden" id="id_kegiatan" name="id_kegiatan">
                    <span class="btn btn-sm btn-primary btnCariASB" id="btnCariASB" name="btnCariASB"><i class="fa fa-search fa-fw fa-lg"></i></span>
                </div>
                <div class="form-group hidden">
                    <label class="control-label col-sm-3" for="title">Zona SSH :</label>
                    <div class="col-sm-5">
                        <select type="text" class="form-control" id="id_zona_cb" name="id_zona_cb"></select>
                    </div>
                </div>
                <div class="form-group">
                <div class="col-sm-12">
                    <table class="table table-striped table-bordered table-responsive compact">
                        <thead>
                          <tr>
                            <td width="15%" style="text-align: center; vertical-align:middle;">Volume</td>
                            <td width="25%" style="text-align: center; vertical-align:middle;">Satuan</td>
                            <td width="30%" style="text-align: center; vertical-align:middle;">Harga Satuan</td>
                            <td width="30%" style="text-align: center; vertical-align:middle;">Jumlah Total</td>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <td width="15%" style="text-align: center; vertical-align:middle;">
                                <input type="text" style="text-align: right;" class="form-control number" id="volume" name="volume">
                              </td>
                              <td width="25%" style="text-align: left; vertical-align:middle;">
                                <input type="text" style="text-align: center;" class="form-control" id="ur_satuan" name="ur_satuan" disabled>
                                <input type="hidden" class="form-control number" id="id_satuan" name="id_satuan">
                              </td>                          
                              <td width="30%" style="text-align: left; vertical-align:middle;">
                                <input type="text" style="text-align: right;" class="form-control number" id="harga_satuan" name="harga_satuan" disabled>
                              </td>
                              <td width="30%" style="text-align: left; vertical-align:middle;">
                                <input type="text" style="text-align: right;" class="form-control number" id="jumlah_pagu" name="jumlah_pagu" disabled>
                              </td>
                          </tr>
                        </tbody>
                    </table>
                </div>                  
                </div>
                <div class="form-group">
                  <label for="uraian_kondisi" class="col-sm-3 control-label" align='left'>Keterangan Usulan :</label>
                  <div class="col-sm-9">
                    <textarea type="text" class="form-control" name="uraian_kondisi" id="uraian_kondisi" rows="5"></textarea>
                  </div>
                </div>
              </form>
            </div>
              <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left">
                        {{-- <button type="button" id="btnHapusUsulanRW" class="btn btn-sm btn-danger btn-labeled">
                            <span class="btn-label"><i class="fa fa-trash fa-fw fa-lg"></i></span>Hapus</button> --}}
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" id="btnUsulanRW" class="btn btn-success btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i class="fa fa-floppy-o fa-fw fa-lg"></i></span>Simpan</button>
                        <div class="or"></div>
                        <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="fa fa-sign-out fa-fw fa-lg"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

<div id="HapusUsulanRW" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
            <h4 style="text-align: center;">Hapus Data Usulan tingkat RW</h4>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id_musrenrw_hapus" name="id_musrenrw_hapus">
            <div class="alert alert-danger deleteContent">
              <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border"  style="color:red;" aria-hidden="true"></i>
                Yakin akan menghapus Data Usulan ini : <strong><span id="ur_musrenrw_hapus"></span></strong> ?
                <br>
                <br>
                <strong>Catatan : Penghapusan data ini mempengaruhi data selanjutnya akan ikut terhapus.....!!!!</strong> 
          </div>
        </div>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" id="btnDelAktivitas" class="btn btn-danger btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i class="fa fa-trash fa-fw fa-lg"></i></span>Hapus</button>
                        <div class="or"></div>
                        <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="fa fa-sign-out fa-fw fa-lg"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
        </div>
      </div>
    </div>

<div id="StatusProgram" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
            <h4 style="text-align: center;">Perubahan Status Usulan</h4>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id_musrenrw_posting" name="id_musrenrw_posting">
            <input type="hidden" id="status_usulan_posting" name="status_usulan_posting">
            <div class="alert alert-success">
                <div>
                  <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border text-info"  aria-hidden="true"></i>
                  <p>Yakin akan melakukan proses <strong><i><span id="ur_status_ranwal_posting"></span></i></strong> pada usulan ini ?</p>
                </div>
                <hr>
                <div>
                  <strong>Catatan : Proses ini mempengaruhi data selanjutnya.....!!!!</strong>
                </div> 
          </div>
        </div>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" id="btnPostProgram" class="btn btn-success btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i class="fa fa-check-square-o fa-fw fa-lg"></i></span>Proses</button>
                        <div class="or"></div>
                        <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="fa fa-sign-out fa-fw fa-lg"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
        </div>
      </div>
    </div>

<div id="cariAktivitasASB" class="modal fade" role="dialog" data-backdrop="static" tabindex="-1" data-focus-on="input:first">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          <h4 style="text-align: center;">Daftar Aktivitas Kegiatan yang di-Musrenbang-kan</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
            <div class="form-group hidden">
              <label class="control-label col-sm-3" for="">Zona Wilayah SSH :</label>
              <div class="col-sm-8">
                <select type="text" class="form-control zona_ssh_load" id="zona_ssh_load" name="zona_ssh_load"></select>
              </div>
            </div> 
           <div class="form-group">
             <div class="col-sm-12">
                <table id='tblCariAktivitasASB' class="table display compact table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                          <tr>
                            <th width="5%" style="text-align: center; vertical-align:middle;">No Urut</th>
                            <th style="text-align: center; vertical-align:middle;">Uraian Kegiatan Renja</th>
                            <th style="text-align: center; vertical-align:middle;">Uraian Aktivitas ASB</th>
                            <th width="10%" style="text-align: center; vertical-align:middle;">Pagu</th>
                            <th width="25%" style="text-align: center; vertical-align:middle;">OPD Penanggung Jawab</th>
                            <th width="5%" style="text-align: center; vertical-align:middle;">Aksi</th>
                          </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
              </div>
            </div>
          </form>
        </div>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left">
                    </div>
                    <div class="col-sm-10 text-right">
                        <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="fa fa-sign-out fa-fw fa-lg"></i></span>Tutup</button>
                    </div>
                </div>
        </div>
      </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
$(document).ready(function() {

function createPesan(message, type) {
    var html = '<div id="pesanx" class="alert alert-' + type + ' alert-dismissable flyover flyover-bottom in">';    
    html += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
    html += message;
    html += '</div>';    
    $(html).hide().prependTo('#pesan').slideDown();
    

    setTimeout(function() {
            $('#pesanx').removeClass('in');
         }, 3500);

  };

$('.page-alert .close').click(function(e) {
        e.preventDefault();
        $(this).closest('.page-alert').slideUp();
    });

$('[data-toggle="popover"]').popover();

// $('.number').number(true,0,',', '.');

$('#no_urut_usulan').number(true,0,',', '.');
$('#volume').number(true,2,',','.');
$('#harga_satuan').number(true,2,',','.');
$('#jumlah_pagu').number(true,2,',','.');
  
$('.display').DataTable({
      dom : 'BfRtip',
      autoWidth : false,
      bDestroy: true
  });

function validasiDataAwal() {
  if ( $.trim( $('#id_kecamatan').val()) == 0) {
    createPesan("Nama Kecamatan Belum Dipilih..!!","danger"); 
    return false;
  };
  if ( $.trim( $('#id_desa_cb').val()) == 0) {
    createPesan("Nama Desa Belum Dipilih..!!","danger"); 
    return false;
  };
}

var usulan_tbl,asb_tbl;
function LoadUsulanRW($id_desa){
    usulan_tbl=$('#tblUsulanRW').DataTable({
                  processing: true,
                  serverSide: true,
                  dom : 'BfRtip',                  
                  autoWidth : false,
                  "ajax": {"url": "musrenrw/getData/"+$id_desa},
                  "language": {
                      "decimal": ",",
                      "thousands": "."},
                  "columns": [
                        { data: 'no_urut', sClass: "dt-center", width :"5px"},
                        { data: 'nama_desa', sClass: "dt-left", width :"10%"},
                        { data: 'uraian_aktivitas_kegiatan', sClass: "dt-left"},
                        { data: 'volume', sClass: "dt-center",width :"10%",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'jml_pagu', sClass: "dt-right",width :"20%",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'icon','searchable': false, 'orderable':false, sClass: "dt-center", width :"5px",
                            render: function(data, type, row,meta) {
                            return '<i class="'+row.status_icon+'" style="color:'+row.warna+';"/>';
                          }},
                        { data: 'action', 'searchable': false, width :"20px", 'orderable':false, sClass: "dt-center" }
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        });
}

$(document).on('click', '#btnCariASB', function() {
  asb_tbl = $('#tblCariAktivitasASB').DataTable( {
        processing: true,
        serverSide: true,                 
        autoWidth : false,
        dom: 'bfrtIp',
        "ajax": {"url": "musrenrw/getDataASB"},
        "columns": [
              { data: 'no_urut', sClass: "dt-center"},
              { data: 'uraian_kegiatan_renstra'},
              { data: 'nm_aktivitas_asb'},
              { data: 'pagu_rata2', sClass: "dt-right",
                render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
              { data: 'nm_unit'},
              { data: 'action', 'searchable': false, width :"20px", 'orderable':false, sClass: "dt-center" }

            ],
        "order": [[0, 'asc']],
        "bDestroy": true
    });

  $('#cariAktivitasASB').modal('show'); 

});

$('#tblCariAktivitasASB').on( 'dblclick', 'tr', function () {
    var data = asb_tbl.row(this).data();   

    document.getElementById("ur_satuan").value = data.nm_satuan_musren;
    document.getElementById("id_satuan").value = data.id_satuan_musren;
    document.getElementById("ur_aktivitas_kegiatan").value = data.nm_aktivitas_asb;
    document.getElementById("id_aktivitas_asb").value = data.id_aktivitas_asb;
    document.getElementById("id_renja").value = data.id_renja;
    document.getElementById("id_kegiatan").value = data.id_aktivitas_renja;
    $('#harga_satuan').val(data.pagu_rata2);
    $('#jumlah_pagu').val(hitungpagu());

    $('#cariAktivitasASB').modal('hide');

       

  });

function hitungpagu(){

  var x = $('#volume').val();
  var y = $('#harga_satuan').val();
  
  var nilai_pagu = x*y;
  return nilai_pagu;

}

$( "#volume" ).change(function() {
  $('#jumlah_pagu').val(hitungpagu());
  // alert($('#harga_satuan').val()) ;
});

$( "#harga_satuan" ).change(function() {
  $('#jumlah_pagu').val(hitungpagu()); 
});

$( "#id_kecamatan" ).change(function() {
    loadDesa($('#id_kecamatan').val());
});

$.ajax({
    type: "GET",
    url: './admin/parameter/getKecamatan',
    dataType: "json",

    success: function(data) {

      var j = data.length;
      var post, i;

      $('select[name="id_kecamatan"]').empty();
      $('select[name="id_kecamatan"]').append('<option value="0">---Pilih Kecamatan---</option>');

      for (i = 0; i < j; i++) {
        post = data[i];
        $('select[name="id_kecamatan"]').append('<option value="'+ post.id_kecamatan +'">'+ post.nama_kecamatan +'</option>');
      }
    }
  }); 


function loadDesa($id_kecamatan){
$.ajax({
    type: "GET",
    url: './admin/parameter/getDesa/'+$id_kecamatan,
    dataType: "json",

    success: function(data) {

      var j = data.length;
      var post, i;

      $('select[name="id_desa_cb"]').empty();
      $('select[name="id_desa_cb"]').append('<option value="0">---Pilih Desa/Kelurahan---</option>');

      for (i = 0; i < j; i++) {
        post = data[i];
        $('select[name="id_desa_cb"]').append('<option value="'+ post.id_desa +'">'+ post.nama_desa +'</option>');
      }
    }
  });  
}

loadDesa($('#id_kecamatan').val());

$("#id_desa_cb").change(function() {
  LoadUsulanRW($('#id_desa_cb').val()) 
});

$('#btnAddUsulanRw').click(function(){

  if(validasiDataAwal() != false){
    $('#btnUsulanRW').addClass('addUsulanRW');
    $('#btnUsulanRW').removeClass('editUsulanRW');      
    $('.form-horizontal').show();
    $('.modal-title').text('Tambah Usulan tingkat RW');
    $('#id_musrendes_rw').val(null);
    $('#tahun_musren').val({{Session::get('tahun')}});
    $('#id_desa').val($('#id_desa_cb').val());
    $('#no_urut_usulan').val(1);
    $('#id_rt').val(1);
    $('#id_rw').val(1);
    $('#id_aktivitas_asb').val(null);
    $('#ur_aktivitas_kegiatan').val(null);
    $('#id_renja').val(null);
    $('#id_kegiatan').val(null);
    $('#volume').val(0);
    $('#id_satuan').val(null);
    $('#ur_satuan').val(null);
    $('#harga_satuan').val(1);
    $('#jumlah_pagu').val(hitungpagu());
    $('#uraian_kondisi').val(null);
    $('#btnUsulanRW').show();
    $('.checkUsulanRw').prop('checked',false);
    $('#ModalUsulanRW').modal('show');
  }
});

  $('.modal-footer').on('click', '.addUsulanRW', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: 'musrenrw/addMusrenbangRw',
          data: {
              '_token': $('input[name=_token]').val(),
              'tahun_musren': $('#tahun_musren').val(),
              'no_urut': $('#no_urut_usulan').val(),
              'id_renja': $('#id_renja').val(),
              'id_desa' : $('#id_desa').val() ,
              'id_kegiatan' : $('#id_kegiatan').val() ,
              'id_asb_aktivitas' : $('#id_aktivitas_asb').val() ,
              'uraian_aktivitas_kegiatan' : $('#ur_aktivitas_kegiatan').val(),
              'uraian_kondisi' : $('#uraian_kondisi').val() ,
              'id_satuan' : $('#id_satuan').val(), 
              'volume' : $('#volume').val(), 
              'harga_satuan' : $('#harga_satuan').val(), 
              'jml_pagu': $('#jumlah_pagu').val(), 
              // 'status_usulan': $('#checkUsulanRw').val(), 
              'rt': $('#id_rt').val(), 
              'rw': $('#id_rw').val(), 
          },
          success: function(data) {
              usulan_tbl.ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              } 
          }
      });
  });

$(document).on('click','#btnEditUsulanRw', function(){
  var data = usulan_tbl.row( $(this).parents('tr') ).data();

  $('#btnUsulanRW').removeClass('addUsulanRW');
  $('#btnUsulanRW').addClass('editUsulanRW');      
  $('.form-horizontal').show();
  if(data.status_usulan==0){
    $('.modal-title').text('Edit Usulan tingkat RW');
    $('#btnUsulanRW').show();
  } else {
    $('.modal-title').text('Rincian Usulan tingkat RW');
    $('#btnUsulanRW').hide();
  }
  $('#id_musrendes_rw').val(data.id_musrendes_rw);
  $('#tahun_musren').val(data.tahun_musren);
  $('#id_desa').val(data.id_desa);
  $('#no_urut_usulan').val(data.no_urut);
  $('#id_rt').val(data.rt);
  $('#id_rw').val(data.rw);
  $('#id_aktivitas_asb').val(data.id_asb_aktivitas);
  $('#ur_aktivitas_kegiatan').val(data.uraian_aktivitas_kegiatan);
  $('#id_renja').val(data.id_renja);
  $('#id_kegiatan').val(data.id_kegiatan);
  $('#volume').val(data.volume);
  $('#id_satuan').val(data.id_satuan);
  $('#ur_satuan').val(data.uraian_satuan);
  $('#harga_satuan').val(data.harga_satuan);
  $('#jumlah_pagu').val(data.jml_pagu);
  $('#uraian_kondisi').val(data.uraian_kondisi);

  $('.chkUsulanRw').show();
          if(data.status_usulan==1){
            $('.checkUsulanRw').prop('checked',true);
          } else {
            $('.checkUsulanRw').prop('checked',false);
          }
  $('#ModalUsulanRW').modal('show');

});

  $('.modal-footer').on('click', '.editUsulanRW', function() {

    if (document.getElementById("checkUsulanRw").checked){
        check_data = 1
      } else {
        check_data = 0
      }

      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: 'musrenrw/editMusrenbangRw',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_musrendes_rw': $('#id_musrendes_rw').val(),
              'tahun_musren': $('#tahun_musren').val(),
              'no_urut': $('#no_urut_usulan').val(),
              'id_renja': $('#id_renja').val(),
              'id_desa' : $('#id_desa').val() ,
              'id_kegiatan' : $('#id_kegiatan').val() ,
              'id_asb_aktivitas' : $('#id_aktivitas_asb').val() ,
              'uraian_aktivitas_kegiatan' : $('#ur_aktivitas_kegiatan').val(),
              'uraian_kondisi' : $('#uraian_kondisi').val() ,
              'id_satuan' : $('#id_satuan').val(), 
              'volume' : $('#volume').val(), 
              'harga_satuan' : $('#harga_satuan').val(), 
              'jml_pagu': $('#jumlah_pagu').val(), 
              'status_usulan': check_data, 
              'rt': $('#id_rt').val(), 
              'rw': $('#id_rw').val(), 
          },
          success: function(data) {
              usulan_tbl.ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              } 
          }
      });
  });

$(document).on('click', '#btnHapusUsulanRW', function() {

  $('#id_musrenrw_hapus').val($('#id_musrendes_rw').val());
  $('#ur_musrenrw_hapus').text($('#ur_aktivitas_kegiatan').val());  

  $('#HapusUsulanRW').modal('show');

});


$(document).on('click', '#btnDelAktivitas', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      type: 'post',
      url: 'musrenrw/hapusMusrenbangRw',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_musrendes_rw': $('#id_musrenrw_hapus').val()
      },
      success: function(data) {
        $('#ModalUsulanRW').modal('hide'); 
        $('#tblUsulanRW').DataTable().ajax.reload();
        createPesan(data.pesan,"info");
      }
    });
});


$(document).on('click', '#btnPilihASB', function() {

    var data = asb_tbl.row( $(this).parents('tr') ).data();

    document.getElementById("ur_satuan").value = data.nm_satuan_musren;
    document.getElementById("id_satuan").value = data.id_satuan_musren;
    document.getElementById("ur_aktivitas_kegiatan").value = data.nm_aktivitas_asb;
    document.getElementById("id_aktivitas_asb").value = data.id_aktivitas_asb;
    document.getElementById("id_renja").value = data.id_renja;
    document.getElementById("id_kegiatan").value = data.id_aktivitas_renja;
    $('#harga_satuan').val(data.pagu_rata2);
    $('#jumlah_pagu').val(hitungpagu());

    $('#cariAktivitasASB').modal('hide');    

  });

$(document).on('click', '#btnPostMusrenRW', function() {

  var data = usulan_tbl.row( $(this).parents('tr') ).data();

    $('#id_musrenrw_posting').val(data.id_musrendes_rw);
    $('#status_usulan_posting').val(data.status_usulan);

    if(data.status_usulan==0){
        document.getElementById("ur_status_ranwal_posting").innerHTML = "Posting";
    } else {
        document.getElementById("ur_status_ranwal_posting").innerHTML = "Un-Posting";
    }

    $('#StatusProgram').modal('show');
});

$('.modal-footer').on('click', '#btnPostProgram', function() {
      var status_post;
      if($('#status_usulan_posting').val()==0){
          status_post = 1
      } else {
          status_post = 0
      };

      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: 'musrenrw/postMusrendesRw',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_musrendes_rw': $('#id_musrenrw_posting').val(),
              'status_usulan': status_post,
          },
          success: function(data) {
              usulan_tbl.ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              } 
              $('#StatusProgram').modal('hide');
          }
      });
    });


} );
</script>
@endsection
