<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app4')
<style>
  #radioBtn .notActive{
    color: #b5b6b7;
    background-color: #fff;
  }
</style>

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <?php
                $this->title = ' IKU Pemerintah Daerah';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = '/';
                $breadcrumb->begin();
                $breadcrumb->add(['url' => '/iku','label' => 'IKU Pemerintah Daerah']);
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
            <h2 class="panel-title">Penetapan IKU Pemerintah Daerah</h2>
          </div>
          <div class="panel-body"> 
            <form name="" class="form-horizontal" role="form" autocomplete='off' action="" method="post"> 
            <div class="form-group">
              <div class="col-sm-9">
                  <button type="button" class="btn btn-labeled btn-success btnAddDokumen">
                    <span class="btn-label"><i class="fa fa-plus fa-lg fa-fw"></i></span> Tambah Dokumen IKU
                  </button>  
              </div>
            </div>
            </form> 
          <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#dokumen" aria-controls="dokumen" role="tab" data-toggle="tab">Dokumen Iku</a></li>
            <li><a href="#sasaran" aria-controls="sasaran" role="tab" data-toggle="tab">Sasaran</a></li>
          </ul>

          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="dokumen">
              <br>
              <table id='tblDokPerkin' class="table display table-striped table-bordered table-responsive" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                          <th width="15%" style="text-align: center; vertical-align:middle">No Dokumen IKU</th>
                          <th style="text-align: center; vertical-align:middle">Uraian Dokumen IKU</th>
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
                      <div class="col-sm-9">
                          <button type="button" class="btn btn-labeled btn-primary btnProsesSasaran">
                            <span class="btn-label"><i class="fa fa-refresh fa-lg fa-fw"></i></span> Load Sumber Data IKU 
                          </button>  
                      </div>
                    </div>
                </form> 
            <br>
                <table id="tblSasaran" class="table display table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
                      <thead>
                          <tr>
                            <th rowspan="2" width="2%" style="text-align: center; vertical-align:middle"></th>
                            <th rowspan="2" width="5%" style="text-align: center; vertical-align:middle">No Urut</th>   
                            <th rowspan="2" style="text-align: center; vertical-align:middle">Uraian Sasaran</th>                            
                            <th colspan="2" width="20%" style="text-align: center; vertical-align:middle">Jumlah Indikator</th>
                          </tr>
                          <tr>
                              <th width="10%" style="text-align: center; vertical-align:middle">IKU</th>
                              <th width="10%" style="text-align: center; vertical-align:middle">NON IKU</th>  
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
  <table class="table table-striped display table-bordered table-responsive compact details-table" id="inSasaran-@{{id_sasaran_rpjmd}}">
      <thead>
        <tr>
          <th width="3%" style="text-align: center; vertical-align:middle">No Urut</th>
          <th style="text-align: center; vertical-align:middle">Uraian Indikator</th>
          <th width="5%" style="text-align: center; vertical-align:middle">Target</th>
          <th width="5%" style="text-align: center; vertical-align:middle">Satuan</th>
          <th width="10%" style="text-align: center; vertical-align:middle">Status IKU</th>
          <th width="20%" style="text-align: center; vertical-align:middle">Unit Penanggungjawab</th>
          <th width="5%" style="text-align: center; vertical-align:middle">Aksi</th>
        </tr>
      </thead>
      <tbody>        
      </tbody>
  </table>
</script>

@include('kin.iku.iku_pemda.FrmIkuDokumen')
@include('kin.iku.iku_pemda.FrmIkuSasaranIndikator')

@endsection

@section('scripts')
<script type="text/javascript" language="javascript" class="init" src="{{ asset('/protected/resources/views/kin/iku/iku_pemda/js_iku_pemda.js')}}"></script>
@endsection
