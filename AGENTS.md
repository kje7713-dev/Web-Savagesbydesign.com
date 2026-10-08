# Repository instructions

## NEW REPO-CONTROLLED WORDPRESS PAGE

1. The site owner manually creates and publishes a blank WordPress page.
2. The site owner provides the exact canonical slug to the agent.
3. The agent creates `page-{slug}.php` in `sbd-brutalist/`.
4. The agent keeps all content and design in the repository template.
5. The agent adds the public URL and expected text to production smoke tests.
6. The agent opens a PR.
7. Deployment uploads and verifies the template.
8. WordPress normal template hierarchy selects `page-{slug}.php`.
9. Deployment is successful only when the production smoke test passes.

Do not auto-create WordPress pages.
Do not invent slugs.
Do not create custom routing for ordinary pages.
Do not add deployment bootstrap endpoints for page creation.

WordPress owns the published page record and canonical slug. Git owns the page content and design. Do not build custom rewrite, query-var, template-router, direct-include, or URL-alias workarounds for ordinary repository-controlled pages.

Legacy non-StoryDonkey pages may retain their checked, publish-only placeholder migration behavior. Do not remove that shared legacy mechanism when adding or maintaining a manually-created StoryDonkey page.

Do not modify the FTP host, `FTP_DEST`, deployment credentials, or deployment architecture when adding ordinary pages. Do not push directly to `main`; use a PR unless the owner explicitly instructs otherwise. Deployment is not complete merely because GitHub Actions uploaded files; verify every production URL and expected body content.
