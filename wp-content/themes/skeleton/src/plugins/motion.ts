import type { Plugin } from "vue";
import { MotionPlugin } from "@vueuse/motion";

export default {
  install(app) {
    app.use(MotionPlugin);
  },
} as Plugin;
