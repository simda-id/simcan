<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
                $this->title = 'Penyusunan Rancangan Renja';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = 'modul2';
                $breadcrumb->begin();
                $breadcrumb->add(['label' => 'Renja']);
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
                    <h2 id="judul" class="panel-title"> {{ $this->title }}</h2>
                    {{-- <i class="fa fa-spinner fa-pulse" style="font-size:16px;color:green;"></i> --}}
                </div>
            <div class="panel-body">
                <form name="" class="form-horizontal" role="form" autocomplete='off' action="" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="tahun_rkpd" class="col-sm-3 control-label text-left" align='left'>Tahun Perencanaan :</label>
                        <div class="col-sm-2">                            
                            <input class="form-control text-center" type="text" id="tahun_rkpd" name="tahun_rkpd" value="{{Session::get('tahun')}}" disabled>
                        </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3 text-left" for="id_unit">Unit Penyusun Renstra :</label>
                        <div class="col-sm-5">
                            <select class="form-control id_Unit" name="id_unit" id="id_unit"></select>
                        </div>
                </div>
                </form>
                <div class='tabs-x tabs-above tab-bordered tabs-krajee'>
                    <ul class="nav nav-tabs" role="tablist">
                      <li class="active"><a href="#program" aria-controls="program" role="tab" data-toggle="tab">Program Renja</a></li>
                      <li><a href="#kegiatan" aria-controls="kegiatan" role="tab-kv" data-toggle="tab">Kegiatan Renja</a></li>
                      <li><a href="#aktivitas" aria-controls="aktivitas" role="tab-kv" data-toggle="tab">Aktivitas</a></li>
                      <li><a href="#pelaksana" aria-controls="pelaksana" role="tab-kv" data-toggle="tab">Pelaksana Aktivitas</a></li>
                      <li><a href="#lokasi" aria-controls="lokasi" role="tab-kv" data-toggle="tab">Lokasi</a></li>
                      <li><a href="#belanja" aria-controls="belanja" role="tab-kv" data-toggle="tab">Rincian Belanja</a></li>
                    </ul>
                    
                    <div class="tab-content">
                    <br>
                            <div role="tabpanel" class="tab-pane fade in active" id="program">
                                <div class="col-md-12">
                                    <table id="tblProgram" class="table table-striped table-bordered table-responsive" width="100%">
                                        <thead>
                                            <tr>
                                                <th width='50px' style="text-align: center; vertical-align:middle">No Urut</th>
                                                <th style="text-align: center; vertical-align:middle">Nama Program Renja</th>
                                                <th width='5%' style="text-align: center; vertical-align:middle">Jumlah Kegiatan</th>
                                                <th width='10%' style="text-align: center; vertical-align:middle">Jumlah Pagu</th>
                                                <th width='10%' style="text-align: center; vertical-align:middle">Jumlah Pagu Musrenbang</th>
                                                <th width='5%' style="text-align: center; vertical-align:middle">Jumlah Aktivitas</th>
                                                <th width='5%' style="text-align: center; vertical-align:middle">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>                                        
                                        </tbody>
                                    </table> 
                                </div>  
                            </div>                            
                            <div role="tabpanel" class="tab-pane fade in" id="kegiatan">
                                  <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
                                  <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                      <tbody>
                                        <tr>
                                          <td width="15%" style="text-align: left; vertical-align:top;">Program Renja</td>
                                          <td style="text-align: left; vertical-align:top;"><label id="nm_program_kegrenja" align='left'></label></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                  </form>
                                    <table id="tblKegiatanRenja" class="table table-striped table-bordered table-responsive" width="100%">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" width='50px' style="text-align: center; vertical-align:middle">No Urut</th>
                                                <th rowspan="2" style="text-align: center; vertical-align:middle">Nama Kegiatan Renja</th>
                                                <th colspan="2" width='20%' style="text-align: center; vertical-align:middle">Pagu Kegiatan</th>
                                                <th colspan="3" width='25%' style="text-align: center; vertical-align:middle">Aktivitas</th>
                                                <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">Status</th>
                                                <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">Aksi</th>
                                            </tr>
                                            <tr>
                                                <th width='10%' style="text-align: center; vertical-align:middle">Jumlah</th>
                                                <th width='10%' style="text-align: center; vertical-align:middle">Musrenbang</th>
                                                <th width='5%' style="text-align: center; vertical-align:middle">Jumlah</th>
                                                <th width='10%' style="text-align: center; vertical-align:middle">Pagu AKtivitas</th>
                                                <th width='10%' style="text-align: center; vertical-align:middle">Pagu Musrenbang</th>
                                            </tr>
                                        </thead>
                                        <tbody>                                        
                                        </tbody>
                                    </table>   
                                </div>
                            <div role="tabpanel" class="tab-pane fade in" id="aktivitas">
                                  <div class="add">
                                    <button id="btnTambahAktivitas" type="button" class="add-aktivitas btn btn-labeled btn-sm btn-success">
                                      <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>Tambah Aktivitas</button>
                                  </div>            
                                  <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
                                  <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                      <tbody>
                                        <tr>
                                          <td width="15%" style="text-align: left; vertical-align:top;">Program Renja</td>
                                          <td style="text-align: left; vertical-align:top;"><label id="nm_program_aktivitas" align='left'></label></td>
                                        </tr>
                                        <tr>
                                          <td width="15%" style="text-align: left; vertical-align:top;">Kegiatan Renja</td>
                                          <td style="text-align: left; vertical-align:top;"><label id="nm_kegiatan_aktivitas" align='left'></label></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                  </form>
                                    <table id="tblAktivitas" class="table table-striped table-bordered table-responsive" width="100%">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" width='50px' style="text-align: center; vertical-align:middle">No Urut</th>
                                                <th rowspan="2" style="text-align: center; vertical-align:middle">Nama Ativitas</th>
                                                <th rowspan="2" width='10%' style="text-align: center; vertical-align:middle">Pagu Aktivitas</th>
                                                <th rowspan="2" width='10%' style="text-align: center; vertical-align:middle">Pagu Pelaksana</th>
                                                <th colspan="2" width='10%' style="text-align: center; vertical-align:middle">Musrenbang</th>
                                                <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">Status</th>
                                                <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">Aksi</th>
                                            </tr>
                                            <tr>
                                                <th width='10%' style="text-align: center; vertical-align:middle">Persentase</th>
                                                <th width='10%' style="text-align: center; vertical-align:middle">Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>                                        
                                        </tbody>
                                    </table>   
                                </div>
                              <div role="tabpanel" class="tab-pane fade in" id="pelaksana">
                                  <div class="add">
                                    <button id="btnTambahPelaksana" type="button" class="add-pelaksana btn btn-labeled btn-sm btn-success">
                                      <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>Tambah Pelaksana</button>
                                  </div>
                                  <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
                                  <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                      <tbody>
                                        <tr>
                                          <td width="15%" style="text-align: left; vertical-align:top;">Program Renja</td>
                                          <td style="text-align: left; vertical-align:top;"><label id="nm_program_pelaksana" align='left'></label></td>
                                        </tr>
                                        <tr>
                                          <td width="15%" style="text-align: left; vertical-align:top;">Kegiatan Renja</td>
                                          <td style="text-align: left; vertical-align:top;"><label id="nm_kegiatan_pelaksana" align='left'></label></td>
                                        </tr>
                                        <tr>
                                          <td width="15%" style="text-align: left; vertical-align:top;">Aktivitas Kegiatan</td>
                                          <td style="text-align: left; vertical-align:top;"><label id="nm_aktivitas_pelaksana" align='left'></label></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                  </form>
                                    <table id="tblPelaksana" class="table table-striped table-bordered table-responsive" width="100%">
                                        <thead>
                                            <tr>
                                                <th width='50px' style="text-align: center; vertical-align:middle">No Urut</th>
                                                <th style="text-align: center; vertical-align:middle">Nama Sub Unit Pelaksana</th>
                                                <th width='15%' style="text-align: center; vertical-align:middle">Lokasi Penyelenggaraan</th>
                                                <th width='10%' style="text-align: center; vertical-align:middle">Pagu Anggaran</th>
                                                <th width='10%' style="text-align: center; vertical-align:middle">Jumlah Lokasi</th>
                                                <th width='5%' style="text-align: center; vertical-align:middle">Status</th>
                                                <th width='5%' style="text-align: center; vertical-align:middle">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>                                        
                                        </tbody>
                                    </table>   
                                </div>
                                <div role="tabpanel" class="tab-pane fade in" id="lokasi">
                                  <div class="add">
                                    <button id="btnTambahLokasi" type="button" class="add-lokasi btn btn-labeled btn-sm btn-success">
                                      <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>Tambah Lokasi</button>
                                  </div>
                                  <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
                                  <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                      <tbody>
                                        <tr>
                                          <td width="15%" style="text-align: left; vertical-align:top;">Program Renja</td>
                                          <td style="text-align: left; vertical-align:top;"><label id="nm_program_lokasi" align='left'></label></td>
                                        </tr>
                                        <tr>
                                          <td width="15%" style="text-align: left; vertical-align:top;">Kegiatan Renja</td>
                                          <td style="text-align: left; vertical-align:top;"><label id="nm_kegiatan_lokasi" align='left'></label></td>
                                        </tr>
                                        <tr>
                                          <td width="15%" style="text-align: left; vertical-align:top;">Aktivitas Kegiatan</td>
                                          <td style="text-align: left; vertical-align:top;"><label id="nm_aktivitas_lokasi" align='left'></label></td>
                                        </tr>
                                        <tr>
                                          <td width="15%" style="text-align: left; vertical-align:top;">Sub Unit Pelaksana</td>
                                          <td style="text-align: left; vertical-align:top;"><label id="nm_sub_lokasi" align='left'></label></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                  </form>
                                    <table id="tblLokasi" class="table table-striped table-bordered table-responsive" width="100%">
                                        <thead>
                                            <tr>
                                                <th width='50px' style="text-align: center; vertical-align:middle">No Urut</th>
                                                <th style="text-align: center; vertical-align:middle">Nama Lokasi</th>
                                                <th width='10%' style="text-align: center; vertical-align:middle">Pagu Anggaran</th>
                                                <th width='5%' style="text-align: center; vertical-align:middle">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>                                        
                                        </tbody>
                                    </table>   
                                </div>
                            <div role="tabpanel" class="tab-pane fade in" id="belanja">
                                  {{-- <div class="ui-group-buttons"> --}}
                                    <a id="btnTambahBelanja" type="button" class="add-belanja btn btn-labeled btn-sm btn-success">
                                      <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>Tambah dari SSH</a>
                                    {{-- <div class="or"></div> --}}
                                    <a id="btnTambahBelanjaASB" type="button" class="add-belanjaASB btn btn-labeled btn-sm btn-info">
                                      <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>Tambah dari ASB</a>
                                  {{-- </div> --}}
                                  <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
                                  <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                      <tbody>
                                        <tr>
                                          <td width="15%" style="text-align: left; vertical-align:top;">Program Renja</td>
                                          <td style="text-align: left; vertical-align:top;"><label id="nm_program_belanja" align='left'></label></td>
                                        </tr>
                                        <tr>
                                          <td width="15%" style="text-align: left; vertical-align:top;">Kegiatan Renja</td>
                                          <td style="text-align: left; vertical-align:top;"><label id="nm_kegiatan_belanja" align='left'></label></td>
                                        </tr>
                                        <tr>
                                          <td width="15%" style="text-align: left; vertical-align:top;">Aktivitas Kegiatan</td>
                                          <td style="text-align: left; vertical-align:top;"><label id="nm_aktivitas_belanja" align='left'></label></td>
                                        </tr>
                                        <tr>
                                          <td width="15%" style="text-align: left; vertical-align:top;">Sub Unit Pelaksana</td>
                                          <td style="text-align: left; vertical-align:top;"><label id="nm_sub_belanja" align='left'></label></td>
                                        </tr>
                                        <tr>
                                          <td width="15%" style="text-align: left; vertical-align:top;">Lokasi</td>
                                          <td style="text-align: left; vertical-align:top;"><label id="nm_lokasi_belanja" align='left'></label></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                  </form>
                                    <table id="tblBelanja" class="table table-striped table-bordered table-responsive" width="100%">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" width='50px' style="text-align: center; vertical-align:middle">No Urut</th>
                                                <th rowspan="2" style="text-align: center; vertical-align:middle">Item Belanja</th>
                                                <th rowspan="2" width='15%' style="text-align: center; vertical-align:middle">Kode Rekening</th>
                                                <th colspan="2" width='10%' style="text-align: center; vertical-align:middle">Output</th>
                                                <th colspan="2" width='20%' style="text-align: center; vertical-align:middle">Jumlah Belanja</th>
                                                <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">Aksi</th>
                                            </tr>
                                            <tr>
                                                <th width='5%' style="text-align: center; vertical-align:middle"> 1 </th>
                                                <th width='5%' style="text-align: center; vertical-align:middle"> 2 </th>
                                                <th width='10%' style="text-align: center; vertical-align:middle">Satuan</th>
                                                <th width='10%' style="text-align: center; vertical-align:middle">Total</th>
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
            </div>
        </div>
    </div>
