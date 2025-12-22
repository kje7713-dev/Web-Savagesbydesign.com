/**
 * GitHub → WordPress sync using JWT auth
 * Syncs markdown files in /content to WP pages/posts
 */

const fs = require("fs");
const path = require("path");
const matter = require("gray-matter");
const { marked } = require("marked");
const fetch = require("node-fetch");

// ---- ENV ----
const WP_URL = (process.env.WP_URL || "").replace(/\/$/, "");
const USER = process.env.WP_JWT_USER;
const PASS = process.env.WP_JWT_PASS;

if (!WP_URL || !USER || !PASS) {
  console.error("❌ Missing WP_URL, WP_JWT_USER, or WP_JWT_PASS");
  process.exit(1);
}

// ---- AUTH ----
async function getToken() {
  const res = await fetch(`${WP_URL}/wp-json/jwt-auth/v1/token`, {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ username: USER, password: PASS }),
  });

  if (!res.ok) {
    throw new Error(`JWT auth failed: ${res.status} ${await res.text()}`);
  }

  const data = await res.json();
  if (!data.token) throw new Error("JWT token missing in response");
  return data.token;
}

// ---- WP REQUEST ----
async function wpRequest(token, endpoint, method, body) {
  const res = await fetch(`${WP_URL}/wp-json/wp/v2/${endpoint}`, {
    method,
    headers: {
      Authorization: `Bearer ${token}`,
      "Content-Type": "application/json",
    },
    body: body ? JSON.stringify(body) : undefined,
  });

  if (!res.ok) {
    throw new Error(`${method} ${endpoint} failed: ${res.status} ${await res.text()}`);
  }
  return res.json();
}

// ---- FILES ----
function getMarkdownFiles(dir) {
  if (!fs.existsSync(dir)) return [];
  return fs
    .readdirSync(dir)
    .filter((f) => f.endsWith(".md"))
    .map((f) => path.join(dir, f));
}

// ---- UPSERT ----
async function upsert({ token, type, title, slug, status, html }) {
  const endpoint = type === "post" ? "posts" : "pages";

  const existing = await wpRequest(
    token,
    `${endpoint}?slug=${encodeURIComponent(slug)}`,
    "GET"
  );

  if (existing.length) {
    const id = existing[0].id;
    console.log(`🔁 Updating ${endpoint.slice(0, -1)}: ${slug}`);
    await wpRequest(token, `${endpoint}/${id}`, "POST", {
      title,
      content: html,
      status,
      slug,
    });
  } else {
    console.log(`🆕 Creating ${endpoint.slice(0, -1)}: ${slug}`);
    await wpRequest(token, endpoint, "POST", {
      title,
      content: html,
      status,
      slug,
    });
  }
}

// ---- MAIN ----
(async () => {
  const token = await getToken();
  const contentDir = path.join(process.cwd(), "content");
  const files = getMarkdownFiles(contentDir);

  if (!files.length) {
    console.log("⚠️ No markdown files found in /content");
    return;
  }

  for (const file of files) {
    const raw = fs.readFileSync(file, "utf8");
    const parsed = matter(raw);

    const title = parsed.data.title;
    const slug = parsed.data.slug;
    const status = parsed.data.status || "draft";
    const type = parsed.data.type || "page";

    if (!title || !slug) {
      console.warn(`⏭ Skipping ${file} (missing title or slug)`);
      continue;
    }

    const html = marked(parsed.content);
    await upsert({ token, type, title, slug, status, html });
  }

  console.log("✅ WordPress sync complete");
})().catch((err) => {
  console.error("❌ Sync failed:", err.message);
  process.exit(1);
});
