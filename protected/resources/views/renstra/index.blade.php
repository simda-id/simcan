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
            <li class="active"><a href="#visi" aria-controls="visi" role="tab" data-toggle="tab">Visi</a></li>
            <li><a href="#misi" aria-controls="misi" role="tab" data-toggle="tab">Misi</a></li>
            <li><a href="#tujuan" aria-controls="tujuan" role="tab" data-toggle="tab">Tujuan</a></li>
            <li><a href="#sasaran" aria-controls="sasaran" role="tab" data-toggle="tab">Sasaran</a></li>
            <li><a href="#program" aria-controls="program" role="tab" data-toggle="tab">Program</a></li>
            <li><a href="#kegiatan" aria-controls="kegiatan" role="tab" data-toggle="tab">Kegiatan</a></li>
          </ul>

          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="visi">
              <br>
              <div class="form-group">
                <label class="control-label col-sm-2" for="id_unit">Unit Penyusun Renstra :</label>
                <div class="col-sm-6">
                  <select class="form-control cbUnit" name="id_unit" id="id_unit">
                    @foreach($dataunit as $val)
                      <option value={{ $val->id_unit }}>{{ $val->nm_unit }}</option>
                    @endforeach
                  </select>
                </div>
                <button type="button" class="btn btn-primary btn-labeled btnPrintKompilasiProgramdanPaguRenstra" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="fa fa-print fa-fw fa-lg"></i></span>Cetak Kompilasi Program dan Pagu Renstra</button>
              </div>
              <br>
              <br>
              <div class="">
              <table id='tblVisi' class="table compact table-responsive table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th width="10%" style="text-align: center">No Visi</th>
                          <th style="text-align: center">Uraian Visi</th>
                          <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                  </tbody>
            </table>
            </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="misi">
              <br>
              <div class="">
              <table id="tblMisi" class="table compact table-responsive table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th width="10%" style="text-align: center; vertical-align:middle">Kode Visi</th>
                          <th width="10%" style="text-align: center; vertical-align:middle">Kode Misi</th>
                          <th style="text-align: center; vertical-align:middle">Uraian Misi</th>
                          <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                  </tbody>
            </table>
            </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="tujuan">
            <br>
            <div class="">
            <table id="tblTujuan" class="table compact table-responsive table-striped table-bordered"  cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th width="10%" style="text-align: center; vertical-align:middle">Kode Misi</th>
                          <th width="10%" style="text-align: center; vertical-align:middle">No Tujuan</th>
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
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#sasaran1" aria-controls="visi" role="tab" data-toggle="tab">Sasaran</a></li>
                <li><a href="#kebijakan" aria-controls="tujuan" role="tab" data-toggle="tab">Kebijakan</a></li>
                <li><a href="#strategi" aria-controls="sasaran" role="tab" data-toggle="tab">Strategi</a></li>
            </ul>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="sasaran1">
              <br>
              <div class="">
                <table id="tblSasaran" class="table compact table-responsive table-striped table-bordered"  cellspacing="0" width="100%">
                      <thead>
                          <tr>
                              <th width="10%" style="text-align: center; vertical-align:middle">Kode Tujuan</th>
                              <th width="10%" style="text-align: center; vertical-align:middle">Kode Sasaran</th>
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
              <div class="">
                <table id="tblKebijakan" class="table compact table-responsive table-striped table-bordered"  cellspacing="0" width="100%">
                      <thead>
                          <tr>
                              <th width="10%" style="text-align: center; vertical-align:middle">Kode Sasaran</th>
                              <th width="10%" style="text-align: center; vertical-align:middle">No Urut</th>
                              <th style="text-align: center; vertical-align:middle">Uraian Kebijakan</th>
                          </tr>
                      </thead>
                      <tbody>
                      </tbody>
                </table>
              </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="strategi">
              <br>
              <div class="">
                <table id="tblStrategi" class="table compact table-responsive table-striped table-bordered"  cellspacing="0" width="100%">
                      <thead>
                          <tr>
                              <th width="10%" style="text-align: center; vertical-align:middle">Kode Sasaran</th>
                              <th width="10%" style="text-align: center; vertical-align:middle">No Urut</th>
                              <th style="text-align: center; vertical-align:middle">Uraian Strategi</th>
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
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#program1" aria-controls="visi" role="tab" data-toggle="tab">Program</a></li>
                <li><a href="#indikatorprogram" aria-controls="misi" role="tab" data-toggle="tab">Indikator Program</a></li>
            </ul>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="program1">
              <br>
              <div class="">
                <table id="tblProgram" class="table compact table-responsive table-striped table-bordered"  cellspacing="0" width="100%">
                  <thead>
                      <tr>
                        <th rowspan="2" width="10%" style="text-align: center; vertical-align:middle">Kode Sasaran</th>
                        <th rowspan="2" width="10%" style="text-align: center; vertical-align:middle">Kode Program</th>
                        <th rowspan="2" style="text-align: center; vertical-align:middle">Uraian Program SKPD</th>
                        <th colspan="5" style="text-align: center; vertical-align:middle">Pagu Program per Tahun (juta rupiah)</th>
                        <th rowspan="2" width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                      </tr>
                      <tr>
                      @foreach($dataperda as $datas)
                          <th width="5%" style="text-align: center">{{$datas->tahun_1}}</th>
                          <th width="5%" style="text-align: center">{{$datas->tahun_2}}</th>
                          <th width="5%" style="text-align: center">{{$datas->tahun_3}}</th>
                          <th width="5%" style="text-align: center">{{$datas->tahun_4}}</th>
                          <th width="5%" style="text-align: center">{{$datas->tahun_5}}</th>
                      @endforeach
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="indikatorprogram">
              <br>
              <div class="">
                <table id="tblIndikatorProgram" class="table compact table-responsive table-striped table-bordered"  cellspacing="0" width="100%">
                      <thead>
                          <tr>
                          <th rowspan="2" width="10%" style="text-align: center; vertical-align:middle">Kode Program</th>
                          <th rowspan="2" width="10%" style="text-align: center; vertical-align:middle">No Urut</th>
                          <th rowspan="2" style="text-align: center; vertical-align:middle">Uraian Indikator</th>
                          <th colspan="7" style="text-align: center; vertical-align:middle">Target Indikator per Tahun</th>
                          <th rowspan="2" width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                      </tr>
                      <tr>
                      @foreach($dataperda as $datas)
                      	  <th width="5%" style="text-align: center">Awal</th>
                          <th width="5%" style="text-align: center">{{$datas->tahun_1}}</th>
                          <th width="5%" style="text-align: center">{{$datas->tahun_2}}</th>
                          <th width="5%" style="text-align: center">{{$datas->tahun_3}}</th>
                          <th width="5%" style="text-align: center">{{$datas->tahun_4}}</th>
                          <th width="5%" style="text-align: center">{{$datas->tahun_5}}</th>
                          <th width="5%" style="text-align: center">Akhir</th>
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
            <div role="tabpanel" class="tab-pane" id="kegiatan">
            <br>
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#kegiatan1" aria-controls="kegiatan" role="tab" data-toggle="tab">Kegiatan</a></li>
                <li><a href="#indikatorkegiatan" aria-controls="kegiatan" role="tab" data-toggle="tab">Indikator Kegiatan</a></li>
                <li><a href="#pelaksana" aria-controls="kegiatan" role="tab" data-toggle="tab">Sub Unit Pelaksana</a></li>
            </ul>
           <div class="tab-content">
              <br>
              <div role="tabpanel" class="tab-pane active" id="kegiatan1">
              <div class="">
              <table id="tblKegiatan" class="table compact table-responsive table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th rowspan="2" width="10%" style="text-align: center; vertical-align:middle">Kode Program</th>
                      <th rowspan="2" width="10%" style="text-align: center; vertical-align:middle">Kode Kegiatan</th>
                      <th rowspan="2" style="text-align: center; vertical-align:middle">Uraian Kegiatan SKPD</th>
                      <th colspan="5" style="text-align: center; vertical-align:middle">Pagu Kegiatan per Tahun (juta rupiah)</th>
                      <th rowspan="2" width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                    </tr>
                    <tr>
                      @foreach($dataperda as $datas)
                          <th width="5%" style="text-align: center">{{$datas->tahun_1}}</th>
                          <th width="5%" style="text-align: center">{{$datas->tahun_2}}</th>
                          <th width="5%" style="text-align: center">{{$datas->tahun_3}}</th>
                          <th width="5%" style="text-align: center">{{$datas->tahun_4}}</th>
                          <th width="5%" style="text-align: center">{{$datas->tahun_5}}</th>
                      @endforeach
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
              </table>
              </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="indikatorkegiatan">
              <br>
              <div class="">
                <table id="tblIndikatorkegiatan" class="table compact table-responsive table-striped table-bordered"  cellspacing="0" width="100%">
                      <thead>
                      <tr>
                          <th rowspan="2" width="10%" style="text-align: center; vertical-align:middle">Kode Kegiatan</th>
                          <th rowspan="2" width="10%" style="text-align: center; vertical-align:middle">No Urut</th>
                          <th rowspan="2" style="text-align: center; vertical-align:middle">Uraian Indikator</th>
                          <th colspan="5" style="text-align: center; vertical-align:middle">Target Indikator per Tahun</th>
                          <th rowspan="2" width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                      </tr>
                      <tr>
                      @foreach($dataperda as $datas)
                          <th width="5%" style="text-align: center">{{$datas->tahun_1}}</th>
                          <th width="5%" style="text-align: center">{{$datas->tahun_2}}</th>
                          <th width="5%" style="text-align: center">{{$datas->tahun_3}}</th>
                          <th width="5%" style="text-align: center">{{$datas->tahun_4}}</th>
                          <th width="5%" style="text-align: center">{{$datas->tahun_5}}</th>
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
                <div class="">
                  <table id="tblPelaksana" class="table compact table-responsive table-striped table-bordered"  cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="10%" style="text-align: center; vertical-align:middle">Kode Kegiatan</th>
                                <th width="10%" style="text-align: center; vertical-align:middle">Kode Unit</th>
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


    {{-- EditVisi --}}
