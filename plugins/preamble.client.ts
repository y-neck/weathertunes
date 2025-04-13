export default defineNuxtPlugin(() => {
  if (typeof document !== 'undefined') {
    // Create custom preamble to show in inspector
    const preamble =
      document.createComment(`Hi, schön dass du hier bist! Diese Seite wurde mit viel ☕️ umgesetzt durch neckXproductions (©2025). Weitere
    Projekte findest du auf https://neckXproductions.ch`);

    // Add preamble before html tag
    document.documentElement.parentNode?.insertBefore(
      preamble,
      document.documentElement
    );
  }
});