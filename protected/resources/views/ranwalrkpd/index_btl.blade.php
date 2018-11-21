<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app')


@section('content')
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?php
                $this->title = 'Rancangan Awal RKPD';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = '/';
                $breadcrumb->begin();
                $breadcrumb->add(['url' => '/modul2','label' => 'RKPD']);
                $breadcrumb->add(['url' => '/ranwalrkpd', 'label' => $this->title]);
                $breadcrumb->add(['label' => 'Belanja Tidak Langsung']);
                $breadcrumb->end();
            ?>        
        </div>
    </div>
      <div id="pesan" class="notify"></div> 
    
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-info">
          <div class="panel-heading">
            <h2 class="panel-title">Daftar Usulan Program Belanja Tidak Langsung Rancangan Awal RKPD</h2>
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
                {{-- <a id="btnTambahProg" class="add-programrkpd btn btn-labeled btn-success" data-toggle="popover" data-html="true" data-container="body" title="Ranwal RKPD" data-trigger="hover" data-content="Program baru yang belum ada di RPJMD"><span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span> Tambah Program</a> --}}
                  <div class="btn-group">
                      <button type="button" class="btn btn-info dropdown-toggle btn-labeled" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown"><span class="btn-label"><i class="fa fa-print fa-fw fa-lg"></i></span>Cetak Ranwal RKPD <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li>
                                  <a class="dropdown-item btnPrintProyeksiPendapatan" ><i class="fa fa-print fa-fw fa-lg"></i> Cetak Proyeksi Pendapatan RKPD</a>
                                </li>
                                <li>
                                  <a class="dropdown-item btnPrintReviewRanwalRKPD" ><i class="fa fa-print fa-fw fa-lg"></i> Cetak Review Ranwal RKPD</a>
                                </li>
                                <li>
                                  <a class="dropdown-item btnPrintRumusanReviewRanwalRKPD" ><i class="fa fa-print fa-fw fa-lg"></i> Cetak Rumusan Review Ranwal RKPD</a>
                                </li>                  
                            </ul>
                    </div>
                  </div> 

              <div class="table-responsive">
              <table id="tblProgramRKPD" class="table display table-responsive table-striped compact table-bordered"  cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th rowspan="2" width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                                <th rowspan="2" style="text-align: center; vertical-align:middle">Uraian Program RKPD</th>
                                <th rowspan="2" width="15%" style="text-align: center; vertical-align:middle">Pagu RPJMD</th>
                                <th rowspan="2" width="15%" style="text-align: center; vertical-align:middle">Pagu RKPD</th>
                                <th colspan="2" width="5%" style="text-align: center; vertical-align:middle">Indikator</th>
                                <th colspan="2" width="5%" style="text-align: center; vertical-align:middle">Pelaksana</th>
                                <th rowspan="2" width="10%" style="text-align: center; vertical-align:middle">Status Pelaksanaan</th>
                                <th rowspan="2" width="5%" style="text-align: center; vertical-align:middle">Status Usulan</th>
                                <th rowspan="2" width="5%" style="text-align: center; vertical-align:middle">Aksi</th>
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
              <div class="table-responsive">
                <table class="table table-striped table-bordered">
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
              <div class="table-responsive">
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
              <div class="table-responsive">
                <table class="table table-striped table-bordered">
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
              <div class="table-responsive">
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
                  <a id="btnBackUrusan" class="btn btn-warning" data-toggle="popover" data-html="true" data-container="body" title="Ranwal RKPD" data-trigger="hover" data-content="Kembali ke Tabel Urusan"><i class="fa fa-arrow-left fa-fw fa-lg"></i></a>
                  <a id="btnTambahPelaksana" class="add-pelaksana btn btn-labeled btn-success" data-toggle="popover" data-html="true" data-container="body" title="Ranwal RKPD" data-trigger="hover" data-content="Perangkat Daerah Pelaksana selain yang telah ditetapkan di RPJMD"><span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span> Tambah Pelaksana</a>
                  <a id="btnReviuPelaksana" class="btn btn-labeled btn-primary" data-toggle="popover" data-html="true" data-container="body" title="Ranwal RKPD" data-trigger="hover" data-content="Melakukan Reviu Terhadap Data Pelaksana secara sekaligus atau sesuai pilihan"><span class="btn-label"><i class="fa fa-check-square-o fa-fw fa-lg"></i></span> Reviu Pelaksana</a>
                </p>
              </div>
              <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
              <div class="table-responsive">
                <table class="table table-striped table-bordered">
                  <tbody>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Program RPJMD</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_program_rpjmd_pelaksana" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Program RKPD</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_program_rkpd_pelaksana" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Urusan Pemerintahan</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_urusan_pelaksana" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Bidang</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_bidang_pelaksana" align='left'></label></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              </form>
              <div class="table-responsive">
              <table id="tblPelaksanaRKPD" class="table display table-striped compact table-bordered"  cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="5%" style="text-align: center; vertical-align:middle">Pilih</th>
                                <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                                <th width="5%" style="text-align: center; vertical-align:middle">Kode Unit</th>
                                <th style="text-align: center; vertical-align:middle">Nama Unit Pelaksana</th>
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

