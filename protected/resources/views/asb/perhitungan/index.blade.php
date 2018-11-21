<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.app0')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
            <?php
                $this->title = ' Perkada tentang Analiasa Standar Belanja ';
                $breadcrumb = new Breadcrumb();
                $breadcrumb->homeUrl = '/';
                $breadcrumb->begin();
                $breadcrumb->add(['url' => '/modul0','label' => 'SSH dan ASB']);
                $breadcrumb->add(['url' => '/modul0','label' => 'ASB']);
                $breadcrumb->add(['label' => $this->title]);
                $breadcrumb->end();
            ?>          
      </div>
    </div>
    <div id="pesan"></div>
<div class="row">
      <div class="col-md-12">
      <div class="panel panel-success">
          <div class="panel-heading">
          <p><h2 class="panel-title">Perhitungan Analisa Standard Belanja per Tahun</h2></p>
          </div>

          <div class="panel-body">
          <div class='tabs-x tabs-above tab-bordered tabs-krajee'>
          <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#perkada" aria-controls="perkada" role="tab" data-toggle="tab">Tahun Perhitungan</a></li>
            <li><a href="#kelompok" role="tab" data-toggle="tab">Kelompok</a></li>
            <li><a href="#subkelompok" role="tab" data-toggle="tab">Sub Kelompok</a></li>
            <li><a href="#subsubkelompok" role="tab" data-toggle="tab">Sub Sub Kelompok</a></li>            
            <li><a href="#detailzona" role="tab" data-toggle="tab">Zona Wilayah SSH</a></li>
            <li><a href="#detailaktivitas" role="tab" data-toggle="tab">Aktivitas</a></li>
            <li><a href="#detailkomponen" role="tab" data-toggle="tab">Komponen</a></li>
            <li><a href="#detailrincian" role="tab" data-toggle="tab">Rincian Komponen</a></li>
          </ul>

          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="perkada">
              <br>
              <div class="ui-group-buttons">
                  <a class="test-hitung btn btn-labeled btn-primary" role="button"><span class="btn-label"><i class="fa fa-file-text-o fa-fw fa-lg"></i></span>Pencetakan Perhitungan ASB</a>
                  <div class="or"></div>
                  <a class="add-hitungasb btn btn-labeled btn-success" role="button"><span class="btn-label"><i class="fa fa-calculator fa-fw fa-lg" aria-hidden="true"></i></span>Proses Perhitungan ASB </a>
              </div>
              <div class="table-responsive">
              <table id='tblPerkada' class="table display compact table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th width="105%" style="text-align: center; vertical-align:middle">Tahun Perhitungan</th>
                          <th style="text-align: center; vertical-align:middle">No Perkada ASB</th>
                          <th width="10%" style="text-align: center; vertical-align:middle">Tgl Perkada</th>
                          <th width="10%" style="text-align: center; vertical-align:middle">Status</th>
                          <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                  </tbody>
            </table>
          </div>
            </div>            
            <div role="tabpanel" class="tab-pane" id="kelompok">
            <br>
              <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
              <div class="table-responsive">
                <table class="table table-striped table-bordered">
                  <tbody>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">No Perkada</td>
                      <td style="text-align: left; vertical-align:top;"><label id="no_perkada_kel" align='left'></label></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              </form>
              <div id="divKelompok">
                <div class="table-responsive">
                <table id="tblKelompok" class="table display compact table-striped table-bordered"  cellspacing="0" width="100%">
                      <thead>
                          <tr>
                              <th width="10%" style="text-align: center; vertical-align:middle">No Urut</th>
                              <th style="text-align: center; vertical-align:middle">Uraian Kelompok Aktivitas</th>
                          </tr>
                      </thead>
                      <tbody>
                      </tbody>
                </table>
                </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="subkelompok">
            <br>
              <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
              <div class="table-responsive">
                <table class="table table-striped table-bordered">
                  <tbody>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">No Perkada</td>
                      <td id="" name="" style="text-align: left; vertical-align:top;"><label id="no_perkada_subkel" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nama Kelompok</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_kel_subkel" align='left'></label></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              </form>
              <div id="divSubKelompok">
                <div class="table-responsive">
                <table id="tblSubKelompok" class="table display compact table-striped table-bordered"  cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="10%" style="text-align: center; vertical-align:middle">No Urut</th>
                            <th style="text-align: center; vertical-align:middle">Uraian Sub Kelompok Aktivitas</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
              </table>
              </div>
            </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="subsubkelompok">
            <br>
              <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
              <div class="table-responsive">
                <table class="table table-striped table-bordered">
                  <tbody>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">No Perkada</td>
                      <td id="" name="" style="text-align: left; vertical-align:top;"><label id="no_perkada_sskel" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nama Kelompok</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_kel_sskel" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nama Sub Kelompok</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_subkel_sskel" align='left'></label></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              </form>
              <div id="divSubSubKel">
                <div class="table-responsive">
                <table id="tblSubSubKelompok" class="table display compact table-striped"  cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="10%" style="text-align: center; vertical-align:middle">No Urut</th>
                            <th style="text-align: center; vertical-align:middle">Uraian Sub Sub Kelompok Aktivitas</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
              </div>
            </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="detailzona">
            <br>
              <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
              <div class="table-responsive">
                <table class="table table-striped table-bordered">
                  <tbody>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">No Perkada</td>
                      <td id="" name="" style="text-align: left; vertical-align:top;"><label id="no_perkada_zona" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nama Kelompok</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_kel_zona" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nama Sub Kelompok</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_subkel_zona" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nama Sub Kelompok</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_subsubkel_zona" align='left'></label></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              </form>
              <div id="divZona">
                <div class="table-responsive">
                <table id="tblZona" class="table display compact table-striped table-bordered"  cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="10%" style="text-align: center; vertical-align:middle">No Urut</th>
                            <th style="text-align: center; vertical-align:middle">Uraian Zona Wilayah SSH</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                </div>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="detailaktivitas">
            <br>
              <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
              <div class="table-responsive">
                <table class="table table-striped table-bordered">
                  <tbody>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">No Perkada</td>
                      <td id="" name="" style="text-align: left; vertical-align:top;"><label id="no_perkada_aktiv" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nama Kelompok</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_kel_aktiv" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nama Sub Kelompok</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_subkel_aktiv" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nama Sub Sub Kelompok</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_subsubkel_aktiv" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nama Zona Wilayah</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_zona_aktiv" align='left'></label></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              </form>
              <div id="divAktivitas">
                <div class="table-responsive">
                  <table id="tblAktivitas" class="table display compact table-striped table-bordered"  cellspacing="0" width="100%">
                      <thead>
                          <tr>
                              <th width="10%" style="text-align: center; vertical-align:middle">No Urut</th>
                              <th style="text-align: center; vertical-align:middle">Uraian Aktivitas</th>
                              <th width="10%" style="text-align: center; vertical-align:middle">Pemicu Biaya 1</th>
                              <th width="10%" style="text-align: center; vertical-align:middle">Pemicu Biaya 2</th>
                              <th width="15%" style="text-align: center; vertical-align:middle">Jumlah Pagu</th>
                              <th width="10%" style="text-align: center; vertical-align:middle">Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                      </tbody>
                </table>
              </div>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="detailkomponen">
            <br>
              <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
              <div class="table-responsive">
                <table class="table table-striped table-bordered">
                  <tbody>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">No Perkada</td>
                      <td id="" name="" style="text-align: left; vertical-align:top;"><label id="no_perkada_komp" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nama Kelompok</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_kel_komp" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nama Sub Kelompok</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_subkel_komp" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nama Sub Sub Kelompok</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_subsubkel_komp" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nama Zona Wilayah</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_zona_komp" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nama Aktivitas</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_aktiv_komp" align='left'></label></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              </form>
              <div class="table-responsive">
              <table id="tblKomponen" class="table display compact table-striped table-bordered"  cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                          <th style="text-align: center; vertical-align:middle">Nama Komponen</th>
                          <th width="10%" style="text-align: center; vertical-align:middle">Kode Rekening</th>
                          <th style="text-align: center; vertical-align:middle">Nama Rekening</th>
                          <th width="15%" style="text-align: center; vertical-align:middle">Jumlah Pagu</th>
                      </tr>
                  </thead>
                  <tbody>
                  </tbody>
            </table>
          </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="detailrincian">
            <br>
            <form class="form-horizontal col-sm-12" role="form" autocomplete='off' action="" method="" >
              <div class="table-responsive">
                <table class="table table-striped table-bordered">
                  <tbody>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">No Perkada</td>
                      <td id="" name="" style="text-align: left; vertical-align:top;"><label id="no_perkada_rinc" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nama Kelompok</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_kel_rinc" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nama Sub Kelompok</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_subkel_rinc" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nama Sub Sub Kelompok</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_subsubkel_rinc" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nama Zona Wilayah</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_zona_rinc" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nama Aktivitas</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_aktiv_rinc" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="15%" style="text-align: left; vertical-align:top;">Nama Komponen</td>
                      <td style="text-align: left; vertical-align:top;"><label id="nm_komp_rinc" align='left'></label></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              </form>
              <div id="divRincian">
              {{-- <div class="table-responsive"> --}}
              <table id="tblRincian" class="table display compact table-striped table-bordered table-responsive"  cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="5%" style="text-align: center; vertical-align:middle">No Urut</th>
                            <th style="text-align: center; vertical-align:middle">Nama Komponen</th>
                            <th width="10%" style="text-align: center; vertical-align:middle">Jenis Biaya</th>
                            <th width="10%" style="text-align: center; vertical-align:middle">Harga Satuan</th>
                            <th width="5%" style="text-align: center; vertical-align:middle">Koef 1</th>
                            <th width="5%" style="text-align: center; vertical-align:middle">Koef 2</th>
                            <th width="5%" style="text-align: center; vertical-align:middle">Koef 3</th>
                            <th width="15%" style="text-align: center; vertical-align:middle">Jml Pagu</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
              </table>
              {{-- </div> --}}
              </div>
            </div>            
          </div>
          </div>
          </div>
        </div>
  </div>
  </div>
