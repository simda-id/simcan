<?php
use hoaaah\LaravelHtmlHelpers\Html;

?>
<div class="row">
    <div class="col-md-12">
        <table id="view-table" class="table table-striped table-bordered table-responsive">
            <tbody>
                <tr>
                    <th style="text-align: vertical-align:top">Kode</th>
                    <td><?= $model->id_program ?>.<?= $model->id_kegiatan ?></td>
                </tr>
                <tr>
                    <th style="text-align: vertical-align:top">Kode Khusus Kegiatan</th>
                    <td><?= $model->kd_kegiatan ?></td>
                </tr>
                <tr>
                    <th style="text-align: vertical-align:top">Nama Kegiatan</th>
                    <td><?= $model->nm_kegiatan ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>