@extends('layouts.app0')
<meta name="_token" content="{!! csrf_token() !!}" />

<style>

a {text-decoration: none; }
a:visited { text-decoration:none; } 
a:active { text-decoration:none; }
a:link { text-decoration:none; }

    .mb-60 {
    margin-bottom: 60px;
}
.services-inner {
    border: 2px solid #48c7ec;
    background: #fff;
    margin-left: 35px;
    transition: .3s;  
}
.our-services-img {
    float: left;
    margin-left: -36px;
    margin-right: 22px;
    margin-top: 28px;    
    border-radius: 50%;
}

.our-services-text {
    padding-right: 10px;
}
.our-services-text {
    overflow: hidden;
    padding: 28px 0 25px;
}
.our-services-text h4 {
    color: #222222;
    font-size: 22px;
    font-weight: 700;
    letter-spacing: 1px;
    margin-bottom: 8px;
    padding-bottom: 10px;
    position: relative;
    text-transform: uppercase;
}
.our-services-text h4::before {
    background: #ec6d48 none repeat scroll 0 0;
    bottom: 0;
    content: "";
    height: 1px;
    position: absolute;
    width: 35px;
}
.our-services-wrapper:hover .services-inner {
    background: #48c7ec none repeat scroll 0 0;
    border: 2px solid transparent;
    box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.2);       
    cursor: pointer;
}
.our-services-text p {
    margin-bottom: 0;
}
p {
    font-size: 14px;
    font-weight: 400;
    line-height: 26px;
    color: #666;
    margin-bottom: 15px;
}
</style>

@section('content')
<div class="container bootstrap snippet" >
        <div class="container text-center">
        <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <h2 style="font-size: 60px;line-height: 60px;margin-bottom: 20px;font-weight: 900; color:azure"><span>SSH </span>& <span>ASB</span></h2>
                    <p style="font-size: 20px; color:#fff"><strong>Standar Satuan Harga</strong> dan  <strong>Analisis Standar Belanja</strong>
                      <br>sebagai jembatan untuk menghubungkan antara proses perencanaan dengan proses penganggaran.</p>
                </div>
        </div>
        </div>
        <hr>
        <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="our-services-wrapper mb-60">
                        <a href="{{ url('/ssh') }}" style="text-decoration:none;">
                        <div class="services-inner">
                            <div class="our-services-img">
                                <img src="{{'../assets/images/price-tag.png'}}" width="68px" alt="">
                            </div>
                            <div class="our-services-text">                            
                                <h4>Standar Satuan Harga</h4>
                                <p>Satuan biaya berupa harga satuan, tarif yang ditetapkan untuk digunakan dalam penyusunan rencana kerja </p>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="our-services-wrapper mb-60">
                    <a href="{{ url('/asb/aktivitas') }}" style="text-decoration:none;">
                        <div class="services-inner">
                            <div class="our-services-img">
                                <img src="{{'../assets/images/cart_1.png'}}" width="68px" alt="">
                            </div>
                            <div class="our-services-text">
                                <h4>Analisis Standar Belanja</h4>
                                <p>Instrumen untuk mengukur kewajaran antara beban kerja dan belanja dan sebuah aktifitas atau kegiatan </p>
                            </div>
                        </div>
                    </a>
                    </div>
                </div>
            </div>
</div>  
@endsection

