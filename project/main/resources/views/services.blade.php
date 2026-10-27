@extends('layouts.app')

@section('title', 'Our Services - WEFIX Fabrication & Structural Works, Karur')

@push('styles')
<style>
    /* Inner page spacing tuned for the split-logo header */
    .page-header {
        padding: 115px 0 120px !important;
    }

    .services-one {
        padding-top: 95px !important;
        padding-bottom: 90px !important;
    }

    .services-one__single {
        margin-bottom: 30px;
    }

    .services-one__title a:hover {
        color: var(--roofsie-base) !important;
    }

    .services-one__read-more a:hover {
        color: var(--roofsie-base) !important;
    }

    .services-one__icon {
        background-color: var(--roofsie-base) !important;
    }
</style>
@endpush

@section('content')
<!--Page Header Start-->
<section class="page-header">
    <div class="page-header-bg" style="background-image: url({{ asset('assets/images/backgrounds/page-header-bg.jpg') }})"></div>
    <div class="container">
        <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><span>/</span></li>
                <li>Services</li>
            </ul>
            <h2>Our Services</h2>
        </div>
    </div>
</section>
<!--Page Header End-->

<!--Services One Start-->
<section class="services-one" id="services">
    <div class="services-one-shape-1 float-bob-x">
        <img src="{{ asset('assets/images/shapes/services-one-shape-1.png') }}" alt="">
    </div>
    <div class="services-one-shape-2">
        <img src="{{ asset('assets/images/shapes/services-one-shape-2.png') }}" alt="">
    </div>
    <div class="container">
        <div class="services-one__top">
            <div class="row">
                <div class="col-xl-7 col-lg-6">
                    <div class="services-one__top-left">
                        <div class="section-title text-left">
                            <div class="section-sub-title-box">
                                <p class="section-sub-title">Our services</p>
                                <div class="section-title-shape-1">
                                    <img src="{{ asset('assets/images/shapes/section-title-shape-1.png') }}" alt="">
                                </div>
                            </div>
                            <h2 class="section-title__title">We&rsquo;re providing quality roofing services</h2>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6">
                    <div class="services-one__top-right">
                        <p class="services-one__top-right-text">From a single gate to a complete industrial shed, WEFIX handles fabrication and erection with our own team. Every structure is measured, drawn and finished for the load it has to carry — delivered on schedule across Karur and Tamil Nadu.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="services-one__bottom">
            <div class="row">
                <!--Services One Single Start-->
                <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                    <div class="services-one__single" id="structural-steel">
                        <div class="services-one__img">
                            <img src="{{ asset('assets/images/services/services-1-1.jpg') }}" alt="Structural steel fabrication">
                        </div>
                        <div class="services-one__content">
                            <div class="services-one__icon">
                                <span class="icon-joist"></span>
                            </div>
                            <h3 class="services-one__title"><a href="https://wa.me/919843722055?text=Hi%20WEFIX%2C%20I%20need%20a%20quote%20for%20structural%20steel%20fabrication" target="_blank">Structural steel fabrication</a></h3>
                            <p class="services-one__text">Columns, beams, trusses and base plates cut, welded and painted to shop drawings, ready for site assembly.</p>
                            <div class="services-one__read-more">
                                <a href="https://wa.me/919843722055?text=Hi%20WEFIX%2C%20I%20need%20a%20quote%20for%20structural%20steel%20fabrication" target="_blank">Read More <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Services One Single End-->
                <!--Services One Single Start-->
                <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                    <div class="services-one__single" id="shed-erection">
                        <div class="services-one__img">
                            <img src="{{ asset('assets/images/services/services-1-2.jpg') }}" alt="Industrial shed erection">
                        </div>
                        <div class="services-one__content">
                            <div class="services-one__icon">
                                <span class="icon-construction-worker"></span>
                            </div>
                            <h3 class="services-one__title"><a href="https://wa.me/919843722055?text=Hi%20WEFIX%2C%20I%20need%20a%20quote%20for%20industrial%20shed%20erection" target="_blank">Industrial shed erection</a></h3>
                            <p class="services-one__text">Complete factory sheds and warehouses — steel framing, purlins, sheet roofing and gutter work.</p>
                            <div class="services-one__read-more">
                                <a href="https://wa.me/919843722055?text=Hi%20WEFIX%2C%20I%20need%20a%20quote%20for%20industrial%20shed%20erection" target="_blank">Read More <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Services One Single End-->
                <!--Services One Single Start-->
                <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                    <div class="services-one__single" id="metal-roofing">
                        <div class="services-one__img">
                            <img src="{{ asset('assets/images/services/services-1-3.jpg') }}" alt="Metal roofing and cladding">
                        </div>
                        <div class="services-one__content">
                            <div class="services-one__icon">
                                <span class="icon-roof-1"></span>
                            </div>
                            <h3 class="services-one__title"><a href="https://wa.me/919843722055?text=Hi%20WEFIX%2C%20I%20need%20a%20quote%20for%20metal%20roofing%20and%20cladding" target="_blank">Metal roofing &amp; cladding</a></h3>
                            <p class="services-one__text">Trapezoidal and standing-seam sheets with insulation, ridge capping and flashing for leak-free roofs.</p>
                            <div class="services-one__read-more">
                                <a href="https://wa.me/919843722055?text=Hi%20WEFIX%2C%20I%20need%20a%20quote%20for%20metal%20roofing%20and%20cladding" target="_blank">Read More <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Services One Single End-->
                <!--Services One Single Start-->
                <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                    <div class="services-one__single" id="mezzanine-floors">
                        <div class="services-one__img">
                            <img src="{{ asset('assets/images/services/services-1-4.jpg') }}" alt="Mezzanine floors and staircases">
                        </div>
                        <div class="services-one__content">
                            <div class="services-one__icon">
                                <span class="icon-analysis"></span>
                            </div>
                            <h3 class="services-one__title"><a href="https://wa.me/919843722055?text=Hi%20WEFIX%2C%20I%20need%20a%20quote%20for%20a%20mezzanine%20floor%20or%20staircase" target="_blank">Mezzanine floors &amp; staircases</a></h3>
                            <p class="services-one__text">MS mezzanine platforms, walkways, ladders and staircases fabricated to measured loads and site levels.</p>
                            <div class="services-one__read-more">
                                <a href="https://wa.me/919843722055?text=Hi%20WEFIX%2C%20I%20need%20a%20quote%20for%20a%20mezzanine%20floor%20or%20staircase" target="_blank">Read More <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Services One Single End-->
                <!--Services One Single Start-->
                <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="500ms">
                    <div class="services-one__single" id="gates-grills">
                        <div class="services-one__img">
                            <img src="{{ asset('assets/images/services/services-1-5.jpg') }}" alt="Gates, grills and railings">
                        </div>
                        <div class="services-one__content">
                            <div class="services-one__icon">
                                <span class="icon-shield"></span>
                            </div>
                            <h3 class="services-one__title"><a href="https://wa.me/919843722055?text=Hi%20WEFIX%2C%20I%20need%20a%20quote%20for%20gates%2C%20grills%20or%20railings" target="_blank">Gates, grills &amp; railings</a></h3>
                            <p class="services-one__text">Sliding gates, window grills, balcony railings and handrails with clean welds and painted finish.</p>
                            <div class="services-one__read-more">
                                <a href="https://wa.me/919843722055?text=Hi%20WEFIX%2C%20I%20need%20a%20quote%20for%20gates%2C%20grills%20or%20railings" target="_blank">Read More <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Services One Single End-->
                <!--Services One Single Start-->
                <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="600ms">
                    <div class="services-one__single" id="custom-fabrication">
                        <div class="services-one__img">
                            <img src="{{ asset('assets/images/services/services-1-6.jpg') }}" alt="Custom heavy fabrication">
                        </div>
                        <div class="services-one__content">
                            <div class="services-one__icon">
                                <span class="icon-support"></span>
                            </div>
                            <h3 class="services-one__title"><a href="https://wa.me/919843722055?text=Hi%20WEFIX%2C%20I%20need%20a%20quote%20for%20custom%20heavy%20fabrication" target="_blank">Custom heavy fabrication</a></h3>
                            <p class="services-one__text">One-off platforms, hoppers, machine bases and supports built to your drawing, tolerance and schedule.</p>
                            <div class="services-one__read-more">
                                <a href="https://wa.me/919843722055?text=Hi%20WEFIX%2C%20I%20need%20a%20quote%20for%20custom%20heavy%20fabrication" target="_blank">Read More <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Services One Single End-->
            </div>
        </div>
    </div>
</section>
<!--Services One End-->
@endsection
