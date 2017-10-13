@extends('layouts.app')
<script src="{{ asset('/js/jquery-3.1.1.min.js')}}"></script>
<script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
{{-- <script src="{{ asset('/vendor/datatables/formatted-numbers.js') }}"></script> --}}

<script type="text/javascript" language="javascript" class="init">
$(document).ready(function() {
      $('table.display').DataTable();



} );
</script>

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        {{-- <ul class="breadcrumb">
          <li><a href="{{ url('/') }}">Forum SKPD</a></li>
          <li class="active">Forum SKPD</li>
        </ul> --}}
        <div class="panel panel-default">
          <div class="panel-heading">
            <h2 class="panel-title">Detail Data Kegiatan Renja Final SKPD</h2>
          </div>


          <div class='panel-body'>
          <table class="table table-condensed" cellspacing="0" width="100%">
            <tr>
              <td width="19%"> <label>Tahun Perencanaan</label></td>
              <td width="1%"> : </td>
              <td>2017</td>
            </tr>
            <tr>
              <td > <label>Nomor Urut</label></td>
              <td> : </td>
              <td>1</td>
            </tr>
            <tr>
              <td> <label>Unit Pelaksana</label></td>
              <td> : </td>
              <td>DINAS PENDIDIKAN</td>
            </tr>
            <tr>
              <td> <label>ID Renja</label></td>
              <td> : </td>
              <td>1</td>
            </tr>
            <tr>
              <td> <label>Uraian Kegiatan</label></td>
              <td> : </td>
              <td>Pembangunan Sarana Pendidikan</td>
            </tr>
            <tr>
              <td> <label>Status Usulan</label></td>
              <td> : </td>
              <td> PROSES </td>
            </tr>
          </table>

          <h4>DETAIL DATA AKTIVITAS - PELAKSANA - LOKASI</h4>
          
          <br>
          <table id="tblLokasi" class="table display table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
                <thead>
                    <tr>
                      <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                      <th width="10%" style="text-align: center; vertical-align:middle">Sub Unit Pelaksana</th>
                      <th style="text-align: center; vertical-align:middle">Uraian Aktivitas Kegiatan</th>
                      <th style="text-align: center; vertical-align:middle">Lokasi Usulan</th>
                      <th style="text-align: center; vertical-align:middle">Output Usulan</th>
                      <th style="text-align: center; vertical-align:middle">Pagu Usulan</th>
                      <th style="text-align: center; vertical-align:middle">Sumber Usulan</th>
                      <th style="text-align: center; vertical-align:middle">Status Usulan</th>
                      <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                        {{-- @foreach($trxforumskpd as $forums) --}}
                            <tr>
                                <th width="5%" style="text-align: center">1{{-- {{$forums->no_urut}} --}}</th>
                                <th width="5%" style="text-align: center">UPT Kecamatan Simorejo{{-- {{$forums->id_unit}} --}}</th>
                                <th> Pembangunan RKB SDN Pout 1{{-- {{$forums->uraian_kegiatan_renstra}} --}}</th>
                                <th style="text-align: center"> Desa Pout{{-- {{$forums->pagu_tahun_kegiatan}} --}}</th>
                                <th style="text-align: center"> 2{{-- {{$forums->status_data}} --}}</th>
                                <th style="text-align: center"> 135.000.000{{-- {{$forums->status_data}} --}}</th>
                                <th style="text-align: center"> Musrenbang{{-- {{$forums->status_data}} --}}</th>
                                <th style="text-align: center"> Proses{{-- {{$forums->status_data}} --}}</th>
                                <th style="text-align: center">
                                  <div class="btn-group btn-group-action">
                                  <div class="btn-group">
                                      {{-- <button class="btn btn-primary btn-sm">Review</button> --}}
                                      <a class="btn dropdown-toggle btn-primary btn-xs" data-toggle="dropdown" aria-hidden="true">
                                       Review<span class="caret"></span></a>
                                        <ul class="dropdown-menu dropdown-menu-action" role="menu">
                                          <li><a title="persetujuan" href=""><i class="glyphicon glyphicon-thumbs-up"></i> Persetujuan Usulan</a></li>
                                          <li class="divider"></li>
                                          <li><a title="edit_data" data-toggle="modal" class="edit_data" data-id="" data-target="#PelaksanaModal" {{-- href="{{url('/forumskpd/tambah')}}" --}}><i class="glyphicon glyphicon-edit"></i> Edit Data Pelaksana</a></li>
                                          <li><a title="edit_lokasi" data-toggle="modal" class="edit_lokasi" data-id="" data-target="#LokasiModal" {{-- href="{{url('/forumskpd/tambah')}}" --}}><i class="glyphicon glyphicon-map-marker"></i> Edit Data Lokasi</a></li>
                                        </ul>    
                                  </div>
                                  </div>
                                </th>
                            </tr>
                        {{-- @endforeach --}}
                        </tbody>
          </table>
          </div>
          </div>
          <div class="panel-footer">
            {{-- <button type="submit" class="btn btn-sm btn-success">Save</button> --}}
            {{-- <button type="close" class="btn btn-sm btn-danger" href="{{url('/forumskpd')}}">Close</button> --}}
            <div class="back">
                <a href="{{url('/renjafinal')}}">
                <button class="btn btn-sm btn-danger" id="btn-back">
                <i class="glyphicon glyphicon-home"></i>  Kembali</button></a>
            </div>
          </div>
          
          </div>
        </div>
      </div>
    </div>
  </div>

