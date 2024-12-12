import "@/css/main.css";
import { version } from "../package.json";
import { createVueApp, loadVuePlugins } from "./utils/vue";

console.log(`Skeleton v${version} (${import.meta.env.MODE})`);

// Vue.js
const app = createVueApp();
loadVuePlugins(app);
app.mount("#app");
