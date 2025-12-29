Here is the full, clean README you can drop into the root of the repo (e.g. README.md).
It is written as an agent contract + operating manual.
No code blocks, no formatting tricks, copy-paste safe.

⸻

SavagesByDesign.com — Repo-Driven Website (FTP Theme Mode)

Purpose
This repository is the single source of truth for the Savages By Design public website.
The site runs on WordPress, but WordPress is used strictly as a rendering engine.
All layout, structure, copy, and assets are driven from this repository and deployed via FTP.

The WordPress UI is not used for page creation, layout, or content editing.

⸻

Operating Mode (Hard Rules)
	1.	The site is theme-driven, not content-editor driven.
	2.	The repository controls what appears on the site.
	3.	No WordPress page builders, block editor layouts, or Astra-style templates.
	4.	No “paste this into WordPress” instructions.
	5.	No JWT / REST / database content syncing unless explicitly requested.
	6.	Images are deployed with the theme via FTP, not uploaded through the Media Library.

If a task requires the WordPress UI, that task must be explicitly approved first.

⸻

High-Level Architecture

• Hosting: Hostinger
• CMS Runtime: WordPress
• Active Theme: sbd-brutalist
• Deployment: GitHub Actions → FTP
• Cache Layer: LiteSpeed (must be purged after theme changes)

WordPress stores minimal placeholder pages for routing only.
All visible content is rendered from PHP templates in the theme.

⸻

Deployment Pipeline

• Theme source lives in the repo under:
sbd-brutalist/

• GitHub Action deploys the theme folder via FTP to:
wp-content/themes/sbd-brutalist

• FTP user is rooted at:
/domains/savagesbydesign.com/public_html

When changes are pushed to main:
	1.	GitHub Actions deploys the theme via FTP
	2.	WordPress immediately serves the updated templates
	3.	LiteSpeed cache may need to be purged to see changes

⸻

Caching Rule (Critical)

Hostinger/LiteSpeed aggressively caches theme files.

After any change to:
• PHP templates
• CSS
• Images

You must purge cache:
WordPress Admin → LiteSpeed Cache → Toolbox → Purge All
Then refresh in a private/incognito browser tab.

Failure to purge cache will make it appear as if changes “did nothing”.

⸻

Repo Structure (Source of Truth)

sbd-brutalist/
• style.css — theme header + all styling
• functions.php — enqueue CSS, theme behavior, auto page creation
• header.php — site header + navigation
• footer.php — site footer
• front-page.php — homepage (fully template-driven)
• page-*.php — slug-specific page templates
• assets/
• img/ — all site images (logos, heroes, screenshots)

No content lives in the WordPress editor.

⸻

Page Creation & Routing (Zero WP UI)

All required pages are auto-created by the theme.

The theme is responsible for ensuring the following routes exist:

• / (homepage)
• /app
• /offerings
• /guides
• /reviews
• /deals
• /contact

These pages are created and published automatically by theme code when the theme is activated.

WordPress pages act only as routing placeholders.
They may contain empty content in the editor.

The agent must never instruct the user to create or edit pages in WordPress Admin.

⸻

How Pages Are Implemented

Pages are implemented using WordPress template hierarchy.

Template mapping:

Homepage
• front-page.php

Slug-based pages
• page-app.php → /app
• page-offerings.php → /offerings
• page-guides.php → /guides
• page-reviews.php → /reviews
• page-deals.php → /deals
• page-contact.php → /contact

If a template file exists, it controls the entire page output.
WordPress editor content is ignored.

When asked to “add a page” or “change page content”, the agent must modify or create the appropriate PHP template.

⸻

Images (Best Practice)

All images are stored in the theme and deployed via FTP.

Images live in:
sbd-brutalist/assets/img/

Examples:
• brand logos
• hero images
• screenshots
• marketing visuals

Images are referenced using theme paths, not Media Library URLs.

Canonical image URL format:
/wp-content/themes/sbd-brutalist/assets/img/filename.ext

Do not upload images through the WordPress Media Library unless explicitly requested.

⸻

Navigation

Navigation is hard-coded in:
sbd-brutalist/header.php

No WordPress menus are used unless explicitly requested.

If navigation changes are requested:
• Modify header.php
• Adjust CSS if needed

⸻

Styling Rules

All styling lives in:
sbd-brutalist/style.css

Guidelines:
• High-contrast, brutalist aesthetic
• Minimal abstraction
• No frameworks or UI kits
• Typography and spacing over decoration

If new sections are added, corresponding CSS should be added deliberately.

⸻

Forbidden Actions (Failure Conditions)

The agent must not:

• Use the WordPress editor for layouts or content
• Generate “paste this into WordPress” blocks
• Create pages via REST or JWT
• Upload images via Media Library
• Enable Astra, block themes, or starter templates
• Leave behind draft pages or numbered slugs (app-2, app-3, etc.)

Any task that results in duplicate pages or WP UI dependency is considered incorrect.

⸻

Cleanup Policy

If duplicates or drafts exist in WordPress:
• They are legacy artifacts
• The repo remains the source of truth
• Cleanup should be minimal and one-time

The agent should prevent new duplicates rather than constantly cleaning old ones.

⸻

Definition of Done (Every Task)

A task is complete only when:
	1.	Changes are implemented in the repo
	2.	Code is committed to main
	3.	GitHub Action deploys successfully
	4.	Cache is purged if needed
	5.	The live site reflects the change

If the site does not change:
• Assume caching first
• Then verify correct template file
• Then verify correct deploy path

⸻

Mental Model Summary

• WordPress = renderer + router
• Theme = application
• Repo = source of truth
• FTP deploy = release mechanism
• WP UI = ignored after activation

⸻

End of README.

⸻

If you want next, I can:
• generate the full page-app.php and page-offerings.php templates
• harden the auto-page-creation logic description
• add a one-paragraph Copilot “preamble” so it never tries JWT again
• design a repeatable pattern for new marketing pages

Just say what’s next.