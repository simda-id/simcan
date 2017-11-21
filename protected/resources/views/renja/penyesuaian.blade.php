<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?php
                $this->title = 'Penyesuaian Data Renstra';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = '/';
                $breadcrumb->begin();
                $breadcrumb->add(['url' => '/modul2','label' => 'Renja Perangkat Daerah']);
                $breadcrumb->add(['url' => '/renja', 'label' => 'Rancangan Awal Renja']);
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
                    <p><h2 id="judul" class="panel-title">{{ $this->title }}</h2></p>
                </div>
            <div class="panel-body">
                <form name="" class="form-horizontal" role="form" autocomplete='off' action="" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="tahun_rkpd" class="col-sm-3 control-label text-left" align='left'>Tahun Perencanaan :</label>
                        <div class="col-sm-1">                            
                            <input class="form-control text-center" type="text" id="tahun_rkpd" name="tahun_rkpd" value="{{Session::get('tahun')}}" disabled>
                        </div>
                        <div class="btn-group">
                                <button type="button" class="btn btn-success dropdown-toggle btn-labeled" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown"><span class="btn-label"><i class="fa fa-print fa-fw fa-lg"></i></span>Pencetakan Penyesuaian Renja <span class="caret"></span></button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a class="dropdown-item btnPrintKompilasiProgramdanPagu"><i class="fa fa-bullseye fa-fw fa-lg" aria-hidden="true"></i> Kompilasi Program dan Pagu</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item btnPrintKompilasiKegiatandanPaguRenja"><i class="fa fa-male fa-fw fa-lg" aria-hidden="true"></i> Kompilasi Kegiatan dan Pagu</a>
                                    </li>                       
                                </ul>
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
                      <li class="active">
                        <a href="#program" aria-controls="program" role="tab" data-toggle="tab">Program RKPD</a>
                      </li>
                      <li class="disabled">
                        <a href="#programrenja" aria-controls="programrenja" role="tab-kv" data-toggle="tab">Program Renja</a>
                      </li>
                      <li class="disabled">
                        <a href="#kegiatanrenja" aria-controls="kegiatanrenja" role="tab-kv" data-toggle="tab">Kegiatan Renja</a>
                      </li>
                    </ul>
                    
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="program">
                          <div class="table-responsive">
                                <table id="tblProgramRKPD" class="table display table-striped table-bordered table-responsive" width="100%">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" width='5px' style="text-align: center; vertical-align:middle">No Urut</th>
                                            <th rowspan="2" style="text-align: center; vertical-align:middle">Nama Program</th>
                                            <th colspan="4" style="text-align: center; vertical-align:middle">Rincian Data</th>
                                            <th rowspan="2" width='10%' style="text-align: center; vertical-align:middle">Aksi</th>
                                        </tr>
                                        <tr>
                                            <th width='10%' style="text-align: center; vertical-align:middle">Program</th>   
                                            <th width='10%' style="text-align: center; vertical-align:middle">Indikator</th>
                                            <th width='10%' style="text-align: center; vertical-align:middle">Kegiatan</th>
                                            <th width='20%' style="text-align: center; vertical-align:middle">Pagu Kegiatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>                                        
                                    </tbody>
                                </table>
                              </div>   
                            </div>
                            <div role="tabpanel" class="tab-pane fade in" id="programrenja">
                                    <br>
                                      <div id="divTambahProg">
                                        <p><a id="btnTambahProg" class="add-programrenja btn btn-labeled btn-success"><span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span> Tambah Program</a></p>
                                      </div>
                                    <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
                                      <div class="table-responsive">
                                        <table class="table table-striped table-bordered" width="100%">
                                          <tbody>
                                            <tr class="backRkpd">
                                              <td width="15%" style="text-align: left; vertical-align:top;">Program RPJMD</td>
                                              <td style="text-align: left; vertical-align:top;"><label id="nm_program_rpjmd_progrenja" align='left'></label></td>
                                            </tr>
                                            <tr class="backRenja">
                                              <td width="15%" style="text-align: left; vertical-align:top;">Program RKPD</td>
                                              <td style="text-align: left; vertical-align:top;"><label id="nm_program_rkpd_progrenja" align='left'></label></td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </div>
                                    </form>
                                    <div class="col-md-12">
                                    <div class="table-responsive">
                                    <table id="tblProgramRenja" class="table display table-striped compact table-bordered table-responsive" width="100%">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" width='3%' style="text-align: center; vertical-align:middle"></th>
                                                <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">No Urut</th>
                                                <th rowspan="2" style="text-align: center; vertical-align:middle">Nama Program Renja</th>
                                                <th colspan="2" width='5%' style="text-align: center; vertical-align:middle">Jumlah Indikator</th>
                                                <th colspan="3" width='15%' style="text-align: center; vertical-align:middle">Jumlah Kegiatan</th>
                                                <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">Status</th>
                                                <th rowspan="2" width='10%' style="text-align: center; vertical-align:middle">Aksi</th>
                                            </tr>
                                            <tr>
                                                <th width="50px" style="text-align: center; vertical-align:middle">Jml</th>
                                                <th width="50px" style="text-align: center; vertical-align:middle">Reviu</th>
                                                <th width="50px" style="text-align: center; vertical-align:middle">Jml</th>
                                                <th width="50px" style="text-align: center; vertical-align:middle">Reviu</th>
                                                <th width='150px' style="text-align: center; vertical-align:middle">Pagu</th>
                                            </tr>
                                        </thead>
                                        <tbody>                                        
                                        </tbody>
                                    </table> 
                                    </div>
                                    </div>  
                                </div>
                            <div role="tabpanel" class="tab-pane fade in" id="kegiatanrenja">
                                <br>
                                  <div id="divTambahKegiatan">
                                    <p><a id="btnTambahKegiatan" class="add-kegiatan btn btn-labeled btn-success"><span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Kegiatan</a></p>
                                  </div>
                                  <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
                                  <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                      <tbody>
                                        <tr class="backRkpd">
                                          <td width="15%" style="text-align: left; vertical-align:top;">Program RKPD</td>
                                          <td style="text-align: left; vertical-align:top;"><label id="nm_program_rkpd_kegrenja" align='left'></label></td>
                                        </tr>
                                        <tr class="backRenja">
                                          <td width="15%" style="text-align: left; vertical-align:top;">Program Renstra</td>
                                          <td style="text-align: left; vertical-align:top;"><label id="nm_program_renstra_kegrenja" align='left'></label></td>
                                        </tr>
                                        <tr class="backRenja">
                                          <td width="15%" style="text-align: left; vertical-align:top;">Program Renja</td>
                                          <td style="text-align: left; vertical-align:top;"><label id="nm_program_renja_kegrenja" align='left'></label></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                  </form>
                                    <div class="table-responsive">
                                    <table id="tblKegiatanRenja" class="table display table-striped compact table-bordered table-responsive" width="100%">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" width='3%' style="text-align: center; vertical-align:middle"></th>
                                                <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">No Urut</th>
                                                <th rowspan="2" style="text-align: center; vertical-align:middle">Nama Kegiatan Renja</th>
                                                <th colspan="2" width='5%' style="text-align: center; vertical-align:middle">Jumlah Indikator</th>
                                                <th rowspan="2" width='15%' style="text-align: center; vertical-align:middle">Jumlah Pagu Kegiatan</th>
                                                <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">Status</th>
                                                <th rowspan="2" width='10%' style="text-align: center; vertical-align:middle">Aksi</th>
                                            </tr>
                                            <tr>
                                                <th width="50px" style="text-align: center; vertical-align:middle">Jml</th>
                                                <th width="50px" style="text-align: center; vertical-align:middle">Reviu</th>
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

<script id="details-inProg" type="text/x-handlebars-template">
        <table class="table table-striped display table-bordered table-responsive compact details-table" id="inProg-@{{id_renja_program}}">
            <thead>
              <tr>
                <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                <th style="text-align: center; vertical-align:middle">Uraian Indikator</th>
                <th width="5%" style="text-align: center; vertical-align:middle">Target Renstra</th>
                <th width="5%" style="text-align: center; vertical-align:middle">Target Renja</th>
                <th width="50px" style="text-align: center; vertical-align:middle">Status</th>
                <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
              </tr>
            </thead>
            <tbody></tbody>
        </table>
</script>

<script id="details-inKeg" type="text/x-handlebars-template">
        <table class="table table-striped display table-bordered table-responsive compact details-table" id="inKeg-@{{id_renja}}">
            <thead>
              <tr>
                <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                <th style="text-align: center; vertical-align:middle">Uraian Indikator</th>
                <th width="5%" style="text-align: center; vertical-align:middle">Target Renstra</th>
                <th width="5%" style="text-align: center; vertical-align:middle">Target Renja</th>
                <th width="50px" style="text-align: center; vertical-align:middle">Status</th>
                <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
              </tr>
            </thead>
            <tbody></tbody>
        </table>
</script>