<div id="EditVisi" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> --}}
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="post" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" class="form-control" id="id_visi_renstra_edit" name="id_visi_renstra_edit">
              <input type="hidden" class="form-control" id="id_renstra_edit" name="id_renstra_edit" required="required" >
              <input type="hidden" class="form-control" id="thn_id_edit" name="thn_id_edit" required="required" readonly>
              <div class="form-group">
                <label for="thn_id_edit" class="col-sm-3 control-label" align='left'>Periode renstra :</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="thn_periode_visi" name="thn_periode_visi" required="required" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="no_urut_edit" class="col-sm-3 control-label" align='left'>Nomor Urut :</label>
                <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control" id="no_urut_edit" name="no_urut_edit" required="required">                  
                </div>
                </div>
              </div>
              <div class="form-group">
                <label for="id_perubahan_edit" class="col-sm-3 control-label" align='left'>ID Perubahan :</label>
                <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control" id="id_perubahan_edit" name="id_perubahan_edit" required="required">                  
                </div>
                </div>
              </div>
              <div class="form-group">
                <label for="ur_visi_renstra_edit" class="col-sm-3 control-label" align='left'>Uraian Visi renstra :</label>
                <div class="col-sm-8">
                  <textarea type="text" class="form-control" rows="5" id="ur_visi_renstra_edit" name="ur_visi_renstra_edit" required="required" ></textarea>
                </div>
              </div>
          </form>
        </div>
        <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        {{-- <button type="button" class="btn btn-success actionBtn_visi btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i class="glyphicon glyphicon-save"></i></span>Simpan</button>
                        <div class="or"></div> --}}
                        <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
      </div>
    </div>
</div>

<div id="EditMisi" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> --}}
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="post" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" class="form-control" id="id_misi_renstra_edit" name="id_misi_renstra_edit" readonly >
              <input type="hidden" class="form-control" id="thn_id_misi_edit" name="thn_id_edit" readonly >
              <div class="form-group">
                <label for="id_visi_renstra_edit" class="col-sm-3 control-label" align='left'>ID Visi renstra :</label>
                <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control" id="id_visi_renstra_misi_edit" name="id_visi_renstra_edit" readonly >                  
                </div>
                </div>
              </div>
              <div class="form-group">
                <label for="no_urut_edit" class="col-sm-3 control-label" align='left'>Nomor Urut :</label>
                <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control" id="no_urut_misi_edit" name="no_urut_misi_edit" required="required">                  
                </div>
                </div>
              </div>
              <div class="form-group">
                <label for="id_perubahan_edit" class="col-sm-3 control-label" align='left'>ID Perubahan :</label>
                <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control" id="id_perubahan_misi_edit" name="id_perubahan_edit" required="required" >                  
                </div>
                </div>
              </div>
              <div class="form-group">
                <label for="ur_misi_renstra_edit" class="col-sm-3 control-label" align='left'>Uraian Misi renstra :</label>
                <div class="col-sm-8">
                  <textarea type="text" class="form-control" rows="5" id="ur_misi_renstra_edit" name="ur_misi_renstra_edit" required="required" ></textarea>
                </div>
              </div>
          </form>
        </div>
        <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        {{-- <button type="button" class="btn btn-success actionBtn_misi btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i class="glyphicon glyphicon-save"></i></span>Simpan</button>
                        <div class="or"></div> --}}
                        <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
      </div>
    </div>
  </div>

<div id="EditTujuan" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> --}}
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="post" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" class="form-control" id="id_tujuan_renstra_edit" name="id_tujuan_renstra_edit" readonly >
              <input type="hidden" class="form-control" id="thn_id_tujuan_edit" name="thn_id_edit" required="required" >
              <input type="hidden" class="form-control" id="id_misi_renstra_tujuan_edit" name="id_misi_renstra_edit" required="required">
              <div class="form-group">
                <label for="id_misi_renstra_edit" class="col-sm-3 control-label" align='left'>ID Misi renstra :</label>
                <div class="col-sm-6">
                  <div class="input-group">
                    <input type="text" class="form-control" id="id_misi_tujuan_edit" name="id_misi_tujuan_edit" readonly >
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="no_urut_edit" class="col-sm-3 control-label" align='left'>Nomor Urut :</label>
                <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control" id="no_urut_tujuan_edit" name="no_urut_tujuan_edit" required="required" >                  
                </div>
                </div>
              </div>
              <div class="form-group">
                <label for="id_perubahan_edit" class="col-sm-3 control-label" align='left'>ID Perubahan :</label>
                <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control" id="id_perubahan_tujuan_edit" name="id_perubahan_edit" required="required" >
                  
                </div>
                </div>
              </div>
              <div class="form-group">
                <label for="ur_tujuan_renstra_edit" class="col-sm-3 control-label" align='left'>Uraian tujuan renstra :</label>
                <div class="col-sm-8">
                  <textarea type="text" class="form-control" rows="5" id="ur_tujuan_renstra_edit" name="ur_tujuan_renstra_edit" required="required" ></textarea>
                </div>
              </div>
          </form>
        </div>
        <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        {{-- <button type="button" class="btn btn-success actionBtn_tujuan btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i class="glyphicon glyphicon-save"></i></span>Simpan</button>
                        <div class="or"></div> --}}
                        <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
      </div>
    </div>
  </div>

