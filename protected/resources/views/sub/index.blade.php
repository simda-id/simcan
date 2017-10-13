<?php
use hoaaah\LaravelHtmlHelpers\Html;

?>
<div class="row">
    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Sub Unit pada Unit: <?= $unit->nm_unit ?>(Bidang <?= $unit->bidang->nm_bidang ?>)</h3>
            </div>
            <div class="panel-body">
                <!-- Button trigger modal -->
                <div class="row">
                    <div class="col-md-12">
                        <p>
                        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> Tambah Sub Unit ', '#', [
                                'title' => 'Tambah Sub Unit ',
                                'class' => 'btn btn-xs btn-success',
                                'data-href' => url('/admin/parameter/sub/tambah/'.$id),
                                'data-title' => 'Tambah Sub Unit ',
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
                                    <th style="text-align: center; vertical-align:middle">Nama Sub Unit </th>
                                    <th style="text-align: center; vertical-align:middle">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($model as $data)
                                    <tr>
                                        <td><?= $data->id_unit ?>.<?= $data->id_sub_unit ?></td>
                                        <td><?= $data->nm_sub ?></td>
                                        <td>
                                            <div style="display: flex;" class="btn-group">
                                                <?= Html::a('<i class="glyphicon glyphicon-eye-open"></i>', '#', [
                                                        'title' => 'Lihat Sub Unit ',
                                                        'class' => 'btn btn-xs btn-default',
                                                        'data-href' => url('/admin/parameter/sub/'.$data->id_sub_unit.'/view'),
                                                        'data-title' => 'Lihat Sub Unit  #'.$data->id_sub_unit,
                                                        'data-toggle' => 'modal',
                                                        'data-target' => '#myModal',
                                                ]) ?>
                                                <?= Html::a('<i class="glyphicon glyphicon-pencil"></i>', '#', [
                                                        'title' => 'Ubah Sub Unit ',
                                                        'class' => 'btn btn-xs btn-default',
                                                        'data-href' => url('/admin/parameter/sub/'.$data->id_sub_unit.'/ubah'),
                                                        'data-title' => 'Ubah Sub Unit  #'.$data->id_sub_unit,
                                                        'data-toggle' => 'modal',
                                                        'data-target' => '#myModal',
                                                ]) ?>
                                                <?= Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', [
                                                        'id' => 'delButtonKegiatan-'.$data->id_sub_unit,
                                                        'title' => 'Hapus Sub Unit ',
                                                        'class' => 'btn btn-xs btn-default',
                                                        'data-href' => url('/admin/parameter/sub/'.$data->id_sub_unit.'/delete'),
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
                        $("#sub").html('<i class="fa fa-spinner fa-spin"></i>');
                        $.get("{{ Request::url() }}", function( data ) {
                            $("#sub").html(data);
                        }); 
                    }
                });
            }
        })
    });
</script>