<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app2')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?php
                $this->title = 'Proses Data PPAS';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = 'modul2';
                $breadcrumb->begin();
                $breadcrumb->add(['label' => 'PPAS']);
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
                    <p><h2 id="judul" class="panel-title"> {{ $this->title }}</h2></p>
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
                    <ul class="nav nav-tabs nav-justified" role="tablist">
                      <li class="active"><a href="#programrkpd" aria-controls="programrkpd" role="tab" data-toggle="tab">Program RKPD</a></li>
                      <li class="disabled"><a href="#program" aria-controls="program" role="tab-kv" data-toggle="tab">Program PD</a></li>
                      <li class="disabled"><a href="#kegiatan" aria-controls="kegiatan" role="tab-kv" data-toggle="tab">Kegiatan PD</a></li>
                      <li class="disabled"><a href="#pelaksana" aria-controls="pelaksana" role="tab-kv" data-toggle="tab">Pelaksana</a></li>
                      <li class="disabled"><a href="#aktivitas" aria-controls="aktivitas" role="tab-kv" data-toggle="tab">Aktivitas</a></li>
                      <li class="disabled"><a href="#lokasi" aria-controls="lokasi" role="tab-kv" data-toggle="tab">Lokasi</a></li>
                      <li class="disabled"><a href="#belanja" aria-controls="belanja" role="tab-kv" data-toggle="tab">Rincian Belanja</a></li>
                    </ul>
                    
                    <div class="tab-content">
                    <br>
                    <div role="tabpanel" class="tab-pane fade in active" id="programrkpd">
                                <div class="col-md-12">
                                  <div class="add hidden">
                                    <button id="btnPostingProgRKPD" type="button" class="post-ProgRKPD btn btn-labeled btn-primary"><span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Posting Program RKPD</button>
                                  </div>
                                    <table id="tblProgramRKPD" class="table table-striped table-bordered table-responsive compact" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="5px" rowspan="3" style="text-align: center; vertical-align:middle"></th>
                                            <th width="5px" rowspan="3" style="text-align: center; vertical-align:middle">No Urut</th>
                                            <th rowspan="3" style="text-align: center; vertical-align:middle">Nama Program</th>
                                            <th colspan="4" style="text-align: center; vertical-align:middle">Rincian Data</th>
                                            <th width="15px" rowspan="3" style="text-align: center; vertical-align:middle">Status</th>
                                            <th width="5px" rowspan="3" style="text-align: center; vertical-align:middle">Aksi</th>
                                        </tr>
                                        <tr>
                                            <th width="15px" rowspan="2" style="text-align: center; vertical-align:middle">Program SKPD</th>  
                                            <th colspan="2" style="text-align: center; vertical-align:middle">Kegiatan SKPD</th>
                                            <th width="15px" rowspan="2" style="text-align: center; vertical-align:middle">Aktivitas SKPD</th>
                                        </tr>
                                        <tr>                                            
                                            <th width="15px" style="text-align: center; vertical-align:middle">Jumlah</th>
                                            <th width="50px" style="text-align: center; vertical-align:middle">Pagu Total</th>
                                            {{-- <th width="50px" style="text-align: center; vertical-align:middle">Pagu Musrenbang</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>                                        
                                    </tbody>
                                </table>  
                                </div>  
                            </div>  
                            <div role="tabpanel" class="tab-pane fade in" id="program">
                                <div class="col-md-12">
                                  <div id="divTambahProg">
                                    <button id="btnTambahProgRenja" type="button" class="add-ProgRenja btn btn-labeled btn-success">
                                      <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Program</button>
                                  </div>
                                    <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
                                    <div class="table-responsive">
                                      <table class="table table-striped table-bordered">
                                        <tbody>
                                          <tr>
                                            <td width="20%" style="text-align: left; vertical-align:top;">Program Ranwal RKPD</td>
                                            <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd" id="nm_program_progrenja" align='left'></label></td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </div>
                                    </form>
                                    <table id="tblProgram" class="table table-striped table-bordered table-responsive compact" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" width='5px' style="text-align: center; vertical-align:middle">No Urut</th>
                                                <th rowspan="2" style="text-align: center; vertical-align:middle">Nama Program Renja</th>
                                                <th rowspan="2" width='10%' style="text-align: center; vertical-align:middle">Pagu Program</th>
                                                <th colspan="3" style="text-align: center; vertical-align:middle">Kegiatan</th>
                                                <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">Status</th>
                                                <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">Aksi</th>
                                            </tr>
                                            <tr>
                                              <th width='5%' style="text-align: center; vertical-align:middle">Jumlah</th>
                                              <th width='5%' style="text-align: center; vertical-align:middle">Reviu</th>
                                              <th width='10%' style="text-align: center; vertical-align:middle">Pagu</th>
                                            </tr>
                                        </thead>
                                        <tbody>                                        
                                        </tbody>
                                    </table> 
                                </div>  
                            </div>                            
                            <div role="tabpanel" class="tab-pane fade in" id="kegiatan">
                                  <div id="divTambahKegiatan">
                                    <button id="btnTambahKegiatan" type="button" class="add-Kegiatan btn btn-labeled btn-success">
                                      <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Kegiatan</button>
                                  </div>
                                  <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
                                  <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                      <tbody>
                                        <tr>
                                            <td width="20%%" style="text-align: left; vertical-align:top;">Program Ranwal RKPD</td>
                                            <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd" id="nm_progrkpd_kegrenja" align='left'></label></td>
                                        </tr>
                                        <tr>
                                          <td width="20%%" style="text-align: left; vertical-align:top;">Program Rancangan Renja</td>
                                          <td style="text-align: left; vertical-align:top;"><label class="backRenja" id="nm_progrenja_kegrenja" align='left'></label></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                  </form>
                                    <table id="tblKegiatanRenja" class="table table-striped table-bordered table-responsive compact" width="100%">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">No Urut</th>
                                                <th rowspan="2" style="text-align: center; vertical-align:middle">Nama Kegiatan SKPD</th>
                                                <th colspan="2" width='20%' style="text-align: center; vertical-align:middle">Pagu Kegiatan</th>
                                                <th colspan="2" width='25%' style="text-align: center; vertical-align:middle">Aktivitas</th>
                                                <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">Status</th>
                                                <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">Aksi</th>
                                            </tr>
                                            <tr>
                                                <th width='10%' style="text-align: center; vertical-align:middle">Rancangan Renja</th>
                                                <th width='10%' style="text-align: center; vertical-align:middle">Forum PD</th>
                                                <th width='5%' style="text-align: center; vertical-align:middle">Jumlah</th>
                                                <th width='10%' style="text-align: center; vertical-align:middle">Pagu Aktivitas</th>
                                                {{-- <th width='10%' style="text-align: center; vertical-align:middle">Pagu Musrenbang</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>                                        
                                        </tbody>
                                    </table>   
                                </div>
                                <div role="tabpanel" class="tab-pane fade in" id="pelaksana">
                                  <div id="divTambahPelaksana">
                                    <button id="btnTambahPelaksana" type="button" class="add-pelaksana btn btn-labeled btn-success">
                                      <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Pelaksana</button>
                                  </div>
                                  <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
                                  <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                      <tbody>
                                        <tr>
                                            <td width="20%" style="text-align: left; vertical-align:top;">Program Ranwal RKPD</td>
                                            <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd" id="nm_progrkpd_pelaksana" align='left'></label></td>
                                          </tr>
                                        <tr>
                                          <td width="20%" style="text-align: left; vertical-align:top;">Program Renja</td>
                                          <td style="text-align: left; vertical-align:top;"><label class="backRenja" id="nm_progrenja_pelaksana" align='left'></label></td>
                                        </tr>
                                        <tr>
                                          <td width="20%" style="text-align: left; vertical-align:top;">Kegiatan Renja</td>
                                          <td style="text-align: left; vertical-align:top;"><label class="backKegiatan" id="nm_kegrenja_pelaksana" align='left'></label></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                  </form>
                                    <table id="tblPelaksana" class="table table-striped table-bordered table-responsive compact" width="100%">
                                        <thead>
                                            <tr>
                                                <th width='50px' style="text-align: center; vertical-align:middle">No Urut</th>
                                                <th style="text-align: center; vertical-align:middle">Nama Sub Unit Pelaksana</th>
                                                <th width='15%' style="text-align: center; vertical-align:middle">Lokasi Penyelenggaraan</th>
                                                <th width='10%' style="text-align: center; vertical-align:middle">Pagu Aktivitas</th>
                                                <th width='10%' style="text-align: center; vertical-align:middle">Pagu Belanja</th>
                                                <th width='10%' style="text-align: center; vertical-align:middle">Jumlah Lokasi</th>
                                                {{-- <th width='5%' style="text-align: center; vertical-align:middle">Status</th> --}}
                                                <th width='5%' style="text-align: center; vertical-align:middle">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>                                        
                                        </tbody>
                                    </table>   
                                </div>
                                <div role="tabpanel" class="tab-pane fade in" id="aktivitas">
                                  <div id="divTambahAktivitas">
                                    <button id="btnTambahAktivitas" type="button" class="add-aktivitas btn btn-labeled btn-success">
                                      <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Aktivitas</button>
                                  </div>            
                                  <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
                                  <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                      <tbody>
                                        <tr>
                                            <td width="20%" style="text-align: left; vertical-align:top;">Program Ranwal RKPD</td>
                                            <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd" id="nm_progrkpd_aktivitas" align='left'></label></td>
                                          </tr>
                                        <tr>
                                          <td width="20%" style="text-align: left; vertical-align:top;">Program Renja</td>
                                          <td style="text-align: left; vertical-align:top;"><label class="backRenja" id="nm_progrenja_aktivitas" align='left'></label></td>
                                        </tr>
                                        <tr>
                                          <td width="20%" style="text-align: left; vertical-align:top;">Kegiatan Renja</td>
                                          <td style="text-align: left; vertical-align:top;"><label class="backKegiatan" id="nm_kegrenja_aktivitas" align='left'></label></td>
                                        </tr>
                                        <tr>
                                          <td width="20%" style="text-align: left; vertical-align:top;">Pelaksana Kegiatan</td>
                                          <td style="text-align: left; vertical-align:top;"><label class="backPelaksana" id="nm_aktivitas_pelaksana" align='left'></label></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                  </form>
                                    <table id="tblAktivitas" class="table table-striped table-bordered table-responsive compact" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" width='50px' style="text-align: center; vertical-align:middle">No Urut</th>
                                                <th rowspan="2" style="text-align: center; vertical-align:middle">Nama Aktivitas</th>
                                                <th rowspan="2" width='10%' style="text-align: center; vertical-align:middle">Pagu Aktivitas</th>
                                                <th rowspan="2" width='10%' style="text-align: center; vertical-align:middle">Jml Belanja</th>
                                                <th colspan="2" width='10%' style="text-align: center; vertical-align:middle">Volume</th>
                                                <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">Status</th>
                                                <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">Aksi</th>
                                            </tr>
                                            <tr>
                                                <th width='5%' style="text-align: center; vertical-align:middle">1</th>
                                                <th width='5%' style="text-align: center; vertical-align:middle">2</th>
                                            </tr>
                                        </thead>
                                        <tbody>                                        
                                        </tbody>
                                    </table>   
                                </div>                              
                                <div role="tabpanel" class="tab-pane fade in" id="lokasi">
                                  <div id="divTambahLokasi">
                                    <button id="btnTambahLokasi" type="button" class="add-lokasi btn btn-labeled btn-success">
                                      <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Lokasi</button>
                                  </div>
                                  <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
                                  <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                      <tbody>
                                        <tr>
                                            <td width="20%" style="text-align: left; vertical-align:top;">Program Ranwal RKPD</td>
                                            <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd" id="nm_progrkpd_lokasi" align='left'></label></td>
                                          </tr>
                                        <tr>
                                          <td width="20%" style="text-align: left; vertical-align:top;">Program Renja</td>
                                          <td style="text-align: left; vertical-align:top;"><label class="backRenja" id="nm_progrenja_lokasi" align='left'></label></td>
                                        </tr>
                                        <tr>
                                          <td width="20%" style="text-align: left; vertical-align:top;">Kegiatan Renja</td>
                                          <td style="text-align: left; vertical-align:top;"><label class="backKegiatan" id="nm_kegrenja_lokasi" align='left'></label></td>
                                        </tr>
                                        <tr>
                                          <td width="20%" style="text-align: left; vertical-align:top;">Sub Unit Pelaksana</td>
                                          <td style="text-align: left; vertical-align:top;"><label class="backPelaksana" id="nm_sub_lokasi" align='left'></label></td>
                                        </tr>
                                        <tr>
                                          <td width="20%" style="text-align: left; vertical-align:top;">Aktivitas Kegiatan</td>
                                          <td style="text-align: left; vertical-align:top;"><label class="backAktivitas" id="nm_aktivitas_lokasi" align='left'></label></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                  </form>
                                    <table id="tblLokasi" class="table table-striped table-bordered table-responsive compact" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                {{-- <th rowspan="2" style="text-align: center; vertical-align:middle"></th> --}}
                                                <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">No Urut</th>
                                                <th rowspan="2" width='10%' style="text-align: center; vertical-align:middle">Sumber Usulan</th>
                                                <th rowspan="2" style="text-align: center; vertical-align:middle">Nama Lokasi</th>
                                                <th colspan="2" width='10%' style="text-align: center; vertical-align:middle">Volume</th>
                                                <th colspan="2" width='10%' style="text-align: center; vertical-align:middle">Status</th>
                                                <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">Aksi</th>
                                            </tr>
                                            <tr>
                                                <th style="text-align: center; vertical-align:middle">1</th>
                                                <th style="text-align: center; vertical-align:middle">2</th>
                                                <th style="text-align: center; vertical-align:middle">Usulan</th>
                                                <th style="text-align: center; vertical-align:middle">Data</th>
                                            </tr>
                                        </thead>
                                        <tbody>                                        
                                        </tbody>
                                    </table>   
                                </div>
                            <div role="tabpanel" class="tab-pane fade in" id="belanja">
                                  <div id="divAddSSH">
                                    <a id="btnTambahBelanja" type="button" class="add-belanja btn btn-labeled btn-success">
                                      <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah dari SSH</a>
                                     <a id="btnCopyBelanja" type="button" class="btn btn-labeled btn-primary">
                                      <span class="btn-label"><i class="fa fa-exchange fa-fw fa-lg"></i></span>Copy dari Aktivitas Lain</a>
                                  </div>
                                  <div id="divImportASB">
                                    <a id="btnTambahBelanjaASB" type="button" class="add-belanjaASB btn btn-labeled btn-info">
                                      <span class="btn-label"><i class="fa fa-download fa-fw fa-lg"></i></span>Tambah dari ASB</a>
                                    <a id="btnUnLoadAsb" type="button" class="btnUnLoadAsb btn btn-labeled btn-danger">
                                      <span class="btn-label"><i class="fa fa-stack-overflow fa-fw fa-lg"></i></span>Unload Belanja</a>
                                  </div>
                                  <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
                                  <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                      <tbody>
                                        <tr>
                                            <td width="20%" style="text-align: left; vertical-align:top;">Program Ranwal RKPD</td>
                                            <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd" id="nm_progrkpd_belanja" align='left'></label></td>
                                          </tr>
                                        <tr>
                                          <td width="20%" style="text-align: left; vertical-align:top;">Program Renja</td>
                                          <td style="text-align: left; vertical-align:top;"><label class="backRenja" id="nm_progrenja_belanja" align='left'></label></td>
                                        </tr>
                                        <tr>
                                          <td width="20%" style="text-align: left; vertical-align:top;">Kegiatan Renja</td>
                                          <td style="text-align: left; vertical-align:top;"><label class="backKegiatan" id="nm_kegrenja_belanja" align='left'></label></td>
                                        </tr>
                                        <tr>
                                          <td width="20%" style="text-align: left; vertical-align:top;">Sub Unit Pelaksana</td>
                                          <td style="text-align: left; vertical-align:top;"><label class="backPelaksana" id="nm_sub_belanja" align='left'></label></td>
                                        </tr>
                                        <tr>
                                          <td width="20%" style="text-align: left; vertical-align:top;">Aktivitas Kegiatan</td>
                                          <td style="text-align: left; vertical-align:top;"><label class="backAktivitas" id="nm_aktivitas_belanja" align='left'></label></td>
                                        </tr>
                                        {{-- <tr>
                                          <td width="20%" style="text-align: left; vertical-align:top;">Lokasi</td>
                                          <td style="text-align: left; vertical-align:top;"><label class="backLokasi" id="nm_lokasi_belanja" align='left'></label></td>
                                        </tr> --}}
                                      </tbody>
                                    </table>
                                  </div>
                                  </form>
                                    <table id="tblBelanja" class="table table-striped table-bordered table-responsive compact" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" width='50px' style="text-align: center; vertical-align:middle">No Urut</th>
                                                <th rowspan="2" style="text-align: center; vertical-align:middle">Item Belanja</th>
                                                {{-- <th rowspan="2" width='15%' style="text-align: center; vertical-align:middle">Kode Rekening</th> --}}
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

<script id="details-template" type="text/x-handlebars-template">
        <table class="table table-striped table-bordered table-responsive compact details-table" id="bidang-@{{id_unit}}@{{id_rkpd_ranwal}}">
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

<script id="details-usulan" type="text/x-handlebars-template">
        <table class="table table-striped table-bordered table-responsive compact details-table" id="usulan-@{{id_lokasi_forum}}@{{id_pelaksana_forum}}">
            <thead>
              <tr>
                  <th rowspan="2" width="10%" style="text-align: center; vertical-align:middle;">No Urut</th>
                  <th rowspan="2" width="10%" style="text-align: center; vertical-align:middle;">No Ref</th>
                  <th rowspan="2" width="30%" style="text-align: center; vertical-align:middle;">Asal Referensi</th>
                  <th colspan="2" width="15%" style="text-align: center; vertical-align:middle;">Volume Usulan</th>
                  <th colspan="2" width="15%" style="text-align: center; vertical-align:middle;">Volume Forum</th>
                  <th rowspan="2" width="10%" style="text-align: center; vertical-align:middle;">Status</th>
                  <th rowspan="2" width="10px" style="text-align: center; vertical-align:middle;">Aksi</th>
              </tr>
              <tr>
                  
                  <th style="text-align: center; vertical-align:middle;">1</th>
                  <th style="text-align: center; vertical-align:middle;">2</th>
                  <th style="text-align: center; vertical-align:middle;">1</th>
                  <th style="text-align: center; vertical-align:middle;">2</th>
              </tr>
            </thead>
            <tbody></tbody>
        </table>
</script>


<div id="ModalProgRenja" class="modal fade" role="dialog" data-backdrop="static" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
                <div class="modal-header">
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form name="frmProgRenja" class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="id_forum_program" name="id_forum_program">
                <input type="hidden" id="id_forum_rkpdprog_progrenja" name="id_forum_rkpdprog_progrenja">
                <input type="hidden" id="tahun_forum_progrenja" name="tahun_forum_progrenja">
                <input type="hidden" id="id_unit_progrenja" name="id_unit_progrenja">
                <input type="hidden" id="sumber_data_progrenja" name="sumber_data_progrenja">
                <input type="hidden" id="status_data_progrenja" name="status_data_progrenja">
                <div class="form-group">
                  <label class="control-label col-sm-3" for="id">No Urut :</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control nomor" name="no_urut_progrenja" id="no_urut_progrenja">
                  </div>
                  </div>
                <div class="form-group">
                  <label class="control-label col-sm-3" for="id">Jenis Belanja :</label>
                  <div class="col-sm-5">
                    <select class="form-control" name="jenis_belanja" id="jenis_belanja">
                      <option value="0">Belanja Langsung</option>
                      <option value="1">Pendapatan</option>
                      <option value="2">Belanja Tidak Langsung</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3" for="title">Uraian Program Renstra:</label>
                  <div class="col-sm-8">
                    <textarea type="name" class="form-control" name="uraian_program_renstra" id="uraian_program_renstra" rows="3" disabled></textarea>
                  </div>
                  <input type="hidden" id="id_renja_program" name="id_renja_program">
                  <input type="hidden" id="id_program_renstra" name="id_program_renstra">
                  <span class="btn btn-sm btn-primary btnCariProgramRenstra" id="btnCariProgramRenstra" name="btnCariProgramRenstra"><i class="fa fa-search fa-fw fa-lg"></i></span>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3" for="title">Uraian Program Referensi:</label>
                  <div class="col-sm-8">
                    <textarea type="name" class="form-control ur_program_ref" name="ur_program_ref" id="ur_program_ref" rows="3" disabled></textarea>
                  </div>
                  <input type="hidden" id="id_program_ref" name="id_program_ref">
                  <span class="btn btn-sm btn-primary btnCariProgRef" id="btnCariProgRef" name="btnCariProgRef"><i class="fa fa-search fa-fw fa-lg"></i></span>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-3" for="title">Uraian Program Forum:</label>
                  <div class="col-sm-8">
                    <textarea type="name" class="form-control ur_program_renja" name="ur_program_renja" id="ur_program_renja" rows="3" disabled></textarea>
                  </div>
                </div>
                <div class="form-group hidden">
                  <label for="pagu_rkpd_program" class="col-sm-3 control-label" align='left'>Pagu Renja :</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control number" id="pagu_renja_program" name="pagu_renja_program" disabled >
                  </div>
                  <label for="pagu_forum_program" class="col-sm-2 control-label" align='left'>Pagu Forum :</label>
                  <div class="col-sm-3">
                      <input type="text" class="form-control number" id="pagu_forum_progrenja" name="pagu_forum_progrenja" required="required" >                    
                  </div>
                </div>
                <div class="form-group idStatusPelaksanaan" id="idStatusProgRenja">
                  <label for="status_pelaksanaan_progrenja" class="col-sm-3 control-label" align='left'>Status Pelaksanaan :</label>
                  <div class="col-sm-8" id="myRadio">
                      <label class="radio-inline">
                        <input type="radio" class="sp_progrenja" name="status_pelaksanaan_progrenja" id="status_pelaksanaan_progrenja" value="0">Tepat Waktu
                      </label>
                      <label class="radio-inline hidden">
                        <input type="radio" class="sp_progrenja " name="status_pelaksanaan_progrenja" id="status_pelaksanaan_progrenja" value="1">Dimajukan
                      </label>
                      <label class="radio-inline">
                        <input type="radio" class="sp_progrenja" name="status_pelaksanaan_progrenja" id="status_pelaksanaan_progrenja" value="2">Ditunda
                      </label>
                      <label class="radio-inline">
                        <input type="radio" class="sp_progrenja" name="status_pelaksanaan_progrenja" id="status_pelaksanaan_progrenja" value="3">Dibatalkan
                      </label>
                      <label class="radio-inline" id="sp_progrenja4" style="display: none;">
                        <input type="radio" class="sp_progrenja" name="status_pelaksanaan_progrenja" id="status_pelaksanaan_progrenja" value="4">Baru
                      </label>
                  </div>
                </div>
                <div class="form-group KetPelaksanaanProgRenja">
                  <label for="keterangan_status_program" class="col-sm-3 control-label" align='left'>Keterangan Pelaksanaan :</label>
                  <div class="col-sm-8">
                    <textarea type="text" class="form-control keterangan_status_progrenja" name="keterangan_status_progrenja" id="keterangan_status_progrenja" rows="3"></textarea>
                  </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapus">
                        <button class="btn btn-sm btn-danger btn-labeled btnHapusProgRenja"><span class="btn-label"><i class="fa fa-trash fa-fw fa-lg"></i></span>Hapus</button>
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                         <button type="button" class="btn btn-sm btn-labeled btn-success btnProgRenja" data-dismiss="modal"><span class="btn-label"><i class="fa fa-floppy-o fa-fw fa-lg"></i></span> Simpan</button>
                         <div class="or"></div>
                        <button type="button" class="btn btn-sm btn-labeled btn-warning" data-dismiss="modal" aria-hidden="true"><span class="btn-label"><i class="fa fa-sign-out fa-fw fa-lg"></i></span> Tutup</button>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="HapusProgRenja" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
            <h4>Hapus Data Program SKPD</h4>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id_forum_program_hapus" name="id_forum_program_hapus">
            <div class="alert alert-danger deleteContent">
              <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border"  style="color:red;" aria-hidden="true"></i>
                Yakin akan menghapus Program : <strong><span id="ur_progrenja_hapus"></span></strong> ?
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
                        <button type="button" class="btn btn-sm btn-danger btnDelProgRenja btn-labeled" data-dismiss="modal">
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

<div id="ModalKegiatan" class="modal fade" role="dialog" data-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
              <form name="frmModalKegiatan" class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="id_forum_skpd" name="id_forum_skpd">
                <input type="hidden" id="id_forum_program_kegrej" name="id_forum_program_kegrej">
                <input type="hidden" id="tahun_forum_kegrej" name="tahun_forum_kegrej">
                <input type="hidden" id="id_unit_kegrej" name="id_unit_kegrej">
                <input type="hidden" id="id_renja" name="id_renja">
                <input type="hidden" id="id_rkpd_renstra" name="id_rkpd_renstra">
                <input type="hidden" id="id_program_renstra" name="id_program_renstra">
                <div class="form-group">
                  <label class="control-label col-sm-3" for="id">No Urut :</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control nomor" name="no_urut_kegiatan" id="no_urut_kegiatan" disabled>
                  </div>
                  <div class="col-sm-3 chkKegiatan hidden">
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
                    <span class="btn btn-sm btn-primary btnCariKegiatanRenstra" id="btnCariKegiatanRenstra" name="btnCariKegiatanRenstra"><i class="fa fa-search fa-fw fa-lg"></i></span>
                  </div>
                  <div class="form-group urKegiatanRef">
                    <label class="control-label col-sm-3" for="title">Uraian Kegiatan Referensi:</label>
                    <div class="col-sm-8">
                      <textarea type="name" class="form-control" id="ur_kegiatan_ref" rows="3" disabled></textarea>
                    </div>
                    <input type="hidden" id="id_kegiatan_ref" name="id_kegiatan_ref">
                    <span class="btn btn-sm btn-primary btnCariKegiatanRef" id="btnCariKegiatanRef" name="btnCariKegiatanRef"><i class="fa fa-search fa-fw fa-lg"></i></span>
                  </div>
                  <div class="form-group lblKegiatanRenja">
                    <label class="control-label col-sm-3" for="title">Uraian Kegiatan Forum:</label>
                    <div class="col-sm-8">
                      <textarea type="name" class="form-control" id="ur_kegiatan_forum" rows="3"></textarea>
                    </div>
                  </div>
                  <div class="form-group" id="idStatuskegrenja">
                  <label for="status_pelaksanaan_kegrenja" class="col-sm-3 control-label" align='left'>Status Pelaksanaan :</label>
                  <div class="col-sm-8" id="myRadio">
                      <label class="radio-inline">
                        <input type="radio" class="sp_kegrenja" name="status_pelaksanaan_kegrenja" id="status_pelaksanaan_kegrenja" value="0">Tepat Waktu
                      </label>
                      <label class="radio-inline hidden">
                        <input type="radio" class="sp_kegrenja" name="status_pelaksanaan_kegrenja" id="status_pelaksanaan_kegrenja" value="1">Dimajukan
                      </label>
                      <label class="radio-inline">
                        <input type="radio" class="sp_kegrenja" name="status_pelaksanaan_kegrenja" id="status_pelaksanaan_kegrenja" value="2">Ditunda
                      </label>
                      <label class="radio-inline">
                        <input type="radio" class="sp_kegrenja" name="status_pelaksanaan_kegrenja" id="status_pelaksanaan_kegrenja" value="3">Dibatalkan
                      </label>
                      <label class="radio-inline hidden" id="sp_kegrenja4">
                        <input type="radio" class="sp_kegrenja" name="status_pelaksanaan_kegrenja" id="status_pelaksanaan_kegrenja" value="4">Baru
                      </label>
                  </div>
                </div>
                <div class="form-group KetPelaksanaan_keg">
                  <label for="keterangan_status_kegiatan" class="col-sm-3 control-label" align='left'>Keterangan Pelaksanaan :</label>
                  <div class="col-sm-8">
                    <textarea type="text" class="form-control keterangan_status_kegiatan" name="keterangan_status_kegiatan" id="keterangan_status_kegiatan" rows="3" disabled></textarea>
                  </div>
                </div>
                <div class="form-group">
                <div class="col-sm-11">
                    <table class="table table-striped table-bordered table-responsive">
                        <thead>
                          <tr>
                            <td width="25%" style="text-align: center; vertical-align:middle;">
                              <label for="pagu_renstra" class="control-label" align='left' style="text-align: center; vertical-align:middle;">Uraian</label>
                            </td>
                            <td width="25%" style="text-align: center; vertical-align:middle;">
                              <label for="pagu_renstra" class="control-label" align='left' style="text-align: center; vertical-align:middle;">Pagu Renstra</label>
                            </td>
                            <td width="25%" style="text-align: center; vertical-align:middle;">
                              <label for="pagu_renja_kegiatan" class="control-label" align='left' style="text-align: center; vertical-align:middle;">Pagu Tahun ini</label>
                            </td>
                            <td width="25%" style="text-align: center; vertical-align:middle;">
                              <label for="pagu_selanjutnya" class="control-label" align='left' style="text-align: center; vertical-align:middle;">Pagu Tahun selanjutnya</label>
                            </td>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <td style="text-align: center; vertical-align:middle;">
                                <label for="pagu_renstra" class="control-label" align='left' style="text-align: center; vertical-align:middle;">Pra-Forum</label>
                              </td>
                              <td style="text-align: center; vertical-align:middle;"><input type="text" class="form-control number" id="pagu_renstra" name="pagu_renstra" style="text-align: right; vertical-align:middle" disabled ></td>
                          
                              <td style="text-align: center; vertical-align:middle;"><input type="text" class="form-control number" id="pagu_renja_kegiatan" name="pagu_renja_kegiatan" style="text-align: right; vertical-align:middle" disabled></td>
                          
                              <td style="text-align: center; vertical-align:middle;"><input type="text" class="form-control number" id="pagu_selanjutnya" name="pagu_selanjutnya" style="text-align: right; vertical-align:middle" disabled></td>
                          </tr>
                          <tr>
                              <td style="text-align: center; vertical-align:middle;">
                                <label for="pagu_renstra" class="control-label" align='left' style="text-align: center; vertical-align:middle;">Forum</label>
                              </td>
                              <td style="text-align: center; vertical-align:middle;"><input type="text" class="form-control number" id="pagu_renstra_forum" name="pagu_renstra_forum" style="text-align: right; vertical-align:middle" disabled></td>
                          
                              <td style="text-align: center; vertical-align:middle;"><input type="text" class="form-control number" id="pagu_renja_kegiatan_forum" name="pagu_renja_kegiatan_forum" style="text-align: right; vertical-align:middle"></td>
                          
                              <td style="text-align: center; vertical-align:middle;"><input type="text" class="form-control number" id="pagu_selanjutnya_forum" name="pagu_selanjutnya_forum" style="text-align: right; vertical-align:middle"></td>
                          </tr>
                        </tbody>
                    </table>
                </div>
                </div>
                <div class="form-group hidden">
                  <label for="pagu_tahun_kegiatan" class="col-sm-3 control-label" align='left'>Pagu Renja :</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control number" id="pagu_tahun_kegiatan" name="pagu_tahun_kegiatan" disabled >
                  </div>
                  <label for="pagu_forum" class="col-sm-2 control-label" align='left'>Pagu Forum :</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control number" id="pagu_forum" name="pagu_forum" >
                  </div>
                </div>
                <div class="form-group hidden">
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
            </div>
              <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusKeg">
                      <button id="btnHapusKegRenja" class="btn btn-sm btn-danger btn-labeled"><span class="btn-label"><i class="fa fa-trash fa-fw fa-lg"></i></span>Hapus</button>
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-sm btn-success btnKegiatan btn-labeled" data-dismiss="modal">
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

<div id="HapusKegRenja" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
            <h4>Hapus Data Kegiatan SKPD</h4>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id_forum_hapus" name="id_forum_hapus">
            <div class="alert alert-danger deleteContent">
              <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border"  style="color:red;" aria-hidden="true"></i>
                Yakin akan menghapus Kegiatan : <strong><span id="ur_kegrenja_hapus"></span></strong> ?
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
                        <button type="button" id="btnDelKegRenja" class="btn btn-sm btn-danger btn-labeled" data-dismiss="modal">
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

<div id="ModalAktivitas" class="modal fade" role="dialog" data-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
              <form name="frmModalAktivitas" class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="id_forum_aktivitas" name="id_forum_aktivitas">
                <input type="hidden" id="id_aktivitas" name="id_aktivitas">
                <input type="hidden" id="tahun_forum_aktivitas" name="tahun_forum_aktivitas">
                <input type="hidden" id="id_renja_aktivitas" name="id_renja_aktivitas">
                <div class="form-group">
                  <label class="control-label col-sm-3" for="id">No Urut :</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control nomor" name="no_urut_aktivitas" id="no_urut_aktivitas">
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
                      <textarea type="name" class="form-control" id="ur_aktivitas_kegiatan" rows="3" disabled></textarea>
                    </div>
                    <input type="hidden" id="id_aktivitas_asb" name="id_aktivitas_asb">
                    <span class="btn btn-sm btn-primary btnCariASB" id="btnCariASB" name="btnCariASB"><i class="fa fa-search fa-fw fa-lg"></i></span>
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
                    <div class="col-sm-4">
                        <select type="text" class="form-control sumber_dana" id="sumber_dana" name="sumber_dana"></select>
                    </div>
                </div>
                <div class="form-group">
                  <label for="pagu_aktivitas_renja" class="col-sm-3 control-label" align='left'>Pagu Rancangan Renja :</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control number" id="pagu_aktivitas_renja" name="pagu_aktivitas_renja" disabled>
                  </div>
                  <label for="pagu_aktivitas" class="col-sm-2 control-label" align='left'>Pagu Forum :</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control number" id="pagu_aktivitas" name="pagu_aktivitas">
                  </div>
                </div>
                <div class="form-group">
                  <label for="id_satuan_1_aktivitas" class="col-sm-3 control-label" align='left'>Satuan Vol 1 :</label>
                  <div class="col-sm-3">
                    <select type="text" class="form-control" id="id_satuan_1_aktivitas" name="id_satuan_1_aktivitas"></select> 
                  </div>
                  <label for="id_satuan_2_aktivitas" class="col-sm-2 control-label" align='left'>Satuan Vol 2 :</label>
                  <div class="col-sm-3">
                    <select type="text" class="form-control" id="id_satuan_2_aktivitas" name="id_satuan_2_aktivitas"></select> 
                  </div>
                </div>
                <div class="form-group" id="divSatuanUtama"> 
                  <label for="satuan_utama" class="col-sm-3 control-label" align='left'>Satuan Vol Utama :</label>                 
                  <div class="col-sm-8">
                    <label class="radio-inline">
                      <input type="radio" class="satuan_utama" name="satuan_utama" id="satuan_utama" value="0">
                      <span class="control-label" id="ur_sat_utama1" align='left'>-</span> 
                    </label>
                    <label class="radio-inline">
                      <input type="radio" class="satuan_utama" name="satuan_utama" id="satuan_utama" value="1">
                      <span class="control-label" id="ur_sat_utama2" align='left'>-</span> 
                    </label>
                  </div>
                </div>
                <div class="form-group" id="divJenisPembahasan"> 
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
                <div class="form-group" id="divPaguMusrenbang">
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
                {{-- <div class="form-group" id="divSatuanPublik hidden">
                    <label class="control-label col-sm-3" for="title">Satuan Output Musrenbang :</label>
                    <div class="col-sm-4">
                        <select type="text" class="form-control" id="id_satuan_publik" name="id_satuan_publik"></select>
                    </div>
                </div> --}}
                <div class="form-group" id="idStatusPelaksanaanAktivitas">
                  <label for="status_pelaksanaan_aktivitas" class="col-sm-3 control-label" align='left'>Status Pelaksanaan :</label>
                  <div class="col-sm-8" id="myRadio">
                      <label class="radio-inline">
                        <input type="radio" class="sp_aktivitas" name="status_pelaksanaan_aktivitas" id="status_pelaksanaan_aktivitas" value="0">Dilaksanakan
                      </label>
                      <label class="radio-inline">
                        <input type="radio" class="sp_aktivitas" name="status_pelaksanaan_aktivitas" id="status_pelaksanaan_aktivitas" value="1">Tidak Dilaksanakan
                      </label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="keterangan_status_aktivitas" class="col-sm-3 control-label" align='left'>Keterangan Pelaksanaan :</label>
                  <div class="col-sm-8">
                    <textarea type="text" class="form-control" name="keterangan_status_aktivitas" id="keterangan_status_aktivitas" rows="3"></textarea>
                  </div>
                </div>
              </form>
            </div>
              <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idHapusAktivitas">
                        <button type="button" id="btnHapusAktivitas" class="btn btn-sm btn-danger btn-labeled">
                            <span class="btn-label"><i class="fa fa-trash fa-fw fa-lg"></i></span>Hapus</button>
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" id="btnAktivitas" class="btn btn-sm btn-success btn-labeled" data-dismiss="modal">
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

<div id="HapusAktivitas" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
            <h4>Hapus Data Aktivitas Kegiatan SKPD</h4>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id_aktivitas_hapus" name="id_aktivitas_hapus">
            <div class="alert alert-danger deleteContent">
              <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border"  style="color:red;" aria-hidden="true"></i>
                Yakin akan menghapus Aktivitas : <strong><span id="ur_aktivitas_hapus"></span></strong> ?
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
                        <button type="button" id="btnDelAktivitas" class="btn btn-sm btn-danger btn-labeled" data-dismiss="modal">
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

<div id="ModalPelaksana" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form name="frmModalPelaksana" class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" id="id_pelaksana_forum" name="id_pelaksana_forum">
            <input type="hidden" id="id_forum_pelaksana" name="id_forum_pelaksana">
            <input type="hidden" id="id_aktivitas_pelaksana" name="id_aktivitas_pelaksana">
            <input type="hidden" id="tahun_forum_pelaksana" name="tahun_forum_pelaksana">
            <div class="form-group">
              <label class="control-label col-sm-3" for="id">No Urut :</label>
              <div class="col-sm-3">
                <input type="text" class="form-control nomor" id="no_urut_pelaksana">
              </div>
              <div class="col-sm-3 chkPelaksana hidden">
                    <label class="checkbox-inline">
                    <input class="checkPelaksana" type="checkbox" name="checkPelaksana" id="checkPelaksana" value="1"> Telah Direviu</label>
              </div>
            </div>
            <div class="form-group" >
              <label class="control-label col-sm-3" for="title">Sub Unit Pelaksana :</label>
              <div class="col-sm-8">
              <div class="input-group">
                <input type="hidden" id="id_subunit_pelaksana" name="id_subunit_pelaksana">
                <input type="name" class="form-control" id="subunit_pelaksana" rows="2" disabled>
                <div class="input-group-btn">
                    <btn class="btn btn-primary" id="btnCariSubUnit" name="btnCariSubUnit"><i class="fa fa-search"></i></btn>
                </div>
              </div>
              </div>
            </div>
            <div class="form-group" id="idStatusPelaksanaanPelaksana">
                  <label for="status_pelaksanaan_pelaksana" class="col-sm-3 control-label" align='left'>Status Pelaksanaan :</label>
                  <div class="col-sm-8" id="myRadio">
                      <label class="radio-inline">
                        <input type="radio" class="sp_pelaksana" name="status_pelaksanaan_pelaksana" id="status_pelaksanaan_pelaksana" value="0">Dilaksanakan
                      </label>
                      <label class="radio-inline">
                        <input type="radio" class="sp_pelaksana" name="status_pelaksanaan_pelaksana" id="status_pelaksanaan_pelaksana" value="1">Tidak Dilaksanakan
                      </label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="keterangan_status_pelaksana" class="col-sm-3 control-label" align='left'>Keterangan Pelaksanaan :</label>
                  <div class="col-sm-8">
                    <textarea type="text" class="form-control" name="keterangan_status_pelaksana" id="keterangan_status_pelaksana" rows="3"></textarea>
                  </div>
                </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="title">Lokasi Penyelenggaraan :</label>
                <div class="col-sm-8">
                  <div class="input-group">
                    <input type="hidden" id="id_lokasi_pelaksana" name="id_lokasi_pelaksana">
                    <input type="name" class="form-control" id="nm_lokasi_pelaksana" rows="2" disabled>
                    <div class="input-group-btn">
                      <btn class="btn btn-primary" id="btnCariLokasi" name="btnCariLokasi"><i class="fa fa-search"></i></btn>
                    </div>
                  </div>
                </div>
            </div>
          </form>
        </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idHapusPelaksana">
                        <button id="btnHapusPelaksana" type="button" class="btn btn-sm btn-danger btn-labeled">
                            <span class="btn-label"><i class="fa fa-trash fa-fw fa-lg"></i></span>Hapus</button>
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button id="btnPelaksana" type="button" class="btn btn-sm btn-success btn-labeled" data-dismiss="modal">
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
    </div>

<div id="HapusPelaksana" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
            <h4>Hapus Data Pelaksana Aktivitas Kegiatan SKPD</h4>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id_pelaksana_hapus" name="id_pelaksana_hapus">
            <div class="alert alert-danger deleteContent">
              <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border"  style="color:red;" aria-hidden="true"></i>
                Yakin akan menghapus Sub Unit : <strong><span id="ur_pelaksana_hapus"></span></strong> sebagai pelaksana aktivitas ?
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
                        <button type="button" id="btnDelPelaksana" class="btn btn-sm btn-danger btn-labeled" data-dismiss="modal">
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
            <input type="hidden" id="id_pelaksana_lokasi" name="id_pelaksana_lokasi">
            <input type="hidden" id="id_lokasi_forum" name="id_lokasi_forum">
            <input type="hidden" id="tahun_forum_lokasi" name="tahun_forum_lokasi">
            <div class="form-group">
              <label class="control-label col-sm-3" for="id">No Urut :</label>
              <div class="col-sm-3">
                <input type="text" class="form-control nomor" id="no_urut_lokasi">
              </div>
              <div class="col-sm-3 chkLokasi">
                    <label class="checkbox-inline">
                    <input class="checkLokasi" type="checkbox" name="checkLokasi" id="checkLokasi" value="1"> Telah Direviu</label>
              </div>
            </div>
            <div class="form-group">
                    <label class="control-label col-sm-3" for="sumber_data_lokasi">Sumber Usulan :</label>
                    <div class="col-sm-5">
                        <select type="text" class="form-control" id="sumber_data_lokasi" name="sumber_data_lokasi" disabled>
                          <option value="0">Renja SKPD</option>
                          <option value="1">Musrenbang Desa</option>
                          <option value="2">Musrenbang Kecamatan</option>
                          <option value="3">Pokir Dewan</option>
                          <option value="4">Forum Perangkat Daerah</option>
                        </select>
                    {{-- </div> --}}
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
                      <btn class="btn btn-primary btnCariLokasi" id="btnCariLokasi" name="btnCariLokasi"><i class="fa fa-search fa-fw fa-lg"></i></btn>
                    </div>
                  </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="title">Lokasi Teknis Aktivitas :</label>
                <div class="col-sm-8">
                  <div class="input-group">
                    <input type="hidden" id="id_lokasi_teknis" name="id_lokasi_teknis">
                    <input type="name" class="form-control" id="nm_lokasi_teknis" rows="2" disabled>
                    <div class="input-group-btn">
                      <btn class="btn btn-primary btnCariLokasiTeknis" id="btnCariLokasiTeknis" name="btnCariLokasiTeknis"><i class="fa fa-search fa-fw fa-lg"></i></btn>
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
            <div class="col-sm-12">
                    <table class="table table-bordered table-condensed">
                        <thead style="background-color: #428bca; color: #fff">
                          <tr>
                            <td rowspan="2" width="5%" style="text-align: center; vertical-align:middle;">Nomor</td>
                            <td colspan="2"  width="65%" style="text-align: center; vertical-align:middle;">Volume</td>
                            <td rowspan="2" width="30%" style="text-align: center; vertical-align:middle;">Satuan</td>
                          </tr>
                          <tr>
                            <td width="30%" style="text-align: center; vertical-align:middle;">Sebelumnya</td>
                            <td width="30%" style="text-align: center; vertical-align:middle;">Forum</td>
                          </tr>
                        </thead>
                        <tbody style="background-color: #fff">
                          <tr>
                              <td width="5%" style="text-align: center; vertical-align:top;">
                                <label class="control-label" style="text-align: center; vertical-align:top;">1</label>
                              </td>
                              <td width="30%" style="text-align: center; vertical-align:top;">
                                <input type="text" class="form-control number" id="volume_usulan_1" name="volume_usulan_1" style="text-align: right; vertical-align:top;" disabled>
                              </td>                          
                              <td width="30%" style="text-align: center; vertical-align:top;">
                                <input type="text" class="form-control number" id="volume_1" name="volume_1" style="text-align: right; vertical-align:top;"> 
                              </td>
                              <td width="30%" style="text-align: center; vertical-align:top;">
                                <label class="radio">
                                  <select type="text" class="form-control" id="id_satuan_1" name="id_satuan_1" disabled></select>
                                </label>   
                              </td>
                          </tr>
                          <tr>
                              <td width="5%" style="text-align: center; vertical-align:top;">
                                <label class="control-label" style="text-align: center; vertical-align:top;">2</label>
                              </td>
                              <td width="30%" style="text-align: center; vertical-align:top;">
                                <input type="text" class="form-control number" id="volume_usulan_2" name="volume_usulan_2" style="text-align: right; vertical-align:top;" disabled>
                              </td>                          
                              <td width="30%" style="text-align: center; vertical-align:top;">
                                <input type="text" class="form-control number" id="volume_2" name="volume_2" style="text-align: right; vertical-align:top;"> 
                              </td>
                              <td width="30%" style="text-align: center; vertical-align:top;" disabled>
                                <label class="radio">
                                  <select type="text" class="form-control" id="id_satuan_2" name="id_satuan_2" disabled></select>
                                </label>   
                              </td>
                          </tr>
                        </tbody>
                    </table>
                </div>
              <div class="form-group" id="idStatusPelaksanaanLokasi">
                  <label for="status_pelaksanaan_lokasi" class="col-sm-3 control-label" align='left'>Status Pelaksanaan :</label>
                  <div class="col-sm-8" id="myRadio">
                      <label class="radio-inline">
                        <input type="radio" class="sp_lokasi" name="status_pelaksanaan_lokasi" id="status_pelaksanaan_lokasi" value="0">Tanpa Perubahan
                      </label>
                      <label class="radio-inline">
                        <input type="radio" class="sp_lokasi" name="status_pelaksanaan_lokasi" id="status_pelaksanaan_lokasi" value="1">Dengan Perubahan
                      </label>
                  </div>
                  <div class="col-sm-8 col-sm-offset-3" id="myRadio">
                      <label class="radio-inline">
                        <input type="radio" class="sp_lokasi" name="status_pelaksanaan_lokasi" id="status_pelaksanaan_lokasi" value="2">Digabungkan
                      </label>
                      <label class="radio-inline">
                        <input type="radio" class="sp_lokasi" name="status_pelaksanaan_lokasi" id="status_pelaksanaan_lokasi" value="3">Ditolak/Tidak dilaksanakan
                      </label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="keterangan_status_lokasi" class="col-sm-3 control-label" align='left'>Keterangan Pelaksanaan :</label>
                  <div class="col-sm-8">
                    <textarea type="text" class="form-control" name="keterangan_status_lokasi" id="keterangan_status_lokasi" rows="3"></textarea>
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
            <h4>Hapus Data Pelaksana Aktivitas Kegiatan SKPD</h4>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id_lokasi_hapus" name="id_lokasi_hapus">
            <div class="alert alert-danger deleteContent">
                <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border"  style="color:red;" aria-hidden="true"></i>
                Yakin akan menghapus lokasi : <strong><span id="ur_lokasi_hapus"></span></strong> sebagai lokasi pelaksanaan aktivitas ?
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
                <input type="hidden" id="id_belanja_forum" name="id_belanja_forum">
                <input type="hidden" id="tahun_forum_belanja" name="tahun_forum_belanja">
                <input type="hidden" id="sumber_data_belanja" name="sumber_data_belanja">
                <div class="form-group">
                  <label class="control-label col-sm-3" for="id">No Urut :</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control nomor" name="no_urut_belanja" id="no_urut_belanja">
                  </div>
                  <div class="col-sm-3 chkBelanja">
                    <label class="checkbox-inline">
                    <input class="checkBelanja" type="checkbox" name="checkBelanja" id="checkBelanja" value="1"> Telah Direviu</label>
                  </div>
                </div>
                <div class="form-group hidden">
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
                    <input type="hidden" class="form-control" id="id_item_ssh" name="id_item_ssh">
                    <input type="hidden" class="form-control" id="rekening_ssh" name="rekening_ssh" >
                    <div class="input-group">
                    <input type="text" class="form-control" id="ur_item_ssh" name="ur_item_ssh" disabled>
                     <div class="input-group-btn">
                      <button class="btn btn-primary btnCariSSH" id="btnCariSSH" name="btnCariSSH" data-toggle="modal" href="#"><i class="fa fa-search fa-fw fa-lg"></i></button>
                    </div>
                  </div>
                  </div>
                </div>
                <div class="form-group"> 
                  <label for="id_rekening" class="col-sm-3 control-label" align='left'>Kode Rekening :</label>                 
                  <div class="col-sm-8">
                    <input type="hidden" class="form-control" id="id_rekening" name="id_rekening" disabled>
                    <div class="input-group">
                      <input type="text" class="form-control" id="ur_rekening" name="ur_rekening" disabled>
                      <div class="input-group-btn">
                      <button class="btn btn-primary btnCariRekening" id="btnCariRekening" name="btnCariRekening" data-toggle="modal" href="#"><i class="fa fa-search fa-fw fa-lg"></i></button>
                    </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                <div class="col-sm-12">
                    <table class="table table-bordered table-responsive">
                        <thead style="background-color: #428bca; color: #fff">
                          <tr>
                            <td width="5%" style="text-align: center; vertical-align:middle;">Sumber</td>
                            <td width="25%" style="text-align: center; vertical-align:middle;">Volume 1</td>
                            <td width="25%" style="text-align: center; vertical-align:middle;">Volume 2</td>
                            <td width="20%" style="text-align: center; vertical-align:middle;">Harga Satuan</td>
                            <td width="25%" style="text-align: center; vertical-align:middle;">Jumlah Total</td>
                          </tr>
                        </thead>
                        <tbody style="background-color: #fff">
                          <tr>
                              <td rowspan="2" width="5%" style="text-align: center; vertical-align:middle;">Renja</td>
                              <td width="25%" style="text-align: left; vertical-align:middle;">
                                <input type="text" class="form-control number" id="volume1" name="volume1" disabled>
                              </td>
                          
                              <td width="25%" style="text-align: left; vertical-align:middle;">
                                <input type="text" class="form-control number" id="volume2" name="volume2" disabled>
                              </td>                          
                              <td rowspan="2" width="20%" style="text-align: left; vertical-align:middle;"><input type="text" class="form-control number" id="harga_satuan" name="harga_satuan" disabled></td>
                              <td rowspan="2" width="25%" style="text-align: left; vertical-align:middle;"><input type="text" class="form-control number" id="jumlah_belanja" name="jumlah_belanja" disabled></td>
                          </tr>
                          <tr>
                              <td width="25%" style="text-align: left; vertical-align:middle;">
                                <select type="text" class="form-control" id="id_satuan1" name="id_satuan1" disabled></select>
                              </td>
                          
                              <td width="25%" style="text-align: left; vertical-align:middle;">
                                <select type="text" class="form-control" id="id_satuan2" name="id_satuan2" disabled></select>
                              </td>
                          </tr>
                          <tr>
                              <td rowspan="2" width="5%" style="text-align: center; vertical-align:middle;">Forum</td>
                              <td width="25%" style="text-align: left; vertical-align:top;">
                                <input type="text" class="form-control number" id="volume1_forum" name="volume1_forum">
                              </td>                          
                              <td width="25%" style="text-align: left; vertical-align:middle;">
                                <input type="text" class="form-control number" id="volume2_forum" name="volume2_forum">
                              </td>                          
                              <td rowspan="2" width="20%" style="text-align: left; vertical-align:middle;"><input type="text" class="form-control number" id="harga_satuan_forum" name="harga_satuan_forum" disabled></td>
                              <td rowspan="2" width="25%" style="text-align: left; vertical-align:middle;"><input type="text" class="form-control number" id="jumlah_belanja_forum" name="jumlah_belanja_forum" disabled></td>
                          </tr>
                          <tr>
                              <td width="25%" style="text-align: left; vertical-align:middle;">
                                <select type="text" class="form-control" id="id_satuan1_forum" name="id_satuan1_forum"></select>
                              </td>
                          
                              <td width="25%" style="text-align: left; vertical-align:middle;">
                                <select type="text" class="form-control" id="id_satuan2_forum" name="id_satuan2_forum"></select>
                              </td>
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
            </div>
              <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusBelanja">
                        <button type="button" class="btn btn-sm btn-danger btnHapusBelanja btn-labeled">
                            <span class="btn-label"><i class="fa fa-trash fa-fw fa-lg"></i></span>Hapus</button>
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-sm btn-success btnBelanja btn-labeled" data-dismiss="modal">
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

<div id="cariKegiatanRenstra" class="modal fade" role="dialog" tabindex="-1" data-focus-on="input:first" data-backdrop="static">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
           <div class="form-group">
             <div class="col-sm-12">
                <table id='tblCariKegiatanRenstra' class="table display table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                          <tr>
                            <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
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
          <h4 class="modal-title">>Daftar Kegiatan sesuai Permendagri 13 dan perubahnnya</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
           <div class="form-group">
             <div class="col-sm-12">
                <table id='tblCariKegiatanRef' class="table display compact table-striped table-bordered" cellspacing="0" width="100%">
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
                        <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
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
          <h4 class="modal-title">Daftar Program sesuai Permendagri 13 dan perubahnnya</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
           <div class="form-group">
             <div class="col-sm-12">
                <table id='tblCariProgramRef' class="table compact display table-striped table-bordered" cellspacing="0" width="100%">
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
                        <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="fa fa-sign-out fa-fw fa-lg"></i></span>Tutup</button>
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
          <h4>Daftar Sub Unit</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
           <div class="form-group">
             <div class="col-sm-12">
                <table id='tblCariSubUnit' class="table display compact table-striped table-bordered" cellspacing="0" width="100%">
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
        </div>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusKeg">
                    </div>
                    <div class="col-sm-10 text-right">
                        <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="fa fa-sign-out fa-fw fa-lg"></i></span>Tutup</button>
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
          <h4>Daftar Aktivitas dalam ASB</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
           <div class="form-group">
             <div class="col-sm-12">
                <table id='tblCariAktivitasASB' class="table display compact table-striped table-bordered" cellspacing="0" width="100%">
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
        </div>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusKeg">
                    </div>
                    <div class="col-sm-10 text-right">
                        <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="fa fa-sign-out fa-fw fa-lg"></i></span>Tutup</button>
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
          <h4>Daftar Referensi Lokasi</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
          <div class="form-group">
             <div class="col-sm-12">
             <div class='tabs-x tabs-above tab-bordered tabs-krajee'>
                    <ul class="nav nav-tabs nav-justified" role="tablist">
                      <li class="active"><a href="#wilayah" aria-controls="wilayah" role="tab" data-toggle="tab">Lokasi Kewilayahan</a></li>
                      {{-- <li><a href="#teknis" aria-controls="teknis" role="tab-kv" data-toggle="tab">Lokasi Teknis</a></li> --}}
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
                        <table id='tblLokasiWilayah' class="table display compact table-striped table-bordered" cellspacing="0" width="100%">
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
                        <div role="tabpanel" class="tab-pane fade in" id="luardaerah">
                        <br>
                        <table id='tblLokasiLuar' class="table display compact table-striped table-bordered" cellspacing="0" width="100%">
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
        </div>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusKeg">
                    </div>
                    <div class="col-sm-10 text-right">
                        <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="fa fa-sign-out fa-fw fa-lg"></i></span>Tutup</button>
                    </div>
                </div>
              </div>  
        </div>
      </div>
    </div>

<div id="cariLokasiTeknisModal" class="modal fade" role="dialog" data-backdrop="static" tabindex="-1" data-focus-on="input:first">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          <h4>Daftar Referensi Lokasi Teknis</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
          <div class="form-group">
             <div class="col-sm-12">             
              <table id='tblLokasiTeknis' class="table display compact table-striped table-bordered" cellspacing="0" width="100%">
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
            </div>
          </form>
        </div>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left">
                    </div>
                    <div class="col-sm-10 text-right">
                        <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="fa fa-sign-out fa-fw fa-lg"></i></span>Tutup</button>
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
        <h4>Daftar Rekening</h4>
    </div>
    <div class="modal-body">
      <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
        <div class="form-group">
          <div class="col-sm-12">
            <table id='tblRekening' class="table display compact table-striped table-bordered" cellspacing="0" width="100%">
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
    </div>
      <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusKeg">
                    </div>
                    <div class="col-sm-10 text-right">
                        <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="fa fa-sign-out fa-fw fa-lg"></i></span>Tutup</button>
                    </div>
                </div>
              </div> 
      </div>
    </div>
    </div>

<div id="cariMusren" class="modal fade" tabindex="-1" data-backdrop="static" data-focus-on="input:first">
  <div class="modal-dialog modal-lg"  >
    <div class="modal-content">
    <div class="modal-header">
        <h4>Daftar Usulan Musrenbang</h4>
    </div>
    <div class="modal-body">
      <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
        <div class='tabs-x tabs-above tab-bordered tabs-krajee'>
                    <ul class="nav nav-tabs nav-justified" role="tablist">
                      <li class="active"><a href="#musrencam" aria-controls="musrencam" role="tab" data-toggle="tab">Musrenbang Kecamatan</a></li>
                      <li><a href="#musrendes" aria-controls="musrendes" role="tab-kv" data-toggle="tab">Musrenbang kelurahan/Desa</a></li>
                    </ul>                    
                    <div class="tab-content">
                      <div role="tabpanel" class="tab-pane fade in active" id="musrencam">
                          <table id='tblMusrencam' class="table display compact table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                              <tr>
                                <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                                <th style="text-align: center; vertical-align:middle">Uraian Usulan</th>
                                <th width="15%" style="text-align: center; vertical-align:middle">Volume Usulan</th>
                                <th width="5%" style="text-align: center; vertical-align:middle">Status</th>
                              </tr>
                            </thead>
                            <tbody>
                            </tbody>
                          </table>
                      </div>
                      <div role="tabpanel" class="tab-pane fade in" id="musrendes">
                        <table id='tblMusrendes' class="table display compact table-striped table-bordered" cellspacing="0" width="100%">
                          <thead>
                            <tr>
                              <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                              <th style="text-align: center; vertical-align:middle">Uraian Usulan</th>
                              <th width="15%" style="text-align: center; vertical-align:middle">Volume Usulan</th>
                              <th width="5%" style="text-align: center; vertical-align:middle">Status</th>
                            </tr>
                          </thead>
                          <tbody>
                          </tbody>
                        </table>
                      </div>
                    </div>
        </div>
      </form>
    </div>
      <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left">
                    </div>
                    <div class="col-sm-10 text-right">
                        <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="fa fa-sign-out fa-fw fa-lg"></i></span>Tutup</button>
                    </div>
                </div>
              </div> 
      </div>
    </div>
    </div>

<div id="cariPokir" class="modal fade" tabindex="-1" data-backdrop="static" data-focus-on="input:first">
  <div class="modal-dialog modal-lg"  >
    <div class="modal-content">
    <div class="modal-header">
        <h4>Daftar Usulan dalam Pokok - Pokok Pikiran Dewan</h4>
    </div>
    <div class="modal-body">
      <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
        <div class="form-group">
          <div class="col-sm-12">
            <table id='tblPokir' class="table display compact table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                  <th style="text-align: center; vertical-align:middle">Uraian Pokir</th>
                  <th width="15%" style="text-align: center; vertical-align:middle">Volume Usulan</th>
                  <th width="15%" style="text-align: center; vertical-align:middle">Pengusul</th>
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
                        <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="fa fa-sign-out fa-fw fa-lg"></i></span>Tutup</button>
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
      <table id='tblItemSSH' class="table display compact table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
                <tr>
                  <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                  <th width="20%" style="text-align: center; vertical-align:middle">Sub Sub Kelompok</th>
                  <th style="text-align: center; vertical-align:middle">Uraian Item SSH</th>
                  <th width="15%" style="text-align: center; vertical-align:middle">Satuan Item</th>
                  <th width="10%" style="text-align: right; vertical-align:middle">Harga Satuan</th>
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
                        <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="fa fa-sign-out fa-fw fa-lg"></i></span>Tutup</button>
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

 <div id="ModalCopyBelanja" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"> Copy Data Belanja dari Lokasi Lain</h4>
        </div>
      <div class="modal-body">
          <form name="frmModalCopyBelanja" class="form-horizontal" role="form" autocomplete='off' action="" method="" >
              <div class="form-group">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="col-sm-12">
                <table id='tblCopyBelanja' class="table display compact table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                          <tr>
                            <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                            <th style="text-align: center; vertical-align:middle">Nama Aktivitas</th>
                            {{-- <th style="text-align: center; vertical-align:middle">Uraian Lokasi Pelaksanaan</th> --}}
                            <th width="15%" style="text-align: center; vertical-align:middle">Aksi</th>
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
                    <div class="col-sm-2 text-left"></div>
                    <div class="col-sm-10 text-right">
                        <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
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
              <input type="hidden" class="form-control number" id="status_musren_belanja" name="status_musren_belanja" style="text-align: right;" disabled>
              <div class="form-group">
                    <label class="control-label col-sm-3" for="title">Aktivitas ASB :</label>
                    <input type="hidden" class="form-control" id="id_aktivitas_asb_load" name="id_aktivitas_asb_load" disabled="">
                    <div class="col-sm-8">
                      <textarea type="name" class="form-control" id="uraian_aktivitas_asb_load" name="uraian_aktivitas_asb_load" rows="3" disabled=""></textarea>
                    </div>
                </div>
              <div class="form-group hidden"> 
                  <label for="sumber_aktivitas" class="col-sm-3 control-label" align='left'>Jenis Biaya :</label>
                  <div class="col-sm-6">
                    <div>
                      <label>
                        <input type="radio" class="jns_biaya_asb" name="jns_biaya_asb" id="jns_biaya_asb" value="0"> Biaya Tetap (Fix) 
                      </label>
                    </div>
                    <div>
                      <label>
                        <input type="radio" class="jns_biaya_asb" name="jns_biaya_asb" id="jns_biaya_asb" value="1"> Tanpa Biaya Tetap (Non Fix)
                      </label>
                    </div>
                    <div>
                      <label>
                        <input type="radio" class="jns_biaya_asb" name="jns_biaya_asb" id="jns_biaya_asb" value="2"> Semua Biaya
                      </label>
                    </div>
                    <div>
                      <label>
                        <input type="radio" class="jns_biaya_asb" name="jns_biaya_asb" id="jns_biaya_asb" value="3"> Semua Biaya (Biaya Tetap Terdistibusi)
                      </label>
                    </div>
                  </div>
                </div>
              <div class="form-group hidden">
                    <label class="control-label col-sm-3" for="">Zona Wilayah SSH :</label>
                    <div class="col-sm-8">
                        <select type="text" class="form-control zona_ssh_load" id="zona_ssh_load" name="zona_ssh_load"></select>
                    </div>
                </div> 
              <div class="form-group">
                <label class="control-label col-sm-3" for="id_perkada">Volume Pemicu Biaya 1 :</label>
                <div class="col-sm-4">
                  <div class="input-group">
                      <input type="text" class="form-control number" id="v1_load" name="v1_load" style="text-align: right;" disabled>
                      <span class="input-group-addon" id="satuan1_load_asb"></span>
                  </div>
                </div>
                </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="id_perkada">Volume Pemicu Biaya 2 :</label>
                <div class="col-sm-4">
                  <div class="input-group">
                      <input type="text" class="form-control number" id="v2_load" name="v2_load" style="text-align: right;" disabled>
                      <span class="input-group-addon" id="satuan2_load_asb"></span>
                  </div>
                </div>
              </div>
        </form>
      </div>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusBelanja">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-success btnLoadAsb btn-labeled" data-dismiss="modal" >
                            <span class="btn-label"><i id="fooLoadAsb" class="fa fa-calculator fa-fw fa-lg"></i></span>Proses Load Belanja</button>
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


var template = Handlebars.compile($("#details-template").html());
var usulan = Handlebars.compile($("#details-usulan").html());

var tahun_temp,unit_temp,sub_unit_temp,ProgRkpd_temp,bidang_temp,jenis_belanja_temp;
var id_progref_temp,id_progrenja_temp,id_kegrenja_temp,id_aktivitas_temp,id_pelaksana_temp,id_lokasi_temp;
var id_asb_temp, ur_asb_temp, id_program_renstra_temp, id_satuan_1_aktiv_temp,id_satuan_2_aktiv_temp,vol1_temp,
vol2_temp,nm_sat_asb1,nm_sat_asb2;

$('[data-toggle="popover"]').popover();

$('.number').number(true,2,',', '.');
$('.nomor').number(true,0,',', '.');


// $('#btnTambahProgRenja').hide();
// $('#btnTambahKegiatan').hide();
// $('#btnTambahAktivitas').hide();
// $('#btnTambahPelaksana').hide();
// $('#btnTambahLokasi').hide();
// $('#divAddSSH').hide();
// $('#divImportASB').hide();

// $('#divTambahProg').hide();
// $('#divTambahKegiatan').hide();
// $('#divTambahAktivitas').hide();
// $('#divTambahPelaksana').hide();
// $('#divTambahLokasi').hide();
// $('#divImportASB').hide();
// $('#divAddSSH').hide();
// $('#divImportASB').hide();

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

$(".disabled").click(function (e) {
        e.preventDefault();
        return false;
});

function back2Rkpd(){
  
    $('#divTambahProg').hide();
    $('#divTambahKegiatan').hide();
    $('#divTambahAktivitas').hide();
    $('#divTambahPelaksana').hide();
    $('#divTambahLokasi').hide();
    $('#divImportASB').hide();
    $('#divAddSSH').hide();
    $('#divImportASB').hide();

  $('.nav-tabs a[href="#programrkpd"]').tab('show');
}

$(document).on('click', '.backProgRkpd', function() {
  back2Rkpd();
});

function back2renja(){
  
    $('#divTambahProg').show();
    $('#divTambahKegiatan').hide();
    $('#divTambahAktivitas').hide();
    $('#divTambahPelaksana').hide();
    $('#divTambahLokasi').hide();
    $('#divImportASB').hide();
    $('#divAddSSH').hide();
    $('#divImportASB').hide();

  $('.nav-tabs a[href="#program"]').tab('show');
  // loadTblProgRenja(tahun_temp,unit_temp);
}

$(document).on('click', '.backRenja', function() {
  back2renja();
});

function back2kegiatan(){
  // if(status_program_renja_temp==0){
    $('#divTambahProg').hide();
    $('#divTambahKegiatan').show();
    $('#divTambahAktivitas').hide();
    $('#divTambahPelaksana').hide();
    $('#divTambahLokasi').hide();
    $('#divImportASB').hide();
    $('#divAddSSH').hide();
    $('#divImportASB').hide();
  // }
  $('.nav-tabs a[href="#kegiatan"]').tab('show');
  // loadTblKegiatanRenja(id_renja_program_temp);
}

$(document).on('click', '.backKegiatan', function() {
  back2kegiatan();
});

function back2pelaksana(){
  // if(status_kegiatan_renja_temp==0){
    $('#divTambahProg').hide();
    $('#divTambahKegiatan').hide();
    $('#divTambahAktivitas').hide();
    $('#divTambahPelaksana').show();
    $('#divTambahLokasi').hide();
    $('#divImportASB').hide();
    $('#divAddSSH').hide();
    $('#divImportASB').hide();
  // }
  $('.nav-tabs a[href="#pelaksana"]').tab('show');
  // loadTblPelaksana(id_renja_temp);
}

$(document).on('click', '.backPelaksana', function() {
  back2pelaksana();
});

function back2aktivitas(){
  // if(status_pelaksana_renja_temp==0){
    $('#divTambahProg').hide();
    $('#divTambahKegiatan').hide();
    $('#divTambahAktivitas').show();
    $('#divTambahPelaksana').hide();
    $('#divTambahLokasi').hide();
    $('#divImportASB').hide();
    $('#divAddSSH').hide();
    $('#divImportASB').hide();
  // }
  $('.nav-tabs a[href="#aktivitas"]').tab('show');
  // loadTblAktivitas(id_pelaksana_temp);
}
$(document).on('click', '.backAktivitas', function() {
  back2aktivitas();
});

function back2lokasi(){
  $('#divTambahAktivitas').hide();
  $('#divTambahPelaksana').hide();
  $('#divTambahLokasi').show();
  $('#divImportASB').hide();
  $('#divAddSSH').hide();
  $('#divImportASB').hide();

  $('.nav-tabs a[href="#lokasi"]').tab('show');
  // loadTblLokasi(id_aktivitas_temp);
}

$(document).on('click', '.backLokasi', function() {
  back2lokasi();
});


$.ajax({
    type: "GET",
    url: './forumskpd/forum/getUnitRenja',
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
          url: './admin/parameter/getSumberDana',
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
          url: './admin/parameter/getZonaSSH',
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
          url: './admin/parameter/getRefSatuan',
          dataType: "json",
          success: function(data) {

          var j = data.length;
          var post, i;

          $('select[name="id_satuan_1"]').empty();
          $('select[name="id_satuan_1"]').append('<option value="-1">---Pilih Satuan---</option>');
          $('select[name="id_satuan_1"]').append('<option value="0">-- N/A --</option>');

          $('select[name="id_satuan_2"]').empty();
          $('select[name="id_satuan_2"]').append('<option value="-1">---Pilih Satuan---</option>');
          $('select[name="id_satuan_2"]').append('<option value="0">-- N/A --</option>');

          $('select[name="id_satuan_1_aktivitas"]').empty();
          $('select[name="id_satuan_1_aktivitas"]').append('<option value="-1">---Pilih Satuan---</option>');
          $('select[name="id_satuan_1_aktivitas"]').append('<option value="0">-- N/A --</option>');

          $('select[name="id_satuan_2_aktivitas"]').empty();
          $('select[name="id_satuan_2_aktivitas"]').append('<option value="-1">---Pilih Satuan---</option>');
          $('select[name="id_satuan_2_aktivitas"]').append('<option value="0">-- N/A --</option>');

          $('select[name="id_satuan1_forum"]').empty();
          $('select[name="id_satuan1_forum"]').append('<option value="-1">---Pilih Satuan---</option>');
          $('select[name="id_satuan1_forum"]').append('<option value="0">-- N/A --</option>');

          $('select[name="id_satuan2_forum"]').empty();
          $('select[name="id_satuan2_forum"]').append('<option value="-1">---Pilih Satuan---</option>');
          $('select[name="id_satuan2_forum"]').append('<option value="0">-- N/A --</option>');

          $('select[name="id_satuan1"]').empty();
          $('select[name="id_satuan1"]').append('<option value="-1">---Pilih Satuan---</option>');
          $('select[name="id_satuan1"]').append('<option value="0">-- N/A --</option>');

          $('select[name="id_satuan2"]').empty();
          $('select[name="id_satuan2"]').append('<option value="-1">---Pilih Satuan---</option>');
          $('select[name="id_satuan2"]').append('<option value="0">-- N/A --</option>');

          for (i = 0; i < j; i++) {
              post = data[i];
              $('select[name="id_satuan_1"]').append('<option value="'+ post.id_satuan +'">'+ post.uraian_satuan +'</option>');
              $('select[name="id_satuan_2"]').append('<option value="'+ post.id_satuan +'">'+ post.uraian_satuan +'</option>');
              $('select[name="id_satuan_1_aktivitas"]').append('<option value="'+ post.id_satuan +'">'+ post.uraian_satuan +'</option>');
              $('select[name="id_satuan_2_aktivitas"]').append('<option value="'+ post.id_satuan +'">'+ post.uraian_satuan +'</option>');
              $('select[name="id_satuan1_forum"]').append('<option value="'+ post.id_satuan +'">'+ post.uraian_satuan +'</option>');
              $('select[name="id_satuan2_forum"]').append('<option value="'+ post.id_satuan +'">'+ post.uraian_satuan +'</option>');
              $('select[name="id_satuan1"]').append('<option value="'+ post.id_satuan +'">'+ post.uraian_satuan +'</option>');
              $('select[name="id_satuan2"]').append('<option value="'+ post.id_satuan +'">'+ post.uraian_satuan +'</option>');
            }
              
          }
      });

  var rekening = $('#tblRekening').DataTable( {
        processing: true,
        serverSide: true,
        dom: 'BfrtIp',
        autoWidth : false,
        "ajax": {"url": "./renja/blang/getRekening/0/0"},
        "columns": [
              { data: 'no_urut'},
              { data: 'kd_rekening'},
              { data: 'nm_rekening'}
            ],
        "order": [[0, 'asc']],
        "bDestroy": true
  });

var cariProgramRen;
$(document).on('click', '.btnCariProgramRenstra', function() {    
    $('#judulModal').text('Daftar Program Renstra pada ' + $('#id_unit option:selected').text());
    $('#cariProgramRenstra').modal('show');

    cariProgramRen = $('#tblCariProgramRenstra').DataTable( {
        processing: true,
        serverSide: true,
        dom: 'bfrtIp',
        autoWidth : false,
        "ajax": {"url": "./ranwalrenja/sesuai/getProgRenstra/"+unit_temp},
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

    document.getElementById("id_program_renstra").value = data.id_program_renstra;
    document.getElementById("uraian_program_renstra").value = data.uraian_program_renstra;

    $('#cariProgramRenstra').modal('hide');  
  } );

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
          autoWidth : false,
          "ajax": {"url": "./ranwalrenja/sesuai/getKegRenstra/"+unit_temp+"/"+id_program_renstra_temp},
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


var itemSSH
$(document).on('click', '#btnparam_cari', function() {
  param=$('#param_cari').val();
  itemSSH = $('#tblItemSSH').DataTable( {
        // retrieve: true,
        processing: true,
        serverSide: true,
        dom: 'BfrtIp',
        "autoWidth": false,
        "ajax": {"url": "./renja/blang/getItemSSH/"+zona_temp+"/"+ param.toLowerCase()},
        "columns": [
              { data: 'no_urut', sClass: "dt-center",width:"10px"},
              { data: 'uraian_sub_kelompok_ssh'},
              { data: 'uraian_tarif_ssh'},
              { data: 'uraian_satuan', sClass: "dt-center",width:"100px"},
              { data: 'jml_rupiah', sClass: "dt-right",
                  render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
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

    document.getElementById("id_satuan1_forum").value = data.id_satuan;
    // document.getElementById("satuan1").innerHTML = data.uraian_satuan;
    $('#harga_satuan_forum').val(data.jml_rupiah);
    $('#jumlah_belanja_forum').val(hitungsatuan());

    // alert(data.id_tarif_ssh);

    $('#cariItemSSH').modal('hide');    

  } );

var zona_tmp;
$(document).on('click', '.btnCariSSH', function() {

      zona_temp=$('#zona_ssh').val();

      $('#cariItemSSH').modal('show');
      // $('#tblItemSSH').DataTable().ajax.url("./renja/blang/getItemSSH/"+$('#zona_ssh').val()).load();

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
      $('#tblRekening').DataTable().ajax.url("./renja/blang/getRekening/"+ x +"/"+$('#id_item_ssh').val()).load();

  });

var cariLokasiDesa
var cariLokasiTeknis
var cariLokasiLuar

$.ajax({
    type: "GET",
    url: './admin/parameter/getKecamatan',
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
        autoWidth : false,
        "ajax": {"url": "./renja/blang/getLokasiDesa/"+$('#kecamatan').val()},
        "columns": [
              { data: 'no_urut', sClass: "dt-center"},
              { data: 'nama_lokasi'}
            ],
        "order": [[0, 'asc']],
        "bDestroy": true
    }); 

});

$(document).on('click', '#btnCariLokasi', function() {
  
  cariLokasiDesa = $('#tblLokasiWilayah').DataTable( {
        processing: true,
        serverSide: true,
        dom: 'bfrtIp',
        autoWidth : false,
        "ajax": {"url": "./renja/blang/getLokasiDesa/0"},
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
        autoWidth : false,
        "ajax": {"url": "./renja/blang/getLokasiLuarDaerah"},
        "columns": [
              { data: 'no_urut', sClass: "dt-center"},
              { data: 'nama_lokasi'}
            ],
        "order": [[0, 'asc']],
        "bDestroy": true
    });

  $('#cariLokasiModal').modal('show');
});

$(document).on('click', '#btnCariLokasiTeknis', function() {
  
   cariLokasiTeknis = $('#tblLokasiTeknis').DataTable( {
        processing: true,
        serverSide: true,
        dom: 'bfrtIp',
        autoWidth : false,
        "ajax": {"url": "./renja/blang/getLokasiTeknis"},
        "columns": [
              { data: 'no_urut', sClass: "dt-center"},
              { data: 'nama_lokasi'}
            ],
        "order": [[0, 'asc']],
        "bDestroy": true
    });
  $('#cariLokasiTeknisModal').modal('show');

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

    document.getElementById("id_lokasi_teknis").value = data.id_lokasi;
    document.getElementById("nm_lokasi_teknis").value = data.nama_lokasi;

    document.getElementById("id_lokasi_pelaksana").value = data.id_lokasi;
    document.getElementById("nm_lokasi_pelaksana").value = data.nama_lokasi;

    $('#cariLokasiTeknisModal').modal('hide');    

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

var CariSubUnit
$(document).on('click', '#btnCariSubUnit', function() {
  $('#CariSubUnit').modal('show'); 

  CariSubUnit = $('#tblCariSubUnit').DataTable( {
        processing: true,
        serverSide: true,
        dom: 'bfrtIp',
        autoWidth : false,
        "ajax": {"url": "./renja/blang/getSubUnit/"+unit_temp},
        "columns": [
              { data: 'no_urut', sClass: "dt-center"},
              { data: 'nm_sub'}
            ],
        "order": [[0, 'asc']],
        "bDestroy": true
    });
});

$('#tblCariSubUnit').on( 'dblclick', 'tr', function () {
    var data = CariSubUnit.row(this).data();

    $('#subunit_pelaksana').val(data.nm_sub);
    $('#id_subunit_pelaksana').val(data.id_sub_unit);

    $('#CariSubUnit').modal('hide');    

  });

var cariAktivitasASB
$(document).on('click', '.btnCariASB', function() {
  $('#cariAktivitasASB').modal('show'); 

  cariAktivitasASB = $('#tblCariAktivitasASB').DataTable( {
        processing: true,
        serverSide: true,
        dom: 'bfrtIp',
        autoWidth : false,
        "ajax": {"url": "./admin/parameter/getAktivitasASB/"+tahun_temp},
        "columns": [
              { data: 'no_urut', sClass: "dt-center"},
              { data: 'nm_aktivitas_asb'}
            ],
        "order": [[0, 'asc']],
        "bDestroy": true
    });
});

$('#tblCariAktivitasASB').on( 'dblclick', 'tr', function () {
    var data = cariAktivitasASB.row(this).data();

    $('#id_aktivitas_asb').val(data.id_aktivitas_asb);
    $('#ur_aktivitas_kegiatan').val(data.nm_aktivitas_asb);

    LoadSatuanPublik(data.id_aktivitas_asb);
    $('#id_satuan_publik').removeAttr("disabled");
    $('#cariAktivitasASB').modal('hide');    

  });

var cariProgramRef;
$(document).on('click', '.btnCariProgRef', function() {  
  $('#cariProgramRef').modal('show');
  cariProgramRef = $('#tblCariProgramRef').DataTable({
        processing: true,
        serverSide: true,
        dom: 'BfRtIp',
        autoWidth : false,
        "ajax": {"url": "./renja/sesuai/getProgRef/"+bidang_temp},
        "columns": [
              { data: 'no_urut', sClass: "dt-center"},
              { data: 'kd_program', sClass: "dt-center"},
              { data: 'uraian_program'}
            ],
        "order": [[0, 'asc']],
        "bDestroy": true
    });
  });

$('#tblCariProgramRef tbody').on( 'dblclick', 'tr', function () {
    var data = cariProgramRef.row(this).data();

    $('#ur_program_ref').val(data.kd_program +" - "+data.uraian_program);
    $('#id_program_ref').val(data.id_program);
    $('#ur_program_renja').val(data.uraian_program);

    $('#cariProgramRef').modal('hide');
  });

var cariKegiatanRef
$(document).on('click', '.btnCariKegiatanRef', function() {
  $('#cariKegiatanRef').modal('show'); 

  cariKegiatanRef = $('#tblCariKegiatanRef').DataTable( {
        processing: true,
        serverSide: true,
        dom: 'bfrtIp',
        autoWidth : false,
        "ajax": {"url": "./renja/sesuai/getKegRef/"+id_progref_temp},
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

    $('#ur_kegiatan_forum').val(data.nm_kegiatan);
    $('#ur_kegiatan_ref').val(data.kd_kegiatan +' - '+data.nm_kegiatan);
    $('#id_kegiatan_ref').val(data.id_kegiatan);
    
    $('#cariKegiatanRef').modal('hide');    

  });


var prog_rkpd_tbl, tblChildBidang;
$('#tblProgramRKPD').DataTable({
  dom : 'BfRtip',
  autoWidth : false,
  bDestroy: true
});

function loadTblProgRkpd(tahun,unit){
  prog_rkpd_tbl = $('#tblProgramRKPD').DataTable({
                  processing: true,
                  serverSide: true,
                  dom : 'BfRtip',
                  "autoWidth": false,
                  "ajax": {"url": "./forumskpd/forum/getProgramRkpd/"+tahun+"/"+unit},
                  "columns": [
                        {
                            "className":      'details-control',
                            "orderable":      false,
                            "searchable":      false,
                            "data":           null,
                            "defaultContent": '',
                            "width" : "5px"
                        },
                        { data: 'no_urut', sClass: "dt-center",width:"5px"},
                        { data: 'uraian_program_rpjmd'},
                        { data: 'jml_program', sClass: "dt-center",width:"15px",
                            render: $.fn.dataTable.render.number( '.', ',', 0, '' )},
                        { data: 'jml_kegiatan', sClass: "dt-center",width:"15px",
                            render: $.fn.dataTable.render.number( '.', ',', 0, '' )},
                        { data: 'jml_pagu', sClass: "dt-center",width:"50px",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        // { data: 'jml_musren', sClass: "dt-center",width:"50px",
                        //     render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'jml_aktivitas', sClass: "dt-center",width:"15px",
                            render: $.fn.dataTable.render.number( '.', ',', 0, '' )},
                        { data: 'icon','searchable': false, 'orderable':false, sClass: "dt-center",width:"15px",
                            render: function(data, type, row,meta) {
                            return '<i class="'+row.status_icon+'" style="font-size:16px;color:'+row.warna+';"/>';
                          }},
                        { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center",width:"50px" }
                        // {data:null, defaultContent:"<button class='btnEditProgRKPD btn btn-sm' type='button' ><i class='fa fa-pencil'></i> Edit Data Program</button>"}
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
    });
}

function initTableBidang(tableId, data) {
    tblChildBidang=$('#' + tableId).DataTable({
            processing: true,
            serverSide: true,
            ajax: data.details_url,
            dom : 'BFRtIP',
            autoWidth: false,
            columns: [
                { data: 'kd_bidang', name: 'kd_bidang', sClass: "dt-center", width:'15%' },
                { data: 'nm_bidang', name: 'nm_bidang' },
                { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center",width:"50px" }
            ],
            "order": [[0, 'asc']],
            "bDestroy": true
        })

    $('#' + tableId+'  tbody').on( 'click', 'tr', function () {

        var data = tblChildBidang.row(this).data();

        tahun_temp = data.tahun_forum;
        unit_temp = data.id_unit;
        ProgRkpd_temp = data.id_forum_rkpdprog;
        bidang_temp = data.id_bidang;
        jenis_belanja_temp = data.jenis_belanja;

        $('#nm_program_progrenja').text(data.uraian_program_rpjmd);
        $('#btnTambahProgRenja').show();

        $('.nav-tabs a[href="#program"]').tab('show');
        loadTblProgRenja(tahun_temp,unit_temp,ProgRkpd_temp);

    });

}

$('#tblProgramRKPD tbody').on('click', 'td.details-control', function () {

        var tr = $(this).closest('tr');
        var row = prog_rkpd_tbl.row( tr );
        var tableId = 'bidang-' + row.data().id_unit+row.data().id_rkpd_ranwal;

        if (row.child.isShown()) {
            row.child.hide();
            tr.removeClass('shown');
        } else {
            row.child(template(row.data())).show();
            initTableBidang(tableId, row.data());
            tr.addClass('shown');
            tr.next().find('td').addClass('no-padding bg-gray');
        }    
  });

$(document).on('click', '.btnViewProgSkpd', function() {

  var data = tblChildBidang.row( $(this).parents('tr') ).data();

  tahun_temp = data.tahun_forum;
  unit_temp = data.id_unit;
  ProgRkpd_temp = data.id_forum_rkpdprog;
  bidang_temp = data.id_bidang;
  jenis_belanja_temp = data.jenis_belanja;

  $('#nm_program_progrenja').text(data.uraian_program_rpjmd);
  $('#btnTambahProgRenja').show();

  $('.nav-tabs a[href="#program"]').tab('show');
  loadTblProgRenja(tahun_temp,unit_temp,ProgRkpd_temp);
  back2renja();
});


var prog_renja_tbl;
$('#tblProgram').DataTable({
  dom : 'BfRtip',
  autoWidth : false,
  bDestroy: true
});

function loadTblProgRenja(tahun,unit,id_forum){
   prog_renja_tbl=$('#tblProgram').DataTable({
                  processing: true,
                  serverSide: true,
                  dom : 'BfRtip',
                  autoWidth : false,
                  "ajax": {"url": "./forumskpd/forum/getProgramRenja/"+tahun+"/"+unit+"/"+id_forum},
                  "language": {
                      "decimal": ",",
                      "thousands": "."},
                  "columns": [
                        { data: 'urut', sClass: "dt-center", width:"5px"},
                        { data: 'uraian_program_renstra'},
                        { data: 'pagu_tahun_renstra', sClass: "dt-right",
                          render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'jml_kegiatan', sClass: "dt-center"},
                        { data: 'jml_0k', sClass: "dt-center"},
                        { data: 'jml_pagu', sClass: "dt-right",
                          render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'icon','searchable': false, 'orderable':false, sClass: "dt-center",width:"5px",
                            render: function(data, type, row,meta) {
                            return '<i class="'+row.status_icon+'" style="font-size:16px;color:'+row.warna+';"/>';
                          }},
                        { data: 'action', 'searchable': false, 'orderable':false }
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        });
}

var keg_renja_tbl;
$('#tblKegiatanRenja').DataTable({
  dom : 'BfRtip',
  autoWidth : false,
  bDestroy: true
});
function loadTblKegiatanRenja(id_program){

    keg_renja_tbl=$('#tblKegiatanRenja').DataTable({
                  processing: true,
                  serverSide: true,
                  dom : 'BfRtip',
                  autoWidth : false,
                  "ajax": {"url": "./forumskpd/forum/getKegiatanRenja/"+id_program},
                  "language": {
                      "decimal": ",",
                      "thousands": "."},
                  "columns": [
                        { data: 'urut', sClass: "dt-center", width:"5px"},
                        { data: 'uraian_kegiatan_forum'},
                        { data: 'pagu_tahun_kegiatan', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'pagu_forum', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'jml_aktivitas', sClass: "dt-center"},
                        { data: 'jml_pagu_aktivitas', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        // { data: 'jml_musren_aktivitas', sClass: "dt-right",
                        //     render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'icon','searchable': false, 'orderable':false, sClass: "dt-center", width:"5px",
                            render: function(data, type, row,meta) {
                            return '<i class="'+row.status_icon+'" style="font-size:16px;color:'+row.warna+';"/>';
                          }},
                        { data: 'action', 'searchable': false, 'orderable':false }
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        });
}

var aktivitas_tbl;
$('#tblAktivitas').DataTable({
  dom : 'BfRtip',
  autoWidth : false,
  bDestroy: true
});

function loadTblAktivitas(id_forum){
    aktivitas_tbl=$('#tblAktivitas').DataTable({
                  processing: true,
                  serverSide: true,
                  dom : 'BfRtip',                  
                  autoWidth : false,
                  "ajax": {"url": "./forumskpd/forum/getAktivitas/"+id_forum},
                  "language": {
                      "decimal": ",",
                      "thousands": "."},
                  "columns": [
                        { data: 'no_urut', sClass: "dt-center", width :"5px"},
                        { data: 'uraian','searchable': false, 'orderable':false, sClass: "dt-left",
                            render: function(data, type, row,meta) {
                            return row.uraian_aktivitas_kegiatan + '  <i class="'+row.img+' fa-lg text-primary"/>';
                          }},
                        { data: 'pagu_aktivitas_forum', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        // { data: 'jml_vol_1', sClass: "dt-center",
                        //     render: function(data, type, row,meta) {
                        //     return row.pagu_musren+'%';}},
                        { data: 'jml_belanja', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'jml_vol_1', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'jml_vol_2', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'icon','searchable': false, 'orderable':false, sClass: "dt-center", width :"5px",
                            render: function(data, type, row,meta) {
                            return '<i class="'+row.status_icon+'" style="color:'+row.warna+';"/>';
                          }},
                        { data: 'action', 'searchable': false, width :"20px", 'orderable':false }
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        });
}

var pelaksana_tbl;
$('#tblPelaksana').DataTable({
  dom : 'BfRtip',
  autoWidth : false,
  bDestroy: true
});

function loadTblPelaksana(id_aktivitas){
    pelaksana_tbl=$('#tblPelaksana').DataTable({
                  processing: true,
                  serverSide: true,
                  dom : 'BfRtip',
                  autoWidth : false,
                  "ajax": {"url": "./forumskpd/forum/getPelaksanaAktivitas/"+id_aktivitas},
                  "language": {
                      "decimal": ",",
                      "thousands": "."},
                  "columns": [
                        { data: 'no_urut', sClass: "dt-center"},
                        { data: 'nm_sub'},
                        { data: 'nama_lokasi'},
                        { data: 'jml_pagu_aktivitas', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'jml_pagu', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'jml_lokasi', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        // { data: 'icon','searchable': false, 'orderable':false, sClass: "dt-center",
                        //     render: function(data, type, row,meta) {
                        //     return '<i class="'+row.status_icon+'" style="font-size:16px;color:'+row.warna+';"/>';
                        //   }},
                        { data: 'action', 'searchable': false, 'orderable':false }
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        });
}

var lokasi_tbl;
$('#tblLokasi').DataTable({
  dom : 'BfRtip',
  autoWidth : false,
  bDestroy: true
});

function loadTblLokasi(id_pelaksana){
    lokasi_tbl=$('#tblLokasi').DataTable({
                  processing: true,
                  serverSide: true,
                  dom : 'BfRtip',
                  deferRender: true,
                  autoWidth : false,
                  "ajax": {"url": "./forumskpd/forum/getLokasiAktivitas/"+id_pelaksana},
                  "language": {
                      "decimal": ",",
                      "thousands": "."},
                  "columns": [
                        // {
                        //     "className":      'details-control',
                        //     "orderable":      false,
                        //     "searchable":      false,
                        //     "data":           null,
                        //     "defaultContent": '',<span class="badge">
                        //     "width" : "5px"
                        // },
                        { data: 'no_urut', sClass: "dt-center"},
                        { data: 'sumber_display', sClass: "dt-center"},
                        { data: 'nama_lokasi'},
                        { data: 'volume_1', sClass: "dt-center",'searchable': false, 'orderable':false,
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'volume_2', sClass: "dt-center",'searchable': false, 'orderable':false,
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        // { data: 'jml_pagu', sClass: "dt-right",'searchable': false, 'orderable':false,
                        //     render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'usulan_display', sClass: "dt-center"},
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

var tblChildUsulan

function initTableUsulan(tableId, data) {
    tblChildUsulan=$('#' + tableId).DataTable({
            processing: true,
            serverSide: true,
            ajax: data.details_url,
            dom : 'BFRtIP',
            autoWidth: false,
            columns: [
                { data: 'no_urut', sClass: "dt-center"},
                { data: 'id_ref_usulan', sClass: "dt-center"},
                { data: 'display_sumber'},
                { data: 'volume_1_usulan', sClass: "dt-right",'searchable': false, 'orderable':false,
                            render: $.fn.dataTable.render.number( '.', ',', 0, '' )},
                { data: 'volume_2_usulan', sClass: "dt-right",'searchable': false, 'orderable':false,
                            render: $.fn.dataTable.render.number( '.', ',', 0, '' )},
                { data: 'volume_1_forum', sClass: "dt-right",'searchable': false, 'orderable':false,
                            render: $.fn.dataTable.render.number( '.', ',', 0, '' )},
                { data: 'volume_2_forum', sClass: "dt-right",'searchable': false, 'orderable':false,
                            render: $.fn.dataTable.render.number( '.', ',', 0, '' )},
                { data: 'icon','searchable': false, 'orderable':false, sClass: "dt-center",
                            render: function(data, type, row,meta) {
                            return '<i class="'+row.status_icon+'" style="font-size:16px;color:'+row.warna+';"/>';
                          }},
                { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center",width:"50px" }
            ],
            "order": [[0, 'asc']],
            "bDestroy": true
        })
}

$('#tblLokasi tbody').on('click', 'td.details-control', function () {

        var tr = $(this).closest('tr');
        var row = lokasi_tbl.row( tr );
        var tableId = 'usulan-' + row.data().id_lokasi_forum+row.data().id_pelaksana_forum;

        if (row.child.isShown()) {
            row.child.hide();
            tr.removeClass('shown');
        } else {
            row.child(usulan(row.data())).show();
            initTableUsulan(tableId, row.data());
            tr.addClass('shown');
            tr.next().find('td').addClass('no-padding bg-gray');
        }
  });

var belanja_renja_tbl;
$('#tblBelanja').DataTable({
  dom : 'BfRtip',
  autoWidth : false,
  bDestroy: true
});

function loadTblBelanja(lokasi){
   belanja_renja_tbl=$('#tblBelanja').DataTable({
                  processing: true,
                  serverSide: true,
                  autoWidth : false,
                  dom : 'BfRtip',
                  "ajax": {"url": "./forumskpd/forum/getBelanja/"+lokasi},
                  "language": {
                      "decimal": ",",
                      "thousands": "."},
                  "columns": [
                        { data: 'no_urut', sClass: "dt-center"},
                        { data: 'uraian_tarif_ssh'},
                        // { data: 'kd_rekening', sClass: "dt-center"},
                        { data: 'volume_1_forum', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'volume_2_forum', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'harga_satuan_forum', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'jml_belanja_forum', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'action', 'searchable': false, 'orderable':false }
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        });
}

$('#tblProgram tbody').on( 'dblclick', 'tr', function () {

    var data = prog_renja_tbl.row(this).data();

    id_progrenja_temp = data.id_forum_program;
    id_progref_temp = data.id_program_ref;
    id_program_renstra_temp = data.id_program_renstra;

    $('#nm_progrkpd_kegrenja').text($('#nm_program_progrenja').text());
    $('#nm_progrenja_kegrenja').text(data.uraian_program_renstra);

    $('.nav-tabs a[href="#kegiatan"]').tab('show');
    $('#btnTambahKegiatan').show();
    
    loadTblKegiatanRenja(id_progrenja_temp);
    back2kegiatan();

});

$(document).on('click', '.view-kegiatan', function() {

    var data = prog_renja_tbl.row( $(this).parents('tr') ).data();

    id_progrenja_temp = data.id_forum_program;
    id_progref_temp = data.id_program_ref;

    $('#nm_progrkpd_kegrenja').text($('#nm_program_progrenja').text());
    $('#nm_progrenja_kegrenja').text(data.uraian_program_renstra);

    $('.nav-tabs a[href="#kegiatan"]').tab('show');
    $('#btnTambahKegiatan').show();
    
    loadTblKegiatanRenja(id_progrenja_temp);
    back2kegiatan();
});

$('#tblKegiatanRenja tbody').on( 'dblclick', 'tr', function () {

  var data = keg_renja_tbl.row(this).data();

    id_kegrenja_temp = data.id_forum_skpd;

    $('#nm_progrkpd_pelaksana').text($('#nm_program_progrenja').text());
    $('#nm_progrenja_pelaksana').text($('#nm_progrenja_kegrenja').text());
    $('#nm_kegrenja_pelaksana').text(data.uraian_kegiatan_forum);

    // $('.nav-tabs a[href="#aktivitas"]').tab('show');
    // $('#btnTambahAktivitas').show();

    $('.nav-tabs a[href="#pelaksana"]').tab('show');
    $('#btnTambahPelaksana').show();
    loadTblPelaksana(id_kegrenja_temp);
    back2pelaksana();

});

$(document).on('click', '#view-aktivitas', function() {

    var data = pelaksana_tbl.row( $(this).parents('tr') ).data();

    sub_unit_temp = data.nm_sub;
    id_pelaksana_temp = data.id_pelaksana_forum;

    $('#nm_progrkpd_aktivitas').text($('#nm_program_progrenja').text());
    $('#nm_progrenja_aktivitas').text($('#nm_progrenja_kegrenja').text());
    $('#nm_kegrenja_aktivitas').text($('#nm_kegrenja_aktivitas').text());
    // $('#nm_aktivitas_lokasi').text($('#nm_aktivitas_pelaksana').text());
    $('#nm_aktivitas_pelaksana').text(data.nm_sub);

    $('.nav-tabs a[href="#aktivitas"]').tab('show');
    $('#btnTambahAktivitas').show();
    loadTblAktivitas(id_pelaksana_temp);
    back2aktivitas();
});

$('#tblAktivitas tbody').on( 'dblclick', 'tr', function () {

  var data = aktivitas_tbl.row(this).data();

    id_aktivitas_temp = data.id_aktivitas_forum;
    id_asb_temp = data.id_aktivitas_asb;
    id_satuan_1_aktiv_temp = data.id_satuan_1; 
    id_satuan_2_aktiv_temp = data.id_satuan_2;
    nm_sat_asb1 = data.ur_satuan_1;
    nm_sat_asb2 = data.ur_satuan_2;
    // sbr_aktivitas=data.sumber_aktivitas;  

    // if(sbr_aktivitas == 0){
    //     if(id_satuan_publik_temp==0){
    //       vol1_temp=data.jml_vol_lok;
    //       vol2_temp=data.volume_2;
    //     } else {          
    //       vol1_temp=data.volume_1;
    //       vol2_temp=data.jml_vol_lok;
    //     }
    // } else {
      vol1_temp=data.jml_vol_1;
      vol2_temp=data.jml_vol_2;
    // }

    $('#nm_progrkpd_lokasi').text($('#nm_program_progrenja').text());
    $('#nm_progrenja_lokasi').text($('#nm_progrenja_kegrenja').text());
    $('#nm_kegrenja_lokasi').text($('#nm_kegrenja_aktivitas').text());
    $('#nm_aktivitas_lokasi').text(data.uraian_aktivitas_kegiatan);
    $('#nm_sub_lokasi').text($('#nm_aktivitas_pelaksana').text());

    $('.nav-tabs a[href="#lokasi"]').tab('show');
    $('#btnTambahLokasi').show();
    loadTblLokasi(id_aktivitas_temp);
    back2lokasi();

});

$(document).on('click', '#btnViewPelaksana', function() {

    var data = keg_renja_tbl.row( $(this).parents('tr') ).data();
    id_kegrenja_temp = data.id_forum_skpd;

    $('#nm_progrkpd_pelaksana').text($('#nm_program_progrenja').text());
    $('#nm_progrenja_pelaksana').text($('#nm_progrenja_kegrenja').text());
    $('#nm_kegrenja_pelaksana').text(data.uraian_kegiatan_forum);
    // $('#nm_aktivitas_pelaksana').text(data.uraian_aktivitas_kegiatan); 


    $('.nav-tabs a[href="#pelaksana"]').tab('show');
    $('#btnTambahPelaksana').show();
    loadTblPelaksana(id_kegrenja_temp);
    back2pelaksana();
});

$('#tblPelaksana tbody').on( 'dblclick', 'tr', function () {

  var data = pelaksana_tbl.row(this).data();

    sub_unit_temp = data.nm_sub;
    id_pelaksana_temp = data.id_pelaksana_forum;

    $('#nm_progrkpd_aktivitas').text($('#nm_program_progrenja').text());
    $('#nm_progrenja_aktivitas').text($('#nm_progrenja_kegrenja').text());
    $('#nm_kegrenja_aktivitas').text($('#nm_kegrenja_pelaksana').text());
    // $('#nm_aktivitas_lokasi').text($('#nm_aktivitas_pelaksana').text());
    $('#nm_aktivitas_pelaksana').text(data.nm_sub);

    $('.nav-tabs a[href="#aktivitas"]').tab('show');
    $('#btnTambahAktivitas').show();
    loadTblAktivitas(id_pelaksana_temp);
    back2aktivitas();

});

$(document).on('click', '#btnViewLokasi', function() {

    var data = aktivitas_tbl.row( $(this).parents('tr') ).data();

    id_aktivitas_temp = data.id_aktivitas_forum;
    id_asb_temp = data.id_aktivitas_asb;
    id_satuan_1_aktiv_temp = data.id_satuan_1; 
    id_satuan_2_aktiv_temp = data.id_satuan_2;
    nm_sat_asb1 = data.ur_satuan_1;
    nm_sat_asb2 = data.ur_satuan_2;
    vol1_temp=data.jml_vol_1;
    vol2_temp=data.jml_vol_2;

    $('#nm_progrkpd_lokasi').text($('#nm_program_progrenja').text());
    $('#nm_progrenja_lokasi').text($('#nm_progrenja_kegrenja').text());
    $('#nm_kegrenja_lokasi').text($('#nm_kegrenja_pelaksana').text());
    $('#nm_aktivitas_lokasi').text(data.uraian_aktivitas_kegiatan);
    $('#nm_sub_lokasi').text($('#nm_aktivitas_pelaksana').text());

    $('.nav-tabs a[href="#lokasi"]').tab('show');
    $('#btnTambahLokasi').show();
    loadTblLokasi(id_aktivitas_temp);
    back2lokasi();
});

$(document).on('click', '#btnViewBelanja', function() {

  var data = aktivitas_tbl.row( $(this).parents('tr') ).data();

    id_aktivitas_temp = data.id_aktivitas_forum;
    id_asb_temp = data.id_aktivitas_asb;
    id_satuan_1_aktiv_temp = data.id_satuan_1; 
    id_satuan_2_aktiv_temp = data.id_satuan_2;
    nm_sat_asb1 = data.ur_satuan_1;
    nm_sat_asb2 = data.ur_satuan_2;
    vol1_temp=data.jml_vol_1;
    vol2_temp=data.jml_vol_2;

    $('#nm_progrkpd_belanja').text($('#nm_program_progrenja').text());
    $('#nm_progrenja_belanja').text($('#nm_progrenja_kegrenja').text());
    $('#nm_kegrenja_belanja').text($('#nm_kegrenja_aktivitas').text());
    $('#nm_aktivitas_belanja').text(data.uraian_aktivitas_kegiatan);
    $('#nm_sub_belanja').text($('#nm_aktivitas_pelaksana').text());

    if(data.sumber_aktivitas==0){
      $('#divAddSSH').hide();
      $('#divImportASB').show();
    } else {
      $('#divAddSSH').show();
      $('#divImportASB').hide();
    }

    $('.nav-tabs a[href="#belanja"]').tab('show');
    loadTblBelanja(id_aktivitas_temp);
});

$( "#id_unit" ).change(function() {
  tahun_temp = $('#tahun_rkpd').val();
  unit_temp = $('#id_unit').val();

  $('.nav-tabs a[href="#programrkpd"]').tab('show');
  loadTblProgRkpd(tahun_temp,unit_temp);

});

function getStatusPelaksanaanProgRenja(){

    var xCheck = document.querySelectorAll('input[name="status_pelaksanaan_progrenja"]:checked');
    var xyz = [];
    for(var x = 0, l = xCheck.length; x < l;  x++)
      { xyz.push(xCheck[x].value); }
    var xvalues = xyz.join('');
    return xvalues;
  }

$(document).on('click', '.add-ProgRenja', function() {
  $('.btnProgRenja').addClass('addProgRenja');
  $('.btnProgRenja').removeClass('editProgRenja');
  $('#id_forum_program').val(null);
  $('#id_forum_rkpdprog_progrenja').val(ProgRkpd_temp);
  $('#tahun_forum_progrenja').val(tahun_temp);
  $('#id_unit_progrenja').val(unit_temp);
  $('#jenis_belanja').val(jenis_belanja_temp);
  $('#no_urut_progrenja').val(null);
  $('#id_program_renstra').val(null);
  $('#ur_program_renja').val(null);
  $('#id_renja_program').val(null);
  $('#ur_program_ref').val(null);
  $('#id_program_ref').val(null);
  $('#pagu_renja_program').val(null);
  $('#pagu_forum_progrenja').val(null);
  $('#keterangan_status_progrenja').val(null);
  document.frmProgRenja.status_pelaksanaan_progrenja[4].checked=true;
  $('#sumber_data_progrenja').val(1);
  $('#status_data_progrenja').val(0);

  $('#idStatusProgRenja').attr('style', 'display:none;');

  $('.btnHapusProgRenja').hide();
  $('.btnCariProgramRenstra').show();
  $('.btnCariProgRef').show();
  $('.ur_program_renja').removeAttr("disabled");

  $('.modal-title').text("Tambah Program SKPD");
  $('#ModalProgRenja').modal('show');
});

$('.modal-footer').on('click', '.addProgRenja', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: './forumskpd/forum/AddProgRenja',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_forum_rkpdprog' : $('#id_forum_rkpdprog_progrenja').val(),
              'tahun_forum' : $('#tahun_forum_progrenja').val(),
              'no_urut' : $('#no_urut_progrenja').val(),
              'id_unit' : $('#id_unit_progrenja').val(),
              'jenis_belanja' : $('#jenis_belanja').val(),
              'id_renja_program' : $('#id_renja_program').val(),
              'id_program_renstra' : $('#id_program_renstra').val(),
              'uraian_program_renstra' : $('#ur_program_renja').val(),
              'id_program_ref' : $('#id_program_ref').val(),
              // 'pagu_tahun_renstra' : $('#pagu_renja_program').val(),
              'pagu_forum' : $('#pagu_forum_progrenja').val(),
              // 'sumber_data' : $('#sumber_data_progrenja').val(),
              'status_pelaksanaan' : getStatusPelaksanaanProgRenja(),
              'ket_usulan' : $('#keterangan_status_progrenja').val(),
              // 'status_data' : $('#status_data_progrenja').val(),
          },
          success: function(data) {
              $('#tblProgram').DataTable().ajax.reload();
              // if(data.status_pesan==1){
              // $('#pesan').html('<div class="alert alert-success col-md-12"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+data.pesan+'</div>');
              // } else {
              // $('#pesan').html('<div class="alert alert-danger col-md-12"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+data.pesan+'</div>');  
              // } 
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
                }
          }
      });
  });

$(document).on('click', '.edit-ProgRenja', function() {
  var data = prog_renja_tbl.row( $(this).parents('tr') ).data();
  $('.btnProgRenja').removeClass('addProgRenja');
  $('.btnProgRenja').addClass('editProgRenja');
  $('#id_forum_program').val(data.id_forum_program);
  $('#id_forum_rkpdprog_progrenja').val(data.id_forum_rkpdprog);
  $('#tahun_forum_progrenja').val(data.tahun_forum);
  $('#jenis_belanja').val(data.jenis_belanja);
  $('#id_unit_progrenja').val(data.id_unit);
  $('#no_urut_progrenja').val(data.no_urut);
  $('#id_program_renstra').val(data.id_program_renstra);
  $('#uraian_program_renstra').val(data.program_renstra);
  $('#ur_program_renja').val(data.uraian_program_renstra);
  $('#id_renja_program').val(data.id_renja_program);
  $('#ur_program_ref').val(data.uraian_program);
  $('#id_program_ref').val(data.id_program_ref);
  $('#pagu_renja_program').val(data.pagu_tahun_renstra);
  $('#pagu_forum_progrenja').val(data.pagu_forum);
  $('#keterangan_status_progrenja').val(data.ket_usulan);
  document.frmProgRenja.status_pelaksanaan_progrenja[data.status_pelaksanaan].checked=true;
  $('#sumber_data_progrenja').val(data.sumber_data);
  $('#status_data_progrenja').val(data.status_data);
  $('.modal-title').text("Edit Program SKPD");

  if(data.sumber_data==0){
    $('.btnHapusProgRenja').hide();
    $('.btnCariProgramRenstra').hide();
    $('.btnCariProgRef').hide();
    $('.ur_program_renja').attr('disabled', 'disabled');
    $('#idStatusProgRenja').removeAttr('style');
  } else {
    $('.btnHapusProgRenja').show();
    $('.btnCariProgramRenstra').show();
    $('.btnCariProgRef').show();
    $('.ur_program_renja').removeAttr("disabled");
    $('#idStatusProgRenja').attr('style', 'display:none;');
  }

  $('#ModalProgRenja').modal('show');
});

$('.modal-footer').on('click', '.editProgRenja', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: './forumskpd/forum/editProgRenja',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_forum_program' : $('#id_forum_program').val(),
              'id_forum_rkpdprog' : $('#id_forum_rkpdprog_progrenja').val(),
              'tahun_forum' : $('#tahun_forum_progrenja').val(),
              'no_urut' : $('#no_urut_progrenja').val(),
              'id_unit' : $('#id_unit_progrenja').val(),              
              'jenis_belanja' : $('#jenis_belanja').val(),
              'id_renja_program' : $('#id_renja_program').val(),
              'id_program_renstra' : $('#id_program_renstra').val(),
              'uraian_program_renstra' : $('#ur_program_renja').val(),
              'id_program_ref' : $('#id_program_ref').val(),
              'pagu_tahun_renstra' : $('#pagu_renja_program').val(),
              'pagu_forum' : $('#pagu_forum_progrenja').val(),
              'sumber_data' : $('#sumber_data_progrenja').val(),
              'status_pelaksanaan' : getStatusPelaksanaanProgRenja(),
              'ket_usulan' : $('#keterangan_status_progrenja').val(),
              'status_data' : $('#status_data_progrenja').val(),
          },
          success: function(data) {
              $('#tblProgram').DataTable().ajax.reload();
              // if(data.status_pesan==1){
              // $('#pesan').html('<div class="alert alert-success col-md-12"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+data.pesan+'</div>');
              // } else {
              // $('#pesan').html('<div class="alert alert-danger col-md-12"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+data.pesan+'</div>');  
              // } 
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              } 
          }
      });
  });

$(document).on('click', '.btnHapusProgRenja', function() {

  $('#id_forum_program_hapus').val($('#id_forum_program').val());
  $('#ur_progrenja_hapus').text($('#ur_program_renja').val());  

  $('#HapusProgRenja').modal('show');

});

$(document).on('click', '.btnDelProgRenja', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      type: 'post',
      url: './forumskpd/forum/hapusProgRenja',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_forum_program': $('#id_forum_program_hapus').val()
      },
      success: function(data) {
        $('#ModalProgRenja').modal('hide'); 
        $('#tblProgram').DataTable().ajax.reload();
        // $('#pesan').html('<div class="alert alert-info col-md-12"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+data.pesan+'</div>');
        if(data.status_pesan==1){
          createPesan(data.pesan,"success");
        } else {
          createPesan(data.pesan,"danger"); 
        } 
      }
    });
});

function HitungPaguMusren(pagu, persen){
	var x = pagu;
	var y = persen;

	var nilai_musren = Math.ceil(x*(y/100));
	
	return nilai_musren;
};

$( "#persen_musren" ).change(function() {
  var x = $('#pagu_forum').val();
  var y = $('#persen_musren').val();

  $('#pagu_musren').val(HitungPaguMusren(x,y));
});

$( "#pagu_forum" ).change(function() {
  var x = $('#pagu_forum').val();
  var y = $('#persen_musren').val();

  $('#pagu_musren').val(HitungPaguMusren(x,y));
});

function getStatusPelaksanaanKegRenja(){

    var xCheck = document.querySelectorAll('input[name="status_pelaksanaan_kegrenja"]:checked');
    var xyz = [];
    for(var x = 0, l = xCheck.length; x < l;  x++)
      { xyz.push(xCheck[x].value); }
    var xvalues = xyz.join('');
    return xvalues;
  }

$('.sp_kegrenja').change(function() {
    if(document.frmModalKegiatan.status_pelaksanaan_kegrenja.value==0){
      document.getElementById("keterangan_status_kegiatan").setAttribute("disabled","disabled");
      $('.KetPelaksanaan_keg').hide();
    } else {
      document.getElementById("keterangan_status_kegiatan").removeAttribute("disabled");
      $('.KetPelaksanaan_keg').show();
    }

  });

$(document).on('click','#btnTambahKegiatan', function() {
  $('.btnKegiatan').addClass('addKegRenja');
  $('.btnKegiatan').removeClass('editKegRenja');
  $('#id_forum_skpd').val(null),
  $('#id_forum_program_kegrej').val(id_progrenja_temp),
  $('#id_unit_kegrej').val(unit_temp),
  $('#tahun_forum_kegrej').val(tahun_temp),
  $('#no_urut_kegiatan').val(0),
  $('#id_renja').val(null),
  $('#id_rkpd_renstra').val(null),
  $('#id_program_renstra').val(null),
  $('#id_kegiatan_renstra').val(null),
  $('#id_kegiatan_ref').val(null),
  $('#ur_kegiatan_renstra').val(null);
  $('#ur_kegiatan_forum').val(null),
  $('#ur_kegiatan_ref').val(null),
  $('#pagu_tahun_kegiatan').val(0),
  $('#pagu_renstra').val(0);
  $('#pagu_renja_kegiatan').val(0);
  $('#pagu_selanjutnya').val(0);
  $('#pagu_renstra_forum').val(0);
  $('#pagu_renja_kegiatan_forum').val(0);
  $('#pagu_selanjutnya_forum').val(0);
  $('#pagu_forum').val(0),
  $('#keterangan_status_kegiatan').val(null),
  document.frmModalKegiatan.status_pelaksanaan_kegrenja[4].checked=true;

  $('#no_urut_kegiatan').removeAttr("disabled");
  $('#keterangan_status_kegiatan').removeAttr("disabled");
  $('#ur_kegiatan_forum').removeAttr("disabled");
  $('#btnCariKegiatanRef').show();
  $('#btnCariKegiatanRenstra').show();  
  $('#btnHapusKegRenja').hide();
  $('#idStatuskegrenja').hide();

  $('.modal-title').text("Tambah Kegiatan SKPD");
  $('#ModalKegiatan').modal('show');

});

$('.modal-footer').on('click', '.addKegRenja', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: './forumskpd/forum/addKegRenja',
          data: {
              '_token': $('input[name=_token]').val(),
              // 'id_forum_skpd' : $('#id_forum_skpd').val(),
              'id_forum_program' : $('#id_forum_program_kegrej').val(),
              'id_unit' : $('#id_unit_kegrej').val(),
              'tahun_forum' : $('#tahun_forum_kegrej').val(),
              'no_urut' : $('#no_urut_kegiatan').val(),
              'id_renja' : $('#id_renja').val(),
              'id_rkpd_renstra' : $('#id_rkpd_renstra').val(),
              'id_program_renstra' : $('#id_program_renstra').val(),
              'id_kegiatan_renstra' : $('#id_kegiatan_renstra').val(),
              'id_kegiatan_ref' : $('#id_kegiatan_ref').val(),
              'uraian_kegiatan_forum' : $('#ur_kegiatan_forum').val(),
              'pagu_plus1_forum' : $('#pagu_selanjutnya_forum').val(),
              'pagu_forum' : $('#pagu_renja_kegiatan_forum').val(),
              'keterangan_status' : $('#keterangan_status_kegiatan').val(),
              // 'status_data' : $('#status_data').val(),
              'status_pelaksanaan' : getStatusPelaksanaanKegRenja(),
              // 'sumber_data' : $('#sumber_data').val(),
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

$(document).on('click','#edit-kegiatan', function() {
  var data = keg_renja_tbl.row( $(this).parents('tr') ).data();

  $('.btnKegiatan').removeClass('addKegRenja');
  $('.btnKegiatan').addClass('editKegRenja');
  $('#id_forum_skpd').val(data.id_forum_skpd);
  $('#id_forum_program_kegrej').val(data.id_forum_program);
  $('#id_unit_kegrej').val(data.id_unit);
  $('#tahun_forum_kegrej').val(data.tahun_forum);
  $('#no_urut_kegiatan').val(data.no_urut);
  $('#id_renja').val(data.id_renja);
  $('#id_rkpd_renstra').val(data.id_rkpd_renstra);
  $('#id_program_renstra').val(data.id_program_renstra);
  $('#id_kegiatan_renstra').val(data.id_kegiatan_renstra);
  $('#id_kegiatan_ref').val(data.id_kegiatan_ref);
  $('#ur_kegiatan_forum').val(data.uraian_kegiatan_forum);
  $('#ur_kegiatan_ref').val(data.kd_kegiatan +" - "+data.nm_kegiatan);
  $('#pagu_tahun_kegiatan').val(data.pagu_tahun_kegiatan);
  $('#persen_musren').val(data.persen_musren);
  $('#pagu_forum').val(data.pagu_forum);
  $('#keterangan_status_kegiatan').val(data.keterangan_status);
  document.frmModalKegiatan.status_pelaksanaan_kegrenja[data.status_pelaksanaan].checked=true;
  $('#pagu_musren').val(data.pagu_musrenbang);
  $('#ur_kegiatan_renstra').val(data.uraian_kegiatan_renstra);
  $('#pagu_renstra').val(data.pagu_kegiatan_renstra);
  $('#pagu_renja_kegiatan').val(data.pagu_tahun_kegiatan);
  $('#pagu_selanjutnya').val(data.pagu_plus1_renja);
  $('#pagu_renstra_forum').val(data.pagu_kegiatan_renstra);
  $('#pagu_renja_kegiatan_forum').val(data.pagu_forum);
  $('#pagu_selanjutnya_forum').val(data.pagu_plus1_forum);

  if(data.status_pelaksanaan==0){
    $("#keterangan_status_kegiatan").attr("disabled","disabled");
    $('.KetPelaksanaan_keg').hide();
  } else {
    $("#keterangan_status_kegiatan").removeAttr("disabled");
    $('.KetPelaksanaan_keg').show();
  }

$('.sp_kegrenja').change(function() {
    if(document.frmModalKegiatan.status_pelaksanaan_kegrenja.value==0){
      document.getElementById("keterangan_status_kegiatan").setAttribute("disabled","disabled");
      $('.KetPelaksanaan_keg').hide();
    } else {
      document.getElementById("keterangan_status_kegiatan").removeAttribute("disabled");
      $('.KetPelaksanaan_keg').show();
    }

  });

  if(data.sumber_data==0){
    $('#btnHapusKegRenja').hide();
    $('#btnCariKegiatanRef').hide();
    $('#btnCariKegiatanRenstra').hide();  
    $('#ur_kegiatan_forum').attr('disabled', 'disabled');
    $('#idStatuskegrenja').show();
  } else {
    $('#no_urut_kegiatan').removeAttr("disabled");
    $('#ur_kegiatan_forum').removeAttr("disabled");
    $('#keterangan_status_kegiatan').removeAttr("disabled");
    $('#btnCariKegiatanRef').show();
    $('#btnCariKegiatanRenstra').show();  
    $('#btnHapusKegRenja').show();
    $('#idStatuskegrenja').hide();
  }

  $('.chkKegiatan').show();
      if(data.status_data==1){
        $('.checkKegiatan').prop('checked',true);
      } else {
        $('.checkKegiatan').prop('checked',false);
      }

  $('.modal-title').text("Edit Data Kegiatan SKPD");
  $('#ModalKegiatan').modal('show');

});

$('.modal-footer').on('click', '.editKegRenja', function() {

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
          url: './forumskpd/forum/editKegRenja',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_forum_skpd' : $('#id_forum_skpd').val(),
              'id_forum_program' : $('#id_forum_program_kegrej').val(),
              'id_unit' : $('#id_unit_kegrej').val(),
              'tahun_forum' : $('#tahun_forum_kegrej').val(),
              'no_urut' : $('#no_urut_kegiatan').val(),
              'id_renja' : $('#id_renja').val(),
              'id_rkpd_renstra' : $('#id_rkpd_renstra').val(),
              'id_program_renstra' : $('#id_program_renstra').val(),
              'id_kegiatan_renstra' : $('#id_kegiatan_renstra').val(),
              'id_kegiatan_ref' : $('#id_kegiatan_ref').val(),
              'uraian_kegiatan_forum' : $('#ur_kegiatan_forum').val(),
              'pagu_plus1_forum' : $('#pagu_selanjutnya_forum').val(),
              'pagu_forum' : $('#pagu_renja_kegiatan_forum').val(),
              'keterangan_status' : $('#keterangan_status_kegiatan').val(),
              'status_data' : check_data,
              'status_pelaksanaan' : getStatusPelaksanaanKegRenja(),
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

$(document).on('click', '#btnHapusKegRenja', function() {

  $('#id_forum_hapus').val($('#id_forum_skpd').val());
  $('#ur_kegrenja_hapus').text($('#ur_kegiatan_forum').val());  

  $('#HapusKegRenja').modal('show');

});

$(document).on('click', '#btnDelKegRenja', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      type: 'post',
      url: './forumskpd/forum/hapusKegRenja',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_forum_skpd': $('#id_forum_hapus').val()
      },
      success: function(data) {
        $('#ModalKegiatan').modal('hide'); 
        $('#tblProgram').DataTable().ajax.reload();
        $('#tblKegiatanRenja').DataTable().ajax.reload();
        createPesan(data.pesan,"info");
      }
    });
});

$( ".sumber_aktivitas" ).change(function() {
  if(document.frmModalAktivitas.sumber_aktivitas.value==0){
      document.getElementById("ur_aktivitas_kegiatan").setAttribute("disabled","disabled");
      $('.btnCariASB').show();
      $('#id_satuan_publik').removeAttr("disabled");
    } else {
      document.getElementById("ur_aktivitas_kegiatan").removeAttribute("disabled");
      $('.btnCariASB').hide();
      $('#id_satuan_publik').attr("disabled","disabled");
    }
});

$( "#persen_musren_aktivitas" ).change(function() {
  var x = $('#pagu_aktivitas').val();
  var y = $('#persen_musren_aktivitas').val();

  $('#pagu_musren_aktivitas').val(HitungPaguMusren(x,y));
});

$( "#pagu_aktivitas" ).change(function() {
  var x = $('#pagu_aktivitas').val();
  var y = $('#persen_musren_aktivitas').val();

  $('#pagu_musren_aktivitas').val(HitungPaguMusren(x,y));
});

$( ".jenis_pembahasan" ).change(function() {  
  if(document.frmModalAktivitas.jenis_pembahasan.value==0){
    $('#persen_musren_aktivitas').val(0);
    $('#pagu_musren_aktivitas').val(0);
    document.getElementById("persen_musren_aktivitas").setAttribute("disabled","disabled");
    $('#id_satuan_publik').attr("disabled","disabled");
    $('#id_satuan_publik').val(-1);
  } else {
    $('#persen_musren_aktivitas').val(0);
    $('#pagu_musren_aktivitas').val(0);
    document.getElementById("persen_musren_aktivitas").removeAttribute("disabled");
    $('#id_satuan_publik').removeAttr("disabled");
  }
});

$( "#id_satuan_1_aktivitas" ).change(function() {
  $('#ur_sat_utama1').text($('#id_satuan_1_aktivitas option:selected').text());
  $('#ur_sat_utama2').text($('#id_satuan_2_aktivitas option:selected').text());  
});

$( "#id_satuan_2_aktivitas" ).change(function() {
  $('#ur_sat_utama1').text($('#id_satuan_1_aktivitas option:selected').text());
  $('#ur_sat_utama2').text($('#id_satuan_2_aktivitas option:selected').text());

  if($( "#id_satuan_2_aktivitas" ).val()==0 || $( "#id_satuan_2_aktivitas" ).val()== -1){    
    document.frmModalAktivitas.satuan_utama[0].checked=true;
    $(':radio[name=satuan_utama]:not(:checked)').attr('disabled', true);
  } else {
    $(':radio[name=satuan_utama]:not(:checked)').attr('disabled', false);  
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

function getStatusPelaksanaanAktivitas(){

    var xCheck = document.querySelectorAll('input[name="status_pelaksanaan_aktivitas"]:checked');
    var xyz = [];
    for(var x = 0, l = xCheck.length; x < l;  x++)
      { xyz.push(xCheck[x].value); }
    var xvalues = xyz.join('');
    return xvalues;
  }

function getSatuanUtamaAktivitas(){

    var xCheck = document.querySelectorAll('input[name="satuan_utama"]:checked');
    var xyz = [];
    for(var x = 0, l = xCheck.length; x < l;  x++)
      { xyz.push(xCheck[x].value); }
    var xvalues = xyz.join('');
    return xvalues;
  }

$(document).on('click', '#btnTambahAktivitas', function() {

      $('#btnAktivitas').addClass('addAktivitas');
      $('#btnAktivitas').removeClass('editAktivitas');      
      $('.form-horizontal').show();
      $('.modal-title').text('Tambah Aktivitas Kegiatan SKPD');
      $('#id_forum_aktivitas').val(id_pelaksana_temp);
      $('#id_aktivitas').val(null);
      $('#tahun_forum_aktivitas').val(tahun_temp);
      $('#no_urut_aktivitas').val(0);
      $('#id_renja_aktivitas').val(null);
      document.frmModalAktivitas.sumber_aktivitas[0].checked=true;
      $('#ur_aktivitas_kegiatan').val(null);
      $('#id_aktivitas_asb').val(null);
      document.frmModalAktivitas.jenis_aktivitas[0].checked=true;
      $('#sumber_dana').val(0);
      $('#pagu_aktivitas').val(0);   
      $('#pagu_aktivitas_renja').val(0);   
      document.frmModalAktivitas.jenis_pembahasan[0].checked=true;
      $('#persen_musren_aktivitas').val(0);
      $('#pagu_musren_aktivitas').val(0);
      document.frmModalAktivitas.status_pelaksanaan_aktivitas[0].checked=true;
      $('#keterangan_status_aktivitas').val(null);
      $('#persen_musren_aktivitas').attr('disabled', 'disabled');
      $('#id_satuan_publik').attr("disabled","disabled");

      $('#id_satuan_1_aktivitas').val(-1);
      $('#id_satuan_2_aktivitas').val(-1);
      document.frmModalAktivitas.satuan_utama[0].checked=true;

      $('#no_urut_aktivitas').removeAttr("disabled");
      $('#keterangan_status_aktivitas').removeAttr("disabled");
      $('#btnCariASB').show();
      $('#btnHapusAktivitas').hide();

      $('#divJenisPembahasan').hide();
      $('#divPaguMusrenbang').hide();
      $('#divSatuanPublik').hide();
      $('#idStatusPelaksanaanAktivitas').hide();

      $(':radio[name=jenis_pembahasan]:not(:checked)').attr('disabled', false);
      $(':radio[name=sumber_aktivitas]:not(:checked)').attr('disabled', false);
      $(':radio[name=jenis_aktivitas]:not(:checked)').attr('disabled', false);
      $(':radio[name=satuan_utama]:not(:checked)').attr('disabled', false);
      $('#id_satuan_1_aktivitas').removeAttr("disabled");
      $('#id_satuan_2_aktivitas').removeAttr("disabled");

      $('#ModalAktivitas').modal('show');

  });

$('.modal-footer').on('click', '.addAktivitas', function() {
      if (document.getElementById("checkAktivitas").checked){
        check_data = 1
      } else {
        check_data = 0
      }

      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: './forumskpd/forum/addAktivitas',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_forum_skpd' : $('#id_forum_aktivitas').val(),
              'tahun_forum' : $('#tahun_forum_aktivitas').val(),
              'no_urut' : $('#no_urut_aktivitas').val(),
              'sumber_aktivitas' : getSumberASB(),
              'id_aktivitas_asb' : $('#id_aktivitas_asb').val(),
              'id_aktivitas_renja' : $('#id_renja_aktivitas').val(),
              'uraian_aktivitas_kegiatan' : $('#ur_aktivitas_kegiatan').val(),
              'jenis_kegiatan' : getJenisKegiatan(),
              'sumber_dana' : $('#sumber_dana').val(),
              'pagu_aktivitas_renja' : $('#pagu_aktivitas_renja').val(),
              'pagu_aktivitas_forum' : $('#pagu_aktivitas').val(),
              'pagu_musren' : $('#persen_musren_aktivitas').val(),
              'id_satuan_publik' : getSatuanUtamaAktivitas(),
              'id_satuan_1' : $('#id_satuan_1_aktivitas').val(),
              'id_satuan_2' : $('#id_satuan_2_aktivitas').val(), 
              'status_data' : check_data,
              'status_pelaksanaan' : getStatusPelaksanaanAktivitas(),
              'keterangan_aktivitas' : $('#keterangan_status_aktivitas').val(),
              'status_musren' : getJenisPembahasan(),
          },
          success: function(data) {
              $('#tblAktivitas').DataTable().ajax.reload();
              $('#tblKegiatanRenja').DataTable().ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
          }
      });
  });

$(document).on('click', '#btnEditAktivitas', function() {
var data = aktivitas_tbl.row( $(this).parents('tr') ).data();

      console.log(data);

      $('#btnAktivitas').removeClass('addAktivitas');
      $('#btnAktivitas').addClass('editAktivitas');      
      $('.form-horizontal').show();
      $('#id_forum_aktivitas').val(data.id_forum_skpd);
      $('#id_aktivitas').val(data.id_aktivitas_forum);
      $('#tahun_forum_aktivitas').val(data.tahun_forum);
      $('#no_urut_aktivitas').val(data.no_urut);
      $('#id_renja_aktivitas').val(data.id_aktivitas_renja);
      document.frmModalAktivitas.sumber_aktivitas[data.sumber_aktivitas].checked=true;
      $('#ur_aktivitas_kegiatan').val(data.uraian_aktivitas_kegiatan);
      $('#id_aktivitas_asb').val(data.id_aktivitas_asb);
      document.frmModalAktivitas.jenis_aktivitas[data.jenis_kegiatan].checked=true;
      $('#sumber_dana').val(data.sumber_dana);
      $('#id_satuan_1_aktivitas').val(data.id_satuan_1);
      $('#id_satuan_2_aktivitas').val(data.id_satuan_2);
      $('#pagu_aktivitas').val(data.pagu_aktivitas_forum);   
      $('#pagu_aktivitas_renja').val(data.pagu_aktivitas_renja);   
      document.frmModalAktivitas.jenis_pembahasan[data.status_musren].checked=true;
      $('#persen_musren_aktivitas').val(data.pagu_musren);
      $('#pagu_musren_aktivitas').val(data.jml_musren_aktivitas);
      document.frmModalAktivitas.status_pelaksanaan_aktivitas[data.status_pelaksanaan].checked=true;
      $('#keterangan_status_aktivitas').val(data.keterangan_aktivitas);
      $('#persen_musren_aktivitas').attr('disabled', 'disabled');

      if(data.id_satuan_publik != null || data.id_satuan_publik != undefined || data.id_satuan_publik != -1){
        document.frmModalAktivitas.satuan_utama[data.id_satuan_publik].checked=true;
      } else {
        document.frmModalAktivitas.satuan_utama[0].checked=true;
      }
      
      $('#ur_sat_utama1').text(data.ur_satuan_1);
      $('#ur_sat_utama2').text(data.ur_satuan_2); 

      if(data.sumber_data==0){
        $('#no_urut_aktivitas').attr('disabled', 'disabled');
        $('#keterangan_status_aktivitas').removeAttr("disabled");
        $('#btnCariASB').hide();
        $('#btnHapusAktivitas').hide();
        $('#divJenisPembahasan').show();
        $('#divPaguMusrenbang').show();
        $('#idStatusPelaksanaanAktivitas').show();
        $(':radio[name=jenis_pembahasan]:not(:checked)').attr('disabled', true);
        $(':radio[name=sumber_aktivitas]:not(:checked)').attr('disabled', true);
        $(':radio[name=jenis_aktivitas]:not(:checked)').attr('disabled', true);
        $(':radio[name=satuan_utama]:not(:checked)').attr('disabled', true);
        $('#id_satuan_1_aktivitas').attr('disabled', 'disabled');
        $('#id_satuan_2_aktivitas').attr('disabled', 'disabled');
      } else {
        $('#no_urut_aktivitas').removeAttr("disabled");
        $('#keterangan_status_aktivitas').removeAttr("disabled");
        $('#btnCariASB').show();
        $('#btnHapusAktivitas').show();
        $('#divJenisPembahasan').hide();
        $('#divPaguMusrenbang').hide();
        $('#idStatusPelaksanaanAktivitas').hide();
        $(':radio[name=satuan_utama]:not(:checked)').attr('disabled', false);
        $(':radio[name=jenis_pembahasan]:not(:checked)').attr('disabled', false);
        $(':radio[name=sumber_aktivitas]:not(:checked)').attr('disabled', false);
        $(':radio[name=jenis_aktivitas]:not(:checked)').attr('disabled', false);
        $('#id_satuan_1_aktivitas').removeAttr("disabled");
        $('#id_satuan_2_aktivitas').removeAttr("disabled");

      }

      if($(this).data('status_musren') == 1){
        $('#divPaguMusrenbang').show();
        $('#persen_musren_aktivitas').removeAttr("disabled");
        // $('#divSatuanPublik').show();
        $('#id_satuan_publik').removeAttr("disabled");
      } else {
        $('#divPaguMusrenbang').hide();
        $('#persen_musren_aktivitas').attr("disabled","disabled");        
        // $('#divSatuanPublik').hide();
        $('#id_satuan_publik').attr("disabled","disabled");
      }
      

      if($(this).data('sumber_aktivitas')==0){
        $('#id_satuan_publik').removeAttr("disabled");
      } else {
        $('#id_satuan_publik').attr("disabled","disabled");
      }

      $('.chkAktivitas').show();
          if(data.status_data==1){
            $('.checkAktivitas').prop('checked',true);
          } else {
            $('.checkAktivitas').prop('checked',false);
          }

      $('.modal-title').text('Edit Aktivitas Kegiatan SKPD');
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

      $.ajax({
          type: 'post',
          url: './forumskpd/forum/editAktivitas',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_aktivitas_forum' : $('#id_aktivitas').val(),
              'id_forum_skpd' : $('#id_forum_aktivitas').val(),
              'tahun_forum' : $('#tahun_forum_aktivitas').val(),
              'no_urut' : $('#no_urut_aktivitas').val(),
              'sumber_aktivitas' : getSumberASB(),
              'id_aktivitas_asb' : $('#id_aktivitas_asb').val(),
              'id_aktivitas_renja' : $('#id_renja_aktivitas').val(),
              'uraian_aktivitas_kegiatan' : $('#ur_aktivitas_kegiatan').val(),
              'jenis_kegiatan' : getJenisKegiatan(),
              'id_satuan_publik' : getSatuanUtamaAktivitas(), 
              'id_satuan_1' : $('#id_satuan_1_aktivitas').val(),
              'id_satuan_2' : $('#id_satuan_2_aktivitas').val(), 
              'sumber_dana' : $('#sumber_dana').val(),
              'pagu_aktivitas_renja' : $('#pagu_aktivitas_renja').val(),
              'pagu_aktivitas_forum' : $('#pagu_aktivitas').val(),
              'pagu_musren' : $('#persen_musren_aktivitas').val(),
              'status_data' : check_data,
              'status_pelaksanaan' : getStatusPelaksanaanAktivitas(),
              'keterangan_aktivitas' : $('#keterangan_status_aktivitas').val(),
              'status_musren' : getJenisPembahasan(),
          },
          success: function(data) {
              $('#tblAktivitas').DataTable().ajax.reload();
              $('#tblKegiatanRenja').DataTable().ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
          }
      });
  });

$(document).on('click', '#btnHapusAktivitas', function() {

  $('#id_aktivitas_hapus').val($('#id_aktivitas').val());
  $('#ur_aktivitas_hapus').text($('#ur_aktivitas_kegiatan').val());  

  $('#HapusAktivitas').modal('show');

});

$(document).on('click', '#btnDelAktivitas', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      type: 'post',
      url: './forumskpd/forum/hapusAktivitas',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_aktivitas_forum': $('#id_aktivitas_hapus').val()
      },
      success: function(data) {
        $('#ModalAktivitas').modal('hide'); 
        $('#tblAktivitas').DataTable().ajax.reload();
        $('#tblKegiatanRenja').DataTable().ajax.reload();
        createPesan(data.pesan,"info");
      }
    });
});

function getStatusPelaksanaanPelaksana(){

    var xCheck = document.querySelectorAll('input[name="status_pelaksanaan_pelaksana"]:checked');
    var xyz = [];
    for(var x = 0, l = xCheck.length; x < l;  x++)
      { xyz.push(xCheck[x].value); }
    var xvalues = xyz.join('');
    return xvalues;
  }

$(document).on('click', '#btnTambahPelaksana', function() {

      $('#btnPelaksana').addClass('addPelaksana');
      $('#btnPelaksana').removeClass('editPelaksana');      
      $('.form-horizontal').show();
      $('.modal-title').text('Tambah Pelaksana Kegiatan SKPD');

      $('#id_pelaksana_forum').val(null),
      $('#id_aktivitas_pelaksana').val(id_kegrenja_temp),
      $('#tahun_forum_pelaksana').val(tahun_temp),
      $('#no_urut_pelaksana').val(null),
      $('#id_subunit_pelaksana').val(null),
      $('#subunit_pelaksana').val(null),
      document.frmModalPelaksana.status_pelaksanaan_pelaksana[0].checked=true;
      $('#keterangan_status_pelaksana').val(null),
      $('#id_lokasi_pelaksana').val(null),
      $('#nm_lokasi_pelaksana').val(null),      

      $('#no_urut_pelaksana').removeAttr("disabled");
      $('#keterangan_status_pelaksana').removeAttr("disabled");
      $('#btnHapusPelaksana').hide();
      $('#idStatusPelaksanaanPelaksana').hide();

      $('#ModalPelaksana').modal('show');

  });

$('.modal-footer').on('click', '.addPelaksana', function() {
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
          url: './forumskpd/forum/addPelaksana',
          data: {
              '_token': $('input[name=_token]').val(),
              // 'id_pelaksana_forum' : $('#id_pelaksana_forum').val(),
              'tahun_forum' : $('#tahun_forum_pelaksana').val(),
              'no_urut' : $('#no_urut_pelaksana').val(),
              'id_aktivitas_forum' : $('#id_aktivitas_pelaksana').val(),
              'id_sub_unit' : $('#id_subunit_pelaksana').val(),
              'id_lokasi' : $('#id_lokasi_pelaksana').val(),
              'ket_pelaksana' : $('#keterangan_status_pelaksana').val(),
              'status_pelaksanaan' : getStatusPelaksanaanPelaksana(),
              'status_data' : check_data,

          },
          success: function(data) {
              // $('#tblAktivitas').DataTable().ajax.reload();
              $('#tblPelaksana').DataTable().ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
          }
      });
  });

$(document).on('click', '#btnEditPelaksana', function() {
  var data = pelaksana_tbl.row( $(this).parents('tr') ).data();

      $('#btnPelaksana').removeClass('addPelaksana');
      $('#btnPelaksana').addClass('editPelaksana');      
      $('.form-horizontal').show();
      $('.modal-title').text('Edit Pelaksana Kegiatan SKPD');

      $('#id_pelaksana_forum').val(data.id_pelaksana_forum),
      $('#id_aktivitas_pelaksana').val(data.id_aktivitas_forum),
      $('#tahun_forum_pelaksana').val(data.tahun_forum),
      $('#no_urut_pelaksana').val(data.no_urut),
      $('#id_subunit_pelaksana').val(data.id_sub_unit),
      $('#subunit_pelaksana').val(data.nm_sub),
      document.frmModalPelaksana.status_pelaksanaan_pelaksana[data.status_pelaksanaan].checked=true;
      $('#keterangan_status_pelaksana').val(data.ket_pelaksana),
      $('#id_lokasi_pelaksana').val(data.id_lokasi),
      $('#nm_lokasi_pelaksana').val(data.nama_lokasi),      

     

      $('.chkPelaksana').show();
          if(data.status_data==1){
            $('.checkPelaksana').prop('checked',true);
          } else {
            $('.checkPelaksana').prop('checked',false);
          }

      if(data.sumber_data==0){
          $('#no_urut_pelaksana').attr('disabled','disabled');
          $('#keterangan_status_pelaksana').removeAttr("disabled");
          $('#btnHapusPelaksana').hide();
          $('#idStatusPelaksanaanPelaksana').hide();
      } else {
          $('#no_urut_pelaksana').removeAttr("disabled");
          $('#keterangan_status_pelaksana').removeAttr("disabled");
          $('#btnHapusPelaksana').show();
          $('#idStatusPelaksanaanPelaksana').show();
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
          url: './forumskpd/forum/editPelaksana',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_pelaksana_forum' : $('#id_pelaksana_forum').val(),
              'tahun_forum' : $('#tahun_forum_pelaksana').val(),
              'no_urut' : $('#no_urut_pelaksana').val(),
              'id_aktivitas_forum' : $('#id_aktivitas_pelaksana').val(),
              'id_sub_unit' : $('#id_subunit_pelaksana').val(),
              'id_lokasi' : $('#id_lokasi_pelaksana').val(),
              'ket_pelaksana' : $('#keterangan_status_pelaksana').val(),
              'status_pelaksanaan' : getStatusPelaksanaanPelaksana(),
              'status_data' : check_data,

          },
          success: function(data) {
              // $('#tblAktivitas').DataTable().ajax.reload();
              $('#tblPelaksana').DataTable().ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
          }
      });
  });

$(document).on('click', '#btnHapusPelaksana', function() {

  $('#id_pelaksana_hapus').val($('#id_pelaksana_forum').val());
  $('#ur_pelaksana_hapus').text($('#subunit_pelaksana').val());  

  $('#HapusPelaksana').modal('show');

});

$(document).on('click', '#btnDelPelaksana', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      type: 'post',
      url: './forumskpd/forum/hapusPelaksana',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_pelaksana_forum': $('#id_pelaksana_hapus').val()
      },
      success: function(data) {
        $('#ModalPelaksana').modal('hide'); 
        // $('#tblAktivitas').DataTable().ajax.reload();
        $('#tblPelaksana').DataTable().ajax.reload();
        createPesan(data.pesan,"info");
      }
    });
});

function getStatusPelaksanaanLokasi(){

    var xCheck = document.querySelectorAll('input[name="status_pelaksanaan_lokasi"]:checked');
    var xyz = [];
    for(var x = 0, l = xCheck.length; x < l;  x++)
      { xyz.push(xCheck[x].value); }
    var xvalues = xyz.join('');
    return xvalues;
  }

$(document).on('click', '#btnTambahLokasi', function() {
        
      $('#btnLokasi').addClass('addLokasi');
      $('#btnLokasi').removeClass('editLokasi');      
      $('.form-horizontal').show();
      $('.modal-title').text('Tambah Lokasi Aktivitas Forum');
      $('#id_pelaksana_lokasi').val(id_aktivitas_temp);
      $('#id_lokasi_forum').val(null);
      $('#tahun_forum_lokasi').val(tahun_temp);
      $('#no_urut_lokasi').val(0);
      $('#id_lokasi').val(null);
      $('#id_lokasi_teknis').val(null);
      $('#jenis_lokasi').val(null);
      $('#uraian_lokasi').val(null);
      $('#sumber_data_lokasi').val(4);
      $('#volume_1').val(1);
      $('#volume_2').val(1);      
      $('#volume_usulan_1').val(0);
      $('#volume_usulan_2').val(0);
      $('#id_satuan_1').val(id_satuan_1_aktiv_temp);
      $('#id_satuan_2').val(id_satuan_2_aktiv_temp);
      $('#nm_lokasi').val(null);
      $('#nm_lokasi_teknis').val(null);
      document.frmModalLokasi.status_pelaksanaan_lokasi[0].checked=true;
      $('#keterangan_status_lokasi').val(null);

      $('#idStatusPelaksanaanLokasi').hide();

      $('#btnHapusLokasi').hide();
      $('#btnLokasi').show();      

      $('#ModalLokasi').modal('show');

  });

$('.modal-footer').on('click', '.addLokasi', function() {

      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: './forumskpd/forum/addLokasi',
          data: {
              '_token': $('input[name=_token]').val(),
              'no_urut': $('#no_urut_lokasi').val(),
              'tahun_forum': $('#tahun_forum_lokasi').val(),
              'id_pelaksana_forum' : $('#id_pelaksana_lokasi').val() ,
              'jenis_lokasi' : $('#jenis_lokasi').val(),
              'id_lokasi_teknis' : $('#id_lokasi_teknis').val(),
              'id_lokasi' : $('#id_lokasi').val(),
              'volume_1' : $('#volume_1').val(),
              'volume_2' : $('#volume_2').val(),
              'id_satuan_1' : $('#id_satuan_1').val(),
              'id_satuan_2' : $('#id_satuan_2').val(),
              'uraian_lokasi' : $('#uraian_lokasi').val(),
              'ket_lokasi' : $('#keterangan_status_lokasi').val(),
              'status_pelaksanaan' : getStatusPelaksanaanLokasi(),

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

$(document).on('click', '#btnEditLokasi', function() {

  var data = lokasi_tbl.row( $(this).parents('tr') ).data();
        
      $('#btnLokasi').addClass('editLokasi');
      $('#btnLokasi').removeClass('addLokasi');      
      $('.form-horizontal').show();
      $('.modal-title').text('Edit Data Lokasi Aktivitas');
      $('#id_pelaksana_lokasi').val(data.id_pelaksana_forum);
      $('#id_lokasi_forum').val(data.id_lokasi_forum);
      $('#tahun_forum_lokasi').val(data.tahun_forum);
      $('#sumber_data_lokasi').val(data.sumber_data);
      $('#no_urut_lokasi').val(data.no_urut);
      $('#id_lokasi').val(data.id_lokasi);
      $('#jenis_lokasi').val(data.jenis_lokasi);
      $('#uraian_lokasi').val(data.uraian_lokasi);
      $('#nm_lokasi').val(data.nama_lokasi);
      $('#volume_1').val(data.volume_1);
      $('#volume_2').val(data.volume_2);
      $('#volume_usulan_1').val(data.volume_usulan_1);
      $('#volume_usulan_2').val(data.volume_usulan_2);
      $('#id_satuan_1').val(data.id_satuan_1);
      $('#id_satuan_2').val(data.id_satuan_2);
      document.frmModalLokasi.status_pelaksanaan_lokasi[data.status_pelaksanaan].checked=true;
      $('#keterangan_status_lokasi').val(data.ket_lokasi);

      $('.chkLokasi').show();

      if(data.status_aktivitas==1){
        $('#btnHapusLokasi').hide();
        $('#btnLokasi').hide();
      } else {
        $('#btnLokasi').show();
        if(data.sumber_data == 4){
          $('#btnHapusLokasi').show();
        } else {
          $('#btnHapusLokasi').hide();
        }
      }

      if(data.status_data==1){        
        $('.checkLokasi').prop('checked',true);
      } else {
        $('.checkLokasi').prop('checked',false);        
      }

      $('#idStatusPelaksanaanLokasi').show();

      $('#ModalLokasi').modal('show');

  });

$('.modal-footer').on('click', '.editLokasi', function() {
      if (document.getElementById("checkLokasi").checked){
        check_data = 1
      } else {
        check_data = 0
      }

      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: './forumskpd/forum/editLokasi',
          data: {
              '_token': $('input[name=_token]').val(),
              'no_urut': $('#no_urut_lokasi').val(),
              'tahun_forum': $('#tahun_forum_lokasi').val(),
              'id_lokasi_forum' : $('#id_lokasi_forum').val() ,
              'id_pelaksana_forum' : $('#id_pelaksana_lokasi').val() ,
              'jenis_lokasi' : $('#jenis_lokasi').val(),
              'id_lokasi' : $('#id_lokasi').val(),
              'id_lokasi_teknis' : $('#id_lokasi_teknis').val(),
              'volume_1' : $('#volume_1').val(),
              'volume_2' : $('#volume_2').val(),
              'id_satuan_1' : $('#id_satuan_1').val(),
              'id_satuan_2' : $('#id_satuan_2').val(),
              'uraian_lokasi' : $('#uraian_lokasi').val(),
              'ket_lokasi' : $('#keterangan_status_lokasi').val(),
              'status_data' : check_data,
              'status_pelaksanaan' : getStatusPelaksanaanLokasi(),

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

$(document).on('click', '#btnHapusLokasi', function() {

  $('#id_lokasi_hapus').val($('#id_lokasi_forum').val());
  $('#ur_lokasi_hapus').text($('#nm_lokasi').val());  

  $('#HapusLokasi').modal('show');

});

$(document).on('click', '#btnDelLokasi', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      type: 'post',
      url: './forumskpd/forum/hapusLokasi',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_lokasi_forum': $('#id_lokasi_hapus').val()
      },
      success: function(data) {
        $('#ModalLokasi').modal('hide'); 
        $('#tblLokasi').DataTable().ajax.reload();
        $('#tblPelaksana').DataTable().ajax.reload();
        createPesan(data.pesan,"info");
      }
    });
});

function hitungsatuan(){

  var x = $('#volume1_forum').val();
  var y = $('#volume2_forum').val();
  var z = $('#harga_satuan_forum').val();
  
  var nilai_musren = x*y*z;
  return nilai_musren;

}

$( "#volume1_forum" ).change(function() {

  $('#jumlah_belanja_forum').val(hitungsatuan()); 

});

$( "#volume2_forum" ).change(function() {

  $('#jumlah_belanja_forum').val(hitungsatuan()); 

});

$( "#harga_satuan_forum" ).change(function() {

  $('#jumlah_belanja_forum').val(hitungsatuan()); 

});

function checkAsalbelanja(asal){
  if(asal==4){
    $('#btnCariSSH').addClass('btnCariSSH');
    $('#btnCariRekening').addClass('btnCariRekening');
    $('#btnCariSSH').removeClass('catatan');
    $('#btnCariRekening').removeClass('catatan');
    document.getElementById("volume1_forum").removeAttribute("disabled");
    document.getElementById("volume2_forum").removeAttribute("disabled");
    document.getElementById("zona_ssh").removeAttribute("disabled");
  } else {
    $('#btnCariSSH').removeClass('btnCariSSH');
    $('#btnCariRekening').removeClass('btnCariRekening');
    $('#btnCariSSH').addClass('catatan');
    $('#btnCariRekening').addClass('catatan');
    document.getElementById("volume1_forum").setAttribute("disabled","disabled");
    document.getElementById("volume2_forum").setAttribute("disabled","disabled");
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
      $('.modal-title').text('Tambah Rincian Belanja');
      $('#id_lokasi_belanja').val(id_aktivitas_temp);
      $('#id_belanja_forum').val(null);
      $('#tahun_forum_belanja').val(tahun_temp);
      $('#no_urut_belanja').val(0);
      $('#zona_ssh').val(0);
      $('#id_item_ssh').val(null);
      $('#rekening_ssh').val(null);
      $('#ur_item_ssh').val(null);
      $('#id_rekening').val(null);
      $('#ur_rekening').val(null);
      $('#volume1').val(0);
      $('#id_satuan1').val(0);
      $('#volume2').val(0);
      $('#harga_satuan').val(0);
      $('#jumlah_belanja').val(0);
      $('#volume1_forum').val(1);
      $('#id_satuan1_forum').val(0);
      $('#volume2_forum').val(1);
      $('#harga_satuan_forum').val(1);
      $('#jumlah_belanja_forum').val(1);
      $('#uraian_belanja').val(null);
      $('#uraian_aktivitas_asb').val(null);
      $('#id_aktivitas_asb_belanja').val(0);
      $('#sumber_belanja').val(1);
      $('#id_satuan2').val(0);
      $('#id_satuan2_forum').val(0);
      $('#sumber_data_belanja').val(4);

      checkAsalbelanja(1);

      // alert(tahun_temp);

      $('#ModalBelanja').modal('show');

  });

$('.modal-footer').on('click', '.addBelanja', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: './forumskpd/forum/addBelanja',
          data: {
              '_token': $('input[name=_token]').val(),
              'tahun_forum' : tahun_temp,
              'no_urut' : $('#no_urut_belanja').val(),
              'id_lokasi_forum' : id_aktivitas_temp,
              'id_zona_ssh' : $('#zona_ssh').val(),
              'sumber_belanja' : $('#sumber_belanja').val(),
              'id_aktivitas_asb' : $('#id_aktivitas_asb_belanja').val(),
              'id_item_ssh' : $('#id_item_ssh').val(),
              'id_rekening_ssh' : $('#id_rekening').val(),
              'uraian_belanja' : $('#uraian_belanja').val(),
              'volume_1' : $('#volume1').val(),
              'id_satuan_1' : $('#id_satuan1').val(),
              'volume_2' : $('#volume2').val(),
              'id_satuan_2' : $('#id_satuan2').val(),
              'harga_satuan' : $('#harga_satuan').val(),
              'jml_belanja' : $('#jumlah_belanja').val(),
              'volume_1_forum' : $('#volume1_forum').val(),
              'id_satuan_1_forum' : $('#id_satuan1_forum').val(),
              'volume_2_forum' : $('#volume2_forum').val(),
              'id_satuan_2_forum' : $('#id_satuan2_forum').val(),
              'harga_satuan_forum' : $('#harga_satuan_forum').val(),
              'jml_belanja_forum' : $('#jumlah_belanja_forum').val(),
              'status_data' : 0,

          },
          success: function(data) {
              belanja_renja_tbl.ajax.reload();
              aktivitas_tbl.ajax.reload();
              pelaksana_tbl.ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger");
              } 
          }
      });
  });

