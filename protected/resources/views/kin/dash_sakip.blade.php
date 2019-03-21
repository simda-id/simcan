@extends('layouts.app4')
<meta name="_token" content="{!! csrf_token() !!}" />

<style>
    #team {
        background: #eee !important;
    }

    .btn-primary:hover,
    .btn-primary:focus {
        background-color: #108d6f;
        border-color: #108d6f;
        box-shadow: none;
        outline: none;
    }

    .btn-primary {
        color: #fff;
        background-color: #007b5e;
        border-color: #007b5e;
    }

    section {
        padding: 60px 0;
    }

    section .section-title {
        text-align: center;
        color: #007b5e;
        margin-bottom: 50px;
        text-transform: uppercase;
    }

    #team .card {
        border: none;
        background: #ffffff;
    }

    .image-flip:hover .backside,
    .image-flip.hover .backside {
        -webkit-transform: rotateY(0deg);
        -moz-transform: rotateY(0deg);
        -o-transform: rotateY(0deg);
        -ms-transform: rotateY(0deg);
        transform: rotateY(0deg);
        border-radius: .25rem;
    }

    .image-flip:hover .frontside,
    .image-flip.hover .frontside {
        -webkit-transform: rotateY(180deg);
        -moz-transform: rotateY(180deg);
        -o-transform: rotateY(180deg);
        transform: rotateY(180deg);
    }

    .mainflip {
        -webkit-transition: 1s;
        -webkit-transform-style: preserve-3d;
        -ms-transition: 1s;
        -moz-transition: 1s;
        -moz-transform: perspective(1000px);
        -moz-transform-style: preserve-3d;
        -ms-transform-style: preserve-3d;
        transition: 1s;
        transform-style: preserve-3d;
        position: relative;
    }

    .frontside {
        position: relative;
        -webkit-transform: rotateY(0deg);
        -ms-transform: rotateY(0deg);
        z-index: 2;
        margin-bottom: 30px;        
        background: #ffffff;
        border-radius: 5px;
    }

    .backside {
        position: absolute;
        top: 0;
        left: 0;
        background: white;
        -webkit-transform: rotateY(-180deg);
        -moz-transform: rotateY(-180deg);
        -o-transform: rotateY(-180deg);
        -ms-transform: rotateY(-180deg);
        transform: rotateY(-180deg);
        -webkit-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
        -moz-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
        box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
    }

    .frontside,
    .backside {
        -webkit-backface-visibility: hidden;
        -moz-backface-visibility: hidden;
        -ms-backface-visibility: hidden;
        backface-visibility: hidden;
        -webkit-transition: 1s;
        -webkit-transform-style: preserve-3d;
        -moz-transition: 1s;
        -moz-transform-style: preserve-3d;
        -o-transition: 1s;
        -o-transform-style: preserve-3d;
        -ms-transition: 1s;
        -ms-transform-style: preserve-3d;
        transition: 1s;
        transform-style: preserve-3d;        
        height: 500px;
    }

    .frontside .card,
    .backside .card {
        /* height: 312px; */
    }

    .backside .card a {
        font-size: 18px;
        color: #007b5e !important;
    }

    .frontside .card .card-title,
    .backside .card .card-title {
        color: #007b5e !important;
    }

    .backside .card .card-title {
        margin-top: 30px; 
    }

    .backside .card .card-text {
        margin-top: 30px;
        margin-left: 10px;
        margin-right: 10px; 
    }

    .frontside .card .card-body img {
        margin-top: 15px; 
        width: 120px;
        height: 120px;
        border-radius: 50%;
        /* border: 2px solid #007b5e; */
        box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
           
    }
</style>

@section('content')
<div class="container" >
        <br>
        <div class="container text-center">
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4">               
                        <img class="" src="{{ asset('img/panrb.png') }}" style="width:30%; margin-top: -20px;filter: drop-shadow(0px 16px 10px rgba(158, 158, 158));" /></div>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <h2 style="font-size: 60px;line-height: 60px;margin-bottom: 20px;font-weight: 900;color:#fff;">simd<span style="color:#DF7401;">@</span><strong>SAKIP</strong></h2>   
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4">               
                        <img class="" src="{{ asset('vendor/bpkp_logo.png') }}" style="width:50%; margin-top: 20px;filter: drop-shadow(0px 16px 10px rgba(158, 158, 158));" />
                    </div>
                </div>
            </div>
            <hr>
        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img src="{{'assets/images/branding.png'}}"></p>
                                    <h2 class="card-title">Perencanaan Kinerja</h2>
                                    <p class="card-text" style="font-size:18px">Setiap instansi harus memiliki rencana kinerja yang baik, tepat, dan jelas ....</p>
                                    {{-- <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h2 class="card-title">Perencanaan Kinerja</h2>
                                    <p class="card-text" style="font-size:18px">Setiap instansi harus memiliki rencana kinerja yang baik, tepat, dan jelas sasaran dan tujuannya dengan indikator yang tepat baik di level outcome, output maupun input.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img src="{{'assets/images/growth.png'}}"></p>
                                    <h2 class="card-title">Pengukuran Kinerja</h2>
                                    <p class="card-text" style="font-size:18px">Setiap instansi melakukan pengukuran kinerja secara berkala dengan metode yang tepat ....</p>
                                    {{-- <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h2 class="card-title">Pengukuran Kinerja</h2>
                                    <p class="card-text" style="font-size:18px">Setiap instansi melakukan pengukuran kinerja secara berkala dengan metode yang tepat dengan membandingkan antara target dengan capaiannya.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img src="{{'assets/images/debt.png'}}"></p>
                                    <h2 class="card-title">Pelaporan Kinerja</h2>
                                    <p class="card-text" style="font-size:18px">Setiap instansi melaporkan kinerjanya secara berjenjang ....</p>
                                    {{-- <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="backside">
                            <div class="card">
                                <div class="card-body text-center mt-4">
                                    <h2 class="card-title">Pelaporan Kinerja</h2>
                                    <p class="card-text" style="font-size:18px">Setiap instansi melaporkan kinerjanya secara berjenjang dari unit terbawah hingga tertinggi.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                        <div class="mainflip">
                            <div class="frontside">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <p><img src="{{'assets/images/negotiation.png'}}"></p>
                                        <h2 class="card-title">Evaluasi Kinerja</h2>
                                        <p class="card-text" style="font-size:18px">Setiap instansi melakukan evaluasi capaian kinerjanya ....</p> --}}
                                        {{-- <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a> --}}
                                    {{-- </div>
                                </div>
                            </div>
                            <div class="backside">
                                <div class="card">
                                    <div class="card-body text-center mt-4">
                                        <h2 class="card-title">Evaluasi Kinerja</h2>
                                        <p class="card-text" style="font-size:18px">Setiap instansi melakukan evaluasi capaian kinerjanya untuk mengidentifikasi keberhasilan, kegagalan, hambatan, dan tantangan yang dihadapi pada setiap level mulai terbawah hingga tertinggi.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div> --}}
        </div>
</div>
@endsection

