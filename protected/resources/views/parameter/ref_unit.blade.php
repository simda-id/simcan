<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.parameterlayout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?php
                $this->title = 'Unit Perangkat Daerah';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = 'admin/parameter';
                $breadcrumb->begin();
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
            <h2 class="panel-title">Referensi Unit & Sub Unit Perangkat Daerah</h2>
          </div>

          <div class="panel-body">
            <div class='tabs-x tabs-above tab-bordered tabs-krajee'>
              <ul class="nav nav-tabs nav-justified" role="tablist">
                <li class="active"><a href="#urusan" aria-controls="urusan" role="tab" data-toggle="tab">Urusan-Bidang</a></li>
                <li><a href="#unit" aria-controls="unit" role="tab-kv" data-toggle="tab">Unit</a></li>
                <li><a href="#subunit" aria-controls="subunit" role="tab-kv" data-toggle="tab">Sub Unit</a></li>
                <li><a href="#dataunit" aria-controls="dataunit" role="tab-kv" data-toggle="tab">Rincian Data Unit</a></li>
              </ul>
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="urusan">
                  <div class="col-md-12">
                  <div class="table-responsive">
                  <table id="tblUrusan" class="table table-striped table-bordered table-responsive compact" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="5px" style="text-align: center; vertical-align:middle"></th>
                                <th width="10%" style="text-align: center; vertical-align:middle">No Urut</th>
                                <th style="text-align: center; vertical-align:middle">Uraian Urusan Pemerintahan</th>
                            </tr>
                        </thead>
                        <tbody>                                        
                        </tbody>
                    </table>  
                  </div>
                  </div>  
                </div>  
                <div role="tabpanel" class="tab-pane fade in" id="unit">
                  <br>
                  <div class="col-md-12">
                      <div class="add">
                      <button id="btnTambahUnit" type="button" class="add-ProgRenja btn btn-labeled btn-sm btn-success">
                      <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>Tambah Unit Perangkat Daerah</button>
                  </div>
                      <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
                      <div class="table-responsive">
                        <table class="table table-striped table-bordered table-responsive compact">
                          <tbody>
                            <tr>
                              <td width="20%" style="text-align: left; vertical-align:top;">Urusan</td>
                              <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd" id="ur_urusan" align='left'></label></td>
                            </tr>
                            <tr>
                              <td width="20%" style="text-align: left; vertical-align:top;">Bidang</td>
                              <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd" id="ur_bidang" align='left'></label></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      </form>                      
                      <div class="table-responsive">
                      <table id="tblUnit" class="table table-striped table-bordered table-responsive compact" width="100%" cellspacing="0">
                            <thead>
                              <tr>
                                  <th width='10%' style="text-align: center; vertical-align:middle">No Urut</th>
                                  <th width='15%' style="text-align: center; vertical-align:middle">Kode Unit</th>
                                  <th style="text-align: center; vertical-align:middle">Uraian Unit</th>
                                  <th width='10%' style="text-align: center; vertical-align:middle">Aksi</th>
                              </tr>
                          </thead>
                          <tbody>                                        
                          </tbody>
                      </table>
                    </div>
                  </div> 
              </div>
              <div role="tabpanel" class="tab-pane fade in" id="subunit">
                <br>
                  <div class="col-md-12">
                      <div class="add">
                      <button id="btnTambahSub" type="button" class="add-ProgRenja btn btn-labeled btn-sm btn-success">
                      <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>Tambah Sub Unit Perangkat Daerah</button>
                  </div>
                      <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
                      <div class="table-responsive">
                        <table class="table table-striped table-bordered table-responsive compact">
                          <tbody>
                            <tr>
                              <td width="20%" style="text-align: left; vertical-align:top;">Urusan</td>
                              <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd" id="ur_urusan_sub" align='left'></label></td>
                            </tr>
                            <tr>
                              <td width="20%" style="text-align: left; vertical-align:top;">Bidang</td>
                              <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd" id="ur_bidang_sub" align='left'></label></td>
                            </tr>
                            <tr>
                              <td width="20%" style="text-align: left; vertical-align:top;">Unit</td>
                              <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd" id="ur_unit" align='left'></label></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      </form>                      
                      <div class="table-responsive">
                      <table id="tblSubUnit" class="table table-striped table-bordered table-responsive compact" width="100%" cellspacing="0">
                            <thead>
                              <tr>
                                  <th width='10%' style="text-align: center; vertical-align:middle">No Urut</th>
                                  <th width='15%' style="text-align: center; vertical-align:middle">Kode Unit</th>
                                  <th style="text-align: center; vertical-align:middle">Uraian Sub Unit</th>
                                  <th width='10%' style="text-align: center; vertical-align:middle">Aksi</th>
                              </tr>
                          </thead>
                          <tbody>                                        
                          </tbody>
                      </table>
                    </div>
                  </div> 
              </div>
              <div role="tabpanel" class="tab-pane fade in" id="dataunit">
                <br>
                  <div class="col-md-12">
                      <div class="add">
                      <button id="btnTambahDataUnit" type="button" class="add-ProgRenja btn btn-labeled btn-sm btn-success">
                      <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>Tambah Sub Unit Perangkat Daerah</button>
                  </div>
                      <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
                      <div class="table-responsive">
                        <table class="table table-striped table-bordered table-responsive compact">
                          <tbody>
                            <tr>
                              <td width="20%" style="text-align: left; vertical-align:top;">Urusan</td>
                              <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd" id="ur_urusan_rinc" align='left'></label></td>
                            </tr>
                            <tr>
                              <td width="20%" style="text-align: left; vertical-align:top;">Bidang</td>
                              <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd" id="ur_bidang_rinc" align='left'></label></td>
                            </tr>
                            <tr>
                              <td width="20%" style="text-align: left; vertical-align:top;">Unit</td>
                              <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd" id="ur_unit_rinc" align='left'></label></td>
                            </tr>
                            <tr>
                              <td width="20%" style="text-align: left; vertical-align:top;">Sub Unit</td>
                              <td style="text-align: left; vertical-align:top;"><label class="backProgRkpd" id="ur_sub_rinc" align='left'></label></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      </form>
                      <div class="table-responsive">
                      <table id="tblDataUnit" class="table table-striped table-bordered table-responsive compact" width="100%" cellspacing="0">
                            <thead>
                              <tr>
                                  <th width='10%' style="text-align: center; vertical-align:middle">No Urut</th>
                                  <th width='10%' style="text-align: center; vertical-align:middle">Tahun</th>
                                  <th width='30%' style="text-align: center; vertical-align:middle">Nama Pimpinan Unit</th>
                                  <th style="text-align: center; vertical-align:middle">Alamat Unit</th>
                                  <th width='10%' style="text-align: center; vertical-align:middle">Aksi</th>
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

