    <div id="EditProgram" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
              <form name="frmEditProgram" class="form-horizontal" role="form" autocomplete='off' action="{{-- {{url('/ranwalrkpd/blangsung/tambahProgramRKPD')}} --}}" method="post" onsubmit="return false;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="id_rkpd_ranwal_program" name="id_rkpd_ranwal_program">
                <div class="form-group">
                  <label class="control-label col-sm-3" for="id">No Urut :</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control no_prog" name="no_urut_program" id="no_urut_program" disabled>
                  </div>
                  </div>
                  <div class="form-group">
                  <label class="control-label col-sm-3" for="title">Uraian Program RKPD:</label>
                  <div class="col-sm-8">
                    <textarea type="name" class="form-control ur_prog" name="ur_program_rkpd" id="ur_program_rkpd" rows="3" disabled></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="pagu_rpjmd_program" class="col-sm-3 control-label" align='left'>Pagu RPJMD :</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control number" id="pagu_rpjmd_program" name="pagu_rpjmd_program" disabled >
                  </div>
                  <label for="pagu_rkpd_program" class="col-sm-2 control-label" align='left'>Pagu RKPD :</label>
                  <div class="col-sm-3">
                    <div class="input-group">
                      <input type="text" class="form-control" id="pagu_rkpd_program" name="pagu_rkpd_program" required="required" >
                      <span class="input-group-addon">
                        <a href="#" data-toggle="popover" data-container="body" title="Pagu RKPD" data-trigger="hover" data-content="Diisi dengan jumlah pagu yang akan dianggarkan pada tahun berjalan, jumlahnya bisa lebih besar maupun lebih kecil dari pagu di RPJMD"><i class="glyphicon glyphicon-question-sign"></i></a>
                      </span>
                    </div>                    
                  </div>
                </div>
                <div class="form-group idStatusPelaksanaan" id="idStatus">
                  <label for="status_pelaksanaan_program" class="col-sm-3 control-label" align='left'>Status Pelaksanaan :</label>
                  <div class="col-sm-8" id="myRadio">
                      <label class="radio-inline">
                        <input type="radio" class="skegiatan" name="status_pelaksanaan_program" id="status_pelaksanaan_program" value="0">Tepat Waktu
                      </label>
                      <label class="radio-inline">
                        <input type="radio" class="skegiatan" name="status_pelaksanaan_program" id="status_pelaksanaan_program" value="1">Dimajukan
                      </label>
                      <label class="radio-inline">
                        <input type="radio" class="skegiatan" name="status_pelaksanaan_program" id="status_pelaksanaan_program" value="2">Ditunda
                      </label>
                      <label class="radio-inline">
                        <input type="radio" class="skegiatan" name="status_pelaksanaan_program" id="status_pelaksanaan_program" value="3">Dibatalkan
                      </label>
                      <label class="radio-inline" id="status_pelaksanaan4">
                        <input type="radio" class="skegiatan" name="status_pelaksanaan_program" id="status_pelaksanaan_program" value="4">Baru
                      </label>
                  </div>
                </div>
                <div class="form-group KetPelaksanaan">
                  <label for="keterangan_status_program" class="col-sm-3 control-label" align='left'>Keterangan Pelaksanaan :</label>
                  <div class="col-sm-8">
                    <textarea type="text" class="form-control keterangan_status_program" name="keterangan_status_program" id="keterangan_status_program" rows="3" disabled></textarea>
                  </div>
                </div>
                <div class="form-group idStatusUsulan"> 
                  <label for="status_usulan_program" class="col-sm-3 control-label" align='left'>Status Usulan :</label>                 
                  <div class="col-sm-6">
                    <label class="radio-inline">
                      <input type="radio" class="usulan" name="status_usulan_program" id="status_usulan_program" value="0">Draft
                    </label>
                    <label class="radio-inline">
                      <input type="radio" class="usulan" name="status_usulan_program" id="status_usulan_program" value="1">Final
                    </label>
                  </div>
                </div>
              </form>
              <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapus">
                        <button class="btn btn-sm btn-danger btnHapus"><span id="footer_action_button" class="glyphicon glyphicon-trash"></span> Hapus</button>
                    </div>
                    <div class="col-sm-10 text-right">
                         <button type="submit" class="btn btn-sm btn-primary btnProgram" data-dismiss="modal"><span id="footer_action_button" class="glyphicon glyphicon-save"></span> Simpan</button>
                        <button type="button" class="btn btn-sm btn-warning" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-log-out"></i> Tutup</button>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

        <!--Modal Aktivitas-->
  <div id="HapusProgram" class="modal fade" role="dialog" tabindex="-1" data-focus-on="input:first">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id_program_hapus" name="id_program_hapus">
            <div class="deleteContent">
                Yakin akan menghapus Program RKPD : <strong><span class="ur_program_del"></span></strong> yang merupakan penambahan program baru ?
                <br>
                <br>
                <strong>Catatan : Penghapusan data ini mempengaruhi terhadap data turunannya yang ada ikut terhapus.....!!!!</strong>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-danger btnDelProgram" data-dismiss="modal" ><span class="glyphicon glyphicon-trash"></span> Hapus</button>
            <button type="button" class="btn btn-sm btn-warning" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-log-out"></i> Tutup</button>
          </div>
        </div>
      </div>
    </div>
  </div>


@section('scripts')
<script type="text/javascript">

