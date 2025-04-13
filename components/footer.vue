<template>
  <footer class="bg-background text-white ">
    <div class="container mx-auto flex gap-1 justify-between w-full border-box">
        <NuxtLink to="/impressum" class="footer-link">Impressum</NuxtLink>
        <NuxtLink to="/datenschutz" class="footer-link">Datenschutz</NuxtLink>
        <NuxtLink to="https://github.com/y-neck/weathertunes" target="_blank" class="footer-link">
            <img src="~/public/img/standard_icons/github-mark-pos.png" alt="GitHub" class="footer-icon-h-full w-auto">
        </NuxtLink>
        <NuxtLink to="/fireplace.vue" class="footer-link">
            <img src="~/public/img/standard_icons/Fireplace_pos_Mug.png" alt="Fireplace" class="footer-icon-h-full w-auto">
        </NuxtLink>
        <NuxtLink to="/about.vue" class="footer-link"></NuxtLink>
    </div>
  </footer>
</template>

<script setup lang="ts">
</script>

<style scoped>
.footer-link{
  @apply bg-[#f2f2f2] text-black decoration-none border-text border-2 h-10 w-full flex align-center justify-center cursor-pointer gap-2.5 rounded-md;
}
.hover\\:text-gray-300:hover {
    color: #E0E0E0;
    }
</style>