</div>

  <div id="ProsesHitung" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> --}}
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group">
                <label for="tahun_perhitungan" class="col-sm-3 control-label" align='left'>Tahun Perhitungan :</label>
                <div class="col-sm-8">
      					 	<select class="form-control" name="tahun_perhitungan" id="tahun_perhitungan">
      					 		@foreach($reftahun as $val)
                      <option value={{ $val->tahun }}>{{ $val->tahun }}</option>
      					 		@endforeach
      					 	</select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="id_perkada">Nomor Perkada ASB :</label>
                <div class="col-sm-8">
      					 	<select class="form-control" name="id_perkada" id="id_perkada">
      					 		@foreach($refperkada as $val)
                      <option value={{ $val->id_asb_perkada }}>{{ $val->nomor_perkada }}</option>
      					 		@endforeach
      					 	</select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="id_zona">Zona dalam Perkada ASB :</label>
                <div class="col-sm-8">
                  <select class="form-control" name="id_zona" id="id_zona">
                    @foreach($refZona as $val)
                      <option value={{ $val->id_zona }}>{{ $val->keterangan_zona }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
          </form>
        </div>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusBelanja">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn btn-success btnProses btn-labeled">
                            <span class="btn-label"><i class="fa fa-calculator fa-fw fa-lg"></i></span>Proses Hitung</button>
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

  <div id="SimulasiHitung" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> --}}
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="" onsubmit="return false;">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group">
                    <label class="control-label col-sm-3" for="title">Nomor Perkada :</label>
                    <div class="col-sm-8">
                      <input type="text" id="nomor_perkada_simulasi" name="nomor_perkada_simulasi" class="form-control"  readonly>
                    </div>
                    <input type="hidden" id="aktivitas_simulasi" name="aktivitas_simulasi">
                    <input type="hidden" id="id_perkada_aktivitas" name="id_perkada_aktivitas">
                    <span class="btn btn-sm btn-primary btnCariASB" id="btnCariASB" name="btnCariASB" title="Pemilihan Aktivitas ASB yang akan disimulasikan"><i class="fa fa-search fa-fw fa-lg"></i></span>
                </div>
              <div class="form-group">
                    <label class="control-label col-sm-3" for="title">Aktivitas ASB :</label>
                    <div class="col-sm-8">
                      <textarea type="name" class="form-control" id="ur_aktivitas_kegiatan" rows="3" disabled></textarea>
                    </div>
                </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="id_perkada">Volume Pemicu Biaya 1 :</label>
                <div class="col-sm-2">
                  <input type="text" class="form-control number" id="v1_simulasi" name="v1_simulasi" style="text-align: right;">
                </div>
                <label class="control-label col-sm-3" id="ur_satuan_1"></label>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="id_perkada">Volume Pemicu Biaya 2 :</label>
                <div class="col-sm-2">
                  <input type="text" class="form-control number" id="v2_simulasi" name="v2_simulasi" style="text-align: right;">
                </div>
                <label class="control-label col-sm-3" id="ur_satuan_2"></label>
              </div>
          </form>
        </div>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusBelanja">
                    {{-- <button type="button" class="btn  btn-default btnCetakAktivitas  btn-labeled">
                            <span class="btn-label"><i class="fa fa-print fa-fw fa-lg"></i></span>Cetak Rumus Aktivitas</button> --}}
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn  btn-success btnSimulasi btn-labeled" data-dismiss="modal" >
                            <span class="btn-label"><i id="fooSimulasi" class="fa fa-eye fa-fw fa-lg"></i></span>Preview</button>
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
    </div>

      <!--Modal Komponen Hapus -->
  <div id="UbahStatus" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
        <form name="frmUbahStatus" class="form-horizontal" role="form" autocomplete='off' action="" method="" onsubmit="return false;">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" id="id_perhitungan_status" name="id_perhitungan_status">
              <table class="table table-striped table-bordered">
                  <tbody>
                    <tr>
                      <td width="35%" style="text-align: left; vertical-align:top;"><b>Tahun Perhitungan</b></td>
                      <td id="" name="" style="text-align: left; vertical-align:top;"><label id="tahun_perhitungan_status" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="35%" style="text-align: left; vertical-align:top;"><b>No Perkada</b></td>
                      <td id="" name="" style="text-align: left; vertical-align:top;"><label id="no_perkada_status" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="35%" style="text-align: left; vertical-align:top;"><b>Status Perhitungan</b></td>
                      <td id="" name="" style="text-align: left; vertical-align:top;">
                            <label class="radio-inline">
                              <input type="radio" class="status_hitung" name="status_hitung" id="status_hitung" value="0">Draft</label>
                            <label class="radio-inline">
                              <input type="radio" class="status_hitung" name="status_hitung" id="status_hitung" value="1">Aktif</label>
                            <label class="radio-inline">
                              <input type="radio" class="status_hitung" name="status_hitung" id="status_hitung" value="2">Non Aktif</label>
                      </td>
                    </tr>
                  </tbody>
              </table>
          </form>
        </div>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusBelanja">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn  btn-primary btnUbahStatus btn-labeled" data-dismiss="modal" >
                            <span class="btn-label"><i id="fooSimulasi" class="fa fa-floppy-o fa-fw fa-lg"></i></span>Update</button>
                        <div class="or"></div>
                        <button type="button" class="btn  btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="fa fa-sign-out fa-fw fa-lg"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
        </div>
      </div>
    </div>

    <div id="HapusHitung" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
          {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
        <form name="frmHapusHitung" class="form-horizontal" role="form" autocomplete='off' action="" method="" onsubmit="return false;">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" id="id_perhitungan_hapus" name="id_perhitungan_hapus">
              <table class="table table-striped table-bordered">
                  <tbody>
                    <tr>
                      <td width="35%" style="text-align: left; vertical-align:top;"><b>Tahun Perhitungan</b></td>
                      <td id="" name="" style="text-align: left; vertical-align:top;"><label id="tahun_perhitungan_hapus" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="35%" style="text-align: left; vertical-align:top;"><b>No Perkada</b></td>
                      <td id="" name="" style="text-align: left; vertical-align:top;"><label id="no_perkada_hapus" align='left'></label></td>
                    </tr>
                    <tr>
                      <td width="35%" style="text-align: left; vertical-align:top;"><b>Status Perhitungan</b></td>
                      <td id="" name="" style="text-align: left; vertical-align:top;"><label id="status_hitung_hapus" align='left'></label></td>
                    </tr>
                  </tbody>
              </table>
          </form>
        </div>
          <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-2 text-left idbtnHapusBelanja">
                    </div>
                    <div class="col-sm-10 text-right">
                      <div class="ui-group-buttons">
                        <button type="button" class="btn  btn-danger btnHapusHitung btn-labeled" data-dismiss="modal" >
                            <span class="btn-label"><i id="fooSimulasi" class="fa fa-trash fa-fw fa-lg"></i></span>Hapus</button>
                        <div class="or"></div>
                        <button type="button" class="btn  btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="fa fa-sign-out fa-fw fa-lg"></i></span>Tutup</button>
                      </div>
                    </div>
                </div>
              </div>
        </div>
      </div>
    </div>

<div id="cariAktivitasASB" class="modal fade" role="dialog" data-backdrop="static" tabindex="-1" data-focus-on="input:first">
    <div class="modal-dialog modal-lg"  >
      <div class="modal-content">
        <div class="modal-header">
          <h4 style="text-align: center;">Daftar Aktivitas ASB</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" autocomplete='off' action="" method="" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group">
                <label for="tahun_simulasi" class="col-sm-3 control-label" align='left'>Tahun Perhitungan :</label>
                <div class="col-sm-3">
                  <select class="form-control tahun_simulasi" name="tahun_simulasi" id="tahun_simulasi">
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="id_perkada_simulasi">Nomor Perkada ASB :</label>
                <div class="col-sm-6">
                  <select class="form-control id_perkada_simulasi" name="id_perkada_simulasi" id="id_perkada_simulasi">
                  </select>
                </div>                                  
                <span class="btn btn-sm btn-success btnLoadASB" id="btnLoadASB" name="btnLoadASB" title="Refresh Data Tabel ASB"><i class="fa fa-refresh fa-fw fa-lg"></i></span>
              </div>
            <div class="form-group hidden">
              <label class="control-label col-sm-3" for="">Zona Wilayah SSH :</label>
              <div class="col-sm-8">
                <select type="text" class="form-control zona_ssh_load" id="zona_ssh_load" name="zona_ssh_load"></select>
              </div>
            </div> 
           <div class="form-group">
             <div class="col-sm-12">
                <table id='tblCariAktivitasASB' class="table display compact table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                          <tr>
                            <th width="5%" style="text-align: center; vertical-align:middle;">No Urut</th>
                            <th style="text-align: center; vertical-align:middle;">Uraian Aktivitas ASB</th>
                            <th width="5%" style="text-align: center; vertical-align:middle;">Aksi</th>
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
                    <div class="col-sm-2 text-left">
                    </div>
                    <div class="col-sm-10 text-right">
                        <button type="button" class="btn btn-warning btn-labeled" data-dismiss="modal" aria-hidden="true">
                            <span class="btn-label"><i class="fa fa-sign-out fa-fw fa-lg"></i></span>Tutup</button>
                    </div>
                </div>
        </div>
      </div>
    </div>
</div>

<div id="ModalProgress" class="modal fade modal-static" role="dialog" data-backdrop="static" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
        <div class="text-center">
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
  var id_sk_asb;
  var id_hitung_asb;
  var id_kel_asb;
  var id_subkel_asb;
  var id_subsubkel_asb;
  var id_aktiv_asb;
  var id_komp_asb;
  var id_rinci_asb;
  var nm_sk_asb;
  var nm_kel_asb;
  var nm_subkel_asb;
  var nm_subsubkel_asb;
  var nm_aktiv_asb;
  var nm_komp_asb;
  var nm_rinci_asb;
  var flag_perkada;
  var id_zona_asb;
  var nm_zona_asb;

  $('[data-toggle="popover"]').popover();

function createPesan(message, type) {
    var html = '<div class="alert alert-' + type + ' alert-dismissable page-alert col-md-12">';    
    html += '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
    html += message;
    html += '</div>';    
    $(html).hide().prependTo('#pesan').slideDown();
};

$('.number').number(true,2,',', '.');


$('.page-alert .close').click(function(e) {
        e.preventDefault();
        $(this).closest('.page-alert').slideUp();
    });


$('.display').DataTable({
    dom : 'BfrtIp',
    autoWidth : false,
    "bDestroy": true
});


  var perkada = $('#tblPerkada').DataTable( {
      processing: true,
      serverSide: true,
      "ajax": {"url":"./hitungasb/datahitung"},
      dom: 'bFrtip',
      "autoWidth": false,
      "columns": [
            { data: 'tahun_perhitungan', sClass: "dt-center",width:"10px"},
            { data: 'nomor_perkada'},
            { data: 'tanggal_perkada', sClass: "dt-center",width:"50px",
              render: function (data) {
              var date = new Date(data);
              return date.getDate() + "-" + (date.getMonth()+1) + "-" + date.getFullYear();
            }},
            { data: 'status_perkada', sClass: "dt-center",width:"10px"},
            { data: 'action', 'searchable': false, 'orderable':false,width:"10%", sClass: "dt-center"}
            ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
  } );

  $('#tblPerkada tbody').on( 'dblclick', 'tr', function () {

    var data = perkada.row(this).data();

    id_sk_asb =  data.id_perkada;
    nm_sk_asb =  data.nomor_perkada;
    id_hitung_asb = data.id_perhitungan;
    flag_perkada = data.flag_aktif;

    document.getElementById("no_perkada_kel").innerHTML = data.nomor_perkada;
    
    $('.nav-tabs a[href="#kelompok"]').tab('show');
    $('#tblKelompok').DataTable().ajax.url("./hitungasb/datakelompok/"+id_hitung_asb).load();

  } );

  var kelompok = $('#tblKelompok').DataTable( {
      processing: true,
      serverSide: true,
      dom: 'BFrtip',
    autoWidth : false,
      "ajax": {"url":"./hitungasb/datakelompok/0"},
      "language": {
          "decimal": ",",
          "thousands": "."},
      "columns": [
            { data: 'no_urut', sClass: "dt-center" },
            { data: 'uraian_kelompok_asb'},
            // { data: 'jml_pagu',
            //   render: $.fn.dataTable.render.number( '.', ',', 0, 'Rp ' )}
            ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
  } );



  $('#tblKelompok tbody').on( 'dblclick', 'tr', function () {

    var data = kelompok.row(this).data();

    id_sk_asb =  data.id_perkada;
    nm_sk_asb =  data.nomor_perkada;
    id_hitung_asb = data.id_perhitungan;
    flag_perkada = data.flag_aktif;
    id_kel_asb = data.id_asb_kelompok;
    nm_kel_asb = data.uraian_kelompok_asb;

    document.getElementById("no_perkada_subkel").innerHTML =data.nomor_perkada;
    document.getElementById("nm_kel_subkel").innerHTML =data.uraian_kelompok_asb;
    
    $('.nav-tabs a[href="#subkelompok"]').tab('show');
    $('#tblSubKelompok').DataTable().ajax.url("./hitungasb/datasubkelompok/"+id_kel_asb+"/"+id_hitung_asb).load();

  } );

  var subkelompok = $('#tblSubKelompok').DataTable( {
      processing: true,
      serverSide: true,
      dom: 'BFrtip',
    autoWidth : false,
      "ajax": {"url":"./hitungasb/datasubkelompok/0/0"},
      "language": {
          "decimal": ",",
          "thousands": "."},
      "columns": [
            { data: 'no_urut', sClass: "dt-center" },
            { data: 'uraian_sub_kelompok_asb'},
            // { data: 'jml_pagu',
            //   render: $.fn.dataTable.render.number( '.', ',', 0, 'Rp ' )}
            ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
  } );

  $('#tblSubKelompok tbody').on( 'dblclick', 'tr', function () {

    var data = subkelompok.row(this).data();

    id_sk_asb =  data.id_asb_perkada;
    nm_sk_asb =  data.nomor_perkada;
    flag_perkada = data.flag;
    id_kel_asb = data.id_asb_kelompok;
    nm_kel_asb = data.uraian_kelompok_asb;
    id_subkel_asb = data.id_asb_sub_kelompok;
    nm_subkel_asb = data.uraian_sub_kelompok_asb;

    document.getElementById("no_perkada_aktiv").innerHTML =data.nomor_perkada;
    document.getElementById("nm_kel_aktiv").innerHTML =data.uraian_kelompok_asb;
    document.getElementById("nm_subkel_aktiv").innerHTML =data.uraian_sub_kelompok_asb;

    $('.nav-tabs a[href="#subsubkelompok"]').tab('show');
    $('#tblSubSubKelompok').DataTable().ajax.url("./hitungasb/datasubsubkelompok/"+id_subkel_asb+"/"+id_hitung_asb).load();

  } );

  var subsubkelompok = $('#tblSubSubKelompok').DataTable( {
      processing: true,
      serverSide: true,
      dom: 'BFrtip',
    autoWidth : false,
      "ajax": {"url":"./hitungasb/datasubsubkelompok/0/0"},
      "language": {
          "decimal": ",",
          "thousands": "."},
      "columns": [
            { data: 'no_urut', sClass: "dt-center" },
            { data: 'uraian_sub_sub_kelompok_asb'},
            // { data: 'jml_pagu',
            //   render: $.fn.dataTable.render.number( '.', ',', 0, 'Rp ' )}
            ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
  } );

  $('#tblSubSubKelompok tbody').on( 'dblclick', 'tr', function () {

    var data = subsubkelompok.row(this).data();

    id_sk_asb =  data.id_asb_perkada;
    nm_sk_asb =  data.nomor_perkada;
    flag_perkada = data.flag;
    id_kel_asb = data.id_asb_kelompok;
    nm_kel_asb = data.uraian_kelompok_asb;
    id_subkel_asb = data.id_asb_sub_kelompok;
    nm_subkel_asb = data.uraian_sub_kelompok_asb;
    id_subsubkel_asb = data.id_asb_sub_sub_kelompok;
    nm_subsubkel_asb = data.uraian_sub_sub_kelompok_asb;

    document.getElementById("no_perkada_zona").innerHTML =data.nomor_perkada;
    document.getElementById("nm_kel_zona").innerHTML =data.uraian_kelompok_asb;
    document.getElementById("nm_subkel_zona").innerHTML =data.uraian_sub_kelompok_asb;
    document.getElementById("nm_subsubkel_zona").innerHTML =data.uraian_sub_sub_kelompok_asb;

    $('.nav-tabs a[href="#detailzona"]').tab('show');
    $('#tblZona').DataTable().ajax.url("./hitungasb/datazona/"+id_subsubkel_asb+"/"+id_hitung_asb).load();

  } );


    var zona_tbl = $('#tblZona').DataTable( {
        processing: true,
        serverSide: true,
        deferRender: true,
        dom: 'BFrtip',
    autoWidth : false,
        "ajax": {"url": "./hitungasb/datazona/0/0"},
        "language": {
                "decimal": ",",
                "thousands": "."},
        "columns": [
              { data: 'no_urut', sClass: "dt-center" },
              { data: 'keterangan_zona'}
              ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
  });

  $('#tblZona tbody').on( 'dblclick', 'tr', function () {

    var data = zona_tbl.row(this).data();

    id_sk_asb =  data.id_asb_perkada;
    nm_sk_asb =  data.nomor_perkada;
    flag_perkada = data.flag;
    id_kel_asb = data.id_asb_kelompok;
    nm_kel_asb = data.uraian_kelompok_asb;
    id_subkel_asb = data.id_asb_sub_kelompok;
    nm_subkel_asb = data.uraian_sub_kelompok_asb;
    id_subsubkel_asb = data.id_asb_sub_sub_kelompok;
    nm_subsubkel_asb = data.uraian_sub_sub_kelompok_asb;
    id_zona_asb = data.id_zona;
    nm_zona_asb = data.keterangan_zona;

    document.getElementById("no_perkada_aktiv").innerHTML =data.nomor_perkada;
    document.getElementById("nm_kel_aktiv").innerHTML =data.uraian_kelompok_asb;
    document.getElementById("nm_subkel_aktiv").innerHTML =data.uraian_sub_kelompok_asb;
    document.getElementById("nm_subsubkel_aktiv").innerHTML =data.uraian_sub_sub_kelompok_asb;
    document.getElementById("nm_zona_aktiv").innerHTML =data.keterangan_zona;

    $('.nav-tabs a[href="#detailaktivitas"]').tab('show');
    $('#tblAktivitas').DataTable().ajax.url("./hitungasb/dataaktivitas/"+id_subsubkel_asb+"/"+id_hitung_asb+"/"+id_zona_asb).load();

  } );

  var aktivitas = $('#tblAktivitas').DataTable( {
        processing: true,
        serverSide: true,
        deferRender: true,
        dom: 'BFrtip',
    autoWidth : false,
        "ajax": {"url": "./hitungasb/dataaktivitas/0/0/0"},
        "language": {
                "decimal": ",",
                "thousands": "."},
        "columns": [
              { data: 'no_urut', sClass: "dt-center" },
              { data: 'nm_aktivitas_asb'},
              { data: 'satuan1', sClass: "dt-center" },
              { data: 'satuan2', sClass: "dt-center" },
              { data: 'jml_pagu',
                render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right" },
              { data: 'action', 'searchable': false, 'orderable':false}
              ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
  });

  $('#tblAktivitas tbody').on( 'dblclick', 'tr', function () {

    var data = aktivitas.row(this).data();

    id_sk_asb =  data.id_asb_perkada;
    nm_sk_asb =  data.nomor_perkada;
    flag_perkada = data.flag;
    id_kel_asb = data.id_asb_kelompok;
    nm_kel_asb = data.uraian_kelompok_asb;
    id_subkel_asb = data.id_asb_sub_kelompok;
    nm_subkel_asb = data.uraian_sub_kelompok_asb;
    id_subsubkel_asb = data.id_asb_sub_sub_kelompok;
    nm_subsubkel_asb = data.uraian_sub_sub_kelompok_asb;
    id_aktiv_asb = data.id_aktivitas_asb;
    nm_aktiv_asb = data.nm_aktivitas_asb;

    document.getElementById("no_perkada_komp").innerHTML =data.nomor_perkada;
    document.getElementById("nm_kel_komp").innerHTML =data.uraian_kelompok_asb;
    document.getElementById("nm_subkel_komp").innerHTML =data.uraian_sub_kelompok_asb;
    document.getElementById("nm_subsubkel_komp").innerHTML =data.uraian_sub_sub_kelompok_asb;
    document.getElementById("nm_aktiv_komp").innerHTML =data.nm_aktivitas_asb;
    document.getElementById("nm_zona_komp").innerHTML =nm_zona_asb;

    $('.nav-tabs a[href="#detailkomponen"]').tab('show');
    $('#tblKomponen').DataTable().ajax.url("./hitungasb/datakomponen/"+id_aktiv_asb+"/"+id_hitung_asb+"/"+id_zona_asb).load();

  } );  

  var komponen = $('#tblKomponen').DataTable( {
        // retrieve: true,
        processing: true,
        serverSide: true,
        deferRender: true,
    autoWidth : false,
        dom: 'BFrtip',
        "ajax": {"url": "./hitungasb/datakomponen/0/0/0"},
        "language": {
                "decimal": ",",
                "thousands": "."},
        "columns": [
              { data: 'no_urut', sClass: "dt-center" },
              { data: 'nm_komponen_asb'},
              { data: 'kd_rekening', sClass: "dt-center" },
              { data: 'nm_rekening'},
              { data: 'jml_pagu',
                render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right" }
            ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
  });


  $('#tblKomponen tbody').on( 'dblclick', 'tr', function () {

    var data = komponen.row(this).data();

    id_sk_asb =  data.id_asb_perkada;
    nm_sk_asb =  data.nomor_perkada;
    flag_perkada = data.flag;
    id_kel_asb = data.id_asb_kelompok;
    nm_kel_asb = data.uraian_kelompok_asb;
    id_subkel_asb = data.id_asb_sub_kelompok;
    nm_subkel_asb = data.uraian_sub_kelompok_asb;
    id_subsubkel_asb = data.id_asb_sub_sub_kelompok;
    nm_subsubkel_asb = data.uraian_sub_sub_kelompok_asb;
    id_aktiv_asb = data.id_aktivitas_asb;
    nm_aktiv_asb = data.nm_aktivitas_asb;
    id_komp_asb = data.id_komponen_asb;
    nm_komp_asb = data.nm_komponen_asb;

    document.getElementById("no_perkada_rinc").innerHTML =data.nomor_perkada;
    document.getElementById("nm_kel_rinc").innerHTML =data.uraian_kelompok_asb;
    document.getElementById("nm_subkel_rinc").innerHTML =data.uraian_sub_kelompok_asb;
    document.getElementById("nm_subsubkel_rinc").innerHTML =data.uraian_sub_sub_kelompok_asb;
    document.getElementById("nm_aktiv_rinc").innerHTML =data.nm_aktivitas_asb;
    document.getElementById("nm_komp_rinc").innerHTML =data.nm_komponen_asb;
    document.getElementById("nm_zona_rinc").innerHTML =nm_zona_asb;

    $('.nav-tabs a[href="#detailrincian"]').tab('show');
    $('#tblRincian').DataTable().ajax.url("./hitungasb/datarinci/"+id_komp_asb+"/"+id_hitung_asb+"/"+id_zona_asb).load();

  });

  var rincian = $('#tblRincian').DataTable( {
        processing: true,
        serverSide: true,
        deferRender: true,
    autoWidth : false,
        dom: 'Bfrtip',
        "ajax": {"url": "./hitungasb/datarinci/0/0/0"},
        "language": {
                "decimal": ",",
                "thousands": "."},
        "columns": [
          { data: 'no_urut', sClass: "dt-center" },
          { data: 'uraian_tarif_ssh'},
          { data: 'jenis_display', sClass: "dt-center" },
          { data: 'harga_satuan',
            render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right" },
          { data: 'koefisien1',
            render: $.fn.dataTable.render.number( '.', ',', 4, '' ), sClass: "dt-right" },
          { data: 'koefisien2',
            render: $.fn.dataTable.render.number( '.', ',', 4, '' ), sClass: "dt-right" },
          { data: 'koefisien3',
            render: $.fn.dataTable.render.number( '.', ',', 4, '' ), sClass: "dt-right" },
          { data: 'jml_pagu',
            render: $.fn.dataTable.render.number( '.', ',', 0, '' ), sClass: "dt-right" },
              ],
                  "order": [[0, 'asc']],
                  "bDestroy": true
  });

  //tambah perkada
  $(document).on('click', '.add-hitungasb', function() {
    $('.modal-title').text('Proses Perhitungan Pagu ASB Tahunan');
    $('.form-horizontal').show();

    $('#ProsesHitung').modal('show');
  });

  $(document).on('click', '.btnProses', function() {
    $.ajaxSetup({
    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    $('#ModalProgress').modal('show');
    $('#ProsesHitung').modal('hide');
    $.ajax({
            type: 'POST',
            url: './addPerhitungan',
            data: {
                '_token': $('input[name=_token]').val(),
                'tahun_perhitungan' : $('#tahun_perhitungan').val(),
                'id_perkada' : $('#id_perkada').val(),
            },
            success: function(data) {
              $.ajax({
                  type: 'POST',
                  url: './prosesASB',
                  data: {
                      '_token': $('input[name=_token]').val(),
                      'tahun_perhitungan' : $('#tahun_perhitungan').val(),
                      // 'id_zona' : $('#id_zona').val(),
                  },
                  success: function(data) {
                    createPesan("Proses Perhitungan Berhasil","success");
                    $('#tblPerkada').DataTable().ajax.reload(null,false);
                    $('#ModalProgress').modal('hide');
                  },
                  error: function(data) {
                    createPesan("Proses Perhitungan Gagal","danger");
                    $('#tblPerkada').DataTable().ajax.reload(null,false);
                    $('#ModalProgress').modal('hide');
                  }
                });

            }
          });
  });

  $(document).on('click', '.edit-status', function() {
    $('.modal-title').text('Perubahan Status Perhitungan ASB');
    document.getElementById("tahun_perhitungan_status").innerHTML = $(this).data('tahun_perhitungan');
    document.getElementById("no_perkada_status").innerHTML = $(this).data('no_perkada');
    $('#id_perhitungan_status').val($(this).data('id_perhitungan'));
    document.frmUbahStatus.status_hitung[$(this).data('flag_aktif')].checked=true;
    $('.form-horizontal').show();
    $('#UbahStatus').modal('show');

    $('.modal-footer').on('click', '.btnUbahStatus', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });
      $('#ModalProgress').modal('show');
      $('#UbahStatus').modal('hide');
      $.ajax({
          type: 'post',
          url: './UbahStatus',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_perhitungan': $('#id_perhitungan_status').val(),
              'flag_aktif': getStatus(),
          },
          success: function(data) {
              $('#tblPerkada').DataTable().ajax.reload(null,false);
              createPesan("Proses Posting Perhitungan Berhasil","success");
              $('#ModalProgress').modal('hide');

          }
      });
    });
  });

$(document).on('click', '.hapus-perhitungan', function() {
    $('.modal-title').text('Perubahan Status Perhitungan ASB');
    document.getElementById("tahun_perhitungan_hapus").innerHTML = $(this).data('tahun_perhitungan');
    document.getElementById("no_perkada_hapus").innerHTML = $(this).data('no_perkada');
    document.getElementById("status_hitung_hapus").innerHTML = $(this).data('status_perkada');
    $('#id_perhitungan_hapus').val($(this).data('id_perhitungan'));
    $('.form-horizontal').show();
    $('#HapusHitung').modal('show');

    $('.modal-footer').on('click', '.btnHapusHitung', function() {
      $.ajaxSetup({
         headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
      });
      $('#ModalProgress').modal('show');
      $('#HapusHitung').modal('hide');
      $.ajax({
          type: 'post',
          url: './hapusPerhitungan',
          data: {
              '_token': $('input[name=_token]').val(),
              'id_perhitungan': $('#id_perhitungan_hapus').val(),
          },
          success: function(data) {
              $('#tblPerkada').DataTable().ajax.reload(null,false);
              createPesan("Proses Perhitungan Berhasil Dihapus","info");
              $('#ModalProgress').modal('hide');
          }
      });
    });
  });

$(document).on('click', '.test-hitung', function() {
    $('.modal-title').text('Pencetakan Rumus dan Simulasi Aktivitas ASB');
    $('.form-horizontal').show();
    $('#v1_simulasi').val(1);
    $('#v2_simulasi').val(1);
    $('#SimulasiHitung').modal('show');

    $.ajax({
          type: "GET",
          url: './getTahunHitung',
          dataType: "json",
          success: function(data) {

          var j = data.length;
          var post, i;

          $('select[name="tahun_simulasi"]').empty();
          $('select[name="tahun_simulasi"]').append('<option value="-1">---Tahun Perhitungan---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="tahun_simulasi"]').append('<option value="'+ post.tahun_perhitungan +'">'+ post.tahun_perhitungan +'</option>');
          }
          }
      });

  });

$( ".tahun_simulasi" ).change(function() {
      
      $.ajax({

          type: "GET",
          url: './getPerkadaSimulasi/'+$('#tahun_simulasi').val(),
          dataType: "json",

          success: function(data) {

          var j = data.length;
          var post, i;

          $('select[name="id_perkada_simulasi"]').empty();
          $('select[name="id_perkada_simulasi"]').append('<option value="-1">---Nomor Perkada---</option>');

          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="id_perkada_simulasi"]').append('<option value="'+ post.id_perhitungan +'">'+ post.nomor_perkada +'</option>');
          }
          }
      });
    });

function getStatus(){

    var xCheck = document.querySelectorAll('input[name="status_hitung"]:checked');
    var xyz = [];
    for(var x = 0, l = xCheck.length; x < l;  x++)
      { xyz.push(xCheck[x].value); }
    var xvalues = xyz.join('');
    return xvalues;
  }

var asb_tbl;
$(document).on('click', '#btnCariASB', function() {
  $('.tahun_simulasi').val(null);
  $('#id_perkada_simulasi').val(null);

  $('#cariAktivitasASB').modal('show'); 

});

$(document).on('click', '#btnLoadASB', function() {
  asb_tbl = $('#tblCariAktivitasASB').DataTable( {
        processing: true,
        serverSide: true,                 
        autoWidth : false,
        dom: 'bfrtIp',
        "ajax": {"url": "./getDataASB/"+$('#id_perkada_simulasi').val()},
        "columns": [
              { data: 'no_urut', sClass: "dt-center"},
              { data: 'nm_aktivitas_asb'},
              { data: 'action', 'searchable': false, width :"20px", 'orderable':false, sClass: "dt-center" }
            ],
        "order": [[0, 'asc']],
        "bDestroy": true
    });

  asb_tbl.ajax.reload(null,false);
});

$('#tblCariAktivitasASB').on( 'dblclick', 'tr', function () {
    var data = asb_tbl.row(this).data();   

    document.getElementById("ur_satuan_1").innerHTML = data.uraian_satuan_1;
    document.getElementById("ur_satuan_2").innerHTML = data.uraian_satuan_2;
    document.getElementById("ur_aktivitas_kegiatan").value = data.nm_aktivitas_asb;
    document.getElementById("aktivitas_simulasi").value = data.id_aktivitas_asb;
    
    $('#id_perkada_aktivitas').val($('#id_perkada_simulasi').val());
    $('#nomor_perkada_simulasi').val($('#id_perkada_simulasi option:selected').text());

    $('#cariAktivitasASB').modal('hide');
  });

$(document).on('click', '#btnPilihASB', function() {

    var data = asb_tbl.row( $(this).parents('tr') ).data();

    document.getElementById("ur_satuan_1").innerHTML = data.uraian_satuan_1;
    document.getElementById("ur_satuan_2").innerHTML = data.uraian_satuan_2;
    document.getElementById("ur_aktivitas_kegiatan").value = data.nm_aktivitas_asb;
    document.getElementById("aktivitas_simulasi").value = data.id_aktivitas_asb;
    
    $('#id_perkada_aktivitas').val($('#id_perkada_simulasi').val());
    $('#nomor_perkada_simulasi').val($('#id_perkada_simulasi option:selected').text());

    $('#cariAktivitasASB').modal('hide');
  });

$(document).on('click', '.btnSimulasi',  function() {
    if ($('#id_perkada_aktivitas').val()!=null || $('#id_perkada_aktivitas').val()!=""){
      window.open('../printHitungSimulasiASB/'+$('#id_perkada_aktivitas').val()+'/'+$('#aktivitas_simulasi').val()+'/'+$('#v1_simulasi').val()+'/'+$('#v2_simulasi').val());
    } else {
      alert("Maaf Belum Memilih Nomor Perkada ASB")
    }
    
    // location.replace('../printHitungSimulasiASB/'+$('#id_perkada_simulasi').val()+'/'+$('#aktivitas_simulasi').val()+'/'+$('#v1_simulasi').val()+'/'+$('#v2_simulasi').val());    
  });

$(document).on('click', '.btnCetakAktivitas', function() {
    window.open('../printHitungRumusASB/'+$('#aktivitas_simulasi').val());    
  });

$(document).on('click', '.print-hitungaktivitas', function() {
    window.open('../printHitungRumusASB/'+$(this).data('id_aktivitas_asb'));    
  });



});
</script>
@endsection