<div id="Editsasaran" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="post" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" class="form-control" id="id_sasaran_renstra_edit" name="id_sasaran_renstra_edit">
              <input type="hidden" class="form-control" id="thn_id_sasaran_edit" name="thn_id_edit">
              <input type="hidden" class="form-control" id="id_tujuan_renstra_sasaran_edit" name="id_tujuan_renstra_sasaran_edit">
              <div class="form-group">
                <label class="control-label col-sm-3" for="id_sasaran_renstra_edit">ID Tujuan renstra :</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="id_tujuan_sasaran_edit" name="id_tujuan_sasaran_edit" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="no_urut_edit" class="col-sm-3 control-label" align='left'>Nomor Urut :</label>
                <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control" id="no_urut_sasaran_edit" name="no_urut_sasaran_edit" required="required" >                  
                </div>
                </div>
              </div>
              <div class="form-group">
                <label for="id_perubahan_edit" class="col-sm-3 control-label" align='left'>ID Perubahan :</label>
                <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control" id="id_perubahan_sasaran_edit" name="id_perubahan_edit" required="required" >                  
                </div>
                </div>
              </div>
              <div class="form-group">
                <label for="ur_sasaran_renstra_edit" class="col-sm-3 control-label" align='left'>Uraian sasaran renstra :</label>
                <div class="col-sm-8">
                  <textarea type="text" class="form-control" rows="5" id="ur_sasaran_renstra_edit" name="ur_sasaran_renstra_edit" required="required" ></textarea>
                </div>
              </div>
          </form>
        </div>
        <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        {{-- <button type="button" class="btn btn-success actionBtn_sasaran btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i class="glyphicon glyphicon-save"></i></span>Simpan</button>
                        <div class="or"></div> --}}
                        <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
      </div>
    </div>
  </div>

<div id="Editkebijakan" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="post" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" class="form-control" id="id_kebijakan_renstra_edit" name="id_kebijakan_renstra_edit" readonly >
              <input type="hidden" class="form-control" id="thn_id_kebijakan_edit" name="thn_id_edit" readonly >
              <input type="hidden" class="form-control" id="id_sasaran_renstra_kebijakan_edit" name="id_sasaran_renstra_kebijakan_edit" readonly >
              <div class="form-group">
                <label class="control-label col-sm-3" for="id_kebijakan_renstra_edit">ID Sasaran renstra :</label>
                <div class="col-sm-2">
                  <div class="input-group">
                    <input type="text" class="form-control" id="id_sasaran_kebijakan_edit" name="id_sasaran_kebijakan_edit" readonly >
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="no_urut_edit" class="col-sm-3 control-label" align='left'>Nomor Urut :</label>
                <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control" id="no_urut_kebijakan_edit" name="no_urut_kebijakan_edit" required="required" >                  
                </div>
                </div>
              </div>
              <div class="form-group">
                <label for="id_perubahan_edit" class="col-sm-3 control-label" align='left'>ID Perubahan :</label>
                <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control" id="id_perubahan_kebijakan_edit" name="id_perubahan_edit" required="required" >                  
                </div>
                </div>
              </div>
              <div class="form-group">
                <label for="ur_kebijakan_renstra_edit" class="col-sm-3 control-label" align='left'>Uraian kebijakan renstra :</label>
                <div class="col-sm-8">
                  <textarea type="text" class="form-control" rows="5" id="ur_kebijakan_renstra_edit" name="ur_kebijakan_renstra_edit" required="required" ></textarea>
                </div>
              </div>
          </form>
        </div>
        <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        {{-- <button type="button" class="btn btn-success actionBtn_kebijakan btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i class="glyphicon glyphicon-save"></i></span>Simpan</button>
                        <div class="or"></div> --}}
                        <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
      </div>
    </div>
  </div>

<div id="Editstrategi" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="post" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" class="form-control" id="id_strategi_renstra_edit" name="id_strategi_renstra_edit" readonly >
              <input type="hidden" class="form-control" id="thn_id_strategi_edit" name="thn_id_edit" readonly >
              <input type="hidden" class="form-control" id="id_sasaran_renstra_strategi_edit" name="id_sasaran_renstra_edit" readonly >
              <div class="form-group">
                <label class="control-label col-sm-3" for="id_strategi_renstra_edit">ID strategi renstra :</label>
                <div class="col-sm-6">
                  <div class="input-group">
                    <input type="text" class="form-control" id="id_sasaran_strategi_edit" name="id_sasaran_strategi_edit" readonly >
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="no_urut_edit" class="col-sm-3 control-label" align='left'>Nomor Urut :</label>
                <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control" id="no_urut_strategi_edit" name="no_urut_strategi_edit" required="required" >                  
                </div>
                </div>
              </div>
              <div class="form-group">
                <label for="id_perubahan_edit" class="col-sm-3 control-label" align='left'>ID Perubahan :</label>
                <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control" id="id_perubahan_strategi_edit" name="id_perubahan_edit" required="required" >                  
                </div>
                </div>
              </div>
              <div class="form-group">
                <label for="ur_strategi_renstra_edit" class="col-sm-3 control-label" align='left'>Uraian strategi renstra :</label>
                <div class="col-sm-8">
                  <textarea type="text" class="form-control" rows="5" id="ur_strategi_renstra_edit" name="ur_strategi_renstra_edit" required="required" ></textarea>
                </div>
              </div>
          </form>
        </div>
        <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        {{-- <button type="button" class="btn btn-success actionBtn_strategi btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i class="glyphicon glyphicon-save"></i></span>Simpan</button>
                        <div class="or"></div> --}}
                        <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
      </div>
    </div>
  </div>

<div id="Editprogram" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="post" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" class="form-control" id="id_program_renstra_edit" name="id_program_renstra_edit" readonly >
              <input type="hidden" class="form-control" id="thn_id_program_edit" name="thn_id_edit" readonly>
              <input type="hidden" class="form-control" id="id_sasaran_renstra_program_edit" name="id_sasaran_renstra_edit" readonly>
              <div class="form-group">
                <label for="id_sasaran_renstra_edit" class="col-sm-3 control-label" align='left'>ID Sasaran renstra :</label>
                <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control" id="id_sasaran_program_edit" name="id_sasaran_program_edit" readonly>                  
                </div>
                </div>
              </div>
              <div class="form-group">
                <label for="no_urut_edit" class="col-sm-3 control-label" align='left'>Nomor Urut :</label>
                <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control" id="no_urut_program_edit" name="no_urut_program_edit" required="required" >                  
                </div>
                </div>
              </div>              
             
              <div class="form-group">
                <label for="ur_program_renstra_edit" class="col-sm-3 control-label" align='left'>Uraian program renstra :</label>
                <div class="col-sm-8">
                  <textarea type="text" class="form-control" rows="5" id="ur_program_renstra_edit" name="ur_program_renstra_edit" required="required" ></textarea>
                </div>
              </div>
              <label class="col-sm-12 control-label" style="text-align: left;">Rincian Pagu Program renstra :</label>
              <table id="tblPaguProgram" class="table display table-striped table-bordered"  cellspacing="0" width="100%">
                      <thead>
                          <tr>
                            <th width="20%" style="text-align: center; vertical-align:middle">Pagu Tahun 1</th>
                            <th width="20%" style="text-align: center; vertical-align:middle">Pagu Tahun 2</th>
                            <th width="20%" style="text-align: center; vertical-align:middle">Pagu Tahun 3</th>
                            <th width="20%" style="text-align: center; vertical-align:middle">Pagu Tahun 4</th>
                            <th width="20%" style="text-align: center; vertical-align:middle">Pagu Tahun 5</th>
                          </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td width="20%" style="text-align: center; vertical-align:middle">
                              <input type="text" class="form-control number" id="pagu1_edit" name="pagu1_edit" style="text-align: right; ">
                            </td>
                            <td width="20%" style="text-align: center; vertical-align:middle">
                              <input type="text" class="form-control number" id="pagu2_edit" name="pagu2_edit" style="text-align: right; " >
                            </td>
                            <td width="20%" style="text-align: center; vertical-align:middle">
                              <input type="text" class="form-control number" id="pagu3_edit" name="pagu3_edit" style="text-align: right; " >
                            </td>
                            <td width="20%" style="text-align: center; vertical-align:middle">
                              <input type="text" class="form-control number" id="pagu4_edit" name="pagu4_edit" style="text-align: right; " >
                            </td>
                            <td width="20%" style="text-align: center; vertical-align:middle">
                              <input type="text" class="form-control number" id="pagu5_edit" name="pagu5_edit" style="text-align: right; " >
                            </td>
                          </tr>
                      </tbody>
                </table>
          </form>
        </div>
        <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        {{-- <button type="button" class="btn btn-success actionBtn_program btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i class="glyphicon glyphicon-save"></i></span>Simpan</button>
                        <div class="or"></div> --}}
                        <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
      </div>
    </div>
  </div>

    