</div>

<div id="ModalKegiatan" class="modal fade" role="dialog" data-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
              <form name="frmModalKegiatan" class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="id_renja_kegiatan" name="id_renja_kegiatan">
                <input type="hidden" id="id_rkpd_ranwal_kegiatan" name="id_rkpd_ranwal_kegiatan">
                <input type="hidden" id="id_renja_program_kegiatan" name="id_renja_program_kegiatan">
                <input type="hidden" id="tahun_renja_kegiatan" name="tahun_renja_kegiatan">
                <input type="hidden" id="id_unit_kegiatan" name="id_unit_kegiatan">
                <div class="form-group">
                  <label class="control-label col-sm-3" for="id">No Urut :</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control number" name="no_urut_kegiatan" id="no_urut_kegiatan" disabled>
                  </div>
                  <div class="col-sm-3 chkKegiatan">
                    <label class="checkbox-inline">
                    <input class="checkKegiatan" type="checkbox" name="checkKegiatan" id="checkKegiatan" value="1"> Telah Direviu</label>
                </div>
                  </div>
                  <div class="form-group lblKegiatanRenja">
                    <label class="control-label col-sm-3" for="title">Uraian Kegiatan Renstra:</label>
                    <div class="col-sm-8">
                      <textarea type="name" class="form-control" id="ur_kegiatan_renstra" rows="3" disabled></textarea>
                    </div>
                  </div>
                  <div class="form-group urKegiatanRef">
                    <label class="control-label col-sm-3" for="title">Uraian Kegiatan Referensi:</label>
                    <div class="col-sm-8">
                      <textarea type="name" class="form-control" id="ur_kegiatan_ref" rows="3" disabled></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                  <label class="control-label col-sm-3" for="title">Uraian Kegiatan Renja:</label>
                  <div class="col-sm-8">
                    <textarea type="name" class="form-control ur_kegiatan_renja" name="ur_kegiatan_renja" id="ur_kegiatan_renja" rows="3" disabled></textarea>
                  </div>
                </div>
                <div class="form-group KetPelaksanaan_keg">
                  <label for="keterangan_status_kegiatan" class="col-sm-3 control-label" align='left'>Keterangan Pelaksanaan :</label>
                  <div class="col-sm-8">
                    <textarea type="text" class="form-control keterangan_status_kegiatan" name="keterangan_status_kegiatan" id="keterangan_status_kegiatan" rows="3" disabled></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="pagu_renja_kegiatan" class="col-sm-3 control-label" align='left'>Pagu Tahun ini :</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control number" id="pagu_renja_kegiatan" name="pagu_renja_kegiatan" disabled >
                  </div>
                </div>
                <div class="form-group">
                  <label for="pagu_musren" class="col-sm-3 control-label" align='left'>Pagu Musrenbang :</label>
                  <div class="col-sm-2">
                    <div class="input-group">
                      <input type="text" class="form-control number" id="persen_musren" name="persen_musren">
                      <span class="input-group-addon" text-align="center"><strong>%</strong></span>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <input type="text" class="form-control number" id="pagu_musren" name="pagu_musren" disabled >
                  </div>
                </div>
              </form>
              <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusKeg">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-sm btn-success btnKegiatan btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i class="glyphicon glyphicon-save"></i></span>Simpan</button>
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
      </div>

<div id="ModalAktivitas" class="modal fade" role="dialog" data-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
              <form name="frmModalAktivitas" class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="id_renja_aktivitas" name="id_renja_aktivitas">
                <input type="hidden" id="id_aktivitas" name="id_aktivitas">
                <input type="hidden" id="tahun_renja_aktivitas" name="tahun_renja_aktivitas">
                <div class="form-group">
                  <label class="control-label col-sm-3" for="id">No Urut :</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control number" name="no_urut_aktivitas" id="no_urut_aktivitas">
                  </div>
                  <div class="col-sm-3 chkAktivitas">
                    <label class="checkbox-inline">
                    <input class="checkAktivitas" type="checkbox" name="checkAktivitas" id="checkAktivitas" value="1"> Telah Direviu</label>
                  </div>
                </div>
                <div class="form-group rbSumberAktivitas"> 
                  <label for="sumber_aktivitas" class="col-sm-3 control-label" align='left'>Asal Aktivitas :</label>
                  <div class="col-sm-6">
                    <label>
                      <input type="radio" class="sumber_aktivitas" name="sumber_aktivitas" id="sumber_aktivitas" value="0"> Analisis Standar Belanja (ASB) 
                    </label>
                    <label>
                      <input type="radio" class="sumber_aktivitas" name="sumber_aktivitas" id="sumber_aktivitas" value="1"> Non Analisis Standar Belanja (ASB)
                    </label>
                  </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="title">Uraian Aktivitas :</label>
                    <div class="col-sm-8">
                      <textarea type="name" class="form-control" id="ur_aktivitas_kegiatan" rows="3"></textarea>
                    </div>
                    <input type="hidden" id="id_aktivitas_asb" name="id_aktivitas_asb">
                    <span class="btn btn-sm btn-primary btnCariASB" id="btnCariASB" name="btnCariASB"><i class="glyphicon glyphicon-search"></i></span>
                </div>
                <div class="form-group rbJenisAktivitas"> 
                  <label for="jenis_aktivitas" class="col-sm-3 control-label" align='left'>Jenis Aktivitas :</label>                 
                  <div class="col-sm-6">
                    <label class="radio-inline">
                      <input type="radio" class="jenis_aktivitas" name="jenis_aktivitas" id="jenis_aktivitas" value="0"> Baru 
                    </label>
                    <label class="radio-inline">
                      <input type="radio" class="jenis_aktivitas" name="jenis_aktivitas" id="jenis_aktivitas" value="1"> Lanjutan
                    </label>
                  </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="title">Sumber Dana :</label>
                    <div class="col-sm-8">
                        <select type="text" class="form-control sumber_dana" id="sumber_dana" name="sumber_dana"></select>
                    </div>
                </div>
                <div class="form-group">
                  <label for="pagu_aktivitas" class="col-sm-3 control-label" align='left'>Pagu Aktivitas :</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control number" id="pagu_aktivitas" name="pagu_aktivitas">
                  </div>
                </div>
                <div class="form-group rbJenisPembahasan"> 
                  <label for="jenis_pembahasan" class="col-sm-3 control-label" align='left'>Jenis Pembahasan :</label>                 
                  <div class="col-sm-6">
                    <label class="radio-inline">
                      <input type="radio" class="jenis_pembahasan" name="jenis_pembahasan" id="jenis_pembahasan" value="0"> Non Musrenbang 
                    </label>
                    <label class="radio-inline">
                      <input type="radio" class="jenis_pembahasan" name="jenis_pembahasan" id="jenis_pembahasan" value="1"> Musrenbang
                    </label>
                  </div>
                </div>
                <div class="form-group inMusrenbang">
                  <label for="pagu_musren_aktivitas" class="col-sm-3 control-label" align='left'>Pagu Musrenbang :</label>
                  <div class="col-sm-2">
                  <div class="input-group">
                    <input type="text" class="form-control number" id="persen_musren_aktivitas" name="persen_musren_aktivitas">
                    <span class="input-group-addon" text-align="center"><strong>%</strong></span>
                  </div>
                  </div>
                  <div class="col-sm-3">
                    <input type="text" class="form-control number" id="pagu_musren_aktivitas" name="pagu_musren_aktivitas" disabled >
                  </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="title">Satuan Output Musrenbang :</label>
                    <div class="col-sm-4">
                        <select type="text" class="form-control" id="id_satuan_publik" name="id_satuan_publik"></select>
                    </div>
                </div>
              </form>
              <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idHapusAktivitas">
                        <button type="button" class="btn btn-sm btn-danger btnHapusAktivitas btn-labeled">
                            <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>Hapus</button>
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-sm btn-success btnAktivitas btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i class="glyphicon glyphicon-save"></i></span>Simpan</button>
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
      </div>

<div id="ModalPelaksana" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form name="frmModalPelaksana" class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" id="id_pelaksana_renja" name="id_pelaksana_renja">
            <input type="hidden" id="id_renja_pelaksana" name="id_renja_pelaksana">
            <input type="hidden" id="id_aktivitas_pelaksana" name="id_aktivitas_pelaksana">
            <input type="hidden" id="tahun_renja_pelaksana" name="tahun_renja_pelaksana">
            <div class="form-group">
              <label class="control-label col-sm-3" for="id">No Urut :</label>
              <div class="col-sm-3">
                <input type="text" class="form-control number" id="no_urut_pelaksana">
              </div>
              <div class="col-sm-3 chkPelaksana">
                    <label class="checkbox-inline">
                    <input class="checkPelaksana" type="checkbox" name="checkPelaksana" id="checkPelaksana" value="1"> Telah Direviu</label>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="title">Sub Unit Pelaksana :</label>
              <div class="col-sm-8">
              <div class="input-group">
                <input type="hidden" id="id_subunit_pelaksana" name="id_subunit_pelaksana">
                <input type="name" class="form-control" id="subunit_pelaksana" rows="2" disabled>
                <div class="input-group-btn">
                <btn class="btn btn-primary btnCariSubUnit" id="btnCariSubUnit" name="btnCariSubUnit"><i class="glyphicon glyphicon-search"></i></btn>
                </div>
              </div>
              </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="title">Lokasi Penyelenggaraan :</label>
                <div class="col-sm-8">
                  <div class="input-group">
                    <input type="hidden" id="id_lokasi_pelaksana" name="id_lokasi_pelaksana">
                    <input type="name" class="form-control" id="nm_lokasi_pelaksana" rows="2" disabled>
                    <div class="input-group-btn">
                      <btn class="btn btn-primary btnCariLokasi" id="btnCariLokasi" name="btnCariLokasi"><i class="glyphicon glyphicon-search"></i></btn>
                    </div>
                  </div>
                </div>
            </div>
          </form>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idHapusPelaksana">
                        <button type="button" class="btn btn-sm btn-danger btnHapusPelaksana btn-labeled">
                            <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>Hapus</button>
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-sm btn-success btnPelaksana btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i class="glyphicon glyphicon-save"></i></span>Simpan</button>
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
    </div>
  </div>

<div id="ModalLokasi" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form name="frmModalLokasi" class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" id="id_pelaksana_lokasi" name="id_pelaksana_lokasi">
            <input type="hidden" id="id_lokasi_renja" name="id_lokasi_renja">
            <input type="hidden" id="tahun_renja_lokasi" name="tahun_renja_lokasi">
            <div class="form-group">
              <label class="control-label col-sm-3" for="id">No Urut :</label>
              <div class="col-sm-3">
                <input type="text" class="form-control number" id="no_urut_lokasi">
              </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="title">Lokasi Aktivitas :</label>
                <div class="col-sm-8">
                  <div class="input-group">
                    <input type="hidden" id="id_lokasi" name="id_lokasi">
                    <input type="hidden" id="jenis_lokasi" name="jenis_lokasi">
                    <input type="name" class="form-control" id="nm_lokasi" rows="2" disabled>
                    <div class="input-group-btn">
                      <btn class="btn btn-primary btnCariLokasi" id="btnCariLokasi" name="btnCariLokasi"><i class="glyphicon glyphicon-search"></i></btn>
                    </div>
                  </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="title">Keterangan Lokasi :</label>
                <div class="col-sm-8">
                      <textarea type="name" class="form-control" id="uraian_lokasi" rows="3"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="volume_1">Volume Output 1 :</label>
                <div class="col-sm-3">
                      <input type="text" class="form-control number" id="volume_1" name="volume_1">
                </div>
                <div class="col-sm-4">
                  <select type="text" class="form-control" id="id_satuan_1" name="id_satuan_1"></select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="volume_2">Volume Output 2 :</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control number" id="volume_2" name="volume_2">                    
                </div>
                <div class="col-sm-4">
                  <select type="text" class="form-control" id="id_satuan_2" name="id_satuan_2"></select>
                </div>
              </div>
          </form>
              <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusLokasi">
                        <button type="button" class="btn btn-sm btn-danger btnHapusLokasi btn-labeled">
                            <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>Hapus</button>
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-sm btn-success btnLokasi btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i class="glyphicon glyphicon-save"></i></span>Simpan</button>
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
  </div>

