<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?php
                $this->title = ' Data Pokok-Pokok Pikiran DPRD ';
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
            <p><h2 class="panel-title">Detail Data Pokok-Pokok Pikiran DPRD</h2></p>
          </div>

          <div class='panel-body'>
          <div class='tabs-x tabs-above tab-bordered tabs-krajee'>
                <ul class="nav nav-tabs" role="tablist">
                    <li id="tab-pokir" class="active"><a href="#pokir" role="tab" data-toggle="tab">Identitas Pengusul</a></li>
                    <li id="tab-uraian"><a href="#uraian" role="tab-kv" data-toggle="tab">Uraian Pokok Pikiran</a></li>
                    <li id="tab-lokasi"><a href="#lokasi" role="tab-kv" data-toggle="tab">Lokasi Usulan</a></li>
                </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="pokir">
                <br>          
                  <a class="btn btn-labeled btn-success addPokir" data-toggle="modal"><span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span> Tambah Pokok Pikiran</a>
                  {{-- <a class="btn btn-labeled btn-info btnPrintPokir" data-toggle="modal"><span class="btn-label"><i class="fa fa-print fa-fw fa-lg"></i></span> Cetak Pokok-Pokok Pemikiran</a> --}}
                  <div class="btn-group">
                      <button type="button" class="btn btn-info dropdown-toggle btn-labeled" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown"><span class="btn-label"><i class="fa fa-print fa-fw fa-lg"></i></span>Cetak Pokok Pikiran <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li>
                                  <a class="dropdown-item btnPrintPokir" ><i class="fa fa-print fa-fw fa-lg text-success"></i> XLS Pokok Pikiran</a>
                                </li> 
                                <li>
                                  <a class="dropdown-item btnPrintUsulanPokir" ><i class="fa fa-print fa-fw fa-lg text-info"></i> Cetak Usulan Pokok Pikiran</a>
                                </li>                     
                            </ul>
                    </div>
                    
                    {{-- <div class="table-responsive"> --}}
                    <table id="tblPokir" class="table display table-striped table-bordered table-responsive"  width="100%">
                          <thead>
                              <tr>
                                <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                                <th width="5%" style="text-align: center; vertical-align:middle">Tahun Usulan</th>
                                <th width="35%" style="text-align: center; vertical-align:middle">Asal Pengusul</th>
                                <th style="text-align: center; vertical-align:middle">Nama Pengusul</th>
                                <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                          </tbody>
                    </table>
                  {{-- </div> --}}
                </div>
                <div class="tab-pane fade in" id="uraian">
                <br>          
                  <p><a class="btn btn-labeled btn-success" data-toggle="modal" id="addUraian"><span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span> Tambah Uraian Pemikiran</a></p>
                    {{-- <div class="table-responsive"> --}}
                    <table id="tblUraian" class="table table-striped display compact table-bordered table-responsive"  width="100%">
                          <thead>
                              <tr>
                                <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                                <th width="25%" style="text-align: center; vertical-align:middle">Judul Usulan</th>
                                <th style="text-align: center; vertical-align:middle">Uraian Usulan</th>
                                {{-- <th width="15%" style="text-align: center; vertical-align:middle">Jumlah Anggaran</th> --}}
                                <th width="15%" style="text-align: center; vertical-align:middle">Jumlah Output</th>
                                <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                          </tbody>
                    </table>
                  {{-- </div> --}}
                </div>
                <div class="tab-pane fade in" id="lokasi">
                <br>          
                  <p><a class="btn btn-labeled btn-success" data-toggle="modal" id="btnAddLokasi"><span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span> Tambah Lokasi</a></p>
                    {{-- <div class="table-responsive"> --}}
                    <table id="tblLokasi" class="table display table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
                          <thead>
                              <tr>
                                <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                                <th style="text-align: center; vertical-align:middle">Nama Kecamatan</th>
                                <th style="text-align: center; vertical-align:middle">Nama Desa</th>
                                <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                          </tbody>
                    </table>
                  {{-- </div> --}}
                </div>
            </div>          
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<!--Modal Tambah Pokir -->

