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
                $this->title = 'Unit Organisasi';
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
                <li id="tab-home" class="active"><a id="link-home" href="#home" role="tab" data-toggle="tab"><i class="glyphicon glyphicon-home"></i> Unit</a></li>
                <li id="tab-sub"><a href="#sub" role="tab-kv" data-toggle="tab">Sub Unit</a></li>
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
                                    <?= Html::a('<i class="glyphicon glyphicon-plus"></i> Tambah Unit', '#', [
                                            'title' => 'Tambah Unit',
                                            'class' => 'btn btn-xs btn-success',
                                            'data-href' => url('/admin/parameter/unit/tambah'),
                                            'data-title' => 'Tambah Unit',
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
                                                <th style="text-align: center; vertical-align:middle">Unit</th>
                                                <th style="text-align: center; vertical-align:middle">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($model as $data)
                                                <tr data-id =<?= $data->id_unit ?>>
                                                    <td><?= $data->id_bidang ?>.<?= $data->id_unit ?></td>
                                                    <td><?= $data->bidang->nm_bidang ?></td>
                                                    <td><?= $data->nm_unit ?></td>
                                                    <td>
                                                        <div style="display: flex;" class="btn-group">
                                                            <?= Html::a('<i class="glyphicon glyphicon-forward"></i>', '#', [
                                                                    'id' => 'rincButton-'.$data->id_unit,
                                                                    'title' => 'sub',
                                                                    'class' => 'btn btn-xs btn-default',
                                                                    'data-href' => url('/admin/parameter/sub/'.$data->id_unit),
                                                            ]) ?>
                                                            <?= Html::a('<i class="glyphicon glyphicon-eye-open"></i>', '#', [
                                                                    'title' => 'Lihat Unit',
                                                                    'class' => 'btn btn-xs btn-default',
                                                                    'data-href' => url('/admin/parameter/unit/'.$data->id_unit.'/view'),
                                                                    'data-title' => 'Lihat Unit #'.$data->id_unit,
                                                                    'data-toggle' => 'modal',
                                                                    'data-target' => '#myModal',
                                                            ]) ?>
                                                            <?= Html::a('<i class="glyphicon glyphicon-pencil"></i>', '#', [
                                                                    'title' => 'Ubah Unit',
                                                                    'class' => 'btn btn-xs btn-default',
                                                                    'data-href' => url('/admin/parameter/unit/'.$data->id_unit.'/ubah'),
                                                                    'data-title' => 'Ubah Unit #'.$data->id_unit,
                                                                    'data-toggle' => 'modal',
                                                                    'data-target' => '#myModal',
                                                            ]) ?>
                                                            <?= Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', [
                                                                    'id' => 'delButton-'.$data->id_unit,
                                                                    'title' => 'Hapus Unit',
                                                                    'class' => 'btn btn-xs btn-default',
                                                                    'data-href' => url('/admin/parameter/unit/'.$data->id_unit.'/delete'),
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
                <div class="tab-pane fade" id="sub"><p>...</p></div>
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
                var href = '{{ url('/admin/parameter/sub') }}/' + id;
                $('#tab-home').removeClass('active');
                // $('#tab-home').attr('class', 'disabled');
                $('#tab-home').html('<a href=\"#home\"  data-toggle=\"tab\" role=\"tab\" title=\"program\"><i class=\"glyphicon glyphicon-home\"></i> Unit</a>');
                $('#tab-sub').attr('class', 'active');

                $('#link-home').click();
                $('#home').removeClass('active in');
                $('#sub').addClass('active in');
                $('#sub').html('<i class=\"fa fa-spinner fa-spin\"></i>');
                $.get(href).done(function(data){
                    $('#sub').html(data);
                    // console.log('voila pelaksana');
                });
            }
        });
        $("a[id*='rincButton-']").on('click', function(e){
            var target = e.target;
            var href = $(this).data('href');
            $('#tab-home').removeClass('active');
            $('#tab-home').html('<a href=\"#home\"  data-toggle=\"tab\" role=\"tab\" title=\"program\"><i class=\"glyphicon glyphicon-home\"></i> Unit</a>');
            $('#tab-sub').attr('class', 'active');
            $('#link-home').click();
            $('#home').removeClass('active in');
            $('#sub').addClass('active in');
            $('#sub').html('<i class=\"fa fa-spinner fa-spin\"></i>');
            $.get(href).done(function(data){
                $('#sub').html(data);
                // console.log('voila pelaksana');
            });
        });         
    });
</script>    
@endsection
