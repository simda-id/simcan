<?php
use hoaaah\LaravelHtmlHelpers\Html;

?>
<div class="row">
    <div class="col-md-12">
        <table id="view-table" class="table table-striped table-bordered table-responsive">
            <tbody>
                <tr>
                    <th style="text-align: vertical-align:top">Kode</th>
                    <td><?= $model->id_bidang ?>.<?= $model->id_program ?></td>
                </tr>
                <tr>
                    <th style="text-align: vertical-align:top">Bidang</th>
                    <td><?= $model->bidang->nm_bidang ?></td>
                </tr>
                <tr>
                    <th style="text-align: vertical-align:top">Kode Khusus Program</th>
                    <td><?= $model->kd_program ?></td>
                </tr>
                <tr>
                    <th style="text-align: vertical-align:top">Uraian Program</th>
                    <td><?= $model->uraian_program ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>