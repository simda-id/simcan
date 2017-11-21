<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <?php
                $this->title = 'Posting Data Musrenbang RKPD-Kecamatan';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = '/';
                $breadcrumb->begin();
                $breadcrumb->add(['url' => '/modul2','label' => 'Musrenbang RKPD']);
                $breadcrumb->add(['url' => '/modul2','label' => 'Kecamatan']);
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
            <h2 class="panel-title">Posting Data Musrenbang RKPD-Kecamatan</h2>
          </div>

          <div class="panel-body">
            <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                  <label for="tahun_rkpd" class="col-sm-3 control-label" align='left'>Tahun Musrenbang :</label>
                  <div class="col-sm-2">
                    <input class="form-control text-center" type="text" id="tahun_rkpd" name="tahun_rkpd" value="{{Session::get('tahun')}}" disabled>
                  </div>
                  <div>
                    <a type="button" class="btn btn-labeled btn-sm btn-primary btnProses" data-dismiss="modal"><span class="btn-label"><i class="fa fa-check-square-o fa-lg fa-fw"></i></span> Posting Data Musrenbang RKPD-Kecamatan</a>
                  </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3 text-left" for="id_kecamatan">Nama Kecamatan :</label>
                        <div class="col-sm-5">
                            <select class="form-control" name="id_kecamatan" id="id_kecamatan"></select>
                        </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3 text-left" for="id_desa">Nama Desa/Kelurahan :</label>
                        <div class="col-sm-5">
                            <select class="form-control" name="id_desa" id="id_desa"></select>
                        </div>
                </div>
            </form>
            <div class='tabs-x tabs-above tab-bordered tabs-krajee'> 
                    <table id="tblProgramRKPD" class="table display table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th rowspan="2" width="30px" style="text-align: center; vertical-align:middle">No Urut</th>
                                <th rowspan="2" style="text-align: center; vertical-align:middle">Uraian Program RKPD</th>
                                <th rowspan="2" width="15%" style="text-align: center; vertical-align:middle">Pagu RPJMD</th>
                                <th rowspan="2" width="15%" style="text-align: center; vertical-align:middle">Pagu RKPD</th>
                                <th colspan="2" width="5%" style="text-align: center; vertical-align:middle">Indikator</th>
                                <th colspan="2" width="5%" style="text-align: center; vertical-align:middle">Pelaksana</th>
                                <th rowspan="2" width="50px" style="text-align: center; vertical-align:middle">Aksi</th>
                            </tr>
                            <tr>
                                <th width="50px" style="text-align: center; vertical-align:middle">Jml</th>
                                <th width="50px" style="text-align: center; vertical-align:middle">Reviu</th>
                                <th width="50px" style="text-align: center; vertical-align:middle">Jml</th>
                                <th width="50px" style="text-align: center; vertical-align:middle">Reviu</th>
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

<div id="ModalProgress" class="modal fade modal-static" role="dialog" data-backdrop="static" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
        {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> --}}
        <div class="text-center">
          <h3><strong>Sedang proses...</strong></h3>
          <i class="fa fa-spinner fa-pulse fa-5x fa-fw" style="color:grey;"></i>
        </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('scripts')
<script type="text/javascript" language="javascript" class="init">
$(document).ready(function() {

function createPesan(message, type) {
    var html = '<div class="alert alert-' + type + ' alert-dismissable page-alert col-md-12">';    
    html += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
    html += message;
    html += '</div>';    
    $(html).hide().prependTo('#pesan').slideDown();
};

$('.page-alert .close').click(function(e) {
        e.preventDefault();
        $(this).closest('.page-alert').slideUp();
    });

$('[data-toggle="popover"]').popover();

$('.number').number(true,0,',', '.');

$('.display').DataTable({
      dom : 'BfRtip',
      autoWidth : false,
      bDestroy: true
  });


});
</script>
@endsection
