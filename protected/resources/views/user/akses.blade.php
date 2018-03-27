@extends('layouts.parameterlayout')
{{-- @section('scriptsHead')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" />
@endsection --}}
@section('content')	
<div class="col-sm-12 col-md-12 col-lg-12">	
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Akses Grup:<b> {{ $model->name }} </b> </h3>
        </div>
        <div class="panel-body" style="background: #d9edf7">           
            <form class="form-horizontal" id="formAkses" role="form" method="POST" action="{{ Request::url() }}">
            <!--method="get" action=""-->
                {{ csrf_field() }}

                <div class="row">
                    <input type="hidden" name="selected" value="">
                    <div class="col-md-3 text-left">
                      <div class="ui-group-buttons">
                        <button id="submit" type="submit" class="btn btn-sm btn-primary btnLoadAsb btn-labeled">
                            <span class="btn-label"><i id="fooLoadAsb" class="fa fa-floppy-o fa-lg fa-fw"></i></span>Simpan</button>
                        <div class="or"></div>
                        <a href="{{url('admin/parameter/user/group')}}" id="btnBatal" type="button" class="btn btn-sm btn-warning btn-labeled">
                            <span class="btn-label"><i class="fa fa-sign-out fa-lg fa-fw"></i></span>Batal</a>
                      </div>
                    </div>
                    <div class="col-md-9 text-right">
                    </div>
                </div>

                <div id="treeview-container">

                    <div class="row" style="padding: 5px">
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <ul>
                                <li> Parameter
                                    <ul>
                                        <li data-value="101"> Pemda</li>
                                        <li data-value="102"> Kecamatan/Desa</li>
                                        <li data-value="103"> Unit Organisasi</li>
                                        <li data-value="105"> Rekening</li>
                                        <li data-value="106"> Program-Kegiatan</li>
                                        <li data-value="107"> Lokasi</li>
                                        <li data-value="108"> Indikator</li>
                                        <li data-value="111"> Satuan</li>
                                        <li data-value="104"> Agenda Tahunan</li>
                                        <li data-value="109"> Setting Aplikasi</li>
                                        <li data-value="104"> Parameter Lainnya</li>
                                    </ul>
                                </li>
                                <li data-value="110"> Management User</li>
                                <li data-value="9"> Update</li>
                            </ul>
                        </div><!--col-->

                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <ul>
                                <li> ASB-SSH
                                    <ul>
                                        <li > Standar Satuan Harga
                                            <ul>
                                                <li data-value ="801"> Zona SSH</li>
                                                <li data-value ="802"> Struktur SSH</li>
                                                <li data-value ="803"> Perkada SSH</li>
                                            </ul>
                                        </li>
                                        <li> Analisa Standar Belanja
                                            <ul>
                                                <li data-value ="805"> Perkada & Struktur  ASB</li>
                                                <li data-value ="806"> Perhitungan ASB</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <br>
                                <li data-value ="901"> Data Pendukung</li>
                            </ul>
                        </div><!--col-->

                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <ul>
                                <li> RPJMD
                                    <ul>
                                        <li data-value ="20"> RPJMD</li>
                                    </ul>
                                </li>
                                <li> Renstra Perangkat Daerah
                                    <ul>
                                        <li data-value ="30"> Renstra</li>
                                    </ul>
                                </li>
                                <li> Pencetakan RPJMD dan Renstra
                                    <ul>
                                        <li data-value ="20"> Cetak RPJMD </li>
                                        <li data-value ="30"> Cetak Renstra </li>
                                    </ul>
                                </li>
                            </ul>
                        </div><!--col-->

                        <div class="col-xs-12 col-sm-6 col-md-3">
                            {{-- <ul>
                                <li> PPAS
                                    <ul>
                                        <li data-value="701"> Load Data RKPD</li>
                                        <li data-value="702"> Penyusunan PPAS</li>
                                    </ul>
                                </li>
                            </ul> --}}
                        </div><!--col-->
                    </div>
                    
                    <div class="row" style="padding: 5px">
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <ul>
                                <li> RKPD
                                    <ul>
                                        <li> Rancangan Awal RKPD
                                            <ul>
                                                <li data-value ="401"> Load Data Tahunan RPJMD</li>
                                                <li data-value ="402"> Rancangan Awal RKPD</li>
                                                <li data-value ="401"> Dokumen Ranwal RKPD</li>
                                            </ul>
                                        </li>
                                        <li> Rancangan RKPD
                                            <ul>
                                                <li data-value ="403"> Load DataForum SKPD</li>
                                                <li data-value ="404"> Rancangan RKPD</li>
                                                <li data-value ="403"> Dokumen Rancangan RKPD</li>
                                            </ul>
                                        </li>
                                        <li> Rancangan Akhir RKPD
                                            <ul>
                                                <li data-value ="405"> Load Data Musrenbang RKPD</li>
                                                <li data-value ="406"> Rancangan Akhir RKPD</li>
                                                <li data-value ="405"> Dokumen Ranhir RKPD</li>
                                            </ul>
                                        </li>
                                        <li> RKPD Final
                                            <ul>
                                                <li data-value ="407"> Load Data Rancangan Akhir</li>
                                                <li data-value ="408"> RKPD Final</li>
                                                <li data-value ="407"> Dokumen RKPD Final</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div><!--col-->

                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <ul>
                                <li> Renja Perangkat Daerah
                                    <ul>
                                       <li> Rancangan Awal Renja
                                            <ul>
                                                <li data-value="501"> Load Data Ranwal Renja</li>
                                                <li data-value="501"> Rancangan Awal Renja</li>
                                                <li data-value="501"> Dokumen Ranwal Renja</li>
                                            </ul>
                                        </li>
                                        <li> Rancangan Renja
                                            <ul>
                                                <li data-value="502"> Load Rancangan Renja</li>
                                                <li data-value="502"> Rancangan Renja </li>
                                                <li data-value="502"> Dokumen Rancangan Renja</li>
                                            </ul>
                                        </li>
                                        <li data-value="504"> Renja Final
                                            <ul>
                                                <li data-value="502"> Load Data RKPD Final</li>
                                                <li data-value="502"> Renja Final</li>
                                                <li data-value="502"> Dokumen Renja< Final</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li data-value="503"> Pokok Pikiran DPRD
                                     <ul>
                                                <li data-value="503"> Pokok Pikiran DPRD</li>
                                                <li data-value="401"> Verifikasi Pokir</li>
                                                <li data-value="501"> Tindak Lanjut Pokir</li>
                                            </ul>   
                                </li>
                                
                            </ul>
                        </div><!--col-->
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <ul>
                                <li> Musrenbang RKPD
                                    <ul>
                                        <li> Kecamatan
                                            <ul>
                                                <li data-value ="601"> Usulan RW</li>
                                                {{-- <li data-value ="602">Load Usulan RW</li> --}}
                                                <li data-value ="603"> Usulan Desa/Kelurahan</li>
                                                <li data-value ="604"> Load Usulan Desa</li>
                                                <li data-value ="605"> Musrenbang Kecamatan</li>
                                                {{-- <li data-value ="605"> Posting Musrenbang Kecamatan</li> --}}
                                            </ul>
                                        </li>
                                        <li> Kota/Kabupaten
                                            <ul>
                                                <li data-value ="608"> Load Data Forum PD</li>
                                                <li data-value ="609"> Musrenbang RKPD</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li> Forum Perangkat Daerah
                                    <ul>
                                        <li data-value ="606"> Load Data Awal Forum Perangkat Daerah</li>
                                        <li data-value ="607"> Forum Perangkat Daerah</li>
                                    </ul>
                                </li>
                            </ul>
                        </div><!--col-->

                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <ul>
                                <li> PPAS
                                    <ul>
                                        <li data-value="701"> Load Data RKPD</li>
                                        <li data-value="702"> Penyusunan PPAS</li>
                                    </ul>
                                </li>
                            </ul>
                        </div><!--col-->
                      </div> 
                        
                </div><!--treeview-container -->                
                {{-- <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" name="selected" value="">
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" id="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </form>
        </div>
    </div>
</div>
@endsection
 
@section('scripts')
   {{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script> --}}
    {{ Html::script('tvjs/logger.js') }}
    {{ Html::script('tvjs/treeview.js') }}
    
    <script>
        $(document).ready(function(){
            // first we assign preselected menu for this user --@hoaaah
            $('#treeview-container').treeview({
                debug : true,
                // data : ['101', '104']
                data : <?= $selected ?>
            });
            // and then we cath the submit from our treeview container --@hoaaah
            $('#formAkses').on('submit',function(e)
            {
                var form = $(this);
                data = $('#treeview-container').treeview('selectedValues');
                $('input[name=selected]').val(data)
                $.post(
                    form.attr("action"),
                    form.serialize()
                );
            }); 


        });
    </script>
@endsection