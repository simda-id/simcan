<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?php
                $this->title = ' Data Usulan Kabupaten/Kota ';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = '/';
                $breadcrumb->begin();
                $breadcrumb->add(['label' => $this->title]);
                $breadcrumb->end();
            ?>          
        </div>
    </div>
  <div id="pesan"></div>
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <p><h2 class="panel-title">Data Usulan Kabupaten/Kota</h2></p>
          </div>

          <div class='panel-body'>          
              
              {{-- <div class="btn-group">
                <button type="button" class="btn btn-info dropdown-toggle btn-labeled" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown"><span class="btn-label"><i class="fa fa-print fa-fw fa-lg"></i></span>Cetak Pokok Pikiran <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li>
                    <a class="dropdown-item btnPrintPokir" ><i class="fa fa-print fa-fw fa-lg text-success"></i> XLS Pokok Pikiran</a>
                  </li> 
                  <li>
                    <a class="dropdown-item btnPrintUsulanPokir" ><i class="fa fa-print fa-fw fa-lg text-info"></i> Cetak Usulan Pokok Pikiran</a>
                  </li>                     
                </ul>
              </div> --}}
              <div class="form-group">
                <a class="btn btn-labeled btn-success addUsulanKab" data-toggle="modal"><span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span> Tambah Usulan</a>
                <label class="control-label col-sm-2" for="list_kabupaten" style="text-align: right;">Kabupaten/Kota :</label>
                <div class="col-sm-5">
                    <select type="text" class="form-control" id="list_kabupaten" name="list_kabupaten"></select>
                </div>
              </div>

                <table id="tblUsulan" class="table display table-striped table-bordered table-responsive"  width="100%">
                  <thead>
                    <tr>
                      <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                      <th width="5%" style="text-align: center; vertical-align:middle">Tahun Usulan</th>
                      <th width="15%" style="text-align: center; vertical-align:middle">Kab/Kota Pengusul</th>
                      <th style="text-align: center; vertical-align:middle">Judul Usulan</th>
                      <th width="10%" style="text-align: center; vertical-align:middle">Volume Usulan</th>
                      <th width="15%" style="text-align: center; vertical-align:middle">Pagu Usulan</th>
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

<div id="ModalUsulan" class="modal fade" role="dialog" data-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
              <form name="frmModalUsulan" class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">                
                <input type="hidden" id="id_usulan_kab" name="id_usulan_kab">
                <input type="hidden" id="id_kab" name="id_kab">
                <input type="hidden" id="id_tahun" name="id_tahun">
                <div class="form-group">
                    <label class="control-label col-sm-3" for="no_urut">No Urut :</label>
                    <div class="col-sm-3">
                          <input type="text" class="form-control number" id="no_urut" name="no_urut">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="nama_kab_kota">Kabupaten/Kota Pengusul:</label>
                    <div class="col-sm-8">
                          <input type="text" class="form-control" id="nama_kab_kota" name="nama_kab_kota" readonly>
                    </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3 text-left" for="id_unit">Perangkat Daerah Provinsi:</label>
                  <div class="col-sm-8">
                      <select class="form-control id_Unit" name="id_unit" id="id_unit"></select>
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
                <div class="form-group">
                    <label class="control-label col-sm-3" for="judul_usulan">Judul Usulan :</label>
                      <div class="col-sm-8">
                        <textarea type="name" class="form-control" id="judul_usulan" rows="3"></textarea>
                      </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="uraian_usulan">Uraian Usulan :</label>
                      <div class="col-sm-8">
                        <textarea type="name" class="form-control" id="uraian_usulan" rows="6"></textarea>
                      </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="volume">Volume Usulan :</label>
                    <div class="col-sm-2">
                          <input type="text" class="form-control number" id="volume" name="volume" style="text-align: right;">
                    </div>
                    <div class="col-sm-4">
                      <select type="text" class="form-control" id="id_satuan" name="id_satuan"></select>
                    </div>
                  </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="pagu">Pagu Usulan:</label>
                    <div class="col-sm-5">
                          <input type="text" class="form-control number" id="pagu" name="pagu" style="text-align: right;">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="sumber_usulan">Sumber Usulan :</label>
                    <div class="col-sm-5">
                        <select type="text" class="form-control" id="sumber_usulan" name="sumber_usulan">
                          <option value="1">Musren Desa/Kelurahan</option>
                          <option value="2">Musren Kecamatan</option>
                          <option value="3">Musren Kabupaten/Kota</option>
                        </select>
                    </div>
                </div>
              </form>
            </div>
                  <div class="modal-footer">
                    <div class="row">
                        <div class="col-sm-2 text-left idbtnHapusUsulan">
                            <button id="btnHapusUsulan" type="button" class="btn btn-sm btn-danger btn-labeled">
                                <span class="btn-label"><i class="fa fa-trash fa-fw fa-lg"></i></span>Hapus</button>
                        </div>
                        <div class="col-sm-10 text-right">
                          <div class="ui-group-buttons">
                            <button id="btnUsulan" type="button" class="btn btn-sm btn-success btn-labeled" data-dismiss="modal">
                                <span class="btn-label"><i class="fa fa-floppy-o fa-fw fa-lg"></i></span>Simpan</button>
                            <div class="or"></div>
                            <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                                <span class="btn-label"><i class="fa fa-sign-out fa-fw fa-lg"></i></span>Tutup</button>
                          </div>
                        </div>
                    </div>
                  </div>
            </div>
          </div>
        </div>

