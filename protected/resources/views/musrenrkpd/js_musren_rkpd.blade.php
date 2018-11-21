<script type="text/javascript">

$(document).ready(function() {
  
  function createPesan(message, type) {
    var html = '<div id="pesanx" class="alert alert-' + type + ' alert-dismissable flyover flyover-bottom in">';    
    html += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';    
    html += '<p><strong>'+message+'</strong></p>';
    html += '</div>';    
    $(html).hide().prependTo('#pesan').slideDown();
    
    setTimeout(function() {
            $('#pesanx').removeClass('in');
         }, 3500);
  };

$('.page-alert .close').click(function(e) {
        e.preventDefault();
        $(this).closest('.page-alert').slideUp();
    });

$('[data-toggle="popover"]').popover();

$('.display').DataTable({
    dom : 'BfrtIp',
    autoWidth : false,
    "bDestroy": true
});

$(".disabled").click(function (e) {
        e.preventDefault();
        return false;
});

  var temp_rkpd_ranwal;
  var temp_ur_program_rpjmd;
  var temp_ur_program_rkpd;
  var temp_urusan_rkpd;
  var indikator_reviu;
  var pelaksana_reviu;

  var check_data;

  $('#divAddIndikator').hide();
  $('#divAddUrusan').hide();
  $('#divAddPelaksana').hide();

  $('.display').DataTable({
      dom : 'BfRtip',
      autoWidth : false,
      bDestroy: true
  });


$('#pagu_rpjmd_program').number(true,2,',', '.');
$('#pagu_rkpd_program').number(true,2,',', '.');
$('#pagu_opd_program').number(true,2,',', '.');
$('#target_indikator_rpjmd').number(true,2,',', '.');
$('#target_indikator_rkpd').number(true,2,',', '.');

$('#no_urut_pelaksana').number(true,0,',', '.');
$('#no_urut_indikator').number(true,0,',', '.');
$('#no_urut_program').number(true,0,',', '.');

  var progrkpd = $('#tblProgramRKPD').DataTable( {
        processing: true,
        serverSide: true,
          deferRender: true,
        "autoWidth": false,
        "ajax": {
          "url": "musrenrkpd/getData",
          "data": {
            'id_x' : 'blang',
            },
          },
        "language": {
                "decimal": ",",
                "thousands": "."},
        "columns": [
              { data: 'urut', sClass: "dt-center"},
              { data: 'uraian_program_rpjmd'},
              { data: 'pagu_rpjmd',
                render: $.fn.dataTable.render.number( '.', ',', 0, '' ),
                sClass: "dt-right" },
              { data: 'pagu_ranwal',
                render: $.fn.dataTable.render.number( '.', ',', 0, '' ),
                sClass: "dt-right" },
              { data: 'pagu_prog_renja',
                render: $.fn.dataTable.render.number( '.', ',', 0, '' ),
                sClass: "dt-right" },
              { data: 'jml_indikator', sClass: "dt-center"},
              { data: 'indikator_0', sClass: "dt-center"},
              { data: 'jml_unit', sClass: "dt-center"},
              { data: 'unit_0', sClass: "dt-center"},              
              { data: 'pelaksanaan_display', sClass: "dt-center"},
              { data: 'icon','searchable': false, 'orderable':false,
                  render: function(data, type, row,meta) {
                      return '<i class="'+row.status_icon+'" style="font-size:16px;color:'+row.warna+';"/>';
                  }, sClass: "dt-center"},
              { data: 'action', 'searchable': false, 'orderable':false , sClass: "dt-center"}
            ],
        "order": [[0, 'asc']],
                  "bDestroy": true
      } );

  $('#tblProgramRKPD tbody').on( 'dblclick', 'tr', function () {
      // EditProgram();
  });

var indiProg_tbl

function LoadIndikatorProg(id_program){
  indiProg_tbl = $('#tblIndikatorRKPD').DataTable( {
    processing: true,
    serverSide: true,
    deferRender: true,
    "autoWidth": false,
    "ajax": {"url": "musrenrkpd/getIndikatorRKPD/"+id_program},
    "language": {
        "decimal": ",",
        "thousands": "."},
    'columnDefs': [
      { 'width': 5,
          'targets': 0,
          'checkboxes': {'selectRow': true } },
      { "targets": 1, "width": 5 }
      ],
    'select': { 'style': 'multi' },
    "columns": [
          { data: 'id_indikator_rkpd', sClass: "dt-center", searchable: false, orderable:false,},
          { data: 'urut', sClass: "dt-center"},
          { data: 'uraian_indikator_program_rkpd'},
          { data: 'tolok_ukur_indikator'},
          { data: 'target_rpjmd',
            render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-center"},
          { data: 'target_rkpd',
            render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-center"},
          { data: 'status_reviu','searchable': false, 'orderable':false,
                  render: function(data, type, row,meta) {
                    if ( type === 'display' ) {
                      return '<i class="'+row.status_reviu+'" style="font-size:16px;color:'+row.warna+';"/>';
                    }
                    return data},
                    sClass: "dt-center"},
          { data: 'action', 'searchable': false, 'orderable':false,
            sClass: "dt-center" }
        ],
        "order": [[0, 'asc']],
        "bDestroy": true
  } );}

  var UrusanTable 
  function LoadUrusan(id_program){ 
    UrusanTable = $('#tblUrusanRKPD').DataTable( {
            processing: true,
            serverSide: true,
            deferRender: true,
          "autoWidth": false,
            "ajax": {"url": "musrenrkpd/getUrusanRKPD/"+id_program},
            "language": {
                    "decimal": ",",
                    "thousands": "."},
            "columns": [
                  { data: 'urut', sClass: "dt-center"},
                  { data: 'nm_urusan'},
                  { data: 'nm_bidang'},
                  { data: 'jml_data', sClass: "dt-center"},
                  { data: 'jml_0', sClass: "dt-center"},
                  { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
                ],
            "order": [[0, 'asc']],
                    "bDestroy": true
    } );}

  $('#tblUrusanRKPD tbody').on( 'dblclick', 'tr', function () {
    var data = UrusanTable.row(this).data();

    temp_rkpd_ranwal =  data.id_musrenkab;
    temp_urusan_rkpd = data.id_urusan_rkpd;

      if (data.status_data_program ==0){
        if(data.status_program==2 || data.status_program==3 ){
          document.getElementById("btnTambahPelaksana").style.visibility='hidden';
          document.getElementById("btnReviuPelaksana").style.visibility='hidden';
        } else {
          document.getElementById("btnTambahPelaksana").style.visibility='visible';
          document.getElementById("btnReviuPelaksana").style.visibility='visible';
        }
      } else {
        document.getElementById("btnTambahPelaksana").style.visibility='hidden';
        document.getElementById("btnReviuPelaksana").style.visibility='hidden';
      };

      document.getElementById("nm_program_rkpd_pelaksana").innerHTML = temp_ur_program_rkpd;
      document.getElementById("nm_program_rpjmd_pelaksana").innerHTML = temp_ur_program_rpjmd;
      document.getElementById("nm_bidang_pelaksana").innerHTML = data.nm_bidang;
      document.getElementById("nm_urusan_pelaksana").innerHTML = data.nm_urusan;

      $('.nav-tabs a[href="#pelaksana"]').tab('show');
      LoadPelaksana(temp_rkpd_ranwal,temp_urusan_rkpd);

  });


  var PelaksanaTable
  function LoadPelaksana(id_ranwal,id_urusan){
    PelaksanaTable = $('#tblPelaksanaRKPD').DataTable( {
            processing: true,
            serverSide: true,
            deferRender: true,
            "autoWidth": false,
            "ajax": {"url": "musrenrkpd/getPelaksanaRKPD/"+id_ranwal+"/"+id_urusan},
            "language": {
                    "decimal": ",",
                    "thousands": "."},
            'columnDefs': [
              { 'width': 5,
                  'targets': 0,
                  'checkboxes': {'selectRow': true } },
              { "targets": 1, "width": 5 }
              ],
            'select': { 'style': 'multi' },
            "columns": [              
                  { data: 'id_pelaksana_rkpd', sClass: "dt-center", searchable: false, orderable:false,},
                  { data: 'urut', sClass: "dt-center"},
                  { data: 'kd_unit', sClass: "dt-center"},
                  { data: 'nm_unit'},
                  { data: 'pagu_prog_renja',
                    render: $.fn.dataTable.render.number( '.', ',', 0, '' ),
                    sClass: "dt-right" },
                  { data: 'status_reviu','searchable': false, 'orderable':false,
                    render: function(data, type, row,meta) {
                      if ( type === 'display' ) {
                        return '<i class="'+row.status_reviu+'" style="font-size:16px;color:'+row.warna+';"/> ';
                      }
                      return data},
                      sClass: "dt-center"},
                  { data: 'action', 'searchable': false, 'orderable':false,
                    sClass: "dt-center" }
                ],
            "order": [[0, 'asc']],
            "bDestroy": true,
    } );}

$('#tblPelaksanaRKPD tbody').on( 'mousedown', 'td', function (e) {
     if( e.button == 2 ) { 
        alert('Klik Kanan....!'); 
        return false; 
     } 
     return true; 
}); 

  $(document).on('click', '.view-indikator', function() {
      var data = progrkpd.row( $(this).parents('tr') ).data();

      temp_rkpd_ranwal =  data.id_musrenkab;
      $('#divAddIndikator').show();
      
      if (data.status_data == 0){
        if(data.status_pelaksanaan==2 || data.status_pelaksanaan==3 ){
          document.getElementById("btnTambahIndikator").style.visibility='hidden';
          document.getElementById("btnReviuIndikator").style.visibility='hidden';          
        } else {
          document.getElementById("btnTambahIndikator").style.visibility='visible';
          document.getElementById("btnReviuIndikator").style.visibility='visible';
        }
      } else {
        document.getElementById("btnTambahIndikator").style.visibility='hidden';
          document.getElementById("btnReviuIndikator").style.visibility='hidden';
      };

      document.getElementById("nm_program_rkpd_indikator").innerHTML = data.uraian_program_rpjmd;
      document.getElementById("nm_program_rpjmd_indikator").innerHTML = data.program_pemda;

      $('.nav-tabs a[href="#indikator"]').tab('show');
      LoadIndikatorProg(temp_rkpd_ranwal);
    });

  $(document).on('click', '.view-pelaksana', function() {
      var data = progrkpd.row( $(this).parents('tr') ).data();

      temp_rkpd_ranwal =  data.id_musrenkab;
      $('#divAddUrusan').show();

      if (data.status_data == 0){
        if(data.status_pelaksanaan==2 || data.status_pelaksanaan==3 ){
            document.getElementById("btnTambahUrusan").style.visibility='hidden';
        } else {
            document.getElementById("btnTambahUrusan").style.visibility='visible';
        }
      } else {
            document.getElementById("btnTambahUrusan").style.visibility='hidden';
      };

      document.getElementById("nm_program_rkpd_urusan").innerHTML = data.uraian_program_rpjmd;
      temp_ur_program_rkpd = data.uraian_program_rpjmd
      document.getElementById("nm_program_rpjmd_urusan").innerHTML = data.program_pemda;
      temp_ur_program_rpjmd = data.program_pemda

      $('.nav-tabs a[href="#urusan"]').tab('show');
      LoadUrusan(temp_rkpd_ranwal);
    });

  $(document).on('click', '#btnBackUrusan', function() {
      $('#divAddUrusan').show();
      $('.nav-tabs a[href="#urusan"]').tab('show');
      LoadUrusan(temp_rkpd_ranwal);
    });

function back2Urusan(){  
  $('#divAddUrusan').show();
  $('.nav-tabs a[href="#urusan"]').tab('show');
  LoadUrusan(temp_rkpd_ranwal);
}

$(document).on('click', '.backUrusan', function() {
  back2Urusan();
});

  $(document).on('click', '.view-unit', function() {
    var data = UrusanTable.row( $(this).parents('tr') ).data();

      temp_urusan_rkpd = data.id_urusan_rkpd;

      $('#divAddPelaksana').show();

      if (data.status_data_program == 0){
        if($(this).data('status_program')==2 || $(this).data('status_program')==3 ){
          document.getElementById("btnTambahPelaksana").style.visibility='hidden';
          document.getElementById("btnReviuPelaksana").style.visibility='hidden';
        } else {
          document.getElementById("btnTambahPelaksana").style.visibility='visible';
          document.getElementById("btnReviuPelaksana").style.visibility='visible';
        }
      } else {
        document.getElementById("btnTambahPelaksana").style.visibility='hidden';
        document.getElementById("btnReviuPelaksana").style.visibility='hidden';
      };

      document.getElementById("nm_program_rkpd_pelaksana").innerHTML = temp_ur_program_rkpd;
      document.getElementById("nm_program_rpjmd_pelaksana").innerHTML = temp_ur_program_rpjmd;
      document.getElementById("nm_bidang_pelaksana").innerHTML = data.nm_bidang;
      document.getElementById("nm_urusan_pelaksana").innerHTML = data.nm_urusan;

      $('.nav-tabs a[href="#pelaksana"]').tab('show');
      LoadPelaksana(temp_rkpd_ranwal,temp_urusan_rkpd);
      // $('#tblPelaksanaRKPD').DataTable().ajax.url("./musrenrkpd/getPelaksanaRKPD/"+temp_rkpd_ranwal+"/"+temp_urusan_rkpd).load();
    });

  $(document).on('click', '.add-pelaksana', function() {
      $('.btnAddPelaksana').removeClass('editPelaksana');
      $('.btnAddPelaksana').addClass('addPelaksana');
      $('.modal-title').text('Tambah Unit Pelaksana Program RKPD');
      $('.form-horizontal').show();
      $('#id_pelaksana_rkpd').val(null);
      $('#id_urusan_rkpd_pelaksana').val(temp_urusan_rkpd);
      $('#id_unit_rkpd').val(null);
      $('#id_rkpd_ranwal_pelaksana').val(temp_rkpd_ranwal);
      $('#no_urut_pelaksana').val(null);
      $('#unit_pelaksana_rkpd').val(null);
      $('#ket_pelaksanaan_unit').val(null);

      document.frmEditPelaksana.ophak_akses[0].checked=true;
      document.getElementById("no_urut_pelaksana").removeAttribute("disabled");
      document.getElementById("keterangan_status_unit").removeAttribute("disabled");
      $('.KetPelaksanaanUnit').show();
      document.frmEditPelaksana.status_pelaksanaan_unit[5].checked=true;
      document.frmEditPelaksana.status_pelaksanaan_unit[5].style.visibility='hidden';        
      document.getElementById("status_pelaksanaan_unit4").style.visibility='hidden';
      $('.idStatusPelaksanaUnit').hide();

      $('.btnCariUnit').show();
      $('.chkPelaksana').show();
      $('.checkPelaksana').prop('checked',false);

      $('#EditPelaksana').modal('show');
  });

  $('.modal-footer').on('click', '.addPelaksana', function() {
      if (document.getElementById("checkPelaksana").checked){
        check_data = 1
      } else {
        check_data = 0
      }

      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: 'musrenrkpd/addPelaksanaRKPD',
          data: {
              '_token': $('input[name=_token]').val(),
              'no_urut': $('#no_urut_pelaksana').val(),
              'id_rkpd_ranwal': $('#id_rkpd_ranwal_pelaksana').val(),
              'id_urusan_rkpd': $('#id_urusan_rkpd_pelaksana').val(),
              'id_unit': $('#id_unit_rkpd').val(),
              'ket_pelaksanaan': $('#keterangan_status_unit').val(),
              'status_pelaksanaan': getStatusPelaksanaanUnit(),
              'hak_akses': getHakAkses(),
              'status_data': check_data,
          },
          success: function(data) {
              $('#tblPelaksanaRKPD').DataTable().ajax.reload(null,false);
              $('#tblUrusanRKPD').DataTable().ajax.reload(null,false);
              $('#tblProgramRKPD').DataTable().ajax.reload(null,false);
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
          }
      });
  });

  $(document).on('click', '.edit-pelaksana', function() {
    var data = PelaksanaTable.row( $(this).parents('tr') ).data();

      $('.btnAddPelaksana').removeClass('addPelaksana');
      $('.btnAddPelaksana').addClass('editPelaksana');
      $('.modal-title').text('Edit dan Reviu Pelaksana Program RKPD');
      $('.form-horizontal').show();
      $('#id_pelaksana_rkpd').val(data.id_pelaksana_rkpd);
      $('#id_urusan_rkpd_pelaksana').val(data.id_urusan_rkpd);
      $('#id_unit_rkpd').val(data.id_unit);
      $('#id_rkpd_ranwal_pelaksana').val(data.id_rkpd_rancangan);
      $('#no_urut_pelaksana').val(data.no_urut);
      $('#unit_pelaksana_rkpd').val(data.nm_unit);
      
      if(data.sumber_data==1){
        document.getElementById("no_urut_pelaksana").removeAttribute("disabled");
        $('.btnCariUnit').show();
      } else {
        document.getElementById("no_urut_pelaksana").setAttribute("disabled","disabled");
        $('.btnCariUnit').hide();
      }

      $('.chkPelaksana').show();
      if(data.status_data==1){
        $('.checkPelaksana').prop('checked',true);
      } else {
        $('.checkPelaksana').prop('checked',false);
      }

      document.frmEditPelaksana.ophak_akses[data.hak_akses].checked=true;

      if(data.status_pelaksanaan==4 || data.sumber_data==1){
          document.frmEditPelaksana.status_pelaksanaan_unit[5].checked=true;
          document.frmEditPelaksana.status_pelaksanaan_unit[5].style.visibility='hidden';        
          document.getElementById("status_pelaksanaan_unit4").style.visibility='hidden';
          $('.idStatusPelaksanaUnit').hide();
          $('.btnCariUnit').show();          
        } else {
            $('.idStatusPelaksanaanUnit').show();
            document.frmEditPelaksana.status_pelaksanaan_unit[data.status_pelaksanaan].checked=true;
            document.frmEditPelaksana.status_pelaksanaan_unit[5].style.visibility='hidden';        
            document.getElementById("status_pelaksanaan_unit4").style.visibility='hidden';
            $('.idStatusPelaksanaUnit').show();
            $('.btnCariUnit').hide();
        }      

      if(data.status_pelaksanaan==0){
          document.getElementById("keterangan_status_unit").setAttribute("disabled","disabled");
          $('.KetPelaksanaanUnit').hide();
        } else {
            document.getElementById("keterangan_status_unit").removeAttribute("disabled");
            $('.KetPelaksanaanUnit').show();
        }

      $('#keterangan_status_unit').val(data.ket_pelaksanaan);

      $('#EditPelaksana').modal('show');
    });

  $('.modal-footer').on('click', '.editPelaksana', function() {

      if (document.getElementById("checkPelaksana").checked){
        check_data = 1
      } else {
        check_data = 0
      }

      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: 'musrenrkpd/editPelaksanaRKPD',
          data: {
              '_token': $('input[name=_token]').val(),
              'no_urut': $('#no_urut_pelaksana').val(),
              'id_pelaksana_rkpd': $('#id_pelaksana_rkpd').val(),
              'id_rkpd_ranwal': $('#id_rkpd_ranwal_pelaksana').val(),
              'id_urusan_rkpd': $('#id_urusan_rkpd_pelaksana').val(),
              'id_unit': $('#id_unit_rkpd').val(),
              'ket_pelaksanaan': $('#keterangan_status_unit').val(),
              'status_pelaksanaan': getStatusPelaksanaanUnit(),
              'hak_akses': getHakAkses(),
              'status_data': check_data,
          },
          success: function(data) {
              $('#tblPelaksanaRKPD').DataTable().ajax.reload(null,false);
              $('#tblUrusanRKPD').DataTable().ajax.reload(null,false);
              $('#tblProgramRKPD').DataTable().ajax.reload(null,false);
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              } 
          }
      });
  });

  $(document).on('click', '.hapus-pelaksana', function() {

    var data = PelaksanaTable.row( $(this).parents('tr') ).data();

    $('.btnDelUnit').addClass('delUnitRKPD');
    $('.modal-title').text('Hapus Unit Pelaksana RKPD');
    $('#id_pelaksana_rkpd_hapus').val(data.id_pelaksana_rkpd);
    $('.ur_unit_del').html(data.nm_unit);

    $('#HapusPelaksana').modal('show');
  });

  $('.modal-footer').on('click', '.delUnitRKPD', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      type: 'post',
      url: 'musrenrkpd/hapusPelaksanaRKPD',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_pelaksana_rkpd': $('#id_pelaksana_rkpd_hapus').val()
      },
      success: function(data) {
        $('#tblPelaksanaRKPD').DataTable().ajax.reload(null,false);
        $('#tblUrusanRKPD').DataTable().ajax.reload(null,false);
        $('#tblProgramRKPD').DataTable().ajax.reload(null,false);
        createPesan(data.pesan,"success");
      }
    });
  });

  $('.sUnit').change(function() {
    if(document.frmEditPelaksana.status_pelaksanaan_unit.value==0){
      document.getElementById("keterangan_status_unit").setAttribute("disabled","disabled");
      $('.KetPelaksanaanUnit').hide();
    } else {
      document.getElementById("keterangan_status_unit").removeAttribute("disabled");
      $('.KetPelaksanaanUnit').show();
    }

  });

  $(document).on('click', '.add-urusan', function() {
      $('.btnUrusan').addClass('addUrusan');
      $('.modal-title').text('Tambah Urusan dan Bidang Pemerintahan RKPD');
      $('.form-horizontal').show();
      $('#id_rkpd_ranwal_urusan').val(temp_rkpd_ranwal);

      $('#ModalUrusan').modal('show');

      $.ajax({

          type: "GET",
          url: './admin/parameter/getUrusan',
          dataType: "json",

          success: function(data) {

          var j = data.length;
          var post, i;

          $('select[name="kd_urusan"]').empty();
          $('select[name="kd_urusan"]').append('<option value="-1">---Pilih Urusan Pemerintahan---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="kd_urusan"]').append('<option value="'+ post.kd_urusan +'">'+ post.nm_urusan +'</option>');
          }
          }
      });
  });

  $('.modal-footer').on('click', '.addUrusan', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: 'musrenrkpd/addUrusanRKPD',
          data: {
              '_token': $('input[name=_token]').val(),
              'no_urut': null,
              'id_rkpd_ranwal': $('#id_rkpd_ranwal_urusan').val(),
              'id_bidang': $('#kd_bidang').val(),
          },
          success: function(data) {             
              $('#tblUrusanRKPD').DataTable().ajax.reload(null,false);
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }             
          }
      });
  });

  $(document).on('click', '.hapus-urusan', function() {
    var data = UrusanTable.row( $(this).parents('tr') ).data();

    $('.btnDelUrusan').addClass('delUrusanRKPD');
    $('.modal-title').text('Hapus Urusan - Bidang pada RKPD');
    $('#id_urusan_rkpd_hapus').val(data.id_urusan_rkpd);
    $('.ur_bidang_del').html(data.nm_bidang);
    $('.ur_urusan_del').html(data.nm_urusan);

    $('#HapusUrusan').modal('show');
  });

  $('.modal-footer').on('click', '.delUrusanRKPD', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      type: 'post',
      url: 'musrenrkpd/hapusUrusanRKPD',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_urusan_rkpd': $('#id_urusan_rkpd_hapus').val()
      },
      success: function(data) {
        // $('#ModalIndikator').modal('hide');
        $('#tblUrusanRKPD').DataTable().ajax.reload(null,false);
        $('#tblProgramRKPD').DataTable().ajax.reload(null,false);
        if(data.status_pesan==1){
          createPesan(data.pesan,"success");
        } else {
          createPesan(data.pesan,"danger"); 
        } 
      }
    });
  });

  $(document).on('click', '.add-indikator', function() {
      $('.btnIndikator').removeClass('editIndikator');
      $('.btnIndikator').addClass('addIndikator');
      $('.modal-title').text('Tambah Target Capaian Program RKPD');
      $('.form-horizontal').show();
      $('#id_indikator_rkpd').val(null);
      $('#kd_indikator_rkpd').val(null);
      $('#id_rkpd_ranwal_indikator').val(temp_rkpd_ranwal);
      $('#no_urut_indikator').val(null);
      $('#ur_indikator_rkpd').val(null);
      $('#ur_tolokukur_rkpd').val(null);
      $('#target_indikator_rpjmd').val(0);
      $('#target_indikator_rkpd').val(0);
      $('#id_satuan_output').val(null);


      document.getElementById("no_urut_indikator").removeAttribute("disabled");
      document.getElementById("ur_tolokukur_rkpd").removeAttribute("disabled");

      $('.btnCariIndi').show();
      $('.btnHapusIndikator').hide();
      $('.chkIndikator').hide();

      $('#ModalIndikator').modal('show');
  });

  $('.modal-footer').on('click', '.addIndikator', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: 'musrenrkpd/addIndikatorRKPD',
          data: {
              '_token': $('input[name=_token]').val(),
              'no_urut': $('#no_urut_indikator').val(),
              'id_musrenkab': $('#id_rkpd_ranwal_indikator').val(),
              'kd_indikator': $('#kd_indikator_rkpd').val(),
              'uraian_indikator': $('#ur_indikator_rkpd').val(),
              'tolok_ukur_indikator': $('#ur_tolokukur_rkpd').val(),
              'target_rkpd': $('#target_indikator_rkpd').val(),
              'id_satuan_output':$('#id_satuan_output').val(),
          },
          success: function(data) {
              $('#tblIndikatorRKPD').DataTable().ajax.reload(null,false);
              $('#tblProgramRKPD').DataTable().ajax.reload(null,false);
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              } 
              
          }
      });
  });

  $(document).on('click', '.edit-indikator', function() {
    var data = indiProg_tbl.row( $(this).parents('tr') ).data();

      $('.btnIndikator').removeClass('addIndikator');
      $('.btnIndikator').addClass('editIndikator');
      $('.modal-title').text('Edit dan Reviu Target Capaian Program RKPD');
      $('.form-horizontal').show();
      $('#id_indikator_rkpd').val(data.id_indikator_rkpd);
      $('#id_rkpd_ranwal_indikator').val(data.id_musrenkab);
      $('#kd_indikator_rkpd').val(data.kd_indikator);
      $('#no_urut_indikator').val(data.no_urut);
      $('#ur_indikator_rkpd').val(data.uraian_indikator_program_rkpd);
      $('#ur_tolokukur_rkpd').val(data.tolok_ukur_indikator);
      $('#target_indikator_rpjmd').val(data.target_rpjmd);
      $('#target_indikator_rkpd').val(data.target_rkpd);
      $('#id_satuan_output').val(data.id_satuan_ouput);
      
      if(data.sumber_data==1){
        document.getElementById("no_urut_indikator").removeAttribute("disabled");
        // document.getElementById("ur_indikator_rkpd").removeAttribute("disabled");
        $('.btnCariIndi').show();
        $('.btnHapusIndikator').show();
        document.getElementById("ur_tolokukur_rkpd").removeAttribute("disabled");
      } else {
        document.getElementById("no_urut_indikator").setAttribute("disabled","disabled");
        // document.getElementById("ur_indikator_rkpd").setAttribute("disabled","disabled");
        $('.btnCariIndi').hide();
        $('.btnHapusIndikator').hide();
        document.getElementById("ur_tolokukur_rkpd").setAttribute("disabled","disabled");
      }

      $('.chkIndikator').show();
      if(data.sumber_data==1){
        $('.checkIndikator').prop('checked',true);
      } else {
        $('.checkIndikator').prop('checked',false);
      }
      $('#ModalIndikator').modal('show');
    });

  $('.checkIndikator').change(function(){

  });

  $('.modal-footer').on('click', '.editIndikator', function() {

      if (document.getElementById("checkIndikator").checked){
        check_data = 1
      } else {
        check_data = 0
      }

      alert($('#id_indikator_rkpd').val());

      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: 'musrenrkpd/editIndikatorRKPD',
          data: {
              '_token': $('input[name=_token]').val(),
              'no_urut': $('#no_urut_indikator').val(),
              'id_indikator_rkpd': $('#id_indikator_rkpd').val(),
              'id_musrenkab': $('#id_rkpd_ranwal_indikator').val(),
              'kd_indikator': $('#kd_indikator_rkpd').val(),
              'uraian_indikator': $('#ur_indikator_rkpd').val(),
              'tolok_ukur_indikator': $('#ur_tolokukur_rkpd').val(),
              'target_rkpd': $('#target_indikator_rkpd').val(),
              'id_satuan_output':$('#id_satuan_output').val(),
              'status_data': check_data,
          },
          success: function(data) {
              $('#tblIndikatorRKPD').DataTable().ajax.reload(null,false);
              $('#tblProgramRKPD').DataTable().ajax.reload(null,false);
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
          }
      });
  });

  $(document).on('click', '.btnHapusIndikator', function() {
    $('.btnDelIndikator').addClass('delIndikatorRKPD');
    $('.modal-title').text('Hapus Data Indikator RKPD Tambahan');
    $('#id_indikator_hapus').val($('#id_indikator_rkpd').val());
    $('.ur_indikator_rkpd_del').html($('#ur_indikator_rkpd').val());
    $('#HapusIndikator').modal('show');
  });

  $('.modal-footer').on('click', '.delIndikatorRKPD', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      type: 'post',
      url: 'musrenrkpd/hapusIndikatorRKPD',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_indikator_program_rkpd': $('#id_indikator_hapus').val()
      },
      success: function(data) {
        $('#ModalIndikator').modal('hide');
        $('#tblIndikatorRKPD').DataTable().ajax.reload(null,false);
        $('#tblProgramRKPD').DataTable().ajax.reload(null,false);
        if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
      }
    });
  });



  $(document).on('click', '.add-programrkpd', function() {
    
      $('.btnProgram').removeClass('editProgramRKPD');
      $('.btnProgram').addClass('addProgramRkpd');
      $('.modal-title').text('Tambah Data Program RKPD');
      $('.form-horizontal').show();
      $('#id_rkpd_ranwal_program').val(null);
      $('#no_urut_program').val(null);
      $('#jns_belanja').val(0);
      $('#ur_program_rkpd').val(null);
      $('#pagu_rpjmd_program').val(0);
      $('#pagu_opd_program').val(0);
      $('#pagu_rkpd_program').val(0);
      $('#keterangan_status_program').val(null);
      $('#thn_id_rpjmd').val(null);
      $('#id_visi_rpjmd').val(null);
      $('#id_misi_rpjmd').val(null);
      $('#id_tujuan_rpjmd').val(null);
      $('#id_sasaran_rpjmd').val(null);
      $('#id_program_rpjmd').val(null);
      $('#ur_program_rpjmd').val(null);
      $('.idStatusPelaksanaan').hide();
      $('.idStatusUsulan').hide();
      $('.btnHapus').hide();
      $('.KetPelaksanaan').show();
      $('.btnCariProgram').show();

      document.getElementById("keterangan_status_program").removeAttribute("disabled");
      document.getElementById("no_urut_program").removeAttribute("disabled");
      document.getElementById("ur_program_rkpd").removeAttribute("disabled");
      document.getElementById("jns_belanja").removeAttribute("disabled");

      $(".skegiatan").attr('disabled', true);
      $(".usulan").attr('disabled', true);

      document.frmEditProgram.status_usulan_program[0].checked=true;
      document.frmEditProgram.status_pelaksanaan_program[5].checked=true;

      $('#EditProgram').modal('show');

  });

  $('.modal-footer').on('click', '.addProgramRkpd', function() {

      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: 'musrenrkpd/addProgramRkpd',
          data: {
              '_token': $('input[name=_token]').val(),
              'no_urut': $('#no_urut_program').val(),
              'uraian_program_rpjmd': $('#ur_program_rkpd').val(),
              'pagu_ranwal': $('#pagu_rkpd_program').val(),
              'jenis_belanja': $('#jns_belanja').val(),
              'ket_usulan': $('#keterangan_status_program').val(),
              'thn_id_rpjmd':$('#thn_id_rpjmd').val(),
              'id_visi_rpjmd':$('#id_visi_rpjmd').val(),
              'id_misi_rpjmd':$('#id_misi_rpjmd').val(),
              'id_tujuan_rpjmd':$('#id_tujuan_rpjmd').val(),
              'id_sasaran_rpjmd':$('#id_sasaran_rpjmd').val(),
              'id_program_rpjmd':$('#id_program_rpjmd').val(),
          },
          success: function(data) {
              $('#tblProgramRKPD').DataTable().ajax.reload(null,false);
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
          }
      });
  });

  $(document).on('click', '.edit-program', function() {
        
    var data = progrkpd.row( $(this).parents('tr') ).data();
        
      $('.btnProgram').removeClass('addProgramRkpd');
      $('.btnProgram').addClass('editProgramRKPD');
      $('.modal-title').text('Edit dan Reviu Program Musrenbang RKPD');
      $('.idStatusUsulan').hide();
      $('.form-horizontal').show();
      $('#id_rkpd_ranwal_program').val(data.id_musrenkab);
      $('#jns_belanja').val(data.jenis_belanja);
      $('#thn_id_rpjmd').val(data.thn_id_rpjmd);
      $('#id_visi_rpjmd').val(data.id_visi_rpjmd);
      $('#id_misi_rpjmd').val(data.id_misi_rpjmd);
      $('#id_tujuan_rpjmd').val(data.id_tujuan_rpjmd);
      $('#id_sasaran_rpjmd').val(data.id_sasaran_rpjmd);
      $('#id_program_rpjmd').val(data.id_program_rpjmd);
      $('#ur_program_rpjmd').val(data.program_pemda);
      
      if(data.sumber_data==1){        
        document.getElementById("no_urut_program").removeAttribute("disabled");
        document.getElementById("ur_program_rkpd").removeAttribute("disabled");
        document.getElementById("jns_belanja").removeAttribute("disabled");
      } else {
        document.getElementById("no_urut_program").setAttribute("disabled","disabled");
        document.getElementById("ur_program_rkpd").setAttribute("disabled","disabled");
        document.getElementById("jns_belanja").setAttribute("disabled","disabled");
      }

       $('#no_urut_program').val(data.urut);
      $('#ur_program_rkpd').val(data.uraian_program_rpjmd);
      $('#pagu_rpjmd_program').val(data.pagu_rpjmd);
      $('#pagu_rkpd_program').val(data.pagu_ranwal);
      $('#pagu_opd_program').val(data.pagu_prog_renja);
      $('#keterangan_status_program').val(data.ket_usulan);

      document.frmEditProgram.status_usulan_program[data.status_data].checked=true;

      if(data.status_pelaksanaan==4){
          document.frmEditProgram.status_pelaksanaan_program[5].checked=true;
          document.frmEditProgram.status_pelaksanaan_program[5].style.visibility='hidden';        
          document.getElementById("status_pelaksanaan4").style.visibility='hidden';
          $('.idStatusPelaksanaan').hide();        
          $('.btnHapus').show();
          $('.btnCariProgram').show();          
        } else {
            $('.idStatusPelaksanaan').show();
            if(data.status_pelaksanaan==5){
              document.frmEditProgram.status_pelaksanaan_program[4].checked=true;
            } else {
              document.frmEditProgram.status_pelaksanaan_program[data.status_pelaksanaan].checked=true;
            }            
            document.frmEditProgram.status_pelaksanaan_program[5].style.visibility='hidden';        
            document.getElementById("status_pelaksanaan4").style.visibility='hidden';
            $('.btnHapus').hide();
            $('.btnCariProgram').hide();
        }      

      if(data.status_pelaksanaan==0){
          document.getElementById("keterangan_status_program").setAttribute("disabled","disabled");
          $('.KetPelaksanaan').hide();
        } else {
            document.getElementById("keterangan_status_program").removeAttribute("disabled");
            $('.KetPelaksanaan').show();
        }

      $(".skegiatan").attr('disabled', false);
      $(".usulan").attr('disabled', false);

      $('#EditProgram').modal('show');
  });

