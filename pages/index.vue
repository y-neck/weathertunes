<template>
  <div>test</div>
</template>

<script setup lang="ts">
useSeoMeta({
  title: "weathertunes",
  ogTitle: "weathertunes" /* Title of page without branding */,
  description:
    "Alle 30 Minuten überprüft unsere Wetterfee das Wetter und schickt dieses an unsere Witterungs-DJs. Diese kreieren eine Playlist aus dem Wetter angepassten Songs und stellen dir diese per Spotify zur Verfügung. Somit kannst du Sonne, Regen und Schnee mit den richtigen Tunes geniessen.",
  ogDescription:
    "Alle 30 Minuten überprüft unsere Wetterfee das Wetter und schickt dieses an unsere Witterungs-DJs. Diese kreieren eine Playlist aus dem Wetter angepassten Songs und stellen dir diese per Spotify zur Verfügung. Somit kannst du Sonne, Regen und Schnee mit den richtigen Tunes geniessen.",
  robots: "index",
}); /* https://nuxt.com/docs/api/composables/use-seo-meta */

definePageMeta({
  layout: "weather-theme",
});
</script>

<style scoped></style>
