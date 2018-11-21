$(document).on('click', '.btnAddSasaran', function() {
    var data = tbl_Tujuan.row( $(this).parents('tr') ).data();
    $('.btnSimpanSasaran').removeClass('editSasaran');
    $('.btnSimpanSasaran').addClass('addSasaran');
	$('.modal-title').text('Data Sasaran Daerah');
	$('.form-horizontal').show();
    $('#id_sasaran_edit').val(null);
    $('#thn_id_sasaran_edit').val(data.thn_id);
    $('#id_tujuan_sasaran_edit').val(data.id_tujuan_renstra);
    $('#id_tujuan_sasaran_display').val(data.id_tujuan_renstra);
    $('#no_urut_sasaran_edit').val(1);
    $('#id_perubahan_sasaran_edit').val(0);
    $('#ur_sasaran_rpjmd_edit').val(null);
    $('#id_sasaran_rpjmd_edit').val(null);
    $('#ur_sasaran_edit').val(null);
    $('#ModalSasaran').modal('show');
});

$('.modal-footer').on('click', '.addSasaran', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './renstra/addSasaran',
        data: {
            '_token': $('input[name=_token]').val(),
            'thn_id': $('#thn_id_sasaran_edit').val(),
            'no_urut': $('#no_urut_sasaran_edit').val(),
            'id_sasaran_renstra': $('#id_sasaran_renstra_edit').val(),
            'id_perubahan': $('#id_perubahan_sasaran_edit').val(),
            'kd_indikator': $('#kd_sasaran_renstra').val(),
            'uraian_sasaran_renstra': $('#ur_sasaran_renstra').val(),
            'tolok_ukur_indikator': $('#ur_sasaran_renstra').val(),
            'angka_awal_periode': $('#indisasaran_awal_edit').val(),
            'angka_tahun1': $('#indisasaran1_edit').val(),
            'angka_tahun2': $('#indisasaran2_edit').val(),
            'angka_tahun3': $('#indisasaran3_edit').val(),
            'angka_tahun4': $('#indisasaran4_edit').val(),
            'angka_tahun5': $('#indisasaran5_edit').val(),
            'angka_akhir_periode': $('#indisasaran_akhir_edit').val(),    
        },
        success: function(data) {
            $('#tblSasaran').DataTable().ajax.reload(null,false);
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }

        }
    });
});

$(document).on('click', '.btnDetailSasaran', function() {
var data = tbl_Sasaran.row( $(this).parents('tr') ).data();
    $('.btnSimpanSasaran').removeClass('addSasaran');
    $('.btnSimpanSasaran').addClass('editSasaran');
	$('.modal-title').text('Data Indikator Sasaran Daerah');
	$('.form-horizontal').show();
    $('#id_sasaran_edit').val(data.id_sasaran_renstra);
    $('#thn_id_sasaran_edit').val(data.thn_id);
    $('#id_tujuan_sasaran_edit').val(data.id_tujuan_renstra);
    $('#id_tujuan_sasaran_display').val(data.kd_tujuan);
    $('#no_urut_sasaran_edit').val(data.no_urut);
    $('#id_perubahan_sasaran_edit').val(data.id_perubahan);
    $('#ur_sasaran_rpjmd_edit').val(data.uraian_sasaran_rpjmd);
    $('#id_sasaran_rpjmd_edit').val(data.id_sasaran_rpjmd);
    $('#ur_sasaran_edit').val(data.uraian_sasaran_renstra);
    $('#ModalSasaran').modal('show');
});

$('.modal-footer').on('click', '.editSasaran', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './renstra/editSasaran',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_sasaran_renstra': $('#id_sasaran_edit').val(),
            'thn_id': $('#thn_id_sasaran_edit').val(),
            'no_urut': $('#no_urut_sasaran_edit').val(),
            'id_tujuan_renstra': $('#id_tujuan_sasaran_edit').val(),
            'id_perubahan': $('#id_perubahan_sasaran_edit').val(),
            'uraian_sasaran_renstra': $('#ur_sasaran_edit').val(),
            'id_sasaran_rpjmd': $('#id_sasaran_rpjmd_edit').val(),  
        },
        success: function(data) {
            $('#tblSasaran').DataTable().ajax.reload(null,false);
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }

        }
    });
});

$(document).on('click', '.btnHapusSasaran', function() {
    var data = tbl_Sasaran.row( $(this).parents('tr') ).data();
      $('.btnDelSasaran').addClass('delSasaran');
      $('.modal-title').text('Hapus Referensi Indikator');
      $('.form-horizontal').hide();
      $('#id_sasaran_hapus').val(data.id_sasaran_renstra);
      $('#nm_sasaran_hapus').html(data.nm_indikator);
      $('#HapusSasaranModal').modal('show');

});
    
    
    
$('.modal-footer').on('click', '.delSasaran', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });
    
      $.ajax({
        type: 'post',
        url: './renstra/delSasaran',
        data: {
          '_token': $('input[name=_token]').val(),
          'id_sasaran_renstra': $('#id_sasaran_hapus').val(),
        },
        success: function(data) {
            $('#tblSasaran').DataTable().ajax.reload(null,false);
            if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
            }
        }
      });
});

var carisasaranrpjmd
$(document).on('click', '.btnCariSasaran', function() {    
    $('#judulModal').text('Daftar Sasaran yang terdapat dalam RPJMD');    
    $('#ModalSasaranRPJMD').modal('show');

    carisasaranrpjmd = $('#tblCariSasaran').DataTable( {
        processing: true,
        serverSide: true,
        dom: 'bfrtIp',
        autoWidth : false,
        "ajax": {"url": "./renstra/getSasaranRPJMD/"+id_unit_renstra},
        "columns": [
              { data: 'urut'},
              { data: 'kd_sasaran'},
              { data: 'uraian_sasaran_rpjmd'},
            ],
        "order": [[0, 'asc']],
        "bDestroy": true
    });
});

$('#tblCariSasaran tbody').on( 'dblclick', 'tr', function () {
    var data = carisasaranrpjmd.row(this).data();

    document.getElementById("ur_sasaran_rpjmd_edit").value = data.uraian_sasaran_rpjmd;
    document.getElementById("id_sasaran_rpjmd_edit").value = data.id_sasaran_rpjmd;

    $('#ModalSasaranRPJMD').modal('hide');    

  });