<template>
  <NuxtLayout>
    <NuxtPage />
  </NuxtLayout>
</template>

<script setup lang="ts">
useSeoMeta({
  ogSiteName: "weathertunes" /* Overall site name */,
  ogType: "website" /* 'website' | 'article' | 'book' | 'profile' */,
  description:
    "Alle 30 Minuten überprüft unsere Wetterfee das Wetter und schickt dieses an unsere Witterungs-DJs. Diese kreieren eine Playlist aus dem Wetter angepassten Songs und stellen dir diese per Spotify zur Verfügung. Somit kannst du Sonne, Regen und Schnee mit den richtigen Tunes geniessen.",
  ogDescription:
    "Alle 30 Minuten überprüft unsere Wetterfee das Wetter und schickt dieses an unsere Witterungs-DJs. Diese kreieren eine Playlist aus dem Wetter angepassten Songs und stellen dir diese per Spotify zur Verfügung. Somit kannst du Sonne, Regen und Schnee mit den richtigen Tunes geniessen.",
  creator: "©2025 neckXproductions",
  ogImage: "~/public/img/Favicon.ico" /* Image of page when sharing */,
}); /* https://nuxt.com/docs/api/composables/use-seo-meta */

useHead({
  htmlAttrs: {
    "data-theme": "fallback",
  },
});
</script>

<style>
/* Style definitions by https://github.com/joggiletti */
/* Load Font */
@font-face {
  font-family: "Roboto Flex";
  src: url("assets/fonts/RobotoFlex-VariableFont.ttf") format("truetype");
}

/* Font styling Moblile */
/* Temperature */
#temp-box {
  font-family: "Roboto Flex", sans-serif;
  font-variation-settings:
    "slnt" 0,
    /* Slant */ "wdth" 25,
    /* Width */ "wght" 250,
    /* Weight */ "GRAD" 100,
    /* Grad */ "XOPQ" 96,
    /* Parametric Thick Stroke */ "XTRA" 468,
    /* Parametric Counter Width */ "YOPQ" 79,
    /* Parametric Thin Stroke */ "YTAS" 750,
    /* Parametric Ascender Height */ "YTDE" -203,
    /* Parametric Descender Depth */ "YTFI" 738,
    /* Parametric Figure Height */ "YTLC" 514,
    /* Parametric Lowercase Height */ "YTUC" 712,
    /* Parametric Uppercase Height  */ "opsz" 68;
  /* Optical Size */
}

/* Button */
button {
  font-family: "Roboto Flex", sans-serif;
  font-variation-settings:
    "slnt" 0,
    /* Slant */ "wdth" 50,
    /* Width */ "wght" 400,
    /* Weight */ "GRAD" 100,
    /* Grad */ "XOPQ" 96,
    /* Parametric Thick Stroke */ "XTRA" 468,
    /* Parametric Counter Width */ "YOPQ" 79,
    /* Parametric Thin Stroke */ "YTAS" 750,
    /* Parametric Ascender Height */ "YTDE" -203,
    /* Parametric Descender Depth */ "YTFI" 738,
    /* Parametric Figure Height */ "YTLC" 514,
    /* Parametric Lowercase Height */ "YTUC" 712,
    /* Parametric Uppercase Height  */ "opsz" 44;
  /* Optical Size */
}

/* Footer */
footer a {
  font-family: "Roboto Flex", sans-serif;
  font-variation-settings:
    "slnt" 0,
    /* Slant */ "wdth" 50,
    /* Width */ "wght" 400,
    /* Weight */ "GRAD" 100,
    /* Grad */ "XOPQ" 96,
    /* Parametric Thick Stroke */ "XTRA" 468,
    /* Parametric Counter Width */ "YOPQ" 79,
    /* Parametric Thin Stroke */ "YTAS" 750,
    /* Parametric Ascender Height */ "YTDE" -203,
    /* Parametric Descender Depth */ "YTFI" 738,
    /* Parametric Figure Height */ "YTLC" 514,
    /* Parametric Lowercase Height */ "YTUC" 712,
    /* Parametric Uppercase Height  */ "opsz" 12;
  /* Optical Size */
}

/* Header 1 */
h1 {
  font-family: "Roboto Flex", sans-serif;
  font-variation-settings:
    "slnt" 0,
    /* Slant */ "wdth" 50,
    /* Width */ "wght" 550,
    /* Weight */ "GRAD" 50,
    /* Grad */ "XOPQ" 96,
    /* Parametric Thick Stroke */ "XTRA" 468,
    /* Parametric Counter Width */ "YOPQ" 79,
    /* Parametric Thin Stroke */ "YTAS" 750,
    /* Parametric Ascender Height */ "YTDE" -203,
    /* Parametric Descender Depth */ "YTFI" 738,
    /* Parametric Figure Height */ "YTLC" 514,
    /* Parametric Lowercase Height */ "YTUC" 712,
    /* Parametric Uppercase Height  */ "opsz" 44;
  /* Optical Size */
}

/* Copy Text */
*,
p {
  text-transform: uppercase;
  font-family: "Roboto Flex", sans-serif;
  font-variation-settings:
    "slnt" 0,
    /* Slant */ "wdth" 50,
    /* Width */ "wght" 400,
    /* Weight */ "GRAD" 0,
    /* Grad */ "XOPQ" 96,
    /* Parametric Thick Stroke */ "XTRA" 468,
    /* Parametric Counter Width */ "YOPQ" 79,
    /* Parametric Thin Stroke */ "YTAS" 750,
    /* Parametric Ascender Height */ "YTDE" -203,
    /* Parametric Descender Depth */ "YTFI" 738,
    /* Parametric Figure Height */ "YTLC" 514,
    /* Parametric Lowercase Height */ "YTUC" 712,
    /* Parametric Uppercase Height  */ "opsz" 20;
  /* Optical Size */
}

/* Copy Text Links */
a {
  font-family: "Roboto Flex", sans-serif;
  text-decoration: underline;
  font-variation-settings:
    "slnt" 0,
    /* Slant */ "wdth" 50,
    /* Width */ "wght" 400,
    /* Weight */ "GRAD" 0,
    /* Grad */ "XOPQ" 96,
    /* Parametric Thick Stroke */ "XTRA" 468,
    /* Parametric Counter Width */ "YOPQ" 79,
    /* Parametric Thin Stroke */ "YTAS" 750,
    /* Parametric Ascender Height */ "YTDE" -203,
    /* Parametric Descender Depth */ "YTFI" 738,
    /* Parametric Figure Height */ "YTLC" 514,
    /* Parametric Lowercase Height */ "YTUC" 712,
    /* Parametric Uppercase Height  */ "opsz" 20;
  /* Optical Size */
}

/* Copy Text Bold */
b {
  font-family: "Roboto Flex", sans-serif;
  font-variation-settings:
    "slnt" 0,
    /* Slant */ "wdth" 50,
    /* Width */ "wght" 400,
    /* Weight */ "GRAD" 150,
    /* Grad */ "XOPQ" 96,
    /* Parametric Thick Stroke */ "XTRA" 468,
    /* Parametric Counter Width */ "YOPQ" 79,
    /* Parametric Thin Stroke */ "YTAS" 750,
    /* Parametric Ascender Height */ "YTDE" -203,
    /* Parametric Descender Depth */ "YTFI" 738,
    /* Parametric Figure Height */ "YTLC" 514,
    /* Parametric Lowercase Height */ "YTUC" 712,
    /* Parametric Uppercase Height  */ "opsz" 20;
  /* Optical Size */
}
</style>
