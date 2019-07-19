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
            <li class="active"><a href="#dokumen" aria-controls="dokumen" role="tab" data-toggle="tab">Dokumen RPJMD</a></li>
            {{-- <li><a href="#visi" aria-controls="visi" role="tab" data-toggle="tab">Visi</a></li> --}}
            <li><a href="#misi" aria-controls="misi" role="tab" data-toggle="tab">Misi</a></li>
            <li><a href="#tujuan" aria-controls="tujuan" role="tab" data-toggle="tab">Tujuan</a></li>
            <li><a href="#sasaran" aria-controls="sasaran" role="tab" data-toggle="tab">Sasaran</a></li>
            <li><a href="#program" aria-controls="program" role="tab" data-toggle="tab">Program Daerah</a></li>
            <li><a href="#btl" aria-controls="btl" role="tab" data-toggle="tab">Belanja Non Program</a></li>
            <li><a href="#pendapatan" aria-controls="pendapatan" role="tab" data-toggle="tab">Pendapatan</a></li>
          </ul>

          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="dokumen">
              <br>
              <div class="add">
                <button class="btnAddDokumen btn-labeled btn btn-sm btn-success"><span class="btn-label"><i class="fa fa-plus-square-o fa-fw fa-lg"></i></span>Tambah Dokumen</button>
              </div>
              <table id='tblDokumen' class="table display table-striped table-bordered table-responsive" cellspacing="0" width="100%">
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

            <div role="tabpanel" class="tab-pane hidden" id="visi">
              <br>
              <form class="form-horizontal" autocomplete='off' method="post">
                <div class="form-group">
                  <label for="txt_no_perda" class="col-xs-2 text-left">Nomor Perda :</label>
                  <div class="col-xs-4">
                    <p class=""><span id="no_perda_rpjmd"></span></p>
                  </div>
                    <div class="btn-group">
                  <button type="button" class="btn btn-primary dropdown-toggle btn-labeled" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown"><span class="btn-label"><i class="fa fa-print fa-fw fa-lg"></i></span>Cetak RPJMD <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li>
                              <a class="dropdown-item btnPrintRPJMDTSK" ><i class="fa fa-print fa-fw fa-lg text-success"></i> Cetak RPJMD </a> 
                            </li>
                            <li>
                              <a class="dropdown-item btnPrintProgPrio" ><i class="fa fa-print fa-fw fa-lg text-danger"></i> Cetak Program Prioritas</a>
                            </li>                  
                        </ul>
                </div>
                </div>
                <div class="form-group">
                  <label for="txt_tgl_perda" class="col-xs-2" align='left'>Tanggal Perda :</label>
                  <div class="col-xs-6">
                    <p class=""><span id="tgl_perda_rpjmd"></span></p>
                  </div>
                </div>
                <div class="form-group">
                  <label for="txt_periode" class="col-xs-2" align='left'>Periode RPJMD :</label>
                  <div class="col-xs-6">
                    <p class=""><span id="periode_awal_rpjmd"></span> sampai dengan <span id="periode_akhir_rpjmd"></span></p>
                  </div>
                  
                </div>

              </form>
              <br>
              <table id='tblVisi' class="table display table-striped table-bordered table-responsive" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th width="5%" style="text-align: center; vertical-align:middle">No Visi</th>
                          <th style="text-align: center; vertical-align:middle">Uraian Visi</th>
                          <th width="50px" style="text-align: center; vertical-align:middle">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                  </tbody>
            </table>
            </div>

            <div role="tabpanel" class="tab-pane" id="misi">
               <br>
                  <div class="add">
                    <button class="btnAddMisi btn-labeled btn btn-sm btn-success"><span class="btn-label"><i class="fa fa-plus-square-o fa-fw fa-lg"></i></span>Tambah Misi</button>
              </div>
              <br>
              <table id="tblMisi" class="table display table-striped table-bordered table-responsive" cellspacing="0" width="100%">
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
                  <div class="add">
                    <button class="btnAddTujuan btn-labeled btn btn-sm btn-success"><span class="btn-label"><i class="fa fa-plus-square-o fa-fw fa-lg"></i></span>Tambah Tujuan</button>
              </div>
            <br>
            <table id="tblTujuan" class="table display table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
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
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#sasaran1" aria-controls="visi" role="tab" data-toggle="tab">Sasaran</a></li>
                <li><a href="#strategi" aria-controls="sasaran" role="tab" data-toggle="tab">Strategi</a></li>
                <li><a href="#kebijakan" aria-controls="tujuan" role="tab" data-toggle="tab">Kebijakan</a></li>
            </ul>

            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="sasaran1">
                 <br>
                  <div class="add">
                    <button class="btnAddSasaran btn-labeled btn btn-sm btn-success"><span class="btn-label"><i class="fa fa-plus-square-o fa-fw fa-lg"></i></span>Tambah Sasaran</button>
              </div>
            <br>
                <table id="tblSasaran" class="table display table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
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
                <div class="add">
                    <button class="btnAddStrategi btn-labeled btn btn-sm btn-success"><span class="btn-label"><i class="fa fa-plus-square-o fa-fw fa-lg"></i></span>Tambah Strategi</button>
                </div>
              <br>
                <table id="tblStrategi" class="table display table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
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
                <div class="add">
                    <button class="btnAddKebijakan btn-labeled btn btn-sm btn-success"><span class="btn-label"><i class="fa fa-plus-square-o fa-fw fa-lg"></i></span>Tambah Kebijakan</button>
                </div>
              <br>
                <table id="tblKebijakan" class="table display table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
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
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#program1" aria-controls="visi" role="tab" data-toggle="tab">Program</a></li>
                <li><a href="#urusan" aria-controls="tujuan" role="tab" data-toggle="tab">Urusan</a></li>
                <li><a href="#pelaksana" aria-controls="sasaran" role="tab" data-toggle="tab">OPD Pelaksana</a></li>
            </ul>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="program1">
                <br>
                  <div class="add">
                    <button class="btnAddProgram btn-labeled btn btn-sm btn-success"><span class="btn-label"><i class="fa fa-plus-square-o fa-fw fa-lg"></i></span>Tambah Program</button>
              </div>
              <br>
                <table id="tblProgram" class="table display table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th rowspan="2" width="10px" style="text-align: center; vertical-align:middle"></th>
                          <th rowspan="2" width="50px" style="text-align: center; vertical-align:middle">Kode Sasaran</th>
                          <th rowspan="2" width="50px" style="text-align: center; vertical-align:middle">No Program</th>
                          <th rowspan="2" style="text-align: center; vertical-align:middle">Uraian Program Pembangunan Daerah</th>
                          <th colspan="6" style="text-align: center; vertical-align:middle">Pagu Program per Tahun (juta rupiah)</th>
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
              <div class="add">
                <button class="add-urbidprog btn-labeled btn btn-sm btn-success"><span class="btn-label"><i class="fa fa-plus-square-o fa-fw fa-lg"></i></span>Tambah Urusan</button>
              </div>
                <table id="tblUrusan" class="table display table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
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
              <div class="add">
                <button class="add-pelaksanaprog btn-labeled btn btn-sm btn-success"><span class="btn-label"><i class="fa fa-plus-square-o fa-fw fa-lg"></i></span>Tambah Pelaksana</button>
              </div>
                <table id="tblPelaksana" class="table display table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
                      <thead>
                          <tr>
                              <th width="10%" style="text-align: center; vertical-align:middle">Kode Program</th>
                              <th width="10%" style="text-align: center; vertical-align:middle">Kode Unit</th>
                              <th style="text-align: center; vertical-align:middle">Uraian OPD Pelaksana</th>
                              <th width="50px" style="text-align: center; vertical-align:middle">Aksi</th>
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
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#uraianBtl" aria-controls="visi" role="tab" data-toggle="tab">Belanja</a></li>
                <li><a href="#urusanBtl" aria-controls="urusanBtl" role="tab" data-toggle="tab">Urusan</a></li>
                <li><a href="#pelaksanaBtl" aria-controls="pelaksanaBtl" role="tab" data-toggle="tab">OPD Pelaksana</a></li>
            </ul>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="uraianBtl">
              <br>
                <div class="add">
                      <button class="btnAddBtl btn-labeled btn btn-sm btn-success"><span class="btn-label"><i class="fa fa-plus-square-o fa-fw fa-lg"></i></span>Tambah Belanja Non Program</button>
                </div>
              <br>
                <table id="tblBtl" class="table display table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th rowspan="2" width="10px" style="text-align: center; vertical-align:middle"></th>
                          <th rowspan="2" style="text-align: center; vertical-align:middle">Uraian Belanja Non Program</th>
                          <th colspan="6" style="text-align: center; vertical-align:middle">Pagu Belanja per Tahun (juta rupiah)</th>
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
              <div class="add">
                <button class="add-urbidbtl btn-labeled btn btn-sm btn-success"><span class="btn-label"><i class="fa fa-plus-square-o fa-fw fa-lg"></i></span>Tambah Urusan</button>
              </div>
                <table id="tblUrusanBtl" class="table display table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
                      <thead>
                          <tr>
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
              <div class="add">
                <button class="add-pelaksanabtl btn-labeled btn btn-sm btn-success"><span class="btn-label"><i class="fa fa-plus-square-o fa-fw fa-lg"></i></span>Tambah Pelaksana</button>
              </div>
              <br>
                <table id="tblPelaksanaBtl" class="table display table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
                      <thead>
                          <tr>
                              <th width="10%" style="text-align: center; vertical-align:middle">Kode Urusan</th>
                              <th width="10%" style="text-align: center; vertical-align:middle">Kode Unit</th>
                              <th style="text-align: center; vertical-align:middle">Uraian OPD Pelaksana</th>
                              <th width="50px" style="text-align: center; vertical-align:middle">Aksi</th>
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
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#sumberdana" aria-controls="visi" role="tab" data-toggle="tab">Sumber Dana</a></li>
                <li><a href="#urusanpdt" aria-controls="urusanpdt" role="tab" data-toggle="tab">Urusan</a></li>
                <li><a href="#pelaksanapdt" aria-controls="pelaksanapdt" role="tab" data-toggle="tab">OPD Pelaksana</a></li>
            </ul>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="sumberdana">
              <br>
                  <div class="add">
                    <button class="btnAddDapat btn-labeled btn btn-sm btn-success"><span class="btn-label"><i class="fa fa-plus-square-o fa-fw fa-lg"></i></span>Tambah Pendapatan</button>
              </div>
            <br>
                <table id="tblPendapatan" class="table display table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th rowspan="2" width="10px" style="text-align: center; vertical-align:middle"></th>
                          <th rowspan="2" style="text-align: center; vertical-align:middle">Uraian Sumber data</th>
                          <th colspan="6" style="text-align: center; vertical-align:middle">Kerangka Pendanaan per Tahun (juta rupiah)</th>
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
              <div class="add">
                <button class="add-urbidpdt btn-labeled btn btn-sm btn-success"><span class="btn-label"><i class="fa fa-plus-square-o fa-fw fa-lg"></i></span>Tambah Urusan</button>
              </div>
                <table id="tblUrusanPdt" class="table display table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
                      <thead>
                          <tr>
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
              <div class="add">
                <button class="add-pelaksanapdt btn-labeled btn btn-sm btn-success"><span class="btn-label"><i class="fa fa-plus-square-o fa-fw fa-lg"></i></span>Tambah Pelaksana</button>
              </div>
                <table id="tblPelaksanaPdt" class="table display table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
                      <thead>
                          <tr>
                              <th width="10%" style="text-align: center; vertical-align:middle">Kode Urusan</th>
                              <th width="10%" style="text-align: center; vertical-align:middle">Kode Unit</th>
                              <th style="text-align: center; vertical-align:middle">Uraian OPD Pelaksana</th>
                              <th width="50px" style="text-align: center; vertical-align:middle">Aksi</th>
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
    <script type="text/javascript" language="javascript" class="init" src="{{ asset('/protected/resources/views/rpjmd/js_rpjmd_final.js')}}"> </script>
@endsection
