<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?php
                $this->title = 'Rancangan Renja x';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = '/';
                $breadcrumb->begin();
                $breadcrumb->add(['url' => '/modul2','label' => 'Renja Perangkat Daerah']);
                $breadcrumb->add(['url' => '/renja', 'label' => 'Rancangan Renja']);
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
                        <div class="col-sm-2">                            
                            <input class="form-control text-center" type="text" id="tahun_rkpd" name="tahun_rkpd" value="{{Session::get('tahun')}}" style="text-align: center; vertical-align:middle" disabled>
                        </div>
                        <div class="btn-group">
                                <button type="button" class="btn btn-success dropdown-toggle btn-labeled" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown"><span class="btn-label"><i class="fa fa-print fa-fw fa-lg"></i></span>Pencetakan Penyesuaian Renja <span class="caret"></span></button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a class="dropdown-item btnPrintKompilasiProgramdanPagu dropdown-item"><i class="fa fa-bullseye fa-fw fa-lg" aria-hidden="true"></i> Kompilasi Program dan Pagu</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item btnPrintKompilasiKegiatandanPaguRenja dropdown-item"><i class="fa fa-male fa-fw fa-lg" aria-hidden="true"></i> Kompilasi Kegiatan dan Pagu</a>
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
                    <ul class="nav nav-tabs nav-justified" role="tablist">
                      <li class="active">
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
                        <a href="#belanja" aria-controls="belanja" role="tab-kv" data-toggle="tab">Rincian Belanja</a>
                      </li>
                    </ul>
                    
                    <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="programrenja">
                                    <br>
                                      <div id="divTambahProg" class="hidden">
                                        <p><a id="btnTambahProg" class="add-programrenja btn btn-labeled btn-success"><span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span> Tambah Program</a></p>
                                      </div>
                                    <div class="col-md-12">
                                    {{-- <div class="table-responsive"> --}}
                                    <table id="tblProgramRenja" class="table display table-striped compact table-bordered table-responsive">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" width='3%' style="text-align: center; vertical-align:middle"></th>
                                                <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">No Urut</th>
                                                <th rowspan="2" style="text-align: center; vertical-align:middle">Nama Program Renja</th>
                                                <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">Jumlah Indikator</th>
                                                <th colspan="3" width='15%' style="text-align: center; vertical-align:middle">Jumlah Kegiatan</th>
                                                <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">Status</th>
                                                <th rowspan="2" width='10%' style="text-align: center; vertical-align:middle">Aksi</th>
                                            </tr>
                                            <tr>
                                                <th width="50px" style="text-align: center; vertical-align:middle">Jml</th>
                                                <th width="50px" style="text-align: center; vertical-align:middle">Reviu</th>
                                                <th width='150px' style="text-align: center; vertical-align:middle">Pagu</th>
                                            </tr>
                                        </thead>
                                        <tbody>                                        
                                        </tbody>
                                    </table> 
                                    {{-- </div> --}}
                                    </div>  
                                </div>
                            <div role="tabpanel" class="tab-pane fade in" id="kegiatanrenja">
                                <br>
                                  <div id="divTambahKegiatan" class="hidden">
                                    <p><a id="btnTambahKegiatan" class="add-kegiatan btn btn-labeled btn-success"><span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Kegiatan</a></p>
                                  </div>
                                  <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
                                  <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                      <tbody>
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
                                    {{-- <div class="table-responsive"> --}}
                                    <table id="tblKegiatanRenja" class="table display table-striped compact table-bordered table-responsive" width="100%">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" width='3%' style="text-align: center; vertical-align:middle"></th>
                                                <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">No Urut</th>
                                                <th rowspan="2" style="text-align: center; vertical-align:middle">Nama Kegiatan Renja</th>
                                                <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">Jumlah Indikator</th>
                                                <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">Jumlah Pelaksana</th>
                                                <th colspan="2" width='10%' style="text-align: center; vertical-align:middle">Jumlah Pagu</th>
                                                <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">Status</th>
                                                <th rowspan="2" width='10%' style="text-align: center; vertical-align:middle">Aksi</th>
                                            </tr>
                                            <tr>
                                                {{-- <th width="5%" style="text-align: center; vertical-align:middle">Jml</th>
                                                <th width="5%" style="text-align: center; vertical-align:middle">Reviu</th> --}}
                                                <th width="5%" style="text-align: center; vertical-align:middle">Kegiatan</th>
                                                <th width="5%" style="text-align: center; vertical-align:middle">Aktivitas</th>

                                            </tr>
                                        </thead>
                                        <tbody>                                        
                                        </tbody>
                                    </table>   
                                {{-- </div> --}}
                              </div>

                              <div role="tabpanel" class="tab-pane fade in" id="pelaksanarenja">
                                <br>
                                  <div id="divTambahPelaksana" class="hidden">
                                    <button id="btnTambahPelaksana" type="button" class="add-pelaksana btn btn-labeled btn-success">
                                      <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Pelaksana</button>
                                  </div>
                                  <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
                                  <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                      <tbody>
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
                                  {{-- <div class="table-responsive"> --}}
                                    <table id="tblPelaksanaRenja" class="table display table-striped compact table-bordered table-responsive" width="100%">
                                        <thead>
                                            <tr>
                                                <th width='5%' style="text-align: center; vertical-align:middle">No Urut</th>
                                                <th style="text-align: center; vertical-align:middle">Nama Sub Unit Pelaksana</th>
                                                <th width='10%' style="text-align: center; vertical-align:middle">Jumlah Pagu</th>
                                                <th  width='10%' style="text-align: center; vertical-align:middle">Jumlah Aktivitas</th>
                                                <th width='10%' style="text-align: center; vertical-align:middle">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>                                        
                                        </tbody>
                                    </table>   
                                {{-- </div>                                      --}}
                                </div>
                            <div role="tabpanel" class="tab-pane fade in" id="aktivitasrenja">
                                <br>
                                  <div id="divTambahAktivitas" class="hidden">
                                    <button id="btnTambahAktivitas" type="button" class="add-aktivitas btn btn-labeled btn-success">
                                      <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Aktivitas</button>
                                  </div>            
                                  <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
                                  <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                      <tbody>
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
                                  {{-- <div class="table-responsive"> --}}
                                    <table id="tblAktivitasRenja" class="table display table-striped compact table-bordered table-responsive" width="100%">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">Lokasi</th>
                                                <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">No Urut</th>
                                                <th rowspan="2" style="text-align: center; vertical-align:middle">Nama Aktivitas</th>
                                                <th colspan="2" width='10%' style="text-align: center; vertical-align:middle">Pagu Aktivitas</th>
                                                <th rowspan="2" width='10%' style="text-align: center; vertical-align:middle">Pagu Belanja</th>
                                                <th colspan="2" width='10%' style="text-align: center; vertical-align:middle">Volume</th>
                                                {{-- <th colspan="2" width='10%' style="text-align: center; vertical-align:middle">Musrenbang</th> --}}
                                                <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">Status</th>
                                                <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">Aksi</th>
                                            </tr>
                                            <tr>
                                                <th width='7%' style="text-align: center; vertical-align:middle">Ranwal</th>
                                                {{-- <th width='3%' style="text-align: center; vertical-align:middle">%</th> --}}
                                                <th width='7%' style="text-align: center; vertical-align:middle">Rancangan</th>
                                                <th width='5%' style="text-align: center; vertical-align:middle">Vol 1</th>
                                                <th width='5%' style="text-align: center; vertical-align:middle">Vol 2</th>
                                            </tr>
                                        </thead>
                                        <tbody>                                        
                                        </tbody>
                                    </table>   
                                {{-- </div>   --}}
                                </div>
                            <div role="tabpanel" class="tab-pane fade in" id="belanja">
                              <br>
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
                                                {{-- <th rowspan="2" width='10%' style="text-align: center; vertical-align:middle">Kode Rekening</th> --}}
                                                <th colspan="2" width='10%' style="text-align: center; vertical-align:middle">Volume</th>
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

<script id="details-inProg" type="text/x-handlebars-template">
        <table class="table table-striped display table-bordered table-responsive compact details-table" id="inProg-@{{id_renja_program}}">
            <thead>
              <tr>
                <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                <th style="text-align: center; vertical-align:middle">Uraian Indikator</th>
                <th width="5%" style="text-align: center; vertical-align:middle">Target Renstra</th>
                <th width="5%" style="text-align: center; vertical-align:middle">Target Renja</th>
                {{-- <th width="50px" style="text-align: center; vertical-align:middle">Status</th> --}}
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
                {{-- <th width="50px" style="text-align: center; vertical-align:middle">Status</th> --}}
                <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
              </tr>
            </thead>
            <tbody></tbody>
        </table>
</script>

<script id="details-lokasi" type="text/x-handlebars-template">
        <table class="table table-striped display table-bordered table-responsive compact details-table" id="inLok-@{{id_aktivitas_renja}}">
            <thead>
                <tr>
                    <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">No Urut</th>
                    <th rowspan="2" style="text-align: center; vertical-align:middle">Nama Kecamatan</th>
                    <th rowspan="2" style="text-align: center; vertical-align:middle">Nama Lokasi</th>
                    <th colspan="2" width='10%' style="text-align: center; vertical-align:middle">Volume</th>
                    <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">Aksi</th>
                </tr>
                <tr>
                    <th width='5%' style="text-align: center; vertical-align:middle">Vol 1</th>
                    <th width='5%' style="text-align: center; vertical-align:middle">Vol 2</th>
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
                    <span class="btn btn-primary btnCariProgramRenstra hidden" id="btnCariProgramRenstra" name="btnCariProgramRenstra"><i class="fa fa-search fa-fw fa-lg"></i></span>
                  </div>
                  <div class="form-group urProgramRef">
                    <label class="control-label col-sm-3" for="title">Uraian Program Referensi:</label>
                    <div class="col-sm-8">
                      <textarea type="name" class="form-control" id="ur_program_ref" rows="3" disabled></textarea>
                    </div>                    
                    <input type="hidden" id="id_program_ref" name="id_program_ref">
                    <span class="btn btn-primary btnCariProgramRef hidden" id="btnCariProgramRef" name="btnCariProgramRef"><i class="fa fa-search fa-fw fa-lg"></i></span>
                  </div>
                  <div class="form-group">
                  <label class="control-label col-sm-3" for="title">Uraian Program Renja:</label>
                  <div class="col-sm-8">
                    <textarea type="name" class="form-control ur_program_renja" name="ur_program_renja" id="ur_program_renja" rows="3" disabled></textarea>
                  </div>
                </div>
                <div class="form-group idStatusPelaksanaan hidden" id="idStatus">
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
                <div class="form-group KetPelaksanaan hidden">
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
                        {{-- <button type="button" class="btn btn-danger btnHapus btn-labeled">
                            <span class="btn-label"><i class="fa fa-trash fa-fw fa-lg"></i></span>Hapus</button> --}}
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
                <div class="col-sm-3 chkIndikator hidden">
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
                <span class="btn btn-primary btnCariIndi hidden" id="btnCariIndi" name="btnCariIndi"><i class="fa fa-search fa-fw fa-lg"></i></span>
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
                  <input type="text" class="form-control number" id="target_indikator_renstra" name="target_indikator_renstra" style="text-align: right; vertical-align:middle" disabled >
                </div>
                <label for="target_indikator_renja" class="col-sm-3 control-label" align='left'>Target Capaian Menurut Renja :</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control number" id="target_indikator_renja" name="target_indikator_renja" style="text-align: right; vertical-align:middle" disabled>
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
                    <span class="btn btn-primary btnCariKegiatanRenstra hidden" id="btnCariKegiatanRenstra" name="btnCariKegiatanRenstra" disabled><i class="fa fa-search fa-fw fa-lg"></i></span>
                  </div>
                  <div class="form-group urKegiatanRef">
                    <label class="control-label col-sm-3" for="title">Uraian Kegiatan Referensi:</label>
                    <div class="col-sm-8">
                      <textarea type="name" class="form-control" id="ur_kegiatan_ref" rows="3" disabled></textarea>
                    </div>                    
                    <input type="hidden" id="id_kegiatan_ref" name="id_kegiatan_ref">
                    <span class="btn btn-primary btnCariKegiatanRef hidden" id="btnCariKegiatanRef" name="btnCariKegiatanRef" disabled><i class="fa fa-search fa-fw fa-lg"></i></span>
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
                              <td style="text-align: center; vertical-align:middle;"><input type="text" class="form-control number" id="pagu_renstra" name="pagu_renstra" style="text-align: right; vertical-align:middle" disabled ></td>
                          
                              <td style="text-align: center; vertical-align:middle;"><input type="text" class="form-control number" id="pagu_renja_kegiatan" name="pagu_renja_kegiatan" style="text-align: right; vertical-align:middle" disabled></td>
                          
                              <td style="text-align: center; vertical-align:middle;"><input type="text" class="form-control number" id="pagu_selanjutnya" name="pagu_selanjutnya" style="text-align: right; vertical-align:middle" disabled></td>
                          </tr>
                        </tbody>
                    </table>
                </div>
                </div>
                <div class="form-group idStatusPelaksanaan_keg hidden" id="idStatus_keg">
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
                <div class="form-group KetPelaksanaan_keg hidden">
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
                        {{-- <button type="button" id="btnHapusKeg" class="btn btn-danger btnHapusKeg btn-labeled">
                            <span class="btn-label"><i class="fa fa-trash fa-fw fa-lg"></i></span>Hapus</button> --}}
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" id="btnKegiatan" class="btn btn-success btnKegiatan btn-labeled" data-dismiss="modal">
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
                <div class="col-sm-3 chkIndikatorKeg hidden">
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
                <span class="btn btn-primary btnCariIndiKeg hidden" id="btnCariIndiKeg" name="btnCariIndiKeg" disabled><i class="fa fa-search fa-fw fa-lg"></i></span>
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
                  <input type="text" class="form-control number" id="target_indikatorKeg_renstra" name="target_indikatorKeg_renstra" style="text-align: right; vertical-align:middle" disabled >
                </div>
                <label for="target_indikatorKeg_renja" class="col-sm-3 control-label" align='left'>Target Capaian Menurut Renja :</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control number" id="target_indikatorKeg_renja" name="target_indikatorKeg_renja" style="text-align: right; vertical-align:middle" disabled>
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

