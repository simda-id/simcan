<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app2')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <?php
                $this->title = 'Data Program Renja - PPAS';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = 'modul3';
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
          <p>
            <h2 id="judul" class="panel-title"> Data Program Renja Perangkat Daerah</h2>
          </p>
        </div>
        <div class="panel-body">
          <form name="" class="form-horizontal" role="form" autocomplete='off' action="" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <label for="tahun_rkpd" class="col-sm-3 control-label text-left" align='left'>Tahun Perencanaan :</label>
              <div class="col-sm-2">
                <input class="form-control text-center" type="text" id="tahun_rkpd" name="tahun_rkpd"
                  value="{{Session::get('tahun')}}" disabled>
              </div>
              <button id="btnPostUnit" type="button" class="btnPostUnit btn-labeled btn-sm btn-success hidden">
                <span class="btn-label"><i class="glyphicon glyphicon-upload"></i></span>Posting Unit</button>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3 text-left" for="id_dokumen_keu">Nomor Dokumen PPAS :</label>
              <div class="col-sm-5">
                <select class="form-control id_dokumen_keu select2" name="id_dokumen_keu" id="id_dokumen_keu"></select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3 text-left" for="id_unit">Unit Penyusun Renstra :</label>
              <div class="col-sm-5">
                <select class="form-control id_Unit select2" name="id_unit" id="id_unit"></select>
              </div>
            </div>
          </form>
          <div class='tabs-x tabs-above tab-bordered tabs-krajee'>
            <ul class="nav nav-tabs nav-justified" role="tablist">
              <li class="active"><a href="#programrkpd" aria-controls="programrkpd" role="tab" data-toggle="tab">Program
                  Pemda</a></li>
              <li class="disabled"><a href="#program" aria-controls="program" role="tab-kv"
                  data-toggle="tab">Program</a></li>
              <li class="disabled"><a href="#kegiatan" aria-controls="kegiatan" role="tab-kv"
                  data-toggle="tab">Kegiatan</a></li>
              <li class="disabled"><a href="#subkegiatan" aria-controls="subkegiatan" role="tab-kv"
                  data-toggle="tab">Sub Kegiatan</a></li>
              <li class="disabled"><a href="#pelaksana" aria-controls="pelaksana" role="tab-kv"
                  data-toggle="tab">Pelaksana</a></li>
              <li class="disabled"><a href="#aktivitas" aria-controls="aktivitas" role="tab-kv"
                  data-toggle="tab">Aktivitas</a></li>
              <li class="disabled"><a href="#lokasi" aria-controls="lokasi" role="tab-kv" data-toggle="tab">Lokasi</a>
              </li>
              <li class="disabled"><a href="#belanja" aria-controls="belanja" role="tab-kv" data-toggle="tab">Rincian
                  Belanja</a></li>
            </ul>

            <div class="tab-content">
              <br>
              <div role="tabpanel" class="tab-pane fade in active" id="programrkpd">
                <div class="col-md-12">
                  <table id="tblProgramRKPD" class="table table-striped table-bordered table-responsive compact"
                    width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th width="5px" rowspan="3" style="text-align: center; vertical-align:middle"></th>
                        <th width="5px" rowspan="3" style="text-align: center; vertical-align:middle">No Urut</th>
                        <th rowspan="3" style="text-align: center; vertical-align:middle">Nama Program</th>
                        <th colspan="4" style="text-align: center; vertical-align:middle">Rincian Data</th>
                        <th width="15px" rowspan="3" style="text-align: center; vertical-align:middle">Status</th>
                      </tr>
                      <tr>
                        <th width="15px" rowspan="2" style="text-align: center; vertical-align:middle">Program OPD</th>
                        <th colspan="2" style="text-align: center; vertical-align:middle">Kegiatan OPD</th>
                        <th width="15px" rowspan="2" style="text-align: center; vertical-align:middle">Aktivitas OPD
                        </th>
                      </tr>
                      <tr>
                        <th width="15px" style="text-align: center; vertical-align:middle">Jumlah</th>
                        <th width="50px" style="text-align: center; vertical-align:middle">Pagu Total</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane fade in" id="program">
                <div class="col-md-12">
                  <div id="divTambahProgX">
                    <button id="btnTambahProgRenja" type="button" class="add-ProgRenja btn btn-labeled btn-success">
                      <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Program</button>
                  </div>
                  <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered">
                        <tbody>
                          <tr>
                            <td width="20%" style="text-align: left; vertical-align:top;">Program RKPD - PPAS</td>
                            <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd"
                                id="nm_program_progrenja" align='left'></label></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </form>
                  <table id="tblProgram" class="table table-striped table-bordered table-responsive compact"
                    width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th width="5px" rowspan="2" style="text-align: center; vertical-align:middle"></th>
                        <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">Aksi</th>
                        <th rowspan="2" width='5px' style="text-align: center; vertical-align:middle">No Urut</th>
                        <th rowspan="2" style="text-align: center; vertical-align:middle">Nama Program Perangkat Daerah
                        </th>
                        <th rowspan="2" width='10%' style="text-align: center; vertical-align:middle">Pagu Program</th>
                        <th colspan="3" style="text-align: center; vertical-align:middle">Kegiatan</th>
                        <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">Status</th>
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
                <div id="divTambahKegiatanX">
                  <button id="btnTambahKegiatan" type="button" class="add-Kegiatan btn btn-labeled btn-success">
                    <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Kegiatan</button>
                </div>
                <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                      <tbody>
                        <tr>
                          <td width="20%%" style="text-align: left; vertical-align:top;">Program RKPD - PPAS</td>
                          <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd"
                              id="nm_progrkpd_kegrenja" align='left'></label></td>
                        </tr>
                        <tr>
                          <td width="20%%" style="text-align: left; vertical-align:top;">Program Perangkat Daerah</td>
                          <td style="text-align: left; vertical-align:top;"><label class="backRenja"
                              id="nm_progrenja_kegrenja" align='left'></label></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </form>
                <table id="tblKegiatanRenja" class="table table-striped table-bordered table-responsive compact"
                  width="100%">
                  <thead>
                    <tr>
                      <th width="5px" rowspan="2" style="text-align: center; vertical-align:middle"></th>
                      <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">Aksi</th>
                      <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">No Urut</th>
                      <th rowspan="2" style="text-align: center; vertical-align:middle">Nama Kegiatan Perangkat Daerah
                      </th>
                      <th colspan="2" width='20%' style="text-align: center; vertical-align:middle">Pagu Kegiatan</th>
                      <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">Status</th>
                    </tr>
                    <tr>
                      <th width='10%' style="text-align: center; vertical-align:middle">RKPD</th>
                      <th width='10%' style="text-align: center; vertical-align:middle">PPAS</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
              <div role="tabpanel" class="tab-pane fade in" id="subkegiatan">
                <div id="divTambahSubKegiatan">
                  <button id="btnTambahSubKegiatan" type="button" class="add-Kegiatan btn btn-labeled btn-success">
                    <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Sub Kegiatan</button>
                </div>
                <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                      <tbody>
                        <tr>
                          <td width="20%%" style="text-align: left; vertical-align:top;">Program RKPD - PPAS</td>
                          <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd"
                              id="nm_progrkpd_subkeg" align='left'></label></td>
                        </tr>
                        <tr>
                          <td width="20%%" style="text-align: left; vertical-align:top;">Program Perangkat Daerah</td>
                          <td style="text-align: left; vertical-align:top;"><label class="backRenja"
                              id="nm_progrenja_subkeg" align='left'></label></td>
                        </tr>
                        <tr>
                          <td width="20%" style="text-align: left; vertical-align:top;">Kegiatan Perangkat Daerah</td>
                          <td style="text-align: left; vertical-align:top;"><label class="backKegiatan"
                              id="nm_kegrenja_subkeg" align='left'></label></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </form>
                <table id="tblSubKegiatanRenja" class="table table-striped table-bordered table-responsive compact"
                  width="100%">
                  <thead>
                    <tr>
                      <th width="5px" rowspan="2" style="text-align: center; vertical-align:middle"></th>
                      <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">Aksi</th>
                      <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">No Urut</th>
                      <th rowspan="2" style="text-align: center; vertical-align:middle">Nama Kegiatan Perangkat Daerah
                      </th>
                      <th colspan="2" width='20%' style="text-align: center; vertical-align:middle">Pagu Kegiatan</th>
                      <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">Status</th>
                    </tr>
                    <tr>
                      <th width='10%' style="text-align: center; vertical-align:middle">RKPD</th>
                      <th width='10%' style="text-align: center; vertical-align:middle">PPAS</th>
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
                <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                      <tbody>
                        <tr>
                          <td width="20%" style="text-align: left; vertical-align:top;">Program RKPD - PPAS</td>
                          <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd"
                              id="nm_progrkpd_pelaksana" align='left'></label></td>
                        </tr>
                        <tr>
                          <td width="20%" style="text-align: left; vertical-align:top;">Program Perangkat Daerah</td>
                          <td style="text-align: left; vertical-align:top;"><label class="backRenja"
                              id="nm_progrenja_pelaksana" align='left'></label></td>
                        </tr>
                        <tr>
                          <td width="20%" style="text-align: left; vertical-align:top;">Kegiatan Perangkat Daerah</td>
                          <td style="text-align: left; vertical-align:top;"><label class="backKegiatan"
                              id="nm_kegrenja_pelaksana" align='left'></label></td>
                        </tr>
                        <tr>
                          <td width="20%" style="text-align: left; vertical-align:top;">Sub Kegiatan Perangkat Daerah
                          </td>
                          <td style="text-align: left; vertical-align:top;"><label class="backSubKegiatan"
                              id="nm_subkeg_pelaksana" align='left'></label></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </form>
                <table id="tblPelaksana" class="table table-striped table-bordered table-responsive compact"
                  width="100%">
                  <thead>
                    <tr>
                      <th width='5%' style="text-align: center; vertical-align:middle">Aksi</th>
                      <th width='50px' style="text-align: center; vertical-align:middle">No Urut</th>
                      <th style="text-align: center; vertical-align:middle">Nama Sub Unit Pelaksana</th>
                      <th width='15%' style="text-align: center; vertical-align:middle">Lokasi Penyelenggaraan</th>
                      <th width='10%' style="text-align: center; vertical-align:middle">Pagu Aktivitas</th>
                      <th width='10%' style="text-align: center; vertical-align:middle">Pagu Belanja</th>
                      <th width='10%' style="text-align: center; vertical-align:middle">Jumlah Lokasi</th>
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
                <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                      <tbody>
                        <tr>
                          <td width="20%" style="text-align: left; vertical-align:top;">Program RKPD</td>
                          <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd"
                              id="nm_progrkpd_aktivitas" align='left'></label></td>
                        </tr>
                        <tr>
                          <td width="20%" style="text-align: left; vertical-align:top;">Program Perangkat Daerah</td>
                          <td style="text-align: left; vertical-align:top;"><label class="backRenja"
                              id="nm_progrenja_aktivitas" align='left'></label></td>
                        </tr>
                        <tr>
                          <td width="20%" style="text-align: left; vertical-align:top;">Kegiatan Perangkat Daerah</td>
                          <td style="text-align: left; vertical-align:top;"><label class="backKegiatan"
                              id="nm_kegrenja_aktivitas" align='left'></label></td>
                        </tr>
                        <tr>
                          <td width="20%" style="text-align: left; vertical-align:top;">Sub Kegiatan Perangkat Daerah
                          </td>
                          <td style="text-align: left; vertical-align:top;"><label class="backSubKegiatan"
                              id="nm_subkeg_aktivitas" align='left'></label></td>
                        </tr>
                        <td width="20%" style="text-align: left; vertical-align:top;">Pelaksana Kegiatan</td>
                        <td style="text-align: left; vertical-align:top;"><label class="backPelaksana"
                            id="nm_aktivitas_pelaksana" align='left'></label></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </form>
                <table id="tblAktivitas" class="table table-striped table-bordered table-responsive compact"
                  width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">Aksi</th>
                      <th rowspan="2" width='50px' style="text-align: center; vertical-align:middle">No Urut</th>
                      <th rowspan="2" style="text-align: center; vertical-align:middle">Nama Aktivitas</th>
                      <th rowspan="2" width='10%' style="text-align: center; vertical-align:middle">Pagu Aktivitas</th>
                      <th rowspan="2" width='10%' style="text-align: center; vertical-align:middle">Jml Belanja</th>
                      <th colspan="2" width='10%' style="text-align: center; vertical-align:middle">Volume</th>
                      <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">Status</th>
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
                <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                      <tbody>
                        <tr>
                          <td width="20%" style="text-align: left; vertical-align:top;">Program RKPD - PPAS</td>
                          <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd"
                              id="nm_progrkpd_lokasi" align='left'></label></td>
                        </tr>
                        <tr>
                          <td width="20%" style="text-align: left; vertical-align:top;">Program Perangkat Daerah</td>
                          <td style="text-align: left; vertical-align:top;"><label class="backRenja"
                              id="nm_progrenja_lokasi" align='left'></label></td>
                        </tr>
                        <tr>
                          <td width="20%" style="text-align: left; vertical-align:top;">Kegiatan Perangkat Daerah</td>
                          <td style="text-align: left; vertical-align:top;"><label class="backKegiatan"
                              id="nm_kegrenja_lokasi" align='left'></label></td>
                        </tr>
                        <tr>
                          <td width="20%" style="text-align: left; vertical-align:top;">Sub Kegiatan Perangkat Daerah
                          </td>
                          <td style="text-align: left; vertical-align:top;"><label class="backSubKegiatan"
                              id="nm_subkeg_lokasi" align='left'></label></td>
                        </tr>
                        <tr>
                          <td width="20%" style="text-align: left; vertical-align:top;">Sub Unit Pelaksana</td>
                          <td style="text-align: left; vertical-align:top;"><label class="backPelaksana"
                              id="nm_sub_lokasi" align='left'></label></td>
                        </tr>
                        <tr>
                          <td width="20%" style="text-align: left; vertical-align:top;">Aktivitas Kegiatan</td>
                          <td style="text-align: left; vertical-align:top;"><label class="backAktivitas"
                              id="nm_aktivitas_lokasi" align='left'></label></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </form>
                <table id="tblLokasi" class="table table-striped table-bordered table-responsive compact" width="100%"
                  cellspacing="0">
                  <thead>
                    <tr>
                      <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">Aksi</th>
                      <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">No Urut</th>
                      <th rowspan="2" width='20%' style="text-align: center; vertical-align:middle">Sumber Usulan</th>
                      <th rowspan="2" style="text-align: center; vertical-align:middle">Nama Lokasi</th>
                      <th colspan="2" width='10%' style="text-align: center; vertical-align:middle">Volume</th>
                      <th rowspan="2" width='10%' style="text-align: center; vertical-align:middle">Status</th>
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
                    <span class="btn-label"><i class="fa fa-exchange fa-fw fa-lg"></i></span>Copy dari Aktivitas
                    Lain</a>
                  <a id="btnCetakRKA" type="button" class="btnCetakRKA btn btn-labeled btn-default hidden">
                    <span class="btn-label"><i class="fa fa-print fa-fw fa-lg"></i></span>Cetak RKA 2.2.1</a>
                </div>
                <div id="divImportASB">
                  <a id="btnTambahBelanjaASB" type="button" class="add-belanjaASB btn btn-labeled btn-info">
                    <span class="btn-label"><i class="fa fa-download fa-fw fa-lg"></i></span>Tambah dari ASB</a>
                  <a id="btnUnLoadAsb" type="button" class="btnUnLoadAsb btn btn-labeled btn-danger">
                    <span class="btn-label"><i class="fa fa-stack-overflow fa-fw fa-lg"></i></span>Unload Belanja</a>
                  <a id="btnCetakRKA1" type="button" class="btnCetakRKA1 btn btn-labeled btn-default hidden">
                    <span class="btn-label"><i class="fa fa-print fa-fw fa-lg"></i></span>Cetak RKA 2.2.1</a>
                </div>
                <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                      <tbody>
                        <tr>
                          <td width="20%" style="text-align: left; vertical-align:top;">Program RKPD - PPAS</td>
                          <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd"
                              id="nm_progrkpd_belanja" align='left'></label></td>
                        </tr>
                        <tr>
                          <td width="20%" style="text-align: left; vertical-align:top;">Program Perangkat Daerah</td>
                          <td style="text-align: left; vertical-align:top;"><label class="backRenja"
                              id="nm_progrenja_belanja" align='left'></label></td>
                        </tr>
                        <tr>
                          <td width="20%" style="text-align: left; vertical-align:top;">Kegiatan Perangkat Daerah</td>
                          <td style="text-align: left; vertical-align:top;"><label class="backKegiatan"
                              id="nm_kegrenja_belanja" align='left'></label></td>
                        </tr>
                        <tr>
                          <td width="20%" style="text-align: left; vertical-align:top;">Sub Kegiatan Perangkat Daerah
                          </td>
                          <td style="text-align: left; vertical-align:top;"><label class="backSubKegiatan"
                              id="nm_subkeg_belanja" align='left'></label></td>
                        </tr>
                        <tr>
                          <td width="20%" style="text-align: left; vertical-align:top;">Sub Unit Pelaksana</td>
                          <td style="text-align: left; vertical-align:top;"><label class="backPelaksana"
                              id="nm_sub_belanja" align='left'></label></td>
                        </tr>
                        <tr>
                          <td width="20%" style="text-align: left; vertical-align:top;">Aktivitas Kegiatan</td>
                          <td style="text-align: left; vertical-align:top;"><label class="backAktivitas"
                              id="nm_aktivitas_belanja" align='left'></label></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </form>
                <table id="tblBelanja" class="table table-striped table-bordered table-responsive compact" width="100%"
                  cellspacing="0">
                  <thead>
                    <tr>
                      <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">Aksi</th>
                      <th rowspan="2" width='5%' style="text-align: center; vertical-align:middle">No Urut</th>
                      <th rowspan="2" width='25%' style="text-align: center; vertical-align:middle">Kode Rekening</th>
                      <th rowspan="2" style="text-align: center; vertical-align:middle">Item Belanja</th>
                      <th colspan="2" width='10%' style="text-align: center; vertical-align:middle">Output</th>
                      <th colspan="2" width='20%' style="text-align: center; vertical-align:middle">Jumlah Belanja</th>
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
  <table class="table table-striped table-bordered table-responsive compact details-table" id="bidang-@{{id_unit}}@{{id_anggaran_pemda}}">
            <thead>
              <tr>
                <th width="20px" style="text-align: center; vertical-align:middle;">Aksi</th>
                <th width="15%" style="text-align: center; vertical-align:middle;">Kd Bidang</th>
                <th style="text-align: center; vertical-align:middle;">Nama Bidang</th>
              </tr>
            </thead>
            <tbody></tbody>
        </table>
