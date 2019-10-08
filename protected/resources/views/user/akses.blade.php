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
                <div id="treeview-container">

                    <div class="row" style="padding: 5px">
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <ul>
                                <li> Parameter
                                    <ul>
                                        <li data-value="101"> Pemda</li>
                                        <li data-value="102"> Kecamatan/Desa</li>
                                        <li data-value="103"> Unit Organisasi
                                            <ul>
                                                <li data-value ="103"> Unit & Sub Unit</li>
                                                <li data-value ="103"> Struktur Organisasi</li>
                                            </ul>
                                        </li>
                                        <li data-value="105"> Rekening</li>
                                        <li data-value="106"> Program-Kegiatan</li>
                                        <li data-value="107"> Lokasi
                                            <ul>
                                                <li data-value ="107"> Jenis Lokasi</li>
                                                <li data-value ="107"> Daftar Lokasi</li>
                                            </ul>
                                        </li>
                                        <li data-value="112"> Pegawai</li>
                                        <li data-value="111"> Satuan</li>
                                        <li data-value="106"> Agenda Tahunan</li>
                                        <li data-value="109"> Setting Aplikasi</li>
                                        <li data-value="104"> Sumber Dana</li>
                                    </ul>
                                </li>
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
                                                <li data-value ="804"> Cetak SSH</li>
                                            </ul>
                                        </li>
                                        <li> Analisa Standar Belanja
                                            <ul>
                                                <li data-value ="805"> Perkada & Struktur  ASB</li>
                                                <li data-value ="806"> Perhitungan ASB</li>
                                                <li data-value ="807"> Cetak ASB</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <br>
                            </ul>
                        </div><!--col-->
                        <div class="col-xs-12 col-sm-6 col-md-3">                            
                        <ul>
                            <li> API Management
                                <ul>
                                    <li data-value="890"> API Simda Keuangan</li>
                                    <li data-value="891"> API SIPD Kemendagri</li>
                                    <li data-value="892"> API KRISNA Bappenas</li>
                                    <li data-value="893"> API Setting</li>
                                </ul>
                            </li>
                        </ul>
                        <ul>
                            <li> Parameter Lainnya
                                <ul>
                                    <li data-value="110"> Management User</li>
                                    <li data-value="9"> Update</li>
                                </ul>
                            </li>
                        </ul>
                        </div><!--col-->
                        <div class="col-xs-12 col-sm-6 col-md-3">
                        <ul>
                            <li> Parameter AKIP
                                <ul>
                                    <li data-value="910"> Struktur Organisasi</li>
                                    <li data-value="911"> Daftar Pegawai</li>
                                </ul>
                            </li>
                        </ul>
                        </div>
                        {{-- <div class="col-xs-12 col-sm-6 col-md-3">
                            <ul>
                                <li data-value ="901"> Data Pendukung</li>
                            </ul>
                        </div> --}}<!--col-->
                    </div>
                    
                    <div class="row" style="padding: 5px">
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <ul>
                                <li> Pra RPJMD
                                    <ul>
                                        <li data-value ="290"> Analisa Capaian IKK</li>
                                        <li data-value ="291"> Identifikasi Masalah</li>
                                        <li data-value ="292"> Identifikasi Prioritas</li>
                                    </ul>
                                </li>
                            </ul>
                        </div><!--col-->
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <ul>
                                <li> RPJMD
                                    <ul>
                                        <li data-value ="201"> RPJMD</li>
                                        <li data-value ="202"> Cetak RPJMD </li>
                                    </ul>
                                </li>
                        </div><!--col-->
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <ul>
                                <li> Renstra Perangkat Daerah
                                    <ul>
                                        <li data-value ="301"> Renstra</li>
                                        <li data-value ="302"> Cetak Renstra </li>
                                    </ul>
                                </li>
                            </ul>
                        </div><!--col-->                        
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <ul>
                                <li> Indikator Kinerja
                                    <ul>
                                        <li data-value ="108"> Usulan Indikator</li>
                                        <li data-value ="108"> Indikator Kinerja</li>
                                        <li data-value ="108"> Verifikasi Indikator</li>
                                    </ul>
                                </li>
                            </ul>
                        </div><!--col-->
                    </div>

                    <div class="row" style="padding: 5px">
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <ul>
                                        <li> Rancangan Awal RKPD
                                            <ul>
                                                <li data-value ="401"> Load Data Tahunan RPJMD</li>
                                                <li data-value ="402"> Rancangan Awal RKPD</li>
                                                <li data-value ="401"> Dokumen Ranwal RKPD</li>
                                                <li data-value ="440"> Cetak Ranwal RKPD </li>
                                            </ul>
                                        </li>
                            </ul>
                        </div><!--col-->
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <ul>
                                        <li> Rancangan RKPD
                                            <ul>
                                                <li data-value ="403"> Load DataForum SKPD</li>
                                                <li data-value ="403"> Program RKPD</li>
                                                <li data-value ="404"> Penyesuaian PD</li>
                                                <li data-value ="403"> Dokumen Rancangan RKPD</li>
                                                <li data-value ="441"> Cetak Rancangan RKPD </li>
                                            </ul>
                                        </li>
                            </ul>
                        </div><!--col-->
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <ul>
                                        <li> Rancangan Akhir RKPD
                                            <ul>
                                                <li data-value ="405"> Load Data Musrenbang RKPD</li>
                                                <li data-value ="406"> Program RKPD</li>
                                                <li data-value ="404"> Penyesuaian PD</li>
                                                <li data-value ="405"> Dokumen Ranhir RKPD</li>
                                                <li data-value ="442"> Cetak Ranhir RKPD </li>
                                            </ul>
                                        </li>
                            </ul>
                        </div><!--col-->
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <ul>
                                        <li> RKPD Final
                                            <ul>
                                                <li data-value ="407"> Load Data Rancangan Akhir</li>
                                                <li data-value ="408"> Program RKPD</li>
                                                <li data-value ="404"> Penyesuaian PD</li>
                                                <li data-value ="407"> Dokumen RKPD Final</li>
                                                <li data-value ="443"> Cetak RKPD Final</li>
                                            </ul>
                                        </li>
                                    </ul>
                        </div><!--col-->
                    </div>
                        <div class="row" style="padding: 5px">
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <ul>
                                       <li> Rancangan Awal Renja
                                            <ul>
                                                <li data-value="501"> Load Data Ranwal Renja</li>
                                                <li data-value="501"> Rancangan Awal Renja</li>
                                                <li data-value="501"> Dokumen Ranwal Renja</li>
                                                <li data-value ="540"> Cetak Ranwal Renja </li>
                                            </ul>
                                        </li>                                        
                            </ul>
                        </div><!--col-->
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <ul>
                                <li> Rancangan Renja
                                    <ul>
                                        <li data-value="502"> Load Rancangan Renja</li>
                                        <li data-value="502"> Rancangan Renja </li>
                                        <li data-value="502"> Dokumen Rancangan Renja</li>
                                        <li data-value ="541"> Cetak Rancangan Renja </li>
                                    </ul>
                                </li>
                            </ul>
                        </div><!--col-->
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <ul>
                                <li> Renja Final
                                    <ul>
                                        <li data-value="505"> Load Data RKPD Final</li>
                                        <li data-value="505"> Renja Final</li>
                                        <li data-value="505"> Dokumen Renja< Final</li>
                                        <li data-value ="542"> Cetak Renja Final </li>
                                    </ul>
                                </li>
                            </ul>
                        </div><!--col-->
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <ul>
                                <li> Forum Perangkat Daerah
                                    <ul>
                                        <li data-value ="606"> Load Data Rancangan Awal</li>
                                        <li data-value ="607"> Forum Perangkat Daerah</li>
                                        <li data-value ="610"> Dokumen Forum</li>
                                        <li data-value ="640"> Cetak Forum OPD </li>
                                    </ul>
                                </li>                                
                            </ul>
                        </div><!--col--> 
                        </div>

                        <div class="row" style="padding: 5px">                       
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <ul>
                                <li> Musrenbang Kecamatan
                                    <ul>
                                        <li data-value ="601"> Usulan RW</li>
                                        <li data-value ="603"> Usulan Desa/Kelurahan</li>
                                        <li data-value ="604"> Load Usulan Desa</li>
                                        <li data-value ="605"> Musrenbang Kecamatan</li>
                                        <li data-value ="641"> Cetak Musrenbang Kecamatan</li>
                                    </ul>
                                </li>                               
                            </ul>
                        </div><!--col--> 
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <ul>
                                <li> Musrenbang Kota/Kabupaten
                                    <ul>
                                        <li data-value ="608"> Load Data Forum PD</li>
                                        <li data-value ="609"> Musrenbang RKPD</li>
                                        <li data-value ="611"> Penyesuaian PD</li>
                                        <li data-value ="608"> Dokumen Musrenbang RKPD</li>
                                        <li data-value ="642"> Cetak Musrenbang RKPD </li>
                                    </ul>
                                </li>                               
                            </ul>
                        </div><!--col-->

                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <ul>
                                <li> Pra Musrenbang ( Khusus Provinsi )
                                    <ul>
                                        <li data-value ="699"> Usulan Kabupaten/Kota'</li>
                                    </ul>
                                </li>                               
                            </ul>
                        </div><!--col-->
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <ul> 
                                <li> Pokok Pikiran DPRD
                                    <ul>
                                        <li data-value="503"> Pokok Pikiran DPRD</li>
                                        <li data-value="409"> Verifikasi Pokir</li>
                                        <li data-value="504"> Tindak Lanjut Pokir</li>
                                        <li data-value="643"> Cetak Pokir </li>
                                    </ul>   
                                </li>
                            </ul>
                        </div><!--col-->
                        </div>
                        <div class="row" style="padding: 5px">
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <ul>
                                <li> PPAS
                                    <ul>
                                        <li data-value="701"> Dokumen PPAS</li>
                                        <li data-value="702"> Program Pemda</li>
                                        <li data-value="703"> Program OPD</li>
                                        <li data-value="704"> Pagu OPD</li>
                                        <li data-value="740"> Cetak PPAS </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <ul>
                                <li> PPAS Perubahan
                                    <ul>
                                        <li data-value="720"> Dokumen PPAS Perubahan</li>
                                        <li data-value="721"> Program Pemda</li>
                                        <li data-value="722"> Program OPD</li>
                                        <li data-value="723"> Pagu OPD</li>
                                        <li data-value="741"> Cetak PPAS Perubahan</li>
                                    </ul>
                                </li>
                            </ul>
                        </div><!--col-->
                        </div> 
                         <div class="row" style="padding: 5px">
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <ul>
                                <li> APBD
                                    <ul>
                                        <li> Dokumen APBD
                                            <ul>
                                                <li data-value ="710"> Dokumen PPKD</li>
                                                <li data-value ="713"> Dokumen OPD</li>
                                            </ul>
                                        </li>
                                        <li data-value="711"> Program Pemda</li>
                                        <li data-value="712"> Program OPD</li>
                                        <li data-value="713"> Pagu OPD</li>
                                        <li data-value="742"> Cetak APBD </li>
                                    </ul>
                                </li>
                            </ul>
                        </div><!--col-->
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <ul>
                                <li> APBD Pergeseran
                                    <ul>
                                        <li> Dokumen APBD Pergerseran
                                            <ul>
                                                <li data-value ="730"> Dokumen PPKD</li>
                                                <li data-value ="733"> Dokumen OPD</li>
                                            </ul>
                                        </li>
                                        <li data-value="731"> Program Pemda</li>
                                        <li data-value="732"> Program OPD</li>
                                        <li data-value="733"> Pagu OPD</li>
                                        <li data-value="743"> Cetak APBD Pergeseran</li>
                                    </ul>
                                </li>
                            </ul>
                        </div><!--col-->
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <ul>
                                <li> APBD Perubahan
                                    <ul>
                                        <li> Dokumen APBD Perubahan
                                            <ul>
                                                <li data-value ="750"> Dokumen PPKD</li>
                                                <li data-value ="753"> Dokumen OPD</li>
                                            </ul>
                                        </li>
                                        <li data-value="751"> Program Pemda</li>
                                        <li data-value="752"> Program OPD</li>
                                        <li data-value="753"> Pagu OPD</li>
                                        <li data-value="744"> Cetak APBD Perubahan</li>
                                    </ul>
                                </li>
                            </ul>
                        </div><!--col-->
                        </div> 
                        <div class="row" style="padding: 5px">
                        <div class="col-xs-12 col-sm-6 col-md-3">
                        <ul>
                            <li> Indikator Kinerja Utama
                                <ul>
                                    <li data-value="920"> IKU Pemerintah Daerah</li>
                                    <li data-value="921"> IKU Perangkat Daerah</li>
                                </ul>
                            </li>
                        </ul>
                        <ul>
                            <li> Cascading Sasaran
                                <ul>
                                    <li data-value="930"> Cascading Program - Kegiatan</li>
                                    <li data-value="931"> Pohon Kinerja</li>
                                </ul>
                            </li>
                        </ul>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3">
                        <ul>
                            <li> Perjanjian Kinerja
                                <ul>
                                    <li data-value="935"> Perjanjian Kinerja Pemda</li>
                                    <li data-value="932"> Perjanjian Kinerja Level 1</li>
                                    <li data-value="933"> Perjanjian Kinerja Level 2</li>
                                    <li data-value="934"> Perjanjian Kinerja Level 3</li>
                                </ul>
                            </li>
                        </ul>
                        </div><!--col-->
                        <div class="col-xs-12 col-sm-6 col-md-3">
                        <ul>
                            <li> Pengukuran Kinerja
                                <ul>
                                    <li data-value="943"> Realisasi Kinerja Pemda</li>
                                    <li data-value="940"> Realisasi Kinerja Level 1</li>
                                    <li data-value="941"> Realisasi Kinerja Level 2</li>
                                    <li data-value="942"> Realisasi Kinerja Level 3</li>
                                </ul>
                            </li>
                        </ul>
                        <ul>
                            <li data-value="950"> Pelaporan Kinerja
                        </ul>
                        </div>
                        </div>
                        
                </div>
                
                <!--treeview-container -->                
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