<div id="Editindikatorprogram" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="post" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" class="form-control" id="id_program_renstra_edit" name="id_program_renstra_edit" readonly >
              <input type="hidden" class="form-control" id="id_ind_program_renstra_edit" name="id_ind_program_renstra_edit" readonly >
              <input type="hidden" class="form-control" id="thn_id_program_edit" name="thn_id_edit" readonly>
              <input type="hidden" class="form-control" id="id_sasaran_renstra_program_edit" name="id_sasaran_renstra_edit" readonly>
                          
             
              <div class="form-group">
                <label for="ur_ind_program_renstra_edit" class="col-sm-3 control-label" align='left'>Uraian program renstra :</label>
                <div class="col-sm-8">
                  <textarea type="text" class="form-control" rows="5" id="ur_ind_program_renstra_edit" name="ur_program_renstra_edit" required="required" ></textarea>
                </div>
              </div>
              <label class="col-sm-12 control-label" style="text-align: left;">Rincian Pagu Program renstra :</label>
              <table id="tblAngkaIndProgram" class="table display table-striped table-bordered"  cellspacing="0" width="100%">
                      <thead>
                          <tr>
                          	<th width="14.3%" style="text-align: center; vertical-align:middle">Angka Awal</th>
                            <th width="14.3%" style="text-align: center; vertical-align:middle">Angka Tahun 1</th>
                            <th width="14.3%" style="text-align: center; vertical-align:middle">Angka Tahun 2</th>
                            <th width="14.3%" style="text-align: center; vertical-align:middle">Angka Tahun 3</th>
                            <th width="14.3%" style="text-align: center; vertical-align:middle">Angka Tahun 4</th>
                            <th width="14.3%" style="text-align: center; vertical-align:middle">Angka Tahun 5</th>
                            <th width="14.3%" style="text-align: center; vertical-align:middle">Angka Akhir</th>
                          </tr>
                      </thead>
                      <tbody>
                        <tr>
                        <td width="14.3%" style="text-align: center; vertical-align:middle">
                              <input type="text" class="form-control number" id="angkaawal_edit" name="angkaawal_edit" style="text-align: right; ">
                            </td>
                            <td width="14.3%" style="text-align: center; vertical-align:middle">
                              <input type="text" class="form-control number" id="angka1_edit" name="angka1_edit" style="text-align: right; ">
                            </td>
                            <td width="14.3%" style="text-align: center; vertical-align:middle">
                              <input type="text" class="form-control number" id="angka2_edit" name="angka2_edit" style="text-align: right; " >
                            </td>
                            <td width="14.3%" style="text-align: center; vertical-align:middle">
                              <input type="text" class="form-control number" id="angka3_edit" name="angka3_edit" style="text-align: right; " >
                            </td>
                            <td width="14.3%" style="text-align: center; vertical-align:middle">
                              <input type="text" class="form-control number" id="angka4_edit" name="angka4_edit" style="text-align: right; " >
                            </td>
                            <td width="14.3%" style="text-align: center; vertical-align:middle">
                              <input type="text" class="form-control number" id="angka5_edit" name="angka5_edit" style="text-align: right; " >
                            </td>
                            <td width="14.3%" style="text-align: center; vertical-align:middle">
                              <input type="text" class="form-control number" id="angkaakhir_edit" name="angkaakhir_edit" style="text-align: right; ">
                            </td>
                          </tr>
                      </tbody>
                </table>
          </form>
        </div>
        <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        {{-- <button type="button" class="btn btn-success actionBtn_ind_program btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i class="glyphicon glyphicon-save"></i></span>Simpan</button>
                        <div class="or"></div> --}}
                        <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
      </div>
    </div>
  </div>

<div id="Editkegiatan" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="post" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" class="form-control" id="id_kegiatan_renstra_edit" name="id_kegiatan_renstra_edit" readonly >
              
              
              <div class="form-group">
                <label for="ur_kegiatan_renstra_edit" class="col-sm-3 control-label" align='left'>Uraian kegiatan renstra :</label>
                <div class="col-sm-8">
                  <textarea type="text" class="form-control" rows="5" id="ur_kegiatan_renstra_edit" name="ur_kegiatan_renstra_edit" required="required" ></textarea>
                </div>
              </div>
              <label class="col-sm-12 control-label" style="text-align: left;">Rincian Pagu Kegiatan Renstra :</label>
              <table id="tblPaguKegiatan" class="table display table-striped table-bordered"  cellspacing="0" width="100%">
                      <thead>
                          <tr>
                            <th width="20%" style="text-align: center; vertical-align:middle">Pagu Tahun 1</th>
                            <th width="20%" style="text-align: center; vertical-align:middle">Pagu Tahun 2</th>
                            <th width="20%" style="text-align: center; vertical-align:middle">Pagu Tahun 3</th>
                            <th width="20%" style="text-align: center; vertical-align:middle">Pagu Tahun 4</th>
                            <th width="20%" style="text-align: center; vertical-align:middle">Pagu Tahun 5</th>
                          </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td width="20%" style="text-align: center; vertical-align:middle">
                              <input type="text" class="form-control number" id="pagu1_edit_kegiatan" name="pagu1_edit_kegiatan" style="text-align: right; ">
                            </td>
                            <td width="20%" style="text-align: center; vertical-align:middle">
                              <input type="text" class="form-control number" id="pagu2_edit_kegiatan" name="pagu2_edit_kegiatan" style="text-align: right; " >
                            </td>
                            <td width="20%" style="text-align: center; vertical-align:middle">
                              <input type="text" class="form-control number" id="pagu3_edit_kegiatan" name="pagu3_edit_kegiatan" style="text-align: right; " >
                            </td>
                            <td width="20%" style="text-align: center; vertical-align:middle">
                              <input type="text" class="form-control number" id="pagu4_edit_kegiatan" name="pagu4_edit_kegiatan" style="text-align: right; " >
                            </td>
                            <td width="20%" style="text-align: center; vertical-align:middle">
                              <input type="text" class="form-control number" id="pagu5_edit_kegiatan" name="pagu5_edit_kegiatan" style="text-align: right; " >
                            </td>
                          </tr>
                      </tbody>
                </table>
          </form>
        </div>
        <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        {{-- <button type="button" class="btn btn-success actionBtn_kegiatan btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i class="glyphicon glyphicon-save"></i></span>Simpan</button>
                        <div class="or"></div> --}}
                        <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
      </div>
    </div>
  </div>

