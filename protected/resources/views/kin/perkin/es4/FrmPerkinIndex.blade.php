<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app4')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <?php
                $this->title = ' Penetapan Kinerja Perangkat Daerah';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = '/';
                $breadcrumb->begin();
                $breadcrumb->add(['url' => '/perkin','label' => 'Perencanaan Kinerja']);
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
            <h2 class="panel-title">Perencanaan Kinerja Perangkat Daerah</h2>
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
                <label for="cb_eselon_4" class="col-sm-2 control-label" align='left'>Unit Level 3:</label>
                <div class="col-sm-9">
                    <select class="form-control cb_eselon_4" name="cb_eselon_4" id="cb_eselon_4"></select>
                </div>
              </div>             
            <div class="form-group">
              <label class="control-label col-sm-2"></label>
              <div class="col-sm-9">
                  <button type="button" class="btn btn-labeled btn-success btnAddDokumen">
                    <span class="btn-label"><i class="fa fa-plus fa-lg fa-fw"></i></span> Tambah Dokumen Perkin
                  </button>  
              </div>
            </div>
            </form> 
          <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#dokumen" aria-controls="dokumen" role="tab" data-toggle="tab">Dokumen Perkin</a></li>
            <li><a href="#sasaran" aria-controls="sasaran" role="tab" data-toggle="tab">Kegiatan</a></li>
          </ul>

          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="dokumen">
              <br>
              <table id='tblDokPerkin' class="table display table-striped table-bordered table-responsive" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                          <th width="5%" style="text-align: center; vertical-align:middle">Tahun Perkin</th>
                          <th width="15%" style="text-align: center; vertical-align:middle">No Dokumen Perkin</th>
                          <th style="text-align: center; vertical-align:middle">Pejabat Pembuat Dokumen Perkin</th>
                          <th width="50px" style="text-align: center; vertical-align:middle">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                  </tbody>
            </table>
            </div>
            <div role="tabpanel" class="tab-pane" id="sasaran">
              <br>
              <form name="" class="form-horizontal" role="form" autocomplete='off' action="" method="post">
              <div class="form-group">
                  <label for="cb_dok_perkin" class="col-sm-2 control-label" align='left'>Dokumen Perkin Eselon 3</label>
                  <div class="col-sm-9">
                      <select class="form-control cb_dok_perkin" name="cb_dok_perkin" id="cb_dok_perkin"></select>
                  </div>
                </div>              
                <div class="form-group">
                  <label class="control-label col-sm-2"></label>
                  <div class="col-sm-9">
                      <button type="button" class="btn btn-labeled btn-primary btnProsesSasaran">
                        <span class="btn-label"><i class="fa fa-refresh fa-lg fa-fw"></i></span> Proses Perkin 
                      </button>  
                  </div>
                </div>
              </form>
              <br>
                <table id="tblSasaran" class="table display table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
                      <thead>
                          <tr>
                            <th rowspan="2" width="2%" style="text-align: center; vertical-align:middle"></th>
                            <th rowspan="2" width="3%" style="text-align: center; vertical-align:middle">No Urut</th>                            
                            <th rowspan="2" width="5%" style="text-align: center; vertical-align:middle">Kode Kegiatan</th>
                            <th rowspan="2" style="text-align: center; vertical-align:middle">Uraian Kegiatan</th>
                            <th colspan="5" width="45%" style="text-align: center; vertical-align:middle">Pagu Kegiatan</th>                            
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
            </div>
            </div>
          </div>
          </div>
      </div>
</div>

<script id="details-inSasaran" type="text/x-handlebars-template">
  <table class="table table-striped display table-bordered table-responsive compact details-table" id="inSasaran-@{{id_perkin_kegiatan}}">
      <thead>
        <tr>
          <th rowspan="2" width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
          <th rowspan="2" style="text-align: center; vertical-align:middle">Uraian Indikator</th>
          <th colspan="5" width="50%" style="text-align: center; vertical-align:middle">Target</th>
          <th rowspan="2" width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
        </tr>
        <tr>
            <th width="10%" style="text-align: center; vertical-align:middle">Triwulan I</th>
            <th width="10%" style="text-align: center; vertical-align:middle">Triwulan II</th>
            <th width="10%" style="text-align: center; vertical-align:middle">Triwulan III</th>
            <th width="10%" style="text-align: center; vertical-align:middle">Triwulan IV</th>
            <th width="10%" style="text-align: center; vertical-align:middle">Total</th>
          </tr>
      </thead>
      <tbody>        
      </tbody>
  </table>
</script>

@include('kin.perkin.es4.FrmPerkinDokumen')
@include('kin.perkin.es4.FrmPerkinProgramIndikator')
@include('kin.perkin.es4.FrmPerkinKegiatan')
@endsection

@section('scripts')
<script type="text/javascript" language="javascript" class="init" src="{{ asset('/protected/resources/views/kin/perkin/es4/js_perkin_es4.js')}}"></script>
@endsection