<div id="EditPelaksana" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form name="frmEditPelaksana" class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" id="id_pelaksana_rkpd" name="id_pelaksana_rkpd">
            <input type="hidden" id="id_urusan_rkpd_pelaksana" name="id_urusan_rkpd_pelaksana">
            <input type="hidden" id="id_rkpd_ranwal_pelaksana" name="id_rkpd_ranwal_pelaksana">
            <div class="form-group">
              <label class="control-label col-sm-3" for="id">No Urut :</label>
              <div class="col-sm-3">
                <input type="text" class="form-control number" id="no_urut_pelaksana" disabled>
              </div>
              <div class="col-sm-3 chkPelaksana">
                    <label class="checkbox-inline">
                    <input class="checkPelaksana" type="checkbox" name="checkPelaksana" id="checkPelaksana" value="1"> Telah Direviu</label>
                </div>
              </div>
              <div class="form-group">
              <label class="control-label col-sm-3" for="title">Unit Pelaksana RKPD:</label>
              <div class="col-sm-8">
                <textarea type="name" class="form-control" id="unit_pelaksana_rkpd" rows="2" disabled></textarea>
              </div>
              <input type="hidden" id="id_unit_rkpd" name="id_unit_rkpd">
              <span class="btn btn-sm btn-primary btnCariUnit" id="btnCariUnit" name="btnCariUnit"><i class="glyphicon glyphicon-search"></i></span>
            </div>
            <div class="form-group" >
              <label for="ophak_akses" class="col-sm-3 control-label" align='left'>Tambah Program/Kegiatan :</label>
              <div class="col-sm-8">
                <label class="radio-inline"  data-placement="bottom" data-toggle="popover" data-html="true" data-container="body" title="Ranwal RKPD" data-trigger="hover" data-content="SKPD tidak dapat menambah program/kegiatan di Renja selain di Renstra untuk Program RPJMD ini">
                  <input type="radio" name="ophak_akses" id="ophak_akses" value="0">Tidak Diperbolehkan
                </label>
                <label class="radio-inline"  data-placement="bottom" data-toggle="popover" data-html="true" data-container="body" title="Ranwal RKPD" data-trigger="hover" data-content="SKPD dapat menambah program/kegiatan di Renja selain di Renstra untuk Program RPJMD ini">
                  <input type="radio" name="ophak_akses" id="ophak_akses" value="1">Diperbolehkan 
                </label>
              </div>
            </div>
            <div class="form-group idStatusPelaksanaUnit" id="idStatus">
                  <label for="status_pelaksanaan_unit" class="col-sm-3 control-label" align='left'>Status Pelaksanaan :</label>
                  <div class="col-sm-8" id="myRadio">
                      <label class="radio-inline">
                        <input type="radio" class="sUnit" name="status_pelaksanaan_unit" id="status_pelaksanaan_unit" value="0">Tepat Waktu
                      </label>
                      <label class="radio-inline hidden">
                        <input type="radio" class="sUnit" name="status_pelaksanaan_unit" id="status_pelaksanaan_unit" value="1">Dimajukan
                      </label>
                      <label class="radio-inline">
                        <input type="radio" class="sUnit" name="status_pelaksanaan_unit" id="status_pelaksanaan_unit" value="2">Ditunda
                      </label>
                      <label class="radio-inline">
                        <input type="radio" class="sUnit" name="status_pelaksanaan_unit" id="status_pelaksanaan_unit" value="3">Dibatalkan
                      </label>
                      <label class="radio-inline hidden">
                        <input type="radio" class="sUnit" name="status_pelaksanaan_unit" id="status_pelaksanaan_unit" value="5">Tanpa Anggaran
                      </label>
                      <label class="radio-inline hidden" id="status_pelaksanaan_unit4">
                        <input type="radio" class="sUnit" name="status_pelaksanaan_unit" id="status_pelaksanaan_unit" value="4">Baru
                      </label>
                  </div>
            </div>
            <div class="form-group KetPelaksanaanUnit">
                  <label for="keterangan_status_unit" class="col-sm-3 control-label" align='left'>Keterangan Pelaksanaan :</label>
                  <div class="col-sm-8">
                    <textarea type="text" class="form-control keterangan_status_unit" name="keterangan_status_unit" id="keterangan_status_unit" rows="3" disabled></textarea>
                  </div>
                </div>
          </form>
        </div>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusPelaksana">
                        {{-- <button class="btn btn-sm btn-danger btnHapusIndikator"><span class="glyphicon glyphicon-trash"></span> Hapus</button> --}}
                    </div>
                    <div class="col-sm-10 text-right">
                        <div class="ui-group-buttons">
                         <button type="button" class="btn btn-labeled btn-success btnAddPelaksana" data-dismiss="modal"><span class="btn-label"><i class="fa fa-floppy-o fa-lg fa-fw"></i></span> Simpan</button>
                        <div class="or"></div>
                        <button type="button" class="btn btn-labeled btn-warning" data-dismiss="modal" aria-hidden="true"><span class="btn-label"><i class="fa fa-sign-out fa-lg fa-fw"></i></span> Tutup</button>
                        </div>
                    </div>
                </div>
              </div>
          </div>
        </div>
      </div>

  <div id="HapusPelaksana" class="modal fade" role="dialog" tabindex="-1" data-focus-on="input:first" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id_pelaksana_rkpd_hapus" name="id_pelaksana_rkpd_hapus">
            <div class="alert alert-danger">
              <i class="fa fa-exclamation-triangle fa-2x fa-pull-left text-danger"  aria-hidden="true"></i>
                Yakin akan menghapus Unit : <strong><span class="ur_unit_del"></span></strong> ini ?
          </div>
        </div>
          <div class="modal-footer">
            <div class="ui-group-buttons">
            <button type="button" class="btn btn-labeled btn-danger btnDelUnit" data-dismiss="modal" ><span class="btn-label"><i class="fa fa-trash fa-lg fa-fw"></i></span> Hapus</button>
            <div class="or"></div>
            <button type="button" class="btn btn-labeled btn-warning" data-dismiss="modal" aria-hidden="true"><span class="btn-label"><i class="fa fa-sign-out fa-lg fa-fw"></i></span> Tutup</button>
            <div class="ui-group-buttons">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

  <div id="ModalUrusan" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" id="id_rkpd_ranwal_urusan" name="id_rkpd_ranwal_urusan">
            <div class="form-group">
              <label class="control-label col-sm-3" for="kd_urusan">Urusan Pemerintahan :</label>
              <div class="col-sm-8">
                <select type="text" class="form-control kd_urusan" id="kd_urusan" name="kd_urusan"></select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="kd_bidang">Bidang :</label>
              <div class="col-sm-8">
                <select type="text" class="form-control kd_bidang" id="kd_bidang" name="kd_bidang"></select>
              </div>
            </div>
          </form>
        </div>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-12 text-right">
                      <div class="ui-group-buttons">
                         <button type="button" class="btn btn-labeled btn-success btnUrusan" data-dismiss="modal"><span class="btn-label"><i class="fa fa-floppy-o fa-lg fa-fw"></i></span> Simpan</button>
                         <div class="or"></div>
                        <button type="button" class="btn btn-labeled btn-warning" data-dismiss="modal" aria-hidden="true"><span class="btn-label"><i class="fa fa-sign-out fa-lg fa-fw"></i></span> Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
          </div>
        </div>
      </div>

  <div id="HapusUrusan" class="modal fade" role="dialog" tabindex="-1" data-focus-on="input:first" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id_urusan_rkpd_hapus" name="id_urusan_rkpd_hapus">
            <div class="alert alert-danger">
              <i class="fa fa-exclamation-triangle fa-2x fa-pull-left text-danger"  aria-hidden="true"></i>
                Yakin akan menghapus Bidang : <strong><span class="ur_bidang_del"></span></strong> dalam urusan <strong><span class="ur_urusan_del"></span></strong> ?
          </div>
        </div>
          <div class="modal-footer">
            <div class="ui-group-buttons">
              <button type="button" class="btn btn-labeled btn-danger btnDelUrusan" data-dismiss="modal" ><span class="btn-label"><i class="fa fa-trash fa-lg fa-fw"></i></span> Hapus</button>
              <div class="or"></div>
              <button type="button" class="btn btn-labeled btn-warning" data-dismiss="modal" aria-hidden="true"><span class="btn-label"><i class="fa fa-sign-out fa-lg fa-fw"></i></span> Tutup</button>
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
              <input type="hidden" id="id_indikator_rkpd" name="id_indikator_rkpd">
              <input type="hidden" id="id_rkpd_ranwal_indikator" name="id_rkpd_ranwal_indikator">
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
                <label class="control-label col-sm-3" for="title">Uraian Indikator Program RKPD:</label>
                <div class="col-sm-8">
                  <textarea type="name" class="form-control" id="ur_indikator_rkpd" rows="3" disabled></textarea>
                </div>
                <input type="hidden" id="kd_indikator_rkpd" name="kd_indikator_rkpd">
                <span class="btn btn-sm btn-primary btnCariIndi" id="btnCariIndi" name="btnCariIndi"><i class="glyphicon glyphicon-search"></i></span>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="title">Uraian Tolok Ukur Program RKPD:</label>
                <div class="col-sm-8">
                  <textarea type="name" class="form-control" id="ur_tolokukur_rkpd" rows="3" disabled></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="target_indikator_rpjmd" class="col-sm-3 control-label" align='left'>Target Capaian Menurut RPJMD :</label>
                <div class="col-sm-2">
                  <input type="text" class="form-control number" id="target_indikator_rpjmd" name="target_indikator_rpjmd" disabled >
                </div>
                <label for="target_indikator_rkpd" class="col-sm-3 control-label" align='left'>Target Capaian RKPD Tahun Berjalan :</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control number" id="target_indikator_rkpd" name="target_indikator_rkpd" required="required" >
                </div>
              </div>              
              <div class="form-group">
              <label class="control-label col-sm-3" for="id_satuan_output">Satuan Indikator :</label>
                <div class="col-sm-8">
                  <select type="text" class="form-control id_satuan_output" id="id_satuan_output" name="id_satuan_output"></select>
                </div>
              </div>
            </form>
          </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusIndikator">
                        <button class="btn btn-sm btn-danger btnHapusIndikator"><span class="glyphicon glyphicon-trash"></span> Hapus</button>
                    </div>
                    <div class="col-sm-9 text-right">
                        <div class="ui-group-buttons">
                         <button type="button" class="btn btn-labeled btn-success btnIndikator" data-dismiss="modal"><span class="btn-label"><i class="fa fa-floppy-o fa-lg fa-fw"></i></span> Simpan</button>
                         <div class="or"></div>
                        <button type="button" class="btn btn-labeled btn-warning" data-dismiss="modal" aria-hidden="true"><span class="btn-label"><i class="fa fa-sign-out fa-lg fa-fw"></i></span> Tutup</button>
                        </div>
                    </div>
                </div>
              </div>
          </div>
        </div>
      </div>

  <div id="HapusIndikator" class="modal fade" role="dialog" tabindex="-1" data-focus-on="input:first" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id_indikator_hapus" name="id_indikator_hapus">
            <div class="alert alert-danger">
              <i class="fa fa-exclamation-triangle fa-2x fa-pull-left text-danger"  aria-hidden="true"></i>
                Yakin akan menghapus Indikator : <strong><span class="ur_indikator_rkpd_del"></span></strong> yang merupakan penambahan program baru ?
                {{-- <br>
                <br>
                <strong>Catatan : Penghapusan data ini mempengaruhi terhadap data turunannya yang ada ikut terhapus.....!!!!</strong> --}}
          </div>
        </div>
          <div class="modal-footer">
            <div class="ui-group-buttons">
            <button type="button" class="btn btn-labeled btn-danger btnDelIndikator" data-dismiss="modal" ><span class="btn-labeled"><i class="fa fa-trash fa-lg fa-fw"></i></span> Hapus</button>
            <div class="or"></div>
            <button type="button" class="btn btn-labeled btn-warning" data-dismiss="modal" aria-hidden="true"><span class="btn-labeled"><i class="fa fa-sign-out fa-lg fa-fw"></i></span> Tutup</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="EditProgram" class="modal fade" role="dialog" data-backdrop="static" aria-hidden="true">
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
                <div class="form-group">
                  <label class="control-label col-sm-3" for="id">No Urut :</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control number no_prog" name="no_urut_program" id="no_urut_program" disabled>
                  </div>
                  </div>
                <div class="form-group">
                  <label class="control-label col-sm-3" for="id">Jenis Program RKPD:</label>
                  <div class="col-sm-5">
                    <select class="form-control" name="jns_belanja" id="jns_belanja" disabled>
                      <option value="0">Belanja Langsung</option>
                      <option value="1">Pendapatan</option>
                      <option value="2">Belanja Tidak Langsung</option>
                    </select>
                  </div>
                </div>
                  <div class="form-group urProgramRPJMD">
                    <label class="control-label col-sm-3" for="title">Uraian Program RPJMD:</label>
                    <div class="col-sm-8">
                      <textarea type="name" class="form-control" id="ur_program_rpjmd" rows="3" disabled></textarea>
                    </div>
                    <input type="hidden" id="thn_id_rpjmd" name="thn_id_rpjmd">
                    <input type="hidden" id="id_visi_rpjmd" name="id_visi_rpjmd">
                    <input type="hidden" id="id_misi_rpjmd" name="id_misi_rpjmd">
                    <input type="hidden" id="id_tujuan_rpjmd" name="id_tujuan_rpjmd">
                    <input type="hidden" id="id_sasaran_rpjmd" name="id_sasaran_rpjmd">
                    <input type="hidden" id="id_program_rpjmd" name="id_program_rpjmd">
                    <a class="btn btn-primary btnCariProgram" id="btnCariProgram" name="btnCariProgram" data-placement="left" data-toggle="popover" data-html="true" data-container="body" title="Ranwal RKPD" data-trigger="hover" data-content="Daftar Indikator yang telah terdapat dalam referensi indikator"><i class="fa fa-search fa-fw fa-lg"></i></a>
                  </div>
                  <div class="form-group">
                  <label class="control-label col-sm-3" for="title">Uraian Program RKPD:</label>
                  <div class="col-sm-8">
                    <textarea type="name" class="form-control ur_prog" name="ur_program_rkpd" id="ur_program_rkpd" rows="3" disabled></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="pagu_rpjmd_program" class="col-sm-3 control-label" align='left'>Pagu RPJMD :</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control number" id="pagu_rpjmd_program" name="pagu_rpjmd_program" disabled >
                  </div>
                  <label for="pagu_rkpd_program" class="col-sm-2 control-label" align='left'>Pagu RKPD :</label>
                  <div class="col-sm-3">
                      <input type="text" class="form-control number" id="pagu_rkpd_program" name="pagu_rkpd_program" required="required" data-toggle="popover" data-html="true" data-container="body" title="Ranwal RKPD" data-trigger="hover" data-content="Diisi dengan jumlah pagu yang akan dianggarkan pada tahun berjalan, jumlahnya bisa lebih besar maupun lebih kecil dari pagu di RPJMD">
                  </div>
                </div>
                <div class="form-group idStatusPelaksanaan" id="idStatus">
                  <label for="status_pelaksanaan_program" class="col-sm-3 control-label" align='left'>Status Pelaksanaan :</label>
                  <div class="col-sm-8" id="myRadio">
                      <label class="radio-inline" data-placement="bottom" data-toggle="popover" data-html="true" data-container="body" title="Ranwal RKPD" data-trigger="hover" data-content="Tepat Waktu: dilaksanakan pada tahun sesuai RPJMD;">
                        <input type="radio" class="skegiatan" name="status_pelaksanaan_program" id="status_pelaksanaan_program" value="0">Tepat Waktu
                      </label>
                      <label class="radio-inline" data-placement="bottom" data-toggle="popover" data-html="true" data-container="body" title="Ranwal RKPD" data-trigger="hover" data-content="Dimajukan: dilaksanakan lebih cepat dari rencana RPJMD;">
                        <input type="radio" class="skegiatan" name="status_pelaksanaan_program" id="status_pelaksanaan_program" value="1">Dimajukan
                      </label>
                      <label class="radio-inline" data-placement="bottom" data-toggle="popover" data-html="true" data-container="body" title="Ranwal RKPD" data-trigger="hover" data-content="Ditunda: dilaksanakan mundur dari tahun rencana RPJMD;">
                        <input type="radio" class="skegiatan" name="status_pelaksanaan_program" id="status_pelaksanaan_program" value="2">Ditunda
                      </label>
                      <label class="radio-inline" data-placement="bottom" data-toggle="popover" data-html="true" data-container="body" title="Ranwal RKPD" data-trigger="hover" data-content="Dibatalkan: Tidak akan dilaksanakan dalam siklus RKPD berjalan;">
                        <input type="radio" class="skegiatan" name="status_pelaksanaan_program" id="status_pelaksanaan_program" value="3">Dibatalkan
                      </label>
                      <label class="radio-inline hidden" data-placement="bottom" data-toggle="popover" data-html="true" data-container="body" title="Ranwal RKPD" data-trigger="hover" data-content="Tanpa Anggaran: pada tahun berjalan memang tidak dianggarkan dalam RPJMD;">
                        <input type="radio" class="skegiatan" name="status_pelaksanaan_program" id="status_pelaksanaan_program" value="5">Tanpa Anggaran
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
                        <button class="btn btn-sm btn-danger btnHapus"><span id="footer_action_button" class="glyphicon glyphicon-trash"></span> Hapus</button>
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                         <button type="button" class="btn btn-labeled btn-success btnProgram" data-dismiss="modal"><span class="btn-label"><i id="footer_action_button" class="fa fa-floppy-o fa-lg fa-fw"></i></span> Simpan</button>
                         <div class="or"></div>
                        <button type="button" class="btn btn-labeled btn-warning" data-dismiss="modal" aria-hidden="true"><span class="btn-label"><i class="fa fa-sign-out fa-lg fa-fw"></i></span> Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!--Modal Aktivitas-->
  <div id="HapusProgram" class="modal fade" role="dialog" tabindex="-1" data-focus-on="input:first" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id_program_hapus" name="id_program_hapus">
            <div class="alert alert-danger">
              <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border text-danger"  aria-hidden="true"></i>
                Yakin akan menghapus Program RKPD : <strong><span class="ur_program_del"></span></strong> yang merupakan penambahan program baru ?
                <br>
                <br>
                <strong>Catatan : Penghapusan data ini mempengaruhi terhadap data turunannya yang ada ikut terhapus.....!!!!</strong>
          </div>
        </div>
          <div class="modal-footer">
            <div class="ui-group-buttons">
            <button type="button" class="btn btn-labeled btn-danger btnDelProgram" data-dismiss="modal" ><span class="btn-label"><i class="fa fa-trash fa-lg fa-fw"></i></span> Hapus</button>
            <div class="or"></div>
            <button type="button" class="btn btn-labeled btn-warning" data-dismiss="modal" aria-hidden="true"><span class="btn-label"><i class="fa fa-sign-out fa-lg fa-fw"></i></span> Tutup</button>
            </div>
          </div>
        </div>
      </div>
    </div>

  <div id="cariIndikator" class="modal fade" role="dialog" tabindex="-1" data-focus-on="input:first" data-backdrop="static">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> --}}
          <h3>Daftar Indikator</h3>
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
              <button type="button" class="btn btn-labeled btn-warning" data-dismiss="modal" aria-hidden="true"><span class="btn-label"><i class="fa fa-sign-out fa-lg fa-fw"></i></span> Tutup</button>
          </div> 
        </div>
      </div>
    </div>

  <div id="cariProgramRPJMD" class="modal fade" role="dialog" tabindex="-1" data-focus-on="input:first" data-backdrop="static">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> --}}
          <h3>Daftar Program RPJMD</h3>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
           <div class="form-group">
             <div class="col-sm-12">
                <table id='tblCariProgramRPJMD' class="table display table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                          <tr>
                            <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                            <th width="10%" style="text-align: center; vertical-align:middle">Kode Program</th>
                            <th style="text-align: center; vertical-align:middle">Uraian Program RPJMD</th>
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
              <button type="button" class="btn btn-labeled btn-warning" data-dismiss="modal" aria-hidden="true"><span class="btn-label"><i class="fa fa-sign-out fa-lg fa-fw"></i></span> Tutup</button>
          </div> 
        </div>
      </div>
    </div>