<div id="ModalBelanja" class="modal fade" role="dialog" data-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
              <form name="frmModalBelanja" class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="id_lokasi_belanja" name="id_lokasi_belanja">
                <input type="hidden" id="id_belanja" name="id_belanja">
                <input type="hidden" id="tahun_renja_belanja" name="tahun_renja_belanja">
                <div class="form-group">
                  <label class="control-label col-sm-3" for="id">No Urut :</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control number" name="no_urut_belanja" id="no_urut_belanja">
                  </div>
                  <div class="col-sm-3 chkBelanja">
                    <label class="checkbox-inline">
                    <input class="checkBelanja" type="checkbox" name="checkBelanja" id="checkBelanja" value="1"> Telah Direviu</label>
                  </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="title">Aktivitas ASB :</label>
                    <input type="hidden" class="form-control" id="id_aktivitas_asb_belanja" name="id_aktivitas_asb_belanja" disabled="">
                    <input type="hidden" class="form-control" id="sumber_belanja" name="sumber_belanja" disabled="">
                    <div class="col-sm-8">
                      <textarea type="name" class="form-control" id="uraian_aktivitas_asb" name="uraian_aktivitas_asb" rows="3" disabled=""></textarea>
                    </div>
                </div> 
                <div class="form-group">
                    <label class="control-label col-sm-3" for="">Zona Wilayah SSH :</label>
                    <div class="col-sm-8">
                        <select type="text" class="form-control zona_ssh" id="zona_ssh" name="zona_ssh"></select>
                    </div>
                </div>               
                <div class="form-group">
                  <label for="id_item_ssh" class="col-sm-3 control-label" align='left'>Item SSH:</label>                  
                  <div class="col-sm-8">
                    <input type="hidden" class="form-control" id="id_item_ssh" name="id_item_ssh" disabled="">
                    <input type="hidden" class="form-control" id="rekening_ssh" name="rekening_ssh" disabled="">
                    <div class="input-group">
                    <input type="text" class="form-control" id="ur_item_ssh" name="ur_item_ssh" disabled="">
                     <div class="input-group-btn">
                      <button class="btn btn-primary btnCariSSH" id="btnCariSSH" name="btnCariSSH" data-toggle="modal" href="#"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                  </div>
                  </div>
                </div>
                <div class="form-group"> 
                  <label for="id_rekening" class="col-sm-3 control-label" align='left'>Kode Rekening :</label>                 
                  <div class="col-sm-8">
                    <input type="hidden" class="form-control" id="id_rekening" name="id_rekening" disabled=""></td>
                    <div class="input-group">
                      <input type="text" class="form-control" id="ur_rekening" name="ur_rekening" disabled=""></td>
                      <div class="input-group-btn">
                      <button class="btn btn-primary btnCariRekening" id="btnCariRekening" name="btnCariRekening" data-toggle="modal" href="#"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                <div class="col-sm-12">
                    <table class="table table-striped table-bordered table-responsive">
                        <thead>
                          <tr>
                            <td width="30%">Volume 1</td>
                            <td width="10%">Koefisien</td>
                            <td width="25%">Harga Satuan</td>
                            <td width="35%">Jumlah Total</td>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <td width="30%" style="text-align: left; vertical-align:top;">
                              <div class="input-group">
                                <input type="text" class="form-control number" id="volume1" name="volume1">
                                <input type="hidden" class="form-control" id="id_satuan1" name="id_satuan1">
                                <span class="input-group-addon" id="satuan1"></span>
                              </div>
                              </td>
                          
                              <td width="10%" style="text-align: left; vertical-align:top;">
                              <div class="input-group">
                                <input type="text" class="form-control number" id="volume2" name="volume2">
                                <input type="hidden" class="form-control" id="id_satuan2" name="id_satuan2">
                                <span class="input-group-addon" id="satuan2"></span>
                              </div>
                              </td>
                          
                              <td width="25%" style="text-align: left; vertical-align:top;"><input type="text" class="form-control number" id="harga_satuan" name="harga_satuan" disabled></td>

                              <td width="35%" style="text-align: left; vertical-align:top;"><input type="text" class="form-control number" id="jumlah_belanja" name="jumlah_belanja" disabled></td>

                          </tr>
                        </tbody>
                    </table>
                </div>                  
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="title">Penjelasan Belanja Lainnya :</label>
                    <div class="col-sm-8">
                      <textarea type="name" class="form-control" id="uraian_belanja" name="uraian_belanja" rows="3"></textarea>
                    </div>
                </div> 
              </form>
              <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusBelanja">
                        <button type="button" class="btn btn-sm btn-danger btnHapusBelanja btn-labeled">
                            <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>Hapus</button>
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-sm btn-success btnBelanja btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i class="glyphicon glyphicon-save"></i></span>Simpan</button>
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
      </div>

<div id="CariSubUnit" class="modal fade" role="dialog" data-backdrop="static" tabindex="-1" data-focus-on="input:first">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> --}}
          <h4>Daftar Sub Unit</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
           <div class="form-group">
             <div class="col-sm-12">
                <table id='tblCariSubUnit' class="table display table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                          <tr>
                            <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                            <th style="text-align: center; vertical-align:middle">Sub Unit Pelaksana</th>
                          </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
              </div>
            </div>
          </form>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusKeg">
                    </div>
                    <div class="col-sm-10 text-right">
                        <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
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
          {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> --}}
          <h4>Daftar Aktivitas dalam ASB</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
           <div class="form-group">
             <div class="col-sm-12">
                <table id='tblCariAktivitasASB' class="table display table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                          <tr>
                            <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                            <th style="text-align: center; vertical-align:middle">Uraian Aktivitas ASB</th>
                          </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
              </div>
            </div>
          </form>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusKeg">
                    </div>
                    <div class="col-sm-10 text-right">
                        <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
                    </div>
                </div>
              </div>  
        </div>
      </div>
    </div>
</div>

<div id="cariLokasiModal" class="modal fade" role="dialog" data-backdrop="static" tabindex="-1" data-focus-on="input:first">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> --}}
          <h4>Daftar Referensi Lokasi</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
          <div class="form-group">
             <div class="col-sm-12">
             <div class='tabs-x tabs-above tab-bordered tabs-krajee'>
                    <ul class="nav nav-tabs" role="tablist">
                      <li class="active"><a href="#wilayah" aria-controls="wilayah" role="tab" data-toggle="tab">Lokasi Kewilayahan</a></li>
                      <li><a href="#teknis" aria-controls="teknis" role="tab-kv" data-toggle="tab">Lokasi Teknis</a></li>
                      <li><a href="#luardaerah" aria-controls="luar" role="tab-kv" data-toggle="tab">Lokasi Luar Daerah</a></li>
                    </ul>
                    
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="wilayah">
                        <br>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="title">Kecamatan :</label>
                            <div class="col-sm-8">
                                <select type="text" class="form-control kecamatan" id="kecamatan" name="kecamatan"></select>
                            </div>
                        </div>
                        <table id='tblLokasiWilayah' class="table display table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                  <tr>
                                    <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                                    <th style="text-align: center; vertical-align:middle">Nama Lokasi Kewilayahan</th>
                                  </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        </div>
                        <div role="tabpanel" class="tab-pane fade in" id="teknis">
                        <br>
                        <table id='tblLokasiTeknis' class="table display table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                  <tr>
                                    <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                                    <th style="text-align: center; vertical-align:middle">Uraian Lokasi Teknis</th>
                                  </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        </div>
                        <div role="tabpanel" class="tab-pane fade in" id="luardaerah">
                        <br>
                        <table id='tblLokasiLuar' class="table display table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                  <tr>
                                    <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                                    <th style="text-align: center; vertical-align:middle">Uraian Lokasi Luar Daerah</th>
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
          </form>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusKeg">
                    </div>
                    <div class="col-sm-10 text-right">
                        <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
                    </div>
                </div>
              </div>  
        </div>
      </div>
    </div>
</div>

<div id="cariRekening" class="modal fade" tabindex="-1" data-backdrop="static" data-focus-on="input:first">
  <div class="modal-dialog modal-lg"  >
    <div class="modal-content">
    <div class="modal-header">
        {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> --}}
        <h4>Daftar Rekening</h4>
    </div>
    <div class="modal-body">
      <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
        <div class="form-group">
          <div class="col-sm-12">
            <table id='tblRekening' class="table display table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                  <th width="15%" style="text-align: center; vertical-align:middle">Kode Rekening</th>
                  <th style="text-align: center; vertical-align:middle">Uraian Rekening</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </form>
      <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusKeg">
                    </div>
                    <div class="col-sm-10 text-right">
                        <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
                    </div>
                </div>
              </div> 
      </div>
    </div>
    </div>
  </div>

  <div id="cariItemSSH" class="modal fade" role="dialog" tabindex="-1" data-backdrop="static" data-focus-on="input:first">
  <div class="modal-dialog modal-lg"  >
  <div class="modal-content">
  <div class="modal-header">
    <h3>Daftar Item Standar Satuan Harga</h3>
  </div>
  <div class="modal-body">
  <form class="form-horizontal" role="form" autocomplete='off' action="" method="" onsubmit="return false;">
  <div class="form-group">
      <label class="control-label col-sm-2" for="id_item_perkada">Item SSH :</label>
        <div class="col-sm-8">
          <div class="input-group">
            <input type="text" class="form-control" id="param_cari" name="param_cari">
            <div class="input-group-btn">
              <button class="btn btn-primary" id="btnparam_cari" name="btnparam_cari"><i class="fa fa-search fa-fw fa-lg"></i></button>
            </div>
          </div>
        </div>
    </div>
   <div class="form-group">
   <div class="col-sm-12">
      <table id='tblItemSSH' class="table display table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
                <tr>
                  <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                  <th style="text-align: center; vertical-align:middle">Uraian Item SSH</th>
                  <th width="15%" style="text-align: center; vertical-align:middle">Satuan Item</th>
                </tr>
          </thead>
          <tbody>
          </tbody>
      </table>
    </div>
    </div>
  </form>
  <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusKeg">
                    </div>
                    <div class="col-sm-10 text-right">
                        <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
                    </div>
                </div>
              </div>  
  </div>
  </div>
  </div>
  </div>

  <div id="loadBelanjaASB" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="" onsubmit="return false;">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group">
                    <label class="control-label col-sm-3" for="title">Aktivitas ASB :</label>
                    <input type="hidden" class="form-control" id="id_aktivitas_asb_load" name="id_aktivitas_asb_load" disabled="">
                    <div class="col-sm-8">
                      <textarea type="name" class="form-control" id="uraian_aktivitas_asb_load" name="uraian_aktivitas_asb_load" rows="3" disabled=""></textarea>
                    </div>
                </div>
              <div class="form-group">
                    <label class="control-label col-sm-3" for="">Zona Wilayah SSH :</label>
                    <div class="col-sm-8">
                        <select type="text" class="form-control zona_ssh_load" id="zona_ssh_load" name="zona_ssh_load"></select>
                    </div>
                </div> 
              <div class="form-group">
                <label class="control-label col-sm-3" for="id_perkada">Volume Pemicu Biaya 1 :</label>
                <div class="col-sm-4">
                  <div class="input-group">
                      <input type="text" class="form-control number" id="v1_load" name="v1_load">
                      <span class="input-group-addon" id="satuan1_load"></span>
                  </div>
                </div>
                </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="id_perkada">Volume Pemicu Biaya 2 :</label>
                <div class="col-sm-4">
                  <div class="input-group">
                      <input type="text" class="form-control number" id="v2_load" name="v2_load">
                      <span class="input-group-addon" id="satuan2_load"></span>
                  </div>
                </div>
              </div>
          </form>
          </div>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusBelanja">
                    <button type="button" class="btn btn-sm btn-success btnUnLoadAsb btn-labeled" data-dismiss="modal" >
                            <span class="btn-label"><i id="fooUnLoadAsb" class="fa fa-stack-overflow"></i></span>Reload Belanja</button>
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-sm btn-primary btnLoadAsb btn-labeled" data-dismiss="modal" >
                            <span class="btn-label"><i id="fooLoadAsb" class="fa fa-calculator"></i></span>Proses Load Belanja</button>
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
    </div>

@endsection

