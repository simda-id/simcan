<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
use hoaaah\LaravelHtmlHelpers\Html;

?>
@extends('layouts.parameterlayout')

@section('content')

<!-- Modal Group -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">----</h4>
      </div>
      <div class="modal-body">
            ....
      </div>
    </div>
  </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-10">
            <?php
                $this->title = 'Program Kegiatan';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->begin();
                $breadcrumb->add(['label' => 'Parameter', 'url' => '/admin/parameter/']);
                $breadcrumb->add(['label' => $this->title]);
                $breadcrumb->end();
            ?>          
        </div>
    </div>
    <div class="col-md-10">
        <div class='tabs-x tabs-above tab-bordered tabs-krajee'>
            <ul id="myTab-19" class="nav nav-tabs" role="tablist">
                <li id="tab-home" class="active"><a id="link-home" href="#home" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-home"></i> Program</a></li>
                <li id="tab-kegiatan"><a href="#kegiatan" role="tab-kv" data-toggle="tab">Kegiatan</a></li>
            </ul>
            <div id="myTabContent-19" class="tab-content">
                <!-- tab home content-->
                <div class="tab-pane fade in active" id="home">    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?= $this->title ?></h3>
                        </div>
                        <div class="panel-body">
                            <!-- Button trigger modal -->
                            <div class="row">
                                <div class="col-md-12">
                                    <p>
                                    <?= Html::a('<i class="glyphicon glyphicon-plus"></i> Tambah Program', '#', [
                                            'title' => 'Tambah Program',
                                            'class' => 'btn btn-xs btn-success',
                                            'data-href' => url('/admin/parameter/program/tambah'),
                                            'data-title' => 'Tambah Program',
                                            'data-toggle' => 'modal',
                                            'data-target' => '#myModal',
                                    ]) ?>
                                    </p>
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="renja-table" class="table table-striped table-bordered table-responsive">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center; vertical-align:middle">Kode</th>
                                                <th style="text-align: center; vertical-align:middle">Bidang</th>
                                                <th style="text-align: center; vertical-align:middle">Program</th>
                                                <th style="text-align: center; vertical-align:middle">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($model as $data)
                                                <tr data-id =<?= $data->id_program ?>>
                                                    <td><?= $data->id_bidang ?>.<?= $data->id_program ?></td>
                                                    <td><?= $data->bidang->nm_bidang ?></td>
                                                    <td><?= $data->uraian_program ?></td>
                                                    <td>
                                                        <div style="display: flex;" class="btn-group">
                                                            <?= Html::a('<i class="glyphicon glyphicon-forward"></i>', '#', [
                                                                    'id' => 'rincButton-'.$data->id_program,
                                                                    'title' => 'Kegiatan',
                                                                    'class' => 'btn btn-xs btn-default',
                                                                    'data-href' => url('/admin/parameter/kegiatan/'.$data->id_program),
                                                            ]) ?>
                                                            <?= Html::a('<i class="glyphicon glyphicon-eye-open"></i>', '#', [
                                                                    'title' => 'Lihat Program',
                                                                    'class' => 'btn btn-xs btn-default',
                                                                    'data-href' => url('/admin/parameter/program/'.$data->id_program.'/view'),
                                                                    'data-title' => 'Lihat Program #'.$data->id_program,
                                                                    'data-toggle' => 'modal',
                                                                    'data-target' => '#myModal',
                                                            ]) ?>
                                                            <?= Html::a('<i class="glyphicon glyphicon-pencil"></i>', '#', [
                                                                    'title' => 'Ubah Program',
                                                                    'class' => 'btn btn-xs btn-default',
                                                                    'data-href' => url('/admin/parameter/program/'.$data->id_program.'/ubah'),
                                                                    'data-title' => 'Ubah Program #'.$data->id_program,
                                                                    'data-toggle' => 'modal',
                                                                    'data-target' => '#myModal',
                                                            ]) ?>
                                                            <?= Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', [
                                                                    'id' => 'delButton-'.$data->id_program,
                                                                    'title' => 'Hapus Program',
                                                                    'class' => 'btn btn-xs btn-default',
                                                                    'data-href' => url('/admin/parameter/program/'.$data->id_program.'/delete'),
                                                            ]) ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="pull-right"> <?= $model->links(); ?> </div>
                                </div>
                            </div>      
                        </div>
                    </div>
                </div>
                <!-- tab pelaksana content-->
                <div class="tab-pane fade" id="kegiatan"><p>...</p></div>
            </div>
        </div>
    </div>
</div>
@endsection
 
@section('scripts')
<script>
    $(document).ready(function(){    
        //ajax for modal
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
        })
        // delete button
        $( "a[id*='delButton-']" ).on('click', function(event){
            event.preventDefault();
            var confirmation = confirm('Yakin Menghapus')
            var href = $(this).attr('data-href');
            if(confirmation == true){
                $.ajax({
                    url: href,
                    type:'POST',
                    data: { "_token": "{{ csrf_token() }}" }, //$(this).serialize(),
                    success: function(data) {
                        location.reload();
                    }
                });
            }
        })

        $('#renja-table tbody').on('dblclick', 'tr', function(e){
            var id = $(this).closest('tr').data('id');
            var target = e.target
            if(e.target == target){ //actually, we should check if e.target == this. But after I checked it, this method didn't work, and I dunno why
                var href = '{{ url('/admin/parameter/kegiatan') }}/' + id;
                $('#tab-home').removeClass('active');
                // $('#tab-home').attr('class', 'disabled');
                $('#tab-home').html('<a href=\"#home\"  data-toggle=\"tab\" role=\"tab\" title=\"program\"><i class=\"glyphicon glyphicon-home\"></i> Program</a>');
                $('#tab-kegiatan').attr('class', 'active');

                $('#link-home').click();
                $('#home').removeClass('active in');
                $('#kegiatan').addClass('active in');
                $('#kegiatan').html('<i class=\"fa fa-spinner fa-spin\"></i>');
                $.get(href).done(function(data){
                    $('#kegiatan').html(data);
                    // console.log('voila pelaksana');
                });
            }
        });
        $("a[id*='rincButton-']").on('click', function(e){
            var target = e.target;
            var href = $(this).data('href');
            $('#tab-home').removeClass('active');
            $('#tab-home').html('<a href=\"#home\"  data-toggle=\"tab\" role=\"tab\" title=\"program\"><i class=\"glyphicon glyphicon-home\"></i> Program</a>');
            $('#tab-kegiatan').attr('class', 'active');
            $('#link-home').click();
            $('#home').removeClass('active in');
            $('#kegiatan').addClass('active in');
            $('#kegiatan').html('<i class=\"fa fa-spinner fa-spin\"></i>');
            $.get(href).done(function(data){
                $('#kegiatan').html(data);
                // console.log('voila pelaksana');
            });
        });         
    });
</script>    
@endsection
