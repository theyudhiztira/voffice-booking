@extends('web.app')

@section('title')
    vOffice | Home
@endsection

@section('css')
    <style>
        .why-us{
            background-image: radial-gradient(circle, rgb(246, 247, 250) 0px, rgb(225, 227, 235) 100%);
        }

        .card-img-overlay {
            background: rgba(0,0,0,.5);
            background: linear-gradient(0deg,rgba(0,0,0,.8) 0,rgba(0,0,0,.1));
            color: #f8f9fa;
            display: flex;
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            padding: 1.25rem;
            border-radius: calc(.25rem - 1px);
        }
    </style>
@endsection

@section('content')
    <section class="section">
        <div id="carouselExampleControls" class="carousel slide w-100 rounded mx-auto" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100 rounded" src="https://beta.voffice.co.id/images/header-background/banner-1.jpg" alt="Solusi Terbaik Untuk Meningkatkan Performa Bisnis Anda">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 rounded" src="https://beta.voffice.co.id/images/header-background/promo-september-banner.jpg" alt="Virtual Office Nomor 1 di Indonesia">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 rounded" src="https://beta.voffice.co.id/images/header-background/new-center-banner.png" alt="Dukung Wirausahawan di Tengah Pandemi">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
    <section class="section why-us px-5 pt-5">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <h2 class="text-center">Why vOffice?</h2>
                </div>
            </div>
            <div class="row">
                <div class="d-none d-md-block col-md-6 d-block align-items-center">
                    <img class="img img-fluid d-block position-absolute" style="bottom: 0;" src="https://beta.voffice.co.id/images/png/titi-kamal-so-600.webp">
                </div>
                <div class="col-12 col-md-6 mb-2">
                    <div class="row">
                        <div class="col align-items-center d-flex">
                            <h1 class="fas fa-fw fa-chart-line d-flex text-center mx-auto"></h1>
                        </div>
                        <div class="col-10">
                            <h4>17 Years of Serving</h4>
                            <p>We provided virtual office and serviced office for more than 17 years</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col align-items-center d-flex">
                            <h1 class="fas fa-fw fa-map-marker-alt d-flex text-center mx-auto"></h1>
                        </div>
                        <div class="col-10">
                            <h4>45 Location Around The Globe</h4>
                            <p>We have more than 45 locations around the globe and more than 25 locations in Indonesia</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col align-items-center d-flex">
                            <h1 class="fas fa-fw fa-users d-flex text-center mx-auto"></h1>
                        </div>
                        <div class="col-10">
                            <h4>50.000 Clients</h4>
                            <p>For more than 17 years we already served more than 50.000 clients</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col align-items-center d-flex">
                            <h1 class="fas fa-fw fa-check d-flex text-center mx-auto"></h1>
                        </div>
                        <div class="col-10">
                            <h4>Reliable</h4>
                            <p>vOffice Competence in guaranteeing 100% customer satisfaction and Perjakbi accredited</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="pt-5 mb-5">
        <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
            <div class="text-center mb-6">
                <h2 class="title-text">Blog</h2>
            </div>
            <div class="row justify-content-center no-gutters">

                <div class="col-sm-6 col-lg-5 mb-2 pb-2 px-1">
                    <a href="https://voffice.co.id/jakarta-virtual-office/business-tips/5-kunci-sukses-menjalankan-bisnis-dari-rumah/"
                        target="_blank">
                        <div class="card card-hover-up h-100">
                            <img src="https://beta.voffice.co.id/images/blog/bisnis-rumahan-735x400.jpg"
                                class="card-img object-fit-cover h-100" loading="lazy" alt="">
                            <div class="card-img-overlay">
                                <div class="align-self-end">
                                    <h6 class="card-title text-light">5 Kunci Sukses Menjalankan Bisnis dari Rumah</h6>
                                    <p class="text-secondary text-light opacity-75 mb-0">Apr 16, 2020</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-sm-6 col-lg-7 mb-2">
                    <div class="row nav-inline no-gutters">
                        <div class="col-sm-6 col-lg-6 col-12 mb-2 px-1">
                            <a href="https://voffice.co.id/jakarta-virtual-office/business-tips/work-from-home-lebih-produktif-dengan-5-aplikasi-ini/"
                                target="_blank">
                                <div class="card card-hover-up">
                                    <img src="https://beta.voffice.co.id/images/blog/wfh-735x400.jpg" class="card-img"
                                        loading="lazy" alt="">
                                    <div class="card-img-overlay">
                                        <div class="align-self-end">
                                            <p
                                                class="card-title font-quicksand text-light font-weight-bold mb-0 mb-sm-1">
                                                Work from Home Lebih Produktif dengan 5 Aplikasi Ini</p>
                                            <p class="text-secondary text-light opacity-75 mb-0 size-14">Apr 15, 2020
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-lg-6 col-12 mb-2 px-1">
                            <a href="https://voffice.co.id/jakarta-virtual-office/business-tips/4-cara-mendapat-uang-tambahan-tanpa-harus-ngantor/"
                                target="_blank">
                                <div class="card card-hover-up">
                                    <img src="https://beta.voffice.co.id/images/blog/freelance-735x400.jpg"
                                        class="card-img" loading="lazy" alt="">
                                    <div class="card-img-overlay">
                                        <div class="align-self-end">
                                            <p
                                                class="card-title font-quicksand text-light font-weight-bold mb-0 mb-sm-1">
                                                4 Cara Mendapat Uang Tambahan Tanpa Harus Ngantor</p>
                                            <p class="text-secondary text-light opacity-75 mb-0 size-14">Apr 17, 2020
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-lg-6 col-12 mb-2 px-1">
                            <a href="https://voffice.co.id/jakarta-virtual-office/business-tips/covid-19/"
                                target="_blank">
                                <div class="card card-hover-up">
                                    <img src="https://beta.voffice.co.id/images/blog/2020_03_17_89637_1584445220._large-735x400.jpg"
                                        class="card-img" loading="lazy" alt="">
                                    <div class="card-img-overlay">
                                        <div class="align-self-end">
                                            <p
                                                class="card-title font-quicksand text-light font-weight-bold mb-0 mb-sm-1">
                                                Menghadapi Kemungkinan Lockdown Untuk Bisnis Anda</p>
                                            <p class="text-secondary text-light opacity-75 mb-0 size-14">Apr 3, 2020</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-lg-6 col-12 mb-2 d-flex justify-content-center align-items-center mt-3 mt-md-0">
                            <a href="https://voffice.co.id/jakarta-virtual-office/business-tips/" class="d-flex align-items-center">Lihat Semua Blog <i class="fas fa-fw fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
