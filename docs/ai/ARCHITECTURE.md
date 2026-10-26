# WEFIX Architecture & Request Flow

## 1. High-Level Architecture

The project is structured as a hybrid Laravel 8 application designed to run seamlessly on local XAMPP Apache or via Laravel Artisan.

```
[Browser Request]
       │
       ▼
[project/index.php]  (Apache entry point wrapper)
       │
       ▼
[project/main/public/index.php]  (Standard Laravel Front Controller)
       │
       ▼
[project/main/routes/web.php]  (Routing table)
       │
       ▼
[resources/views/welcome.blade.php]  (Blade template engine)
       │
       ├─► [resources/views/layouts/app.blade.php]  (Master layout)
       ├─► [resources/views/common/header.blade.php] (Header & Split Logo)
       ├─► [resources/views/common/footer.blade.php] (Footer & Contacts)
       └─► Assets (CSS/JS/Images from public/assets/)
```

---

## 2. Serving Environments

1. **Local XAMPP Apache**:
   - Access URL: `http://localhost/vichu/wefix/project/`
   - Document root is Apache `htdocs/`. The outer `project/index.php` bootstraps `project/main/public/index.php`.
   - Asset URLs generated using Laravel's `asset('assets/...')` helper resolve properly to `http://localhost/vichu/wefix/project/assets/...` (aliased or mapped).

2. **Laravel Artisan Serve**:
   - Command: `php artisan serve --port=8000` inside `project/main`
   - Access URL: `http://localhost:8000/`

---

## 3. Blade & UI Layering

- **Master Layout** (`layouts/app.blade.php`):
  - Preloader disabled by default for fast rendering (`display: none !important`).
  - Cursor tracking circle disabled (`display: none !important`) to eliminate UI flicker.
  - Injects `@stack('styles')` before `</head>` allowing targeted view-level CSS overrides.
  - Injects `@stack('scripts')` before `</body>`.

- **Component Separation**:
  - `common/header.blade.php`: Header bar, contact info (`9843722055`), navigation menu, responsive toggler.
  - `common/footer.blade.php`: Footer widgets, address, copyright, quick links.
  - `welcome.blade.php`: Content sections structured in vertical flow.

---

## 4. CSS Hierarchy & Specificity

1. Vendor CSS (`bootstrap`, `animate`, `swiper`, `font-awesome`, `roofsie-icons`)
2. Core Theme CSS (`roofsie.css`)
3. Responsive CSS (`roofsie-responsive.css`)
4. Scoped Overrides (`welcome.blade.php` via `@push('styles')`):
   - Used for spacing fixes between adjacent sections (e.g., `.about-one` bottom padding 35px, `.services-three` top padding 40px).
