<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app')


@section('content')
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?php
                $this->title = 'Data Musrenbang RKPD';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = 'modul2';
                $breadcrumb->begin();
                $breadcrumb->add(['label' => 'RKPD']);
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
            <h2 class="panel-title">Daftar Usulan Program Musrenbang RKPD</h2>
          </div>
          <div class="panel-body">
          <div class='tabs-x tabs-above tab-bordered tabs-krajee'>
            <ul class="nav nav-tabs" role="tablist">
              <li class="active"><a href="#program" aria-controls="program" role="tab" data-toggle="tab">Program RKPD</a></li>
              <li class="disabled"><a href="#indikator" aria-controls="indikator" role="tab-kv" data-toggle="tab">Indikator Program RKPD</a></li>
              <li class="disabled"><a href="#urusan" aria-controls="urusan" role="tab-kv" data-toggle="tab">Urusan Pemerintahan RKPD</a></li>
              <li class="disabled"><a href="#pelaksana" aria-controls="pelaksana" role="tab-kv" data-toggle="tab">Pelaksana Program RKPD</a></li>
            </ul>

            <div class="tab-content">
              <div role="tabpanel" class="tab-pane fade in active" id="program">
              <br>              
              <div>
                <a id="btnTambahProg" class="add-programrkpd btn btn-labeled btn-success" data-toggle="popover" data-html="true" data-container="body" title="Ranwal RKPD" data-trigger="hover" data-content="Program baru yang belum ada di RPJMD">
                  <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span> Tambah Program</a>
                  </div>
              <div>
              <table id="tblProgramRKPD" class="table display table-responsive table-striped compact table-bordered"  cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th rowspan="2" width="3%" style="text-align: center; vertical-align:middle">No Urut</th>
                                <th rowspan="2" style="text-align: center; vertical-align:middle">Uraian Program RKPD</th>
                                <th rowspan="2" width="10%" style="text-align: center; vertical-align:middle">Pagu RPJMD</th>
                                <th rowspan="2" width="10%" style="text-align: center; vertical-align:middle">Pagu RKPD</th>
                                <th rowspan="2" width="10%" style="text-align: center; vertical-align:middle">Pagu OPD</th>
                                <th colspan="2" width="3%" style="text-align: center; vertical-align:middle">Indikator</th>
                                <th colspan="2" width="3%" style="text-align: center; vertical-align:middle">Pelaksana</th>
                                <th rowspan="2" width="8%" style="text-align: center; vertical-align:middle">Status Pelaksanaan</th>
                                <th rowspan="2" width="3%" style="text-align: center; vertical-align:middle">Status Usulan</th>
                                <th rowspan="2" width="8%" style="text-align: center; vertical-align:middle">Aksi</th>
                            </tr>
                            <tr>
                                <th style="text-align: center; vertical-align:middle">Jml</th>
                                <th style="text-align: center; vertical-align:middle">Reviu</th>
                                <th style="text-align: center; vertical-align:middle">Jml</th>
                                <th style="text-align: center; vertical-align:middle">Reviu</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
              </table>
              </div>
              </div>
              <div role="tabpanel" class="tab-pane fade in" id="indikator" >
              <br>
              <div class="divAddIndikator">
                <p>
                  <a id="btnTambahIndikator" class="add-indikator btn btn-labeled btn-success" data-toggle="popover" data-html="true" data-container="body" title="Ranwal RKPD" data-trigger="hover" data-content="Indikator baru yang belum ada di RPJMD, namun menjadi indikator program pada RKPD tahun berjalan"><span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span> Tambah Indikator</a>
                  <a id="btnReviuIndikator" class="btn btn-labeled btn-primary" data-toggle="popover" data-html="true" data-container="body" title="Ranwal RKPD" data-trigger="hover" data-content="Melakukan Reviu Terhadap Data Indikator secara sekaligus atau sesuai pilihan"><span class="btn-label"><i class="fa fa-check-square-o fa-fw fa-lg"></i></span> Reviu Indikator</a>
                </p>
              </div>
              <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
              <div class="">
                <table class="table table-striped table-bordered table-responsive">
                  <tbody>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Program RPJMD</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_program_rpjmd_indikator" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Program RKPD</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_program_rkpd_indikator" align='left'></label></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              </form>
              <div class="">
              <table id="tblIndikatorRKPD" class="table display table-striped compact table-bordered table-responsive"  cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="5%" style="text-align: center; vertical-align:middle">Pilih</th>
                                <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                                <th style="text-align: center; vertical-align:middle">Uraian Indikator</th>
                                <th style="text-align: center; vertical-align:middle">Uraian Tolok Ukur</th>
                                <th width="5%" style="text-align: center; vertical-align:middle">Target RPJMD</th>
                                <th width="5%" style="text-align: center; vertical-align:middle">Target RKPD</th>
                                <th width="50px" style="text-align: center; vertical-align:middle">Status</th>
                                <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
              </table>
              </div>
              </div>
              <div role="tabpanel" class="tab-pane fade in" id="urusan" >
              <br>
              <div class="divAddUrusan">
                <p><a id="btnTambahUrusan" class="add-urusan btn btn-labeled btn-success" data-toggle="popover" data-html="true" data-container="body" title="Ranwal RKPD" data-trigger="hover" data-content="Urusan Pelaksana selain yang telah ditetapkan di RPJMD"><span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span> Tambah Urusan</a></p>
              </div>
              <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
              <div class="">
                <table class="table table-striped table-bordered table-responsive">
                  <tbody>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Program RPJMD</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_program_rpjmd_urusan" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Program RKPD</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_program_rkpd_urusan" align='left'></label></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              </form>
              <div class="">
              <table id="tblUrusanRKPD" class="table display table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                {{-- <th></th> --}}
                                <th rowspan="2" width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                                <th rowspan="2" width="35%" style="text-align: center; vertical-align:middle">Uraian Urusan</th>
                                <th rowspan="2" style="text-align: center; vertical-align:middle">Uraian Bidang</th>
                                <th colspan="2" width="10%" style="text-align: center; vertical-align:middle">Pelaksana</th>
                                <th rowspan="2" width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                            </tr>
                            <tr>
                                <th width="5%" style="text-align: center; vertical-align:middle">Jml</th>
                                <th width="5%" style="text-align: center; vertical-align:middle">Reviu</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                </table>
              </div>
              </div>
              <div role="tabpanel" class="tab-pane fade in" id="pelaksana" >
              <br>
              <div class="divAddPelaksana">
                <p>
                  <a id="btnBackUrusan" class="btn btn-warning hidden" data-toggle="popover" data-html="true" data-container="body" title="Ranwal RKPD" data-trigger="hover" data-content="Kembali ke Tabel Urusan"><i class="fa fa-arrow-left fa-fw fa-lg"></i></a>
                  <a id="btnTambahPelaksana" class="add-pelaksana btn btn-labeled btn-success" data-toggle="popover" data-html="true" data-container="body" title="Ranwal RKPD" data-trigger="hover" data-content="Perangkat Daerah Pelaksana selain yang telah ditetapkan di RPJMD"><span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span> Tambah Pelaksana</a>
                  <a id="btnReviuPelaksana" class="btn btn-labeled btn-primary" data-toggle="popover" data-html="true" data-container="body" title="Ranwal RKPD" data-trigger="hover" data-content="Melakukan Reviu Terhadap Data Pelaksana secara sekaligus atau sesuai pilihan"><span class="btn-label"><i class="fa fa-check-square-o fa-fw fa-lg"></i></span> Reviu Pelaksana</a>
                </p>
              </div>
              <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
              <div class="">
                <table class="table table-striped table-bordered table-responsive">
                  <tbody>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Program RPJMD</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_program_rpjmd_pelaksana" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Program RKPD</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_program_rkpd_pelaksana" align='left'></label></td>
                    </tr>
                    <tr class="backUrusan">
                      <td width="15%" style="text-align: left; vertical-align:top;">Urusan Pemerintahan</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_urusan_pelaksana" align='left'></label></td>
                    </tr>
                    <tr class="backUrusan">
                      <td width="15%" style="text-align: left; vertical-align:top;">Bidang</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_bidang_pelaksana" align='left'></label></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              </form>
              <div class="">
              <table id="tblPelaksanaRKPD" class="table display table-striped compact table-bordered"  cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="5%" style="text-align: center; vertical-align:middle">Pilih</th>
                                <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                                <th width="5%" style="text-align: center; vertical-align:middle">Kode Unit</th>
                                <th style="text-align: center; vertical-align:middle">Nama Unit Pelaksana</th>
                                <th width="20%" style="text-align: center; vertical-align:middle">Pagu Unit</th>
                                <th width="5%" style="text-align: center; vertical-align:middle">Status</th>
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
      </div>
    </div>
  </div>
</div>

@include('ranhirrkpd.program_rkpd');
@include('ranhirrkpd.indikator_program_rkpd');
@include('ranhirrkpd.urusan_program_rkpd');
@include('ranhirrkpd.pelaksana_program_rkpd');

@include('ranhirrkpd.cariIndikator');
@include('ranhirrkpd.cariProgramRPJMD');
@include('ranhirrkpd.cariRefUnit');
@include('ranhirrkpd.StatusProgram');

@endsection

@section('scripts')

@include('ranhirrkpd.js_ranhir_rkpd')
@endsection
