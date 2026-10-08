# Production deployment

This repository is the source of truth for the theme-driven WordPress site.

```text
WordPress Admin
      ↓
blank published page with canonical slug
      ↓
repository page-{slug}.php
      ↓
GitHub Actions theme deployment
      ↓
FTP theme upload
      ↓
byte verification
      ↓
public smoke tests
```

WordPress owns only the page record and canonical slug. Git owns the content and design. The site owner manually creates each WordPress page once; agents must not attempt to automate WordPress page creation. No deployment token is required for ordinary page deployment.

## Deployment configuration

The workflow deploys the contents of `sbd-brutalist/` with `lftp mirror --reverse --continue --dereference --ignore-time`. The fixed FTP IP is intentional: the historical hostname failed DNS resolution. `FTP_DEST` is a GitHub Actions secret whose value is not stored in this repository; it must point to the active WordPress theme directory relative to the FTP account root. Do not guess or rewrite it.

`public-root/` is a separate deployment path for root files such as `app-ads.txt`. Its `FTP_SITE_ROOT` secret is separate from `FTP_DEST`.

## New repository-controlled WordPress pages

The permanent page architecture is:

```text
site owner creates and publishes blank WordPress page
        ↓
exact canonical slug is known
        ↓
repository contains page-{slug}.php
        ↓
WordPress normal template hierarchy selects page-{slug}.php
```

For a new page:

1. The owner manually creates and publishes a blank WordPress page.
2. The owner gives the agent the exact canonical slug.
3. The agent creates or updates `sbd-brutalist/page-{slug}.php`.
4. The agent keeps all content and design in that repository template.
5. The agent adds the public URL and expected text to production smoke tests.
6. The agent opens a PR.
7. Deployment uploads and byte-verifies the template.
8. WordPress normal template hierarchy selects the template.
9. Deployment is successful only when the public smoke test passes.

Do not auto-create WordPress pages, invent slugs, add custom routing, or add deployment endpoints for page creation. Do not declare production success until the owner has created the required WordPress page records and the public smoke tests pass.

The required StoryDonkey page records are manually-created blank pages with these exact slugs:

- `storydonkey` (already exists)
- `storydonkey-privacy`
- `storydonkey-terms`
- `storydonkey-support`

The corresponding repository templates are:

- `sbd-brutalist/page-storydonkey.php`
- `sbd-brutalist/page-storydonkey-privacy.php`
- `sbd-brutalist/page-storydonkey-terms.php`
- `sbd-brutalist/page-storydonkey-support.php`

## Deployment lifecycle

The production workflow runs these steps in order:

1. Check out the commit.
2. Write the non-secret deployment marker.
3. Upload the theme over FTP.
4. Verify required remote files exist.
5. Verify deployed bytes match the checkout.
6. Run public GET smoke tests requiring HTTP 200, expected text, and the exact deployed commit SHA.

The workflow does not create WordPress pages, call a deployment endpoint, require an authentication token, or purge LiteSpeed. After manually creating the required WordPress page records, the owner may manually purge LiteSpeed once if needed. Ordinary template updates continue through normal theme deployment and smoke tests.

The workflow writes a non-secret deployment marker containing the commit SHA and timestamp. The theme exposes that marker as a safe HTML meta value so smoke tests prove which commit production is serving.

## Legacy WordPress pages

The theme still creates older site pages such as `/app/`, `/contact/`, `/privacy/`, `/terms/`, `/user-guide/`, and `/pizza-chicken-pop-support/` when needed through the existing legacy migration. That mechanism is separate from StoryDonkey pages and must not be extended for new manually-created StoryDonkey pages.

## Explicit prohibitions

- Do not change the FTP host, `FTP_DEST`, credentials, or deployment architecture for an ordinary page.
- Do not automate creation of the required StoryDonkey WordPress page records.
- Do not invent slugs.
- Do not add parallel rewrite, query-var, template, or alias workarounds.
- Do not add deployment bootstrap endpoints or deployment tokens for page creation.
- Do not purge LiteSpeed from deployment code.
- Do not declare success because FTP returned success; verify every public URL and expected body text.
- Do not push directly to `main`; use a PR unless the owner explicitly instructs otherwise.