<script id="details-bidang" type="text/x-handlebars-template">
        <table class="table table-striped table-bordered table-responsive compact details-table" id="bidang-@{{kd_urusan}}">
            <thead>
              <tr>
                  <th width="10%" style="text-align: center; vertical-align:middle;">Kd Bidang</th>
                  <th style="text-align: center; vertical-align:middle;">Nama Bidang</th>
              </tr>
            </thead>
            <tbody></tbody>
        </table>
</script>


<!--Modal Tambah -->
<div id="ModalUnit" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg"  >
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form name="frmModalUnit" class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id_bidang" id="id_bidang">
            <input type="hidden" name="id_unit" id="id_unit">
            <div class="form-group">
              <label for="kd_unit" class="col-sm-3" align='left'>Kode Unit</label>
              <div class="col-sm-2">
                <input type="text" class="form-control number" id="kd_unit" name="kd_unit" required="required" >
              </div>
            </div>            
            <div class="form-group">
              <label for="nm_unit" class="col-sm-3" align='left'>Nama Unit</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="nm_unit" name="nm_unit" required="required">
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
                        <button type="button" class="btn btn-sm btn-success btnUnit btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i class="glyphicon glyphicon-save"></i></span>Simpan</button>
                        <div class="or"></div>
                        <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
    </div>
  </div>
