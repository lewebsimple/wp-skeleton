import { createApp, h, type Plugin } from "vue";
import App from "@/components/App.vue";

export function createVueApp() {
  const appElement = document.getElementById("app");
  const innerHTML = appElement?.innerHTML || "";
  const app = createApp({
    render() {
      return h(App, null, {
        default: () => h({ template: innerHTML }),
      });
    },
  });
  return app;
}

export function loadVuePlugins(app: ReturnType<typeof createVueApp>) {
  const plugins: Record<string, { default: Plugin }> = import.meta.glob("@/plugins/*.ts", { eager: true });
  Object.keys(plugins).forEach((key) => {
    app.use(plugins[key].default);
  });
}
