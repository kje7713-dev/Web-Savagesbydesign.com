# Static staging deployment runbook

The repository now includes `.github/workflows/deploy-static-staging.yml`.

## Safety properties

- Manual `workflow_dispatch` only; it does not run on pushes.
- Uses the GitHub `staging` environment.
- Reads only `STAGING_*` secrets; it never reads production `FTP_*` secrets.
- Requires an HTTPS staging base URL and an explicitly named staging FTP directory.
- Builds and validates the exact commit before upload.
- Uploads `dist/`, then checks all 15 routes, deployment SHA markers, and exact `app-ads.txt` content.
- Does not delete WordPress files, modify production, or change DNS.

## Required staging configuration

Create a separate Hostinger staging location first, preferably an HTTPS subdomain such as `staging.savagesbydesign.com`. Do not use a production subdirectory: generated links are root-relative and assume the staging host is its own origin.

Configure these secrets on the `staging` GitHub environment:

- `STAGING_BASE_URL` — complete HTTPS origin, with no trailing path
- `STAGING_FTP_HOST` — staging FTP/FTPS hostname
- `STAGING_FTP_PORT` — approved FTPS port, normally `21` or the value Hostinger provides
- `STAGING_FTP_USER`
- `STAGING_FTP_PASS`
- `STAGING_FTP_DEST` — destination containing an explicit staging name; the operator must confirm it is the actual staging document root, not the production document root

The workflow refuses an empty configuration, a non-HTTPS base URL, or a destination that does not contain the string `staging`. That string check does not independently prove document-root correctness; the operator remains responsible for confirming that the FTP destination is the actual staging document root before saving the secret.

## Operator sequence

1. Create or identify the staging subdomain and document root in Hostinger.
2. Confirm the staging root serves HTTPS and is separate from production.
3. Create the `staging` GitHub environment and add only the `STAGING_*` secrets above.
4. Dispatch **Deploy Static Site to Staging** for the intended commit.
5. Review the route smoke-test output and inspect the staged pages visually.
6. Record the staging URL, FTP destination, commit SHA, and result before any production cutover planning.

No staging secrets or Hostinger paths are stored in this repository.
