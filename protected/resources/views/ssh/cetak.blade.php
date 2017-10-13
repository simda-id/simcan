@extends('layouts.app0')

@section('content')
  <div class="container row col-sm-12">
    <ul class="breadcrumb">
      <li><a href="{{ url('/modul0') }}">SSH</a></li>
      <li class="active">SSH</li>
    </ul>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h2 class="panel-title">Pencetakan Standar Satuan Harga</h2>
      </div>

      <div class="panel-body">
        <div class="printGolongan">
            <p><a class="print-golongan btn btn-sm btn-success" href="{{ url('/printGolonganSsh')}}"><i class="glyphicon glyphicon-print"></i>  Cetak</a></p>
            <table class="table table-condensed table-responsive" cellspacing="0" width="100%">
            <tr>
              <td width="20%"> <label>Jenis Dokumen SSH</label></td>
              <td width="1%"> : </td>
              <td>
                <select class="form-control" id="id_cetak" name="tahun">
                  <option value="1">Cetak Golongan SSH</option>
                  <option value="2">Cetak Kelompok SSH</option>
                  <option value="3">Cetak Sub Kelompok SSH</option>
                  <option value="4">Cetak Item SSH</option>
                  <option value="5">Cetak Perkada SSH</option>
                </select>
            </td>
            <tr>
              <td width="20%"> <label>Nomor Perkada SSH</label></td>
              <td width="1%"> : </td>
              <td>
                <select class="form-control" name="id_perkada" id="id_perkada">
                 @foreach($refperkada as $val)
                    <option value={{ $val->id_perkada }}>{{ $val->nomor_perkada }}</option>
                 @endforeach
               </select>
            </td>
            </table>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
<script type="text/javascript" language="javascript" class="init">
$(document).ready(function() {

});
</script>
@endsection
