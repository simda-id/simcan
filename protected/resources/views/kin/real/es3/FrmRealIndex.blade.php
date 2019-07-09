<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app4')
<style>
 .realisasi {
    /* display: none; */
    /* visibility: hidden; */
    opacity: 0.3;
    pointer-events: none;
  }

  #radioBtn_reviu .notActive{
    color: #b5b6b7;
    background-color: #fff;
  }
</style>

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <?php
                $this->title = ' Pengukuran Kinerja Perangkat Daerah';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = '/';
                $breadcrumb->begin();
                $breadcrumb->add(['url' => '/real/es4','label' => 'Pengukuran Kinerja']);
                $breadcrumb->add(['label' => $this->title]);
                $breadcrumb->end();
            ?>
      </div>
    </div>    
    <div id="pesan"></div>
    <div id="prosesbar" class="lds-spinner">
      <div></div><div></div><div></div><div></div>
      <div></div><div></div><div></div><div></div>
      <div></div><div></div><div></div><div></div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-warning">
          <div class="panel-heading">
            <h2 class="panel-title">Pengukuran Kinerja Perangkat Daerah</h2>
          </div>
          <div class="panel-body"> 
            <form name="" class="form-horizontal" role="form" autocomplete='off' action="" method="post">         
            <div class="form-group">
              <label for="cb_unit_renstra" class="col-sm-2 control-label" align='left'>Unit Perangkat Daerah:</label>
              <div class="col-sm-9">
                  <select class="form-control cb_unit_renstra" name="cb_unit_renstra" id="cb_unit_renstra"></select>
              </div>
            </div> 
            <div class="form-group">
                <label for="cb_eselon_3" class="col-sm-2 control-label" align='left'>Unit Level 2:</label>
                <div class="col-sm-9">
                    <select class="form-control cb_eselon_3" name="cb_eselon_3" id="cb_eselon_3"></select>
                </div>
            </div>            
            <div class="form-group">
              <label class="control-label col-sm-2"></label>
              <div class="col-sm-9">
                  <button type="button" class="btn btn-labeled btn-success btnAddDokumen">
                    <span class="btn-label"><i class="fa fa-plus fa-lg fa-fw"></i></span> Tambah Dokumen Realisasi
                  </button>  
              </div>
            </div>
            </form> 
          <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#dokumen" aria-controls="dokumen" role="tab" data-toggle="tab">Dokumen Realisasi</a></li>
            <li><a href="#sasaran" aria-controls="sasaran" role="tab" data-toggle="tab">Program</a></li>
            <li><a href="#indikator" aria-controls="indikator" role="tab" data-toggle="tab">Indikator</a></li>
            <li><a href="#dokCapaian" aria-controls="capaian" role="tab" data-toggle="tab">Capaian Level 3</a></li>
            <li><a href="#program" aria-controls="program" role="tab" data-toggle="tab">Capaian Program</a></li>
          </ul>

          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="dokumen">
              <br>
              <table id='tblDokPerkin' class="table display table-striped table-bordered table-responsive" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                          <th width="5%" style="text-align: center; vertical-align:middle">Tahun Realisasi</th>
                          <th width="5%" style="text-align: center; vertical-align:middle">Triwulan</th>
                          <th width="15%" style="text-align: center; vertical-align:middle">No Dokumen Realisasi</th>
                          <th style="text-align: center; vertical-align:middle">Pejabat Pembuat Dokumen Realisasi</th>
                          <th width="50px" style="text-align: center; vertical-align:middle">Status</th>
                          <th width="50px" style="text-align: center; vertical-align:middle">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                  </tbody>
            </table>
            </div>
            <div role="tabpanel" class="tab-pane" id="sasaran">
              <br>
                  <div class="col-sm-9 ">
                      <button type="button" class="btn btn-labeled btn-primary btnProsesSasaran">
                        <span class="btn-label"><i class="fa fa-refresh fa-lg fa-fw"></i></span> Proses Realisasi 
                      </button>  
                  </div>
              <br>
                <table id="tblSasaran" class="table display table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
                      <thead>
                          <tr>
                            <th rowspan="2" width="2%" style="text-align: center; vertical-align:middle"></th>
                            <th rowspan="2" width="3%" style="text-align: center; vertical-align:middle">No Urut</th>                            
                            <th rowspan="2" width="5%" style="text-align: center; vertical-align:middle">Kode Program</th>
                            <th rowspan="2" style="text-align: center; vertical-align:middle">Uraian Program</th>
                            <th colspan="5" width="40%" style="text-align: center; vertical-align:middle">Pagu Program</th>                            
                            <th rowspan="2" width="5%" style="text-align: center; vertical-align:middle">Jumlah Indikator</th>
                            <th rowspan="2" width="5%" style="text-align: center; vertical-align:middle">Aksi</th>
                          </tr>
                          <tr> 
                              <th style="text-align: center; vertical-align:middle">Triwulan I</th>
                              <th style="text-align: center; vertical-align:middle">Triwulan II</th>                            
                              <th style="text-align: center; vertical-align:middle">Triwulan III</th>
                              <th style="text-align: center; vertical-align:middle">Triwulan IV</th>                           
                              <th style="text-align: center; vertical-align:middle">Total</th>
                          </tr>
                      </thead>
                      <tbody>
                      </tbody>
                </table>
              </div>
              <div role="tabpanel" class="tab-pane" id="indikator">
                  <br>
                    <table id="tblIndikator" class="table display table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
                          <thead>
                              <tr>
                                <th rowspan="2" width="2%" style="text-align: center; vertical-align:middle"></th>
                                <th rowspan="2" width="3%" style="text-align: center; vertical-align:middle">No Urut</th>
                                <th rowspan="2" style="text-align: center; vertical-align:middle">Uraian Indikator Program</th>
                                <th colspan="5" width="40%" style="text-align: center; vertical-align:middle">Target Program</th> 
                                <th rowspan="2" width="5%" style="text-align: center; vertical-align:middle">Aksi</th>
                              </tr>
                              <tr>
                                  <th style="text-align: center; vertical-align:middle">Triwulan I</th>
                                  <th style="text-align: center; vertical-align:middle">Triwulan II</th>                            
                                  <th style="text-align: center; vertical-align:middle">Triwulan III</th>
                                  <th style="text-align: center; vertical-align:middle">Triwulan IV</th>                           
                                  <th style="text-align: center; vertical-align:middle">Total</th>
                              </tr>
                          </thead>
                          <tbody>
                          </tbody>
                    </table>
                  </div>
                  <div role="tabpanel" class="tab-pane" id="dokCapaian">
                      <br>
                        <table id="tblCapaian" class="table display table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                                    <th width="5%" style="text-align: center; vertical-align:middle">Tahun</th>
                                    <th width="5%" style="text-align: center; vertical-align:middle">Triwulan</th>
                                    <th width="15%" style="text-align: center; vertical-align:middle">No Dokumen Realisasi</th>
                                    <th style="text-align: center; vertical-align:middle">Pejabat Level 3</th>
                                    <th width="50px" style="text-align: center; vertical-align:middle">Status</th>
                                    <th width="50px" style="text-align: center; vertical-align:middle">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                      </div>
                  <div role="tabpanel" class="tab-pane" id="program">
                      <br>
                        <table id="tblProgram" class="table display table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                  <th rowspan="3" width="3%" style="text-align: center; vertical-align:middle">No Urut</th>
                                  <th rowspan="3" style="text-align: center; vertical-align:middle">Uraian Indikator Kegiatan</th>
                                  <th colspan="8" width="40%" style="text-align: center; vertical-align:middle">Target dan Realisasi Kegiatan</th> 
                                  <th rowspan="3" width="5%" style="text-align: center; vertical-align:middle">Aksi</th>
                                </tr>
                                <tr>
                                    <th colspan="2" width="10%" style="text-align: center; vertical-align:middle">Triwulan I</th>
                                    <th colspan="2" width="10%" style="text-align: center; vertical-align:middle">Triwulan II</th>                            
                                    <th colspan="2" width="10%" style="text-align: center; vertical-align:middle">Triwulan III</th>
                                    <th colspan="2" width="10%" style="text-align: center; vertical-align:middle">Triwulan IV</th> 
                                </tr>
                                <tr>
                                    <th width="5%" style="text-align: center; vertical-align:middle">Target</th>
                                    <th width="5%" style="text-align: center; vertical-align:middle">Capaian</th>                            
                                    <th width="5%" style="text-align: center; vertical-align:middle">Target</th>
                                    <th width="5%" style="text-align: center; vertical-align:middle">Capaian</th>                           
                                    <th width="5%" style="text-align: center; vertical-align:middle">Target</th>
                                    <th width="5%" style="text-align: center; vertical-align:middle">Capaian</th>
                                    <th width="5%" style="text-align: center; vertical-align:middle">Target</th>
                                    <th width="5%" style="text-align: center; vertical-align:middle">Capaian</th>
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

