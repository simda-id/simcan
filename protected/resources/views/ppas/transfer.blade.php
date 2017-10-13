@extends('layouts.app2')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <ul class="breadcrumb">
          <li><a href="{{ url('/') }}">PPAS</a></li>
          <li class="active">Transfer Data Ke Simda Keuangan</li>
        </ul>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h2 class="panel-title">Proses Transfer Data</h2>
          </div>

          <div class="panel-body">
            <p><a class="btn btn-sm btn-primary" href="{{url('/forumskpd/tambah')}}">Proses</a></p>
            <table class="table table-condensed table-responsive" cellspacing="0" width="100%">
            <tr>
              <td width="19%"> <label>IP Server Keuangan</label></td>
              <td width="1%"> : </td>
              <td></td>
            </tr>
            <tr>
              <td> <label>Database</label></td>
              <td> : </td>
              <td></td>
            </tr>
            <tr>
              <td> <label>User SA</label></td>
              <td> : </td>
              <td></td>
            </tr>
            <tr>
              <td> <label>Password SA</label></td>
              <td> : </td>
              <td></td>
            </tr>
            <tr>

            </tr>
            <tr>
              <td> <label>Tahun PPAS</label></td>
              <td> : </td>
              <td></td>
            </tr>
            <tr>
              <td> <label>Organisasi Perangkat Daerah</label></td>
              <td> : </td>
              <td></td>
            </tr>
            </table>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection

@section('scripts')
{{--    {!! $html->scripts() !!}
 --}}@endsection
