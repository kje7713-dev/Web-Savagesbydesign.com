# Repository instructions

## Repo-controlled WordPress pages

1. Declare required pages in `sbd_get_required_pages()` in `sbd-brutalist/functions.php`.
2. The existing idempotent reconciliation guarantees that each manifest entry has a WordPress page record with the intended slug; it leaves an existing record alone when `get_page_by_path($slug)` finds it.
3. Keep page content and design in `sbd-brutalist/page-{slug}.php`.
4. Let WordPress's normal page template hierarchy select `page-{slug}.php` from the exact `post_name`.
5. Add every public URL and expected text to the production smoke tests.
6. Open a focused PR; deployment uploads and verifies the template, and production is successful only when the smoke tests pass.

Do not invent slugs, manually assign templates, add custom routing, add URL aliases, add direct template includes, or add deployment bootstrap endpoints for ordinary pages.

WordPress owns the page record and canonical slug. Git owns the page content and design. This same required-page and slug-template model applies to StoryDonkey and all other repo-controlled pages.

Do not modify the FTP host, `FTP_DEST`, deployment credentials, or deployment architecture. Do not push directly to `main`; use a PR unless the owner explicitly instructs otherwise. Deployment is not complete merely because GitHub Actions uploaded files; verify every production URL and expected body content.
