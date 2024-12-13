import "@/css/main.css";
import "@/utils/error-overlay";
import { logThemeInfo } from "@/utils/theme-info";
import { createVueApp, loadVuePlugins } from "@/utils/vue";

// Log theme name, version and environment
logThemeInfo();

// Vue.js
const app = createVueApp();
loadVuePlugins(app);
app.mount("#app");
