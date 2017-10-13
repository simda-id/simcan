@extends('layouts.app0')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ul class="breadcrumb">
          <li><a href="{{ url('/') }}">Standar Satuan Harga</a></li>
          <li class="active">Golongan</li>
        </ul>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h2 class="panel-title">Golongan SSH</h2>
          </div>

          <div class="panel-body">
            <p><a class="btn btn-sm btn-primary">Tambah</a></p>

            {!! $html->table(['class'=>'table-striped table-bordered'], false) !!}

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
   {!! $html->scripts() !!}
@endsection
