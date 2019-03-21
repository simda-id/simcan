<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app1')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <?php
                $this->title = ' RPJMD Rancangan';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = '/';
                $breadcrumb->begin();
                $breadcrumb->add(['url' => '/rpjmd','label' => 'RPJMD dan Renstra']);
                $breadcrumb->add(['label' => $this->title]);
                $breadcrumb->end();
            ?>
      </div>
    </div>    
    <div id="pesan"></div>
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-warning">
          <div class="panel-heading">
            <h2 class="panel-title">Data Rencana Pembangunan Jangka Menengah Daerah</h2>
          </div>

          <div class="panel-body">
          <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#dok_rpjmd" aria-controls="dok_rpjmd" role="tab" data-toggle="tab">Dokumen</a></li>
            <li><a href="#visi" aria-controls="visi" role="tab" data-toggle="tab">Visi</a></li>
            <li><a href="#misi" aria-controls="misi" role="tab" data-toggle="tab">Misi</a></li>
            <li><a href="#tujuan" aria-controls="tujuan" role="tab" data-toggle="tab">Tujuan</a></li>
            <li><a href="#sasaran" aria-controls="sasaran" role="tab" data-toggle="tab">Sasaran</a></li>
            <li><a href="#program" aria-controls="program" role="tab" data-toggle="tab">Program</a></li>
          </ul>

          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="dok_rpjmd">
              <br>
              <div class="add">
                <a class="btn btn-sm btn-labeled btn-success addDokRpjmd" data-toggle="modal"><span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span> Tambah Dokumen Baru</a>
                <a class="btn btn-sm btn-labeled btn-primary addDokRevisiRpjmd" data-toggle="modal"><span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span> Tambah Dokumen Revisi</a>
              </div>
              <table id='tblDokumen' class="table display table-striped table-bordered table-responsive" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                          <th style="text-align: center; vertical-align:middle">No Dokumen</th>
                          <th width="15%" style="text-align: center; vertical-align:middle">Tanggal Dokumen</th>
                          <th width="10%" style="text-align: center; vertical-align:middle">Periode Perkada</th>
                          <th width="10%" style="text-align: center; vertical-align:middle">Jenis Dokumen</th>
                          <th width="5%" style="text-align: center; vertical-align:middle">Status Perkada</th>
                          <th width="50px" style="text-align: center; vertical-align:middle">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                  </tbody>
            </table>
            </div>
            <div role="tabpanel" class="tab-pane" id="visi">
              <br>
              <div class="add">
                <a class="btn btn-sm btn-labeled btn-success addVisiRpjmd" data-toggle="modal"><span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span> Tambah Visi</a>
              </div>
              <table id='tblVisi' class="table display table-striped table-bordered table-responsive" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th width="5%" style="text-align: center; vertical-align:middle">No Visi</th>
                          <th style="text-align: center; vertical-align:middle">Uraian Visi</th>
                          <th width="50px" style="text-align: center; vertical-align:middle">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                  </tbody>
            </table>
            </div>

            <div role="tabpanel" class="tab-pane" id="misi">
              <br>
              <div class="add">
                <a class="btn btn-sm btn-labeled btn-success addMisiRpjmd" data-toggle="modal"><span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span> Tambah Misi</a>
              </div>
              <table id="tblMisi" class="table display table-striped table-bordered table-responsive" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th width="5%" style="text-align: center; vertical-align:middle">No Visi</th>
                          <th width="5%" style="text-align: center; vertical-align:middle">No Misi</th>
                          <th style="text-align: center; vertical-align:middle">Uraian Misi</th>
                          <th width="50px" style="text-align: center; vertical-align:middle">Aksi</th>

                      </tr>
                  </thead>
                  <tbody>
                  </tbody>
            </table>
            </div>

            <div role="tabpanel" class="tab-pane" id="tujuan">
              <br>
              <div class="add">
                <a class="btn btn-sm btn-labeled btn-success addTujuanRpjmd" data-toggle="modal"><span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span> Tambah Tujuan</a>
              </div>
            <table id="tblTujuan" class="table display table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
                  <thead>
                      <tr>
                        <th width="5%" style="text-align: center; vertical-align:middle">No Visi</th>
                        <th width="5%" style="text-align: center; vertical-align:middle">No Misi</th>
                        <th width="5%" style="text-align: center; vertical-align:middle">No Tujuan</th>
                        <th style="text-align: center; vertical-align:middle">Uraian Tujuan</th>
                        <th width="50px" style="text-align: center; vertical-align:middle">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                  </tbody>
            </table>
            </div>

            <div role="tabpanel" class="tab-pane" id="sasaran">
            <br>
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#sasaran1" aria-controls="visi" role="tab" data-toggle="tab">Sasaran</a></li>
                <li><a href="#strategi" aria-controls="sasaran" role="tab" data-toggle="tab">Strategi</a></li>
                <li><a href="#kebijakan" aria-controls="tujuan" role="tab" data-toggle="tab">Kebijakan</a></li>
            </ul>

            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="sasaran1">
              <br>
              <div class="add">
                <a class="btn btn-sm btn-labeled btn-success addSasaranRpjmd" data-toggle="modal"><span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span> Tambah Sasaran</a>
              </div>
                <table id="tblSasaran" class="table display table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
                      <thead>
                          <tr>
                            <th width="5%" style="text-align: center; vertical-align:middle">No Visi</th>
                            <th width="5%" style="text-align: center; vertical-align:middle">No Misi</th>
                            <th width="5%" style="text-align: center; vertical-align:middle">No Tujuan</th>
                            <th width="5%" style="text-align: center; vertical-align:middle">No Sasaran</th>
                            <th style="text-align: center; vertical-align:middle">Uraian Sasaran</th>
                            <th width="50px" style="text-align: center; vertical-align:middle">Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                      </tbody>
                </table>
              </div>
              <div role="tabpanel" class="tab-pane" id="strategi">
              <br>
              <div class="add">
                <a class="btn btn-sm btn-labeled btn-success addStrategiRpjmd" data-toggle="modal"><span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span> Tambah Strategi</a>
              </div>
                <table id="tblStrategi" class="table display table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
                      <thead>
                          <tr>
                            <th width="5%" style="text-align: center; vertical-align:middle">No Visi</th>
                            <th width="5%" style="text-align: center; vertical-align:middle">No Misi</th>
                            <th width="5%" style="text-align: center; vertical-align:middle">No Tujuan</th>
                            <th width="5%" style="text-align: center; vertical-align:middle">No Sasaran</th>
                            <th width="10%" style="text-align: center; vertical-align:middle">No Urut</th>
                            <th style="text-align: center; vertical-align:middle">Uraian Strategi</th>
                             <th width="50px" style="text-align: center; vertical-align:middle">Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                      </tbody>
                </table>
              </div>
              <div role="tabpanel" class="tab-pane" id="kebijakan">
              <br>
              <div class="add">
                <a class="btn btn-sm btn-labeled btn-success addKebijakanRpjmd" data-toggle="modal"><span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span> Tambah Kebijakan</a>
              </div>
                <table id="tblKebijakan" class="table display table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
                      <thead>
                          <tr>
                            <th width="5%" style="text-align: center; vertical-align:middle">No Visi</th>
                            <th width="5%" style="text-align: center; vertical-align:middle">No Misi</th>
                            <th width="5%" style="text-align: center; vertical-align:middle">No Tujuan</th>
                            <th width="5%" style="text-align: center; vertical-align:middle">No Sasaran</th>
                            <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                            <th style="text-align: center; vertical-align:middle">Uraian Kebijakan</th>
                             <th width="50px" style="text-align: center; vertical-align:middle">Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                      </tbody>
                </table>
              </div>              
            </div>
            </div>

            <div role="tabpanel" class="tab-pane" id="program">
            <br>
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#program1" aria-controls="visi" role="tab" data-toggle="tab">Program</a></li>
                <li><a href="#indikatorprogram" aria-controls="misi" role="tab" data-toggle="tab">Indikator</a></li>
                <li><a href="#urusan" aria-controls="tujuan" role="tab" data-toggle="tab">Urusan</a></li>
                <li><a href="#pelaksana" aria-controls="sasaran" role="tab" data-toggle="tab">OPD Pelaksana</a></li>
            </ul>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="program1">
              <br>
              <div class="add">
                <a class="btn btn-sm btn-labeled btn-success addProgramRpjmd" data-toggle="modal"><span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span> Tambah Program</a>
              </div>
                <table id="tblProgram" class="table display table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th rowspan="2" width="50px" style="text-align: center; vertical-align:middle">Kode Sasaran</th>
                          <th rowspan="2" width="50px" style="text-align: center; vertical-align:middle">Kode Program</th>
                          <th rowspan="2" style="text-align: center; vertical-align:middle">Uraian Program</th>
                          <th colspan="6" style="text-align: center; vertical-align:middle">Pagu Program per Tahun (juta rupiah)</th>
                          <th rowspan="2" width="50px" style="text-align: center; vertical-align:middle">Aksi</th>
                      </tr>
                      <tr>
                          <th width="5%" style="text-align: right" id="n1"></th>
                          <th width="5%" style="text-align: right" id="n2"></th>
                          <th width="5%" style="text-align: right" id="n3"></th>
                          <th width="5%" style="text-align: right" id="n4"></th>
                          <th width="5%" style="text-align: right" id="n5"></th>
                          <th width="5%" style="text-align: right">Jumlah</th>
                      </tr>
                  </thead>
                  <tbody>
                  </tbody>
            </table>
              </div>
              <div role="tabpanel" class="tab-pane" id="indikatorprogram">
              <br>
              <div class="add">
                <a class="btn btn-sm btn-labeled btn-success addIndiProgRpjmd" data-toggle="modal"><span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span> Tambah Indikator</a>
              </div>
                <table id="tblIndikatorProgram" class="table display table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
                      <thead>
                          <tr>
                            <th width="10%" rowspan="2" style="text-align: center; vertical-align:middle">Kode Program</th>
                            <th width="5%" rowspan="2" style="text-align: center; vertical-align:middle">No Urut</th>
                            <th width="50%" rowspan="2" style="text-align: center; vertical-align:middle">Uraian Indikator</th>
                            <th width="30%" colspan="5" style="text-align: center; vertical-align:middle">Target Indikator per Tahun</th>                          
                            <th width="5%"  rowspan="2" style="text-align: center; vertical-align:middle">Aksi</th>
                          </tr> 
                          <tr>
                              <th width="5%" style="text-align: right" id="n1"></th>
                              <th width="5%" style="text-align: right" id="n2"></th>
                              <th width="5%" style="text-align: right" id="n3"></th>
                              <th width="5%" style="text-align: right" id="n4"></th>
                              <th width="5%" style="text-align: right" id="n5"></th>
                              <th width="5%" style="text-align: right">Jumlah</th>
                          </tr>
                      </thead>
                      <tbody>
                      </tbody>
                </table>
              </div>
              <div role="tabpanel" class="tab-pane" id="urusan">
              <br>
              <div class="add">
                <button class="add-urbidprog btn-labeled btn btn-sm btn-success"><span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Urusan</button>
              </div>
                <table id="tblUrusan" class="table display table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
                      <thead>
                          <tr>
                              <th width="10%" style="text-align: center; vertical-align:middle">Kode Program</th>
                              <th width="10%" style="text-align: center; vertical-align:middle">Kd Urusan</th>
                              <th width="30%" style="text-align: center; vertical-align:middle">Uraian Urusan</th>
                              <th style="text-align: center; vertical-align:middle">Uraian Bidang</th>
                              <th width="50px" style="text-align: center; vertical-align:middle">Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                      </tbody>
                </table>
              </div>
              <div role="tabpanel" class="tab-pane" id="pelaksana">
              <br>
              <div class="add">
                <button class="add-pelaksanaprog btn-labeled btn btn-sm btn-success"><span class="btn-label"><i class="fa fa-plus fa-fw fa-lg"></i></span>Tambah Pelaksana</button>
              </div>
                <table id="tblPelaksana" class="table display table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
                      <thead>
                          <tr>
                              <th width="10%" style="text-align: center; vertical-align:middle">Kode Program</th>
                              <th width="10%" style="text-align: center; vertical-align:middle">Kode Unit</th>
                              <th style="text-align: center; vertical-align:middle">Uraian OPD Pelaksana</th>
                              <th width="50px" style="text-align: center; vertical-align:middle">Aksi</th>
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
    </div>
  </div>
