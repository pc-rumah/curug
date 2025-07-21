<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Curug-Semirang</title>
    <meta property="og:title" content="Curug Semirang - Air Terjun Menakjubkan di Desa Gogik Semarang">
    <meta property="og:description"
        content="Temukan keindahan alam, rute perjalanan, dan tips berkunjung ke Curug Semirang.">

    <!-- Favicons -->
    <link href="{{ asset('landing/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('landing/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('landing/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('landing/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('landing/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landing/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('landing/assets/css/main.css') }}" rel="stylesheet">

</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            <a href="/" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1 class="sitename">{{ $setting->judul_halaman ?? 'ini judul' }}</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero" class="active">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#team">Team</a></li>
                    <li><a href="#dokumentasi">Dokumentasi</a></li>
                    <li><a href="#wahana">Wahana</a></li>
                    <li><a href="#testimonials">Kata Pengunjung</a></li>
                    <li><a href="#tiket">Beli Tiket</a></li>
                    <li><a href="/pembeli">Daftar Pembeli</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </header>

    <main class="main">
        <!-- Hero Section -->
        <section id="hero" class="hero section accent-background">
            @if (isset($setting->sampul))
                <img src="{{ asset('/storage/' . $setting->sampul) }}" alt="gambar sampul" data-aos="fade-in">
            @endif
            <div class="container text-center" data-aos="fade-up" data-aos-delay="100">
                <h2>{{ $setting->text_sambutan ?? 'bagian text' }}</h2>
                <p>{{ $setting->desc_sambutan ?? 'bagian deskripsi' }}</p>
                <a href="#about" class="btn-scroll" title="Scroll Down"><i class="bi bi-chevron-down"></i></a>
            </div>
        </section><!-- /Hero Section -->

        <!-- About Section -->
        <section id="about" class="about section">
            <div class="container">
                <div class="row gy-5">
                    <div class="content col-xl-5 d-flex flex-column" data-aos="fade-up" data-aos-delay="100">
                        <h3>Tentang Curug-Semirang</h3>
                        <p>
                            Air Terjun Semirang adalah Wisata Alam yang berada di Desa Gogik, Kecamatan Ungaran,
                            Kabupaten Semarang, Jawa Tengah. Objek Wisata ini dikelilingi oleh pepohonan pinus.
                        </p>
                    </div>

                    <div class="col-xl-7" data-aos="fade-up" data-aos-delay="200">
                        <div class="row gy-4">

                            <div class="col-md-6 icon-box position-relative">
                                <i class="bi bi-tree"></i>
                                <h4><a href="#" class="stretched-link">Explore Alam</a></h4>
                                <p style="text-align: justify;">
                                    menjelajahi keindahan dan keanekaragaman lingkungan alam memberikan pengalaman
                                    petualangan yang menyenangkan, tetapi juga meningkatkan kesadaran akan pentingnya
                                    menjaga kelestarian alam.
                                </p>
                            </div><!-- Icon-Box -->

                            <div class="col-md-6 icon-box position-relative">
                                <i class="bi bi-cup-hot"></i>
                                <h4><a href="#" class="stretched-link">Cafe</a></h4>
                                <p style="text-align: justify;">
                                    Terletak di tengah rindangnya hutan pinus, kafe ini menawarkan suasana tenang dan
                                    sejuk yang menyatu dengan alam. Dikelilingi pepohonan tinggi dan semilir angin
                                    pegunungan, setiap cangkir kopi yang disajikan menjadi pengalaman relaksasi
                                    tersendiri.
                                </p>
                            </div><!-- Icon-Box -->

                            <div class="col-md-6 icon-box position-relative">
                                <i class="bi bi-water"></i>
                                <h4><a href="#" class="stretched-link">Kolam Renang</a></h4>
                                <p style="text-align: justify;">
                                    Kolam renang alami yang terletak di tengah hutan pinus ini menawarkan sensasi
                                    berenang yang unik dan menyegarkan. Dikelilingi oleh pepohonan hijau dan udara sejuk
                                    pegunungan, tempat ini menjadi pelarian sempurna dari hiruk-pikuk kota.
                                </p>
                            </div><!-- Icon-Box -->

                            <div class="col-md-6 icon-box position-relative">
                                <i class="bi bi-house-door"></i>
                                <h4><a href="#" class="stretched-link">Rumah Pohon</a></h4>
                                <p style="text-align: justify;">
                                    Bertengger di antara pepohonan pinus yang menjulang, rumah pohon ini menghadirkan
                                    pengalaman menginap yang unik dan menyatu dengan alam. Dengan pemandangan hijau dari
                                    ketinggian dan udara yang sejuk, setiap momen di sini terasa damai dan penuh
                                    ketenangan.
                                </p>
                            </div><!-- Icon-Box -->
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /About Section -->

        <!-- Team Section -->
        <section id="team" class="team section">
            <div class="container section-title" data-aos="fade-up">
                <h2>Team</h2>
                <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
            </div>

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper team-slider">
                    <div class="swiper-wrapper">
                        @forelse ($pengurus as $item)
                            <div class="swiper-slide">
                                <div class="team-member">
                                    <div class="member-img">
                                        <img src="{{ asset('/storage/' . $item->foto_profile) }}" class="img-fluid"
                                            alt="gambar pengurus">
                                    </div>
                                    <div class="member-info">
                                        <div class="social">
                                            <a href="{{ $item->email }}"><i class="bi bi-envelope"></i></a>
                                            <a href="{{ $item->instagram }}"><i class="bi bi-instagram"></i></a>
                                        </div>
                                        <h4>{{ $item->name }}</h4>
                                        <span>{{ $item->jabatan }}</span>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-center">Tidak ada data pengurus</p>
                        @endforelse
                    </div>

                    <!-- Navigasi Swiper -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
        <!-- /Team Section -->

        <!-- Stats Section -->
        <section id="stats" class="stats section light-background">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4">
                    <div class="col-lg-4 col-md-4">
                        <div class="stats-item">
                            <i class="bi bi-ticket-detailed-fill"></i>
                            <span data-purecounter-start="0" data-purecounter-end="10000"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p><strong>Harga Tiket Masuk</strong></p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-4 col-md-4">
                        <div class="stats-item">
                            <i class="bi bi-bicycle"></i>
                            <span data-purecounter-start="0" data-purecounter-end="2000"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p><strong>Harga Tiket Parkir Motor</strong></p>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-4 col-md-4">
                        <div class="stats-item">
                            <i class="bi bi-car-front"></i>
                            <span data-purecounter-start="0" data-purecounter-end="4000"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p><strong>Harga Tiket Parkir Mobil</strong></p>
                        </div>
                    </div><!-- End Stats Item -->
                </div>
            </div>
        </section><!-- /Stats Section -->

        <!-- Portfolio Section -->
        <section id="dokumentasi" class="portfolio section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Dokumentasi</h2>
                <p>Dokumentasi para Pengunjung Wisatawan</p>
            </div><!-- End Section Title -->

            <div class="container">
                <div class="isotope-layout" data-default-filter="*" data-layout="masonry"
                    data-sort="original-order">
                    <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                        @forelse ($dokumentasi as $item)
                            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                                <img src="{{ asset('/storage/' . $item->thumbnail) }}" class="img-fluid"
                                    alt="{{ $item->nama_pengunjung }}">
                                <div class="portfolio-info">
                                    <h4>{{ $item->nama_pengunjung }}</h4>
                                    <h5>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</h5>
                                    <a href="{{ asset('/storage/' . $item->thumbnail) }}"
                                        title="{{ $item->nama_pengunjung }}" data-gallery="portfolio-gallery-app"
                                        class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                    <a href="{{ route('welcome.show', $item->id) }}" title="More Details"
                                        class="details-link"><i class="bi bi-link-45deg"></i></a>
                                </div>
                            </div>
                        @empty
                            <p class="text-center">Belum ada Data Dokumentasi</p>
                        @endforelse
                        <!-- End Portfolio Item -->
                    </div><!-- End Portfolio Container -->
                </div>

                <div class="row" data-aos="fade-up">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <a href="{{ route('all') }}" class="mt-2 btn btn-primary text-center">Lihat
                            Semua Dokumentasi</a>
                    </div>
                </div>
            </div>
        </section><!-- /Portfolio Section -->

        <!-- wahana Section -->
        <section id="wahana" class="portfolio section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Wahana & Fasilitas</h2>
                <p>Beberapa Wahana dan Fasilitas yang ada di Curug Semirang</p>
            </div><!-- End Section Title -->

            <div class="container">
                <div class="isotope-layout" data-default-filter="*" data-layout="masonry"
                    data-sort="original-order">
                    <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                        @forelse ($wahana as $item)
                            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                                <img src="{{ asset('/storage/' . $item->gambar) }}" class="img-fluid"
                                    alt="{{ $item->nama_wahana }}">
                                <div class="portfolio-info">
                                    <h4>{{ $item->nama_wahana }}</h4>
                                    <a href="{{ asset('/storage/' . $item->gambar) }}"
                                        title="{{ $item->nama_wahana }}" data-gallery="portfolio-gallery-app"
                                        class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                    <a href="{{ route('wahana.show', $item->id) }}" title="More Details"
                                        class="details-link"><i class="bi bi-link-45deg"></i></a>
                                </div>
                            </div>
                        @empty
                            <p class="text-center">Belum ada Data Wahana & Fasilitas</p>
                        @endforelse
                        <!-- End Portfolio Item -->
                    </div><!-- End Portfolio Container -->
                </div>
                <div class="row" data-aos="fade-up">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <a href="{{ route('wahana') }}" class="mt-2 btn btn-primary text-center">Lihat
                            Semua Wahana</a>
                    </div>
                </div>
            </div>
        </section><!-- /wahana Section -->

        <!-- Testimonials Section -->
        <section id="testimonials" class="testimonials section light-background">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Testimonials</h2>
                <p>Quote, Saran, Masukan, Pendapat Pengunjung</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="swiper init-swiper">
                    <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 40
                },
                "1200": {
                  "slidesPerView": 3,
                  "spaceBetween": 1
                }
              }
            }
          </script>
                    <div class="swiper-wrapper">
                        @forelse ($testimoni as $item)
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        <span>{{ $item->testi }}</span>
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                    <img src="{{ asset('/storage/' . $item->profile) }}" class="testimonial-img"
                                        alt="">
                                    <h3>{{ $item->nama }}</h3>
                                    <h4>{{ $item->pekerjaan }}</h4>
                                </div>
                            </div><!-- End testimonial item -->
                        @empty
                            <h3>Belum ada Testimoni</h3>
                        @endforelse
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section><!-- /Testimonials Section -->

        {{-- Tiket Section --}}
        <section id="tiket" class="contact section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Beli Tiket Masuk</h2>
                <p>Pembelian Tiket Bisa Secara Online dan Offline</p>
                <h3> <span class="badge text-bg-primary">Gunakan Email
                        Asli untuk Pengiriman Tiket</span> </h3>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4">
                    <div class="col-lg-12">
                        <form action="{{ route('checkout') }}" method="POST">
                            @csrf
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <label for="name-field" class="pb-2">Nama Anda</label>
                                    <input type="text" name="name" id="name-field" class="form-control"
                                        required>
                                </div>

                                <div class="col-md-6">
                                    <label for="address" class="pb-2">Alamat Anda</label>
                                    <input type="text" class="form-control" name="address" id="address"
                                        required>
                                </div>

                                <div class="col-md-6">
                                    <label for="email-field" class="pb-2">Email Anda</label>
                                    <input type="email" class="form-control" name="email" id="email-field"
                                        required>
                                </div>

                                <div class="col-md-6">
                                    <label for="email-field" class="pb-2">No Telp Anda</label>
                                    <input type="number" class="form-control" name="no_telp" id="no_telp"
                                        required>
                                </div>

                                <div class="col-md-6">
                                    <label for="qty" class="pb-2">Pesan Berapa Tiket</label>
                                    <input type="number" class="form-control" name="qty" id="qty"
                                        required>
                                </div>
                                <button type="submit" class="btn btn-primary">Check Out</button>
                            </div>
                        </form>
                    </div><!-- End Contact Form -->
                </div>
            </div>
        </section>{{-- Tiket Section --}}

        <!-- Contact Section -->
        <section id="contact" class="contact section">
            <div class="container section-title" data-aos="fade-up">
                <h2>Kontak Kami</h2>
                <p>Berikut Kontak Kami</p>
            </div><!-- End Section Title -->
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-4">
                    <div class="col-lg-5">
                        <div class="info-wrap">
                            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                                <i class="bi bi-geo-alt flex-shrink-0"></i>
                                <div>
                                    <h3>Alamat</h3>
                                    <p>Loket wisata, Hutan, Kec. Ungaran Bar., Kabupaten Semarang, Jawa Tengah 50551</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                                <i class="bi bi-telephone flex-shrink-0"></i>
                                <div>
                                    <h3>Nomor Telepon</h3>
                                    <p>083108572270</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                                <i class="bi bi-envelope flex-shrink-0"></i>
                                <div>
                                    <h3>Email Kami</h3>
                                    <p>{{ $setting->email ?? 'test@example.com' }}</p>
                                </div>
                            </div><!-- End Info Item -->

                            <iframe class="mb-4 mb-lg-0"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.650919367644!2d110.37849307460276!3d-7.166291770315958!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70864c087fff87%3A0xd9f813952d57e558!2sAir%20Terjun%20Semirang!5e0!3m2!1sid!2sid!4v1739933137256!5m2!1sid!2sid"
                                frameborder="0" style="border:0; width: 100%; height: 384px;"
                                allowfullscreen></iframe>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <form action="{{ route('kirim') }}" method="POST">
                            @csrf
                            <div class="row gy-4">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                <div class="col-md-6">
                                    <label for="name-field" class="pb-2">Nama Anda</label>
                                    <input type="text" name="name" id="name-field" class="form-control"
                                        required>
                                </div>

                                <div class="col-md-6">
                                    <label for="email-field" class="pb-2">Email Anda</label>
                                    <input type="email" class="form-control" name="email" id="email-field"
                                        required>
                                </div>

                                <div class="col-md-12">
                                    <label for="subject-field" class="pb-2">Subject</label>
                                    <input type="text" class="form-control" name="subject" id="subject-field"
                                        required>
                                </div>

                                <div class="col-md-12">
                                    <label for="message-field" class="pb-2">Pesan</label>
                                    <textarea class="form-control" name="message" rows="10" id="message-field" required></textarea>
                                </div>

                                <div class="col-md-12 text-center">
                                    <div class="loading" style="display: none;">Loading...</div>
                                    <div class="error-message" style="display: none; color: red;"></div>
                                    <div class="sent-message" style="display: none; color: green;">Your message has
                                        been sent. Thank you!</div>

                                    <button type="submit">Kirim Pesan</button>
                                </div>
                            </div>
                        </form>
                    </div><!-- End Contact Form -->
                </div>
            </div>
        </section><!-- /Contact Section -->
    </main>

    <footer id="footer" class="footer dark-background">
        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-12 align-item-center col-md-6 footer-about">
                    <a class="logo d-flex align-items-center">
                        <span class="sitename">{{ $setting->judul_halaman ?? 'ini judul' }}</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p>{{ $setting->desc_web ?? 'ini desc' }}</p>
                        <p>{{ $setting->alamat ?? 'ini alamat' }}</p>
                        <p class="mt-3"><strong>Phone:</strong>
                            <span>{{ $setting->phone ?? 'ini nomer telp' }}</span>
                        </p>
                        <p><strong>Email:</strong> <span>{{ $setting->email ?? 'ini email' }}</span></p>
                    </div>
                    <div class="social-links d-flex mt-4">
                        <a href="{{ $setting->twitter ?? '#' }}"><i class="bi bi-twitter-x"></i></a>
                        <a href="{{ $setting->facebook ?? '#' }}"><i class="bi bi-facebook"></i></a>
                        <a href="{{ $setting->instagram ?? '#' }}"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('landing/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('landing/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('landing/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('landing/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('landing/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('landing/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('landing/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('landing/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            new Swiper(".team-slider", {
                loop: true,
                spaceBetween: 20,
                slidesPerView: 1,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                breakpoints: {
                    768: {
                        slidesPerView: 2
                    },
                    1024: {
                        slidesPerView: 3
                    },
                }
            });
        });
    </script>

    <!-- Main JS File -->
    <script src="{{ asset('landing/assets/js/main.js') }}"></script>

</body>

</html>