$('.modal-footer').on('click', '.editProgramRKPD', function(){
    if ((getStatusData() == 0 || getStatusData() == 1)  && $('#pagu_rkpd_program').val() <= 0) {
      createPesan("Maaf Pagu RKPD Program tidak boleh 0 (Nol)","danger");
      return;
    } 
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: 'musrenrkpd/editProgramRKPD',
        data: {
            '_token': $('input[name=_token]').val(),
            'no_urut': $('#no_urut_program').val(),                          
            'jenis_belanja': $('#jns_belanja').val(),
            'id_musrenkab': $('#id_rkpd_ranwal_program').val(),
            'uraian_program_rpjmd': $('#ur_program_rkpd').val(),
            'pagu_rpjmd' : $('#pagu_rpjmd_program').val(),
            'pagu_ranwal': $('#pagu_rkpd_program').val(),
            'ket_usulan': $('#keterangan_status_program').val(),
            'status_data' : getStatusUsul(),
            'status_pelaksanaan' : getStatusData(),
            'thn_id_rpjmd':$('#thn_id_rpjmd').val(),
            'id_visi_rpjmd':$('#id_visi_rpjmd').val(),
            'id_misi_rpjmd':$('#id_misi_rpjmd').val(),
            'id_tujuan_rpjmd':$('#id_tujuan_rpjmd').val(),
            'id_sasaran_rpjmd':$('#id_sasaran_rpjmd').val(),
            'id_program_rpjmd':$('#id_program_rpjmd').val(),
        },
        success: function(data) {
            $('#tblProgramRKPD').DataTable().ajax.reload(null,false);
            if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
        }
      
  });

  });

  $(document).on('click', '.btnHapus', function() {
    $('.btnDelProgram').addClass('delProgramRKPD');
    $('.modal-title').text('Hapus Data Program RKPD Tambahan');
    $('#id_program_hapus').val($('#id_rkpd_ranwal_program').val());
    $('.ur_program_del').html($('#ur_program_rkpd').val());
    $('#HapusProgram').modal('show');
  });

  $('.modal-footer').on('click', '.delProgramRKPD', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      type: 'post',
      url: 'musrenrkpd/hapusProgramRKPD',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_musrenkab': $('#id_program_hapus').val()
      },
      success: function(data) {
        $('#EditProgram').modal('hide');
        $('#tblProgramRKPD').DataTable().ajax.reload(null,false);
        createPesan(data.pesan,"success");
      }
    });
  });

  $('.skegiatan').change(function() {
    if(document.frmEditProgram.status_pelaksanaan_program.value==0){
      document.getElementById("keterangan_status_program").setAttribute("disabled","disabled");
      document.getElementById("pagu_rkpd_program").removeAttribute("disabled");
      $('.KetPelaksanaan').hide();
    } else {
      document.getElementById("keterangan_status_program").removeAttribute("disabled");
      $('.KetPelaksanaan').show();
      if(document.frmEditProgram.status_pelaksanaan_program.value!=1){
        document.getElementById("pagu_rkpd_program").setAttribute("disabled","disabled");
        $('#pagu_rkpd_program').val(0);
      } else {
        document.getElementById("pagu_rkpd_program").removeAttribute("disabled");
      }
    }

  });

  function getStatusData(){

    var xCheck = document.querySelectorAll('input[name="status_pelaksanaan_program"]:checked');
    var xyz = [];
    for(var x = 0, l = xCheck.length; x < l;  x++)
      { xyz.push(xCheck[x].value); }
    var xvalues = xyz.join('');
    return xvalues;
  }

  function getStatusPelaksanaanUnit(){

    var xCheck = document.querySelectorAll('input[name="status_pelaksanaan_unit"]:checked');
    var xyz = [];
    for(var x = 0, l = xCheck.length; x < l;  x++)
      { xyz.push(xCheck[x].value); }
    var xvalues = xyz.join('');
    return xvalues;
  }

  function getHakAkses(){

    var xCheck = document.querySelectorAll('input[name="ophak_akses"]:checked');
    var xyz = [];
    for(var x = 0, l = xCheck.length; x < l;  x++)
      { xyz.push(xCheck[x].value); }
    var xvalues = xyz.join('');
    return xvalues;
  }


  function getStatusUsul(){

    var xCheck = document.querySelectorAll('input[name="status_usulan_program"]:checked');
    var xyz = [];
    for(var x = 0, l = xCheck.length; x < l;  x++)
      { xyz.push(xCheck[x].value); }
    var xvalues = xyz.join('');
    return xvalues;
  }

  $(document).on('click', '.btnCariUnit', function() { 
    LoadCariUnit();   
    $('#cariRefUnit').modal('show');

    // $('#tblCariUnit').DataTable().ajax.reload(null,false);
  });

