@extends('layouts.app')

@section('title', 'WEFIX - Fabrication, Structural works & Industrial Roofing in Karur')

@section('content')
<!--Main Slider Start-->
<section class="main-slider-two clearfix">
    <div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true,
        "effect": "fade",
        "pagination": {
            "el": "#main-slider-pagination",
            "type": "bullets",
            "clickable": true
        },
        "navigation": {
            "nextEl": "#main-slider__swiper-button-next",
            "prevEl": "#main-slider__swiper-button-prev"
        },
        "autoplay": {
            "delay": 5000
        }}'>
        <div class="swiper-wrapper">

            <div class="swiper-slide">
                <div class="image-layer-two" style="background-image: url({{ asset('assets/images/backgrounds/main-slider-2-1.jpg') }});"></div>
                <!-- /.image-layer -->

                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-slider-two__content">
                                <div class="main-slider-two__icon">
                                    <img src="{{ asset('assets/images/icon/main-slider-arrow.png') }}" alt="Arrow">
                                </div>
                                <h2 class="main-slider-two__title">Quality Fabrication & <br> Industrial Roofing</h2>
                                <div class="main-slider-two__btn-box">
                                    <a href="{{ url('/#about') }}" class="thm-btn main-slider-two__btn"> <i class="fa fa-arrow-right"></i> Discover more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="image-layer-two" style="background-image: url({{ asset('assets/images/backgrounds/main-slider-2-2.jpg') }});"></div>
                <!-- /.image-layer -->

                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-slider-two__content">
                                <div class="main-slider-two__icon">
                                    <img src="{{ asset('assets/images/icon/main-slider-arrow.png') }}" alt="Arrow">
                                </div>
                                <h2 class="main-slider-two__title">Heavy Structural Steel <br> & Factory Sheds</h2>
                                <div class="main-slider-two__btn-box">
                                    <a href="{{ url('/#contact') }}" class="thm-btn main-slider-two__btn"> <i class="fa fa-arrow-right"></i> Free Estimate</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="image-layer-two" style="background-image: url({{ asset('assets/images/backgrounds/main-slider-2-3.jpg') }});"></div>
                <!-- /.image-layer -->

                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-slider-two__content">
                                <div class="main-slider-two__icon">
                                    <img src="{{ asset('assets/images/icon/main-slider-arrow.png') }}" alt="Arrow">
                                </div>
                                <h2 class="main-slider-two__title">Expert Metal Roofing <br> & Engineering Works</h2>
                                <div class="main-slider-two__btn-box">
                                    <a href="{{ url('/#services') }}" class="thm-btn main-slider-two__btn"> <i class="fa fa-arrow-right"></i> Explore Services</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- If we need navigation buttons -->
        <div class="main-slider-two__nav">
            <div class="swiper-button-prev" id="main-slider__swiper-button-next">
                <i class="icon-left-arrow"></i>
            </div>
            <div class="swiper-button-next" id="main-slider__swiper-button-prev">
                <i class="icon-right-arrow"></i>
            </div>
        </div>

    </div>
</section>
<!--Main Slider End-->

<!--Feature One Start-->
<section class="feature-one py-5" style="background: #f8fafd;">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                <div class="feature-one__single" style="background: #fff; border-radius: 12px; padding: 35px 25px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); margin-bottom: 30px;">
                    <div class="feature-one__icon mb-3" style="color: #f26422; font-size: 2.2rem;">
                        <i class="fas fa-warehouse"></i>
                    </div>
                    <h3 style="font-size: 1.35rem; font-weight: 700; margin-bottom: 12px;">Industrial Sheds</h3>
                    <p style="color: #718096; margin: 0; line-height: 1.6;">
                        Complete design, fabrication, and on-site erection of heavy-duty industrial warehouses, factory sheds, and workshops.
                    </p>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="200ms">
                <div class="feature-one__single" style="background: #fff; border-radius: 12px; padding: 35px 25px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); margin-bottom: 30px;">
                    <div class="feature-one__icon mb-3" style="color: #f26422; font-size: 2.2rem;">
                        <i class="fas fa-hammer"></i>
                    </div>
                    <h3 style="font-size: 1.35rem; font-weight: 700; margin-bottom: 12px;">Structural Steel</h3>
                    <p style="color: #718096; margin: 0; line-height: 1.6;">
                        High-strength steel framing, trusses, purlins, pillars, and engineered metal framing built for longevity.
                    </p>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="300ms">
                <div class="feature-one__single" style="background: #fff; border-radius: 12px; padding: 35px 25px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); margin-bottom: 30px;">
                    <div class="feature-one__icon mb-3" style="color: #f26422; font-size: 2.2rem;">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 style="font-size: 1.35rem; font-weight: 700; margin-bottom: 12px;">Roofing Solutions</h3>
                    <p style="color: #718096; margin: 0; line-height: 1.6;">
                        Commercial profile sheets, polycarbonate sheets, heat-resistant coatings, and leak-proof installation services.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Feature One End-->

