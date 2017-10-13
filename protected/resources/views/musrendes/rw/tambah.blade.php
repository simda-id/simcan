@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        
        <div class="panel panel-default">
          <div class="panel-heading">
            <h2 class="panel-title">Detail Data Usulan Forum SKPD</h2>
          </div>


          <div class='panel-body'>

	        <form class="form-horizontal" autocomplete='off' 
          method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
          
            <input type="hidden" name="id_usulan_rw" id="id_usulan_rw" />
          
          
            <div class="form-group">
            <label for="txt_no_urut" class="col-sm-3 control-label" align='left'>Nomor urut :</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="txt_no_urut" name="no_urut" required="required" value="1">
            </div>
          </div>
            
            <div class="form-group">
              <label for="txt_nama_desa" class="col-sm-3 control-label" align='left'>Nama Desa :</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="txt_nama_desa" name="txt_nama_desa" disabled="disabled" required="required" value="Karang kidul">
            </div>
          </div> 
                    
          <div class="form-group">
            <label for="txt_rw" class="col-sm-3 control-label" align='left'>RW :</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="txt_rw" name="nm_rw" required="required" value="12">
            </div>
          </div>
          
          <div class="form-group">
            <label for="txt_id_aktivitas" class="col-sm-3 control-label" align='left'>Kode Aktivitas :</label>
            <div class="col-sm-7">
              <select class="form-control" id="id_asb_aktivitas" name="aktivitas_asb">
										  	</select>
            </div>
          </div>
          
          <div class="form-group">
            <label for="txt_diskripsi_aktivitas" class="col-sm-3 control-label" align='left' rows='5' type='textarea'>Uraian Aktivitas :</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="txt_diskripsi_aktivitas" name="diskripsi_aktivitas" required="required" value="Pembangunan Jalan di Lingkungan RW 12">
            </div>
          </div> 
          <div class="form-group">
            <label for="txt_diskripsi_aktivitas" class="col-sm-3 control-label" align='left' rows='5' type='textarea'>Volume Aktivitas :</label>
            <div class="col-sm-3">
              <input type="textarea" class="form-control" id="txt_diskripsi_aktivitas" name="diskripsi_aktivitas" required="required" value="100">
            </div>
          </div> 
          <div class="form-group">
            <label for="txt_diskripsi_aktivitas" class="col-sm-3 control-label" align='left' rows='5' type='textarea'>Jumlah Anggaran Aktivitas :</label>
            <div class="col-sm-3">
              <input type="textarea" class="form-control" id="txt_diskripsi_aktivitas" name="diskripsi_aktivitas" disabled="disabled" required="required" value="300.000.000">
            </div>
          </div>
          <div class="form-group">
            <label for="txt_diskripsi_aktivitas" class="col-sm-3 control-label" align='left' rows='5' type='textarea'>Keterangan Lainnya :</label>
            <div class="col-sm-7">
              <textarea rows="5" class="form-control" id="txt_diskripsi_aktivitas" name="diskripsi_aktivitas" required="required">Kondisi saat ini masih berupa jalan tanah</textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="txt_diskripsi_aktivitas" class="col-sm-3 control-label" align='left' rows='5' type='textarea'>Status Usulan :</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="txt_diskripsi_aktivitas" name="diskripsi_aktivitas" disabled="disabled" required="required" value="Usulan">
            </div>
          </div>

        {{-- <div class="form-group"> --}}
          <div class="modal-footer">
            <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-saved"></i> Save</button>
            {{-- <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true">Close</button> --}}
            <a href="{{url('/musrenrw')}}">
                <button class="btn btn-danger" data-dismiss="modal" {{-- id="btn-back" --}}>
                <i class="glyphicon glyphicon-home"></i>  Kembali</button></a>
          </div>
        {{-- </div>   --}}
        </form>

     </div> 
    </div>
  </div>
  </div>
</div>



@endsection




<script type="text/javascript" language="javascript" class="init">
$(document).ready(function() {
      $('table.display').DataTable();



} );
</script>


