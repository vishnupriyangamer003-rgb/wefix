---
name: git-workflow
description: >-
  Standard Git procedures for the WEFIX workspace, including repository initialization, remote synchronization, branch management, and mandatory backup commits before updating or deleting project files.
---

# Git Workflow & Backup Procedures

Use this skill when initializing the repository, managing commits, syncing with remote origin, or executing the required backup routine before modifying project files.

## Remote Repository Details
* **Remote URL**: `https://github.com/vishnupriyangamer003-rgb/wefix.git`
* **Default Branch**: `main`

---

## 1. Initial Repository Setup
Run the following commands from the workspace root:

```bash
echo "# wefix" >> README.md
git init
git add README.md
git commit -m "first commit"
git branch -M main
git remote add origin https://github.com/vishnupriyangamer003-rgb/wefix.git
git push -u origin main
```

---

## 2. Mandatory Pre-Update / Pre-Delete Backup Protocol
Whenever you need to update or delete files inside `project/`:
1. Check working directory status:
   ```bash
   git status
   ```
2. Create a backup commit or stash:
   ```bash
   git add project/
   git commit -m "backup: pre-update checkpoint for project"
   ```
3. Proceed with the necessary update or delete operations.
4. If an unintended issue occurs, rollback using:
   ```bash
   git checkout HEAD~1 -- project/
   ```

---

## 3. Regular Commit & Push Routine
After implementing or testing features:
```bash
git add .
git commit -m "<concise descriptive message>"
git push origin main
```
