@extends('layouts.app')

@section('title', 'WEFIX - Fabrication, Structural works & Industrial Roofing in Karur')

@section('content')
<!--Main Slider Start-->
<section class="main-slider clearfix" style="position: relative; background: #161c2d; padding: 100px 0 120px 0; color: #fff;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-7 col-lg-8">
                <div class="main-slider__content">
                    <span class="d-inline-block px-3 py-1 mb-3 rounded-pill" style="background: rgba(242, 100, 34, 0.15); color: #f26422; font-weight: 700; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 1px;">
                        ★ Expert Steel Engineering & Fabrication
                    </span>
                    <h1 style="color: #fff; font-weight: 800; font-size: clamp(2.5rem, 5vw, 4rem); line-height: 1.15; margin-bottom: 20px;">
                        Reliable <span style="color: #f26422;">Fabrication</span> & Structural Solutions
                    </h1>
                    <p style="color: #b0bac9; font-size: 1.15rem; margin-bottom: 35px; max-width: 600px;">
                        WEFIX provides industrial shed erection, commercial roofing, heavy structural steel fabrication, and custom engineering works in Karur and across Tamil Nadu.
                    </p>
                    <div class="d-flex flex-wrap gap-3 align-items-center">
                        <a href="tel:9843722055" class="thm-btn" style="background: #f26422; color: #fff; padding: 14px 32px; border-radius: 6px; font-weight: 700; text-decoration: none;">
                            <i class="fa fa-phone-alt me-2"></i> Call 9843722055
                        </a>
                        <a href="#services" class="thm-btn" style="background: transparent; color: #fff; border: 2px solid #ffffff40; padding: 12px 28px; border-radius: 6px; font-weight: 600; text-decoration: none;">
                            Explore Services <i class="fa fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-lg-4 text-center mt-4 mt-lg-0">
                <div style="background: #ffffff0a; border: 1px solid #ffffff15; border-radius: 16px; padding: 30px;">
                    <img src="{{ asset('assets/images/resources/wefix-logo.jpeg') }}" alt="WEFIX Karur" style="max-width: 220px; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.4);" class="img-fluid mb-4">
                    <h3 style="color: #fff; font-weight: 700; margin-bottom: 8px;">WEFIX Karur</h3>
                    <p style="color: #f26422; font-weight: 600; margin-bottom: 12px;">Fabrication, Structural works</p>
                    <p style="color: #a0aec0; font-size: 0.95rem; margin: 0;">
                        8/2,3-B1, Padma Nagar, Aruvankattanur, Manmangalam, Karur - 639006
                    </p>
                </div>
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
