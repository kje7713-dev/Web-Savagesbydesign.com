import {
  assertEquals,
  assertFalse,
  assertStringIncludes,
} from "jsr:@std/assert@1";
import { createHandler } from "./index.ts";

const origin = "https://staging.savagesbydesign.com";
const env = (key: string) =>
  key === "RESEND_API_KEY" ? "test-resend-key" : undefined;
const validPayload = JSON.stringify({
  email: "Writer@Example.com ",
  arc: "Mystery",
  company: "",
});

Deno.test("accepts a valid signup and sends the safe Resend payload", async () => {
  let calls = 0;
  let request: Request | undefined;
  const handler = createHandler(async (input, init) => {
    calls += 1;
    request = new Request(input, init);
    return new Response(JSON.stringify({ id: "mock-id" }), { status: 200 });
  }, { get: env });

  const response = await handler(
    new Request("https://function.example", {
      method: "POST",
      headers: { origin, "content-type": "application/json" },
      body: validPayload,
    }),
  );
  const sent = JSON.parse(await request!.text());
  assertEquals(response.status, 200);
  assertEquals(calls, 1);
  assertEquals(sent.reply_to, "writer@example.com");
  assertEquals(sent.to, ["savagesbydesignhq@gmail.com"]);
  assertEquals(sent.from, "StoryDonkey Beta <alert@savagesbydesign.com>");
  assertEquals(sent.subject, "New StoryDonkey Beta Signup");
  assertStringIncludes(sent.text, "Story arc: Mystery");
  assertStringIncludes(sent.text, "Source: StoryDonkey website beta form");
  assertEquals(response.headers.get("access-control-allow-origin"), origin);
});

Deno.test("rejects invalid email and arc without calling Resend", async () => {
  let calls = 0;
  const handler = createHandler(async () => {
    calls += 1;
    return new Response(null, { status: 200 });
  }, { get: env });
  const response = await handler(
    new Request("https://function.example", {
      method: "POST",
      headers: { origin },
      body: JSON.stringify({
        email: "bad\r\n@example",
        arc: "Other",
        company: "",
      }),
    }),
  );
  assertEquals(response.status, 400);
  assertEquals(calls, 0);
});

Deno.test("silently accepts honeypot without calling Resend", async () => {
  let calls = 0;
  const handler = createHandler(async () => {
    calls += 1;
    return new Response(null, { status: 200 });
  }, { get: env });
  const response = await handler(
    new Request("https://function.example", {
      method: "POST",
      headers: { origin },
      body: JSON.stringify({
        email: "writer@example.com",
        arc: "Mystery",
        company: "bot",
      }),
    }),
  );
  assertEquals(response.status, 200);
  assertEquals(calls, 0);
});

Deno.test("handles CORS, methods, oversized bodies, and provider failure", async () => {
  const handler = createHandler(
    async () => new Response("nope", { status: 500 }),
    { get: env },
  );
  assertEquals(
    (await handler(
      new Request("https://function.example", {
        method: "OPTIONS",
        headers: { origin },
      }),
    )).status,
    204,
  );
  assertEquals(
    (await handler(
      new Request("https://function.example", {
        method: "GET",
        headers: { origin },
      }),
    )).status,
    405,
  );
  assertEquals(
    (await handler(
      new Request("https://function.example", {
        method: "POST",
        headers: { origin },
        body: "x".repeat(4097),
      }),
    )).status,
    413,
  );
  assertEquals(
    (await handler(
      new Request("https://function.example", {
        method: "POST",
        headers: { origin },
        body: validPayload,
      }),
    )).status,
    503,
  );
  assertEquals(
    (await handler(
      new Request("https://function.example", {
        method: "OPTIONS",
        headers: { origin: "https://evil.example" },
      }),
    )).status,
    403,
  );
});

Deno.test("does not expose provider details or accept an unapproved origin", async () => {
  const handler = createHandler(
    async () => new Response("provider secret details", { status: 500 }),
    { get: env },
  );
  const response = await handler(
    new Request("https://function.example", {
      method: "POST",
      headers: { origin: "https://evil.example" },
      body: validPayload,
    }),
  );
  assertEquals(response.status, 403);
  assertFalse((await response.text()).includes("provider secret details"));
});
