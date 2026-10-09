import assert from "node:assert/strict";
import test from "node:test";
import { createBetaSignupSubmitter } from "../sbd-brutalist/assets/storydonkey-beta-signup.js";

function fakeForm() {
  return {
    elements: {
      email: { value: "writer@example.com" },
      arc: { value: "Mystery" },
    },
    checkValidity: () => true,
    reportValidity: () => {},
  };
}

test("opens one prefilled email and prevents duplicate clicks", () => {
  const form = fakeForm();
  const states = [];
  const urls = [];
  const submit = createBetaSignupSubmitter({
    form,
    openEmail: (url) => urls.push(url),
    setStatus: (message, state) => states.push([message, state]),
  });

  submit({ preventDefault() {} });
  submit({ preventDefault() {} });

  assert.equal(urls.length, 1);
  assert.match(urls[0], /^mailto:savagesbydesignhq@gmail.com\?/);
  assert.match(decodeURIComponent(urls[0]), /StoryDonkey Beta Request/);
  assert.match(decodeURIComponent(urls[0]), /writer@example.com/);
  assert.match(decodeURIComponent(urls[0]), /Mystery/);
  assert.deepEqual(states.at(-1), [
    "Opening your email app. Send the prefilled message to join the beta.",
    "pending",
  ]);
});

test("reports invalid browser input without opening email", () => {
  const form = fakeForm();
  form.checkValidity = () => false;
  let opened = false;
  const states = [];
  const submit = createBetaSignupSubmitter({
    form,
    openEmail: () => { opened = true; },
    setStatus: (message, state) => states.push([message, state]),
  });

  submit({ preventDefault() {} });

  assert.equal(opened, false);
  assert.deepEqual(states.at(-1), [
    "Please enter a valid email and choose a story arc.",
    "error",
  ]);
});