</div>

<div id="TambahDokumen" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" >
  <div class="modal-dialog modal-lg"  >
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" autocomplete='off' action="" method="post" onsubmit="return false;">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" class="form-control" name="id_rpjmd_dok" id="id_rpjmd_dok"> 
          <div class="form-group">
            <label for="nomor_rpjmd" class="col-sm-3 control-label" align='left'>Nomor Dokumen :</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="nomor_rpjmd" name="nomor_rpjmd" required="required">
            </div>
          </div>
          <div class="form-group has-feedback">
            <label for="tanggal_rpjmd" class="col-sm-3 control-label" align='left'>Tanggal Dokumen :</label>
            <input type="hidden" name="tanggal_rpjmd" id="tanggal_rpjmd">
            <div class="col-sm-4">
                <input type="text" class="form-control datepicker" id="tanggal_rpjmd_x" name="tanggal_rpjmd_x" style="text-align: center;">
                <i class="fa fa-calendar fa-fw fa-lg text-primary form-control-feedback"></i>              
            </div>
          </div>
          <div class="form-group" id="divPeriode">
            <label for="periode_awal" class="col-sm-3 control-label" align='left'>Periode Dokumen RPJMD :</label>
            <div class="col-sm-2">
              <input type="text" class="form-control number" id="periode_awal" name="periode_awal" required="required" maxlength="4" style="text-align: center;">
            </div>
            <label for="periode_akhir" class="col-sm-2 control-label" align='left'> sampai dengan </label>
            <div class="col-sm-2">
              <input type="text" class="form-control number" id="periode_akhir" name="periode_akhir" required="required" maxlength="4" style="text-align: center;">
            </div>
          </div>
          <div class="form-group">
              <label class="control-label col-sm-3" for="jns_dok_rpjmd">Jenis Dokumen :</label>
              <div class="col-sm-5">
                  <select type="text" class="form-control" id="jns_dok_rpjmd" name="jns_dok_rpjmd">
                          <option value="0">Pra Dokumen (Teknokratik)</option>
                          <option value="1">Dokumen Induk</option>
                          <option value="2">Dokumen Revisi 1</option>
                          <option value="3">Dokumen Revisi 2</option>
                          <option value="4">Dokumen Revisi 3</option>
                  </select>
              </div>
          </div>            
          <div class="form-group">
            <label for="uraian_perkada" class="col-sm-3 control-label" align='left'>Uraian Dokumen :</label>
            <div class="col-sm-8">
              <textarea type="text" class="form-control" id="uraian_perkada" name="uraian_perkada" required="required" rows="3"></textarea>
            </div>
          </div>    
        </form>
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-sm-2 text-left">
            <button type="button" id="btnDelDokumen" class="btn btn-labeled btn-danger"><span class="btn-label"><i class="fa fa-trash-o fa-lg fa-fw"></i></span>Hapus</button>
          </div>
          <div class="col-sm-10 text-right">
            <div class="ui-group-buttons">
              <button id="btnDokumen" type="button" class="btn btn-success btn-labeled btnDokumen" data-dismiss="modal">
              <span class="btn-label"><i class="fa fa-floppy-o fa-fw fa-lg"></i></span>Simpan</button>
            <div class="or"></div>
              <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
              <span class="btn-label"><i class="fa fa-sign-out fa-fw fa-lg"></i></span>Tutup</button>
            </div>
          </div>
        </div>
      </div>
      </div>      
    </div>
</div>

<div id="HapusDokumen" class="modal fade" role="dialog" tabindex="-1" data-focus-on="input:first" data-backdrop="static">
  <div class="modal-dialog modal-xs">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Hapus Dokumen Rancangan RPJMD</h4>
      </div>
      <div class="modal-body">
          <input type="hidden" id="id_dokumen_hapus" name="id_dokumen_hapus">
          <div class="alert alert-danger">
            <i class="fa fa-exclamation-triangle fa-3x fa-pull-left fa-border text-danger" aria-hidden="true"></i>
                Yakin akan menghapus Dokumen Rancangan RPJMD dengan nomor dokumen: <strong><span class="ur_dokumen_del"></span></strong>  ?
            <br>
            <br>
            <strong>Catatan : Penghapusan dokumen ini akan menghapus data Rancangan RPJMD yang telah diproses !!!!</strong>
        </div>
        </div>
        <div class="modal-footer">
          <div class="ui-group-buttons">
          <button type="button" id="btnDelDokumen1" class="btn btn-labeled btn-danger" data-dismiss="modal" ><span class="btn-label"><i class="fa fa-trash-o fa-lg fa-fw"></i></span> Hapus</button>
          <div class="or"></div>
          <button type="button" class="btn btn-labeled btn-warning" data-dismiss="modal" aria-hidden="true"><span class="btn-label"><i class="fa fa-sign-out fa-lg fa-fw"></i></span> Tutup</button>
          </div>
        </div>
    </div>
  </div>
</div>

{{-- EditVisi --}}
<div id="EditVisi" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> --}}
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="post" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" class="form-control" id="id_visi_rpjmd_edit" name="id_visi_rpjmd_edit">
              <input type="hidden" class="form-control" id="id_rpjmd_edit" name="id_rpjmd_edit" required="required" >
              <input type="hidden" class="form-control" id="thn_id_edit" name="thn_id_edit" required="required" readonly>
              <div class="form-group">
                <label for="thn_id_edit" class="col-sm-3 control-label" align='left'>Periode RPJMD :</label>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="thn_periode_visi" name="thn_periode_visi" required="required" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="no_urut_edit" class="col-sm-3 control-label" align='left'>Nomor Urut :</label>
                <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control" id="no_urut_edit" name="no_urut_edit" required="required">                  
                </div>
                </div>
              </div>
              <div class="form-group">
                <label for="id_perubahan_edit" class="col-sm-3 control-label" align='left'>ID Perubahan :</label>
                <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control" id="id_perubahan_edit" name="id_perubahan_edit" required="required">                  
                </div>
                </div>
              </div>
              <div class="form-group">
                <label for="ur_visi_rpjmd_edit" class="col-sm-3 control-label" align='left'>Uraian Visi RPJMD :</label>
                <div class="col-sm-8">
                  <textarea type="text" class="form-control" rows="5" id="ur_visi_rpjmd_edit" name="ur_visi_rpjmd_edit" required="required" ></textarea>
                </div>
              </div>
          </form>
        </div>
        <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-success actionBtn_visi btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i class="glyphicon glyphicon-save"></i></span>Simpan</button>
                        <div class="or hidden"></div>
                        <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
      </div>
    </div>
</div>

<div id="EditMisi" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> --}}
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="post" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" class="form-control" id="id_misi_rpjmd_edit" name="id_misi_rpjmd_edit" readonly >
              <input type="hidden" class="form-control" id="thn_id_misi_edit" name="thn_id_edit" readonly >
              <div class="form-group">
                <label for="id_visi_rpjmd_edit" class="col-sm-3 control-label" align='left'>ID Visi RPJMD :</label>
                <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control" id="id_visi_rpjmd_misi_edit" name="id_visi_rpjmd_edit" readonly >                  
                </div>
                </div>
              </div>
              <div class="form-group">
                <label for="no_urut_edit" class="col-sm-3 control-label" align='left'>Nomor Urut :</label>
                <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control" id="no_urut_misi_edit" name="no_urut_misi_edit" required="required">                  
                </div>
                </div>
              </div>
              <div class="form-group">
                <label for="id_perubahan_edit" class="col-sm-3 control-label" align='left'>ID Perubahan :</label>
                <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control" id="id_perubahan_misi_edit" name="id_perubahan_edit" required="required" >                  
                </div>
                </div>
              </div>
              <div class="form-group">
                <label for="ur_misi_rpjmd_edit" class="col-sm-3 control-label" align='left'>Uraian Misi RPJMD :</label>
                <div class="col-sm-8">
                  <textarea type="text" class="form-control" rows="5" id="ur_misi_rpjmd_edit" name="ur_misi_rpjmd_edit" required="required" ></textarea>
                </div>
              </div>
          </form>
        </div>
        <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-success actionBtn_misi btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i class="glyphicon glyphicon-save"></i></span>Simpan</button>
                        <div class="or hidden"></div>
                        <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
      </div>
    </div>
  </div>

<div id="EditTujuan" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> --}}
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="post" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" class="form-control" id="id_tujuan_rpjmd_edit" name="id_tujuan_rpjmd_edit" readonly >
              <input type="hidden" class="form-control" id="thn_id_tujuan_edit" name="thn_id_edit" required="required" >
              <input type="hidden" class="form-control" id="id_misi_rpjmd_tujuan_edit" name="id_misi_rpjmd_edit" required="required">
              <div class="form-group">
                <label for="id_misi_rpjmd_edit" class="col-sm-3 control-label" align='left'>ID Misi RPJMD :</label>
                <div class="col-sm-6">
                  <div class="input-group">
                    <input type="text" class="form-control" id="id_misi_tujuan_edit" name="id_misi_tujuan_edit" readonly >
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="no_urut_edit" class="col-sm-3 control-label" align='left'>Nomor Urut :</label>
                <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control" id="no_urut_tujuan_edit" name="no_urut_tujuan_edit" required="required" >                  
                </div>
                </div>
              </div>
              <div class="form-group">
                <label for="id_perubahan_edit" class="col-sm-3 control-label" align='left'>ID Perubahan :</label>
                <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control" id="id_perubahan_tujuan_edit" name="id_perubahan_edit" required="required" >
                  
                </div>
                </div>
              </div>
              <div class="form-group">
                <label for="ur_tujuan_rpjmd_edit" class="col-sm-3 control-label" align='left'>Uraian tujuan RPJMD :</label>
                <div class="col-sm-8">
                  <textarea type="text" class="form-control" rows="5" id="ur_tujuan_rpjmd_edit" name="ur_tujuan_rpjmd_edit" required="required" ></textarea>
                </div>
              </div>
          </form>
        </div>
        <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-success actionBtn_tujuan btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i class="glyphicon glyphicon-save"></i></span>Simpan</button>
                        <div class="or hidden"></div>
                        <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
      </div>
    </div>
  </div>

<div id="Editsasaran" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="post" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" class="form-control" id="id_sasaran_rpjmd_edit" name="id_sasaran_rpjmd_edit">
              <input type="hidden" class="form-control" id="thn_id_sasaran_edit" name="thn_id_edit">
              <input type="hidden" class="form-control" id="id_tujuan_rpjmd_sasaran_edit" name="id_tujuan_rpjmd_sasaran_edit">
              <div class="form-group">
                <label class="control-label col-sm-3" for="id_sasaran_rpjmd_edit">ID Tujuan RPJMD :</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="id_tujuan_sasaran_edit" name="id_tujuan_sasaran_edit" readonly>
                </div>
              </div>
              <div class="form-group">
                <label for="no_urut_edit" class="col-sm-3 control-label" align='left'>Nomor Urut :</label>
                <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control" id="no_urut_sasaran_edit" name="no_urut_sasaran_edit" required="required" >                  
                </div>
                </div>
              </div>
              <div class="form-group">
                <label for="id_perubahan_edit" class="col-sm-3 control-label" align='left'>ID Perubahan :</label>
                <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control" id="id_perubahan_sasaran_edit" name="id_perubahan_edit" required="required" >                  
                </div>
                </div>
              </div>
              <div class="form-group">
                <label for="ur_sasaran_rpjmd_edit" class="col-sm-3 control-label" align='left'>Uraian sasaran RPJMD :</label>
                <div class="col-sm-8">
                  <textarea type="text" class="form-control" rows="5" id="ur_sasaran_rpjmd_edit" name="ur_sasaran_rpjmd_edit" required="required" ></textarea>
                </div>
              </div>
          </form>
        </div>
        <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-success actionBtn_sasaran btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i class="glyphicon glyphicon-save"></i></span>Simpan</button>
                        <div class="or hidden"></div>
                        <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
      </div>
    </div>
  </div>

