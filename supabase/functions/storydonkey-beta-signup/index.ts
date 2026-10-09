const ALLOWED_ORIGINS = new Set([
  "https://staging.savagesbydesign.com",
  "https://savagesbydesign.com",
  "https://www.savagesbydesign.com",
]);

const ALLOWED_ARCS = new Set([
  "Three-Act",
  "Hero's Journey",
  "Mystery",
  "Save the Cat!",
  "Story Circle",
  "Freytag's Pyramid",
  "Kishōtenketsu",
  "Romance / HEA",
  "Psychological / Domestic Thriller",
  "Romantasy",
  "Suspense / Countdown Thriller",
  "Science-Fiction Problem / Survival",
  "Dystopian Rebellion",
  "Dark Romance",
  "Epic Fantasy Quest",
  "Seven-Point Story Structure",
  "Horror / Escalating Dread",
  "Sports Romance",
  "Romantic Suspense",
  "Conspiracy / Artifact Thriller",
  "Progression Fantasy / LitRPG",
  "Historical War / Survival",
  "Coming-of-Age / Bildungsroman",
  "Revenge",
  "Heist / Caper",
  "Redemption / Rebirth",
  "Family Saga / Generational",
]);

const MAX_BODY_BYTES = 4096;
const MAX_EMAIL_LENGTH = 254;
const MAX_ARC_LENGTH = 80;
const MAX_COMPANY_LENGTH = 128;
const RESEND_URL = "https://api.resend.com/emails";
const SUCCESS = { ok: true };
const GENERIC_ERROR = { ok: false, error: "Unable to submit beta request." };

type EnvReader = { get(name: string): string | undefined };
type Fetcher = typeof fetch;

function originFor(request: Request): string | undefined {
  const origin = request.headers.get("origin");
  return origin && ALLOWED_ORIGINS.has(origin) ? origin : undefined;
}

function corsHeaders(origin?: string): HeadersInit {
  return origin
    ? {
      "Access-Control-Allow-Origin": origin,
      "Access-Control-Allow-Methods": "POST, OPTIONS",
      "Access-Control-Allow-Headers": "content-type",
      "Access-Control-Max-Age": "86400",
      Vary: "Origin",
    }
    : {};
}

function jsonResponse(
  body: unknown,
  status: number,
  origin?: string,
): Response {
  return new Response(JSON.stringify(body), {
    status,
    headers: { "Content-Type": "application/json", ...corsHeaders(origin) },
  });
}

function emailIsValid(email: string): boolean {
  return email.length > 0 && email.length <= MAX_EMAIL_LENGTH &&
    !/[\r\n\u0000]/.test(email) && /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

function inputString(value: unknown, maxLength: number): string | undefined {
  if (typeof value !== "string" || value.length > maxLength) return undefined;
  return value;
}

export function createHandler(
  send: Fetcher = fetch,
  env: EnvReader = Deno.env,
) {
  return async (request: Request): Promise<Response> => {
    const requestOrigin = request.headers.get("origin");
    if (requestOrigin && !ALLOWED_ORIGINS.has(requestOrigin)) {
      return jsonResponse({ ok: false, error: "Origin not allowed." }, 403);
    }
    const origin = originFor(request);

    if (request.method === "OPTIONS") {
      return origin
        ? new Response(null, { status: 204, headers: corsHeaders(origin) })
        : jsonResponse(GENERIC_ERROR, 403);
    }
    if (request.method !== "POST") {
      return jsonResponse(
        { ok: false, error: "Method not allowed." },
        405,
        origin,
      );
    }

    const contentLength = Number(request.headers.get("content-length") ?? "0");
    if (contentLength > MAX_BODY_BYTES) {
      return jsonResponse(GENERIC_ERROR, 413, origin);
    }

    let payload: unknown;
    try {
      const raw = await request.text();
      if (new TextEncoder().encode(raw).byteLength > MAX_BODY_BYTES) {
        return jsonResponse(GENERIC_ERROR, 413, origin);
      }
      payload = JSON.parse(raw);
    } catch {
      return jsonResponse(
        { ok: false, error: "Invalid request." },
        400,
        origin,
      );
    }

    if (!payload || typeof payload !== "object" || Array.isArray(payload)) {
      return jsonResponse(
        { ok: false, error: "Invalid request." },
        400,
        origin,
      );
    }
    const input = payload as Record<string, unknown>;
    const email = inputString(input.email, MAX_EMAIL_LENGTH)?.trim()
      .toLowerCase();
    const arc = inputString(input.arc, MAX_ARC_LENGTH);
    const company = inputString(input.company, MAX_COMPANY_LENGTH);
    if (
      email === undefined || arc === undefined || company === undefined ||
      !emailIsValid(email) || !ALLOWED_ARCS.has(arc)
    ) {
      return jsonResponse(
        { ok: false, error: "Enter a valid email and choose a story arc." },
        400,
        origin,
      );
    }

    // Honeypot submissions look successful but never reach the provider.
    if (company.trim() !== "") return jsonResponse(SUCCESS, 200, origin);

    const resendKey = env.get("RESEND_API_KEY");
    if (!resendKey) return jsonResponse(GENERIC_ERROR, 503, origin);

    const timestamp = new Date().toISOString();
    const text = [
      "New StoryDonkey Beta Signup",
      "",
      `Email: ${email}`,
      `Story arc: ${arc}`,
      `Submitted: ${timestamp}`,
      "Source: StoryDonkey website beta form",
    ].join("\n");

    try {
      const providerResponse = await send(RESEND_URL, {
        method: "POST",
        headers: {
          Authorization: `Bearer ${resendKey}`,
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          from: "StoryDonkey Beta <alert@savagesbydesign.com>",
          to: ["savagesbydesignhq@gmail.com"],
          reply_to: email,
          subject: "New StoryDonkey Beta Signup",
          text,
        }),
      });
      if (!providerResponse.ok) return jsonResponse(GENERIC_ERROR, 503, origin);
    } catch {
      return jsonResponse(GENERIC_ERROR, 503, origin);
    }

    return jsonResponse(SUCCESS, 200, origin);
  };
}

if (import.meta.main) Deno.serve(createHandler());
