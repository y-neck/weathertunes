/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./components/**/*.{js,vue,ts}",
        "./layouts/**/*.vue",
        "./pages/**/*.vue",
        "./plugins/**/*.{js,ts}",
        "./app.vue",
        "./error.vue",
    ],
    theme: {
        extend: {
            colors: {
                text: 'rgb(var(--color-text) / <alpha-value>)',
                background: 'rgb(var(--color-background) / <alpha-value>)',
                middle: 'rgb(var(--color-middle) / <alpha-value>)',
                dark: 'rgb(var(--color-dark) / <alpha-value>)',
                text2: 'rgb(var(--color-text2) / <alpha-value>)',
            },
            fontFamily: {
                sans: ['Roboto Flex', 'sans-serif'],
            },
            fontSize: {
                sm: '0.75rem',
                base: '1rem',
                xl: '2rem',
                'moButton': '2.2rem',
                '3xl': '1.953rem',
                '4xl': '2.441rem',
                'moTemp': '5rem',
            },
            boxShadow: {
                'main': '0 2px 15px -2px rgba(0, 0, 0, 0.2)',
            }
        }
    },
    extend: {	/* Extend default css values */
        prefix: 'tw-', /* PostCSS: Add prefix for tailwind classes */
    },
}

