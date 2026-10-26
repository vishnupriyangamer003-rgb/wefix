<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>WEFIX - Fabrication & Structural Works</title>

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            :root {
                --primary: #f26422;
                --primary-dark: #d54e10;
                --dark: #161c2d;
                --dark-light: #242f46;
                --text-muted: #8c98a4;
                --light-bg: #f8fafd;
                --white: #ffffff;
                --border: #e9edf4;
            }

            * {
                box-sizing: border-box;
                margin: 0;
                padding: 0;
            }

            body {
                font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
                background-color: var(--light-bg);
                color: var(--dark);
                line-height: 1.6;
                min-height: 100vh;
                display: flex;
                flex-direction: column;
            }

            .header {
                background: var(--white);
                border-bottom: 1px solid var(--border);
                padding: 1.25rem 2rem;
            }

            .header-container {
                max-width: 1200px;
                margin: 0 auto;
                display: flex;
                align-items: center;
                justify-content: space-between;
            }

            .brand {
                display: flex;
                align-items: center;
                gap: 0.85rem;
                text-decoration: none;
            }

            .brand-badge {
                background: var(--primary);
                color: var(--white);
                font-weight: 800;
                font-size: 1.25rem;
                padding: 0.4rem 0.8rem;
                border-radius: 8px;
                letter-spacing: 0.5px;
            }

            .brand-name {
                font-size: 1.25rem;
                font-weight: 800;
                color: var(--dark);
                letter-spacing: -0.5px;
            }

            .brand-tag {
                font-size: 0.8rem;
                color: var(--text-muted);
                display: block;
                font-weight: 500;
            }

            .main-content {
                flex: 1;
                max-width: 1200px;
                margin: 0 auto;
                padding: 4rem 2rem;
                display: flex;
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .hero-badge {
                display: inline-flex;
                align-items: center;
                gap: 0.5rem;
                background: rgba(242, 100, 34, 0.1);
                color: var(--primary-dark);
                font-size: 0.875rem;
                font-weight: 600;
                padding: 0.4rem 1rem;
                border-radius: 9999px;
                margin-bottom: 1.5rem;
            }

            .hero-title {
                font-size: clamp(2.25rem, 5vw, 3.5rem);
                font-weight: 800;
                letter-spacing: -1px;
                color: var(--dark);
                line-height: 1.15;
                margin-bottom: 1.25rem;
            }

            .hero-title span {
                color: var(--primary);
            }

            .hero-subtitle {
                font-size: 1.125rem;
                color: var(--text-muted);
                max-width: 680px;
                margin-bottom: 2.5rem;
            }

            .cards-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                gap: 1.5rem;
                width: 100%;
                margin-top: 2rem;
                text-align: left;
            }

            .card {
                background: var(--white);
                border: 1px solid var(--border);
                border-radius: 16px;
                padding: 1.75rem;
                transition: transform 0.2s ease, box-shadow 0.2s ease;
            }

            .card:hover {
                transform: translateY(-4px);
                box-shadow: 0 12px 24px -10px rgba(0, 0, 0, 0.08);
            }

            .card-icon {
                width: 48px;
                height: 48px;
                border-radius: 12px;
                background: rgba(242, 100, 34, 0.1);
                color: var(--primary);
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 1.5rem;
                margin-bottom: 1.25rem;
                font-weight: 700;
            }

            .card-title {
                font-size: 1.15rem;
                font-weight: 700;
                margin-bottom: 0.5rem;
                color: var(--dark);
            }

            .card-desc {
                font-size: 0.925rem;
                color: var(--text-muted);
                line-height: 1.5;
            }

            .card-info {
                margin-top: 1rem;
                font-weight: 600;
                color: var(--dark);
                font-size: 0.95rem;
            }

            .footer {
                background: var(--white);
                border-top: 1px solid var(--border);
                padding: 2rem;
                text-align: center;
                font-size: 0.875rem;
                color: var(--text-muted);
            }

            .version-tag {
                margin-top: 0.5rem;
                font-size: 0.8rem;
                opacity: 0.8;
            }
        </style>
    </head>
    <body>
        <header class="header">
            <div class="header-container">
                <a href="{{ url('/') }}" class="brand">
                    <span class="brand-badge">W</span>
                    <div>
                        <span class="brand-name">WEFIX</span>
                        <span class="brand-tag">Fabrication & Structural works</span>
                    </div>
                </a>
                <div style="font-weight: 600; color: var(--primary);">
                    📞 <a href="tel:9843722055" style="color: inherit; text-decoration: none;">9843722055</a>
                </div>
            </div>
        </header>

        <main class="main-content">
            <div class="hero-badge">
                ⚡ Fresh Laravel Environment Ready
            </div>
            <h1 class="hero-title">
                Building Solid Foundations with <span>WEFIX</span>
            </h1>
            <p class="hero-subtitle">
                Expert Fabrication, Industrial Roofing, and Structural Steel Engineering. Your application environment is clean, secure, and ready for development.
            </p>

            <div class="cards-grid">
                <div class="card">
                    <div class="card-icon">🏗️</div>
                    <h3 class="card-title">Structural Works</h3>
                    <p class="card-desc">Heavy fabrication, industrial shed erection, steel frame fabrication, and custom engineering solutions.</p>
                    <div class="card-info">Karur & Surrounding Regions</div>
                </div>

                <div class="card">
                    <div class="card-icon">🛡️</div>
                    <h3 class="card-title">Clean & Secure Base</h3>
                    <p class="card-desc">Configured with hardened CSRF protection, secure sessions, clean MVC architecture, and optimized routing.</p>
                    <div class="card-info">Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</div>
                </div>

                <div class="card">
                    <div class="card-icon">📍</div>
                    <h3 class="card-title">Headquarters</h3>
                    <p class="card-desc">8/2,3-B1, Padma Nagar, Aruvankattanur, Manmangalam, Karur - 639006.</p>
                    <div class="card-info">Mob: +91 9843722055</div>
                </div>
            </div>
        </main>

        <footer class="footer">
            <div>&copy; {{ date('Y') }} WEFIX. All rights reserved.</div>
            <div class="version-tag">Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</div>
        </footer>
    </body>
</html>
