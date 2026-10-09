# Production deployment

The repository contains both the legacy WordPress theme deployment and the
validated static site. The manual static production cutover is the path for
retiring WordPress without changing DNS.

## Static production cutover

Run **Cut Over Production to Static Site** manually with the input `CUTOVER`.
The workflow builds and validates all 15 static routes, uploads `dist/` to the
verified `FTP_SITE_ROOT` (`/public_html`), replaces the active WordPress
`.htaccess` with the static routing guard, and smoke-tests every public route.
It does not delete the old WordPress files, preserving a rollback path while
the owner confirms the cutover. Once production is verified, the old WordPress
files and database can be archived or removed separately.

The static build serves route directories directly through `index.html`; it
does not require PHP, WordPress, a database, or a deployment token.

## Legacy WordPress deployment

Until the static cutover is verified, this remains the source of truth for the
theme-driven WordPress site:

```text
`sbd_get_required_pages()` manifest
        ↓
idempotent reconciliation ensures the page record and exact `post_name`
        ↓
repository contains `page-{slug}.php`
        ↓
WordPress normal template hierarchy selects `page-{slug}.php`
        ↓
GitHub Actions theme deployment
        ↓
FTP theme upload
        ↓
byte verification
        ↓
public smoke tests
```

WordPress owns the page record and canonical slug. Git owns the content and design. The required-page manifest guarantees that each declared page record exists with its intended slug; existing records are preserved by `get_page_by_path($slug)`. No deployment token is required for ordinary page deployment.

## Deployment configuration

The workflow deploys the contents of `sbd-brutalist/` with `lftp mirror --reverse --continue --dereference --ignore-time`. The fixed FTP IP is intentional: the historical hostname failed DNS resolution. `FTP_DEST` is a GitHub Actions secret whose value is not stored in this repository; it must point to the active WordPress theme directory relative to the FTP account root. Do not guess or rewrite it.

`public-root/` is a separate deployment path for root files such as `app-ads.txt`. Its `FTP_SITE_ROOT` secret is separate from `FTP_DEST`.

## Repo-controlled WordPress pages

For a new page:

1. Add the exact slug and title to `sbd_get_required_pages()`.
2. Create or update `sbd-brutalist/page-{slug}.php`.
3. Keep all content and design in that repository template.
4. Bump the required-pages migration version so reconciliation runs after deployment.
5. Add the public URL and expected text to production smoke tests.
6. Open a focused PR.
7. Deployment uploads and byte-verifies the template.
8. WordPress normal template hierarchy selects the template from the exact slug.
9. Deployment is successful only when the public smoke test passes.

Do not invent slugs, manually assign templates, add custom routing, add URL aliases, add direct template includes, or add deployment bootstrap endpoints for ordinary pages. Do not delete, trash, rename, recreate, or modify existing required WordPress records from PHP.

The StoryDonkey manifest entries are:

- `storydonkey`
- `storydonkey-privacy`
- `storydonkey-terms`
- `storydonkey-support`

The corresponding repository templates are:

- `sbd-brutalist/page-storydonkey.php`
- `sbd-brutalist/page-storydonkey-privacy.php`
- `sbd-brutalist/page-storydonkey-terms.php`
- `sbd-brutalist/page-storydonkey-support.php`

StoryDonkey legal templates must not contain `Template Name` or `Template Post Type` headers. WordPress selects all four templates through the normal slug hierarchy.

## Deployment lifecycle

The production workflow runs these steps in order:

1. Check out the commit.
2. Write the non-secret deployment marker.
3. Upload the theme over FTP.
4. Verify required remote files exist.
5. Verify deployed bytes match the checkout.
6. Run public GET smoke tests requiring HTTP 200, expected text, and the exact deployed commit SHA.

The workflow does not call a deployment endpoint, require an authentication token, or purge LiteSpeed. Required-page reconciliation runs through the existing theme code and ordinary template updates continue through normal theme deployment and smoke tests.

The workflow writes a non-secret deployment marker containing the commit SHA and timestamp. The theme exposes that marker as a safe HTML meta value so smoke tests prove which commit production is serving.

## Required-page migration

The theme reconciles every entry in `sbd_get_required_pages()`, including older site pages such as `/app/`, `/contact/`, `/privacy/`, `/terms/`, `/user-guide/`, `/pizza-chicken-pop-support/`, and the four StoryDonkey pages. The existing `get_page_by_path($slug)` guard preserves any matching WordPress record and the existing `wp_insert_post()` logic creates only missing records.

## Explicit prohibitions

- Do not change the FTP host, `FTP_DEST`, credentials, or deployment architecture for an ordinary page.
- Do not invent slugs.
- Do not add parallel rewrite, query-var, template, or alias workarounds.
- Do not add deployment bootstrap endpoints or deployment tokens for page creation.
- Do not purge LiteSpeed from deployment code.
- Do not declare success because FTP returned success; verify every public URL and expected body text.
- Do not push directly to `main`; use a PR unless the owner explicitly instructs otherwise.
