<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app1')

@section('content')
@if (Auth::guest())
{{-- <li><a href="{{ url('/')}}">Dashboard</a></li> --}}
@else
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <?php
                $this->title = ' Rencana Strategis Perangkat Daerah ';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = '/';
                $breadcrumb->begin();
                $breadcrumb->add(['url' => '/rpjmd','label' => 'RPJMD dan Renstra']);
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
          <h2 class="panel-title">Data Rencana Strategis Perangkat Daerah</h2>
        </div>
        <div class="panel-body">
          <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#dokumen" aria-controls="dokumen" role="tab" data-toggle="tab">Dokumen
                Renstra</a></li>
            {{-- <li><a href="#visi" aria-controls="visi" role="tab" data-toggle="tab">Visi</a></li>
            <li><a href="#misi" aria-controls="misi" role="tab" data-toggle="tab">Misi</a></li> --}}
            <li class="disabled"><a href="#tujuan" aria-controls="tujuan" role="tab" data-toggle="tab">Tujuan</a></li>
            <li class="disabled"><a href="#sasaran" aria-controls="sasaran" role="tab" data-toggle="tab">Sasaran</a>
            </li>
            <li class="disabled"><a href="#program" aria-controls="program" role="tab" data-toggle="tab">Program</a>
            </li>
            {{-- <li><a href="#kegiatan" aria-controls="kegiatan" role="tab" data-toggle="tab">Kegiatan</a></li> --}}
            <li class="disabled"><a href="#btl" aria-controls="btl" role="tab" data-toggle="tab">Belanja Non Program</a>
            </li>
            <li class="disabled"><a href="#pendapatan" aria-controls="pendapatan" role="tab"
                data-toggle="tab">Pendanaan</a></li>
          </ul>

          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="dokumen">
              <br>
              <form name="" class="form-horizontal" role="form" autocomplete='off' action="" method="post">
                <div class="form-group">
                  <label class="control-label col-sm-2" for="id_unit">Unit Penyusun Renstra :</label>
                  <div class="col-sm-6">
                    <select class="form-control select2 cbUnit" name="id_unit" id="id_unit"></select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2 text-left" for="id_unit"></label>
                  <div class="col-sm-7">
                    <a id="btnAddDokumen" type="button" class="btn btn-success btn-labeled btnAddDokumen"><span
                        class="btn-label"><i class="fa fa-plus-square-o fa-fw fa-lg"></i></span> Tambah Dokumen</a>
                  </div>
                </div>
              </form>
              <table id='tblDokumen' class="table display table-striped table-bordered table-responsive" cellspacing="0"
                width="100%">
                <thead>
                  <tr>
                    <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                    <th width="10%" style="text-align: center; vertical-align:middle">Jenis Dokumen</th>
                    <th width="5%" style="text-align: center; vertical-align:middle">Perubahan ke</th>
                    <th style="text-align: center; vertical-align:middle">Nomor Dokumen</th>
                    <th width="15%" style="text-align: center; vertical-align:middle">Tanggal Dokumen</th>
                    <th width="10%" style="text-align: center; vertical-align:middle">Status Dokumen</th>
                    <th width="50px" style="text-align: center; vertical-align:middle">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
            <div role="tabpanel" class="tab-pane" id="tujuan">
              <br>
              <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered">
                    <tbody>
                      <tr class="backDokumen">
                        <td width="15%" style="text-align: left; vertical-align:top;">Nomor Renstra</td>
                        <td style="text-align: left; vertical-align:top;"><label id="no_dokumen_tujuan"
                            align='left'></label></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </form>
              <button type="button" class="btn btn-primary btn-labeled btnTambahTujuan" data-dismiss="modal"
                aria-hidden="true">
                <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Tujuan Renstra</button>
              <div class="">
                <table id="tblTujuan" class="table compact table-responsive table-striped table-bordered display"
                  cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th width="3%" style="text-align: center; vertical-align:middle"></th>
                      {{-- <th width="5%" style="text-align: center; vertical-align:middle">Kode Misi</th> --}}
                      <th width="5%" style="text-align: center; vertical-align:middle">No Tujuan</th>
                      <th style="text-align: center; vertical-align:middle">Uraian Tujuan</th>
                      <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="sasaran">
              <br>
              <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered">
                    <tbody>
                      <tr class="backDokumen">
                        <td width="15%" style="text-align: left; vertical-align:top;">Nomor Renstra</td>
                        <td style="text-align: left; vertical-align:top;"><label id="no_dokumen_sasaran"
                            align='left'></label></td>
                      </tr>
                      <tr class="backTujuan">
                        <td width="15%" style="text-align: left; vertical-align:top;">Tujuan Renstra</td>
                        <td style="text-align: left; vertical-align:top;"><label id="uraian_tujuan_sasaran"
                            align='left'></label></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </form>
              <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#sasaran1" aria-controls="visi" role="tab" data-toggle="tab">Sasaran</a>
                </li>
                <li class="disabled"><a href="#strategi" aria-controls="sasaran" role="tab"
                    data-toggle="tab">Strategi</a></li>
                <li class="disabled"><a href="#kebijakan" aria-controls="tujuan" role="tab"
                    data-toggle="tab">Kebijakan</a></li>
              </ul>
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="sasaran1">
                  <br>
                  <button type="button" class="btn btn-primary btn-labeled btnTambahSasaran" data-dismiss="modal"
                    aria-hidden="true">
                    <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Sasaran Renstra</button>
                  <div class="">
                    <table id="tblSasaran" class="table compact table-responsive table-striped table-bordered display"
                      cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th width="3%" style="text-align: center; vertical-align:middle"></th>
                          <th width="5%" style="text-align: center; vertical-align:middle">Kode Tujuan</th>
                          <th width="5%" style="text-align: center; vertical-align:middle">Kode Sasaran</th>
                          <th style="text-align: center; vertical-align:middle">Uraian Sasaran</th>
                          <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="kebijakan">
                  <br>
                  <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered">
                        <tbody>
                          <tr class="backSasaran1">
                            <td width="15%" style="text-align: left; vertical-align:top;">Sasaran Renstra</td>
                            <td style="text-align: left; vertical-align:top;"><label id="uraian_sasaran_kebijakan"
                                align='left'></label></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </form>
                  <button type="button" class="btn btn-primary btn-labeled btnTambahKebijakan" data-dismiss="modal"
                    aria-hidden="true">
                    <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Kebijakan
                    Renstra</button>
                  <div class="">
                    <table id="tblKebijakan" class="table compact table-responsive table-striped table-bordered display"
                      cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th width="5%" style="text-align: center; vertical-align:middle">Kode Sasaran</th>
                          <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                          <th style="text-align: center; vertical-align:middle">Uraian Kebijakan</th>
                          <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="strategi">
                  <br>
                  <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered">
                        <tbody>
                          <tr class="backSasaran1">
                            <td width="15%" style="text-align: left; vertical-align:top;">Sasaran Renstra</td>
                            <td style="text-align: left; vertical-align:top;"><label id="uraian_sasaran_strategi"
                                align='left'></label></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </form>
                  <button type="button" class="btn btn-primary btn-labeled btnTambahStrategi" data-dismiss="modal"
                    aria-hidden="true">
                    <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Strategi
                    Renstra</button>
                  <div class="">
                    <table id="tblStrategi" class="table compact table-responsive table-striped table-bordered display"
                      cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th width="5%" style="text-align: center; vertical-align:middle">Kode Sasaran</th>
                          <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                          <th style="text-align: center; vertical-align:middle">Uraian Strategi</th>
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
            <div role="tabpanel" class="tab-pane" id="program">
              <br>
              <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered">
                    <tbody>
                      <tr class="backDokumen">
                        <td width="15%" style="text-align: left; vertical-align:top;">Nomor Renstra</td>
                        <td style="text-align: left; vertical-align:top;"><label id="no_dokumen_program"
                            align='left'></label></td>
                      </tr>
                      <tr class="backTujuan">
                        <td width="15%" style="text-align: left; vertical-align:top;">Tujuan Renstra</td>
                        <td style="text-align: left; vertical-align:top;"><label id="uraian_tujuan_program"
                            align='left'></label></td>
                      </tr>
                      <tr class="backSasaran">
                        <td width="15%" style="text-align: left; vertical-align:top;">Sasaran Renstra</td>
                        <td style="text-align: left; vertical-align:top;"><label id="uraian_sasaran_program"
                            align='left'></label></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </form>
              <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#program1" aria-controls="kegiatan" role="tab" data-toggle="tab">Program</a>
                </li>
                <li class="disabled"><a href="#kegiatan" aria-controls="kegiatan" role="tab"
                    data-toggle="tab">Kegiatan</a></li>
                <li class="disabled"><a href="#pelaksana" aria-controls="kegiatan" role="tab" data-toggle="tab">Sub Unit
                    Pelaksana</a></li>
              </ul>
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="program1">
                  <br>
                  <button type="button" class="btn btn-primary btn-labeled btnTambahProgram" data-dismiss="modal"
                    aria-hidden="true">
                    <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Program Renstra</button>
                  <div class="">
                    <table id="tblProgram" class="table compact table-responsive table-striped table-bordered display"
                      cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th rowspan="2" width="3%" style="text-align: center; vertical-align:middle"></th>
                          <th rowspan="2" width="5%" style="text-align: center; vertical-align:middle">Kode Sasaran</th>
                          <th rowspan="2" width="5%" style="text-align: center; vertical-align:middle">Kode Program</th>
                          <th rowspan="2" style="text-align: center; vertical-align:middle">Uraian Program SKPD</th>
                          <th colspan="6" style="text-align: center; vertical-align:middle">Pagu Program per Tahun (juta
                            rupiah)</th>
                          <th rowspan="2" width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                        </tr>
                        <tr>
                          @foreach($dataperda as $datas)
                          <th width="7%" style="text-align: center">{{$datas->tahun_1}}</th>
                          <th width="7%" style="text-align: center">{{$datas->tahun_2}}</th>
                          <th width="7%" style="text-align: center">{{$datas->tahun_3}}</th>
                          <th width="7%" style="text-align: center">{{$datas->tahun_4}}</th>
                          <th width="7%" style="text-align: center">{{$datas->tahun_5}}</th>
                          <th width="7%" style="text-align: center">Total</th>
                          @endforeach
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="kegiatan">
                  <br>
                  <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered">
                        <tbody>
                          <tr class="backProgram">
                            <td width="15%" style="text-align: left; vertical-align:top;">Program Renstra</td>
                            <td style="text-align: left; vertical-align:top;"><label id="uraian_program_kegiatan"
                                align='left'></label></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </form>
                  <button type="button" class="btn btn-primary btn-labeled btnTambahKegiatan" data-dismiss="modal"
                    aria-hidden="true">
                    <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Kegiatan
                    Renstra</button>
                  <div class="">
                    <table id="tblKegiatan" class="table compact table-responsive table-striped table-bordered display"
                      cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th rowspan="2" width="3%" style="text-align: center; vertical-align:middle"></th>
                          <th rowspan="2" width="5%" style="text-align: center; vertical-align:middle">Kode Program</th>
                          <th rowspan="2" width="5%" style="text-align: center; vertical-align:middle">Kode Kegiatan
                          </th>
                          <th rowspan="2" style="text-align: center; vertical-align:middle">Uraian Kegiatan SKPD</th>
                          <th colspan="6" style="text-align: center; vertical-align:middle">Pagu Kegiatan per Tahun
                            (juta rupiah)</th>
                          <th rowspan="2" width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                        </tr>
                        <tr>
                          @foreach($dataperda as $datas)
                          <th width="5%" style="text-align: center">{{$datas->tahun_1}}</th>
                          <th width="5%" style="text-align: center">{{$datas->tahun_2}}</th>
                          <th width="5%" style="text-align: center">{{$datas->tahun_3}}</th>
                          <th width="5%" style="text-align: center">{{$datas->tahun_4}}</th>
                          <th width="5%" style="text-align: center">{{$datas->tahun_5}}</th>
                          <th width="5%" style="text-align: center">Total</th>
                          @endforeach
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="pelaksana">
                  <br>
                  <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered">
                        <tbody>
                          <tr class="backProgram">
                            <td width="15%" style="text-align: left; vertical-align:top;">Program Renstra</td>
                            <td style="text-align: left; vertical-align:top;"><label id="uraian_program_pelaksana"
                                align='left'></label></td>
                          </tr>
                          <tr class="backKegiatan">
                            <td width="15%" style="text-align: left; vertical-align:top;">Kegiatan Renstra</td>
                            <td style="text-align: left; vertical-align:top;"><label id="uraian_kegiatan_pelaksana"
                                align='left'></label></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </form>
                  <button type="button" class="btn btn-primary btn-labeled btnTambahPelaksana" data-dismiss="modal"
                    aria-hidden="true">
                    <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Pelaksana
                    Renstra</button>
                  <div class="">
                    <table id="tblPelaksana" class="table compact table-responsive table-striped table-bordered display"
                      cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th width="5%" style="text-align: center; vertical-align:middle">Kode Kegiatan</th>
                          <th width="5%" style="text-align: center; vertical-align:middle">Kode Unit</th>
                          <th style="text-align: center; vertical-align:middle">Uraian Sub Unit Pelaksana</th>
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

            <div role="tabpanel" class="tab-pane" id="btl">
              <br>
              <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered">
                    <tbody>
                      <tr class="backDokumen">
                        <td width="15%" style="text-align: left; vertical-align:top;">Nomor Renstra</td>
                        <td style="text-align: left; vertical-align:top;"><label id="no_dokumen_btl"
                            align='left'></label></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </form>
              <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#progbtl" aria-controls="progbtl" role="tab" data-toggle="tab">Program</a>
                </li>
                <li class="disabled"><a href="#kegiatanbtl" aria-controls="kegiatanbtl" role="tab"
                    data-toggle="tab">Kegiatan</a></li>
                <li class="disabled"><a href="#pelaksanabtl" aria-controls="pelaksanabtl" role="tab"
                    data-toggle="tab">Sub Unit Pelaksana</a></li>
              </ul>
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="progbtl">
                  <br>
                  <button type="button" class="btn btn-primary btn-labeled btnTambahProgramBtl" data-dismiss="modal"
                    aria-hidden="true">
                    <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Program</button>
                  <div class="">
                    <table id="tblProgramBtl"
                      class="table compact table-responsive table-striped table-bordered display" cellspacing="0"
                      width="100%">
                      <thead>
                        <tr>
                          <th rowspan="2" width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                          <th rowspan="2" width="5%" style="text-align: center; vertical-align:middle">Kode Program</th>
                          <th rowspan="2" style="text-align: center; vertical-align:middle">Uraian Program SKPD</th>
                          <th colspan="6" style="text-align: center; vertical-align:middle">Pagu Program per Tahun (juta
                            rupiah)</th>
                          <th rowspan="2" width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                        </tr>
                        <tr>
                          @foreach($dataperda as $datas)
                          <th width="5%" style="text-align: center">{{$datas->tahun_1}}</th>
                          <th width="5%" style="text-align: center">{{$datas->tahun_2}}</th>
                          <th width="5%" style="text-align: center">{{$datas->tahun_3}}</th>
                          <th width="5%" style="text-align: center">{{$datas->tahun_4}}</th>
                          <th width="5%" style="text-align: center">{{$datas->tahun_5}}</th>
                          <th width="5%" style="text-align: center">Total</th>
                          @endforeach
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="kegiatanbtl">
                  <br>
                  <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered">
                        <tbody>
                          <tr class="backProgramBtl">
                            <td width="15%" style="text-align: left; vertical-align:top;">Program Renstra</td>
                            <td style="text-align: left; vertical-align:top;"><label id="uraian_program_kegiatan_btl"
                                align='left'></label></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </form>
                  <button type="button" class="btn btn-primary btn-labeled btnTambahKegiatanBtl" data-dismiss="modal"
                    aria-hidden="true">
                    <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Kegiatan</button>
                  <div class="">
                    <table id="tblKegiatanBtl"
                      class="table compact table-responsive table-striped table-bordered display" cellspacing="0"
                      width="100%">
                      <thead>
                        <tr>
                          <th rowspan="2" width="5%" style="text-align: center; vertical-align:middle">Kode Program</th>
                          <th rowspan="2" width="5%" style="text-align: center; vertical-align:middle">Kode Kegiatan
                          </th>
                          <th rowspan="2" style="text-align: center; vertical-align:middle">Uraian Kegiatan SKPD</th>
                          <th colspan="6" style="text-align: center; vertical-align:middle">Pagu Kegiatan per Tahun
                            (juta rupiah)</th>
                          <th rowspan="2" width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                        </tr>
                        <tr>
                          @foreach($dataperda as $datas)
                          <th width="5%" style="text-align: center">{{$datas->tahun_1}}</th>
                          <th width="5%" style="text-align: center">{{$datas->tahun_2}}</th>
                          <th width="5%" style="text-align: center">{{$datas->tahun_3}}</th>
                          <th width="5%" style="text-align: center">{{$datas->tahun_4}}</th>
                          <th width="5%" style="text-align: center">{{$datas->tahun_5}}</th>
                          <th width="5%" style="text-align: center">Total</th>
                          @endforeach
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="pelaksanabtl">
                  <br>
                  <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered">
                        <tbody>
                          <tr class="backProgramBtl">
                            <td width="15%" style="text-align: left; vertical-align:top;">Program Renstra</td>
                            <td style="text-align: left; vertical-align:top;"><label id="uraian_program_pelaksana_btl"
                                align='left'></label></td>
                          </tr>
                          <tr class="backKegiatanBtl">
                            <td width="15%" style="text-align: left; vertical-align:top;">Kegiatan Renstra</td>
                            <td style="text-align: left; vertical-align:top;"><label id="uraian_kegiatan_pelaksana_btl"
                                align='left'></label></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </form>
                  <button type="button" class="btn btn-primary btn-labeled btnTambahPelaksanaBtl" data-dismiss="modal"
                    aria-hidden="true">
                    <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Pelaksana Non
                    Program</button>
                  <div class="">
                    <table id="tblPelaksanaBtl"
                      class="table compact table-responsive table-striped table-bordered display" cellspacing="0"
                      width="100%">
                      <thead>
                        <tr>
                          <th width="5%" style="text-align: center; vertical-align:middle">Kode Kegiatan</th>
                          <th width="5%" style="text-align: center; vertical-align:middle">Kode Unit</th>
                          <th style="text-align: center; vertical-align:middle">Uraian Sub Unit Pelaksana</th>
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
            <div role="tabpanel" class="tab-pane" id="pendapatan">
              <br>
              <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered">
                    <tbody>
                      <tr class="backDokumen">
                        <td width="15%" style="text-align: left; vertical-align:top;">Nomor Renstra</td>
                        <td style="text-align: left; vertical-align:top;"><label id="no_dokumen_pdt"
                            align='left'></label></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </form>
              <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#progpdt" aria-controls="progpdt" role="tab" data-toggle="tab">Program</a>
                </li>
                <li class="disabled"><a href="#kegiatanpdt" aria-controls="kegiatanpdt" role="tab"
                    data-toggle="tab">Kegiatan</a></li>
                <li class="disabled"><a href="#pelaksanapdt" aria-controls="pelaksanapdt" role="tab"
                    data-toggle="tab">Sub Unit Pelaksana</a></li>
              </ul>
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="progpdt">
                  <br>
                  <button type="button" class="btn btn-primary btn-labeled btnTambahProgramPdt" data-dismiss="modal"
                    aria-hidden="true">
                    <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Program
                    Pendanaan</button>
                  <div class="">
                    <table id="tblProgramPdt"
                      class="table compact table-responsive table-striped table-bordered display" cellspacing="0"
                      width="100%">
                      <thead>
                        <tr>
                          <th rowspan="2" width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                          <th rowspan="2" width="5%" style="text-align: center; vertical-align:middle">Kode Program</th>
                          <th rowspan="2" style="text-align: center; vertical-align:middle">Uraian Program SKPD</th>
                          <th colspan="6" style="text-align: center; vertical-align:middle">Pagu Program per Tahun (juta
                            rupiah)</th>
                          <th rowspan="2" width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                        </tr>
                        <tr>
                          @foreach($dataperda as $datas)
                          <th width="5%" style="text-align: center">{{$datas->tahun_1}}</th>
                          <th width="5%" style="text-align: center">{{$datas->tahun_2}}</th>
                          <th width="5%" style="text-align: center">{{$datas->tahun_3}}</th>
                          <th width="5%" style="text-align: center">{{$datas->tahun_4}}</th>
                          <th width="5%" style="text-align: center">{{$datas->tahun_5}}</th>
                          <th width="5%" style="text-align: center">Total</th>
                          @endforeach
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="kegiatanpdt">
                  <br>
                  <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered">
                        <tbody>
                          <tr class="backProgramPdt">
                            <td width="15%" style="text-align: left; vertical-align:top;">Program Renstra</td>
                            <td style="text-align: left; vertical-align:top;"><label id="uraian_program_kegiatan_pdt"
                                align='left'></label></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </form>
                  <button type="button" class="btn btn-primary btn-labeled btnTambahKegiatanPdt" data-dismiss="modal"
                    aria-hidden="true">
                    <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Kegiatan
                    Pendapatan</button>
                  <div class="">
                    <table id="tblKegiatanPdt"
                      class="table compact table-responsive table-striped table-bordered display" cellspacing="0"
                      width="100%">
                      <thead>
                        <tr>
                          <th rowspan="2" width="5%" style="text-align: center; vertical-align:middle">Kode Program</th>
                          <th rowspan="2" width="5%" style="text-align: center; vertical-align:middle">Kode Kegiatan
                          </th>
                          <th rowspan="2" style="text-align: center; vertical-align:middle">Uraian Kegiatan SKPD</th>
                          <th colspan="6" style="text-align: center; vertical-align:middle">Pagu Kegiatan per Tahun
                            (juta rupiah)</th>
                          <th rowspan="2" width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                        </tr>
                        <tr>
                          @foreach($dataperda as $datas)
                          <th width="5%" style="text-align: center">{{$datas->tahun_1}}</th>
                          <th width="5%" style="text-align: center">{{$datas->tahun_2}}</th>
                          <th width="5%" style="text-align: center">{{$datas->tahun_3}}</th>
                          <th width="5%" style="text-align: center">{{$datas->tahun_4}}</th>
                          <th width="5%" style="text-align: center">{{$datas->tahun_5}}</th>
                          <th width="5%" style="text-align: center">Total</th>
                          @endforeach
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="pelaksanapdt">
                  <br>
                  <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered">
                        <tbody>
                          <tr class="backProgramPdt">
                            <td width="15%" style="text-align: left; vertical-align:top;">Program Renstra</td>
                            <td style="text-align: left; vertical-align:top;"><label id="uraian_program_pelaksana_pdt"
                                align='left'></label></td>
                          </tr>
                          <tr class="backKegiatanPdt">
                            <td width="15%" style="text-align: left; vertical-align:top;">Kegiatan Renstra</td>
                            <td style="text-align: left; vertical-align:top;"><label id="uraian_kegiatan_pelaksana_pdt"
                                align='left'></label></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </form>
                  <button type="button" class="btn btn-primary btn-labeled btnTambahPelaksanaPdt" data-dismiss="modal"
                    aria-hidden="true">
                    <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Pelaksana
                    Pendapatan</button>
                  <div class="">
                    <table id="tblPelaksanaPdt"
                      class="table compact table-responsive table-striped table-bordered display" cellspacing="0"
                      width="100%">
                      <thead>
                        <tr>
                          <th width="5%" style="text-align: center; vertical-align:middle">Kode Kegiatan</th>
                          <th width="5%" style="text-align: center; vertical-align:middle">Kode Unit</th>
                          <th style="text-align: center; vertical-align:middle">Uraian Sub Unit Pelaksana</th>
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
</div>
@endif

