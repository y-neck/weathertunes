<template>
  <footer class="bg-background mt-3 text-white">
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
      <NuxtLink to="/" class="footer-link">Home</NuxtLink>
      <NuxtLink to="/fireplace" class="footer-link">
        <img
          src="~/public/img/standard_icons/Fireplace_pos_Mug.png"
          alt="Fireplace"
          class="footer-icon h-full w-auto p-2"
        />
      </NuxtLink>
      <NuxtLink to="/about" class="footer-link">About</NuxtLink>
    </div>
  </footer>
</template>

<script setup lang="ts"></script>

<style scoped>
.footer-link {
  background-color: #f2f2f2;
  color: #000;
  text-decoration: none;
  border: none;
  border-radius: 25px;
  height: 40px;
  width: 100%;
  display: flex;
  align-items: center;
  text-align: center;
  justify-content: center;
  font-size: 16px;
  cursor: pointer;
  gap: 10px;
  box-shadow: 0 2px 15px -2px rgba(0, 0, 0, 0.2);
}
.footer-link:hover {
  color: var(--color-text);
  background-color: var(--color-dark);
  transition: all 0.2s ease-in-out;
}
@media (max-width: 768px) {
  .footer-link {
    font-size: 14px;
    width: fit-content;
    padding-inline: 10px;
  }
}
</style>