<div id="ModalAktivitas" class="modal fade" role="dialog" data-backdrop="static">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
                <p><h4 class="modal-title" style="text-align: center;"></h4></p>
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
                    <input type="text" class="form-control number" name="no_urut_aktivitas" id="no_urut_aktivitas" disabled>
                  </div>
                  <div class="col-sm-3 chkAktivitas hidden">
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
                    <input type="hidden" id="id_aktivitas_asb" name="id_aktivitas_asb" disabled>
                    <span class="btn btn-primary btnCariASB hidden" id="btnCariASB" name="btnCariASB"><i class="fa fa-search fa-fw fa-lg"></i></span>
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
                    <div class="col-sm-6">
                        <select type="text" class="form-control sumber_dana" id="sumber_dana" name="sumber_dana" disabled></select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3" for="title">Pagu Aktivitas :</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control number" id="pagu_aktivitas" name="pagu_aktivitas" style="text-align: right; vertical-align:top;" disabled>
                    </div>
                </div>
                <div id="divMusren1" class="form-group rbJenisPembahasan" disabled> 
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
                <div id="divMusren2" class="form-group inMusrenbang" >
                  <label for="pagu_musren_aktivitas" class="col-sm-3 control-label" align='left'>Pagu Musrenbang :</label>
                  <div class="col-sm-2">
                  <div class="input-group">
                    <input type="text" class="form-control number" id="persen_musren_aktivitas" name="persen_musren_aktivitas" disabled>
                    <span class="input-group-addon" text-align="center"><strong>%</strong></span>
                  </div>
                  </div>
                  <div class="col-sm-4">
                    <input type="text" class="form-control number" id="pagu_musren_aktivitas" name="pagu_musren_aktivitas" style="text-align: right; vertical-align:top;" disabled >
                  </div>
                </div>
                <div id="divMusren" class="form-group">
                <div class="col-sm-12">
                    <table class="table table-bordered table-condensed">
                        <thead style="background-color: #428bca; color: #fff">
                          <tr>
                            <td width="5%" style="text-align: center; vertical-align:middle;">Nomor</td>
                            <td width="25%" style="text-align: center; vertical-align:middle;">Volume</td>
                            <td width="25%" style="text-align: center; vertical-align:middle;">Satuan</td>
                            <td width="15%" style="text-align: center; vertical-align:middle;">Satuan Musrenbang</td>
                            <td width="30%" style="text-align: center; vertical-align:middle;">Harga Satuan Rata-rata</td>
                          </tr>
                        </thead>
                        <tbody style="background-color: #fff">
                          <tr>
                              <td width="5%" style="text-align: center; vertical-align:top;">
                                <label class="control-label" style="text-align: center; vertical-align:top;">1</label>
                              </td>
                              <td width="25%" style="text-align: center; vertical-align:top;">
                                <input type="text" class="form-control number" id="volume_1" name="volume_1" style="text-align: right; vertical-align:top;" disabled>
                              </td>                          
                              <td width="25%" style="text-align: center; vertical-align:top;">
                                <select type="text" class="form-control" id="id_satuan_1" name="id_satuan_1" disabled></select>   
                              </td>
                              <td width="15%" style="text-align: center; vertical-align:top;" disabled>
                                <label class="radio">
                                  <input type="radio" class="id_satuan_publik" name="id_satuan_publik" id="id_satuan_publik" value="0">
                                </label>   
                              </td>
                              <td width="30%" style="text-align: center; vertical-align: middle;">
                                <input type="hidden" class="form-control number" id="pagu_asb" name="pagu_asb" style="text-align: right; vertical-align:top;" disabled>
                              </td>
                          </tr>
                          <tr>
                              <td width="5%" style="text-align: center; vertical-align:top;">
                                <label class="control-label" style="text-align: center; vertical-align:top;">2</label>
                              </td>
                              <td width="25%" style="text-align: center; vertical-align:top;">
                                <input type="text" class="form-control number" id="volume_2" name="volume_2" style="text-align: right; vertical-align:top;" disabled>
                              </td>                          
                              <td width="25%" style="text-align: center; vertical-align:top;">
                                <select type="text" class="form-control" id="id_satuan_2" name="id_satuan_2" disabled></select>  
                              </td>
                              <td width="15%" style="text-align: center; vertical-align:top;">
                                <label class="radio">
                                  <input type="radio" class="id_satuan_publik" name="id_satuan_publik" id="id_satuan_publik" value="1">
                                </label>   
                              </td>
                              <td width="30%" style="text-align: center; vertical-align: middle;">
                                <input type="text" class="form-control number" id="pagu_rata2_asb" name="pagu_rata2_asb"  style="text-align: right; vertical-align:top;" disabled>
                              </td>
                          </tr>
                        </tbody>
                    </table>
                </div>
                </div>
              </form>
            </div>
              <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idHapusAktivitas">
                        {{-- <button type="button" id="btnHapusAktivitas" class="btn btn-danger btnHapusAktivitas btn-labeled">
                            <span class="btn-label"><i class="fa fa-trash-o fa-fw fa-lg"></i></span>Hapus</button> --}}
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" id="btnAktivitas" class="btn btn-success btnAktivitas btn-labeled" data-dismiss="modal">
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

<div id="ModalPelaksana" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
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
                <input type="text" class="form-control number" id="no_urut_pelaksana" disabled="">
              </div>
              <div class="col-sm-3 chkPelaksana hidden">
                    <label class="checkbox-inline">
                    <input class="checkPelaksana" type="checkbox" name="checkPelaksana" id="checkPelaksana" value="1"> Telah Direviu</label>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="title">Sub Unit Pelaksana :</label>
              <div class="col-sm-8">
                <input type="name" class="form-control" id="subunit_pelaksana" rows="2"  disabled="">
              <div class="input-group hidden">
                <input type="hidden" id="id_subunit_pelaksana" name="id_subunit_pelaksana">                
                <div class="input-group-btn">
                <btn class="btn btn-primary btnCariSubUnit" id="btnCariSubUnit" name="btnCariSubUnit"><i class="fa fa-search fa-fw fa-lg"></i></btn>
                </div>
              </div>
              </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-3" for="title">Lokasi Penyelenggaraan:</label>
                <div class="col-sm-8">
                  <input type="name" class="form-control" id="nm_lokasi_penyelenggara" rows="2"  disabled="">
                  <div class="input-group hidden">
                    <input type="hidden" id="id_lokasi_pelaksana" name="id_lokasi_pelaksana">                    
                    <div class="input-group-btn">
                      <btn class="btn btn-primary btnCariLokasi" id="btnCariLokasi" name="btnCariLokasi"><i class="fa fa-search fa-fw fa-lg"></i></btn>
                    </div>
                  </div>
                </div>
            </div>
          </form>
        </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idHapusPelaksana">
                        <button type="button" id="btnHapusPelaksana" class="btn  btn-danger btnHapusPelaksana btn-labeled">
                            <span class="btn-label"><i class="fa fa-trash-o fa-fw fa-lg"></i></span>Hapus</button>
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" id="btnPelaksana" class="btn  btn-success btnPelaksana btn-labeled" data-dismiss="modal">
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
                      <btn class="btn btn-primary btnCariLokasi" id="btnCariLokasi" name="btnCariLokasi"><i class="fa fa-search fa-fw fa-lg"></i></btn>
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
                <label class="control-label col-sm-3" for="volume_1_lok">Volume Pemicu Biaya 1 :</label>
                <div class="col-sm-4">
                  <div class="input-group">
                      <input type="text" class="form-control number" id="volume_1_lok" name="volume_1_lok">
                      <input type="hidden" class="form-control number" id="id_satuan_1_lok" name="id_satuan_1_lok">
                      <span class="input-group-addon" id="satuan1_load"></span>
                  </div>
                </div>
                </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="volume_2_lok">Volume Pemicu Biaya 2 :</label>
                <div class="col-sm-4">
                  <div class="input-group">
                      <input type="text" class="form-control number" id="volume_2_lok" name="volume_2_lok">
                      <input type="hidden" class="form-control number" id="id_satuan_2_lok" name="id_satuan_2_lok">
                      <span class="input-group-addon" id="satuan2_load"></span>
                  </div>
                </div>
              </div>
          </form>
        </div>
              <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusLokasi">
                        <button type="button" class="btn btn-danger btnHapusLokasi btn-labeled">
                            <span class="btn-label"><i class="fa fa-trash-o fa-fw fa-lg"></i></span>Hapus</button>
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-success btnLokasi btn-labeled" data-dismiss="modal">
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
                  <div class="col-sm-3 chkBelanja hidden">
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
                    <input type="hidden" class="form-control" id="id_item_ssh" name="id_item_ssh" disabled="">
                    <input type="hidden" class="form-control" id="rekening_ssh" name="rekening_ssh" disabled="">
                    <div class="input-group">
                    <input type="text" class="form-control" id="ur_item_ssh" name="ur_item_ssh" disabled="">
                     <div class="input-group-btn">
                      <button class="btn btn-primary btnCariSSH" id="btnCariSSH" name="btnCariSSH" data-toggle="modal" href="#"><i class="fa fa-search fa-fw fa-lg"></i></button>
                    </div>
                  </div>
                  </div>
                </div>
                <div class="form-group"> 
                  <label for="id_rekening" class="col-sm-3 control-label" align='left'>Kode Rekening :</label>                 
                  <div class="col-sm-8">
                    <input type="hidden" class="form-control" id="id_rekening" name="id_rekening" disabled="">
                    <div class="input-group">
                      <input type="text" class="form-control" id="ur_rekening" name="ur_rekening" disabled="">
                      <div class="input-group-btn">
                        <button class="btn btn-primary btnCariRekening" id="btnCariRekening" name="btnCariRekening" data-toggle="modal" href="#"><i class="fa fa-search fa-fw fa-lg"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                <div class="col-sm-12">
                    <table class="table table-striped compact table-bordered table-responsive">
                        <thead>
                          <tr>
                            <td width="25%" style="text-align: center; vertical-align:top;">Volume 1</td>
                            <td width="25%" style="text-align: center; vertical-align:top;">Volume 2</td>
                            <td width="25%" style="text-align: center; vertical-align:top;">Harga Satuan</td>
                            <td width="25%" style="text-align: center; vertical-align:top;">Jumlah Total</td>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <td width="25%" style="text-align: left; vertical-align:top;">
                                <input type="text" class="form-control number" id="volume1" name="volume1">
                              </td>
                          
                              <td width="25%" style="text-align: left; vertical-align:top;">
                                <input type="text" class="form-control number" id="volume2" name="volume2">
                              </td>
                          
                              <td rowspan="2" width="25%" style="text-align: right; vertical-align:top;"><input type="text" class="form-control number" id="harga_satuan" name="harga_satuan" style="text-align: right; vertical-align:top;" disabled></td>

                              <td rowspan="2" width="25%" style="text-align: right; vertical-align:top;"><input type="text" class="form-control number" id="jumlah_belanja" name="jumlah_belanja" style="text-align: right; vertical-align:top;" disabled></td>
                          </tr>
                          <tr>
                              <td width="25%" style="text-align: left; vertical-align:top;">
                                  <select type="text" class="form-control" id="id_satuan1" name="id_satuan1"></select>
                              </td>
                          
                              <td width="25%" style="text-align: left; vertical-align:top;">
                                  <select type="text" class="form-control" id="id_satuan2" name="id_satuan2"></select> 
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
                        <button type="button" class="btn btn-danger btnHapusBelanja btn-labeled">
                            <span class="btn-label"><i class="fa fa-trash-o fa-fw fa-lg"></i></span>Hapus</button>
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-success btnBelanja btn-labeled" data-dismiss="modal">
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

<div id="StatusAktivitas" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
            <h4 style="text-align: center;">Perubahan Status Aktivitas Kegiatan Renja</h4>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id_aktivitas_renja_posting" name="id_aktivitas_renja_posting">
            <input type="hidden" id="status_aktivitas_renja_posting" name="status_aktivitas_renja_posting">
            <input type="hidden" id="tahun_aktivitas_renja_posting" name="tahun_aktivitas_renja_posting">
            <input type="hidden" id="jml_belanja_posting" name="jml_belanja_posting">
            <input type="hidden" id="jml_pagu_posting" name="jml_pagu_posting">            

            <div class="alert alert-success">
                <div>
                  <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border text-info"  aria-hidden="true"></i>
                  <p>Yakin akan melakukan proses <strong><i><span id="ur_aktivitas_status_posting"></span></i></strong> pada aktivitas : <strong><span id="ur_aktivitas_renja_posting"></span></strong> ?</p>
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
                        <button type="button" id="btnPostAktivitas" class="btn btn-success btn-labeled" data-dismiss="modal">
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
                        <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
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
                        <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
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
                    <ul class="nav nav-tabs" role="tablist">
                      <li class="active"><a href="#wilayah" aria-controls="wilayah" role="tab" data-toggle="tab">Lokasi Kewilayahan</a></li>
                      <li><a href="#teknis" aria-controls="teknis" role="tab-kv" data-toggle="tab">Lokasi Teknis</a></li>
                      <li><a href="#luardaerah" aria-controls="luar" role="tab-kv" data-toggle="tab">Lokasi Lainnya</a></li>
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
                        <div role="tabpanel" class="tab-pane fade in" id="teknis">
                        <br>
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
                        <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
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
                        <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
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
                  <th width="15%" style="text-align: center; vertical-align:middle">Sub Sub Kelompok</th>
                  <th width="30%" style="text-align: center; vertical-align:middle">Item SSH</th>
                  <th width="25%" style="text-align: center; vertical-align:middle">Merk/Spesifikasi/Keterangan Lainnya</th>
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
            <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                <span class="btn-label"><i class="fa fa-sign-out fa-fw fa-lg"></i></span>Tutup</button>
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

  <!--Modal CopyDataASB -->
  <div id="ModalCopyBelanja" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"> Copy Data Belanja dari Aktivitas Lain</h4>
        </div>
      <div class="modal-body">
          <form name="frmModalCopyBelanja" class="form-horizontal" role="form" autocomplete='off' action="" method="">
              <div class="form-group">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="col-sm-12">
                <table id='tblCopyBelanja' class="table display compact table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                          <tr>
                            <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                            <th style="text-align: center; vertical-align:middle">Nama Aktivitas</th>
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