<div id="ModalProgram" class="modal fade" role="dialog" data-backdrop="static" >
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
              <form name="frmEditProgram" class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="id_rkpd_ranwal_program" name="id_rkpd_ranwal_program">
                <input type="hidden" id="id_renja_program" name="id_renja_program">
                <input type="hidden" id="tahun_renja" name="tahun_renja">
                <input type="hidden" id="id_unit" name="id_unit">
                <div class="form-group">
                  <label class="control-label col-sm-3" for="id">No Urut :</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control number" name="no_urut_program" id="no_urut_program" disabled>
                  </div>
                  </div>
                  <div class="form-group">
                  <label class="control-label col-sm-3" for="id">Jenis Belanja :</label>
                  <div class="col-sm-5">
                    <select class="form-control" name="jenis_belanja" id="jenis_belanja" disabled>
                      <option value="0">Belanja Langsung</option>
                      <option value="1">Pendapatan</option>
                      <option value="2">Belanja Tidak Langsung</option>
                    </select>
                  </div>
                </div>
                  <div class="form-group lblProgramRenja">
                    <label class="control-label col-sm-3" for="title">Uraian Program Renstra:</label>
                    <div class="col-sm-8">
                      <textarea type="name" class="form-control" id="ur_program_renstra" rows="3" disabled></textarea>
                    </div>
                    <input type="hidden" id="id_visi_renstra" name="id_visi_renstra">
                    <input type="hidden" id="id_misi_renstra" name="id_misi_renstra">
                    <input type="hidden" id="id_tujuan_renstra" name="id_tujuan_renstra">
                    <input type="hidden" id="id_sasaran_renstra" name="id_sasaran_renstra">
                    <input type="hidden" id="id_program_renstra" name="id_program_renstra">
                    <span class="btn btn-primary btnCariProgramRenstra" id="btnCariProgramRenstra" name="btnCariProgramRenstra"><i class="fa fa-search fa-fw fa-lg"></i></span>
                  </div>
                  <div class="form-group urProgramRef">
                    <label class="control-label col-sm-3" for="title">Uraian Program Referensi:</label>
                    <div class="col-sm-8">
                      <textarea type="name" class="form-control" id="ur_program_ref" rows="3" disabled></textarea>
                    </div>                    
                    <input type="hidden" id="id_program_ref" name="id_program_ref">
                    <span class="btn btn-primary btnCariProgramRef" id="btnCariProgramRef" name="btnCariProgramRef"><i class="fa fa-search fa-fw fa-lg"></i></span>
                  </div>
                  <div class="form-group">
                  <label class="control-label col-sm-3" for="title">Uraian Program Renja:</label>
                  <div class="col-sm-8">
                    <textarea type="name" class="form-control ur_program_renja" name="ur_program_renja" id="ur_program_renja" rows="3" disabled></textarea>
                  </div>
                </div>
                <div class="form-group idStatusPelaksanaan" id="idStatus">
                  <label for="status_pelaksanaan_program" class="col-sm-3 control-label" align='left'>Status Pelaksanaan :</label>
                  <div class="col-sm-8" id="myRadio">
                      <label class="radio-inline">
                        <input type="radio" class="skegiatan" name="status_pelaksanaan_program" id="status_pelaksanaan_program" value="0">Tepat Waktu
                      </label>
                      <label class="radio-inline">
                        <input type="radio" class="skegiatan" name="status_pelaksanaan_program" id="status_pelaksanaan_program" value="1">Dimajukan
                      </label>
                      <label class="radio-inline">
                        <input type="radio" class="skegiatan" name="status_pelaksanaan_program" id="status_pelaksanaan_program" value="2">Ditunda
                      </label>
                      <label class="radio-inline">
                        <input type="radio" class="skegiatan" name="status_pelaksanaan_program" id="status_pelaksanaan_program" value="3">Dibatalkan
                      </label>
                      <label class="radio-inline" id="status_pelaksanaan4">
                        <input type="radio" class="skegiatan" name="status_pelaksanaan_program" id="status_pelaksanaan_program" value="4">Baru
                      </label>
                  </div>
                </div>
                <div class="form-group KetPelaksanaan">
                  <label for="keterangan_status_program" class="col-sm-3 control-label" align='left'>Keterangan Pelaksanaan :</label>
                  <div class="col-sm-8">
                    <textarea type="text" class="form-control keterangan_status_program" name="keterangan_status_program" id="keterangan_status_program" rows="3" disabled></textarea>
                  </div>
                </div>
                <div class="form-group idStatusUsulan hidden"> 
                  <label for="status_data_program" class="col-sm-3 control-label" align='left'>Status Usulan :</label>                 
                  <div class="col-sm-6">
                    <label class="radio-inline">
                      <input type="radio" class="usulan" name="status_usulan_program" id="status_usulan_program" value="0">Draft
                    </label>
                    <label class="radio-inline">
                      <input type="radio" class="usulan" name="status_usulan_program" id="status_usulan_program" value="1">Final
                    </label>
                  </div>
                </div>
              </form>
            </div>
              <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapus">
                        <button type="button" class="btn btn-danger btnHapus btn-labeled">
                            <span class="btn-label"><i class="fa fa-trash fa-fw fa-lg"></i></span>Hapus</button>
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-success btnProgram btn-labeled" data-dismiss="modal">
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


  <div id="ModalIndikator" class="modal fade" role="dialog" data-backdrop="static">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
              <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" id="id_indikator_program_renja" name="id_indikator_program_renja">
              <input type="hidden" id="id_renja_program_1" name="id_renja_program_1">
              <div class="form-group">
                <label class="control-label col-sm-3" for="id">No Urut :</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control number" id="no_urut_indikator" disabled>
                </div>
                <div class="col-sm-3 chkIndikator">
                    <label class="checkbox-inline">
                    <input class="checkIndikator" type="checkbox" name="checkIndikator" id="checkIndikator" value="1"> Telah Direviu</label>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="title">Uraian Indikator Program Renja:</label>
                <div class="col-sm-8">
                  <textarea type="name" class="form-control" id="ur_indikator_renja" rows="3" disabled></textarea>
                </div>
                <input type="hidden" id="kd_indikator_renja" name="kd_indikator_renja">
                <span class="btn btn-primary btnCariIndi" id="btnCariIndi" name="btnCariIndi"><i class="fa fa-search fa-fw fa-lg"></i></span>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="title">Uraian Tolok Ukur Program Renja:</label>
                <div class="col-sm-8">
                  <textarea type="name" class="form-control" id="ur_tolokukur_renja" rows="3" disabled></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="target_indikator_renstra" class="col-sm-3 control-label" align='left'>Target Capaian Menurut Renstra :</label>
                <div class="col-sm-2">
                  <input type="text" class="form-control number" id="target_indikator_renstra" name="target_indikator_renstra" disabled >
                </div>
                <label for="target_indikator_renja" class="col-sm-3 control-label" align='left'>Target Capaian Menurut Renja :</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control number" id="target_indikator_renja" name="target_indikator_renja" required="required" >
                </div>
              </div>
            </form>
          </div>
              <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusIndikator">
                        <button type="button" class="btn btn-danger btnHapusIndikator btn-labeled">
                            <span class="btn-label"><i class="fa fa-trash fa-fw fa-lg"></i></span>Hapus</button>
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-success btnIndikator btn-labeled" data-dismiss="modal">
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

<div id="ModalKegiatan" class="modal fade" role="dialog" data-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
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
                    <input type="hidden" id="id_visi_renstra_keg" name="id_visi_renstra_keg">
                    <input type="hidden" id="id_misi_renstra_keg" name="id_misi_renstra_keg">
                    <input type="hidden" id="id_tujuan_renstra_keg" name="id_tujuan_renstra_keg">
                    <input type="hidden" id="id_sasaran_renstra_keg" name="id_sasaran_renstra_keg">
                    <input type="hidden" id="id_program_renstra_keg" name="id_program_renstra_keg">
                    <input type="hidden" id="id_kegiatan_renstra" name="id_kegiatan_renstra">
                    <span class="btn btn-primary btnCariKegiatanRenstra" id="btnCariKegiatanRenstra" name="btnCariKegiatanRenstra"><i class="fa fa-search fa-fw fa-lg"></i></span>
                  </div>
                  <div class="form-group urKegiatanRef">
                    <label class="control-label col-sm-3" for="title">Uraian Kegiatan Referensi:</label>
                    <div class="col-sm-8">
                      <textarea type="name" class="form-control" id="ur_kegiatan_ref" rows="3" disabled></textarea>
                    </div>                    
                    <input type="hidden" id="id_kegiatan_ref" name="id_kegiatan_ref">
                    <span class="btn btn-primary btnCariKegiatanRef" id="btnCariKegiatanRef" name="btnCariKegiatanRef"><i class="fa fa-search fa-fw fa-lg"></i></span>
                  </div>
                  <div class="form-group">
                  <label class="control-label col-sm-3" for="title">Uraian Kegiatan Renja:</label>
                  <div class="col-sm-8">
                    <textarea type="name" class="form-control ur_kegiatan_renja" name="ur_kegiatan_renja" id="ur_kegiatan_renja" rows="3" disabled></textarea>
                  </div>
                </div>
                <div class="form-group">
                <div class="col-sm-offset-1 col-sm-10">
                    <table class="table table-striped table-bordered table-responsive">
                        <thead>
                          <tr>
                            <td>
                              <label for="pagu_renstra" class="control-label" align='left'>Pagu Renstra :</label>
                            </td>
                            <td>
                              <label for="pagu_renja_kegiatan" class="control-label" align='left'>Pagu Tahun ini :</label>
                            </td>
                            <td>
                              <label for="pagu_selanjutnya" class="control-label" align='left'>Pagu Tahun selanjutnya :</label>
                            </td>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <td style="text-align: left; vertical-align:top;"><input type="text" class="form-control number" id="pagu_renstra" name="pagu_renstra" disabled ></td>
                          
                              <td style="text-align: left; vertical-align:top;"><input type="text" class="form-control number" id="pagu_renja_kegiatan" name="pagu_renja_kegiatan" required="required" ></td>
                          
                              <td style="text-align: left; vertical-align:top;"><input type="text" class="form-control number" id="pagu_selanjutnya" name="pagu_selanjutnya" ></td>
                          </tr>
                        </tbody>
                    </table>
                </div>
                </div>
                <div class="form-group idStatusPelaksanaan_keg" id="idStatus_keg">
                  <label for="status_pelaksanaan_kegiatan" class="col-sm-3 control-label" align='left'>Status Pelaksanaan :</label>
                  <div class="col-sm-8" id="myRadio">
                      <label class="radio-inline">
                        <input type="radio" class="sPelaksanaan" name="status_pelaksanaan_kegiatan" id="status_pelaksanaan_kegiatan" value="0">Tepat Waktu
                      </label>
                      <label class="radio-inline">
                        <input type="radio" class="sPelaksanaan" name="status_pelaksanaan_kegiatan" id="status_pelaksanaan_kegiatan" value="1">Dimajukan
                      </label>
                      <label class="radio-inline">
                        <input type="radio" class="sPelaksanaan" name="status_pelaksanaan_kegiatan" id="status_pelaksanaan_kegiatan" value="2">Ditunda
                      </label>
                      <label class="radio-inline">
                        <input type="radio" class="sPelaksanaan" name="status_pelaksanaan_kegiatan" id="status_pelaksanaan_kegiatan" value="3">Dibatalkan
                      </label>
                      <label class="radio-inline" id="status_pelaksanaan_keg4">
                        <input type="radio" class="sPelaksanaan" name="status_pelaksanaan_kegiatan" id="status_pelaksanaan_kegiatan" value="4">Baru
                      </label>
                  </div>
                </div>
                <div class="form-group KetPelaksanaan_keg">
                  <label for="keterangan_status_kegiatan" class="col-sm-3 control-label" align='left'>Keterangan Pelaksanaan :</label>
                  <div class="col-sm-8">
                    <textarea type="text" class="form-control keterangan_status_kegiatan" name="keterangan_status_kegiatan" id="keterangan_status_kegiatan" rows="3" disabled></textarea>
                  </div>
                </div>
              </form>
            </div>
              <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusKeg">
                        <button type="button" class="btn btn-danger btnHapusKeg btn-labeled">
                            <span class="btn-label"><i class="fa fa-trash fa-fw fa-lg"></i></span>Hapus</button>
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-success btnKegiatan btn-labeled" data-dismiss="modal">
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

 <div id="ModalIndikatorKeg" class="modal fade" role="dialog" data-backdrop="static">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" id="id_indikator_kegiatan_renja" name="id_indikator_kegiatan_renja">
              <input type="hidden" id="id_renja_indikatorKeg" name="id_renja_indikatorKeg">
              <div class="form-group">
                <label class="control-label col-sm-3" for="id">No Urut :</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control number" id="no_urut_indikatorKeg" disabled>
                </div>
                <div class="col-sm-3 chkIndikatorKeg">
                    <label class="checkbox-inline">
                    <input class="checkIndikatorKeg" type="checkbox" name="checkIndikatorKeg" id="checkIndikatorKeg" value="1"> Telah Direviu</label>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="title">Uraian Indikator Kegiatan Renja:</label>
                <div class="col-sm-8">
                  <textarea type="name" class="form-control" id="ur_indikatorKeg_renja" rows="3" disabled></textarea>
                </div>
                <input type="hidden" id="kd_indikatorKeg_renja" name="kd_indikatorKeg_renja">
                <span class="btn btn-primary btnCariIndiKeg" id="btnCariIndiKeg" name="btnCariIndiKeg"><i class="fa fa-search fa-fw fa-lg"></i></span>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="title">Uraian Tolok Ukur Kegiatan Renja:</label>
                <div class="col-sm-8">
                  <textarea type="name" class="form-control" id="ur_tolokukur_keg" rows="3" disabled></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="target_indikatorKeg_renstra" class="col-sm-3 control-label" align='left'>Target Capaian Menurut Renstra :</label>
                <div class="col-sm-2">
                  <input type="text" class="form-control number" id="target_indikatorKeg_renstra" name="target_indikatorKeg_renstra" disabled >
                </div>
                <label for="target_indikatorKeg_renja" class="col-sm-3 control-label" align='left'>Target Capaian Menurut Renja :</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control number" id="target_indikatorKeg_renja" name="target_indikatorKeg_renja" required="required" >
                </div>
              </div>
            </form>
          </div>
              <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusIndikatorKeg">
                        <button type="button" class="btn btn-danger btnHapusIndikatorKeg btn-labeled">
                            <span class="btn-label"><i class="fa fa-trash fa-fw fa-lg"></i></span>Hapus</button>
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-success btnIndikatorKeg btn-labeled" data-dismiss="modal">
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