<div id="Editkebijakan" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="post" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" class="form-control" id="id_kebijakan_rpjmd_edit" name="id_kebijakan_rpjmd_edit" readonly >
              <input type="hidden" class="form-control" id="thn_id_kebijakan_edit" name="thn_id_edit" readonly >
              <input type="hidden" class="form-control" id="id_sasaran_rpjmd_kebijakan_edit" name="id_sasaran_rpjmd_kebijakan_edit" readonly >
              <div class="form-group">
                <label class="control-label col-sm-3" for="id_kebijakan_rpjmd_edit">ID Sasaran RPJMD :</label>
                <div class="col-sm-2">
                  <div class="input-group">
                    <input type="text" class="form-control" id="id_sasaran_kebijakan_edit" name="id_sasaran_kebijakan_edit" readonly >
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="no_urut_edit" class="col-sm-3 control-label" align='left'>Nomor Urut :</label>
                <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control" id="no_urut_kebijakan_edit" name="no_urut_kebijakan_edit" required="required" >                  
                </div>
                </div>
              </div>
              <div class="form-group">
                <label for="id_perubahan_edit" class="col-sm-3 control-label" align='left'>ID Perubahan :</label>
                <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control" id="id_perubahan_kebijakan_edit" name="id_perubahan_edit" required="required" >                  
                </div>
                </div>
              </div>
              <div class="form-group">
                <label for="ur_kebijakan_rpjmd_edit" class="col-sm-3 control-label" align='left'>Uraian kebijakan RPJMD :</label>
                <div class="col-sm-8">
                  <textarea type="text" class="form-control" rows="5" id="ur_kebijakan_rpjmd_edit" name="ur_kebijakan_rpjmd_edit" required="required" ></textarea>
                </div>
              </div>
          </form>
        </div>
        <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-success actionBtn_kebijakan btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i class="glyphicon glyphicon-save"></i></span>Simpan</button>
                        <div class="or hidden"></div>
                        <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
      </div>
    </div>
  </div>

<div id="Editstrategi" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="post" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" class="form-control" id="id_strategi_rpjmd_edit" name="id_strategi_rpjmd_edit" readonly >
              <input type="hidden" class="form-control" id="thn_id_strategi_edit" name="thn_id_edit" readonly >
              <input type="hidden" class="form-control" id="id_sasaran_rpjmd_strategi_edit" name="id_sasaran_rpjmd_edit" readonly >
              <div class="form-group">
                <label class="control-label col-sm-3" for="id_strategi_rpjmd_edit">ID strategi RPJMD :</label>
                <div class="col-sm-6">
                  <div class="input-group">
                    <input type="text" class="form-control" id="id_sasaran_strategi_edit" name="id_sasaran_strategi_edit" readonly >
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="no_urut_edit" class="col-sm-3 control-label" align='left'>Nomor Urut :</label>
                <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control" id="no_urut_strategi_edit" name="no_urut_strategi_edit" required="required" >                  
                </div>
                </div>
              </div>
              <div class="form-group">
                <label for="id_perubahan_edit" class="col-sm-3 control-label" align='left'>ID Perubahan :</label>
                <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control" id="id_perubahan_strategi_edit" name="id_perubahan_edit" required="required" >                  
                </div>
                </div>
              </div>
              <div class="form-group">
                <label for="ur_strategi_rpjmd_edit" class="col-sm-3 control-label" align='left'>Uraian strategi RPJMD :</label>
                <div class="col-sm-8">
                  <textarea type="text" class="form-control" rows="5" id="ur_strategi_rpjmd_edit" name="ur_strategi_rpjmd_edit" required="required" ></textarea>
                </div>
              </div>
          </form>
        </div>
        <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-success actionBtn_strategi btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i class="glyphicon glyphicon-save"></i></span>Simpan</button>
                        <div class="or hidden"></div>
                        <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
      </div>
    </div>
  </div>

<div id="Editprogram" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="post" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" class="form-control" id="id_program_rpjmd_edit" name="id_program_rpjmd_edit" readonly >
              <input type="hidden" class="form-control" id="thn_id_program_edit" name="thn_id_edit" readonly>
              <input type="hidden" class="form-control" id="id_sasaran_rpjmd_program_edit" name="id_sasaran_rpjmd_edit" readonly>
              <div class="form-group">
                <label for="id_sasaran_rpjmd_edit" class="col-sm-3 control-label" align='left'>ID Sasaran RPJMD :</label>
                <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control" id="id_sasaran_program_edit" name="id_sasaran_program_edit" readonly>                  
                </div>
                </div>
              </div>
              <div class="form-group">
                <label for="no_urut_edit" class="col-sm-3 control-label" align='left'>Nomor Urut :</label>
                <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control" id="no_urut_program_edit" name="no_urut_program_edit" required="required" >                  
                </div>
                </div>
              </div>              
              <div class="form-group">
                <label for="id_perubahan_edit" class="col-sm-3 control-label" align='left'>ID Perubahan :</label>
                <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control" id="id_perubahan_program_edit" name="id_perubahan_edit" required="required" >                  
                </div>
                </div>
              </div>
              <div class="form-group">
                <label for="ur_program_rpjmd_edit" class="col-sm-3 control-label" align='left'>Uraian program RPJMD :</label>
                <div class="col-sm-8">
                  <textarea type="text" class="form-control" rows="5" id="ur_program_rpjmd_edit" name="ur_program_rpjmd_edit" required="required" ></textarea>
                </div>
              </div>
              <label class="col-sm-12" style="text-align: left;">Rincian Pagu Program RPJMD :</label>
              <br>
              <table id="tblPaguProgram" class="table table-bordered"  cellspacing="0" width="100%">
                      <thead style="background: #428bca; color: #fff">
                          <tr>
                            <th width="20%" style="text-align: center; vertical-align:middle">Pagu Tahun 1</th>
                            <th width="20%" style="text-align: center; vertical-align:middle">Pagu Tahun 2</th>
                            <th width="20%" style="text-align: center; vertical-align:middle">Pagu Tahun 3</th>
                            <th width="20%" style="text-align: center; vertical-align:middle">Pagu Tahun 4</th>
                            <th width="20%" style="text-align: center; vertical-align:middle">Pagu Tahun 5</th>
                          </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td width="20%" style="text-align: center; vertical-align:middle">
                              <input type="text" class="form-control number" id="pagu1_edit" name="pagu1_edit" style="text-align: right; ">
                            </td>
                            <td width="20%" style="text-align: center; vertical-align:middle">
                              <input type="text" class="form-control number" id="pagu2_edit" name="pagu2_edit" style="text-align: right; " >
                            </td>
                            <td width="20%" style="text-align: center; vertical-align:middle">
                              <input type="text" class="form-control number" id="pagu3_edit" name="pagu3_edit" style="text-align: right; " >
                            </td>
                            <td width="20%" style="text-align: center; vertical-align:middle">
                              <input type="text" class="form-control number" id="pagu4_edit" name="pagu4_edit" style="text-align: right; " >
                            </td>
                            <td width="20%" style="text-align: center; vertical-align:middle">
                              <input type="text" class="form-control number" id="pagu5_edit" name="pagu5_edit" style="text-align: right; " >
                            </td>
                          </tr>
                          <tr>
                            <td colspan="3" style="text-align: center; vertical-align:middle; font-weight: bold;">Pagu Total :
                            </td>
                            <td colspan="2" style="text-align: center; vertical-align:middle">
                              <input type="text" class="form-control number" id="pagu_total_edit" name="pagu_total_edit" style="text-align: right;" readonly>
                            </td>
                          </tr>
                      </tbody>
                </table>
          </form>
        </div>
        <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-success actionBtn_program btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i class="glyphicon glyphicon-save"></i></span>Simpan</button>
                        <div class="or hidden"></div>
                        <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
      </div>
    </div>
  </div>

