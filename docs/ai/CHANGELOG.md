# AI & Architectural Changelog

Records meaningful architectural updates, component integrations, and fixes.

---

### [2026-10-26] - Why Choose Us Integration
- **Commit**: `201502b`
- **File**: `project/main/resources/views/welcome.blade.php`
- **Details**: Sourced `why-choose-two` section from `theme/roofsie-html/main-html/index2.html`. Integrated dark pattern background (`why-choose-two-bg.jpg`), 4 feature bullets with hover icons (`icon-roof-2`, `icon-mission`, `icon-shield`, `icon-construction-worker`), and 3D circular popout graphic (`why-choose-two-img-1.jpg` + `why-choose-two-img-2.png`).

### [2026-10-26] - Section Spacing Optimization
- **Commit**: `037c7f1`
- **File**: `project/main/resources/views/welcome.blade.php`
- **Details**: Tightened padding between `.about-one` (35px bottom) and `.services-three` (40px top) eliminating 240px dead whitespace.

### [2026-10-26] - Services Three Integration
- **Commit**: `9f9e41f`
- **File**: `project/main/resources/views/welcome.blade.php`
- **Details**: Integrated `services-three` section from `index3.html` directly next to About Us. Includes 3 circular icon cards for Single play, Modified, and Built-up roofing with zoom hover effects.

### [2026-10-26] - About Us Integration
- **Commit**: `a5efb1c`
- **File**: `project/main/resources/views/welcome.blade.php`
- **Details**: Integrated `about-one` section with 98% animated satisfied customers counter, worker image, watermark, and bullet points.

### [2026-10-26] - Feature One Integration
- **Commit**: `ef5fa75`
- **File**: `project/main/resources/views/welcome.blade.php`
- **Details**: Added `feature-one` 3-card block for Quality materials, Professional workers, and Free estimates.

### [2026-10-26] - Slider Two Integration & Header Polishing
- **Commit**: `798679f`
- **Files**: `resources/views/common/header.blade.php`, `resources/views/welcome.blade.php`
- **Details**: Switched hero slider to `main-slider-two` from `index2.html` with zoom animations. Customized split logo with dark badge background and overlaid `project/logo.png`. Disabled cursor tracking circles and hid mobile nav hamburger on desktop.
