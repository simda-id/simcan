@extends('layouts.app1')
<meta name="_token" content="{!! csrf_token() !!}" />

<script src="{{ asset('/js/Chart.bundle.js') }}"></script>

@section('content')
    <div class="container-fluid col-sm-12 row">
        <ul class="breadcrumb">
          <li><a href="{{ url('/') }}">RPJMD - RENSTRA</a></li>
          <li class="active">Dashboard</li>
        </ul>
        <div class="panel panel-info">
        <div class="panel-body">

            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#perMisi" aria-controls="perMisi" role="tab" data-toggle="tab">Alokasi Dana per Misi</a></li>
                <li><a href="#perUrusan" aria-controls="perUrusan" role="tab" data-toggle="tab">Alokasi Dana per Urusan</a></li>
                <li><a href="#perBidang" aria-controls="perBidang" role="tab" data-toggle="tab">Alokasi Dana per Bidang</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="perMisi">
                	<br>
                	<div class="col-md-6">
						<div class="panel panel-warning">
						  	<div class="panel-heading">
						    	<h3 class="panel-title">Misi Pemda selama 5 tahun </h3>
					 	 	</div>
						  	<div class="panel-body">
					    		<canvas id="canvasMisi5" height="300" width="600"></canvas>
							</div>								
						</div>
					</div>
					<div class="col-md-6">
						<div class="panel panel-info">
						  	<div class="panel-heading">
						    	<h3 class="panel-title">Per Misi per Tahun </h3>
					 	 	</div>
						  	<div class="panel-body">
					    		<canvas id="canvasMisi1" height="300" width="600"></canvas>
							</div>								
						</div>
					</div>
                </div>
                <div role="tabpanel" class="tab-pane" id="perUrusan">
                	<br>
                	<div class="col-md-6">
						<div class="panel panel-primary">
						  	<div class="panel-heading">
						    	<h3 class="panel-title">Urusan 5 Tahun </h3>
					 	 	</div>
						  	<div class="panel-body">
					    		<canvas id="canvasUrusan5" height="200" width="600"></canvas>
							</div>								
						</div>
					</div>
					<div class="col-md-6">
						<div class="panel panel-info">
						  	<div class="panel-heading">
						    	<h3 class="panel-title">Total Alokasi Dana per Bidang (Urusan Wajib Pelayanan Dasar) </h3>
					 	 	</div>
						  	<div class="panel-body">
					    		<canvas id="canvasUrusan1" height="200" width="600"></canvas>
							</div>								
						</div>
					</div>
					<br>
                	<div class="col-md-6">
						<div class="panel panel-warning">
						  	<div class="panel-heading">
						    	<h3 class="panel-title">Total Alokasi Dana per Bidang (Urusan Wajib Bukan Pelayanan Dasar) </h3>
					 	 	</div>
						  	<div class="panel-body">
					    		<canvas id="canvasUrusan2" height="200" width="600"></canvas>
							</div>								
						</div>
					</div>
					<div class="col-md-6">
						<div class="panel panel-danger">
						  	<div class="panel-heading">
						    	<h3 class="panel-title">Total Alokasi Dana per Bidang (Urusan Pilihan) </h3>
					 	 	</div>
						  	<div class="panel-body">
					    		<canvas id="canvasUrusan3" height="200" width="600"></canvas>
							</div>								
						</div>
					</div>
					<br>
                	<div class="col-md-6">
						<div class="panel panel-success">
						  	<div class="panel-heading">
						    	<h3 class="panel-title">Total Alokasi Dana per Bidang (Urusan Pemerintahan Fungsi Penunjang) </h3>
					 	 	</div>
						  	<div class="panel-body">
					    		<canvas id="canvasUrusan4" height="200" width="600"></canvas>
							</div>								
						</div>
					</div>
                </div>
                <div role="tabpanel" class="tab-pane" id="perBidang">
                	<br>
                	<div class="col-md-12">
						<div class="panel panel-success">
						  	<div class="panel-heading">
						    	<h3 class="panel-title">Bidang 5 Tahun</h3>
					 	 	</div>
						  	<div class="panel-body">
					    		<canvas id="canvasBidang5" height="200" width="600"></canvas>
							</div>								
						</div>
					</div>
                </div>
            </div>

        </div>
        </div>
    </div>
@endsection

@section('scripts')
<script  type="text/javascript" language="javascript" class="init">

// $(document).ready(function() {

