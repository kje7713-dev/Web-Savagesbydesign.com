# Savages By Design — GitHub-First Content Repo (Automated WordPress Sync)

This repo is the **source of truth** for the Savages By Design website.
All page content is written here in Markdown and **automatically synced** to WordPress via GitHub Actions and JWT authentication.

## Why this approach
- Complete automation: commit to main → page updates in WordPress
- Version control for all content
- GitHub Copilot helps you write/refactor in a consistent brand voice
- No manual copy/paste steps
- WordPress acts as the CMS/runtime, controlled via REST API

---

## Folder structure

- `Brand/` — voice, tone, visual rules (Copilot reads this to stay consistent)
- `content/pages/` — **page source files** (Markdown with YAML frontmatter)
- `.github/workflows/` — GitHub Actions workflow for WordPress sync
- `.github/scripts/` — JWT sync script
- `Templates/` — reusable templates for future use
- `Assets/` — notes/links for images and brand assets

---

## Your workflow (automated sync)

### 1) Write pages in Markdown

All pages live in `content/pages/` as Markdown files with YAML frontmatter.

**File format:**
```markdown
---
title: "Page Title"
slug: "page-slug"
status: "publish"
type: "page"
---

# Your content here

Write in **Markdown**. It will be converted to HTML automatically.
```

**Required frontmatter fields:**
- `title` — Page title in WordPress
- `slug` — URL slug (no leading slash)
- `status` — `publish` or `draft`
- `type` — `page` (or `post` for blog posts)

### 2) Commit and push to main

When you push changes to the `main` branch that modify files in `content/pages/`, the GitHub Action automatically:
1. Authenticates to WordPress using JWT
2. Converts Markdown to HTML
3. Creates or updates the WordPress page via REST API
4. Logs the result

**No manual WordPress steps required.**

### 3) Verify the page is live

After the GitHub Action completes, check:
```
https://savagesbydesign.com/{slug}/
```

**If changes don't appear immediately:**
- **Clear WordPress cache** (if using WP Super Cache, W3 Total Cache, or similar)
- **Clear browser cache** or open in incognito/private mode
- **Check CDN cache** (if using Cloudflare or similar CDN)
- **Verify the GitHub Action succeeded** - check the Actions tab for errors

---

## GitHub Secrets (already configured)

The following secrets are required in the repository:

- `WP_URL` = https://savagesbydesign.com
- `WP_JWT_USER` = agent-sbd
- `WP_JWT_PASS` = (password for JWT user)

These are used by `.github/scripts/wp-sync-jwt.js` to authenticate.

---

## WordPress REST API

The sync uses the WordPress REST API with JWT authentication:

**Authentication endpoint:**
```
POST /wp-json/jwt-auth/v1/token
```

**Page management:**
```
GET /wp-json/wp/v2/pages?slug={slug}
POST /wp-json/wp/v2/pages/{id}  (update existing)
POST /wp-json/wp/v2/pages       (create new)
```

All requests include:
```
Authorization: Bearer {token}
```

---

## Copilot instructions (recommended)

Copilot will do best if you reference `Brand/voice.md` for tone and style.

**Prompt pattern to use in Copilot Chat:**
> "Use `Brand/voice.md` as the source of truth. Write Markdown content for a new page in `content/pages/`, using YAML frontmatter. Keep headings scannable, tone gritty/minimal, and avoid exaggerated claims."

---

## Quick launch checklist

- [x] `/app` page live (landing page for your app)
- [x] `/user-guide` page live (comprehensive documentation)
- [x] `/quick-start` page live (10-minute setup guide)
- [x] `/about` page live
- [ ] `/privacy` and `/terms` pages completed
- [ ] `/contact` page completed
- [ ] Homepage updated
- [ ] Primary menu configured

---

## Testing the sync

To test without pushing to main:
1. Use the **Actions** tab in GitHub
2. Click **Sync Markdown to WordPress (JWT)**
3. Click **Run workflow** → **Run workflow**

This manually triggers the sync job.

---

## Troubleshooting

### Changes not showing up on the site

If your updates successfully synced (GitHub Action shows ✅) but don't appear on the website:

**1. WordPress Cache**
- Log into WordPress admin dashboard
- Clear cache from your caching plugin (WP Super Cache, W3 Total Cache, etc.)
- Some themes have built-in caching - check theme settings

**2. Browser Cache**
- Hard refresh: `Ctrl+Shift+R` (Windows/Linux) or `Cmd+Shift+R` (Mac)
- Or open the page in incognito/private browsing mode
- Clear browser cache completely if needed

**3. CDN/Proxy Cache**
- If using Cloudflare: Purge cache in Cloudflare dashboard
- If using another CDN: Clear CDN cache
- Some CDNs take 5-10 minutes to update

**4. Verify the Sync**
- Check the GitHub Actions log - look for "🔁 Updating" or "🆕 Creating" messages
- Verify the page exists in WordPress admin (Pages → All Pages)
- Check that the page status is "Publish" not "Draft"

**5. Permalink Issues**
- In WordPress admin, go to Settings → Permalinks
- Click "Save Changes" (even without changing anything)
- This refreshes WordPress permalink cache

### Sync failures

If the GitHub Action fails (❌):
- Check the Actions log for error messages
- Verify WordPress is accessible (not in maintenance mode)
- Confirm JWT authentication plugin is active in WordPress
- Check that secrets (WP_URL, WP_JWT_USER, WP_JWT_PASS) are configured correctly

---

## Notes

- This repo does **not** contain WordPress theme files
- Theme customization happens in WordPress directly or via separate deployment
- Page content is the only thing synced from this repository
- Images and media are uploaded directly to WordPress