var cariunit;
function LoadCariUnit(){
  cariunit = $('#tblCariUnit').DataTable( {
        processing: true,
        serverSide: true,
        dom: 'bfrtIp',
        "ajax": {"url": "./musrenrkpd/getRefUnit"},
        "columns": [
              { data: 'no_urut', sClass: "dt-center"},
              { data: 'kd_unit', sClass: "dt-center"},
              { data: 'nm_unit'}
            ],
      "order": [[0, 'asc']],
      "bDestroy": true
    });
};

  $('#tblCariUnit tbody').on( 'dblclick', 'tr', function () {

    var data = cariunit.row(this).data();

    document.getElementById("unit_pelaksana_rkpd").value = data.nm_unit;
    document.getElementById("id_unit_rkpd").value = data.id_unit;
    $('#cariRefUnit').modal('hide');    

  } );

  $(document).on('click', '.btnCariIndi', function() {    
    
    LoadCariIndikator();
    $('#cariIndikator').modal('show');

    // $('#tblCariIndikator').DataTable().ajax.reload(null,false);
  });

var cariindikator;
function LoadCariIndikator(){
  cariindikator = $('#tblCariIndikator').DataTable( {
        processing: true,
        serverSide: true,
        dom: 'bfrtIp',
        "ajax": {"url": "./admin/parameter/getRefIndikator"},
        "columns": [
              { data: 'no_urut', sClass: "dt-center"},
              { data: 'nm_indikator'},
              { data: 'jenis_display', sClass: "dt-center"},
              { data: 'sifat_display', sClass: "dt-center"}
            ],
      "order": [[0, 'asc']],
      "bDestroy": true
    });
};

  $('#tblCariIndikator tbody').on( 'dblclick', 'tr', function () {
    var data = cariindikator.row(this).data();
    document.getElementById("ur_indikator_rkpd").value = data.nm_indikator;
    document.getElementById("kd_indikator_rkpd").value = data.id_indikator;
    document.getElementById("id_satuan_output").value = data.id_satuan_output;
    $('#cariIndikator').modal('hide');
  });

