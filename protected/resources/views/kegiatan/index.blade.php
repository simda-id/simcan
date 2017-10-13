<?php
use hoaaah\LaravelHtmlHelpers\Html;

?>
<div class="row">
    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Kegiatan pada Program: <?= $program->uraian_program ?>(Bidang <?= $program->bidang->nm_bidang ?>)</h3>
            </div>
            <div class="panel-body">
                <!-- Button trigger modal -->
                <div class="row">
                    <div class="col-md-12">
                        <p>
                        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> Tambah Kegiatan', '#', [
                                'title' => 'Tambah Kegiatan',
                                'class' => 'btn btn-xs btn-success',
                                'data-href' => url('/admin/parameter/kegiatan/tambah/'.$id),
                                'data-title' => 'Tambah Kegiatan',
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
                                    <th style="text-align: center; vertical-align:middle">Nama Kegiatan</th>
                                    <th style="text-align: center; vertical-align:middle">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($model as $data)
                                    <tr>
                                        <td><?= $data->id_program?>.<?= $data->id_kegiatan ?></td>
                                        <td><?= $data->nm_kegiatan ?></td>
                                        <td>
                                            <div style="display: flex;" class="btn-group">
                                                <?= Html::a('<i class="glyphicon glyphicon-eye-open"></i>', '#', [
                                                        'title' => 'Lihat Kegiatan',
                                                        'class' => 'btn btn-xs btn-default',
                                                        'data-href' => url('/admin/parameter/kegiatan/'.$data->id_kegiatan.'/view'),
                                                        'data-title' => 'Lihat Kegiatan #'.$data->id_kegiatan,
                                                        'data-toggle' => 'modal',
                                                        'data-target' => '#myModal',
                                                ]) ?>
                                                <?= Html::a('<i class="glyphicon glyphicon-pencil"></i>', '#', [
                                                        'title' => 'Ubah Kegiatan',
                                                        'class' => 'btn btn-xs btn-default',
                                                        'data-href' => url('/admin/parameter/kegiatan/'.$data->id_kegiatan.'/ubah'),
                                                        'data-title' => 'Ubah Kegiatan #'.$data->id_kegiatan,
                                                        'data-toggle' => 'modal',
                                                        'data-target' => '#myModal',
                                                ]) ?>
                                                <?= Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', [
                                                        'id' => 'delButtonKegiatan-'.$data->id_kegiatan,
                                                        'title' => 'Hapus Kegiatan',
                                                        'class' => 'btn btn-xs btn-default',
                                                        'data-href' => url('/admin/parameter/kegiatan/'.$data->id_kegiatan.'/delete'),
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
        $( "a[id*='delButtonKegiatan-']" ).on('click', function(event){
            event.preventDefault();
            var confirmation = confirm('Yakin Menghapus')
            var href = $(this).attr('data-href');
            if(confirmation == true){
                $.ajax({
                    url: href,
                    type:'POST',
                    data: { "_token": "{{ csrf_token() }}" }, //$(this).serialize(),
                    success: function(data) {
                        $("#Kegiatan").html('<i class="fa fa-spinner fa-spin"></i>');
                        $.get("{{ Request::url() }}", function( data ) {
                            $("#kegiatan").html(data);
                        }); 
                    }
                });
            }
        })
    });
</script>