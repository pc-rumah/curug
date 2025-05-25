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
                        <img src="{{ asset('/storage/' . $item->profile) }}" class="testimonial-img" alt="">
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

<div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row gy-5">
        @forelse ($pengurus as $item)
            <div class="col-xl-4 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="200">
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
            </div><!-- End Team Member -->
        @empty
        @endforelse
    </div>
</div>
