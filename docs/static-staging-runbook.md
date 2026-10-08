# Static staging deployment runbook

The repository now includes `.github/workflows/deploy-static-staging.yml`.

## Safety properties

- Manual `workflow_dispatch` only; it does not run on pushes.
- Uses the GitHub `staging` environment.
- Reads only `STAGING_*` secrets; it never reads production `FTP_*` secrets.
- Uses SFTP over SSH with strict host-key verification; it never disables verification or auto-trusts a key.
- Verifies the resolved SSH and SFTP destination before uploading and refuses any path other than the exact staging document root.
- Builds and validates the exact commit before upload.
- Uploads `dist/` without destructive synchronization or `--delete`, then checks all 15 routes, deployment SHA markers, and exact `app-ads.txt` content.
- Does not delete WordPress files, modify production, or change DNS.

## Required staging configuration

Create a separate Hostinger staging location first, preferably an HTTPS subdomain such as `staging.savagesbydesign.com`. Do not use a production subdirectory: generated links are root-relative and assume the staging host is its own origin. The approved SSH account and destination for this workflow are `u818755784@157.173.208.128:65002` and `/home/u818755784/domains/savagesbydesign.com/public_html/staging`.

Configure these secrets on the `staging` GitHub environment:

- `STAGING_BASE_URL` — complete HTTPS origin, with no trailing path
- `STAGING_SSH_HOST` — exactly `157.173.208.128`
- `STAGING_SSH_PORT` — exactly `65002`
- `STAGING_SSH_USER` — exactly `u818755784`
- `STAGING_SSH_PRIVATE_KEY` — the PEM/OpenSSH private key for a deployment-specific key pair; do not reuse a personal key
- `STAGING_SSH_KNOWN_HOSTS` — the verified `known_hosts` line for `[157.173.208.128]:65002`; obtain and verify the fingerprint out-of-band with Hostinger before storing it
- `STAGING_SFTP_DEST` — exactly `/home/u818755784/domains/savagesbydesign.com/public_html/staging`

The workflow refuses an empty configuration, a non-HTTPS base URL, a different host/port/user, or any destination other than the exact staging path. It resolves that directory over SSH and then changes to and lists the same path through SFTP before uploading. It intentionally does not use `--delete`; stale files must be reviewed and removed manually only after an independent staging verification.

## Operator sequence

1. Create or identify the staging subdomain and document root in Hostinger; confirm that the intended directory is separate from the production WordPress root.
2. In Hostinger, create a deployment-only SSH key pair/account access with write permission only for staging if Hostinger supports that restriction. Never store the private key in the repository.
3. Verify the SSH host key with an independent Hostinger source. On a trusted machine, run `ssh-keyscan -p 65002 157.173.208.128`, compare its fingerprint with Hostinger, and save the verified output as the `STAGING_SSH_KNOWN_HOSTS` secret. Do not use `ssh-keyscan` output without independent verification.
4. From a trusted machine, authenticate with the deployment key and run `ssh -p 65002 u818755784@157.173.208.128 'realpath -e /home/u818755784/domains/savagesbydesign.com/public_html/staging'`. Proceed only if it prints exactly `/home/u818755784/domains/savagesbydesign.com/public_html/staging`; if it fails or resolves elsewhere, stop and correct Hostinger configuration.
5. Create the `staging` GitHub environment and add only the `STAGING_*` secrets above. Confirm the environment is restricted to approved operators and that the workflow remains manual.
6. Dispatch **Deploy Static Site to Staging** for the intended commit. The workflow repeats the SSH/SFTP path verification before upload.
7. Review the route smoke-test output and inspect the staged pages visually. A green build is not a staging deployment confirmation unless the SFTP upload and all smoke tests pass.
8. Record the staging URL, exact destination, commit SHA, and result before any production cutover planning.

No staging secrets or Hostinger paths are stored in this repository.
