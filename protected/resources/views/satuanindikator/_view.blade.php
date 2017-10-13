<?php
use hoaaah\LaravelHtmlHelpers\Html;

?>
<div class="row">
    <div class="col-md-12">
        <table id="view-table" class="table table-striped table-bordered table-responsive">
            <tbody>
                <tr>
                    <th style="text-align: center; vertical-align:middle">Kode</th>
                    <td><?= $model->id_indikator ?></td>
                </tr>
                <tr>
                    <th style="text-align: center; vertical-align:middle">Jenis-Sifat</th>
                    <td><?= $model->jenis_indikator == 0 ? 'Absolute' : 'Incremental' ?> <?= $model->sifat_indikator == 0 ? '-' : '+' ?></td>
                </tr>
                <tr>
                    <th style="text-align: center; vertical-align:middle">Nama Indikator</th>
                    <td><?= $model->nm_indikator ?></td>
                </tr>
                <tr>
                    <th style="text-align: center; vertical-align:middle">Iku</th>
                    <td><?php 
                        switch ($model->flag_iku) {
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
                </tr>
                <tr>
                    <th style="text-align: center; vertical-align:middle">Asal</th>
                    <td><?php 
                        switch ($model->asal_indikator) {
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
                </tr>
                <tr>
                    <th style="text-align: center; vertical-align:middle">Sumber Data</th>
                    <td><?= $model->sumber_data_indikator ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>