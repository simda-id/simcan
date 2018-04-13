@extends('layouts.app1')
<meta name="_token" content="{!! csrf_token() !!}" />
{{-- <script src="{{ asset('/js/jquery-3.1.1.min.js')}}"></script>
<script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script> --}}

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
        		<div id="chart">
        		<div class="col-sm-12">
        			<div id="piechart"></div>
							{{-- @piechart('Misi5Tahun','piechart'); --}}
                            <?= \Lava::render("PieChart","Misi5Tahun","piechart");?>
        		</div>
        		<div class="col-sm-12">
        			<div id="barchart"></div>
							<?= \Lava::render("BarChart","Misi1Tahun","barchart");?>
        		</div>
				</div>
        	</div>
        	<div role="tabpanel" class="tab-pane" id="perUrusan">
        		<div id="chart">
        		<div class="col-sm-12">
        			<div id="piechart2"></div>
						<?= \Lava::render("PieChart","Urusan5Tahun","piechart2");?>
        		</div>
        		<div class="col-sm-12">
        			<div id="piechart3"></div>
						<?= \Lava::render("PieChart","Urusan1","piechart3");?>
        		</div>
        		<div class="col-sm-12">
        			<div id="piechart4"></div>
						<?= \Lava::render("PieChart","Urusan2","piechart4");?>
        		</div>
        		<div class="col-sm-12">
        			<div id="piechart5" ></div>
						<?= \Lava::render("PieChart","Urusan3","piechart5");?>
        		</div>
        		<div class="col-sm-12">
        			<div id="piechart6" ></div>
						<?= \Lava::render("PieChart","Urusan4","piechart6");?>
        		</div>
				</div>
        	</div>
        	<div role="tabpanel" class="tab-pane" id="perBidang">
        		<div id="chart">
        		<div class="col-sm-12">
        			<div id="barchart2"></div>
						<?= \Lava::render("BarChart","Bidang5Tahunan","barchart2");?>
        		</div>
				</div>
        	</div>
        </div>

       </div>
       </div>
     </div>



@endsection


