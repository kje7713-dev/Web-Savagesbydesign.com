const DEFAULT_ERROR = "We could not send that yet. Please try again.";

export function createBetaSignupSubmitter(
  { form, fetchImpl = fetch, setStatus },
) {
  let submitting = false;

  return async function submit(event) {
    event.preventDefault();
    if (submitting) return;

    if (!form.checkValidity()) {
      setStatus("Please enter a valid email and choose a story arc.", "error");
      form.reportValidity();
      return;
    }

    const endpoint = form.dataset.signupEndpoint;
    if (!endpoint) {
      setStatus(DEFAULT_ERROR, "error");
      return;
    }

    const values = {
      email: form.elements.email.value.trim(),
      arc: form.elements.arc.value,
      company: form.elements.company.value,
    };
    const button = form.querySelector('button[type="submit"]');
    submitting = true;
    if (button) button.disabled = true;
    setStatus("Sending your beta request…", "pending");

    try {
      const response = await fetchImpl(endpoint, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(values),
      });
      if (!response.ok) throw new Error("signup request failed");
      form.reset();
      setStatus("You’re on the list. We’ll be in touch.", "success");
    } catch {
      setStatus(DEFAULT_ERROR, "error");
    } finally {
      submitting = false;
      if (button) button.disabled = false;
    }
  };
}

export function mountBetaSignup(form) {
  const status = form.querySelector("[data-signup-status]");
  const setStatus = (message, state) => {
    status.textContent = message;
    status.dataset.state = state;
  };
  const submit = createBetaSignupSubmitter({ form, setStatus });
  form.addEventListener("submit", submit);
  form.addEventListener(
    "invalid",
    () =>
      setStatus("Please enter a valid email and choose a story arc.", "error"),
    true,
  );
}

if (typeof document !== "undefined") {
  document.querySelectorAll('[data-signup-backend="resend-edge-function"]')
    .forEach(mountBetaSignup);
}
