<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?php
                $this->title = ' Tindak Lanjut Pokok-Pokok Pikiran DPRD';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = '/';
                $breadcrumb->begin();
                $breadcrumb->add(['url' => '/pokir', 'label' => 'Pokok-Pokok Pikiran DPRD']);
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
            <p><h2 class="panel-title">Tindak Lanjut Data Pokok-Pokok Pikiran DPRD</h2></p>
          </div>
          <div class='panel-body'>
          <form name="" class="form-horizontal" role="form" autocomplete='off' action="" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <label for="tahun_rkpd" class="col-sm-2 control-label" style="text-align: right;">Tahun RKPD</label>
              <div class="col-sm-2">
                <input class="form-control text-center" type="text" id="tahun_rkpd" name="tahun_rkpd" value="{{Session::get('tahun')}}" disabled>
              </div>              
              <a class="btn btn-labeled btn-info printPokir" data-toggle="modal"><span class="btn-label"><i class="fa fa-print fa-fw fa-lg"></i></span> Cetak Pokok-Pokok Pemikiran</a>
            </div>
            <div class="form-group">
              <label for="tahun_rkpd" class="col-sm-2 control-label" style="text-align: right;">Unit Pelaksana</label>
              <div class="col-sm-5">
                  <select type="text" class="form-control" id="id_unit_pokir" name="id_unit_pokir"></select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2 text-left"></label>
              <div class="col-sm-7">
                  <a id="btnProses" type="button" class="btn btn-success btn-labeled"><span class="btn-label"><i class="fa fa-download fa-fw fa-lg"></i></span> Load Data Usulan</a>
                  <a id="btnUnLoad" type="button" class="btn btn-danger btn-labeled"><span class="btn-label"><i class="fa fa-chain-broken fa-fw fa-lg"></i></span> Unload Data Usulan</a>
                  <a id="btnPosting" type="button" class="btn btn-primary btn-labeled"><span class="btn-label"><i class="fa fa-check-square-o fa-fw fa-lg"></i></span> Posting Data Usulan</a>
              </div>
            </div>
          </form>
          <table id="tblTLPokir" class="table table-striped table-bordered table-responsive">
            <thead>
              <tr>
                  <th rowspan="2"  width="3%" style="text-align: center; vertical-align:middle">Pilih</th>
                  <th rowspan="2" width="3%" style="text-align: center; vertical-align:middle">No Urut</th>
                  <th rowspan="2" width="20%" style="text-align: center; vertical-align:middle">Nama Pengusul</th>
                  <th rowspan="2" style="text-align: center; vertical-align:middle">Ringkasan Usulan</th>
                  <th colspan="2" width="20%" style="text-align: center; vertical-align:middle">Lokasi Usulan</th>
                  <th colspan="2" width="15%" style="text-align: center; vertical-align:middle">Status</th>
                  <th rowspan="2" width="5%" style="text-align: center; vertical-align:middle">Aksi</th>
              </tr>
              <tr>
                  <th width="10%" style="text-align: center; vertical-align:middle">Kecamatan</th>
                  <th width="10%" style="text-align: center; vertical-align:middle">Desa</th>
                  <th width="10%" style="text-align: center; vertical-align:middle">Usulan</th>
                  <th width="5%" style="text-align: center; vertical-align:middle">Posting</th>
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

