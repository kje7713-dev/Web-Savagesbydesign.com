# StoryDonkey beta signup

## Email-only launch decision

The static StoryDonkey beta form sends an email notification to the operator. It does not create user accounts, write a Supabase table, depend on WordPress/PHP, or introduce a CRM. The existing WordPress lead records remain outside this change and must be exported/backed up before any future WordPress retirement work.

The source-controlled Supabase Edge Function implementation is `supabase/functions/storydonkey-beta-signup/index.ts`. The function is public for anonymous browser visitors, but its browser CORS allowlist and server-side validation remain mandatory. `supabase/config.toml` sets `verify_jwt = false` because visitors do not have Supabase sessions; the function still performs its own method, origin, size, honeypot, email, and arc checks.

## Request and response contract

The browser sends JSON by `POST`:

```json
{"email":"writer@example.com","arc":"Mystery","company":""}
```

`arc` must be one of the current options in `site-src/pages/storydonkey.html`. A non-empty `company` honeypot is accepted with a success response but never calls Resend. Valid submissions return success only after Resend accepts the message. Invalid input returns a generic `400`; provider or configuration failure returns a generic `503`; unsupported methods return `405`; unapproved browser origins are rejected. The function never logs submitted addresses or provider response details.

The email is sent through Resend with:

- From: `StoryDonkey Beta <alert@savagesbydesign.com>`
- To: `savagesbydesignhq@gmail.com`
- Reply-To: the normalized submitted email
- Subject: `New StoryDonkey Beta Signup`
- Body: email, selected arc, UTC timestamp, and fixed source label

A successful Resend API response means the provider accepted the message, not that inbox delivery has been confirmed.

## Supabase project and secrets

No Supabase project is selected or changed by this repository change. Choose or create a **separate StoryDonkey beta-notification project**, not the CathedralOS production project, and record its project reference privately. Do not guess an existing project or reuse credentials from another application.

In the selected Supabase project, configure this Edge Function secret through the Dashboard or CLI secret facility:

- `RESEND_API_KEY` — Resend key for the approved sending identity; never put it in source control, browser code, GitHub logs, or this document.

Verify `alert@savagesbydesign.com` in the Resend account before testing. The function uses no service-role key, database table, or Supabase client.

## Endpoint configuration

The static build injects the public function URL from `STORYDONKEY_BETA_SIGNUP_ENDPOINT`; this is a URL, not a secret. The workflow requires a staging-environment secret with this exact shape:

```text
https://<staging-project-ref>.supabase.co/functions/v1/storydonkey-beta-signup
```

The current staging deployment workflow reads `STORYDONKEY_BETA_SIGNUP_ENDPOINT` from the GitHub `staging` environment and validates its HTTPS Supabase function URL shape before upload. The production deployment setting is intentionally not added here: when production static deployment is authorized, inject the production project’s URL through that deployment’s environment, for example:

```text
https://<production-project-ref>.supabase.co/functions/v1/storydonkey-beta-signup
```

Never put `RESEND_API_KEY` in GitHub or the static site. The endpoint is public by design; the key is not.

## Manual setup and staging test

1. Select/create the separate Supabase project and record its project ref; do not alter CathedralOS or production WordPress.
2. Confirm `alert@savagesbydesign.com` is verified in Resend.
3. Set `RESEND_API_KEY` in the selected Supabase project’s Edge Function secrets.
4. Install/authenticate the Supabase CLI if using CLI deployment, link only the selected project, and deploy this function:
   `supabase functions deploy storydonkey-beta-signup --project-ref <staging-project-ref> --no-verify-jwt`
   The repository’s `supabase/config.toml` also declares `verify_jwt = false`; use the explicit flag only to make the anonymous deployment intent clear.
5. Add `STORYDONKEY_BETA_SIGNUP_ENDPOINT` to the GitHub `staging` environment with the selected project URL above. Do not add the Resend key there.
6. Run the existing manual **Deploy Static Site to Staging** workflow on the intended commit. It builds the endpoint into `/storydonkey/` and preserves the existing SFTP path/security checks.
7. Open `https://staging.savagesbydesign.com/storydonkey/`, submit a real test address and arc once, and confirm the page reports success only after the function responds.
8. Inspect `savagesbydesignhq@gmail.com` for the message and verify its Reply-To header. A mock or green CI run is not a live delivery test.

Do not deploy the Edge Function to production, change production DNS/hosting, or switch the production WordPress site until the owner separately approves those actions.

## Abuse controls and limitations

The function uses the hidden honeypot, strict origin CORS, a 4 KiB body limit, bounded fields, allowlisted arcs, normalized email validation, and no database. CORS does not stop direct API abuse. There is no durable IP/email rate limiter in this smallest email-only implementation: in-memory throttling would be unreliable across Edge Function instances, while durable throttling would require a store or additional managed service. Add that only as a separately approved follow-up if real abuse appears.

## Automated coverage

- `supabase/functions/storydonkey-beta-signup/index_test.ts` covers valid Resend payloads, normalization, invalid email/arc, honeypot, CORS/method/body limits, provider failure, and safe generic errors.
- `tests/storydonkey-beta-signup.test.mjs` covers frontend pending/success/error states and duplicate-click suppression.
- `npm run check` validates all static routes, deployment markers, `app-ads.txt`, the signup contract, and the no-WordPress static boundary.

The static form is not considered staging-verified until the owner completes the real submission and inbox/Reply-To check above.