<div id="cariRefUnit" class="modal fade" role="dialog" tabindex="-1" data-focus-on="input:first" data-backdrop="static">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> --}}
          <h3>Daftar Organisasi Perangkat Daerah</h3>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
           <div class="form-group">
             <div class="col-sm-12">
                <table id='tblCariUnit' class="table display table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                          <tr>
                            <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                            <th width="10%" style="text-align: center; vertical-align:middle">Kode OPD</th>
                            <th style="text-align: center; vertical-align:middle">Nama Perangkat Daerah Pelaksana</th>
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
              <button type="button" class="btn btn-labeled btn-warning" data-dismiss="modal" aria-hidden="true"><span class="btn-label"><i class="fa fa-sign-out fa-lg fa-fw"></i></span> Tutup</button>
          </div> 
        </div>
      </div>
    </div>

<div id="StatusProgram" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
            <h4 style="text-align: center;">Perubahan Status Program Ranwal RKPD</h4>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id_program_ranwal_posting" name="id_program_ranwal_posting">
            <input type="hidden" id="status_program_ranwal_posting" name="status_program_rranwalposting">
            <input type="hidden" id="tahun_ranwal_posting" name="tahun_ranwal_posting">
            <div class="alert alert-success">
                <div>
                  <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border text-info"  aria-hidden="true"></i>
                  <p>Yakin akan melakukan proses <strong><i><span id="ur_status_ranwal_posting"></span></i></strong> pada program : <strong><span id="ur_program_ranwal_posting"></span></strong> ?</p>
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

@endsection

@section('scripts')

<script type="text/javascript">