<!--Modal Tambah Pokir -->
<div id="ModalUsulan" class="modal fade" role="dialog" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body">
              <form name="frmModalUsulan" class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="id_pokir_usulan" name="id_pokir_usulan">
                <input type="hidden" id="id_pokir_lokasi" name="id_pokir_lokasi">
                <input type="hidden" id="id_pokir" name="id_pokir">
                <input type="hidden" id="id_pokir_tl" name="id_pokir_tl">
                <input type="hidden" id="id_pokir_unit" name="id_pokir_unit">
                <div class="form-group">
                    <label class="control-label col-sm-3" for="volume_usulan">No Urut :</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control nomor" id="no_urut_usulan" name="no_urut_usulan" style="text-align: center;" disabled>
                    </div>
                    <div class="col-sm-3 hidden">
                        <label class="checkbox-inline">
                        <input type="checkbox" name="checkStatus" id="checkStatus" value="1"> Telah Direviu</label>
                    </div>
                </div>
                <div class="form-group">
                  <label for="txt_nama_pengusul" class="col-sm-3 control-label" align='left'>Nama Pengusul :</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="txt_nama_pengusul" name="txt_nama_pengusul" readonly>
                  </div>
                </div>
                <div class="form-group hidden">
                  <label class="control-label col-sm-3 text-left" for="id_unit">Unit Pelaksana :</label>
                  <div class="col-sm-8">
                      <select class="form-control id_Unit" name="id_unit" id="id_unit"></select>
                  </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="judul_usulan">Judul Usulan :</label>
                      <div class="col-sm-8">
                        <input type="name" class="form-control" id="judul_usulan" rows="2" readonly>
                      </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="uraian_usulan">Uraian Usulan :</label>
                      <div class="col-sm-8">
                        <textarea type="name" class="form-control" id="uraian_usulan" rows="3" readonly></textarea>
                      </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="volume_usulan">Volume & Anggaran :</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control number" id="volume_usulan" name="volume_usulan" style="text-align: right;" readonly>
                    </div>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="id_satuan_usulan" name="id_satuan_usulan" style="text-align: center;" readonly>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control number hidden" id="pagu_usulan" name="pagu_usulan" style="text-align: right;" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="volume_usulan">Volume & Anggaran TL :</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control number" id="volume_usulan_tl" name="volume_usulan_tl" style="text-align: right;">
                    </div>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="id_satuan_usulan_tl" name="id_satuan_usulan_tl" style="text-align: center;" readonly>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control number" id="pagu_usulan_tl" name="pagu_usulan_tl" style="text-align: right;">
                    </div>
                </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="kecamatan">Lokasi Usulan :</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" id="kecamatan" name="kecamatan" style="text-align: center;" readonly>
                    </div>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" id="desa" name="desa" style="text-align: center;" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-3" for="uraian_aktivitas">Referensi Aktivitas:</label>
                      <div class="col-sm-8">
                        <input type="hidden" class="form-control" id="id_aktivitas_renja" name="id_aktivitas_renja">
                        <input type="hidden" class="form-control" id="id_aktivitas_forum" name="id_aktivitas_forum">
                        <textarea type="name" class="form-control" id="uraian_aktivitas" rows="3" disabled></textarea>
                      </div>
                      <span class="btn btn-primary" id="btnCariAktivitas" name="btnCariAktivitas"><i class="fa fa-search fa-fw fa-lg"></i></span>
                  </div>
                  <div class="form-group" id="divStatusUsulan">
                  <label for="status_tl" class="col-sm-3 control-label" align='left'>Status Tindak Lanjut :</label>
                  <div class="col-sm-4" id="myRadio">
                      <label class="radio">
                        <input type="radio" class="status_tl" name="status_tl" id="status_tl" value="0">Belum Di-TL
                      </label>
                      <label class="radio">
                        <input type="radio" class="status_tl" name="status_tl" id="status_tl" value="1">Diakomodir
                      </label>
                  </div>
                  <div class="col-sm-4" id="myRadio">
                      <label class="radio hidden">
                        <input type="radio" class="status_tl hidden" name="status_tl" id="status_tl" value="2">Diakomodir Forum
                      </label>
                      <label class="radio">
                        <input type="radio" class="status_tl" name="status_tl" id="status_tl" value="3">Tidak Dapat di-TL
                      </label>
                  </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-3" for="keterangan_status">Keterangan Tidak Lanjut :</label>
                      <div class="col-sm-8">
                        <textarea type="name" class="form-control" id="keterangan_status" rows="3"></textarea>
                      </div>
                  </div>
              </form>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusUsulan">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button id="btnUsulan" type="button" class="btn btn-sm btn-success btn-labeled" data-dismiss="modal"><span class="btn-label"><i class="fa fa-floppy-o fa-fw fa-lg"></i></span>Simpan</button>
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

