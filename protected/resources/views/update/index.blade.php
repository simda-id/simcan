<?php
use \hoaaah\LaravelHtmlHelpers\Html;
?>
@extends('layouts.parameterlayout')

@section('content')
<div class="container-fluid col-sm-12 col-md-12 col-lg-12">	
    <!-- /.panel -->   
    <div id="pesan" class="panel">
    @if (Session::has('pesan')) 
        <div class="alert alert-info"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times-circle-o fa-fw fa-lg text-danger"></i></button>
            <h4>{{Session::get('pesan')}}</h4>
        </div>
    @endif
    </div>   
    <div id="pesan"></div>
    <div id="prosesbar" class="lds-spinner">
      <div></div><div></div><div></div><div></div>
      <div></div><div></div><div></div><div></div>
      <div></div><div></div><div></div><div></div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <i class="fa fa-refresh fa-fw fa-lg"></i> Update Database - Rincian Sinkronisasi Database :
        </div>
        <div class="panel-body">
                            <h4 style="color: #b94743">Update terhadap content database menggunakan file update :</h4>
                            <form action="{{ url('admin/update/updateDB') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row" >
                                    <label for="txt_periode" class="col-sm-2" align='left'>File Script Update :</label>
                                    <label class="btn btn-default col-sm-6">
                                        <input required="" type="file" name="updatedb" id="inputupdate" class="validate inputupdate" accept=".simcan.php" placeholder="Pilih File Update *.simcan" >
                                    </label>
                                    <label  id='label_file'></label>
                                    <button type="submit" class="btn btn-success btn-labeled btnProses " id='proses'>
                                            <span class="btn-label"><i class="fa fa-refresh fa-fw fa-lg"></i></span>Jalankan File update</button>
                                    
                                </div>
                            </form>
                            <br>
                            <h4 style="color: #b94743">Update Struktur Database :</h4>
                            <table id='tblCekDB' class="table compact table-responsive table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" width="40%" style="text-align: center; vertical-align:middle">Keterangan Database</th>
                                            <th colspan="2" width="12%" style="text-align: center; vertical-align:middle">Jumlah Table</th>
                                            <th colspan="2" width="12%" style="text-align: center; vertical-align:middle">Jumlah Column</th>
                                            <th colspan="2" width="12%" style="text-align: center; vertical-align:middle">Jumlah Trigger</th>
                                            <th colspan="2" width="12%" style="text-align: center; vertical-align:middle">Jumlah Procedure</th>
                                            <th rowspan="2" width="12%" style="text-align: center; vertical-align:middle">Perbedaan Atributes</th>
                                        </tr>
                                        <tr>
                                            <th style="text-align: center; vertical-align:middle">Versi Baru</th>
                                            <th style="text-align: center; vertical-align:middle">Versi Lama</th>
                                            <th style="text-align: center; vertical-align:middle">Versi Baru</th>
                                            <th style="text-align: center; vertical-align:middle">Versi Lama</th>
                                            <th style="text-align: center; vertical-align:middle">Versi Baru</th>
                                            <th style="text-align: center; vertical-align:middle">Versi Lama</th>
                                            <th style="text-align: center; vertical-align:middle">Versi Baru</th>
                                            <th style="text-align: center; vertical-align:middle">Versi Lama</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                            <td style="text-align: left; vertical-align:middle">
                                                <div><label for="dbVersion"  align='left' >Database Engine : </label>
                                                    <label for="dbVersion"  align='left' style="color: #b94743">{{$dataVersion}}</label></div>
                                                <div><label for="dbNama"  align='left' >Nama Database : </label>
                                                    <label for="dbNama"  align='left' style="color: #b94743">{{$namaDB}}</label></div>
                                                {{-- <div><label for="dbRilis"  align='left' >Rilis Database : </label>
                                                    <label for="dbRilis"  align='left' style="color: #b94743"></label></div> --}}
                                            </td>
                                            <td style="text-align: center; vertical-align:middle"><input type="text" class="form-control number" style="text-align: right;" id="jml_table1" disabled></td>
                                            <td style="text-align: center; vertical-align:middle"><input type="text" class="form-control number" style="text-align: right;" id="jml_table0" disabled></td>
                                            <td style="text-align: center; vertical-align:middle"><input type="text" class="form-control number" style="text-align: right;" id="jml_kolom1" disabled></td>
                                            <td style="text-align: center; vertical-align:middle"><input type="text" class="form-control number" style="text-align: right;" id="jml_kolom0" disabled></td>
                                            <td style="text-align: center; vertical-align:middle"><input type="text" class="form-control number" style="text-align: right;" id="jml_trigger1" disabled></td>
                                            <td style="text-align: center; vertical-align:middle"><input type="text" class="form-control number" style="text-align: right;" id="jml_trigger0" disabled></td>
                                            <td style="text-align: center; vertical-align:middle"><input type="text" class="form-control number" style="text-align: right;" id="jml_prosedur1" disabled></td>
                                            <td style="text-align: center; vertical-align:middle"><input type="text" class="form-control number" style="text-align: right;" id="jml_prosedur0" disabled></td>
                                            <td style="text-align: center; vertical-align:middle"><input type="text" class="form-control number" style="text-align: right;" id="column_modif" disabled></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center; vertical-align:middle">
                                                <button type="button" class="btn btn-success btn-labeled btnCekProses" id='cekproses'>
                                                <span class="btn-label"><i class="fa fa-check fa-fw fa-lg"></i></span>0. Cek Rekap Database</button>
                                                <button type="button" class="btn btn-warning btn-labeled btnNormalisasi hidden" id='normalisasi'>
                                                <span class="btn-label"><i class="fa fa-check fa-fw fa-lg"></i></span>Normalisasi Data Isian</button>
                                            </td>
                                            <td colspan="2" style="text-align: center; vertical-align:middle">
                                                <button type="button" class="btn btn-primary btn-labeled btnProsesKe1" id='btnProsesKe1'>
                                                    <span class="btn-label"><i class="fa fa-refresh fa-fw fa-lg"></i></span>1. Update Table</button>
                                            </td>
                                            <td colspan="2" style="text-align: center; vertical-align:middle">
                                                <button type="button" class="btn btn-primary btn-labeled btnProsesKe2" id='btnProsesKe2'>
                                                    <span class="btn-label"><i class="fa fa-refresh fa-fw fa-lg"></i></span>2. Update Kolom</button>
                                            </td>
                                            <td colspan="2" style="text-align: center; vertical-align:middle">
                                                <button type="button" class="btn btn-primary btn-labeled btnProsesKe3" id='btnProsesKe3'>
                                                    <span class="btn-label"><i class="fa fa-refresh fa-fw fa-lg"></i></span>3. Update Atribute</button>
                                            </td>
                                            <td colspan="2" style="text-align: center; vertical-align:middle">
                                                <button type="button" class="btn btn-primary btn-labeled btnProsesKe4" id='btnProsesKe4'>
                                                    <span class="btn-label"><i class="fa fa-refresh fa-fw fa-lg"></i></span>4. Update Constraints</button>
                                            </td>
                                            <td style="text-align: center; vertical-align:middle">
                                                <button type="button" class="btn btn-danger btn-labeled btnProsesKe5" id='btnProsesKe5'>
                                                    <span class="btn-label"><i class="fa fa-check fa-fw fa-lg"></i></span>5. Finalisasi Update</button>
                                            </td>
                                        </tr> 
                                    </tbody>
                            </table> 

                <hr>
                <h4 style="color: #b94743">Langkah - Langkah Update Database :</h4>
                <label>1. Tekan Tombol Cek Data untuk melihat rekapitulasi perbedaan data</label><br>
                <label>2. Selanjutnya secara Tekan Tombol 1 Update Tabel, tunggu sampai selesai</label><br>
                <label>3. Selanjutnya secara Tekan Tombol 2 Update Kolom, tunggu sampai selesai</label><br>
                <label>4. Selanjutnya secara Tekan Tombol 3 Update Atribute, tunggu sampai selesai</label><br>
                <label>5. Selanjutnya secara Tekan Tombol 4 Update Constraints, tunggu sampai selesai</label><br>
                <label>6. Selanjutnya secara Tekan Tombol 5 Finalisasi Update, tunggu sampai selesai</label><br>
                <label>7. Untuk melihat hasilnya, dapat dilihat dengan menekan tombol Cek Data kembali</label><br>

                <hr>
                <h4 style="color: #b94743">Catatan :</h4>
                <label>1. Database Engine yang dipakai MySQL versi 5.6 atau 5.7</label><br>
                <label>2. Jangan Lupa Backup Database sebelum update...</label><br>

                <br>
        </div>
    </div>
</div>
@endsection
 
@section('scripts')
  <script type="text/javascript" language="javascript" class="init" src="{{ asset('/protected/resources/views/update/js_update.js')}}"></script>
@endsection