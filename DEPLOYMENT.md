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

## Repository-owned StoryDonkey pages

StoryDonkey routes are owned by the theme and do not depend on WordPress database placeholder pages:

- `/storydonkey/`
- `/storydonkey-privacy/`
- `/storydonkey-terms/`
- `/storydonkey-support/`

The canonical map is `sbd_theme_routes()` in `sbd-brutalist/functions.php`. A new repository-owned page requires:

1. Add its PHP template under `sbd-brutalist/`.
2. Add its approved slug and template to `sbd_theme_routes()`.
3. Add its expected text to the production smoke test.
4. Open a PR.
5. Merge to `main`.
6. Treat deployment as successful only when the public smoke test passes.

The workflow writes a non-secret deployment marker containing the commit SHA and timestamp. The theme exposes that marker as a safe HTML meta value so smoke tests prove which commit production is serving.

## Legacy WordPress pages

The theme still creates older site pages such as `/app/`, `/contact/`, `/privacy/`, `/terms/`, `/user-guide/`, and `/pizza-chicken-pop-support/` when needed. Creation checks `wp_insert_post()` errors and does not mark the migration complete after a failure. StoryDonkey routes are not part of this database migration.

## Explicit prohibitions

- Do not change the FTP host, `FTP_DEST`, credentials, or deployment architecture for an ordinary page.
- Do not create repository-owned StoryDonkey pages in WordPress Admin.
- Do not add another page-creation version bump to retry a StoryDonkey route.
- Do not add parallel rewrite, query-var, template, or alias workarounds.
- Do not declare success because FTP returned success; verify the public URL and expected body text.
- Do not treat a homepage curl response as proof that LiteSpeed was purged. Smoke tests use commit-specific query strings and document the purge limitation.
- Do not push directly to `main`; use a PR unless the owner explicitly instructs otherwise.
