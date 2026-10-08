# StoryDonkey beta signup replacement contract

Status: contract prepared; no backend or production database has been changed.

## Current WordPress behavior

Source: `sbd-brutalist/functions.php` and `sbd-brutalist/page-storydonkey.php`.

- Form fields: `email`, `arc`, and hidden honeypot `company`.
- WordPress routing: `POST /wp-admin/admin-post.php` with `action=sbd_beta_signup`.
- Request protection: WordPress nonce plus a cache-safe HMAC token.
- Honeypot: non-empty `company` is treated as a successful response without persistence or notification.
- Validation: `email` is sanitized and must pass WordPress `is_email()`; `arc` is sanitized text.
- Valid lead persistence: private `sbd_beta_lead` post with email and selected arc.
- Notification: `wp_mail()` to `savagesbydesignhq@gmail.com` with `Reply-To` set to the submitted email.
- Success redirect: `/storydonkey/?beta=thanks#beta`.
- Invalid-email redirect: `/storydonkey/?beta=invalid#beta`.
- Invalid requests without a valid nonce/token: HTTP 400.
- The static foundation removes the WordPress target and marks the form `data-signup-backend="pending"`; it intentionally does not claim signup functionality is ready.

## Replacement API contract

Recommended endpoint: `POST /api/storydonkey-beta-signup` behind HTTPS. The static form may submit the existing URL-encoded fields so the front-end experience does not need to change.

### Request

```text
Content-Type: application/x-www-form-urlencoded
email=<required email>&arc=<required selected arc>&company=<honeypot>
```

### Server requirements

1. Validate and normalize the email server-side.
2. Validate `arc` against the current allowed options or store an explicit `Other` value only after a product decision.
3. Treat a non-empty `company` as a successful no-op without persistence or notification.
4. Rate-limit by IP and normalized email; do not rely on the client for abuse protection.
5. Persist only the minimum lead data: normalized email, arc, source, created timestamp, and notification status.
6. Make duplicate submissions safe and idempotent without exposing whether an email already exists.
7. Send the notification through an approved server-side email provider; never expose its credential to the browser.
8. Return a generic success response that does not disclose persistence or provider details.
9. Return a generic validation failure for malformed input and do not echo submitted email addresses.
10. Record failures without putting email addresses in logs or CI output.

### Response behavior

- Success or honeypot: `303` to `/storydonkey/?beta=thanks#beta`, or a JSON equivalent if the front end is changed.
- Invalid input: `303` to `/storydonkey/?beta=invalid#beta`, or HTTP 400 for an API client.
- Server/provider failure: generic HTTP 503; do not report provider internals.

## Configuration still required

- Choose the serverless/runtime location for `/api/storydonkey-beta-signup`.
- Confirm whether the existing Supabase project is the intended durable store; its current schema has no beta-lead or signup table.
- Create a private `beta_leads` table and server-side insert path with RLS/service-role boundaries if Supabase is selected.
- Provide or confirm an approved notification provider and secret name. No provider/account configuration was changed by this work.
- Add staging-only endpoint configuration and end-to-end tests before enabling the form.

Do not enable the static form in production until persistence, notification, rate limiting, failure behavior, and a staging smoke test are verified.