<div id="EditIndikatorProg" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="post" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" class="form-control" id="id_indikator_program_rpjmd_edit" name="id_indikator_program_rpjmd_edit" readonly >
              <input type="hidden" class="form-control" id="thn_id_indikator_edit" name="thn_id_indikator_edit" readonly>
              <input type="hidden" class="form-control" id="id_program_rpjmd_indikator_edit" name="id_program_rpjmd_indikator_edit" readonly>
              <div class="form-group">
                <label for="id_sasaran_rpjmd_edit" class="col-sm-3 control-label" align='left'>ID Program RPJMD :</label>
                <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control" id="id_indikator_program_edit" name="id_indikator_program_edit" readonly>                  
                </div>
                </div>
              </div>
              <div class="form-group">
                <label for="no_urut_edit" class="col-sm-3 control-label" align='left'>Nomor Urut :</label>
                <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control" id="no_urut_indikator_edit" name="no_urut_indikator_edit" required="required" >                  
                </div>
                </div>
              </div>              
              <div class="form-group">
                <label for="id_perubahan_edit" class="col-sm-3 control-label" align='left'>ID Perubahan :</label>
                <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control" id="id_perubahan_indikator_edit" name="id_perubahan_indikator_edit" required="required" >                  
                </div>
                </div>
              </div>
              <div class="form-group">
                <label for="ur_program_rpjmd_edit" class="col-sm-3 control-label" align='left'>Uraian program RPJMD :</label>
                <div class="col-sm-8">
                  <textarea type="text" class="form-control" rows="5" id="ur_indikator_program_rpjmd_edit" name="ur_indikator_program_rpjmd_edit" required="required" ></textarea>
                </div>
              </div>
              <label class="col-sm-12" style="text-align: left;">Rincian Pagu Program RPJMD :</label>
              <br>
              <table id="tblPaguProgram" class="table table-bordered"  cellspacing="0" width="100%">
                      <thead style="background: #428bca; color: #fff">
                          <tr>
                            <th width="20%" style="text-align: center; vertical-align:middle">Pagu Tahun 1</th>
                            <th width="20%" style="text-align: center; vertical-align:middle">Pagu Tahun 2</th>
                            <th width="20%" style="text-align: center; vertical-align:middle">Pagu Tahun 3</th>
                            <th width="20%" style="text-align: center; vertical-align:middle">Pagu Tahun 4</th>
                            <th width="20%" style="text-align: center; vertical-align:middle">Pagu Tahun 5</th>
                          </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td width="20%" style="text-align: center; vertical-align:middle">
                              <input type="text" class="form-control number" id="indiprog1_edit" name="indiprog1_edit" style="text-align: right; ">
                            </td>
                            <td width="20%" style="text-align: center; vertical-align:middle">
                              <input type="text" class="form-control number" id="indiprog2_edit" name="indiprog2_edit" style="text-align: right; " >
                            </td>
                            <td width="20%" style="text-align: center; vertical-align:middle">
                              <input type="text" class="form-control number" id="indiprog3_edit" name="indiprog3_edit" style="text-align: right; " >
                            </td>
                            <td width="20%" style="text-align: center; vertical-align:middle">
                              <input type="text" class="form-control number" id="indiprog4_edit" name="indiprog4_edit" style="text-align: right; " >
                            </td>
                            <td width="20%" style="text-align: center; vertical-align:middle">
                              <input type="text" class="form-control number" id="indiprog5_edit" name="indiprog5_edit" style="text-align: right; " >
                            </td>
                          </tr>
                          <tr>
                            <td colspan="3" style="text-align: center; vertical-align:middle; font-weight: bold;">Pagu Total :
                            </td>
                            <td colspan="2" style="text-align: center; vertical-align:middle">
                              <input type="text" class="form-control number" id="indiprog_akhir_edit" name="indiprog_akhir_edit" style="text-align: right; " >
                            </td>
                          </tr>
                      </tbody>
                </table>
          </form>
        </div>
        <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-success actionBtn_program btn-labeled" data-dismiss="modal">
                            <span class="btn-label"><i class="glyphicon glyphicon-save"></i></span>Simpan</button>
                        <div class="or hidden"></div>
                        <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
      </div>
    </div>
  </div>

  <div id="ModalUrusan" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="post" onsubmit="return false;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" id="id_urbid_rpjmd_edit" name="id_urbid_rpjmd_edit">
            <input type="hidden" id="thn_urbid_rpjmd_edit" name="thn_urbid_rpjmd_edit">
            <input type="hidden" id="no_urbid_rpjmd_edit" name="no_urbid_rpjmd_edit">
            <input type="hidden" id="id_prog_urbid_rpjmd_edit" name="id_prog_urbid_rpjmd_edit">
            <div class="form-group">
              <label class="control-label col-sm-3" for="kd_urusan">Urusan Pemerintahan :</label>
              <div class="col-sm-8">
                <select type="text" class="form-control kd_urusan" id="kd_urusan" name="kd_urusan"></select>
              </div>
              </div>
              <div class="form-group">
              <label class="control-label col-sm-3" for="kd_bidang">Bidang :</label>
              <div class="col-sm-8">
                <select type="text" class="form-control kd_bidang" id="kd_bidang" name="kd_bidang"></select>
              </div>
            </div>
          </form>
        </div>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-12 text-right">
                      <div class="ui-group-buttons">
                         <button type="button" class="btn btn-labeled btn-success btnUrusan" data-dismiss="modal"><span class="btn-label"><i class="fa fa-floppy-o fa-lg fa-fw"></i></span> Simpan</button>
                         <div class="or"></div>
                        <button type="button" class="btn btn-labeled btn-warning" data-dismiss="modal" aria-hidden="true"><span class="btn-label"><i class="fa fa-sign-out fa-lg fa-fw"></i></span> Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
          </div>
        </div>
      </div>

  <div id="HapusUrusan" class="modal fade" role="dialog" tabindex="-1" data-focus-on="input:first" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id_urusan_rkpd_hapus" name="id_urusan_rkpd_hapus">
            <div class="alert alert-danger">
              <i class="fa fa-exclamation-triangle fa-2x fa-pull-left text-danger"  aria-hidden="true"></i>
                Yakin akan menghapus Bidang : <strong><span class="ur_bidang_del"></span></strong> dalam urusan <strong><span class="ur_urusan_del"></span></strong> ?
          </div>
        </div>
          <div class="modal-footer">
            <div class="ui-group-buttons">
              <button type="button" class="btn btn-labeled btn-danger btnDelUrusan" data-dismiss="modal" ><span class="btn-label"><i class="fa fa-trash fa-lg fa-fw"></i></span> Hapus</button>
              <div class="or"></div>
              <button type="button" class="btn btn-labeled btn-warning" data-dismiss="modal" aria-hidden="true"><span class="btn-label"><i class="fa fa-sign-out fa-lg fa-fw"></i></span> Tutup</button>
            </div>
          </div>
        </div>
      </div>
    </div>

{{-- Modal Pelaksana --}}
<div id="ModalPelaksana" class="modal fade" role="dialog" tabindex="-1" data-focus-on="input:first" data-backdrop="static">
<div class="modal-dialog modal-lg"  >
<div class="modal-content">
<div class="modal-header">
  <h3 class="modal-title" >Daftar Unit Pelaksana yang akan ditambahkan</h3>
</div>
<div class="modal-body">
<form class="form-horizontal" role="form" autocomplete='off' action="" onsubmit="return false;">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" id="id_urbid_pelaksana" name="id_urbid_pelaksana">
  <input type="hidden" id="thn_pelaksana" name="thn_pelaksana">
  <input type="hidden" id="no_pelaksana" name="no_pelaksana">
  <input type="hidden" id="id_pelaksana_rpjmd" name="id_pelaksana_rpjmd">
  <div class="form-group">
  <div class="col-sm-12">
    <table id='tblUnitPelaksana' class="table display compact table-striped table-bordered" width="100%">
        <thead>
              <tr>
                <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                <th width="85%" style="text-align: center; vertical-align:middle">Nama Unit</th>
                <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
              </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
  </div>
  </div>
</form>
</div>
<div class="modal-footer">
    <div class="row">
        <div class="col-sm-2 text-left"></div>
        <div class="col-sm-10 text-right">
            <button type="button" class="btn btn-sm btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                <span class="btn-label"><i class="glyphicon glyphicon-log-out"></i></span>Tutup</button>
        </div>
    </div>
</div> 
</div>
</div>
</div>

{{-- Modal Hapus Pelaksana --}}
<div id="HapusUnitPelaksana" class="modal fade" role="dialog" tabindex="-1" data-focus-on="input:first" data-backdrop="static">
  <div class="modal-dialog modal-xs">
  <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title"></h4>
    </div>
    <div class="modal-body">
        <input type="hidden" id="id_pelaksana_hapus" name="id_pelaksana_hapus">
        <input type="hidden" id="no_urut_hapus" name="no_urut_hapus">
        <div class="alert alert-danger">
          <i class="fa fa-exclamation-triangle fa-2x fa-pull-left text-danger"  aria-hidden="true"></i>
            Yakin akan menghapus Unit Pelaksana : <strong><span id="ur_pelaksana_hapus"></span></strong> ?
      </div>
    </div>
      <div class="modal-footer">
        <div class="ui-group-buttons">
          <button type="button" class="btn btn-labeled btn-danger btnDelPelaksana" data-dismiss="modal" ><span class="btn-label"><i class="fa fa-trash fa-lg fa-fw"></i></span> Hapus</button>
            <div class="or"></div>
          <button type="button" class="btn btn-labeled btn-warning" data-dismiss="modal" aria-hidden="true"><span class="btn-label"><i class="fa fa-sign-out fa-lg fa-fw"></i></span> Tutup</button>
        </div>
      </div>
  </div>
  </div>
</div>

{{-- Modal Dokumen RPJMD --}}
<div id="DokumenModal" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg"  >

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title">Detail Data Dokumen RPJMD</h3>
      </div>

    <!-- <form class="form-horizontal" role="form"> -->
      <div class="modal-body">
        <form class="form-horizontal" autocomplete='off'
          method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}" />

            <input type="hidden" name="id_rpjmd" id="id_rpjmd" />
            <input type="hidden" name="thn_id" id="thn_id" />


          <div class="form-group">
            <label for="txt_no_perda" class="col-sm-3 control-label" align='left'>Nomor perda :</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="txt_perda" name="no_perda" required="required">
            </div>
          </div>

          <div class="form-group">
            <label for="txt_tgl_perda" class="col-sm-3 control-label" align='left'>Tanggal Perda :</label>
            <div class="col-sm-3">
              <div class="input-group date" data-provide="datepicker">
                  <input type="text" class="form-control" data-date-format="mm/dd/yyyy">
                  <div class="input-group-addon">
                      <span class="glyphicon glyphicon-th"></span>
                  </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="txt_thn_awal" class="col-sm-3 control-label" align='left'>Periode RPJMD :</label>
            <div class="col-sm-2">
              <input type="text" class="form-control" id="txt_thn_awal" name="no_thn_awal" required="required">
            </div>
            <label for="txt_thn_akhir" class="col-sm-2 control-label" align='center'>sampai dengan </label>
            <div class="col-sm-2">
              <input type="text" class="form-control" id="txt_thn_akhir" name="no_thn_akhir" required="required">
            </div>
          </div>

          <div class="form-group">
            <label for="txt_kd_revisi" class="col-sm-3 control-label" align='left'>Kode Revisi :</label>
            <div class="col-sm-2">
              <input type="text" class="form-control" id="txt_kd_revisi" name="kd_revisi" required="required">
            </div>
          </div>

          <div class="form-group">
            <label for="txt_status" class="col-sm-3 control-label" align='left'>Status :</label>
            <div class="col-sm-3">
              <select class="form-control" id="id_status" name="status">
                        <option value="0">Draft</option>
                        <option value="1">Aktif</option>
                        <option value="2">Tidak Aktif</option>
            </select>
            </div>
          </div>
        <div class="form-group">
          <div class="modal-footer">
            <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-save"></i> Save</button>
            <button type="button" class="btn btn-default" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-log-out"></i> Close</button>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

  <div id="ModalProgress" class="modal fade modal-static" role="dialog" data-backdrop="static" tabindex="-1" data-focus-on="input:first">
    <div class="modal-dialog"  >
      <div class="modal-content" style="background-color: #5bc0de;">
        <div class="modal-body" style="background-color: #5bc0de;">
          <div style="text-align: center;">
          <h4><strong>Sedang proses...</strong></h4>
            <i class="fa fa-spinner fa-pulse fa-5x fa-fw text-info"></i>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript" language="javascript" class="init">
