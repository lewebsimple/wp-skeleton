import "@/css/main.css";
import { logThemeInfo } from "@/utils/theme-info";
import { initErrorHandling } from "@/utils/error-overlay";
import { initVueApp } from "@/utils/vue";

// Log theme name, version and environment
logThemeInfo();

// Initialize error handling
initErrorHandling();

// Initialize Vue app
initVueApp();
