import { createApp, h, type Plugin } from "vue";
import App from "@/app.vue";

export function initVueApp() {
  // Create Vue app
  const appElement = document.getElementById("app");
  const innerHTML = appElement?.innerHTML || "";
  const app = createApp({
    render() {
      return h(App, null, {
        default: () => h({ template: innerHTML }),
      });
    },
  });

  // Load Vue plugins
  const plugins: Record<string, { default: Plugin }> = import.meta.glob("@/plugins/*.ts", { eager: true });
  Object.keys(plugins).forEach((key) => {
    app.use(plugins[key].default);
  });

  // Mount Vue app
  app.mount("#app");
}