<!--Modal Pelaksana -->

<div id="PelaksanaModal" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg"  >

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title">Detail Data Pelaksana Kegiatan</h3>
      </div>

    <!-- <form class="form-horizontal" role="form"> -->
      <div class="modal-body">
        <form class="form-horizontal" autocomplete='off' 
          method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
          
            <input type="hidden" name="id_forum_skpd" id="id_forum_skpd" />
          
          
            <div class="form-group">
            <label for="txt_no_urut" class="col-sm-3 control-label" align='left'>Nomor urut :</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="txt_no_urut" name="no_urut" required="required" value="1">
            </div>
          </div>
            
            <div class="form-group">
              <label for="txt_sub_unit" class="col-sm-3 control-label" align='left'>Sub Unit Pelaksana :</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="txt_sub_unit" name="sub_unit_pelaksana" disabled="disabled" required="required" value="UPT Kecamatan Simorejo">
            </div>
          </div> 
                    
          <div class="form-group">
            <label for="txt_nm_aktivitas_asb" class="col-sm-3 control-label" align='left'>Nama Aktivitas :</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="txt_nm_aktivitas_asb" name="nm_aktivitas_asb" required="required" value="Pembangunan RKB SDN Pout 1">
            </div>
          </div>
          
          <div class="form-group">
            <label for="txt_satuan_aktivitas" class="col-sm-3 control-label" align='left'>Satuan Aktivitas :</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="txt_satuan_aktivitas" name="satuan_aktivitas" required="required" value="ruang kelas">
            </div>
          </div>
          
          <div class="form-group">
            <label for="txt_diskripsi_aktivitas" class="col-sm-3 control-label" align='left' rows='5' type='textarea'>Deskripsi Aktivitas :</label>
            <div class="col-sm-7">
              <textarea rows="5" class="form-control" id="txt_diskripsi_aktivitas" name="diskripsi_aktivitas" required="required">Kondisi Rusak Berat karena Angin Puting Beliung</textarea>
            </div>
          </div>  
          
          <!-- Nav tabs -->
          {{-- <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#lokasi" aria-controls="indikator" role="tab" data-toggle="tab">Lokasi Aktivitas</a></li>
          </ul> --}}
      
        <!-- Tab panes -->
          {{-- <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="lokasi">
          <br>
          <p><a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#LokasiModal">Tambah Lokasi</a></p>

          <table class="table display table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id Lokasi</th>
                        <th>Uraian Lokasi</th>
                        <th>Sumber Usulan</th>
                        <th>Volume</th>
                        <th>Nilai Pagu</th>
                        <th>Status Lokasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
          </table>
          </div> --}}      

        <div class="form-group">
          <div class="modal-footer">
            <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Save</button>
            <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-log-out"></i> Close</button>
          </div>
        </div>
          
        </form>
      </div>
      
    </div>

  </div>