$(document).on('click', '#btnEditBelanja', function() {

  var data = belanja_renja_tbl.row( $(this).parents('tr') ).data();
        
      $('.btnBelanja').addClass('editBelanja');
      $('.btnBelanja').removeClass('addBelanja');      
      $('.form-horizontal').show();
      $('.modal-title').text('Edit Uraian Belanja');
      $('#id_lokasi_belanja').val(data.id_lokasi_forum);
      $('#id_belanja_forum').val(data.id_belanja_forum);
      $('#tahun_forum_belanja').val(data.tahun_forum);
      $('#no_urut_belanja').val(data.no_urut);
      $('#zona_ssh').val(data.id_zona_ssh);
      $('#id_item_ssh').val(data.id_item_ssh);
      $('#rekening_ssh').val();
      $('#ur_item_ssh').val(data.uraian_tarif_ssh);
      $('#id_rekening').val(data.id_rekening_ssh);
      $('#ur_rekening').val(data.kd_rekening +' - '+data.nm_rekening);
      $('#volume1').val(data.volume_1);
      $('#id_satuan1').val(data.id_satuan_1);
      $('#volume2').val(data.volume_2);
      $('#harga_satuan').val(data.harga_satuan);
      $('#jumlah_belanja').val(data.jml_belanja);
      $('#volume1_forum').val(data.volume_1_forum);
      $('#id_satuan1_forum').val(data.id_satuan_1_forum);
      $('#volume2_forum').val(data.volume_2_forum);
      $('#harga_satuan_forum').val(data.harga_satuan_forum);
      $('#jumlah_belanja_forum').val(data.jml_belanja_forum);
      $('#uraian_belanja').val(data.uraian_belanja);
      $('#uraian_aktivitas_asb').val(data.nm_aktivitas_asb);
      $('#id_aktivitas_asb_belanja').val(data.id_aktivitas_asb);
      $('#sumber_belanja').val(data.sumber_belanja);
      $('#id_satuan2').val(data.id_satuan_2);
      $('#id_satuan2_forum').val(data.id_satuan_2_forum);
      $('#sumber_data_belanja').val(data.sumber_data);

      // alert(data.nm_aktivitas_asb);
      // alert(data.uraian_belanja)
      checkAsalbelanja(data.sumber_data);

      $('.chkBelanja').show();
      if(data.status_data==1){
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
          url: './forumskpd/forum/editBelanja',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_belanja_forum' : $('#id_belanja_forum').val(),
              'tahun_forum' : $('#tahun_forum_belanja').val(),
              'no_urut' : $('#no_urut_belanja').val(),
              'id_lokasi_forum' : $('#id_lokasi_belanja').val(),
              'id_zona_ssh' : $('#zona_ssh').val(),
              'id_aktivitas_asb' : $('#id_aktivitas_asb_belanja').val(),
              'id_item_ssh' : $('#id_item_ssh').val(),
              'id_rekening_ssh' : $('#id_rekening').val(),
              'uraian_belanja' : $('#uraian_belanja').val(),
              'volume_1_forum' : $('#volume1_forum').val(),
              'id_satuan_1_forum' : $('#id_satuan1_forum').val(),
              'volume_2_forum' : $('#volume2_forum').val(),
              'id_satuan_2_forum' : $('#id_satuan2_forum').val(),
              'harga_satuan_forum' : $('#harga_satuan_forum').val(),
              'jml_belanja_forum' : $('#jumlah_belanja_forum').val(),
              'status_data' : check_data,

          },
          success: function(data) {
              belanja_renja_tbl.ajax.reload();
              aktivitas_tbl.ajax.reload();
              pelaksana_tbl.ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              } 
          }
      });
  });