</div>

<!--Modal Hapus -->
<div id="HapusUnit" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <input type="hidden" id="id_unit_hapus" name="id_unit_hapus">
          <div class="alert alert-danger deleteContent">
              <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border"  style="color:red;" aria-hidden="true"></i>
                <br>
                Yakin akan menghapus Unit Perangkat Daerah : <strong><span id="nm_unit_hapus"></span></strong> ini ?
                <br>
                <br>
          </div>
        </div>
          <div class="modal-footer">
            <div class="ui-group-buttons">
              <button type="button" class="btn btn-sm btn-danger btn-labeled btnDelUnit" data-dismiss="modal" ><span class="btn-label"><i id="footer_action_button" class="glyphicon glyphicon-trash"></i></span> Hapus</button>
              <div class="or"></div>
              <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true"><span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span> Tutup</button>
            </div>
          </div>
      </div>
    </div>
  </div>

<!--Modal Tambah -->
<div id="ModalSubUnit" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg"  >
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form name="frmModalSubUnit" class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id_sub_unit" id="id_sub_unit">
            <input type="hidden" name="id_unit_sub" id="id_unit_sub">
            <div class="form-group">
              <label for="kd_sub" class="col-sm-3" align='left'>Kode Sub Unit</label>
              <div class="col-sm-2">
                <input type="text" class="form-control number" id="kd_sub" name="kd_sub" required="required" >
              </div>
            </div>            
            <div class="form-group">
              <label for="nm_sub" class="col-sm-3" align='left'>Nama Sub Unit</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="nm_sub" name="nm_sub" required="required">
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
                        <button type="button" class="btn btn-sm btn-success btnSubUnit btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i class="glyphicon glyphicon-save"></i></span>Simpan</button>
                        <div class="or"></div>
                        <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
    </div>
  </div>
</div>

<!--Modal Hapus -->
<div id="HapusSubUnit" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <input type="hidden" id="id_sub_unit_hapus" name="id_sub_unit_hapus">
          <div class="alert alert-danger deleteContent">
              <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border"  style="color:red;" aria-hidden="true"></i>
                <br>
                Yakin akan menghapus Sub Unit Perangkat Daerah : <strong><span id="nm_sub_unit_hapus"></span></strong> ini ?
                <br>
                <br>
          </div>
        </div>
          <div class="modal-footer">
            <div class="ui-group-buttons">
              <button type="button" class="btn btn-sm btn-danger btn-labeled btnDelSubUnit" data-dismiss="modal" ><span class="btn-label"><i id="footer_action_button" class="glyphicon glyphicon-trash"></i></span> Hapus</button>
              <div class="or"></div>
              <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true"><span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span> Tutup</button>
            </div>
          </div>
      </div>
    </div>
  </div>

<!--Modal Tambah -->
<div id="ModalDataUnit" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg"  >
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form name="frmModalDataUnit" class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id_sub_unit_rinc" id="id_sub_unit_rinc">
            <input type="hidden" name="id_rincian_unit" id="id_rincian_unit">
            <div class="form-group">
              <label for="tahun" class="col-sm-3" align='left'>Tahun</label>
              <div class="col-sm-2">
                <input type="text" class="form-control number" id="tahun" name="tahun" required="required" >
              </div>
            </div>            
            <div class="form-group">
              <label for="nama_jabatan_pimpinan_skpd" class="col-sm-3" align='left'>Jabatan Pimpinan OPD</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="nama_jabatan_pimpinan_skpd" name="nama_jabatan_pimpinan_skpd">
              </div>
            </div>
            <div class="form-group">
              <label for="nip_pimpinan_skpd" class="col-sm-3" align='left'>NIP Pimpinan OPD</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" id="nipDisplay" name="nipDisplay" maxlength="20">
                <input type="hidden" class="form-control" id="nip_pimpinan_skpd" name="nip_pimpinan_skpd">
              </div>
            </div>
            <div class="form-group">
              <label for="nama_pimpinan_skpd" class="col-sm-3" align='left'>Nama Pimpinan OPD</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="nama_pimpinan_skpd" name="nama_pimpinan_skpd">
              </div>
            </div>
            <div class="form-group">
              <label for="alamat_sub_unit" class="col-sm-3" align='left'>Alamat Kantor</label>
              <div class="col-sm-8">
                <textarea type="name" class="form-control" id="alamat_sub_unit" name="alamat_sub_unit" rows="3"></textarea>
              </div>
            </div> 
            <div class="form-group">
              <label for="kota_sub_unit" class="col-sm-3" align='left'>Kota Kedudukan</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="kota_sub_unit" name="kota_sub_unit">
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
                        <button type="button" class="btn btn-sm btn-success btnDataUnit btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i class="glyphicon glyphicon-save"></i></span>Simpan</button>
                        <div class="or"></div>
                        <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
    </div>
  </div>
