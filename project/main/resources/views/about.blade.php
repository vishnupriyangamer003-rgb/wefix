@extends('layouts.app')

@section('title', 'About Us - WEFIX Fabrication & Structural Works in Karur')

@section('content')
<!--Page Header Start-->
<section class="page-header">
    <div class="page-header-bg" style="background-image: url({{ asset('assets/images/backgrounds/page-header-bg.jpg') }});"></div>
    <div class="container">
        <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><span>/</span></li>
                <li>About Us</li>
            </ul>
            <h2>About WEFIX</h2>
        </div>
    </div>
</section>
<!--Page Header End-->

<!--About Four Start-->
<section class="about-three about-four">
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="about-three__left">
                    <div class="about-three__img-box wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms">
                        <div class="about-three__img">
                            <img src="{{ asset('assets/images/resources/about-three-img-1.jpg') }}" alt="WEFIX Fabrication Works">
                        </div>
                        <div class="about-three__img-two">
                            <img src="{{ asset('assets/images/resources/about-three-img-2.jpg') }}" alt="Structural Steel Engineering">
                        </div>
                        <div class="about-three__border"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="about-three__right">
                    <div class="section-title text-left">
                        <div class="section-sub-title-box">
                            <p class="section-sub-title">Who We Are</p>
                            <div class="section-title-shape-1">
                                <img src="{{ asset('assets/images/shapes/section-title-shape-1.png') }}" alt="">
                            </div>
                        </div>
                        <h2 class="section-title__title">Engineering Durable Fabrication &amp; Structural Solutions</h2>
                    </div>
                    <p class="about-three__text">
                        WEFIX is Karur’s premier fabrication and structural engineering contractor. Specializing in heavy industrial sheds, commercial roofing, pre-engineered steel buildings, and precision custom fabrication, we blend master craftsmanship with industrial safety standards to build infrastructure that stands the test of time.
                    </p>
                    <ul class="list-unstyled about-three__point">
                        <li>
                            <div class="icon">
                                <i class="fa fa-check"></i>
                            </div>
                            <div class="text">
                                <p>Certified High-Tensile Structural Steel &amp; Quality Materials</p>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <i class="fa fa-check"></i>
                            </div>
                            <div class="text">
                                <p>End-to-End Factory Shed Erection &amp; Commercial Roofing</p>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <i class="fa fa-check"></i>
                            </div>
                            <div class="text">
                                <p>Accurate On-Site Blueprinting, Zero Cost Surprises &amp; Prompt Handover</p>
                            </div>
                        </li>
                    </ul>
                    <a href="{{ url('/#contact') }}" class="thm-btn about-three__btn"> <i class="fa fa-arrow-right"></i> Get Free Quote</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--About Four End-->

<!--Why Choose Feature Highlights Start-->
<section class="feature-one" style="padding-top: 20px; padding-bottom: 70px;">
    <div class="container">
        <div class="feature-one__inner">
            <div class="row">
                <!--Feature 1-->
                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                    <div class="feature-one__single">
                        <div class="feature-one__top">
                            <div class="feature-one__icon">
                                <span class="icon-roof-5"></span>
                            </div>
                            <div class="feature-one__title-box">
                                <h3 class="feature-one__title"><a href="#">IS-Standard <br> Materials</a></h3>
                            </div>
                        </div>
                        <div class="feature-one__single-inner">
                            <p class="feature-one__text">We strictly procure tested TMT bars, heavy I-beams, purlins, and premium coated roofing sheets from reputed mills.</p>
                        </div>
                    </div>
                </div>
                <!--Feature 2-->
                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="200ms">
                    <div class="feature-one__single">
                        <div class="feature-one__top">
                            <div class="feature-one__icon">
                                <span class="icon-construction-worker"></span>
                            </div>
                            <div class="feature-one__title-box">
                                <h3 class="feature-one__title"><a href="#">Master <br> Fabricators</a></h3>
                            </div>
                        </div>
                        <div class="feature-one__single-inner">
                            <p class="feature-one__text">Our team of experienced structural welders, riggers, and site supervisors guarantee flawless alignment and joint durability.</p>
                        </div>
                    </div>
                </div>
                <!--Feature 3-->
                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="300ms">
                    <div class="feature-one__single">
                        <div class="feature-one__top">
                            <div class="feature-one__icon">
                                <span class="icon-online-registration"></span>
                            </div>
                            <div class="feature-one__title-box">
                                <h3 class="feature-one__title"><a href="#">Direct Site <br> Estimates</a></h3>
                            </div>
                        </div>
                        <div class="feature-one__single-inner">
                            <p class="feature-one__text">Fast on-site inspection across Karur and neighboring regions with comprehensive bill of materials and transparent quotes.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Why Choose Feature Highlights End-->

<!--Trust Company Start-->
<section class="trust-company">
    <div class="trust-company-shape-1">
        <img src="{{ asset('assets/images/shapes/traust-company-shape-1.png') }}" alt="">
    </div>
    <div class="trust-company-shape-2"></div>
    <div class="trust-company-shape-3"></div>
    <div class="trust-company-shape-4"></div>
    <div class="trust-company-bg jarallax" data-jarallax="" data-speed="0.2" data-imgposition="50% 0%" style="background-image: url({{ asset('assets/images/backgrounds/trust-company-bg.jpg') }});"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-7">
                <div class="trust-company__left">
                    <div class="trust-company__video-link">
                        <a href="tel:9843722055">
                            <div class="trust-company__video-icon">
                                <span class="fa fa-phone-alt"></span>
                                <i class="ripple"></i>
                            </div>
                        </a>
                    </div>
                    <h2 class="trust-company__title">Hundreds of commercial &amp; industrial clients trust WEFIX</h2>
                </div>
            </div>
            <div class="col-xl-6 col-lg-5">
                <div class="trust-company__right">
                    <ul class="list-unstyled trust-compay__points">
                        <li>
                            <div class="icon">
                                <span class="icon-tick"></span>
                            </div>
                            <div class="text">
                                <p>Certified Structural Engineers &amp; Experienced Riggers</p>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <span class="icon-tick"></span>
                            </div>
                            <div class="text">
                                <p>Uncompromised Safety Compliance &amp; Structural Stability</p>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <span class="icon-tick"></span>
                            </div>
                            <div class="text">
                                <p>Accurate Bill of Quantities &amp; Zero Hidden Fees</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Trust Company End-->