<div id="cariProgramRenstra" class="modal fade" role="dialog" tabindex="-1" data-focus-on="input:first" data-backdrop="static">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
           <div class="form-group">
             <div class="col-sm-12">
                <table id='tblCariProgramRenstra' class="table display table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                          <tr>
                            <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                            {{-- <th width="10%" style="text-align: center; vertical-align:middle">Kode Renstra</th> --}}
                            <th style="text-align: center; vertical-align:middle">Uraian Program Renstra</th>
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
                    <div class="col-sm-2 text-left idbtnHapusKeg">
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


<div id="cariKegiatanRenstra" class="modal fade" role="dialog" tabindex="-1" data-focus-on="input:first" data-backdrop="static">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
          {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> --}}
          <h4 class="modal-title"></h4>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
           <div class="form-group">
             <div class="col-sm-12">
                <table id='tblCariKegiatanRenstra' class="table display table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                          <tr>
                            <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                            {{-- <th width="10%" style="text-align: center; vertical-align:middle">Kode Renstra</th> --}}
                            <th style="text-align: center; vertical-align:middle">Uraian Kegiatan Renstra</th>
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
                    <div class="col-sm-2 text-left idbtnHapusKeg">
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

<div id="cariKegiatanRef" class="modal fade" role="dialog" tabindex="-1" data-focus-on="input:first" data-backdrop="static">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> --}}
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
           <div class="form-group">
             <div class="col-sm-12">
                <table id='tblCariKegiatanRef' class="table display table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                          <tr>
                            <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                            <th width="10%" style="text-align: center; vertical-align:middle">Kode Kegiatan</th>
                            <th style="text-align: center; vertical-align:middle">Uraian Kegiatan</th>
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
                    <div class="col-sm-2 text-left idbtnHapusKeg">
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

<div id="cariProgramRef" class="modal fade" role="dialog" tabindex="-1" data-focus-on="input:first" data-backdrop="static" >
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
            <div class="form-group">
              <label class="control-label col-sm-2" for="kd_bidang">Bidang :</label>
              <div class="col-sm-8">
                <select type="text" class="form-control kd_bidang" id="kd_bidang" name="kd_bidang"></select>
              </div>
            </div>
           <div class="form-group">
             <div class="col-sm-12">
                <table id='tblCariProgramRef' class="table display table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                          <tr>
                            <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                            <th width="10%" style="text-align: center; vertical-align:middle">Kode Program</th>
                            <th style="text-align: center; vertical-align:middle">Uraian Program</th>
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
                    <div class="col-sm-2 text-left idbtnHapusKeg">
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

  <div id="cariIndikator" class="modal fade" role="dialog" tabindex="-1" data-focus-on="input:first" data-backdrop="static">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
           <div class="form-group">
             <div class="col-sm-12">
                <table id='tblCariIndikator' class="table display table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                          <tr>
                            <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                            <th style="text-align: center; vertical-align:middle">Uraian Indikator</th>
                            <th width="10%" style="text-align: center; vertical-align:middle">Jenis Indikator</th>
                            <th width="10%" style="text-align: center; vertical-align:middle">Sifat Indikator</th>
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
                    <div class="col-sm-2 text-left idbtnHapusKeg">
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

<div id="StatusProgram" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
            <h4 style="text-align: center;">Perubahan Status Program Renja</h4>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id_program_renja_posting" name="id_program_renja_posting">
            <input type="hidden" id="status_program_renja_posting" name="status_program_renja_posting">
            <input type="hidden" id="status_pelaksanaan_renja_posting" name="status_pelaksanaan_renja_posting">
            <input type="hidden" id="tahun_renja_posting" name="tahun_renja_posting">
            <div class="alert alert-success">
                <div>
                  <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border text-info"  aria-hidden="true"></i>
                  <p>Yakin akan melakukan proses <strong><i><span id="ur_status_posting"></span></i></strong> pada program : <strong><span id="ur_program_renja_posting"></span></strong> ?</p>
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

<div id="StatusKegiatan" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
            <h4 style="text-align: center;">Perubahan Status Kegiatan Renja</h4>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id_kegiatan_renja_posting" name="id_kegiatan_renja_posting">
            <input type="hidden" id="status_kegiatan_renja_posting" name="status_kegiatan_renja_posting">
            <input type="hidden" id="status_pelaksanaan_kegiatan_posting" name="status_pelaksanaan_kegiatan_posting">
            <input type="hidden" id="tahun_kegiatan_renja_posting" name="tahun_renja_posting">
            <div class="alert alert-success">
                <div>
                  <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border text-info"  aria-hidden="true"></i>
                  <p>Yakin akan melakukan proses <strong><i><span id="ur_kegiatan_status_posting"></span></i></strong> pada kegiatan : <strong><span id="ur_kegiatan_renja_posting"></span></strong> ?</p>
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
                        <button type="button" id="btnPostKegiatan" class="btn btn-success btn-labeled" data-dismiss="modal">
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

@endsection

