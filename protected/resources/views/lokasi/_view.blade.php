<?php
use hoaaah\LaravelHtmlHelpers\Html;

?>
<div class="row">
    <div class="col-md-12">
        <table id="view-table" class="table table-striped table-bordered table-responsive">
            <tbody>
                <tr>
                    <th style="text-align: vertical-align:top">Kode</th>
                    <td><?= $model->id_lokasi ?></td>
                </tr>
                <tr>
                    <th style="text-align: vertical-align:top">Nama</th>
                    <td><?= $model->nama_lokasi ?></td>
                </tr>
                <tr>
                    <th style="text-align: vertical-align:top">Jenis</th>
                    <td><?php 
                            switch ($model->jenis_lokasi) {
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
                </tr>
                <tr>
                    <th style="text-align: vertical-align:top">Desa</th>
                    <td><?= $model->id_desa ?></td>
                </tr>
                <tr>
                    <th style="text-align: vertical-align:top">Desa Awal</th>
                    <td><?= $model->id_desa_awal ?></td>
                </tr>
                <tr>
                    <th style="text-align: vertical-align:top">Desa Akhir</th>
                    <td><?= $model->id_desa_akhir ?></td>
                </tr>
                <tr>
                    <th style="text-align: vertical-align:top">Koordinat</th>
                    <td><?= $model->koordinat_1 ?> | <?= $model->koordinat_2 ?> | <?= $model->koordinat_3 ?> | <?= $model->koordinat_4 ?></td>
                </tr>
                <tr>
                    <th style="text-align: vertical-align:top">Dimensi</th>
                    <td><?= $model->panjang ?> <?= $model->satuan_panjang ?> x <?= $model->lebar ?> <?= $model->satuan_lebar ?></td>
                </tr>
                <tr>
                    <th style="text-align: vertical-align:top">Luas</th>
                    <td><?= $model->luasan_kawasan ?> <?= $model->satuan_luas ?></td>
                </tr>
                <tr>
                    <th style="text-align: vertical-align:top">Keterangan</th>
                    <td><?= $model->keterangan_lokasi ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>