$(function(){
  $.getJSON("misi5tahun", function (result) {

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
        type: 'pie',
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

  $.getJSON("misi1tahun", function (result) {

	    var labels = [],data1=[],data2=[],data3=[],data4=[],data5=[],year1=[],year2=[],year3=[],year4=[],year5=[];
	    year1.push(result[0].tahun_1);
        year2.push(result[0].tahun_2);
        year3.push(result[0].tahun_3);
        year4.push(result[0].tahun_4);
        year5.push(result[0].tahun_5);
	    for (var i = 0; i < result.length; i++) {
	         labels.push(result[i].uraian_misi_rpjmd.substring(0,120));
	        data1.push(result[i].pagu_tahun1);
	        data2.push(result[i].pagu_tahun2);
	        data3.push(result[i].pagu_tahun3);
	        data4.push(result[i].pagu_tahun4);
	        data5.push(result[i].pagu_tahun5);
	        
	    }

	    var chartData = {
	      labels : labels,
	      datasets : [
	        {
	            label: year1,
	            backgroundColor: "rgba(255,0,0,0.5)",
	            data : data1
	        },{
	            label: year2,
	            backgroundColor: "rgba(0,255,0,0.5)",
	            data : data2
	        },{
	            label: year3,
	            backgroundColor: "rgba(0,0,255,0.5)",
	            data : data3
	        },{
	            label: year4,
	            backgroundColor: "rgba(255,0,255,0.5)",
	            data : data4
	        },{
	            label: year5,
	            backgroundColor: "rgba(0,255,255,0.5)",
	            data : data5
	        }
	      ]
	    };

	    var ctx = document.getElementById('canvasMisi1').getContext('2d');
	    
	    var chartInstance = new Chart(ctx, {
	        type: 'horizontalBar',
	        data: chartData,
	        options: {
	                elements: {
	                    rectangle: {
	                        borderWidth: 0,
	                       // borderColor: 'rgb(0, 255, 0)',
	                        borderSkipped: 'bottom'
	                    }
	                },
	                title: {
	                    display: false,
	                    text: 'Misi 1 Tahun'
	                },
	                scales: {
	                    yAxes: [{
	                        ticks: {	                        	
                                fontSize : 7},
	                        scaleLabel: {
	                                display: true,
	                                labelString: 'Misi'
	                            }
	                    }],
	                    xAxes: [{
	                        ticks: {
	                            userCallback: function(value, index, values) {
	                                value = value/1000;
	                                value = value.toString();
	                                value = value.split(/(?=(?:...)*$)/);
	                                value = value.join('.');
	                                return value + 'rb';
	                            }
	                        },
	                        scaleLabel: {
	                                display: true,
	                                labelString: 'Pagu'
	                            }
	                        }
	                ]},
	                tooltips: {
	                    callbacks: {
	                        label: function(tooltipItem, data1) {
	                            return "Rp" + Number(tooltipItem.xLabel).toFixed(0).replace(/./g, function(c, i, a) {
	                                return i > 0 && c !== "," && (a.length - i) % 3 === 0 ? "." + c : c;
	                            });
	                        }
	                    }
	                },
	                legend: {
	                    display: true,
	                    position : 'bottom',
	                    labels: {}
	                },                
	                responsive: true,
	            }
	    });
	  });

  $.getJSON("urusan5tahun", function (result) {

	    var labels = [],data=[];
	    for (var i = 0; i < result.length; i++) {
	         labels.push(result[i].nm_urusan.substring(0,120));
	        data.push(result[i].total_pagu);
	    }

	    

	    console.log(data);

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
	        type: 'pie',
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
//	                             return "Rp" + Number(tooltipItem.xLabel).toFixed(0).replace(/./g, function(c, i, a) {
//	                                 return i > 0 && c !== "," && (a.length - i) % 3 === 0 ? "." + c : c;
//	                             });
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

  $.getJSON("urusan1", function (result) {

	    var labels = [],data=[];
	    for (var i = 0; i < result.length; i++) {
	         labels.push(result[i].nm_bidang.substring(0,120));
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

	    var ctx = document.getElementById('canvasUrusan1').getContext('2d');
	    
	    var chartInstance = new Chart(ctx, {
	        type: 'pie',
	        data: chartData,
	        options: {
	                elements: {
	                    arc: {
				            borderWidth: 0
				        }
	                },
	                title: {
	                    display: false,
	                    text: 'Total Alokasi Dana per Bidang (Urusan Wajib Pelayanan Dasar)'
	                },
	                tooltips: {
	                    callbacks: {
	                        label: function(tooltipItem, data2) {
//	                             return "Rp" + Number(tooltipItem.xLabel).toFixed(0).replace(/./g, function(c, i, a) {
//	                                 return i > 0 && c !== "," && (a.length - i) % 3 === 0 ? "." + c : c;
//	                             });
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
	                segmentShowStroke: false
	            }
	    });
	  });


  $.getJSON("urusan2", function (result) {

	    var labels = [],data=[];
	    for (var i = 0; i < result.length; i++) {
	         labels.push(result[i].nm_bidang.substring(0,120));
	        data.push(result[i].total_pagu);
	    }

	    

	    console.log(data);

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

	    var ctx = document.getElementById('canvasUrusan2').getContext('2d');
	    
	    var chartInstance = new Chart(ctx, {
	        type: 'pie',
	        data: chartData,
	        options: {
	                elements: {
	                    arc: {
				            borderWidth: 0
				        }
	                },
	                title: {
	                    display: false,
	                    text: 'Total Alokasi Dana per Bidang (Urusan Wajib Bukan Pelayanan Dasar)'
	                },
	                tooltips: {
	                    callbacks: {
	                        label: function(tooltipItem, data2) {
//	                             return "Rp" + Number(tooltipItem.xLabel).toFixed(0).replace(/./g, function(c, i, a) {
//	                                 return i > 0 && c !== "," && (a.length - i) % 3 === 0 ? "." + c : c;
//	                             });
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

  $.getJSON("urusan3", function (result) {

	    var labels = [],data=[];
	    for (var i = 0; i < result.length; i++) {
	         labels.push(result[i].nm_bidang.substring(0,120));
	        data.push(result[i].total_pagu);
	    }

	    

	    console.log(data);

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

	    var ctx = document.getElementById('canvasUrusan3').getContext('2d');
	    
	    var chartInstance = new Chart(ctx, {
	        type: 'pie',
	        data: chartData,
	        options: {
	                elements: {
	                    arc: {
				            borderWidth: 0
				        }
	                },
	                title: {
	                    display: false,
	                    text: 'Total Alokasi Dana per Bidang (Urusan Pilihan)'
	                },
	                tooltips: {
	                    callbacks: {
	                        label: function(tooltipItem, data2) {
//	                             return "Rp" + Number(tooltipItem.xLabel).toFixed(0).replace(/./g, function(c, i, a) {
//	                                 return i > 0 && c !== "," && (a.length - i) % 3 === 0 ? "." + c : c;
//	                             });
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

  $.getJSON("urusan4", function (result) {

	    var labels = [],data=[];
	    for (var i = 0; i < result.length; i++) {
	         labels.push(result[i].nm_bidang.substring(0,120));
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

	    var ctx = document.getElementById('canvasUrusan4').getContext('2d');
	    
	    var chartInstance = new Chart(ctx, {
	        type: 'pie',
	        data: chartData,
	        options: {
	                elements: {
	                    arc: {
				            borderWidth: 0
				        }
	                },
	                title: {
	                    display: false,
	                    text: 'Total Alokasi Dana per Bidang (Urusan Pemerintahan Fungsi Penunjang)'
	                },
	                tooltips: {
	                    callbacks: {
	                        label: function(tooltipItem, data2) {
//	                             return "Rp" + Number(tooltipItem.xLabel).toFixed(0).replace(/./g, function(c, i, a) {
//	                                 return i > 0 && c !== "," && (a.length - i) % 3 === 0 ? "." + c : c;
//	                             });
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


  $.getJSON("bidang5tahun", function (result) {

	    var labels = [],data=[];
	    for (var i = 0; i < result.length; i++) {
	         labels.push(result[i].nm_bidang.substring(0,120));
	        data.push(result[i].total_pagu);
	    }

	    var chartData = {
	      labels : labels,
	      datasets : [
	        {
	            label: 'Pagu',
	            backgroundColor:  ["#0074D9"],
	            data : data
	        }
	      ]
	    };

	    var ctx = document.getElementById('canvasBidang5').getContext('2d');
	    
	    var chartInstance = new Chart(ctx, {
	        type: 'horizontalBar',
	        data: chartData,
	        options: {
	                elements: {
	                    // rectangle: {
	                    //     borderWidth: 2,
	                    //     borderColor: 'rgb(0, 255, 0)',
	                    //     borderSkipped: 'bottom'
	                    // },
	                    arc: {
				            borderWidth: 0
				        }

	                },
	                title: {
	                    display: false,
	                    text: 'Bidang 5 Tahun'
	                },
	                tooltips: {
	                    callbacks: {
	                        label: function(tooltipItem, data2) {
//	                             return "Rp" + Number(tooltipItem.xLabel).toFixed(0).replace(/./g, function(c, i, a) {
//	                                 return i > 0 && c !== "," && (a.length - i) % 3 === 0 ? "." + c : c;
//	                             });
	                        	return labels[tooltipItem.index].substring(0,100)+": "+"Rp" +Number(data[tooltipItem.index]).toFixed(0).replace(/./g, function(c, i, a){
	                              return i > 0 && c !== "," && (a.length - i) % 3 === 0 ? "." + c : c;});
	                        }
	                    }
	                },
	                scales: {
	                    yAxes: [{
	                        ticks: {
	                        	
                                fontSize : 7},
	                        scaleLabel: {
	                                display: true,
	                                labelString: 'Bidang'
	                            }
	                    }],
	                    xAxes: [{
	                        ticks: {
	                            userCallback: function(value, index, values) {
	                                value = value/1000000;
	                                value = value.toString();
	                                value = value.split(/(?=(?:...)*$)/);
	                                value = value.join('.');
	                                return value + 'jt';
	                            }
	                        },
	                        scaleLabel: {
	                                display: true,
	                                labelString: 'Pagu'
	                            }
	                        }
	                ]},
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


// });
</script>
@endsection


