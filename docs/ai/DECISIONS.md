# Architectural & Technical Decisions Log

This document records key decisions made in this repository, the rationale behind them, and how they affect the codebase.

---

## 1. Split Logo Implementation
- **Problem**: The template provided a white/light logo badge, but WEFIX's brand identity required a dark badge with the company logo prominently visible.
- **Decision**: In `resources/views/common/header.blade.php`, the background badge was given a sleek dark slate background (`#171c26`), and `project/logo.png` was layered over it with an SVG roof silhouette.
- **Impact**: Clean contrast against both light header bars and sticky navigation without distorting the company logo.

---

## 2. Disabling Template Custom Cursor
- **Problem**: The theme included a floating circular cursor dot (`.custom-cursor__cursor`, `.custom-cursor__cursor-two`) that lagged on desktop and interfered with screenshots and normal interaction.
- **Decision**: Added `display: none !important` and reset `body.custom-cursor` to `cursor: auto !important` in the global CSS header.
- **Impact**: Native cursor behavior restored, eliminating visual jitter and browser automation artifacts.

---

## 3. Desktop Mobile Hamburger Menu Fix
- **Problem**: The mobile menu toggle button (`.mobile-nav__toggler`) was inadvertently visible on desktop viewports.
- **Decision**: Added `@media (min-width: 992px) { .mobile-nav__toggler { display: none !important; } }`.
- **Impact**: Mobile toggle is strictly limited to mobile/tablet devices (<992px).

---

## 4. Vertical Section Spacing Optimization
- **Problem**: Default theme padding on `.about-one` (`120px` bottom) and `.services-three` (`120px` top) created a combined 240px gap, leaving massive blank space between About Us and Services.
- **Decision**: Added `@push('styles')` in `welcome.blade.php` setting `.about-one { padding-bottom: 35px !important; }` and `.services-three { padding-top: 40px !important; }`.
- **Impact**: Total gap reduced from 240px to 75px, making the visual flow compact and cohesive.

---

## 5. Homepage Section Composition Order
- **Current Flow**:
  1. `main-slider-two` (Hero Slider - from `index2.html`)
  2. `feature-one` (Quality materials, Professional workers, Free estimates - from `index.html`)
  3. `about-one` (Experienced & quality roofing - from `about.html`)
  4. `services-three` (Single play, Modified, Built-up roofing - from `index3.html`)
  5. `why-choose-two` (Few reasons to choose our company - from `index2.html`)
