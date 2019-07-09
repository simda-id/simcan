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

function formatTgl(val_tanggal){
  var formattedDate = new Date(val_tanggal);
  var d = formattedDate.getDate();
  var m = formattedDate.getMonth();
  var y = formattedDate.getFullYear();
  var m_names = new Array("Januari", "Februari", "Maret", 
    "April", "Mei", "Juni", "Juli", "Agustus", "September", 
    "Oktober", "November", "Desember")

  var tgl= d + " " + m_names[m] + " " + y;
  return tgl;
}

$('.page-alert .close').click(function(e) {
  e.preventDefault();
  $(this).closest('.page-alert').slideUp();
});

$('#tahun_rkpd').number(true,0,',','');

$('#tanggal_rkpd_x').datepicker({
  altField: "#tanggal_rkpd",
  altFormat: "yy-mm-dd", 
  dateFormat: "dd MM yy"
});

$('#btn').click(function() {
    $("#tanggal_rkpd_x").focus();
  });

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
    )) { return false; }
}

$("input[name='nip_tandatangan_display']").on("keyup", function(){
    $("input[name='nip_tandatangan']").val(nilaiNip(this.value));
    this.value = buatNip($("input[name='nip_tandatangan']").val());
})


  // vars = "?token="     + {{ csrf_token() }};
  vars = "?tahun=" + {{Session::get('tahun')}};
  $.ajax({
          type: "GET",
          url: 'ppas/getDataDokReferensi'+ vars,
          dataType: "json",
          success: function(data) {

          var j = data.length;
          var post, i;

          $('select[name="id_dokumen_ref"]').empty();
          $('select[name="id_dokumen_ref"]').append('<option value="0">---Pilih Dokumen Referensi---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="id_dokumen_ref"]').append('<option value="'+ post.id_dokumen_rkpd +'">'+ post.nomor_display +'</option>');
          }
          }
      });