@section('scripts')
<script>
$(document).ready(function(){
  
var detInProg = Handlebars.compile($("#details-inProg").html());
var detInKeg = Handlebars.compile($("#details-inKeg").html());

  function createPesan(message, type) {
    var html = '<div id="pesanx" class="alert alert-' + type + ' alert-dismissable flyover flyover-bottom in">';    
    html += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
    // html += '<i class="fa fa-exclamation fa-lg fa-fw" aria-hidden="true"></i>';
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

var prog_rpjmd;
var prog_rkpd;
var prog_renja;
var prog_renstra;
var keg_renja;
var keg_renstra;
var id_ranwal_temp;
var id_renja_program_temp;
var tahun_temp;
var unit_temp;
var id_program_renstra_temp;
var id_renja_temp;

$('#target_indikator_renstra').number(true,2,',', '.');
$('#target_indikator_renja').number(true,2,',', '.');
$('#pagu_renstra').number(true,2,',', '.');
$('#pagu_renja_kegiatan').number(true,2,',', '.');
$('#pagu_selanjutnya').number(true,2,',', '.');
$('#target_indikatorKeg_renstra').number(true,2,',', '.');
$('#target_indikatorKeg_renja').number(true,2,',', '.');

$('#no_urut_program').number(true,0,',', '.');
$('#no_urut_indikator').number(true,0,',', '.');
$('#no_urut_kegiatan').number(true,0,',', '.');
$('#no_urut_indikatorKeg').number(true,0,',', '.');

$('.display').DataTable({
      dom : 'BfRtip',
      autoWidth : false,
      bDestroy: true
  });

$.ajax({

    type: "GET",
    url: './sesuai/getUnitRenja',
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

$('#divTambahProg').hide();
$('#divTambahKegiatan').hide();

$(".disabled").click(function (e) {
        e.preventDefault();
        return false;
});

function back2rkpd(){
  $('#divTambahProg').hide();
  $('#divTambahKegiatan').hide();

  $('.nav-tabs a[href="#program"]').tab('show');
  $('#tblProgramRKPD').DataTable().ajax.url("./sesuai/getProgramRkpd/"+$('#tahun_rkpd').val()+"/"+$('#id_unit').val()).load();
}

$(document).on('click', '.backRkpd', function() {
  back2rkpd();
});

function back2renja(){
  $('#divTambahProg').show();
  $('#divTambahKegiatan').hide();

  $('.nav-tabs a[href="#programrenja"]').tab('show');
  loadTblRekap(tahun_temp,unit_temp,id_ranwal_temp);
}

$(document).on('click', '.backRenja', function() {
  back2renja();
});
    
var programrkpd = $('#tblProgramRKPD').DataTable({
                  processing: true,
                  serverSide: true,
                  autoWidth : false,
                  dom : 'BFRtIp',
                  "ajax": {"url": "./sesuai/getProgramRkpd/0/0"},
                  "language": {
                      "decimal": ",",
                      "thousands": "."},
                  "columns": [
                        { data: 'urut', sClass: "dt-center"},
                        { data: 'uraian_rkpd'},
                        { data: 'jml_program', sClass: "dt-center"},
                        { data: 'jml_indikator', sClass: "dt-center"},
                        { data: 'jml_kegiatan', sClass: "dt-center"},
                        { data: 'jml_pagu', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
    });

$( "#id_unit" ).change(function() {

  $('.nav-tabs a[href="#program"]').tab('show');
  // $('#tblProgramRKPD').DataTable().ajax.url("./sesuai/getProgramRkpd/"+$('#tahun_rkpd').val()+"/"+$('#id_unit').val()).load();
  $('#judul').html('<b>Penyesuaian Data Renstra yang dilaksanakan oleh '+$('#id_unit option:selected').text()+'</b>');

  back2rkpd(); 

});

$('#tblProgramRKPD tbody').on( 'dblclick', 'tr', function () {

    var data = programrkpd.row(this).data();

    prog_rpjmd = data.uraian_program_rpjmd;
    prog_rkpd = data.uraian_rkpd;
    id_ranwal_temp = data.id_rkpd_ranwal;
    tahun_temp = $('#tahun_rkpd').val();
    unit_temp = $('#id_unit').val();

    document.getElementById("nm_program_rpjmd_progrenja").innerHTML =prog_rpjmd;
    document.getElementById("nm_program_rkpd_progrenja").innerHTML =prog_rkpd;

    // $('.nav-tabs a[href="#programrenja"]').tab('show');
    // loadTblRekap($('#tahun_rkpd').val(),$('#id_unit').val(),data.id_rkpd_ranwal);

    back2renja();

});

$(document).on('click', '.view-rekap', function() {

    prog_rpjmd = $(this).data('uraian_program_rpjmd');
    prog_rkpd = $(this).data('uraian_rkpd');
    id_ranwal_temp = $(this).data('id_rkpd_ranwal');
    tahun_temp = $('#tahun_rkpd').val();
    unit_temp = $('#id_unit').val();

    document.getElementById("nm_program_rpjmd_progrenja").innerHTML =prog_rpjmd;
    document.getElementById("nm_program_rkpd_progrenja").innerHTML =prog_rkpd;

    // $('.nav-tabs a[href="#programrenja"]').tab('show');
    // loadTblRekap($('#tahun_rkpd').val(),$('#id_unit').val(),$(this).data('id_rkpd_ranwal'));

    back2renja();
});

var tblProgRenja;
function loadTblRekap(tahun,unit,ranwal){
   tblProgRenja=$('#tblProgramRenja').DataTable({
                  processing: true,
                  serverSide: true,
                  autoWidth : false,
                  dom : 'BFRtIp',
                  "ajax": {"url": "./sesuai/getProgramRenja/"+tahun+"/"+unit+"/"+ranwal},
                  "language": {
                      "decimal": ",",
                      "thousands": "."},
                  "columns": [
                        {
                            "className":      'details-control',
                            "orderable":      false,
                            "searchable":      false,
                            "data":           null,
                            "defaultContent": '',
                            "width" : "5px"
                        },
                        { data: 'urut', sClass: "dt-center"},
                        { data: 'uraian_program_renja'},
                        { data: 'jml_indikator', sClass: "dt-center"},
                        { data: 'jml_0i', sClass: "dt-center"},
                        { data: 'jml_kegiatan', sClass: "dt-center"},
                        { data: 'jml_0k', sClass: "dt-center"},
                        { data: 'jml_pagu', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'icon','searchable': false, 'orderable':false,sClass: "dt-center",
                            render: function(data, type, row,meta) {
                            return '<i class="'+row.status_icon+'" style="font-size:16px;color:'+row.warna+';"/>';
                          }},
                        { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        });
}

var tblInProg;
function initInProg(tableId, data) {
    tblInProg=$('#' + tableId).DataTable({
            processing: true,
            serverSide: true,
            ajax: data.details_url,
            dom : 'BFRtIP',
            autoWidth: false,
            "language": {
                      "decimal": ",",
                      "thousands": "."},
            "columns": [
                        { data: 'urut', sClass: "dt-center"},
                        { data: 'uraian_indikator_program_renja'},
                        { data: 'target_renstra', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'target_renja', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'icon','searchable': false, 'orderable':false, sClass: "dt-center",
                            render: function(data, type, row,meta) {
                            return '<i class="'+row.status_icon+'" style="font-size:16px;color:'+row.warna+';"/>';
                          }},
                        { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
                      ],
            "order": [[0, 'asc']],
            "bDestroy": true
        })

}

$('#tblProgramRenja tbody').on('click', 'td.details-control', function () {

        var tr = $(this).closest('tr');
        var row = tblProgRenja.row( tr );
        var tableId = 'inProg-' + row.data().id_renja_program;

        if (row.child.isShown()) {
            row.child.hide();
            tr.removeClass('shown');
        } else {
            row.child(detInProg(row.data())).show();
            initInProg(tableId, row.data());
            tr.addClass('shown');
            tr.next().find('td').addClass('no-padding bg-gray');
        }    
  });

$('#tblProgramRenja tbody').on('dblclick', 'tr', function () {

   var data = tblProgRenja.row(this).data();

    prog_renja=data.uraian_program_renja;
    prog_renstra=data.uraian_program_renstra;
    id_renja_program_temp=data.id_renja_program;
    id_program_ref_temp=data.id_program_ref;
    id_program_renstra_temp=data.id_program_renstra;

    document.getElementById("nm_program_renstra_kegrenja").innerHTML =prog_renstra;
    document.getElementById("nm_program_rkpd_kegrenja").innerHTML =prog_rkpd;
    document.getElementById("nm_program_renja_kegrenja").innerHTML =prog_renja;

    $('#divTambahProg').hide();
    $('#divTambahKegiatan').show();

    $('.nav-tabs a[href="#kegiatanrenja"]').tab('show');
    loadTblKegiatanRenja(data.id_renja_program); 

  });


$(document).on('click', '.view-kegiatan', function() {

    var data = tblKegRenja.row( $(this).parents('tr') ).data(); 

    prog_renja=data.uraian_program_renja;
    prog_renstra=data.uraian_program_renstra;
    id_renja_program_temp=data.id_renja_program;
    id_program_ref_temp=data.id_program_ref;
    id_program_renstra_temp=data.id_program_renstra

    document.getElementById("nm_program_renstra_kegrenja").innerHTML =prog_renstra;
    document.getElementById("nm_program_rkpd_kegrenja").innerHTML =prog_rkpd;
    document.getElementById("nm_program_renja_kegrenja").innerHTML =prog_renja;

    $('#divTambahProg').hide();
    $('#divTambahKegiatan').show();

    $('.nav-tabs a[href="#kegiatanrenja"]').tab('show');
    loadTblKegiatanRenja(data.id_renja_program);
});

var tblKegRenja;
function loadTblKegiatanRenja(id_program){
    tblKegRenja=$('#tblKegiatanRenja').DataTable({
                  processing: true,
                  serverSide: true,
                  autoWidth : false,
                  dom : 'BFRtIp',
                  "ajax": {"url": "./sesuai/getKegiatanRenja/"+id_program},
                  "language": {
                      "decimal": ",",
                      "thousands": "."},
                  "columns": [
                        {
                            "className":      'details-control',
                            "orderable":      false,
                            "searchable":      false,
                            "data":           null,
                            "defaultContent": '',
                            "width" : "5px"
                        },
                        { data: 'urut', sClass: "dt-center"},
                        { data: 'uraian_kegiatan_renja'},
                        { data: 'jml_indikator', sClass: "dt-center"},
                        { data: 'jml_0i', sClass: "dt-center"},
                        { data: 'pagu_tahun_kegiatan', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'icon','searchable': false, 'orderable':false, sClass: "dt-center",
                            render: function(data, type, row,meta) {
                            return '<i class="'+row.status_icon+'" style="font-size:16px;color:'+row.warna+';"/>';
                          }},
                        { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        });
}

var tblInKeg;
function initInKeg(tableId, data) {
    tblInKeg=$('#' + tableId).DataTable({
            processing: true,
            serverSide: true,
            ajax: data.details_url,
            dom : 'BFRtIP',
            autoWidth: false,
            "language": {
                      "decimal": ",",
                      "thousands": "."},
            "columns": [
                        { data: 'urut', sClass: "dt-center"},
                        { data: 'uraian_indikator_kegiatan_renja'},
                        { data: 'angka_renstra', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'angka_tahun', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'icon','searchable': false, 'orderable':false, sClass: "dt-center",
                            render: function(data, type, row,meta) {
                            return '<i class="'+row.status_icon+'" style="font-size:16px;color:'+row.warna+';"/>';
                          }},
                        { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        })

}

$('#tblKegiatanRenja tbody').on('click', 'td.details-control', function () {

        var tr = $(this).closest('tr');
        var row = tblKegRenja.row( tr );
        var tableId = 'inKeg-' + row.data().id_renja;

        if (row.child.isShown()) {
            row.child.hide();
            tr.removeClass('shown');
        } else {
            row.child(detInKeg(row.data())).show();
            initInKeg(tableId, row.data());
            tr.addClass('shown');
            tr.next().find('td').addClass('no-padding bg-gray');
        }    
  });

var cariProgramRen;
$(document).on('click', '.btnCariProgramRenstra', function() {    
    $('#judulModal').text('Daftar Program Renstra pada ' + $('#id_unit option:selected').text());
    $('#cariProgramRenstra').modal('show');

    cariProgramRen = $('#tblCariProgramRenstra').DataTable( {
        processing: true,
        serverSide: true,
        dom: 'bfrtIp',
        "ajax": {"url": "./sesuai/getProgRenstra/"+unit_temp},
        "columns": [
              { data: 'no_urut', sClass: "dt-center"},
              // { data: 'kd_program', sClass: "dt-center"},
              { data: 'uraian_program_renstra'}
            ],
        "order": [[0, 'asc']],
        "bDestroy": true
    });

    $('#tblCariProgramRen').DataTable().ajax.reload();
  });

$('#tblCariProgramRenstra tbody').on( 'dblclick', 'tr', function () {
    var data = cariProgramRen.row(this).data();

    document.getElementById("id_visi_renstra").value = data.id_visi_renstra;
    document.getElementById("id_misi_renstra").value = data.id_misi_renstra;
    document.getElementById("id_tujuan_renstra").value = data.id_tujuan_renstra;
    document.getElementById("id_sasaran_renstra").value = data.id_sasaran_renstra;
    document.getElementById("id_program_renstra").value = data.id_program_renstra;
    document.getElementById("ur_program_renstra").value = data.uraian_program_renstra;

    $('#cariProgramRenstra').modal('hide');  
  } );

var cariProgramRef;
$( ".kd_bidang" ).change(function() {
  cariProgramRef = $('#tblCariProgramRef').DataTable({
        processing: true,
        serverSide: true,
        dom: 'BFRtIp',
        "ajax": {"url": "./sesuai/getProgRef/"+$('.kd_bidang').val()},
        "columns": [
              { data: 'no_urut', sClass: "dt-center"},
              { data: 'kd_program', sClass: "dt-center"},
              { data: 'uraian_program'}
            ],
        "order": [[0, 'asc']],
        "bDestroy": true
    });
}); 

$(document).on('click', '.btnCariProgramRef', function() {
  $('#judulModal').text('Daftar Program yang terdapat dalam Referensi Program');    
    $('#cariProgramRef').modal('show');
    $('#tblCariProgramRef').DataTable().ajax.url("./sesuai/getProgRef/0").load();

    $.ajax({
          type: "GET",
          url: './sesuai/getBidang/'+unit_temp+'/'+id_ranwal_temp,
          dataType: "json",

          success: function(data) {

          var j = data.length;
          var post, i;

          $('select[name="kd_bidang"]').empty();
          $('select[name="kd_bidang"]').append('<option value="0">---Pilih Kode Bidang---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="kd_bidang"]').append('<option value="'+ post.id_bidang +'">'+ post.nm_bidang +'</option>');
          }
        }
      });
  });

$('#tblCariProgramRef tbody').on( 'dblclick', 'tr', function () {
    var data = cariProgramRef.row(this).data();

    document.getElementById("id_program_ref").value = data.id_program;
    document.getElementById("ur_program_ref").value = data.kd_program +" - "+data.uraian_program;
    document.getElementById("ur_program_renja").value = data.uraian_program;
    $('#cariProgramRef').modal('hide');

    // alert($('#id_program_ref').val());

  });

var cariindikator
$(document).on('click', '.btnCariIndi', function() {    
    $('#judulModal').text('Daftar Indikator yang terdapat dalam RPJMD/Renstra');    
    $('#cariIndikator').modal('show');

    cariindikator = $('#tblCariIndikator').DataTable( {
        processing: true,
        serverSide: true,
        dom: 'bfrtIp',
        "ajax": {"url": "./sesuai/getRefIndikator"},
        "columns": [
              { data: 'no_urut'},
              { data: 'nm_indikator'},
              { data: 'jenis_display'},
              { data: 'sifat_display'}
            ],
        "order": [[0, 'asc']],
        "bDestroy": true
    });
  });

$(document).on('click', '.btnCariIndiKeg', function() {    
    $('#judulModal').text('Daftar Indikator yang terdapat dalam RPJMD/Renstra');    
    $('#cariIndikator').modal('show');

    cariindikator = $('#tblCariIndikator').DataTable( {
        processing: true,
        serverSide: true,
        dom: 'bfrtIp',
        "ajax": {"url": "./sesuai/getRefIndikator"},
        "columns": [
              { data: 'no_urut'},
              { data: 'nm_indikator'},
              { data: 'jenis_display'},
              { data: 'sifat_display'}
            ],
        "order": [[0, 'asc']],
        "bDestroy": true
    });
  });

  $('#tblCariIndikator tbody').on( 'dblclick', 'tr', function () {
    var data = cariindikator.row(this).data();

    document.getElementById("ur_indikator_renja").value = data.nm_indikator;
    document.getElementById("kd_indikator_renja").value = data.id_indikator;

    document.getElementById("ur_indikatorKeg_renja").value = data.nm_indikator;
    document.getElementById("kd_indikatorKeg_renja").value = data.id_indikator;

    $('#cariIndikator').modal('hide');    

  });

var cariKegiatanRef
$(document).on('click', '.btnCariKegiatanRef', function() {
  document.getElementById("judulModal").innerHTML ='Daftar Kegiatan yang terdapat dalam Referensi Kegiatan';
  $('#cariKegiatanRef').modal('show'); 

  cariKegiatanRef = $('#tblCariKegiatanRef').DataTable( {
        processing: true,
        serverSide: true,
        dom: 'bfrtIp',
        "ajax": {"url": "./sesuai/getKegRef/"+id_program_ref_temp},
        "columns": [
              { data: 'no_urut', sClass: "dt-center"},
              { data: 'kd_kegiatan', sClass: "dt-center"},
              { data: 'nm_kegiatan'}
            ],
        "order": [[0, 'asc']],
        "bDestroy": true
    });
});

$('#tblCariKegiatanRef tbody').on( 'dblclick', 'tr', function () {
    var data = cariKegiatanRef.row(this).data();

    document.getElementById("ur_kegiatan_ref").value = data.kd_kegiatan +' - '+data.nm_kegiatan;
    document.getElementById("ur_kegiatan_renja").value = data.nm_kegiatan;
    document.getElementById("id_kegiatan_ref").value = data.id_kegiatan;
    $('#cariKegiatanRef').modal('hide');    

  });

var cariKegiatanRen;
$(document).on('click', '.btnCariKegiatanRenstra', function() {  

    if(id_program_renstra_temp === null || id_program_renstra_temp === undefined || id_program_renstra_temp === "") {
        alert('Maaf Tidak ada kegiatan di Renstra SKPD')
    } else {
      $('#judulModal').text('Daftar Kegiatan Renstra pada ' + $('#id_unit option:selected').text());
      $('#cariKegiatanRenstra').modal('show'); 
      cariKegiatanRen = $('#tblCariKegiatanRenstra').DataTable( {
          processing: true,
          serverSide: true,
          dom: 'bfrtIp',
          "ajax": {"url": "./sesuai/getKegRenstra/"+unit_temp+"/"+id_program_renstra_temp},
          "columns": [
                { data: 'no_urut', sClass: "dt-center"},
                { data: 'uraian_kegiatan_renstra'}
              ],
          "order": [[0, 'asc']],
          "bDestroy": true
        });
      $('#tblCariKegiatanRen').DataTable().ajax.reload();
    }   

    
  });

$('#tblCariKegiatanRenstra tbody').on( 'dblclick', 'tr', function () {

    var data = cariKegiatanRen.row(this).data();

    document.getElementById("id_visi_renstra_keg").value = data.id_visi_renstra;
    document.getElementById("id_misi_renstra_keg").value = data.id_misi_renstra;
    document.getElementById("id_tujuan_renstra_keg").value = data.id_tujuan_renstra;
    document.getElementById("id_sasaran_renstra_keg").value = data.id_sasaran_renstra;
    document.getElementById("id_program_renstra_keg").value = data.id_program_renstra;
    document.getElementById("id_kegiatan_renstra").value = data.id_kegiatan_renstra;
    document.getElementById("ur_kegiatan_renstra").value = data.uraian_kegiatan_renstra;

    $('#cariKegiatanRenstra').modal('hide');    

  } );

function getStatusData(){

    var xCheck = document.querySelectorAll('input[name="status_pelaksanaan_program"]:checked');
    var xyz = [];
    for(var x = 0, l = xCheck.length; x < l;  x++)
      { xyz.push(xCheck[x].value); }
    var xvalues = xyz.join('');
    return xvalues;
  }

function getStatusKegiatan(){

    var xCheck = document.querySelectorAll('input[name="status_usulan_kegiatan"]:checked');
    var xyz = [];
    for(var x = 0, l = xCheck.length; x < l;  x++)
      { xyz.push(xCheck[x].value); }
    var xvalues = xyz.join('');
    return xvalues;
  }

function getStatusPelaksanaanKeg(){

    var xCheck = document.querySelectorAll('input[name="status_pelaksanaan_kegiatan"]:checked');
    var xyz = [];
    for(var x = 0, l = xCheck.length; x < l;  x++)
      { xyz.push(xCheck[x].value); }
    var xvalues = xyz.join('');
    return xvalues;
  }


function getStatusUsul(){

    var xCheck = document.querySelectorAll('input[name="status_usulan_program"]:checked');
    var xyz = [];
    for(var x = 0, l = xCheck.length; x < l;  x++)
      { xyz.push(xCheck[x].value); }
    var xvalues = xyz.join('');
    return xvalues;
  }

$('.skegiatan').change(function() {
    if(document.frmEditProgram.status_pelaksanaan_program.value==0){
      document.getElementById("keterangan_status_program").setAttribute("disabled","disabled");
      $('.KetPelaksanaan').hide();
    } else {
      document.getElementById("keterangan_status_program").removeAttribute("disabled");
      $('.KetPelaksanaan').show();
    }

  });

$('.sPelaksanaan').change(function() {
    if(document.frmModalKegiatan.status_pelaksanaan_kegiatan.value==0){
      document.getElementById("keterangan_status_kegiatan").setAttribute("disabled","disabled");
      $('.KetPelaksanaan_keg').hide();
    } else {
      document.getElementById("keterangan_status_kegiatan").removeAttribute("disabled");
      $('.KetPelaksanaan_keg').show();
    }

  });

$(document).on('click', '.add-programrenja', function() {
      $('.btnProgram').removeClass('editProgramRenstra');
      $('.btnProgram').addClass('addProgramRenstra');
      $('.modal-title').text('Tambah Data Program Renja pada '+$('#id_unit option:selected').text());
      $('.form-horizontal').show();      
      $('#id_rkpd_ranwal_program').val(id_ranwal_temp);
      $('#id_unit').val(unit_temp);
      $('#tahun_renja').val(tahun_temp);
      $('#jenis_belanja').val(0);
      $('#id_visi_renstra').val(null);
      $('#id_misi_renstra').val(null);
      $('#id_tujuan_renstra').val(null);
      $('#id_sasaran_renstra').val(null);
      $('#id_program_renstra').val(null);
      $('#ur_program_renstra').val(null);
      $('#ur_program_renja').val(null);
      $('#id_program_ref').val(null);
      $('#ur_program_ref').val(null);
      $('#no_urut_program').val(null);
      $('#keterangan_status_program').val(null);
      $('.idStatusPelaksanaan').hide();
      $('.idStatusUsulan').hide();
      $('.btnHapus').hide();
      $('.KetPelaksanaan').show();
      $('.btnCariProgramRef').show();
      $('.btnCariProgramRenstra').show();

      document.getElementById("keterangan_status_program").removeAttribute("disabled");
      document.getElementById("no_urut_program").removeAttribute("disabled");
      document.getElementById("ur_program_renja").removeAttribute("disabled");
      document.getElementById("jenis_belanja").removeAttribute("disabled");

      $(".skegiatan").attr('disabled', true);
      $(".usulan").attr('disabled', true);

      document.frmEditProgram.status_usulan_program[0].checked=true;
      document.frmEditProgram.status_pelaksanaan_program[4].checked=true;

      $('#ModalProgram').modal('show');

  });

  $('.modal-footer').on('click', '.addProgramRenstra', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: 'sesuai/addProgram',
          data: {
              '_token': $('input[name=_token]').val(),
              'no_urut': $('#no_urut_program').val(),
              'id_rkpd_ranwal': $('#id_rkpd_ranwal_program').val(),
              'tahun_renja': $('#tahun_renja').val(),
              'id_unit' : $('#id_unit').val() ,
              'jenis_belanja' : $('#jenis_belanja').val() ,
              'id_visi_renstra' : $('#id_visi_renstra').val() ,
              'id_misi_renstra' : $('#id_misi_renstra').val() ,
              'id_tujuan_renstra' : $('#id_tujuan_renstra').val(),
              'id_sasaran_renstra' : $('#id_sasaran_renstra').val() ,
              'id_program_renstra' : $('#id_program_renstra').val() ,
              'id_program_ref' : $('#id_program_ref').val() ,
              'uraian_program_renstra': $('#ur_program_renja').val(),
              'ket_usulan': $('#keterangan_status_program').val(),
          },
          success: function(data) {
              $('#tblProgramRenja').DataTable().ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
          }
      });
  });

  $(document).on('click', '.edit-program', function() {
        
      $('.btnProgram').removeClass('addProgramRenstra');
      $('.btnProgram').addClass('editProgramRenstra');
      $('.modal-title').text('Edit dan Reviu Program Renja pada '+$(this).data('nm_unit'));
      $('.idStatusUsulan').hide();
      $('.form-horizontal').show();
      $('#id_rkpd_ranwal_program').val($(this).data('id_rkpd_ranwal'));
      $('#id_renja_program').val($(this).data('id_renja_program'));
      $('#id_unit').val($(this).data('id_unit'));
      $('#jenis_belanja').val($(this).data('jenis_belanja'));
      $('#tahun_renja').val($(this).data('tahun_renja'));
      $('#id_visi_renstra').val($(this).data('id_visi_renstra'));
      $('#id_misi_renstra').val($(this).data('id_misi_renstra'));
      $('#id_tujuan_renstra').val($(this).data('id_tujuan_renstra'));
      $('#id_sasaran_renstra').val($(this).data('id_sasaran_renstra'));
      $('#id_program_renstra').val($(this).data('id_program_renstra'));
      $('#ur_program_renstra').val($(this).data('uraian_program_renstra'));
      $('#ur_program_renja').val($(this).data('uraian_program_renja'));
      $('#id_program_ref').val($(this).data('id_program_ref'));
      $('#ur_program_ref').val($(this).data('kd_program') +" - "+$(this).data('uraian_program_ref'));
      $('#no_urut_program').val($(this).data('no_urut'));
      $('#keterangan_status_program').val($(this).data('ket_usulan'));
      
      if($(this).data('sumber_data')==1){        
        document.getElementById("no_urut_program").removeAttribute("disabled");
        document.getElementById("ur_program_renja").removeAttribute("disabled");
        document.getElementById("jenis_belanja").removeAttribute("disabled");
      } else {
        document.getElementById("no_urut_program").setAttribute("disabled","disabled");
        document.getElementById("ur_program_renja").setAttribute("disabled","disabled");
        document.getElementById("jenis_belanja").setAttribute("disabled","disabled");
      }

      document.frmEditProgram.status_usulan_program[$(this).data('status_data')].checked=true;

      if($(this).data('status_pelaksanaan')==4){
          document.frmEditProgram.status_pelaksanaan_program[4].checked=true;
          document.frmEditProgram.status_pelaksanaan_program[4].style.visibility='hidden';        
          document.getElementById("status_pelaksanaan4").style.visibility='hidden';
          $('.idStatusPelaksanaan').hide();        
          $('.btnHapus').show();
          $('.btnCariProgramRef').show();
          $('.btnCariProgramRenstra').show();          
        } else {
            $('.idStatusPelaksanaan').show();
            document.frmEditProgram.status_pelaksanaan_program[$(this).data('status_pelaksanaan')].checked=true;
            document.frmEditProgram.status_pelaksanaan_program[4].style.visibility='hidden';        
            document.getElementById("status_pelaksanaan4").style.visibility='hidden';
            $('.btnHapus').hide();
            $('.btnCariProgramRef').hide();
            $('.btnCariProgramRenstra').hide();
        }      

      if($(this).data('status_pelaksanaan')==0){
          document.getElementById("keterangan_status_program").setAttribute("disabled","disabled");
          $('.KetPelaksanaan').hide();
        } else {
            document.getElementById("keterangan_status_program").removeAttribute("disabled");
            $('.KetPelaksanaan').show();
        }

      $(".skegiatan").attr('disabled', false);
      $(".usulan").attr('disabled', false);

      $('#ModalProgram').modal('show');
  });

$('.modal-footer').on('click', '.editProgramRenstra', function() {
      
                    $.ajaxSetup({
                       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
                    });

                    $.ajax({
                      type: 'post',
                      url: 'sesuai/editProgram',
                      data: {
                          '_token': $('input[name=_token]').val(),
                          'no_urut': $('#no_urut_program').val(),
                          'id_rkpd_ranwal': $('#id_rkpd_ranwal_program').val(),
                          'id_renja_program': $('#id_renja_program').val(),
                          'tahun_renja': $('#tahun_renja').val(),
                          'id_unit' : $('#id_unit').val() ,
                          'jenis_belanja' : $('#jenis_belanja').val() ,
                          'id_visi_renstra' : $('#id_visi_renstra').val() ,
                          'id_misi_renstra' : $('#id_misi_renstra').val() ,
                          'id_tujuan_renstra' : $('#id_tujuan_renstra').val(),
                          'id_sasaran_renstra' : $('#id_sasaran_renstra').val() ,
                          'id_program_renstra' : $('#id_program_renstra').val() ,
                          'id_program_ref' : $('#id_program_ref').val() ,
                          'uraian_program_renstra': $('#ur_program_renja').val(),
                          'ket_usulan': $('#keterangan_status_program').val(),
                          'status_data' : getStatusUsul(),
                          'status_pelaksanaan' : getStatusData(),
                      },
                        success: function(data) {
                            $('#tblProgramRenja').DataTable().ajax.reload();
                            if(data.status_pesan==1){
                              createPesan(data.pesan,"success");
                              } else {
                              createPesan(data.pesan,"danger"); 
                              }
                        }
                    });
                     
  });

$(document).on('click', '.btnHapus', function() {
  var x = confirm("Anda yakin akan menghapus data program "+$('#ur_program_renja').val()+" ?");
  if (x) {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      type: 'post',
      url: 'sesuai/hapusProgram',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_renja_program': $('#id_renja_program').val()
      },
      success: function(data) {
        $('#ModalProgram').modal('hide'); 
        $('#tblProgramRenja').DataTable().ajax.reload();
        createPesan(data.pesan,"success");
      }
    });
   } 
  else {    
    return false;
  }
});

$(document).on('click', '.add-indikator', function() {
      $('.btnIndikator').removeClass('editIndikator');
      $('.btnIndikator').addClass('addIndikator');
      $('.modal-title').text('Tambah Target Capaian Program Renja');
      $('.form-horizontal').show();
      $('#id_renja_program').val($(this).data('id_renja_program'));
      $('#kd_indikator_renja').val(null);
      $('#id_indikator_program_renja').val(null);
      $('#no_urut_indikator').val(null);
      $('#ur_indikator_renja').val(null);
      $('#ur_tolokukur_renja').val(null);
      $('#target_indikator_renstra').val(0);
      $('#target_indikator_renja').val(0);


      document.getElementById("no_urut_indikator").removeAttribute("disabled");
      document.getElementById("ur_tolokukur_renja").removeAttribute("disabled");

      $('.btnCariIndi').show();
      $('.btnHapusIndikator').hide();
      $('.chkIndikator').hide();

      $('#ModalIndikator').modal('show');
  });

$('.modal-footer').on('click', '.addIndikator', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: 'sesuai/addIndikatorRenja',
          data: {
              '_token': $('input[name=_token]').val(),
              'tahun_renja': tahun_temp,
              'no_urut': $('#no_urut_indikator').val(),
              'id_renja_program': $('#id_renja_program').val(),
              'kd_indikator': $('#kd_indikator_renja').val(),
              'uraian_indikator': $('#ur_indikator_renja').val(),
              'tolok_ukur_indikator': $('#ur_tolokukur_renja').val(),
              'target_renja': $('#target_indikator_renja').val(),
          },
          success: function(data) {
              // $('#tblIndikatorRenja').DataTable().ajax.reload();
              // $('#tblProgramRenja').DataTable().ajax.reload();
              tblInProg.ajax.reload();
              tblProgRenja.ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
              
          }
      });
  });

  $(document).on('click', '.edit-indikator', function() {
      $('.btnIndikator').removeClass('addIndikator');
      $('.btnIndikator').addClass('editIndikator');
      $('.modal-title').text('Edit dan Reviu Target Capaian Program RKPD');
      $('.form-horizontal').show();
      $('#id_indikator_program_renja').val($(this).data('id_indikator_program_renja'));
      $('#id_renja_program').val($(this).data('id_renja_program'));
      $('#kd_indikator_renja').val($(this).data('kd_indikator_renja'));
      $('#no_urut_indikator').val($(this).data('no_urut'));
      $('#ur_indikator_renja').val($(this).data('uraian_indikator_program_renja'));
      $('#ur_tolokukur_renja').val($(this).data('ur_tolokukur_renja'));
      $('#target_indikator_renstra').val($(this).data('target_renstra'));
      $('#target_indikator_renja').val($(this).data('target_renja'));
      
      if($(this).data('sumber_data')==1){
        document.getElementById("no_urut_indikator").removeAttribute("disabled");
        $('.btnCariIndi').show();
        $('.btnHapusIndikator').show();
        document.getElementById("ur_tolokukur_renja").removeAttribute("disabled");
      } else {
        document.getElementById("no_urut_indikator").setAttribute("disabled","disabled");
        $('.btnCariIndi').hide();
        $('.btnHapusIndikator').hide();
        document.getElementById("ur_tolokukur_renja").setAttribute("disabled","disabled");
      }

      $('.chkIndikator').show();
      if($(this).data('status_data')==1){
        $('.checkIndikator').prop('checked',true);
      } else {
        $('.checkIndikator').prop('checked',false);
      }
    
      $('#ModalIndikator').modal('show');
    });

  $('.modal-footer').on('click', '.editIndikator', function() {

      if (document.getElementById("checkIndikator").checked){
        check_data = 1
      } else {
        check_data = 0
      }

      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: 'sesuai/editIndikatorRenja',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_indikator_program_renja':$('#id_indikator_program_renja').val(),
              'no_urut': $('#no_urut_indikator').val(),
              'id_renja_program': $('#id_renja_program').val(),
              'kd_indikator': $('#kd_indikator_renja').val(),
              'uraian_indikator': $('#ur_indikator_renja').val(),
              'tolok_ukur_indikator': $('#ur_tolokukur_renja').val(),
              'target_renja': $('#target_indikator_renja').val(),
              'status_data': check_data,
          },
          success: function(data) {
              tblInProg.ajax.reload();
              tblProgRenja.ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
          }
      });
  });

$(document).on('click', '.btnHapusIndikator', function() {


  var x = confirm("Anda yakin akan menghapus data indikator "+$('#ur_indikator_renja').val()+" ?");

  if (x) {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      type: 'post',
      url: 'sesuai/hapusIndikatorRenja',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_indikator_program_renja': $('#id_indikator_program_renja').val()
      },
      success: function(data) {
        $('#ModalIndikator').modal('hide');
        tblInProg.ajax.reload();
        tblProgRenja.ajax.reload();
        createPesan(data.pesan,"success");
      }
    });
   } 
  else {    
    return false;
  }
});