<div id="Editindikatorkegiatan" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="post" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" class="form-control" id="id_ind_kegiatan_renstra_edit" name="id_ind_kegiatan_renstra_edit" readonly >
              
                          
             
              <div class="form-group">
                <label for="ur_ind_kegiatan_renstra_edit" class="col-sm-3 control-label" align='left'>Uraian kegiatan renstra :</label>
                <div class="col-sm-8">
                  <textarea type="text" class="form-control" rows="5" id="ur_ind_kegiatan_renstra_edit" name="ur_kegiatan_renstra_edit" required="required" ></textarea>
                </div>
              </div>
              <label class="col-sm-12 control-label" style="text-align: left;">Rincian Pagu Kegiatan renstra :</label>
              <table id="tblAngkaIndKegiatan" class="table display table-striped table-bordered"  cellspacing="0" width="100%">
                      <thead>
                          <tr>
                          	
                            <th width="20%" style="text-align: center; vertical-align:middle">Angka Tahun 1</th>
                            <th width="20%" style="text-align: center; vertical-align:middle">Angka Tahun 2</th>
                            <th width="20%" style="text-align: center; vertical-align:middle">Angka Tahun 3</th>
                            <th width="20%" style="text-align: center; vertical-align:middle">Angka Tahun 4</th>
                            <th width="20%" style="text-align: center; vertical-align:middle">Angka Tahun 5</th>
                            
                          </tr>
                      </thead>
                      <tbody>
                        <tr>
                        
                            <td width="20%" style="text-align: center; vertical-align:middle">
                              <input type="text" class="form-control number" id="angka1_edit_kegiatan" name="angka1_edit_kegiatan" style="text-align: right; ">
                            </td>
                            <td width="20%" style="text-align: center; vertical-align:middle">
                              <input type="text" class="form-control number" id="angka2_edit_kegiatan" name="angka2_edit_kegiatan" style="text-align: right; " >
                            </td>
                            <td width="20%" style="text-align: center; vertical-align:middle">
                              <input type="text" class="form-control number" id="angka3_edit_kegiatan" name="angka3_edit_kegiatan" style="text-align: right; " >
                            </td>
                            <td width="20%" style="text-align: center; vertical-align:middle">
                              <input type="text" class="form-control number" id="angka4_edit_kegiatan" name="angka4_edit_kegiatan" style="text-align: right; " >
                            </td>
                            <td width="20%" style="text-align: center; vertical-align:middle">
                              <input type="text" class="form-control number" id="angka5_edit_kegiatan" name="angka5_edit_kegiatan" style="text-align: right; " >
                            </td>
                        
                          </tr>
                      </tbody>
                </table>
          </form>
        </div>
        <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        {{-- <button type="button" class="btn btn-success actionBtn_ind_kegiatan btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i class="glyphicon glyphicon-save"></i></span>Simpan</button>
                        <div class="or"></div> --}}
                        <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
      </div>
    </div>
  </div>

<div id="Editpelaksana" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg"  >
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form name="frmModalPelaksana" class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id_pelaksana" id="id_pelaksana">

            <div class="row">
            <div class="col-sm-2" style="text-align: center;">
              <i class="fa fa-map-marker fa-fw" style="font-size: 100px;color: #357EBD;"></i>
            </div>
            <div class="col-sm-10">
            <div class="form-group">
                <label for="pelaksana" class="col-sm-2 control-label" align='left'>Sub Unit Pelaksana :</label>
                <div class="col-sm-10">
                  <select class="form-control tahun" name="pelaksana" id="pelaksana">
                  
                  </select>
<!--                   <input type="text" class="form-control number" id="text_tahun" name="text_tahun" required="required" align='right' > -->
                </div>
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
                      <div class="ui-group-buttons">
                        {{-- <button type="button" class="btn btn-sm btn-success btnPelaksana btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i id="nmbtnPelaksana" class="glyphicon glyphicon-save"></i></span>Simpan</button>
                        <div class="or"></div> --}}
                        <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
      </div>
    </div>
  </div>
</div>
  @endif
@endsection



