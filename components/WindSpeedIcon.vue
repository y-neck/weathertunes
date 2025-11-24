<!-- DEPRECATED; instead, gif was used. Feel free to use and improve the lottie loader component either way to provide a better solution -->

<template>
  <div
style="width: 100%; height: 100%" ref="container" class="wind-speed-icon-container"></div>
</template>

<script setup lang="ts">
defineOptions({
  ssr: false,
});

import lottie from 'lottie-web';

const props = defineProps({
  src: String,
});

// container for the animation
const container = ref(null);
let animInstance: any = null;
const iconPath = computed(() => {
  if (!props.src) return;
  return `/lottie/${props.src}.json`;
});

async function loadAnimation(path: string) {
  try {
    // DEBUG
    console.log('Lottie loading JSON from path:', path);

    const response = await fetch(path);
    if (!response.ok) {
      console.error(
        'Lottie failed to load JSON from path:',
        path,
        'status: ',
        response.status,
      );
      return;
    }
    const json = await response.json();
    // destroy old instance if exists
    animInstance?.destroy();

    animInstance = lottie.loadAnimation({
      container: container.value!,
      renderer: 'svg',
      loop: true,
      autoplay: true,
      path,
      animationData: json,
      rendererSettings: { preserveAspectRatio: 'xMidYMid slice' },
    });

    // DEBUG:
    animInstance.addEventListener('data_failed', () => {
      console.error('Lottie failed to load JSON from path:', path);
    });
    animInstance.addEventListener('error', (error: string) => {
      console.error('Lottie error during animation load:', error);
    });
    animInstance.addEventListener('DOMLoaded', () => {
      console.log('Lottie DOM loaded for animation at', path);
    });
  } catch (error) {
    console.error(
      'Lottie failed to load JSON from path:',
      path,
      'error: ',
      error,
    );
  }
}

// reload json on change
watch(
  () => iconPath.value,
  (newSrc) => {
    if (!newSrc) return;
    loadAnimation(newSrc);
  },
  { immediate: true },
);

onMounted(() => {
  if (props.src) setTimeout(() => loadAnimation(iconPath.value!), 100);
});
</script>