<div id="TambahPokir" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" >
  <div class="modal-dialog modal-lg"  >
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Identitas Pengusul Pokok Pikiran</h3>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" autocomplete='off' action="" method="post" onsubmit="return false;">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="id_pokir" id="id_pokir">        
          <div class="form-group">
            <label for="txt_tahun" class="col-sm-4 control-label" align='left'>Tahun dan Tanggal Pengusulan :</label>
            <div class="col-sm-2">
              <input type="text" class="form-control number" id="txt_tahun" name="txt_tahun" required="required" disabled="">
            </div>            
            <input type="hidden" class="form-control" name="txt_tgl_usul1" id="txt_tgl_usul1">
            <div class="form-group has-feedback">
              <div class="col-sm-4">
                <input type="text" class="form-control date-picker" id="txt_tgl_usul" name="txt_tgl_usul" required="required" >
                <span>
                  <i class="fa fa-calendar fa-fw fa-lg form-control-feedback" style="color:blue;"></i>
                </span>
                
              </div>
            </div>
          </div>                              
          <div class="form-group">
            <label for="txt_asal_usul" class="col-sm-4 control-label" align='left'>Asal dan Jabatan Pengusul :</label>
            <div class="col-sm-4">
              <select class="form-control" name="txt_asal_usul" id="txt_asal_usul">
                  <option value="0">Fraksi</option>
                  <option value="1">Pimpinan</option>
                  <option value="2">Badan Musyawarah</option>
                  <option value="3">Komisi</option>
                  <option value="4">Badan Legislasi Daerah</option>
                  <option value="5">Badan Anggaran</option>
                  <option value="6">Badan Kehormatan</option>
                  <option value="7">Panitia Ad Hoc</option>
                  <option value="9">Kelangkapan Dewan Lainnya</option>
              </select>
            </div>
            <div class="col-sm-3">
              <select class="form-control" name="txt_jabat_usul" id="txt_jabat_usul">
                  <option value="0">Ketua</option>
                  <option value="1">Wakil Ketua</option>
                  <option value="2">Sekretaris</option>
                  <option value="3">Bendahara</option>
                  <option value="4">Anggota</option>
              </select>
            </div>
          </div>  
          <div class="form-group has-feedback">
            <label for="txt_nama_pengusul" class="col-sm-4 control-label" align='left'>Nama Pengusul :</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="txt_nama_pengusul" name="txt_nama_pengusul" required="required">
              {{-- <span class="form-control-feedback">
                <i id="btnTest" class="fa fa-search fa-fw fa-lg form-control-feedback" style="color:blue;"></i>
              </span> --}}
            </div>
          </div>
          
          <div class="form-group">
            <label for="txt_no_dewan" class="col-sm-4 control-label" align='left' >Nomor Anggota :</label>
            <div class="col-sm-3">
              <input type="text" class="form-control " id="txt_no_dewan" name="txt_no_dewan">
            </div>
          </div>
          <div class="form-group">
                    <label class="control-label col-sm-4" for="media_pokir">Media Penyampaian Pokir :</label>
                    <div class="col-sm-5">
                        <select type="text" class="form-control" id="media_pokir" name="media_pokir">
                          <option value="1">Surat</option>
                          <option value="2">Email</option>
                          <option value="3">Notulen Rapat</option>
                          <option value="4">Telepon</option>
                          <option value="5">Pesan Singkat</option>
                          <option value="6">Lisan</option>
                          <option value="0">Lainnya</option>
                        </select>
                    </div>
                </div>         
        </form>
      </div>
        <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusKeg">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-sm btn-success btn-labeled btnPokir" data-dismiss="modal">
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

  <!--Modal Status Perkada -->
  <div id="HapusPokir" class="modal fade" role="dialog" data-backdrop="static" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Posting</h4>
        </div>
        <div class="modal-body">
            <div class="alert alert-danger deleteContent">
                <input type="hidden" name="id_pokir_hapus" id="id_pokir_hapus">  
                <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border"  style="color:red;" aria-hidden="true"></i>
                Yakin akan menghapus Data Pokir, ini ?                
                <br>
                <br>
                <strong>Proses Posting Tidak dapat diulangi, Cek lagi sebelum memposting ! </strong> 
          </div>
        </div>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusKeg">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-sm btn-danger btnHapusPokir btn-labeled" data-dismiss="modal">
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
                <input type="hidden" id="id_pokir_rincian" name="id_pokir_rincian">
                <div class="form-group">
                    <label class="control-label col-sm-3" for="volume_usulan">No Urut :</label>
                    <div class="col-sm-3">
                          <input type="text" class="form-control number" id="no_urut_usulan" name="no_urut_usulan">
                    </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3 text-left" for="id_unit">Unit Pelaksana :</label>
                  <div class="col-sm-8">
                      <select class="form-control id_Unit" name="id_unit" id="id_unit"></select>
                  </div>
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
                    <label class="control-label col-sm-3" for="volume_usulan">Volume Usulan :</label>
                    <div class="col-sm-2">
                          <input type="text" class="form-control number" id="volume_usulan" name="volume_usulan">
                    </div>
                    <div class="col-sm-4">
                      <select type="text" class="form-control" id="id_satuan_usulan" name="id_satuan_usulan"></select>
                    </div>
                  </div>
                  <div class="form-group hidden">
                    <label class="control-label col-sm-3" for="pagu_usulan">Anggaran Usulan :</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control number" id="pagu_usulan" name="pagu_usulan">                    
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
            <h4>Hapus Rincian Usulan Pokok-Pokok Pemikiran</h4>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id_usulan_hapus" name="id_usulan_hapus">
            <div class="alert alert-danger deleteContent">
              <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border"  style="color:red;" aria-hidden="true"></i>
                Yakin akan menghapus uraian dari Pokok - pokok pemikiran dengan judul : <strong><span id="ur_usulan_hapus"></span></strong> ?
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

  $('.number').number(true,0,'', '');
  $('#volume_usulan').number(true,2,',', '.');
  

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