@section('scripts')
<script>
$(document).ready(function(){

function createPesan(message, type) {
    var html = '<div class="alert alert-' + type + ' alert-dismissable page-alert col-md-12">';    
    html += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
    // html += '<i class="fa fa-exclamation fa-lg fa-fw" aria-hidden="true"></i>';
    html += message;
    html += '</div>';    
    $(html).hide().prependTo('#pesan').slideDown();
  };

$('.page-alert .close').click(function(e) {
        e.preventDefault();
        $(this).closest('.page-alert').slideUp();
    });

$('[data-toggle="popover"]').popover();

var prog_rpjmd,prog_rkpd;
var prog_renja,prog_renstra;
var keg_renja,aktivitas_renja;
var keg_renstra,id_ranwal_temp,id_renja_program_temp;
var id_aktivitas_temp,tahun_temp;
var unit_temp;
var id_program_renstra_temp;
var id_renja_temp;
var id_pelaksana_temp;
var id_lokasi_temp;
var nm_sub_temp;
var nm_lokasi;
var id_asb_temp, ur_asb_temp;
// 
// $('.number').number(true,2,',', '.');
$('#pagu_renja_kegiatan').number(true,2,',', '.');
$('#persen_musren').number(true,2,',', '.');
$('#pagu_musren').number(true,2,',', '.');
$('#pagu_aktivitas').number(true,2,',', '.');
$('#persen_musren_aktivitas').number(true,2,',', '.');
$('#pagu_musren_aktivitas').number(true,2,',', '.');
$('#volume1').number(true,2,',', '.');
$('#volume2').number(true,2,',', '.');
$('#harga_satuan').number(true,2,',', '.');
$('#jumlah_belanja').number(true,2,',', '.');
$('#no_urut_kegiatan').number(true,0,'', '');
$('#no_urut_aktivitas').number(true,0,'', '');
$('#no_urut_pelaksana').number(true,0,'', '');
$('#no_urut_lokasi').number(true,0,'', '');
$('#no_urut_aktivitas').number(true,0,'', '');
$('#v1_load').number(true,2,',', '.');
$('#v2_load').number(true,2,',', '.');
$('#volume_1').number(true,2,',', '.');
$('#volume_2').number(true,2,',', '.');

function LoadSatuanPublik(id_asb){
var x
      if(id_asb==null || id_asb==undefined || id_asb == ""){
          x = 0
      } else {
          x = id_asb
      }

$.ajax({
          type: "GET",
          url: 'blang/getSatuanPublik/'+ x,
          dataType: "json",
          success: function(data) {

          var j = data.length;
          var post, i;

          $('select[name="id_satuan_publik"]').empty();
          $('select[name="id_satuan_publik"]').append('<option value="-1">---Pilih Satuan---</option>');

          for (i = 0; i < j; i++) {
              post = data[i];
              $('select[name="id_satuan_publik"]').append('<option value="'+ post.id_satuan_publik +'">'+ post.uraian_satuan +'</option>');
            }
              
          }
      });
}



$.ajax({

    type: "GET",
    url: './blang/getUnitRenja',
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
          url: './blang/getSumberDana',
          dataType: "json",
          success: function(data) {

          var j = data.length;
          var post, i;

          $('select[name="sumber_dana"]').empty();
          $('select[name="sumber_dana"]').append('<option value="0">---Pilih Sumber Dana---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="sumber_dana"]').append('<option value="'+ post.id_sumber_dana +'">'+ post.uraian_sumber_dana +'</option>');
          }
          }
      });

$.ajax({
          type: "GET",
          url: './blang/getZonaSSH',
          dataType: "json",
          success: function(data) {

          var j = data.length;
          var post, i;

          $('select[name="zona_ssh"]').empty();
          $('select[name="zona_ssh"]').append('<option value="0">---Pilih Sumber Dana---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="zona_ssh"]').append('<option value="'+ post.id_zona +'">'+ post.keterangan_zona +'</option>');
          }
          }
      });

$.ajax({
          type: "GET",
          url: '../asb/getRefSatuan',
          dataType: "json",
          success: function(data) {

          // console.log(data)  

          var j = data.length;
          var post, i;

          $('select[name="id_satuan_1"]').empty();
          $('select[name="id_satuan_1"]').append('<option value="-1">---Pilih Satuan---</option>');

          $('select[name="id_satuan_publik"]').empty();
          $('select[name="id_satuan_publik"]').append('<option value="-1">---Pilih Satuan---</option>');

          $('select[name="id_satuan_2"]').empty();
          $('select[name="id_satuan_2"]').append('<option value="-1">---Pilih Satuan---</option>');
          $('select[name="id_satuan_2"]').append('<option value="0">-- N/A --</option>');

          for (i = 0; i < j; i++) {
              post = data[i];
              $('select[name="id_satuan_1"]').append('<option value="'+ post.id_satuan +'">'+ post.uraian_satuan +'</option>');
              $('select[name="id_satuan_2"]').append('<option value="'+ post.id_satuan +'">'+ post.uraian_satuan +'</option>');
              $('select[name="id_satuan_publik"]').append('<option value="'+ post.id_satuan +'">'+ post.uraian_satuan +'</option>');
            }
              
          }
      });

  var rekening = $('#tblRekening').DataTable( {
        processing: true,
        serverSide: true,
        dom: 'BfrtIp',
        "ajax": {"url": "blang/getRekening/0/0"},
        "columns": [
              { data: 'no_urut'},
              { data: 'kd_rekening'},
              { data: 'nm_rekening'}
            ],
        "order": [[0, 'asc']],
        "bDestroy": true
  });

  // var itemSSH = $('#tblItemSSH').DataTable( {
  //       processing: true,
  //       serverSide: true,
  //       dom: 'BfrtIp',
  //       "ajax": {"url": "blang/getItemSSH/0"},
  //       "columns": [
  //             { data: 'no_urut'},
  //             { data: 'uraian_tarif_ssh'},
  //             { data: 'uraian_satuan'}
  //           ],
  //       "order": [[0, 'asc']],
  //       "bDestroy": true
  // });

var itemSSH

$(document).on('click', '#btnparam_cari', function() {

  param=$('#param_cari').val();

  itemSSH = $('#tblItemSSH').DataTable( {
        // retrieve: true,
        processing: true,
        serverSide: true,
        dom: 'BFrtIp',
        "autoWidth": false,
        "ajax": {"url": "blang/getItemSSH/"+zona_temp+"/"+param.toLowerCase()},
        "columns": [
              { data: 'no_urut', sClass: "dt-center",width:"10px"},
              { data: 'uraian_tarif_ssh'},
              { data: 'uraian_satuan', sClass: "dt-center",width:"100px"}
            ],
        "order": [[0, 'asc']],
        "bDestroy": true
  });

});

  $('#tblRekening tbody').on( 'dblclick', 'tr', function () {

    var data = rekening.row(this).data();

    document.getElementById("ur_rekening").value = data.kd_rekening + '--' + data.nm_rekening;
    document.getElementById("id_rekening").value = data.id_rekening;

    $('#cariRekening').modal('hide');    

  } );

  $('#tblItemSSH tbody').on( 'dblclick', 'tr', function () {

    var data = itemSSH.row(this).data();

    document.getElementById("id_item_ssh").value = data.id_tarif_ssh;
    document.getElementById("ur_item_ssh").value = data.uraian_tarif_ssh;
    document.getElementById("rekening_ssh").value = data.jml_rekening;

    document.getElementById("id_satuan1").value = data.id_satuan;
    document.getElementById("satuan1").innerHTML = data.uraian_satuan;
    $('#harga_satuan').val(data.jml_rupiah);
    $('#jumlah_belanja').val(hitungsatuan());

    $('#cariItemSSH').modal('hide');    

  } );

