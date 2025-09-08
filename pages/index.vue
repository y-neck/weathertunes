<template>
  <pre> Weather Data: {{ currentWeatherData }}</pre>
  <div
    class="bg-background h-full min-h-screen w-full overflow-auto p-8 md:p-24"
  >
    <main class="text-text mx-auto flex w-full flex-col font-bold">
      <div
        id="upper-container"
        class="box-border flex w-full flex-col md:mb-[5%] md:h-[38%] md:flex-row md:gap-[6.5%]"
      >
        <div
          id="main-box"
          class="mb-5 flex aspect-3/2 w-full flex-col gap-5 md:mb-0"
        >
          <div id="top-box" class="flex w-full flex-row gap-5">
            <div
              id="status-box"
              class="text-moButton grid aspect-square w-full grid-cols-2 grid-rows-2 gap-2 md:gap-4"
            >
              <div
                id="weather-desc-box"
                class="shadow-main bg-middle col-span-2 flex items-center justify-center rounded-lg uppercase"
              ></div>
              <div
                id="weather-icon-box"
                class="bg-middle shadow-main flex items-center justify-center rounded-lg"
              >
                <img src="" alt="Wätterlag" class="h-full w-auto" />
              </div>
              <div
                id="flag-icon-box"
                class="bg-middle shadow-main flex items-center justify-center rounded-lg"
              >
                <!--                 <lottie-player
                  background="transparent"
                  speed="1"
                  style="height: 100%; width: 100%"
                  loop
                  autoplay
                ></lottie-player>
 -->
              </div>
            </div>
            <div
              id="temp-box"
              class="text-moTemp bg-dark shadow-main rounded-main flex w-full items-center justify-center rounded-lg"
            >
              {{ `${currentWeatherData?.temperature2m}°C` }}
            </div>
          </div>
          <div id="bottom-box" class="flex w-full flex-row">
            <button
              id="play-button"
              class="bg-text shadow-main text-moButton text-dark hover:bg-dark hover:text-text flex h-full w-full justify-center rounded-lg transition duration-200 ease-in-out"
            >
              TUNE IN
            </button>
          </div>
        </div>

        <!-- Adjusted div for Spotify iframe -->
        <div
          id="spotify-container"
          class="shadow-main bg-middle col-span-2 mb-5 flex h-full w-full flex-col items-center justify-center overflow-scroll rounded-lg p-2 text-center uppercase md:mt-0 md:h-full"
        >
          <p id="spotify-text" class="m-[20%]">
            Öffne Spotify und klicke anschliessend auf “Tune In”, um dir deinen
            Wettermix generieren zu lassen. <br /><br />
            Falls die Wiedergabe nicht automatisch startet, musst du eventuell
            zuerst selbst einen Song abspielen, damit Spotify dein Gerät
            erkennt.
          </p>
          <div id="spotify-iframe" class="h-full w-full overflow-hidden"></div>
          <div
            id="weathermix-player"
            class="flex h-full w-full flex-row items-center justify-between"
          >
            <div style="padding: 0" class="container text-left">
              <h1 class="text-text text-4xl font-bold">WETTERMIX</h1>
            </div>
            <div id="recommendations-player-controls" class="flex items-center">
              <button id="recommendations-player-pause">
                <img
                  src="public/img/standard_icons/Pause_neg.svg"
                  alt="Play Icon"
                  class="h-[40px] w-auto"
                />
              </button>
            </div>
          </div>
          <div id="recommendations-player" class="w-[90%] overflow-y-auto">
            <!-- List for Songs, scrollable -->
            <ol
              id="recommendations-player-list"
              class="h-[calc(100vh - 10vh)] items-left text-left"
            ></ol>
          </div>
        </div>
      </div>
      <div id="lower-container" class="w-full gap-[5%] md:flex">
        <div id="past-weather-box" class="flex w-full flex-col gap-0 md:w-1/2">
          <div
            id="past-weather-text-box"
            class="text-moButton shadow-main bg-middle flex h-[10vh] items-center justify-center rounded-t-lg"
          >
            WETTERRÜCKBLICK
          </div>
          <div
            id="past-weather-icon-box"
            class="shadow-main bg-dark relative mb-5 flex h-[10vh] items-center justify-start rounded-b-lg"
          >
            <img
              src="public/img/standard_icons/timeline.svg"
              alt="Past Weather Icon"
              class="h-auto w-[96%]"
            />
            <div
              class="placeholder-container absolute top-0 left-0 z-10 flex h-full w-full items-center justify-center gap-[10%]"
            >
              <div
                id="past-weather-icon-1"
                class="placeholder-item bg-dark h-[60%] w-auto px-2"
              >
                <img
                  src="public/img/weather_icons/neg/Icons_Neg_Klar_Nacht.png"
                  alt="Placeholder 1"
                  class="h-full w-auto"
                />
              </div>
              <div
                id="past-weather-icon-2"
                class="placeholder-item bg-dark h-[60%] w-auto px-2"
              >
                <img
                  src="public/img/weather_icons/neg/Icons_Neg_Klar_Nacht.png"
                  alt="Placeholder 2"
                  class="h-full w-auto"
                />
              </div>
              <div
                id="past-weather-icon-3"
                class="placeholder-item bg-dark h-[60%] w-auto px-2"
              >
                <img
                  src="public/img/weather_icons/neg/Icons_Neg_Klar_Nacht.png"
                  alt="Placeholder 3"
                  class="h-full w-auto"
                />
              </div>
            </div>
          </div>
        </div>
        <div
          id="footer-box"
          class="flex w-full flex-col gap-5 md:ml-4 md:h-[20vh] md:w-1/2"
        >
          <div
            id="bottom-text-box"
            class="shadow-main bg-middle flex h-full w-full items-center justify-center rounded-lg text-center uppercase max-sm:hidden"
          >
            Made For You with ♥<br />
            BY Cla, Joél and Yannick
          </div>
        </div>
      </div>
    </main>
    <Footer />
  </div>
