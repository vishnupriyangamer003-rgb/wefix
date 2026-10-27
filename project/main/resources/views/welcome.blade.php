@extends('layouts.app')

@section('title', 'WEFIX - Fabrication, Structural works & Industrial Roofing in Karur')

@push('styles')
<style>
    /* Reduce excessive vertical space and padding between sections */
    .about-one {
        padding-bottom: 35px !important;
    }
    .services-three {
        padding-top: 40px !important;
    }
    /* Tighten gap between Why Choose Us and Latest Projects */
    .why-choose-two {
        padding-bottom: 45px !important;
    }
    .project-three {
        padding-top: 45px !important;
    }
</style>
@endpush

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
                                    <a href="{{ url('/services') }}" class="thm-btn main-slider-two__btn"> <i class="fa fa-arrow-right"></i> Explore Services</a>
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
                                <h3 class="feature-one__title"><a href="{{ url('/services') }}">Certified <br> steel</a></h3>
                            </div>
                        </div>
                        <div class="feature-one__single-inner">
                            <p class="feature-one__text">IS 2062 structural steel, branded sheets and tested consumables on every job we take up.</p>
                            <div class="feature-one__read-more">
                                <a href="{{ url('/services') }}">Read More <i class="fa fa-arrow-right"></i></a>
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
                                <h3 class="feature-one__title"><a href="{{ url('/#about') }}">Skilled <br> fabricators</a></h3>
                            </div>
                        </div>
                        <div class="feature-one__single-inner">
                            <p class="feature-one__text">Welders, fitters and erectors who build to shop drawings with clean, inspected finishing.</p>
                            <div class="feature-one__read-more">
                                <a href="{{ url('/#about') }}">Read More <i class="fa fa-arrow-right"></i></a>
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
                                <h3 class="feature-one__title"><a href="{{ url('/#contact') }}">Free site <br> estimates</a></h3>
                            </div>
                        </div>
                        <div class="feature-one__single-inner">
                            <p class="feature-one__text">Send your drawing or site dimensions and get a measured quotation within 48 hours.</p>
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
                        <div class="about-one__big-text">WEFIX</div>
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
                        <h2 class="section-title__title">Fabrication &amp; structural works built to last</h2>
                    </div>
                    <p class="about-one__text">WEFIX designs, fabricates and erects structural steel for factories, warehouses, commercial buildings and homes across Karur and Tamil Nadu. From industrial sheds and mezzanine floors to staircases, gates and railings, every job is measured, drawn and built by our own team — delivered on schedule with clean finishing and safe erection practices.</p>
                    <ul class="list-unstyled about-one__points">
                        <li>
                            <div class="icon-box">
                                <div class="icon">
                                    <span class="icon-confirmation"></span>
                                </div>
                                <div class="text-box">
                                    <p>In-house fabrication</p>
                                </div>
                            </div>
                            <div class="text-box-two">
                                <p>Cutting, welding, drilling and painting happen in our own yard, so quality and timelines stay in our hands.</p>
                            </div>
                        </li>
                        <li>
                            <div class="icon-box">
                                <div class="icon">
                                    <span class="icon-confirmation"></span>
                                </div>
                                <div class="text-box">
                                    <p>Safe site erection</p>
                                </div>
                            </div>
                            <div class="text-box-two">
                                <p>Trained crews, PPE, proper scaffolding and insured site practices on every structure we raise.</p>
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
            <h2 class="section-title__title">We build steel structures <br> and roofing that last</h2>
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
                            <img src="{{ asset('assets/images/services/services-3-1.jpg') }}" alt="Structural steel fabrication">
                        </div>
                    </div>
                    <div class="services-three__content">
                        <p class="services-three__sub-title">Fabrication</p>
                        <h3 class="services-three__title"><a href="{{ url('/services#structural-steel') }}">Structural steel fabrication</a></h3>
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
                            <img src="{{ asset('assets/images/services/services-3-2.jpg') }}" alt="Industrial shed erection">
                        </div>
                    </div>
                    <div class="services-three__content">
                        <p class="services-three__sub-title">Erection</p>
                        <h3 class="services-three__title"><a href="{{ url('/services#shed-erection') }}">Industrial shed erection</a></h3>
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
                            <img src="{{ asset('assets/images/services/services-3-3.jpg') }}" alt="Metal roofing and cladding">
                        </div>
                    </div>
                    <div class="services-three__content">
                        <p class="services-three__sub-title">Roofing</p>
                        <h3 class="services-three__title"><a href="{{ url('/services#metal-roofing') }}">Metal roofing &amp; cladding</a></h3>
                    </div>
                </div>
            </div>
            <!--Services Three Single End-->
        </div>
    </div>
