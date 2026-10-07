# Production deployment

This repository is the source of truth for the theme-driven WordPress site.

```text
sbd-brutalist/
      ↓
push/merge to main
      ↓
.github/workflows/deploy-theme-ftp.yml
      ↓
Hostinger FTP: 157.173.208.128
      ↓
FTP_DEST (remote active theme directory)
      ↓
active WordPress theme
      ↓
public production smoke tests
```

The workflow deploys the contents of `sbd-brutalist/` with `lftp mirror --reverse --continue --dereference --ignore-time`. The fixed FTP IP is intentional: the historical hostname failed DNS resolution. `FTP_DEST` is a GitHub Actions secret whose value is not stored in this repository; it must point to the active WordPress theme directory relative to the FTP account root. Do not guess or rewrite it.

`public-root/` is a separate deployment path for root files such as `app-ads.txt`. Its `FTP_SITE_ROOT` secret is separate from `FTP_DEST`.

## New repository-controlled WordPress pages

WordPress holds only a published routing placeholder. Page content and design remain in the repository. The normal architecture is:

```text
published WordPress page
        ↓
WordPress resolves the canonical slug
        ↓
page-{slug}.php
```

For a new page:

1. Choose the canonical slug.
2. Add the slug/title to `sbd_get_required_pages()` in `sbd-brutalist/functions.php`.
3. Create `page-{slug}.php` in `sbd-brutalist/`.
4. Bump the required-page migration version once.
5. Add the public URL and expected content to the production smoke tests.
6. Open a PR.
7. WordPress creates the published placeholder during the checked migration.
8. Normal WordPress template hierarchy selects `page-{slug}.php`.
9. Treat deployment as successful only when the public smoke test passes.

Agents must not create the page manually in WordPress Admin or build custom rewrite, query-var, template-router, direct-include, or URL-alias workarounds for ordinary repository-controlled pages.

The StoryDonkey smoke tests cover:

- `/storydonkey/` → `StoryDonkey`
- `/storydonkey-privacy/` → `StoryDonkey Privacy Policy`
- `/storydonkey-terms/` → `StoryDonkey Terms of Use`
- `/storydonkey-support/` → `StoryDonkey Support`

The workflow writes a non-secret deployment marker containing the commit SHA and timestamp. The theme exposes that marker as a safe HTML meta value so smoke tests prove which commit production is serving.

## Legacy WordPress pages

The theme still creates older site pages such as `/app/`, `/contact/`, `/privacy/`, `/terms/`, `/user-guide/`, and `/pizza-chicken-pop-support/` when needed. Creation checks `wp_insert_post()` errors and does not mark the migration complete after a failure.

## Explicit prohibitions

- Do not change the FTP host, `FTP_DEST`, credentials, or deployment architecture for an ordinary page.
- Do not create repository-controlled pages in WordPress Admin.
- Do not add parallel rewrite, query-var, template, or alias workarounds.
- Do not declare success because FTP returned success; verify every public URL and expected body text.
- Do not push directly to `main`; use a PR unless the owner explicitly instructs otherwise.