$(document).ready(function() {
  var id_visi_rpjmd;
  var id_misi_rpjmd;
  var id_tujuan_rpjmd;
  var id_sasaran_rpjmd;
  var id_kebijakan_rpjmd;
  var id_strategi_rpjmd;
  var id_program_rpjmd;
  var id_indikator_program;
  var id_urusan_program;
  var id_pelaksana_program;
  var tahun_rpjmd;
  
  function formatTgl(val_tanggal){
      var formattedDate = new Date(val_tanggal);
      var d = formattedDate.getDate();
      var m = formattedDate.getMonth();
      var y = formattedDate.getFullYear();
      var m_names = new Array("Januari", "Februari", "Maret", 
        "April", "Mei", "Juni", "Juli", "Agustus", "September", 
        "Oktober", "November", "Desember")

      var tgl= d + " " + m_names[m] + " " + y;
      return tgl;
  }

  function createPesan(message, type) {
    var html = '<div id="pesanx" class="alert alert-' + type + ' alert-dismissable flyover flyover-bottom in">';    
    html += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';   
    html += '<p><strong>'+message+'</strong></p>';
    html += '</div>';    
    $(html).hide().prependTo('#pesan').slideDown();

    setTimeout(function() {
        $('#pesanx').removeClass('in');
         }, 3500);
  };

  $('[data-toggle="popover"]').popover();
  $('#periode_awal').number(true,0,'','');
  $('#periode_akhir').number(true,0,'','');
  // $('.number').number(true,0,',', '.');

  $('#tanggal_rpjmd_x').datepicker({
    altField: "#tanggal_rpjmd",
    altFormat: "yy-mm-dd", 
    dateFormat: "dd MM yy",
  });

  $('#btn').click(function() {
    $("#tanggal_rpjmd_x").focus();
  });

  $('.page-alert .close').click(function(e) {
    e.preventDefault();
    $(this).closest('.page-alert').slideUp();
  });

  $('#n1').text("2018");
  $('#n2').text("2019");
  $('#n3').text("2020");
  $('#n4').text("2021");
  $('#n5').text("2022");

var DokRpjmdTbl;
function getDokRpjmd(){
  DokRpjmdTbl = $('#tblDokumen').DataTable( {
          processing: true,
          serverSide: true,
          responsive: true,
          dom : 'BFRTIP',                  
          autoWidth : false,
          order: [[0, 'asc']],
          bDestroy: true,
          language: {
                "decimal": ",",
                "thousands": "."},
          ajax: {"url": "./rancangan/getDokumen"},
          columns: [
                { data: 'no_urut','searchable': false, 'orderable':false, sClass: "dt-center"},
                { data: 'no_perda','searchable': false, 'orderable':false},
                { data: 'tgl_perda','searchable': false, 'orderable':false, sClass: "dt-center",render: 
                function (data) {
                          var date = new Date(data);
                          return formatTgl(date);}},
                { data: 'display_periode','searchable': false, 'orderable':false, sClass: "dt-center"},
                { data: 'display_revisi','searchable': false, 'orderable':false, sClass: "dt-center"},
                { data: 'display_status','searchable': false, 'orderable':false, sClass: "dt-center"},
                { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
              ]
        } );
};

getDokRpjmd();

$(document).on('click', '.addDokRpjmd', function() {
      $('#btnDokumen').removeClass('editDokumen');
      $('#btnDokumen').addClass('addDokumen');
      $('.modal-title').text('Tambah Dokumen Rancangan RPJMD');
      $('.form-horizontal').show();
      $('#btnDelDokumen').hide();
      $('#btnDokumen').show();
      $('#TambahDokumen').modal('show');
});

 $('#periode_awal').change(function() {
    var x = Number($('#periode_awal').val());
    $('#periode_akhir').val(x+5);
  });

$('.modal-footer').on('click', '.addDokumen', function() {
  $.ajaxSetup({
      headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });

    $.ajax({
      type: 'post',
      url: './rancangan/addDokRpjmd',
      data: {
        '_token': $('input[name=_token]').val(),
        'periode_awal': $('#periode_awal').val(),
        'periode_akhir': $('#periode_akhir').val(),
        'no_perda': $('#nomor_rpjmd').val(),
        'keterangan_dokumen': $('#uraian_perkada').val(),
        'tgl_perda': $('#tanggal_rpjmd').val(),
        'id_revisi': $('#jns_dok_rpjmd').val(),
      },
      success: function(data) {
        DokRpjmdTbl.ajax.reload();
        if(data.status_pesan==1){
          createPesan(data.pesan,"success");
        } else {
          createPesan(data.pesan,"danger");
        }
      }
    });
});

$(document).on('click', '.view-dokumen', function() {
  var data = DokRpjmdTbl.row( $(this).parents('tr') ).data();

      $('#btnDokumen').addClass('editDokumen');
      $('#btnDokumen').removeClass('addDokumen');
      $('.modal-title').text('Rincian Dokumen Rancangan RPJMD');
      $('.form-horizontal').show();
      $('#btnDelDokumen').hide();
      $('#btnDokumen').show();
      $('#id_rpjmd_dok').val(data.id_rpjmd);
      $('#periode_awal').val(data.periode_awal);
      $('#periode_akhir').val(data.periode_akhir);
      $('#nomor_rpjmd').val(data.no_perda);
      $('#uraian_perkada').val(data.keterangan_dokumen);
      $('#tanggal_rpjmd').val(data.tgl_perda);
      $('#tanggal_rpjmd_x').val(formatTgl(data.tgl_perda));
      $('#jns_dok_rpjmd').val(data.id_revisi);
      $('#TambahDokumen').modal('show');
});

 $('#periode_awal').change(function() {
    var x = Number($('#periode_awal').val());
    $('#periode_akhir').val(x+5);
  });

$('.modal-footer').on('click', '.editDokumen', function() {
  $.ajaxSetup({
      headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });

    $.ajax({
      type: 'post',
      url: './rancangan/editDokRpjmd',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_rpjmd': $('#id_rpjmd_dok').val(),
        'periode_awal': $('#periode_awal').val(),
        'periode_akhir': $('#periode_akhir').val(),
        'no_perda': $('#nomor_rpjmd').val(),
        'keterangan_dokumen': $('#uraian_perkada').val(),
        'tgl_perda': $('#tanggal_rpjmd').val(),
        'id_revisi': $('#jns_dok_rpjmd').val(),
      },
      success: function(data) {
        DokRpjmdTbl.ajax.reload();
        if(data.status_pesan==1){
          createPesan(data.pesan,"success");
        } else {
          createPesan(data.pesan,"danger");
        }
      }
    });
});

$(document).on('click', '.hapus-dokumen', function() {
    var data = DokRpjmdTbl.row( $(this).parents('tr') ).data();

	  $('#btnDelDokumen1').removeClass('delDokumen');
    $('#btnDelDokumen1').addClass('delDokumen');
    $('.form-horizontal').show();
    $('#id_dokumen_hapus').val(data.id_rpjmd);
    $('.ur_dokumen_del').html(data.no_perda);
    $('#HapusDokumen').modal('show');
	});

$('.modal-footer').on('click', '.delDokumen', function() {
  $.ajaxSetup({
      headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });

    $.ajax({
      type: 'post',
      url: './rancangan/delDokRpjmd',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_rpjmd': $('#id_dokumen_hapus').val(),
      },
      success: function(data) {
        DokRpjmdTbl.ajax.reload();
        if(data.status_pesan==1){
          createPesan(data.pesan,"success");
        } else {
          createPesan(data.pesan,"danger"); 
        }
      }
    });
});

  // var Visi = $('#tblVisi').DataTable( {
  //         processing: true,
  //         serverSide: true,
  //         responsive: true,
  //         dom : 'BFRTIP',                  
  //         autoWidth : false,
  //         order: [[0, 'asc']],
  //         bDestroy: true,
  //         language: {
  //               "decimal": ",",
  //               "thousands": "."},
  //         ajax: "{{url('./rpjmd/visi')}}",
  //         columns: [
  //               { data: 'id_visi_rpjmd','searchable': false, 'orderable':false, sClass: "dt-center"},
  //               { data: 'uraian_visi_rpjmd','searchable': false, 'orderable':false},
  //               { data: 'action', 'searchable': false, 'orderable':false }
  //             ]
  //       } );

  $(document).on('click', '.edit-visi', function() {
	    $('.actionBtn_visi').addClass('editVisi');
	    $('.modal-title').text('Edit Data Visi Daerah');
	    $('.form-horizontal').show();
	    $('#id_visi_rpjmd_edit').val($(this).data('id_visi_rpjmd'));
	    $('#thn_id_edit').val($(this).data('thn_id'));
	    $('#no_urut_edit').val($(this).data('no_urut'));
	    $('#id_rpjmd_edit').val($(this).data('id_rpjmd'));
	    $('#id_perubahan_edit').val($(this).data('id_perubahan'));
	    $('#ur_visi_rpjmd_edit').val($(this).data('uraian_visi_rpjmd'));
      $('#thn_periode_visi').val($('#periode_awal_rpjmd').text() + ' sampai dengan ' + $('#periode_akhir_rpjmd').text())
	    $('#EditVisi').modal('show');
	  });
  $('.modal-footer').on('click', '.editVisi', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });
      $.ajax({
          type: 'post',
          url: './rpjmd/editVisi',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_visi_rpjmd_edit': $('#id_visi_rpjmd_edit').val(),
              'thn_id_edit': $('#thn_id_edit').val(),
              'no_urut_edit': $('#no_urut_edit').val(),
              'id_rpjmd_edit': $('#id_rpjmd_edit').val(),
              'id_perubahan_edit': $('#id_perubahan_edit').val(),
              'ur_visi_rpjmd_edit': $('#ur_visi_rpjmd_edit').val(),
          },
          success: function(data) {
              $('#tblVisi').DataTable().ajax.reload();
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }
          }
      });
  });
  $('#tblVisi tbody').on( 'dblclick', 'tr', function () {

	    var data = Visi.row(this).data();

	    id_visi_rpjmd =  data.id_visi_rpjmd;
      tahun_rpjmd = data.thn_id;
	    $('.nav-tabs a[href="#misi"]').tab('show');
	      $('#tblMisi').DataTable().ajax.url("./rpjmd/misi/"+id_visi_rpjmd).load();

	});
  
  // var Misi = $('#tblMisi').DataTable( {
  //         processing: true,
  //         serverSide: true,
  //         dom: 'BFrtip',
  //         responsive: true,                
  //         autoWidth : false,
  //         order: [[0, 'asc']],
  //         bDestroy: true,
  //         language: {
  //               "decimal": ",",
  //               "thousands": "."},
  //          "ajax": {"url": "./rpjmd/misi/0"},
  //         "columns": [
  //               { data: 'id_visi_rpjmd','searchable': false,  sClass: "dt-center"},
  //               { data: 'no_urut','searchable': false, sClass: "dt-center"},
  //               { data: 'uraian_misi_rpjmd'},
  //               { data: 'action', 'searchable': false, 'orderable':false }]
  //       } );
  $(document).on('click', '.edit-misi', function() {
	    $('.actionBtn_misi').addClass('editMisi');
	    $('.modal-title').text('Edit Data Misi Daerah');
	    $('.form-horizontal').show();
	    $('#id_misi_rpjmd_edit').val($(this).data('id_misi_rpjmd_misi'));
	    $('#thn_id_misi_edit').val($(this).data('thn_id_misi'));
	    $('#no_urut_misi_edit').val($(this).data('no_urut_misi'));
	    $('#id_visi_rpjmd_misi_edit').val($(this).data('id_visi_rpjmd_misi'));
	    $('#id_perubahan_misi_edit').val($(this).data('id_perubahan_misi'));
	    $('#ur_misi_rpjmd_edit').val($(this).data('uraian_misi_rpjmd_misi'));
	    $('#EditMisi').modal('show');
	  });
  $('.modal-footer').on('click', '.editMisi', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });
      $.ajax({
          type: 'post',
          url: './rpjmd/editMisi',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_misi_rpjmd_edit': $('#id_misi_rpjmd_edit').val(),
              'thn_id_misi_edit': $('#thn_id_misi_edit').val(),
              'no_urut_misi_edit': $('#no_urut_misi_edit').val(),
              'id_visi_rpjmd_misi_edit': $('#id_visi_rpjmd_misi_edit').val(),
              'id_perubahan_misi_edit': $('#id_perubahan_misi_edit').val(),
              'ur_misi_rpjmd_edit': $('#ur_misi_rpjmd_edit').val(),
          },
          success: function(data) {
              $('#tblMisi').DataTable().ajax.reload();
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }
          }
      });
  });
  $('#tblMisi tbody').on( 'dblclick', 'tr', function () {

	    var data = Misi.row(this).data();

	    id_misi_rpjmd =  data.id_misi_rpjmd;
	    $('.nav-tabs a[href="#tujuan"]').tab('show');
	      $('#tblTujuan').DataTable().ajax.url("./rpjmd/tujuan/"+id_misi_rpjmd).load();
	});

  // var Tujuan = $('#tblTujuan').DataTable( {
  //         processing: true,
  //         serverSide: true,
  //         dom: 'BFrtip',
  //         responsive: true,                
  //         autoWidth : false,
  //         order: [[0, 'asc']],
  //         bDestroy: true,
  //         language: {
  //               "decimal": ",",
  //               "thousands": "."},
  //         "ajax": {"url": "./rpjmd/tujuan/0"},
  //         "columns": [
  //               { data: 'id_visi_rpjmd','searchable': false, 'orderable':false, sClass: "dt-center"},
  //               { data: 'id_misi','searchable': false, 'orderable':false, sClass: "dt-center"},
  //               { data: 'no_urut','searchable': false, sClass: "dt-center"},
  //               { data: 'uraian_tujuan_rpjmd'},
  //               { data: 'action', 'searchable': false, 'orderable':false }
  //             ]
  //       } );
  $(document).on('click', '.edit-tujuan', function() {

    var data = Tujuan.row( $(this).parents('tr') ).data();

	    $('.actionBtn_tujuan').addClass('edittujuan');
	    $('.modal-title').text('Edit Data Tujuan Daerah');
	    $('.form-horizontal').show();
	    $('#id_tujuan_rpjmd_edit').val($(this).data('id_tujuan_rpjmd_tujuan'));
	    $('#thn_id_tujuan_edit').val($(this).data('thn_id_tujuan'));
	    $('#no_urut_tujuan_edit').val($(this).data('no_urut_tujuan'));
	    $('#id_misi_rpjmd_tujuan_edit').val($(this).data('id_misi_rpjmd_tujuan'));
	    $('#id_perubahan_tujuan_edit').val($(this).data('id_perubahan_tujuan'));
	    $('#ur_tujuan_rpjmd_edit').val($(this).data('uraian_tujuan_rpjmd_tujuan'));
      $('#id_misi_tujuan_edit').val(data.id_misi);
	    $('#EditTujuan').modal('show');
	  });