var prog_renja_tbl
function loadTblProgRenja(tahun,unit){
   prog_renja_tbl=$('#tblProgram').DataTable({
                  processing: true,
                  serverSide: true,
                  dom : 'BFRtIp',
                  "ajax": {"url": "./blang/getProgramRenja/"+tahun+"/"+unit},
                  "language": {
                      "decimal": ",",
                      "thousands": "."},
                  "columns": [
                        { data: 'urut', sClass: "dt-center"},
                        { data: 'uraian_program_renja'},
                        { data: 'jml_kegiatan', sClass: "dt-center"},
                        { data: 'jml_pagu', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'jml_musren', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},                        
                        { data: 'jml_aktivitas', sClass: "dt-center"},
                        { data: 'action', 'searchable': false, 'orderable':false }
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        });
}

var keg_renja_tbl
function loadTblKegiatanRenja(id_program){

    keg_renja_tbl=$('#tblKegiatanRenja').DataTable({
                  processing: true,
                  serverSide: true,
                  dom : 'BFRtIp',
                  "ajax": {"url": "./blang/getKegiatanRenja/"+id_program},
                  "language": {
                      "decimal": ",",
                      "thousands": "."},
                  "columns": [
                        { data: 'urut', sClass: "dt-center"},
                        { data: 'uraian_kegiatan_renja'},
                        { data: 'pagu_tahun_kegiatan', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'pagu_musrenbang', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'jml_aktivitas', sClass: "dt-center"},
                        { data: 'jml_pagu_aktivitas', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'jml_musren_aktivitas', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'icon','searchable': false, 'orderable':false, sClass: "dt-center",
                            render: function(data, type, row,meta) {
                            return '<i class="'+row.status_icon+'" style="font-size:16px;color:'+row.warna+';"/>';
                          }},
                        { data: 'action', 'searchable': false, 'orderable':false }
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        });
}

var aktivitas_tbl
function loadTblAktivitas(id_renja){
    aktivitas_tbl=$('#tblAktivitas').DataTable({
                  processing: true,
                  serverSide: true,
                  dom : 'BFRtIp',
                  "ajax": {"url": "./blang/getAktivitas/"+id_renja},
                  "language": {
                      "decimal": ",",
                      "thousands": "."},
                  "columns": [
                        { data: 'no_urut', sClass: "dt-center"},
                        // { data: 'uraian_aktivitas_kegiatan'},
                        { data: 'uraian','searchable': false, 'orderable':false, sClass: "dt-left",
                            render: function(data, type, row,meta) {
                            return row.uraian_aktivitas_kegiatan + '  <i class="'+row.img+' fa-lg text-primary"/>';
                          }},
                        { data: 'pagu_aktivitas', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'jml_pagu_pelaksana', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'persen_musren', sClass: "dt-center",
                            render: function(data, type, row,meta) {
                            return row.pagu_musren+'%';}},
                        { data: 'jml_musren_aktivitas', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'icon','searchable': false, 'orderable':false, sClass: "dt-center",
                            render: function(data, type, row,meta) {
                            return '<i class="'+row.status_icon+'" style="font-size:16px;color:'+row.warna+';"/>';
                          }},
                        { data: 'action', 'searchable': false, 'orderable':false }
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        });
}

var pelaksana_tbl
function loadTblPelaksana(id_aktivitas){
    pelaksana_tbl=$('#tblPelaksana').DataTable({
                  processing: true,
                  serverSide: true,
                  dom : 'BFRtIp',
                  "ajax": {"url": "./blang/getPelaksanaAktivitas/"+id_aktivitas},
                  "language": {
                      "decimal": ",",
                      "thousands": "."},
                  "columns": [
                        { data: 'no_urut', sClass: "dt-center"},
                        { data: 'nm_sub'},
                        { data: 'nama_lokasi'},
                        { data: 'jml_pagu', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'jml_lokasi', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'icon','searchable': false, 'orderable':false, sClass: "dt-center",
                            render: function(data, type, row,meta) {
                            return '<i class="'+row.status_icon+'" style="font-size:16px;color:'+row.warna+';"/>';
                          }},
                        { data: 'action', 'searchable': false, 'orderable':false }
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        });
}

var lokasi_tbl
function loadTblLokasi(id_pelaksana){
    lokasi_tbl=$('#tblLokasi').DataTable({
                  processing: true,
                  serverSide: true,
                  dom : 'BFRtIp',
                  "ajax": {"url": "./blang/getLokasiAktivitas/"+id_pelaksana},
                  "language": {
                      "decimal": ",",
                      "thousands": "."},
                  "columns": [
                        { data: 'no_urut', sClass: "dt-center"},
                        { data: 'nama_lokasi'},
                        { data: 'jml_pagu', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'action', 'searchable': false, 'orderable':false }
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        });
}

var belanja_renja_tbl
function loadTblBelanja(lokasi){
   belanja_renja_tbl=$('#tblBelanja').DataTable({
                  processing: true,
                  serverSide: true,
                  dom : 'BFRtIp',
                  "ajax": {"url": "./blang/getBelanja/"+lokasi},
                  "language": {
                      "decimal": ",",
                      "thousands": "."},
                  "columns": [
                        { data: 'no_urut', sClass: "dt-center"},
                        { data: 'uraian_tarif_ssh'},
                        { data: 'kd_rekening', sClass: "dt-center"},
                        { data: 'volume_1', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'volume_2', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'harga_satuan', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'jml_belanja', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'action', 'searchable': false, 'orderable':false }
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        });
}

var cariAktivitasASB
$(document).on('click', '.btnCariASB', function() {
  $('#cariAktivitasASB').modal('show'); 

  cariAktivitasASB = $('#tblCariAktivitasASB').DataTable( {
        processing: true,
        serverSide: true,
        dom: 'bfrtIp',
        "ajax": {"url": "./blang/getAktivitasASB/"+tahun_temp},
        "columns": [
              { data: 'no_urut', sClass: "dt-center"},
              { data: 'nm_aktivitas_asb'}
            ],
        "order": [[0, 'asc']],
        "bDestroy": true
    });
});

var CariSubUnit
$(document).on('click', '.btnCariSubUnit', function() {
  $('#CariSubUnit').modal('show'); 

  CariSubUnit = $('#tblCariSubUnit').DataTable( {
        processing: true,
        serverSide: true,
        dom: 'bfrtIp',
        "ajax": {"url": "./blang/getSubUnit/"+unit_temp},
        "columns": [
              { data: 'no_urut', sClass: "dt-center"},
              { data: 'nm_sub'}
            ],
        "order": [[0, 'asc']],
        "bDestroy": true
    });
});

var cariLokasiDesa
var cariLokasiTeknis
var cariLokasiLuar

$.ajax({
    type: "GET",
    url: './blang/getKecamatan',
    dataType: "json",

    success: function(data) {

          var j = data.length;
          var post, i;

          $('select[name="kecamatan"]').empty();
          $('select[name="kecamatan"]').append('<option value="0">---Pilih Kecamatan---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="kecamatan"]').append('<option value="'+ post.id_kecamatan +'">'+ post.nama_kecamatan +'</option>');
          }
          }
  }); 

$( "#kecamatan" ).change(function() {

    cariLokasiDesa = $('#tblLokasiWilayah').DataTable( {
        processing: true,
        serverSide: true,
        dom: 'bfrtIp',
        "ajax": {"url": "./blang/getLokasiDesa/"+$('#kecamatan').val()},
        "columns": [
              { data: 'no_urut', sClass: "dt-center"},
              { data: 'nama_lokasi'}
            ],
        "order": [[0, 'asc']],
        "bDestroy": true
    }); 

});

$(document).on('click', '.btnCariLokasi', function() {
  
  cariLokasiDesa = $('#tblLokasiWilayah').DataTable( {
        processing: true,
        serverSide: true,
        dom: 'bfrtIp',
        "ajax": {"url": "./blang/getLokasiDesa/0"},
        "columns": [
              { data: 'no_urut', sClass: "dt-center"},
              { data: 'nama_lokasi'}
            ],
        "order": [[0, 'asc']],
        "bDestroy": true
    });

  cariLokasiTeknis = $('#tblLokasiTeknis').DataTable( {
        processing: true,
        serverSide: true,
        dom: 'bfrtIp',
        "ajax": {"url": "./blang/getLokasiTeknis"},
        "columns": [
              { data: 'no_urut', sClass: "dt-center"},
              { data: 'nama_lokasi'}
            ],
        "order": [[0, 'asc']],
        "bDestroy": true
    });

  cariLokasiLuar = $('#tblLokasiLuar').DataTable( {
        processing: true,
        serverSide: true,
        dom: 'bfrtIp',
        "ajax": {"url": "./blang/getLokasiLuarDaerah"},
        "columns": [
              { data: 'no_urut', sClass: "dt-center"},
              { data: 'nama_lokasi'}
            ],
        "order": [[0, 'asc']],
        "bDestroy": true
    });

  $('#cariLokasiModal').modal('show');

});

$('#tblLokasiWilayah').on( 'dblclick', 'tr', function () {
    var data = cariLokasiDesa.row(this).data();

    document.getElementById("id_lokasi").value = data.id_lokasi;
    document.getElementById("jenis_lokasi").value = data.jenis_lokasi;
    document.getElementById("nm_lokasi").value = data.nama_lokasi;


    document.getElementById("id_lokasi_pelaksana").value = data.id_lokasi;
    document.getElementById("nm_lokasi_pelaksana").value = data.nama_lokasi;


    $('#cariLokasiModal').modal('hide');    

  });

$('#tblLokasiTeknis').on( 'dblclick', 'tr', function () {
    var data = cariLokasiTeknis.row(this).data();

    document.getElementById("id_lokasi").value = data.id_lokasi;
    document.getElementById("jenis_lokasi").value = data.jenis_lokasi;
    document.getElementById("nm_lokasi").value = data.nama_lokasi;

    document.getElementById("id_lokasi_pelaksana").value = data.id_lokasi;
    document.getElementById("nm_lokasi_pelaksana").value = data.nama_lokasi;

    $('#cariLokasiModal').modal('hide');    

  });

$('#tblLokasiLuar').on( 'dblclick', 'tr', function () {
    var data = cariLokasiLuar.row(this).data();

    document.getElementById("id_lokasi").value = data.id_lokasi;
    document.getElementById("jenis_lokasi").value = data.jenis_lokasi;
    document.getElementById("nm_lokasi").value = data.nama_lokasi;

    document.getElementById("id_lokasi_pelaksana").value = data.id_lokasi;
    document.getElementById("nm_lokasi_pelaksana").value = data.nama_lokasi;

    $('#cariLokasiModal').modal('hide');    

  });

$('#tblCariAktivitasASB').on( 'dblclick', 'tr', function () {
    var data = cariAktivitasASB.row(this).data();

    document.getElementById("ur_aktivitas_kegiatan").value = data.nm_aktivitas_asb;
    document.getElementById("id_aktivitas_asb").value = data.id_aktivitas_asb;

    LoadSatuanPublik(data.id_aktivitas_asb);
    $('#cariAktivitasASB').modal('hide');    

  });

$('#tblCariSubUnit').on( 'dblclick', 'tr', function () {
    var data = CariSubUnit.row(this).data();

    document.getElementById("subunit_pelaksana").value = data.nm_sub;
    document.getElementById("id_subunit_pelaksana").value = data.id_sub_unit;
    $('#CariSubUnit').modal('hide');    

  });

$('#tblProgram tbody').on( 'dblclick', 'tr', function () {

    var data = prog_renja_tbl.row(this).data();

    prog_renja = data.uraian_program_renja;
    id_renja_program_temp = data.id_renja_program;
    tahun_temp = $('#tahun_rkpd').val();
    unit_temp = $('#id_unit').val();

    document.getElementById("nm_program_kegrenja").innerHTML =prog_renja;

    $('.nav-tabs a[href="#kegiatan"]').tab('show');
    loadTblKegiatanRenja(id_renja_program_temp);

});

$('#tblKegiatanRenja tbody').on( 'dblclick', 'tr', function () {

    var data = keg_renja_tbl.row(this).data();

    keg_renja = data.uraian_kegiatan_renja;
    id_renja_temp = data.id_renja;
    tahun_temp = $('#tahun_rkpd').val();
    unit_temp = $('#id_unit').val();

    document.getElementById("nm_program_aktivitas").innerHTML =prog_renja;
    document.getElementById("nm_kegiatan_aktivitas").innerHTML =keg_renja;

    $('.nav-tabs a[href="#aktivitas"]').tab('show');
    loadTblAktivitas(id_renja_temp);

});

$(document).on('click', '.view-kegiatan', function() {

    prog_renja = $(this).data('uraian_program_renja');
    id_renja_program_temp = $(this).data('id_renja_program');
    tahun_temp = $('#tahun_rkpd').val();
    unit_temp = $('#id_unit').val();

    document.getElementById("nm_program_kegrenja").innerHTML =prog_renja;

    $('.nav-tabs a[href="#kegiatan"]').tab('show');
    loadTblKegiatanRenja(id_renja_program_temp);
});

$('#tblAktivitas tbody').on( 'dblclick', 'tr', function () {

    var data = aktivitas_tbl.row(this).data();

    aktivitas_renja = data.uraian_aktivitas_kegiatan;
    id_aktivitas_temp = data.id_aktivitas_renja;    
    tahun_temp = $('#tahun_rkpd').val();
    unit_temp = $('#id_unit').val();

    document.getElementById("nm_program_pelaksana").innerHTML =prog_renja;
    document.getElementById("nm_kegiatan_pelaksana").innerHTML =keg_renja;
    document.getElementById("nm_aktivitas_pelaksana").innerHTML =aktivitas_renja;

    $('.nav-tabs a[href="#pelaksana"]').tab('show');
    loadTblPelaksana(id_aktivitas_temp);

});

$(document).on('click', '.view-aktivitas', function() {

    keg_renja = $(this).data('uraian_kegiatan_renja');
    id_renja_temp = $(this).data('id_renja');
    tahun_temp = $('#tahun_rkpd').val();
    unit_temp = $('#id_unit').val();

    document.getElementById("nm_program_aktivitas").innerHTML =prog_renja;
    document.getElementById("nm_kegiatan_aktivitas").innerHTML =keg_renja;

    $('.nav-tabs a[href="#aktivitas"]').tab('show');
    loadTblAktivitas(id_renja_temp);
});

$('#tblPelaksana tbody').on( 'dblclick', 'tr', function () {

    var data = pelaksana_tbl.row(this).data();

    nm_sub_temp = data.nm_sub;
    id_pelaksana_temp = data.id_pelaksana_renja;
    tahun_temp = $('#tahun_rkpd').val();
    unit_temp = $('#id_unit').val();

    document.getElementById("nm_program_lokasi").innerHTML =prog_renja;
    document.getElementById("nm_kegiatan_lokasi").innerHTML =keg_renja;
    document.getElementById("nm_aktivitas_lokasi").innerHTML =aktivitas_renja;
    document.getElementById("nm_sub_lokasi").innerHTML =nm_sub_temp;

    $('.nav-tabs a[href="#lokasi"]').tab('show');
    loadTblLokasi(id_pelaksana_temp);

});

$(document).on('click', '.view-pelaksana', function() {

    aktivitas_renja = $(this).data('uraian_aktivitas_kegiatan');
    id_aktivitas_temp = $(this).data('id_aktivitas_renja');    
    tahun_temp = $('#tahun_rkpd').val();
    unit_temp = $('#id_unit').val();

    document.getElementById("nm_program_pelaksana").innerHTML =prog_renja;
    document.getElementById("nm_kegiatan_pelaksana").innerHTML =keg_renja;
    document.getElementById("nm_aktivitas_pelaksana").innerHTML =aktivitas_renja;

    $('.nav-tabs a[href="#pelaksana"]').tab('show');
    loadTblPelaksana(id_aktivitas_temp);
});

$(document).on('click', '.view-lokasi', function() {

    nm_sub_temp = $(this).data('nm_sub');
    id_pelaksana_temp = $(this).data('id_pelaksana_renja');
    tahun_temp = $('#tahun_rkpd').val();
    unit_temp = $('#id_unit').val();

    document.getElementById("nm_program_lokasi").innerHTML =prog_renja;
    document.getElementById("nm_kegiatan_lokasi").innerHTML =keg_renja;
    document.getElementById("nm_aktivitas_lokasi").innerHTML =aktivitas_renja;
    document.getElementById("nm_sub_lokasi").innerHTML =nm_sub_temp;

    $('.nav-tabs a[href="#lokasi"]').tab('show');
    loadTblLokasi(id_pelaksana_temp);
});

$('#tblLokasi tbody').on( 'dblclick', 'tr', function () {

    var data = lokasi_tbl.row(this).data();

    nm_lokasi_temp = data.nama_lokasi;
    id_lokasi_temp = data.id_lokasi_renja;
    id_asb_temp = data.id_aktivitas_asb;
    ur_asb_temp = data.uraian_aktivitas_kegiatan;
    tahun_temp = $('#tahun_rkpd').val();
    unit_temp = $('#id_unit').val();

    // alert(data.sumber_aktivitas);

    document.getElementById("nm_program_belanja").innerHTML =prog_renja;
    document.getElementById("nm_kegiatan_belanja").innerHTML =keg_renja;
    document.getElementById("nm_aktivitas_belanja").innerHTML =aktivitas_renja;
    document.getElementById("nm_sub_belanja").innerHTML =nm_sub_temp;
    document.getElementById("nm_lokasi_belanja").innerHTML =nm_lokasi_temp;

    if(data.sumber_aktivitas == 0){
      $('#btnTambahBelanja').hide();
      $('#btnTambahBelanjaASB').show();
    } else {
      $('#btnTambahBelanja').show();
      $('#btnTambahBelanjaASB').hide();
    }

    

    $('.nav-tabs a[href="#belanja"]').tab('show');
    loadTblBelanja(id_lokasi_temp);

});

$(document).on('click', '.view-belanja', function() {

    nm_lokasi_temp = $(this).data('nama_lokasi');
    id_lokasi_temp = $(this).data('id_lokasi_renja');
    id_asb_temp = $(this).data('id_aktivitas_asb');
    ur_asb_temp = $(this).data('uraian_aktivitas_kegiatan');
    tahun_temp = $('#tahun_rkpd').val();
    unit_temp = $('#id_unit').val();

    document.getElementById("nm_program_belanja").innerHTML =prog_renja;
    document.getElementById("nm_kegiatan_belanja").innerHTML =keg_renja;
    document.getElementById("nm_aktivitas_belanja").innerHTML =aktivitas_renja;
    document.getElementById("nm_sub_belanja").innerHTML =nm_sub_temp;
    document.getElementById("nm_lokasi_belanja").innerHTML =nm_lokasi_temp;

    // alert($(this).data('sumber_aktivitas'));

    if($(this).data('sumber_aktivitas') == 0){
      $('#btnTambahBelanja').hide();
      $('#btnTambahBelanjaASB').show();
    } else {
      $('#btnTambahBelanja').show();
      $('#btnTambahBelanjaASB').hide();
    }

    $('.nav-tabs a[href="#belanja"]').tab('show');
    loadTblBelanja(id_lokasi_temp);
});

$( "#id_unit" ).change(function() {
  tahun_temp = $('#tahun_rkpd').val();
  unit_temp = $('#id_unit').val();

  $('.nav-tabs a[href="#program"]').tab('show');
  loadTblProgRenja(tahun_temp,unit_temp);
  $('#judul').html('<b>Program Renja yang dilaksanakan oleh '+$('#id_unit option:selected').text()+'</b>'); 

});

$( "#persen_musren" ).change(function() {

  var x = $('#pagu_renja_kegiatan').val();
  var y = $('#persen_musren').val();

  var nilai_musren = Math.ceil(x*(y/100));

  $('#pagu_musren').val(nilai_musren); 

});

$( "#pagu_renja_kegiatan" ).change(function() {

  var x = $('#pagu_renja_kegiatan').val();
  var y = $('#persen_musren').val();

  var nilai_musren = Math.ceil(x*(y/100));

  $('#pagu_musren').val(nilai_musren); 

});

  $(document).on('click', '.edit-kegiatan', function() {
        
      $('.btnKegiatan').removeClass('addKegiatanRenja');
      $('.btnKegiatan').addClass('editKegiatanRenja');      
      $('.form-horizontal').show();
      $('.modal-title').text('Edit dan Reviu Kegiatan Renja pada '+$(this).data('nm_unit'));
      $('#id_renja_kegiatan').val($(this).data('id_renja'));
      $('#id_rkpd_ranwal_kegiatan').val($(this).data('id_rkpd_ranwal'));
      $('#tahun_renja_kegiatan').val($(this).data('tahun_renja'));
      $('#id_renja_program_kegiatan').val($(this).data('id_renja_program'));
      $('#id_unit_kegiatan').val($(this).data('id_unit'));
      $('#ur_kegiatan_renstra').val($(this).data('uraian_kegiatan_renstra'));
      $('#ur_kegiatan_renja').val($(this).data('uraian_kegiatan_renja'));
      $('#ur_kegiatan_ref').val($(this).data('kd_kegiatan') +" -" +$(this).data('nm_kegiatan'));
      $('#no_urut_kegiatan').val($(this).data('no_urut'));
      $('#pagu_renja_kegiatan').val($(this).data('pagu_tahun_kegiatan'));
      $('#persen_musren').val($(this).data('persen_musren'));
      $('#pagu_musren').val($(this).data('pagu_musrenbang'));
      $('#keterangan_status_kegiatan').val($(this).data('ket_usulan'));

      $('.chkKegiatan').show();
      if($(this).data('status_rancangan')==1){
        $('.checkKegiatan').prop('checked',true);
      } else {
        $('.checkKegiatan').prop('checked',false);
      }

      $('#ModalKegiatan').modal('show');
  });

$('.modal-footer').on('click', '.editKegiatanRenja', function() {

    if (document.getElementById("checkKegiatan").checked){
        check_data = 1
      } else {
        check_data = 0
      }
      
                    $.ajaxSetup({
                       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
                    });

                    $.ajax({
                      type: 'post',
                      url: 'blang/editKegiatanRenja',
                      data: {
                          '_token': $('input[name=_token]').val(),
                          'id_renja': $('#id_renja_kegiatan').val(),
                          'tahun_renja': $('#tahun_renja_kegiatan').val(),
                          'pagu_kegiatan' : $('#pagu_renja_kegiatan').val(),
                          'pagu_musrenbang' : $('#persen_musren').val(),
                          'pagu_musren' : $('#pagu_musren').val(),
                          'ket_usulan': $('#keterangan_status_kegiatan').val(),
                          'status_rancangan' : check_data,
                      },
                      success: function(data) {
                          $('#tblKegiatanRenja').DataTable().ajax.reload();
                          $('#tblProgram').DataTable().ajax.reload();
                          if(data.status_pesan==1){
                              createPesan(data.pesan,"success");
                              } else {
                              createPesan(data.pesan,"danger"); 
                              } 
                      }
                  });    
  });

$( ".sumber_aktivitas" ).change(function() {
  if(document.frmModalAktivitas.sumber_aktivitas.value==0){
      // document.getElementById("ur_aktivitas_kegiatan").setAttribute("disabled","disabled");
      $('.btnCariASB').show();
      $('#id_satuan_publik').removeAttr("disabled");
    } else {
      // document.getElementById("ur_aktivitas_kegiatan").removeAttribute("disabled");
      $('.btnCariASB').hide();
      $('#id_satuan_publik').attr("disabled","disabled");
    }
});

$( "#pagu_aktivitas" ).change(function() {
  var x = $('#pagu_aktivitas').val();
  var y = $('#persen_musren_aktivitas').val();

  var nilai_musren = Math.ceil(x*(y/100));

  $('#pagu_musren_aktivitas').val(nilai_musren);
});

$( "#persen_musren_aktivitas" ).change(function() {
  var x = $('#pagu_aktivitas').val();
  var y = $('#persen_musren_aktivitas').val();

  var nilai_musren = Math.ceil(x*(y/100));

  $('#pagu_musren_aktivitas').val(nilai_musren);
});

$( ".jenis_pembahasan" ).change(function() {  
  if(document.frmModalAktivitas.jenis_pembahasan.value==0){
    $('#persen_musren_aktivitas').val(0);
    $('#pagu_musren_aktivitas').val(0);
    document.getElementById("persen_musren_aktivitas").setAttribute("disabled","disabled");
  } else {
    $('#persen_musren_aktivitas').val(0);
    $('#pagu_musren_aktivitas').val(0);
    document.getElementById("persen_musren_aktivitas").removeAttribute("disabled");
  }
});

function getSumberASB(){

    var xCheck = document.querySelectorAll('input[name="sumber_aktivitas"]:checked');
    var xyz = [];
    for(var x = 0, l = xCheck.length; x < l;  x++)
      { xyz.push(xCheck[x].value); }
    var xvalues = xyz.join('');
    return xvalues;
  }

function getJenisKegiatan(){

    var xCheck = document.querySelectorAll('input[name="jenis_aktivitas"]:checked');
    var xyz = [];
    for(var x = 0, l = xCheck.length; x < l;  x++)
      { xyz.push(xCheck[x].value); }
    var xvalues = xyz.join('');
    return xvalues;
  }

function getJenisPembahasan(){

    var xCheck = document.querySelectorAll('input[name="jenis_pembahasan"]:checked');
    var xyz = [];
    for(var x = 0, l = xCheck.length; x < l;  x++)
      { xyz.push(xCheck[x].value); }
    var xvalues = xyz.join('');
    return xvalues;
  }

$(document).on('click', '.add-aktivitas', function() {
        
      $('.btnAktivitas').addClass('addAktivitas');
      $('.btnAktivitas').removeClass('editAktivitas');      
      $('.form-horizontal').show();
      $('.modal-title').text('Tambah Aktivitas untuk kegiatan '+keg_renja);
      $('#id_renja_aktivitas').val(id_renja_temp);
      $('#id_aktivitas').val(null);
      $('#tahun_renja_aktivitas').val(tahun_temp);
      $('#no_urut_aktivitas').val(0);
      document.frmModalAktivitas.sumber_aktivitas[0].checked=true;
      $('#ur_aktivitas_kegiatan').val(null);
      $('#id_aktivitas_asb').val(null);
      document.frmModalAktivitas.jenis_aktivitas[0].checked=true;
      $('#sumber_dana').val(0);
      $('#pagu_aktivitas').val(0);      
      document.frmModalAktivitas.jenis_pembahasan[0].checked=true;
      $('#persen_musren_aktivitas').val(0);
      $('#pagu_musren_aktivitas').val(0);

      $('#id_satuan_publik').val(-1);

      $('#persen_musren_aktivitas').attr("disabled","disabled");
      $('#id_satuan_publik').removeAttr("disabled");

      $('#ModalAktivitas').modal('show');

  });

  $('.modal-footer').on('click', '.addAktivitas', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });



      $.ajax({
          type: 'post',
          url: 'blang/addAktivitas',
          data: {
              '_token': $('input[name=_token]').val(),
              'no_urut': $('#no_urut_aktivitas').val(),
              'id_renja': $('#id_renja_aktivitas').val(),
              'tahun_renja': $('#tahun_renja_aktivitas').val(),
              'id_aktivitas_asb' : $('#id_aktivitas_asb').val() ,
              'uraian_aktivitas_kegiatan' : $('#ur_aktivitas_kegiatan').val() ,
              'sumber_dana' : $('#sumber_dana').val() ,
              'pagu_musren' : $('#persen_musren_aktivitas').val(),
              'pagu_aktivitas' : $('#pagu_aktivitas').val() ,
              'id_satuan_publik' : $('#id_satuan_publik').val(), 
              'sumber_aktivitas' : getSumberASB() ,
              'jenis_kegiatan' : getJenisKegiatan() ,
              'status_musren': getJenisPembahasan(),
          },
          success: function(data) {
              $('#tblAktivitas').DataTable().ajax.reload();
              $('#tblKegiatanRenja').DataTable().ajax.reload();
              $('#tblProgram').DataTable().ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              } 
          }
      });
  });

$('#ModalAktivitas').on('hidden.bs.modal', function () {
    $.ajax({
          type: "GET",
          url: '../asb/getRefSatuan',
          dataType: "json",
          success: function(data) {

          // console.log(data)  

          var j = data.length;
          var post, i;

          $('select[name="id_satuan_publik"]').empty();
          $('select[name="id_satuan_publik"]').append('<option value="-1">---Pilih Satuan---</option>');

          for (i = 0; i < j; i++) {
              post = data[i];
              $('select[name="id_satuan_publik"]').append('<option value="'+ post.id_satuan +'">'+ post.uraian_satuan +'</option>');
            }
              
          }
      });
});

$('#ModalAktivitas').on('shown.bs.modal', function () {
    // LoadSatuanPublik($(this).data('id_aktivitas_asb'));
});


$(document).on('click', '.edit-aktivitas', function() {

    var nilai_musren = $(this).data('pagu_aktivitas')*($(this).data('pagu_musren')/100);
    // LoadSatuanPublik($(this).data('id_aktivitas_asb'));
        
      $('.btnAktivitas').removeClass('addAktivitas');
      $('.btnAktivitas').addClass('editAktivitas');      
      $('.form-horizontal').show();
      $('.modal-title').text('Edit Aktivitas untuk kegiatan '+keg_renja);
      $('#id_renja_aktivitas').val($(this).data('id_renja'));
      $('#id_aktivitas').val($(this).data('id_aktivitas_renja'));
      $('#tahun_renja_aktivitas').val($(this).data('tahun_renja'));
      $('#no_urut_aktivitas').val($(this).data('no_urut'));
      document.frmModalAktivitas.sumber_aktivitas[$(this).data('sumber_aktivitas')].checked=true;
      $('#ur_aktivitas_kegiatan').val($(this).data('uraian_aktivitas_kegiatan'));
      $('#id_aktivitas_asb').val($(this).data('id_aktivitas_asb'));
      document.frmModalAktivitas.jenis_aktivitas[$(this).data('jenis_kegiatan')].checked=true;
      $('#sumber_dana').val($(this).data('sumber_dana'));
      $('#pagu_aktivitas').val($(this).data('pagu_aktivitas'));      
      document.frmModalAktivitas.jenis_pembahasan[$(this).data('status_musren')].checked=true;
      $('#persen_musren_aktivitas').val($(this).data('pagu_musren'));
      $('#pagu_musren_aktivitas').val(nilai_musren);      

      $('#id_satuan_publik').val($(this).data('id_satuan_publik'));

      $('.chkAktivitas').show();
      if($(this).data('status_data')==1){
        $('.checkAktivitas').prop('checked',true);
      } else {
        $('.checkAktivitas').prop('checked',false);
      }

      if($(this).data('status_musren') == 1){
        $('#persen_musren_aktivitas').removeAttr("disabled");
      } else {
        $('#persen_musren_aktivitas').attr("disabled","disabled");
      }
      

      if($(this).data('sumber_aktivitas')==0){
        $('#id_satuan_publik').removeAttr("disabled");
      } else {
        $('#id_satuan_publik').attr("disabled","disabled");
      }
      

      $('#ModalAktivitas').modal('show');
    });

  $('.modal-footer').on('click', '.editAktivitas', function() {
      if (document.getElementById("checkAktivitas").checked){
        check_data = 1
      } else {
        check_data = 0
      }

      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      // $.ajax({

      //   type: "GET",
      //   url: './blang/getPaguPelaksana/'+$('#tahun_renja_aktivitas').val()+"/"+$('#id_aktivitas').val(),
      //   // dataType: "json",

      //   success: function(data) {
      //     console.log(data);
      //     alert(data[0].jml_pagu);
          // var pagu;
          // pagu = data[0];
          $.ajax({
              type: 'post',
              url: 'blang/editAktivitas',
              data: {
                  '_token': $('input[name=_token]').val(),
                  'id_aktivitas_renja': $('#id_aktivitas').val(),
                  'no_urut': $('#no_urut_aktivitas').val(),
                  'id_renja': $('#id_renja_aktivitas').val(),
                  'tahun_renja': $('#tahun_renja_aktivitas').val(),
                  'id_aktivitas_asb' : $('#id_aktivitas_asb').val() ,
                  'uraian_aktivitas_kegiatan' : $('#ur_aktivitas_kegiatan').val() ,
                  'sumber_dana' : $('#sumber_dana').val() ,
                  'pagu_musren' : $('#persen_musren_aktivitas').val(),
                  'pagu_aktivitas' : $('#pagu_aktivitas').val() ,
                  // 'pagu_pelaksana' : pagu.jml_pagu ,               
                  'id_satuan_publik' : $('#id_satuan_publik').val(), 
                  'sumber_aktivitas' : getSumberASB() ,
                  'jenis_kegiatan' : getJenisKegiatan() ,
                  'status_data': check_data,
                  'status_musren': getJenisPembahasan(),
              },
              success: function(data) {
                  $('#tblAktivitas').DataTable().ajax.reload();
                  $('#tblKegiatanRenja').DataTable().ajax.reload();
                  $('#tblProgram').DataTable().ajax.reload();
                  if(data.status_pesan==1){
                  createPesan(data.pesan,"success");
                  } else {
                  createPesan(data.pesan,"danger"); 
                  }
              }
          });
      //   }
      // });
  });

$(document).on('click', '.btnHapusAktivitas', function() {


  var x = confirm("Anda yakin akan menghapus data aktivitas "+$('#ur_aktivitas_kegiatan').val()+" ?");

  if (x) {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      type: 'post',
      url: 'blang/hapusAktivitas',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_aktivitas_renja': $('#id_aktivitas').val()
      },
      success: function(data) {
        $('#ModalAktivitas').modal('hide');
        $('#tblAktivitas').DataTable().ajax.reload();
        $('#tblKegiatanRenja').DataTable().ajax.reload();
        $('#tblProgram').DataTable().ajax.reload();
        createPesan(data.pesan,"success");
      }
    });
   } 
  else {    
    return false;
  }
});