</div>

<!--Modal Hapus -->
<div id="HapusDataUnit" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <input type="hidden" id="id_rincian_unit_hapus" name="id_rincian_unit_hapus">
          <div class="alert alert-danger deleteContent">
              <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border"  style="color:red;" aria-hidden="true"></i>
                <br>
                Yakin akan menghapus Rincian Unit untuk Tahun : <strong><span id="tahun_hapus"></span></strong> ini ?
                <br>
                <br>
          </div>
        </div>
          <div class="modal-footer">
            <div class="ui-group-buttons">
              <button type="button" class="btn btn-sm btn-danger btn-labeled btnDelDataUnit" data-dismiss="modal" ><span class="btn-label"><i id="footer_action_button" class="glyphicon glyphicon-trash"></i></span> Hapus</button>
              <div class="or"></div>
              <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true"><span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span> Tutup</button>
            </div>
          </div>
      </div>
    </div>
  </div>



<div id="ModalProgress" class="modal fade modal-static" role="dialog" data-backdrop="static" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
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
<script  type="text/javascript" language="javascript" class="init">

$(document).ready(function() {

var template = Handlebars.compile($("#details-bidang").html());

$('[data-toggle="popover"]').popover();

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

document.getElementById("btnTambahUnit").style.visibility='hidden';
document.getElementById("btnTambahSub").style.visibility='hidden';
document.getElementById("btnTambahDataUnit").style.visibility='hidden';

$("input[name='nipDisplay']").on("keyup", function(){
    $("input[name='nip_pimpinan_skpd']").val(nilaiNip(this.value));
    this.value = buatNip($("input[name='nip_pimpinan_skpd']").val());
})

function buatNip(string){
  console.log(string)
  return string.replace(/(\d{8})(\d{6})(\d{1})(\d{3})/,"$1 $2 $3 $4");
}

function nilaiNip(string){
  console.log(string)
  return string.replace(/\D/g,'').substring(0, 20);
}

var angkaNip = document.getElementById('nipDisplay');
angkaNip.onkeydown = function(e) {
      if(!((e.keyCode > 95 && e.keyCode < 106)
        || (e.keyCode > 47 && e.keyCode < 58) 
        || (e.keyCode > 7 && e.keyCode < 10) 
        || (e.keyCode = 13) 
        )) {
          return false;
      }
  }

$('.number').number(true,0,'', '');

$('.display').DataTable({
      dom : 'BfRtip',
      autoWidth : false,
      bDestroy: true
  });

var id_bidang_temp, id_unit_temp, id_sub_unit_temp;
var urusan_tbl, bidang_tbl, unit_tbl, subunit_tbl, dataunit_tbl;

urusan_tbl = $('#tblUrusan').DataTable({
                  processing: true,
                  serverSide: true,
                  dom : 'BFRtIP',
                  "autoWidth": false,
                  "ajax": {"url": "./unit/getListUrusan"},
                  "columns": [
                        {
                            "className":      'details-control',
                            "orderable":      false,
                            "searchable":      false,
                            "data":           null,
                            "defaultContent": '',
                            "width" : "5px"
                        },
                        { data: 'no_urut', sClass: "dt-center",width:"10%"},
                        { data: 'nm_urusan'},
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
    });

function initTableBidang(tableId, data) {
    bidang_tbl=$('#' + tableId).DataTable({
            processing: true,
            serverSide: true,
            ajax: data.details_url,
            dom : 'BFRtIp',
            autoWidth: false,
            columns: [
                { data: 'kd_bidang', name: 'kd_bidang', sClass: "dt-center", width:'10%' },
                { data: 'nm_bidang', name: 'nm_bidang' }
            ],
            "order": [[0, 'asc']],
            "bDestroy": true
        })

    $('#' + tableId+'  tbody').on( 'click', 'tr', function () {

        var data = bidang_tbl.row(this).data();

        id_bidang_temp = data.id_bidang;
        document.getElementById("btnTambahUnit").style.visibility='visible';

        $('#ur_urusan').text(data.nm_urusan);
        $('#ur_bidang').text(data.nm_bidang);

        $('.nav-tabs a[href="#unit"]').tab('show');
        loadTblUnit(id_bidang_temp);

    });

}

$('#tblUrusan tbody').on('click', 'td.details-control', function () {

        var tr = $(this).closest('tr');
        var row = urusan_tbl.row( tr );
        var tableId = 'bidang-' + row.data().kd_urusan;

        if (row.child.isShown()) {
            row.child.hide();
            tr.removeClass('shown');
        } else {
            row.child(template(row.data())).show();
            initTableBidang(tableId, row.data());
            tr.addClass('shown');
            tr.next().find('td').addClass('no-padding bg-gray');
        }    
  }); 

function loadTblUnit(bidang){
unit_tbl=$('#tblUnit').DataTable({
                  processing: true,
                  serverSide: true,
                  dom : 'BfRtip',                  
                  autoWidth : false,
                  "ajax": {"url": "./unit/getListUnit/"+bidang},
                  "language": {
                      "decimal": ",",
                      "thousands": "."},
                  "columns": [
                        { data: 'no_urut','searchable': false, 'orderable':false, sClass: "dt-center", width :"10%"},
                        { data: 'kd_unit', sClass: "dt-center", width :"15%"},
                        { data: 'nm_unit', sClass: "dt-left"},
                        { data: 'action', 'searchable': false, width :"10%", 'orderable':false, sClass: "dt-center" }
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        });
}

function LoadListSubUnit(id_unit){
subunit_tbl=$('#tblSubUnit').DataTable({
                  processing: true,
                  serverSide: true,
                  dom : 'BfRtip',                  
                  autoWidth : false,
                  "ajax": {"url": "./unit/getListSubUnit/"+id_unit},
                  "language": {
                      "decimal": ",",
                      "thousands": "."},
                  "columns": [
                        { data: 'no_urut','searchable': false, 'orderable':false, sClass: "dt-center", width :"10%"},
                        { data: 'kd_sub', sClass: "dt-center", width :"15%"},
                        { data: 'nm_sub', sClass: "dt-left"},
                        { data: 'action', 'searchable': false, width :"10%", 'orderable':false, sClass: "dt-center" }
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        });
}

function LoadListDataUnit(id_unit){
dataunit_tbl=$('#tblDataUnit').DataTable({
                  processing: true,
                  serverSide: true,
                  dom : 'BfRtip',                  
                  autoWidth : false,
                  "ajax": {"url": "./unit/getListDataSubUnit/"+id_unit},
                  "language": {
                      "decimal": ",",
                      "thousands": "."},
                  "columns": [
                        { data: 'no_urut','searchable': false, 'orderable':false, sClass: "dt-center", width :"10%"},
                        { data: 'tahun','searchable': false, 'orderable':false, sClass: "dt-center", width :"10%"},
                        { data: 'nama_pimpinan_skpd', sClass: "dt-center", width :"30%"},
                        { data: 'alamat_sub_unit', sClass: "dt-left"},
                        { data: 'action', 'searchable': false, width :"10%", 'orderable':false, sClass: "dt-center" }
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        });
}

$('#tblUnit tbody').on( 'dblclick', 'tr', function () {

  var data = unit_tbl.row(this).data();

  id_unit_temp = data.id_unit;

  document.getElementById("btnTambahSub").style.visibility='visible';
  $('#ur_urusan_sub').text(data.nm_urusan);
  $('#ur_bidang_sub').text(data.nm_bidang);
  $('#ur_unit').text(data.nm_unit);

  $('.nav-tabs a[href="#subunit"]').tab('show');
  LoadListSubUnit(id_unit_temp); 

  });

$('#tblSubUnit tbody').on( 'dblclick', 'tr', function () {

  var data = subunit_tbl.row(this).data();

  id_sub_unit_temp = data.id_sub_unit;

  document.getElementById("btnTambahDataUnit").style.visibility='visible';

  $('#ur_urusan_rinc').text($('#ur_urusan_sub').text());
  $('#ur_bidang_rinc').text($('#ur_bidang_sub').text());
  $('#ur_unit_rinc').text($('#ur_unit').text());
  $('#ur_sub_rinc').text(data.nm_sub);

  $('.nav-tabs a[href="#dataunit"]').tab('show');
  LoadListDataUnit(id_sub_unit_temp); 

  });

$(document).on('click', '#btnTambahUnit', function() {
  $('.btnUnit').removeClass('editUnit');
  $('.btnUnit').addClass('addUnit');
  $('.modal-title').text('Tambah Data Unit Perangkat Daerah');
  $('.form-horizontal').show();
  $('#id_bidang').val(id_bidang_temp);
  $('#id_unit').val(null);
  $('#kd_unit').val(0);
  $('#nm_unit').val(null);

  $('#ModalUnit').modal('show');
});

$('.modal-footer').on('click', '.addUnit', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './unit/addUnit',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_bidang' : $('#id_bidang').val(),
            'kd_unit' : $('#kd_unit').val(),
            'nm_unit' : $('#nm_unit').val(),
        },
        success: function(data) {
              $('#tblUnit').DataTable().ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
        },
  });
});

//edit function
$(document).on('click', '#btnEditUnit', function() {

var data = unit_tbl.row( $(this).parents('tr') ).data();

  $('.btnUnit').removeClass('addUnit');
  $('.btnUnit').addClass('editUnit');
  $('.modal-title').text('Edit Data Unit Perangkat Daerah');
  $('.form-horizontal').show();
  $('#id_bidang').val(data.id_bidang);
  $('#id_unit').val(data.id_unit);
  $('#kd_unit').val(data.kd_unit);
  $('#nm_unit').val(data.nm_unit);
  
  $('#ModalUnit').modal('show');
});


$('.modal-footer').on('click', '.editUnit', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './unit/editUnit',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_unit' : $('#id_unit').val(),
            'id_bidang' : $('#id_bidang').val(),
            'kd_unit' : $('#kd_unit').val(),
            'nm_unit' : $('#nm_unit').val(),
        },
        success: function(data) {
            $('#tblUnit').DataTable().ajax.reload();
            if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
        }
    });
});

