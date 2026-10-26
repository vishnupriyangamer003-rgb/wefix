# WEFIX Project Rules & Guidelines

## 1. Directory Structure & File Modification Policy
* **`theme/` Folder (STRICT READ-ONLY)**:
  * Contains source theme files, templates, and reference assets (e.g., `roofsie-html`).
  * **DO NOT** edit, overwrite, modify, rename, or delete ANY file or directory within `theme/`.
  * Only read and copy needed code, CSS, JS, fonts, and assets from `theme/` into `project/`.

* **`project/` Folder (Active Development & Backup Protocol)**:
  * This is where all active development, builds, and files are created.
  * **Creation**: Safe to create new files as needed.
  * **Update & Delete**: Before updating or deleting existing files in `project/`, **ALWAYS perform a Git backup** (commit changes or create a backup checkpoint) to prevent accidental data loss.

---

## 2. UI Change & Testing Protocol
* **Detail Test Before & After**:
  * Before beginning any UI changes or implementation, plan and verify requirements thoroughly against company branding (`companyinfo.txt`, `logo.jpeg`) and theme specifications.
  * Conduct detailed visual, functional, and responsive testing:
    * Check mobile, tablet, and desktop views.
    * Verify asset links, images, styling, and navigation links.
    * Ensure interactive elements work smoothly without console errors.
  * Never push untested UI changes.

---

## 3. Git Version Control Policy
* Maintain regular commits with clear messages.
* Remote repository: `https://github.com/vishnupriyangamer003-rgb/wefix.git` (main branch).
* Always back up the current state of `project/` before applying destructive refactors or file deletions.
