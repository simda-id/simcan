function getStatus(){
    var xCheck = document.querySelectorAll('input[name="checkStatus"]:checked');
    var xyz = [];
    for(var x = 0, l = xCheck.length; x < l;  x++)
      { xyz.push(xCheck[x].value); }
    var xvalues = xyz.join('');
    return xvalues;
  }

$(document).on('click', '.btnAddPegawai', function() { 
        $('#divRiwayat').hide();   
        $('.btnSimpanPegawai').removeClass('editPegawai');
        $('.btnSimpanPegawai').addClass('addPegawai');
        $('.modal-title').text('Data Pegawai Pejabat Eselon');
        $('#id_pegawai').val(null);
        $('#nip_pegawai_display').val(null);
        document.getElementById("nip_pegawai_display").removeAttribute("disabled");
        $('#nip_pegawai').val(null);
        $('#nama_pegawai').val(null);
        document.frmModalPegawai.checkStatus[0].checked=true;    
        $('.form-horizontal').show();
        $('#ModalPegawai').modal('show');
});

$('.modal-footer').on('click', '.addPegawai', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: 'pegawai/addPegawai',
        data: {
            '_token': $('input[name=_token]').val(),
            'nama_pegawai': $('#nama_pegawai').val(),
            'nip_pegawai': $('#nip_pegawai').val(),
            'status_pegawai': getStatus(),   
        },
        success: function(data) {
            tblPegawai.ajax.reload(null,false);
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }
        }
    });
});

$(document).on('click', '.btnDetailPegawai', function() {    
    $('#divRiwayat').show();   
var data = tblPegawai.row( $(this).parents('tr') ).data();
    $('.btnSimpanPegawai').addClass('editPegawai');
    $('.btnSimpanPegawai').removeClass('addPegawai');
    $('.modal-title').text('Data Pegawai Pejabat Eselon');
    id_pegawai_temp=data.id_pegawai;
    $('#id_pegawai').val(data.id_pegawai);
    $('#nip_pegawai_display').val(buatNip(data.nip_pegawai));
    document.getElementById("nip_pegawai_display").setAttribute("disabled","disabled")
    $('#nip_pegawai').val(data.nip_pegawai);
    $('#nama_pegawai').val(data.nama_pegawai);
    document.frmModalPegawai.checkStatus[data.status_pegawai].checked=true;  
    LoadPangkat(id_pegawai_temp);  
    LoadUnit(id_pegawai_temp);  
    $('.form-horizontal').show();
    $('#ModalPegawai').modal('show');
});

$('.modal-footer').on('click', '.editPegawai', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: 'pegawai/editPegawai',
        data: {
            '_token': $('input[name=_token]').val(),                        
            'id_pegawai': $('#id_pegawai').val(), 
            'nama_pegawai': $('#nama_pegawai').val(),
            'nip_pegawai': $('#nip_pegawai').val(),
            'status_pegawai': getStatus(),    
        },
        success: function(data) {
            tblPegawai.ajax.reload(null,false);
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }
        }
    });
});

$(document).on('click', '.btnDelPegawai', function() {
    var data = tblPegawai.row( $(this).parents('tr') ).data();
      $('.btnAksiDelPegawai').addClass('delPegawai');
      $('.modal-title').text('Hapus Data Pegawai Pejabat Eselon');
      $('.form-horizontal').hide();
      $('#id_pegawai_hapus').val(data.id_pegawai);
      $('.nama_pegawai_hapus').html(data.nama_pegawai);
      $('#HapusPegawai').modal('show');

}); 
    
$('.modal-footer').on('click', '.delPegawai', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });
    
      $.ajax({
        type: 'post',
        url: 'pegawai/delPegawai',
        data: {
          '_token': $('input[name=_token]').val(),
          'id_pegawai': $('#id_pegawai_hapus').val(),
        },
        success: function(data) {
            tblPegawai.ajax.reload(null,false);
            if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
            }
        }
      });
});