</div>

  <!-- Modal Lokasi -->

<div id="LokasiModal" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg"  >

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title">Detail Data Lokasi Kegiatan</h3>
      </div>

    <!-- <form class="form-horizontal" role="form"> -->
      <div class="modal-body">
        <form class="form-horizontal" autocomplete='off' 
          method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
          
            <input type="hidden" name="id_forum_skpd" id="id_forum_skpd" />
          
          
            <div class="form-group">
            <label for="txt_no_urut" class="col-sm-3 control-label" align='left'>Nomor urut :</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="txt_no_urut" name="no_urut" required="required" value="1">
            </div>
          </div>
                                
          <div class="form-group">
            <label for="txt_nm_aktivitas_asb" class="col-sm-3 control-label" align='left'>Nama Aktivitas :</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="txt_nm_aktivitas_asb" name="nm_aktivitas_asb" required="required" value="Pembangunan RKB SDN Pout 1">
            </div>
          </div>
          
          <div class="form-group">
            <label for="txt_satuan_aktivitas" class="col-sm-3 control-label" align='left'>Kecamatan :</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="txt_satuan_aktivitas" name="satuan_aktivitas" required="required" value="Simorejo">
            </div>
          </div>

          <div class="form-group">
            <label for="txt_satuan_aktivitas" class="col-sm-3 control-label" align='left'>Desa :</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="txt_satuan_aktivitas" name="satuan_aktivitas" required="required" value="Paut">
            </div>
          </div>

          <div class="form-group">
            <label for="txt_satuan_aktivitas" class="col-sm-3 control-label" align='left'>RT/RW :</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="txt_satuan_aktivitas" name="satuan_aktivitas" required="required" value="12">
            </div>
          </div>

          <div class="form-group">
            <label for="txt_satuan_aktivitas" class="col-sm-3 control-label" align='left'>Lokasi Non Kewilayahan :</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="txt_satuan_aktivitas" name="satuan_aktivitas" required="required" disabled="disabled">
            </div>
          </div>
          
          <div class="form-group">
            <label for="txt_diskripsi_aktivitas" class="col-sm-3 control-label" align='left' rows='5' type='textarea'>Keterangan Lokasi :</label>
            <div class="col-sm-7">
              <textarea rows="5" class="form-control" id="txt_diskripsi_aktivitas" name="diskripsi_aktivitas" required="required">
              </textarea>
            </div>
          </div>  
          
          <div class="form-group">
            <label for="txt_diskripsi_aktivitas" class="col-sm-3 control-label" align='left' rows='5' type='textarea'>Volume Usulan :</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="txt_diskripsi_aktivitas" name="diskripsi_aktivitas" required="required" value="2">
            </div>
            <label for="txt_diskripsi_aktivitas" class="col-sm-2 control-label" align='left' rows='5' type='textarea'>Volume Forum :</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="txt_diskripsi_aktivitas" name="diskripsi_aktivitas" required="required" value="2">
            </div>
          </div>

          <div class="form-group">
            <label for="txt_diskripsi_aktivitas" class="col-sm-3 control-label" align='left' rows='5' type='textarea'>Pagu Usulan :</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="txt_diskripsi_aktivitas" name="diskripsi_aktivitas" required="required" value="135.000.000">
            </div>
            <label for="txt_diskripsi_aktivitas" class="col-sm-2 control-label" align='left' rows='5' type='textarea'>Pagu Forum :</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="txt_diskripsi_aktivitas" name="diskripsi_aktivitas" required="required"
              value="135.000.000">
            </div>
          </div>
        
        <div class="form-group">
          <div class="modal-footer">
            <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Save</button>
            <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-log-out"></i> Close</button>
            {{-- <div class="back">
                <a href="{{url('/forumskpd/tambah')}}">
                <button class="btn btn-sm btn-block " id="btn-back">
                <i class="fa fa-reply fa-lg" aria-hidden="true"></i>Close</button></a>
            </div> --}}
          </div>
        </div>          
        </form>
      </div>     
    </div>
  </div>
</div> 

@endsection


