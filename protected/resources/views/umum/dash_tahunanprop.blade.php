@extends('layouts.app')
<meta name="_token" content="{!! csrf_token() !!}" />

<style>
    #timeline {
      list-style: none;
      position: relative;
    }
    #timeline:before {
      top: 0;
      bottom: 0;
      position: absolute;
      content: " ";
      width: 2px;
      background-color: #4997cd;
      left: 50%;
      margin-left: -1.5px;
    }
    #timeline .clearFix {
      clear: both;
      height: 0;
    }
    #timeline .timeline-badge {
      color: #fff;
      width: 50px;
      height: 50px;
      font-size: 1.2em;
      text-align: center;
      position: absolute;
      top: 20px;
      left: 50%;
      margin-left: -25px;
      background-color: #4997cd;
      z-index: 100;
      border-top-right-radius: 50%;
      border-top-left-radius: 50%;
      border-bottom-right-radius: 50%;
      border-bottom-left-radius: 50%;
    }

    #timeline .timeline-badge.success {
      color:#fff;
      background-color: #5cb85c;
    }
    #timeline .timeline-badge.warning {
      color:#fff;
      background-color: #f0ad4e;
    }
    #timeline .timeline-badge.danger {
      color:#fff;
      background-color: #d9534f;
    }
    #timeline .timeline-badge.info {
        color:#fff;
        background-color: #5bc0de;
    }
    #timeline .timeline-badge.primary {
      color:#fff;
      background-color: #428bca;
    }

    #timeline .timeline-badge span.timeline-balloon-date-day {
      font-size: 1.4em;
    }
    #timeline .timeline-badge span.timeline-balloon-date-month {
      font-size: .7em;
      position: relative;
      top: -10px;
    }
    #timeline .timeline-badge.timeline-filter-movement {
      background-color: #ffffff;
      font-size: 1.7em;
      height: 35px;
      margin-left: -18px;
      width: 35px;
      top: 40px;
    }
    #timeline .timeline-badge.timeline-filter-movement a span {
      color: #4997cd;
      font-size: 1.3em;
      top: -1px;
    }
    #timeline .timeline-badge.timeline-future-movement {
      background-color: #ffffff;
      height: 35px;
      width: 35px;
      font-size: 1.7em;
      top: -16px;
      margin-left: -18px;
    }
    #timeline .timeline-badge.timeline-future-movement a span {
      color: #4997cd;
      font-size: .9em;
      top: 2px;
      left: 1px;
    }
    #timeline .timeline-movement {
      border-bottom: dashed 1px #4997cd;
      position: relative;
    }
    #timeline .timeline-movement.timeline-movement-top {
      height: 60px;
    }
    #timeline .timeline-movement .timeline-item {
      padding: 20px 0;
    }
    #timeline .timeline-movement .timeline-item .timeline-panel {
      border: 1px solid #d4d4d4;
      border-radius: 3px;
      background-color: #FFFFFF;
      color: #666;
      padding: 10px;
      position: relative;
      -webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
      box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
    }
    #timeline .timeline-movement .timeline-item .timeline-panel .timeline-panel-ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }
    #timeline .timeline-movement .timeline-item .timeline-panel.credits .timeline-panel-ul {
      text-align: right;
    }
    #timeline .timeline-movement .timeline-item .timeline-panel.credits .timeline-panel-ul li {
      color: #666;
    }
    #timeline .timeline-movement .timeline-item .timeline-panel.credits .timeline-panel-ul li span.importo {
      /*color: #468c1f;*/
      font-size: 1.3em;
    }
    #timeline .timeline-movement .timeline-item .timeline-panel.debits .timeline-panel-ul {
      text-align: left;
    }
    #timeline .timeline-movement .timeline-item .timeline-panel.debits .timeline-panel-ul span.importo {
      /*color: #e2001a;*/
      font-size: 1.3em;
    }
</style>