$(document).on('click', '.add-kegiatan', function() {
      $('.btnKegiatan').removeClass('editKegiatanRenja');
      $('.btnKegiatan').addClass('addKegiatanRenja');
      $('.modal-title').text('Tambah Data Kegiatan Renja pada '+$('#id_unit option:selected').text());
      $('.form-horizontal').show(); 
      $('#id_renja_kegiatan').val(null);
      $('#id_rkpd_ranwal_kegiatan').val(id_ranwal_temp);
      $('#tahun_renja_kegiatan').val(tahun_temp);
      $('#id_renja_program_kegiatan').val(id_renja_program_temp);
      $('#id_unit_kegiatan').val(unit_temp);
      $('#id_visi_renstra_keg').val(null);
      $('#id_misi_renstra_keg').val(null);
      $('#id_tujuan_renstra_keg').val(null);
      $('#id_sasaran_renstra_keg').val(null);
      $('#id_program_renstra_keg').val(null);
      $('#id_kegiatan_renstra').val(null);
      $('#ur_kegiatan_renstra').val(null);
      $('#ur_kegiatan_renja').val(null);
      $('#id_kegiatan_ref').val(null);
      $('#ur_kegiatan_ref').val(null);
      $('#no_urut_kegiatan').val(null);
      $('#pagu_renstra').val(0);
      $('#pagu_renja_kegiatan').val(0);
      $('#pagu_selanjutnya').val(0);
      $('#keterangan_status_kegiatan').val(null);
      $('.idStatusPelaksanaan_keg').hide();
      $('.btnHapusKeg').hide();
      $('.KetPelaksanaan_keg').show();
      $('.btnCariKegiatanRef').show();
      $('.btnCariKegiatanRenstra').show();

      document.getElementById("keterangan_status_kegiatan").removeAttribute("disabled");
      document.getElementById("no_urut_kegiatan").removeAttribute("disabled");
      document.getElementById("ur_kegiatan_renja").removeAttribute("disabled");

      $(".sPelaksanaan").attr('disabled', true);

      document.frmModalKegiatan.status_pelaksanaan_kegiatan[4].checked=true;

      $('#ModalKegiatan').modal('show');
  });