<!--About Section Start-->
<section id="about" class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="section-title text-left mb-4">
                    <span class="section-title__tagline" style="color: #f26422; font-weight: 700; text-transform: uppercase;">About WEFIX</span>
                    <h2 class="section-title__title" style="font-size: 2.3rem; font-weight: 800; color: #161c2d; line-height: 1.25;">
                        Excellence In Fabrication & Engineering Works
                    </h2>
                </div>
                <p style="color: #4a5568; line-height: 1.8; margin-bottom: 20px;">
                    Located in Karur, WEFIX has established a solid reputation for superior craftmanship, structural reliability, and timely project delivery. We work closely with commercial clients, industrial facilities, and residential projects to provide durable metal and steel structures.
                </p>
                <ul class="list-unstyled mb-4" style="color: #2d3748;">
                    <li class="mb-2"><i class="fa fa-check-circle me-2" style="color: #f26422;"></i> Certified raw materials and precise welding techniques</li>
                    <li class="mb-2"><i class="fa fa-check-circle me-2" style="color: #f26422;"></i> Experienced engineers and on-site fabrication crew</li>
                    <li class="mb-2"><i class="fa fa-check-circle me-2" style="color: #f26422;"></i> Customized designs according to client requirements</li>
                </ul>
                <div class="d-flex align-items-center gap-3">
                    <a href="tel:9843722055" class="thm-btn" style="background: #161c2d; color: #fff; padding: 12px 28px; border-radius: 6px; font-weight: 600; text-decoration: none;">
                        Contact Us Today
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div style="background: #161c2d; border-radius: 16px; padding: 40px; color: #fff;">
                    <h3 style="color: #fff; font-weight: 700; margin-bottom: 25px;">Company Information</h3>
                    <div class="mb-3 d-flex align-items-start">
                        <i class="fa fa-building mt-1 me-3" style="color: #f26422; font-size: 1.2rem;"></i>
                        <div>
                            <strong>Company Name:</strong>
                            <div style="color: #cbd5e0;">WEFIX</div>
                        </div>
                    </div>
                    <div class="mb-3 d-flex align-items-start">
                        <i class="fa fa-tools mt-1 me-3" style="color: #f26422; font-size: 1.2rem;"></i>
                        <div>
                            <strong>Core Specialization:</strong>
                            <div style="color: #cbd5e0;">Fabrication, Structural works</div>
                        </div>
                    </div>
                    <div class="mb-3 d-flex align-items-start">
                        <i class="fa fa-phone mt-1 me-3" style="color: #f26422; font-size: 1.2rem;"></i>
                        <div>
                            <strong>Mobile Contact:</strong>
                            <div><a href="tel:9843722055" style="color: #f26422; font-weight: 700; text-decoration: none;">9843722055</a></div>
                        </div>
                    </div>
                    <div class="d-flex align-items-start">
                        <i class="fa fa-map-marker-alt mt-1 me-3" style="color: #f26422; font-size: 1.2rem;"></i>
                        <div>
                            <strong>Workshop & Office:</strong>
                            <div style="color: #cbd5e0;">8/2,3-B1, Padma Nagar, Aruvankattanur, Manmangalam, Karur - 639006</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--About Section End-->
@endsection
