<?php
use hoaaah\LaravelHtmlHelpers\Html;

?>
<div class="row">
    <div class="col-md-12">
        <table id="view-table" class="table table-striped table-bordered table-responsive">
            <tbody>
                <tr>
                    <th style="text-align: vertical-align:top">Kode</th>
                    <td><?= $model->id_unit ?>.<?= $model->id_sub ?></td>
                </tr>
                <tr>
                    <th style="text-align: vertical-align:top">Kode Khusus Sub Unit</th>
                    <td><?= $model->kd_sub ?></td>
                </tr>
                <tr>
                    <th style="text-align: vertical-align:top">Nama Sub Unit</th>
                    <td><?= $model->nm_sub ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>