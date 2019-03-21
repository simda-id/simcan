$(document).on('click', '.btnTambahProgram', function() {
    $('.btnSimpanProgram').removeClass('editProgram');
    $('.btnSimpanProgram').addClass('addProgram');
    $('.modal-title').text('Data Program Perangkat Daerah');
    $('.form-horizontal').show();
    $('#id_program_renstra_edit').val(null);
    $('#thn_id_program_edit').val(thn_id);
    $('#id_sasaran_renstra_program_edit').val(id_sasaran_renstra);
    $('#id_sasaran_rpjmd_program_edit').val(id_sasaran_rpjmd);
    $('#id_sasaran_rpjmd_ori_edit').val(id_sasaran_rpjmd);
    $('#id_sasaran_program_edit').val(null);
    $('#no_urut_program_edit').val(1);
    $('#id_perubahan_program_edit').val(0);
    $('#id_program_rpjmd_edit').val(null);
    $('#ur_program_rpjmd_edit').val(null);
    $('#id_program_ref_edit').val(null);
    $('#kd_program_edit').val(null);
    $('#ur_program_renstra_edit').val(null);
    $('#ur_sasaran_program_renstra_edit').val(null);
    $('#pagu1_edit').val(0);
    $('#pagu2_edit').val(0);
    $('#pagu3_edit').val(0);
    $('#pagu4_edit').val(0);
    $('#pagu5_edit').val(0);
    $('#pagu6_edit').val(0);    
    $('.divSasaranRenstra').hide();
    $('#ModalProgram').modal('show');
});

$('.modal-footer').on('click', '.addProgram', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './renstra/addProgram',
        data: {
            '_token': $('input[name=_token]').val(),
            'thn_id' : $('#thn_id_program_edit').val(),
            'no_urut' : $('#no_urut_program_edit').val(),
            'id_sasaran_renstra' : $('#id_sasaran_renstra_program_edit').val(),
            'id_program_rpjmd' : $('#id_program_rpjmd_edit').val(),
            'id_program_ref' : $('#id_program_ref_edit').val(),
            'id_perubahan' : $('#id_perubahan_program_edit').val(),
            'uraian_program_renstra' : $('#ur_program_renstra_edit').val(),
            'uraian_sasaran_program' : $('#ur_sasaran_program_renstra_edit').val(),
            'pagu_tahun1' : $('#pagu1_edit').val(),
            'pagu_tahun2' : $('#pagu2_edit').val(),
            'pagu_tahun3' : $('#pagu3_edit').val(),
            'pagu_tahun4' : $('#pagu4_edit').val(),
            'pagu_tahun5' : $('#pagu5_edit').val(),
            'sumber_data' : 0,    
        },
        success: function(data) {
            $('#tblProgram').DataTable().ajax.reload(null,false);
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }

        }
    });
});

$(document).on('click', '.btnDetailProgram', function() {
    var data = tbl_Program.row( $(this).parents('tr') ).data();
    $('.btnSimpanProgram').removeClass('addProgram');
    $('.btnSimpanProgram').addClass('editProgram');
	 $('.modal-title').text('Data Program Perangkat Daerah');
	 $('.form-horizontal').show();
    $('#id_program_renstra_edit').val(data.id_program_renstra);
    $('#thn_id_program_edit').val(data.thn_id);
    $('#id_sasaran_renstra_program_edit').val(data.id_sasaran_renstra);
    $('#id_sasaran_rpjmd_program_edit').val(data.id_sasaran_rpjmd);
    $('#id_sasaran_rpjmd_ori_edit').val(data.id_sasaran_rpjmd);
    $('#id_sasaran_program_edit').val(data.uraian_sasaran_renstra);
    $('#no_urut_program_edit').val(data.no_urut);    
    $('#id_perubahan_program_edit').val(data.id_perubahan);
    $('#id_program_rpjmd_edit').val(data.id_program_rpjmd);
    $('#ur_program_rpjmd_edit').val(data.nm_program_rpjmd);
    $('#id_program_ref_edit').val(data.id_program_ref);
    $('#kd_program_edit').val(data.kd_program);
    $('#ur_program_renstra_edit').val(data.nm_program);
    $('#ur_sasaran_program_renstra_edit').val(data.uraian_sasaran_program);
    $('#pagu1_edit').val(data.pagu_tahun1a);
    $('#pagu2_edit').val(data.pagu_tahun2a);
    $('#pagu3_edit').val(data.pagu_tahun3a);
    $('#pagu4_edit').val(data.pagu_tahun4a);
    $('#pagu5_edit').val(data.pagu_tahun5a);
    $('#pagu6_edit').val(data.pagu_tahun6a);
    $('.divSasaranRenstra').show();
    $('#ModalProgram').modal('show');
});

$('.modal-footer').on('click', '.editProgram', function() {  
  if($('#id_sasaran_rpjmd_ori_edit').val()!=$('#id_sasaran_rpjmd_program_edit').val()){
    alert("Sasaran RPJMD tidak sama dengan Sasaran RPJMD yang dipilih di Program RPJMD")
  } else {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });
  
      $.ajax({
          type: 'post',
          url: './renstra/editProgram',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_program_renstra' : $('#id_program_renstra_edit').val(),
              'thn_id' : $('#thn_id_program_edit').val(),
              'no_urut' : $('#no_urut_program_edit').val(),
              'id_sasaran_renstra' : $('#id_sasaran_renstra_program_edit').val(),
              'id_program_rpjmd' : $('#id_program_rpjmd_edit').val(),
              'id_program_ref' : $('#id_program_ref_edit').val(),
              'id_perubahan' : $('#id_perubahan_program_edit').val(),
              'uraian_program_renstra' : $('#ur_program_renstra_edit').val(),
              'uraian_sasaran_program' : $('#ur_sasaran_program_renstra_edit').val(),
              'pagu_tahun1' : $('#pagu1_edit').val(),
              'pagu_tahun2' : $('#pagu2_edit').val(),
              'pagu_tahun3' : $('#pagu3_edit').val(),
              'pagu_tahun4' : $('#pagu4_edit').val(),
              'pagu_tahun5' : $('#pagu5_edit').val(),
              'sumber_data' : 0,    
          },
          success: function(data) {
              $('#tblProgram').DataTable().ajax.reload(null,false);
                if(data.status_pesan==1){
                  createPesan(data.pesan,"success");
                  } else {
                  createPesan(data.pesan,"danger"); 
                }
  
          }
      });
    }
});

