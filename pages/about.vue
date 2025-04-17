<template>
  <main
    class="bg-text mb-4 flex w-full flex-col justify-center p-4 md:flex-row md:gap-[5%]"
  >
    <div id="left-box" class="flex h-full w-full flex-col">
      <div class="container mx-auto text-left">
        <h1 class="text-text mb-1 text-4xl font-bold">WETTERMIXER</h1>
      </div>
      <div>
        <WeathermixScatterchart class="self-center" />
      </div>
    </div>
    <div id="right-box">
      <div class="container mx-auto text-left">
        <h1 class="text-text mt-4 text-4xl font-bold md:mt-0">Wie geht das?</h1>
      </div>
      <div class="bg-background container mx-auto flex flex-col text-left">
        <p class="text-text mb-4">
          Alle 30 Minuten überprüft unsere Wetterfee das Wetter in Bern und
          schickt dieses an unsere Witterungs-DJs. Diese kreieren eine Playlist
          aus dem Wetter angepassten Songs und stellen dir diese per Spotify zur
          Verfügung.<br />
          Somit kannst du Sonne, Regen und Schnee mit den richtigen Tunes
          geniessen.<br /><br />
          Falls du genauer wissen möchtest, wie unsere Playlists
          zusammengestellt werden, findest du weitere Informationen in der
          Grafik. Die Daten dafür werden von
          <a href="https://open-meteo.com/" class="underline">OpenMeteo</a> und
          der
          <a
            href="https://developer.spotify.com/documentation/web-api"
            class="underline"
            >Spotify Web API</a
          >
          bezogen.
        </p>
      </div>
    </div>
  </main>
</template>

<script setup lang="ts">
import WeathermixScatterchart from "~/components/WeathermixScatterchart.vue";

useSeoMeta({
  title: "About – weathertunes" /* Page title */,
  ogTitle: "About" /* Page title without branding */,
  description: "Hier erfährst du genauer, wie weathertunes funktioniert",
  ogDescription: "Hier erfährst du genauer, wie weathertunes funktioniert",
  robots: "index, follow" /* 'index' | 'follow' | 'noindex' | 'nofollow' */,
});

definePageMeta({
  layout: "default",
});
</script>

<style scoped></style>