$(document).ready(function() {
  
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

$('[data-toggle="popover"]').popover();

$('.display').DataTable({
    dom : 'BfrtIp',
    autoWidth : false,
    "bDestroy": true
});

$(".disabled").click(function (e) {
        e.preventDefault();
        return false;
});

  var temp_rkpd_ranwal;
  var temp_ur_program_rpjmd;
  var temp_ur_program_rkpd;
  var temp_urusan_rkpd;
  var indikator_reviu;
  var pelaksana_reviu;

  var check_data;

  $('#divAddIndikator').hide();
  $('#divAddUrusan').hide();
  $('#divAddPelaksana').hide();

  $('.display').DataTable({
      dom : 'BfRtip',
      autoWidth : false,
      bDestroy: true
  });


$('#pagu_rpjmd_program').number(true,2,',', '.');
$('#pagu_rkpd_program').number(true,2,',', '.');
$('#target_indikator_rpjmd').number(true,2,',', '.');
$('#target_indikator_rkpd').number(true,2,',', '.');

$('#no_urut_pelaksana').number(true,0,',', '.');
$('#no_urut_indikator').number(true,0,',', '.');
$('#no_urut_program').number(true,0,',', '.');

  var progrkpd = $('#tblProgramRKPD').DataTable( {
        processing: true,
        serverSide: true,
          deferRender: true,
        "autoWidth": false,
        "ajax": {
          "url": "blangsung/getData",
          "data": {
            'id_x' : 'btl',
            },
          },
        "language": {
                "decimal": ",",
                "thousands": "."},
        "columns": [
              { data: 'urut', sClass: "dt-center"},
              { data: 'uraian_program_rpjmd'},
              { data: 'pagu_rpjmd',
                render: $.fn.dataTable.render.number( '.', ',', 0, '' ),
                sClass: "dt-right" },
              { data: 'pagu_ranwal',
                render: $.fn.dataTable.render.number( '.', ',', 0, '' ),
                sClass: "dt-right" },
              { data: 'jml_indikator', sClass: "dt-center"},
              { data: 'indikator_0', sClass: "dt-center"},
              { data: 'jml_unit', sClass: "dt-center"},
              { data: 'unit_0', sClass: "dt-center"},              
              { data: 'pelaksanaan_display', sClass: "dt-center"},
              { data: 'icon','searchable': false, 'orderable':false,
                  render: function(data, type, row,meta) {
                    // if ( type === 'display' ) {
                      return '<i class="'+row.status_icon+'" style="font-size:16px;color:'+row.warna+';"/>';
                    // }
                    // return data
                  }, 
                  sClass: "dt-center"},
              { data: 'action', 'searchable': false, 'orderable':false , sClass: "dt-center"}
            ],
        "order": [[0, 'asc']],
                  "bDestroy": true
      } );

  $('#tblProgramRKPD tbody').on( 'dblclick', 'tr', function () {
      // EditProgram();
  });

var indiProg_tbl

function LoadIndikatorProg(id_program){
  indiProg_tbl = $('#tblIndikatorRKPD').DataTable( {
    processing: true,
    serverSide: true,
          deferRender: true,
        "autoWidth": false,
    "ajax": {"url": "blangsung/getIndikatorRKPD/"+id_program},
    "language": {
    "decimal": ",",
    "thousands": "."},
    'columnDefs': [
      { 'width': 5,
          'targets': 0,
          'checkboxes': {'selectRow': true } },
      { "targets": 1, "width": 5 }
      ],
    'select': { 'style': 'multi' },
    "columns": [
          { data: 'id_indikator_program_rkpd', sClass: "dt-center", searchable: false, orderable:false,},
          { data: 'urut', sClass: "dt-center"},
          { data: 'uraian_indikator_program_rkpd'},
          { data: 'tolok_ukur_indikator'},
          { data: 'target_rpjmd',
            render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-center"},
          { data: 'target_rkpd',
            render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-center"},
          { data: 'status_reviu','searchable': false, 'orderable':false,
                  render: function(data, type, row,meta) {
                    if ( type === 'display' ) {
                      return '<i class="'+row.status_reviu+'" style="font-size:16px;color:'+row.warna+';"/>';
                    }
                    return data},
                    sClass: "dt-center"},
          { data: 'action', 'searchable': false, 'orderable':false,
            sClass: "dt-center" }
        ],
        "order": [[0, 'asc']],
        "bDestroy": true
  } );}

  var UrusanTable 
  function LoadUrusan(id_program){ 
    UrusanTable = $('#tblUrusanRKPD').DataTable( {
            processing: true,
            serverSide: true,
            deferRender: true,
          "autoWidth": false,
            "ajax": {"url": "blangsung/getUrusanRKPD/"+id_program},
            "language": {
                    "decimal": ",",
                    "thousands": "."},
            "columns": [
                  { data: 'urut', sClass: "dt-center"},
                  { data: 'nm_urusan'},
                  { data: 'nm_bidang'},
                  { data: 'jml_data', sClass: "dt-center"},
                  { data: 'jml_0', sClass: "dt-center"},
                  { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
                ],
            "order": [[0, 'asc']],
                    "bDestroy": true
    } );}

  $('#tblUrusanRKPD tbody').on( 'dblclick', 'tr', function () {
    var data = UrusanTable.row(this).data();

    temp_rkpd_ranwal =  data.id_rkpd_ranwal;
      temp_urusan_rkpd = data.id_urusan_rkpd;

      if (data.status_data_program ==0){
        if(data.status_program==2 || data.status_program==3 ){
          document.getElementById("btnTambahPelaksana").style.visibility='hidden';
          document.getElementById("btnReviuPelaksana").style.visibility='hidden';
        } else {
          document.getElementById("btnTambahPelaksana").style.visibility='visible';
          document.getElementById("btnReviuPelaksana").style.visibility='visible';
        }
      };

      document.getElementById("nm_program_rkpd_pelaksana").innerHTML = temp_ur_program_rkpd;
      document.getElementById("nm_program_rpjmd_pelaksana").innerHTML = temp_ur_program_rpjmd;
      document.getElementById("nm_bidang_pelaksana").innerHTML = data.nm_bidang;
      document.getElementById("nm_urusan_pelaksana").innerHTML = data.nm_urusan;

      $('.nav-tabs a[href="#pelaksana"]').tab('show');
      LoadPelaksana(temp_rkpd_ranwal,temp_urusan_rkpd);

  });


  var PelaksanaTable
  function LoadPelaksana(id_ranwal,id_urusan){
    PelaksanaTable = $('#tblPelaksanaRKPD').DataTable( {
            processing: true,
            serverSide: true,
            deferRender: true,
            "autoWidth": false,
            "ajax": {"url": "blangsung/getPelaksanaRKPD/"+id_ranwal+"/"+id_urusan},
            "language": {
                    "decimal": ",",
                    "thousands": "."},
            'columnDefs': [
              { 'width': 5,
                  'targets': 0,
                  'checkboxes': {'selectRow': true } },
              { "targets": 1, "width": 5 }
              ],
            'select': { 'style': 'multi' },
            "columns": [              
                  { data: 'id_pelaksana_rpjmd', sClass: "dt-center", searchable: false, orderable:false,},
                  { data: 'urut', sClass: "dt-center"},
                  { data: 'kd_unit', sClass: "dt-center"},
                  { data: 'nm_unit'},
                  { data: 'status_reviu','searchable': false, 'orderable':false,
                    render: function(data, type, row,meta) {
                      if ( type === 'display' ) {
                        return '<i class="'+row.status_reviu+'" style="font-size:16px;color:'+row.warna+';"/> ';
                      }
                      return data},
                      sClass: "dt-center"},
                  { data: 'action', 'searchable': false, 'orderable':false,
                    sClass: "dt-center" }
                ],
            "order": [[0, 'asc']],
            "bDestroy": true,
    } );}

$('#tblPelaksanaRKPD tbody').on( 'mousedown', 'td', function (e) {
     if( e.button == 2 ) { 
        alert('Klik Kanan....!'); 
        return false; 
     } 
     return true; 
}); 

  $(document).on('click', '.view-indikator', function() {
      var data = progrkpd.row( $(this).parents('tr') ).data();

      temp_rkpd_ranwal =  data.id_rkpd_ranwal;
      $('#divAddIndikator').show();

      if (data.status_data ==0){
        if(data.status_pelaksanaan==2 || data.status_pelaksanaan==3 ){
          document.getElementById("btnTambahIndikator").style.visibility='hidden';
        } else {
          document.getElementById("btnTambahIndikator").style.visibility='visible';
        }
      };

      document.getElementById("nm_program_rkpd_indikator").innerHTML = data.uraian_program_rpjmd;
      document.getElementById("nm_program_rpjmd_indikator").innerHTML = data.program_pemda;

      $('.nav-tabs a[href="#indikator"]').tab('show');
      LoadIndikatorProg(temp_rkpd_ranwal);
    });

  $(document).on('click', '.view-pelaksana', function() {
      var data = progrkpd.row( $(this).parents('tr') ).data();

      temp_rkpd_ranwal =  data.id_rkpd_ranwal;
      $('#divAddUrusan').show();

      if (data.status_data==0){
        if(data.status_pelaksanaan==2 || data.status_pelaksanaan==3 ){
            document.getElementById("btnTambahUrusan").style.visibility='hidden';
        } else {
            document.getElementById("btnTambahUrusan").style.visibility='visible';
        }
      };

      document.getElementById("nm_program_rkpd_urusan").innerHTML = data.uraian_program_rpjmd;
      temp_ur_program_rkpd = data.uraian_program_rpjmd
      document.getElementById("nm_program_rpjmd_urusan").innerHTML = data.program_pemda;
      temp_ur_program_rpjmd = data.program_pemda

      $('.nav-tabs a[href="#urusan"]').tab('show');
      LoadUrusan(temp_rkpd_ranwal);
    });

  $(document).on('click', '#btnBackUrusan', function() {
      $('#divAddUrusan').show();
      $('.nav-tabs a[href="#urusan"]').tab('show');
      LoadUrusan(temp_rkpd_ranwal);
    });

  $(document).on('click', '.view-unit', function() {
      temp_rkpd_ranwal =  $(this).data('id_rkpd_ranwal');
      temp_urusan_rkpd = $(this).data('id_urusan_rkpd')

      $('#divAddPelaksana').show();

      if ($(this).data('status_data_program') ==0){
        if($(this).data('status_program')==2 || $(this).data('status_program')==3 ){
          document.getElementById("btnTambahPelaksana").style.visibility='hidden';
          document.getElementById("btnReviuPelaksana").style.visibility='hidden';
        } else {
          document.getElementById("btnTambahPelaksana").style.visibility='visible';
          document.getElementById("btnReviuPelaksana").style.visibility='visible';
        }
      };

      document.getElementById("nm_program_rkpd_pelaksana").innerHTML = temp_ur_program_rkpd;
      document.getElementById("nm_program_rpjmd_pelaksana").innerHTML = temp_ur_program_rpjmd;
      document.getElementById("nm_bidang_pelaksana").innerHTML = $(this).data('nm_bidang');
      document.getElementById("nm_urusan_pelaksana").innerHTML = $(this).data('nm_urusan');

      $('.nav-tabs a[href="#pelaksana"]').tab('show');
      LoadPelaksana(temp_rkpd_ranwal,temp_urusan_rkpd);
      // $('#tblPelaksanaRKPD').DataTable().ajax.url("./blangsung/getPelaksanaRKPD/"+temp_rkpd_ranwal+"/"+temp_urusan_rkpd).load();
    });

  $(document).on('click', '.add-pelaksana', function() {
      $('.btnAddPelaksana').removeClass('editPelaksana');
      $('.btnAddPelaksana').addClass('addPelaksana');
      $('.modal-title').text('Tambah Unit Pelaksana Program RKPD');
      $('.form-horizontal').show();
      $('#id_pelaksana_rkpd').val(null);
      $('#id_urusan_rkpd_pelaksana').val(temp_urusan_rkpd);
      $('#id_unit_rkpd').val(null);
      $('#id_rkpd_ranwal_pelaksana').val(temp_rkpd_ranwal);
      $('#no_urut_pelaksana').val(null);
      $('#unit_pelaksana_rkpd').val(null);
      $('#ket_pelaksanaan_unit').val(null);

      document.frmEditPelaksana.ophak_akses[0].checked=true;
      document.getElementById("no_urut_pelaksana").removeAttribute("disabled");
      document.getElementById("keterangan_status_unit").removeAttribute("disabled");
      $('.KetPelaksanaanUnit').show();
      document.frmEditPelaksana.status_pelaksanaan_unit[5].checked=true;
      document.frmEditPelaksana.status_pelaksanaan_unit[5].style.visibility='hidden';        
      document.getElementById("status_pelaksanaan_unit4").style.visibility='hidden';
      $('.idStatusPelaksanaUnit').hide();

      $('.btnCariUnit').show();
      $('.chkPelaksana').show();
      $('.checkPelaksana').prop('checked',false);

      $('#EditPelaksana').modal('show');
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
          url: 'blangsung/addPelaksanaRKPD',
          data: {
              '_token': $('input[name=_token]').val(),
              'no_urut': $('#no_urut_pelaksana').val(),
              'id_pelaksana_rpjmd': $('#id_pelaksana_rkpd').val(),
              'id_rkpd_ranwal': $('#id_rkpd_ranwal_pelaksana').val(),
              'id_urusan_rkpd': $('#id_urusan_rkpd_pelaksana').val(),
              'id_unit': $('#id_unit_rkpd').val(),
              'ket_pelaksanaan': $('#keterangan_status_unit').val(),
              'status_pelaksanaan': getStatusPelaksanaanUnit(),
              'hak_akses': getHakAkses(),
              'status_data': check_data,
          },
          success: function(data) {
              $('#tblPelaksanaRKPD').DataTable().ajax.reload();
              $('#tblUrusanRKPD').DataTable().ajax.reload();
              $('#tblProgramRKPD').DataTable().ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
          }
      });
  });

  $(document).on('click', '.edit-pelaksana', function() {
      $('.btnAddPelaksana').removeClass('addPelaksana');
      $('.btnAddPelaksana').addClass('editPelaksana');
      $('.modal-title').text('Edit dan Reviu Pelaksana Program RKPD');
      $('.form-horizontal').show();
      $('#id_pelaksana_rkpd').val($(this).data('id_pelaksana_ranwal'));
      $('#id_urusan_rkpd_pelaksana').val($(this).data('id_urusan_rkpd'));
      $('#id_unit_rkpd').val($(this).data('id_unit'));
      $('#id_rkpd_ranwal_pelaksana').val($(this).data('id_rkpd_ranwal'));
      $('#no_urut_pelaksana').val($(this).data('no_urut'));
      $('#unit_pelaksana_rkpd').val($(this).data('nm_unit'));
      
      if($(this).data('sumber_data')==1){
        document.getElementById("no_urut_pelaksana").removeAttribute("disabled");
        $('.btnCariUnit').show();
      } else {
        document.getElementById("no_urut_pelaksana").setAttribute("disabled","disabled");
        $('.btnCariUnit').hide();
      }

      $('.chkPelaksana').show();
      if($(this).data('status_data')==1){
        $('.checkPelaksana').prop('checked',true);
      } else {
        $('.checkPelaksana').prop('checked',false);
      }

      document.frmEditPelaksana.ophak_akses[$(this).data('hak_akses')].checked=true;

      if($(this).data('status_pelaksanaan')==4 || $(this).data('sumber_data')==1){
          document.frmEditPelaksana.status_pelaksanaan_unit[5].checked=true;
          document.frmEditPelaksana.status_pelaksanaan_unit[5].style.visibility='hidden';        
          document.getElementById("status_pelaksanaan_unit4").style.visibility='hidden';
          $('.idStatusPelaksanaUnit').hide();
          $('.btnCariUnit').show();          
        } else {
            $('.idStatusPelaksanaanUnit').show();
            document.frmEditPelaksana.status_pelaksanaan_unit[$(this).data('status_pelaksanaan')].checked=true;
            document.frmEditPelaksana.status_pelaksanaan_unit[5].style.visibility='hidden';        
            document.getElementById("status_pelaksanaan_unit4").style.visibility='hidden';
            $('.idStatusPelaksanaUnit').show();
            $('.btnCariUnit').hide();
        }      

      if($(this).data('status_pelaksanaan')==0){
          document.getElementById("keterangan_status_unit").setAttribute("disabled","disabled");
          $('.KetPelaksanaanUnit').hide();
        } else {
            document.getElementById("keterangan_status_unit").removeAttribute("disabled");
            $('.KetPelaksanaanUnit').show();
        }

      $('#keterangan_status_unit').val($(this).data('ket_pelaksanaan'));

      $('#EditPelaksana').modal('show');
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
          url: 'blangsung/editPelaksanaRKPD',
          data: {
              '_token': $('input[name=_token]').val(),
              'no_urut': $('#no_urut_pelaksana').val(),
              'id_pelaksana_rpjmd': $('#id_pelaksana_rkpd').val(),
              'id_rkpd_ranwal': $('#id_rkpd_ranwal_pelaksana').val(),
              'id_urusan_rkpd': $('#id_urusan_rkpd_pelaksana').val(),
              'id_unit': $('#id_unit_rkpd').val(),
              'ket_pelaksanaan': $('#keterangan_status_unit').val(),
              'status_pelaksanaan': getStatusPelaksanaanUnit(),
              'hak_akses': getHakAkses(),
              'status_data': check_data,
          },
          success: function(data) {
              $('#tblPelaksanaRKPD').DataTable().ajax.reload();
              $('#tblUrusanRKPD').DataTable().ajax.reload();
              $('#tblProgramRKPD').DataTable().ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              } 
          }
      });
  });

  $(document).on('click', '.hapus-pelaksana', function() {
    $('.btnDelUnit').addClass('delUnitRKPD');
    $('.modal-title').text('Hapus Unit Pelaksana RKPD');
    $('#id_pelaksana_rkpd_hapus').val($(this).data('id_pelaksana_ranwal'));
    $('.ur_unit_del').html($(this).data('nm_unit'));

    $('#HapusPelaksana').modal('show');
  });

  $('.modal-footer').on('click', '.delUnitRKPD', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      type: 'post',
      url: 'blangsung/hapusPelaksanaRKPD',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_pelaksana_rpjmd': $('#id_pelaksana_rkpd_hapus').val()
      },
      success: function(data) {
        $('#tblPelaksanaRKPD').DataTable().ajax.reload();
        $('#tblUrusanRKPD').DataTable().ajax.reload();
        $('#tblProgramRKPD').DataTable().ajax.reload();
        createPesan(data.pesan,"success");
      }
    });
  });

  $('.sUnit').change(function() {
    if(document.frmEditPelaksana.status_pelaksanaan_unit.value==0){
      document.getElementById("keterangan_status_unit").setAttribute("disabled","disabled");
      $('.KetPelaksanaanUnit').hide();
    } else {
      document.getElementById("keterangan_status_unit").removeAttribute("disabled");
      $('.KetPelaksanaanUnit').show();
    }

  });

  $(document).on('click', '.add-urusan', function() {
      $('.btnUrusan').addClass('addUrusan');
      $('.modal-title').text('Tambah Urusan dan Bidang Pemerintahan RKPD');
      $('.form-horizontal').show();
      $('#id_rkpd_ranwal_urusan').val(temp_rkpd_ranwal);

      $('#ModalUrusan').modal('show');

      $.ajax({

          type: "GET",
          url: './getUrusan',
          dataType: "json",

          success: function(data) {

          var j = data.length;
          var post, i;

          $('select[name="kd_urusan"]').empty();
          $('select[name="kd_urusan"]').append('<option value="-1">---Pilih Urusan Pemerintahan---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="kd_urusan"]').append('<option value="'+ post.kd_urusan +'">'+ post.nm_urusan +'</option>');
          }
          }
      });
  });

  $('.modal-footer').on('click', '.addUrusan', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: 'blangsung/tambahUrusanRKPD',
          data: {
              '_token': $('input[name=_token]').val(),
              'no_urut': null,
              'id_rkpd_ranwal': $('#id_rkpd_ranwal_urusan').val(),
              'id_bidang': $('#kd_bidang').val(),
          },
          success: function(data) {             
              $('#tblUrusanRKPD').DataTable().ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }             
          }
      });
  });

  $(document).on('click', '.hapus-urusan', function() {
    $('.btnDelUrusan').addClass('delUrusanRKPD');
    $('.modal-title').text('Hapus Urusan - Bidang pada RKPD');
    $('#id_urusan_rkpd_hapus').val($(this).data('id_urusan_rkpd'));
    $('.ur_bidang_del').html($(this).data('nm_bidang'));
    $('.ur_urusan_del').html($(this).data('nm_urusan'));

    $('#HapusUrusan').modal('show');
  });

  $('.modal-footer').on('click', '.delUrusanRKPD', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      type: 'post',
      url: 'blangsung/hapusUrusanRKPD',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_urusan_rkpd': $('#id_urusan_rkpd_hapus').val()
      },
      success: function(data) {
        // $('#ModalIndikator').modal('hide');
        $('#tblUrusanRKPD').DataTable().ajax.reload();
        $('#tblProgramRKPD').DataTable().ajax.reload();
        createPesan(data.pesan,"success");
      }
    });
  });

  $(document).on('click', '.add-indikator', function() {
      $('.btnIndikator').removeClass('editIndikator');
      $('.btnIndikator').addClass('addIndikator');
      $('.modal-title').text('Tambah Target Capaian Program RKPD');
      $('.form-horizontal').show();
      $('#id_indikator_rkpd').val(null);
      $('#kd_indikator_rkpd').val(null);
      $('#id_rkpd_ranwal_indikator').val(temp_rkpd_ranwal);
      $('#no_urut_indikator').val(null);
      $('#ur_indikator_rkpd').val(null);
      $('#ur_tolokukur_rkpd').val(null);
      $('#target_indikator_rpjmd').val(0);
      $('#target_indikator_rkpd').val(0);
      $('#id_satuan_output').val(null);


      document.getElementById("no_urut_indikator").removeAttribute("disabled");
      document.getElementById("ur_tolokukur_rkpd").removeAttribute("disabled");

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
          url: 'blangsung/tambahIndikatorRKPD',
          data: {
              '_token': $('input[name=_token]').val(),
              'no_urut': $('#no_urut_indikator').val(),
              'id_rkpd_ranwal': $('#id_rkpd_ranwal_indikator').val(),
              'kd_indikator': $('#kd_indikator_rkpd').val(),
              'uraian_indikator': $('#ur_indikator_rkpd').val(),
              'tolok_ukur_indikator': $('#ur_tolokukur_rkpd').val(),
              'target_rkpd': $('#target_indikator_rkpd').val(),
              'id_satuan_output':$('#id_satuan_output').val(),
          },
          success: function(data) {
              $('#tblIndikatorRKPD').DataTable().ajax.reload();
              $('#tblProgramRKPD').DataTable().ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              } 
              
          }
      });
  });

  $(document).on('click', '.edit-indikator', function() {
    var data = indiProg_tbl.row( $(this).parents('tr') ).data();

      $('.btnIndikator').removeClass('addIndikator');
      $('.btnIndikator').addClass('editIndikator');
      $('.modal-title').text('Edit dan Reviu Target Capaian Program RKPD');
      $('.form-horizontal').show();
      $('#id_indikator_rkpd').val($(this).data('id_indikator_ranwal'));
      $('#id_rkpd_ranwal_indikator').val($(this).data('id_rkpd_ranwal'));
      $('#kd_indikator_rkpd').val($(this).data('kd_indikator_rkpd'));
      $('#no_urut_indikator').val($(this).data('no_urut'));
      $('#ur_indikator_rkpd').val($(this).data('ur_indikator_rkpd'));
      $('#ur_tolokukur_rkpd').val($(this).data('ur_toloukur_rkpd'));
      $('#target_indikator_rpjmd').val($(this).data('target_rpjmd'));
      $('#target_indikator_rkpd').val($(this).data('target_rkpd'));
      $('#id_satuan_output').val(data.id_satuan_output);
      
      if($(this).data('sumber_data')==1){
        document.getElementById("no_urut_indikator").removeAttribute("disabled");
        // document.getElementById("ur_indikator_rkpd").removeAttribute("disabled");
        $('.btnCariIndi').show();
        $('.btnHapusIndikator').show();
        document.getElementById("ur_tolokukur_rkpd").removeAttribute("disabled");
      } else {
        document.getElementById("no_urut_indikator").setAttribute("disabled","disabled");
        // document.getElementById("ur_indikator_rkpd").setAttribute("disabled","disabled");
        $('.btnCariIndi').hide();
        $('.btnHapusIndikator').hide();
        document.getElementById("ur_tolokukur_rkpd").setAttribute("disabled","disabled");
      }

      $('.chkIndikator').show();
      if($(this).data('status_data')==1){
        $('.checkIndikator').prop('checked',true);
      } else {
        $('.checkIndikator').prop('checked',false);
      }

      

      $('#ModalIndikator').modal('show');
    });

  $('.checkIndikator').change(function(){

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
          url: 'blangsung/editIndikatorRKPD',
          data: {
              '_token': $('input[name=_token]').val(),
              'no_urut': $('#no_urut_indikator').val(),
              'id_indikator_program_rkpd': $('#id_indikator_rkpd').val(),
              'id_rkpd_ranwal': $('#id_rkpd_ranwal_indikator').val(),
              'kd_indikator': $('#kd_indikator_rkpd').val(),
              'uraian_indikator': $('#ur_indikator_rkpd').val(),
              'tolok_ukur_indikator': $('#ur_tolokukur_rkpd').val(),
              'target_rkpd': $('#target_indikator_rkpd').val(),
              'id_satuan_output':$('#id_satuan_output').val(),
              'status_data': check_data,
          },
          success: function(data) {
              console.log(data);
              $('#tblIndikatorRKPD').DataTable().ajax.reload();
              $('#tblProgramRKPD').DataTable().ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
          }
      });
  });

  $(document).on('click', '.btnHapusIndikator', function() {
    $('.btnDelIndikator').addClass('delIndikatorRKPD');
    $('.modal-title').text('Hapus Data Indikator RKPD Tambahan');
    $('#id_indikator_hapus').val($('#id_indikator_rkpd').val());
    $('.ur_indikator_rkpd_del').html($('#ur_indikator_rkpd').val());
    $('#HapusIndikator').modal('show');
  });

  $('.modal-footer').on('click', '.delIndikatorRKPD', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      type: 'post',
      url: 'blangsung/hapusIndikatorRKPD',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_indikator_program_rkpd': $('#id_indikator_hapus').val()
      },
      success: function(data) {
        $('#ModalIndikator').modal('hide');
        $('#tblIndikatorRKPD').DataTable().ajax.reload();
        $('#tblProgramRKPD').DataTable().ajax.reload();
        createPesan(data.pesan,"success");
      }
    });
  });



  $(document).on('click', '.add-programrkpd', function() {
      $('.btnProgram').removeClass('editProgramRKPD');
      $('.btnProgram').addClass('addProgramRkpd');
      $('.modal-title').text('Tambah Data Program RKPD');
      $('.form-horizontal').show();
      $('#id_rkpd_ranwal_program').val(null);
      $('#no_urut_program').val(null);
      $('#jns_belanja').val(0);
      $('#ur_program_rkpd').val(null);
      $('#pagu_rpjmd_program').val(0);
      $('#pagu_rkpd_program').val(0);
      $('#keterangan_status_program').val(null);
      $('#thn_id_rpjmd').val(null);
      $('#id_visi_rpjmd').val(null);
      $('#id_misi_rpjmd').val(null);
      $('#id_tujuan_rpjmd').val(null);
      $('#id_sasaran_rpjmd').val(null);
      $('#id_program_rpjmd').val(null);
      $('#ur_program_rpjmd').val(null);
      $('.idStatusPelaksanaan').hide();
      $('.idStatusUsulan').hide();
      $('.btnHapus').hide();
      $('.KetPelaksanaan').show();
      $('.btnCariProgram').show();

      document.getElementById("keterangan_status_program").removeAttribute("disabled");
      document.getElementById("no_urut_program").removeAttribute("disabled");
      document.getElementById("ur_program_rkpd").removeAttribute("disabled");
      // document.getElementById("jns_belanja").removeAttribute("disabled");

      $(".skegiatan").attr('disabled', true);
      $(".usulan").attr('disabled', true);

      document.frmEditProgram.status_usulan_program[0].checked=true;
      document.frmEditProgram.status_pelaksanaan_program[5].checked=true;

      $('#EditProgram').modal('show');

  });

  $('.modal-footer').on('click', '.addProgramRkpd', function() {


      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: 'blangsung/tambahProgramRKPD',
          data: {
              '_token': $('input[name=_token]').val(),
              'no_urut': $('#no_urut_program').val(),
              'uraian_program_rpjmd': $('#ur_program_rkpd').val(),
              'pagu_ranwal': $('#pagu_rkpd_program').val(),
              'jenis_belanja': $('#jns_belanja').val(),
              'ket_usulan': $('#keterangan_status_program').val(),
              'thn_id_rpjmd':$('#thn_id_rpjmd').val(),
              'id_visi_rpjmd':$('#id_visi_rpjmd').val(),
              'id_misi_rpjmd':$('#id_misi_rpjmd').val(),
              'id_tujuan_rpjmd':$('#id_tujuan_rpjmd').val(),
              'id_sasaran_rpjmd':$('#id_sasaran_rpjmd').val(),
              'id_program_rpjmd':$('#id_program_rpjmd').val(),
          },
          success: function(data) {
              $('#tblProgramRKPD').DataTable().ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
          }
      });
  });

  $(document).on('click', '.edit-program', function() {
        
    var data = progrkpd.row( $(this).parents('tr') ).data();
        
      $('.btnProgram').removeClass('addProgramRkpd');
      $('.btnProgram').addClass('editProgramRKPD');
      $('.modal-title').text('Edit dan Reviu Program RKPD');
      $('.idStatusUsulan').hide();
      $('.form-horizontal').show();
      $('#id_rkpd_ranwal_program').val(data.id_rkpd_ranwal);
      $('#jns_belanja').val(data.jenis_belanja);
      $('#thn_id_rpjmd').val(data.thn_id_rpjmd);
      $('#id_visi_rpjmd').val(data.id_visi_rpjmd);
      $('#id_misi_rpjmd').val(data.id_misi_rpjmd);
      $('#id_tujuan_rpjmd').val(data.id_tujuan_rpjmd);
      $('#id_sasaran_rpjmd').val(data.id_sasaran_rpjmd);
      $('#id_program_rpjmd').val(data.id_program_rpjmd);
      $('#ur_program_rpjmd').val(data.program_pemda);
      
      if(data.sumber_data==1){        
        document.getElementById("no_urut_program").removeAttribute("disabled");
        document.getElementById("ur_program_rkpd").removeAttribute("disabled");
        // document.getElementById("jns_belanja").removeAttribute("disabled");
      } else {
        document.getElementById("no_urut_program").setAttribute("disabled","disabled");
        document.getElementById("ur_program_rkpd").setAttribute("disabled","disabled");
        // document.getElementById("jns_belanja").setAttribute("disabled","disabled");
      }

       $('#no_urut_program').val(data.urut);
      $('#ur_program_rkpd').val(data.uraian_program_rpjmd);
      $('#pagu_rpjmd_program').val(data.pagu_rpjmd);
      $('#pagu_rkpd_program').val(data.pagu_ranwal);
      $('#keterangan_status_program').val(data.ket_usulan);

      document.frmEditProgram.status_usulan_program[data.status_data].checked=true;

      console.log(data.status_pelaksanaan);

      if(data.status_pelaksanaan==4){
          document.frmEditProgram.status_pelaksanaan_program[5].checked=true;
          document.frmEditProgram.status_pelaksanaan_program[5].style.visibility='hidden';        
          document.getElementById("status_pelaksanaan4").style.visibility='hidden';
          $('.idStatusPelaksanaan').hide();        
          $('.btnHapus').show();
          $('.btnCariProgram').show();          
        } else {
            $('.idStatusPelaksanaan').show();
            if(data.status_pelaksanaan==5){
              document.frmEditProgram.status_pelaksanaan_program[4].checked=true;
            } else {
              document.frmEditProgram.status_pelaksanaan_program[data.status_pelaksanaan].checked=true;
            }            
            document.frmEditProgram.status_pelaksanaan_program[5].style.visibility='hidden';        
            document.getElementById("status_pelaksanaan4").style.visibility='hidden';
            $('.btnHapus').hide();
            $('.btnCariProgram').hide();
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

      $('#EditProgram').modal('show');
  });

$('.modal-footer').on('click', '.editProgramRKPD', function(){
    if ((getStatusData() == 0 || getStatusData() == 1)  && $('#pagu_rkpd_program').val() <= 0) {
      createPesan("Maaf Pagu RKPD Program tidak boleh 0 (Nol)","danger");
      return;
    } 
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: 'blangsung/editProgramRKPD',
        data: {
            '_token': $('input[name=_token]').val(),
            'no_urut': $('#no_urut_program').val(),                          
            'jenis_belanja': $('#jns_belanja').val(),
            'id_rkpd_ranwal': $('#id_rkpd_ranwal_program').val(),
            'uraian_program_rpjmd': $('#ur_program_rkpd').val(),
            'pagu_rpjmd' : $('#pagu_rpjmd_program').val(),
            'pagu_ranwal': $('#pagu_rkpd_program').val(),
            'ket_usulan': $('#keterangan_status_program').val(),
            'status_data' : getStatusUsul(),
            'status_pelaksanaan' : getStatusData(),
            'thn_id_rpjmd':$('#thn_id_rpjmd').val(),
            'id_visi_rpjmd':$('#id_visi_rpjmd').val(),
            'id_misi_rpjmd':$('#id_misi_rpjmd').val(),
            'id_tujuan_rpjmd':$('#id_tujuan_rpjmd').val(),
            'id_sasaran_rpjmd':$('#id_sasaran_rpjmd').val(),
            'id_program_rpjmd':$('#id_program_rpjmd').val(),
        },
        success: function(data) {
            $('#tblProgramRKPD').DataTable().ajax.reload();
            if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
        }
      
  });

  });

  $(document).on('click', '.btnHapus', function() {
    $('.btnDelProgram').addClass('delProgramRKPD');
    $('.modal-title').text('Hapus Data Program RKPD Tambahan');
    $('#id_program_hapus').val($('#id_rkpd_ranwal_program').val());
    $('.ur_program_del').html($('#ur_program_rkpd').val());
    $('#HapusProgram').modal('show');
  });

  $('.modal-footer').on('click', '.delProgramRKPD', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      type: 'post',
      url: 'blangsung/hapusProgramRKPD',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_rkpd_ranwal': $('#id_program_hapus').val()
      },
      success: function(data) {
        $('#EditProgram').modal('hide');
        $('#tblProgramRKPD').DataTable().ajax.reload();
        createPesan(data.pesan,"success");
      }
    });
  });

  $('.skegiatan').change(function() {
    if(document.frmEditProgram.status_pelaksanaan_program.value==0){
      document.getElementById("keterangan_status_program").setAttribute("disabled","disabled");
      document.getElementById("pagu_rkpd_program").removeAttribute("disabled");
      $('.KetPelaksanaan').hide();
    } else {
      document.getElementById("keterangan_status_program").removeAttribute("disabled");
      $('.KetPelaksanaan').show();
      if(document.frmEditProgram.status_pelaksanaan_program.value!=1){
        document.getElementById("pagu_rkpd_program").setAttribute("disabled","disabled");
        $('#pagu_rkpd_program').val(0);
      } else {
        document.getElementById("pagu_rkpd_program").removeAttribute("disabled");
      }
    }

  });

  function getStatusData(){

    var xCheck = document.querySelectorAll('input[name="status_pelaksanaan_program"]:checked');
    var xyz = [];
    for(var x = 0, l = xCheck.length; x < l;  x++)
      { xyz.push(xCheck[x].value); }
    var xvalues = xyz.join('');
    return xvalues;
  }

  function getStatusPelaksanaanUnit(){

    var xCheck = document.querySelectorAll('input[name="status_pelaksanaan_unit"]:checked');
    var xyz = [];
    for(var x = 0, l = xCheck.length; x < l;  x++)
      { xyz.push(xCheck[x].value); }
    var xvalues = xyz.join('');
    return xvalues;
  }

  function getHakAkses(){

    var xCheck = document.querySelectorAll('input[name="ophak_akses"]:checked');
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

  $(document).on('click', '.btnCariUnit', function() { 
    LoadCariUnit();   
    $('#cariRefUnit').modal('show');

    // $('#tblCariUnit').DataTable().ajax.reload();
  });

var cariunit;
function LoadCariUnit(){
  cariunit = $('#tblCariUnit').DataTable( {
        processing: true,
        serverSide: true,
        dom: 'bfrtIp',
        "ajax": {"url": "./getRefUnit"},
        "columns": [
              { data: 'no_urut', sClass: "dt-center"},
              { data: 'kd_unit', sClass: "dt-center"},
              { data: 'nm_unit'}
            ],
      "order": [[0, 'asc']],
      "bDestroy": true
    });
};

  $('#tblCariUnit tbody').on( 'dblclick', 'tr', function () {

    var data = cariunit.row(this).data();

    document.getElementById("unit_pelaksana_rkpd").value = data.nm_unit;
    document.getElementById("id_unit_rkpd").value = data.id_unit;
    $('#cariRefUnit').modal('hide');    

  } );

  $(document).on('click', '.btnCariIndi', function() {    
    
    LoadCariIndikator();
    $('#cariIndikator').modal('show');

    // $('#tblCariIndikator').DataTable().ajax.reload();
  });

var cariindikator;
function LoadCariIndikator(){
  cariindikator = $('#tblCariIndikator').DataTable( {
        processing: true,
        serverSide: true,
        dom: 'bfrtIp',
        "ajax": {"url": "./getRefIndikator"},
        "columns": [
              { data: 'no_urut', sClass: "dt-center"},
              { data: 'nm_indikator'},
              { data: 'jenis_display', sClass: "dt-center"},
              { data: 'sifat_display', sClass: "dt-center"}
            ],
      "order": [[0, 'asc']],
      "bDestroy": true
    });
};

  $('#tblCariIndikator tbody').on( 'dblclick', 'tr', function () {

    var data = cariindikator.row(this).data();

    document.getElementById("ur_indikator_rkpd").value = data.nm_indikator;
    document.getElementById("kd_indikator_rkpd").value = data.id_indikator;
    $('#cariIndikator').modal('hide');    

  } );

$(document).on('click', '.btnCariProgram', function() {    
    
  LoadCariProgram();
  $('#cariProgramRPJMD').modal('show');
    // $('#tblCariProgramRPJMD').DataTable().ajax.reload();
  });

var cariprogram;

function LoadCariProgram(){
  cariprogram = $('#tblCariProgramRPJMD').DataTable( {
        processing: true,
        serverSide: true,
        dom: 'bfrtIp',
        "ajax": {"url": "./getRefProgramRPJMD"},
        "columns": [
              { data: 'no_urut', sClass: "dt-center"},
              { data: 'kd_program_rpjmd', sClass: "dt-center"},
              { data: 'uraian_program_rpjmd'}
            ],
      "order": [[0, 'asc']],
      "bDestroy": true
    });
};

  $('#tblCariProgramRPJMD tbody').on( 'dblclick', 'tr', function () {

    var data = cariprogram.row(this).data();

    document.getElementById("thn_id_rpjmd").value = data.thn_id;
    document.getElementById("id_visi_rpjmd").value = data.id_visi_rpjmd;
    document.getElementById("id_misi_rpjmd").value = data.id_misi_rpjmd;
    document.getElementById("id_tujuan_rpjmd").value = data.id_tujuan_rpjmd;
    document.getElementById("id_sasaran_rpjmd").value = data.id_sasaran_rpjmd;
    document.getElementById("id_program_rpjmd").value = data.id_program_rpjmd;
    document.getElementById("ur_program_rpjmd").value = data.uraian_program_rpjmd;
    $('#cariProgramRPJMD').modal('hide');    

  });

  $( ".kd_urusan" ).change(function() {
      
      $.ajax({

          type: "GET",
          url: './getBidang/'+$('.kd_urusan').val(),
          dataType: "json",

          success: function(data) {

          var j = data.length;
          var post, i;

          $('select[name="kd_bidang"]').empty();
          $('select[name="kd_bidang"]').append('<option value="-1">---Pilih Kode Bidang---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="kd_bidang"]').append('<option value="'+ post.id_bidang +'">'+ post.nm_bidang +'</option>');
          }
          }
      });
    });

