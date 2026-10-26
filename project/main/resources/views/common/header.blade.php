<header class="main-header clearfix">
    <div class="main-header__logo">
        <a href="{{ url('/') }}" class="d-flex align-items-center text-decoration-none">
            <img src="{{ asset('assets/images/resources/wefix-logo.jpeg') }}" alt="WEFIX Logo" style="max-height: 65px; border-radius: 6px; margin-right: 12px; object-fit: contain;">
            <div class="d-none d-sm-block text-start">
                <span style="font-weight: 800; font-size: 1.5rem; color: #161c2d; display: block; line-height: 1.1;">WEFIX</span>
                <span style="font-size: 0.75rem; color: #f26422; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">Fabrication & Structural</span>
            </div>
        </a>
    </div>
    <div class="main-header__top">
        <div class="main-header__top-inner">
            <div class="main-header__top-address">
                <ul class="list-unstyled main-header__top-address-list">
                    <li>
                        <i class="icon">
                            <span class="fa fa-map-marker-alt"></span>
                        </i>
                        <div class="text">
                            <p>Aruvankattanur, Manmangalam, Karur - 639006</p>
                        </div>
                    </li>
                    <li>
                        <i class="icon">
                            <span class="fa fa-clock"></span>
                        </i>
                        <div class="text">
                            <p>Mon to Sat: 08:30 am to 07:00 pm</p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="main-header__top-right">
                <div class="main-header__top-menu-box">
                    <ul class="list-unstyled main-header__top-menu">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('/#about') }}">About</a></li>
                        <li><a href="{{ url('/#services') }}">Services</a></li>
                        <li><a href="{{ url('/#contact') }}">Contact</a></li>
                    </ul>
                </div>
                <div class="main-header__top-social-box">
                    <div class="main-header__top-social">
                        <a href="tel:9843722055" title="Call Us"><i class="fas fa-phone-alt"></i></a>
                        <a href="https://wa.me/919843722055" target="_blank" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
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
                            <li class="{{ Request::is('/') ? 'current' : '' }}">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li>
                                <a href="{{ url('/#about') }}">About Us</a>
                            </li>
                            <li class="dropdown">
                                <a href="{{ url('/#services') }}">Services</a>
                                <ul class="border-top-2px">
                                    <li><a href="{{ url('/#services') }}">All Services</a></li>
                                    <li><a href="{{ url('/#services') }}">Fabrication Works</a></li>
                                    <li><a href="{{ url('/#services') }}">Industrial Shed Erection</a></li>
                                    <li><a href="{{ url('/#services') }}">Roofing Solutions</a></li>
                                    <li><a href="{{ url('/#services') }}">Structural Steel Works</a></li>
                                    <li><a href="{{ url('/#services') }}">Gate & Grill Works</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{ url('/#projects') }}">Works / Projects</a>
                            </li>
                            <li>
                                <a href="{{ url('/#contact') }}">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="main-menu__right">
                    <div class="main-menu__call">
                        <div class="main-menu__call-icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="main-menu__call-content">
                            <p>Call Anytime</p>
                            <a href="tel:9843722055">9843722055</a>
                        </div>
                    </div>
                    <div class="main-menu__btn-box">
                        <a href="{{ url('/#contact') }}" class="thm-btn main-menu__btn"> <i class="fa fa-arrow-right"></i> Get Free Quote</a>
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