$('.modal-footer').on('click', '.addKegiatanRenja', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: 'sesuai/addKegiatanRenja',
          data: {
              '_token': $('input[name=_token]').val(),
              'no_urut': $('#no_urut_kegiatan').val(),
              'tahun_renja': $('#tahun_renja_kegiatan').val(),
              'id_renja_program' : $('#id_renja_program_kegiatan').val() ,
              'id_rkpd_ranwal': $('#id_rkpd_ranwal_kegiatan').val(),             
              'id_unit' : $('#id_unit_kegiatan').val() ,
              'id_visi_renstra' : $('#id_visi_renstra_keg').val() ,
              'id_misi_renstra' : $('#id_misi_renstra_keg').val() ,
              'id_tujuan_renstra' : $('#id_tujuan_renstra_keg').val(),
              'id_sasaran_renstra' : $('#id_sasaran_renstra_keg').val() ,
              'id_program_renstra' : $('#id_program_renstra_keg').val() ,
              'id_kegiatan_renstra' : $('#id_kegiatan_renstra').val() ,
              'id_kegiatan_ref' : $('#id_kegiatan_ref').val() ,
              'uraian_kegiatan_renstra': $('#ur_kegiatan_renja').val(),
              'pagu_tahun_kegiatan' : $('#pagu_renja_kegiatan').val() ,
              'pagu_tahun_selanjutnya' : $('#pagu_selanjutnya').val() ,
              'ket_usulan': $('#keterangan_status_kegiatan').val(),

          },
          success: function(data) {
              $('#tblKegiatanRenja').DataTable().ajax.reload();
              $('#tblProgramRenja').DataTable().ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
          }
      });
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
      $('#id_visi_renstra_keg').val($(this).data('id_visi_renstra'));
      $('#id_misi_renstra_keg').val($(this).data('id_misi_renstra'));
      $('#id_tujuan_renstra_keg').val($(this).data('id_tujuan_renstra'));
      $('#id_sasaran_renstra_keg').val($(this).data('id_sasaran_renstra'));
      $('#id_program_renstra_keg').val($(this).data('id_program_renstra'));
      $('#id_kegiatan_renstra').val($(this).data('id_kegiatan_renstra'));
      $('#ur_kegiatan_renstra').val($(this).data('uraian_kegiatan_renstra'));
      $('#ur_kegiatan_renja').val($(this).data('uraian_kegiatan_renja'));
      $('#id_kegiatan_ref').val($(this).data('id_kegiatan_ref'));
      $('#ur_kegiatan_ref').val($(this).data('kd_kegiatan') +" -" +$(this).data('nm_kegiatan'));
      $('#no_urut_kegiatan').val($(this).data('no_urut'));
      $('#pagu_renstra').val($(this).data('pagu_tahun_renstra'));
      $('#pagu_renja_kegiatan').val($(this).data('pagu_tahun_kegiatan'));
      $('#pagu_selanjutnya').val($(this).data('pagu_tahun_selanjutnya'));
      $('#keterangan_status_kegiatan').val($(this).data('ket_usulan'));
      $('.idStatusUsulan_keg').hide();

      if($(this).data('sumber_data')==1){        
        document.getElementById("no_urut_kegiatan").removeAttribute("disabled");
        document.getElementById("ur_kegiatan_renja").removeAttribute("disabled");
      } else {
        document.getElementById("no_urut_kegiatan").setAttribute("disabled","disabled");
        document.getElementById("ur_kegiatan_renja").setAttribute("disabled","disabled");
      }

      if($(this).data('status_pelaksanaan_kegiatan')==4){
          document.frmModalKegiatan.status_pelaksanaan_kegiatan[4].checked=true;
          document.frmModalKegiatan.status_pelaksanaan_kegiatan[4].style.visibility='hidden';        
          document.getElementById("status_pelaksanaan_keg4").style.visibility='hidden';
          $('.idStatusPelaksanaan_keg').hide();        
          $('.btnHapusKeg').show();
          $('.btnCariKegiatanRef').show();
          $('.btnCariKegiatanRenstra').show();          
        } else {
            $('.idStatusPelaksanaan_keg').show();
            document.frmModalKegiatan.status_pelaksanaan_kegiatan[$(this).data('status_pelaksanaan_kegiatan')].checked=true;
            document.frmModalKegiatan.status_pelaksanaan_kegiatan[4].style.visibility='hidden';        
            document.getElementById("status_pelaksanaan_keg4").style.visibility='hidden';
            $('.btnHapusKeg').hide();
            $('.btnCariKegiatanRef').hide();
            $('.btnCariKegiatanRenstra').hide();
        }      

      if($(this).data('status_pelaksanaan_kegiatan')==0){
          document.getElementById("keterangan_status_kegiatan").setAttribute("disabled","disabled");
          $('.KetPelaksanaan_keg').hide();
        } else {
            document.getElementById("keterangan_status_kegiatan").removeAttribute("disabled");
            $('.KetPelaksanaan_keg').show();
        }

      $(".sPelaksanaan").attr('disabled', false);

      $('.chkKegiatan').show();
      if($(this).data('status_data')==1){
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
      
      if (check_data==1){
        
        $.ajax({
            type: "GET",
            url: 'sesuai/getCheckKegiatan/'+$('#id_renja_kegiatan').val(),
            dataType: "json",
            success: function(data) {

              if(data[0].jml_check == 0){
                    $.ajaxSetup({
                       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
                    });

                    $.ajax({
                      type: 'post',
                      url: 'sesuai/editKegiatanRenja',
                      data: {
                          '_token': $('input[name=_token]').val(),
                          'id_renja': $('#id_renja_kegiatan').val(),
                          'no_urut': $('#no_urut_kegiatan').val(),
                          'tahun_renja': $('#tahun_renja_kegiatan').val(),
                          'id_renja_program' : $('#id_renja_program_kegiatan').val() ,
                          'id_rkpd_ranwal': $('#id_rkpd_ranwal_kegiatan').val(),             
                          'id_unit' : $('#id_unit_kegiatan').val() ,
                          'id_visi_renstra' : $('#id_visi_renstra_keg').val() ,
                          'id_misi_renstra' : $('#id_misi_renstra_keg').val() ,
                          'id_tujuan_renstra' : $('#id_tujuan_renstra_keg').val(),
                          'id_sasaran_renstra' : $('#id_sasaran_renstra_keg').val() ,
                          'id_program_renstra' : $('#id_program_renstra_keg').val() ,
                          'id_kegiatan_renstra' : $('#id_kegiatan_renstra').val() ,
                          'id_kegiatan_ref' : $('#id_kegiatan_ref').val() ,
                          'uraian_kegiatan_renstra': $('#ur_kegiatan_renja').val(),
                          'pagu_tahun_kegiatan' : $('#pagu_renja_kegiatan').val() ,
                          'pagu_tahun_selanjutnya' : $('#pagu_selanjutnya').val() ,
                          'ket_usulan': $('#keterangan_status_kegiatan').val(),
                          'status_data' : 1,
                          'status_pelaksanaan_kegiatan' : getStatusPelaksanaanKeg(),
                      },
                      success: function(data) {
                          $('#tblKegiatanRenja').DataTable().ajax.reload();
                          $('#tblProgramRenja').DataTable().ajax.reload();
                          if(data.status_pesan==1){
                            createPesan(data.pesan,"success");
                            } else {
                            createPesan(data.pesan,"danger"); 
                            }
                      }
                  });
                } else {
                 createPesan('Maaf Indikator masih ada yang belum direviu','danger');
                }
            }
        });
    } else {
      $.ajaxSetup({
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
            });

                  $.ajax({
                      type: 'post',
                      url: 'sesuai/editKegiatanRenja',
                      data: {
                          '_token': $('input[name=_token]').val(),
                          'id_renja': $('#id_renja_kegiatan').val(),
                          'no_urut': $('#no_urut_kegiatan').val(),
                          'tahun_renja': $('#tahun_renja_kegiatan').val(),
                          'id_renja_program' : $('#id_renja_program_kegiatan').val() ,
                          'id_rkpd_ranwal': $('#id_rkpd_ranwal_kegiatan').val(),             
                          'id_unit' : $('#id_unit_kegiatan').val() ,
                          'id_visi_renstra' : $('#id_visi_renstra_keg').val() ,
                          'id_misi_renstra' : $('#id_misi_renstra_keg').val() ,
                          'id_tujuan_renstra' : $('#id_tujuan_renstra_keg').val(),
                          'id_sasaran_renstra' : $('#id_sasaran_renstra_keg').val() ,
                          'id_program_renstra' : $('#id_program_renstra_keg').val() ,
                          'id_kegiatan_renstra' : $('#id_kegiatan_renstra').val() ,
                          'id_kegiatan_ref' : $('#id_kegiatan_ref').val() ,
                          'uraian_kegiatan_renstra': $('#ur_kegiatan_renja').val(),
                          'pagu_tahun_kegiatan' : $('#pagu_renja_kegiatan').val() ,
                          'pagu_tahun_selanjutnya' : $('#pagu_selanjutnya').val() ,
                          'ket_usulan': $('#keterangan_status_kegiatan').val(),
                          'status_data' : 0,
                          'status_pelaksanaan_kegiatan' : getStatusPelaksanaanKeg(),
                      },
                      success: function(data) {
                          $('#tblKegiatanRenja').DataTable().ajax.reload();
                          $('#tblProgramRenja').DataTable().ajax.reload();
                          if(data.status_pesan==1){
                            createPesan(data.pesan,"success");
                            } else {
                            createPesan(data.pesan,"danger"); 
                            } 
                      }
                  });
    } 
});

