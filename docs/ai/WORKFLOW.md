# WEFIX Developer & AI Workflow Guide

## 1. Fast Command Reference

All Laravel commands must be executed within `project/main`:

```powershell
# Clear compiled views after Blade modifications
& "d:\xampp\php\php.exe" artisan view:clear

# Clear configuration / application cache
& "d:\xampp\php\php.exe" artisan config:clear
& "d:\xampp\php\php.exe" artisan cache:clear

# Start local Artisan development server (Port 8000)
& "d:\xampp\php\php.exe" artisan serve --port=8000
```

---

## 2. Mandatory Git Backup Protocol

Before performing any **UPDATE** or **DELETE** inside `project/`:

1. Run `git status` from workspace root `d:\xampp\htdocs\vichu\wefix`.
2. Ensure existing changes are staged and committed:
   ```powershell
   git add project/
   git commit -m "backup: pre-change checkpoint"
   ```
3. Make your code changes.
4. Test and verify in the browser.
5. Commit and push:
   ```powershell
   git add .
   git commit -m "<concise descriptive message>"
   git push origin main
   ```

---

## 3. Read-Minimum Strategy for AI Tasks

Follow this precise sequence to minimize token usage and unnecessary file reads:

1. **Step 1: Check `docs/ai/PROJECT_MAP.md`**:
   - Determine the exact file and component needed. Do NOT list or read entire directories.
2. **Step 2: Inspect only the target file slice**:
   - Use `view_file` with `StartLine` and `EndLine` to read only the section of interest.
   - Do NOT dump the entire file if you only need one section.
3. **Step 3: Check `theme/` only for new section HTML**:
   - Look up the source file in `docs/ai/PROJECT_MAP.md` (e.g., `index2.html` line numbers).
   - Read only the requested section.
4. **Step 4: Edit accurately**:
   - Use `replace_file_content` targeting small unique blocks.
5. **Step 5: Clear cache**:
   - Run `php artisan view:clear`.
6. **Step 6: Visual verification**:
   - Launch `browser_subagent` targeting `http://localhost/vichu/wefix/project/`.
   - Scroll to the section, capture screenshot, inspect with `view_file`.
7. **Step 7: Record and Commit**:
   - Update `docs/ai/CHANGELOG.md` with significant discoveries or decisions.
   - Commit and push to git.
