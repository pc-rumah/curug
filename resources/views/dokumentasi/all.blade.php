@extends('layouts.semua')
@section('content')
    <!-- Page Title -->
    <div class="page-title accent-background">
        <div class="container position-relative">
            <h1>Semua Dokumentasi</h1>
            <p>Esse dolorum voluptatum ullam est sint nemo et est ipsa porro placeat quibusdam quia assumenda
                numquam molestias.</p>
        </div>
    </div><!-- End Page Title -->

    <!-- Portfolio Details Section -->
    <section id="portfolio-details" class="portfolio-details section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                @foreach ($dokumentasi as $item)
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                        <img src="{{ asset('/storage/' . $item->thumbnail) }}" class="img-fluid"
                            alt="{{ $item->nama_pengunjung }}">
                        <div class="portfolio-info">
                            <h4>{{ $item->nama_pengunjung }}</h4>
                            <h5>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</h5>
                            <a href="{{ asset('/storage/' . $item->thumbnail) }}" title="{{ $item->nama_pengunjung }}"
                                data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                    class="bi bi-zoom-in"></i></a>
                            <a href="{{ route('welcome.show', $item->id) }}" title="More Details" class="details-link"><i
                                    class="bi bi-link-45deg"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section><!-- /Portfolio Details Section -->
@endsection