<div id="ModalCariAktivitas" class="modal fade" role="dialog" tabindex="-1" data-focus-on="input:first" data-backdrop="static">
  <div class="modal-dialog modal-lg"  >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4>Daftar Aktivitas dalam Rancangan Renja</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
          <div class="form-group">
            <div class="col-sm-12">
              <table id='tblCariAktivitas' class="table display table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                    <th style="text-align: center; vertical-align:middle">Uraian Kegiatan Renja</th>
                    <th style="text-align: center; vertical-align:middle">Uraian Aktivitas Renja</th>
                    <th width="15%" style="text-align: center; vertical-align:middle">Pagu Aktivitas Renja</th>
                    <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
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
          <div class="col-sm-2 text-left idbtnHapusKeg"></div>
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
<script type="text/javascript">
$(document).ready(function() {
  var id_tahun_temp = {{Session::get('tahun')}};

  $('.nomor').number(true,0,'', '');
  $('[data-toggle="popover"]').popover();

  var pokir_tbl, rincian_tbl, lokasi_tbl;
  var pokir_temp, rincian_temp, lokasi_temp;

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
}

$('.number').number(true,2,',', '.');

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
    url: '../pokir/getUnit',
    dataType: "json",

    success: function(data) {
      var j = data.length;
      var post, i;

      $('select[name="id_unit_pokir"]').empty();
      $('select[name="id_unit_pokir"]').append('<option value="-1">---Pilih Unit---</option>');

      for (i = 0; i < j; i++) {
        post = data[i];
        $('select[name="id_unit_pokir"]').append('<option value="'+ post.id_unit +'">'+ post.nm_unit +'</option>');
      }
    }
}); 

$(document).on('click', '#btnProses', function() {
  $.ajax({
    type: 'post',
    url: './importPokirUnit',
    data: {
        '_token': $('input[name=_token]').val(),
        'unit_tl' : $('#id_unit_pokir').val(),
    },
    success: function(data) {
      pokir_tbl.ajax.reload();
      if(data.status_pesan==1){
        createPesan(data.pesan,"success");
        } else {
        createPesan(data.pesan,"danger"); 
        }
    }
  });
});

$(document).on('click', '#btnUnLoad', function() {
  var rows_selected = pokir_tbl.column(0).checkboxes.selected();
  var counts_selected = rows_selected.count(); 
  var rows_data = pokir_tbl.rows({ selected: true }).data(); 
  var counts_data = pokir_tbl.rows({ selected: true }).count();
  if (rows_selected.count() == 0) {
    createPesan("Data belum ada yang dipilih","danger");
    return;
  }; 

  $.each(rows_selected, function(index, rowId){
    var id_pokir_tl=rowId;
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    }); 
    $.ajax({
          type: 'post',
          url: './unloadDataUnit',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_pokir_unit' : id_pokir_tl,              
              'status_data' : rows_data[index].status_data,
          },
          success: function(data) {
            pokir_tbl.ajax.reload();
            if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
          }
    });
  });
  e.preventDefault();
});

