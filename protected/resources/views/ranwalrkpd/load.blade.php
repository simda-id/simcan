<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php
                $this->title = 'Load dan Proses Data Ranwal RKPD';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = 'modul2';
                $breadcrumb->begin();
                $breadcrumb->add(['label' => 'RKPD']);
                $breadcrumb->add(['label' => $this->title]);
                $breadcrumb->end();
            ?> 
    </div>
    </div>
    <div id="pesan"></div>
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h2 class="panel-title">Proses Load Data Ranwal RKPD dari RPJMD</h2>
          </div>

          <div class="panel-body">
            <form class="form-horizontal" role="form" autocomplete='off' action="{{url('/ranwalrkpd/prosesTransferData/')}}" method="" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                  <label for="tahun_rkpd" class="col-sm-2 control-label" align='left'>Tahun RKPD :</label>
                  <div class="col-sm-2">
        					 	{{-- <select class="form-control" name="tahun_rkpd" id="tahun_rkpd">
        					 		@foreach($reftahun as $val)
                        <option value={{ $val->tahun }}>{{ $val->tahun }}</option>
        					 		@endforeach
        					 	</select> --}}
                    <input class="form-control text-center" type="text" id="tahun_rkpd" name="tahun_rkpd" value="{{Session::get('tahun')}}" disabled>
                  </div>
                  <div>
                    <a type="button" class="btn btn-labeled btn-sm btn-primary btnProses" data-dismiss="modal"><span class="btn-label"><i class="glyphicon glyphicon-download-alt"></i></span> Proses Load Data dari RPJMD</a>
                  </div>
                </div>
            </form>
            <div class='tabs-x tabs-above tab-bordered tabs-krajee'>                    
                    <div id="judul" class="alert alert-info col-md-12" ><b>Daftar Program RKPD untuk tahun {{Session::get('tahun')}} </b></div>
                    <table id="tblProgramRKPD" class="table table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
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

var progrkpd = $('#tblProgramRKPD').DataTable({
        processing: true,
        serverSide: true,
        "autoWidth": false,
        "ajax": {"url": "./getDataRekap/"+{{Session::get('tahun')}}},
        "language": {
                "decimal": ",",
                "thousands": "."},
        "columns": [
              { data: 'urut'},
              { data: 'uraian_program_rpjmd'},
              { data: 'pagu_rpjmd',
                render: $.fn.dataTable.render.number( '.', ',', 0, '' ),
                sClass: "dt-right" },
              { data: 'pagu_ranwal',
                render: $.fn.dataTable.render.number( '.', ',', 0, '' ),
                sClass: "dt-right" },
              { data: 'jml_indikator',sClass: "dt-center",width:"5px",
                            render: $.fn.dataTable.render.number( '.', ',', 0, '' )},
              { data: 'indikator_0',sClass: "dt-center",width:"5px",
                            render: $.fn.dataTable.render.number( '.', ',', 0, '' )},
              { data: 'jml_unit',sClass: "dt-center",width:"5px",
                            render: $.fn.dataTable.render.number( '.', ',', 0, '' )},
              { data: 'unit_0',sClass: "dt-center",width:"5px",
                            render: $.fn.dataTable.render.number( '.', ',', 0, '' )},
              { data: 'action', 'searchable': false, 'orderable':false }
            ],
            "order": [[0, 'asc']],
            "bDestroy": true
      });

$(document).on('click', '.btnProses', function() {

$.ajaxSetup({
    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});

$('#ModalProgress').modal('show');
$.ajax({
        type: 'POST',
        url: './prosesTransferData',
        data: {
            '_token': $('input[name=_token]').val(),
            'tahun_rkpd' : $('#tahun_rkpd').val(),
        },
        success: function(data) {
          createPesan("Data Berhasil di Load","success");
          $('#tblProgramRKPD').DataTable().ajax.url("./getDataRekap/"+$('#tahun_rkpd').val());
          $('#tblProgramRKPD').DataTable().ajax.reload();
          $('#ModalProgress').modal('hide');
        },
        error: function(data){
          createPesan("Data Gagal di Load","danger");
          $('#tblProgramRKPD').DataTable().ajax.reload();
          $('#ModalProgress').modal('hide');
        }
});
});

$(document).on('click', '.btnUnload', function() {
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $('#ModalProgress').modal('show');

    $.ajax({
        type: 'POST',
        url: './unLoadProgramRkpd',
        data: {
            '_token': $('input[name=_token]').val(),
            'tahun' : $(this).data('tahun_rkpd'),
            'id_ranwal' : $(this).data('id_rkpd_ranwal'),
        },
        success: function(data) {
            createPesan(data.pesan,"success");
            $('#tblProgramRKPD').DataTable().ajax.reload();
            $('#ModalProgress').modal('hide');
        },
        error: function(data){
            createPesan(data.pesan,"danger");
            $('#tblProgramRKPD').DataTable().ajax.reload();
            $('#ModalProgress').modal('hide');
        }
    });

});


});
</script>
@endsection
