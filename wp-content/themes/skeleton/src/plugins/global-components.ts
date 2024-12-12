import type { Component, Plugin } from "vue";

export default {
  install(app) {
    Object.entries(import.meta.glob("@/components/**/*.vue", { eager: true })).forEach(([key, value]) => {
      const name = key.split("/").pop()?.replace(".vue", "");
      if (!name) return;
      app.component(name, (value as { default: Component }).default);
    });
  },
} as Plugin;
