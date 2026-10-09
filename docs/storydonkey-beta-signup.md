# StoryDonkey beta signup

## Simpler email-only launch

The beta form uses the smallest possible flow: it opens the visitor’s email application with a prefilled message addressed to `savagesbydesignhq@gmail.com`. The visitor must press Send. There is no backend, database, account platform, CRM, Supabase project, Resend key, WordPress/PHP dependency, or automatic delivery claim.

This is intentionally a temporary launch approach. The existing WordPress lead records remain outside this change and must be exported/backed up before any future WordPress retirement work.

## Browser behavior

The form keeps the existing email, story-arc, and hidden company fields. The browser handler validates the required email and arc using the existing form controls, then opens:

```text
mailto:savagesbydesignhq@gmail.com
```

with a URL-encoded subject and body containing the visitor’s email and selected story arc. It prevents duplicate clicks and displays:

- an accessible validation error for invalid input;
- a pending message explaining that the email app is opening and the visitor must send;
- no false “signup complete” message.

A `mailto:` link depends on the visitor having an email application configured. Webmail users may need to copy the prefilled details into Gmail or another service manually. The site cannot confirm that the visitor sent the message or that it arrived.

## Staging and production

No endpoint or secret configuration is required. The same static form works on staging and production because it opens the fixed operator address. The existing SFTP staging workflow, exact destination guard, strict host-key checks, manual trigger, and non-destructive upload behavior are unchanged.

Deploy the updated static site through the existing manual staging workflow, then test `/storydonkey/` in a browser. Submit a test message and confirm it arrives at `savagesbydesignhq@gmail.com`. This is a manual send-and-inbox check, not an automated delivery test.

## Privacy note

The StoryDonkey privacy page explains that the visitor’s email and selected arc are sent to the operator by email. The site does not transmit or store those values before the visitor’s email application sends the message.

## Automated coverage

- `npm run check` validates all static routes, deployment markers, `app-ads.txt`, the signup contract, and the no-WordPress static boundary.
- `tests/storydonkey-beta-signup.test.mjs` covers the generated recipient/subject/body, duplicate-click prevention, invalid-input handling, and the absence of a false success state.

This approach is ready for manual staging integration testing. It is not evidence that an email has been sent or received until the owner performs the browser and inbox check.
