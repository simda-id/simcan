<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app4')
@section('content')	
<div class="col-sm-12 col-md-12 col-lg-12">	
    <div class="panel panel-primary">
        <div class="panel-heading"> 
                <div class="row">
                    @foreach($dok as $doks)
                        <div class="col-lg-10 text-left"><h4>Pohon Kinerja Dokumen RPJMD Nomor : {{$doks->no_perda}}</h4></div>
                    @endforeach
                    <div class="col-lg-2 text-right">
                        <a href="{{url('/pokin')}}" id="btnBatal" type="button" class="btn btn-sm btn-danger btn-labeled">
                        <span class="btn-label"><i class="fa fa-undo fa-lg fa-fw"></i></span>Kembali</a>
                    </div>
                </div>
            
        </div>
        <div class="panel-body" style="background: white">
            <div id="pk" style="width: 100%;height: 100%;"></div>
        </div>
    </div>
</div>
@endsection

@section('css')
  <link rel="stylesheet" href="{{ asset('assets/orgchart/css/jquery.orgchart.css') }}">
  <style type="text/css">
    .orgchart { background: #fff; }
    .orgchart td.left, .orgchart td.right, .orgchart td.top { border-color: #aaa; }
    .orgchart td>.down { background-color: #aaa; }
    .orgchart .level1 .title { background-color: #006699; }
    .orgchart .level1 .content { border-color: #006699; }
    .orgchart .level2 .title { background-color: #009933; }
    .orgchart .level2 .content { border-color: #009933; }
    .orgchart .level3 .title { background-color: #993366; }
    .orgchart .level3 .content { border-color: #993366; }
    .orgchart .level4 .title { background-color: #996633; }
    .orgchart .level4 .content { border-color: #996633; }
    .orgchart .level5 .title { background-color: #cc0066; }
    .orgchart .level5 .content { border-color: #cc0066; }
  </style>
@endsection

@section('scripts')

<script type="text/javascript" src="{{ asset('assets/orgchart/js/jquery.orgchart.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/orgchart/js/html2canvas.min.js')}}"></script>

  <script type="text/javascript">
    $(function() {

    var datascource = {
      @foreach($data as $datas)
        'name': 'Visi',
        'title': '{{ $datas->uraian_visi_rpjmd }}',
        'className': 'level1',
        'nodeTitle': 'name',
        'nodeContent': 'title',
        'children': [
            @foreach($datas->TrxRpjmdMisis as $misi)
                {'name': 'Misi {{ $misi->no_urut }}','title': '{{ $misi->uraian_misi_rpjmd}}','className': 'level2',
                'children': [
                    @foreach($misi->TrxRpjmdTujuans as $tujuan)
                        {'name': 'Tujuan {{ $tujuan->no_urut }}','title': '{{ $tujuan->uraian_tujuan_rpjmd}}','className': 'level3',
                        'children': [
                            @foreach($tujuan->TrxRpjmdSasarans as $sasaran)
                                {'name': 'Sasaran {{ $sasaran->no_urut }}','title': '{{ $sasaran->uraian_sasaran_rpjmd}}','className': 'level4',
                                'children': [
                                    @foreach($sasaran->TrxRpjmdPrograms as $program)
                                        {'name': 'Program {{ $program->no_urut }}','title': '{{ $program->uraian_program_rpjmd}}',},
                                    @endforeach
                                ]},
                            @endforeach
                        ]},
                    @endforeach
                    ]},
            @endforeach
        ]
      @endforeach
     };

    var oc = $('#pk').orgchart({
        'data' : datascource,
        'nodeContent': 'title',
        'pan': true,
        'zoom': true,        
        'exportButton': true,
        'exportFilename': 'ChartRPJMD'
    });
    oc.hideChildren(oc.$chartContainer.find('.node:first'));
    oc.$chartContainer.on('touchmove', function(event) {
      event.preventDefault();
    });

  });
  </script>

@endsection