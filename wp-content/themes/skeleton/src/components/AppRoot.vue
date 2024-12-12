<script setup lang="ts">
import { useLoading } from "@/composables/loading";

useLoading();
</script>

<template>
  <UApp>
    <slot />
  </UApp>
</template>