@section('scripts')
<script type="text/javascript" language="javascript" class="init">
$(document).ready(function() {
  var id_unit_renstra;
  var id_visi_renstra;
  var id_misi_renstra;
  var id_tujuan_renstra;
  var id_sasaran_renstra;
  var id_kebijakan_renstra;
  var id_strategi_renstra;
  var id_program_renstra;
  var id_indikator_program_renstra;
  var id_kegiatan_renstra;
  var id_indikator_kegiatan_renstra;
  var id_pelaksana_kegiatan_renstra;

  function formatTgl(val_tanggal){
      var formattedDate = new Date(val_tanggal);
      var d = formattedDate.getDate();
      var m = formattedDate.getMonth();
      var y = formattedDate.getFullYear();
      var m_names = new Array("Januari", "Februari", "Maret", 
        "April", "Mei", "Juni", "Juli", "Agustus", "September", 
        "Oktober", "November", "Desember")

      var tgl= d + " " + m_names[m] + " " + y;
      return tgl;
  }

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

  $('[data-toggle="popover"]').popover();
  $('.number').number(true,0,',', '.');


  $('.page-alert .close').click(function(e) {
          e.preventDefault();
          $(this).closest('.page-alert').slideUp();
      });

  var tbl_Visi = $('#tblVisi').DataTable( {
          processing: true,
          serverSide: true,
          responsive: true,
          dom : 'BFRTIP',                  
          autoWidth : false,
          order: [[0, 'asc']],
          bDestroy: true,
          language: {
                "decimal": ",",
                "thousands": "."},
          "ajax": "{{url('/renstra/visi/0')}}",
          "columns": [
                { data: 'no_urut', sClass: "dt-center"},
                { data: 'uraian_visi_renstra'},
                { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
              ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        } );
  
  var tbl_Misi = $('#tblMisi').DataTable( {
          processing: true,
          serverSide: true,
          responsive: true,
          dom : 'BFRTIP',                  
          autoWidth : false,
          order: [[0, 'asc']],
          bDestroy: true,
          language: {
                "decimal": ",",
                "thousands": "."},
          "ajax": {"url": "./renstra/misi/0"},
          "columns": [
                { data: 'id_visi_renstra', sClass: "dt-center"},
                { data: 'no_urut', sClass: "dt-center"},
                { data: 'uraian_misi_renstra'},
                { data: 'action', 'searchable': false, 'orderable':false , sClass: "dt-center"}
              ],
                  "order": [[1, 'asc']],
                  "bDestroy": true
        } );

  var tbl_Tujuan = $('#tblTujuan').DataTable( {
          processing: true,
          serverSide: true,
          responsive: true,
          dom : 'BFRTIP',                  
          autoWidth : false,
          order: [[0, 'asc']],
          bDestroy: true,
          language: {
                "decimal": ",",
                "thousands": "."},
          "ajax": {"url": "./renstra/tujuan/0"},
          "columns": [
                { data: 'kd_misi', sClass: "dt-center"},
                { data: 'no_urut', sClass: "dt-center"},
                { data: 'uraian_tujuan_renstra'},
                { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
              ],
                  "order": [[1, 'asc']],
                  "bDestroy": true
          } );

  var tbl_Sasaran = $('#tblSasaran').DataTable( {
          processing: true,
          serverSide: true,
          responsive: true,
          dom : 'BFRTIP',                  
          autoWidth : false,
          order: [[0, 'asc']],
          bDestroy: true,
          language: {
                "decimal": ",",
                "thousands": "."},
          "ajax": {"url": "./renstra/sasaran/0"},
          "columns": [
                { data: 'kd_tujuan', sClass: "dt-center"},
                { data: 'no_urut', sClass: "dt-center"},
                { data: 'uraian_sasaran_renstra'},
                { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
              ],
                  "order": [[1, 'asc']],
                  "bDestroy": true
            } );

  var tbl_Kebijakan = $('#tblKebijakan').DataTable( {
          processing: true,
          serverSide: true,
          responsive: true,
          dom : 'BFRTIP',                  
          autoWidth : false,
          order: [[0, 'asc']],
          bDestroy: true,
          language: {
                "decimal": ",",
                "thousands": "."},
          "ajax": {"url": "./renstra/kebijakan/0"},
          "columns": [
                { data: 'kd_sasaran', sClass: "dt-center"},
                { data: 'no_urut', sClass: "dt-center"},
                { data: 'uraian_kebijakan_renstra'}
              ],
                  "order": [[1, 'asc']],
                  "bDestroy": true
            } );

  var tbl_Strategi = $('#tblStrategi').DataTable( {
          processing: true,
          serverSide: true,
          responsive: true,
          dom : 'BFRTIP',                  
          autoWidth : false,
          order: [[0, 'asc']],
          bDestroy: true,
          language: {
                "decimal": ",",
                "thousands": "."},
          "ajax": {"url": "./renstra/strategi/0"},
          "columns": [
                { data: 'kd_sasaran', sClass: "dt-center"},
                { data: 'no_urut', sClass: "dt-center"},
                { data: 'uraian_strategi_renstra'}
              ],
                  "order": [[1, 'asc']],
                  "bDestroy": true
          } );

  var tbl_Program = $('#tblProgram').DataTable( {
          processing: true,
          serverSide: true,
          responsive: true,
          dom : 'BFRTIP',                  
          autoWidth : false,
          order: [[0, 'asc']],
          bDestroy: true,
          language: {
                "decimal": ",",
                "thousands": "."},
          "ajax": {"url": "./renstra/program/0"},
          "language": {
                "decimal": ",",
                "thousands": "."},
          "columns": [
                { data: 'kd_sasaran', sClass: "dt-center"},
                { data: 'no_urut', sClass: "dt-center"},
                { data: 'nm_program'},
                { data: 'pagu_tahun1',
                      render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
                { data: 'pagu_tahun2',
                      render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
                { data: 'pagu_tahun3',
                      render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
                { data: 'pagu_tahun4',
                      render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
                { data: 'pagu_tahun5',
                      render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
                { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
              ],
            "columnDefs": [ {
                  "visible": false
                  } ],
                  "order": [[1, 'asc']],
                  "bDestroy": true
          } );
  $(document).on('click', '.edit-program', function() {

      var data = tbl_Program.row( $(this).parents('tr') ).data();

	    $('.actionBtn_program').addClass('editprogram');
	    $('.modal-title').text('Edit Data program SKPD');
	    $('.form-horizontal').show();
	    $('#id_program_renstra_edit').val($(this).data('id_program_renstra_program'));
	    $('#no_urut_program_edit').val($(this).data('no_urut_program'));
	    $('#pagu1_edit').val($(this).data('pagu_tahun1_program'));
	    $('#pagu2_edit').val($(this).data('pagu_tahun2_program'));
	    $('#pagu3_edit').val($(this).data('pagu_tahun3_program'));
	    $('#pagu4_edit').val($(this).data('pagu_tahun4_program'));
	    $('#pagu5_edit').val($(this).data('pagu_tahun5_program'));
	    $('#ur_program_renstra_edit').val($(this).data('uraian_program_renstra_program'));
      $('#id_sasaran_program_edit').val(id_sasaran_renstra);
	    $('#Editprogram').modal('show');
	  });

$('.modal-footer').on('click', '.editprogram', function() {
$.ajaxSetup({
   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});

$.ajax({
    type: 'post',
    url: './renstra/editprogram',
    data: {
        '_token': $('input[name=_token]').val(),
        'id_program_renstra_edit': $('#id_program_renstra_edit').val(),
        'no_urut_program_edit': $('#no_urut_program_edit').val(),
        'id_sasaran_renstra_program_edit': $('#id_sasaran_program_edit').val(),
        'pagu1_edit': $('#pagu1_edit').val(),
        'pagu2_edit': $('#pagu2_edit').val(),
        'pagu3_edit': $('#pagu3_edit').val(),
        'pagu4_edit': $('#pagu4_edit').val(),
        'pagu5_edit': $('#pagu5_edit').val(),
        'ur_program_renstra_edit': $('#ur_program_renstra_edit').val(),
    },
    success: function(data) {
        $('#tblProgram').DataTable().ajax.reload();
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }
    }
});
});
  

  var tbl_IndikatorProgram = $('#tblIndikatorProgram').DataTable( {
          processing: true,
          serverSide: true,
          responsive: true,
          dom : 'BFRTIP',                  
          autoWidth : false,
          order: [[0, 'asc']],
          bDestroy: true,
          language: {
                "decimal": ",",
                "thousands": "."},
          "ajax": {"url": "./renstra/programindikator/0"},
          "language": {
                "decimal": ",",
                "thousands": "."},
          "columns": [
                { data: 'kd_program', sClass: "dt-center"},
                { data: 'no_urut', sClass: "dt-center"},
                { data: 'uraian_indikator_program_renstra'},
                { data: 'angka_awal_periode',
                    render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
                { data: 'angka_tahun1',
                      render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
                { data: 'angka_tahun2',
                      render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
                { data: 'angka_tahun3',
                      render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
                { data: 'angka_tahun4',
                      render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
                { data: 'angka_tahun5',
                      render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
                { data: 'angka_akhir_periode',
                      render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
                { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
              ],
          "columnDefs": [ {
              "visible": false
              } ],
                  "order": [[1, 'asc']],
                  "bDestroy": true
          } );
  $(document).on('click', '.edit-ind-program', function() {

      var data = tbl_IndikatorProgram.row( $(this).parents('tr') ).data();

	    $('.actionBtn_ind_program').addClass('editindprogram');
	    $('.modal-title').text('Edit Data Indikator Program SKPD');
	    $('.form-horizontal').show();
	    $('#id_ind_program_renstra_edit').val($(this).data('id_ind_program_renstra_program'));
	    $('#angkaawal_edit').val($(this).data('angka_awal_periode_program'));
	    $('#angka1_edit').val($(this).data('angka_tahun1_program'));
	    $('#angka2_edit').val($(this).data('angka_tahun2_program'));
	    $('#angka3_edit').val($(this).data('angka_tahun3_program'));
	    $('#angka4_edit').val($(this).data('angka_tahun4_program'));
	    $('#angka5_edit').val($(this).data('angka_tahun5_program'));
	    $('#angkaakhir_edit').val($(this).data('angka_akhir_periode_program'));
	    $('#ur_ind_program_renstra_edit').val($(this).data('uraian_ind_program_renstra_program'));
         $('#Editindikatorprogram').modal('show');
	  });

$('.modal-footer').on('click', '.editindprogram', function() {
$.ajaxSetup({
   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});

$.ajax({
    type: 'post',
    url: './renstra/editindikatorprogram',
    data: {
        '_token': $('input[name=_token]').val(),
        'id_ind_program_renstra_edit': $('#id_ind_program_renstra_edit').val(),
        'angkaawal_edit': $('#angkaawal_edit').val(),
        'angka1_edit': $('#angka1_edit').val(),
        'angka2_edit': $('#angka2_edit').val(),
        'angka3_edit': $('#angka3_edit').val(),
        'angka4_edit': $('#angka4_edit').val(),
        'angka5_edit': $('#angka5_edit').val(),
        'angkaakhir_edit': $('#angkaakhir_edit').val(),
        'ur_ind_program_renstra_edit': $('#ur_ind_program_renstra_edit').val(),
    },
    success: function(data) {
        $('#tblIndikatorProgram').DataTable().ajax.reload();
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }
    }
});
});
  var tbl_Kegiatan = $('#tblKegiatan').DataTable( {
          processing: true,
          serverSide: true,
          responsive: true,
          dom : 'BFRTIP',                  
          autoWidth : false,
          order: [[0, 'asc']],
          bDestroy: true,
          language: {
                "decimal": ",",
                "thousands": "."},
          "ajax": {"url": "./renstra/kegiatan/0"},
          "language": {
              "decimal": ",",
              "thousands": "."},
          "columns": [
              { data: 'kd_program', sClass: "dt-center"},
              { data: 'no_urut', sClass: "dt-center"},
              { data: 'ur_kegiatan'},
              { data: 'pagu_tahun1',
                    render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
              { data: 'pagu_tahun2',
                    render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
              { data: 'pagu_tahun3',
                    render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
              { data: 'pagu_tahun4',
                    render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
              { data: 'pagu_tahun5',
                    render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
              { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
              ],
            "columnDefs": [ {
                "visible": false
              } ],
                  "order": [[1, 'asc']],
                  "bDestroy": true
            } );
  $(document).on('click', '.edit-kegiatan', function() {

      var data = tbl_Kegiatan.row( $(this).parents('tr') ).data();

	    $('.actionBtn_kegiatan').addClass('editkegiatan');
	    $('.modal-title').text('Edit Data Kegiatan SKPD');
	    $('.form-horizontal').show();
	    $('#id_kegiatan_renstra_edit').val($(this).data('id_kegiatan_renstra'));
	    $('#pagu1_edit_kegiatan').val($(this).data('pagu_tahun1_kegiatan'));
	    $('#pagu2_edit_kegiatan').val($(this).data('pagu_tahun2_kegiatan'));
	    $('#pagu3_edit_kegiatan').val($(this).data('pagu_tahun3_kegiatan'));
	    $('#pagu4_edit_kegiatan').val($(this).data('pagu_tahun4_kegiatan'));
	    $('#pagu5_edit_kegiatan').val($(this).data('pagu_tahun5_kegiatan'));
	    $('#ur_kegiatan_renstra_edit').val($(this).data('uraian_kegiatan_renstra'));
        $('#Editkegiatan').modal('show');
	  });

$('.modal-footer').on('click', '.editkegiatan', function() {
$.ajaxSetup({
   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});

$.ajax({
    type: 'post',
    url: './renstra/editkegiatan',
    data: {
        '_token': $('input[name=_token]').val(),
        'id_kegiatan_renstra_edit': $('#id_kegiatan_renstra_edit').val(),
        'pagu1_edit': $('#pagu1_edit_kegiatan').val(),
        'pagu2_edit': $('#pagu2_edit_kegiatan').val(),
        'pagu3_edit': $('#pagu3_edit_kegiatan').val(),
        'pagu4_edit': $('#pagu4_edit_kegiatan').val(),
        'pagu5_edit': $('#pagu5_edit_kegiatan').val(),
        'ur_kegiatan_renstra_edit': $('#ur_kegiatan_renstra_edit').val(),
    },
    success: function(data) {
        $('#tblKegiatan').DataTable().ajax.reload();
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }
    }
});
});
  var tbl_Indikatorkegiatan = $('#tblIndikatorkegiatan').DataTable( {
          processing: true,
          serverSide: true,
          responsive: true,
          dom : 'BFRTIP',                  
          autoWidth : false,
          order: [[0, 'asc']],
          bDestroy: true,
          language: {
                "decimal": ",",
                "thousands": "."},
          "ajax": {"url": "./renstra/kegiatanindikator/0"},
          "language": {
              "decimal": ",",
              "thousands": "."},
          "columns": [
              { data: 'kd_kegiatan', sClass: "dt-center"},
              { data: 'no_urut', sClass: "dt-center"},
              { data: 'uraian_indikator_kegiatan_renstra'},
              { data: 'angka_tahun1',
                    render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
              { data: 'angka_tahun2',
                    render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
              { data: 'angka_tahun3',
                    render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
              { data: 'angka_tahun4',
                    render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
              { data: 'angka_tahun5',
                    render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
              { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
              ],
          "columnDefs": [ {
                "visible": false
              } ],
                  "order": [[1, 'asc']],
                  "bDestroy": true
          } );
  $(document).on('click', '.edit-ind-kegiatan', function() {

      var data = tbl_Indikatorkegiatan.row( $(this).parents('tr') ).data();

	    $('.actionBtn_ind_kegiatan').addClass('editindkegiatan');
	    $('.modal-title').text('Edit Data Indikator Program SKPD');
	    $('.form-horizontal').show();
	    $('#id_ind_kegiatan_renstra_edit').val($(this).data('id_ind_kegiatan_renstra_kegiatan'));
	    
	    $('#angka1_edit_kegiatan').val($(this).data('angka_tahun1_kegiatan'));
	    $('#angka2_edit_kegiatan').val($(this).data('angka_tahun2_kegiatan'));
	    $('#angka3_edit_kegiatan').val($(this).data('angka_tahun3_kegiatan'));
	    $('#angka4_edit_kegiatan').val($(this).data('angka_tahun4_kegiatan'));
	    $('#angka5_edit_kegiatan').val($(this).data('angka_tahun5_kegiatan'));
	    
	    $('#ur_ind_kegiatan_renstra_edit').val($(this).data('uraian_ind_kegiatan_renstra_kegiatan'));
         $('#Editindikatorkegiatan').modal('show');
	  });

$('.modal-footer').on('click', '.editindkegiatan', function() {
$.ajaxSetup({
   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});

$.ajax({
    type: 'post',
    url: './renstra/editindikatorkegiatan',
    data: {
        '_token': $('input[name=_token]').val(),
        'id_ind_kegiatan_renstra_edit': $('#id_ind_kegiatan_renstra_edit').val(),
        
        'angka1_edit': $('#angka1_edit_kegiatan').val(),
        'angka2_edit': $('#angka2_edit_kegiatan').val(),
        'angka3_edit': $('#angka3_edit_kegiatan').val(),
        'angka4_edit': $('#angka4_edit_kegiatan').val(),
        'angka5_edit': $('#angka5_edit_kegiatan').val(),
        
        'ur_ind_kegiatan_renstra_edit': $('#ur_ind_kegiatan_renstra_edit').val(),
    },
    success: function(data) {
        $('#tblIndikatorkegiatan').DataTable().ajax.reload();
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }
    }
});
});
  var tbl_Pelaksana = $('#tblPelaksana').DataTable( {
          processing: true,
          serverSide: true,
          responsive: true,
          dom : 'BFRTIP',                  
          autoWidth : false,
          order: [[0, 'asc']],
          bDestroy: true,
          language: {
                "decimal": ",",
                "thousands": "."},
          "ajax": {"url": "./renstra/kegiatanpelaksana/0"},
          "columns": [
              { data: 'kd_kegiatan', sClass: "dt-center"},
              { data: 'kd_sub', sClass: "dt-center"},
              { data: 'nm_sub'},
              { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
            ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
          } );
  $(document).on('click', '.edit-pelaksana-kegiatan', function() {

      var data = tbl_Pelaksana.row( $(this).parents('tr') ).data();

	    $('.actionBtn_pelaksana_kegiatan').addClass('editpelaksanakegiatan');
	    $('.modal-title').text('Edit Data Pelaksana Kegiatan SKPD');
	    $('.form-horizontal').show();
	    $('#id_pelaksana').val($(this).data('id_kegiatan_renstra_pelaksana'));
	    //alert(data.nm_sub_unit);
	    $('select[name="pelaksana"]').empty();
	    $('select[name="pelaksana"]').append('<option value="'+data.id_sub_unit+'">'+data.nm_sub+'</option>');
	    
         
         $.ajax({
             type: "GET",
             url: './renstra/getsubunit/'+data.id_sub_unit,
             dataType: "json",
             success: function(data) {

             var j = data.length;
             var post, i;
            
             for (i = 0; i < j; i++) {
               post = data[i];
               $('select[name="pelaksana"]').append('<option value="'+ post.id_sub_unit +'">'+ post.nm_sub +'</option>');
             }
             }
         });
         $('#Editpelaksana').modal('show');
	  });

  $( ".cbUnit" ).change(function() {
      // alert( $('#id_unit').val() );
      id_unit_renstra =  $('#id_unit').val();
      $('#tblVisi').DataTable().ajax.url("./renstra/visi/"+id_unit_renstra).load();
      $('#tblMisi').DataTable().ajax.url("./renstra/misi/0").load();
    });

  $(document).on('click', '.view-renstramisi', function() {
      id_visi_renstra =  $(this).data('id_visi');
      $('.nav-tabs a[href="#misi"]').tab('show');
      $('#tblMisi').DataTable().ajax.url("./renstra/misi/"+id_visi_renstra).load();
      $('#tblTujuan').DataTable().ajax.url("./renstra/tujuan/0").load();
    });

$('#tblVisi tbody').on( 'dblclick', 'tr', function () {

    var data = tbl_Visi.row(this).data();

    id_visi_renstra =  data.id_visi_renstra;

    $('.nav-tabs a[href="#misi"]').tab('show');
      $('#tblMisi').DataTable().ajax.url("./renstra/misi/"+id_visi_renstra).load();
      $('#tblTujuan').DataTable().ajax.url("./renstra/tujuan/0").load();

});

  $(document).on('click', '.view-renstratujuan', function() {
      id_misi_renstra =  $(this).data('id_misi');
      $('.nav-tabs a[href="#tujuan"]').tab('show');
      $('#tblTujuan').DataTable().ajax.url("./renstra/tujuan/"+id_misi_renstra).load();
      $('#tblSasaran').DataTable().ajax.url("./renstra/sasaran/0").load();
    });

$('#tblMisi tbody').on( 'dblclick', 'tr', function () {

    var data = tbl_Misi.row(this).data();

    id_misi_renstra =  data.id_misi_renstra;

    $('.nav-tabs a[href="#tujuan"]').tab('show');
      $('#tblTujuan').DataTable().ajax.url("./renstra/tujuan/"+id_misi_renstra).load();
      $('#tblSasaran').DataTable().ajax.url("./renstra/sasaran/0").load();

});

  $(document).on('click', '.view-renstrasasaran', function() {
      id_tujuan_renstra =  $(this).data('id_tujuan');
      $('.nav-tabs a[href="#sasaran"]').tab('show');
      $('.nav-tabs a[href="#sasaran1"]').tab('show');
      $('#tblSasaran').DataTable().ajax.url("./renstra/sasaran/"+id_tujuan_renstra).load();
      $('#tblKebijakan').DataTable().ajax.url("./renstra/kebijakan/0").load();
      $('#tblStrategi').DataTable().ajax.url("./renstra/strategi/0").load();
    });

$('#tblTujuan tbody').on( 'dblclick', 'tr', function () {

    var data = tbl_Tujuan.row(this).data();

    id_tujuan_renstra =  data.id_tujuan_renstra;

    $('.nav-tabs a[href="#sasaran"]').tab('show');
      $('.nav-tabs a[href="#sasaran1"]').tab('show');
      $('#tblSasaran').DataTable().ajax.url("./renstra/sasaran/"+id_tujuan_renstra).load();
      $('#tblKebijakan').DataTable().ajax.url("./renstra/kebijakan/0").load();
      $('#tblStrategi').DataTable().ajax.url("./renstra/strategi/0").load();

});

  $(document).on('click', '.view-renstrakebijakan', function() {
      id_sasaran_renstra =  $(this).data('id_sasaran');
      $('.nav-tabs a[href="#kebijakan"]').tab('show');
      $('#tblKebijakan').DataTable().ajax.url("./renstra/kebijakan/"+id_sasaran_renstra).load();
    });

  $(document).on('click', '.view-renstrastrategi', function() {
      id_sasaran_renstra =  $(this).data('id_sasaran');
      $('.nav-tabs a[href="#strategi"]').tab('show');
      $('#tblStrategi').DataTable().ajax.url("./renstra/strategi/"+id_sasaran_renstra).load();
    });

  $(document).on('click', '.view-renstraprogram', function() {
      id_sasaran_renstra =  $(this).data('id_sasaran');
      $('.nav-tabs a[href="#program"]').tab('show');
      $('.nav-tabs a[href="#program1"]').tab('show');
      $('#tblProgram').DataTable().ajax.url("./renstra/program/"+id_sasaran_renstra).load();
      $('#tblIndikatorProgram').DataTable().ajax.url("./renstra/programindikator/0").load();
      $('#tblKegiatan').DataTable().ajax.url("./renstra/kegiatan/0").load();
    });

$('#tblSasaran tbody').on( 'dblclick', 'tr', function () {

    var data = tbl_Sasaran.row(this).data();

    id_sasaran_renstra =  data.id_sasaran_renstra;

    $('.nav-tabs a[href="#program"]').tab('show');
      $('.nav-tabs a[href="#program1"]').tab('show');
      $('#tblProgram').DataTable().ajax.url("./renstra/program/"+id_sasaran_renstra).load();
      $('#tblIndikatorProgram').DataTable().ajax.url("./renstra/programindikator/0").load();
      $('#tblKegiatan').DataTable().ajax.url("./renstra/kegiatan/0").load();

});

  $(document).on('click', '.view-renstraindikator', function() {
      id_program_renstra =  $(this).data('id_program');
      $('.nav-tabs a[href="#indikatorprogram"]').tab('show');
      $('#tblIndikatorProgram').DataTable().ajax.url("./renstra/programindikator/"+id_program_renstra).load();
    });

  $(document).on('click', '.view-renstrakegiatan', function() {
        id_program_renstra =  $(this).data('id_program');
        $('.nav-tabs a[href="#kegiatan"]').tab('show');
        $('.nav-tabs a[href="#kegiatan1"]').tab('show');
        $('#tblKegiatan').DataTable().ajax.url("./renstra/kegiatan/"+id_program_renstra).load();
        $('#tblIndikatorKegiatan').DataTable().ajax.url("./renstra/kegiatanindikator/0").load();
        $('#tblPelaksana').DataTable().ajax.url("./renstra/kegiatanpelaksana/0").load();
      });

$('#tblProgram tbody').on( 'dblclick', 'tr', function () {

    var data = tbl_Program.row(this).data();

    id_program_renstra =  data.id_program_renstra;

    $('.nav-tabs a[href="#kegiatan"]').tab('show');
        $('.nav-tabs a[href="#kegiatan1"]').tab('show');
        $('#tblKegiatan').DataTable().ajax.url("./renstra/kegiatan/"+id_program_renstra).load();
        $('#tblIndikatorKegiatan').DataTable().ajax.url("./renstra/kegiatanindikator/0").load();
        $('#tblPelaksana').DataTable().ajax.url("./renstra/kegiatanpelaksana/0").load();

});

  $(document).on('click', '.view-kegiatanindikator', function() {
        id_kegiatan_renstra =  $(this).data('id_kegiatan');
        $('.nav-tabs a[href="#indikatorkegiatan"]').tab('show');
        $('#tblIndikatorkegiatan').DataTable().ajax.url("./renstra/kegiatanindikator/"+id_kegiatan_renstra).load();
      });

  $(document).on('click', '.view-kegiatanpelaksana', function() {
        id_kegiatan_renstra =  $(this).data('id_kegiatan');
        $('.nav-tabs a[href="#pelaksana"]').tab('show');
        $('#tblPelaksana').DataTable().ajax.url("./renstra/kegiatanpelaksana/"+id_kegiatan_renstra).load();
    });

  $(document).on('click', '.btnPrintKompilasiProgramdanPaguRenstra', function() {
    window.open('./PrintProgPaguRenstra');
  });

} );
</script>
@endsection