$(document).on('click', '.btnCariProgram', function() {    
    
  LoadCariProgram();
  $('#cariProgramRPJMD').modal('show');
    // $('#tblCariProgramRPJMD').DataTable().ajax.reload(null,false);
  });

var cariprogram;

function LoadCariProgram(){
  cariprogram = $('#tblCariProgramRPJMD').DataTable( {
        processing: true,
        serverSide: true,
        dom: 'bfrtIp',
        "ajax": {"url": "./musrenrkpd/getRefProgramRPJMD"},
        "columns": [
              { data: 'no_urut', sClass: "dt-center"},
              { data: 'kd_program_rpjmd', sClass: "dt-center"},
              { data: 'uraian_program_rpjmd'}
            ],
      "order": [[0, 'asc']],
      "bDestroy": true
    });
};

  $('#tblCariProgramRPJMD tbody').on( 'dblclick', 'tr', function () {

    var data = cariprogram.row(this).data();

    document.getElementById("thn_id_rpjmd").value = data.thn_id;
    document.getElementById("id_visi_rpjmd").value = data.id_visi_rpjmd;
    document.getElementById("id_misi_rpjmd").value = data.id_misi_rpjmd;
    document.getElementById("id_tujuan_rpjmd").value = data.id_tujuan_rpjmd;
    document.getElementById("id_sasaran_rpjmd").value = data.id_sasaran_rpjmd;
    document.getElementById("id_program_rpjmd").value = data.id_program_rpjmd;
    document.getElementById("ur_program_rpjmd").value = data.uraian_program_rpjmd;
    $('#cariProgramRPJMD').modal('hide');    

  });

  $( ".kd_urusan" ).change(function() {
      
      $.ajax({

          type: "GET",
          url: './admin/parameter/getBidang/'+$('.kd_urusan').val(),
          dataType: "json",

          success: function(data) {

          var j = data.length;
          var post, i;

          $('select[name="kd_bidang"]').empty();
          $('select[name="kd_bidang"]').append('<option value="-1">---Pilih Kode Bidang---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="kd_bidang"]').append('<option value="'+ post.id_bidang +'">'+ post.nm_bidang +'</option>');
          }
          }
      });
    });

