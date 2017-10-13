<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.parameterlayout')
{{-- <meta name="_token" content="{!! csrf_token() !!}" /> --}}


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
                $this->title = ' Identitas Pemerintah Daerah ';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = 'admin/parameter';
                $breadcrumb->begin();
                $breadcrumb->add(['label' => $this->title]);
                $breadcrumb->end();
            ?>          
        </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-info">
          <div class="panel-heading">
            <h2 class="panel-title"> Identitas Pemerintah Daerah </h2>
          </div>

          <div class="panel-body">
            <form action="{{url('/pemda/edit')}}" method="post" role="form" autocomplete='off' enctype="multipart/form-data" onsubmit="return false;">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="id_pemda" id="id_pemda">
              {{-- <div class="col-sm-12"> --}}
              <table class="table table-bordered">
                <tr>
                  <td colspan="2" rowspan="4">
                    <img src="{{ asset('vendor/default.png') }}" class="img-thumbnail" alt="Cinque Terre" width="300" height="230">
                  </td>
                  <td colspan="2">
                        <label for="kode_pemda" class="" align='left' placeholder="Kode Pemda Sesuai dengan Permendagri">Kode Pemerintah Daerah </label></td>
                  <td colspan="2">
                          <input type="text" class="form-control" id="kode_pemda" name="kode_pemda" readonly></td>
                </tr>
                <tr>
                  <td colspan="2">
                        <label for="nama_pemda" class="" align='left'>Nama Pemerintah Daerah </label></td>
                  <td colspan="2">
                          <input type="text" class="form-control" id="nama_pemda" name="nama_pemda" placeholder="Nama Resmi Pemda misal : Pemerintah Kota XXX" readonly></td>
                </tr>
                <tr>
                  <td colspan="2">
                        <label for="ibukota" class="" align='left'>Ibukota Pemerintah Daerah </label></td>
                  <td colspan="2">
                          <input type="text" class="form-control" id="ibukota" name="ibukota" placeholder="Ibukota Pemerintah Daerah"></td>
                </tr>
                <tr>
                  <td colspan="2">
                        <label for="jabatan_kada" class="" align='left'>Jabatan Kepala Daerah </label></td>
                  <td colspan="2">
                          <input type="text" class="form-control" id="jabatan_kada" name="jabatan_kada" placeholder="Bupati/Walikota"></td>
                </tr>
                <tr>
                  <td colspan="2" rowspan="2">
                      <div class="form-group">
                        <label for="logo_pemda" class="control-label" align='left'>File Logo Daerah :
                          <input type="file" id="logo_pemda" name="logo_pemda" class="opacity:0;">
                        </label>
                      </div>
                  </td>
                  <td colspan="2">
                    <label for="nama_kada" class="" align='left'>Nama Kepala Daerah </label></td>
                  <td colspan="2">
                    <input type="text" class="form-control" id="nama_kada" name="nama_kada" placeholder="Nama Lengkap Bupati/Walikota"></td>
                </tr>
                <tr>
                  <td colspan="2">
                      <div class="form-group">
                        <label for="unit_perencanaan" class="" align='left'>Unit Perencanaan :</label>
                          <div class="input-group">
                            <input type="hidden" class="" id="id_unit_perencanaan" name="id_unit_perencanaan" >
                            <input type="text" class="form-control" id="nm_unit_perencanaan" name="nm_unit_perencanaan" readonly>
                            <span class="input-group-btn">
                              <button class="btn btn-primary" data-toggle="modal" href="#" id="btnCariPerencana" name="btnCariPerencana"><i class="fa fa-search fa-fw"></i></button>
                            </span>
                          </div>
                      </div>
                  </td>
                  <td colspan="2">
                      <div class="form-group">
                        <label for="id_unit_keuangan" class="control-label" align='left'>Unit Pengelola Keuangan :</label>
                          <div class="input-group">
                            <input type="hidden" class="form-control" id="id_unit_keuangan" name="id_unit_keuangan" >
                            <input type="text" class="form-control" id="nm_unit_keuangan" name="nm_unit_keuangan" readonly>
                            <div class="input-group-btn">
                                <button class="btn btn-primary" data-toggle="modal" href="#" id="btnCariKeuangan" name="btnCariKeuangan"><i class="glyphicon glyphicon-search"></i></button>
                            </div>
                          </div>
                      </div>

                  </td>
                </tr>
                <tr>
                  <td colspan="2">
                      <div class="form-group">
                        <label for="nama_sekda" class="" align='left'>Nama Sekretaris Daerah :</label>
                          <input type="text" class="form-control" id="nama_sekda" name="nama_sekda" placeholder="Nama Lengkap Sekretaris Daerah">
                      </div>
                  </td>
                  <td colspan="2">
                      <div class="form-group">
                        <label for="nama_kabappeda" class="" align='left'>Nama Kepala Unit Perencanaan :</label>
                          <input type="text" class="form-control" id="nama_kabappeda" name="nama_kabappeda" placeholder="Nama Lengkap Kepala Badan yang berfungsi perencanaan">
                      </div>
                  </td>
                  <td colspan="2">
                      <div class="form-group">
                        <label for="nama_kabpkad" class="" align='left'>Nama Kepala Unit Pengelola Keuangan :</label>
                          <input type="text" class="form-control" id="nama_kabpkad" name="nama_kabpkad" placeholder="Nama Lengkap Kepala Badan yang mengelola keuangan daerah">
                      </div>

                  </td>
                </tr>
                <tr>
                  <td colspan="2">
                      <div class="form-group">
                        <label for="nip_sekda" class="" align='left'>NIP Sekretaris Daerah :</label>
                          <input type="text" class="form-control nip" id="nip_sekda_display" name="nip_sekda_display" maxlength="18">
                          <input type="hidden" class="form-control" id="nip_sekda" name="nip_sekda">
                      </div>
                  </td>
                  <td colspan="2">
                      <div class="form-group">
                        <label for="nip_kabappeda" class="" align='left'>NIP Kepala Unit Perencanaan :</label>
                          <input type="text" class="form-control nip" id="nip_kabappeda_display" name="nip_kabappeda_display" maxlength="18">
                          <input type="hidden" class="form-control" id="nip_kabappeda" name="nip_kabappeda">
                      </div>
                  </td>
                  <td colspan="2">
                      <div class="form-group">
                        <label for="nip_kabpkad" class="" align='left'>NIP Kepala Unit Pengelola Keuangan :</label>
                          <input type="text" class="form-control nip" id="nip_kabpkad_display" name="nip_kabpkad_display" maxlength="18">
                          <input type="hidden" class="form-control" id="nip_kabpkad" name="nip_kabpkad">
                      </div>
                  </td>
                </tr>
              </table>
              {{-- </div> --}}
            </form>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-sm-2 text-left">
                      <button type="button" id="btnEditPemda" class="btn btn-sm btn-primary btn-labeled">
                            <span class="btn-label"><i id="fooHapusRek" class="fa fa-pencil-square-o fa-lg fa-fw"></i></span>Edit Data Pemda</button>
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons idbtnSimpanPemda">
                        <button type="button" id="btnSimpanPemda" class="btn btn-sm btn-success btn-labeled">
                            <span class="btn-label"><i class="fa fa-floppy-o fa-lg fa-fw"></i></span>Simpan</button>
                        <div class="or"></div>
                        <button type="button" id="btnBatalPemda" class="btn btn-sm btn-warning btn-labeled" aria-hidden="true">
                            <span class="btn-label"><i class="fa fa-ban fa-lg fa-fw"></i></span>Batal</button>
                      </div>
                    </div>
                </div>
              </div>
          </div>
        </div>
    </div>
  </div>
