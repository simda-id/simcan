<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <?php
                $this->title = 'Load Data Tahunan RPJMD';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = '/';
                $breadcrumb->begin();
                $breadcrumb->add(['url' => '/modul2','label' => 'RKPD']);
                $breadcrumb->add(['url' => '/ranwalrkpd', 'label' => 'Rancangan Awal RKPD']);
                $breadcrumb->add(['label' => $this->title]);
                $breadcrumb->end();
            ?>
      </div>
    </div>
    <div id="pesan" class="notify"></div>     
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-info">
          <div class="panel-heading">
            <h2 class="panel-title">Proses Load Data Ranwal RKPD dari RPJMD</h2>
          </div>

          <div class="panel-body">
            <form class="form-horizontal" role="form" autocomplete='off' action="{{url('/ranwalrkpd/prosesTransferData/')}}" method="" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                  <label for="tahun_rkpd" class="col-sm-2 control-label" style="text-align: right;">Tahun RKPD</label>
                  <div class="col-sm-2">
                    <input class="form-control text-center" type="text" id="tahun_rkpd" name="tahun_rkpd" value="{{Session::get('tahun')}}" disabled>
                  </div>
                  <div id="divReProses">
                    <a id="btnReProses" type="button" class="btn btn-labeled btn-primary"><span class="btn-label"><i class="fa fa-download fa-fw fa-lg"></i></span> Proses Load Data dari RPJMD</a>
                  </div>
                </div>
            </form>
            <div class='tabs-x tabs-above tab-bordered tabs-krajee'>
            <div class="table-responsive"> 
                    <table id="tblProgramRKPD" class="table table-striped compact table-bordered table-responsive"  cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                {{-- <th rowspan="2" width="10px" style="text-align: center; vertical-align:middle">Pilih</th> --}}
                                <th rowspan="2" width="20px" style="text-align: center; vertical-align:middle">No Urut</th>
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

<div id="cariReload" class="modal fade" role="dialog" tabindex="-1" data-focus-on="input:first" data-backdrop="static">
  <div class="modal-dialog modal-lg"  >
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" >Daftar Program RPJMD yang belum di Load dalam Ranwal RKPD</h3>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" role="form" autocomplete='off' action="" onsubmit="return false;">
        <div class="form-group">
        <div class="col-sm-12">
          <table id='tblReProses' class="table display compact table-striped table-bordered" width="100%">
              <thead>
                    <tr>
                      <th width="10px" style="text-align: center; vertical-align:middle">Pilih</th>
                      <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                      <th style="text-align: center; vertical-align:middle">Nama Program RPJMD</th>
                      <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                    </tr>
              </thead>
              <tbody>
              </tbody>
          </table>
        </div>
        </div>
      </form>
      </div>
      <div class="modal-footer">
        <div class="row">
            <div class="col-sm-2 text-left">
                <button id="btnProsesAll" type="button" class="btn btn-labeled btn-success"><span class="btn-label"><i class="fa fa-download fa-fw fa-lg"></i></span> Proses Load</button>
            </div>
            <div class="col-sm-10 text-right">
                <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                <span class="btn-label"><i class="fa fa-sign-out fa-fw fa-lg"></i></span>Tutup</button>
            </div>
        </div>
      </div> 
    </div>
  </div>
</div>

  <div id="HapusData" class="modal fade" role="dialog" tabindex="-1" data-focus-on="input:first" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Unload Data Ranwal RKPD</h4>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id_rkpd_ranwal_unload" name="id_rkpd_ranwal_unload">
            <div class="alert alert-danger">
              <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border"  style="color:red;" aria-hidden="true"></i>
                Yakin akan melakukan <strong><i>Unload</i></strong> terhadap program RKPD : <strong><span class="ur_id_rkpd_ranwal"></span></strong> ?
                <br>
                <br>
                <strong>Catatan : Unload data akan menghapus data ini beserta seluruh data yang terkait, termasuk data-data pada proses selanjutnya..!!!!</strong>
          </div>
        </div>
          <div class="modal-footer">
            <div class="row">
                    <div class="col-sm-2 text-left">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button id="btnDelData" type="button" class="btn btn-danger btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i class="fa fa-trash fa-fw fa-lg"></i></span>Lanjutkan Proses</button>
                        <div class="or"></div>
                        <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="fa fa-sign-out fa-fw fa-lg"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
          </div>
        </div>
      </div>
    </div>


