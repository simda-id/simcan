<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app2')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?php
                $this->title = 'Penyesuaian Anggaran OPD - APBD Pergeseran';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = 'modul3';
                $breadcrumb->begin();
                $breadcrumb->add(['label' => 'APBD']);
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
                    <label class="control-label col-sm-3 text-left" for="id_dokumen_keu">Nomor Dokumen Keuangan :</label>
                        <div class="col-sm-5">
                            <select class="form-control id_dokumen_keu" name="id_dokumen_keu" id="id_dokumen_keu"></select>
                        </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3 text-left" for="cb_unit">Unit Penyusun Renstra :</label>
                        <div class="col-sm-5">
                            <select class="form-control cb_unit" name="cb_unit" id="cb_unit"></select>
                        </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3 text-left" for="cb_sub_unit">Sub Unit Penyusun RKA :</label>
                        <div class="col-sm-5">
                            <select class="form-control cb_sub_unit" name="cb_sub_unit" id="cb_sub_unit"></select>
                        </div>
                </div>
                </form>
                <div class='tabs-x tabs-above tab-bordered tabs-krajee'>
                    <ul class="nav nav-tabs nav-justified" role="tablist">
                      <li class="active"><a href="#program" aria-controls="program" role="tab-kv" data-toggle="tab">Program PD</a></li>
                      <li class="disabled"><a href="#kegiatan" aria-controls="kegiatan" role="tab-kv" data-toggle="tab">Kegiatan PD</a></li>
                      <li class="disabled"><a href="#pelaksana" aria-controls="pelaksana" role="tab-kv" data-toggle="tab">Pelaksana</a></li>
                      <li class="disabled"><a href="#aktivitas" aria-controls="aktivitas" role="tab-kv" data-toggle="tab">Aktivitas</a></li>
                      <li class="disabled"><a href="#lokasi" aria-controls="lokasi" role="tab-kv" data-toggle="tab">Lokasi</a></li>
                      <li class="disabled"><a href="#belanja" aria-controls="belanja" role="tab-kv" data-toggle="tab">Rincian Belanja</a></li>
                    </ul>
                    
                    <div class="tab-content">
                    <br>
                    <div role="tabpanel" class="tab-pane fade in active" id="program">
                                <div class="col-md-12">
                                    <table id="tblProgram" class="table table-striped table-bordered table-responsive compact" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" width='5px' style="text-align: center; vertical-align:middle">No Urut</th>
                                                <th rowspan="2" style="text-align: center; vertical-align:middle">Nama Program Perangkat Daerah</th>
                                                <th colspan="3" width='45%' style="text-align: center; vertical-align:middle">Rekapitulasi Pagu</th>
                                                <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">Status</th>
                                                <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">Aksi</th>
                                            </tr>
                                            <tr>
                                              <th width='15%' style="text-align: center; vertical-align:middle">Pendapatan</th>
                                              <th width='15%' style="text-align: center; vertical-align:middle">Belanja</th>
                                              <th width='15%' style="text-align: center; vertical-align:middle">Pembiayaan</th>
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
                                          <td width="20%%" style="text-align: left; vertical-align:top;">Program Perangkat Daerah</td>
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
                                                <th rowspan="2" style="text-align: center; vertical-align:middle">Nama Kegiatan Perangkat Daerah</th>
                                                <th colspan="2" width='20%' style="text-align: center; vertical-align:middle">Pagu Kegiatan</th>
                                                <th colspan="2" width='25%' style="text-align: center; vertical-align:middle">Aktivitas</th>
                                                <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">Status</th>
                                                <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">Aksi</th>
                                            </tr>
                                            <tr>
                                                <th width='10%' style="text-align: center; vertical-align:middle">PPAS</th>
                                                <th width='10%' style="text-align: center; vertical-align:middle">APBD</th>
                                                <th width='5%' style="text-align: center; vertical-align:middle">Jumlah</th>
                                                <th width='10%' style="text-align: center; vertical-align:middle">Pagu Aktivitas</th>
                                            </tr>
                                        </thead>
                                        <tbody>                                        
                                        </tbody>
                                    </table>   
                                </div>
                                <div role="tabpanel" class="tab-pane fade in" id="pelaksana">
                                  <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
                                  <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                      <tbody>
                                        <tr>
                                          <td width="20%" style="text-align: left; vertical-align:top;">Program Perangkat Daerah</td>
                                          <td style="text-align: left; vertical-align:top;"><label class="backRenja" id="nm_progrenja_pelaksana" align='left'></label></td>
                                        </tr>
                                        <tr>
                                          <td width="20%" style="text-align: left; vertical-align:top;">Kegiatan Perangkat Daerah</td>
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
                                          <td width="20%" style="text-align: left; vertical-align:top;">Program Perangkat Daerah</td>
                                          <td style="text-align: left; vertical-align:top;"><label class="backRenja" id="nm_progrenja_aktivitas" align='left'></label></td>
                                        </tr>
                                        <tr>
                                          <td width="20%" style="text-align: left; vertical-align:top;">Kegiatan Perangkat Daerah</td>
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
                                          <td width="20%" style="text-align: left; vertical-align:top;">Program Perangkat Daerah</td>
                                          <td style="text-align: left; vertical-align:top;"><label class="backRenja" id="nm_progrenja_lokasi" align='left'></label></td>
                                        </tr>
                                        <tr>
                                          <td width="20%" style="text-align: left; vertical-align:top;">Kegiatan Perangkat Daerah</td>
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
                                                <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">No Urut</th>
                                                <th rowspan="2" width='20%' style="text-align: center; vertical-align:middle">Sumber Usulan</th>
                                                <th rowspan="2" style="text-align: center; vertical-align:middle">Nama Lokasi</th>
                                                <th colspan="2" width='10%' style="text-align: center; vertical-align:middle">Volume</th>
                                                <th rowspan="2" width='10%' style="text-align: center; vertical-align:middle">Status</th>
                                                <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">Aksi</th>
                                            </tr>
                                            <tr>
                                                <th style="text-align: center; vertical-align:middle">1</th>
                                                <th style="text-align: center; vertical-align:middle">2</th>
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
                                          <td width="20%" style="text-align: left; vertical-align:top;">Program Perangkat Daerah</td>
                                          <td style="text-align: left; vertical-align:top;"><label class="backRenja" id="nm_progrenja_belanja" align='left'></label></td>
                                        </tr>
                                        <tr>
                                          <td width="20%" style="text-align: left; vertical-align:top;">Kegiatan Perangkat Daerah</td>
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
                                      </tbody>
                                    </table>
                                  </div>
                                  </form>
                                    <table id="tblBelanja" class="table table-striped table-bordered table-responsive compact" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" width='50px' style="text-align: center; vertical-align:middle">No Urut</th>
                                                <th rowspan="2" style="text-align: center; vertical-align:middle">Item Belanja</th>
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

  @include('apbd1.program_pd')
  @include('apbd1.program_indikator_pd')
  @include('apbd1.kegiatan_pd')
  @include('apbd1.kegiatan_indikator_pd')
  @include('apbd1.pelaksana_pd')
  @include('apbd1.aktivitas_pd')
  @include('apbd1.lokasi_pd')
  @include('apbd1.belanja_pd')

  @include('apbd1.cariProgramRenstra')
  @include('apbd1.cariKegiatanRenstra')
  @include('apbd1.cariProgramRef')
  @include('apbd1.cariKegiatanRef')
  @include('apbd1.cariIndikator')
  @include('apbd1.cariSubUnit')
  @include('apbd1.cariAktivitasASB')
  @include('apbd1.cariLokasiModal')
  @include('apbd1.cariLokasiTeknisModal')
  @include('apbd1.cariItemSSH')
  @include('apbd1.cariRekening')
  @include('apbd1.ModalCopyBelanja')
  @include('apbd1.loadBelanjaASB')

@endsection

@section('scripts')
  <script src="{{ asset('/protected/resources/views/apbd1/js/js_pagu_pd.js')}}"></script>
@endsection