$.ajax({
    type: "GET",
    url: './admin/parameter/getUnit',
    dataType: "json",

    success: function(data) {

          var j = data.length;
          var post, i;

          $('select[name="id_unit"]').empty();
          $('select[name="id_unit"]').append('<option value="-1">---Pilih Unit---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="id_unit"]').append('<option value="'+ post.id_unit +'">'+ post.nm_unit +'</option>');
          }
          }
}); 

$.ajax({
    type: "GET",
    url: './pokir/getDesaAll',
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

$( "#id_kecamatan" ).change(function() {

  $('#id_desa').removeAttr("disabled");

  $.ajax({
    type: "GET",
    url: './pokir/getDesa/'+$( "#id_kecamatan" ).val(),
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

$.ajax({
          type: "GET",
          url: './admin/parameter/getRefSatuan',
          dataType: "json",
          success: function(data) {

          var j = data.length;
          var post, i;

          $('select[name="id_satuan_usulan"]').empty();
          $('select[name="id_satuan_usulan"]').append('<option value="0">---Pilih Satuan---</option>');

          for (i = 0; i < j; i++) {
              post = data[i];
              $('select[name="id_satuan_usulan"]').append('<option value="'+ post.id_satuan +'">'+ post.uraian_satuan +'</option>');
            }
              
          }
      });

  pokir_tbl=$('#tblPokir').DataTable( {
    processing: true,
    serverSide: true,
    dom : 'BfRtip',
    autoWidth : false,
    "ajax": {"url": "./pokir/getData/"+id_tahun_temp},
    "language": {
            "decimal": ",",
            "thousands": "."},
    "columns": [
          { data: 'no_urut', sClass: "dt-center"},
          { data: 'id_tahun', sClass: "dt-center"},
          { data: 'display_pengusul'},
          { data: 'nama_pengusul'},
          { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
        ],
    bDestroy: true
  });

$('#tblUraian').DataTable({
  dom : 'BfRtip',
  autoWidth : false,
  bDestroy: true
});

$('#tblLokasi').DataTable({
  dom : 'BfRtip',
  autoWidth : false,
  bDestroy: true
});

function LoadTblRincian(id_pokir){
  rincian_tbl=$('#tblUraian').DataTable( {
    processing: true,
    serverSide: true,
    dom : 'BfRtip',
    autoWidth : false,
    "ajax": {"url": "./pokir/getUsulanPokir/"+id_pokir},
    "language": {
            "decimal": ",",
            "thousands": "."},
    "columns": [
          { data: 'no_urut', sClass: "dt-center"},          
          { data: 'id_judul_usulan'},
          { data: 'diskripsi_usulan'},
          // { data: 'jml_anggaran', sClass: "dt-right",
          //     render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
          { data: 'volume', sClass: "dt-center",width:"15px",
              render: $.fn.dataTable.render.number( '.', ',', 0, '' )},
          { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
        ],
    bDestroy: true
  } );
};

$('#tblPokir tbody').on( 'dblclick', 'tr', function () {

  var data = pokir_tbl.row(this).data();

  pokir_temp=data.id_pokir

  $('.nav-tabs a[href="#uraian"]').tab('show');    
  LoadTblRincian(pokir_temp);

});

$(document).on('click', '#btnViewRincian', function() {
  var data = pokir_tbl.row( $(this).parents('tr') ).data();

  pokir_temp=data.id_pokir

  $('.nav-tabs a[href="#uraian"]').tab('show');    
  LoadTblRincian(pokir_temp);

})

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

})

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
}


$(document).on('click', '.addPokir', function() {
      $('.btnPokir').addClass('addIdentitas');
      $('.btnPokir').removeClass('editIdentitas');
      $('.form-horizontal').show();
      $('#id_pokir').val(null);
      $('#txt_tahun').val(id_tahun_temp);
      $('#txt_tgl_usul').val(null);
      $('#txt_asal_usul').val(0);
      $('#txt_jabat_usul').val(0);
      $('#txt_nama_pengusul').val(null);
      $('#txt_no_dewan').val(null);
      $('#media_pokir').val(1);
      $('#TambahPokir').modal('show');
    });

    $('.modal-footer').on('click', '.addIdentitas', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: './pokir/addIdentitas',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_tahun' : id_tahun_temp,
              'tanggal_pengusul' : $('#txt_tgl_usul1').val(),
              'asal_pengusul' : $('#txt_asal_usul').val(),
              'jabatan_pengusul' : $('#txt_jabat_usul').val(),
              'nama_pengusul' : $('#txt_nama_pengusul').val(),
              'nomor_anggota' : $('#txt_no_dewan').val(),
              'media_pokir' : $('#media_pokir').val(),
          },
          success: function(data) {
              $('#tblPokir').DataTable().ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
          }
      });
    });

   $(document).on('click', '#edit-idenpokir', function() {

    var data = pokir_tbl.row( $(this).parents('tr') ).data();

      $('.btnPokir').removeClass('addIdentitas');
      $('.btnPokir').addClass('editIdentitas');
      $('.form-horizontal').show();
      $('#id_pokir').val(data.id_pokir);
      $('#txt_tahun').val(data.id_tahun);
      $('#txt_tgl_usul').val(formatTgl(data.tanggal_pengusul));
      $('#txt_tgl_usul1').val(data.tanggal_pengusul);
      $('#txt_asal_usul').val(data.asal_pengusul);
      $('#txt_jabat_usul').val(data.jabatan_pengusul);
      $('#txt_nama_pengusul').val(data.nama_pengusul);
      $('#txt_no_dewan').val(data.nomor_anggota);
      $('#media_pokir').val(data.media_pokir);
      $('#TambahPokir').modal('show');
    });

   $('.modal-footer').on('click', '.editIdentitas', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: './pokir/editIdentitas',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_pokir' : $('#id_pokir').val(),
              'id_tahun' : $('#txt_tahun').val(),
              'tanggal_pengusul' : $('#txt_tgl_usul1').val(),
              'asal_pengusul' : $('#txt_asal_usul').val(),
              'jabatan_pengusul' : $('#txt_jabat_usul').val(),
              'nama_pengusul' : $('#txt_nama_pengusul').val(),
              'nomor_anggota' : $('#txt_no_dewan').val(),
              'media_pokir' : $('#media_pokir').val(),
          },
          success: function(data) {
              $('#tblPokir').DataTable().ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
          }
      });
    });