$(document).on('click', '.add-pelaksana', function() {
        
      $('.btnPelaksana').addClass('addPelaksana');
      $('.btnPelaksana').removeClass('editPelaksana');      
      $('.form-horizontal').show();
      $('.modal-title').text('Tambah Pelaksana aktivitas '+keg_renja);
      $('#id_renja_pelaksana').val(id_renja_temp);
      $('#id_pelaksana_renja').val(null);
      $('#tahun_renja_pelaksana').val(tahun_temp);
      $('#no_urut_pelaksana').val(0);
      $('#id_aktivitas_pelaksana').val(id_aktivitas_temp);
      $('#id_subunit_pelaksana').val(null);
      $('#id_lokasi_pelaksana').val(null);
      $('#nm_lokasi_pelaksana').val(null);
      $('#subunit_pelaksana').val(null);

      $('.idbtnHapusPelaksana').hide();

      $('#ModalPelaksana').modal('show');

  });

  $('.modal-footer').on('click', '.addPelaksana', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: 'blang/addPelaksana',
          data: {
              '_token': $('input[name=_token]').val(),
              'no_urut': $('#no_urut_pelaksana').val(),
              'id_renja': $('#id_renja_pelaksana').val(),
              'tahun_renja': $('#tahun_renja_pelaksana').val(),
              'id_aktivitas_renja' : $('#id_aktivitas_pelaksana').val() ,
              'id_sub_unit' : $('#id_subunit_pelaksana').val(),
              'id_lokasi' : $('#id_lokasi_pelaksana').val(),
          },
          success: function(data) {
              $('#tblPelaksana').DataTable().ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              } 
          }
      });
  });

