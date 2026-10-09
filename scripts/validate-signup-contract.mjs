import { readFile } from 'node:fs/promises';

const source = await readFile('site-src/pages/storydonkey.html', 'utf8');
const contract = await readFile('docs/storydonkey-beta-signup.md', 'utf8');
const requiredSourceMarkers = [
  'name="email"',
  'name="arc"',
  'name="company"',
  'data-signup-backend="resend-edge-function"',
  'data-signup-endpoint="',
  'storydonkey-beta-signup.js',
  'data-signup-status',
];
const requiredContractMarkers = [
  'Email-only launch decision',
  'Supabase Edge Function',
  'RESEND_API_KEY',
  'STORYDONKEY_BETA_SIGNUP_ENDPOINT',
  'Do not deploy the Edge Function to production',
];
const requiredFunctionMarkers = [
  'storydonkey-beta-signup/index.ts',
  'verify_jwt = false',
  'savagesbydesignhq@gmail.com',
  'alert@savagesbydesign.com',
];
const functionSource = await readFile('supabase/functions/storydonkey-beta-signup/index.ts', 'utf8');
const forbiddenSourceMarkers = ['/wp-admin/', 'admin-post.php', 'wp_nonce', 'sbd_beta_token', 'data-signup-backend="pending"'];
const failures = [];
for (const marker of requiredSourceMarkers) if (!source.includes(marker)) failures.push(`static form missing: ${marker}`);
for (const marker of requiredContractMarkers) if (!contract.includes(marker)) failures.push(`contract missing: ${marker}`);
for (const marker of requiredFunctionMarkers) if (!contract.includes(marker) && !functionSource.includes(marker)) failures.push(`signup implementation missing: ${marker}`);
for (const marker of forbiddenSourceMarkers) if (source.includes(marker)) failures.push(`static form still contains WordPress dependency: ${marker}`);
if (!functionSource.includes('Access-Control-Allow-Origin')) failures.push('signup function missing CORS response handling');
if (!functionSource.includes('RESEND_API_KEY')) failures.push('signup function missing Resend secret lookup');
if (failures.length) {
  console.error(failures.map((failure) => `- ${failure}`).join('\n'));
  process.exit(1);
}
console.log('Validated StoryDonkey email-only signup contract and Edge Function integration markers.');
