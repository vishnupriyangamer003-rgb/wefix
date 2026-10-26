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
<section class="feature-one">
    <div class="container">
        <div class="feature-one__inner">
            <div class="feature-one__dot">
                <img src="{{ asset('assets/images/shapes/feature-one-dot.png') }}" alt="">
            </div>
            <div class="row">
                <!--Feature One Single Start-->
                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                    <div class="feature-one__single">
                        <div class="feature-one__top">
                            <div class="feature-one__icon">
                                <span class="icon-roof-5"></span>
                            </div>
                            <div class="feature-one__title-box">
                                <h3 class="feature-one__title"><a href="{{ url('/#about') }}">Quality <br> materials</a></h3>
                            </div>
                        </div>
                        <div class="feature-one__single-inner">
                            <p class="feature-one__text">Nullam neque augue, maximus id nulla id, dignissim tristique nunc.</p>
                            <div class="feature-one__read-more">
                                <a href="{{ url('/#about') }}">Read More <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Feature One Single End-->
                <!--Feature One Single Start-->
                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="200ms">
                    <div class="feature-one__single">
                        <div class="feature-one__top">
                            <div class="feature-one__icon">
                                <span class="icon-construction-worker"></span>
                            </div>
                            <div class="feature-one__title-box">
                                <h3 class="feature-one__title"><a href="{{ url('/#team') }}">Professional <br> workers</a></h3>
                            </div>
                        </div>
                        <div class="feature-one__single-inner">
                            <p class="feature-one__text">Nullam neque augue, maximus id nulla id, dignissim tristique nunc.</p>
                            <div class="feature-one__read-more">
                                <a href="{{ url('/#team') }}">Read More <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Feature One Single End-->
                <!--Feature One Single Start-->
                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="300ms">
                    <div class="feature-one__single">
                        <div class="feature-one__top">
                            <div class="feature-one__icon">
                                <span class="icon-online-registration"></span>
                            </div>
                            <div class="feature-one__title-box">
                                <h3 class="feature-one__title"><a href="{{ url('/#contact') }}">Free <br> estimates</a></h3>
                            </div>
                        </div>
                        <div class="feature-one__single-inner">
                            <p class="feature-one__text">Nullam neque augue, maximus id nulla id, dignissim tristique nunc.</p>
                            <div class="feature-one__read-more">
                                <a href="{{ url('/#contact') }}">Read More <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Feature One Single End-->
            </div>
        </div>
    </div>
</section>
<!--Feature One End-->

<!--About One Start-->
<section class="about-one" id="about">
    <div class="about-one__shape float-bob-x">
        <img src="{{ asset('assets/images/shapes/about-one-shape.png') }}" alt="">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="about-one__left">
                    <div class="about-one__img-box wow slideInLeft animated" data-wow-delay="100ms" data-wow-duration="2500ms">
                        <div class="about-one__img">
                            <img src="{{ asset('assets/images/resources/about-one-img-1.jpg') }}" alt="">
                        </div>
                        <div class="about-one__line">
                            <img src="{{ asset('assets/images/shapes/about-one-line.png') }}" alt="">
                        </div>
                        <div class="about-one__satisfied">
                            <div class="about-one__satisfied-inner">
                                <div class="about-one__satisfied-shape">
                                    <img src="{{ asset('assets/images/shapes/about-one-satisfied-shape-1.png') }}" alt="">
                                </div>
                                <div class="about-one__satisfied-content">
                                    <div class="about-one__satisfied-count-box">
                                        <h3 class="odometer" data-count="98">00</h3>
                                        <span class="about-one__satisfied-percent">%</span>
                                    </div>
                                    <p class="about-one__satisfied-text">Satisfied customers</p>
                                </div>
                            </div>
                        </div>
                        <div class="about-one__big-text">roofing</div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="about-one__right">
                    <div class="section-title text-left">
                        <div class="section-sub-title-box">
                            <p class="section-sub-title">About WEFIX</p>
                            <div class="section-title-shape-1">
                                <img src="{{ asset('assets/images/shapes/section-title-shape-1.png') }}" alt="">
                            </div>
                        </div>
                        <h2 class="section-title__title">Experienced &amp; quality roofing services providers</h2>
                    </div>
                    <p class="about-one__text">Nulla commodo dolor massa, vel pellentesque nulla congue quis. Fusce ut convallis diam. Nam id tortor et nunc tempor faucibus. Sed eu leo egestas, imperdiet felis sed, vestibulum ligula.</p>
                    <ul class="list-unstyled about-one__points">
                        <li>
                            <div class="icon-box">
                                <div class="icon">
                                    <span class="icon-confirmation"></span>
                                </div>
                                <div class="text-box">
                                    <p>Innovative work</p>
                                </div>
                            </div>
                            <div class="text-box-two">
                                <p>Lorem ipsum dolor sit ame sedme consectetur nod.</p>
                            </div>
                        </li>
                        <li>
                            <div class="icon-box">
                                <div class="icon">
                                    <span class="icon-confirmation"></span>
                                </div>
                                <div class="text-box">
                                    <p>Certified company</p>
                                </div>
                            </div>
                            <div class="text-box-two">
                                <p>Lorem ipsum dolor sit ame sedme consectetur nod.</p>
                            </div>
                        </li>
                    </ul>
                    <a href="{{ url('/#about') }}" class="thm-btn about-one__btn"> <i class="fa fa-arrow-right"></i> Discover more</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--About One End-->

