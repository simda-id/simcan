<div class="row">
    <div class="col-md-12">
        <table id="w0" class="table table-striped table-bordered detail-view">
            <tbody>
                <tr>
                    <th>Misi</th>
                    <td>{{ $rkpd['uraian_misi_rpjmd'] }}</td>
                </tr>
                <tr>
                    <th>Tujuan/Sasaran</th>
                    <td>{{ $rkpd['uraian_tujuan_rpjmd'] }}</td>
                </tr>
                <tr>
                    <th>Program</th>
                    <td>{{ $rkpd['uraian_program_rpjmd'] }} </br>Pagu: {{ number_format($rkpd['pagu_program_rpjmd'], 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <!-- Tabs Below -->
        <div class='tabs-x tabs-above tab-bordered tab-height-md tabs-krajee'>
            <ul id="myTab-6" class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#kebijakan" role="tab" data-toggle="tab">Kebijakan</a></li>
                <li><a href="#indikator" role="tab-kv" data-toggle="tab">Indikator</a></li>
                <li><a href="#unitpelaksana">Unit Pelaksana</a></li>
            </ul>        
            <div id="myTabContent-6" class="tab-content">
                <div class="tab-pane fade in active" id="kebijakan">
                    <div class="row">
                        <div class="col-md-12">
                            <a class="btn btn-primary btn-xs" href="#" data-href="{{ url('/ranwalrkpd/'.$title[1].'/'.$rkpd->id_rkpd_ranwal.'/kebijakan/tambah') }}" data-toggle="modal" data-target="#myModal" data-title="Tambah Kebijakan RKPD"><i class="glyphicon glyphicon-plus bg-white"></i> Tambah</a>
                            <table id="ranwal-table" class="table table-striped table-bordered table-responsive">
                                <thead>
                                    <tr>
                                        <th style="text-align: center; vertical-align:middle">No Urut</th>
                                        <th style="text-align: center; vertical-align:middle">Uraian</th>
                                        <th style="text-align: center; vertical-align:middle">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach($kebijakan as $data)
                                    <tr>
                                        <td> {{ $i }} </td>
                                        <td> {{ $data->uraian_kebijakan }} </td>
                                        <td nowrap>
                                            <div class="btn-group" role="group">
                                                <a class="btn btn-default btn-xs" data-href="{{ url('/ranwalrkpd/'.$title[1].'/'.$data->id_rkpd_ranwal.'/kebijakan/'.$data->id_kebijakan_ranwal.'/ubah') }}" data-toggle="modal" data-target="#myModal" data-title="Sesuaikan Kebijakan #{{ $data->uraian_kebijakan }}"><i class="glyphicon glyphicon-pencil bg-white"></i> Ubah</a>
                                                {{ Form::open(['method' => 'DELETE', 'url' => '/ranwalrkpd/'.$title[1].'/'.$data->id_rkpd_ranwal.'/kebijakan/'.$data->id_kebijakan_ranwal.'/delete', 'onsubmit' => 'return confirm(\'Anda Yakin?\');']) }}
                                                    <button class="btn btn-xs btn-default" id="submit" type="submit">
                                                        <i class="glyphicon glyphicon-trash bg-white"></i> Hapus
                                                    </button>
                                                {{ Form::close() }}
                                            </div>    
                                        </td>
                                        
                                    </tr>
                                    <?php $i++; ?>
                                    @endforeach
                                </tbody>                
                            </table>
                        </div><!--column-->
                    </div><!--row-->                
                </div>
                <div class="tab-pane fade" id="indikator">
                    <div class="row">
                        <div class="col-md-12">
                            <a class="btn btn-primary btn-xs" href="#" data-href="{{ url('/ranwalrkpd/'.$title[1].'/'.$rkpd->id_rkpd_ranwal.'/indikator/tambah') }}" data-toggle="modal" data-target="#myModal" data-title="Tambah Indikator RKPD"><i class="glyphicon glyphicon-plus bg-white"></i> Tambah</a>
                            <table id="ranwal-table" class="table table-striped table-bordered table-responsive">
                                <thead>
                                    <tr>
                                        <th style="text-align: center; vertical-align:middle">No Urut</th>
                                        <th style="text-align: center; vertical-align:middle">Jenis</th>
                                        <th style="text-align: center; vertical-align:middle">Uraian</th>
                                        <th style="text-align: right; vertical-align:middle">Tolak Ukur</th>
                                        <th style="text-align: center; vertical-align:middle">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach($indikator as $data)
                                    <tr>
                                        <td> {{ $i }} </td>
                                        <td> {{ $data->kd_indikator }} </td>
                                        <td> {{ $data->uraian_indikator_program_rpjmd }} </td>
                                        <td> {{ $data->tolok_ukur_indikator }} </td>
                                        <td style="text-align: right; vertical-align:middle"> {{ number_format($data->angka_tahun, 0, ',', '.') }} </td>
                                        <td>
                                            {!! Form::open(['method' => 'POST', 'url' => '/admin/parameter/user/'.$data->user_id.'.'.$data->kd_unit.'.'.$data->kd_sub.'/deleteunit', 'onsubmit' => 'return confirm(\'Anda Yakin?\');']) !!}
                                                <button class="btn btn-xs btn-default" id="submit" type="submit">
                                                    <i class="glyphicon glyphicon-remove bg-white"></i> Hapus
                                                </button>
                                            {!! Form::close() !!}                
                                        </td>
                                        
                                    </tr>
                                    <?php $i++; ?>
                                    @endforeach
                                </tbody>                
                            </table>
                        </div><!--column-->
                    </div><!--row-->                 
                </div>
                <div class="tab-pane fade" id="unitpelaksana">
                    <div class="row">
                        <div class="col-md-12">
                            <a class="btn btn-primary btn-xs" href="#" data-href="{{ url('/ranwalrkpd/'.$title[1].'/'.$rkpd->id_rkpd_ranwal.'/pelaksana/tambah') }}" data-toggle="modal" data-target="#myModal" data-title="Tambah Pelaksana RKPD"><i class="glyphicon glyphicon-plus bg-white"></i> Tambah</a>
                            <table id="ranwal-table" class="table table-striped table-bordered table-responsive">
                                <thead>
                                    <tr>
                                        <th style="text-align: center; vertical-align:middle">No Urut</th>
                                        <th style="text-align: center; vertical-align:middle">Kode Unit</th>
                                        <th style="text-align: center; vertical-align:middle">Nama Unit</th>
                                        <th style="text-align: right; vertical-align:middle">Pagu</th>
                                        <th style="text-align: center; vertical-align:middle">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach($pelaksana as $data)
                                    <tr>
                                        <td> {{ $i }} </td>
                                        <td> {{ $data->id_unit }} </td>
                                        <td> {{ $data->getUnit->nm_unit }} </td>
                                        <td style="text-align: right; vertical-align:middle"> {{ number_format($data->pagu_tahun, 0, ',', '.') }} </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                {{ Form::open(['method' => 'DELETE', 'url' => '/ranwalrkpd/'.$title[1].'/'.$data->id_rkpd_ranwal.'/pelaksana/'.$data->id_pelaksana_rpjmd.'/delete', 'onsubmit' => 'return confirm(\'Anda Yakin?\');']) }}
                                                    <button class="btn btn-xs btn-default" id="submit" type="submit">
                                                        <i class="glyphicon glyphicon-trash bg-white"></i> Hapus
                                                    </button>
                                                {{ Form::close() }}
                                            </div>              
                                        </td>
                                        
                                    </tr>
                                    <?php $i++; ?>
                                    @endforeach
                                </tbody>                
                            </table>
                        </div><!--column-->
                    </div><!--row-->             
                </div>
            </div>

        </div>        
    </div>
</div>


<script>
    $(document).ready(function(){     

        $('#myTab-6 a').click(function (e) {
            e.preventDefault()
            $(this).tab('show')
        })          
    });
</script>