$(document).on('click', '#btnHapusUnit', function() {
var data = unit_tbl.row( $(this).parents('tr') ).data();

  $('.btnDelUnit').addClass('delUnit');
  $('.modal-title').text('Hapus Data Unit Perangkat Daerah');
  $('.form-horizontal').hide();
  $('#id_unit_hapus').val(data.id_unit);
  $('#nm_unit_hapus').html(data.nm_unit);
  $('#HapusUnit').modal('show');
  
});

$('.modal-footer').on('click', '.delUnit', function() {
  $.ajaxSetup({
     headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });

  $.ajax({
    type: 'post',
    url: './unit/hapusUnit',
    data: {
      '_token': $('input[name=_token]').val(),
      'id_unit': $('#id_unit_hapus').val(),
    },
    success: function(data) {
      $('.item' + $('.id_unit_hapus').text()).remove();
      $('#tblUnit').DataTable().ajax.reload();
      createPesan(data.pesan,"success");
    }
  });
});

$(document).on('click', '#btnTambahSub', function() {
  $('.btnSubUnit').removeClass('editSub');
  $('.btnSubUnit').addClass('addSub');
  $('.modal-title').text('Tambah Data Sub Unit Perangkat Daerah');
  $('.form-horizontal').show();
  $('#id_sub_unit').val(null);
  $('#id_unit_sub').val(id_unit_temp);
  $('#kd_sub').val(0);
  $('#nm_sub').val(null);
  
  $('#ModalSubUnit').modal('show');
});

