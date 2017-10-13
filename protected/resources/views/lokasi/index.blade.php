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
                $this->title = 'Lokasi';
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
                <h3 class="panel-title">Lokasi</h3>
            </div>
            <div class="panel-body">
                <!-- Button trigger modal -->
                <div class="row">
                    <div class="col-md-12">
                        <p>
                        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> Tambah Lokasi', '#', [
                                'title' => 'Tambah lokasi',
                                'class' => 'btn btn-xs btn-success',
                                'data-href' => url('/admin/parameter/lokasi/tambah'),
                                'data-title' => 'Tambah Lokasi',
                                'data-toggle' => 'modal',
                                'data-target' => '#myModal',
                        ]) ?>
                        </p>
                        <!-- <a class="btn btn-primary btn-xs" data-href="{{ url('/admin/parameter/lokasi/tambah') }}" data-title="Tambah Lokasi" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-plus"></i> Tambah Lokasi</a> -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table id="renja-table" class="table table-striped table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th style="text-align: center; vertical-align:middle">Kode</th>
                                    <th style="text-align: center; vertical-align:middle">Keterangan Lokasi</th>
                                    <th style="text-align: center; vertical-align:middle">Desa</th>
                                    <th style="text-align: center; vertical-align:middle">Jenis-Sifat</th>
                                    <th style="text-align: center; vertical-align:middle">Luas</th>
                                    <th style="text-align: center; vertical-align:middle">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($model as $data)
                                    <tr>
                                        <td><?= $data->id_lokasi ?></td>
                                        <td><?= $data->nama_lokasi ?></td>
                                        <td><?= $data->id_desa ?></td>
                                        <td><?php 
                                            switch ($data->jenis_lokasi) {
                                                case 0:
                                                    echo 'Kewilayahan';
                                                    break;
                                                case 1:
                                                    echo 'Ruas Jalan';
                                                    break;
                                                case 2:
                                                    echo 'Saluran Irigasi';
                                                    break;
                                                case 3:
                                                    echo 'Kawasan';
                                                    break;           
                                                case 99:
                                                    echo 'Luar Daerah';
                                                    break;                                                    
                                                default:
                                                    echo 'Luar Daerah';
                                                    break;
                                            }
                                        ?></td>
                                        <td><?= $data->luasan_kawasan ?> <?= $data->satuan_luas ?></td>
                                        <td>
                                            <div style="display: flex;" class="btn-group">
                                                <?= Html::a('<i class="glyphicon glyphicon-eye-open"></i>', '#', [
                                                        'title' => 'Lihat lokasi',
                                                        'class' => 'btn btn-xs btn-default',
                                                        'data-href' => url('/admin/parameter/lokasi/'.$data->id_lokasi.'/view'),
                                                        'data-title' => 'Lihat Lokasi #'.$data->id_lokasi,
                                                        'data-toggle' => 'modal',
                                                        'data-target' => '#myModal',
                                                ]) ?>
                                                <?= Html::a('<i class="glyphicon glyphicon-pencil"></i>', '#', [
                                                        'title' => 'Ubah lokasi',
                                                        'class' => 'btn btn-xs btn-default',
                                                        'data-href' => url('/admin/parameter/lokasi/'.$data->id_lokasi.'/ubah'),
                                                        'data-title' => 'Ubah Lokasi #'.$data->id_lokasi,
                                                        'data-toggle' => 'modal',
                                                        'data-target' => '#myModal',
                                                ]) ?>
                                                <?= Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', [
                                                        'id' => 'delButton-'.$data->id_lokasi,
                                                        'title' => 'Hapus lokasi',
                                                        'class' => 'btn btn-xs btn-default',
                                                        'data-href' => url('/admin/parameter/lokasi/'.$data->id_lokasi.'/delete'),
                                                ]) ?>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <?php // echo $model->appends(['sort' => 'nm_lokasi'])->render(); ?>
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