$(document).ready(function() {
  
  // $('[data-toggle="tooltip"]').tooltip();

  $('[data-toggle="popover"]').popover();

  var temp_rkpd_ranwal;


  $(document).on('click', '.add-programrkpd', function() {
      $('.btnProgram').addClass('btn-success');
      $('.btnProgram').removeClass('btn-danger');
      $('.btnProgram').removeClass('editProgramRKPD');
      $('.btnProgram').addClass('addProgramRkpd');
      $('.modal-title').text('Tambah Data Program RKPD');
      $('.form-horizontal').show();
      $('#id_rkpd_ranwal_program').val(null);
      $('#no_urut_program').val(null);
      $('#ur_program_rkpd').val(null);
      $('#pagu_rpjmd_program').val(0);
      $('#pagu_rkpd_program').val(0);
      $('#keterangan_status_program').val(null);
      $('.idStatusPelaksanaan').hide();
      $('.idStatusUsulan').hide();
      $('.idbtnHapus').hide();
      $('.KetPelaksanaan').show();

      document.getElementById("keterangan_status_program").removeAttribute("disabled");
      document.getElementById("no_urut_program").removeAttribute("disabled");
      document.getElementById("ur_program_rkpd").removeAttribute("disabled");

      $(".skegiatan").attr('disabled', true);
      $(".usulan").attr('disabled', true);

      document.frmEditProgram.status_usulan_program[0].checked=true;
      document.frmEditProgram.status_pelaksanaan_program[4].checked=true;

      $('#EditProgram').modal('show');

  });

    $('.modal-footer').on('click', '.addProgramRkpd', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: 'blangsung/tambahProgramRKPD',
          data: {
              '_token': $('input[name=_token]').val(),
              'no_urut': $('#no_urut_program').val(),
              'uraian_program_rpjmd': $('#ur_program_rkpd').val(),
              'pagu_ranwal': $('#pagu_rkpd_program').val(),
              'ket_usulan': $('#keterangan_status_program').val(),
          },
          success: function(data) {
              $('#tblProgramRKPD').DataTable().ajax.reload();
          }
      });
  });

  $(document).on('click', '.edit-program', function() {
      $('.btnProgram').addClass('btn-success');
      $('.btnProgram').removeClass('btn-danger');
      $('.btnProgram').removeClass('addProgramRkpd');
      $('.btnProgram').addClass('editProgramRKPD');
      $('.modal-title').text('Edit dan Reviu Program RKPD');
      // $('.idStatusPelaksanaan').show();
      $('.idStatusUsulan').show();
      // $('.KetPelaksanaan').show();
      $('.form-horizontal').show();
      $('#id_rkpd_ranwal_program').val($(this).data('id_rkpd_ranwal'));
      
      if($(this).data('sumber_data')==1){        
        document.getElementById("no_urut_program").removeAttribute("disabled");
        document.getElementById("ur_program_rkpd").removeAttribute("disabled");
      } else {
        document.getElementById("no_urut_program").setAttribute("disabled","disabled");
        document.getElementById("ur_program_rkpd").setAttribute("disabled","disabled");
        // document.frmEditProgram.status_pelaksanaan_program[$(this).data('status_data')].checked=true;
      }

      $('#no_urut_program').val($(this).data('no_urut'));
      $('#ur_program_rkpd').val($(this).data('uraian_program_rpjmd'));
      $('#pagu_rpjmd_program').val($(this).data('pagu_rpjmd'));
      $('#pagu_rkpd_program').val($(this).data('pagu_ranwal'));
      $('#keterangan_status_program').val($(this).data('ket_usulan'));

      document.frmEditProgram.status_usulan_program[$(this).data('status_usulan')].checked=true;

      if($(this).data('status_data')==4){
          $('.idStatusPelaksanaan').hide();        
          $('.idbtnHapus').show();
        } else {
            $('.idStatusPelaksanaan').show();
            document.frmEditProgram.status_pelaksanaan_program[$(this).data('status_data')].checked=true;
            document.frmEditProgram.status_pelaksanaan_program[4].style.visibility='hidden';        
            document.getElementById("status_pelaksanaan4").style.visibility='hidden';
            $('.idbtnHapus').hide();
        }      

      if($(this).data('status_data')==0){
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

    $('.modal-footer').on('click', '.editProgramRKPD', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: './editProgramRKPD',
          data: {
              '_token': $('input[name=_token]').val(),
              'no_urut': $('#no_urut_program').val(),
              'id_rkpd_ranwal': $('##id_rkpd_ranwal_program').val(),
              'uraian_program_rpjmd': $('#ur_program_rkpd').val(),
              'pagu_rpjmd' : $('#pagu_rpjmd_program').val();
              'pagu_ranwal': $('#pagu_rkpd_program').val(),
              'ket_usulan': $('#keterangan_status_program').val(),
              'status_usulan' : $('#status_usulan_program').val(),
              'status_data' : $('#status_pelaksanaan_program').val(),
          },
          success: function(data) {
              $('#tblProgramRKPD').DataTable().ajax.reload();
          }
      });
  });

  $(document).on('click', '.btnHapus', function() {
    $('.btnDelProgram').removeClass('btn-success');
    $('.btnDelProgram').addClass('btn-danger');
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
      url: 'blangsung/hapusProgramRKPD',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_rkpd_ranwal': $('#id_program_hapus').val()
      },
      success: function(data) {
        $('#EditProgram').modal('hide');
        $('#tblProgramRKPD').DataTable().ajax.reload();
      }
    });
  });

  $('.skegiatan').change(function() {
    if(document.frmEditProgram.status_pelaksanaan_program.value==0){
      document.getElementById("keterangan_status_program").setAttribute("disabled","disabled");
      $('.KetPelaksanaan').hide();
    } else {
      document.getElementById("keterangan_status_program").removeAttribute("disabled");
      $('.KetPelaksanaan').show();
    }
  });

} );
</script>
@endsection