$(document).on('click', '.btnHapusKeg', function() {
  var x = confirm("Anda yakin akan menghapus data kegiatan "+$('#ur_program_renja').val()+" ?");
  if (x) {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      type: 'post',
      url: 'sesuai/hapusKegiatanRenja',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_renja': $('#id_renja_kegiatan').val()
      },
      success: function(data) {
        $('#ModalKegiatan').modal('hide');
        $('#tblKegiatanRenja').DataTable().ajax.reload(); 
        $('#tblProgramRenja').DataTable().ajax.reload();
        createPesan(data.pesan,"success");
      }
    });
   } 
  else {    
    return false;
  }
});

$(document).on('click', '.add-indikatorKeg', function() {
      $('.btnIndikatorKeg').removeClass('editIndikatorKeg');
      $('.btnIndikatorKeg').addClass('addIndikatorKeg');
      $('.modal-title').text('Tambah Target Capaian Kegiatan Renja');
      $('.form-horizontal').show();
      $('#id_renja_kegiatan').val($(this).data('id_renja'));
      $('#kd_indikatorKeg_renja').val(null);
      $('#id_indikator_kegiatan_renja').val(null);
      $('#no_urut_indikatorKeg').val(null);
      $('#ur_indikatorKeg_renja').val(null);
      $('#ur_tolokukur_keg').val(null);
      $('#target_indikatorKeg_renstra').val(0);
      $('#target_indikatorKeg_renja').val(0);


      document.getElementById("no_urut_indikatorKeg").removeAttribute("disabled");
      document.getElementById("ur_tolokukur_keg").removeAttribute("disabled");

      $('.btnCariIndiKeg').show();
      $('.btnHapusIndikatorKeg').hide();
      $('.chkIndikatorKeg').hide();

      $('#ModalIndikatorKeg').modal('show');
  });

