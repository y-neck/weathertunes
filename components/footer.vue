<template>
  <footer class="bg-background text-white">
    <div class="border-box flex justify-between gap-1">
      <NuxtLink to="/impressum" class="footer-link"
        >Impressum <br />
        Datenschutz</NuxtLink
      >
      <NuxtLink
        to="https://github.com/y-neck/weathertunes"
        target="_blank"
        class="footer-link"
      >
        <img
          src="~/public/img/standard_icons/github-mark-pos.png"
          alt="GitHub"
          class="footer-icon h-full w-auto p-2"
        />
      </NuxtLink>
      <NuxtLink to="/fireplace.vue" class="footer-link">
        <img
          src="~/public/img/standard_icons/Fireplace_pos_Mug.png"
          alt="Fireplace"
          class="footer-icon h-full w-auto p-2"
        />
      </NuxtLink>
      <NuxtLink to="/about.vue" class="footer-link">About</NuxtLink>
    </div>
  </footer>
</template>

<script setup lang="ts"></script>

<style scoped>
.footer-link {
  @apply flex h-[48px] w-full cursor-pointer items-center justify-center gap-[16px] rounded-[16px] bg-[#f2f2f2] text-center text-[#000] no-underline;
}
.hover\\:text-gray-300:hover {
  color: #e0e0e0;
}
</style>
