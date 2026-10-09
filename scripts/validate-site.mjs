import { access, readFile, readdir } from 'node:fs/promises';
import path from 'node:path';
import { fileURLToPath } from 'node:url';

const repoRoot = path.resolve(path.dirname(fileURLToPath(import.meta.url)), '..');
const distDir = path.join(repoRoot, 'dist');
const routes = {
  '': 'TAKE CHARGE',
  app: 'Welcome to Savage By Design',
  offerings: 'What We Offer',
  guides: 'Training Guides',
  reviews: 'Gear Reviews',
  deals: 'Training Gear Deals',
  contact: 'Get In Touch',
  privacy: 'Privacy Policy',
  terms: 'Terms of Service',
  'user-guide': 'User Guide',
  'pizza-chicken-pop-support': 'Pizza Chicken Pop Support',
  storydonkey: 'StoryDonkey',
  'storydonkey-privacy': 'StoryDonkey Privacy Policy',
  'storydonkey-terms': 'StoryDonkey Terms of Use',
  'storydonkey-support': 'StoryDonkey Support',
};
const failures = [];
const exists = async (file) => access(file).then(() => true).catch(() => false);

for (const [route, expected] of Object.entries(routes)) {
  const file = path.join(distDir, route, 'index.html');
  if (!(await exists(file))) {
    failures.push(`missing route: /${route}/`);
    continue;
  }
  const html = await readFile(file, 'utf8');
  if (!html.includes(expected)) failures.push(`/${route || ''}/ missing expected text: ${expected}`);
  if (!html.includes('name="sbd-deployment" content="') || html.includes('content=""')) {
    failures.push(`/${route || ''}/ missing deployment marker`);
  }
  for (const marker of ['<?php', 'wp_', '/wp-admin/', '/wp-content/themes/', '{{']) {
    if (html.includes(marker)) failures.push(`/${route || ''}/ contains forbidden marker: ${marker}`);
  }
}

const appAds = path.join(distDir, 'app-ads.txt');
if (!(await exists(appAds))) failures.push('missing /app-ads.txt');
else if ((await readFile(appAds, 'utf8')).trim() !== 'google.com, pub-9428188855756038, DIRECT, f08c47fec0942fa0') failures.push('app-ads.txt content changed');

const staticHtaccess = path.join(distDir, '.htaccess');
if (!(await exists(staticHtaccess))) failures.push('missing static .htaccess');
else {
  const htaccess = await readFile(staticHtaccess, 'utf8');
  for (const marker of ['DirectoryIndex index.html', 'RewriteEngine Off']) {
    if (!htaccess.includes(marker)) failures.push(`static .htaccess missing: ${marker}`);
  }
}

const localTargets = new Set(Object.keys(routes).map((route) => `/${route ? `${route}/` : ''}`));
const htmlFiles = [];
async function collect(directory) {
  for (const entry of await readdir(directory, { withFileTypes: true })) {
    const file = path.join(directory, entry.name);
    if (entry.isDirectory()) await collect(file);
    else if (entry.name.endsWith('.html')) htmlFiles.push(file);
  }
}
if (await exists(distDir)) await collect(distDir);
for (const file of htmlFiles) {
  const html = await readFile(file, 'utf8');
  for (const match of html.matchAll(/(?:href|src|action)="(\/[^"#?]*)/g)) {
    const target = match[1];
    if (target.startsWith('/assets/') || target === '/app-ads.txt' || target.startsWith('/storydonkey/#')) continue;
    const normalized = target.endsWith('/') ? target : `${target}/`;
    if (!localTargets.has(normalized)) failures.push(`${path.relative(distDir, file)} links to unknown route: ${target}`);
  }
}

if (failures.length) {
  console.error(failures.map((failure) => `- ${failure}`).join('\n'));
  process.exit(1);
}
console.log(`Validated ${Object.keys(routes).length} routes, app-ads.txt, deployment markers, static markers, and local links.`);
