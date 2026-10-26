<header class="main-header clearfix">
    <div class="main-header__logo">
        <a href="{{ url('/') }}"><img src="{{ asset('assets/images/resources/wefix-logo-badge-dark.png') }}" alt="WEFIX Logo"></a>
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
                            <span class="fa fa-envelope"></span>
                        </i>
                        <div class="text">
                            <p><a href="tel:9843722055">+91 9843722055</a></p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="main-header__top-right">
                <div class="main-header__top-menu-box">
                    <ul class="list-unstyled main-header__top-menu">
                        <li><a href="{{ url('/#about') }}">About</a></li>
                        <li><a href="{{ url('/#services') }}">Services</a></li>
                        <li><a href="{{ url('/#contact') }}">Contact</a></li>
                    </ul>
                </div>
                <div class="main-header__top-social-box">
                    <div class="main-header__top-social">
                        <a href="tel:9843722055" title="Call Us"><i class="fas fa-phone-alt"></i></a>
                        <a href="https://wa.me/919843722055" target="_blank" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                        <a href="#"><i class="fab fa-facebook-square"></i></a>
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
                            <li class="dropdown current">
                                <a href="{{ url('/') }}">Home</a>
                                <ul>
                                    <li><a href="{{ url('/') }}">Home Page</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{ url('/#about') }}">About</a>
                            </li>
                            <li class="dropdown">
                                <a href="{{ url('/#services') }}">Services</a>
                                <ul class="border-top-2px">
                                    <li><a href="{{ url('/#services') }}">All Services</a></li>
                                    <li><a href="{{ url('/#services') }}">Fabrication Works</a></li>
                                    <li><a href="{{ url('/#services') }}">Industrial Shed Erection</a></li>
                                    <li><a href="{{ url('/#services') }}">Roofing Solutions</a></li>
                                    <li><a href="{{ url('/#services') }}">Structural Steel Works</a></li>
                                    <li><a href="{{ url('/#services') }}">Gates, Grills & Railings</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="{{ url('/#projects') }}">Works</a>
                                <ul class="border-top-2px">
                                    <li><a href="{{ url('/#projects') }}">Recent Projects</a></li>
                                    <li><a href="{{ url('/#projects') }}">Fabrication Gallery</a></li>
                                </ul>
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
                            <a href="tel:9843722055">+91 98437 22055</a>
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
