# Deployment Reference

## Critical Rule: Always Publish, Never Draft

**All pages and content deployed through the brutalist theme pipeline must be published.**

This repository operates under a strict **publish-only** policy. Pages are never created or deployed in draft status.

---

## Deployment Pipeline Overview

The site uses a **theme-driven FTP deployment pipeline** via GitHub Actions.

### How It Works

1. **Source of Truth:** All content lives in this repository under `sbd-brutalist/`
2. **Trigger:** Push to `main` branch with changes to `sbd-brutalist/**`
3. **Action:** `.github/workflows/deploy-theme-ftp.yml` deploys via FTP
4. **Target:** Hostinger WordPress installation at `wp-content/themes/sbd-brutalist`
5. **Status:** All pages are created with `post_status => 'publish'`

### GitHub Actions Workflow

**File:** `.github/workflows/deploy-theme-ftp.yml`

```yaml
on:
  push:
    branches: ["main"]
    paths:
      - "sbd-brutalist/**"
      - ".github/workflows/deploy-theme-ftp.yml"
```

**Deployment Method:** FTP (sebastianpopp/ftp-action@v2.0.0)

---

## Page Creation: Publish Only

Pages are automatically created by the theme on activation.

**File:** `sbd-brutalist/functions.php`

**Function:** `sbd_create_required_pages()`

**Critical Line:**
```php
'post_status' => 'publish',  // ALWAYS publish, NEVER draft
```

### Pages Created on Theme Activation

All pages are created with published status:

- `/app` (App)
- `/offerings` (Offerings)
- `/guides` (Guides)
- `/reviews` (Reviews)
- `/deals` (Deals)
- `/contact` (Contact)
- `/privacy` (Privacy Policy)
- `/terms` (Terms of Service)
- `/user-guide` (User Guide)

---

## Why Publish-Only?

1. **Theme-Driven Architecture:** WordPress is used as a renderer, not a content editor
2. **Template Hierarchy:** Page templates (`page-*.php`) control all visible content
3. **No WP UI Dependency:** Pages are routing placeholders only
4. **Single Source of Truth:** The repository controls what's live
5. **FTP Deploy = Live Deploy:** When code hits production, it goes live

---

## Deployment Checklist

When deploying changes:

- [ ] Edit files in `sbd-brutalist/` directory
- [ ] Commit and push to `main` branch
- [ ] GitHub Actions deploys via FTP automatically
- [ ] Purge LiteSpeed cache: **WordPress Admin → LiteSpeed Cache → Toolbox → Purge All**
- [ ] Verify changes in private/incognito browser window
- [ ] Confirm pages are **published** (not draft)

---

## Forbidden: Draft Status

**Do not create pages in draft status.**

The following are violations of the deployment pipeline:

- ❌ Creating pages with `'post_status' => 'draft'`
- ❌ Using WordPress UI to create draft pages
- ❌ Using REST/JWT API to sync draft content
- ❌ Deploying content that isn't immediately visible

**If a page exists in draft status, it is legacy/cleanup and must be published or deleted.**

---

## Post-Deployment Cache Purge

**Critical:** Hostinger/LiteSpeed caches aggressively.

After ANY deployment:

1. Login to WordPress Admin
2. Navigate to **LiteSpeed Cache → Toolbox → Purge All**
3. Open site in private/incognito browser
4. Verify changes are visible

**Failure to purge cache will make it appear as if deployment failed.**

---

## Workflow Files

### Active Deployment Workflow

**File:** `.github/workflows/deploy-theme-ftp.yml`
- **Trigger:** Push to `main` with `sbd-brutalist/**` changes
- **Action:** FTP deploy to production
- **Status:** Active and operational

### Disabled Workflow (Reference Only)

**File:** `.github/workflows/wp-sync.yml`
- **Status:** Disabled (workflow_dispatch only)
- **Purpose:** JWT content sync (not used in theme-driven mode)
- **Note:** Theme-driven FTP deployment is the only active pipeline

---

## Mental Model

```
Repository (sbd-brutalist/) 
    ↓
Push to main
    ↓
GitHub Actions (deploy-theme-ftp.yml)
    ↓
FTP Upload to Production
    ↓
WordPress Serves Templates
    ↓
ALL PAGES ARE PUBLISHED
```

---

## Quick Reference

| Aspect | Value |
|--------|-------|
| Deployment Method | FTP via GitHub Actions |
| Trigger | Push to `main` with theme changes |
| Theme Directory | `sbd-brutalist/` |
| Target Location | `wp-content/themes/sbd-brutalist` |
| Page Status | **Always `publish`** |
| Cache | Must purge after deploy |
| Source of Truth | This repository |

---

## Summary

**Remember:** This pipeline deploys directly to production with published status.

There is no staging, no draft mode, no preview environment.

**When you push to main, it goes live as published.**

Plan accordingly.
