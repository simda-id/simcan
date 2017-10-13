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
                $this->title = 'Satuan Indikator';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->begin();
                $breadcrumb->add(['label' => 'Parameter']);
                $breadcrumb->add(['label' => $this->title]);
                $breadcrumb->end();
            ?>          
        </div>
    </div>
    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Satuan Indikator</h3>
            </div>
            <div class="panel-body">
                <!-- Button trigger modal -->
                <div class="row">
                    <div class="col-md-12">
                        <p>
                        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> Tambah Satuan Indikator', '#', [
                                'title' => 'Tambah Indikator',
                                'class' => 'btn btn-xs btn-success',
                                'data-href' => url('/admin/parameter/indikator/tambah'),
                                'data-title' => 'Tambah Satuan Indikator',
                                'data-toggle' => 'modal',
                                'data-target' => '#myModal',
                        ]) ?>
                        </p>
                        <!-- <a class="btn btn-primary btn-xs" data-href="{{ url('/admin/parameter/indikator/tambah') }}" data-title="Tambah Satuan Indikator" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-plus"></i> Tambah Satuan Indikator</a> -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table id="renja-table" class="table table-striped table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th style="text-align: center; vertical-align:middle">Kode</th>
                                    <th style="text-align: center; vertical-align:middle">Nama Indikator</th>
                                    <th style="text-align: center; vertical-align:middle">Jenis-Sifat</th>
                                    <th style="text-align: center; vertical-align:middle">Iku</th>
                                    <th style="text-align: center; vertical-align:middle">Asal</th>
                                    <th style="text-align: center; vertical-align:middle">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($model as $data)
                                    <tr>
                                        <td><?= $data->id_indikator ?></td>
                                        <td><?= $data->nm_indikator ?></td>
                                        <td><?= $data->jenis_indikator == 0 ? 'Absolute' : 'Incremental' ?> <?= $data->sifat_indikator == 0 ? '-' : '+' ?></td>
                                        <td><?php 
                                            switch ($data->flag_iku) {
                                                case 0:
                                                    echo 'Non-IKU';
                                                    break;
                                                case 1:
                                                    echo 'IKU Pemda';
                                                    break;
                                                case 2:
                                                    echo 'IKU OPD';
                                                    break;
                                                default:
                                                    echo '#Invalid';
                                                    break;
                                            }
                                        ?></td>
                                        <td><?php 
                                            switch ($data->asal_indikator) {
                                                case 0:
                                                    echo 'RPJMD';
                                                    break;
                                                case 1:
                                                    echo 'Renstra';
                                                    break;
                                                case 2:
                                                    echo 'RKPD';
                                                    break;
                                                case 3:
                                                    echo 'Renja';
                                                    break;
                                                default:
                                                    echo '#Invalid';
                                                    break;
                                            }
                                        ?></td>
                                        <td>
                                            <div style="display: flex;" class="btn-group">
                                                <?= Html::a('<i class="glyphicon glyphicon-eye-open"></i>', '#', [
                                                        'title' => 'Lihat Indikator',
                                                        'class' => 'btn btn-xs btn-default',
                                                        'data-href' => url('/admin/parameter/indikator/'.$data->id_indikator.'/view'),
                                                        'data-title' => 'Lihat Satuan Indikator #'.$data->id_indikator,
                                                        'data-toggle' => 'modal',
                                                        'data-target' => '#myModal',
                                                ]) ?>
                                                <?= Html::a('<i class="glyphicon glyphicon-pencil"></i>', '#', [
                                                        'title' => 'Ubah Indikator',
                                                        'class' => 'btn btn-xs btn-default',
                                                        'data-href' => url('/admin/parameter/indikator/'.$data->id_indikator.'/ubah'),
                                                        'data-title' => 'Ubah Satuan Indikator #'.$data->id_indikator,
                                                        'data-toggle' => 'modal',
                                                        'data-target' => '#myModal',
                                                ]) ?>
                                                <?= Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', [
                                                        'id' => 'delButton-'.$data->id_indikator,
                                                        'title' => 'Hapus Indikator',
                                                        'class' => 'btn btn-xs btn-default',
                                                        'data-href' => url('/admin/parameter/indikator/'.$data->id_indikator.'/delete'),
                                                ]) ?>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <?php // echo $model->appends(['sort' => 'nm_indikator'])->render(); ?>
                        <div class="pull-right"> <?= $model->links(); ?> </div>
                    </div>
                </div>      
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
    });
</script>    
@endsection
