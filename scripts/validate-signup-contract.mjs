import { readFile } from 'node:fs/promises';

const source = await readFile('site-src/pages/storydonkey.html', 'utf8');
const contract = await readFile('docs/storydonkey-beta-signup.md', 'utf8');
const requiredSourceMarkers = [
  'name="email"',
  'name="arc"',
  'name="company"',
  'data-signup-backend="pending"',
  'action="/storydonkey/#beta"',
];
const requiredContractMarkers = [
  'Current WordPress behavior',
  'Replacement API contract',
  'Rate-limit by IP and normalized email',
  'approved server-side email provider',
  'Do not enable the static form in production',
];
const forbiddenSourceMarkers = ['/wp-admin/', 'admin-post.php', 'wp_nonce', 'sbd_beta_token'];
const failures = [];
for (const marker of requiredSourceMarkers) if (!source.includes(marker)) failures.push(`static form missing: ${marker}`);
for (const marker of requiredContractMarkers) if (!contract.includes(marker)) failures.push(`contract missing: ${marker}`);
for (const marker of forbiddenSourceMarkers) if (source.includes(marker)) failures.push(`static form still contains WordPress dependency: ${marker}`);
if (failures.length) {
  console.error(failures.map((failure) => `- ${failure}`).join('\n'));
  process.exit(1);
}
console.log('Validated StoryDonkey signup contract and deferred-backend guardrails.');
