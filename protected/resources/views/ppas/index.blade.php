@extends('layouts.app2')
<script src="{{ asset('/js/jquery-3.1.1.min.js')}}"></script>
<script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/vendor/datatables/formatted-numbers.js') }}"></script>

<script type="text/javascript" language="javascript" class="init">
$(document).ready(function() {
      $('table.display').DataTable();

      $('#').dataTable( {
            "columnDefs": [
                { "type": "formatted-num", targets: 0 }
            ]
        } );



} );
</script>

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ul class="breadcrumb">
          <li><a href="{{ url('/') }}">PPAS</a></li>
          <li class="active">DATA PPAS</li>
        </ul>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h2 class="panel-title">Daftar Kegiatan dalam PPAS</h2>
          </div>

          <div class="panel-body">
              <table id="tblForum" class="table display table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="10%" style="text-align: center; vertical-align:middle">No Urut</th>
                                <th width="10%" style="text-align: center; vertical-align:middle">Program RKPD</th>
                                <th width="10%" style="text-align: center; vertical-align:middle">Unit Pelaksana</th>
                                <th style="text-align: center; vertical-align:middle">Uraian Kegiatan</th>
                                <th width="15%" style="text-align: center; vertical-align:middle">Pagu Usulan Kegiatan</th>
                                <th width="10%" style="text-align: center; vertical-align:middle">Status Usulan</th>
                                <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        {{-- @foreach($trxforumskpd as $forums) --}}
                            <tr>
                                <th width="5%" style="text-align: center"></th>
                                <th width="5%" style="text-align: center"></th>
                                <th width="5%" style="text-align: center"></th>
                                <th></th>
                                <th style="text-align: right"></th>
                                <th style="text-align: center"></th>
                                <th style="text-align: center">
                                  <div class="btn-group btn-group-action">
                                  <div class="btn-group">
                                      <a class="btn dropdown-toggle btn-primary btn-xs" data-toggle="dropdown" aria-hidden="true">
                                       Review<span class="caret"></span></a>
                                        <ul class="dropdown-menu dropdown-menu-action" role="menu">
                                          <li><a title="persetujuan" href=""><i class="glyphicon glyphicon-thumbs-up"></i> Posting Keuangan</a></li>
                                          <li class="divider"></li>
                                          <li><a title="edit_data" data-toggle="modal" class="edit_data" data-id="" href="{{url('/ppas/edit')}}"><i class="glyphicon glyphicon-pencil"></i> Edit Data Detail PPAS</a></li>
                                        </ul>
                                  </div>
                                  </div>
                                </th>
                            </tr>
                        {{-- @endforeach --}}
                        </tbody>
                  </table>
          </div>

          <div class="panel-footer">
            <div class="back">
                <a href="{{url('/')}}">
                <button class="btn btn-sm btn-danger" id="btn-back">
                <i class="glyphicon glyphicon-home"></i>  Kembali</button></a>
            </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
