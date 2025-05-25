@extends('layouts.pdetail')
@section('content')
    <!-- Page Title -->
    <div class="page-title accent-background">
        <div class="container position-relative">
            <h1>Detail Wahana & Fasilitas</h1>
            <p>Esse dolorum voluptatum ullam est sint nemo et est ipsa porro placeat quibusdam quia assumenda
                numquam molestias.</p>
        </div>
    </div><!-- End Page Title -->

    <!-- Portfolio Details Section -->
    <section id="portfolio-details" class="portfolio-details section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">
                <div class="col-lg-8">
                    <div class="portfolio-details-slider swiper init-swiper">
                        <div class="swiper-wrapper align-items-center">
                            <div class="swiper-slide">
                                <img src="{{ asset('/storage/' . $wahana->gambar) }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="portfolio-info" data-aos="fade-up" data-aos-delay="200">
                        <h3>Detail</h3>
                        <ul>
                            <li><strong>Nama</strong>: {{ $wahana->nama_wahana }}</li>
                            <li><strong>Deskripsi</strong>: "{{ $wahana->deskripsi }}"</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Portfolio Details Section -->
@endsection