var dokumen_tbl = $('#tblDokumen').DataTable({
        processing: true,
        serverSide: true,
        "autoWidth": false,
        "ajax": {"url": "./ppas/getDataDokumen"},
        "language": {
                "decimal": ",",
                "thousands": "."},
        "columns": [
              { data: 'no_urut', sClass: "dt-center"},
              { data: 'tahun_anggaran', sClass: "dt-center"},
              { data: 'nomor_keu'},
              { data: 'uraian_perkada'},
              { data: 'icon','searchable': false, 'orderable':false, sClass: "dt-center",width:"15px",
                render: function(data, type, row,meta) {
                return '<i class="'+row.status_icon+'" style="font-size:16px;color:'+row.warna+';"/>';
              }},
              { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
            ],
            "order": [[0, 'asc']],
            "bDestroy": true
      });

var TblRekapPPAS;
function loadTblRekapPPAS(id_dokumen_keu){ 
    vars = "?id_dokumen_keu=" + id_dokumen_keu;   
    TblRekapPPAS=$('#tblRekapPPAS').DataTable({
                  processing: true,
                  serverSide: true,
                  dom : 'BfRtip',
                  autoWidth : false,
                  "ajax": {"url": "./ppas/getDataRekap"+ vars},
                  "language": {
                      "decimal": ",",
                      "thousands": "."},
                  "columns": [
                        { data: 'kd_unit', sClass: "dt-center", width:"5px"},
                        { data: 'nm_unit'},
                        { data: 'jml_program', sClass: "dt-right",
                          render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'jml_kegiatan', sClass: "dt-right",
                          render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'jml_pelaksana', sClass: "dt-right",
                          render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'jml_aktivitas', sClass: "dt-right",
                          render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'jml_pendapatan', sClass: "dt-right",
                          render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'jml_belanja', sClass: "dt-right",
                          render: $.fn.dataTable.render.number( '.', ',', 2, '' )},
                        { data: 'jml_pembiayaan', sClass: "dt-right",
                          render: $.fn.dataTable.render.number( '.', ',', 2, '' )}
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        });
}

var id_dokumen_temp, tahun_rkpd_temp;
$('#tblDokumen tbody').on( 'dblclick', 'tr', function () {
    var data = dokumen_tbl.row(this).data();
    id_dokumen_temp=data.id_dokumen_keu;
    tahun_rkpd_temp=data.tahun_anggaran;

    loadTblRekapPPAS(data.id_dokumen_keu);
    $('.nav-tabs a[href="#rekap"]').tab('show');

  });

$(document).on('click', '#btnLihatRekap', function() {
  
  var data = dokumen_tbl.row( $(this).parents('tr') ).data();  
    loadTblRekapPPAS(data.id_dokumen_keu);
    $('.nav-tabs a[href="#rekap"]').tab('show');
});

$(document).on('click', '#btnAddDokumen', function() {
  $.ajax({
    type: "GET",
    url: './ppas/getDataPerencana',
    dataType: "json",
    success: function(data) {
      $('#btnDokumen').removeClass('editDokumen');
      $('#btnDokumen').addClass('addDokumen');
      $('.modal-title').text('Tambah Dokumen Proritas dan Plafond Anggaran Sementara (PPAS)');
      $('.form-horizontal').show();

      $('#id_dokumen_rkpd').val(null);
      $('#tahun_rkpd').val({{Session::get('tahun')}});
      $('#id_dokumen_ref').val(0);
      $('#tanggal_rkpd').val(null);
      $('#tanggal_rkpd_x').val(null);
      $('#nomor_rkpd').val(null);
      $('#uraian_perkada').val(null);
      $('#id_unit_perencana').val(data[0].unit_keuangan);
      $('#id_unit_perencana_display').val(data[0].nm_unit);
      $('#nama_tandatangan').val(data[0].nama_kepala_bpkad);
      
      if(data[0].nip_kepala_bpkad==null){
        $('#nip_tandatangan_display').val(null);
      } else {
        $('#nip_tandatangan_display').val(buatNip(data[0].nip_kepala_bpkad));
      };
      
      $('#nip_tandatangan').val(data[0].nip_kepala_bpkad);

      $('#btnDelDokumen').hide();
      $('#btnDokumen').show();
      $('#TambahDokumen').modal('show');
    }
  });
});

$('.modal-footer').on('click', '.addDokumen', function() {
  $.ajaxSetup({
      headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });

    $.ajax({
      type: 'post',
      url: 'ppas/addDokumen',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_dokumen_ref': $('#id_dokumen_ref').val(),
        'nomor_keu': $('#nomor_rkpd').val(),
        'tanggal_keu': $('#tanggal_rkpd').val(),
        'uraian_perkada': $('#uraian_perkada').val(),
        'id_unit_ppkd': $('#id_unit_perencana').val(),
        'nama_tandatangan': $('#nama_tandatangan').val(),
        'nip_tandatangan': $('#nip_tandatangan').val(),
      },
      success: function(data) {
        dokumen_tbl.ajax.reload(null,false);
        if(data.status_pesan==1){
          createPesan(data.pesan,"success");
        } else {
          createPesan(data.pesan,"danger"); 
        }
      }
    });
});

$(document).on('click', '#btnEditDokumen', function() {

  var data = dokumen_tbl.row( $(this).parents('tr') ).data();

      $('#btnDokumen').removeClass('addDokumen');
      $('#btnDokumen').addClass('editDokumen');
      $('.modal-title').text('Ubah Dokumen Proritas dan Plafond Anggaran Sementara (PPAS)');
      $('.form-horizontal').show();

      $('#id_dokumen_rkpd').val(data.id_dokumen_rkpd);
      $('#tahun_rkpd').val(data.tahun_rkpd);
      $('#tanggal_rkpd').val(data.tanggal_rkpd);
      $('#tanggal_rkpd_x').val(formatTgl(data.tanggal_rkpd));
      $('#nomor_rkpd').val(data.nomor_rkpd);
      $('#uraian_perkada').val(data.uraian_perkada);
      $('#id_unit_perencana').val(data.id_unit_perencana);
      $('#id_unit_perencana_display').val(data.nm_unit);
      $('#nama_tandatangan').val(data.nama_tandatangan);      
      $('#nip_tandatangan').val(data.nip_tandatangan);
      
      if(data.nip_tandatangan==null){
        $('#nip_tandatangan_display').val(null);
      } else {
        $('#nip_tandatangan_display').val(buatNip(data.nip_tandatangan));
      };

      if(data.flag==1){
        $('#btnDelDokumen').hide();
        $('#btnDokumen').hide();
      } else {
        $('#btnDelDokumen').show();
        $('#btnDokumen').show();
      };

      $('#TambahDokumen').modal('show');
});

$('.modal-footer').on('click', '.editDokumen', function() {
  $.ajaxSetup({
      headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });

    $.ajax({
      type: 'post',
      url: 'ppas/editDokumen',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_dokumen_rkpd': $('#id_dokumen_rkpd').val(),
        'tahun_rkpd': $('#tahun_rkpd').val(),
        'tanggal_rkpd': $('#tanggal_rkpd').val(),
        'nomor_rkpd': $('#nomor_rkpd').val(),
        'uraian_perkada': $('#uraian_perkada').val(),
        'id_unit_perencana': $('#id_unit_perencana').val(),
        'nama_tandatangan': $('#nama_tandatangan').val(),
        'nip_tandatangan': $('#nip_tandatangan').val(),
      },
      success: function(data) {
        dokumen_tbl.ajax.reload(null,false);
        if(data.status_pesan==1){
          createPesan(data.pesan,"success");
        } else {
          createPesan(data.pesan,"danger"); 
        }
      }
    });
});