<div id="HapusUsulan" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
            <h4>Hapus Rincian Usulan Kabupaten/Kota</h4>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id_usulan_hapus" name="id_usulan_hapus">
            <div class="alert alert-danger deleteContent">
              <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border"  style="color:red;" aria-hidden="true"></i>
                Yakin akan menghapus uraian usulan : <strong><span id="ur_usulan_hapus"></span></strong> ?
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
                        <button  id="btnDelUsulan" type="button" class="btn btn-sm btn-danger btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i class="fa fa-trash fa-fw fa-lg"></i></span>Hapus</button>
                        <div class="or"></div>
                        <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
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
          <h4 style="text-align: center;">Daftar Aktivitas Kegiatan Ranwal Renja Perangkat Daerah</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
            <div class="form-group">
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


<div id="ModalLokasi" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form name="frmModalLokasi" class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" id="id_usulan_lokasi" name="id_usulan_lokasi">
            <input type="hidden" id="id_pokir_lokasi" name="id_pokir_lokasi">
            <div class="form-group">
                <label class="control-label col-sm-3" for="id_kecamatan">Kecamatan :</label>
                <div class="col-sm-5">
                    <select type="text" class="form-control" id="id_kecamatan" name="id_kecamatan"></select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="id_desa">Kelurahan/Desa :</label>
                <div class="col-sm-5">
                    <select type="text" class="form-control" id="id_desa" name="id_desa" disabled></select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="">RT / RW :</label>
                <div class="col-sm-2">
                      <input type="text" maxlength="3" class="form-control number" id="id_rt" name="id_rt">
                </div>
                <div class="col-sm-2">
                    <input type="text" maxlength="3" class="form-control number" id="id_rw" name="id_rw">                    
                </div>
              </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="diskripsi_lokasi">Keterangan Lokasi :</label>
                <div class="col-sm-8">
                      <textarea type="name" class="form-control" id="diskripsi_lokasi" name="diskripsi_lokasi" rows="3"></textarea>
                </div>
            </div>
          </form>
        </div>
              <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusLokasi">
                        <button id="btnHapusLokasi" type="button" class="btn btn-sm btn-danger btn-labeled">
                            <span class="btn-label"><i class="fa fa-trash fa-fw fa-lg"></i></span>Hapus</button>
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button id="btnLokasi" type="button" class="btn btn-sm btn-success btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i class="fa fa-floppy-o fa-fw fa-lg"></i></span>Simpan</button>
                        <div class="or"></div>
                        <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="fa fa-sign-out fa-fw fa-lg"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
        </div>
      </div>
    </div>

