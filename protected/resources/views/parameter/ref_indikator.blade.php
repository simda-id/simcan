<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app1')
{{-- @extends('layouts.parameterlayout') --}}
{{-- <meta name="_token" content="{!! csrf_token() !!}" /> --}}

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <?php
                $this->title = ' Indikator Kinerja';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = 'admin/parameter';
                $breadcrumb->begin();
                $breadcrumb->add(['label' => $this->title]);
                $breadcrumb->end();
            ?>          
        </div>
    </div>
    <div id="pesan"></div>
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-info">
          <div class="panel-heading">
            <p><h2 class="panel-title">Referensi Indikator Perencanaan Pembangunan</h2></p>
          </div>

          <div class="panel-body">
            <div class="add">
              <p><a class="add-indikator btn-labeled btn btn-success"><span class="btn-label"><i class="fa fa-plus fa-lg fa-fw"></i></span> Tambah Indikator</a></p>
            </div>
            <br>
            <div class="table-responsive">
            <table id="tblIndikator" class="table display compact table-striped table-bordered table-responsive" width="100%">
                  <thead>
                      <tr>
                          <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                          <th style="text-align: center; vertical-align:middle">Uraian Indikator</th>
                          <th width="10%" style="text-align: center; vertical-align:middle">Type</th>
                          <th width="10%" style="text-align: center; vertical-align:middle">Jenis</th>
                          <th width="10%" style="text-align: center; vertical-align:middle">Sifat</th>
                          <th width="10%" style="text-align: center; vertical-align:middle">Teknik Pengukuran</th>
                          <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                  </tbody>
            </table>
          </div>
          </div>
        </div>
    </div>
  </div>
</div>