<!--Services Three Start-->
<section class="services-three" id="services">
    <div class="container">
        <div class="section-title text-center">
            <div class="section-sub-title-box">
                <p class="section-sub-title">Our services</p>
                <div class="section-title-shape-1">
                    <img src="{{ asset('assets/images/shapes/section-title-shape-1.png') }}" alt="">
                </div>
            </div>
            <h2 class="section-title__title">We’re providing quality <br> roofing services</h2>
        </div>
        <div class="row">
            <!--Services Three Single Start-->
            <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                <div class="services-three__single">
                    <div class="services-three__img-box">
                        <div class="services-three__border"></div>
                        <div class="services-three__icon">
                            <span class="icon-roof"></span>
                        </div>
                        <div class="services-three__img">
                            <img src="{{ asset('assets/images/services/services-3-1.jpg') }}" alt="Single play roofing">
                        </div>
                    </div>
                    <div class="services-three__content">
                        <p class="services-three__sub-title">Service v1</p>
                        <h3 class="services-three__title"><a href="{{ url('/#services') }}">Single play roofing</a></h3>
                    </div>
                </div>
            </div>
            <!--Services Three Single End-->
            <!--Services Three Single Start-->
            <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="200ms">
                <div class="services-three__single">
                    <div class="services-three__img-box">
                        <div class="services-three__border"></div>
                        <div class="services-three__icon">
                            <span class="icon-joist"></span>
                        </div>
                        <div class="services-three__img">
                            <img src="{{ asset('assets/images/services/services-3-2.jpg') }}" alt="Modified roofing">
                        </div>
                    </div>
                    <div class="services-three__content">
                        <p class="services-three__sub-title">Service v2</p>
                        <h3 class="services-three__title"><a href="{{ url('/#services') }}">Modified roofing</a></h3>
                    </div>
                </div>
            </div>
            <!--Services Three Single End-->
            <!--Services Three Single Start-->
            <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="300ms">
                <div class="services-three__single">
                    <div class="services-three__img-box">
                        <div class="services-three__border"></div>
                        <div class="services-three__icon">
                            <span class="icon-roof-1"></span>
                        </div>
                        <div class="services-three__img">
                            <img src="{{ asset('assets/images/services/services-3-3.jpg') }}" alt="Built-up roofing">
                        </div>
                    </div>
                    <div class="services-three__content">
                        <p class="services-three__sub-title">Service v3</p>
                        <h3 class="services-three__title"><a href="{{ url('/#services') }}">Built-up roofing</a></h3>
                    </div>
                </div>
            </div>
            <!--Services Three Single End-->
        </div>
    </div>
</section>
<!--Services Three End-->
@endsection