</template>

<script setup lang="ts">
import WeatherDescriptions from "~/models/WeatherDescription";

/* API fetching */
const { data: currentWeatherData } = await useFetch("/api/weatherAPI", {
  key: "weatherData", // key to identify the request, make sure the fetch is only called once
  // server: false,
});

// define html elements
const weatherDescriptionBox = ref("#weather-desc-box");
const weatherIconBox = ref("#weather-icon-box");
const windBox = ref("#flag-icon-box");

const lottiePlayer = ref("lottie-player");
const spotifyContainer = ref("#spotify-container");
const iframePlayer = ref("#spotify-iframe");

const weatherReviewSlot1 = ref("#past-weather-icon-1");
const weatherReviewSlot2 = ref("#past-weather-icon-2");
const weatherReviewSlot3 = ref("#past-weather-icon-3");

async function unloadCurrentWeather() {
  /* TODO: Change weather description */
}

onMounted(() => {
  unloadCurrentWeather();
});

useSeoMeta({
  title: "weathertunes",
  ogTitle: "weathertunes" /* Title of page without branding */,
  description:
    "Alle 30 Minuten überprüft unsere Wetterfee das Wetter und schickt dieses an unsere Witterungs-DJs. Diese kreieren eine Playlist aus dem Wetter angepassten Songs und stellen dir diese per Spotify zur Verfügung. Somit kannst du Sonne, Regen und Schnee mit den richtigen Tunes geniessen.",
  ogDescription:
    "Alle 30 Minuten überprüft unsere Wetterfee das Wetter und schickt dieses an unsere Witterungs-DJs. Diese kreieren eine Playlist aus dem Wetter angepassten Songs und stellen dir diese per Spotify zur Verfügung. Somit kannst du Sonne, Regen und Schnee mit den richtigen Tunes geniessen.",
  robots: "index, follow",
}); /* https://nuxt.com/docs/api/composables/use-seo-meta */

definePageMeta({
  layout: "weather-theme",
});
</script>

<style scoped>
.track-list-item {
  list-style-type: decimal;
  text-transform: uppercase;
  border-bottom: 1px solid #ccc;
  text-align: left;
  padding-left: 10px;
}

ol {
  list-style-position: inside;
  padding-inline-start: 0;
}

li:not(:last-child) {
  margin-bottom: 0.5em;
}
</style>