</section>
<!--Services Three End-->

<!--Why Choose Two Start-->
<section class="why-choose-two" id="why-choose">
    <div class="why-choose-two-bg" style="background-image: url({{ asset('assets/images/backgrounds/why-choose-two-bg.jpg') }});"></div>
    <div class="container">
        <div class="section-title text-center">
            <div class="section-sub-title-box">
                <p class="section-sub-title">why choose us</p>
                <div class="section-title-shape-1">
                    <img src="{{ asset('assets/images/shapes/section-title-shape-1.png') }}" alt="">
                </div>
            </div>
            <h2 class="section-title__title">Few reasons to choose <br> our company</h2>
        </div>
        <div class="row">
            <div class="col-xl-4">
                <div class="why-choose-two__left">
                    <ul class="list-unstyled why-choose-two__list-one">
                        <li class="wow fadeInUp" data-wow-delay="100ms">
                            <div class="icon">
                                <span class="icon-roof-2"></span>
                            </div>
                            <div class="content">
                                <h4>Certified materials</h4>
                                <p>IS 2062 steel, branded sheets and tested consumables — grade verified before it enters our yard.</p>
                                <div class="why-choose-two__read-more">
                                    <a href="{{ url('/#about') }}">Read More <i class="fa fa-arrow-right"></i> </a>
                                </div>
                            </div>
                        </li>
                        <li class="wow fadeInUp" data-wow-delay="200ms">
                            <div class="icon">
                                <span class="icon-mission"></span>
                            </div>
                            <div class="content">
                                <h4>Transparent pricing</h4>
                                <p>Item-wise quotations showing steel weight, sheet gauge and labour cost before work begins.</p>
                                <div class="why-choose-two__read-more">
                                    <a href="{{ url('/#about') }}">Read More <i class="fa fa-arrow-right"></i> </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="why-choose-two__middle wow zoomIn" data-wow-delay="100ms">
                    <div class="why-choose-two__img-box">
                        <div class="why-choose-two__img-one">
                            <img src="{{ asset('assets/images/resources/why-choose-two-img-1.jpg') }}" alt="Why choose WEFIX">
                            <div class="why-choose-two__img-two">
                                <img src="{{ asset('assets/images/resources/why-choose-two-img-2.png') }}" alt="Why choose WEFIX">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="why-choose-two__right">
                    <ul class="list-unstyled why-choose-two__list-two clearfix">
                        <li class="clearfix wow fadeInUp" data-wow-delay="100ms">
                            <div class="content">
                                <h4>Safety first</h4>
                                <p>Trained crews, PPE, certified scaffolding and insured site practices on every project.</p>
                                <div class="why-choose-two__read-more">
                                    <a href="{{ url('/#about') }}">Read More <i class="fa fa-arrow-right"></i> </a>
                                </div>
                            </div>
                            <div class="icon">
                                <span class="icon-shield"></span>
                            </div>
                        </li>
                        <li class="clearfix wow fadeInUp" data-wow-delay="200ms">
                            <div class="content">
                                <h4>Experienced engineers</h4>
                                <p>Every drawing is checked for span, wind load and load capacity before fabrication starts.</p>
                                <div class="why-choose-two__read-more">
                                    <a href="{{ url('/#about') }}">Read More <i class="fa fa-arrow-right"></i> </a>
                                </div>
                            </div>
                            <div class="icon">
                                <span class="icon-construction-worker"></span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Why Choose Two End-->