$(document).on('click', '.btnHapusBelanja', function() {

  if($('#sumber_data_belanja').val()==4){

  var x = confirm("Anda yakin akan menghapus item belanja "+$('#ur_item_ssh').val()+" ini ?");

  if (x) {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      type: 'post',
      url: './forumskpd/forum/hapusBelanja',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_belanja_forum': $('#id_belanja_forum').val()
      },
      success: function(data) {
        belanja_renja_tbl.ajax.reload();
        aktivitas_tbl.ajax.reload();
        pelaksana_tbl.ajax.reload();
        $('#ModalBelanja').modal('hide');
        createPesan(data.pesan,"info");
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

var CopyBelanjaTbl;
$(document).on('click', '#btnCopyBelanja', function() {
  
  $('#ModalCopyBelanja').modal('show'); 

  CopyBelanjaTbl = $('#tblCopyBelanja').DataTable( {
        processing: true,
        serverSide: true,
        autoWidth : false,
        dom: 'bfrtIp',
        "ajax": {"url": "./forumskpd/forum/getLokasiCopy/"+id_aktivitas_temp},
        "columns": [
              { data: 'urut', sClass: "dt-center"},
              { data: 'uraian_aktivitas_kegiatan'},
              // { data: 'nama_lokasi'},
              { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }

            ],
        "order": [[0, 'asc']],
        "bDestroy": true
    });
});

$(document).on('click', '#btnProsesCopyBelanja', function() {

    var data = CopyBelanjaTbl.row( $(this).parents('tr') ).data();

    $('#ModalCopyBelanja').modal('hide');

    $.ajaxSetup({
      headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      type: 'post',
      url: './forumskpd/forum/getBelanjaCopy',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_aktivitas': data.id_aktivitas_forum,
        'id_aktivitas_new': id_aktivitas_temp,       

      },    
      success: function(data) {
        belanja_renja_tbl.ajax.reload();
        aktivitas_tbl.ajax.reload();
        pelaksana_tbl.ajax.reload();
        createPesan(data.pesan,"success");
      }
    });
});

$(document).on('click', '#btnUnLoadAsb', function() {

  $.ajax({
          type: 'post',
          url: './forumskpd/forum/unloadASB',
          data: {
            '_token': $('input[name=_token]').val(),
            'id_aktivitas_asb': id_asb_temp,
            'id_lokasi_renja': id_aktivitas_temp,
          },
          success: function(data) {
            belanja_renja_tbl.ajax.reload();
            aktivitas_tbl.ajax.reload();
            pelaksana_tbl.ajax.reload();
            if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              } 
          }
        });
});

$(document).on('click', '#btnTambahBelanjaASB', function() {

      $('.btnLoadAsb').addClass('loadBelanja');
      $('.btnLoadAsb').removeClass('unloadBelanja');      
      $('.form-horizontal').show();
      $('.modal-title').text('Load Data Belanja dari ASB');

      $('#id_aktivitas_asb_load').val(id_asb_temp);
      $('#uraian_aktivitas_asb_load').val($('#nm_aktivitas_belanja').text());
      
      $('#v1_load').val(vol1_temp);
      $('#v2_load').val(vol2_temp);
      $('#satuan1_load_asb').text(nm_sat_asb1);
      $('#satuan2_load_asb').text(nm_sat_asb2);

      $('#loadBelanjaASB').modal('show');

});

$(document).on('click', '.btnLoadAsb', function() {
  $.ajax({
         type: 'post',
         url: './forumskpd/forum/getHitungASB',
         data: {
             '_token': $('input[name=_token]').val(),
             'tahun_renja' : tahun_temp,
             'id_lokasi_renja' : id_aktivitas_temp,
             'id_aktivitas_asb' : id_asb_temp,
             'volume_1' : vol1_temp,
             'id_satuan_1' : id_satuan_1_aktiv_temp,
             'volume_2' : vol2_temp,
             'id_satuan_2' : id_satuan_2_aktiv_temp,
         },
         success: function(data) {
           belanja_renja_tbl.ajax.reload();
           aktivitas_tbl.ajax.reload();
           pelaksana_tbl.ajax.reload();
           if(data.status_pesan==1){
             createPesan(data.pesan,"success");
             } else {
             createPesan(data.pesan,"danger"); 
             }
         }
  });
});


});
</script>
@endsection