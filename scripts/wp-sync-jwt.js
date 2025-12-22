const fs = require("fs");
const path = require("path");
const matter = require("gray-matter");
const { marked } = require("marked");
const fetch = require("node-fetch");

const WP_URL = (process.env.WP_URL || "").replace(/\/$/, "");
const USER = process.env.WP_JWT_USER;
const PASS = process.env.WP_JWT_PASS;

if (!WP_URL || !USER || !PASS) {
  console.error("Missing WP_URL, WP_JWT_USER, or WP_JWT_PASS secrets.");
  process.exit(1);
}

async function getToken() {
  const res = await fetch(`${WP_URL}/wp-json/jwt-auth/v1/token`, {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ username: USER, password: PASS }),
  });

  if (!res.ok) throw new Error(`Token failed: ${res.status} ${await res.text()}`);

  const data = await res.json();
  if (!data.token) throw new Error("JWT token missing from response.");
  return data.token;
}

async function wpRequest(token, endpoint, method, body) {
  const res = await fetch(`${WP_URL}/wp-json/wp/v2/${endpoint}`, {
    method,
    headers: {
      Authorization: `Bearer ${token}`,
      "Content-Type": "application/json",
    },
    body: body ? JSON.stringify(body) : undefined,
  });

  if (!res.ok) throw new Error(`${method} ${endpoint} failed: ${res.status} ${await res.text()}`);
  return res.json();
}

function getMarkdownFiles(dir) {
  return fs.existsSync(dir)
    ? fs.readdirSync(dir).filter((f) => f.endsWith(".md")).map((f) => path.join(dir, f))
    : [];
}

async function upsert({ token, type, title, slug, status, html }) {
  const endpoint = type === "post" ? "posts" : "pages";

  const existing = await wpRequest(token, `${endpoint}?slug=${encodeURIComponent(slug)}`, "GET");
  if (existing.length) {
    const id = existing[0].id;
    console.log(`Updating ${endpoint.slice(0, -1)}: ${slug} (id ${id})`);
    await wpRequest(token, `${endpoint}/${id}`, "POST", { title, content: html, status, slug });
  } else {
    console.log(`Creating ${endpoint.slice(0, -1)}: ${slug}`);
    await wpRequest(token, endpoint, "POST", { title, content: html, status, slug });
  }
}

(async () => {
  const token = await getToken();
  const contentDir = path.join(process.cwd(), "content");
  const files = getMarkdownFiles(contentDir);

  for (const file of files) {
    const raw = fs.readFileSync(file, "utf8");
    const parsed = matter(raw);

    const title = parsed.data.title;
    const slug = parsed.data.slug;
    const status = parsed.data.status || "draft";
    const type = parsed.data.type || "page";

    if (!title || !slug) {
      console.warn(`Skipping ${file} (missing front matter: title/slug)`);
      continue;
    }

    const html = marked(parsed.content);
    await upsert({ token, type, title, slug, status, html });
  }

  console.log("✅ Sync complete.");
})().catch((e) => {
  console.error(e);
  process.exit(1);
});