$(document).on('click', '#btnDelDokumen', function() {
  
  $('#btnDelDokumen1').removeClass('delDokumen');
  $('#btnDelDokumen1').addClass('delDokumen');
  $('.form-horizontal').show();

  $('#id_dokumen_hapus').val($('#id_dokumen_rkpd').val());
  $('.ur_dokumen_del').html($('#nomor_rkpd').val());

  $('#HapusDokumen').modal('show');
});

$('.modal-footer').on('click', '.delDokumen', function() {
  $.ajaxSetup({
      headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });

    $.ajax({
      type: 'post',
      url: 'ppas/hapusDokumen',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_dokumen_rkpd': $('#id_dokumen_hapus').val(),
      },
      success: function(data) {
        dokumen_tbl.ajax.reload(null,false);
        $('#TambahDokumen').modal('hide');
        if(data.status_pesan==1){
          createPesan(data.pesan,"success");
        } else {
          createPesan(data.pesan,"danger"); 
        }
      }
    });
});

$(document).on('click', '#btnPostingRkpd', function() {

  var data = dokumen_tbl.row( $(this).parents('tr') ).data();
      $('.form-horizontal').show();

      $('#id_dokumen_posting').val(data.id_dokumen_rkpd);
      $('#status_dokumen_posting').val(data.flag);
      $('#tahun_dokumen_posting').val(data.tahun_rkpd);      
      $('#ur_tahun_posting').html(data.tahun_rkpd);

      if(data.flag==0){
        $('#ur_status_dokumen_posting').html("Posting");
      } else {
        $('#ur_status_dokumen_posting').html("Un-Posting");
      };

      $('#StatusProgram').modal('show');
});

$('.modal-footer').on('click', '#btnPostProgram', function() {
      var status_post, status_temp, status_awal;
      if($('#status_dokumen_posting').val()==0){
          status_post = 1;
          status_temp = 2;
          status_awal = 1;
      } else {
          status_post = 0;
          status_temp = 1;
          status_awal = 2;
      };

      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });
      
      $('#StatusProgram').modal('hide');
      $('#ModalProgress').modal('show');

      $.ajax({
          type: 'post',
          url: 'ppas/postDokumen',
          data: {
              '_token': $('input[name=_token]').val(),
              'tahun_rkpd': $('#tahun_dokumen_posting').val(),
              'id_dokumen_rkpd': $('#id_dokumen_posting').val(),
              'flag': status_post,
              'status': status_temp,
              'status_awal': status_awal,
          },
          success: function(data) {
              dokumen_tbl.ajax.reload(null,false);
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
              $('#ModalProgress').modal('hide');
          },
          error: function(data){
          dokumen_tbl.ajax.reload(null,false);
          $('#ModalProgress').modal('hide');
          createPesan("Data Gagal Diposting (0vdrPD)","danger");
        }
      });
    });

$(document).on('click', '#btnProsesLoad', function() {
  var data = dokumen_tbl.row( $(this).parents('tr') ).data();
  $.ajax({
    type: 'POST',
    url: 'ppas/importData',
    data: {
      '_token': $('input[name=_token]').val(),
      'kd_dokumen_keu' : data.kd_dokumen_keu ,
      'jns_dokumen_keu' : data.jns_dokumen_keu ,
      'id_perubahan' : data.id_perubahan ,
      'id_dokumen_rkpd' : data.id_dokumen_keu ,
    },
    success: function(data) {
      createPesan(data.pesan,"success");
      dokumen_tbl.ajax.reload(null,false);
      $('#ModalProgress').modal('hide');
    },
    error: function(data){
      createPesan(data.pesan,"danger");
      dokumen_tbl.ajax.reload(null,false);
      $('#ModalProgress').modal('hide');
    }
  });
});

$(document).on('click', '#btnPostingApi', function() {
  var items = Array({
      // '_token': $('input[name=_token]').val(),
      'kd_urusan' : 'Kode_Urusan' ,
      'kd_bidang' : 'Kode_Bidang' ,
      'kd_unit' : 'Kode_Unit' ,
      'nm_unit' : 'Nama_Unit' ,
    });

  $.ajax({
    // headers: {'Access-Control-Allow-Origin': '*'},
    url: 'http://localhost:8080/api_server/scapi/AddFungsi', 
    type: 'POST',   
    data: items,
    success: function(data) {
      console.log(data);
      alert('OK');
    },
    error: function(data){
      console.log(data); 
      alert('Error');
    }
  });

  // $.post('http://localhost:8080/api_server/scapi/AddFungsi', items)
  
 

});

});
</script>