<header class="main-header clearfix">
    <div class="main-header__logo">
        <a href="{{ url('/') }}"><img src="{{ asset('assets/images/resources/logo-1-wefix.png') }}" alt="WEFIX Logo"></a>
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
                            <p>Mon to Sat: 09:00 am to 05:00 pm</p>
                        </div>
                    </li>
                    <li>
                        <i class="icon">
                            <span class="fa fa-envelope"></span>
                        </i>
                        <div class="text">
                            <p><a href="mailto:needhelp@company.com">needhelp@company.com</a></p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="main-header__top-right">
                <div class="main-header__top-menu-box">
                    <ul class="list-unstyled main-header__top-menu">
                        <li><a href="{{ url('/#faq') }}">Our Faqs</a></li>
                        <li><a href="{{ url('/#contact') }}">Pricing</a></li>
                        <li><a href="{{ url('/#contact') }}">Contact</a></li>
                    </ul>
                </div>
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
                            <li class="dropdown current">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li>
                                <a href="{{ url('/#about') }}">About</a>
                            </li>
                            <li class="dropdown">
                                <a href="{{ url('/#services') }}">Services</a>
                                <ul class="border-top-2px">
                                    <li><a href="{{ url('/#services') }}">Services</a></li>
                                    <li><a href="{{ url('/#services') }}">Services Carousel</a></li>
                                    <li><a href="{{ url('/#services') }}">Single play roofing</a></li>
                                    <li><a href="{{ url('/#services') }}">Modified roofing</a></li>
                                    <li><a href="{{ url('/#services') }}">Built-up roofing</a></li>
                                    <li><a href="{{ url('/#services') }}">Roof inspection</a></li>
                                    <li><a href="{{ url('/#services') }}">Roof installation</a></li>
                                    <li><a href="{{ url('/#services') }}">Metal roofing</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#">Pages</a>
                                <ul class="border-top-2px">
                                    <li><a href="{{ url('/#team') }}">Team</a></li>
                                    <li><a href="{{ url('/#testimonials') }}">Testimonials</a></li>
                                    <li><a href="{{ url('/#gallery') }}">Gallery</a></li>
                                    <li><a href="{{ url('/#faq') }}">FAQs</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="{{ url('/#projects') }}">Works</a>
                                <ul class="border-top-2px">
                                    <li><a href="{{ url('/#projects') }}">Work</a></li>
                                    <li><a href="{{ url('/#projects') }}">Work Details</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="{{ url('/#blog') }}">Blog</a>
                                <ul class="border-top-2px">
                                    <li><a href="{{ url('/#blog') }}">Blog</a></li>
                                    <li><a href="{{ url('/#blog') }}">Blog Details</a></li>
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
