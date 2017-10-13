<?php
use hoaaah\LaravelHtmlHelpers\Html;

?>
<div class="row">
    <div class="col-md-12">
        <table id="view-table" class="table table-striped table-bordered table-responsive">
            <tbody>
                <tr>
                    <th style="text-align: vertical-align:top">Kode</th>
                    <td><?= $model->id_kecamatan ?>.<?= $model->id_desa ?></td>
                </tr>
                <tr>
                    <th style="text-align: vertical-align:top">Kode Khusus Wilayah Desa</th>
                    <td><?= $model->kd_desa ?></td>
                </tr>
                <tr>
                    <th style="text-align: vertical-align:top">Nama Desa</th>
                    <td><?= $model->status_desa == 0 ? 'Desa' : 'Kelurahan' ?> <?= $model->nama_desa ?></td>
                </tr>
                <tr>
                    <th style="text-align: vertical-align:top">Zona SSH</th>
                    <td><?= $model->id_zona == NULL || $model->id_zona == '' ? 'Not Set' : $model->id_zona .'. '. $model['zonaSsh']['keterangan_zona'] ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>