$('.modal-footer').on('click', '.addSub', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './unit/addSubUnit',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_unit' : $('#id_unit_sub').val(),
            'kd_sub' : $('#kd_sub').val(),
            'nm_sub' : $('#nm_sub').val(),
        },
        success: function(data) {
              $('#tblSubUnit').DataTable().ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
        },
  });
});

//edit function
$(document).on('click', '#btnEditSubUnit', function() {
var data = subunit_tbl.row( $(this).parents('tr') ).data();

  $('.btnSubUnit').removeClass('addSub');
  $('.btnSubUnit').addClass('editSub');
  $('.modal-title').text('Edit Data Sub Unit Perangkat Daerah');
  $('.form-horizontal').show();
  $('#id_sub_unit').val(data.id_sub_unit);
  $('#id_unit_sub').val(data.id_unit);
  $('#kd_sub').val(data.kd_sub);
  $('#nm_sub').val(data.nm_sub);
  
  $('#ModalSubUnit').modal('show');
});


$('.modal-footer').on('click', '.editSub', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './unit/editSubUnit',
        data: {
            '_token': $('input[name=_token]').val(),            
            'id_sub_unit' : $('#id_sub_unit').val(),
            'id_unit' : $('#id_unit_sub').val(),
            'kd_sub' : $('#kd_sub').val(),
            'nm_sub' : $('#nm_sub').val(),

        },
        success: function(data) {
            $('#tblSubUnit').DataTable().ajax.reload();
            if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
        }
    });
});