<div id="ModalProgress" class="modal fade modal-static" role="dialog" data-backdrop="static" role="dialog" aria-hidden="true">
  <div class="modal-body text-center" style="overflow-y: hidden;">
    <h3><strong>Sedang proses...</strong></h3>
    <i class="fa fa-spinner fa-pulse fa-5x fa-fw text-info"></i>
  </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript" language="javascript" class="init">
$(document).ready(function() {

function createPesan(message, type) {
    var html = '<div id="pesanx" class="alert alert-' + type + ' alert-dismissable flyover flyover-bottom in">';    
    html += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
    html += message;
    html += '</div>';    
    $(html).hide().prependTo('#pesan').slideDown();

    setTimeout(function() {
            $('#pesanx').removeClass('in');
         }, 3500);

};

$('.page-alert .close').click(function(e) {
        e.preventDefault();
        $(this).closest('.page-alert').slideUp();
    });

var jml_datax;
function checkData(){
  $.ajax({
          type: "GET",
          url: './getJmlData',
          dataType: "json",
          success: function(data) {
            console.log(data);
            if(data[0].jml_data != 0){
              $('#divProses').hide();
              $('#divReProses').show();
            } else { 
              $('#divReProses').hide();
              $('#divProses').show();
            }
        }
  });}

// checkData();


var ReProses_Tbl
function loadReProses(){
  ReProses_Tbl = $('#tblReProses').DataTable({
        processing: true,
        serverSide: true,
        "autoWidth": false,
        "ajax": {"url": "./getRePostingData/"+{{Session::get('tahun')}}},
        "language": {
                "decimal": ",",
                "thousands": "."},
        'columnDefs': [
           { 'width': 10,
              'targets': 0,
              'checkboxes': {'selectRow': true } },
           { "targets": 1, "width": 10 }
          ],
        'select': { 'style': 'multi' },
        "columns": [
              { data: 'id_rkpd_rpjmd', sClass: "dt-center", searchable: false, orderable:false,},
              { data: 'no_urut',sClass: "dt-center"},
              { data: 'uraian_program_rpjmd'},
              { data: 'action', 'searchable': false, 'orderable':false,sClass: "dt-center" }
            ],
            "order": [[0, 'asc']],
            "bDestroy": true
      });
}

var progrkpd = $('#tblProgramRKPD').DataTable({
        processing: true,
        serverSide: true,
        "autoWidth": false,
        "ajax": {"url": "./getDataRekap/"+{{Session::get('tahun')}}},
        "language": {
                "decimal": ",",
                "thousands": "."},
        // 'columnDefs': [
        //    { 'width': 10,
        //       'targets': 0,
        //       'checkboxes': {'selectRow': true } },
        //    { "targets": 1, "width": 10 }
        //   ],
        // 'select': { 'style': 'multi' },
        "columns": [
              // { data: 'id_rkpd_ranwal', sClass: "dt-center", searchable: false, orderable:false,},
              { data: 'urut', sClass: "dt-center"},
              { data: 'uraian_program_rpjmd'},
              { data: 'pagu_rpjmd',
                render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right" },
              { data: 'pagu_ranwal',
                render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right" },
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

$(document).on('click', '.btnUnload', function() {
  var data = progrkpd.row( $(this).parents('tr') ).data();

  $('#id_rkpd_ranwal_unload').val(data.id_rkpd_ranwal);
  $('.ur_id_rkpd_ranwal').text(data.uraian_program_rpjmd);

  $('#HapusData').modal('show');
});


$(document).on('click', '#btnDelData', function() {    
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $('#ModalProgress').modal('show');

    $.ajax({
        type: 'POST',
        url: './unLoadProgramRkpd',
        data: {
            '_token': $('input[name=_token]').val(),
            'tahun' : $('#tahun_rkpd').val(),
            'id_ranwal' : $('#id_rkpd_ranwal_unload').val(),
        },
        success: function(data) {
            if(data.status_pesan===1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              } 
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

$(document).on('click', '#btnReProses', function() {
  loadReProses();
  $('#cariReload').modal('show');
});

$(document).on('click', '#btnReLoad', function() {
  var data = ReProses_Tbl.row( $(this).parents('tr') ).data();
  var tahun=$('#tahun_rkpd').val();
  var id_rkpd=data.id_rkpd_rpjmd;

  $.ajaxSetup({
      headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });

  $('#ModalProgress').modal('show');
  $('#cariReload').modal('hide');         
  $.ajax({
          type: 'POST',
          url: './ReprosesTransferData',
          data: {
              '_token': $('input[name=_token]').val(),
              'tahun_rkpd' : tahun,
              'id_rkpd_rpjmd' : id_rkpd,
          },
          success: function(data) {
            $.ajax({
            type: 'POST',
            url: './RetransferIndikator',
            data: {
                '_token': $('input[name=_token]').val(),
                'tahun_rkpd' :tahun,
                'id_rkpd_rpjmd' : id_rkpd,
            },
            success: function(data) {
              $.ajax({
              type: 'POST',
              url: './RetransferUrusan',
              data: {
                  '_token': $('input[name=_token]').val(),
                  'tahun_rkpd' :tahun,
                  'id_rkpd_rpjmd' : id_rkpd,
              },
              success: function(data) {
                $.ajax({
                type: 'POST',
                url: './RetransferPelaksana',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'tahun_rkpd' :tahun,
                    'id_rkpd_rpjmd' : id_rkpd,
                },
                success: function(data) {
                  createPesan("Data Berhasil di Load","success");
                  $('#tblProgramRKPD').DataTable().ajax.url("./getDataRekap/"+$('#tahun_rkpd').val());
                  $('#tblProgramRKPD').DataTable().ajax.reload();
                  $('#ModalProgress').modal('hide');
                },});
              },});
            },});
          },
          error: function(data){
            createPesan("Data Gagal di Load","danger");
            $('#tblProgramRKPD').DataTable().ajax.reload();
            $('#ModalProgress').modal('hide');
          }
  });
});

$(document).on('click', '#btnProsesAll', function() {
  var rows_selected = ReProses_Tbl.column(0).checkboxes.selected();
  var counts_selected = rows_selected.count(); 
  var rows_data = ReProses_Tbl.rows({ selected: true }).data(); 
  var counts_data = ReProses_Tbl.rows({ selected: true }).count();  
  var tahun=$('#tahun_rkpd').val();
  if (rows_selected.count() == 0) {
    createPesan("Data belum ada yang dipilih","danger");
    return;
  }; 

  $('#ModalProgress').modal('show');
  $('#cariReload').modal('hide');  

  $.each(rows_selected, function(index, rowId){
    var id_rkpd=rowId;
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });         
    $.ajax({
            type: 'POST',
            url: './ReprosesTransferData',
            data: {
                '_token': $('input[name=_token]').val(),
                'tahun_rkpd' :tahun,
                'id_rkpd_rpjmd' : id_rkpd,
            },
            success: function(data) {
              $.ajax({
              type: 'POST',
              url: './RetransferIndikator',
              data: {
                  '_token': $('input[name=_token]').val(),
                  'tahun_rkpd' :tahun,
                  'id_rkpd_rpjmd' : id_rkpd,
              },
              success: function(data) {
                $.ajax({
                type: 'POST',
                url: './RetransferUrusan',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'tahun_rkpd' :tahun,
                    'id_rkpd_rpjmd' : id_rkpd,
                },
                success: function(data) {
                  $.ajax({
                  type: 'POST',
                  url: './RetransferPelaksana',
                  data: {
                      '_token': $('input[name=_token]').val(),
                      'tahun_rkpd' :tahun,
                      'id_rkpd_rpjmd' : id_rkpd,
                  },
                  success: function(data) {
                    createPesan("Data Berhasil di Load","success");
                    $('#tblProgramRKPD').DataTable().ajax.url("./getDataRekap/"+$('#tahun_rkpd').val());
                    $('#tblProgramRKPD').DataTable().ajax.reload();
                    $('#ModalProgress').modal('hide');
                  },});
                },});
              },});
            },
            error: function(data){
              createPesan("Data Gagal di Load","danger");
              $('#tblProgramRKPD').DataTable().ajax.reload();
              $('#ModalProgress').modal('hide');
            }
    });
  });
  e.preventDefault();
});

});
</script>
@endsection