$(document).on('click', '#btnPosting', function() {
  var rows_selected = pokir_tbl.column(0).checkboxes.selected();
  var counts_selected = rows_selected.count(); 
  var rows_data = pokir_tbl.rows({ selected: true }).data(); 
  var counts_data = pokir_tbl.rows({ selected: true }).count();
  if (rows_selected.count() == 0) {
    createPesan("Data belum ada yang dipilih","danger");
    return;
  }; 

  $.each(rows_selected, function(index, rowId){
    var id_pokir_tl=rowId;
    if (rows_data[index].status_data == 1) {
      var status_data_tl = 0;
    } else {
      var status_data_tl = 1;
    }
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    }); 
    $.ajax({
          type: 'post',
          url: './PostingUnit',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_pokir_unit' : id_pokir_tl,
              'status_data' : status_data_tl,
          },
          success: function(data) {
            pokir_tbl.ajax.reload();
            if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
          }
    });
  });
  e.preventDefault();
});

$('#tblTLPokir').DataTable({
  // dom : 'bfrtip',
  autoWidth : false,
  bDestroy: true
});

function LoadTblRincian(id_pokir,id_unit){
  pokir_tbl=$('#tblTLPokir').DataTable( {
    processing: true,
    serverSide: true,
    autoWidth : false,
    "ajax": {"url": "./getDataUnit/"+id_pokir+"/"+id_unit},
    "language": {
            "decimal": ",",
            "thousands": "."},   
    'columnDefs': [
       { 'targets': 0,
         'checkboxes': {'selectRow': true } },
       { "targets": 1, "width": 10 }
      ],
    'select': { 'style': 'multi' },
    "columns": [
          { data: 'id_pokir_unit', sClass: "dt-center"},
          { data: 'no_urut', sClass: "dt-center"},
          { data: 'nama_pengusul'},
          { data: 'id_judul_usulan'},
          { data: 'nama_kecamatan', sClass: "dt-center"},
          { data: 'nama_desa', sClass: "dt-center"},
          { data: 'status_usulan','searchable': false, 'orderable':false, sClass: "dt-center",
              render: function(data, type, row,meta) {
              return '<div style="font-size:18px;"><span class="'+row.tl_color+'">'+row.tl_text+'</span></div>';
            }},
          { data: 'icon','searchable': false, 'orderable':false, sClass: "dt-center",
              render: function(data, type, row,meta) {
              return '<i class="'+row.status_icon+'" style="font-size:16px;color:'+row.warna+';"/>';
            }},
          { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
        ],
    bDestroy: true
  } );
}

$( "#id_unit_pokir" ).change(function() {
  LoadTblRincian($('#tahun_rkpd').val(),$('#id_unit_pokir').val());
});

var cariAktivitas
$(document).on('click', '#btnCariAktivitas', function() {    
  $('#ModalCariAktivitas').modal('show');

  cariAktivitas = $('#tblCariAktivitas').DataTable( {
    processing: true,
    serverSide: true,
    dom: 'bfrtip',
    autoWidth : false,
    "ajax": {"url": "./getDataAktivitas/"+$('#tahun_rkpd').val()+"/"+$('#id_unit_pokir').val()},
    "columns": [
          { data: 'no_urut', sClass: "dt-center"},
          { data: 'uraian_program_renstra'},
          { data: 'uraian_aktivitas_kegiatan'},
          { data: 'pagu_aktivitas', sClass: "dt-right",
                  render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
          { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
        ],
    "order": [[0, 'asc']],
    "bDestroy": true 
  });
});

$('#tblCariAktivitas tbody').on( 'dblclick', 'tr', function () {

    var data = cariAktivitas.row(this).data();

    document.getElementById("id_aktivitas_renja").value = data.id_aktivitas_renja;
    document.getElementById("id_aktivitas_forum").value = data.id_aktivitas_renja;
    document.getElementById("uraian_aktivitas").value = data.uraian_aktivitas_kegiatan;

    $('#ModalCariAktivitas').modal('hide');    

});

$(document).on('click', '#btnPilihAktivitas', function() {

  var data = cariAktivitas.row( $(this).parents('tr') ).data();

  document.getElementById("id_aktivitas_renja").value = data.id_aktivitas_renja;
  document.getElementById("id_aktivitas_forum").value = data.id_aktivitas_renja;
  document.getElementById("uraian_aktivitas").value = data.uraian_aktivitas_kegiatan;

  $('#ModalCariAktivitas').modal('hide');    

});

function getStatusTL(){
  var xCheck = document.querySelectorAll('input[name="status_tl"]:checked');
  var xyz = [];
  for(var x = 0, l = xCheck.length; x < l;  x++)
    { xyz.push(xCheck[x].value); }
  var xvalues = xyz.join('');
  return xvalues;
};

var status_usulan;

$(document).on('click', '#edit-idenpokir', function() {

  var data = pokir_tbl.row( $(this).parents('tr') ).data();

  $('#btnUsulan').removeClass('addUsulan');
  $('#btnUsulan').addClass('editUsulan');
  $('.form-horizontal').show();
  $('.modal-title').text('Tindak Lanjut Pokok-Pokok Pemikiran Dewan');

  $('#id_pokir_usulan').val(data.id_pokir_usulan);
  $('#id_pokir_lokasi').val(data.id_pokir_lokasi);
  $('#id_pokir').val(data.id_pokir);
  $('#id_pokir_tl').val(data.id_pokir_tl);
  $('#id_pokir_unit').val(data.id_pokir_unit);
  $('#no_urut_usulan').val(data.no_urut);
  $('#txt_nama_pengusul').val(data.nama_pengusul);
  $('#id_unit').val(data.unit_tl);
  $('#judul_usulan').val(data.id_judul_usulan);
  $('#uraian_usulan').val(data.diskripsi_usulan);
  $('#volume_usulan').val(data.volume);
  $('#id_satuan_usulan').val(data.uraian_satuan);
  $('#pagu_usulan').val(data.jml_anggaran);
  $('#volume_usulan_tl').val(data.volume_tl);
  $('#id_satuan_usulan_tl').val(data.uraian_satuan);
  $('#pagu_usulan_tl').val(data.pagu_tl);
  $('#kecamatan').val(data.nama_kecamatan);
  $('#desa').val(data.nama_desa);
  document.frmModalUsulan.status_tl[data.status_tl].checked=true;
  $('#keterangan_status').val(data.keterangan_status);
  $('#id_aktivitas_renja').val(data.id_aktivitas_renja);
  $('#id_aktivitas_forum').val(data.id_aktivitas_forum);
  $('#uraian_aktivitas').val(data.uraian_aktivitas_kegiatan);

  // if(data.status_data==1){
  //   $('#checkStatus').prop('checked',true);
  // } else {
  //   $('#checkStatus').prop('checked',false);
  // };

  status_usulan = data.status_data;

  $('#ModalUsulan').modal('show');
});

$('.modal-footer').on('click', '.editUsulan', function() {
  // if (document.getElementById("checkStatus").checked){
  //   check_data = 1
  // } else {
  //   check_data = 0
  // }

  $.ajaxSetup({
     headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });

    $.ajax({
      type: 'post',
      url: './editPokirUnit',
      data: {
          '_token': $('input[name=_token]').val(),
          'id_pokir_unit' : $('#id_pokir_unit').val(),
          'status_tl' : getStatusTL(),
          'keterangan_status' : $('#keterangan_status').val(),
          'status_data' : status_usulan,
          'id_aktivitas_renja' : $('#id_aktivitas_renja').val(),
          'id_aktivitas_forum' : $('#id_aktivitas_forum').val(),
          'volume_tl' : $('#volume_usulan_tl').val(),
          'pagu_tl' : $('#pagu_usulan_tl').val(),
      },
      success: function(data) {
        pokir_tbl.ajax.reload();
        if(data.status_pesan==1){
          createPesan(data.pesan,"success");
        } else {
          createPesan(data.pesan,"danger"); 
        }
      }
    });     
});

$(document).on('click', '.printPokir', function() {
  window.open('../printTLUnitPokir');
});


});
</script>
@endsection