// //delete function
$(document).on('click', '#btnHapusSubUnit', function() {
var data = subunit_tbl.row( $(this).parents('tr') ).data();

  $('.btnDelSubUnit').addClass('delete');
  $('.modal-title').text('Hapus Data Sub Unit Perangkat Daerah');
  $('.form-horizontal').hide();
  $('#id_sub_unit_hapus').val(data.id_sub_unit);
  $('#nm_sub_unit_hapus').html(data.nm_sub);
  $('#HapusSubUnit').modal('show');
  
});

$('.modal-footer').on('click', '.delete', function() {
  $.ajaxSetup({
     headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });

  $.ajax({
    type: 'post',
    url: './unit/hapusSubUnit',
    data: {
      '_token': $('input[name=_token]').val(),
      'id_sub_unit': $('#id_sub_unit_hapus').val(),
    },
    success: function(data) {
      $('.item' + $('.id_sub_unit_hapus').text()).remove();
      $('#tblSubUnit').DataTable().ajax.reload();
      createPesan(data.pesan,"success");
    }
  });
});

$(document).on('click', '#btnTambahDataUnit', function() {
  $('.btnDataUnit').removeClass('editData');
  $('.btnDataUnit').addClass('addData');
  $('.modal-title').text('Tambah Data Rincian Sub Unit Perangkat Daerah');
  $('.form-horizontal').show();
  $('#id_sub_unit_rinc').val(id_sub_unit_temp);
  $('#id_rincian_unit').val(null);
  $('#tahun').val({{Session::get('tahun')}});
  $('#nama_jabatan_pimpinan_skpd').val(null);
  $('#nip_pimpinan_skpd').val(null);
  $('#nipDisplay').val(null);
  $('#nama_pimpinan_skpd').val(null);
  $('#alamat_sub_unit').val(null);
  $('#kota_sub_unit').val(null);
  
  $('#ModalDataUnit').modal('show');
});