<div id="ModalProgress" class="modal fade modal-static" role="dialog" data-backdrop="static" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <div class="text-center">
            <h4><strong>Sedang proses...</strong></h4>
            <i class="fa fa-spinner fa-pulse fa-5x fa-fw text-primary"></i>
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
var detLokasi = Handlebars.compile($("#details-lokasi").html());

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

var prog_rpjmd, prog_rkpd, prog_renja, prog_renstra;
var keg_renja, keg_renstra, id_ranwal_temp, id_renja_program_temp;
var tahun_temp, unit_temp, id_program_renstra_temp, id_renja_temp, id_renja_ranwal_temp;
var tblInKeg, tblKegRenja, id_lokasi_temp, nm_sub_temp, nm_lokasi;
var id_asb_temp, ur_asb_temp;

$('#target_indikator_renstra').number(true,2,',', '.');
$('#target_indikator_renja').number(true,2,',', '.');
$('#pagu_renstra').number(true,2,',', '.');
$('#pagu_renja_kegiatan').number(true,2,',', '.');
$('#pagu_selanjutnya').number(true,2,',', '.');
$('#target_indikatorKeg_renstra').number(true,2,',', '.');
$('#target_indikatorKeg_renja').number(true,2,',', '.');
$('#volume_1').number(true,2,',', '.');
$('#volume_2').number(true,2,',', '.');
$('#pagu_aktivitas').number(true,2,',', '.');
$('#pagu_asb').number(true,2,',', '.');
$('#pagu_rata2_asb').number(true,2,',', '.');
$('#pagu_musren_aktivitas').number(true,2,',', '.');

$('#volume1').number(true,2,',', '.');
$('#volume2').number(true,2,',', '.');
$('#harga_satuan').number(true,2,',', '.');
$('#jumlah_belanja').number(true,2,',', '.');
$('#v1_load').number(true,2,',', '.');
$('#v2_load').number(true,2,',', '.');
$('#volume_1_lok').number(true,2,',', '.');
$('#volume_2_lok').number(true,2,',', '.');

$('#no_urut_program').number(true,0,',', '.');
$('#no_urut_indikator').number(true,0,',', '.');
$('#no_urut_kegiatan').number(true,0,',', '.');
$('#no_urut_indikatorKeg').number(true,0,',', '.');
$('#no_urut_aktivitas').number(true,0,'', '');
$('#no_urut_pelaksana').number(true,0,'', '');
$('#no_urut_lokasi').number(true,0,'', '');


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
          url: '../admin/parameter/getSumberDana',
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
          url: '../admin/parameter/getZonaSSH',
          dataType: "json",
          success: function(data) {

          var j = data.length;
          var post, i;

          $('select[name="zona_ssh"]').empty();
          $('select[name="zona_ssh"]').append('<option value="0">---Pilih Zona Wilayah---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="zona_ssh"]').append('<option value="'+ post.id_zona +'">'+ post.keterangan_zona +'</option>');
          }
          }
      });

$.ajax({
          type: "GET",
          url: '../admin/parameter/getRefSatuan',
          dataType: "json",
          success: function(data) {

          var j = data.length;
          var post, i;

          $('select[name="id_satuan_1"]').empty();
          $('select[name="id_satuan_1"]').append('<option value="-1">---Pilih Satuan---</option>');

          $('select[name="id_satuan_2"]').empty();
          $('select[name="id_satuan_2"]').append('<option value="-1">---Pilih Satuan---</option>');
          $('select[name="id_satuan_2"]').append('<option value="0">-- N/A --</option>');

          $('select[name="id_satuan1"]').empty();
          $('select[name="id_satuan1"]').append('<option value="-1">---Pilih Satuan---</option>');

          $('select[name="id_satuan2"]').empty();
          $('select[name="id_satuan2"]').append('<option value="-1">---Pilih Satuan---</option>');
          $('select[name="id_satuan2"]').append('<option value="0">-- N/A --</option>');

          for (i = 0; i < j; i++) {
              post = data[i];
              $('select[name="id_satuan_1"]').append('<option value="'+ post.id_satuan +'">'+ post.uraian_satuan +'</option>');
              $('select[name="id_satuan_2"]').append('<option value="'+ post.id_satuan +'">'+ post.uraian_satuan +'</option>');
              $('select[name="id_satuan1"]').append('<option value="'+ post.id_satuan +'">'+ post.uraian_satuan +'</option>');
              $('select[name="id_satuan2"]').append('<option value="'+ post.id_satuan +'">'+ post.uraian_satuan +'</option>');
            }
              
          }
      });

$('#divTambahProg').hide();
$('#divTambahKegiatan').hide();
$('#divTambahAktivitas').hide();
$('#divTambahPelaksana').hide();
// $('#divTambahLokasi').hide();
$('#divImportASB').hide();
$('#divAddSSH').hide();
$('#divImportASB').hide();

$('.display').DataTable({
      dom : 'BfRtip',
      autoWidth : false,
      bDestroy: true
  });

$(".disabled").click(function (e) {
        e.preventDefault();
        return false;
});

function back2renja(){
  
    $('#divTambahProg').hide();
    $('#divTambahKegiatan').hide();
    $('#divTambahAktivitas').hide();
    $('#divTambahPelaksana').hide();
    // $('#divTambahLokasi').hide();
    $('#divImportASB').hide();
    $('#divAddSSH').hide();
    $('#divImportASB').hide();

  tahun_temp = $('#tahun_rkpd').val();
  unit_temp = $('#id_unit').val();

  $('.nav-tabs a[href="#programrenja"]').tab('show');
  loadTblRekap(tahun_temp,unit_temp);
}

$(document).on('click', '.backRenja', function() {
  back2renja();
});

function back2kegiatan(){
  if(status_program_renja_temp==0){
    $('#divTambahProg').hide();
    $('#divTambahKegiatan').show();
    $('#divTambahAktivitas').hide();
    $('#divTambahPelaksana').hide();
    // $('#divTambahLokasi').hide();
    $('#divImportASB').hide();
    $('#divAddSSH').hide();
    $('#divImportASB').hide();
  }
  $('.nav-tabs a[href="#kegiatanrenja"]').tab('show');
  loadTblKegiatanRenja(id_renja_program_temp);
}

$(document).on('click', '.backKegiatan', function() {
  back2kegiatan();
});

function back2pelaksana(){
  if(status_kegiatan_renja_temp==0){
    $('#divTambahProg').hide();
    $('#divTambahKegiatan').hide();
    $('#divTambahAktivitas').hide();
    $('#divTambahPelaksana').show();
    // $('#divTambahLokasi').hide();
    $('#divImportASB').hide();
    $('#divAddSSH').hide();
    $('#divImportASB').hide();
  }
  $('.nav-tabs a[href="#pelaksanarenja"]').tab('show');
  loadTblPelaksana(id_renja_temp);
}

$(document).on('click', '.backPelaksana', function() {
  back2pelaksana();
});

function back2aktivitas(){
  if(status_pelaksana_renja_temp==0){
    $('#divTambahProg').hide();
    $('#divTambahKegiatan').hide();
    $('#divTambahAktivitas').show();
    $('#divTambahPelaksana').hide();
    // $('#divTambahLokasi').hide();
    $('#divImportASB').hide();
    $('#divAddSSH').hide();
    $('#divImportASB').hide();
  }
  $('.nav-tabs a[href="#aktivitasrenja"]').tab('show');
  loadTblAktivitas(id_pelaksana_temp);
}
$(document).on('click', '.backAktivitas', function() {
  back2aktivitas();
});

function back2lokasi(){
  $('#divTambahAktivitas').hide();
  $('#divTambahPelaksana').hide();
  // $('#divTambahLokasi').show();
  $('#divImportASB').hide();
  $('#divAddSSH').hide();
  $('#divImportASB').hide();

  $('.nav-tabs a[href="#lokasi"]').tab('show');
  loadTblLokasi(id_aktivitas_temp);
}

$(document).on('click', '.backLokasi', function() {
  back2lokasi();
});


var cariAktivitasASB;
$(document).on('click', '.btnCariASB', function() {   
  cariAktivitasASB = $('#tblCariAktivitasASB').DataTable( {
        processing: true,
        serverSide: true,
        autoWidth : false,
        dom: 'bfrtIp',
        "ajax": {"url": "../admin/parameter/getAktivitasASB/"+tahun_temp},
        "columns": [
              { data: 'no_urut', sClass: "dt-center"},
              { data: 'nm_aktivitas_asb'}
            ],
        "order": [[0, 'asc']],
        "bDestroy": true
    });
  $('#cariAktivitasASB').modal('show');
});

var CariSubUnit;
$(document).on('click', '.btnCariSubUnit', function() {
  $('#CariSubUnit').modal('show'); 

  CariSubUnit = $('#tblCariSubUnit').DataTable( {
        processing: true,
        serverSide: true,
        autoWidth : false,
        dom: 'bfrtIp',
        "ajax": {"url": "../admin/parameter/getSubUnitTable/"+unit_temp},
        "columns": [
              { data: 'no_urut', sClass: "dt-center"},
              { data: 'nm_sub'}
            ],
        "order": [[0, 'asc']],
        "bDestroy": true
    }); 

});

