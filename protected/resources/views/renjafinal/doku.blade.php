<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <?php
                $this->title = 'Penyusunan Renja Final';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = 'modul2';
                $breadcrumb->begin();
                $breadcrumb->add(['label' => 'Renja']);
                $breadcrumb->add(['label' => 'Penyusunan Renja Final']);
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
            <p><h2 class="panel-title">Penyusunan Renja Final</h2></p>
          </div>

          <div class="panel-body">
                <form class="form-horizontal" role="form" autocomplete='off' action="#" method="" >
                  <div class="form-group">
                    <label for="tahun_rkpd" class="col-sm-2 control-label text-left" align='left'>Tahun Perencanaan :</label>
                      <div class="col-sm-2">                            
                          <input class="form-control text-center" type="text" id="tahun_rkpd_main" name="tahun_rkpd_main" value="{{Session::get('tahun')}}" disabled style="text-align: center;">
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2 text-left" for="id_unit">Unit Penyusun Renja :</label>
                        <div class="col-sm-5">
                            <select class="form-control id_Unit" name="id_unit" id="id_unit"></select>
                        </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2 text-left" for=""></label>
                    <div class="col-sm-5">
                      <a type="button" id="btnAddDokumen" class="btn btn-labeled btn-sm btn-success" data-dismiss="modal"><span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span> Tambah Dokumen</a>
                    </div>
                  </div>
                </form>
                  <div class='tabs-x tabs-above tab-bordered tabs-krajee'>
                    <ul class="nav nav-tabs nav-justified" role="tablist">
                      <li class="active">
                        <a href="#dokumenrenja" aria-controls="dokumenrenja" role="tab-kv" data-toggle="tab">Dokumen Renja Final</a>
                      </li>
                      <li class="disabled">
                        <a href="#program" aria-controls="program" role="tab-kv" data-toggle="tab">Program RKPD</a>
                      </li>
                      <li class="disabled">
                        <a href="#programrenja" aria-controls="programrenja" role="tab-kv" data-toggle="tab">Program Renja</a>
                      </li>
                      <li class="disabled">
                        <a href="#kegiatanrenja" aria-controls="kegiatanrenja" role="tab-kv" data-toggle="tab">Kegiatan Renja</a>
                      </li>
                      <li class="disabled">
                        <a href="#pelaksanarenja" aria-controls="pelaksanarenja" role="tab-kv" data-toggle="tab">Pelaksana Renja</a>
                      </li>
                      <li class="disabled">
                        <a href="#aktivitasrenja" aria-controls="aktivitasrenja" role="tab-kv" data-toggle="tab">Aktivitas Renja</a>
                      </li>
                      <li class="disabled">
                        <a href="#lokasi" aria-controls="lokasi" role="tab-kv" data-toggle="tab">Lokasi Renja</a>
                      </li>
                      <li class="disabled">
                        <a href="#belanja" aria-controls="belanja" role="tab-kv" data-toggle="tab">Rincian Belanja</a>
                      </li>
                    </ul>
                    
                    <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="dokumenrenja">
                              <br>
                              <div class="col-md-12">
                                <table id="tblDokumen" class="table table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
                                  <thead>
                                      <tr>
                                        <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                                        <th width="10%" style="text-align: center; vertical-align:middle">Tahun Renja</th>
                                        <th width="15%" style="text-align: center; vertical-align:middle">Nomor Dokumen</th>
                                        <th style="text-align: center; vertical-align:middle">Uraian Dokumen</th>
                                        {{-- <th width="10%" style="text-align: center; vertical-align:middle">Status</th> --}}
                                        <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                  </tbody>
                                </table> 
                              </div>  
                            </div>
                            <div role="tabpanel" class="tab-pane fade in active" id="program">
                          <div class="table-responsive">
                                <table id="tblProgramRKPD" class="table display table-striped table-bordered table-responsive" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="5px" rowspan="2" style="text-align: center; vertical-align:middle"></th>
                                            <th rowspan="2" width='5px' style="text-align: center; vertical-align:middle">No Urut</th>
                                            <th rowspan="2" style="text-align: center; vertical-align:middle">Nama Program</th>
                                            <th colspan="3" style="text-align: center; vertical-align:middle">Rincian Data</th>
                                        </tr>
                                        <tr>
                                            <th width='10%' style="text-align: center; vertical-align:middle">Program</th> 
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
                              <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
                                      <div class="table-responsive">
                                        <table class="table table-striped table-bordered" width="100%">
                                          <tbody>
                                            <tr class="backProgRkpd">
                                              <td width="15%" style="text-align: left; vertical-align:top;">Program RKPD</td>
                                              <td style="text-align: left; vertical-align:top;"><label id="nm_program_rkpd_progrenja" align='left'></label></td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </div>
                                    </form>
                              <div class="col-md-12">
                                <table id="tblProgramRenja" class="table display table-striped compact table-bordered table-responsive">
                                  <thead>
                                            <tr>
                                                <th width="5px" rowspan="2" style="text-align: center; vertical-align:middle"></th>
                                                <th rowspan="2" width='5px' style="text-align: center; vertical-align:middle">No Urut</th>
                                                <th rowspan="2" style="text-align: center; vertical-align:middle">Nama Program Perangkat Daerah</th>
                                                <th rowspan="2" width='10%' style="text-align: center; vertical-align:middle">Pagu Program</th>
                                                <th colspan="2" style="text-align: center; vertical-align:middle">Kegiatan</th>
                                                <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">Aksi</th>
                                            </tr>
                                            <tr>
                                              <th width='5%' style="text-align: center; vertical-align:middle">Jumlah</th>
                                              <th width='10%' style="text-align: center; vertical-align:middle">Pagu</th>
                                            </tr>
                                        </thead>
                                  <tbody>                                        
                                  </tbody>
                                </table> 
                              </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade in" id="kegiatanrenja">
                                <br>
                                  <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
                                  <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                      <tbody>
                                        <tr class="backProgRkpd">
                                          <td width="15%" style="text-align: left; vertical-align:top;">Program RKPD</td>
                                          <td style="text-align: left; vertical-align:top;"><label id="nm_program_rkpd_kegrenja" align='left'></label></td>
                                        </tr>
                                        <tr class="backRenja">
                                          <td width="15%" style="text-align: left; vertical-align:top;">Program Renja</td>
                                          <td style="text-align: left; vertical-align:top;"><label id="nm_program_renja_kegrenja" align='left'></label></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                  </form>
                                    <table id="tblKegiatanRenja" class="table display table-striped compact table-bordered table-responsive" width="100%">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" width='3%' style="text-align: center; vertical-align:middle"></th>
                                                <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">No Urut</th>
                                                <th rowspan="2" style="text-align: center; vertical-align:middle">Nama Kegiatan Renja</th>
                                                <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">Jumlah Indikator</th>
                                                <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">Jumlah Pelaksana</th>
                                                <th colspan="2" width='10%' style="text-align: center; vertical-align:middle">Jumlah Pagu</th>
                                                {{-- <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">Status</th> --}}
                                                <th rowspan="2" width='10%' style="text-align: center; vertical-align:middle">Aksi</th>
                                            </tr>
                                            <tr>
                                                <th width="5%" style="text-align: center; vertical-align:middle">Kegiatan</th>
                                                <th width="5%" style="text-align: center; vertical-align:middle">Aktivitas</th>

                                            </tr>
                                        </thead>
                                        <tbody>                                        
                                        </tbody>
                                    </table> 
                              </div>

                              <div role="tabpanel" class="tab-pane fade in" id="pelaksanarenja">
                                <br>
                                  <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
                                  <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                      <tbody>
                                        <tr class="backProgRkpd">
                                          <td width="15%" style="text-align: left; vertical-align:top;">Program RKPD</td>
                                          <td style="text-align: left; vertical-align:top;"><label id="nm_program_rkpd_pelaksana" align='left'></label></td>
                                        </tr>
                                        <tr class="backRenja">
                                          <td width="15%" style="text-align: left; vertical-align:top;">Program Renja</td>
                                          <td style="text-align: left; vertical-align:top;"><label id="nm_program_pelaksana" align='left'></label></td>
                                        </tr>
                                        <tr class="backKegiatan">
                                          <td width="15%" style="text-align: left; vertical-align:top;">Kegiatan Renja</td>
                                          <td style="text-align: left; vertical-align:top;"><label id="nm_kegiatan_pelaksana" align='left'></label></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                  </form>
                                    <table id="tblPelaksanaRenja" class="table display table-striped compact table-bordered table-responsive" width="100%">
                                        <thead>
                                            <tr>
                                                <th width='5%' style="text-align: center; vertical-align:middle">No Urut</th>
                                                <th style="text-align: center; vertical-align:middle">Nama Sub Unit Pelaksana</th>
                                                <th width='10%' style="text-align: center; vertical-align:middle">Jumlah Pagu</th>
                                                <th width='10%' style="text-align: center; vertical-align:middle">Jumlah Aktivitas</th>
                                                <th width='10%' style="text-align: center; vertical-align:middle">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>                                        
                                        </tbody>
                                    </table>   
                                </div>
                            <div role="tabpanel" class="tab-pane fade in" id="aktivitasrenja">
                                <br>          
                                  <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
                                  <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                      <tbody>
                                        <tr class="backProgRkpd">
                                          <td width="15%" style="text-align: left; vertical-align:top;">Program RKPD</td>
                                          <td style="text-align: left; vertical-align:top;"><label id="nm_program_rkpd_aktivitas" align='left'></label></td>
                                        </tr>
                                        <tr class="backRenja">
                                          <td width="15%" style="text-align: left; vertical-align:top;">Program Renja</td>
                                          <td style="text-align: left; vertical-align:top;"><label id="nm_program_aktivitas" align='left'></label></td>
                                        </tr>
                                        <tr class="backKegiatan">
                                          <td width="15%" style="text-align: left; vertical-align:top;">Kegiatan Renja</td>
                                          <td style="text-align: left; vertical-align:top;"><label id="nm_kegiatan_aktivitas" align='left'></label></td>
                                        </tr>
                                        <tr class="backPelaksana">
                                          <td width="15%" style="text-align: left; vertical-align:top;">Pelaksana Kegiatan</td>
                                          <td style="text-align: left; vertical-align:top;"><label id="nm_sub_pelaksana" align='left'></label></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                  </form>
                                    <table id="tblAktivitasRenja" class="table display table-striped compact table-bordered table-responsive" width="100%">
                                        <thead>
                                            <tr>
                                               
                                                <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">No Urut</th>
                                                <th rowspan="2" style="text-align: center; vertical-align:middle">Nama Aktivitas</th>
                                                <th rowspan="2" width='10%' style="text-align: center; vertical-align:middle">Pagu Aktivitas</th>
                                                <th rowspan="2" width='10%' style="text-align: center; vertical-align:middle">Pagu Belanja</th>
                                                <th colspan="2" width='10%' style="text-align: center; vertical-align:middle">Volume</th>
                                                <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">Aksi</th>
                                            </tr>
                                            <tr>
                                                <th width='5%' style="text-align: center; vertical-align:middle">Vol 1</th>
                                                <th width='5%' style="text-align: center; vertical-align:middle">Vol 2</th>
                                            </tr>
                                        </thead>
                                        <tbody>                                        
                                        </tbody>
                                    </table>  
                                </div>
                                <div role="tabpanel" class="tab-pane fade in" id="lokasi">
                                  <br>
                                  <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
                                  <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                      <tbody>
                                        <tr class="backProgRkpd">
                                          <td width="15%" style="text-align: left; vertical-align:top;">Program RKPD</td>
                                          <td style="text-align: left; vertical-align:top;"><label id="nm_program_rkpd_lokasi" align='left'></label></td>
                                        </tr>
                                        <tr class="backProgram">
                                          <td width="15%" style="text-align: left; vertical-align:top;">Program Renja</td>
                                          <td style="text-align: left; vertical-align:top;"><label id="nm_program_lokasi" align='left'></label></td>
                                        </tr>
                                        <tr class="backKegiatan">
                                          <td width="15%" style="text-align: left; vertical-align:top;">Kegiatan Renja</td>
                                          <td style="text-align: left; vertical-align:top;"><label id="nm_kegiatan_lokasi" align='left'></label></td>
                                        </tr>
                                        <tr class="backPelaksana">
                                          <td width="15%" style="text-align: left; vertical-align:top;">Pelaksana Kegiatan</td>
                                          <td style="text-align: left; vertical-align:top;"><label id="nm_sub_lokasi" align='left'></label></td>
                                        </tr>
                                        <tr class="backAktivitas">
                                          <td width="15%" style="text-align: left; vertical-align:top;">Aktivitas Kegiatan</td>
                                          <td style="text-align: left; vertical-align:top;"><label id="nm_aktivitas_lokasi" align='left'></label></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                  </form>
                                    <table id="tblLokasi" class="table table-striped display compact table-bordered table-responsive" width="100%">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">No Urut</th>
                                                <th rowspan="2" style="text-align: center; vertical-align:middle">Nama Lokasi</th>
                                                <th colspan="2" width='10%' style="text-align: center; vertical-align:middle">Volume</th>
                                                {{-- <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">Aksi</th> --}}
                                            </tr>
                                            <tr>
                                                <th width='5%' style="text-align: center; vertical-align:middle">Vol 1</th>
                                                <th width='5%' style="text-align: center; vertical-align:middle">Vol 2</th>
                                            </tr>
                                        </thead>
                                        <tbody>                                        
                                        </tbody>
                                    </table>   
                                </div>
                            <div role="tabpanel" class="tab-pane fade in" id="belanja">
                              <br>
                                  <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
                                  <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                      <tbody>
                                        <tr class="backProgRkpd">
                                          <td width="15%" style="text-align: left; vertical-align:top;">Program RKPD</td>
                                          <td style="text-align: left; vertical-align:top;"><label id="nm_program_rkpd_belanja" align='left'></label></td>
                                        </tr>
                                        <tr class="backRenja">
                                          <td width="15%" style="text-align: left; vertical-align:top;">Program Renja</td>
                                          <td style="text-align: left; vertical-align:top;"><label id="nm_program_belanja" align='left'></label></td>
                                        </tr>
                                        <tr class="backKegiatan">
                                          <td width="15%" style="text-align: left; vertical-align:top;">Kegiatan Renja</td>
                                          <td style="text-align: left; vertical-align:top;"><label id="nm_kegiatan_belanja" align='left'></label></td>
                                        </tr>
                                        <tr class="backPelaksana">
                                          <td width="15%" style="text-align: left; vertical-align:top;">Pelaksana Kegiatan</td>
                                          <td style="text-align: left; vertical-align:top;"><label id="nm_sub_belanja" align='left'></label></td>
                                        </tr>
                                        <tr class="backAktivitas">
                                          <td width="15%" style="text-align: left; vertical-align:top;">Aktivitas Kegiatan</td>
                                          <td style="text-align: left; vertical-align:top;"><label id="nm_aktivitas_belanja" align='left'></label></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                  </form>
                                    <table id="tblBelanja" class="table table-striped display compact table-bordered table-responsive" width="100%">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">No Urut</th>
                                                <th rowspan="2" style="text-align: center; vertical-align:middle">Item Belanja</th>
                                                <th colspan="2" width='10%' style="text-align: center; vertical-align:middle">Volume</th>
                                                <th colspan="2" width='20%' style="text-align: center; vertical-align:middle">Jumlah Belanja</th>
                                                {{-- <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">Aksi</th> --}}
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


<script id="details-template" type="text/x-handlebars-template">
        <table class="table table-striped table-bordered table-responsive compact details-table" id="bidang-@{{id_dokumen}}@{{id_unit}}@{{id_rkpd_rancangan}}">
            <thead>
              <tr>
                  <th width="15%" style="text-align: center; vertical-align:middle;">Kd Bidang</th>
                  <th style="text-align: center; vertical-align:middle;">Nama Bidang</th>
                  <th width="20px" style="text-align: center; vertical-align:middle;">Aksi</th>
              </tr>
            </thead>
            <tbody></tbody>
        </table>
</script>

<script id="details-inProg" type="text/x-handlebars-template">
        <table class="table table-striped display table-bordered table-responsive compact details-table" id="inProg-@{{id_program_pd}}">
            <thead>
              <tr>
                <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                <th style="text-align: center; vertical-align:middle">Uraian Indikator</th>
                <th width="5%" style="text-align: center; vertical-align:middle">Target Renstra</th>
                <th width="5%" style="text-align: center; vertical-align:middle">Target Renja</th>
              </tr>
            </thead>
            <tbody></tbody>
        </table>
</script>

<script id="details-inKeg" type="text/x-handlebars-template">
        <table class="table table-striped display table-bordered table-responsive compact details-table" id="inKeg-@{{id_kegiatan_pd}}">
            <thead>
              <tr>
                <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                <th style="text-align: center; vertical-align:middle">Uraian Indikator</th>
                <th width="5%" style="text-align: center; vertical-align:middle">Target Renstra</th>
                <th width="5%" style="text-align: center; vertical-align:middle">Target Renja</th>
              </tr>
            </thead>
            <tbody></tbody>
        </table>
</script>

<div id="TambahDokumen" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" >
  <div class="modal-dialog modal-xl"  >
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" autocomplete='off' action="" method="post" onsubmit="return false;">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="id_dokumen_rkpd" id="id_dokumen_rkpd">        
          <div class="form-group">
            <label for="tahun_rkpd" class="col-sm-3 control-label" align='left'>Tahun Renja</label>
            <div class="col-sm-2">
              <input type="text" class="form-control" id="tahun_rkpd" name="tahun_rkpd" required="required" disabled style="text-align: center;">
            </div> 
          </div>
          <div class="form-group">
            <label for="cb_jns_dokumen" class="col-sm-3 control-label" align='left'>Jenis Dokumen Renja</label>
            <div class="col-sm-5">
                <select class="form-control cb_jns_dokumen" name="cb_jns_dokumen" id="cb_jns_dokumen"></select>
            </div>
            <label for="id_revisi_dok" class="col-sm-2 control-label" style="text-align: center;">Revisi ke-</label>
            <div class="col-sm-2">
                <input type="text" class="form-control number" id="id_revisi_dok" name="id_revisi_dok" style="text-align: center;" required="required">
            </div>
          </div>  
          <div class="form-group">
            <label for="cb_ref_dokumen" class="col-sm-3 control-label" align='left'>Dokumen RKPD Referensi</label>
            <div class="col-sm-9">
                <select class="form-control cb_ref_rkpd" name="cb_ref_rkpd" id="cb_ref_rkpd"></select>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label for="tanggal_rkpd" class="col-sm-3 control-label" align='left'>Tanggal Dokumen</label>
            <input type="hidden" name="tanggal_rkpd" id="tanggal_rkpd">
            <div class="col-sm-4">
                <input type="text" class="form-control datepicker" id="tanggal_rkpd_x" name="tanggal_rkpd_x" style="text-align: center;">
                <i class="fa fa-calendar fa-fw fa-lg text-primary form-control-feedback"></i>              
            </div>
          </div>
          <div class="form-group">
            <label for="nomor_rkpd" class="col-sm-3 control-label" align='left'>Nomor Dokumen</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="nomor_rkpd" name="nomor_rkpd" required="required">
            </div>
          </div>
          <div class="form-group">
            <label for="uraian_perkada" class="col-sm-3 control-label" align='left'>Uraian Dokumen</label>
            <div class="col-sm-9">
              <textarea type="text" class="form-control" id="uraian_perkada" name="uraian_perkada" required="required" rows="3"></textarea>
            </div>
          </div>                              
          <div class="form-group">
            <label for="id_unit_perencana" class="col-sm-3 control-label" align='left'>Unit Penyusun Renja</label>
            <div class="col-sm-9">
              <input type="hidden" class="form-control" name="id_unit_perencana" id="id_unit_perencana">
              <input type="text" class="form-control" name="id_unit_perencana_display" id="id_unit_perencana_display" disabled>
            </div>
          </div>
          <div class="form-group">
            <label for="nama_tandatangan" class="col-sm-3 control-label" align='left'>Nama Pimpinan Unit</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="nama_tandatangan" name="nama_tandatangan">
            </div>
          </div>
          <div class="form-group">
            <label for="nip_tandatangan" class="col-sm-3 control-label" align='left'>NIP Pimpinan Unit</label>
            <div class="col-sm-4">
              <input type="text" class="form-control nip" id="nip_tandatangan_display" name="nip_tandatangan_display" maxlength="18" style="text-align: center;">
              <input type="hidden" class="form-control" id="nip_tandatangan" name="nip_tandatangan">
            </div>
          </div>    
        </form>
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-sm-2 text-left">
            <button type="button" id="btnDelDokumen" class="btn btn-labeled btn-danger"><span class="btn-label"><i class="fa fa-trash-o fa-lg fa-fw"></i></span>Hapus</button>
          </div>
          <div class="col-sm-10 text-right">
            <div class="ui-group-buttons">
              <button id="btnDokumen" type="button" class="btn btn-success btn-labeled" data-dismiss="modal">
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

<div id="HapusDokumen" class="modal fade" role="dialog" tabindex="-1" data-focus-on="input:first" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
            <h4>Hapus Dokumen Rancangan Awal Renja</h4>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id_dokumen_hapus" name="id_dokumen_hapus">
            <div class="alert alert-danger">
              <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border text-danger" aria-hidden="true"></i>
                Yakin akan menghapus Dokumen Rancangan Awal Renja dengan nomor dokumen: <strong><span class="ur_dokumen_del"></span></strong>  ?
                <br>
                <br>
                <strong>Catatan : Penghapusan dokumen ini akan menghapus data Rancangan Awal Renja yang telah diproses !!!!</strong>
          </div>
        </div>
          <div class="modal-footer">
            <div class="ui-group-buttons">
            <button type="button" id="btnDelDokumen1" class="btn btn-labeled btn-danger" data-dismiss="modal" ><span class="btn-label"><i class="fa fa-trash-o fa-lg fa-fw"></i></span> Hapus</button>
            <div class="or"></div>
            <button type="button" class="btn btn-labeled btn-warning" data-dismiss="modal" aria-hidden="true"><span class="btn-label"><i class="fa fa-sign-out fa-lg fa-fw"></i></span> Tutup</button>
            </div>
          </div>
        </div>
      </div>
    </div>

<div id="modalLoadData" class="modal fade" role="dialog" tabindex="-1" data-focus-on="input:first" data-backdrop="static">
  <div class="modal-dialog modal-lg"  >
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" >Daftar Program RKPD-Renja yang terdapat di RKPD Final</h3>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" role="form" autocomplete='off' action="" onsubmit="return false;">
        <div class="form-group">
        <div class="col-sm-12">
          <table id='tblLoadData' class="table display compact table-striped table-bordered" width="100%">
              <thead>
                    <tr>
                      {{-- <th width="10px" style="text-align: center; vertical-align:middle">Pilih</th> --}}
                      <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                      <th style="text-align: center; vertical-align:middle">Nama Program RKPD</th>
                      <th style="text-align: center; vertical-align:middle">Nama Program Renja</th>
                      <th width="5%" style="text-align: center; vertical-align:middle">Aksi</th>
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
                {{-- <button id="btnProsesAll" type="button" class="btn btn-labeled btn-success"><span class="btn-label"><i class="fa fa-download fa-fw fa-lg"></i></span> Proses Load</button> --}}
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
            <h4 style="text-align: center;">Perubahan Status Dokumen Ranwal Renja</h4>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id_dokumen_posting" name="id_dokumen_posting">
            <input type="hidden" id="status_dokumen_posting" name="status_dokumen_posting">
            <input type="hidden" id="tahun_dokumen_posting" name="tahun_dokumen_posting">
            <input type="hidden" id="unit_posting" name="unit_posting">
            <div class="alert alert-success">
                <div>
                  <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border text-info"  aria-hidden="true"></i>
                  <p>Yakin akan melakukan proses <strong><i><span id="ur_status_dokumen_posting"></span></i></strong> pada Dokumen Rancangan Awal Renja Tahun <strong><span id="ur_tahun_posting"></span></strong> ?</p>
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

<div id="ModalProgress" class="modal fade modal-static" role="dialog" data-backdrop="static" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <div class="text-center">
          <h3><strong>Sedang proses...</strong></h3>
          <i class="fa fa-spinner fa-pulse fa-5x fa-fw" style="color:grey;"></i>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
  <script type="text/javascript" language="javascript" class="init" src="{{ asset('/protected/resources/views/renjafinal/js_doku_renja.js')}}"></script>
@endsection
