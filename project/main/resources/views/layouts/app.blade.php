<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'WEFIX - Fabrication, Structural works & Roofing Solutions')</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons -->
    <link rel="icon" type="image/jpeg" href="{{ asset('assets/images/resources/wefix-logo.jpeg') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/animate/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/animate/custom-animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/jarallax/jarallax.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/nouislider/nouislider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/nouislider/nouislider.pips.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/odometer/odometer.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/swiper/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/roofsie-icons/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/tiny-slider/tiny-slider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/reey-font/stylesheet.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bxslider/jquery.bxslider.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-select/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/vegas/vegas.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/jquery-ui/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/timepicker/timePicker.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/roofsie.css') }}?v=gold2">
    <link rel="stylesheet" href="{{ asset('assets/css/roofsie-responsive.css') }}?v=gold2">

    <style>
        :root {
            --roofsie-base: #dfa528 !important;
            --roofsie-base-rgb: 223, 165, 40 !important;
            --roofsie-gold: #dfa528 !important;
            --roofsie-gold-light: #f5c754 !important;
            --roofsie-gold-dark: #b88612 !important;
            --roofsie-gold-glow: rgba(223, 165, 40, 0.45) !important;
        }

        .preloader {
            display: none !important;
        }

        /* ========================================================
           IMPORTANT BACKGROUNDS (Vibrant Logo Gold)
           ======================================================== */
        .about-one__satisfied-content,
        .services-three__icon,
        .feature-one__icon,
        .why-choose-two__list-one li .icon,
        .why-choose-two__list-two li .icon,
        .scroll-to-top,
        .thm-swiper__slider .swiper-pagination-bullet-active,
        .project-three__carousel.owl-carousel .owl-dots .owl-dot.active span {
            background-color: var(--roofsie-base) !important;
        }

        .services-three__icon {
            box-shadow: 0 8px 24px rgba(223, 165, 40, 0.35) !important;
        }

        .feature-one__icon:before {
            border-bottom-color: var(--roofsie-base) !important;
        }

        .why-choose-two__list-one li .icon:before {
            border-left-color: var(--roofsie-base) !important;
        }

        .why-choose-two__list-two li .icon:before {
            border-right-color: var(--roofsie-base) !important;
        }

        .section-sub-title,
        .about-two__text-1,
        .services-three__sub-title {
            color: var(--roofsie-base) !important;
        }

        /* ========================================================
           BUTTON HOVER STATES (Golden Hover, Not Black)
           ======================================================== */
        .thm-btn {
            background-color: var(--roofsie-base) !important;
            color: #ffffff !important;
            border: none !important;
            transition: all 0.4s ease !important;
        }

        /* Golden slide-in for standard thm-btn */
        .thm-btn:before {
            background-color: var(--roofsie-gold-dark) !important;
        }

        .thm-btn:hover {
            background-color: var(--roofsie-gold-dark) !important;
            color: #ffffff !important;
            box-shadow: 0 8px 24px var(--roofsie-gold-glow) !important;
        }

        .thm-btn i {
            color: var(--roofsie-base) !important;
            background-color: #ffffff !important;
        }

        .thm-btn:hover i {
            color: var(--roofsie-gold-dark) !important;
            background-color: #ffffff !important;
        }

        /* ========================================================
           ALL NAVIGATION & LINK HOVER STATES (Golden Glow & Accent)
           ======================================================== */
        a:hover {
            color: var(--roofsie-base) !important;
        }

        /* Main Menu items */
        .main-menu .main-menu__list > li:hover > a,
        .main-menu .main-menu__list > li.current > a,
        .stricky-header .main-menu__list > li:hover > a,
        .stricky-header .main-menu__list > li.current > a,
        .main-menu .main-menu__list > li > ul > li:hover > a,
        .main-menu .main-menu__list > li > ul > li.current > a {
            color: var(--roofsie-base) !important;
        }

        .main-menu .main-menu__list > li > a:before,
        .stricky-header .main-menu__list > li > a:before {
            background-color: var(--roofsie-base) !important;
        }

        /* Header top & contact */
        .main-header__top-address-list li .text a:hover,
        .main-header__top-menu li a:hover,
        .main-header__top-social a:hover,
        .main-menu__call-content a:hover,
        .main-menu__search:hover,
        .mobile-nav__toggler:hover {
            color: var(--roofsie-base) !important;
        }

        /* Feature section hovers */
        .feature-one__single:hover {
            box-shadow: 0 15px 35px rgba(223, 165, 40, 0.18) !important;
        }

        .feature-one__single:hover .feature-one__title a,
        .feature-one__read-more a:hover {
            color: var(--roofsie-base) !important;
        }

        /* Services section hovers */
        .services-three__title a:hover {
            color: var(--roofsie-base) !important;
        }

        .services-three__single:hover .services-three__icon {
            background-color: var(--roofsie-gold-dark) !important;
            box-shadow: 0 0 25px rgba(223, 165, 40, 0.7) !important;
            transform: translateX(-50%) scale(1.08) !important;
        }

        /* Why Choose Us list items on hover */
        .why-choose-two__read-more a:hover,
        .why-choose-two__list-one li .content h4 a:hover,
        .why-choose-two__list-two li .content h4 a:hover {
            color: var(--roofsie-base) !important;
        }

        .why-choose-two__list-one li:hover .icon,
        .why-choose-two__list-two li:hover .icon {
            background-color: var(--roofsie-gold-dark) !important;
            color: #ffffff !important;
            box-shadow: 0 8px 25px rgba(223, 165, 40, 0.5) !important;
            transform: scale(1.05) !important;
        }

        .why-choose-two__list-one li:hover .icon:before {
            border-left-color: var(--roofsie-gold-dark) !important;
        }

        .why-choose-two__list-two li:hover .icon:before {
            border-right-color: var(--roofsie-gold-dark) !important;
        }

        /* Projects carousel hover */
        .project-three__title a:hover {
            color: var(--roofsie-base) !important;
        }

        .project-three__arrow a:hover {
            background-color: var(--roofsie-base) !important;
            color: #ffffff !important;
        }

        .project-three__single:hover .project-three__img:after {
            background-image: -webkit-linear-gradient(90deg, rgba(223, 165, 40, 0.88) 0%, rgba(28, 27, 31, 0) 65%) !important;
            background-image: linear-gradient(0deg, rgba(223, 165, 40, 0.88) 0%, rgba(28, 27, 31, 0) 65%) !important;
        }

        /* Footer Links & Social hovers */
        .footer-widget__explore-list li a:hover {
            color: var(--roofsie-base) !important;
            padding-left: 6px;
        }

        .footer-widget__contact-list li .text a:hover,
        .site-footer__bottom-text a:hover {
            color: var(--roofsie-base) !important;
        }

        .site-footer__social a:hover {
            background-color: var(--roofsie-base) !important;
            color: #1c1b1f !important;
            box-shadow: 0 4px 18px var(--roofsie-gold-glow) !important;
            transform: translateY(-3px);
        }

        .site-footer__social a:hover:after {
            background-color: var(--roofsie-base) !important;
        }

        /* Slider navigation arrows hover */
        .main-slider-two__nav .swiper-button-prev:hover,
        .main-slider-two__nav .swiper-button-next:hover {
            background-color: var(--roofsie-base) !important;
            color: #ffffff !important;
        }

        /* Scroll to top hover */
        .scroll-to-top:hover {
            background-color: var(--roofsie-gold-dark) !important;
            box-shadow: 0 0 20px var(--roofsie-gold-glow) !important;
        }

        /* ========================================================
           FOOTER READABILITY ON DARK BACKGROUND
           ======================================================== */
        .footer-widget__about-text {
            color: #e8e6ee !important;
        }

        .footer-widget__explore-list li a {
            color: #d5d3dc !important;
        }

        .footer-widget__explore-list li a:hover {
            color: var(--roofsie-gold-light) !important;
        }

        .footer-widget__contact-text {
            color: #d5d3dc !important;
        }

        .footer-widget__contact-list li .text p,
        .footer-widget__contact-list li .text a {
            color: #e8e6ee !important;
        }

        .footer-widget__contact-list li .text a:hover {
            color: var(--roofsie-gold-light) !important;
        }

        .site-footer__bottom-text,
        .site-footer__bottom-text a {
            color: #cfcdd6 !important;
        }

        .site-footer__bottom-text a:hover {
            color: var(--roofsie-gold-light) !important;
        }

        .site-footer__bottom-inner {
            border-top-color: rgba(255, 255, 255, 0.14) !important;
        }

        .site-footer__social a {
            color: #ffffff !important;
            background-color: #232227 !important;
        }

        /* Footer tagline & free-quote CTA */
        .footer-widget__tagline {
            display: block;
            color: var(--roofsie-gold-light) !important;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            margin: -2px 0 14px;
        }

        .footer-widget__cta {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 12px;
            margin-top: 24px;
        }

        .footer-widget__cta-text {
            margin: 0;
            color: #ffffff !important;
            font-size: 16px;
            font-weight: 700;
        }

        .footer-widget__cta-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            border-radius: 30px;
            background-color: var(--roofsie-base) !important;
            color: #ffffff !important;
            font-size: 14px;
            font-weight: 700;
            line-height: 1.2;
            transition: all 0.3s ease;
        }

        .footer-widget__cta-btn i {
            font-size: 12px;
            color: #ffffff !important;
        }

        .footer-widget__cta-btn:hover {
            background-color: var(--roofsie-gold-light) !important;
            color: #1c1b1f !important;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(223, 165, 40, 0.35);
        }

        .footer-widget__cta-btn:hover i {
            color: #1c1b1f !important;
        }
    </style>

    @stack('styles')
</head>

<body class="custom-cursor">

    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>

    <div class="page-wrapper">
        {{-- Common Header --}}
        @include('common.header')

        {{-- Main Page Content --}}
        <main>
            @yield('content')
        </main>

        {{-- Common Footer --}}
        @include('common.footer')
    </div>
    <!-- /.page-wrapper -->

    <!-- Vendor Scripts -->
    <script src="{{ asset('assets/vendors/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jarallax/jarallax.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery-appear/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery-validate/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/odometer/odometer.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/swiper/swiper.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/tiny-slider/tiny-slider.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/wnumb/wNumb.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/wow/wow.js') }}"></script>
    <script src="{{ asset('assets/vendors/isotope/isotope.js') }}"></script>
    <script src="{{ asset('assets/vendors/countdown/countdown.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bxslider/jquery.bxslider.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/vegas/vegas.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/vendors/timepicker/timePicker.js') }}"></script>
    <script src="{{ asset('assets/vendors/circleType/jquery.circleType.js') }}"></script>
    <script src="{{ asset('assets/vendors/circleType/jquery.lettering.min.js') }}"></script>

    <!-- Template JS -->
    <script src="{{ asset('assets/js/roofsie.js') }}"></script>

    @stack('scripts')
</body>

</html>
