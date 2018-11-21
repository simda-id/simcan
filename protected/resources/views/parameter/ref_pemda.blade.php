<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.parameterlayout')
{{-- <meta name="_token" content="{!! csrf_token() !!}" /> --}}


@section('content')
<div class="container-fluid">
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
    <div id="pesan" class="notify"></div>
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-info">
          <div class="panel-heading">
            <p><h2 class="panel-title"> Identitas Pemerintah Daerah </h2></p>
          </div>

          <div class="panel-body">
            <form class="form-horizontal" action="#" method="post" role="form" autocomplete='off' enctype="multipart/form-data" onsubmit="return false;">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="id_pemda" id="id_pemda">
              <div class="row">
                <div class="col-sm-3" style="text-align: center;" id="iPemda"></div>
                <div class="col-sm-9">
                <div class="col-sm-12">
                  <div class="form-group">
                      <label for="name" class="col-sm-4 control-label">Kode Pemerintah Daerah</label>
                      <div class="col-sm-3">
                          <input type="text" class="form-control" id="kode_pemda" name="kode_pemda" readonly style="text-align: center;">
                      </div>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                      <label for="name" class="col-sm-4 control-label">Nama Pemerintah Daerah</label>
                      <div class="col-sm-5">
                          <input type="text" class="form-control" id="nama_pemda" name="nama_pemda" placeholder="Nama Resmi Pemda misal : Pemerintah Kota XXX" readonly>
                      </div>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                      <label for="name" class="col-sm-4 control-label">Ibukota Pemerintah Daerah</label>
                      <div class="col-sm-8">
                          <input type="text" class="form-control" id="ibukota" name="ibukota" placeholder="Ibukota Pemerintah Daerah">
                      </div>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="name" class="col-sm-4 control-label">Jabatan Kepala Daerah</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="jabatan_kada" name="jabatan_kada" placeholder="Bupati/Walikota">
                    </div>
                  </div>
                </div> 
              <div class="col-sm-12">
                  <div class="form-group">
                      <label for="name" class="col-sm-4 control-label">Nama Kepala Daerah</label>
                      <div class="col-sm-8">
                          <input type="text" class="form-control" id="nama_kada" name="nama_kada" placeholder="Nama Lengkap Bupati/Walikota">
                      </div>
                  </div>
                </div> 
              <div class="col-sm-12">
                <div class="form-group">
                        <label for="nama_sekda" class="col-sm-4 control-label" align='left'>Nama Sekretaris Daerah :</label>
                        <div class="col-sm-8">
                          <input type="text" class="col-sm-8 form-control" id="nama_sekda" name="nama_sekda" placeholder="Nama Lengkap Sekretaris Daerah">
                        </div>
                      </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                        <label for="nama_sekda" class="col-sm-4 control-label" align='left'>NIP Sekretaris Daerah :</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control nip" id="nip_sekda_display" name="nip_sekda_display" maxlength="18">
                          <input type="hidden" class="form-control" id="nip_sekda" name="nip_sekda">
                        </div>
                      </div>
                </div>
                </div>
              </div>

              <div class="col-sm-12">
                <div class="form-group">
                  <div class="col-sm-2">
                    <label for="alamat_setda" class="control-label">Alamat Sekretariat Daerah :</label>
                  </div>
                  <div class="col-sm-10">
                    <textarea type="text" class="form-control" id="alamat_setda" name="alamat_setda" rows='3'></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-2">
                    <label for="telepon_setda" class="control-label">Nomor Telepon :</label>
                  </div>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="telepon_setda" name="telepon_setda" maxlength="24">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-2">
                    <label for="faks_setda" class="control-label">Nomor Faksimili :</label>
                  </div>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="faks_setda" name="faks_setda" maxlength="24">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-2">
                    <label for="email_setda" class="control-label">Alamat Email :</label>
                  </div>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="email_setda" name="email_setda" maxlength="50">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6">
                    <div class="col-sm-12">
                      <label for="name" class="control-label">Unit Perencanaan</label>
                    </div>
                      <div class="col-sm-12">
                          <div class="input-group">
                            <input type="hidden" class="" id="id_unit_perencanaan" name="id_unit_perencanaan" >
                            <input type="text" class="form-control" id="nm_unit_perencanaan" name="nm_unit_perencanaan" readonly>
                            <span class="input-group-btn">
                              <button class="btn btn-primary" data-toggle="modal" id="btnCariPerencana" name="btnCariPerencana"><i class="fa fa-search fa-fw"></i></button>
                            </span>
                          </div>    
                      </div>
                    <div class="col-sm-12">
                      <label for="nama_kabappeda" class="control-label" align='left'>Nama Kepala Unit Perencanaan :</label>
                    </div>
                    <div class="col-sm-12">                        
                          <input type="text" class="form-control" id="nama_kabappeda" name="nama_kabappeda" placeholder="Nama Lengkap Kepala Badan yang berfungsi perencanaan">
                    </div>
                    <div class="col-sm-12">
                          <label for="nip_kabappeda" class="" align='left'>NIP Kepala Unit Perencanaan :</label>
                    </div>
                    <div class="col-sm-12">
                        <input type="text" class="form-control nip" id="nip_kabappeda_display" name="nip_kabappeda_display" maxlength="18">
                      <input type="hidden" class="form-control" id="nip_kabappeda" name="nip_kabappeda">
                    </div>
                </div>
                {{-- <div class="col-sm-1">                    
                </div> --}}
                <div class="col-sm-6">
                    <div class="col-sm-12">
                        <label for="id_unit_keuangan" class=" control-label" align='left'>Unit Pengelola Keuangan</label>
                    </div>
                    <div class="col-sm-12">
                        <div class="input-group">
                          <input type="hidden" class="form-control" id="id_unit_keuangan" name="id_unit_keuangan" >
                          <input type="text" class="form-control" id="nm_unit_keuangan" name="nm_unit_keuangan" readonly>
                          <div class="input-group-btn">
                              <button class="btn btn-primary" data-toggle="modal" id="btnCariKeuangan" name="btnCariKeuangan"><i class="glyphicon glyphicon-search"></i></button>
                          </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                          <label for="nama_kabpkad" class="control-label" align='left'>Nama Kepala Unit Pengelola Keuangan :</label>
                    </div>
                    <div class="col-sm-12">
                          <input type="text" class="form-control" id="nama_kabpkad" name="nama_kabpkad" placeholder="Nama Lengkap Kepala Badan yang mengelola keuangan daerah">
                    </div>
                    <div class="col-sm-12">
                      <label for="nip_kabpkad" class="" align='left'>NIP Kepala Unit Pengelola Keuangan :</label>
                    </div>
                    <div class="col-sm-12">
                      <input type="text" class="form-control nip" id="nip_kabpkad_display" name="nip_kabpkad_display" maxlength="18">
                      <input type="hidden" class="form-control" id="nip_kabpkad" name="nip_kabpkad">
                    </div>
                </div>
              </div>
            </form>
          </div>
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
  <div class="row">
    <div class="col-md-12">
    <div class="panel panel-info">
      <div class="panel-body">
        <div class="col-sm-12">
              <label for="" class="control-label" align='left'>Registered to : {{Session::get('xPemda')}} , Rilis : {{Session::get('versiApp')}}
              </label>
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
    </div>
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
@endsection

