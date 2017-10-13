<?php
use hoaaah\LaravelHtmlHelpers\Html;

?>
<div class="row">
    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Desa/Kelurahan pada Kecamatan: <?= $kecamatan->nama_kecamatan ?></h3>
            </div>
            <div class="panel-body">
                <!-- Button trigger modal -->
                <div class="row">
                    <div class="col-md-12">
                        <p>
                        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> Tambah Kelurahan', '#', [
                                'title' => 'Tambah Kelurahan',
                                'class' => 'btn btn-xs btn-success',
                                'data-href' => url('/admin/parameter/kelurahan/tambah/'.$id),
                                'data-title' => 'Tambah Kelurahan/Desa',
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
                                    <th style="text-align: center; vertical-align:middle">Nama Desa</th>
                                    <th style="text-align: center; vertical-align:middle">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($model as $data)
                                    <tr>
                                        <td><?= $data->id_kecamatan?>.<?= $data->id_desa ?></td>
                                        <td><?= $data->status_desa == 0 ? 'Desa' : 'Kelurahan' ?> <?= $data->nama_desa ?></td>
                                        <td>
                                            <div style="display: flex;" class="btn-group">
                                                <?= Html::a('<i class="glyphicon glyphicon-eye-open"></i>', '#', [
                                                        'title' => 'Lihat Desa/Kelurahan',
                                                        'class' => 'btn btn-xs btn-default',
                                                        'data-href' => url('/admin/parameter/kelurahan/'.$data->id_desa.'/view'),
                                                        'data-title' => 'Lihat Desa #'.$data->id_desa,
                                                        'data-toggle' => 'modal',
                                                        'data-target' => '#myModal',
                                                ]) ?>
                                                <?= Html::a('<i class="glyphicon glyphicon-pencil"></i>', '#', [
                                                        'title' => 'Ubah Desa',
                                                        'class' => 'btn btn-xs btn-default',
                                                        'data-href' => url('/admin/parameter/kelurahan/'.$data->id_desa.'/ubah'),
                                                        'data-title' => 'Ubah Desa #'.$data->id_desa,
                                                        'data-toggle' => 'modal',
                                                        'data-target' => '#myModal',
                                                ]) ?>
                                                <?= Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', [
                                                        'id' => 'delButtonDesa-'.$data->id_desa,
                                                        'title' => 'Hapus Desa',
                                                        'class' => 'btn btn-xs btn-default',
                                                        'data-href' => url('/admin/parameter/kelurahan/'.$data->id_desa.'/delete'),
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
</div>

<script>
    $(document).ready(function(){    

        // delete button
        $( "a[id*='delButtonDesa-']" ).on('click', function(event){
            event.preventDefault();
            var confirmation = confirm('Yakin Menghapus')
            var href = $(this).attr('data-href');
            if(confirmation == true){
                $.ajax({
                    url: href,
                    type:'POST',
                    data: { "_token": "{{ csrf_token() }}" }, //$(this).serialize(),
                    success: function(data) {
                        $("#kelurahan").html('<i class="fa fa-spinner fa-spin"></i>');
                        $.get("{{ Request::url() }}", function( data ) {
                            $("#kelurahan").html(data);
                        }); 
                    }
                });
            }
        })
    });
</script>