$(document).on('click', '#btnUnProgram', function() {

  var data = progrkpd.row( $(this).parents('tr') ).data();

    $('#id_program_ranwal_posting').val(data.id_rkpd_ranwal);
    $('#status_program_ranwal_posting').val(data.status_data);
    $('#tahun_ranwal_posting').val(data.tahun_rkpd);

    document.getElementById("ur_program_ranwal_posting").innerHTML = data.uraian_program_rpjmd;

    if(data.status_data==0){
        document.getElementById("ur_status_ranwal_posting").innerHTML = "Posting";
    } else {
        document.getElementById("ur_status_ranwal_posting").innerHTML = "Un-Posting";
    }

    $('#StatusProgram').modal('show');
});

$('.modal-footer').on('click', '#btnPostProgram', function() {
      var status_post;
      if($('#status_program_ranwal_posting').val()==0){
          status_post = 1
      } else {
          status_post = 0
      };

      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: 'blangsung/postProgram',
          data: {
              '_token': $('input[name=_token]').val(),
              'tahun_rkpd': $('#tahun_ranwal_posting').val(),
              'id_rkpd_ranwal': $('#id_program_ranwal_posting').val(),
              'status_data': status_post,
          },
          success: function(data) {
              progrkpd.ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
              $('#StatusProgram').modal('hide');
          }
      });
    });