$(document).on('click', '.edit-pelaksana', function() {
        
      $('.btnPelaksana').addClass('editPelaksana');
      $('.btnPelaksana').removeClass('addPelaksana');      
      $('.form-horizontal').show();
      $('.modal-title').text('Ubah Pelaksana aktivitas '+keg_renja);
      $('#id_renja_pelaksana').val($(this).data('id_renja'));
      $('#id_pelaksana_renja').val($(this).data('id_pelaksana_renja'));
      $('#tahun_renja_pelaksana').val($(this).data('tahun_renja'));
      $('#no_urut_pelaksana').val($(this).data('no_urut'));
      $('#id_aktivitas_pelaksana').val($(this).data('id_aktivitas_renja'));
      $('#id_subunit_pelaksana').val($(this).data('id_sub_unit'));
      $('#id_lokasi_pelaksana').val($(this).data('id_lokasi'));
      $('#nm_lokasi_pelaksana').val($(this).data('nm_lokasi'));
      $('#subunit_pelaksana').val($(this).data('nm_sub'));

      $('.idbtnHapusPelaksana').show();

      $('.chkPelaksana').show();

      if($(this).data('status_data')==1){
        $('.checkPelaksana').prop('checked',true);
      } else {
        $('.checkPelaksana').prop('checked',false);
      }

      $('#ModalPelaksana').modal('show');

  });

  $('.modal-footer').on('click', '.editPelaksana', function() {

      if (document.getElementById("checkPelaksana").checked){
        check_data = 1
      } else {
        check_data = 0
      }

      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: 'blang/editPelaksana',
          data: {
              '_token': $('input[name=_token]').val(),
              'no_urut': $('#no_urut_pelaksana').val(),
              'id_renja': $('#id_renja_pelaksana').val(),
              'tahun_renja': $('#tahun_renja_pelaksana').val(),
              'id_pelaksana_renja' : $('#id_pelaksana_renja').val() ,
              'id_aktivitas_renja' : $('#id_aktivitas_pelaksana').val() ,
              'id_sub_unit' : $('#id_subunit_pelaksana').val(),
              'id_lokasi' : $('#id_lokasi_pelaksana').val(),
              'status_data' : check_data,
          },
          success: function(data) {
              $('#tblPelaksana').DataTable().ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              } 
          }
      });
  });

$(document).on('click', '.btnHapusPelaksana', function() {

  var x = confirm("Anda yakin akan menghapus data pelaksana "+$('#subunit_pelaksana').val()+" ?");

  if (x) {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      type: 'post',
      url: 'blang/hapusPelaksana',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_pelaksana_renja': $('#id_pelaksana_renja').val()
      },
      success: function(data) {
        $('#tblPelaksana').DataTable().ajax.reload();
        $('#ModalPelaksana').modal('hide');
        createPesan(data.pesan,"success");
      }
    });
   } 
  else {    
    return false;
  }

  });

$(document).on('click', '.add-lokasi', function() {
        
      $('.btnLokasi').addClass('addLokasi');
      $('.btnLokasi').removeClass('editLokasi');      
      $('.form-horizontal').show();
      $('.modal-title').text('Tambah Lokasi Pelaksanaan Aktivitas : '+aktivitas_renja);
      $('#id_pelaksana_lokasi').val(id_pelaksana_temp);
      $('#id_lokasi_renja').val(null);
      $('#tahun_renja_lokasi').val(tahun_temp);
      $('#no_urut_lokasi').val(0);
      $('#id_lokasi').val(null);
      $('#jenis_lokasi').val(null);
      $('#uraian_lokasi').val(null);
      $('#volume_1').val(0);
      $('#volume_2').val(0);
      $('#id_satuan_1').val(-1);
      $('#id_satuan_2').val(0);
      $('#nm_lokasi').val(null);

      $('#ModalLokasi').modal('show');

  });

$('.modal-footer').on('click', '.addLokasi', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: 'blang/addLokasi',
          data: {
              '_token': $('input[name=_token]').val(),
              'no_urut': $('#no_urut_lokasi').val(),
              'tahun_renja': $('#tahun_renja_lokasi').val(),
              'id_pelaksana_renja' : $('#id_pelaksana_lokasi').val() ,
              'jenis_lokasi' : $('#jenis_lokasi').val(),
              'id_lokasi' : $('#id_lokasi').val(),
              'volume_1' : $('#volume_1').val(),
              'volume_2' : $('#volume_2').val(),
              'id_satuan_1' : $('#id_satuan_1').val(),
              'id_satuan_2' : $('#id_satuan_2').val(),
              'uraian_lokasi' : $('#uraian_lokasi').val(),

          },
          success: function(data) {
              $('#tblLokasi').DataTable().ajax.reload();
              $('#tblPelaksana').DataTable().ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              } 
          }
      });
  });

$(document).on('click', '.edit-lokasi', function() {
        
      $('.btnLokasi').addClass('editLokasi');
      $('.btnLokasi').removeClass('addLokasi');      
      $('.form-horizontal').show();
      $('.modal-title').text('Ubah Data Lokasi Pelaksanaan Aktivitas : '+aktivitas_renja);
      $('#id_pelaksana_lokasi').val($(this).data('id_pelaksana_renja'));
      $('#id_lokasi_renja').val($(this).data('id_lokasi_renja'));
      $('#tahun_renja_lokasi').val($(this).data('tahun_renja'));
      $('#no_urut_lokasi').val($(this).data('no_urut'));
      $('#id_lokasi').val($(this).data('id_lokasi'));
      $('#jenis_lokasi').val($(this).data('jenis_lokasi'));
      $('#uraian_lokasi').val($(this).data('uraian_lokasi'));
      $('#nm_lokasi').val($(this).data('nama_lokasi'));
      $('#volume_1').val($(this).data('volume_1'));
      $('#volume_2').val($(this).data('volume_2'));
      $('#id_satuan_1').val($(this).data('id_satuan_1'));
      $('#id_satuan_2').val($(this).data('id_satuan_2'));

      $('#ModalLokasi').modal('show');

  });

$('.modal-footer').on('click', '.editLokasi', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: 'blang/editLokasi',
          data: {
              '_token': $('input[name=_token]').val(),
              'no_urut': $('#no_urut_lokasi').val(),
              'tahun_renja': $('#tahun_renja_lokasi').val(),
              'id_lokasi_renja' : $('#id_lokasi_renja').val() ,
              'id_pelaksana_renja' : $('#id_pelaksana_lokasi').val() ,
              'jenis_lokasi' : $('#jenis_lokasi').val(),
              'id_lokasi' : $('#id_lokasi').val(),
              'volume_1' : $('#volume_1').val(),
              'volume_2' : $('#volume_2').val(),
              'id_satuan_1' : $('#id_satuan_1').val(),
              'id_satuan_2' : $('#id_satuan_2').val(),
              'uraian_lokasi' : $('#uraian_lokasi').val(),

          },
          success: function(data) {
              $('#tblLokasi').DataTable().ajax.reload();
              $('#tblPelaksana').DataTable().ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              } 
          }
      });
  });

$(document).on('click', '.btnHapusLokasi', function() {

  var x = confirm("Anda yakin akan menghapus lokasi "+$('#uraian_lokasi').val()+" ini ?");

  if (x) {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      type: 'post',
      url: 'blang/hapusLokasi',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_lokasi_renja': $('#id_lokasi_renja').val()
      },
      success: function(data) {
        $('#tblLokasi').DataTable().ajax.reload();
        $('#tblPelaksana').DataTable().ajax.reload();
        $('#ModalLokasi').modal('hide');
        createPesan(data.pesan,"success");
      }
    });
   } 
  else {    
    return false;
  }

  });

$(document).on('click', '.btnCariSSH', function() {

    zona_temp=$('#zona_ssh').val();

      $('#cariItemSSH').modal('show');
      // $('#tblItemSSH').DataTable().ajax.url("blang/getItemSSH/"+$('#zona_ssh').val()).load();

  });

$(document).on('click', '.btnCariRekening', function() {

  var x

      if($('#rekening_ssh').val()==null || 
        $('#rekening_ssh').val()==undefined ||
        $('#rekening_ssh').val() == ""){
          x = 0
      } else {
          x = $('#rekening_ssh').val()
      }

      $('#cariRekening').modal('show');
      $('#tblRekening').DataTable().ajax.url("blang/getRekening/"+ x +"/"+$('#id_item_ssh').val()).load();

  });

function hitungsatuan(){

  var x = $('#volume1').val();
  var y = $('#volume2').val();
  var z = $('#harga_satuan').val();
  
  var nilai_musren = x*y*z;
  return nilai_musren;

}

$( "#volume1" ).change(function() {

  $('#jumlah_belanja').val(hitungsatuan()); 

});

$( "#volume2" ).change(function() {

  $('#jumlah_belanja').val(hitungsatuan()); 

});

$( "#harga_satuan" ).change(function() {

  $('#jumlah_belanja').val(hitungsatuan()); 

});

function checkAsalbelanja(asal){
  if(asal==1){
    $('#btnCariSSH').addClass('btnCariSSH');
    $('#btnCariRekening').addClass('btnCariRekening');
    $('#btnCariSSH').removeClass('catatan');
    $('#btnCariRekening').removeClass('catatan');
    document.getElementById("volume1").removeAttribute("disabled");
    document.getElementById("volume2").removeAttribute("disabled");
    document.getElementById("zona_ssh").removeAttribute("disabled");
  } else {
    $('#btnCariSSH').removeClass('btnCariSSH');
    $('#btnCariRekening').removeClass('btnCariRekening');
    $('#btnCariSSH').addClass('catatan');
    $('#btnCariRekening').addClass('catatan');
    document.getElementById("volume1").setAttribute("disabled","disabled");
    document.getElementById("volume2").setAttribute("disabled","disabled");
    document.getElementById("zona_ssh").setAttribute("disabled","disabled");
  }
}