$(document).on('click', '.btnHapusProgram', function() {
  $('#id_program_renstra_hapus').val($('#id_program_renstra_edit').val());
  $('#ur_program_renstra_hapus').text($('#ur_program_renstra_edit').val());  
  $('#HapusProgram').modal('show');
});

$(document).on('click', '.btnDelProgramRenstra', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      type: 'post',
      url: './renstra/delProgram',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_program_renstra': $('#id_program_renstra_hapus').val()
      },
      success: function(data) {
        $('#ModalProgram').modal('hide'); 
        $('#tblProgram').DataTable().ajax.reload(null,false);
        createPesan(data.pesan,"info");
      }
    });
});

$(document).on('click', '.btnCariProgramRPJMD', function() {    
    $('#judulModal').text('Daftar Program yang terdapat dalam RPJMD');    
    $('#ModalSasaranRPJMD').modal('show');

    carisasaranrpjmd = $('#tblCariSasaran').DataTable( {
        processing: true,
        serverSide: true,
        dom: 'bfrtIp',
        autoWidth : false,
        "ajax": {"url": "./renstra/getProgramRPJMD/"+$('#id_sasaran_rpjmd_program_edit').val()},
        "columns": [
              { data: 'urut'},
              { data: 'kd_program'},
              { data: 'uraian_program_rpjmd'},
            ],
        "order": [[0, 'asc']],
        "bDestroy": true
    });
});

$(document).on('click', '.btnCariSasaranRenstra', function() {    
    $('#judulModal').text('Daftar Tujuan yang terdapat dalam Renstra OPD ybs');    
    $('#CariItemRenstra').modal('show');

    caritujuanrenstra = $('#tblCariItemRenstra').DataTable( {
        processing: true,
        serverSide: true,
        dom: 'bfrtIp',
        autoWidth : false,
        "ajax": {"url": "./renstra/getCariSasaranRenstra/"+id_unit_renstra},
        "columns": [
              { data: 'urut'},
              { data: 'kd_sasaran'},
              { data: 'uraian_sasaran_renstra'},
            ],
        "order": [[0, 'asc']],
        "bDestroy": true
    });
});

$(document).on('click', '.btnCariProgramRef', function() {
  $('#judulModal').text('Daftar Program yang terdapat dalam Referensi Program');    
    $('#cariProgramRef').modal('show');
    $('#tblCariProgramRef').DataTable().ajax.url("./renstra/getProgramRef/0").load();

    $.ajax({
          type: "GET",
          url: './renstra/getBidangRef/'+id_unit_renstra+'/'+$('#id_program_rpjmd_edit').val(),
          dataType: "json",

          success: function(data) {

          var j = data.length;
          var post, i;

          $('select[name="kd_bidang_cari"]').empty();
          $('select[name="kd_bidang_cari"]').append('<option value="0">---Pilih Kode Bidang---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="kd_bidang_cari"]').append('<option value="'+ post.id_bidang +'">'+ post.nm_bidang_display +'</option>');
          }
        }
      });
  });

var cariProgramRef;
$( ".kd_bidang_cari" ).change(function() {
  cariProgramRef = $('#tblCariProgramRef').DataTable({
        processing: true,
        serverSide: true,
        dom: 'BFRtIp',
        autoWidth : false,
        "ajax": {"url": "./renstra/getProgramRef/"+$('#kd_bidang_cari').val()},
        "columns": [
              { data: 'no_urut', sClass: "dt-center"},
              { data: 'kd_program_display', sClass: "dt-center"},
              { data: 'uraian_program'}
            ],
        "order": [[0, 'asc']],
        "bDestroy": true
    });
}); 

$('#tblCariProgramRef tbody').on( 'dblclick', 'tr', function () {
    var data = cariProgramRef.row(this).data();
    document.getElementById("id_program_ref_edit").value = data.id_program;
    document.getElementById("kd_program_edit").value = data.kd_program_display;
    document.getElementById("ur_program_renstra_edit").value = data.uraian_program;
    $('#cariProgramRef').modal('hide');
});

function hitungPaguProgram(){

  var p = $('#pagu1_edit').val();
  var q = $('#pagu2_edit').val();
  var r = $('#pagu3_edit').val();
  var s = $('#pagu4_edit').val();
  var t = $('#pagu5_edit').val();
  
  var paguProgram = parseInt(p)+parseInt(q)+parseInt(r)+parseInt(s)+parseInt(t);
  return paguProgram;

}
$( "#pagu1_edit" ).change(function() {
  $('#pagu6_edit').val(hitungPaguProgram()); 
});
$( "#pagu2_edit" ).change(function() {
  $('#pagu6_edit').val(hitungPaguProgram()); 
});
$( "#pagu3_edit" ).change(function() {
  $('#pagu6_edit').val(hitungPaguProgram()); 
});
$( "#pagu4_edit" ).change(function() {
  $('#pagu6_edit').val(hitungPaguProgram()); 
});
$( "#pagu5_edit" ).change(function() {
  $('#pagu6_edit').val(hitungPaguProgram()); 
});