$('.modal-footer').on('click', '.addData', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './unit/addDataSubUnit',
        data: {
            '_token': $('input[name=_token]').val(),                        
            'id_sub_unit' : $('#id_sub_unit_rinc').val(),
            'tahun' : $('#tahun').val(),
            'nama_jabatan_pimpinan_skpd' : $('#nama_jabatan_pimpinan_skpd').val(),
            'nip_pimpinan_skpd' : $('#nip_pimpinan_skpd').val(),
            'nama_pimpinan_skpd' : $('#nama_pimpinan_skpd').val(),
            'alamat_sub_unit' : $('#alamat_sub_unit').val(),
            'kota_sub_unit' : $('#kota_sub_unit').val(),
        },
        success: function(data) {
              $('#tblDataUnit').DataTable().ajax.reload();
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
        },
  });
});

//edit function
$(document).on('click', '#btnEditDataUnit', function() {
var data = dataunit_tbl.row( $(this).parents('tr') ).data();

  $('.btnDataUnit').removeClass('addData');
  $('.btnDataUnit').addClass('editData');
  $('.modal-title').text('Edit Data Rincian Sub Unit Perangkat Daerah');
  $('.form-horizontal').show();
  $('#id_sub_unit_rinc').val(data.id_sub_unit);
  $('#id_rincian_unit').val(data.id_rincian_unit);
  $('#tahun').val(data.tahun);
  $('#nama_jabatan_pimpinan_skpd').val(data.nama_jabatan_pimpinan_skpd);
  $('#nip_pimpinan_skpd').val(data.nip_pimpinan_skpd);
  $('#nama_pimpinan_skpd').val(data.nama_pimpinan_skpd);
  $('#nipDisplay').val(buatNip(data.nip_pimpinan_skpd));
  $('#alamat_sub_unit').val(data.alamat_sub_unit);
  $('#kota_sub_unit').val(data.kota_sub_unit);
  
  $('#ModalDataUnit').modal('show');
});


$('.modal-footer').on('click', '.editData', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './unit/editDataSubUnit',
        data: {
            '_token': $('input[name=_token]').val(),            
            'id_sub_unit' : $('#id_sub_unit_rinc').val(),
            'id_rincian_unit' : $('#id_rincian_unit').val(),
            'tahun' : $('#tahun').val(),
            'nama_jabatan_pimpinan_skpd' : $('#nama_jabatan_pimpinan_skpd').val(),
            'nip_pimpinan_skpd' : $('#nip_pimpinan_skpd').val(),
            'nama_pimpinan_skpd' : $('#nama_pimpinan_skpd').val(),
            'alamat_sub_unit' : $('#alamat_sub_unit').val(),
            'kota_sub_unit' : $('#kota_sub_unit').val(),

        },
        success: function(data) {
            $('#tblDataUnit').DataTable().ajax.reload();
            if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
        }
    });
});

// //delete function
$(document).on('click', '#btnHapusDataUnit', function() {
var data = dataunit_tbl.row( $(this).parents('tr') ).data();

  $('.btnDelDataUnit').addClass('delData');
  $('.modal-title').text('Hapus Data Rincian Sub Unit Perangkat Daerah');
  $('.form-horizontal').hide();
  $('#id_rincian_unit_hapus').val(data.id_rincian_unit);
  $('#tahun_hapus').html(data.tahun);
  $('#HapusDataUnit').modal('show');
  
});

$('.modal-footer').on('click', '.delData', function() {
  $.ajaxSetup({
     headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });

  $.ajax({
    type: 'post',
    url: './unit/hapusDataSubUnit',
    data: {
      '_token': $('input[name=_token]').val(),
      'id_rincian_unit': $('#id_rincian_unit_hapus').val(),
    },
    success: function(data) {
      $('.item' + $('.id_rincian_unit_hapus').text()).remove();
      $('#tblDataUnit').DataTable().ajax.reload();
      createPesan(data.pesan,"success");
    }
  });
});

});
</script>
@endsection
