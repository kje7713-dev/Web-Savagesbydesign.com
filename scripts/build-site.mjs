import { cp, mkdir, readFile, rm, writeFile } from 'node:fs/promises';
import path from 'node:path';
import { fileURLToPath } from 'node:url';

const repoRoot = path.resolve(path.dirname(fileURLToPath(import.meta.url)), '..');
const distDir = path.join(repoRoot, 'dist');
const sourcePages = path.join(repoRoot, 'site-src', 'pages');
const partials = path.join(repoRoot, 'site-src', 'partials');

const routes = {
  'index': { title: 'Savage by Design', bodyClass: '' },
  'app': { title: 'Savage by Design App', bodyClass: '' },
  'offerings': { title: 'Savage by Design — Offerings', bodyClass: '' },
  'guides': { title: 'Savage by Design — Guides', bodyClass: '' },
  'reviews': { title: 'Savage by Design — Reviews', bodyClass: '' },
  'deals': { title: 'Savage by Design — Deals', bodyClass: '' },
  'contact': { title: 'Savage by Design — Contact', bodyClass: '' },
  'privacy': { title: 'Savage by Design — Privacy Policy', bodyClass: '' },
  'terms': { title: 'Savage by Design — Terms of Service', bodyClass: '' },
  'user-guide': { title: 'Savage by Design — User Guide', bodyClass: '' },
  'pizza-chicken-pop-support': { title: 'Pizza Chicken Pop — Support', bodyClass: '' },
  'storydonkey': { title: 'StoryDonkey — Savage by Design', bodyClass: 'storydonkey-template' },
  'storydonkey-privacy': { title: 'StoryDonkey Privacy Policy', bodyClass: '' },
  'storydonkey-terms': { title: 'StoryDonkey Terms of Use', bodyClass: '' },
  'storydonkey-support': { title: 'StoryDonkey Support', bodyClass: '' },
};

const deploymentSha = process.env.SBD_DEPLOYMENT_SHA || process.env.GITHUB_SHA || 'local';
const year = new Date().getUTCFullYear();

await rm(distDir, { recursive: true, force: true });
await mkdir(distDir, { recursive: true });
await cp(path.join(repoRoot, 'sbd-brutalist', 'assets'), path.join(distDir, 'assets'), { recursive: true });
for (const documentationFile of ['README-VIDEO.md', 'VIDEO-INSTRUCTIONS.md']) {
  await rm(path.join(distDir, 'assets', 'img', documentationFile), { force: true });
}
await mkdir(path.join(distDir, 'assets', 'template-parts'), { recursive: true });
await cp(
  path.join(repoRoot, 'sbd-brutalist', 'template-parts', 'icon_ios-marketing_1024x1024_1x.png'),
  path.join(distDir, 'assets', 'template-parts', 'icon_ios-marketing_1024x1024_1x.png'),
);
await cp(path.join(repoRoot, 'sbd-brutalist', 'style.css'), path.join(distDir, 'assets', 'style.css'));
await cp(path.join(repoRoot, 'public-root', 'app-ads.txt'), path.join(distDir, 'app-ads.txt'));

const header = await readFile(path.join(partials, 'header.html'), 'utf8');
const footer = await readFile(path.join(partials, 'footer.html'), 'utf8');

for (const [route, metadata] of Object.entries(routes)) {
  const body = await readFile(path.join(sourcePages, `${route}.html`), 'utf8');
  const html = `${header}\n${body}\n${footer}`
    .replaceAll('{{DEPLOYMENT_SHA}}', deploymentSha)
    .replaceAll('{{YEAR}}', String(year))
    .replaceAll('{{TITLE}}', metadata.title)
    .replaceAll('{{BODY_CLASS}}', metadata.bodyClass);
  const destination = route === 'index' ? distDir : path.join(distDir, route);
  await mkdir(destination, { recursive: true });
  await writeFile(path.join(destination, 'index.html'), html);
}

console.log(`Built ${Object.keys(routes).length} routes into ${path.relative(repoRoot, distDir)}/ (deployment ${deploymentSha}).`);