$('.modal-footer').on('click', '.edittujuan', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
        type: 'post',
        url: './rpjmd/edittujuan',
        data: {
            '_token': $('input[name=_token]').val(),
            'id_tujuan_rpjmd_edit': $('#id_tujuan_rpjmd_edit').val(),
            'thn_id_tujuan_edit': $('#thn_id_tujuan_edit').val(),
            'no_urut_tujuan_edit': $('#no_urut_tujuan_edit').val(),
            'id_misi_rpjmd_tujuan_edit': $('#id_misi_rpjmd_tujuan_edit').val(),
            'id_perubahan_tujuan_edit': $('#id_perubahan_tujuan_edit').val(),
            'ur_tujuan_rpjmd_edit': $('#ur_tujuan_rpjmd_edit').val(),
        },
        success: function(data) {
            $('#tblTujuan').DataTable().ajax.reload();
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }

        }
    });
});

$('#tblTujuan tbody').on( 'dblclick', 'tr', function () {
	    var data = Tujuan.row(this).data();

      // alert('test');

	    id_tujuan_rpjmd =  data.id_tujuan_rpjmd;
	    $('.nav-tabs a[href="#sasaran"]').tab('show');
      $('#tblSasaran').DataTable().ajax.url("./rpjmd/sasaran/"+id_tujuan_rpjmd).load();
});
	  
  // var Sasaran = $('#tblSasaran').DataTable( {
  //         processing: true,
  //         serverSide: true,
  //         dom: 'BFrtip',
  //         responsive: true,                
  //         autoWidth : false,
  //         order: [[0, 'asc']],
  //         bDestroy: true,
  //         language: {
  //               "decimal": ",",
  //               "thousands": "."},
  //         "ajax": {"url": "./rpjmd/sasaran/0"},
  //         "columns": [
  //               { data: 'id_visi_rpjmd', sClass: "dt-center"},
  //               { data: 'id_misi', sClass: "dt-center"},
  //               { data: 'id_tujuan', sClass: "dt-center"},
  //               { data: 'no_urut', sClass: "dt-center"},
  //               { data: 'uraian_sasaran_rpjmd'},
  //               { data: 'action', 'searchable': false, 'orderable':false }
  //             ]
  //       } );

  $(document).on('click', '.edit-sasaran', function() {
	    var data = Sasaran.row( $(this).parents('tr') ).data();

	    $('.actionBtn_sasaran').addClass('editsasaran');
	    $('.modal-title').text('Edit Data sasaran Daerah');
	    $('.form-horizontal').show();
	    $('#id_sasaran_rpjmd_edit').val($(this).data('id_sasaran_rpjmd_sasaran'));
	    $('#thn_id_sasaran_edit').val($(this).data('thn_id_sasaran'));
	    $('#no_urut_sasaran_edit').val($(this).data('no_urut_sasaran'));
	    $('#id_tujuan_rpjmd_sasaran_edit').val($(this).data('id_tujuan_rpjmd_sasaran'));
	    $('#id_perubahan_sasaran_edit').val($(this).data('id_perubahan_sasaran'));
	    $('#ur_sasaran_rpjmd_edit').val($(this).data('uraian_sasaran_rpjmd_sasaran'));
      $('#id_tujuan_sasaran_edit').val(data.id_tujuan);
	    $('#Editsasaran').modal('show');
	  });

$('.modal-footer').on('click', '.editsasaran', function() {
  $.ajaxSetup({
     headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });

  $.ajax({
      type: 'post',
      url: './rpjmd/editsasaran',
      data: {
          '_token': $('input[name=_token]').val(),
          'id_sasaran_rpjmd_edit': $('#id_sasaran_rpjmd_edit').val(),
          'thn_id_sasaran_edit': $('#thn_id_sasaran_edit').val(),
          'no_urut_sasaran_edit': $('#no_urut_sasaran_edit').val(),
          'id_tujuan_rpjmd_sasaran_edit': $('#id_tujuan_rpjmd_sasaran_edit').val(),
          'id_perubahan_sasaran_edit': $('#id_perubahan_sasaran_edit').val(),
          'ur_sasaran_rpjmd_edit': $('#ur_sasaran_rpjmd_edit').val(),
      },
      success: function(data) {
          $('#tblSasaran').DataTable().ajax.reload();
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }
      }
  });
});

$('#tblSasaran tbody').on( 'dblclick', 'tr', function () {

    var data = Sasaran.row(this).data();

    id_sasaran_rpjmd =  data.id_sasaran_rpjmd;
    $('.nav-tabs a[href="#program"]').tab('show');
      $('#tblProgram').DataTable().ajax.url("./rpjmd/program/"+id_sasaran_rpjmd).load();

  } );
  // var Kebijakan = $('#tblKebijakan').DataTable( {
  //         processing: true,
  //         serverSide: true,          
  //         dom: 'BFrtip',
  //         responsive: true,                
  //         autoWidth : false,
  //         order: [[0, 'asc']],
  //         bDestroy: true,
  //         language: {
  //               "decimal": ",",
  //               "thousands": "."},
  //         "ajax": {"url": "./rpjmd/kebijakan/0"},
  //         "columns": [
  //               { data: 'id_visi_rpjmd', sClass: "dt-center"},
  //               { data: 'id_misi', sClass: "dt-center"},
  //               { data: 'id_tujuan', sClass: "dt-center"},
  //               { data: 'id_sasaran', sClass: "dt-center"},
  //               { data: 'no_urut', sClass: "dt-center"},
  //               { data: 'uraian_kebijakan_rpjmd'},
  //               { data: 'action', 'searchable': false, 'orderable':false }
  //           ]
  //       } );
  $(document).on('click', '.edit-kebijakan', function() {
      var data = Kebijakan.row( $(this).parents('tr') ).data();

	    $('.actionBtn_kebijakan').addClass('editkebijakan');
	    $('.modal-title').text('Edit Data kebijakan Daerah');
	    $('.form-horizontal').show();
	    $('#id_kebijakan_rpjmd_edit').val($(this).data('id_kebijakan_rpjmd_kebijakan'));
	    $('#thn_id_kebijakan_edit').val($(this).data('thn_id_kebijakan'));
	    $('#no_urut_kebijakan_edit').val($(this).data('no_urut_kebijakan'));
	    $('#id_sasaran_rpjmd_kebijakan_edit').val($(this).data('id_sasaran_rpjmd_kebijakan'));
	    $('#id_perubahan_kebijakan_edit').val($(this).data('id_perubahan_kebijakan'));
	    $('#ur_kebijakan_rpjmd_edit').val($(this).data('uraian_kebijakan_rpjmd_kebijakan'));
      $('#id_sasaran_kebijakan_edit').val(data.id_sasaran);
	    $('#Editkebijakan').modal('show');
	  });

$('.modal-footer').on('click', '.editkebijakan', function() {
  $.ajaxSetup({
     headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
  });

  $.ajax({
      type: 'post',
      url: './rpjmd/editkebijakan',
      data: {
          '_token': $('input[name=_token]').val(),
          'id_kebijakan_rpjmd_edit': $('#id_kebijakan_rpjmd_edit').val(),
          'thn_id_kebijakan_edit': $('#thn_id_kebijakan_edit').val(),
          'no_urut_kebijakan_edit': $('#no_urut_kebijakan_edit').val(),
          'id_sasaran_rpjmd_kebijakan_edit': $('#id_sasaran_rpjmd_kebijakan_edit').val(),
          'id_perubahan_kebijakan_edit': $('#id_perubahan_kebijakan_edit').val(),
          'ur_kebijakan_rpjmd_edit': $('#ur_kebijakan_rpjmd_edit').val(),
      },
      success: function(data) {
          $('#tblKebijakan').DataTable().ajax.reload();
          if(data.status_pesan==1){
            createPesan(data.pesan,"success");
          } else {
            createPesan(data.pesan,"danger"); 
          }
      }
  });
});

// var Strategi = $('#tblStrategi').DataTable( {
//           processing: true,
//           serverSide: true,
//           dom: 'BFrtip',
//           responsive: true,                
//           autoWidth : false,
//           order: [[0, 'asc']],
//           bDestroy: true,
//           language: {
//                 "decimal": ",",
//                 "thousands": "."},
//           "ajax": {"url": "./rpjmd/strategi/0"},
//           "columns": [
//                 { data: 'id_visi_rpjmd', sClass: "dt-center"},
//                 { data: 'id_misi', sClass: "dt-center"},
//                 { data: 'id_tujuan', sClass: "dt-center"},
//                 { data: 'id_sasaran', sClass: "dt-center"},
//                 { data: 'no_urut', sClass: "dt-center"},
//                 { data: 'uraian_strategi_rpjmd'},
//                 { data: 'action', 'searchable': false, 'orderable':false }
//             ]
//         } );

  $(document).on('click', '.edit-strategi', function() {
      var data = Strategi.row( $(this).parents('tr') ).data();

	    $('.actionBtn_strategi').addClass('editstrategi');
	    $('.modal-title').text('Edit Data strategi Daerah');
	    $('.form-horizontal').show();
	    $('#id_strategi_rpjmd_edit').val($(this).data('id_strategi_rpjmd_strategi'));
	    $('#thn_id_strategi_edit').val($(this).data('thn_id_strategi'));
	    $('#no_urut_strategi_edit').val($(this).data('no_urut_strategi'));
	    $('#id_sasaran_rpjmd_strategi_edit').val($(this).data('id_sasaran_rpjmd_strategi'));
	    $('#id_perubahan_strategi_edit').val($(this).data('id_perubahan_strategi'));
	    $('#ur_strategi_rpjmd_edit').val($(this).data('uraian_strategi_rpjmd_strategi'));
      $('#id_sasaran_strategi_edit').val(data.id_sasaran);
	    $('#Editstrategi').modal('show');
	  });

