# Repository instructions

## NEW THEME PAGE PROCEDURE

1. Do not modify the FTP host, `FTP_DEST`, deployment credentials, or deployment architecture when adding ordinary pages.
2. Add the PHP template under `sbd-brutalist/`.
3. Register the slug in `sbd_theme_routes()` in `sbd-brutalist/functions.php`.
4. Add or update the production smoke-test expectation in `.github/workflows/deploy-theme-ftp.yml`.
5. Use a PR; do not push directly to `main` unless explicitly instructed by the owner.
6. Deployment is not complete merely because GitHub Actions uploaded files.
7. Verify the production URL and expected content before reporting success.
8. Never create another routing workaround before analyzing the existing canonical route map and deployment workflow.

Repository-owned StoryDonkey pages are theme routes, not WordPress database pages. Preserve the single route map and the production smoke tests. Legacy non-StoryDonkey pages may retain their checked, publish-only placeholder migration.
