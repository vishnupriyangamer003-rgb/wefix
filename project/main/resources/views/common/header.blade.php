<style>
    .main-header__logo-box {
        position: relative;
        display: block;
        width: 174px;
        height: 166px;
    }
    .main-header__logo-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 174px;
        height: 166px;
        display: block;
        z-index: 1;
        pointer-events: none;
    }
    .main-header__logo-img {
        position: absolute;
        top: 8px;
        left: 50%;
        transform: translateX(-50%);
        width: 92px;
        height: 112px;
        object-fit: contain;
        display: block;
        z-index: 2;
        transition: transform 0.3s ease;
    }
    .main-header__logo-box:hover .main-header__logo-img {
        transform: translateX(-50%) scale(1.05);
    }

    /* Menu & Hamburger Toggler Responsiveness */
    @media (min-width: 992px) {
        .main-menu .mobile-nav__toggler,
        .stricky-header .mobile-nav__toggler {
            display: none !important;
        }
        .main-menu .main-menu__list,
        .stricky-header .main-menu__list {
            display: flex !important;
            align-items: center;
        }
    }

    @media (min-width: 992px) and (max-width: 1250px) {
        .main-menu .main-menu__list>li+li,
        .stricky-header .main-menu__list>li+li {
            margin-left: 24px;
        }
    }

    @media (max-width: 991px) {
        .main-menu .main-menu__list,
        .stricky-header .main-menu__list {
            display: none !important;
        }
        .main-menu .mobile-nav__toggler,
        .stricky-header .mobile-nav__toggler {
            display: inline-flex !important;
            align-items: center;
            font-size: 24px;
            color: var(--roofsie-base, #dfa528);
            padding: 20px 0;
            cursor: pointer;
        }
    }

    /* Hide distracting cursor circle/dot */
    .custom-cursor__cursor,
    .custom-cursor__cursor-two {
        display: none !important;
    }    body.custom-cursor,
    body.custom-cursor * {
        cursor: auto !important;
    }
    a, button, .thm-btn, [role="button"], .mobile-nav__toggler {
        cursor: pointer !important;
    }
</style>

<header class="main-header clearfix">
    <div class="main-header__logo">
        <a href="{{ url('/') }}" class="main-header__logo-box">
            <img class="main-header__logo-bg" src="{{ asset('assets/images/resources/logo-badge-bg.png') }}?v=gold2" alt="WEFIX Badge Background">
            <img class="main-header__logo-img" src="{{ asset('assets/images/resources/logo.png') }}" alt="WEFIX Logo">
        </a>
    </div>
    <div class="main-header__top">
        <div class="main-header__top-inner">
            <div class="main-header__top-address">
                <ul class="list-unstyled main-header__top-address-list">
                    <li>
                        <i class="icon">
                            <span class="fa fa-clock"></span>
                        </i>
                        <div class="text">
                            <p>Mon to Sat: 08:30 am to 07:00 pm</p>
                        </div>
                    </li>
                    <li>
                        <i class="icon">
                            <span class="fa fa-map-marker-alt"></span>
                        </i>
                        <div class="text">
                            <p>Aruvankattanur, Manmangalam, Karur - 639006</p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="main-header__top-right">
                <div class="main-header__top-social-box">
                    <div class="main-header__top-social">
                        <a href="#"><i class="fab fa-facebook-square"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="main-menu clearfix">
        <div class="main-menu__wrapper clearfix">
            <div class="main-menu__wrapper-inner clearfix">
                <div class="main-menu__left">
                    <div class="main-menu__main-menu-box">
                        <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                        <ul class="main-menu__list">
                            <li class="{{ request()->is('/') ? 'current' : '' }}">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="{{ request()->is('about') ? 'current' : '' }}">
                                <a href="{{ url('/about') }}">About</a>
                            </li>
                            <li class="dropdown {{ request()->is('services') ? 'current' : '' }}">
                                <a href="{{ url('/services') }}">Services <i class="fa fa-angle-down mm-services__caret"></i></a>
                                <ul class="border-top-2px main-menu__services-menu">
                                    <li class="mm-services__item">
                                        <a href="{{ url('/services#structural-steel') }}">
                                            <span class="mm-services__icon"><i class="fa fa-cubes"></i></span>
                                            <span class="mm-services__body">
                                                <span class="mm-services__title">Structural steel fabrication</span>
                                                <span class="mm-services__desc">Columns, beams &amp; trusses</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="mm-services__item">
                                        <a href="{{ url('/services#shed-erection') }}">
                                            <span class="mm-services__icon"><i class="fa fa-warehouse"></i></span>
                                            <span class="mm-services__body">
                                                <span class="mm-services__title">Industrial shed erection</span>
                                                <span class="mm-services__desc">Factory sheds &amp; warehouses</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="mm-services__item">
                                        <a href="{{ url('/services#metal-roofing') }}">
                                            <span class="mm-services__icon"><i class="fa fa-home"></i></span>
                                            <span class="mm-services__body">
                                                <span class="mm-services__title">Metal roofing &amp; cladding</span>
                                                <span class="mm-services__desc">Sheets, flashing &amp; gutters</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="mm-services__item">
                                        <a href="{{ url('/services#mezzanine-floors') }}">
                                            <span class="mm-services__icon"><i class="fa fa-th-large"></i></span>
                                            <span class="mm-services__body">
                                                <span class="mm-services__title">Mezzanine &amp; staircases</span>
                                                <span class="mm-services__desc">Platforms, ladders &amp; stairs</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="mm-services__item">
                                        <a href="{{ url('/services#gates-grills') }}">
                                            <span class="mm-services__icon"><i class="fa fa-lock"></i></span>
                                            <span class="mm-services__body">
                                                <span class="mm-services__title">Gates, grills &amp; railings</span>
                                                <span class="mm-services__desc">Grills, handrails &amp; gates</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="mm-services__item">
                                        <a href="{{ url('/services#custom-fabrication') }}">
                                            <span class="mm-services__icon"><i class="fa fa-cogs"></i></span>
                                            <span class="mm-services__body">
                                                <span class="mm-services__title">Custom heavy fabrication</span>
                                                <span class="mm-services__desc">Built to your drawing</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="mm-services__all">
                                        <a href="{{ url('/services') }}">View all services <i class="fa fa-arrow-right"></i></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{ url('/#projects') }}">Works</a>
                            </li>
                            <li>
                                <a href="{{ url('/#gallery') }}">Gallery</a>
                            </li>
                            <li>
                                <a href="{{ url('/#contact') }}">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="main-menu__right">
                    <div class="main-menu__call">
                        <div class="main-menu__call-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="main-menu__call-content">
                            <p>Call Anytime</p>
                            <a href="tel:9843722055">9843722055</a>
                        </div>
                    </div>
                    <div class="main-menu__search-box">
                        <a href="#" class="main-menu__search search-toggler icon-magnifying-glass"></a>
                    </div>
                    <div class="main-menu__btn-box">
                        <a href="{{ url('/#contact') }}" class="thm-btn main-menu__btn"> <i class="fa fa-arrow-right"></i> Free estimate</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>

<div class="stricked-menu stricky-header">
    <div class="sticky-header__content"></div>
</div>
<!-- /.stricked-menu -->