$('.modal-footer').on('click', '.editstrategi', function() {
$.ajaxSetup({
 headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});
		//alert($('input[name=_token]').val());
$.ajax({
  type: 'post',
  url: './rpjmd/editstrategi',
  data: {
      '_token': $('input[name=_token]').val(),
      'id_strategi_rpjmd_edit': $('#id_strategi_rpjmd_edit').val(),
      'thn_id_strategi_edit': $('#thn_id_strategi_edit').val(),
      'no_urut_strategi_edit': $('#no_urut_strategi_edit').val(),
      'id_sasaran_rpjmd_strategi_edit': $('#id_sasaran_rpjmd_strategi_edit').val(),
      'id_perubahan_strategi_edit': $('#id_perubahan_strategi_edit').val(),
      'ur_strategi_rpjmd_edit': $('#ur_strategi_rpjmd_edit').val(),
  },
  success: function(data) {
      $('#tblStrategi').DataTable().ajax.reload();
      if(data.status_pesan==1){
        createPesan(data.pesan,"success");
      } else {
        createPesan(data.pesan,"danger"); 
      }
  }
});
});

  // var Program = $('#tblProgram').DataTable( {
  //         processing: true,
  //         serverSide: true,
  //         dom: 'BFrtip',
  //         responsive: true,                
  //         autoWidth : false,
  //         order: [[0, 'asc']],
  //         bDestroy: true,
  //         language: {
  //               "decimal": ",",
  //               "thousands": "."},
  //         "ajax": {"url": "./rpjmd/program/0"},
  //         "language": {
  //               "decimal": ",",
  //               "thousands": "."},
  //         "columns": [
  //               { data: 'kd_sasaran', sClass: "dt-center"},
  //               { data: 'no_urut', sClass: "dt-center"},
  //               { data: 'uraian_program_rpjmd'},
  //               { data: 'pagu_tahun1',
  //                 render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
  //               { data: 'pagu_tahun2',
  //                 render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
  //               { data: 'pagu_tahun3',
  //                 render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
  //               { data: 'pagu_tahun4',
  //                 render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
  //               { data: 'pagu_tahun5',
  //                 render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
  //               { data: 'total_pagu',
  //                 render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right"},
  //               { data: 'action', 'searchable': false, 'orderable':false }
  //           ],
  //           "columnDefs": [ {
  //                 "visible": false
  //             } ]
  //         } );
  $(document).on('click', '.edit-program', function() {

      var data = Program.row( $(this).parents('tr') ).data();

	    $('.actionBtn_program').addClass('editprogram');
	    $('.modal-title').text('Edit Data program Daerah');
	    $('.form-horizontal').show();
	    $('#id_program_rpjmd_edit').val($(this).data('id_program_rpjmd_program'));
	    $('#thn_id_program_edit').val($(this).data('thn_id_program'));
	    $('#no_urut_program_edit').val($(this).data('no_urut_program'));
	    $('#id_sasaran_rpjmd_program_edit').val($(this).data('id_sasaran_rpjmd_program'));
	    $('#id_perubahan_program_edit').val($(this).data('id_perubahan_program'));
	    $('#pagu1_edit').val($(this).data('pagu_tahun1_program'));
	    $('#pagu2_edit').val($(this).data('pagu_tahun2_program'));
	    $('#pagu3_edit').val($(this).data('pagu_tahun3_program'));
	    $('#pagu4_edit').val($(this).data('pagu_tahun4_program'));
	    $('#pagu5_edit').val($(this).data('pagu_tahun5_program'));
	    $('#ur_program_rpjmd_edit').val($(this).data('uraian_program_rpjmd_program'));
      $('#id_sasaran_program_edit').val(data.id_sasaran);
      $('#pagu_total_edit').val(data.total_pagua);

      // $('#thn_id_program_edit').setAttribute('readonly','readonly');

	    $('#Editprogram').modal('show');
	  });

$('.modal-footer').on('click', '.editprogram', function() {
$.ajaxSetup({
   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});

$.ajax({
    type: 'post',
    url: './rpjmd/editprogram',
    data: {
        '_token': $('input[name=_token]').val(),
        'id_program_rpjmd_edit': $('#id_program_rpjmd_edit').val(),
        'thn_id_program_edit': $('#thn_id_program_edit').val(),
        'no_urut_program_edit': $('#no_urut_program_edit').val(),
        'id_sasaran_rpjmd_program_edit': $('#id_sasaran_rpjmd_program_edit').val(),
        'id_perubahan_program_edit': $('#id_perubahan_program_edit').val(),
        'pagu1_edit': $('#pagu1_edit').val(),
        'pagu2_edit': $('#pagu2_edit').val(),
        'pagu3_edit': $('#pagu3_edit').val(),
        'pagu4_edit': $('#pagu4_edit').val(),
        'pagu5_edit': $('#pagu5_edit').val(),
        'pagu_total_edit': $('#pagu_total_edit').val(),
        'ur_program_rpjmd_edit': $('#ur_program_rpjmd_edit').val(),
    },
    success: function(data) {
        $('#tblProgram').DataTable().ajax.reload();
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
                } else {
                createPesan(data.pesan,"danger"); 
              }
    }
});
});

function hitungpagu_program(){
  var a = Number($('#pagu1_edit').val()); 
  var b = Number($('#pagu2_edit').val()); 
  var c = Number($('#pagu3_edit').val()); 
  var d = Number($('#pagu4_edit').val()); 
  var e = Number($('#pagu5_edit').val());

  var x = a+b+c+d+e;
  $('#pagu_total_edit').val(x);
}

$( "#pagu1_edit" ).change(function() {
  hitungpagu_program();
});

$( "#pagu2_edit" ).change(function() {
  hitungpagu_program();
});

$( "#pagu3_edit" ).change(function() {
  hitungpagu_program();
});

$( "#pagu4_edit" ).change(function() {
  hitungpagu_program();
});

$( "#pagu5_edit" ).change(function() {
  hitungpagu_program();
});

