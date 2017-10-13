<?php
use hoaaah\LaravelHtmlHelpers\Html;

?>
<div class="row">
    <div class="col-md-12">
        <table id="view-table" class="table table-striped table-bordered table-responsive">
            <tbody>
                <tr>
                    <th style="text-align: vertical-align:top">Kode</th>
                    <td><?= $model->id_kecamatan ?></td>
                </tr>
                <tr>
                    <th style="text-align: vertical-align:top">Kode Khusus Wilayah</th>
                    <td><?= $model->kd_kecamatan ?></td>
                </tr>
                <tr>
                    <th style="text-align: vertical-align:top">Nama Kecamatan</th>
                    <td><?= $model->nama_kecamatan ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>