<script id="details-inTujuan" type="text/x-handlebars-template">
  <table class="table table-striped table-bordered table-responsive compact details-table" id="inTujuan-@{{id_tujuan_renstra}}">
        <thead>
          <tr>
            <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
            <th style="text-align: center; vertical-align:middle">Uraian Indikator</th>
            <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
          </tr>
        </thead>
        <tbody>        
        </tbody>
    </table>
</script>

<script id="details-inSasaran" type="text/x-handlebars-template">
  <table class="table table-striped table-bordered table-responsive compact details-table" id="inSasaran-@{{id_sasaran_renstra}}">
        <thead>
          <tr>
            <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
            <th style="text-align: center; vertical-align:middle">Uraian Indikator</th>
            <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
          </tr>
        </thead>
        <tbody>        
        </tbody>
    </table>
  </script>

<script id="details-inProgram" type="text/x-handlebars-template">
  <table class="table table-striped table-bordered table-responsive compact details-table" id="inProgram-@{{id_program_renstra}}">
        <thead>
          <tr>
            <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
            <th style="text-align: center; vertical-align:middle">Uraian Indikator</th>
            <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
          </tr>
        </thead>
        <tbody>        
        </tbody>
    </table>
  </script>

<script id="details-inKegiatan" type="text/x-handlebars-template">
  <table class="table table-striped table-bordered table-responsive compact details-table" id="inKegiatan-@{{id_kegiatan_renstra}}">
        <thead>
          <tr>
            <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
            <th style="text-align: center; vertical-align:middle">Uraian Indikator</th>
            <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
          </tr>
        </thead>
        <tbody>        
        </tbody>
    </table>
  </script>