$(document).on('click', '#btnReviuPelaksana', function() {
   var rows_selected = PelaksanaTable.column(0).checkboxes.selected();
  var counts_selected = rows_selected.count(); 
  var rows_data = PelaksanaTable.rows({ selected: true }).data(); 
  var counts_data = PelaksanaTable.rows({ selected: true }).count();  
  if (rows_selected.count() == 0) {
    createPesan("Data belum ada yang dipilih","danger");
    return;
  }; 

  $.each(rows_selected, function(index, rowId){
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });         
    $.ajax({
            type: 'POST',
            url: 'blangsung/postPelaksanaRKPD',
            data: {
                '_token': $('input[name=_token]').val(),
                'status_data':rows_data[index].status_data,
                'id_pelaksana_rpjmd' : rowId,
            },
            success: function(data) {
              createPesan(data.pesan,"success");
              PelaksanaTable.ajax.reload();
              progrkpd.ajax.reload();
            },
            error: function(data){
              createPesan(data.pesan,"danger");
              PelaksanaTable.ajax.reload();
              progrkpd.ajax.reload();
            }
    });
  });
  e.preventDefault();  
});

$(document).on('click', '#btnReviuIndikator', function() {
   var rows_selected = indiProg_tbl.column(0).checkboxes.selected();
  var counts_selected = rows_selected.count(); 
  var rows_data = indiProg_tbl.rows({ selected: true }).data(); 
  var counts_data = indiProg_tbl.rows({ selected: true }).count();  
  if (rows_selected.count() == 0) {
    createPesan("Data belum ada yang dipilih","danger");
    return;
  }; 

  $.each(rows_selected, function(index, rowId){
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });         
    $.ajax({
            type: 'POST',
            url: 'blangsung/postIndikatorRKPD',
            data: {
                '_token': $('input[name=_token]').val(),
                'status_data':rows_data[index].status_data,
                'id_indikator_program_rkpd' : rowId,
            },
            success: function(data) {
              createPesan(data.pesan,"success");
              indiProg_tbl.ajax.reload();
              progrkpd.ajax.reload();
            },
            error: function(data){
              createPesan(data.pesan,"danger");
              indiProg_tbl.ajax.reload();
              progrkpd.ajax.reload();
            }
    });
  });
  e.preventDefault();  
});

$(function(){
        $.ajax({
          type: "GET",
          url: '../admin/parameter/getRefSatuan',
          dataType: "json",
          success: function(data) {

          // console.log(data)  

          var j = data.length;
          var post, i;

          $('select[name="id_satuan_output"]').empty();
          $('select[name="id_satuan_output"]').append('<option value="">--Pilih Satuan Indikator--</option>');

          for (i = 0; i < j; i++) {
              post = data[i];
              $('select[name="id_satuan_output"]').append('<option value="'+ post.id_satuan +'">'+ post.uraian_satuan +'</option>');
            }
              
          }
      });
  });

$(document).on('click', '.btnPrintProyeksiPendapatan', function() {      
  window.open('../PrintProyeksiPendapatan');      
});

$(document).on('click', '.btnPrintReviewRanwalRKPD', function() {
  window.open('../PrintReviewRanwalRKPD');
});

$(document).on('click', '.btnPrintRumusanReviewRanwalRKPD', function() {
  window.open('../PrintRumusanReviewRanwal');
});


});

</script>
@endsection
