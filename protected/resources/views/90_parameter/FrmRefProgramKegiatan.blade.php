<?php
use hoaaah\LaravelBreadcrumb\Breadcrumb as Breadcrumb;
?>

@extends('layouts.parameterlayout')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <?php
        $this->title = 'Program - Kegiatan - Sub Kegiatan Pmd-90';
        $breadcrumb = new Breadcrumb();
        $breadcrumb->homeUrl = 'parameter/dash';
        $breadcrumb->begin();
        $breadcrumb->add(['label' => $this->title]);
        $breadcrumb->end();
      ?>
    </div>
  </div>
  <div id="pesan"></div>
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
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h2 class="panel-title">Referensi Program, Kegiatan & Sub Kegiatan Permendagri 90</h2>
        </div>
        <div class="panel-body"><br>
          <div class='tabs-x tabs-above tab-bordered tabs-krajee'>
            <ul class="nav nav-tabs nav-justified" role="tablist">
              <li class="active"><a href="#urusan" aria-controls="urusan" role="tab" data-toggle="tab">Urusan-Bidang</a>
              </li>
              <li class="disabled"><a href="#program" aria-controls="program" role="tab-kv"
                  data-toggle="tab">Program</a></li>
              <li class="disabled"><a href="#kegiatan" aria-controls="kegiatan" role="tab-kv"
                  data-toggle="tab">Kegiatan</a></li>
              <li class="disabled"><a href="#subkegiatan" aria-controls="subkegiatan" role="tab-kv"
                  data-toggle="tab">Sub Kegiatan</a></li>
            </ul>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane fade in active" id="urusan">
                <br>
                <div class="col-md-12">
                  <table id="tblUrusan" class="table table-striped table-bordered table-responsive compact" width="100%"
                    cellspacing="0">
                    <thead>
                      <tr>
                        <th width="5px" style="text-align: center; vertical-align:middle"></th>
                        <th width="10%" style="text-align: center; vertical-align:middle">No Urut</th>
                        <th style="text-align: center; vertical-align:middle">Urusan / Bidang Pemerintahan</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane fade in" id="program">
                <br>
                <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered table-responsive compact">
                      <tbody>
                        <tr class="backBidang">
                          <td width="20%" style="text-align: left; vertical-align:top;">Urusan</td>
                          <td style="text-align: left; vertical-align:top;"><label id="ur_urusan_prog"
                              align='left'></label>
                          </td>
                        </tr>
                        <tr class="backBidang">
                          <td width="20%" style="text-align: left; vertical-align:top;">Bidang</td>
                          <td style="text-align: left; vertical-align:top;"><label id="ur_bidang_prog"
                              align='left'></label>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </form>
                <table id="tblProgram" class="table table-striped table-bordered table-responsive compact" width="100%"
                  cellspacing="0">
                  <thead>
                    <tr>
                      <th width='5%' style="text-align: center; vertical-align:middle">No Urut</th>
                      <th width='15%' style="text-align: center; vertical-align:middle">Kode Program</th>
                      <th style="text-align: center; vertical-align:middle">Uraian Program</th>
                      <th width="10%" style="text-align: center; vertical-align:middle">Kegiatan</th>
                      <th width="10%" style="text-align: center; vertical-align:middle">Sub Kegiatan</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
              <div role="tabpanel" class="tab-pane fade in" id="kegiatan">
                <br>
                <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered table-responsive compact">
                      <tbody>
                        <tr class="backBidang">
                          <td width="20%" style="text-align: left; vertical-align:top;">Urusan</td>
                          <td style="text-align: left; vertical-align:top;"><label id="ur_urusan_keg"
                              align='left'></label></td>
                        </tr>
                        <tr class="backBidang">
                          <td width="20%" style="text-align: left; vertical-align:top;">Bidang</td>
                          <td style="text-align: left; vertical-align:top;"><label id="ur_bidang_keg"
                              align='left'></label></td>
                        </tr>
                        <tr class="backProgram">
                          <td width="20%" style="text-align: left; vertical-align:top;">Program</td>
                          <td style="text-align: left; vertical-align:top;"><label id="ur_program_keg"
                              align='left'></label>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </form>
                <table id="tblKegiatan" class="table table-striped table-bordered table-responsive compact" width="100%"
                  cellspacing="0">
                  <thead>
                    <tr>
                      <th width='5%' style="text-align: center; vertical-align:middle">No Urut</th>
                      <th width='15%' style="text-align: center; vertical-align:middle">Kode Kegiatan</th>
                      <th style="text-align: center; vertical-align:middle">Uraian Kegiatan</th>
                      <th width="10%" style="text-align: center; vertical-align:middle">Sub Kegiatan</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
              <div role="tabpanel" class="tab-pane fade in" id="subkegiatan">
                <br>
                <form class="form-horizontal" role="form" autocomplete='off' action="" method="">
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered table-responsive compact">
                      <tbody>
                        <tr class="backBidang">
                          <td width="20%" style="text-align: left; vertical-align:top;">Urusan</td>
                          <td style="text-align: left; vertical-align:top;"><label id="ur_urusan_sub"
                              align='left'></label></td>
                        </tr>
                        <tr class="backBidang">
                          <td width="20%" style="text-align: left; vertical-align:top;">Bidang</td>
                          <td style="text-align: left; vertical-align:top;"><label id="ur_bidang_sub"
                              align='left'></label></td>
                        </tr>
                        <tr class="backProgram">
                          <td width="20%" style="text-align: left; vertical-align:top;">Program</td>
                          <td style="text-align: left; vertical-align:top;"><label id="ur_program_sub"
                              align='left'></label>
                          </td>
                        </tr>
                        <tr class="backKegiatan">
                          <td width="20%" style="text-align: left; vertical-align:top;">Kegiatan</td>
                          <td style="text-align: left; vertical-align:top;"><label id="ur_kegiatan_sub"
                              align='left'></label>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </form>
                <table id="tblSubKegiatan" class="table table-striped table-bordered table-responsive compact"
                  width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width='5%' style="text-align: center; vertical-align:middle">No Urut</th>
                      <th width='15%' style="text-align: center; vertical-align:middle">Kode Sub Kegiatan</th>
                      <th style="text-align: center; vertical-align:middle">Uraian Sub Kegiatan</th>
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

  <script id="details-bidang" type="text/x-handlebars-template">
    <table class="table table-striped table-bordered table-responsive compact details-table" id="bidang-@{{kd_urusan}}">
    <thead>
      <tr>
          <th width="10%" style="text-align: center; vertical-align:middle;">Kode Bidang</th>
          <th style="text-align: center; vertical-align:middle;">Nama Bidang</th>
          <th width="10%" style="text-align: center; vertical-align:middle">Program</th>
          <th width="10%" style="text-align: center; vertical-align:middle">Kegiatan</th>
          <th width="10%" style="text-align: center; vertical-align:middle">Sub Kegiatan</th>
      </tr>
    </thead>
    <tbody></tbody>
  </table>
  </script>
  @endsection

  @section('scripts')
  <script type="text/javascript" language="javascript" class="init"
    src="{{ asset('/protected/resources/views/90_parameter/js_program_kegiatan.js')}}">
  </script>
  @endsection