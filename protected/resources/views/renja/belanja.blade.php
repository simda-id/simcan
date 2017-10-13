<div class="row">
    <div class="col-md-12">
        <table id="w0" class="table table-striped table-bordered detail-view">
            <tbody>
                <tr>
                    <th>Program</th>
                    <td>{{ $rkpd['uraian_program_renstra'] }} </td>
                </tr>
                <tr>
                    <th>Kegiatan</th>
                    <td>{{ $rkpd['uraian_kegiatan_renstra'] }} </br>Pagu: {{ number_format($rkpd['pagu_tahun_kegiatan'], 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <th>Pelaksana</th>
                    <td>{{ $pelaksana->getSubUnit->nm_sub }}</td>
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
                <li class="active"><a href="#belanjadaftar">Belanja</a></li>
                <li><a href="#lokasi" role="tab" data-toggle="tab">Lokasi</a></li>
            </ul>        
            <div id="myTabContent-6" class="tab-content">
                <div class="tab-pane fade in active" id="belanjadaftar">
                    <div class="row">
                        <div class="col-md-12">
                            <a class="btn btn-primary btn-xs" href="#" data-href="{{ url('/renja/'.$title[1].'/'.$rkpd->id_renja.'/pelaksana/'.$pelaksana->id_pelaksana_renja.'/belanja/tambah') }}" data-toggle="modal" data-target="#myModal" data-title="Tambah Belanja Renja"><i class="glyphicon glyphicon-plus bg-white"></i> Tambah</a>
                            <table id="belanja-table" class="table table-striped table-bordered table-responsive">
                                <thead>
                                    <tr>
                                        <th style="text-align: center; vertical-align:middle">No Urut</th>
                                        <th style="text-align: center; vertical-align:middle">Kode Belanja</th>
                                        <th style="text-align: center; vertical-align:middle">Uraian Belanja</th>
                                        <th style="text-align: right; vertical-align:middle">Jumlah</th>
                                        <th style="text-align: center; vertical-align:middle">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach($belanja as $data)
                                    <tr>
                                        <td> {{ $i }} </td>
                                        <td> {{ $data->id_rekening_ssh }} </td>
                                        <td> {{ $data->uraian_belanja }} </td>
                                        <td style="text-align: right; vertical-align:middle"> {{ number_format($data->jml_belanja, 0, ',', '.') }} </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                    {{--  <a id="rincian-{{ $data->id_pelaksana_renja }}" class="btn btn-default btn-xs" data-href="{{ url('/renja/'.$title['1'].'/'.$data->id_renja.'/pelaksana/'.$data->id_pelaksana_renja.'/belanja') }}" ><i class="glyphicon glyphicon-menu-right bg-white"></i> Belanja</a>  --}}
                                                {{ Form::open(['method' => 'DELETE', 'url' => '/renja/'.$title[1].'/'.$rkpd->id_renja.'/pelaksana/'.$data->id_pelaksana_renja.'/delete', 'onsubmit' => 'return confirm(\'Anda Yakin?\');']) }}
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
                <div class="tab-pane fade" id="lokasi">
                    <div class="row">
                        <div class="col-md-12">
                            <table id="lokasi-table" class="table table-striped table-bordered table-responsive">
                                <thead>
                                    <tr>
                                        <th style="text-align: center; vertical-align:middle">No Urut</th>
                                        <th style="text-align: center; vertical-align:middle">Kode Lokasi</th>
                                        <th style="text-align: center; vertical-align:middle">Uraian Lokasi</th>
                                        {{--  <th style="text-align: right; vertical-align:middle">Jumlah</th>  --}}
                                        <th style="text-align: center; vertical-align:middle">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
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
        });
                       
    });
</script>
