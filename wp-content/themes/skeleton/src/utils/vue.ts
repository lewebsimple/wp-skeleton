import { createApp, h, type Plugin } from "vue";
import AppRoot from "@/components/AppRoot.vue";

export function createVueApp() {
  const appElement = document.getElementById("app");
  const innerHTML = appElement?.innerHTML || "";
  const app = createApp({
    render() {
      return h(AppRoot, null, {
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
