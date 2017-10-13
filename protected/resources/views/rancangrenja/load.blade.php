@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-8">
        <ul class="breadcrumb">
          <li><a href="{{ url('/') }}">RENJA</a></li>
          <li class="active">LOAD DATA RANCANGAN RENJA</li>
        </ul>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h2 class="panel-title">Proses Load Data Rancangan Renja dari Renstra SKPD</h2>
          </div>

          <div class="panel-body">
            {{-- <p><a class="btn btn-lg btn-primary" href="{{url('/forumskpd/tambah')}}"><i class="glyphicon glyphicon-download-alt"></i> Proses</a></p> --}}
            <table class="table table-condensed table-responsive" cellspacing="0" width="100%">
            <tr>
              <td width="20%"> <label>Tahun Perencanaan</label></td>
              <td width="1%"> : </td>
              <td>
                   <select class="form-control" id="id_tahun" name="tahun">
                      <option value="thn1">2017</option>
                      <option value="thn2">2018</option>
                      <option value="thn3">2019</option>
                      <option value="thn4">2020</option>
                      <option value="thn5">2020</option>
                  </select> 
            </td>
            </tr>
            <tr>
              <td width="20%"> <label>Unit Pelaksana</label></td>
              <td width="1%"> : </td>
              <td>
                <select class="form-control" id="id_unit" name="unit">
                    <?php foreach($unit as $val) { ?>
                      <option value="<?php echo $val->id_unit;?>"><?php echo $val->nm_unit;?> </option>
                    <?php } ?>
                </select>
              </td>
            </tr>
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

@section('scripts')
{{--    {!! $html->scripts() !!}
 --}}@endsection