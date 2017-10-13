<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app')
@section('head')
    <link href="{{ asset('css/bootstrap-tabs-x.min.css') }}" media="all" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <?php
                $this->title = 'Rancangan Awal RKPD '.$title[0];
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = 'modul2';
                $breadcrumb->begin();
                $breadcrumb->add(['label' => 'RKPD']);
                $breadcrumb->add(['url' => '/ranwalrkpd', 'label' => 'Rancangan Awal RKPD']);
                $breadcrumb->add(['label' => $this->title]);
                $breadcrumb->end();
            ?>          
        </div>
    </div>

    <div class="row">
        <div class="col-md-10">
            <!-- Left Sideways Bordered -->
            <div class='tabs-x tabs-above tab-bordered tabs-krajee'>
                <ul id="myTab-19" class="nav nav-tabs" role="tablist">
                    <li id="tab-home" class="active"><a id="link-home" href="#home" role="tab" data-toggle="tab">Program</a></li>
                    <li id="tab-pelaksana"><a href="#pelaksana" role="tab-kv" data-toggle="tab">Kebijakan - Pelaksana - Indikator</a></li>
                </ul>
                <div id="myTabContent-19" class="tab-content">
                    <div class="tab-pane fade in active" id="home">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h2 class="panel-title">Daftar Usulan Rancangan Awal RKPD - {{ $title[0] }}</h2>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <a class="btn btn-primary btn-xs" href="#" data-href="{{ url('/ranwalrkpd/'.$title[1].'/tambah') }}" data-toggle="modal" data-target="#myModal" data-title="Tambah Program RKPD"><i class="glyphicon glyphicon-plus bg-white"></i> Tambah</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table id="ranwal-table" class="table table-striped table-bordered table-responsive">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center; vertical-align:middle">No Urut</th>
                                                    <th style="text-align: center; vertical-align:middle">Kode</th>
                                                    <th style="text-align: center; vertical-align:middle">Uraian Program</th>
                                                    <th style="text-align: center; vertical-align:middle">Pagu Program</th>
                                                    <th style="text-align: center; vertical-align:middle">Status Usulan</th>
                                                    <th style="text-align: center; vertical-align:middle">Aksi</th>
                                                </tr>
                                            </thead>
                                        </table>   
                                    </div>
                                </div>
                            </div>
                        </div>                    
                    </div>
                    <div class="tab-pane fade" id="pelaksana"><p>...</p></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/bootstrap-tabs-x.min.js') }}" type="text/javascript"></script>
<script>
    $(document).ready(function(){    
        // ajax for datatables
        $(function() {
            $('#ranwal-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ Request::url() }}',
                columns: [
                    { data: 'no_urut', name: 'no_urut' },
                    { data: 'id_program_rpjmd', name: 'id_program_rpjmd' },
                    { data: 'uraian_program_rpjmd', name: 'uraian_program_rpjmd' },
                    { 
                        data: 'pagu_program_rpjmd', 
                        name: 'pagu_program_rpjmd',
                        render: $.fn.dataTable.render.number( '.', ',', 0, 'Rp' ),
                        sClass: "dt-right" 
                    },
                    { 
                        data: 'status_data',
                        name: 'status_data',                       
                    },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
                aoColumnDefs: [
                    { sClass: "dt-center", aTargets: [ 0, 1, 4, 5 ] },
                    // { 
                    //     'render': function ( data, type, row, meta ) {
                    //         if(data == 'onsale_c') { 
                    //             return 'On-Sale Common'
                    //         }
                    //     }, 
                    //     aTargets: [ 4 ] 
                    // },
                ],
                createdRow: function( row, data, dataIndex ) {
                    $(row).attr('data-id', data.id_rkpd_ranwal);
                },
                fnRowCallback: function(nRow, aData, iDisplayIndex, iDisplayIndexFull){
                    var ajaxPelaksana = function(){
                        
                    }
                    $('#ranwal-table tbody').on('dblclick', 'tr', function(e){
                        var id = $(this).closest('tr').data('id');
                        var target = e.target
                        var link = '{{ $title[1] }}/'
                        // console.log(id)
                        // console.log(this)
                        // console.log(e.target)
                        if(e.target == target){ //actually, we should check if e.target == this. But after I checked it, this method didn't work, and I dunno why
                            var href = '{{ url('/ranwalrkpd/') }}/' + link + id + '/pelaksana';
                            $('#tab-home').removeClass('active');
                            // $('#tab-home').attr('class', 'disabled');
                            $('#tab-home').html('<a href=\"#home\"  data-toggle=\"tab\" role=\"tab\" title=\"program\"><i class=\"glyphicon glyphicon-home\"></i> Program</a>');
                            $('#tab-pelaksana').attr('class', 'active');

                            $('#link-home').click();
                            $('#home').removeClass('active in');
                            $('#pelaksana').addClass('active in');
                            $('#pelaksana').html('<i class=\"fa fa-spinner fa-spin\"></i>');
                            $.get(href).done(function(data){
                                $('#pelaksana').html(data);
                                // console.log('voila pelaksana');
                            });
                        }
                    });
                    $('#ranwal-table tbody').on('click', 'a', function(e){
                        var id = $(this).attr('id')
                        var target = e.target;
                        if(id) var id = id.split('-');
                        if(typeof id !== 'undefined' && id[0] == 'rincian'){
                            var href = $(this).data('href');
                            if(e.target == target){ //actually, we should check if e.target == this. But after I checked it, this method didn't work, and I dunno why
                                // var href = '{{ url('/ranwalrkpd/btl/') }}/' + id + '/pelaksana';
                                $('#tab-home').removeClass('active');
                                // $('#tab-home').attr('class', 'disabled');
                                $('#tab-home').html('<a href=\"#home\"  data-toggle=\"tab\" role=\"tab\" title=\"program\"><i class=\"glyphicon glyphicon-home\"></i> Program</a>');
                                $('#tab-pelaksana').attr('class', 'active');

                                $('#link-home').click();
                                $('#home').removeClass('active in');
                                $('#pelaksana').addClass('active in');
                                $('#pelaksana').html('<i class=\"fa fa-spinner fa-spin\"></i>');
                                $.get(href).done(function(data){
                                    $('#pelaksana').html(data);
                                    // console.log('voila pelaksana');
                                });
                            }
                        }
                    });                                        
                }
            });
        });

        //ajax for modaledit
        $('#myModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var modal = $(this);
            var title = button.data('title');
            var href = button.attr('href');
            href = button.data('href');
            modal.find('.modal-title').text(title);
            modal.find('.modal-body').html('<i class="fa fa-spinner fa-spin"></i>');
            $.get(href, function( data ) {
                modal.find(".modal-body").html(data);
            });            
            // $.post(href)
            //     .done(function( data ) {
            //         modal.find('.modal-body').html(data)
            // });
        })
        
            
    });
</script>
@endsection

<!-- Modal Group -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Title</h4>
      </div>
      <div class="modal-body">
            ....
      </div>
    </div>
  </div>
</div>