<!--Project Three Start-->
<section class="project-three" id="projects">
    <div class="container">
        <div class="section-title text-center">
            <div class="section-sub-title-box">
                <p class="section-sub-title">Latest Projects</p>
                <div class="section-title-shape-1">
                    <img src="{{ asset('assets/images/shapes/section-title-shape-1.png') }}" alt="">
                </div>
            </div>
            <h2 class="section-title__title">Recent work from our yard <br> and project sites</h2>
        </div>
        <div class="project-three__carousel owl-carousel owl-theme thm-owl__carousel" data-owl-options='{
            "loop": true,
            "autoplay": true,
            "margin": 30,
            "nav": false,
            "dots": true,
            "smartSpeed": 500,
            "autoplayTimeout": 10000,
            "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
            "responsive": {
                "0": {
                    "items": 1
                },
                "768": {
                    "items": 2
                },
                "992": {
                    "items": 2
                },
                "1200": {
                    "items": 2
                }
            }
        }'>
            <!--Project Three Single Start-->
            <div class="item">
                <div class="project-three__single">
                    <div class="project-three__img">
                        <img src="{{ asset('assets/images/project/project-3-1.jpg') }}" alt="Industrial shed, Karur">
                        <div class="project-three__content">
                            <div class="project-three__content-left">
                                <h3 class="project-three__title"><a href="{{ url('/#projects') }}">Industrial shed — Karur</a></h3>
                                <p class="project-three__sub-title">Shed erection</p>
                            </div>
                            <div class="project-three__arrow">
                                <a class="img-popup" href="{{ asset('assets/images/project/project-3-1.jpg') }}"><span class="icon-right-arrow"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Project Three Single End-->
            <!--Project Three Single Start-->
            <div class="item">
                <div class="project-three__single">
                    <div class="project-three__img">
                        <img src="{{ asset('assets/images/project/project-3-2.jpg') }}" alt="Warehouse steel frame, Manmangalam">
                        <div class="project-three__content">
                            <div class="project-three__content-left">
                                <h3 class="project-three__title"><a href="{{ url('/#projects') }}">Warehouse steel frame — Manmangalam</a></h3>
                                <p class="project-three__sub-title">Structural steel</p>
                            </div>
                            <div class="project-three__arrow">
                                <a class="img-popup" href="{{ asset('assets/images/project/project-3-2.jpg') }}"><span class="icon-right-arrow"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Project Three Single End-->
            <!--Project Three Single Start-->
            <div class="item">
                <div class="project-three__single">
                    <div class="project-three__img">
                        <img src="{{ asset('assets/images/project/project-3-3.jpg') }}" alt="Metal roof replacement, Karur">
                        <div class="project-three__content">
                            <div class="project-three__content-left">
                                <h3 class="project-three__title"><a href="{{ url('/#projects') }}">Metal roof replacement — Karur</a></h3>
                                <p class="project-three__sub-title">Roofing</p>
                            </div>
                            <div class="project-three__arrow">
                                <a class="img-popup" href="{{ asset('assets/images/project/project-3-3.jpg') }}"><span class="icon-right-arrow"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Project Three Single End-->
            <!--Project Three Single Start-->
            <div class="item">
                <div class="project-three__single">
                    <div class="project-three__img">
                        <img src="{{ asset('assets/images/project/project-3-4.jpg') }}" alt="Mezzanine floor structure, Karur">
                        <div class="project-three__content">
                            <div class="project-three__content-left">
                                <h3 class="project-three__title"><a href="{{ url('/#projects') }}">Mezzanine floor — Karur</a></h3>
                                <p class="project-three__sub-title">Fabrication</p>
                            </div>
                            <div class="project-three__arrow">
                                <a class="img-popup" href="{{ asset('assets/images/project/project-3-4.jpg') }}"><span class="icon-right-arrow"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Project Three Single End-->
        </div>
    </div>
</section>
<!--Project Three End-->
@endsection

