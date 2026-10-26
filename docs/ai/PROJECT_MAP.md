# WEFIX Project Map & Component Index

This file is the single source of truth for repository structure and component mapping. Consult this map first before performing any searches.

---

## 1. Directory Overview

| Directory / Path | Status | Purpose |
| :--- | :--- | :--- |
| `project/` | **ACTIVE** | Main development workspace. |
| `project/main/` | **ACTIVE** | Laravel 8 application root (app, views, assets, routes). |
| `theme/` | **STRICT READ-ONLY** | Original static HTML templates (`roofsie-html`). Never modify. |
| `docs/ai/` | **MEMORY** | AI persistent intelligence and architectural knowledge base. |
| `.agents/` | **CONFIG** | Antigravity rules and custom skills (`git-workflow`, etc.). |

---

## 2. Active Application Entry Points

- **Apache Local URL**: `http://localhost/vichu/wefix/project/`
  - Routes through: `project/index.php` -> `project/main/public/index.php`
- **Artisan Dev Server**: `http://localhost:8000/` (executed from `project/main`)
- **Route Definitions**: `project/main/routes/web.php`
  - Root route `/` renders `welcome.blade.php`.

---

## 3. UI Component to File Mapping

When working on a UI component, open **only** the target file listed below:

| UI Section / Component | File Path | Key CSS Classes / Notes |
| :--- | :--- | :--- |
| **Global Layout & Scripts** | `project/main/resources/views/layouts/app.blade.php` | `<head>`, CSS vendors, `@stack('styles')`, scripts |
| **Main Header & Nav** | `project/main/resources/views/common/header.blade.php` | `.main-header-two`, split logo, navigation menu, contact bar |
| **Footer & Contact Info** | `project/main/resources/views/common/footer.blade.php` | `.site-footer`, quick links, company address, copyright |
| **Homepage View** | `project/main/resources/views/welcome.blade.php` | Assembles all homepage sections below |
| ↳ **Hero Slider** | `welcome.blade.php` (`main-slider-two`) | Swiper 3-slide banner with zoom effect & arrow controls |
| ↳ **Feature Cards** | `welcome.blade.php` (`feature-one`) | 3 cards: Quality materials, Professional workers, Free estimates |
| ↳ **About Us** | `welcome.blade.php` (`about-one`) | 98% counter badge, worker image, bullet points, discover more button |
| ↳ **Services Section** | `welcome.blade.php` (`services-three`) | 3 circular icon cards: Single play, Modified, Built-up roofing |
| ↳ **Why Choose Us** | `welcome.blade.php` (`why-choose-two`) | Dark slate background, 3D circular popout image, 4 core reasons |

---

## 4. Asset Directory Map

Assets are located in `project/main/public/assets/`:

- **CSS**:
  - `project/main/public/assets/css/roofsie.css` — Core template styles (11k lines)
  - `project/main/public/assets/css/roofsie-responsive.css` — Responsive media queries
  - Page-specific overrides belong in `@push('styles')` inside `welcome.blade.php`.
- **Icons**:
  - `project/main/public/assets/vendors/roofsie-icons/style.css` — Icomoon custom font (`icon-roof`, `icon-joist`, `icon-roof-1`, `icon-roof-2`, `icon-mission`, `icon-shield`, `icon-construction-worker`).
- **Images**:
  - Backgrounds: `project/main/public/assets/images/backgrounds/`
  - Resources / Cutouts: `project/main/public/assets/images/resources/`
  - Services: `project/main/public/assets/images/services/`
  - Shapes: `project/main/public/assets/images/shapes/`
  - Branding Logo: `project/logo.png`

---

## 5. Theme Reference Source Index (`theme/roofsie-html/main-html/`)

Use as **read-only reference** when copying new sections:

- `index.html` — Header One, Services One, Project counters
- `index2.html` — Header Two (`main-header-two`), Slider Two (`main-slider-two`), Why Choose Two (`why-choose-two`)
- `index3.html` — Services Three (`services-three`)
- `about.html` — About One (`about-one`), Team, Testimonials
- `contact.html` — Contact form, Google Maps iframe layout
