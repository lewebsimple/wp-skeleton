<script setup lang="ts">
import { onMounted } from "vue";
import { useMotion } from "@vueuse/motion";

onMounted(() => {
  const appElement = document.getElementById("app");
  const loadingElement = document.getElementById("loading");
  useMotion(loadingElement, { initial: { opacity: 1 }, enter: { opacity: 0 } });
  useMotion(appElement, { initial: { opacity: 0 }, enter: { opacity: 1 } });
});
</script>

<template>
  <slot />
</template>
