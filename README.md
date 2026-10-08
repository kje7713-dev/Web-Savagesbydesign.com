# SavagesByDesign.com — Repo-Driven Website (FTP Theme Mode)

## Purpose

This repository is the single source of truth for the Savages By Design public website.
The site runs on WordPress, but WordPress is used strictly as a rendering engine.
All layout, structure, copy, and assets are driven from this repository and deployed via FTP.

The WordPress UI is used to create and publish blank routing pages. Content and design remain in repository templates.

---

## Operating Mode (Hard Rules)

1. The site is theme-driven, not content-editor driven.
2. The repository controls what appears on the site.
3. No WordPress page builders, block editor layouts, or Astra-style templates.
4. No "paste this into WordPress" instructions.
5. No JWT / REST / database content syncing unless explicitly requested.
6. Images are deployed with the theme via FTP, not uploaded through the Media Library.

If a task requires the WordPress UI, that task must be explicitly approved first.

---

## High-Level Architecture

- **Hosting:** Hostinger
- **CMS Runtime:** WordPress
- **Active Theme:** sbd-brutalist
- **Deployment:** GitHub Actions → FTP
- **Cache Layer:** LiteSpeed (the owner may manually purge it after creating a page)

WordPress stores minimal placeholder pages for routing only.
All visible content is rendered from PHP templates in the theme.

---

## Deployment Pipeline

Theme source lives in the repo under:
```
sbd-brutalist/
```

GitHub Action deploys the theme folder via FTP to:
```
wp-content/themes/sbd-brutalist
```

FTP user is rooted at:
```
/domains/savagesbydesign.com/public_html
```

When changes are pushed to main:
1. GitHub Actions deploys the theme via FTP
2. The workflow verifies deployed bytes
3. Production smoke tests verify the public routes and deployment marker

---

## Caching Rule (Critical)

Hostinger/LiteSpeed aggressively caches theme files.

After manually creating a required WordPress page, the owner may purge cache once:
**WordPress Admin → LiteSpeed Cache → Toolbox → Purge All**

Ordinary theme deployments do not purge LiteSpeed automatically.

---

## Repo Structure (Source of Truth)

```
sbd-brutalist/
├── style.css           # Theme header + all styling
├── functions.php       # Enqueue CSS, theme behavior, beta signup, legacy migration
├── header.php          # Site header + navigation
├── footer.php          # Site footer
├── front-page.php      # Homepage (fully template-driven)
├── page-*.php          # Slug-specific page templates
├── index.php           # Fallback template
├── template-parts/     # Reusable template components
└── assets/
    └── img/            # All site images (logos, heroes, screenshots)
```

No content lives in the WordPress editor.

---

## Page Creation & Routing

The owner manually creates and publishes blank WordPress pages with canonical slugs. The repository supplies the content and design through normal WordPress template hierarchy.

WordPress pages act only as routing placeholders and may contain empty editor content. The owner creates and publishes the page record; the repository controls the rendered content and design. The agent must not auto-create pages, invent slugs, or add custom routing. The owner supplies the exact slug before the agent creates `page-{slug}.php`.

The required StoryDonkey page records are:

- `/storydonkey/` (already exists)
- `/storydonkey-privacy/`
- `/storydonkey-terms/`
- `/storydonkey-support/`

The owner manually creates the three missing pages with those exact slugs before production smoke tests can pass.

---

## How Pages Are Implemented

Pages are implemented using WordPress template hierarchy.

**Template mapping:**

| Page | Template File | URL |
|------|--------------|-----|
| Homepage | `front-page.php` | `/` |
| App | `page-app.php` | `/app` |
| Offerings | `page-offerings.php` | `/offerings` |
| Guides | `page-guides.php` | `/guides` |
| Reviews | `page-reviews.php` | `/reviews` |
| Deals | `page-deals.php` | `/deals` |
| Contact | `page-contact.php` | `/contact` |

If a template file exists, it controls the entire page output.
WordPress editor content is ignored.

When asked to "add a page" or "change page content", the agent must modify or create the appropriate PHP template.

---

## Images (Best Practice)

All images are stored in the theme and deployed via FTP.

Images live in:
```
sbd-brutalist/assets/img/
```

Examples:
- Brand logos
- Hero images
- Screenshots
- Marketing visuals

Images are referenced using theme paths, not Media Library URLs.

**Canonical image URL format:**
```
/wp-content/themes/sbd-brutalist/assets/img/filename.ext
```

Do not upload images through the WordPress Media Library unless explicitly requested.

---

## Navigation

Navigation is hard-coded in:
```
sbd-brutalist/header.php
```

No WordPress menus are used unless explicitly requested.

If navigation changes are requested:
- Modify `header.php`
- Adjust CSS if needed

---

## Styling Rules

All styling lives in:
```
sbd-brutalist/style.css
```

**Guidelines:**
- High-contrast, brutalist aesthetic
- Minimal abstraction
- No frameworks or UI kits
- Typography and spacing over decoration

If new sections are added, corresponding CSS should be added deliberately.

---

## Forbidden Actions (Failure Conditions)

The agent must not:

- Use the WordPress editor for layouts or content
- Generate "paste this into WordPress" blocks
- Create pages via REST or JWT
- Upload images via Media Library
- Enable Astra, block themes, or starter templates
- Leave behind draft pages or numbered slugs (app-2, app-3, etc.)

Any task that results in duplicate pages or WP UI dependency is considered incorrect.

---

## Cleanup Policy

If duplicates or drafts exist in WordPress:
- They are legacy artifacts
- The repo remains the source of truth
- Cleanup should be minimal and one-time

The agent should prevent new duplicates rather than constantly cleaning old ones.

---

## Definition of Done (Every Task)

A task is complete only when:
1. Changes are implemented in the repo
2. Code is committed to main
3. GitHub Action deploys successfully
4. Cache is purged if needed
5. The live site reflects the change

If the site does not change:
- Assume caching first
- Then verify correct template file
- Then verify correct deploy path

---

## Mental Model Summary

- **WordPress** = renderer + router
- **Theme** = application
- **Repo** = source of truth
- **FTP deploy** = release mechanism
- **WP UI** = ignored after activation

---

## Quick Start

### Making Changes

1. Edit files in the `sbd-brutalist/` directory
2. Commit and push to `main` branch
3. GitHub Actions automatically deploys via FTP
4. The workflow verifies deployed bytes and public smoke tests
5. Verify changes in a private browser window

### Repository Layout

```
sbd-brutalist/          # WordPress theme (deployed via FTP)
├── style.css           # Theme stylesheet with header metadata
├── functions.php       # Theme initialization, beta signup, and legacy migration
├── header.php          # Site header and navigation
├── footer.php          # Site footer
├── front-page.php      # Homepage template
├── page-*.php          # Page-specific templates
├── index.php           # Fallback template
├── template-parts/     # Reusable template components
└── assets/
    └── img/            # Site images and media

content/                # Content source files (reference/documentation)
Brand/                  # Brand guidelines and assets
Assets/                 # Shared assets
Templates/              # Template patterns for new pages
scripts/                # Utility scripts (maintenance)
```
