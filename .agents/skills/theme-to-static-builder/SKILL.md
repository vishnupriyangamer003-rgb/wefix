---
name: theme-to-static-builder
description: >-
  Builds a new static website inside the project directory using template components and assets from the theme directory without modifying the original theme files.
---

# Theme to Static Website Builder

Use this skill to extract, adapt, and build clean, modern static websites in `project/` from the reference template files in `theme/`.

## Core Principles

1. **`theme/` is Strictly Read-Only**: Never edit, delete, or overwrite files inside `theme/`.
2. **`project/` is the Target**: All created pages, copied CSS/JS/images, and assets must live under `project/`.
3. **Backup Before Modifying**: Before modifying or deleting existing files in `project/`, ensure a Git commit or backup checkpoint is created.

---

## Step-by-Step Workflow

### Step 1: Inspect Theme & Plan Structure
* Examine reference templates in `theme/` (e.g. `roofsie-html/`).
* Identify necessary stylesheets, fonts, JavaScript libraries, and icon packs.
* Reference business details from `project/companyinfo.txt`:
  * **Company Name**: WEFIX
  * **Phone**: 9843722055
  * **Tagline / Slug**: Fabrication, Structural works
  * **Address**: 8/2,3-B1, Padma Nagar, Aruvankattanur, Manmangalam. Karur. 639006.
  * **Logo**: `project/logo.jpeg`

### Step 2: Copy Required Assets
* Copy needed CSS, JS, fonts, and images from `theme/` into `project/assets/` (e.g., `project/assets/css`, `project/assets/js`, `project/assets/images`).
* **Do NOT** copy unnecessary junk or duplicate full bloated archives.
* Do not touch `theme/`.

### Step 3: Construct Pages
* Build static HTML pages inside `project/` (e.g., `index.html`, `about.html`, `services.html`, `contact.html`).
* Keep HTML semantic, clean, and accessible.
* Inject WEFIX branding, contact info, working hours, services (Fabrication, Roofing, Structural works).
* Ensure relative asset links (`assets/css/...`, `assets/js/...`, `assets/images/...`) resolve correctly.

### Step 4: Detail Testing & QA (Mandatory)
Before finalizing any UI:
1. **Responsive Test**: Inspect desktop, tablet (768px), and mobile (375px) layouts.
2. **Interactive Elements**: Check navigation bar toggle, dropdowns, contact links, and buttons.
3. **Asset Verification**: Ensure zero 404s for images, styles, fonts, and scripts.
4. **Content Check**: Ensure phone numbers click-to-call (`tel:9843722055`) and addresses are formatted properly.
