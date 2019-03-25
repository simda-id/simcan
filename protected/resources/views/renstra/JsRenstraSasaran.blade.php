$(document).on('click', '.btnTambahSasaran', function() {
    $('.btnSimpanSasaran').removeClass('editSasaran');
    $('.btnSimpanSasaran').addClass('addSasaran');
	 $('.modal-title').text('Data Sasaran Perangkat Daerah');
	 $('.form-horizontal').show();
    $('#id_sasaran_edit').val(null);
    $('#thn_id_sasaran_edit').val(thn_id);
    $('#id_tujuan_sasaran_edit').val(id_tujuan_renstra);
    $('#no_urut_sasaran_edit').val(1);
    $('#id_perubahan_sasaran_edit').val(1);
    $('#ur_sasaran_rpjmd_edit').val(null);
    $('#id_sasaran_rpjmd_edit').val(null);
    $('#ur_sasaran_edit').val(null);
    $('.divTujuanRenstra').hide();
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

$(document).on('click', '.btnDetailSasaran', function() {
var data = tbl_Sasaran.row( $(this).parents('tr') ).data();
    $('.btnSimpanSasaran').removeClass('addSasaran');
    $('.btnSimpanSasaran').addClass('editSasaran');
	$('.modal-title').text('Data Sasaran Perangkat Daerah');
	$('.form-horizontal').show();
    $('#id_sasaran_edit').val(data.id_sasaran_renstra);
    $('#thn_id_sasaran_edit').val(data.thn_id);
    $('#id_tujuan_sasaran_edit').val(data.id_tujuan_renstra);
    $('#id_tujuan_sasaran_display').val(data.uraian_tujuan_renstra);
    $('#no_urut_sasaran_edit').val(data.no_urut);
    $('#id_perubahan_sasaran_edit').val(data.id_perubahan);
    $('#ur_sasaran_rpjmd_edit').val(data.uraian_sasaran_rpjmd);
    $('#id_sasaran_rpjmd_edit').val(data.id_sasaran_rpjmd);
    $('#ur_sasaran_edit').val(data.uraian_sasaran_renstra);
    $('.divTujuanRenstra').show();
      if(data.sumber_data == 0){
          $('.btnHapusTujuan').hide();
      } else {
          $('.btnHapusTujuan').show();
      };
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
  $('#id_sasaran_renstra_hapus').val($('#id_sasaran_edit').val());
  $('#ur_sasaran_renstra_hapus').text($('#ur_sasaran_edit').val());  
  $('#HapusSasaran').modal('show');
});

$(document).on('click', '.btnDelSasaranRenstra', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      type: 'post',
      url: './renstra/delSasaran',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_sasaran_renstra': $('#id_sasaran_renstra_hapus').val()
      },
      success: function(data) {
        $('#ModalSasaran').modal('hide'); 
        $('#tblSasaran').DataTable().ajax.reload(null,false);
        createPesan(data.pesan,"info");
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
  
    if(data.level_rpjmd==3){
        document.getElementById("ur_sasaran_rpjmd_edit").value = data.uraian_sasaran_rpjmd;
        document.getElementById("id_sasaran_rpjmd_edit").value = data.id_sasaran_rpjmd;
    }
    if(data.level_rpjmd==4){
        document.getElementById("ur_program_rpjmd_edit").value = data.uraian_program_rpjmd;
        document.getElementById("id_program_rpjmd_edit").value = data.id_program_rpjmd;
        document.getElementById("id_sasaran_rpjmd_ori_edit").value = data.id_sasaran_rpjmd;
    }
    $('#ModalSasaranRPJMD').modal('hide');   
});

var caritujuanrenstra
$(document).on('click', '.btnCariTujuan', function() {    
    $('#judulModal').text('Daftar Tujuan yang terdapat dalam Renstra OPD ybs');    
    $('#CariItemRenstra').modal('show');

    caritujuanrenstra = $('#tblCariItemRenstra').DataTable( {
        processing: true,
        serverSide: true,
        dom: 'bfrtIp',
        autoWidth : false,
        "ajax": {"url": "./renstra/getCariTujuanRenstra/"+id_unit_renstra},
        "columns": [
              { data: 'urut'},
              { data: 'kd_misi'},
              { data: 'uraian_tujuan_renstra'},
            ],
        "order": [[0, 'asc']],
        "bDestroy": true
    });
});

$('#tblCariItemRenstra tbody').on( 'dblclick', 'tr', function () {
    var data = caritujuanrenstra.row(this).data();
    
    if (data.level_item == 3) {
        document.getElementById("id_tujuan_sasaran_edit").value = data.id_tujuan_renstra;
        document.getElementById("id_tujuan_sasaran_display").value = data.uraian_tujuan_renstra;
    }

    if (data.level_item == 4) {
        document.getElementById("id_sasaran_renstra_program_edit").value = data.id_sasaran_renstra;
        document.getElementById("id_sasaran_program_edit").value = data.uraian_sasaran_renstra;
        document.getElementById("id_sasaran_rpjmd_program_edit").value = data.id_sasaran_rpjmd;
    }

    $('#CariItemRenstra').modal('hide');   
});