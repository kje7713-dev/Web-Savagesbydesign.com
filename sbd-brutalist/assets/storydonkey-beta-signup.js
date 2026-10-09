const RECIPIENT = "savagesbydesignhq@gmail.com";
const SUBJECT = "StoryDonkey Beta Request";

export function createBetaSignupSubmitter({ form, openEmail, setStatus }) {
  let opened = false;

  return function submit(event) {
    event.preventDefault();
    if (opened) return;

    if (!form.checkValidity()) {
      setStatus("Please enter a valid email and choose a story arc.", "error");
      form.reportValidity();
      return;
    }

    const email = form.elements.email.value.trim();
    const arc = form.elements.arc.value;
    const body = [
      "Please add me to the StoryDonkey beta.",
      "",
      `Email: ${email}`,
      `Story arc: ${arc}`,
    ].join("\n");
    const mailto = `mailto:${RECIPIENT}?subject=${encodeURIComponent(SUBJECT)}&body=${encodeURIComponent(body)}`;

    opened = true;
    setStatus("Opening your email app. Send the prefilled message to join the beta.", "pending");
    openEmail(mailto);
  };
}

export function mountBetaSignup(form) {
  const status = form.querySelector("[data-signup-status]");
  const setStatus = (message, state) => {
    status.textContent = message;
    status.dataset.state = state;
  };
  const submit = createBetaSignupSubmitter({
    form,
    openEmail: (url) => {
      window.location.href = url;
    },
    setStatus,
  });
  form.addEventListener("submit", submit);
  form.addEventListener(
    "invalid",
    () => setStatus("Please enter a valid email and choose a story arc.", "error"),
    true,
  );
}

if (typeof document !== "undefined") {
  document.querySelectorAll('[data-signup-backend="mailto"]')
    .forEach(mountBetaSignup);
}
