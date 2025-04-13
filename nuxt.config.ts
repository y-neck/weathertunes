// https://nuxt.com/docs/api/configuration/nuxt-config
import tailwindcss from '@tailwindcss/vite'

export default defineNuxtConfig({
  compatibilityDate: '2024-11-01',
  devtools: { enabled: true },
  css: ['~/assets/css/main.css'],
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
                lang: 'ch-de' /* Set lang attribute on <html> tag */,
            },
        },
    },
})