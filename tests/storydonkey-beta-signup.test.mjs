import { assertEquals } from "jsr:@std/assert@1";
import { createBetaSignupSubmitter } from "../sbd-brutalist/assets/storydonkey-beta-signup.js";

function fakeForm() {
  const button = { disabled: false };
  const form = {
    dataset: {
      signupEndpoint:
        "https://project.supabase.co/functions/v1/storydonkey-beta-signup",
    },
    elements: {
      email: { value: "writer@example.com" },
      arc: { value: "Mystery" },
      company: { value: "" },
    },
    querySelector: () => button,
    checkValidity: () => true,
    reportValidity: () => {},
    resetCalled: false,
    reset() {
      this.resetCalled = true;
    },
  };
  return { form, button };
}

Deno.test("submits once, disables the button, and confirms success", async () => {
  const { form, button } = fakeForm();
  const states = [];
  let resolveFetch;
  const fetchPromise = new Promise((resolve) => {
    resolveFetch = resolve;
  });
  let calls = 0;
  const submit = createBetaSignupSubmitter({
    form,
    fetchImpl: async (_url, init) => {
      calls += 1;
      assertEquals(JSON.parse(init.body).arc, "Mystery");
      return fetchPromise;
    },
    setStatus: (message, state) => states.push([message, state]),
  });
  const event = { preventDefault() {} };
  const first = submit(event);
  const second = submit(event);
  assertEquals(calls, 1);
  assertEquals(button.disabled, true);
  resolveFetch(new Response(null, { status: 200 }));
  await first;
  await second;
  assertEquals(form.resetCalled, true);
  assertEquals(button.disabled, false);
  assertEquals(states.at(-1), [
    "You’re on the list. We’ll be in touch.",
    "success",
  ]);
});

Deno.test("reports a retryable service error and restores the button", async () => {
  const { form, button } = fakeForm();
  const states = [];
  const submit = createBetaSignupSubmitter({
    form,
    fetchImpl: async () => new Response(null, { status: 503 }),
    setStatus: (message, state) => states.push([message, state]),
  });
  await submit({ preventDefault() {} });
  assertEquals(button.disabled, false);
  assertEquals(states.at(-1), [
    "We could not send that yet. Please try again.",
    "error",
  ]);
});