$(document).on('click', '#hapus-pokir', function() {

  var data = pokir_tbl.row( $(this).parents('tr') ).data();

  $('.btnHapusPokir').removeClass('deldentitas');
  $('.btnHapusPokir').addClass('delIdentitas');
  $('#id_pokir_hapus').val(data.id_pokir);

  $('#HapusPokir').modal('show');

});

$('.modal-footer').on('click', '.delIdentitas', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: './pokir/hapusIdentitas',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_pokir' : $('#id_pokir_hapus').val(),
          },
          success: function(data) {
              $('#tblPokir').DataTable().ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              } 
          }
      });
    });

$('#addUraian').click(function(){
  $.ajax({
          type: 'get',
          url: './pokir/getNoUsulan/'+pokir_temp,
          success: function(data) {
              $('#btnUsulan').addClass('addUsulan');
              $('#btnUsulan').removeClass('editUsulan');
              $('.form-horizontal').show();
              $('.modal-title').text('Tambah Uraian Pokok-Pokok Pemikiran Dewan');
              $('#id_pokir_usulan').val(null);
              $('#id_pokir_rincian').val(pokir_temp);
              $('#no_urut_usulan').val(data[0].no_max);
              $('#judul_usulan').val(null);
              $('#uraian_usulan').val(null);
              $('#volume_usulan').val(0);
              $('#id_satuan_usulan').val(0);
              $('#pagu_usulan').val(0);
              $('#id_unit').val(0);
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
          url: './pokir/addUsulan',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_pokir' : $('#id_pokir_rincian').val(),
              'id_unit' : $('#id_unit').val(),
              'no_urut' : $('#no_urut_usulan').val(),
              'id_judul_usulan' : $('#judul_usulan').val(),
              'diskripsi_usulan' : $('#uraian_usulan').val(),
              'volume' : $('#volume_usulan').val(),
              'id_satuan' : $('#id_satuan_usulan').val(),
              'jml_anggaran' : $('#pagu_usulan').val(),
          },
          success: function(data) {
              rincian_tbl.ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
          }
      });
});

