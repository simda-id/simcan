<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.parameterlayout')

@section('content')
<div class="container-fluid col-sm-12 col-md-12 col-lg-12">
    <div class="row">
        <div class="col-md-12">
            <?php
            $this->title = 'Import Data Parameter Permendagri 90';
            $breadcrumb = new Breadcrumb();
            $breadcrumb->homeUrl = 'parameter/dash';
            $breadcrumb->begin();
            $breadcrumb->add(['label' => $this->title]);
            $breadcrumb->end();
          ?>
        </div>
    </div>
    <div id="prosesbar" class="lds-spinner">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <i class="fa fa-refresh fa-fw fa-lg"></i> Import Data Parameter Permendagri 90 :
        </div>
        <div class="panel-body">
            <h4 style="color: #b94743">Import Data Parameter Permendagri 90 menggunakan file SQL :</h4>
            <form action="{{ url('parameter90/import/importDB') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <label for="fileImportDB" class="col-sm-2" align='left'>File Script Import Data :</label>
                    <label class="btn btn-default col-sm-6">
                        <input required="" type="file" name="fileImportDB" id="fileImportDB"
                            class="validate fileImportDB" accept=".sql" placeholder="Pilih File Script SQL *.sql">
                    </label>
                    <label id='label_file'></label>
                    <button type="submit" class="btn btn-success btn-labeled btnProses " id='proses'>
                        <span class="btn-label"><i class="fa fa-refresh fa-fw fa-lg"></i></span>Jalankan Script</button>

                </div>
            </form>
            <br>
            <h4 style="color: #b94743">Rekapitulasi Parameter Permendagri 90 :</h4>
            <table id='tblCekDB' class="table compact table-responsive table-striped table-bordered" cellspacing="0"
                width="100%">
                <thead>
                    <tr>
                        <th width="33%" style="text-align: center; vertical-align:middle">Keterangan</th>
                        <th width="15%" style="text-align: center; vertical-align:middle">Jumlah Data</th>
                        <th width="4%" style="text-align: center; vertical-align:middle"></th>
                        <th width="33%" style="text-align: center; vertical-align:middle">Keterangan</th>
                        <th width="15%" style="text-align: center; vertical-align:middle">Jumlah Data</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align: left; vertical-align:middle">Urusan</td>
                        <td style="text-align: center; vertical-align:middle"><input type="text"
                                class="form-control number" style="text-align: right;" id="jml_urusan" disabled></td>
                        <th width="5px" style="text-align: center; vertical-align:middle"></th>
                        <td style="text-align: left; vertical-align:middle">Rekening 1 (Akun)</td>
                        <td style="text-align: center; vertical-align:middle"><input type="text"
                                class="form-control number" style="text-align: right;" id="jml_rek_1" disabled></td>
                    </tr>
                    <tr>
                        <td style="text-align: left; vertical-align:middle">Bidang</td>
                        <td style="text-align: center; vertical-align:middle"><input type="text"
                                class="form-control number" style="text-align: right;" id="jml_bidang" disabled></td>
                        <th width="5px" style="text-align: center; vertical-align:middle"></th>
                        <td style="text-align: left; vertical-align:middle">Rekening 2 (Golongan)</td>
                        <td style="text-align: center; vertical-align:middle"><input type="text"
                                class="form-control number" style="text-align: right;" id="jml_rek_2" disabled></td>
                    </tr>
                    <tr>
                        <td style="text-align: left; vertical-align:middle">Program</td>
                        <td style="text-align: center; vertical-align:middle"><input type="text"
                                class="form-control number" style="text-align: right;" id="jml_program" disabled></td>
                        <th width="5px" style="text-align: center; vertical-align:middle"></th>
                        <td style="text-align: left; vertical-align:middle">Rekening 3 (Jenis)</td>
                        <td style="text-align: center; vertical-align:middle"><input type="text"
                                class="form-control number" style="text-align: right;" id="jml_rek_3" disabled></td>
                    </tr>
                    <tr>
                        <td style="text-align: left; vertical-align:middle">Kegiatan</td>
                        <td style="text-align: center; vertical-align:middle"><input type="text"
                                class="form-control number" style="text-align: right;" id="jml_kegiatan" disabled></td>
                        <th width="5px" style="text-align: center; vertical-align:middle"></th>
                        <td style="text-align: left; vertical-align:middle">Rekening 4 (Obyek)</td>
                        <td style="text-align: center; vertical-align:middle"><input type="text"
                                class="form-control number" style="text-align: right;" id="jml_rek_4" disabled></td>
                    </tr>
                    <tr>
                        <td style="text-align: left; vertical-align:middle">Sub Kegiatan</td>
                        <td style="text-align: center; vertical-align:middle"><input type="text"
                                class="form-control number" style="text-align: right;" id="jml_sub_kegiatan" disabled>
                        </td>
                        <th width="5px" style="text-align: center; vertical-align:middle"></th>
                        <td style="text-align: left; vertical-align:middle">Rekening 5 (Rincian Obyek)</td>
                        <td style="text-align: center; vertical-align:middle"><input type="text"
                                class="form-control number" style="text-align: right;" id="jml_rek_5" disabled></td>
                    </tr>
                    <tr>
                        <td style="text-align: left; vertical-align:middle">Fungsi</td>
                        <td style="text-align: center; vertical-align:middle"><input type="text"
                                class="form-control number" style="text-align: right;" id="jml_fungsi" disabled></td>
                        <th width="5px" style="text-align: center; vertical-align:middle"></th>
                        <td style="text-align: left; vertical-align:middle">Rekening 6 (Sub Rincian Obyek)</td>
                        <td style="text-align: center; vertical-align:middle"><input type="text"
                                class="form-control number" style="text-align: right;" id="jml_rek_6" disabled></td>
                    </tr>
                    <tr>
                        <td style="text-align: left; vertical-align:middle">Unit SKPD</td>
                        <td style="text-align: center; vertical-align:middle"><input type="text"
                                class="form-control number" style="text-align: right;" id="jml_unit" disabled></td>
                        <th width="5px" style="text-align: center; vertical-align:middle"></th>
                        <td style="text-align: left; vertical-align:middle">Sub Unit SKPD</td>
                        <td style="text-align: center; vertical-align:middle"><input type="text"
                                class="form-control number" style="text-align: right;" id="jml_sub_unit" disabled></td>
                    </tr>
                </tbody>
            </table>
            <br>
            <div><label for="dbVersion" align='left'>Database Engine : </label>
                <label for="dbVersion" align='left' style="color: #b94743">{{$dataVersion}}</label>
            </div>
            <div>
                <label for="dbNama" align='left'>Nama Database : </label>
                <label for="dbNama" align='left' style="color: #b94743">{{$namaDB}}</label></div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" language="javascript" class="init"
    src="{{ asset('/protected/resources/views/90_parameter/js_import.js')}}"></script>
@endsection