<!--Modal Tambah -->
<div id="ModalIndikator" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" style="text-align: center;"></h4>
      </div>
      <div class="modal-body">
        <form name="frmModalIndikator" class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id_indikator" id="id_indikator">                                  
            <div class="form-group">
              <label class="control-label col-sm-2" for="id_aspek">Aspek Pembangunan</label>
                <div class="col-sm-10">
                  <select type="text" class="form-control id_aspek" id="id_aspek" name="id_aspek"></select>
                </div>
            </div>                                    
            <div class="form-group">
              <label class="control-label col-sm-2" for="id_bidang">Bidang Pembangunan</label>
                <div class="col-sm-10">
                  <select type="text" class="form-control id_bidang" id="id_bidang" name="id_bidang"></select>
                </div>
            </div>
            <div class="form-group">
              <label for="nm_indikator" class="col-sm-2" align='left'>Uraian Indikator</label>
              <div class="col-sm-10">
                <textarea type="text" class="form-control" id="nm_indikator" name="nm_indikator" required="required" rows="2"></textarea>
              </div>
            </div>                       
            <div class="form-group">
            <label class="control-label col-sm-2" for="id_satuan_output">Satuan Indikator</label>
              <div class="col-sm-10">
                <select type="text" class="form-control id_satuan_output" id="id_satuan_output" name="id_satuan_output"></select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="metode_hitung">File Metode Perhitungan </label>
              <label class="btn col-sm-10">
                  <input type="file" name="metode_hitung" id="metode_hitung" class="validate metode_hitung" accept=".png, .jpg, .jpeg" placeholder="Pilih File Image *.png,*.jpg,*.jpeg" >
              </label>            
            </div> 
            <div class="form-group">
              <label for="sumber_data" class="col-sm-5" align='left'>Sumber Data Pengukuran Indikator</label>
              <div class="col-sm-offset-1 col-sm-11">
                <textarea type="name" class="form-control" id="sumber_data" rows="3"></textarea>
              </div>
            </div>
            <div class="form-group hidden">
              <label for="flag_iku" class="col-sm-2" align='left'>Jenis IKU</label>
                  <div class="col-sm-2">
                      <label class="radio-inline">
                      <input class="flag_iku" type="radio" name="flag_iku" id="flag_iku" value="0"> Non IKU</label>
                  </div>
                  <div class="col-sm-2">
                      <label class="radio-inline">
                      <input class="flag_iku" type="radio" name="flag_iku" id="flag_iku" value="1"> IKU Pemda</label>
                  </div>
                  <div class="col-sm-3">
                      <label class="radio-inline">
                      <input class="flag_iku" type="radio" name="flag_iku" id="flag_iku" value="2"> IKU Perangkat Daerah</label>
                  </div>
            </div>
            <div class="form-group">
              <label for="jns_indikator" class="col-sm-2" align='left'>Jenis Indikator</label>
              <div class="col-sm-10">
                  <div class="col-sm-2">
                      <label class="radio-inline">
                      <input class="jns_indikator" type="radio" name="jns_indikator" id="jns_indikator" value="0"> Output</label>
                  </div>
                  <div class="col-sm-3">
                      <label class="radio-inline">
                      <input class="jns_indikator" type="radio" name="jns_indikator" id="jns_indikator" value="1"> Outcome Immediate</label>
                  </div>
                  <div class="col-sm-4">
                      <label class="radio-inline">
                      <input class="jns_indikator" type="radio" name="jns_indikator" id="jns_indikator" value="2"> Outcome Intermediate</label>
                  </div>
                  <div class="col-sm-3">
                      <label class="radio-inline">
                      <input class="jns_indikator" type="radio" name="jns_indikator" id="jns_indikator" value="3"> Outcome Ultimate</label>
                  </div>
              </div>
            </div>
            <div class="form-group">
              <label for="tipe_indikator" class="col-sm-2" align='left'>Tipe Indikator</label>
              <div class="col-sm-10">
                  <div class="col-sm-2">
                      <label class="radio-inline">
                      <input class="tipe_indikator" type="radio" name="tipe_indikator" id="tipe_indikator" value="0"> Kualitatif</label>
                  </div>
                  <div class="col-sm-2">
                      <label class="radio-inline">
                      <input class="tipe_indikator" type="radio" name="tipe_indikator" id="tipe_indikator" value="1"> Kuantitatif</label>
                  </div>
                  <div class="col-sm-2">
                      <label class="radio-inline">
                      <input class="tipe_indikator" type="radio" name="tipe_indikator" id="tipe_indikator" value="2"> Persentase</label>
                  </div>
                  <div class="col-sm-2">
                      <label class="radio-inline">
                      <input class="tipe_indikator" type="radio" name="tipe_indikator" id="tipe_indikator" value="3"> Rasio</label>
                  </div>
                  <div class="col-sm-2">
                      <label class="radio-inline">
                      <input class="tipe_indikator" type="radio" name="tipe_indikator" id="tipe_indikator" value="4"> Rata-rata</label>
                  </div>
                  <div class="col-sm-2">
                      <label class="radio-inline">
                      <input class="tipe_indikator" type="radio" name="tipe_indikator" id="tipe_indikator" value="5"> Indeks</label>
                  </div>
              </div>
            </div>
            <div class="form-group">
              <label for="jenis_indikator" class="col-sm-2" align='left'>Sifat Indikator</label>
              <div class="col-sm-10">
                  <div class="col-sm-2">
                      <label class="radio-inline">
                      <input class="jenis_indikator" type="radio" id="jenis_indikator" name="jenis_indikator" value="0"> Negatif</label>
                  </div>
                  <div class="col-sm-3">
                      <label class="radio-inline">
                      <input class="jenis_indikator" type="radio" id="jenis_indikator" name="jenis_indikator" value="1"> Positif</label>
                  </div>
              </div>
            </div>
            <div class="form-group">
              <label for="sifat_indikator" class="col-sm-2" align='left'>Type Pengukuran</label>
              <div class="col-sm-10">
                  <div class="col-sm-2">
                      <label class="radio-inline">
                      <input class="sifat_indikator" type="radio" id="sifat_indikator" name="sifat_indikator" value="0"> Incremental</label>
                  </div>
                  <div class="col-sm-2">
                      <label class="radio-inline">
                      <input class="sifat_indikator" type="radio" id="sifat_indikator" name="sifat_indikator" value="1"> Absolut</label>
                  </div>
                  <div class="col-sm-3">
                      <label class="radio-inline">
                      <input class="sifat_indikator" type="radio" id="sifat_indikator" name="sifat_indikator" value="2"> Kumulatif</label>
                  </div>
              </div>
            </div> 
            <div class="form-group hidden">
              <label for="flag_iku" class="col-sm-3" align='left'>Kualitas Indikator</label>
              <div class="col-sm-offset-1 col-sm-10">
                  <div class="col-sm-2">
                      <label class="radio-inline">
                      <input class="flag_iku" type="radio" name="kualitas_indikator" id="kualitas_indikator" value="0"> Spesifik (Spesific)</label>
                  </div>
                  <div class="col-sm-2">
                      <label class="radio-inline">
                      <input class="flag_iku" type="radio" name="kualitas_indikator" id="kualitas_indikator" value="1"> Dapat Diukur (Measurable)</label>
                  </div>
                  <div class="col-sm-3">
                      <label class="radio-inline">
                      <input class="flag_iku" type="radio" name="kualitas_indikator" id="kualitas_indikator" value="2"> Dapat Dicapai (Achievable)</label>
                  </div>
                  <div class="col-sm-2">
                      <label class="radio-inline">
                      <input class="flag_iku" type="radio" name="kualitas_indikator" id="kualitas_indikator" value="3"> Relevan (Relevance)</label>
                  </div>
                  <div class="col-sm-3">
                      <label class="radio-inline">
                      <input class="flag_iku" type="radio" name="kualitas_indikator" id="kualitas_indikator" value="4"> Dalam Waktu Tertentu (Time Bound)</label>
                  </div>
              </div>
            </div>   
        </form>
      </div>
        <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusLokasi">                        
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-sm btn-success btnIndikator btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i id="nmbtnSatuan" class="glyphicon glyphicon-save"></i></span>Simpan</button>
                        <div class="or"></div>
                        <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
      </div>
    </div>
  </div>

<!--Modal Hapus -->
<div id="HapusModal" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <input type="hidden" id="id_indikator_hapus" name="id_indikator_hapus">
          <div class="alert alert-danger deleteContent">
              <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border"  style="color:red;" aria-hidden="true"></i>
                <br>
                Yakin akan menghapus Referensi Indikator : <strong><span id="nm_indikator_hapus"></span></strong> ?
                <br>
                <br>
          </div>
        </div>
          <div class="modal-footer">
            <div class="ui-group-buttons">
              <button type="button" class="btn btn-sm btn-danger btn-labeled actionBtn" data-dismiss="modal" ><span class="btn-label"><i id="footer_action_button" class="glyphicon glyphicon-trash"></i></span> Hapus</button>
              <div class="or"></div>
              <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true"><span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span> Tutup</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script type="text/javascript" language="javascript" class="init" src="{{ asset('/protected/resources/views/parameter/js/js_indikator.js')}}"></script>
@endsection
