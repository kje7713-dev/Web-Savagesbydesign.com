# Savages By Design — GitHub-First Content Repo (Simple WordPress Path)

This repo is the **workbench** for the Savages By Design website.
You write and iterate here (with **GitHub Copilot**), then **copy/paste** the HTML blocks into WordPress (Classic Editor) to publish.

## Why this approach
- Fastest path to launch (no APIs, no JWT, no automation headaches)
- Version control for all copy + templates
- Copilot helps you write/refactor in a consistent brand voice
- WordPress stays the CMS/runtime

---

## Folder structure

- `brand/` — voice, tone, visual rules (Copilot reads this to stay consistent)
- `content/` — page drafts (paste-ready HTML)
- `templates/` — reusable post/page templates (reviews/guides/deals)
- `assets/` — notes/links for images and brand assets (you'll upload images in WP)

---

## Your workflow (the “simple path”)

### 1) Draft in GitHub (with Copilot)
- Edit files in `content/` (e.g. `content/app.md`)
- Keep everything between:
  - `<!-- WP-PASTE-START -->`
  - `<!-- WP-PASTE-END -->`
  as **HTML**, because WordPress Classic Editor is most predictable with HTML.

### 2) Publish in WordPress
For each page you want live:
1. WordPress Admin → **Pages → Add New**
2. Set the title (matches the file)
3. Set the slug/permalink (matches the file header, e.g. `/app`)
4. In Classic Editor, switch to **Text** (not Visual)
5. Paste only the HTML block between the WP markers
6. Preview → Publish/Update

### 3) Commit what you published
After you publish, commit the final content here so GitHub stays the source of truth.

---

## Copilot instructions (recommended)
Copilot will do best if you keep your brand rules in `brand/voice.md`.

**Prompt pattern to use in Copilot Chat:**
> “Use `brand/voice.md` as the source of truth. Write paste-ready HTML for the page described in `content/app.md`, keeping headings scannable, tone gritty/minimal, and avoiding exaggerated claims.”

---

## Quick launch checklist
- [ ] `/app` page live (landing page for your app)
- [ ] `/privacy` live
- [ ] `/terms` live
- [ ] Homepage updated to route people to `/app`
- [ ] Primary menu updated: Home, App, Reviews, Guides, Deals, About, Contact

---

## Notes
- This repo intentionally does **not** contain WordPress exports or themes.
- You can add a Phase 2 later (automation posting drafts), but launch with this first.