</script>

<script id="details-inProg" type="text/x-handlebars-template">
  <table class="table table-striped display table-bordered table-responsive compact details-table" id="inProg-@{{id_program_pd}}">
            <thead>
              <tr>
                <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                <th style="text-align: center; vertical-align:middle">Uraian Indikator</th>
                <th width="5%" style="text-align: center; vertical-align:middle">Target Renstra</th>
                <th width="5%" style="text-align: center; vertical-align:middle">Target Renja</th>
                <th width="50px" style="text-align: center; vertical-align:middle">Status</th>
              </tr>
            </thead>
            <tbody></tbody>
        </table>
</script>

<script id="details-inKeg" type="text/x-handlebars-template">
  <table class="table table-striped display table-bordered table-responsive compact details-table" id="inKeg-@{{id_kegiatan_pd}}">
            <thead>
              <tr>
                <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                <th style="text-align: center; vertical-align:middle">Uraian Indikator</th>
                <th width="5%" style="text-align: center; vertical-align:middle">Target Renstra</th>
                <th width="5%" style="text-align: center; vertical-align:middle">Target Renja</th>
                <th width="50px" style="text-align: center; vertical-align:middle">Status</th>
              </tr>
            </thead>
            <tbody></tbody>
        </table>
</script>

<script id="details-inSubKeg" type="text/x-handlebars-template">
  <table class="table table-striped display table-bordered table-responsive compact details-table" id="inSubKeg-@{{id_subkegiatan_pd}}">
            <thead>
              <tr>
                <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                <th style="text-align: center; vertical-align:middle">Uraian Indikator</th>
                <th width="5%" style="text-align: center; vertical-align:middle">Target Renstra</th>
                <th width="5%" style="text-align: center; vertical-align:middle">Target Renja</th>
                <th width="50px" style="text-align: center; vertical-align:middle">Status</th>
              </tr>
            </thead>
            <tbody></tbody>
        </table>