$(document).on('click', '.catatan', function() {
  alert("Maaf Tidak Berfungsi karena asal belanja dari ASB")
});

$(document).on('click', '.add-belanja', function() {
        
      $('.btnBelanja').addClass('addBelanja');
      $('.btnBelanja').removeClass('editBelanja');      
      $('.form-horizontal').show();
      $('.modal-title').text('Tambah Uraian Belanja : '+aktivitas_renja);
      $('#id_lokasi_belanja').val(id_lokasi_temp);
      $('#id_belanja').val(null);
      $('#tahun_renja_belanja').val(tahun_temp);
      $('#no_urut_belanja').val(0);
      $('#zona_ssh').val(0);
      $('#id_item_ssh').val(null);
      $('#rekening_ssh').val(null);
      $('#ur_item_ssh').val(null);
      $('#id_rekening').val(null);
      $('#ur_rekening').val(null);
      $('#volume1').val(1);
      $('#id_satuan1').val(null);
      $('#satuan1').text(null);
      $('#volume2').val(1);
      $('#harga_satuan').val(1);
      $('#jumlah_belanja').val(1);
      $('#uraian_belanja').val(null);
      $('#uraian_aktivitas_asb').val(null);
      $('#id_aktivitas_asb_belanja').val(0);
      $('#sumber_belanja').val(1);
      $('#id_satuan2').val(0);
      $('#satuan2').val(null);

      checkAsalbelanja(1);

      $('#ModalBelanja').modal('show');

  });

$('.modal-footer').on('click', '.addBelanja', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: 'blang/addBelanja',
          data: {
              '_token': $('input[name=_token]').val(),
              'tahun_renja' : $('#tahun_renja_belanja').val(),
              'no_urut' : $('#no_urut_belanja').val(),
              'id_lokasi_renja' : $('#id_lokasi_belanja').val(),
              'id_zona_ssh' : $('#zona_ssh').val(),
              'sumber_aktivitas' : $('#sumber_belanja').val(),
              'id_aktivitas_asb' : $('#id_aktivitas_asb_belanja').val(),
              'id_tarif_ssh' : $('#id_item_ssh').val(),
              'id_rekening_ssh' : $('#id_rekening').val(),
              'uraian_belanja' : $('#uraian_belanja').val(),
              'volume_1' : $('#volume1').val(),
              'id_satuan_1' : $('#id_satuan1').val(),
              'volume_2' : $('#volume2').val(),
              'id_satuan_2' : $('#id_satuan2').val(),
              'harga_satuan' : $('#harga_satuan').val(),
              'jml_belanja' : $('#jumlah_belanja').val(),
              'status_data' : 0,

          },
          success: function(data) {
              $('#tblBelanja').DataTable().ajax.reload();
              $('#tblLokasi').DataTable().ajax.reload();
              $('#tblPelaksana').DataTable().ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
          }
      });
  });

$(document).on('click', '.edit-belanja', function() {
        
      $('.btnBelanja').addClass('editBelanja');
      $('.btnBelanja').removeClass('addBelanja');      
      $('.form-horizontal').show();
      $('.modal-title').text('Tambah Uraian Belanja : '+aktivitas_renja);
      $('#id_lokasi_belanja').val($(this).data('id_lokasi_renja'));
      $('#id_belanja').val($(this).data('id_belanja_renja'));
      $('#tahun_renja_belanja').val($(this).data('tahun_renja'));
      $('#no_urut_belanja').val($(this).data('no_urut'));
      $('#zona_ssh').val($(this).data('id_zona_ssh'));
      $('#id_item_ssh').val($(this).data('id_tarif_ssh'));
      $('#rekening_ssh').val();
      $('#ur_item_ssh').val($(this).data('uraian_tarif_ssh'));
      $('#id_rekening').val($(this).data('id_rekening_ssh'));
      $('#ur_rekening').val($(this).data('kd_rekening') +' - '+$(this).data('nm_rekening'));
      $('#volume1').val($(this).data('volume_1'));
      $('#id_satuan1').val($(this).data('id_satuan_1'));
      $('#satuan1').text($(this).data('satuan_1'));
      $('#volume2').val($(this).data('volume_2'));
      $('#harga_satuan').val($(this).data('harga_satuan'));
      $('#jumlah_belanja').val($(this).data('jml_belanja'));
      $('#uraian_belanja').val($(this).data('uraian_belanja'));
      $('#uraian_aktivitas_asb').val($(this).data('nm_aktivitas_asb'));
      $('#id_aktivitas_asb_belanja').val($(this).data('id_aktivitas_asb'));
      $('#sumber_belanja').val($(this).data('sumber_aktivitas'));
      $('#id_satuan2').val($(this).data('id_satuan_2'));
      $('#satuan2').val($(this).data('satuan_2'));

      // alert($(this).data('nm_aktivitas_asb'));
      // alert($(this).data('uraian_belanja'))
      checkAsalbelanja($(this).data('sumber_aktivitas'));

      $('.chkBelanja').show();
      if($(this).data('status_data')==1){
        $('.checkBelanja').prop('checked',true);
      } else {
        $('.checkBelanja').prop('checked',false);
      }

      $('#ModalBelanja').modal('show');

  });

$('.modal-footer').on('click', '.editBelanja', function() {

  if (document.getElementById("checkBelanja").checked){
        check_data = 1
      } else {
        check_data = 0
      }

      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: 'blang/editBelanja',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_belanja_renja' : $('#id_belanja').val(),
              'tahun_renja' : $('#tahun_renja_belanja').val(),
              'no_urut' : $('#no_urut_belanja').val(),
              'id_lokasi_renja' : $('#id_lokasi_belanja').val(),
              'id_zona_ssh' : $('#zona_ssh').val(),
              'sumber_aktivitas' : $('#sumber_belanja').val(),
              'id_aktivitas_asb' : $('#id_aktivitas_asb_belanja').val(),
              'id_tarif_ssh' : $('#id_item_ssh').val(),
              'id_rekening_ssh' : $('#id_rekening').val(),
              'uraian_belanja' : $('#uraian_belanja').val(),
              'volume_1' : $('#volume1').val(),
              'id_satuan_1' : $('#id_satuan1').val(),
              'volume_2' : $('#volume2').val(),
              'id_satuan_2' : $('#id_satuan2').val(),
              'harga_satuan' : $('#harga_satuan').val(),
              'jml_belanja' : $('#jumlah_belanja').val(),
              'status_data' : check_data,

          },
          success: function(data) {
              $('#tblBelanja').DataTable().ajax.reload();
              $('#tblLokasi').DataTable().ajax.reload();
              $('#tblPelaksana').DataTable().ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              } 
          }
      });
  });

$(document).on('click', '.btnHapusBelanja', function() {

  if($('#sumber_belanja').val()==1){

  var x = confirm("Anda yakin akan menghapus item belanja "+$('#ur_item_ssh').val()+" ini ?");

  if (x) {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      type: 'post',
      url: 'blang/hapusBelanja',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_belanja_renja': $('#id_belanja').val()
      },
      success: function(data) {
        $('#tblBelanja').DataTable().ajax.reload();
        $('#tblLokasi').DataTable().ajax.reload();
        $('#tblPelaksana').DataTable().ajax.reload();
        $('#ModalBelanja').modal('hide');
        createPesan(data.pesan,"success");
      }
    });
   } 
  else {    
    return false;
  }

  } else {
    alert('Maaf Item dari ASB tidak dapat dihapus');
  }

  });

$(document).on('click', '.add-belanjaASB', function() {

      $('.btnLoadAsb').addClass('loadBelanja');
      $('.btnLoadAsb').removeClass('unloadBelanja');      
      $('.form-horizontal').show();
      $('.modal-title').text('Load Data Belanja dari ASB');

      $('#id_aktivitas_asb_load').val(id_asb_temp);
      $('#uraian_aktivitas_asb_load').val(ur_asb_temp);
      // zona_ssh_load

      $('#loadBelanjaASB').modal('show');

      $.ajax({
          type: "GET",
          url: './blang/getZonaSSH',
          dataType: "json",
          success: function(data) {

          var j = data.length;
          var post, i;

          $('select[name="zona_ssh_load"]').empty();
          $('select[name="zona_ssh_load"]').append('<option value="0">---Pilih Zona Wilayah---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="zona_ssh_load"]').append('<option value="'+ post.id_zona +'">'+ post.keterangan_zona +'</option>');
          }
          }
      });

});

function hitungASB(jns_biaya,hub_driver,vol1,vol2,r1,r2,m1,m2,k1,k2,k3,harga){

var hargax, kmax, rx1, rx2, hargas
var koef = (k1*k2*k3)

if (m2 != 0 && m1 != 0) {
  if(m1<m2){
    kmax = Math.ceil(vol1/m1)
  } else {
    kmax = Math.ceil(vol2/m2)
  }
} else {

  if(m1>m2){
    kmax = Math.ceil(vol1/m1)
  } else {
    kmax = Math.ceil(vol2/m2)
  }
};

if(r1 < 1) {rx1=Math.ceil(vol1/vol1)} else {rx1 = Math.ceil(vol1/r1)}
if(r2 < 1) {rx2=Math.ceil(vol2/vol2)} else {rx2 = Math.ceil(vol2/r2)}

if (jns_biaya==1) { hargax = koef*kmax*harga };
if (jns_biaya==2 && hub_driver==1) { hargax = (vol1*koef*rx1*harga)};
if (jns_biaya==2 && hub_driver==2) { hargax = (vol2*koef*rx2*harga)};
if (jns_biaya==3 && hub_driver==1) { hargax = (vol1*koef*harga)};
if (jns_biaya==3 && hub_driver==2) { hargax = (vol2*koef*harga)};
if (jns_biaya==3 && hub_driver==3) { hargax = (vol1*vol2*koef*harga)};

if (jns_biaya==1) { hargas = koef*kmax*harga };
if (jns_biaya==2 && hub_driver==1) { hargas = (koef*rx1*harga)};
if (jns_biaya==2 && hub_driver==2) { hargas = (koef*rx2*harga)};
if (jns_biaya==3 && hub_driver==1) { hargas = (koef*harga)};
if (jns_biaya==3 && hub_driver==2) { hargas = (koef*harga)};
if (jns_biaya==3 && hub_driver==3) { hargas = (koef*harga)};

hargaxy = [hargax,hargas]

return hargaxy;

}

$(document).on('click', '.btnUnLoadAsb', function() {

  $.ajax({
          type: 'post',
          url: './blang/unloadASB',
          data: {
            '_token': $('input[name=_token]').val(),
            'id_aktivitas_asb': id_asb_temp,
            'id_lokasi_renja': id_lokasi_temp,
          },
          success: function(data) {
            $('#tblBelanja').DataTable().ajax.reload();
            $('#tblLokasi').DataTable().ajax.reload();
            $('#tblPelaksana').DataTable().ajax.reload();
            createPesan(data.pesan,"success");
          }

        });


});

$(document).on('click', '.btnLoadAsb', function() {
   var vol1=$('#v1_load').val()
   var vol2=$('#v2_load').val()

  $.ajax({
          type: "GET",
          url: './blang/getHitungASB/'+id_asb_temp+'/'+$('#zona_ssh_load').val(),
          dataType: "json",
          success: function(data) {

          var j = data.length;
          var post, i;

          for (i = 0; i < j; i++) {
            post = data[i];
            var nilai_belanja=hitungASB(post.jenis_biaya,post.hub_driver,vol1,vol2,post.r1,post.r2,post.km1,post.km2,post.kf1,post.kf2,post.kf3,post.harga_satuan);
            $.ajax({
                  type: 'post',
                  url: 'blang/addBelanja',
                  data: {
                      '_token': $('input[name=_token]').val(),
                      'tahun_renja' : tahun_temp,
                      'no_urut' : i+1,
                      'id_lokasi_renja' : id_lokasi_temp,
                      'id_zona_ssh' : post.id_zona,
                      'sumber_aktivitas' : 0,
                      'id_aktivitas_asb' : post.id_aktivitas_asb,
                      'id_tarif_ssh' : post.id_tarif_ssh,
                      'id_rekening_ssh' : post.id_rekening,
                      'uraian_belanja' : post.nm_aktivitas_asb,
                      'volume_1' : vol1,
                      'id_satuan_1' : post.id_satuan_1,
                      'volume_2' : vol2,
                      'id_satuan_2' : post.id_satuan_2,
                      'harga_satuan' : nilai_belanja[1],
                      'jml_belanja' : nilai_belanja[0],
                      'status_data' : 0,

                  },
              });
            }

            $('#tblBelanja').DataTable().ajax.reload();
            $('#tblLokasi').DataTable().ajax.reload();
            $('#tblPelaksana').DataTable().ajax.reload();
            createPesan(data.pesan,"success");
          }
      });


           

  

});


});
</script>
@endsection