var itemSSH, rekening;
$(document).on('click', '#btnparam_cari', function() {
 
  param=$('#param_cari').val();
  itemSSH = $('#tblItemSSH').DataTable( {
        // retrieve: true,
        processing: true,
        serverSide: true,
        dom: 'BfrtIp',
        "autoWidth": false,
        "ajax": {"url": "blang/getItemSSH/"+zona_temp+"/"+param.toLowerCase()},
        "columns": [
              { data: 'no_urut', sClass: "dt-center",width:"10px"},
              { data: 'uraian_sub_kelompok_ssh'},
              { data: 'uraian_tarif_ssh'},
              { data: 'keterangan_tarif_ssh'},
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

    document.getElementById("id_satuan1").value = data.id_satuan;
    // document.getElementById("satuan1").innerHTML = data.uraian_satuan;

    $('#harga_satuan').val(data.jml_rupiah);
    $('#jumlah_belanja').val(hitungsatuan());

    $('#cariItemSSH').modal('hide');    

  } );

var cariLokasiDesa,cariLokasiTeknis,cariLokasiLuar, sbr_aktivitas, status_musren_temp, id_satuan_publik_temp;
var status_program_renja_temp,status_kegiatan_renja_temp,status_pelaksana_renja_temp;

$( "#kecamatan" ).change(function() {

    cariLokasiDesa = $('#tblLokasiWilayah').DataTable( {
        processing: true,
        serverSide: true,
        autoWidth : false,
        dom: 'bfrtIp',
        "ajax": {"url": "../admin/parameter/getLokasiDesa/"+$('#kecamatan').val()},
        "columns": [
              { data: 'no_urut', sClass: "dt-center"},
              { data: 'nama_lokasi'}
            ],
        "order": [[0, 'asc']],
        "bDestroy": true
    }); 

});

$(document).on('click', '.btnCariLokasi', function() { 

  $.ajax({
    type: "GET",
    url: '../admin/parameter/getKecamatan',
    dataType: "json",

    success: function(data) {

          var j = data.length;
          var post, i;

          $('select[name="kecamatan"]').empty();
          $('select[name="kecamatan"]').append('<option value="0">---Pilih Kecamatan---</option>');
          $('select[name="kecamatan"]').append('<option value="9999">---Wilayah Kecamatan---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="kecamatan"]').append('<option value="'+ post.id_kecamatan +'">'+ post.nama_kecamatan +'</option>');
          }
          }
  }); 

  cariLokasiTeknis = $('#tblLokasiTeknis').DataTable( {
        processing: true,
        serverSide: true,
        dom: 'bfrtIp',
        autoWidth : false,
        "ajax": {"url": "../admin/parameter/getLokasiTeknis"},
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
        "ajax": {"url": "../admin/parameter/getLokasiLuarDaerah"},
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
    document.getElementById("nm_lokasi_penyelenggara").value = data.nama_lokasi;

    $('#cariLokasiModal').modal('hide');  

  });

$('#tblLokasiTeknis').on( 'dblclick', 'tr', function () {
    var data = cariLokasiTeknis.row(this).data();

    document.getElementById("id_lokasi").value = data.id_lokasi;
    document.getElementById("jenis_lokasi").value = data.jenis_lokasi;
    document.getElementById("nm_lokasi").value = data.nama_lokasi;

    document.getElementById("id_lokasi_pelaksana").value = data.id_lokasi;
    document.getElementById("nm_lokasi_penyelenggara").value = data.nama_lokasi;

    $('#cariLokasiModal').modal('hide');    

  });

$('#tblLokasiLuar').on( 'dblclick', 'tr', function () {
    var data = cariLokasiLuar.row(this).data();

    document.getElementById("id_lokasi").value = data.id_lokasi;
    document.getElementById("jenis_lokasi").value = data.jenis_lokasi;
    document.getElementById("nm_lokasi").value = data.nama_lokasi;

    document.getElementById("id_lokasi_pelaksana").value = data.id_lokasi;
    document.getElementById("nm_lokasi_penyelenggara").value = data.nama_lokasi;

    $('#cariLokasiModal').modal('hide');    

  });

$('#tblCariAktivitasASB').on( 'dblclick', 'tr', function () {
    var data = cariAktivitasASB.row(this).data();

    document.getElementById("ur_aktivitas_kegiatan").value = data.nm_aktivitas_asb;
    document.getElementById("id_aktivitas_asb").value = data.id_aktivitas_asb;

    document.getElementById("id_satuan_1").value = data.id_satuan_1;
    document.getElementById("id_satuan_2").value = data.id_satuan_2;

    $('#cariAktivitasASB').modal('hide');    

  });

$('#tblCariSubUnit').on( 'dblclick', 'tr', function () {
    var data = CariSubUnit.row(this).data();

    document.getElementById("subunit_pelaksana").value = data.nm_sub;
    document.getElementById("id_subunit_pelaksana").value = data.id_sub_unit;
    $('#CariSubUnit').modal('hide');    

  });

$( "#id_unit" ).change(function() {

  $('.nav-tabs a[href="#program"]').tab('show');
  $('#judul').html('<b>Proses Penyusunan Rancangan Renja  '+$('#id_unit option:selected').text()+'</b>');

  back2renja() 

});

var tblProgRenja;
function loadTblRekap(tahun,unit){
   tblProgRenja=$('#tblProgramRenja').DataTable({
                  processing: true,
                  serverSide: true,
                  autoWidth : false,
                  dom : 'BfRtIp',
                  "ajax": {"url": "./blang/getProgramRenja/"+tahun+"/"+unit},
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
                        // { data: 'jml_0i', sClass: "dt-center"},
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
            dom : 'BfRtIP',
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
                        // { data: 'icon','searchable': false, 'orderable':false, sClass: "dt-center",
                        //     render: function(data, type, row,meta) {
                        //     return '<i class="'+row.status_icon+'" style="font-size:16px;color:'+row.warna+';"/>';
                        //   }},
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
    status_program_renja_temp = data.status_data;
    id_program_ref_temp=data.id_program_ref;
    id_program_renstra_temp=data.id_program_renstra;

    document.getElementById("nm_program_renstra_kegrenja").innerHTML =prog_renstra;
    // document.getElementById("nm_program_rkpd_kegrenja").innerHTML =prog_rkpd;
    document.getElementById("nm_program_renja_kegrenja").innerHTML =prog_renja;

    back2kegiatan();

  });


$(document).on('click', '.view-kegiatan', function() {

    var data = tblProgRenja.row( $(this).parents('tr') ).data(); 

    prog_renja=data.uraian_program_renja;
    prog_renstra=data.uraian_program_renstra;
    id_renja_program_temp=data.id_renja_program;
    status_program_renja_temp = data.status_data;
    id_program_ref_temp=data.id_program_ref;
    id_program_renstra_temp=data.id_program_renstra

    document.getElementById("nm_program_renstra_kegrenja").innerHTML =prog_renstra;
    // document.getElementById("nm_program_rkpd_kegrenja").innerHTML =prog_rkpd;
    document.getElementById("nm_program_renja_kegrenja").innerHTML =prog_renja;

    back2kegiatan();
});

$('#tblKegiatanRenja tbody').on( 'dblclick', 'tr', function () {

    var data = tblKegRenja.row(this).data();

    keg_renja = data.uraian_kegiatan_renja;
    id_renja_temp = data.id_renja;
    status_kegiatan_renja_temp = data.status_data;
    tahun_temp = $('#tahun_rkpd').val();
    unit_temp = $('#id_unit').val();

    document.getElementById("nm_program_pelaksana").innerHTML =prog_renja;
    document.getElementById("nm_kegiatan_pelaksana").innerHTML =keg_renja;

    back2pelaksana();

});

$(document).on('click', '.view-aktivitas', function() {

    var data = pelaksana_tbl.row( $(this).parents('tr') ).data();

    nm_sub_temp = data.nm_sub;
    id_pelaksana_temp = data.id_pelaksana_renja;
    status_pelaksana_renja_temp = data.status_data;
    tahun_temp = $('#tahun_rkpd').val();
    unit_temp = $('#id_unit').val();

    document.getElementById("nm_program_aktivitas").innerHTML =prog_renja;
    document.getElementById("nm_kegiatan_aktivitas").innerHTML =keg_renja;
    document.getElementById("nm_sub_pelaksana").innerHTML =nm_sub_temp;

    back2aktivitas();
});

$('#tblPelaksanaRenja tbody').on( 'dblclick', 'tr', function () {

    var data = pelaksana_tbl.row(this).data();

    nm_sub_temp = data.nm_sub;
    id_pelaksana_temp = data.id_pelaksana_renja;
    status_pelaksana_renja_temp = data.status_data;
    tahun_temp = $('#tahun_rkpd').val();
    unit_temp = $('#id_unit').val();

    document.getElementById("nm_program_aktivitas").innerHTML =prog_renja;
    document.getElementById("nm_kegiatan_aktivitas").innerHTML =keg_renja;
    document.getElementById("nm_sub_pelaksana").innerHTML =nm_sub_temp;

    back2aktivitas();
});

$(document).on('click', '.view-pelaksana', function() {

  var data = tblKegRenja.row( $(this).parents('tr') ).data(); 

    keg_renja = data.uraian_kegiatan_renja;
    id_renja_temp = data.id_renja;
    status_kegiatan_renja_temp = data.status_data;
    tahun_temp = $('#tahun_rkpd').val();
    unit_temp = $('#id_unit').val();

    document.getElementById("nm_program_pelaksana").innerHTML =prog_renja;
    document.getElementById("nm_kegiatan_pelaksana").innerHTML =keg_renja;

    back2pelaksana();
});

$('#tblAktivitasRenja tbody').on( 'dblclick', 'tr', function () {

    var data = aktivitas_tbl.row(this).data();

    aktivitas_renja = data.uraian_aktivitas_kegiatan;
    id_aktivitas_temp = data.id_aktivitas_renja;
    id_asb_temp = data.id_aktivitas_asb;
    id_sat_asb1 = data.id_satuan_1;
    id_sat_asb2 = data.id_satuan_2;
    nm_sat_asb1 = data.uraian_satuan_1;
    nm_sat_asb2 = data.uraian_satuan_2;
    status_musren_temp = data.status_musren;
    id_satuan_publik_temp = data.id_satuan_publik;
    sbr_aktivitas=data.sumber_aktivitas;  
    pagu_rata2_temp=data.pagu_rata2; 
    tahun_temp = $('#tahun_rkpd').val();
    unit_temp = $('#id_unit').val();

    if(sbr_aktivitas == 0){
        if(id_satuan_publik_temp==0){
          vol1_temp=data.jml_vol_lok;
          vol2_temp=data.volume_2;
        } else {          
          vol1_temp=data.volume_1;
          vol2_temp=data.jml_vol_lok;
        }
    } else {
      vol1_temp=data.volume_1;
      vol2_temp=data.volume_2;
    }
    
    document.getElementById("nm_program_belanja").innerHTML =prog_renja;
    document.getElementById("nm_kegiatan_belanja").innerHTML =keg_renja;
    document.getElementById("nm_aktivitas_belanja").innerHTML =aktivitas_renja;
    document.getElementById("nm_sub_belanja").innerHTML =nm_sub_temp;

    $('#divTambahAktivitas').hide();
    $('#divTambahPelaksana').hide();

    if(data.sumber_aktivitas == 0){
      $('#divAddSSH').hide();
      $('#divImportASB').show();
    } else {
      $('#divAddSSH').show();
      $('#divImportASB').hide();
    }

    $('.nav-tabs a[href="#belanja"]').tab('show');
    loadTblBelanja(id_aktivitas_temp);

});

$(document).on('click', '.view-lokasi', function() {

  var data = aktivitas_tbl.row( $(this).parents('tr') ).data();   

    aktivitas_renja = data.uraian_aktivitas_kegiatan;
    id_aktivitas_temp = data.id_aktivitas_renja;
    id_asb_temp = data.id_aktivitas_asb;
    id_sat_asb1 = data.id_satuan_1;
    id_sat_asb2 = data.id_satuan_2; 
    nm_sat_asb1 = data.uraian_satuan_1;
    nm_sat_asb2 = data.uraian_satuan_2;
    status_musren_temp = data.status_musren;
    id_satuan_publik_temp = data.id_satuan_publik;
    sbr_aktivitas=data.sumber_aktivitas; 
    pagu_rata2_temp=data.pagu_rata2; 
    tahun_temp = $('#tahun_rkpd').val();
    unit_temp = $('#id_unit').val();

    if(sbr_aktivitas == 0){
        if(id_satuan_publik_temp==0){
          vol1_temp=data.jml_vol_lok;
          vol2_temp=data.volume_2;
        } else {          
          vol1_temp=data.volume_1;
          vol2_temp=data.jml_vol_lok;
        }
    } else {
      vol1_temp=data.volume_1;
      vol2_temp=data.volume_2;
    }

    document.getElementById("nm_program_belanja").innerHTML =prog_renja;
    document.getElementById("nm_kegiatan_belanja").innerHTML =keg_renja;
    document.getElementById("nm_aktivitas_belanja").innerHTML =aktivitas_renja;
    document.getElementById("nm_sub_belanja").innerHTML =nm_sub_temp;

    $('#divTambahAktivitas').hide();
    $('#divTambahPelaksana').hide();

    if(data.sumber_aktivitas == 0){
      $('#divAddSSH').hide();
      $('#divImportASB').show();
    } else {
      $('#divAddSSH').show();
      $('#divImportASB').hide();
    }

    $('.nav-tabs a[href="#belanja"]').tab('show');
    loadTblBelanja(id_aktivitas_temp);
});

$(document).on('click', '.view-belanja', function() {

  var data = aktivitas_tbl.row( $(this).parents('tr') ).data();
    aktivitas_renja = data.uraian_aktivitas_kegiatan;
    id_aktivitas_temp = data.id_aktivitas_renja;
    id_asb_temp = data.id_aktivitas_asb; 
    id_sat_asb1 = data.id_satuan_1;
    id_sat_asb2 = data.id_satuan_2; 
    nm_sat_asb1 = data.uraian_satuan_1;
    nm_sat_asb2 = data.uraian_satuan_2;
    status_musren_temp = data.status_musren;
    id_satuan_publik_temp = data.id_satuan_publik;
    sbr_aktivitas=data.sumber_aktivitas; 
    pagu_rata2_temp=data.pagu_rata2; 
    tahun_temp = $('#tahun_rkpd').val();
    unit_temp = $('#id_unit').val();

    if(sbr_aktivitas == 0){
        if(id_satuan_publik_temp==0){
          vol1_temp=data.jml_vol_lok;
          vol2_temp=data.volume_2;
        } else {          
          vol1_temp=data.volume_1;
          vol2_temp=data.jml_vol_lok;
        }
    } else {
      vol1_temp=data.volume_1;
      vol2_temp=data.volume_2;
    }

    document.getElementById("nm_program_belanja").innerHTML =prog_renja;
    document.getElementById("nm_kegiatan_belanja").innerHTML =keg_renja;
    document.getElementById("nm_aktivitas_belanja").innerHTML =aktivitas_renja;
    document.getElementById("nm_sub_belanja").innerHTML =nm_sub_temp;

    $('#divTambahAktivitas').hide();
    $('#divTambahPelaksana').hide();
    // $('#divTambahLokasi').hide();

    if(data.sumber_aktivitas == 0){
      $('#divAddSSH').hide();
      $('#divImportASB').show();
    } else {
      $('#divAddSSH').show();
      $('#divImportASB').hide();
    }

    $('.nav-tabs a[href="#belanja"]').tab('show');
    loadTblBelanja(id_aktivitas_temp);
});


function loadTblKegiatanRenja(id_program){
    tblKegRenja=$('#tblKegiatanRenja').DataTable({
                  processing: true,
                  serverSide: true,
                  autoWidth : false,
                  dom : 'BfrtIp',
                  "ajax": {"url": "./blang/getKegiatanRenja/"+id_program},
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
                        // { data: 'jml_0i', sClass: "dt-center"},
                        { data: 'jml_pelaksana', sClass: "dt-center"},
                        { data: 'pagu_tahun_kegiatan', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'jml_pagu', sClass: "dt-right",
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

function initInKeg(tableId, data){
    tblInKeg=$('#' + tableId).DataTable({
            processing: true,
            serverSide: true,
            ajax: data.details_url,
            dom : 'BFRtIp',
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
                        // { data: 'icon','searchable': false, 'orderable':false, sClass: "dt-center",
                        //     render: function(data, type, row,meta) {
                        //     return '<i class="'+row.status_icon+'" style="font-size:16px;color:'+row.warna+';"/>';
                        //   }},
                        { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        })
}

var lokasi_tbl,vol1_temp,vol2_temp,id_sat_asb1,id_sat_asb2, nm_sat_asb1, nm_sat_asb2;
var id_sat_lok1,id_sat_lok2,nm_sat_lok1,nm_sat_lok2;

function initLokasi(tableId, data){
    lokasi_tbl=$('#' + tableId).DataTable({
                  processing: true,
                  serverSide: true,
                  ajax: data.details_url,
                  dom : 'BFrtIp',
                  autoWidth: false,
                  "language": {
                      "decimal": ",",
                      "thousands": "."},
                  "columns": [
                        { data: 'no_urut', sClass: "dt-center"},
                        { data: 'nama_kecamatan'},
                        { data: 'nama_lokasi'},
                        // { data: 'jml_pagu', sClass: "dt-right",
                        //     render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'volume_1', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'volume_2', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        });
}

var belanja_renja_tbl;
function loadTblBelanja(lokasi){
   belanja_renja_tbl=$('#tblBelanja').DataTable({
                  processing: true,
                  serverSide: true,
                  dom : 'BfrtIp',
                  autoWidth : false,
                  "ajax": {"url": "./blang/getBelanja/"+lokasi},
                  "language": {
                      "decimal": ",",
                      "thousands": "."},
                  "columns": [
                        { data: 'no_urut', sClass: "dt-center"},
                        { data: 'uraian_belanja_display'},
                        // { data: 'kd_rekening', sClass: "dt-center"},
                        { data: 'volume_1', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'volume_2', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'harga_satuan', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'jml_belanja', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        });
}

var CopyBelanjaTbl;
$(document).on('click', '#btnCopyBelanja', function() {
  
  $('#ModalCopyBelanja').modal('show'); 

  CopyBelanjaTbl = $('#tblCopyBelanja').DataTable( {
        processing: true,
        serverSide: true,
        autoWidth : false,
        dom: 'bfrtIp',
        "ajax": {"url": "./blang/getLokasiCopy/"+unit_temp},
        "columns": [
              { data: 'urut', sClass: "dt-center"},
              { data: 'uraian_aktivitas_kegiatan'},
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
      url: './blang/getBelanjaCopy',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_lokasi': data.id_aktivitas_renja,
        'id_lokasi_new': id_aktivitas_temp,
      },    
      success: function(data) {
        belanja_renja_tbl.ajax.reload();
        createPesan(data.pesan,"success");
      }
    });
});


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


var pelaksana_tbl;
function loadTblPelaksana(id_renja){
    pelaksana_tbl=$('#tblPelaksanaRenja').DataTable({
                  processing: true,
                  serverSide: true,
                  autoWidth : false,
                  dom : 'BfrtIp',
                  "ajax": {"url": "./blang/getPelaksanaAktivitas/"+id_renja},
                  "language": {
                      "decimal": ",",
                      "thousands": "."},
                  "columns": [
                        { data: 'no_urut', sClass: "dt-center"},
                        { data: 'nm_sub'},
                        { data: 'jml_pagu', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'jml_aktivitas', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        // { data: 'icon','searchable': false, 'orderable':false, sClass: "dt-center",
                        //     render: function(data, type, row,meta) {
                        //     return '<i class="'+row.status_icon+'" style="font-size:16px;color:'+row.warna+';"/>';
                        //   }},
                        { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        });
}
    

var aktivitas_tbl;
function loadTblAktivitas(id_pelaksana){
    aktivitas_tbl=$('#tblAktivitasRenja').DataTable({
                  processing: true,
                  serverSide: true,
                  dom : 'BfrtIp',
                  autoWidth : false,
                  "ajax": {"url": "./blang/getAktivitas/"+id_pelaksana},
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
                        { data: 'no_urut', sClass: "dt-center"},
                        // { data: 'uraian_aktivitas_kegiatan'},
                        { data: 'uraian','searchable': false, 'orderable':false, sClass: "dt-left",
                            render: function(data, type, row,meta) {
                            return row.uraian_aktivitas_kegiatan + '  <i class="'+row.img+' fa-lg text-primary"/>';
                          }},
                        { data: 'pagu_aktivitas', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        // { data: 'persen_musren', sClass: "dt-center",
                        //     render: function(data, type, row,meta) {
                        //     return row.pagu_musren+'%';}},
                        { data: 'jml_musren_aktivitas', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'jml_pagu_belanja', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'jml_vol_1', sClass: "dt-right",
                            render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'jml_vol_2', sClass: "dt-right",
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

$('#tblAktivitasRenja tbody').on('click', 'td.details-control', function () {

        var tr = $(this).closest('tr');
        var row = aktivitas_tbl.row( tr );
        var tableId = 'inLok-' + row.data().id_aktivitas_renja;

        if (row.child.isShown()) {
            row.child.hide();
            tr.removeClass('shown');
        } else {
            row.child(detLokasi(row.data())).show();
            initLokasi(tableId, row.data());
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
        autoWidth : false,
        "ajax": {"url": "./blang/getProgRenstra/"+unit_temp},
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
        autoWidth : false,
        "ajax": {"url": "./blang/getProgRef/"+$('.kd_bidang').val()},
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
    $('#tblCariProgramRef').DataTable().ajax.url("./blang/getProgRef/0").load();

    $.ajax({
          type: "GET",
          url: './blang/getBidang/'+unit_temp+'/'+id_ranwal_temp,
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

  });

var cariindikator
$(document).on('click', '.btnCariIndi', function() {    
    $('#judulModal').text('Daftar Indikator yang terdapat dalam RPJMD/Renstra');    
    $('#cariIndikator').modal('show');

    cariindikator = $('#tblCariIndikator').DataTable( {
        processing: true,
        serverSide: true,
        dom: 'bfrtIp',
        autoWidth : false,
        "ajax": {"url": "../admin/parameter/getRefIndikator"},
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
        autoWidth : false,
        "ajax": {"url": "../admin/parameter/getRefIndikator"},
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
  $('#cariKegiatanRef').modal('show'); 

  cariKegiatanRef = $('#tblCariKegiatanRef').DataTable( {
        processing: true,
        serverSide: true,
        dom: 'bfrtIp',
        autoWidth : false,
        "ajax": {"url": "./blang/getKegRef/"+id_program_ref_temp},
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
          autoWidth : false,
          "ajax": {"url": "./blang/getKegRenstra/"+unit_temp+"/"+id_program_renstra_temp},
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
      $('.btnProgram').hide();

      document.frmEditProgram.status_usulan_program[0].checked=true;
      document.frmEditProgram.status_pelaksanaan_program[4].checked=true;

      $('#ModalProgram').modal('show');

  });

  $('.modal-footer').on('click', '.addProgramRenstra', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      alert(id_renja_ranwal_temp);

      $.ajax({
          type: 'post',
          url: 'blang/addProgram',
          data: {
              '_token': $('input[name=_token]').val(),
              'no_urut': $('#no_urut_program').val(),
              'id_rkpd_ranwal': $('#id_rkpd_ranwal_program').val(),
              'tahun_renja': $('#tahun_renja').val(),
              'id_unit' : $('#id_unit').val() ,
              'jenis_belanja' : $('#jenis_belanja').val() ,
              'id_renja_ranwal': id_renja_ranwal_temp,
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

    var data = tblProgRenja.row( $(this).parents('tr') ).data();
        
      $('.btnProgram').removeClass('addProgramRenstra');
      $('.btnProgram').addClass('editProgramRenstra');
      $('.modal-title').text('Edit dan Reviu Program Renja pada '+data.nm_unit);
      $('.idStatusUsulan').hide();
      $('.form-horizontal').show();
      $('#id_rkpd_ranwal_program').val(data.id_rkpd_ranwal);
      $('#id_renja_program').val(data.id_renja_program);
      $('#id_unit').val(data.id_unit);
      $('#jenis_belanja').val(data.jenis_belanja);
      $('#tahun_renja').val(data.tahun_renja);
      $('#id_visi_renstra').val(data.id_visi_renstra);
      $('#id_misi_renstra').val(data.id_misi_renstra);
      $('#id_tujuan_renstra').val(data.id_tujuan_renstra);
      $('#id_sasaran_renstra').val(data.id_sasaran_renstra);
      $('#id_program_renstra').val(data.id_program_renstra);
      $('#ur_program_renstra').val(data.uraian_program_renstra);
      $('#ur_program_renja').val(data.uraian_program_renja);
      $('#id_program_ref').val(data.id_program_ref);
      $('#ur_program_ref').val(data.kd_program +" - "+data.uraian_program);
      $('#no_urut_program').val(data.no_urut);
      $('#keterangan_status_program').val(data.ket_usulan);
      
      if(data.sumber_data==1){        
        document.getElementById("no_urut_program").removeAttribute("disabled");
        document.getElementById("ur_program_renja").removeAttribute("disabled");
        document.getElementById("jenis_belanja").removeAttribute("disabled");
      } else {
        document.getElementById("no_urut_program").setAttribute("disabled","disabled");
        document.getElementById("ur_program_renja").setAttribute("disabled","disabled");
        document.getElementById("jenis_belanja").setAttribute("disabled","disabled");
      }

      document.frmEditProgram.status_usulan_program[data.sumber_data].checked=true;

      if(data.status_pelaksanaan==4){
          document.frmEditProgram.status_pelaksanaan_program[4].checked=true;
          document.frmEditProgram.status_pelaksanaan_program[4].style.visibility='hidden';        
          document.getElementById("status_pelaksanaan4").style.visibility='hidden';
          $('.idStatusPelaksanaan').hide();        
          // $('.btnHapus').show();
          $('.btnCariProgramRef').show();
          $('.btnCariProgramRenstra').show();          
        } else {
            $('.idStatusPelaksanaan').show();
            document.frmEditProgram.status_pelaksanaan_program[data.status_pelaksanaan].checked=true;
            document.frmEditProgram.status_pelaksanaan_program[4].style.visibility='hidden';        
            document.getElementById("status_pelaksanaan4").style.visibility='hidden';
            // $('.btnHapus').hide();
            $('.btnCariProgramRef').hide();
            $('.btnCariProgramRenstra').hide();
        }      

      if(data.status_pelaksanaan==0){
          document.getElementById("keterangan_status_program").setAttribute("disabled","disabled");
          $('.KetPelaksanaan').hide();
        } else {
            document.getElementById("keterangan_status_program").removeAttribute("disabled");
            $('.KetPelaksanaan').show();
        }

      $(".skegiatan").attr('disabled', false);
      $(".usulan").attr('disabled', false);
      $('.btnProgram').hide();

      $('#ModalProgram').modal('show');
  });

$('.modal-footer').on('click', '.editProgramRenstra', function() {
      
                    $.ajaxSetup({
                       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
                    });

                    $.ajax({
                      type: 'post',
                      url: 'blang/editProgram',
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
      url: 'blang/hapusProgram',
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
  var data = tblProgRenja.row( $(this).parents('tr') ).data();

      $('.btnIndikator').removeClass('editIndikator');
      $('.btnIndikator').addClass('addIndikator');
      $('.modal-title').text('Tambah Target Capaian Program Renja');
      $('.form-horizontal').show();
      $('#id_renja_program_1').val(data.id_renja_program);
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
      $('.btnIndikator').hide();
      $('.chkIndikator').hide();

      $('#ModalIndikator').modal('show');
  });

$('.modal-footer').on('click', '.addIndikator', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: 'blang/addIndikatorRenja',
          data: {
              '_token': $('input[name=_token]').val(),
              'tahun_renja': tahun_temp,
              'no_urut': $('#no_urut_indikator').val(),
              'id_renja_program': $('#id_renja_program_1').val(),
              'kd_indikator': $('#kd_indikator_renja').val(),
              'uraian_indikator': $('#ur_indikator_renja').val(),
              'tolok_ukur_indikator': $('#ur_tolokukur_renja').val(),
              'target_renja': $('#target_indikator_renja').val(),
          },
          success: function(data) {
              tblProgRenja.ajax.reload();
              tblInProg.ajax.reload(); 
              programrkpd.ajax.reload();             
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
              
          }
      });
  });

  $(document).on('click', '.edit-indikator', function() {
  var data = tblInProg.row( $(this).parents('tr') ).data();

      $('.btnIndikator').removeClass('addIndikator');
      $('.btnIndikator').addClass('editIndikator');
      $('.modal-title').text('Edit dan Reviu Target Capaian Program RKPD');
      $('.form-horizontal').show();
      $('#id_indikator_program_renja').val(data.id_indikator_program_renja);
      $('#id_renja_program_1').val(data.id_renja_program);
      $('#kd_indikator_renja').val(data.kd_indikator);
      $('#no_urut_indikator').val(data.urut);
      $('#ur_indikator_renja').val(data.uraian_indikator_program_renja);
      $('#ur_tolokukur_renja').val(data.tolok_ukur_indikator);
      $('#target_indikator_renstra').val(data.target_renstra);
      $('#target_indikator_renja').val(data.target_renja);
      
      if(data.sumber_data==1){
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
      if(data.status_data==1){
        $('.checkIndikator').prop('checked',true);
      } else {
        $('.checkIndikator').prop('checked',false);
      }

      $('.btnHapusIndikator').hide();
      $('.btnIndikator').hide();

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
          url: 'blang/editIndikatorRenja',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_indikator_program_renja':$('#id_indikator_program_renja').val(),
              'no_urut': $('#no_urut_indikator').val(),
              'id_renja_program': $('#id_renja_program_1').val(),
              'kd_indikator': $('#kd_indikator_renja').val(),
              'uraian_indikator': $('#ur_indikator_renja').val(),
              'tolok_ukur_indikator': $('#ur_tolokukur_renja').val(),
              'target_renja': $('#target_indikator_renja').val(),
              'status_data': check_data,
          },
          success: function(data) {
              tblInProg.ajax.reload();
              tblProgRenja.ajax.reload();
              programrkpd.ajax.reload();
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
      url: 'blang/hapusIndikatorRenja',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_indikator_program_renja': $('#id_indikator_program_renja').val()
      },
      success: function(data) {
        $('#ModalIndikator').modal('hide');
        tblInProg.ajax.reload();
        tblProgRenja.ajax.reload();
        programrkpd.ajax.reload();
        if(data.status_pesan==1){
          createPesan(data.pesan,"success");
        } else {
          createPesan(data.pesan,"danger"); 
        }
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
      $('#btnHapusKeg').hide();
      $('#btnKegiatan').hide();

      document.frmModalKegiatan.status_pelaksanaan_kegiatan[4].checked=true;

      $('#ModalKegiatan').modal('show');
  });

$('.modal-footer').on('click', '.addKegiatanRenja', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: 'blang/addKegiatanRenja',
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
              tblKegRenja.ajax.reload();
              tblProgRenja.ajax.reload();
              programrkpd.ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
          }
      });
  });

  $(document).on('click', '.edit-kegiatan', function() {
    
    var data = tblKegRenja.row( $(this).parents('tr') ).data();

      $('.btnKegiatan').removeClass('addKegiatanRenja');
      $('.btnKegiatan').addClass('editKegiatanRenja');      
      $('.form-horizontal').show();
      $('.modal-title').text('Edit dan Reviu Kegiatan Renja pada '+data.nm_unit);
      $('#id_renja_kegiatan').val(data.id_renja);
      $('#id_rkpd_ranwal_kegiatan').val(data.id_rkpd_ranwal);
      $('#tahun_renja_kegiatan').val(data.tahun_renja);
      $('#id_renja_program_kegiatan').val(data.id_renja_program);
      $('#id_unit_kegiatan').val(data.id_unit);
      $('#id_visi_renstra_keg').val(data.id_visi_renstra);
      $('#id_misi_renstra_keg').val(data.id_misi_renstra);
      $('#id_tujuan_renstra_keg').val(data.id_tujuan_renstra);
      $('#id_sasaran_renstra_keg').val(data.id_sasaran_renstra);
      $('#id_program_renstra_keg').val(data.id_program_renstra);
      $('#id_kegiatan_renstra').val(data.id_kegiatan_renstra);
      $('#ur_kegiatan_renstra').val(data.uraian_kegiatan_renstra);
      $('#ur_kegiatan_renja').val(data.uraian_kegiatan_renja);
      $('#id_kegiatan_ref').val(data.id_kegiatan_ref);
      $('#ur_kegiatan_ref').val(data.kd_kegiatan +" -" +data.nm_kegiatan);
      $('#no_urut_kegiatan').val(data.no_urut);
      $('#pagu_renstra').val(data.pagu_tahun_renstra);
      $('#pagu_renja_kegiatan').val(data.pagu_tahun_kegiatan);
      $('#pagu_selanjutnya').val(data.pagu_tahun_selanjutnya);
      $('#keterangan_status_kegiatan').val(data.ket_usulan);
      $('.idStatusUsulan_keg').hide();

      if(data.sumber_data==1){        
        document.getElementById("no_urut_kegiatan").removeAttribute("disabled");
        document.getElementById("ur_kegiatan_renja").removeAttribute("disabled");
        if(data.status_data==1){
          $('.chkKegiatan').hide();
          $('.checkKegiatan').prop('checked',true);
          $('#btnHapusKeg').hide();
          $('#btnKegiatan').hide();
        } else {
          $('.chkKegiatan').hide();
          $('.checkKegiatan').prop('checked',false);
          $('#btnHapusKeg').show();
          $('#btnKegiatan').hide();
        }
      } else {
        document.getElementById("no_urut_kegiatan").setAttribute("disabled","disabled");
        document.getElementById("ur_kegiatan_renja").setAttribute("disabled","disabled");
        if(data.status_data==1){
          $('.chkKegiatan').hide();
          $('.checkKegiatan').prop('checked',true);
          $('#btnHapusKeg').hide();
          $('#btnKegiatan').hide();
        } else {
          $('.chkKegiatan').hide();
          $('.checkKegiatan').prop('checked',false);
          $('#btnHapusKeg').hide();
          $('#btnKegiatan').hide();
        }
      }

      if(data.status_pelaksanaan_kegiatan==4){
          document.frmModalKegiatan.status_pelaksanaan_kegiatan[4].checked=true;
          document.frmModalKegiatan.status_pelaksanaan_kegiatan[4].style.visibility='hidden';        
          document.getElementById("status_pelaksanaan_keg4").style.visibility='hidden';
          $('.idStatusPelaksanaan_keg').hide();        
          // $('.btnHapusKeg').show();
          $('.btnCariKegiatanRef').show();
          $('.btnCariKegiatanRenstra').show();          
        } else {
            $('.idStatusPelaksanaan_keg').show();
            document.frmModalKegiatan.status_pelaksanaan_kegiatan[data.status_pelaksanaan_kegiatan].checked=true;
            document.frmModalKegiatan.status_pelaksanaan_kegiatan[4].style.visibility='hidden';        
            document.getElementById("status_pelaksanaan_keg4").style.visibility='hidden';
            // $('.btnHapusKeg').hide();
            $('.btnCariKegiatanRef').hide();
            $('.btnCariKegiatanRenstra').hide();
        }      

      if(data.status_pelaksanaan_kegiatan==0){
          document.getElementById("keterangan_status_kegiatan").setAttribute("disabled","disabled");
          $('.KetPelaksanaan_keg').hide();
        } else {
            document.getElementById("keterangan_status_kegiatan").removeAttribute("disabled");
            $('.KetPelaksanaan_keg').show();
        }

      $(".sPelaksanaan").attr('disabled', false);

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
            url: 'blang/getCheckKegiatan/'+$('#id_renja_kegiatan').val(),
            dataType: "json",
            success: function(data) {

              if(data[0].jml_check == 0){
                    $.ajaxSetup({
                       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
                    });

                    $.ajax({
                      type: 'post',
                      url: 'blang/editKegiatanRenja',
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
                          tblKegRenja.ajax.reload();
                          tblProgRenja.ajax.reload();
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
                      url: 'blang/editKegiatanRenja',
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
      url: 'blang/hapusKegiatanRenja',
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

  var data = tblKegRenja.row( $(this).parents('tr') ).data();

      $('.btnIndikatorKeg').removeClass('editIndikatorKeg');
      $('.btnIndikatorKeg').addClass('addIndikatorKeg');
      $('.modal-title').text('Tambah Target Capaian Kegiatan Renja');
      $('.form-horizontal').show();
      $('#id_renja_kegiatan').val(data.id_renja);
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
      $('.btnIndikatorKeg').hide();
      $('.chkIndikatorKeg').hide();

      $('#ModalIndikatorKeg').modal('show');
  });

$('.modal-footer').on('click', '.addIndikatorKeg', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: 'blang/addIndikatorKeg',
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
              tblKegRenja.ajax.reload();
              tblInKeg.ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }              
          }
      });
  });

  $(document).on('click', '.edit-indikatorKeg', function() {

    var data = tblInKeg.row( $(this).parents('tr') ).data();

      $('.btnIndikatorKeg').removeClass('addIndikatorKeg');
      $('.btnIndikatorKeg').addClass('editIndikatorKeg');
      $('.modal-title').text('Edit dan Reviu Target Capaian Kegiatan Renja');
      $('.form-horizontal').show();
      $('#id_indikator_kegiatan_renja').val(data.id_indikator_kegiatan_renja);
      $('#id_renja_kegiatan').val(data.id_renja);
      $('#kd_indikatorKeg_renja').val(data.kd_indikator);
      $('#no_urut_indikatorKeg').val(data.no_urut);
      $('#ur_indikatorKeg_renja').val(data.uraian_indikator_kegiatan_renja);
      $('#ur_tolokukur_keg').val(data.tolok_ukur_indikator);
      $('#target_indikatorKeg_renstra').val(data.angka_renstra);
      $('#target_indikatorKeg_renja').val(data.angka_tahun);

      if(data.sumber_data==1){
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

      $('.chkIndikatorKeg').show();
      if(data.status_data==1){
        $('.checkIndikatorKeg').prop('checked',true);
      } else {
        $('.checkIndikatorKeg').prop('checked',false);
      };

      $('.btnHapusIndikatorKeg').hide();
      $('.btnIndikatorKeg').hide();
    
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
          url: 'blang/editIndikatorKeg',
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
              tblKegRenja.ajax.reload();
              tblInKeg.ajax.reload();              
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
      url: 'blang/hapusIndikatorKeg',
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
          url: 'blang/postProgram',
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
          url: 'blang/postKegiatanRenja',
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

$(document).on('click', '.post-aktivitas', function() {

  var data = aktivitas_tbl.row( $(this).parents('tr') ).data();

    $('#id_aktivitas_renja_posting').val(data.id_aktivitas_renja);
    $('#status_aktivitas_renja_posting').val(data.status_data);
    $('#tahun_aktivitas_renja_posting').val(data.tahun_renja);
    $('#jml_belanja_posting').val(data.jml_pagu_belanja);
    $('#jml_pagu_posting').val(data.jml_musren_aktivitas);    


    document.getElementById("ur_aktivitas_renja_posting").innerHTML = data.uraian_aktivitas_kegiatan;

    if(data.status_data==0){
        document.getElementById("ur_aktivitas_status_posting").innerHTML = "Posting";
    } else {
        document.getElementById("ur_aktivitas_status_posting").innerHTML = "Un-Posting";
    }

    $('#StatusAktivitas').modal('show');
});

$('.modal-footer').on('click', '#btnPostAktivitas', function() {
      var status_post;
      if($('#status_aktivitas_renja_posting').val()==0){
          status_post = 1
      } else {
          status_post = 0
      };

      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: 'blang/postAktivitas',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_aktivitas_renja': $('#id_aktivitas_renja_posting').val(),
              'status_data': status_post,
              'jml_belanja': $('#jml_belanja_posting').val(),
              'jml_pagu': $('#jml_pagu_posting').val(),
          },
          success: function(data) {
              aktivitas_tbl.ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
              $('#StatusAktivitas').modal('hide');
          }
      });
    });


$(document).on('click', '.btnPrintKompilasiProgramdanPagu', function() {

    location.replace('../PrintKompilasiProgramdanPaguRenja/'+ $('#id_unit').val());
    
  });
$(document).on('click', '.btnPrintKompilasiKegiatandanPaguRenja', function() {

    location.replace('../PrintKompilasiKegiatandanPaguRenja/'+ $('#id_unit').val());
    
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
      $('#id_aktivitas_pelaksana').val(0);
      $('#id_subunit_pelaksana').val(null);
      $('#id_lokasi_pelaksana').val(null);
      $('#nm_lokasi_penyelenggara').val(null);
      $('#subunit_pelaksana').val(null);

      $('.chkPelaksana').hide();
      $('.checkPelaksana').prop('checked',false);
      $('.idbtnHapusPelaksana').hide();
      $('#btnHapusPelaksana').hide();
      $('#btnPelaksana').hide();
      $('#btnPelaksana').hide();

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
              pelaksana_tbl.ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              } 
          }
      });
  });

$(document).on('click', '.edit-pelaksana', function() {

  var data = pelaksana_tbl.row( $(this).parents('tr') ).data();
        
      $('.btnPelaksana').addClass('editPelaksana');
      $('.btnPelaksana').removeClass('addPelaksana');      
      $('.form-horizontal').show();
      $('.modal-title').text('Ubah Pelaksana aktivitas '+keg_renja);
      $('#id_renja_pelaksana').val(data.id_renja);
      $('#id_pelaksana_renja').val(data.id_pelaksana_renja);
      $('#tahun_renja_pelaksana').val(data.tahun_renja);
      $('#no_urut_pelaksana').val(data.no_urut);
      $('#id_aktivitas_pelaksana').val(data.id_aktivitas_renja);
      $('#id_subunit_pelaksana').val(data.id_sub_unit);
      $('#id_lokasi_pelaksana').val(data.id_lokasi);
      $('#nm_lokasi_penyelenggara').val(data.nama_lokasi);
      $('#subunit_pelaksana').val(data.nm_sub);

      $('.idbtnHapusPelaksana').show();

      if(data.status_kegiatan==1){
        $('.chkPelaksana').hide();
        $('#btnHapusPelaksana').hide();
        $('#btnPelaksana').hide();
      } else {
        $('.chkPelaksana').show();
        $('#btnHapusPelaksana').hide();
        $('#btnPelaksana').hide();
        if(data.sumber_data==0){
          $('#btnHapusPelaksana').hide();
        } else {
          $('#btnHapusPelaksana').hide();
        }
      }

      $('#btnHapusPelaksana').hide();
      $('#btnPelaksana').hide();
      
      if(data.status_data==1){
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
              pelaksana_tbl.ajax.reload();
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
        pelaksana_tbl.ajax.reload();
        $('#ModalPelaksana').modal('hide');
        createPesan(data.pesan,"success");
      }
    });
   } 
  else {    
    return false;
  }

  });

$( ".sumber_aktivitas" ).change(function() {
  // if(document.frmModalAktivitas.sumber_aktivitas.value==0){
  //     $('#ur_aktivitas_kegiatan').attr("disabled","disabled");
  //     $('.btnCariASB').show();
  //     $('.jenis_pembahasan').removeAttr("disabled");
  //     $('.id_satuan_publik').val(0);
  //     $('#divMusren').show();
  //     $('#divMusren1').show();

  //     if(document.frmModalAktivitas.jenis_pembahasan.value==0){
  //       $('#persen_musren_aktivitas').attr("disabled","disabled");
  //       // $('.id_satuan_publik').attr("disabled","disabled");
  //       $('#divMusren2').hide();
  //     } else{
  //       $('#persen_musren_aktivitas').removeAttr("disabled");        
  //       // $('.id_satuan_publik').removeAttr("disabled");
  //       $('#divMusren2').show();
  //     }
  //     $('#id_satuan_1').attr("disabled","disabled");
  //     $('#id_satuan_2').attr("disabled","disabled");
  //     // $('#pagu_aktivitas').attr("disabled","disabled");
  //   } else {
  //     $('#ur_aktivitas_kegiatan').removeAttr("disabled");
  //     $('.btnCariASB').hide();
  //     $('.jenis_pembahasan').attr("disabled","disabled");
  //     $('#persen_musren_aktivitas').attr("disabled","disabled");
  //     // $('.id_satuan_publik').attr("disabled","disabled");
  //     $('#divMusren').hide();
  //     $('#divMusren1').hide();
  //     $('#divMusren2').hide();
  //     $('#id_satuan_1').removeAttr("disabled");
  //     $('#id_satuan_2').removeAttr("disabled");
  //     // $('#pagu_aktivitas').removeAttr("disabled");
  //   }
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
  // if(document.frmModalAktivitas.jenis_pembahasan.value==0){
  //   $('#persen_musren_aktivitas').val(0);
  //   $('#pagu_musren_aktivitas').val(0);    
  //   $('#persen_musren_aktivitas').attr("disabled","disabled");
  //   // $('.id_satuan_publik').attr("disabled","disabled");
  //   $('.id_satuan_publik').val(0);
  //   $('#divMusren2').hide();
  // } else {
  //   $('#persen_musren_aktivitas').val(0);
  //   $('#pagu_musren_aktivitas').val(0);
  //   $('#persen_musren_aktivitas').removeAttr("disabled");
  //   // $('.id_satuan_publik').removeAttr("disabled");
  //   $('#divMusren2').show();
  // }
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

function getSatuanPublik(){

    var xCheck = document.querySelectorAll('input[name="id_satuan_publik"]:checked');
    var xyz = [];
    for(var x = 0, l = xCheck.length; x < l;  x++)
      { xyz.push(xCheck[x].value); }
    var xvalues = xyz.join('');
    return xvalues;
  }

function hitungpaguASB(){
  var z,x;
  $.ajax({
          type: 'get',
          url: 'blang/getHitungPaguASB', 
          data: {
              '_token': $('input[name=_token]').val(),
              'volume_1': $('#volume_1').val(),
              'volume_2': $('#volume_2').val(),
              'id_asb': $('#id_aktivitas_asb').val(),
          },         
          dataType: "json",
          success: function(data) {
            console.log(data);
            z = data[0].jml_pagu;
            $('#pagu_asb').val(z);
            if(document.frmModalAktivitas.id_satuan_publik.value==0) {
              x = z / $('#volume_1').val();
            } else {
              x = z / $('#volume_2').val();
            }
            $('#pagu_rata2_asb').val(x);                          
          },
          error: function(data) {
            createPesan('Hitung ASB Gagal','danger');             
          }
      });  
}

$( "#volume_1" ).change(function() {
  if(document.frmModalAktivitas.sumber_aktivitas.value==0) {
    hitungpaguASB();
  }
});

$( "#volume_2" ).change(function() {
  if(document.frmModalAktivitas.sumber_aktivitas.value==0) {
    hitungpaguASB();
  } 
});

$( ".id_satuan_publik" ).change(function() {
  if(document.frmModalAktivitas.sumber_aktivitas.value==0) {
    hitungpaguASB();
  }
});

$(document).on('click', '.add-aktivitas', function() {
        
      $('.btnAktivitas').addClass('addAktivitas');
      $('.btnAktivitas').removeClass('editAktivitas');      
      $('.form-horizontal').show();
      $('.modal-title').text('Tambah Aktivitas untuk kegiatan '+keg_renja);
      $('#id_renja_aktivitas').val(id_pelaksana_temp);
      $('#id_aktivitas').val(null);
      $('#tahun_renja_aktivitas').val(tahun_temp);
      $('#no_urut_aktivitas').val(1);
      $('#ur_aktivitas_kegiatan').val(null);
      $('#id_aktivitas_asb').val(null);
      document.frmModalAktivitas.jenis_aktivitas[0].checked=true;
      $('#sumber_dana').val(0);
      $('#pagu_aktivitas').val(0);      
      document.frmModalAktivitas.jenis_pembahasan[0].checked=true;
      $('#persen_musren_aktivitas').val(0);
      $('#pagu_musren_aktivitas').val(0);

      document.frmModalAktivitas.sumber_aktivitas[0].checked=true;
      $('.btnCariASB').show();

      $('#volume_1').val(1);
      $('#volume_2').val(1);
      $('#id_satuan_1').val(-1);
      $('#id_satuan_2').val(-1);

      $('#id_satuan_1').attr("disabled","disabled");
      $('#id_satuan_2').attr("disabled","disabled");

      $('#pagu_rata2_asb').val(0);
      $('#pagu_asb').val(0);
      // $('.id_satuan_publik').attr("disabled","disabled");
      // $('#pagu_aktivitas').attr("disabled","disabled");

      $('#persen_musren_aktivitas').attr("disabled","disabled");
      $('#ur_aktivitas_kegiatan').attr("disabled","disabled");

      $('#btnAktivitas').hide();
      // $('#btnHapusAktivitas').hide();
      $('#divMusren2').hide();

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
              'id_renja': id_pelaksana_temp,
              'tahun_renja': $('#tahun_renja_aktivitas').val(),
              'id_aktivitas_asb' : $('#id_aktivitas_asb').val() ,
              'uraian_aktivitas_kegiatan' : $('#ur_aktivitas_kegiatan').val() ,
              'sumber_dana' : $('#sumber_dana').val() ,
              'pagu_musren' : $('#persen_musren_aktivitas').val(),
              'pagu_aktivitas' : $('#pagu_aktivitas').val(),
              'pagu_rata2' : $('#pagu_rata2_asb').val(),
              'id_satuan_publik' : getSatuanPublik(),
              'volume_1' : $('#volume_1').val(),
              'volume_2' : $('#volume_2').val(),
              'id_satuan_1' : $('#id_satuan_1').val(),
              'id_satuan_2' : $('#id_satuan_2').val(), 
              'sumber_aktivitas' : getSumberASB() ,
              'jenis_kegiatan' : getJenisKegiatan() ,
              'status_musren': getJenisPembahasan(),
          },
          success: function(data) {
              aktivitas_tbl.ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              } 
          }
      });
  });

$(document).on('click', '.edit-aktivitas', function() {
  
    var data = aktivitas_tbl.row( $(this).parents('tr') ).data(); 
    var nilai_musren = data.pagu_aktivitas*(data.pagu_musren/100);
        
      $('.btnAktivitas').removeClass('addAktivitas');
      $('.btnAktivitas').addClass('editAktivitas');      
      $('.form-horizontal').show();
      $('.modal-title').text('Edit Aktivitas untuk kegiatan '+keg_renja);
      $('#id_renja_aktivitas').val(data.id_renja);
      $('#id_aktivitas').val(data.id_aktivitas_renja);
      $('#tahun_renja_aktivitas').val(data.tahun_renja);
      $('#no_urut_aktivitas').val(data.nomor);
      document.frmModalAktivitas.sumber_aktivitas[data.sumber_aktivitas].checked=true;
      $('#ur_aktivitas_kegiatan').val(data.uraian_aktivitas_kegiatan);
      $('#id_aktivitas_asb').val(data.id_aktivitas_asb);
      document.frmModalAktivitas.jenis_aktivitas[data.jenis_kegiatan].checked=true;
      $('#sumber_dana').val(data.sumber_dana);
      $('#pagu_aktivitas').val(data.pagu_aktivitas);      
      document.frmModalAktivitas.jenis_pembahasan[data.status_musren].checked=true;
      $('#persen_musren_aktivitas').val(data.pagu_musren);
      $('#pagu_musren_aktivitas').val(nilai_musren);
      $('#pagu_rata2_asb').val(data.pagu_rata2);

      if(data.id_satuan_publik != null && data.id_satuan_publik !=''){
        document.frmModalAktivitas.id_satuan_publik[data.id_satuan_publik].checked=true;
      };

      $('#volume_1').val(data.volume_1);
      $('#volume_2').val(data.volume_2);
      $('#id_satuan_1').val(data.id_satuan_1);
      $('#id_satuan_2').val(data.id_satuan_2); 

      // $('.chkAktivitas').show();
      if(data.status_data==1){
        $('.checkAktivitas').prop('checked',true);
        // $('#btnHapusAktivitas').hide();
        $('#btnAktivitas').hide();  
      } else {
        $('.checkAktivitas').prop('checked',false);
        // $('#btnHapusAktivitas').show();
        $('#btnAktivitas').hide(); 
      }      

      if(data.sumber_aktivitas==0){
        if(data.status_musren == 1){
          $('#divMusren2').show();
        } else {
          $('#divMusren2').hide();
        }
        $('#divMusren1').show();
        $('#divMusren').show();
      } else {
        $('#divMusren2').hide();
        $('#divMusren1').hide();
        $('#divMusren').hide();
      }  

      $('.jenis_pembahasan').removeAttr("disabled");
      $('#persen_musren_aktivitas').attr("disabled","disabled");

      $(':radio[name=jenis_pembahasan]:not(:checked)').attr('disabled', true);
      $(':radio[name=sumber_aktivitas]:not(:checked)').attr('disabled', true);
      $(':radio[name=jenis_aktivitas]:not(:checked)').attr('disabled', true);
      $(':radio[name=id_satuan_publik]:not(:checked)').attr('disabled', true);

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
                  'pagu_rata2' : $('#pagu_rata2_asb').val(),                  
                  'volume_1' : $('#volume_1').val(),
                  'volume_2' : $('#volume_2').val(),
                  'id_satuan_1' : $('#id_satuan_1').val(),
                  'id_satuan_2' : $('#id_satuan_2').val(),                
                  'id_satuan_publik' : getSatuanPublik(), 
                  'sumber_aktivitas' : getSumberASB() ,
                  'jenis_kegiatan' : getJenisKegiatan() ,
                  'status_data': check_data,
                  'status_musren': getJenisPembahasan(),
              },
              success: function(data) {
                  aktivitas_tbl.ajax.reload();
                  if(data.status_pesan==1){
                    createPesan(data.pesan,"success");
                  } else {
                    createPesan(data.pesan,"danger"); 
                  }
              }
          });
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
        aktivitas_tbl.ajax.reload();
        if(data.status_pesan==1){
          createPesan(data.pesan,"success");
        } else {
          createPesan(data.pesan,"danger"); 
        }
      }
    });
   } 
  else {    
    return false;
  }
});

$(document).on('click', '.add-lokasi', function() {

  var data = aktivitas_tbl.row( $(this).parents('tr') ).data(); 

  if(id_sat_asb1==null){
    id_sat_asb1=-1
  } else {
    id_sat_asb1
  };

  if(id_sat_asb2==null){
    id_sat_asb2=0
  } else {
    id_sat_asb2
  };
        
      $('.btnLokasi').addClass('addLokasi');
      $('.btnLokasi').removeClass('editLokasi');      
      $('.form-horizontal').show();
      $('.modal-title').text('Tambah Lokasi Pelaksanaan Aktivitas : '+ data.uraian_aktivitas_kegiatan);
      $('#id_pelaksana_lokasi').val(data.id_aktivitas_renja);
      $('#id_lokasi_renja').val(null);
      $('#tahun_renja_lokasi').val(data.tahun_renja);
      $('#no_urut_lokasi').val(0);
      $('#id_lokasi').val(null);
      $('#jenis_lokasi').val(null);
      $('#uraian_lokasi').val(null);
      $('#volume_1_lok').val(data.volume_1);
      $('#volume_2_lok').val(data.volume_2);
      $('#id_satuan_1_lok').val(data.id_satuan_1);
      $('#id_satuan_2_lok').val(data.id_satuan_2);
      $('#nm_lokasi').val(null);

      $('#satuan1_load').text(data.uraian_satuan_1);
      $('#satuan2_load').text(data.uraian_satuan_2);

      if(data.sumber_aktivitas==0){
        // if(data.status_musren ==0){
        //   $('#volume_1_lok').removeAttr("disabled");
        //   $('#volume_2_lok').removeAttr("disabled");
        // } else {
          if(data.id_satuan_publik==0){
            $('#volume_1_lok').removeAttr("disabled");
            $('#volume_2_lok').attr("disabled","disabled");
          } else {
            $('#volume_1_lok').attr("disabled","disabled");
            $('#volume_2_lok').removeAttr("disabled");
          }
        // }
      } else {
        $('#id_satuan_1_lok').removeAttr("disabled");
        $('#id_satuan_2_lok').removeAttr("disabled");
      }

      $('#ModalLokasi').modal('show');

  });

$('.modal-footer').on('click', '.addLokasi', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      if($('#volume_2_lok').val()>0){
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
              'volume_1' : $('#volume_1_lok').val(),
              'volume_2' : $('#volume_2_lok').val(),
              'id_satuan_1' : $('#id_satuan_1_lok').val(),
              'id_satuan_2' : $('#id_satuan_2_lok').val(),
              'uraian_lokasi' : $('#uraian_lokasi').val(),

          },
          success: function(data) {
              lokasi_tbl.ajax.reload();
              aktivitas_tbl.ajax.reload();
              $('#ModalLokasi').modal('hide');
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              } 
          }
      });
      } else {
        createPesan("Volume 2 harus lebih besar dari 0, jika tidak digunakan isi dengan angka 1 dan satuan N/A","warning"); 
      }

      
  });

$(document).on('click', '.edit-lokasi', function() {

  var data = lokasi_tbl.row( $(this).parents('tr') ).data();
        
      $('.btnLokasi').addClass('editLokasi');
      $('.btnLokasi').removeClass('addLokasi');      
      $('.form-horizontal').show();
      $('.modal-title').text('Ubah Data Lokasi Pelaksanaan Aktivitas : '+ data.id_aktivitas_asb);
      $('#id_pelaksana_lokasi').val(data.id_pelaksana_renja);
      $('#id_lokasi_renja').val(data.id_lokasi_renja);
      $('#tahun_renja_lokasi').val(data.tahun_renja);
      $('#no_urut_lokasi').val(data.no_urut);
      $('#id_lokasi').val(data.id_lokasi);
      $('#jenis_lokasi').val(data.jenis_lokasi);
      $('#uraian_lokasi').val(data.uraian_lokasi);
      $('#nm_lokasi').val(data.nama_lokasi);
      $('#volume_1_lok').val(data.volume_1);
      $('#volume_2_lok').val(data.volume_2);
      $('#id_satuan_1_lok').val(data.id_satuan_1);
      $('#id_satuan_2_lok').val(data.id_satuan_2);

      $('#satuan1_load').text(data.sat1_display);
      $('#satuan2_load').text(data.sat2_display);

      if(data.sumber_aktivitas==0){
        if(data.status_musren ==0){
          $('#volume_1_lok').removeAttr("disabled");
          $('#volume_2_lok').removeAttr("disabled");
        } else {
          if(data.id_satuan_publik==0){
            $('#volume_1_lok').removeAttr("disabled");
            $('#volume_2_lok').attr("disabled","disabled");
          } else {
            $('#volume_1_lok').attr("disabled","disabled");
            $('#volume_2_lok').removeAttr("disabled");
          }
        }
      } else {
        $('#id_satuan_1_lok').removeAttr("disabled");
        $('#id_satuan_2_lok').removeAttr("disabled");
      }

      

      $('#ModalLokasi').modal('show');

  });

$('.modal-footer').on('click', '.editLokasi', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      if($('#volume_2_lok').val()>0){
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
              'volume_1' : $('#volume_1_lok').val(),
              'volume_2' : $('#volume_2_lok').val(),
              'id_satuan_1' : $('#id_satuan_1_lok').val(),
              'id_satuan_2' : $('#id_satuan_2_lok').val(),
              'uraian_lokasi' : $('#uraian_lokasi').val(),

          },
          success: function(data) {
              lokasi_tbl.ajax.reload();
              aktivitas_tbl.ajax.reload();
              $('#ModalLokasi').modal('hide');
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
               
          }
      });
      } else {
        createPesan("Volume 2 harus lebih besar dari 0, jika tidak digunakan isi dengan angka 1 dan satuan N/A","warning"); 
      }
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
        lokasi_tbl.ajax.reload();
        aktivitas_tbl.ajax.reload();
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
    if(zona_temp == 0){
      createPesan("Maaf Zona Pemberlakuan SSH belum dipilih","danger");
      return;
    } else {
      $('#cariItemSSH').modal('show');
    }

  });

function LoadTblRekening(x,y){  
      rekening = $('#tblRekening').DataTable( {
        processing: true,
        serverSide: true,
        dom: 'BfrtIp',
        autoWidth : false,
        "ajax": {"url": "blang/getRekening/"+ x +"/"+y},
        "columns": [
              { data: 'no_urut'},
              { data: 'kd_rekening'},
              { data: 'nm_rekening'}
            ],
        "order": [[0, 'asc']],
        "bDestroy": true
      });
};

$(document).on('click', '.btnCariRekening', function() {

  var x

      if($('#rekening_ssh').val()==null || 
        $('#rekening_ssh').val()==undefined ||
        $('#rekening_ssh').val() == ""){
          x = 0
      } else {
          x = $('#rekening_ssh').val()
      }

      LoadTblRekening(x,$('#id_item_ssh').val());
      $('#cariRekening').modal('show');
      // $('#tblRekening').DataTable().ajax.url("blang/getRekening/"+ x +"/"+$('#id_item_ssh').val()).load();

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
    $('.btnHapusBelanja').show();
    $('.btnBelanja').show();
  } else {
    $('#btnCariSSH').removeClass('btnCariSSH');
    $('#btnCariRekening').removeClass('btnCariRekening');
    $('#btnCariSSH').addClass('catatan');
    $('#btnCariRekening').addClass('catatan');
    document.getElementById("volume1").setAttribute("disabled","disabled");
    document.getElementById("volume2").setAttribute("disabled","disabled");
    document.getElementById("zona_ssh").setAttribute("disabled","disabled");
    $('.btnHapusBelanja').hide();
    $('.btnBelanja').hide();
  }
}

function checkStatusbelanja(asal){
  if(asal==1){
    $('#btnCariSSH').addClass('btnCariSSH');
    $('#btnCariRekening').addClass('btnCariRekening');
    $('#btnCariSSH').removeClass('catatan');
    $('#btnCariRekening').removeClass('catatan');
    document.getElementById("volume1").removeAttribute("disabled");
    document.getElementById("volume2").removeAttribute("disabled");
    document.getElementById("zona_ssh").removeAttribute("disabled");
    $('.btnHapusBelanja').show();
    $('.btnBelanja').show();
  } else {
    $('#btnCariSSH').removeClass('btnCariSSH');
    $('#btnCariRekening').removeClass('btnCariRekening');
    $('#btnCariSSH').addClass('catatan');
    $('#btnCariRekening').addClass('catatan');
    document.getElementById("volume1").setAttribute("disabled","disabled");
    document.getElementById("volume2").setAttribute("disabled","disabled");
    document.getElementById("zona_ssh").setAttribute("disabled","disabled");
    $('.btnHapusBelanja').hide();
    $('.btnBelanja').hide();
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
      $('#id_lokasi_belanja').val(id_aktivitas_temp);
      $('#id_belanja').val(null);
      $('#tahun_renja_belanja').val(tahun_temp);
      $('#no_urut_belanja').val(1);
      $('#zona_ssh').val(0);
      $('#id_item_ssh').val(null);
      $('#rekening_ssh').val(null);
      $('#ur_item_ssh').val(null);
      $('#id_rekening').val(null);
      $('#ur_rekening').val(null);
      $('#volume1').val(vol1_temp);
      $('#id_satuan1').val(id_sat_asb1);
      // $('#satuan1').text(nm_sat_asb1);
      $('#volume2').val(vol2_temp);
      $('#harga_satuan').val(1);
      $('#jumlah_belanja').val(1);
      $('#uraian_belanja').val(null);
      $('#uraian_aktivitas_asb').val(null);
      $('#id_aktivitas_asb_belanja').val(0);
      $('#sumber_belanja').val(1);
      $('#id_satuan2').val(id_sat_asb2);
      // $('#satuan2').text(nm_sat_asb2);

      checkAsalbelanja(1);

      $('#ModalBelanja').modal('show');

  });

function validasiFormBelanja() {
  if ( $.trim( $('#no_urut_belanja').val()) == 0) {
    createPesan("Nomor Urut belum diisi dengan benar..!!","danger"); 
    return false;
  };
  if ( $.trim( $('#zona_ssh').val()) == "") {
    createPesan("Zona SSH belum dipilih..!!","danger"); 
    return false;
  };
  if ( $.trim( $('#id_item_ssh').val()) == "") {
    createPesan("SSH Belum dipilih..!!","danger"); 
    return false;
   } ;
  if ( $.trim( $('#id_rekening').val()) == "") {
    createPesan("Kode Rekening Belum dipilih..!!","danger"); 
    return false;
  } ;
  if ( $.trim( $('#volume1').val()) <= 0) {
    createPesan("Volume 1 harus diisi lebih besar dari 0","danger"); 
    return false;
  };
  if ( $.trim( $('#id_satuan1').val()) == "") {
    createPesan("SSH Belum dipilih..!!","danger"); 
    return false;
  };
  if ( $.trim( $('#volume2').val()) <= 0) {
    createPesan("Volume 2 harus diisi lebih besar dari 0!!","danger"); 
    return false;
  } ;
  if ( $.trim( $('#harga_satuan').val()) == "") {
    createPesan("SSH Belum dipilih..!!","danger"); 
    return false;
  } ;
}

$('.modal-footer').on('click', '.addBelanja', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });
      
      if (validasiFormBelanja() != false) {
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
              belanja_renja_tbl.ajax.reload();
              aktivitas_tbl.ajax.reload();
              // $('#tblPelaksana').DataTable().ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
          }
      });
      }
  });

