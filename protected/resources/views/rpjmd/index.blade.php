<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app1')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <?php
                $this->title = ' RPJMD ';
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
      <div class="panel panel-warning">
        <div class="panel-heading">
          <h2 class="panel-title">Data Rencana Pembangunan Jangka Menengah Daerah</h2>
        </div>

        <div class="panel-body">
          <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#dokumen" aria-controls="dokumen" role="tab" data-toggle="tab">Dokumen RPJMD</a>
            </li>
            <li class="disabled"><a href="#misi" aria-controls="misi" role="tab" data-toggle="tab">Misi</a></li>
            <li class="disabled"><a href="#tujuan" aria-controls="tujuan" role="tab" data-toggle="tab">Tujuan</a></li>
            <li class="disabled"><a href="#sasaran" aria-controls="sasaran" role="tab" data-toggle="tab">Sasaran</a>
            </li>
            <li class="disabled"><a href="#program" aria-controls="program" role="tab" data-toggle="tab">Program
                Daerah</a></li>
            <li class="disabled"><a href="#btl" aria-controls="btl" role="tab" data-toggle="tab">Belanja Non Program</a>
            </li>
            <li class="disabled"><a href="#pendapatan" aria-controls="pendapatan" role="tab"
                data-toggle="tab">Pendanaan</a></li>
          </ul>

          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="dokumen">
              <br>
              <div class="add">
                <button class="btnAddDokumen btn-labeled btn btn-sm btn-success"><span class="btn-label"><i
                      class="fa fa-plus-square-o fa-fw fa-lg"></i></span>Tambah Dokumen</button>
              </div>
              <table id='tblDokumen' class="table display table-striped table-bordered table-responsive" cellspacing="0"
                width="100%">
                <thead>
                  <tr>
                    <th width="10px" style="text-align: center; vertical-align:middle"></th>
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

            <div role="tabpanel" class="tab-pane" id="misi">
              <br>
              <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered">
                    <tbody>
                      <tr class="backDokumen">
                        <td width="15%" style="text-align: left; vertical-align:top;">Visi RPJMD</td>
                        <td style="text-align: left; vertical-align:top;"><label id="uraian_visi_misi"
                            align='left'></label></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </form>
              <div class="add">
                <button class="btnAddMisi btn-labeled btn btn-sm btn-success"><span class="btn-label"><i
                      class="fa fa-plus-square-o fa-fw fa-lg"></i></span>Tambah Misi</button>
              </div>
              <br>
              <table id="tblMisi" class="table display table-striped table-bordered table-responsive" cellspacing="0"
                width="100%">
                <thead>
                  <tr>
                    <th width="5%" style="text-align: center; vertical-align:middle">Kode Visi</th>
                    <th width="5%" style="text-align: center; vertical-align:middle">No Misi</th>
                    <th style="text-align: center; vertical-align:middle">Uraian Misi</th>
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
                        <td width="15%" style="text-align: left; vertical-align:top;">Visi RPJMD</td>
                        <td style="text-align: left; vertical-align:top;"><label id="uraian_visi_tujuan"
                            align='left'></label></td>
                      </tr>
                      <tr class="backMisi">
                        <td width="15%" style="text-align: left; vertical-align:top;">Misi RPJMD</td>
                        <td style="text-align: left; vertical-align:top;"><label id="uraian_misi_tujuan"
                            align='left'></label></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </form>
              <div class="add">
                <button class="btnAddTujuan btn-labeled btn btn-sm btn-success"><span class="btn-label"><i
                      class="fa fa-plus-square-o fa-fw fa-lg"></i></span>Tambah Tujuan</button>
              </div>
              <br>
              <table id="tblTujuan" class="table display table-striped table-bordered table-responsive" cellspacing="0"
                width="100%">
                <thead>
                  <tr>
                    <th width="3%" style="text-align: center; vertical-align:middle"></th>
                    <th width="5%" style="text-align: center; vertical-align:middle">Kode Misi</th>
                    <th width="5%" style="text-align: center; vertical-align:middle">No Tujuan</th>
                    <th style="text-align: center; vertical-align:middle">Uraian Tujuan</th>
                    <th width="5%" style="text-align: center; vertical-align:middle">Jumlah Indikator</th>
                    <th width="50px" style="text-align: center; vertical-align:middle">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>

            <div role="tabpanel" class="tab-pane" id="sasaran">
              <br>
              <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered">
                    <tbody>
                      <tr class="backDokumen">
                        <td width="15%" style="text-align: left; vertical-align:top;">Visi RPJMD</td>
                        <td style="text-align: left; vertical-align:top;"><label id="uraian_visi_sasaran"
                            align='left'></label></td>
                      </tr>
                      <tr class="backMisi">
                        <td width="15%" style="text-align: left; vertical-align:top;">Misi RPJMD</td>
                        <td style="text-align: left; vertical-align:top;"><label id="uraian_misi_sasaran"
                            align='left'></label></td>
                      </tr>
                      <tr class="backTujuan">
                        <td width="15%" style="text-align: left; vertical-align:top;">Tujuan RPJMD</td>
                        <td style="text-align: left; vertical-align:top;"><label id="uraian_tujuan_sasaran"
                            align='left'></label></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </form>
              <br>
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
                  <div class="add">
                    <button class="btnAddSasaran btn-labeled btn btn-sm btn-success"><span class="btn-label"><i
                          class="fa fa-plus-square-o fa-fw fa-lg"></i></span>Tambah Sasaran</button>
                  </div>
                  <br>
                  <table id="tblSasaran" class="table display table-striped table-bordered table-responsive"
                    cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th width="3%" style="text-align: center; vertical-align:middle"></th>
                        <th width="5%" style="text-align: center; vertical-align:middle">Kode Tujuan</th>
                        <th width="5%" style="text-align: center; vertical-align:middle">No Sasaran</th>
                        <th style="text-align: center; vertical-align:middle">Uraian Sasaran</th>
                        <th width="5%" style="text-align: center; vertical-align:middle">Jumlah Indikator</th>
                        <th width="50px" style="text-align: center; vertical-align:middle">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
                <div role="tabpanel" class="tab-pane" id="strategi">
                  <br>
                  <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered">
                        <tbody>
                          <tr class="backSasaran1">
                            <td width="15%" style="text-align: left; vertical-align:top;">Sasaran RPJMD</td>
                            <td style="text-align: left; vertical-align:top;"><label id="uraian_sasaran_strategi"
                                align='left'></label></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </form>
                  <div class="add">
                    <button class="btnAddStrategi btn-labeled btn btn-sm btn-success"><span class="btn-label"><i
                          class="fa fa-plus-square-o fa-fw fa-lg"></i></span>Tambah Strategi</button>
                  </div>
                  <br>
                  <table id="tblStrategi" class="table display table-striped table-bordered table-responsive"
                    cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th width="15%" style="text-align: center; vertical-align:middle">Kode Sasaran</th>
                        <th width="10%" style="text-align: center; vertical-align:middle">No Strategi</th>
                        <th style="text-align: center; vertical-align:middle">Uraian Strategi</th>
                        <th width="50px" style="text-align: center; vertical-align:middle">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
                <div role="tabpanel" class="tab-pane" id="kebijakan">
                  <br>
                  <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered">
                        <tbody>
                          <tr class="backSasaran1">
                            <td width="15%" style="text-align: left; vertical-align:top;">Sasaran RPJMD</td>
                            <td style="text-align: left; vertical-align:top;"><label id="uraian_sasaran_kebijakan"
                                align='left'></label></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </form>
                  <div class="add">
                    <button class="btnAddKebijakan btn-labeled btn btn-sm btn-success"><span class="btn-label"><i
                          class="fa fa-plus-square-o fa-fw fa-lg"></i></span>Tambah Kebijakan</button>
                  </div>
                  <br>
                  <table id="tblKebijakan" class="table display table-striped table-bordered table-responsive"
                    cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th width="15%" style="text-align: center; vertical-align:middle">Kode Sasaran</th>
                        <th width="5%" style="text-align: center; vertical-align:middle">No Kebijakan</th>
                        <th style="text-align: center; vertical-align:middle">Uraian Kebijakan</th>
                        <th width="50px" style="text-align: center; vertical-align:middle">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
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
                        <td width="15%" style="text-align: left; vertical-align:top;">Visi RPJMD</td>
                        <td style="text-align: left; vertical-align:top;"><label id="uraian_visi_program"
                            align='left'></label></td>
                      </tr>
                      <tr class="backMisi">
                        <td width="15%" style="text-align: left; vertical-align:top;">Misi RPJMD</td>
                        <td style="text-align: left; vertical-align:top;"><label id="uraian_misi_program"
                            align='left'></label></td>
                      </tr>
                      <tr class="backTujuan">
                        <td width="15%" style="text-align: left; vertical-align:top;">Tujuan RPJMD</td>
                        <td style="text-align: left; vertical-align:top;"><label id="uraian_tujuan_program"
                            align='left'></label></td>
                      </tr>
                      <tr class="backSasaran">
                        <td width="15%" style="text-align: left; vertical-align:top;">Sasaran RPJMD</td>
                        <td style="text-align: left; vertical-align:top;"><label id="uraian_sasaran_program"
                            align='left'></label></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </form>
              <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#program1" aria-controls="visi" role="tab" data-toggle="tab">Program</a>
                </li>
                <li class="disabled"><a href="#urusan" aria-controls="tujuan" role="tab" data-toggle="tab">Urusan</a>
                </li>
                <li class="disabled"><a href="#pelaksana" aria-controls="sasaran" role="tab" data-toggle="tab">OPD
                    Pelaksana</a></li>
              </ul>
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="program1">
                  <br>
                  <div class="add">
                    <button class="btnAddProgram btn-labeled btn btn-sm btn-success"><span class="btn-label"><i
                          class="fa fa-plus-square-o fa-fw fa-lg"></i></span>Tambah Program</button>
                  </div>
                  <br>
                  <table id="tblProgram" class="table display table-striped table-bordered table-responsive"
                    cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th rowspan="2" width="10px" style="text-align: center; vertical-align:middle"></th>
                        <th rowspan="2" width="50px" style="text-align: center; vertical-align:middle">Kode Sasaran</th>
                        <th rowspan="2" width="50px" style="text-align: center; vertical-align:middle">No Program</th>
                        <th rowspan="2" style="text-align: center; vertical-align:middle">Uraian Program Pembangunan
                          Daerah</th>
                        <th colspan="6" style="text-align: center; vertical-align:middle">Pagu Program per Tahun (juta
                          rupiah)</th>
                        <th rowspan="2" width="50px" style="text-align: center; vertical-align:middle">Aksi</th>
                      </tr>
                      <tr>
                        @foreach($dataperdarpjmd as $datas)
                        <th width="5%" style="text-align: right">{{$datas->tahun_1}}</th>
                        <th width="5%" style="text-align: right">{{$datas->tahun_2}}</th>
                        <th width="5%" style="text-align: right">{{$datas->tahun_3}}</th>
                        <th width="5%" style="text-align: right">{{$datas->tahun_4}}</th>
                        <th width="5%" style="text-align: right">{{$datas->tahun_5}}</th>
                        <th width="5%" style="text-align: right">Jumlah</th>
                        @endforeach
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
                <div role="tabpanel" class="tab-pane" id="urusan">
                  <br>
                  <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered">
                        <tbody>
                          <tr class="backProgram">
                            <td width="15%" style="text-align: left; vertical-align:top;">Program RPJMD</td>
                            <td style="text-align: left; vertical-align:top;"><label id="uraian_program_urbid"
                                align='left'></label></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </form>
                  <div class="add">
                    <button class="add-urbidprog btn-labeled btn btn-sm btn-success"><span class="btn-label"><i
                          class="fa fa-plus-square-o fa-fw fa-lg"></i></span>Tambah Urusan</button>
                  </div>
                  <table id="tblUrusan" class="table display table-striped table-bordered table-responsive"
                    cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th width="10%" style="text-align: center; vertical-align:middle">Kode Program</th>
                        <th width="10%" style="text-align: center; vertical-align:middle">Kd Urusan</th>
                        <th width="30%" style="text-align: center; vertical-align:middle">Uraian Urusan Daerah</th>
                        <th style="text-align: center; vertical-align:middle">Uraian Bidang</th>
                        <th width="50px" style="text-align: center; vertical-align:middle">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
                <div role="tabpanel" class="tab-pane" id="pelaksana">
                  <br>
                  <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered">
                        <tbody>
                          <tr class="backProgram">
                            <td width="15%" style="text-align: left; vertical-align:top;">Program RPJMD</td>
                            <td style="text-align: left; vertical-align:top;"><label id="uraian_program_pelaksana"
                                align='left'></label></td>
                          </tr>
                          <tr class="backUrusan">
                            <td width="15%" style="text-align: left; vertical-align:top;">Urusan RPJMD</td>
                            <td style="text-align: left; vertical-align:top;"><label id="uraian_urusan_pelaksana"
                                align='left'></label></td>
                          </tr>
                          <tr class="backUrusan">
                            <td width="15%" style="text-align: left; vertical-align:top;">Bidang RPJMD</td>
                            <td style="text-align: left; vertical-align:top;"><label id="uraian_bidang_pelaksana"
                                align='left'></label></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </form>
                  <div class="add">
                    <button class="add-pelaksanaprog btn-labeled btn btn-sm btn-success"><span class="btn-label"><i
                          class="fa fa-plus-square-o fa-fw fa-lg"></i></span>Tambah Pelaksana</button>
                  </div>
                  <table id="tblPelaksana" class="table display table-striped table-bordered table-responsive"
                    cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th rowspan="2" width="10%" style="text-align: center; vertical-align:middle">Kode Urusan</th>
                        <th rowspan="2" width="5%" style="text-align: center; vertical-align:middle">Kode Unit</th>
                        <th rowspan="2" style="text-align: center; vertical-align:middle">Uraian OPD Pelaksana</th>
                        <th colspan="6" style="text-align: center; vertical-align:middle">Pagu Belanja per Tahun (juta
                          rupiah)</th>
                        <th rowspan="2" width="50px" style="text-align: center; vertical-align:middle">Aksi</th>
                      </tr>
                      <tr>
                        @foreach($dataperdarpjmd as $datas)
                        <th width="5%" style="text-align: center">{{$datas->tahun_1}}</th>
                        <th width="5%" style="text-align: center">{{$datas->tahun_2}}</th>
                        <th width="5%" style="text-align: center">{{$datas->tahun_3}}</th>
                        <th width="5%" style="text-align: center">{{$datas->tahun_4}}</th>
                        <th width="5%" style="text-align: center">{{$datas->tahun_5}}</th>
                        <th width="5%" style="text-align: center">Jumlah</th>
                        @endforeach
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
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
                        <td width="15%" style="text-align: left; vertical-align:top;">Dokumen RPJMD</td>
                        <td style="text-align: left; vertical-align:top;"><label id="uraian_dokumen_btl"
                            align='left'></label></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </form>
              <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#uraianBtl" aria-controls="visi" role="tab" data-toggle="tab">Belanja</a>
                </li>
                <li class="disabled"><a href="#urusanBtl" aria-controls="urusanBtl" role="tab"
                    data-toggle="tab">Urusan</a></li>
                <li class="disabled"><a href="#pelaksanaBtl" aria-controls="pelaksanaBtl" role="tab"
                    data-toggle="tab">OPD Pelaksana</a></li>
              </ul>
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="uraianBtl">
                  <br>
                  <div class="add">
                    <button class="btnAddBtl btn-labeled btn btn-sm btn-success"><span class="btn-label"><i
                          class="fa fa-plus-square-o fa-fw fa-lg"></i></span>Tambah Belanja Non Program</button>
                  </div>
                  <br>
                  <table id="tblNonProgram" class="table display table-striped table-bordered table-responsive"
                    cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th rowspan="2" width="10px" style="text-align: center; vertical-align:middle"></th>
                        <th rowspan="2" style="text-align: center; vertical-align:middle">Uraian Belanja Non Program
                        </th>
                        <th colspan="6" style="text-align: center; vertical-align:middle">Pagu Belanja per Tahun (juta
                          rupiah)</th>
                        <th rowspan="2" width="50px" style="text-align: center; vertical-align:middle">Aksi</th>
                      </tr>
                      <tr>
                        @foreach($dataperdarpjmd as $datas)
                        <th width="10%" style="text-align: center">{{$datas->tahun_1}}</th>
                        <th width="10%" style="text-align: center">{{$datas->tahun_2}}</th>
                        <th width="10%" style="text-align: center">{{$datas->tahun_3}}</th>
                        <th width="10%" style="text-align: center">{{$datas->tahun_4}}</th>
                        <th width="10%" style="text-align: center">{{$datas->tahun_5}}</th>
                        <th width="10%" style="text-align: center">Jumlah</th>
                        @endforeach
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
                <div role="tabpanel" class="tab-pane" id="urusanBtl">
                  <br>
                  <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered">
                        <tbody>
                          <tr class="backProgramBtl">
                            <td width="15%" style="text-align: left; vertical-align:top;">Program</td>
                            <td style="text-align: left; vertical-align:top;"><label id="uraian_program_urbid_btl"
                                align='left'></label></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </form>
                  <div class="add">
                    <button class="add-urbidbtl btn-labeled btn btn-sm btn-success"><span class="btn-label"><i
                          class="fa fa-plus-square-o fa-fw fa-lg"></i></span>Tambah Urusan</button>
                  </div>
                  <table id="tblUrusanBtl" class="table display table-striped table-bordered table-responsive"
                    cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th width="10%" style="text-align: center; vertical-align:middle">Kode Non Program</th>
                        <th width="10%" style="text-align: center; vertical-align:middle">Kd Urusan</th>
                        <th width="30%" style="text-align: center; vertical-align:middle">Uraian Urusan</th>
                        <th style="text-align: center; vertical-align:middle">Uraian Bidang</th>
                        <th width="50px" style="text-align: center; vertical-align:middle">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
                <div role="tabpanel" class="tab-pane" id="pelaksanaBtl">
                  <br>
                  <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered">
                        <tbody>
                          <tr class="backProgramBtl">
                            <td width="15%" style="text-align: left; vertical-align:top;">Program</td>
                            <td style="text-align: left; vertical-align:top;"><label id="uraian_program_pelaksana_btl"
                                align='left'></label></td>
                          </tr>
                          <tr class="backUrusanBtl">
                            <td width="15%" style="text-align: left; vertical-align:top;">Urusan</td>
                            <td style="text-align: left; vertical-align:top;"><label id="uraian_urusan_pelaksana_btl"
                                align='left'></label></td>
                          </tr>
                          <tr class="backUrusanBtl">
                            <td width="15%" style="text-align: left; vertical-align:top;">Bidang</td>
                            <td style="text-align: left; vertical-align:top;"><label id="uraian_bidang_pelaksana_btl"
                                align='left'></label></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </form>
                  <div class="add">
                    <button class="add-pelaksanabtl btn-labeled btn btn-sm btn-success"><span class="btn-label"><i
                          class="fa fa-plus-square-o fa-fw fa-lg"></i></span>Tambah Pelaksana</button>
                  </div>
                  <br>
                  <table id="tblPelaksanaBtl" class="table display table-striped table-bordered table-responsive"
                    cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th rowspan="2" width="10%" style="text-align: center; vertical-align:middle">Kode Urusan</th>
                        <th rowspan="2" width="5%" style="text-align: center; vertical-align:middle">Kode Unit</th>
                        <th rowspan="2" style="text-align: center; vertical-align:middle">Uraian OPD Pelaksana</th>
                        <th colspan="6" style="text-align: center; vertical-align:middle">Pagu Belanja per Tahun (juta
                          rupiah)</th>
                        <th rowspan="2" width="50px" style="text-align: center; vertical-align:middle">Aksi</th>
                      </tr>
                      <tr>
                        @foreach($dataperdarpjmd as $datas)
                        <th width="5%" style="text-align: center">{{$datas->tahun_1}}</th>
                        <th width="5%" style="text-align: center">{{$datas->tahun_2}}</th>
                        <th width="5%" style="text-align: center">{{$datas->tahun_3}}</th>
                        <th width="5%" style="text-align: center">{{$datas->tahun_4}}</th>
                        <th width="5%" style="text-align: center">{{$datas->tahun_5}}</th>
                        <th width="5%" style="text-align: center">Jumlah</th>
                        @endforeach
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
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
                        <td width="15%" style="text-align: left; vertical-align:top;">Dokumen RPJMD</td>
                        <td style="text-align: left; vertical-align:top;"><label id="uraian_dokumen_pdt"
                            align='left'></label></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </form>
              <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#sumberdana" aria-controls="visi" role="tab" data-toggle="tab">Sumber
                    Dana</a></li>
                <li class="disabled"><a href="#urusanpdt" aria-controls="urusanpdt" role="tab"
                    data-toggle="tab">Urusan</a></li>
                <li class="disabled"><a href="#pelaksanapdt" aria-controls="pelaksanapdt" role="tab"
                    data-toggle="tab">OPD Pelaksana</a></li>
              </ul>
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="sumberdana">
                  <br>
                  <div class="add">
                    <button class="btnAddDapat btn-labeled btn btn-sm btn-success"><span class="btn-label"><i
                          class="fa fa-plus-square-o fa-fw fa-lg"></i></span>Tambah Pendanaan</button>
                  </div>
                  <br>
                  <table id="tblPendapatan" class="table display table-striped table-bordered table-responsive"
                    cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th rowspan="2" width="10px" style="text-align: center; vertical-align:middle"></th>
                        <th rowspan="2" style="text-align: center; vertical-align:middle">Uraian Sumber data</th>
                        <th colspan="6" style="text-align: center; vertical-align:middle">Kerangka Pendanaan per Tahun
                          (juta rupiah)</th>
                        <th rowspan="2" width="50px" style="text-align: center; vertical-align:middle">Aksi</th>
                      </tr>
                      <tr>
                        @foreach($dataperdarpjmd as $datas)
                        <th width="10%" style="text-align: center">{{$datas->tahun_1}}</th>
                        <th width="10%" style="text-align: center">{{$datas->tahun_2}}</th>
                        <th width="10%" style="text-align: center">{{$datas->tahun_3}}</th>
                        <th width="10%" style="text-align: center">{{$datas->tahun_4}}</th>
                        <th width="10%" style="text-align: center">{{$datas->tahun_5}}</th>
                        <th width="10%" style="text-align: center">Jumlah</th>
                        @endforeach
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
                <div role="tabpanel" class="tab-pane" id="urusanpdt">
                  <br>
                  <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered">
                        <tbody>
                          <tr class="backProgramPdt">
                            <td width="15%" style="text-align: left; vertical-align:top;">Program</td>
                            <td style="text-align: left; vertical-align:top;"><label id="uraian_program_urbid_pdt"
                                align='left'></label></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </form>
                  <div class="add">
                    <button class="add-urbidpdt btn-labeled btn btn-sm btn-success"><span class="btn-label"><i
                          class="fa fa-plus-square-o fa-fw fa-lg"></i></span>Tambah Urusan</button>
                  </div>
                  <table id="tblUrusanPdt" class="table display table-striped table-bordered table-responsive"
                    cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th width="10%" style="text-align: center; vertical-align:middle">Kode Non Program</th>
                        <th width="10%" style="text-align: center; vertical-align:middle">Kd Urusan</th>
                        <th width="30%" style="text-align: center; vertical-align:middle">Uraian Urusan</th>
                        <th style="text-align: center; vertical-align:middle">Uraian Bidang</th>
                        <th width="50px" style="text-align: center; vertical-align:middle">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
                <div role="tabpanel" class="tab-pane" id="pelaksanapdt">
                  <br>
                  <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered">
                        <tbody>
                          <tr class="backProgramPdt">
                            <td width="15%" style="text-align: left; vertical-align:top;">Program</td>
                            <td style="text-align: left; vertical-align:top;"><label id="uraian_program_pelaksana_pdt"
                                align='left'></label></td>
                          </tr>
                          <tr class="backUrusanPdt">
                            <td width="15%" style="text-align: left; vertical-align:top;">Urusan</td>
                            <td style="text-align: left; vertical-align:top;"><label id="uraian_urusan_pelaksana_pdt"
                                align='left'></label></td>
                          </tr>
                          <tr class="backUrusanPdt">
                            <td width="15%" style="text-align: left; vertical-align:top;">Bidang</td>
                            <td style="text-align: left; vertical-align:top;"><label id="uraian_bidang_pelaksana_pdt"
                                align='left'></label></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </form>
                  <div class="add">
                    <button class="add-pelaksanapdt btn-labeled btn btn-sm btn-success"><span class="btn-label"><i
                          class="fa fa-plus-square-o fa-fw fa-lg"></i></span>Tambah Pelaksana</button>
                  </div>
                  <table id="tblPelaksanaPdt" class="table display table-striped table-bordered table-responsive"
                    cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th rowspan="2" width="10%" style="text-align: center; vertical-align:middle">Kode Urusan</th>
                        <th rowspan="2" width="5%" style="text-align: center; vertical-align:middle">Kode Unit</th>
                        <th rowspan="2" style="text-align: center; vertical-align:middle">Uraian OPD Pelaksana</th>
                        <th colspan="6" style="text-align: center; vertical-align:middle">Pagu Belanja per Tahun (juta
                          rupiah)</th>
                        <th rowspan="2" width="50px" style="text-align: center; vertical-align:middle">Aksi</th>
                      </tr>
                      <tr>
                        @foreach($dataperdarpjmd as $datas)
                        <th width="5%" style="text-align: center">{{$datas->tahun_1}}</th>
                        <th width="5%" style="text-align: center">{{$datas->tahun_2}}</th>
                        <th width="5%" style="text-align: center">{{$datas->tahun_3}}</th>
                        <th width="5%" style="text-align: center">{{$datas->tahun_4}}</th>
                        <th width="5%" style="text-align: center">{{$datas->tahun_5}}</th>
                        <th width="5%" style="text-align: center">Jumlah</th>
                        @endforeach
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

