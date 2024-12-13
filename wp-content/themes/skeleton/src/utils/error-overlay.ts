// Register error overlay
const showErrorOverlay = (error: Event) => {
  const ErrorOverlay = customElements.get("vite-error-overlay");
  if (!ErrorOverlay) {
    return;
  }
  const overlay = new ErrorOverlay(error);
  document.body.appendChild(overlay);
};
window.addEventListener("error", showErrorOverlay);
window.addEventListener("unhandledrejection", ({ reason }) => showErrorOverlay(reason));