<div id="HapusLokasi" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
            <h4>Hapus Data Lokasi Usulan</h4>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id_lokasi_hapus" name="id_lokasi_hapus">
            <div class="alert alert-danger deleteContent">
                <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border"  style="color:red;" aria-hidden="true"></i>
                Yakin akan menghapus lokasi : <strong><span id="ur_lokasi_hapus"></span></strong> dalam usulan Pokok-pokok Pemikiran Dewan ?
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
                        <button type="button" id="btnDelLokasi" class="btn btn-sm btn-danger btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i class="fa fa-trash fa-fw fa-lg"></i></span>Hapus</button>
                        <div class="or"></div>
                        <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="fa fa-sign-out fa-fw fa-lg"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
        </div>
      </div>
    </div>

@endsection

@section('scripts')
<script type="text/javascript">
$(document).ready(function() {
  var id_tahun_temp = {{Session::get('tahun')}};
  var id_kab_temp, nama_kab_temp;
  var usulan_tbl, rincian_tbl, lokasi_tbl;
  var pokir_temp, rincian_temp, lokasi_temp;

  $('.number').number(true,0,'', '');
  $('#volume').number(true,2,',', '.');
  $('#pagu').number(true,2,',', '.');
  

  $('[data-toggle="popover"]').popover();

  function formatTgl(val_tanggal){
      var formattedDate = new Date(val_tanggal);
      var d = formattedDate.getDate();
      var m = formattedDate.getMonth();
      var y = formattedDate.getFullYear();
      var m_names = new Array("Januari", "Februari", "Maret", 
        "April", "Mei", "Juni", "Juli", "Agustus", "September", 
        "Oktober", "November", "Desember")

      var tgl= d + " " + m_names[m] + " " + y

      return tgl;
  };

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


  $('.page-alert .close').click(function(e) {
          e.preventDefault();
          $(this).closest('.page-alert').slideUp();
      });

  $('#txt_tgl_usul').datepicker({
          altField: "#txt_tgl_usul1",
          altFormat: "yy-mm-dd", 
          dateFormat: "dd MM yy"
      });

$.ajax({
    type: "GET",
    url: './pramusren/getKabupaten',
    dataType: "json",
    success: function(data) {

          var j = data.length;
          var post, i;

          $('select[name="list_kabupaten"]').empty();
          $('select[name="list_kabupaten"]').append('<option value="0">---Pilih Kabupaten/Kota---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="list_kabupaten"]').append('<option value="'+ post.id_kab +'">'+ post.nama_kab_kota +'</option>');
          }
          }
  });

$('#list_kabupaten').change(function(){
  id_kab_temp = $("#list_kabupaten").val();
  nama_kab_temp = $("#list_kabupaten option:selected").text();
  LoadTblRincian(id_kab_temp);
}); 

$.ajax({
          type: "GET",
          url: './asb/getRefSatuan',
          dataType: "json",
          success: function(data) {

          // console.log(data)  

          var j = data.length;
          var post, i;

          $('select[name="id_satuan"]').empty();
          $('select[name="id_satuan"]').append('<option value="0">---Pilih Satuan---</option>');

          for (i = 0; i < j; i++) {
              post = data[i];
              $('select[name="id_satuan"]').append('<option value="'+ post.id_satuan +'">'+ post.uraian_satuan +'</option>');
            }
              
          }
      });

$.ajax({
    type: "GET",
    url: './admin/parameter/getUnit',
    dataType: "json",

    success: function(data) {

          var j = data.length;
          var post, i;

          $('select[name="id_unit"]').empty();
          $('select[name="id_unit"]').append('<option value="0">---Pilih Unit---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="id_unit"]').append('<option value="'+ post.id_unit +'">'+ post.nm_unit +'</option>');
          }
          }
});

$('#tblUsulan').DataTable({
  dom : 'BfRtip',
  autoWidth : false,
  bDestroy: true
}); 

