<script setup lang="ts">
import { computed } from "vue";
const theme = useState("theme", () => "fallback");

useHead({
  htmlAttrs: {
    "data-theme": computed(() => theme.value),
    lang: "de-CH",
    id: "webPage",
  },
});
console.log("theme:", theme.value);

/** Call this to change theme:
 * @param {string} newTheme - The new theme to set.
 * @returns {string} The new theme.
 * function setTheme(newTheme: string) {
 *theme.value = newTheme;
 *document.documentElement.setAttribute("data-theme", newTheme);
 *}
 */
</script>

<template>
  <div class="border-box font-[Roboto Flex] flex min-h-screen w-full flex-col">
    <slot />
  </div>
</template>