$('.modal-footer').on('click', '.addIndikatorKeg', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: 'sesuai/addIndikatorKeg',
          data: {
              '_token': $('input[name=_token]').val(),
              'tahun_renja': tahun_temp,
              'no_urut': $('#no_urut_indikatorKeg').val(),
              'id_renja': $('#id_renja_kegiatan').val(),
              'kd_indikator': $('#kd_indikatorKeg_renja').val(),
              'uraian_indikator_kegiatan_renja': $('#ur_indikatorKeg_renja').val(),
              'tolok_ukur_indikator': $('#ur_tolokukur_keg').val(),
              'angka_tahun': $('#target_indikatorKeg_renja').val(),
          },
          success: function(data) {
              tblInKeg.ajax.reload();
              tblKegRenja.ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }              
          }
      });
  });

  $(document).on('click', '.edit-indikatorKeg', function() {
      $('.btnIndikatorKeg').removeClass('addIndikatorKeg');
      $('.btnIndikatorKeg').addClass('editIndikatorKeg');
      $('.modal-title').text('Edit dan Reviu Target Capaian Kegiatan Renja');
      $('.form-horizontal').show();
      $('#id_indikator_kegiatan_renja').val($(this).data('id_indikator_kegiatan_renja'));
      $('#id_renja_kegiatan').val($(this).data('id_renja'));
      $('#kd_indikatorKeg_renja').val($(this).data('kd_indikator'));
      $('#no_urut_indikatorKeg').val($(this).data('no_urut'));
      $('#ur_indikatorKeg_renja').val($(this).data('uraian_indikator_kegiatan_renja'));
      $('#ur_tolokukur_keg').val($(this).data('tolok_ukur_indikator'));
      $('#target_indikatorKeg_renstra').val($(this).data('angka_renstra'));
      $('#target_indikatorKeg_renja').val($(this).data('angka_tahun'));
      
      // alert ($(this).data('sumber_data'));

      if($(this).data('sumber_data')==1){
        document.getElementById("no_urut_indikatorKeg").removeAttribute("disabled");
        $('.btnCariIndikeg').show();
        $('.btnHapusIndikatorKeg').show();
        document.getElementById("ur_tolokukur_keg").removeAttribute("disabled");
      } else {
        document.getElementById("no_urut_indikatorKeg").setAttribute("disabled","disabled");
        $('.btnCariIndikeg').hide();
        $('.btnHapusIndikatorKeg').hide();
        document.getElementById("ur_tolokukur_keg").setAttribute("disabled","disabled");
      };

      $('.chkKegiatan').show();
      if($(this).data('status_data')==1){
        $('.checkKegiatan').prop('checked',true);
      } else {
        $('.checkKegiatan').prop('checked',false);
      };

      $('.chkIndikatorKeg').show();
    
      $('#ModalIndikatorKeg').modal('show');
    });

  $('.modal-footer').on('click', '.editIndikatorKeg', function() {

      if (document.getElementById("checkIndikatorKeg").checked){
        check_data = 1
      } else {
        check_data = 0
      }

      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: 'sesuai/editIndikatorKeg',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_indikator_kegiatan_renja':$('#id_indikator_kegiatan_renja').val(),
              'no_urut': $('#no_urut_indikatorKeg').val(),
              'id_renja': $('#id_renja_kegiatan').val(),
              'kd_indikator': $('#kd_indikatorKeg_renja').val(),
              'uraian_indikator_kegiatan_renja': $('#ur_indikatorKeg_renja').val(),
              'tolok_ukur_indikator': $('#ur_tolokukur_keg').val(),
              'angka_tahun': $('#target_indikatorKeg_renja').val(),
              'id_renja_program': id_renja_program_temp,
              'status_data': check_data,
          },
          success: function(data) {
              tblInKeg.ajax.reload();
              tblKegRenja.ajax.reload();              
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              } 
          }
      });
  });

$(document).on('click', '.btnHapusIndikatorKeg', function() {


  var x = confirm("Anda yakin akan menghapus data indikator "+$('#ur_indikatorKeg_renja').val()+" ?");

  if (x) {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      type: 'post',
      url: 'sesuai/hapusIndikatorKeg',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_indikator_kegiatan_renja': $('#id_indikator_kegiatan_renja').val()
      },
      success: function(data) {
        $('#ModalIndikatorKeg').modal('hide');
        tblInKeg.ajax.reload();
        tblKegRenja.ajax.reload();
        createPesan(data.pesan,"success");
      }
    });
   } 
  else {    
    return false;
  }
});

$(document).on('click', '#btnUnProgram', function() {

  var data = tblProgRenja.row( $(this).parents('tr') ).data();

    $('#id_program_renja_posting').val(data.id_renja_program);
    $('#status_program_renja_posting').val(data.status_data);
    $('#status_pelaksanaan_renja_posting').val(data.status_pelaksanaan);
    $('#tahun_renja_posting').val(data.tahun_renja);

    document.getElementById("ur_program_renja_posting").innerHTML = data.uraian_program_renja;

    if(data.status_data==0){
        document.getElementById("ur_status_posting").innerHTML = "Posting";
    } else {
        document.getElementById("ur_status_posting").innerHTML = "Un-Posting";
    }

    $('#StatusProgram').modal('show');
});

$('.modal-footer').on('click', '#btnPostProgram', function() {
      var status_post;
      if($('#status_program_renja_posting').val()==0){
          status_post = 1
      } else {
          status_post = 0
      };

      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: 'sesuai/postProgram',
          data: {
              '_token': $('input[name=_token]').val(),
              'tahun_renja': $('#tahun_renja_posting').val(),
              'id_renja_program': $('#id_program_renja_posting').val(),
              'status_pelaksanaan':$('#status_pelaksanaan_renja_posting').val(),
              'status_data': status_post,
          },
          success: function(data) {
              tblProgRenja.ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
              $('#StatusProgram').modal('hide');
          }
      });
    });

$(document).on('click', '#btnUnKegiatan', function() {

  var data = tblKegRenja.row( $(this).parents('tr') ).data();

    $('#id_kegiatan_renja_posting').val(data.id_renja);
    $('#status_kegiatan_renja_posting').val(data.status_data);
    $('#status_pelaksanaan_kegiatan_posting').val(data.status_pelaksanaan_kegiatan);
    $('#tahun_kegiatan_renja_posting').val(data.tahun_renja);

    document.getElementById("ur_kegiatan_renja_posting").innerHTML = data.uraian_kegiatan_renja;

    if(data.status_data==0){
        document.getElementById("ur_kegiatan_status_posting").innerHTML = "Posting";
    } else {
        document.getElementById("ur_kegiatan_status_posting").innerHTML = "Un-Posting";
    }

    $('#StatusKegiatan').modal('show');
});

$('.modal-footer').on('click', '#btnPostKegiatan', function() {
      var status_post;
      if($('#status_kegiatan_renja_posting').val()==0){
          status_post = 1
      } else {
          status_post = 0
      };

      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: 'sesuai/postKegiatanRenja',
          data: {
              '_token': $('input[name=_token]').val(),
              'tahun_renja': $('#tahun_kegiatan_renja_posting').val(),
              'id_renja': $('#id_kegiatan_renja_posting').val(),
              'status_pelaksanaan_kegiatan': $('#status_pelaksanaan_kegiatan_posting').val(),
              'status_data': status_post,
          },
          success: function(data) {
              tblKegRenja.ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
              $('#StatusKegiatan').modal('hide');
          }
      });
    });

$(document).on('click', '.btnPrintKompilasiProgramdanPagu', function() {

    location.replace('../PrintKompilasiProgramdanPaguRenja/'+ $('#id_unit').val());
    
  });
$(document).on('click', '.btnPrintKompilasiKegiatandanPaguRenja', function() {

    location.replace('../PrintKompilasiKegiatandanPaguRenja/'+ $('#id_unit').val());
    
  });

    
});
</script>
@endsection