$(document).on('click', '#btnUnProgram', function() {

  var data = progrkpd.row( $(this).parents('tr') ).data();

    $('#id_program_ranwal_posting').val(data.id_musrenkab);
    $('#status_program_ranwal_posting').val(data.status_data);
    $('#tahun_ranwal_posting').val(data.tahun_rkpd);

    document.getElementById("ur_program_ranwal_posting").innerHTML = data.uraian_program_rpjmd;

    if(data.status_data==0){
        document.getElementById("ur_status_ranwal_posting").innerHTML = "Posting";
    } else {
        document.getElementById("ur_status_ranwal_posting").innerHTML = "Un-Posting";
    }

    $('#StatusProgram').modal('show');
});

$('.modal-footer').on('click', '#btnPostProgram', function() {
      var status_post;
      if($('#status_program_ranwal_posting').val()==0){
          status_post = 1
      } else {
          status_post = 0
      };

      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: 'musrenrkpd/postProgram',
          data: {
              '_token': $('input[name=_token]').val(),
              'tahun_rkpd': $('#tahun_ranwal_posting').val(),
              'id_rkpd_ranwal': $('#id_program_ranwal_posting').val(),
              'status_data': status_post,
          },
          success: function(data) {
              progrkpd.ajax.reload(null,false);
              if(data.status_pesan==1){
              createPesan(data.pesan,"success");
              } else {
              createPesan(data.pesan,"danger"); 
              }
              $('#StatusProgram').modal('hide');
          }
      });
    });