<!--Team Section Start-->
<section class="team-one team-two" style="padding-top: 90px; padding-bottom: 90px;">
    <div class="container">
        <div class="section-title text-center">
            <div class="section-sub-title-box">
                <p class="section-sub-title">Expert Leadership</p>
                <div class="section-title-shape-1">
                    <img src="{{ asset('assets/images/shapes/section-title-shape-1.png') }}" alt="">
                </div>
            </div>
            <h2 class="section-title__title">Meet our dedicated engineering &amp; <br> fabrication specialists</h2>
        </div>
        <div class="row">
            <!--Team Member 1-->
            <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                <div class="team-one__single">
                    <div class="team-one__img-box">
                        <div class="team-one__img">
                            <img src="{{ asset('assets/images/team/team-1-1.jpg') }}" alt="Chief Structural Engineer">
                        </div>
                    </div>
                    <div class="team-one__content-box">
                        <div class="team-one__content">
                            <h3 class="team-one__name"><a href="#">Structural Engineer</a></h3>
                            <p class="team-one__sub-title">Shed Design &amp; Load Analysis</p>
                            <ul class="list-unstyled team-one__social-two">
                                <li><a href="tel:9843722055"><i class="fas fa-phone-alt"></i></a></li>
                            </ul>
                            <div class="team-one__shape">
                                <img src="{{ asset('assets/images/shapes/team-one-shape.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Team Member 2-->
            <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="200ms">
                <div class="team-one__single">
                    <div class="team-one__img-box">
                        <div class="team-one__img">
                            <img src="{{ asset('assets/images/team/team-1-2.jpg') }}" alt="Fabrication Works Supervisor">
                        </div>
                    </div>
                    <div class="team-one__content-box">
                        <div class="team-one__content">
                            <h3 class="team-one__name"><a href="#">Site Supervisor</a></h3>
                            <p class="team-one__sub-title">Erection &amp; Quality Control</p>
                            <ul class="list-unstyled team-one__social-two">
                                <li><a href="tel:9843722055"><i class="fas fa-phone-alt"></i></a></li>
                            </ul>
                            <div class="team-one__shape">
                                <img src="{{ asset('assets/images/shapes/team-one-shape.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Team Member 3-->
            <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="300ms">
                <div class="team-one__single">
                    <div class="team-one__img-box">
                        <div class="team-one__img">
                            <img src="{{ asset('assets/images/team/team-1-3.jpg') }}" alt="Master Welder & Fabricator">
                        </div>
                    </div>
                    <div class="team-one__content-box">
                        <div class="team-one__content">
                            <h3 class="team-one__name"><a href="#">Master Fabricator</a></h3>
                            <p class="team-one__sub-title">Precision Steel Assembly</p>
                            <ul class="list-unstyled team-one__social-two">
                                <li><a href="tel:9843722055"><i class="fas fa-phone-alt"></i></a></li>
                            </ul>
                            <div class="team-one__shape">
                                <img src="{{ asset('assets/images/shapes/team-one-shape.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Team Section End-->

<!--Brand Section Start-->
<section class="brand-one" style="padding: 50px 0;">
    <div class="brand-one__inner">
        <div class="brand-one__shape-1">
            <img src="{{ asset('assets/images/shapes/brand-one-shape-1.png') }}" alt="">
        </div>
        <div class="brand-one__shape-2">
            <img src="{{ asset('assets/images/shapes/brand-one-shape-2.png') }}" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="brand-one__carousel thm-owl__carousel owl-theme owl-carousel" data-owl-options='{
                        "margin": 0,
                        "smartSpeed": 700,
                        "loop": true,
                        "autoplay": 4000,
                        "nav": false,
                        "dots": false,
                        "responsive":{
                            "0":{"items":2},
                            "600":{"items":3},
                            "800":{"items":4},
                            "1024":{"items":5}
                        }
                    }'>
                        <div class="brand-one__single">
                            <div class="brand-one__img">
                                <img src="{{ asset('assets/images/brand/brand-1-1.png') }}" alt="Material Partner">
                            </div>
                        </div>
                        <div class="brand-one__single">
                            <div class="brand-one__img">
                                <img src="{{ asset('assets/images/brand/brand-1-2.png') }}" alt="Material Partner">
                            </div>
                        </div>
                        <div class="brand-one__single">
                            <div class="brand-one__img">
                                <img src="{{ asset('assets/images/brand/brand-1-3.png') }}" alt="Material Partner">
                            </div>
                        </div>
                        <div class="brand-one__single">
                            <div class="brand-one__img">
                                <img src="{{ asset('assets/images/brand/brand-1-4.png') }}" alt="Material Partner">
                            </div>
                        </div>
                        <div class="brand-one__single">
                            <div class="brand-one__img">
                                <img src="{{ asset('assets/images/brand/brand-1-5.png') }}" alt="Material Partner">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Brand Section End-->
@endsection
