# Static migration audit

Audit date: 2026-10-08

This audit is non-destructive. No WordPress records, production files, deployment secrets, or production routing were changed.

## Public route inventory

| Production URL | Current source / evidence | Dynamic dependencies | Migration action |
|---|---|---|---|
| `/` | `sbd-brutalist/front-page.php` | WordPress header/footer, theme asset URLs | Static page source + shared partials |
| `/app/` | `sbd-brutalist/page-app.php` | WordPress header/footer, theme asset URLs | Static page source + copied assets |
| `/offerings/` | `sbd-brutalist/page-offerings.php` | WordPress header/footer | Static page source |
| `/guides/` | `sbd-brutalist/page-guides.php` | WordPress header/footer | Static page source |
| `/reviews/` | `sbd-brutalist/page-reviews.php` | WordPress header/footer | Static page source |
| `/deals/` | `sbd-brutalist/page-deals.php` | WordPress header/footer | Static page source |
| `/contact/` | `sbd-brutalist/page-contact.php` | WordPress header/footer | Static page source |
| `/privacy/` | `sbd-brutalist/page-privacy.php` | WordPress header/footer | Static page source |
| `/terms/` | `sbd-brutalist/page-terms.php` | WordPress header/footer | Static page source |
| `/user-guide/` | WordPress page record; no `page-user-guide.php` exists; canonical content in `content/user-guide.md` | Current production fetch returns only the shared footer, while the repository contains the full guide body | Canonical guide body migrated into static source; metadata/visual parity remains to verify |
| `/pizza-chicken-pop-support/` | `sbd-brutalist/page-pizza-chicken-pop-support.php` | WordPress header/footer | Static page source |
| `/storydonkey/` | `sbd-brutalist/page-storydonkey.php` | Signup POST, nonce/token, lead CPT, email, WordPress asset URLs | Static page source; signup backend remains a blocker |
| `/storydonkey-privacy/` | `sbd-brutalist/page-storydonkey-privacy.php` | WordPress header/footer | Static page source |
| `/storydonkey-terms/` | `sbd-brutalist/page-storydonkey-terms.php` | WordPress header/footer | Static page source |
| `/storydonkey-support/` | `sbd-brutalist/page-storydonkey-support.php` | WordPress header/footer | Static page source |
| `/app-ads.txt` | `public-root/app-ads.txt`; WordPress also has an interception in `functions.php` | None in static file | Copy exact file to `dist/app-ads.txt` |

Live audit observed HTTP 200 for all requested routes and `text/plain` for `/app-ads.txt` on 2026-10-08. The three StoryDonkey legal routes returned only the shared footer text through the current production fetch, so their production content needs a later smoke/visual investigation.

## Repository inventory

- Theme rendering: `sbd-brutalist/front-page.php`, `page-*.php`, `header.php`, `footer.php`, `style.css`.
- Shared template part: `sbd-brutalist/template-parts/brand-wheel.php`.
- Theme assets: `sbd-brutalist/assets/` and `sbd-brutalist/template-parts/`.
- Root verification file: `public-root/app-ads.txt`.
- Deployment: `.github/workflows/deploy-theme-ftp.yml`, `.github/workflows/deploy-root-files-ftp.yml`.
- Existing PHP syntax workflow: `.github/workflows/pr-validation.yml`.
- Legacy content/reference material: `content/`, `README.md`, and `Templates/`.
- `page-appold.php` exists as a legacy template but is not in the required-page manifest and has no identified public route.

## WordPress dependency inventory

| Usage | Classification | Static foundation treatment |
|---|---|---|
| `get_header`, `get_footer`, `wp_head`, `wp_footer`, `body_class` | Rendering/layout | Replaced by build-time shared HTML partials and a route body-class map |
| `get_template_directory_uri`, `get_stylesheet_directory_uri` | Asset loading | Rewritten to stable `/assets/...` URLs |
| `wp_enqueue_style`, `get_stylesheet_uri`, `filemtime` | Asset loading | Build copies `style.css` to `/assets/style.css` |
| `wp_head` deployment marker | Metadata/deployment | Build injects `sbd-deployment` from `GITHUB_SHA` or local fallback |
| `admin_post_*`, `wp_nonce`, `wp_verify_nonce`, `wp_mail` | StoryDonkey form handling | Not reimplemented in this foundation; replacement backend is a separate blocker |
| `register_post_type`, `wp_insert_post` | Lead persistence/page migration | Remains WordPress-only until signup replacement and final retirement phases |
| `home_url`, redirects | Routing/form success | Static internal links are root-relative; signup redirect behavior awaits backend replacement |

## Proposed static structure

```text
site-src/
  partials/header.html
  partials/footer.html
  pages/*.html
scripts/build-site.mjs
scripts/validate-site.mjs
dist/                         # generated, not committed
package.json
```

The foundation intentionally does not change production deployment or remove WordPress. It only adds a reproducible local build and validation path for future staging work.

## Remaining blockers

1. Replace StoryDonkey signup persistence/notification with an approved HTTPS backend before staging or production cutover.
2. Confirm complete metadata parity (titles, descriptions, canonical/OG/Twitter tags) from rendered production before cutover.
3. Determine the Hostinger document root and provision a staging location without touching production.
4. Add staging upload, route smoke tests, link crawl, and visual comparison after the static output is accepted locally.