$(document).on('click', '.edit-belanja', function() {
  
  var data = belanja_renja_tbl.row( $(this).parents('tr') ).data();

      // console.log(data);
        
      $('.btnBelanja').addClass('editBelanja');
      $('.btnBelanja').removeClass('addBelanja');      
      $('.form-horizontal').show();
      $('.modal-title').text('Tambah Uraian Belanja : '+aktivitas_renja);
      $('#id_lokasi_belanja').val(data.id_lokasi_renja);
      $('#id_belanja').val(data.id_belanja_renja);
      $('#tahun_renja_belanja').val(data.tahun_renja);
      $('#no_urut_belanja').val(data.no_urut);
      $('#zona_ssh').val(data.id_zona_ssh);
      $('#id_item_ssh').val(data.id_tarif_ssh);
      $('#rekening_ssh').val();
      $('#ur_item_ssh').val(data.uraian_tarif_ssh);
      $('#id_rekening').val(data.id_rekening_ssh);
      $('#ur_rekening').val(data.kd_rekening +' - '+data.nm_rekening);
      $('#volume1').val(data.volume_1);
      $('#id_satuan1').val(data.id_satuan_1);
      // $('#satuan1').text(data.satuan_1);
      $('#volume2').val(data.volume_2);
      $('#harga_satuan').val(data.harga_satuan);
      $('#jumlah_belanja').val(data.jml_belanja);
      $('#uraian_belanja').val(data.uraian_belanja);
      $('#uraian_aktivitas_asb').val(data.nm_aktivitas_asb);
      $('#id_aktivitas_asb_belanja').val(data.id_aktivitas_asb);
      $('#sumber_belanja').val(data.sumber_aktivitas);
      $('#id_satuan2').val(data.id_satuan_2);
      // $('#satuan2').text(data.satuan_2);

      checkAsalbelanja(data.sumber_aktivitas);

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
      
  if (validasiFormBelanja() != false) {
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
              belanja_renja_tbl.ajax.reload();
              aktivitas_tbl.ajax.reload();
              // $('#tblPelaksana').DataTable().ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              } 
          }
      });
  }
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
        belanja_renja_tbl.ajax.reload();
        aktivitas_tbl.ajax.reload();
        // $('#tblPelaksana').DataTable().ajax.reload();
        $('#ModalBelanja').modal('hide');
        if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              } 
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
      $('#uraian_aktivitas_asb_load').val(aktivitas_renja);
      $('#status_musren_belanja').val(status_musren_temp);     
      
      $('#v1_load').val(vol1_temp);
      $('#v2_load').val(vol2_temp);
      $('#satuan1_load_asb').text(nm_sat_asb1);
      $('#satuan2_load_asb').text(nm_sat_asb2);

      $.ajax({
          type: "GET",
          url: '../admin/parameter/getZonaSSH',
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

      $('#loadBelanjaASB').modal('show');

});

