// https://nuxt.com/docs/api/configuration/nuxt-config
import tailwindcss from '@tailwindcss/vite'

export default defineNuxtConfig({
  compatibilityDate: '2024-11-01',
  devtools: { enabled: true },
  css: ['~/assets/css/main.css', '~/assets/css/themes.css'],
  plugins: ['~/plugins/preamble.client.ts'],
  vite: {
    plugins: [
        tailwindcss(),
    ],
  },
  app: {
        head: {
            charset: 'utf-8',
            viewport: 'width=device-width, initial-scale=1',
            link: [
                {
                    rel: 'canonical',
                    href: 'https://example.com',
                },
            ],
            htmlAttrs: {
                lang: 'de-CH' /* Set lang attribute on <html> tag */,
                'data-theme': 'fallback' /* Set data-theme attribute on <html> tag */,
            },
        },
    },
})