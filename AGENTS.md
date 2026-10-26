# WEFIX Project Rules & Guidelines

## 1. Fast Navigation & Read-Minimum Strategy
* **Consult `docs/ai/PROJECT_MAP.md` FIRST**: Never scan or grep the entire repository. Locate exact file paths, component mappings, and route handlers directly from the project map.
* **Inspect only necessary lines**: Use slice notation (`StartLine`, `EndLine`) when viewing files.
* **Reuse AI documentation**: Check `docs/ai/ARCHITECTURE.md`, `docs/ai/DECISIONS.md`, and `docs/ai/WORKFLOW.md` before re-analyzing patterns.

---

## 2. Directory Structure & File Modification Policy
* **`theme/` Folder (STRICT READ-ONLY)**:
  * Contains reference static HTML templates (e.g., `roofsie-html`).
  * **DO NOT** edit, overwrite, modify, rename, or delete ANY file or directory within `theme/`.
  * Only read and copy needed code, CSS, JS, fonts, and assets from `theme/` into `project/`.

* **`project/` Folder (Active Development & Backup Protocol)**:
  * This is where all active development, builds, and files are created.
  * **Creation**: Safe to create new files as needed.
  * **Update & Delete**: Before updating or deleting existing files in `project/`, **ALWAYS perform a Git backup** (`git add project/; git commit -m "backup: pre-change checkpoint"`).

---

## 3. UI Change & Testing Protocol
* **Brand Identity**:
  * Company: WEFIX | Phone: 9843722055 | Slug: Fabrication, Structural works
  * Address: 8/2,3-B1, Padma Nagar, Aruvankattanur, Manmangalam, Karur 639006
* **Visual & Functional Verification**:
  * Run `php artisan view:clear` after editing Blade views.
  * Verify UI changes in browser at `http://localhost/vichu/wefix/project/` using `browser_subagent`.
  * Check mobile, tablet, and desktop views.
  * Never push untested UI changes.

---

## 4. Git Version Control Policy
* Maintain regular commits with clear messages.
* Remote: `https://github.com/vishnupriyangamer003-rgb/wefix.git` (`main` branch).