$(document).on('click', '.btnUnLoadAsb', function() {

  $.ajax({
          type: 'post',
          url: './blang/unloadASB',
          data: {
            '_token': $('input[name=_token]').val(),
            'id_aktivitas_asb': id_asb_temp,
            'id_lokasi_renja': id_aktivitas_temp,
          },
          success: function(data) {
            belanja_renja_tbl.ajax.reload();
            aktivitas_tbl.ajax.reload();
            // $('#tblPelaksana').DataTable().ajax.reload();
            if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              } 
          }
        });
});

function getJnsBiaya(){

    var xCheck = document.querySelectorAll('input[name="jns_biaya_asb"]:checked');
    var xyz = [];
    for(var x = 0, l = xCheck.length; x < l;  x++)
      { xyz.push(xCheck[x].value); }
    var xvalues = xyz.join('');
    return xvalues;
  }

$(document).on('click', '.btnLoadAsb', function() {
   var vol1=$('#v1_load').val();
   var vol2=$('#v2_load').val();
   var totalpagu;

   totalpagu=0;

   if(id_satuan_publik_temp == 0){
    totalpagu = pagu_rata2_temp*vol1_temp;
   } else {
    totalpagu = pagu_rata2_temp*vol2_temp;
   };

   // alert(vol1_temp+"/"+vol2_temp+"/"+totalpagu);

            $.ajax({
                  type: 'post',
                  url: 'blang/getHitungASB',
                  data: {
                      '_token': $('input[name=_token]').val(),
                      'tahun_renja' : tahun_temp,
                      'id_lokasi_renja' : id_aktivitas_temp,
                      'id_aktivitas_asb' : id_asb_temp,
                      'nama_aktivitas' : aktivitas_renja,
                      'volume_1' : vol1_temp,
                      'id_satuan_1' : id_sat_asb1,
                      'volume_2' : vol2_temp,
                      'id_satuan_2' : id_sat_asb2,
                      'pagu_rata2' : pagu_rata2_temp,
                      'pagu_asb' : totalpagu,
                      'jns_biaya' : status_musren_temp,
                  },
                  success: function(data) {
                    belanja_renja_tbl.ajax.reload();
                    aktivitas_tbl.ajax.reload();
                    // $('#tblPelaksana').DataTable().ajax.reload();
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