@include('renstra.FrmRenstraDokumen')
@include('renstra.FrmRenstraVisi')
@include('renstra.FrmRenstraMisi')
@include('renstra.FrmRenstraTujuan')
@include('renstra.FrmRenstraTujuanIndikator')
@include('renstra.FrmRenstraSasaran')
@include('renstra.FrmRenstraSasaranIndikator')
@include('renstra.FrmRenstraStrategi')
@include('renstra.FrmRenstraKebijakan')
@include('renstra.FrmRenstraProgram')
@include('renstra.FrmRenstraProgramIndikator')
@include('renstra.FrmRenstraKegiatan')
@include('renstra.FrmRenstraKegiatanIndikator')
@include('renstra.FrmRenstraKegiatanPelaksana')
@include('bebas.FrmCariIndikator')
@include('bebas.FrmCariSasaranRPJMD')
@include('bebas.FrmCariItemRenstra')
@include('bebas.FrmCariSasaranIndikatorRpjmd')
@include('bebas.FrmCariSasaranIndikatorRenstra')
@include('bebas.FrmCariItemRenstra')
@include('bebas.FrmCariProgramRef')
@include('bebas.FrmCariKegiatanRef')
@include('bebas.FrmModalProgress')

@endsection



@section('scripts')
<script type="text/javascript" language="javascript" class="init"
  src="{{ asset('/protected/resources/views/renstra/JsRenstraIndex.js')}}"> </script>
@endsection