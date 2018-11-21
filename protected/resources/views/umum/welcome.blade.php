<?php
// use App\CekAkses;
// use hoaaah\LaravelMenu\Menu;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{!! csrf_token() !!}"/>

    <meta name="description" content="Sistem Perencanaan yang dikembangkan oleh Tim Simda BPKP">
    <meta name="author" content="Tim Simda BPKP">
    <link rel="icon" href="{{asset('simda-favicon.ico')}}">

    <title>simd@Perencanaan</title>

    <!-- Styles -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet"> 

    <style>
    nav.navbar-well { background: #269abc; border-color: #ccc; box-shadow: 0 0 2px 0 #ccc; }
    nav.navbar-well a { color: #fff; }
    nav.navbar-well ul.navbar-nav a { color: #fff; border-style: solid; border-width: 0 0 2px 0; border-color: #fff; }
    nav.navbar-well ul.navbar-nav a:hover,
    nav.navbar-well ul.navbar-nav a:visited,
    nav.navbar-well ul.navbar-nav a:focus,
    nav.navbar-well ul.navbar-nav a:active { background: #fff;}
    nav.navbar-well ul.navbar-nav a:hover { border-color: #fff; color: #269abc }
    nav.navbar-well li.divider { background: #ccc; }
    nav.navbar-well button.navbar-toggle { background: #fff; border-radius: 2px; }
    nav.navbar-well button.navbar-toggle:hover { background: #999; color: #269abc}
    nav.navbar-well button.navbar-toggle > span.icon-bar { background: #fff; }
    nav.navbar-well ul.dropdown-menu { border: 0; background: #fff; border-radius: 4px; margin: 4px 0; box-shadow: 0 0 4px 0 #ccc; }
    nav.navbar-well ul.dropdown-menu > li > a { color: #444; }
    nav.navbar-well ul.dropdown-menu > li > a:hover { background: #fff; color: #269abc; }
    nav.navbar-well span.badge { background: #fff; font-weight: normal; font-size: 11px; margin: 0 4px; color: #269abc }

      .box {
          border-radius: 3px;
          /*box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);*/
          padding: 10px 25px;
          text-align: right;
          display: block;
          margin-top: 60px;
      }
      .box-icon {
          /*background-color: #57a544;*/
          border: 2px solid #57a544;
          border-radius: 50%;
          display: table;
          height: 150px;
          margin: 0 auto;
          width: 150px;
          margin-top: -61px;
      }
      .box-icon span {
          color: #fff;
          display: table-cell;
          text-align: center;
          vertical-align: middle;
      }
      .info h4 {
          font-size: 26px;
          letter-spacing: 2px;
          text-transform: uppercase;
      }
      .info > p {
          color: #717171;
          font-size: 16px;
          padding-top: 10px;
          text-align: center;
      }
      .info > a {
          background-color: #03a9f4;
          border-radius: 2px;
          box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
          color: #fff;
          transition: all 0.5s ease 0s;
      }
      .info > a:hover {
          background-color: #0288d1;
          box-shadow: 0 2px 3px 0 rgba(0, 0, 0, 0.16), 0 2px 5px 0 rgba(0, 0, 0, 0.12);
          color: #fff;
          transition: all 0.5s ease 0s;
      }

      .Timeline {
        display: flex;
        align-items: center;
        height: 250px;
      }

      .event1,
      .event2, .event3 {
        position: relative;
      }

      .event1Bubble {
        position: absolute;
        background-color: rgba(151, 202, 211, 0.1);
        width: 160px;
        height: 90px;
        top: -100px;
        left: -15px;
        border-radius: 5px;
        box-shadow: inset 0 0 5px rgba(151, 202, 211, 0.64)
      }

      .event2Bubble {
        position: absolute;
        background-color: rgba(151, 202, 211, 0.1);
        width: 160px;
        height: 90px;
        left: -105px;
        top: 35px;
        border-radius: 5px;
        box-shadow: inset 0 0 5px rgba(151, 202, 211, 0.64)
      }

      .event1Bubble:after,
      .event1Bubble:before,
      .event2Bubble:after,
      .event2Bubble:before {
        content: "";
        position: absolute;
        width: 0;
        height: 0;
        border-style: solid;
        border-color: transparent;
        border-bottom: 0;
      }

      .event1Bubble:before {
        bottom: -10px;
        left: 13px;
        border-top-color: rgba(222, 222, 222, 0.66);
        border-width: 12px;
      }

      .event1Bubble:after {
        bottom: -8px;
        left: 13px;
        border-top-color: #F6F6F6;
        border-width: 12px;
      }

      .event2Bubble:before {
        bottom: 89px;
        left: 103px;
        border-top-color: rgba(222, 222, 222, 0.66);
        border-width: 12px;
        -webkit-transform: rotate(180deg);
        -moz-transform: rotate(180deg);
        -o-transform: rotate(180deg);
        -ms-transform: rotate(180deg);
        transform: rotate(180deg);
      }

      .event2Bubble:after {
        bottom: 87px;
        left: 103px;
        border-top-color: #F6F6F6;
        border-width: 12px;
        -webkit-transform: rotate(180deg);
        -moz-transform: rotate(180deg);
        -o-transform: rotate(180deg);
        -ms-transform: rotate(180deg);
        transform: rotate(180deg);
      }

      .eventTime {
        display: flex;
      }

      .Day {
        font-size: 24px;
        font-family: "Arial Black", Gadget, sans-serif;
        margin-left: 10px;
        color: #4C4A4A;
      }

      .MonthYear {
        font-size: 14px;
        margin-left: 12px;
        font-weight: bold;
        margin-top: 6px;
        font-family: Arial, Helvetica, sans-serif;
        color: #4C4A4A;
      }

      .eventTitle {
        font-family: "Arial", Gadget, sans-serif;
        color: #0074d9;
        font-size: 11px;
        font-weight: bold;
        text-transform: uppercase;
        display: flex;
        flex: 1;
        align-items: center;
        margin-left: 12px;
        margin-top: -2px;
      }

      .time {
        position: absolute;
        font-family: Arial, Helvetica, sans-serif;
        width: 50px;
        font-size: 8px;
        margin-top: -3px;
        margin-left: -5px;
        color: #9E9E9E;
      }

      .now{
          background-color: #004165;
          color: white;
          border-radius: 8px;
          margin: 5px;
          padding: 4px;
          font-size: 10px;
          font-family: Arial, Helvetica, sans-serif;
          border: 2px solid white;
          font-weight: bold;
          box-shadow: 0 0 0 2px #004165
      }

      .start{
          background-color: #2ecc40;
          color: white;
          border-radius: 6px;
          margin: 5px;
          padding: 5px;
          font-size: 16px;
          font-family: Arial, Helvetica, sans-serif;
          border: 2px solid white;
          font-weight: bold;
          box-shadow: 0 0 0 1px #2ecc40
      }

      .stop{
          background-color: #ff4136;
          color: white;
          border-radius: 6px;
          margin: 5px;
          padding: 5px;
          font-size: 16px;
          font-family: Arial, Helvetica, sans-serif;
          border: 2px solid white;
          font-weight: bold;
          box-shadow: 0 0 0 1px #ff4136
      }
    </style>
</head>

<body style="background-image: linear-gradient(to bottom, rgb(96,108,136) 0%,rgb(63,76,107) 100%);
height: 100%; margin: 0; background-repeat: no-repeat; background-attachment: fixed;">

    <nav class="navbar navbar-findcond navbar-fixed-top" role="navigation" style="margin-bottom: 0">
      <div class="navbar-header">
        <a class="navbar-brand pull-left" href="{{ url('/') }}">
          <div class="row">
            <img style="max-width:50px; margin-top: -7px;" src="{{asset('vendor/default.png')}}"> simd@<strong>Perencanaan </strong> <span class="badge"> ver 1.0 </span>
          </div>
        
        </a>
      </div>
      <ul class="nav navbar-top-links pull-right">
        @if (Auth::guest())
          <li class="active"><a href="{{ route('login') }}" role="button" ><i class="fa fa-sign-in fa-fw fa-lg"></i> Login<span class="sr-only">(current)</span></a></li>
        @else
          <li class="active">
            <a href="{{ url('/home') }}" role="button"><i class="fa fa-user fa-fw fa-lg"></i> {{ Auth::user()->name }}</a>
          </li>
        @endif
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row" style="padding: 70px">
      <div class="col-sm-3 col-sm-push-9">
        <div class="col-md-12">
          @foreach($trxVisi as $dataVisi)
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">{{$rPemda}}</h3>
            </div>
            <div class="panel-body">
              <div class="box" >
                      <div id="iPemda">
                          <img id="profile-img" class="box-icon" src="{{ asset('vendor/default.png') }}" />
                      </div>
                      <div class="">                        
                          <h4 class="text-center">PEMERINTAH {{$rPemda}}</h4>
                          <h4 class="text-center">Periode : {{$dataVisi->tahun_1}} s/d {{$dataVisi->tahun_5}}</h4>
                          {{-- <a class="text-center">{{$xApp}}</a>   --}}
                      </div>
                  </div>
            </div>
          </div>
          @endforeach
        </div>
        <div class="col-md-12">
          <div class="panel panel-success">
            <div class="panel-heading">
              <h3 class="panel-title">Menu Utama</h3>
            </div>
            <div class="panel-body">
              <dd><a href="#" target="_blank">RKPD</a></dd>
              <dd><a href="#" target="_blank">Renja</a></dd>
              <dd><a href="#" target="_blank">Usulan Musrenbang</a></dd>
              <dd><a href="#" target="_blank">Pokir DPRD</a></dd>
              <dd class="last"></dd>
            </div>
          </div>
        </div>  
      </div>
      <div class="col-sm-9 col-sm-pull-3">
            <div class="col-sm-12">
              <div class="panel panel-warning">
              <div class="panel-heading">
                <h3 class="panel-title">Rincian Rencana Pembangunan Jangka Menengah <a id="" class="pull-right"> &raquo;</a></h3>
              </div>
              <div class="panel-body">
                @foreach($trxVisi as $dataVisi)
                  <p><strong>Visi :</strong> {{$dataVisi->uraian_visi_rpjmd}}</p>
                <table id="tblRincianRpjmd" class="table-responsive" border="0">
                  <thead>
                      <tr>
                          <th width="5%" style="text-align: left; vertical-align:middle">Misi :</th>
                          <th style="text-align: left; vertical-align:middle"></th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($trxRpjmd as $data)
                      <tr>
                          <td width="5%" style="text-align: center">{{$data->no_misi}}</td>
                          <td style="text-align: left">{{$data->uraian_misi_rpjmd}}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>                
                @endforeach
              </div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                  <h3 class="panel-title">Misi Pemda selama 5 tahun </h3>
              </div>
                <div class="panel-body">
                  <canvas id="canvasMisi5" height="300" width="600"></canvas>
              </div>                
            </div>
          </div>
          <div class="col-sm-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                  <h3 class="panel-title">Urusan 5 Tahun</h3>
              </div>
                <div class="panel-body">
                  <canvas id="canvasUrusan5" height="300" width="600"></canvas>
              </div>                
            </div>
          </div>

        <div class="col-sm-12">
          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-danger">
              <div class="panel-heading">
                <h3 class="panel-title" style="color:#d9534f;">Jadwal dan Alur Proses Penyusunan RKPD-Renja 
                  <select id="" class="col-sm-2 pull-right hidden" name="id_tahun" id="id_tahun"></select>                  
                </h3>
              </div>
              <div class="panel-body">
                <div class="Timeline">
                  <div class="start">
                      Mulai
                  </div>
                    <div class="event1">                      
                      <div class="event1Bubble">
                        <div class="eventTime">
                          <div class="MonthYear"><span id="tgl1"></span></div>                            
                        </div>
                        <div class="eventTitle"><span id="ur1"></span></div>
                        <div class="MonthYear"><span id="tglA1"></span></div>
                      </div>
                      {{-- <svg height="20" width="20">
                         <circle cx="10" cy="11" r="5" fill="#004165" />
                      </svg> --}}
                      <div id="ico1"></div>
                    </div>
                    
                  <svg height="5" width="70">
                    <line x1="0" y1="0" x2="100" y2="0" style="stroke:#004165;stroke-width:5" />
                  </svg>

                    <div class="event2">                      
                      <div class="event2Bubble">
                        <div class="eventTime">
                          <div class="MonthYear"><span id="tgl2"></span></div>
                        </div>
                        <div class="eventTitle"><span id="ur2"></span></div>
                        <div class="MonthYear"><span id="tglA2"></span></div>
                      </div>
                      <div id="ico2"></div>
                    </div>
                    
                  <svg height="5" width="70">
                    <line x1="0" y1="0" x2="100" y2="0" style="stroke:#004165;stroke-width:5" />
                  </svg>

                    <div class="event1">                      
                      <div class="event1Bubble">
                        <div class="eventTime">
                          <div class="MonthYear"><span id="tgl3"></span></div>
                        </div>
                        <div class="eventTitle"><span id="ur3"></span></div>
                        <div class="MonthYear"><span id="tglA3"></span></div>
                      </div>
                      <div id="ico3"></div>
                    </div>

                  <svg height="5" width="70">
                    <line x1="0" y1="0" x2="100" y2="0" style="stroke:#004165;stroke-width:5" />
                  </svg>

                    <div class="event2">                      
                      <div class="event2Bubble">
                        <div class="eventTime">
                          <div class="MonthYear"><span id="tgl4"></span></div>
                        </div>
                        <div class="eventTitle"><span id="ur4"></span></div>
                        <div class="MonthYear"><span id="tglA4"></span></div>
                      </div>
                    <div id="ico4"></div>
                    </div>

                  <svg height="5" width="70">
                    <line x1="0" y1="0" x2="100" y2="0" style="stroke:#004165;stroke-width:5" />
                  </svg>

                    <div class="event1">                      
                      <div class="event1Bubble">
                        <div class="eventTime">
                          <div class="MonthYear"><span id="tgl5"></span></div>
                        </div>
                        <div class="eventTitle"><span id="ur5"></span></div>
                        <div class="MonthYear"><span id="tglA5"></span></div>
                      </div>
                      <div id="ico5"></div>
                    </div>

                  <svg height="5" width="70">
                    <line x1="0" y1="0" x2="100" y2="0" style="stroke:#004165;stroke-width:5" />
                  </svg>

                    <div class="event2">                      
                      <div class="event2Bubble">
                        <div class="eventTime">
                          <div class="MonthYear"><span id="tgl6"></span></div>
                        </div>
                        <div class="eventTitle"><span id="ur6"></span></div>
                        <div class="MonthYear"><span id="tglA6"></span></div>
                      </div>
                    <div id="ico6"></div>
                    </div>

                  <svg height="5" width="70">
                    <line x1="0" y1="0" x2="100" y2="0" style="stroke:#004165;stroke-width:5" />
                  </svg>

                    <div class="event1">                      
                      <div class="event1Bubble">
                        <div class="eventTime">
                          <div class="MonthYear"><span id="tgl7"></span></div>
                        </div>
                        <div class="eventTitle"><span id="ur7"></span></div>
                        <div class="MonthYear"><span id="tglA7"></span></div>
                      </div>
                      <div id="ico7"></div>
                    </div>

                  <svg height="5" width="70">
                    <line x1="0" y1="0" x2="100" y2="0" style="stroke:#004165;stroke-width:5" />
                  </svg>

                    <div class="event2">                      
                      <div class="event2Bubble">
                        <div class="eventTime">
                          <div class="MonthYear"><span id="tgl8"></span></div>
                        </div>
                        <div class="eventTitle"><span id="ur8"></span></div>
                        <div class="MonthYear"><span id="tglA8"></span></div>
                      </div>
                    <div id="ico8"></div>
                    </div>

                  <svg height="5" width="70">
                    <line x1="0" y1="0" x2="100" y2="0" style="stroke:#004165;stroke-width:5" />
                  </svg>

                    <div class="event1">                      
                      <div class="event1Bubble">
                        <div class="eventTime">
                          <div class="MonthYear"><span id="tgl9"></span></div>
                        </div>
                        <div class="eventTitle"><span id="ur9"></span></div>
                        <div class="MonthYear"><span id="tglA9"></span></div>
                      </div>
                      <div id="ico9"></div>
                    </div>

                  <svg height="5" width="70">
                    <line x1="0" y1="0" x2="100" y2="0" style="stroke:#004165;stroke-width:5" />
                  </svg>

                    <div class="event2">                      
                      <div class="event2Bubble">
                        {{-- <div class="eventTime"> --}}
                          <div class="MonthYear"><span id="tgl10"></span></div>
                        {{-- </div> --}}
                        <div class="eventTitle"><span id="ur10"></span></div>
                        <div class="MonthYear"><span id="tglA10"></span></div>
                      </div>
                    <div id="ico10"></div>
                    </div>

                  <svg height="5" width="70">
                    <line x1="0" y1="0" x2="100" y2="0" style="stroke:#004165;stroke-width:5" />
                  </svg>

                    <div class="event1">                      
                      <div class="event1Bubble">
                        {{-- <div class="eventTime"> --}}
                          <div class="MonthYear"><span id="tgl11"></span></div>
                        {{-- </div> --}}
                        <div class="eventTitle"><span id="ur11"></span></div>
                        <div class="MonthYear"><span id="tglA11"></span></div>
                      </div>
                      <div id="ico11"></div>
                    </div>

                    <div class="stop">
                      Selesai
                    </div>                     
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      </div>
    

    </div>
    <hr>
      <footer id="bottom">
      <div class="pull-right wrapper footer">
              <p style="color:#F6F6F6">
                  <b><a HREF="http://www.bpkp.go.id" title="Badan Pengawasan Keuangan dan Pembangunan" style="color:#5CD1FF; text-decoration: none; ">Badan Pengawasan Keuangan dan Pembangunan</a></b>
                  | <b>Tim Satgas Simda</b> | <span style="color:#F2DEDE">Copyright &copy; 2018</span>  
      </div>
              </p>
    </footer>
</body>


<script src="{{ asset('/js/jquery.min.js')}}"></script>
<script src="{{ asset('/js/jquery-ui.js')}}"></script>
<script src="{{ asset('/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('/js/Chart.bundle.js') }}"></script>
<script  type="text/javascript" language="javascript" class="init">
$(document).ready( function() {

function formatTgl(val_tanggal){
      var formattedDate = new Date(val_tanggal);
      var d = formattedDate.getDate();
      var m = formattedDate.getMonth()+1;
      var y = formattedDate.getFullYear();
      var m_names = new Array("Jan", "Feb", "Mar", 
        "Apr", "Mei", "Jun", "Jul", "Agt", "Sep", 
        "Okt", "Nov", "Des")

      var tgl= d + "-" + m + "-" + y

      return tgl;
}

var url_1 = "{{url('/rpjmd/misi5tahun')}}";
var url_2 = "{{url('/rpjmd/urusan5tahun')}}";

$(function(){
  $.getJSON(url_1, function (result) {

    var labels = [],data=[];
    for (var i = 0; i < result.length; i++) {
         labels.push(result[i].uraian_misi_rpjmd.substring(0,120));
        data.push(result[i].count);
    }

    var chartData = {
      labels : labels,
      datasets : [
        {            
            label: 'Pagu',
            backgroundColor:  ["#0074D9", "#FF4136", "#2ECC40", "#FF851B", "#7FDBFF", "#B10DC9", "#FFDC00", "#001f3f", "#39CCCC", "#01FF70", "#85144b", "#F012BE", "#3D9970", "#111111", "#AAAAAA"],
            data : data
        }
      ]
    };

    var ctx = document.getElementById('canvasMisi5').getContext('2d');
    
    var chartInstance = new Chart(ctx, {
        type: 'doughnut',
        data: chartData,
        options: {
                elements: {
                      arc: {
                    borderWidth: 0
                }
                },
                title: {
                    display: false,
                    text: 'Misi 5 Tahun'
                },
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, data2) {
//                             return "Rp" + Number(tooltipItem.xLabel).toFixed(0).replace(/./g, function(c, i, a) {
//                                 return i > 0 && c !== "," && (a.length - i) % 3 === 0 ? "." + c : c;
//                             });
                          return labels[tooltipItem.index].substring(0,100)+": "+"Rp" +Number(data[tooltipItem.index]).toFixed(0).replace(/./g, function(c, i, a){
                              return i > 0 && c !== "," && (a.length - i) % 3 === 0 ? "." + c : c;});
                        }
                    }
                },
                
                legend: {
                  callbacks: {
                    label: function(tooltipItem, data2) {
                      return labels[tooltipItem.index].substring(0,100);
                          }
                  },
                    display: true,
                    position : 'bottom',
                    
                    labels: {
                        fontSize: 7
                        // fontColor: 'rgb(255, 99, 132)'
                    }
                },                
                responsive: true,
            }
    });
  });

  $.getJSON(url_2, function (result) {

      var labels = [],data=[];
      for (var i = 0; i < result.length; i++) {
           labels.push(result[i].nm_urusan.substring(0,120));
          data.push(result[i].total_pagu);
      }

      var chartData = {
        labels : labels,
        datasets : [
          {
              
              label: 'Pagu',
              backgroundColor:  ["#0074D9", "#FF4136", "#2ECC40", "#FF851B", "#7FDBFF", "#B10DC9", "#FFDC00", "#001f3f", "#39CCCC", "#01FF70", "#85144b", "#F012BE", "#3D9970", "#111111", "#AAAAAA"],
              data : data
          }
        ]
      };

      var ctx = document.getElementById('canvasUrusan5').getContext('2d');
      
      var chartInstance = new Chart(ctx, {
          type: 'doughnut',
          data: chartData,
          options: {
                  elements: {
                      arc: {
                    borderWidth: 0
                }
                  },
                  title: {
                      display: false,
                      text: 'Urusan 5 Tahun'
                  },
                  tooltips: {
                      callbacks: {
                          label: function(tooltipItem, data2) {
//                               return "Rp" + Number(tooltipItem.xLabel).toFixed(0).replace(/./g, function(c, i, a) {
//                                   return i > 0 && c !== "," && (a.length - i) % 3 === 0 ? "." + c : c;
//                               });
                            return labels[tooltipItem.index].substring(0,100)+": "+"Rp" +Number(data[tooltipItem.index]).toFixed(0).replace(/./g, function(c, i, a){
                                return i > 0 && c !== "," && (a.length - i) % 3 === 0 ? "." + c : c;});
                          }
                      }
                  },
                  
                  legend: {
                    callbacks: {
                      label: function(tooltipItem, data2) {
                        return labels[tooltipItem.index].substring(0,100);
                            }
                    },
                      display: true,
                      position : 'bottom',
                      
                      labels: {
                          fontSize: 7
                          // fontColor: 'rgb(255, 99, 132)'
                      }
                  },                
                  responsive: true,
              }
      });
    });  
});

var d = new Date();
var n = d.getFullYear() + 1;

$.ajax({
    type: "GET",
    url: './agenda/tlJadwal/'+n,
    dataType: "json",

    success: function(data) {
      // console.log(data);
      var j = data.length;
          var post, i, k;
          for (i = 0; i < j; i++) {
            post = data[i];
            k = i+1;
            $('#tgl'+k).text('M : '+ formatTgl(data[i].tgl_mulai));
            $('#tglA'+k).text('S : '+formatTgl(data[i].tgl_akhir));
            $('#ur'+k).text(data[i].nm_langkah);
            $('#ico'+k).html('<i class="'+data[i].status_real+'"></i>');
          }
    }
});

$.ajax({
          type: "GET",
          url: './getTahunSetting',
          dataType: "json",
          success: function(data) {

          var j = data.length;
          var post, i;
          for (i = 0; i < j; i++) {
            post = data[i];
            $('select[name="id_tahun"]').append('<option value="'+ post.tahun_rencana +'">'+ post.tahun_rencana +'</option>');
          }
          }
      });


});
</script>



</html>
