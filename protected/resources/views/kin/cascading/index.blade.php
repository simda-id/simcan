<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app4')

@section('content')
  @if (Auth::guest())
  @else
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <?php
                $this->title = ' Cascading Hasil Program - Kegiatan Perangkat Daerah ';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = '/';
                $breadcrumb->begin();
                $breadcrumb->add(['url' => '/cascading','label' => $this->title]);
                $breadcrumb->end();
            ?>
      </div>
    </div>   
    <div id="pesan"></div>
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-info">
          <div class="panel-heading">
            <h2 class="panel-title">{{$this->title}}</h2>
          </div>  
          <div class="panel-body">
          <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#sasaran" aria-controls="sasaran" role="tab" data-toggle="tab">Sasaran Strategis</a></li>
            <li><a href="#program" aria-controls="program" role="tab" data-toggle="tab">Sasaran Program</a></li>
            <li><a href="#kegiatan" aria-controls="kegiatan" role="tab" data-toggle="tab">Sasaran Kegiatan</a></li>
          </ul>

          <div class="tab-content">  
            <div role="tabpanel" class="tab-pane active" id="sasaran">
              <br>
              <div class="form-group">
                <label class="control-label col-sm-2" for="id_unit">Unit Penyusun Renstra :</label>
                <div class="col-sm-6">
                  <select class="form-control cbUnit" name="id_unit" id="id_unit">
                    {{-- @foreach($dataunit as $val)
                      <option value={{ $val->id_unit }}>{{ $val->nm_unit }}</option>
                    @endforeach --}}
                  </select>
                </div>
              </div>
              <div>
                <table id="tblSasaran" class="table compact table-responsive table-striped table-bordered display"  cellspacing="0" width="100%">
                      <thead>
                          <tr>
                              <th rowspan="2" width="3%" style="text-align: center; vertical-align:middle"></th>
                              <th rowspan="2" width="5%" style="text-align: center; vertical-align:middle">Nomor Urut</th>
                              <th rowspan="2" width="5%" style="text-align: center; vertical-align:middle">Kode Sasaran</th>
                              <th rowspan="2" style="text-align: center; vertical-align:middle">Uraian Sasaran</th>
                              <th colspan="2" width="20%" style="text-align: center; vertical-align:middle">Jumlah</th>
                          </tr>
                          <tr>                            
                              <th width="10%" style="text-align: center; vertical-align:middle">Sasaran Program</th>
                              <th width="10%" style="text-align: center; vertical-align:middle">Program Belum Mapping</th>
                          </tr>
                      </thead>
                      <tbody></tbody>
                </table>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="program">
            <br>
            <form class="form-horizontal" role="form">
            <div class="form-group">
              <label for="ur_sasaran_strategis_prog" class="col-sm-2 control-label" align='left'>Uraian Sasaran Strategis </label>
              <div class="col-sm-10">
                <textarea type="text" class="form-control" rows="2" id="ur_sasaran_strategis_prog" name="ur_sasaran_strategis_prog" readonly></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label" align='left'></label>
              <div class="col-sm-10">
                <button type="button" class="btn btn-labeled btn-success btnTambahHSP">
                  <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span> Tambah Sasaran Program</button>
              </div>
            </div>
            </form>
            <div>
                  <table id="tblSasaranProgram" class="table compact table-responsive table-striped table-bordered display"  cellspacing="0" width="100%">
                      <thead>
                          <tr>
                            <th width="3%" style="text-align: center; vertical-align:middle"></th>
                            <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                            <th width="5%" style="text-align: center; vertical-align:middle">Kode Referensi</th>
                            <th width="5%" style="text-align: center; vertical-align:middle">Kode Program</th>
                            <th style="text-align: center; vertical-align:middle">Uraian Program Renstra</th>
                            <th style="text-align: center; vertical-align:middle">Uraian Sasaran Program</th>
                            <th width="10%" style="text-align: center; vertical-align:middle">Jml Indikator</th>
                            <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                          </tr>
                      </thead>
                      <tbody></tbody>
                  </table>
            </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="kegiatan">
            <br>
            <form class="form-horizontal" role="form">
                <div class="form-group">
                  <label for="ur_sasaran_strategis_keg" class="col-sm-2 control-label" align='left'>Uraian Sasaran Strategis </label>
                  <div class="col-sm-10">
                    <textarea type="text" class="form-control" rows="2" id="ur_sasaran_strategis_keg" name="ur_sasaran_strategis_keg" readonly></textarea>
                  </div>
                </div>
                <div class="form-group">
                    <label for="ur_sasaran_program_keg" class="col-sm-2 control-label" align='left'>Uraian Sasaran Program </label>
                    <div class="col-sm-10">
                      <textarea type="text" class="form-control" rows="2" id="ur_sasaran_program_keg" name="ur_sasaran_program_keg" readonly></textarea>
                    </div>
                  </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label" align='left'></label>
                  <div class="col-sm-10">
                      <button type="button" class="btn btn-labeled btn-success btnTambahHSK">
                          <span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span> Tambah Sasaran Kegiatan</button>
                  </div>
                </div>
              </form>
              <div>
                <table id="tblSasaranKegiatan" class="table compact table-responsive table-striped table-bordered display" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th width="3%" style="text-align: center; vertical-align:middle"></th>
                        <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                        <th width="5%" style="text-align: center; vertical-align:middle">Kode Referensi</th>
                        <th width="5%" style="text-align: center; vertical-align:middle">Kode Kegiatan</th>
                        <th style="text-align: center; vertical-align:middle">Uraian Kegiatan Renstra</th>
                        <th style="text-align: center; vertical-align:middle">Uraian Sasaran Kegiatan</th>
                        <th width="10%" style="text-align: center; vertical-align:middle">Jml Indikator</th>
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

<script id="details-inSasaran" type="text/x-handlebars-template">
    <table class="table table-striped display table-bordered table-responsive compact details-table" id="inSasaran-@{{id_sasaran_renstra}}">
        <thead>
          <tr>
            <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
            <th style="text-align: center; vertical-align:middle">Uraian Indikator</th>
          </tr>
        </thead>
        <tbody>        
        </tbody>
    </table>
  </script>
  
  <script id="details-inProgram" type="text/x-handlebars-template">
    <table class="table table-striped display table-bordered table-responsive compact details-table" id="inProgram-@{{id_hasil_program}}">
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
    <table class="table table-striped display table-bordered table-responsive compact details-table" id="inKegiatan-@{{id_hasil_kegiatan}}">
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

  @include('kin.cascading.FrmRenstraProgram')
  @include('kin.cascading.FrmRenstraProgramIndikator')
  @include('kin.cascading.FrmRenstraKegiatan')
  @include('kin.cascading.FrmRenstraKegiatanIndikator')
  @include('kin.cascading.FrmCariItemRenstra')

@endsection

@section('scripts')
<script type="text/javascript" language="javascript" class="init" src="{{ asset('/protected/resources/views/kin/cascading/js_cascading.js')}}"></script>
@endsection