$('#tblProgram tbody').on( 'dblclick', 'tr', function () {

  var data = Program.row(this).data();

  id_program_rpjmd =  data.id_program_rpjmd;
  $('.nav-tabs a[href="#urusan"]').tab('show');
  $('#tblUrusan').DataTable().ajax.url("./rpjmd/programurusan/"+id_program_rpjmd).load();
  $('#tblPelaksana').DataTable().ajax.url("./rpjmd/programpelaksana/0").load();

  $.ajax({

          type: "GET",
          url: './rpjmd/getUrusan/'+id_program_rpjmd,
          dataType: "json",

          success: function(data) {

          var j = data.length;
          var post, i;

          $('select[name="kd_urusan"]').empty();
          $('select[name="kd_urusan"]').append('<option value="-1">---Pilih Urusan Pemerintahan---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="kd_urusan"]').append('<option value="'+ post.kd_urusan +'">'+ post.nm_urusan +'</option>');
          }
          }
      });

});

  // var IndikatorProg = $('#tblIndikatorProgram').DataTable( {
  //       processing: true,
  //       serverSide: true,
  //         dom: 'bfrtip',
  //         responsive: true,                
  //         autoWidth : false,
  //         order: [[0, 'asc']],
  //         bDestroy: true,
  //         language: {
  //               "decimal": ",",
  //               "thousands": "."},
  //       "ajax": {"url": "./rpjmd/programindikator/0"},
  //       "columns": [
  //             { data: 'kd_program', sClass: "dt-center"},
  //             { data: 'no_urut', sClass: "dt-center"},
  //             { data: 'uraian_indikator_program_rpjmd'},
  //             { data: 'angka_tahun1',
  //                   render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
  //             { data: 'angka_tahun2',
  //                   render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
  //             { data: 'angka_tahun3',
  //                   render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
  //             { data: 'angka_tahun4',
  //                   render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},
  //             { data: 'angka_tahun5',
  //                   render: $.fn.dataTable.render.number( '.', ',', 2, '' ), sClass: "dt-right"},                    
  //             { data: 'action', 'searchable': false, 'orderable':false }
  //             ],
  //       "columnDefs": [ {
  //             "visible": false
  //             } ]
  //       } );

  // var UrusanProg = $('#tblUrusan').DataTable( {
  //       processing: true,
  //       serverSide: true,
  //         dom: 'BFrtip',
  //         responsive: true,                
  //         autoWidth : false,
  //         order: [[0, 'asc']],
  //         bDestroy: true,
  //         language: {
  //               "decimal": ",",
  //               "thousands": "."},
  //       "ajax": {"url": "./rpjmd/programurusan/0"},
  //       "columns": [
  //               { data: 'kd_program', sClass: "dt-center"},
  //               { data: 'kode_bid', sClass: "dt-center"},
  //               { data: 'nm_urusan'},
  //               { data: 'nm_bidang'},
  //               { data: 'action', 'searchable': false, 'orderable':false }
  //             ]
  //       } );

  
  $(document).on('click', '.add-urbidprog', function() {

      $.ajax({
          type: "GET",
          url: './rpjmd/getBidang/0',
          dataType: "json",

          success: function(data) {
            var j = data.length;
            var post, i;

            $('select[name="kd_bidang"]').empty();
            $('select[name="kd_bidang"]').append('<option value="-1">---Pilih Kode Bidang---</option>');

            for (i = 0; i < j; i++) {
              post = data[i];
              $('select[name="kd_bidang"]').append('<option value="'+ post.id_bidang +'">'+ post.nm_bidang +'</option>');
            }
          }
      });

      $('.btnUrusan').addClass('addUrusan');
      $('.btnUrusan').removeClass('editUrusan');
      $('.modal-title').text('Tambah Urusan dan Bidang Pemerintahan RPJMD');
      $('.form-horizontal').show();
      $('#id_urbid_rpjmd_edit').val(null);
      $('#thn_urbid_rpjmd_edit').val(tahun_rpjmd);
      $('#no_urbid_rpjmd_edit').val(99);
      $('#id_prog_urbid_rpjmd_edit').val(id_program_rpjmd);
      $('#kd_urusan option[value="-1"]').attr("selected",true);

      $('#ModalUrusan').modal('show');
    });

  $( ".kd_urusan" ).change(function() {      
      $.ajax({
          type: "GET",
          url: './rpjmd/getBidang/'+$('.kd_urusan').val(),
          dataType: "json",

          success: function(data) {
            var j = data.length;
            var post, i;

            $('select[name="kd_bidang"]').empty();
            $('select[name="kd_bidang"]').append('<option value="-1">---Pilih Kode Bidang---</option>');

            for (i = 0; i < j; i++) {
              post = data[i];
              $('select[name="kd_bidang"]').append('<option value="'+ post.id_bidang +'">'+ post.nm_bidang +'</option>');
            }
          }
      });
  });

  $('.modal-footer').on('click', '.addUrusan', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: './rpjmd/addUrusan',
          data: {
              '_token': $('input[name=_token]').val(),
              // id_urbid_rpjmd_edit
              'thn_id': $('#thn_urbid_rpjmd_edit').val(),
              'no_urut': $('#no_urbid_rpjmd_edit').val(),
              'id_program_rpjmd': $('#id_prog_urbid_rpjmd_edit').val(),
              'id_bidang': $('#kd_bidang').val(),
          },
          success: function(data) {             
              $('#tblUrusan').DataTable().ajax.reload();
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
              } else {
                createPesan(data.pesan,"danger"); 
              }             
          }
      });
  });

  $(document).on('click', '.edit-urbidprog', function() {

      var data = UrusanProg.row( $(this).parents('tr') ).data();

      $.ajax({

          type: "GET",
          url: './rpjmd/getBidang/'+data.kd_urusan,
          dataType: "json",

          success: function(data) {
            var j = data.length;
            var post, i;

            $('select[name="kd_bidang"]').empty();
            // $('select[name="kd_bidang"]').append('<option value="-1">---Pilih Kode Bidang---</option>');

            for (i = 0; i < j; i++) {
              post = data[i];
              $('select[name="kd_bidang"]').append('<option value="'+ post.id_bidang +'">'+ post.nm_bidang +'</option>');
            }
          }
      });

      $('.btnUrusan').addClass('editUrusan');
      $('.btnUrusan').removeClass('addUrusan');
      $('.modal-title').text('Tambah Urusan dan Bidang Pemerintahan RPJMD');
      $('.form-horizontal').show();
      $('#id_urbid_rpjmd_edit').val(data.id_urbid_rpjmd);
      $('#thn_urbid_rpjmd_edit').val(data.thn_id);
      $('#no_urbid_rpjmd_edit').val(data.no_urut);
      $('#id_prog_urbid_rpjmd_edit').val(data.id_program_rpjmd);
      $('#kd_urusan option[value="'+data.kd_urusan+'"]').attr("selected",true);
      $('#kd_bidang option[value="'+data.id_bidang+'"]').attr("selected",true);

      $('#ModalUrusan').modal('show');
  });

  $('.modal-footer').on('click', '.editUrusan', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: './rpjmd/editUrusan',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_urbid_rpjmd' : $('#id_urbid_rpjmd_edit').val(),
              'thn_id': $('#thn_urbid_rpjmd_edit').val(),
              'no_urut': $('#no_urbid_rpjmd_edit').val(),
              'id_program_rpjmd': $('#id_prog_urbid_rpjmd_edit').val(),
              'id_bidang': $('#kd_bidang').val(),
          },
          success: function(data) {             
              $('#tblUrusan').DataTable().ajax.reload();
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
              } else {
                createPesan(data.pesan,"danger"); 
              }             
          }
      });
  });

  $(document).on('click', '.del-urbidprog', function() {
    var data = UrusanProg.row( $(this).parents('tr') ).data();

    $('.btnDelUrusan').addClass('delUrusanRPJMD');
    $('.modal-title').text('Hapus Urusan - Bidang pada RPJMD');
    $('#id_urusan_rkpd_hapus').val(data.id_urbid_rpjmd);
    $('.ur_bidang_del').html(data.nm_bidang);
    $('.ur_urusan_del').html(data.nm_urusan);

    $('#HapusUrusan').modal('show');
  });

  $('.modal-footer').on('click', '.delUrusanRPJMD', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      type: 'post',
      url: './rpjmd/delUrusan',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_urbid_rpjmd': $('#id_urusan_rkpd_hapus').val()
      },
      success: function(data) {
        $('#tblUrusan').DataTable().ajax.reload();
        $('#tblPelaksana').DataTable().ajax.reload();
        if(data.status_pesan==1){
          createPesan(data.pesan,"success");
        } else {
          createPesan(data.pesan,"danger"); 
        } 
      }
    });
  });

  $(document).on('click', '.repivot-renstra', function() {
    // var data = UrusanProg.row(this).data();
    var data = Program.row( $(this).parents('tr') ).data();

    $('#ModalProgress').modal('show');

      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: './rpjmd/RePivotRenstra',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_program_rpjmd': data.id_program_rpjmd,
          },
          success: function(data) {             
              Program.ajax.reload();                            
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
              } else {
                createPesan(data.pesan,"danger"); 
              }

              setTimeout(function() {
                $('#ModalProgress').modal('hide');
              }, 3500);             
          },
          error: function(data) {             
              Program.ajax.reload();
              setTimeout(function() {
                $('#ModalProgress').modal('hide');
              }, 3500);             
          }
      });    
  });

  $(document).on('click', '.post-urbidprog', function() {
    // var data = UrusanProg.row(this).data();
    var data = Program.row( $(this).parents('tr') ).data();

    $('#ModalProgress').modal('show');

      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: './rpjmd/ReprosesPivotPelaksana',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_program_rpjmd': data.id_program_rpjmd,
              // 'id_urbid_rpjmd': data.id_urbid_rpjmd,
          },
          success: function(data) {             
              Program.ajax.reload();                            
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
              } else {
                createPesan(data.pesan,"danger"); 
              }

              setTimeout(function() {
                $('#ModalProgress').modal('hide');
              }, 3500);             
          },
          error: function(data) {             
              Program.ajax.reload();
              setTimeout(function() {
                $('#ModalProgress').modal('hide');
              }, 3500);             
          }
      });    
  });

  var id_bidang_temp;
  $('#tblUrusan tbody').on( 'dblclick', 'tr', function () {
    var data = UrusanProg.row(this).data();

    id_urusan_program =  data.id_urbid_rpjmd;
    id_bidang_temp = data.id_bidang;

    $('.nav-tabs a[href="#pelaksana"]').tab('show');
    $('#tblPelaksana').DataTable().ajax.url("./rpjmd/programpelaksana/"+id_urusan_program).load();
  });  

  // var PelaksanaProg = $('#tblPelaksana').DataTable( {
  //       processing: true,
  //       serverSide: true,
  //         dom: 'BFrtip',
  //         responsive: true,                
  //         autoWidth : false,
  //         order: [[0, 'asc']],
  //         bDestroy: true,
  //         language: {
  //               "decimal": ",",
  //               "thousands": "."},
  //       "ajax": {"url": "./rpjmd/programpelaksana/0"},
  //       "columns": [
  //               { data: 'kd_program', sClass: "dt-center"},
  //               { data: 'kd_unit', sClass: "dt-center"},
  //               { data: 'nm_unit'},
  //               { data: 'action', 'searchable': false, 'orderable':false }
  //             ]
  //       } );

  var UnitPelaksana;
  function loadTblUnitPelaksana(id_program,id_bidang){
    UnitPelaksana=$('#tblUnitPelaksana').DataTable({
                  processing: true,
                  serverSide: true,
                  responsive: true,  
                  autoWidth : false,
                  dom : 'BFRtIp',
                  "ajax": {"url": "./rpjmd/getUnitPelaksana/"+id_program+"/"+id_bidang},
                  "language": {
                      "decimal": ",",
                      "thousands": "."},
                  "columns": [
                        { data: 'kd_unit', sClass: "dt-center"},
                        { data: 'nm_unit'},
                        { data: 'action', 'searchable': false, 'orderable':false, sClass: "dt-center" }
                      ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
        });
  }

  $(document).on('click', '.add-pelaksanaprog', function() {

    // var data = UrusanProg.row( $(this).parents('tr') ).data();

      $('.form-horizontal').show();
      $('.modal-title').text('Daftar Unit Pelaksana yang dapat ditambahkan');
      $('#id_urbid_pelaksana').val(id_urusan_program);
      $('#thn_pelaksana').val(tahun_rpjmd);
      $('#no_pelaksana').val(99);
      $('#id_pelaksana_rpjmd').val(null);

      loadTblUnitPelaksana(id_program_rpjmd,id_bidang_temp);

      $('#ModalPelaksana').modal('show');
  });

  $(document).on('click', '.add-unitpelaksana', function() {

      var data = UnitPelaksana.row( $(this).parents('tr') ).data();

      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });

      $.ajax({
          type: 'post',
          url: './rpjmd/addPelaksana',
          data: {
              '_token': $('input[name=_token]').val(),
              'thn_id': $('#thn_pelaksana').val(),
              'id_urbid_rpjmd': $('#id_urbid_pelaksana').val(),
              'no_urut': $('#no_pelaksana').val(),
              'id_unit': data.id_unit,
          },
          success: function(data) {             
              $('#tblPelaksana').DataTable().ajax.reload();
              $('#ModalPelaksana').modal('hide'); 
              if(data.status_pesan==1){
                createPesan(data.pesan,"success");
              } else {
                createPesan(data.pesan,"danger"); 
              }             
          }
      });
  });

  $(document).on('click', '.del-pelaksanaprog', function() {
    var data = PelaksanaProg.row( $(this).parents('tr') ).data();

    $('.btnDelPelaksana').addClass('delUnitPelaksana');
    $('.modal-title').text('Hapus Pelaksana pada RPJMD');
    $('#no_urut_hapus').val(data.no_urut);
    $('#id_pelaksana_hapus').val(data.id_pelaksana_rpjmd);
    $('#ur_pelaksana_hapus').html(data.nm_unit);

    $('#HapusUnitPelaksana').modal('show');
  });

  $('.modal-footer').on('click', '.delUnitPelaksana', function() {
    $.ajaxSetup({
       headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $.ajax({
      type: 'post',
      url: './rpjmd/delPelaksana',
      data: {
        '_token': $('input[name=_token]').val(),
        'id_pelaksana_rpjmd': $('#id_pelaksana_hapus').val()
      },
      success: function(data) {
        $('#tblPelaksana').DataTable().ajax.reload();
        if(data.status_pesan==1){
          createPesan(data.pesan,"success");
        } else {
          createPesan(data.pesan,"danger"); 
        } 
      }
    });
  });  
  
  $(document).on('click', '.view-rpjmdtujuan', function() {
      id_misi_rpjmd =  $(this).data('id_misi');
      $('.nav-tabs a[href="#tujuan"]').tab('show');
      $('#tblTujuan').DataTable().ajax.url("./rpjmd/tujuan/"+id_misi_rpjmd).load();
      $('#tblSasaran').DataTable().ajax.url("./rpjmd/sasaran/0").load();
    });

  $(document).on('click', '.view-rpjmdsasaran', function() {
      id_tujuan_rpjmd =  $(this).data('id_tujuan');
      $('.nav-tabs a[href="#sasaran"]').tab('show');
      $('.nav-tabs a[href="#sasaran1"]').tab('show');
      $('#tblSasaran').DataTable().ajax.url("./rpjmd/sasaran/"+id_tujuan_rpjmd).load();
      $('#tblKebijakan').DataTable().ajax.url("./rpjmd/kebijakan/0").load();
      $('#tblStrategi').DataTable().ajax.url("./rpjmd/strategi/0").load();
    });

  $(document).on('click', '.view-rpjmdkebijakan', function() {
      id_sasaran_rpjmd =  $(this).data('id_sasaran');
      $('.nav-tabs a[href="#kebijakan"]').tab('show');
      $('#tblKebijakan').DataTable().ajax.url("./rpjmd/kebijakan/"+id_sasaran_rpjmd).load();
    });

  $(document).on('click', '.view-rpjmdstrategi', function() {
      id_sasaran_rpjmd =  $(this).data('id_sasaran');
      $('.nav-tabs a[href="#strategi"]').tab('show');
      $('#tblStrategi').DataTable().ajax.url("./rpjmd/strategi/"+id_sasaran_rpjmd).load();
    });
  $(document).on('click', '.view-rpjmdprogram', function() {
      id_sasaran_rpjmd =  $(this).data('id_sasaran');
      $('.nav-tabs a[href="#program"]').tab('show');
      $('.nav-tabs a[href="#program1"]').tab('show');
      $('#tblProgram').DataTable().ajax.url("./rpjmd/program/"+id_sasaran_rpjmd).load();
      $('#tblIndikatorProgram').DataTable().ajax.url("./rpjmd/programindikator/0").load();
      $('#tblUrusan').DataTable().ajax.url("./rpjmd/programurusan/0").load();
      $('#tblPelaksana').DataTable().ajax.url("./rpjmd/programpelaksana/0").load();
    });
  $(document).on('click', '.view-rpjmdindikator', function() {
      id_program_rpjmd =  $(this).data('id_program');
      $('.nav-tabs a[href="#indikatorprogram"]').tab('show');
      $('#tblIndikatorProgram').DataTable().ajax.url("./rpjmd/programindikator/"+id_program_rpjmd).load();
    });
  $(document).on('click', '.view-rpjmdurusan', function() {
      id_program_rpjmd =  $(this).data('id_program');
      $('.nav-tabs a[href="#urusan"]').tab('show');
      $('#tblUrusan').DataTable().ajax.url("./rpjmd/programurusan/"+id_program_rpjmd).load();
      $('#tblPelaksana').DataTable().ajax.url("./rpjmd/programpelaksana/0").load();
    });
  $(document).on('click', '.view-rpjmdpelaksana', function() {
      id_urusan_program =  $(this).data('id_urusan');
      $('.nav-tabs a[href="#pelaksana"]').tab('show');
      $('#tblPelaksana').DataTable().ajax.url("./rpjmd/programpelaksana/"+id_urusan_program).load();
    });

  $(document).on('click', '.btnPrintRPJMDTSK', function() {  
   window.open('./printRPJMDTSK');  
  });

  $(document).on('click', '.btnPrintProgPrio', function() {    
    window.open('./printProgPrio');    
  });

  $(document).on('click', '.btnPrintKompilasiProgramdanPagu', function() {
    window.open('./PrintKompilasiProgramdanPagu');
  });

  });
</script>
@endsection