</div>

  {{-- Modal Cari Kode Rekening --}}
  <div id="cariUnit" class="modal fade" tabindex="-1" data-focus-on="input:first" data-backdrop="static">
  <div class="modal-dialog modal-lg"  >
    <div class="modal-content">
    <div class="modal-header">
        <h4>Daftar Organisasi Perangkat Daerah</h4>
    </div>
    <div class="modal-body">
      <form class="form-horizontal" role="form" autocomplete='off' action="" method="" onsubmit="return false;">
        <div class="form-group">
          <div class="col-sm-12">
            <input type="hidden" name="id_sumber_req" id="id_sumber_req">
            <table id='tblUnit' class="table display table-striped table-bordered compact table-responsive" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                  <th width="5%" style="text-align: center; vertical-align:middle">Kode OPD</th>
                  <th style="text-align: center; vertical-align:middle">Nama Organisasi Perangkat Daerah</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </form>
      <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left">
                    </div>
                    <div class="col-sm-10 text-right">
                        <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="fa fa-ban fa-lg fa-fw"></i></span>Tutup</button>
                    </div>
                </div>
              </div> 
      </div>
    </div>
    </div>
  </div>



@endsection

@section('scripts')
<script  type="text/javascript" language="javascript" class="init">

$(document).ready(function() {

$('[data-toggle="popover"]').popover();

function buatNip(string){
  return string.replace(/(\d{8})(\d{6})(\d{1})(\d{3})/,"$1 $2 $3 $4");
}

function nilaiNip(string){
  return string.replace(/\D/g,'').substring(0, 20);
}

var angkaNip = document.getElementsByClassName('nip');
angkaNip.onkeydown = function(e) {
      if(!((e.keyCode > 95 && e.keyCode < 106)
        || (e.keyCode > 47 && e.keyCode < 58) 
        )) {
          return false;
      }
  }

$("input[name='nip_sekda_display']").on("keyup", function(){
    $("input[name='nip_sekda']").val(nilaiNip(this.value));
    this.value = buatNip($("input[name='nip_sekda']").val());
})

$("input[name='nip_kabappeda_display']").on("keyup", function(){
    $("input[name='nip_kabappeda']").val(nilaiNip(this.value));
    this.value = buatNip($("input[name='nip_kabappeda']").val());
})

$("input[name='nip_kabpkad_display']").on("keyup", function(){
    $("input[name='nip_kabpkad']").val(nilaiNip(this.value));
    this.value = buatNip($("input[name='nip_kabpkad']").val());
})

function LoadPemda() {
  $.ajax({
          type: "GET",
          url: 'pemda/getPemda',
          dataType: "json",

          success: function(data) {
            $('#kode_pemda').val(data[0].kode_pemda);
            $('#nama_pemda').val(data[0].nm_kabkota);
            $('#jabatan_kada').val(data[0].nama_jabatan_kepala_daerah);
            $('#nama_kada').val(data[0].nama_kepala_daerah);
            $('#nip_sekda').val(data[0].nip_sekretariat_daerah);
            $('#nama_sekda').val(data[0].nama_sekretariat_daerah);
            $('#nip_kabappeda').val(data[0].nip_kepala_bappeda);
            $('#nama_kabappeda').val(data[0].nama_kepala_bappeda);
            $('#nip_kabpkad').val(data[0].nip_kepala_bpkad);
            $('#nama_kabpkad').val(data[0].nama_kepala_bpkad);
            $('#nip_sekda_display').val(buatNip(data[0].nip_sekretariat_daerah));
            $('#nip_kabappeda_display').val(buatNip(data[0].nip_kepala_bappeda));
            $('#nip_kabpkad_display').val(buatNip(data[0].nip_kepala_bpkad));              
          }
        });


}

LoadPemda();
$('.idbtnSimpanPemda').hide();
$('#btnEditPemda').show();

$(document).on('click', '#btnCariPerencana', function() {
    $('#id_sumber_req').val(0);    
    $('#cariUnit').modal('show');
    LoadRefUnit();
  });

$(document).on('click', '#btnCariKeuangan', function() {
    $('#id_sumber_req').val(1);    
    $('#cariUnit').modal('show');
    LoadRefUnit();
  });

var cariunit
function LoadRefUnit() {
  cariunit = $('#tblUnit').DataTable( {
        processing: true,
        serverSide: true,
        dom: 'bfrtIp',
        autoWidth : false,
        "ajax": {"url": "pemda/getRefUnit"},
        "columns": [
              { data: 'no_urut', sClass: "dt-center", width:'5%' },
              { data: 'kd_unit', sClass: "dt-center", width:'5%' },
              { data: 'nm_unit'}
            ],
        "order": [[0, 'asc']],
        "bDestroy": true
    });
}

  $('#tblUnit tbody').on( 'dblclick', 'tr', function () {

    var data = cariunit.row(this).data();

    if($('#id_sumber_req').val()==0){
      document.getElementById("nm_unit_perencanaan").value = data.nm_unit;
      document.getElementById("id_unit_perencanaan").value = data.id_unit;
    };
    if($('#id_sumber_req').val()==1){
      document.getElementById("nm_unit_keuangan").value = data.nm_unit;
      document.getElementById("id_unit_keuangan").value = data.id_unit;
    };
    
    $('#cariUnit').modal('hide');

  } );

  
$(document).on('click', "#btnEditPemda" , function() {   
  $('#btnEditPemda').hide();
  $('.idbtnSimpanPemda').show();
  // alert($_FILES['logo_pemda']['name'])
   
   $.ajax({
                type: "GET",
                url: 'pemda/getPemdaX',
                dataType: "json",
                success: function(data) {
                  console.log(data);                 
                }
            });   

});

$(document).on('click', "#btnBatalPemda" , function() {   
  $('.idbtnSimpanPemda').hide();
  $('#btnEditPemda').show();
  LoadPemda();   

});


});
</script>
@endsection
