import type { Plugin } from "vue";
import { createMemoryHistory, createRouter } from "vue-router";

export default {
  install(app) {
    const router = createRouter({
      history: createMemoryHistory(),
      routes: [],
    });
    app.use(router);
  },
} as Plugin;