@section('scripts')
<script  type="text/javascript" language="javascript" class="init">

$(document).ready(function() {

function createPesan(message, type) {
    var html = '<div id="pesanx" class="alert alert-' + type + ' alert-dismissable flyover flyover-bottom in">';    
    html += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';    
    html += '<p><strong>'+message+'</strong></p>';
    html += '</div>';    
    $(html).hide().prependTo('#pesan').slideDown();
    
    // setTimeout(function() {
    //         $('#pesanx').removeClass('in');
    //      }, 3500);
  };

$('.page-alert .close').click(function(e) {
        e.preventDefault();
        $(this).closest('.page-alert').slideUp();
    });

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
        || (e.keyCode > 7 && e.keyCode < 10) 
        || (e.keyCode = 13) 
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
            $('#id_pemda').val(data[0].id_pemda);
            $('#kode_pemda').val(data[0].kode_pemda);
            $('#nama_pemda').val(data[0].nm_kabkota);
            $('#ibukota').val(data[0].ibu_kota);
            $('#jabatan_kada').val(data[0].nama_jabatan_kepala_daerah);
            $('#nama_kada').val(data[0].nama_kepala_daerah);
            $('#nip_sekda').val(data[0].nip_sekretariat_daerah);
            $('#nama_sekda').val(data[0].nama_sekretariat_daerah);
            $('#nip_kabappeda').val(data[0].nip_kepala_bappeda);
            $('#nama_kabappeda').val(data[0].nama_kepala_bappeda);
            $('#nip_kabpkad').val(data[0].nip_kepala_bpkad);
            $('#nama_kabpkad').val(data[0].nama_kepala_bpkad);
            $('#iPemda').html(data[0].iPemda);
            if (data[0].nip_sekretariat_daerah==null) {
              $('#nip_sekda_display').val(null);
            } else {
              $('#nip_sekda_display').val(buatNip(data[0].nip_sekretariat_daerah));
            };

            if(data[0].nip_kepala_bappeda==null){
              $('#nip_kabappeda_display').val(null);
            } else {
              $('#nip_kabappeda_display').val(buatNip(data[0].nip_kepala_bappeda));
            };
            
            if(data[0].nip_kepala_bpkad==null){
              $('#nip_kabpkad_display').val(null);
            } else {
              $('#nip_kabpkad_display').val(buatNip(data[0].nip_kepala_bpkad));
            };
            $('#id_unit_perencanaan').val(data[0].unit_perencanaan);
            $('#id_unit_keuangan').val(data[0].unit_keuangan);
            $('#nm_unit_perencanaan').val(data[0].nm_perencana);
            $('#nm_unit_keuangan').val(data[0].nm_keuangan);
            $('#alamat_setda').val(data[0].alamat);
            $('#telepon_setda').val(data[0].no_telepon);
            $('#faks_setda').val(data[0].no_faksimili);
            $('#email_setda').val(data[0].email);
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

  $.ajaxSetup({
    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });  

  $.ajax({
      type: "GET",
      url: 'pemda/getPemdaX1',
      dataType: "json",
      success: function(data) {
        // console.log(data);
        // var j = data.length;
        // var post, i;
        // for (i = 0; i < j; i++) {
        //   post = data[i];
        //   $.ajax({
        //     type: 'POST',
        //     url: 'pemda/getPemdaX',
        //     data: {
        //         '_token': $('input[name=_token]').val(),
        //         'nama_kab' :post.nama_kab,
        //         'id_kab' :post.id_kab,
        //     },
        //     success: function(data) {
        //       // if(data.status_pesan==1){
        //       // createPesan(data.pesan,"success");
        //       // } else {
        //       // createPesan(data.pesan,"danger"); 
        //       // }
        //     }
        //   }); 
        // }           
      }
  }); 
});