@section('content')
<div class="container">
      {{-- <div class="page-header" style="text-align: center;">
        <h3 id="">Proses Perencanaan Tahunan</h3>
      </div> --}}
      <div id="timeline">
        <div class="row timeline-movement">
          {{-- <div class="timeline-badge timeline-future-movement">
              <a href="#">
                  <span class="glyphicon glyphicon-download"> Proses Perencanaan Tahunan </span>
              </a>
          </div> --}}
          {{-- <div class="timeline-badge timeline-filter-movement">
              <a href="#">
                  <span class="glyphicon glyphicon-time"></span>
              </a>
          </div> --}}
        </div>
        <div class="row timeline-movement">
            <div class="timeline-badge success">
                {{-- <span class="timeline-balloon-date-day">18</span>
                <span class="timeline-balloon-date-month">APR</span> --}}
            </div>
            <div class="col-sm-6  timeline-item">
                <div class="row">
                    <div class="col-sm-11">
                        <div class="timeline-panel credits">
                            <ul class="timeline-panel-ul">
                                <li><span class="importo" style="color: #1bb74a">Rancangan Awal RKPD</span></li>
                                <li>- Load Data RPJMD - Rancangan Awal RKPD - Dokumen Ranwal RKPD</li>
                                {{-- <li><p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 11/09/2014</small></p> </li> --}}
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    <!--due -->

        <div class="row timeline-movement">
          <div class="timeline-badge primary">
              {{-- <span class="timeline-balloon-date-day">13</span>
              <span class="timeline-balloon-date-month">APR</span> --}}
          </div>
          <div class="col-sm-offset-6 col-sm-6 timeline-item">
              <div class="row">
                  <div class="col-sm-offset-1 col-sm-11">
                      <div class="timeline-panel debits">
                          <ul class="timeline-panel-ul">
                              <li><span class="importo" style="color: #136fb5">Rancangan Awal Renja Perangkat Daerah</span></li>
                              <li>- Load Data Ranwal RKPD - Rancangan Awal Renja - Dokumen Ranwal Renja</li>
                              {{-- <li><p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 11/09/2014</small></p> </li> --}}
                          </ul>
                      </div>

                  </div>
              </div>
          </div>
        </div>
        <div class="row timeline-movement">
          <div class="timeline-badge primary">
              {{-- <span class="timeline-balloon-date-day">13</span>
              <span class="timeline-balloon-date-month">APR</span> --}}
          </div>
          <div class="col-sm-6  timeline-item">
              <div class="row">
                  <div class="col-sm-11">
                      <div class="timeline-panel credits">
                          <ul class="timeline-panel-ul">
                              <li><span class="importo" style="color: #a82b2b">Pra-Musrenbang Provinsi</span></li>
                              <li>- Usulan Kabupaten/Kota</li>
                              {{-- <li><p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 11/09/2014</small></p> </li> --}}
                          </ul>
                      </div>

                  </div>
              </div>
          </div>
          <div class="col-sm-6  timeline-item">
              <div class="row">
                  <div class="col-sm-offset-1 col-sm-11">
                      <div class="timeline-panel debits">
                          <ul class="timeline-panel-ul">
                              <li><span class="importo" style="color: #136fb5">Rancangan Renja Perangkat Daerah</span></li>
                              <li>- Load Data Ranwal Renja - Rancangan Renja - Dokumen Rancangan Renja</li>
                              {{-- <li><p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 11/09/2014</small></p> </li> --}}
                          </ul>
                      </div>

                  </div>
              </div>
          </div>
        </div>
        <div class="row timeline-movement">
            <div class="timeline-badge warning">
                {{-- <span class="timeline-balloon-date-day">10</span>
                <span class="timeline-balloon-date-month">APR</span> --}}
            </div>
            <div class="col-sm-6  timeline-item">
                <div class="row">
                    <div class="col-sm-11">
                        <div class="timeline-panel credits">
                            <ul class="timeline-panel-ul">
                                <li><span class="importo" style="color: #d6c213">Forum Perangkat Daerah</span></li>
                                <li>- Load Data Rancangan Renja - Forum Perangkat Daerah</li>
                                {{-- <li><p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 11/09/2014</small></p> </li> --}}
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row timeline-movement">
            <div class="timeline-badge success">
                {{-- <span class="timeline-balloon-date-day">10</span>
                <span class="timeline-balloon-date-month">APR</span> --}}
            </div>
            <div class="col-sm-6  timeline-item">
                <div class="row">
                    <div class="col-sm-11">
                        <div class="timeline-panel credits">
                            <ul class="timeline-panel-ul">
                                <li><span class="importo" style="color: #1bb74a">Rancangan RKPD</span></li>
                                <li>- Load Data Forum PD - Rancangan RKPD - Dokumen RKPD</li>
                                {{-- <li><p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 11/09/2014</small></p> </li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6  timeline-item">
              <div class="row">
                  <div class="col-sm-offset-1 col-sm-11">
                      <div class="timeline-panel debits">
                          <ul class="timeline-panel-ul">
                              <li><span class="importo" style="color: #a82b2b">Pokok Pikiran Dewan</span></li>
                              <li>- Data Pokir Dewan - Verifikasi Pokir - Tindak Lanjut Pokir</li>
                              {{-- <li><p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 11/09/2014</small></p> </li> --}}
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
        </div>
        <div class="row timeline-movement">
            <div class="timeline-badge warning">
                {{-- <span class="timeline-balloon-date-day">10</span>
                <span class="timeline-balloon-date-month">APR</span> --}}
            </div>
            <div class="col-sm-6  timeline-item">
                <div class="row">
                    <div class="col-sm-11">
                        <div class="timeline-panel credits">
                            <ul class="timeline-panel-ul">
                                <li><span class="importo" style="color: #d6c213">Musrenbang RKPD</span></li>
                                <li>- Load Data Rancangan RKPD - Musrenbang RKPD - Penyesuaian Data PD</li>
                                {{-- <li><p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 11/09/2014</small></p> </li> --}}
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row timeline-movement">
            <div class="timeline-badge success">
                {{-- <span class="timeline-balloon-date-day">10</span>
                <span class="timeline-balloon-date-month">APR</span> --}}
            </div>
            <div class="col-sm-6  timeline-item">
                <div class="row">
                    <div class="col-sm-11">
                        <div class="timeline-panel credits">
                            <ul class="timeline-panel-ul">
                                <li><span class="importo" style="color: #1bb74a">Rancangan Akhir RKPD</span></li>
                                <li>- Load Data Musrenbang RKPD - Dokumen Rancangan Akhir RKPD</li>
                                {{-- <li><p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 11/09/2014</small></p> </li> --}}
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row timeline-movement">
          <div class="timeline-badge success">
              {{-- <span class="timeline-balloon-date-day">13</span>
              <span class="timeline-balloon-date-month">APR</span> --}}
          </div>
          <div class="col-sm-6  timeline-item">
              <div class="row">
                  <div class="col-sm-11">
                      <div class="timeline-panel credits">
                          <ul class="timeline-panel-ul">
                              <li><span class="importo" style="color: #1bb74a">Dokumen Final RKPD</span></li>
                              <li>- Load Data Ranhir RKPD - Finalisasi RKPD - Penyesuaian Data PD - Dokumen Final RKPD</li>
                              {{-- <li><p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 11/09/2014</small></p> </li> --}}
                          </ul>
                      </div>

                  </div>
              </div>
          </div>
          <div class="col-sm-6  timeline-item">
              <div class="row">
                  <div class="col-sm-offset-1 col-sm-11">
                      <div class="timeline-panel debits">
                          <ul class="timeline-panel-ul">
                              <li><span class="importo" style="color: #136fb5">Dokumen Final Renja Perangkat Daerah</span></li>
                              <li>- Load Data Final RKPD - Dokumen Final Renja</li>
                              {{-- <li><p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 11/09/2014</small></p> </li> --}}
                          </ul>
                      </div>

                  </div>
              </div>
          </div>
        </div>
    </div>
    </div>

@endsection