<script id="details-inDokumen" type="text/x-handlebars-template">
  <table class="table table-striped display table-bordered table-responsive compact details-table" id="inDokumen-@{{id_rpjmd}}">
      <thead>
        <tr>
          <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
          <th style="text-align: center; vertical-align:middle">Uraian Visi RPJMD</th>
          <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
        </tr>
      </thead>
      <tbody>        
      </tbody>
  </table>
</script>

<script id="details-inTujuan" type="text/x-handlebars-template">
  <table class="table table-striped display table-bordered table-responsive compact details-table" id="inTujuan-@{{id_tujuan_rpjmd}}">
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
  <table class="table table-striped display table-bordered table-responsive compact details-table" id="inSasaran-@{{id_sasaran_rpjmd}}">
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
  <table class="table table-striped display table-bordered table-responsive compact details-table" id="inProgram-@{{id_program_rpjmd}}">
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

@include('rpjmd.FrmRpjmdDokumen');
@include('rpjmd.FrmRpjmdVisi')
@include('rpjmd.FrmRpjmdMisi')
@include('rpjmd.FrmRpjmdTujuan')
@include('rpjmd.FrmRpjmdTujuanIndikator')
@include('rpjmd.FrmRpjmdSasaran')
@include('rpjmd.FrmRpjmdSasaranIndikator')
@include('rpjmd.FrmRpjmdKebijakan')
@include('rpjmd.FrmRpjmdStrategi')
@include('rpjmd.FrmRpjmdProgram')
@include('rpjmd.FrmRpjmdProgramIndikator')
@include('rpjmd.FrmRpjmdUrusan')
@include('rpjmd.FrmRpjmdPelaksana')
@include('bebas.FrmCariIndikator')
@include('bebas.FrmModalProgress')
@endsection

@section('scripts')
<script type="text/javascript" language="javascript" class="init"
  src="{{ asset('/protected/resources/views/rpjmd/JsRpjmdIndex.js')}}"> </script>
@endsection