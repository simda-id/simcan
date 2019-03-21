$(document).on('click', '.btnTambahKegiatan', function() {
    $('.btnSimpanKegiatan').addClass('addKegiatan');
    $('.btnSimpanKegiatan').removeClass('editKegiatan');
  $('.modal-title').text('Data Kegiatan Renstra Perangkat Daerah');
  $('.form-horizontal').show();
    $('#id_kegiatan_renstra_edit').val(null);
    $('#thn_id_kegiatan_edit').val(thn_id);
    $('#id_program_renstra_kegiatan_edit').val(id_program_renstra);
    $('#kd_program_kegiatan_edit').val(null);
    $('#no_urut_kegiatan_edit').val(1);
    $('#id_perubahan_kegiatan_edit').val(1);
    $('#id_kegiatan_ref_edit').val(null);
    $('#kd_kegiatan_edit').val(null);
    $('#ur_kegiatan_renstra_edit').val(null);
    $('#ur_sasaran_kegiatan_renstra_edit').val(null);
    $('#pagu1_edit_kegiatan').val(0);
    $('#pagu2_edit_kegiatan').val(0);
    $('#pagu3_edit_kegiatan').val(0);
    $('#pagu4_edit_kegiatan').val(0);
    $('#pagu5_edit_kegiatan').val(0);
    $('#pagu6_edit_kegiatan').val(0);
    $('.divProgramRenstra').hide();
    $('#ModalKegiatan').modal('show');
});

$('.modal-footer').on('click', '.addKegiatan', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './renstra/addKegiatan',
        data: {
            '_token': $('input[name=_token]').val(),
            'thn_id' : $('#thn_id_kegiatan_edit').val(),
            'no_urut' : $('#no_urut_kegiatan_edit').val(),
            'id_program_renstra' : $('#id_program_renstra_kegiatan_edit').val(),
            'id_kegiatan_ref' : $('#id_kegiatan_ref_edit').val(),
            'id_perubahan' : $('#id_perubahan_kegiatan_edit').val(),
            'uraian_kegiatan_renstra' : $('#ur_kegiatan_renstra_edit').val(),
            'uraian_sasaran_kegiatan' : $('#ur_sasaran_kegiatan_renstra_edit').val(),
            'pagu_tahun1' : $('#pagu1_edit_kegiatan').val(),
            'pagu_tahun2' : $('#pagu2_edit_kegiatan').val(),
            'pagu_tahun3' : $('#pagu3_edit_kegiatan').val(),
            'pagu_tahun4' : $('#pagu4_edit_kegiatan').val(),
            'pagu_tahun5' : $('#pagu5_edit_kegiatan').val(),
            'total_pagu'  : $('#pagu6_edit_kegiatan').val(),
        },
        success: function(data) {
            $('#tblKegiatan').DataTable().ajax.reload(null,false);
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }

        }
    });
});

$(document).on('click', '.btnDetailKegiatan', function() {

    var data = tbl_Kegiatan.row( $(this).parents('tr') ).data();
    
    $('.btnSimpanKegiatan').removeClass('addKegiatan');
    $('.btnSimpanKegiatan').addClass('editKegiatan');
	$('.modal-title').text('Data Kegiatan Renstra Perangkat Daerah');
	$('.form-horizontal').show();
    $('#id_kegiatan_renstra_edit').val(data.id_kegiatan_renstra);
    $('#thn_id_kegiatan_edit').val(data.thn_id);
    $('#id_program_renstra_kegiatan_edit').val(data.id_program_renstra);
    $('#kd_program_kegiatan_edit').val(data.nm_program);
    $('#no_urut_kegiatan_edit').val(data.no_urut);
    $('#id_perubahan_kegiatan_edit').val(data.id_perubahan);
    $('#id_kegiatan_ref_edit').val(data.id_kegiatan_ref);
    $('#kd_kegiatan_edit').val(data.kd_kegiatan);
    $('#ur_kegiatan_renstra_edit').val(data.ur_kegiatan);
    $('#ur_sasaran_kegiatan_renstra_edit').val(data.uraian_sasaran_kegiatan);
    $('#pagu1_edit_kegiatan').val(data.pagu_tahun1a);
    $('#pagu2_edit_kegiatan').val(data.pagu_tahun2a);
    $('#pagu3_edit_kegiatan').val(data.pagu_tahun3a);
    $('#pagu4_edit_kegiatan').val(data.pagu_tahun4a);
    $('#pagu5_edit_kegiatan').val(data.pagu_tahun5a);
    $('#pagu6_edit_kegiatan').val(data.pagu_tahun6a);
    $('.divProgramRenstra').show();
    $('#ModalKegiatan').modal('show');
});

