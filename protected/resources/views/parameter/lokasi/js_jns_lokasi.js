$(document).ready(function() {

var jenis_tbl=$('#tblJenisLokasi').DataTable({
  processing: true,
  serverSide: true,
  autoWidth : false,
  language: {
        "decimal": ",",
        "thousands": ".",
        "sEmptyTable":   "Tidak ada data yang tersedia pada tabel ini",
        "sProcessing":   "Sedang memproses...",
        "sLengthMenu":   "Tampilkan _MENU_ entri",
        "sZeroRecords":  "Tidak ditemukan data yang sesuai",
        "sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
        "sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
        "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
        "sInfoPostFix":  "",
        "sSearch":       "Cari:",
        "sUrl":          "",
        "oPaginate": {
            "sFirst":    "Pertama",
            "sPrevious": "Sebelumnya",
            "sNext":     "Selanjutnya",
            "sLast":     "Terakhir"
        }
  },
  "pageLength": 50,
  "lengthMenu": [[10, 50, -1], [10, 50, "All"]],
  "bDestroy": true,
  "ajax": {"url": "./jnsLokasi/getDataJenis"},
  "columns": [
        { data: 'no_urut','searchable': false, 'orderable':true, sClass: "dt-center", width :"5%"},
        { data: 'nm_jenis', sClass: "dt-left"},
        { data: 'action', 'searchable': false, width :"10%", 'orderable':false, sClass: "dt-center" }
      ],
  "order": [[0, 'asc']],
});

$(document).on('click', '#btnHapusJenis', function() {
  var data = jenis_tbl.row( $(this).parents('tr') ).data();

  $.ajaxSetup({
     headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });

  $.ajax({
    type: 'post',
    url: './jnsLokasi/hapusJenisLokasi',
    data: {
      '_token': $('input[name=_token]').val(),
      'id_jenis': data.id_jenis,
    },
    success: function(data) {
      jenis_tbl.ajax.reload();
      if(data.status_pesan==1){
        createPesan(data.pesan,"success");
      } else {
        createPesan(data.pesan,"danger"); 
      }
    }
  });  
});

$(document).on('click', '#btnJenis', function() {
  $.ajaxSetup({
     headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });



  if($.trim($('#uraian_jenis').val()).length > 5){
    $.ajax({
      type: 'post',
      url: './jnsLokasi/addJenisLokasi',
      data: {
        '_token': $('input[name=_token]').val(),
        'nm_jenis': $('#uraian_jenis').val(),
      },
      success: function(data) {
        jenis_tbl.ajax.reload();
        if(data.status_pesan==1){
          createPesan(data.pesan,"success");
        } else {
          createPesan(data.pesan,"danger"); 
        }
      }
    });
  } else {
    createPesan("Uraian Jenis Lokasi masih kosong/kurang dari 6 karakater","danger");
  }  
});


}); //end file