$(document).on('click', '#btnReviuPelaksana', function() {
  var rows_selected = PelaksanaTable.column(0).checkboxes.selected();
  var counts_selected = rows_selected.count(); 
  var rows_data = PelaksanaTable.rows({ selected: true }).data(); 
  var counts_data = PelaksanaTable.rows({ selected: true }).count();  
  if (rows_selected.count() == 0) {
    createPesan("Data belum ada yang dipilih","danger");
    return;
  }; 

  $.each(rows_selected, function(index, rowId){
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });         
    $.ajax({
            type: 'POST',
            url: 'musrenrkpd/postPelaksanaRKPD',
            data: {
                '_token': $('input[name=_token]').val(),
                'status_data':rows_data[index].status_data,
                'id_unit':rows_data[index].id_unit,
                'id_pelaksana_rkpd' : rowId,
            },
            success: function(data) {
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
              } else {
                createPesan(data.pesan,"danger"); 
              }
              PelaksanaTable.ajax.reload(null,false);
              progrkpd.ajax.reload(null,false);
            },
            error: function(data){
              createPesan(data.pesan,"danger");
              PelaksanaTable.ajax.reload(null,false);
              progrkpd.ajax.reload(null,false);
            }
    });
  });
  e.preventDefault();  
});

$(document).on('click', '#btnReviuIndikator', function() {
   var rows_selected = indiProg_tbl.column(0).checkboxes.selected();
  var counts_selected = rows_selected.count(); 
  var rows_data = indiProg_tbl.rows({ selected: true }).data(); 
  var counts_data = indiProg_tbl.rows({ selected: true }).count();  
  if (rows_selected.count() == 0) {
    createPesan("Data belum ada yang dipilih","danger");
    return;
  }; 

  $.each(rows_selected, function(index, rowId){
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });         
    $.ajax({
            type: 'POST',
            url: 'musrenrkpd/postIndikatorRKPD',
            data: {
                '_token': $('input[name=_token]').val(),
                'status_data':rows_data[index].status_data,
                'id_indikator_program_rkpd' : rowId,
            },
            success: function(data) {
              createPesan(data.pesan,"success");
              indiProg_tbl.ajax.reload(null,false);
              progrkpd.ajax.reload(null,false);
            },
            error: function(data){
              createPesan(data.pesan,"danger");
              indiProg_tbl.ajax.reload(null,false);
              progrkpd.ajax.reload(null,false);
            }
    });
  });
  e.preventDefault();  
});

$(function(){
        $.ajax({
          type: "GET",
          url: './admin/parameter/getRefSatuan',
          dataType: "json",
          success: function(data) {

          // console.log(data)  

          var j = data.length;
          var post, i;

          $('select[name="id_satuan_output"]').empty();
          $('select[name="id_satuan_output"]').append('<option value="">--Pilih Satuan Indikator--</option>');

          for (i = 0; i < j; i++) {
              post = data[i];
              $('select[name="id_satuan_output"]').append('<option value="'+ post.id_satuan +'">'+ post.uraian_satuan +'</option>');
            }
              
          }
      });
  });

});

</script>