function LoadTblRincian(id_kab){
usulan_tbl=$('#tblUsulan').DataTable( {
    processing: true,
    serverSide: true,
    dom : 'BfRtip',
    autoWidth : false,
    "ajax": {"url": "./pramusren/getData/"+id_tahun_temp},
    "language": {
            "decimal": ",",
            "thousands": "."},
    "columns": [
          { data: 'no_urut', sClass: "dt-center"},
          { data: 'id_tahun', sClass: "dt-center"},
          { data: 'nama_kab_kota'},
          { data: 'judul_usulan'},
          { data: 'volume', sClass: "dt-right",width:"15px",
              render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
          { data: 'pagu', sClass: "dt-right",width:"15px",
              render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
          { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
        ],
    bDestroy: true
  });
};

var asb_tbl
$(document).on('click', '#btnCariASB', function() {
  asb_tbl = $('#tblCariAktivitasASB').DataTable( {
        processing: true,
        serverSide: true,                 
        autoWidth : false,
        dom: 'bfrtIp',
        "ajax": {"url": "./musrenrw/getDataASB"},
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

    document.getElementById("id_unit").value = data.id_unit;
    document.getElementById("id_satuan").value = data.id_satuan_musren;
    document.getElementById("ur_aktivitas_kegiatan").value = data.nm_aktivitas_asb;
    document.getElementById("id_aktivitas_asb").value = data.id_aktivitas_asb;
    // document.getElementById("id_renja").value = data.id_renja;
    // document.getElementById("id_kegiatan").value = data.id_aktivitas_renja;
    // $('#harga_satuan').val(data.pagu_rata2);

    $('#cariAktivitasASB').modal('hide');    

  });

$(document).on('click', '#btnPilihASB', function() {

    var data = asb_tbl.row( $(this).parents('tr') ).data();

    document.getElementById("id_unit").value = data.id_unit;
    document.getElementById("id_satuan").value = data.id_satuan_musren;
    document.getElementById("ur_aktivitas_kegiatan").value = data.nm_aktivitas_asb;
    document.getElementById("id_aktivitas_asb").value = data.id_aktivitas_asb;
    // document.getElementById("id_renja").value = data.id_renja;
    // document.getElementById("id_kegiatan").value = data.id_aktivitas_renja;
    // $('#harga_satuan').val(data.pagu_rata2);

    $('#cariAktivitasASB').modal('hide');    

  });

$('#tblUsulan tbody').on( 'dblclick', 'tr', function () {

  var data = usulan_tbl.row(this).data();

  pokir_temp=data.id_pokir

  $('.nav-tabs a[href="#uraian"]').tab('show');    
  LoadTblRincian(pokir_temp);

});

$(document).on('click', '#btnViewRincian', function() {
  var data = usulan_tbl.row( $(this).parents('tr') ).data();

  pokir_temp=data.id_pokir

  $('.nav-tabs a[href="#uraian"]').tab('show');    
  LoadTblRincian(pokir_temp);

});

$('#tblUraian tbody').on( 'dblclick', 'tr', function () {

  var data = rincian_tbl.row(this).data();

  rincian_temp=data.id_pokir_usulan

  $('.nav-tabs a[href="#lokasi"]').tab('show');    
  LoadTblLokasi(rincian_temp);

});

$(document).on('click', '#btnLokasiPokir', function() {
  var data = rincian_tbl.row( $(this).parents('tr') ).data();

  rincian_temp=data.id_pokir_usulan

  $('.nav-tabs a[href="#lokasi"]').tab('show');    
  LoadTblLokasi(rincian_temp);

});

function LoadTblLokasi(id_usulan){
  lokasi_tbl=$('#tblLokasi').DataTable( {
    processing: true,
    serverSide: true,
    dom : 'BfRtip',
    autoWidth : false,
    "ajax": {"url": "./pokir/getLokasiPokir/"+id_usulan},
    "language": {
            "decimal": ",",
            "thousands": "."},
    "columns": [
          { data: 'no_urut', sClass: "dt-center"},
          { data: 'nama_kecamatan'},
          { data: 'nama_desa'},
          { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
        ],
    bDestroy: true
  } );
};

$('.addUsulanKab').click(function(){
  $.ajax({
          type: 'get',
          url: './pramusren/getNoUsulan',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_kab' : id_kab_temp,
              'tahun' : id_tahun_temp,
          },
          success: function(data) {
              $('#btnUsulan').addClass('addUsulan');
              $('#btnUsulan').removeClass('editUsulan');
              $('.form-horizontal').show();
              $('.modal-title').text('Tambah Usulan Kabupaten/Kota');
              $('#id_kab').val(id_kab_temp);
              $('#id_tahun').val(id_tahun_temp);
              $('#no_urut').val(data[0].no_max);
              $('#nama_kab_kota').val(nama_kab_temp);
              $('#id_unit').val(0);
              $('#judul_usulan').val(null);
              $('#uraian_usulan').val(null);
              $('#volume').val(0);
              $('#pagu').val(0);
              $('#id_satuan').val(0);
              $('#sumber_usulan').val(1);
              $('#btnHapusUsulan').hide();
              $('#ModalUsulan').modal('show');
          }
      }); 

});


$('.modal-footer').on('click', '.addUsulan', function(){
  $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: './pramusren/addUsulan',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_tahun' : $('#id_tahun').val(),
              'id_kab' : $('#id_kab').val(),
              'id_unit' : $('#id_unit').val(),
              'no_urut' : $('#no_urut').val(),
              'judul_usulan' : $('#judul_usulan').val(),
              'uraian_usulan' : $('#uraian_usulan').val(),
              'volume' : $('#volume').val(),
              'id_satuan' : $('#id_satuan').val(),
              'pagu' : $('#pagu').val(),
              'sumber_usulan' : $('#sumber_usulan').val()

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

$(document).on('click', '#edit-usulankab', function(){

  var data = usulan_tbl.row( $(this).parents('tr') ).data();

  $('#btnUsulan').removeClass('addUsulan');
  $('#btnUsulan').addClass('editUsulan');
  $('.form-horizontal').show();
  $('.modal-title').text('Edit Uraian Pokok-Pokok Pemikiran Dewan');
  $('#id_usulan_kab').val(data.id_usulan_kab);
  $('#id_kab').val(data.id_kab);
  $('#id_tahun').val(data.id_tahun);
  $('#no_urut').val(data.no_urut);
  $('#nama_kab_kota').val(data.nama_kab_kota);
  $('#id_unit').val(data.id_unit);
  $('#judul_usulan').val(data.judul_usulan);
  $('#uraian_usulan').val(data.uraian_usulan);
  $('#volume').val(data.volume);
  $('#pagu').val(data.pagu);
  $('#id_satuan').val(data.id_satuan);
  $('#sumber_usulan').val(data.sumber_usulan);

  $('#btnHapusUsulan').show();
  $('#ModalUsulan').modal('show');

});

$('.modal-footer').on('click', '.editUsulan', function(){
  $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: './pramusren/editUsulan',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_usulan_kab' : $('#id_usulan_kab').val(),
              'id_tahun' : $('#id_tahun').val(),
              'id_kab' : $('#id_kab').val(),
              'id_unit' : $('#id_unit').val(),
              'no_urut' : $('#no_urut').val(),
              'judul_usulan' : $('#judul_usulan').val(),
              'uraian_usulan' : $('#uraian_usulan').val(),
              'volume' : $('#volume').val(),
              'id_satuan' : $('#id_satuan').val(),
              'pagu' : $('#pagu').val(),
              'sumber_usulan' : $('#sumber_usulan').val()
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

$(document).on('click', '#hapus-usulankab', function() {

  var data = usulan_tbl.row( $(this).parents('tr') ).data();

  $('#id_usulan_hapus').val(data.id_usulan_kab);
  $('#ur_usulan_hapus').text(data.judul_usulan);  

  $('#HapusUsulan').modal('show');

});

$(document).on('click', '#btnDelUsulan', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      type: 'post',
      url: './pramusren/hapusUsulan',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_usulan_kab': $('#id_usulan_hapus').val()
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

$('#btnAddLokasi').click(function(){

  $('#btnLokasi').addClass('addLokasi');
  $('#btnLokasi').removeClass('editLokasi');
  $('.form-horizontal').show();
  $('.modal-title').text('Tambah Lokasi Pokok-Pokok Pemikiran Dewan');

  $('#id_usulan_lokasi').val(rincian_temp);
  $('#id_pokir_lokasi').val(null);
  $('#id_kecamatan').val(0);
  $('#id_desa').val(0);
  $('#id_rt').val(0);
  $('#id_rw').val(0);
  $('#diskripsi_lokasi').val(null);

  // $('#id_desa').attr("disabled","disabled");

  $('#btnHapusLokasi').hide();
  $('#ModalLokasi').modal('show');

});

$('.modal-footer').on('click', '.addLokasi', function(){
  $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: './pramusren/addLokasi',
          data: {
              '_token': $('input[name=_token]').val(),
              // 'id_pokir_lokasi' : $('#id_pokir_lokasi').val(),
              'id_pokir_usulan' : $('#id_usulan_lokasi').val(),
              'id_kecamatan' : $('#id_kecamatan').val(),
              'id_desa' : $('#id_desa').val(),
              'diskripsi_lokasi' : $('#diskripsi_lokasi').val(),
              'rt' : $('#id_rt').val(),
              'rw' : $('#id_rw').val(),
          },
          success: function(data) {
              lokasi_tbl.ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
          }
      });
});

$('#ModalLokasi').on('hidden.bs.modal', function (){
              $.ajax({
                  type: "GET",
                  url: './pramusren/getDesaAll',
                  dataType: "json",

                  success: function(data) {

                        var j = data.length;
                        var post, i;

                        $('select[name="id_desa"]').empty();
                        $('select[name="id_desa"]').append('<option value="0">---Pilih Kelurahan/Desa---</option>');

                        for (i = 0; i < j; i++) {
                          post = data[i];
                          $('select[name="id_desa"]').append('<option value="'+ post.id_desa +'">'+ post.nama_desa +'</option>');
                        }
                        }
                }); 

});

$(document).on('click', '#btnEditLokasiPokir', function() {

  var data = lokasi_tbl.row( $(this).parents('tr') ).data();


  $('#btnLokasi').removeClass('addLokasi');
  $('#btnLokasi').addClass('editLokasi');
  $('.form-horizontal').show();
  $('.modal-title').text('Ubah Lokasi Pokok-Pokok Pemikiran Dewan');

  $('#id_usulan_lokasi').val(data.id_pokir_usulan);
  $('#id_pokir_lokasi').val(data.id_pokir_lokasi);
  $('#id_kecamatan').val(data.id_kecamatan);
  $('#id_desa').val(data.id_desa);
  $('#id_rt').val(data.rt);
  $('#id_rw').val(data.rw);
  $('#diskripsi_lokasi').val(data.diskripsi_lokasi);

  $('#btnHapusLokasi').show(); 
  $('#ModalLokasi').modal('show');

});

$('.modal-footer').on('click', '.editLokasi', function(){
  $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: './pramusren/editLokasi',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_pokir_lokasi' : $('#id_pokir_lokasi').val(),
              'id_pokir_usulan' : $('#id_usulan_lokasi').val(),
              'id_kecamatan' : $('#id_kecamatan').val(),
              'id_desa' : $('#id_desa').val(),
              'diskripsi_lokasi' : $('#diskripsi_lokasi').val(),
              'rt' : $('#id_rt').val(),
              'rw' : $('#id_rw').val(),
          },
          success: function(data) {
              lokasi_tbl.ajax.reload();

              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
          }
      });
});

$(document).on('click', '#btnHapusLokasi', function() {

  $('#id_lokasi_hapus').val($('#id_pokir_lokasi').val());
  $('#ur_lokasi_hapus').text($('#diskripsi_lokasi').val()); 

  $('#HapusLokasi').modal('show');

});

$(document).on('click', '#btnDelLokasi', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      type: 'post',
      url: './pramusren/hapusLokasi',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_pokir_lokasi': $('#id_pokir_lokasi').val()
      },
      success: function(data) {
        $('#ModalLokasi').modal('hide'); 
        lokasi_tbl.ajax.reload();
        createPesan(data.pesan,"info");
      }
    });
});


});
</script>
@endsection