$('.modal-footer').on('click', '.editKegiatan', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './renstra/editKegiatan',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_kegiatan_renstra' : $('#id_kegiatan_renstra_edit').val(),
            'thn_id' : $('#thn_id_kegiatan_edit').val(),
            'no_urut' : $('#no_urut_kegiatan_edit').val(),
            'id_program_renstra' : $('#id_program_renstra_kegiatan_edit').val(),
            'id_kegiatan_ref' : $('#id_kegiatan_ref_edit').val(),
            'id_perubahan' : $('#id_perubahan_kegiatan_edit').val(),
            'uraian_kegiatan_renstra' : $('#ur_kegiatan_renstra_edit').val(),
            'uraian_sasaran_kegiatan' : $('#ur_sasaran_kegiatan_renstra_edit').val(),
            'pagu_tahun1' : $('#pagu1_edit_kegiatan').val(),
            'pagu_tahun2' : $('#pagu2_edit_kegiatan').val(),
            'pagu_tahun3' : $('#pagu3_edit_kegiatan').val(),
            'pagu_tahun4' : $('#pagu4_edit_kegiatan').val(),
            'pagu_tahun5' : $('#pagu5_edit_kegiatan').val(),
            'total_pagu'  : $('#pagu6_edit_kegiatan').val(),
        },
        success: function(data) {
            $('#tblKegiatan').DataTable().ajax.reload(null,false);
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }

        }
    });
});

$(document).on('click', '.btnHapusKegiatan', function() {
  $('#id_kegiatan_renstra_hapus').val($('#id_kegiatan_renstra_edit').val());
  $('#ur_kegiatan_renstra_hapus').text($('#ur_kegiatan_renstra_edit').val());  
  $('#HapusKegiatan').modal('show');
});

$(document).on('click', '.btnDelKegiatanRenstra', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      type: 'post',
      url: './renstra/delKegiatan',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_kegiatan_renstra': $('#id_kegiatan_renstra_hapus').val()
      },
      success: function(data) {
        $('#ModalKegiatan').modal('hide'); 
        $('#tblKegiatan').DataTable().ajax.reload(null,false);
        createPesan(data.pesan,"info");
      }
    });
});

var cariKegiatanRef
$(document).on('click', '.btnCariKegiatanRef', function() {
  $('#cariKegiatanRef').modal('show'); 

  cariKegiatanRef = $('#tblCariKegiatanRef').DataTable( {
        processing: true,
        serverSide: true,
        dom: 'bfrtIp',
        autoWidth : false,
        "ajax": {"url": "./renstra/getKegiatanRef/"+id_program_ref},
        "columns": [
              { data: 'no_urut', sClass: "dt-center"},
              { data: 'kd_kegiatan', sClass: "dt-center"},
              { data: 'nm_kegiatan'}
            ],
        "order": [[0, 'asc']],
        "bDestroy": true
    });
});

$('#tblCariKegiatanRef tbody').on( 'dblclick', 'tr', function () {
    var data = cariKegiatanRef.row(this).data();

    document.getElementById("kd_kegiatan_edit").value = data.kd_kegiatan;
    document.getElementById("ur_kegiatan_renstra_edit").value = data.nm_kegiatan;
    document.getElementById("id_kegiatan_ref_edit").value = data.id_kegiatan;
    $('#cariKegiatanRef').modal('hide');    

  });

function hitungPaguKegiatan(){

  var p = $('#pagu1_edit_kegiatan').val();
  var q = $('#pagu2_edit_kegiatan').val();
  var r = $('#pagu3_edit_kegiatan').val();
  var s = $('#pagu4_edit_kegiatan').val();
  var t = $('#pagu5_edit_kegiatan').val();
  
  var paguKegiatan = parseInt(p)+parseInt(q)+parseInt(r)+parseInt(s)+parseInt(t);
  return paguKegiatan;

}
$( "#pagu1_edit_kegiatan" ).change(function() {
  $('#pagu6_edit_kegiatan').val(hitungPaguKegiatan()); 
});
$( "#pagu2_edit_kegiatan" ).change(function() {
  $('#pagu6_edit_kegiatan').val(hitungPaguKegiatan()); 
});
$( "#pagu3_edit_kegiatan" ).change(function() {
  $('#pagu6_edit_kegiatan').val(hitungPaguKegiatan()); 
});
$( "#pagu4_edit_kegiatan" ).change(function() {
  $('#pagu6_edit_kegiatan').val(hitungPaguKegiatan()); 
});
$( "#pagu5_edit_kegiatan" ).change(function() {
  $('#pagu6_edit_kegiatan').val(hitungPaguKegiatan()); 
});