<script id="details-inSasaran" type="text/x-handlebars-template">
  <table class="table table-striped display table-bordered table-responsive compact details-table" id="inSasaran-@{{id_real_program}}">
      <thead>
          <tr>
            <td style="text-align: center; vertical-align:middle"></td>
            <td width="10%" style="text-align: center; vertical-align:middle">Triwulan I</td>
            <td width="10%" style="text-align: center; vertical-align:middle">Triwulan II</td>
            <td width="10%" style="text-align: center; vertical-align:middle">Triwulan III</td>
            <td width="10%" style="text-align: center; vertical-align:middle">Triwulan IV</td>
            <td width="10%" style="text-align: center; vertical-align:middle"></td>
          </tr>        
        </thead>
      <tbody>      
      </tbody>
  </table>
</script>

<script id="details-inIndikator" type="text/x-handlebars-template">
  <table class="table table-striped display table-bordered table-responsive compact details-table" id="inIndikator-@{{id_real_indikator}}">
      <thead>
          <tr>
            <td style="text-align: center; vertical-align:middle"></td>
            <td width="10%" style="text-align: center; vertical-align:middle">Triwulan I</td>
            <td width="10%" style="text-align: center; vertical-align:middle">Triwulan II</td>
            <td width="10%" style="text-align: center; vertical-align:middle">Triwulan III</td>
            <td width="10%" style="text-align: center; vertical-align:middle">Triwulan IV</td>
            <td width="10%" style="text-align: center; vertical-align:middle"></td>
          </tr>        
        </thead>
      <tbody>      
      </tbody>
  </table>
</script>

@include('kin.real.es3.FrmRealDokumen')
@include('kin.real.es3.FrmRealProgramIndikator')
@include('kin.real.es3.FrmRealProgram')
@include('kin.real.es3.FrmRealKegiatanIndikator')
@endsection

@section('scripts')
<script type="text/javascript" language="javascript" class="init" src="{{ asset('/protected/resources/views/kin/real/es3/js_real_es3.js')}}"></script>
@endsection