$(document).on('click', '#btnEditUsulanPokir', function(){

  var data = rincian_tbl.row( $(this).parents('tr') ).data();

  $('#btnUsulan').removeClass('addUsulan');
  $('#btnUsulan').addClass('editUsulan');
  $('.form-horizontal').show();
  $('.modal-title').text('Edit Uraian Pokok-Pokok Pemikiran Dewan');
  $('#id_pokir_usulan').val(data.id_pokir_usulan);
  $('#id_pokir_rincian').val(data.id_pokir);
  $('#no_urut_usulan').val(data.no_urut);
  $('#judul_usulan').val(data.id_judul_usulan);
  $('#uraian_usulan').val(data.diskripsi_usulan);
  $('#volume_usulan').val(data.volume);
  $('#id_satuan_usulan').val(data.id_satuan);
  $('#pagu_usulan').val(data.jml_anggaran);  
  $('#id_unit').val(data.id_unit);

  $('#btnHapusUsulan').show();
  $('#ModalUsulan').modal('show');

});

$('.modal-footer').on('click', '.editUsulan', function(){
  $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: './pokir/editUsulan',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_pokir' : $('#id_pokir_rincian').val(),
              'id_pokir_usulan' : $('#id_pokir_usulan').val(),
              'no_urut' : $('#no_urut_usulan').val(),
              'id_unit' : $('#id_unit').val(),
              'id_judul_usulan' : $('#judul_usulan').val(),
              'diskripsi_usulan' : $('#uraian_usulan').val(),
              'volume' : $('#volume_usulan').val(),
              'id_satuan' : $('#id_satuan_usulan').val(),
              'jml_anggaran' : $('#pagu_usulan').val(),
          },
          success: function(data) {
              rincian_tbl.ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
          }
      });
});

$(document).on('click', '#btnHapusUsulan', function() {

  $('#id_usulan_hapus').val($('#id_pokir_usulan').val());
  $('#ur_usulan_hapus').text($('#judul_usulan').val());  

  $('#HapusUsulan').modal('show');

});

$(document).on('click', '#btnDelUsulan', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      type: 'post',
      url: './pokir/hapusUsulan',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_pokir_usulan': $('#id_usulan_hapus').val()
      },
      success: function(data) {
        $('#ModalUsulan').modal('hide'); 
        rincian_tbl.ajax.reload();
        createPesan(data.pesan,"info");
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
          url: './pokir/addLokasi',
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
                  url: './pokir/getDesaAll',
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
          url: './pokir/editLokasi',
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
      url: './pokir/hapusLokasi',
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

$("#btnTest").click(function () {
    alert(test);
});

$(document).on('click', '.btnPrintPokir', function() {
  window.open('./printPokir');
});

$(document).on('click', '.m', function() {
  window.open('./printUsulanPokir');
});


});
</script>
@endsection