</script>

@include('90_ppas.program_pd')
@include('90_ppas.program_indikator_pd')
@include('90_ppas.kegiatan_pd')
@include('90_ppas.kegiatan_indikator_pd')
@include('90_ppas.subkegiatan_pd')
@include('90_ppas.subkegiatan_indikator_pd')
@include('90_ppas.pelaksana_pd')
@include('90_ppas.aktivitas_pd')
@include('90_ppas.lokasi_pd')
@include('90_ppas.belanja_pd')

@include('90_ppas.cariProgramRenstra')
@include('90_ppas.cariKegiatanRenstra')
@include('90_ppas.cariProgramRef')
@include('90_ppas.cariKegiatanRef')
@include('90_ppas.cariSubKegiatanRef')
@include('90_ppas.cariIndikator')
@include('90_ppas.cariSubUnit')
@include('90_ppas.cariAktivitasASB')
@include('90_ppas.cariLokasiModal')
@include('90_ppas.cariLokasiTeknisModal')
@include('90_ppas.cariItemSSH')
@include('90_ppas.cariRekening')
@include('90_ppas.aktivitasMove')
@include('90_ppas.ModalCopyBelanja')
@include('90_ppas.loadBelanjaASB')

@endsection

@section('scripts')
<script src="{{ asset('/protected/resources/views/90_ppas/js/js_penyesuaian_pd.js')}}"></script>
@endsection