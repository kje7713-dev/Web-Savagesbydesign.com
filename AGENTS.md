# Repository instructions

## NEW REPO-CONTROLLED WORDPRESS PAGE

1. Choose the canonical slug.
2. Add the slug/title to `sbd_get_required_pages()` in `sbd-brutalist/functions.php`.
3. Create `page-{slug}.php` in `sbd-brutalist/`.
4. Bump the required-page migration version once.
5. Add the public URL and expected content to the production smoke tests.
6. Open a PR; do not push directly to `main` unless explicitly instructed by the owner.
7. WordPress creates the published routing placeholder.
8. WordPress normal routing selects `page-{slug}.php`.
9. The deployment workflow authenticates its POST bootstrap request, verifies the required placeholders, purges the affected LiteSpeed URLs, and then runs the production smoke tests.
10. Deployment is successful only when the production smoke test passes.

WordPress holds only the published routing placeholder. Page content and design stay in the repository. Do not create these pages manually in WordPress Admin. Do not build custom rewrite, query-var, template-router, direct-include, or URL-alias workarounds for ordinary repository-controlled pages.

Do not modify the FTP host, `FTP_DEST`, deployment credentials, or deployment architecture when adding ordinary pages. Do not modify the shared deployment bootstrap architecture for an ordinary new page. Deployment is not complete merely because GitHub Actions uploaded files; verify every production URL and expected body content.

Legacy non-StoryDonkey pages may retain their checked, publish-only placeholder migration behavior.