$(document).on('click', "#btnSimpanPemda" , function() {
  $.ajaxSetup({
    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });

  $.ajax({
          type: 'post',
          url: 'pemda/editPemda',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_pemda': $('#id_pemda').val(),
              'ibu_kota': $('#ibukota').val(),
              'jabatan_kada': $('#jabatan_kada').val(),
              'nama_kada': $('#nama_kada').val(),
              'nama_sekda': $('#nama_sekda').val(),
              'nip_sekda': $('#nip_sekda').val(),
              'unit_perencana': $('#id_unit_perencanaan').val(),
              'nama_kabappeda': $('#nama_kabappeda').val(),
              'nip_kabappeda': $('#nip_kabappeda').val(),
              'unit_keuangan': $('#id_unit_keuangan').val(),
              'nama_kabpkad': $('#nama_kabpkad').val(),
              'nip_kabpkad': $('#nip_kabpkad').val(),
              'alamat': $('#alamat_setda').val(),
              'no_telepon': $('#telepon_setda').val(),
              'no_faksimili': $('#faks_setda').val(),
              'email': $('#email_setda').val(),
          },
          success: function(data) {
              $('.idbtnSimpanPemda').hide();
              $('#btnEditPemda').show();
              LoadPemda(); 
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
          },
          error: function(data) {
              $('.idbtnSimpanPemda').hide();
              $('#btnEditPemda').show();
              LoadPemda(); 
              createPesan('Gagal Simpan Edit Pemda',"danger");
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
